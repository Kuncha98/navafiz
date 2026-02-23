<?php $this->load->view('header.php'); ?>
<style>
    label{
        font-size: 12px !important;
    }
</style>
<body>
<div class="page category-page">
    <?php $this->load->view('pagetop.php'); ?>
    <div class="container">
        <?php $this->load->view('notification/notification-messages');?>
        <form action="<?=base_url('cvreview/AddCvReview');?>" method="post" id="pointsfrm" enctype="multipart/form-data">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 50px auto 0 auto;">
                <div class="row">                           
                  <h3>Submit CV for Review</h3>
                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>1. Profession (position you are looking for) must be shown on Top of your CV.  ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_1" class="cvr_point" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_1" class="cvr_point" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_1" class="cvr_point" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>2. Availability/Visa Status shall be shown on Top of your CV. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_2" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_2" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_2" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>3. Contact Details (Email, mobile) shall be on Top of your CV. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_3" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_3" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_3" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>4. Candidate photo must be appropriate. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_4" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_4" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_4" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>5. Skill summary shall be shown for quick review of capabilities. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_5" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_5" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_5" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>6.  All Employment Dates and total years of experience must be provided. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_6" class="cvr_point" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_6" class="cvr_point" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_6" class="cvr_point" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>7. Tables and Boxes shall not be used on CV.    ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_7" class="cvr_point" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_7" class="cvr_point" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_7" class="cvr_point" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>8. Header and footer shall be used only for page numbering, and personal data shall not be in header footer. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_8" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_8" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_8" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>9. CV shall contain reasonable amount of key words related to profession. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_9" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_9" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_9" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>10. Soft Skills shall be shown related to the field, if applicable. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_10" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_10" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_10" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>11. Objectives (if shown), shall not be generic. Must be the actual and personal professional objectives. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_11" class="cvr_point" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_11" class="cvr_point" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_11" class="cvr_point" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>12. Show your Achievements below Job responsibilities or capabilities. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_12" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_12" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_12" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>13. Don’t show Passport or other personal document numbers, unless required. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_13" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_13" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_13" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>14. There shall be no Typing Mistake. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_14" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_14" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_14" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>15. Font Sizes shall be appropriate, not too big or too small. Also don’t use much variety of sizes or font types (Also mind the scale) ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_15" class="cvr_point" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_15" class="cvr_point" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_15" class="cvr_point" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>16. CV Shall not exceed more than 3 Pages. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_16" class="cvr_point" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_16" class="cvr_point" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_16" class="cvr_point" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>17.  A reasonable White Space shall be available on CV. It shall not be too congested. Also reasonable margin shall be provided for filing. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_17" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_17" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_17" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>18. "Email Address” must be Professional. Email addresses like, prince, rock, playboy, etc. are not acceptable. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_18" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_18" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_18" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>19. "Email Display Name” must be appropriate. Display names like Ch@nd**, prince, rock, playboy, etc. are not acceptable. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_19" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_19" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_19" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>20. CV Soft file name shall display your profession and Name. Generic names like, CV, new CV, or just name are not acceptable. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_20" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_20" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_20" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong>21. Cover Letter shall be provided along with CV and shall be appropriate and not generic. ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_21" class="" id="option1" required="" value="Yes"> Yes                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="cvr_point_21" class="" id="option2" required="" value="No"> No                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="cvr_point_21" class="" id="option3" required="" value="Not Applicable"> Not Applicable 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                                  <div class="col-md-12 col-sm-8 col-xs-12" style="margin-top: 20px;font-size: 15px;font-weight: bold;">
                      <input type="checkbox" id="confirmcvreview" required="">
                      I have gone through 21 points and have compared my resume with <a style="color: blue;" href="http://localhost/navafiz_local/public-assets/Navafiz-Standard-cv-jan-2017.pdf" target="_blank">Navafiz Resume Format.</a>
                      
                    
                    <div class="col-md-11" style="line-height: 35px;">
                        
                         <!--I assure that my Resume is now improved as per best of my knowledge.-->
                    </div>
                </div>
                <div class="clearfix"></div>
                
                </div>
            </div>            
            <div class="row">
                <button type="submit" id="submittbn" class="btn btn-default col-md-8 col-sm-8 col-xs-10">Submit <i class="fa fa-angle-right"></i></button>
            </div>
        </form>
    </div>  
    <script>
    $(document).ready(function(){
        $('#confirmcvreview').on('change', function(e){
            if(e.target.checked){
              $('#myModal').modal();
            }
        });
        
        $('#myModal').on('hidden.bs.modal', function () {
            $('#confirmcvreview').prop('checked', false);
            //$('#confirmcvreview').attr('checked', true);
        });
        
        $('#yesiconfirm').click(function(){
            $('#submittbn').click();
        });
        
        $('.cvr_point').click(function(){
            $this = $(this);
            if($this.val()=='No' || $this.val()=='Not Applicable'){
                $('#cvr_checklist').modal();
                $('.cvr_ok').click(function(){
                    $this.prop('checked', false);
                });
                
            }
        });
    });
    </script>
    <?php $this->load->view('footerbottom.php'); ?> 
</div>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Declaration</h4>
      </div>
      <div class="modal-body">
          <h3 style="text-align: center;">
             I have gone through 21 points and have compared my resume with  <a style="color: blue;" href="<?=site_url('public-assets/Navafiz-Standard-cv-jan-2017.pdf');?>" target="_blank"> Navafiz Sample Format.</a> I assure that my Resume is now improved as per best of my knowledge.
          </h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <a href="javascript:void(0);" id="yesiconfirm" class="btn btn-default">Yes</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cvr_checklist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Self Review Report</h4>
      </div>
      <div class="modal-body">
          <h3 style="text-align: center;">
             Please Update Your resume and add required position on top, Refer <a style="color: blue;" href="<?=site_url('public-assets/Navafiz-Standard-cv-jan-2017.pdf');?>" target="_blank"> Navafiz Sample Format.</a>
             <br>
             All Employment Dates and total years of experience must be provided.
          </h3>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default cvr_ok" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>