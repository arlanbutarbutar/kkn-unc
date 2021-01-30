<div class="container-fluid">
    <?php if(isset($_SESSION['role-id'])){if($_SESSION['role-id']==1){?>
        <div class="row m-3 mt-5">
            <div class="col-md-12">
                <h5 class="text-uppercase">Peserta KKN</h5>
                <small>Universitas Nusa Cendana Kupang</small>
            </div>
            <div class="col-md-12 mt-4">
                <?php if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
            </div>
            <div class="col-md-12 mt-4 mb-5">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <div class="col-md-12">
                            <?php if(mysqli_num_rows($mahasiswas)){while($row1=mysqli_fetch_assoc($mahasiswas)){?>
                            <p class="text-center">Edit data <strong><?= $row1['nama_mhs']?></strong></p>
                            <div class="col-md-4 m-0 p-0 m-auto">
                                <form action="" method="POST">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="nim">NIM</label>
                                            <input type="number" name="nim" value="<?= $row1['nim']?>" class="form-control" id="nim" placeholder="NIM" required>
                                        </div>
                                        <div class="col">
                                            <label for="nama">Nama Peserta</label>
                                            <input type="text" name="nama" value="<?= $row1['nama_mhs']?>" class="form-control" id="nama" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-input mb-3">
                                        <label for="jurusan">Jurusan</label>
                                        <select name="id_jurusan" id="jurusan" class="form-control" required autofocus>
                                            <option>Pilih Jurusan</option>
                                            <?php foreach($jurusan_daftar as $row2):?>
                                            <option value="<?= $row2['id_jurusan']?>"><?= $row2['nama_jurusan']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-input mb-3">
                                        <label for="sks">SKS</label>
                                        <input type="number" name="sks" id="sks" value="<?= $row1['sks']?>" class="form-control" placeholder="SKS" required>
                                        <small class="text-danger">* minimal sks yang tercapai 110 sks.</small>
                                    </div>
                                    <div class="form-input mb-3">
                                        <label for="hp">No handpone</label>
                                        <input type="number" name="hp" value="<?= $row1['hp']?>" class="form-control" placeholder="No Telepon" required>
                                    </div>
                                    <div class="form-input mb-3">
                                        <label for="kelompok">Kelompok</label>
                                        <select name="id_kelompok" id="kelompok" class="form-control" required>
                                            <option>Pilih Kelompok</option>
                                            <?php foreach($kelompok_daftar as $row3):$id_kelompok=$row3['id_kelompok'];$mahasiswa_perKelompok=mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_kelompok='$id_kelompok'");
                                            $total=mysqli_num_rows($mahasiswa_perKelompok);?>
                                            <option value="<?= $row3['id_kelompok']?>">
                                                <?= $row3['nama_kelompok']." - ".$row3['nama_desa']."-".$row3['nama_kecamatan']."-".$row3['nama_kabupaten'].", DPL : ".$row3['nama_dosen']." (Total MHS: ".$total.")"?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-input mb-3">
                                        <label for="laporan">Laporan</label>
                                        <input type="text" name="laporan" id="laporan" value="<?= $row1['laporan']?>" class="form-control" placeholder="Laporan" required>
                                    </div>
                                    <div class="form-input mb-5">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="<?= $row1['email']?>" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-input text-center">
                                        <input type="hidden" name="id_mhs" value="<?= $row1['id_mhs']?>">
                                        <button type="submit" name="edit-peserta" class="btn btn-warning btn-sm font-weight-bold">Apply</button>
                                        <button type="submit" name="back-peserta" class="btn btn-outline-dark btn-sm font-weight-bold">Back</button>
                                    </div>
                                </form>
                            </div>
                            <?php }}?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }}if(isset($_SESSION['mahasiswa'])){if(isset($_SESSION['akses-mhs'])==1){?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button>
        <div class="modal show bg-dark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"style="display: block;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST">
                        <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
                        <div class="modal-body">
                            <input type="number" name="nim" placeholder="NIM" class="form-control text-center" autocomplete="on">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="close-check-nim" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" name="check-nim" class="btn btn-primary btn-sm ">Check</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>
        <div class="row">
            <div class="col-md-12 d-sm-flex justify-content-between mt-2">

                <!-- card persyaratan -->
                <div class="col-md-4 mt-3">
                    <div class="card" style="width: 22rem;">
                        <img src="../assets/img/writing-notes-idea-class-7103.jpg" class="card-img-top" alt="Image Daftar">
                        <div class="card-body">
                            <p class="card-text">
                                <ul>
                                    <li class="list-unstyled text-justify ml-n3">Harap Mahasiswa yang bersangkutan telah menyelesaikan semua administrasi, melengkapi persyaratan dan menyiapkan berkas persyaratan yang akan diupload sebelum mendaftar.</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- form perdaftaran -->
                <div class="col-md-8" id="register">
                    <div class="col-md-12 mb-3 p-0 m-0">
                        <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
                    </div>
                    <div class="card mb-5 mt-3">
                        <div class="card-body">
                            <p>Form Pendaftaran Peserta <strong>KKN</strong></p>
                            <?php if(mysqli_num_rows($mahasiswas)){while($row1=mysqli_fetch_assoc($mahasiswas)){?>
                            <form action="" method="POST" enctype="multipart/form-data" id="reg-form">
                                <input type="hidden" name="id-mhs" value="<?= $row1['id_mhs']?>">
                                <input type="hidden" name="nim" value="<?= $row1['nim']?>">
                                <input type="hidden" name="bukti-regis" value="<?= $row1['bukti_regis']?>">
                                <input type="hidden" name="bukti-khs-akhir" value="<?= $row1['bukti_khs_akir']?>">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label>NIM</label>
                                        <input type="number" class="form-control font-weight-bold" value="<?= $row1['nim']?>" placeholder="NIM" disabled>
                                    </div>
                                    <div class="col">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama" value="<?= $row1['nama_mhs']?>" class="form-control" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="form-input mb-3">
                                    <label class="d-flex">Jurusan <p class="text-info ml-2">(Jurusan kamu sebelumnya <?= $row1['nama_jurusan']?>)</p></label>
                                    <select name="jurusan" class="form-control">
                                        <option>Pilih Jurusan</option>
                                        <?php foreach($jurusan_daftar as $row2):?>
                                        <option value="<?= $row2['id_jurusan']?>"><?= $row2['nama_jurusan']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-input mb-3">
                                    <small class="text-danger">* Minimal SKS yang harus dipenuhi 110 sks</small>
                                    <label>SKS</label>
                                    <input type="number" name="sks" value="<?= $row1['sks']?>" class="form-control" placeholder="SKS">
                                </div>
                                <div class="form-input mb-3">
                                    <label>No. Handphone</label>
                                    <input type="number" name="hp" value="<?= $row1['hp']?>" class="form-control" placeholder="No Telepon">
                                </div>
                                <div class="form-input mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?= $row1['email']?>" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-input mb-3">
                                    <label>Semester</label>
                                    <input type="number" name="semester" value="<?= $row1['semester']?>" class="form-control" placeholder="Semester">
                                </div>
                                <div class="upload-profile-image row">
                                    <div class="col-lg-4 shadow rounded ml-3">
                                        <img src="../assets/img/310407-P8H5VA-382.jpg" style="width: 200px; height: 200px" class="img" alt="Format bukan Gambar">
                                    </div>
                                    <div class="col-lg-7 m-auto">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="bukti-regis">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" form="reg-form" name="bukti-regis" class="custom-file-input" id="bukti-regis" aria-describedby="bukti-regis">
                                                <label class="custom-file-label" for="bukti-regis">Bukti Regis</label>
                                            </div>
                                        </div>
                                        <small class="text-danger mt-n5">* jpg, png, pdf.</small>
                                        <div class="custom-file mt-3">
                                            <input type="file" name="bukti-khs-akhir" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Bukti KHS Semester Akhir</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-input text-center mt-5">
                                    <button type="submit" name="back-peserta" class="btn btn-secondary btn-sm font-weight-bold">Cancel</button>
                                    <button type="submit" name="edit-mahasiswa-lagi" class="btn btn-primary btn-sm font-weight-bold">Edit</button>
                                </div>
                            </form>
                            <?php }}?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php }?>
</div>