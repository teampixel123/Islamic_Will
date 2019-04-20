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
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
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

<!-- personal info containner start  asif change -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
	<div class="jumbotron ">

			<!--action="<?php echo base_url(); ?>/Will_controller/save_personal_info"-->
<h1 class=" text-center">Personal Information</h1>
<div class="row">
  <div class="col-md-6">
	<div id="box">
		<form class="" id="personal_info_form" method="post">
  <fieldset>
    <div class="form-group">
      <div class="row text-center">
        <label class="col-md-3 text-right" for="exampleInputEmail1">Full Name</label>
				<div class="col-md-3">
					<select class="form-control" name="name_title" id="name_title">
					 <option>Mr.</option>
					 <option>Miss.</option>
					 <option>Mrs.</option>
				 </select>
        </div>
        <div class="col-md-6">
					<input type="text" name="full_name"  id="full_name"class="form-control empty" id="exampleInputEmail1" aria-describedby="emailHelp" >
					<p id="error_name" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
				</div>
      </div>
    </div>

		<div class="form-group" id="marital_status_div">
      <div class="row text-center">
        <label class="col-md-3 text-right" for="exampleInputEmail1">Marital status</label>
				<div class="col-md-9">
					<select class="form-control" name="marital_status" id="marital_status">
					<option value="0">select </option>
					 <option>Married</option>
					 <option>Unmarried</option>
					 <option id="widove">Widove</option>
					 <option>Divorcee</option>
				 </select>
				 <p id="error_marital_status" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

		<div class="form-group" id="have_child_div">
      <div class="row text-center">
        <label class="col-md-3 text-right" for="exampleInputEmail1">Have Child</label>
				<div class="col-md-9">
					<select class="form-control" name="is_have_child" id="is_have_child">
					<option value="0">select </option>
					 <option value="1">Yes</option>
					 <option value="0">No</option>
				 </select>
				 <p id="error_is_have_child" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

		<div class="form-group" id="have_child_div">
      <div class="row text-center">
        <label class="col-md-3 text-right" for="exampleInputEmail1">Gender</label>
				<div class="col-md-9">
					<select class="form-control" name="gender" id="gender">
					<option value="0">select </option>
					 <option>Male</option>
					 <option>Female</option>
				 </select>
				 <p id="error_gender" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

		<div class="form-group" id="have_child_div">
      <div class="row text-center">
        <label class="col-md-3 text-right" for="exampleInputEmail1">Age</label>
				<div class="col-md-9">
					<input type="number" name="age" class="form-control empty" id="age" aria-describedby="emailHelp" required >
					<p id="error_age" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Address</label>
        </div>
        <div class="col-md-9">
          <input type="text" name="address" class="form-control" id="address" aria-describedby="emailHelp" required>
					<p id="error_address" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">City</label>
        </div>
        <div class="col-md-9">
          <input type="text" name="city" class="form-control" id="city" aria-describedby="emailHelp" >
					<p id="error_city" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Pin Code</label>
        </div>
        <div class="col-md-9">
          <input type="number" name="pin_code" class="form-control" id="pin_code" aria-describedby="emailHelp" >
					<p id="error_pin_code" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">State</label>
        </div>
        <div class="col-md-9">
          <input type="text" name="state" class="form-control" id="state" aria-describedby="emailHelp" >
					<p id="error_state" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Country</label>
        </div>
        <div class="col-md-9">
          <input type="text" name="country" class="form-control" id="country" aria-describedby="emailHelp" >
					<p id="error_country" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Mobile No</label>
        </div>
        <div class="col-md-9">
          <input type="number" name="mobile_no" class="form-control" id="mobile_no" aria-describedby="emailHelp" >
					<p id="error_mobile_no" style="color:red; display:none" class="text-left invalide">*Please enter a valid number.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Email</label>
        </div>
        <div class="col-md-9">
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" >
					<p id="error_email" style="color:red; display:none" class="text-left invalide">*Please enter a valid email address.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Occupation</label>
        </div>
        <div class="col-md-9">
          <input type="text" name="occupation" class="form-control" id="occupation" aria-describedby="emailHelp" >
					<p id="error_occupation" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">Aadhar No</label>
        </div>
        <div class="col-md-9">
          <input type="number" name="aadhar_no" class="form-control" id="aadhar_no" aria-describedby="emailHelp" >
					<p id="error_aadhar_no" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-3 text-right">
          <label for="exampleInputEmail1">PAN No</label>
        </div>
        <div class="col-md-9">
          <input type="text" name="pan_no" class="form-control" id="pan_no" aria-describedby="emailHelp" >
        </div>
      </div>
    </div>
		</form>
