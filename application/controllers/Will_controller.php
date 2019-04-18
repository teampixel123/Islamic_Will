<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Will_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
    }

    public function index(){
      $this->load->view('pages/personal_info');
  	}

    public function login(){
      $this->load->view('pages/login');
  	}

    public function start_will_view(){
      $this->session->sess_destroy();
      $this->load->view('pages/start_will');
    }

    public function personal_info_view(){
  	  //$this->load->view('pages/start_will');
      $this->load->view('pages/personal_info');
  	}

    public function family_info_view(){
      $this->load->view('pages/family_info');
    }

    public function executor_funeral_view(){
      $this->load->view('pages/executor_funeral');
    }

    public function assets_info_view(){
      $this->load->view('pages/assets_info');
    }

    public function witness_info_view(){
      $this->load->view('pages/witness_info');
    }

    public function generate_otp(){
      $mob_email = $this->input->post('mob_email');
      $this->load->helper('string');
      $otp = random_string('nozero',6);

      $this->Will_Model->check_valid_mob_email($mob_email);

      json_encode($mob_email);
      //$this->load->view('pages/witness_info');
    }




    /*public function store_start_info(){
      $gender = $this->input->post('gender');
      $is_married = $this->input->post('is_married');
      $is_have_child = $this->input->post('is_have_child');

      $start_will_info = array(
                            'gender' => $gender,
                            'is_married' => $is_married,
                            'is_have_child' => $is_have_child,
                          );
      $this->session->set_userdata('start_will_info',$start_will_info);
      header('Location: personal_info_view');
    }*/

    /**************************************************************/
    /*            save personal info.... datta...                 */
    /**************************************************************/


 public function pdf_view2(){
  $this->load->view('pages/pdf');
 }

 public function pdf_view(){
  $this->load->view('pages/final_pdf');
 }



 public function save_personal_info(){
   $will_date = date('d-m-Y');
   $this->load->helper('string');
   $will_id = random_string('nozero',8);
   $name_title = $this->input->post('name_title');

   if($name_title == 'Miss.'){
     $marital_status = 'Unmarried';
     $is_have_child = '0';
   }
   else {
     $marital_status = $this->input->post('marital_status');
     $is_have_child = $this->input->post('is_have_child');
   }

   if($marital_status == 'Unmarried'){
     $is_have_child = '0';
   }

   $will_data = array(
               'will_id' => $will_id,
               'will_date' => $will_date,
             );
   $personal_data = array(
             'will_id' => $will_id,
             'name_title'=>$this->input->post('name_title'),
             'full_name'=>$this->input->post('full_name'),
             'address'=>$this->input->post('address'),
             'city'=>$this->input->post('city'),
             'pin_code'=>$this->input->post('pin_code'),
             'state'=>$this->input->post('state'),
             'country'=>$this->input->post('country'),
             'mobile_no'=>$this->input->post('mobile_no'),
             'email'=>$this->input->post('email'),
             'occupation'=>$this->input->post('occupation'),
             'aadhar_no'=>$this->input->post('aadhar_no'),
             'pan_no'=>$this->input->post('pan_no'),
             'gender'=>$this->input->post('gender'),
             'age'=>$this->input->post('age'),
             'marital_status'=>$marital_status,
             'is_have_child'=>$is_have_child,
           );
     $check_mail = $this->Will_Model->check_mail_id($this->input->post('email'));
     $check_mobile = $this->Will_Model->check_mobile_no($this->input->post('mobile_no'));

    /*if ($check_mail > 0) {
       echo "Email Exist";
     }
     elseif ($check_mobile > 0) {
       echo "Mobile Number Exist";
     }
     else{*/
       $this->Will_Model->save_personal_info($personal_data);
       $this->Will_Model->save_will_data($will_data);

       $session_data = array('will_start' => 'yes','will_id' =>$will_id);
       $temp_will_id =  $this->session->set_userdata($session_data);

       $get_personal_data = $this->Will_Model->get_personal_data($will_id);
       echo json_encode($get_personal_data);
       //header('Location: display_personal_info');
   //  }
 }


 /**************************************************************/
     /*            Get personal info.... datta...                 */
     /**************************************************************/
     public function get_personal_info(){
       $will_id = $this->input->post('will_id');
       $get_personal_data = $this->Will_Model->get_personal_data($will_id);
       echo json_encode($get_personal_data);
     }

     public function display_personal_info(){
       $personal_data = $this->Will_Model->display_personal_info();
       $this->load->view('pages/display_personal_info',['personal_data'=>$personal_data]);
     }


    /**************************************************************/
    /*            Update personal info.... datta...                 */
    /**************************************************************/
    public function update_personal_info(){
      $will_date = date('d-m-Y');
      $name_title = $this->input->post('name_title');

      if($name_title == 'Miss.'){
        $marital_status = 'Unmarried';
        $is_have_child = '0';
      }
      else {
        $marital_status = $this->input->post('marital_status');
        $is_have_child = $this->input->post('is_have_child');
      }

      if($marital_status == 'Unmarried'){
        $is_have_child = '0';
      }

      $will_id =  $this->session->userdata('will_id');
      $personal_data_update = array(
                'name_title'=>$this->input->post('name_title'),
                'full_name'=>$this->input->post('full_name'),
                'address'=>$this->input->post('address'),
                'city'=>$this->input->post('city'),
                'pin_code'=>$this->input->post('pin_code'),
                'state'=>$this->input->post('state'),
                'country'=>$this->input->post('country'),
                'mobile_no'=>$this->input->post('mobile_no'),
                'email'=>$this->input->post('email'),
                'occupation'=>$this->input->post('occupation'),
                'aadhar_no'=>$this->input->post('aadhar_no'),
                'pan_no'=>$this->input->post('pan_no'),
                'gender'=>$this->input->post('gender'),
                'age'=>$this->input->post('age'),
                'marital_status'=>$marital_status,
                'is_have_child'=>$is_have_child,
              );
        $check_mail = $this->Will_Model->check_mail_id($this->input->post('email'));
        $check_mobile = $this->Will_Model->check_mobile_no($this->input->post('mobile_no'));

       /*if ($check_mail > 0) {
          echo "Email Exist";
        }
        elseif ($check_mobile > 0) {
          echo "Mobile Number Exist";
        }
        else{*/
          $this->Will_Model->update_personal_info($will_id,$personal_data_update);

          $get_personal_data = $this->Will_Model->get_personal_data($will_id);
          echo json_encode($get_personal_data);
          //header('Location: display_personal_info');
      //  }
    }

    /**************************************************************/
    /*            Save/Add Family Member... datta...             */
    /**************************************************************/
    public function save_family_member(){
      $will_id = $this->session->userdata('will_id');
      $member_data = array(
                  'will_id' => $will_id,
                  'relationship' => $this->input->post('relationship'),
                  'family_person_name' => $this->input->post('family_person_name'),
                  'family_person_dob' => $this->input->post('family_person_dob'),
                  'family_person_age' => $this->input->post('family_person_age'),
                  'is_minar' => $this->input->post('is_minar'),
                  'guardian_name' => $this->input->post('guardian_name'),
                  'guardian_address' => $this->input->post('guardian_address'),
                );
      $this->Will_Model->save_family_member($member_data);
      $list = $this->Will_Model->get_family_member_list($will_id);
      echo json_encode($list);
    }

