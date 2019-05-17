<?php
 if($this->session->userdata('will_id')){
 defined('BASEPATH') OR exit('No direct script access allowed');
 include('include/head.php');
?>

<body>

  <?php
    $is_login = $this->session->userdata('user_is_login');
    if($is_login){
      include('include/login_header.php');
    }
    else{
      include('include/header.php');
    }
   ?>
<div class="" id="witness_page_div">
<!-- status bar satrt -->
<div class="container-fluid">
<br /><br />
<ul class="list-unstyled multi-steps">
	<li  >Personal Information</li>
	<li >Family Information</li>
	<li >Assets</li>
	<li >Executor</li>
	<li class="is-active">Witness</li>
</ul>
</div>
 <!-- end status bar -->

<!-- family info containner start -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
  <div class="row" >
    <div class="col-md-6 col-sm-12">
  	<div id="box" class="personal_info1">
  		<form class="" id="witness_form" method="post">
      <fieldset>
      <h3 class=" text-left">Witness Information </h3><br>
  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Witness Name</label>
  				<div class="col-md-9">
  					<input type="text" name="witness_name" id="witness_name" class="form-control clear"  aria-describedby="emailHelp" >
            <p id="error_witness_name" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
        </div>
      </div>

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Witness Address</label>
  				<div class="col-md-9">
  					<input type="text" name="witness_address" id="witness_address" class="form-control clear"  aria-describedby="emailHelp" >
            <p id="error_witness_address" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
        </div>
      </div>
      </fieldset>
  		</form>
      <p>  <button type="button" id="add_witness" class="btn btn-success" style="float:right;" >Add</button></p>
      <br><br><hr>

      <form class="" id="date_place_form" method="post">
      <fieldset>
      <h3 class=" text-left">Date and Place </h3><br>
  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Date of Signature</label>
  				<div class="col-md-9">
  					<input type="text"  readonly name="will_date" id="will_date" class="form-control clear"  aria-describedby="emailHelp" >
            <p id="error_will_date" style="color:red; display:none" class="text-left valide">*This field is required.</p>
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
  					<input type="text" name="will_place" id="will_place" class="form-control clear"  aria-describedby="emailHelp" >
            <p id="error_will_place" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
        </div>
      </div>
      </fieldset>
  		</form>
      <p>  <button type="button" id="add_date_place" class="btn btn-success" style="float:right;" >Add</button></p>
      <br><br>

  </div>

  <p> <button type="button" id="witness_previous" class="btn btn-info">Previous</button>

  <?php if($this->session->userdata('user_is_login')){
          ?>
          <button type="submit" id="btn_final_pdf" class="btn btn-info float-right" >Create PDF</button></p>
          <?php
        } else{ ?>
          <button type="submit" id="btn_pdf" class="btn btn-info float-right" >Create PDF</button></p>
      <?php } ?>
      <form target="_blank" id="final_pdf" class="" action="<?php echo base_url() ?>Pdf_controller/final_pdf" method="post">
        <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('will_id'); ?>">
      </form>
      <form target="_blank" id="pdf" class="" action="<?php echo base_url() ?>Pdf_controller/pdf" method="post">
        <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('will_id'); ?>">
      </form>
  <!--a href="#" type="button" id="personal_next" class="btn btn-info" style="float:right;">Create PDF</a--></p>
  </div>

  <div class="col-md-6 col-sm-12">
  	<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">

    <!-- <div class="container" style="background-color:white;">
    	<div class="" style="">
        <table id="table_personal_info" class="personal_data_dispaly table_personal_info">
          <thead>
            <tr>
              <th>Personal Info
                <button style="float:right;" type='button'  class='badge1 badge-pill' title='Delete Family Member'>
                  <a id='per_info' href="<?php echo base_url(); ?>Will_controller/personal_info_view" class='badge1' title='Delete Family Member'><i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>
                </button>
                <br> <hr> </th>
            </tr>
          </thead>
          <tbody>
            <tr><td>
              <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1" >Name :</label>
    						<label class="col-md-8 text-left" id="lbl_name" ></label>
    		      </div>

    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">Mobile :</label>
    						<label class="col-md-8 text-left" id="lbl_mobile"></label>
    		      </div>

    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">Email :</label>
    						<label class="col-md-8 text-left" id="lbl_email"></label>
    		      </div>
    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">Address :</label>
    						<label class="col-md-8 text-left" id="lbl_address"></label>
    		      </div>
    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">Occupation :</label>
    						<label class="col-md-8 text-left" id="lbl_occupation"></label>
    		      </div>
    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">Aadhar No :</label>
    						<label class="col-md-8 text-left" id="lbl_aadhar"></label>
    		      </div>
    		      <div class="row text-center">
    		        <label class="col-md-4 text-right" for="exampleInputEmail1">PAN No :</label>
    						<label class="col-md-8 text-left" id="lbl_pan"></label>
    		      </div>
            </td></tr>
          </tbody>
        </table>
      </div>
    </div> -->

    <!-- <div class="container" style="background-color:white;">
    <table id="table_family_member" class="personal_data_dispaly table_family_member" style=" width:100%;">
      <thead>
        <tr>
          <th>Family Member Info
            <button style="float:right;" type='button'  class='badge1 badge-pill' title='Delete Family Member'>
              <a id='per_info' href="<?php echo base_url(); ?>Will_controller/family_info_view" class='badge1' title='Delete Family Member'><i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>
            </button>
            <br> <hr> </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div> -->

    <!-- <div class="container" style="background-color:white;">
      <b>Assets Information</b>
    <table id="table_real_estate" class="personal_data_dispaly table_real_estate" style=" width:100%;">
      <thead>
        <tr>
          <th>Real Estate Info
            <button style="float:right;" type='button'  class='badge1 badge-pill' title='Delete Family Member'>
              <a id='per_info' href="<?php echo base_url(); ?>Will_controller/assets_info_view" class='badge1' title='Delete Family Member'><i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>
            </button>
            <br> <hr> </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_bank_assets" class="personal_data_dispaly table_bank_assets" style=" width:100%;">
      <thead>
        <tr>
          <th>Bank Assets Info
            <button style="float:right;" type='button'  class='badge1 badge-pill' title='Delete Family Member'>
              <a id='per_info' href="<?php echo base_url(); ?>Will_controller/assets_info_view" class='badge1' title='Delete Family Member'><i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>
            </button>
             <br> <br></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_vehicle" class="personal_data_dispaly table_vehicle" style=" width:100%;">
      <thead>
        <tr>
          <th>Vehicle Info
            <button style="float:right;" type='button'  class='badge1 badge-pill' title='Delete Family Member'>
              <a id='per_info' href="<?php echo base_url(); ?>Will_controller/assets_info_view" class='badge1' title='Delete Family Member'><i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>
            </button>
            <br> <hr> </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_gift" class="personal_data_dispaly table_gift" style=" width:100%;">
      <thead>
        <tr>
          <th>Gift Info
            <button style="float:right;" type='button'  class='badge1 badge-pill' title='Delete Family Member'>
              <a id='per_info' href="<?php echo base_url(); ?>Will_controller/assets_info_view" class='badge1' title='Delete Family Member'><i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>
            </button>
            <br> <hr> </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div> -->

    <!-- <div class="container" style="background-color:white;">
    <table id="table_executor" class="personal_data_dispaly table_executor" style=" width:100%;">
      <thead>
        <tr>
          <th>Executor Info
            <button style="float:right;" type='button'  class='badge1 badge-pill' title='Delete Family Member'>
              <a id='per_info' href="<?php echo base_url(); ?>Will_controller/executor_funeral_view" class='badge1' title='Delete Family Member'><i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>
            </button>
            <br> <hr> </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div> -->


    <!-- <div class="container" style="background-color:white;">
    <table id="table_funeral" class="personal_data_dispaly table_funeral" style=" width:100%;">
      <thead>
        <tr>
          <th>Funeral Info
            <button style="float:right;" type='button'  class='badge1 badge-pill' title='Delete Family Member'>
              <a id='per_info' href="<?php echo base_url(); ?>Will_controller/executor_funeral_view" class='badge1' title='Delete Family Member'><i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>
            </button>
             <br> <hr> </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div> -->

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
    </div>
  </div>
  </div>
<!-- </div> -->
</div>
</div>
<div class="" id="go_login_div" style="display:none">
  <!-- status bar satrt -->
  <div class="container-fluid">
  <br /><br />
  <ul class="list-unstyled multi-steps">

  	<li  >Personal Information</li>
  	<li >Family Information</li>
  	<li >Assets</li>
  	<li >Executor</li>
  	<li >Witness</li>
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
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<!-- bootstrap-datetimepicker -->
<script src="<?php echo base_url(); ?>assets/datetimepicker3/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/datetimepicker3/bootstrap-datetimepicker.fr.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<!-- Custome Javascript file -->
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/will_custome/witness_js.js" type="text/javascript"></script>
</body>
<?php }
else{
  header('location:login');
}
?>
