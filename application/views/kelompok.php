<div class="container-fluid">
    <div class="row m-3 mt-5">
        <div class="col-md-12">
            <h5 class="text-uppercase">Kelompok KKN</h5>
            <small>Unversitas Nusa Cendana Kupang</small>
        </div>
        <div class="col-md-12 mt-4">
            <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card shadow border-0">
                <div class="card-body">

                    <div class="col-md-12 d-sm-flex justify-content-between">
                        <div class="col-md-4 m-0 p-0">
                            <form action="" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2" autofocus name="keyword">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit" name="search-kelompok">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php if(isset($_SESSION['user'])){if($_SESSION['role-id']==1){?>
                        <form action="" method="POST">
                            <button type="button" class="btn btn-primary btn-sm font-weight-bold shadow" data-toggle="modal" data-target="#tambah-kelompok">Tambah Kelompok</button>
                            <div class="modal fade" id="tambah-kelompok" tabindex="-1" role="dialog" aria-labelledby="tambah-kelompokLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambah-kelompokLabel">Tambah Kelompok</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-input mb-3">
                                                <select name="id_dosen" class="form-control" required>
                                                    <?php if(mysqli_num_rows($dosen)){while($row1=mysqli_fetch_assoc($dosen)){?>
                                                    <option value="<?= $row1['id_dosen']?>"><?= $row1['nama_dosen']?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                            <div class="form-input mb-3">
                                                <select name="id_desa" class="form-control" required>
                                                    <?php if(mysqli_num_rows($desa)){while($row2=mysqli_fetch_assoc($desa)){?>
                                                    <option value="<?= $row2['id_desa']?>"><?= $row2['nama_desa']?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                            <div class="form-input mb-3">
                                                <input type="text" name="nama_kelompok" placeholder="Nama Kelompok" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">Close</button>
                                            <button type="submit" name="tambah-kelompok" class="btn btn-primary btn-sm">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php }}?>
                    </div>

                    <style>#scroll-x{overflow-x: auto}</style>
                    <div class="col-md-12" id="scroll-x">
                        <table class="table table-hover text-center table-sm mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kelompok</th>
                                    <th scope="col">Dosen Pembimbing</th>
                                    <th scope="col">Lokasi KKN</th>
                                    <th colspan="3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;?>
                                <?php if(mysqli_num_rows($kelompok)==0){?>
                                <tr>
                                    <th colspan="7" class="text-dark font-weight-bold">Belum ada data peserta yang dilampirkan.</th>
                                </tr>
                                <?php }else if(mysqli_num_rows($kelompok)>0){while($row=mysqli_fetch_assoc($kelompok)){?>
                                <tr>
                                    <th scope="row"><?= $no;?></th>
                                    <td><?= $row['nama_kelompok']?></td>
                                    <td><?= $row['nama_dosen']?></td>
                                    <td><?= $row['nama_desa'].", ".$row['nama_kecamatan'].", ".$row['nama_kabupaten'];?></td>
                                    <td><a href="kelompok-detail?id=<?= $row['id_kelompok']?>&nama=<?= $row['nama_kelompok']?>" class="btn btn-outline-primary btn-sm">Detail</a></td>
                                    <?php if(isset($_SESSION['user'])){if($_SESSION['role-id']==1){?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id-kelompok" value="<?= $row['id_kelompok']?>">
                                        <td><button type="submit" name="edit-kelompok" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i> Edit</button></td>
                                        <td><button type="submit" name="delete-kelompok" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button></td>
                                    </form>
                                    <?php }}?>
                                </tr>
                                <?php $no++;?>
                                <?php }}?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>