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
            <div class="card shadow border-0">
                <div class="card-body">

                    <div class="col-md-12 d-sm-flex justify-content-between">
                        <div class="col-md-4 m-0 p-0">
                            <form action="" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2" autofocus name="keyword">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit" name="search-dpl">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <?php if(isset($_SESSION['user'])){if($_SESSION['role-id']==1){?>
                            <a class="btn btn-primary btn-sm shadow" href="dosen">Tambah</a>
                            <?php }}?>
                        </div>
                    </div>

                    <style>#scroll-x{overflow-x: auto}</style>
                    <div class="col-md-12" id="scroll-x">
                        <table class="table table-hover text-center table-sm mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Fakultas</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No Telepon</th>
                                    <?php if(isset($_SESSION['user'])){if($_SESSION['role-id']==1){?>
                                    <th colspan="2">Aksi</th>
                                    <?php }}?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;?>
                                <?php if(mysqli_num_rows($dosen)){while($row=mysqli_fetch_assoc($dosen)){?>
                                <tr>
                                    <th scope="row"><?= $no;?></th>
                                    <td><?= $row['nip']?></td>
                                    <td><?= $row['nama_dosen']?></td>
                                    <td><?= $row['nama_jurusan']?></td>
                                    <td><?= $row['nama_fakultas']?></td>
                                    <td><?= $row['email']?></td>
                                    <td><?= $row['no_hp']?></td>
                                    <?php if(isset($_SESSION['user'])){if($_SESSION['role-id']==1){?>
                                    <form action="" method="POST">
                                        <td>
                                            <input type="hidden" name="id_dosen" value="<?= $row['id_dosen']?>">
                                            <button type="submit" name="view-dosen" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i> Edit</button>
                                        </td>
                                        <td>
                                            <input type="hidden" name="id_dosen" value="<?= $row['id_dosen']?>">
                                            <input type="hidden" name="nama_dosen" value="<?= $row['nama_dosen']?>">
                                            <button type="submit" name="hapus-dosen" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                        </td>
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