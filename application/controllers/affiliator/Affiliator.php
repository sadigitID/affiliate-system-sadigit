<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Affiliator extends CI_Controller
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
		$this->load->model('M_pesanan', 'm_pesanan');
		$this->load->model('admin/Bonus_model', 'bonus_model');
		$this->load->model('affiliator/M_sumkomisi', 'm_sumkomisi');
	}

	public function index()
	{
		$data = [
			'view' => 'affiliator/dashboard',
			'active' => 'affiliator/affiliator',
			'sub1' => 'affiliator/affiliator',
		];
		$this->db->get('tb_bonus')->result();
		$this->load->view('template/index', $data);
	}

	public function produk()
	{
		$data = [
			'view' => 'affiliator/produk',
			'active' => 'affiliator/produk',
			'sub1' => 'affiliator/produk',
		];
		$this->load->view('template/index', $data);
	}

	public function pesanan_affiliate()
	{
		$data = [
			'view' => 'affiliator/pesanan_affiliate',
			'active' => 'affiliator/pesanan_affiliate',
			'sub1' => 'affiliator/pesanan_affiliate',
		];
		$this->load->view('template/index', $data);
	}

	public function reportpesanan_pdf()
	{
		$data = [
			'view' => 'affiliator/reportpesanan_pdf',
			'active' => 'affiliator/reportpesanan_pdf',
			'sub1' => 'affiliator/reportpesanan_pdf',
		];
		$this->load->view('template/index', $data);
	}

	public function reportpesanan_excel()
	{
		$data = [
			'view' => 'affiliator/reportpesanan_excel',
			'active' => 'affiliator/reportpesanan_excel',
			'sub1' => 'affiliator/reportpesanan_excel',
		];
		$this->load->view('template/index', $data);
	}

	public function bonus_komisi()
	{
		$data = [
			'view' => 'affiliator/bonus_komisi',
			'active' => 'affiliator/bonus_komisi',
			'sub1' => 'affiliator/bonus_komisi',
		];
		$this->load->view('template/index', $data);
	}

	public function profile()
	{
		$data = [
			'view' => 'affiliator/profile',
			'active' => 'affiliator/profile',
			'sub1' => 'affiliator/profile',
		];
		$this->load->view('template/index', $data);
	}

	public function rekening()
	{
		$data = [
			'view' => 'affiliator/rekening',
			'active' => 'affiliator/rekening',
			'sub1' => 'affiliator/rekening',
		];
		$this->load->view('template/index', $data);
	}

	public function tb_pesanan()
	{
		header('Content-Type: application/json');

		$tabel = 'tb_pesanan';
		$column_order = array();
		$coloumn_search = array('tb_pesanan.id_produk', 'jml_komisi', 'tanggal_pembayaran');
		$select = "tb_pesanan.*, tb_produk.nama_produk, tb_produk.jml_komisi";
		$order_by = array('id_pesanan' => 'asc');
		$join[] = ['field' => 'tb_produk', 'condition' => 'tb_pesanan.id_produk = tb_produk.id_produk', 'direction' => 'left'];
		$where['tb_pesanan.id_user'] = $this->session->userdata('id_user');
		$group_by = [];
		$list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];
		$sum = 0;

		foreach ($list as $list) {
			if($list->status_komisi == 1 && $list->status_pesanan == 1){
				$komisi = 0;
			} else {
				$komisi = $list->jml_komisi;
			}

			$row = array();
			$row[] = ++$no;
			$row[] = $list->nama_produk; //mengambil dari tb_produk
			$row[] = $komisi; //mengambil dari tb_produk
			$row[] = $list->tanggal_pembayaran;
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

	function check_komisi()
	{
		$id_pesanan = $this->input->post('id_pesanan');
		$nama_produk = $this->input->post('nama_produk');
		$jml_komisi = $this->input->post('jml_komisi');
		$tanggal_pembayaran = $this->input->post('tanggal_pembayaran');

		$check = $this->db->select('id_pesanan', 'nama_produk', 'jml_komisi', 'tanggal_pembayaran')->from('tb_pesanan')->where('id_pesanan !=', $id_pesanan)->where('id_pesanan', $id_pesanan)->get();
		if ($check->num_rows() > 0) {
			return false;
		}
		return true;
	}
}
