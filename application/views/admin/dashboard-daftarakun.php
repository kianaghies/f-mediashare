<style>
    .kotak {
        margin-top: 75px;
        margin-bottom: 180px;
    }
    .forum-kotak{
        background-color: #ABC1C9;
        margin-left: ;
    }
    .forum-kotak1{
        background-color: white;
        margin-top: 20px;
    }
    .table-responsive{
        border-style: solid; 
        border-width: 2px; 
        border-color: white;
    }
    .table{
        text-align: center; 
        background-color: #BFE3DF;
    }
    .peringatan {
			margin: 100px 0px 0px 0px;
		}
    

</style>
<div class="peringatan msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<div class="kotak container">
    <div class="forum-kotak container col-13 rounded-4">
        <div class="forum1 row">
            <div class="col-12">
                <div class="table-responsive my-4 mx-2" >
                    <div class="page-header">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-5 col-md-3">
                                    <span class="m-2 rounded-3 p-2" style="text-align: center; background-color: #BFE3DF;">Data User</span>
                                </div>
                                <div class="col-1 offset-2 offset-md-7">
                                    <a class="btn text-black rounded-3" href="<?php echo base_url('admin/home/'); ?>" style="text-align: center; background-color: #BFE3DF;"><i class="mt-2">Kembali</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table mt-3 fs-6">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role ID</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($daftarsemuapengguna as $a) { ?>
                            <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td><?= $a['id_role']; ?></td>
                            <td><?= $a['username']; ?></td>
                            <td>
                                <form class="form-horizontal" action="<?php echo base_url('auth/passwordAdmin') ?>" method="POST" enctype="multipart/form-data">
                                    <button type="submit" name="iduser" id="iduser" value="<?= $a['id']; ?>" class="btn" style="box-sizing: border-box; border: none; height: auto; width: auto; background-color: #ABC1C9;">Ubah Password User</button>
                                </form>
                                <form class="form-horizontal mt-2" action="<?php echo base_url('auth/delaccount') ?>" method="POST" enctype="multipart/form-data">
                                    <button type="submit" name="iduserdel" id="iduserdel" value="<?= $a['id']; ?>" class="btn" style="box-sizing: border-box; border: none; height: auto; width: auto; background-color: #ABC1C9;">Hapus User</button>
                                </form>
                            </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>