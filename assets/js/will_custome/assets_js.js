$(document).ready(function(){
var will_id = $('#will_id').val();
// Fill up personal data on page load...
$.ajax({
  data: { 'will_id' : will_id  },
  type: "post",
  url: base_url+"Will_controller/get_personal_info",
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

// get and fill up personal info list...
$('.table_personal_info').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

$('.table_personal_info').DataTable({
  "bFilter" : false,
  "bLengthChange": false,
  "bPaginate": false,
  "bInfo": false,
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
    "url": base_url+"Table_controller/family_member_list",
    "dataType": "json",
    "type": "POST",
    "data":{
      'will_id' : will_id,
      'page' : 'assets_info'
    }
  },
});
// End Family Member Js....

// get and fill up real_estate...
$('.table_real_estate').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

var table_real = $('.table_real_estate').DataTable({
  "processing": true,
  "serverSide": true,
  "bFilter" : false,
  "bLengthChange": false,
  "bPaginate": false,
  "bInfo": false,
  "ajax":{
    "url": base_url+"Table_controller/real_estate_list",
    "dataType": "json",
    "type": "POST",
    "data":{
      'will_id' : will_id,
      'page' : 'assets_info'
    }
  },
});

// Check Bank assets empty...
$('.table_real_estate').on( 'draw.dt', function(){
   if (! table_real.data().any() ) {
      $('.table_real_estate').hide();
    }
    else{
      $('.table_real_estate').show();
    }
});
 //alert(a);
// get and fill up bank_assets...
$('.table_bank_assets').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

var table_bank_assets = $('.table_bank_assets').DataTable({
  "processing": true,
  "serverSide": true,
  "bFilter" : false,
  "bLengthChange": false,
  "bPaginate": false,
  "bInfo": false,
  "ajax":{
    "url": base_url+"Table_controller/bank_assets_list",
    "dataType": "json",
    "type": "POST",
    "data":{
      'will_id' : will_id,
      'page' : 'assets_info'
    }
  },
});
// Check Bank assets empty...
$('.table_bank_assets').on( 'draw.dt', function(){
   if (! table_bank_assets.data().any() ) {
      $('.table_bank_assets').hide();
    }
    else{
      $('.table_bank_assets').show();
    }
});
//alert(a);
// get and fill up Vehicle...
$('.table_vehicle').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

var table_vehicle = $('.table_vehicle').DataTable({
  "processing": true,
  "serverSide": true,
  "bFilter" : false,
  "bLengthChange": false,
  "bPaginate": false,
  "bInfo": false,
  "ajax":{
    "url": base_url+"Table_controller/vehicle_list",
    "dataType": "json",
    "type": "POST",
    "data":{
      'will_id' : will_id,
      'page' : 'assets_info'
    }
  },
});
// Check Vehicle assets empty...
$('.table_vehicle').on( 'draw.dt', function(){
   if (! table_vehicle.data().any() ) {
      $('.table_vehicle').hide();
    }
    else{
      $('.table_vehicle').show();
    }
});
// get and fill up Gift Info...
$('.table_gift').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

var table_gift = $('.table_gift').DataTable({
  "processing": true,
  "serverSide": true,
  "bFilter" : false,
  "bLengthChange": false,
  "bPaginate": false,
  "bInfo": false,
  "ajax":{
    "url": base_url+"Table_controller/gift_list",
    "dataType": "json",
    "type": "POST",
    "data":{
      'will_id' : will_id,
      'page' : 'assets_info'
    }
  },
});
$('.table_gift').on( 'draw.dt', function(){
   if (!table_gift.data().any()) {
      $('.table_gift').hide();
    }
    else{
      $('.table_gift').show();
    }
});

$('.table_gift, .table_vehicle, .table_bank_assets, .table_real_estate').on( 'draw.dt', function(){
   if (!table_gift.data().any() && !table_vehicle.data().any() && !table_bank_assets.data().any() && !table_real.data().any()) {
      $('#error_add_assets').show();
      $('#assets_next').prop('disabled', true);
    }
    else{
      $('#error_add_assets').hide();
      $('#assets_next').prop('disabled', false);
    }
});

// get and fill up Witness Info...
// $('.table_witness').dataTable({
//     'bDestroy': true
// }).fnDestroy(); // destroy table.
//
// $('.table_witness').DataTable({
//   "processing": true,
//   "serverSide": true,
//   "bFilter" : false,
//   "bLengthChange": false,
//   "bPaginate": false,
//   "bInfo": false,
//   "ajax":{
//     "url": base_url+"Table_controller/witness_list",
//     "dataType": "json",
//     "type": "POST",
//     "data":{ 'will_id' : will_id  }
//   },
// });

// Bank Assets Fields change by selection of Bank assets Type...
  $('#assets_type').change(function(){
    var assets_type = $(this).val();
    $('#fd_recipt_No_div').hide();
    $('#key_number_div').hide();

    if(assets_type == 'Savings A/c'){
      $('.hide_num').hide();
      $('#account_no').show();

      $('.hide_name').hide();
      $('#bank_nm').show();
      $('#key_number').val('');
      $('#fd_recipt_No').val('');
      $('#b_state_div').show();
      $('#b_pin_code_div').show();
      $('#b_sum_amount_div').hide();
    }
    else if (assets_type == 'Current A/C') {
      $('.hide_num').hide();
      $('#account_no').show();
      $('.hide_name').hide();
      $('#bank_nm').show();
      $('#key_number').val('');
      $('#fd_recipt_No').val('');
      $('#b_state_div').show();
      $('#b_pin_code_div').show();
      $('#b_sum_amount_div').hide();
    }
    else if (assets_type == 'Fixed Deposits') {
      $('.hide_num').hide();
      $('#customer_id').show();
      $('.hide_name').hide();
      $('#bank_nm').show();
      $('#fd_recipt_No_div').show();
      $('#key_number').val('');
      $('#b_state_div').show();
      $('#b_pin_code_div').show();
      $('#b_sum_amount_div').hide();
    }
    else if (assets_type == 'PPF') {
      $('.hide_num').hide();
      $('#account_no').show();
      // $('#customer_id').show();
      $('.hide_name').hide();
    //  $('#company_name').show();
      $('#bank_nm').show();
      $('#key_number').val('');
      $('#fd_recipt_No').val('');
      $('#b_state_div').show();
      $('#b_pin_code_div').show();
      $('#b_sum_amount_div').hide();
    }
    else if (assets_type == 'Bank Locker') {
      $('.hide_num').hide();
      // $('#folio_no').show();
      $('#locker_no').show();
      $('.hide_name').hide();
      $('#bank_nm').show();
      $('#key_number_div').show();
      $('#b_state_div').show();
      $('#b_pin_code_div').show();
      $('#fd_recipt_No').val('');
      $('#b_sum_amount_div').hide();
    }
    else if (assets_type == 'Mutual Funds') {
      $('.hide_num').hide();
      //$('#customer_id').show();
      $('#folio_no').show();
      $('.hide_name').hide();
      $('#company_name').show();
      $('#key_number').val('');
      $('#fd_recipt_No').val('');
      $('#b_state_div').hide();
      $('#b_pin_code_div').hide();
      $('#b_sum_amount_div').hide();
    }
    else if (assets_type == 'Stock Equities') {
      $('.hide_num').hide();
      $('#serial_no').show();
      $('.hide_name').hide();
      $('#company_name').show();
      $('#key_number').val('');
      $('#fd_recipt_No').val('');
      $('#b_state_div').hide();
      $('#b_pin_code_div').hide();
      $('#b_sum_amount_div').hide();
    }
    else if (assets_type == 'Insurance Policy') {
      $('.hide_num').hide();
      $('#policy_no').show();
      $('.hide_name').hide();
      $('#insurance_company').show();
      $('#key_number').val('');
      $('#fd_recipt_No').val('');
      $('#b_sum_amount_div').show();
      $('#b_state_div').hide();
      $('#b_pin_code_div').hide();
      // $('.hide_num').hide();
      // $('#amount').val('');
    }
    //alert(assets_type);
  });

  // validation Real Estate asif //
  $("#estate_type").blur(function(){
    var estate_type = $('#estate_type').val();
    if(estate_type == '0'){
      $('#error_estate_type').show();
    }
    else{
        $('#error_estate_type').hide();
      }
  });

  $("#house_no").blur(function(){
    var house_no = $('#house_no').val();
    // var house_no_format = /^[0-9]$/;
    if( house_no == ''){
      $('#error_house_no').show();
    }
    else{
        $('#error_house_no').hide();
      }
  });

  $("#survey_number").blur(function(){
    var survey_number = $('#survey_number').val();
    if(survey_number == ''){
      $('#error_survey_number').show();
    }
    else{
        $('#error_survey_number').hide();
      }
  });

  $("#measurment_area").blur(function(){
    var measurment_area = $('#measurment_area').val();
    if(measurment_area == ''){
      $('#error_measurment_area').show();
    }
    else{
        $('#error_measurment_area').hide();
      }
  });

  $("#measurment_unit").blur(function(){
    var measurment_unit = $('#measurment_unit').val();
    if(measurment_unit == '0'){
      $('#error_measurment_unit').show();
    }
    else{
        $('#error_measurment_unit').hide();
      }
  });

  $("#estate_address").blur(function(){
    var estate_address = $('#estate_address').val();
    if(estate_address == ''){
      $('#error_estate_address').show();
    }
    else{
        $('#error_estate_address').hide();
      }
  });

  $("#estate_city").blur(function(){
    var estate_city = $('#estate_city').val();
    if(estate_city == ''){
      $('#error_estate_city').show();
    }
    else{
        $('#error_estate_city').hide();
      }
  });

  $("#estate_pin").blur(function(){
    var estate_pin = $('#estate_pin').val();
    if(estate_pin == ''){
      $('#error_estate_pin').show();
    }
    else{
        $('#error_estate_pin').hide();
      }
  });

  $("#estate_country").blur(function(){
    var estate_country = $('#estate_country').val();
    if(estate_country == ''){
      $('#error_estate_country').show();
    }
    else{
        $('#error_estate_country').hide();
      }
  });

  $("#estate_state").blur(function(){
    var estate_state = $('#estate_state').val();
    if(estate_state == ''){
      $('#error_estate_state').show();
    }
    else{
        $('#error_estate_state').hide();
      }
  });

  $("#assets_type").blur(function(){
    var assets_type = $('#assets_type').val();
    if(assets_type == '0'){
      $('#error_assets_type').show();
    }
    else{
        $('#error_assets_type').hide();
      }
  });

  $("#account_number").blur(function(){
    var account_number = $('#account_number').val();
    if(account_number == ''){
      $('#error_account_number').show();
    }
    else{
        $('#error_account_number').hide();
      }
  });

  $("#bank_name").blur(function(){
    var bank_name2 = $('#bank_name').val();
    var bank_name_format =  /^[a-zA-Z ]*$/;

    if(!bank_name_format.test(bank_name2) || bank_name2 == ''){
      $('#error_bank_name').show();
    }
    else{
        $('#error_bank_name').hide();
      }
  });


  $("#branch_name").blur(function(){
    var branch_name = $('#branch_name').val();
    if(branch_name == ''){
      $('#error_branch_name').show();
    }
    else{
        $('#error_branch_name').hide();
      }
  });

  $("#key_number").blur(function(){
    var key_number = $('#key_number').val();
    if(key_number == ''){
      $('#error_key_number').show();
    }
    else{
        $('#error_key_number').hide();
      }
  });

  $("#fd_recipt_No").blur(function(){
    var fd_recipt_No = $('#fd_recipt_No').val();
    if(fd_recipt_No == ''){
      $('#error_fd_recipt_No').show();
    }
    else{
        $('#error_fd_recipt_No').hide();
      }
  });

  $("#vehicle_model").blur(function(){
    var vehicle_model = $('#vehicle_model').val();
    if(vehicle_model == ''){
      $('#error_vehicle_model').show();
    }
    else{
        $('#error_vehicle_model').hide();
      }
  });

  $("#vehicle_make_year").blur(function(){
    var vehicle_make_year = $('#vehicle_make_year').val();
    if(vehicle_make_year == ''){
      $('#error_vehicle_make_year').show();
    }
    else{
        $('#error_vehicle_make_year').hide();
      }
  });

  $("#registration_number").blur(function(){
    var registration_number = $('#registration_number').val();
    if(registration_number == ''){
      $('#error_registration_number').show();
    }
    else{
        $('#error_registration_number').hide();
      }
  });

  // validation Other git asif //

  $("#gift_type").blur(function(){
    var gift_type = $('#gift_type').val();
    if(gift_type == '0'){
      $('#error_gift_type').show();
    }
    else{
        $('#error_gift_type').hide();
      }
  });

  $("#gift_description").blur(function(){
    var gift_description = $('#gift_description').val();
    if(gift_description == ''){
      $('#error_gift_description').show();
    }
    else{
        $('#error_gift_description').hide();
      }
  });

  $("#b_state").blur(function(){
    var b_state = $('#b_state').val();
    var b_state_format =  /^[a-zA-Z ]*$/;

    if(!b_state_format.test(b_state) || b_state == ''){
      $('#error_b_state').show();
    }
    else{
        $('#error_b_state').hide();
      }
  });

  $("#b_pin_code").blur(function(){
    var b_pin_code = $('#b_pin_code').val();
    var b_pin_code_format = /^[0-9]{6}$/;

    if(!b_pin_code_format.test(b_pin_code) || b_pin_code == ''){
      $('#error_b_pin_code').show();
    }
    else{
        $('#error_b_pin_code').hide();
      }
  });

  $("#b_sum_amount").blur(function(){
    var b_sum_amount = $('#b_sum_amount').val();
    var b_sum_amount_format = /^[0-9]*$/;

    if(!b_sum_amount_format.test(b_sum_amount) || b_sum_amount == ''){
      $('#error_b_sum_amount').show();
    }
    else{
        $('#error_b_sum_amount').hide();
      }
  });

  //	Save/Add Real Estate... Datta...
	$('#add_assets').click(function(){
     var estate_type = $('#estate_type').val();
     var house_no = $('#house_no').val();
     var survey_number = $('#survey_number').val();
     var measurment_area = $('#measurment_area').val();
     var measurment_unit = $('#measurment_unit').val();
     var estate_address = $('#estate_address').val();
     var estate_city = $('#estate_city').val();
     var estate_pin = $('#estate_pin').val();
     var estate_pin_format = /^[0-9]{6}$/;
     var estate_country = $('#estate_country').val();
     var estate_state = $('#estate_state').val();

     if(estate_type == '0'){
       $('#error_estate_type').show();
     }
     if(house_no == ''){
       $('#error_house_no').show();
     }
     if(survey_number == ''){
       $('#error_survey_number').show();
     }
     if(measurment_area == ''){
       $('#error_measurment_area').show();
     }
     if(measurment_unit == '0'){
       $('#error_measurment_unit').show();
     }
     if(estate_address == ''){
       $('#error_estate_address').show();
     }
     if(estate_city == ''){
       $('#error_estate_city').show();
     }
     if(estate_pin == ''){
       $('#error_estate_pin').show();
     }
     if(estate_country == ''){
       $('#error_estate_country').show();
     }
     if(estate_state == ''){
       $('#error_estate_state').show();
     }

     if(estate_type == '0' || house_no == '' || survey_number == '' || measurment_area == '' || measurment_unit == '0' ||
   estate_address == '' || estate_city == '' || estate_pin == '' || estate_country == '' || estate_state == ''){
     // Blank....
     }
     else {
  			 $('.valide').hide();
         var form_data = $('#assets_form').serialize();
         $.ajax({
           data: form_data,
           type: "post",
           url: base_url+"Will_controller/save_assets",
           success: function (data){
              $("#success_save_real").show().delay(5000).fadeOut();
             $('.clear').val('');
             $('.clear_dr').val(0);
             // get and fill up Funeral...
             $('.table_real_estate').dataTable({
                 'bDestroy': true
             }).fnDestroy(); // destroy table.

            var table_real = $('.table_real_estate').DataTable({
               "processing": true,
               "serverSide": true,
               "bFilter" : false,
               "bLengthChange": false,
               "bPaginate": false,
               "bInfo": false,
               "ajax":{
                 "url": base_url+"Table_controller/real_estate_list",
                 "dataType": "json",
                 "type": "POST",
                 "data":{
                   'will_id' : will_id,
                   'page' : 'assets_info'
                 }
               },
             });
             // Check Bank assets empty...
             $('.table_real_estate').on( 'draw.dt', function(){
                if (! table_real.data().any() ) {
                   $('.table_real_estate').hide();
                 }
                 else{
                   $('.table_real_estate').show();
                   $('#error_add_assets').hide();
                   $('#assets_next').prop('disabled', false);
                 }
             });
           }
         });
    	}
	});

  //	Update Real Estate... Datta...
	$('#update_real_estate').click(function(){
     var estate_type = $('#estate_type').val();
     var house_no = $('#house_no').val();
     var survey_number = $('#survey_number').val();
     var measurment_area = $('#measurment_area').val();
     var measurment_unit = $('#measurment_unit').val();
     var estate_address = $('#estate_address').val();
     var estate_city = $('#estate_city').val();
     var estate_pin = $('#estate_pin').val();
     var estate_pin_format = /^[0-9]{6}$/;
     var estate_country = $('#estate_country').val();
     var estate_state = $('#estate_state').val();

     if(estate_type == '0'){
       $('#error_estate_type').show();
     }
     if(house_no == ''){
       $('#error_house_no').show();
     }
     if(survey_number == ''){
       $('#error_survey_number').show();
     }
     if(measurment_area == ''){
       $('#error_measurment_area').show();
     }
     if(measurment_unit == '0'){
       $('#error_measurment_unit').show();
     }
     if(estate_address == ''){
       $('#error_estate_address').show();
     }
     if(estate_city == ''){
       $('#error_estate_city').show();
     }
     if(estate_pin == ''){
       $('#error_estate_pin').show();
     }
     if(estate_country == ''){
       $('#error_estate_country').show();
     }
     if(estate_state == ''){
       $('#error_estate_state').show();
     }

     if(estate_type == '0' || house_no == '' || survey_number == '' || measurment_area == '' || measurment_unit == '0' ||
   estate_address == '' || estate_city == '' || estate_pin == '' || estate_country == '' || estate_state == ''){
     // Blank....
     }
     else {
  			 $('.valide').hide();
         var form_data = $('#assets_form').serialize();
         $.ajax({
           data: form_data,
           type: "post",
           url: base_url+"Will_controller/update_real_estate",
           success: function (data){
             $("#success_update_real").show().delay(5000).fadeOut();
             $('#add_assets').show();
             $('#update_real_estate').addClass('d-none');
             $('.clear').val('');
             $('.clear_dr').val(0);
             // get and fill up Funeral...
             $('.table_real_estate').dataTable({
                 'bDestroy': true
             }).fnDestroy(); // destroy table.

            var table_real = $('.table_real_estate').DataTable({
               "processing": true,
               "serverSide": true,
               "bFilter" : false,
               "bLengthChange": false,
               "bPaginate": false,
               "bInfo": false,
               "ajax":{
                 "url": base_url+"Table_controller/real_estate_list",
                 "dataType": "json",
                 "type": "POST",
                 "data":{
                   'will_id' : will_id,
                   'page' : 'assets_info'
                 }
               },
             });
           }
         });
    	}
	});

  //	Save/Add Bank Assets...
	$('#add_bank_assets').click(function(){
    var assets_type = $('#assets_type').val();
    var account_number = $('#account_number').val();
    var bank_name = $('#bank_name').val();
    var branch_name = $('#branch_name').val();
    var fd_recipt_No = $('#fd_recipt_No').val();
    var key_number = $('#key_number').val();

    if(assets_type == '0'){
      $('#error_assets_type').show();
    }
    if(account_number == ''){
      $('#error_account_number').show();
    }
    if(bank_name == ''){
      $('#error_bank_name').show();
    }
    if(branch_name == ''){
      $('#error_branch_name').show();
    }
     // if(assets_type == 'Bank Locker'){
    // }
    if(assets_type == '0' || account_number == '' || bank_name == '' || branch_name == ''){
    }
    else {
      if(assets_type == 'Bank Locker' && key_number == ''){
        $('#error_key_number').show();
      }
      else if(assets_type == 'Fixed Deposits' && fd_recipt_No == ''){
        $('#error_fd_recipt_No').show();
      }
      else{
        $('.valide').hide();
        var form_data = $('#bank_assets_form').serialize();
       $.ajax({
         data: form_data,
         type: "post",
         url: base_url+"Will_controller/save_bank_assets",
         success: function (data){
           $("#success_save_bank").show().delay(5000).fadeOut();
            $('.clear').val('');
            $('.clear_dr').val(0);
            // get and fill up Funeral...
            $('.table_bank_assets').dataTable({
               'bDestroy': true
           }).fnDestroy(); // destroy table.

            var table_bank_assets = $('.table_bank_assets').DataTable({
             "processing": true,
             "serverSide": true,
              "bFilter" : false,
              "bLengthChange": false,
              "bPaginate": false,
              "bInfo": false,
             "ajax":{
               "url": base_url+"Table_controller/bank_assets_list",
               "dataType": "json",
               "type": "POST",
               "data":{
                 'will_id' : will_id,
                 'page' : 'assets_info'
               }
             },
           });
           // Check Bank assets empty...
           $('.table_bank_assets').on( 'draw.dt', function(){
              if (! table_bank_assets.data().any() ) {
                 $('.table_bank_assets').hide();
               }
               else{
                 $('.table_bank_assets').show();
                 $('#error_add_assets').hide();
                 $('#assets_next').prop('disabled', false);
               }
           });
         }
       });
      }
     }
	});

  //	Update Bank Assets...
  $('#update_bank_assets').click(function(){
    var assets_type = $('#assets_type').val();
    var account_number = $('#account_number').val();
    var bank_name = $('#bank_name').val();
    var branch_name = $('#branch_name').val();
    var fd_recipt_No = $('#fd_recipt_No').val();
    var key_number = $('#key_number').val();

    if(assets_type == '0'){
      $('#error_assets_type').show();
    }
    if(account_number == ''){
      $('#error_account_number').show();
    }
    if(bank_name == ''){
      $('#error_bank_name').show();
    }
    if(branch_name == ''){
      $('#error_branch_name').show();
    }
     // if(assets_type == 'Bank Locker'){
    // }
    if(assets_type == '0' || account_number == '' || bank_name == '' || branch_name == ''){
    }
    else {
      if(assets_type == 'Bank Locker' && key_number == ''){
        $('#error_key_number').show();
      }
      else if(assets_type == 'Fixed Deposits' && fd_recipt_No == ''){
        $('#error_fd_recipt_No').show();
      }
      else{
        $('.valide').hide();
        var form_data = $('#bank_assets_form').serialize();
       $.ajax({
         data: form_data,
         type: "post",
         url: base_url+"Will_controller/update_bank_assets",
         success: function (data){
           $("#success_update_bank").show().delay(5000).fadeOut();
           $('#add_bank_assets').show();
           $('#update_bank_assets').addClass('d-none');
            $('.clear').val('');
            $('.clear_dr').val(0);
            // get and fill up Funeral...
            $('.table_bank_assets').dataTable({
               'bDestroy': true
           }).fnDestroy(); // destroy table.

            var table_bank_assets = $('.table_bank_assets').DataTable({
              "processing": true,
              "serverSide": true,
              "bFilter" : false,
              "bLengthChange": false,
              "bPaginate": false,
              "bInfo": false,
              "ajax":{
               "url": base_url+"Table_controller/bank_assets_list",
               "dataType": "json",
               "type": "POST",
               "data":{
                 'will_id' : will_id,
                 'page' : 'assets_info'
               }
             },
           });
         }
       });
      }
     }
  });

  //	Save/Add Vehicle Assets...
  $('#add_vehicle_assets').click(function(){
        var vehicle_model = $('#vehicle_model').val();
        var vehicle_make_year = $('#vehicle_make_year').val();
        var registration_number = $('#registration_number').val();

        if(vehicle_model == ''){
          $('#error_vehicle_model').show();
        }

        if(vehicle_make_year == ''){
          $('#error_vehicle_make_year').show();
        }

        if(registration_number == ''){
          $('#error_registration_number').show();
        }
        if(vehicle_model == '' || vehicle_make_year == '' || registration_number == ''){
          // Blank...
        }
        else {
                $('.valide').hide();
    var form_data = $('#vehicle_assets_form').serialize();
    $.ajax({
      data: form_data,
      type: "post",
      url: base_url+"Will_controller/save_vehicle_assets",
      success: function (data){
        $("#success_save_vehicle").show().delay(5000).fadeOut();
        $('.clear').val('');
        $('.clear_dr').val(0);
        // get and fill up Vehicle...
        $('.table_vehicle').dataTable({
            'bDestroy': true
        }).fnDestroy(); // destroy table.

      var table_vehicle =  $('.table_vehicle').DataTable({
          "processing": true,
          "serverSide": true,
          "bFilter" : false,
          "bLengthChange": false,
          "bPaginate": false,
          "bInfo": false,
          "ajax":{
            "url": base_url+"Table_controller/vehicle_list",
            "dataType": "json",
            "type": "POST",
            "data":{
              'will_id' : will_id,
              'page' : 'assets_info'
            }
          },
        });
        // Check Vehicle assets empty...
        $('.table_vehicle').on( 'draw.dt', function(){
           if (! table_vehicle.data().any() ) {
              $('.table_vehicle').hide();
            }
            else{
              $('.table_vehicle').show();
              $('#error_add_assets').hide();
              $('#assets_next').prop('disabled', false);
            }
        });
      }
    });
  }
  });

  //	Update Vehicle Assets...
  $('#update_vehicle_assets').click(function(){
        var vehicle_model = $('#vehicle_model').val();
        var vehicle_make_year = $('#vehicle_make_year').val();
        var registration_number = $('#registration_number').val();

        if(vehicle_model == ''){
          $('#error_vehicle_model').show();
        }

        if(vehicle_make_year == ''){
          $('#error_vehicle_make_year').show();
        }

        if(registration_number == ''){
          $('#error_registration_number').show();
        }
        if(vehicle_model == '' || vehicle_make_year == '' || registration_number == ''){
          // Blank...
        }
        else {
          $('.valide').hide();
          var form_data = $('#vehicle_assets_form').serialize();
          $.ajax({
            data: form_data,
            type: "post",
            url: base_url+"Will_controller/update_vehicle_assets",
            success: function (data){
              $("#success_update_vehicle").show().delay(5000).fadeOut();
              $('#add_vehicle_assets').show();
              $('#update_vehicle_assets').addClass('d-none');
              $('.clear').val('');
              $('.clear_dr').val(0);
              // get and fill up Vehicle...
              $('.table_vehicle').dataTable({
                  'bDestroy': true
              }).fnDestroy(); // destroy table.

            var table_vehicle =  $('.table_vehicle').DataTable({
                "processing": true,
                "serverSide": true,
                "bFilter" : false,
                "bLengthChange": false,
                "bPaginate": false,
                "bInfo": false,
                "ajax":{
                  "url": base_url+"Table_controller/vehicle_list",
                  "dataType": "json",
                  "type": "POST",
                  "data":{
                    'will_id' : will_id,
                    'page' : 'assets_info'
                  }
                },
              });
            }
          });
  }
  });

  //	Save/Add Gift Assets...
	$('#add_other_gift_assets').click(function(){
    var gift_type = $('#gift_type').val();
    var gift_description = $('#gift_description').val();

    if(gift_type == '0'){
      $('#error_gift_type').show();
    }

    if(gift_description == ''){
      $('#error_gift_description').show();
    }

    if(gift_type == '0' || gift_description == ''){

    }
    else {
            $('.valide').hide();

		var form_data = $('#other_gift_assets_form').serialize();
  	$.ajax({
  		data: form_data,
  		type: "post",
  		url: base_url+"Will_controller/save_other_gift_assets",
  		success: function (data){
        $("#success_save_gift").show().delay(5000).fadeOut();
        $('.clear').val('');
        $('.clear_dr').val(0);
        // get and fill up Gift Info...
        $('.table_gift').dataTable({
      			'bDestroy': true
      	}).fnDestroy(); // destroy table.

        var table_gift = $('.table_gift').DataTable({
      		"processing": true,
      		"serverSide": true,
          "bFilter" : false,
          "bLengthChange": false,
          "bPaginate": false,
          "bInfo": false,
      		"ajax":{
      			"url": base_url+"Table_controller/gift_list",
      			"dataType": "json",
      			"type": "POST",
            "data":{
              'will_id' : will_id,
              'page' : 'assets_info'
            }
      		},
      	});
        $('.table_gift').on( 'draw.dt', function(){
           if (!table_gift.data().any()) {
              $('.table_gift').hide();
              $('#error_add_assets').hide();
              $('#assets_next').prop('disabled', false);
            }
            else{
              $('.table_gift').show();
              $('#error_add_assets').hide();
              $('#assets_next').prop('disabled', false);
            }
        });
			}
		});
  }
	});

  //	Update Gift Assets...
  $('#update_other_gift_assets').click(function(){
    var gift_type = $('#gift_type').val();
    var gift_description = $('#gift_description').val();

    if(gift_type == '0'){
      $('#error_gift_type').show();
    }

    if(gift_description == ''){
      $('#error_gift_description').show();
    }

    if(gift_type == '0' || gift_description == ''){

    }
    else {
    $('.valide').hide();
    var form_data = $('#other_gift_assets_form').serialize();
    $.ajax({
      data: form_data,
      type: "post",
      url: base_url+"Will_controller/update_other_gift_assets",
      success: function (data){
        $("#success_update_gift").show().delay(5000).fadeOut();
        $('.clear').val('');
        $('.clear_dr').val(0);
        // get and fill up Gift Info...
        $('.table_gift').dataTable({
            'bDestroy': true
        }).fnDestroy(); // destroy table.

        var table_gift = $('.table_gift').DataTable({
          "processing": true,
          "serverSide": true,
          "bFilter" : false,
          "bLengthChange": false,
          "bPaginate": false,
          "bInfo": false,
          "ajax":{
            "url": base_url+"Table_controller/gift_list",
            "dataType": "json",
            "type": "POST",
            "data":{
              'will_id' : will_id,
              'page' : 'assets_info'
            }
          },
        });
      }
    });
  }
  });

  $('#assets_previous').click(function(){
      window.location.href = base_url+"Will_controller/family_info_view";
  });
  $('#assets_next').click(function(){
      window.location.href = base_url+"Will_controller/executor_funeral_view";
  });
//Assets JS End...
});
