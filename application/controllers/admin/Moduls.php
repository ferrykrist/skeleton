<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Moduls extends CI_Controller
{
    private $role = [];
    private $user_role = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/modul_model');
    }

    public function index()
    {

        $data['modultemplate'] = $this->modul_model->get_modul_template()->result();

        $breadcrumb_items = [
            'Dashboard' => 'dashboard',
            'Moduls' => '#',
            'Template' => '#'
        ];
        $this->breadcrumb->add_item($breadcrumb_items);
        $data['breadcrumb'] = $this->breadcrumb->generate();
        $data['namaview'] = 'admin/modul_template';
        $data['pagetitle'] = 'Modul Template';
        $data['action'] = 'index';
        $this->load->view('templates/dashboard.php', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('form_modult_name', 'Nama Template', 'required|trim');
        if ($this->form_validation->run() == true) {
            $vars['ModulTemplate'] = $this->input->post('form_modult_name');
            $vars['Description'] = $this->input->post('form_modult_deskripsi');
            $vars['IDModul'] = $this->input->post('form_modult_modul');
            $this->modul_model->add_modul_template($vars);
            redirect('admin/moduls');
        }
        $data['modullistform'] = $this->modul_model->get_modul_list()->result();

        $breadcrumb_items = [
            'Dashboard' => 'dashboard',
            'Moduls' => 'admin/moduls',
            'Template' => 'admin/moduls'
        ];
        $this->breadcrumb->add_item($breadcrumb_items);
        $data['breadcrumb'] = $this->breadcrumb->generate();
        $data['namaview'] = 'admin/modul_template_add';
        $data['pagetitle'] = 'Tambahkan Modul Template';
        $data['action'] = 'index';
        $this->load->view('templates/dashboard.php', $data);
    }
    public function delete($id)
    {
        $this->modul_model->delete_modul_template($id);
        $this->session->set_flashdata('message', genAlert(MY_DATADELETE, 'danger'));
        redirect('admin/moduls');
    }

    public function detail($id)
    {
        $this->form_validation->set_rules('fnama_modul', 'Module', 'trim');
        if ($this->form_validation->run() == true) {
            $data['IDModulTemplate'] = $this->input->post('fid_modul');
            $data['IDModul'] = $this->input->post('fnama_modul');
            $this->modul_model->add_modul_template_detail($data);
        }
        $data['modultemplate'] = $this->modul_model->get_modul_template_byid($id)->row_array();
        $data['modultemplatedetail'] = $this->modul_model->get_modul_template_detail($id)->result();
        $data['moduls'] = $this->modul_model->get_modul_list_byparent($data['modultemplate']['IDModul'])->result();

        $breadcrumb_items = [
            'Dashboard' => 'dashboard',
            'Users' => '#'
        ];
        $this->breadcrumb->add_item($breadcrumb_items);
        $data['breadcrumb'] = $this->breadcrumb->generate();
        $data['namaview'] = 'admin/modul_template_detail';
        $data['pagetitle'] = 'Modul Template';
        $this->load->view('templates/dashboard.php', $data);
    }

    public function template_detail_delete($idm, $id)
    {
        $this->modul_model->delete_modul_template_detail($id);
        redirect(base_url('admin/moduls/detail/' . $idm));
    }
}
