<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#"><i class="fa fa-list"></i> Categories</a><i class="icon-angle-right"></i></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h3><i class="fa fa-list"></i> Categories</h3>
            </div>
            <div class="col-lg-3">
                <a href='#' class='btn btn-theme pull-right add-btn'><i class='fa fa-plus'></i> Add New Category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table border='1' cellspacing='10' id='data-table'>
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Title</th>
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
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-list"></i> Update Category</h4>
                    </div>
                    <form role="form" class="add-form">
                        <div class="modal-body">
                            <?php
                            $validation = \Config\Services::validation();
                            ?>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="hidden" name="id" id="id" value="<?php echo (isset($form_data['name'])) ? $form_data['name'] : ''; ?>">
                                        <input type="text" name="name" id="name" class="form-control input-lg slugify" placeholder="Category name" tabindex="1" value="<?php echo (isset($form_data['name'])) ? $form_data['name'] : ''; ?>" required />
                                        <?php
                                        if (!empty($errors) && $validation->hasError('name')) {
                                            echo $validation->showError('name');
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label>Category Slug</label>
                                        <input type="text" readonly name="slug" id="slug" class="form-control input-lg" placeholder="Category Slug" tabindex="2" value="<?php echo (isset($form_data['slug'])) ? $form_data['slug'] : ''; ?>">
                                        <?php
                                        if (!empty($errors) && $validation->hasError('slug')) {
                                            echo $validation->showError('slug');
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