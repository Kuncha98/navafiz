
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />


<form action="<?=base_url()?>admin/companies/savecompanies" class="form-horizontal form-bordered" method="post" id="jobpage" enctype="multipart/form-data">
<input type="hidden" id="jobimage" name="jobimage" value="" />

<div class="row">
    <div class="col-md-6">
    <div class="form-group">
        <label class="col-sm-2 control-label">Category:</label>
        <div class="col-sm-10">
            <select id="cat_id" name="cat_id" class="form-control">
              <?php
			 
				 if($categories != "empty")
				 {
					 foreach($categories as $category)
					 {
				 ?>
              <option value="<?=$category->c_id?>">
              <?=$category->c_name?>
              </option>
              <?php
					 }
				 }
				 ?>
            </select>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="name" id="name"  required>
        </div>
      </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Logo:</label>
        <div class="col-sm-10">
           <input type="file" id="pic"  name="pic">
                  <!--<table id="files"></table>-->
               <!-- <img id="j_image" src="<?=base_url()?>assets/uploads/jobs/" width="80" style="display:none"  />-->
        </div>
      </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Mobile:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="mobile" id="mobile"  required>
        </div>
    </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Phone:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="phone" id="phone"  required>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="col-sm-2 control-label">Fax:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="fax" id="fax"   required>
        </div>
      </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Address:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="address" id="address" value=""  required>
        </div>
      </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Keywods:</label>
        <div class="col-sm-10">
          <input type="text" id="tags2" name="keywords" class="tags form-control" value=""  required>
        </div>
      </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Website:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="website" id="website" value=""  required>
        </div>
      </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-actions">
        <input type="submit" class="btn-block btn btn-primary" value="Submit" />
      </div>
    </div>
</div>
      
      
     
     
      
     
      
    
      
    
      
      
      
      
      
      
       
      
      
     
      <!--<div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
         <textarea class="editor" name="descr" id="descr" placeholder="Enter text ..."></textarea>
</textarea>
        
        </div>
      </div>-->

      
      
      

</form>