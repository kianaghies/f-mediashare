<?php

class Lagu_model extends CI_Model{
    public $table = 'lagu';
    public $id = 'id_lagu';
    public $order = 'DESC';
    
    function __construct()
    {
        parent::__construct();
    }

    // Listing Konfigurasi
    public function listing() {
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row_array();
    }

}