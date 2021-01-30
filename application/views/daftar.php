<div class="container-fluid">
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
                        <form action="" method="POST" enctype="multipart/form-data" id="reg-form">
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="number" name="nim" class="form-control" value="<?php if(isset($_SESSION['nim'])){echo $_SESSION['nim'];}?>" placeholder="NIM" required autofocus>
                                </div>
                                <div class="col">
                                    <input type="text" name="nama" value="<?php if(isset($_SESSION['nama'])){echo $_SESSION['nama'];}?>" class="form-control" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-input mb-3">
                                <select name="jurusan" class="form-control" required>
                                    <option>Pilih Jurusan</option>
                                    <?php foreach($jurusan_daftar as $row2):?>
                                    <option value="<?= $row2['id_jurusan']?>"><?= $row2['nama_jurusan']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-input mb-3">
                                <small class="text-danger">* Minimal SKS yang harus dipenuhi 110 sks</small>
                                <input type="number" name="sks" value="<?php if(isset($_SESSION['sks'])){echo $_SESSION['sks'];}?>" class="form-control" placeholder="SKS" required>
                            </div>
                            <div class="form-input mb-3">
                                <input type="number" name="hp" value="<?php if(isset($_SESSION['hp'])){echo $_SESSION['hp'];}?>" class="form-control" placeholder="No Telepon" required>
                            </div>
                            <div class="form-input mb-3">
                                <input type="email" name="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-input mb-3">
                                <input type="number" name="semester" value="<?php if(isset($_SESSION['semester'])){echo $_SESSION['semester'];}?>" class="form-control" placeholder="Semester" required>
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
                                <button type="submit" name="input-mahasiswa" class="btn btn-primary btn-sm font-weight-bold">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>