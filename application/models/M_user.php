<?php
class M_user extends CI_Model
{

  // model dashboard admin
  public function jumlah()
  {
    $data = $this->db->get_where('tb_users', ['role' => "Affiliator"]);
    return $data->num_rows();
  }

  public function get_user($id_user = null)
  {
    $this->db->from('tb_users');
    if ($id_user != null) {
      $this->db->where('id_user', $id_user);
    }
    $data = $this->db->get('tb_users');
    return $data;
  }
}
