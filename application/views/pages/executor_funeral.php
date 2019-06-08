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
<ul class="list-unstyled multi-steps m-0 pt-3 pb-3">
  <li class="personal-tab" >Personal Information</li>
	<li class="family-tab">Family Information</li>
	<li class="assets-tab">Assets</li>
	<li class="executor-tab is-active">Executor</li>
	<li class="witness-tab">Witness</li>
</ul>
</div>
 <!-- end status bar -->
<!-- family info containner start -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <!-- Distribution of 1/3 Share  -->
    <div id="box">
      <div class="personal_info1 p-3" style="margin-right: -18px;">
    		<form class="" id="share_form" method="post">
          <input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
          <fieldset>
            <h3 class=" text-left">Distribution of 1/3 Share: </h3>
            <div class="form-group" id="">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Share To: </label>
                <div class="col-md-3">
        						<input type="radio" id="person" name="share_type" class="" value="Person" checked="">
        						<label class="" for="person">Person</label>
        					</div>
        					<div class="col-md-3">
        						<input type="radio" id="organization" name="share_type" value="Organization" class="">
        						<label class="" for="organization">Organization</label>
        					</div>
                </div>
            </div>
            <div class="form-group" id="relation_div">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Relation: </label>
                <div class="col-md-9">
        					<input type="text" name="share_relation" id="share_relation" class="text required form-control form-control-sm clear" placeholder="Enter relationship of person with you"  aria-describedby="emailHelp" >
                </div>
              </div>
            </div>
            <div class="form-group" id="">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Name: </label>
                <div class="col-md-9">
        					<input type="text" name="share_name" id="share_name" class="text required form-control form-control-sm clear" placeholder="Firstname Middlename Lastname" >
                </div>
              </div>
            </div>
            <div class="form-group" id="">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Address: </label>
                <div class="col-md-9">
                  <input type="text" name="share_address" id="share_address" class="required form-control form-control-sm clear" placeholder="Enter Address" >
                </div>
              </div>
            </div>
            <div class="form-group" id="age_div">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Age: </label>
                <div class="col-md-6">
        					<input type="number" name="share_age" id="share_age" class="required form-control form-control-sm clear"  placeholder="Enter age in year" >
                </div>
              </div>
            </div>
            <div class="form-group" id="">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Percentage of Share: </label>
                <div class="col-md-6">
        					<input type="number" name="share_percentage" id="share_percentage" class="required form-control form-control-sm clear" placeholder="%" >
                </div>
                <label id="rem_per" class="col-md-3 text-left"></label>
              </div>
              <p id="success_note" style="display:none; font-weight:600;" class="text-left"></p>
            </div>
          <button type="button" id="add_share" class="btn btn-success" >Add</button>
          </fieldset>
    		</form>
    </div>
    </div>

      <!-- Executor Information Start  -->
  	<div id="box">
      <div class="personal_info1 p-3" style=" margin-right: -18px;">
    		<form class="" id="executor_form" method="post">
          <input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
          <fieldset>
            <h3 class=" text-left">Executor: </h3>
            <div class="form-group" id="">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Executor Name: </label>
                <div class="col-md-3">
        					<select class="form-control form-control-sm" name="e_name_title" id="e_name_title">
        					 <option>Mr.</option>
        					 <option>Miss.</option>
        					 <option>Mrs.</option>
        				 </select>
                </div>
        				<div class="col-md-6">
        					<input type="text" name="executor_name" id="executor_name" class="text required form-control form-control-sm clear"  aria-describedby="emailHelp" >
                </div>
              </div>
            </div>
        		<div class="form-group" id="">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Address: </label>
        				<div class="col-md-9">
        					<input type="text" name="executor_address" id="executor_address" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
                </div>
              </div>
            </div>
        		<div class="form-group" id="">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Age: </label>
        				<div class="col-md-9">
        					<input type="number" name="executor_age" id="executor_age" class="age-major required form-control form-control-sm clear"  aria-describedby="emailHelp" placeholder="Enter executor age in year" >
                </div>
              </div>
            </div>
            <button type="button" id="add_executor" class="btn btn-success" >Add</button>
          </fieldset>
    		</form>
    </div>
      <!-- Executor Information End  -->
      <!-- Funeral and Burial Information Start  -->
      <!-- <div class="" style="display:none;">
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
      <p><button type="button" id="add_funeral" class="btn btn-success"  >Add</button></p>
  		</form>
      <br><br>
    </div> -->
  </div>
<p>
    <button id="executor_previous" class="btn btn-info">Previous</button>
    <button style="float:right;" id="executor_next" class="btn btn-info" >Next</button>
</p>
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
      <table id="table_share" class="personal_data_dispaly table_share" style=" width:100%;">
        <thead>
          <tr>
            <th>Distribution of 1/3 Share
              <br> <hr> </th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      </div>
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


    <!-- <div class="container" style="background-color:white;">
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
    </div> -->
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
