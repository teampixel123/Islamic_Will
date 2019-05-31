<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Owner_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
      $this->load->Model('User_Model');
    }

    public function dashboard(){
      $is_login = $this->session->userdata('user_is_login');
      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->Will_Model->get_user_data($user_id);
        // foreach ($user_data as $user_data) {
        //   echo $user_data->user_fullname;
        // }
        $this->load->view('admin/owner_dashboard',['user_data'=>$user_data]);
      }
      else{
        header('Location:login');
      }
    }

    public function login(){
      $is_login = $this->session->userdata('user_is_login');
      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->Will_Model->get_user_data($user_id);
        // foreach ($user_data as $user_data) {
        //   echo $user_data->user_fullname;
        // }
        $this->load->view('admin/login',['user_data'=>$user_data]);
      }
      else{
        header('Location:login');
      }
    }

    public function register(){
      $is_login = $this->session->userdata('user_is_login');
      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->Will_Model->get_user_data($user_id);
        // foreach ($user_data as $user_data) {
        //   echo $user_data->user_fullname;
        // }
        $this->load->view('admin/register',['user_data'=>$user_data]);
      }
      else{
        header('Location:login');
      }
    }



}
