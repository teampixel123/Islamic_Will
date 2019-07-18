<?php
  class User_Model extends CI_Model{

    // Get Will List of User... Datta...
    public function get_will_list($user_id){
      $this->db->select('*');
      $this->db->from('tbl_will w');
      $this->db->join('tbl_personal_info p','w.will_id = p.will_id','left');
      $this->db->where('w.will_user_id',$user_id);
      $this->db->order_by("FIELD(w.is_blur,'yes','no')",'',FALSE);
      $query = $this->db->get();
      //$last = $this->db->last_query();
      $result = $query->result();
      return $result;
    }

    public function update_user($update_user,$user_id){
      $this->db->where('user_id',$user_id);
      $this->db->update('tbl_user',$update_user);
    }
    public function update_password($update_password,$user_id){
      $this->db->where('user_id',$user_id);
      $this->db->update('tbl_user',$update_password);
    }

    public function save_payment_info($payment_data){
      $this->db->insert('tbl_payments',$payment_data);
    }
    public function update_subscription_info($user_id,$subscription_info){
      $this->db->where('user_id',$user_id);
      $this->db->update('tbl_user',$subscription_info);
    }

    public function check_promocode($promocode){
      $date = date('d-m-Y');
      $this->db->select('user_id');
      $this->db->from('tbl_user');
      $this->db->where('promocode',$promocode);
      $this->db->where('is_promocode_used','no');
      $this->db->where("str_to_date(user_subscription_end_date,'%d-%m-%Y') >= str_to_date('$date','%d-%m-%Y')");
      $query = $this->db->get();
      $result = $query->result_array();
      // $query = $this->db->last_query();
      return $result;
    }
  }
?>
