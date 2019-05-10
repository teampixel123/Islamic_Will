<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>
<body>
	<?php
		$is_login = $this->session->userdata('user_is_login');
	  if($is_login){
			include('include/login_header.php');
		}
		else{
			include('include/header.php');
		}
	 ?>
<!-- status bar satrt -->
<div class="container-fluid">
<br /><br />
<ul class="list-unstyled multi-steps">
	<li class="is-active" >Personal Information</li>
	<li >Family Information</li>
	<li >Assets</li>
	<li >Executor</li>
	<li>Witness</li>
</ul>
</div>
 <!-- end status bar -->


<!-- personal info containner start  asif change -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
	<!-- <div class="jumbotron "> -->
	<!-- <h1 class="heading">Personal Information</h1>
			<!--action="<?php echo base_url(); ?>/Will_controller/save_personal_info"--> <br>
<div class="row ">
  <div class="col-md-7 personal_info1 " >
	<div id="box">
		<form class="" id="personal_info_form" method="post">
  <fieldset>
		<h3 class=" text-left">Personal Information </h3><br>
    <!-- <div class="form-group">
      <div class="row text-center">
        <label class="col-md-2 text-right" for="exampleInputEmail1">Full Name</label>
				<div class="col-md-3">
					<select class="form-control" name="name_title" id="name_title">
					 <option>Mr.</option>
					 <option>Miss.</option>
					 <option>Mrs.</option>
				 </select>
        </div>
        <div class="col-md-7">
					<input type="text" name="full_name"  id="full_name"class="form-control empty" id="exampleInputEmail1" placeholder="Firstname Middlename Lastname" >
					<p id="error_name" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
				</div>
      </div>
    </div> -->

		<!-- <div class="form-group" id="" >
      <div class="row text-center">
			<div class="col-md-2 marital_status1 marital_status_div" >
        <label class=" text-right" for="exampleInputEmail1">Marital status</label>
			</div>
				<div class="col-md-4 marital_status_div">
					<select class="form-control" name="marital_status" id="marital_status">
					<option value="0">select </option>
					 <option>Married</option>
					 <option>Unmarried</option>
					 <option id="Widove">Widove</option>
					 <option>Divorcee</option>
				 </select>
				 <p id="error_marital_status" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>

			<div class="col-md-2 have_child_div">
				<label class=" text-right" for="exampleInputEmail1">Child</label>
			</div>
				<div class="col-md-4 have_child_div">
					<div class="row">
					<div class="custom-control custom-radio col-md-6">
			      <input type="radio" id="child_yes" name="is_have_child" class="custom-control-input" value="1" checked="">
			      <label class="custom-control-label" for="child_yes">Yes</label>
			    </div>
					<div class="custom-control custom-radio col-md-6">
			      <input type="radio" id="child_no" name="is_have_child" value="0" class="custom-control-input">
			      <label class="custom-control-label" for="child_no">No</label>
			    </div>
				</div>
				 <p id="error_is_have_child" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
				</div>
      </div>
    </div> -->

		<div class="form-group" id="">
      <div class="row text-center">
        <!-- <label class="col-md-2 text-right" for="exampleInputEmail1">Gender</label>
				<div class="col-md-4">
					<div class="row">
						<div class="custom-control custom-radio col-md-6">
					    <input type="radio" id="gender_male" name="gender" class="custom-control-input" value="Male" checked="">
					    <label class="custom-control-label" for="gender_male">Male</label>
					  </div>
					  <div class="custom-control custom-radio col-md-6">
					    <input type="radio" id="gender_female" name="gender" class="custom-control-input" value="Female">
					    <label class="custom-control-label" for="gender_female">Female</label>
					  </div>
					</div>
				 <p id="error_gender" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div> -->

      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Address</label>
        </div>
        <div class="col-md-10">
          <input type="text" name="address" class="form-control" id="address" aria-describedby="emailHelp" required>
					<p id="error_address" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-2 text-right">
          <label for="exampleInputEmail1">City</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="city" class="form-control  " id="city" aria-describedby="emailHelp" >
					<p id="error_city" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>

				<div class="col-md-2 text-right marital_status1">
          <label for="exampleInputEmail1">Pin Code</label>
        </div>
        <div class="col-md-4">
          <input type="number" name="pin_code" class="form-control" id="pin_code" aria-describedby="emailHelp" >
					<p id="error_pin_code" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
				<div class="col-md-2 text-right">
          <label for="exampleInputEmail1">State</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="state" class="form-control" id="state" aria-describedby="emailHelp" >
					<p id="error_state" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>

				<div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Country</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="country" class="form-control" id="country" aria-describedby="emailHelp" >
					<p id="error_country" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>

      </div>
    </div>

    <!-- <div class="form-group">
      <div class="row text-center">
        <div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Mobile No</label>
        </div>
        <div class="col-md-4">
          <input type="number" name="mobile_no" class="form-control" id="mobile_no" aria-describedby="emailHelp" >
					<p id="error_mobile_no" style="color:red; display:none" class="text-left invalide">*Please enter a valid number.</p>
        </div>

				<div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Email</label>
        </div>
        <div class="col-md-4">
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" >
					<p id="error_email" style="color:red; display:none" class="text-left invalide">*Please enter a valid email address.</p>
        </div>

      </div>
    </div> -->

    <div class="form-group">
      <div class="row text-center">
				<label class="col-md-2 text-right" for="exampleInputEmail1">Age</label>
				<div class="col-md-4">
					<input type="number" name="age" class="form-control empty   " id="age" aria-describedby="emailHelp" required >
					<p id="error_age" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
				</div>

        <div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Occupation</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="occupation" class="form-control " id="occupation" aria-describedby="emailHelp" >
					<p id="error_occupation" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>



      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
				<div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Aadhar No</label>
        </div>
        <div class="col-md-4">
          <input type="number" name="aadhar_no" class="form-control" id="aadhar_no" aria-describedby="emailHelp" >
					<p id="error_aadhar_no" style="color:red; display:none" class="text-left invalide">*This field is required.</p>
        </div>
        <div class="col-md-2 text-right">
          <label for="exampleInputEmail1">PAN No</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="pan_no" class="form-control" id="pan_no" aria-describedby="emailHelp" >
        </div>
      </div>
    </div>
		</form>
