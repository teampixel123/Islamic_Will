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
                              <td class="p-0" style="border: none!important;">
                                <form id="form_will_edit" action="<?php echo base_url(); ?>Will_controller/load_login_start_info" method="post">
                                   <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list->will_id; ?>" />
                                   <!-- <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list->will_id; ?>" /> -->
                  								 <button id="btn_will_edit" style="width:70px;" type="submit" class="btn btn-sm btn-info no-margin"><i class="fa fa-edit"></i></i> Edit</button>
                                </form>
                              </td>
                              <?php $is_will_complete = $will_list->is_will_complete;
                              if($is_will_complete == 1){ ?>
                                <td class="p-0" style="border: none!important;">
                                  <form target="_blank" id="form_will_pdf" action="<?php echo base_url(); ?>Pdf_controller/final_pdf" method="post">
                        							 <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list->will_id; ?>" />
                        							 <button id="btn_will_pdf" style="width:70px;" type="submit" class="btn btn-sm btn-info no-margin"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    						  </form>
                                </td>
                              <?php  }
                                else{ ?>
                                  <td class="pt-1" style="border: none!important; color:red;">
                                  Incomplete Will
                                </td>
                              <?php } ?>

                                <td class="p-0" style="border: none!important;">
                                  <!-- <form id="form_will_edit" action="<?php echo base_url(); ?>Will_controller/delete_will" method="post">
                                     <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list->will_id; ?>" />
                                     <button id="btn_will_edit" type="submit" class="btn btn-sm btn-danger no-margin"><i class="fa fa-edit"></i></i> Delete</button>
                                  </form> -->
                                  <!-- Button trigger modal -->
                                  <!-- <button type="button" class="btn btn-sm btn-danger no-margin" data-toggle="modal" data-target="#exampleModalCenter_<?php echo $will_list->id; ?>">
                                    Delete
                                  </button> -->
                                  <!-- Modal -->
                                  <!-- <div class="modal fade" id="exampleModalCenter_<?php echo $will_list->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Do You want's To Delete This Will </h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                              <h5>Will Id: <?php echo $will_list->will_id; ?></h5>
                                              <h5>Name: <?php echo $will_list->full_name; ?></h5>

                                        </div>
                                        <div class="modal-footer">
                                          <form id="form_will_edit" action="<?php echo base_url(); ?>Will_controller/delete_will" method="post">
                                             <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list->will_id; ?>" />
                                             <button id="btn_will_edit" type="submit" class="btn  btn-danger no-margin">Yes</button>
                                          </form>

                                          <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div> -->
                                </td>
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
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>

    <!-- /.container-fluid -->



  </div>
  <!-- /.content-wrapper -->

  </div>
</div>



<?php include('include/dashboard_footer.php') ?>
</body>
<?php } ?>
