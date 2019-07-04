<?php include('include/admin_header.php'); ?>
<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="<?php echo base_url(); ?>Owner_controller/owner_login" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" name="username" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
              <label for="password">Password</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form><br>
        <div class="text-center">
          <a class="d-block small" href="<?php echo base_url(); ?>Owner_controller/forgot_password">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

<?php include('include/admin_footer.php');  ?>
</body>

</html>
