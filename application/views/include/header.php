<!DOCTYPE html>
<html lang="en">


 <head> 

      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="author" content="INSPIRO" />
      <meta name="description" content="perpetualweb">
      <!-- Document title -->
      <title>Airbnb | <?php echo isset($title) && $title != '' ? $title : '';   ?></title>
      <!-- Stylesheets & Fonts -->
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,800,700,600|Montserrat:400,500,600,700|Raleway:100,300,600,700,800" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('assets/'); ?>css/plugins.css" rel="stylesheet">
      <link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">
      <link href="<?php echo base_url('assets/'); ?>css/custom.css" rel="stylesheet">
      <link href="<?php echo base_url('assets/'); ?>css/responsive.css" rel="stylesheet">
      <link href="<?php echo base_url('assets/'); ?>css/select2.min.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/jquery.toast.css">
      <link rel="stylesheet" href="<?php echo base_url('admin_assets/'); ?>css/plugins/datapicker/datepicker3.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
      <script src="<?php echo base_url('assets/'); ?>js/jquery.js"></script>


    </head>

<body>
    

    <!-- Wrapper -->    <div id="wrapper">
<!-- Topbar -->
        <!-- <div id="topbar" class="topbar-transparent topbar-fullwidth dark visible-md visible-lg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="top-menu">
                            <li><a href="#">Phone: +91 xxx-xxx-xxxx</a></li>
                            <li><a href="#">Email: airbnb@info.com</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 hidden-xs">
                        <div class="social-icons social-icons-colored-hover">
                            <ul>
                                <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="social-pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                <li class="social-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li class="social-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li class="social-youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li class="social-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- end: Topbar -->

        <!-- Header -->
        <header id="header" class="header-fullwidth header-transparent dark">
            <div id="header-wrap">
                <div class="container"> <!--Logo-->
                    <div id="logo">
                        <a href="<?php echo base_url(); ?>" class="logo" data-dark-logo="<?php echo base_url('assets/'); ?>images/logo-dark.png">
                            Airbnb
                        </a>
                    </div>
                    <!--End: Logo-->

                     <!--Top Search Form-->
                    <div id="top-search">
                        <form action="search-results-page.html" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Anywhere Homes">
                        </form>
                    </div>
                    <!--end: Top Search Form-->

                    <!--Header Extras-->
                    <div class="header-extras">
                        <ul>
                            <li>
                                <!--top search-->
                                <a id="top-search-trigger" href="#" class="toggle-item">
                                    <i class="fa fa-search"></i>
                                    <i class="fa fa-close"></i>
                                </a>
                                <!--end: top search-->
                            </li></ul>
                    </div>
                    <!--end: Header Extras-->
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <button class="lines-button x"> <span class="lines"></span> </button>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->

<!--Navigation-->


                    <div id="mainMenu">
                        <div class="container">
                            <nav>

                                <?php if(isset($_SESSION['userEmail']) && !empty($_SESSION['userEmail'])){ ?>

                                <ul>
                                    <li><a href="<?php echo base_url('host'); ?>">Add listing</a></li>
                                    <li><a href="<?php echo base_url('home'); ?>">Host</a></li>
                                    <li><a href="<?php echo base_url('home'); ?>">Saved</a></li>
                                    <li><a href="<?php echo base_url('home'); ?>">Trips</a></li>
                                    <li><a href="<?php echo base_url('home'); ?>">Messages</a></li>
                                    <li><a href="<?php echo base_url('home'); ?>">Credit</a></li>
                                    <li><a href="<?php echo base_url('home'); ?>">Help</a></li>
                                    <li class="topbar-dropdown hidden-xs float-right">
                                       <a href="#"><i class="fa fa-user"></i></a>
                                       <div class="topbar-form dropdown-invert">
                                        <ul class="user-drop">
                                            <li> <a href="<?php echo base_url('userdashboard'); ?>"> Edit Profile </a> </li>
                                            <li> <a href="#"> Invite Friends </a> </li>
                                            <li> <a href="#"> Account Setting </a>  </li>
                                            <li> <a href="#"> My Guidebook </a> </li>
                                            <li> <a href="#"> Airbnb for Work </a> </li>
                                            <li> <a href="<?php echo base_url('home/logout'); ?>"> Log Out </a> </li>
                                        </ul>
                                       </div>
                                    </li>
                                </ul>

                                <?php }else{ ?>


                                <ul>
                                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                    <li><a href="index.html">Become a host</a></li>
                                    <li><a href="index.html">Earn Credit</a></li>
                                    <li><a href="index.html">Help</a></li>
                                    <li><a href="#Registration" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
                                    <li><a href="#Login" data-toggle="modal" data-target="#myModal">Login Up</a></li>
                                </ul>






                                <?php } ?>

                            </nav>
                        </div>
                    </div>
                    <!--END: NAVIGATION-->
                </div>
            </div>
        </header>
        <!-- end: Header -->