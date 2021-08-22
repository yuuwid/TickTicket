<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_register.php'; ?>

<?php include 'partials/auth_header.php'; ?>


<div class="container mt-5 pt-5 pb-5">

    <div class="card justify-content-center p-3 sansserif">

        <section class="text-center pt-4">
            <h1><b>DAFTAR</b></h1>
        </section>

        
        <?php if(isset($sukses)): ?>
        <section class="sukses pl-5 pr-5 pt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Akun berhasil didaftarkan.</strong> Silakan login <a href="login.php">disini.</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </section>
        <?php endif; ?>
        
        <?php if(isset($error)): ?>
        <section class="error pl-5 pr-5 pt-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php if( $error == UNAME_ERROR ): ?>
                    <strong>Username sudah dipakai!</strong> Harap gunakan username yang lain!
                <?php elseif( $error == PASS_ERROR ): ?>
                    <strong>Konfirmasi Password tidak sesuai!</strong> Harap cek kembali!
                <?php elseif( $error == EMAIL_ERROR ): ?>
                    <strong>Email sudah dipakai di akun lain!</strong> Harap gunakan email yang lain!
                <?php endif; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </section>
        <?php endif; ?>

        <section class="pl-5 pr-5 pt-4 pb-2">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" type="text" class="form-control" id="nama" autocomplete="off" autofocus
                    value="<?php if( isset($_POST['reg']) ){ echo $_POST['nama']; } ?>" required >
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="form-control <?php if( isset($error) ){ echo $error==UNAME_ERROR ? 'is-invalid': '';} ?>" id="username" autocomplete="off" 
                    value="<?php if( isset($_POST['reg']) ){ echo $_POST['username']; } ?>" required  >
                </div>
                <div class="form-group">
                    <label for="rpassword">Password</label>
                    <input name="password" type="password" class="form-control <?php if( isset($error) ){ echo $error==PASS_ERROR ? 'is-invalid': '';} ?>" id="rpassword"
                    value="<?php if( isset($_POST['reg']) ){ echo $_POST['password']; } ?>" required >
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input name="password2" type="password" class="form-control <?php if( isset($error) ){ echo $error==PASS_ERROR ? 'is-invalid': '';} ?>" id="password2"
                    value="<?php if( isset($_POST['reg']) ){ echo $_POST['password2']; } ?>" required >
                </div>
                <div class="form-group form-check text-right">
                    <input type="checkbox" class="form-check-input" id="showpass">
                    <label class="form-check-label" for="showpass">Tampilkan password</label>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control <?php if( isset($error) ){ echo $error==EMAIL_ERROR ? 'is-invalid': '';} ?>" id="email" autocomplete="off" autofocus
                    value="<?php if( isset($_POST['reg']) ){ echo $_POST['email']; } ?>" required>
                </div>

                <button name="reg" type="submit" class="btn bg-red text-light">Daftar <i class="fa fa-chevron-right"></i></button>
            </form>
        </section>
        <section class="pl-5 pt-3 pb-4">
            <p>Sudah Punya akun? <br><a href="login.php">Login disini.</a></p>
        </section>
    </div>
</div>


<?php include 'partials/footer.php'; ?>