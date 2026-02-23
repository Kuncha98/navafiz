<?php $this->load->view('header.php'); ?>

<body>
<div class="page category-page"> 
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <section class="categories-list-page light-grey">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
            <?php $this->load->view('notification/notification-messages');?>
            <h1>Cv Review System</h1>
            <div class="row" style="font-size: 14px;">
                <div class="col-md-12" style="padding-left: 20px;">
                    <style>
                        ul.counters li{
                            font-weight: bold;
                            border: solid 1px #ccc;
                            padding: 3px 10px;
                        }
                        ul.counters li.line{
                            border-top: 1px solid #ccc;
                        }
                        p.exper-advise{
                            line-height: 18px;
                        }
                    </style>
                    
                    
                    <ul class="counters">
                        <li class="list-group-item">Total: <?= count($cvreviews_list);?> </li>
                        <li class="list-group-item">Approved: <?=CVreviewStatusByType(array('review_status'=>'review_done'));?> </li>
                        <li class="list-group-item">In Process: <?=CVreviewStatusByType(array('review_status'=>'commented'));?> </li>
                        <li class="line"></li>
                        <li class="list-group-item">Liaqat Ali | Assigned - (<?=GetCvReviewCountbyUser(10);?> ) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>10));?></li>
                        <li class="list-group-item">Amna Hussain  | Assigned - (<?=GetCvReviewCountbyUser(3478);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>3478));?></li>
                        <li class="list-group-item"> Umair Sumbal | Assigned - ( <?=GetCvReviewCountbyUser(3346);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>3346));?></li>
                        <li class="list-group-item">Waseem Raja | Assigned - (<?=GetCvReviewCountbyUser(4561);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>4561));?></li>
                        <li class="list-group-item">Faraz Ahmad | Assigned - (<?=GetCvReviewCountbyUser(3816);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>3816));?></li>
                        <li class="list-group-item">Rana Shahid | Assigned - (<?=GetCvReviewCountbyUser(11889);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>11889));?></li>
                        <li class="list-group-item">Salman Ali | Assigned - (<?=GetCvReviewCountbyUser(7083);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>7083));?></li>
                        <li class="list-group-item">Hassan Mohiuddin | Assigned - (<?=GetCvReviewCountbyUser(9570);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>9570));?></li>
                        <li class="list-group-item">Nouman | Assigned - (<?=GetCvReviewCountbyUser(11900);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>11900));?></li>
                        <li class="list-group-item">Muhammad Waqar | Assigned - (<?=GetCvReviewCountbyUser(3967);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>3967));?></li>
                        <li class="list-group-item">Imamuddin | Assigned - (<?=GetCvReviewCountbyUser(9371);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>9371));?></li>
                        <li class="list-group-item">Azam Ilyas | Assigned - (<?=GetCvReviewCountbyUser(6227);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>6227));?></li>
                        <li class="list-group-item">Fahad Sayeed | Assigned - (<?=GetCvReviewCountbyUser(11962);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>11962));?></li>
                        <li class="list-group-item">Muhammad Larik | Assigned - (<?=GetCvReviewCountbyUser(9347);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>9347));?></li>
                        <li class="list-group-item">LINCY FLEMY | Assigned - (<?=GetCvReviewCountbyUser(12276);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>12276));?></li>
                        <li class="list-group-item">Mukrramuddin Mohammed | Assigned - (<?=GetCvReviewCountbyUser(7464);?>) - In Progress <?=CVreviewStatusByType(array('review_status'=>'commented','assign_user_to'=>7464));?></li>
                    </ul>
                    <?php 
                       /* echo "<b>Liaqat Ali (".GetCvReviewCountbyUser(10).") Assigned</b> <br />";
                        echo "<b>Amna Hussain (".GetCvReviewCountbyUser(3478).") Assigned </b> <br />";
                        echo "<b>Umair Sumbal (".GetCvReviewCountbyUser(3346).") Assigned</b> <br />";
                        echo "<b>Waseem Raja (".GetCvReviewCountbyUser(4561).") Assigned</b> <br />";
                        echo "<b>Faraz Ahmad (".GetCvReviewCountbyUser(3816).") Assigned</b> <br />";
                        echo "<b>Rana Shahid (".GetCvReviewCountbyUser(11889).") Assigned</b> <br />";
                        echo "<b>Salman Ali (".GetCvReviewCountbyUser(7083).") Assigned</b> <br />";
                        echo "<b>Hassan Mohiuddin (".GetCvReviewCountbyUser(9570).") Assigned</b> <br />";
                        echo "<b>Nouman (".GetCvReviewCountbyUser(11900).") Assigned</b> <br />";
                        echo "<b>Muhammad Waqar (".GetCvReviewCountbyUser(3967).") Assigned</b> <br />";
                        echo "<b>Imamuddin (".GetCvReviewCountbyUser(9371).") Assigned</b> <br />";
                        echo "<b>Azam Ilyas (".GetCvReviewCountbyUser(6227).") Assigned</b> <br />";
                        echo "<b>Fahad Sayeed (".GetCvReviewCountbyUser(11962).") Assigned</b> <br />";*/
                    ?>

                </div>
                
            </div>
            <div class="row">
                <?php
                if(count($cvreviews_list)>0){
                ?>
                <table width="95%" align="left" border="1">
                    <?php 
                    $cvr=1;
                    foreach ($cvreviews_list as $current_review){
                        $user_details = GetUserDetails($current_review->member_id);
                    ?>
                    <tr id="rownum<?=$current_review->review_id?>" style="<?=!empty($current_review->admin_comments) || $current_review->review_status == 'commented' ? 'background: #e4f9e3;':'';?> <?=$current_review->review_status == 'review_done' ? 'background: #91c6d2;':'';?>">
                        <td>
                            <b><?=$cvr?></b>                            
                        </td>
                        <td style="padding: 20px;">
                            <a href="<?=site_url('profile/'.$current_review->member_id);?>" target="_blank">
                                <?=$user_details->m_name;?> | <?=$user_details->m_profession;?> | <?=$user_details->m_current_city;?> - <?=$current_review->member_id;?>
                            </a>
                            <br />
                            <?=$current_review->review_title;?>
                            <br>
                            <br>
                            <b>Submission Date:</b> <?=date('h:i a - d-M-Y', strtotime($current_review->added_on));?>
                            <br>
                            <b> Target Date: </b>
                            <?php
                            echo  date('h:i a - d-M-Y', strtotime($current_review->added_on. ' + 2 days'));
                            ?>
                            <br>
                            <b> Assigned To: </b>
                            <?php
                            if($current_review->assign_user_to>0){
                                $assigned_user_detail = GetUserDetails($current_review->assign_user_to);?>
                            <a href='<?=site_url('profile/'.$current_review->assign_user_to);?>'> 
                                <?=$assigned_user_detail->m_name;?> | <?php echo $assigned_user_detail->m_profession." | ".$assigned_user_detail->m_current_city." - ".$assigned_user_detail->m_id;?> 
                            </a> 
                            <?php }else{
                                echo "No One";
                            }          
                            ?>
                            <p class="exper-advise">
                                <b>Expert Advise:</b><br ><?=nl2br($current_review->admin_comments);?>
                            </p>
                            
                            <br>
                            <a class="btn btn-default" href="<?=site_url('cvreport/'.$current_review->member_id);?>">View Details</a>
                        </td> 
                        <td align="right">
                            <form action="<?=site_url('cvreview/AssignCvReview')?>" class="assignfrm" method="post">
                                <select name="assign_user_to"  class="form-control">
                                    <option value="0">Select member</option> 
                                    <option <?=$current_review->assign_user_to=='10' ? 'selected=""':'';?> value="10">Liaqat Ali</option> 
                                    <option <?=$current_review->assign_user_to=='3478' ? 'selected=""':'';?> value="3478">Amna Hussain</option>
                                    <option <?=$current_review->assign_user_to=='3346' ? 'selected=""':'';?> value="3346">Umair Sumbal</option>
                                    <option <?=$current_review->assign_user_to=='4561' ? 'selected=""':'';?> value="4561">Waseem Raja</option>
                                    <option <?=$current_review->assign_user_to=='3816' ? 'selected=""':'';?> value="3816">Faraz Ahmad</option>
                                    <option <?=$current_review->assign_user_to=='11889' ? 'selected=""':'';?> value="11889">Rana Shahid</option>
                                    <option <?=$current_review->assign_user_to=='7083' ? 'selected=""':'';?> value="7083">Salman Ali</option>
                                    <option <?=$current_review->assign_user_to=='9570' ? 'selected=""':'';?> value="9570">Hassan Mohiuddin</option>
                                    <option <?=$current_review->assign_user_to=='11900' ? 'selected=""':'';?> value="11900">Nouman</option>
                                    <option <?=$current_review->assign_user_to=='3967' ? 'selected=""':'';?> value="3967">Muhammad Waqar</option>
                                    <option <?=$current_review->assign_user_to=='9371' ? 'selected=""':'';?> value="9371">Imamuddin</option>
                                    <option <?=$current_review->assign_user_to=='6227' ? 'selected=""':'';?> value="6227">Azam Ilyas</option>
                                    <option <?=$current_review->assign_user_to=='11962' ? 'selected=""':'';?> value="11962">Fahad Sayeed</option>
                                    <option <?=$current_review->assign_user_to=='9347' ? 'selected=""':'';?> value="9347">Muhammad Larik</option>
                                    <option <?=$current_review->assign_user_to=='12276' ? 'selected=""':'';?> value="12276">LINCY FLEMY</option>
                                    <option <?=$current_review->assign_user_to=='7464' ? 'selected=""':'';?> value="7464">Mukrramuddin Mohammed</option>
                                </select>
                                <input type="hidden" name="review_id" value="<?=$current_review->review_id?>">
                            </form>
                        </td>
                    </tr>
                    <?php 
                    $cvr++; }?>                    
                </table>            
                <?php }?>
            </div>
        </div>
      </div>
    </div>
  </section>
  <script>
  $(document).ready(function(){ 
      $('.assignfrm').change(function(){
         $(this).submit();
      });
  });
  </script>
  <?php $this->load->view('footerbottom.php'); ?>   
</div>
</body>
</html>