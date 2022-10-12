<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('affiliator/m_profile', 'm_profile');
	}

    public function index() {
        $data = [
            'view' => 'affiliator/profile',
            'active' => 'profile',
            'sub1' => 'profile',
        ];
        $id_user = $this->session->userdata('id_user');
        $data['user'] = $this->db->query("select a.*,b.*,c.*,d.* from tb_users a join provinces b on a.province_id=b.province_id join cities c on a.city_id=c.city_id join districts d on a.district_id=d.district_id where a.id_user='$id_user' ")->row_array();
        $data['provinces'] = $this->m_profile->get_province();
        $data['cities'] = $this->m_profile->get_city($data['user']['province_id']);
        $data['districts'] = $this->m_profile->get_district($data['user']['city_id']);

        $this->load->view('template/index',$data);
    }

    // public function editProfile()
    // {
    //     $data['user'] = $this->m_profile->getUser($this->session->userdata('email'));
    //         $config = [
    //             [
    //                 'field' => 'nama_lengkap',
    //     			'rules' => 'required|trim',
    //     			'errors' => [
    //     				'required' => 'nama tidak boleh kosong'
    //     			]
    //             ],
    //             [
    //                 'field' => 'alamat_lengkap',
    //     			'rules' => 'required|trim',
    //     			'errors' => [
    //     				'required' => 'alamat tidak boleh kosong'
    //     			]
    //             ],
    //             [
    //                 'field' => 'no_hp',
    //     			'rules' => 'required|trim',
    //     			'errors' => [
    //     				'required' => 'nomer handphone tidak boleh kosong'
    //     			]
    //             ],
    //         ];
    
    //         $data = array('status' => false, 'messages' => array());
    //     	$this->form_validation->set_rules($config);
    //     	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    //         $this->form_validation->set_message('required', '{field} tidak boleh kosong');

    //     if ($this->form_validation->run() == false) {
    //         $data = [
    //             'view' => 'affiliator/edit-profile',
    //             'active' => 'edit-profile',
    //             'sub1' => 'edit-profile',
    //         ];
    //         $data['user'] = $this->m_profile->getUser($this->session->userdata('email'));
    //         $data['provinces'] = $this->m_profile->get_province();
    //         $data['cities'] = $this->m_profile->get_city($data['user']['province_id']);
    //         $data['districts'] = $this->m_profile->get_district($data['user']['city_id']);
    
    //         $this->load->view('template/index', $data);
    //     } else {
    //         $where = $this->db->get_where('tb_users', ['email', $this->session->userdata('email')])->row_array();

    //         $data = array(
    //             'nama_lengkap' => $this->input->post('nama_lengkap'),
    //             'province_id' => $this->input->post('province_id'),
    //             'city_id' => $this->input->post('city_id'),
    //             'district_id' => $this->input->post('district_id'),
    //             'alamat_lengkap' => $this->input->post('alamat_lengkap'),
    //             'no_hp' => $this->input->post('no_hp'),
    //         );

    //         $this->m_profile->update_data($where, $data, 'tb_users');
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account has been changed!</div>');
    //         redirect('affiliator/profile');
    //     }
    // }

   

}