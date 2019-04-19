<?php
  class Login_Model extends CI_Model{

    public function check_valid_mob_email($mob_email){
      $this->db->select('will_id');
      $this->db->from('tbl_personal_info');
      $this->db->where('mobile_no =',$mob_email);
      $this->db->or_where('email =',$mob_email);
      $query = $this->db->get();
      //$last = $this->db->last_query();
      $result = $query->result_array();
      return $result;
    }

    public function update_otp($will_id,$update_otp_data){
      //$this->db->set('otp',$otp);
      $this->db->where('will_id',$will_id);
      $this->db->update('tbl_will',$update_otp_data);
    }

    // public function validate_user($otp){
    //   $this->db->select('will_id');
    //   $this->db->from('tbl_will');
    //   $this->db->where('otp =',$otp);
    //   $query = $this->db->get();
    //   //$last = $this->db->last_query();
    //   $result = $query->result_array();
    //   return $result;
    // }

    public function get_otp_data($will_id,$otp){
      $this->db->select('*');
      $this->db->from('tbl_will');
      $this->db->where('will_id =',$will_id);
      $this->db->where('otp =',$otp);
      $query = $this->db->get();
      $last = $this->db->last_query();
      $result = $query->result_array();
      return $result;
    }
  }
?>
