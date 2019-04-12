<?php
 if($this->session->userdata('will_id')){
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Personal Info</title>

 <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.structure.min.css');?>" rel="stylesheet">
 <link href="<?php echo base_url('assets/css/datepicker_css/jquery-ui.theme.min.css');?>" rel="stylesheet">
 <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

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
					<select class="form-control" name="relationship" id="relationship">
            <option>Select Relationship</option>
					  <option>Father</option>
					 <option>Mother</option>
					 <option>Spouse</option>
					 <option>Son</option>
					 <option>Daughter</option>
					 <option>Brother</option>
					 <option>Sister</option>
				 </select>
        </div>
      </div>
    </div>

		<div class="form-group" id="">
      <div class="row text-center">
        <label class="col-md-3 text-right" for="exampleInputEmail1">Name</label>
				<div class="col-md-9">
					<input type="text" name="family_person_name" id="family_person_name" class="form-control"  aria-describedby="emailHelp" >
        </div>
      </div>
    </div>

		<div class="form-group" id="">
      <div class="row text-center">
        <label class="col-md-3 text-right" for="exampleInputEmail1">Date of Birth</label>
				<div class="col-md-9">
					<input type="text" name="family_person_dob" id="family_person_dob" class="form-control"  aria-describedby="emailHelp" >
        </div>
      </div>
    </div>

    <div class="form-group" id="age_div" style="display:none">
      <div class="row text-center">
        <label class="col-md-3 text-right" for="exampleInputEmail1">Age:</label>
				<div class="col-md-9">
					<input type="text" name="age" id="age" class="form-control"  aria-describedby="emailHelp" >
        </div>
      </div>
    </div>
    </fieldset>
		</form>

    <div id="guardian_div" style="display:none">
      <form class="" id="family_member_form" method="post">
    <fieldset>
      <div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Guardian Name</label>
          <div class="col-md-9">
            <input type="text" name="family_person_name" id="family_person_name" class="form-control"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>

      <div class="form-group" id="">
        <div class="row text-center">
          <label class="col-md-3 text-right" for="exampleInputEmail1">Address</label>
          <div class="col-md-9">
            <input type="text" name="family_person_name" id="family_person_name" class="form-control"  aria-describedby="emailHelp" >
          </div>
        </div>
      </div>
      </fieldset>
      </form>
    </div>

    <button type="button" id="add_family_member" class="btn btn-success">Add</button>
    <a href="<?php echo base_url() ?>/Will_controller/personal_info_view" type="button" id="personal_previous" class="btn btn-info">Previous</a>
		<button type="button" id="destroy" class="btn btn-danger">Clear session</button>
		<button type="button" id="personal_next" class="btn btn-info">Next</button>
</div>

</div>
<div class="col-md-6">

	<input type="hidden" name="will_id" id="will_id" value="<?php echo $start_will_data['will_id']; ?>">

  <div class="container" style="background-color:white;">
  	<div class="" style="">
			<form>
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

          <table id="table" class="hidden" style="width:100%;">
            <tr>
                <th>Relationship</th>
                <th>Name</th>
                <th>Birthdate</th>
            </tr>
        </table>


        <table id="table_family_member" class="table table-striped table-bordered table_family_member">
          <thead>
            <tr>
              <th>#</th>
              <th>Relationship</th>
              <th>Name</th>
              <th>Birthdate</th>
              <th>Age</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>








			</form>
    </div>
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

<?php
// Fill Up form data on page load if session is set...
	if ($this->session->userdata('will_id')) {
?>
<script>
	$(document).ready(function(){

		var will_id = $('#will_id').val();
		var values = {
            'will_id': document.getElementById('will_id').value,
    };

		$.ajax({
			data: values,
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

    $.ajax({
			data: values,
			type: "post",
			url: "<?php echo base_url(); ?>/Will_controller/get_family_member_list",
			success: function (data){
        $("#table td").empty();
        var info = JSON.parse(data);
        var len = info.length;
        var txt = "";
              if(len > 0){
                  for(var i=0;i<len;i++){
                      if(info[i].relationship && info[i].family_person_name){
                          txt += "<tr><td>"+info[i].relationship+"</td><td>"+info[i].family_person_name+"</td><td>"+info[i].family_person_dob+"</td></tr>";
                      }
                  }
                  if(txt != ""){
                      $("#table").append(txt)
                  }
              }
			}
		});

	});
</script>
<?php }
else{ ?>
	<script>
	$(document).ready(function(){
	});
	</script>
<?php } ?>

<script>
$(document).ready(function(){
  $('.table_family_member').DataTable({
				//"processing": true,
				//"serverSide": true,
			//	"ajax":{
					 //"url": "<?php echo base_url(); ?>Sales/SalesProductList",
					 //"dataType": "json",
					 //"type": "POST",
					 //"data":{ 'salesInvoiceNo' : salesInvoiceNo  }
				//	},
			});



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
    //  var today2 = '11/11/2012';
      //var birthdate2 = '11/09/2015'
        var today = moment(today2,'DD/MM/YYYY');
        var birthdate = moment(birthdate2,'DD/MM/YYYY');

        var years = today.diff(birthdate, 'year');
        birthdate.add(years, 'years');
        var months = today.diff(birthdate, 'months');
        birthdate.add(months, 'months');
        //alert(years+' '+months);

        var title = $('#relationship').val();


        $('#age_div').show();
        $('#age').val(years+' Year '+months+' Month');
        if((title == 'Son' || title == 'Daughter') && years < 18){
          $('#guardian_div').show();
        }
        else{
          $('#guardian_div').hide();
        }
    }
});

  $('#relationship').change(function(){
    var title = $('#relationship').val();
    if(title != 'Son' || title != 'Daughter'){
      $('#guardian_div').hide();
    }
  });
		//	Save/Add Family Member
		$('#add_family_member').click(function(){
			var form_data = $('#family_member_form').serialize();
			$.ajax({
				data: form_data,
				type: "post",
				url: "<?php echo base_url(); ?>/Will_controller/save_family_member",
				success: function (data){
          $("#table td").empty();
					var info = JSON.parse(data);
          var len = info.length;

          var txt = "";
                if(len > 0){
                    for(var i=0;i<len;i++){
                        if(info[i].relationship && info[i].family_person_name){
                            txt += "<tr><td>"+info[i].relationship+"</td><td>"+info[i].family_person_name+"</td><td>"+info[i].family_person_dob+"</td></tr>";
                        }
                    }
                    if(txt != ""){
                        //$("#table").append(txt).removeClass("hidden");
                        $("#table").append(txt)
                    }
                }
          //alert(len);
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

    // Get Today date in dd/ymm/yyyy format...
    $('#personal_next').click(function(){
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
      var today = dd + '/' + mm + '/' + yyyy;
      alert(today);
    });

	/*	$('#ok').click(function(){
		var member_name =	$('#member_name').val();
			alert(member_name);
		}); */
});
</script>
</body>
<?php } ?>
