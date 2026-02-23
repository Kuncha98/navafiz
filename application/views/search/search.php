<?php
$session_user_id = $this->session->userdata('user_id');
?>


<?php $this->load->view('include/header-training'); ?>

<style>
    
    
    .card{
        margin-bottom: 30px;
    }
  

  
  .col-md-2 button .fa-angle-right {
    margin-top: 0;
    font-size: 20px;
    vertical-align: bottom;
    margin-left: 4px;
    color: #fff;
  }
  .col-md-7 input{
    padding: .375rem 2.75rem;
  }


    .profile-list .skills a {
        background-color: #f1f1f1;
        border-radius: 5px;
        font-size: 16px;
        margin: 0 10px 10px 0;
        padding: 5px 20px;
        text-transform: uppercase;
    }
    
    .proimg{    
        border-radius: 8px !important;
        border: 2px solid #215374;
        display: block;
        width: 110px;
        height: 110px;
        float: left;
        margin-right: 20px;
        background-size: cover;
    }
    a{
        text-decoration: none;
        color: #000;
    }
    .picandinfo p{
        font-size: 13px;
    }
    .userinfo a{
        font-weight: bold;
        text-decoration: none;
        font-size: 13px;
    }
    .heading{
        font-weight: bold;
        font-size: 13px;
        border-bottom: 1px solid #ccc;
        margin-top: 0px;
        margin-bottom: 5px;
    }
    .detail{
        font-size: 13px;
        text-decoration: none;
    }

    .Heading-title-left h1
    {
      margin: 3% 0 5% 0;
    }
    .Heading-title-left h1::after {
        background-color: #242424;
        top: 100px;
        content: "";
        height: 1px;
        left: 0;
        margin: 0 auto;
        position: absolute;
        right: 0;
        width: 59px;
    }

    .Heading-title-left h1::before {
        background-color: #242424;
        top: 90px;
        content: "";
        height: 1px;
        left: 0;
        margin: 0 auto;
        position: absolute;
        right: 0;
        width: 99px;
     }
     
     @media screen and (max-width: 450px){
         .tabs_options a{
             max-width: 100%;
             display: block;
             margin-bottom: 9px;
         }
    }
    
    @media screen and (max-width: 400px){
        .tabs_options a{
            max-width: 100%;
            display: block;
            margin-bottom: 9px;
             
         }
    }
     

    
    
    
    .search-box input {
        margin-right: 36px;
        border-radius: 60px 0 0 60px;
    }
    
   .cat-sel .f-prof {
        height: 60px;
        margin-left: -95px;
        /*background-color: #6ac142;*/
        font-family: 'Roboto', sans-serif;
        font-size: 13px;
        /*color: #ffffff;*/
        padding: 10.5px 40px;
        font-size: 15px;
        line-height: 38px;
        text-align: center;
        cursor: pointer;
        display: inline-block;
        border: 2px solid #6ac142;
        transition: .3s;
      }
   .cat-sel .f-job {
        border-radius: 0px 60px 60px 0px;
        height: 60px;
        margin-left: -4px;
        background-color: #6ac142;
        font-family: 'Roboto', sans-serif;
        font-size: 13px;
        color: #ffffff;
        padding: 10.5px 40px;
        font-size: 15px;
        line-height: 38px;
        text-align: center;
        cursor: pointer;
        display: inline-block;
        border: 2px solid #6ac142;
        transition: .3s;
      }
    
    .search-box .cat-sel{
        display:inline-block;
        margin-left: -5px;
        height: 60px;
        border: 0;
        width: 30%;
        padding-left: 60px;
        border-left: 1px solid #ebebeb;
        margin-top: -1px;
    }

    .search-box input{
        margin-right: 36px;
        height: 60px;
        border: 0;
        width: 37%;
        padding-left: 154px;
        border-left: 1px solid #ebebeb;
        margin-top: -1px;
    }
    #bck-wrapper .search-box{
        margin-top: 90px;
        margin-bottom: 115px;

    }
    #bck-wrapper .navbar-brand img {
        margin-top: 20px;
        max-width: 470px;
    }
    
    #flag-profile{
        margin: 0;
    }

    
    
