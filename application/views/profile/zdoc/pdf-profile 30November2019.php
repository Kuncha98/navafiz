<?php
$session_user_id= $this->session->userdata('user_id');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
    
    #profile{
      /*height: 500px;*/
      /*display: block;*/
    }
    #main_content {
      width: 30%;
      float: left;
/*      border:1px solid #e3e3e3;
      border-radius: 5px;*/
      padding: 5px;
    }
    #main_content #profile_pic{
        border-radius: 50% !important;
        border: 3px solid #215374;
        display: block;
        width: 150px;
        height: 150px;
        /*background-size: contain;*/
        margin: 0px auto 20px auto;
    }
    #main_content #profile_pic img{
      
/*      border-radius: 50% !important;
      border: 3px solid #215374;*/
      display: block;
      width: 150px;
      height: 150px;
    }

    #profile_data{
      text-align: center;
    }

     #profile_data p{
      font-size: 10px;
    }

    #education {
      width: 68%;
      float: left;
      margin-top: 5px;
      text-align: center;
    }
    
/*    #education #card{
      margin-bottom: 10px;
    }*/
    #education #card-header{

      padding:10px 3px;
    }

  /*  #main_content #card{

      margin-bottom: 10px;
    }
  */
  #card{
    width:100%;
    margin-bottom: 15px; 
  }

  #card-header{
    background-color:rgba(0,0,0,.03);border: 1px solid rgba(0,0,0,.125);vertical-align: middle;border-radius: 3px;
  }

  #card-body{
    padding: 10px 5px;border: 1px solid rgba(0,0,0,.125);
    border-radius: 2px;
  }

  #list li b{
    float: left !important;
  }
    
  </style>
</head>
<body>
  <!-- In production server. If you choose this, then comment the local server and uncomment this one-->
  <!-- <img src="<?php // echo $_SERVER['DOCUMENT_ROOT']."/media/dist/img/no-signal.png"; ?>" alt=""> -->
  <!-- In your local server -->
  
<!-- <div id="logo" >
          <img src="<?php echo $_SERVER['DOCUMENT_ROOT']."/test/ncode/assets/frontend/images/logo.png"; ?>" alt="" width="30%" height="40%">
