<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Person_model extends CI_Model
{
    public $table = 'user';
    public $id    = 'user.id';

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function get_all()
    {
        return $this->db->get('user')->result_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function updatePass($data, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
	}

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function getUserLimit(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get()->result_array();
    }
}

/* End of file Person_model.php */
