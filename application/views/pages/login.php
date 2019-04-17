<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

 <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
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
    <form class="" method="post">
      <legend class="text-center">Login</legend>


      <div class="form-group">
        <div class="row text-center">
          <div class="col-md-4 text-right">
            <label for="exampleInputEmail1">Mobile No. / Email:</label>
          </div>
          <div class="col-md-5">
            <input type="number" name="mob_email" id="mob_email" class="form-control" aria-describedby="emailHelp" >
          </div>
        </div>
      </div>

      <div class="form-group" style="display:none;">
        <div class="row text-center">
          <div class="col-md-4 text-right">
            <label for="exampleInputEmail1">Mobile No. / Email:</label>
          </div>
          <div class="col-md-5">
            <input type="text" name="mobile_no" class="form-control" id="mobile_no" aria-describedby="emailHelp" >
          </div>
        </div>
      </div>

      <div class="row">
      	<div class="col-md-12 text-center">
      	    <button type="button" id="btn_send_otp" class="btn btn-primary btn-md">Send OTP</button>
      	</div>
      </div>
    </form>
</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>


<script>
$(document).ready(function(){
  $('#btn_send_otp').click(function(){
    var mob_email = $('#mob_email').val();
    $.ajax({
  		data: {'mob_email' : mob_email},
  		type: "post",
  		url: "<?php echo base_url(); ?>Will_controller/generate_otp",
  		success: function (data){
      }
    });
    //alert(mob_email);
  });

});
</script>
</body>