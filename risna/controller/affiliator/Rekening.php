<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('affiliator/m_rekening', 'm_rekening');

	}

    public function index() {
        $data = [
            'view' => 'affiliator/rekening',
            'active' => 'rekening',
            'sub1' => 'rekening',
        ];

        $data['user'] =$this->m_rekening->getUser($this->session->userdata('email'));
		$data['bank'] =$this->m_rekening->getBank();

        $this->load->view('template/index', $data);
    }



}