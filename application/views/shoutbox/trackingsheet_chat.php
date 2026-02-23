<style>
aside { position: relative;}
.shoutbox { width: 100%; bottom: -1px; margin-bottom: 0; border-radius: 0; }
.profile-avatar { position: relative; z-index: 20; background-size: cover; background-position: top center; border-radius: 100%; -webkit-transition: opacity 0.3s ease-in; transition: opacity 0.3s ease-in; }
.profile-avatar.tiny { width: 32px; height: 32px; border: none; }
.shoutbox .panel-heading { border-radius: 0; }
.shoutbox .profile-avatar { box-shadow: none; }
.list-group{
    margin-top: 0px;
}
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


.discussion_board .sidebar-nav-fixed{
    padding: 15px 0;
}
</style>

<style>
.discussion_board .list-group-item-heading{ 
    margin-left: 48px; 
    padding-right: 30px; 
    line-height: 19px;
    color:#000;
    font-size: 14px;
}
.discussion_board { 
    width: 100%; bottom: -1px; 
    margin-bottom: 0; 
}
.profile-avatar { position: relative; z-index: 20; background-size: cover; background-position: top center; border-radius: 100%; -webkit-transition: opacity 0.3s ease-in; transition: opacity 0.3s ease-in; }
.profile-avatar.tiny { 
    width: 55px; height: 55px; border: none; margin-right: 10px; float: left;}
.discussion_board .panel-heading { border-radius: 0; }
.discussion_board .profile-avatar { box-shadow: none; }
.list-group{
    margin-top: 0px;
}
/*.discussion_board .list-group { height: 300px; overflow-y: auto; }*/
.discussion_board .list-group-item .message-content { 
    background: #ececec;
    padding: 10px;
    border-radius: 6px;
    font-size: 13px;
    position: relative;
    padding: 20px;
    border-radius: 5px; 
    margin-top: 25px;
    min-height: 100px;
}
.list-group-item{
    margin-bottom: 10px;
    position: relative;    
}
.discussion_board .list-group-item ul{ 
    margin-left: 40px;
}
.deletebtn{
    position: absolute;
    right: 18px;
    font-size: 25px;
    font-weight: bold;
    top: -5px;
}
.replybtn{
    position: absolute;
    right: 15px;
    font-size: 18px;
    bottom: 10px;
}
/*.discussion_board .list-group-item time { position: absolute; top: 0; right: 0; color: #777777; font-size: 12px; }*/
.discussion_board .form-group { width: 100%; }
.discussion_board textarea.form-control { width: 100%; resize: none; }

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
.message_text{
    width: 98%;
    margin: 0 auto;
    height: 170px;
}
/* On screens that are 992px or less, set the background color to blue */
@media screen and (max-width: 992px) {
  .discussion_board .list-group-item .message-content {
        display: block;
        float: left;
        width: 100%;
        margin: 14px 0;
        padding: 10px;        
  }
  .message_text{
      width: 100%;
  }
}
</style>
<?php 
    $user_id = intval($this->session->userdata('user_id')); 
    $pro_details = BasicInfoUser($sheet_user_id);
?>
    <div class="row discussion_board">
        <div class="panel panel-chat shoutbox">
            <?php if($user_id>0){?>
            <div class="panel-footer ">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-inline col-12" id="PostSheetFrm" action="<?=site_url('track_steps/PostChatMessage/'.$sheet_user_id.'/'.$user_id);?>" method="post">
                                <div class="form-group">
                                    <textarea name="message_text" class="message_text" style="" required="">Dear <?=$pro_details->m_name?>,</textarea>
                                    <!--<input type="text" name="message" value="" class="form-control" >-->
                                </div>
                                <div class="form-group">
                                    <label>
                                        &nbsp;&nbsp; <input type="checkbox" name="send_email_also" value="1" class="form-control" > &nbsp;For Quick Response confirm to Send an Email notification.
                                    </label>
                                </div>
                                <div class="form-group" style="text-align: center;">
                                    <input type="submit" value="Send" class="btn btn-success mt-2" style="width: 70%;margin: 0 auto;">
                                </div>
                                <input type="hidden" name="is_post" value="1">                            
                                <input type="hidden" name="session_user_id" value="<?=$user_id?>">
                                <input type="hidden" id="frm_parent_id" name="parent_id" value="0">
                          </form>
                        </div>
                    </div>
                </div>              
            </div>
            <?php }?>
            <ul class="list-group">
                <?php echo $shoutbox_messages;?>
            </ul>              
        </div>
    </div>
