<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_tiket_checkout.php'; ?>

<?php include 'partials/main_header.php'; ?>


<div class="container pb-5 mt-5 pt-5">

    <div class="card text-center">
        <div class="card-header">
            Transaksi
        </div>
        <div class="card-body">
            <h5 class="card-title">Total Bayar</h5>
            <h3 class="card-text"><b><?= rupiah($data_transaksi['totalbayar']) ?></b></h3>
            <form action="" method="post">
                <input type="hidden" name="idb" value="<?= $data_transaksi['idb'] ?>">
                <input type="hidden" name="idp" value="<?= $data_transaksi['idp'] ?>">
                <input type="hidden" name="penumpang" value="<?= $data_transaksi['penumpang'] ?>">
                <input type="hidden" name="totalbayar" value="<?= $data_transaksi['totalbayar'] ?>">
                <button name="selesai" type="submit" class="btn btn-success btn-sm mt-2">Selesai</button>
            </form>
            <p>Setelah melakukan transaksi, jangan lupa untuk mencetak tiket anda di Menu <b>"Tiketku"</b> =D</p>
        </div>
        <div class="card-footer text-muted">
            TickTicket
        </div>
    </div>

</div>


<?php include 'partials/footer.php'; ?>