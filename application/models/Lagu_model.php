<?php

class Lagu_model extends CI_Model{
    public $idlagu = 'lagu.id_lagu';
    public function getAllLagu()
    {
        return $this->db->get('lagu')->result_array();
    }

    public function getSecondLaguData() {
        return $this->db->get('lagu');
    }

    //public function metode_pencarian($keyword)
    //{
    //    $word = $this->db->escape_str($keyword);
    //    $this->db->like('judul_lagu', $word); // Sesuaikan dengan kolom yang ingin dicari
    //    // Lakukan query pencarian
    //    $query = $this->db->get('lagu');
    //    return $query->result();
    //}


    public function simpanData($data = null)
    {
        $this->db->insert('lagu', $data);
    }

    public function joinKategoriLagu($where)
    {
        $this->db->select('*');
        $this->db->from('lagu');
        $this->db->join('kategori','kategori.id_kategori = lagu.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getSongById($idlagu)
    {
        // Ambil data buku berdasarkan ID dari sumber data (misalnya database)
        // Lakukan query atau logika lainnya sesuai dengan struktur database Anda
        $query = $this->db->get_where('lagu', array('id_lagu' => $idlagu));
        return $query->row();
    }

    public function delete($idlagu)
    {
        $this->db->where('id_lagu', $idlagu);
        $this->db->delete('lagu');
        return $this->db->affected_rows();
    }

    public function getLaguLimit(){
        $this->db->select('*');
        $this->db->from('lagu');
        $this->db->limit(10, 0);
        return $this->db->get()->result_array();
    }

    public function getImageById($idlagu)
    {
        $this->db->select('*');
        $this->db->where('id_gambar', $idlagu);
        return $this->db->get('thumbnail')->row_array();
    }


}