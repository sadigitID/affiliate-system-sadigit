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

  // model grafik dashboard admin
  public function get_grafik()
  {
    $data = [];
    for ($i = 1; $i <= 12; $i++) {
      $query = $this->db->select('SUM(jml_komisi) AS pendapatan')->from('tb_pesanan')
        ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk', 'left')
        ->where(['status_komisi' => 2, 'MONTH(tanggal_pembayaran)' => $i])
        ->group_by('MONTH(tanggal_pembayaran)')->get()->row_array();
      $data[] = intval($query['pendapatan']);
    }
    echo json_encode($data);
  }

  //model dashboard affiliator
  public function jumlah_pesanan()
  {
    $data = $this->db->get_where('tb_pesanan', ['id_user' => $this->session->userdata('id_user')]);
    return $data->num_rows();
  }

  // model grafik dashboard admin
  public function get_grafik_pesanan()
  {
    $data = [];
    for ($i = 1; $i <= 12; $i++) {
      $query = $this->db->get_where('tb_pesanan', ['status_pesanan' => 2, 'MONTH(tanggal_pembayaran)' => $i])->num_rows();
      $data[] = intval($query);
    }
    echo json_encode($data);
  }

  //model report pesanan affiliator
  public function view_all()
  {
    return $this->db->from('tb_pesanan')
      ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk', 'left')
      ->where('id_user', $this->session->userdata('id_user'))
      ->get()->result();
  }

  //model report pesanan affiliator
  public function view_by_date($tgl_awal, $tgl_akhir)
  {
    $tgl_awal = $this->db->escape($tgl_awal);
    $tgl_akhir = $this->db->escape($tgl_akhir);
    $this->db->where('DATE(tanggal_pesanan) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir); // Tambahkan where tanggal nya
    return $this->db->from('tb_pesanan')
      ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk', 'left')
      ->where('id_user', $this->session->userdata('id_user'))
      ->get()->result(); // Tampilkan data export sesuai tanggal yang diinput oleh user pada filter
  }
}
