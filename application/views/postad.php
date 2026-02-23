<?php $this->load->view('header.php'); ?>
<script>
<?php /*?>$(function () {
    $('#productform').fileUploadUI({
        uploadTable: $('#files'),
        downloadTable: $('#files'),
		
        buildUploadRow: function (files, index) {
            return $('<tr><td><img src="<?=base_url()?>assets/frontend/images/small.gif" border="0"></td></tr>');
        },
        buildDownloadRow: function (file) {
				
			if(file.msg == "large size") {
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Errorclass">Size should be less than 2MB</span>');
				}
			else if(file.msg == "invalid type") {
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Errorclass">Only jpg,jpeg,png allowed</span>');
       	 		}
			else if(file.msg == "success") {
				$('#productimage').val(file.name);
				$('#j_image').show();
				$('#j_image').attr('src','<?=base_url()?>assets/uploads/products/small_thumbs/'+file.name);
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Successclass">File upload successfully</span>');
       	 		}
		 	else {
				$("#jobimagesms").show();
				$("#jobimagesms").html('<span class="Errorclass">Due to internet Problem file not upload </span>');
       	 		}
		    
		
        }
    });
   
	

});<?php */?>
</script>
<style>
.open {
	display: block;
}
.close {
	display: none;
}
.joblistbox {
	border: 1px solid #999;
}
</style>
<body class="corporate">
<?php $this->load->view('pagetop.php'); ?>
<div class="main">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="<?=base_url()?>">Home</a></li>
      <li class="active">Jobs</li>
    </ul>
    <div class="row margin-bottom-40">
      <?php $this->load->view('leftside.php'); ?>
      <div class="col-md-7 col-sm-7 main-contect">
        <h1 id="jobarea">Post New Classified</h1>
        <div class="content-page">
          <div id="modalloading" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/frontend/images/small.gif" alt="Loading..." /> </div>
          <p class="text-success" id="jobsuccesssms"> </p>
          <br>
         <!-- <form action="" class="login_page" method="post" id="productform">-->
            <input type="hidden" id="productimage" value="" />
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="procat_id" class="labelcolor">Category</label>
                <select id="procat_id" class="form-control">
                  <?php			 
                    $cat_qry = "SELECT * FROM jb_product_category where c_status =1";
                    $cat_rs =  mysql_query($cat_qry); echo mysql_error();
                    while($cat_row = mysql_fetch_array($cat_rs))
                    { ?>
                  <option value="<?=$cat_row['c_id']?>">
                  <?=$cat_row['c_title']?>
                  </option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jobtitle" class="labelcolor">Title</label>
                &nbsp;<span style="color:#060">*</span>&nbsp;<span class="Errorclass" id="jobtitleerror"></span>
                <input type="text" class="form-control" placeholder="Title" id="protitle">
               <span id="protitleerrror"></span> 
              </div>
            </div>
            <!--<div class="col-md-6">
                <div class="form-group">
                  <label for="career-name" class="labelcolor">Country</label>
                  <select id="jobcountry" name="jobcountry" class="form-control">
                    <?php			 
                    $country_qry = "SELECT * FROM jb_country";
                    $country_rs =  mysql_query($country_qry); echo mysql_error();
                    while($country_row = mysql_fetch_array($country_rs)){?>
                        <option value="<?=$country_row['id']?>"> <?=$country_row['country']?></option>
                    <?php }?>
                  </select>
                 </div>
              </div>-->
            
            <div class="col-md-4">
            <div class="form-group">
            <label for="jobfileimage" class="labelcolor">Image</label>
            &nbsp;<span class="Errorclass" id="jobimagesms"></span>
            <form action="<?=base_url()?>product/uploadproductimage"  method="post" action="#" id="productpage">
            <input type="hidden" id="proimage" value="" />
            <input type="file" id="productfile"  name="productfile">
             <span id="productfileerrror"></span> 
            <table id="files">
            </table>
            <img id="j_image" src="<?=base_url()?>assets/uploads/products/small_thumbs/" width="80" style="display:none;" /> <span id="productimagesms"></span>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="jobfileimage" class="labelcolor">Image</label>
          &nbsp;<span class="Errorclass" id="jobimagesms"></span>
          <form action="<?=base_url()?>product/uploadproductimage2"  method="post" action="#" id="productpage2">
          <input type="hidden" id="proimage2" value="" />
          <input type="file" id="productfile2"  name="productfile2">
           <span id="productfile2errror"></span> 
          <table id="files2">
          </table>
          <img id="j2_image" src="<?=base_url()?>assets/uploads/products/small_thumbs/" width="80" style="display:none;" /> <span id="productimagesms2"></span>
          </form>
        </div>
      </div>
    
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="labelcolor" >Description (Note; plz donot copy and paste data in it.)</label>
          &nbsp;<span style="color:#060">*</span>&nbsp;<span class="Errorclass" id="prodescreerror"></span>
          <textarea class="ckeditor form-control" id="prodescr" name="prodescr" ></textarea>
          <!--                  	<textarea class="wysihtml5 form-control" rows="6" name="editor1" data-error-container="#editor1_error"></textarea>
--> <!-- <textarea style="width: auto; height: auto; overflow-y: scroll;" id="jobdescr" name="jobdescr" class="editor" cols="50" rows="4" tabindex="5"></textarea>--> 
        </div>
      </div>
    </div>
   <!-- </form>-->
    <div class="row">
     <div class="col-md-12">
      <div class="form-group">
      <button type="button" class="btn btn-primary" onClick="postAd()">Post Ad</button>
    </div>
    </div>
    </div>
  </div>
</div>
<?php $this->load->view('rightside.php'); ?>
</div>
</div>
</div>
<?php $this->load->view('footer.php'); ?>
<script>
$(function () {
	
    $('#productpage').fileUploadUI({
	
        uploadTable: $('#files'),
        downloadTable: $('#files'),
		
        buildUploadRow: function (files, index) {
			
            return $('<tr><td><img src="<?=base_url()?>assets/front/images/loading.gif" border="0"></td></tr>');
        },
        buildDownloadRow: function (file) {
			
			if(file.msg == "large size") {
				$("#productimagesms").show();
				$("#productimagesms").html('<span class="Errorclass">Size should be less than 2MB</span>');
				}
			else if(file.msg == "invalid type") {
				$("#productimagesms").show();
				$("#productimagesms").html('<span class="Errorclass">Only jpg,jpeg,png allowed</span>');
       	 		}
			else if(file.msg == "success") {
				$('#proimage').val(file.name);
				$('#j_image').show();
				$('#j_image').attr('src','<?=base_url()?>assets/uploads/products/small_thumbs/'+file.name);
				$("#productimagesms").show();
				$("#productimagesms").html('<span class="text-success">Upload successfully</span>');
       	 		}
		 	else {
				$("#profileimagesms").show();
				$("#productimagesms").html('<span class="Errorclass">Due to internet Problem file not upload </span>');
       	 		}
		    }
    });
   
	 $('#productpage2').fileUploadUI({
        uploadTable: $('#files2'),
        downloadTable: $('#files2'),
		
        buildUploadRow: function (files, index) {
            return $('<tr><td><img src="<?=base_url()?>assets/front/images/loading.gif" border="0"></td></tr>');
        },
        buildDownloadRow: function (file) {
		
			if(file.msg == "large size") {
				$("#productimagesms2").show();
				$("#productimagesms2").html('<span class="Errorclass">Size should be less than 2MB</span>');
				}
			else if(file.msg == "invalid type") {
				$("#productimagesms2").show();
				$("#productimagesms2").html('<span class="Errorclass">Only jpg,jpeg,png allowed</span>');
       	 		}
			else if(file.msg == "success") {
				$('#proimage2').val(file.name);
				$('#j2_image').show();
				$('#j2_image').attr('src','<?=base_url()?>assets/uploads/products/small_thumbs/'+file.name);
				$("#productimagesms2").show();
				$("#productimagesms2").html('<span class="text-success">Upload successfully</span>');
       	 		}
		 	else {
				$("#productimagesms2").show();
				$("#productimagesms2").html('<span class="Errorclass">Due to internet Problem file not upload </span>');
       	 		}
		    }
    });
   

});
</script>
</body>
</html>