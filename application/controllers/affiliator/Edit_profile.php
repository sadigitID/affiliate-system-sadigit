<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit_profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('Dropdown');
        $this->load->model('m_user');

	}

    public function index() {
        $data = [
            'view' => 'affiliator/edit-profile',
            'active' => 'edit-profile',
            'sub1' => 'edit-profile',
        ];

        $data['user'] =$this->m_user->getUser($this->session->userdata('email'));
        $data['provinces'] = $this->Dropdown->get_province();

        $this->load->view('template/index', $data);
    }

    // public function tb_pesanan()
	// {
	// 	header('Content-Type: application/json');


	// 	$tabel = 'tb_users';
	// 	$column_order = array();
	// 	$coloumn_search = array('id_user','nama_lengkap','password', 'province_id', 'city_id', 'district_id', 'alamat_lengkap', 'no_hp', 'email', 'role', 'is_active', 'created_at');
	// 	$select = "*";
	// 	$order_by = array('id_pesanan' => 'desc');
	// 	$join[] = ['field' =>  'tb_users', 'condition' => 'provinces.province_id = tb_users.province_id','cities.city_id = tb_users.city_id','districts.district_id = tb_users.district_id', 'direction' => 'left'];
	// 	$where = [];
	// 	$group_by = [];
	// 	$list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
	// 	$data = array();
	// 	$no = @$_POST['start'];

	// 	foreach ($list as $list) {
	// 		$row = array();
	// 		$row[] = ++$no;
	// 		$row[] = $list->id_user;
	// 		$row[] = $list->nama_lengkap;
	// 		$row[] = $list->password;
	// 		$row[] = $list->province_id;
    //         $row[] = $list->city_id;
	// 		$row[] = $list->district_id;
	// 		$row[] = $list->alamat_lengkap;
	// 		$row[] = $list->no_hp;
    //         $row[] = $list->email;
	// 		$row[] = $list->role;
    //         $row[] = $list->is_active;
	// 		$row[] = $list->at_created;
	// 		$data[] = $row;
	// 	}

	// 	$output = array(
	// 		"draw" => @$_POST['draw'],
	// 		"recordsTotal" => $this->umum->count_all($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
	// 		"recordsFiltered" => $this->umum->count_filtered($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
	// 		"data" => $data,
	// 	);
	// 	//output to json format
	// 	echo json_encode($output);
	// }


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