//family_info
    public function save_family_info(){
     $fmily_data = array(
                'relationship'=>$this->input->post('relationship'),
                'family_person_name'=>$this->input->post('family_person_name'),
                'family_person_dob'=>$this->input->post('family_person_dob'),
              );
            $this->Will_Model->save_family_info($fmily_data);
    }

    public function delete_family_member(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_family_member($id);
    }

    /**************************************************************/
    /*            Save/Add Executor... datta...             */
    /**************************************************************/
    public function save_executor(){
      $will_id = $this->session->userdata('will_id');
      $executor_data = array(
                  'will_id' => $will_id,
                  'executor_name' => $this->input->post('executor_name'),
                  'executor_age' => $this->input->post('executor_age'),
                  'executor_address' => $this->input->post('executor_address'),
                );
      $this->Will_Model->save_executor($executor_data);
    }

    /**************************************************************/
    /*            Delete Executor... datta...             */
    /**************************************************************/
    public function delete_executor(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_executor($id);
    }

    /**************************************************************/
    /*            Save/Add Funeral... datta...             */
    /**************************************************************/
    public function save_funeral(){
      $will_id = $this->session->userdata('will_id');
      $funeral_data = array(
                  'will_id' => $will_id,
                  'funeral_name' => $this->input->post('funeral_name'),
                  'funeral_address' => $this->input->post('funeral_address'),
                );
      $this->Will_Model->save_funeral($funeral_data);
    }

    /**************************************************************/
    /*            Delete Funeral... datta...             */
    /**************************************************************/
    public function delete_funeral(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_funeral($id);
    }


    /**************************************************************/
    /*            Save/Add Assets... datta...             */
    /**************************************************************/
    public function save_assets(){
      $will_id = $this->session->userdata('will_id');
      $assets_data = array(
                  'will_id' => $will_id,
                  'estate_type' => $this->input->post('estate_type'),
                  'house_no' => $this->input->post('house_no'),
                  'survey_number' => $this->input->post('survey_number'),
                  'measurment_area' => $this->input->post('measurment_area'),
                  'measurment_unit' => $this->input->post('measurment_unit'),
                  'estate_address' => $this->input->post('estate_address'),
                  'estate_city' => $this->input->post('estate_city'),
                  'estate_pin' => $this->input->post('estate_pin'),
                  'estate_state' => $this->input->post('estate_state'),
                  'estate_country' => $this->input->post('estate_country'),
                );
      $this->Will_Model->save_assets($assets_data);
    }

    /**************************************************************/
    /*            Delete Real Estate Assets... datta...             */
    /**************************************************************/
    public function delete_real_estate(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_real_estate($id);
    }

    /**************************************************************/
    /*            Save/Add Bank Assets... datta...             */
    /**************************************************************/
    public function save_bank_assets(){
      $will_id = $this->session->userdata('will_id');
      $assets_type = $this->input->post('assets_type');
      if($assets_type=='Fixed Deposits'){
        $bank_assets_data = array(
          'will_id' => $will_id,
          'assets_type' => $this->input->post('assets_type'),
          'account_number' => $this->input->post('account_number'),
          'bank_name' => $this->input->post('bank_name'),
          'branch_name' => $this->input->post('branch_name'),
          'fd_recipt_No' => $this->input->post('fd_recipt_No'),
        );
      }
      elseif ($assets_type=='Bank Locker') {
        $bank_assets_data = array(
          'will_id' => $will_id,
          'assets_type' => $this->input->post('assets_type'),
          'account_number' => $this->input->post('account_number'),
          'bank_name' => $this->input->post('bank_name'),
          'branch_name' => $this->input->post('branch_name'),
          'key_number' => $this->input->post('key_number'),
        );
      }
      else{
        $bank_assets_data = array(
          'will_id' => $will_id,
          'assets_type' => $this->input->post('assets_type'),
          'account_number' => $this->input->post('account_number'),
          'bank_name' => $this->input->post('bank_name'),
          'branch_name' => $this->input->post('branch_name'),
        );
      }
      $this->Will_Model->save_bank_assets($bank_assets_data);
    }

    public function delete_bank_assets(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_bank_assets($id);
    }

    /**************************************************************/
    /*            Save/Add Vehicle... datta...             */
    /**************************************************************/
    public function save_vehicle_assets(){
      $will_id = $this->session->userdata('will_id');
      $vehicle_assets_data = array(
                  'will_id' => $will_id,
                  'vehicle_model' => $this->input->post('vehicle_model'),
                  'vehicle_make_year' => $this->input->post('vehicle_make_year'),
                  'registration_number' => $this->input->post('registration_number'),
                );
      $this->Will_Model->save_vehicle_assets($vehicle_assets_data);
    }

    /**************************************************************/
    /*            Delete Vehicle Assets... datta...             */
    /**************************************************************/
    public function delete_vehicle(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_vehicle($id);
    }

    /**************************************************************/
    /*            Save/Add Gift Assets... datta...             */
    /**************************************************************/
    public function save_other_gift_assets(){
      $will_id = $this->session->userdata('will_id');
      $other_gift_assets_data = array(
                  'will_id' => $will_id,
                  'gift_type' => $this->input->post('gift_type'),
                  'gift_description' => $this->input->post('gift_description'),
                );
      $this->Will_Model->save_other_gift_assets($other_gift_assets_data);
    }

    /**************************************************************/
    /*            Delete Gift Assets... datta...             */
    /**************************************************************/
    public function delete_gift(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_gift($id);
    }

    /**************************************************************/
    /*            Save/Add Witness... datta...             */
    /**************************************************************/
    public function save_witness_info(){
      $will_id = $this->session->userdata('will_id');
      $witness_data = array(
                  'will_id' => $will_id,
                  'witness_name' => $this->input->post('witness_name'),
                  'witness_address' => $this->input->post('witness_address'),
                );
      $this->Will_Model->save_witness_info($witness_data);
    }

    /**************************************************************/
    /*            Delete Witness... datta...             */
    /**************************************************************/
    public function delete_witness(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_witness($id);
    }

    public function destroy_session(){
      $this->session->unset_userdata('will_id');
      $this->session->unset_userdata('will_start');
      $this->session->sess_destroy();
    }


    //Asset_info
        public function save_Asset_info(){
         $fmily_data = array(
                    'estate_type'=>$this->input->post('estate_type'),
                    'flat_no'=>$this->input->post('flat_no'),
                    'survey_number'=>$this->input->post('survey_number'),
                    'area_measurement'=>$this->input->post('area_measurement'),
                    'asset_unit'=>$this->input->post('asset_unit'),
                    'address_asset'=>$this->input->post('address_asset'),
                    'city_asset'=>$this->input->post('city_asset'),
                    'pin_code_asset'=>$this->input->post('pin_code_asset'),
                    'country_asset'=>$this->input->post('country_asset'),
                    'state_asset'=>$this->input->post('state_asset'),
                    'give_to_asset'=>$this->input->post('give_to_asset'),
                    'ownership_asset'=>$this->input->post('ownership_asset'),

                  );
                $this->Will_Model->save_Asset_info($fmily_data);
        }


     public function pdf()
     {
      // load the database
        $this->load->database();
       //load the model
        $this->load->model('select');
       //load the method of model
        $data['h']=$this->select->select();
       //return the data in view
        $this->load->view('pdf_view', $data);
     }

        // new pages

        public function printpage(){
                 $this->load->library('Myfpdf');
                 $data=$this->Will_Model->displaydata();

                 //if(!empty(array_filter($data))){
                  $this->load->view('pages\pdf',['result'=>$data]);
                //}else{
                // redirect('Will_controller/pdf_view',$data);
              //   }

                 }



  }
 ?>
