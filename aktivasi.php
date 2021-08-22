<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_aktivasi.php'; ?>

<?php include 'partials/main_header.php'; ?>


<div class="container mt-3 pt-5 pb-5 pr-5 pl-5">

    <div class="card justify-content-center p-3 sansserif">
        <section class="text-center pt-5 text-uppercase">
            <h3><b>Aktivasi Akun</b></h3>
        </section>
        <hr>

        <?php if (isset($error)) : ?>
            <section>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Kode yang anda masukan salah</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </section>
        <?php endif; ?>
        <?php if (isset($_COOKIE["code" . $id])) : ?>
            <section class="p-3 pr-5 pl-5 pb-5">
                <form method="post" action="">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Email :</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $_GET["email"] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kodeverif" class="col-sm-4 col-form-label">Kode Verifikasi :</label>
                        <div class="col-sm-8">
                            <input name="kodeverif" type="number" class="form-control" id="kodeverif" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;" autofocus>
                        </div>
                    </div>
                    <?php if (isset($_COOKIE["code" . $id])) : ?>
                        <div class="form-group text-right">
                            <p class="text-danger">Kode sudah dikirim</p>
                        </div>
                    <?php else : ?>
                        <div class="form-group text-right">
                            <button name="resend" type="submit" class="btn btn-link btn-sm">Kirim kode verifikasi</button>
                        </div>
                    <?php endif; ?>
                    <div class="form-group text-center">
                        <button name="verifikasi" type="submit" class="btn btn-info">Verifikasi</button>
                    </div>
                </form>
            </section>
        <?php else : ?>
            <section class="p-3 pr-5 pl-5 pb-5">
                <form method="post" action="">
                    <div class="form-group text-center">
                        <button name="resend" type="submit" class="btn btn-info btn-sm">Kirim kode verifikasi</button>
                    </div>
                </form>
            </section>
        <?php endif; ?>
    </div>
</div>


<?php include 'partials/footer.php'; ?>