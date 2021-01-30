<div class="body">
    <div class="shape__container mt-5">
        <div class="shape mb-5" style="height: 700px">
            <div class="customer__picture">
                <img src="../assets/img/selective-focus-photo-of-man-using-laptop-1438081.jpg"/>
            </div>
            <div class="text">
                <img class="logo" src="../assets/images/Spectur.svg" alt="" />
                <h4 class="font-weight-bold text-center mb-3 mt-n4" style="letter-spacing: 2px;">LOGIN</h4>
                <form action="" method="POST">
                    <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
                    <div class="form-input m-3">
                        <input type="email" name="email" placeholder="Email" class="form-control text-center" autocomplete="off" autofocus>
                    </div>
                    <div class="form-input m-3">
                        <input type="password" name="password" placeholder="Kata Sandi" class="form-control text-center" autocomplete="off">
                    </div>
                    <div class="form-input m-3 text-center"> 
                        <button type="submit" name="login" class="btn btn-light text-primary rounded-pill font-weight-bold mt-3">Login</button>
                    </div>
                    <style>.btn-style{color: #fff;border: 0;transform: none; transition: all 0.25s ease-in-out;}.btn-style:hover{color: #2966F2;border-style: solid;border-bottom-width: 3px;border-color: #1919C9; transform: scale(1.1)}</style>
                    <p>Belum punya akun atau belum terdaftar? 
                    <button type="submit" name="signup" class="btn-style btn btn-outline-light font-weight-bold">Daftar</button></p>
                </form>
            </div>
        </div>
        <div class="shape__shadow"></div>
    </div>
</div>