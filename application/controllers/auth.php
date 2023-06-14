<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function profile()
    {
        $data = konfigurasi('Profile', 'Kelola Profile');
        $this->template->load('layouts/template', 'authentication/profile', $data);
        
    }

    //public function metode_pencarian()
    //{
    //    $this->load->helper('url');
    //    $this->load->model('Lagu_model');
        

    //    $keyword = $this->input->get('keyword'); // Mendapatkan keyword pencarian dari input GET
    //   $idlagu = $this->input->post('l_id');
    //    $getlagu = $this->Lagu_model->getSongById($idlagu);
    //    $data = konfigurasi('Detail Lagu');

    //    $this->template->load('layouts/template', 'member/dashboard-detailcari', $data);
    //}


    public function delaccount(){
        $this->load->model('Person_model');
        $iddelete = $this->input->post('iduserdel');

        $this->Person_model->delete($iddelete);
        redirect('admin/home/allaccount');
    }

    public function delsong(){
        $this->load->model('Lagu_model');
        $iddelete = $this->input->post('idlagudel');

        $this->Lagu_model->delete($iddelete);
        redirect('admin/home/allsongs');
    }

    public function passwordchange() {
        $data = konfigurasi('Profile', 'Kelola Profile');
        $this->template->load('layouts/template', 'authentication/password', $data);
    }

    public function tambahpost(){
        $data = konfigurasi('Profile', 'Kelola Profile');
        $this->template->load('layouts/template', 'member/tambahpostingan', $data);
    }

    public function kirimpost(){
        $this->load->model('Lagu_model');
        
        //$username = $this->Auth_model->getUsername('id');
        $l_uploadwho = $this->input->post('l_uploadwho');
        $l_judul = $this->input->post('l_judul');
        $l_artist = $this->input->post('l_artist');
        $l_album = $this->input->post('l_album');
        $l_tahun = $this->input->post('l_tahun');
        $l_linkflac = $this->input->post('l_linkflac');
        $l_linkmp3 = $this->input->post('l_linkmp3');
        $l_deskripsi = $this->input->post('l_deskripsi');
        $upload = $this->_do_uploadthumb();
        $date = date('Y-m-d H:i:s');

        $data = array(
            'judul_lagu' => $l_judul,
            'artist' => $l_artist,
            'album' => $l_album,
            'tahun_rilis' => $l_tahun,
            'tanggal_up' => $date,
            'upload_by' => $l_uploadwho,
            'link_flac' => $l_linkflac,
            'link_mp3' => $l_linkmp3,
            'deskripsi' => $l_deskripsi,
            'photo' => $upload

        );
        
        $this->Lagu_model->simpanData($data, 'lagu');
        redirect(base_url());


    }

    public function guest(){
        if ($this->session->userdata('is_login')){
            if ($this->session->userdata('id_role') == "1") {
                redirect('admin/home');
            }
            if ($this->session->userdata('id_role') == "2") {
                redirect('member/home');
            }
        } else {
            $data = guest('Dashboard');
                
            $this->template->load('layouts/template-guest', 'member/dashboard-guest', $data);
        }
    }

    public function detailedsongguest(){
        $data = guest('Detail Lagu');

        $this->template->load('layouts/template-guest', 'member/dashboard-detail', $data);

    }
    

    public function updateProfile()
    {
        $this->load->model('Auth_model');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]|max_length[50]');

        $id = $this->session->userdata('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $negara = $this->input->post('negara');
        $kota = $this->input->post('kota');
        $tanggal_lahir = $this->input->post('tanggal_lahir');


        $data = array(
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'negara' => $negara,
            'kota' => $kota,
            'tanggal_lahir' => $tanggal_lahir,
        );
        if ($this->form_validation->run() == true) {
            if (!empty($_FILES['photo']['name'])) {
                $upload = $this->_do_upload();

                //delete file
                $user = $this->Auth_model->get_by_id($this->session->userdata('id'));
                if (file_exists('assets/uploads/images/foto_profil/'.$user->photo) && $user->photo) {
                    unlink('assets/uploads/images/foto_profil/'.$user->photo);
                }

                $data['photo'] = $upload;
            }
            $result = $this->Auth_model->update($data, $id);
            if ($result > 0) {
                $this->updateProfil();
                $this->session->set_flashdata('msg', show_succ_msg('Data Profil Berhasil diubah'));
                redirect('auth/profile');
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
                redirect('auth/profile');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }
    public function passwordAdmin(){
        $this->load->model('Person_model');

        $iduser = $this->input->post('iduser');
        $personal = $this->Person_model->get_by_id($iduser);
        $data = konfigurasi('Manajemen Password User');

        $this->template->load('layouts/template', 'admin/ubahpassword', $data);
    }

    public function updatePasswordAdmin()
    {
        
        $this->load->model('Admin_model');
            // Pastikan hanya admin yang dapat mengakses fungsi ini
        if ($this->session->userdata('id_role') != '1') {
            $this->session->set_flashdata('msg', show_err_msg('Tolong gunakan akun admin'));
            redirect(base_url()); // Redirect ke halaman login jika bukan admin
        }
        // Validasi form input
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
        $iduser = $this->input->post('iduser');
        $personal = $this->Admin_model->get_by_id($iduser);

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan kembali halaman form ganti password
            redirect(base_url('auth/passwordAdmin'));
        } else {
            // Ambil data pengguna yang sedang login
            $user = $this->Admin_model->getAdminById($iduser);

            // Periksa apakah password saat ini cocok dengan yang dimasukkan pengguna
            $currentPassword = $this->input->post('current_password');
            if (!password_verify($currentPassword, $user['password'])) {
                // Jika password saat ini tidak cocok, tampilkan pesan kesalahan
                $this->session->set_flashdata('msg', show_err_msg('Password Lama Tidak Cocok'));
                redirect(base_url('admin/home/allaccount'));
            }

            // Jika password saat ini cocok, hash password baru
            $newPassword = $this->input->post('new_password');
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update password baru ke dalam database
            $this->Admin_model->updatePassword($user['id'], $hashedPassword);

            // Tampilkan pesan sukses
            $this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
            redirect(base_url('admin/home/allaccount'));
        }
    }


    public function updatePasswordAdmin1(){
        $this->load->model('Person_model');
        $this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[25]');

        $iduser = $this->input->post('iduser');
        $getuser = $this->Person_model->get_by_id($iduser);

        if ($this->form_validation->run() == true) {
            if (password_verify($this->input->post('passLama'), $this->session->userdata('password'))) {
                if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
                    $this->session->set_flashdata('msg', show_err_msg('Password Baru dan Konfirmasi Password harus sama'));
                    redirect('auth/passwordAdmin');
                } else {
                    $data = ['password' => get_hash($this->input->post('passBaru'))];
                    $result = $this->Person_model->updatePass($data, $id);
                    if ($result > 0) {
                        
                        $this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
                        redirect('admin/home/allaccount');
                    } else {
                        $this->session->set_flashdata('msg', show_err_msg('Password Gagal diubah'));
                        redirect('auth/passwordAdmin');
                    }
                }
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Password Salah'));
                redirect('auth/passwordAdmin');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/passwordAdmin');
        }



    }

    public function updatePassword()
    {
        $this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[25]');

        $id = $this->session->userdata('id');
        if ($this->form_validation->run() == true) {
            if (password_verify($this->input->post('passLama'), $this->session->userdata('password'))) {
                if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
                    $this->session->set_flashdata('msg', show_err_msg('Password Baru dan Konfirmasi Password harus sama'));
                    redirect('auth/profile');
                } else {
                    $data = ['password' => get_hash($this->input->post('passBaru'))];
                    $result = $this->Auth_model->update($data, $id);
                    if ($result > 0) {
                        $this->updateProfil();
                        $this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
                        redirect('auth/profile');
                    } else {
                        $this->session->set_flashdata('msg', show_err_msg('Password Gagal diubah'));
                        redirect('auth/profile');
                    }
                }
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Password Salah'));
                redirect('auth/profile');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }

    private function _do_upload()
    {
        $config['upload_path']          = 'assets/uploads/images/foto_profil/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['max_width']            = 10000; // set max width image allowed
        $config['max_height']           = 10000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('auth/profile');
        }
        return $this->upload->data('file_name');
    }

    private function _do_uploadthumb()
    {
        $config['upload_path']          = 'assets/uploads/images/thumbnail/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['max_width']            = 10000; // set max width image allowed
        $config['max_height']           = 10000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('auth/profile');
        }
        return $this->upload->data('file_name');
    }

    public function register()
    {
        $data = konfigurasi('Register');
        $this->template->load('authentication/layouts/template', 'authentication/register', $data);
    }

    public function check_register()
    {
        $data = konfigurasi('Register');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[20]');
        if ($this->form_validation->run() == false) {
            $this->register();
        } else {
            $this->Auth_model->reg();
            $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box rounded-4" style="background-color: #BFE3DF;">
              <div class="info-box-icon rounded-4">
              <i class="fa fa-check-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">SUKSES</b><br>Pendaftaran berhasil, silakan login.</div>
              </div>
              </p>
            ');
            redirect('auth/login', 'refresh', $data);
        }
    }

    public function check_account()
    {
        //validasi login
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        //ambil data dari database untuk validasi login
        $query = $this->Auth_model->check_account($email, $password);

        if ($query === 1) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box rounded-4" style="background-color: #BFE3DF;">
        			<div class="info-box-icon rounded-4">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Email yang Anda masukkan tidak terdaftar.</div>
        			</div>
        			</p>
            ');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert','<p class="box-msg">
              <div class="info-box rounded-4" style="background-color: #BFE3DF;">
              <div class="info-box-icon rounded-4">
              <i class="fa fa-info-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">GAGAL</b><br>Akun yang Anda masukkan tidak aktif, silakan hubungi Administrator.</div>
              </div>
              </p>'
            );
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box rounded-4" style="background-color: #BFE3DF;">
        			<div class="info-box-icon rounded-4">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Password yang Anda masukkan salah.</div>
        			</div>
        			</p>
              ');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
                'id'            => $query->id,
                'nama'          => $query->nama,
                'username'      => $query->username,
                'email'         => $query->email,
                'password'      => $query->password,
                'negara'        => $query->negara,
                'kota'          => $query->kota,
                'tanggal_lahir' => $query->tanggal_lahir,
                'id_role'       => $query->id_role,
                'is_login'      => true,
                'created_at'    => $query->created_at,
                'updated_at'    => $query->updated_at,
                'profile'       => $query->profile,
                'last_login'    => $query->last_login,
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }
    public function login()
    {
        $data = konfigurasi('Login');
        //melakukan pengalihan halaman sesuai dengan levelnya
        if ($this->session->userdata('id_role') == "1") {
            redirect('admin/home');
        }
        if ($this->session->userdata('id_role') == "2") {
            redirect('member/home');
        }

        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
            $error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                $data = $this->Auth_model->check_account($this->input->post('email'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->id_role == '1') {
                    redirect('admin/home');
                } elseif ($data->id_role == '2') {
                    redirect('member/home');
                }
            } else {
                $this->template->load('authentication/layouts/template', 'authentication/login', $data);
            }
        } else {
            $this->template->load('authentication/layouts/template', 'authentication/login', $data);
        }
    }
    public function logout()
    {
        $this->load->model('Auth_model');
        date_default_timezone_set('ASIA/JAKARTA');
        $date = array('last_login' => date('Y-m-d H:i:s'));
        $id = $this->session->userdata('id');
		$this->Auth_model->logout($date, $id);
		$user_data = $this->session->userdata();
		foreach ($user_data as $key => $value) {
			if ($key!='__ci_last_regenerate' && $key != '__ci_vars')
			$this->session->unset_userdata($key);
		}
        $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-success">
              <div class="info-box-icon">
              <i class="fa fa-check-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">SUKSES</b><br>Log Out Berhasil</div>
              </div>
              </p>
			');
        redirect('auth/guest');
    }
}
