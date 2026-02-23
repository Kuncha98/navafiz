<?php $this->load->view('header.php'); ?>
<body>
<div class="page category-page"> 
  
  
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
    <section class="dashboard-body">
      <div class="container">
        <div class="row">
            
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="heading-inner first-heading">
                <p class="title">Summary Of Career (Roles & Responsibilities)</p>
              </div>
                
              <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                <p id="regmessage" class="text-success" style="display:none; font-size:16px; font-weight:bold;"> </p>
                <div class="profile-edit row">    
                <form action="<?=base_url('AddMemberSummaryPoints')?>" id="memberpage" method="post">
                    <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <label>Career Summary Points</label>
                        <?php for($i=1;$i<11;$i++){?>
                        <p>
                            Point <?=$i;?> <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_<?=$i;?>" value="<?=  isset($summary_points['point_'.$i]) ? $summary_points['point_'.$i]:'';?>" required="">
                        </p>
                        <?php }?>
                      </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-default col-md-12 col-sm-12 col-xs-12"> Save <i class="fa fa-angle-right"></i></button>
                    </div>
                    <input type="hidden" name="point_id" value="<?=isset($summary_points->id) && $summary_points->id>0 ? $summary_points->id:0;?>">
                  </form>
                </div>
              </div>
            </div>
          </div>        
        </div>
      </div>
    </section>
    <?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html>