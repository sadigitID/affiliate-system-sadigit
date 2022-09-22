<?php
class M_bonus extends CI_Model
{

  public function get_by_user()
  {
    return $this->db->from('tb_bonus')->join('tb_users', 'tb_users.id_user=tb_bonus.id_user')->get()->result();
  }
}
?>