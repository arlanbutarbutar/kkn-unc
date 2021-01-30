        <?php if(!isset($_SESSION['id-kelompok'])){header("Location: kelompok");exit;}?>
        <div class="container-fluid text-center mx-auto">
            <div class="row m-3 mt-5">
                <div class="col-md-12">
                    <h5 class="text-uppercase">Edit Kelompok KKN</h5>
                    <small>Unversitas Nusa Cendana Kupang</small>
                </div>
                <div class="col-md-6 mt-4 mx-auto">
                    <div class="card shadow rounded mt-3">
                        <div class="card-body">

                            <form action="" method="POST">
                                <input type="hidden" name="id_kelompok" value="<?= $_SESSION['id-kelompok']?>">
                                <div class="form-group mb-3">
                                    <select name="id_dosen" class="form-control" required>
                                        <?php if(mysqli_num_rows($dosen)){while($row1=mysqli_fetch_assoc($dosen)){?>
                                        <option value="<?= $row1['id_dosen']?>"><?= $row1['nama_dosen']?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <select name="id_desa" class="form-control" required>
                                        <?php if(mysqli_num_rows($desa)){while($row2=mysqli_fetch_assoc($desa)){?>
                                        <option value="<?= $row2['id_desa']?>"><?= $row2['nama_desa']?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="nama_kelompok" placeholder="Nama Kelompok" class="form-control">
                                </div>
                                <div class='form-group'>
                                    <button type="submit" name="edits-kelompok" class="btn btn-warning btn-sm mt-3">Apply</button>
                                    <button type="submit" name="close-edit-kelompok" class="btn btn-outline-dark btn-sm mt-3">Batal</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>        