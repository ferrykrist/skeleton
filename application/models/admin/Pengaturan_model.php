<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_model extends CI_Model
{
    public function getPengaturanValue($key)
    {
        $query = $this->db->get_where('web_pengaturan', ['Key' => $key])->row_array();
        empty($query) ? $result = null : $result = $query['Value'];
        return $result;
    }

    public function setPengaturan($data)
    {
        $this->db->set($data['key'], ['Value' => $data['value']]);
        $this->db->update('web_pengaturan');
    }

    public function canRegister()
    {
        return ($this->getPengaturanValue('OpenRegistration') == 1 ? true : false);
    }
}
