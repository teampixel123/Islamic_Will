<?php
 if($this->session->userdata('will_id')){
 defined('BASEPATH') OR exit('No direct script access allowed');
 include('include/head.php');
?>
<body>
  <?php
		$is_login = $this->session->userdata('user_is_login');
		$owner_login = $this->session->userdata('owner_is_login');
		// echo $owner_login;
	  if($is_login){
			include('include/login_header.php');
		}
		elseif($owner_login) {
			 include(BASE_URL. 'admin_navbar_editwill.php');
		}
		else{
			include('include/header.php');
		}
	 ?>
   <!--Loader Modal -->
   <div class="modal fade" id="save_load_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-body" >
           <div class="load" style="margin-left:37%; margin-top:33%;"></div>
           <p class="text-center" style="color:#fff; font-size:20px !important; font-weight:600;">Savings your information. Please wait.</p>
         </div>
     </div>
   </div>
<div class="" id="witness_page_div">
<!-- status bar satrt -->
<div class="container-fluid">
<ul class="list-unstyled multi-steps m-0 pt-3 pb-3">
  <li class="personal-tab" >Personal Information</li>
	<li class="family-tab">Family Information</li>
	<li class="assets-tab">Assets</li>
	<li class="executor-tab">Distribution & Executor</li>
	<li class="witness-tab is-active">Witness</li>
</ul>
</div>
 <!-- end status bar -->
<!-- family info containner start -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
  <div class="row" >
    <div class="col-md-6 col-sm-12">
  	<div id="box" class="personal_info1 p-3">
  		<form class="" id="witness_form" method="post">
      <fieldset>
      <h3 class=" text-left">Witness Information </h3>
  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Witness Name</label>
  				<div class="col-md-9">
  					<input type="text" name="witness_name" id="witness_name" class="required text form-control form-control-sm clear"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>
  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Witness Address</label>
  				<div class="col-md-9">
  					<input type="text" name="witness_address" id="witness_address" class="address required form-control form-control-sm clear"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>
      </fieldset>
  		</form>
    <button type="button" id="add_witness" class="btn btn-success" style="float:right;" >Add</button>
      <br><br><hr>

      <form class="" id="date_place_form" method="post">
      <fieldset>
      <h3 class=" text-left">Date and Place </h3>
  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right"  for="exampleInputEmail1">Date of Signature</label>
  				<div class="col-md-9">
  					<input type="text" style="background-color:#fff;"  readonly name="will_date" id="will_date" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>

      <!-- <div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Time</label>
  				<div class="col-md-9"> -->
  					<input type="hidden"  name="will_time" id="will_time" value="<?php echo date("h:i:s A"); ?>" class="form-control clear">
          <!-- </div>
        </div>
      </div> -->

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Place</label>
  				<div class="col-md-9">
  					<input type="text" name="will_place" id="will_place" class="required text form-control form-control-sm clear"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>
      </fieldset>
  		</form>
      <p>  <button type="button" id="add_date_place" class="btn btn-success" style="float:right;" >Add</button></p>
      <br>

  </div>
  <?php
  $will_id = $this->session->userdata('will_id');
  $will_data = $this->Will_Model->get_will_data($will_id);
  foreach ($will_data as $will_data) {
    $is_blur = $will_data->is_blur;
  }
  ?>

  <p> <button type="button" id="witness_previous" class="btn btn-info">Previous</button>

      <?php if($this->session->userdata('user_is_login') && ($is_have_blur == 'no' || $is_blur == 'no')){ ?> <!-- && $is_have_blur == 'no' -->
        <button type="submit" id="btn_final_pdf" class="btn btn-info float-right" disabled>Create PDF</button></p>

      <?php } elseif ($this->session->userdata('owner_is_login')) { ?>
        <button type="submit" id="btn_final_pdf_owner" class="btn btn-info float-right" disabled>Create PDF</button></p>

      <?php } elseif ($this->session->userdata('user_is_login') && $is_have_blur == 'yes') { ?>
          <button type="submit" id="btn_pdf_blur" class="btn btn-info float-right">Create PDF</button></p>>

      <?php } else { ?>
        <button type="submit" id="btn_pdf" class="btn btn-info float-right" disabled>Create PDF</button></p>
      <?php } ?>
      <!-- blur pdf -->
      <form target="_blank" id="pdf" class="" action="<?php echo base_url() ?>Pdf_controller/pdf" method="post">
        <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('will_id'); ?>">
        <input type="hidden" name="is_complete" value="1">
      </form>
      <!-- final pdf -->
      <form target="_blank" id="final_pdf" class="" action="<?php echo base_url() ?>Pdf_controller/final_pdf" method="post">
        <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('will_id'); ?>">
        <input type="hidden" name="btn_from" id="btn_from" value="user_will_edit" />
        <input type="hidden" name="is_complete" value="1">
      </form>
      <form target="_blank" id="final_pdf_owner" class="" action="<?php echo base_url() ?>Pdf_controller/final_pdf_owner" method="post">
        <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('will_id'); ?>">
        <input type="hidden" name="is_complete" value="1">
      </form>
  <!--a href="#" type="button" id="personal_next" class="btn btn-info" style="float:right;">Create PDF</a--></p>
  </div>

  <div class="col-md-6 col-sm-12">
  	<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
    <div class="container" style="background-color:white;">
    <table id="table_witness" class="personal_data_dispaly table_witness" style=" width:100%;">
      <thead>
        <tr>
          <th>Witness Info <br> <hr> </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <table id="table_date_place" class="personal_data_dispaly table_date_place" style=" width:100%;">
      <thead>
        <tr>
          <th>Date and Place <br> <hr> </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td id="date_place_td"></td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
  </div>
<!-- </div> -->
</div>
</div>
<input type="hidden" name="date_place_txt" id="date_place_txt">
<div class="" id="go_login_div" style="display:none">
  <!-- status bar satrt -->
  <div class="container-fluid">
  <br /><br />
  <ul class="list-unstyled multi-steps">

  	<li>Personal Information</li>
  	<li>Family Information</li>
  	<li>Assets</li>
  	<li>Executor</li>
  	<li>Witness</li>
  </ul>
  </div>
  <div class="container">
    <div class="row" >
      <div class="col-md-12 text center">
    	<div class="personal_info1">
        <p>Your 'Will' is created successfully. <a href="<?php echo base_url(); ?>Login_controller/register_user_view">Register</a> for complete download.</p>
      </div>
      </div>
      </div>
      </div>
</div>
<!-- Border -->
<div class="border-top mt-3"></div>
<?php include('include/footer.php') ?>
<!-- personal info containner end -->
<!-- Custome Javascript file -->
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/will_custome/witness_js.js" type="text/javascript"></script>
</body>
<?php }
else{
  header('location:login');
}
?>
