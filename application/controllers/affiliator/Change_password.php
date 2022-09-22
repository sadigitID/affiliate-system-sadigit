<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Change_password extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('affiliator/m_profile', 'm_profile');
        $this->load->library('user_agent');
    }

    public function index()
    {
        $data['tb_users'] = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();
        $config = [
			[
				'field' => 'password',
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'nama bank tidak boleh kosong'
				]
			],
			[
				'field' => 'password1',
				'rules' => 'required|trim|min_length[6]|matches[password2]',
				'errors' => [
					'required' => ' password tidak boleh kosong',
                    'min_length' => 'Password too short!',
                    'matches' => 'Password tidak sama'
				]
			],
			[
				'field' => 'password2',
				'rules' => 'required|trim|min_length[6]|matches[password1]',
				'errors' => [
					'required' => 'password tidak boleh kosong',
                    'min_length' => 'Password too short!',
                    'matches' => 'Password tidak sama'
				]
			],
		];

		$data = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == false) {
            $data = [
                'view' => 'affiliator/change-password',
                'active' => 'change-password',
                'sub1' => 'change-password',
            ];
            
            $data['user'] =$this->m_profile->getUser($this->session->userdata('email'));
    
            $this->load->view('template/index', $data);
        } else {
            $where = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();

            $data = array('password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT));

            $this->m_profile->update_data($where, $data, 'tb_users');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed!</div>');
            redirect('affiliator/change_password');
        }
    }
}
