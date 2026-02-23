<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends MY_Controller {
    var $limit  = 20; var $offset = 0; var $pages  = 7;
	function __construct()
	{
		parent::__construct();
		$this->load->model('video_model');
		//$this->load->model('news_model');
		$this->load->model('member_model');
		$this->load->library('paging_front');
		//$this->load->model('banner_model');
		/*$this->load->model('main_model');
		$this->load->model('stores_model');
		$this->load->library('email');*/
	}

	function index()
        { 
        
            if($this->session->userdata('user_id') == ""){
                redirect(site_url('login'));
                exit;
            }
         
            $data['limit'] = $this->limit;
            $data['profile'] = $this->member_model->userDetail(array('user_id' =>$this->session->userdata('user_id')));
            $data['videos'] = $this->video_model->getAllVideos();
            $this->load->view('videos', $data);
        }
	
	
	
	function videosajax()
	    {
		$data = "";
      //  $data['books'] = $this->book_model->getBooks(array('status' =>'active'));
	  //  $data['latest_books'] = $this->book_model->geLatestBooks(array('limit' =>'4'));



 $search_by = $this->input->post('search_by');
           $page_id = $this->input->post('page_id');

           $limit = $this->input->post('limit');

            $data = array();
            if($page_id!="")
                $offset    = $limit * ($page_id-1);


          

                  $total   =  $this->video_model->getTotalVideos();
//echo "<br>";
                $options =  array('records' => $limit ,
                    'pages'   => $this->pages,
                    'page_no' => $page_id,
                    'total'   => $total );
					
					
                $paging          = new paging_front($options);
              $paging_link     = $paging->show_paging();
            // echo "<br>";
			    //$data['store_category_id']   = $store_category_id;
              //  $data['store_id']   		= $store_id;
                $data['total_deals']   		= $total;
              //  $data['sort_by_selected'] 	= $sort_by;
                $data['limit_selected'] 	= $limit;
                $data['search_by'] 	= $search_by;
               // $data['keywords'] 	= $keywords;
            $data['videos'] = $this->video_model->getvideos(array('search_by' =>$search_by,'status' =>'active','offset' =>$offset, 'limit' => $limit));
               // $data['deals'] = $this->book_model->getCategoryDealsAjax(array('store_id' =>$store_id, 'offset' =>$offset, 'limit' => $limit));
                $data['paging_link'] = $paging_link;
               // $this->load->view('front/ajax_deals',$data);
          //  }

			//echo "ws".$paging_link;




            $this->load->view('listvideos', $data);


	}
	
	
	function videos()
	{ 
		$data = "";
		//$data['home_page_banners'] = $this->stores_model->getHomeBanner('slider','home');
		
	$data['videos'] = $this->video_model->getAllVideos(array('status' =>'active'));

		
	
		
		
		$this->load->view('videos', $data);
	}
	
	function videodetail()
		{ 
	
      	$id = $this->uri->segment(2);
		if($this->session->userdata('user_id') != "")
		{ 
	//	$data['video'] =  $this->video_model->updateVideoView($id);
		$data['video'] =  $this->video_model->getVideo($id);
		
		
       $data['latest_videos'] = $this->video_model->geLatestVideos(array('limit' =>'3'));
	  
	   
		$this->load->view('videoshow', $data);
		}
		else
		redirect('login');
	}

function showvideo()
		{ 
		$data = "";
      	$id = $this->input->post('id');
		echo $video =  $this->video_model->getVideo($id);
      //  $this->load->view('videoshow', $data);
	}		
	


}

/* End of file front.php */
/* Location: ./application/controllers/front.php */