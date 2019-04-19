<?php
 if($this->session->userdata('will_id')){
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<title>Assets Info</title>

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

<!-- family info containner start -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
	<div class="jumbotron ">
	<!--action="<?php echo base_url(); ?>/Will_controller/save_personal_info"-->
<h1 class=" text-center">Assets Info</h1>
  <div class="row">
    <div class="col-md-6">
  	<div id="box">
      <!-- Executor Information Start  -->
      <ul class="nav nav-tabs">
        <li class="nav-item" style="width:25%;">
          <a class="nav-link active" data-toggle="tab" href="#real_estate"><i class="fa fa-home fa-2x" ></i></br> Real Estate</a>
        </li>
        <li class="nav-item" style="width:25%;">
          <a class="nav-link " data-toggle="tab" href="#bank_assets"><i class="fa fa-university fa-2x" ></i></br> Bank Assets</a>
        </li>
        <li class="nav-item" style="width:25%;">
          <a class="nav-link " data-toggle="tab" href="#vehicle"><i class="fa fa-car fa-2x" ></i></br> Vehicle</a>
        </li>
        <li class="nav-item" style="width:25%;">
          <a class="nav-link " data-toggle="tab" href="#other_gifts "><i class="fa fa-gift fa-2x" ></i></br> Other Gifts </a>
        </li>
      </ul>

      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active show" id="real_estate">
          <form class="" id="assets_form" method="post">
          <input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
          <fieldset></br>
          <h4 class=" text-left">Real Estate : </h4></br>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Estate Types: </label>
      				<div class="col-md-9">
                <select class="form-control clear_dr" name="estate_type" id="estate_type">
                  <option value="0">Select Estate Type</option>
      					  <option>Flat</option>
      					  <option>Shop</option>
      					  <option>Land</option>
      					  <option>Plot</option>
      					  <option> Commercial Shop unit</option>
      					  <option>Commercial office unit</option>
      				 </select>
               <p id="error_estate_type" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

      		<div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">House No / Flat NO : </label>
      				<div class="col-md-9">
      					<input type="text" name="house_no" id="house_no" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_house_no" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Survey number: </label>
      				<div class="col-md-9">
      					<input type="text" name="survey_number" id="survey_number" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_survey_number" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Measurement Area: </label>
      				<div class="col-md-5">
      					<input type="text" name="measurment_area" id="measurment_area" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_measurment_area" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
              <div class="col-md-4">
                <select class="form-control clear_dr" name="measurment_unit" id="measurment_unit">
                  <option value="0">Select Unit</option>
      					  <option>Square Meter</option>
      					  <option>Square Feet</option>
      					  <option>Hector</option>
      				 </select>
               <p id="error_measurment_unit" style="color:red; display:none" class="text-left valide">*This field is required.</p>
             </div>
            </div>
          </div>

          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Address : </label>
      				<div class="col-md-9">
      					<input type="text" name="estate_address" id="estate_address" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_estate_address" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">City : </label>
      				<div class="col-md-9">
      					<input type="text" name="estate_city" id="estate_city" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_estate_city" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">PIN/ZIP Code: </label>
      				<div class="col-md-9">
      					<input type="text" name="estate_pin" id="estate_pin" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_estate_pin" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Country: </label>
      				<div class="col-md-9">
      					<input type="text" name="estate_country" id="estate_country" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_estate_country" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">State: </label>
      				<div class="col-md-9">
      					<input type="text" name="estate_state" id="estate_state" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_estate_state" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>
          </fieldset>
          <p style="float:right;">  <button type="button" id="add_assets" class="btn btn-success"  >Add</button></p>
      		</form>
        </div>


        <div class="tab-pane fade" id="bank_assets">
          <form class="" id="bank_assets_form" method="post">
          <input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
          <fieldset></br>
          <h4 class=" text-left">Bank Assets : </h4></br>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Estate Types: </label>
      				<div class="col-md-9">
                <select class="form-control clear_dr" name="assets_type" id="assets_type">
                  <option value="0">Select Estate Type</option>
      					  <option>Savings A/c</option>
      					  <option>Current  A/C</option>
      					  <option>Fixed Deposits</option>
      					  <option>PPF</option>
      					  <option>Bank Locker</option>
      					  <option>Mutual Funds</option>
      					  <option>Stock Equities</option>
      					  <option>Insurance Policy</option>
      				 </select>
               <p id="error_assets_type" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

      		<div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">
                <div id="customer_id" class="hide_num" style="display:none;">Customer ID No: </div>
                <div id="locker_no" class="hide_num" style="display:none;">Locker Number: </div>
                <div id="folio_no" class="hide_num" style="display:none;">Folio Number: </div>
                <div id="serial_no" class="hide_num" style="display:none;">ISIN/Serial Number: </div>
                <div id="policy_no" class="hide_num" style="display:none;">Policy Number: </div>
                <div id="account_no" class="hide_num" >Account Number: </div>
              </label>
      				<div class="col-md-9">
      					<input type="text" name="account_number" id="account_number" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_account_number" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">
                <div id="company_name" class="hide_name" style="display:none;">Company Name: </div> <!--For Mutual Funds and Stock Equities and PPF-->
                <div id="insurance_company" class="hide_name" style="display:none;">Insurance Company: </div> <!--For Mutual Funds -->
                <div id="bank_name" class="hide_name" >Bank Name: </div>
              </label>
      				<div class="col-md-9">
      					<input type="text" name="bank_name" id="bank_name" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_bank_name" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Branch  </label>
      				<div class="col-md-9">
      					<input type="text" name="branch_name" id="branch_name" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_branch_name" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

          <div class="form-group hiden_div" id="fd_recipt_No_div" style="display:none;">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">FD Receipt No  </label>
      				<div class="col-md-9">
      					<input type="text" name="fd_recipt_No" id="fd_recipt_No" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_fd_recipt_No" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

          <div class="form-group hiden_div" id="key_number_div" style="display:none;">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Key Number  </label>
      				<div class="col-md-9">
      					<input type="text" name="key_number" id="key_number" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_key_number" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>
          </fieldset>
          <p style="float:right;">  <button type="button" id="add_bank_assets" class="btn btn-success"  >Add</button></p>
      		</form>
        </div>

        <!-- Vehicle start -->
        <div class="tab-pane fade" id="vehicle">
          <form class="" id="vehicle_assets_form" method="post">
          <fieldset></br>
          <h4 class=" text-left">Vehicle : </h4></br>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Vehicle Model: </label>
              <div class="col-md-9">
      					<input type="text" name="vehicle_model" id="vehicle_model" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_vehicle_model" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

      		<div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Make Year: </label>
      				<div class="col-md-9">
      					<input type="text" name="vehicle_make_year" id="vehicle_make_year" class="form-control clear"  aria-describedby="emailHelp" >
                  <p id="error_vehicle_make_year" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>

          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Registration Number: </label>
      				<div class="col-md-9">
      					<input type="text" name="registration_number" id="registration_number" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_registration_number" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>
          </fieldset>
          <p style="float:right;">  <button type="button" id="add_vehicle_assets" class="btn btn-success"  >Add</button></p>
      		</form>
        </div>
        <!-- Vehicle end -->

        <!-- Other Gift start -->
        <div class="tab-pane fade" id="other_gifts">
          <form class="" id="other_gift_assets_form" method="post">
          <fieldset></br>
          <h4 class=" text-left">Other Gifts : </h4></br>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Gift Types: </label>
      				<div class="col-md-9">
                <select class="form-control clear_dr" name="gift_type" id="gift_type">
                  <option value="0">Select Gift</option>
      					  <option>Jewellery and Valuables</option>
      					  <option>Remained Assets</option>
      				 </select>
               <p id="error_gift_type" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>

            </div>
          </div>

      		<div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Description: </label>
      				<div class="col-md-9">
      					<input type="text" name="gift_description" id="gift_description" class="form-control clear"  aria-describedby="emailHelp" >
                <p id="error_gift_description" style="color:red; display:none" class="text-left valide">*This field is required.</p>
              </div>
            </div>
          </div>
          </fieldset>
          <p style="float:right;">  <button type="button" id="add_other_gift_assets" class="btn btn-success"  >Add</button></p>
      		</form>
        </div>
        <!-- Other Gift end -->

      </div>
      <!-- Executor Information End  -->
      <!-- Funeral and Burial Information Start  -->
</br></br>
      <!-- Funeral and Burial Information End  -->
      <div>
      <p>  <a href="<?php echo base_url() ?>/Will_controller/executor_funeral_view" type="button" id="personal_previous" class="btn btn-info">Previous</a>
  		<button type="button" id="destroy" class="btn btn-danger">Clear session</button>
  		<a href="<?php echo base_url() ?>/Will_controller/witness_info_view" style="float:right;" type="button" id="personal_next" class="btn btn-info" >Next</a></p>
    </div>
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

    </br>
    <div class="container" style="background-color:white;">
    <table id="table_executor" class="table table-bordered table_executor">
      <thead>
        <tr>
          <th>Executor Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>


    <div class="container" style="background-color:white;">
    <table id="table_funeral" class="table table-bordered table_funeral">
      <thead>
        <tr>
          <th>Funeral Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>
</br>
    <div class="container" style="background-color:white;">
      <b>Assets Information</b>
    <table id="table_real_estate" class="table table-bordered table_real_estate">
      <thead>
        <tr>
          <th>Real Estate Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_bank_assets" class="table table-bordered table_bank_assets">
      <thead>
        <tr>
          <th>Bank Assets Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_vehicle" class="table table-bordered table_vehicle">
      <thead>
        <tr>
          <th>Vehicle Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_gift" class="table table-bordered table_gift">
      <thead>
        <tr>
          <th>Gift Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>

  </div>
  </div>
</div>
</div>
<!-- personal info containner end -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<!-- Custome Javascript file -->
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/islamic_will_custome.js" type="text/javascript"></script>

<script>
// validation start //

// validation Real Estate asif //
$("#estate_type").blur(function(){
  var estate_type = $('#estate_type').val();
  if(estate_type == '0'){
    $('#error_estate_type').show();
  }
  else{
      $('#error_estate_type').hide();
    }
});

$("#house_no").blur(function(){
  var house_no = $('#house_no').val();
  if(house_no == ''){
    $('#error_house_no').show();
  }
  else{
      $('#error_house_no').hide();
    }
});

$("#survey_number").blur(function(){
  var survey_number = $('#survey_number').val();
  if(survey_number == ''){
    $('#error_survey_number').show();
  }
  else{
      $('#error_survey_number').hide();
    }
});

$("#measurment_area").blur(function(){
  var measurment_area = $('#measurment_area').val();
  if(measurment_area == ''){
    $('#error_measurment_area').show();
  }
  else{
      $('#error_measurment_area').hide();
    }
});

$("#measurment_unit").blur(function(){
  var measurment_unit = $('#measurment_unit').val();
  if(measurment_unit == '0'){
    $('#error_measurment_unit').show();
  }
  else{
      $('#error_measurment_unit').hide();
    }
});

$("#estate_address").blur(function(){
  var estate_address = $('#estate_address').val();
  if(estate_address == ''){
    $('#error_estate_address').show();
  }
  else{
      $('#error_estate_address').hide();
    }
});

$("#estate_city").blur(function(){
  var estate_city = $('#estate_city').val();
  if(estate_city == ''){
    $('#error_estate_city').show();
  }
  else{
      $('#error_estate_city').hide();
    }
});

$("#estate_pin").blur(function(){
  var estate_pin = $('#estate_pin').val();
  	var estate_pin_format = /^[0-9]{6}$/;
  if(!estate_pin_format.test(estate_pin) || estate_pin == ''){
    $('#error_estate_pin').show();
  }
  else{
      $('#error_estate_pin').hide();
    }
});

$("#estate_country").blur(function(){
  var estate_country = $('#estate_country').val();
  if(estate_country == ''){
    $('#error_estate_country').show();
  }
  else{
      $('#error_estate_country').hide();
    }
});

$("#estate_state").blur(function(){
  var estate_state = $('#estate_state').val();
  if(estate_state == ''){
    $('#error_estate_state').show();
  }
  else{
      $('#error_estate_state').hide();
    }
});


// validation Bank asif //

$("#assets_type").blur(function(){
  var assets_type = $('#assets_type').val();
  if(assets_type == '0'){
    $('#error_assets_type').show();
  }
  else{
      $('#error_assets_type').hide();
    }
});

$("#account_number").blur(function(){
  var account_number = $('#account_number').val();
  if(account_number == ''){
    $('#error_account_number').show();
  }
  else{
      $('#error_account_number').hide();
    }
});

$("#bank_name").blur(function(){
  var bank_name = $('#bank_name').val();
  if(bank_name == ''){
    $('#error_bank_name').show();
  }
  else{
      $('#error_bank_name').hide();
    }
});


$("#branch_name").blur(function(){
  var branch_name = $('#branch_name').val();
  if(branch_name == ''){
    $('#error_branch_name').show();
  }
  else{
      $('#error_branch_name').hide();
    }
});

$("#key_number").blur(function(){
  var key_number = $('#key_number').val();
  if(key_number == ''){
    $('#error_key_number').show();
  }
  else{
      $('#error_key_number').hide();
    }
});

// validation vehicle asif //

$("#vehicle_model").blur(function(){
  var vehicle_model = $('#vehicle_model').val();
  if(vehicle_model == ''){
    $('#error_vehicle_model').show();
  }
  else{
      $('#error_vehicle_model').hide();
    }
});

$("#vehicle_make_year").blur(function(){
  var vehicle_make_year = $('#vehicle_make_year').val();
  if(vehicle_make_year == ''){
    $('#error_vehicle_make_year').show();
  }
  else{
      $('#error_vehicle_make_year').hide();
    }
});

$("#registration_number").blur(function(){
  var registration_number = $('#registration_number').val();
  if(registration_number == ''){
    $('#error_registration_number').show();
  }
  else{
      $('#error_registration_number').hide();
    }
});

// validation Other git asif //

$("#gift_type").blur(function(){
  var gift_type = $('#gift_type').val();
  if(gift_type == '0'){
    $('#error_gift_type').show();
  }
  else{
      $('#error_gift_type').hide();
    }
});

$("#gift_description").blur(function(){
  var gift_description = $('#gift_description').val();
  if(gift_description == ''){
    $('#error_gift_description').show();
  }
  else{
      $('#error_gift_description').hide();
    }
});

// validation end asif //

</script>
</body>
<?php } ?>
