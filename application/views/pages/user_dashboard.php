<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

 <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
</head>
<body>
  <?php
    foreach ($personal_data as $personal_data) {
    }
  ?>
<div class="container-fluid">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo $personal_data->full_name; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>/Will_controller/destroy_session">Logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</div>

<div class="container">
	<div class="jumbotron ">

    <form class="" action="<?php echo base_url(); ?>/Will_controller/store_start_info" method="post">
	     <h1 class="display-3 text-center">User Dashboard</h1>



<!-- <div class="row">
	<div class="col-md-6">
	    <a href="<?php echo base_url(); ?>Will_controller/login" class="btn btn-primary btn-lg pl-5 pr-5 float-right" href="#" role="button">Login</a>
	</div>

	<div class="col-md-6 float-right">
	    <a href="<?php echo base_url(); ?>Will_controller/personal_info_view" class="btn btn-primary btn-lg pl-5 pr-5" href="#" role="button">Start Your Will</a>
	</div>
</div> -->
	<br><br>
</form>
</div>
</div>
<script>

$(document).ready(function(){
		$("#child").hide();
  $("#married").click(function(){
    $("#child").toggle();
  });
	$("#single").click(function(){
		$("#child").hide();
	});
});
</script>
</body>
