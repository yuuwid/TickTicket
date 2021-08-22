<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_tiketku_detail.php'; ?>

<?php include 'partials/main_header.php'; ?>



<div class="container pb-5 mt-5 pt-5">
    <div class="card p-4">
        <p><a href="tiketku.php"><i class="fa fa-angle-left"></i> kembali</a></p>
        <h4><b>Detail Transaksi</b></h4>

        <div class="card p-3">
            <div class="row row-cols-1 row-cols-md-2">
                <p class="col col-5 col-md-4 col-lg-3"><b>ID Transaksi</b></p>
                <p class="col col-7 col-md-8 col-lg-9"><?= $data_history['id'] ?></p>

                <p class="col col-5 col-md-4 col-lg-3"><b>Jenis</b></p>
                <p class="col col-7 col-md-8 col-lg-9"><?= $data_history['jenis'] ?></p>

                <p class="col col-5 col-md-4 col-lg-3"><b>Tanggal Transaksi</b></p>
                <p class="col col-7 col-md-8 col-lg-9"><?= $data_history['tanggal_transaksi'] ?></p>

                <p class="col col-5 col-md-4 col-lg-3"><b>Total Transaksi</b></p>
                <p class="col col-7 col-md-8 col-lg-9"><?= rupiah($data_history['total_bayar']) ?></p>
            </div>
        </div>
        <div class="p-3 mt-2">

            <div class="row row-cols-1 row-cols-md-<?php echo ($data_tiket2 == null ? "1" : "2") ?>">
                <section class="p-3 card">
                    <h5 class="text-center">Berangkat</h5>
                    <hr>
                    <div class="text-center">
                        <img src="assets/img/<?= $data_tiket1['logo'] ?>" width="120" </div>
                        <table class="table table-borderless table-sm mt-3 text-left">
                            <tr>
                                <?php if ($data_history['jenis'] == 'Tiket Pesawat') : ?>
                                    <td><b>Maskapai</b></td>
                                    <td><?= $data_tiket1['maskapai'] ?></td>
                                <?php else : ?>
                                    <td><b>Kereta</b></td>
                                    <td><?= $data_tiket1['kereta'] ?></td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td><b>Dari</b></td>
                                <td><?= $data_tiket1['dari'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Tujuan</b></td>
                                <td><?= $data_tiket1['tujuan'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Berangkat</b></td>
                                <td><?= $data_tiket1['berangkat'] ?> <?= $data_tiket1['jam_berangkat'] ?></td>
                            </tr>
                        </table>
                </section>
                <?php if ($data_tiket2 != null) : ?>
                    <section class="p-3 card">
                        <h5 class="text-center">Pulang</h5>
                        <hr>
                        <div class="text-center">
                            <img src="assets/img/<?= $data_tiket2['logo'] ?>" width="120" </div>
                            <table class="table table-borderless table-sm mt-3 text-left">
                                <tr>
                                    <?php if ($data_history['jenis'] == 'Tiket Pesawat') : ?>
                                        <td><b>Maskapai</b></td>
                                        <td><?= $data_tiket1['maskapai'] ?></td>
                                    <?php else : ?>
                                        <td><b>Kereta</b></td>
                                        <td><?= $data_tiket1['kereta'] ?></td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <td><b>Dari</b></td>
                                    <td><?= $data_tiket2['dari'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tujuan</b></td>
                                    <td><?= $data_tiket2['tujuan'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Berangkat</b></td>
                                    <td><?= $data_tiket2['berangkat'] ?> <?= $data_tiket2['jam_berangkat'] ?></td>
                                </tr>
                            </table>
                    </section>
                <?php endif; ?>
            </div>
        </div>

        <div class="text-center">
            <a href="tiketku_cetak.php?id=<?= $data_history['id'] ?>" class="btn btn-info"><i class="fa fa-print mr-1"></i> Cetak</a>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>