<?php $this->load->view('include/header.php'); 
?>
<style type="text/css">
    .profile{        
        margin: 0 auto;
        text-align: center;           
    }
    .profile .profile_img{
        border-radius: 50% !important;
        border: 3px solid #215374;
        display: block;
        width: 150px;
        height: 170px;
        background-size: cover;
        margin: 0px auto 20px auto;
    }
    .card{
        margin-bottom: 20px;
    }
    .skills h4 a{
        color: #000;
    }    
    .buttons a{

        margin-bottom: 3px;
        display: block;
    }
    .summary {
        padding-top: 5%;
    } 

    .avatar img {
    width: 100%;
    max-width: 100%;
    height: auto;
    border: 0 none;
    border-radius: 1000px;
}

    @media only screen and (max-width: 768px) {
        .views .fas{
            font-size: 16px !important;
            width: 20px !important;
        }
    }    
</style>
<div class="container-mid">
    <div class="row">
        <div class="col-md-3 rightside">
            <?php $this->load->view('whatshappening/leftside');?>
        </div>
        <div class="col-md-6">
            <div class="card gedf-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <?php $happen = $happening;?>
                            <div class="mr-2">
                                <a href="<?= site_url('profile/'.$happen->sh_member_id) ?>">
                                <?php if(GetUserDetails($happen->sh_member_id)->m_avatar != ''): ?>
                                    <img class="rounded-circle" width="50" src="<?=site_url('assets/uploads/members/small_thumbs/'. GetUserDetails($happen->sh_member_id)->m_avatar);?>">
                                <?php else: ?>
                                    <img class="rounded-circle" width="45" src="<?=site_url('assets/uploads/members/user-placeholder.jpg');?>">
                                <?php endif; ?>
                                </a>                                    
                            </div>
                            <div class="ml-2">
                                <div class="h5 m-0">
                                    <?= GetUserDetails($happen->sh_member_id)->m_name;?>
                                    <small> - <?=  GetUserDetails($happen->sh_member_id)->m_profession;?></small>
                                </div>
                                <div class="h7 text-muted"><?=date('d-M-Y - h:i a', strtotime($happen->add_date));?></div>
                            </div>
                        </div>
                        <div>
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="gedf-drop1">
                                    <?php if(in_array($session_user_id, CvReviewTeamList())){?>
                                    <a class="dropdown-item" href="<?=site_url('whatshappening/delete/'.$happen->sh_id);?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                                    <?php }?>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">                    
                    <?php if($happen->sh_image != ''): ?>
                    <div class="img">
                        <img src="<?=site_url('assets/uploads/happens/'. $happen->sh_image )?>" class="img-fluid img-responsive" style="width: 100%;">
                    </div>                        
                    <?php endif; ?>
                    <div class="desc">
                        <?= nl2br($happen->message);?>
                    </div>                    
                </div>
                <!--<div class="card-footer text-right">
                    <a href="#" class="card-link"><i class="fa fa-thumbs-o-up"></i> Like</a>
                    <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                    <!--<a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                    <a href="#" class="btn btn-success">View</a>
                </div>-->
            </div>
        </div>
        <div class="col-md-3 rightside">
            <?php $this->load->view('whatshappening/rightside');?>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer.php'); ?>