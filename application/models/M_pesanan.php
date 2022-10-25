<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_pesanan extends CI_Model
{
  // model dashboard admin
  public function jumlah_masuk()
  {
    $data = $this->db->get_where('tb_pesanan', ['status_pesanan' => "Pesanan Masuk"]);
    return $data->num_rows();
  }

  //model dashboard admin
  public function jumlah_keluar()
  {
    $data = $this->db->get_where('tb_pesanan', ['status_pesanan' => "Pesanan Selesai"]);
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

  //model dashboard admin grafik
  public function get_produk()
  {
    $data = $this->db->from('tb_pesanan')->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk', 'left')->get();
    return $data->result();
  }

  //model dashboard admin grafik
  public function data_grafik()
  {
    $data = $this->db->select('harga_jual, count(*) as data')->from('tb_pesanan')->group_by('id_produk')->get();
    return $data->result();
  }
}
