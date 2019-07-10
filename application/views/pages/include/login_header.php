<?php foreach($user_data as $user_data){
  }
  $user_subscription = $user_data->user_subscription;
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
                    <a class="nav-brand" href="<?php echo base_url(); ?>website"><img src="<?php echo base_url(); ?>assets/website/img/core-img/Easy_Islamic_Will_V3-06.png" alt=""></a>
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li id="accordion"><a href="<?php echo base_url(); ?>website">Home</a></li>
                                <li id="accordion"><a href="<?php echo base_url(); ?>About-Us">About Us</a></li>
                                <li id="accordion"><a href="<?php echo base_url(); ?>Pricing">Pricing</a></li>
                                <li id="accordion"><a href="<?php echo base_url(); ?>FAQ">FAQ's</a></li>
                                <li id="accordion"><a href="<?php echo base_url(); ?>Contact">Contact</a></li>
                                <li id="accordion"><a href="<?php echo base_url(); ?>User_controller/user_dashboard"><i class="fa fa-user"></i> <?php echo $user_data->user_fullname; ?></a>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->
