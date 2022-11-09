<?php
class Bonus_model extends CI_Model
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

  public function view_all_pdf()
  {
    //return $this->db->get('tb_bonus')->result(); // Tampilkan semua data export
    return $this->db->from('tb_bonus')
      ->join('tb_users', 'tb_users.id_user = tb_bonus.id_user')
      ->get()
      ->result();
  }

  public function view_by_date_pdf($tgl_awal, $tgl_akhir)
  {

    $tgl_awal = $this->db->escape($tgl_awal);
    $tgl_akhir = $this->db->escape($tgl_akhir);
    $this->db->where('DATE(tanggal_bonus) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir); // Tambahkan where tanggal nya
    return $this->db->from('tb_bonus')
      ->join('tb_users', 'tb_users.id_user = tb_bonus.id_user')
      ->get()
      ->result(); // Tampilkan data export sesuai tanggal yang diinput oleh user pada filter
  }

  public function view_all_excel()
  {
    //return $this->db->get('tb_bonus')->result(); // Tampilkan semua data export
    return $this->db->from('tb_bonus')
      ->join('tb_users', 'tb_users.id_user = tb_bonus.id_user')
      ->get()
      ->result();
  }

  public function view_by_date_excel($tgl_awal, $tgl_akhir)
  {
    $tgl_awal = $this->db->escape($tgl_awal);
    $tgl_akhir = $this->db->escape($tgl_akhir);
    $this->db->where('DATE(tanggal_bonus) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir); // Tambahkan where tanggal nya
    return $this->db->from('tb_bonus')
      ->join('tb_users', 'tb_users.id_user = tb_bonus.id_user')
      ->get()
      ->result(); // Tampilkan data export sesuai tanggal yang diinput oleh user pada filter
  }
}
