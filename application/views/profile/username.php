<?php 
$this->load->view('include/header'); 
$session_user_id = $this->session->userdata('user_id');
$username = BasicInfoUser($session_user_id)->username
?>
<div class="container-mid">    
    <div class="row">
        <div class="col-md-3 d-none d-sm-block">
            <?php $this->load->view('include/leftfeed'); ?>
        </div>
        <div class="col-md-6 col-xs-12">                              
            <?php $this->load->view('notification/notification-messages');?>
            <form action="<?=base_url('profile/UpdateStatus/'.$session_user_id)?>" id="memberpage" method="post">                
                <div class="card" style="margin-bottom: 30px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 col-xs-12 mx-auto">
                                <div class="msg showerr alert alert-danger" style="display: none;"></div>                                            
                                <div class="msg showmsg alert alert-success" style="display: none;"></div>
                                <div class="form-group">
                                    <h4>Personalize the URL for your profile.</h4>
                                    <input type="text" name="username" id="username" class="form-control" value="<?=$username?>" autocomplete="off" maxlength="30" />                                            
                                    <small>*Only letters, numbers and hyphens allowed IE:(usmanabdullah, usman-abdullah)</small>
                                    
                                    <div class="showurl" style="padding-top: 10px;font-weight: bold;"><?=base_url('n/')?><?=$username?></div>                                                                        
                                </div>                                                                
                                <div class="form-group">                                    
                                    <a href="javascript:void(0);" id="check" class="btn btn-success">Save</a>
                                </div>                                                                
                            </div>                            
                        </div>
                    </div>
                </div>                
              </form>
        </div>
        <div class="col-md-3">
            <?php $this->load->view('include/rightfeed'); ?>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>
<script>
$(document).ready(function(){
    $('#username').keypress(function (e) {
        
        var allowedChars = new RegExp("^[a-z0-9\-]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (allowedChars.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
    }).keyup(function() {
        
        getunameval = $(this).val();
        $('div.showurl').html(base_url+'n/'+getunameval);
        
        // the addition, which whill check the value after a keyup (triggered by Ctrl+V)
        // We take the same regex as for allowedChars, but we add ^ after the first bracket : it means "all character BUT these"
        var forbiddenChars = new RegExp("[^a-zA-Z0-9\-]", 'g');
        if (forbiddenChars.test($(this).val())) {
            $(this).val($(this).val().replace(forbiddenChars, ''));
        }
    });
    
    $('#check').on('click', function(){        
    
        getunameval = $('#username').val();        
        
        $.ajax({
            type: "POST",            
            url: base_url+'profile/checkusername',
            data: {username:getunameval},                      
            cache: false,
            timeout: 600000,
            success: function (data) {
                data = JSON.parse(data);
                if(data.code==0){
                    $('.msg').hide();
                    $('.showerr').html(data.message).show();
                }else if(data.code==1){
                    $('.msg').hide();
                    //$('.showmsg').html(data.message).show();                    
                    window.location.href = base_url+"profile/username";                    
                }
            },
            error: function (e) {
            }
        });
    });
});
</script>