<?php

class Auth extends CI_Model
{

    public function action($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function getCurrentContact($id_user)
    {
        $query = $this->db->query("SELECT COUNT(*) as current_contact FROM list_contact WHERE fk_id_users = $id_user");
        return $query;
    }

    public function cekToken($token)
    {
        $query = $this->db->get_where('user', array('token_dashboard' => $token));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
        // return $query;
    }
}
