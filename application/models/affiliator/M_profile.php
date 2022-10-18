<?php
class M_profile extends CI_Model
{ 
    //membuat method get data dari tabel tb_users
    public function getUser()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->db->query("select 
        a.*,b.*,c.*,d.* from tb_users a 
        left join provinces b on a.province_id=b.province_id 
        left join cities c on a.city_id=c.city_id 
        left join districts d on a.district_id=d.district_id 
        where a.id_user='$id_user' ")->row_array();
        
        // $this->db->where('id_user', $id_user);
        // $data = $this->db->get('tb_users')->row_array();
        // return $data;
    }
    
    // public function get_user_id($id_user)
    // {
    //     $this->db->where('id_user', $id_user);
    //     $data = $this->db->get('tb_users')->row_array();
    //     return $data;
    // }
    
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function get_province()
    {
        $provinces = $this->db->get('provinces')->result_array();
        return $provinces;
    }
    
    public function get_city($province_id)
    {
        $this->db->where('province_id', $province_id);
        $this->db->order_by('city_name', 'asc');
        $query = $this->db->get('cities');
        $output = '<option value="">Select City</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
        }

        return $output;
    }

        
    public function get_district($province_id = NULL, $city_id = NULL)
    {
        $this->db->where('city_id', $city_id);
        $this->db->where('province_id', $province_id);
        $this->db->order_by('district_name', 'asc');
        $query = $this->db->get('districts');
        $output = '<option value="">Select District</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="'.$row->district_id.'">'.$row->district_name.'</option>';
        }

        return $output;
       
    }

}