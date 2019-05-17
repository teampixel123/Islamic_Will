<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 include('include/head.php');
?>
<body>
<?php include('include/header.php'); ?>
<div class="container login2 ">
	<!-- <div class="jumbotron "> -->
    <form action="<?php echo base_url(); ?>Login_controller/save_forget" id="register_form" class="" method="post">
      <legend class="text-center">Forget Password</legend>
      <div class="form-group">
        <div class="row text-center">
          <div class="col-md-4 text-right">
            <label class="log" for="exampleInputEmail">Mobile No. / Email:</label>
          </div>
          <div class="col-md-5">
            <input type="text" name="reg_mob_email" id="reg_mob_email" class="form-control " style="width:90%;">
            <p id="reg_error_invalide" style="color:red; display:none" class="text-left invalide">*This Mobile Number/Email Not Register  </p>
            <!-- <p id="reg_error_required" style="color:red; display:none" class="text-left invalide">*Fill up Mobile Number/Email Id</p>
            <p id="error_mobile_exist" style="color:red; display:none" class="text-left invalide">*This Mobile Number/Email allrady exist</p> -->
            <input type="hidden" name="contact_type" id="contact_type" >
          </div>
        </div>
      </div>

        <!--display:none;  -->

          <div id="otp_div" style="display:none">
          <!-- <input type="hidden" name="user_id" class="form-control" id="user_id"> -->
          <div class="form-group" >
            <div class="row text-center">
              <div class="col-md-4 text-right">
                <label class="log" for="exampleInputEmail1">Password </label>
              </div>
              <div class="col-md-5">
                <input type="text" name="user_password" class="form-control" id="user_password" aria-describedby="emailHelp" style="width:90%;" >
                <p id="error_invalide_otp" style="color:red; display:none" class="text-left invalide">*Invalide Password</p>

                <!-- <p id="error_expired_otp" style="color:red; display:none" class="text-left invalide">*Invalide Expired</p> -->
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12 text-center">
                <button type="button" id="btn_login" class="btn btn-success btn-md lbtn ">submit</button>
            </div>
          </div>
        </div>
      <div class="text-center">
        <button type="button" id="btn_register" class="btn  btn-primary btn-md">submit</button>
      </div>

      <div id="send_otp_div" class="row">
      	<div class="col-md-12 text-center">
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
    var reg_mob_email = $('#reg_mob_email').val();
		var reg_mobile_format = /^[6-9][0-9]{9}$/;
		var reg_email_format = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;;

     if(reg_mob_email == ''){
			$('#reg_error_required').show();
		}
    else if(reg_mobile_format.test(reg_mob_email)) {
      var validate = 'mobile_number';
      $('.invalide').hide();
      $('#contact_type').val(validate);
    }
    else if(reg_email_format.test(reg_mob_email)){
      var validate = 'email';
      $('.invalide').hide();
      $('#contact_type').val(validate);
    }

    else {
        $('.invalide').show();
    }

    if ( validate == '') {
    }
    else {
      var data=$('#register_form').serialize();
      $.ajax({
        data: data,
        type: "post",
        url: "<?php echo base_url(); ?>Login_controller/save_forget",
        success: function(data){
          var info = JSON.parse(data);


          if(info == 'error'){
            $('#reg_error_invalide').show();
          }
          else {
            $('#otp_div').show();
            $('#btn_register').hide();
            $('.invalide').hide();
          }

        }
      });
    }
  });

  $('#btn_login').click(function(){
    var mob_email = $('#reg_mob_email').val();
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
