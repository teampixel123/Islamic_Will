<?php
  class Will_Model extends CI_Model{

    public function update_otp_info(){

    }
    // Check for email id exist or not...
    public function check_mail_id($mail){
      $this->db->select('user_email_id');
      $this->db->from('tbl_user');
      $this->db->where('user_email_id',$mail);
      $query =  $this->db->get();
      $num= $query->num_rows();
      return $num;
    }

    // Check for mobile_no id exist or not...
    public function check_mobile_no($mobile_no){
      $this->db->select('user_mobile_number');
      $this->db->from('tbl_user');
      $this->db->where('user_mobile_number',$mobile_no);
      $query =  $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    public function check_forget($reg_mob_email){
      $this->db->select('*');
      $this->db->from('tbl_user');
      $this->db->where("user_email_id = '$reg_mob_email' or user_mobile_number = '$reg_mob_email'");
      // $this->db->where('user_id =',$user_id);
      $query = $this->db->get();
       $last = $this->db->last_query();
      $result = $query->result_array();
      return $result;

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

    // delete will  Dhananjay...
    public function delete_will($will_id){
      $tables = array('tbl_will', 'tbl_witness', 'tbl_vehicle','tbl_real_estate', 'tbl_personal_info',
                        'tbl_other_gift','tbl_guardian', 'tbl_funeral', 'tbl_family_info','tbl_executor','tbl_bank_assets');
      $this->db->where('will_id',$will_id);
      $del=$this->db->delete($tables);
      return $del;
    }


    // Save start Will Info...
    public function save_start_info($data){
      $this->db->insert('tbl_personal_info',$data);
    }
    //Update start Data..
    public function update_start_data($will_id,$start_data){
      $this->db->where('will_id',$will_id);
      $this->db->update('tbl_personal_info',$start_data);
    }

    // Save personal Info...
    public function save_personal_info($data){
      $this->db->insert('tbl_personal_info',$data);
    }

    //save will data...
    public function save_will_data($data){
      $this->db->insert('tbl_will',$data);
    }

    public function get_have_miner($will_id){
      $this->db->select('id');
      $this->db->from('tbl_family_info');
      $this->db->where('is_minar',1);
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    //save will data...
    public function update_have_miner($will_id,$key){
      $this->db->where('will_id',$will_id);
      $this->db->set('is_have_minar_child',$key);
      $this->db->update('tbl_will');
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
    public function update_family_member($memberId,$will_id,$update_member_data){
      $this->db->where('id',$memberId);
      $this->db->where('will_id',$will_id);
      $this->db->update('tbl_family_info',$update_member_data);
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
    //	Save/Add Share Distribution...
    public function save_share_distribution($data){
      $this->db->insert('tbl_share',$data);
    }
    //	delete Share Distribution...
    public function delete_share($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_share');
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
    //	Update Real Estate Assets... Datta...
    public function update_real_estate($real_estateId,$will_id,$update_assets_data){
      $this->db->where('id',$real_estateId);
      $this->db->where('will_id',$will_id);
      $this->db->update('tbl_real_estate',$update_assets_data);
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
    //	Update Bank Assets... Datta...
    public function update_bank_assets($bank_assets_id,$will_id,$update_bank_assets_data){
      $this->db->where('id',$bank_assets_id);
      $this->db->where('will_id',$will_id);
      $this->db->update('tbl_bank_assets',$update_bank_assets_data);
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
    //	Update Gift Assets... Datta...
    public function update_other_gift_assets($gift_Id,$will_id,$other_gift_assets_data){
      $this->db->where('id',$gift_Id);
      $this->db->where('will_id',$will_id);
      $this->db->update('tbl_other_gift',$other_gift_assets_data);
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
    //	Update vehicle Assets... Datta...
    public function update_vehicle_assets($vehicle_Id,$will_id,$update_vehicle_data){
      $this->db->where('id',$vehicle_Id);
      $this->db->where('will_id',$will_id);
      $this->db->update('tbl_vehicle',$update_vehicle_data);
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
