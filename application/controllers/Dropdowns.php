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
        $postData = $this->input->post();

        $data = $this->dropdown->get_city($postData);
        echo json_encode($data);
    }

    public function get_district()
    {
        $postData = $this->input->post();

        $data = $this->dropdown->get_district($postData);
        echo json_encode($data);
    }



}