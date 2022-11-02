<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_pesanan extends CI_Model
{
  // model dashboard admin
  public function jumlah_masuk()
  {
    $data = $this->db->get_where('tb_pesanan', ['status_pesanan' => 1]);
    return $data->num_rows();
  }

  //model dashboard admin
  public function jumlah_keluar()
  {
    $data = $this->db->get_where('tb_pesanan', ['status_pesanan' => 2]);
    return $data->num_rows();
  }

  //model dashboard affiliator
  public function jumlah_pesanan()
  {
    $data = $this->db->get_where('tb_pesanan', ['id_user' => $this->session->userdata('id_user')]);
    return $data->num_rows();
  }

  //model report pesanan
  public function view_all()
  {
    return $this->db->from('tb_pesanan')
      ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk', 'left')
      ->where('id_user', $this->session->userdata('id_user'))
      ->get()->result();
  }

  //model report pesanan
  public function view_by_date($tgl_awal, $tgl_akhir)
  {
    $tgl_awal = $this->db->escape($tgl_awal);
    $tgl_akhir = $this->db->escape($tgl_akhir);
    $this->db->where('DATE(tanggal_pembayaran) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir); // Tambahkan where tanggal nya
    return $this->db->from('tb_pesanan')
      ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk', 'left')
      ->where('id_user', $this->session->userdata('id_user'))
      ->get()->result(); // Tampilkan data export sesuai tanggal yang diinput oleh user pada filter
  }

  //function grafik_laporan()
  //{
  //$tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
  //$data = $this->db->select('SUM(harga_jual) AS total')->from('tb_pesanan')->where('MONTH(tanggal_pembayaran)=10 AND YEAR(tanggal_pembayaran)=2022', $tanggal_pembayaran)->group_by('YEAR(tanggal_pembayaran)')->get();
  //return $data->result();
  //}

  function get_pendapatan()
  {
    $query = $this->db->select('SUM(harga_jual) AS pendapatan')->from('tb_pesanan')->group_by('MONTH(tanggal_pembayaran)')->get();

    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $data) {
        $row[] = $data;
      }
      return $row;
    }
  }

  function get_month()
  {
    $data = $this->db->select('MONTH(tanggal_pembayaran)')->from('tb_pesanan')->get();
    return $data->result_array();
  }
}
