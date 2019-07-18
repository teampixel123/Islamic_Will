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
      $will_id = $this->input->post('will_id');
      $is_complete = $this->input->post('is_complete');
      if($is_complete == 1){
        $this->Will_Model->set_will_complete($will_id);
      }

      $data['personal_data']=$this->Will_Model->get_personal_data($will_id);
      $data['family_data']= $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
      $data['family_data2']= $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
      $data['family_data3']= $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
      $data['excutor_data']= $this->Table_Model->getAllExecutorDataAjax($will_id);
      $data['funeral_data']= $this->Table_Model->getAllFuneralDataAjax($will_id);
      $data['real_estate']= $this->Table_Model->getAllRealEstateDataAjax($will_id);
      $data['bank_assets']= $this->Table_Model->getAllBankAssetsDataAjax($will_id);
      $data['vehicle']= $this->Table_Model->getAllVehicleAjax($will_id);
      $data['other_gift']= $this->Table_Model->getAllGiftAjax($will_id);
      $data['witness']= $this->Table_Model->getAllWitnessAjax($will_id);
      $data['will_data']= $this->Will_Model->get_will_data($will_id);

      $this->load->view('pages/blur_pdf',$data);
  	}

    public function final_pdf(){
      $is_login = $this->session->userdata('user_is_login');
      if($is_login && $this->input->post('will_id')){
        $will_id = $this->input->post('will_id');
        $is_complete = $this->input->post('is_complete');
        $btn_from = $this->input->post('btn_from');
        if($is_complete == 1){
          $this->Will_Model->set_will_complete($will_id);
        }
        if(isset($_COOKIE['set_update']) && $_COOKIE['set_update'] == $will_id && $btn_from == 'user_will_edit'){
          $this->Will_Model->set_will_updation_over($will_id);
        }
        else{
          unset($_COOKIE['set_update']);
          setcookie('set_update', null, -1, '/');
        }

    		$data['personal_data']=$this->Will_Model->get_personal_data($will_id);
    		$data['family_data']= $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
    		$data['family_data2']= $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
    		$data['family_data3']= $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
    	 	$data['excutor_data']= $this->Table_Model->getAllExecutorDataAjax($will_id);
    	 	$data['funeral_data']= $this->Table_Model->getAllFuneralDataAjax($will_id);
    		$data['real_estate']= $this->Table_Model->getAllRealEstateDataAjax($will_id);
    		$data['bank_assets']= $this->Table_Model->getAllBankAssetsDataAjax($will_id);
    		$data['vehicle']= $this->Table_Model->getAllVehicleAjax($will_id);
    		$data['other_gift']= $this->Table_Model->getAllGiftAjax($will_id);
    		$data['witness']= $this->Table_Model->getAllWitnessAjax($will_id);
    		$data['will_data']= $this->Will_Model->get_will_data($will_id);
        $data['share']=$this->Will_Model->display_share_info($will_id);

    		$this->load->view('pages/final_pdf',$data);
      }
  	}

    public function final_pdf_owner(){
      $is_login = $this->session->userdata('owner_is_login');
      if($is_login && $this->input->post('will_id')){
        $will_id = $this->input->post('will_id');
        $is_complete = $this->input->post('is_complete');
        if($is_complete == 1){
          $this->Will_Model->set_will_complete($will_id);
        }
    		$data['personal_data']=$this->Will_Model->get_personal_data($will_id);
    		$data['family_data']= $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
    		$data['family_data2']= $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
    		$data['family_data3']= $this->Table_Model->getAllFamilyMembarDataAjax($will_id);
    	 	$data['excutor_data']= $this->Table_Model->getAllExecutorDataAjax($will_id);
    	 	$data['funeral_data']= $this->Table_Model->getAllFuneralDataAjax($will_id);
    		$data['real_estate']= $this->Table_Model->getAllRealEstateDataAjax($will_id);
    		$data['bank_assets']= $this->Table_Model->getAllBankAssetsDataAjax($will_id);
    		$data['vehicle']= $this->Table_Model->getAllVehicleAjax($will_id);
    		$data['other_gift']= $this->Table_Model->getAllGiftAjax($will_id);
    		$data['witness']= $this->Table_Model->getAllWitnessAjax($will_id);
    		$data['will_data']= $this->Will_Model->get_will_data($will_id);
        $data['share']=$this->Will_Model->display_share_info($will_id);

    		$this->load->view('pages/final_pdf',$data);
      }
  	}


  }
?>
