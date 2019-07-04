$(document).ready(function(){
  $('#next_page').click(function(){
    window.location.href = base_url+"Will_controller/family_info_view";
  });
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
    // Validation on Button Click
    $('.required').each(function(){
      var val = $(this).val();
      if(val == ''){
        $(this).addClass('required-input');
      }
    });

    if(age < 18 || age > 100 || address == '' || !city_format.test(city) || city == '' || !state_format.test(state) ||
  state == '' || !country_format.test(country) || country == '' || !occupation_format.test(occupation) || occupation == '' || !pin_code_format.test(pin_code) ||
  pin_code == '' || aadhar_no == '' || !aadhar_no_format.test(aadhar_no)){
    // Blank...
    }
		else {
       $('#save_load_modal').modal('show');
      var form_data = $('#personal_info_form').serialize();
     $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/update_personal_info",
       success: function (data){
         $('#save_load_modal').on('shown.bs.modal', function(e) {
           $("#save_load_modal").modal("hide");
         });
         window.location.href = base_url+"Will_controller/family_info_view";
       }
      });
  	}
	});
});
