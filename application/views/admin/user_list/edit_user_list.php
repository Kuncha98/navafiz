

<form role="form" method="post" action="<?=site_url('admin/user_list/update_user_list/'.$form->id)?>" class="form-horizontal form-bordered">
  <div class="panel panel-default">
    
    <div class="panel-body">
    
        
        <div class="row">
            <div class="offset-md-3 col-md-6">
              <div class="form-group">
                    <label class="col-sm-2 control-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" required="" placeholder="Enter Name" class="form-control" name="name" id="name" value="<?=$form->name?>">
                    </div>
                </div>  
            </div>
            <div class="offset-md-3 col-md-6">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Description:</label>
                    <div class="col-sm-10">
                        <textarea rows="4" required="" type="text" placeholder="Enter Description" class="form-control" name="description" id="" value=""><?=$form->description?></textarea>
                    </div>
              </div> 
            </div>
        </div>
        
           
        </div>
       
      
     <div class="form-actions text-center mr-5">
          <input type="submit" class="btn btn-primary mr-5" value="Submit"/> 
      </div>
    </div>
  </div>
</form>
