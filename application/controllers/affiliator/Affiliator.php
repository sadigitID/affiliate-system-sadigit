<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Affiliator extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Umum_model', 'umum');
		//is_logged_in();
	}

	public function index()
	{
		$data = [
			'view' => 'affiliator/dashboard',
			'active' => 'affiliator',
			'sub1' => 'affiliator',
		];

		$this->load->view('template/index', $data);
	}

	public function bank()
	{
		$data = [
			'view' => 'bank/list',
			'active' => 'bank',
			'sub1' => 'bank',
		];

		$this->load->view('template/index', $data);
	}

	public function dat_list()
	{
		header('Content-Type: application/json');


		$tabel = 'dat_bank';
		$column_order = array();
		$coloumn_search = array('nama_bank');
		$select = "*";
		$order_by = array('id' => 'desc');
		$join = [];
		$where = [];
		$group_by = [];
		$list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $list) {
			// akuntansi_journal_edit
			$edit =  "<i class='fas fa-edit btn btn-icon btn-light-primary' onclick={_edit('$list->id')}></i>";
			$hapus =  "<i class='fas fa-trash-alt btn btn-icon btn-light-danger' onclick={_delete('$list->id')}></i>";
			$row = array();
			$row[] = ++$no;
			$row[] = $list->nama_bank;
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

	function check_bank()
	{
		$nama_bank = $this->input->post('nama_bank');
		$id = $this->input->post('id');

		$check = $this->db->select('nama_bank')->from('dat_bank')->where('id !=', $id)->where('nama_bank', $nama_bank)->get();
		if ($check->num_rows() > 0) {
			return false;
		}
		return true;
	}

	public function save()
	{
		$config = [
			[
				'field' => 'nama_bank',
				'rules' => 'required|callback_check_bank',
				'errors' => [
					'required' => 'nama bank tidak boleh kosong',
					"check_bank" => 'nama bank sudah ada yang menggunakan'
				]
			],
		];

		$data = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if ($this->form_validation->run() == TRUE) {

			$id = $this->input->post('id');

			$payloadData = [
				'nama_bank' => $this->input->post('nama_bank'),
			];

			if ($id == "") {
				$this->db->insert('dat_bank', $payloadData);
			} else {
				$this->db->update('dat_bank', $payloadData, ['id' => $id]);
			}

			$data['status'] = true;
			$this->session->set_flashdata('daftar_item', 'Berhasil menyimpan produk');
		} else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
	}

	function getBank()
	{
		$id = $this->input->post('id', true);
		$data = $this->db->get_where('dat_bank', ['id' => $id])->row();
		echo json_encode($data);
	}

	function delete()
	{
		$id = $this->input->post('id', true);
		$this->db->delete('dat_bank', ['id' => $id]);
		echo json_encode('');
	}

	public function edit_profile()
	{
		$data['tb_users'] = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('affiliator/edit-profile');
		} else {
			$nama_lengkap = $this->input->post('nama_lengkap');
			$provinsi = $this->input->post('provinsi');
			$kabupaten = $this->input->post('kabupaten');
			$kecamatan = $this->input->post('kecamatan');
			$alamat_lengkap = $this->input->post('alamat_lengkap');
			$no_hp = $this->input->post('no_hp');

			$this->db->set('nama_lengkap', $nama_lengkap);
			$this->db->set('provinsi', $provinsi);
			$this->db->set('kabupaten', $kabupaten);
			$this->db->set('kecamatan', $kecamatan);
			$this->db->set('alamat_lengkap', $alamat_lengkap);
			$this->db->set('no_hp', $no_hp);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('tb_users');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
			redirect('affiliator/edit_profile');
		}
	}

}
