<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Will_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
    }

    public function index(){
  	  //$this->load->view('pages/start_will');
      $this->load->view('pages/personal_info');
  	}

    public function start_will_view(){
      $this->load->view('pages/family_info');
    }

    public function family_info_view(){
      $this->load->view('pages/family_info');
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

    public function personal_info_view(){
      $this->load->view('pages/personal_info');
    }

    /**************************************************************/
    /*            save personal info.... datta...                 */
    /**************************************************************/
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
    /*            Save/Add Family Member... datta...             */
    /**************************************************************/
    public function save_family_member(){
      $will_id = $this->session->userdata('will_id');
      $member_data = array(
                  'will_id' => $will_id,
                  'relationship' => $this->input->post('relationship'),
                  'family_person_name' => $this->input->post('family_person_name'),
                  'family_person_dob' => $this->input->post('family_person_dob'),
                  'age' => $this->input->post('age'),
                );
      $this->Will_Model->save_family_member($member_data);

      $family_member_list = $this->Will_Model->get_family_member_list($will_id);
      echo json_encode($family_member_list);
    }

    /**************************************************************/
    /*            Get all Family Members... datta...             */
    /**************************************************************/
    public function get_family_member_list(){
      $will_id = $this->session->userdata('will_id');
      $family_member_list = $this->Will_Model->get_family_member_list($will_id);
      echo json_encode($family_member_list);
    }

    public function destroy_session(){
      $this->session->unset_userdata('will_id');
      $this->session->unset_userdata('will_start');
      $this->session->sess_destroy();
    }

  }
 ?>
