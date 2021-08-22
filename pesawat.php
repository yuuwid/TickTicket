<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_pesawat.php'; ?>

<?php include 'partials/main_header.php'; ?>

<div class="jumbotron jumbotron-fluid jum-pesawat mt-5 pt-5">
    <div class="container">
        <h1 class="display-5"><b>Mau Terbang Kemana?</b></h1>
        <p class="lead">Pesan Tiket Berangkat dan Pulang pun bisa.</p>
    </div>
</div>

<div class="container pb-5" style="margin-top: -100px;">

    <div class="card p-4 pt-5 pb-5">

        <form action="" method="post">

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5">
                <div class="col form-group dropdown search-box-dari">
                    <label for="pesawatDari"><i class="fa fa-plane-departure"></i> Dari</label>
                    <input name="dari" type="text" class="form-control" id="pesawatDari" placeholder="Kota Berangkat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" autocomplete="off" required value="<?php echo (isset($_POST['dari'])) ? $_POST["dari"] : '' ?>">

                    <div class="dropdown-menu data-search-dari" aria-labelledby="dropdownDari">

                    </div>
                </div>

                <div class="col form-group dropdown search-box-ke">
                    <label for="pesawatKe"><i class="fa fa-plane-arrival"></i> Ke</label>
                    <input name="tujuan" type="text" class="form-control" id="pesawatKe" placeholder="Kota Tujuan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" autocomplete="off" required value="<?php echo (isset($_POST['tujuan'])) ? $_POST["tujuan"] : '' ?>">

                    <div class="dropdown-menu data-search-ke" aria-labelledby="dropdownKe">
                    </div>
                </div>

                <div class="col form-group search-box-ke">
                    <label for="tanggalBerangkat"><i class="fa fa-calendar-check"></i> Berangkat</label>
                    <input name="berangkat" type="date" class="form-control" id="tanggalBerangkat" required value="<?php echo (isset($_POST['berangkat'])) ? $_POST["berangkat"] : '' ?>">
                </div>

                <div class="col form-group search-box-ke">
                    <section>
                        <input name="pulangcheck" type="checkbox" id="pulangcb" <?php echo (isset($_POST['pulangcheck'])) ? 'checked' : '' ?>>

                        <label for="tanggalPulang"><i class="fa fa-calendar-check"></i> Pulang</label>

                        <input name="pulang" type="date" class="form-control" <?php echo (isset($_POST['pulangcheck'])) ? '' : 'readonly' ?> id="tanggalPulang" value="<?php echo (isset($_POST['pulang'])) ? $_POST["pulang"] : '' ?>">
                    </section>
                </div>

                <div class="col col-md-12 form-group dropdown search-box-ke">
                    <label for="kelas-penumpang"><i class="fa fa-paperclip"></i> Penumpang</label>

                    <div class="d-flex">
                        <input name="penumpang" type="number" class="form-control" id="penumpang" placeholder="Jumlah Penumpang" min="1" max="7" value="1" required value="<?php echo (isset($_POST['penumpang'])) ? $_POST["penumpang"] : '' ?>">
                    </div>

                </div>
            </div>
            <div class="text-right">

                <button id="caritiket" name="cari" type="submit" class="btn btn-info ">Cari <i class="fa fa-paper-plane"></i></button>
            </div>
        </form>

    </div>

    <!-- Pilih Tiket -->
    <?php if (isset($data_tikets)) : ?>
        <div class="card p-5 mt-2">
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2">

                <?php foreach ($data_tikets as $tiket) : ?>
                    <div class="col card p-3">
                        <div class="text-right">
                            <img src="assets/img/<?= $tiket['logo'] ?>" class="text-right" width="100">
                        </div>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td><b>Maskapai</b></td>
                                <td><?= $tiket['maskapai'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Dari</b></td>
                                <td><?= $tiket['dari'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Tujuan</b></td>
                                <td><?= $tiket['tujuan'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Berangkat</b></td>
                                <td><?= $tiket['berangkat'] . ' ' . $tiket['jam_berangkat'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Harga</b></td>
                                <td><?= rupiah($tiket['harga']) ?></td>
                            </tr>
                        </table>
                        <form method="POST" action="" class="text-right">
                            <?php if (isset($_POST['pilihpulang'])) : ?>
                                <input type="hidden" name="idp" value="<?= $tiket['id'] ?>">
                                <input type="hidden" name="idb" value="<?= $_POST['idb'] ?>">
                            <?php else : ?>
                                <input type="hidden" name="idb" value="<?= $tiket['id'] ?>">
                            <?php endif; ?>
                            <button type="submit" class="btn btn-link" name="<?php echo (isset($_POST["pulangcheck"])) ? 'pilihpulang' : 'end' ?>">Pilih <i class="fa fa-caret-right"></i></button>
                        </form>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    <?php endif; ?>



    <!-- Checkou -->
    <?php if (isset($checkout1)) : ?>
        <div class="card p-3 mt-3">
            <h5 class="text-center text-uppercase mt-3"><b>Checkout</b></h5>
            <hr>
            <div class="row row-cols-<?php echo (isset($checkout2)) ? '2' : '1' ?> pl-4 pr-4">
                <div class="card col p-2">
                    <section class="text-right">
                        <img src="assets/img/garuda-indonesia.png" width="120">
                    </section>
                    <section>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td><b>Maskapai</b></td>
                                <td><?= $checkout1['maskapai'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Dari</b></td>
                                <td><?= $checkout1['dari'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Tujuan</b></td>
                                <td><?= $checkout1['tujuan'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Berangkat</b></td>
                                <td><?= $checkout1['berangkat'] . ' ' . $checkout1['jam_berangkat'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Harga</b></td>
                                <td><?= rupiah($checkout1['harga']) ?></td>
                            </tr>
                        </table>
                    </section>
                </div>
                <?php if (isset($checkout2)) : ?>
                    <div class="card col p-2">
                        <section class="text-right">
                            <img src="assets/img/garuda-indonesia.png" width="120">
                        </section>
                        <section>
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <td><b>Maskapai</b></td>
                                    <td><?= $checkout1['maskapai'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Dari</b></td>
                                    <td><?= $checkout1['dari'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tujuan</b></td>
                                    <td><?= $checkout1['tujuan'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Berangkat</b></td>
                                    <td><?= $checkout1['berangkat'] . ' ' . $checkout1['jam_berangkat'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Harga</b></td>
                                    <td><?= rupiah($checkout2['harga']) ?></td>
                                </tr>
                            </table>
                        </section>
                    </div>
                <?php endif; ?>
            </div>

            <h5 class="text-center text-uppercase mt-4"><b>TOTAL</b></h5>
            <hr>
            <div class="container card p-3">
                <section class="tiket1">
                    <table class="table table-borderless table-sm">
                        <tr>
                            <td><b>Harga</b></td>
                            <td><?= rupiah($checkout1['harga']) ?></td>
                            <?php if(isset($checkout2)): ?>
                            <td><b>Harga</b></td>
                            <td><?= rupiah($checkout2['harga']) ?></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td colspan="<?php echo (isset($checkout2)) ? '1' : '1' ?>"><b>Jumlah</b></td>
                            <td colspan="<?php echo (isset($checkout2)) ? '2' : '1' ?>"><?= $penumpang ?> Orang</td>
                        </tr>
                        <tr>
                            <td><b>Total</b></td>
                            <td><?= rupiah($penumpang * $checkout1['harga']) ?></td>
                            <?php if(isset($checkout2)): ?>
                            <td><b>Total</b></td>
                            <td><?= rupiah($penumpang * $checkout2['harga']) ?></td>
                            <?php endif; ?>
                        </tr>
                            <td><b>Diskon</b></td>
                            <td><?= rupiah(0) ?></td>
                        </tr>
                        <tr>
                            <td colspan="<?php echo (isset($checkout2)) ? '1' : '1' ?>"><b>Bayar</b></td>
                            <td colspan="<?php echo (isset($checkout2)) ? '2' : '1' ?>"><b><?= rupiah(($penumpang * $checkout1['harga']) + (isset($checkout2) ? $penumpang * $checkout2['harga'] : 0)) ?></b></td>
                        </tr>
                    </table>
                </section>
            </div>


            <h5 class="text-center text-uppercase mt-4"><b>BIODATA</b></h5>
            <hr>
            <div class="container card p-3">
                <form method="POST" action="checkout.php?jenis=Tiket%20Pesawat">
                    <input name="idb" type="hidden" value="<?= $id_tiket_berangkat ?>">
                    <input name="idp" type="hidden" value="<?= $id_tiket_pulang ?>">
                    <input name="penumpang" type="hidden" value="<?= $penumpang ?>">
                    <input name="totalbayar" type="hidden" value="<?= ($penumpang * $checkout1['harga']) + (isset($checkout2) ? $penumpang * $checkout2['harga'] : 0) ?>">
                    <div class="form-group">
                        <label for="inputNama">Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" id="inputNama" value="<?= $data['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputNIK">NIK</label>
                        <input name="nik" type="text" class="form-control" id="inputNIK" value="<?php echo ($data['nik'] != '-') ? $data['nik'] : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAlamat">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="inputAlamat" value="<?php echo ($data['alamat'] != '-') ? $data['alamat'] : '' ?>" required>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputKota">Kota</label>
                            <input name="kota" type="text" class="form-control" id="inputKota" value="<?php echo ($data['kota'] != '-') ? $data['kota'] : '' ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputProvinsi">Provinsi</label>
                            <input name="alamat" type="text" class="form-control" id="inputProvinsi" value="<?php echo ($data['provinsi'] != '-') ? $data['provinsi'] : '' ?>" required>

                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputKodepos">Kode Pos</label>
                            <input name="kodepos" type="text" class="form-control" id="inputKodepos" value="<?php echo ($data['kodepos'] != '-') ? $data['kodepos'] : '' ?>" required>
                        </div>
                    </div>
                    <div class="text-right">
                        <button name="bayar" type="submit" class="btn btn-info">Bayar</button>
                    </div>
                </form>
            </div>

        </div>

    <?php endif; ?>
</div>


<?php include 'partials/footer.php'; ?>