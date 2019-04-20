<?php
$is_login = $this->session->userdata('user_is_login');
if($is_login){
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- include head -->
<?php include('include/head.php'); ?>
<!-- include head end -->
<body>
  <?php
  foreach ($user_data as $user_data) {
  }
  ?>
<!-- include header -->
<?php
$page = 'will_list';
include('include/login_header.php'); ?>
<!-- include header end -->
<div class="container">
	<div class="content ">
	   <h2 class="text-center page_heading">Will List</h2>
     <div style="padding:20px;">
       <table id="will_list" class="table table-bordered will_list" >
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
             <td>
               <!-- <form id="form_will_details" action="<?php echo base_url(); ?>/User_controller/will_details" method="post">
                 <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list->will_id; ?>" />
               </form>
               <a type="button" id="btn_will_details" class="btn btn-sm btn-success no-margin"><i class="fa fa-eye"></i>View</a> -->
               <form id="form_will_edit" action="<?php echo base_url(); ?>/Will_controller/personal_info_view" method="post">
                 <input type="hidden" name="will_id" id="will_id" value="<?php echo $will_list->will_id; ?>" />
               </form>
               <a id="btn_will_edit" type="button" class="btn btn-sm btn-info no-margin"><i class="fa fa-edit"></i></i>Edit</a>
               <a type="button" class="btn btn-sm btn-danger no-margin"><i class="fa fa-trash"></i>Delete</a>
           </tr>
           <?php
              }
           ?>
         </tbody>
       </table>
     </div>
  </div>
</div>

<?php include('include/script_files.php') ?>
<script>

$(document).ready(function(){
		$('#will_list').DataTable({
    });

    $('#btn_will_details').click(function(){
      $('#form_will_details').submit();
    });

    $('#btn_will_edit').click(function(){
      $('#form_will_edit').submit();
    });
});
</script>
</body>
<?php } ?>
