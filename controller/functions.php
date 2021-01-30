<?php
    function signup($add){
        global $conn;
        $username=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $add['username']))));
        $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $add['email']))));
        $users=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if(mysqli_num_rows($users)==1){
            $_SESSION['message-danger']="Maaf akun yang anda daftarkan sudah ada!";
            header("Location: signup");
            return false;
        }else if(mysqli_num_rows($users)==0){
            $dosens=mysqli_query($conn, "SELECT * FROM dosen WHERE email='$email'");
            if(mysqli_num_rows($dosens)==1){
                $_SESSION['message-danger']="Maaf akun yang anda daftarkan sudah ada!";
                header("Location: signup");
                return false;
            }
        }
        $pass=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $add['password']))));
        $password=password_hash($pass, PASSWORD_DEFAULT);
        $id_jurusan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $add['id_jurusan']))));
        $role_id=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $add['role_id']))));
        mysqli_query($conn, "INSERT INTO dosen(nama_dosen,email,password,id_jurusan,role_id) VALUES('$username','$email','$password','$id_jurusan','$role_id')");
        return mysqli_affected_rows($conn);
    }
    function user_edit($edit){
        global $conn;
        $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['id_user']))));
        $username=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['username']))));
        $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['email']))));
        mysqli_query($conn, "UPDATE users SET username='$username', email='$email' WHERE id_user='$id_user'");
        return mysqli_affected_rows($conn);
    }
    function peserta($peserta){
        global $conn;
        $nim=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $peserta['nim']))));
        $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $peserta['nama']))));
        $jurusan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $peserta['jurusan']))));
        $sks=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $peserta['sks']))));
        $semester=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $peserta['semester']))));
        $hp=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $peserta['hp']))));
        $kelompok=1;
        $laporan="-";
        $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $peserta['email']))));
        $tgl_daftar=date('Y-m-d');
        $mahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");
        if(mysqli_fetch_assoc($mahasiswa)){
            require_once("form-post.php");
            $_SESSION['message-danger']="Maaf nim ".$nim." sudah ada!";
            header("Location: daftar");
            exit();
        }
        if($sks<110){
            require_once("form-post.php");
            $_SESSION['message-danger']="Maaf sks yang kamu masukan kurang dari 110 sks.";
            header("Location: daftar");
            return false;
        }
        $lenght_hp=strlen($hp);
        if($lenght_hp>12){
            require_once("form-post.php");
            $_SESSION['message-danger']="Maaf nomor handphone yang kamu masukan terlalu panjang.";
            header("Location: daftar");
            return false;
        }
        $bukti_regis=upload_bukti_regis($nim, $nama, $sks, $hp, $semester, $email);
        if(!$bukti_regis){
            require_once("form-post.php");
            return false;
        }
        $bukti_khs=upload_bukti_khs($nim, $nama, $sks, $hp, $semester, $email);
        if(!$bukti_khs){
            require_once("form-post.php");
            return false;
        }
        mysqli_query($conn, "INSERT INTO mahasiswa(nim,nama_mhs,id_jurusan,email,hp,sks,semester,id_kelompok,laporan,bukti_regis,bukti_khs_akir,tgl_daftar) VALUES('$nim','$nama','$jurusan','$email','$hp','$sks','$semester','$kelompok','$laporan','$bukti_regis','$bukti_khs','$tgl_daftar')");
        return mysqli_affected_rows($conn);
    }
    function upload_bukti_regis($nim, $nama, $sks, $hp, $semester, $email){
        global $conn;
        $namaFile=$_FILES["bukti-regis"]["name"];
        $ukuranFile=$_FILES["bukti-regis"]["size"];
        $error=$_FILES["bukti-regis"]["error"];
        $tmpName=$_FILES["bukti-regis"]["tmp_name"];
        if($error===4){
            require_once("form-post.php");
            $_SESSION['message-warning']="Pilih file bukti regis Anda!";
            header("Location: ../views/daftar");
            return false;
        }
        $ekstensiGambarValid=['jpg','jpeg','png','pdf'];
        $ekstensiImage=['jpg','jpeg','png'];
        $ekstensiDokumen=['pdf'];
        $ekstensiGambar=explode('.',$namaFile);
        $ekstensiGambar=strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
            require_once("form-post.php");
            $_SESSION['message-warning']="Maaf, pilih file bukti regis yang benar!";
            header("Location: ../views/daftar");
            return false;
        }
        if($ukuranFile>2000000){
            require_once("form-post.php");
            $_SESSION['message-warning']="Maaf, ukuran file bukti regis terlalu besar! (2MB)";
            header("Location: ../views/daftar");
            return false;
        }
        // $scripting=htmlspecialchars(addslashes(trim(mysqli_escape_string($conn, $namaFile)))); nama file asli
        $scripting="(".$nim.") ".$nama; // nama file modif
        if(in_array($ekstensiGambar,$ekstensiImage)){
            $verify=$scripting.".jpg";
            move_uploaded_file($tmpName,'../assets/bukti-regis/'.$verify);
            return $verify;
        }else if(in_array($ekstensiGambar,$ekstensiDokumen)){
            $verify=$scripting.".pdf";
            move_uploaded_file($tmpName,'../assets/bukti-regis/'.$verify);
            return $verify;
        }
    }
    function upload_bukti_khs($nim, $nama, $sks, $hp, $semester, $email){
        global $conn;
        $namaFile=$_FILES["bukti-khs-akhir"]["name"];
        $ukuranFile=$_FILES["bukti-khs-akhir"]["size"];
        $error=$_FILES["bukti-khs-akhir"]["error"];
        $tmpName=$_FILES["bukti-khs-akhir"]["tmp_name"];
        if($error===4){
            require_once("form-post.php");
            $_SESSION['message-warning']="Pilih file bukti khs akhir Anda!";
            header("Location: ../views/daftar");
            return false;
        }
        $ekstensiGambarValid=['jpg','jpeg','png','pdf'];
        $ekstensiImage=['jpg','jpeg','png'];
        $ekstensiDokumen=['pdf'];
        $ekstensiGambar=explode('.',$namaFile);
        $ekstensiGambar=strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
            require_once("form-post.php");
            $_SESSION['message-warning']="Maaf, pilih file bukti khs yang benar!";
            header("Location: ../views/daftar");
            return false;
        }
        if($ukuranFile>2000000){
            require_once("form-post.php");
            $_SESSION['message-warning']="Maaf, ukuran file bukti khs terlalu besar! (2MB)";
            header("Location: ../views/daftar");
            return false;
        }
        // $scripting=htmlspecialchars(addslashes(trim(mysqli_escape_string($conn, $namaFile)))); nama file asli
        $scripting="(".$nim.") ".$nama; // nama file modif
        if(in_array($ekstensiGambar,$ekstensiImage)){
            $verify=$scripting.".jpg";
            move_uploaded_file($tmpName,'../assets/bukti-khs-akhir/'.$verify);
            return $verify;
        }else if(in_array($ekstensiGambar,$ekstensiDokumen)){
            $verify=$scripting.".pdf";
            move_uploaded_file($tmpName,'../assets/bukti-khs-akhir/'.$verify);
            return $verify;
        }
    }
    function peserta_edit($edit){
        global $conn;
        $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['id_mhs']))));
        $nim=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['nim']))));
        $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['nama']))));
        $id_jurusan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['id_jurusan']))));
        $sks=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['sks']))));
        if($sks<110){
            $_SESSION['message-danger']="Maaf sks yang kamu masukan kurang dari 110 sks.";
            header("Location: peserta-edit");
            return false;
        }
        $hp=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['hp']))));
        $id_kelompok=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['id_kelompok']))));
        $mahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_kelompok='$id_kelompok'");
        if(mysqli_num_rows($mahasiswa)>9){
            $_SESSION['message-danger']="Maaf kelompok yang anda pilih sudah penuh.";
            header("Location: peserta-edit");
            return false;
        }
        $laporan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['laporan']))));
        $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['email']))));
        mysqli_query($conn, "UPDATE mahasiswa SET nim='$nim', nama_mhs='$nama', id_jurusan='$id_jurusan', email='$email', hp='$hp', sks='$sks', id_kelompok='$id_kelompok', laporan='$laporan' WHERE id_mhs='$id_mhs'");
        $_SESSION['name']=$nama;
        return mysqli_affected_rows($conn);
    }
    function peserta_hapus($hapus){
        global $conn;
        $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $hapus['id_mhs']))));
        $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $hapus['nama']))));
        $bukti_regis=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $hapus['bukti_regis']))));
        $bukti_khs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $hapus['bukti_khs']))));
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mhs='$id_mhs'");
        $_SESSION['name']=$nama;
        unlink("../assets/bukti-regis/".$bukti_regis);
        unlink("../assets/bukti-khs-akhir/".$bukti_khs);
        return mysqli_affected_rows($conn);
    }
    function dosen($dosen){
        global $conn;
        $nip=$dosen['nip'];
        $dosens=mysqli_query($conn, "SELECT * FROM dosen WHERE nip='$nip'");
        if(mysqli_fetch_assoc($dosens)){
            $_SESSION['message-danger']="Maaf nip ".$nip." sudah ada!";
            header("Location: dosen");
            exit();
        }
        $name=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $dosen['name']))));
        $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $dosen['email']))));
        $pass=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $dosen['password']))));
        $password=password_hash($pass, PASSWORD_DEFAULT);
        $mobile=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $dosen['mobile']))));
        $jurusan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $dosen['jurusan']))));
        $role_id=2;
        mysqli_query($conn, "INSERT INTO dosen(nip,nama_dosen,email,password,no_hp,id_jurusan,role_id) VALUES('$nip','$name','$email','$password','$mobile','$jurusan','$role_id')");
        return mysqli_affected_rows($conn);
    }
    function dosen_edit($edit){
        global $conn;
        $id_dosen=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['id_dosen']))));
        $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['nip']))));
        $name=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['name']))));
        $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['email']))));
        $mobile=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['mobile']))));
        $lenght_hp=strlen($mobile);
        if($lenght_hp>12){
            require_once("form-post.php");
            $_SESSION['message-danger']="Maaf nomor handphone yang kamu masukan terlalu panjang.";
            header("Location: dosen");
            return false;
        }
        $jurusan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['jurusan']))));
        if($jurusan==0){
            $_SESSION['message-danger']="Anda belum mengisi jurusan!";
            $_SESSION['id_dosen']=$id_dosen;
            header("Location: dpl-edit");
            return false;
        }
        mysqli_query($conn, "UPDATE dosen SET nip='$nip', nama_dosen='$name', email='$email', no_hp='$mobile',id_jurusan='$jurusan' WHERE id_dosen='$id_dosen'");
        $_SESSION['name']=$name;
        return mysqli_affected_rows($conn);
    }
    function dosen_hapus($hapus){
        global $conn;
        $id_dosen=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $hapus['id_dosen']))));
        $name=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $hapus['name']))));
        $kelompok=mysqli_query($conn, "SELECT * FROM kelompok WHERE id_dosen='$id_dosen'");
        if(mysqli_num_rows($kelompok)){
            $_SESSION['message-danger']="Maaf, data ini tidak dapat dihapus karena dosen ini masih punya kelompok.";
            header("Location: dpl");
            return false;
        }
        mysqli_query($conn, "DELETE FROM dosen WHERE id_dosen='$id_dosen'");
        $_SESSION['name']=$name;
        return mysqli_affected_rows($conn);
    }
    function kelompok_adding($add){
        global $conn;
        $cek_kelompok=mysqli_query($conn, "SELECT id_kelompok FROM kelompok ORDER BY id_kelompok DESC LIMIT 1");
        $loop_kelompok=mysqli_fetch_assoc($cek_kelompok);
        if(isset($loop_kelompok['id_kelompok'])){
            $idCoder=addslashes(trim($loop_kelompok['id_kelompok']));
            $id_kelompok=$idCoder+1;
        }else if(!isset($loop_kelompok['id_kelompok'])){
            $id_kelompok=202027;
        }
        $id_dosen=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $add['id_dosen']))));
        $id_desa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $add['id_desa']))));
        $nama_kelompok=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $add['nama_kelompok']))));
        mysqli_query($conn, "INSERT INTO kelompok VALUES('$id_kelompok','$id_dosen','$id_desa','$nama_kelompok')");
        return mysqli_affected_rows($conn);
    }
    function kelompok_edit($edit){
        global $conn;
        $id_kelompok=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['id_kelompok']))));
        $id_dosen=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['id_dosen']))));
        $id_desa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['id_desa']))));
        $nama_kelompok=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['nama_kelompok']))));
        mysqli_query($conn, "UPDATE kelompok SET id_dosen='$id_dosen', id_desa='$id_desa', nama_kelompok='$nama_kelompok' WHERE id_kelompok='$id_kelompok'");
        return mysqli_affected_rows($conn);
    }
    function kelompok_delete($del){
        global $conn;
        $id_kelompok=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $del['id-kelompok']))));
        $mahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_kelompok='$id_kelompok'");
        if(mysqli_num_rows($mahasiswa)){
            $_SESSION['message-danger']="Maaf, data ini tidak dapat dihapus karena ada mahasiswa yang masih ada pada kelompok ini.";
            header("Location: kelompok");
            return false;
        }
        mysqli_query($conn, "DELETE FROM kelompok WHERE id_kelompok='$id_kelompok'");
        return mysqli_affected_rows($conn);
    }
    function approve($app){
        global $conn;
        $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $app['id_mhs']))));
        mysqli_query($conn, "UPDATE mahasiswa SET id_status='1' WHERE id_mhs='$id_mhs'");
        return mysqli_affected_rows($conn);
    }
    function not_approve($not_app){
        global $conn;
        $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $not_app['id_mhs']))));
        mysqli_query($conn, "UPDATE mahasiswa SET id_status='2' WHERE id_mhs='$id_mhs'");
        return mysqli_affected_rows($conn);
    }
    function edit_mahasiswa($edit){
        global $conn;
        $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['id-mhs']))));
        $nim=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['nim']))));
        $bukti_regis_old=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['bukti-regis']))));
        $bukti_khs_akhir_old=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['bukti-khs-akhir']))));
        $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['nama']))));
        $jurusan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['jurusan']))));
        $sks=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['sks']))));
        $semester=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['semester']))));
        $hp=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['hp']))));
        $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $edit['email']))));
        if($sks<110){
            $_SESSION['message-danger']="Maaf sks yang kamu masukan kurang dari 110 sks.";
            header("Location: peserta-edit");
            return false;
        }
        $lenght_hp=strlen($hp);
        if($lenght_hp>12){
            $_SESSION['message-danger']="Maaf nomor handphone yang kamu masukan terlalu panjang.";
            header("Location: peserta-edit");
            return false;
        }
        $bukti_regis=upload_bukti_regis_lagi($nim, $nama, $sks, $hp, $semester, $email);
        if(!$bukti_regis){
            return false;
        }
        $bukti_khs=upload_bukti_khs_lagi($nim, $nama, $sks, $hp, $semester, $email);
        if(!$bukti_khs){
            return false;
        }
        mysqli_query($conn, "UPDATE mahasiswa SET nama_mhs='$nama', id_jurusan='$jurusan', email='$email', hp='$hp', sks='$sks', semester='$semester', bukti_regis='$bukti_regis', bukti_khs_akir='$bukti_khs', id_status='3' WHERE id_mhs='$id_mhs'");
        if(!empty($bukti_regis_old)){
            unlink("../assets/bukti-regis/".$bukti_regis_old);
        }if(!empty($bukti_khs_akhir_old)){
            unlink("../assets/bukti-khs-akhir/".$bukti_khs_akhir_old);
        }
        return mysqli_affected_rows($conn);
    }
    function upload_bukti_regis_lagi($nim, $nama){
        global $conn;
        $namaFile=$_FILES["bukti-regis"]["name"];
        $ukuranFile=$_FILES["bukti-regis"]["size"];
        $error=$_FILES["bukti-regis"]["error"];
        $tmpName=$_FILES["bukti-regis"]["tmp_name"];
        if($error===4){
            $_SESSION['message-warning']="Pilih file bukti regis Anda!";
            header("Location: ../views/peserta-edit");
            return false;
        }
        $ekstensiGambarValid=['jpg','jpeg','png','pdf'];
        $ekstensiImage=['jpg','jpeg','png'];
        $ekstensiDokumen=['pdf'];
        $ekstensiGambar=explode('.',$namaFile);
        $ekstensiGambar=strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
            $_SESSION['message-warning']="Maaf, pilih file bukti regis yang benar!";
            header("Location: ../views/peserta-edit");
            return false;
        }
        if($ukuranFile>2000000){
            $_SESSION['message-warning']="Maaf, ukuran file bukti regis terlalu besar! (2MB)";
            header("Location: ../views/peserta-edit");
            return false;
        }
        // $scripting=htmlspecialchars(addslashes(trim(mysqli_escape_string($conn, $namaFile)))); nama file asli
        $scripting="(".$nim.") ".$nama; // nama file modif
        if(in_array($ekstensiGambar,$ekstensiImage)){
            $verify=$scripting.".jpg";
            move_uploaded_file($tmpName,'../assets/bukti-regis/'.$verify);
            return $verify;
        }else if(in_array($ekstensiGambar,$ekstensiDokumen)){
            $verify=$scripting.".pdf";
            move_uploaded_file($tmpName,'../assets/bukti-regis/'.$verify);
            return $verify;
        }
    }
    function upload_bukti_khs_lagi($nim, $nama){
        global $conn;
        $namaFile=$_FILES["bukti-khs-akhir"]["name"];
        $ukuranFile=$_FILES["bukti-khs-akhir"]["size"];
        $error=$_FILES["bukti-khs-akhir"]["error"];
        $tmpName=$_FILES["bukti-khs-akhir"]["tmp_name"];
        if($error===4){
            $_SESSION['message-warning']="Pilih file bukti khs akhir Anda!";
            header("Location: ../views/peserta-edit");
            return false;
        }
        $ekstensiGambarValid=['jpg','jpeg','png','pdf'];
        $ekstensiImage=['jpg','jpeg','png'];
        $ekstensiDokumen=['pdf'];
        $ekstensiGambar=explode('.',$namaFile);
        $ekstensiGambar=strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
            $_SESSION['message-warning']="Maaf, pilih file bukti khs yang benar!";
            header("Location: ../views/peserta-edit");
            return false;
        }
        if($ukuranFile>2000000){
            $_SESSION['message-warning']="Maaf, ukuran file bukti khs terlalu besar! (2MB)";
            header("Location: ../views/peserta-edit");
            return false;
        }
        // $scripting=htmlspecialchars(addslashes(trim(mysqli_escape_string($conn, $namaFile)))); nama file asli
        $scripting="(".$nim.") ".$nama; // nama file modif
        if(in_array($ekstensiGambar,$ekstensiImage)){
            $verify=$scripting.".jpg";
            move_uploaded_file($tmpName,'../assets/bukti-khs-akhir/'.$verify);
            return $verify;
        }else if(in_array($ekstensiGambar,$ekstensiDokumen)){
            $verify=$scripting.".pdf";
            move_uploaded_file($tmpName,'../assets/bukti-khs-akhir/'.$verify);
            return $verify;
        }
    }