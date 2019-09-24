<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">Users</a><i class="icon-angle-right"></i></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h3>Users</h3>
            </div>
            <div class="col-lg-3">
                <a href='<?php echo base_url('users/create'); ?>' class='btn btn-theme pull-right add-btn'><i class='fa fa-plus'></i> Add New User</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table border='1' cellspacing='10' id='user-table'>
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email ID</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myEditModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Update User</h4>
                    </div>
                    <form role="form" class="user-form">
                        <div class="modal-body">
                            <?php
                            $validation = \Config\Services::validation();
                            ?>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
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
                                        <label>Last Name</label>
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
                                        <label>Email ID</label>
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
                                        <label>Contact Number</label>
                                        <input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="Contact Number" tabindex="1" value="<?php echo (isset($users['phone'])) ? $users['phone'] : ''; ?>" />
                                        <?php
                                        if (!empty($errors) && $validation->hasError('phone')) {
                                            echo $validation->showError('phone');
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="save_btn" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                            <button type="button" class="btn btn-theme" data-dismiss="modal"><i class="fa fa-sign-out"></i> Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</section>