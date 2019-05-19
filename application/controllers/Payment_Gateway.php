<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Gateway extends CI_Controller {

 public function payment(){



   $ch = curl_init();

   curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
   curl_setopt($ch, CURLOPT_HEADER, FALSE);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
   curl_setopt($ch, CURLOPT_HTTPHEADER,
               array("X-Api-Key:0ec75dd4bc3c0555c6a7b7d07089d75a",
                     "X-Auth-Token:842e107de7debf82f826b4c9ed4b398d"));
   $payload = Array(
       'purpose' => 'Will Payment',
       'amount' => '1250',
       'phone' => '9999999999',
       'buyer_name' => 'John Doe',
       'redirect_url' => 'http://www.example.com/redirect/',
       'send_email' => true,
       'webhook' => 'http://www.example.com/webhook/',
       'send_sms' => true,
       'email' => 'foo@example.com',
       'allow_repeated_payments' => false
   );
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
   $response = curl_exec($ch);
   curl_close($ch);



   $json_decode= json_decode($response, 'true');
   $long_url=$json_decode['payment_request']['longurl'];
   header('Location:'.$long_url);


}
}
   ?>
