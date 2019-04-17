<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<!--css -->
	 <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
	 <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">

	 <!-- js -->
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
   <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	</head>
<body>
<!-- navigation bar strat -->
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
<!-- navigation bar end  -->
<div class="container">
	<div class="jumbotron ">
	<h5 class="display-3 text-center">Family info</h5>

	<!-- strat family_info -->
	<div class="row ">
	<div class="col-md-6">

    <form action="<?php echo base_url(); ?>Will_controller/save_family_info" method="post">
			<select id="relationship" name="relationship">
<option value="relationship" >Reletionship</option>
<option value="Father" >Father</option>
<option value="Mother" >Mother</option>
<option value="Brothers" >Brothers</option>
<option value="Sisters" >Sisters</option>
</select>
			  <!--<input type="text" id="reletionship" placeholder="Reletionship">-->
				<label for="">Full Name : </label>
        <input type="text" id="family_person_name" name="family_person_name" placeholder="family_person_name"><br>
				<label for="">Date of Brith : </label>
        <input type="date" id="family_person_dob" name="family_person_dob" placeholder="family_person_dob"><br><br>
    	<input type="button" class="add-row" value="disply data">
			<input type="submit" class="add-row" value="Add">
    </form>
	</div>
	<div class="col-md-6">
    <table id="family_info">
        <thead>
            <tr>
                <th>Select</th>
                <th>Reletionship</th>
                <th>Full Name</th>
								<th>Date of Birth</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" name="record"></td>
                <td>Father</td>
                <td>Sham ramesh shinde</td>
								<td>02/03/2014</td>
            </tr>
        </tbody>
    </table>
    <button type="button" class="delete-row">Delete Row</button>
</div>
</div>
<!--End family_info  -->
<br><br>


<!--Strat guardian Info -->
<div class="row ">
<div class="col-md-6">

		<form action="<?php echo base_url(); ?>Will_controller/save_guardian_info" method="post">

			<br>

				<!--<input type="text" id="reletionship" placeholder="Reletionship">-->
				<label for="">Guardian Name : </label>
				<input type="text" id="guardian_name" name="guardian_name" placeholder="Enter Guardian Name"><br>
				<label for="">Guardian Address : </label>
				<input type="text" id="guardian_address" name="guardian_address" placeholder="Guardian Address"><br><br>
				<input type="button" class="add-row1" value="disply_data">
			<input type="submit" class="add-row1" value="Add">
		</form>
	</div>
		<div class="col-md-6">
		<table id="guardian">
				<thead>
						<tr>
								<th>guardian_name</th>
								<th>guardian_address</th>

						</tr>
				</thead>
				<tbody>
						<tr>
								<td><input type="checkbox" name="record"></td>
								<td>sham</td>
								<td>kolhapur</td>
						</tr>
				</tbody>
		</table>
		<button type="button" class="delete-row1">Delete Row</button>
</div>

</div>
<!-- End guardian_info -->
<div class="row float-right pb-5">

  <p class="lead ">
    <a class="btn btn-primary btn-lg pl-5 pr-5" href="#" role="button" type="submit">Next</a>
  </p>
	<br><br>
	</div>

</div>

</body>

<script type="text/javascript">
// Strat family script
    $(document).ready(function(){
        $(".add-row").click(function(){
						var relationship = $("#relationship").val();
						var family_person_name = $("#family_person_name").val();
						var family_person_dob = $("#family_person_dob").val();
						var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + relationship + "</td><td>" + family_person_name + "</td> <td>"+ family_person_dob +"</td></tr>";
						$("#family_info tbody").append(markup);

						$("#family_person_name").val('');
						$("#family_person_dob").val('');


					//	$('#save_personal_data').click(function(){
				/*	var form_data = $('#family_info_form').serialize();
					$.ajax({
							data: form_data,
							type: "post",
							url: "/Will_controller/save_family_info",
						/*	success: function (data){
									var info = JSON.parse(data);
									$('#lbl_name').text(info[0]['full_name']);
									$('#lbl_mobile').text(info[0]['mobile_no']);
									$('#lbl_email').text(info[0]['email']);
									$('#lbl_address').text(info[0]['address']+', '+info[0]['city']+'-'+info[0]['pin_code']+', '+info[0]['state']+', '+info[0]['country']);
									$('#lbl_occupation').text(info[0]['occupation']);
									$('#lbl_aadhar').text(info[0]['aadhar_no']);
									$('#lbl_pan').text(info[0]['pan_no']);

									$('#save_personal_data').hide();
									$('#update_personal_data').show();

							}*/
					});
			});



        });

        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });

// end family script

 //Strat guardian script
		$(document).ready(function(){
				$(".add-row1").click(function(){
					var guardian_name = $("#guardian_name").val();
					var guardian_address = $("#guardian_address").val();
					var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + guardian_name + "</td><td>" + guardian_address + "</td></tr>";
						$("#guardian tbody").append(markup);
						$("#guardian_name").val('');
						$("#guardian_address").val('');
				});

				// Find and remove selected table rows
				$(".delete-row1").click(function(){
						$("table tbody").find('input[name="record"]').each(function(){
							if($(this).is(":checked")){
										$(this).parents("tr").remove();
								}
						});
				});
		});
// end guardian script

</script>




</html>
