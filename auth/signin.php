<?php require "../controller/script.php";?>
<?php if(!isset($_SESSION['mahasiswa'])){header("Location: ../index");exit;}?>
<?php if(isset($_SESSION['user'])){header("Location: ../views/home");exit;}?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <?php require "../application/akses/header.php";?>
        <title>Login | Sistem Informasi KKN</title>
        <?php if(isset($_SESSION['mahasiswa'])){?>
        <style>
            *{
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background: white;
            }
            @media screen and (max-width: 640px){
                body{
                    display: block;
                    justify-content: unset;
                    align-items: unset;
                }
                .body{
                    margin-top: 100px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .shape{
                    width: 300px;
                    height: 450px;
                }
                .shape__shadow{
                    width: 300px;
                    height: 450px;
                }
            }
        </style>
        <?php }?>
    </head>
    <body id="page-top">
        <?php require "../application/akses/navbar.php";?>
        <?php require "../application/views/signin.php";?>
        <?php require "../application/akses/footer.php";?>
    </body>
</html>            