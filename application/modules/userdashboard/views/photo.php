 <!-- Page title -->
        <section id="page-title" data-parallax-image="images/parallax/5.jpg">
            <div class="container">
               
            </div>
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

                 <div class="panel">
                    <div class="panel-header">
                      <h4 class="edit-profile-section-heading">
                          Profile Photo
                      </h4>
                    </div>
                    <div class="panel-body">
                     
                     <div class="">
                <div class="row">
                  <div class="col-lg-4 text-center">
                    <div class="profile_pic_container picture-main space-sm-2 space-md-2" data-picture-id="488970398">

                      <div class="media-photo media-round" aria-hidden="true">
                        <img id="display-image" height="225" src=" <?php echo isset($userData->userImage) && $userData->userImage != '' ? base_url('uploads/userImage/').$userData->userImage : 'https://a0.muscache.com/defaults/user_pic-225x225.png?v=3'  ?>" title="<?php echo $userData->fname; ?>" width="225">
                      </div>

                      <!-- <button class="picture-tile-delete overlay-btn" data-behavior="tooltip" aria-label="Delete" tabindex="0">
                        <i class="icon icon-trash"></i>
                      </button> -->
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <ul class="list-layout picture-tiles clearfix ui-sortable"></ul>

                    <p>
                      Clear frontal face photos are an important way for hosts and guests to learn about each other. It’s not much fun to host a landscape!
                      Be sure to use a photo that clearly shows your face and doesn’t include any personal or sensitive info you’d rather not have hosts or guests see.
                    </p>

                    <div class="row row-condensed">
                      <div class="">
                        <form id="upload" action="<?php echo base_url('userdashboard/changeImage'); ?>" method="post" enctype="multipart/form-data">
                          <span class="file-input-container">
                              <!-- <input accept="image/*" id="user_profile_pic" name="user_profile_pic" tabindex="0" type="file"> -->

                              <input accept="image/*" class="input-file" id="user_profile_pic" name="userfile" tabindex="0" type="file" value="" />
                              <label aria-hidden="true" id="choose-photo" class="btn btn-block btn-large" for="user_profile_pic">Upload a file from your computer</label>
                          </span>
                        </form>


                       


                      </div>
                    </div>
                  </div>
                </div>
              </div>

                    </div>
                  </div>


         
       
        </div>

                        <!--End: Product list-->
                    </div>
                    <!-- end: Content-->

                    <!-- Sidebar-->
                    <div class="sidebar col-md-3">
                        <!--widget newsletter-->
                        <div class="widget clearfix widget-archive">
                             <ul class="list list-lines">
                                <li><a href="<?php echo base_url('userdashboard') ?>">Edit Profile</a> </li>
                                <li><a style="font-weight: bold;" href="#">Photos</a></li>
                                <li><a href="<?php echo base_url('userdashboard/edit_verification') ?>">Trust and Verification</a> </li>
                                <li><a href="<?php echo base_url('userdashboard/reviews') ?>" >Reviews</a></li>
                                <li><a href="<?php echo base_url('userdashboard/references') ?>">References</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12 form-group">
                            <a href="<?php echo base_url('userdashboard/show'); ?>" name="submit" value="submit" class="btn btn-default">View Profile</a>
                        </div>
                       
                    </div>
                    <!-- end: Sidebar-->
                </div>
            </div>
        </section>
        <!-- end: Shop products -->
