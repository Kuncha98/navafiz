<?php $this->load->view('include/header.php');?>
<style>
.panel-body ul {
	list-style: none !important;
}

.post_ach{
	margin: 0 auto;

}

form{
	width: 100%;
}
.post_ach .title{

	font-size: 20px;
	text-align: center;
	font-weight: bold;
}
</style>

<section class="dashboard-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">            
                <div class="row">
                	<div class="col-md-6 col-sm-8 col-xs-12 post_ach" >
                    <?php $this->load->view('notification/notification-messages');?>
                    <div class="heading-inner first-heading">
                      <p class="title">Post Achievement</p>
                    </div>
                    <div class="row">
                    	<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
	                      <div class="form-group"> <span class="errormessage"></span> </div>
	                      <p id="regmessage" class="text-success" style="display:none; font-size:16px; font-weight:bold;"> </p>
	                      <div class="profile-edit row boxed box-to-clone education-box">
	                          <form class="form-horizontal" method="post" action="<?=base_url('achievements/post')?>" id="memberpage">
	                              <div class="col-md-12 col-sm-12">
	                                <div class="form-group">
	                                  <label>Subject <span class="required">*</span></label>
	                                  <input type="text" id="subject" name="title"  value="<?=isset($curr_achievment->title) ? $curr_achievment->title: ""; ?>" class="form-control" required/>
	                                </div>
	                              </div>
	                              <div class="col-md-12 col-sm-12">
	                                <div class="form-group">
	                                  <label>Detail <span class="required">*</span></label>
	                                  <textarea type="text" id="descr" name="description"  class="form-control" required><?=isset($curr_achievment->description) ? $curr_achievment->description: ""; ?></textarea>

	                                </div>
	                              </div>
	                              <div class="col-md-12 col-sm-12">
	                                <button class="btn btn-primary pull-right" type="submit"> Submit <i class="fa fa-angle-right" style="margin-top: 0; font-size: 14px; color: #fff;"></i></button>
	                              </div>
	                              <input type="hidden" name="do_post" value="1">
	                              <input type="hidden" name="achive_id" value="<?=isset($curr_achievment->id) ? $curr_achievment->id: 0; ?>">
	                        </form>
	                      </div>
	                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <?php $this->load->view('include/footer.php'); ?>
 
  <script>