<!-- Footer Area Start -->
<footer class="footer-area section-padding-80-0 padding-t-20">
    <div class="container">
        <div class="row justify-content-between ">
            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-md-2 col-xl-2 mb-4 rightb text-center">
                <div class="single-footer-widget">
                    <!-- Widget Title -->
                    <!-- <a href="#" class="footer-logo"><img src="<?php echo base_url(); ?>assets/website/img/core-img/Easy_Islamic_Will_V3-06.png" alt=""></a> -->
                    <div class="f_nav ">
                      <ul class="text-left d-none d-sm-block" id="padding-left">
                        <!-- <li><a href="./index.html">• Home</a></li>
                        <li><a href="./about.html">• About_Us</a></li> -->
                        <li><a href="<?php echo base_url(); ?>Pricing">• Pricing</a></li>
                        <li><a href="<?php echo base_url(); ?>FAQ">• FAQ's</a></li>
                        <!-- <li><a href="<?php echo base_url(); ?>Terms-and-Conditions">• Terms & Conditions</a></li> -->
                        <!-- <li><a href="<?php echo base_url(); ?>Privacy-Policy">• Privacy Policy </a></li> -->
                        <li><a href="<?php echo base_url(); ?>Contact">• Contact</a></li>
                        <li><a href="<?php echo base_url(); ?>About-Us">• About Us</a></li>
                      </ul>

                      <ul class="text-left d-block d-sm-none link-mobile">
                        <!-- <li><a href="./index.html">• Home</a></li>
                        <li><a href="./about.html">• About_Us</a></li> -->
                        <div class="row">
                          <div class="col-6">
                            <li><a href="<?php echo base_url(); ?>Pricing">• Pricing</a></li>
                            <li><a href="<?php echo base_url(); ?>FAQ">• FAQ's</a></li>
                              <li><a href="<?php echo base_url(); ?>Contact">• Contact</a></li>
                          </div>
                          <div class="col-6">
                            <li><a href="<?php echo base_url(); ?>Privacy-Policy">• Privacy Policy </a></li>
                              <li><a href="<?php echo base_url(); ?>About-Us">• About Us</a></li>
                                <li><a href="<?php echo base_url(); ?>Terms-and-Conditions">• Terms & <br>&nbsp;&nbsp; Conditions</a></li>
                          </div>
                        </div>
                      </ul>
                    </div>

                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-md-3 col-xl-3 mb-4 rightb text-center" id="social">
                <div class="single-footer-widget m-center text-center">
                    <h4 class="widget-title" style="font-size:1.5rem;">Social media</h4>
                    <div class="social-info">
                        <a href="#" class="facebook"><i class="fb-icon" style="color:#fff !important;"></i></a>
                        <a href="#" class="twitter"><i class="twitter-icon" style="color:#fff !important;"></i></a>
                        <a href="#" class="google-plus"><i class="google-icon" style="color:#fff !important;"></i></a>
                        <a href="#" class="instagram"><i class="instagram-icon" style="color:#fff !important;"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 col-xl-3 mb-4 rightb text-center" id="contact">
              <h4 class="widget-title m-center" >Contact Us</h4>
              <!-- Contact Address -->
              <div class="contact-address text-center">
                  <p class="m-center text-center">Tel: (+91) 9545-465-656 <br>
                  E-mail:info@easywillindia.com</p>
              </div>
            </div>
            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="single-footer-widget m-center">
                    <p class=""><span style="font-weight:600!important;"><strong>Disclaimer : </strong></span> ‘’The information contained in the Site is provided for informational purposes
only, and should not be construed as legal advice on any subject matter.”<a href="<?php echo base_url(); ?>About-Us#disclaimer"><strong> Read more..</strong></a></p>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid copywrite-row" style="padding:0px; margin:0px;">
      <div class="container">
        <div class="row ">
          <div class="col-md-5">
            <div class="copy-row">
                <p class="copy"> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;2019 All rights reserved by <a href="#" class="copy" target="_blank">Islamic Will</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
          </div>
          <div class="col-md-3 copy-row d-none d-sm-block">
            <a class="copy" href="<?php echo base_url(); ?>Terms-and-Conditions">Terms & Conditions</a>

          </div>
          <div class="col-md-4 copy-row d-none d-sm-block">
            <a  class="copy" href="<?php echo base_url(); ?>Privacy-Policy">Privacy Policy </a>
          </div>


        </div>
      </div>
    </div>
</footer>
<!-- Footer Area End -->

<!-- All JS Files -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/website/js/jquery.min.js"></script>
<!-- Popper -->
<script src="<?php echo base_url(); ?>assets/website/js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/website/js/bootstrap.min.js"></script>
<!-- All Plugins -->
<script src="<?php echo base_url(); ?>assets/website/js/akame.bundle.js"></script>
<!-- Active -->
<script src="<?php echo base_url(); ?>assets/website/js/default-assets/active.js"></script>

<script src="<?php echo base_url(); ?>assets/js/website.js"></script>

<script>
$(document).ready(function(){
  $('#accordion a').each(function() {
      if (this.href == window.location.href) {
          $(this).closest('li').addClass("active");
      }
  });
});

</script>
