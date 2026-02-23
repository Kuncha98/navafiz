<style>
    .alert{
        margin-top: 20px;
        margin-bottom: 53px;
    }
</style>
<?php if(!empty(_getSuccess())){?>
<div class="alert alert-success">
   <?=_getSuccess();?>
   <button class="close" data-dismiss="alert"></button>
</div>
<?php } else if(isset($success_message) && !empty($success_message)){?>
<div class="alert alert-success">
   <?=$success_message;?>
   <button class="close" data-dismiss="alert"></button>
</div>
<?php } else if(isset($error_message) && !empty($error_message)){?>
<div class = "alert alert-danger">
   <?=$error_message;?>
</div>
<?php } else if(!empty(_getError())){?>
<div class = "alert alert-danger">
   <ul>
       <li><?=_getError()?></li>                                          
   </ul>
</div>
<?php }?>
<?php if(!empty(validation_errors())){?>
<div class="alert alert-danger alert-dismissable">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <?php echo validation_errors(); ?>                        
</div>                    
<?php }?>