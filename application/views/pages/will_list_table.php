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
    $page = 'will_list';
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
        <li class="breadcrumb-item active">Will List</li>
      </ol>



      <!-- DataTables Example -->
      <div class="card mb-3">
        <!-- <div class="card-header">
          <i class="fas fa-table"></i>
          Data Table Example</div> -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Will Id</th>
                  <th>Full name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <!-- <tfoot>
                <tr>
                  <th>#</th>
                  <th>Will Id</th>
                  <th>Full name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </tfoot> -->
              <tbody>
                <?php
                   $i = 0;
                   foreach ($will_list as $will_list) {
                   $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $will_list->will_id; ?></td>
                  <td><?php echo $will_list->full_name; ?></td>
                  <td><?php echo $will_list->mobile_no; ?></td>
                  <td><?php echo $will_list->email; ?></td>
                  <td><?php echo $will_list->address; ?></td>
                  <td class="p-0">
                    <!--
                    <a type="button" id="btn_will_details" class="btn btn-sm btn-success no-margin"><i class="fa fa-eye"></i>View</a>
                    <form id="form_will_details" action="<?php echo base_url(); ?>/User_controller/will_details" method="post">
                      <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list->will_id; ?>" />
                      <button id="btn_will_edit" type="submit" class="btn btn-sm btn-info no-margin"><i class="fa fa-edit"></i></i> details</button>
                    </form>
     							  -->

                        <table >
                          <tbody style="border: none!important;">
                            <tr style="border: none!important;">
                              <?php
                              $will_rem_updations = $will_list->will_rem_updations;
                              $updation_last_date = $will_list->updation_last_date;
                              $today = date('d-m-Y');
                              if($will_rem_updations > 0 && strtotime($updation_last_date) >= strtotime($today)){ ?>
                                <td class="p-0" style="border: none!important;">
                                  <button type="button" style="width:90px;" class="btn btn-sm btn-primary no-margin" data-toggle="modal" data-target="#exampleModal_<?php echo $i; ?>">Edit Will</button>
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
                                             <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list->will_id; ?>" />
                                             <button id="btn_will_edit" title="You can update only 1 time" type="submit" class="btn btn-primary"><i style="color:#ffffff !important;" class="fa fa-edit"></i></i> Edit Will</button>
                                          </form>
                                          <!-- <button type="button" class="btn btn-primary">Edit</button> -->
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- // Modal -->
                              <?php } else{ ?>
                                <td class="p-0" style="border: none!important;">
                                  <button type="button" style="width:90px;" class="btn btn-sm btn-primary no-margin" disabled><i style="color:#ffffff !important;" class="fa fa-edit"></i> Edit Will</button>
                                </td>
                              <?php } ?>

                              <?php $is_will_complete = $will_list->is_will_complete;
                                    $is_blur = $will_list->is_blur;
                              if($is_will_complete == 1 && $is_blur == 'no'){ ?>
                                <td class="p-0" style="border: none!important;">
                                  <form target="_blank" id="form_will_pdf" action="<?php echo base_url(); ?>Pdf_controller/final_pdf" method="post">
                        							 <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list->will_id; ?>" />
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

    <!-- /.container-fluid -->



  </div>
  <!-- /.content-wrapper -->

  </div>
</div>



<?php include('include/dashboard_footer.php') ?>
</body>
<?php } ?>
