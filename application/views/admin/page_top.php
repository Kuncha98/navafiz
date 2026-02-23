<div class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header"> <a class="navbar-brand" href="#"><img height="60" src="<?=base_url()?>assets/admin/images/logo.png" alt="<?=SITE_NAME?>"></a> </a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons"> <span class="sr-only">Toggle navbar</span> <i class="icon-grid3"></i> </button>
    <button type="button" class="navbar-toggle offcanvas"> <span class="sr-only">Toggle navigation</span> <i class="icon-paragraph-justify2"></i> </button>
  </div>
  <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
    
    <li class="user dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"> <img src="<?=base_url()?>assets/admin/images/sh.jpg" alt=""> <span>Welcome : <?php echo($this->session->userdata('admin_login_id')); ?></span> <i class="caret"></i> </a>
      <ul class="dropdown-menu dropdown-menu-right icons-right">
        <li><a href="<?=base_url()?>admin/logout"><i class="icon-exit"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</div>
