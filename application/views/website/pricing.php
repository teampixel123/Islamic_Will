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
    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Pricing</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->


    <section class="pricing py-5">
  <div class="container">
    <div class="row">
      <!-- Free Tier -->
        <div class="col-lg-1">
          </div>
      <div class="col-lg-5">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h3 class="card-title text-muted text-uppercase text-center" style="color: #05748e!important;">Silver</h3>
            <h6 class="card-price text-center">Rs. 1250 <span class="period">/  + GST @18%</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span><strong>Standard online services </strong></li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Just to fill details Online guidance @tools tips and faq’s</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>It’s easy, simple and affordable</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>User friendly experience</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Confidential, safe and secure </li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Preview before print / finalize </li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>User can fill details up to 30 days from payment</li>
              <!-- <li class="text-muted"><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Monthly Status Reports</li> -->
            </ul>
            <div class="text-center">
                <a href="#" class="btn btn-block active  akame-btn text-uppercase" style="padding: 0rem !important; width:auto;">Get Started</a>
            </div>

          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-5">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center" style="color: #05748e!important;">Plus</h5>
            <h6 class="card-price text-center">Rs. 3000<span class="period">/  + GST @18%</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span><strong>Executive  online services</strong></li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Our executive will interact for your details through call, E mail.</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>It’s easy, simple and affordable</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>User friendly experience</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Confidential, safe and secure</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Preview before print / finalize</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>User can generate will up to 30 days from payment</li>
              <li ><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>One modification / updation up to 3 months</li>
              <hr>
              <li><span class="fa-li"></span>same package will of user’s Spouse, Real Sister, Mother, Father, Son, Daughter’s is at 1500 + GST @ 18%</li>
              <li><span class="fa-li"></span>Final will delivery by E mail or Courier at user’s choice.</li>
            </ul>
            <div class="text-center">
                <a href="#" class="btn btn-block active  akame-btn text-uppercase" style="padding: 0rem !important; width:auto;">Get Started</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-1">
        </div>
      <!-- Pro Tier -->
      <!-- <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Pro</h5>
            <h6 class="card-price text-center">$49<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>150GB Storage</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Free Subdomains</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</section>




    <!-- Border -->

        <div class="border-top mt-3"></div>
  
    <!-- Footer Area Start -->
  <?php include('footer.php') ?>
</body>

</html>
