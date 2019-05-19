
  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Gotopayment extends CI_Controller {
  	function __construct(){
  		parent::__construct();
  		$this->load->Model('Will_Model');
  		$this->load->helper('string');
  	}
     //print_r($_POST);


     public function gotopayment(){

       $amount = $this->input->post('amount');
       $name = $this->input->post('name');
       $email = $this->input->post('email');
       $mobile = $this->input->post('mobile');

       echo "$amount";
       $ch = curl_init();

       curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
       curl_setopt($ch, CURLOPT_HEADER, FALSE);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
       curl_setopt($ch, CURLOPT_HTTPHEADER,
                   array("X-Api-Key:0ec75dd4bc3c0555c6a7b7d07089d75a",
                         "X-Auth-Token:842e107de7debf82f826b4c9ed4b398d"));

     // $payload = Array(
     //     'purpose' => 'Will Payment',
     //     'amount' => $amount,
     //     //'phone' => $phone,
     //     'buyer_name' => $name,
     //     'redirect_url' => 'http://localhost/islamic_will/Pricing',
     //     'send_email' => true,
     //     'webhook' => '',
     //     'send_sms' => true,
     //     'email' => $email,
     //     'allow_repeated_payments' => false
     // );
     //
     // //print_r($payload);
     //
     // curl_setopt($ch, CURLOPT_POST, true);
     // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
     // $response = curl_exec($ch);
     // curl_close($ch);
     //
     // //echo $response;
     //
     // $json_decode = json_decode($response, true);
     // $longurl = $json_decode['payment_request']['longurl'];



     // header('location:'.$longurl);
     // echo "<script>window.location=".$longurl."</script>";
     $mobile='1234567890';
     $name='dhananjay';
     $email='abc@gmail.com';
     $payload = Array(
    'purpose' => 'Will Payment',
    'amount' => '10',
    'phone' => $mobile,
    'buyer_name' => $name,
    'redirect_url' => 'http://localhost/islamic_will/Pricing',
    'send_email' => true,
    'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => true,
    'email' => $email,
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
