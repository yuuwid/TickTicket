<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_dashboard.php'; ?>

<?php include 'partials/main_header.php'; ?>

<div class="jumbotron jumbotron-fluid jum-dashboard mt-5 pt-5">
    <div class="container">
        <h1 class="display-4"><b>Selamat Datang</b> <?= $data['nama'] ?>.</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo in nulla assumenda odio molestiae reiciendis, dolor praesentium distinctio nam fugit ipsum, explicabo a nobis odit blanditiis reprehenderit,
            <br><br>
            <small>sapiente placeat quidem esse! Nulla, laborum autem dolores sunt quisquam doloribus fugit beatae quaerat asperiores maxime ipsa inventore non, exercitationem eligendi voluptate</small>
        </p>
        <div class="dropdown-divider pt-2 pb-2"></div>

        <p>Lihat paket paket kebutuhan akomodasi yang mungkin anda butuhkan.</p>
        <a class="btn btn-info btn" href="#rekom" role="button">Selengkapnya</a>

        <?php if ($data['status'] == 0) : ?>
            <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
                <strong>Akun anda masih belum aktif.</strong> klik <a href="aktivasi.php?email=<?= $data['email'] ?>">disini</a> untuk melakukan aktivasi akun.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php endif; ?>
    </div>
</div>
<div id="rekom" class="container pb-4 pr-5 pl-5" style="margin-top: -150px;">
    <div class="card justify-content-center p-3 sansserif">
        <section class="content">
            <h5>Rekomendasi untuk anda</h5>
            <hr>
            <div class="d-md-flex justify-content-around mt-4">
                <a href="tiket.php?jenis=pesawat" class="card pr-5 pl-5 pt-3 pb-3 text-center text-decoration-none text-info mx-auto mb-3" style="width: 200px;">
                    <i class="fa fa-plane fa-3x pb-2"></i>
                    <small>Tiket Pesawat</small>
                </a>
                <a href="akomodasi.php?jenis=hotel" class="card pr-5 pl-5 pt-3 pb-3 text-center text-decoration-none text-info mx-auto mb-3" style="width: 200px;">
                    <i class="fa fa-hotel fa-3x pb-2"></i>
                    <small>Hotel</small>
                </a>
                <a href="tiket.php?jenis=keretaapi" class="card pr-5 pl-5 pt-3 pb-3 text-center text-decoration-none text-info mx-auto mb-3" style="width: 200px;">
                    <i class="fa fa-train fa-3x"></i>
                    <small>Kereta Api</small>
                </a>
            </div>
        </section>
    </div>
</div>

<div class="container-fluid pl-5 pr-5 pb-5">
    <div class="card p-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam explicabo hic, quibusdam ut excepturi ex! Excepturi nulla veritatis, delectus tempora molestias tenetur nam modi aspernatur deserunt facere corrupti fugit magni?
    </div>
</div>



<?php include 'partials/footer.php'; ?>