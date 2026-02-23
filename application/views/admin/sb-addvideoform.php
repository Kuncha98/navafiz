
<div class="datatable" id="loadData">


 <form action="<?=base_url()?>admin/videos/saveVideo" id="tasbeehForm" class="form-horizontal form-bordered"  method="POST" enctype="multipart/form-data">

        <input type="hidden" id="tasbeeh_image_name" value="" />        
     <div class="form-group">
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title">
        </div>
      </div>

      
      
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Link:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Link" class="form-control" name="vlink" id="vlink">
        </div>
      </div>           
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Embded Code:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter code" class="form-control" name="ecode" id="ecode">
        </div>
      </div>
      
      <div class="form-actions text-right">
        <input type="submit" class="btn btn-primary" value="Submit" /> 
      </div>


</form>


              
            </div>
         