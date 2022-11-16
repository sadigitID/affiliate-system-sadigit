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
    $this->data['grafik_pendapatan'] = $this->m_pesanan->get_grafik();

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
}
