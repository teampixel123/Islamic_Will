<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
  <a class="navbar-brand mr-1" href="<?php echo base_url(); ?>Owner-Dashboard">Owner Dashboard</a>

  <!-- Navbar Search -->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
  </form>

  <!-- Navbar -->
  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown no-arrow">
      <a style="font-size:16px;" class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Menu</a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="<?php echo base_url(); ?>Owner-Will-List">Will List</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Activity Log</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?php echo base_url(); ?>Owner_controller/owner_logout" >Logout</a>
      </div>
    </li>
  </ul>
</nav>
