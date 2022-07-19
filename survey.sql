-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2022 pada 10.32
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orderan_survey`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik`
--

CREATE TABLE `kritik` (
  `id_kritik` int(11) NOT NULL,
  `kritik_code` varchar(10) NOT NULL,
  `kritik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kritik`
--

INSERT INTO `kritik` (`id_kritik`, `kritik_code`, `kritik`) VALUES
(2, 'GwpKO', 'Bagus sih'),
(3, 'hvs6R', 'Baguss'),
(4, '6BAVg', 'Mantap\r\n'),
(5, 'Xq7kj', 'Nice'),
(6, 'MidHq', 'Untuk selebihnya mantap'),
(7, 'O19jn', 'Mantap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `layanan_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `layanan_nama`) VALUES
(1, 'Layanan 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opd`
--

CREATE TABLE `opd` (
  `id_opd` int(11) NOT NULL,
  `opd_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `opd`
--

INSERT INTO `opd` (`id_opd`, `opd_nama`) VALUES
(1, 'ODP 1'),
(2, 'ODP 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`) VALUES
(1, 'Bagaimana pemahaman Saudara Tentang Kemudahan prosedur layanan di unit layanan ini?'),
(3, 'Bagaimana pendapat Saudara tentang kesamaan persyaratan pelayanan dengan jenis pelayanannya?'),
(4, 'Bagaimana pendapat Saudara tentang kejelasan dan kepastian petugas yang melayani?'),
(5, 'Bagaimana pendapat Saudara tentang kedisiplinan petugas dalam memberikan pelayanan?'),
(6, 'Bagaimana pendapat Saudara tentang tanggung jawab petugas dalam memberikan pelayanan?'),
(7, 'Bagaimana pendapat Saudara tentang kecepatan pelayanan di unit ini?'),
(8, 'Bagaimana pendapat Saudara tentang kesopanan dan keramahan petugas dalam memberikan pelayanan?'),
(9, 'Bagaimana pendapat Saudara tentang keamanan dan kenyamanan di lingkungan unit pelayanan?'),
(10, 'Bagaimana pendapat Saudara tentang ketepatan pelaksanaan terhadap jadwal waktu pelayanan?'),
(11, 'Bagaimana pendapat Saudara tentang kewajaran biaya untuk mendapatkan pelayanan?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_result`
--

CREATE TABLE `pertanyaan_result` (
  `id_result` int(11) NOT NULL,
  `result_peserta` int(11) NOT NULL,
  `result_pertanyaan` int(11) NOT NULL,
  `result_jawaban` varchar(50) NOT NULL DEFAULT 'Tidak Menjawab',
  `result_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertanyaan_result`
--

INSERT INTO `pertanyaan_result` (`id_result`, `result_peserta`, `result_pertanyaan`, `result_jawaban`, `result_code`) VALUES
(11, 2, 1, 'Kurang', 'GwpKO'),
(12, 2, 3, 'Cukup', 'GwpKO'),
(13, 2, 4, 'Puas', 'GwpKO'),
(14, 2, 5, 'Sangat Puas', 'GwpKO'),
(15, 2, 6, 'Puas', 'GwpKO'),
(16, 2, 7, 'Cukup', 'GwpKO'),
(17, 2, 8, 'Kurang', 'GwpKO'),
(18, 2, 9, 'Cukup', 'GwpKO'),
(19, 2, 10, 'Puas', 'GwpKO'),
(20, 2, 11, 'Sangat Puas', 'GwpKO'),
(21, 3, 1, 'Kurang', 'hvs6R'),
(22, 3, 3, 'Cukup', 'hvs6R'),
(23, 3, 4, 'Puas', 'hvs6R'),
(24, 3, 5, 'Sangat Puas', 'hvs6R'),
(25, 3, 6, 'Puas', 'hvs6R'),
(26, 3, 7, 'Cukup', 'hvs6R'),
(27, 3, 8, 'Kurang', 'hvs6R'),
(28, 3, 9, 'Cukup', 'hvs6R'),
(29, 3, 10, 'Puas', 'hvs6R'),
(30, 3, 11, 'Sangat Puas', 'hvs6R'),
(31, 4, 1, 'Kurang', '6BAVg'),
(32, 4, 3, 'Cukup', '6BAVg'),
(33, 4, 4, 'Puas', '6BAVg'),
(34, 4, 5, 'Sangat Puas', '6BAVg'),
(35, 4, 6, 'Puas', '6BAVg'),
(36, 4, 7, 'Cukup', '6BAVg'),
(37, 4, 8, 'Kurang', '6BAVg'),
(38, 4, 9, 'Cukup', '6BAVg'),
(39, 4, 10, 'Puas', '6BAVg'),
(40, 4, 11, 'Sangat Puas', '6BAVg'),
(41, 5, 1, 'Cukup', 'Xq7kj'),
(42, 5, 3, 'Kurang', 'Xq7kj'),
(43, 5, 4, 'Puas', 'Xq7kj'),
(44, 5, 5, 'Cukup', 'Xq7kj'),
(45, 5, 6, 'Sangat Puas', 'Xq7kj'),
(46, 5, 7, 'Cukup', 'Xq7kj'),
(47, 5, 8, 'Puas', 'Xq7kj'),
(48, 5, 9, 'Cukup', 'Xq7kj'),
(49, 5, 10, 'Cukup', 'Xq7kj'),
(50, 5, 11, 'Puas', 'Xq7kj'),
(51, 6, 1, 'Kurang', 'MidHq'),
(52, 6, 3, 'Puas', 'MidHq'),
(53, 6, 4, 'Cukup', 'MidHq'),
(54, 6, 5, 'Cukup', 'MidHq'),
(55, 6, 6, 'Puas', 'MidHq'),
(56, 6, 7, 'Cukup', 'MidHq'),
(57, 6, 8, 'Sangat Puas', 'MidHq'),
(58, 6, 9, 'Puas', 'MidHq'),
(59, 6, 10, 'Puas', 'MidHq'),
(60, 6, 11, 'Cukup', 'MidHq'),
(61, 7, 1, 'Puas', 'O19jn'),
(62, 7, 3, 'Cukup', 'O19jn'),
(63, 7, 4, 'Puas', 'O19jn'),
(64, 7, 5, 'Kurang', 'O19jn'),
(65, 7, 6, 'Cukup', 'O19jn'),
(66, 7, 7, 'Sangat Puas', 'O19jn'),
(67, 7, 8, 'Cukup', 'O19jn'),
(68, 7, 9, 'Puas', 'O19jn'),
(69, 7, 10, 'Kurang', 'O19jn'),
(70, 7, 11, 'Puas', 'O19jn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `peserta_layanan` int(11) NOT NULL,
  `peserta_opd` int(11) NOT NULL,
  `peserta_nama` varchar(200) NOT NULL,
  `peserta_jk` varchar(20) NOT NULL,
  `peserta_pekerjaan` varchar(50) NOT NULL,
  `peserta_alamat` text NOT NULL,
  `peserta_hp` varchar(30) NOT NULL,
  `peserta_code` varchar(10) NOT NULL,
  `peserta_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `peserta_layanan`, `peserta_opd`, `peserta_nama`, `peserta_jk`, `peserta_pekerjaan`, `peserta_alamat`, `peserta_hp`, `peserta_code`, `peserta_date`) VALUES
(2, 1, 1, 'Ilham Budiawan Sitorus', 'Laki-Laki', 'Freelance', 'Medan', '0895601773394', 'GwpKO', '2022-07-15 16:50:52'),
(3, 1, 2, 'Ilham Budiawan Sitorus', 'Laki-Laki', 'Freelance', 'Medan', '0895601773394', 'hvs6R', '2022-07-15 22:40:02'),
(4, 1, 1, 'Dhea Safitri', 'Perempuan', 'Freelance', 'Medan', '08964895895', '6BAVg', '2022-07-16 09:45:32'),
(5, 1, 2, 'Sri Sari Yani', 'Perempuan', 'Freelance', 'Medan', '085637484734', 'Xq7kj', '2022-07-16 12:10:43'),
(6, 1, 1, 'Demo', 'Laki-Laki', 'Freelance', 'Medan', '089568696586', 'MidHq', '2022-07-16 19:22:55'),
(7, 1, 1, 'Dhea Safitri', 'Perempuan', 'Freelance', 'Medan', '08464646467', 'O19jn', '2022-07-18 14:54:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user_nama`, `user_username`, `user_password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'Ilham Budiawan Sitorus', 'ilhambudiawan', 'b63d204bf086017e34d8bd27ab969f28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kritik`
--
ALTER TABLE `kritik`
  ADD PRIMARY KEY (`id_kritik`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id_opd`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indeks untuk tabel `pertanyaan_result`
--
ALTER TABLE `pertanyaan_result`
  ADD PRIMARY KEY (`id_result`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kritik`
--
ALTER TABLE `kritik`
  MODIFY `id_kritik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `opd`
--
ALTER TABLE `opd`
  MODIFY `id_opd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_result`
--
ALTER TABLE `pertanyaan_result`
  MODIFY `id_result` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
