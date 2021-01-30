<?php 
    if(!isset($_SESSION)){session_start();}
    $_SESSION['mahasiswa']=$_SERVER['SERVER_ADDR'];
    if($_SESSION['mahasiswa']=='::1'){
        $_SESSION['mahasiswa']=$_SERVER['REMOTE_ADDR'];
        if($_SESSION['mahasiswa']=='::1'){
            $_SESSION['mahasiswa']=$_SERVER['REMOTE_PORT'];
            if(!isset($_SESSION['mahasiswa'])){
                $_SESSION['mahasiswa']=$_SERVER['REQUEST_TIME'];
                header('Location: views/home');
                exit();
            }else{
                header('Location: views/home');
                exit();
            }
        }else{
            header('Location: views/home');
            exit();
        }
    }else{
        header('Location: views/home');
        exit();
    }