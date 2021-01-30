<?php if(isset($_SESSION['mahasiswa'])){?>
    <div class="body">
        <div class="shape__container">
            <div class="shape">
                <div class="customer__picture">
                    <img src="../assets/img/woman-in-red-coat-holding-notebooks-and-coffee-cup-3755760.jpg"/>
                </div>
                <div class="text">
                    <img class="logo" src="../assets/images/Spectur.svg" alt="" />
                    <p>
                        Pendaftaran Peserta KKN Universitas Nusa Cendana Kota Kupang Nusa Tenggara Timur tahun ajaran <?php $y=date('Y');$x=$y-1;echo $x;?>/<?= date('Y');?>.
                    </p>
                </div>
            </div>
            <div class="shape__shadow"></div>
        </div>
    </div>
<?php }if(isset($_SESSION['user'])){?>
<div class="container-fluid mb-5">
    <div class="row mt-4 mb-5">
        <?php if(isset($_SESSION['role-id'])){if($_SESSION['role-id']==1){?>
        <div class="col-lg-4 m-0 mt-3">

            <h4 class="text-center">Users</h4><hr>
            <div class="container-users shadow rounded mb-3 row m-1"><?php require_once("../application/views/users.php")?></div>

            <div class="card shadow border-0">
                <div class="card-header text-center">
                    <h4 class="mb-n2">Peserta Baru Terdaftar</h4>
                    <small>Tanggal <?= date('Y-m-d');?></small>
                </div>
                <div class="card-body">
                    <div class="container-peserta"><?php require_once("../application/views/peserta-baru.php")?></div>
                </div>
            </div>

        </div>
        <div class="col-lg-8">
        <?php }}if(isset($_SESSION['role-id'])){if($_SESSION['role-id']==2){?>
            <div class="col-md-12">
        <?php }}if(isset($_SESSION['role-id'])){if($_SESSION['role-id']==2 || 1){?>
                <div class="row">
                    <style>.card-style{transform: none;transition: all 0.25s ease-in-out;}.card-style:hover{transform: scale(1.1);}.btn-style{border: 0;transition: all 0.25s ease-in-out;}.btn-style:hover{border-style: solid;border-bottom-width: 3px;border-color: #BFBFBF;}</style>
                    <?php if(isset($_SESSION['mahasiswa'])){?>
                    <div class="col-lg-4 mt-3">
                        <div class="card shadow border-0 card-style">
                            <img src="../assets/img/people-coffee-meeting-team-7096.jpg" class="card-img-top" alt="Image Daftar">
                            <div class="card-body text-center">
                                <h5 class="card-title">Pendaftaran KKN</h5>
                                <p class="card-text">Silahkan lakukan Pendaftaran KKN disini!</p>
                                <a href="daftar" class="btn-style btn btn-outline-primary btn-sm font-weight-bold">Klik Disini</a>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <div class="col-lg-4 mt-3">
                        <div class="card shadow border-0 card-style">
                            <img src="../assets/img/group-of-people-sitting-on-stairs-2124916.jpg" class="card-img-top" alt="Image Peserta">
                            <div class="card-body text-center">
                                <h5 class="card-title">Peserta KKN</h5>
                                <p class="card-text">Data Mahasiswa yang telah terdaftar sebagai Peserta KKN.</p>
                                <a href="peserta" class="btn-style btn btn-outline-primary btn-sm font-weight-bold">Klik Disini</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="card shadow border-0 card-style">
                            <img src="../assets/img/man-wearing-gray-dress-shirt-and-blue-jeans-3184317.jpg" class="card-img-top" alt="Image Kelompok">
                            <div class="card-body text-center">
                                <h5 class="card-title">Kelompok KKN</h5>
                                <p class="card-text">Informasi Kelompok KKN mengenai Mahasiswa, DPL, Lokasi, dll.</p>
                                <a href="kelompok" class="btn-style btn btn-outline-primary btn-sm font-weight-bold">Klik Disini</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="card shadow border-0 card-style">
                            <img src="../assets/img/woman-in-red-long-sleeve-writing-on-chalk-board-3769714.jpg" class="card-img-top" alt="Image DPL">
                            <div class="card-body text-center">
                                <h5 class="card-title">Dosen Pembimbing Lapangan</h5>
                                <p class="card-text">Data Dosen Pembimbing Lapangan (DPL).</p>
                                <a href="dpl" class="btn-style btn btn-outline-primary btn-sm font-weight-bold">Klik Disini</a>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($_SESSION['user'])){if($_SESSION['role-id']==1){?>
                    <div class="col-lg-4 mt-3">
                        <div class="card shadow border-0 card-style">
                            <img src="../assets/img/pexels-fauxels-3184328.jpg" class="card-img-top" alt="Image DPL">
                            <div class="card-body text-center">
                                <h5 class="card-title">Insert DPL</h5>
                                <p class="card-text">Memasukan data Dosen melalui admin.</p>
                                <a href="dosen" class="btn-style btn btn-outline-primary btn-sm font-weight-bold">Klik Disini</a>
                            </div>
                        </div>
                    </div>
                    <?php }}?>
                </div>
            </div>
        <?php }}if(isset($_SESSION['role-id'])){if($_SESSION['role-id']==1){?>
        </div>
        <?php }}?>
    </div>
</div>
<?php }?>