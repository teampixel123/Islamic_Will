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
      $('#gender_female').prop("checked", true);
  		$('.marital_status_div').hide();
      $('.have_child_div').show();
      $('#marital_status').val('Married')

  	}
    else if (title == 'Ms.') {
      $('.marital_status_div').show();
  		$('#widove').show();
      $('#Unmarried').show();
  		$('.have_child_div').show();
      $('#gender_female').prop("checked", true);
      $('#marital_status').val('0')
      // $('#child_no').prop("checked", true);
      // $('#gender_female').prop("checked", true);
      // $('#marital_status').val('Unmarried')
      // $('.marital_status_div').hide();
      // $('.have_child_div').hide();
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

 //	Save Will Start Info
 $('#save_start_data').click(function(){
   var name_title = $('#name_title').val();
   var full_name = $('#full_name').val();
   var marital_status = $('#marital_status').val();
   var is_have_child = $('#is_have_child').val();
   var mobile_no = $('#mobile_no').val();
   var email = $('#email').val();
   var text =  /^[a-zA-Z ]*$/;
   var mobile_format = /^[7-9][0-9]{9}$/;
   var email_format = /^[a-z0-9._%+-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;

   $('.required').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
     }
     // else{
     //   $(this).removeClass('required-input');
     // }
   });
   // $('.select').each(function(){
   //   var val = $(this).val();
   //   if(val == '0'){
   //     $(this).addClass('required-input');
   //   }
   //   else{
   //     $(this).removeClass('required-input');
   //   }
   // });
   // $('.text').each(function(){
   //   var text_info = $(this).val();
   //   if(!text.test(text_info)){
   //     $(this).addClass('required-input');
   //   }
   //   else{
   //     $(this).removeClass('required-input');
   //   }
   // });

   if(name_title == '0' || full_name == '' || !text.test(full_name) || is_have_child == '-1' || !mobile_format.test(mobile_no) || mobile_no == '' ||
 !email_format.test(email) || email == ''){
   // Blank...
   }
   else {
     $('.required, .select').removeClass('required-input');
     $('#save_load_modal').modal('show');
     var form_data = $('#start_will_form').serialize();
     $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/save_start_info",
       success: function (data){
           $('#save_load_modal').on('shown.bs.modal', function(e) {
             $("#save_load_modal").modal("hide");
           });
           window.location.href = base_url+"Will_controller/personal_info_view";
        //  }
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
   var text =  /^[a-zA-Z ]*$/;
   var mobile_format = /^[7-9][0-9]{9}$/;
   var email_format = /^[a-z0-9._%+-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;

   $('.required').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
     }
     // else{
     //   $(this).removeClass('required-input');
     // }
   });
   // $('.select').each(function(){
   //   var val = $(this).val();
   //   if(val == '0'){
   //     $(this).addClass('required-input');
   //   }
   //   else{
   //     $(this).removeClass('required-input');
   //   }
   // });
   // $('.text').each(function(){
   //   var text_info = $(this).val();
   //   if(!text.test(text_info)){
   //     $(this).addClass('required-input');
   //   }
   //   else{
   //     $(this).removeClass('required-input');
   //   }
   // });

   if(name_title == '0' || full_name == '' || !text.test(full_name) || is_have_child == '-1' || !mobile_format.test(mobile_no) || mobile_no == '' ||
 !email_format.test(email) || email == ''){
   // Blank...
   }
   else {
     $('#save_load_modal').modal('show');
     var form_data = $('#start_will_form').serialize();
     $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/update_start_data",
       success: function (data){
         $('#save_load_modal').on('shown.bs.modal', function(e) {
           $("#save_load_modal").modal("hide");
         });
         window.location.href = base_url+"Will_controller/personal_info_view";
       }
     });
   }
 });
 // Save Will Start Info End...
});
