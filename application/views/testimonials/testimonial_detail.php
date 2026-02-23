<?php $this->load->view('include/header');
    $user_id = $this->session->userdata('user_id');

?>

<style>
    #card-style card{
        margin-bottom: 30px;
        position: relative;
        font-size: 14px;        
    }
    #card-style  card:hover{
        background-color: rgba(204, 199, 199, 0.125);
    }
    #card-style card .card-body{
        line-height: 25px;
    }
    .profile_img {
        border-radius: 50% !important;
        border: 3px solid #215374;
        display: block;
        width: 100px;
        height: 110px;
        background-size: cover;
        margin: 0px auto 5px auto;
    }
    .mentorname{
        position: absolute;
        right: 15px;
        top: 15px;
    }
</style>

<div class="row">
            <?php // print_r($achievement);exit(); ?>
                   
            <div class="offset-lg-3 col-lg-6 col-sm-12">
                <?php
                    $user_detail = BasicInfoUser($achievement->user_id);
                    $user_picture = empty($user_detail->m_avatar) ? 'default.png' : $user_detail->m_avatar;
                    $mentor_info = BasicInfoUser($user_detail->mentor_id);                    
                ?>
                <div id="card-style">
                <div class="card" style="margin-bottom: 20px;">   
                    
                    <div class="card-body text-center" id="prof_info">  
                        <div id="testimonial_views">
                            <span class="float-left"><i>View(s)</i>   <i class="fas fa-eye fa-eye-views" style="font-size: 16px;margin: 0;"></i> <i><b><?=$achievement->views?></b></i> </span>
                        </div>
                         <?php if(isset($mentor_info->m_name) && !empty($user_detail->m_id)){?>
                        <button class="btn btn-outline-success mentorname">Mentor: <b><?=$mentor_info->m_name?></b></button>                        
                        <?php }?>
                        <a href="<?=site_url('n/'.$user_detail->m_id);?>">
                            <span class="profile_img rounded" style="background-image: url('<?=site_url('assets/uploads/members/'.$user_picture);?>');"></span>
                            <b style="color: #215374;"><?=$user_detail->m_name;?></b>
                        </a>
                        <br>
                        <b><?=$achievement->title?></b>                        
                        <p class="card-text"><?=$achievement->description?></p>
                        <?php if($user_id==$achievement->user_id){?>
                        <!--<a href="<?=base_url('testimonials/post/'.$achievement->id);?>" class="btn btn-primary">Edit</a>-->
                        <?php }?>
                        <?php if(in_array($user_id,  CvReviewTeamList())){?>
                        <a href="<?=base_url('testimonials/delete/'.$achievement->id);?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-outline-danger">Delete</a>
                        <?php }?>
                        <?php $url = urlencode(site_url($page_meta['og_url']));?>
                    <div class="text-center mt-3">
                        <a href="http://www.facebook.com/sharer.php?u=<?=$url?>" target="_blank" title="Facebook Share"><img src="<?=site_url('nassets/img/social-imgs/fb.png')?>" style="height:40px;width: 40px"></a>
                        <!--<a href="http://www.facebook.com/sharer.php?u=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/insta.png')?>" style="height:70px;width: 80px"></a>-->
                        <a href="http://twitter.com/share?text=<?=$page_meta['title']?>&url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/tw.png')?>" style="height:40px;width: 40px" href></a>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/in.png')?>" style="height:40px;width: 40px"></a>
                        <a href="https://plus.google.com/share?url=<?=$url?>" target="_blank"><img src="<?=site_url('nassets/img/social-imgs/gg.png')?>" style="height:40px;width: 40px"></a>
                    </div>
                    <hr>
                    </div>
                    
                </div>
                </div>    
            </div>
        </div>











<?php $this->load->view('include/footer'); ?>