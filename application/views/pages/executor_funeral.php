<?php
 if($this->session->userdata('will_id')){
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<title>Executor & Funeral Info</title>

 <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.structure.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.theme.min.css');?>" rel="stylesheet">
 <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


<!-- status bar satrt -->
<div class="container-fluid">
<br /><br />
<ul class="list-unstyled multi-steps">

	<li  >Personal Information</li>
	<li >Family Information</li>
	<li class="is-active">Executor</li>
	<li >Assets</li>
	<li>Witness</li>
</ul>
</div>
 <!-- end status bar -->


<!-- family info containner start -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
	<!-- <div class="jumbotron "> -->
	<!--action="<?php echo base_url(); ?>/Will_controller/save_personal_info"-->
<br>
  <div class="row">
    <div class="col-md-6">
  	<div id="box" >
      <!-- Executor Information Start  -->
      <div class="personal_info1" style=" margin-right: -18px;">
  		<form class="" id="executor_form" method="post">
      <input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
      <fieldset>
      <h3 class=" text-left">Executor: </h3>
      <div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Executor Name: </label>
  				<div class="col-md-9">
  					<input type="text" name="executor_name" id="executor_name" class="form-control clear"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Address: </label>
  				<div class="col-md-9">
  					<input type="text" name="executor_address" id="executor_address" class="form-control clear"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Age: </label>
  				<div class="col-md-9">
  					<input type="number" name="executor_age" id="executor_age" class="form-control clear"  aria-describedby="emailHelp" placeholder="Enter executor age in year" >
          </div>
        </div>
      </div>
        <p>  <button type="button" id="add_executor" class="btn btn-success" >Add</button></p>
      </fieldset>
  		</form>
    </div>
      <!-- Executor Information End  -->
      <!-- Funeral and Burial Information Start  -->
      <div class="personal_info1 " style=" margin-right: -18px;" >
      <form class="" id="funeral_form" method="post">
      <fieldset>
      <h3 class=" text-left">Funeral and Burial: </h3>
      <div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Funeral and Burial Person Name: </label>
  				<div class="col-md-9">
  					<input type="text" name="funeral_name" id="funeral_name" class="form-control clear"  aria-describedby="emailHelp" >
            <p id="error_funeral_name" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
        </div>
      </div>

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Address: </label>
  				<div class="col-md-9">
  					<input type="text" name="funeral_address" id="funeral_address" class="form-control clear"  aria-describedby="emailHelp" >
            <p id="error_funeral_address" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
        </div>
      </div>
      </fieldset>
      <p>  <button type="button" id="add_funeral" class="btn btn-success"  >Add</button></p>
  		</form>
      <!-- Funeral and Burial Information End  -->
      <br><br>
  </div>
  <p>  <a href="<?php echo base_url() ?>/Will_controller/family_info_view" type="button" id="personal_previous" class="btn btn-info">Previous</a>
  <!-- <button type="button" id="destroy" class="btn btn-danger">Clear session</button> -->
  <a href="<?php echo base_url() ?>/Will_controller/assets_info_view" type="button" id="personal_next" class="btn btn-info" style="float:right;">Next</a></p>
</div>
  </div>

  <div class="col-md-6">
  	<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">

    <div class="container" >
    	<div class="" style="">
        <table id="table_personal_info" class=" personal_data_dispaly table_personal_info">
          <thead>
            <tr>
              <th>Personal Info <br>
                <hr>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr><td>
              <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1" >Name :</label>
    						<label class="col-md-8 text-left" id="lbl_name" style="font-weight:600;"></label>
    		      </div>

    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">Mobile :</label>
    						<label class="col-md-8 text-left" id="lbl_mobile"></label>
    		      </div>

    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">Email :</label>
    						<label class="col-md-8 text-left" id="lbl_email"></label>
    		      </div>
    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">Address :</label>
    						<label class="col-md-8 text-left" id="lbl_address"></label>
    		      </div>
    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">Occupation :</label>
    						<label class="col-md-8 text-left" id="lbl_occupation"></label>
    		      </div>
    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">Aadhar No :</label>
    						<label class="col-md-8 text-left" id="lbl_aadhar"></label>
    		      </div>
    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">PAN No :</label>
    						<label class="col-md-8 text-left" id="lbl_pan"></label>
    		      </div>
            </td></tr>
          </tbody>
        </table>
      </div>
    </div>

    </br>
    <div class="container" style="background-color:white;">
    <table id="table_family_member" class=" personal_data_dispaly table_family_member" style=" width:100%;">
      <thead>
        <tr>
          <th>Family Member Info
            <br>
              <hr>
          </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>

    <div class="container" style="background-color:white;">
    <table id="table_executor" class=" personal_data_dispaly table_executor" style=" width:100%;">
      <thead>
        <tr>
          <th>Executor Info
            <br>
              <hr>
          </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>


    <div class="container" style="background-color:white;">
    <table id="table_funeral" class=" personal_data_dispaly table_funeral" style=" width:100%;" >
      <thead>
        <tr>
          <th>Funeral Info
            <br>
              <hr>
          </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>

  </div>
  </div>
<!-- </div> -->
</div>
<!-- personal info containner end -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<!-- Custome Javascript file -->
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/islamic_will_custome.js" type="text/javascript"></script>
</body>

<script>

// start add validation asif
// $('#add_funeral').click(function(){
//           var funeral_name = $('#funeral_name').val();
//             var funeral_address = $('#funeral_address').val();
//
//           if(family_person_name == ''){
//             $('#error_funeral_name').show();
//           }
//
//           if(funeral_address == ''){
//             $('#error_funeral_address').show();
//           }
//
//           else {
//               $('.valide').hide();
//           }
// });

// end add validation asif

//  strat validation asif
$("#funeral_name").blur(function(){
  var funeral_name = $('#funeral_name').val();
  var funeral_name_format =  /^[a-zA-Z ]*$/;
  if(!funeral_name_format.test(funeral_name) || funeral_name == ''){
    $('#error_funeral_name').show();
  }
  else{
      $('#error_funeral_name').hide();
    }
});

$("#funeral_address").blur(function(){
  var funeral_address = $('#funeral_address').val();
  if( funeral_address == ''){
    $('#error_funeral_address').show();
  }
  else{
      $('#error_funeral_address').hide();
    }
});
//  end validation asif
</script>


<?php } ?>
