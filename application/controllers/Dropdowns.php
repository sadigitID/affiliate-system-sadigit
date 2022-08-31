<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdowns extends CI_Controller
{
    public function index()
    {
        $this->load->model('dropdown');
        $this->load->helper('url');

        $data['provinces'] = $this->dropdown->get_province();
        $this->load->view('template/auth/registration', $data);
    }

    public function get_city()
    {
        $postData = $this->input->post();
        $this->load->model('dropdown');

        $data = $this->dropdown->get_city($postData);
        echo json_encode($data);
    }

    public function get_district()
    {
        $postData = $this->input->post();
        $this->load->model('dropdown');

        $data = $this->dropdown->get_district($postData);
        echo json_encode($data);
    }



}