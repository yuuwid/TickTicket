<?php require_once 'admin/core/init.php'; ?>

<?php require_once 'a_hotel.php'; ?>

<?php include 'partials/main_header.php'; ?>

<div class="jumbotron jumbotron-fluid jum-hotel mt-5 pt-5">
	<div class="container">
		<h1 class="display-5 pt-4"><b>Pesan atau Booking Hotel dengan harga terjangkau</b></h1>
	</div>
</div>

<div class="container pb-5" style="margin-top: -200px;">

	<div class="card p-4 pt-5 pb-5 shadow ">

		<form action="" method="post">

			<div class="row row-cols-1 row-cols-md-2 row-cols-lg-5">
				<div class="col form-group dropdown search-box-kota">
					<label for="hotelKota"><i class="fa fa-map"></i> Kota</label>
					<input name="kota" type="text" class="form-control" id="hotelKota" placeholder="Tujuan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" autocomplete="off" required value="<?php echo (isset($_POST['kota'])) ? $_POST["kota"] : '' ?>">

					<div class="dropdown-menu data-search-kota" aria-labelledby="dropdownKota">

					</div>
				</div>

				<div class="col form-group search-box-ke">
					<label for="tanggalCheckin"><i class="fa fa-calendar-check"></i> Check In</label>
					<input name="checkin" type="date" class="form-control" id="tanggalCheckin" required value="<?php echo (isset($_POST['checkin'])) ? $_POST["checkin"] : '' ?>">
				</div>

				<div class="col form-group search-box-ke">
					<label for="tanggalCheckout"><i class="fa fa-calendar-check"></i> Check Out</label>
					<input name="checkout" type="date" class="form-control" id="tanggalCheckout" required value="<?php echo (isset($_POST['checkout'])) ? $_POST["checkout"] : '' ?>">
				</div>


				<div class="col col-md-12 form-group dropdown search-box-ke">
					<label for="kamar"><i class="fa fa-bed"></i> Kamar</label>
					<div class="d-flex">
						<input name="kamar" type="number" class="form-control" id="kamar" placeholder="Jumlah Kamar" min="1" max="4" required value="<?php echo (isset($_POST['kamar'])) ? $_POST["kamar"] : '1' ?>">
					</div>
				</div>


				<div class="col col-md-12 form-group dropdown search-box-ke">
					<label for="tamu"><i class="fa fa-suitcase-rolling"></i> Tamu</label>
					<div class="d-flex">
						<input name="tamu" type="number" class="form-control" id="tamu" placeholder="Jumlah Tamu" min="1" max="4" required value="<?php echo (isset($_POST['tamu'])) ? $_POST["tamu"] : '1' ?>">
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="#pilihhotel" class="text-decoration-none"><button id="caritiket" name="cari" type="submit" class="btn btn-info ">Cari <i class="fa fa-paper-plane"></i></button></a>
			</div>
		</form>

	</div>

	<!-- Pilih Hotel -->
	<?php if (isset($data_penginapan)) : ?>
		<div class="mt-3 mb-3 text-center">
			<h5 class="strikearound"> Hasil Pencarian </h5>
		</div>
		<div class="card p-3 shadow">
			<div id="pilihhotel" class="">

				<?php foreach ($data_penginapan as $hotel) : ?>
					<!-- read json field -->
					<?php
					$fotos = json_decode($hotel['foto'], true);
					$keterangan = json_decode($hotel['keterangan'], true)[0];
					?>
					<div class="card p-1 rounded-lg shadow-sm">
						<div class="row row-cols-1 row-cols-md-2 text-center">
							<div class="col col-md-4 align-self-center">
								<img src="assets/img/9676211069_29333c6b38_c.jpg" class="text-right img-thumbnail img-fluid">
							</div>
							<div class="col col-md-8 text-left align-self-center">
								<section class="container p-0">
									<div class="row row-cols-2">
										<div class="col col-4">
											<b>Hotel</b>
										</div>
										<div class="col col-8">
											<?= $hotel['nama_penginapan'] ?>
										</div>

										<div class="col col-4">
											<b>Kota</b>
										</div>
										<div class="col col-8">
											<?= $hotel['kota'] ?>
										</div>

										<div class="col col-4">
											<b>Rating</b>
										</div>
										<div class="col col-8 text-warning">
											<i class="fa fa-star"></i> <?= $keterangan['rating'] ?>
										</div>

										<div class="col col-4">
											<b>Harga</b>
										</div>
										<div class="col col-8">
											<?= rupiah($hotel['harga']) ?>/Malam
										</div>
									</div>
								</section>

								<form method="POST" action="" class="text-right">
									<input type="hidden" name="idhtl" value="<?= $hotel['id'] ?>">

									<a type="button" class="btn btn-link text-info text-decoration-none" data-toggle="modal" data-target="#detailHotel">Detail <i class="fa fa-info fa-sm pl-1"></i></a>
									<button type="submit" class="btn btn-link text-decoration-none" name="pilihkamar">Pilih Kamar<i class="fa fa-caret-right pl-1"></i></button>
								</form>
							</div>
						</div>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="detailHotel" tabindex="-1" aria-labelledby="detailHotelLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title text-uppercase" id="detailHotelLabel"><?= $hotel['nama_penginapan'] ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p class="mb-0"><b>Foto Hotel</b></p>
									<div class="scroll pt-0">
										<?php foreach ($fotos as $foto) : ?>
											<img class="m-1" src="assets/img/<?= $foto['foto'] ?>" width="200px">
										<?php endforeach; ?>
									</div>
									<p class="mb-0 mt-2"><b>Rating Hotel</b></p>
									<div class="container text-warning">
										<i class="fa fa-star"></i> <?= $keterangan['rating'] ?>
									</div>

									<p class="mb-0 mt-2"><b>Keterangan Hotel</b></p>
									<div class="container">
										<?= $keterangan['deskripsi'] ?>
									</div>

									<p class="mb-0 mt-2"><b>Fasilitas Hotel</b></p>
									<div class="container">
										<p class="mb-1"><i class="fa fa-water"></i> Kolam Renang = <span class="text-uppercase"><?= $keterangan['fasilitas']['kolam_renang'] ?></span></p>

										<p class="mb-1"><i class="fa fa-wifi"></i> Wifi = <span class="text-uppercase"><?= $keterangan['fasilitas']['wifi'] ?></span></p>

										<p class="mb-1"><i class="fa fa-car"></i> Parkir = <span class="text-uppercase"><?= $keterangan['fasilitas']['parkir'] ?></span></p>

										<p class="mb-1"><i class="fa fa-utensils"></i> Restoran = <span class="text-uppercase"><?= $keterangan['fasilitas']['restoran'] ?></span></p>

										<p class="mb-1"><i class="fa fa-user-shield"></i> Resepsionis 24 Jam = <span class="text-uppercase"><?= $keterangan['fasilitas']['resepsionis24jam'] ?></span></p>

										<p class="mb-1"><i class="fa fa-spa"></i> SPA = <span class="text-uppercase"><?= $keterangan['fasilitas']['spa'] ?></span></p>

										<p class="mb-1"><i class="fa fa-list-ol"></i> Lift = <span class="text-uppercase"><?= $keterangan['fasilitas']['lift'] ?></span></p>

										<p class="mb-1"><i class="fa fa-fan"></i> AC = <span class="text-uppercase"><?= $keterangan['fasilitas']['ac'] ?></span></p>

										<p class="mb-1"><i class="fa fa-dumbbell"></i> Fitnes = <span class="text-uppercase"><?= $keterangan['fasilitas']['fitnes'] ?></span></p>

										<p class="mb-1"><i class="fa fa-users"></i> Fasilitas Rapat = <span class="text-uppercase"><?= $keterangan['fasilitas']['fasilitas_rapat'] ?></span></p>

										<p class="mb-1"><i class="fa fa-taxi"></i> Antar Jemput = <span class="text-uppercase"><?= $keterangan['fasilitas']['antar_jemput'] ?></span></p>
									</div>

									<p class="mb-0 mt-2"><b>Hewan Peliharaan</b></p>
									<div class="container">
										<i class="fa fa-paw"></i> Hewan Peliharaan <?= $keterangan['hewan_peliharaan'] ?>
									</div>

									<p class="mb-0 mt-2"><b>Lainnya</b></p>
									<div class="container"><?= $keterangan['lainnya'] ?>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	<?php endif; ?>

	<!-- pilih kamar -->
	<?php if (isset($pilihkamar)) : ?>

		<div class="mt-3 mb-3 text-center">
			<h5 class="strikearound"> Pilih Kamar </h5>
		</div>
		<div class="card pr-0 pl-0 p-3 shadow">
			<!-- read JSON field -->
			<?php $data_kamar = json_decode($data_kamar, true) ?>
			<div class="container row row-cols-1 row-cols-md-2 p-0">
				<section class="col col-md-5 pt-2">
					<img src="assets/img/<?= json_decode($data_penginapan2['foto'], true)[0]['foto'] ?>" class="img-fluid img-thumbnail">
				</section>
				<section class="col col-md-7 p-0">
					<?php foreach ($data_kamar as $kamar) : ?>
						<!-- <?php var_dump($kamar) ?> -->
						<div class="card mt-2">
							<div class="row row-cols-1 row-cols-md-2 p-3">
								<div class="col col-md-7">
									<section class="p-2">
										<h6><?= $kamar['kamar'] ?></h6>
										<section class="">
											<p class="mb-0 d-inline <?= ($kamar['fasilitas']['sarapan'] == 'YA') ? '' : 'text-black-50' ?>"><i class="fa fa-utensils fa-sm"></i> <small>Sarapan</small> </p>
											<p class="mb-0 d-inline <?= ($kamar['fasilitas']['wifi'] == 'YA') ? '' : 'text-black-50' ?>"><i class="fa fa-wifi fa-sm"></i> <small>Wifi</small> </p>
										</section>
										<div class="dropdown-divider"></div>
										<p class="mb-0"><i class="fa fa-bed fa-sm"></i> <?= $kamar['tempat_tidur'] ?></p>
										<p class="mb-0"><i class="fa fa-cube fa-sm"></i> <?= $kamar['luas'] ?></p>

										<?php if ($kamar['fasilitas']['pembatalan'] == 'Gratis') : ?>
											<p class="mb-0 text-success"><i class="fa fa-eject fa-sm"></i> Pembatalan <?= $kamar['fasilitas']['pembatalan'] ?></p>
										<?php endif; ?>

									</section>
								</div>
								<div class="col col-md-5 p-2 text-right alignc" style="border: solid gainsboro; border-width: 1px;">
									<?php if ($kamar['diskon'] != 0) : ?>
										<span class="badge badge-info mt-4">Diskon <?= $kamar['diskon'] ?> %</span>
										<p class="text-black-50">
											<small><del><?= rupiah($kamar['harga']) ?></del></small>
										</p>
										<h5 class="text-warning">
											<?= rupiah($kamar['harga'] - ($kamar['harga'] * $kamar['diskon'] / 100)) ?>
										</h5>
									<?php else : ?>
										<h5 class="text-warning pt-2">
											<?= rupiah($kamar['harga']) ?>
										</h5>
									<?php endif; ?>
									<form action="akomodasi_checkout.php?jenis=hotel" method="post" class="pt-2">
										<input name="id_hotel" type="hidden" value="<?= $data_penginapan2['id'] ?>">
										<input name="id_kamar" type="hidden" value="<?= $kamar['id_kamar'] ?>">
										<input name="harga" type="hidden" value="<?= $kamar['harga'] ?>">
										<input name="diskon" type="hidden" value="<?= $kamar['diskon'] ?>">
										<input name="checkin" type="hidden" value="<?= $checkin ?>">
										<input name="checkout" type="hidden" value="<?= $checkout ?>">
										<input name="kamar" type="hidden" value="<?= $jmlkamar ?>">
										<input name="jmltamu" type="hidden" value="<?= $jmltamu ?>">
										<button name="pesan" class="btn btn-success btn-sm">
											Pesan
										</button>
									</form>

								</div>
							</div>
						</div>
					<?php endforeach; ?>

				</section>
			</div>

		</div>

	<?php endif; ?>

