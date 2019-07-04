<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Gateway extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->Model('User_Model');
    $this->load->Model('Login_Model');
    $this->load->Model('Will_Model');
    $this->load->helper('string');
  }

  public function payment(){
    if($this->session->userdata('user_id')){
        $user_id = $this->session->userdata('user_id');
        $this->session->set_flashdata('pack_name',$this->input->post('pack_name'));
        $amount = $this->input->post('amount');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');

        if($mobile == ''){$mobile = '9999999999';}
        if($email == ''){$email = 'datta@pixelbazar.com';}

        $ch = curl_init();

         curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
         curl_setopt($ch, CURLOPT_HEADER, FALSE);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
         curl_setopt($ch, CURLOPT_HTTPHEADER,
          array("X-Api-Key:test_0d6432ff71bdad7c1c14113908c",
                 "X-Auth-Token:test_26525dbef8eb3c043dc53600da4"));
         //             // array("X-Api-Key:0ec75dd4bc3c0555c6a7b7d07089d75a",
         //             //       "X-Auth-Token:842e107de7debf82f826b4c9ed4b398d"));
         // For Localhost..
         $payload = Array(
             'purpose' => 'Will Payment',
             'amount' => $amount,
             'phone' => $mobile,
             'buyer_name' => $user_id,
             'redirect_url' => 'http://www.islamic.easywillindia.com/Payment_Gateway/success',
             'send_email' => true,
             'webhook' => 'http://www.islamic.easywillindia.com/Payment_Gateway/webhook',
             'send_sms' => true,
             'email' => $email,
             'allow_repeated_payments' => false
         );
         // For Online..
       //   $payload = Array(
       //     'purpose' => 'Will Payment',
       //     'amount' => $amount,
       //     'phone' => $mobile,
       //     'buyer_name' => $user_id,
       //     'redirect_url' => base_url().'Payment_Gateway/success',
       //     'send_email' => true,
       //     'webhook' => base_url().'Payment_Gateway/webhook',
       //     'send_sms' => true,
       //     'email' => $email,
       //     'allow_repeated_payments' => false
       // );
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
         $response = curl_exec($ch);
         curl_close($ch);



         $json_decode= json_decode($response, 'true');
         $long_url=$json_decode['payment_request']['longurl'];
         header('Location:'.$long_url);
      }
      else{
        header('Location:'.base_url().'Login');
      }
  }

  public function success(){

        date_default_timezone_set('Asia/Kolkata');
        $user_id = $this->session->userdata('user_id');
        $date = date('d-m-Y');
        $user_id = $this->session->userdata('user_id');
        $pack_name = $this->session->flashdata('pack_name');
        $thirty_days_ahead =  date('d-m-Y', strtotime("+30 days"));
        $ninety_days_ahead =  date('d-m-Y', strtotime("+90 days"));

        if($pack_name == 'Silver'){
          $updation_end_date = $thirty_days_ahead;
        }
        else{
          $updation_end_date = $ninety_days_ahead;
        }
        $subscription_info = array(
          'user_subscription_type' => $pack_name,
          'user_subscription_start_date' => $date,
          'user_subscription_end_date' => $thirty_days_ahead,
          'updation_end_date' => $updation_end_date,
          'user_subscription ' => 1,
          'max_will' => 1,
          'complete_will' => 0,
          'incomplete_will' => 1,
          'rem_updations' => 1,
          'pdf_download' => 0,
        );

        $this->User_Model->update_subscription_info($user_id,$subscription_info);
        $this->session->set_flashdata('subscription_status','success');

        if($this->session->userdata('temp_will_id')){
          $will_id=$this->session->userdata('temp_will_id');
          $this->Login_Model->update_will_user($will_id,$user_id);
          $will_count_data = array(
            'max_will' => 0,
            'complete_will' => 1,
            'incomplete_will' => 0,
          );
          $this->User_Model->update_subscription_info($user_id,$will_count_data);

          $will_updation_count_data = array(
            'will_rem_updations' => 1,
            'updation_last_date' => $updation_end_date,
          );
          // Save Will Updation Count and Date..
          $this->Will_Model->save_date_place_info($will_id,$will_updation_count_data);
          // $this->session->unset_userdata('temp_will_id');
        }
        header('location:'.base_url().'User-Dashboard');

  }

  public function webhook(){
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y');
    $time = date('h:ia');
    $data = $_POST;
    $payment_id = $data['payment_id'];
    $payment_request_id = $data['payment_request_id'];
    $amount = $data['amount'];
    $fees = $data['fees'];
    $user_id = $data['buyer_name'];
    $status = $data['status'];

    // $this->session->set_userdata['status',$status];

    if($satus = 'Credit'){
        $payment_data = array(
          'user_id' => $user_id,
          'payment_id' => $payment_id,
          'payment_request_id' => $payment_request_id,
          'payment_date' => $date,
          'payment_time' => $time,
          'payment_amount' => $amount,
          'payment_fees' => $fees,
        );

        $this->User_Model->save_payment_info($payment_data);
    }

  }
}


// Test databaseNumber: 4242 4242 4242 4242
// Number: 4242 4242 4242 4242
// Date: Any valid future date
// CVV: 111
// Name: abc
// 3D-secure password: 1221
   ?>
