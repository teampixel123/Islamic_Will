<!-- <?php foreach($user_data as $user_data){

} ?> -->
<!-- <div class="container-fluid">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo $user_data->user_fullname; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>/User_controller/will_list">Will List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>/Will_controller/logout_user">Logout</a>
      </li>
    </ul>
		<button id="btn_login" style="display:none;" class="btn btn-secondary my-2 my-sm-0" type="submit">Login</button>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Login</button>
    </form> -->
  <!-- </div>
</nav>
</div> -->

<!-- Preloader -->
<!-- <div id="preloader">
    <div class="loader"></div>
</div> -->
<!-- /Preloader -->

<!-- Header Area Start -->
<header class="header-area">
  <!-- Top Header Area Start -->
  <div class="top-header-area">
      <div class="container h-100">
          <div class="row h-100 align-items-center">
              <div class="col-8">
                  <div class="top-header-content text-right">
                      <p>Welcome to Islamic_will</p>
                  </div>
              </div>
              <div class="col-4">
                  <div class="top-header-content text-right">
                      <p> <i class="fa fa-phone" aria-hidden="true"></i> Call us: (+91)-9545-465-656</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Top Header Area End -->

    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="akameNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="<?php echo base_url(); ?>website"><img src="<?php echo base_url(); ?>assets/website/img/core-img/logo.svg" alt=""></a>

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
                            </ul>

                            <!-- Book Icon -->
                            <div class="book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                <a href="<?php echo base_url(); ?>Will_controller/logout" class="btn akame-btn">Logout</a>
                            </div>

                            <div class="classynav">
                              <ul id="nav">
                                  <li><a href="#"><?php echo $user_data->user_fullname; ?></a>
                                  <ul class="dropdown">
                                    <li><a href="<?php echo base_url(); ?>Start-Will">- Make A Will</a></li>
                                    <li><a href="<?php echo base_url() ?>/User_controller/will_list">- Will List</a></li>
                                    <li><a href="./service.html">- Your Profile</a></li>
                                    <li><a href="<?php echo base_url(); ?>Will_controller/logout">- Logout</a></li>

                                    </ul>
                                  </ul>
                            </div>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->
