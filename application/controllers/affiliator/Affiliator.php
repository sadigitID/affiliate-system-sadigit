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
		$this->load->view('template/index', $data);
	}

	public function tb_bonus()
	{
		header('Content-Type: application/json');

		$tabel = 'tb_bonus';
		$column_order = array();
		$coloumn_search = array('catatan', 'jml_bonus', 'tanggal_bonus');
		$select = "tb_bonus.*, tb_users.id_user";
		$order_by = array('id_bonus' => 'desc');
		$join[] = ['field' => 'tb_users', 'condition' => 'tb_bonus.id_user = tb_users.id_user', 'direction' => 'left'];
		$where['tb_bonus.id_user'] = $this->session->userdata('id_user');
		$group_by = [];
		$list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $list) {
			$row = array();
			$row[] = ++$no;
			$row[] = $list->catatan;
			$row[] = $list->jml_bonus;
			$row[] = $list->tanggal_bonus;
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
		$id_bonus = $this->input->post('id_bonus');
		$id_user = $this->input->post('id_user');
		$jml_bonus = $this->input->post('jml_bonus');
		$catatan = $this->input->post('catatan');
		$tanggal_bonus = $this->input->post('tanggal_bonus');

		$check = $this->db->select('id_user', 'jml_bonus', 'catatan', 'tanggal_bonus')->from('tb_bonus')->where('id_bonus !=', $id_bonus)->where('id_bonus', $id_bonus)->get();
		if ($check->num_rows() > 0) {
			return false;
		}
		return true;
	}

	function getBonus()
	{
		$id_user = $this->session->userdata('id_user', true);
		$data = $this->db->get_where('tb_bonus', ['id_user' => $id_user])->row();
		echo json_encode($data);
	}
}
