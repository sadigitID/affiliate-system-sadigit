<?php
class M_user extends CI_Model
{
  protected $_table = 'tb_users';

  public function jumlah()
  {
    $data = $this->db->get($this->_table);
    return $data->num_rows();
  }
}
