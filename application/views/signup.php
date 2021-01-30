<div class="body">
    <div class="shape__container mt-5">
        <div class="shape mb-5" style="height: 900px">
            <div class="customer__picture">
                <img src="../assets/img/selective-focus-photo-of-man-using-laptop-1438081.jpg"/>
            </div>
            <div class="text">
                <img class="logo" src="../assets/images/Spectur.svg" alt="" />
                <h4 class="font-weight-bold text-center mb-3 mt-n4 text-uppercase" style="letter-spacing: 2px;">Daftar</h4>
                <form action="" method="POST">
                    <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
                    <div class="form-input m-3">
                        <input type="text" name="username" placeholder="Nama Pengguna" class="form-control text-center">
                    </div>
                    <div class="form-input m-3">
                        <input type="email" name="email" placeholder="Alamat Email" class="form-control text-center">
                    </div>
                    <div class="form-input m-3">
                        <input type="password" name="password" placeholder="Kata Sandi" class="form-control text-center">
                    </div>
                    <div class="form-input m-3">
                        <select name="id_jurusan" class="form-control" required>
                            <option>Pilih Jurusan</option>
                            <?php foreach($jurusan_daftar as $row3):?>
                            <option value="<?= $row3['id_jurusan']?>"><?= $row3['nama_jurusan']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-input m-3">
                        <?php if(mysqli_num_rows($role_id)==0){?>
                        <select name="role_id" class="form-control" disabled>
                            <option>Belum ada role yang tersedia!</option>
                        </select>
                        <?php }else if(mysqli_num_rows($role_id)>0){?>
                        <select name="role_id" class="form-control">
                            <?php while($row=mysqli_fetch_assoc($role_id)){?>
                            <option value="<?= $row['role_id']?>"><?= $row['role']?></option>
                            <?php }?>
                        </select>
                        <?php }?>
                    </div>
                    <div class="form-input m-3 text-center">
                        <button type="submit" name="daftar" class="btn btn-light text-primary rounded-pill font-weight-bold mt-3">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="shape__shadow"></div>
    </div>
</div>