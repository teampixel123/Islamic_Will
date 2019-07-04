<?php
class Owner_Model extends CI_Model{

  function check_login($username,$password){
    $this->db->select('*');
    $this->db->where('owner_username',$username);
    $this->db->where('owner_password',$password);
    $this->db->from('tbl_owner');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  function get_owner_data($owner_id){
    $query = $this->db->select('owner_email, owner_username')
      ->where('owner_id',$owner_id)
      ->from('tbl_owner')
      ->get();
    $result = $query->result_array();
    return $result;
  }

  function get_will_list(){
     $query = $this->db->select('t1.*, t2.*')
      ->from('tbl_will as t1')
      ->join('tbl_personal_info as t2', 't1.will_id = t2.will_id', 'LEFT')
      ->get();
    $result = $query->result();
    return $result;
  }

  // Delete Will...
  public function delete_will($will_id){
    $tables = array('tbl_will', 'tbl_witness', 'tbl_share', 'tbl_vehicle','tbl_real_estate', 'tbl_personal_info',
                      'tbl_other_gift','tbl_guardian', 'tbl_funeral', 'tbl_family_info','tbl_executor','tbl_bank_assets');
    $this->db->where('will_id',$will_id);
    $del=$this->db->delete($tables);
    return $del;
  }
}
 ?>
