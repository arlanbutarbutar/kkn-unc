<?php require_once("connect_view_db.php");
    $tgl_sekarang=date('Y-m-d');
    $mahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa JOIN jurusan ON mahasiswa.id_jurusan=jurusan.id_jurusan JOIN fakultas ON jurusan.id_fakultas=fakultas.id_fakultas JOIN kelompok ON mahasiswa.id_kelompok=kelompok.id_kelompok WHERE mahasiswa.tgl_daftar='$tgl_sekarang' ORDER BY id_mhs ASC LIMIT 5");
    if(mysqli_num_rows($mahasiswa)==0){
?>
<p class="text-dark text-center font-weight-bold">Belum ada Peserta KKN baru hari ini.</p>
<?php }else if(mysqli_num_rows($mahasiswa)>0){while($row=mysqli_fetch_assoc($mahasiswa)){?>
    <blockquote class="blockquote mb-2">
        <p class="small"><span class="badge badge-success">Baru</span> <?= "(".$row['nim'].") ".$row['nama_mhs']." - ".$row['nama_fakultas']." ".$row['nama_jurusan'].", Semester ".$row['semester'].", SKS yang telah tercapai ".$row['sks']."."?></p>
        <footer class="blockquote-footer"><cite title="Source Title small"><?= $row['email']?></cite></footer>
    </blockquote><hr>
<?php }}?>