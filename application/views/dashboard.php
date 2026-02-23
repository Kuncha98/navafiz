<?php $this->load->view('admin/sb-header'); ?>

<body>
    <div class="wrapper">
      <?php $this->load->view('pagetop.php'); ?>
        <div class="content container">
            <div class="page-wrapper">
                <header class="page-heading clearfix">
                  <div class="box box-dark">
                  <h2>Thanks for Registering!</h2>
                                        You've successfully created an account on online courses. We've sent an account activation message to your email adddress. To activate your account and start enrolling in courses, click the link in the message. 
                                    </div>
                    <!--//breadcrumbs-->
                </header> 
                <div class="page-content">
                    <div class="row page-row">
                        <article class="welcome col-md-12 col-sm-7">         
                        <br><br><br>                
                            <h3 class="title" style="font-style:italic; text-align:center;"><strong>Looks like you haven't enrolled in any courses yet.</strong></h3>
                          
                           <br><br>
                            
                            <p style="text-align:center">
                            <a href="<?=base_url()?>courses" class="btn btn-default btn-lg" style="width:250px;" >
            Find courses now!
          </a></p>
                        </article><!--//page-content-->
                        <?php /*?><aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">                    
                            <section class="widget has-divider">
                                <h3 class="title">Job Vacancies</h3>
                                <ul class="job-list custom-list-style">
                                    <li><i class="fa fa-caret-right"></i><a href="#">Learning Support Assistant</a></li>
                                    <li><i class="fa fa-caret-right"></i><a href="#">Lecturer - Business Studies</a></li>
                                    <li><i class="fa fa-caret-right"></i><a href="#">Lecturer - Computer Science</a></li>
                                    <li><i class="fa fa-caret-right"></i><a href="#">Administrative Assistant</a></li>
                                </ul>
                                <a class="btn btn-theme" href="jobs.html">Find out more</a>
                            </section><!--//widget--> 
                            <section class="widget has-divider">
                                <h3 class="title">Video tour</h3>
                                <iframe class="iframe" src="http://www.youtube.com/embed/Ks-_Mh1QhMc?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen=""></iframe>
                            </section><!--//widget-->
                            <section class="widget">
                                <h3 class="title">Contact</h3>
                                <p>Suspendisse mollis neque augue, vitae malesuada mi dictum quis. Ut mollis purus vel orci aliquam sagittis. Aliquam erat volutpat. </p>
                                <p class="tel"><i class="fa fa-phone"></i>Tel: 0800 123 4567</p>
                                <p class="email"><i class="fa fa-envelope"></i>Email: <a href="#">enquires@website.com</a></p>
                            </section><!--//widget--> 
                        </aside><?php */?>
                    </div><!--//page-row-->
                </div><!--//page-content-->
            </div><!--//page--> 
        </div><!--//content-->
    </div><!--//wrapper-->
      
    <?php $this->load->view('footer.php'); ?><!--//footer-->
    
  
  
    
</body>

</html> 

