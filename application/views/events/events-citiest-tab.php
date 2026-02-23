<?php $this->load->view('include/header.php'); ?>

<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>    
<div class="container-mid"> 
    <?php $this->load->view('notification/notification-messages');?>
    <?php if($user_id>0 && in_array($user_id, CvReviewTeamList())){?>
    <div class="row">
        <div class="col-md-6">
            <a href="<?php echo base_url('event/add_e') ?>" class="btn btn-primary" >Add Event</a>
            <p>&nbsp;</p>
        </div>
      
    </div>
    <?php }?>
    <div class="row">        
        <div class="col-md-8 col-xs-12">            
            <div class="card profile">
                <div class="card-header">
                    <b>Events / Meetups & Training Sessions</b>
                </div>
                <div class="card-body">
                    <div class="row px-2">
                        <div class="col-md-2 col-4 p-lg-2 p-1">
                          <a href="<?=site_url('event/city/1');?>">
                            <div class="block text-center wow fadeInLeft">
                              <i class="fas fa-calendar"></i>
                              <h6 class="h6">Abu Dhabi</h6>

                              <br>
                              <br>
                            </div>
                          </a>
                        </div>
                        <div class="col-md-2 col-4 p-lg-2 p-1">
                          <a href="<?=site_url('event/city/2');?>">
                            <div class="block text-center wow fadeInLeft">
                              <i class="far fa-calendar-check"></i>
                              <h6 class="h6">Dubai</h6>

                             <p>Friday</p>

                            </div>
                          </a>
                        </div>
                        <div class="col-md-2 col-4 p-lg-2 p-1">
                          <a href='<?=site_url('event/city/3');?>'>
                            <div class="block text-center wow fadeInLeft">
                              <i class="fas fa-calendar-check"></i>
                              <h6 class="h6">Sharjah</h6>
                              <p>Friday</p>
                            </div>
                          </a>
                        </div>
                        <div class="col-md-2 col-4 p-lg-2 p-1">
                          <a href='<?=site_url('event/city/4');?>' target="_blank">
                            <div class="block text-center wow fadeInLeft">
                              <i class="fas fa-calendar-alt"></i>
                              <h6 class="h6">Al Ain</h6>
                              <p>Coming Soon</p>
                            </div>
                          </a>
                        </div>
                        <div class="col-md-2 col-4 p-lg-2 p-1">
                          <a href='<?=site_url('event/city/5');?>' target="_blank">
                            <div class="block text-center wow fadeInLeft">
                              <i class="far fa-calendar"></i>
                              <h6 class="h6">Ajman</h6>
                              <p>Coming Soon</p>
                            </div>
                          </a>
                        </div>
                        <div class="col-md-2 col-4 p-lg-2 p-1">
                          <a href='javascript:void(0);'>
                            <div class="block text-center wow fadeInLeft">
                              <i class="fas fa-calendar-day"></i>
                              <h6 class="h6">Ras Al Khaimah</h6>

                              <p>Coming Soon</p>
                            </div>
                          </a>
                        </div>
                        <div class="col-md-2 col-4 p-lg-2 p-1">
                          <a href='javascript:void(0);'>
                            <div class="block text-center wow fadeInLeft">
                              <i class="fas fa-calendar-minus"></i>
                              <h6 class="h6">Fujairah</h6>

                              <p>Coming Soon</p>
                            </div>
                          </a>
                        </div>
                        <div class="col-md-2 col-4 p-lg-2 p-1">
                          <a href='javascript:void(0);'>
                            <div class="block text-center wow fadeInLeft">
                              <i class="  far fa-calendar-plus"></i>
                              <h6 class="h6">Umm al-Quwain</h6>

                              <p>Coming Soon</p>
                            </div>
                          </a>
                        </div>
                        <div class="col-md-2 col-4 p-lg-2 p-1">
                          <a href='<?=site_url('event/city/9');?>'>
                            <div class="block text-center wow fadeInLeft">
                              <i class="far fa-calendar-alt"></i>
                              <h6 class="h6">Online</h6>
                            </div>
                          </a>
                        </div>
                    </div>  
                </div>
            </div>            
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="card profile">
                <div class="card-header">
                    <b>Upcoming Events</b>
                </div>
                <div class="card-body">
                    <?php $upcomming_events = GetUpcomingEventsList();?>
                    <?php foreach($upcomming_events as $event){?>
                    <div class="event-item" style="border-bottom:solid 1px #ccc;margin: 12px 10px;">
                        <p>
                            <b><?=$event->title?></b> <br> 
                            <?=date("d F Y g:i A",  strtotime($event->event_date));?>                                
                        </p>
                        <p>
                            <?=$event->address?>
                        </p>
                        <p>
                            <a href="<?=site_url('event/view/'.$event->e_id);?>" class="btn btn-primary" style="background-color: #164885!important;border-color: #164885!important;">Register for Event</a>
                        </p>
                    </div>
                    <?php }?>
                </div>                        
            </div>
        </div>
    </div>
</div>     
<div class="clearfix"></div>
<!-- Add Event Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="float-right" aria-hidden="true">&times;</span></button>
      <div class="modal-header">
       
        <h4 class="modal-title" id="myModalLabel">Add Event</h4>
      </div>
      <div class="modal-body">
          <form action="<?=base_url('event/addevent')?>" id="memberpage" method="post" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" placeholder="" class="form-control" name="title" value="" required="">                    
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" placeholder="" class="form-control" name="description" rows="6" required=""></textarea>                          
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label>City<span class="required">*</span></label>
                    <select class="select-category form-control" name="city_id">
                        <option value="">Select City</option>
                        <option value="1">Abu Dhabi</option>
                        <option value="2">Dubai</option>
                        <option value="3">Sharjah</option>
                        <option value="4">Al Ain</option>
                        <option value="5">Ajman</option>
                        <option value="6">Ras Al Khaimah</option>
                        <option value="7">Fujairah</option>
                        <option value="8">Umm al-Quwain</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Event Picture</label>
                    <input type="file" placeholder="" class="form-control"  name="event_picture" required="">                                        
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Event Date</label>                    
                    <input type="text" placeholder="<?=date('Y-m-d H:i:s')?>" class="form-control" id="datepicker1" name="event_date" value="<?=date('Y-m-d H:i:s')?>" required="">                    
                  </div>
                </div>                
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" placeholder="" class="form-control" name="address" value="" >
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Location</label>
                    <input type="text" placeholder="" class="form-control" name="location" value="" >
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success"> Save </button>
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
   $('#addevent').on('click', function(e){
        $('#myModal').modal();              
    });
});
</script>
<?php $this->load->view('include/footer.php'); ?>
</div>
</body>
</html>