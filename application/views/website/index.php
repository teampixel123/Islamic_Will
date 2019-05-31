<?php include('head.php') ?>
<body>
  <?php
    $is_login = $this->session->userdata('user_is_login');
    if($is_login){
      include('login_header.php');
    }
    else{
      include('header.php');
    }
   ?>
    <!-- Welcome Area Start -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img" style="background-image: url(<?php echo base_url(); ?>assets/website/img/bg-img/16.jpg);">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-10 col-lg-9">
                                <div class="welcome-text">
                                  <!-- <h2 data-animation="fadeInUp" data-delay="100ms">We Care About<br> Your life</h2> -->
                                  <h3 data-animation="fadeInUp" data-delay="150ms" >‘’From what is left by parents and those nearest related-there is a share for men and
                                     a share for women – whether the property be large or small. A share made fariadh (compulsory).‘’ </h3>

                                </div>
                                <a href="<?php echo base_url(); ?>About-Us" class="btn active akame-btn" data-animation="fadeInUp" data-delay="700ms">About Us</a>
                                  <a href="<?php echo base_url(); ?>Start-Will" class="btn active akame-btn" data-animation="fadeInUp" data-delay="700ms">Make Your Will</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img" style="background-image: url(<?php echo base_url(); ?>assets/website/img/bg-img/116.jpg);">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-10 col-lg-9">
                                <div class="welcome-text">
                                    <!-- <h2 data-animation="fadeInUp" data-delay="100ms">We Care About<br> Your life</h2> -->
                                    <h3 data-animation="fadeInUp" data-delay="150ms">Plan for your worldly life as if you are going to live forever,
                                       and plan for your life after life as if you are going to die tomorrow.</h3>

                                </div>
                                <a href="<?php echo base_url(); ?>About-Us" class="btn active akame-btn active" data-animation="fadeInUp" data-delay="700ms">About Us</a>
                                  <a href="<?php echo base_url(); ?>Start-Will" class="btn active akame-btn" data-animation="fadeInUp" data-delay="700ms">Make Your Will</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img" style="background-image: url(<?php echo base_url(); ?>assets/website/img/bg-img/17.jpg);">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-10 col-lg-9">
                                <div class="welcome-text">
                                    <!-- <h2 data-animation="fadeInUp" data-delay="100ms">We Care About<br> Your life</h2> -->
                                    <h3 data-animation="fadeInUp" data-delay="150ms">Narrated by Abdullah bin 'Umar, radi Allah Anhu: Allah's Messenger, salla Allah Alayhi wa sallam, said," It is
                                    not permissible for any Muslim who has something to will, to stay for two nights without having his last will and
                                    testament written and kept ready with him."[ Sahih al-Bukhari)4:1- O.B]</h3>

                                </div>
                                <a href="<?php echo base_url(); ?>About-Us" class="btn active akame-btn active" data-animation="fadeInUp" data-delay="700ms">About Us</a>
                                  <a href="<?php echo base_url(); ?>Start-Will" class="btn active akame-btn" data-animation="fadeInUp" data-delay="700ms">Make Your Will</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Area End -->

    <!-- About Area Start -->
    <section class="akame-about-area section-padding-80-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Section Heading -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="section-heading mb-80">
                        <h2>Islamic will</h2>
                        <span>About Us</span>
                    </div>
                </div>
                <!-- About Us Thumbnail -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-us-thumbnail mb-80">
                        <img src="<?php echo base_url(); ?>assets/website/img/bg-img/15.jpg" alt="">
                    </div>
                </div>
                <!-- About Us Content -->
                <div class="col-12 col-lg-4">
                    <div class="about-us-content mb-80 pl-4">
                        <h3>Importance of a Will</h3>
                        <p>“The object of Wills according to the tradition of the Prophet is to provide for the maintenance of
                           members of family and other relatives where they cannot be properly provided for by the law of inheritance.
                            At the same time the prophet has declared that the power should not be exercised to the injury of the lawful
                             heirs.. ”</p>
                             <div class="row">
                               <div class="col-md-6">
                                 <a href="<?php echo base_url(); ?>About-Us/#important" class="btn akame-btn active mt-30" style="padding: 0 15px !important;">Read More</a>

                               </div>
                               <div class="col-md-6">
                                   <a href="<?php echo base_url(); ?>Start-Will" class="btn akame-btn active mt-30 "style="padding: 0 14px !important;font-size: 13px;">Start your Will</a>
                               </div>

                             </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->

    <!-- Border -->
    <div class="container">
        <div class="border-top mt-3"></div>
    </div>
    <!-- Our Service Area Start -->
    <section class="akame-service-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Make Your Will in just 3 simple steps</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area  mb-80 wow fadeInUp" data-wow-delay="200ms">
                        <!-- <img src="<?php echo base_url(); ?>assets/website/img/core-img/s1.png"  class="single_area" alt="" > -->
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="84px" height="84.003px" viewBox="0 0 84 84.003" enable-background="new 0 0 84 84.003" xml:space="preserve">
<g>
	<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="56.6112" y1="62.6488" x2="56.6112" y2="46.5679">
		<stop  offset="0" style="stop-color:#007792"/>
		<stop  offset="1" style="stop-color:#0196B7"/>
	</linearGradient>
	<path fill="url(#SVGID_1_)" d="M62.617,52.704c-1.364-0.012-2.729-0.003-4.093-0.004c-0.097,0-0.194,0-0.318,0
		c0-0.129,0-0.227,0-0.325c0-1.264,0.01-2.529-0.004-3.793c-0.013-1.18-0.827-2.022-1.917-2.015
		c-1.04,0.006-1.757,0.809-1.775,2.004c-0.01,0.646-0.002,1.292-0.003,1.937c0,0.717,0,1.435,0,2.191c-0.137,0-0.236,0-0.334,0
		c-1.182,0.001-2.365-0.003-3.547,0.003c-0.79,0.004-1.374,0.382-1.76,1.052c-0.637,1.106-0.126,2.272,1.114,2.55
		c0.29,0.065,0.595,0.08,0.893,0.083c1.1,0.009,2.201,0.004,3.302,0.004c0.104,0,0.209,0,0.333,0c0,0.142,0,0.241,0,0.339
		c0,1.246-0.002,2.492,0.002,3.738c0.001,0.208,0.016,0.419,0.048,0.624c0.123,0.776,0.65,1.361,1.346,1.51
		c0.783,0.167,1.517-0.139,1.96-0.815c0.248-0.378,0.342-0.798,0.342-1.243c0-1.282,0-2.565,0-3.847c0-0.096,0-0.193,0-0.305
		c1.441,0,2.842-0.003,4.242,0.003c0.205,0.001,0.415,0.092,0.613,0.066c0.81-0.106,1.433-0.686,1.545-1.401
		C64.802,53.801,63.895,52.715,62.617,52.704z"/>
	<linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="42" y1="83.4279" x2="42" y2="0.575">
		<stop  offset="0" style="stop-color:#007792"/>
		<stop  offset="1" style="stop-color:#0196B7"/>
	</linearGradient>
	<path fill="url(#SVGID_2_)" d="M42,0.575c-22.879,0-41.426,18.547-41.426,41.426S19.121,83.428,42,83.428
		c22.879,0,41.427-18.547,41.427-41.426S64.879,0.575,42,0.575z M49.158,67.934c-1.67,0.328-3.354,0.536-5.051,0.675
		c-2.595,0.212-5.195,0.362-7.795,0.274c-2.825-0.095-5.647-0.303-8.467-0.507c-2.739-0.198-5.466-0.52-8.171-0.996
		c-0.964-0.17-1.912-0.43-2.868-0.648c-0.529-0.121-0.861-0.452-1.003-0.968c-0.121-0.437-0.246-0.875-0.327-1.32
		c-0.098-0.543-0.151-1.094-0.223-1.641c0-0.619,0-1.237,0-1.856c0.014-0.061,0.034-0.122,0.04-0.184
		c0.079-0.832,0.14-1.667,0.238-2.497c0.165-1.397,0.713-2.6,1.919-3.399c0.633-0.419,1.287-0.849,1.993-1.108
		c1.464-0.538,2.961-0.987,4.457-1.432c1.65-0.49,3.169-1.214,4.486-2.336c0.791-0.674,1.355-1.496,1.417-2.551
		c0.045-0.767,0-1.546-0.072-2.313c-0.068-0.731-0.421-1.342-0.981-1.831c-0.459-0.401-0.893-0.83-1.36-1.222
		c-0.385-0.323-0.677-0.706-0.899-1.151c-0.447-0.898-0.806-1.828-0.997-2.816c-0.036-0.186-0.135-0.25-0.291-0.336
		c-0.313-0.171-0.627-0.367-0.884-0.612c-0.563-0.539-0.816-1.258-1.026-1.987c-0.385-1.333-0.083-2.554,0.657-3.684
		c0.122-0.186,0.187-0.355,0.188-0.573c0.007-2.061,0.236-4.095,0.656-6.116c0.438-2.111,1.208-4.044,2.638-5.694
		c1.841-2.123,4.136-3.397,6.914-3.798c0.619-0.089,1.244-0.142,1.866-0.212c0.327,0,0.655,0,0.982,0
		c0.08,0.014,0.159,0.037,0.24,0.041c1.227,0.058,2.412,0.321,3.565,0.73c3.519,1.248,5.92,3.599,7.038,7.194
		c0.807,2.596,1.251,5.248,1.17,7.975c-0.005,0.173,0.033,0.3,0.166,0.43c0.392,0.383,0.639,0.854,0.76,1.391
		c0.167,0.746,0.07,1.487-0.066,2.22c-0.231,1.242-0.845,2.211-2.04,2.747c-0.081,0.036-0.152,0.148-0.179,0.239
		c-0.138,0.461-0.236,0.935-0.393,1.389c-0.359,1.035-0.78,2.033-1.66,2.768c-0.226,0.189-0.388,0.481-0.515,0.755
		c-0.164,0.352-0.285,0.727-0.388,1.103c-0.228,0.836-0.577,1.602-1.138,2.271c-0.221,0.264-0.406,0.559-0.592,0.85
		c-1.421,2.221-2.24,4.636-2.32,7.283c-0.041,1.335,0.172,2.644,0.448,3.946c0.524,2.473,1.671,4.592,3.507,6.34
		c1.263,1.203,2.698,2.149,4.241,2.945c0.089,0.046,0.177,0.096,0.318,0.172C49.242,67.913,49.201,67.926,49.158,67.934z
		 M56.57,66.883c-6.758-0.028-12.228-5.529-12.196-12.239c0.032-7.003,5.751-12.156,12.251-12.136
		c6.75,0.021,12.152,5.469,12.122,12.191C68.718,61.454,63.264,66.911,56.57,66.883z"/>
