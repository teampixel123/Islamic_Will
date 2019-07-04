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
    $page = 'dashboard';
  ?>
<!-- include header -->
<?php include('include/login_header.php'); ?>
<!-- include header end -->
<div id="wrapper">
  <?php include('include/side_panel.php'); ?>
  <div id="content-wrapper">

    <div class="container-fluid">
      <?php if($this->session->flashdata('subscription_status')) { ?>
        <ol class="breadcrumb">
          <li class="breadcrumb-item" style="color:green;">
            Subscribed Successfully.
          </li>
        </ol>
      <?php } ?>
      <?php if($user_subscription == 1){ ?>
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
      </ol>

      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden ">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-comments"></i>
              </div>
              <div class="mr-0"><?php echo $user_data->complete_will; ?> Completed Will! <br></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden ">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-list"></i>
              </div>
              <div class="mr-0"><?php echo $user_data->incomplete_will; ?> Incomplete Will!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden ">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-0"><?php echo $user_data->pdf_download; ?> Download Will! <br></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden ">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-life-ring"></i>
              </div>
              <div class="mr-0">
                      <?php
                      echo $user_data->user_subscription_end_date;
                      // $start_data= $user_data->user_subscription_start_date;
                      // $endDay = date ("d-m-Y", strtotime ($start_data ."+30 days"));
                      // echo $endDay;
                       ?> End Subcription Date
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    <?php } else { ?>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url() ?>Pricing"><b>Subscribe Now</b></a>
        </li>
        <!-- <li class="breadcrumb-item active">Overview</li> -->
      </ol>

      <!--  -->
    <?php
    if($this->session->userdata('will_id')){
      $will_id=$this->session->userdata('will_id');?>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <form target="_blank" id="pdf" class="" action="<?php echo base_url() ?>Pdf_controller/pdf" method="post">
            <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('will_id'); ?>">
            Your PDF is here. <button type="submit" id="btn_pdf" class="btn btn-info" >View PDF</button></p>
          </form>
        </li>
      </ol>
    <?php }
        }
    ?>








  </div>
  </div>
</div>


<?php include('include/dashboard_footer.php'); ?>

</body>
<?php } ?>
