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
      <div id="subscribe_success" class="alert alert-success" role="alert" style="display:none;"></div>
      <?php if($user_subscription == 1){ ?>
        <div id="subscribe_for_will" class="alert alert-danger" role="alert" style="display:none;"></div>

        <?php
        if($is_have_blur == 'yes'){ ?>
          <div class="alert alert-danger" role="alert">
            <a href="<?php echo base_url() ?>Pricing"><b><u>Subscribe Now</u></b></a> to see and download your blur will.
          </div>
          <?php
        }
        ?>

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
      </ol>



      <?php if($is_have_blur == 'yes'){
        $get_blur_will = $this->Will_Model->get_blur_will_info($user_id);

        if($get_blur_will){ ?>
          <?php
            $will_id = $get_blur_will[0]['will_id'];
            $is_will_complete = $get_blur_will[0]['is_will_complete'];
            $personal_data = $this->Will_Model->get_personal_data($will_id);
            foreach ($personal_data as $personal_data) {
            }
          ?>
        <?php
        }
        ?>
      <?php }
        else{ ?>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url() ?>Start-Will"><b>Create New Will</b></a>
            </li>
          </ol>
      <?php } ?>
      <?php
      $incomplete_will = 0;
      $complete_will = 0;
      foreach ($will_list as $will_list) {
        $complete = $will_list->is_will_complete;
        if($complete == 1){
          $complete_will++;
        }
        else {
          $incomplete_will++;
        }
      }
       ?>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden ">
            <div class="card-body">
              <div class="mr-0"><span style="font-size:28px; font-weight:700;"><?php echo $complete_will; ?></span></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" >
              <span class="float-left">Completed Will!</span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden ">
            <div class="card-body">
              <div class="mr-0"><span style="font-size:28px; font-weight:700;"><?php echo $incomplete_will; ?></span></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" >
              <span class="float-left">Incomplete Will!</span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden ">
            <div class="card-body">
              <div class="mr-0">
                <span style="font-size:28px; font-weight:700;"><?php echo $user_data->user_subscription_end_date; ?></span>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">End Subcription Date</span>
            </a>
          </div>
        </div>
      </div>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          Will List A
        </li>
      </ol>
      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
            <!--  -->
            <table class="table table-bordered will-list" id="dataTable" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Will Id</th>
                  <th>Full name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>End Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                   $i = 0;
                   foreach ($will_list2 as $will_list2) {
                   $i++;
                   $will_rem_updations = $will_list2->will_rem_updations;
                   $updation_last_date = $will_list2->updation_last_date;
                   $is_will_complete = $will_list2->is_will_complete;
                   $is_blur = $will_list2->is_blur;
                   $today = date('d-m-Y');
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $will_list2->will_id; ?></td>
                  <td><?php echo $will_list2->full_name; ?></td>
                  <td><?php echo $will_list2->mobile_no; ?></td>
                  <td><?php echo $will_list2->email; ?></td>
                  <td>
                    <?php
                      $is_blur = $will_list2->is_blur;
                        if($will_rem_updations == 0 && $is_blur == 'no'){
                          echo "Expired";
                        }
                        else if($will_rem_updations == 0 && $is_blur == 'yes'){
                          echo "Not Subsrcribed";
                        }
                        else if(strtotime($updation_last_date) < strtotime($today)){
                          echo "Expired";
                        }
                        else{
                          echo $will_list2->updation_last_date;
                        }
                     ?>
                  </td>
                  <td class="p-0">
                        <table >
                          <tbody style="border: none!important;">
                            <tr style="border: none!important;">
                              <?php

                              if($will_rem_updations > 0 && strtotime($updation_last_date) >= strtotime($today)){ ?>
                                <td class="p-0" style="border: none!important;">
                                  <button type="button"  class="btn btn-sm btn-primary no-margin" data-toggle="modal" data-target="#exampleModal_<?php echo $i; ?>"><i style="color:#ffffff !important;" class="fa fa-edit"></i> Edit Will</button>
                                </td>
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal_<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Edit Will</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>You can update this will only 1 time.</p>
                                          <p>Can not update After pdf creation.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <form id="form_will_edit" action="<?php echo base_url(); ?>Will_controller/load_login_start_info" method="post">
                                             <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list2->will_id; ?>" />
                                             <button id="btn_will_edit" title="You can update only 1 time" type="submit" class="btn btn-primary"><i style="color:#ffffff !important;" class="fa fa-edit"></i></i> Edit Will</button>
                                          </form>
                                          <!-- <button type="button" class="btn btn-primary">Edit</button> -->
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- // Modal -->
                                <?php }
                                else if($is_blur == 'yes'){
                                // else if($is_will_complete == 0 && $is_blur == 'yes'){ ?>
                                  <td class="p-0" style="border: none!important;">
                                    <form action="<?php echo base_url() ?>Will_controller/load_login_start_info" method="post">
                                      <input type="hidden" name="will_id" value="<?php echo $personal_data->will_id; ?>">
                                      <button type="submit" style="width:90px;" class="btn btn-sm btn-primary no-margin"><i style="color:#ffffff !important;" class="fa fa-edit"></i> Edit Will</button></p>
                                    </form>
                                  </td>
                                <?php } else{ ?>
                                  <td class="p-0" style="border: none!important;">
                                    <button type="button" style="width:90px;" class="btn btn-sm btn-primary no-margin" disabled><i style="color:#ffffff !important;" class="fa fa-edit"></i> Edit Will</button>
                                  </td>
                                <?php } ?>

                              <?php $is_will_complete = $will_list2->is_will_complete;
                                    $is_blur = $will_list2->is_blur;
                              if($is_will_complete == 1 && $is_blur == 'no'){ ?>
                                <td class="p-0" style="border: none!important;">
                                  <form target="_blank" id="form_will_pdf" action="<?php echo base_url(); ?>Pdf_controller/final_pdf" method="post">
                        							 <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list2->will_id; ?>" />
                                       <input type="hidden" name="btn_from" id="btn_from" value="user_will_list" />
                        							 <button id="btn_will_pdf" style="width:70px;" type="submit" class="btn btn-sm btn-success no-margin"><i style="color:#ffffff !important;" class="fa fa-file-pdf-o"></i> Will</button>
                    						  </form>
                                </td>
                              <?php  }
                              else if($is_will_complete == 1 && $is_blur == 'yes'){ ?>
                                  <td class="p-0" style="border: none!important; color:red;">
                                    <form target="_blank" id="form_will_pdf" action="<?php echo base_url(); ?>Pdf_controller/pdf" method="post">
                          							 <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list2->will_id; ?>" />
                                         <input type="hidden" name="btn_from" id="btn_from" value="user_will_list" />
                          							 <button id="btn_will_pdf" style="width:70px;" type="submit" class="btn btn-sm btn-success no-margin"><i style="color:#ffffff !important;" class="fa fa-file-pdf-o"></i> Will</button>
                      						  </form>
                                </td>
                              <?php  }
                                else{ ?>
                                  <td class="p-0" style="border: none!important; color:red;">
                                  <button style="width:70px;" type="submit" class="btn btn-sm btn-success no-margin" disabled><i style="color:#ffffff !important;" class="fa fa-file-pdf-o"></i> Will</button>
                                </td>
                              <?php } ?>
                              <?php if($is_blur == 'yes'){ ?>

                                <td class="p-0" style="border: none!important;">
                                  <a class="btn btn-warning btn-sm" href="<?php echo base_url() ?>Pricing" style="color:white;">Subscribe</a>
                                </td>
                              <?php } ?>
                            </tr>
                          </tbody>
                        </table>
                 </td>

     					 </tr>
                <?php
                   }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>








    <?php } else { ?>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url() ?>Pricing"><b>Subscribe Now</b></a>
        </li>
      </ol>
      <?php
      if($is_have_blur == 'yes'){
        // echo $user_id;
        $get_blur_will = $this->Will_Model->get_blur_will_info($user_id);

        if($get_blur_will){ ?>
          <?php
            $will_id = $get_blur_will[0]['will_id'];
            $is_will_complete = $get_blur_will[0]['is_will_complete'];
            $personal_data = $this->Will_Model->get_personal_data($will_id);

            foreach ($personal_data as $personal_data) {
            }
            if($personal_data){
          ?>
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Will Id</th>
                <th>Full name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $personal_data->will_id; ?></td>
                <td><?php echo $personal_data->full_name; ?></td>
                <td><?php echo $personal_data->mobile_no; ?></td>
                <td><?php echo $personal_data->email; ?></td>
                <td>
                  <table >
                    <tbody style="border: none!important;">
                      <tr style="border: none!important;">
                        <td class="p-0" style="border: none!important;">
                          <?php if($is_will_complete == 0){ ?>
                            <form action="<?php echo base_url() ?>Will_controller/load_login_start_info" method="post">
                              <input type="hidden" name="will_id" value="<?php echo $personal_data->will_id; ?>">
                              <button type="submit" class="btn btn-info btn-sm">Edit</button></p>
                            </form>
                          <?php  } ?>
                        </td>
                        <?php if($is_will_complete == 1){ ?>
                        <td class="p-0" style="border: none!important;">
                          <form target="_blank" id="pdf" class="" action="<?php echo base_url() ?>Pdf_controller/pdf" method="post">
                            <input type="hidden" name="will_id" value="<?php echo $personal_data->will_id; ?>">
                            <button type="submit" class="btn btn-info btn-sm">View PDF</button></p>
                          </form>
                        </td>
                        <?php  } ?>
                        <td class="p-0" style="border: none!important;">
                          <a class="btn btn-warning btn-sm" href="<?php echo base_url() ?>Pricing">Subscribe</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              For download complete pdf <a href="<?php echo base_url() ?>Pricing"><b>Subscribe Now</b></a>
            </li>
          </ol>
        <?php
      }
    }
        ?>
      <?php }
        else{ ?>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url() ?>Start-Will"><b>Create New Will</b></a>
            </li>
          </ol>
      <?php } ?>
      <!--  -->
    <?php
    // if($this->session->userdata('temp_will_id')){
    //   $will_id=$this->session->userdata('temp_will_id');?>
      <?php
        // $personal_data = $this->Will_Model->get_personal_data($will_id);
        // foreach ($personal_data as $personal_data) {
        // }
      ?>
      <!-- <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Will Id</th>
            <th>Full name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $personal_data->will_id; ?></td>
            <td><?php echo $personal_data->full_name; ?></td>
            <td><?php echo $personal_data->mobile_no; ?></td>
            <td><?php echo $personal_data->email; ?></td>
            <td>
              <form target="_blank" id="pdf" class="" action="<?php echo base_url() ?>Pdf_controller/pdf" method="post">
                <input type="hidden" name="will_id" value="<?php echo $personal_data->will_id; ?>">
                <button type="submit" class="btn btn-info">PDF</button></p>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          For download full pdf <a href="<?php echo base_url() ?>Pricing"><b>Subscribe Now</b></a>
        </li>
      </ol> -->
      <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <form target="_blank" id="pdf" class="" action="<?php echo base_url() ?>Pdf_controller/pdf" method="post">
            <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('temp_will_id'); ?>">
            Your PDF is here. <button type="submit" id="btn_pdf" class="btn btn-info" >View PDF</button>
          </form>
          <a href="#">Subscribe to Print and Download your Will</a> <a href="<?php echo base_url() ?>Pricing" class="btn btn-sm btn-info" >Subscribe Now</a>

        </li>
      </ol> -->
    <?php // }
        }
    ?>
  </div>
  </div>
</div>
<?php include('include/dashboard_footer.php'); ?>
<?php if($this->session->flashdata('subscribe_for_will')){ ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#subscribe_for_will').html('<b>Subscribe to create new will</b>')
    $('#subscribe_for_will').show().delay(8000).fadeOut();
  })
</script>
<?php } ?>
<?php if($this->session->flashdata('subscription_status')) { ?>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#subscribe_success').html('<b>Subscribed Successfully.</b>')
    $('#subscribe_success').show().delay(8000).fadeOut();
  });
  </script>
<?php } ?>

</body>
<?php } ?>
