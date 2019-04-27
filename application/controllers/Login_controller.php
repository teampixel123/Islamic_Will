<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
      $this->load->Model('Login_Model');
      $this->load->helper('string');
    }

    public function register_user_view(){
      $this->load->view('pages/register_user');
    }

    public function save_register_user(){
      $date = date('d-m-Y');
      $user_id = random_string('nozero',8);
      $register_data = array(
        'user_id' => $user_id,
        'user_fullname' => $this->input->post('reg_name'),
        'user_mobile_number' => $this->input->post('reg_mobile'),
        'user_email_id' => $this->input->post('reg_email'),
        'reg_date' => $date,
      );
      $this->Login_Model->save_register_user($register_data);
      header('location:'.base_url().'Will_controller/login');
      //$this->load->view('pages/register_user');
    }




    public function generate_otp(){
      $mob_email = $this->input->post('mob_email');

      $result = $this->Login_Model->check_valid_mob_email($mob_email);

      if($result){
        foreach ($result as $result) {
        }
        $mail_id = $result['user_email_id'];
        $mobile_number = $result['user_email_id'];
        $user_id = $result['user_id'];
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
        $this->Login_Model->update_otp($user_id,$update_otp_data);
        //$this->send_mail($mail_id);


        $fields = array(
            "sender_id" => "FSTSMS",
            "message" => "Islamic Will OTP: $otp",
            "language" => "english",
            "route" => "p",
            "numbers" => "9021182154",
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($fields),
          CURLOPT_HTTPHEADER => array(
            "authorization: Bh5q8W1QZsOMXykx62ETzFJeGnlu93YimCdNKHIgjVbfUDLrv00qyONVJDaUcY8pR4QdnBbHkjxP13sI",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));
        $res = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        // if ($err) {
        //   echo "cURL Error #:" . $err;
        // } else {
        //   echo $res;
        // }
        $result['responce'] = 'Success';
        $result['user_id'] = $user_id;
        echo json_encode($result);
      }
      else{
        $result['responce'] = 'Invalide';
        echo json_encode($result);
      }
    }

    public function send_mail($mail_id) {
      $from_email = "datta@pixelbazar.com";
      //$to_email = $this->input->post('email');
      $to_email = $mail_id;
      //Load email library
      $this->load->library('email');

      $this->email->from($from_email, 'Your Name');
      $this->email->to($to_email);
      $this->email->subject('Email Test');
      $this->email->message('Testing the email class.');

      //Send mail
      if($this->email->send()){
        $this->session->set_flashdata("email_sent","Email sent successfully.");
      }
      else{
        $this->session->set_flashdata("email_sent","Error in sending Email.");
        $this->load->view('email_form');
      }
    }


    public function login_user(){
      $user_id = $this->input->post('user_id');
      $otp = $this->input->post('otp');
      $current_date = date('d-m-Y');
      $current_time = date('H:i:s');

      $get_data = $this->Login_Model->validate_otp($user_id,$otp);
      if($get_data){
        $otp_date = $get_data[0]['otp_date'];
        $otp_end_time = $get_data[0]['otp_end_time'];
         if(strtotime($otp_date) == strtotime($current_date) && strtotime($current_time) <= strtotime($otp_end_time)){
           //$this->session->sess_destroy();
           $session_data = array('user_is_login' => 'YES','user_id' =>$user_id);
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
