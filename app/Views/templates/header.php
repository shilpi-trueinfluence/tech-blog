<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>White Papers</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Bootstrap 3 template for corporate business" />
        <!-- css -->
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('plugins/flexslider/flexslider.css'); ?>" rel="stylesheet" media="screen" />
        <link href="<?php echo base_url('css/cubeportfolio.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet" />

        <!-- Theme skin -->
        <link id="t-colors" href="<?php echo base_url('css/skins/default.css'); ?>" rel="stylesheet" />

        <!-- boxed bg -->
        <link id="bodybg" href="<?php echo base_url('css/bodybg/bg1.css'); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url('plugins/summernote/summernote-lite.css'); ?>">
        <?php
        if (isset($css) && !empty($css)) {
            foreach ($css as $single_css) {
                ?>
                <link href="<?php echo $single_css; ?>" rel="stylesheet" type="text/css" />
                <?php
            }
        }
        ?>
        <script>
            var BASE_URL = '<?php echo base_url(); ?>';
        </script>
    </head>

    <body>
        <div id="wrapper">
            <!-- start header -->
            <header>
                <div class="navbar navbar-default navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('img/digiinfluence-01-01.png'); ?>" alt="" width="110" height="110" /></a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="<?php echo (isset($menu) && $menu['current_page'] != 'home') ? '' : 'active'; ?>"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                                <li><a href="<?php echo base_url('home'); ?>">Trends</a></li>
                                <li><a href="<?php echo base_url('home'); ?>">Events</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">More <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('home'); ?>">Infra</a></li>
                                        <li><a href="<?php echo base_url('home'); ?>">Digital Transformation</a></li>
                                        <li><a href="<?php echo base_url('home'); ?>">Resource Center</a></li>
                                        <li><a href="<?php echo base_url('home'); ?>">Block Chain</a></li>
                                        <li><a href="<?php echo base_url('home'); ?>">FinTech</a></li>
                                        <li><a href="<?php echo base_url('home'); ?>">Cloud</a></li>
                                        <li><a href="<?php echo base_url('home'); ?>">AI</a></li>
                                        <li><a href="<?php echo base_url('home'); ?>">IoT</a></li>
                                        <li><a href="<?php echo base_url('home'); ?>">Big Data</a></li>
                                        <li><a href="<?php echo base_url('home'); ?>">Security</a></li>
                                    </ul>
                                </li>
                                <?php if (isset($_SESSION['logged_in'])) { ?>
                                    <li class="dropdown <?php echo (isset($menu['current_menu']) && $menu['current_menu'] == 'masters') ? 'active' : ''; ?>">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Masters <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url('users'); ?>">Users</a></li>
                                            <li><a href="<?php echo base_url('blogs'); ?>">Blogs</a></li>
                                            <li><a href="<?php echo base_url('categories'); ?>">Categories</a></li>
                                            <li><a href="<?php echo base_url('home'); ?>">Leads</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <li><a href="<?php echo base_url('contact_us'); ?>">Contact Us</a></li>
                                
                                <!-- Login/Logout Option -->
                                <?php 
                                $this->session = \Config\Services::session();
                                $this->session->start();
                                if (!isset($_SESSION['logged_in'])) { ?>
                                    <li class="user-profile <?php echo (isset($menu) && $menu['current_page'] == 'login') ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url('login'); ?>" data-delay="0" data-close-others="false"><i class="fa fa-sign-in"></i> &nbsp;Sign In</a>
                                    </li>
                                <?php } ?>
                                    <?php ?>
                                <?php 
                                if (isset($_SESSION['logged_in'])) { 
                                    $sub_name = substr($this->session->get('uname'),0,10);
                                    $name = ($sub_name == $this->session->get('uname')) ? $sub_name : $sub_name.'...';
                                    ?>
                                    <li class="dropdown user-profile">
                                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">
                                            <i class="fa fa-user"></i> Welcome, <?php echo $name; ?>!&nbsp; <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="disabled-link"><?php echo $this->session->get('uname'); ?></a></li>
                                            <li><a href="<?php echo base_url('users/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
