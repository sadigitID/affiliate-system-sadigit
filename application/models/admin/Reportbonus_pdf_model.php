<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportbonus_pdf_model extends CI_Model
 {

  public function view_all()
  {
    //return $this->db->get('tb_bonus')->result(); // Tampilkan semua data export
    return $this->db->from('tb_bonus')
      ->join('tb_users', 'tb_users.id_user = tb_bonus.id_user')
      ->get()
      ->result();
  }

  public function view_by_date($tgl_awal, $tgl_akhir)
  {

    $tgl_awal = $this->db->escape($tgl_awal);
    $tgl_akhir = $this->db->escape($tgl_akhir);
    $this->db->where('DATE(tanggal_bonus) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir); // Tambahkan where tanggal nya
    return $this->db->from('tb_bonus')
      ->join('tb_users', 'tb_users.id_user = tb_bonus.id_user')
      ->get()
      ->result();// Tampilkan data export sesuai tanggal yang diinput oleh user pada filter
  }
  
}