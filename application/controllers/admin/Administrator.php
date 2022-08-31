<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    $this->load->model('Umum_admin_model', 'umum');
  }

  public function index()
  {
    $data = [
      'view' => 'admin/dashboard',
      'active' => 'administrator',
      'sub1' => 'administrator',
    ];

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