@media screen and (max-width: 1200px){
        .search-box input {
            padding-left: 95px;
            margin-right: 60px;
        }
        
        .search-box .cat-sel{
            margin-left: 66px;
        }
        .cat-sel .f-prof {
            margin-left: -212px;
        }
        
        .cat-sel .f-job {
            margin-left: -21px;
        }
        
}
    
@media screen and (max-width: 767px) {
    
    #back-wrapper .search-box{
        margin-left: 22px !important;
    }
    
    .search-box .inpt-search {
        width: 100%;
        margin-left: -43px;
        border-radius: 0;
        margin-top: 15px;
        height: 45px;
        padding-left: 88px;
    }
    .search-box .cat-sel {
        width: 100%;
        border-radius: 0;
        margin-left: -43px;
        border-radius: 0;
        margin-top: 0;
        height: 45px;
    }
    
    .search-box .f-job {
        width: 124%;
        border-radius: 0;
        margin-left: -60px;
        border-radius: 0;
        margin-top: 15px;
        height: 53px;
        }
    .search-box .f-prof {
        width: 124%;
        border-radius: 0;
        margin-left: -60px;
        border-radius: 0;
        margin-top: 15px;
        height: 53px;
        }
        
        #bck-wrapper .navbar-brand img {
            margin-top: 20px;
            max-width: 390px;
        }
       
}


    @media screen and (max-width: 450px){
        .search-box .f-prof {
             width: 126%;
             margin-left: -60px;
        }
        .search-box .f-job {
            width: 126%;
            margin-left: -60px;
        }
        #bck-wrapper .navbar-brand img {
            margin-top: 20px;
            max-width: 271px;
        }
        .fa-star{
            font-size:20px !important;
            margin: 0 !important;
        }
        
    }
    
    @media screen and (max-width: 400px){
        .fa-star{
            font-size:20px;
            margin: 0 !important;
        }
        .search-box .f-prof {
             width: 131%;
             margin-left: -60px;
        }
        .search-box .f-job {
            width: 131%;
            margin-left: -60px;
        }
        #bck-wrapper .navbar-brand img {
            margin-top: 20px;
            max-width: 271px;
        }
    }
</style>
<?php // echo $value; exit();?>
<div class="" id="bck-wrapper" style="">
    
    <div class="container">
        <div class="text-center">
            <div class="navbar-brand">
                <img src="<?= site_url('assets/frontend/images/search_logo.png')?>" alt="Navafiz">
            </div>
        </div>
        <div class="text-center">
            <h3 class="text-center">Recruiters Find Professionals | Professionals Find Jobs</h3>
        </div>
        <form action="<?= site_url('search_result')?>" method="post" class="Search" id="search_form">
        <div class="row">
            <div class="offset-2 col-md-12">
              
                    <div class="search-box col-12">
                        <input type="text" name="search_keyword"  id="search_keyword" placeholder="Keyword Search" class="inpt-search">
                        <div class="cat-sel" name="search_id" id="search_id">
                            <button id="prof-btn" class="f-prof outline white-green" type="button" value="1">Find Professionals</button>
                            <button id="job-btn" class="f-job "type="button" value="2">Find jobs</button>
                        </div>
                        <input type="hidden" name="search_id" id="search_val">
                        <!--<button type="submit" class="btn-search">Find jobs</button>-->
                    </div>
                
            </div>
        </div>
    </form>
   
        
        
        <!--Featured Profile And Job-->
        
<style>
    #job_prof_cards .card{
        height: 640px;
    }
</style>  
 
