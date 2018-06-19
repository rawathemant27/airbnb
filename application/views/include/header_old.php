<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="author" content="INSPIRO" />
      <meta name="description" content="perpetualweb">
      <!-- Document title -->
      <title>E-commerce | <?php echo isset($title) && $title != '' ? $title : '';   ?></title>
      <!-- Stylesheets & Fonts -->
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,800,700,600|Montserrat:400,500,600,700|Raleway:100,300,600,700,800" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('assets/'); ?>css/plugins.css" rel="stylesheet">
      <link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">
      <link href="<?php echo base_url('assets/'); ?>css/responsive.css" rel="stylesheet">
       <script src="<?php echo base_url('assets/'); ?>js/jquery.js"></script>
   </head>
   <body>
      <!-- Wrapper -->
      <div id="wrapper">
      <!-- TOPBAR -->
      <div id="topbar" class="topbar-fullwidth visible-md visible-lg mainMenu">
         <div class="container">
            <div class="topbar-dropdown">
               <div class="title">English <i class="fa fa-caret-down"></i></div>
               <div class="dropdown-list">
                  <a class="list-entry" href="#">French</a>
                  <a class="list-entry" href="#">Spanish</a>
               </div>
            </div>
            <div class="topbar-dropdown">
               <div class="title"><b>Currency:</b> <i class="fa fa-gbp" aria-hidden="true"></i> USD <i class="fa fa-caret-down"></i></div>
               <div class="dropdown-list">
                  <a class="list-entry" href="#">$ CAD</a>
                  <a class="list-entry" href="#">€ EUR</a>
               </div>
            </div>
            <!-- <div class="topbar-dropdown hidden-xs">
               <div class="title"><i class="fa fa-phone"></i>Any question? Call Us <a href="tel:+987123654"><b>+91 9981104347</b></a></div>
               
               </div> -->
            <div class="loginDiv"> 
            <?php if(!isset($_SESSION['userId']) OR $_SESSION['userId'] == ''){ ?>
            <div class="topbar-dropdown hidden-xs float-right">
               <div class="title login-button"><a href="#"><i class="fa fa-user"></i> Login</a></div>
               <div class="topbar-form dropdown-invert">

                  <form action="<?php echo site_url('home/login'); ?>" role="form" id="loginForm" method="post" class="validate form-horizontal" enctype="multipart/form-data">

                     <div class="form-group">
                        <label class="sr-only">Username or Email</label>
                        <input name="username" id="username" placeholder="Email" class="form-control" type="text">
                     </div>
                     <div class="form-group">
                        <label class="sr-only">Password</label>
                        <input placeholder="Password" class="form-control" type="password" name="password" id="password">
                     </div>
                     <div class="form-inline form-group">
                        <div class="checkbox">
                           <label>
                           <input type="checkbox">
                           <small> Remember me</small> </label>
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Login</button>
                        
                     </div>
                  </form>
               </div>
            </div>

            <div class="topbar-dropdown hidden-xs float-right">
               <div class="title login-button"><a href="<?php echo base_url('registration'); ?>"><i class="fa fa-user"></i> Register</a></div>
               
            </div>

             <?php }else{ ?>
             <div class="topbar-dropdown hidden-xs float-right">
               <div class="title login-button"><a href="#"><i class="fa fa-user"></i> <?php echo isset($_SESSION['userName']) && $_SESSION['userName'] != '' ? $_SESSION['userName'] : ''; ?></a></div>
               
            </div>

            <div class="topbar-dropdown hidden-xs float-right">
               <div class="title login-button"><a href="<?php echo base_url('home/logout'); ?>"><i class="fa fa-sign-out"></i>Logout</a></div>
               
            </div>

             <?php } ?>
            </div>
            <nav>
                        <ul>
                         <li class="dropdown mega-menu-item">
                              <a class="bac" href="#">Browse all categories </a>
                                  <ul class="dropdown-menu hover_mega_menu">
                                     <li class="mega-menu-content">
                                        <div class="row">
                                           <div class="col-md-12">
                                              <ul>

                                              <?php if(!empty($allcat)) {
                                                    foreach ($allcat as $key => $value) {
                                                ?>
                                                   <li><a href=""><?php echo $value->categoryName; ?> </a></li>
                                              
                                               <?php } } ?>

                                                <!--  <li>
                                                    <a href="#"> <i class="fa fa-list-ul"></i>category1</a>
                                                 </li>
                                                 <li>
                                                    <a href="#"> <i class="fa fa-list-ul"></i>category2</a>
                                                 </li>
                                                 <li>
                                                    <a href="#"> <i class="fa fa-list-ul"></i>category3</a>
                                                 </li>
                                                 <li>
                                                    <a href="#"> <i class="fa fa-list-ul"></i>category4</a>
                                                 </li> -->
                                              </ul>
                                         </div>
                                   <!--     <div class="col-md-2">
                                          <ul>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category5</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category6</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category7</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category8</a>
                                             </li>
                                          </ul>
                                       </div> -->
                                       <!-- <div class="col-md-2">
                                          <ul>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category9</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category10</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category11</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category12</a>
                                             </li>
                                          </ul>
                                       </div> -->
                                     <!--   <div class="col-md-2">
                                          <ul>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category13</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category14</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category15</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category16</a>
                                             </li>
                                          </ul>
                                       </div> -->
                                       <!-- <div class="col-md-2">
                                          <ul>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category17</a>
                                             </li>
                                             <li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category18</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category19</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category20</a>
                                             </li>
                                          </ul>
                                       </div> -->
                                    </div>
                                 </li>
                              </ul>
                        </li>
                           <li class="dropdown mega-menu-item"> <a class="pai" href="<?php echo base_url('postitem'); ?>">Post an item</a>
                           </li>
                           <li class="dropdown mega-menu-item"> <a class="whish" href="<?php echo base_url('wishlist'); ?>">Wishlist</a>
                           </li>
                           <li class="dropdown mega-menu-item"> <a class="hiw" href="<?php echo base_url('help'); ?>">How it work</a>
                           </li>
                           <li class="dropdown mega-menu-item"> <a class="blog" href="<?php echo base_url('blog'); ?>">Blog</a>
                           </li>
                           <li class="dropdown"> 
                              <a class="aboutus" href="<?php echo base_url('aboutus'); ?>">About Us</a>
                           </li>
                           <li><a class="homepage" href="<?php echo base_url(); ?>">Home</a></li>
                           <!-- <li class="dropdown mega-menu-item"> <a href="help.php">Help</a>
                           </li> -->
                           <!-- <li class="dropdown mega-menu-item"> <a href="blog.php">Blog</a>
                           </li> -->
                           <!-- <li class="dropdown mega-menu-item"> <a href="<?php echo base_url('contactus'); ?>">Contact Us</a>
                           </li> -->
                        </ul>
                     </nav>
         </div>
      </div>
      <!-- end: TOPBAR -->
      <!-- Header -->
      <header id="header" class="header-fullwidth">
         <div id="header-wrap">
            <div class="container">
               <!--Logo-->
               <div id="logo">
                  <a href="index.php" class="logo" data-dark-logo="images/logo-dark.png">
                     E-commerce
                     <!-- <img src="images/logo.png" alt="Polo Logo"> -->
                  </a>
               </div>
               <!--End: Logo-->
               <!--Top Search Form-->
               <div id="top-search">
                  <form action="search-results-page.html" method="get">
                     <input type="text" name="q" class="form-control" value="" placeholder="Start typing & press  &quot;Enter&quot;">
                  </form>
               </div>
               <!--end: Top Search Form-->
               <!--Header Extras-->
               <div class="header-extras">
                  <ul class="header-color-ul">
                     <li>
                        <!--top search-->
                        <a id="top-search-trigger" href="#" class="toggle-item">
                        <i class="fa fa-search"></i>
                        <i class="fa fa-close"></i>
                        </a>
                        <!--end: top search-->
                     </li>
                     <li class="hidden-xs">
                        <!--shopping cart-->
                        <div id="shopping-cart">
                           <a href="shop_cart.php">
                           <span class="shopping-cart-items">8</span>
                           <i class="fa fa-shopping-cart"></i></a>
                        </div>
                        <!--end: shopping cart-->
                     </li>
                     <li>
                        <div class="topbar-dropdown">
                           <a class="title"><i class="fa fa-globe"></i></a>
                           <div class="dropdown-list">
                              <a class="list-entry" href="#">French</a>
                              <a class="list-entry" href="#">Spanish</a>
                           </div>
                        </div>
                     </li>
                     <li>
                        <a class="title" href="">
                        <span class="credit_card_items">8</span>
                        <i class="fa fa-credit-card credit_card" aria-hidden="true"></i>
                        </a>
                     </li>
                  </ul>
               </div>
               <!--end: Header Extras-->
               <!--Navigation Resposnive Trigger-->
               <div id="mainMenu-trigger">
                  <button class="lines-button x"> <span class="lines"></span> </button>
               </div>
               <!--end: Navigation Resposnive Trigger-->
               <!--Navigation-->
               <div id="mainMenu" class="light hover-color-pm">
                  <div class="container">
                     <nav>
                        <ul>

                           <?php if(!empty($allcat)) {
                                foreach ($allcat as $key => $value) {
                            ?>
                           <li><a href=""><?php echo $value->categoryName; ?> </a></li>
                          
                           <?php } } ?>

                          <!--  <li><a href="">Category 1 </a></li>

                           <li ><a href="">Category 2</a>
                           </li>
                           <li > <a href="">Category 3 </a>
                           </li>
                           <li > <a href="">Category 4 </a>
                           </li>
                           <li > <a href="">Category 5 </a>
                           </li>
                           <li> <a href="">Category 6 </a>
                           </li> -->

                           <!-- <li class="dropdown">
                              <a href="#">Shop</a>
                              <ul class="dropdown-menu">
                                 <li> <a href="shop_cart.php">Cart</a> </li>
                                 <li> <a href="checkout.php">Checkout</a> </li>
                              </ul>
                           </li> -->
                           <!-- <li class="dropdown mega-menu-item">
                              <a href="#">Post an item</a>
                              <ul class="dropdown-menu hover_mega_menu">
                                 <li class="mega-menu-content">
                                    <div class="row">
                                       <div class="col-md-2">
                                          <ul>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category1</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category2</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category3</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category4</a>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="col-md-2">
                                          <ul>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category5</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category6</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category7</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category8</a>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="col-md-2">
                                          <ul>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category9</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category10</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category11</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category12</a>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="col-md-2">
                                          <ul>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category13</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category14</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category15</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category16</a>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="col-md-2">
                                          <ul>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category17</a>
                                             </li>
                                             <li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category18</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category19</a>
                                             </li>
                                             <li>
                                                <a href="#"> <i class="fa fa-list-ul"></i>category20</a>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </li> -->
                           <li class="dropdown mega-menu-item"> <a style="color: #E91E63;" href="<?php echo base_url('postitem'); ?>" >Post an item</a>

                           <!-- <li class="dropdown mega-menu-item"> <a href="<?php echo base_url('contactus'); ?>">Contact Us</a>
                           </li> -->
                        </ul>
                     </nav>
                  </div>
               </div>
               <!--end: Navigation-->
            </div>
         </div>
      </header>
      <!-- end: Header -->