</g>
</svg>

                        <h5>Fill Your Information</h5>
                        <p style="text-align: -webkit-left;">To preserve assets for your beneficiaries and to clear your wishes with simpler and Swifter way you can fill your detailed information to create a Islamic Will Testament for which you accessing this website. Information you fill up prepares
                           your document and makes it in complete form, so your information shall be corrected and without any error.</p>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area mb-80 wow fadeInUp" data-wow-delay="400ms">
                        <!-- <img src="<?php echo base_url(); ?>assets/website/img/core-img/s3.png" alt="" class="single_area"> -->
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="84px" height="84.003px" viewBox="0 0 84 84.003" enable-background="new 0 0 84 84.003" xml:space="preserve">
<g>
	<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="42" y1="83.4279" x2="42" y2="0.575">
		<stop  offset="0" style="stop-color:#007792"/>
		<stop  offset="1" style="stop-color:#0196B7"/>
	</linearGradient>
	<path fill="url(#SVGID_1_)" d="M42,0.575c-22.879,0-41.426,18.547-41.426,41.426S19.121,83.428,42,83.428
		c22.879,0,41.427-18.547,41.427-41.426S64.879,0.575,42,0.575z M52.431,64.193c-8.408,0.018-16.817-0.005-25.226,0.013
		c-2.488,0.005-4.086-1.168-4.917-3.47c0-12.481,0-24.962,0-37.442c0.912-2.615,2.81-3.521,5.496-3.496
		c8.092,0.074,16.185,0.025,24.278,0.028c3.608,0.001,5.046,1.695,5.342,5.294c0.22,2.683-1.837,3.494-3.356,4.988
		c0-1.267,0-2.533,0-3.8c0-0.553-0.019-1.106,0.004-1.658c0.046-1.119-0.524-1.563-1.591-1.558
		c-2.566,0.013-5.132,0.004-7.698,0.004c-5.763,0-11.527-0.002-17.291,0.001c-1.666,0.001-1.904,0.241-1.904,1.927
		c-0.002,11.33-0.002,22.66,0,33.989c0,1.656,0.26,1.914,1.924,1.915c8.211,0.003,16.422,0.002,24.633,0
		c1.622,0,1.921-0.304,1.922-1.938c0.003-3.513,0.033-7.027-0.021-10.54c-0.014-0.944,0.234-1.615,0.937-2.262
		c0.712-0.656,1.252-1.498,1.868-2.259c0.145,0.11,0.289,0.22,0.434,0.33c0.022,0.332,0.063,0.665,0.063,0.997
		c0.004,4.658,0.007,9.316,0.001,13.975C57.327,62.363,55.553,64.186,52.431,64.193z M39.733,47.997c0,1,0,2.002,0,3.08
		c-3.825,0-7.628,0-11.482,0c0-1.04,0-2.014,0-3.08C32.059,47.997,35.856,47.997,39.733,47.997z M28.286,43.622
		c0-1.042,0-2.072,0-3.165c3.813,0,7.577,0,11.434,0c0,1.024,0,2.025,0,3.165C35.908,43.622,32.141,43.622,28.286,43.622z
		 M28.296,54.854c7.646,0,15.309,0,23.065,0c0,1.067,0,2.036,0,3.077c-7.698,0-15.333,0-23.065,0
		C28.296,56.939,28.296,55.941,28.296,54.854z M42.239,50.391c0.722-2.093,1.372-3.978,2.015-5.841
		c1.281,1.307,2.501,2.552,3.788,3.864C46.239,49.029,44.383,49.661,42.239,50.391z M43.604,36.498c-4.659,0-9.317,0-13.976,0
		c-0.427,0-0.853,0-1.364,0c0-3.479,0-6.851,0-10.351c7.725,0,15.372,0,23.165,0c0,2.191,0.017,4.348-0.022,6.504
		c-0.005,0.256-0.281,0.54-0.489,0.755C47.922,36.501,47.919,36.499,43.604,36.498z M49.599,46.941
		c-1.378-1.378-2.654-2.654-3.975-3.976c6.675-6.434,13.4-12.916,19.964-19.243c1.38,1.26,2.712,2.475,4.123,3.763
		C62.947,34.028,56.264,40.493,49.599,46.941z"/>
	<linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="39.7873" y1="33.1404" x2="39.7873" y2="29.4814">
		<stop  offset="0" style="stop-color:#007792"/>
		<stop  offset="1" style="stop-color:#0196B7"/>
	</linearGradient>
	<path fill="url(#SVGID_2_)" d="M31.502,33.14c5.569,0,11.062,0,16.57,0c0-1.279,0-2.477,0-3.659c-5.581,0-11.075,0-16.57,0
		C31.502,30.751,31.502,31.919,31.502,33.14z"/>
