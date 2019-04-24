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
	   <h2 class="text-center pt-5">Will Details</h2>
     <div style="padding:20px;">
       <div class="row">
         <div class="col-md-6">
         <div class="card border-info mb-6  pr-0 pl-0" >
          <div class="card-header">Personal Details</div>
            <div class="card-body">
              <?php foreach ($personal_info as $personal_info) { ?>
                <p class="card-text mb-1">Full Name: <?php echo $personal_info->name_title.' '.$personal_info->full_name; ?></p>
                <p class="card-text mb-1">Mobile Number: <?php echo $personal_info->mobile_no; ?></p>
                <p class="card-text mb-1">Email: <?php echo $personal_info->email; ?></p>
                <p class="card-text mb-1">Address: <?php echo $personal_info->address.', '.$personal_info->city.', '.$personal_info->state.'-'.$personal_info->pin_code.', '.$personal_info->country; ?></p>
                <p class="card-text mb-1">Occupation: <?php echo $personal_info->occupation; ?></p>
                <p class="card-text mb-1">Aadhar No: <?php echo $personal_info->aadhar_no; ?></p>
                <p class="card-text mb-1">PAN No: <?php echo $personal_info->pan_no; ?></p>
              <?php } ?>
            </div>
          </div>
          </div>
          <!-- <div class="mb-6 col-md-1 pr-0 pl-0">
          </div> -->
          <!-- <div class="col-md-6">
          <div class="card border-info mb-6 pr-0 pl-0" >
           <div class="card-header">Family Members</div>
             <div class="card-body">
               <?php
               $i=0;
               foreach ($family_info as $family_info) {
               $i++;
               ?>
                 <p class="card-text mb-1"><?php echo $i.') <b>'.$family_info->relationship.'</b>: '.$family_info->family_person_name.', Age: '.$family_info->family_person_age; ?>
                 </br><?php if($family_info->is_minar == 1){ echo '&nbsp;&nbsp;&nbsp;&nbsp;Guardian: '.$family_info->guardian_name.' Address: '.$family_info->guardian_address;  } ?>
                 </p>
               <?php } ?>
             </div>
           </div>
        </div> -->
        </div>


        <!-- <div class="row">
          <div class="col-md-12">
            <div class="card border-info mb-6  pr-0 pl-0" >
             <div class="card-header">Personal Details</div>
               <div class="card-body">
                 <?php
                 $i==0;
                 foreach ($real_estate as $real_estate) {
                 $i++
                 ?>
                   <p class="card-text mb-1"><?php echo $i.') '.$real_estate->estate_type; ?></p>

                 <?php } ?>
               </div>
             </div>
          </div>
        </div> -->





     </div>
  </div>
</div>

<?php include('include/script_files.php') ?>
<script>

$(document).ready(function(){
		$('#will_list').DataTable({

    });
});
</script>
</body>
<?php } ?>
