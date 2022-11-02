<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Affiliator extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('Umum_model', 'umum');
		$this->load->model('M_pesanan', 'm_pesanan');
		$this->load->model('M_bonus', 'm_bonus');
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
		$this->data['jumlah_pesanan'] = $this->m_pesanan->jumlah_pesanan();
		$this->data['total_bonus'] = $this->m_bonus->total_bonus();
		$this->data['jml_komisi'] = $this->m_sumkomisi->jml_komisi();
		$this->load->view('template/index', $data);
	}

	public function tb_pesanan()
	{
		header('Content-Type: application/json');

		$tabel = 'tb_pesanan';
		$column_order = array();
		$coloumn_search = array('id_produk', 'jml_komisi', 'tanggal_pembayaran');
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
			

			$row = array();
			$row[] = ++$no;
			$row[] = $list->nama_produk; //mengambil dari tb_produk
			$row[] = $list->jml_komisi; //mengambil dari tb_produk
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
