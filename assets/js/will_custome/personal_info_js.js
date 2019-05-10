$(document).ready(function(){

  $('#next_page').click(function(){
    window.location.href = base_url+"Will_controller/family_info_view";
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
  $('#save_personal_data, #update_personal_data').click(function(){
  	var age = $('#age').val();
  	var address = $('#address').val();
  	var city = $('#city').val();
  	var state = $('#state').val();
  	var country = $('#country').val();
  	var occupation = $('#occupation').val();
  	var pin_code = $('#pin_code').val();
  	var aadhar_no = $('#aadhar_no').val();
  	var city_format =  /^[a-zA-Z ]*$/;
  	var state_format =  /^[a-zA-Z ]*$/;
  	var country_format =  /^[a-zA-Z ]*$/;
  	var occupation_format =  /^[a-zA-Z ]*$/;
  	var pin_code_format = /^[0-9]{6}$/;
  	var aadhar_no_format = /^[0-9]{12}$/;

		if(age == ''){
			$('#error_age').show();
		}
	  if(address == ''){
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

    if(age == '' || address == '' || !city_format.test(city) || city == '' || !state_format.test(state) ||
  state == '' || !country_format.test(country) || country == '' || !occupation_format.test(occupation) || occupation == '' || !pin_code_format.test(pin_code) ||
  pin_code == ''){
    // Blank...
    }
		else {
      $('.invalide').hide();
      var form_data = $('#personal_info_form').serialize();
     $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/update_personal_info",
       success: function (data){
         window.location.href = base_url+"Will_controller/family_info_view";
       }
      });
  	}
	});
});