</div>
    <button type="button" id="save_personal_data" class="btn btn-success" style="float:right;">Save & Next</button>
		<button type="button" id="update_personal_data" class="btn btn-info" style="float:right;">Update & Next</button>
		<button type="button" id="destroy" class="btn btn-danger">Clear session</button>
		<!--a href="<?php echo base_url() ?>/Will_controller/family_info_view" type="button" id="personal_next" class="btn btn-info">Next</a-->
  </fieldset>
</div>
<div class="col-md-6">
<?php if($this->session->userdata('will_id')){	?>
	<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
<?php } ?>
  <div class="container" style="background-color:white;">
  	<div class="" style="">
			<form>
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
			</form>
    </div>
  </div>
</div>
</div>

</div>
</div>
<!-- personal info containner end  asif change -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<?php
// Fill Up form data on page load if session is set...
	if ($this->session->userdata('will_id')) {
?>

<script>
$(document).ready(function(){
  $('#save_personal_data').hide();
  $('#update_personal_data').show();

  var will_id = $('#will_id').val();

  $.ajax({
    data: { 'will_id' : will_id  },
    type: "post",
    url: "<?php echo base_url(); ?>/Will_controller/get_personal_info",
    success: function (data){
      var info = JSON.parse(data);
      $('#lbl_name').text(info[0]['full_name']);
      $('#lbl_mobile').text(info[0]['mobile_no']);
      $('#lbl_email').text(info[0]['email']);
      $('#lbl_address').text(info[0]['address']+', '+info[0]['city']+'-'+info[0]['pin_code']+', '+info[0]['state']+', '+info[0]['country']);
      $('#lbl_occupation').text(info[0]['occupation']);
      $('#lbl_aadhar').text(info[0]['aadhar_no']);
      $('#lbl_pan').text(info[0]['pan_no']);

      $('#full_name').val(info[0]['full_name']);
      $('#mobile_no').val(info[0]['mobile_no']);
      $('#email').val(info[0]['email']);
      $('#address').val(info[0]['address']);
      $('#city').val(info[0]['city']);
      $('#pin_code').val(info[0]['pin_code']);
      $('#state').val(info[0]['state']);
      $('#country').val(info[0]['country']);
      $('#occupation').val(info[0]['occupation']);
      $('#aadhar_no').val(info[0]['aadhar_no']);
      $('#pan_no').val(info[0]['pan_no']);
      $('#name_title').val(info[0]['name_title']);
      $('#marital_status').val(info[0]['marital_status']);
      $('#age').val(info[0]['age']);

      $('#save_personal_data').hide();
      $('#update_personal_data').show();
    }
  });
});
</script>
<?php }
else{ ?>
	<script>
	$(document).ready(function(){
		$('#save_personal_data').show();
		$('#update_personal_data').hide();
	});
	</script>
<?php } ?>


