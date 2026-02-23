<?php $this->load->view('include/header');
$user_id = $this->session->userdata('user_id');

?>
<style>
.profile-list .skills a {
    background-color: #f1f1f1;
    border-radius: 5px;
    font-size: 16px;
    margin: 0 10px 10px 0;
    padding: 5px 20px;
    text-transform: uppercase;
}
.resume-box .my-contact{
    margin-top: 3px !important;
}
.cardstyle2{
    border: solid 1px #cdcdcd;
    background-color: #fcfcfc;
    border-radius: 7px;
}
</style>
<script src="http://html2canvas.hertzen.com/build/html2canvas.js"></script>
<div class="container usercard">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="Heading-title-left black small-heading">
                <h1>Job Search Card</h1>
                <h4>Job Search is about self marketing.</h4>

                <p>Job Search Card helps to promote you on social media to highlight that you are looking for job .... it increase the chances of HR personals to contact you.</p>
                <p>
                    How to promote yourself ? <br />
                    Take the snapshot of your Navafiz Job Search Card (As shown Below), and Share it on LinkedIn, Facebook, WhatsApp and other Social Media. You can Tag Navafiz or use #Navafiz.
                </p>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <style>
                    .cardstyle1{
                        border: solid 1px #cdcdcd;
                        background-color: #fcfcfc;
                        border-radius: 7px;
                        font-size: 13px;
                    }
                    .cardstyle1 .picandinfo{
                        padding: 20px;
                        font-size: 13px;
                    }
                    .cardstyle1 .picandinfo .proimg{    
                        border-radius: 8px !important;
                        border: 2px solid #215374;
                        display: block;
                        width: 110px;
                        height: 110px;
                        float: left;
                        margin-right: 20px;
                        background-size: cover;
                    }
                    .cardstyle1 a{
                        text-decoration: none;
                        color: #000;
                    }
                    .cardstyle1 .picandinfo p{
                        font-size: 13px;
                    }
                    .cardstyle1 .picandinfo .userinfo a{
                        font-weight: bold;
                        text-decoration: none;
                        font-size: 13px;
                    }
                    .heading{
                        font-weight: bold;
                        font-size: 13px;
                        border-bottom: 1px solid #ccc;
                        margin-top: 20px;
                        margin-bottom: 5px;
                    }
                    .detail{
                        font-size: 13px;
                        text-decoration: none;
                    }
                </style>
                <?php $member_img  = !empty($pro_details->m_avatar) ? $pro_details->m_avatar:'default.png'; ?>
                <div class="cardstyle1">
                    <div class="picandinfo">
                        <div class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');"></div>
                        <div class="userinfo">
                            <a href="#" class="namedesig">
                                <?= isset($pro_details->m_name) ? $pro_details->m_name : ''?>
                            </a>
                            <p>
                                <?= isset($pro_details->m_profession) ? $pro_details->m_profession : '' ?> <br>
                                <?=  isset($pro_details->m_current_city) ? ucwords($pro_details->m_current_city) : '';?>
                            </p>
                            <p class="ratings"> </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="media-body"> 
                            <div class="heading">
                                 Skills:
                            </div>
                            <div class="detail">
                                <?php
                                $str_arr = explode(",",$profile->m_skills);			  
                                if($str_arr){?>              
                                <?php for($a= 0; $a< sizeof($str_arr); $a++){
                                    if($a>6 )
                                        break;
                                    ?>
                                <!--<a href="#"> <?= $str_arr[$a];?> , </a>-->
                                <span style="padding-right: 14px;padding-left: 14px;border-radius:7px; margin-right: 2px;position:relative;top:0;left:-12px;font-weight: 400;bold:unset;" class="badge badge-pill badge-primary pt-1 pb-1 mb-1"><?=$str_arr[$a]?></span>
                                <?php                                                 
                                } }  ?>
                            </div>
                            <div class="heading">Academic Qualification:</div>
                            <div class="detail">
                                <?php
                                $qry= "select * from jb_member_education where me_member_id = '".$profile->m_id."' order by me_year desc limit 0,1 ";
                                $edu_results = $this->db->query($qry)->result();                                                
                                if($edu_results)
                                {
                                foreach($edu_results as $edu_result){?> 
                                <?=$edu_result->me_descr?>                                                
                                <?php break;} }?> 
                            </div>
                            <?php if(intval($user_id) > 0 && isset($user_id)){ 
                                    if(in_array($user_id, MentorsAndRecruiters())) {?>
                            <div class="heading">Mobile Number:</div>
                            <div class="detail">
                                <?= isset($pro_details->m_phone) ? : '' ;?>
                            </div>
                            <?php }  } ?>
                            <div class="heading">Email:</div>
                            <div class="detail">
                                <?= isset($pro_details->m_email) ? $pro_details->m_email : '' ?>
                            </div>
                            <div class="heading">Profile Link:</div>
                            <div class="detail">
                                <a href="<?=site_url('profile/'.$profile->m_id);?>"><?=site_url('profile/'.$profile->m_id);?></a>
                            </div>
                            <div class="heading">Profession Category:</div>
                            <div class="detail">
                                <?=GetCategoryName(intval($profile->m_category));?>
                            </div>
                            <div class="heading">Resume:</div>
                            <div class="detail">
                                <?php
                                $get_review_status = CVreviewStatusByUser($card_user_id);
                                $review_status = isset($get_review_status->review_status) ? $get_review_status->review_status:'';
                                if($review_status=='review_done'){?>
                                Resume <img src="<?=site_url('assets/frontend/images/cvreview-approved.png');?>" width="18" style="vertical-align: top" />
                                <?php
                                }  
                                ?>
                            </div>                            
                        </div>
                    </div>                                
                </div>
            </div>
            
        </div>
    </div>
    <?php if(isset($pro_details->m_id)){
                $profile_id = $pro_details->m_id;
            } else{
            $profile_id = $profile->m_id;
    } ?>
    <div class="row">
        <p style="padding: 20px 0 0 30px;">
            <!--<a href="<?=site_url('edit-profile');?>" class="btn btn-info">Edit Profile</a>-->
            <a href="<?=site_url('track_steps/sheet/'.$profile_id );?>" class="btn btn-info">Tracking Sheet</a>
        </p>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>
