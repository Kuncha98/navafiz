<?php $this->load->view('include/header'); ?>
<?php
$session_user_id = $this->session->userdata('user_id');
//print_r($professionals); exit;
?>
<style>
       
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
  .col-md-2 input{
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
     
     @media screen and (max-width: 450px){
         .tabs_options a{
             max-width: 100%;
             display: block;
             margin-bottom: 9px;
         }
    }
    
    @media screen and (max-width: 400px){
        .tabs_options a{
            max-width: 100%;
            display: block;
            margin-bottom: 9px;
             
         }
    }
</style>
<!--<div class="row">-->
        
    <!--</div>-->

<div class="container-mid">    
        
<div class="row" id="loadData">
    <div class="col-md-12 mx-auto"><h2 class="text-center">Search Results For "<?=$search_keyword?>"</h2></div>
    <div class="col-md-12 mx-auto"><h2 class="text-center"><?php echo $title ?> (<?=count($professionals)?>)</h2></div>
<?php    
if($professionals!='empty') {        
    foreach(@$professionals as $professional){?>
<?php $member_img  = !empty($professional->m_avatar) ? $professional->m_avatar:'default.png'; ?>

<div class="col-md-4 col-xs-4">
    <div class="card">
        <div class="card-body">
            <div class="picandinfo">
                <a href="<?=site_url('profile/'.$professional->m_id);?>" class="proimg" style="background-image: url('<?=base_url('assets/uploads/members/'.$member_img)?>');">
                    <!--User Profile Picture-->
                </a>                
                <div class="userinfo">                            
                    <a href="<?=site_url('profile/'.$professional->m_id);?>"><h5><?=$professional->m_name?></h5></a>
                    <p>
                       <?=substr($professional->m_profession,0,50)?> <br />
                       <?=$professional->m_current_city?> <br />
                        Last Login: <?php echo DateTimeFormat($professional->last_login_date); ?>						
                       <br />
                       <!--Mentor: <b><?=$professional->mentor_id>0 ? BasicInfoUser($professional->mentor_id)->m_name:' Not Assigend ';?></b>-->
                    </p>                                        
                </div>
                <div class="clearfix"></div>
                <div class="media-body">                         
                        <div class="heading">
                             Profession:
                        </div>
                        <div class="detail">
                            <?=$professional->m_profession?>
                        </div>
                        <div class="heading">
                             Skills:
                        </div>
                        <div class="detail">
                            <?php $words = $professional->m_skills; $str_words = explode (",", $words);?>
                            <?php foreach($str_words as $skill){ ?>
                              <span style="padding-right: 14px;padding-left: 14px;border-radius:7px; margin-right: 2px;position:relative;top:0;left:-12px;font-weight: 400;bold:unset;" class="badge badge-pill badge-primary pt-1 pb-1 mb-1"><?=$skill?></span>
                            <?php } ?>
                        </div>
                    
                    <?php 
                    $user_cert = GetAllCert($professional->m_id); 
                 
                    
                    ?>
                    <?php if(!empty($user_cert)){ ?>
                        <div class="heading">
                             Certification:
                        </div>
                    <?php foreach($user_cert as $cert){?>
                        <div class="detail">
                            <?=$cert->c_title;?>
                        </div>
                    <?php } ?>
                    <?php
                    } 
                    ?>
                        <div class="heading">Home Town:</div>
                        <div class="detail">
                            <?=$professional->m_city;?>
                        </div>
                        <div class="heading">Employer:</div>
                        <div class="detail">
                            <?=$professional->m_employer?>
                        </div>
                        <div class="heading">Employment Status:</div>
                        <div class="detail">
                            <?=$professional->employment_status?>
                        </div>
                        <div class="heading">Visa Status:</div>
                        <div class="detail">
                            <?=$professional->visa_status?>
                        </div>
                        <?php if(in_array($session_user_id, CvReviewTeamList())){?>
<!--                        <div class="heading">Email</div>
                        <div class="detail">
                            <?=$professional->m_email?>
                        </div>-->
                        <div class="heading">Registered On:</div>
                        <div class="detail">
                            <?php echo DateTimeFormat($professional->added_on);?>                            
                        </div>
                        <?php }?>
                </div>                            
            </div>
        </div>
    </div>    
</div>  

<?php } }else{?>
    

  <div role="alert" class="alert alert-danger alert-dismissible">
        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
        <strong></strong> - No data exits! 
  </div>
<?php }?>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12  text-center">
          <img width="65" style="display:none;" id="loading-image" src="<?= site_url('nassets/img/ajax-loader.gif');?>">
          <br />
          <!--<input value="30" id="limit">-->
          <button class="btn btn-primary  loadmore" style="width: 40%;">Load More</button>
          
        </div>
    </div>
</div> 
    
    
<?php $this->load->view('include/footer');?> 
    
    <script>
$(document).ready(function(){    
    var limit = <?php echo $limit?>;
    var search_keyword = '<?php echo $search_keyword ?>';    
    var search_id = '<?php echo $search_id?>';    
    var total_limit = 30;   
    
    console.log(limit);
//    console.log(search_keyword);
//    console.log(search_id);
    
    $(document).on('click', '.loadmore', function(){        
        $('.paging_page').hide();
//        var page_id       =   1;    
//        var limit       = parseInt($("#limit").val());
//        b = parseInt(100);
        total_limit = total_limit + limit;
        console.log(total_limit);
        loadSearch(search_keyword,total_limit,search_id);
    });
    
    
});
    
    
function loadSearch(search_keyword,limit,search_id){  
    
    $('#loading-image').show();    
//    $('#page_id').val(page_id);    
//    $('#limit').val(limit);
    var form_data = {
      search_keyword : search_keyword,       
      limit : limit, 
      search_id : search_id 
    };  
        
    
    $.ajax({
        url   : base_url+"professionals/searchKeywordAjax",
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
</script>