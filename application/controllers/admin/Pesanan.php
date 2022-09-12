<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('admin/Pesanan_model', 'pesanan');

	}  

	public function index()
	{
		$data = [
			'view' => 'admin/pesanan',
			'active' => 'admin/pesanan',
			'sub1' => 'admin/pesanan',
		];

		$data['produk'] = $this->db->get('tb_users')->result();

		$this->load->view('template_admin/index', $data);
	}

	public function tb_pesanan()
	{
		header('Content-Type: application/json');


		$tabel = 'tb_pesanan';
		$column_order = array();
		$coloumn_search = array('id_pesanan', 'nama_pembeli', 'id_produk', 'harga_jual', 'status_pesanan', 'tanggal_pembayaran', 'foto_pembayaran', 'id_user', 'status_komisi');
		$select = "*";
		$order_by = array('id_pesanan' => 'asc');
		$join[] = ['field' => 'tb_users', 'condition' => 'tb_pesanan.id_user = tb_users.id_user', 'direction' => 'left'];
		$where = [];
		$group_by = [];
		$list = $this->pesanan->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $list) {
			$edit =  "<i class='fas fa-edit btn btn-icon btn-light-primary' onclick={_confirm('$list->id_pesanan')}></i>";
			$row = array();
			$row[] = $list->id_pesanan;
			$row[] = $list->nama_pembeli;
			$row[] = $list->nama_produk;
			$row[] = $list->harga_jual; //digunakan untuk total pesanan
            $row[] = $list->status_pesanan;
            $row[] = $list->tanggal_pembayaran;
            $row[] = $list->foto_pembayaran;
            $row[] = $list->nama_lengkap;
            $row[] = $list->status_komisi; //ini harusnya jml_komisi ambil dari tb_produk
            $row[] = $list->status_komisi;
			$row[] = "<center>
                       $edit 
                    </center>";
			$data[] = $row;
		}

		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->pesanan->count_all($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
			"recordsFiltered" => $this->pesanan->count_filtered($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
}
