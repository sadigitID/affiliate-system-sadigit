<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('affiliator/m_rekening', 'm_rekening');
        $this->load->library('user_agent');
	}

    public function index()
    {
        $config = [
			
			[
				'field' => 'nama_pemiliki_rek',
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'nama pemilik rekening tidak boleh kosong'
				]
			],
			[
				'field' => 'no_rek',
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'nomer rekening tidak boleh kosong'
				]
			],
		];

		$data = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == false) {
            $data = [
                'view' => 'affiliator/rekening',
                'active' => 'rekening',
                'sub1' => 'rekening',
            ];
    
            $data['user'] =$this->m_rekening->getUser($this->session->userdata('email'));
            $data['rekening'] = $this->m_rekening->getRekening('id_rek');
            $data['bank'] =$this->m_rekening->getBank();
    
            $this->load->view('template/index', $data);
        } else {
            $data = [
                'id_bank' => $this->input->post('id_bank', true),
                'nama_pemilik_rek' => $this->input->post('nama_pemilik_rek', true),
                'no_rek' => $this->input->post('no_rek', true),
            ];

            $this->m_rekening->addRekening($data, 'tb_rekening');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Rekening has been changed!</div>');
            redirect('affiliator/rekening');
        }
    }

    // public function index() {
    //     $data = [
    //         'view' => 'affiliator/rekening',
    //         'active' => 'rekening',
    //         'sub1' => 'rekening',
    //     ];

    //     // $data['user'] =$this->m_rekening->getUser($this->session->userdata('email'));
	// 	$data['bank'] =$this->m_rekening->getBank();

    //     $this->load->view('template/index', $data);
    // }



}