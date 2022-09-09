<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
			'view' => 'admin/pesanan',
			'active' => 'admin/pesanan',
			'sub1' => 'admin/pesanan',
		];

		$data['user'] = $this->db->get('tb_users')->result();
        $data['pesanan'] = $this->db->get('tb_pesanan')->result();
		$this->load->view('template_admin/index', $data);
	}

	public function tb_pesanan()
	{
		header('Content-Type: application/json');


		$tabel = 'tb_pesanan';
		$column_order = array();
		$coloumn_search = array('id_produk','id_user','nama_produk', 'harga_jual', 'nama_pembeli', 'tanggal_pembayaran', 'tanggal_pesanan', 'foto_pembayaran', 'no_wa_pembeli', 'status_komisi' ,'status_pesanan');
		$select = "*";
		$order_by = array('id_pesanan' => 'desc');
		$join = array('tb_pesanan.id_user = tb_produk.id_produk', 'tb_pesanan.id_produk = tb_produk.id_produk');
		$where = [];
		$group_by = [];
		$list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $list) {
			$selesai =  "<i class='fas fa-edit btn btn-icon btn-light-primary' onclick={_edit('$list->id_bonus')}></i>";
			$tertunda =  "<i class='fas fa-trash-alt btn btn-icon btn-light-danger' onclick={_delete('$list->id_bonus')}></i>";
			$row = array();
			$row[] = ++$no;
            $row[] = $list->id_produk;
			$row[] = $list->id_user;
			$row[] = $list->nama_produk;
			$row[] = $list->harga_jual;
			$row[] = $list->nama_pembeli;
            $row[] = $list->tanggal_pembayaran;
			$row[] = $list->tanggal_pesanan;
			$row[] = $list->foto_pembayaran;
			$row[] = $list->no_wa_pembeli;
            $row[] = $list->status_komisi;
			$row[] = $list->status_pesanan;
			$row[] = "<center>
                       $selesai 
                       $tertunda
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
		$id_produk = $this->input->post('id_produk');
        $id_user = $this->input->post('id_user');
		$nama_produk = $this->input->post('nama_produk');
		$harga_jual = $this->input->post('harga_jual');
		$nama_pembeli = $this->input->post('nama_pembeli');
		$tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        $tanggal_pesanan = $this->input->post('tanggal_pesanan');
		$foto_pembayaran = $this->input->post('foto_pembayaran');
		$no_wa_pembeli = $this->input->post('no_wa_pembeli');
		$status_komisi = $this->input->post('status_komisi');
		$status_pesanan = $this->input->post('status_pesanan');
        $id_pesanan = $this->input->post('id_pesanan');

		$check = $this->db->select('id_user', 'nama_produk', 'harga_jual', 'nama_pembeli', 'tanggal_pembayaran', 'tanggal_pesanan', 'foto_pembayaran', 'no_wa_pembeli', 'status_komisi', 'status_pesanan')->from('tb_pesanan')->where('id_pesanan !=', $id_pesanan)->where('id_user', $id_user)->get();
		if ($check->num_rows() > 0) {
			return false;
		}
		return true;
	}

	public function save()
	{
		$config = [
			[
				'field' => 'id_produk',
				'rules' => 'required',
				'errors' => [
					'required' => 'nama user tidak boleh kosong'
				]
			],
			[
				'field' => 'id_user',
				'rules' => 'required',
				'errors' => [
					'required' => 'jumlah bonus tidak boleh kosong'
				]
			],
			[
				'field' => 'nama_produk',
				'rules' => 'required',
				'errors' => [
					'required' => 'catatan tidak boleh kosong'
				]
			],
            [
				'field' => 'harga_jual',
				'rules' => 'required',
				'errors' => [
					'required' => 'nama user tidak boleh kosong'
				]
			],
			[
				'field' => 'nama_pembeli',
				'rules' => 'required',
				'errors' => [
					'required' => 'jumlah bonus tidak boleh kosong'
				]
			],
			[
				'field' => 'tanggal_pembayaran',
				'rules' => 'required',
				'errors' => [
					'required' => 'catatan tidak boleh kosong'
				]
			],
            [
				'field' => 'tanggal_pesanan',
				'rules' => 'required',
				'errors' => [
					'required' => 'nama user tidak boleh kosong'
				]
			],
			[
				'field' => 'foto_pembayaran',
				'rules' => 'required',
				'errors' => [
					'required' => 'jumlah bonus tidak boleh kosong'
				]
			],
			[
				'field' => 'no_wa_pembeli',
				'rules' => 'required',
				'errors' => [
					'required' => 'catatan tidak boleh kosong'
				]
			],
            [
				'field' => 'status_komisi',
				'rules' => 'required',
				'errors' => [
					'required' => 'nama user tidak boleh kosong'
				]
			],
			[
				'field' => 'status_pesanan',
				'rules' => 'required',
				'errors' => [
					'required' => 'jumlah bonus tidak boleh kosong'
				]
			],
			[
				'field' => 'id_pesanan',
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

			$id_pesanan = $this->input->post('id_pesanan');

			$payloadData = [
				'id_user' => $this->input->post('id_user'),
				'nama_produk' => $this->input->post('nama_produk'),
				'harga_jual' => $this->input->post('harga_jual'),
				'nama_pembeli' => $this->input->post('nama_pembeli'),
				'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
				'tanggal_pesanan' => $this->input->post('tanggal_pesanan'),
				'foto_pembayaran' => $this->input->post('foto_pembayaran'),
				'no_wa_pembeli' => $this->input->post('no_wa_pembeli'),
				'status_komisi' => $this->input->post('status_komisi'),
				'status_pesanan' => $this->input->post('status_pesanan'),
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

	function getBonus()
	{
		$id_pesanan = $this->input->post('id_pesanan', true);
		$data = $this->db->get_where('tb_pesanan', ['id_pesanan' => $id_pesanan])->row();
		echo json_encode($data);
	}

	function delete()
	{
		$id_pesanan = $this->input->post('id_pesanan', true);
		$this->db->delete('tb_pesanan',['id_pesanan'=>$id_pesanan]);
		echo json_encode('');
	}
}
