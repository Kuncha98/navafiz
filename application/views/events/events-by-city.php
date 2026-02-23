<?php $this->load->view('include/header.php'); ?>
<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?> 
<div class="container-mid">    
    <div class="row">
        <div class="col-md-8 col-xs-12">            
            <div class="card profile">
                <div class="card-header">
                    <b>Events</b>
                </div>
                <div class="card-body">
                    <div class="row px-2">
                        <?php if(!empty($event_list)){?>
                        <?php foreach (@$event_list as $event){?>
                        <div class="col-md-2 col-4 p-lg-2 p-1">
                          <a href='<?=site_url('event/view/'.$event->e_id);?>' target="_blank">
                            <div class="block text-center wow fadeInLeft">
                              <i class="fas fa-calendar-week"></i>
                              <h6 class="h6"><?=date('d M Y',strtotime($event->event_date));?></h6>
                            </div>
                          </a>
                        </div>
                        <?php } } else{?> 
                          <h3>No record founds</h3>
                        <?php } ?>
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Event</h4>
      </div>
      <div class="modal-body">
          <form action="<?=base_url('Event/AddEvent')?>" id="memberpage" method="post" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" placeholder="" class="form-control" name="title" value="" required="">                    
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Description</label>                    
                    <textarea type="text" placeholder="" class="form-control" name="description" rows="8" required=""></textarea>
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
                    <input type="text" placeholder="<?=date('Y-m-d')?>" class="form-control" name="event_date" value="<?=date('Y-m-d')?>" required="">                    
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success col-md-12 col-sm-12 col-xs-12"> Save <i class="fa fa-angle-right"></i></button>
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