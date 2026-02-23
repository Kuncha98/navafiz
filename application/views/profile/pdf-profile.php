<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  border:1px solid;
}


/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

#main {
    width: 100%;
    border:1px solid;
    margin: 0 auto;
}
#main .profile {
  /*border-bottom: 2px solid #313131;*/
  height: 205px;    
  margin-top: 20px;
}
  #main .profile .content{
    padding: 10px 0px 0px 10px;
    float: left;
    width: 70%;
    margin-left: 10px;
/*    border:1px solid;*/
  }

  #main .profile .content p:first-child{
     text-decoration: underline ;
  }

  #main .profile .content p:last-child{
    margin-bottom: 15px;
  }

  #main .profile .profile_pic
  {
    text-align: center;
    float: left;
    width: 30%;
    /*border:1px solid;*/
  }


  #main .profile .profile_pic img{
      
    margin: 10px 0;
    margin-right: 30px;
    /*display: block;*/
    border-radius: 50% !important;
    border: 3px solid #EDEDED;
    width: 150px;
    /*height: 120px;*/
  }

  p{
    margin: 0;
  } 

  #summary{
      width: 94%;
      margin: auto;
      margin-top: 10px;
    }

    #summary .heading{
      background-color: #C6D9F1;
      color: #0033CC;
      margin-bottom: 15px;
      
      padding: 5px;
    }
    #summary .description ul{
          margin-top: 0;
          padding-left: 17px;
    }


   #achievements{
      width: 94%;
      margin: auto;
    }

    #achievements .heading{
      background-color: #C6D9F1;
      color: #0033CC;
      margin-bottom: 15px;
      
      padding: 5px;
    }
    #achievements .description ul{
          margin-top: 0;
          padding-left: 17px;
          list-style: square;
    }

    #major{
      width: 94%;
      margin: auto;
      margin-bottom: 10px;
    }

    #major .heading{
      background-color: #C6D9F1;
      color: #0033CC;
      margin-bottom: 15px;
      
      padding: 5px;
    }
    #major .description ul{
          margin-top: 0;
          padding-left: 17px;
          list-style: circle;
    }


    #education{
      width: 94%;
      margin: auto;
      margin-bottom: 10px;
    }

    #education .heading{
      background-color: #C6D9F1;
      color: #0033CC;
      margin-bottom: 15px;
      
      padding: 5px;
    }
    #education .description ul{
          margin-top: 0;
          padding-left: 17px;
          list-style: disc;
    }

    #skills{
      width: 94%;
      margin: auto;
      margin-bottom: 10px;
    }

    #skills .heading{
      background-color: #C6D9F1;
      color: #0033CC;
      margin-bottom: 15px;
      
      padding: 5px;
    }

    #employment{
      width: 94%;
      margin: auto;
      margin-bottom: 10px;
    }

    #employment .heading{
      background-color: #C6D9F1;
      color: #0033CC;
      margin-bottom: 15px;
      
      padding: 5px;
    }
    #employment .description .desc{
          
          background-color: #D9D9D9;
          padding: 3px;
          margin-bottom: 10px;

    }

    #personal{
      width: 94%;
      margin: auto;
      margin-bottom: 10px;
    }

    #personal .heading{
      background-color: #C6D9F1;
      color: #0033CC;
      margin-bottom: 15px;
      
      padding: 5px;
    }
    #personal .description ul{
          margin-top: 0;
          padding-left: 17px;
          list-style: square;
    }  
