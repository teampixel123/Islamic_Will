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
	<li class="assets-tab is-active">Assets</li>
	<li class="executor-tab">Executor</li>
	<li class="witness-tab">Witness</li>
</ul>
</div>
 <!-- end status bar -->

<!-- family info containner start -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
  <div class="row">
    <div class="col-md-6 ">
  	<div id="box" class="personal_info1 p-3" >
      <!-- Executor Information Start  -->
      <h3 class=" text-left">Assets Info </h3>
      <ul class="nav nav-tabs">
        <li class="nav-item" style="width:25%;">
          <a id="real_estate_tab" class="nav-link active rem_class" data-toggle="tab" href="#real_estate"><i class="fa fa-home fa-2x"  ></i></br> Real Estate</a>
        </li>
        <li class="nav-item" style="width:26%;">
          <a id="bank_assets_tab" class="nav-link rem_class" data-toggle="tab" href="#bank_assets"><i class="fa fa-university fa-2x" ></i></br> Bank Assets</a>
        </li>
        <li class="nav-item" style="width:24%;">
          <a id="vehicle_tab" class="nav-link rem_class" data-toggle="tab" href="#vehicle"><i class="fa fa-car fa-2x"  ></i></br> Vehicle</a>
        </li>
        <li class="nav-item rem_class4" style="width:25%;">
          <a id="other_gifts_tab" class="nav-link rem_class" data-toggle="tab" href="#other_gifts "><i class="fa fa-gift fa-2x"  ></i></br> Other Gifts </a>
        </li>
      </ul>

      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active show rem_class" id="real_estate">
          <form class="" id="assets_form" method="post">
          <input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
          <input type="hidden" name="real_estateId" id="real_estateId" value="">
          <fieldset>
          <h4 class=" text-left p-2">Real Estate : </h4>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1" placeholder="Select Estate Type">Estate Types: </label>
      				<div class="col-md-9">
                <select class="required form-control form-control-sm clear_dr" name="estate_type" id="estate_type">
                  <option value="0" disabled selected>Select Estate Type</option>
      					  <option>Flat</option>
      					  <option>Shop</option>
      					  <option>Land</option>
      					  <option>Plot</option>
      					  <option>Commercial Shop unit</option>
      					  <option>Commercial office unit</option>
      				 </select>
              </div>
            </div>
          </div>
      		<div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Number: </label>
      				<div class="col-md-9">
      					<input type="text" name="house_no" id="house_no" class="required form-control form-control-sm form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Survey number / CTS No : </label>
      				<div class="col-md-9">
      					<input type="text" name="survey_number" id="survey_number" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Measurement Area: </label>
      				<div class="col-md-5">
      					<input type="number" name="measurment_area" id="measurment_area" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
              <div class="col-md-4">
                <select class="required form-control form-control-sm clear_dr" name="measurment_unit" id="measurment_unit">
                  <option value="0">Select Unit</option>
      					  <option>Square Meter</option>
      					  <option>Square Feet</option>
      					  <option>Hector</option>
      				 </select>
              </div>
            </div>
          </div>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Address : </label>
      				<div class="col-md-9">
      					<input type="text" name="estate_address" id="estate_address" class="required form-control form-control-sm clear" >
              </div>
            </div>
          </div>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">City : </label>
      				<div class="col-md-9">
      					<input type="text" name="estate_city" id="estate_city" class="text required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">PIN/ZIP Code: </label>
      				<div class="col-md-9">
      					<input type="number" name="estate_pin" id="estate_pin" class="pin-code required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Country: </label>
      				<div class="col-md-9">
      					<input type="text" name="estate_country" id="estate_country" class="text required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">State: </label>
      				<div class="col-md-9">
      					<input type="text" name="estate_state" id="estate_state" class="text required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          </fieldset>
      		</form>
          <p id="success_update_real" style="color:green; display:none" class="text-left valide">*Information updated successfully.</p>
          <p id="success_save_real" style="color:green; display:none" class="text-left valide">*Information Saved successfully.</p>
          <button type="button" id="add_assets" class="btn btn-success"  >Add</button>
          <button type="button" id="update_real_estate" class="btn btn-info float-right d-none" >Update</button>
        </div>

        <div class="tab-pane fade rem_class" id="bank_assets">
          <form class="" id="bank_assets_form" method="post">
          <input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
          <input type="hidden" name="bank_assets_id" id="bank_assets_id" value="">
          <fieldset>
          <h4 class=" text-left p-2">Bank Assets : </h4>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Estate Types: </label>
      				<div class="col-md-9">
                <select class="required form-control form-control-sm clear_dr" name="assets_type" id="assets_type">
                  <option value="0">Select Estate Type</option>
      					  <option>Savings A/c</option>
      					  <option>Current  A/C</option>
      					  <option>Fixed Deposits</option>
      					  <option>PPF</option>
      					  <option>Bank Locker</option>
      					  <option>Mutual Funds</option>
      					  <option>Stock Equities</option>
      					  <option>Insurance Policy</option>
      				 </select>
              </div>
            </div>
          </div>
      		<div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">
                <div id="customer_id" class="hide_num" style="display:none;">Customer ID No: </div>
                <div id="locker_no" class="hide_num" style="display:none;">Locker Number: </div>
                <div id="folio_no" class="hide_num" style="display:none;">Folio Number: </div>
                <div id="serial_no" class="hide_num" style="display:none;">ISIN/Serial Number: </div>
                <div id="policy_no" class="hide_num" style="display:none;">Policy Number: </div>
                <div id="account_no" class="hide_num" >Account Number: </div>
                <!-- <div id="amount" class="hide_num" >Some amount: </div> -->
              </label>
      				<div class="col-md-9">
      					<input type="text" name="account_number" id="account_number" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">
                <div id="company_name" class="hide_name" style="display:none;">Company Name: </div> <!--For Mutual Funds and Stock Equities and PPF-->
                <div id="insurance_company" class="hide_name" style="display:none;">Insurance Company: </div> <!--For Mutual Funds -->
                <div id="bank_nm" class="hide_name" >Bank Name: </div>
              </label>
      				<div class="col-md-9">
      					<input type="text" name="bank_name" id="bank_name" class="text required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Branch</label>
      				<div class="col-md-9">
      					<input type="text" name="branch_name" id="branch_name" class="text required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group" id="b_state_div" >
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">State</label>
      				<div class="col-md-9">
      					<input type="text" name="b_state" id="b_state" class="text required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group" id="b_pin_code_div" >
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Pin Code</label>
      				<div class="col-md-9">
      					<input type="number" name="b_pin_code" id="b_pin_code" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group" id="b_sum_amount_div" style="display:none;">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Sum Assurance Amount  </label>
              <div class="col-md-9">
                <input type="number" name="b_sum_amount" id="b_sum_amount" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group hiden_div" id="fd_recipt_No_div" style="display:none;">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">FD Receipt No  </label>
      				<div class="col-md-9">
      					<input type="text" name="fd_recipt_No" id="fd_recipt_No" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          <div class="form-group hiden_div" id="key_number_div" style="display:none;">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Key Number  </label>
      				<div class="col-md-9">
      					<input type="text" name="key_number" id="key_number" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          </fieldset>
      		</form>
          <p id="success_update_bank" style="color:green; display:none" class="text-left valide">*Information updated successfully.</p>
          <p id="success_save_bank" style="color:green; display:none" class="text-left valide">*Information Saved successfully.</p>
          <p>  <button type="button" id="update_bank_assets" class="btn btn-info float-right d-none" >Update</button></p>
          <p style="float:right;">  <button type="button" id="add_bank_assets" class="btn btn-success"  >Add</button></p>
        </div>

        <!-- Vehicle start -->
        <div class="tab-pane fade rem_class" id="vehicle">
          <form class="" id="vehicle_assets_form" method="post">
          <input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
          <input type="hidden" name="vehicle_Id" id="vehicle_Id" value="">
          <fieldset>
          <h4 class=" text-left p-2">Vehicle : </h4>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Vehicle Model: </label>
              <div class="col-md-9">
      					<input type="text" name="vehicle_model" id="vehicle_model" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>

      		<div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Make Year: </label>
      				<div class="col-md-9">
      					<input type="number" name="vehicle_make_year" id="vehicle_make_year" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>

          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Registration Number: </label>
      				<div class="col-md-9">
      					<input type="text" name="registration_number" id="registration_number" class="required form-control form-control-sm clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          </fieldset>
      		</form>
          <p id="success_update_vehicle" style="color:green; display:none" class="text-left valide">*Information updated successfully.</p>
          <p id="success_save_vehicle" style="color:green; display:none" class="text-left valide">*Information Saved successfully.</p>
          <p>  <button type="button" id="update_vehicle_assets" class="btn btn-info float-right d-none" >Update</button></p>
          <p style="float:right;">  <button type="button" id="add_vehicle_assets" class="btn btn-success"  >Add</button></p>
        </div>
        <!-- Vehicle end -->

        <!-- Other Gift start -->
        <div class="tab-pane fade rem_class" id="other_gifts">
          <form class="" id="other_gift_assets_form" method="post">
          <input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
          <input type="hidden" name="gift_Id" id="gift_Id" value="">
          <fieldset>
          <h4 class=" text-left p-2">Other Gifts : </h4>
          <div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Gift Types: </label>
      				<div class="col-md-9">
                <select class="form-control clear_dr" name="gift_type" id="gift_type">
                  <option value="0">Select Gift</option>
      					  <option>Jewellery and Valuables</option>
      					  <option>Remained Assets</option>
      				 </select>
              </div>
            </div>
          </div>

      		<div class="form-group" id="">
            <div class="row text-center">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Description: </label>
      				<div class="col-md-9">
      					<input type="text" name="gift_description" id="gift_description" class="required form-control clear"  aria-describedby="emailHelp" >
              </div>
            </div>
          </div>
          </fieldset>
      		</form>
          <p id="success_update_gift" style="color:green; display:none" class="text-left valide">*Information updated successfully.</p>
          <p id="success_save_gift" style="color:green; display:none" class="text-left valide">*Information Saved successfully.</p>
          <p>  <button type="button" id="update_other_gift_assets" class="btn btn-info float-right d-none" >Update</button></p>
          <p style="float:right;">  <button type="button" id="add_other_gift_assets" class="btn btn-success"  >Add</button></p>
        </div>
        <!-- Other Gift end -->
