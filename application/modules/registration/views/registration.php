 <section id="page-title" data-parallax-image="images/parallax/5.jpg">

	<div class="container">

		<div class="page-title">

			<h1>User Register</h1>

			<span>User register page</span>

		</div>

		<div class="breadcrumb">

					<ul>

				<li><a href="#">Home</a>

				</li>

				<li><a href="#">Pages</a>

				</li>

				<li class="active"><a href="#">User Register</a>

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



			<div class="col-md-8 center no-padding">

						<div class="col-md-12">

							<h3>Register New Account</h3>

						<p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p></div>



						





                         <form action="<?php echo site_url('registration/signUp'); ?>" role="form" id="registration" method="post" class="validate form-horizontal" enctype="multipart/form-data">



						<div class="col-md-6 form-group">
							<label class="">Full Name</label>
							<input type="text" class="form-control input-lg" placeholder="Full Name" value="" name="fullName" id="fullName">
							<?php echo form_error('fullName'); ?>
						</div>


						<div class="col-md-6 form-group">
							<label class="">Email Address</label>
							<input type="text" class="form-control input-lg" placeholder="Email Address" name="email" id="email">
							<?php echo form_error('email'); ?>
						</div>



						<div class="col-md-6 form-group">
							<label class="">Mobile No.</label>
							<input type="text" class="form-control input-lg" placeholder="Mobile No." name="mobile" id="mobile">
							<?php echo form_error('mobile'); ?>
						</div>



						<div class="col-md-6 form-group">
  							<label class="">Password</label>
						    <input type="password" class="form-control input-lg" placeholder="Password" name="password" id="password">
							<?php echo form_error('password'); ?>
						</div>

						<div class="col-md-12 form-group">
			              <label>Paypal Id</label>
			              <input type="text" class="form-control input-lg" name="paypal_id" id="paypal_id" placeholder="Paypal Id">
			              <?php echo form_error('paypal_id'); ?>
			            </div>

						<div class="col-md-12 form-group">
			              <label>Address</label>
			              <input type="text" class="form-control input-lg" name="address" id="autocomplete" onFocus="geolocate()" placeholder="Address">
			            </div>


			              <div class="col-md-6 form-group">
			                <label>City</label>
			                <input type="text" class="form-control input-lg" placeholder="City" name="city" id="locality">
			                <?php echo form_error('city'); ?>
			              </div>

			             <div class="col-md-6 form-group">
			              <label>State</label>
			              <input type="text" class="form-control input-lg" placeholder="State" name="state" id="administrative_area_level_1">
			              <?php echo form_error('state'); ?>
			            </div>


			             <div class="col-md-6 form-group">
			                <label>Country</label>
			                <input type="text" class="form-control input-lg" placeholder="Country" name="country" id="country">
			                <?php echo form_error('country'); ?>
			              </div>


			           <div class="col-md-6 form-group">
			              <label>Postcode Code</label>
			              <input type="text" class="form-control input-lg" placeholder="Postcode Code" name="post_code" id="postal_code">
			              <?php echo form_error('post_code'); ?>
			            </div>


            			   <table id="address" style="display: none">
      <tr>
        <td class="label">Street address</td>
        <td class="slimField"><input class="field" id="street_number"
              disabled="true"></input></td>
        <td class="wideField" colspan="2"><input class="field" id="route"
              disabled="true"></input></td>
      </tr>
     
      
    </table>



						<div class="col-md-12 form-group">

							<label class="">Select the types of items you are interested in</label>

							<select class="form-control" name="categoryId[]" id="categoryId" multiple>

							<?php if(!empty($allcat)) {

                                          foreach ($allcat as $key => $value) {

                                          ?>

                                          <option  value="<?php echo $value->categoryId; ?>"><a href=""><?php echo $value->categoryName; ?> </a></option>

                                  <?php } } ?>

							</select>

						</div>



						<div class="col-md-12 form-group">

							<label class="">Write bio</label>

							<textarea class="form-control input-lg" name="bio" id="bio" placeholder="Write bio"></textarea>

						</div>



						<div class="col-md-12 form-group">

							<label class="">Contact preferences</label>

							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="checkbox">
									  <label class="firstcaps"><input type="checkbox" name="marketing_pre[]" id="marketing_pre" value="1">Sign me up for exclusive Babyeo offers and advice by email, post and text.</label>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="checkbox">
									  <label class="firstcaps"><input type="checkbox" name="marketing_pre[]" id="marketing_pre" value="2">Yes, please send me updates by mail, post and text from selected Babyeo partners</label>
									</div>
								</div>
							</div>

						</div>



						<div class="col-md-12 form-group">

							<label class="">How did you hear about us?</label>

							<div class="form-group">
							  <select class="form-control" id="hear_about_us" name="hear_about_us" onchange="onSelectChange()">
							    <option>How did you hear about us</option>
							    <option>Google</option>
							    <option>Baby Forum</option>
							    <option>Facebook</option>
							    <option>Twitter</option>
							    <option>Instagram</option>
							    <option>Bing</option>
							    <option>Other</option>
							  </select>
							</div>
							<div class="form-group show_on_other_click">
							  <input type="text" class="form-control" id="other" name="other" placeholder="Text here">
							</div>
						</div>
						 <div class="col-md-12 form-group">
						 	<div class="checkbox">
							  <label class="firstcaps"><input type="checkbox" name="terms" id="terms">I certify that I have read and agree to the Babyeo Terms Of services and privacy policy</label>
							</div>
							<button type="submit" name="submit" value="submit" class="btn btn-default">Register New Account</button><button class="btn btn-danger m-l-10" type="button">Cancel</button>

					     </div>

						</form>

				</div>



		</div>

	</div>

</section>







        <script>

          $().ready(function() {



            // validate signup form on keyup and submit

            $("#registration").validate({

              rules: {

                    fullName:     "required",

                    email:        "required",

                    paypal_id:        "required",

                    mobile:       "required",

                    password:     "required",

                    address:      "required",

                    locality:      "required",
                    administrative_area_level_1:      "required",
                    country:      "required",
                    postal_code:      "required",

                    categoryId:   "required",

                    terms:   "required"



              },

              messages: { 

                fullName: "Please enter collective full name",

                email: "Please enter email address",

                paypal_id: "Please enter your paypal account id",

                mobile: "Please enter mobile number",

                password: "Please enter password",

                address: "Please enter address",

                locality:      "Please enter city",
                administrative_area_level_1:      "Please enter state",
                country:      "Please enter country",
                postal_code:      "Please enter post code",



                categoryId: "Select Category",

                terms: "Select aggree with terms & condition"



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
	
	    function onSelectChange(){
		    var sel = document.getElementById('hear_about_us');
		    var strUser = sel.options[sel.selectedIndex].text;  //getting the selected option's text

		    if(strUser == 'Other'){ 
		         $(".show_on_other_click").show();  //enabling the text box because user selected 'Other' option.
		    }else{
		    	$(".show_on_other_click").hide();
		    }
		}

	</script>

	<script type="text/javascript">
		 $(document).ready(function() { 


		 	$("#categoryId").select2({
			    placeholder: "Select category",
			    allowClear: true
			});


		 });
	</script>

	    <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCK2jIFCUH381yKuvm31bGd1BVWpHdcHas&libraries=places&callback=initAutocomplete"
        async defer></script>

<!-- end: Section