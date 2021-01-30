<?php require "../controller/script.php";
    if(isset($_SESSION['role-id'])){
        if($_SESSION['role-id']==2){
            header("Location: home");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <?php require "../application/akses/header.php";?>
        <title>Dosen | Sistem Informasi KKN</title>
    </head>
    <body id="page-top">
        <?php require "../application/akses/navbar.php";?>
        <?php require "../application/views/dosen.php";?>
        <?php require "../application/akses/footer.php";?>
    </body>
</html>