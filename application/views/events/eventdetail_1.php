<?php 
$event_id = $this->uri->segment(3);
$this->load->view('include/header');
$session_user_id = $this->session->userdata('user_id');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<style>
.event_discussion_board .list-group-item-heading, .event_discussion_board p { 
    margin-left: 48px; 
    padding-right: 30px; 
    line-height: 19px;
    color:#000;
    font-size: 14px;
}
.event_discussion_board { width: 100%; bottom: -1px; margin-bottom: 0; border-radius: 0; }
.profile-avatar { position: relative; z-index: 20; background-size: cover; background-position: top center; border-radius: 100%; -webkit-transition: opacity 0.3s ease-in; transition: opacity 0.3s ease-in; }
.profile-avatar.tiny { width: 70px; height: 70px; border: none; margin-right: 20px; float: left;}
.event_discussion_board .panel-heading { border-radius: 0; }
.event_discussion_board .profile-avatar { box-shadow: none; }
.list-group{
    margin-top: 50px;
}
/*.event_discussion_board .list-group { height: 300px; overflow-y: auto; }*/
.event_discussion_board .list-group-item-heading, .event_discussion_board p { margin-left: 48px; padding-right: 30px; line-height: 19px;color:#000;}
.event_discussion_board .list-group-item .message-content { 
    background: #ececec;
    padding: 10px;
    border-radius: 6px;
    font-size: 13px;
    position: relative;
    padding: 5px;
    border-radius: 5px; 
}
.list-group-item{
    margin-bottom: 10px;
}
.event_discussion_board .list-group-item ul{ 
    margin-left: 40px;
}
/*.event_discussion_board .list-group-item time { position: absolute; top: 0; right: 0; color: #777777; font-size: 12px; }*/
.event_discussion_board .form-group { width: 100%; }
.event_discussion_board textarea.form-control { width: 100%; resize: none; }

.panel-chat { border-color: #ddd; }
.panel-chat > .panel-heading { color: #fff; background-color: #373d43; border-color: #ddd; }
.panel-chat > .panel-heading + .panel-collapse > .panel-body { border-top-color: #ddd; }
.panel-chat > .panel-heading .badge { color: #373d43; background-color: #fff; }
.panel-chat > .panel-footer + .panel-collapse > .panel-body { border-bottom-color: #ddd; }
.panel-chat .close { color: #fff; position: absolute; top: 8px; right: 16px; }

.chat-status { position: absolute; top: 7px; left: 8px; }
.chat-status .btn { color: #fff; font-weight: 500; }
.chat-status .status-icon { display: inline-block; margin-top: 4px; margin-right: 8px; float: left; width: 10px; height: 10px; border-radius: 5px; }
.chat-status .status-icon.icon-online { background: #5cb85c; }

.btn-inverted { color: #fff; background: rgba(0, 0, 0, 0.2); }
.btn-inverted:hover, .btn-inverted:focus, .btn-inverted.focus { color: #fff; background: rgba(0, 0, 0, 0.3); }
.form-inline .form-group input{
    padding-left: 10px;
}
/* On screens that are 992px or less, set the background color to blue */
@media screen and (max-width: 992px) {
  .event_discussion_board .list-group-item .message-content {
        display: block;
        float: left;
        width: 100%;
        margin: 14px 0;
        padding: 10px;
  }
}
</style>
<style type="text/css">
    #share-buttons img {
        width: 35px;
        padding: 5px;
        border: 0;
        box-shadow: 0;
        display: inline;
    }
    
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
<?php
    $user_id = intval($this->session->userdata('user_id'));    
?>
<div class="container"> 
    <?php $this->load->view('notification/notification-messages');?>
    <input type="hidden" name="page_id" id="page_id" />
    <input type="hidden" name="limit" id="limit" />    
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <img class="img-fluid" src="<?=site_url('public-assets/events/'.$event->event_picture);?>" alt="">
        </div>
        <div class="col-md-6 col-xs-6">
            <div class="card">
                <div class="card-header">
                    <b><?=$event->title?></b>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        Date And Time: </strong> <?=date("d F Y g:i A",  strtotime($event->event_date));?>
                    </h5>
                    <p class="card-text"><?=$event->description?></p>                    
                    <p>
                        <b>Address</b> <br />
                        &nbsp;&nbsp;
                        <?=isset($event->address) ? $event->address:'';?>                                                
                    </p>
                    <p>
                        <a class="btn btn-success" href="<?=$event->location?>" target="_blank">View Map</a>
                    </p>
                    <p>
                    <br>
                    <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                    <p>
                        <a href="<?=site_url('event/delete/'.$event->e_id)?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
                    </p>
                    <?php }?>
                </div>
            </div>
            <p>

            </p>
            <p>

            </p>
            <p>

            </p>
            <p>
                <a href="<?=site_url('event-join/'.$event->e_id);?>" style="text-align: center;">
                    <button type="button" class="btn btn-primary col-sm-12 col-xs-12 pull-right" style="height: 80px;text-align: center;">
                        Free Register                          
                    </button> <br />
                    Some seats are left (<?=count($event_subscribers);?>) are interested
                </a>

                <a href="<?=site_url('event-in-uae');?>" style="text-align: center;display: block;margin-top: 14px;" class="btn btn-warning">
                    See More
                </a>
                
                
                
            </p>                
            <p>
                Requirements to Apply for the Certificate.<br /><br />

                1- Make sure that You have attended at least three Navafiz Sessions.<br />
                2- You should have Awareness about Navafiz Tracking Sheet and completed 5 Steps.<br />
                3- Answer to 5 Questions, asked by NAVAFIZ Mentor to Qualify for the certificate.<br /><br />

                If you are interested & eligible to Apply for Certificate, click below link & message #GetCertificate.  <br /><br />

                Regards,
                Navafiz Admin
                <br />
                <a href="#GetCertificate" class="btn btn-inverted">
                    Click here to Apply Certificate
                </a>
            </p>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="row" style="border: solid 1px #ccc; border-radius: 8px;padding: 20px 0;margin-top: 20px;">
        <div class="col-md-12 event_discussion_board">
          <?php if($user_id>0){?>                
            <span id="GetCertificate"></span>
                <h4 class="text-center">Discussion Board / Event Feedback</h4>
                <form  action="<?=site_url('event/PostChatMessage/'.$event_id.'/'.$user_id);?>" method="post">
                    <div class="form-group">
                        <textarea name="message_text" required="required" style="width: 98%;margin: 0 auto;height: 120px;"></textarea>
                        <!--<input type="text" name="message" value="" class="form-control" >-->
                    </div>
                    <div class="form-group" style="text-align: center;">
                        <input type="submit" value="Send" class="btn btn-success mt-2" style="width: 70%;margin: 0 auto;">
                    </div>
                    <input type="hidden" name="is_post" value="1">                            
                    <input type="hidden" name="session_user_id" value="<?=$user_id?>">
                </form>                        
              <?php }?>
                <div class="messages-list" style="height: 400px;overflow: scroll;">
                    <ul class="list-group">
                    <?php 
                    if(!empty($event_chat)){
                    $i=0;

                    foreach($event_chat as $smessage){?>
                     <li class="list-group-item">
                        <?php 
                         $user_details = GetUserDetails($smessage->user_id);
                         $user_picture = empty($user_details->m_avatar) ? 'default.png' : $user_details->m_avatar;
                         ?>
                       <div class="profile-avatar tiny pull-left" style="background-image: url('<?=base_url('assets/uploads/members/'.$user_picture)?>');"></div>
                       <h5 class="list-group-item-heading">
                           <a href="<?=site_url('profile/'.$smessage->user_id)?>"><?=$user_details->m_name;?></a> | <?=$user_details->m_profession;?> | <?=$user_details->m_current_city;?> | <time><i><?=date('h:i a - d-M-Y', strtotime($smessage->added_on));?></i></time>
                       </h5>
                       <p class="message-content" style="<?=$i%2==0 ? 'background:#d0cfcf;':'background:#ececec;'?>">
                         <?php if(in_array($user_id, CvReviewTeamList())){?>
                         <a href="<?=site_url('event/deletechat/'.$smessage->id.'/'.$event_id)?>" onclick="return confirm('Are you sure you want delete it.');" style="position: absolute;right: 0;">
                             <span>×</span>
                         </a>
                         <?php }?>
                         <?=nl2br($smessage->message);?>  
                         </p>
                     </li>
                     <?php $i++; } }?>
                 </ul>
                </div>
              
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Participants (<?=count($event_subscribers);?>) </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="userslist">
    <div class="row">        
            <?php foreach ($event_subscribers as $pro_details){?>
                <?php $member_img  = !empty($pro_details->m_avatar) ? $pro_details->m_avatar:'default.png'; ?>
                <div class="col-md-4 col-xs-12">
                    <div class="cardstyle1">
                        <div class="picandinfo">
                            <div class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');"></div>
                            <div class="userinfo">
                                <a href="<?=site_url('profile/'.$pro_details->m_id);?>" class="namedesig">
                                    <?=$pro_details->m_name?>

                                </a>
                                <p>
                                    <?=$pro_details->m_profession?> <br>
                                    <?=  ucwords($pro_details->m_current_city);?>
                                </p>
                                <p class="ratings">
                                    <div class="form-check pl-0">
                                        <input type="checkbox" id="attendance" data-toggle="toggle" data-on="Attended" data-off="Not attend" data-onstyle="success" data-offstyle="danger" value="" member_id="<?=$pro_details->m_id?>" event_id="">
                                    </div>
                                </p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="media-body"> 

                                <div class="heading">
                                     Mentor
                                </div>
                                <div class="detail" style="font-weight: bold;">
                                    <?php if($pro_details->mentor_id>0){?>
                                      <font style="color: #5cb85c;">
                                          <?= BasicInfoUser($pro_details->mentor_id)->m_name?>
                                      </font>
                                    <?php }else{?>
                                      <font style="color: red;">
                                          No Assigned.
                                      </font>
                                    <?php }?>
                                </div>

                                <div class="heading">
                                     Skills:
                                </div>
                                <div class="detail">
                                    <?php
                                    $str_arr = explode(",",$pro_details->m_skills);			  
                                    if($str_arr){?>              
                                    <?php for($a= 0; $a< sizeof($str_arr); $a++){
                                        if($a>6 )
                                            break;
                                        ?>
                                    <a href="#"> <?= $str_arr[$a];?> , </a>
                                    <?php                                                 
                                    } }  ?>
                                </div>
                                <div class="heading">Qualification:</div>
                                <div class="detail">
                                    <?php
                                    $qry= "select * from jb_member_education where me_member_id = '".$pro_details->m_id."' order by me_year desc limit 0,1 ";
                                    $edu_results = $this->db->query($qry)->result();                                                
                                    if($edu_results)
                                    {
                                    foreach($edu_results as $edu_result){?> 
                                    <?=$edu_result->me_descr?>                                                
                                    <?php break;} }?> 
                                </div>
                                <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                                <div class="heading">Mobile Number:</div>
                                <div class="detail">
                                    <?=$pro_details->m_phone;?>
                                </div>
                                <?php }?>
                                <div class="heading">Email:</div>
                                <div class="detail">
                                    <?=$pro_details->m_email?>
                                </div>
                                <div class="heading">Profile Link:</div>
                                <div class="detail">
                                    <a href="<?=site_url('profile/'.$pro_details->m_id);?>"><?=site_url('profile/'.$pro_details->m_id);?></a>
                                </div>
                                <div class="heading">Trackingsheet:</div>
                                <div class="detail">
                                    <a style="color: #164885;" href="<?=site_url('track_steps/sheet/'.$pro_details->m_id);?>"><?=site_url('track_steps/sheet/'.$pro_details->m_id);?></a>
                                </div>
                                <div class="heading">Profession Category:</div>
                                <div class="detail">
                                    <?=GetCategoryName(intval($pro_details->m_category));?>
                                </div>                      
                            </div>
                        </div>                                
                    </div>
                </div>
            <?php }?>
        </div>      
    </div>
    
    <div class="row">
        <div class="fb-comments" data-href="<?=base_url()?>event/<?=$event->e_id?>" data-numposts="5"></div>
    </div>
    <div class="row" style="border: solid 1px #ccc; border-radius: 8px;padding: 20px 0;margin-top: 20px;">
        <h3 style="margin: 0 auto;">Event Gallery </h3>
        <div class="col-md-12">
          <div class="row">
              <?php  if(in_array($session_user_id, CvReviewTeamList())){ ?>        
              <div class="col-md-4">
                  <a href="#" class="btn btn-primary" id="eventgallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">Add Gallery</a>
              </div>        
              <?php }?>
          </div>
        </div>
        <div class="row pt-4" id="loadData">
        
        </div>        
        <div class="col-md-12 col-sm-12 col-xs-12  text-center">
          <!--<button class="btn btn-primary  paging_page" style="width: 40%;">Load More</button>-->
          <img width="65" style="display:none;" id="loading-image" src="<?= site_url('nassets/img/ajax-loader.gif');?>">
        </div>
    </div>  
    <div class="row" style="border: solid 1px #ccc; border-radius: 8px;padding: 20px 0;margin-top: 20px;">
            
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('event/city/1');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-calendar"></i>
                <h6 class="h6">Abu Dhabi</h6>
                <p>Events in Abu Dhabi</p>                
              </div>
            </a>
          </div>
          
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('event/city/3');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-calendar-check"></i>
                <h6 class="h6">Sharjah</h6>
                <p>Events in Sharjah </p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('find-job');?>' target="_blank">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-search"></i>
                <h6 class="h6">Find Jobs</h6>
                <p>&nbsp;</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('track_steps/sheet/'.$session_user_id);?>' target="_blank">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-file-signature"></i>
                <h6 class="h6">My Tracking Sheet</h6>
                <p>&nbsp;</p>
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('event-in-uae');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-calendar-day"></i>
                <h6 class="h6">Add Event</h6>                
                <p>&nbsp;</p>
              </div>
            </a>
          </div>          
          
          
        
    </div>  
    
    
</div>    
<?php $this->load->view('include/footer'); ?>

<div class="modal fade" id="event_gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="float-right" aria-hidden="true">&times;</span></button>
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Add Gallery</h4>
      </div>

      <div class="modal-body">
          <form action="<?=base_url('event/addGallery')?>" id="memberpage" method="post" enctype="multipart/form-data">
                
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Event Gallery</label>
                    <input type="file" placeholder="" class="form-control" multiple="multiple"  name="event_gallery[]" required="" accept="image/*">                    
                  </div>
                </div>

                <input type="hidden" name="event_id" value="<?= $event_id;?>">
                <div class="col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success"> Upload To Event </button>
                </div>                
            </form>
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
   $('#eventgallery').on('click', function(e){
        $('#event_gallery').modal();        
    });
    
    $('#attendance').on('change', function(e){
        var myKeyVals = { A1984 : 1, A9873 : 5, A1674 : 2, A8724 : 1, A3574 : 3, A1165 : 5 }
        
       $.ajax({
            type: "POST",
            url: '<?=site_url('event/CheckIn');?>',
            data: myKeyVals,            
        }); 
    });
    
    /*$('#1attendance').on('change',(function(){
        $this = $(this);
        
        alert($this.val());
        
        var myKeyVals = { A1984 : 1, A9873 : 5, A1674 : 2, A8724 : 1, A3574 : 3, A1165 : 5 }
        
       $.ajax({
            type: "POST",
            url: '<?=site_url('event/CheckIn');?>',
            data: myKeyVals,
            success: success,
            dataType: dataType
        }); 
    });*/
});
</script>


<script>
  function loadImages(page_id,limit){  
    
  $("#profloading").show();
  $('#page_id').val(page_id);
    
    $('#limit').val(limit);
    var event_id = '<?php echo $event_id;?>'
    var form_data = {
      page_id       : page_id, 
      
      limit         : limit,
      event_id      : event_id, 
      
    };    
    $.ajax({
      url   : "<?php echo site_url('event/Imagesajax')?>",
      type  : 'POST',
      data  : form_data,
      success : function(data){
        $("#profloading").hide();
        $('#loadData').html(data);
      },
      complete:function(){
        $('.paging_page').show();
      $('#loading-image').hide();
      }
    }); 
  }

  $(document).ready(function(){
      
    var page_id = 1;
    
    var limit = '<?php echo $limit?>';
    
    loadImages(page_id,limit);

    
    $(document).on('click', '.paging_page', function(){
  //  $('.paging_page').on('click',function(){
      $('.paging_page').hide();
      $('#loading-image').show();
      var page_id       =   1;
    
      var limit       = parseInt($("#limit").val());
    
      
      $('#page_id').val(page_id);


      
       b = parseInt(4);
      var total_limit = limit + b;
      

      loadImages(page_id,total_limit);
    });
    
    });
</script>