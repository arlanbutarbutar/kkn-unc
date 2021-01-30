<div class="container-fluid">
    <div class="row m-3 mt-5">
        <div class="col-md-12">
            <h5 class="text-uppercase mb-n3">
                Kelompok KKN 
                <p>Anggota Kelompok <?= $nama?></p>
            </h5>
            <small>Universitas Nusa Cendana Kupang</small>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card shadow rounded">
                <div class="card-body">

                    <div class="col-md-12 d-sm-flex justify-content-between">
                        <div class="col-md-4 m-0 p-0">
                            <form action="" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2" autofocus name="keyword">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit" name="search-kelompok-detail">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <a href="kelompok" class="btn btn-outline-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </div>

                    <style>#scroll-x{overflow-x: auto}</style>
                    <div class="col-md-12" id="scroll-x">
                        <table class="table table-hover text-center table-sm mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama Peserta</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Fakultas</th>
                                    <th scope="col">Dosen Pembimbing</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Lokasi KKN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;?>
                                <?php foreach($kelompok_detail as $row):?>
                                <tr>
                                    <th scope="row"><?= $no;?></th>
                                    <td><?= $row['nim']?></td>
                                    <td><?= $row['nama_mhs']?></td>
                                    <td><?= $row['nama_jurusan']?></td>
                                    <td><?= $row['nama_fakultas']?></td>
                                    <td><?= $row['nama_dosen']?></td>
                                    <td><?= $row['email']?></td>
                                    <td><?= $row['hp']?></td>
                                    <td><?= $row['nama_desa'].", ".$row['nama_kecamatan'].", ".$row['nama_kabupaten'];?></td>
                                </tr>
                                <?php $no++;?>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>