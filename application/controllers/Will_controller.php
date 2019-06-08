<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Will_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
      $this->load->Model('Table_Model');
      $this->load->helper('string');
    }

    public function demo_page(){
      $this->session->sess_destroy();
      $this->load->view('pages/demo_page');
    }

    public function index(){
      $this->session->sess_destroy();
      $this->load->view('pages/start_will');
  	}

    public function login(){
      //$this->session->sess_destroy();
      $this->load->view('pages/login');
  	}
    public function logout(){
      $this->session->sess_destroy();
      header('location:login');
  	}

    public function forget_pass(){
      $this->session->sess_destroy();
      $this->load->view('pages/forget_pass');
    }

  public function make_will_view(){
    $is_login = $this->session->userdata('user_is_login');
    $user_id = $this->session->userdata('user_id');
    if($is_login && $user_id){
      $this->session->unset_userdata('will_id');
        header('location:start_will_view');
    }
    else {
      $this->session->sess_destroy();
      header('location:login');
    }
  }
    public function start_will_view(){
      $is_login = $this->session->userdata('user_is_login');
      $user_id = $this->session->userdata('user_id');
      if($is_login && $user_id){

        $user_data = $this->Will_Model->get_user_data($user_id);
        // $this->load->view('pages/start_will',['user_data'=>$user_data]);
         $this->load->view('pages/start_will',['user_data'=>$user_data]);
      }
      else{
      $this->session->sess_destroy();
      $this->load->view('pages/start_will');
    }
    }

    public function personal_info_view(){
      $is_login = $this->session->userdata('user_is_login');
      $user_id = $this->session->userdata('user_id');
      if($is_login && $user_id){
        $user_data = $this->Will_Model->get_user_data($user_id);
        $this->load->view('pages/personal_info',['user_data'=>$user_data]);
      }
      else{
        $this->load->view('pages/personal_info');
      }
  	}

    public function load_login_start_info(){
      $is_login = $this->session->userdata('user_is_login');
      if($is_login && $this->input->post('will_id')){
        $will_id = $this->input->post('will_id');
        $this->session->set_userdata('will_id',$will_id);
        header('location:start_will_view');
      }
      else{
        header('location:login');
      }
    }

    public function family_info_view(){
      $is_login = $this->session->userdata('user_is_login');
      $user_id = $this->session->userdata('user_id');
      if($is_login && $user_id){
        $user_data = $this->Will_Model->get_user_data($user_id);
        $this->load->view('pages/family_info',['user_data'=>$user_data]);
      }
      else{
        $this->load->view('pages/family_info');
      }
    }

    public function executor_funeral_view(){
      $is_login = $this->session->userdata('user_is_login');
      $user_id = $this->session->userdata('user_id');
      if($is_login && $user_id){
        $user_data = $this->Will_Model->get_user_data($user_id);
        $this->load->view('pages/executor_funeral',['user_data'=>$user_data]);
      }
      else{
        $this->load->view('pages/executor_funeral');
      }
    }

    public function assets_info_view(){
      $is_login = $this->session->userdata('user_is_login');
      $user_id = $this->session->userdata('user_id');
      if($is_login && $user_id){
        $user_data = $this->Will_Model->get_user_data($user_id);
        $this->load->view('pages/assets_info',['user_data'=>$user_data]);
      }
      else{
        $this->load->view('pages/assets_info');
      }
    }

    public function witness_info_view(){
      $is_login = $this->session->userdata('user_is_login');
      $user_id = $this->session->userdata('user_id');
      if($is_login && $user_id){
        $user_data = $this->Will_Model->get_user_data($user_id);
        $this->load->view('pages/witness_info',['user_data'=>$user_data]);
      }
      else{
      $this->load->view('pages/witness_info');
      }
    }

    public function user_dashboard(){
      $is_login = $this->session->userdata('user_is_login');
      if($is_login){
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->Will_Model->get_user_data($user_id);
        $this->load->view('pages/user_dashboard',['user_data'=>$user_data]);
      }
      else{
        header('Location:login');
      }
    }

    // public function will_list(){
    //   $is_login = $this->session->userdata('user_is_login');
    //   if($is_login){
    //     $user_id = $this->session->userdata('user_id');
    //     $user_data = $this->Will_Model->get_user_data($user_id);
    //     $this->load->view('pages/will_list_table',['user_data'=>$user_data]);
    //   }
    //   else{
    //     header('Location:login');
    //   }
    // }

 public function pdf_view2(){
  $this->load->view('pages/pdf');
 }

 public function pdf_view(){
  $this->load->view('pages/final_pdf');
 }

 /**************************************************************/
 /*            delete Will  .... dhananjay...               */
 /**************************************************************/
 public function delete_will(){
   $is_login = $this->session->userdata('user_is_login');
   $user_id = $this->session->userdata('user_id');
   if($is_login && $user_id ){
       $will_id = $this->input->post('will_id');
       $user_data = $this->Will_Model->delete_will($will_id);

     header('Location:'.base_url().'User_controller/will_list');
   }
   else{
     $this->load->view('pages/personal_info');
   }
 }

 /**************************************************************/
 /*            Save Will Start info.... datta...               */
 /**************************************************************/
 public function save_start_info(){
   $will_date = date('d-m-Y');
   $will_id = random_string('nozero',8);
   // $user_id = random_string('nozero',8);
   $name_title = $this->input->post('name_title');

   if($name_title == 'Miss.' || $name_title == 'Mrs.'){
     $gender = "Female";
   }
   else{
     $gender = "Male";
   }

   $is_login = $this->session->userdata('user_is_login');
   if($is_login){
     $user_id = $this->session->userdata('user_id');

     $will_data = array(
       'will_id' => $will_id,
       'will_date' => $will_date,
       'will_user_id' => $user_id,
     );
     $start_data = array(
       'will_id' => $will_id,
       'name_title'=>$this->input->post('name_title'),
       'full_name'=>$this->input->post('full_name'),
       'mobile_no'=>$this->input->post('mobile_no'),
       'email'=>$this->input->post('email'),
       'gender'=>$gender,
       'marital_status'=>$this->input->post('marital_status'),
       'is_have_child'=>$this->input->post('is_have_child'),
     );

    $this->Will_Model->save_start_info($start_data);
    $this->Will_Model->save_will_data($will_data);

    $session_data = array('will_start' => 'yes','will_id' =>$will_id);
    $temp_will_id =  $this->session->set_userdata($session_data);

    $get_personal_data = $this->Will_Model->get_personal_data($will_id);
    echo json_encode($get_personal_data);
   }

     else{
        $will_data = array(
          'will_id' => $will_id,
          'will_date' => $will_date,
        );
        $start_data = array(
          'will_id' => $will_id,
          'name_title'=>$this->input->post('name_title'),
          'full_name'=>$this->input->post('full_name'),
          'mobile_no'=>$this->input->post('mobile_no'),
          'email'=>$this->input->post('email'),
          'gender'=>$gender,
          'marital_status'=>$this->input->post('marital_status'),
          'is_have_child'=>$this->input->post('is_have_child'),
        );

       $this->Will_Model->save_start_info($start_data);
       $this->Will_Model->save_will_data($will_data);

       $session_data = array('will_start' => 'yes','will_id' =>$will_id);
       $temp_will_id =  $this->session->set_userdata($session_data);

       $get_personal_data = $this->Will_Model->get_personal_data($will_id);
       echo json_encode($get_personal_data);
     }
  }

 public function update_start_data(){
   $will_id = $this->input->post('will_id');
   if($name_title == 'Miss.' || $name_title == 'Mrs.'){
     $gender = "Female";
   }
   else{
     $gender = "Male";
   }
   $start_data = array(
     'name_title'=>$this->input->post('name_title'),
     'full_name'=>$this->input->post('full_name'),
     'mobile_no'=>$this->input->post('mobile_no'),
     'email'=>$this->input->post('email'),
     'gender'=>$gender,
     'marital_status'=>$this->input->post('marital_status'),
     'is_have_child'=>$this->input->post('is_have_child'),
   );
   $this->Will_Model->update_start_data($will_id,$start_data);

 }

 /**************************************************************/
 /*            Save personal info.... datta...                 */
 /**************************************************************/
 // public function save_personal_info(){
 //   $will_date = date('d-m-Y');
 //   $will_id = random_string('nozero',8);
 //   $user_id = random_string('nozero',8);
 //   $name_title = $this->input->post('name_title');
 //
 //   if($name_title == 'Miss.'){
 //     $marital_status = 'Unmarried';
 //     $is_have_child = '0';
 //   }
 //   else {
 //     $marital_status = $this->input->post('marital_status');
 //     $is_have_child = $this->input->post('is_have_child');
 //   }
 //
 //   if($marital_status == 'Unmarried'){
 //     $is_have_child = '0';
 //   }
 //
 //   $will_data = array(
 //               'will_id' => $will_id,
 //               'will_date' => $will_date,
 //               'will_user_id' => $user_id,
 //             );
 //    $user_data = array(
 //      'user_id'=>$user_id,
 //      'user_fullname'=>$this->input->post('full_name'),
 //      'user_mobile_number'=>$this->input->post('mobile_no'),
 //      'user_email_id'=>$this->input->post('email'),
 //      'reg_date' => $will_date,
 //    );
 //   $personal_data = array(
 //             'will_id' => $will_id,
 //             'name_title'=>$this->input->post('name_title'),
 //             'full_name'=>$this->input->post('full_name'),
 //             'address'=>$this->input->post('address'),
 //             'city'=>$this->input->post('city'),
 //             'pin_code'=>$this->input->post('pin_code'),
 //             'state'=>$this->input->post('state'),
 //             'country'=>$this->input->post('country'),
 //             'mobile_no'=>$this->input->post('mobile_no'),
 //             'email'=>$this->input->post('email'),
 //             'occupation'=>$this->input->post('occupation'),
 //             'aadhar_no'=>$this->input->post('aadhar_no'),
 //             'pan_no'=>$this->input->post('pan_no'),
 //             'gender'=>$this->input->post('gender'),
 //             'age'=>$this->input->post('age'),
 //             'marital_status'=>$marital_status,
 //             'is_have_child'=>$is_have_child,
 //           );
 //     $check_mail = $this->Will_Model->check_mail_id($this->input->post('email'));
 //     $check_mobile = $this->Will_Model->check_mobile_no($this->input->post('mobile_no'));
 //
 //    if($check_mobile > 0) {
 //      $error = 'Mobile_Exist';
 //      echo json_encode($error);
 //     }
 //     elseif ($check_mail > 0) {
 //       $error = 'Email_Exist';
 //       echo json_encode($error);
 //     }
 //     else{
 //       $this->Will_Model->save_user($user_data);
 //       $this->Will_Model->save_personal_info($personal_data);
 //       $this->Will_Model->save_will_data($will_data);
 //
 //       $session_data = array('will_start' => 'yes','will_id' =>$will_id);
 //       $temp_will_id =  $this->session->set_userdata($session_data);
 //
 //       $get_personal_data = $this->Will_Model->get_personal_data($will_id);
 //       echo json_encode($get_personal_data);
 //       //header('Location: display_personal_info');
 //     }
 // }


 /**************************************************************/
 /*            Get personal info.... datta...                 */
 /**************************************************************/
     public function get_personal_info(){
       $will_id = $this->input->post('will_id');
       $get_personal_data = $this->Will_Model->get_personal_data($will_id);
       echo json_encode($get_personal_data);
     }

     public function display_personal_info(){
       $personal_data = $this->Will_Model->display_personal_info();
       $this->load->view('pages/display_personal_info',['personal_data'=>$personal_data]);
     }


    /**************************************************************/
    /*        Save    Update personal info.... datta...                 */
    /**************************************************************/
    public function update_personal_info(){
      // $will_date = date('d-m-Y');
      // $name_title = $this->input->post('name_title');
      //
      // if($name_title == 'Miss.'){
      //   $marital_status = 'Unmarried';
      //   $is_have_child = '0';
      //   $gender = 'Female';
      // }
      // else {
      //   $marital_status = $this->input->post('marital_status');
      //   $is_have_child = $this->input->post('is_have_child');
      //   $gender = $this->input->post('gender');
      // }
      //
      // if($marital_status == 'Unmarried'){
      //   $is_have_child = '0';
      // }

      $will_id =  $this->session->userdata('will_id');
      $personal_data_update = array(
                'address'=>$this->input->post('address'),
                'city'=>$this->input->post('city'),
                'pin_code'=>$this->input->post('pin_code'),
                'state'=>$this->input->post('state'),
                'country'=>$this->input->post('country'),
                'occupation'=>$this->input->post('occupation'),
                'aadhar_no'=>$this->input->post('aadhar_no'),
                'pan_no'=>$this->input->post('pan_no'),
                'age'=>$this->input->post('age'),
              );
        // $check_mail = $this->Will_Model->check_mail_id($this->input->post('email'));
        // $check_mobile = $this->Will_Model->check_mobile_no($this->input->post('mobile_no'));

       /*if ($check_mail > 0) {
          echo "Email Exist";
        }
        elseif ($check_mobile > 0) {
          echo "Mobile Number Exist";
        }
        else{*/
          $this->Will_Model->update_personal_info($will_id,$personal_data_update);

          $get_personal_data = $this->Will_Model->get_personal_data($will_id);
          echo json_encode($get_personal_data);
          //header('Location: display_personal_info');
      //  }
    }

    /**************************************************************/
    /*            Save/Add Family Member... datta...             */
    /**************************************************************/
    public function save_family_member(){
      $will_id = $this->session->userdata('will_id');
      $input_relationship = $this->input->post('relationship');

      $posts = $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
      $i = 0; $j = 0;
      foreach ($posts as $posts) {
        $relationship = $posts->relationship;
        if($relationship == 'Father'){ $i++; }
        if($relationship == 'Mother'){ $j++; }
      }


        if($i==1 && $input_relationship == 'Father'){
          $error = 'max_father';
        }
        elseif($j==4 && $input_relationship == 'Mother'){
          $error = 'max_mother';
        }
        else{
          $member_data = array(
            'will_id' => $will_id,
            'relationship' => $this->input->post('relationship'),
            'family_person_name' => $this->input->post('family_person_name'),
            'family_person_age' => $this->input->post('family_person_age'),
            'is_minar' => $this->input->post('is_minar'),
            'mother_of_minar' => $this->input->post('mother_of_minar'),
            'guardian_name_title' => $this->input->post('guardian_name_title'),
            'guardian_name' => $this->input->post('guardian_name'),
            'guardian_age' => $this->input->post('guardian_age'),
            'guardian_address' => $this->input->post('guardian_address'),
            'guardian_name_title' => $this->input->post('opt_guardian_name_title'),
            'opt_guardian_name' => $this->input->post('opt_guardian_name'),
            'opt_guardian_age' => $this->input->post('opt_guardian_age'),
            'opt_guardian_address' => $this->input->post('opt_guardian_address'),
          );
          $this->Will_Model->save_family_member($member_data);
          if($this->input->post('is_minar') == 1){
            $key = 1;
            $this->Will_Model->update_have_miner($will_id,$key);//is_have_minar_child
          }
          $error = 'success';
        }
        echo json_encode($error);

    }

    /**************************************************************/
    /*            Update Family Member... datta...             */
    /**************************************************************/
    public function update_family_member(){
      $will_id = $this->session->userdata('will_id');
      $memberId = $this->input->post('memberId');
      $update_member_data = array(
                  'relationship' => $this->input->post('relationship'),
                  'family_person_name' => $this->input->post('family_person_name'),
                  'family_person_dob' => $this->input->post('family_person_dob'),
                  'family_person_age' => $this->input->post('family_person_age'),
                  'family_person_age_format' => $this->input->post('family_person_age_format'),
                  'is_minar' => $this->input->post('is_minar'),
                  'mother_of_minar' => $this->input->post('mother_of_minar'),
                  'guardian_name' => $this->input->post('guardian_name'),
                  'guardian_address' => $this->input->post('guardian_address'),
                  'opt_guardian_name' => $this->input->post('opt_guardian_name'),
                  'opt_guardian_address' => $this->input->post('opt_guardian_address'),
                );
        //echo print_r($member_data);
      $this->Will_Model->update_family_member($memberId,$will_id,$update_member_data);
      if($this->input->post('is_minar') == 1){
        $key = 1;
        $this->Will_Model->update_have_miner($will_id,$key);//is_have_minar_child
      }
    }


    public function update_have_miner(){
      $will_id = $this->session->userdata('will_id');
      $result = $this->Will_Model->get_have_miner($will_id);
      if($result == 0){
        $key = 0;
        $this->Will_Model->update_have_miner($will_id,$key);
      }
      else{
        $key = 1;
        $this->Will_Model->update_have_miner($will_id,$key);
      }
    }

