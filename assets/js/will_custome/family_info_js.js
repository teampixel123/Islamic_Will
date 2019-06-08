$(document).ready(function(){
  var will_id = $('#will_id').val();

  // get and fill up family member list...
function family_member_table(will_id){
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
}
family_member_table(will_id);

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

// Age... JQuery... Datta...
$('#family_person_age').keyup(function(e){
  var age = $(this).val();
  var relationship = $('#relationship').val();
  if(age<18 && age>0 && (relationship == 'Son' || relationship == 'Daughter' || relationship == 'Brother' || relationship == 'Sister')){
    $('#guardian_div').show();
    $('#is_minar').val('1');
  }
  if(age>=18 || age == ''){
    $('#guardian_div').hide();
    $('#is_minar').val('0');
    $('.minor').val('');
    $(this).removeClass('invalide-input');
  }
  if(age<18 && (relationship != 'Son' && relationship != 'Daughter' && relationship != 'Brother' && relationship != 'Sister')){
    $(this).addClass('invalide-input');
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
  //$('#family_person_dob').val('');
  $('#family_person_name').val('');
  $('#family_person_age').val('');
  $('.minor').val('');
  $('.clear').removeClass('invalide-input');
  $('#guardian_div').hide();
  //$('#invalide_family_person_dob').hide();
});
// $('#family_person_dob').datetimepicker().on('changeDate', function(ev){
//   var today = new Date();
//   var dd = today.getDate();
//   var mm = today.getMonth() + 1; //January is 0!
//   var yyyy = today.getFullYear();
//   if (dd < 10) {
//     dd = '0' + dd;
//   }
//   if (mm < 10) {
//     mm = '0' + mm;
//   }
//   var today2 = dd + '/' + mm + '/' + yyyy;
//   // Get Today date end...
//   var birthdate2 = $(this).val();
//     var today = moment(today2,'DD/MM/YYYY');
//     var birthdate = moment(birthdate2,'DD/MM/YYYY');
//
//     var years = today.diff(birthdate, 'year');
//     birthdate.add(years, 'years');
//     var months = today.diff(birthdate, 'months');
//     birthdate.add(months, 'months');
//     if(months == 0){ var months = 1;}
//     //alert(years+' '+months);
//     var title = $('#relationship').val();
//     $('#age_div').show();
//
//     if(years > 0){
//       $('#family_person_age').val(years);
//       $('#family_person_age_format').val('Year');
//     }
//     else{
//       $('#family_person_age').val(months);
//       $('#family_person_age_format').val('Month');
//     }
//
//     if((title == 'Father' || title == 'Mother' || title == 'Spouse' || title == 'Grand Father' || title == 'Grand Mother') && years < 18){
//       $('#invalide_family_person_dob').show();
//       $('#family_person_dob').val('');
//       $('#age_div').hide();
//     }
//     if(years >= 18){
//       $('#is_minar').val('0');
//       $('#invalide_family_person_dob').hide();
//       $('#guardian_name').val('');
//       $('#guardian_address').val('');
//       $('#mother_of_minar').val('');
//       $('#guardian_div').hide();
//     }
//     if((title == 'Son' || title == 'Daughter' || title == 'Brother' || title == 'Sister') && years < 18){
//       $('#guardian_div').show();
//       $('#is_minar').val('1');
//     }
//     else{
//       $('#guardian_name').val('');
//       $('#guardian_address').val('');
//       $('#mother_of_minar').val('');
//       $('#guardian_div').hide();
//     }
// });



//  strat ob blur validation asif
// $("#relationship").blur(function(){
//   var relationship = $('#relationship').val();
//   if(relationship == '0'){
//     $('#error_relationship').show();
//   }
//   else{
//       $('#error_relationship').hide();
//     }
// });

// $("#family_person_name").blur(function(){
//   var family_person_name = $('#family_person_name').val();
//   var family_person_name_format =  /^[a-zA-Z ]*$/;
//   if(!family_person_name_format.test(family_person_name) || family_person_name == ''){
//     $('#error_family_person_name').show();
//   }
//   else{
//       $('#error_family_person_name').hide();
//     }
// });






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

  $('.required').each(function(){
    var val = $(this).val();
    if(val == ''){
      $(this).addClass('invalide-input');
    }
  });

  if(relationship == '0' || !family_person_name_format.test(family_person_name) || family_person_name == '' || family_person_dob == '' || family_person_age == '' ||
(guardian_name == '' && family_person_age < 18)){

  }
  else {
     var form_data = $('#family_member_form').serialize();
     $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/save_family_member",
       success: function (data){
         $('.clear').val('');
         $('.clear_dr').val(0);
         $('#guardian_div').hide();

         var info = JSON.parse(data);
         if(info == 'max_father'){
           $("#success_save_member").html('<span style="color:red;">*Father information already exist. Not saved.</span>')
           $("#success_save_member").show().delay(5000).fadeOut();
         }
         else if(info == 'max_mother'){
           $("#success_save_member").html('<span style="color:red;">*Can not insert mother information.</span>')
           $("#success_save_member").show().delay(5000).fadeOut();
         }
         else if (info == 'success') {
           $("#success_save_member").html('<span style="color:green;">*Information Saved successfully.</span>')
           $("#success_save_member").show().delay(5000).fadeOut();
         }
         //alert(info);

         var will_id = $('#will_id').val();
         family_member_table(will_id);
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
$('.personal-tab').click(function(){
  window.location.href = base_url+"Will_controller/personal_info_view";
});
$('.family-tab').click(function(){
  window.location.href = base_url+"Will_controller/family_info_view";
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
