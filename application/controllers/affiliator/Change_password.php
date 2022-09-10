<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Change_password extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_user');
    }

    public function index()
    {
        $data = [
            'view' => 'affiliator/change-password',
            'active' => 'change-password',
            'sub1' => 'change-password',
        ];

        $this->load->view('template/index', $data);
    }

    public function change_password()
    {
        $data['tb_users'] = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[password1]');

        if ($this->form_validation->run() == false) {
            redirect('affiliator/change_password');
        } else {
            $where = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();

            $data = array('password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT));

            $this->m_user->update_data($where, $data, 'tb_users');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed!</div>');
            redirect('affiliator/change_password');
        }
    }
}
