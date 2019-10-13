<?php
$is_login = $this->session->userdata('owner_is_login');
if($is_login){
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
  $page = 'will_list';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include('include/admin_head.php') ?>
  <body id="page-top">
  <?php include('include/admin_navbar.php') ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include('include/sidebar.php') ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Non Registered Will List</li>
          <a href="<?php echo base_url(); ?>Owner_controller/will_list" class="btn btn-primary ml-auto">Registered Will List</a>

        </ol>
        <!-- Icon Cards-->
        <!-- Area Chart Example-->
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Non Registered Will List</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Will Id</th>
                    <th>Full Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <!-- <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot> -->
                <tbody>
                  <?php
                  $i = 0;
                  foreach ($will_list as $will_list) {
                    $i++;
                    $will_rem_updations = $will_list->will_rem_updations;
                    if($will_rem_updations == 0){ $color='red';}
                    else{ $color='green';}
                  ?>
                    <tr>
                      <td style="color:<?php echo $color; ?>;"><b><?php echo $i; ?></b></td>
                      <td><?php echo $will_list->will_id; ?></td>
                      <td><?php echo $will_list->name_title.' '.$will_list->full_name; ?></td>
                      <td><?php echo $will_list->mobile_no; ?></td>
                      <td><?php echo $will_list->email; ?></td>
                      <td><?php echo $will_list->will_date; ?></td>
                      <td>
                        <table>
                          <tr>
                            <?php if($will_list->is_will_complete == 1){ ?>
                              <td class="p-0" style="border: none!important;">
                                <form class="" action="<?php echo base_url() ?>Will-PDF" target="_blank" method="post">
                                  <input type="hidden" name="will_id" value="<?php echo $will_list->will_id; ?>">
                                  <button type="submit" class="btn btn-default btn-sm" name="button"><i style="color:#00cc00;" class="fa fa-file-pdf"></i></button>
                                </form>
                              </td>
                            <?php } else{ ?>
                              <td class="p-0" style="border: none!important;">
                                <button type="submit" title="Incomplite Will" class="btn btn-default btn-sm" name="button"><i style="color:#99ff99;" class="fa fa-file-pdf" disabled></i></button>
                              </td>
                            <?php } ?>

                            <td class="p-0" style="border: none!important;">
                              <form class="" action="<?php echo base_url() ?>Owner_controller/update_will" target="_blank" method="post">
                                <input type="hidden" name="will_id" value="<?php echo $will_list->will_id; ?>">
                                <button type="submit" class="btn btn-default btn-sm" name="button"><i style="color:blue;" class="fa fa-edit"></i></button>
                              </form>
                            </td>
                            <td class="p-0" style="border: none!important;">
                              <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModal_<?php echo $i; ?>"><i style="color:red;" class="fa fa-trash"></i></button>
                              <!--  -->
                            </td>
                          </tr>
                        </table>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal_<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Will</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Do you want to delete this Will.</p>
                                <p>Name: <?php echo $will_list->name_title.' '.$will_list->full_name; ?></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form class="" action="<?php echo base_url() ?>Owner_controller/delete_will" method="post">
                                  <input type="hidden" name="will_id" value="<?php echo $will_list->will_id; ?>">
                                  <button type="submit" class="btn btn-danger" name="button">Delete</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- //Modal -->

                      </td>
                    </tr>
                  <?php } ?>

                  <?php  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
<?php include('include/admin_footer.php') ?>

</body>
<?php }
else{
  header('Location:'.base_url().'Owner_controller/login_view');
}
?>
</html>
