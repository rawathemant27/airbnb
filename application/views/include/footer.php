<!-- Large modal -->

 <!-- START VAT MODEL -->
 <div class="modal fade" id="modal1" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="panel-header">
                     <a href="#" class="panel-close" data-behavior="modal-close"></a>
                     VAT ID Number Verification
                  </div>

                    <div class="flash-container"></div>

                    <form accept-charset="UTF-8" action="#" class="vat-number-verification-form form-horizontal" method="post">
                        <div class="panel-body">
                          <p class="text-muted space-bottom-1">Note: All non-optional fields are required</p>
                          <input type="hidden" name="user_id" value="187285880">
                          <div class="control-group">
                            <label class="control-label" for="country_code">Member State</label>
                            <div class="controls">
                              <select name="member_state" id="vat-member-state" required >
                                  <option value="" selected="selected"> </option>
                                
                                  <option value="AT" data-override="">Austria</option>
                                
                                  <option value="BE" data-override="">Belgium</option>
                                
                                  <option value="BG" data-override="">Bulgaria</option>
                                
                                  <option value="HR" data-override="">Croatia</option>
                                
                                  <option value="CY" data-override="">Cyprus</option>
                                
                                  <option value="CZ" data-override="">Czech Republic</option>
                                
                                  <option value="DK" data-override="">Denmark</option>
                                
                                  <option value="EE" data-override="">Estonia</option>
                                
                                  <option value="FI" data-override="">Finland</option>
                                
                                  <option value="FR" data-override="">France</option>
                                
                                  <option value="DE" data-override="">Germany</option>
                                
                                  <option value="GR" data-override="EL">Greece</option>
                                
                                  <option value="HU" data-override="">Hungary</option>
                                
                                  <option value="IE" data-override="">Ireland</option>
                                
                                  <option value="IT" data-override="">Italy</option>
                                
                                  <option value="LV" data-override="">Latvia</option>
                                
                                  <option value="LT" data-override="">Lithuania</option>
                                
                                  <option value="LU" data-override="">Luxembourg</option>
                                
                                  <option value="MT" data-override="">Malta</option>
                                
                                  <option value="NL" data-override="">Netherlands</option>
                                
                                  <option value="PL" data-override="">Poland</option>
                                
                                  <option value="PT" data-override="">Portugal</option>
                                
                                  <option value="RO" data-override="">Romania</option>
                                
                                  <option value="SK" data-override="">Slovakia</option>
                                
                                  <option value="SI" data-override="">Slovenia</option>
                                
                                  <option value="ES" data-override="">Spain</option>
                                
                                  <option value="SE" data-override="">Sweden</option>
                                
                                  <option value="GB" data-override="">United Kingdom</option>
                                
                              </select>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="vat_number" id="vat_number">VAT Number</label>
                            <div class="controls">
                              <div class="input-prepend">
                                <span class="add-on vat-id-prefix"></span>
                                <input type="text" name="vat_number" class="form-control" required>
                              </div>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="name">Name on Registration</label>
                            <div class="controls">
                              <input type="text" name="Name_on_Registration" class="form-control input-lg" required>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="address1">Address Line 1</label>
                            <div class="controls">
                              <input type="text" name="Address_Line_1" class="form-control input-lg" required>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="address2">Address Line 2 (optional)</label>
                            <div class="controls">
                              <input type="text" name="Address_Line_2" class="form-control input-lg">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="city">City</label>
                            <div class="controls">
                              <input type="text" name="City" class="form-control input-lg" required>
                            </div>

                          </div>

                          <div class="control-group">
                            <label class="control-label" for="state">Province / Region</label>
                            <div class="controls">
                              <input type="text" name="Region" class="form-control input-lg" required>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="zip">Postal Code</label>
                            <div class="controls">
                              <input type="text" name="Postal_Code" class="form-control input-lg" required>
                            </div>
                          </div>

                          <p class="vat-verification-msg">Verification may take up to 48 hours. You will receive an email to confirm verification status.</p>

                        </div>
                        <div class="panel-footer">
                          <input class="btn" type="submit" name="submit" value="Verify">
                          <a href="#" class="btn gray" data-dismiss="modal">Cancel</a>
                        </div>
                      </form>

                </div>
            </div>
        </div>
 <!-- END VAT MODEL -->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Login/Registration</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                             <li><a href="#ForgotPass" data-toggle="tab">Forgot Password</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <form action="#" role="form" id="loginForm" method="post" class="validate form-horizontal" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="username" id="username" placeholder="Email" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                    </div>
                                </div>


                                <!-- <div class="row">
                                     <div class="checkbox">
                                       <label>
                                       <input type="checkbox">
                                       <small> Remember me</small> </label>
                                    </div>
                                    <div class="col-sm-10">
                                       <button disabled type="submit" name="submit" value="submit" class="btn loginbtn login btn-primary btn-block">Login</button>
                                    </div>
                                </div> -->

                                  <div class="form-group">
                                    <div class="checkbox">
                                       <label for="exampleInputPassword1" class="col-sm-2 control-label"></label>
                                       <div class="col-sm-10">
                                            <input type="checkbox">
                                            <small> Remember me</small> 
                                        </div>
                                    </div>
                                  </div>


                                 <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button disabled type="submit"  name="submit" value="submit" class="btn loginbtn login btn-primary btn-sm">
                                            Login </button>
                                    </div>
                                </div>



                                </form>
                            </div>


                             <div class="tab-pane" id="ForgotPass">
                                <form role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email1" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Submit</button>
                                    </div>
                                </div>
                                </form>
                            </div>


                            <div class="tab-pane" id="Registration">
                                 <form action="#" role="form" id="signupForm" method="post" class="validate form-horizontal" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label for="fname" class="col-sm-2 control-label">
                                        First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" />
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label for="lname" class="col-sm-2 control-label">
                                        Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Create Password" />
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Birthday</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select id="month" name="month" class="form-control">
                                                    <option disabled="" value="">Month</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select id="date" name="date" class="form-control">
                                                    <option disabled >Day</option>
                                                    <?php
                                                        for ($i=1; $i <= 31; $i++) { 
                                                            echo '<option value='.$i.' > '.$i.' </option>';
                                                        }
                                                     ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select id="year" name="year" class="form-control">
                                                    <option disabled>Year</option>
                                                   <?php
                                                        for ($i=2018; $i >= 1898; $i--) { 
                                                            echo '<option value='.$i.' > '.$i.' </option>';
                                                        }
                                                     ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button disabled type="submit"  name="submit" value="submit" class="btn signupbtn signup btn-primary btn-sm">
                                            Singup </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div id="OR" class="hidden-xs">
                            OR</div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                            <div class="col-md-12">
                                <h3>
                                    Sign in with</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group btn-group-justified">
                                    <a href="#" class="btn btn-primary">Facebook</a> 
                                    <a href="#" class="btn btn-danger">Google</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php isset($isFooter) &&  $isFooter == 1 ?  include(APPPATH.'views/include/footer_remaining.php') : ''; ?>

        
            
