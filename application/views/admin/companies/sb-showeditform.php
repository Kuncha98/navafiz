
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />

      <!--<ul class="nav nav-tabs">-->
        <!--<li id="list"><a href="<?=base_url()?>admin/companies/index" id="listForms"><i class="icon-checkbox-partial"></i> List Companies</a></li>-->
        <!--<li id="add"><a href="<?=base_url()?>admin/companies/addcompanyform" id="showAddForm" ><i class="icon-checkbox-unchecked"></i> Add Company</a></li>-->
       
      <!--</ul>-->

<form action="<?=base_url()?>admin/companies/updatecompanies" class="form-horizontal form-bordered" method="post" id="jobpage" enctype="multipart/form-data">
<input type="hidden" id="id" name="id" value="<?=$form->co_id?>" />

<!--<form role="form" action="#" class="form-horizontal form-bordered">
<input type="hidden" id="imagefile" name="imagefile" value="" />-->

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
              <option value="<?=$category->c_id?>" <?php echo ($category->c_id == $form->co_cat_id)? "selected" : "" ?>>
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
          <input type="text" placeholder="Enter Title" class="form-control" name="name" id="name" value="<?=$form->co_name?>">
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Logo:</label>
        <div class="col-sm-10">
           <input type="file" id="pic"  name="pic" value="<?=$form->co_logo?>">
                  <!--<table id="files"></table>-->
                <img id="j_image" src="<?=base_url()?><?=$form->co_logo?>" width="80"/>
        </div>
      </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Mobile:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="mobile" id="mobile" value="<?=$form->co_mobile?>">
        </div>
      </div>
    </div>
</div>



<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Phone:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="phone" id="phone" value="<?=$form->co_phone?>">
        </div>
      </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Fax:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="fax" id="fax" value="<?=$form->co_fax?>">
        </div>
      </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Address:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="address" id="address" value="<?=$form->co_address?>">
        </div>
      </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Keywods:</label>
        <div class="col-sm-10">
          <input type="text" id="tags2" name="keywords" class="tags form-control" value="<?=$form->co_tags?>">
        </div>
      </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Website:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="website" id="website" value="<?=$form->co_website?>">
        </div>
      </div>
    </div>
</div>
      
      
<div class="row">
    <div class="col-md-12">
        <div class="form-actions">
        <input type="submit" class="btn btn-primary btn-block" value="Submit" />
      </div>

    </div>
</div>  
      

</form>

      


