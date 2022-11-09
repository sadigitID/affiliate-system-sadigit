<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportbonus_pdf extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') != "Admin") {
			$alert = $this->session->set_flashdata('massage', 'Anda Harus Login Sebagai Admin!');
			redirect(base_url("auth"));
		}
		$this->load->library('form_validation');
		$this->load->model('admin/Bonus_model', 'pdf');
	}
	public function index()
	{
		$data = [
			'view' => 'admin/reportbonus_pdf',
			'active' => 'reportbonus_pdf',
			'sub1' => 'reportbonus_pdf',
		];

		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
		$tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
		if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			$export = $this->pdf->view_all_pdf();  // Panggil fungsi view_all yang ada di exportModel
			$url_cetak = 'reportbonus_pdf/cetak';
			$label = 'Semua Data Bonus';
		} else { // Jika terisi
			$export = $this->pdf->view_by_date_pdf($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di exportModel
			$url_cetak = 'reportbonus_pdf/cetak?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir;
			$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
			$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
			$label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
		}
		$data['export'] = $export;
		$data['url_cetak'] = base_url('admin/' . $url_cetak);
		$data['label'] = $label;
		$this->load->view('template_admin/index', $data);
	}
	public function cetak()
	{
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
		$tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
		if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			$export = $this->pdf->view_all_pdf();
			$label = 'Semua Data export';
		} else { // Jika terisi
			$export = $this->pdf->view_by_date_pdf($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di exportModel
			$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
			$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
			$label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
		}
		$data['label'] = $label;
		$data['export'] = $export;
		ob_start();
		$this->load->view('admin/reportbonus_pdf_print', $data);
		$html = ob_get_contents();
		ob_end_clean();
		require './assets/libraries/html2pdf/autoload.php'; // Load plugin html2pdfnya
		$pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');  // Settingan PDFnya
		$pdf->WriteHTML($html);
		$pdf->Output('Data Bonus.pdf', 'D');
	}
}