<script>
//ok
$(document).ready(function(){
		$("#child").hide();
  	$("#married").click(function(){
    	$("#child").toggle();
  	});
		$("#single").click(function(){
			$("#child").hide();
		});

		$('#name_title').change(function(){
			var title = $('#name_title').val();
			if(title == 'Mr.'){
				$('#marital_status_div').show();
				$('#widove').hide();
				$('#have_child_div').show();
			}
			else if (title == 'Mrs.') {
				$('#marital_status_div').show();
				$('#widove').show();
				$('#have_child_div').show();
			}
			else
			{
				$('#marital_status_div').hide();
				$('#have_child_div').hide();
			}
		});

			$('#marital_status').change(function(){
				$status = $('#marital_status').val();
				if($status == 'Unmarried'){
					$('#have_child_div').hide();
				}
				else{
					$('#have_child_div').show();
				}
			});

		//	save_personal_data
		$('#save_personal_data').click(function(){
				// save validation $start
				var full_name = $('#full_name').val();
				var marital_status = $('#marital_status').val();
				var is_have_child = $('#is_have_child').val();
				var gender = $('#gender').val();
				var age = $('#age').val();
				var mobile_no = $('#mobile_no').val();
				var email = $('#email').val();
				var address = $('#address').val();
				var city = $('#city').val();
				var state = $('#state').val();
				var country = $('#country').val();
				var occupation = $('#occupation').val();
				var pin_code = $('#pin_code').val();
				var aadhar_no = $('#aadhar_no').val();
				var pin_code_format = /^[0-9]{6}$/;
				var aadhar_no_format = /^[0-9]{12}$/;
				var mobile_format = /^[7-9][0-9]{9}$/;
				var email_format = /^[a-z0-9._%+-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;


					if(full_name == ''){
						$('#error_name').show();
					}

					if(marital_status == '0'){
						$('#error_marital_status').show();
					}

					if(is_have_child == '0'){
						$('#error_is_have_child').show();
					}

					if(gender == '0'){
						$('#error_gender').show();
					}

					if(age == '' || age == '' )
					{
						$('#error_age').show();
					}

					if(!mobile_format.test(mobile_no) || mobile_no == '') {
					$('#error_mobile_no').show();
				 }

				 if(!email_format.test(email) || email == '') {
					$('#error_email').show();
				 }

				if(address == ''){
					$('#error_address').show();
				}

				if(city == ''){
					$('#error_city').show();
				}

				if(state == ''){
				 $('#error_state').show();
			 }

				if(country == ''){
				 $('#error_country').show();
			 }

				if(occupation == ''){
				 $('#error_occupation').show();
			 }

				if(!pin_code_format.test(pin_code) || pin_code == '') {
				$('#error_pin_code').show();
			 }

				if(!aadhar_no_format.test(aadhar_no) || aadhar_no == '') {
					 $('#error_aadhar_no').show();
						 }
				else {
					 $('.invalide').hide();
						// alert('ok');

						var form_data = $('#personal_info_form').serialize();
						$.ajax({
							data: form_data,
							type: "post",
							url: "<?php echo base_url(); ?>/Will_controller/save_personal_info",
							success: function (data){
								var info = JSON.parse(data);
								$('#lbl_name').text(info[0]['full_name']);
								$('#lbl_mobile').text(info[0]['mobile_no']);
								$('#lbl_email').text(info[0]['email']);
								$('#lbl_address').text(info[0]['address']+', '+info[0]['city']+'-'+info[0]['pin_code']+', '+info[0]['state']+', '+info[0]['country']);
								$('#lbl_occupation').text(info[0]['occupation']);
								$('#lbl_aadhar').text(info[0]['aadhar_no']);
								$('#lbl_pan').text(info[0]['pan_no']);

								$('#save_personal_data').hide();
								$('#update_personal_data').show();

								window.location.href = "<?php echo base_url() ?>/Will_controller/family_info_view";
							}
						});

					}

				// Validation end asif


				 // save validation end


		});
		// Validation satrt asif

		$("#full_name").blur(function(){
			var full_name = $('#full_name').val();
			if(full_name == ''){
				$('#error_name').show();
			}
			else{
					$('#error_name').hide();
				}
		});


		$("#marital_status").blur(function(){
			var marital_status = $('#marital_status').val();
			if(marital_status == '0'){
				$('#error_marital_status').show();
			}
			else{
				$('#error_marital_status').hide();
				}

		});


		$("#is_have_child").blur(function(){
			var is_have_child = $('#is_have_child').val();
			if(is_have_child == '0'){
				$('#error_is_have_child').show();
			}
			else{
				$('#error_is_have_child').hide();
				}

		});


		$("#gender").blur(function(){
			var gender = $('#gender').val();
			if(gender == '0'){
				$('#error_gender').show();
			}
			else{
				$('#error_gender').hide();
				}

		});


		$("#age").blur(function(){
			var age = $('#age').val();
			if(age == '' || age == '' )
			{
				$('#error_age').show();
			}
			else{
				$('#error_age').hide();
				}

		});


		$("#mobile_no").blur(function(){
			var mobile_no = $('#mobile_no').val();
 		 var mobile_format = /^[7-9][0-9]{9}$/;
			if(!mobile_format.test(mobile_no) || mobile_no == '') {
			$('#error_mobile_no').show();
		 }
			else{
				$('#error_mobile_no').hide();
				}

		});


	 $("#email").blur(function(){
		 var email = $('#email').val();
 		var email_format = /^[a-z0-9._%+-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;
		 if(!email_format.test(email) || email == '') {
			$('#error_email').show();
		 }
		 else{
			 $('#error_email').hide();
			 }

	 });


	$("#address").blur(function(){
		var address = $('#address').val();
		if(address == ''){
			$('#error_address').show();
		}
		else{
			$('#error_address').hide();
			}

	});


	$("#city").blur(function(){
		var city = $('#city').val();
		if(city == ''){
			$('#error_city').show();
		}
		else{
			$('#error_city').hide();
			}

	});


	$("#state").blur(function(){
		var state = $('#state').val();
		if(state == ''){
		 $('#error_state').show();
	 }
		else{
			$('#error_state').hide();
			}

	});


	$("#country").blur(function(){
		var country = $('#country').val();
		if(country == ''){
		 $('#error_country').show();
	 }
		else{
			$('#error_country').hide();
			}

	});


	$("#occupation").blur(function(){
		var occupation = $('#occupation').val();
		if(occupation == ''){
		 $('#error_occupation').show();
	 }
		else{
			$('#error_occupation').hide();
			}

	});


	$("#pin_code").blur(function(){
		var pin_code = $('#pin_code').val();
		var pin_code_format = /^[0-9]{6}$/;

		if(!pin_code_format.test(pin_code) || pin_code == '') {
		$('#error_pin_code').show();
	 }
		else{
			$('#error_pin_code').hide();
			}

	});



	$("#aadhar_no").blur(function(){
		var aadhar_no = $('#aadhar_no').val();
		var aadhar_no_format = /^[0-9]{12}$/;

		if(!aadhar_no_format.test(aadhar_no) || aadhar_no == '') {
			 $('#error_aadhar_no').show();
				 }
		else {
			$('#error_aadhar_no').hide();
			}

	});

		// Validation end asif


		$('#update_personal_data').click(function(){
		  var full_name = $('#full_name').val();
			var marital_status = $('#marital_status').val();
			var is_have_child = $('#is_have_child').val();
			var gender = $('#gender').val();
			var age = $('#age').val();
		  var mobile_no = $('#mobile_no').val();
			var email = $('#email').val();
			var address = $('#address').val();
			var city = $('#city').val();
			var state = $('#state').val();
			var country = $('#country').val();
			var occupation = $('#occupation').val();
			var pin_code = $('#pin_code').val();
			var aadhar_no = $('#aadhar_no').val();
			var pin_code_format = /^[0-9]{6}$/;
			var aadhar_no_format = /^[0-9]{12}$/;
			var mobile_format = /^[7-9][0-9]{9}$/;
			var email_format = /^[a-z0-9._%+-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;


				if(full_name == ''){
					$('#error_name').show();
				}

				if(marital_status == '0'){
					$('#error_marital_status').show();
				}

				if(is_have_child == '0'){
					$('#error_is_have_child').show();
				}

				if(gender == '0'){
					$('#error_gender').show();
				}

				if(age == '' || age == '' )
				{
					$('#error_age').show();
				}

				if(!mobile_format.test(mobile_no) || mobile_no == '') {
				$('#error_mobile_no').show();
			 }

			 if(!email_format.test(email) || email == '') {
				$('#error_email').show();
			 }

			if(address == ''){
				$('#error_address').show();
			}

			if(city == ''){
				$('#error_city').show();
			}

			if(state == ''){
			 $('#error_state').show();
		 }

			if(country == ''){
			 $('#error_country').show();
		 }

			if(occupation == ''){
			 $('#error_occupation').show();
		 }

			if(!pin_code_format.test(pin_code) || pin_code == '') {
			$('#error_pin_code').show();
		 }

			if(!aadhar_no_format.test(aadhar_no) || aadhar_no == '') {
				 $('#error_aadhar_no').show();
					 }
			else {
						 $('.invalide').hide();
						 var form_data = $('#personal_info_form').serialize();
		 				$.ajax({
		 					data: form_data,
		 					type: "post",
		 					url: "<?php echo base_url(); ?>/Will_controller/update_personal_info",
		 					success: function (data){
		 						var info = JSON.parse(data);
		 						$('#lbl_name').text(info[0]['full_name']);
		 						$('#lbl_mobile').text(info[0]['mobile_no']);
		 						$('#lbl_email').text(info[0]['email']);
		 						$('#lbl_address').text(info[0]['address']+', '+info[0]['city']+'-'+info[0]['pin_code']+', '+info[0]['state']+', '+info[0]['country']);
		 						$('#lbl_occupation').text(info[0]['occupation']);
		 						$('#lbl_aadhar').text(info[0]['aadhar_no']);
		 						$('#lbl_pan').text(info[0]['pan_no']);

		 						$('#save_personal_data').hide();
		 						$('#update_personal_data').show();
		 						window.location.href = "<?php echo base_url() ?>/Will_controller/family_info_view";
		 					}
		 				});
				}

			// Validation end asif


		});

		$('#destroy').click(function(){
			$.ajax({
				type: "post",
				url: "<?php echo base_url(); ?>/Will_controller/destroy_session",
				success: function (data){
					location.reload();
				}
			});
		});

	/*	$('#ok').click(function(){
		var member_name =	$('#member_name').val();
			alert(member_name);
		}); */
});
</script>
</body>
