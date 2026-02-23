<nav class="side-navbar">
    <!-- Sidebar Header-->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                
                <div class="sidebar-brand-text mx-3"><?=SITE_NAME?> Administration 
              </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
           
            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/dashboard/');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Dashboard</span>
                </a>

            </li>

            <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link z" data-toggle="collapse" data-target="#jobs" aria-expanded="false" href="javascript:void(0)">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage Jobs</span>
                </a>
                 <div id="jobs" class="collapse">
                    <a class="nav-link ml-3" href="<?=site_url('admin/jobs');?>">
                        <span>All Jobs</span>
                    </a>
                    <a class="nav-link ml-3" href="<?=site_url('admin/jobs/jobtitles');?>">
                         <span>Job Titles</span>
                    </a>
                    <a class="nav-link ml-3" href="<?=site_url('admin/jobs/jobseekerstips');?>">
                    <span>Job Seekers Tips</span>
                    </a>
                     
                 </div>
                

            </li>
            

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" data-target="#members" aria-expanded="false" href="javascript:void(0)">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage Members</span>
                </a>
                <div id="members" class="collapse">
                  
                        <a class="nav-link ml-3" href="<?=site_url('admin/members');?>">
                            
                            <span>All Members</span>
                        </a>
                    
                        <a class="nav-link ml-3" href="<?=site_url('admin/profile_points/');?>">
                            <span>Member Points</span>
                        </a>
                        
                        <a class="nav-link ml-3" href="<?=site_url('admin/members/members_summary');?>">
                            <span>Members Summary Career</span>
                        </a>
              
                        <a class="nav-link ml-3" href="<?=site_url('admin/members/member_skills');?>">
                           <span>Members Skills</span>
                        </a>
                    
                        <a class="nav-link ml-3" href="<?=site_url('admin/cvreview/');?>">
                            <span>Manage CV Review</span>
                        </a>


                        <a class="nav-link ml-3" href="<?=site_url('admin/member_certification');?>">
                            <span>Members Certifications</span>
                        </a>

                         <a class="nav-link ml-3" href="<?=site_url('admin/member_education');?>">
                            <span>Members Education</span>
                        </a>

                        <a class="nav-link ml-3" href="<?=site_url('admin/members/list_job_portal');?>">
                            <span>Members Job Portal</span>
                        </a>
                        
                       <a class="nav-link ml-3" href="<?=site_url('admin/members/success_stories');?>">
                            <span>Members Success Stories</span>
                        </a>
                  
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" data-target="#questions" aria-expanded="false" href="javascript:void(0)">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage Questions</span>
                </a>
                
                <div class="collapse" id="questions">
                    <a class="nav-link ml-3" href="<?=site_url('admin/profile_questions');?>">
                        <span>Profile Question</span>
                    </a>
                    <a class="nav-link ml-3" href="<?=site_url('admin/assigned_questions/');?>">
                        <span>Question's Categories</span>
                    </a>
                </div>
                
            </li>
             
            
<!--            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/member_education');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Members Profile Pictures</span>
                </a>
            </li>-->
            
           <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/companies');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage Companies</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/poll/result');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Poll</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/main/happens');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Happens</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/jobs/categories');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage Categories</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/imagelibrary');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage Gallery</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/videos');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage Videos</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/faqs');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage FAQs</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/event');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage Events</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/classified');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage Classified</span>
                </a>
            </li>
            
            
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/main/pages');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage Pages</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('admin/settings');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage Settings</span>
                </a>
            </li>

            

            
  


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
</nav>