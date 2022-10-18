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

        $data['user'] = $this->m_profile->getUser('id_user', $this->session->userdata('id_user'));
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

    public function profile()
    {
        $data = [
            'view' => 'affiliator/edit-profile',
            'active' => 'edit-profile',
            'sub1' => 'edit-profile',
        ];

        $data['user'] = $this->m_profile->getUser('id_user', $this->session->userdata('id_user'));
        $data['provinces'] = $this->m_profile->get_province();
        $data['cities'] = $this->m_profile->get_city($data['user']['province_id']);
        $data['districts'] = $this->m_profile->get_district($data['user']['city_id']);

        $this->load->view('template/index', $data);
    }

    public function edit() {
        $data = [
            'view' => 'affiliator/edit-profile',
            'active' => 'edit-profile',
            'sub1' => 'edit-profile',
        ];

        // $data['user'] = $this->db->query("select a.*,b.*,c.*,d.* from tb_users a join provinces b on a.province_id=b.province_id join cities c on a.city_id=c.city_id join districts d on a.district_id=d.district_id where a.id_user='$id_user' ")->row_array();
        $data['user'] = $this->m_profile->getUser('id_user', $this->session->userdata('id_user'));
        $data['provinces'] = $this->m_profile->get_province();
        $data['cities'] = $this->m_profile->get_city($data['user']['province_id']);
        $data['districts'] = $this->m_profile->get_district($data['user']['city_id']);

        $this->load->view('template/index',$data);
    }

    public function updateUser() 
    {
            $config = [
                [
                    'field' => 'nama_lengkap',
        			'rules' => 'required|trim',
        			'errors' => [
        				'required' => 'nama tidak boleh kosong'
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

        if ($this->form_validation->run() == false) {
            $data = [
                'view' => 'affiliator/edit-profile',
                'active' => 'edit-profile',
                'sub1' => 'edit-profile',
            ];
    
            $data['user'] = $this->m_profile->getUser('id_user', $this->session->userdata('id_user'));
            $data['provinces'] = $this->m_profile->get_province();
            $data['cities'] = $this->m_profile->get_city($data['user']['province_id']);
            $data['districts'] = $this->m_profile->get_district($data['user']['city_id']);
    
            $this->load->view('template/index', $data);
        } else {
            $id_user = $this->input->post('id_user');
            $where = array (
                'id_user' => $id_user
            );

            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'province_id' => $this->input->post('province_id'),
                'city_id' => $this->input->post('city_id'),
                'district_id' => $this->input->post('district_id'),
                'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                'no_hp' => $this->input->post('no_hp'),
            ); 

            $this->m_profile->update_data($where, $data, 'tb_users');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account has been changed!</div>');
            redirect(base_url(). 'affiliator/profile');
        }
    }

    

}