
    <div class="kaki row col-13" style="margin-bottom: 10px;">
        <div class="home card offset-0 offset-1 offset-md-1 offset-lg-1" style="background-color: rgba(255, 255, 255, 0); width: 100px; height: 100px; border: none;">
            <img src="<?php echo base_url();?>assets/ico/polaroid.png" class="card-img-top rounded-3" alt="..." style="width: 100%; height: 100%;">
            <a href="<?php echo base_url() ?>auth/guest" class="pe-auto" data-toggle="tooltip" data-placement="top" title="Kembali ke menu utama" style="object-fit: cover;">
                <div class="card-img-overlay">
                    <img src="<?php echo base_url();?>assets/ico/home.png" class="ms-2 mt-2 w-75" style="object-fit: cover;">
                </div>
            </a>
        </div>
        <div class="profile card rounded-3 offset-5 offset-sm-6 offset-md-7 offset-lg-8" style="margin-top: 1%; width: 75px; height: 75px; border: none;" title="<?= $userdata->nama; ?>">
            <div class="btn-group dropup card-img" style="margin-left: -12px; width: 75px; height: 75px;">
                <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false" style="object-fit: cover;">
                    <img src="<?= base_url('assets/uploads/images/foto_profil/'.$userdata->photo); ?>" class="w-100" >
                </button>
                <ul class="dropdown-menu">
                    <li class="text-center mx-2">
                        <a href="<?php echo base_url(); ?>auth/tambahpost/<?php echo $this->session->userdata('id_user'); ?>" class="btn" style="box-sizing: border-box; border: none; height: 100%; width: 100%; background-color: #BFE3DF;">Tambah Postingan</a>
                    </li>
                    <li class="text-center mx-2">
                        <a href="<?php echo base_url(); ?>auth/profile/<?php echo $this->session->userdata('id_user'); ?>" class="btn" style="box-sizing: border-box; border: none; height: 100%; width: 100%; background-color: #BFE3DF;">Edit Profil</a>
                    </li>
                    <li class="text-center mx-2">
                        <a href="<?php echo base_url(); ?>auth/logout/" class="btn" style="box-sizing: border-box; border: none; height: 100%; width: 100%; background-color: #BFE3DF;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>

