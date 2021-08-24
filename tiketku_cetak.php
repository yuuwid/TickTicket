<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_tiketku_cetak.php'; ?>

<?php include 'partials/main_header.php'; ?>

<div class="container pb-5 mt-5 pt-5">
    <div class="card p-4">
        <p><a href="tiketku.php"><i class="fa fa-angle-left"></i> kembali</a></p>
        <h4><b>Cetak Transaksi</b></h4>
        <table class="table table-bordered">
            <tr>
                <td>ID Transaksi</td>
                <td><?= $data_history['id'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Transaksi</td>
                <td><?= $data_history['tanggal_transaksi'] ?></td>
            </tr>
        </table>
        <form action="" method="post">
            <input type="hidden" name="">
            <a href="tiketku_print.php?id=<?= $data_history['id'] ?>&jenis=<?= strtolower($data_history['jenis']) ?>&print=" target="_BLANK" name="print" class="btn btn-info"><i class="fa fa-print pr-2"></i> Print</a>
        </form>
        <iframe class="mt-3" src="tiketku_print.php?id=<?= $data_history['id'] ?>&jenis=<?= strtolower($data_history['jenis']) ?>" height="300px"></iframe>
    </div>
</div>

<?php include 'partials/footer.php'; ?>