</div>    <!-- end: Wrapper -->

    <!-- Go to top button -->
    <a id="goToTop"><i class="fa fa-angle-up top-icon"></i><i class="fa fa-angle-up"></i></a>

<!--Plugins-->
 <script src="<?php echo base_url('assets/'); ?>js/plugins.js"></script>

<!--Template functions-->
 <script src="<?php echo base_url('assets/'); ?>js/functions.js"></script> 


    <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>js/plugins/revolution/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>js/plugins/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>js/plugins/revolution/css/navigation.css">

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery.toast.js"></script>

    <script type="text/javascript" src="<?php echo base_url('admin_assets/'); ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


    <script>
      $(function() {
        $('input[name="daterange"]').daterangepicker({
          opens: 'left'
        }, function(start, end, label) {
          console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
      });
      </script>


    <script type="text/javascript">
        var tpj = jQuery;

        var revapi30;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_30_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_30_1");
            } else {
                revapi30 = tpj("#rev_slider_30_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "js/plugins/revolution/js/",
                    sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 5000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "on",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 50,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "hermes",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 600,
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '<div class="tp-arr-allwrapper">   <div class="tp-arr-imgholder"></div>    <div class="tp-arr-titleholder">{{title}}</div> </div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 0
                            }
                        }
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [868, 768, 960, 720],
                    lazyType: "smart",
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        }); /*ready*/

    </script>

    <script type="text/javascript">
        
        $('a[data-toggle=modal][data-target]').click(function () {
            var target = $(this).attr('href');
            $('a[data-toggle=tab][href=' + target + ']').tab('show');
        })

    </script>


     <script>
          $().ready(function() {

            // validate signup form on keyup and submit
            $("#loginForm").validate({
              rules: {
                    username:     "required",
                    password:     "required"

              },
              messages: { 
                username: "Please enter username",
                password: "Please enter password"
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



             // validate signup form on keyup and submit
            $("#signupForm").validate({
              rules: {
                    fname:     "required",
                    lname:     "required",
                    email:     "required",
                    password:     "required",
                    month:     "required",
                    date:     "required",
                    year:     "required",

              },
              messages: { 
                fname: "Please enter first name",
                lname: "Please enter last name",
                email: "Please enter email id",
                password: "Please enter password",
                month: "Please select month",
                date: "Please select date",
                year: "Please select year",

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


    <script>
        $('input').on('blur keyup', function() {
            if ($("#signupForm").valid()) {
                $('.signup').prop('disabled', false);  
            } else {
                $('.signup').prop('disabled', 'disabled');
            }
        });

         $('input').on('blur keyup', function() {
            if ($("#loginForm").valid()) {
                $('.loginbtn').prop('disabled', false);  
            } else {
                $('.loginbtn').prop('disabled', 'disabled');
            }
        });

   </script>


    <script>
        $('#vat-member-state').on('change', function() {
         if($(this).val() != '')
            $('#vat_number').text($(this).val());
         else
            $('#vat_number').text('VAT Number');
        });
   </script>




    <script>

      $(function () {
        $('#loginForm').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?php echo site_url('index.php/home/login'); ?>',
            data: $('#loginForm').serialize(),
            success: function (result) {
                var obj = jQuery.parseJSON( result);
                if(obj.status == false){
                     errorToast(obj.msg);
                }else{
                     SuccessToast(obj.msg)
                     setTimeout(function(){
                      location.reload();
                  }, 3000);
                     
               }
            }
          });

        });

      });




      $(function () {
        $('#signupForm').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?php echo site_url('index.php/home/signUp'); ?>',
            data: $('#signupForm').serialize(),
            success: function (result) {
                var obj = jQuery.parseJSON( result);
                if(obj.status == false){
                     errorToast(obj.msg);
                }else{
                     SuccessToast(obj.msg)
                     setTimeout(function(){
                        location.reload();
                  }, 3000);
                     
                }
            }
          });

        });

      });



     $(function () {
        $('.vat-number-verification-form').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?php echo base_url('userdashboard/addVatCard'); ?>',
            data: $('.vat-number-verification-form').serialize(),
            success: function (result) {
                var obj = jQuery.parseJSON( result);
                if(obj.status == false){
                     errorToast(obj.msg);
                }else{
                    $('.vat-number').text(obj.vat_number);
                    $('.add-vat-link').addClass('hide');
                    $('.vat-number-container').removeClass('hide');
                    SuccessToast(obj.msg);
               }
               $('#modal1').modal('toggle');
            }
          });

        });

      });
    </script>


    <script type="text/javascript">
        

      function normalToast(text){
        $.toast(text);
      }

     function informationToast(text){
        $.toast({
            heading: 'Information',
            text: text,
            showHideTransition: 'slide',
            icon: 'info'
        });
      }

     function errorToast(text){
        $.toast({
                heading: 'Error',
                text: text,
                showHideTransition: 'fade',
                icon: 'error'
            });
      }

     function WarningToast(text){
        $.toast({
                heading: 'Warning',
                text:text,
                showHideTransition: 'plain',
                icon: 'warning'
            });
      }

    function SuccessToast(text){
      $.toast({
            heading: 'Success',
            text: text,
            showHideTransition: 'slide',
            icon: 'success'
        });
    }

    </script>


    <script>
      $(".emergency_contact_trigger").click(function(){
          $( ".emergency_contact_popout" ).css( "display", "block" );
      });
    </script>

