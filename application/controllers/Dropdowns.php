<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdowns extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('dropdown');
    }

    public function index()
    {
        $data['provinces'] = $this->dropdown->get_province();
        $this->load->view('template/auth/registration', $data);
    }

    public function get_city()
    {
        $cities = array();
        $province_id = $this->input->post('province_id');
        if ($province_id) {
            $con['conditions'] = array(
                'province_id' => $province_id
            );
            $cities = $this->dropdowns->get_city($con);
        }
        echo json_encode($cities);
    }

    public function get_district()
    {
        $districts = array();
        $city_id = $this->input->post('city_id');
        if ($city_id) {
            $con['conditions'] = array(
                'city_id' => $city_id
            );
            $districts = $this->dropdowns->get_district($con);
        }
        echo json_encode($districts);
    }



}