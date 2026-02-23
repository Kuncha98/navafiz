<?php $this->load->view('header.php'); ?>
<body>
<div class="page">
<?php $this->load->view('pagetop.php'); ?>
<div class="clearfix"></div>
<link href="<?=base_url()?>assets/metrolab/css/style.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/metrolab/css/style-responsive.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/metrolab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<style>
.home-box-tabs{
    padding: 0 0 60px 0 !important;

}
</style>
<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>    
<section class="home-box-tabs">
    <div class="container-fluid" style="background: #fff;">
        <div class="row-fluid">
            <h3>Events / Meetups & Training Sessions</h3>
            
            
            <a href="#" class="btn btn-success" id="addevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">Add Event</a>
            
            
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="<?=site_url('event/city/1');?>" >
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Abu Dhabi</div>
                        <div class="status">14 March 2019</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('event/city/2');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Dubai</div>
                        <div class="status">15 March Friday</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue">
                    <a data-original-title="" href="<?=site_url('event/city/3');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Sharjah</div>
                        <div class="status">15 March Friday</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="<?=site_url('event/city/4');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Al Ain</div>
                        <div class="status">Coming Soon</div>
                    </a>
                </div>

                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="<?=site_url('event/city/5');?>">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Ajman</div>
                        <div class="status">Coming Soon</div>
                    </a>
                </div>

                
                
            </div>
            <div class="metro-nav">
                <div class="metro-nav-block nav-block-orange">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Ras Al Khaimah</div>
                        <div class="status">Coming Soon</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href='javascript:void(0);'>
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Fujairah</div>
                        <div class="status">Coming Soon</div>
                    </a>
                </div>
                
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="javascript:void(0);">
                        <!--<i class="icon-comments"></i>-->
                        <div class="info">Umm al-Quwain</div>
                        <div class="status">Coming Soon</div>
                    </a>
                </div>

            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
    </div>
</section>       
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
          <form action="<?=base_url('event/addevent')?>" id="memberpage" method="post" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" placeholder="" class="form-control" id="expected_salary" name="title" value="" required="">                    
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" placeholder="" class="form-control" id="expected_salary" name="description" value="" required="">                    
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
<?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>