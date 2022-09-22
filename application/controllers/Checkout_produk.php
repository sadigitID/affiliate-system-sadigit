<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout_produk extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('Umum_model', 'umum');

	}

	public function index()
	{
		$data['produk'] = $this->db->get('tb_produk')->result();

		$this->load->view('checkout_produk', $data);
	}

	public function tb_pesanan()
	{
		header('Content-Type: application/json');


		$tabel = 'tb_pesanan';
		$column_order = array();
		$coloumn_search = array('nama_pembeli', 'no_wa_pembeli', 'id_produk');
		$select = "*";
		$order_by = array('id_pesanan' => 'asc');
		$join = [];
		$where = [];
		$group_by = [];
		$list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];

		// foreach ($list as $list) {
        //     //ini keknya untuk munculin database ke dalem table
		// 	$row = array();
		// 	$row[] = ++$no;
		// 	$row[] = $list->nama_pembeli;
		// 	$row[] = $list->no_wa_pembeli;
		// 	$row[] = $list->id_produk;
		// 	$data[] = $row;
		// }

		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->umum->count_all($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
			"recordsFiltered" => $this->umum->count_filtered($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function save()
	{
		$config = [
			[
				'field' => 'nama_pembeli',
				'rules' => 'required',
				'errors' => [
					'required' => 'nama pembeli tidak boleh kosong'
				]
			],
			[
				'field' => 'no_wa_pembeli',
				'rules' => 'required',
				'errors' => [
					'required' => 'no whatsapp tidak boleh kosong'
				]
			],
			[
				'field' => 'id_produk',
				'rules' => 'required',
				'errors' => [
					'required' => 'nama produk tidak boleh kosong'
				]
			],
            // [
			// 	'field' => 'foto_pembayaran',
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'nama produk tidak boleh kosong'
			// 	]
			// ],
		];

		$data = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if ($this->form_validation->run() == TRUE) {

			$id_pesanan = $this->input->post('id_pesanan');

			$payloadData = [
				'id_pesanan' => $this->input->post('id_pesanan'),
				'nama_pembeli' => $this->input->post('nama_pembeli'),
				'no_wa_pembeli' => $this->input->post('no_wa_pembeli'),
                'id_produk' => $this->input->post('id_produk'),
                'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
                //'foto_pembayaran' => $this->input->post('foto_pembayaran'),
			];

			if ($id_pesanan == "") {
				$this->db->insert('tb_pesanan', $payloadData);
			} else {
				$this->db->update('tb_pesanan', $payloadData, ['id_pesanan' => $id_pesanan]);
			}

			$data['status'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
	}
}
