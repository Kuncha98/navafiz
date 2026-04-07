<?php $this->load->view('include/header'); ?>
<style>
    /* div.password {
        position: relative;
    }

    div.password a {
        position: absolute;
        right: -10px;
        top: -28px;
        width: 10%;
    }

    div.password a i {
        font-size: 35px;
    } */


    body.auth-page {
        display: flex;
        align-items: center;
        margin: 0 1.5rem;
        min-height: 100vh;
    }

    .auth-card {
        border-radius: var(--radius-lg);
        overflow: hidden;
        border: none;
    }

    .auth-image {
        background: url("https://images.unsplash.com/photo-1521737604893-d14cc237f11d") center/cover no-repeat;
    }

    .auth-form {
        padding: 5rem 2.5rem;
    }

    @media (max-width: 768px) {
        .auth-image {
            display: none;
        }

        .auth-form {
            padding: 2rem;
        }
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        cursor: pointer;
        color: var(--text-body);
    }
</style>
<!-- <div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 col-xs-12 mx-auto">
                    <div class="loginbox" style="margin-top: 50px;">
                        <div class="form-group text-center">
                            <h2>
                                Welcome NAVAFIZ
                                <br />
                                <small>Don't miss your next opportunity. Sign in to stay updated on your professional
                                    world.</small>
                            </h2>
                            <p></p>
                        </div>
                        <?php $this->load->view('notification/notification-messages'); ?>
                        <div class="form-group" style="text-align:center;"> <span class="errormessage">
                                <?php echo validation_errors(); ?><?php echo $this->session->flashdata('msg'); ?></span>
                        </div>
                        <form action="<?= base_url() ?>user/login" method="post" class="login_page">
                            <div class="form-group">
                                <input placeholder="Email" name="email" class="form-control" type="email"
                                    value="<?= !empty(get_cookie('navafiz_email')) ? get_cookie('navafiz_email') : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <input placeholder="Password" name="password" class="form-control"
                                    value="<?= !empty(get_cookie('navafiz_password')) ? get_cookie('navafiz_password') : '' ?>"
                                    type="password" required>
                                <label for="remember-me">
                                    <input type="checkbox" name="remember_me" value="1" checked="" id="remember-me">
                                    Remember me
                                </label>
                                <br />

                            </div>
                            <div class="loginbox-submit text-center">
                                <input value="Log In" class="btn btn-success col-md-8 col-xs-12" type="submit">
                                <br><br>
                                <a class="btn btn-outline-success forgotpassword"
                                    href="<?= base_url('user/forgotpassword') ?>">Forgot Password?</a>
                                <a class="btn btn-outline-secondary registerbtn"
                                    href="<?= base_url('user/register') ?>">Register on Navafiz</a>
                                <a class="btn btn-outline-primary" href="<?= base_url('user/change_password') ?>">Change
                                    Password</a>
                                <a id="google_sign_in" class="btn btn-outline-primary" href="">Sign in with Google</a>
                                <p>
                                    <a id="google_sign_in" href="<?php echo $loginURL ?>">
                                        <img class="mt-3" src="<?= site_url('assets/frontend/images/google.jpg') ?>"
                                            style="width: 185px;">
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> -->


<div class="container">
    <!-- Page header -->
    <div class="page-heading">
        <h2>Welcome Back</h2>
        <p>Don't miss your next opportunity. Sign in to stay updated on your professional world.</p>
    </div>

    <!-- Login card -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-11">
            <div class="card shadow auth-card">
                <div class="row g-0">

                    <!-- Image column -->
                    <div class="col-md-6 auth-image"></div>

                    <!-- Form column -->
                    <div class="col-md-6">
                        <div class="auth-form">

                            <?php $this->load->view('notification/notification-messages'); ?>
                            <div class="form-group" style="text-align:center;"> <span class="errormessage">
                                    <?php echo validation_errors(); ?>
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </span>
                            </div>

                            <form action="<?= base_url() ?>user/login" method="post">

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        required
                                        value="<?= !empty(get_cookie('navafiz_email')) ? get_cookie('navafiz_email') : '' ?>">
                                    <label for="email">Email address</label>
                                </div>

                                <div class="form-floating mb-3 position-relative">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required
                                        value="<?= !empty(get_cookie('navafiz_password')) ? get_cookie('navafiz_password') : '' ?>">
                                    <label for="password">Password</label>
                                    <span class="toggle-password" onclick="togglePassword()">
                                        <i class="fa fa-eye-slash me-2"></i>
                                    </span>
                                </div>

                                <input type="checkbox" name="remember_me" value="1" checked="" id="remember_me">
                                <label for="remember_me">Remember me</label>


                                <button type="submit" class="btn btn-primary w-100 mt-4">
                                    Login
                                </button>

                            </form>

                            <p class="text-center mt-4 mb-1">
                                Don’t have an account?
                                <a href="<?= base_url('user/register') ?>" class="text-decoration-none text-secondry">
                                    Register
                                </a>
                            </p>

                            <p class="text-center">
                                <a href="<?= base_url('user/forgotpassword') ?>"
                                    class="text-decoration-none text-secondry">
                                    Forgot Password?
                                </a>
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>