<?php $this->load->view('include/header');
$session_user_id = $this->session->userdata('user_id');
?>
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
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <h2>Navafiz Mentors Activity</h2>
        </div>        
    </div>
    <div class="row">
        <?php 
        $mentors_list  = CvReviewTeamList();                                
        ?>
        <?php foreach ($mentors_list as $user){?>
        <div class="col-md-4">
            <?php $pro_details = BasicInfoUser($user);?>
            <div class="card">
                <div class="card-body">
                <form action="<?=site_url('mentors/SaveActivity');?>" method="post">                
                    <div class="row">
                        <div class="col-md-4 col-md-12" style="font-weight: bold;"><?=$pro_details->m_name;?></div>
                        <div class="col-md-6 col-md-12"><textarea class="form-control" name="mentor_activity_text" rows="6"><?=isset($pro_details->mentor_activity_text) ? $pro_details->mentor_activity_text:'';?></textarea></div>
                        <div class="col-md-2 col-md-12"style=""><button style="font-size: 12px;font-weight: bold; border: none;  background: none;" type="submit" class="float-right">Save</button></div>
                    </div>                
                    <input type="hidden" name="post_user_id" value="<?=$pro_details->m_id;?>" />
                </form>
                </div>
            </div>      
        </div>
        <?php }?>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>