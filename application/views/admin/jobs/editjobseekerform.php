


<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />


   
 

 
            
               
<form action="<?=base_url()?>admin/jobs/savejobtips" class="form-horizontal form-bordered" method="post" id="jobpage">


  <div class="panel panel-default">
    <div class="panel-body">
      
      
    <div class="form-group">
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title" value="<?=$form->st_title?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
            <textarea class="editor form-control" name="descr" id="descr" rows="5" placeholder="Enter text ..."><?=$form->st_descr?></textarea>

        
        </div>
      </div>
     
     
      
     
      
    
      
    
      
    
      
      
      <div class="form-actions text-right">
        <input type="submit" class="btn btn-primary" value="Submit" />
      </div>
    </div>
  </div>
</form>


   