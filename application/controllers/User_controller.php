<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class User_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
      $this->load->Model('User_Model');
    }

    public function user_dashboard(){
      $is_login = $this->session->userdata('user_is_login');
      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->Will_Model->get_user_data($user_id);
        // foreach ($user_data as $user_data) {
        //   echo $user_data->user_fullname;
        // }
        $this->load->view('pages/user_dashboard',['user_data'=>$user_data]);
      }
      else{
        header('Location:login');
      }
    }

    // Will List... Datta...
    public function will_list(){
      $is_login = $this->session->userdata('user_is_login');
      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $data['user_data'] = $this->Will_Model->get_user_data($user_id);
        $data['will_list'] = $this->User_Model->get_will_list($user_id);
        //echo $will_list;
        $this->load->view('pages/will_list',$data);
      }
      else{
        header('Location:login');
      }
    }

    //Detail will view... datta...
    public function will_details(){
      $is_login = $this->session->userdata('user_is_login');
      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $will_id = $this->input->post('will_id');
        $data['user_data'] = $this->Will_Model->get_user_data($user_id);
        $data['personal_info'] = $this->Will_Model->get_personal_data($will_id);
        $data['family_info'] = $this->Will_Model->get_family_member_list($will_id);

        $data['real_estate'] = $this->Will_Model->get_real_estate($will_id);


        $data['executor'] = $this->Will_Model->get_executor($will_id);
        $data['funeral'] = $this->Will_Model->get_funeral($will_id);
        //echo $will_id;
        //$data['will_list'] = $this->User_Model->get_will_list($user_id);
        //echo $will_list;
        $this->load->view('pages/will_details',$data);
      }
      else{
        header('Location:login');
      }
    }

  }
?>
