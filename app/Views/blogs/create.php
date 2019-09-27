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
                <form role="form" class="add-form" action="<?php echo isset($blog_data['id']) ? base_url('blogs/update') : base_url('blogs/create'); ?>" method="post" enctype="multipart/form-data">
                    <?php
                    if(isset($blog_data['id']) && $blog_data['id']) {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $blog_data['id']; ?>" />
                    <?php 
                    }
                    ?>
                    <h2><i class="fa fa-page"></i> <?php echo isset($blog_data['id']) ? 'Update New Blog' : 'Add New Blog'; ?></h2>
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
                                <select name="category_id[]" required="true" class="form-control input-lg" id="blog-categories" multiple="true">
                                    <?php
                                    foreach ($categories as $id => $category) {
                                        ?>
                                        <option value="<?php echo $category['id']; ?>" <?php echo (isset($blog_ids) && (in_array($category['id'],$blog_ids))) ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
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
                                    <?php 
                                    if(isset($blog_data['image'])) { 
                                        $file1 = new \CodeIgniter\Files\File('../public/'.$blog_data['image']);
                                    ?>
                                    <div class="jFiler-items jFiler-row">
                                        <ul class="jFiler-items-list jFiler-items-default">
                                            <li class="jFiler-item" data-jfiler-index="0" style="">
                                                <div class="jFiler-item-container">
                                                    <div class="jFiler-item-inner">
                                                        <div class="jFiler-item-icon pull-left">
                                                            <img src="<?php echo base_url($blog_data['image']); ?>" alt="your image" style="height: 50px;width: 50px; margin-bottom:0">
                                                        </div>
                                                        <div class="jFiler-item-info pull-left">
                                                            <div class="jFiler-item-title" title="<?php echo $file1->getBasename(); ?>"><?php echo ($file1->getBasename() == substr($file1->getBasename(),0,40)) ? $file1->getBasename() : substr($file1->getBasename(),0,40).'...'; ?></div>
                                                            <div class="jFiler-item-others">
                                                                <span>size: <?php echo $file1->getSize('kb'); ?> KB</span>
                                                                <span>type: <?php echo $file1->getMimeType(); ?></span>
                                                                <span class="jFiler-item-status"></span>
                                                            </div>
                                                            <div class="jFiler-item-assets">
                                                                <ul class="list-inline">
                                                                    <li><a class="icon-jfi-trash jFiler-item-trash-action remove-file"></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>White Paper</label>
                                <input type="file" name="document" id="document" class="form-control input-lg" />
                                <?php
                                if(isset($blog_data['document'])) { 
                                    $file2 = new \CodeIgniter\Files\File('../public/'.$blog_data['document']);
                                ?>
                                <div class="jFiler-items jFiler-row">
                                    <ul class="jFiler-items-list jFiler-items-default">
                                        <li class="jFiler-item" data-jfiler-index="0" style="">
                                            <div class="jFiler-item-container">
                                                <div class="jFiler-item-inner">
                                                    <div class="jFiler-item-icon pull-left">
                                                        <i class="icon-jfi-file-o jfi-file-type-application jfi-file-ext-pdf"></i>
                                                    </div>
                                                    <div class="jFiler-item-info pull-left">
                                                        <div class="jFiler-item-title" title="<?php echo $file2->getBasename(); ?>"><?php echo ($file2->getBasename() == substr($file2->getBasename(),0,40)) ? $file2->getBasename() : substr($file2->getBasename(),0,40).'...'; ?></div>
                                                        <div class="jFiler-item-others">
                                                            <span>size: <?php echo $file2->getSize('kb'); ?> KB</span>
                                                            <span>type: <?php echo $file2->getMimeType(); ?></span>
                                                            <span class="jFiler-item-status"></span>
                                                        </div>
                                                        <div class="jFiler-item-assets">
                                                            <ul class="list-inline">
                                                                <li><a class="icon-jfi-trash jFiler-item-trash-action remove-file"></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Blog Tags</label>
                                <?php 
                                if(isset($blog_data['tags'])) {
                                    $tags = $blog_data['tags'];
                                    $tags_arr = explode(',', $blog_data['tags']);
                                }
                                ?>
                                <select class="form-control input-lg" id="tags" name="tags[]" multiple="true">
                                    <?php if(isset($tags_arr) && !empty($tags_arr)) { 
                                        foreach($tags_arr as $single_tab) { ?>
                                        <option value="<?php echo $single_tab; ?>" selected="true"><?php echo $single_tab; ?></option>
                                        <?php 
                                        }
                                    } ?>
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