</style>
</head>
<body>
<div class="container" id="main">
  <div class="row">
    <div class="profile">
      <!-- <div class="column" > -->
        <div class="content">
          <p><b><?= $profile->m_name;?></b></p>
          <p>Position: <b><?= $profile->m_profession;?></b></p> 
          <p>Experience: <b><?= $profile->m_experience;?></b></p>
          <p>Educational Qualifications: <b> 
            <?php
              $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."' order by me_year desc limit 0,1 ";
              $edu_results = $this->db->query($qry)->result();
              if($edu_results){
              foreach($edu_results as $edu_result){?>
              <?=$edu_result->me_degree;?> - <?=$edu_result->me_descr;?>
            <?php break; }}?>
          </b></p>
          <p>Key Skills:
            <b> 
              <?php
                $str_arr = explode(",",$profile->m_skills);                               
                if($str_arr){?>              
                <?php for($a= 0; $a< sizeof($str_arr); $a++){?>
                <?=$str_arr[$a]?>, 
              <?php } }?>
                
            </b></p>
          <p>Mobile: <b><?= !empty($profile->m_mobile) ? $profile->m_mobile : $profile->m_phone;?></b></p>
          <p>Current Location: <b><?=($profile->m_current_city == "")? "---":$profile->m_current_city?></b></p>
          <p>Email: <b><?= $profile->m_email;?></b></p>
        </div>
      <!-- </div> -->
      

      <!-- <div class="column"> -->
        <div class="profile_pic">
            <img src="<?php echo "assets/uploads/members/". $profile->m_avatar; ?>" style="border-radius: 20px;" alt="">
        </div>
      <!-- </div> -->
    </div>
  </div>  

  <div id="summary">
    <div class="heading">
      <b>Summary of Career</b>
    </div>
    <div class="description">
      <div style="text-align: justify;">
        <style type="text/css">

        </style>
      
        <ul>
          <?php if(!empty($summary_points->point_1)){?>     
        <li>
        <p> <?=isset($summary_points->point_1)? $summary_points->point_1:'';?></p>
        </li>
        <?php }?>
        <?php if(!empty($summary_points->point_2)){?> 
        <li>
        <p> <?=isset($summary_points->point_2)? $summary_points->point_2:'';?></p>
        </li>
        <?php }?>
        <?php if(!empty($summary_points->point_3)){?> 
        <li>
        <p> <?=isset($summary_points->point_3)? $summary_points->point_3:'';?></p>
        </li>
        <?php }?>
        <?php if(!empty($summary_points->point_4)){?> 
        <li>        
        <p> <?=isset($summary_points->point_4)? $summary_points->point_4:'';?></p>
        </li>
        <?php }?>
        <?php if(!empty($summary_points->point_5)){?> 
        <li>
        <p> <?=isset($summary_points->point_5)? $summary_points->point_5:'';?></p>
        </li>
        <?php }?>
        <?php if(!empty($summary_points->point_6)){?> 
        <li>
        <p> <?=isset($summary_points->point_6)? $summary_points->point_6:'';?></p>
        </li>
        <?php }?>
        <?php if(!empty($summary_points->point_7)){?> 
        <li>
        <p> <?=isset($summary_points->point_7)? $summary_points->point_7:'';?></p>
        </li>
        <?php }?>
        <?php if(!empty($summary_points->point_8)){?> 
        <li>
        <p> <?=isset($summary_points->point_8)? $summary_points->point_8:'';?></p>
        </li>
        <?php }?>
        <?php if(!empty($summary_points->point_9)){?> 
        <li>
        <p> <?=isset($summary_points->point_9)? $summary_points->point_9:'';?></p>
        </li>
        <?php }?>
        <?php if(!empty($summary_points->point_10)){?> 
        <li>
        <p> <?=isset($summary_points->point_10)? $summary_points->point_10:'';?></p>
        </li>
        <?php }?>
        </ul>
    </div>
    </div>
  </div>

<?php
  $qry= "select * from jb_achievements where user_id = '".$profile->m_id."'";
  $ach_results = $this->db->query($qry)->result();
  if($ach_results){?>
  <div id="achievements">
    <div class="heading">
      <b>Achievements</b>
    </div>
    <div class="description">
      <ul>
        <?php foreach($ach_results as $ach_results){ ?>
          <li><?=$ach_results->title;?></li>               
        <?php }?>
      
      </ul>
    </div>
  </div> 
<?php }?> 

