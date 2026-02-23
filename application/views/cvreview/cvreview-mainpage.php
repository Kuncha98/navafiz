<?php $this->load->view('include/header.php'); ?>

<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>  
<div class="container-mid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="pt-4 wow fadeInDown">CV Review</h3>
        <?php $this->load->view('notification/notification-messages');?>
            <p style="color: #FF0000;">
               <b>Note 1:</b> Please complete your profile before cv review
            </p>
            <p style="color: #000000;">
                
                <b>Note-2</b>  : Navafiz is a Volunteer’s Platform, Due to large number of CV Reviews in Queue, your CV Review Report may take some extra time, <a href="<?=site_url('mycvreport');?>">check your CV Report</a> under Report Section after 4 days, remind in <a href="<?=site_url('shoutbox');?>">discussion Board</a> if Review Report is not received till 6 Days.
            </p>
            <p style="color: #000000;">
               <b>Note-3</b>  : As of now Navafiz CV Review System (Level-1) is focused on the overall view of Resume, sequence of information and some basic check points. 
                For (Level-2) Technical Review, you are required to consult with your relevant technical field expert.
            </p>
            </div>
        </div>

        <div class="row px-2">
        <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('public-assets/Navafiz_Standard_CV_Updated_Nov_2019.pdf');?>" target="_blank" class="sample_resume">
              <div class="block text-center wow fadeInLeft">
                <i class="  far fa-file-word"></i>
                <h6 class="h6">Sample Resume</h6>
                <p>Download Sample CV</p>                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('SubmitCvReview/');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-upload"></i>
                <h6 class="h6">Upload Cv</h6>
                <br>
                <p>Upload Cv for Review</p>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('cvreview/CvreviewReport/'.$user_id);?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-user-tie"></i>
                <h6 class="h6">My Cv Report</h6>
                <br>
               <p>My Cv Review Report</p>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('cvreviews-list');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="  fas fa-user-graduate"></i>
                <h6 class="h6">Expert Advice</h6>
                <br>
                <p>Only for admins</p>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="#" target="_blank" onclick="alert('Comming Soon'); return false;">
              <div class="block text-center wow fadeInLeft">
                <i class="far fa-file"></i>
                <h6 class="h6">Self Report</h6>
                <br>
               <p>Coming Soon</p>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('shoutbox');?>" target="_blank">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-users"></i>
                <h6 class="h6">Discussion Board</h6>
                <p>Navafiz Discussion Board</p>
                
              </div>
            </a>
          </div>
          
        </div>
</div>   
      
<div class="clearfix"></div>
<?php $this->load->view('include/footer.php'); ?>
</div>
</body>
</html>

<script type="text/javascript">
  
  $(document).ready(function(){
      $('.sample_resume').click(function(){
        var base_url = '<?php echo base_url();?>';
    
        $.ajax({
            type: "POST",
            url: base_url + 'cvreview/updateSampleResume/' , 
        });
      });
  });
</script>