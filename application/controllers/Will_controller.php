<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Will_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
    }

    public function index(){
  	  $this->load->view('pages/start_will');
  	}
    public function start_will_view(){
      $this->load->view('pages/start_will');
    }
    public function personal_info_view(){
      $this->load->view('pages/personal_info');
    }
    public function save_personal_info(){
      $will_date = date('d-m-Y');
    //  $this->load->helper('string');
  //    echo random_string('nozero',8);
      $will_data = array(
                  'will_id' => $this->input->post('will_id'),
                  'will_date' => $will_date,
                );
      $personal_data = array(
                'will_id' => $this->input->post('will_id'),
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
                'is_married'=>$this->input->post('is_married'),
                'is_have_child'=>$this->input->post('is_have_child'),
              );
        $check_mail = $this->Will_Model->check_mail_id($this->input->post('email'));
        $check_mobile = $this->Will_Model->check_mobile_no($this->input->post('mobile_no'));
      //  echo $check_mobile;
      /*  if ($check_mail > 0) {
          echo "Email Exist";
        }
        elseif ($check_mobile > 0) {
          echo "Mobile Number Exist";
        }
        else{
          $this->Will_Model->save_personal_info($personal_data);
          $this->Will_Model->save_will_data($will_data);

          $session_data = array('will_start' => 'yes','will_id' =>$this->input->post('will_id'));
          $temp_will_id =  $this->session->set_userdata($session_data);
        } */





    }


  }
 ?>
