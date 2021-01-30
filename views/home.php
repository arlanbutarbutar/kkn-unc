<?php require "../controller/script.php";?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <?php require "../application/akses/header.php";?>
        <title>Sistem Informasi KKN</title>
        <script type="text/javascript">
            var otomatis = setInterval(function (){
                $('.container-peserta').load('../application/views/peserta-baru.php').fadeIn("slow");
            }, 1000);
            var otomatis = setInterval(function (){
                $('.container-users').load('../application/views/users.php').fadeIn("slow");
            }, 15000);
        </script>
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
    <body id="page-top" style="overflow-x:hidden">
        <?php require "../application/akses/navbar.php";?>
        <?php if(isset($_SESSION['user'])){?>
        <?php require "../application/views/banner.php";?>
        <?php }?>
        <?php require "../application/views/home.php";?>
        <?php require "../application/akses/footer.php";?>
    </body>
</html>            