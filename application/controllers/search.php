<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->model('search_model');
            $this->session_user_id = $this->session->userdata('user_id');            
            
        }
        
        
        function index(){
            
            $total_job = $this->search_model->countFeaturedJob();
            $featuredJob = $this->search_model->randomPickFeaturedJob($total_job->featured_job_count);
            $total_featured_members = $this->search_model->countFeaturedMember();
            // echo "<pre>";print_r($total_featured_members);exit();
            $featuredMember = $this->search_model->randomPickFeaturedMember($total_featured_members->member_count);
            $data['featuredJob'] = $featuredJob;
            $data['featuredMember'] = $featuredMember;
            $data['value'] = 'professionals';
            
            
            
            $this->load->view('search/search',$data);  
        }
        
        function search_form($limit){
            
            $search_keyword = $this->input->post('search_keyword');
            $search_id = $this->input->post('search_id');
//            echo $search_id;exit();
            $data['search_keyword'] = $search_keyword;
            $data['limit'] = $limit;
            $data['search_id'] = $search_id;
            
            if($search_id == 1){
            
            $list_profiles = $this->search_model->getSearchKeyword($search_keyword,$limit);
            
            
            $data['professionals'] = $list_profiles;
            $data['title'] = 'Professionals';
            
     
            $this->load->view('search/search_prof', $data);

            }else if ($search_id == 2) {
                $list_results = $this->search_model->jobSearchKeyword($search_keyword,$limit);
//                
                
                $data['jobs'] = $list_results;
                $data['title'] = 'Jobs';
                
                $this->load->view('search/search_job', $data);
            }else{
                redirect(site_url('search'));
            }
        }
        
        
        
}