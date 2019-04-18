<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<title>Personal Info</title>

 <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.structure.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.theme.min.css');?>" rel="stylesheet">
 <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
</head>
<body>
<!-- navigation bar strat -->
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
<!-- navigation bar end  -->
<div class="container">
	<div class="jumbotron ">
	<!--action="<?php echo base_url(); ?>/Will_controller/save_personal_info"-->
<h1 class=" text-center">Family Information</h1>
  <div class="row">
    <div class="col-md-6">
  	<div id="box">
  		<form class="" id="family_member_form" method="post">

      <fieldset>
      <div class="form-group">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Relation</label>
  				<div class="col-md-6">
  					<select class="form-control clear_dr" name="relationship" id="relationship">
              <option value="0">Select Relationship</option>
  					  <option>Father</option>
  					 <option>Mother</option>
  					 <option>Spouse</option>
  					 <option>Son</option>
  					 <option>Daughter</option>
  					 <option>Brother</option>
  					 <option>Sister</option>
  				 </select>
          </div>
        </div>
      </div>

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Name</label>
  				<div class="col-md-9">
  					<input type="text" name="family_person_name" id="family_person_name" class="form-control clear"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Date of Birth</label>
  				<div class="col-md-9">
  					<input type="text" name="family_person_dob" id="family_person_dob" class="form-control clear"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>

      <div class="form-group" id="age_div" style="display:none">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Age:</label>
  				<div class="col-md-9">
  					<input type="text" name="family_person_age" id="family_person_age" class="form-control clear"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>

      <div id="guardian_div" style="display:none">
    		<input type="hidden" name="is_minar" id="is_minar" class="form-control clear"  aria-describedby="emailHelp" >

        <div class="form-group" id="">
          <div class="row text-center">
            <label class="col-md-3 text-right" for="exampleInputEmail1">Guardian Name</label>
            <div class="col-md-9">
              <input type="text" name="guardian_name" id="guardian_name" class="form-control clear"  aria-describedby="emailHelp" >
            </div>
          </div>
        </div>

        <div class="form-group" id="">
          <div class="row text-center">
            <label class="col-md-3 text-right" for="exampleInputEmail1">Address</label>
            <div class="col-md-9">
              <input type="text" name="guardian_address" id="guardian_address" class="form-control clear"  aria-describedby="emailHelp" >
            </div>
          </div>
        </div>
      </div>
      </fieldset>
  		</form>
      <p>  <button type="button" id="add_family_member" class="btn btn-success" >Add</button></p>
      <p>  <a href="<?php echo base_url() ?>/Will_controller/personal_info_view" type="button" id="personal_previous" class="btn btn-info">Previous</a>
  		<button type="button" id="destroy" class="btn btn-danger">Clear session</button>
  		<a href="<?php echo base_url() ?>/Will_controller/executor_funeral_view" type="button" id="personal_next" class="btn btn-info" >Next</a></p>
  </div>
  </div>

  <div class="col-md-6">
  	<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">

    <div class="container" style="background-color:white;">
    	<div class="" style="">
        <table id="table_personal_info" class="table table-bordered table_personal_info">
          <thead>
            <tr>
              <th>Personal Info</th>
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
          <div class="row" id="f_member">
          </div>
          <!-- Family Memer List -->
      </div>
    </div>
  </br>
    <div class="container" style="background-color:white;">
    <table id="table_family_member" class="table table-bordered table_family_member">
      <thead>
        <tr>
          <th>Family Member Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>
  </div>
  </div>
</div>
<!-- End guardian_info -->
<div class="row float-right pb-5">

<!-- Custome Javascript file -->
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/islamic_will_custome.js" type="text/javascript"></script>
</body>
<?php } ?>
