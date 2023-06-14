<style>
    .kontainer1 {
            padding: 5% 10% 0% 10%;
            margin: 25px 0px 150px 0px;
        }
        .kartu1 {
            position: relative;
            border-radius: 2rem;
            z-index: 0;
            background-color: #7070e9;
            margin: 0px 0px 0px 0px;
        }

        .formpengisian [type="text"], .formpengisian [type="date"], .formpengisian [type="password"], .formpengisian [type="file"] {
            text-align: left;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.678);
            border-radius: 20px;
            margin: 1% 0% 0% 0%
        }
</style>
<div class="kontainer1 container-fluid">
            <div class="kartu1 card" style="background-color: #ABC1C9;">
                <div class="card-body">
                        <div class="container">
                            <div class="ps-0">
                                <div class="mt-3 mb-3 text-center"><h2>Form Post</h2></div>
                                <div class="row">
                                        <form class="formpengisian row" action="<?php echo base_url(); ?>auth/kirimpost" method="post" enctype="multipart/form-data">
                                            <div class="col-lg-7 ">
                                                <div class="row">
                                                    <div class="input1 col-7 mb-3">
                                                        <input type="text" class="form-control form-control-user ps-3" id="l_judul" name="l_judul" placeholder="Judul Lagu">
                                                    </div>
                                                    <div class="input2 col-5 mb-3">
                                                        <input type="text" class="form-control form-control-user ps-3" id="l_artist" name="l_artist" placeholder="Artist">
                                                    </div>
                                                    <div class="input3 col-13 mb-3">
                                                        <input type="text" class="form-control form-control-user ps-3" id="l_album" name="l_album" placeholder="Album">
                                                    </div>
                                                    <div class="input4 col-5 mb-3">
                                                        <input type="text" class="form-control form-control-user ps-3" id="l_tahun" name="l_tahun" placeholder="Tahun Rilis">
                                                    </div>
                                                    <div class="input5 col-7 mb-3">
                                                        <input type="text" class="form-control form-control-user ps-3" id="l_linkflac" name="l_linkflac" placeholder="Link Flac">
                                                    </div>
                                                    <div class="input6 mb-3">
                                                        <input type="text" class="form-control form-control-user ps-3" id="l_linkmp3" name="l_linkmp3" placeholder="Link MP3">
                                                    </div>
                                                    <div class="input7 mb-3 overflow-auto" style="max-height: 200px;">
                                                        <input type="text" class="form-control form-control-user overflow-auto ps-3" id="l_deskripsi" name="l_deskripsi" placeholder="Deskripsi Tentang Album">
                                                    </div>
                                                    <div class="input8 d-none">
                                                        <input type="text" id="l_uploadwho" name="l_uploadwho" value="<?= $userdata->username; ?>">
                                                    </div>
                                                    <div class="tombol1">
                                                        <input type="submit" class="tombol_login rounded-3" value="Kirim Postingan" style="box-sizing: border-box; border: none; height: 90px; width: 100%; background-color: #BFE3DF;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <div class="input5">
                                                        <input class="form-control mb-3 col-12" type="file" accept="image/*" onchange="loadFile(event)" name="photo" id="photo">
                                                        <img id="output" class="img-fluid" style="box-sizing: border-box; background-color: rgba(255, 255, 255, 0.678); border-radius: 20px; object-fit: cover;"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                                <div class="row ps-4 pe-0 mt-4">
                                    <div class="text-center">
                                        <a href="<?php echo base_url();?>" class="btn rounded-3" role="button" style="background-color: #BFE3DF;">Kembali Ke Menu Utama</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>