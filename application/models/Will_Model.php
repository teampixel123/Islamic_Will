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

    // Save User... Datta...
    public function save_user($data){
      $this->db->insert('tbl_user',$data);
    }

    // Get User Data... Datta...
    public function get_user_data($user_id){
      $this->db->select('*');
      $this->db->from('tbl_user');
      $this->db->where('user_id',$user_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
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
    public function display_family_info(){
      $this->db->select('*');
      $this->db->from('tbl_family_info');
      $this->db->order_by('id','DESC');
      $this->db->limit(2);

      $query = $this->db->get();
      $result = $query->result();
      return $result;
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

    //	Get executor...
    public function get_executor($will_id){
      $this->db->select('*');
      $this->db->from('tbl_executor');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
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

    //	Get Funeral...
    public function get_funeral($will_id){
      $this->db->select('*');
      $this->db->from('tbl_funeral');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
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

    //	Save Date-Time and Place... datta...
    public function save_date_place_info($will_id,$date_place_data){
      $this->db->where('will_id',$will_id);
      $this->db->update('tbl_will',$date_place_data);
    }


    public function display_excutor_info(){
      $this->db->select('*');
      $this->db->from('tbl_executor');
      $this->db->order_by('id','ASC');
      $this->db->limit(2);

      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function get_excutor_list($will_id){
      $this->db->select('*');
      $this->db->from('tbl_executor');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }


    public function display_real_estate_info(){
      $this->db->select('*');
      $this->db->from('tbl_real_estate');
      $this->db->order_by('id','ASC');
      $this->db->limit(2);

      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function get_real_estate($will_id){
      $this->db->select('*');
      $this->db->from('tbl_real_estate');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function display_bank_assets_info(){
      $this->db->select('*');
      $this->db->from('tbl_bank_assets');
      $this->db->order_by('id','ASC');
      $this->db->limit(8);

      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function get_bank_assets($will_id){
      $this->db->select('*');
      $this->db->from('tbl_bank_assets');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function display_vehicle_info(){
      $this->db->select('*');
      $this->db->from('tbl_vehicle');
      $this->db->order_by('id','ASC');
      $this->db->limit(5);

      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function get_vehicle($will_id){
      $this->db->select('*');
      $this->db->from('tbl_vehicle');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function display_other_gift_info(){
      $this->db->select('*');
      $this->db->from('tbl_other_gift');
      $this->db->order_by('id','ASC');
      $this->db->limit(5);

      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function get_other_gift($will_id){
      $this->db->select('*');
      $this->db->from('tbl_other_gift');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function display_witness_info(){
      $this->db->select('*');
      $this->db->from('tbl_witness');
      $this->db->order_by('id','ASC');
      $this->db->limit(2);

      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function get_witness($will_id){
      $this->db->select('*');
      $this->db->from('tbl_witness');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function get_will_data($will_id){
      $this->db->select('*');
      $this->db->from('tbl_will');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }
  }
 ?>
