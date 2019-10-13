<ul class="sidebar navbar-nav">
  <li class="nav-item <?php if($page == 'dashboard'){ echo 'active'; } ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>Owner_controller/dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item <?php if($page == 'will_list'){ echo 'active'; } ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>Owner_controller/will_list">
      <i class="fas fa-fw fa-table"></i>
      <span>Will List</span>
    </a>
  </li>
  <li class="nav-item <?php if($page == 'user_list'){ echo 'active'; } ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>Users-List">
      <i class="fas fa-fw fa-table"></i>
      <span>Users List</span>
    </a>
  </li>
  <li class="nav-item <?php if($page == 'payment_list'){ echo 'active'; } ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>Payments-List">
      <i class="fas fa-fw fa-table"></i>
      <span>Payment List</span>
    </a>
  </li>
   <!-- <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Will List</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="<?php echo base_url(); ?>Owner_controller/login">Registered Will List</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="<?php echo base_url(); ?>Owner_controller/login">Non Registered Will List</a>

    </div>
  </li> -->
  <!-- <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url(); ?>Owner_controller/dashboard">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url(); ?>Owner_controller/dashboard">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url(); ?>Owner_controller/owner_logout">
      <i class="fa fa-sign-out-alt "></i>
      <span>Logout</span></a>
  </li>
</ul>
