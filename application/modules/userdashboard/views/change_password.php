<!-- Page title -->
        <section id="page-title" class="page-title-center" data-parallax-image="images/parallax/6.jpg">
<div class="container">
<div class="page-title">
                    <h1>Your dashboard</h1>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li><a href="#">Change password</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- end: Page title -->

        <!-- Page Menu -->
        <div class="page-menu menu-outline style-1">
            <div class="container">
                <div class="menu-title">Mr. <span><?php echo isset($_SESSION['userName']) && $_SESSION['userName'] != '' ? $_SESSION['userName'] : ''; ?></span></div>
                <nav>
                    <ul>
                        <li><a href="<?php echo base_url('userdashboard'); ?>">Dashboard</a></li>
                        <li><a href="<?php echo base_url('userdashboard/profile'); ?>">Update Profile</a></li>
                        <li><a href="<?php echo base_url('userdashboard/favourite'); ?>">Favourite Item</a></li>
                        <li><a href="<?php echo base_url('userdashboard/order'); ?>"> Order History</a></li>
                         <li><a href="<?php echo base_url('userdashboard/upload'); ?>"> Upload History</a></li>
                        <li class="active"><a href="<?php echo base_url('userdashboard/changepassword'); ?>">Change Password</a></li>
                       
                    </ul>
                </nav>

                <div id="menu-responsive-icon">
                    <i class="fa fa-reorder"></i>
                </div>

            </div>
        </div>
        <!-- end: Page Menu -->

        <!-- Content -->
      <section id="page-content">

       <div class="container">

		<div class="row">



			 <?php if ($this->session->flashdata('success')) { 

                             echo getMessage('success', $this->session->flashdata('success'));

                         }  if ($this->session->flashdata('error')) { 

                             echo  getMessage('error', $this->session->flashdata('error'));

                         }  if ($this->session->flashdata('info')) { 

                             echo  getMessage('info', $this->session->flashdata('info'));

                         }?>



			<div class="col-md-8 center no-padding">

						<div class="col-md-12">

							<h3>Change Password</h3>

						</div>


					     <form action="<?php echo site_url('userdashboard/change_password'); ?>" role="form" id="changepassword" method="post" class="validate form-horizontal" enctype="multipart/form-data">



						<div class="col-md-12 form-group">

							<label class="">Old Password</label>

							<input type="password" class="form-control input-lg" placeholder="Old Password" value="" name="old_password" id="old_password">

							<?php echo form_error('fullName'); ?>

						</div>



						<div class="col-md-12 form-group">

							<label class="">New Password</label>

							<input type="password" class="form-control input-lg" placeholder="New Password" name="new_password" id="new_password">

							<?php echo form_error('new_password'); ?>

						</div>




						<div class="col-md-12 form-group">

  							<label class="">Confirm Password</label>

						    <input type="password" class="form-control input-lg" placeholder="Confirm Password" name="new_cpassword" id="new_cpassword">

							<?php echo form_error('new_cpassword'); ?>

						</div>

						

						 <div class="col-md-12 form-group">
							<button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
							<button class="btn btn-danger m-l-10" type="button">Cancel</button>

					     </div>

						</form>

				</div>



		</div>

	</div>
  </section>
        <!-- end: Content -->


                <script>
          $().ready(function() {

            // validate signup form on keyup and submit
            $("#changepassword").validate({
              rules: {
                     old_password: {
                      required: true
                    },
                     new_password: {
                      required: true,
                      minlength: 5
                    },
                    new_cpassword: {
                      required: true,
                      minlength: 5,
                      equalTo: "#new_password"
                    }

              },
              messages: {
                  old_password: {
                      required: "Please provide a old password"
                    },
                   new_password: {
                      required: "Please provide a new password",
                      minlength: "Your password must be at least 5 characters long"
                    },
                    new_cpassword: {
                      required: "Please provide a confirm password",
                      minlength: "Your password must be at least 5 characters long",
                      equalTo: "Please enter the same password as above"
                    }
              },

              debug: false,
              errorClass: 'error error-message',
              validClass: 'success',
              errorElement: 'span',
              highlight: function(element, errorClass, validClass) {
                $(element).parents("div.control-group").addClass(errorClass).removeClass(validClass);
              },
              unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".error").removeClass(errorClass).addClass(validClass);
              }

            });

          });
  </script>

        
