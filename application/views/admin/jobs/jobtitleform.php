
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />

<form action="<?=base_url()?>admin/jobs/savejobtitle" class="form-horizontal form-bordered" method="post" id="jobpage">



    <div class="panel-body">
      
      
    <div class="form-group">
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title" value="">
        </div>
      </div>
      <div class="form-actions mb-5">
        <input type="submit" class="btn btn-primary" value="Submit" />
      </div>
    </div>

</form>
              

   
   
    