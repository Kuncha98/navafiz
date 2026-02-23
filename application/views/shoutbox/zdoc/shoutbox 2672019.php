<?php $this->load->view('header');?>
<!------ Include the above in your HEAD tag ---------->
<style>
aside { position: relative;}
.shoutbox { width: 100%; bottom: -1px; margin-bottom: 0; border-radius: 0; }
.profile-avatar { position: relative; z-index: 20; background-size: cover; background-position: top center; border-radius: 100%; -webkit-transition: opacity 0.3s ease-in; transition: opacity 0.3s ease-in; }
.profile-avatar.tiny { width: 32px; height: 32px; border: none; }
.shoutbox .panel-heading { border-radius: 0; }
.shoutbox .profile-avatar { box-shadow: none; }
/*.shoutbox .list-group { height: 300px; overflow-y: auto; }*/
.shoutbox .list-group-item-heading, .shoutbox p { margin-left: 48px; padding-right: 30px; line-height: 19px;color:#000;}
.shoutbox .list-group-item .message-content { 
    background: #ececec;
    padding: 10px;
    border-radius: 6px;
    font-size: 13px;
}
.shoutbox .list-group-item ul{ 
    margin-left: 40px;
}
/*.shoutbox .list-group-item time { position: absolute; top: 0; right: 0; color: #777777; font-size: 12px; }*/
.shoutbox .form-group { width: 100%; }
.shoutbox textarea.form-control { width: 100%; resize: none; }

.panel-chat { border-color: #ddd; }
.panel-chat > .panel-heading { color: #fff; background-color: #373d43; border-color: #ddd; }
.panel-chat > .panel-heading + .panel-collapse > .panel-body { border-top-color: #ddd; }
.panel-chat > .panel-heading .badge { color: #373d43; background-color: #fff; }
.panel-chat > .panel-footer + .panel-collapse > .panel-body { border-bottom-color: #ddd; }
.panel-chat .close { color: #fff; position: absolute; top: 8px; right: 16px; }

.chat-status { position: absolute; top: 7px; left: 8px; }
.chat-status .btn { color: #fff; font-weight: 500; }
.chat-status .status-icon { display: inline-block; margin-top: 4px; margin-right: 8px; float: left; width: 10px; height: 10px; border-radius: 5px; }
.chat-status .status-icon.icon-online { background: #5cb85c; }

.btn-inverted { color: #fff; background: rgba(0, 0, 0, 0.2); }
.btn-inverted:hover, .btn-inverted:focus, .btn-inverted.focus { color: #fff; background: rgba(0, 0, 0, 0.3); }
.form-inline .form-group input{
    padding-left: 10px;
}
</style>
<?php
    $shoutbox_messages  = shoutbox_getall_messages();
    $user_id = intval($this->session->userdata('user_id'));
    //echo "<pre>"; print_r($shoutbox_messages); echo "</pre>";
?>
<div class="container-fluid">
    <div class="row" style="margin: 20px;">
        <a href="<?=site_url()?>">
            <img src="<?= site_url('assets/frontend/images/logo.png')?>" />
        </a>    
    </div>
    <div class="row">
        <aside class="sidebar col-md-12">
            <div class="sidebar-nav-fixed pull-right">
                <div class="panel panel-chat shoutbox">
                    <div class="panel-heading">
                        <div class="btn-group chat-status">
                            <button type="button" class="btn btn-inverted btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="status-icon icon-online"></span>Online
                                <span class="sr-only">Change Status</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Online</a></li>
                                <li><a href="#">Away</a></li>
                                <li><a href="#">Do Not Disturb</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Offline</a></li>
                            </ul>
                        </div>
                        <h3 class="panel-title text-center">Navafiz Discussion Board</h3>
                        <a href="<?=  site_url()?>" class="close close-shoutbox" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>
                    <div class="panel-footer ">
                        <div class="col-12">
                            <form class="form-inline col-12" action="" method="post">
                            <div class="form-group">
                                <textarea name="message" style="width: 98%;margin: 0 auto;height: 120px;"></textarea>
                                <!--<input type="text" name="message" value="" class="form-control" >-->
                            </div>
                                <div class="form-group" style="text-align: center;">
                                <input type="submit" value="Send" class="btn btn-success" style="width: 70%;margin: 0 auto;">
                            </div>
                            <input type="hidden" name="is_post" value="1">
                            <input type="hidden" name="message_parent_id" value="<?=$message_parent_id?>">
                          </form>
                        </div>                    
                    </div>
                    <?php echo $messages_list;?>
                    <!--<ul class="list-group">
                       <?php 
                       $i=0;
                       foreach($shoutbox_messages as $smessage){?>
                        <li class="list-group-item">
                            <?php 
                            $user_details = GetUserDetails($smessage->user_id);
                            $user_picture = empty($user_details->m_avatar) ? 'default.png' : $user_details->m_avatar;
                            ?>
                          <div class="profile-avatar tiny pull-left" style="background-image: url(assets/uploads/members/<?=$user_picture?>);"></div>
                          <h5 class="list-group-item-heading">
                              <a href="<?=site_url('profile/'.$smessage->user_id)?>"><?=$user_details->m_name;?></a> | <?=$user_details->m_profession;?> | <?=$user_details->m_current_city;?> | <time><i><?=date('h:i a - d-M-Y', strtotime($smessage->added_on));?></i></time>
                          </h5>
                          <p class="message-content" style="position: relative; <?=$i%2==0 ? 'background:#d0cfcf;':''?>">
                            <?php if(in_array($user_id, array(10,3797,4561,3816,4561,3346,3478))){?>
                            <a href="<?=site_url('shoutbox/delete/'.$smessage->id)?>" onclick="return confirm('Are you sure you want delete it.');" style="position: absolute;right: 0;">
                                <span>×</span>
                            </a>
                            <?php }?>
                            <?=  nl2br($smessage->message);?>
                            <span class="btn reply" id="replyb" onClick="$('#reply').toggle();">Reply</span> 
                          
                            </p>
                        </li>
                        <?php $i++; }?>
                    </ul>-->                
                </div>  
            </div>
        </aside>
    </div>
</div>