<!--     <script type="text/javascript">
      $(function() {
      jjoioio uouuhjh jhjhhj
      21132121 fg21212 2112f 21121 f12121 fg1221 f121212 fg1
      12121 fg212211 21122 gf212121 211212
        $('body').on('change', '#user_profile_pic', function(e){
          e.preventDefault();
           $.ajax({
               url:'<?php // echo base_url('userdashboard/addVatCard'); ?>',
               type:"post",
               data: $('#photoForm').serialize(),
               processData:true,
               contentType:true,
               cache:true,
               async:true,
                success: function(data){
                    alert(data);
             }
           });
        });
      });
    </script>
 -->
    <script type="text/javascript">
      
      $(".input-file").on("change",function(){
          var reg=/(.jpg|.gif|.png)$/;
          if (!reg.test($(".input-file").val())) {
              alert('Invalid File Type');
              return false;
          }
          uploadFile();
      });

    // $("#choose-photo").on("click",function(){
    //     $('.input-file').click();
    // });

    function uploadFile()
    {
        $("#upload").ajaxSubmit({
            dataType: 'json',
            success: function(data, statusText, xhr, wrapper){
               if(data.status == false){
                     errorToast(data.msg);
                }else{
                    $('#display-image').prop("src","<?php echo base_url('uploads/userImage/'); ?>"+data.img);
                    SuccessToast(data.msg);
               }

            }
        });
    }

    </script>


    <script type="text/javascript">
      $(document).ready(function() {
          // Configure/customize these variables.
          var showChar = 500;  // How many characters are shown by default
          var ellipsestext = "...";
          var moretext = "Read more about the space >";
          var lesstext = "Hide";
          

          $('.more').each(function() {
              var content = $(this).html();
       
              if(content.length > showChar) {
       
                  var c = content.substr(0, showChar);
                  var h = content.substr(showChar, content.length - showChar);
       
                  var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
       
                  $(this).html(html);
              }
       
          });
       
          $(".morelink").click(function(){
              if($(this).hasClass("less")) {
                  $(this).removeClass("less");
                  $(this).html(moretext);
              } else {
                  $(this).addClass("less");
                  $(this).html(lesstext);
              }
              $(this).parent().prev().toggle();
              $(this).prev().toggle();
              return false;
          });
      });
