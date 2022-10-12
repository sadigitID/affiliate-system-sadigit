<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportpesanan_excel_model extends CI_Model
{

  public function view_all()
  {
    //return $this->db->get('tb_pesanan')->result(); // Tampilkan semua data export
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
