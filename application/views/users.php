<?php require_once("connect_view_db.php");
    $users=mysqli_query($conn, "SELECT * FROM users");
    $mahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa");
    $dosen=mysqli_query($conn, "SELECT * FROM dosen");
    $count1=mysqli_num_rows($users);
    $count2=mysqli_num_rows($mahasiswa);
    $count3=mysqli_num_rows($dosen);
?>

<!-- <style>.scale-zoom{font-size: 16px;transform: none;transition: 0.25s ease-in-out}.scale-zoom:hover{font-size:20px;transform: scale(1.1);margin: 20px;cursor: none}</style> -->

<!-- user -->
<div class="col-lg-4">
    <div class="card border-0 mb-3 scale-zoom">
        <div class="card-body d-flex justify-content-center">
            <h6 class="font-weight-light">Users</h6>
            <p class="ml-2 font-weight-bold"><?= $count1;?></p>
        </div>
    </div>
</div>

<!-- Mahasiswa -->
<div class="col-lg-4">
    <div class="card border-0 mb-3 scale-zoom">
        <div class="card-body d-flex justify-content-center">
            <h6 class="font-weight-light">Mahasiswa</h6>
            <p class="ml-2 font-weight-bold"><?= $count2;?></p>
        </div>
    </div>
</div>

<!-- dosen -->
<div class="col-lg-4">
    <div class="card border-0 mb-3 scale-zoom">
        <div class="card-body d-flex justify-content-center">
            <h6 class="font-weight-light">Dosen</h6>
            <p class="ml-2 font-weight-bold"><?= $count3;?></p>
        </div>
    </div>
</div>