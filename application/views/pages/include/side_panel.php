<!-- Sidebar -->
<ul class="sidebar navbar-nav">
  <?php 
  if($user_subscription == 1){ ?>
    <li class="nav-item <?php if($page=='dashboard'){echo "active";}?>">
      <a class="nav-link" href="<?php echo base_url(); ?>User_controller/user_dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="<?php echo base_url(); ?>Will_controller/make_will_view">
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
  <?php } ?>



  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url(); ?>Will_controller/logout">
      <i style="color:rgba(255, 255, 255, 0.5) !important;" class="fas fa-fw fa fa-power-off"></i>
      <span> Logout</span></a>
  </li>
</ul>
