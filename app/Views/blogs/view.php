<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article>
                    <div class="post-image">
                        <div class="post-heading">
                            <h3><a href="#"><?php echo $blog_data['title']; ?></a></h3>
                        </div>
                        <img src="<?php echo base_url($blog_data['image']); ?>" alt="" class="img-responsive" />
                    </div>
                    <?php echo $blog_data['description']; ?>
                    <div class="bottom-article">
                        <ul class="meta-post">
                            <li><i class="fa fa-calendar"></i><a href="#"> Mar 27, 2014</a></li>
                            <li><i class="fa fa-user"></i><a href="#"> Admin</a></li>
                            <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                            <li><i class="fa fa-tags"></i><a href="#">Design</a>, <a href="#">Blog</a></li>
                        </ul>
                    </div>
                </article>
                <div class="comment-area">

                    <h4>4 Comments</h4>
                    <div class="media">
                        <a href="#" class="pull-left"><img src="img/avatar.png" alt="" class="img-circle" /></a>
                        <div class="media-body">
                            <div class="media-content">
                                <h6><span>March 12, 2013</span> Michael Simpson</h6>
                                <p>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </p>

                                <a href="#" class="align-right reply">Reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <a href="#" class="pull-left"><img src="img/avatar.png" alt="" class="img-circle" /></a>
                        <div class="media-body">
                            <div class="media-content">
                                <h6><span>March 12, 2013</span> Smith karlsen</h6>
                                <p>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </p>

                                <a href="#" class="align-right reply">Reply</a>
                            </div>
                            <div class="media">
                                <a href="#" class="pull-left"><img src="img/avatar.png" alt="" class="img-circle" /></a>
                                <div class="media-body">
                                    <div class="media-content">
                                        <h6><span>June 22, 2013</span> Jay Moeller</h6>
                                        <p>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                        </p>

                                        <a href="#" class="align-right reply">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <a href="#" class="pull-left"><img src="img/avatar.png" alt="" class="img-circle" /></a>
                        <div class="media-body">
                            <div class="media-content">
                                <h6><span>June 24, 2013</span> Dean Zaloza</h6>
                                <p>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </p>

                                <a href="#" class="align-right reply">Reply</a>
                            </div>
                        </div>
                    </div>

                    <div class="marginbot30"></div>
                    <h4>Leave your comment</h4>


                    <form role="form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="* Enter name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="* Enter email address">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="8" placeholder="* Your comment here"></textarea>
                        </div>
                        <button type="submit" class="btn btn-theme btn-md">Submit</button>
                    </form>

                </div>

                <div class="clear"></div>
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