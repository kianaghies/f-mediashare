<style>
        .row{
            padding: 2%;
            row-gap: 0;
            --bs-gap: 0rem 1rem;
        }
        .form-group [type="text"], .form-group [type="date"], .form-group [type="password"], .form-group [type="file"], .form-group [type="email"] {
            text-align: left;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.678);
            border-radius: 20px;
            margin: 1% 0% 0% 0%
        }
		.navigasi {
			margin-top: -25px;
		}
		.kaki {
			margin-bottom: -40px;
		}
		.profilbox{
			margin: 50px 0px 120px 0px;
		}
		.peringatan {
			margin: 100px 0px 0px 0px;
		}
</style>
<div class="peringatan msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<div class="profilbox container">
    <div class="col-md-9">
		<div class="card rounded-4" style="background-color: #8294C4;">
			<div class="card-body">
                <form class="form-horizontal" action="<?php echo base_url('auth/updatePasswordAdmin') ?>" method="POST">
						<div class="form-group">
							<label for="current_password" class="col-sm-5 control-label">Password Lama</label>
							<div class="col-sm-13">
								<input type="password" class="form-control" placeholder="Password Lama" name="current_password">
							</div>
						</div>
						<div class="form-group mt-4">
							<label for="new_password" class="col-sm-5 control-label">Password Baru</label>
							<div class="col-sm-13">
								<input type="password" class="form-control" placeholder="Password Baru" name="new_password">
							</div>
						</div>
						<div class="form-group mt-4">
							<label for="confirm_password" class="col-sm-5 control-label">Konfirmasi Password</label>
							<div class="col-sm-13">
								<input type="password" class="form-control" placeholder="Konfirmasi Password" name="confirm_password">
							</div>
						</div>

						<div class="form-group mt-4">
							<div class="col-sm-offset-2 col-sm-13">
                                <input type="text" class="d-none" name="iduser" id="iduser" value='<?= $u_get; ?>'>
								<button type="submit" class="btn btn-primary btn-flat" style="box-sizing: border-box; border: none; height: 90px; width: 100%; background-color: #BFE3DF;"><i class="fa fa-check-circle"></i> Simpan</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>