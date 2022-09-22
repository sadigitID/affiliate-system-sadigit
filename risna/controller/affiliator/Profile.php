<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('M_user', 'm_user');
	}

    public function index() {
        $data = [
            'view' => 'affiliator/profile',
            'active' => 'profile',
            'sub1' => 'edit-profile',
        ];

        $data['user'] = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/index', $data);
    }

   

}