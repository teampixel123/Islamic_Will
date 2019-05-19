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
      $user_password = random_string('nozero',8);
      $reg_name = $this->input->post('reg_name');
      $reg_mob_email = $this->input->post('reg_mob_email');
      $contact_type = $this->input->post('contact_type');
       // echo $user_password;


      if ($contact_type=='email') {
      $check = $this->Will_Model->check_mail_id($this->input->post('reg_mob_email'));
      }
      elseif ($contact_type=='mobile_number') {
      $check = $this->Will_Model->check_mobile_no($this->input->post('reg_mob_email'));
      }
      if ($check >0) {
        $error = 'Mobile_Exist';
        echo json_encode($error);
      }
      else {
        $this->session->set_userdata('reg_name',$reg_name);
        $this->session->set_userdata('reg_mob_email',$reg_mob_email);
        $this->session->set_userdata('otp',$user_password);

        if ($contact_type=='mobile_number') {
          $fields = array(
              "sender_id" => "FSTSMS",
              "message" => "Islamic Will OTP: $user_password",
              "language" => "english",
              "route" => "p",
              "numbers" => "8482860057",
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
              "authorization: zHGpE0Cl6iqLKWtmBrNx3oARIkjnVh8c7Xde9MvfDSFOTZ4aJ5Sa0mUig3pQqET2IvFjK1AwrkbzfCyu",
              "accept: */*",
              "cache-control: no-cache",
              "content-type: application/json"
            ),
          ));
          $res = curl_exec($curl);
          $err = curl_error($curl);
          curl_close($curl);

        }
           else
        {
          $from_email = "asif@pixelbazar.com";
          //$to_email = $this->input->post('email');
          // $to_email = $mail_id;
          //Load email library
          $this->load->library('email');

          $this->email->from($from_email);
          $this->email->to('mullaa064@gmail.com');
          $this->email->subject('Islamic Will OTP');
          $this->email->message('Islamic Will OTP:'.$user_password);

        }

        $error = $user_password;
        echo json_encode($error);
      }


    }

    // public function save_forget1($reg_mob_email){
    //   $this->db->select('user_mobile_number');
    //   $this->db->from('tbl_user');
    //   $this->db->where("user_email_id = '$mob_email' or user_mobile_number = '$mob_email'");
    //   $query =  $this->db->get();
    //   $num = $query->num_rows();
    //   return $num;
    // }



    public function save_forget(){

      $reg_mob_email = $this->input->post('reg_mob_email');
       $contact_type = $this->input->post('contact_type');

          $check_forget = $this->Will_Model->check_forget($reg_mob_email);
          // echo $check_forget;
          if ($check_forget) {
              $password=$check_forget[0]['user_password'];
             $status='success';
           }
         else
          {
         $status='error';
      }
      echo json_encode($status);
}

       public function validtion_password(){
         $otp = $this->input->post('otp');
        $user_password = $this->input->post('user_password');
        $otp2 = $this->session->userdata('otp');
        $contact_type= $this->input->post('contact_type');


        if ($otp == $otp2 ) {

          $date = date('d-m-Y');
          $user_id = random_string('nozero',8);

          if ($this->session->userdata('will_id')){
            $will_id=$this->session->userdata('will_id');
                $this->Login_Model->update_will_user($will_id,$user_id);
          }
          if ($contact_type == 'mobile_number') {
            $register_data = array(
              'user_id' => $user_id,
              'user_fullname' => $this->session->userdata('reg_name'),
              'user_mobile_number' => $this->session->userdata('reg_mob_email'),
              'user_password' => $user_password,
              'reg_date' => $date,
            );
          }
          else {
            $register_data = array(
              'user_id' => $user_id,
              'user_fullname' => $this->session->userdata('reg_name'),
              'user_email_id' => $this->session->userdata('reg_mob_email'),
              'user_password' => $user_password,
              'reg_date' => $date,
            );
          }
          $this->Login_Model->save_register_user($register_data);


            $session_data = array('user_is_login' => 'YES','user_id' =>$user_id);
            $this->session->set_userdata($session_data);
            $result['responce'] = 'Valide';
        }
        else{
          $result['responce'] = 'Invalide';
        }
        echo json_encode($result);
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
            "numbers" => "8482860057",
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
      $mob_email = $this->input->post('mob_email');
      // $otp = $this->input->post('otp');
      $user_password = $this->input->post('user_password');
      // $current_date = date('d-m-Y');
      // $current_time = date('H:i:s');

       $get_data = $this->Login_Model->validate_otp($mob_email,$user_password);
      // echo $get_data;
      if($get_data){

         $user_id = $get_data[0]['user_id'];

         if ($this->session->userdata('will_id')){
           $will_id=$this->session->userdata('will_id');
               $this->Login_Model->update_will_user($will_id,$user_id);
         }
           $session_data = array('user_is_login' => 'YES','user_id' =>$user_id);
           $this->session->set_userdata($session_data);
           $result['responce'] = 'Success';

      }
      else{
        $result['responce'] = 'Invalide_Password';
      }
       echo json_encode($result);
    }
  }
  ?>
