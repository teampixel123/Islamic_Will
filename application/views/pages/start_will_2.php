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

    <form class="" action="<?php echo base_url(); ?>/Will_controller/store_start_info" method="post">
	<h1 class="display-3 text-center">Start Your Will Now</h1>
	<div class="row text-center">
		<div class="col-lg-4 ml-5 mt-3">
			<h2 class="float-right">SEX :</h2>
		</div>
		<div class="  col-lg-4 ">
      <div class="row">
      	<div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-primary  btn-lg">
          <input type="radio" name="gender" id="option2" autocomplete="off" value="male" > Male
        </label>
        <label class="btn btn-primary btn-lg">
          <input type="radio" name="gender" id="option3" autocomplete="off" value="female"> Female
        </label>
      </div>
      </div>
		</div>
<div class="col-lg-4">
</div>
</div>
<br><br>
<div class="row ">
	<div class="col-lg-4 ml-5 mt-3">
		<h2 class="float-right">Marital Status :</h2>
	</div>
	<div class="col-lg-4 ">
		<div class="row">
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-primary btn-lg">
      	<input type="radio" name="is_married" id="single" autocomplete="off" value="0"> Single
      </label>
      <label class="btn btn-primary btn-lg">
      	<input type="radio" name="is_married" id="married" autocomplete="off" value="1
        "> Married
      </label>
      </div>
    </div>
</div>
<div class="col-lg-4">

</div>
</div>
<br><br>
<div class="row   " id="child" >
	<div class="col-lg-4 ml-5 mt-3 ">
		<h2 class="float-right">Children :</h2>
	</div>
	<div class="col-lg-4 " >
<div class="row">
<div class="btn-group btn-group-toggle" data-toggle="buttons">
<label class="btn btn-primary btn-lg">
	<input type="radio" name="is_have_child" id="" autocomplete="off" value="1"> Yes
</label>
<label class="btn btn-primary btn-lg">
	<input type="radio" name="is_have_child" id="" autocomplete="off" value="0"> No child
</label>
</div>
</div>
</div>
<div class="col-lg-4"></div>
</div>
<br><br>
<div class="row float-right pb-5">
  <p class="lead ">
    <button class="btn btn-primary btn-lg pl-5 pr-5" href="#" role="button">Next</button>
  </p>
	<br><br>
	</div>
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
