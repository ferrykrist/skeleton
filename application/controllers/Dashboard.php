<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
    }


    public function index()
    {
        isLogin();
        $breadcrumb_items = [
            'Dashboard' => 'dashboard',
            'Profile' => 'profile'
        ];
        $this->breadcrumb->add_item($breadcrumb_items);
        $data['breadcrumb'] = $this->breadcrumb->generate();

        $data['namaview'] = 'templates/welcome';
        $this->load->view('templates/dashboard.php', $data);
    }
}
