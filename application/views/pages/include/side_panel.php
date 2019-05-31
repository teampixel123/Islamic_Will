<!-- Sidebar -->
<ul class="sidebar navbar-nav">
  <li class="nav-item <?php if($page=='dashboard'){echo "active";}?>">
    <a class="nav-link" href="<?php echo base_url(); ?>User_controller/user_dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Login Screens:</h6>
      <a class="dropdown-item" href="<?php echo base_url(); ?>User_controller/login">Login</a>
      <a class="dropdown-item" href="register.html">Register</a>
      <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
      <div class="dropdown-divider"></div>
      <h6 class="dropdown-header">Other Pages:</h6>
      <a class="dropdown-item" href="404.html">404 Page</a>
      <a class="dropdown-item" href="blank.html">Blank Page</a>
    </div>
  </li>
  <li class="nav-item ">
    <a class="nav-link" href="<?php echo base_url(); ?>Will_controller/start_will_view">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Make a Will </span></a>
  </li>
  <li class="nav-item <?php if($page=='will_list'){echo "active";}?>">
    <a class="nav-link" href="<?php echo base_url(); ?>User_controller/will_list">
      <i class="fas fa-fw fa-table"></i>
      <span>Will List</span></a>
  </li>
  <li class="nav-item <?php if($page=='profile'){echo "active";}?>">
    <a class="nav-link" href="<?php echo base_url(); ?>User_controller/profile">
      <i class="fas fa-fw fa-user-circle"></i>
      <span>Profile</span></a>
  </li>
</ul>
