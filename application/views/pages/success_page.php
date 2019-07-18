<?php
$is_login = $this->session->userdata('user_is_login');
if($is_login){
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- include head -->
<?php include('include/dashboard_header.php'); ?>
<?php include('include/head.php'); ?>
<!-- include head end -->
<body>
  <?php
    $page = 'will_success';
  ?>
<!-- include header -->
<?php include('include/login_header.php'); ?>
<!-- include header end -->
<div id="wrapper">
  <?php include('include/side_panel.php'); ?>
  <div id="content-wrapper">
    <div class="container-fluid">
      <div id="subscribe_success" class="alert alert-success" role="alert" style="display:none;"></div>

        <div id="subscribe_for_will" class="alert alert-danger" role="alert" style="display:none;"></div>
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
      </ol>

  </div>
  </div>
</div>
<?php include('include/dashboard_footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    window.location.href('<?php echo base_url(); ?>User-Dashboard');
  })
</script>
</body>
<?php } ?>
