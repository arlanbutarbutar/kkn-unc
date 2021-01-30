-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2021 pada 11.56
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkn_unc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`, `id_kecamatan`, `id_pembimbing`) VALUES
(1, '-', 1, 4),
(4, 'Nunbaun Delha', 3, 1),
(5, 'airmata', 3, 3),
(6, 'Nunbaun Sabu', 3, 3),
(7, 'mantasi', 2, 1),
(8, 'manutapen', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(13) DEFAULT '-',
  `id_jurusan` int(11) DEFAULT 6,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama_dosen`, `email`, `password`, `no_hp`, `id_jurusan`, `role_id`) VALUES
(1, 1, 'Agustina Manbait', 'dosen1@yahoo.com', '$2y$10$PFg2dMicY9xXksnOoNWwh.yZ78i/rVtRIm5rZPTINVr6S2QtYYIPa', '081339000111', 10, 2),
(2, 2, 'Christina Aguilera', 'dosen2@gmail.com', '$2y$10$PFg2dMicY9xXksnOoNWwh.yZ78i/rVtRIm5rZPTINVr6S2QtYYIPa', '090290', 23, 2),
(3, 3, 'Unge', 'bcllovers@gmail.com', '$2y$10$PFg2dMicY9xXksnOoNWwh.yZ78i/rVtRIm5rZPTINVr6S2QtYYIPa', '3456789', 13, 2),
(4, 0, NULL, NULL, '', '-', 1, 3),
(36, 414234, 'support', 'netmediaframecode@gmail.com', '$2y$10$m/6Ca0IgpG6ueUj3JzTQhezS7S9FAXDHYz1E3Mx14VS4hEBDHmjrW', '081111', 26, 2),
(37, 78675, 'admin', 'angel@gmail.com', '$2y$10$MHedIsH/Gq5JcutNdrtRkultQIKPcEkQJY/Q5JXzStVN/K3wck8MK', '081111', 23, 2),
(38, 967674, 'fjar', 'costumer@gmail.com', '$2y$10$Z8xpzXRriMCm7qc6a5TFoudQarDBoN.ltAIb0Ti9iaTRfIBJhIzNG', '084353', 25, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'FST'),
(2, 'FH'),
(3, 'FISIP'),
(4, 'FKIP'),
(5, 'FKM'),
(6, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL,
  `id_fakultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `id_fakultas`) VALUES
(1, '-', 6),
(6, 'Teknik Elektro', 1),
(7, 'Teknik Arsitek', 1),
(10, 'Ilmu Komputer', 1),
(11, 'Bahasa Inggris', 4),
(12, 'Matematika', 4),
(13, 'PGSD', 4),
(14, 'Gizi Kesehatan Masyarakat', 5),
(20, 'Epidemiologi dan Biostati', 5),
(22, 'Psikologi', 5),
(23, 'Hukum Perdata', 2),
(24, 'Hukum Pidana', 2),
(25, 'Hukum Internasional', 2),
(26, 'Ilmu Politik', 3),
(27, 'Ilmu Komunikasi', 3),
(28, 'Administrasi Negara', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `nama_kabupaten`) VALUES
(1, '-'),
(8, 'Timor Tengah Selatan'),
(14, 'Kota Kupang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `id_kabupaten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `id_kabupaten`) VALUES
(1, '-', 1),
(2, 'HOI', 8),
(3, 'Alak', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nama_kelompok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `id_dosen`, `id_desa`, `nama_kelompok`) VALUES
(1, 1, 5, '-'),
(17, 1, 4, '001'),
(18, 2, 8, '002'),
(19, 3, 6, '003'),
(21, 3, 8, '005'),
(22, 2, 7, '004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `hp` varchar(12) NOT NULL DEFAULT '0',
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `laporan` varchar(100) NOT NULL DEFAULT '-',
  `bukti_regis` varchar(200) NOT NULL,
  `bukti_khs_akir` varchar(125) NOT NULL,
  `tgl_daftar` varchar(35) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `nama_mhs`, `id_jurusan`, `email`, `hp`, `sks`, `semester`, `id_kelompok`, `laporan`, `bukti_regis`, `bukti_khs_akir`, `tgl_daftar`, `id_status`) VALUES
