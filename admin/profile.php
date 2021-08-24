<?php require_once 'core/init.php'; ?>

<?php require_once '../a_profile.php'; ?>

<?php include '../partials/admin_header.php'; ?>

<div class="container mt-5 pt-5 pb-5 pr-5 pl-5">

    <div class="card justify-content-center p-3 sansserif">

        <?php if ($data['status'] == 0) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Akun anda masih belum aktif.</strong> klik <a href="aktivasi.php?email=<?= $data['email'] ?>">disini</a> untuk melakukan aktivasi akun.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                <?php if ($error == NOFILE_ERROR) : ?>
                    <strong>Tidak ada file yang di upload.</strong>
                <?php elseif ($error == TYPEFILE_ERROR) : ?>
                    <strong>Foto harus berupa JPG, JPEG atau PNG!</strong>
                <?php elseif ($error == SIZEFILE_ERROR) : ?>
                    <strong>Maksimum size 2MB!</strong>

                <?php endif; ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="row row-cols-1 row-cols-md-2">
            <section class="col col-md-3 col-lg-2 mt-3 p-2 text-center">
                <div class="container text-center">
                    <img src="../assets/img/<?= $data['foto'] ?>" alt="" class="rounded-circle" width="120" height="120">
                </div>
                <a class="btn btn-link" data-toggle="modal" data-target="#uploadfoto">
                    <small>Ubah Foto</small>
                </a>
            </section>
            <section class="col col-md-9 col-lg-10 mt-3 p-4">
                <h5><b>Profile</b></h5>
                <hr>

                <section class="row row-cols-1 row-cols-md-2 mb-3">
                    <div class="col col-md-4 col-lg-3">
                        <b>Nama</b>
                    </div>
                    <div class="col col-md-8 col-lg-9">
                        <?= $data['nama'] ?>
                    </div>
                </section>
                <section class="row row-cols-1 row-cols-md-2 mb-3">
                    <div class="col col-md-4 col-lg-3">
                        <b>Kelamin</b>
                    </div>
                    <div class="col col-md-8 col-lg-9">
                        <?= $data['kelamin'] ?>
                    </div>
                </section>
                <section class="row row-cols-1 row-cols-md-2 mb-3">
                    <div class="col col-md-4 col-lg-3">
                        <b>Alamat</b>
                    </div>
                    <div class="col col-md-8 col-lg-9">
                        <?= $data['alamat'] ?>
                    </div>
                </section>
                <section class="row row-cols-1 row-cols-md-2 mb-3">
                    <div class="col col-md-4 col-lg-3">
                        <b>Kota</b>
                    </div>
                    <div class="col col-md-8 col-lg-9">
                        <?= $data['kota'] ?>
                    </div>
                </section>
                <section class="row row-cols-1 row-cols-md-2 mb-3">
                    <div class="col col-md-4 col-lg-3">
                        <b>Provinsi</b>
                    </div>
                    <div class="col col-md-8 col-lg-9">
                        <?= $data['provinsi'] ?>
                    </div>
                </section>
                <section class="row row-cols-1 row-cols-md-2 mb-3">
                    <div class="col col-md-4 col-lg-3">
                        <b>Kode Pos</b>
                    </div>
                    <div class="col col-md-8 col-lg-9">
                        <?= $data['kodepos'] ?>
                    </div>
                </section>
                <section class="row row-cols-1 row-cols-md-2 mb-3">
                    <div class="col col-md-4 col-lg-3">
                        <b>NIK</b>
                    </div>
                    <div class="col col-md-8 col-lg-9">
                        <?= $data['nik'] ?>
                    </div>
                </section>


                <hr>


                <section class="row row-cols-1 row-cols-md-2 mb-3">
                    <div class="col col-md-4 col-lg-3">
                        <b>Username</b>
                    </div>
                    <div class="col col-md-8 col-lg-9">
                        @<?= $data['username'] ?>
                    </div>
                </section>
                <section class="row row-cols-1 row-cols-md-2 mb-3">
                    <div class="col col-md-4 col-lg-3">
                        <b>Email</b>
                    </div>
                    <div class="col col-md-8 col-lg-9">
                        <?= $data['email'] ?>
                    </div>
                </section>
            </section>

        </div>
        <section class="text-center">
            <button class="btn btn-info" data-toggle="modal" data-target="#editprofile">Edit</button>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </section>


    </div>
</div>

<!-- Modal Upload Foto -->
<div class="modal fade" id="uploadfoto" tabindex="-1" aria-labelledby="uploadfotoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadfotoLabel">Upload foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="uploadfile">Upload foto anda disini</label>
                        <input name="foto" type="file" class="form-control-file" id="uploadfile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Profile -->
<div class="modal fade" id="editprofile" tabindex="-1" aria-labelledby="editprofileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editprofileLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="editNama">Nama</label>
                        <input name="nama" type="text" class="form-control" id="editNama" aria-describedby="emailHelp" value="<?= $data['nama'] ?>" autocomplete="off" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="editKelamin">Kelamin</label>
                        <select name="kelamin" class="form-control" id="editKelamin">
                            <option <?php echo ($data['kelamin'] == 'Laki-Laki') ? 'selected':'' ?> >Laki-Laki</option>
                            <option <?php echo ($data['kelamin'] == 'Perempuan') ? 'selected':'' ?> >Perempuan</option>
                            <option>Tidak ingin menyebutkan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editAlamat">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="editAlamat" aria-describedby="emailHelp" value="<?= $data['alamat'] ?>" autocomplete="off">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputKota">Kota</label>
                            <input name="kota" type="text" class="form-control" id="inputKota" value="<?= $data['kota'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputProvinsi">Provinsi</label>
                            <input name="provinsi" type="text" class="form-control" id="inputProvinsi" value="<?= $data['provinsi'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputKodepos">Kodepos</label>
                            <input name="kodepos" type="text" class="form-control" id="inputKodepos" value="<?= $data['kodepos'] ?>"">
                        </div>
                    </div>
                    <div class=" input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">NIK</div>
                        </div>
                        <input name="nik" type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="NIK" value="<?= $data['nik'] ?>">
                    </div>

                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button name="simpanprofil" type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php include '../partials/admin_footer.php'; ?>