<!-- Footer Section -->
<footer class="text-light py-5">
    <!-- WhatsApp Floating Button -->
    <div class="whatsapp-widget">

        <button class="whatsapp-float" onclick="openForm()">
            <i class="fab fa-whatsapp"></i>
        </button>

        <div class="chat-popup" id="myForm">

            <div class="chat-container">

                <div class="chat-header">
                    <img src="<?= site_url('nassets'); ?>/img/logo.png?v=1">
                    <span>Navafiz Support</span>
                    <button class="chat-close" onclick="closeForm()">×</button>
                </div>

                <div class="chat-body">

                    <div class="chat-message">
                        <p>
                            Hello 👋 <br>
                            Thank you for choosing Navafiz Support Systems.<br><br>
                            How can we help you today?
                        </p>
                    </div>

                </div>

                <div class="chat-footer">
                    <a href="https://api.whatsapp.com/send/?phone=971554465332" target="_blank" class="whatsapp-start">
                        <i class="fab fa-whatsapp"></i>
                        Start Chat
                    </a>
                </div>

            </div>

        </div>

    </div>
    <div class="container">
        <div class="row g-4">
            <!-- Navafiz Info -->
            <div class="col-sm-6 col-md-6 col-lg-5 col-12">
                <h3 class="text-white mb-4">
                    Navafiz
                </h3>
                <p>Navafiz Management Consultancies, established in 2013, specializes in recruitment services for
                    blue and white-collar roles across multiple industries in the U.A.E., GCC, USA, and Europe. We
                    also offer a wide range of business services, including company formation, PRO & HR support, and
                    procurement consulting.</p>
            </div>

            <!-- Services -->
            <div class="col-sm-6 col-md-6 col-lg-2 col-12">
                <h6 class="footer-title text-white text-uppercase mb-4">Opportunities</h6>
                <ul class="list-unstyled ">
                    <li class="mb-3">
                        <a class="text-decoration-none text-white" href="<?= site_url('services/hire-a-talent') ?>">
                            Hire
                            Talent</a>
                    </li>
                    <li class="mb-3">
                        <a class="text-decoration-none text-white" href="<?= site_url('services/find-a-job') ?>">Find a
                            Job</a>
                    </li>
                    <li class="mb-3">
                        <a class="text-decoration-none text-white"
                            href="<?= site_url('services/become-a-freelancer') ?>">Manpower
                            Suppliers</a>
                    </li>
                    <li class="mb-3">
                        <a class="text-decoration-none text-white"
                            href="<?= site_url('services/become-a-freelancer') ?>">Freelance
                            Work</a>
                    </li>
                    <li class="mb-3">
                        <a class="text-decoration-none text-white"
                            href="<?= site_url('services/become-a-mentor') ?>">Become a
                            Mentor</a>
                    </li>
                </ul>
            </div>

            <!-- Company -->
            <div class="col-sm-6 col-md-6 col-lg-2 col-12">
                <h6 class="footer-title text-white text-uppercase mb-4">Company</h6>
                <ul class="list-unstyled ">
                    <li class="mb-3">
                        <a class="text-decoration-none text-white" href="<?= site_url('about') ?>">About Us</a>
                    </li>
                    <li class="mb-3">
                        <a class="text-decoration-none text-white"
                            href="<?= site_url('testimonials') ?>">Testimonials</a>
                    </li>
                    <li class="mb-3">
                        <a class="text-decoration-none text-white" href="<?= site_url('contact') ?>">Contact Us</a>
                    </li>
                    <li class="mb-3">
                        <a class="text-decoration-none text-white" href="<?= site_url('blog') ?>">Blog</a>
                    </li>
                    <li class="mb-3">
                        <a class="text-decoration-none text-white"
                            href="<?= site_url('front/privacy_policy') ?>">Privacy Policy</a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-sm-6 col-md-6 col-lg-3 col-12">
                <h6 class="footer-title text-white text-uppercase mb-4">Quick Contact</h6>
                <ul class="list-unstyled ">
                    <li class="d-flex align-items-center mb-3">
                        <i class="me-3 fa fa-map-marker"></i>
                        <a class="text-decoration-none text-white" href="https://maps.app.goo.gl/QDfGUe7N5nHQ9bPY6">
                            Business Village B, Deira, Dubai</a>
                    </li>
                    <!-- <li class="d-flex align-items-center mb-3">
                        <i class="me-3 fa fa-phone"></i>
                        <p class="mb-0">+971 4363 5252</p>
                    </li> -->
                    <li class="d-flex align-items-center mb-3">
                        <i class="me-3 fa fa-phone"></i>
                        <a class="text-decoration-none text-white" href="tel:+971554465332">+971 55 446 5332</a>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="me-3 fa fa-envelope"></i>
                        <a class="text-decoration-none text-white" href="mailto:info@navafiz.com">info@navafiz.com</a>
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <!-- Social Media & Copyright -->
        <div class="row pt-4">
            <div class="col-md-6">
                <p class="mb-0">&copy; 2026 NAVAFIZ. All Rights Reserved</p>
            </div>
            <div class="col-md-6 text-md-end">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="https://www.linkedin.com/company/navafiz"
                            class="text-light">LinkedIn</a></li>
                    <li class="list-inline-item"><a href="https://www.facebook.com/groups/JobPostMail"
                            class="text-light">Facebook</a></li>
                    <li class="list-inline-item"><a href="https://www.instagram.com/navafiz_management"
                            class="text-light">Instagram</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>