<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Table_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Table_Model');
    }

    public function family_member_list(){
      $columns = array(
					0 =>'`id`',
			);
      $limit = $this->input->post('length');
			$start = $this->input->post('start');
			$order = $columns[$this->input->post('order')[0]['column']];
			$dir = $this->input->post('order')[0]['dir'];
			$will_id = $this->input->post('will_id');
      $page = $this->input->post('page');
      $totalData = $this->Table_Model->countFamilyMembarRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
      $data = array();
      //echo print_r($page);
      if(!empty($posts))
			{
				$id=$start;
				foreach ($posts as $post)
				{
					$id++;
          $memberId = $post->id;
          $will_id = $post->will_id;
					$relationship = $post->relationship;
					$family_person_name = $post->family_person_name;
					$family_person_dob = $post->family_person_dob;
					$family_person_age = $post->family_person_age;
          $family_person_age_format = $post->family_person_age_format;
					$is_minar = $post->is_minar;
					$mother_of_minar = $post->mother_of_minar;
					$guardian_name_title = $post->guardian_name_title;
					$guardian_name = $post->guardian_name;
          $guardian_age = $post->guardian_age;
					$guardian_address = $post->guardian_address;
					$opt_guardian_title = $post->opt_guardian_title;
					$opt_guardian_name = $post->opt_guardian_name;
					$opt_guardian_age = $post->opt_guardian_age;
					$opt_guardian_address = $post->opt_guardian_address;

          if($is_minar == 1){
            $info = "</br>Guardian: ".$guardian_name.", Address:".$guardian_address;
          }
          else{
            $info = "";
          }
          //if($page == 'family_info'){
            $edit_button = "<a id='family_member_edit".$id."'  class='badge1 badge-pill '  title='Edit Family Member'> <i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>";
        //  }
        //  else{
        //    $edit_button = "";
        //  }

          $nestedData = array();
          //if($is_minar == 0){
            $nestedData[] = "<div class='row'><div class='col-md-9'>".$id.") Name: ".$family_person_name.", Relationship: ".$relationship.", Age: ".$family_person_age." ".$info."
            </div>
            <div class='col-md-3 p-0'>
              <button type='button' style='width:80%' class='badge1 ' title='Delete Family Member'>
                <a  class='badge1 badge-pill'  title='Delete Family Member' data-toggle='modal' data-target='#delete_modal_".$id."'>
                  <i class='fa fa-trash' aria-hidden='true'  style='font-size:15px; width:15px;'></i>
                </a>
                ".$edit_button."
              </button>
            </div></div>

            <div class='modal fade' id='delete_modal_".$id."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Do you want to delete</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <p>Relationship : ".$relationship."</p>
                    <p>Name : ".$family_person_name."</p>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                    <button type='button' id='family_member_delete".$id."' class='btn btn-primary' data-dismiss='modal'>Delete</button>
                  </div>
                </div>
              </div>
            </div>


            <hr>
            <script>
              $('#family_member_delete".$id."').click(function(e){
                $.ajax({
                  data:{ 'id' : ".$memberId."  },
                  type: 'post',
                  url: '".base_url()."Will_controller/delete_family_member',
                  success: function (data){
                    $('.table_family_member').dataTable({
                      'bDestroy': true
                    }).fnDestroy(); // destroy table.

                    var table =   $('.table_family_member').DataTable({
                      'processing': true,
                      'serverSide': true,
                      'bFilter' : false,
                      'bLengthChange': false,
                      'bPaginate': false,
                      'bInfo': false,
                      'ajax':{
                         'url': '".base_url()."Table_controller/family_member_list',
                         'dataType': 'json',
                         'type': 'POST',
                         'data':{ 'will_id' : ".$will_id."  }
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
              });

              $('#family_member_edit".$id."').click(function(){
                var opt_guardian_name = '$opt_guardian_name';
                $('#add_family_member').hide();
                $('#update_family_member').removeClass('d-none');
                $('#age_div').show();
                if($is_minar == 1){
                  $('#guardian_div').show();
                }
                if(opt_guardian_name != ''){
                  $('#opt_guardian_div').show();
                  $('#add_opt_guardian').prop('checked', true);
                }
                $('#memberId').val('$memberId');
                $('#relationship').val('$relationship');
                $('#family_person_name').val('$family_person_name');
                $('#family_person_dob').val('$family_person_dob');
                $('#family_person_age').val('$family_person_age');
                $('#family_person_age_format').val('$family_person_age_format');
                $('#is_minar').val('$is_minar');
                $('#mother_of_minar').val('$mother_of_minar');
                $('#guardian_name_title').val('$guardian_name_title');
                $('#guardian_name').val('$guardian_name');
                $('#guardian_age').val('$guardian_age');
                $('#guardian_address').val('$guardian_address');
                $('#opt_guardian_title').val('$opt_guardian_title');
                $('#opt_guardian_name').val('$opt_guardian_name');
                $('#opt_guardian_age').val('$opt_guardian_age');
                $('#opt_guardian_address').val('$opt_guardian_address');
              });

            </script>
            ";
          $data[] = $nestedData;
        }
      }
      $json_data = array(
						"draw"            => intval($this->input->post('draw')),
						"recordsTotal"    => intval($totalData),
						"recordsFiltered" => intval($totalFiltered),
						"data"            => $data
						);
			echo json_encode($json_data);
    }

  // 1/3 share distribution list.
  public function share_list(){
    $columns = array(
        0 =>'`id`',
    );
    $limit = $this->input->post('length');
    $start = $this->input->post('start');
    $order = $columns[$this->input->post('order')[0]['column']];
    $dir = $this->input->post('order')[0]['dir'];
    $will_id = $this->input->post('will_id');
    $totalData = $this->Table_Model->countShareRows($will_id);
    $totalFiltered = $totalData;
    $posts = $this->Table_Model->getAllShareDataAjax($will_id);
    $data = array();
    if(!empty($posts))
    {
      $id=$start;
      foreach ($posts as $post)
      {
        $id++;
        $memberId = $post->id;
        $share_relation = $post->share_relation;
        $share_name = $post->share_name;
        $share_age = $post->share_age;
        $share_address = $post->share_address;
        $share_percentage = $post->share_percentage;
        $guardian_name_title = $post->guardian_name_title;
        $guardian_name = $post->guardian_name;
        $guardian_age = $post->guardian_age;
        $guardian_address = $post->guardian_address;
        $opt_guardian_title = $post->opt_guardian_name_title;
        $opt_guardian_name = $post->opt_guardian_name;
        $opt_guardian_age = $post->opt_guardian_age;
        $opt_guardian_address = $post->opt_guardian_address;

        if($share_relation == 'Organization'){
          $age = '';
        }else{
          $age = ' Age: '.$share_age.'';
        }
        $edit_button = "";
        $nestedData = array();
          $nestedData[] = "<div class='row'>
            <div class='col-md-9'>".$id.") <b>".$share_relation."</b>: ".$share_name.", ".$age.", Address: ".$share_address.", share: <span class='percent'>".$share_percentage."<span>%
            </div>
            <div class='col-md-3'>
              <button type='button' class='badge1 badge-pill badge-danger' >
                <a id='' class='badge1'  title='Delete Family Member' data-toggle='modal' data-target='#share_delete_modal_".$id."'>
                  <i class='fa fa-trash' aria-hidden='true'  style='font-size:15px; width:15px;'></i>
                </a>
                <a id='share_edit".$id."'  class='badge1 badge-pill '  title='Edit Family Member'>
                  <i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i>
                </a>
              </button>
            </div>
          </div>
          <hr>
          <div class='modal fade' id='share_delete_modal_".$id."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title' id='exampleModalLabel'>Do you want to delete</h5>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>
                <div class='modal-body'>
                  <p>Relationship : ".$share_relation."</p>
                  <p>Name : ".$share_name."</p>
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                  <button type='button' id='share_delete".$id."' class='btn btn-primary' data-dismiss='modal'>Delete</button>
                </div>
              </div>
            </div>
          </div>


          <script>
            $('#share_delete".$id."').click(function(e){
              //alert();
                $.ajax({
                  data:{ 'id' : ".$memberId."  },
                  type: 'post',
                  url: '".base_url()."Will_controller/delete_share',
                  success: function (data){
                    var info = JSON.parse(data);
                    var prev_per = info['percentage'];
                    var total_per = 100;
                    var rem_per = total_per - prev_per;
                    $('#rem_per').html('<b>'+rem_per+'% Remaining</b>');
                    $('#rem_percent').val(rem_per);

                    $('.table_share').dataTable({
                          'bDestroy': true
                      }).fnDestroy(); // destroy table.

                    var table_share = $('.table_share').DataTable({
                      'processing': true,
                      'serverSide': true,
                      'bFilter' : false,
                      'bLengthChange': false,
                      'bPaginate': false,
                      'bInfo': false,
                      'ajax':{
                         'url': '".base_url()."Table_controller/share_list',
                         'dataType': 'json',
                         'type': 'POST',
                         'data':{ 'will_id' : ".$will_id."  }
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
                });
            });
            $('#share_edit".$id."').click(function(e){
              $('#add_share').hide();
              $('#update_share').removeClass('d-none');
              var relation = '$share_relation';
              if(relation == 'Organization'){
                $('#organization').prop('checked', true);
                $('#share_relation').val('Organization');
                $('#relation_div').hide();
                $('#age_div').hide();
                $('#share_name').attr('placeholder', 'Enter Organization/Trust Name');
                $('.required').val('');
                $('#share_relation').val('Organization');
                $('#share_age').removeClass('required');
                $('#share_age').val('-1');
              }
              else{
                $('#person').prop('checked', true);
                $('#relation_div').show();
                $('#age_div').show();
                $('#share_relation').val('$share_relation');
                $('#share_name').attr('placeholder', 'Firstname Middlename Lastname');
                $('#share_age').addClass('required');
              }

              var guardian_name = '$guardian_name';
              var opt_guardian_name = '$opt_guardian_name';
              if(guardian_name != ''){
                $('#guardian_div').show();
              }
              else{
                $('#guardian_div').hide();
              }
              if(opt_guardian_name != ''){
                $('#opt_guardian_div').show();
                $('#add_opt_guardian').prop('checked', true);
              }
              else{
                $('#opt_guardian_div').hide();
                $('#add_opt_guardian').prop('checked', false);
              }

              $('#share_id').val('$memberId');
              $('#share_percentage').val('$share_percentage');
              $('#share_name').val('$share_name');
              $('#share_address').val('$share_address');
              $('#share_age').val('$share_age');
              $('#prev_share_percentage').val('$share_percentage');
              $('#guardian_name_title').val('$guardian_name_title');
              $('#guardian_name').val('$guardian_name');
              $('#guardian_age').val('$guardian_age');
              $('#guardian_address').val('$guardian_address');
              $('#opt_guardian_title').val('$opt_guardian_title');
              $('#opt_guardian_name').val('$opt_guardian_name');
              $('#opt_guardian_age').val('$opt_guardian_age');
              $('#opt_guardian_address').val('$opt_guardian_address');


            });
          </script>
          ";
        $data[] = $nestedData;
      }
    }
    $json_data = array(
          "draw"            => intval($this->input->post('draw')),
          "recordsTotal"    => intval($totalData),
          "recordsFiltered" => intval($totalFiltered),
          "data"            => $data
          );
    echo json_encode($json_data);
  }

// executor List Table...
    public function executor_list(){
      $columns = array(
					0 =>'`id`',
			);
      $limit = $this->input->post('length');
			$start = $this->input->post('start');
			$order = $columns[$this->input->post('order')[0]['column']];
			$dir = $this->input->post('order')[0]['dir'];
			$will_id = $this->input->post('will_id');
      $totalData = $this->Table_Model->countExecutorRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllExecutorDataAjax($will_id);
      $data = array();
      if(!empty($posts))
			{
				$id=$start;
				foreach ($posts as $post)
				{
					$id++;
          $memberId = $post->id;
          $e_name_title = $post->e_name_title;
          $executor_name = $post->executor_name;
					$executor_age = $post->executor_age;
					$executor_address = $post->executor_address;

          $nestedData = array();

            $nestedData[] = "<div class='row'>
              <div class='col-md-9'>".$id.") Executor Name: ".$e_name_title." ".$executor_name.", Age: ".$executor_age.", Address: ".$executor_address."
              </div>
              <div class='col-md-3'>
                <button type='button' class='badge1 badge-pill badge-danger'>
                  <a id='' class='badge1 '  title='Delete Executor' data-toggle='modal' data-target='#executor_delete_modal_".$id."'>
                    <i class='fa fa-trash' aria-hidden='true'  style='font-size:15px; width:15px;'></i>
                  </a>
                  <a id='executor_edit".$id."'  class='badge1 badge-pill '  title='Edit Executor'>
                    <i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i>
                  </a>
                </button>
              </div>
            </div>
            <hr>
            <div class='modal fade' id='executor_delete_modal_".$id."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Do you want to delete</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <p>Name : ".$e_name_title." ".$executor_name."</p>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                    <button type='button' id='executor_delete".$id."' class='btn btn-primary' data-dismiss='modal'>Delete</button>
                  </div>
                </div>
              </div>
            </div>

            <script>
            // Delete
              $('#executor_delete".$id."').click(function(e){
                //alert();
            			$.ajax({
            				data:{ 'id' : ".$memberId."  },
            				type: 'post',
            				url: '".base_url()."Will_controller/delete_executor',
            				success: function (data){

                      var info = JSON.parse(data);
                      var executor_count = info['executor_count'];
                      $('#executor_count').val(executor_count);

                      $('.table_executor').dataTable({
                            'bDestroy': true
                        }).fnDestroy(); // destroy table.

                      var table_executor = $('.table_executor').DataTable({
                        'processing': true,
                        'serverSide': true,
                        'bFilter' : false,
                        'bLengthChange': false,
                        'bPaginate': false,
                        'bInfo': false,
                        'ajax':{
                           'url': '".base_url()."Table_controller/executor_list',
                           'dataType': 'json',
                           'type': 'POST',
                           'data':{ 'will_id' : ".$will_id."  }
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
            			});
              });
              //Edit..
              $('#executor_edit".$id."').click(function(e){
                $('#add_executor').hide();
                $('#update_executor').removeClass('d-none');
                $('#executor_id').val('$memberId');
                $('#e_name_title').val('$e_name_title');
                $('#executor_name').val('$executor_name');
                $('#executor_address').val('$executor_address');
                $('#executor_age').val('$executor_age');
              });
            </script>
            ";
          $data[] = $nestedData;
        }
      }
      $json_data = array(
						"draw"            => intval($this->input->post('draw')),
						"recordsTotal"    => intval($totalData),
						"recordsFiltered" => intval($totalFiltered),
						"data"            => $data
						);
			echo json_encode($json_data);
    }

    // Funeral List Table...
    public function funeral_list(){
      $columns = array(
          0 =>'`id`',
      );
      $limit = $this->input->post('length');
      $start = $this->input->post('start');
      $order = $columns[$this->input->post('order')[0]['column']];
      $dir = $this->input->post('order')[0]['dir'];
      $will_id = $this->input->post('will_id');

      $totalData = $this->Table_Model->countFuneralRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllFuneralDataAjax($will_id);
      //echo print_r($page);
      $data = array();
      if(!empty($posts))
      {
        $id=$start;
        foreach ($posts as $post)
        {
          $id++;
          $memberId = $post->id;
          $funeral_name = $post->funeral_name;
          $funeral_address = $post->funeral_address;

          $nestedData = array();

            $nestedData[] = "<div class='row'><div class='col-md-9'>".$id.") Funeral Name: ".$funeral_name.", Address: ".$funeral_address."
            </div><div class='col-md-3'><button type='button' style='width:80%;'   class='badge1 badge-pill badge-danger' >

            <a id='funeral_delete".$id."' class='badge1 '  title='Delete Family Member' > <i class='fa fa-trash' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>
            <!--a id='funeral_edit".$id."'  class='badge1 badge-pill '  title='Edit Family Member'> <i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a-->
              </button>
            </div></div>
            <script>
              $('#funeral_delete".$id."').click(function(e){
                //alert();
                  $.ajax({
                    data:{ 'id' : ".$memberId."  },
                    type: 'post',
                    url: '".base_url()."Will_controller/delete_funeral',
                    success: function (data){

                      $('.table_funeral').dataTable({
                            'bDestroy': true
                        }).fnDestroy(); // destroy table.

                      var table_funeral = $('.table_funeral').DataTable({
                        'processing': true,
                        'serverSide': true,
                        'bFilter' : false,
                        'bLengthChange': false,
                        'bPaginate': false,
                        'bInfo': false,
                        'ajax':{
                           'url': '".base_url()."Table_controller/funeral_list',
                           'dataType': 'json',
                           'type': 'POST',
                           'data':{ 'will_id' : ".$will_id."  }
                          },
                      });
                      $('.table_funeral').on( 'draw.dt', function(){
                         if (! table_funeral.data().any() ) {
                           $('.table_funeral').hide();
                          }
                          else{
                            $('.table_funeral').show();
                          }
                      });

                    }
                  });
              });
            </script>
            ";
          $data[] = $nestedData;
        }
      }
      $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
            );
      echo json_encode($json_data);
    }

    // Real Estate List Table...
    public function real_estate_list(){
      $columns = array(
          0 =>'`id`',
      );
      $limit = $this->input->post('length');
      $start = $this->input->post('start');
      $order = $columns[$this->input->post('order')[0]['column']];
      $dir = $this->input->post('order')[0]['dir'];
      $will_id = $this->input->post('will_id');
      $page = $this->input->post('page');
      $totalData = $this->Table_Model->countRealEstateRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllRealEstateDataAjax($will_id);
      $data = array();
      if(!empty($posts))
      {
        $id=$start;
        foreach ($posts as $post)
        {
          $id++;
          $estateId = $post->id;
          $estate_type = $post->estate_type;
          $house_no = $post->house_no;
          $survey_number_type = $post->survey_number_type;
          $survey_number = $post->survey_number;
          $measurment_area = $post->measurment_area;
          $measurment_unit = $post->measurment_unit;
          $estate_address = $post->estate_address;
          $estate_city = $post->estate_city;
          $estate_pin = $post->estate_pin;
          $estate_state = $post->estate_state;
          $estate_country = $post->estate_country;
          //echo print_r($estate_type) or die();
          // if($page == 'assets_info'){
          $edit_button = "<a id='real_estate_edit".$id."'  class='badge1 badge-pill '  title='Edit Real Estate'> <i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>";
          // }
          // else{
          //   $edit_button = "";
          // }

          $nestedData = array();

            $nestedData[] = "<div class='row'><div class='col-md-9'>".$id.") Estate Type: ".$estate_type.", ".$estate_type." No: ".$house_no."
            Survey number: ".$survey_number_type." ".$survey_number.", Measurement: ".$measurment_area." ".$measurment_unit.",
            Address: ".$estate_address.",".$estate_city.", ".$estate_state.", ".$estate_country.", Pin:".$estate_pin."
            </div>
            <div class='col-md-3'>
            <button type='button' class='badge1 badge-pill badge-danger' >
            <a id='' class='badge1 '  title='Delete Family Member' data-toggle='modal' data-target='#real_estate_delete_modal_".$id."'>
              <i class='fa fa-trash' aria-hidden='true'  style='font-size:15px; width:15px;'></i>
            </a>
            ".$edit_button."
              </button>
            </div>
            </div>

            <div class='modal fade' id='real_estate_delete_modal_".$id."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Do you want to delete</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <p>Estate Type : ".$estate_type."</p>
                    <p>".$estate_type." No : ".$house_no."</p>
                    <p>Survey number : ".$survey_number_type." ".$survey_number."</p>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                    <button type='button' id='real_estate_delete".$id."' class='btn btn-primary' data-dismiss='modal'>Delete</button>
                  </div>
                </div>
              </div>
            </div>

            <hr>
            <script>
              $('#real_estate_delete".$id."').click(function(e){
                //alert();
                $.ajax({
                  data:{ 'id' : ".$estateId."  },
                  type: 'post',
                  url: '".base_url()."Will_controller/delete_real_estate',
                  success: function (data){

                  $('.table_real_estate').dataTable({
                      'bDestroy': true
                  }).fnDestroy(); // destroy table.

                  var table_real =  $('.table_real_estate').DataTable({
                    'processing': true,
                    'serverSide': true,
                    'bFilter' : false,
                    'bLengthChange': false,
                    'bPaginate': false,
                    'bInfo': false,
                    'ajax':{
                     'url': '".base_url()."Table_controller/real_estate_list',
                     'dataType': 'json',
                     'type': 'POST',
                     'data':{ 'will_id' : ".$will_id."  }
                    },
                  });
                    // Check Bank assets empty...
                    $('.table_real_estate').on( 'draw.dt', function(){
                     if(! table_real.data().any() ) {
                        $('.table_real_estate').hide();
                      }
                      else{
                        $('.table_real_estate').show();
                      }
                    });
                  }
                });
              });
              $('#real_estate_edit".$id."').click(function(){
                $('#add_assets').hide();
                $('#update_real_estate').removeClass('d-none');

                $('.rem_class').removeClass('show');
                $('.rem_class').removeClass('active');

                $('#real_estate').addClass('active');
                $('#real_estate').addClass('show');
                $('#real_estate_tab').addClass('active');

                $('#real_estateId').val('$estateId');
                $('#estate_type').val('$estate_type');
                $('#house_no').val('$house_no');
                $('#survey_number_type').val('$survey_number_type');
                $('#survey_number').val('$survey_number');
                $('#measurment_area').val('$measurment_area');
                $('#measurment_unit').val('$measurment_unit');
                $('#estate_address').val('$post->estate_address');
                $('#estate_city').val('$estate_city');
                $('#estate_pin').val('$estate_pin');
                $('#estate_state').val('$estate_state');
                $('#estate_country').val('$estate_country');
              });
            </script>
            ";
          $data[] = $nestedData;
        }
      }
      $json_data = array(
        "draw"            => intval($this->input->post('draw')),
        "recordsTotal"    => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data"            => $data
      );
      echo json_encode($json_data);
    }

    // Bank Assets List Table...
    public function bank_assets_list(){
      $columns = array(
          0 =>'`id`',
      );
      $limit = $this->input->post('length');
      $start = $this->input->post('start');
      $order = $columns[$this->input->post('order')[0]['column']];
      $dir = $this->input->post('order')[0]['dir'];
      $will_id = $this->input->post('will_id');
      $page = $this->input->post('page');
      $totalData = $this->Table_Model->countBankAssetsRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllBankAssetsDataAjax($will_id);
      $data = array();
      if(!empty($posts))
      {
        $id=$start;
        foreach ($posts as $post)
        {
          $id++;
          $memberId = $post->id;
          $assets_type = $post->assets_type;
          $account_number = $post->account_number;
          $bank_name = $post->bank_name;
          $branch_name = $post->branch_name;
          $fd_recipt_No = $post->fd_recipt_No;
          $key_number = $post->key_number;
          $b_state =$post->state;
          $b_pin_code=$post->pin_code;
          // if($page == 'assets_info'){
            $edit_button = "<a id='bank_assets_edit".$id."'  class='badge1 badge-pill '  title='Edit Real Estate'> <i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>";
          // }
          // else{
          //   $edit_button = "";
          // }
          if($assets_type == 'Savings A/c' || $assets_type == 'Current  A/C'){
            $name = 'Bank Name';
            $acc_no = 'Account Number';
            $other='';
          }
          elseif($assets_type == 'Fixed Deposits'){
            $name = 'Bank Name';
            $acc_no = 'Customer ID No.';
            $other = ', FD Receipt No: '.$fd_recipt_No;

          }
          elseif($assets_type == 'PPF'){
            $name = 'Company Name';
            $acc_no = 'Account Number';
            $other='';
          }
          elseif($assets_type == 'Bank Locker'){
            $name = 'Bank Name';
            $acc_no = 'Locker Number';
            $other = ', Key Number: '.$key_number;
          }
          elseif($assets_type == 'Mutual Funds'){
            $name = 'Company Name';
            $acc_no = 'Folio Number';
            $other='';
          }
          elseif($assets_type == 'Stock Equities'){
            $name = 'Company Name';
            $acc_no = 'ISIN/Serial Number';
            $other='';
          }
          elseif($assets_type == 'Insurance Policy'){
            $name = 'Company Name';
            $acc_no = 'Policy Number';
            $other='';
          }

          $nestedData = array();

            $nestedData[] = "<div class='row'><div class='col-md-9'>".$id.") Assets type: ".$assets_type.", ".$name.": ".$bank_name.", Branch: ".$branch_name.", ".$acc_no.": ".$account_number."".$other."</div>
            <div class='col-md-3'>
            <button type='button' class='badge1 badge-pill badge-danger' >
            <a class='badge1 '  title='Delete Family Member' data-toggle='modal' data-target='#bank_assets_delete_modal_".$id."'>
              <i class='fa fa-trash' aria-hidden='true'  style='font-size:15px; width:15px;'></i>
            </a>
            ".$edit_button."
            </button>
            </div></div>
            <hr>


            <div class='modal fade' id='bank_assets_delete_modal_".$id."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Do you want to delete</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <p>Assets type : ".$assets_type."</p>
                    <p>Name : ".$bank_name."</p>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                    <button type='button' id='bank_assets_delete".$id."' class='btn btn-primary' data-dismiss='modal'>Delete</button>
                  </div>
                </div>
              </div>
            </div>

            <script>
              $('#bank_assets_delete".$id."').click(function(e){
                //alert();
                  $.ajax({
                    data:{ 'id' : ".$memberId."  },
                    type: 'post',
                    url: '".base_url()."Will_controller/delete_bank_assets',
                    success: function (data){

                      $('.table_bank_assets').dataTable({
                            'bDestroy': true
                        }).fnDestroy(); // destroy table.

                    var table_bank_assets =  $('.table_bank_assets').DataTable({
                        'processing': true,
                        'serverSide': true,
                        'bFilter' : false,
                        'bLengthChange': false,
                        'bPaginate': false,
                        'bInfo': false,
                        'ajax':{
                           'url': '".base_url()."Table_controller/bank_assets_list',
                           'dataType': 'json',
                           'type': 'POST',
                           'data':{ 'will_id' : ".$will_id."  }
                          },
                      });
                      // Check Bank assets empty...
                      $('.table_bank_assets').on( 'draw.dt', function(){
                         if (! table_bank_assets.data().any() ) {
                            $('.table_bank_assets').hide();
                            $('#bank_estate_check').val('0');
                          }
                          else{
                            $('.table_bank_assets').show();
                            $('#bank_estate_check').val('1');
                          }
                      });
                    }
                  });
              });

              $('#bank_assets_edit".$id."').click(function(){
                var assets_type = '$assets_type';
                $('.rem_class').removeClass('show');
                $('.rem_class').removeClass('active');

                $('#bank_assets').addClass('active');
                $('#bank_assets').addClass('show');
                $('#bank_assets_tab').addClass('active');

                $('#add_bank_assets').hide();
                $('#update_bank_assets').removeClass('d-none');
                $('#bank_assets_id').val('$memberId');
                $('#assets_type').val('$assets_type');
                $('#account_number').val('$account_number');
                $('#account_number2').val('$account_number');
                $('#bank_name').val('$bank_name');
                $('#branch_name').val('$branch_name');
                $('#fd_recipt_No').val('$fd_recipt_No');
                $('#key_number').val('$key_number');
                $('#b_state').val('$b_state');
                $('#b_pin_code').val('$b_pin_code');

                $('#fd_recipt_No_div').hide();
                $('#key_number_div').hide();

                if(assets_type == 'Savings A/c'){
                  $('.hide_num').hide();
                  $('#account_no').show();
                  $('#b_state_div').show();
                  $('#b_pin_code_div').show();
                  $('.hide_name').hide();
                  $('#bank_nm').show();
                  $('#key_number').val('');
                  $('#fd_recipt_No').val('');
                }
                else if (assets_type == 'Current A/C') {
                  $('.hide_num').hide();
                  $('#account_no').show();
                  $('#b_state_div').show();
                  $('#b_pin_code_div').show();
                  $('.hide_name').hide();
                  $('#bank_nm').show();
                  $('#key_number').val('');
                  $('#fd_recipt_No').val('');
                }
                else if (assets_type == 'Fixed Deposits') {
                  $('.hide_num').hide();
                  $('#customer_id').show();
                  $('#b_state_div').show();
                  $('#b_pin_code_div').show();
                  $('.hide_name').hide();
                  $('#bank_nm').show();
                  $('#fd_recipt_No_div').show();
                  $('#key_number').val('');
                }
                else if (assets_type == 'PPF') {
                  $('.hide_num').hide();
                  $('#customer_id').show();
                  $('#b_state_div').show();
                  $('#b_pin_code_div').show();
                  $('.hide_name').hide();
                  $('#company_name').show();
                  $('#key_number').val('');
                  $('#fd_recipt_No').val('');
                }
                else if (assets_type == 'Bank Locker') {
                  $('.hide_num').hide();
                  $('#folio_no').show();
                  $('#b_state_div').show();
                  $('#b_pin_code_div').show();
                  $('.hide_name').hide();
                  $('#bank_nm').show();
                  $('#key_number_div').show();
                  $('#fd_recipt_No').val('');
                }
                else if (assets_type == 'Mutual Funds') {
                  $('.hide_num').hide();
                  $('#customer_id').show();
                  $('#b_state_div').hide();
                  $('#b_pin_code_div').hide();
                  $('.hide_name').hide();
                  $('#company_name').show();
                  $('#key_number').val('');
                  $('#fd_recipt_No').val('');
                }
                else if (assets_type == 'Stock Equities') {
                  $('.hide_num').hide();
                  $('#serial_no').show();
                  $('#b_state_div').hide();
                  $('#b_pin_code_div').hide();
                  $('.hide_name').hide();
                  $('#company_name').show();
                  $('#key_number').val('');
                  $('#fd_recipt_No').val('');
                }
                else if (assets_type == 'Insurance Policy') {
                  $('.hide_num').hide();
                  $('#policy_no').show();
                  $('#b_state_div').hide();
                  $('#b_pin_code_div').hide();
                  $('.hide_name').hide();
                  $('#insurance_company').show();
                  $('#key_number').val('');
                  $('#fd_recipt_No').val('');
                }
              });
            </script>
            ";
          $data[] = $nestedData;
        }
      }
      $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
            );
      echo json_encode($json_data);
    }

    // Vehicle List Table...
    public function vehicle_list(){
      $columns = array(
          0 =>'`id`',
      );
      $limit = $this->input->post('length');
      $start = $this->input->post('start');
      $order = $columns[$this->input->post('order')[0]['column']];
      $dir = $this->input->post('order')[0]['dir'];
      $will_id = $this->input->post('will_id');
      $page = $this->input->post('page');
      $totalData = $this->Table_Model->countVehicleRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllVehicleAjax($will_id);
      $data = array();
      if(!empty($posts))
      {
        $id=$start;
        foreach ($posts as $post)
        {
          $id++;
          $memberId = $post->id;
          $vehicle_model = $post->vehicle_model;
          $vehicle_make_year = $post->vehicle_make_year;
          $registration_number = $post->registration_number;
          // if($page == 'assets_info'){
            $edit_button = "<a id='vehicle_edit".$id."'  class='badge1 badge-pill '  title='Edit Vehicle Information'> <i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>";
          // }
          // else{
          //   $edit_button = "";
          // }
          $nestedData = array();

            $nestedData[] = "<div class='row'><div class='col-md-9'>".$id.") Vehicle Model: ".$vehicle_model.", Make Year: ".$vehicle_make_year.", Registration Number: ".$registration_number."</div>
            <div class='col-md-3'>
            <button type='button' class='badge1 badge-pill badge-danger'>
            <a class='badge1 '  title='Delete Vehicle' data-toggle='modal' data-target='#vehicle_delete_modal_".$id."'>
              <i class='fa fa-trash' aria-hidden='true'  style='font-size:15px; width:15px;'></i>
            </a>
            ".$edit_button."
            </button>
            </div></div>
            <hr>

            <div class='modal fade' id='vehicle_delete_modal_".$id."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Do you want to delete</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <p>Vehicle Model : ".$vehicle_model."</p>
                    <p>Registration Number : ".$registration_number."</p>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                    <button type='button' id='vehicle_delete".$id."' class='btn btn-primary' data-dismiss='modal'>Delete</button>
                  </div>
                </div>
              </div>
            </div>

            <script>
              $('#vehicle_delete".$id."').click(function(e){
                //alert();
                  $.ajax({
                    data:{ 'id' : ".$memberId."  },
                    type: 'post',
                    url: '".base_url()."Will_controller/delete_vehicle',
                    success: function (data){

                      $('.table_vehicle').dataTable({
                            'bDestroy': true
                        }).fnDestroy(); // destroy table.

                      var table_vehicle = $('.table_vehicle').DataTable({
                        'processing': true,
                        'serverSide': true,
                        'bFilter' : false,
                        'bLengthChange': false,
                        'bPaginate': false,
                        'bInfo': false,
                        'ajax':{
                           'url': '".base_url()."Table_controller/vehicle_list',
                           'dataType': 'json',
                           'type': 'POST',
                           'data':{ 'will_id' : ".$will_id."  }
                          },
                      });
                      // Check Vehicle assets empty...
                      $('.table_vehicle').on( 'draw.dt', function(){
                         if (! table_vehicle.data().any() ) {
                            $('.table_vehicle').hide();
                            $('#vehicle_estate_check').val('0');
                          }
                          else{
                            $('.table_vehicle').show();
                            $('#vehicle_estate_check').val('1');
                          }
                      });
                    }
                  });
              });
              $('#vehicle_edit".$id."').click(function(e){
                $('#add_vehicle_assets').hide();
                $('#update_vehicle_assets').removeClass('d-none');

                $('.rem_class').removeClass('show');
                $('.rem_class').removeClass('active');

                $('#vehicle').addClass('active');
                $('#vehicle').addClass('show');
                $('#vehicle_tab').addClass('active');

                $('#vehicle_Id').val('$memberId');
                $('#vehicle_model').val('$vehicle_model');
                $('#vehicle_make_year').val('$vehicle_make_year');
                $('#registration_number').val('$registration_number');
              });
            </script>
            ";
          $data[] = $nestedData;
        }
      }
      $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
            );
      echo json_encode($json_data);
    }

    // Gift List Table...
    public function gift_list(){
      $columns = array(
          0 =>'`id`',
      );
      $limit = $this->input->post('length');
      $start = $this->input->post('start');
      $order = $columns[$this->input->post('order')[0]['column']];
      $dir = $this->input->post('order')[0]['dir'];
      $will_id = $this->input->post('will_id');
      $page = $this->input->post('page');
      $totalData = $this->Table_Model->countGiftRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllGiftAjax($will_id);
      $data = array();
      if(!empty($posts))
      {
        $id=$start;
        foreach ($posts as $post)
        {
          $id++;
          $memberId = $post->id;
          $gift_type = $post->gift_type;
          $gift_description = $post->gift_description;
          // if($page == 'assets_info'){
            $edit_button = "<a id='gift_edit".$id."'  class='badge1 badge-pill '  title='Edit Gift Information'> <i class='fa fa-edit' aria-hidden='true'  style='font-size:15px; width:15px;'></i></a>";
          // }
          // else{
          //   $edit_button = "";
          // }
          $nestedData = array();

            $nestedData[] = "<div class='row'><div class='col-md-9'>".$id.") Gift Type: ".$gift_type.", Description: ".$gift_description."
            </div><div class='col-md-3'><button type='button' class='badge1 badge-pill badge-danger'>
              <a class='badge1 '  title='Delete Family Member' data-toggle='modal' data-target='#gift_delete_modal_".$id."'>
                <i class='fa fa-trash' aria-hidden='true'  style='font-size:15px; width:15px;'></i>
              </a>
              ".$edit_button."
            </button>
            </div></div>

            <div class='modal fade' id='gift_delete_modal_".$id."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Do you want to delete</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <p>Type : ".$gift_type."</p>
                    <p>Description : ".$gift_description."</p>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                    <button type='button' id='gift_delete".$id."' class='btn btn-primary' data-dismiss='modal'>Delete</button>
                  </div>
                </div>
              </div>
            </div>

            <script>
              $('#gift_delete".$id."').click(function(e){
                  $.ajax({
                    data:{ 'id' : ".$memberId."  },
                    type: 'post',
                    url: '".base_url()."Will_controller/delete_gift',
                    success: function (data){

                      $('.table_gift').dataTable({
                            'bDestroy': true
                        }).fnDestroy(); // destroy table.

                      var table_gift = $('.table_gift').DataTable({
                        'processing': true,
                        'serverSide': true,
                        'bFilter' : false,
                        'bLengthChange': false,
                        'bPaginate': false,
                        'bInfo': false,
                        'ajax':{
                           'url': '".base_url()."Table_controller/gift_list',
                           'dataType': 'json',
                           'type': 'POST',
                           'data':{ 'will_id' : ".$will_id."  }
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
                    }
                  });
              });
              $('#gift_edit".$id."').click(function(e){
                $('#add_other_gift_assets').hide();
                $('#update_other_gift_assets').removeClass('d-none');

                $('.rem_class').removeClass('show');
                $('.rem_class').removeClass('active');

                $('#other_gifts').addClass('active');
                $('#other_gifts').addClass('show');
                $('#other_gifts_tab').addClass('active');

                $('#gift_Id').val('$memberId');
                $('#gift_type').val('$gift_type');
                $('#gift_description').val('$gift_description');
              });
            </script>
            ";
          $data[] = $nestedData;
        }
      }
      $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
            );
      echo json_encode($json_data);
    }

    // Witness List Table...
    public function witness_list(){
      $columns = array(
          0 =>'`id`',
      );
      $limit = $this->input->post('length');
      $start = $this->input->post('start');
      $order = $columns[$this->input->post('order')[0]['column']];
      $dir = $this->input->post('order')[0]['dir'];
      $will_id = $this->input->post('will_id');
      $totalData = $this->Table_Model->countWitnessRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllWitnessAjax($will_id);
      $data = array();
      if(!empty($posts))
      {
        $id=$start;
        foreach ($posts as $post)
        {
          $id++;
          $memberId = $post->id;
          $witness_name = $post->witness_name;
          $witness_address = $post->witness_address;

          $nestedData = array();

            $nestedData[] = "<div class='row'>
              <div class='col-md-9'>".$id.") Witness Name: ".$witness_name.", Address: ".$witness_address."</div>
              <div class='col-md-3 '>
                <button type='button' style='width:80%;' class='badge1 badge-pill badge-danger' >
                  <a class='badge1 '  title='Delete Witness' data-toggle='modal' data-target='#witness_delete_modal_".$id."'>
                    <i class='fa fa-trash' aria-hidden='true'  style='font-size:15px; width:15px;'></i>
                  </a>
                </button>
              </div>
            </div>
            <hr>


            <div class='modal fade' id='witness_delete_modal_".$id."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Do you want to delete</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <p>Name : ".$witness_name."</p>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                    <button type='button' id='witness_delete".$id."' class='btn btn-primary' data-dismiss='modal'>Delete</button>
                  </div>
                </div>
              </div>
            </div>

            <script>
              $('#witness_delete".$id."').click(function(e){
                //alert();
                  $.ajax({
                    data:{ 'id' : ".$memberId."  },
                    type: 'post',
                    url: '".base_url()."Will_controller/delete_witness',
                    success: function (data){

                      $('.table_witness').dataTable({
                            'bDestroy': true
                        }).fnDestroy(); // destroy table.

                      var table_witness = $('.table_witness').DataTable({
                        'processing': true,
                        'serverSide': true,
                        'bFilter' : false,
                        'bLengthChange': false,
                        'bPaginate': false,
                        'bInfo': false,
                        'ajax':{
                           'url': '".base_url()."Table_controller/witness_list',
                           'dataType': 'json',
                           'type': 'POST',
                           'data':{ 'will_id' : ".$will_id."  }
                          },
                      });
                      $('.table_witness').on( 'draw.dt', function(){
                        if (! table_witness.data().any() ) {
                          $('#btn_final_pdf, #btn_pdf').prop('disabled', true);
                          $('.table_witness').hide();
                         }
                         else{
                           $('#btn_final_pdf, #btn_pdf').prop('disabled', false);
                           $('.table_witness').show();
                         }
                      });
                    }
                  });
              });
            </script>
            ";
          $data[] = $nestedData;
        }
      }
      $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
            );
      echo json_encode($json_data);
    }
  }
?>
