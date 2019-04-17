
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
  			"data":{ 'will_id' : will_id  }
  		},
  	});





// Family Member Js....
// datepicker.. set condition depend on age... calculate age.. show/hide Guardian...
$('#family_person_dob').datepicker({
  dateFormat: 'dd/mm/yy',//check change
  changeMonth: true,
  changeYear: true,
  onSelect: function(dateText, inst) {
    // Get Today date...
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
      //alert(years+' '+months);
      var title = $('#relationship').val();
      $('#age_div').show();
      $('#family_person_age').val(years+' Year '+months+' Month');
      if((title == 'Son' || title == 'Daughter') && years < 18){
        $('#guardian_div').show();
        $('#is_minar').val('1');

      }
      else{
        $('#guardian_name').val('');
        $('#guardian_address').val('');
        $('#guardian_div').hide();
      }
  }
});

//	Save/Add Family Member
$('#add_family_member').click(function(){
  var form_data = $('#family_member_form').serialize();
  $.ajax({
    data: form_data,
    type: "post",
    url: base_url+"Will_controller/save_family_member",
    success: function (data){
      $('.clear').val('');
      $('.clear_dr').val(0);
      $('#guardian_div').hide();



      var will_id = $('#will_id').val();
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

    }
  });
});

// Executor & Funeral JS........

//	Save/Add Executor... Datta...
$('#add_executor').click(function(){
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
});

//	Save/Add Funeral...
$('#add_funeral').click(function(){
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
});
// Executor & Funeral JS End........

//Assets JS Start...
// Bank Assets Fields change by selection of Bank assets Type...
  $('#assets_type').change(function(){
    var assets_type = $(this).val();
    $('#fd_recipt_No_div').hide();
    $('#key_number_div').hide();

    if(assets_type == 'Savings A/c'){
      $('.hide_num').hide();
      $('#account_no').show();

      $('.hide_name').hide();
      $('#bank_name').show();
    }
    else if (assets_type == 'Current A/C') {
      $('.hide_num').hide();
      $('#account_no').show();
      $('.hide_name').hide();
      $('#bank_name').show();
    }
    else if (assets_type == 'Fixed Deposits') {
      $('.hide_num').hide();
      $('#customer_id').show();
      $('.hide_name').hide();
      $('#bank_name').show();
      $('#fd_recipt_No_div').show();
    }
    else if (assets_type == 'PPF') {
      $('.hide_num').hide();
      $('#customer_id').show();
      $('.hide_name').hide();
      $('#company_name').show();
    }
    else if (assets_type == 'Bank Locker') {
      $('.hide_num').hide();
      $('#folio_no').show();
      $('.hide_name').hide();
      $('#bank_name').show();
      $('#key_number_div').show();
    }
    else if (assets_type == 'Mutual Funds') {
      $('.hide_num').hide();
      $('#customer_id').show();
      $('.hide_name').hide();
      $('#company_name').show();
    }
    else if (assets_type == 'Stock Equities') {
      $('.hide_num').hide();
      $('#serial_no').show();
      $('.hide_name').hide();
      $('#company_name').show();
    }
    else if (assets_type == 'Insurance Policy') {
      $('.hide_num').hide();
      $('#policy_no').show();
      $('.hide_name').hide();
      $('#insurance_company').show();
    }
    //alert(assets_type);
  });

  //	Save/Add Real Estate... Datta...
	$('#add_assets').click(function(){
		var form_data = $('#assets_form').serialize();
  	$.ajax({
  		data: form_data,
  		type: "post",
  		url: base_url+"Will_controller/save_assets",
  		success: function (data){

        $('.clear').val('');
        $('.clear_dr').val(0);
        // get and fill up Funeral...
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
			}
		});
	});

  //	Save/Add Bank Assets...
	$('#add_bank_assets').click(function(){
		var form_data = $('#bank_assets_form').serialize();
  	$.ajax({
  		data: form_data,
  		type: "post",
  		url: base_url+"Will_controller/save_bank_assets",
  		success: function (data){

        $('.clear').val('');
        $('.clear_dr').val(0);
        // get and fill up Funeral...
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
			}
		});
	});


  //	Save/Add Bank Assets...
  $('#add_vehicle_assets').click(function(){
    var form_data = $('#vehicle_assets_form').serialize();
    $.ajax({
      data: form_data,
      type: "post",
      url: base_url+"Will_controller/save_vehicle_assets",
      success: function (data){

        $('.clear').val('');
        $('.clear_dr').val(0);
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
      }
    });
  });

  //	Save/Add Bank Assets...
	$('#add_other_gift_assets').click(function(){
		var form_data = $('#other_gift_assets_form').serialize();
  	$.ajax({
  		data: form_data,
  		type: "post",
  		url: base_url+"Will_controller/save_other_gift_assets",
  		success: function (data){

        $('.clear').val('');
        $('.clear_dr').val(0);
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
			}
		});
	});
//Assets JS End...


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
  // datepicker.. set condition depend on age... calculate age.. show/hide Guardian...
  $('#family_person_dob').datepicker({
    dateFormat: 'dd/mm/yy',//check change
    changeMonth: true,
    changeYear: true,
    onSelect: function(dateText, inst) {
      // Get Today date...
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
        //alert(years+' '+months);
        var title = $('#relationship').val();
        $('#age_div').show();
        $('#family_person_age').val(years+' Year '+months+' Month');
        if((title == 'Son' || title == 'Daughter') && years < 18){
          $('#guardian_div').show();
          $('#is_minar').val('1');

        }
        else{
          $('#guardian_name').val('');
          $('#guardian_address').val('');
          $('#guardian_div').hide();
        }
    }
  });

	//	Save/Add Family Member
	$('#add_witness').click(function(){
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
