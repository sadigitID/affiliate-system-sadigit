<?php
class M_user extends CI_Model
{
  protected $_table = 'tb_users';

  public function jumlah()
  {
    $data = $this->db->get($this->_table);
    return $data->num_rows();
  }

  //membuat method get data dari tabel tb_users
  public function getUser($email)
  {
    return $this->db->query("select a.*,b.*,c.*,d.* from tb_users a 
	 	join provinces b on a.province_id=b.province_id join cities c on a.city_id=c.city_id join districts d on a.district_id=d.district_id where a.email='$email' ")->row_array();
  }

  function update_data($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }
  
}
