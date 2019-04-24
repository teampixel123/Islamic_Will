<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<!--css -->



   <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	</head>





<body>
    <form class="" action="<?php echo base_url(); ?>/Will_controller/save_executor_info" method="post">

			  <!--<input type="text" id="reletionship" placeholder="Reletionship">-->
        <input type="text" id="Executor_name" placeholder="family_person_name">
        <input type="date" id="Executor_dob" placeholder="family_person_dob">
				<input type="date" id="Executor_dob" placeholder="family_person_dob">
    	<input type="submit" class="add-row" value="Add">
    </form>
    <table>
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
</body>

<script type="text/javascript">
    $(document).ready(function(){
        $(".add-row").click(function(){
            var reletionship = $("#reletionship").val();
						var family_person_name = $("#family_person_name").val();
            var family_person_dob = $("#family_person_dob").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + reletionship + "</td><td>" + family_person_name + "</td> <td>"+ family_person_dob +"</td></tr>";
            $("table tbody").append(markup);
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
</script>




</html>
