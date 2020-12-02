<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (isset($_SESSION['uid'])) {
            redirect('dashboard');
        };
        $data['sitename'] = MY_SITETITLE;
        $data['canRegister'] = $this->pengaturan_model->canRegister();
        $this->form_validation->set_rules('username', 'Email/Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/login', $data);
        } else {
            $_SESSION['username'] = htmlspecialchars($this->input->post('username', true));
            $_SESSION['password'] = $this->input->post('password');
            redirect('auth/login');
        }
    }
}