</div>

<div class="container card shadow">
	<h5 class="mt-3"><b>Rekomendasi</b></h5>
	<div class="dropdown-divider"></div>
	<div class="p-2 pl-sm-4 pr-sm-4 row row-cols-1 row-cols-md-4 justify-content-around">

		<form action="" method="post" class="card col surabaya shadow m-3 p-0">
			<input name="kota" type="hidden" value="Surabaya">
			<input name="checkin" id="datePicker" type="hidden">
			<input name="checkout" id="datePicker2" type="hidden">
			<input name="kamar" type="hidden" value="1">
			<input name="tamu" type="hidden" value="1">
			<button name="cari" type="submit" href="#pilihhotel" class="btn btn-link  text-decoration-none" style="width: 100%; height: 100%;">
				<section class="text-left text-light">
					<h6>Pesan Hotel terbaik di</h6>
				</section>
				<section class="text-left text-light pt-3">
					<h3>Surabaya</h3>
				</section>
			</button>
		</form>

		<form action="" method="post" class="card col malang shadow m-3 p-0">
			<input name="kota" type="hidden" value="Malang">
			<input name="checkin" id="datePicker" type="hidden">
			<input name="checkout" id="datePicker2" type="hidden">
			<input name="kamar" type="hidden" value="1">
			<input name="tamu" type="hidden" value="1">
			<button name="cari" type="submit" href="#pilihhotel" class="btn btn-link  text-decoration-none" style="width: 100%; height: 100%;">
				<section class="text-left text-light">
					<h6>Pesan Hotel terbaik di</h6>
				</section>
				<section class="text-left text-light pt-3">
					<h3>Malang</h3>
				</section>
			</button>
		</form>

		<form action="" method="post" class="card col bali shadow m-3 p-0">
			<input name="kota" type="hidden" value="Bali">
			<input name="checkin" id="datePicker" type="hidden">
			<input name="checkout" id="datePicker2" type="hidden">
			<input name="kamar" type="hidden" value="1">
			<input name="tamu" type="hidden" value="1">
			<button name="cari" type="submit" href="#pilihhotel" class="btn btn-link  text-decoration-none" style="width: 100%; height: 100%;">
				<section class="text-left text-light">
					<h6>Pesan Hotel terbaik di</h6>
				</section>
				<section class="text-left text-light pt-3">
					<h3>Bali</h3>
				</section>
			</button>
		</form>

		<form action="" method="post" class="card col jogja shadow m-3 p-0">
			<input name="kota" type="hidden" value="Jogja">
			<input name="checkin" id="datePicker" type="hidden">
			<input name="checkout" id="datePicker2" type="hidden">
			<input name="kamar" type="hidden" value="1">
			<input name="tamu" type="hidden" value="1">
			<button name="cari" type="submit" href="#pilihhotel" class="btn btn-link  text-decoration-none" style="width: 100%; height: 100%;">
				<section class="text-left text-light">
					<h6>Pesan Hotel terbaik di</h6>
				</section>
				<section class="text-left text-light pt-3">
					<h3>Jogja</h3>
				</section>
			</button>
		</form>

	</div>
</div>


<?php include 'partials/footer.php'; ?>