<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Owner_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
      $this->load->Model('User_Model');
      $this->load->Model('Owner_Model');
    }

    public function login_view(){

        $this->load->view('admin/login');
    }
    public function index(){
        $this->load->view('admin/login');
    }

    // Check Login
    public function owner_login(){
    echo  $username = $this->input->post('username');
    echo  $password = $this->input->post('password');
      //echo $username.'<br>'.$password;
      $login = $this->Owner_Model->check_login($username,$password);
// echo print_r($login);
      if($login){
        foreach ($login as $login_data) {
          $owner_id = $login_data->owner_id;
        }
        $session_data = array('owner_is_login' => 'YES','owner_id' =>$owner_id);
        $this->session->set_userdata($session_data);
        header('Location:'.base_url().'Owner_controller/dashboard');
      }
      else{
        header('Location:'.base_url().'Owner_controller/login_view');
      }
    }

    public function dashboard(){
      $is_login = $this->session->userdata('owner_is_login');
      if($is_login){
        $owner_id = $this->session->userdata('owner_id');
        $owner_data = $this->Owner_Model->get_owner_data($owner_id);
        $this->load->view('admin/owner_dashboard',['owner_data'=>$owner_data]);
      }
      else{
        header('Location:login_view');
      }
    }

    public function will_list(){
      $is_login = $this->session->userdata('owner_is_login');
      if($is_login){
        $owner_id = $this->session->userdata('owner_id');
        $data['owner_data'] = $this->Owner_Model->get_owner_data($owner_id);
        $data['will_list'] = $this->Owner_Model->get_will_list();
        $this->load->view('admin/will_list',$data);
      }
      else{
        header('Location:login_view');
      }
    }

    public function delete_will(){
      $is_login = $this->session->userdata('owner_is_login');
      if($is_login){
        $owner_id = $this->session->userdata('owner_id');
        $will_id = $this->input->post('will_id');
        $user_data = $this->Owner_Model->delete_will($will_id);
        header('Location:will_list');
      }
      else{
        header('Location:login_view');
      }
    }


    // public function register(){
    //   $is_login = $this->session->userdata('user_is_login');
    //   if($is_login){
    //     $user_id = $this->session->userdata('user_id');
    //     $user_data = $this->Will_Model->get_user_data($user_id);
    //     $this->load->view('admin/register',['user_data'=>$user_data]);
    //   }
    //   else{
    //     header('Location:login_view');
    //   }
    // }



}
