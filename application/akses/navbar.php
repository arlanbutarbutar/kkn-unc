<nav class="navbar navbar-expand-lg navbar-light bg-light shadow rounded m-3 p-3 sticky-top">
    <a class="navbar-brand" href="#page-top">
        <img src="../assets/img/logo_unc.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Politeknik">
        UNC
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <form action="" method="POST">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-3 m-auto">
                    <?php if(isset($_SESSION['mahasiswa'])){?>
                    <a class="nav-link text-dark" href="<?php if(isset($_SESSION['auth'])){echo $link;}?>home">Home</a>
                    <?php }if(isset($_SESSION['user'])){?>
                    <a class="nav-link text-dark" href="home">Beranda</a>
                    <?php }?>
                </li>
                <li class="nav-item dropdown mr-3 m-auto no-arrow">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info KKN</a>
                    <div class="dropdown-menu border-0 shadow" aria-labelledby="navbarDropdown">
                        <?php if(isset($_SESSION['mahasiswa'])){?>
                        <a class="dropdown-item" href="<?php if(isset($_SESSION['auth'])){echo $link;}?>daftar">Pendaftaran</a>
                        <?php }?>
                        <a class="dropdown-item" href="<?php if(isset($_SESSION['auth'])){echo $link;}?>peserta">Peserta KKN</a>
                        <a class="dropdown-item" href="<?php if(isset($_SESSION['auth'])){echo $link;}?>kelompok">Kelompok KKN</a>
                        <a class="dropdown-item" href="<?php if(isset($_SESSION['auth'])){echo $link;}?>dpl">DPL KKN</a>
                        <?php if(isset($_SESSION['user'])){if($_SESSION['role-id']==1){?>
                        <a class="dropdown-item" href="dosen">Dosen</a>
                        <?php }}?>
                    </div>
                </li>
                <?php if(isset($_SESSION['mahasiswa'])){?>
                <li class="nav-item ml-3 m-auto">
                    <button class="btn btn-primary rounded-pill text-white font-weight-bold shadow" type="submit" name="signin">Login</button>
                </li>
                <?php }if(isset($_SESSION['user'])){?>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="../assets/img/default.png" style="width: 50px">
                    </a>
                    <div class="dropdown-menu bg-white dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="my-profile">
                            <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                            My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item text-decoration-none" type="submit" name="logout">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                            Logout
                        </button>
                    </div>
                </li>
                <?php }?>
            </ul>
        </form>
    </div>
</nav>