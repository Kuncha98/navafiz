<?php $this->load->view('include/header-ind'); ?>
<style type="text/css">
    .card{
        margin-bottom: 30px;
    }
  

  
  .col-md-2 button .fa-angle-right {
    margin-top: 0;
    font-size: 20px;
    vertical-align: bottom;
    margin-left: 4px;
    color: #fff;
  }
  .col-md-7 input{
    padding: .375rem 2.75rem;
  }


    .profile-list .skills a {
        background-color: #f1f1f1;
        border-radius: 5px;
        font-size: 16px;
        margin: 0 10px 10px 0;
        padding: 5px 20px;
        text-transform: uppercase;
    }
    
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
    a{
        text-decoration: none;
        color: #000;
    }
    .picandinfo p{
        font-size: 13px;
    }
    .userinfo a{
        font-weight: bold;
        text-decoration: none;
        font-size: 13px;
    }
    .heading{
        font-weight: bold;
        font-size: 13px;
        border-bottom: 1px solid #ccc;
        margin-top: 0px;
        margin-bottom: 5px;
    }
    .detail{
        font-size: 13px;
        text-decoration: none;
    }

    .Heading-title-left h1
    {
      margin: 3% 0 5% 0;
    }
    .Heading-title-left h1::after {
        background-color: #242424;
        top: 100px;
        content: "";
        height: 1px;
        left: 0;
        margin: 0 auto;
        position: absolute;
        right: 0;
        width: 59px;
    }

    .Heading-title-left h1::before {
        background-color: #242424;
        top: 90px;
        content: "";
        height: 1px;
        left: 0;
        margin: 0 auto;
        position: absolute;
        right: 0;
        width: 99px;
     }  

</style>


<div class="container-mid">    
<!--    <div class="row">
        <div class="col-md-4 mx-auto"><h2 class="text-center"><?=$title?> (<?=count($professionals)?>)</h2></div>
    </div>-->
    <div class="row">
        <?php $this->load->view($listprofessionals);?>
    </div>    
</div>

<?php $this->load->view('include/footer');?> 
<!-- CORE JS -->  
<script>
$(document).ready(function(){      
    var page_id = 1;    
    var limit = '<?php echo $limit?>';    
    $(document).on('click', '.loadmore', function(){        
        $('.paging_page').hide();
        var page_id       =   1;    
        var limit       = parseInt($("#limit").val());          
        $('#page_id').val(page_id);
        b = parseInt(100);
        var total_limit = limit + b;
        loadProfessionals(page_id,total_limit);
    });    
    
    
    $(document).on('submit', '.SearchProfiles', function(frm){        
        frm.preventDefault();
        
        $('#loadData').html('');
        $('.paging_page').hide();
        var page_id       =   1;    
        var limit       = 0;          
        $('#page_id').val(page_id);
        b = parseInt(100);
        var total_limit = limit + b;
        loadProfessionals(page_id,total_limit);
    });    
});
</script>
