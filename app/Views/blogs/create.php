<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">Blogs</a><i class="icon-angle-right"></i></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form role="form" class="add-form" method="post" enctype="multipart/form-data">
                    <h2><i class="fa fa-page"></i> Add New Blog</h2>
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" id="title" class="form-control input-lg" placeholder="Title" value="<?php echo (isset($blog_data['title'])) ? $blog_data['title'] : ''; ?>" required="true">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" required="true" class="form-control input-lg" id="blog-categories" multiple="true">
                                    <?php
                                    foreach ($categories as $id => $category) {
                                        ?>
                                        <option value="<?php echo $category['id']; ?>" <?php echo ($blog_data['category_id'] == $category['id']) ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <textarea class="form-control input-lg" id="description" name="description" placeholder="Content goes here..."><?php echo (isset($blog_data['description'])) ? $blog_data['description'] : ''; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Blog Image</label>
                                <div class="col-xs-12" style="padding: 0">
                                <input id="blog_image" type="file" name="blog_img">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>White Paper</label>
                                <input type="file" name="document" id="document" class="form-control input-lg" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Blog Tags</label>
                                <select class="form-control input-lg" id="tags" name="tags[]" multiple="true">
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-2"><input type="submit" value="Register" class="btn btn-theme btn-block btn-lg"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>