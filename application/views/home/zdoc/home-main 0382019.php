<?php $this->load->view('include/header');?> 
<?php $user_id = $this->session->userdata('user_id') =='' ? 0: $this->session->userdata('user_id');?> 
<div class="homepage" id="homepage">
    <div class="container-fluid px-sm-5">
        <!-- Recruiters & Job Seekers____________________________________ -->
        <h3 class="pt-4 wow fadeInDown">Recruiters & Job Seekers</h3>
        <div class="row px-2">
            <div class="col-md-2 col-4 p-lg-2 p-sm-0 p-1">
              <div class="block text-center wow fadeInLeft">
                  <?php if($user_id>0){?>
                  <a href="<?=site_url('logout');?>">
                      <i class="fas fa-user-tie"></i>
                      <h6 class="h6 wow fadeInDown">
                          <?=$this->session->userdata('name');?> <br>
                          Logout
                      </h6>
                  </a>
                  <?php }else{?>
                  <a href="<?=site_url('login');?>">
                      <i class="fas fa-sign-in-alt"></i>
                      <h6 class="h6 wow fadeInDown">Login</h6>
                  </a>
                  <?php }?>
              </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
              <div class="block text-center wow fadeInLeft">
                <a href="<?=site_url('page/about');?>">
                  <i class="fas fa-file-alt"></i>
                  <h6 class="h6 wow fadeInDown">About Us</h6>
                </a>            
              </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
              <div class="block text-center wow fadeInRightBig">
                  <a href="<?=site_url('shoutbox');?>">
                    <i class="fas fa-comments"></i>
                    <h6 class="h6 wow fadeInDown">Discussion Board</h6>
                  </a>            
              </div>
            </div>
        </div>
        <!-- Job Seekers_________________________________________________ -->
        <h3 class="pt-4 wow fadeInDown">Job Seekers</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
              <div class="block text-center wow fadeInLeft">
                <a href="<?=site_url('job-seeker-support-system');?>">
                    <i class="fas fa-info-circle"></i>
                    <h6 class="h6 wow fadeInDown">Support System</h6>
                </a>
              </div>
          </div>        
        </div>
        <!-- Recruiters _________________________________________________ -->
        <h3 class="pt-4 wow fadeInDown">Recruiters</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <div class="block text-center">
              <a href="<?=site_url('recruiters-support-system');?>">
                  <i class="fas fa-info-circle"></i>
                  <h6 class="h6 wow fadeInDown">Recruiters Support</h6>
              </a>            
            </div>
          </div>
        </div>
        <!-- Trainer / Coach / Mentor ____________________________________ -->
        <h3 class="pt-4 wow fadeInDown">Trainer / Coach / Mentor</h3>
        <div class="row px-2">
          <div class="col-md-2 col-4 p-lg-2 p-sm-0 p-1">
            <div class="block text-center">
              <i class="fas fa-user-tie"></i>
              <h6 class="h6 wow fadeInDown">Navafiz Mentor</h6>
            </div>
          </div>
          <div class="col-md-2 col-4 p-lg-2 p-1">
            <div class="block text-center">
              <i class="fas fa-user"></i>
              <h6 class="h6 wow fadeInDown">Professional Trainers</h6>
            </div>
          </div>
        </div>
        <!-- Community _____________________________________________________ -->
        <h3 class="pt-4 wow fadeInDown">Community</h3>
        <div class="row px-2">
            <div class="col-md-2 col-4 p-lg-2 p-sm-0 p-1">
              <div class="block text-center">
                <a href="<?=site_url('event-in-uae');?>">
                    <i class="fas fa-calendar-alt"></i>
                    <h6 class="h6 wow fadeInDown">Events</h6>
                </a>            
              </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
              <div class="block text-center">
                <a href="<?=site_url('videos');?>">
                    <i class="fab fa-youtube"></i>
                    <h6 class="h6 wow fadeInDown">Videos</h6>
                </a>            
              </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
              <div class="block text-center">
                  <a href="<?=site_url('uae-labour-laws');?>">
                    <i class="fas fa-gavel"></i>
                    <h6 class="h6 wow fadeInDown">Labour Laws</h6>
                  </a>
              </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
              <div class="block text-center">
                <a href="<?=site_url('whats-happening');?>">
                    <i class="fas fa-question-circle"></i>
                    <h6 class="h6 wow fadeInDown">Happenings</h6>
                </a>
              </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
              <div class="block text-center">
                <a href="<?=site_url('faqs');?>">
                    <i class="fas fa-info-circle"></i>
                    <h6 class="h6">FAQ's</h6>
                </a>
              </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
                <div class="block text-center">
                    <a href="<?=site_url('basic-arabic-words');?>">
                      <i class="fas fa-font"></i>
                      <h6 class="h6 wow fadeInDown">Arabic Words</h6>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
                <div class="block text-center">
                    <a href="<?=site_url('important-contact-numbers-in-uae');?>">
                        <i class="fas fa-headset"></i>
                        <h6 class="h6 wow fadeInDown">Contacts</h6>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
                <div class="block text-center">
                    <a href="<?=site_url('jobseekertips');?>">
                        <i class="fas fa-briefcase"></i>
                        <h6 class="h6 wow fadeInDown">Job Hunt Tip</h6>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
                <div class="block text-center">
                    <a href="<?=site_url('page/interview-tips');?>">
                        <i class="far fa-comments"></i>
                        <h6 class="h6 wow fadeInDown">Interview Tips</h6>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
                <div class="block text-center">
                    <a href="<?=site_url('');?>">
                        <i class="fas fa-hand-holding-heart"></i>
                        <h6 class="h6 wow fadeInDown">Blood Donors</h6>
                    </a>
                </div>
            </div>
        </div>
        <!-- Downloads _____________________________________________________ -->
        <h3 class="pt-4 wow fadeInDown">Downloads</h3>
        <div class="row px-2">
            <div class="col-md-2 col-4 p-lg-2 p-1">
                <div class="block text-center">
                    <a href="<?=site_url('public-assets/Navafiz-Standard-cv-jan-2017.pdf');?>">
                        <i class="fas fa-file-alt"></i>
                        <h6 class="h6 wow fadeInDown">Sample CV</h6>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
                <div class="block text-center">
                    <a href="<?=site_url('admin');?>">
                        <i class="fas fa-users-cog"></i>
                        <h6 class="h6 wow fadeInDown">Admin</h6>
                    </a>
                </div>
            </div>
        </div>
        <!-- Useful Links___________________________________________________ -->
        <h3 class="pt-4 wow fadeInDown">Useful Links</h3>
        <div class="row px-2">
            <div class="col-md-2 col-4 p-lg-2 p-1">
                <div class="block text-center">
                    <a href="https://gulfnews.com/" target="_blank" rel="nofollow">
                        <i class="fas fa-newspaper"></i>
                        <h6 class="h6 wow fadeInDown">Gulf News</h6>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
                <div class="block text-center">
                    <a href="https://www.khaleejtimes.com/" target="_blank" rel="nofollow">
                        <i class="fas fa-newspaper"></i>
                        <h6 class="h6 wow fadeInDown">Khaleej Times</h6>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
                <div class="block text-center">
                    <a href="<?=site_url('testimonials');?>">
                        <i class="fas fa-comments"></i>
                        <h6 class="h6 wow fadeInDown">Testimonials</h6>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-4 p-lg-2 p-1">
                <div class="block text-center">
                    <a href="<?=site_url('achievements');?>">
                        <i class="fas fa-trophy"></i>
                        <h6 class="h6 wow fadeInDown">Achievements</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="wrapper">
        <div class="counter col_half wow fadeInLeftBig">
            <i class="fas fa-user-tie"></i>
            <h2 class="timer count-title count-number" data-to="<?=$totalmembers;?>" data-speed="40000"></h2>
            <h3 class="wow fadeInDown">Members</h3>
        </div>

        <div class="counter col_half wow fadeInRightBig">
            <i class="fas fa-briefcase"></i>
            <h2 class="timer count-title count-number" data-to="<?=$totaljobs?>" data-speed="40000"></h2>
            <h3 class="wow fadeInDown">Job</h3>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer');?> 
