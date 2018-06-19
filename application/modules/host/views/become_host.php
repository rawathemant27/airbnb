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
                      <div class="col-md-7 landing__left-col fast-animation">
                        <div class="landing__left-col-content">
                          <div class="space-5">
                            <h3 class="landing__title-title">
                              <span>Hi, Hemant! Let’s get started listing your space.</span>
                            </h3>
                          </div>
                          <div class="landing__step-content landing__wmpw-controls">
                            <strong class="landing__step-number space-1 text-base text-branding text-light-gray">
                              <span>Step 1</span>
                            </strong>
                            <div class="h3 landing__step-content-title space-3">
                              <span>What kind of place do you have?</span>
                            </div>

                            <form data-prevent-default="true">
                              <div>
                                <div>
                                  <div class="row row-condensed">
                                    <div class="col-md-6 col-sm-12 space-1">
                                      <div class="select select-block">
                                        <select name="room_type">
                                          <option selected="" value="entire_home">Entire place</option>
                                          <option value="private_room">Private room</option>
                                          <option value="shared_room">Shared room</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12 space-1">
                                      <div class="select select-block">
                                        <select name="person_capacity">
                                          <option value="1">for 1 guest</option>
                                          <option value="2">for 2 guests</option>
                                          <option value="3">for 3 guests</option>
                                          <option selected="" value="4">for 4 guests</option>
                                          <option value="5">for 5 guests</option>
                                          <option value="6">for 6 guests</option>
                                          <option value="7">for 7 guests</option>
                                          <option value="8">for 8 guests</option>
                                          <option value="9">for 9 guests</option>
                                          <option value="10">for 10 guests</option>
                                          <option value="11">for 11 guests</option>
                                          <option value="12">for 12 guests</option>
                                          <option value="13">for 13 guests</option>
                                          <option value="14">for 14 guests</option>
                                          <option value="15">for 15 guests</option>
                                          <option value="16">for 16 guests</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row row-condensed space-1" style="margin-top: 20px">
                                    <div class="col-sm-12">
                                      <input type="text" class="list-space-location-input pull-left form-control" name="address" id="autocomplete" onFocus="geolocate()" placeholder="Enter a location" autocomplete="off">
                                    </div>
                                  </div>                   

                                </div>
                              </div>
                            </form>

                            <div style="margin-top:12px;margin-bottom:28px">
                              <a href="<?php echo base_url('host/room'); ?>" class="btn btn-default" aria-busy="false">
                                <span class="_l8z70zb">
                                  <span>Continue</span>
                                </span>
                              </a>
                            </div>
                            <div class="row row-condensed">
                              <div class="col-lg-6">
                                <div class="panel">
                                  <div class="panel-body">
                                    <div class="help-panel__bulb-img space-2">
                                      
                                    </div>
                                    <div>
                                      <div>
                                        <span>Listing for a month, we think you could earn</span> 
                                        
                                          <div class="_z9iywok">₹36,411</div>
                                        <div class="_1c2cbn7k">
                                          <div class="_jx9fdbv" role="presentation">
                                            <div role="button" tabindex="-1" aria-expanded="false">
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <span>
                          
                        </span>
                      </div>
                    </div>
                    
                </div>
            </div>
        </section>




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




        <!-- end: Shop products -->
