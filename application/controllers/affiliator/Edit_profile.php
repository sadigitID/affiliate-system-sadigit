<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit_profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('');

	}

    public function index() {
        $data = [
            'view' => 'affiliator/edit-profile',
            'active' => 'edit-profile',
            'sub1' => 'edit-profile',
        ];

        $data['tb_users'] = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/index', $data);
    }

    public function edit_profile() {
        
        $data['tb_users'] = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_lengkap', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('province_id', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('city_id', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('distrist_id', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('alamat_lengkap', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Kabupaten', 'required|trim');

        if ($this->form_validation->run() == false) {
            redirect('affiliator/edit_profile');
        } else {
            $nama_lengkap = $this->input->post('nama_lengkap');
            $email = $this->input->post('email');
            $province_id = $this->input->post('province_id');
            $city_id = $this->input->post('city_id');
            $distrist_id = $this->input->post('distrist_id');
            $alamat_lengkap = $this->input->post('alamat_lengkap');
            $no_hp = $this->input->post('no_hp');


            $this->db->set('nama_lengkap', $nama_lengkap);
            $this->db->set('province_id', $province_id);
            $this->db->set('city_id', $city_id);
            $this->db->set('distrist_id', $distrist_id);
            $this->db->set('alamat_lengkap', $alamat_lengkap);
            $this->db->set('no_hp', $no_hp);
            $this->db->where('email', $email);
            $this->db->update('tb_users');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('affiliator/edit_profile');
        }


        
    }

   


}