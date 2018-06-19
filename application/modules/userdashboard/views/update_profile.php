 <!-- Page title -->
        <section id="page-title" data-parallax-image="images/parallax/5.jpg">
            <div class="container">
               
            </div>
        </section>
        <!-- end: Page title -->

        <!-- Shop products -->
        <section id="page-content" class="sidebar-left">
            <div class="container">

                <?php if ($this->session->flashdata('success')) { 
                     echo getMessage('success', $this->session->flashdata('success'));
                 }  if ($this->session->flashdata('error')) { 
                     echo  getMessage('error', $this->session->flashdata('error'));
                 }  if ($this->session->flashdata('info')) { 
                     echo  getMessage('info', $this->session->flashdata('info'));
                 }?>
                         
                <div class="row">
                    <!-- Content-->
                <div class="content col-md-9">

                <!-- start col-md-12 -->
                <div class="col-md-12">

              

             <form action="<?php echo site_url('userdashboard/updateProfile'); ?>" role="form" id="registration" method="post" class="validate form-horizontal" enctype="multipart/form-data">

              <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']; ?>">


                     <div class="panel">
                      <div class="panel-header">
                        <h4 class="edit-profile-section-heading">
                            Required
                        </h4>
                      </div>
                      <div class="panel-body">

                         <div class="col-md-6 form-group">
                <label >First Name</label>
                <input type="text" class="form-control input-lg" placeholder="First Name" value="<?php echo $userdata->fname; ?>" name="fName" id="fName">
                <?php echo form_error('fName'); ?>
              </div>

               <div class="col-md-6 form-group">
                <label >Last Name</label>
                <input type="text" class="form-control input-lg" placeholder="Last Name" value="<?php echo $userdata->lname; ?>" name="lName" id="lName">
                <?php echo form_error('lName'); ?>
              </div>

              <div class="col-md-12 form-group">
                <p>Your public profile only shows your first name. When you request a booking, your host will see your first and last name.</p>
              </div>

            <div class="col-md-10 form-group">
             <label> I Am  </label>
              <select name="gender" id="gender">

                <option disabled >Gender</option>

                <option <?php echo isset($userdata->gender) && $userdata->gender == 'Male' ? 'selected' : ''; ?> value="Male" >Male</option>

                <option <?php echo isset($userdata->gender) && $userdata->gender == 'Female' ? 'selected' : ''; ?> value="Female" >Female</option>

                <option <?php echo isset($userdata->gender) && $userdata->gender == 'Other' ? 'selected' : ''; ?> value="Other" >Other</option>
               </select>
                <?php echo form_error('gender'); ?>
            </div>

              <div class="col-md-12 form-group">
                <p>We use this data for analysis and never share it with other users.</p>
              </div>




            <?php 
               $dob = explode("-", $userdata->dob);
            ?>

            <div class="col-md-4 form-group">
            <label> Date of birth   </label>
              <select name="day" id="day">
               <option value="">Select day</option>
                 <?php $selected = ''; for ($i=1; $i <= 31 ; $i++) { 
                     $selected = isset($dob[2]) && $dob[2] == $i ? 'selected' : '';
                     echo '<option '.$selected.' >'.$i.'</option>';
                     $selected = '';
                 } ?>
               </select>
                <?php echo form_error('day'); ?>
            </div>



            <div class="col-md-4 form-group dobMonth" style="margin-top: 27px;">
              <label> <span></span>  </label>
              <select name="month" id="month">
                <option disabled="" value="">Month</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 1 ? 'selected' : ''; ?>  value="1">January</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 2 ? 'selected' : ''; ?> value="2">February</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 3 ? 'selected' : ''; ?> value="3">March</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 4 ? 'selected' : ''; ?> value="4">April</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 5 ? 'selected' : ''; ?> value="5">May</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 6 ? 'selected' : ''; ?> value="6">June</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 7 ? 'selected' : ''; ?> value="7">July</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 8 ? 'selected' : ''; ?> value="8">August</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 9 ? 'selected' : ''; ?> value="9">September</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 10 ? 'selected' : ''; ?> value="10">October</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 11 ? 'selected' : ''; ?> value="11">November</option>
                <option <?php echo isset($dob[1]) && $dob[1] == 12 ? 'selected' : ''; ?> value="12">December</option>
                <?php echo form_error('month'); ?>
              </select>
            </div>


             <div class="col-md-4 form-group dobYear" style="margin-top: 27px;">
              <label>   </label>
              <select name="year" id="year">
               <option disabled>Select year</option>
                 <?php  $selected = '';
                   for($i=2018; $i >= 1898; $i--) {  
                     $selected = isset($dob[0]) && $dob[0] == $i ? 'selected' : '';
                     echo '<option '.$selected.' >'.$i.'</option>';
                  } 
                 ?>
               </select>
                <?php echo form_error('year'); ?>
            </div>

            <div class="col-md-12 form-group">
                <p>The magical day you were dropped from the sky by a stork. We use this data for analysis and never share it with other users.</p>
              </div>




            <div class="col-md-12 form-group">
              <label>Email Address</label>
              <input type="text" class="form-control input-lg" placeholder="Email Address" name="email" id="email" value="<?php echo $userdata->email; ?>">
              <?php echo form_error('email'); ?>
            </div>

             <div class="col-md-12 form-group">
                <p>We won’t share your private email address with other Airbnb users. Learn more.</p>
            </div>



            <div class="col-md-6 form-group">
              <label>Phone Number</label>
              <input type="text" class="form-control input-lg" placeholder="Mobile No." name="mobile" id="mobile"  value="<?php echo $userdata->phone; ?>">
              <?php echo form_error('mobile'); ?>
            </div>

            <div class="col-md-12 form-group">
                <p>This is only shared once you have a confirmed booking with another Airbnb user. This is how we can all get in touch.</p>
            </div>

          
             <div class="col-md-4 form-group dobMonth" style="margin-top: 27px;">
              <label> <span></span>  </label>
              <select name="preferred_language" id="preferred_language">
               <option value="">Preferred Language</option>
                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'ms' ? 'selected' : ''; ?> value="ms">Bahasa Melayu</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'ca' ? 'selected' : ''; ?> value="ca">Català</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'id' ? 'selected' : ''; ?> value="id">Bahasa Indonesia</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'da' ? 'selected' : ''; ?> value="da">Dansk</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'de' ? 'selected' : ''; ?> value="de">Deutsch</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'en' ? 'selected' : ''; ?> value="en" >English</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'es' ? 'selected' : ''; ?>  value="es">Español</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'el' ? 'selected' : ''; ?>  value="el">Eλληνικά</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'fr' ? 'selected' : ''; ?>  value="fr">Français</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'hr' ? 'selected' : ''; ?>  value="hr">Hrvatski</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'it' ? 'selected' : ''; ?>  value="it">Italiano</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'hu' ? 'selected' : ''; ?>  value="hu">Magyar</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'nl' ? 'selected' : ''; ?>  value="nl">Nederlands</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'no' ? 'selected' : ''; ?>  value="no">Norsk</option>

                <option <?php echo isset($userdata->preferred_language) && $userdata->preferred_language == 'pl' ? 'selected' : ''; ?>  value="pl">Polski</option>
               </select>
                <?php echo form_error('preferred_language'); ?>
            </div>

            <div class="col-md-12 form-group">
                <p>We'll send you messages in this language.</p>
            </div>

            

             <div class="col-md-4 form-group dobMonth" style="margin-top: 27px;">
              <label> <span></span>  </label>
              <select name="preferred_currency" id="preferred_currency">
                <option disabled >Preferred Currency</option>
                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'ARS' ? 'selected' : ''; ?> value="ARS">Argentine peso</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'AUD' ? 'selected' : ''; ?> value="AUD">Australian dollar</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'BRL' ? 'selected' : ''; ?> value="BRL">Brazilian real</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'BGN' ? 'selected' : ''; ?> value="BGN">Bulgarian lev</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'CAD' ? 'selected' : ''; ?> value="CAD">Canadian dollar</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'CLP' ? 'selected' : ''; ?> value="CLP">Chilean peso</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'CNY' ? 'selected' : ''; ?> value="CNY">Chinese yuan</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'COP' ? 'selected' : ''; ?> value="COP">Colombian peso</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'CRC' ? 'selected' : ''; ?> value="CRC">Costa Rican colon</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'HRK' ? 'selected' : ''; ?> value="HRK">Croatian kuna</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'CZK' ? 'selected' : ''; ?> value="CZK">Czech koruna</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'DKK' ? 'selected' : ''; ?> value="DKK">Danish krone</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'AED' ? 'selected' : ''; ?> value="AED">Emirati dirham</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'EUR' ? 'selected' : ''; ?> value="EUR">Euro</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'HKD' ? 'selected' : ''; ?> value="HKD">Hong Kong dollar</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'HUF' ? 'selected' : ''; ?> value="HUF">Hungarian forint</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'INR' ? 'selected' : ''; ?> value="INR">Indian rupee</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'ILS' ? 'selected' : ''; ?> value="ILS">Israeli new shekel</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'JPY' ? 'selected' : ''; ?> value="JPY">Japanese yen</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'MYR' ? 'selected' : ''; ?> value="MYR">Malaysian ringgit</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'MXN' ? 'selected' : ''; ?> value="MXN">Mexican peso</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'MAD' ? 'selected' : ''; ?> value="MAD">Moroccan dirham</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'TWD' ? 'selected' : ''; ?> value="TWD">New Taiwan dollar</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'NZD' ? 'selected' : ''; ?> value="NZD">New Zealand dollar</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'NOK' ? 'selected' : ''; ?> value="NOK">Norwegian krone</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'PEN' ? 'selected' : ''; ?> value="PEN">Peruvian sol</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'PHP' ? 'selected' : ''; ?> value="PHP">Philippine peso</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'PLN' ? 'selected' : ''; ?> value="PLN">Polish zloty</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'GBP' ? 'selected' : ''; ?> value="GBP">Pound sterling</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'RON' ? 'selected' : ''; ?> value="RON">Romanian leu</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'RUB' ? 'selected' : ''; ?> value="RUB">Russian ruble</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'SAR' ? 'selected' : ''; ?> value="SAR">Saudi Arabian riyal</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'SGD' ? 'selected' : ''; ?> value="SGD">Singapore dollar</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'ZAR' ? 'selected' : ''; ?> value="ZAR">South African rand</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'KRW' ? 'selected' : ''; ?> value="KRW">South Korean won</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'SEK' ? 'selected' : ''; ?> value="SEK">Swedish krona</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'CHF' ? 'selected' : ''; ?> value="CHF">Swiss franc</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'THB' ? 'selected' : ''; ?> value="THB">Thai baht</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'TRY' ? 'selected' : ''; ?> value="TRY">Turkish lira</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'USD' ? 'selected' : ''; ?> value="USD">United States dollar</option>

                <option <?php echo isset($userdata->preferred_currency) && $userdata->preferred_currency == 'UYU' ? 'selected' : ''; ?> value="UYU">Uruguayan peso</option>

               </select>
                <?php echo form_error('preferred_currency'); ?>
            </div>

            <div class="col-md-12 form-group">
                <p>We'll send you messages in this language.</p>
            </div>



            <div class="col-md-12 form-group">
              <label>Where You Live</label>
              <input type="text" class="form-control input-lg" name="address" id="autocomplete" onFocus="geolocate()" placeholder="Address" value="<?php echo $userdata->address; ?>">
            </div>


              <div class="col-md-12 form-group">
                <label>Describe Yourself</label>

                <textarea class="form-control required" name="about_yourself" rows="9" placeholder="Enter comment" id="comment" aria-required="true"><?php echo $userdata->about_yourself; ?></textarea>
                <?php echo form_error('city'); ?>
              </div>

               <div class="col-md-12 form-group">
                <p>Airbnb is built on relationships. Help other people get to know you.

                  Tell them about the things you like: What are 5 things you can’t live without? Share your favorite travel destinations, books, movies, shows, music, food.

                  Tell them what it’s like to have you as a guest or host: What’s your style of traveling? Of Airbnb hosting?

                  Tell them about you: Do you have a life motto?</p>
            </div>

                      </div>
                    </div>


           

            

                 <div class="panel">
                  <div class="panel-header">
                    <h4 class="edit-profile-section-heading">
                        Optional
                    </h4>
                  </div>
                  <div class="panel-body">

                   
              <div class="col-md-12 form-group">
                <label >School</label>
                <input type="text" class="form-control input-lg" placeholder="School" value="<?php echo $userdata->school; ?>" name="school" id="school">
                <?php echo form_error('school'); ?>
              </div>

               <div class="col-md-12 form-group">
                <label >Work</label>
                <input type="text" class="form-control input-lg" placeholder="company name or job title" value="<?php echo $userdata->work; ?>" name="work" id="work">
                <?php echo form_error('work'); ?>
              </div>

              <div class="col-md-4 form-group dobMonth">
              <label> Time Zone </label>
              
              <select id="time_zone" name="time_zone">
                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 1 ? 'selected' : ''; ?> value="1">(GMT-11:00) International Date Line West</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 2 ? 'selected' : ''; ?> value="2" >(GMT-11:00) Midway Island</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 3 ? 'selected' : ''; ?> value="3">(GMT-11:00) Samoa</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 4 ? 'selected' : ''; ?> value="4">(GMT-10:00) Hawaii</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 5 ? 'selected' : ''; ?> value="5">(GMT-09:00) Alaska</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 6 ? 'selected' : ''; ?> value="6" >(GMT-08:00) Pacific Time (US &amp; Canada)</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 7 ? 'selected' : ''; ?> value="7" >(GMT-08:00) Tijuana</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 8 ? 'selected' : ''; ?> value="8" >(GMT-07:00) Arizona</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 9 ? 'selected' : ''; ?> value="9">(GMT-07:00) Chihuahua</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 10 ? 'selected' : ''; ?> value="10" >(GMT-07:00) Mazatlan</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 11 ? 'selected' : ''; ?> value="11" >(GMT-07:00) Mountain Time (US &amp; Canada)</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 12 ? 'selected' : ''; ?> value="12" >(GMT-06:00) Central America</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 13 ? 'selected' : ''; ?> value="13" >(GMT-06:00) Central Time (US &amp; Canada)</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 14 ? 'selected' : ''; ?> value="14" >(GMT-06:00) Guadalajara</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 15 ? 'selected' : ''; ?> value="15" >(GMT-06:00) Mexico City</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 16 ? 'selected' : ''; ?> value="16">(GMT-06:00) Monterrey</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 17 ? 'selected' : ''; ?> value="17">(GMT-06:00) Saskatchewan</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 18 ? 'selected' : ''; ?> value="18" >(GMT-05:00) Bogota</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 19 ? 'selected' : ''; ?> value="19" >(GMT-05:00) Eastern Time (US &amp; Canada)</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 20 ? 'selected' : ''; ?> value="20" >(GMT-05:00) Indiana (East)</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 21 ? 'selected' : ''; ?> value="21" >(GMT-05:00) Lima</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 22 ? 'selected' : ''; ?> value="22" >(GMT-05:00) Quito</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 23 ? 'selected' : ''; ?> value="23" >(GMT-04:00) Atlantic Time (Canada)</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 24 ? 'selected' : ''; ?> value="24" >(GMT-04:00) Caracas</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 25 ? 'selected' : ''; ?> value="25" >(GMT-04:00) Georgetown</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 26 ? 'selected' : ''; ?> value="26" >(GMT-04:00) La Paz</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 27 ? 'selected' : ''; ?> value="27">(GMT-04:00) Santiago</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 28 ? 'selected' : ''; ?> value="28">(GMT-03:30) Newfoundland</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 29 ? 'selected' : ''; ?> value="29">(GMT-03:00) Brasilia</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 30 ? 'selected' : ''; ?> value="30">(GMT-03:00) Buenos Aires</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 31 ? 'selected' : ''; ?> value="31">(GMT-03:00) Greenland</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 32 ? 'selected' : ''; ?> value="32">(GMT-02:00) Mid-Atlantic</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 33 ? 'selected' : ''; ?> value="33">(GMT-01:00) Azores</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 34  ? 'selected' : ''; ?> value="34">(GMT-01:00) Cape Verde Is.</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 35  ? 'selected' : ''; ?> value="35">(GMT+00:00) Casablanca</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 36 ? 'selected' : ''; ?> value="36" >(GMT+00:00) Dublin</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 37 ? 'selected' : ''; ?> value="37" >(GMT+00:00) Edinburgh</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 38 ? 'selected' : ''; ?> value="38" >(GMT+00:00) Lisbon</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 39 ? 'selected' : ''; ?> value="39" >(GMT+00:00) London</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 40 ? 'selected' : ''; ?> value="40" >(GMT+00:00) Monrovia</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 41 ? 'selected' : ''; ?> value="41">(GMT+00:00) UTC</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 42 ? 'selected' : ''; ?> value="42">(GMT+01:00) Amsterdam</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 43  ? 'selected' : ''; ?> value="43">(GMT+01:00) Belgrade</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 44 ? 'selected' : ''; ?> value="44">(GMT+01:00) Berlin</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 45 ? 'selected' : ''; ?> value="45">(GMT+01:00) Bern</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 46  ? 'selected' : ''; ?> value="46">(GMT+01:00) Bratislava</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 47 ? 'selected' : ''; ?> value="47">(GMT+01:00) Brussels</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 48 ? 'selected' : ''; ?> value="48">(GMT+01:00) Budapest</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 49 ? 'selected' : ''; ?> value="49">(GMT+01:00) Copenhagen</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 50 ? 'selected' : ''; ?> value="50">(GMT+01:00) Ljubljana</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 51 ? 'selected' : ''; ?> value="51">(GMT+01:00) Madrid</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 52 ? 'selected' : ''; ?> value="52">(GMT+01:00) Paris</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 52 ? 'selected' : ''; ?> value="52">(GMT+01:00) Prague</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 53 ? 'selected' : ''; ?> value="53">(GMT+01:00) Rome</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 54 ? 'selected' : ''; ?> value="54">(GMT+01:00) Sarajevo</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 55 ? 'selected' : ''; ?> value="55">(GMT+01:00) Skopje</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 56 ? 'selected' : ''; ?> value="56">(GMT+01:00) Stockholm</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 57 ? 'selected' : ''; ?> value="57">(GMT+01:00) Vienna</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 58 ? 'selected' : ''; ?> value="58">(GMT+01:00) Warsaw</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 59 ? 'selected' : ''; ?> value="59">(GMT+01:00) West Central Africa</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 60 ? 'selected' : ''; ?> value="60">(GMT+01:00) Zagreb</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 61 ? 'selected' : ''; ?> value="61">(GMT+02:00) Athens</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 62 ? 'selected' : ''; ?> value="62">(GMT+02:00) Bucharest</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 63 ? 'selected' : ''; ?> value="63">(GMT+02:00) Cairo</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 64 ? 'selected' : ''; ?> value="64">(GMT+02:00) Harare</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 65 ? 'selected' : ''; ?> value="65">(GMT+02:00) Helsinki</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 66 ? 'selected' : ''; ?> value="66">(GMT+02:00) Jerusalem</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 67 ? 'selected' : ''; ?> value="67">(GMT+02:00) Kyiv</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 68 ? 'selected' : ''; ?> value="68">(GMT+02:00) Pretoria</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 69 ? 'selected' : ''; ?> value="69">(GMT+02:00) Riga</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 70 ? 'selected' : ''; ?> value="70" >(GMT+02:00) Sofia</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 71 ? 'selected' : ''; ?> value="71" >(GMT+02:00) Tallinn</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 72 ? 'selected' : ''; ?> value="72" >(GMT+02:00) Vilnius</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 73 ? 'selected' : ''; ?> value="73" >(GMT+03:00) Baghdad</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 74  ? 'selected' : ''; ?> value="74" >(GMT+03:00) Istanbul</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 75 ? 'selected' : ''; ?> value="75" >(GMT+03:00) Kuwait</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 76 ? 'selected' : ''; ?> value="76" >(GMT+03:00) Minsk</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 77 ? 'selected' : ''; ?> value="77" >(GMT+03:00) Moscow</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 78 ? 'selected' : ''; ?> value="78" >(GMT+03:00) Nairobi</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 79 ? 'selected' : ''; ?> value="79">(GMT+03:00) Riyadh</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 80 ? 'selected' : ''; ?> value="80" >(GMT+03:00) St. Petersburg</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 81 ? 'selected' : ''; ?> value="81">(GMT+03:00) Volgograd</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 82 ? 'selected' : ''; ?> value="82" >(GMT+03:30) Tehran</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 83 ? 'selected' : ''; ?> value="83" >(GMT+04:00) Abu Dhabi</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 84 ? 'selected' : ''; ?> value="84" >(GMT+04:00) Baku</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 85 ? 'selected' : ''; ?> value="85" >(GMT+04:00) Muscat</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 86 ? 'selected' : ''; ?> value="86" >(GMT+04:00) Tbilisi</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 87 ? 'selected' : ''; ?> value="87" >(GMT+04:00) Yerevan</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 88 ? 'selected' : ''; ?> value="88" >(GMT+04:30) Kabul</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 89 ? 'selected' : ''; ?> value="89" >(GMT+05:00) Ekaterinburg</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 90 ? 'selected' : ''; ?> value="90" >(GMT+05:00) Islamabad</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 91 ? 'selected' : ''; ?> value="91" >(GMT+05:00) Karachi</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 92 ? 'selected' : ''; ?> value="92" >(GMT+05:00) Tashkent</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 93 ? 'selected' : ''; ?> value="93" >(GMT+05:30) Chennai</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 94 ? 'selected' : ''; ?> value="94" >(GMT+05:30) Kolkata</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 95 ? 'selected' : ''; ?> value="95" >(GMT+05:30) Mumbai</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 96 ? 'selected' : ''; ?> value="96" >(GMT+05:30) New Delhi</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 97 ? 'selected' : ''; ?> value="97" >(GMT+05:30) Sri Jayawardenepura</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 98 ? 'selected' : ''; ?> value="98" >(GMT+05:45) Kathmandu</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 99 ? 'selected' : ''; ?> value="99" >(GMT+06:00) Almaty</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 100 ? 'selected' : ''; ?> value="100" >(GMT+06:00) Astana</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 101 ? 'selected' : ''; ?> value="101" >(GMT+06:00) Dhaka</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 102 ? 'selected' : ''; ?> value="102" >(GMT+06:00) Urumqi</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 103 ? 'selected' : ''; ?> value="103" >(GMT+06:30) Rangoon</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 104 ? 'selected' : ''; ?> value="104" >(GMT+07:00) Bangkok</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 105 ? 'selected' : ''; ?> value="105" >(GMT+07:00) Hanoi</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 106 ? 'selected' : ''; ?> value="106" >(GMT+07:00) Jakarta</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 107 ? 'selected' : ''; ?> value="107" >(GMT+07:00) Krasnoyarsk</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 108 ? 'selected' : ''; ?> value="108" >(GMT+07:00) Novosibirsk</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 109 ? 'selected' : ''; ?> value="109" >(GMT+08:00) Beijing</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 110 ? 'selected' : ''; ?> value="110" >(GMT+08:00) Chongqing</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 111 ? 'selected' : ''; ?> value="111" >(GMT+08:00) Hong Kong</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 112 ? 'selected' : ''; ?> value="112" >(GMT+08:00) Irkutsk</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 113 ? 'selected' : ''; ?> value="113" >(GMT+08:00) Kuala Lumpur</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 114 ? 'selected' : ''; ?> value="114" >(GMT+08:00) Perth</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 115 ? 'selected' : ''; ?> value="115" >(GMT+08:00) Singapore</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 116 ? 'selected' : ''; ?> value="116" >(GMT+08:00) Taipei</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 117 ? 'selected' : ''; ?> value="117" >(GMT+08:00) Ulaan Bataar</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 118 ? 'selected' : ''; ?> value="118"> (GMT+09:00) Osaka</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 119 ? 'selected' : ''; ?> value="119" >(GMT+09:00) Sapporo</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 120 ? 'selected' : ''; ?> value="120" >(GMT+09:00) Seoul</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 121 ? 'selected' : ''; ?> value="121" >(GMT+09:00) Tokyo</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 122 ? 'selected' : ''; ?> value="122" >(GMT+09:00) Yakutsk</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 123 ? 'selected' : ''; ?> value="123" >(GMT+09:30) Adelaide</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 124 ? 'selected' : ''; ?> value="124" >(GMT+09:30) Darwin</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 125 ? 'selected' : ''; ?> value="125" >(GMT+10:00) Brisbane</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 126 ? 'selected' : ''; ?> value="126" >(GMT+10:00) Canberra</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 127 ? 'selected' : ''; ?> value="127" >(GMT+10:00) Guam</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 128 ? 'selected' : ''; ?> value="128" >(GMT+10:00) Hobart</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 129 ? 'selected' : ''; ?> value="129" >(GMT+10:00) Melbourne</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 130 ? 'selected' : ''; ?> value="130" >(GMT+10:00) Port Moresby</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 131 ? 'selected' : ''; ?> value="131" >(GMT+10:00) Sydney</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 132 ? 'selected' : ''; ?> value="132" >(GMT+10:00) Vladivostok</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 133 ? 'selected' : ''; ?> value="133" >(GMT+11:00) Magadan</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 134 ? 'selected' : ''; ?> value="134" >(GMT+11:00) New Caledonia</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 135 ? 'selected' : ''; ?> value="135" >(GMT+11:00) Solomon Is.</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 136 ? 'selected' : ''; ?> value="136" >(GMT+12:00) Auckland</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 137 ? 'selected' : ''; ?> value="137" >(GMT+12:00) Fiji</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 138 ? 'selected' : ''; ?> value="138" >(GMT+12:00) Kamchatka</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 139 ? 'selected' : ''; ?> value="139" >(GMT+12:00) Marshall Is.</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 140 ? 'selected' : ''; ?> value="140" >(GMT+12:00) Wellington</option>

                  <option <?php echo isset($userdata->time_zone) && $userdata->time_zone == 141 ? 'selected' : ''; ?> value="141" >(GMT+13:00) Nuku'alofa</option>
                </select>

                <?php echo form_error('time_zone'); ?>
            </div>

            <div class="col-md-12 form-group">
                <p>Your home time zone.</p>
            </div>



              <!-- <div class="col-md-4 form-group dobMonth">
              <label> Languages </label>
              <select name="month" id="month">
               <option value="">Preferred Language</option>
                <option value="ms">Bahasa Melayu</option>
                <option value="ca">Català</option>
                <option value="id">Bahasa Indonesia</option><option value="da">Dansk</option>
                <option value="de">Deutsch</option>
                <option value="en" selected="selected">English</option>
                <option value="es">Español</option>
                <option value="el">Eλληνικά</option>
                <option value="fr">Français</option>
                <option value="hr">Hrvatski</option>
                <option value="it">Italiano</option>
                <option value="hu">Magyar</option>
                <option value="nl">Nederlands</option>
                <option value="no">Norsk</option>
                <option value="pl">Polski</option>
               </select>
                <?php echo form_error('month'); ?>
            </div>

            <div class="col-md-12 form-group">
                <p>Add any languages that others can use to speak with you on Airbnb</p>
            </div>
 -->



              <div class="col-md-12 form-group dobMonth">
                <label> VAT Number </label>
                <!-- <a class="btn" data-target="#modal1" data-toggle="modal" href="#">Medium Modal</a> -->

                <div class="vat-number-section space-top-1">
                  <a style="color: #008489;" href="#" class="add-vat-link" data-target="#modal1" data-toggle="modal">
                    <i class="icon icon-add"></i>
                    Add Vat ID Number
                  </a>


                   <div class="vat-number-container hide">
                    <table class="vat-number-display table table-bordered">
                      <tbody>
                        <tr>
                          <td class="vat-number text-center">
                          </td>
                          <td class="vat-status text-center ">
                            <i class="icon icon-verified"></i>
                            Not Verified
                          </td>
                          <td class="text-center">
                            <a href="#" class="delete-vat-link">
                              <span>Remove</span>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

              </div>

                    <p>For European Union users or users in other countries for which VAT applies, VAT will be assessed on our Service Fees. If you live in a country where we need to charge VAT, you will not be charged VAT if you enter a valid VAT ID Number. Visit VAT FAQs »</p>

              </div>

         

              <div class="col-md-12 form-group dobMonth">
                <label> Emergency Contact </label>
                <div class="vat-number-section space-top-1">
                  <a href="#" id="emergency_contact_edit" class="emergency_contact_trigger">
                    edit
                  </a>

              </div>
                    <p>Give our Customer Experience team a trusted contact we can alert in an urgent situation.</p>
                      <div id="emergency_contact_popout" style="display: none;">
                            <div class="row row-condensed space-4">
                        <label class="text-right col-sm-3" for="user_emergency_contact_name">
                          Name 
                        </label>
                        <div class="col-sm-9">
                          
                        <input id="user_emergency_contact_name" name="user_emergency_contact[name]" size="30" type="text" value="">

                          
                        </div>
                      </div>
                            <div class="row row-condensed space-4">
                        <label class="text-right col-sm-3" for="user_emergency_contact_phone">
                          Phone 
                        </label>
                        <div class="col-sm-9">
                          
                        <input id="user_emergency_contact_phone" name="user_emergency_contact[phone]" size="30" type="text" value="">

                          
                        </div>
                      </div>
                            <div class="row row-condensed space-4">
                        <label class="text-right col-sm-3" for="user_emergency_contact_email">
                          Email 
                        </label>
                        <div class="col-sm-9">
                          
                        <input id="user_emergency_contact_email" name="user_emergency_contact[email]" size="30" type="text" value="">

                          
                        </div>
                      </div>
                            <div class="row row-condensed space-4">
                        <label class="text-right col-sm-3" for="user_emergency_contact_relationship">
                          Relationship 
                        </label>
                        <div class="col-sm-9">
                          
                        <input id="user_emergency_contact_relationship" name="user_emergency_contact[relationship]" size="30" type="text" value="">

                          
                        </div>
                      </div>
                    </div>

              </div>


             <div class="col-md-12 form-group dobMonth">
                    <label> Shipping Address  </label>
                    <div class="vat-number-section space-top-1">
                        <a href="#" id="emergency_contact_edit" class="emergency_contact_trigger">
                           Add shipping address
                        </a>

                    </div>
                      <div id="emergency_contact_popout" style="display: none;">

                        <div class="shipping-address-form col-sm-9 pull-right text-left">
                          <div class="row row-condensed space-1">
                            <div class="col-md-6 col-sm-12">
                              <label for="shipping-address-country"><span>Country</span></label>
                               <div class="select country-select-container">
                                  <select name="country" id="shipping-address-country">
                                  </select>
                              </div>
                            </div>
                          </div>

                          <div class="row row-condensed space-1">
                            <div class="col-lg-7 col-sm-12">
                              <label for="shipping-address-street">Address Line 1</label>
                              <input type="text" name="street" id="shipping-address-street">
                            </div>
                            <div class="col-lg-5 col-sm-12"><label for="shipping-address-apt">Address Line 2</label>
                              <input type="text" name="apt" id="shipping-address-apt">
                            </div>
                          </div>
                          <div class="row row-condensed space-1">
                            <div class="col-sm-12"><label for="shipping-address-city">City / Town / District</label>
                              <input type="text" name="city" id="shipping-address-city">
                            </div>
                          </div>
                          <div class="row row-condensed space-1">
                            <div class="col-sm-12"><label for="shipping-address-state">State / Province / County / Region</label>
                              <input type="text" name="state" id="shipping-address-state">
                            </div>
                          </div>
                          <div class="row row-condensed space-1">
                            <div class="col-sm-12"><label for="shipping-address-zipcode">ZIP / Postal Code</label>
                              <input type="text" name="zipcode" id="shipping-address-zipcode">
                            </div>
                          </div>

                          <div class="row space-2 space-top-2">
                            <div class="col-sm-12"><div class="_12to336">
                              <button type="button" class="_c75i8t8" aria-busy="false">
                                <span class="_1opr7u3f"><span>Save</span></span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>

              </div>


            <div class="col-md-12 form-group dobMonth">
                <label> Guest Profiles </label>
                <div class="vat-number-section space-top-1">
                  <a href="#" id="emergency_contact_edit" class="emergency_contact_trigger">
                     Add new guest profile
                  </a>

              </div>
                    <p>This information is only required when you travel to China and will not be shared with your hosts and other guests.</p>
                      <div id="emergency_contact_popout" style="display: none;">

                        <div class="shipping-address-form col-sm-9 pull-right text-left">
                          <div class="row row-condensed space-1">
                            <div class="col-md-6 col-sm-12">
                              <label for="shipping-address-country"><span>Country</span></label>
                               <div class="select country-select-container">
                                  <select name="country" id="shipping-address-country">
                                  </select>
                              </div>
                            </div>
                          </div>

                          <div class="row row-condensed space-1">
                            <div class="col-lg-7 col-sm-12">
                              <label for="shipping-address-street">Address Line 1</label>
                              <input type="text" name="street" id="shipping-address-street">
                            </div>
                            <div class="col-lg-5 col-sm-12"><label for="shipping-address-apt">Address Line 2</label>
                              <input type="text" name="apt" id="shipping-address-apt">
                            </div>
                          </div>
                          <div class="row row-condensed space-1">
                            <div class="col-sm-12"><label for="shipping-address-city">City / Town / District</label>
                              <input type="text" name="city" id="shipping-address-city">
                            </div>
                          </div>
                          <div class="row row-condensed space-1">
                            <div class="col-sm-12"><label for="shipping-address-state">State / Province / County / Region</label>
                              <input type="text" name="state" id="shipping-address-state">
                            </div>
                          </div>
                          <div class="row row-condensed space-1">
                            <div class="col-sm-12"><label for="shipping-address-zipcode">ZIP / Postal Code</label>
                              <input type="text" name="zipcode" id="shipping-address-zipcode">
                            </div>
                          </div>

                          <div class="row space-2 space-top-2">
                            <div class="col-sm-12"><div class="_12to336">
                              <button type="button" class="_c75i8t8" aria-busy="false">
                                <span class="_1opr7u3f"><span>Save</span></span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>

                    </div>

                  </div>
                </div>



          

             <div class="panel">
              <div class="panel-header">
                <h4 class="edit-profile-section-heading">
                    Work Travel
                </h4>
              </div>
              <div class="panel-body">
                 <div class="col-md-12 form-group">
                <label >Work Email</label>
                <input type="text" class="form-control input-lg" placeholder="First Name" value="<?php echo $userdata->work_email; ?>" name="work_email" id="work_email">
                <?php echo form_error('work_email'); ?>
              </div>
              </div>
            </div>



          
             <div class="col-md-12 form-group">
               <button type="submit" name="submit" value="submit" class="btn btn-danger">Save</button>
             </div>

            </form>

        </div>

                        <!--End: Product list-->
                    </div>
                    <!-- end: Content-->

                    <!-- Sidebar-->
                    <div class="sidebar col-md-3">
                        <!--widget newsletter-->
                        <div class="widget clearfix widget-archive">
                            <ul class="list list-lines">
                                <li><a style="font-weight: bold;" href="#">Edit Profile</a> </li>
                                <li><a href="<?php echo base_url('userdashboard/photo') ?>">Photos</a></li>
                                <li><a href="<?php echo base_url('userdashboard/edit_verification') ?>">Trust and Verification</a> </li>
                                <li><a href="<?php echo base_url('userdashboard/reviews') ?>">Reviews</a></li>
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
