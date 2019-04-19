<?php
  class User_Model extends CI_Model{

    // Get Will List of User... Datta...
    public function get_will_list($user_id){
      $this->db->select('*');
      $this->db->from('tbl_will w');
      $this->db->join('tbl_personal_info p','w.will_id = p.will_id','left');
      $this->db->where('w.will_user_id',$user_id);
      $query = $this->db->get();
      //$last = $this->db->last_query();
      $result = $query->result();
      return $result;
    }
  }
?>
