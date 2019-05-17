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
<!-- status bar satrt -->
<div class="container-fluid">
<br /><br />
<ul class="list-unstyled multi-steps">

	<li  >Personal Information</li>
	<li >Family Information</li>
	<li >Assets</li>
	<li class="is-active">Executor</li>
	<li>Witness</li>
</ul>
</div>
 <!-- end status bar -->


<!-- family info containner start -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
	<!-- <div class="jumbotron "> -->
	<!--action="<?php echo base_url(); ?>/Will_controller/save_personal_info"-->
<br>
  <div class="row">
    <div class="col-md-6">
  	<div id="box" >
      <!-- Executor Information Start  -->
      <div class="personal_info1" style=" margin-right: -18px;">
  		<form class="" id="executor_form" method="post">
      <input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
      <fieldset>
      <h3 class=" text-left">Executor: </h3>
      <div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Executor Name: </label>
          <div class="col-md-3">
  					<select class="form-control" name="e_name_title" id="e_name_title">
  					 <option value="0">select</option>
  					 <option>Mr.</option>
  					 <option>Miss.</option>
  					 <option>Mrs.</option>
  				 </select>
  				 <p id="error_e_name_title" style="color:red; display:none" class="text-left invalide m-0">*This field is required.</p>
          </div>
  				<div class="col-md-6">
  					<input type="text" name="executor_name" id="executor_name" class="form-control clear"  aria-describedby="emailHelp" >
            <p id="error_executor_name" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
        </div>
      </div>

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Address: </label>
  				<div class="col-md-9">
  					<input type="text" name="executor_address" id="executor_address" class="form-control clear"  aria-describedby="emailHelp" >
            <p id="error_executor_address" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
        </div>
      </div>

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Age: </label>
  				<div class="col-md-9">
  					<input type="number" name="executor_age" id="executor_age" class="form-control clear"  aria-describedby="emailHelp" placeholder="Enter executor age in year" >
            <p id="error_executor_age" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
        </div>
      </div>
        <p>  <button type="button" id="add_executor" class="btn btn-success" >Add</button></p>
      </fieldset>
  		</form>
    </div>
      <!-- Executor Information End  -->
      <!-- Funeral and Burial Information Start  -->
      <div class="" style="display:none;">
        <div class="personal_info1 " style=" margin-right: -18px;" >
        <form class="" id="funeral_form" method="post">
        <fieldset>
        <h3 class=" text-left">Funeral and Burial: </h3>
        <div class="form-group" id="">
          <div class="row text-center">
            <label class="col-md-3 text-right" for="exampleInputEmail1">Funeral and Burial Person Name: </label>
    				<div class="col-md-9">
    					<input type="text" name="funeral_name" id="funeral_name" class="form-control clear"  aria-describedby="emailHelp" >
              <p id="error_funeral_name" style="color:red; display:none" class="text-left valide">*This field is required.</p>
            </div>
          </div>
        </div>

      </div>


  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Address: </label>
  				<div class="col-md-9">
  					<input type="text" name="funeral_address" id="funeral_address" class="form-control clear"  aria-describedby="emailHelp" >
            <p id="error_funeral_address" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
        </div>
      </div>
      </fieldset>
      <p>  <button type="button" id="add_funeral" class="btn btn-success"  >Add</button></p>
  		</form>
      <!-- Funeral and Burial Information End  -->
      <br><br>
  </div>
  <p>  <button id="executor_previous" class="btn btn-info">Previous</button>
  <button style="float:right;" id="executor_next" class="btn btn-info" >Next</button></p>

</div>
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

    <div class="container" style="background-color:white;">
    <table id="table_executor" class="personal_data_dispaly table_executor" style=" width:100%;">
      <thead>
        <tr>
          <th>Executor Info
            <br> <hr> </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>


    <div class="container" style="background-color:white;">
    <table id="table_funeral" class="personal_data_dispaly table_funeral" style=" width:100%;">
      <thead>
        <tr>
          <th>Funeral Info
             <br> <hr> </th>
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

<!-- Border -->

		<div class="border-top mt-3"></div>


<?php include('include/footer.php') ?>
<!-- personal info containner end -->

<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<!-- Custome Javascript file -->
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/will_custome/executor_funeral_js.js" type="text/javascript"></script>
</body>
<?php }
else{
  header('location:login');
}
?>
