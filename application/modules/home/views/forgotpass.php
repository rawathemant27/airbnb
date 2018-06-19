<!-- Page title -->
<?php  $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];  ?>
<section id="page-title" data-parallax-image="images/parallax/5.jpg">
	<div class="container">
		<div class="page-title">
			<h1>Password Recover</h1>
			<span>To receive a new password, enter your email address below.</span>
		</div>
		<div class="breadcrumb">
					<ul>
				<li><a href="#">Home</a>
				</li>
				<li><a href="#">Pages</a>
				</li>
				<li class="active"><a href="#">Password Recover</a>
				</li>
			</ul>
		</div>
	</div>
</section>
<!-- end: Page title -->
<!-- Section -->
<section>
	<div class="container">
		<div class="row">

		     <?php if ($this->session->flashdata('success')) { 
                             echo getMessage('success', $this->session->flashdata('success'));
                         }  if ($this->session->flashdata('error')) { 
                             echo  getMessage('error', $this->session->flashdata('error'));
                         }  if ($this->session->flashdata('info')) { 
                             echo  getMessage('info', $this->session->flashdata('info'));
                    }?>

			<div class="col-sm-6 col-sm-offset-3">
				<h2 class="text-center">Forgot Password?</h2>
				 <form action="<?php echo site_url('home/forgot'); ?>" role="form" id="forgot" method="post" class="validate form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<p class="center">To receive a new password, enter your email address below.</p>
						<input type="email" name="emailid" id="emailid" class="form-control form-white placeholder" placeholder="Enter your email..." required>
						<?php echo form_error('emailid'); ?>
					</div>
					<div class="text-center">
						<button  type="submit" name="submit" value="submit" class="btn btn-default">Recover your Password</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- end: Section -->



        <script>
          $().ready(function() {

            // validate signup form on keyup and submit
            $("#forgot").validate({
              rules: {
              		emailid:     "required",

              },

              messages: { 
              	emailid: "Please enter email id",
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