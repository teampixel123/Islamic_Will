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
      $totalData = $this->Table_Model->countFamilyMembarRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllFamilyMembarDataAjax($limit,$start,$order,$dir,$will_id);
      $data = array();
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
					$family_person_age = $post->family_person_age;
					$is_minar = $post->is_minar;
					$guardian_name = $post->guardian_name;
					$guardian_address = $post->guardian_address;

          if($is_minar == 1){
            $info = "</br>Guardian: ".$guardian_name.", Guardian Address:".$guardian_address;
          }
          else{
            $info = "";
          }

          $nestedData = array();
          //if($is_minar == 0){
            $nestedData[] = "<div class='row'><div class='col-md-10'>".$id.") Name: ".$family_person_name.", Relationship: ".$relationship.", Age: ".$family_person_age." ".$info."
            </div><div class='col-md-2'><button type='button' id='family_member_delete".$id."'  class='badge badge-pill badge-danger' title='Delete Family Member'><i class='fa fa-trash' style='font-size:15px; width:30px;'></i></button>
            </div></div>
            <script>
              $('#family_member_delete".$id."').click(function(e){
                //alert();
            			$.ajax({
            				data:{ 'id' : ".$memberId."  },
            				type: 'post',
            				url: '".base_url()."Will_controller/delete_family_member',
            				success: function (data){
                      $('.table_family_member').dataTable({
                            'bDestroy': true
                        }).fnDestroy(); // destroy table.

                        $('.table_family_member').DataTable({
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
      $posts = $this->Table_Model->getAllExecutorDataAjax($limit,$start,$order,$dir,$will_id);
      $data = array();
      if(!empty($posts))
			{
				$id=$start;
				foreach ($posts as $post)
				{
					$id++;
          $memberId = $post->id;
          $executor_name = $post->executor_name;
					$executor_age = $post->executor_age;
					$executor_address = $post->executor_address;

          $nestedData = array();

            $nestedData[] = "<div class='row'><div class='col-md-10'>".$id.") Executor Name: ".$executor_name.",Age: ".$executor_age.", Address: ".$executor_address."
            </div><div class='col-md-2'><button type='button' id='executor_delete".$id."'  class='badge badge-pill badge-danger' title='Delete Family Member'><i class='fa fa-trash' style='font-size:15px; width:30px;'></i></button>
            </div></div>
            <script>
              $('#executor_delete".$id."').click(function(e){
                //alert();
            			$.ajax({
            				data:{ 'id' : ".$memberId."  },
            				type: 'post',
            				url: '".base_url()."Will_controller/delete_executor',
            				success: function (data){

                      $('.table_executor').dataTable({
                            'bDestroy': true
                        }).fnDestroy(); // destroy table.

                      $('.table_executor').DataTable({
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
      $posts = $this->Table_Model->getAllFuneralDataAjax($limit,$start,$order,$dir,$will_id);
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

            $nestedData[] = "<div class='row'><div class='col-md-10'>".$id.") Funeral Name: ".$funeral_name.", Address: ".$funeral_address."
            </div><div class='col-md-2'><button type='button' id='funeral_delete".$id."'  class='badge badge-pill badge-danger' title='Delete Family Member'><i class='fa fa-trash' style='font-size:15px; width:30px;'></i></button>
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

                      $('.table_funeral').DataTable({
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
      $totalData = $this->Table_Model->countRealEstateRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllRealEstateDataAjax($limit,$start,$order,$dir,$will_id);
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
          $survey_number = $post->survey_number;
          $measurment_area = $post->measurment_area;
          $measurment_unit = $post->measurment_unit;
          $estate_address = $post->estate_address;
          $estate_city = $post->estate_city;
          $estate_pin = $post->estate_pin;
          $estate_state = $post->estate_state;
          $estate_country = $post->estate_country;

          $nestedData = array();

            $nestedData[] = "<div class='row'><div class='col-md-10'>".$id.") Estate Types: ".$estate_type.", House No / Flat NO: ".$house_no."
            Survey number: ".$survey_number.", Measurement: ".$measurment_area." ".$measurment_unit.",
            Address: ".$estate_address.",".$estate_city.", ".$estate_state.", ".$estate_country.", Pin:".$estate_pin."
            </div><div class='col-md-2'><button type='button' id='real_estate_delete".$id."'  class='badge badge-pill badge-danger' title='Delete Family Member'><i class='fa fa-trash' style='font-size:15px; width:30px;'></i></button>
            </div></div>
            <script>
              $('#real_estate_delete".$id."').click(function(e){
                //alert();
                  $.ajax({
                    data:{ 'id' : ".$estateId."  },
                    type: 'post',
                    url: '".base_url()."Will_controller/delete_real_estate',
                    success: function (data){

                      $('.table_funeral').dataTable({
                            'bDestroy': true
                        }).fnDestroy(); // destroy table.

                      $('.table_funeral').DataTable({
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
      $totalData = $this->Table_Model->countBankAssetsRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllBankAssetsDataAjax($limit,$start,$order,$dir,$will_id);
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

            $nestedData[] = "<div class='row'><div class='col-md-10'>".$id.") Assets type: ".$assets_type.", ".$name.": ".$bank_name.", Branch: ".$branch_name.", ".$acc_no.": ".$account_number."".$other."
            </div><div class='col-md-2'><button type='button' id='bank_assets_delete".$id."' class='badge badge-pill badge-danger' title='Delete Family Member'><i class='fa fa-trash' style='font-size:15px; width:30px;'></i></button>
            </div></div>
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

                      $('.table_bank_assets').DataTable({
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
      $totalData = $this->Table_Model->countVehicleRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllVehicleAjax($limit,$start,$order,$dir,$will_id);
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

          $nestedData = array();

            $nestedData[] = "<div class='row'><div class='col-md-10'>".$id.") Vehicle Model: ".$vehicle_model.", Make Year: ".$vehicle_make_year.", Registration Number: ".$registration_number."
            </div><div class='col-md-2'><button type='button' id='vehicle_delete".$id."'  class='badge badge-pill badge-danger' title='Delete Family Member'><i class='fa fa-trash' style='font-size:15px; width:30px;'></i></button>
            </div></div>
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

                      $('.table_vehicle').DataTable({
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
      $totalData = $this->Table_Model->countGiftRows($will_id);
      $totalFiltered = $totalData;
      $posts = $this->Table_Model->getAllGiftAjax($limit,$start,$order,$dir,$will_id);
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

          $nestedData = array();

            $nestedData[] = "<div class='row'><div class='col-md-10'>".$id.") Gift Type: ".$gift_type.", Description: ".$gift_description."
            </div><div class='col-md-2'><button type='button' id='gift_delete".$id."'  class='badge badge-pill badge-danger' title='Delete Family Member'><i class='fa fa-trash' style='font-size:15px; width:30px;'></i></button>
            </div></div>
            <script>
              $('#gift_delete".$id."').click(function(e){
                //alert();
                  $.ajax({
                    data:{ 'id' : ".$memberId."  },
                    type: 'post',
                    url: '".base_url()."Will_controller/delete_gift',
                    success: function (data){

                      $('.table_gift').dataTable({
                            'bDestroy': true
                        }).fnDestroy(); // destroy table.

                      $('.table_gift').DataTable({
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
      $posts = $this->Table_Model->getAllWitnessAjax($limit,$start,$order,$dir,$will_id);
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

            $nestedData[] = "<div class='row'><div class='col-md-10'>".$id.") Witness Name: ".$witness_name.", Address: ".$witness_address."
            </div><div class='col-md-2'><button type='button' id='witness_delete".$id."'  class='badge badge-pill badge-danger' title='Delete Family Member'><i class='fa fa-trash' style='font-size:15px; width:30px;'></i></button>
            </div></div>
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

                      $('.table_witness').DataTable({
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