<script>
(function ($) {
    $.fn.countTo = function (options) {
    options = options || {};

    return $(this).each(function () {
            // set options for current element
            var settings = $.extend({}, $.fn.countTo.defaults, {
                    from:            $(this).data('from'),
                    to:              $(this).data('to'),
                    speed:           $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals:        $(this).data('decimals')
            }, options);

            // how many times to update the value, and how much to increment the value on each update
            var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

            // references & variables that will change with each update
            var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

            $self.data('countTo', data);

            // if an existing interval can be found, clear it first
            if (data.interval) {
                    clearInterval(data.interval);
            }
            data.interval = setInterval(updateTimer, settings.refreshInterval);

            // initialize the element with the starting value
            render(value);

            function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof(settings.onUpdate) == 'function') {
                            settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                            // remove the interval
                            $self.removeData('countTo');
                            clearInterval(data.interval);
                            value = settings.to;

                            if (typeof(settings.onComplete) == 'function') {
                                    settings.onComplete.call(self, value);
                            }
                    }
            }

            function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
            }
        });
    };

    $.fn.countTo.defaults = {
        from: 0,               // the number the element should start at
        to: 0,                 // the number the element should end at
        speed: 1000,           // how long it should take to count between the target numbers
        refreshInterval: 100,  // how often the element should be updated
        decimals: 0,           // the number of decimal places to show
        formatter: formatter,  // handler for formatting the value before rendering
        onUpdate: null,        // callback method for every time the element is updated
        onComplete: null       // callback method for when the element finishes updating
    };

    function formatter(value, settings) {
        return value.toFixed(settings.decimals);
    }
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
    formatter: function (value, options) {
      return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
    }
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
    var $this = $(this);
    options = $.extend({}, options || {}, $this.data('countToOptions') || {});
    $this.countTo(options);
  }
});
</script>