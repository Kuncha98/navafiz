<?php $this->load->view('include/header');?>
<section class="categories-list-page light-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="all-jobs-list-box2">
                    <?php if($tips!='empty') {?>
                        <?php foreach(@$tips as $tip){ ?>
                        <div class="job-box job-box-2">                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="job-title-box">
                                    <a href="#">
                                        <div class="job-title"> <?=$tip->st_title?></div>
                                    </a>                                  
                                </div>
                                <p><?=$tip->st_descr?></p>
                            </div>
                        </div>
                        <?php }?>
                    <?php }else{?>
                    <div role="alert" class="alert alert-danger alert-dismissible">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <strong></strong> - No data exits! 
                    </div>
                    <?php }?>
                    </div>                            
                </div>
            </div>
        </div>
        <div class="heading"><span class="title">Comments </span></div>
        <div class="comments-container ">
            <ul>
            <?php if($tipscomments!='empty') {?>
                <?php foreach(@$tipscomments as $tipscomment){ ?>
                    <li class="comment-box">
                        <div class="col-md-2 col-sm-3 col-xs-3 comment-author-image">
                            <?php if($tipscomment->facebook_id !=""){?>
                                <img src="http://graph.facebook.com/<?=$tipscomment->facebook_id?>/picture?type=large" class="img-circle img-responsive" alt="<?=$tipscomment->m_name?>" width="90" height="90">
                            <?php }else{ ?>
                                <img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($tipscomment->m_avatar == "")?"default.png":$tipscomment->m_avatar?>" class="img-circle img-responsive" alt="<?=$tipscomment->m_name?>" width="90" height="90">
                            <?php  }?>                    
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-9">
                            <h4><?=$tipscomment->m_name?></h4>
                            <div class="news-date">  <?=$tipscomment->com_add_date?></div>
                            <p> <?=$tipscomment->com_comments?></p>                           
                        </div>
                    </li>
                <?php }?>  
            <?php }?>
            </ul>
            <?php  if($this->session->userdata('user_id') != ""){?>
            <div class="commentform">
                <form class="row" action="<?=base_url()?>job/savecomments" method="post">
                   <input type="hidden" id="com_type" name="com_type" value="tips"/>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Comment <span class="required">*</span></label>
                            <textarea cols="6" rows="8" placeholder="Write the comments" class="form-control" required name="comments"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Name <span class="required">*</span></label>
                            <input type="text" placeholder="" class="form-control" value="<?php echo $this->session->userdata('name')?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Email <span class="required">*</span></label>
                            <input type="email" placeholder="" class="form-control"  value="<?php echo $this->session->userdata('email')?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <button class="btn btn-primary pull-right">Publish Comment </button>
                    </div>
                </form>
            </div>
            <?php  }?>
           </div>
    </div>
</section>
<?php $this->load->view('include/footer'); ?>