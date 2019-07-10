<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class User_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
      $this->load->Model('User_Model');
    }

    public function login(){
      $this->session->unset_userdata('user_is_login');
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('is_subscrided');
      $this->load->view('pages/login');
  	}

    public function user_dashboard(){
      $is_login = $this->session->userdata('user_is_login');
      $this->session->unset_userdata('will_id');
      $this->session->unset_userdata('set_update');
      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->Will_Model->get_user_data($user_id);
        foreach ($user_data as $data2) {
          $user_subscription1 = $data2->user_subscription;
          $incomplete_will = $data2->incomplete_will;
        }
        if($user_subscription1 == 1){
          $this->session->set_userdata('is_subscrided','yes');
        }

        $this->load->view('pages/user_dashboard',['user_data'=>$user_data]);
      }
      else{
        header('Location:'.base_url().'Login');
      }
    }
    // Will List... Datta...
    public function will_list(){
      $is_login = $this->session->userdata('user_is_login');
      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $user_data2 = $this->Will_Model->get_user_data($user_id);
        foreach ($user_data2 as $data2) {
          $user_subscription1 = $data2->user_subscription;
        }
        if($user_subscription1 == 1){
          $data['user_data'] = $this->Will_Model->get_user_data($user_id);
          $data['will_list'] = $this->User_Model->get_will_list($user_id);
          $this->load->view('pages/will_list_table',$data);
        }
        else{
          header('Location:'.base_url().'User-Dashboard');
        }
      }
      else{
        header('Location:'.base_url().'Login');
      }
    }

    //Detail will view... datta...
    // public function will_details(){
    //   $is_login = $this->session->userdata('user_is_login');
    //   if($is_login){
    //     $user_id = $this->session->userdata('user_id');
    //     $will_id = $this->input->post('will_id');
    //     $data['user_data'] = $this->Will_Model->get_user_data($user_id);
    //     $data['personal_info'] = $this->Will_Model->get_personal_data($will_id);
    //     $data['family_info'] = $this->Will_Model->get_family_member_list($will_id);
    //
    //     $data['real_estate'] = $this->Will_Model->get_real_estate($will_id);
    //
    //
    //     $data['executor'] = $this->Will_Model->get_executor($will_id);
    //     $data['funeral'] = $this->Will_Model->get_funeral($will_id);
    //     //echo $will_id;
    //     //$data['will_list'] = $this->User_Model->get_will_list($user_id);
    //     //echo $will_list;
    //     $this->load->view('pages/will_details',$data);
    //   }
    //   else{
    //     header('Location:login');
    //   }
    // }


    public function user_profile(){
      $is_login = $this->session->userdata('user_is_login');
      $user_id = $this->session->userdata('user_id');
      if($is_login && $user_id){
        $user_data = $this->Will_Model->get_user_data($user_id);
        foreach ($user_data as $data) {
          $user_subscription = $data->user_subscription;
        }
        if($user_subscription == 1){
          $this->load->view('pages/update_profile',['user_data'=>$user_data]);
        }
        else{
          header('Location:'.base_url().'User-Dashboard');
        }
      }
      else{
        $this->session->sess_destroy();
        header('Location:'.base_url().'Login');
      }

    }


    public function profile(){
      $is_login = $this->session->userdata('user_is_login');
      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->Will_Model->get_user_data($user_id);
        foreach ($user_data as $data) {
          $user_subscription = $data->user_subscription;
        }
        if($user_subscription == 1){
          $this->load->view('pages/user_profile',['user_data'=>$user_data]);
        }
        else{
          header('Location:'.base_url().'User-Dashboard');
        }
      }
      else{
        header('Location:'.base_url().'Login');
      }
    }

    public function update_user(){
      $is_login = $this->session->userdata('user_is_login');

      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $config['upload_path']="assets/images";
         $config['allowed_types']='gif|jpg|png';
         $config['file_name']=$user_id;
         $filename=$_FILES['profile_phto']['name'];
         $ext= pathinfo($filename,PATHINFO_EXTENSION);
         $this->load->library('upload',$config);
         if($this->upload->do_upload("profile_phto")){
            $data = array('upload_data' => $this->upload->data());
              $update_user = array(
              'user_fullname'=>$this->input->post('username'),
              'user_mobile_number'=>$this->input->post('mobile'),
              'user_email_id'=>$this->input->post('email'),
              'profile_phto' =>$data['upload_data']['file_name'],
            );
          }
          else{
            $update_user = array(
            'user_fullname'=>$this->input->post('username'),
            'user_mobile_number'=>$this->input->post('mobile'),
            'user_email_id'=>$this->input->post('email'),
          );
        }
         $this->User_Model->update_user($update_user,$user_id);
    }
    else{
      header('Location:'.base_url().'Login');
    }
    }

    public function update_password(){
       $this->load->library('form_validation');
       $this->form_validation->set_rules('password', 'Password', 'required');
      $is_login = $this->session->userdata('user_is_login');
      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $update_password = array(
        'user_password'=>$this->input->post('password'),
      );
       $this->User_Model->update_password($update_password,$user_id);
       header('location:profile');
      }
      else{
        header('Location:'.base_url().'Login');
      }
    }

  }
?>
