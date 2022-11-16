<?php 

Class User {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function get_user() {
        $this->CI->load->model('M_user');
        $id_user = $this->CI->session->userdata('id_user');
        $user_data = $this->CI->M_user->get_user($id_user)->row();
        return $user_data;
    }

}