<?php
  class Table_Model extends CI_Model{

    public function countFamilyMembarRows($will_id){
      $this->db->select('id');
      $this->db->from('tbl_family_info');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    public function getAllFamilyMembarDataAjax($will_id){
      $this->db->select('*');
      $this->db->from('tbl_family_info');
      $this->db->where('will_id',$will_id);
      $this->db->order_by("FIELD(relationship,'Father','Mother','Brother','Sister','Spouse','Son','Daughter','Grand Father','Grand Mother')",'',FALSE);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }
    // 1/3 share data table... datta...
    public function countShareRows($will_id){
      $this->db->select('id');
      $this->db->from('tbl_share');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    public function getAllShareDataAjax($will_id){
      $this->db->select('*');
      $this->db->from('tbl_share');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function countExecutorRows($will_id){
      $this->db->select('id');
      $this->db->from('tbl_executor');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    public function getAllExecutorDataAjax($will_id){
      $this->db->select('*');
      $this->db->from('tbl_executor');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function countFuneralRows($will_id){
      $this->db->select('id');
      $this->db->from('tbl_funeral');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    public function getAllFuneralDataAjax($will_id){
      $this->db->select('*');
      $this->db->from('tbl_funeral');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function countRealEstateRows($will_id){
      $this->db->select('id');
      $this->db->from('tbl_real_estate');
      $this->db->where('will_id',$will_id);
      $this->db->order_by("FIELD(estate_type,'Flat','Shop','Land','Plot','Commercial Shop unit','Commercial office unit')",'',FALSE);
      $query = $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    public function getAllRealEstateDataAjax($will_id){
      $this->db->select('*');
      $this->db->from('tbl_real_estate');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function countBankAssetsRows($will_id){
      $this->db->select('id');
      $this->db->from('tbl_bank_assets');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    public function getAllBankAssetsDataAjax($will_id){
      $this->db->select('*');
      $this->db->from('tbl_bank_assets');
      $this->db->where('will_id',$will_id);
      $this->db->order_by("FIELD(assets_type,'savings A/c','current A/c','Fixed Deposits','PPF','Bank Locker','Mutual Funds','Stock Equities','Insurance Policy')",'',FALSE);
      $query = $this->db->get();
      $last= $this->db->last_query();
      $result = $query->result();
      return $result;
    }

    public function countVehicleRows($will_id){
      $this->db->select('id');
      $this->db->from('tbl_vehicle');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    public function getAllVehicleAjax($will_id){
      $this->db->select('*');
      $this->db->from('tbl_vehicle');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function countGiftRows($will_id){
      $this->db->select('id');
      $this->db->from('tbl_other_gift');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    public function getAllGiftAjax($will_id){
      $this->db->select('*');
      $this->db->from('tbl_other_gift');
      $this->db->where('will_id',$will_id);
      $this->db->order_by("FIELD(gift_type,'Jewellery and Valuables','Remained Assets')");
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }


    public function countWitnessRows($will_id){
      $this->db->select('id');
      $this->db->from('tbl_witness');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $num = $query->num_rows();
      return $num;
    }

    public function getAllWitnessAjax($will_id){
      $this->db->select('*');
      $this->db->from('tbl_witness');
      $this->db->where('will_id',$will_id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }
  }
?>
