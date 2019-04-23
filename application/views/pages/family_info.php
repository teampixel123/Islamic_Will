<?php
 if($this->session->userdata('will_id')){
 defined('BASEPATH') OR exit('No direct script access allowed');
 include('include/head.php');
?>

<body>
<div class="container-fluid">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</div>

<!-- family info containner start -->
<?php $start_will_data = $this->session->userdata() ?>
<div class="container">
	<div class="jumbotron ">
	<!--action="<?php echo base_url(); ?>/Will_controller/save_personal_info"-->
<h1 class=" text-center">Family Information</h1>
  <div class="row">
    <div class="col-md-6">
  	<div id="box">
  		<form class="" id="family_member_form" method="post">

      <fieldset>
      <div class="form-group">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Relation</label>
  				<div class="col-md-6">
  					<select class="form-control clear_dr" name="relationship" id="relationship">
              <option value="0">Select Relationship</option>
  					  <option>Father</option>
  					 <option>Mother</option>
  					 <option>Spouse</option>
  					 <option>Son</option>
  					 <option>Daughter</option>
  					 <option>Brother</option>
  					 <option>Sister</option>
  				 </select>
           <p id="error_relationship" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
        </div>
      </div>

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Name</label>
  				<div class="col-md-9">
  					<input type="text" name="family_person_name" id="family_person_name" class="form-control clear"  aria-describedby="emailHelp" >
            	<p id="error_family_person_name" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
        </div>
      </div>

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Date of Birth</label>
  				<div class="col-md-9">
  					<input type="text" name="family_person_dob" id="family_person_dob" class="form-control clear"  aria-describedby="emailHelp" >
            <p id="error_family_person_dob" style="color:red; display:none" class="text-left valide">*This field is required.</p>
            <p id="invalide_family_person_dob" style="color:red; display:none" class="text-left valide">*Invalide Date For Father/Mother/Wife.</p>
          </div>
        </div>
      </div>

      <div class="form-group" id="age_div" style="display:none">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Age:</label>
  				<div class="col-md-5">
  					<input type="text" name="family_person_age" id="family_person_age" class="form-control clear"  aria-describedby="emailHelp" >
            <p id="error_family_person_age" style="color:red; display:none" class="text-left valide">*This field is required.</p>
          </div>
          <div class="col-md-4">
  					<input type="text" name="family_person_age_format" id="family_person_age_format" class="form-control clear"  aria-describedby="emailHelp" readonly >
          </div>
        </div>
      </div>

      <div id="guardian_div" style="display:none">
    		<input type="hidden" name="is_minar" id="is_minar" class="form-control clear"  aria-describedby="emailHelp" >

        <div class="form-group" id="">
          <div class="row text-center">
            <label class="col-md-3 text-right" for="exampleInputEmail1">Guardian Name</label>
            <div class="col-md-9">
              <input type="text" name="guardian_name" id="guardian_name" class="form-control clear"  aria-describedby="emailHelp" >
              <p id="error_guardian_name" style="color:red; display:none" class="text-left valide">*This field is required.</p>
            </div>
          </div>
        </div>

        <div class="form-group" id="">
          <div class="row text-center">
            <label class="col-md-3 text-right" for="exampleInputEmail1">Address</label>
            <div class="col-md-9">
              <input type="text" name="guardian_address" id="guardian_address" class="form-control clear"  aria-describedby="emailHelp" >
              <p id="error_guardian_address" style="color:red; display:none" class="text-left valide">*This field is required.</p>
            </div>
          </div>
        </div>
      </div>
      </fieldset>
  		</form>
      <p>  <button  id="add_family_member" class="btn btn-success" >Add</button></p>
      <p>  <a href="<?php echo base_url() ?>Will_controller/personal_info_view" type="button" id="personal_previous" class="btn btn-info">Previous</a>
  		<button type="button" id="destroy" class="btn btn-danger">Clear session</button>
  		<a href="<?php echo base_url() ?>Will_controller/executor_funeral_view" type="button" id="personal_next" class="btn btn-info" >Next</a></p>
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
          <div class="row" id="f_member">
          </div>
          <!-- Family Memer List -->
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
  </div>
  </div>
</div>
</div>
<!-- personal info containner end -->
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
<script src="<?php echo base_url(); ?>assets/js/will_custome/family_info_js.js" type="text/javascript"></script>

<script>



//  end  validation asif
</script>



</body>
<?php } ?>
