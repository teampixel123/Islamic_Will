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
        header('Location:'.base_url().'Owner-Dashboard');
      }
      else{
        header('Location:'.base_url().'Owner-Login');
      }
    }

    public function dashboard(){
      $this->session->unset_userdata('will_id');
      $is_login = $this->session->userdata('owner_is_login');
      if($is_login){
        $owner_id = $this->session->userdata('owner_id');
        $data['owner_data'] = $this->Owner_Model->get_owner_data($owner_id);

        $data['all_will_count'] = $this->Owner_Model->all_will_count();
        $data['complete_will_count'] = $this->Owner_Model->complete_will_count();
        $data['incomplete_will_count'] = $this->Owner_Model->incomplete_will_count();

        $data['all_will_no_user_count'] = $this->Owner_Model->all_will_no_user_count();
        $data['complete_will_no_user_count'] = $this->Owner_Model->complete_will_no_user_count();
        $data['incomplete_will_no_user_count'] = $this->Owner_Model->incomplete_will_no_user_count();

        $this->load->view('admin/owner_dashboard',$data);
      }
      else{
        header('Location:'.base_url().'Owner-Login');
      }
    }

    public function will_list(){
      $this->session->unset_userdata('will_id');
      $is_login = $this->session->userdata('owner_is_login');
      if($is_login){
        $owner_id = $this->session->userdata('owner_id');
        $data['owner_data'] = $this->Owner_Model->get_owner_data($owner_id);
        $data['will_list'] = $this->Owner_Model->get_will_list();
        $this->load->view('admin/will_list',$data);
      }
      else{
        header('Location:'.base_url().'Owner-Login');
      }
    }

    public function will_list_without_user(){
      $this->session->unset_userdata('will_id');
      $is_login = $this->session->userdata('owner_is_login');
      if($is_login){
        $owner_id = $this->session->userdata('owner_id');
        $data['owner_data'] = $this->Owner_Model->get_owner_data($owner_id);
        $data['will_list'] = $this->Owner_Model->get_will_list_without_user();
        $this->load->view('admin/will_list_without_user',$data);
      }
      else{
        header('Location:'.base_url().'Owner-Login');
      }
    }

    public function delete_will(){
      $is_login = $this->session->userdata('owner_is_login');
      if($is_login){
        $owner_id = $this->session->userdata('owner_id');
        $will_id = $this->input->post('will_id');
        $user_data = $this->Owner_Model->delete_will($will_id);
        header('Location:'.base_url().'Owner-Will-List');

      }
      else{
        header('Location:'.base_url().'Owner-Login');
      }
    }

    public function update_will(){
      $will_id = $this->input->post('will_id');
      $this->session->set_userdata('will_id',$will_id);
      header('Location:'.base_url().'Will_controller/start_will_view');
    }

    public function users_list(){
      $this->session->unset_userdata('will_id');
      $is_login = $this->session->userdata('owner_is_login');
      if($is_login){
        $owner_id = $this->session->userdata('owner_id');
        $data['owner_data'] = $this->Owner_Model->get_owner_data($owner_id);
        $data['users_list'] = $this->Owner_Model->get_users_list();
        $this->load->view('admin/users_list',$data);
      }
      else{
        header('Location:'.base_url().'Owner-Login');
      }
    }

    public function payments_list(){
      $this->session->unset_userdata('will_id');
      $is_login = $this->session->userdata('owner_is_login');
      if($is_login){
        $owner_id = $this->session->userdata('owner_id');
        $data['owner_data'] = $this->Owner_Model->get_owner_data($owner_id);
        $data['payments_list'] = $this->Owner_Model->get_payments_list();
        $this->load->view('admin/payments_list',$data);
      }
      else{
        header('Location:'.base_url().'Owner-Login');
      }
    }


    public function owner_logout(){
      $this->session->sess_destroy();
      header('Location:'.base_url().'Owner-Login');
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
