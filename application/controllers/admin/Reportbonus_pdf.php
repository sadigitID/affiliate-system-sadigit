<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportbonus_pdf extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('admin/Bonusreport_pdf_model', 'reportpdf');

	}

	public function index()
	{
		$tabel = 'tb_bonus';
		$column_order = array();
		$coloumn_search = array('id_user', 'jml_bonus', 'catatan', 'tanggal_bonus');
		$select = "*";
		$order_by = array('id_bonus' => 'desc');
		$join = [];
		$where = [];
		$group_by = [];
		// //$list = $this->reportpdf->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		// //$data = array();
		 $no = @$_POST['start'];
		$data = [
			'view' => 'admin/reportbonus_pdf',
			'active' => 'reportbonus_pdf',
			'sub1' => 'reportbonus_pdf',
		];

		

		
        $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            $reportbonus_pdf = $this->reportpdf->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);  // Panggil fungsi view_all yang ada di TransaksiModel
            $url_cetak = 'reportbonus_pdf/cetak';
            $label = 'Semua Data Transaksi';
        }else{ // Jika terisi
            $reportbonus_pdf = $this->reportpdf->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel
            $url_cetak = 'reportbonus_pdf/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
        $data['reportbonus_pdf'] = $reportbonus_pdf;
        $data['url_cetak'] = base_url('admin/'.$url_cetak);
        $data['label'] = $label;
        $this->load->view('template_admin/index', $data);
    }
  public function cetak(){
    $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            $reportbonus_pdf = $this->reportpdf->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);  // Panggil fungsi view_all yang ada di TransaksiModel  // Panggil fungsi view_all yang ada di TransaksiModel
            $label = 'Semua Data Transaksi';
        }else{ // Jika terisi
            $reportbonus_pdf = $this->reportpdf->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
        $data['label'] = $label;
        $data['reportbonus_pdf'] = $reportbonus_pdf;
    ob_start();
    $this->load->view('admin/bonus_printpdf', $data);
    $html = ob_get_contents();
        ob_end_clean();
    require './assets/libraries/html2pdf/autoload.php'; // Load plugin html2pdfnya
    $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');  // Settingan PDFnya
    $pdf->WriteHTML($html);
    $pdf->Output('Data Bonus.pdf', 'D');
	}

	public function tb_bonus()
	{
		header('Content-Type: application/json');


		$tabel = 'tb_bonus';
		$column_order = array();
		$coloumn_search = array('id_user', 'jml_bonus', 'catatan', 'tanggal_bonus');
		$select = "*";
		$order_by = array('id_bonus' => 'desc');
		$join = [];
		$where = [];
		$group_by = [];
		$list = $this->reportpdf->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $list) {
			// akuntansi_journal_edit
			$row = array();
			$row[] = ++$no;
			$row[] = $list->id_user;
			$row[] = $list->jml_bonus;
			$row[] = $list->catatan;
			$row[] = $list->tanggal_bonus;
			$data[] = $row;
		}

		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->reportpdf->count_all($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
			"recordsFiltered" => $this->reportpdf->count_filtered($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
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
