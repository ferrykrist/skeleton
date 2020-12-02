<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    private $role;
    private $user_role = 2;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/user_model');
        $this->load->model('admin/modul_model');

        $this->user_role = checkAkses('USER');
        if ($this->user_role > 1) {
            $this->session->set_flashdata('message', genAlert(MY_NOAKSES, 'danger'));
            redirect('dashboard');
        }

        //$this->role = strtoupper($thris->user_model->get_role($_SESSION['id_role']));
        //$this->user_role = $this->user_model->get_user_role();
    }

    public function index()
    {
        $data['users'] = $this->user_model->get_user()->result();
        //$data['user_role'] = $this->user_role;
        $breadcrumb_items = [
            'Dashboard' => 'dashboard',
            'Users' => '#'
        ];
        $this->breadcrumb->add_item($breadcrumb_items);
        $data['breadcrumb'] = $this->breadcrumb->generate();
        $data['namaview'] = 'admin/user_list';
        $data['pagetitle'] = 'User List';
        $this->load->view('templates/dashboard.php', $data);
        /*
            $this->session->set_flashdata('message', genAlert(MY_USERNOTADMIN, 'danger'));
            redirect('dashboard');
        */
    }

    public function register()
    {
        $this->form_validation->set_rules('form_username', 'Name', 'required|trim|is_unique[web_user.Username]');
        $this->form_validation->set_rules('form_email', 'Email', 'required|trim|valid_email|is_unique[web_user.Email]');

        if ($this->form_validation->run() == true) {
            $register = [
                'Username' => $this->input->post('form_username'),
                'Email' => $this->input->post('form_email'),
                'Nama' => $this->input->post('form_nama'),
                'Image' => 'default.png',
                'Password' => md5(MY_DEFPASSWORD),
                'Active' => 0,
                'Date_created' => time()
            ];
            $this->user_model->user_register($register);
            $this->session->set_flashdata('message', genAlert(MY_USERCREATED));

            redirect('admin/users');
        }
        $breadcrumb_items = [
            'Dashboard' => 'dashboard',
            'Users' => 'admin/users/list',
            'Register' => '#'
        ];
        $data['action'] = 'register';

        $this->breadcrumb->add_item($breadcrumb_items);
        $data['breadcrumb'] = $this->breadcrumb->generate();
        $data['namaview'] = 'admin/user_form';
        $data['pagetitle'] = 'Tambah User';
        $this->load->view('templates/dashboard.php', $data);
    }

    public function enabled($uid)
    {
        if ($_SESSION['user']['UID'] == $uid) {
            $msg = 'Anda tidak bisa menonaktifkan user anda sendiri!';
            $this->session->set_flashdata('message', genAlert($msg));
        } else {
            $this->user_model->user_enabled($uid);
            $user = $this->user_model->get_profile($uid);
            if ($user['Active'] == 1) {
                $msg = 'User ' . $user['name'] . ' has been enabled';
            } else {
                $msg = 'User ' . $user['name'] . ' has been disabled';
            }
            $this->session->set_flashdata('message', genAlert($msg));
        }
        redirect('admin/users');
    }

    public function edit($uid)
    {
        $this->form_validation->set_rules('form_nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == true) {
            $data = [
                'uid' => $uid,
                'nama' => $this->input->post('form_nama')
            ];
            $this->user_model->user_update($data);
            $this->session->set_flashdata('message', genAlert(MY_DATAEDIT));

            redirect('admin/users');
        }
        $breadcrumb_items = [
            'Dashboard' => 'dashboard',
            'Users' => 'admin/users/list',
            'Edit' => '#'
        ];
        $data['user'] = $this->user_model->get_profile($uid);
        $data['action'] = 'edit';

        $this->breadcrumb->add_item($breadcrumb_items);
        $data['breadcrumb'] = $this->breadcrumb->generate();
        $data['namaview'] = 'admin/user_form';
        $data['pagetitle'] = 'Edit User';
        $this->load->view('templates/dashboard.php', $data);
    }

    public function delete($uid)
    {
        if ($_SESSION['user']['UID'] == $uid) {
            $msg = 'Maaf! anda tidak bisa menghapus user anda sendiri!';
            $this->session->set_flashdata('message', genAlert($msg));
        } else {
            $this->user_model->user_delete($uid);
            $this->session->set_flashdata('message', genAlert(MY_USERDELETED, 'danger'));
            redirect('admin/users');
        }
    }

    public function actions()
    {
        $action = $this->input->post('sbm');
        $uids = $this->input->post('UIDs');

        if ($action == 'reset') {
            foreach ($uids as $uid) {
                $this->user_model->user_reset_password($uid);
            }
        };
        if ($action == 'enable') {
            foreach ($uids as $uid) {
                $this->user_model->user_enabled($uid);
            }
        };
        if ($action == 'delete') {
            foreach ($uids as $uid) {
                //$this->modul_model->delete_user_departemen_by_uid($uid);
                //$this->modul_model->delete_user_modul_by_uid($uid);
                $this->user_model->user_delete($uid);
            }
            $this->session->set_flashdata('message', genAlert(MY_USERDELETED, 'danger'));
        };
        redirect('admin/users');
    }
    public function modul($uid, $action = 'index')
    {
        $this->form_validation->set_rules('f_idmodult', 'Nama', 'required|trim');

        if ($this->form_validation->run() == true) {
            $vars = ['uid' => $uid, 'idmodult' => $this->input->post('f_idmodult')];
            $this->modul_model->add_user_modul($vars);
            $this->session->set_flashdata('message', genAlert(MY_DATAINSERT));
            $action = 'index';
        }

        $data['usermodul'] = $this->modul_model->get_user_modul2($uid)->result();
        $data['user'] = $this->user_model->get_profile($uid);
        if ($action == 'add') {
            $data['moduls'] = $this->modul_model->get_modul_template()->result();
        }

        $breadcrumb_items = [
            'Dashboard' => 'dashboard',
            'Users' => 'admin/users/list',
            'Modul' => '#'
        ];
        $data['action'] = $action;

        $this->breadcrumb->add_item($breadcrumb_items);
        $data['breadcrumb'] = $this->breadcrumb->generate();
        $data['namaview'] = 'admin/user_modul';
        $data['pagetitle'] = 'User Modul';
        $this->load->view('templates/dashboard.php', $data);
    }

    public function deletemodul($uid, $id)
    {
        $this->modul_model->delete_user_modul($id);
        $this->session->set_flashdata('message', genAlert(MY_DATADELETE, 'danger'));
        redirect('admin/users/modul/' . $uid);
    }
}
