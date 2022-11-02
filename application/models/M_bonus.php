<?php
class M_bonus extends CI_Model
{
  public function get_by_user()
  {
    return $this->db->from('tb_bonus')->join('tb_users', 'tb_users.id_user=tb_bonus.id_user')->get()->result();
  }

  //model dashboard affiliator
  public function total_bonus()
  {
    //$data = $this->db->get_where('tb_bonus', array("SUM('jml_bonus')"));
    $data = $this->db->select('SUM(jml_bonus) as total')->from('tb_bonus')->where(['id_user' => $this->session->userdata('id_user')])->get();
    return $data->row()->total;
  }
}
