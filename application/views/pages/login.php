<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 include('include/head.php');
?>
<style type="text/css">
    .errspan {
        float: right;
        padding: 10px;
        position: relative;
        z-index: 2;
        background-color: #fff;
    }
</style>
<body>
  <?php include('include/header.php'); ?>

  <div class="container pb-5 pt-5">
    <div class="row ">
      <div class="col-md-12 personal_info1">
        <div id="box">
          <form class="" method="post" action="">
            <legend class="text-center">Login</legend>
            <div class="form-group">
              <div class="row text-center">
                <div class="col-md-4 text-right">
                  <label class="log" for="exampleInputEmail1">Mobile No. / Email:</label>
                </div>
                <div class="col-md-5 text-center">
                  <input type="text" name="mob_email" id="mob_email" class="required form-control" >
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
                  <div class="input-group" >
                  <input type="password" name="user_password" class="form-control" id="user_password" aria-describedby="emailHelp" >
                  <div class="input-group-addon" style="border: 1px solid #ced4da;">
                    <i class="fa fa-eye errspan" style="color:#000 !important;"  id="show" aria-hidden="true"></i>
                  </div>
                </div>
                <p id="error_invalide_otp" style="color:red; display:none" class="text-left invalide">*Invalide Password</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                  <button type="button" id="btn_login" class="btn akame-btn2 active btn-md lbtn " style="width:15%;">Login</button>
              </div>
              <div class="col-md-12">
                <p class="text-center"><a href="<?php echo base_url(); ?>Login_controller/register_user_view" class="" > Register </a>|<a href="<?php echo base_url(); ?>Will_controller/forget_pass" class=""> Forget Password ? </a></p>
              </div>
            </div>
            <br>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
<!-- <div class="border-top mt-3 w-100"></div> -->

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var x = document.getElementById("user_password");
    $('#show').click(function() {
      $('#show').toggleClass('fa-eye fa-eye-slash');
      if (x.type === "password") {
      x.type = "text";
       $(this).toggleClass('fa-plus-circle fa-minus-circle')
      } else {
      x.type = "password";
      }
    });
  });
</script>
<script>
$(document).ready(function(){
  function submit_login(){
    var mob_email = $('#mob_email').val();
    var user_password = $('#user_password').val();
   // var mob_email = $('#mob_email').val();
     var mobile_format = /^[6-9][0-9]{9}$/;
     var email_format = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;;
     if(mob_email == ''){
       $('#error_required').show();
     }
     else if(mobile_format.test(mob_email)) {
       var validate = 'mobile_number';
       $('.invalide').hide();
     }
     else if(email_format.test(mob_email)){
       var validate = 'email';
       $('.invalide').hide();
     }
     else{
       $('#error_invalide').show();
     }

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
          window.location.href = "<?php echo base_url() ?>User-Dashboard";
        }
        else if (responce['responce'] == 'Invalide_Password') {
          $('.invalide').hide();
          $('#error_invalide_otp').show();
          //alert('Invalide OTP...');
        }
      }
    });
  }
	 $('#btn_login').click(function(){
     submit_login();
	 });
   $('#user_password').keypress(function(e) {
    var code = e.keyCode || e.which;
    if(code==13){
        submit_login();
    }
});

});
</script>
</body>