//family_info
    public function save_family_info(){
     $fmily_data = array(
                'relationship'=>$this->input->post('relationship'),
                'family_person_name'=>$this->input->post('family_person_name'),
                'family_person_dob'=>$this->input->post('family_person_dob'),
              );
            $this->Will_Model->save_family_info($fmily_data);
    }

    public function delete_family_member(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_family_member($id);
    }

    /**************************************************************/
    /*            Save/Add Distribution of 1/3 Share... datta...  */
    /**************************************************************/
    public function save_share_distribution(){
      $will_id = $this->session->userdata('will_id');
      $posts = $this->Table_Model->getAllShareDataAjax($will_id);
      $percentage = 0;
      $share_percentage = $this->input->post('share_percentage');
      foreach ($posts as $posts) {
        $per = $posts->share_percentage;
        $percentage = $percentage + $per;
      }

      $total_per = $percentage + $share_percentage;
      if($total_per > 100){
        $responce['status'] = 'error';
        $responce['percentage'] = $percentage;
      }
      else{
        $share_data = array(
          'will_id' => $will_id,
          'share_relation' => $this->input->post('share_relation'),
          'share_name' => $this->input->post('share_name'),
          'share_address' => $this->input->post('share_address'),
          'share_age' => $this->input->post('share_age'),
          'share_percentage' => $this->input->post('share_percentage'),
        );
        $this->Will_Model->save_share_distribution($share_data);
        $posts = $this->Table_Model->getAllShareDataAjax($will_id);
        $percentage = 0;
        foreach ($posts as $posts) {
          $per = $posts->share_percentage;
          $percentage = $percentage + $per;
        }
        $responce['status'] = 'success';
        $responce['percentage'] = $percentage;
      }


      echo json_encode($responce);
    }
    /**************************************************************/
    /*            Delete Share... datta...             */
    /**************************************************************/
    public function delete_share(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_share($id);
    }
    /**************************************************************/
    /*            Save/Add Executor... datta...             */
    /**************************************************************/
    public function save_executor(){
      $will_id = $this->session->userdata('will_id');
      $e_name_title = $this->input->post('e_name_title');
      $executor_name1 = $this->input->post('executor_name');
      $executor_name= $e_name_title.' '.$executor_name1;
      if($e_name_title=='Mr.'){
        $gender='Male';
      }
      else {
        $gender='Female';
      }
      $executor_data = array(
                  'will_id' => $will_id,
                  'executor_name' => $executor_name,
                  'executor_age' => $this->input->post('executor_age'),
                  'executor_address' => $this->input->post('executor_address'),
                  'executor_gender'=>$gender,
                );
      $this->Will_Model->save_executor($executor_data);
    }

    /**************************************************************/
    /*            Delete Executor... datta...             */
    /**************************************************************/
    public function delete_executor(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_executor($id);
    }

    /**************************************************************/
    /*            Save/Add Funeral... datta...             */
    /**************************************************************/
    public function save_funeral(){
      $will_id = $this->session->userdata('will_id');
      $funeral_data = array(
                  'will_id' => $will_id,
                  'funeral_name' => $this->input->post('funeral_name'),
                  'funeral_address' => $this->input->post('funeral_address'),
                );
      $this->Will_Model->save_funeral($funeral_data);
    }

    /**************************************************************/
    /*            Delete Funeral... datta...             */
    /**************************************************************/
    public function delete_funeral(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_funeral($id);
    }


    /**************************************************************/
    /*            Save/Add Assets... datta...             */
    /**************************************************************/
    public function save_assets(){
      $will_id = $this->session->userdata('will_id');
      $assets_data = array(
                  'will_id' => $will_id,
                  'estate_type' => $this->input->post('estate_type'),
                  'house_no' => $this->input->post('house_no'),
                  'survey_number' => $this->input->post('survey_number'),
                  'measurment_area' => $this->input->post('measurment_area'),
                  'measurment_unit' => $this->input->post('measurment_unit'),
                  'estate_address' => $this->input->post('estate_address'),
                  'estate_city' => $this->input->post('estate_city'),
                  'estate_pin' => $this->input->post('estate_pin'),
                  'estate_state' => $this->input->post('estate_state'),
                  'estate_country' => $this->input->post('estate_country'),
                );
      $this->Will_Model->save_assets($assets_data);
    }

    /**************************************************************/
    /*            Update Real Estate Assets... datta...             */
    /**************************************************************/
    public function update_real_estate(){
      $will_id = $this->session->userdata('will_id');
      $real_estateId = $this->input->post('real_estateId');
      $update_assets_data = array(
                  'estate_type' => $this->input->post('estate_type'),
                  'house_no' => $this->input->post('house_no'),
                  'survey_number' => $this->input->post('survey_number'),
                  'measurment_area' => $this->input->post('measurment_area'),
                  'measurment_unit' => $this->input->post('measurment_unit'),
                  'estate_address' => $this->input->post('estate_address'),
                  'estate_city' => $this->input->post('estate_city'),
                  'estate_pin' => $this->input->post('estate_pin'),
                  'estate_state' => $this->input->post('estate_state'),
                  'estate_country' => $this->input->post('estate_country'),
                );
      $this->Will_Model->update_real_estate($real_estateId,$will_id,$update_assets_data);
    }


    /**************************************************************/
    /*            Delete Real Estate Assets... datta...             */
    /**************************************************************/
    public function delete_real_estate(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_real_estate($id);
    }

    /**************************************************************/
    /*            Save/Add Bank Assets... datta...             */
    /**************************************************************/
    public function save_bank_assets(){
      $will_id = $this->session->userdata('will_id');
      $assets_type = $this->input->post('assets_type');
      if($assets_type=='Fixed Deposits'){
        $bank_assets_data = array(
          'will_id' => $will_id,
          'assets_type' => $this->input->post('assets_type'),
          'account_number' => $this->input->post('account_number'),
          'bank_name' => $this->input->post('bank_name'),
          'branch_name' => $this->input->post('branch_name'),
          'fd_recipt_No' => $this->input->post('fd_recipt_No'),
          'state' => $this->input->post('b_state'),
          'pin_code' => $this->input->post('b_pin_code'),

        );
      }
      elseif ($assets_type=='Bank Locker') {
        $bank_assets_data = array(
          'will_id' => $will_id,
          'assets_type' => $this->input->post('assets_type'),
          'account_number' => $this->input->post('account_number'),
          'bank_name' => $this->input->post('bank_name'),
          'branch_name' => $this->input->post('branch_name'),
          'key_number' => $this->input->post('key_number'),
          'state' => $this->input->post('b_state'),
          'pin_code' => $this->input->post('b_pin_code'),
        );
      }
      // elseif ($assets_type=='Savings A/c' || $assets_type=='Current  A/C' || $assets_type=='PPF') {
      //   $bank_assets_data = array(
      //     'will_id' => $will_id,
      //     'assets_type' => $this->input->post('assets_type'),
      //     'account_number' => $this->input->post('account_number'),
      //     'bank_name' => $this->input->post('bank_name'),
      //     'branch_name' => $this->input->post('branch_name'),
      //     'state' => $this->input->post('b_state'),
      //     'pin_code' => $this->input->post('b_pin_code'),
      //   );
      // }
      else{
        $bank_assets_data = array(
          'will_id' => $will_id,
          'assets_type' => $this->input->post('assets_type'),
          'account_number' => $this->input->post('account_number'),
          'bank_name' => $this->input->post('bank_name'),
          'branch_name' => $this->input->post('branch_name'),
          'state' => $this->input->post('b_state'),
          'pin_code' => $this->input->post('b_pin_code'),
          'assurance_amount' => $this->input->post('b_sum_amount'),
        );
      }
      $this->Will_Model->save_bank_assets($bank_assets_data);
    }

    /**************************************************************/
    /*            Update Bank Assets... datta...             */
    /**************************************************************/
    public function update_bank_assets(){
      $will_id = $this->session->userdata('will_id');
      $assets_type = $this->input->post('assets_type');
      $bank_assets_id = $this->input->post('bank_assets_id');
      if($assets_type=='Fixed Deposits'){
        $update_bank_assets_data = array(
          'assets_type' => $this->input->post('assets_type'),
          'account_number' => $this->input->post('account_number'),
          'bank_name' => $this->input->post('bank_name'),
          'branch_name' => $this->input->post('branch_name'),
          'fd_recipt_No' => $this->input->post('fd_recipt_No'),
          'state' => $this->input->post('b_state'),
          'pin_code' => $this->input->post('b_pin_code'),
        );
      }
      elseif ($assets_type=='Bank Locker') {
        $update_bank_assets_data = array(
          'assets_type' => $this->input->post('assets_type'),
          'account_number' => $this->input->post('account_number'),
          'bank_name' => $this->input->post('bank_name'),
          'branch_name' => $this->input->post('branch_name'),
          'key_number' => $this->input->post('key_number'),
          'state' => $this->input->post('b_state'),
          'pin_code' => $this->input->post('b_pin_code'),
        );
      }
      else{
        $update_bank_assets_data = array(
          'assets_type' => $this->input->post('assets_type'),
          'account_number' => $this->input->post('account_number'),
          'bank_name' => $this->input->post('bank_name'),
          'branch_name' => $this->input->post('branch_name'),
          'state' => $this->input->post('b_state'),
          'pin_code' => $this->input->post('b_pin_code'),
          'assurance_amount' => $this->input->post('b_sum_amount'),
        );
      }
      $this->Will_Model->update_bank_assets($bank_assets_id,$will_id,$update_bank_assets_data);
    }

    public function delete_bank_assets(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_bank_assets($id);
    }

    /**************************************************************/
    /*            Save/Add Vehicle... datta...             */
    /**************************************************************/
    public function save_vehicle_assets(){
      $will_id = $this->session->userdata('will_id');
      $vehicle_assets_data = array(
                  'will_id' => $will_id,
                  'vehicle_model' => $this->input->post('vehicle_model'),
                  'vehicle_make_year' => $this->input->post('vehicle_make_year'),
                  'registration_number' => $this->input->post('registration_number'),
                );
      $this->Will_Model->save_vehicle_assets($vehicle_assets_data);
    }

    /**************************************************************/
    /*            Update Vehicle... datta...             */
    /**************************************************************/
    public function update_vehicle_assets(){
      $will_id = $this->session->userdata('will_id');
      $vehicle_Id = $this->input->post('vehicle_Id');
      $update_vehicle_data = array(
                  'vehicle_model' => $this->input->post('vehicle_model'),
                  'vehicle_make_year' => $this->input->post('vehicle_make_year'),
                  'registration_number' => $this->input->post('registration_number'),
                );
      $this->Will_Model->update_vehicle_assets($vehicle_Id,$will_id,$update_vehicle_data);
    }

    /**************************************************************/
    /*            Delete Vehicle Assets... datta...             */
    /**************************************************************/
    public function delete_vehicle(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_vehicle($id);
    }

    /**************************************************************/
    /*            Save/Add Gift Assets... datta...             */
    /**************************************************************/
    public function save_other_gift_assets(){
      $will_id = $this->session->userdata('will_id');
      $other_gift_assets_data = array(
                  'will_id' => $will_id,
                  'gift_type' => $this->input->post('gift_type'),
                  'gift_description' => $this->input->post('gift_description'),
                );
      $this->Will_Model->save_other_gift_assets($other_gift_assets_data);
    }

    /**************************************************************/
    /*            Update Gift Assets... datta...             */
    /**************************************************************/
    public function update_other_gift_assets(){
      $will_id = $this->session->userdata('will_id');
      $gift_Id = $this->input->post('gift_Id');
      $other_gift_assets_data = array(
                  'gift_type' => $this->input->post('gift_type'),
                  'gift_description' => $this->input->post('gift_description'),
                );
      $this->Will_Model->update_other_gift_assets($gift_Id,$will_id,$other_gift_assets_data);
    }

    /**************************************************************/
    /*            Delete Gift Assets... datta...             */
    /**************************************************************/
    public function delete_gift(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_gift($id);
    }

    /**************************************************************/
    /*            Save/Add Witness... datta...             */
    /**************************************************************/
    public function save_witness_info(){
      $will_id = $this->session->userdata('will_id');
      $witness_data = array(
                  'will_id' => $will_id,
                  'witness_name' => $this->input->post('witness_name'),
                  'witness_address' => $this->input->post('witness_address'),
                );
      $this->Will_Model->save_witness_info($witness_data);
    }

    /**************************************************************/
    /*            Delete Witness... datta...             */
    /**************************************************************/
    public function delete_witness(){
      $id = $this->input->post('id');
      $this->Will_Model->delete_witness($id);
    }

    /**************************************************************/
    /*            Save Date-Time and Place... datta...             */
    /**************************************************************/
    public function save_date_place_info(){
      $will_id = $this->session->userdata('will_id');
      $date_place_data = array(
                  'will_date' => $this->input->post('will_date'),
                  'will_time' => $this->input->post('will_time'),
                  'will_place' => $this->input->post('will_place'),
                );
      $this->Will_Model->save_date_place_info($will_id,$date_place_data);
    }

    public function destroy_session(){
    //  $this->session->unset_userdata('will_id');
    //  $this->session->unset_userdata('will_start');
      $this->session->sess_destroy();
      header('Location:start_will_view');
    }

    public function logout_user(){
    //  $this->session->unset_userdata('will_id');
    //  $this->session->unset_userdata('will_start');
      $this->session->sess_destroy();
      header('Location:start_will_view');
    }


    //Asset_info
        public function save_Asset_info(){
         $fmily_data = array(
                    'estate_type'=>$this->input->post('estate_type'),
                    'flat_no'=>$this->input->post('flat_no'),
                    'survey_number'=>$this->input->post('survey_number'),
                    'area_measurement'=>$this->input->post('area_measurement'),
                    'asset_unit'=>$this->input->post('asset_unit'),
                    'address_asset'=>$this->input->post('address_asset'),
                    'city_asset'=>$this->input->post('city_asset'),
                    'pin_code_asset'=>$this->input->post('pin_code_asset'),
                    'country_asset'=>$this->input->post('country_asset'),
                    'state_asset'=>$this->input->post('state_asset'),
                    'give_to_asset'=>$this->input->post('give_to_asset'),
                    'ownership_asset'=>$this->input->post('ownership_asset'),

                  );
                $this->Will_Model->save_Asset_info($fmily_data);
        }


     public function pdf()
     {
      // load the database
        $this->load->database();
       //load the model
        $this->load->model('select');
       //load the method of model
        $data['h']=$this->select->select();
       //return the data in view
        $this->load->view('pdf_view', $data);
     }

        // new pages

        public function printpage(){
                 $this->load->library('Myfpdf');
                 $data=$this->Will_Model->displaydata();

                 //if(!empty(array_filter($data))){
                  $this->load->view('pages\pdf',['result'=>$data]);
                //}else{
                // redirect('Will_controller/pdf_view',$data);
              //   }

                 }

                 public function gotopayment(){

                      //print_r($_POST);


                      extract($_POST);

                      $ch = curl_init();
                      //curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
                      curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
                      curl_setopt($ch, CURLOPT_HEADER, FALSE);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                      curl_setopt($ch, CURLOPT_HTTPHEADER,
                                 /* array("X-Api-Key:d82016f839e13cd0a79afc0ef5",
                                        "X-Auth-Token:3827881f669c11e8dad8a023fd1108c2s"));
                      			*/
                      		array("X-Api-Key:0ec75dd4bc3c0555c6a7b7d07089d75a",
                                        "X-Auth-Token:842e107de7debf82f826b4c9ed4b398d"));
                      $payload = Array(
                          'purpose' => 'Will Payment',
                          'amount' => $amount,
                          'phone' => $phone,
                          'buyer_name' => $name,
                          'redirect_url' => $surl,
                          'send_email' => true,
                          'webhook' => '',
                          'send_sms' => true,
                          'email' => $email,
                          'allow_repeated_payments' => false
                      );

                      //print_r($payload);

                      curl_setopt($ch, CURLOPT_POST, true);
                      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                      $response = curl_exec($ch);
                      curl_close($ch);

                      //echo $response;

                      $json_decode = json_decode($response, true);
                      $longurl = $json_decode['payment_request']['longurl'];



                      header('location:'.$longurl);
                      echo "<>window.location=".$longurl."</script>";


               }


  }
 ?>
