<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_tiketku_databeequipped.php'; ?>

<?php include 'partials/main_header.php'; ?>

<div class="container pb-5 mt-5 pt-5">
    <div class="card p-4">
        <form action="" method="post">
            <?php if($jenis == 'tiket pesawat' || $jenis == 'tiket kereta api'): ?>
                <?php for ($i = 1; $i <= $data_history['penumpang']; $i++) : ?>
                    <h5><b>Data Penumpang <?= $i ?></b></h5>
                    <hr>
                    <section>
                        <div class="form-group">
                            <label for="nama<?= $i ?>">Nama Lengkap</label>
                            <input name="nama_lengkap<?= $i ?>" type="text" class="form-control" id="nama<?= $i ?>" aria-describedby="namaHelp" autocomplete="off" required>
                            <small id="namaHelp" class="form-text text-muted">Pastikan Nama yang ditulis sesuai dengan Nama pada identitas.</small>
                        </div>

                        <div class="form-group">
                            <label for="nik<?= $i ?>">NIK</label>
                            <input name="nik<?= $i ?>" type="num" class="form-control" id="nik<?= $i ?>" aria-describedby="nikHelp" autocomplete="off" required>
                            <small id="nikHelp" class="form-text text-muted">Masukan 16 Digit nomor NIK atau Nomor Kartu identitas Lain</small>
                        </div>
                    </section>
                    <br>
                <?php endfor; ?>
            <?php elseif($jenis == 'hotel'): ?>
                <h5><b>Identitas Pribadi</b></h5>
                <hr>
                <section>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input name="nama_lengkap" type="text" class="form-control" id="nama" aria-describedby="namaHelp" autocomplete="off" required>
                        <small id="namaHelp" class="form-text text-muted">Pastikan Nama yang ditulis sesuai dengan Nama pada identitas.</small>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input name="nik" type="num" class="form-control" id="nik" aria-describedby="nikHelp" autocomplete="off" required>
                        <small id="nikHelp" class="form-text text-muted">Masukan 16 Digit nomor NIK atau Nomor Kartu identitas Lain</small>
                    </div>
                </section>
                
            <?php endif; ?>


            <div class="text-center">
                <p class="text-warning">Data yang telah disimpan tidak bisa di edit kembali.</p>
                <button name="simpan" type="submit" class="btn btn-info">Simpan</button>
            </div>

        </form>
    </div>
</div>

<?php include 'partials/footer.php'; ?>