<?php 
  if($ach_results){?>
  <div id="major">
    <div class="heading">
      <b>Major Roles in Various Organizations</b>
    </div>
    <div class="description">
      <div class="row">
        <ul>

          <div class="col_li" style="float: left;width: 50%;">
              <?php foreach($employment_history as $emp_history){?>
                <li><?=$emp_history->position_designation?></li>
              <?php } ?>  
          </div>
          <div class="col_span" style="float: right;">
              <?php foreach($employment_history as $emp_history){?>
                <p>- <?= date( 'M Y', strtotime($emp_history->start_year));?> to <?= date( 'M Y', strtotime($emp_history->end_year));?></p>
              <?php }?>
          </div>
        
        </ul>
      </div>
    </div>
  </div> 
<?php } ?>

<?php
  $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."'";
  $edu_results = $this->db->query($qry)->result();
  if($edu_results){?>
  <div id="education">
    <div class="heading">
      <b>Educational Qualifications</b>
    </div>
    <div class="description">
      <div class="row">
        <ul>
          <div class="col_li" style="float: left;width: 50%;">
            <?php foreach($edu_results as $edu_result){ ?>
              <li><?=$edu_result->me_degree;?></li>
            <?php } ?>  
          </div>
          <div class="col_span" style="float: right;">
            <?php foreach($edu_results as $edu_result){ ?>
              <p>- <?= date( 'Y', strtotime($edu_result->me_year));?></p>
            <?php }?>
          </div>
                           
          
        </ul>
      
      </div>

    </div>
  </div> 
<?php } ?> 



  <div id="skills">
    <div class="heading">
      <b>Skills</b>
    </div>
    <div class="description">

      <?php
        $str_arr = explode(",",$profile->m_skills);                               
        if($str_arr){?>              
        <?php for($a= 0; $a< sizeof($str_arr); $a++){?> 
      
        <span> <?=$str_arr[$a]?> | </span>

      <?php } }?>
    </div>
  </div>

<?php if(!empty($employment_history)){?>
  <div id="employment">
    <div class="heading">
      <b>Employment Records</b>
    </div>
    <div class="description" >
    <?php foreach($employment_history as $emp_history){?>  
      <p><b>Name of Company
        <span style="margin-left: 6px;margin-right: 60px;  ">:</span>
        <?php
          $company_name = GetCompanyName(intval($emp_history->company_name));
          $company_id = GetCompanyName(intval($emp_history->company_id)); 
          ?>                       
           <?= !empty($company_name) ? $company_name : $company_id  ;?>
      </b></p>
      <p><b>Job Position 
        <span style="margin-left: 50px;margin-right: 60px;  ">:</span>
        <?=$emp_history->position_designation?>
      </b></p>
      <p><b>Year
        <span style="margin-left: 100px;margin-right: 60px;  ">:</span>
        <?= date( 'M Y', strtotime($emp_history->start_year));?> to <?= date( 'M Y', strtotime($emp_history->end_year));?>
      </b></p>

      <p class="desc"><?=nl2br($emp_history->description);?></p>
      <?php } ?>
    </div>
  </div>
<?php } ?>

  <div id="personal">
    <div class="heading">
      <b>Personal Details</b>
    </div>
    <div class="description">
      <ul style="text-transform: capitalize;">
        <!-- <li>Date of Birth: </li> -->
        <li>Religion 
          <span style="margin-left: 58px;margin-right: 60px;">:</span>  
         <?= $profile->m_religion;?></li>
        <li>Nationality   
          <span style="margin-left: 42px;margin-right: 60px;">:</span> 
            <?= $profile->m_nationality;?></li>
        <li>Martial Status
          <span style="margin-left: 24px;margin-right: 60px;  ">:</span>   
          <?= $profile->m_married_status;?>
        </li>
        <li>Language Known 
          <span style="margin-right: 60px;">:</span>   
          <?= $profile->m_languages;?></li>
      </ul>
    </div>
  </div>


</div>

</body>
</html>
