<?php
  class Will_Model extends CI_Model{

    public function update_otp_info(){

    }
    // Check for email id exist or not...
    public function check_mail_id($mail){
      $this->db->select('email');
      $this->db->from('tbl_personal_info');
      $this->db->where('email',$mail);
      $query =  $this->db->get();
      $num= $query->num_rows();
      return $num;
    }

    // Check for mobile_no id exist or not...
    public function check_mobile_no($mobile_no){
      $this->db->select('mobile_no');
      $this->db->from('tbl_personal_info');
      $this->db->where('mobile_no',$mobile_no);
      $query =  $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    // Save personal Info...
    public function save_personal_info($data){
      $this->db->insert('tbl_personal_info',$data);
    }

    //save will data...
    public function save_will_data($data)
    {
      $this->db->insert('tbl_will',$data);
    }

    public function display_personal_info(){
      $this->db->select('*');
      $this->db->from('tbl_personal_info');
      $this->db->order_by('id','DESC');
      $this->db->limit(1);

      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function get_personal_data($will_id){
      $this->db->select('*');
      $this->db->from('tbl_personal_info');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function update_personal_info($will_id,$personal_data_update){
      $this->db->where('will_id',$will_id);
      $this->db->update('tbl_personal_info',$personal_data_update);
    }

    //	Save/Add Family Member
    public function save_family_member($data){
      $this->db->insert('tbl_family_info',$data);
    }

    public function get_family_member_list($will_id){
      $this->db->select('*');
      $this->db->from('tbl_family_info');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function delete_family_member($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_family_info');
    }

    //	Save/Add executor...
    public function save_executor($data){
      $this->db->insert('tbl_executor',$data);
    }

    //	Save/Add executor...
    public function delete_executor($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_executor');
    }

    //	Save/Add funeral...
    public function save_funeral($data){
      $this->db->insert('tbl_funeral',$data);
    }

    //	Save/Add executor...
    public function delete_funeral($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_funeral');
    }

    //	Save/Add Real Estate Assets...
    public function save_assets($data){
      $this->db->insert('tbl_real_estate',$data);
    }
    // Delete Real Estate Assets...
    public function delete_real_estate($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_real_estate');
    }
    //	Save/Add Bank Assets...
    public function save_bank_assets($data){
      $this->db->insert('tbl_bank_assets',$data);
    }

    //	Delete Bank Assets...
    public function delete_bank_assets($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_bank_assets');
    }

    //	Save/Add Other Gift Assets...
    public function save_other_gift_assets($data){
      $this->db->insert('tbl_other_gift',$data);
    }

    //	Delete Gift Assets...
    public function delete_gift($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_other_gift');
    }

    //	Save/Add Vehicle Assets...
    public function save_vehicle_assets($data){
      $this->db->insert('tbl_vehicle',$data);
    }

    //	Delete Vehicle Assets...
    public function delete_vehicle($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_vehicle');
    }
    //	Save/Add Witness...
    public function save_witness_info($data){
      $this->db->insert('tbl_witness',$data);
    }

    //	Delete Witness..
    public function delete_witness($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_witness');
    }
  }
 ?>
