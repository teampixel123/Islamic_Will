$(document).ready(function(){
  var will_id = $('#will_id').val();
  $("#family_person_name,#mother_of_minar,#guardian_name,#opt_guardian_name").keypress(function(event){
    var inputValue = event.which;
    //alert(inputValue);
    // allow letters and whitespaces only.
    if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
        event.preventDefault();
    }
  });
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

    var marital_status = info[0]['marital_status'];
    var is_have_child = info[0]['is_have_child'];
    if(marital_status =='Unmarried'){
      $('#Spouse').hide();
      $('#Son').hide();
      $('#Daugther').hide();
    }
    if(is_have_child == 0){
      $('#Son').hide();
      $('#Daugther').hide();
    }
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

var table =  $('.table_family_member').DataTable({
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
        'page' : 'family_info'
      }
    },
  });

$('.table_family_member').on( 'draw.dt', function(){
   if (! table.data().any() ) {
     $('#family_next').prop('disabled', true);
     $('.table_family_member').hide();
     $('#error_add_member').show();
    }
    else{
      $('#family_next').prop('disabled', false);
      $('.table_family_member').show();
      $('#error_add_member').hide();
    }
});

$('#family_person_dob').datetimepicker({
  format: 'dd-mm-yyyy',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0

});

$('#family_person_dob').datetimepicker().on('changeDate', function(ev){
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1; //January is 0!
  var yyyy = today.getFullYear();
  if (dd < 10) {
    dd = '0' + dd;
  }
  if (mm < 10) {
    mm = '0' + mm;
  }
  var today2 = dd + '/' + mm + '/' + yyyy;
  // Get Today date end...
  var birthdate2 = $(this).val();
    var today = moment(today2,'DD/MM/YYYY');
    var birthdate = moment(birthdate2,'DD/MM/YYYY');

    var years = today.diff(birthdate, 'year');
    birthdate.add(years, 'years');
    var months = today.diff(birthdate, 'months');
    birthdate.add(months, 'months');
    if(months == 0){ var months = 1;}
    //alert(years+' '+months);
    var title = $('#relationship').val();
    $('#age_div').show();

    if(years > 0){
      $('#family_person_age').val(years);
      $('#family_person_age_format').val('Year');
    }
    else{
      $('#family_person_age').val(months);
      $('#family_person_age_format').val('Month');
    }

    if((title == 'Father' || title == 'Mother' || title == 'Spouse' || title == 'Grand Father' || title == 'Grand Mother') && years < 18){
      $('#invalide_family_person_dob').show();
      $('#family_person_dob').val('');
      $('#age_div').hide();
    }
    if(years >= 18){
      $('#is_minar').val('0');
      $('#invalide_family_person_dob').hide();
      $('#guardian_name').val('');
      $('#guardian_address').val('');
      $('#mother_of_minar').val('');
      $('#guardian_div').hide();
    }
    if((title == 'Son' || title == 'Daughter' || title == 'Brother' || title == 'Sister') && years < 18){
      $('#guardian_div').show();
      $('#is_minar').val('1');
    }
    else{
      $('#guardian_name').val('');
      $('#guardian_address').val('');
      $('#mother_of_minar').val('');
      $('#guardian_div').hide();
    }
});

$('#add_opt_guardian').change(function(){
  if ($(this).prop('checked')) {
    $('#opt_guardian_div').show();
  }
  else{
    $('#opt_guardian_name').val('');
    $('#opt_guardian_address').val('');
    $('#opt_guardian_div').hide();
  }
});

$('#relationship').change(function(){
  $('#family_person_dob').val('');
  $('#family_person_name').val('');
  $('#family_person_age').val('');
  $('#guardian_name').val('');
  $('#guardian_address').val('');
  $('#age_div').hide();
  $('#guardian_div').hide();
  $('#invalide_family_person_dob').hide();
});

//  strat ob blur validation asif
$("#relationship").blur(function(){
  var relationship = $('#relationship').val();
  if(relationship == '0'){
    $('#error_relationship').show();
  }
  else{
      $('#error_relationship').hide();
    }
});

$("#family_person_name").blur(function(){
  var family_person_name = $('#family_person_name').val();
  var family_person_name_format =  /^[a-zA-Z ]*$/;
  if(!family_person_name_format.test(family_person_name) || family_person_name == ''){
    $('#error_family_person_name').show();
  }
  else{
      $('#error_family_person_name').hide();
    }
});

$("#family_person_age").blur(function(){
  var family_person_age = $('#family_person_age').val();
  if(family_person_age == '' || family_person_age == '0 Year 0 Month'){
    $('#error_family_person_age').show();
  }
  else{
      $('#error_family_person_age').hide();
    }
});

$("#guardian_name").blur(function(){
  var guardian_name = $('#guardian_name').val();
  var guardian_name_format =  /^[a-zA-Z ]*$/;
  if(!guardian_name_format.test(guardian_name) || guardian_name == ''){
    $('#error_guardian_name').show();
  }
  else{
      $('#error_guardian_name').hide();
    }
});

$("#guardian_address").blur(function(){
  var guardian_address_format =  /^[a-zA-Z ]*$/;
  var guardian_address = $('#guardian_address').val();
  if(!guardian_address_format.test(guardian_address) || guardian_address == ''){
    $('#error_guardian_address').show();
  }
  else{
      $('#error_guardian_address').hide();
    }
});
//  end ob blur validation asif

