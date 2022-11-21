<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
		$this->load->model('admin/Pesanan_model', 'pesanan');

	}

	public function index()
	{
		$data = [
			'view' => 'admin/pesanan',
			'active' => 'admin/pesanan',
			'sub1' => 'admin/pesanan',
		];

		$data['produk'] = $this->db->get('tb_produk')->result();
		$data['pesanan'] = $this->db->get('tb_pesanan')->result();

		$this->load->view('template_admin/index', $data);
	}

	public function tb_pesanan()
	{
		header('Content-Type: application/json');


		$tabel = 'tb_pesanan';
		$column_order = array();
		$coloumn_search = array('id_pesanan', 'tb_produk.nama_produk', 'nama_pembeli', 'harga_jual', 'tanggal_pembayaran', 'foto_pembayaran', 'tb_users.nama_lengkap', 'status_komisi', 'status_pesanan');
		$select = "*";
		$join[] = ['field' => 'tb_produk', 'condition' => 'tb_pesanan.id_produk = tb_produk.id_produk', 'direction' => 'left'];
		$join[] = ['field' => 'tb_users', 'condition' => 'tb_pesanan.id_user = tb_users.id_user', 'direction' => 'left'];
		$where = [];
		$group_by = [];
		$order_by = array('id_pesanan' => 'asc');
		$list = $this->pesanan->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $list) {
			if ($list->status_komisi == 1) {
				$status_komisi = '<p> Pesanan Masuk </p>';
			} else {
				$status_komisi = '<p> Pesanan Selesai </p>';
			}

			if ($list->status_pesanan == 1) {
				$status_pesanan = '<p> Pesanan Masuk </p>';
			} else {
				$status_pesanan = '<p> Pesanan Selesai </p>';
			}
			
			if($list->status_komisi == 1 && $list->status_pesanan == 1){
				$komisi = 0;
			} else {
				$komisi = $list->jml_komisi;
			}

			$confirm =  "<i class='fas fa-copy btn btn-icon btn-light-primary' onclick={_confirm('$list->id_pesanan')}></i>";
			$edit =  "<i class='fas fa-edit btn btn-icon btn-light-primary' onclick={_edit('$list->id_pesanan')}></i>";
			//$hapus =  "<i class='fas fa-trash-alt btn btn-icon btn-light-danger' onclick={_delete('$list->id_pesanan')}></i>";

			$row = array();
			$row[] = ++$no;
			$row[] = $list->nama_pembeli;
			$row[] = $list->nama_produk;
			$row[] = $list->harga_jual;
			$row[] = $list->tanggal_pembayaran;
			$row[] = $list->foto_pembayaran;
			$row[] = $list->nama_lengkap;
			$row[] = $status_pesanan;
			$row[] = $status_komisi;
			$row[] = $komisi;
			$row[] = "<center>
						$confirm
                       	$edit 
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

	function check_pesanan()
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

		$check = $this->db->select('id_produk', 'id_user', 'nama_produk', 'harga_jual', 'nama_pembeli', 'tanggal_pembayaran', 'tanggal_pesanan', 'no_wa_pembeli', 'status_komisi', 'status_pesanan')->from('tb_pesanan')->where('id_pesanan !=', $id_pesanan)->where('id_produk', $id_produk)->get();
		if ($check->num_rows() > 0) {
			return false;
		}
		return true;
	}

	public function save()
	{
		$config = [
			[
				'field' => 'nama_pembeli',
				'rules' => 'required',
				'errors' => [
					'required' => 'nama tidak boleh kosong'
				]
			],
			[
				'field' => 'no_wa_pembeli',
				'rules' => 'required',
				'errors' => [
					'required' => 'nomer tidak boleh kosong'
				]
			],
			// [
			// 	'field' => 'foto_pembayaran',
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => 'foto tidak boleh kosong'
			// 	]
			// ],
		];

		$data = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if ($this->form_validation->run() == TRUE) {

			$id_pesanan = $this->input->post('id_pesanan');

			$config['max_size']				=2048;
			$config['upload_path']          = FCPATH.'/foto/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
 
			$this->load->library('upload' , $config);

			$this->upload->do_upload('foto_pembayaran');
			$data_image=$this->upload->data('file_name');
			$location=base_url().'foto/';
			$pict=$location.$data_image;
			
			$payloadData = [
				'nama_pembeli' => $this->input->post('nama_pembeli'),
				'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
				'no_wa_pembeli' => $this->input->post('no_wa_pembeli'),
				'foto_pembayaran' => $pict,
				//'foto_pembayaran' => $this->input->post('foto_pembayaran'),
				'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
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

	function getPesanan()
	{
		$id_pesanan = $this->input->post('id_pesanan', true);
		$data = $this->db->get_where('tb_pesanan', ['id_pesanan' => $id_pesanan])->row();
		echo json_encode($data);
	}

	function ubah_status()
	{

		$id_pesanan = $this->input->post('id_pesanan');
		$where = ['id_pesanan' => $id_pesanan];
		// $getAff = $this->db->get_where('tb_pesanan', $where)->row_array();
		// $komisi = $getAff['jml_komisi'];
		// $id_user = $getAff['id_user'];
		//$up = ['status_pesanan' => 2];
		$up = ['status_komisi' => 2, 'status_pesanan' => 2];
		$this->db->update("tb_pesanan", $up, $where);
		echo json_encode(['status' => true]);
	}

	// function delete()
	// {
	// 	$id_pesanan = $this->input->post('id_pesanan', true);
	// 	$this->db->delete('tb_pesanan',['id_pesanan'=>$id_pesanan]);
	// 	echo json_encode('');
	// }
}