(2, 120000000, 'FERI', 22, 'astrid1297@gmail.com', '082147483647', 110, 0, 18, 'Menyusul', '', '', '', 1),
(3, 1206032009, 'Debora Ga', 13, 'deboraga45@gmail.com', '082147483647', 110, 0, 19, 'Menyusul la', '', '', '', 2),
(4, 1206032012, 'Natalo Haba ', 25, 'habanatalo@gmail.com', '082147483647', 110, 0, 18, 'Menyusul', '', '', '', 3),
(6, 1206032022, 'Bendelina Djingi', 13, 'bendedjingi@gmail.com', '082147483647', 110, 0, 21, 'Menyusul', '', '', '', 3),
(7, 1206032024, 'Marthinus Loro Djara', 20, 'ldmarthinus@gmail.com', '082147483647', 110, 0, 21, 'Menyusul', '', '', '', 3),
(8, 1206032026, 'Peu Haba', 6, 'peuhaba78@yahoo.com', '082147483647', 110, 0, 19, 'Menyusul', '', '', '', 1),
(9, 1206032040, 'Henny Kristianus', 22, 'hennykristianus@gmail.com', '082147483647', 110, 0, 19, 'Menyusul', '', '', '', 3),
(10, 1206032041, 'Deaszy A. Tatengkeng', 22, 'deaszytatengkeng@gmail.co', '082147483647', 110, 0, 17, 'Menyusul', '', '', '', 3),
(11, 1206032044, 'Heppy Radja Dima', 27, 'heppyradjadima@gmail.com', '082147483647', 110, 0, 19, 'Menyusul', '', '', '', 3),
(12, 1206032045, 'Mel Atok', 11, 'mel.atok20@gmail.com', '082147483647', 110, 0, 21, 'Menyusul', '', '', '', 3),
(13, 1306032000, 'Ary M. Sugiono', 7, 'arysugiono@gmail.com', '082147483647', 98, 0, 21, 'Menyusul', '', '', '', 1),
(14, 1306032001, 'Antonia Radja', 12, 'nhyaaradja@yahoo.co.id', '2147483647', 98, 0, 17, 'Menyusul', '', '', '', 3),
(15, 1306032002, 'Jheny R. Djami', 23, 'jieenydjami@gmail.com', '082147483647', 98, 0, 17, 'Menyusul', '', '', '', 2),
(16, 1306032003, 'Febryani Dima Huda', 14, 'fheexelia10@gmail.com', '082147483647', 98, 0, 17, 'Menyusul', '', '', '', 3),
(17, 1306032004, 'Novitha Ngili', 20, 'ithangili04@gmail.com', '082147483647', 98, 0, 18, 'Menyusul', '', '', '', 3),
(18, 1306032005, 'Yosinta Koro Lulu', 28, 'sintakorolulu@gmail.com', '082147483647', 98, 0, 18, 'Menyusul', '', '', '', 3),
(19, 1306032006, 'Reynhard Djami', 6, 'reydjami02@gmail.com', '082147483647', 111, 7, 21, 'Menyusul', '(1306032006) Reynhard Djami.jpg', '(1306032006) Reynhard Djami.jpg', '', 1),
(20, 1306032007, 'Rembram Ludji Haba', 23, 'triolh27@yahoo.com', '082147483647', 98, 0, 19, 'Menyusul', '', '', '', 2),
(21, 1306032008, 'Randy Lomi Wadu', 25, 'randylw28@gmail.com', '082147483647', 98, 0, 20, 'Menyusul', '', '', '', 3),
(22, 1306032009, 'Dwy Haba', 13, 'dwyhab24@gmail.com', '082147483647', 98, 0, 19, 'Menyusul', '', '', '', 3),
(23, 1306032010, 'Ricko Dju Rohi', 14, 'rickodju08@yahoo.co', '082147483647', 98, 0, 17, 'Menyusul', '', '', '', 3),
(24, 1306032011, 'Dicky Lomi', 24, 'dickylomi27@gmail.com', '082147483647', 98, 0, 17, 'Menyusul', '', '', '', 3),
(25, 1306032012, 'Ary Hae', 25, 'aryhae23@yahoo.com', '082147483647', 98, 0, 18, 'Menyusul', '', '', '', 3),
(26, 1306032013, 'Selviana Radja', 27, 'selviradja46@gmail.com', '082147483647', 98, 0, 19, 'Menyusul', '', '', '', 3),
(27, 1306032014, 'Willy S. Uly', 24, 'willysuryahanda@gmail.com', '082147483647', 98, 0, 21, 'Menyusul', '', '', '', 3),
(28, 1306032015, 'Rivaldy Djari', 26, 'rivaldydjari46@gmail.com', '082147483647', 98, 0, 21, 'Menyusul', '', '', '', 3),
(29, 1306032016, 'Dina Djami', 20, 'nonadj08@gmail.com', '082147483647', 98, 0, 19, 'Menyusul', '', '', '', 3),
(30, 1306032017, 'Feny Muskitta', 11, 'fenymuskitta@yahoo.com', '082147483647', 98, 0, 17, 'Menyusul', '', '', '', 3),
(31, 1306032019, 'Yordan Haba Ti', 7, 'ht.yordan@gmail.com', '082147483647', 98, 0, 18, 'Menyusul', '', '', '', 1),
(32, 1306032021, 'Yenni Ratu', 13, 'yenniratu04@gmail.com', '082147483647', 98, 0, 17, 'Menyusul', '', '', '', 3),
(33, 1306032022, 'Danny Beeh', 10, 'dannybeeh01@gmail.com', '082147483647', 98, 0, 21, 'Menyusul', '', '', '', 2),
(34, 1306032024, 'Putra L. Maisal', 10, 'lindomaisal58@gmailcom', '082147483647', 98, 0, 19, 'Menyusul', '', '', '', 2),
(35, 1306032029, 'Anggraeny Eka Dewi', 27, 'anggrenytwd@gmail.com', '082147483647', 98, 0, 19, 'Menyusul', '', '', '', 3),
(36, 1306032030, 'Eny Monica', 10, 'monicaeny30@gmail.com', '082147483647', 98, 0, 21, 'Menyusul', '', '', '', 2),
(37, 1306032040, 'Bae Suzy', 28, 'baesuzy100994@gmail.com', '082147483647', 98, 0, 17, 'Menyusul', '', '', '', 3),
(38, 1306032041, 'Desri H. Ti Wadu', 6, 'desri.hosiana@yahoo.com', '082147483647', 98, 0, 17, 'Menyusul', '', '', '', 2),
(39, 1306032042, 'Rinaldy Duma', 24, 'rinaldyduma@gmail.com', '082147483647', 98, 0, 17, 'Menyusul', '', '', '', 3),
(40, 1306032047, 'Natalia Mangngi', 6, 'nataliamangngi@yahoo.com', '082147483647', 98, 0, 18, 'Menyusul', '', '', '', 1),
(41, 1306032050, 'Sheren Avrilie', 22, 'zheren125@gmail.com', '082147483647', 110, 0, 18, 'Menyusul', '', '', '', 3),
(42, 1306032078, 'Rinaldy Adi Putra', 23, 'rp12345@gmail.com', '082147483647', 98, 0, 21, 'Menyusul', '', '', '', 3),
(43, 1306032098, 'Vivin Crisdayana', 14, 'vivingresty@gmail.com', '082147483647', 98, 0, 17, 'Menyusul', '', '', '', 3),
(44, 1306032099, 'Harry Prasetya', 12, 'harrypras19@gmail.com', '082147483647', 98, 0, 17, 'Menyusul', '', '', '', 3),
(60, 23118036, 'Arlan Butar Butar', 10, 'arlan270899@gmail.com', '08113827421', 110, 6, 22, 'sudah ada', '(23118036) Arlan Butar Butar.jpg', '(23118036) Arlan Butar Butar.jpg', '2020-11-28', 2),
(61, 231, 'Bakar', 11, 'sisilia@gmail.com', '0811', 110, 7, 1, '-', '(231) Bakar.jpg', '(231) Bakar.jpg', '2020-11-30', 3),
(62, 23118041, 'itha lay kudji', 10, 'itha@gmail.com', '0811', 115, 7, 22, '-', '(23118041) itha lay kudji.jpg', '(23118041) itha lay kudji.jpg', '2020-12-28', 1),
(63, 23118044, 'putri', 6, 'putriraki240800@gmail.com', '0811', 111, 7, 1, '-', '(23118044) putri.jpg', '(23118044) putri.jpg', '2021-01-05', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Approved'),
(2, 'Not Approved'),
(3, 'Checking');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role_id` int(2) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `password`, `username`, `email`, `role_id`) VALUES
(202027, '$2y$10$PFg2dMicY9xXksnOoNWwh.yZ78i/rVtRIm5rZPTINVr6S2QtYYIPa', 'desry', 'desry@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`role_id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Dosen Pembimbing Lapangan'),
(3, '-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_pembimbing` (`id_pembimbing`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202031;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
