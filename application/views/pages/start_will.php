<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>
<body>
	<?php
		$is_login = $this->session->userdata('user_is_login');
	  if($is_login){
			include('include/login_header.php');
			$this->session->unset_userdata('will_id');
		}
		else{
			include('include/header.php');
		}
	 ?>
<h3 id="head1" class="display-4 text-center">Start Your Will Now</h3>
 <!-- end status bar -->
<!-- personal info containner start  asif change -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container"><br>
<div class="row ">
  <div class="col-md-12 personal_info1 " >
	<div id="box">
		<form class="" id="start_will_form" method="post">
		<?php if($this->session->userdata('will_id')){	?>
			<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
		<?php } ?>
  	<fieldset>
		<h3 class="text-center">Personal Information </h3><br>
    <div class="form-group">
      <div class="row text-center">
				<div class="col-md-2"></div>
        <label class="col-md-2 text-right" for="exampleInputEmail1">Full Name</label>
				<div class="col-md-2">
					<select class="form-control" name="name_title" id="name_title">
					 <option value="0">select </option>
					 <option>Mr.</option>
					 <option>Miss.</option>
					 <option>Mrs.</option>
				 </select>
				 <p id="error_name_title" style="color:red; display:none" class="text-left invalide m-0">*This field is required.</p>
        </div>
        <div class="col-md-4">
					<input type="text" name="full_name"  id="full_name"class="form-control empty" id="exampleInputEmail1" placeholder="Full Name" >
					<p id="error_name" style="color:red; display:none" class="text-left invalide  m-0">*This field is required.</p>
				</div>
      </div>
    </div>

		<div class="form-group marital_status_div">
      <div class="row">
				<div class="col-md-2"></div>
			<!-- <div class="col-md-2 marital_status1 marital_status_div" > -->
        <label class="col-md-2 text-right" for="exampleInputEmail1">Marital status</label>
			<!-- </div> -->
				<div class="col-md-4">
					<select class="form-control" name="marital_status" id="marital_status">
					 <option value="0">select </option>
					 <option>Married</option>
					 <option id="Unmarried">Unmarried</option>
					 <option id="Widove">Widove</option>
					 <option>Divorcee</option>
				 </select>
				 <p id="error_marital_status" style="color:red; display:none" class="text-left invalide  m-0">*This field is required.</p>
        </div>
      </div>
    </div>

		<div class="form-group have_child_div">
      <div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2 text-right">
					<label for="exampleInputEmail1">Child</label>
				</div>
				<div class="col-md-2" style="padding-left:30px;">
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
				 <p id="error_is_have_child" style="color:red; display:none" class="text-left invalide  m-0">*This field is required.</p>
				</div>
			</div>
			</div>
    <div class="form-group">
      <div class="row">
				<div class="col-md-2"></div>
        <div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Mobile No</label>
        </div>
        <div class="col-md-4">
          <input type="number" name="mobile_no" class="form-control" id="mobile_no" aria-describedby="emailHelp" placeholder="Mobile No" >
					<p id="error_mobile_no" style="color:red; display:none" class="text-left invalide  m-0">*Please enter a valid number.</p>
        </div>
      </div>
    </div>

		<div class="form-group">
      <div class="row text-center">
				<div class="col-md-2"></div>
        <div class="col-md-2 text-right">
          <label for="exampleInputEmail1">Email</label>
        </div>
        <div class="col-md-4">
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email">
					<p id="error_email" style="color:red; display:none" class="text-left invalide  m-0">*Please enter a valid email address.</p>
        </div>
      </div>
    </div>
		</form>
	</div>
		<p id="error_mobile_exist" style="color:red; display:none;" class="text-left invalide_mob_mail">*This mobile number is exist. Please go to <a href="<?php echo base_url(); ?>Will_controller/login"><b>Login</b></a></p>
		<p id="error_email_exist" style="color:red; display:none;" class="text-left invalide_mob_mail">*This email id is exist. Please go to <a href="<?php echo base_url(); ?>Will_controller/login"><b>Login</b></a></p>
    <button type="submit" id="save_start_data" class="btn btn-success float-right">Save</button>
		<button type="submit" id="update_start_data" class="btn btn-info float-right" style="display:none;">Update & Next</button>
		<button type="button" id="destroy" class="btn btn-danger">Clear session</button>
  </fieldset>
</div>
</div>
</div><br><br><br>
<div class="border-top mt-3"></div>
<?php include('include/footer.php') ?>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<?php $is_login = $this->session->userdata('user_is_login');
	if($is_login){
?>
<!-- <script>
$(document).ready(function(){
	$('#update_start_data').show();
  var will_id = $('#will_id').val();
  $.ajax({
    data: { 'will_id' : will_id  },
    type: "post",
    url: "<?php echo base_url(); ?>/Will_controller/get_personal_info",
    success: function (data){
      var info = JSON.parse(data);

      $('#full_name').val(info[0]['full_name']);
      $('#mobile_no').val(info[0]['mobile_no']);
      $('#email').val(info[0]['email']);
      $('#name_title').val(info[0]['name_title']);
      $('#marital_status').val(info[0]['marital_status']);
      $('#age').val(info[0]['age']);
			if(info){
				  $('#save_start_data').hide();
			}
			else{
				  $('#update_start_data').show();
			}
			// show div by data....
			var marital_status1 = info[0]['marital_status'];
		  if(marital_status1 == 0 || marital_status1 == 'Unmarried'){
		    $('.have_child_div').hide();
		  }
		  else{
		     $('.have_child_div').show();
		  }

		  var name_title = info[0]['name_title'];
		  if(name_title == 0 || name_title == 'Miss.'){
		    $('.marital_status_div').hide();
		  }
		  else{
		    $('.marital_status_div').show();
		  }

			var have_child = info[0]['is_have_child'];
			if(have_child == "1"){
				$('#child_yes').prop("checked", true);
			}
			else{
				$('#child_no').prop("checked", true);
			}
    }
  });
});
</script> -->
<?php } ?>

<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/will_custome/start_will_js.js" type="text/javascript"></script>
</body>
