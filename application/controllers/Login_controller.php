<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
      $this->load->Model('Login_Model');
      $this->load->helper('string');
    }

    public function generate_otp(){
      $mob_email = $this->input->post('mob_email');

      $result = $this->Login_Model->check_valid_mob_email($mob_email);

      if($result){
        $will_id = $result[0]['will_id'];
        $otp = random_string('nozero',6);
        $current_date = date('d-m-Y');
        $current_time = date('H:i:s');
        $endTime2 = strtotime("+15 minutes",strtotime($current_time));
        $end_time = date('H:i:s', $endTime2);

        $update_otp_data = array(
          'otp' => $otp,
          'otp_date' => $current_date,
          'otp_start_time' => $current_time,
          'otp_end_time' => $end_time,
        );
        $this->Login_Model->update_otp($will_id,$update_otp_data);
        $result['responce'] = 'Success';
        $result['will_id'] = $will_id;
        echo json_encode($result);
      }
      else{
        $result['responce'] = 'Invalide';
        echo json_encode($result);
      }
    }

    public function login_user(){
      $will_id = $this->input->post('will_id');
      $otp = $this->input->post('otp');
      $current_date = date('d-m-Y');
      $current_time = date('H:i:s');

      $get_data = $this->Login_Model->get_otp_data($will_id,$otp);
      if($get_data){
        $otp_date = $get_data[0]['otp_date'];
        $otp_end_time = $get_data[0]['otp_end_time'];
         if(strtotime($otp_date) == strtotime($current_date) && strtotime($current_time) <= strtotime($otp_end_time)){
           //$this->session->sess_destroy();
           $session_data = array('user_is_login' => 'YES','will_id' =>$will_id);
           $this->session->set_userdata($session_data);
           $result['responce'] = 'Success';
         }
         else{
           $result['responce'] = 'Expire_OTP';
         }
      }
      else{
        $result['responce'] = 'Invalide_OTP';
      }
      echo json_encode($result);
    }
  }
  ?>
