<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Umum_model', 'umum');
    $this->load->model('M_produk', 'produk');
  }

  public function index()
  {
    $data = [
      'view' => 'affiliator/produk',
      'active' => 'produk',
      'sub1' => 'produk',
    ];

    $data['pesanan'] = $this->db->get('tb_pesanan')->row_array();
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
      $long_url = $list->link_produk . 'aff=' . $id_user . '&prd=' . $list->id_produk;
      $copy =  "<i class='btn fas fa-copy btn-icon btn-light-success' onclick={_copy('$long_url')}></i>";
      $salin =  "<i class='fas fa-edit btn btn-icon btn-light-primary' onclick={_salin('$list->id_produk')}></i>";

      $row = array();
      $row[] = ++$no;
      $row[] = $list->nama_produk;
      $row[] = $list->harga_produk;
      $row[] = $list->jml_komisi;
      $row[] = $long_url;
      $row[] = "<center>
                  $copy
                  $salin
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
    $data = $this->db->get_where('tb_produk', ['id_produk' => $id_produk])->row_array();
    echo json_encode($data);
  }

  function isi_data()
  {
    $data = $this->db->select('*')->from('tb_pesanan')->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk', 'left')->get()->result_array();

    foreach ($data as $data) {
      if ($data->status_pesanan == 1) {
        $status_pesanan = '<p> Pesanan Masuk </p>';
      } else {
        $status_pesanan = '<p> Pesanan Selesai </p>';
      }

      if ($data->status_komisi == 1) {
        $status_komisi = '<p> Pesanan Masuk </p>';
      } else {
        $status_komisi = '<p> Pesanan Selesai </p>';
      }

      $id_produk = $this->input->post('id_produk');
      $nama_produk = $this->input->post('nama_produk');
      $harga_jual = $this->input->post('harga_jual');
      $id_user = $this->session->userdata('id_user');

      $up = ['id_user' => $id_user, 'id_produk' => $id_produk, 'nama_produk' => $nama_produk, 'harga_jual' => $harga_jual, 'status_komisi' => 1, 'status_pesanan' => 1];
      $where = ['id_produk' => $id_produk];
      $this->db->update("tb_pesanan", $up, $where);
      echo json_encode(['status' => true]);
    }
  }
}
