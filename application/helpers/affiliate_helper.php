<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role = $ci->session->userdata('role');
        $userAccess = $ci->db->get_where('tb_users', [
            'role' => $role
        ]);
        if ($userAccess->num_rows() == 'Affiliator') {
            redirect('auth/blocked');
        }
    }
}

function check_admin()
{
    $ci = get_instance();
    $ci->load->library('session'); 
    if ($ci->session->userdata('role') != 'Admin') {
        redirect('affiliator');
    }
   
}
