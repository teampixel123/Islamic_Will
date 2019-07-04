<!-- Footer Area Start -->
<footer class="footer-area section-padding-80-0 padding-t-20">
    <div class="container">
        <div class="row justify-content-between">

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="single-footer-widget mb-80 m-center">
                    <!-- Footer Logo -->
                    <a href="#" class="footer-logo"><img src="<?php echo base_url(); ?>assets/website/img/core-img/Easy_Islamic_Will_V3-06.png" alt=""></a>

                    <p class="mb-30"><strong>Disclaimer:</strong> ‘’The information contained in the Site is provided for informational purposes
only, and should not be construed as legal advice on any subject matter.”<a href="<?php echo base_url(); ?>About-Us#disclaimer"><strong> Read more..</strong></a></p>

                    <!-- Copywrite Text -->
                    <div class="copywrite-text">
                        <p> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;2019 All rights reserved by <a href="#" target="_blank">Islamic Will</a>
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                <div class="single-footer-widget mb-80">
                    <!-- Widget Title -->


                    <div class="f_nav ">
                      <ul class="text-left d-none d-sm-block">
                        <!-- <li><a href="./index.html">• Home</a></li>
                        <li><a href="./about.html">• About_Us</a></li> -->
                        <li><a href="<?php echo base_url(); ?>Pricing">• Pricing</a></li>
                        <li><a href="<?php echo base_url(); ?>FAQ">• FAQ's</a></li>
                        <li><a href="<?php echo base_url(); ?>Terms-and-Conditions">• Terms & Conditions</a></li>
                        <li><a href="<?php echo base_url(); ?>Privacy-Policy">• Privacy Policy </a></li>
                        <li><a href="<?php echo base_url(); ?>Contact">• Contact</a></li>
                        <li><a href="<?php echo base_url(); ?>About-Us">• About Us</a></li>
                      </ul>

                      <ul class="text-left d-block d-sm-none">
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
            <div class="col-12 col-md-4 col-xl-3">
                <div class="single-footer-widget mb-80 m-center">

                    <!-- Widget Title -->
                    <h4 class="widget-title">Contact Us</h4>

                    <!-- Contact Address -->
                    <div class="contact-address ">
                        <p class="m-center">Tel: (+91) 9545-465-656</p>
                        <p class="m-center">E-mail:info@easywillindia.com</p>

                    </div>
                    <hr>
                    <h4 class="widget-title">Social media</h4>

                    <!-- Open Times -->
                    <!-- <div class="open-time">
                        <p>Monday: Friday: 10.00 - 23.00</p>
                        <p>Saturday: 10.00 - 19.00</p>
                    </div> -->

                    <!-- Social Info -->
                    <div class="social-info">
                        <a href="#" class="facebook"><i class="fa fa-facebook" style="color:#fff !important;"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter" style="color:#fff !important;"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus" style="color:#fff !important;"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram" style="color:#fff !important;"></i></a>
                    </div>
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

<script>
$(document).ready(function(){
  $('#accordion a').each(function() {
      if (this.href == window.location.href) {
          $(this).closest('li').addClass("active");
      }
  });
});

</script>
