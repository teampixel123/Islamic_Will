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
//  strat validation asif
$("#executor_name").blur(function(){
  var executor_name = $('#executor_name').val();
  var executor_name_format =  /^[a-zA-Z ]*$/;
  if(!executor_name_format.test(executor_name) || executor_name == ''){
    $('#error_executor_name').show();
  }
  else{
      $('#error_executor_name').hide();
    }
});

$("#executor_address").blur(function(){
  var executor_address = $('#executor_address').val();
  if(executor_address == ''){
    $('#error_executor_address').show();
  }
  else{
      $('#error_executor_address').hide();
    }
});

$("#executor_age").blur(function(){
  var executor_age = $('#executor_age').val();
  var executor_age_format =  /^[0-9]*$/;
  if(!executor_age_format.test(executor_age) || executor_age == ''){
    $('#error_executor_age').show();
  }
  else{
      $('#error_executor_age').hide();
    }
});

$("#funeral_name").blur(function(){
  var funeral_name = $('#funeral_name').val();
  var funeral_name_format =  /^[a-zA-Z ]*$/;
  if(!funeral_name_format.test(funeral_name) || funeral_name == ''){
    $('#error_funeral_name').show();
  }
  else{
      $('#error_funeral_name').hide();
    }
});

$("#funeral_address").blur(function(){
  var funeral_address = $('#funeral_address').val();
  var funeral_address_format =  /^[a-zA-Z ]*$/;
  if(!funeral_address_format.test(funeral_address) || funeral_address == ''){
    $('#error_funeral_address').show();
  }
  else{
      $('#error_funeral_address').hide();
    }
});
//  end validation asif

//	Save/Add Executor... Datta...
$('#add_executor').click(function(){
  var executor_name = $('#executor_name').val();
  var executor_address = $('#executor_address').val();
  var executor_age = $('#executor_age').val();
  if(executor_name == ''){
    $('#error_executor_name').show();
  }
  if(executor_address == ''){
    $('#error_executor_address').show();
  }
  if(executor_age == ''){
    $('#error_executor_age').show();
  }
  else {
    $('.valide').hide();
    var form_data = $('#executor_form').serialize();
    $.ajax({
      data: form_data,
      type: "post",
      url: base_url+"Will_controller/save_executor",
      success: function (data){
        $('.clear').val('');
        $('.clear_dr').val(0);
        var will_id = $('#will_id').val();
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
      }
    });
  }
});

//	Save/Add Funeral...
$('#add_funeral').click(function(){
  var funeral_name = $('#funeral_name').val();
  var funeral_address = $('#funeral_address').val();

  if(funeral_name == ''){
    $('#error_funeral_name').show();
  }
  if(funeral_address == ''){
    $('#error_funeral_address').show();
  }
  else {
      $('.valide').hide();

      var form_data = $('#funeral_form').serialize();
      $.ajax({
        data: form_data,
        type: "post",
        url: base_url+"Will_controller/save_funeral",
        success: function (data){
          $('.clear').val('');
          $('.clear_dr').val(0);
          $('#guardian_div').hide();
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
        }
      });
  }
});
// Executor & Funeral JS End........
