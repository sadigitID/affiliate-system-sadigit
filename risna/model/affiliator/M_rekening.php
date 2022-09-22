<?php
class M_rekening extends CI_Model
{

  public function getBank()
  {
    $this->db->order_by('id_bank', 'ASC');
        return $this->db->from('tb_bank')
          ->get()
          ->result();
  }

  public function getUser($email)
    {
        return $this->db->query("select a.*,b.*,c.*,d.* from tb_users a join provinces b on a.province_id=b.province_id join cities c on a.city_id=c.city_id join districts d on a.district_id=d.district_id where a.email='$email' ")->row_array();
    }

  
    public function getRekening($id_bank)
    {
      $query = $this->db->get_where('tb_rekening', array('id_bank' => $id_bank));
      return $query; 
    }

}
?>