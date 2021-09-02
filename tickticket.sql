-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2021 pada 15.39
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tickticket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akomodasi_history_transaksi`
--

CREATE TABLE `akomodasi_history_transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `jenis` varchar(25) NOT NULL DEFAULT '0',
  `id_penginapan` int(11) NOT NULL DEFAULT 0,
  `id_kamar` int(11) NOT NULL DEFAULT 0,
  `kamar` int(11) NOT NULL DEFAULT 0,
  `tamu` int(11) NOT NULL DEFAULT 0,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `total_bayar` bigint(20) NOT NULL DEFAULT 0,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`keterangan`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akomodasi_history_transaksi`
--

INSERT INTO `akomodasi_history_transaksi` (`id`, `id_user`, `jenis`, `id_penginapan`, `id_kamar`, `kamar`, `tamu`, `checkin`, `checkout`, `total_bayar`, `tanggal_transaksi`, `data`, `keterangan`) VALUES
(1, 4, 'Hotel', 1, 1, 1, 1, '2021-08-24', '2021-08-26', 714000, '2021-08-23 06:56:44', '[{\"nama_lengkap\":\"3sa\",\"nik\":\"weqs\",\"no_kamar\":\"0\"}]', NULL),
(2, 4, 'Hotel', 1, 4, 1, 2, '2021-08-23', '2021-08-25', 953000, '2021-08-23 07:09:32', NULL, NULL),
(3, 4, 'Hotel', 1, 3, 1, 2, '2021-08-23', '2021-08-24', 372000, '2021-08-23 07:11:16', '[{\"nama_lengkap\":\"asdad\",\"nik\":\"asdwqd\",\"no_kamar\":\"0\"}]', NULL),
(4, 4, 'Hotel', 1, 2, 1, 2, '2021-08-23', '2021-08-28', 1912500, '2021-08-23 07:12:54', '[{\"nama_lengkap\":\"adsad\",\"nik\":\"sadsa\",\"no_kamar\":\"\"}]', NULL),
(5, 4, 'Hotel', 1, 1, 1, 2, '2021-08-24', '2021-08-26', 714000, '2021-08-23 17:57:38', NULL, NULL),
(6, 4, 'Hotel', 1, 3, 1, 1, '2021-08-25', '2021-08-26', 372000, '2021-08-24 17:19:48', NULL, NULL),
(7, 4, 'Hotel', 1, 2, 1, 1, '2021-08-25', '2021-08-26', 382500, '2021-08-24 17:20:18', NULL, NULL),
(484125, 4, 'Hotel', 1, 3, 1, 1, '2021-09-02', '2021-09-03', 372000, '2021-09-02 12:09:01', NULL, NULL),
(484126, 4, 'Hotel', 1, 1, 1, 1, '2021-09-02', '2021-09-03', 357000, '2021-09-02 12:16:33', '[{\"nama_lengkap\":\"W\",\"nik\":\"1243\",\"no_kamar\":\"\"}]', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `akomodasi_penginapan`
--

CREATE TABLE `akomodasi_penginapan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `nama_penginapan` varchar(50) NOT NULL,
  `alamat` varchar(76) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `harga` bigint(20) DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `kamar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`kamar`)),
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`keterangan`)),
  `foto` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`foto`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akomodasi_penginapan`
--

