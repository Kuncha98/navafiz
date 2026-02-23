<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Products extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         LoginCheck(site_url('login'), current_url());
        // Load Stripe library 
        $this->load->library('stripe_lib'); 
         
        // Load product model 
        $this->load->model('product'); 
    } 
     
    public function index(){ 
//        $this->user_id = $this->session->userdata('user_id');
        
        $data['products'] = $this->product->getProducts(); 
//        $data['member_orders'] = $this->product->Search(array('buyer_id'=>$this->user_id));
        
        $this->load->view('products/index', $data); 
    } 
     
    function purchase($id){ 
        $data = array(); 
         
        // Get product data from the database 
        $product = $this->product->GetById($id); 
         
        // If payment form is submitted with token 
        if($this->input->post('stripeToken')){ 
            // Retrieve stripe token and user info from the posted form data 
            $postData = $this->input->post(); 
            
            $postData['product'] = $product; 
            
//            echo "<pre>";print_r($postData);exit(s); 
            // Make payment 
            $paymentID = $this->payment($postData); 
             
            // If payment successful 
            if($paymentID){ 
                redirect('products/payment_status/'.$paymentID); 
            }else{ 
                $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':''; 
                $data['error_msg'] = 'Transaction has been failed!'.$apiError; 
            } 
        } 
         
        // Pass product data to the details view 
        $data['product'] = $product; 
        $this->load->view('products/details', $data); 
    } 
     
    function payment($postData){ 
         $this->user_id = $this->session->userdata('user_id');
        // If post data is not empty 
        if(!empty($postData)){ 
            // Retrieve stripe token and user info from the submitted form data 
            $token  = $postData['stripeToken']; 
            $name = $postData['name']; 
            $email = $postData['email']; 
             
            // Add customer to stripe 
            $customer = $this->stripe_lib->addCustomer($email, $token); 
             
            if($customer){ 
                // Charge a credit or a debit card 
                $charge = $this->stripe_lib->createCharge($customer->id, $postData['product']['name'], $postData['product']['price']); 
                 
                if($charge){ 
                    // Check whether the charge is successful 
                    if($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1){ 
                        // Transaction details  
                        $transactionID = $charge['balance_transaction']; 
                        $paidAmount = $charge['amount']; 
                        $paidAmount = ($paidAmount/100); 
                        $paidCurrency = $charge['currency']; 
                        $payment_status = $charge['status']; 
                         
                        // Insert tansaction data into the database 
                        $orderData = array( 
                            'product_id' => $postData['product']['id'], 
                            'buyer_name' => $name, 
                            'buyer_id' => $this->user_id, 
                            'buyer_email' => $email,
                            'list_id' => $postData['product']['id'],
                            'paid_amount' => $paidAmount, 
                            'paid_amount_currency' => $paidCurrency, 
                            'txn_id' => $transactionID, 
                            'payment_status' => $payment_status 
                        ); 
                        $orderID = $this->product->insertOrder($orderData); 
                         
                        // If the order is successful 
                        if($payment_status == 'succeeded'){ 
                            return $orderID; 
                        } 
                    } 
                } 
            } 
        } 
        return false; 
    } 
     
    function payment_status($id){ 
        $data = array(); 
         
        // Get order data from the database 
        $order = $this->product->getOrder($id); 
         
        // Pass order data to the view 
        $data['order'] = $order; 
        $this->load->view('products/payment-status', $data); 
    } 
}