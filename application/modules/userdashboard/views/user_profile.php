 <!-- Page title -->
        <section id="page-title" data-parallax-image="images/parallax/5.jpg">
             
        </section>
        <!-- end: Page title -->

        <!-- Shop products -->
        <section id="page-content" class="sidebar-left">
            <div class="container">

                <div class="row">
                    <!-- Content-->
                    <div class="content col-md-9">

                      <!-- start col-md-12 -->
                      <div class="col-md-12">

                        <div class="row space-4">

                        <div class="col-sm-8 col-md-12 col-lg-12">
                          <h1>
                            Hey, I’m <?php echo $userData->fname.' '.$userData->lname;  ?>
                          </h1>
                          <div class="h5 space-top-2">
                            <a href="#" class="link-reset"><?php echo $userData->address;  ?></a>.
                          
                            <span class="text-normal">
                              <?php echo date( 'F Y', strtotime($userData->createdDatetime ) );  ?>
                            </span>
                          </div>
                          <div class="text-muted space-top-2">

                          </div>
                          <div class="edit_profile_container space-3">
                          <a href="<?php echo base_url('userdashboard'); ?>">Edit Profile</a></div>
                        </div>
                      </div>

                   

                      </div>

                        <!--End: Product list-->
                    </div>
                    <!-- end: Content-->

                    <!-- Sidebar-->
                    <div class="col-lg-3 col-md-4 hide-sm">
                      <div id="user" class="space-4 ">
                        <div>
                          <div class="space-2" id="user-media-container">
                            <div id="slideshow" class="slideshow">
                              <div class="slideshow-preload"></div>
                              <ul class="slideshow-images">
                                <li class="active media-photo media-photo-block">
                                  <img alt="<?php echo $userData->fname; ?>" class="img-responsive" height="225" src="<?php echo isset($userData->userImage) && $userData->userImage != '' ? base_url('uploads/userImage/').$userData->userImage : 'https://a0.muscache.com/defaults/user_pic-225x225.png?v=3'  ?>" title="<?php echo $userData->fname; ?>" width="225">
                                </li>
                                <li class="media-photo media-photo-block"></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="panel space-4">
                        <div class="panel-header">
                          Verified info
                        </div>
                        <div class="panel-body">
                          <ul class="list-unstyled space-3" title="Verified info">
                      <li class="row row-table space-2">
                        <div class="col-12 col-middle">
                          Email address
                        </div>
                        <div class="col-3 col-middle">
                          <i class="icon icon-ok h3" aria-hidden="true"></i>
                          <span class="screen-reader-only">Verified</span>
                        </div>
                      </li>
                      <li class="row row-table space-2">
                        <div class="col-12 col-middle">
                          Phone number
                        </div>
                        <div class="col-3 col-middle">
                          <i class="icon icon-ok h3" aria-hidden="true"></i>
                          <span class="screen-reader-only">Verified</span>
                        </div>
                      </li>
                    </ul>

                        <a href="<?php echo base_url('userdashboard/edit_verification'); ?>">
                            Verify more info
                        </a>
                        </div>
                      </div>


                        <div class="panel space-4">
                          <div class="panel-header">
                            About me
                          </div>
                          <div class="panel-body">
                            <dl>
                              <dt>Languages</dt>
                              <dd>English, العربية</dd>
                            </dl>
                          </div>
                        </div>
                      
                    </div>
                    <!-- end: Sidebar-->
                </div>
            </div>
        </section>
        <!-- end: Shop products -->
