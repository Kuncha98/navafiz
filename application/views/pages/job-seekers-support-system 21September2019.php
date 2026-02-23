<?php $this->load->view('header.php'); ?>
<body>
<div class="page">
<?php $this->load->view('pagetop.php'); ?>
<div class="clearfix"></div>
<?php     $this->load->view('pages/job-seekers-support-system-tabs'); ?>    
<div class="clearfix"></div>
<section class="featured-jobs">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="Heading-title black">
              <h1>Navafiz Professionals Community</h1>
            </div>
          </div>
          <?php 
            $p=1;
            if($relatedprofiles!='empty') {
                foreach(@$relatedprofiles as $relatedprofile){
                    if($relatedprofile->m_avatar!='')
                ?>
            <div class="col-md-4 col-sm-6 col-xs-12"> 

            <a href="<?=base_url('profile/'.$relatedprofile->m_id)?>">
              <div class="company-list-box"> 
                    <span class="company-list-img">
                    <?php if($relatedprofile->m_avatar !="")   {?>
                    <img src="<?=base_url()?>assets/uploads/members/<?=($relatedprofile->m_avatar == "")?"default.png":$relatedprofile->m_avatar?>" class="img-responsive" alt="<?=$relatedprofile->m_name?>" style="border-radius: 14px !important;border: 2px solid #215374;">
                    <?php }else{?>
                        <img src="<?=base_url()?>assets/uploads/members/<?=($relatedprofile->m_avatar == "")?"default.png":$relatedprofile->m_avatar?>" class="img-responsive" alt="<?=$relatedprofile->m_name?>" style="border-radius: 14px !important;border: 2px solid #215374;">
                    <?php } ?>        
                    </span>
                <div class="company-list-box-detail">
                  <h5>
                    <?=$relatedprofile->m_name?>
                  </h5>
                    <p style="letter-spacing: 0px;font-size: 13px;">
                        <?=$relatedprofile->m_profession?>
                    </p>
                    <div class="ratings"> 
                    <?=$relatedprofile->m_current_city?></div>
                    <div class="media-body"> 
                        <div>
                            <small><strong>Skill: </strong>
                          <?php
                          $str_arr = explode(",",$relatedprofile->m_skills);			  
                          if($str_arr){?>              
                          <?php for($a= 0; $a< sizeof($str_arr); $a++){
                              if($a>6)
                                  break;
                              ?>
                          <a href="#"> <?= $str_arr[$a];?> , </a>
                          <?php                                                 
                          } }  ?>
                          </small></div>
                        <div>
                            <small> 
                            <strong> Qualification:</strong> 
                            <?php
                            $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."' order by me_year desc limit 0,1 ";
                            $edu_results = $this->db->query($qry)->result();                                                
                            if($edu_results)
                            {
                            foreach($edu_results as $edu_result){?> 
                            <?=$edu_result->me_descr?>                                                
                            <?php break;} }?> 
                        </small>
                        </div>
                        <div><small><strong> Employment Status:</strong>
                          <?=$relatedprofile->employment_status?>
                          </small></div>
                        <div><small><strong>Visa Status:</strong>
                          <?=$relatedprofile->visa_status?>
                          </small></div>
                        <div><small><strong>Email:</strong>
                          <?=$relatedprofile->m_email?>
                          </small></div>
                      </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              </a> 
                <div class="clearfix"></div>
            </div>
          
          <?php } }?>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="load-more-btn">
              <a href="<?=base_url()?>professionals" class="btn-default"> View All <i class="fa fa-angle-right"></i> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>