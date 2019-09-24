<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3><?php echo $blog_data['title']; ?></h3>
                <img src="<?php echo base_url($blog_data['image']); ?>" alt="" class="img-responsive view-blog" />
                <div><?php echo $blog_data['description']; ?></div>
            </div>

            <div class="col-lg-4">
                <aside class="right-sidebar">
                    <div class="widget">
                        <form role="form">
                            <div class="form-group">
                                <input type="text" class="form-control" id="s" placeholder="Search..">
                            </div>
                        </form>
                    </div>
                    <div class="widget">
                        <h5 class="widgetheading">Categories</h5>
                        <ul class="cat">
                            <li><i class="fa fa-angle-right"></i><a href="#">Web design</a><span> (20)</span></li>
                            <li><i class="fa fa-angle-right"></i><a href="#">Online business</a><span> (11)</span></li>
                            <li><i class="fa fa-angle-right"></i><a href="#">Marketing strategy</a><span> (9)</span></li>
                            <li><i class="fa fa-angle-right"></i><a href="#">Technology</a><span> (12)</span></li>
                            <li><i class="fa fa-angle-right"></i><a href="#">About finance</a><span> (18)</span></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widgetheading">Latest posts</h5>
                        <ul class="recent">
                            <li>
                                <img src="img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="" />
                                <h6><a href="#">Lorem ipsum dolor sit</a></h6>
                                <p>
                                    Mazim alienum appellantur eu cu ullum officiis pro pri
                                </p>
                            </li>
                            <li>
                                <a href="#"><img src="img/dummies/blog/65x65/thumb2.jpg" class="pull-left" alt="" /></a>
                                <h6><a href="#">Maiorum ponderum eum</a></h6>
                                <p>
                                    Mazim alienum appellantur eu cu ullum officiis pro pri
                                </p>
                            </li>
                            <li>
                                <a href="#"><img src="img/dummies/blog/65x65/thumb3.jpg" class="pull-left" alt="" /></a>
                                <h6><a href="#">Et mei iusto dolorum</a></h6>
                                <p>
                                    Mazim alienum appellantur eu cu ullum officiis pro pri
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widgetheading">Popular tags</h5>
                        <ul class="tags">
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Trends</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Internet</a></li>
                            <li><a href="#">Tutorial</a></li>
                            <li><a href="#">Development</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
