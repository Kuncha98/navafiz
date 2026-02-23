<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Track_steps extends CI_Controller {
        
        function __construct()
        {
            parent::__construct();
            $this->load->model('member_model');
            $this->load->model('cvreview_points_model');
            $this->load->model('cvreview_model');
        }
        
        public function index($id){
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$id));
            $pro_details =   $this->member_model->getMembers(array('m_status' =>1,'id' =>$id));
            $data['pro_details'] = $pro_details;
            $data['card_user_id'] = $id;
            $this->load->view('track-steps/index', $data);
        }
        
        public function sheet($id){
            $user_profile = $this->member_model->userDetail(array('user_id' =>$id));
            $this->load->model('swot_model');            
            $userswot_data = $this->swot_model->Search(array('member_id'=>$id));
            
            $data['profile'] = $user_profile;
            
            $pro_details =   $this->member_model->getMembers(array('m_status' =>1,'id' =>$id));
            $data['userswot_data'] = $userswot_data;
            $data['pro_details'] = $pro_details;
            $data['card_user_id'] = $id;
            $this->load->view('track-steps/index', $data);
        }
}

/* End of file front.php */
/* Location: ./application/controllers/front.php */