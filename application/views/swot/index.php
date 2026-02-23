<?php $this->load->view('include/header.php'); ?>
<?php $user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');?>   
<div class="container-mid">
    <div class="card">
        <?php $this->load->view('notification/notification-messages');?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="pt-4 wow fadeInDown">SWOT (Self Awareness)</h3>
                    <p>A SWOT matrix is a framework for analyzing your strengths and weaknesses as well as the opportunities and threats that you face. This helps you focus on your strengths, minimize your weaknesses, and take the greatest possible advantage of opportunities available to you.</p>
                </div>
            </div>
            <form action="<?=site_url('swot/save');?>" method="post">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <label>
                            <b>My Strengths</b> <br />                
                        </label>
                        <textarea class="form-control" name="my_strengths" rows="10" required=""><?=$my_strengths;?></textarea>            
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <label><b>My Weeknesses</b></label>
                        <textarea class="form-control" name="my_weeknesses" rows="10" required=""><?=$my_weeknesses;?></textarea>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <label><b>Opportunities</b></label>
                        <textarea class="form-control" name="opportunities" rows="10" required=""><?=$opportunities;?></textarea>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <label><b>My Threats</b></label>
                        <textarea class="form-control" name="my_threats" rows="10" required=""><?=$my_threats;?></textarea>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-4 mx-auto">
                        <input type="submit" class="btn btn-success col-12">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php $this->load->view('include/footer.php'); ?>
</div>
</body>
</html>