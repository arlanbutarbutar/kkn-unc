<?php require "../controller/script.php";
    if(!isset($_GET['id'])){
        if(!isset($_GET['nama'])){
            header("Location: kelompok");
            exit;
        }
    }
    $id_kelompok=addslashes(trim($_GET['id']));
    $nama=addslashes(trim($_GET['nama']));
    $cek_kelompok=mysqli_query($conn, "SELECT * FROM kelompok WHERE id_kelompok='$id_kelompok' AND nama_kelompok='$nama'");
    if(mysqli_num_rows($cek_kelompok)==0){
        header("Location: kelompok");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <?php require "../application/akses/header.php";?>
        <title>Detail Kelompok | Sistem Informasi KKN</title>
    </head>
    <body id="page-top">
        <?php require "../application/akses/navbar.php";?>
        <?php require "../application/views/kelompok-detail.php";?>
        <?php require "../application/akses/footer.php";?>
    </body>
</html>