//	Save/Add Family Member.. Datta...
$('#add_family_member').click(function(){
  var relationship = $('#relationship').val();
  var family_person_name = $('#family_person_name').val();
  var family_person_age = $('#family_person_age').val();
  var family_person_dob = $('#family_person_dob').val();
  var guardian_name = $('#guardian_name').val();
  var guardian_address = $('#guardian_address').val();
  var family_person_name_format =  /^[a-zA-Z ]*$/;
  var guardian_name_format =  /^[a-zA-Z ]*$/;

  if(relationship == '0'){
    $('#error_relationship').show();
  }
  if(!family_person_name_format.test(family_person_name) || family_person_name == ''){
    $('#error_family_person_name').show();
  }
  if(family_person_age == ''){
    $('#error_family_person_age').show();
  }
  if(family_person_dob == ''){
    $('#error_family_person_dob').show();
  }
  if((relationship == 'Son' || relationship == 'Daughter' || relationship == 'Brother' || relationship == 'Sister') && guardian_name == '' && family_person_age < 18){
    $('#error_guardian_name').show();
  }

  if((relationship == 'Son' || relationship == 'Daughter' || relationship == 'Brother' || relationship == 'Sister') && (!guardian_name_format.test(guardian_name) || guardian_name == '')  && family_person_age < 18){
    $('#error_guardian_name').show();
  }

  if(relationship == '0' || !family_person_name_format.test(family_person_name) || family_person_name == '' || family_person_dob == '' || family_person_age == '' ||
(guardian_name == '' && family_person_age < 18)){

  }
  else {
     $('.valide').hide();

     $('.table_family_member').on( 'draw.dt', function(){
        if (! table.data().any() ) {
          $('#family_next').prop('disabled', true);
          $('.table_family_member').hide();
         }
         else{
           $('#family_next').prop('disabled', false);
           $('.table_family_member').show();
         }
     });

     var form_data = $('#family_member_form').serialize();
     $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/save_family_member",
       success: function (data){
         $('.clear').val('');
         $('.clear_dr').val(0);
         $('#guardian_div').hide();
         $("#success_save_member").show().delay(5000).fadeOut();

         var will_id = $('#will_id').val();
         $('.table_family_member').dataTable({
             'bDestroy': true
         }).fnDestroy(); // destroy table.

         var table = $('.table_family_member').DataTable({
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
                'page' : 'family_info'
              }
           },
         });

         $('.table_family_member').on( 'draw.dt', function(){
            if (! table.data().any() ) {
              $('#family_next').prop('disabled', true);
              $('.table_family_member').hide();
              $('#error_add_member').show();
             }
             else{
               $('#family_next').prop('disabled', false);
               $('.table_family_member').show();
               $('#error_add_member').hide();
             }
         });

       }
     });
    }
});

//	Update Family Member.. Datta...
$('#update_family_member').click(function(){
  var relationship = $('#relationship').val();
  var family_person_name = $('#family_person_name').val();
  var family_person_age = $('#family_person_age').val();
  var family_person_dob = $('#family_person_dob').val();
  var guardian_name = $('#guardian_name').val();
  var guardian_address = $('#guardian_address').val();
  var family_person_name_format =  /^[a-zA-Z ]*$/;
  var guardian_name_format =  /^[a-zA-Z ]*$/;

  if(relationship == '0'){
    $('#error_relationship').show();
  }
  if(!family_person_name_format.test(family_person_name) || family_person_name == ''){
    $('#error_family_person_name').show();
  }
  if(family_person_age == ''){
    $('#error_family_person_age').show();
  }
  if(family_person_dob == ''){
    $('#error_family_person_dob').show();
  }
  if((relationship == 'Son' || relationship == 'Daughter' || relationship == 'Brother' || relationship == 'Sister') && guardian_name == '' && family_person_age < 18){
    $('#error_guardian_name').show();
  }

  if((relationship == 'Son' || relationship == 'Daughter' || relationship == 'Brother' || relationship == 'Sister') && (!guardian_name_format.test(guardian_name) || guardian_name == '')  && family_person_age < 18){
    $('#error_guardian_name').show();
  }

  if(relationship == '0' || !family_person_name_format.test(family_person_name) || family_person_name == '' || family_person_dob == '' || family_person_age == '' ||
(guardian_name == '' && family_person_age < 18)){

  }
  else {
     $('.valide').hide();

     var form_data = $('#family_member_form').serialize();
     $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/update_family_member",
       success: function (data){
         $('.clear').val('');
         $('.clear_dr').val(0);
         $('#guardian_div').hide();
         $('#update_family_member').addClass('d-none');
         $('#add_family_member').show();
         $("#success_update_member").show().delay(5000).fadeOut();

         var will_id = $('#will_id').val();
         $('.table_family_member').dataTable({
             'bDestroy': true
         }).fnDestroy(); // destroy table.

         var table = $('.table_family_member').DataTable({
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
                'page' : 'family_info'
              }
           },
         });
       }
     });
    }
});

// Check For Miner child have or not... and set in tbl_will table...
$('#family_next').click(function(){
  $.ajax({
    type: "post",
    url: base_url+"Will_controller/update_have_miner",
    success: function (data){
      window.location.href = base_url+"Will_controller/assets_info_view";
    }
  });
});
$('#family_previous').click(function(){
      window.location.href = base_url+"Will_controller/personal_info_view";
});
});

// End	Save/Add Family Member.. Datta...
