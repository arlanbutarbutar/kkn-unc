<div class="container-fluid">
    <div class="row m-3 mt-5">
        <div class="col-md-12 text-center">
            <h5 class="text-uppercase">Insert Dosen Pembimbing Lapangan</h5>
            <small>Universitas Nusa Cendana Kupang</small>
        </div>
        <div class="col-md-12 mt-4">
            <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
        </div>
        <div class="col-md-12 row mb-5">
            <div class="col-lg-6 m-auto">
                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <div class="col-md-12">
                            <form action="" method="POST">
                                <div class="form-input mb-3">
                                    <input type="number" name="nip" placeholder="NIP Dosen" class="form-control" required>
                                </div>
                                <div class="form-input mb-3">
                                    <input type="text" name="name" placeholder="Nama Dosen" class="form-control" required>
                                </div>
                                <div class="form-input mb-3">
                                    <input type="email" name="email" placeholder="Email Dosen" class="form-control" required>
                                </div>
                                <div class="form-input mb-3">
                                    <input type="password" name="password" placeholder="Kata Sandi" class="form-control text-center">
                                    <small class="text-danger">Kata sandi diisi sesuai NIP!</small>
                                </div>
                                <div class="form-input mb-3">
                                    <input type="number" name="mobile" placeholder="No Telepon" class="form-control" required>
                                </div>
                                <div class="form-input mb-3">
                                    <select name="jurusan" class="form-control" required>
                                        <option>Pilih Jurusan</option>
                                        <?php foreach($jurusan_daftar as $row3):?>
                                        <option value="<?= $row3['id_jurusan']?>"><?= $row3['nama_jurusan']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-input">
                                    <button type="submit" name="tambah-dosen" class="btn btn-primary btn-sm">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>