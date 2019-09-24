<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">Features</a><i class="icon-angle-right"></i></li>
                    <li class="active">Register</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form role="form" class="register-form">
                    <h2>Add New User</h2>
                    <hr class="colorgraph">
                    <?php 
                    $validation =  \Config\Services::validation();
                    ?>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First name" tabindex="1" value="<?php echo (isset($users['first_name'])) ? $users['first_name'] : ''; ?>">
                                <?php 
                                if (!empty($errors) && $validation->hasError('first_name')) {
                                    echo $validation->showError('first_name');
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last name" tabindex="1" value="<?php echo (isset($users['last_name'])) ? $users['last_name'] : ''; ?>">
                                <?php 
                                if (!empty($errors) && $validation->hasError('last_name')) {
                                    echo $validation->showError('last_name');
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="email_id" id="email_id" class="form-control input-lg" placeholder="E-mail ID" tabindex="1" value="<?php echo (isset($users['email_id'])) ? $users['email_id'] : ''; ?>" />
                                <?php 
                                if (!empty($errors) && $validation->hasError('email_id')) {
                                    echo $validation->showError('email_id');
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="Contact Number" tabindex="1" value="<?php echo (isset($users['phone'])) ? $users['phone'] : ''; ?>" />
                                <?php 
                                if (!empty($errors) && $validation->hasError('phone')) {
                                    echo $validation->showError('phone');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="1" value="<?php echo (isset($users['password'])) ? $users['password'] : ''; ?>" />
                                <?php 
                                if (!empty($errors) && $validation->hasError('password')) {
                                    echo $validation->showError('password');
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control input-lg" placeholder="Confirm Password" tabindex="1" value="<?php echo (isset($users['confirm_password'])) ? $users['confirm_password'] : ''; ?>" />
                                <?php 
                                if (!empty($errors) && $validation->hasError('confirm_password')) {
                                    echo $validation->showError('confirm_password');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="colorgraph">
                     <div class="row">
                    <div class="col-xs-12 col-md-2"><input type="submit" value="Register" class="btn btn-theme btn-block btn-lg" tabindex="7"></div>
                     </div>
                </form>
            </div>
        </div>
        
    </div>
</section>