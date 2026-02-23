<?php $this->load->view('header.php'); ?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/frontend/css/custom_paging.css" />
<body class="corporate">
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<input type="hidden" name="cat_id" id="cat_id" />
<?php // $this->load->view('pagetop.php'); ?>
<div class="main">
  <div class="container">
    <div class="row">
<!--        <form action="<?=site_url('AddEventByUser')?>" class="form-horizontal form-bordered" method="POST" enctype="multipart/form-data">
        <div class="panel panel-default"> 
          <div class="panel-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Name:</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Job Seekers Seminar in Abu Dhabi" class="form-control" name="name" id="name" value="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Date</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control hasDatepicker" name="evet_date" id="datepicker" placeholder="Default datepicker" value="<?=date('Y-m-d H:i:s');?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Description:</label>
              <div class="col-sm-10">
                  <textarea class="editor form-control" name="event_desc" id="descr" placeholder="Enter text ..."></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Image:</label>
              <div class="col-sm-10">
                  <input type="file" name="event_picture" class="form-control">
              </div>
            </div>
            <div class="form-actions text-right">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
          </div>
        </div>
      </form>-->
    </div>
    <div class="row margin-bottom-40">
      <div class="col-md-7 col-sm-7 main-contect">
        <h1>Events</h1>
           <div id="loadingjobs" style="display:none"> 
               <img id="loading-image" src="<?=base_url()?>assets/frontend/images/small.gif" alt="Loading..." /> 
           </div>
        <div class="content-page" id="load_ajax_jobs"> </div>
      </div>
    </div>
  </div>
</div>
<script>
    site_url = '<?=  site_url()?>';
    function LoadEvents(cat_id,page_id,limit){        
        $("#loadingjobs").show();
        $('#page_id').val(page_id);
        $('#limit').val(limit);
        
        var form_data = {
            page_id : page_id, 
            cat_id : cat_id, 
            limit : limit, 
            action: 'show_events'
        };
            
        $.ajax({
            url: site_url+"eventsajax",
            type: 'POST',
            data: form_data,
            success : function(data){
                $("#loadingjobs").hide();
                $('#load_ajax_jobs').html(data);
                $("html, body").animate({}, 1000);
            }
        });	
    }
    
    $(document).ready(function(){
       var page_id = 1;
        var limit = '<?php echo $limit?>';
        LoadEvents('',page_id,limit);
    });

	
</script>
<?php $this->load->view('footerbottom.php'); ?>
</body>
</html>