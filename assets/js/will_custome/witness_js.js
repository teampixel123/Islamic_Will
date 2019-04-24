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
    "data":{ 'will_id' : will_id  }
  },
});
// End Family Member Js....
// get and fill up executor...
$('.table_executor').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

$('.table_executor').DataTable({
  "processing": true,
  "serverSide": true,
  "bFilter" : false,
  "bLengthChange": false,
  "bPaginate": false,
  "bInfo": false,
  "ajax":{
    "url": base_url+"Table_controller/executor_list",
    "dataType": "json",
    "type": "POST",
    "data":{ 'will_id' : will_id  }
  },
});

// get and fill up Funeral...
$('.table_funeral').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

$('.table_funeral').DataTable({
  "processing": true,
  "serverSide": true,
  "bFilter" : false,
  "bLengthChange": false,
  "bPaginate": false,
  "bInfo": false,
  "ajax":{
    "url": base_url+"Table_controller/funeral_list",
    "dataType": "json",
    "type": "POST",
    "data":{ 'will_id' : will_id  }
  },
});

// get and fill up real_estate...
$('.table_real_estate').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

$('.table_real_estate').DataTable({
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
    "data":{ 'will_id' : will_id  }
  },
});
// get and fill up bank_assets...
$('.table_bank_assets').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

$('.table_bank_assets').DataTable({
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
    "data":{ 'will_id' : will_id  }
  },
});

// get and fill up Vehicle...
$('.table_vehicle').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

$('.table_vehicle').DataTable({
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
    "data":{ 'will_id' : will_id  }
  },
});
// get and fill up Gift Info...
$('.table_gift').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

$('.table_gift').DataTable({
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
    "data":{ 'will_id' : will_id  }
  },
});

// get and fill up Witness Info...
$('.table_witness').dataTable({
    'bDestroy': true
}).fnDestroy(); // destroy table.

$('.table_witness').DataTable({
  "processing": true,
  "serverSide": true,
  "bFilter" : false,
  "bLengthChange": false,
  "bPaginate": false,
  "bInfo": false,
  "ajax":{
    "url": base_url+"Table_controller/witness_list",
    "dataType": "json",
    "type": "POST",
    "data":{ 'will_id' : will_id  }
  },
});

// validation start asif//
$("#witness_name").blur(function(){
  var witness_name = $('#witness_name').val();
  if(witness_name == ''){
    $('#error_witness_name').show();
  }
  else{
      $('#error_witness_name').hide();
    }
});

$("#witness_address").blur(function(){
  var witness_address = $('#witness_address').val();
  if(witness_address == ''){
    $('#error_witness_address').show();
  }
  else{
      $('#error_witness_address').hide();
    }
});
// validation end asif//
$('#btn_final_pdf').click(function(){
  //alert();
  //window.location.href = "<?php echo base_url() ?>Will_controller/login";
  //$('#btn_login').show();
  $('#final_pdf').submit();
  //$('#go_login').submit();
});

$('#btn_pdf').click(function(){
  //alert();
  //window.location.href = "<?php echo base_url() ?>Will_controller/login";
  $('#btn_login').show();
  $('#pdf').submit();
  //$('#go_login').submit();
});

//	Save/Add Family Member
$('#add_witness').click(function(){
  var witness_name = $('#witness_name').val();
  var witness_address = $('#witness_address').val();
  var name_format =  /^[a-zA-Z ]*$/;

  if(!name_format.test(witness_name) || witness_name == ''){
    $('#error_witness_name').show();
  }
  if(witness_address == ''){
    $('#error_witness_address').show();
  }

  if(witness_name == '' || witness_address == ''){
    // Blank....
  }
  else {
    $('.valide').hide();
    var form_data = $('#witness_form').serialize();
    $.ajax({
      data: form_data,
      type: "post",
      url: base_url+"Will_controller/save_witness_info",
      success: function (data){
        $('.clear').val('');
        $('.clear_dr').val(0);
        $('#guardian_div').hide();

        var will_id = $('#will_id').val();
        $('.table_witness').dataTable({
            'bDestroy': true
        }).fnDestroy(); // destroy table.

        $('.table_witness').DataTable({
          "processing": true,
          "serverSide": true,
          "bFilter" : false,
          "bLengthChange": false,
          "bPaginate": false,
          "bInfo": false,
          "ajax":{
             "url": base_url+"Table_controller/witness_list",
             "dataType": "json",
             "type": "POST",
             "data":{ 'will_id' : will_id  }
          },
        });
      }
    });
  }
});

//Date and Place...
// validation start asif//
$("#will_place").blur(function(){
  var will_place = $('#will_place').val();
  if(will_place == ''){
    $('#error_will_place').show();
  }
  else{
      $('#error_will_place').hide();
    }
});

$('#will_date').datetimepicker({
  format: 'dd-mm-yyyy',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0

});
$('#add_date_place').click(function(){
  var will_date = $('#will_date').val();
  var will_place = $('#will_place').val();

  if(will_date == ''){
    $('#error_will_date').show();
  }
  if(will_place == ''){
    $('#error_will_place').show();
  }
  if(will_date == '' || will_place == ''){

  }
  else{
    $('.valide').hide();
    var form_data = $('#date_place_form').serialize();
    $.ajax({
      data: form_data,
      type: "post",
      url: base_url+"Will_controller/save_date_place_info",
      success: function (data){
        $('.clear').val('');
        $('.clear_dr').val(0);
      }
    });
  }

});
