<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 include('include/head.php');
?>
<body>
<?php include('include/header.php'); ?>
<div class="container login2 ">
	<!-- <div class="jumbotron "> -->
    <form action="<?php echo base_url(); ?>Login_controller/save_register_user" id="register_form" class="" method="post">
      <legend class="text-center">Register</legend>
      <div class="form-group">
        <div class="row text-center">
          <div class="col-md-4 text-right">
            <label class="log" for="exampleInputEmail1">Name</label>
          </div>
          <div class="col-md-5">
            <input type="text" name="reg_name" id="reg_name" class="form-control " aria-describedby="emailHelp"  style="width:90%;">
						<p id="error_required" style="color:red; display:none" class="text-left invalide">*Enter Name</p>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row text-center">
          <div class="col-md-4 text-right">
            <label class="log" for="exampleInputEmail1">Mobile No.</label>
          </div>
          <div class="col-md-5">
            <input type="text" name="reg_mobile" id="reg_mobile" class="form-control " style="width:90%;">
						<p id="error_invalide_mobile" style="color:red; display:none" class="text-left invalide">*Invalide Mobile Number Format</p>
						<p id="error_required_mobile" style="color:red; display:none" class="text-left invalide">*Enter Mobile Number</p>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row text-center">
          <div class="col-md-4 text-right">
            <label class="log" for="exampleInputEmail1">Email Id</label>
          </div>
          <div class="col-md-5">
            <input type="text" name="reg_email" id="reg_email" class="form-control " style="width:90%;">
						<p id="error_invalide_email" style="color:red; display:none" class="text-left invalide">*Invalide Email Id Format</p>
						<p id="error_required_email" style="color:red; display:none" class="text-left invalide">*Enter Email Id</p>
          </div>
        </div>
      </div>

      <div id="send_otp_div" class="row">
      	<div class="col-md-12 text-center">
      	    <button type="button" id="btn_register" class="btn btn-primary btn-md">Register</button>
      	</div>
      </div>
    </form>
<!-- </div> -->
</div>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>


<script>
$(document).ready(function(){
  $('#btn_register').click(function(){
    $('#register_form').submit();
  });
  // $('#btn_send_otp').click(function(){
  //   var mob_email = $('#mob_email').val();
	// 	var mobile_format = /^[6-9][0-9]{9}$/;
	// 	var email_format = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;;
	// 	if(mob_email == ''){
	// 		$('#error_required').show();
	// 	}
	// 	else if(mobile_format.test(mob_email)) {
	// 		var validate = 'mobile_number';
	// 		$('.invalide').hide();
	// 	}
	// 	else if(email_format.test(mob_email)){
	// 		var validate = 'email';
	// 		$('.invalide').hide();
	// 	}
	// 	else{
	// 		$('#error_invalide').show();
	// 	}
	// 	if(validate == 'mobile_number' || validate == 'email'){
	// 		$.ajax({
	//   		data: {'mob_email' : mob_email,
	// 						'validate' : validate,},
	//   		type: "post",
	//   		url: "<?php echo base_url(); ?>Login_controller/generate_otp",
	//   		success: function(data){
	// 				var responce = JSON.parse(data);
	// 				//alert(responce['responce']);
	// 				if(responce['responce'] == 'Success'){
	// 					$('#send_otp_div').hide();
	// 					$('#otp_div').show();
	// 					$("#mob_email").attr("disabled", "disabled");
	// 					$('#user_id').val(responce['user_id']);
	// 				}
	// 				else{
	// 					$('#error_not_registered').show();
	// 				}
	//       }
	//     });
	// 	}
  // });
  //
	//  $('#btn_login').click(function(){
	// 	 var user_id = $('#user_id').val();
	// 	 var otp = $('#otp').val();
	// 	 $.ajax({
	// 		 data:{
	// 			 'user_id' : user_id,
	// 			 'otp' : otp,
	// 		  },
	// 		 type: 'post',
	// 		 url: "<?php echo base_url(); ?>Login_controller/login_user",
	// 		 success: function(data){
	// 			 var responce = JSON.parse(data);
	// 			 if(responce['responce'] == 'Success'){
	// 				 $('.invalide').hide();
	// 				 window.location.href = "<?php echo base_url() ?>User_controller/user_dashboard";
	// 			 }
	// 			 else if(responce['responce'] == 'Expire_OTP'){
	// 				 $('.invalide').hide();
	// 				 $('#error_expired_otp').show();
	// 			 }
	// 			 else if (responce['responce'] == 'Invalide_OTP') {
	// 				 $('.invalide').hide();
	// 				 $('#error_invalide_otp').show();
	// 				 //alert('Invalide OTP...');
	// 			 }
	// 		 }
	// 	 });
	//  });


});
</script>
</body>
