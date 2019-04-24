$(document).ready(function(){
  
  $('#name_title').change(function(){
  	var title = $('#name_title').val();
  	if(title == 'Mr.'){
  		$('#marital_status_div').show();
  		$('#widove').hide();
  		$('#have_child_div').show();
      $('#gender_male').prop("checked", true);
  	}
  	else if (title == 'Mrs.') {
  		$('#marital_status_div').show();
  		$('#widove').show();
  		$('#have_child_div').show();
      $('#gender_female').prop("checked", true);
  	}
    else if (title == 'Miss.') {
      $('#child_no').prop("checked", true);
      $('#gender_female').prop("checked", true);
      $('#marital_status_div').hide();
      $('#have_child_div').hide();
  	}
  });

	$('#marital_status').change(function(){
		$status = $('#marital_status').val();
		if($status == 'Unmarried'){
      $('#child_no').prop("checked", true);
			$('#have_child_div').hide();
		}
    if($status == 'Widove'){
      $('#gender_female').prop("checked", true);
		}
    else{
			$('#have_child_div').show();
		}
	});

  // Validation on Blur satrt... asif...
  $("#full_name").blur(function(){
    var full_name = $('#full_name').val();
    var full_name_format =  /^[a-zA-Z ]*$/;
    if(!full_name_format.test(full_name) || full_name == ''){
      $('#error_name').show();
    }
    else{
        $('#error_name').hide();
      }
  });

  $("#marital_status").blur(function(){
    var marital_status = $('#marital_status').val();
    if(marital_status == '0'){
      $('#error_marital_status').show();
    }
    else{
      $('#error_marital_status').hide();
      }
  });

  $("#is_have_child").blur(function(){
    var is_have_child = $('#is_have_child').val();
    if(is_have_child == '-1'){
      $('#error_is_have_child').show();
    }
    else{
      $('#error_is_have_child').hide();
      }
  });

  $("#gender").blur(function(){
    var gender = $('#gender').val();
    if(gender == '0'){
      $('#error_gender').show();
    }
    else{
      $('#error_gender').hide();
      }
  });

  $("#age").blur(function(){
    var age = $('#age').val();
    var age_format = /^[0-9]*$/;
    if(!age_format.test(age) || age == '' || age == 0)
    {
      $('#error_age').show();
    }
    else{
      $('#error_age').hide();
      }
  });

  $("#mobile_no").blur(function(){
    var mobile_no = $('#mobile_no').val();
   var mobile_format = /^[7-9][0-9]{9}$/;
    if(!mobile_format.test(mobile_no) || mobile_no == '') {
    $('#error_mobile_no').show();
   }
    else{
      $('#error_mobile_no').hide();
      }
  });

 $("#email").blur(function(){
   var email = $('#email').val();
  var email_format = /^[a-z0-9._%+-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;
   if(!email_format.test(email) || email == '') {
    $('#error_email').show();
   }
   else{
     $('#error_email').hide();
     }
 });

$("#address").blur(function(){
  var address = $('#address').val();
  if(address == ''){
    $('#error_address').show();
  }
  else{
    $('#error_address').hide();
    }
});

$("#city").blur(function(){
  var city = $('#city').val();
  var city_format =  /^[a-zA-Z ]*$/;
  if(!city_format.test(city) || city == ''){
    $('#error_city').show();
  }
  else{
    $('#error_city').hide();
    }
});

$("#state").blur(function(){
  var state = $('#state').val();
  var state_format =  /^[a-zA-Z ]*$/;
  if(!state_format.test(state) || state == ''){
   $('#error_state').show();
 }
  else{
    $('#error_state').hide();
    }
});

$("#country").blur(function(){
  var country = $('#country').val();
  var country_format =  /^[a-zA-Z ]*$/;
  if(!country_format.test(country) || country == ''){
   $('#error_country').show();
 }
  else{
    $('#error_country').hide();
    }
});

$("#occupation").blur(function(){
  var occupation = $('#occupation').val();
  var occupation_format =  /^[a-zA-Z ]*$/;
  if(!occupation_format.test(occupation) || occupation == ''){
   $('#error_occupation').show();
 }
  else{
    $('#error_occupation').hide();
    }
});

$("#pin_code").blur(function(){
  var pin_code = $('#pin_code').val();
  var pin_code_format = /^[0-9]{6}$/;

  if(!pin_code_format.test(pin_code) || pin_code == '') {
  $('#error_pin_code').show();
 }
  else{
    $('#error_pin_code').hide();
    }
});

$("#aadhar_no").blur(function(){
  var aadhar_no = $('#aadhar_no').val();
  var aadhar_no_format = /^[0-9]{12}$/;

  if(!aadhar_no_format.test(aadhar_no) || aadhar_no == '') {
     $('#error_aadhar_no').show();
       }
  else {
    $('#error_aadhar_no').hide();
    }
});
// Validation on Blur end asif

  //	save_personal_data
  $('#save_personal_data').click(function(){
  	var full_name = $('#full_name').val();
  	var marital_status = $('#marital_status').val();
  	var is_have_child = $('#is_have_child').val();
  	var gender = $('#gender').val();
  	var age = $('#age').val();
  	var mobile_no = $('#mobile_no').val();
  	var email = $('#email').val();
  	var address = $('#address').val();
  	var city = $('#city').val();
  	var state = $('#state').val();
  	var country = $('#country').val();
  	var occupation = $('#occupation').val();
  	var pin_code = $('#pin_code').val();
  	var aadhar_no = $('#aadhar_no').val();
  	var full_name_format =  /^[a-zA-Z ]*$/;
  	var address_format =  /^[a-zA-Z ]*$/;
  	var city_format =  /^[a-zA-Z ]*$/;
  	var state_format =  /^[a-zA-Z ]*$/;
  	var country_format =  /^[a-zA-Z ]*$/;
  	var occupation_format =  /^[a-zA-Z ]*$/;
  	var pin_code_format = /^[0-9]{6}$/;
  	var aadhar_no_format = /^[0-9]{12}$/;
  	var mobile_format = /^[7-9][0-9]{9}$/;
  	var email_format = /^[a-z0-9._%+-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;

		if(full_name == ''){
			$('#error_name').show();
		}
		if(marital_status == '0'){
			$('#error_marital_status').show();
		}
		if(is_have_child == '-1'){
			$('#error_is_have_child').show();
		}
		if(gender == '0'){
			$('#error_gender').show();
		}
		if(age == '')
		{
			$('#error_age').show();
		}
		if(!mobile_format.test(mobile_no) || mobile_no == '') {
		    $('#error_mobile_no').show();
	  }
	  if(!email_format.test(email) || email == '') {
		$('#error_email').show();
	  }
	  if(!address_format.test(address) || address == ''){
			$('#error_address').show();
		}
	  if(!city_format.test(city) || city == ''){
		  $('#error_city').show();
	  }
	  if(!state_format.test(state) || state == ''){
      $('#error_state').show();
    }
    if(!country_format.test(country) || country == ''){
	    $('#error_country').show();
    }
    if(!occupation_format.test(occupation) || occupation == ''){
	    $('#error_occupation').show();
    }
		if(!pin_code_format.test(pin_code) || pin_code == '') {
			$('#error_pin_code').show();
		}
		if(!aadhar_no_format.test(aadhar_no) || aadhar_no == '') {
			$('#error_aadhar_no').show();
		}
		else {
			$('.invalide').hide();
			// alert('ok');
	    var form_data = $('#personal_info_form').serialize();
			$.ajax({
				data: form_data,
				type: "post",
				url: base_url+"Will_controller/save_personal_info",
				success: function (data){
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
					window.location.href = base_url+"Will_controller/family_info_view";
				}
			});
  	}
	});
  // Save Personal Info End...

  // Update Personal Info Start...
	$('#update_personal_data').click(function(){
	  var full_name = $('#full_name').val();
		var marital_status = $('#marital_status').val();
		var is_have_child = $('#is_have_child').val();
		var gender = $('#gender').val();
		var age = $('#age').val();
	  var mobile_no = $('#mobile_no').val();
		var email = $('#email').val();
		var address = $('#address').val();
		var city = $('#city').val();
		var state = $('#state').val();
		var country = $('#country').val();
		var occupation = $('#occupation').val();
		var pin_code = $('#pin_code').val();
		var aadhar_no = $('#aadhar_no').val();
		var full_name_format =  /^[a-zA-Z ]*$/;
		var address_format =  /^[a-zA-Z ]*$/;
		var city_format =  /^[a-zA-Z ]*$/;
		var state_format =  /^[a-zA-Z ]*$/;
		var country_format =  /^[a-zA-Z ]*$/;
		var occupation_format =  /^[a-zA-Z ]*$/;
		var pin_code_format = /^[0-9]{6}$/;
		var aadhar_no_format = /^[0-9]{12}$/;
		var mobile_format = /^[7-9][0-9]{9}$/;
		var email_format = /^[a-z0-9._%+-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;

    if(full_name == ''){
			$('#error_name').show();
		}
		if(marital_status == '0'){
			$('#error_marital_status').show();
		}
		if(is_have_child == '-1'){
			$('#error_is_have_child').show();
		}
		if(gender == '0'){
			$('#error_gender').show();
		}
		if(age == '')
		{
			$('#error_age').show();
		}
		if(!mobile_format.test(mobile_no) || mobile_no == '') {
		    $('#error_mobile_no').show();
	  }
	  if(!email_format.test(email) || email == '') {
		$('#error_email').show();
	  }
	  if(!address_format.test(address) || address == ''){
			$('#error_address').show();
		}
	  if(!city_format.test(city) || city == ''){
		  $('#error_city').show();
	  }
	  if(!state_format.test(state) || state == ''){
      $('#error_state').show();
    }
    if(!country_format.test(country) || country == ''){
	    $('#error_country').show();
    }
    if(!occupation_format.test(occupation) || occupation == ''){
	    $('#error_occupation').show();
    }
		if(!pin_code_format.test(pin_code) || pin_code == '') {
			$('#error_pin_code').show();
		}
		if(!aadhar_no_format.test(aadhar_no) || aadhar_no == '') {
			$('#error_aadhar_no').show();
		}
		else{
		 $('.invalide').hide();
		 var form_data = $('#personal_info_form').serialize();
		$.ajax({
			data: form_data,
			type: "post",
			url: base_url+"Will_controller/update_personal_info",
			success: function (data){
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
				window.location.href = base_url+"Will_controller/family_info_view";
		  }
	   });
	 }			// Validation end asif
	});
  // Update Personal Data End...
});