INSERT INTO `akomodasi_penginapan` (`id`, `jenis`, `nama_penginapan`, `alamat`, `kota`, `harga`, `status`, `kamar`, `keterangan`, `foto`) VALUES
(1, 'Hotel', 'tes hotel', 'dimana', 'Surabaya', 500000, 1, '[{\"id_kamar\": \"1\",\"kamar\": \"Kamar Deluxe\",\"tempat_tidur\": \"1 Double / 2 Twin\",\"tamu\": \"1\",\"luas\": \"27x27m\",\"fasilitas\": {\"sarapan\": \"TIDAK\",\"wifi\": \"YA\",\"pembatalan\": \"\",\"lainnya\": \"\"},\"harga\": \"420000\", \"diskon\": \"15\"},{\"id_kamar\": \"2\",\"kamar\": \"Kamar Deluxe 2\",\"tempat_tidur\": \"1 Double / 2 Twin\",\"tamu\": \"2\",\"luas\": \"27x27m\",\"fasilitas\": {\"sarapan\": \"TIDAK\",\"wifi\": \"YA\",\"pembatalan\": \"\",\"lainnya\": \"\"},\"harga\": \"425000\", \"diskon\": \"10\"},{\"id_kamar\": \"3\",\"kamar\": \"Kamar Deluxe\",\"tempat_tidur\": \"1 Double / 2 Twin\",\"tamu\": \"1\",\"luas\": \"27x27m\",\"fasilitas\": {\"sarapan\": \"YA\",\"wifi\": \"YA\",\"pembatalan\": \"Gratis\",\"lainnya\": \"\"},\"harga\": \"465000\", \"diskon\": \"20\"},{\"id_kamar\": \"4\",\"kamar\": \"Kamar Deluxe 2\",\"tempat_tidur\": \"1 Double / 2 Twin\",\"tamu\": \"2\",\"luas\": \"27x27m\",\"fasilitas\": {\"sarapan\": \"YA\",\"wifi\": \"YA\",\"pembatalan\": \"Gratis\",\"lainnya\": \"\"},\"harga\": \"476500\", \"diskon\": \"0\"}]', '[{\"rating\":\"0\",\"fasilitas\": {\"kolam_renang\": \"ya\",\"wifi\": \"ya\",\"parkir\": \"ya\",\"restoran\": \"ya\",\"resepsionis24jam\": \"ya\",\"spa\": \"ya\",\"lift\": \"ya\",\"ac\": \"ya\",\"fitnes\": \"ya\",\"fasilitas_rapat\": \"ya\",\"antar_jemput\": \"ya\",\"fitnes\": \"ya\",\"fitnes\": \"ya\",\"fitnes\": \"ya\"},\"hewan_peliharaan\": \"tidak diijinkan\",\"lainnya\": \"\", \"deskripsi\": \"belum ada deskripsi\"}]', '[{\"foto\":\"9676211069_29333c6b38_c.jpg\"},{\"foto\":\"04_berlin_H5.960_0_1.jpg\"},{\"foto\":\"04_berlin_H5.960_0_1.jpg\"},{\"foto\":\"04_berlin_H5.960_0_1.jpg\"},{\"foto\":\"04_berlin_H5.960_0_1.jpg\"}]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_transaksi`
--

CREATE TABLE `history_transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tiket_1` int(11) NOT NULL,
  `id_tiket_2` int(11) NOT NULL,
  `penumpang` int(11) NOT NULL,
  `total_bayar` bigint(20) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `data_penumpang` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data_penumpang`)),
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history_transaksi`
--

INSERT INTO `history_transaksi` (`id`, `id_user`, `id_tiket_1`, `id_tiket_2`, `penumpang`, `total_bayar`, `jenis`, `data_penumpang`, `tanggal_transaksi`) VALUES
(4, 4, 2, 3, 2, 3948000, 'Tiket Pesawat', '[{\"nama_lengkap\":\"Wahyu widyanto\",\"nik\":\"123456\",\"seat\":1,\"grup\":\"B\"},{\"nama_lengkap\":\"Widi\",\"nik\":\"852963\",\"seat\":2,\"grup\":\"B\"}]', '2021-08-22 09:12:35'),
(5, 4, 1, 0, 3, 3285000, 'Tiket Pesawat', '[{\"nama_lengkap\":\"WAHYU WIDYANTO\",\"nik\":\"123456\",\"seat\":1,\"grup\":\"B\"},{\"nama_lengkap\":\"WAHYU WIDYANTO\",\"nik\":\"123456\",\"seat\":2,\"grup\":\"B\"},{\"nama_lengkap\":\"WAHYU WIDYANTO\",\"nik\":\"123456\",\"seat\":3,\"grup\":\"B\"}]', '2021-08-22 15:44:21'),
(6, 4, 1, 2, 1, 82000, 'Tiket Kereta Api', NULL, '2021-08-22 16:45:05'),
(7, 4, 1, 0, 1, 40000, 'Tiket Kereta Api', '[{\"nama_lengkap\":\"WAHYU WIDY\",\"nik\":\"123456\",\"seat\":1,\"grup\":5}]', '2021-08-22 16:48:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket_kereta`
--

CREATE TABLE `tiket_kereta` (
  `id` int(11) NOT NULL,
  `kereta` varchar(50) DEFAULT NULL,
  `dari` varchar(50) DEFAULT NULL,
  `tujuan` varchar(50) NOT NULL,
  `berangkat` date DEFAULT NULL,
  `jam_berangkat` time DEFAULT NULL,
  `harga` bigint(20) NOT NULL DEFAULT 0,
  `logo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiket_kereta`
--

INSERT INTO `tiket_kereta` (`id`, `kereta`, `dari`, `tujuan`, `berangkat`, `jam_berangkat`, `harga`, `logo`) VALUES
(1, 'Bima', 'Surabaya', 'Malang', '2021-08-22', '23:38:20', 40000, NULL),
(2, 'Bima', 'Malang', 'Surabaya', '2021-08-22', '23:38:20', 42000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket_pesawat`
--

CREATE TABLE `tiket_pesawat` (
  `id` int(11) NOT NULL,
  `maskapai` varchar(50) NOT NULL DEFAULT '-',
  `kode_penerbangan` varchar(50) DEFAULT '-',
  `dari` varchar(50) NOT NULL DEFAULT '-',
  `tujuan` varchar(50) NOT NULL DEFAULT '-',
  `berangkat` date DEFAULT NULL,
  `jam_berangkat` time DEFAULT NULL,
  `harga` bigint(20) UNSIGNED DEFAULT NULL,
  `logo` varchar(50) DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiket_pesawat`
--

INSERT INTO `tiket_pesawat` (`id`, `maskapai`, `kode_penerbangan`, `dari`, `tujuan`, `berangkat`, `jam_berangkat`, `harga`, `logo`) VALUES
(1, 'Tes', 'G12', 'Surabaya', 'Jakarta', '2021-08-22', '13:00:13', 1095000, 'garuda-indonesia.png'),
(2, 'Tes2', 'G13', 'Surabaya', 'Jakarta', '2021-08-22', '13:00:14', 985000, 'garuda-indonesia.png'),
(3, 'Tes2', 'G14', 'Jakarta', 'Surabaya', '2021-08-22', '13:00:14', 989000, 'garuda-indonesia.png'),
(4, 'Tes2', 'G15', 'Jakarta', 'Surabaya', '2021-08-22', '13:00:14', 1125000, 'garuda-indonesia.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `kelamin` varchar(20) DEFAULT '-',
  `alamat` varchar(128) DEFAULT '-',
  `kota` varchar(50) DEFAULT '-',
  `provinsi` varchar(50) DEFAULT '-',
  `kodepos` varchar(10) DEFAULT '-',
  `nik` varchar(16) DEFAULT '-',
  `status` int(11) NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 105,
  `pin` int(11) NOT NULL DEFAULT 0,
  `foto` varchar(50) DEFAULT 'noprofile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `email`, `kelamin`, `alamat`, `kota`, `provinsi`, `kodepos`, `nik`, `status`, `role`, `pin`, `foto`) VALUES
(4, 'admin', 'admin', '$2y$10$uq7W2O.Uafss.ns0WCXdNuDb9RI6d0.itm50.USA8xC3vXt7drz8u', 'admin@a.com', 'Laki-Laki', 'Babatan 15E', 'Surabaya', '-', '60113', '-', 1, 102, 123456, '6122866da77e3.jpeg'),
(8, 'user', 'user', '$2y$10$4t5sCEU5Dfgoa0nX5a3H/uDX3Vre4PdhrC/ij3ljCmRsxCV1hiozu', 'user@g.c', '-', '-', '-', '-', '-', '-', 1, 105, 0, 'noprofile.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akomodasi_history_transaksi`
--
ALTER TABLE `akomodasi_history_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akomodasi_penginapan`
--
ALTER TABLE `akomodasi_penginapan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_transaksi`
--
ALTER TABLE `history_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket_kereta`
--
ALTER TABLE `tiket_kereta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket_pesawat`
--
ALTER TABLE `tiket_pesawat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akomodasi_history_transaksi`
--
ALTER TABLE `akomodasi_history_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=484127;

--
-- AUTO_INCREMENT untuk tabel `akomodasi_penginapan`
--
ALTER TABLE `akomodasi_penginapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `history_transaksi`
--
ALTER TABLE `history_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tiket_kereta`
--
ALTER TABLE `tiket_kereta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tiket_pesawat`
--
ALTER TABLE `tiket_pesawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
