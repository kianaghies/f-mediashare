    <div class="kaki row col-13" style="margin-bottom: 10px;">
        <div class="home card offset-0 offset-1 offset-md-1 offset-lg-1" style="background-color: rgba(255, 255, 255, 0); width: 100px; height: 100px; border: none;">
            <img src="<?php echo base_url();?>assets/ico/polaroid.png" class="card-img-top rounded-3" alt="..." style="width: 100%; height: 100%;">
            <a href="<?php echo base_url() ?>auth/guest" class="pe-auto" data-toggle="tooltip" data-placement="top" title="Kembali ke menu utama" style="object-fit: cover;">
                <div class="card-img-overlay">
                    <img src="<?php echo base_url();?>assets/ico/home.png" class="ms-2 mt-2 w-75" style="object-fit: cover;">
                </div>
            </a>
        </div>
        <div class="profile card rounded-3 offset-5 offset-sm-6 offset-md-7 offset-lg-8" style="margin-top: 1%; width: 75px; height: 75px; border: none;">
            <a href="<?php echo base_url() ?>auth/login" class="pe-auto" data-toggle="tooltip" data-placement="top" title="<?= $user; ?>">
                <div class="card-img-overlay" >
                    <img src="<?php echo base_url();?>assets/ico/profile1.png" class="w-100" style="object-fit: cover;">
                </div>
            </a>
        </div>
    </div>

