<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Umum_model', 'umum');
    $this->load->library('session');
  }

  public function index()
  {
    $data = [
      'view' => 'affiliator/produk',
      'active' => 'produk',
      'sub1' => 'produk',
    ];

    $this->load->view('template/index', $data);
  }

  public function tb_produk()
  {
    header('Content-Type: application/json');
    $tabel = 'tb_produk';
    $column_order = array();
    $coloumn_search = array('nama_produk', 'harga_produk', 'jml_komisi', 'link_produk');
    $select = "*";
    $order_by = array('id_produk' => 'asc');
    $join = [];
    $where = [];
    $group_by = [];
    $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
    $data = array();
    $no = @$_POST['start'];
    $id_user = $this->session->userdata('id_user');

    foreach ($list as $list) {
      $copy =  "<i class='btn fas fa-copy btn-icon btn-light-success' onclick={_copy('$list->id_produk')}</i>";
      //"<button id='btn' class='btn btn-light-success' aria-label='Copy Link'>Copy</button>";

      $row = array();
      $row[] = ++$no;
      $row[] = $list->nama_produk;
      $row[] = $list->harga_produk;
      $row[] = $list->jml_komisi;
      $long_url = $list->link_produk . 'aff=' . $id_user . '&prd=' . $list->id_produk;
      $row[] = $long_url;
      $row[] = "<center>
                  $copy
                </center>";
      $data[] = $row;
    }

    $output = array(
      "draw" => @$_POST['draw'],
      "recordsTotal" => $this->umum->count_all($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
      "recordsFiltered" => $this->umum->count_filtered($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }

  function check_produk()
  {
    $id_produk = $this->input->post('id_produk');
    $nama_produk = $this->input->post('nama_produk');
    $harga_produk = $this->input->post('harga_produk');
    $jml_komisi = $this->input->post('jml_komisi');
    $link_produk = $this->input->post('link_produk');

    $check = $this->db->select('nama_produk', 'harga_produk', 'jml_komisi', 'link_produk')->from('tb_produk')->where('id_produk !=', $id_produk)->where('id_produk', $id_produk)->get();
    if ($check->num_rows() > 0) {
      return false;
    }
    return true;
  }

  function getProduk()
  {
    $id_produk = $this->input->post('id_produk', true);
    $data = $this->db->get_where('tb_produk', ['id_produk' => $id_produk])->row();

    echo json_encode($data);
  }

  function copy_link()
  {
    $id_user = $this->session->userdata('id_user', true);
    $id_produk = $this->input->post('id_produk', true);
    $data = $this->db->get_where('tb_produk', ['id_produk' => $id_produk])->row();
    $link = $data->link_produk . 'aff=' . $id_user . '&prd=' . $data->id_produk;
    echo json_encode($link);
  }
}