</script>


    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script type="text/javascript">
      $('#google-map-multiple').gMap({
       address: 'Australia',
       maptype: 'ROADMAP',
       zoom: 3,
       markers: [
        {
          address: "Melbourne, Australia",
          html: "Melbourne, Australia"
        },
        {
          address: "Sydney, Australia",
          html: "Sydney, Australia"
        },
        {
          address: "Perth, Australia",
          html: "Perth, Australia"
        }
       ],
       doubleclickzoom: false,
       controls: {
         panControl: true,
         zoomControl: true,
         mapTypeControl: false,
         scaleControl: false,
         streetViewControl: false,
         overviewMapControl: false
      }
    });
      </script>


      <script type="text/javascript">
        
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dp1').datepicker({

          beforeShowDay: function(date) {
            return date.valueOf() >= now.valueOf();
          },
          autoclose: true

        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.datepicker("getDate").valueOf() || !checkout.datepicker("getDate").valueOf()) {

            var newDate = new Date(ev.date);
            newDate.setDate(newDate.getDate() + 1);
            checkout.datepicker("update", newDate);

          }
          $('#dp2')[0].focus();
        });


        var checkout = $('#dp2').datepicker({
          beforeShowDay: function(date) {
            if (!checkin.datepicker("getDate").valueOf()) {
              return date.valueOf() >= new Date().valueOf();
            } else {
              return date.valueOf() > checkin.datepicker("getDate").valueOf();
            }
          },
          autoclose: true

        }).on('changeDate', function(ev) {});



      </script>



</body>
</html>