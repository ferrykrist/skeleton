<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/user_model');
    }

    public function index()
    {
        redirect('dashboard');
    }



    // auth user - view profile
    public function change_profile()
    {
        $oldemail = $_SESSION['email'];
        $newemail = $this->input->post('email');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', '');
        if ($oldemail != $newemail) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
                'is_unique' => MY_USEREMAILISNOTUNIQUE
            ]);
        }

        if ($this->form_validation->run() == true) {
            $password = $this->input->post('password');
            $user = $this->user_model->get_profile($_SESSION['uid']);
            if (password_verify($password, $user['password'])) {
                $data = [];
                $data['uid'] = $_SESSION['uid'];
                $data['email']  = $newemail;
                $data['name'] = $this->input->post('name');
                $data['id_role'] = $user['id_role'];
                $data['active'] = $user['active'];
                $data['image'] = $user['image'];

                $this->user_model->user_update($data);
                $this->session->set_flashdata('message', genAlert(MY_USERLOGGEDOUT));
                redirect('auth/logout');
            } else {
                $this->session->set_flashdata('message', genAlert(MY_USERPASSNOTMATCHED, 'danger'));
                redirect('dashboard');
            }
        }
        $data = $this->user_model->get_profile($_SESSION['uid']);
        $data['role'] = strtoupper($this->user_model->get_role($_SESSION['id_role']));
        $breadcrumb_items = [
            'Dashboard' => 'dashboard',
            'Profile' => 'profile'
        ];
        $this->breadcrumb->add_item($breadcrumb_items);
        $data['breadcrumb'] = $this->breadcrumb->generate();
        $data['pagetitle'] = 'Profil User';

        $data['namaview'] = 'profile/change_profile';
        $this->load->view('templates/dashboard', $data);
    }

    // auth user - change password
    public function change_password()
    {
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password3]', ['min_length' => MY_USERPASSWORDTOOSHORT, 'matches' => MY_USERPASSNOTMATCHED]);
        $this->form_validation->set_rules('password3', 'Password', 'required|trim|matches[password2]');

        if ($this->form_validation->run() == true) {
            $password = $this->input->post('password');
            $user = $this->user_model->get_profile($_SESSION['uid']);
            if (password_verify($password, $user['password'])) {
                $data = [];
                $data['uid'] = $_SESSION['uid'];
                $data['password'] = $this->input->post('password2');
                $this->user_model->user_change_password($data);
                $this->session->set_flashdata('message', genAlert(MY_USERPASSWORDCHANGED));
            } else {
                $this->session->set_flashdata('message', genAlert(MY_USERPASSNOTMATCHED, 'danger'));
            }
        }
        $breadcrumb_items = [
            'Dashboard' => 'dashboard',
            'Profile' => 'profile'
        ];
        $this->breadcrumb->add_item($breadcrumb_items);
        $data['breadcrumb'] = $this->breadcrumb->generate();
        $data['namaview'] = 'profile/change_password';
        $data['pagetitle'] = 'Ganti Password';

        $this->load->view('templates/dashboard.php', $data);
    }
}
