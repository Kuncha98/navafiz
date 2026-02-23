

        <nav id="sidebar">
            <div class="sidebar-header text-center">
                <h3><?=SITE_NAME?> Administration</h3>
            </div>
            <hr>
            <ul class="list-unstyled components">
                
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('admin/dashboard/');?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="active">
                    <a href="#members_menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Manage Jobs</span>
                    </a>
                    <ul class="collapse list-unstyled" id="members_menu">
                        <li>
                           <a class="nav-link ml-3" href="<?=site_url('admin/jobs');?>">
                                <span>All Jobs</span>
                           </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/jobs/jobtitles');?>">
                                <span>Job Titles</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/jobs/quick_jobs');?>">
                                <span>Quick Jobs</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/jobs/jobseekerstips');?>">
                                <span>Job Seekers Tips</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#jobs_menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Manage Members</span>
                    </a>
                    <ul class="collapse list-unstyled" id="jobs_menu">
                        <li>
                           <a class="nav-link ml-3" href="<?=site_url('admin/member2');?>">
                              <span>All Members</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/profile_points/');?>">
                                <span>Member Points</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/members/members_summary');?>">
                                <span>Members Summary Career</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/members/member_skills');?>">
                                <span>Members Skills</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/cvreview/');?>">
                                <span>Manage CV Review</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/member_certification');?>">
                                <span>Members Certifications</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/member_education');?>">
                                <span>Members Education</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/members/list_job_portal');?>">
                                <span>Members Job Portal</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/members/success_stories');?>">
                                <span>Members Success Stories</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('admin/user_list');?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Manage Users List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('admin/members_by_list');?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Manage Users By List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('admin/recruitment_projects');?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Recruitment Projects Contacts</span>
                    </a>
                </li>
                
                <li>
                    <a href="#questions_menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Manage Questions</span>
                    </a>
                    <ul class="collapse list-unstyled" id="questions_menu">
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/profile_questions');?>">
                                <span>Profile Question</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/assigned_questions/');?>">
                                <span>Question's Categories</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <!--href="<?=site_url('admin/event');?>"-->
                    <a href="#events" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Events</span>
                    </a>
                    <ul class="collapse list-unstyled" id="events">
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/event');?>">
                                <span>Manage Events</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link ml-3" href="<?=site_url('admin/event/selectEvent');?>">
                                <span>Invite Members</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
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
            </ul>

        </nav>

     


<script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>