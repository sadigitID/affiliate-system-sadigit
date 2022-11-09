<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role') != "Admin") {
			$alert = $this->session->set_flashdata('massage', 'Anda Harus Login Sebagai Admin!');
			redirect(base_url("auth"));
		}

    $this->load->library('form_validation');
    $this->load->model('Umum_admin_model', 'umum');
    $this->load->model('M_user', 'm_user');
    $this->load->model('M_pesanan', 'm_pesanan');
    $this->load->helper('url');
  }

  public function index()
  {
    $data = [
      'view' => 'admin/dashboard',
      'active' => 'administrator',
      'sub1' => 'administrator',
    ];

    $this->data['jumlah_affiliate'] = $this->m_user->jumlah();
    $this->data['jumlah_pmasuk'] = $this->m_pesanan->jumlah_masuk();
    $this->data['jumlah_pkeluar'] = $this->m_pesanan->jumlah_keluar();
    //$this->data['pendapatan'] = $this->m_pesanan->get_pendapatan();
    //$this->data['month'] = $this->m_pesanan->get_month();

    $this->load->view('template_admin/index', $data);
  }

  public function produk()
  {
    $data = [
      'view' => 'admin/produk',
      'active' => 'produk',
      'sub1' => 'produk',
    ];
    $this->load->view('template_admin/index', $data);
  }

  public function pesanan()
  {
    $data = [
      'view' => 'admin/pesanan',
      'active' => 'pesanan',
      'sub1' => 'pesanan',
    ];
    $this->load->view('template_admin/index', $data);
  }

  public function bonus()
  {
    $data = [
      'view' => 'admin/bonus',
      'active' => 'bonus',
      'sub1' => 'bonus',
    ];
    $this->load->view('template_admin/index', $data);
  }

  function get_pendapatan()
  {
    $query = $this->db->select('SUM(harga_jual) AS pendapatan')->from('tb_pesanan')->group_by('MONTH(tanggal_pembayaran)')->get()->result_array();
    echo json_encode($query);
  }

  function get_month()
  {
    $data = $this->db->select('MONTH(tanggal_pembayaran)')->from('tb_pesanan')->get()->result_array();
    echo json_encode($data);
  }
}
