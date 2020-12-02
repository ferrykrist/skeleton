<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modul_model extends CI_Model
{
    public function get_modul_list($modultype = 'modul')
    {
        return $this->db->get_where('web_modul', ['ModulType' => $modultype]);
    }

    public function get_modul_list_byparent($id)
    {
        $this->db->where('IDParentModul', $id);
        $this->db->order_by('Modul');
        return $this->db->get('web_modul');
    }

    public function get_modul_template_list($uid)
    {
        $user = $this->db->dbprefix('web_user_modul');
        $modul = $this->db->dbprefix('web_modul_template');
        $sql = "SELECT * FROM $modul WHERE IDModul IN 
        (SELECT IDModul FROM $user WHERE UID= $uid) ORDER BY ModulTemplate;";
        return $this->db->query($sql);
    }

    public function get_modul_template()
    {
        $modult = $this->db->dbprefix('web_modul_template');
        $modul = $this->db->dbprefix('web_modul');
        $this->db->select('*');
        $this->db->from('web_modul_template AS t');
        $this->db->join('web_modul AS m', 'm.IDModul=t.IDModul');
        $this->db->order_by('t.IDModul');
        return $this->db->get();
    }


    public function get_modul_template_byid($id)
    {
        return $this->db->get_where('web_modul_template', ['IDModulTemplate' => $id]);
    }

    public function add_modul_template($data)
    {
        $this->db->insert('web_modul_template', $data);
    }

    public function delete_modul_template($id)
    {
        $this->db->where('IDModulTemplate', $id);
        $this->db->delete('web_modul_template_d');
        $this->db->where('IDModulTemplate', $id);
        $this->db->delete('web_modul_template');
    }

    public function get_modul_template_detail($id)
    {
        $this->db->select('*');
        $this->db->from('web_modul_template_d AS d');
        $this->db->join('web_modul AS m', 'm.IDModul=d.IDModul');
        $this->db->where('d.IDModulTemplate', $id);
        $this->db->order_by('m.ModulType, m.Modul');
        return $this->db->get();
    }

    public function add_modul_template_detail($data)
    {
        $this->db->insert('web_modul_template_d', $data);
    }

    public function delete_modul_template_detail($id)
    {
        $this->db->where('AutoID', $id);
        $this->db->delete('web_modul_template_d');
    }

    public function add_user_modul($data)
    {
        $user = $this->db->dbprefix('web_user_modul');
        $modult = $this->db->dbprefix('web_modul_template_d');
        $sql = "DELETE FROM $user WHERE IDModul IN (SELECT IDModul FROM $modult WHERE IDModulTemplate=" . $data['idmodult'] . ")";
        $this->db->query($sql);
        $sql = "INSERT INTO $user(UID, IDModul) SELECT " . $data['uid'] . ", IDModul FROM $modult WHERE IDModulTemplate=" . $data['idmodult'];
        $this->db->query($sql);
    }

    public function delete_user_modul($id)
    {
        $this->db->where('AutoID', $id);
        $this->db->delete('web_user_modul');
    }

    public function get_user_modul2($uid)
    {
        $modul = $this->db->dbprefix('web_modul');
        $usermodul = $this->db->dbprefix('web_user_modul');
        $sql = "SELECT * FROM $usermodul AS u, $modul AS m WHERE m.IDModul=u.IDModul AND u.UID=$uid ORDER BY m.Modul";
        return $this->db->query($sql);
    }


    public function get_user_modul($uid)
    {
        $data = [];
        $modul = $this->db->dbprefix('web_modul');
        $usermodul = $this->db->dbprefix('web_user_modul');


        $sql = "SELECT * FROM $usermodul AS u, $modul AS m WHERE m.IDModul=u.IDModul
        AND m.ModulType='modul' AND u.UID=$uid ORDER BY m.Modul";
        $rows = $this->db->query($sql)->result();
        foreach ($rows as $row) {
            $data['modul'][$row->Modul] = array();
            $data['akses'][$row->Modul] = $row->IDRole;
        }

        $sql = "SELECT * FROM $usermodul AS u, $modul AS m WHERE m.IDModul=u.IDModul
        AND m.ModulType='menu' AND u.UID=$uid ORDER BY m.Modul";
        $rows = $this->db->query($sql)->result();
        foreach ($rows as $row) {
            $data['menu'][$row->Modul] = array();
        }

        $sql = "SELECT * FROM $usermodul AS u, $modul AS m WHERE m.IDModul=u.IDModul
        AND m.ModulType='dashboard' AND u.UID=$uid ORDER BY m.Modul";
        $rows = $this->db->query($sql)->result();
        foreach ($rows as $row) {
            $data['dashboard'][$row->Modul] = array();
        }

        return $data;
    }
}
