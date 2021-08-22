<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_login.php'; ?>

<?php include 'partials/auth_header.php'; ?>

<div class="container mt-5 pt-5 pb-5">

    <div class="card justify-content-center p-3 sansserif">

        <section class="text-center pt-4">
            <h1><b>LOGIN</b></h1>
        </section>
        
        <?php if(isset($error)): ?>
        <section class="error pl-5 pr-5 pt-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password anda salah!</strong> Harap cek kembali!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </section>
        <?php endif; ?>

        <section class="pl-5 pr-5 pt-4 pb-2">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="form-control <?php if( isset($error)){ echo "is-invalid";} ?>" id="username" autocomplete="off" autofocus value="<?php if( isset($_POST['login']) ){ echo $_POST['username']; } ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control <?php if( isset($error)){ echo "is-invalid";} ?>" id="password" value="<?php if( isset($_POST['login']) ){ echo $_POST['password']; } ?>" required>
                </div>
                <div class="form-group form-check text-right">
                    <input type="checkbox" class="form-check-input" id="showpass">
                    <label class="form-check-label" for="showpass">Tampilkan password</label>
                </div>
                <div class="form-group form-check">
                    <input name="rememberme" type="checkbox" class="form-check-input" id="rememberme">
                    <label class="form-check-label" for="rememberme">Ingat saya ?</label>
                </div>
                <button name="login" type="submit" class="btn bg-red text-light">Login <i class="fa fa-chevron-right"></i></button>
            </form>
        </section>
        <section class="pl-5 pt-3 pb-4">
            <p>Belum Punya akun? <br><a href="register.php">Daftar disini.</a></p>
            
        </section>
    </div>
</div>



<?php include 'partials/footer.php'; ?>