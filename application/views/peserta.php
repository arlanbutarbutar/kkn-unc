<div class="container-fluid">
    <div class="row m-3 mt-5">
        <div class="col-md-12">
            <h5 class="text-uppercase">Peserta KKN</h5>
            <small>Universitas Nusa Cendana Kupang</small>
        </div>
        <div class="col-md-12 mt-4">
            <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
        </div>
        <div class="col-md-12 mb-5">
            <div class="card shadow border-0">
                <div class="card-body">

                    <div class="col-md-12 d-sm-flex justify-content-between">
                        <div class="col-md-4 m-0 p-0">
                            <form action="" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Cari NIM" aria-label="Search" aria-describedby="basic-addon2" autofocus name="keyword">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit" name="search-peserta">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">

                                <!-- jika tidak ada sesi -->
                                <?php if(!isset($_SESSION['user'])){if(!isset($_POST['search'])){if(isset($page)){if(isset($total_page)){?>
                                    <?php if($page>1):?>
                                    <li class="page-item">
                                        <a class="page-link" href="peserta?page=<?= $page-1;?>" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <?php endif;?>
                                    <?php for($i=1; $i<=$total_page; $i++):?>
                                        <?php if($i==$page) :?>
                                            <li class="page-item"><a class="page-link font-weight-bold" href="peserta?page=<?= $i;?>"><?= $i;?></a></li>
                                        <?php else :?>
                                            <li class="page-item"><a class="page-link" href="peserta?page=<?= $i;?>"><?= $i;?></a></li>
                                        <?php endif;?>
                                    <?php endfor;?>
                                    <?php if($page<$total_page):?>
                                    <li class="page-item">
                                        <a class="page-link" href="peserta?page=<?= $page+1;?>">Next</a>
                                    </li>
                                    <?php endif;?>

                                <!-- jika ada sesi -->
                                <?php }}}}else if(isset($_SESSION['user'])){if(!isset($_POST['search'])){if(isset($page_view)){if(isset($total_page_view)){?>
                                    <?php if($page_view>1):?>
                                    <li class="page-item">
                                        <a class="page-link" href="peserta?page=<?= $page_view-1;?>" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <?php endif;?>
                                    <?php for($i=1; $i<=$total_page_view; $i++):?>
                                        <?php if($i==$page_view) :?>
                                            <li class="page-item"><a class="page-link font-weight-bold" href="peserta?page=<?= $i;?>"><?= $i;?></a></li>
                                        <?php else :?>
                                            <li class="page-item"><a class="page-link" href="peserta?page=<?= $i;?>"><?= $i;?></a></li>
                                        <?php endif;?>
                                    <?php endfor;?>
                                    <?php if($page_view<$total_page_view):?>
                                    <li class="page-item">
                                        <a class="page-link" href="peserta?page=<?= $page_view+1;?>">Next</a>
                                    </li>
                                    <?php endif;?>
                                <?php }}}}?>
                            </ul>
                        </nav>
                    </div>

                    <style>#scroll-x{overflow-x: auto}</style>
                    <div class="col-md-12" id="scroll-x">
                        <table class="table table-hover text-center table-sm mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Fakultas</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Kelompok</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col">Laporan</th>
                                    <?php if(isset($_SESSION['user'])){if($_SESSION['role-id']==1 || 2){?>
                                    <th scope="col">Bukti Regis</th>
                                    <th scope="col">Bukti KHS</th>
                                    <?php }}if(isset($_SESSION['user'])){if($_SESSION['role-id']==1){?>
                                    <th colspan="4">Aksi</th>
                                    <?php }}?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;?>
                                
                                <!-- jika tidak ada sesi user -->
                                <?php if(!isset($_SESSION['user'])){if(mysqli_num_rows($mahasiswa)==0){?>
                                <tr>
                                    <th colspan="11" class="text-dark font-weight-bold">Belum ada data peserta yang dilampirkan.</th>
                                </tr>
                                <?php }else if(mysqli_num_rows($mahasiswa)>0){while($row=mysqli_fetch_assoc($mahasiswa)){$id_status=$row['id_status'];?>
                                <tr>
                                    <th scope="row"><?= $no;?></th>
                                    <td>
                                        <?php if($id_status==1){?>
                                        <?= $row['nim']?>
                                        <span class="badge badge-success"><?= $row['status']?></span>
                                        <?php }else if($id_status==2){?>
                                        <?php $num_char=4;$string=$row['nim'];echo substr($string, 0, $num_char).'****';?>
                                        <span class="badge badge-warning"><?= $row['status']?></span>
                                        <?php if(isset($_SESSION['mahasiswa'])){?>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_mhs" value="<?= $row['id_mhs']?>">
                                            <input type="hidden" name="nim" value="<?= $row['nim']?>">
                                            <button type="submit" name="view-from-mhs" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i> Edit</button>
                                        </form>
                                        <?php }}else if($id_status==3){?>
                                        <?= $row['nim']?>
                                        <span class="badge badge-warning"><?= $row['status']?></span>
                                        <?php }?>
                                    </td>
                                    <td><?= $row['nama_mhs']?></td>
                                    <td><?= $row['email']?></td>
                                    <td><?= $row['nama_jurusan']?></td>
                                    <td><?= $row['nama_fakultas']?></td>
                                    <td><?= $row['semester']?></td>
                                    <td><?= $row['hp']?></td>
                                    <td><?php if($row['id_kelompok']==1){echo "<small>Belum dapat pembagian kelompok.</small>";}else{echo $row['nama_kelompok'];}?></td>
                                    <td><?= $row['sks']?></td>
                                    <td><?= $row['laporan']?></td>
                                    <?php if(isset($_SESSION['user'])){if($_SESSION['role-id']==1 || 2){?>
                                    <td><a href="bukti-regis?id=<?= $row['id_mhs']?>&bt-reg=<?= $row['bukti_regis']?>" class="btn btn-outline-primary btn-sm border-0"><i class="fas fa-eye"></i> Liat</a></td>
                                    <td><a href="bukti-khs-akhir?id=<?= $row['id_mhs']?>&bt-khs=<?= $row['bukti_khs_akir']?>" class="btn btn-outline-primary btn-sm border-0"><i class="fas fa-eye"></i> Liat</a></td>
                                    <?php }}if(isset($_SESSION['user'])){if($_SESSION['role-id']==1){?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id_mhs" value="<?= $row['id_mhs']?>">
                                        <input type="hidden" name="nama_mhs" value="<?= $row['nama_mhs']?>">
                                        <input type="hidden" name="bukti_regis" value="<?= $row['bukti_regis']?>">
                                        <input type="hidden" name="bukti_khs" value="<?= $row['bukti_khs_akir']?>">
                                        <td><button type="submit" name="approve" class="btn btn-success btn-sm"><i class="fas fa-check-double"></i> Approve</button></td>
                                        <td><button type="submit" name="not-approve" class="btn btn-warning btn-sm"><i class="fas fa-times"></i> Not Approve</button></td>
                                        <td><button type="submit" name="view-peserta" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i> Edit</button></td>
                                        <td><button type="submit" name="hapus-peserta" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button></td>
                                    </form>
                                    <?php }}?>
                                </tr>
                                <?php $no++;?>

                                <!-- jika ada sesi user -->
                                <?php }}}else if(isset($_SESSION['user'])){if(mysqli_num_rows($mahasiswa_view)==0){?>
                                <tr>
                                    <th colspan="11" class="text-dark font-weight-bold">Belum ada data peserta yang dilampirkan.</th>
                                </tr>
                                <?php }else if(mysqli_num_rows($mahasiswa_view)>0){while($row=mysqli_fetch_assoc($mahasiswa_view)){$id_status=$row['id_status'];?>
                                <tr>
                                    <th scope="row"><?= $no;?></th>
                                    <td>
                                        <?php if($id_status==1){?>
                                        <?= $row['nim']?>
                                        <span class="badge badge-success"><?= $row['status']?></span>
                                        <?php }else if($id_status==2){?>
                                        <?php $num_char=4;$string=$row['nim'];echo substr($string, 0, $num_char).'****';?>
                                        <span class="badge badge-warning"><?= $row['status']?></span>
                                        <?php if(isset($_SESSION['mahasiswa'])){?>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_mhs" value="<?= $row['id_mhs']?>">
                                            <input type="hidden" name="nim" value="<?= $row['nim']?>">
                                            <button type="submit" name="view-from-mhs" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i> Edit</button>
                                        </form>
                                        <?php }}else if($id_status==3){?>
                                        <?= $row['nim']?>
                                        <span class="badge badge-warning"><?= $row['status']?></span>
                                        <?php }?>
                                    </td>
                                    <td><?= $row['nama_mhs']?></td>
                                    <td><?= $row['email']?></td>
                                    <td><?= $row['nama_jurusan']?></td>
                                    <td><?= $row['nama_fakultas']?></td>
                                    <td><?= $row['semester']?></td>
                                    <td><?= $row['hp']?></td>
                                    <td><?php if($row['id_kelompok']==1){echo "<small>Belum dapat pembagian kelompok.</small>";}else{echo $row['nama_kelompok'];}?></td>
                                    <td><?= $row['sks']?></td>
                                    <td><?= $row['laporan']?></td>
                                    <?php if(isset($_SESSION['user'])){if($_SESSION['role-id']==1 || 2){?>
                                    <td><a href="bukti-regis?id=<?= $row['id_mhs']?>&bt-reg=<?= $row['bukti_regis']?>" class="btn btn-outline-primary btn-sm border-0"><i class="fas fa-eye"></i> Liat</a></td>
                                    <td><a href="bukti-khs-akhir?id=<?= $row['id_mhs']?>&bt-khs=<?= $row['bukti_khs_akir']?>" class="btn btn-outline-primary btn-sm border-0"><i class="fas fa-eye"></i> Liat</a></td>
                                    <?php }}if(isset($_SESSION['user'])){if($_SESSION['role-id']==1){?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id_mhs" value="<?= $row['id_mhs']?>">
                                        <input type="hidden" name="nama_mhs" value="<?= $row['nama_mhs']?>">
                                        <input type="hidden" name="bukti_regis" value="<?= $row['bukti_regis']?>">
                                        <input type="hidden" name="bukti_khs" value="<?= $row['bukti_khs_akir']?>">
                                        <td><button type="submit" name="approve" class="btn btn-success btn-sm"><i class="fas fa-check-double"></i> Approve</button></td>
                                        <td><button type="submit" name="not-approve" class="btn btn-warning btn-sm"><i class="fas fa-times"></i> Not Approve</button></td>
                                        <td><button type="submit" name="view-peserta" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i> Edit</button></td>
                                        <td><button type="submit" name="hapus-peserta" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button></td>
                                    </form>
                                    <?php }}?>
                                </tr>
                                <?php $no++;?>
                                <?php }}}?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>