</div> -->
  <div id="profile">
        
    <div id="main_content" >
      <div id="card" >
        <div id="card-header" style="text-align: center;padding:10px 3px;">
          <b><?= $profile->m_name;?></b>
        </div>
        <div id="card-body">
          <div id="profile_pic">
            <img src="<?php echo $_SERVER['DOCUMENT_ROOT']."/test/ncode/assets/uploads/members/". $profile->m_avatar; ?>" alt="">
      
          </div>
          <div class="views" style="text-align: center;">
              Profile Views
             
               <?= $profile->m_profile_view;?>
          </div>
          <p style="text-align: center;">
              <?=$profile->m_profession?>
              <br />
              <?=($profile->m_current_city == "")? "---":$profile->m_current_city?>
          </p>
        </div>
      </div>

      <div id="card" >
        <div id="card-header" style="text-align: center;padding:10px 3px;">
          Skills
        </div>
        <div id="card-body">
          <?php
            $str_arr = explode(",",$profile->m_skills);                               
            if($str_arr){?>              
            <?php for($a= 0; $a< sizeof($str_arr); $a++){?>
            <?=$str_arr[$a]?>, 
          <?php } }?>
        </div>
      </div>

      <div id="card" style="text-align: center;" >
        <div id="card-header" style="text-align: center;padding:10px 3px;">
          Additional Information
        </div>
        <div id="card-body">
          <b>Experience</b>
          <p> <?= $profile->m_experience;?></p>
          
          <b>Nationality</b>
          <p><?= $profile->m_nationality;?></p>

          <b>Visa Status</b> 
          <p><?= $profile->visa_status;?></p>

          <b>Qualification</b>
          <p>
           <?php
                      $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."' order by me_year desc limit 0,1 ";
                      $edu_results = $this->db->query($qry)->result();
                      if($edu_results){
                      foreach($edu_results as $edu_result){?>
                      <?=$edu_result->me_degree;?> - <?=$edu_result->me_descr;?>
                      <?php break; }}?> 
          </p>
          <b>Email address</b>
          <p> <?= $profile->m_email;?></p>

        </div>
      </div>

    </div>
    <div id="education"  >
  

      <div id="card ">
          <div id="card-header" style="text-align: center;">
              Summary of Career  
          </div>
          <div id="card-body">
            <div style="text-align: justify;">
                <?php if(!empty($summary_points->point_1)){?>     
                <p>1. <?=isset($summary_points->point_1)? $summary_points->point_1:'';?></p>
                <?php }?>
                <?php if(!empty($summary_points->point_2)){?> 
                <p>2. <?=isset($summary_points->point_2)? $summary_points->point_2:'';?></p>
                <?php }?>
                <?php if(!empty($summary_points->point_3)){?> 
                <p>3. <?=isset($summary_points->point_3)? $summary_points->point_3:'';?></p>
                <?php }?>
                <?php if(!empty($summary_points->point_4)){?> 
                <p>4. <?=isset($summary_points->point_4)? $summary_points->point_4:'';?></p>
                <?php }?>
                <?php if(!empty($summary_points->point_5)){?> 
                <p>5. <?=isset($summary_points->point_5)? $summary_points->point_5:'';?></p>
                <?php }?>
                <?php if(!empty($summary_points->point_6)){?> 
                <p>6. <?=isset($summary_points->point_6)? $summary_points->point_6:'';?></p>
                <?php }?>
                <?php if(!empty($summary_points->point_7)){?> 
                <p>7. <?=isset($summary_points->point_7)? $summary_points->point_7:'';?></p>
                <?php }?>
                <?php if(!empty($summary_points->point_8)){?> 
                <p>8. <?=isset($summary_points->point_8)? $summary_points->point_8:'';?></p>
                <?php }?>
                <?php if(!empty($summary_points->point_9)){?> 
                <p>9. <?=isset($summary_points->point_9)? $summary_points->point_9:'';?></p>
                <?php }?>
                <?php if(!empty($summary_points->point_10)){?> 
                <p>10. <?=isset($summary_points->point_10)? $summary_points->point_10:'';?></p>
                <?php }?>
            </div>
             
          </div>                        
      </div>


              Work Experience (Employment History)
          <?php foreach($employment_history as $emp_history){?>                    
          <div id="card">
              <div id="card-header" >
                Experience as <b><?=$emp_history->position_designation?></b>
              </div>
              <div id="card-body">
                  <ul id="list" style="list-style: none !important;">
                      <li>
                          <b>Employer:</b>
                            <?php
                                  $company_name = GetCompanyName(intval($emp_history->company_name));
                                  $company_id = GetCompanyName(intval($emp_history->company_id)); 
                                  ?>                       
                                   <?= !empty($company_name) ? $company_name : $company_id  ;?>
                          
                      </li>
                      <li>
                          <b>From: </b>
                          <?=$emp_history->start_year;?>
                      </li>
                      <li>
                          <b>To: </b>
                          <?=$emp_history->end_year;?>

                      </li>
                      <li>

                              <b>Detail: </b>
                              <?=nl2br($emp_history->description);?>
                          
                      </li>
                  </ul>
              </div>                        
          </div>
          <?php }?>  
                    Educational Information
        <?php
                    $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."'";
                    $edu_results = $this->db->query($qry)->result();
                    if($edu_results){?>
                    <?php foreach($edu_results as $edu_result){ ?>
                  
                    <div id="card">
                      <div id="card-header">
                        <b><?=$edu_result->me_degree;?>: </b><?=$edu_result->me_year;?>
                      </div>
                      <div id="card-body" style="">
                        <p><?=($edu_result->me_descr == "")? "---": $edu_result->me_descr;?></p>
                      </div>
                    </div>
                  
                    <?php }?>
                <?php }?>

          

          Achievements    
      <?php
          $qry= "select * from jb_achievements where user_id = '".$profile->m_id."'";
          $ach_results = $this->db->query($qry)->result();
          if($ach_results){?>
          <?php foreach($ach_results as $ach_results){ ?>
          <div id="card" style="margin-bottom: 15px;">
              <div id="card-header">
                  <b><?=$ach_results->title;?></b>  
                                               
              </div>
              <div id="card-body">                            
                  <?=($ach_results->description == "")? "---": $ach_results->description;?> 
                  <br />
                  <?php if($profile_id==$session_user_id){?>
                      <a style="text-align: right;" href="<?=site_url('achievements/post/'.$ach_results->id);?>"><i style="font-size: 16px;" class="fas fa-edit"></i></a>
                  <?php }?>
              </div>                        
          </div>                    
          <?php }?>
      <?php }?>

    </div>
  </div>
<div style="clear: both;"></div>
  <div style="width: 100%;">
      
  </div>
  

   <div style="width: 100%;">                    

        
    </div>
</body>
</html>