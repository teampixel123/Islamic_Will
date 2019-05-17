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

<div class="container login2 ">
	<!-- <div class="jumbotron "> -->
    <form class="" method="post" action="">
       <legend class="text-center">Login</legend>
      <div class="form-group">
        <div class="row text-center">
          <div class="col-md-4 text-right">
            <label class="log" for="exampleInputEmail1">Mobile No. / Email:</label>
          </div>
          <div class="col-md-5">
            <input type="text" name="mob_email" id="mob_email" class="form-control " aria-describedby="emailHelp"  style="width:90%;">
						<p id="error_invalide" style="color:red; display:none" class="text-left invalide">*Invalide Mobile Number/Email Format</p>
						<p id="error_required" style="color:red; display:none" class="text-left invalide">*Fill up Mobile Number/Email Id</p>
						<p id="error_not_registered" style="color:red; display:none" class="text-left invalide">*This Mobile Number/Email is not Registered</p>
          </div>
        </div>
      </div>

      <div class="form-group" >
        <div class="row text-center">
          <div class="col-md-4 text-right">
            <label class="log" for="exampleInputEmail1">Type Your Password</label>
          </div>
          <div class="col-md-5">
            <input type="text" name="user_password" class="form-control" id="user_password" aria-describedby="emailHelp" style="width:90%;" >
            <p id="error_invalide_otp" style="color:red; display:none" class="text-left invalide">*Invalide Password</p>

          </div>
        </div>
      </div>

<!--
			<div id="otp_div" style="display:none;">
				<input type="hidden" name="user_id" class="form-control" id="user_id">
	      <div class="form-group" >
	        <div class="row text-center">
	          <div class="col-md-4 text-right">
	            <label class="log" for="exampleInputEmail1">Enter OTP</label>
	          </div>
	          <div class="col-md-5">
	            <input type="text" name="otp" class="form-control" id="otp" aria-describedby="emailHelp" style="width:90%;" >
							<p id="error_invalide_otp" style="color:red; display:none" class="text-left invalide">*Invalide OTP</p>
							<p id="error_expired_otp" style="color:red; display:none" class="text-left invalide">*Invalide Expired</p>
	          </div>
	        </div>
	      </div>
				<div class="row">
	      	<div class="col-md-12 text-center">
	      	    <button type="button" id="btn_login" class="btn btn-success btn-md lbtn ">Login</button>
	      	</div>
	      </div>
			</div> -->

      <div class="row">
        <div class="col-md-6">
          <p style="float:right;"><a href="<?php echo base_url(); ?>Login_controller/register_user_view" class="" > Register </a>|<a href="<?php echo base_url(); ?>Will_controller/forget_pass" class=""> Froget Password ? </a></p>
        </div>
        <!-- text-center -->
        <div class="col-md-6 ">
            <button type="button" id="btn_login" class="btn btn-success btn-md lbtn " style="width:15%;">Login</button>
        </div>
      </div>
      <div class="" >

      </div>
      <br>

      <!-- <div id="send_otp_div" class="row">
      	<div class="col-md-12 text-center">
      	    <button type="button" id="btn_send_otp" class="btn btn-primary btn-md">Send OTP</button>
      	</div>
      </div> -->
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

	 $('#btn_login').click(function(){
		 var mob_email = $('#mob_email').val();
		 var user_password = $('#user_password').val();
		 $.ajax({
			 data:{
				 'mob_email' : mob_email,
				 'user_password' : user_password,
			  },
			 type: 'post',
			 url: "<?php echo base_url(); ?>Login_controller/login_user",
			 success: function(data){
				 var responce = JSON.parse(data);
				 if(responce['responce'] == 'Success'){
					 $('.invalide').hide();
					 window.location.href = "<?php echo base_url() ?>User_controller/user_dashboard";
				 }
				 else if (responce['responce'] == 'Invalide_Password') {
					 $('.invalide').hide();
					 $('#error_invalide_otp').show();
					 //alert('Invalide OTP...');
				 }
			 }
		 });
	 });


});
</script>
</body>
