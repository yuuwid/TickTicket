<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_akomodasi_checkout.php'; ?>

<?php include 'partials/main_header.php'; ?>


<div class="container pb-5 mt-5 pt-5">

    <div class="card text-center">
        <div class="card-header">
            Transaksi
        </div>
        <div class="card-body">
            <h5 class="card-title">Total Bayar</h5>
            <h6 class="card-text"><del><?= rupiah($data_transaksi['harga']) ?></del> <span href="#" class="badge badge-warning"> -<?= $data_transaksi['diskon'] ?>%</span></h6>
            <?php 
                $in = round(abs(strtotime($data_transaksi['checkout']) - strtotime($data_transaksi['checkin'])) / (60*60*24),0);
                $total = ($data_transaksi['harga'] - ($data_transaksi['harga'] * $data_transaksi['diskon'] / 100)) * $in;            
            ?>
            <h3 class="card-text text-info"><b><?= rupiah($total) ?> <h6 class="d-inline">/ <?= $in ?> Malam</h6></b></h3>
            <form action="" method="post">
                <input type="hidden" name="id_hotel" value="<?= $data_transaksi['id_hotel'] ?>">
                <input type="hidden" name="id_kamar" value="<?= $data_transaksi['id_kamar'] ?>">
                <input type="hidden" name="checkin" value="<?= $data_transaksi['checkin'] ?>">
                <input type="hidden" name="pesan" value="<?= $data_transaksi['pesan'] ?>">
                <button name="selesai" type="submit" class="btn btn-success btn-sm mt-2">Selesai</button>
            </form>
            <p>Setelah melakukan transaksi, jangan lupa untuk mengisi data pribadi anda di Menu <b>"Tiketku"</b> =D</p>
        </div>
        <div class="card-footer text-muted">
            TickTicket
        </div>
    </div>

</div>


<?php include 'partials/footer.php'; ?>