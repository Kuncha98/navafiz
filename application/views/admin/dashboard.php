<?php $this->load->view('admin/header.php'); ?>

<body>
<!-- Navbar -->
<?php $this->load->view('admin/page_top.php'); ?>

<!-- /navbar --> 
<!-- Page container -->
<div class="page-container"> 
  <!-- Sidebar -->
  <?php $this->load->view('admin/left_side.php'); ?>
  <!-- /sidebar --> 
  <!-- Page content -->
  <div class="page-content"> 
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title"> </div>
      <div id="reportrange" class="range">
        <div class="visible-xs header-element-toggle"> <a class="btn btn-primary btn-icon"><i class="icon-calendar"></i></a> </div>
        <!--<div class="date-range"></div>
					<span class="label label-danger">9</span>--> 
      </div>
    </div>
    <!-- /page header --> 
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="">Home</a></li>
        <li class="active">Dashboard</li>
      </ul>
      <div class="visible-xs breadcrumb-toggle"> <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a> </div>
    </div>
    <!-- /breadcrumbs line -->
    <div class="tabbable page-tabs">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#inverse" data-toggle="tab"><i class="icon-table2"></i>Latest Translation</a></li>
        <li><a href="#default" data-toggle="tab"><i class="icon-checkbox-partial"></i>Latest Interpretation</a></li>
      </ul>
      <div class="tab-content"> 
        
        <!-- First tab -->
        <div class="tab-pane active fade in" id="inverse">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-table2"></i> Translation Assignments</h6>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Client</th>
                  <th>Translator</th>
                  <th>Language</th>
                  <th>Document</th>
                  <th>Due Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if($assignments_trans!='empty') {
		
foreach(@$assignments_trans as $translator){ 
?>
                <tr>
                  <td><?=$translator->assign_id?></td>
                  <td><?=$translator->cust_name?></td>
                  <td><?=$translator->trans_name?></td>
                  <td><?=$translator->lang_name?></td>
                  <td><?=$translator->doc_name?></td>
                  <td><?=date("d M, Y",$translator->assign_due_date)?></td>
                  <td><?=$translator->assign_status?></td>
                </tr>
                <?php
}
				  }
				  else{
					  ?>
                       <tr>
                  <td colspan="7" style="background:#fdf7f7; font-weight:bold; text-align:center; color:#F00; ">No data exist!</td>
                  
                </tr>
					
				  <?php
                  }
				  ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /first tab --> 
        
        <!-- Second tab -->
        <div class="tab-pane fade" id="default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-table2"></i> Interpretation Assignments</h6>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Client</th>
                  <th>Translator</th>
                  <th>Language</th>
                  <th>Document</th>
                  <th>Due Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if($assignments_inter!='empty') {
		
foreach(@$assignments_inter as $translator){ 
?>
                <tr>
                  <td><?=$translator->assign_id?></td>
                  <td><?=$translator->cust_name?></td>
                  <td><?=$translator->trans_name?></td>
                  <td><?=$translator->lang_name?></td>
                  <td><?=$translator->doc_name?></td>
                  <td><?=date("d M, Y",$translator->assign_due_date)?></td>
                  <td><?=$translator->assign_status?></td>
                </tr>
                <?php
}
				  }
				  else{
					   ?>
                       <tr>
                  <td colspan="7" style="background:#fdf7f7; font-weight:bold; text-align:center; color:#F00; ">No data exist!</td>
                  
                </tr>
					
				  <?php
				  }
				  ?>
              </tbody>
            </table>
          </div>
       
        </div>
        <!-- /second tab --> 
        
      </div>
    </div>
    <br>
    <br>
    <h6 class="heading-hr"><i class="icon-grid"></i> Members</h6>
    <!-- Info blocks -->
    <ul class="info-blocks">
     
      <li class="bg-primary">
        <div class="top-info"> <a href="#">Clients</a> 
          <!--<small>layout settings</small>--> 
        </div>
        <a href="#"><i class="icon-users"></i></a> <span class="bottom-info bg-danger">
        <?=$total_clients?>
        </span> </li>
      <li class="bg-primary">
        <div class="top-info"> <a href="#">Translators </a> 
          <!--<small>visits, users, orders stats</small>--> 
        </div>
        <a href="#"><i class="icon-bubble-video-chat"></i></a> <span class="bottom-info bg-danger">
        <?=$total_translators?>
        </span> </li>
      
      <!--<li class="bg-primary">
					<div class="top-info">
						<a href="#">Translator</a>
						<small></small>
					</div>
					<a href="#"><i class="icon-mail2"></i></a>
					<span class="bottom-info bg-danger"><?=$total_documents?></span>
				</li>-->
      
      <li class="bg-primary">
        <div class="top-info"> <a href="#">Interpretor</a> <small></small> </div>
        <a href="#"><i class="icon-mail2"></i></a> <span class="bottom-info bg-danger">
        <?=$total_interperator?>
        </span> </li>
    </ul>
    <h6 class="heading-hr"><i class="icon-grid"></i> Translations</h6>
    <ul class="info-blocks">
      <?php /*?><li class="bg-primary">
					<div class="top-info">
						<a href="#">Dashboard</a>
						<!--<small>post management</small>-->
					</div>
					<a href="#"><i class="icon-users"></i></a>
					<span class="bottom-info bg-danger"></span>
				</li><?php */?>
      <li class="bg-primary">
        <div class="top-info"> <a href="#">Total </a> 
          <!--<small>visits, users, orders stats</small>--> 
        </div>
        <a href="#"><i class="icon-bubble-video-chat"></i></a> <span class="bottom-info bg-danger">
        <?=$total_translations?>
        </span> </li>
      <li class="bg-primary">
        <div class="top-info"> <a href="#">Draft</a> 
          <!--<small>messages history</small>--> 
        </div>
        <a href="#"><i class="icon-newspaper"></i></a> <span class="bottom-info bg-danger">
        <?=$total_draft?>
        </span> </li>
      <li class="bg-primary">
        <div class="top-info"> <a href="#">Pending</a> <small></small> </div>
        <a href="#"><i class="icon-mail2"></i></a> <span class="bottom-info bg-danger">
        <?=$total_pending?>
        </span> </li>
      <li class="bg-primary">
        <div class="top-info"> <a href="#">Approved</a> <small></small> </div>
        <a href="#"><i class="icon-mail2"></i></a> <span class="bottom-info bg-danger">
        <?=$total_approved?>
        </span> </li>
      <li class="bg-primary">
        <div class="top-info"> <a href="#">Closed </a> 
          <!--<small>visits, users, orders stats</small>--> 
        </div>
        <a href="#"><i class="icon-bubble-video-chat"></i></a> <span class="bottom-info bg-danger">
        <?=$total_closed?>
        </span> </li>
      <li class="bg-primary">
        <div class="top-info"> <a href="#">Paid </a> 
          <!--<small>visits, users, orders stats</small>--> 
        </div>
        <a href="#"><i class="icon-bubble-video-chat"></i></a> <span class="bottom-info bg-danger">
        <?=$total_paid?>
        </span> </li>
    </ul>
    
    <!-- <h6 class="heading-hr"><i class="icon-grid"></i> Interpretation</h6>--> 
    <!-- /info blocks -->
    <?php /*?><ul class="info-blocks">
				<li class="bg-primary">
					<div class="top-info">
						<a href="#"></a>
						<!--<small>post management</small>-->
					</div>
					<a href="#"><i class="icon-newspaper"></i></a>
					<span class="bottom-info bg-danger">10</span>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<a href="#"></a>
						<!--<small>layout settings</small>-->
					</div>
					<a href="#"><i class="icon-book"></i></a>
					<span class="bottom-info bg-danger">10</span>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<a href="#"></a>
						<!--<small>visits, users, orders stats</small>-->
					</div>
					<a href="#"><i class="icon-bubble-video-chat"></i></a>
					<span class="bottom-info bg-danger">10</span>
				</li>
				
				
				
			</ul><?php */?>
    
    <!-- Alert --> 
    
    <!-- /alert --> 
    
    <!-- Tasks table --> 
    
    <!-- /tasks table --> 
    
    <!-- Recent activity --> 
    
    <!-- /recent activity --> 
    
    <!-- Footer -->
    <?php $this->load->view('admin/footer.php'); ?>
    <!-- /footer --> 
    
  </div>
  <!-- /page content --> 
  
</div>
<!-- /page container -->

</body>
</html>