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

<!-- family info containner start -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
	<div class="jumbotron ">
	<!--action="<?php echo base_url(); ?>/Will_controller/save_personal_info"-->
<h1 class=" text-center">Witness Information</h1>
  <div class="row">
    <div class="col-md-6">
  	<div id="box">
  		<form class="" id="witness_form" method="post">

      <fieldset>
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
      <p>  <button type="button" id="add_witness" class="btn btn-success" >Add</button></p>
      <p>  <a href="<?php echo base_url() ?>/Will_controller/assets_info_view" type="button" id="personal_previous" class="btn btn-info">Previous</a>
  		<button type="button" id="destroy" class="btn btn-danger">Clear session</button>
      <?php if($this->session->userdata('user_is_login')){
        ?>
        <form target="_blank" id="final_pdf" class="" action="<?php echo base_url() ?>/Pdf_controller/final_pdf" method="post">
          <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('will_id'); ?>">
        </form>
        <button href="" type="submit" id="btn_final_pdf" class="btn btn-info" >Create PDF</button></p>
        <?php
      } else{ ?>
        <form id="pdf" class="" action="<?php echo base_url() ?>/Pdf_controller/pdf" method="post">
          <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('will_id'); ?>">
        <button href="" type="submit" id="personal_next" class="btn btn-info" >Create PDF</button></p>
        </form>
    <?php } ?>
  </div>
  </div>

  <div class="col-md-6">
  	<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">

    <div class="container" style="background-color:white;">
    	<div class="" style="">
        <table id="table_personal_info" class="table table-bordered table_personal_info">
          <thead>
            <tr>
              <th>Personal Info</th>
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
    </div>

    </br>
    <div class="container" style="background-color:white;">
    <table id="table_family_member" class="table table-bordered table_family_member">
      <thead>
        <tr>
          <th>Family Member Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>

    </br>
    <div class="container" style="background-color:white;">
    <table id="table_executor" class="table table-bordered table_executor">
      <thead>
        <tr>
          <th>Executor Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>


    <div class="container" style="background-color:white;">
    <table id="table_funeral" class="table table-bordered table_funeral">
      <thead>
        <tr>
          <th>Funeral Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>
</br>
    <div class="container" style="background-color:white;">
      <b>Assets Information</b>
    <table id="table_real_estate" class="table table-bordered table_real_estate">
      <thead>
        <tr>
          <th>Real Estate Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_bank_assets" class="table table-bordered table_bank_assets">
      <thead>
        <tr>
          <th>Bank Assets Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_vehicle" class="table table-bordered table_vehicle">
      <thead>
        <tr>
          <th>Vehicle Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <table id="table_gift" class="table table-bordered table_gift">
      <thead>
        <tr>
          <th>Gift Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>
    </br>
    <div class="container" style="background-color:white;">
    <table id="table_witness" class="table table-bordered table_witness">
      <thead>
        <tr>
          <th>Witness Info</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>
  </div>
  </div>
</div>
</div>
<!-- personal info containner end -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<!-- Custome Javascript file -->
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/islamic_will_custome.js" type="text/javascript"></script>

<script>
// validation start asif//
$("#witness_name").blur(function(){
  var witness_name = $('#witness_name').val();
  if(witness_name == ''){
    $('#error_witness_name').show();
  }
  else{
      $('#error_witness_name').hide();
    }
});

$("#witness_address").blur(function(){
  var witness_address = $('#witness_address').val();
  if(witness_address == ''){
    $('#error_witness_address').show();
  }
  else{
      $('#error_witness_address').hide();
    }
});

// $('#my-div').click(function() {
//    window.open('http://google.com');
// });

$('#btn_final_pdf').click(function(){
  //alert();
  //window.location.href = "<?php echo base_url() ?>Will_controller/login";
  $('#btn_login').show();
  $('#final_pdf').submit();
  //$('#go_login').submit();
});
// validation end asif//
</script>

</body>
<?php } ?>
