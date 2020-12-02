<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/user_model');
        $this->load->model('admin/modul_model');
    }

    public function logout()
    {
        session_destroy();
        redirect('login');
    }

    public function login()
    {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        unset($_SESSION['username']);
        unset($_SESSION['password']);

        $user = $this->user_model->get_profile_byemail($username);
        if ($user) {
            if ($user['Active'] == 1) {
                if (password_verify($password, $user['Password'])) {
                    $_SESSION['user'] = [
                        'Email' => $user['Email'],
                        'Username' => $user['Username'],
                        'Image' => checkImgProfile($user['UID']),
                        'UID' => $user['UID']
                    ];
                    if (!empty($this->user_model->get_superadmin($user['UID'])->row_array())) {
                        $_SESSION['superadmin'] = true;
                    }
                    $this->user_model->user_login_time($user['UID']);
                    $_SESSION['modul'] = $this->modul_model->get_user_modul($user['UID']);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', genAlert(MY_USERPASSNOTMATCHED, 'danger'));
                }
            } else {
                $this->session->set_flashdata('message', genAlert(MY_USERDISABLED, 'danger'));
            }
        } else {
            $this->session->set_flashdata('message', genAlert(MY_USERDOESNOTEXISTS, 'danger'));
        }
        redirect('login');
    }
}
