<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Pdf_controller extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->Model('Will_Model');
      $this->load->Model('Table_Model');
  		$this->load->library('Pdf');
    }

    public function pdf(){
  		//$this->load->library('Pdf');
  		$will_id = $this->session->userdata('will_id');
  		$personal_data = $this->Will_Model->get_personal_data($will_id);
  		$this->load->view('welcome_message',['data'=>$personal_data]);
  	}

    public function final_pdf(){
      $is_login = $this->session->userdata('user_is_login');
      //echo $is_login;
      if($is_login && $this->input->post('will_id')){
        $will_id = $this->input->post('will_id');
    		$data['personal_data']=$this->Will_Model->get_personal_data($will_id);
    		$data['family_data']= $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
    	 	$data['excutor_data']= $this->Table_Model->getAllExecutorDataAjax($will_id);
    	 	$data['funeral_data']= $this->Table_Model->getAllFuneralDataAjax($will_id);
    		$data['real_estate']= $this->Table_Model->getAllRealEstateDataAjax($will_id);
    		$data['bank_assets']= $this->Table_Model->getAllBankAssetsDataAjax($will_id);
    		$data['vehicle']= $this->Table_Model->getAllVehicleAjax($will_id);
    		$data['other_gift']= $this->Table_Model->getAllGiftAjax($will_id);
    		$data['witness']= $this->Table_Model->getAllWitnessAjax($will_id);
    		$data['will_data']= $this->Will_Model->get_will_data($will_id);
    		$this->load->view('final_pdf_steup',$data);
      }
  	}

  }
?>
