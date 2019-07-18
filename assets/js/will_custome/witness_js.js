$(document).ready(function(){
  var will_id = $('#will_id').val();

  $.ajax({
    data: { 'will_id' : will_id  },
    type: "post",
    url: base_url+"Will_controller/get_will_data",
    success: function (data){
			// $('#save_load_modal').modal('hide');
      var info = JSON.parse(data);
      var place = info[0]['will_place'];
      if(place == ''){
        $('#table_date_place').hide();
        $('#btn_final_pdf, #btn_pdf, #btn_final_pdf_owner, #btn_pdf_blur').prop('disabled', true);
      }
      else{
        $('#table_date_place').show();
        var date_place = 'Date: '+info[0]['will_date']+', Place: '+info[0]['will_place'];
        $('#date_place_td').text(date_place);
        $('#date_place_txt').val(date_place);

        $('#btn_final_pdf, #btn_pdf, #btn_final_pdf_owner, #btn_pdf_blur').prop('disabled', false);
      }
    }
  });

// Fill up personal data on page load...
function witness_table(will_id){
  // get and fill up Witness Info...
  $('.table_witness').dataTable({
      'bDestroy': true
  }).fnDestroy(); // destroy table.

  var table_witness = $('.table_witness').DataTable({
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
      "data":{
        'will_id' : will_id,
        'page' : 'witness_info'
      }
    },
  });
  $('.table_witness').on( 'draw.dt', function(){
     if (! table_witness.data().any() ) {
       $('#btn_final_pdf, #btn_pdf, #btn_final_pdf_owner, #btn_pdf_blur').prop('disabled', true);
       $('.table_witness').hide();
      }
      else{
        $('#btn_final_pdf, #btn_pdf, #btn_final_pdf_owner, #btn_pdf_blur').prop('disabled', false);
        $('.table_witness').show();
      }
  });
}

function date_place_table(){
  $('.table_date_place').dataTable({
      'bDestroy': true
  }).fnDestroy();
  var table_date_place = $('.table_date_place').DataTable({
    "processing": true,
    "bFilter" : false,
    "bLengthChange": false,
    "bPaginate": false,
    "bInfo": false,
  });
  $('.table_date_place').on( 'draw.dt', function(){
     if (! table_date_place.data().any() ) {
       $('#btn_final_pdf, #btn_pdf, #btn_final_pdf_owner, #btn_pdf_blur').prop('disabled', true);
       $('.table_date_place').hide();
      }
      else{
        $('#btn_final_pdf, #btn_pdf, #btn_final_pdf_owner, #btn_pdf_blur').prop('disabled', false);
        $('.table_date_place').show();
      }
  });
}




witness_table(will_id);
date_place_table();
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

$('#btn_final_pdf').click(function(){
  var date_place_txt = $('#date_place_txt').val();
  // alert(date_place_td);
  if(date_place_txt == ''){
    alert('Enter Date and Place');
  }
  else{
    $('#final_pdf').submit();
    window.location.replace(base_url+"User-Dashboard");
  }
});

$('#btn_final_pdf_owner').click(function(){
  var date_place_txt = $('#date_place_txt').val();
  // alert(date_place_td);
  if(date_place_txt == ''){
    alert('Enter Date and Place');
  }
  else{
    $('#final_pdf_owner').submit();
    window.location.replace(base_url+"Owner-Will-List");
  }
});
$('#btn_pdf_blur').click(function(){
  var date_place_txt = $('#date_place_txt').val();
  if(date_place_txt == ''){
    alert('Enter Date and Place');
  }
  else{
    $('#pdf').submit();
    window.location.replace(base_url+"User-Dashboard");
  }
});
$('#btn_pdf').click(function(){
  var date_place_txt = $('#date_place_txt').val();
  if(date_place_txt == ''){
    alert('Enter Date and Place');
  }
  else{
    $('#pdf').submit();
    window.location.replace(base_url+"Login");
  }
});

//	Save/Add Family Member
$('#add_witness').click(function(){
  var witness_name = $('#witness_name').val();
  var witness_address = $('#witness_address').val();

  $('#witness_name, #witness_address').each(function(){
    var val = $(this).val();
    if(val == ''){
      $(this).addClass('required-input');
    }
  });

  if(witness_name == '' || witness_address == ''){
    // Blank....
  }
  else {
    $('#save_load_modal').modal('show');
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
        witness_table(will_id);
        $('#save_load_modal').on('shown.bs.modal', function(e) {
          $("#save_load_modal").modal("hide");
        });
      }
    });
  }
});

//Date and Place...
// validation start asif//

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

  $('#will_date, #will_place').each(function(){
    var val = $(this).val();
    if(val == ''){
      $(this).addClass('required-input');
    }
  });

  if(will_date == '' || will_place == ''){

  }
  else{
    $('#save_load_modal').modal('show');

    var form_data = $('#date_place_form').serialize();
    $.ajax({
      data: form_data,
      type: "post",
      url: base_url+"Will_controller/save_date_place_info",
      success: function (data){
        var info = JSON.parse(data);
        var place = info[0]['will_place'];
        if(place == ''){
          $('#table_date_place').hide();
          $('#btn_final_pdf, #btn_pdf, #btn_final_pdf_owner, #btn_pdf_blur').prop('disabled', true);
        }
        else{
          $('#table_date_place').show();
          var date_place = 'Date: '+info[0]['will_date']+', Place: '+info[0]['will_place'];
          $('#date_place_td').text(date_place);
          $('#date_place_txt').val(date_place);
          $('#btn_final_pdf, #btn_pdf, #btn_final_pdf_owner, #btn_pdf_blur').prop('disabled', false);
        }
         $('.clear').val('');
        // $('.clear_dr').val(0);
        $('#save_load_modal').on('shown.bs.modal', function(e) {
          $("#save_load_modal").modal("hide");
        });
        $('.required').removeClass('invalide-input');
        $('.required').removeClass('required-input');
        $('.required').attr("placeholder", "");
        //$('#will_date').removeClass('required-input');
      }
    });
  }
});

$('#witness_previous').click(function(){
    window.location.href = base_url+"Will_controller/executor_funeral_view";
});

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
$('.witness-tab').click(function(){
  window.location.href = base_url+"Will_controller/witness_info_view";
});
});
