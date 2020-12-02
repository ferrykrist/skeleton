<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Debug extends CI_Controller
{
    public function index()
    {
        $breadcrumb_items = [
            'Dashboard' => 'dashboard',
            'Debug' => '#'
        ];
        $this->breadcrumb->add_item($breadcrumb_items);
        $data['breadcrumb'] = $this->breadcrumb->generate();
        $data['namaview'] = 'admin/debug';
        $data['pagetitle'] = 'Debug';
        $this->load->view('templates/dashboard.php', $data);
    }
}
