-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 05:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_kuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(12) NOT NULL,
  `agama` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katolik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `data_keluarga`
--

CREATE TABLE `data_keluarga` (
  `id_data_kel` int(12) NOT NULL,
  `nama_ortu` varchar(70) NOT NULL,
  `pekerjaan_ortu` varchar(70) NOT NULL,
  `penghasilan_ortu` varchar(70) NOT NULL,
  `no_telp_ortu` varchar(30) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `id_pendaftaran` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_keluarga`
--

INSERT INTO `data_keluarga` (`id_data_kel`, `nama_ortu`, `pekerjaan_ortu`, `penghasilan_ortu`, `no_telp_ortu`, `alamat_ortu`, `id_pendaftaran`) VALUES
(1, 'fdgfdgd', 'fdgdfgfd', '34543543', '35436754676764', 'Jln Medang No 6 Perum Kodim', 1),
(2, 'testerr', 'testerrr', '10000000', '08113711998', 'Jln Medang No 6 Perum Kodim', 2),
(3, 'dsfsdfsdfsd', 'sdfsdsdf', '10000000', '0811377998', 'Jln Medang No 6 Perum Kodim', 3);

-- --------------------------------------------------------

--
-- Table structure for table `file_camaba`
--

CREATE TABLE `file_camaba` (
  `id_file` int(12) NOT NULL,
  `file` text NOT NULL,
  `status` int(12) NOT NULL,
  `id_pendaftaran` int(12) NOT NULL,
  `created` datetime NOT NULL,
  `baca` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_camaba`
--

INSERT INTO `file_camaba` (`id_file`, `file`, `status`, `id_pendaftaran`, `created`, `baca`) VALUES
(1, 'http://localhost/tugas_kuliah/assets/file/bukti_transfer-c81d94c46fbe8fea1c3c1ea26ab93f3b.jpg', 1, 1, '0000-00-00 00:00:00', 0),
(2, 'http://localhost/tugas_kuliah/assets/file/foto_camaba-0aba92c6ffe991248475d37a32ceb02c.png', 1, 1, '0000-00-00 00:00:00', 0),
(3, 'http://localhost/tugas_kuliah/assets/file/identitas_camaba-c9fcf5c4777c04343cf57da82dcd902f.png', 1, 1, '0000-00-00 00:00:00', 0),
(4, 'http://localhost/tugas_kuliah/assets/file/ijazah_camaba-a9acf413588f80e2dd74ed794937c304.jpg', 1, 1, '0000-00-00 00:00:00', 0),
(5, 'http://localhost/tugas_kuliah/assets/file/nilai_un_camaba-8091c22a90a4aeb04e6fceefb338f62d.png', 1, 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grade_tes_maba`
--

CREATE TABLE `grade_tes_maba` (
  `id_grade` int(12) NOT NULL,
  `tes_tulis` int(12) NOT NULL,
  `tes_psikologi` int(12) NOT NULL,
  `tes_wawancara` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_tes_maba`
--

INSERT INTO `grade_tes_maba` (`id_grade`, `tes_tulis`, `tes_psikologi`, `tes_wawancara`) VALUES
(1, 71, 75, 72);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id_group` int(12) NOT NULL,
  `nama_group` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id_group`, `nama_group`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_all`
--

CREATE TABLE `jadwal_all` (
  `_id` int(12) NOT NULL,
  `title` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `className` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_all`
--

INSERT INTO `jadwal_all` (`_id`, `title`, `deskripsi`, `start`, `end`, `className`) VALUES
(1, 'sdfsdf', 'tes', '2019-03-06 00:00:00', '2019-03-07 00:00:00', '#e74c3c'),
(2, 'Tes Wawancara Gelombang 1', 'jam segini ya bosku', '2019-04-10 00:00:00', '2019-04-11 00:00:00', '#e74c3c');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_gelombang`
--

CREATE TABLE `jadwal_gelombang` (
  `id_jadwal` int(12) NOT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `gelombang` int(12) NOT NULL,
  `tahun_pmb` int(12) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_gelombang`
--

INSERT INTO `jadwal_gelombang` (`id_jadwal`, `tanggal_buka`, `tanggal_tutup`, `gelombang`, `tahun_pmb`, `active`) VALUES
(1, '2019-02-14', '2019-08-30', 1, 2019, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tes_maba`
--

CREATE TABLE `nilai_tes_maba` (
  `kd_nilai_tes` int(12) NOT NULL,
  `id_pendaftaran` int(12) NOT NULL,
  `nilai_tes` int(12) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_tes_maba`
--

INSERT INTO `nilai_tes_maba` (`kd_nilai_tes`, `id_pendaftaran`, `nilai_tes`, `keterangan`) VALUES
(1, 1, 70, 'tes tulis'),
(2, 1, 90, 'tes psikologi'),
(3, 1, 80, 'tes wawancara');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id_notif` int(12) NOT NULL,
  `isi_notif` text NOT NULL,
  `id_user` int(12) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(12) NOT NULL,
  `nomor_pendaftaran` text NOT NULL,
  `nama_lengkap` varchar(70) NOT NULL,
  `tempat_lahir` varchar(70) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_agama` int(12) NOT NULL,
  `jenis_kelamin` int(5) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `status_kawin` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` varchar(60) NOT NULL,
  `tahun_lulus` int(12) NOT NULL,
  `rekomendasi_dari` varchar(70) NOT NULL,
  `pilihan_jalur` varchar(70) NOT NULL,
  `kode_pos` varchar(70) NOT NULL,
  `no_hp` varchar(32) NOT NULL,
  `foto` text NOT NULL,
  `prestasi_akademik` text NOT NULL,
  `prestasi_non_akademik` text NOT NULL,
  `created` datetime NOT NULL,
  `gelombang` int(11) NOT NULL,
  `tes_tulis` varchar(20) NOT NULL,
  `tes_psikologi` varchar(20) NOT NULL,
  `tes_wawancara` varchar(20) NOT NULL,
  `status_kelulusan` varchar(30) NOT NULL,
  `transfer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nomor_pendaftaran`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `id_agama`, `jenis_kelamin`, `pekerjaan`, `status_kawin`, `alamat`, `asal_sekolah`, `tahun_lulus`, `rekomendasi_dari`, `pilihan_jalur`, `kode_pos`, `no_hp`, `foto`, `prestasi_akademik`, `prestasi_non_akademik`, `created`, `gelombang`, `tes_tulis`, `tes_psikologi`, `tes_wawancara`, `status_kelulusan`, `transfer`) VALUES
(1, '2019-CIMW', 'Angger Pangestu Ari', 'Banyuwangi', '2019-02-14', 1, 1, 'webdeveloper', 'Belum Menikah', 'sadasdsad', 'sma negeri 1 indonesia', 2017, 'ertrete', 'S1 Reguler Pagi', '68416', '081216066542', 'http://localhost/tugas_kuliah/assets/img/a7088ea7322668e96dcd2149762b1bf4.jpg', 'erreret', 'retretre', '2019-03-12 10:39:54', 1, 'Tidak Lulus', 'proses', 'proses', 'proses', 'sudah'),
(3, '2019-PYBD', 'Ananda Dewi Febriyanti', 'Banyuwangi', '1999-02-08', 1, 2, 'webdeveloper', 'Belum Menikah', 'disanadisanadisanadisanadisanadisanadisanadisanadisanadisanadisanadisana', 'sma negeri 1 indonesia', 2017, 'Angger', 'S1 Reguler Sore', '68416', '081216066542', 'http://localhost/tugas_kuliah/assets/img/451e4ff6516a25a8b040940fb3cc4069.jpg', 'gatauu sayaa', 'Angger', '2019-07-30 22:26:17', 1, 'proses', 'proses', 'proses', 'proses', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `created` datetime NOT NULL,
  `id_pendaftaran` int(12) NOT NULL,
  `last_login` datetime NOT NULL,
  `failed_login` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `id_pendaftaran`, `last_login`, `failed_login`) VALUES
(1, 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', 'admin@admin.com', '2019-03-11 00:00:00', 0, '2020-03-17 14:20:06', 0),
(3, 'angger14', '$2y$10$yPX6ueEfmDxEwrd5RJKly.cAhWUMVDpailPAlXkSwpcsaQ5IExjva', 'angger.pangestu.ari@gmail.com', '2019-03-12 10:39:54', 1, '2020-04-02 10:57:55', 0),
(5, 'ananda08', '$2y$10$Jeqx7OffDxcM9nbC7HnEr.XivDmWYp2Y4f7dINi7xc/SYxy4Eh6ZW', 'angger.pangestu.ari@gmail.com', '2019-07-30 22:26:17', 3, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id_user_groups` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `id_group` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id_user_groups`, `id_user`, `id_group`) VALUES
(1, 1, 1),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  ADD PRIMARY KEY (`id_data_kel`);

--
-- Indexes for table `file_camaba`
--
ALTER TABLE `file_camaba`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `grade_tes_maba`
--
ALTER TABLE `grade_tes_maba`
  ADD PRIMARY KEY (`id_grade`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `jadwal_all`
--
ALTER TABLE `jadwal_all`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `jadwal_gelombang`
--
ALTER TABLE `jadwal_gelombang`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `nilai_tes_maba`
--
ALTER TABLE `nilai_tes_maba`
  ADD PRIMARY KEY (`kd_nilai_tes`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id_user_groups`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  MODIFY `id_data_kel` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `file_camaba`
--
ALTER TABLE `file_camaba`
  MODIFY `id_file` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grade_tes_maba`
--
ALTER TABLE `grade_tes_maba`
  MODIFY `id_grade` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_all`
--
ALTER TABLE `jadwal_all`
  MODIFY `_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_gelombang`
--
ALTER TABLE `jadwal_gelombang`
  MODIFY `id_jadwal` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_tes_maba`
--
ALTER TABLE `nilai_tes_maba`
  MODIFY `kd_nilai_tes` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id_user_groups` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
