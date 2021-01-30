<?php
    if(!isset($_SESSION)){session_start();}
    require_once("../controller/functions.php");
    require_once("../controller/connect_db.php");
    if(isset($_SESSION['role-id'])){
        if(isset($_SESSION['mahasiswa'])){
            unset($_SESSION['mahasiswa']);
        }
    }
    // alert{
        if(isset($_SESSION['message-success'])){
            $message_success="<div class='alert alert-success alert-dismissible fade show' role='alert'>
            ".$_SESSION['message-success']."
                <form action='' method='POST'>
                    <button type='submit' name='message-success' class='close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </form>
            </div>";
        }
        if(isset($_SESSION['message-warning'])){
            $message_warning="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            ".$_SESSION['message-warning']."
                <form action='' method='POST'>
                    <button type='submit' name='message-warning' class='close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </form>
            </div>";
        }
        if(isset($_SESSION['message-danger'])){
            $message_danger="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            ".$_SESSION['message-danger']."
                <form action='' method='POST'>
                    <button type='submit' name='message-danger' class='close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </form>
            </div>";
        }
        if(isset($_SESSION['message-info'])){
            $message_info="<div class='alert alert-info alert-dismissible fade show' role='alert'>
            ".$_SESSION['message-info']."
                <form action='' method='POST'>
                    <button type='submit' name='message-info' class='close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </form>
            </div>";
        }
        if(isset($_SESSION['message-dark'])){
            $message_dark="<div class='alert alert-dark alert-dismissible fade show' role='alert'>
            ".$_SESSION['message-dark']."
                <form action='' method='POST'>
                    <button type='submit' name='message-dark' class='close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </form>
            </div>";
        }
        if(isset($_POST['message-success'])){
            unset($_SESSION['message-success']);
        }
        if(isset($_POST['message-warning'])){
            unset($_SESSION['message-warning']);
        }
        if(isset($_POST['message-danger'])){
            unset($_SESSION['message-danger']);
        }
        if(isset($_POST['message-info'])){
            unset($_SESSION['message-info']);
        }
        if(isset($_POST['message-dark'])){
            unset($_SESSION['message-dark']);
        }
    // }
    // auth{
        $role_id=mysqli_query($conn, "SELECT * FROM users_role WHERE role_id>1");
        $jurusan_daftar=mysqli_query($conn, "SELECT * FROM jurusan WHERE id_jurusan>1");
        if(isset($_POST['daftar'])){
            if(signup($_POST)>0){
                header("Location: signin");
                exit();
            }
        }
        if(isset($_POST['login'])){
            $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['email']))));
            $password=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['password']))));
            $login=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            if(mysqli_num_rows($login)===1){
                $row=mysqli_fetch_assoc($login);
                $mail=$row['email'];
                $pass=$row['password'];
                if($email==$mail){
                    if(password_verify($password, $pass)){
                        $_SESSION['id-user']=$row['id_user'];
                        $_SESSION['user']=$row['username'];
                        $_SESSION['role-id']=$row['role_id'];
                        unset($_SESSION['message-danger']);
                        unset($_SESSION['mahasiswa']);
                        unset($_SESSION['auth']);
                        header("Location: ../views/home");
                        exit();
                    }else{
                        $_SESSION['message-danger']="Maaf password yang anda masukan salah!";
                        header("Location: signin");
                        return false;
                    }
                }else{
                    $_SESSION['message-danger']="Maaf email yang anda masukan salah!";
                    header("Location: signin");
                    return false;
                }
            }else if(mysqli_num_rows($login)===0){
                $login=mysqli_query($conn, "SELECT * FROM dosen WHERE email='$email'");
                if(mysqli_num_rows($login)===1){
                    $row=mysqli_fetch_assoc($login);
                    $mail=$row['email'];
                    $pass=$row['password'];
                    if($email==$mail){
                        if(password_verify($password, $pass)){
                            $_SESSION['id-dosen']=$row['id_dosen'];
                            $_SESSION['user']=$row['nama_dosen'];
                            $_SESSION['role-id']=$row['role_id'];
                            unset($_SESSION['message-danger']);
                            unset($_SESSION['mahasiswa']);
                            unset($_SESSION['auth']);
                            header("Location: ../views/home");
                            exit();
                        }else{
                            $_SESSION['message-danger']="Maaf password yang anda masukan salah!";
                            header("Location: signin");
                            return false;
                        }
                    }else{
                        $_SESSION['message-danger']="Maaf email yang anda masukan salah!";
                        header("Location: signin");
                        return false;
                    }
                }else if(mysqli_num_rows($login)===0){
                    $_SESSION['message-danger']="Maaf anda belum terdaftar!";
                    header("Location: signin");
                    return false;
                }
            }
        }
    // }
    // mahasiswa{
        if(isset($_SESSION['mahasiswa'])){
            if(isset($_POST['signin'])){
                $_SESSION['auth']=1;
                header("Location: ../auth/signin");
                exit;
            }
            if(isset($_SESSION['auth'])){
                $link="../views/";
                if(isset($_POST['signin'])){
                    $_SESSION['auth']=1;
                    header("Location: signin");
                    exit;
                }
                if(isset($_POST['signup'])){
                    $_SESSION['auth']=1;
                    header("Location: signup");
                    exit;
                }
            }
            $jurusan_daftar=mysqli_query($conn, "SELECT * FROM jurusan WHERE id_jurusan>1");
            $kelompok_daftar=mysqli_query($conn, "SELECT * FROM kelompok 
                JOIN dosen ON kelompok.id_dosen=dosen.id_dosen 
                JOIN desa ON kelompok.id_desa=desa.id_desa
                JOIN kecamatan ON desa.id_kecamatan=kecamatan.id_kecamatan
                JOIN kabupaten ON kecamatan.id_kabupaten=kabupaten.id_kabupaten
                WHERE kelompok.id_kelompok>1
            ");
            if(isset($_POST['input-mahasiswa'])){
                if(peserta($_POST)>0){
                    unset($_SESSION['nim'],$_SESSION['nama'],$_SESSION['sks'],$_SESSION['hp'],$_SESSION['email'],$_SESSION['semester']);
                    $_SESSION['message-success']="Anda telah ditambahkan sebagai peserta KKN ".$y=date('Y').". Saat ini data anda sedang di check oleh admin, mohon ditunggu.";$x=$y-1;echo $x."/".date('Y').".";
                    header("Location: peserta");
                    exit();
                }
            }
        }
    // }
    // user{
        if(isset($_SESSION['user'])){
            if(isset($_POST['logout'])){
                $_SESSION=[];
                session_unset();
                session_destroy();
                header("Location: ../index");
                exit();
            }
            // peserta{
                if(isset($_POST['search-peserta'])){
                    $keyword=$_POST['keyword'];
                    $mahasiswa_view=mysqli_query($conn, "SELECT * FROM mahasiswa 
                        JOIN jurusan ON mahasiswa.id_jurusan=jurusan.id_jurusan 
                        JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                        JOIN kelompok ON mahasiswa.id_kelompok=kelompok.id_kelompok 
                        JOIN status ON mahasiswa.id_status=status.id_status 
                        WHERE mahasiswa.nim = '$keyword'
                        OR mahasiswa.nama_mhs = '$keyword'
                        OR jurusan.nama_jurusan = '$keyword'
                        OR mahasiswa.email = '$keyword'
                        OR mahasiswa.hp = '$keyword'
                        OR mahasiswa.sks = '$keyword'
                        OR kelompok.nama_kelompok = '$keyword'
                        OR mahasiswa.laporan = '$keyword'
                    ");
                }else{
                    $data_view=15;
                    $result_view=mysqli_query($conn, "SELECT * FROM mahasiswa");
                    $total_view=mysqli_num_rows($result_view);
                    $total_page_view=ceil($total_view/$data_view);
                    $page_view=(isset($_GET['page']))?$_GET['page']:1;
                    $awalData_view=($data_view*$page_view)-$data_view;
                    $mahasiswa_view=mysqli_query($conn, "SELECT * FROM mahasiswa
                        JOIN jurusan ON mahasiswa.id_jurusan=jurusan.id_jurusan 
                        JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                        JOIN kelompok ON mahasiswa.id_kelompok=kelompok.id_kelompok
                        JOIN status ON mahasiswa.id_status=status.id_status 
                        WHERE mahasiswa.id_status=1
                        OR mahasiswa.id_status=2
                        OR mahasiswa.id_status=3
                        LIMIT $awalData_view, $data_view
                    ");
                }
                $peserta_count=mysqli_query($conn, "SELECT * FROM mahasiswa");
                $pesco=mysqli_num_rows($peserta_count);
                if(isset($_POST['view-peserta'])){
                    $_SESSION['id_mhs']=$_POST['id_mhs'];
                    header("Location: peserta-edit");
                    exit();
                }
                if(isset($_SESSION['id_mhs'])){
                    $id_mhs=$_SESSION['id_mhs'];
                    $mahasiswas=mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mhs='$id_mhs'");
                }
                if(isset($_POST['back-peserta'])){
                    unset($_SESSION['id_mhs']);
                    header("Location: peserta");
                    exit();
                }
                if(isset($_POST['edit-peserta'])){
                    if(peserta_edit($_POST)>0){
                        $_SESSION['message-success']="Data ".$_SESSION['name']." sebagai peserta KKN berhasil di edit!";
                        unset($_SESSION['id_mhs']);
                        header("Location: peserta");
                        exit();
                    }
                }
                if(isset($_POST['hapus-peserta'])){
                    if(peserta_hapus($_POST)>0){
                        $_SESSION['message-success']="Data ".$_SESSION['name']." telah di hapus dari peserta KKN!";
                        header("Location: peserta");
                        exit();
                    }
                }
                if(isset($_POST['approve'])){
                    if(approve($_POST)>0){
                        $_SESSION['message-success']="Data Mahasiswa yang anda pilih telah disetujui";
                        header("Location: peserta");
                        exit;
                    }
                }
                if(isset($_POST['not-approve'])){
                    if(not_approve($_POST)>0){
                        $_SESSION['message-success']="Data Mahasiswa yang anda pilih telah tidak disetujui";
                        header("Location: peserta");
                        exit;
                    }
                }
            // }
            // kelompok{
                $desa=mysqli_query($conn, "SELECT * FROM desa WHERE id_desa>1");
                if(isset($_POST['tambah-kelompok'])){
                    if(kelompok_adding($_POST)>0){
                        $_SESSION['message-success']="Kelompok berhasil ditambahkan!";
                        header("Location: kelompok");
                        exit;
                    }
                }
                if(isset($_POST['edit-kelompok'])){
                    $_SESSION['id-kelompok']=$_POST['id_kelompok'];
                    header("Location: kelompok-edit");
                    exit;
                }
                if(isset($_POST['close-edit-kelompok'])){
                    if(isset($_SESSION['id-kelompok'])){
                        unset($_SESSION['id-kelompok']);
                        header("Location: kelompok");
                        exit;
                    }
                }
                if(isset($_POST['edits-kelompok'])){
                    if(kelompok_edit($_POST)>0){
                        $_SESSION['message-success']="Kelompok berhasil diedit!";
                        header("Location: kelompok");
                        exit;
                    }
                }
                if(isset($_POST['delete-kelompok'])){
                    if(kelompok_delete($_POST)>0){
                        $_SESSION['message-success']="Kelompok berhasil dihapus!";
                        header("Location: kelompok");
                        exit;
                    }
                }
            // }
            // dosen{
                $users_dosen=mysqli_query($conn, "SELECT * FROM users WHERE role_id=2
                ");
                if(isset($_POST['search-dosen'])){
                    $keyword=htmlspecialchars(addslashes(trim($_POST['keyword'])));
                    $users_dosen=mysqli_query($conn, "SELECT * FROM users WHERE role_id=2 AND username LIKE '%$keyword%' OR email LIKE '%$keyword%'");
                }
                $jurusan_daftar=mysqli_query($conn, "SELECT * FROM jurusan WHERE id_jurusan>1");
                $kelompok_daftar=mysqli_query($conn, "SELECT * FROM kelompok 
                    JOIN dosen ON kelompok.id_dosen=dosen.id_dosen 
                    JOIN desa ON kelompok.id_desa=desa.id_desa
                    JOIN kecamatan ON desa.id_kecamatan=kecamatan.id_kecamatan
                    JOIN kabupaten ON kecamatan.id_kabupaten=kabupaten.id_kabupaten
                    WHERE kelompok.id_kelompok>1
                ");
                if(isset($_POST['tambah-dosen'])){
                    if(dosen($_POST)>0){
                        $_SESSION['message-success']="Data dosen berhasil ditambahkan!";
                        header("Location: dpl");
                        exit();
                    }
                }
                if(isset($_POST['view-dosen'])){
                    $_SESSION['id_dosen']=$_POST['id_dosen'];
                    header("Location: dpl-edit");
                    exit();
                }
                if(isset($_SESSION['id_dosen'])){
                    $id_dosen=$_SESSION['id_dosen'];
                    $dosens=mysqli_query($conn, "SELECT * FROM dosen WHERE id_dosen='$id_dosen'");
                }
                if(isset($_POST['edit-dosen'])){
                    if(dosen_edit($_POST)>0){
                        $_SESSION['message-success']="Data dosen ".$_SESSION['name']." berhasil diedit!";
                        header("Location: dpl");
                        exit();
                    }
                }
                if(isset($_POST['back-dpl'])){
                    unset($_SESSION['id_dosen']);
                    header("Location: dpl");
                    exit();
                }
                if(isset($_POST['hapus-dosen'])){
                    if(dosen_hapus($_POST)>0){
                        $_SESSION['message-success']="Data dosen ".$_SESSION['name']." berhasil dihapus!";
                        header("Location: dpl");
                        exit();
                    }
                }
            // }
            if(isset($_SESSION['role-id'])){
                if($_SESSION['role-id']==1){
                    $id_account_user=$_SESSION['id-user'];
                    $my_account_user=mysqli_query($conn, "SELECT * FROM users WHERE id_user='$id_account_user'");
                    if(isset($_POST['edit-profile'])){
                        if(user_edit($_POST)>0){
                            $_SESSION['message-success']="Data profile kamu berhasil diubah!";
                            header("Location: my-profile");
                            exit();
                        }
                    }
                }if($_SESSION['role-id']==2){
                    $id_account_dosen=$_SESSION['id-dosen'];
                    $my_account_dosen=mysqli_query($conn, "SELECT * FROM dosen 
                        JOIN jurusan ON dosen.id_jurusan=jurusan.id_jurusan 
                        JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                        WHERE id_dosen='$id_account_dosen'
                    ");
                    $jurusan=mysqli_query($conn, "SELECT * FROM jurusan WHERE id_jurusan>1");
                    if(isset($_POST['edit-profile'])){
                        if(dosen_edit($_POST)>0){
                            $_SESSION['message-success']="Data profile kamu berhasil diubah!";
                            header("Location: my-profile");
                            exit();
                        }
                    }
                }
            }
        }
    // }
    // global{
        // if(isset($_SESSION['mahasiswa'])){
        // peserta{
            if(isset($_POST['search-peserta'])){
                $keyword=$_POST['keyword'];
                $mahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa 
                    JOIN jurusan ON mahasiswa.id_jurusan=jurusan.id_jurusan 
                    JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                    JOIN kelompok ON mahasiswa.id_kelompok=kelompok.id_kelompok 
                    JOIN status ON mahasiswa.id_status=status.id_status 
                    WHERE mahasiswa.nim = '$keyword'
                    OR mahasiswa.id_status=1
                    OR mahasiswa.id_status=2
                    OR mahasiswa.nama_mhs = '$keyword'
                    OR jurusan.nama_jurusan = '$keyword'
                    OR mahasiswa.email = '$keyword'
                    OR mahasiswa.hp = '$keyword'
                    OR mahasiswa.sks = '$keyword'
                    OR kelompok.nama_kelompok = '$keyword'
                    OR mahasiswa.laporan = '$keyword'
                ");
            }else{
                $data=15;
                $result=mysqli_query($conn, "SELECT * FROM mahasiswa
                    JOIN jurusan ON mahasiswa.id_jurusan=jurusan.id_jurusan 
                    JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                    JOIN kelompok ON mahasiswa.id_kelompok=kelompok.id_kelompok
                    JOIN status ON mahasiswa.id_status=status.id_status 
                    WHERE mahasiswa.id_status=1
                    OR mahasiswa.id_status=2
                ");
                $total=mysqli_num_rows($result);
                $total_page=ceil($total/$data);
                $page=(isset($_GET['page']))?$_GET['page']:1;
                $awalData=($data*$page)-$data;
                $mahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa
                    JOIN jurusan ON mahasiswa.id_jurusan=jurusan.id_jurusan 
                    JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                    JOIN kelompok ON mahasiswa.id_kelompok=kelompok.id_kelompok
                    JOIN status ON mahasiswa.id_status=status.id_status 
                    WHERE mahasiswa.id_status=1
                    OR mahasiswa.id_status=2
                    LIMIT $awalData, $data
                ");
            }
            if(isset($_POST['view-from-mhs'])){
                $_SESSION['id_mhs']=$_POST['id_mhs'];
                $_SESSION['nim']=$_POST['nim'];
                $_SESSION['akses-mhs']=1;
                header("Location: peserta-edit");
                exit();
            }
            if(isset($_POST['close-check-nim'])){
                unset($_SESSION['id_mhs']);
                unset($_SESSION['nim']);
                unset($_SESSION['akses-mhs']);
                header("Location: peserta");
                exit();
            }
            if(isset($_POST['check-nim'])){
                $nim=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['nim']))));
                if(isset($_SESSION['nim'])){
                    $nim_hash=$_SESSION['nim'];
                    if($nim==$nim_hash){
                        unset($_SESSION['nim']);
                        unset($_SESSION['akses-mhs']);
                        $_SESSION['message-success']="Silakan edit data kamu dengan benar yah.";
                        header("Location: peserta-edit");
                        exit;
                    }else if($nim!=$nim_hash){
                        $_SESSION['message-danger']="Maaf, NIM yang kamu masukan salah. Coba ulangi!";
                        header("Location: peserta-edit");
                        exit;
                    }
                }
            }
            if(isset($_SESSION['id_mhs'])){
                $id_mhs=$_SESSION['id_mhs'];
                $mahasiswas=mysqli_query($conn, "SELECT * FROM mahasiswa
                    JOIN jurusan ON mahasiswa.id_jurusan=jurusan.id_jurusan 
                    JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                    JOIN kelompok ON mahasiswa.id_kelompok=kelompok.id_kelompok
                    JOIN status ON mahasiswa.id_status=status.id_status 
                    WHERE mahasiswa.id_mhs=$id_mhs
                ");
            }
            if(isset($_POST['back-peserta'])){
                unset($_SESSION['id_mhs']);
                header("Location: peserta");
                exit();
            }
            if(isset($_POST['edit-mahasiswa-lagi'])){
                if(edit_mahasiswa($_POST)>0){
                    unset($_SESSION['id_mhs']);
                    $_SESSION['message-success']="Data anda berhasil di edit dan sedang di check kembali oleh admin.";
                    header("Location: peserta");
                    exit();
                }
            }
        // }
        // kelompok{
            $kelompok=mysqli_query($conn, "SELECT * FROM kelompok 
                JOIN desa ON kelompok.id_desa=desa.id_desa 
                JOIN kecamatan ON desa.id_kecamatan=kecamatan.id_kecamatan 
                JOIN kabupaten ON kecamatan.id_kabupaten=kabupaten.id_kabupaten 
                JOIN dosen ON kelompok.id_dosen=dosen.id_dosen 
                WHERE kelompok.id_desa=desa.id_desa 
                AND desa.id_kecamatan=kecamatan.id_kecamatan 
                AND kecamatan.id_kabupaten=kabupaten.id_kabupaten 
                AND kelompok.id_dosen=dosen.id_dosen 
                AND kelompok.id_kelompok>1
            ");
            if(isset($_POST['search-kelompok'])){
                $keyword=$_POST['keyword'];
                $kelompok=mysqli_query($conn, "SELECT * FROM kelompok 
                    JOIN desa ON kelompok.id_desa=desa.id_desa 
                    JOIN kecamatan ON desa.id_kecamatan=kecamatan.id_kecamatan 
                    JOIN kabupaten ON kecamatan.id_kabupaten=kabupaten.id_kabupaten 
                    JOIN dosen ON kelompok.id_dosen=dosen.id_dosen 
                    JOIN jurusan ON dosen.id_jurusan=jurusan.id_jurusan 
                    JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                    WHERE kelompok.nama_kelompok LIKE '%$keyword%' 
                    OR dosen.name LIKE '%$keyword%' 
                    OR desa.nama_desa LIKE '%$keyword%' 
                    OR kecamatan.nama_kecamatan LIKE '%$keyword%' 
                    OR kabupaten.nama_kabupaten LIKE '%$keyword%' 
                    AND kelompok.id_desa=desa.id_desa 
                    AND desa.kecamatan=kecamatan.id_kecamatan 
                    AND kecamatan.kabupaten=kabupaten.id_kabupaten 
                    AND kelompok.id_dosen=dosen.id_dosen 
                    AND kelompok.id_kelompok>1
                ");
            }
        // }
        // kelompok detail{
            if(isset($_GET['id'])){
                $id_kelompok=$_GET['id'];
                $kelompok_detail=mysqli_query($conn, "SELECT * FROM kelompok 
                    JOIN mahasiswa ON kelompok.id_kelompok=mahasiswa.id_kelompok 
                    JOIN desa ON kelompok.id_desa=desa.id_desa 
                    JOIN kecamatan ON desa.id_kecamatan=kecamatan.id_kecamatan 
                    JOIN kabupaten ON kecamatan.id_kabupaten=kabupaten.id_kabupaten 
                    JOIN dosen ON kelompok.id_dosen=dosen.id_dosen 
                    JOIN jurusan ON mahasiswa.id_jurusan=jurusan.id_jurusan 
                    JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                    WHERE kelompok.id_kelompok='$id_kelompok'
                    AND kelompok.id_kelompok=mahasiswa.id_kelompok 
                    AND kelompok.id_desa=desa.id_desa 
                    AND desa.id_kecamatan=kecamatan.id_kecamatan 
                    AND kecamatan.id_kabupaten=kabupaten.id_kabupaten 
                    AND kelompok.id_dosen=dosen.id_dosen 
                    AND mahasiswa.id_jurusan=jurusan.id_jurusan 
                    AND jurusan.id_fakultas=fakultas.id_fakultas
                    AND kelompok.id_kelompok>1
                ");
                if(isset($_POST['search-kelompok-detail'])){
                    $keyword=$_POST['keyword'];
                    $kelompok_detail=mysqli_query($conn, "SELECT * FROM kelompok 
                        JOIN mahasiswa ON kelompok.id_kelompok=mahasiswa.id_kelompok 
                        JOIN jurusan ON mahasiswa.id_jurusan=jurusan.id_jurusan 
                        JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                        JOIN desa ON kelompok.id_desa=desa.id_desa 
                        JOIN kecamatan ON desa.id_kecamatan=kecamatan.id_kecamatan 
                        JOIN kabupaten ON kecamatan.id_kabupaten=kabupaten.id_kabupaten 
                        JOIN dosen ON kelompok.id_dosen=dosen.id_dosen 
                        WHERE jurusan.nama_jurusan='$keyword' 
                        OR fakultas.nama_fakultas='$keyword' 
                        OR dosen.nama_dosen='$keyword' 
                        OR desa.nama_desa='$keyword' 
                        OR kecamatan.nama_kecamatan='$keyword' 
                        OR kabupaten.nama_kabupaten='$keyword' 
                        OR mahasiswa.nama_mhs='$keyword' 
                        OR mahasiswa.nim='$keyword' 
                        OR mahasiswa.email='$keyword' 
                        OR mahasiswa.hp='$keyword' 
                        AND kelompok.id_kelompok=mahasiswa.id_kelompok 
                        AND mahasiswa.id_jurusan=jurusan.id 
                        AND jurusan.fakultas=fakultas.id
                        AND kelompok.id_desa=desa.id 
                        AND desa.kecamatan=kecamatan.id 
                        AND kecamatan.kabupaten=kabupaten.id 
                        AND kelompok.id_dosen=dosen.id_dosen 
                        AND kelompok.id_kelompok>1
                    ");
                }
            }
        // }
        // dpl{
            $dosen=mysqli_query($conn, "SELECT * FROM dosen 
                JOIN jurusan ON dosen.id_jurusan=jurusan.id_jurusan 
                JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                WHERE dosen.id_jurusan=jurusan.id_jurusan 
                AND jurusan.id_fakultas=fakultas.id_fakultas
                AND dosen.id_dosen>4 OR dosen.id_dosen<4
            ");
            if(isset($_POST['search-dpl'])){
                $keyword=$_POST['keyword'];
                $dosen=mysqli_query($conn, "SELECT * FROM dosen 
                    JOIN jurusan ON dosen.id_jurusan=jurusan.id_jurusan 
                    JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas 
                    WHERE dosen.nip LIKE '%$keyword%'
                    OR dosen.nama_dosen LIKE '%$keyword%'
                    OR dosen.email LIKE '%$keyword%'
                    OR dosen.mobile LIKE '%$keyword%'
                    OR jurusan.nama_jurusan LIKE '%$keyword%'
                    OR fakultas.nama_fakultas LIKE '%$keyword%'
                    AND dosen.id_jurusan=jurusan.id_jurusan 
                    AND jurusan.id_fakultas=fakultas.id_fakultas
                    AND dosen.id_dosen>4 OR dosen.id_dosen<4
                ");
            }
            if(isset($_POST['tambah-dosen'])){
                if(dosen($_POST)>0){
                    $_SESSION['message-success']="Data DPL telah ditambahkan!";
                    header("Location: dosen");
                    exit;
                }
            }
        // }
        // }
    // }