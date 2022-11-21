<?php
class M_sumkomisi extends CI_Model
{
  public function get_by_user()
  {
    // $this->db->select('*');
    //   $this->db->from('tb_pesanan');
    //   $this->db->join('tb_produk','tb_pesanan.id_produk = tb_produk.id_produk','LEFT');      
    //   $this->db->join('tb_users','tb_pesanan.id_user = tb_users.id_user','LEFT');
    //   $query = $this->db->get();
    //   return $query;

    return $this->db->from('tb_produk')->join('tb_users', 'tb_produk.id_users=tb_produk.id_users', 'LEFT')->get()->result();
    return $this->db->from('tb_pesanan')->join('tb_users', 'tb_pesanan.id_users=tb_users.id_users', 'LEFT')->get()->result();
  }

  //model dashboard affiliator
  public function jml_komisi()
  {
    //$data = $this->db->get_where('tb_bonus', array("SUM('jml_bonus')"));
    //$data = $this->db->select('SUM(jml_komisi) as total')->from('tb_produk')->get();
    $data = $this->db->select('SUM(jml_komisi) AS total')->from('tb_pesanan')
      ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk', 'left')
      ->where(['id_user' => $this->session->userdata('id_user')])->get();
    return $data->row()->total;
  }
}