<br><br>
      </div>
      <div>
    </div>
  </div>
  <p id="error_add_assets" style="color:red; display:none" class="text-left valide">*Add family information for next.</p>
  <p>  <button type="button" id="assets_previous" class="btn btn-info">Previous</button>
  <button type="button" style="float:right;" type="button" id="assets_next" class="btn btn-info" >Next</button></p>
  </div>

  <div class="col-md-6">
  	<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">

    <!-- <div class="container">
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
    						<label class="col-md-8 text-left" id="lbl_name" style="font-weight:600;"></label>
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

    <div class="container" style="background-color:white;">
      <b>Assets Information</b>
    <table id="table_real_estate" class="personal_data_dispaly table_real_estate" style=" width:100%;">
      <thead>
        <tr>
          <th>Real Estate Info <br> <hr> </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_bank_assets" class="personal_data_dispaly table_bank_assets" style=" width:100%;">
      <thead>
        <tr>
          <th>Bank Assets Info <br> <hr> </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_vehicle" class="personal_data_dispaly table_vehicle" style=" width:100%;">
      <thead>
        <tr>
          <th>Vehicle Info <br> <hr></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_gift" class="personal_data_dispaly table_gift" style=" width:100%;">
      <thead>
        <tr>
          <th>Gift Info <br> <hr> </th>
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
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<!-- Custome Javascript file -->
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/will_custome/assets_js.js" type="text/javascript"></script>
</body>
<?php }
else{
  header('location:login');
}
?>
