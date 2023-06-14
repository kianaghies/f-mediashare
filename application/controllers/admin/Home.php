<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Halaman Admin Utama');
        $this->template->load('layouts/template', 'admin/dashboard', $data);
    }

    public function allaccount(){
        $data = konfigurasi('Semua Pengguna');
        $this->template->load('layouts/template', 'admin/dashboard-daftarakun', $data);
    }

    public function allsongs(){
        $data = konfigurasi('Semua Lagu');
        $this->template->load('layouts/template', 'admin/dashboard-daftarlagu', $data);
    }


}
