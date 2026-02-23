<?php $this->load->view('include/header');
$session_user_id = $this->session->userdata('user_id');
?>
<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />
<style>
    .proimg{    
        border-radius: 8px !important;
        border: 2px solid #215374;
        display: block;
        width: 110px;
        height: 110px;
        float: left;
        margin-right: 20px;
        background-size: cover;
    }
    .card{
        margin-bottom: 20px;
    }
    .card a{
        text-decoration: none;
        color: #000;
    }
    .card a.btn{
        color: inherit;
    }
    .heading{
        font-weight: bold;
        font-size: 13px;
        border-bottom: 1px solid #ccc;
        margin-top: 20px;
        margin-bottom: 5px;
    }
    .detail{
        font-size: 13px;
        text-decoration: none;
    }
</style>

<div class="container-mid">    

    <div class="row" id="loadData">
        
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12  text-center">
          <img width="65" style="display:none;" id="loading-image" src="<?= site_url('nassets/img/ajax-loader.gif');?>">
          <br />
          <button class="btn btn-primary loadmore" style="width: 40%;">Load More</button>
        </div>
    </div>
</div>




<?php $this->load->view('include/footer'); ?>


<script>

   
//    var limit = 10;
   $(document).ready(function(){      
    var page_id = 1;    
    var limit = 10;
    var total_limit = 10;
    loadMentors(page_id,limit);
    
    $(document).on('click', '.loadmore', function(){        
//        alert('hello');
        
//        var b = 0;
        total_limit = total_limit + limit;
        $('.paging_page').hide();
//        var limit = parseInt($("#limit").val());          
        $('#page_id').val(page_id);
//        b = parseInt(100);
//        var total_limit = limit + b;         
//        $('#page_id').val(page_id);
//        b = parseInt(100);
//        var total_limit = limit + b;a
         console.log(total_limit);
        loadMentors(page_id,total_limit);
    });
    

  function loadMentors(page_id,limit){  
    
    $('#loading-image').show();    
//    $('#page_id').val(page_id);    
//    $('#limit').val(limit);
    var limit = limit;
    var page_id = page_id;
   
    var form_data = {
      page_id       : page_id,       
      limit         : limit, 
      };    
    
    $.ajax({
        url   : "<?= site_url('mentors/mentors_ajax1')?>",
        type  : 'POST',
        data  : form_data,
        success : function(data){            
            $('#loadData').html(data);
        },
        complete:function(){
            $('.paging_page').show();
            $('#loading-image').hide();
        }
    }); 
}
    

    
    
});

</script>