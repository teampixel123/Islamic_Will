<?php
$is_login = $this->session->userdata('user_is_login');
if($is_login){
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- include head -->
<?php include('include/dashboard_header.php'); ?>
<?php include('include/head.php'); ?>

<!-- include head end -->
<body>
  <?php
    $page = 'profile';
  ?>
<!-- include header -->
<?php include('include/login_header.php'); ?>
<!-- include header end -->
<div id="wrapper">
  <?php include('include/side_panel.php'); ?>
  <div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
      <div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1><?php echo $user_data->user_fullname; ?></h1></div>
    	<!-- <div class="col-sm-2"><a href="/users" class="pull-right"><img title="Eslamic Will" class="img-circle img-responsive" src="http://localhost/islamic_will/assets/website/img/bg-img/users.png"></a></div> -->
    </div>
      <form class="form"  id="update_user" enctype="multipart/form-data">
    <div class="row">
  		<div class="col-sm-3"><!--left col-->


      <div class="text-center">
        <img src="<?php echo base_url().'assets/images/'.$user_data->profile_phto; ?>" class="avatar img-circle img-thumbnail" alt="profile photo">
        <h6>Upload a different photo...</h6>
        <input type="file" name="profile_phto" id="profile_phto" class="text-center center-block file-upload">
      </div></hr><br>
      <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Completed Will</strong></span> <?php echo $user_data->complete_will; ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Incomplete Will</strong></span> <?php echo $user_data->incomplete_will; ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Service Pack</strong></span><strong> <?php echo $user_data->user_subscription_type; ?></strong></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Pack End Day</strong></span>
              <strong><?php $start_data= $user_data->user_subscription_start_date;
              $endDay = date ("d-m-Y", strtotime ($start_data ."+30 days"));
              echo $endDay;?></strong>
          </ul>
        </div><!--/col-3-->
    	<div class="col-sm-9">
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                    <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Password</a>
                    </div>
                  </nav>

                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <br>

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>User name</h4></label>
                              <input type="text" class="form-control" name="username" id="username" placeholder="first name" title="enter your first name if any." value="<?php echo $user_data->user_fullname; ?>">
                              <p id="error_username" style="color:red; display:none" class="text-left valide  m-0">*This field is required.</p>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any." value="<?php echo $user_data->user_mobile_number; ?>">
                              <p id="error_mobile" style="color:red; display:none" class="text-left valide  m-0">*This field is required.</p>
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." value="<?php echo $user_data->user_email_id; ?>">
                              <p id="error_email" style="color:red; display:none" class="text-left valide  m-0">*This field is required.</p>
                        </div>
                      </div>
                      <div class="alert alert-success" id="update_success_profile" style="display:none;">
                        <strong><h5>Your Profile is Successfully Updated!<h5></strong>
                      </div>

                <div class="form-group">
                     <div class="col-xs-12">
                          <br>
                          <button class="btn btn-lg btn-success" type="submit" id="submit_profile"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                        <br><br><br>
                      </div>
                </div>
                  </form>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <br>
                      <form class="form"  id="update_password">
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="password"><h4>New Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password." >
                              <p id="error_password" style="color:red; display:none" class="text-left valide  m-0">*This field is required.</p>

                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify Password</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                              <p id="error_password2" style="color:red; display:none" class="text-left valide  m-0">*This field is required.</p>
                              <p id="error_password_match" style="color:red; display:none" class="text-left valide  m-0">*Password Doesn't match.</p>
                        </div>
                      </div>
                    </form>
                    <div class="alert alert-success" id="update_success_password" style="display:none;">
                      <strong><h5>Your password is Successfully Updated!<h5></strong>
                    </div>
                    <div class="form-group">
                         <div class="col-xs-12">
                              <br>
                              <button class="btn btn-lg btn-success" type="submit" id="submit_password"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                              <br><br><br>
                          </div>
                    </div>
                    </div>
                  </div>
              <hr>
             </div><!--/tab-pane-->
              </div><!--/tab-pane-->
          </div><!--/tab-content-->
        </div><!--/col-9-->
    </div><!--/row-->



    <!-- /.container-fluid -->



  </div>
  <!-- /.content-wrapper -->

  </div>
</div>



<?php include('include/dashboard_footer.php') ?>
<!--profile script start-->
<script type="text/javascript">
$('#update_user').submit(function(e){
    e.preventDefault();
    var username = $('#username').val();
    var mobile = $('#mobile').val();
    var email = $('#email').val();
    if(username == ''){
      $('#error_username').show();
    }
    if(mobile == ''){
      $('#error_mobile').show();
    }
    if(email == ''){
      $('#error_email').show();
    }
    else {
          $('.valide').hide();
         $.ajax({
             url:'update_user',
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                $('#update_success_profile').show();
                $('#update_success_profile').delay(3000).fadeOut('slow');
                setTimeout(function(){// wait for 5 secs(2)
                       location.reload(); // then reload the page.(3)
                  }, 3000);
           }
         });
       }
    });
</script>
<!-- <script type="text/javascript">
$('#submit_profile').click(function(){
  var username = $('#username').val();
  var mobile = $('#mobile').val();
  var email = $('#email').val();
  if(username == ''){
    $('#error_username').show();
  }
  if(mobile == ''){
    $('#error_mobile').show();
  }
  if(email == ''){
    $('#error_email').show();
  }
  else {
    $('.valide').hide();
    var form_data = $('#update_user').serialize();
    $.ajax({
      data: form_data,
      type: "post",
      url: "update_user",
      success: function (data){
        $('#update_success_profile').show();
        $('#update_success_profile').delay(3000).fadeOut('slow');
      }
    });
  }
  });
</script> -->
<!--profile  script start-->

<!--password script start-->
<script type="text/javascript">
$('#submit_password').click(function(){
  var password = $('#password').val();
  var password2 = $('#password2').val();
  if(password == ''){
    $('#error_password').show();
  }
  if(password2 == ''){
    $('#error_password2').show();
  }

  else {
    if(password2 != password){
      $('#error_password_match').show();
      $('#error_password').hide();
      $('#error_password2').hide();
    }
    else{
    $('.valide').hide();
    var form_data = $('#update_password').serialize();
    $.ajax({
      data: form_data,
      type: "post",
      url: "update_password",
      success: function (data){
        $('#password').val('');
        $('#password2').val('');
        $('#update_success_password').show();
        $('#update_success_password').delay(3000).fadeOut('slow');

      }
    });
  } }
  });
</script>
<!--password script ends-->
</body>
<?php } ?>
