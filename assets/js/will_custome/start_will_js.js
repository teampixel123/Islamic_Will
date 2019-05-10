$(document).ready(function(){
  $('.marital_status_div').hide();
  $('.have_child_div').hide();

  $('#name_title').change(function(){
  	var title = $('#name_title').val();
    var status = $('#marital_status').val();
    if(title == '0'){
      $('.have_child_div').hide();
      $('#child_no').prop("checked", true);
      $('.marital_status_div').hide();
    }
  	else if(title == 'Mr.'){
      if(status == 'Unmarried'){
        $('.have_child_div').hide();
        $('#child_no').prop("checked", true);
      }
      else{
    		$('.have_child_div').show();
      }
  		$('.marital_status_div').show();
      $('#Unmarried').show();
  		$('#Widove').hide();
      $('#gender_male').prop("checked", true);
  	}
  	else if (title == 'Mrs.') {
  		$('.marital_status_div').show();
  		$('#widove').show();
      $('#Unmarried').hide();
  		$('.have_child_div').show();
      $('#gender_female').prop("checked", true);
  	}
    else if (title == 'Miss.') {
      $('#child_no').prop("checked", true);
      $('#gender_female').prop("checked", true);
      $('#marital_status').val('Unmarried')
      $('.marital_status_div').hide();
      $('.have_child_div').hide();
  	}
  });

	$('#marital_status').change(function(){
		var status = $('#marital_status').val();
		if(status == 'Unmarried'){
			$('.have_child_div').hide();
      $('#child_no').prop("checked", true);
		}
    else{
			$('.have_child_div').show();
		}
    if(status == 'Widove'){
      $('#gender_female').prop("checked", true);
      $('.have_child_div').show();
		}
	});

  $("#name_title").blur(function(){
    var name_title = $('#name_title').val();
    if(name_title == '0'){
      $('#error_name_title').show();
    }
    else{
      $('#error_name_title').hide();
      }
  });

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

 //	Save Will Start Info
 $('#save_start_data').click(function(){
   var name_title = $('#name_title').val();
   var full_name = $('#full_name').val();
   var marital_status = $('#marital_status').val();
   var is_have_child = $('#is_have_child').val();
   var mobile_no = $('#mobile_no').val();
   var email = $('#email').val();
   var full_name_format =  /^[a-zA-Z ]*$/;
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
   if(!mobile_format.test(mobile_no) || mobile_no == '') {
       $('#error_mobile_no').show();
   }
   if(!email_format.test(email) || email == '') {
   $('#error_email').show();
   }

   if(name_title == '0' || full_name == '' || (name_title!= 'Miss' && marital_status == '0') || is_have_child == '-1' || !mobile_format.test(mobile_no) || mobile_no == '' ||
 !email_format.test(email) || email == ''){
   // Blank...
   }
   else {
     $('.invalide').hide();
     var form_data = $('#start_will_form').serialize();
     $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/save_start_info",
       success: function (data){
          var info = JSON.parse(data);
          if(info == 'Mobile_Exist'){
            $('#error_mobile_exist').show();
            invalide_mob_mail//alert('Mobile_Exist');
          }
          else if(info == 'Email_Exist'){
            $('#error_email_exist').show();
            //alert('Email_Exist');
          }
          else{
           $('#invalide_mob_mail').hide();
           $('#lbl_name').text(info[0]['full_name']);
           $('#lbl_mobile').text(info[0]['mobile_no']);
           $('#lbl_email').text(info[0]['email']);
           $('#lbl_address').text(info[0]['address']+', '+info[0]['city']+'-'+info[0]['pin_code']+', '+info[0]['state']+', '+info[0]['country']);
           $('#lbl_occupation').text(info[0]['occupation']);
           $('#lbl_aadhar').text(info[0]['aadhar_no']);
           $('#lbl_pan').text(info[0]['pan_no']);
           $('#save_personal_data').hide();
           $('#update_personal_data').show();
           window.location.href = base_url+"Will_controller/personal_info_view";
          }
       }
     });
   }
 });

 //	Update Will Start Info
 $('#update_start_data').click(function(){
   var name_title = $('#name_title').val();
   var full_name = $('#full_name').val();
   var marital_status = $('#marital_status').val();
   var is_have_child = $('#is_have_child').val();
   var mobile_no = $('#mobile_no').val();
   var email = $('#email').val();
   var full_name_format =  /^[a-zA-Z ]*$/;
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
   if(!mobile_format.test(mobile_no) || mobile_no == '') {
       $('#error_mobile_no').show();
   }
   if(!email_format.test(email) || email == '') {
   $('#error_email').show();
   }

   if(name_title == '0' || full_name == '' || (name_title!= 'Miss' && marital_status == '0') || is_have_child == '-1' || !mobile_format.test(mobile_no) || mobile_no == '' ||
 !email_format.test(email) || email == ''){
   // Blank...
   }
   else {
     $('.invalide').hide();
     var form_data = $('#start_will_form').serialize();
     $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/update_start_data",
       success: function (data){
           window.location.href = base_url+"Will_controller/personal_info_view";
       }
     });
   }
 });
 // Save Will Start Info End...
});
