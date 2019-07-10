$(document).ready(function(){
  var will_id = $('#will_id').val();
  $('#vehicle_make_year').blur(function(){
    var cur_year = new Date().getFullYear();
    var min_year = cur_year - 100;
    var vehicle_make_year = $(this).val();
    if(vehicle_make_year < min_year || vehicle_make_year > cur_year){
      $(this).addClass('invalide-input');
    }
    else{
      $(this).removeClass('invalide-input');
    }
  });

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

      $('#account_number').hide();
      $('#account_number2').show();
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

      $('#account_number').hide();
      $('#account_number2').show();
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

      $('#account_number').hide();
      $('#account_number2').show();
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

      $('#account_number').hide();
      $('#account_number2').show();
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

      $('#account_number').hide();
      $('#account_number2').show();
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

      $('#account_number').show();
      $('#account_number2').hide();
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

      $('#account_number').show();
      $('#account_number2').hide();
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

      $('#account_number').show();
      $('#account_number2').hide();
    }
  });

  $("#account_number2").keyup(function(event){
    var inputValue = $("#account_number2").val();
    $("#account_number").val(inputValue);
    // var inputValue = event.which;
    // // allow letters and whitespaces only.
    // if(!(inputValue >= 48 && inputValue <= 57) && (inputValue != 0 && inputValue != 46)) {
    //     event.preventDefault();
    // }
  });

  all_tables();

  $('.personal-tab').click(function(){
    window.location.href = base_url+"Will_controller/personal_info_view";
  });
  $('.family-tab').click(function(){
    window.location.href = base_url+"Will_controller/family_info_view";
  });
  $('.assets-tab').click(function(){
    window.location.href = base_url+"Will_controller/assets_info_view";
  });

  $('#assets_previous').click(function(){
      window.location.href = base_url+"Will_controller/family_info_view";
  });

  $('#assets_next').click(function(){
    var table_bank_assets = bank_assets_table();
    var table_real = real_estate_table();
    var table_vehicle = vehicle_assets_table();
    var table_gift2 = gift_assets_table();

    $('.table_gift, .table_vehicle, .table_bank_assets, .table_real_estate').on( 'draw.dt', function(){
       if (!table_gift2.data().any() && !table_vehicle.data().any() && !table_bank_assets.data().any() && !table_real.data().any()) {
          $('#error_add_assets').show();
          $('#assets_next').prop('disabled', true);
        }
        else{
          window.location.href = base_url+"Will_controller/executor_funeral_view";
        }
    });
  });
//Assets JS End...
});

function all_tables(){
  var table_bank_assets = bank_assets_table();
  var table_real = real_estate_table();
  var table_vehicle = vehicle_assets_table();
  var table_gift2 = gift_assets_table();

  $('.table_gift, .table_vehicle, .table_bank_assets, .table_real_estate').on( 'draw.dt', function(){
     if (!table_gift2.data().any() && !table_vehicle.data().any() && !table_bank_assets.data().any() && !table_real.data().any()) {
        $('#error_add_assets').show();
        $('#assets_next').prop('disabled', true);
      }
      else{
        $('#error_add_assets').hide();
        $('#assets_next').prop('disabled', false);
      }
  });
}

// get and fill up real_estate...
function real_estate_table(){
  var will_id = $('#will_id').val();
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

  $('.table_real_estate').on( 'draw.dt', function(){
     if (! table_real.data().any() ) {
        $('.table_real_estate').hide();
      }
      else{
        $('.table_real_estate').show();
      }
  });
  return table_real;
}

// get and fill up bank_assets...
function bank_assets_table(){
  var will_id = $('#will_id').val();
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
  return table_bank_assets;
}

