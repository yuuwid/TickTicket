<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_tiketku.php'; ?>

<?php include 'partials/main_header.php'; ?>

<!-- <div class="m-5 p-5">
<?php var_dump($dd) ?>

</div> -->

<div class="container pb-5 mt-5 pt-5">
    <div class="card p-4">
        <h3><b>Histori Transaksi</b></h3>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col" class="text-center"><i class="fa fa-puzzle-piece"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data_transaksi as $his): ?>
                <tr>
                    <td><?= $his['id'] ?></td>
                    <td><?= $his['jenis'] ?></td>
                    <td><?= rupiah($his['total_bayar']) ?></td>
                    <td><?= $his['tanggal_transaksi'] ?></td>
                    <?php if( (isset($his['data_penumpang']) == null) && (isset($his['data']) == null) ): ?>
                        <td class="text-center row">
                            <a href="tiketku_detail.php?id=<?= $his['id'] ?>&jenis=<?= strtolower($his['jenis']) ?>" type="button" class="col btn btn-sm btn-warning text-light w-100" data-toggle="tooltip" data-placement="bottom" title="Lengkapi data"><i class="fa fa-lock"></i></a>
                        </td>                        
                    <?php else: ?>
                        <td class="text-center row">
                            <a href="tiketku_detail.php?id=<?= $his['id'] ?>&jenis=<?= strtolower($his['jenis']) ?>" type="button" class="col btn btn-sm btn-info w-100" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-info"></i></a>
                            <a href="tiketku_cetak.php?id=<?= $his['id'] ?>&jenis=<?= strtolower($his['jenis']) ?>" type="button" class="col btn btn-sm btn-primary w-100 ml-1 text-light" data-toggle="tooltip" data-placement="bottom" title="Cetak"><i class="fa fa-print"></i></a>
                        </td>
                    <?php endif; ?>
                </tr>                
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'partials/footer.php'; ?>