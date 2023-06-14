<style>
    .detail, .detail0{
        background-color: #ABC1C9;
    }
</style>

<div class="container" style="margin: 100px 0px 200px 0px;">
    <div class="col-13">
        <div class="row">
            <div class="col-5 col-lg-4 col-md-5 offset-lg-1 d-none d-md-block">
                <div class="card rounded-4" style="width: 270px; height: 270px; background-color: #ABC1C9;">
                    <img src="<?= base_url('assets/uploads/images/thumbnail/'.$l_thumb); ?>" alt="" class="w-100 rounded-4" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-5 offset-lg-1 d-md-none">
                <div class="card rounded-4" style="width: 200px; height: 200px; background-color: #ABC1C9;">
                    <img src="<?= base_url('assets/uploads/images/thumbnail/'.$l_thumb); ?>" alt="" class="w-100 rounded-4" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-7 col-md-6 rounded-4">
                <div class="card p-3 rounded-4">
                    <div class="row">
                            <div class="col-13">
                                <ul class="detail0 list-group">
                                    <li class="detail list-group-item">
                                        <b>Judul Lagu : </b>
                                        <a><?= $l_judul; ?></a>
                                    </li>
                                    <li class="detail list-group-item">
                                        <b>Artist : </b>
                                        <a><?= $l_artist; ?></a>
                                    </li>
                                    <li class="detail list-group-item">
                                        <b>Album : </b>
                                        <a><?= $l_album; ?></a>
                                    </li>
                                    <li class="detail list-group-item">
                                        <b>Tahun Rilis : </b>
                                        <a><?= $l_tahun; ?></a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-13">
                <div class="card mt-3 rounded-4" style="background-color: #ABC1C9;">
                    <div class="row">
                        <div class="col-13">
                            <div class="card-body">
                                <a>Deskripsi Singkat : <br></a>
                                <p class="fs-6"><?= $l_deskripsi; ?></p>
                            </div>
                            <div class="card-body fs-6">
                                <a>Post ini diupload oleh :</a>
                                <p><?= $l_uploadwho; ?></p>
                                <a>Post ini diupload pada tanggal :</a>
                                <p><?= $l_tanggalupload; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3" style="background-color: rgba(127, 17, 224, 0); border-style: none;">
                    <div class="row">
                        <div class="col-2">
                            <a class="btn text-black rounded-3" href="<?= $l_linkflac ?>" style="text-align: center; background-color: #BFE3DF;"><i class="mt-2">Link FLAC</i></a>
                        </div>
                        <div class="col-2">
                            <a class="btn text-black rounded-3" href="<?= $l_linkmp3 ?>" style="text-align: center; background-color: #BFE3DF;"><i class="mt-2">Link MP3</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

