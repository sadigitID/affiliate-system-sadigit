<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit_profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('user_agent');
        $this->load->model('affiliator/m_profile', 'm_profile');
        $this->load->library('session');

	}

    public function index() {
        $data['user'] = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();
        $config = [
            [
                'field' => 'nama_lengkap',
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'nama tidak boleh kosong'
				]
            ],
            [
                'field' => 'province_id',
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'provinsi tidak boleh kosong'
				]
            ],
            [
                'field' => 'city_id',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'kota tidak boleh kosong'
                ]
            ],
            [
                'field' => 'district_id',
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'kecamatan tidak boleh kosong'
				]
            ],
            [
                'field' => 'alamat_lengkap',
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'alamat tidak boleh kosong'
				]
            ],
            [
                'field' => 'no_hp',
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'nomer handphone tidak boleh kosong'
				]
            ],
        ];

        $data = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'view' => 'affiliator/edit-profile',
                'active' => 'edit-profile',
                'sub1' => 'edit-profile',
            ];
    
            $data['user'] =$this->m_profile->getUser($this->session->userdata('email'));
            $data['provinces'] = $this->m_profile->get_province();
    
            $this->load->view('template/index', $data);

        } else {
            $where = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'province_id' => $this->input->post('province_id'),
                'city_id' => $this->input->post('city_id'),
                'district_id' => $this->input->post('district_id'),
                'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                'no_hp' => $this->input->post('no_hp'),
            ];

            $this->db->set('nama_lengkap', $data['nama_lengkap']);
            $this->db->set('province_id', $data['province_id']);
            $this->db->set('city_id', $data['city_id']);
            $this->db->set('district_id', $data['district_id']);
            $this->db->set('alamat_lengkap', $data['alamat_lengkap']);
            $this->db->set('no_hp', $data['no_hp']);

            $this->m_profile->update_data($where, $data, 'tb_users');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
            redirect('affiliator/edit_profile');
        }
       
    }

    public function get_city()
    {
        if ($this->input->post('province_id')) {
            echo $this->m_profile->get_city($this->input->post('province_id'));
        }
    }

    public function get_district()
    {
        if ($this->input->post('city_id')) {
            echo $this->m_profile->get_district($this->input->post('city_id'));
        }
    }

}