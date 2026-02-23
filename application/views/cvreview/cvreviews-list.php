<?php $this->load->view('include/header'); 
$cvreview_team = CvReviewTeamList();
shuffle($cvreview_team);
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
<style>
    .card{
        margin-top: 20px;
    }
    .card .card-header a{
        font-size: 16px;
        color:#000;
    }
    .cvreviews_list{
        margin-top: 50px;
        padding-left: 0px;
    }
    .cvreviews_list li{
        list-style: none;
        border:1px solid grey;
        border-radius: 5px ;
        margin-bottom: 5px;
    }
    .sumbitbtn { 
        background: #164885 !important;
        border-color: #164885 !important;
        color: #fff !important;
        width:200px; 
        height:50px;
        border:0;
        margin-top:10px; 
    }
    ul.counters li{
        font-weight: bold;
        border: solid 1px #ccc;
        padding: 3px 10px;
    }
    ul.counters li.line{
        border-top: 1px solid #ccc;
    }
    p.exper-advise{
        line-height: 18px;
    }
    ul.cvreviews_list{

    }
    ul.cvreviews_list li{
        padding: 20px;
    }
    ul.cvreviews_list li span{
        display: block;
    }
</style>
<div class="container-mid">
    <?php $this->load->view('notification/notification-messages');?>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center">
                <h5 class="card-header">Total</h5>
                <div class="card-body">
                  <h5 class="card-title">
                    <?= $cvreviews_list;?>

                    </h5>
                  <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                  <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="card text-center">
                <h5 class="card-header">Approved</h5>
                <div class="card-body">
                  <h5 class="card-title"><?=CVreviewStatusByType(array('review_status'=>'review_done'));?></h5>
                  <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                  <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="card text-center">
                <h5 class="card-header">In Process</h5>
                <div class="card-body">
                  <h5 class="card-title"><?=CVreviewStatusByType(array('review_status'=>'commented'));?></h5>
                  <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                  <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="card text-center">
                <h5 class="card-header">Not Assigned</h5>
                <div class="card-body">
                  <h5 class="card-title"><?=CVreviewStatusByType(array('review_status'=>'review_inprocess','assign_user_to'=>0));?></h5>
                  <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                  <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>
        </div>
    </div>
    <div class="row">                        
        <?php foreach($cvreview_team as $team_member_id){?>
        <div class="col-md-2 col-xs-12 p-1">
            <div class="card">
                <h5 class="card-header">
                    <a href="<?=site_url('profile/'.$team_member_id)?>">
                        <?= ucfirst(BasicInfoUser($team_member_id)->m_name)?> 
                    </a>
                </h5>
                <div class="card-body">
                  <!--<h5 class="card-title"></h5>-->
                    <p class="card-text">
                        Assigned - (<?=GetCvReviewCountbyUser($team_member_id);?> ) -  <br />
                        In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>$team_member_id));   ?> - <br />
                        Approved (<?=CVreviewStatusByType(array('review_status'=>'review_done','assign_user_to'=>$team_member_id)); ?>) - <br />
                        Pending (<?=CVreviewStatusByType(array('review_status'=>'review_inprocess','assign_user_to'=>$team_member_id)); ?>) <br />
                    </p>                  
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row" style="margin-top: 10px;">        
                <div class="col-md-1 col-xs-12">
                    <b>Filter by: </b>                     
                </div>
                <div class="col-md-3 col-xs-12">
                    <select class="select-category form-control" id="review_status">
                        <option value="" required>Select to filter</option>
                        <option value="review_done">Approved</option>
                        <option value="commented">In Process</option>
                        <option value="review_inprocess">Not Assigned</option>
                    </select>
                </div>                                
            </div>
        </div>
    </div>
    
    <div class="row" id="cvreviewsData">

    </div>
    <div class="row"> 
        <div class="col-md-12 col-sm-12 col-xs-12  text-center">
          <img width="65" style="display:none;" id="loading-image" src="<?= site_url('nassets/img/ajax-loader.gif');?>">
<!--          <p>
              <button class="btn sumbitbtn  paging_page">Load More</button>
          </p>-->
        </div>
        
    </div>
    <input type="hidden" name="limit" value="50" id="limit">
</div>  


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<?php $this->load->view('include/footer');?>
<script type="text/javascript">    
    $(document).ready(function(){
        
        loadcvreviews(50);
//        $('#dataTable').DataTable();
        $('#review_status').on('change', function(){
            $('#cvreviewsData').html('');
            var limit = parseInt($('#limit').val());
            b = parseInt(50);
            var total_limit = limit + b;
            loadcvreviews(total_limit);
        })
    });
  
    function loadcvreviews(limit){
        $('#loading-image').show();      
        $('#limit').val(limit);
        var review_status = $('#review_status').val();
        var form_data = {
          limit         : limit,
          review_status : review_status,  
        };    
        $.ajax({
          url   : "<?php echo site_url('cvreview/cvreviewsajax')?>",
          type  : 'POST',
          data  : form_data,
          success : function(data){
            // alert(data);
            $("#profloading").hide();
            $('#cvreviewsData').html(data);
          },
          complete:function(){
            $('.paging_page').show();
            $('#loading-image').hide();
          }
        }); 
    }

    $(document).on('click', '.paging_page', function(){  
        var limit       = parseInt($('#limit').val());
        b = parseInt(50);
        var total_limit = limit + b;
        loadcvreviews(total_limit);
    });    
    function appent(){
        
    }
</script> 