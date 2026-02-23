<?php $this->load->view('include/header.php'); ?>
<style>
.sumbitbtn { 
    background: #164885 !important;
    border-color: #164885 !important;
    color: #fff !important;
    width:200px; 
    height:50px;
    border:0;
    margin-top:10px; 
}
</style>
<div class="container-mid">
  <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">
          Notifications
        </h3>
      </div>
    <div class="col-md-12">
      <div id="NotificationsData">

      </div>
    </div>
  </div>
</div>  
<div class="container-mid">
  <div class="row"> 
      <div class="col-md-12 col-sm-12 col-xs-12  text-center">
          <button class="btn sumbitbtn  paging_page">Load More</button>
          <img width="65" style="display:none;" id="loading-image" src="<?= site_url('nassets/img/ajax-loader.gif');?>">
      </div>
  </div> 
</div>
<input type="hidden" name="limit" value="50" id="limit">
<?php $this->load->view('include/footer.php'); ?>
<script type="text/javascript">  
    
    window.onload = loadNotifications($('#limit').val());    
    function loadNotifications(limit){
        $('#limit').val(limit);   
        var form_data = { 
            limit : limit,       
        };    
        
        $.ajax({
            url   : base_url+"notifications/usernotificationsajax",
            type  : 'POST',
            data  : form_data,
            success : function(data){
                // alert(data);
                $("#profloading").hide();
                $('#NotificationsData').html(data);
            },
            complete:function(){
                $('.paging_page').show();
                $('#loading-image').hide();
            }
        }); 
    }
    
    $(document).on('click', '.paging_page', function(){      
        $('.paging_page').hide();
        $('#loading-image').show();      
        var limit = parseInt($('#limit').val());
        b = parseInt(10);
        var total_limit = limit + b;
        loadNotifications(total_limit);
    });
 
    function confirmDelete(id,url){        
        var ID = id ;
        var delete_url = url;  
        $.ajax({       
          url: delete_url,      
          type: "POST",    
          data: {type: 'Delete', 'id':ID,},
          success: function (data) {        
              if(data == 1){    
                  console.log("This record deleted successfully");
              }else if(data == 2){       
                  console.log("Not Found!");
              }   
          },
          error: function(error){       
              console.log("Something wrong!");              
          }              
        });
   }
  </script>