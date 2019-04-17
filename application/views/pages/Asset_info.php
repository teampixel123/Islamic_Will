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
	<h5 class="display-3 text-center">Asset info</h5>
	<div class="row text-center">

</div>
<br><br>
<!-- Asset info -->
<div class="row ">
<div class="col-md-6">
<form class="" action="<?php echo base_url(); ?>/Will_controller/save_Asset_info" method="post">
	<h2>Real Estate </h2>
	<select id="estate_type" name="estate_type">
<option value=" " >Estate Types</option>
<option value="Flat" >Flat</option>
<option value="Shops" >Shops</option>
<option value="Land" >Land</option>
<option value="Plot" >Plot</option>
<option value="Commercial Shop unit" >Commercial Shop unit</option>
<option value="Commercial office unit" >Commercial office unit</option>
</select><br>

	<label for="">House No / Flat NO : </label>
	<input type="text" name="flat_no" value=""><br>

	<label for="">Survey number : </label>
	<input type="number" name="survey_number" value=""></br>

	<p>Measurement<p>
	<label for="">Area : </label>
	<input type="number" name="area_measurement" value="">

	<select id="asset_unit" name="asset_unit">
<option value=" " >Select Unit </option>
<option value="Square Meter" >Square Meter</option>
<option value="Square Feet" >Square Feet</option>
<option value=" Hector" >Hector</option>
</select><br><br>
<label for="">Address : </label>
<input type="text" name="address_asset" value="">
<label for="">city : </label>
<input type="text" name="city_asset" value=""></br>
<label for="">PIN/ZIP Code  : </label>
<input type="text" name="pin_code_asset" value=""></br>
<label for="">Country : </label>
<input type="text" name="country_asset" value=""></br>
<label for="">State : </label>
<input type="text" name="state_asset" value=""></br>
<!-- <select class="selectpicker countrypicker" data-flag="true" ></select> -->
<!--Asset_info End  -->
	<input type="submit" class="add-row" value="Add">

	<br><br>
</from>
<!-- give to  -->
<form class="" action="<?php echo base_url(); ?>/Will_controller/save_Asset_info" method="post">
	<label for="">Give To : </label>
	<input type="text" name="give_to_asset" value=""></br>

	<label for="">Ownership : </label>
	<input type="number" name="ownership_asset" value="" placeholder="                                 %">
	<input type="submit" class="add-row" value="Add">
</from>
<!-- give to end -->
</div>
</div>

<div class="row float-right pb-5">

  <p class="lead ">
    <a class="btn btn-primary btn-lg pl-5 pr-5" href="#" role="button" type="submit">Next</a>
  </p>
	<br><br>
	</div>
	<br><br>
</div>
</div>
<script>
/*
$(document).ready(function(){
		$("#child").hide();
  $("#married").click(function(){
    $("#child").toggle();
  });
	$("#single").click(function(){
		$("#child").hide();
	});
});*/
</script>
</body>
