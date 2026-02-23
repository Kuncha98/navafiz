<?php $this->load->view('include/header.php'); ?>

<?php
$user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');
?>    
<div class="container">
 
  <h3 class="pt-4 wow fadeInDown">SWOT</h3>        

        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('swot/my-strengths');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="  far fa-sticky-note"></i>
                <h6 class="h6">My Strengths</h6>
                <br>
                <br>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href="<?=site_url('swot/my-weeknesses');?>">
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-stop"></i>
                <h6 class="h6">My Weeknesses</h6>
               <p>Area of Development</p>
                
              </div>
            </a>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('swot/opportunities');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-stop-circle"></i>
                <h6 class="h6">Opportunities</h6>
                <br>
                <br>
              </div>
            </a>
          </div>

          <div class="col-md-2 col-4 p-lg-2 p-1">
            <a href='<?=site_url('swot/my-threats');?>'>
              <div class="block text-center wow fadeInLeft">
                <i class="fas fa-stroopwafel"></i>
                <h6 class="h6">My Threats</h6>
                <br>
                <br>
              </div>
            </a>
          </div>

          
        </div>
        <br>
        <div class="row text-center">
            <h3>
                <?php
                    echo ucwords($swot_type);
                ?>
            </h3>
            <p>
                <?php 
                    if(isset($myswot_data[0]->desc)){
                        echo nl2br($myswot_data[0]->desc);
                    }                    
                ?>
            </p>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
        <div class="row">
            <form action="" method="post">
                <div class="col-12">
                    <p>
                        <textarea class="form-control" name="swot_desc" rows="10" required=""></textarea>
                    </p>
                    <p>
                    <b>Guidlines</b>
                </p>
                <?php
                if($swot_type=='my-strengths'){
                ?>
                <p>
                    Strengths are your internal, positive attributes and selling points. You have some control over these. Examples include:
                </p>
                <p>
                    Positive personal traits. <br>
                    Relevant skills, competencies, knowledge and work experience.<br>
                    A solid education.<br>
                    A strong network.<br>
                    Commitment, enthusiasm and passion for your field.<br>
                </p>
                <?php } else if($swot_type=='my-weeknesses'){?>
                <p>
                    Weaknesses are your internal negative attributes. You have some control over these as well. Examples include:
                </p>
                <p>
                    Negative personal characteristics and poor work habits. <br>
                    A lack of work experience or relevant experience.<br>
                    A lack of education.<br>
                    No network or a small one.<br>
                    A lack of career direction or focus.<br>
                    Weak professional or career-management skills.
                </p>
                <?php } else if($swot_type=='opportunities'){?>
                <p>Opportunities are uncontrollable external events that you can potentially leverage. Examples include:</p>
                <p>
                    Favourable industry trends.<br>
                    A booming economy.<br>
                    A specific job opening.<br>
                    An upcoming company project.<br>
                    Emerging demand for a new skill or expertise.<br>
                    Use of new technology.<br>
                    Referral to a high-powered contact.
                </p>
                <?php } else if($swot_type=='my-threats'){?>
                <p>Threats are uncontrollable external factors that may work against you and require you to take protective action. Examples include:</p>
                <p>
                    Industry restructuring and consolidation.<br>
                    Changing market requirements and their impact on your employer.<br>
                    Changing professional standards that you don't meet.<br>
                    Reduced demand for one of your skills.<br>
                    Evolving technologies you're unprepared for.<br>
                    The emergence of a competitor, either to your company or to you personally.<br>
                    A company decision maker who does not like or support you.<br>
                </p>
                <?php } ?>
                    <p>
                        <input type="submit" class="btn btn-success col-lg-12 col-xs-12">
                    </p>
                </div>
                
                <input type="hidden" name="swot_submit" value="1">
            </form>
        </div>
        <div class="row">
            <div class="col-lg-10 col-xs-12">
                

            </div>
        </div>
    </div>      
<div class="clearfix"></div>
<?php $this->load->view('include/footer.php'); ?>
</div>
</body>
</html>