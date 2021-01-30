<?php require "../controller/script.php";
    if(!isset($_SESSION['user'])){
        header("Location: ../index");
        exit;
    }
    if(!isset($_GET['id'])){
        if(!isset($_GET['bt-reg'])){
            header("Location: peserta");
            exit;
        }
    }
    $id_mhs=htmlspecialchars(addslashes(trim($_GET['id'])));
    $bukti_regis=htmlspecialchars(addslashes(trim($_GET['bt-reg'])));
    $cek_kelompok=mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mhs='$id_mhs'");
    if(mysqli_num_rows($cek_kelompok)==0){
        header("Location: peserta");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <?php require "../application/akses/header.php";?>
        <title>Bukti Regis <?= $bukti_regis;?> | Sistem Informasi KKN</title>
    </head>
    <body id="page-top">
        <?php require "../application/akses/navbar.php";?>
        <?php require "../application/views/bukti-regis.php";?>
        <?php require "../application/akses/footer.php";?>
    </body>
</html>