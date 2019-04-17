<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Will_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
    }

    public function index(){
  	  $this->load->view('pages/start_will');
  	}
    public function start_will_view(){
      $this->load->view('pages/start_will');
    }
    public function personal_info_view(){
      $this->load->view('pages/personal_info');
    }
    public function family_info_view(){
      $this->load->view('pages/family_info');
    }
   public function Asset_info_view(){
    $this->load->view('pages/Asset_info');
   }
   public function pdf_view2(){
    $this->load->view('pages/pdf');
   }
   //dompdf
   function my_DOMPDF(){
  $this->load->library('pdf');
  $this->pdf->load_view('pages/pdf_viwe');
  $this->pdf->render();
  $this->pdf->stream("welcome.pdf");
 }

 public function pdf_view(){
  $this->load->view('pages/final_pdf');
 }
 

    public function save_personal_info(){
      $will_date = date('d-m-Y');
    //  $this->load->helper('string');
  //    echo random_string('nozero',8);
      $will_data = array(
                  'will_id' => $this->input->post('will_id'),
                  'will_date' => $will_date,
                );
      $personal_data = array(
                'will_id' => $this->input->post('will_id'),
                'full_name'=>$this->input->post('full_name'),
                'address'=>$this->input->post('address'),
                'city'=>$this->input->post('city'),
                'pin_code'=>$this->input->post('pin_code'),
                'state'=>$this->input->post('state'),
                'country'=>$this->input->post('country'),
                'mobile_no'=>$this->input->post('mobile_no'),
                'email'=>$this->input->post('email'),
                'occupation'=>$this->input->post('occupation'),
                'aadhar_no'=>$this->input->post('aadhar_no'),
                'pan_no'=>$this->input->post('pan_no'),
                'gender'=>$this->input->post('gender'),
                'is_married'=>$this->input->post('is_married'),
                'is_have_child'=>$this->input->post('is_have_child'),
              );
        $check_mail = $this->Will_Model->check_mail_id($this->input->post('email'));
        $check_mobile = $this->Will_Model->check_mobile_no($this->input->post('mobile_no'));
      //  echo $check_mobile;
      /*  if ($check_mail > 0) {
          echo "Email Exist";
        }
        elseif ($check_mobile > 0) {
          echo "Mobile Number Exist";
        }
        else{
          $this->Will_Model->save_personal_info($personal_data);
          $this->Will_Model->save_will_data($will_data);

          $session_data = array('will_start' => 'yes','will_id' =>$this->input->post('will_id'));
          $temp_will_id =  $this->session->set_userdata($session_data);
        } */





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



//guardian
    public function save_guardian_info(){
     $fmily_data = array(
                'guardian_name'=>$this->input->post('guardian_name'),
                'guardian_address'=>$this->input->post('guardian_address'),

              );
            $this->Will_Model->save_guardian_info($fmily_data);
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

     /**************************************************************/
   /*            Save/Add Family Member... datta...             */
   /**************************************************************/
   public function save_family_member(){
     $will_id = $this->session->userdata('will_id');
     $member_data = array(
                 'will_id' => $will_id,
                 'relationship' => $this->input->post('relationship'),
                 'family_person_name' => $this->input->post('family_person_name'),
                 'family_person_dob' => $this->input->post('family_person_dob'),
                 'age' => $this->input->post('age'),
               );
     $this->Will_Model->save_family_member($member_data);

     $family_member_list = $this->Will_Model->get_family_member_list($will_id);
     echo json_encode($family_member_list);
   }


   public function display_personal_info(){
         $personal_data = $this->Will_Model->display_personal_info();
         $this->load->view('pages/pdf',['personal_data'=>$personal_data]);
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



  }
 ?>
