<?php $this->load->view('header.php'); ?>
<body>
<div class="page">
<?php $this->load->view('pagetop.php'); ?>
<div class="clearfix"></div>
<link href="<?=base_url()?>assets/metrolab/css/style.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/metrolab/css/style-responsive.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/metrolab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<style>
.home-box-tabs{
    padding: 0 0 60px 0 !important;

}
</style>
<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>    
<section class="home-box-tabs">
    <div class="container-fluid" style="background: #fff;">
        <div class="row-fluid" style="padding-left: 40px;">
            <h3>WhatsApp <?=$group_info->group_name;?> Group</h3>
            <!--BEGIN METRO STATES-->
            <p>
                New members are Welcome in the group.  
                <br />
                The purpose of this group is to
                <br />
                <b>- know each other </b>
                <br />
                <b>- help each other </b>
                <br />
                <b>- Share Jobs (with each other).</b>
                <br />
                <b>- Share Links from Navafiz and Other Job sites & groups.</b>
                <br />
                <b>- Share Technical info.</b>
                <br />
                As an ice breaker, share the snapshot of your Card, as shown on Navafiz website. 
                <br />
                Also share the link of your Navafiz profile. 
                <br />
                Avoid irrelevant discussions or posts. 
                <br />
                Please follow group rules & help each other. 
                <br />
                Regards,
                <br />
                <b>Navafiz Admin</b>
            </p>            
            <div class="space10"></div>
            <!--END METRO STATES-->
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <a href="<?=site_url('join-social-group/'.$group_info->social_group_id)?>">
                    <button type="button" class="btn btn-success offset-1 col-sm-6 col-xs-12">Join Group</button>
                </a>            
            </div>
        </div>
        <div class="row-fluid offset-1-vertical" style="margin-top: 30px;padding-top: 40px;">
            <h3>Group Members (<?=count($group_subscribers);?>)</h3>
            <?php
            foreach($group_subscribers as $subscriber){
               $pro_details =  UserInfo($subscriber->user_id);
            ?>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="company-list-box" style="height:222px;background-color: #D5D6ED;">                                
                    <span class="company-list-img">
                        <img src="<?=base_url('assets/uploads/members/'.$pro_details->m_avatar)?>" class="img-responsive" alt="<?=$pro_details->m_name?>">
                    </span>
                    <div class="company-list-box-detail">
                        <h5> <?=$pro_details->m_name?> </h5>
                        <p> <?=$pro_details->m_profession?> </p>
                        <div class="ratings"> <?=$pro_details->m_current_city?></div>
                        <div class="media-body"> 
                            <div>
                                <small> <strong> Skills:</strong> 
                                    <?php
                                    $str_arr = explode(",",$pro_details->m_skills);			  
                                    if($str_arr){?>              
                                    <?php for($a= 0; $a< sizeof($str_arr); $a++){
                                        if($a>6 )
                                            break;
                                        ?>
                                    <a href="#"> <?= $str_arr[$a];?> , </a>
                                    <?php                                                 
                                    } }  ?>
                                </small>
                            </div>
                            <div>
                                <small> <strong> Qualification:</strong> 
                                    <?php
                                    $qry= "select * from jb_member_education where me_member_id = '".$pro_details->m_id."' order by me_year desc limit 0,1 ";
                                    $rs = mysql_query($qry);
                                    if(mysql_num_rows($rs)>0)
                                    {
                                    while($row = mysql_fetch_array($rs)){  ?>
                                    <?=$row['me_descr']?> - <?=$row['me_year']?>
                                    <?php break;} }?> 
                                </small>
                            </div>

                            <div>
                                <small><strong>Mobile Number:</strong>
                                  <?=$pro_details->m_phone;?>

                                </small>
                            </div>
                            <div>
                                <small>
                                    <strong>Email:</strong>
                                    <?=$pro_details->m_email?>
                                </small>
                            </div>
                            <div>
                                <a href="<?=site_url('professional/'.$pro_details->m_id);?>"><?=site_url('professional/'.$pro_details->m_id);?></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <!--<b><?php echo UserInfo($subscriber->user_id)->m_name?></b> &nbsp;&nbsp;&nbsp;-->                    
            <?php } ?>                        
        </div>
        
    </div>
</section>       
<div class="clearfix"></div>
<?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>