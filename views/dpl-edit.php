<?php require "../controller/script.php";
    if(!isset($_SESSION['id_dosen'])){
        header("Location: dpl");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <?php require "../application/akses/header.php";?>
        <title>Edit DPL | Sistem Informasi KKN</title>
    </head>
    <body id="page-top">
        <?php require "../application/akses/navbar.php";?>
        <?php require "../application/views/dpl-edit.php";?>
        <?php require "../application/akses/footer.php";?>
    </body>
</html>