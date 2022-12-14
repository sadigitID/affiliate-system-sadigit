<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_affiliate extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role') != "Affiliator") {
			$alert = $this->session->set_flashdata('massage', 'Anda Harus Login Sebagai Affiliator!');
			redirect(base_url("auth"));
		}
    $this->load->library('form_validation');
    $this->load->model('Umum_model', 'umum');
  }

  public function index()
  {
    $data = [
      'view' => 'affiliator/pesanan_affiliate',
      'active' => 'pesanan_affiliate',
      'sub1' => 'pesanan_affiliate',
    ];

    $this->load->view('template/index', $data);
  }

  public function tb_pesanan()
  {
    header('Content-Type: application/json');

    $tabel = 'tb_pesanan';
    $column_order = array();
    $coloumn_search = array('tb_pesanan.nama_produk', 'status_pesanan', 'tanggal_pesanan', 'status_komisi', 'jml_komisi');
    $select = "*";
    $order_by = array('id_pesanan' => 'asc');
    $join[] = ['field' => 'tb_users', 'condition' => 'tb_pesanan.id_user = tb_users.id_user', 'direction' => 'left'];
    $join[] = ['field' => 'tb_produk', 'condition' => 'tb_pesanan.id_produk = tb_produk.id_produk', 'direction' => 'left'];
    $where['tb_pesanan.id_user'] = $this->session->userdata('id_user');
    $group_by = [];
    $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
    $data = array();
    $no = @$_POST['start'];

    foreach ($list as $list) {
      if ($list->status_komisi == 1) {
				$status_komisi = '<p> Pesanan Masuk </p>';
			} else {
				$status_komisi = '<p> Pesanan Selesai </p>';
			}

			if ($list->status_pesanan == 1) {
				$status_pesanan = '<p> Pesanan Masuk </p>';
			} else {
				$status_pesanan = '<p> Pesanan Selesai </p>';
			}

      if ($list->status_pesanan == 1) {
				$status_pesanan = '<p> Pesanan Masuk </p>';
			} else {
				$status_pesanan = '<p> Pesanan Selesai </p>';
			}

			if($list->status_komisi == 1 && $list->status_pesanan == 1){
				$komisi = 0;
			} else {
				$komisi = $list->jml_komisi;
			}

      $komisi = number_format($list->jml_komisi);

      $row = array();
      $row[] = $list->id_pesanan;
      $row[] = $list->nama_produk; //mengambil dari tb_produk
      $row[] = $status_pesanan;
      $row[] = $komisi; //mengambil dari tb_produk
      $row[] = $list->tanggal_pesanan;
      $row[] = $status_komisi;
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

  function check_pesanan()
  {
    $id_pesanan = $this->input->post('id_pesanan');
    $id_produk = $this->input->post('id_produk');
    $status_pesanan = $this->input->post('status_pesanan');
    $tanggal_pesanan = $this->input->post('tanggal_pesanan');
    $status_komisi = $this->input->post('status_komisi');

    $check = $this->db->select('id_produk', 'status_pesanan', 'tanggal_pesanan', 'status_komisi')->from('tb_pesanan')->where('id_pesanan !=', $id_pesanan)->where('id_pesanan', $id_pesanan)->get();
    if ($check->num_rows() > 0) {
      return false;
    }
    return true;
  }

  function getPesanan()
  {
    $id_user = $this->session->userdata('id_user', true);
    $data = $this->db->get_where('tb_pesanan', ['id_user' => $id_user])->row();
    echo json_encode($data);
  }
}
