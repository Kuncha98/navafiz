<?php $this->load->view('header.php'); ?>
<style>
.panel-body ul {
    list-style: none !important;
}

.blog-H {
    background-color: #4887d2 !important;
    position: relative
}

.blog-H .blog-content {
    padding: 20px 0 100px
}

.blog-H .blog-content .blog-Posts {
    padding: 30px 0
}

.blog-H .blog-content .blog-Posts .blog-item {
    background: #fff
}

.blog-H .blog-content .blog-Posts .blog-item:hover {
    -webkit-box-shadow: 0 0 12px 5px rgba(36,83,138,0.6);
    -moz-box-shadow: 0 0 12px 5px rgba(36,83,138,0.6);
    box-shadow: 0 0 12px 5px rgba(36,83,138,0.6)
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Thumb {
    width: 100%;
    height: 200px;
    background-position: top center;
    background-repeat: no-repeat;
    background-size: cover;
    border-bottom: #ccc solid 1px;
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details {
    padding: 15px 30px 30px;
    position: relative;
    height: 205px;
    margin-bottom: 29px;
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details h4 {
    font-size: 22px;
    color: #182866
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details p {
    font-size: 16px;
    color: #666;
    margin-bottom: 20px
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details .read-More {
    padding: 10px 20px;
    border-radius: 5px;
    color: #fff;
    font-size: 14px;
    background-color: #182866;
    font-weight: 700;
    display: inline-block
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details .B-date {
    width: 60px;
    height: 60px;
    border-radius: 100%;
    background-color: #f57f3a;
    text-align: center;
    position: absolute;
    right: 15px;
    top: -40px;
    -webkit-box-shadow: 0 6px 6px 0 rgba(70,70,70,0.4);
    -moz-box-shadow: 0 6px 6px 0 rgba(70,70,70,0.4);
    box-shadow: 0 6px 6px 0 rgba(70,70,70,0.4)
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details .B-date .date {
    display: block;
    font-size: 20px;
    color: #fff;
    font-weight: 700;
    margin-top: 10px;
    line-height: 1
}

.blog-H .blog-content .blog-Posts .blog-item .blog-Details .B-date .month {
    display: block;
    font-size: 12px;
    text-transform: uppercase;
    color: #fff
}

.blog-H .action-BTN:hover {
    background-color: #89ba42;
    color: #fff
}
.blog-Page .blog-banner{
    width: 100%;
    margin: 0 0 30px;
    background-repeat: no-repeat;    
    height: 640px;
}
</style>
<body>
<div class="page category-page"> 
<?php $this->load->view('pagetop.php');
?>
<div class="clearfix"></div>
<div class="blog-Page animatedParent">
    <div class="inner-page-content">

        <div class="container">
            <a class="go-back" href="<?=site_url('whatshappening');?>"> <i class="fa  fa-long-arrow-left"></i> back to all</a>
                <?php $user_detail =  GetUserDetails($happening->sh_member_id);?>
            <a href="<?=site_url('profile/'.$happening->sh_member_id);?>">
                <h1 style="font-size: 26px;margin-bottom: 0;padding-bottom: 0;line-height: 0px;margin-top: 45px !important;">                
                    <?php echo $user_detail->m_name;?>                
                </h1>
            </a>
            <br>
            <small><?php echo $user_detail->m_profession;?></small>
            <br>
            <small><?php echo $user_detail->m_current_city;?></small>
            <div class="clearAll"></div>

            <div class="blog-widget">
                <div class="row">
                    <div class="col-sm-6">
                        <p>POSTED ON <span><?=date('d M Y',  strtotime($happening->add_date));?></span></p>
                    </div>
                    <div class="col-sm-6">
                        
                    </div>
                </div>
            </div>
            
            
        </div>

        <div class="container">
            <div class="col-lg-6 col-xs-12">
                <p>
                    <?=nl2br($happening->message);?>                    
                </p>                
                <div class="clearAll"></div>
                <img src="<?=site_url('assets/uploads/happens/'.$happening->sh_image)?>" class="img-responsive" style="width: 100%;">                
            </div>            
        </div>

    </div>
</div>
<?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>