</div>
<p id="error_mobile_exist" style="color:red; display:none;" class="text-left invalide_mob_mail">*This mobile number is exist. Please go to <a href="<?php echo base_url(); ?>Will_controller/login"><b>Login</b></a></p>
<p id="error_email_exist" style="color:red; display:none;" class="text-left invalide_mob_mail">*This email id is exist. Please go to <a href="<?php echo base_url(); ?>Will_controller/login"><b>Login</b></a></p>
    <button type="submit" id="save_personal_data" class="btn btn-success" style="float:right;">Save & Next</button>
		<p style="float:right;"><button type="button" id="update_personal_data" class="btn btn-info" >Update</button>
		<button type="button" id="next_page" class="btn btn-info" >Next</button></p>
		<button type="button" id="destroy" class="btn btn-danger">Clear session</button>
		<!--a href="<?php echo base_url() ?>/Will_controller/family_info_view" type="button" id="personal_next" class="btn btn-info">Next</a-->
  </fieldset>
</div>

<div class="col-md-5 personal_info">
<?php if($this->session->userdata('will_id')){	?>
	<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
<?php } ?>
  <div class="container personal_data_dispaly " >
  	<div class="" >
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
		      <!-- <div class="row text-center">
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
		      </div> -->
			</form>
    </div>
  </div>
</div>
</div>

<!-- </div> -->
</div>
<!-- personal info containner end  asif change -->

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script> -->

<script>
$(document).ready(function(){
  //$('#save_personal_data').hide();
  //$('#update_personal_data').show();

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
      // $('#lbl_address').text(info[0]['address']+', '+info[0]['city']+'-'+info[0]['pin_code']+', '+info[0]['state']+', '+info[0]['country']);
      // $('#lbl_occupation').text(info[0]['occupation']);
      // $('#lbl_aadhar').text(info[0]['aadhar_no']);
      // $('#lbl_pan').text(info[0]['pan_no']);

      // $('#full_name').val(info[0]['full_name']);
      // $('#mobile_no').val(info[0]['mobile_no']);
      // $('#email').val(info[0]['email']);
      $('#address').val(info[0]['address']);
      $('#city').val(info[0]['city']);
      $('#pin_code').val(info[0]['pin_code']);
      $('#state').val(info[0]['state']);
      $('#country').val(info[0]['country']);
      $('#occupation').val(info[0]['occupation']);
      $('#aadhar_no').val(info[0]['aadhar_no']);
      $('#pan_no').val(info[0]['pan_no']);
      // $('#name_title').val(info[0]['name_title']);
      // $('#marital_status').val(info[0]['marital_status']);
      $('#age').val(info[0]['age']);
			if(info){
				  $('#save_personal_data').hide();
			}
			else{
				  $('#update_personal_data').show();
			}
     // Hide Save Button...
    //Display Update Button...

			// show div by data....

			// var marital_status1 = $('#marital_status').val();
		  // if(marital_status1 == 0 || marital_status1 == 'Unmarried'){
		  //   $('#have_child_div').hide();
		  // }
		  // else{
		  //   $('#have_child_div').show();
		  // }
			//
		  // var name_title = $('#name_title').val();
		  // if(name_title == 0 || name_title == 'Miss.'){
		  //   $('#marital_status_div').hide();
		  // }
		  // else{
		  //   $('#marital_status_div').show();
		  // }
			//
			// var gender = info[0]['gender'];
			// if(gender == "Male"){
			// 	$('#gender_male').prop("checked", true);
			// }
			// else{
			// 	$('#gender_female').prop("checked", true);
			// }
			//
			// var have_child = info[0]['is_have_child'];
			// if(have_child == "1"){
			// 	$('#child_yes').prop("checked", true);
			// }
			// else{
			// 	$('#child_no').prop("checked", true);
			// }
			//alert(gender);
    }
  });
});
</script>

<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/will_custome/personal_info_js.js" type="text/javascript"></script>
</body>
