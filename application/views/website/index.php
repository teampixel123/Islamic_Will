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
                        <img src="<?php echo base_url(); ?>assets/website/img/core-img/s1.png"  class="single_area" alt="" >
                        <h5>Fill Your Information</h5>
                        <p style="text-align: -webkit-center;">Ut enim ad minim veniam, quis trud exercitation...</p>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area mb-80 wow fadeInUp" data-wow-delay="400ms">
                        <img src="<?php echo base_url(); ?>assets/website/img/core-img/s3.png" alt="" class="single_area">
                        <h5>Verify Your Information</h5>
                        <p style="text-align: -webkit-center;">Consectetur adipisicing elit, sed doe eiusmod.</p>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area mb-80 wow fadeInUp" data-wow-delay="600ms">
                        <img src="<?php echo base_url(); ?>assets/website/img/core-img/s4.png" alt="" class="single_area">
                        <h5>Download Your Will</h5>
                        <p style="text-align: -webkit-center;">Nemo enim ipsam voluptatem quia voluptas</p>
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
                        <h2>Protecation is not a <br>principle but on expedient</h2>
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
