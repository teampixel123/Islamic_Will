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

    public function get_family_member_list($will_id){
      $this->db->select('*');
      $this->db->from('tbl_family_info');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }
  }
 ?>
