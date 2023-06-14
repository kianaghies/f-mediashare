<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin_model extends CI_Model
{

    public function getAdminById($adminId)
    {
        $this->db->where('id', $adminId);
        return $this->db->get('user')->row_array();
    }
    
    public function updatePassword($adminId, $newPassword)
    {
        $this->db->where('id', $adminId);
        $this->db->update('user', array('password' => $newPassword));
    }

    public function get_by_id($id)
    {
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}    