<div id="job_prof_cards">
       <div class="row">
        <?php if(isset($featuredMember->member_id) && $featuredMember->member_id > 0){ ?>
        <?php $user = GetUserName($featuredMember->member_id); var_dump($user); ?>  
        <?php $member_img  = !empty($user[0]->m_avatar) ? $user[0]->m_avatar:'default.png'; ?>
        
        
        <!-- php $member_img  = !empty($user) && !empty($user[0]->m_avatar) ? $user[0]->m_avatar : 'default.png'; ?> -->
        <!-- php
            if (!empty($user)) {
                var_dump($user[0]->m_avatar);
                exit;
            } else {
                echo "not work";
                exit;
            }
            ?> -->



        <div class="col-md-6 col-xs-12">
               <?php 
            if(empty($isFeaturedProfile)){
                $flag = 'yes';
            }else{
                $flag = 'no';
            }
            ?>
                <a href="<?=site_url('users_list/users_by_list/82')?>"><h2 class="text-center mb-3">Featured Profile</h2></a>
            <div class="card">
                <div class="card-body">
                    <div class="picandinfo">
                        <a href="<?=site_url('profile/'.$user[0]->m_id);?>" class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');">
                            
                        </a>                
                        <div class="userinfo">                            
                            <a href="<?=site_url('profile/'.$user[0]->m_id);?>"><h5><?=$user[0]->m_name?></h5></a>
                            <p>
                               <?=substr($user[0]->m_profession,0,50)?> <br />
                               <?=$user[0]->m_current_city?> <br />
                               <?php if($flag == 'yes'){ ?>
                                        <i id="flag-profile" class="fas fa-star fa-1x"></i> <br />
                                 <?php } ?>
                                Last Login: <?php echo DateTimeFormat($user[0]->last_login_date); ?>						
                               <br />
                               Mentor: <b><?=$user[0]->mentor_id>0 ? BasicInfoUser($user[0]->mentor_id)->m_name:' Not Assigend ';?></b>
                            </p>                                        
                        </div>
                        <div class="clearfix"></div>
                        <div class="media-body">                         
                                <div class="heading">
                                     Profession:
                                </div>
                                <div class="detail">
                                    <?=$user[0]->m_profession?>
                                </div>
                                <div class="heading">
                                     Skills:
                                </div>
                                <div class="detail">
                                    <?php $words = $user[0]->m_skills; $str_words = explode (",", $words);?>
                                    <?php foreach($str_words as $skill){ ?>
                                      <span style="padding-right: 14px;padding-left: 14px;border-radius:7px; margin-right: 2px;position:relative;top:0;left:-12px;font-weight: 400;bold:unset;" class="badge badge-pill badge-primary pt-1 pb-1 mb-1"><?=$skill?></span>
                                    <?php } ?>
                                </div>

                            <?php 
                            $user_cert = GetAllCert($user[0]->m_id); 


                            ?>
                            <?php if(!empty($user_cert)){ ?>
                                <div class="heading">
                                     Certification:
                                </div>
                            <div class="detail">
                            <?php foreach($user_cert as $cert){?>
                                
                                    <?php echo $cert->c_title.','?>
                                
                            <?php } ?>
                                </div>
                            <?php
                            } 
                            ?>
                                <div class="heading">Home Town:</div>
                                <div class="detail">
                                    <?=$user[0]->m_city;?>
                                </div>
                                <div class="heading">Employer:</div>
                                <div class="detail">
                                    <?=$user[0]->m_employer?>
                                </div>
                                <div class="heading">Employment Status:</div>
                                <div class="detail">
                                    <?=$user[0]->employment_status?>
                                </div>
                                <div class="heading">Visa Status:</div>
                                <div class="detail">
                                    <?=$user[0]->visa_status?>
                                </div>
                                <?php if(isset($session_user_id) && intval($session_user_id) > 0){ 
                                    if(in_array($session_user_id, CvReviewTeamList())){?>
                                <div class="heading">Email</div>
                                <div class="detail">
                                    <?=$user[0]->m_email?>
                                </div>
                                <div class="heading">Registered On:</div>
                                <div class="detail">
                                    <?php echo DateTimeFormat($user[0]->added_on);?>                            
                                </div>
                                <?php } } ?>
                        </div>                            
                    </div>
                </div>
            </div>
                <div class="text-center">
                    <a href="<?=site_url('professionals')?>" class="btn btn-outline-primary">Find More Professionals</a>
                </div>    
         
        </div>
           <?php } ?>
       
        <div class="col-md-6 col-xs-12">
            <!-- <php echo "<pre>"; var_dump($featuredJob);
            echo "<br>";
            echo count($featuredJob); ?> -->
            <?php if(isset($featuredJob->j_id) && $featuredJob->j_id > 0){?>
             <a href="<?=site_url('jobs')?>"><h2 class="text-center mb-3">Featured Job</h2></a>
            <div class="card "> 
            <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                <!--<a href="<?=site_url('jobs/delete/'.$featuredJob->j_id);?>" style="position: absolute;right: -10px;top: -26px;font-weight: bold;font-size: 30px;" onclick="return confirm('Are you sure you want to delete this?')">X</a>-->
            <?php }?>
            <a href="<?=base_url()?>job/<?=$featuredJob->j_id?>/<?php echo $featuredJob->j_slug?>">
                <div class="img" style="width: 100%;height: 345px;background:#ccc url('<?=base_url()?>/assets/uploads/jobs/<?=($featuredJob->j_image == "")?"noimage.png":$featuredJob->j_image ?>?v=1') center center;background-size: cover;"></div>
                <div class="card-body" style="font-size: 13px;">                    
                    <b><?=$featuredJob->j_title?></b>
                    <hr>                                        
                    <b><?=$featuredJob->j_location;?></b>  <span class="float-right"><b><?=date("M d-Y",$featuredJob->j_add_date)?></b></span>
                    <p>
                        <?=  substr(strip_tags($featuredJob->j_descr, '<>'), 0,200);?>                    
                    </p>
                    <p>
                        <button type="button" class="float-right btn btn-success m-2 p-1">View Detail</button>
                    </p>
                    
                </div>
            </a>                
        </div>
             <div class="text-center">
                 <a href="<?=site_url('jobs')?>" class="btn btn-outline-primary">Find More Jobs</a>
             </div>  
             
            </div>
            <?php }  ?>
            
        </div> 
    </div>  
