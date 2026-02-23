<?php $this->load->view('include/header.php'); ?>

<style type="text/css">
  /* ---- ACCORDIAN CSS ---- */

.panel-title a {
  display: block;
  position: relative;
  padding: 10px 60px 10px 15px;
  font-weight: 400;
  font-size: 18px;
  line-height: 1.6;
  color: #6d7194;
}
.drop-accordion .panel-default {
  overflow: hidden;
  border: 0;
  border-radius: 0;
  -webkit-box-shadow: none;
  box-shadow: none;
}
.drop-accordion .panel-heading {
  overflow: hidden;
  padding: 0;
  border: 1px solid #f1f1f1;
  background: fcfcfc;
  border-radius: 0;
}
.leaf-ui .drop-accordion .panel-heading, .circlus-ui .drop-accordion .panel-heading {
  border-radius: 4px;
}
.panel-title a {
  display: block;
  position: relative;
  padding: 20px 60px 20px 20px;
  font-weight: 400;
  font-size: 20px;
  line-height: 1.6;
  color: #191919;
}
.panel-title .expand-icon-wrap {
  position: absolute;
  right: 0;
  top: 0;
  bottom: 0;
  border-left: 1px solid #d9d7d7;
  font-size: 24px;
  line-height: 46px;
  color: #29aafe;
}
.expand-icon-wrap:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
}
.panel-title .expand-icon {
  padding: 0 18px;
  vertical-align: middle;
}
.panel-title .expand-icon:before {
  content: "\f055";
}
.drop-accordion .panel-body {
  line-height: 25px;
  padding: 20px;
  position: relative;
  border: 1px solid #d9d7d7;
}
.circlus-ui .drop-accordion .panel-body, .leaf-ui .drop-accordion .panel-body {
  border-radius: 4px;
}
.panel-body-icon {
  width: 75px;
  float: left;
  padding: 10px;
}
.panel-body-icon i {
  font-size: 45px;
  color: #29aafe;
}
.drop-accordion .tab-collapsed {
  border: transparent;
  background: #29aafe;
  -webkit-transition: .5s;
  -o-transition: .5s;
  transition: .5s;
}
.tab-collapsed a {
  color: #fff;
}
.about-us .panel-group {
  margin-bottom:0;  
}
.tab-collapsed .expand-icon-wrap {
  border-color: #fff;
  color: #fff;
}
.tab-collapsed .expand-icon:before {
  content: "\f056";
}
.panel-body ul {
  list-style: disc !important;
  padding: 0 0 0 30px;
  text-decoration: none;
  margin-bottom: 0;
}
.panel-body ul li {
  padding: 5px;
}
</style>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <div class="text-center">
              Frequently Asked Questions
            </div>
          </h1>
        </div>
      </div>
    </div>
  </section>
  <section class="faqs">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel-group drop-accordion" id="accordion" role="tablist" aria-multiselectable="true">
              <?php 
			$i=1;
foreach(@$faqs as $faq){ 
?>
              <div class="panel panel-default">
                <div class="panel-heading <?=($i==1)? "tab-collapsed" : ""?>" role="tab" id="heading<?=$i?>">
                  <h4 class="panel-title"> <a class="collapse-controle<?=($i==1)? "" : "collapsed"?>" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" aria-expanded="<?=($i==1)? "true" : "false"?>" aria-controls="collapse<?=$i?>">
                    <?=$faq->question?>
                    <span class="expand-icon-wrap"><i style="margin-top: 0; font-size: 20px;" class="fa expand-icon"></i></span> </a> </h4>
                </div>
                <div id="collapse<?=$i?>" class="panel-collapse collapse<?=($i==1)? "in" : ""?>" role="tabpanel" aria-labelledby="heading<?=$i?>" aria-expanded="<?=($i==1)? "true" : "false"?>">
                  <div class="panel-body">
                    <p>
                      <?=$faq->answer?>
                    </p>
                  </div>
                </div>
              </div>
              <?php
								 $i++;
}
				?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view('include/footer.php'); ?>
   <script type="text/javascript" src="<?=base_url()?>assets/frontend/js/common.js"></script>