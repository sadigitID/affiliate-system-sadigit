<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdown extends CI_Model
{   
    public function get_province()
    {
        $response = array();

        $this->db->select('*');
        $q = $this->db->get('provinces');
        $response = $q->result_array();

        return $response;
    }
    
    public function get_city($postData)
    {
        $response = array();

        $this->db->select('city_id, city_name');
        $this->db->where('provinces', $postData['provinces']);
        $q = $this->db->get('cities');
        $response = $q->result_array();

        return $response;
        
    }
    
    
    public function get_district($postData)
    {
        $response = array();

        $this->db->select('district_id, district_name');
        $this->db->where('cities', $postData['cities']);
        $q = $this->db->get('districts');
        $response = $q->result_array();

        return $response;
    }
    
}