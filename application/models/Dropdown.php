<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdown extends CI_Model
{
    public function __construct()
    {
        parent::__construct(); //
        $this->provinceTbl = 'provinces';
        $this->cityTbl = 'cities';
        $this->districtTbl = 'districts';
    }
    
    public function get_province($params = array())
    {
        $this->db->select('p.province_id', '.province_name');
        $this->db->from($this->provinceTbl . ' as p');

        if (array_key_exists('conditions', $params)) {
            foreach ($params['conditions'] as $key => $value) {
                if (strpos($key, '.') !== false) {
                    $this->db->where($key, $value);
                } else {
                    $this->db->where('p.'. $key, $value);
                }
            }
        }
        $query = $this->db->get();
        return $query->result_array();

    }
    
    public function get_city($params = array())
    {
        $this->db->select('c.city_id', 'c.city_name');
        $this->db->from($this->cityTbl . ' as c');

        if (array_key_exists('conditions', $params)) {
            foreach ($params['conditions'] as $key => $value) {
                if (strpos($key, '.') !== false) {
                    $this->db->where($key, $value);
                } else {
                    $this->db->where('c.'. $key, $value);
                }
            }
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    public function get_district($params = array())
    {
        $this->db->select('d.district_id', 'd.district_name');
        $this->db->from($this->districtTbl . ' as d');

        if (array_key_exists('conditions', $params)) {
            foreach ($params['conditions'] as $key => $value) {
                if (strpos($key, '.') !== false) {
                    $this->db->where($key, $value);
                } else {
                    $this->db->where('d.'. $key, $value);
                }
            }
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
}