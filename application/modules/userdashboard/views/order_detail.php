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
                        <li><a href="#">Order preview</a>
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
                        <li class="active"><a href="<?php echo base_url('userdashboard/order'); ?>">Order History</a></li>
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
                  

                <div class="hr-title hr-long center"><abbr>Your Orders</abbr> </div>
                      <div class="table-responsive">
                        <table class="table table-striped">

                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Order ID</th>
                              <th>Transactiom ID</th>
                              <th>Payment Gross</th>
                              <th>Email</th>
                              <th>Payment Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php if(!empty($order)){
                              $i = 1;
                           foreach ($order as $key => $value) {
                            ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $value->order_id; ?></td>
                              <td><?php echo $value->txn_id; ?></td>
                              <td><i class="fa fa-gbp" aria-hidden="true"></i><?php echo $value->payment_gross; ?></td>
                              <td><?php echo $value->payer_email; ?></td>
                              <td><?php echo isset($value->payment_status) && $value->payment_status == 1 ? 'Success' : 'Pending'; ?></td>
                              <td> <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#demo-1" data-paragraphs="<?php echo $value->order_id; ?>"><i class="fa fa-eye"></i></button></td>
                            </tr>
                            <?php $i++; } }else{ ?>
                            <tr> <td colspan="6">No orders found - time to swap!</td> </tr>
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

  <style type="text/css">
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
  </style>


 <!-- [ Modal #2 ] -->
  <div class="modal fade" id="demo-2" tabindex="-1">
    <div class="modal-dialog">
     <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title caps"><strong>Feedback</strong></h4>
      </div>
       
      <div class="modal-body">

      <div id="data-here">
        
      </div>

      <form action="<?php echo site_url('userdashboard/givefeedback'); ?>" role="form" id="givefeedback" method="post" class="validate form-horizontal" enctype="multipart/form-data">

         <div class="form-group">
          <label class="">Rating</label>
          <div class="input-group">
    <fieldset class="rating">

        <input type="radio" id="star5" name="rating" value="5" />
        <label class = "full" for="star5" title="Awesome - 5 stars"></label>

        <input type="radio" id="star4" name="rating" value="4" />
        <label class = "full" for="star4" title="Pretty good - 4 stars"></label>


        <input type="radio" id="star3" name="rating" value="3" />
        <label class = "full" for="star3" title="Meh - 3 stars"></label>

        <input type="radio" id="star2" name="rating" value="2" />
        <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>


        <input type="radio" id="star1" name="rating" value="1" />
        <label class = "full" for="star1" title="Sucks big time - 1 star"></label>

    </fieldset>
          </div>
        </div>




        <div class="form-group">
        <label class="">Review</label>
          <div class="input-group col-md-12">
            <textarea class="form-control" id="review" name="review"></textarea>
         </div>
        </div>



        <input type="hidden" name="itemId" id="itemId">
        <input type="hidden" name="orderIdReview" id="orderIdReview">

        
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="submit" value="submit">Submit</button></span>
          </div>
        </div>

      </form>
      </div>
       <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
     </div>
    </div>
  </div>



  <!-- Taken from Bootstrap's documentation -->
 <div class="modal fade" id="demo-1" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Order Detail</h4>
      </div>
     
           <div class="table-responsive">
              <table class="table table-striped">
                      <thead>
                           <tr>
                              <th>#</th>
                              <th>item Name</th>
                              <th>Image</th>
                              <th>Colour</th>
                              <th>Size</th>
                              <th>Delivery Cost</th>
                              <th>Feedback</th>
                            </tr>
                          </thead>

                          <tbody  class="modal-body">
                             <tr> <td>Loading....</td> </tr>
                          </tbody>
                        </table>
                  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

  <script type="text/javascript">
    var $modal = $('#demo-1');
    // Show loader & then get content when modal is shown
    $modal.on('show.bs.modal', function(e) {
    var order_id = $(e.relatedTarget).data('paragraphs');
    $('#orderIdReview').val(order_id);
    $(this)
      .addClass('modal-scrollfix')
      .find('.modal-body')
      .html('loading...')
      .load('<?php echo site_url('userdashboard/order_detail/'); ?>' + order_id, function() {
        // Use Bootstrap's built-in function to fix scrolling (to no avail)
        $modal
          .removeClass('modal-scrollfix')
          .modal('handleUpdate');
      });
   });
  </script>


   <script type="text/javascript">
    var $modal = $('#demo-2');
    // Show loader & then get content when modal is shown
    $modal.on('show.bs.modal', function(e) {
    var item_id = $(e.relatedTarget).data('paragraphs');
    $('#itemId').val(item_id);
    $(this)
      .addClass('modal-scrollfix')
      .find('#data-here')
      .html('loading...')
      .load('<?php echo site_url('userdashboard/itemdetail/'); ?>' + item_id, function() {
        // Use Bootstrap's built-in function to fix scrolling (to no avail)
        $modal
          .removeClass('modal-scrollfix')
          .modal('handleUpdate');
      });
   });
  </script>

 <!-- end: Content -->

        
