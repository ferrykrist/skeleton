<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function user_update($data)
    {
        if (isset($data['username'])) {
            $this->db->set('Username', $data['username']);
        }
        if (isset($data['nama'])) {
            $this->db->set('Nama', $data['nama']);
        }
        if (isset($data['email'])) {
            $this->db->set('Email', $data['email']);
        }
        if (isset($data['image'])) {
            $this->db->set('Image', $data['image']);
        }
        if (isset($data['active'])) {
            $this->db->set('Active', $data['active']);
        }
        if (isset($data['password'])) {
            $this->db->set('Password', md5($data['password']));
        }
        $this->db->where('UID', $data['uid']);
        $this->db->update('web_user');
    }

    public function user_register($data)
    {
        $this->db->insert('web_user', $data);
    }

    public function user_change_password($data)
    {
        $this->user_update($data);
    }

    public function user_reset_password($uid)
    {
        $this->db->set('Password', md5(MY_DEFPASSWORD));
        $this->db->where('UID', $uid);
        $this->db->update('web_user');
    }

    public function get_profile($uid)
    {
        return $this->db->get_where('web_user', ['uid' => $uid])->row_array();
    }
    public function get_profile_byemail($input)
    {
        $this->db->where('Username', $input);
        $this->db->or_where('Email', $input);
        return $this->db->get('web_user')->row_array();
    }

    public function user_login_time($uid)
    {
        $this->db->set('LastLogin', 'CURRENT_TIMESTAMP()', false);
        $this->db->where('UID', $uid);
        $this->db->update('web_user');
    }

    public function get_superadmin($uid = null)
    {
        if (isset($uid)) {
            return $this->db->get_where('web_user_superadmin', ['UID' => $uid]);
        } else {
            $this->db->select('*');
            $this->db->from('web_user AS u');
            $this->db->join('web_user_superadmin AS s', 'u.UID=s.UID');
            return $this->db->get();
        }
    }

    public function add_superadmin($uid)
    {
        $this->delete_superadmin($uid);
        $this->db->insert('web_user_superadmin', ['UID' => $uid]);
    }

    public function delete_superadmin($uid)
    {
        $this->db->where('UID', $uid);
        $this->db->delete('web_user_superadmin');
    }

    public function get_user()
    {
        return $this->db->get('web_user');
    }

    public function user_delete($uid)
    {
        $this->db->where('UID', $uid);
        $this->db->delete('web_user');
    }

    public function user_enabled($uid)
    {
        $user = $this->db->dbprefix('web_user');
        $sql = "update $user set Active=IF(Active=1,0,1) WHERE UID= $uid";
        $this->db->query($sql);
    }















    public function get_user_role()
    {
        $result = $this->db->get('web_user_role')->result();
        return $result;
    }

    public function get_role($id_role)
    {
        $result = $this->db->get('web_user_role')->row_array();
        return $result['role'];
    }
}
