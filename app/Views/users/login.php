<?php 
$this->session = \Config\Services::session();
$this->session->start();
?>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <div><?php echo $this->session->getFlashdata('msg'); ?></div> 
                <form role="form" action="<?php echo base_url('users/auth_user'); ?>" class="register-form" id="login-form" method="post">
                    <h2>Sign in <small>manage your account</small></h2>
                    <hr class="colorgraph">

                    <div class="form-group">
                        <input type="email" name="email_id" id="email_id" class="form-control input-lg" placeholder="Email Address" tabindex="1">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="2">
                    </div>

                    <div class="row clearfix">
                        <div class="col-xs-4 col-sm-3 col-md-3">
                            <span class="button-checkbox">
                                <button type="button" class="btn" data-color="info" tabindex="3">Remember me</button>
                                <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
                            </span>
                        </div>
                    </div>
                    
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6"><input type="submit" value="Sign in" class="btn btn-primary btn-block btn-lg" tabindex="4"></div>
                        <!--<div class="col-xs-12 col-md-6">Don't have an account? <a href="<?php echo base_url('register'); ?>">Register</a></div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>