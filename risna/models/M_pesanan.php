<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_pesanan extends CI_Model
{
  protected $_table = 'tb_pesanan';

  public function jumlah_masuk()
  {
    $data = $this->db->get_where($this->_table, ['status_pesanan' => "Tertunda"]);
    return $data->num_rows();
  }

  public function jumlah_keluar()
  {
    $data = $this->db->get_where($this->_table, ['status_pesanan' => "Selesai"]);
    return $data->num_rows();
  }

  public function jumlah_pesanan()
  {
    $data = $this->db->get_where('tb_pesanan', ['id_user' => $this->session->userdata('id_user')]);
    return $data->num_rows();
  }
  public function view_all()
  {
    //return $this->db->get('tb_bonus')->result(); // Tampilkan semua data export
    return $this->db->from('tb_pesanan')
      ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk')
      ->get()
      ->result();
  }

  public function view_by_date($tgl_awal, $tgl_akhir)
  {
    $tgl_awal = $this->db->escape($tgl_awal);
    $tgl_akhir = $this->db->escape($tgl_akhir);
    $this->db->where('DATE(tanggal_pembayaran) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir); // Tambahkan where tanggal nya
    return $this->db->from('tb_pesanan')
      ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk')
      ->get()
      ->result(); // Tampilkan data export sesuai tanggal yang diinput oleh user pada filter
  }
}
