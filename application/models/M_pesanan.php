<?php
class M_pesanan extends CI_Model
{
  protected $_table = 'tb_pesanan';

  public function jumlah_masuk()
  {
    $data = $this->db->get($this->_table);
    return $data->num_rows();
  }

  public function jumlah_keluar()
  {
    $data = $this->db->get($this->_table);
    return $data->num_rows();
  }
}