// get and fill up Vehicle...
function vehicle_assets_table(){
  var will_id = $('#will_id').val();
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
  return table_vehicle;
}
// get and fill up Gift Info...
function gift_assets_table(){
  var will_id = $('#will_id').val();
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
  return table_gift;
}
//	Save/Add Real Estate... Datta...
$('#add_assets').click(function(){
   var estate_type = $('#estate_type').val();
   var house_no = $('#house_no').val();
   var survey_number = $('#survey_number').val();
   var survey_number_type = $('#survey_number_type').val();
   var measurment_area = $('#measurment_area').val();
   var measurment_unit = $('#measurment_unit').val();
   var estate_address = $('#estate_address').val();
   var estate_city = $('#estate_city').val();
   var estate_pin = $('#estate_pin').val();
   var estate_pin_format = /^[0-9]{6}$/;
   var estate_country = $('#estate_country').val();
   var estate_state = $('#estate_state').val();

   $('.required').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
     }
   });

   if(survey_number_type == '0' || estate_type == '0' || house_no == '' || survey_number == '' || measurment_area == '' || measurment_unit == '0' ||
 estate_address == '' || estate_city == '' || estate_pin == '' || estate_country == '' || estate_state == '' || !estate_pin_format.test(estate_pin)){
   // Blank....
   }
   else {
     $('#save_load_modal').modal('show');
     $('.required').removeClass('invalide-input');
     $('.required').removeClass('required-input');
     var form_data = $('#assets_form').serialize();
     $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/save_assets",
       success: function (data){
          $("#success_save_real").show().delay(5000).fadeOut();
         $('.clear').val('');
         $('.clear_dr').val(0);
         // get and fill up
         all_tables();
         $('#save_load_modal').on('shown.bs.modal', function(e) {
           $("#save_load_modal").modal("hide");
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

   $('.required').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
     }
   });

   if(survey_number_type == '0' || estate_type == '0' || house_no == '' || survey_number == '' || measurment_area == '' || measurment_unit == '0' ||
 estate_address == '' || estate_city == '' || estate_pin == '' || estate_country == '' || estate_state == '' || !estate_pin_format.test(estate_pin)){
   // Blank....
   }
   else{
      $("#save_load_modal").modal("show");
        $('.required').removeClass('invalide-input');
        $('.required').removeClass('required-input');
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
           // get and fill up
           all_tables();
           $('#save_load_modal').on('shown.bs.modal', function(e) {
             $("#save_load_modal").modal("hide");
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
  var b_pin_code = $('#b_pin_code').val();
  var pin_code_format = /^[0-9]{6}$/;
  $('.required').each(function(){
    var val = $(this).val();
    if(val == '' || val == '0'){
      $(this).addClass('required-input');
    }
  });

  if(assets_type == '0' || account_number == '' || bank_name == '' || branch_name == '' ||
  (assets_type == 'Savings A/c' && !pin_code_format.test(b_pin_code)) ||
  (assets_type == 'Current A/C' && !pin_code_format.test(b_pin_code)) ||
  (assets_type == 'Fixed Deposits' && !pin_code_format.test(b_pin_code)) ||
  (assets_type == 'PPF' && !pin_code_format.test(b_pin_code)) ||
  (assets_type == 'Bank Locker' && !pin_code_format.test(b_pin_code)) ||
  (assets_type == 'Bank Locker' && key_number == '') ||
  (assets_type == 'Fixed Deposits' && fd_recipt_No == '')){
    // alert('error');
  }
  else {
      // alert('save');
      $("#save_load_modal").modal("show");
      $('.required').removeClass('invalide-input');
      $('.required').removeClass('required-input');
      var form_data = $('#bank_assets_form').serialize();
     $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/save_bank_assets",
       success: function (data){
         $("#success_save_bank").show().delay(5000).fadeOut();
          $('.clear').val('');
          $('.clear_dr').val(0);
          // get and fill up
          all_tables();
          $('#save_load_modal').on('shown.bs.modal', function(e) {
            $("#save_load_modal").modal("hide");
          });
       }
     });

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
  var b_pin_code = $('#b_pin_code').val();
  var pin_code_format = /^[0-9]{6}$/;
  $('.required').each(function(){
    var val = $(this).val();
    if(val == ''){
      $(this).addClass('required-input');
    }
  });

  if(assets_type == '0' || account_number == '' || bank_name == '' || branch_name == '' ||
      (assets_type == 'Savings A/c' && !pin_code_format.test(b_pin_code)) ||
      (assets_type == 'Current A/C' && !pin_code_format.test(b_pin_code)) ||
      (assets_type == 'Fixed Deposits' && !pin_code_format.test(b_pin_code)) ||
      (assets_type == 'PPF' && !pin_code_format.test(b_pin_code)) ||
      (assets_type == 'Bank Locker' && !pin_code_format.test(b_pin_code)) ||
      (assets_type == 'Bank Locker' && key_number == '') ||
      (assets_type == 'Fixed Deposits' && fd_recipt_No == '')){
    // alert('error');
  }
  else {
        $("#save_load_modal").modal("show");
      $('.required').removeClass('invalide-input');
      $('.required').removeClass('required-input');
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
          // get and fill up
          all_tables();
          $('#save_load_modal').on('shown.bs.modal', function(e) {
            $("#save_load_modal").modal("hide");
          });
       }
     });

   }
});

