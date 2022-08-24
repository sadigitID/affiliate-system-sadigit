<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bonus extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('Umum_model', 'umum');
	}

	public function index()
	{
		$data = [
			'view' => 'admin/bonus',
			'active' => 'bonus',
			'sub1' => 'bonus',
		];

		$this->load->view('template_admin/index', $data);
	}

	public function tb_bonuss()
	{
		header('Content-Type: application/json');


		$tabel = 'tb_bonus';
		$column_order = array();
		$coloumn_search = array('id_user', 'jml_bonus', 'catatan');
		$select = "*";
		$order_by = array('id_bonus' => 'desc');
		$join = [];
		$where = [];
		$group_by = [];
		$list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $list) {
			// akuntansi_journal_edit
			$edit =  "<i class='fas fa-edit btn btn-icon btn-light-primary' onclick={_edit('$list->id_bonus')}></i>";
			$hapus =  "<i class='fas fa-trash-alt btn btn-icon btn-light-danger' onclick={_delete('$list->id_bonus')}></i>";
			$row = array();
			$row[] = ++$no;
			$row[] = $list->id_user;
			$row[] = $list->jml_bonus;
			$row[] = $list->catatan;
			$row[] = "<center>
                       $edit 
                       $hapus
                    </center>";
			$data[] = $row;
		}

		$output = array(
			//"draw" => @$_POST['draw'],
			"draw" => 1,
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
		$id_bonus = $this->input->post('id_bonus');

		$check = $this->db->select('id_user', 'jml_bonus', 'catatan')->from('tb_bonuss')->where('id_bonus !=', $id_bonus)->where('id_user', $id_user)->get();
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
			];

			if ($id_bonus == "") {
				$this->db->insert('tb_bonuss', $payloadData);
			} else {
				$this->db->update('tb_bonuss', $payloadData, ['id_bonus' => $id_bonus]);
			}

			$data['status'] = true;
			$this->session->set_flashdata('daftar_bonus', 'Berhasil menyimpan bonus');
		} else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
	}

	function getBonus()
	{
		$id = $this->input->post('id_bonus', true);
		$data = $this->db->get_where('tb_bonuss', ['id_bonus' => $id_bonus])->row();
		echo json_encode($data);
	}

	function delete()
	{
		$id = $this->input->post('id_bonus', true);
		$this->db->delete('tb_bonuss', ['id_bonus' => $id_bonus]);
		echo json_encode('');
	}
}
