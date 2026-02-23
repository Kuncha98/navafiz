<div class="sidebar">
  <div class="sidebar-content">
    <div class="user-menu dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?=base_url()?>assets/admin/images/sh.jpg" alt="">
      <div class="user-info"> Admin <span>Administrator</span> </div>
      </a> </div>
    <ul class="navigation">
    <!--  <li class="<?=($this->uri->segment(2)=='dashboard')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/main/dashboard"><span>Dashboard</span> <i class="icon-screen2"></i></a></li>-->
      <li class="<?=($this->uri->segment(2)=='jobs')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/jobs"><span>Jobs</span> <i class="icon-stack"></i></a></li>  
      
      <li class="<?=($this->uri->segment(2)=='companies')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/companies"><span>Companies</span> <i class="icon-book"></i></a></li>
       <li class="<?=($this->uri->segment(2)=='poll')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/poll/result"><span>Poll</span> <i class="icon-book"></i></a></li>
       <li class="<?=($this->uri->segment(2)=='happens')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/main/happens"><span>Happens</span> <i class="icon-book"></i></a></li>
      <li class="<?=($this->uri->segment(2)=='categories')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/categories"><span>Categories</span> <i class="icon-print"></i></a></li>  
      <li class="<?=($this->uri->segment(2)=='members')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/members"><span>Members</span> <i class="icon-print"></i></a></li>  
      <li class="<?=($this->uri->segment(2)=='imagelibrary')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/imagelibrary"><span>Image Library</span> <i class="icon-print"></i></a></li>  
      
       <li class="<?=($this->uri->segment(2)=='videos')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/videos"><span>Video</span> <i class="icon-screen2"></i></a></li>
      <!--<li class="<?=($this->uri->segment(2)=='events')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/event"><span>Events</span> <i class="icon-print"></i></a></li>  -->
<!--      <li class="<?=($this->uri->segment(2)=='eventgallery')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/eventgallery"><span>Gallery</span> <i class="icon-print"></i></a></li>  
-->     
 <li class="<?=($this->uri->segment(2)=='faqs')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/faqs"><span>FAQs</span> <i class="icon-screen2"></i></a></li>
  <li class="<?=(in_array($this->uri->segment(2), array('events'=>'events','eventgallery'=>'eventgallery','eventsubscriber'=>'eventsubscriber')))?"active":""?> has-ul"> <a href="#"><span>Events</span> <i class="icon-grid"></i></a>
        <ul>
          <li class="<?=($this->uri->segment(2)=='events')? "active" : ""?>"><a href="<?=base_url()?>admin/event">Events</a></li>
          <li class="<?=($this->uri->segment(2)=='eventgallery')? "active" : ""?>"><a href="<?=base_url()?>admin/eventgallery">Gallery</a></li>
          <li class="<?=($this->uri->segment(2)=='eventsubscriber')? "active" : ""?>"><a href="<?=base_url()?>admin/eventsubscriber">Event Subscriber</a></li>
          
        </ul>
      </li>
	  <li class="<?=($this->uri->segment(2)=='blogs')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/classified"><span>Classified</span> <i class="icon-book"></i></a></li>
       <li class="<?=($this->uri->segment(2)=='jobtitles')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/jobs/jobtitles"><span>Job Titles</span> <i class="icon-book"></i></a></li>
         <li class="<?=($this->uri->segment(2)=='jobtitles')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/jobs/jobseekerstips"><span>Daily Jobseekers Tips</span> <i class="icon-book"></i></a></li>
	  <li class="<?=($this->uri->segment(2)=='Pages')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/pages"><span>Pages</span> <i class="icon-libreoffice"></i></a></li>  
     <li class="<?=($this->uri->segment(2)=='settings')? "active" : ""?> has-ul"><a href="<?=base_url()?>admin/settings"><span>Settings</span> <i class="icon-libreoffice"></i></a></li>  
     
      
     
    
     
     
     
     
     
    
         
        
        
     
        
        
   
      <li class="has-ul"><a href="<?=base_url()?>admin/logout"><span>logout</span> <i class="icon-user-minus3"></i></a></li>
      
      
      
     
    </ul>
  </div>
</div>
