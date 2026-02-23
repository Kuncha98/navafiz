<div class="datatable" id="loadData">
		
<form action="<?=base_url('admin/videos/update_video/').'/'.$video->id?>" id="tasbeehForm" class="form-horizontal form-bordered"  method="POST" enctype="multipart/form-data">

        <input type="hidden" id="tasbeeh_image_name" value="" />        
        <input type="hidden" name="title" value="<?=$video->title?>" />
<!--      <div class="form-group">
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Link" class="form-control" name="vlink" id="vlink">
        </div>
     </div>  -->
      
     <div class="form-group">
        <label class="col-sm-2 control-label">Link:</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Enter Link" class="form-control" required="" name="vlink" id="vlink">
        </div>
     </div>           
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Embded Code:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter code" class="form-control" required="" name="ecode" id="ecode">
        </div>
       </div>
      
      <div class="form-actions text-right">
        <input type="submit" class="btn btn-primary" value="Submit" /> 
      </div>
   

</form>
             
</div>


