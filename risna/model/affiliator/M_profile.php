<?php
class M_profile extends CI_Model
{
    //membuat method get data dari tabel tb_users
    public function getUser($email)
    {
        return $this->db->query("select a.*,b.*,c.*,d.* from tb_users a join provinces b on a.province_id=b.province_id join cities c on a.city_id=c.city_id join districts d on a.district_id=d.district_id where a.email='$email' ")->row_array();
    }

    function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

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
        // $query = $this->db->get('cities')->join('tb_users', 'tb_users.city_id=tb_bonus.city_id')->get_where('province_id', $province_id)->result();
       
        $query = $this->db->get('cities');
        $output = '<option value="">Select City</option>';
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
        $output = '<option value="">Select District</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="'.$row->district_id.'">'.$row->district_name.'</option>';
        }

        return $output;
       
    }

}