</g>
</svg>

                        <h5>Verify Your Information </h5>
                        <p style="text-align: -webkit-left;">To distribute your estate by your own will and to avoid confusion & in legal heirs and to Create your will through Islamic will, Registration is very first step to proceed for further process. For creating will verifications of your information is important for us. Please get your information verified according to the easy procedure we have provided. When you are verified you become a valid user of Easy Islamic will. Follow the easiest steps for your verification.</p>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area mb-80 wow fadeInUp" data-wow-delay="600ms">
                        <!-- <img src="<?php echo base_url(); ?>assets/website/img/core-img/s4.png" alt="" class="single_area"> -->
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="84px" height="84.003px" viewBox="0 0 84 84.003" enable-background="new 0 0 84 84.003" xml:space="preserve">
<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="42" y1="83.4279" x2="42" y2="0.575">
	<stop  offset="0" style="stop-color:#007792"/>
	<stop  offset="1" style="stop-color:#0196B7"/>
</linearGradient>
<path fill="url(#SVGID_1_)" d="M42,0.575c-22.879,0-41.427,18.547-41.427,41.426S19.121,83.428,42,83.428
	s41.426-18.547,41.426-41.426S64.879,0.575,42,0.575z M60.762,64.16H23.238v-4.529h37.524V64.16z M42,53.809L23.076,35.855h10.675
	V19.843H42h8.249v16.013h10.675L42,53.809z"/>
