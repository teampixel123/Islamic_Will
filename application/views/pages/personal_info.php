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
<ul class="list-unstyled multi-steps m-0 pt-3 pb-3">
	<li class="personal-tab is-active" >Personal Information</li>
	<li class="family-tab">Family Information</li>
	<li class="assets-tab">Assets</li>
	<li class="executor-tab">Executor</li>
	<li class="witness-tab">Witness</li>
</ul>
</div>
 <!-- end status bar -->
<!-- personal info containner start  asif change -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
<div class="row ">
  <div class="col-md-7 personal_info1 p-3" >
	<div id="box">
		<form class="" id="personal_info_form" method="post">
  	<fieldset>
		<h3 class=" text-left">Personal Information </h3>
		<div class="form-group" id="">
      <div class="row text-center">
      </div>
    </div>
    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Address</label>
        </div>
        <div class="col-md-10">
          <input type="text" name="address" class="required form-control form-control-sm" id="address" aria-describedby="emailHelp" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row text-center">
        <div class="col-md-2 text-right">
          <label for="exampleInputEmail1">City</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="city" class="text required form-control form-control-sm" id="city" aria-describedby="emailHelp" >
        </div>
				<div class="col-md-2 text-right marital_status1">
          <label for="exampleInputEmail1">Pin Code</label>
        </div>
        <div class="col-md-4">
          <input type="number" name="pin_code" class="pin-code required form-control form-control-sm" id="pin_code" aria-describedby="emailHelp" >
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row text-center">
				<div class="col-md-2 text-right">
          <label for="exampleInputEmail1">State</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="state" class="text required form-control form-control-sm" id="state" aria-describedby="emailHelp" >
        </div>
				<div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Country</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="country" class="text required form-control form-control-sm" id="country" aria-describedby="emailHelp" >
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row text-center">
				<label class="col-md-2 text-right" for="exampleInputEmail1">Age</label>
				<div class="col-md-4">
					<input type="number" name="age" class="age-major required form-control empty form-control-sm" id="age" aria-describedby="emailHelp" required >
				</div>

        <div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Occupation</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="occupation" class="text required form-control form-control-sm" id="occupation" aria-describedby="emailHelp" >
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row text-center">
				<div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Aadhar No</label>
        </div>
        <div class="col-md-4">
          <input type="number" name="aadhar_no" class="aadhar-no required form-control form-control-sm" id="aadhar_no" aria-describedby="emailHelp" >
        </div>
        <div class="col-md-2 text-right">
          <label for="exampleInputEmail1">PAN No</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="pan_no" class="form-control form-control-sm" id="pan_no" aria-describedby="emailHelp" >
        </div>
      </div>
    </div>
		</form>
</div>
<p id="error_mobile_exist" style="color:red; display:none;" class="text-left invalide_mob_mail">*This mobile number is exist. Please go to <a href="<?php echo base_url(); ?>Will_controller/login"><b>Login</b></a></p>
<p id="error_email_exist" style="color:red; display:none;" class="text-left invalide_mob_mail">*This email id is exist. Please go to <a href="<?php echo base_url(); ?>Will_controller/login"><b>Login</b></a></p>
    <button type="submit" id="save_personal_data" class="btn btn-success" style="float:right;">Save & Next</button>
		<button type="button" id="update_personal_data" class="btn btn-success" >Save & Next</button>
		<!-- <button type="button" id="next_page" class="btn btn-info" >Next</button></p> -->
		<!-- <div class="text-left">
			<button type="button" id="destroy" class="btn btn-danger " >Clear session</button>
		</div> -->
		<!--a href="<?php echo base_url() ?>/Will_controller/family_info_view" type="button" id="personal_next" class="btn btn-info">Next</a-->
  </fieldset>
</div>

<div class="col-md-5 personal_info">
<?php if($this->session->userdata('will_id')){	?>
	<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
<?php } ?>
  <div class="container personal_data_dispaly " >
  	<div class="" >
			<form style="font-family: 'Roboto Slab'!important ; font-size:12px;">
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
			</form>
    </div>
  </div>
</div>
</div>
<!-- </div> -->
</div>
<!-- Border -->
<div class="border-top mt-3"></div>
<?php include('include/footer.php') ?>
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

      $('#address').val(info[0]['address']);
      $('#city').val(info[0]['city']);
      $('#pin_code').val(info[0]['pin_code']);
      $('#state').val(info[0]['state']);
      $('#country').val(info[0]['country']);
      $('#occupation').val(info[0]['occupation']);
      $('#aadhar_no').val(info[0]['aadhar_no']);
      $('#pan_no').val(info[0]['pan_no']);
      $('#age').val(info[0]['age']);
			if(info){
				  $('#save_personal_data').hide();
			}
			else{
				  $('#update_personal_data').show();
			}

    }
  });
});
</script>

<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/will_custome/personal_info_js.js" type="text/javascript"></script>
</body>