//	Save/Add Vehicle Assets...
$('#add_vehicle_assets').click(function(){
      var vehicle_model = $('#vehicle_model').val();
      var vehicle_make_year = $('#vehicle_make_year').val();
      var registration_number = $('#registration_number').val();
      var cur_year = new Date().getFullYear();
      var min_year = cur_year - 100;

      $('.required').each(function(){
        var val = $(this).val();
        if(val == ''){
          $(this).addClass('required-input');
        }
      });

      if(vehicle_model == '' || vehicle_make_year == '' || registration_number == '' || vehicle_make_year < min_year || vehicle_make_year > cur_year){
        // Blank...
      }
      else {
        $("#save_load_modal").modal("show");
        $('.required').removeClass('invalide-input');
        $('.required').removeClass('required-input');
        var form_data = $('#vehicle_assets_form').serialize();
        $.ajax({
          data: form_data,
          type: "post",
          url: base_url+"Will_controller/save_vehicle_assets",
          success: function (data){
            $("#success_save_vehicle").show().delay(5000).fadeOut();
            $('.clear').val('');
            $('.clear_dr').val(0);
            // get and fill up
            all_tables();
            $('#save_load_modal').on('shown.bs.modal', function(e) {
              $("#save_load_modal").modal("hide");
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
var cur_year = new Date().getFullYear();
var min_year = cur_year - 100;

$('.required').each(function(){
  var val = $(this).val();
  if(val == ''){
    $(this).addClass('required-input');
  }
});

if(vehicle_model == '' || vehicle_make_year == '' || registration_number == '' || vehicle_make_year < min_year || vehicle_make_year > cur_year){
  // Blank...
}
else {
  $("#save_load_modal").modal("show");
  $('.required').removeClass('invalide-input');
  $('.required').removeClass('required-input');
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
      // get and fill up
      all_tables();
      $('#save_load_modal').on('shown.bs.modal', function(e) {
        $("#save_load_modal").modal("hide");
      });
    }
  });
}
});



//	Update Gift Assets...
$('#update_other_gift_assets').click(function(){
  var gift_type = $('#gift_type').val();
  var gift_description = $('#gift_description').val();
  $('.required').each(function(){
    var val = $(this).val();
    if(val == ''){
      $(this).addClass('required-input');
    }
  });

  if(gift_type == '0' || gift_description == ''){

  }
  else {
      $("#save_load_modal").modal("show");
      $('.required').removeClass('invalide-input');
      $('.required').removeClass('required-input');
    $(this).removeClass('invalide-input');
    $(this).removeClass('required-input');
  var form_data = $('#other_gift_assets_form').serialize();
  $.ajax({
    data: form_data,
    type: "post",
    url: base_url+"Will_controller/update_other_gift_assets",
    success: function (data){
      $("#success_update_gift").show().delay(5000).fadeOut();
      $('.clear').val('');
      $('.clear_dr').val(0);

      all_tables();
      $('#save_load_modal').on('shown.bs.modal', function(e) {
        $("#save_load_modal").modal("hide");
      });
    }
  });
}
});
//	Save/Add Gift Assets...
$('#add_other_gift_assets').click(function(){
  var gift_type = $('#gift_type').val();
  var gift_description = $('#gift_description').val();
  $('.required').each(function(){
    var val = $(this).val();
    if(val == ''){
      $(this).addClass('required-input');
    }
  });

  if(gift_type == '0' || gift_description == ''){
  }
  else {
    $("#save_load_modal").modal("show");
    $('.required').removeClass('invalide-input');
    $('.required').removeClass('required-input');
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
        //gift_assets_table();
        $('#save_load_modal').on('shown.bs.modal', function(e) {
          $("#save_load_modal").modal("hide");
        });
        all_tables();

      }
    });
}
});
