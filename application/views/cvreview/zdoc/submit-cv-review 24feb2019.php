<?php $this->load->view('header.php'); ?>
<style>
    label{
        font-size: 12px !important;
    }
</style>
<body>
<div class="page category-page">
    <?php $this->load->view('pagetop.php'); ?>
    <div class="container">
        <?php $this->load->view('notification/notification-messages');?>
        <form action="<?=base_url('cvreview/AddCvReview');?>" method="post" id="pointsfrm" enctype="multipart/form-data">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 50px auto 0 auto;">
                <div class="row">                           
                  <h3>Submit CV for Review</h3>
                  <?php 
                  $i=1;
                  foreach($cvr_points as $cvrpiont){?>
                    <div style="border-bottom: solid 1px #ccc;padding: 20px;margin-top: 10px;border-radius: 22px;">
                        <div class="question">
                            <strong><?=$i?>. <?=$cvrpiont->question;?> ?</strong>
                        </div>
                        <div class="clearfix" style="margin-top: 20px;"></div>
                        <div class="col-lg-11 col-md-10 col-sm-12 col-xs-12 btn-group-lg btn-group">                        
                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="<?=$cvrpiont->id?>" id="option1" required="" value="<?=$cvrpiont->option_1?>"> <?=$cvrpiont->option_1?>
                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                              <input type="radio" name="<?=$cvrpiont->id?>" id="option2"  required="" value="<?=$cvrpiont->option_2?>"> <?=$cvrpiont->option_2?>
                            </label>

                            <label class="btn col-lg-2 col-md-2 col-sm-6 col-xs-12" style="border: solid 1px #ccc;border-radius: 12px; margin-right: 10px;">
                                <input type="radio" name="<?=$cvrpiont->id?>" id="option3"  required="" value="<?=$cvrpiont->option_3?>"> <?=$cvrpiont->option_3?> 
                            </label>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                <?php 
                $i++;                
                  }?>
                  <div class="col-md-12 col-sm-8 col-xs-12" style="margin-top: 20px;font-size: 15px;font-weight: bold;">
                      <input type="checkbox"  id="confirmcvreview"  required>
                      I have gone through 21 points and have compared my resume with <a style="color: blue;" href="<?=site_url('public-assets/Navafiz-Standard-cv-jan-2017.pdf');?>" target="_blank">Navafiz Resume Format.</a>
                      
                    
                    <div class="col-md-11" style="line-height: 35px;">
                        
                         <!--I assure that my Resume is now improved as per best of my knowledge.-->
                    </div>
                </div>
                <div class="clearfix"></div>
                
                </div>
            </div>            
            <div class="row">
                <button type="submit" id="submittbn" class="btn btn-default col-md-8 col-sm-8 col-xs-10">Submit <i class="fa fa-angle-right"></i></button>
            </div>
        </form>
    </div>  
    <script>
    $(document).ready(function(){
        $('#confirmcvreview').on('change', function(e){
            if(e.target.checked){
              $('#myModal').modal();
            }
        });
        
        $('#myModal').on('hidden.bs.modal', function () {
            $('#confirmcvreview').prop('checked', false);
            //$('#confirmcvreview').attr('checked', true);
        });
        
        $('#yesiconfirm').click(function(){
            $('#submittbn').click();
        });
    });
    </script>
    <?php $this->load->view('footerbottom.php'); ?> 
</div>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Declaration</h4>
      </div>
      <div class="modal-body">
          <h3 style="text-align: center;">
             I have gone through 21 points and have compared my resume with  <a style="color: blue;" href="<?=site_url('public-assets/Navafiz-Standard-cv-jan-2017.pdf');?>" target="_blank"> Navafiz Sample Format.</a> I assure that my Resume is now improved as per best of my knowledge.
          </h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <a href="javascript:void(0);" id="yesiconfirm" class="btn btn-default">Yes</a>
      </div>
    </div>
  </div>
</div>