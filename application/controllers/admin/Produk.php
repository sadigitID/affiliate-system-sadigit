<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') != "Admin") {
			$alert = $this->session->set_flashdata('massage', 'Anda Harus Login Sebagai Admin!');
			redirect(base_url("auth"));
		}
		$this->load->library('form_validation');
		$this->load->model('Umum_model', 'umum');
	}

	public function index()
	{
		$data = [
			'view' => 'admin/produk',
			'active' => 'admin/produk',
			'sub1' => 'admin/produk',
		];

		$this->load->view('template_admin/index', $data);
	}

	public function tb_produk()
	{
		header('Content-Type: application/json');

		$tabel = 'tb_produk';
		$column_order = array();
		$coloumn_search = array('id_produk', 'nama_produk', 'harga_produk', 'jml_komisi', 'deskripsi_produk', 'link_produk');
		$select = "*";
		$order_by = array('id_produk' => 'asc');
		$join = [];
		$where = [];
		$group_by = [];
		$list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $list) {
			$harga_produk = number_format($list->harga_produk);
			$komisi = number_format($list->jml_komisi);

			// akuntansi_journal_edit
			$edit =  "<i class='fas fa-edit btn btn-icon btn-light-primary' onclick={_edit('$list->id_produk')}></i>";
			$hapus =  "<i class='fas fa-trash-alt btn btn-icon btn-light-danger' onclick={_delete('$list->id_produk')}></i>";
			$row = array();
			$row[] = ++$no;
			$row[] = $list->nama_produk;
			$row[] = $harga_produk;
			$row[] = $komisi;
			$row[] = $list->deskripsi_produk;
			$row[] = $list->link_produk;
			$row[] = "<center>
                       $edit 
                       $hapus
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
		$deskripsi_produk = $this->input->post('deskripsi_produk');
		$link_produk = $this->input->post('link_produk');

		$check = $this->db->select('nama_produk', 'harga_produk', 'jml_komisi', 'deskripsi_produk', 'link_produk')->from('tb_produk')->where('id_produk !=', $id_produk)->where('id_produk', $id_produk)->get();
		if ($check->num_rows() > 0) {
			return false;
		}
		return true;
	}

	public function save()
	{
		$config = [
			[
				'field' => 'nama_produk',
				'rules' => 'required',
				'errors' => [
					'required' => 'nama produk tidak boleh kosong'
				]
			],
			[
				'field' => 'harga_produk',
				'rules' => 'required',
				'errors' => [
					'required' => 'harga produk tidak boleh kosong'
				]
			],
			[
				'field' => 'jml_komisi',
				'rules' => 'required',
				'errors' => [
					'required' => 'jumlah komisi tidak boleh kosong'
				]
			],
			[
				'field' => 'deskripsi_produk',
				'rules' => 'required',
				'errors' => [
					'required' => 'deskripsi produk tidak boleh kosong'
				]
			],
			[
				'field' => 'link_produk',
				'rules' => 'required',
				'errors' => [
					'required' => 'link produk tidak boleh kosong'
				]
			],
		];

		$data = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if ($this->form_validation->run() == TRUE) {

			$id_produk = $this->input->post('id_produk');

			$payloadData = [
				'nama_produk' => $this->input->post('nama_produk'),
				'harga_produk' => $this->input->post('harga_produk'),
				'jml_komisi' => $this->input->post('jml_komisi'),
				'deskripsi_produk' => $this->input->post('deskripsi_produk'),
				'link_produk' => $this->input->post('link_produk'),
			];

			if ($id_produk == "") {
				$this->db->insert('tb_produk', $payloadData);
			} else {
				$this->db->update('tb_produk', $payloadData, ['id_produk' => $id_produk]);
			}

			$data['status'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
	}

	function getProduk()
	{
		$id_produk = $this->input->post('id_produk', true);
		$data = $this->db->get_where('tb_produk', ['id_produk' => $id_produk])->row();
		echo json_encode($data);
	}

	function delete()
	{
		$id_produk = $this->input->post('id_produk', true);
		$this->db->delete('tb_produk', ['id_produk' => $id_produk]);
		echo json_encode('');
	}
}
