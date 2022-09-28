<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdowns extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dropdown');
    } 

    public function index()
    {
        $data['provinces'] = $this->Dropdown->get_province();
        $this->load->view('template/auth/registration', $data); 
    
    }

    public function get_city()
    {
        if ($this->input->post('province_id')) {
            echo $this->Dropdown->get_city($this->input->post('province_id'));
        }

    }

    public function get_district()
    {
        if ($this->input->post('city_id')) {
            echo $this->Dropdown->get_district($this->input->post('city_id'));
        }

    }
 
}