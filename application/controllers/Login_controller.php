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

    public function mail_demo(){
      $recipient = "datta.pixelbazar@gmail.com";
      $subject = "Demo Islamic Will";
      $headers = "From: info@easywillindia.com \r\n";
      mail($recipient, $subject, 'Demo Islamic Will', $headers) or die("Error!");
	   }
    // Send OTP...
    public function save_register_user(){
      $date = date('d-m-Y');
      $security_code = random_string('nozero',8);
      $reg_name = $this->input->post('reg_name');
      $reg_mob_email = $this->input->post('reg_mob_email');
      $contact_type = $this->input->post('contact_type');

      if ($contact_type=='email') {
      $check = $this->Will_Model->check_mail_id($this->input->post('reg_mob_email'));
      }
      elseif ($contact_type=='mobile_number') {
      $check = $this->Will_Model->check_mobile_no($this->input->post('reg_mob_email'));
      }
    // $check = 0;
      if ($check >0) {
        $error = 'Mobile_Exist';
        echo json_encode($error);
      }
      else {
        $this->session->set_userdata('reg_name',$reg_name);
        $this->session->set_userdata('reg_mob_email',$reg_mob_email);
        $this->session->set_userdata('otp',$security_code);

        if ($contact_type=='mobile_number') {
          //echo $security_code;
          $fields = array(
              "sender_id" => "FSTSMS",
              "message" => "Islamic Will OTP: $security_code",
              "language" => "english",
              "route" => "p",
              "numbers" => $reg_mob_email,
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
          $from_email = "info@easywillindia.com";
          $formcontent='
    			 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 20px;font-family: Georgia, serif; ">
    			 Welcome to Easy Islamic Will
    			 </p>
    			 <hr>
    			 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Times, serif; ">
    			 Your Security Code is: '.$security_code.'
    			 </p>
    		 ';
          $recipient = $reg_mob_email;
          $subject = "Easy Islamic Will Security Code";

          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
          $headers .= 'From: '.$from_email."\r\n".
                      'Reply-To: '.$from_email."\r\n" .
                      'X-Mailer: PHP/' . phpversion();

          mail($recipient, $subject, $formcontent, $headers);
        }
        $error = $security_code;  // Change this value to success after project complete...
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

      if ($check_forget) {
        $password=$check_forget[0]['user_password'];
        $status='success';
      }
      else{
         $status='error';
      }
      echo json_encode($status);
    }
    // Save new user.. if otp is correct...
     public function validtion_password(){
      $otp = $this->input->post('otp');
      $user_password = $this->input->post('user_password');
      $otp2 = $this->session->userdata('otp');
      $contact_type= $this->input->post('contact_type');

      if($otp == $otp2 ) {
        $date = date('d-m-Y');
        $user_id = random_string('nozero',8);  // Generate user id...
        // Check for id duplication...
        $flag = 0;
        while($flag==0){
          $user_data = $this->Will_Model->get_user_data($user_id);
          if($user_data){
            $flag = 0;
            $user_id = random_string('nozero',8);
          }
          else{
            $flag = 1;
          }
        }
        if($contact_type == 'mobile_number') {
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

        // echo print_r($register_data);
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
      $from_email = "info@easywillindia.com";
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
      $user_password = $this->input->post('user_password');
      $get_data = $this->Login_Model->validate_otp($mob_email,$user_password);
       //echo print_r($get_data);
      if($get_data){
         $user_id = $get_data[0]['user_id'];
         $user_subscription = $get_data[0]['user_subscription'];
         $incomplete_will = $get_data[0]['incomplete_will'];
         $complete_will = $get_data[0]['complete_will'];
         $is_have_blur = $get_data[0]['is_have_blur'];
         $max_will = $get_data[0]['max_will'];
         $updation_end_date = $get_data[0]['updation_end_date'];
         if($this->session->userdata('temp_will_id') && $user_subscription == 1 && $max_will > 0){
           $will_id=$this->session->userdata('temp_will_id');
           $this->Login_Model->update_will_user($will_id,$user_id);
           $complete_will = $complete_will +1;
           $incomplete_will = $incomplete_will - 1;
           $will_count_data = array(
             'complete_will' => $complete_will,
             'incomplete_will' => $incomplete_will,
             'max_will' => 0,
           );
           $this->Will_Model->update_will_count($will_count_data,$user_id);

           $key = 'no';
           $this->Will_Model->set_user_noblur($user_id,$key);
           $this->Will_Model->set_will_noblur($will_id,$key);

           $will_updation_count_data = array(
             'will_rem_updations' => 1,
             'updation_last_date' => $updation_end_date,
           );
           // Save Will Updation Count and Date.. In Will Table..
           $this->Will_Model->save_date_place_info($will_id,$will_updation_count_data);
         }
         else if($this->session->userdata('temp_will_id') && $is_have_blur=='no' && $max_will == 0){
           $will_id=$this->session->userdata('temp_will_id');
           $this->Login_Model->update_will_user($will_id,$user_id);
           $complete_will = $complete_will +1;
           $incomplete_will = $incomplete_will - 1;
           $will_count_data = array(
             'complete_will' => $complete_will,
             'incomplete_will' => $incomplete_will,
           );
           $this->Will_Model->update_will_count($will_count_data,$user_id);

           $key = 'yes';
           $this->Will_Model->set_user_noblur($user_id,$key);
           $this->Will_Model->set_will_noblur($will_id,$key);
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
