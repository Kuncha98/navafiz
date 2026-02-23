<div class="header-top-white">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="header-top-left header-top-info">
                        <a href="index.html"> <img src="<?=base_url('assets/frontend/images/logo.png');?>" alt="logo" class="img-responsive"> </a>
                    </div>
                </div>
                <!--<div class="col-md-6 col-sm-5 col-xs-12">
                	<div class="input-group">
                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span id="search_concept">All</span> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#contains">Example 1</a></li>
                              <li><a href="#its_equal">Example 2</a></li>
                              <li><a href="#greather_than">Example 3</a></li>
                              <li><a href="#less_than">Example 4</a></li>
                              <li class="divider"></li>
                              <li><a href="#all">All</a></li>
                            </ul>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">         
                        <input type="text" class="form-control" name="x" placeholder="Search Job">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </div>-->
                <div class="col-md-9 col-sm-4 col-xs-12">
                    <div class="header-top-right header-top-info">
                        <p>                        
                         <?php if($this->session->userdata('user_id') ==''){?>                        
                            <a href="#"><i class="fa fa-power-off"></i>Login</a>
                            <a href="#"><i class="fa fa-user"></i> Register</a>                            
                        <?php }else{?>
                        <?php if($profile->m_avatar !="") {?>
                        <a href="<?=base_url()?>profile">Hi, <?=$this->session->userdata('m_name')?>    
                            <img src="<?=base_url()?>assets/uploads/members/small_thumbs/<?=($profile->m_avatar == "")?"default.png":$profile->m_avatar?>" alt="user-img" class="img-circle" width="36">
                            <?php } else{ ?>
                                <img src="http://graph.facebook.com/<?=$profile->facebook_id?>/picture?type=large" alt="user-img" class="img-circle" width="36">                                
                            <?php } ?>                                                    
                        </a>    
                        <a href="<?=base_url()?>logout">Logout</a>
                        <?php }?>  
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <nav id="menu-1" class="mega-menu fa-change-black full-width">
        <section class="menu-list-items container"> 
            <ul class="menu-logo">
                <li></li>
            </ul>
            <ul class="menu-links">
                <li> <a href="<?=base_url()?>"> Home </a></li>
                <li><a href="<?=base_url()?>jobs"> Jobs <!--<i class="fa fa-angle-down fa-indicator"></i>--></a></li>
                <li><a href="<?=base_url()?>professionals">  Find Professionals <!--i class="fa fa-angle-down fa-indicator"></i>--></a></li>
                <?php if($this->session->userdata('user_id') !=''){?>
                    <li><a href="<?=base_url()?>jobpost"> Post a Job <!--<i class="fa fa-angle-down fa-indicator"></i>--></a></li>
                    <li><a href="<?=base_url()?>happen"> Whats Happenning <!--<i class="fa fa-angle-down fa-indicator"></i>--></a></li>
                    <li><a href="<?=base_url()?>cvreviews"> CV Review</a></li>          
                <?php }?>               
                <li><a href="<?=base_url()?>page/about"> About us <!--<i class="fa fa-angle-down fa-indicator"></i>--></a></li>
                <li><a href="<?=base_url()?>contact"> Contact us <!--<i class="fa fa-angle-down fa-indicator"></i>--></a></li>
            </ul>
        </section>
    </nav>