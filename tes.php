
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/font-family.css">
</head>
<body>
    

<?php foreach($data_penumpang as $penumpang): ?>
    <div class="card p-2 m-3">
    <div class="row row-cols-2">
        <div class="col col-8">
            <section class="text-right">
                <img src="assets/img/garuda-indonesia.png" width="120">
                <div class="dropdown-divider"></div>
            </section>
            <section class="row row-cols-3 p-2">

                <div class="col">
                    <p class="m-0"><small><i>NAME</i></small></p>
                    <h6 class="m-0 pb-4 text-uppercase"><?= $penumpang['nama_lengkap'] ?></h6>
                </div>

                <div class="col">
                    <p class="m-0"><small><i>GATE/SEAT</i></small></p>
                    <h6 class="m-0 pb-4 text-uppercase"><?= $penumpang['grup'] ?></h6>
                </div>

                <div class="col">
                    <p class="m-0"><small><i>SEAT</i></small></p>
                    <h6 class="m-0 pb-4 text-uppercase"><?= $penumpang['seat'] ?></h6>
                </div>



                <div class="col">
                    <p class="m-0"><small><i>NO FLIGHT</i></small></p>
                    <h6 class="m-0 pb-4 text-uppercase"><?= $data_tiket1['kode_penerbangan'] ?></h6>
                </div>

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
                <img src="assets/img/garuda-indonesia.png" width="120">
                <div class="dropdown-divider"></div>
            </section>
            <section class="">
                <div class="row row-cols-2">
                    <p class="col col-4 m-0"><small><i>NAME</i></small></p>
                    <h6 class="col m-0 text-uppercase"><small><?= $penumpang['nama_lengkap'] ?></small></h6>

                    <p class="col col-4 m-0"><small><i>NO FLIGHT</i></small></p>
                    <h6 class="col m-0 text-uppercase"><small><?= $data_tiket1['kode_penerbangan'] ?></small></h6>

                    <p class="col col-4 m-0"><small><i>FROM</i></small></p>
                    <h6 class="col m-0 text-uppercase"><small><?= $data_tiket1['dari'] ?></small></h6>

                    <p class="col col-4 m-0"><small><i>TO</i></small></p>
                    <h6 class="col m-0 text-uppercase"><small><?= $data_tiket1['tujuan'] ?></small></h6>

                    <p class="col col-4 m-0"><small><i>GATE</i></small></p>
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

</body>
</html>
