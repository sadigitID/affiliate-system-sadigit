<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit_profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('affiliator/m_profile', 'm_profile');
        $this->load->library('session');

	}
    
    public function index()
    {
        $data = [
            'view' => 'affiliator/edit-profile',
            'active' => 'edit-profile',
            'sub1' => 'edit-profile',
        ];

        $data['user'] = $this->m_profile->getUser($this->session->userdata('email'));
        $data['provinces'] = $this->m_profile->get_province();
        $data['cities'] = $this->m_profile->get_city($data['user']['province_id']);
        $data['districts'] = $this->m_profile->get_district($data['user']['city_id']);

        $this->load->view('template/index', $data);
    }

    public function get_city()
    {
        // if ($this->input->post('province_id')) {
        //     echo $this->m_profile->get_city($this->input->post('province_id'));
        // }
        
        $province_id = $this->input->post('province_id');
        $cities = $this->m_profile->get_city($province_id);

        $data = [];
        $data['cities'] = $cities;
        $citiesString = $this->load->view('edit-profile',$data,true); // This view will not load -- it will return as string  
        
        $response['cities'] = $citiesString;
        echo json_encode($response);

    }

    public function get_district()
    {
        // if ($this->input->post('city_id')) {
        //     echo $this->m_profile->get_district($this->input->post('city_id'));
        // }

        $city_id = $this->input->post('city_id');
        $districts = $this->m_profile->get_district($city_id);

        $data = [];
        $data['districts'] = $districts;
        $districtString = $this->load->view('edit-profile',$data,true); // This view will not load -- it will return as string  
        
        $response['districts'] = $districtString;
        echo json_encode($response);
    }


    public function edit($email) {
        $user = $this->m_profile->getUser($email);

        if (empty($user)) {
            $this->session->set_flashdata('error','Record not found.');
            redirect(base_url('edit_profile/index'));
        }

        $data = [
            'view' => 'affiliator/edit-profile',
            'active' => 'edit-profile',
            'sub1' => 'edit-profile',
        ];
        $data['user'] = $this->m_profile->getUser($this->session->userdata('email'));
        $data['provinces'] = $this->m_profile->get_province();
        $data['cities'] = $this->m_profile->get_city($data['user']['province_id']);
        $data['districts'] = $this->m_profile->get_district($data['user']['city_id']);

        $this->load->view('edit-profile',$data);
    }

    public function updateUser($email)
    {
        $response = [];

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

        if ($this->form_validation->run() == true) {
            // We will insert a record here
            $formData = [];
            $formData['nama_lengkap'] = $this->input->post('nama_lengkap');
            $formData['province_id'] = $this->input->post('province_id');
            $formData['city_id'] = $this->input->post('city_id');
            $formData['district_id'] = $this->input->post('district_id');
            $formData['alamat_lengkap'] = $this->input->post('alamat_lengkap');
            $formData['no_hp'] = $this->input->post('no_hp');
            $this->m_profile->update($email, $formData); // Here we will update a record
            $this->session->set_flashdata('message','User updated successfully.');

        } else {

            // Here we will return error
            $response['nama_lengkap'] = form_error('nama_lengkap');
            $response['province_id'] = form_error('province_id');
            $response['city_id'] = form_error('city_id');
            $response['district_id'] = form_error('district_id');
            $response['alamat_lengkap'] = form_error('alamat_lengkap');
            $response['no_hp'] = form_error('no_hp');
        }
        echo json_encode($response);
    }

    

}