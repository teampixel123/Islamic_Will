$(document).ready(function(){
  var will_id = $('#will_id').val();

  $.ajax({
    url: base_url+"Will_controller/total_share_per",
    success: function (data){
      var info = JSON.parse(data);
      var prev_per = info['percentage'];
      var status = info['status'];
      var executor_count = info['executor_count'];
      var total_per = 100;
      var rem_per = total_per - prev_per;
      $('#rem_per').html('<b>'+rem_per+'% Remaining</b>');
      $('#rem_percent').val(rem_per);
      $('#executor_count').val(executor_count);
      // alert(executor_count);
    }
  });
// get and fill up executor...
function share_table(will_id){
  $('.table_share').dataTable({
      'bDestroy': true
  }).fnDestroy(); // destroy table.
  var table_share = $('.table_share').DataTable({
    "processing": true,
    "serverSide": true,
    "bFilter" : false,
    "bLengthChange": false,
    "bPaginate": false,
    "bInfo": false,
    "ajax":{
      "url": base_url+"Table_controller/share_list",
      "dataType": "json",
      "type": "POST",
      "data":{
        'will_id' : will_id,
        'page' : 'executor_info'
      }
    },
  });

  $('.table_share').on( 'draw.dt', function(){
     if (! table_share.data().any() ) {
        $('#executor_next').prop('disabled', true);
        $('.table_share').hide();
      }
      else{
         $('#executor_next').prop('disabled', false);
         $('.table_share').show();
      }
  });

}
function executor_table(will_id){
  $('.table_executor').dataTable({
      'bDestroy': true
  }).fnDestroy(); // destroy table.

  var table_executor = $('.table_executor').DataTable({
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
      "data":{
        'will_id' : will_id,
        'page' : 'executor_info'
      }
    },
  });
  $('.table_executor').on( 'draw.dt', function(){
     if (! table_executor.data().any() ) {
        $('#executor_next').prop('disabled', true);
       $('.table_executor').hide();
      }
      else{
         $('#executor_next').prop('disabled', false);
        $('.table_executor').show();
      }
  });
}
share_table(will_id);
executor_table(will_id);

// Share type Person/Organization.
$('input[type=radio][name=share_type').change(function() {
    if (this.value == 'Person') {
      $('#relation_div').show();
      $('#age_div').show();
      $('#share_name').attr("placeholder", "Firstname Middlename Lastname");
      $('.required').val('');
      $('#share_age').val('');
      $('#share_age').addClass('required');
      $('#update_share').addClass('d-none');
      $('#add_share').show();
    }
    else if (this.value == 'Organization') {
      $('#relation_div').hide();
      $('#age_div').hide();
      $('#share_name').attr("placeholder", "Enter Organization/Trust Name");
      $('.required').val('');
      $('#share_relation').val('Organization');
      $('#share_age').removeClass('required');
      $('#share_age').val('-1');
      $('#update_share').addClass('d-none');
      $('#add_share').show();
      $('#guardian_div').hide();
      $('#guardian_name').val('');
      $('#guardian_address').val('');
      $('#guardian_age').val('');

      $('#opt_guardian_div').hide();
      $('#opt_guardian_name').val('');
      $('#opt_guardian_address').val('');
      $('#opt_guardian_age').val('');
    }
});

//Show Guardian div..
$('#share_age').keyup(function(){
  var share_age = $('#share_age').val();
  if(share_age>0 && share_age<18){
    $('#guardian_div').show();
  }
  else{
    $('#guardian_div').hide();
    $('#guardian_name').val('');
    $('#guardian_address').val('');
    $('#guardian_age').val('');
  }
});
$('#add_opt_guardian').change(function(){
  if ($(this).prop('checked')) {
    $('#opt_guardian_div').show();
  }
  else{
    $('#opt_guardian_name').val('');
    $('#opt_guardian_address').val('');
    $('#opt_guardian_age').val('');
    $('#opt_guardian_div').hide();
  }
});
// // get and fill up Funeral...
// $('.table_funeral').dataTable({
//     'bDestroy': true
// }).fnDestroy(); // destroy table.
//
// var table_funeral = $('.table_funeral').DataTable({
//   "processing": true,
//   "serverSide": true,
//   "bFilter" : false,
//   "bLengthChange": false,
//   "bPaginate": false,
//   "bInfo": false,
//   "ajax":{
//     "url": base_url+"Table_controller/funeral_list",
//     "dataType": "json",
//     "type": "POST",
//     "data":{
//       'will_id' : will_id,
//       'page' : 'executor_info'
//     }
//   },
// });
// $('.table_funeral').on( 'draw.dt', function(){
//    if (! table_funeral.data().any() ) {
//      $('.table_funeral').hide();
//     }
//     else{
//       $('.table_funeral').show();
//     }
// });

// Distribution of 1/3 Share validation
  $('#add_share').click(function(){
    var share_relation = $('#share_relation').val();
    var share_name = $('#share_name').val();
    var share_address = $('#share_address').val();
    var share_percentage = $('#share_percentage').val();
    var radioValue = $("input[name='share_type']:checked"). val();
    if(radioValue == 'Organization'){
      $('#share_age').val('-1');
    }
    var share_age = $('#share_age').val();
    var guardian_name = $('#guardian_name').val();
    var guardian_address = $('#guardian_address').val();
    var guardian_age = $('#guardian_age').val();
    var opt_guardian_name = $('#opt_guardian_name').val();
    var opt_guardian_age = $('#opt_guardian_age').val();
    var opt_guardian_address = $('#opt_guardian_address').val();

    if($('#add_opt_guardian').prop('checked') == true){
      var add_opt_guardian = 'on';
    }
    else{
      var add_opt_guardian = 'off';
    }

    $('.required').each(function(){
      var val = $(this).val();
      if(val == '' || val == '0'){
        $(this).addClass('required-input');
      }
      else{
        $(this).removeClass('required-input');
      }
    });

    $('#share_relation, #share_name, #share_address, #share_age, #share_percentage').each(function(){
      var val = $(this).val();
      if(val == ''){
        $(this).addClass('required-input');
      }
      else{
        $(this).removeClass('required-input');
      }
    });

    if(share_relation == '' || share_name == '' || share_address == '' || share_age == '' || share_percentage == '0' || share_percentage == '' ||
    (radioValue == 'Person' && (share_age <0 || share_age >120 )) || (guardian_name == '' && share_age < 18 && share_age > 0) || (share_age < 18 && share_age > 0 && (guardian_age >120 || guardian_age <18)) || (add_opt_guardian == 'on' && opt_guardian_name == '' && share_age < 18 && share_age > 0)
    || (add_opt_guardian == 'on' && (opt_guardian_age >120 || opt_guardian_age <18))){
      // blank...
    }
    else{
      $(".required").removeClass('required-input');
      $('#guardian_div').hide();
      $('#opt_guardian_div').hide();
      $("#save_load_modal").modal("show");
      var form_data = $('#share_form').serialize();
      $.ajax({
        data: form_data,
        type: "post",
        url: base_url+"Will_controller/save_share_distribution",
        success: function (data){
          $('.clear').val('');
          var will_id = $('#will_id').val();
          // get and fill up share info...
          share_table(will_id);
          var info = JSON.parse(data);
          var prev_per = info['percentage'];
          var status = info['status'];
          var total_per = 100;
          var rem_per = total_per - prev_per;
          $('#rem_per').html('<b>'+rem_per+'% Remaining</b>');
          $('#rem_percent').val(rem_per);
          if(status == 'error'){
            $('#success_note').html('<span style="color:red;">Invalide Percentage value. Not saved. '+rem_per+'% remaining</span>');
            $("#success_note").show().delay(8000).fadeOut();
          }
          else{
            $('#success_note').html('<span style="color:green;">Distribution of Share added successfully.</span>');
            $("#success_note").show().delay(5000).fadeOut();
          }
          $('#save_load_modal').on('shown.bs.modal', function(e) {
            $("#save_load_modal").modal("hide");
          });
          // alert();
        }
      });
    }
  });

  $('#update_share').click(function(){
    var share_relation = $('#share_relation').val();
    var share_name = $('#share_name').val();
    var share_address = $('#share_address').val();
    var share_percentage = $('#share_percentage').val();
    var radioValue = $("input[name='share_type']:checked"). val();
    if(radioValue == 'Organization'){
      $('#share_age').val('-1');
    }
    var share_age = $('#share_age').val();
    var guardian_name = $('#guardian_name').val();
    var guardian_address = $('#guardian_address').val();
    var guardian_age = $('#guardian_age').val();
    var opt_guardian_name = $('#opt_guardian_name').val();
    var opt_guardian_age = $('#opt_guardian_age').val();
    var opt_guardian_address = $('#opt_guardian_address').val();

    if($('#add_opt_guardian').prop('checked') == true){
      var add_opt_guardian = 'on';
    }
    else{
      var add_opt_guardian = 'off';
    }

    $('#share_relation, #share_name, #share_address, #share_age, #share_percentage').each(function(){
      var val = $(this).val();
      if(val == ''){
        $(this).addClass('required-input');
      }
      else{
        $(this).removeClass('required-input');
      }
    });
    $('.required').each(function(){
      var val = $(this).val();
      if(val == '' || val == '0'){
        $(this).addClass('required-input');
      }
      else{
        $(this).removeClass('required-input');
      }
    });

    if(share_relation == '' || share_name == '' || share_address == '' || share_age == '' || share_percentage == '0' || share_percentage == '' ||
    (radioValue == 'Person' && (share_age <0 || share_age >120 )) || (guardian_name == '' && share_age < 18 && share_age > 0) || (share_age < 18 && share_age > 0 && (guardian_age >120 || guardian_age <18)) || (add_opt_guardian == 'on' && opt_guardian_name == '' && share_age < 18 && share_age > 0)
    || (add_opt_guardian == 'on' && (opt_guardian_age >120 || opt_guardian_age <18))){
      // blank...
    }
    else{
      $(".required").removeClass('required-input');
      $('#guardian_div').hide();
      $('#opt_guardian_div').hide();
      $("#save_load_modal").modal("show");
      var form_data = $('#share_form').serialize();
      $.ajax({
        data: form_data,
        type: "post",
        url: base_url+"Will_controller/update_share_distribution",
        success: function (data){
          $('.clear').val('');
          $('#update_share').addClass('d-none');
          $('#add_share').show();
          var will_id = $('#will_id').val();
          // get and fill up share info...
          share_table(will_id);
          var info = JSON.parse(data);
          var prev_per = info['percentage'];
          var status = info['status'];
          var total_per = 100;
          var rem_per = total_per - prev_per;
          $('#rem_per').html('<b>'+rem_per+'% Remaining</b>');
          $('#rem_percent').val(rem_per);
          if(status == 'error'){
            $('#success_note').html('<span style="color:red;">Invalide Percentage value. Not saved. '+rem_per+'% remaining</span>');
            $("#success_note").show().delay(8000).fadeOut();
          }
          else{
            $('#success_note').html('<span style="color:green;">Distribution of Share updated successfully.</span>');
            $("#success_note").show().delay(5000).fadeOut();
          }
          $('#save_load_modal').on('shown.bs.modal', function(e) {
            $("#save_load_modal").modal("hide");
          });
          // alert();
        }
      });
    }
  });
//	Save/Add Executor... Datta...
$('#add_executor').click(function(){
  var executor_count = $('#executor_count').val();

    var executor_name = $('#executor_name').val();
    var executor_address = $('#executor_address').val();
    var executor_age = $('#executor_age').val();

    $('#executor_name, #executor_address, #executor_age').each(function(){
      var val = $(this).val();
      if(val == ''){
        $(this).addClass('required-input');
      }
    });

    if(executor_name == '' || executor_address == '' || executor_age == '' || executor_age < 18 || executor_age > 100){
      // blank...
    }
    else {
      if(executor_count == '2'){
        var x = document.getElementById("snackbar");
        x.className = "show_error";
        $('#snackbar').html('You can enter only 2 executors');
        setTimeout(function(){ x.className = x.className.replace("show_error", ""); }, 5000);
      }
      else{
        $("#save_load_modal").modal("show");
        $('.required').removeClass('invalide-input');
        $('.required').removeClass('required-input');
      var form_data = $('#executor_form').serialize();
      $.ajax({
        data: form_data,
        type: "post",
        url: base_url+"Will_controller/save_executor",
        success: function (data){
          $('.clear').val('');
          $('.clear_dr').val(0);
          var will_id = $('#will_id').val();

          var info = JSON.parse(data);
          var executor_count = info['executor_count'];
          $('#executor_count').val(executor_count);


          // get and fill up executor...
          executor_table(will_id);
          $('#save_load_modal').on('shown.bs.modal', function(e) {
            $("#save_load_modal").modal("hide");
          });
          $('#success_note_executor').html('<span style="color:green;">Executor added successfully.</span>');
          $("#success_note_executor").show().delay(5000).fadeOut();
        }
      });
    }
  }

});

//	Update Executor... Datta...
$('#update_executor').click(function(){
  var executor_name = $('#executor_name').val();
  var executor_address = $('#executor_address').val();
  var executor_age = $('#executor_age').val();

  $('#executor_name, #executor_address, #executor_age').each(function(){
    var val = $(this).val();
    if(val == ''){
      $(this).addClass('invalide-input');
    }
  });

  if(executor_name == '' || executor_address == '' || executor_age == '' || executor_age < 18 || executor_age > 100){
    // blank...
  }
  else {
      $("#save_load_modal").modal("show");
      $('#add_executor').show();
      $('#update_executor').addClass('d-none');;
    var form_data = $('#executor_form').serialize();
    $.ajax({
      data: form_data,
      type: "post",
      url: base_url+"Will_controller/update_executor",
      success: function (data){
        $('.clear').val('');
        var will_id = $('#will_id').val();
        // get and fill up executor...
        executor_table(will_id);
        $('#save_load_modal').on('shown.bs.modal', function(e) {
          $("#save_load_modal").modal("hide");
        });
        $('#success_note_executor').html('<span style="color:green;">Executor updated successfully.</span>');
        $("#success_note_executor").show().delay(5000).fadeOut();
      }
    });
  }
});

//	Save/Add Funeral...
// $('#add_funeral').click(function(){
//   var funeral_name = $('#funeral_name').val();
//   var funeral_address = $('#funeral_address').val();
//
//   if(funeral_name == ''){
//     $('#error_funeral_name').show();
//   }
//   if(funeral_address == ''){
//     $('#error_funeral_address').show();
//   }
//   else {
//       $('.valide').hide();
//
//       var form_data = $('#funeral_form').serialize();
//       $.ajax({
//         data: form_data,
//         type: "post",
//         url: base_url+"Will_controller/save_funeral",
//         success: function (data){
//           $('.clear').val('');
//           $('.clear_dr').val(0);
//           $('#guardian_div').hide();
//           // get and fill up Funeral...
//           $('.table_funeral').dataTable({
//               'bDestroy': true
//           }).fnDestroy(); // destroy table.
//
//           var table_funeral = $('.table_funeral').DataTable({
//             "processing": true,
//             "serverSide": true,
//             "bFilter" : false,
//             "bLengthChange": false,
//             "bPaginate": false,
//             "bInfo": false,
//             "ajax":{
//               "url": base_url+"Table_controller/funeral_list",
//               "dataType": "json",
//               "type": "POST",
//               "data":{
//                 'will_id' : will_id,
//                 'page' : 'executor_info'
//               }
//             },
//           });
//           $('.table_funeral').on( 'draw.dt', function(){
//              if (! table_funeral.data().any() ) {
//                 // $('#executor_next').prop('disabled', true);
//                $('.table_funeral').hide();
//               }
//               else{
//                   // $('#executor_next').prop('disabled', false);
//                 $('.table_funeral').show();
//               }
//           });
//         }
//       });
//   }
// });

$('.personal-tab').click(function(){
  window.location.href = base_url+"Will_controller/personal_info_view";
});
$('.family-tab').click(function(){
  window.location.href = base_url+"Will_controller/family_info_view";
});
$('.assets-tab').click(function(){
  window.location.href = base_url+"Will_controller/assets_info_view";
});
$('.executor-tab').click(function(){
  window.location.href = base_url+"Will_controller/executor_funeral_view";
});

$('#executor_previous').click(function(){
    window.location.href = base_url+"Will_controller/assets_info_view";
});
$('#executor_next').click(function(){
    var rem_percent = $('#rem_percent').val();
    var executor_count = $('#executor_count').val();
    if(rem_percent > 0){
      $('.alert-danger').html('<b> Complete 100% Sharing. '+rem_percent+'% remaining.</b>');
      $('.alert-danger').show().delay(5000).fadeOut();
    }
    else if (executor_count == 0) {
      var x = document.getElementById("snackbar");
      x.className = "show_error";
      $('#snackbar').html('Enter Executor Information');
      setTimeout(function(){ x.className = x.className.replace("show_error", ""); }, 5000);
    }
    else{
      window.location.href = base_url+"Will_controller/witness_info_view";
    }

});
// Executor & Funeral JS End........
});
