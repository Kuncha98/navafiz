<?php 
$this->load->view('include/header.php'); 
$session_user_id = $this->session->userdata('user_id');


$assign_profile = BasicInfoUser($current_review->assign_user_to);
$user_details = BasicInfoUser($current_review->member_id);
$cvreview_team = CvReviewTeamList();
?>
<style>
    label{
        font-size: 12px !important;
    }
    ul{
        margin: 20px;
    }
    ul li{
        margin-bottom: 20px;
    }
    
</style>
<div class="container-mid">
    <?php $this->load->view('notification/notification-messages');?>        
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <h3>CV  Review Report</h3>
            <div class="card" style="margin-bottom: 10px;" id="showdetails_4119">                            
                <div class="card-header"> 
                    <a href="<?=site_url('profile/'.$current_review->member_id);?>" target="_blank">
                     <?=$user_details->m_name;?> | <?=$user_details->m_profession;?> | <?=$user_details->m_current_city;?> - <?=$current_review->member_id;?>
                    </a>
                    <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                        &nbsp;&nbsp;
                        <a class="btn btn-success float-right ml-3" href="<?=site_url('cvreview/ApprovReview/'.$current_review->review_id);?>" onclick="return confirm('Are sure you want to Approve?');">Approve</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger float-right mr-3" href="<?=site_url('cvreview/DisApprove/'.$current_review->review_id);?>" onclick="return confirm('Are sure you want to DisApprove?');">DisApprove</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php }?>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled" style="list-style: none !important;margin: 0;padding: 0;">
                    <li>
                      <div class="row">
                        <div class="col-sm-4">
                          <label>Title</label>
                        </div>
                        <div class="col-sm-8"><?=$current_review->review_title?></div>
                      </div>
                    </li>

                    <li>
                      <div class="row">
                        <div class="col-sm-4">
                          <label>Self Review - <?=date('d-M-Y - h:i A', strtotime($current_review->added_on));?></label>
                        </div>
                        <div class="col-sm-8">
                             I have gone through 21 points and have compared my resume with  Navafiz Sample Format. I assure that my Resume is now improved as per best of my knowledge.
                            <?php //nl2br($current_review->user_comments);?>
                        </div>
                      </div>
                    </li>

                    <li>
                        <div class="row" style="background: #ccc;border-radius: 5px;padding: 20px 0;">
                        <div class="col-sm-4">
                            <label style="font-size: 18px !important">Expert Advise - 
                              <?php 
                              if(!empty($current_review->updated_on)){
                                  echo date('d-M-Y - h:i A', strtotime($current_review->updated_on));
                              }                                          
                              ?>
                          </label>
                        </div>
                        <div class="col-sm-8"><?=nl2br($current_review->admin_comments);?></div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-sm-4">
                          <label>Assigned To</label>
                        </div>                                    
                        <div class="col-sm-8">
                            <form action="<?=site_url('cvreview/AssignCvReview')?>" class="assignfrm" method="post">
                                <select name="assign_user_to"  class="form-control select2">
                                    <option value="0">Select member</option> 
                                    <?php foreach($cvreview_team as $team_member_id){?>
                                    <option <?=$current_review->assign_user_to==$team_member_id ? 'selected="" ':'';?> value="<?=$team_member_id?>">
                                        <?=GetUserDetails($team_member_id)->m_name;?> - <?=GetUserDetails($team_member_id)->m_profession;?>
                                        | Assigned - (<?=GetCvReviewCountbyUser($team_member_id);?> ) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>$team_member_id));?>
                                    </option> 
                                    <?php }?>
                                </select>
                                <input type="hidden" name="review_id" value="<?=$current_review->review_id?>">
                                <input type="hidden" name="redirect_page" value="detail">
                                <input type="hidden" name="member_id" value="<?=$current_review->member_id?>">
                            </form>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-sm-4">
                          <label>Resume</label>
                        </div>
                        <div class="col-sm-8">
                            <a href="<?=site_url('public-assets/cvreviews/'.$current_review->resume_file);?>">
                                View
                            </a>                                            
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">            
            <div class="card">
                <div class="card-body">
                    <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                    <form action="<?=base_url('cvreport/'.$current_review->member_id);?>" method="post" enctype="multipart/form-data">                                                    
                        <h3>Expert Advise</h3>                                                    
                        <div class="form-group">
                          <label>Comments</label>
                          <textarea  name="admin_comments" class="form-control" style="height: 300px; " required>Dear <?=$user_details->m_name;?>, Welcome to Navafiz CV Review System.</textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary col-md-12">Submit</button>
                        </div>                            
                        <a class="btn btn-outline-secondary" href="<?=site_url('cvreviews-list')?>">Back to list</a>
                        <input type="hidden" name="do_post" value="1">
                        <input type="hidden" name="review_id" value="<?=$current_review->review_id?>">                    
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">            
            <div class="card">
                <div class="card-body">
                    <ul>
                        <?php 
                        $i=1;
                        foreach($cvr_points as $cvrpiont){?>
                        <li><strong><?=$i?>. <?=$cvrpiont->question;?> ?</strong></li>
                        <?php $i++; }?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">            
            <div class="card">
                <div class="card-body">                    
                    <h1>Review Helpers</h1>
                    <div style="padding-left: 20px;">
                       <?php
                          $logged_profile =  GetUserDetails($session_user_id);
                       ?>
                       <p style="border-bottom: 2px solid #ccc;">
                           Dear <?=$user_details->m_name;?>,<br>
                           Please note that following improvements are required in your Resume.
                       </p>
                       <p style="border-bottom: 2px solid #ccc;">
                           Dear <?=$user_details->m_name;?>,<br>
                           Your Resume is not as per Navafiz Format. Please update according to Navafiz Format. You can download sample from Home page.,<br>

                           For further discussion you may contact via Discussion Board on Home page. Or contact via whatsApp on 00971 55 446 5332. <br>

                           Regards,<br>
                           <?=GetUserDetails($session_user_id)->m_name;?>
                       </p>
                       <p style="border-bottom: 2px solid #ccc;">
                           Dear <?=$user_details->m_name;?>, <br>
                           Please note that following improvements are required in your Resume.<br>
                           <br>
                           <b>Headline :</b> Is Ok. Just reduce top & bottom white Space.<br>
                           <b>Profile Summary :</b> Please add few more points, As per Navafiz Recommendation there should be at least 10 Points.<br>
                           Education: If there is only one entry, then you can skip the Title. As it already covered in Headline. <br>
                           <br>
                           <b>Employment Record:</b> Add details about company business.<br>
                           Personal Profile: If you know Arabic, Add this in Headline Section. Driving License  can also be moved to headline.<br>
                           <br>
                           <b>History of Career :</b> is ok.
                           <br>
                           <b>Online Profile Links:</b> At the end add the links of your LinkedIn, Navafiz and Bayt Profiles.
                           <br>
                           <b>Navafiz Online Profile:</b> Add/Update your Employment History.
                           <br>

                           This way actually you can skip complete portion of Personal Profile. <br>
                           General Comments: There is too much Empty Space on Resume, Adjust it manage space wisely. <br>
                           <br>
                           For further discussion you may contact via Discussion Board on Home page. Or contact via whatsApp on 00971 55 446 5332.
                           <br>
                           Regards,<br>                    
                           <?=$logged_profile->m_name;?>
                       </p>
                       <p style="border-bottom: 2px solid #ccc;">
                           Dear <?=$user_details->m_name;?>, 
                           Please note that the following improvements are required in your Resume.<br><br>

                           Headline: Add Total years of Experience. Show the highest level of education. <br>
                           Career Summary: Please add a few more points, As per Navafiz Recommendation there should be at least 10 Points.<br>
                           Employment Record: Add details about company business.<br>
                           Personal Profile: If you know Arabic, Add this in Headline Section. Driving License can also be moved to headline.<br>
                           <br>
                           Online Profile Links: At the end add the links of your LinkedIn, Navafiz and Bayt Profiles. <br>
                           Navafiz Online Profile: Add/Update your Employment History. <br>
                           <br>
                           General Comments: There is too much Empty Space on the 2nd page, Adjust it manage space wisely. It's better if you can follow Navafiz resume format. <br>
                           <br>
                           For further discussion, you may contact via Discussion Board on the Home page. Or contact via WhatsApp on 00971 55 446 5332. <br>
                           Regards,<br>
                           <?=$logged_profile->m_name;?>
                       </p>
                       <p style="border-bottom: 2px solid #ccc;">
                           Formatting inconsistency: There are multiple font types used on your resume, Please use only one Type. 
                           Navafiz Recommended font is Calibri 12.
                       </p>
                       <p style="border-bottom: 2px solid #ccc;">
                           Dear <?=$user_details->m_name;?>, <br>
                           Thanks for contacting with Navafiz. <br>
                           Your Resume is not as per UAE Standard. Please update according to Navafiz Format.  <br>
                           You can download the Navafiz Resume sample from the Home page. <br>
                           Moreover, your Profile on Navafiz is also incomplete, please complete the missing data. <br>
                           For further discussion, you may contact via Discussion Board on the Home page. Or contact via WhatsApp on 00971 55 446 5332.  <br>
                           Regards,<br>
                           <?=$logged_profile->m_name;?>
                       </p>
                       <p style="border-bottom: 2px solid #ccc;">
                           Please use more professional Photograph. For Samples search "Executive photo" on google image search.
                       </p>
                       <p style="border-bottom: 2px solid #ccc;">
                           Dear <?=$user_details->m_name;?>, 
                           Please note that the following improvements are required in your Resume.
                       </p>
                       <p style="border-bottom: 2px solid #ccc;">
                           Headline: Show profession, Top 3 Skills, Total years of Experience and the highest level of education.
                       </p>
                       <p style="border-bottom: 2px solid #ccc;">
                           ACADEMIC QUALIFICATIONS: To be shown after Employment Record/History.
                       </p>
                       <p style="border-bottom: 2px solid #ccc;">
                           General Comments: For the better sequence of information,  It's advised to use Navafiz resume format.
                       </p>
                       <p style="border-bottom: 2px solid #ccc;">
                           HEADLINE/TOP SECTION: It isn't necessary to mention resume at the top because it's obvious, you can also use that space properly by being specific and short in terms of your address as it seems too lengthy.<br>
                           Also, try to mention your highest level of education or position for which you are interested in. <br>
                           It's better to mention single email Id. You can also add the link of any online profile like Navafiz, LinkedIn etc.<br>
                       </p>
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer.php'); ?> 
<script >
$(document).ready(function(){
    $('.assignfrm').change(function(){
        $(this).submit();        
    });        
    //$('.select2').select2();
});
</script>


