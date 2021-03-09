-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2021 pada 05.36
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelompok-4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` varchar(1000) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `kode_inventaris` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama`, `penulis`, `kondisi`, `keterangan`, `jumlah`, `id_jenis`, `tanggal_rilis`, `kode_inventaris`) VALUES
(1, 'Attack On Titan', 'hajime isiyama', 'ongoing', 'manga-manga anime', '100', 2, '2021-02-02', '0001'),
(2, 'Black Clover', 'Yuuki Tabata', 'on going', 'manga anime', '99', 2, '2017-02-02', '0002'),
(3, 'DR.STONE', '\r\nRiichiro Inagaki', 'on going', 'Batu', '100', 2, '2020-07-19', '0003'),
(4, 'One Piece', 'Eiichiro Oda', 'on going', 'Bajak Laut', '1000', 2, '1997-07-22', '0004'),
(5, 'Fairy Tail', 'Kodansha', 'Tamat', 'Sihir', '200', 2, '2008-08-02', '0005'),
(6, 'Naruto', 'Masashi Kishimoto', 'Tamat', 'Ninja', '500', 2, '1999-09-21', '0006'),
(7, 'Sword Art Online', 'Reki Kawahara', 'on going', 'game', '100', 2, '2009-04-10', '0007'),
(8, 'Go-Tōbun no Hanayome', 'Negi Haruba', 'on going', 'Kembar 5', '99', 2, '2017-08-09', '0008'),
(14, ' I Have A Mansion In The Post Apocalyptic World', 'Min Man Tian Xia', 'ongoing', 'komik', '100', 3, '2021-02-02', '0009'),
(15, 'The Last Human', ' Amazing Works', 'ongoing', 'komik', '100', 3, '2018-12-31', '00010'),
(16, 'The Beginning After The End', 'TurtleMe', 'ongoing', 'komik', '100', 3, '2021-02-08', '00011'),
(17, 'Solo Leveling', 'Chugong', 'ongoing', 'komik', '100', 3, '2018-03-04', '00012'),
(18, 'I Am Daxianzun', 'Shili Jianshen', 'ongoing', 'Korean Comic', '100', 3, '2018-03-24', '00013'),
(19, 'Martial Peak', 'Momo 莫默.', 'ongoing', 'komik', '100', 3, '2017-06-01', '00014'),
(20, 'THE GAMER', 'Sung Sang-Young', 'ongoing', 'komik', '100', 3, '2021-02-05', '00015'),
(21, 'Magic Emperor', 'Ye Xiao', 'ongoing', 'komik', '100', 3, '2020-03-04', '00016'),
(29, 'Boostrap 3', 'Alpat Bimantara Wijaya', 'tamat', 'buku edukatif', '100', 1, '2021-03-01', '00017'),
(30, 'Dasar Algoritma Dan Pemrograman Dasar', 'Henny Harumi', 'tamat', 'buku edukatif', '50', 1, '2021-03-01', '00018'),
(31, 'Buku Bahasa Pemrograman Lengkap', 'Suprapto', 'Tamat', 'buku edukatif', '30', 1, '2021-03-01', '00019'),
(32, 'Pyhton', 'MS HAsibuan', 'Tamat', 'buku edukatif', '45', 1, '2021-03-02', '00020'),
(33, 'Belajar Membuat Website', 'David Odang', 'tamat', 'buku edukatif', '10', 1, '2021-03-01', '00021'),
(34, 'JAVA', 'Abdul Kadir', 'tamat', 'buku edukatif', '30', 1, '2021-03-01', '00022'),
(35, 'Pemograman Web Dengan PHP Dan MySQL', 'Achma Solohin', 'tamat', 'buku edukatif', '45', 1, '2021-03-01', '00023'),
(36, 'Photoshop', 'Min Man Tian Xia', 'tamat', 'buku edukatif', '10', 1, '2021-03-02', '00024'),
(37, 'Pemberontakan PKI dimadiun', 'Rachmat Susatyo\r\n', 'tamat', 'buku sejarah', '100', 4, '2021-03-17', '00025'),
(38, 'Perjuangan pemuda surabaya', 'Perjuangan pemuda surabaya', 'tamat', 'buku sejarah', '50', 4, '2021-03-27', '00026'),
(39, 'Mitologi Yunani', 'Zeus', 'Tamat', 'Buku mitologi ', '99', 5, '1000-10-01', '00027');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL,
  `kode_jenis` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan`) VALUES
(1, 'Edukatif', '001', 'buku edukatif'),
(2, 'Manga', '002', 'manga-manga anime'),
(3, 'Manhwa', '003', 'Korean Comic'),
(4, 'sejarah', '004', 'buku sejarah'),
(5, 'mitologi', '005', 'buku mitologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(5) NOT NULL,
  `nama_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(5) NOT NULL,
  `id_inventaris` int(5) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `status_peminjaman` varchar(100) NOT NULL,
  `id_user` int(5) NOT NULL,
  `Jumlah` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_inventaris`, `tanggal_pinjam`, `status_peminjaman`, `id_user`, `Jumlah`) VALUES
(25, 2, '2021-03-08', 'belum dikembalikan', 1, '1'),
(30, 39, '2021-03-09', 'belum dikembalikan', 2, '1');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `delete_jumlah` BEFORE DELETE ON `peminjaman` FOR EACH ROW BEGIN
  UPDATE inventaris SET jumlah=jumlah+OLD.jumlah
  WHERE id_inventaris = OLD.id_inventaris;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_jumlah` BEFORE INSERT ON `peminjaman` FOR EACH ROW BEGIN
  UPDATE inventaris SET jumlah=jumlah-NEW.jumlah
  WHERE id_inventaris = NEW.id_inventaris;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `id_level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `alamat`, `telepon`, `id_level`) VALUES
(1, 'kazuma', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'japan,hokaido', '+81-805-5554-060', 1),
(2, 'Tanjiro', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'japan,hokaido', '+81-805-5539-140', 2),
(22, 'Alpat', 'alpat', '202cb962ac59075b964b07152d234b70', 'japan,hokaido', '+81-705-5524-087', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_inventaris` (`id_inventaris`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_4` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
