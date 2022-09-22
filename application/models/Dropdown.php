<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdown extends CI_Model
{   
    public function get_province()
    {
        $this->db->order_by('province_name', 'asc');
        $query = $this->db->get('provinces');
        return $query->result();
    }
    
    public function get_city($province_id)
    {
        $this->db->where('province_id', $province_id);
        $this->db->order_by('city_name', 'asc');
        $query = $this->db->get('cities');
        $output = '<option value="">-- Pilih Kabupaten --</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
        }

        return $output;
    }

        
    public function get_district($city_id)
    {
        $this->db->where('city_id', $city_id);
        $this->db->order_by('district_name', 'asc');
        $query = $this->db->get('districts');
        $output = '<option value="">-- Pilih Kecamatan --</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="'.$row->district_id.'">'.$row->district_name.'</option>';
        }

        return $output;
       
    }

    public function get_user($id_user)
    {
        $query = $this->db->get_where('tb_users', ['id_user' => $id_user]);
        return $query;
    }
    
}