</div>


<div>
    <div class="container">
<h2 class="text-center mt-5">How can your Resume stand out? NAVAFIZ</h2>
<iframe class="ml-4 mt-5 text-center" width="1024" height="538" src="https://www.youtube.com/embed/Pckf1GeUpIg" title="How can your Resume stand out? | NAVAFIZ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
<h3 class="container my-4"> Here are five ways to make your resume stand out from the competition.</h4>
<h6 class="container mt-3">
- Respond Directly to the Job Description. <br><br>
- Describe Accomplishments, Not Responsibilities. <br><br> 
- Quantify Your Accomplishments. ... <br><br>
- Use the Summary Section for Distinguishing Details. ... <br><br>
- Ignore Irrelevant Information. </h6></div>

</div>
<?php  ?>

<?php $this->load->view('include/footer');?> 

<script>
$(document).ready(function(){  
    var selected_button = '<?php echo $value?>';
    console.log(selected_button);
//    $('#search_val').val('heeere')
    if(selected_button == 'professionals'){
        $('#prof-btn').css({"background-color":"#6ac142","color":"#fff"});
        $('#job-btn').css({"background-color":"#fff","color":"#000"});
        $('#search_val').val('1');
    }
    
    $('#job-btn').click(function(){
        $(this).css({"background-color":"#6ac142","color":"#fff"});
        $('#prof-btn').css({"background-color":"#fff","color":"#000"});
        $('#search_val').val('2');
        $('#search_form').submit()
    })
    
    $('#prof-btn').click(function(){
        $(this).css({"background-color":"#6ac142","color":"#fff"});
        $('#job-btn').css({"background-color":"#fff","color":"#000"});
        $('#search_val').val('1');
         
        $('#search_form').submit()
    })
})
</script>
