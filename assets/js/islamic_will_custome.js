
$(document).ready(function(){
// Executor & Funeral JS........
var will_id = $('#will_id').val();
//Assets JS Start...

















    

	//	Save/Add Family Member
	$('#add_witness').click(function(){
    var witness_name = $('#witness_name').val();
    var witness_address = $('#witness_address').val();

    if(witness_name == ''){
      $('#error_witness_name').show();
    }

    if(witness_address == ''){
      $('#error_witness_address').show();
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

	//Update Personal data...
	$('#destroy').click(function(){
		$.ajax({
			type: "post",
			url: base_url+"Will_controller/destroy_session",
			success: function (data){
				location.reload();
			}
		});
	});
});
