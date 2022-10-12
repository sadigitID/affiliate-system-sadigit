<?php
class M_bonus extends CI_Model
{
  
  public function get_by_user()
  {
    return $this->db->from('tb_bonus')->join('tb_users', 'tb_users.id_user=tb_bonus.id_user')->get()->result();
         
  }

  public function jumlah_bonus()
  {
    $id_user = $this->session->userdata('id_user');
    $data = $this->db->select_sum('jml_bonus')->from('tb_bonus')->where('id_user', $id_user)->get();
    return $data->result();
  }
}
