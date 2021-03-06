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
                        <li><a href="#">Favourite item</a>
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
                        <li class="active"><a href="#">Favourite Item</a></li>
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

                  <?php // print_r($allfav); ?>
                  

                <div class="hr-title hr-long center"><abbr>All favourite item's</abbr> </div>
                      <div class="table-responsive">
                        <table class="table table-striped">

                          <thead>
                            <tr>
                              <th>#</th>
                              <th>item Name</th>
                              <th>Image</th>
                              <th>Category</th>
                              <th>Colour</th>
                              <th>Size</th>
                             <!--  <th>Price</th> -->
                              <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php if(!empty($allfav)){
                              $i = 1;
                           foreach ($allfav as $key => $value) {
                            ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><a href="<?php echo base_url('home/product_detail/').$value->itemId; ?>"><?php echo $value->name; ?></a></td>
                              <td><img width="100px" alt="Shop product image!" src="<?php echo base_url('uploads/itemImage/').$value->image; ?>"></td>
                              <td><?php echo $value->categoryName; ?></td>
                              <td><?php echo $value->colour; ?></td>
                              <td><?php echo $value->size; ?></td>
                              <!-- <td><i class="fa fa-gbp" aria-hidden="true"></i><?php echo $value->price; ?></td> -->
                              <td><button  onclick="removefav(<?php echo $value->itemId; ?>)" type="button" class="btn btn-outline"><i class="fa fa-trash"></i></button></td>
                            </tr>
                            <?php $i++; } }else{ ?>
                            <tr> <td colspan="8">You haven't added any favourites items yet. Browse and select and they will appear here!</td> </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                  </div>
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


    <script type="text/javascript">
      function removefav (itemId){
        bootbox.confirm('Do you really want to remove from favourite list?', function(result){ 
            if(result){
              var URL = "<?php echo site_url('userdashboard/removefav'); ?>";
              $.ajax({
                url: URL,
                data: {"itemId" : itemId},
                dataType:"json",
                type: "post",
                success: function(data){
                  location.reload();          
                }
             });
            }
          });
        }
  </script>

        <!-- end: Content -->

        
