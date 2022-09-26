<?php 

function login()
{
    $CI =& get_instance();
    $CI->load->model('M_user');
    $email = $CI->input->post('email', true);
    $password = $CI->input->post('password', true);
    $user = $CI->M_user->get_user($email)->row();
    if ($user) {
        if ($user->is_active == 1) {
            if (password_verify($password, $user->password)) {
                $data = [
                    'email' => $user->email,
                    'role' => $user->role,
                    'nama_lengkap' => $user->nama_lengkap,
                    'id_user' => $user->id_user,
                ];
                $CI->session->set_userdata($data);
                if ($user->role == 'Admin') {
                    redirect('admin/administrator');
                } else {
                    redirect('affiliator/affiliator');
                }
            } else {
                $CI->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
        } else {
            $CI->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktivasi</div>');
            redirect('auth');
        }
    } else {
        $CI->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
        redirect('auth');
    }

    function not_login() {
        $CI =& get_instance();
        $user_session = $CI->session->userdata('email');
        if (!$user_session) {
            redirect('auth');
        }
    }
}