<?php
  class Will_Model extends CI_Model{

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

    //	Save/Add excutor
    public function save_excutor($data){
      $this->db->insert('tbl_executor',$data);
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

    //	Save/Add real_estate
    public function save_real_estate($data){
      $this->db->insert('tbl_real_estate',$data);
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

    //	Save/Add Bank_Asset
    public function save_bank_assets($data){
      $this->db->insert('tbl_bank_assets',$data);
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

    //	Save/Add Vehicles
    public function save_vehicle($data){
      $this->db->insert('tbl_vehicle',$data);
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

    //	Save other gift
    public function save_other_gift($data){
      $this->db->insert('tbl_other_gift',$data);
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

    //	Save witness
    public function save_witness($data){
      $this->db->insert('tbl_witness',$data);
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

  }
 ?>
