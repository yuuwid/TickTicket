<?php require_once 'core/init.php'; ?>

<?php require_once 'a_dashboard.php'; ?>

<?php include '../partials/admin_header.php'; ?>


<div class="container-fluid mt-5 pt-5 pb-5" style="height: 100%; width: 100%;">
    <?php if ($data['status'] == 0) : ?>
        <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
            <strong>Akun anda masih belum aktif.</strong> klik <a href="aktivasi.php?email=<?= $data['email'] ?>">disini</a> untuk melakukan aktivasi akun.

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if (isset($error[0])) : ?>
        <?php if ($error[0] == true) : ?>
            <?php if ($error[1] == PIN_ERROR) : ?>
                <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                    <strong>PIN SALAH</strong> silakan coba lagi.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

        <?php elseif ($error[0] == false) : ?>
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                <strong>Sukses</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    <?php endif; ?>



    <div class="card p-3 pt-4">
        <div class="row row-cols-2 row-cols-md-2 row-cols-xl-4 mt-2">

            <div class="col mb-4">
                <div class="card bg-info text-light">
                    <div class="card-header">
                        <b>Total Users</b>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="card-title"><?= sizeof($users) ?></h2>
                        <h6>User</h6>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card bg-success text-light">
                    <div class="card-header">
                        <b>Total Admin</b>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="card-title"><?= sizeof($admins) ?></h2>
                        <h6>Admin</h6>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card bg-warning text-light">
                    <div class="card-header">
                        <b>Total Transaksi</b>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="card-title"><?= sizeof($histori) ?></h2>
                        <h6>Transaksi</h6>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card bg-danger text-light">
                    <div class="card-header">
                        <b>Company</b>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="card-title">1</h2>
                        <!---->
                        <h6>Perusahaan</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card p-3 pt-4 mt-4 pl-5 pr-5 ">
        <h4>Transaksi Terbaru</h4>
        <div class="table-responsive">
            <table class="table table-hover">
                <caption class="text-right"><a href="history_transaksi.php">Lihat Lainnya</a></caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jenis</th>
                        <th class="text-right""><i class=" fa fa-bars"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($histori as $h) : ?>
                        <?php if ($i == 8) break; ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $h['id'] ?></td>
                            <td><?= $h['tanggal_transaksi'] ?></td>
                            <td><?= $h['jenis'] ?></td>
                            <td class="text-right">
                                <button class="btn btn-sm badge badge-info text-light p-2 pl-3 pr-3">
                                    <i class="fa fa-info" data-toggle="tooltip" data-placement="bottom" title="Detail"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h4>Users</h4>
        <div class="table-responsive">
            <table class="table table-hover">
                <caption class="text-right"><a href="users_management.php">Lihat Lainnya</a></caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Status</th>
                        <th class="text-right""><i class=" fa fa-bars"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['nama'] ?></td>
                            <td><?= ($user['status'] == 0) ? "Belum Aktif" : "Aktif"   ?></td>
                            <td class="text-right">
                                <button type="button" class="btn btn-sm badge badge-danger text-light p-2" data-toggle="modal" data-target="#usersModal" data-dataid="<?= $user['id'] ?>" data-nameinput="hapus_id"> 
                                    <i class="fa fa-user-slash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
                                </button>
                                <button type="button" class="btn btn-sm badge badge-warning text-light p-2" data-toggle="modal" data-target="#usersModal" data-dataid="<?= $user['id'] ?>" data-nameinput="bann_id"> 
                                    <i class="fa fa-user-lock" data-toggle="tooltip" data-placement="bottom" title="Nonaktikan"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h4>Admin</h4>
        <div class="table-responsive">
            <table class="table table-hover">
                <caption class="text-right"><a href="users_management.php">Lihat Lainnya</a></caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Status</th>
                        <th class="text-right""><i class="fa fa-bars"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($admins as $admin) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $admin['username'] ?></td>
                            <td><?= $admin['nama']?> <?= ($admin['id'] == $id) ? "(Anda)" : ""  ?> </td>
                            <td><?= ($admin['status'] == 0) ? "Belum Aktif" : "Aktif"   ?></td>
                            <td class="text-right">
                                <button type="button" class="btn btn-sm badge badge-danger text-light p-2" data-toggle="modal" data-target="#usersModal" data-dataid="<?= $user['id'] ?>" data-nameinput="hapus_id"> 
                                    <i class="fa fa-user-slash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
                                </button>
                                <button type="button" class="btn btn-sm badge badge-warning text-light p-2" data-toggle="modal" data-target="#usersModal" data-dataid="<?= $user['id'] ?>" data-nameinput="bann_id"> 
                                    <i class="fa fa-user-lock" data-toggle="tooltip" data-placement="bottom" title="Nonaktikan"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="usersModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="usersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="usersModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input name="id" type="hidden" class="form-control" id="id_user">
                    <div class="form-group">
                        <label for="pin">Masukan PIN anda</label>
                        <input class="form-control" type="number" name="pin" id="pin" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button name="hapus" type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include '../partials/admin_footer.php'; ?>