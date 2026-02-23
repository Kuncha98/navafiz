<?php 
$this->load->view('include/header'); 
$session_user_id = $this->session->userdata('user_id');
$pro_details = BasicInfoUser($sheet_user_id);
?>
<div class="container-mid">    
    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('include/leftfeed'); ?>
        </div>
        <div class="col-md-9 col-xs-12">                              
            <?php $this->load->view('notification/notification-messages');?>            
            <?php if(!empty($pro_details->member_cv)){?>
            <div class="card">
                <div class="card-header">
                    <a href="#" class="btn btn-success col-md-3 col-xs-12 mx-auto">View <?=$pro_details->m_name?> CV</a>
                </div>
            </div>
            <?php }?>
            <div class="card">
                <div class="card-header text-center"><b>Messenger (Chat with <?=$pro_details->m_name?>)</b></div>                                
                <div class="card-body">
                    <div id="mchatbox">
                        <div  class="chatbox SheetChatboxData" style="font-size: 12px;">
                            <?php //$this->load->view('shoutbox/trackingsheet_chat');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<?php $this->load->view('include/footer'); ?>
<script>
$(document).ready(function(){ 
    $('.assignfrm').change(function(){
        $(this).submit();
    });
    
    loadtrackingsheetchat(<?=$sheet_user_id?>);
});

function loadtrackingsheetchat(page){        
    $.ajax({
        type: "POST",        
        url: '<?=site_url('messages/GetTsheetChat');?>/'+page,
        data: {},
        success: function (response){                        
            $('div.SheetChatboxData').html(response);            
            SheetChatAppends();            
        },        
    });
}

function SheetChatAppends(){
    var PostSheetFrm = $('#PostSheetFrm');
    PostSheetFrm.submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: PostSheetFrm.attr('method'),
            url: PostSheetFrm.attr('action'),
            data: PostSheetFrm.serialize(),
            success: function (data) {
                loadtrackingsheetchat(<?=$sheet_user_id?>);
                PostSheetFrm.hide();
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });    
    
    $('.replybtn').on('click', function(){
        var chat_id = $(this).attr('chat_id');        
        var chat_name = $(this).attr('chat_name');        
        $('#frm_parent_id').val(chat_id);        
        $('.message_text').val('Dear '+chat_name+', ');        
    });
    
    $('.deletebtn').on('click', function(d){
        d.preventDefault();
        if (confirm('Are you sure you want to delete this?')) {
            $.ajax({            
                url: $(this).attr('href'),
                data: {},
                success: function (data) {
                    loadtrackingsheetchat(<?=$sheet_user_id?>);
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });
        }
        
    });    
}
</script>