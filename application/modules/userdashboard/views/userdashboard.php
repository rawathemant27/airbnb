<!-- Page title -->
<style type="text/css">
     .dashboard_userimg{
    height: 150px;
    width: 150px;
    border: 1px solid #d4d3d3;
    border-radius: 50%;
     opacity: 1;
  display: block;
  margin:0 auto;
  transition: .5s ease;
  backface-visibility: hidden;
   }
.container-img {
    position: relative;
}

.middle2  {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.container-img:hover .dashboard_userimg {
  opacity: 0.3;
}

.container-img:hover .middle {
  opacity: 1;
}

.text {
  color:black;
  font-size: 16px;
}

.credit_card_items2 {
   background: #1abc9c none repeat scroll 0 0;
border-radius: 100%;
color: #ffffff;
font-size: 15px;
font-weight: 611;
height: 30px;
line-height: 16px;
padding: 7px 10px;
position: absolute;
right: -23px;
top: 6px;
width: 41px;
z-index: 1;
}

</style>
        <section id="page-title" class="page-title-center" data-parallax-image="images/parallax/6.jpg">
<div class="container">
<div class="page-title">
                    <h1>Your dashboard</h1>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li><a href="#">Dashboard</a>
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
                        <li class="active"><a href="<?php echo base_url('userdashboard'); ?>">Dashboard</a></li>
                        <li><a href="<?php echo base_url('userdashboard/profile'); ?>">Update Profile</a></li>
                        <li><a href="<?php echo base_url('userdashboard/favourite'); ?>">Favourite Item</a></li>
                        <li><a href="<?php echo base_url('userdashboard/order'); ?>"> Order History</a></li>
                        <li><a href="<?php echo base_url('userdashboard/upload'); ?>"> Upload History</a></li>
                        <li><a href="<?php echo base_url('userdashboard/changepassword'); ?>">Change Password</a></li>
                       
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

             <?php if ($this->session->flashdata('success')) { 

                             echo getMessage('success', $this->session->flashdata('success'));

                         }  if ($this->session->flashdata('error')) { 

                             echo  getMessage('error', $this->session->flashdata('error'));

                         }  if ($this->session->flashdata('info')) { 

                             echo  getMessage('info', $this->session->flashdata('info'));

                         }?>

                         <?php // print_r($userdata); ?>
                <!-- Portfolio Filter -->
                <nav class="grid-filter gf-outline" data-layout="#portfolio">
                    <ul>
                        <li class="active container-img">
                           <img class="dashboard_userimg image" width="300px" src="<?php echo isset($userdata->userImage) && $userdata->userImage != '' ? base_url('uploads/userImage/').$userdata->userImage : base_url('assets/images/userImage.jpg'); ?>">
                             <div class="middle">
                               <form action="<?php echo site_url('userdashboard/changeImage'); ?>" role="form" id="changeImage" method="post" class="validate form-horizontal" enctype="multipart/form-data">

                                <input type="file" name="userfile" id="userfile" accept="image/png,image/gif,image/jpeg,image/jpg" >

                                <img src="" id="image">

                                 <div class="col-md-12 form-group">
                                    <button disabled style="display: none" type="submit" name="submit" value="submit" class="btn btn-default submitbtn">Update</button>
                                 </div>
                                </form>
                            </div>
                        </li>
                       
                    

                        <li> <p> <h4> Total Credits : <strong> <i><span class="credit_card_items2"><?php echo isset($totalcredit) && $totalcredit != '' ? $totalcredit : 0; ?></span>  <i class="fa fa-credit-card credit_card" aria-hidden="true"></i> </i> </strong> </h4> </p> </li> 
                    </ul>
                </nav>
                <!-- end: Portfolio Filter -->

     
            </div>

        </section>
          <script type="text/javascript">
              document.getElementById("userfile").onchange = function () {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("image").src = e.target.result;
                    $('.submitbtn').prop('disabled', false);
                    $('.submitbtn').css({"display" : "block"});
                };

                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            };
        </script>

         <script>
          $().ready(function() {
            // validate signup form on keyup and submit
            $("#changeImage").validate({
              rules: {
                     userfile: {
                      required: true
                    }

              },
              messages: {
                  userfile: {
                      required: "Please select image!"
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

        <!-- end: Content -->

        
