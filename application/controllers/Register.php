<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['sitename'] = MY_SITETITLE;
        if ($this->pengaturan_model->canRegister()) {
            $this->form_validation->set_rules('username', 'Name', 'required|trim|is_unique[web_user.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[web_user.email]');
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', ['min_length' => 'Password too short', 'matches' => 'Passwords do not matched']);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

            if ($this->form_validation->run() == true) {
                $data = [
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'image' => 'default.png',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'active' => 0,
                    'date_created' => time()
                ];
                $this->load->model('admin/user_model');
                $this->user_model->user_register($data);
                $this->session->set_flashdata('message', genAlert(MY_USERCREATED));
                redirect('login');
            }
            $this->load->view('templates/register', $data);
        } else {
            redirect(site_url());
        }
    }
}
