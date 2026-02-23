<?php $this->load->view('header.php');
include 'process/write.php';
//require_once 'process/read.php';
?>
<script>
$(function () {
    $('#happenpage').fileUploadUI({
        uploadTable: $('#files'),
        downloadTable: $('#files'),
		
        buildUploadRow: function (files, index) {
            return $('<tr><td><img src="<?=base_url()?>assets/frontend/images/small.gif" border="0"></td></tr>');
        },
        buildDownloadRow: function (file) {
			
			if(file.msg == "large size") {
				$("#happenimagesms").show();
				$("#happenimagesms").html('<span class="Errorclass">Size should be less than 2MB</span>');
				}
			else if(file.msg == "invalid type") {
				$("#happenimagesms").show();
				$("#happenimagesms").html('<span class="Errorclass">Only jpg,jpeg,png allowed</span>');
       	 		}
			else if(file.msg == "success") {
				$('#happenimage').val(file.name);
			
				// $('#happenimage').attr('name', file.name);
				$('#jj_image').show();
				$('#jj_image').attr('src','<?=base_url()?>assets/uploads/happens/small_thumbs/'+file.name);
				$("#happenimagesms").show();
				$("#happenimagesms").html('<span class="Successclass">File upload successfully</span>');
       	 		}
		 	else {
				$("#happenimagesms").show();
				$("#happenimagesms").html('<span class="Errorclass">Due to internet Problem file not upload </span>');
       	 		}
		    }
    });
   
	

});
</script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin/pages/css/todo.css"/>
<link href="<?=base_url()?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<body class="corporate">
<?php $this->load->view('pagetop.php'); ?>
<div class="page-container">
  <div class="page-head">
    <div class="container">
      <div class="page-title">
        <h1>Whats happenings</h1>
      </div>
    </div>
  </div>
  <div class="page-content">
    <div class="container">
    
    <div class="row"  >
                  <div class="col-md-6 col-sm-6">
                    <div class="scroller" style="max-height:800px; overflow:hidden;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7"> 
                     
                      <form action="<?=base_url()?>member/uploadhappenimage" class="form-horizontal" method="post" action="#" id="happenpage">
                      <input type="hidden" id="happenimage" name="happenimage" value="" />
                      <div class="form">
                        <div class="form-group">
                          <div class="col-md-12">
                            <input type="file" id="happenfile"  name="happenfile">
                            <table id="files">
                            </table>
                            <img id="jj_image" src="<?=base_url()?>assets/uploads/happens/small_thumbs/" width="80" style="display:none;" /> <span id="happenimagesms"></span> </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <textarea class="form-control todo-taskbody-taskdesc" id="posting_message" name="posting_message"  rows="8" placeholder="Enter Message..."><?php if (isset($_POST['posting_user'])) echo $_POST['posting_message'];?>
</textarea>
                            <span id="shsmserror"></span> </div>
                        </div>
                        <div class="form-group" style="margin-left:10px;">
                        <button onclick="shoutBox()" class="btn btn-primary" type="button">Post</button>
                        
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
    
      <div class="row">
        <div class="col-md-12">
          <div class="todo-content">
            <div class="portlet light"> 
              <!-- PROJECT HEAD --> 
              
              <!-- end PROJECT HEAD -->
              <div class="portlet-body">
                <div class="row">
                  <div class="col-md-12 col-sm-12"> 
                  
                  <!--  <div class="scroller" style="height:800px; overflow:auto !important; ">-->
                      <div>
                      <div class="todo-tasklist">
                        <?php
        		 $qry = "select * from `jb_shoutbox`
			 		 JOIN jb_member ON jb_shoutbox.sh_member_id = jb_member.m_id ORDER BY add_date DESC"; //where add_date = '".date("Y-m-d",time())."' 
			 $vpb_check_items = mysql_query($qry);
			if(mysql_num_rows($vpb_check_items) > 0)
                        {
                            while($vpb_rows = mysql_fetch_array($vpb_check_items)){?>
                                <div class="todo-tasklist-item todo-tasklist-item-border-green">

                                  <div class="todo-tasklist-item-title">
                                    <?=$vpb_rows['m_name']?>
                                  </div>
                                  <div class="todo-tasklist-item-text">
                                    <?=$vpb_rows['message']?>
                                  </div>
                                  <div class="todo-tasklist-controls pull-left"> <span class="todo-tasklist-date"><i class="fa fa-calendar"></i>
                                    <?=$vpb_rows['add_date']?>
                                    </span> </div>
                                </div>
                                <?php if($vpb_rows['sh_image'] != ""){?>
                                <img class="pull-left" src="<?=base_url()?>assets/uploads/happens/<?=$vpb_rows['sh_image']?>" style="max-width:800">
                                <?php }?>
                        <?php }
			}?>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="todo-tasklist-devider"> </div>
                   
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer.php'); ?>
</body>
</html>