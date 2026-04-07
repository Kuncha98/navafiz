<?php $this->load->view('include/header'); ?>
<!-- <div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 col-xs-12 mx-auto">
                    <form action="<?= base_url() ?>user/register" method="post" class="login_page">
                        <div class="form-group text-center">
                            <h2>
                                Welcome Navafiz
                                <br />
                                <small>Don't miss your next opportunity. Sign Up to stay updated on your professional
                                    world.</small>
                            </h2>
                        </div>
                        <?php $this->load->view('notification/notification-messages'); ?>
                        <div class="form-group">
                            <label>Name: <span class="required">*</span></label>
                            <input type="text" placeholder="Enter Name" name="regname" required
                                value="<?php echo set_value('regname'); ?>" class="form-control" autocomplete="off">
                        </div>
                        <input type="hidden" name="referral_id"
                            value="<?= isset($_GET['referral_id']) ? $_GET['referral_id'] : ''; ?>">

                        <div class="form-group">
                            <label>Email: <span class="required">*</span></label>
                            <input placeholder="" class="form-control" placeholder="Enter Email"
                                style="text-transform: lowercase;" type="email" name="regemail" required
                                value="<?php echo set_value('regemail'); ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Password: <span class="required">*</span></label>
                            <input placeholder="" class="form-control" placeholder="Enter Password" type="password"
                                name="regpwd" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password: <span class="required">*</span></label>
                            <input placeholder="" class="form-control" placeholder="Re-Enter Password" type="password"
                                name="regcpwd" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6Ldgyo4rAAAAAIMRTw_sTC0clKYSFY-fZQ3zemJX"></div>
                        </div>
                        <div class="loginbox-submit text-center">
                            <input value="Register" class="btn btn-success col-md-6 col-xs-12" type="submit">
                            <br>
                            <br>
                            <a class="btn btn-outline-dark" href="<?= base_url() ?>user/login">Click here to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->


<style>
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

<div class="container">

    <!-- Page heading -->
    <div class="page-heading">
        <h2>Create Your Account</h2>
        <p>Register to start managing candidates and hiring workflows</p>
    </div>

    <!-- Register card -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-11">
            <div class="card shadow auth-card">
                <div class="row g-0">

                    <!-- Image column -->
                    <div class="col-md-6 auth-image"></div>

                    <!-- Form column -->
                    <div class="col-md-6">
                        <div class="auth-form">

                            <form action="<?= base_url() ?>user/register" method="post">
                                <?php $this->load->view('notification/notification-messages'); ?>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="regname" name="regname"
                                        placeholder="Full Name" required value="<?php echo set_value('regname'); ?>"
                                        autocomplete="off">
                                    <label for="regname">Full Name</label>
                                </div>

                                <input type="hidden" name="referral_id"
                                    value="<?= isset($_GET['referral_id']) ? $_GET['referral_id'] : ''; ?>">

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="regemail" name="regemail"
                                        placeholder="Email" required value="<?php echo set_value('regemail'); ?>"
                                        autocomplete="off">
                                    <label for="regemail">Email address</label>
                                </div>

                                <div class="form-floating mb-4 position-relative">
                                    <input type="password" class="form-control" id="regpwd" name="regpwd"
                                        placeholder="Password" required autocomplete="off">
                                    <label for="regpwd">Password</label>
                                    <span class="toggle-password" onclick="togglePassword()">
                                        <i class="fa fa-eye-slash me-2"></i>
                                    </span>
                                </div>

                                <div class="form-floating mb-4 position-relative">
                                    <input type="password" class="form-control" id="regcpwd" name="regcpwd"
                                        placeholder="Password" required autocomplete="off">
                                    <label for="regcpwd">Confirm Password</label>
                                    <span class="toggle-password" onclick="togglePassword()">
                                        <i class="fa fa-eye-slash me-2"></i>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6Ldgyo4rAAAAAIMRTw_sTC0clKYSFY-fZQ3zemJX">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    Register
                                </button>

                            </form>

                            <p class="text-center mt-4 mb-0">
                                Already have an account?
                                <a href="<?= base_url() ?>user/login" class="text-decoration-none text-secondry">
                                    Login here
                                </a>
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>