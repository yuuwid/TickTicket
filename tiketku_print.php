<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_tiketku_cetak.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <style>
    </style>
</head>

<body>
    <!-- <?php var_dump($data_history) ?>
    <?php var_dump($data_hotel) ?>
    <?php var_dump($data_kamar) ?> -->
    <?php if (($data_history['jenis']) == 'Tiket Pesawat' || ($data_history['jenis']) == 'Tiket Kereta Api') : ?>
        <?php foreach ($data_penumpang as $penumpang) : ?>
            <?php
            if ($data_history['jenis'] == 'Tiket Pesawat') {
                $ggg = 'GATE';
            } else if ($data_history['jenis'] == 'Tiket Kereta Api') {
                $ggg = 'WAGON';
            }
            ?>
            <div class="card p-2">
                <div class="row row-cols-2">
                    <div class="col col-8">
                        <section class="text-right">
                            <img src="assets/img/<?= $data_tiket1['logo'] ?>" width="120">
                            <div class="dropdown-divider"></div>
                        </section>
                        <section class="row row-cols-3 p-2">

                            <div class="col">
                                <p class="m-0"><small><i>NAME</i></small></p>
                                <h6 class="m-0 pb-4 text-uppercase"><?= $penumpang['nama_lengkap'] ?></h6>
                            </div>

                            <div class="col">
                                <p class="m-0"><small><i><?= $ggg ?></i></small></p>
                                <h6 class="m-0 pb-4 text-uppercase"><?= $penumpang['grup'] ?></h6>
                            </div>

                            <div class="col">
                                <p class="m-0"><small><i>SEAT</i></small></p>
                                <h6 class="m-0 pb-4 text-uppercase"><?= $penumpang['seat'] ?></h6>
                            </div>


                            <?php if ($data_history['jenis'] == 'Tiket Pesawat') : ?>
                                <div class="col">
                                    <p class="m-0"><small><i>NO FLIGHT</i></small></p>
                                    <h6 class="m-0 pb-4 text-uppercase"><?= $data_tiket1['kode_penerbangan'] ?></h6>
                                </div>

                            <?php endif; ?>

                            <div class="col">
                                <p class="m-0"><small><i>FROM</i></small></p>
                                <h6 class="m-0 pb-4 text-uppercase"><?= $data_tiket1['dari'] ?></h6>
                            </div>

                            <div class="col">
                                <p class="m-0"><small><i>TO</i></small></p>
                                <h6 class="m-0 pb-4 text-uppercase"><?= $data_tiket1['tujuan'] ?></h6>
                            </div>



                            <div class="col">
                                <p class="m-0"><small><i>DATE</i></small></p>
                                <h6 class="m-0 pb-4 text-uppercase"><?= $data_tiket1['berangkat'] ?></h6>
                            </div>

                            <div class="col">
                                <p class="m-0"><small><i>TIME</i></small></p>
                                <h6 class="m-0 pb-4 text-uppercase"><?= $data_tiket1['jam_berangkat'] ?></h6>
                            </div>

                            <div class="col pt-3">
                                <?= $generator->getBarcode($penumpang['nik'], $generator::TYPE_CODE_128) ?>
                            </div>

                        </section>
                    </div>
                    <div class="col col-4" style="border-left: dashed gray; border-width: 1px;">
                        <section class="text-right">
                            <img src="assets/img/<?= $data_tiket1['logo'] ?>" width="120">
                            <div class="dropdown-divider"></div>
                        </section>
                        <section class="">
                            <div class="row row-cols-2">
                                <p class="col col-4 m-0"><small><i>NAME</i></small></p>
                                <h6 class="col m-0 text-uppercase"><small><?= $penumpang['nama_lengkap'] ?></small></h6>

                                <?php if ($data_history['jenis'] == 'Tiket Pesawat') : ?>
                                    <p class="col col-4 m-0"><small><i>NO FLIGHT</i></small></p>
                                    <h6 class="col m-0 text-uppercase"><small><?= $data_tiket1['kode_penerbangan'] ?></small></h6>
                                <?php endif; ?>

                                <p class="col col-4 m-0"><small><i>FROM</i></small></p>
                                <h6 class="col m-0 text-uppercase"><small><?= $data_tiket1['dari'] ?></small></h6>

                                <p class="col col-4 m-0"><small><i>TO</i></small></p>
                                <h6 class="col m-0 text-uppercase"><small><?= $data_tiket1['tujuan'] ?></small></h6>

                                <p class="col col-4 m-0"><small><i><?= $ggg ?></i></small></p>
                                <h6 class="col m-0 text-uppercase"><small><?= $penumpang['grup'] ?></small></h6>

                                <p class="col col-4 m-0"><small><i>SEAT</i></small></p>
                                <h6 class="col m-0 text-uppercase"><small><?= $penumpang['seat'] ?></small></h6>

                                <p class="col col-4 m-0"><small><i>TIME</i></small></p>
                                <h6 class="col m-0 text-uppercase"><small><?= $data_tiket1['berangkat'] ?> <?= $data_tiket1['jam_berangkat'] ?> </small></h6>

                            </div>
                            <div class="d-flex justify-content-end pr-2">
                                <?= $generator->getBarcode($penumpang['nik'], $generator::TYPE_CODE_128) ?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        <?php if ($data_tiket2 != null) : ?>
            <?php foreach ($data_penumpang as $penumpang) : ?>
                <div class="card p-2">
                    <div class="row row-cols-2">
                        <div class="col col-8">
                            <section class="text-right">
                                <img src="assets/img/<?= $data_tiket2['logo'] ?>" width="120">
                                <div class="dropdown-divider"></div>
                            </section>
                            <section class="row row-cols-3 p-2">

                                <div class="col">
                                    <p class="m-0"><small><i>NAME</i></small></p>
                                    <h6 class="m-0 pb-4 text-uppercase"><?= $penumpang['nama_lengkap'] ?></h6>
                                </div>

                                <div class="col">
                                    <p class="m-0"><small><i><?= $ggg ?></i></small></p>
                                    <h6 class="m-0 pb-4 text-uppercase"><?= $penumpang['grup'] ?></h6>
                                </div>

                                <div class="col">
                                    <p class="m-0"><small><i>SEAT</i></small></p>
                                    <h6 class="m-0 pb-4 text-uppercase"><?= $penumpang['seat'] ?></h6>
                                </div>


                                <?php if ($data_history['jenis'] == 'Tiket Pesawat') : ?>
                                    <div class="col">
                                        <p class="m-0"><small><i>NO FLIGHT</i></small></p>
                                        <h6 class="m-0 pb-4 text-uppercase"><?= $data_tiket2['kode_penerbangan'] ?></h6>
                                    </div>
                                <?php endif; ?>


                                <div class="col">
                                    <p class="m-0"><small><i>FROM</i></small></p>
                                    <h6 class="m-0 pb-4 text-uppercase"><?= $data_tiket2['dari'] ?></h6>
                                </div>

                                <div class="col">
                                    <p class="m-0"><small><i>TO</i></small></p>
                                    <h6 class="m-0 pb-4 text-uppercase"><?= $data_tiket2['tujuan'] ?></h6>
                                </div>



                                <div class="col">
                                    <p class="m-0"><small><i>DATE</i></small></p>
                                    <h6 class="m-0 pb-4 text-uppercase"><?= $data_tiket2['berangkat'] ?></h6>
                                </div>

                                <div class="col">
                                    <p class="m-0"><small><i>TIME</i></small></p>
                                    <h6 class="m-0 pb-4 text-uppercase"><?= $data_tiket2['jam_berangkat'] ?></h6>
                                </div>

                                <div class="col pt-3">
                                    <?= $generator->getBarcode($penumpang['nik'], $generator::TYPE_CODE_128) ?>
                                </div>

                            </section>
                        </div>
                        <div class="col col-4" style="border-left: dashed gray; border-width: 1px;">
                            <section class="text-right">
                                <img src="assets/img/<?= $data_tiket2['logo'] ?>" width="120">
                                <div class="dropdown-divider"></div>
                            </section>
                            <section class="">
                                <div class="row row-cols-2">
                                    <p class="col col-4 m-0"><small><i>NAME</i></small></p>
                                    <h6 class="col m-0 text-uppercase"><small><?= $penumpang['nama_lengkap'] ?></small></h6>

                                    <?php if ($data_history['jenis'] == 'Tiket Pesawat') : ?>
                                        <p class="col col-4 m-0"><small><i>NO FLIGHT</i></small></p>
                                        <h6 class="col m-0 text-uppercase"><small><?= $data_tiket2['kode_penerbangan'] ?></small></h6>
                                    <?php endif; ?>

                                    <p class="col col-4 m-0"><small><i>FROM</i></small></p>
                                    <h6 class="col m-0 text-uppercase"><small><?= $data_tiket2['dari'] ?></small></h6>

                                    <p class="col col-4 m-0"><small><i>TO</i></small></p>
                                    <h6 class="col m-0 text-uppercase"><small><?= $data_tiket2['tujuan'] ?></small></h6>

                                    <p class="col col-4 m-0"><small><i><?= $ggg ?></i></small></p>
                                    <h6 class="col m-0 text-uppercase"><small><?= $penumpang['grup'] ?></small></h6>

                                    <p class="col col-4 m-0"><small><i>SEAT</i></small></p>
                                    <h6 class="col m-0 text-uppercase"><small><?= $penumpang['seat'] ?></small></h6>

                                    <p class="col col-4 m-0"><small><i>TIME</i></small></p>
                                    <h6 class="col m-0 text-uppercase"><small><?= $data_tiket2['berangkat'] ?> <?= $data_tiket2['jam_berangkat'] ?> </small></h6>

                                </div>
                                <div class="d-flex justify-content-end pr-2">
                                    <?= $generator->getBarcode($penumpang['nik'], $generator::TYPE_CODE_128) ?>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    <?php elseif (($data_history['jenis']) == 'Hotel') : ?>

        <div class="justify-content-center">
            <div class="card p-2">
                <section class="text-center p-3">
                    <h2>TickTicket Hotel</h2>
                    <h5><small><?= $data_history['tanggal_transaksi'] ?></small></h5>
                </section>
                <hr>
                <section class="row row-cols-2 p-3">
                    <div class="col">
                        <h5><b>ID Transaksi</b></h5>
                    </div>
                    <div class="col">
                        <h5><?= $data_history['id'] ?></h5>
                    </div>

                    <div class="col pt-5">
                        <h5><b>Hotel</b></h5>
                    </div>
                    <div class="col pt-5">
                        <h5><?= $data_hotel['nama_penginapan'] ?></h5>
                    </div>
                    <div class="col">
                        <h5><b>Alamat</b></h5>
                    </div>
                    <div class="col">
                        <h5><?= $data_hotel['alamat'] ?>, <?= $data_hotel['kota'] ?></h5>
                    </div>

                    <div class="col pt-5">
                        <h5><b>Kamar</b></h5>
                    </div>
                    <div class="col pt-5">
                        <h5><?= $data_kamar['kamar'] ?> - <?= $data_kamar['luas'] ?></h5>
                    </div>
                    <div class="col">
                        <h5><b>Tempat Tidur</b></h5>
                    </div>
                    <div class="col">
                        <h5><?= $data_kamar['tempat_tidur'] ?></h5>
                    </div>
                    
                    <div class="col pt-5">
                        <h5><b>Sarapan</b></h5>
                    </div>
                    <div class="col pt-5">
                        <h5><?= $data_kamar['fasilitas']['sarapan'] ?></h5>
                    </div>
                    <div class="col">
                        <h5><b>Pembatalan Gratis</b></h5>
                    </div>
                    <div class="col">
                        <h5><?= $data_kamar['fasilitas']['pembatalan'] ?></h5>
                    </div>
                    
                    <div class="col pt-5">
                        <h5><b>Check In</b></h5>
                    </div>
                    <div class="col pt-5">
                        <h5><?= $data_history['checkin'] ?></h5>
                    </div>
                    <div class="col">
                        <h5><b>Check Out</b></h5>
                    </div>
                    <div class="col">
                        <h5><?= $data_history['checkout'] ?></h5>
                    </div>
                    
                    <div class="col pt-5">
                        <h5><b>Harga</b></h5>
                    </div>
                    <div class="col pt-5">
                        <h5><?= rupiah($data_kamar['harga']) ?></h5>
                    </div>
                    <div class="col">
                        <h5><b>Malam</b></h5>
                    </div>
                    <div class="col">
                        <?php 
                            $mlm = strtotime($data_history['checkout']) - strtotime($data_history['checkin']);
                            $mlm = round(abs($mlm) / (60*60*24),0);
                        ?>
                        <h5><?= $mlm ?> Malam</h5>
                    </div>
                    <div class="col">
                        <h5><b>Diskon</b></h5>
                    </div>
                    <div class="col">
                        <h5><?= $data_kamar['diskon'] ?> %</h5>
                    </div>
                    <div class="col">
                        <h5><b>Total</b></h5>
                    </div>
                    <div class="col">
                        <h5><?= rupiah($data_history['total_bayar']) ?></h5>
                    </div>
                </section>
                <hr>
                <section class="d-flex justify-content-center mt-2 mb-3">
                    <?= $generator->getBarcode($nik, $generator::TYPE_CODE_128, 5, 60) ?>
                </section>
                <hr>
                <section class="text-center">
                    <p>Terima Kasih</p>
                </section>
            </div>
        </div>

    <?php endif; ?>


    <div class="pt-3"></div>

    <?php if (isset($_GET["print"])) : ?>
        <script>
            window.print()
        </script>

    <?php endif; ?>
</body>

</html>