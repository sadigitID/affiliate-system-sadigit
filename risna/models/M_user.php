<?php
class M_user extends CI_Model
{
  protected $_table = 'tb_users';

  public function jumlah()
  {
    $data = $this->db->get_where($this->_table, ['role' => "Affiliator"]);
    return $data->num_rows();
  }

  public function get_user($id_user = null) 
  {
    $this->db->from($this->_table);
    if ($id_user != null) {
      $this->db->where('id_user', $id_user);
    }
    $data = $this->db->get($this->_table);
    return $data;
  }

}
