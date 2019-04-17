<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Personal Info</title>

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

<!-- personal info containner start -->
<div class="container">
	<div class="jumbotron ">
    <form>
	<h1 class=" text-center">Personal Information</h1>
  <?php foreach($personal_data as $personal_data){ ?>
  <fieldset>
    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Full Name : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $personal_data->full_name; ?></label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Marital Status : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $status = $personal_data->marital_status; ?></label>
        </div>
      </div>
    </div>

    <?php if($status == 1){ ?>
    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Child : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php $status = $personal_data->is_have_child; if($status == 0){echo "Dont Have Child";} else{echo "Have Child";}?></label>
        </div>
      </div>
    </div>
  <?php } ?>
    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Address : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $personal_data->address; ?></label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">City : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $personal_data->city; ?></label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Pin Code : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $personal_data->pin_code; ?></label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">State : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $personal_data->state; ?></label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Country : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $personal_data->country; ?></label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Mobile No : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $personal_data->mobile_no; ?></label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Email : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $personal_data->email; ?></label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Occupation : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $personal_data->occupation; ?></label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Aadhar No : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $personal_data->aadhar_no; ?></label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right"></div>
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">PAN No : </label>
        </div>
        <div class="col-md-3 text-left">
          <label for="exampleInputEmail1"><?php echo $personal_data->pan_no; ?></label>
        </div>
      </div>
    </div>
  </fieldset>
<?php } ?>
</form>
</div>
</div>
<!-- personal info containner end -->

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
