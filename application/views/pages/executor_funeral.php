<?php
 if($this->session->userdata('will_id')){
 defined('BASEPATH') OR exit('No direct script access allowed');
 include('include/head.php');
?>
<style >
.tooltip-inner {
    max-width: 500px;
    padding: 3px 8px;
    color: #fff;
    text-align: center;
    background-color: #17a2b8;
    border-radius: .25rem;
}
</style>
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

<!-- status bar satrt -->
<div class="container-fluid">
<ul class="list-unstyled multi-steps m-0 pt-3 pb-3">
  <li class="personal-tab" >Personal Information</li>
	<li class="family-tab">Family Information</li>
	<li class="assets-tab">Assets</li>
	<li class="executor-tab is-active">Distribution & Executor</li>
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
          <input type="hidden" name="prev_share_percentage" id="prev_share_percentage">
          <input type="hidden" name="rem_percent" id="rem_percent">
          <input type="hidden" name="share_id" id="share_id">
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
                  <select class="required form-control form-control-sm clear_dr" name="share_relation" id="share_relation">
                    <option>Relative</option>
                    <option>Friend</option>
                    <option>Other</option>
                 </select>
                </div>
              </div>
            </div>
            <div class="form-group" id="">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Name: </label>
                <div class="col-md-9">
        					<input type="text" name="share_name" id="share_name" class="text required title-case form-control form-control-sm clear" placeholder="Firstname Middlename Lastname" >
                </div>
              </div>
            </div>
            <div class="form-group" id="">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Address: </label>
                <div class="col-md-9">
                  <input type="text" name="share_address" id="share_address" class="address required form-control form-control-sm clear" placeholder="Enter Address" >
                </div>
              </div>
            </div>
            <div class="form-group" id="age_div">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Age: </label>
                <div class="col-md-6">
        					<input type="number" name="share_age" id="share_age" class="age only_number required form-control form-control-sm clear"  placeholder="Enter age in year" >
                </div>
              </div>
            </div>
            <div class="form-group" id="">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Percentage of Share: </label>

                <div class="col-md-6">

        					<input type="number" data-toggle="tooltip" title="A Mohammadean according to Islamic Law cannot by will dispose of
more than one-third of the surplus of his estate after payment of funeral
expenses and debts. It means a third of the estate of the testator as is left after
the payment of the funeral expenses, other charges and debts of the deceased
(testator). He/she can give their 100% share to any person." name="share_percentage" id="share_percentage" class="required form-control form-control-sm clear redTip" placeholder="%" >


                </div>
                <label id="rem_per" class="col-md-3 text-left"></label>
              </div>
              <p id="success_note" style="display:none; font-weight:600;" class="text-left"></p>
            </div>
            <button type="button" id="update_share" class="btn btn-info d-none float-right" >Update</button>
            <button type="button" id="add_share" class="btn btn-success float-right" >Add</button>
          </fieldset>
    		</form>
    </div>
    </div>

      <!-- Executor Information Start  -->
  	<div id="box">
      <div class="personal_info1 p-3" style=" margin-right: -18px;">
    		<form class="" id="executor_form" method="post">
          <input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
          <input type="hidden" name="executor_id" id="executor_id">
          <fieldset>
            <h3 class=" text-left">Executor: </h3>
            <div class="form-group" id="">
              <div class="row text-center">
                <label class="col-md-3 text-right" for="exampleInputEmail1">Executor Name: </label>
                <div class="col-md-3">
        					<select class="form-control form-control-sm" name="e_name_title" id="e_name_title">
        					 <option>Mr.</option>
        					 <option>Mrs.</option>
        					 <option>Ms.</option>
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
        					<input type="text" name="executor_address" id="executor_address" class="address required form-control form-control-sm clear"  aria-describedby="emailHelp" >
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
              <p id="success_note_executor" style="display:none; font-weight:600;" class="text-left"></p>
            </div>
            <button type="button" id="add_executor" class="btn btn-success float-right" >Add</button>
            <button type="button" id="update_executor" class="btn btn-info float-right d-none" >Update</button>
          </fieldset>
    		</form>
    </div>
  </div>
  <div class="alert alert-danger" role="alert" style="display:none;">
  </div>
<p>
    <button id="executor_previous" class="btn btn-info">Previous</button>
    <button style="float:right;" id="executor_next" class="btn btn-info" >Next</button>
</p>
  </div>

  <div class="col-md-6 col-sm-12">
  	<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">
    <div class="container" style="background-color:white;">
      <table id="table_share" class="personal_data_dispaly table_share" style=" width:100%;">
        <thead>
          <tr>
            <th>Distribution of 1/3 Share<br> <hr> </th>
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
            <th>Executor Info<br> <hr> </th>
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
<div id="snackbar"></div>
<input type="hidden" name="executor_count" id="executor_count">
<?php include('include/footer.php') ?>
<!-- personal info containner end -->
<!-- Custome Javascript file -->
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/will_custome/executor_funeral_js.js" type="text/javascript"></script>
<script type="text/javascript">
    
</script>
</body>

<?php }
else{
  header('location:login');
}
?>
