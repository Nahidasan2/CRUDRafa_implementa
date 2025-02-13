-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.32-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table pkl.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `izin` varchar(255) DEFAULT 'view,edit,delete',
  PRIMARY KEY (`id`),
  UNIQUE KEY `PASSWORD` (`PASSWORD`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel pkl.admins: ~2 rows (lebih kurang)
INSERT INTO `admins` (`id`, `username`, `PASSWORD`, `izin`) VALUES
	(2, 'Rafa', '$2y$10$5jGtd79rsJGCDE9l5a4ov.1pKeROV/79eDPZoxIa/giTr9zNqClYW', 'view,edit,delete'),
	(3, 'admin', '$2y$10$MwzvKro7h7iGclq3kM.gbude5B9776j/CIczQm2IY52JFdeHu1ODW', 'view,edit,delete');

-- membuang struktur untuk table pkl.kota
CREATE TABLE IF NOT EXISTS `kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asalkota` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel pkl.kota: ~20 rows (lebih kurang)
INSERT INTO `kota` (`id`, `asalkota`) VALUES
	(1, 'Jakarta'),
	(2, 'Surabaya'),
	(3, 'Bandung'),
	(4, 'Medan'),
	(5, 'Semarang'),
	(6, 'Makassar'),
	(7, 'Palembang'),
	(8, 'Tangerang'),
	(9, 'Depok'),
	(10, 'Bekasi'),
	(11, 'Bogor'),
	(12, 'Padang'),
	(13, 'Denpasar'),
	(14, 'Malang'),
	(15, 'Yogyakarta'),
	(16, 'Pekanbaru'),
	(17, 'Pontianak'),
	(18, 'Banjarmasin'),
	(19, 'Samarinda'),
	(20, 'Batam');

-- membuang struktur untuk table pkl.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nisn` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `jeniskelamin` varchar(59) DEFAULT NULL,
  `asalkota` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `gambarsiswa` varchar(255) NOT NULL,
  `izin` varchar(255) DEFAULT 'view',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nisn` (`nisn`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel pkl.users: ~3 rows (lebih kurang)
INSERT INTO `users` (`id`, `nisn`, `username`, `kelas`, `jurusan`, `jeniskelamin`, `asalkota`, `alamat`, `agama`, `gambarsiswa`, `izin`) VALUES
	(19, 1283212222, 'Konbi', '11', 'MPLB', 'perempuan', 'Tangerang', 'Jl.Nisan', 'islam', '../asset/allimage/41a694df25412d81836437c1294bc3d6.jpg', 'view'),
	(26, 1234567890, 'Rafa Ananda', '12', 'PPLG', 'laki-laki', 'Tangerang', 'Jl. Damai 3', 'islam', '../asset/allimage/1683203070305.png', 'view,edit,delete'),
	(27, 2147483647, 'Hu Tao', '11', 'DKV', 'perempuan', 'Tangerang', 'Liyue', 'islam', '../asset/allimage/hutao.png', 'view');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
