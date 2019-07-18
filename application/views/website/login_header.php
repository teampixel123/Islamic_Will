<?php foreach($user_data as $user_data){
  }
  $user_id = $this->session->userdata('user_id');
  $user_subscription = $user_data->user_subscription;
  $is_have_blur = $user_data->is_have_blur;
?>

<!-- Header Area Start -->
<header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="akameNav">
                    <!-- Logo -->
                    <a class="nav-brand" href="#"><img class="nav-image" src="<?php echo base_url(); ?>assets/website/img/core-img/Easy_Islamic_Will_V3-06.png" alt=""></a>

                    <!-- <a class="nav-brand" href="<?php echo base_url(); ?>website"><img src="<?php echo base_url(); ?>assets/website/img/core-img/logo.svg" alt=""></a> -->
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    <!-- Menu -->
                    <div class="classy-menu pr-4">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li id="accordion"><a href="<?php echo base_url(); ?>website">Home</a></li>
                                <li id="accordion"><a href="<?php echo base_url(); ?>About-Us">About Us</a></li>
                                <li id="accordion"><a href="<?php echo base_url(); ?>Benefits">Benefits</a></li>
                                <li id="accordion"><a href="<?php echo base_url(); ?>Pricing">Pricing</a></li>
                                <li id="accordion"><a href="<?php echo base_url(); ?>FAQ">FAQ's</a></li>
                                <li id="accordion"><a href="<?php echo base_url(); ?>Contact">Contact</a></li>
                                <?php if($user_subscription == 1){ ?>
                                <li><a href="#"><?php echo $user_data->user_fullname; ?></a>
                                <ul class="dropdown">
                                  <li><a href="<?php echo base_url(); ?>User_controller/user_dashboard">- Dashboard</a></li>
                                  <li><a href="<?php echo base_url(); ?>Will_controller/make_will_view">- Make A Will</a></li>
                                  <li><a href="<?php echo base_url() ?>User_controller/will_list">- Will List</a></li>
                                  <li><a href="<?php echo base_url(); ?>User_controller/profile">- Profile</a></li>
                                  <li><a href="<?php echo base_url(); ?>Will_controller/logout">- Logout</a></li>
                                </ul>
                              <?php } else{ ?>
                                <li id="accordion"><a href="<?php echo base_url(); ?>User_controller/user_dashboard"><i class="fa fa-user"></i> <?php echo $user_data->user_fullname; ?></a>
                              <?php } ?>
                                </ul>
                            </ul>

                            <!-- Book Icon -->

                            <!-- login user name-->
                            <!-- <div class="classynav">
                              <ul id="nav">
                                  <li><a href="#"><?php echo $user_data->user_fullname; ?></a>
                                  <ul class="dropdown">
                                    <li><a href="<?php echo base_url(); ?>Will_controller/make_will_view">- Make A Will</a></li>
                                    <li><a href="<?php echo base_url() ?>User_controller/will_list">- Will List</a></li>
                                    <li><a href="<?php echo base_url() ?>User_controller/user_profile">- Your Profile</a></li>
                                    <li><a href="<?php echo base_url(); ?>User_controller/user_dashboard">- Dashboard</a></li>
                                    <li><a href="<?php echo base_url(); ?>Will_controller/logout">- Logout</a></li>

                                    </ul>
                                  </ul>
                            </div> -->
                            <!-- log user -->

                            <!-- <div class="book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                <a href="<?php echo base_url(); ?>Will_controller/logout" class="btn akame-btn"> <i class="fa fa-sign-out"></i> </a>
                                <!-- <a href="<?php echo base_url(); ?>Login" class="btn akame-btn">Log In</a> -->
                            <!-- </div> -->
                            <!-- Cart Icon -->

                            <div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->
