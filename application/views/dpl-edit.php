<div class="container-fluid">
    <div class="row m-3 mt-5">
        <div class="col-md-12">
            <h5 class="text-uppercase">Dosen Pembimbing Lapangan KKN</h5>
            <small>Universitas Nusa Cendana Kupang</small>
        </div>
        <div class="col-md-12 mt-4">
            <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
        </div>
        <div class="col-md-12">
            <div class="card shadow rounded">
                <div class="card-body">
                    <div class="col-md-12">
                        <?php if(mysqli_num_rows($dosens)){while($row1=mysqli_fetch_assoc($dosens)){?>
                        <p>Edit data <strong><?= $row1['nama_dosen']?></strong></p>
                        <div class="col-md-12 m-0 p-0">
                            <form action="" method="POST">
                                <div class="form-input mb-3">
                                    <label for="nip">NIP</label>
                                    <input type="number" name="nip" value="<?= $row1['nip']?>" placeholder="NIP Dosen" class="form-control" required autofocus>
                                </div>
                                <div class="form-input mb-3">
                                    <label for="nama">Nama Dosen</label>
                                    <input type="text" name="name" value="<?= $row1['nama_dosen']?>" placeholder="Nama Dosen" class="form-control" required>
                                </div>
                                <div class="form-input mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="<?= $row1['email']?>" placeholder="Email Dosen" class="form-control" required>
                                </div>
                                <div class="form-input mb-3">
                                    <label for="mobile">No Handphone</label>
                                    <input type="number" name="mobile" value="<?= $row1['no_hp']?>" placeholder="No Telepon" class="form-control" required>
                                </div>
                                <div class="form-input mb-3">
                                    <label for="jurusan">Jurusan yang didampingi</label>
                                    <select name="jurusan" class="form-control" required>
                                        <option>Pilih Jurusan</option>
                                        <?php foreach($jurusan_daftar as $row2):?>
                                        <option value="<?= $row2['id_jurusan']?>"><?= $row2['nama_jurusan']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-input">
                                    <input type="hidden" name="id_dosen" value="<?= $row1['id_dosen']?>">
                                    <button type="submit" name="edit-dosen" class="btn btn-warning btn-sm">Apply</button>
                                    <button type="submit" name="back-dpl" class="btn btn-outline-dark btn-sm ml-2">Back</button>
                                </div>
                            </form>
                        </div>
                        <?php }}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>