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
      'active' => 'admin/administrator',
      'sub1' => 'admin/administrator',
    ];
    $this->load->view('template_admin/index', $data);
  }

  public function produk()
  {
    $data = [
      'view' => 'admin/produk',
      'active' => 'admin/produk',
      'sub1' => 'admin/produk',
    ];
    $this->load->view('template_admin/index', $data);
  }

  public function pesanan()
  {
    $data = [
      'view' => 'admin/pesanan',
      'active' => 'admin/pesanan',
      'sub1' => 'admin/pesanan',
    ];
    $this->load->view('template_admin/index', $data);
  }

  public function reportpesanan_pdf()
  {
    $data = [
      'view' => 'admin/reportpesanan_pdf',
      'active' => 'admin/reportpesanan_pdf',
      'sub1' => 'admin/reportpesanan_pdf',
    ];
    $this->load->view('template_admin/index', $data);
  }

  public function reportpesanan_excel()
  {
    $data = [
      'view' => 'admin/reportpesanan_excel',
      'active' => 'admin/reportpesanan_excel',
      'sub1' => 'admin/reportpesanan_excel',
    ];
    $this->load->view('template_admin/index', $data);
  }

  public function bonus()
  {
    $data = [
      'view' => 'admin/bonus',
      'active' => 'admin/bonus',
      'sub1' => 'admin/bonus',
    ];
    $this->load->view('template_admin/index', $data);
  }

  public function reportbonus_pdf()
  {
    $data = [
      'view' => 'admin/reportbonus_pdf',
      'active' => 'admin/reportbonus_pdf',
      'sub1' => 'admin/reportbonus_pdf',
    ];
    $this->load->view('template_admin/index', $data);
  }

  public function reportbonus_excel()
  {
    $data = [
      'view' => 'admin/reportbonus_excel',
      'active' => 'admin/reportbonus_excel',
      'sub1' => 'admin/reportbonus_excel',
    ];
    $this->load->view('template_admin/index', $data);
  }
}