</svg>

                        <h5>Download Your Will</h5>
                        <p style="text-align: -webkit-left;">Downloading is the next step in order to get your Islamic  Will document. Before this process user is informed to fulfill the payment process with regard to get it downloaded. After successful Payment user can download it in PDF format or user can get it on registered email.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Service Area End -->

    <!-- Why Choose Us Area Start -->
    <section class="why-choose-us-area bg-gray section-padding-80-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="choose-us-thumbnail mt-30 mb-80">
                        <div class="choose-us-img bg-img" style="background-image: url(<?php echo base_url(); ?>assets/website/img/bg-img/4.jpg);"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>Benefits of Islamic Will</h2>
                    </div>
                    <!-- Choose Us Content -->
                    <div class="choose-us-content mt-30 mb-80">
                        <ul>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Our Website Leads To a More Balanced and Optimistic Outlook On Using Online Websites.</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Our websites is trust worthy and experienced service provider.</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Efficient and professional support.</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Independent professional advices available.</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> We assure our users availability of Quality product to our users.</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Independent professional advices available</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Trusted advice and assistants provided.</li>
                        </ul><br>
                          <a href="<?php echo base_url(); ?>About-Us/#benefit" class="btn akame-btn active mt-30">Read More</a>
                           <a href="<?php echo base_url(); ?>Start-Will" class="btn akame-btn active mt-30 ">Make Your Will</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Area End -->

    <!-- Testimonial Area Start -->
    <section class="testimonial-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="testimonial-slides owl-carousel ">
                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                          <div class="testimonial_icon">
                            <img src="<?php echo base_url(); ?>assets/website/img/core-img/quote.png" alt="">
                          </div>
                          <div class="row">
                            <div class="col-md-2 testimonial_img "alt="" >
                            <img class="" src="<?php echo base_url(); ?>assets/website/img/bg-img/users.png" alt="" >
                            </div>
                            <div class="col-md-10">
                              <p>	This website is very professional and personable. Would recommend to anyone needing Islamic will testament service.</p>
                          </div>
                        </div>
                        <div class="ratings-name d-flex align-items-center align-middle justify-content-center">
                            <div class="ratings mr-3">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                            </div>
                            <!-- <h5>Jackson Nash</h5> -->
                        </div>
                        </div>


                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                          <div class="testimonial_icon">
                            <img src="<?php echo base_url(); ?>assets/website/img/core-img/quote.png" alt="">
                          </div>
                          <div class="row">
                            <div class="col-md-2 testimonial_img "alt="" >
                            <img class="" src="<?php echo base_url(); ?>assets/website/img/bg-img/users.png" alt="" >
                            </div>
                            <div class="col-md-10">
                              <p>	I feel that product is of superior quality and was exactly what i had in my mind and i will recommend use of the website to make will testament to users.</p>
                          </div>
                        </div>
                        <div class="ratings-name d-flex align-items-center align-middle justify-content-center">
                            <div class="ratings mr-3">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                            </div>
                            <!-- <h5>Jackson Nash</h5> -->
                        </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                          <div class="testimonial_icon">
                            <img src="<?php echo base_url(); ?>assets/website/img/core-img/quote.png" alt="">
                          </div>
                          <div class="row">
                            <div class="col-md-2 testimonial_img "alt="" >
                            <img class="" src="<?php echo base_url(); ?>assets/website/img/bg-img/users.png" alt="" >
                            </div>
                            <div class="col-md-10">
                              <p>	Easy to use, got way more and way better designs that I expected and very happy with end result.</p>
                          </div>
                        </div>
                        <div class="ratings-name d-flex align-items-center align-middle justify-content-center">
                            <div class="ratings mr-3">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                            </div>
                            <!-- <h5>Jackson Nash</h5> -->
                        </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                          <div class="testimonial_icon">
                            <img src="<?php echo base_url(); ?>assets/website/img/core-img/quote.png" alt="">
                          </div>
                          <div class="row">
                            <div class="col-md-2 testimonial_img "alt="" >
                            <img class="" src="<?php echo base_url(); ?>assets/website/img/bg-img/users.png" alt="" >
                            </div>
                            <div class="col-md-10">
                              <p>My experience with Islamic wills has been excellent, and they are always my first choice for a client referral.</p>
                          </div>
                        </div>
                        <div class="ratings-name d-flex align-items-center align-middle justify-content-center">
                            <div class="ratings mr-3">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                            </div>
                            <!-- <h5>Jackson Nash</h5> -->
                        </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                          <div class="testimonial_icon">
                            <img src="<?php echo base_url(); ?>assets/website/img/core-img/quote.png" alt="">
                          </div>
                          <div class="row">
                            <div class="col-md-2 testimonial_img "alt="" >
                            <img class="" src="<?php echo base_url(); ?>assets/website/img/bg-img/users.png" alt="" >
                            </div>
                            <div class="col-md-10">
                              <p>I recommend highly Islamic will website. They are truly professional and results oriented</p>
                          </div>
                        </div>
                        <div class="ratings-name d-flex align-items-center align-middle justify-content-center">
                            <div class="ratings mr-3">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                            </div>
                            <!-- <h5>Jackson Nash</h5> -->
                        </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                          <div class="testimonial_icon">
                            <img src="<?php echo base_url(); ?>assets/website/img/core-img/quote.png" alt="">
                          </div>
                          <div class="row">
                            <div class="col-md-2 testimonial_img "alt="" >
                            <img class="" src="<?php echo base_url(); ?>assets/website/img/bg-img/users.png" alt="" >
                            </div>
                            <div class="col-md-10">
                              <p>I have had a wonderful experience being represented wasiat.com They were able to resolve the situation through diligent hard work.
                                The peace of mind that I received was priceless. I was able to safely and easily generate my last Islamic will testament. I’m very grateful
                                 to the website and entire team.</p>
                          </div>
                        </div>
                        <div class="ratings-name d-flex align-items-center align-middle justify-content-center">
                            <div class="ratings mr-3">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                            </div>
                            <!-- <h5>Jackson Nash</h5> -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End -->

    <!-- Call To Action Area Start -->
    <section class="akame-cta-area bg-gray section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-xl-5">
                    <div class="cta-content">
                        <h2>Protection is not a <br>principle but an expedient</h2>
                        <div class="akame-btn-group mt-30">
                            <a href="<?php echo base_url(); ?>Start-Will" class="btn active akame-btn">Start Your Will</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Thumbnail -->
        <div class="cta-thumbnail bg-img" style="background-image: url(<?php echo base_url(); ?>assets/website/img/bg-img/cta.png);"></div>
    </section>
    <!-- Call To Action Area End -->

    <!-- Border -->
    <!-- <div class="container">
        <div class="border-top mt-3"></div>
    </div> -->
  <div class="border-top mt-3"></div>
  <?php include('footer.php') ?>

</body>

</html>
