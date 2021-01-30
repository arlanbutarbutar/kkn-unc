<?php 
    if(!isset($_SESSION)){session_start();}
    // validasi-daftar-peserta
    $_SESSION['nim']=$nim;
    $_SESSION['nama']=$nama;
    $_SESSION['sks']=$sks;
    $_SESSION['hp']=$hp;
    $_SESSION['email']=$email;
    $_SESSION['semester']=$semester;