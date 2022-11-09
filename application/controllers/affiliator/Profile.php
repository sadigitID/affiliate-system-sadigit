<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('role') != "Affiliator") {
			$alert = $this->session->set_flashdata('massage', 'Anda Harus Login Sebagai Affiliator!');
			redirect(base_url("auth"));
		}
		$this->load->library('form_validation');
        $this->load->model('affiliator/m_profile', 'm_profile');
	}

    public function index() 
    {
        $data = [
            'view' => 'affiliator/profile',
            'active' => 'profile',
            'sub1' => 'profile',
        ];

        $data['user'] = $this->m_profile->getUser($this->session->userdata('id_user'));
        $data['provinces'] = $this->m_profile->get_province();
        $data['cities'] = $this->m_profile->get_city($data['user']['province_id']);
        $data['districts'] = $this->m_profile->get_district($data['user']['city_id']);

        $this->load->view('template/index', $data);
    }

    
}