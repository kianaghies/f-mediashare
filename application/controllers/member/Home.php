<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Dashboard');
        $this->template->load('layouts/template', 'member/dashboard', $data);
    }

    public function detailedsong(){
        $this->load->helper('url');
        $this->load->model('Lagu_model');
        

        $idlagu = $this->input->post('l_id');
        $getlagu = $this->Lagu_model->getSongById($idlagu);
        $data = konfigurasi('Detail Lagu');

        $this->template->load('layouts/template', 'member/dashboard-detail', $data);

    }

    public function tampilkanGambar($id)
    {
        $data = daftarlagu('Dashboard');

        // Ambil data gambar dari database berdasarkan ID
        $lagugambar = $data['gambarlagu'];
    
        // Cek apakah data gambar ditemukan
        if ($lagugambar) {
            // Mendapatkan format gambar dari data gambar
            $gambarFormat = $lagugambar->tipeimage;
    
            // Set header untuk tipe konten gambar
            header('Content-Type: ' . $gambarFormat);
    
            // Menampilkan gambar
            echo $lagugambar->dataimage;
        } else {
            // Jika data gambar tidak ditemukan, tampilkan gambar default atau pesan error
            // ...
        }
    }


}
