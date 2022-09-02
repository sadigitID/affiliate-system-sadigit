<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bonus_excel extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('Bonusexcel_model');

	}

	public function index()
	{
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){
            $filter = $_GET['filter'];
            $tgl = $_GET['tanggal'];
            $label = 'Data Transaksi Tanggal '.date('d-m-y', strotime($tanggal_bonus));
            $url_export = 'admin/bonus_excel/export?filter=1&tanggal='.$tanggal_bonus;
            $tb_bonus = $this->Bonusexcel_model->view_by_date($tanggal_bonus);
        } else {
            $label = 'Semua Data Bonus';
            $url_export = 'admin/bonus_excel/export';
            $tb_bonus = $this->Bonusexcel_model->view_all();
        }

        $data['label'] = $label;
        $data['url_export'] = base_url('admin/bonus'.$url_export);
        $data['tb_bonus'] = $tb_bonus;
		$data = [
			'view' => 'admin/bonus',
			'active' => 'admin/bonus',
			'sub1' => 'admin/bonus',
		];
		$this->load->view('template_admin/index', $data);
	}

    public function export(){
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excel = new PHPExcel();

        $excel->getProperties()->setCreator('My Notes Code')
        $excel->getProperties()->setLastModifiedBy('My Notes Code')
        $excel->getProperties()->setTitle("Data Bonus")
        $excel->getProperties()->setSubject("Bonus")
        $excel->getProperties()->setDescription("Laporan Semua Data Bonus")
        $excel->getProperties()->setKeywords("Data Bonus");

        $style_col=array(
            'font' => array('bold' => true),
            'alignment' => array('vertical' => PHPEXCEL_STYLE_Alignment::VERTICAL_CENTER),
            'borders' => array(
                'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
            )
        );

        $style_row = array(
            'alignment' => array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
            )
        );

        if(isset($_GET['filter']) && !empty($_GET['filter'])){
            $filter = $_GET['filter'];
            $tgl = $_GET['tanggal'];
            $label = 'Data Bonus Tanggal '.date('d-m-y', strtotime($tanggal_bonus));
            $tb_bonus = $this->Bonusexcel_model->view_by_date($tanggal_bonus);
        } else {
            $label = 'Semua Data Bonus';
            $tb_bonus = $this->Bonusexcel_model->view_all();
        }

        $excel->setActiveSheetIndex();
        $excel->getActiveSheet()->setCellValue('A1', "DATA BONUS");
        $excel->getActiveSheet()->mergeCells('A1:');

    }

}

	