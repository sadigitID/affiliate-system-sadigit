<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bonus extends CI_Controller
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
			'view' => 'admin/bonus',
			'active' => 'admin/bonus',
			'sub1' => 'admin/bonus',
		];

		$data['user'] = $this->db->get('tb_users')->result();

		$this->load->view('template_admin/index', $data);
	}

	public function tb_bonus()
	{
		header('Content-Type: application/json');


		$tabel = 'tb_bonus';
		$column_order = array();
		$coloumn_search = array('nama_lengkap', 'jml_bonus', 'catatan', 'tanggal_bonus');
		$select = "*";
		$order_by = array('id_bonus' => 'asc');
		$join[] = ['field' => 'tb_users', 'condition' => 'tb_bonus.id_user = tb_users.id_user', 'direction' => 'left'];
		$where = [];
		$group_by = [];
		$list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $list) {
			$edit =  "<i class='fas fa-edit btn btn-icon btn-light-primary' onclick={_edit('$list->id_bonus')}></i>";
			$hapus =  "<i class='fas fa-trash-alt btn btn-icon btn-light-danger' onclick={_delete('$list->id_bonus')}></i>";
			$row = array();
			$row[] = ++$no;
			$row[] = $list->nama_lengkap;
			$row[] = $list->jml_bonus;
			$row[] = $list->catatan;
			$row[] = $list->tanggal_bonus;
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

	function check_bonus()
	{
		$id_user = $this->input->post('id_user');
		$jml_bonus = $this->input->post('jml_bonus');
		$catatan = $this->input->post('catatan');
		$tanggal_bonus = $this->input->post('tanggal_bonus');
		$id_bonus = $this->input->post('id_bonus');

		$check = $this->db->select('id_user', 'jml_bonus', 'catatan', 'tanggal_bonus')->from('tb_bonus')->where('id_bonus !=', $id_bonus)->where('id_user', $id_user)->get();
		if ($check->num_rows() > 0) {
			return false;
		}
		return true;
	}

	public function save()
	{
		$config = [
			[
				'field' => 'id_user',
				'rules' => 'required',
				'errors' => [
					'required' => 'nama user tidak boleh kosong'
				]
			],
			[
				'field' => 'jml_bonus',
				'rules' => 'required',
				'errors' => [
					'required' => 'jumlah bonus tidak boleh kosong'
				]
			],
			[
				'field' => 'catatan',
				'rules' => 'required',
				'errors' => [
					'required' => 'catatan tidak boleh kosong'
				]
			],
		];

		$data = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if ($this->form_validation->run() == TRUE) {

			$id_bonus = $this->input->post('id_bonus');

			$payloadData = [
				'id_user' => $this->input->post('id_user'),
				'jml_bonus' => $this->input->post('jml_bonus'),
				'catatan' => $this->input->post('catatan'),
				'tanggal_bonus' => $this->input->post('tanggal_bonus'),
			];

			if ($id_bonus == "") {
				$this->db->insert('tb_bonus', $payloadData);
			} else {
				$this->db->update('tb_bonus', $payloadData, ['id_bonus' => $id_bonus]);
			}

			$data['status'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
	}

	function getBonus()
	{
		$id_bonus = $this->input->post('id_bonus', true);
		$data = $this->db->get_where('tb_bonus', ['id_bonus' => $id_bonus])->row();
		echo json_encode($data);
	}

	function delete()
	{
		$id_bonus = $this->input->post('id_bonus', true);
		$this->db->delete('tb_bonus',['id_bonus'=>$id_bonus]);
		echo json_encode('');
	}
}
