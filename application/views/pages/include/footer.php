<!-- Footer Area Start -->
<footer class="footer-area section-padding-80-0">
    <div class="container">
        <div class="row justify-content-between">

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="single-footer-widget mb-80">
                    <!-- Footer Logo -->
                    <a href="<?php echo base_url(); ?>website" class="footer-logo"><img src="<?php echo base_url(); ?>assets/website/img/core-img/logo.svg" alt=""></a>

                    <p class="mb-30"><strong>QUOTES:</strong> ‘’From what is left by parents and those nearest related-there is a share for men and a share for women – whether the property be large or small. A share made fariadh (compulsory).”<a href="<?php echo base_url(); ?>About-Us"><strong> Read more..</strong></a></p>

                    <!-- Copywrite Text -->
                    <div class="copywrite-text">
                        <p>
                          Copyright &copy;2019 All rights reserved by <a href="#" target="_blank">Islamic Will</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                <div class="single-footer-widget mb-80">
                    <!-- Widget Title -->
                    <h4 class="widget-title">Social media</h4>

                    <!-- Social Info -->
                    <div class="social-info">
                        <a href="#" class="facebook"><i class="fa fa-facebook" style="color:#fff !important;"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter" style="color:#fff !important;"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus" style="color:#fff !important;"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram" style="color:#fff !important;"></i></a>
                    </div>
                    <hr>
                    <div class="f_nav ">
                      <ul class="text-left">
                        <!-- <li><a href="./index.html">• Home</a></li>
                        <li><a href="./about.html">• About_Us</a></li> -->
                        <li><a href="<?php echo base_url(); ?>Pricing">• Pricing</a></li>
                        <li><a href="<?php echo base_url(); ?>FAQ">• FAQ's</a></li>
                        <li><a href="<?php echo base_url(); ?>Terms-and-Conditions">• Terms & Conditions</a></li>
                        <li><a href="<?php echo base_url(); ?>Privacy-Policy">• Privacy Policy </a></li>
                        <li><a href="<?php echo base_url(); ?>Contact">• Contact</a></li>
                      </ul>
                    </div>

                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-md-4 col-xl-3">
                <div class="single-footer-widget mb-80">

                    <!-- Widget Title -->
                    <h4 class="widget-title">Contact Us</h4>

                    <!-- Contact Address -->
                    <div class="contact-address">
                        <p>Tel: (+91) 9545-465-656</p>
                        <p>E-mail:info@easywillindia.com</p>

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
