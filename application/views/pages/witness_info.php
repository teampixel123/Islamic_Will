<?php
 if($this->session->userdata('will_id')){
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<title>Witness Info</title>

 <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.structure.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.theme.min.css');?>" rel="stylesheet">
 <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
</head>
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
          </div>
        </div>
      </div>

  		<div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Witness Address</label>
  				<div class="col-md-9">
  					<input type="text" name="witness_address" id="witness_address" class="form-control clear"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>
      </fieldset>
  		</form>
      <p>  <button type="button" id="add_witness" class="btn btn-success" >Add</button></p>
      <p>  <a href="<?php echo base_url() ?>/Will_controller/assets_info_view" type="button" id="personal_previous" class="btn btn-info">Previous</a>
  		<button type="button" id="destroy" class="btn btn-danger">Clear session</button>
  		<a href="<?php echo base_url() ?>/Will_controller/executor_funeral_view" type="button" id="personal_next" class="btn btn-info" >Next</a></p>
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

<script>
$(document).ready(function(){
  var will_id = $('#will_id').val();
  // Fill up personal data on page load...
  $.ajax({
    data: { 'will_id' : will_id  },
    type: "post",
    url: "<?php echo base_url(); ?>/Will_controller/get_personal_info",
    success: function (data){
      var info = JSON.parse(data);
      $('#lbl_name').text(info[0]['full_name']);
      $('#lbl_mobile').text(info[0]['mobile_no']);
      $('#lbl_email').text(info[0]['email']);
      $('#lbl_address').text(info[0]['address']+', '+info[0]['city']+'-'+info[0]['pin_code']+', '+info[0]['state']+', '+info[0]['country']);
      $('#lbl_occupation').text(info[0]['occupation']);
      $('#lbl_aadhar').text(info[0]['aadhar_no']);
      $('#lbl_pan').text(info[0]['pan_no']);
    }
  });


    // get and fill up family member list...
    $('.table_family_member').dataTable({
  			'bDestroy': true
  	}).fnDestroy(); // destroy table.

    $('.table_family_member').DataTable({
  		"processing": true,
  		"serverSide": true,
      "bFilter" : false,
      "bLengthChange": false,
      "bPaginate": false,
      "bInfo": false,
  		"ajax":{
  			"url": "<?php echo base_url(); ?>Table_controller/family_member_list",
  			"dataType": "json",
  			"type": "POST",
  			"data":{ 'will_id' : will_id  }
  		},
  	});

    // get and fill up executor...
    $('.table_executor').dataTable({
  			'bDestroy': true
  	}).fnDestroy(); // destroy table.

    $('.table_executor').DataTable({
  		"processing": true,
  		"serverSide": true,
      "bFilter" : false,
      "bLengthChange": false,
      "bPaginate": false,
      "bInfo": false,
  		"ajax":{
  			"url": "<?php echo base_url(); ?>Table_controller/executor_list",
  			"dataType": "json",
  			"type": "POST",
  			"data":{ 'will_id' : will_id  }
  		},
  	});

    // get and fill up Funeral...
    $('.table_funeral').dataTable({
  			'bDestroy': true
  	}).fnDestroy(); // destroy table.

    $('.table_funeral').DataTable({
  		"processing": true,
  		"serverSide": true,
      "bFilter" : false,
      "bLengthChange": false,
      "bPaginate": false,
      "bInfo": false,
  		"ajax":{
  			"url": "<?php echo base_url(); ?>Table_controller/funeral_list",
  			"dataType": "json",
  			"type": "POST",
  			"data":{ 'will_id' : will_id  }
  		},
  	});

    // get and fill up Funeral...
    $('.table_real_estate').dataTable({
        'bDestroy': true
    }).fnDestroy(); // destroy table.

    $('.table_real_estate').DataTable({
      "processing": true,
      "serverSide": true,
      "bFilter" : false,
      "bLengthChange": false,
      "bPaginate": false,
      "bInfo": false,
      "ajax":{
        "url": "<?php echo base_url(); ?>Table_controller/real_estate_list",
        "dataType": "json",
        "type": "POST",
        "data":{ 'will_id' : will_id  }
      },
    });

    // get and fill up Funeral...
    $('.table_bank_assets').dataTable({
  			'bDestroy': true
  	}).fnDestroy(); // destroy table.

    $('.table_bank_assets').DataTable({
  		"processing": true,
  		"serverSide": true,
      "bFilter" : false,
      "bLengthChange": false,
      "bPaginate": false,
      "bInfo": false,
  		"ajax":{
  			"url": "<?php echo base_url(); ?>Table_controller/bank_assets_list",
  			"dataType": "json",
  			"type": "POST",
  			"data":{ 'will_id' : will_id  }
  		},
  	});

    // get and fill up Vehicle...
    $('.table_vehicle').dataTable({
  			'bDestroy': true
  	}).fnDestroy(); // destroy table.

    $('.table_vehicle').DataTable({
  		"processing": true,
  		"serverSide": true,
      "bFilter" : false,
      "bLengthChange": false,
      "bPaginate": false,
      "bInfo": false,
  		"ajax":{
  			"url": "<?php echo base_url(); ?>Table_controller/vehicle_list",
  			"dataType": "json",
  			"type": "POST",
  			"data":{ 'will_id' : will_id  }
  		},
	  });
    // get and fill up Gift Info...
    $('.table_gift').dataTable({
  			'bDestroy': true
  	}).fnDestroy(); // destroy table.

    $('.table_gift').DataTable({
  		"processing": true,
  		"serverSide": true,
      "bFilter" : false,
      "bLengthChange": false,
      "bPaginate": false,
      "bInfo": false,
  		"ajax":{
  			"url": "<?php echo base_url(); ?>Table_controller/gift_list",
  			"dataType": "json",
  			"type": "POST",
  			"data":{ 'will_id' : will_id  }
  		},
  	});
    // get and fill up Witness Info...
    $('.table_witness').dataTable({
  			'bDestroy': true
  	}).fnDestroy(); // destroy table.

    $('.table_witness').DataTable({
  		"processing": true,
  		"serverSide": true,
      "bFilter" : false,
      "bLengthChange": false,
      "bPaginate": false,
      "bInfo": false,
  		"ajax":{
  			"url": "<?php echo base_url(); ?>Table_controller/witness_list",
  			"dataType": "json",
  			"type": "POST",
  			"data":{ 'will_id' : will_id  }
  		},
  	});
  // datepicker.. set condition depend on age... calculate age.. show/hide Guardian...
  $('#family_person_dob').datepicker({
    dateFormat: 'dd/mm/yy',//check change
    changeMonth: true,
    changeYear: true,
    onSelect: function(dateText, inst) {
      // Get Today date...
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //January is 0!
      var yyyy = today.getFullYear();
      if (dd < 10) {
        dd = '0' + dd;
      }
      if (mm < 10) {
        mm = '0' + mm;
      }
      var today2 = dd + '/' + mm + '/' + yyyy;
      // Get Today date end...
      var birthdate2 = $(this).val();
        var today = moment(today2,'DD/MM/YYYY');
        var birthdate = moment(birthdate2,'DD/MM/YYYY');

        var years = today.diff(birthdate, 'year');
        birthdate.add(years, 'years');
        var months = today.diff(birthdate, 'months');
        birthdate.add(months, 'months');
        //alert(years+' '+months);
        var title = $('#relationship').val();
        $('#age_div').show();
        $('#family_person_age').val(years+' Year '+months+' Month');
        if((title == 'Son' || title == 'Daughter') && years < 18){
          $('#guardian_div').show();
          $('#is_minar').val('1');

        }
        else{
          $('#guardian_name').val('');
          $('#guardian_address').val('');
          $('#guardian_div').hide();
        }
    }
  });

	//	Save/Add Family Member
	$('#add_witness').click(function(){
		var form_data = $('#witness_form').serialize();
  	$.ajax({
  		data: form_data,
  		type: "post",
  		url: "<?php echo base_url(); ?>/Will_controller/save_witness_info",
  		success: function (data){
        $('.clear').val('');
        $('.clear_dr').val(0);
        $('#guardian_div').hide();



        var will_id = $('#will_id').val();
        $('.table_family_member').dataTable({
      			'bDestroy': true
      	}).fnDestroy(); // destroy table.

        $('.table_family_member').DataTable({
  				"processing": true,
  				"serverSide": true,
          "bFilter" : false,
          "bLengthChange": false,
          "bPaginate": false,
          "bInfo": false,
  				"ajax":{
  					 "url": "<?php echo base_url(); ?>Table_controller/family_member_list",
  					 "dataType": "json",
  					 "type": "POST",
  					 "data":{ 'will_id' : will_id  }
  				},
      	});

			}
		});
	});

	//Update Personal data...
	$('#destroy').click(function(){
		$.ajax({
			type: "post",
			url: "<?php echo base_url(); ?>/Will_controller/destroy_session",
			success: function (data){
				location.reload();
			}
		});
	});
});
</script>
</body>
<?php } ?>
