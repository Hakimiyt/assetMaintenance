-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for easet
CREATE DATABASE IF NOT EXISTS `easet` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `easet`;

-- Dumping structure for table easet.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table easet.admin: ~0 rows (approximately)
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
	(0, 'admin', '123');

-- Dumping structure for table easet.tbl_daftar
CREATE TABLE IF NOT EXISTS `tbl_daftar` (
  `no_id` int NOT NULL AUTO_INCREMENT,
  `id_pegawai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `emel` varchar(255) NOT NULL,
  `notel` varchar(12) NOT NULL,
  `role` varchar(144) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`no_id`),
  UNIQUE KEY `ic` (`ic`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table easet.tbl_daftar: ~7 rows (approximately)
INSERT INTO `tbl_daftar` (`no_id`, `id_pegawai`, `ic`, `password`, `nama`, `emel`, `notel`, `role`) VALUES
	(12, '123', '12345', '$2y$10$wqSk7b07uI9wWW38MXx/d.fiis1JFt13JZafxSwnonlRTr2aN.EIK', '123', '123@gmail.com', '123', 'Pengajar'),
	(13, 'A10', '010203', '$2y$10$EcDIs8ytv/gxsJeTBIFlOuqaWpV0fcwpoK8lB9UnZtfwp3UusB2aO', 'Pengarah', 'shuib@gmail.com', '123', 'Pengarah'),
	(16, '01', '050110', '$2y$10$hz85cW3W/BIzTWkvNZ2ETeuYYtsble0YcrU//hzCyxxbnxBNIhK8e', 'Hadi', 'hadi12@gmail.com', '0193332212', 'Komputer/ICT'),
	(17, '02', '020414', '$2y$10$.vEbN4iM00JMbNMG0qUBKeiG/v1RQvu9PL3j5qD/IblOXO.esXxi6', 'Kamal', 'kamal12@gmail.com', '0103224901', 'Bangunan/Sivil'),
	(18, '03', '011014', '$2y$10$lKYLqIt5J.ILsjVxpWoaqO.h/O.AvNK3Ql0dlE6BRtBSQXX8mq3D6', 'Hairul', 'hairul12@gmail.com', '0195556666', 'Mekanikal/Elektrikal/Aircond'),
	(20, '1121', '050228140831', '$2y$10$U6he7VBe8gLNThtn4PHkbO5bB6PqxXlpSkypgDG87czgLg7PqngPu', 'amirul hakimi', 'hakimi2341yt@gmail.com', '0193276657', 'Pengajar'),
	(21, '232', '020228', '$2y$10$Oqzew/JAyCsDTBxRhye/4OCrpQkcSd0R5spSCPUKi0JL6sBwqONr6', 'sortyxz', 'krazy@gmail.com', '0193331234', 'Pengajar');

-- Dumping structure for table easet.tbl_semakan
CREATE TABLE IF NOT EXISTS `tbl_semakan` (
  `no_id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_aset` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_siri` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tempat_rosak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userterakhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ulasan` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `emel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tarikh_rosak` date NOT NULL,
  `lulus_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Dalam Proses',
  `tarikh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table easet.tbl_semakan: ~7 rows (approximately)
INSERT INTO `tbl_semakan` (`no_id`, `role`, `jenis_aset`, `no_siri`, `tempat_rosak`, `userterakhir`, `ulasan`, `nama`, `emel`, `tarikh_rosak`, `lulus_jabatan`, `tarikh`) VALUES
	(34, 'Bangunan/Sivil (Encik Kamal)', 'Peralatan Komputer', 'test', 'Bilik Kuliah', 'pelajar', 'test', 'amirul hakimi', 'amirul@gmail.com', '2024-11-13', 'Ditolak', '2024-11-11 06:34:20'),
	(35, 'Komputer/ICT', 'Peralatan ', '555', 'bengkel', 'pelajar', 'test', 'MUHAMMAD AMIRUL HAKIMI BIN MOHAMAD SUPIAN', 'amirul@gmail.com', '2024-11-14', 'Sedang Dibaiki', '2024-11-11 06:34:58'),
	(36, 'Bangunan/Sivil (Encik Kamal)', 'Peralatan Komputer', '23', 'Asrama', '123', '123', '33', '123@gmail.com', '2024-11-29', 'Dalam Proses', '2024-11-14 08:05:13'),
	(37, 'Komputer/ ICT (Encik Hadi)', 'Peralatan Komputer', '123', 'Dewan Makan', 'tt', 'tt', 'amirul hakimi', 'amirul@gmail.com', '2024-11-22', 'Dalam Proses', '2024-11-14 08:06:01'),
	(38, 'Bangunan/Sivil (Encik Kamal)', 'Peralatan Komputer', 'dd', 'Asrama', 'dd', 'dd', 'amirul hakimi', 'amirul@gmail.com', '2024-11-21', 'Dalam Proses', '2024-11-14 08:06:16'),
	(39, 'Bangunan/Sivil (Encik Kamal)', 'Peralatan Komputer', '22', 'Asrama', '22', '22', 'amirul hakimi', 'amirul@gmail.com', '2024-11-15', 'Dalam Proses', '2024-11-14 08:06:30'),
	(40, 'Bangunan/Sivil (Encik Kamal)', 'lllllllllllllll', '2322', '333', 'zul', 'bbi', '123', '123@gmail.com', '2025-04-10', 'Dalam Proses', '2025-04-09 00:34:42'),
	(41, 'Komputer/ICT', 'ttt', '2333', 'bengkel', '222', 'rosak', '123', '123@gmail.com', '2025-05-08', 'Dalam Proses', '2025-05-07 08:01:43'),
	(42, 'Bangunan/Sivil', 'buku', '12345', 'bengkel', 'pelajar', 'rosak', 'amirul hakimi', 'hakimi2341yt@gmail.com', '2025-05-17', 'Dalam Proses', '2025-05-17 08:48:42'),
	(43, 'Komputer/ICT', 'meja', 'jtm/111', 'bilik kuliah', 'student', 'meja rosak', 'amirul hakimi', 'hakimi2341yt@gmail.com', '2025-05-17', 'Dalam Proses', '2025-05-17 15:52:54'),
	(44, 'Mekanikal/Elektrikal/Aircond', 'Suis Rosak', 'jtm/zx/25r', 'Makmal Komputer 2 TPP', 'Pelajar', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', 'amirul hakimi', 'hakimi2341yt@gmail.com', '2025-05-18', 'Dalam Proses', '2025-05-18 14:26:17');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
