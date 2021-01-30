<?php if($_SESSION['role-id']==1){if(mysqli_num_rows($my_account_user)){while($row1=mysqli_fetch_assoc($my_account_user)){?>
<div class="container-fluid mt-5 mb-5 m-0 p-0">
    <div class="col-md-12 mt-4">
        <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h6>My Profile</h6><hr>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Username</td>
                                    <th>: <?= $row1['username']?></th>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <th>: <?= $row1['email']?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h6>Ubah Profile</h6><hr>
                    <form action="" method="POST">
                        <input type="hidden" name="id_user" value="<?= $row1['id_user']?>">
                        <div class='form-group'>
                            <input type="text" name="username" placeholder="Username" class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <button type="submit" name="edit-profile" class="btn btn-primary btn-sm">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }}}else if($_SESSION['role-id']==2){if(mysqli_num_rows($my_account_dosen)){while($row2=mysqli_fetch_assoc($my_account_dosen)){?>
<div class="container-fluid mt-5 mb-5 m-0 p-0">
    <div class="col-md-12 mt-4">
        <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h6>My Profile</h6><hr>
                    <div class="col-md-10">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>NIP</td>
                                    <th>: <?= $row2['nip']?></th>
                                </tr>
                                <tr>
                                    <td>Nama Dosen</td>
                                    <th>: <?= $row2['nama_dosen']?></th>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <th>: <?= $row2['email']?></th>
                                </tr>
                                <tr>
                                    <td>No Handphone</td>
                                    <th>: <?= $row2['no_hp']?></th>
                                </tr>
                                <tr>
                                    <td>Fakultas</td>
                                    <th>: <?= $row2['nama_fakultas']?></th>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <th>: <?= $row2['nama_jurusan']?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h6>Ubah Profile</h6><hr>
                    <form action="" method="POST">
                        <input type="hidden" name="id_dosen" value="<?= $row2['id_dosen']?>">
                        <div class='form-group'>
                            <input type="number" name="nip" placeholder="NIP" class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <input type="text" name="name" placeholder="Nama" class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <input type="number" name="mobile" placeholder="Nomor Handphone" class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <select name="jurusan" class="form-control" required>
                                <option>Pilih Jurusan</option>
                                <?php foreach($jurusan as $row3):?>
                                <option value="<?= $row3['id_jurusan']?>"><?= $row3['nama_jurusan']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class='form-group'>
                            <button type="submit" name="edit-profile" class="btn btn-primary btn-sm">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }}}?>






                    