<?php
$is_login = $this->session->userdata('user_is_login');
if($is_login){
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- include head -->
<?php include('include/head.php'); ?>
<!-- include head end -->
<body>
  <?php
    $page = 'dashboard';
    foreach ($user_data as $user_data) {
    }
  ?>
<!-- include header -->
<?php include('include/login_header.php'); ?>
<!-- include header end -->
<div class="container">
	<div class="jumbotron ">
	   <h1 class="display-3 text-center">User Dashboard</h1>
  </div>
</div>
</body>
<?php } ?>
