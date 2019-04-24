<?php
  class Login_Model extends CI_Model{

    public function check_valid_mob_email($mob_email){
      $this->db->select('user_id');
      $this->db->from('tbl_user');
      $this->db->where('user_mobile_number =',$mob_email);
      $this->db->or_where('user_email_id =',$mob_email);
      $query = $this->db->get();
      //$last = $this->db->last_query();
      $result = $query->result_array();
      return $result;
    }

    public function update_otp($user_id,$update_otp_data){
      //$this->db->set('otp',$otp);
      $this->db->where('user_id',$user_id);
      $this->db->update('tbl_user',$update_otp_data);
    }

    public function validate_otp($user_id,$otp){
      $this->db->select('*');
      $this->db->from('tbl_user');
      $this->db->where('user_id =',$user_id);
      $this->db->where('otp =',$otp);
      $query = $this->db->get();
      //$last = $this->db->last_query();
      $result = $query->result_array();
      return $result;
    }
  }
?>
