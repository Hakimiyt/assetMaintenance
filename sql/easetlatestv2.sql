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
  `id_pegawai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `emel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `notel` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` varchar(144) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pic` int DEFAULT NULL,
  `bppa` int DEFAULT NULL,
  `tpo` int DEFAULT NULL,
  `pengarah` int DEFAULT NULL,
  `active` int DEFAULT '1',
  PRIMARY KEY (`no_id`),
  UNIQUE KEY `ic` (`ic`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table easet.tbl_daftar: ~8 rows (approximately)
INSERT INTO `tbl_daftar` (`no_id`, `id_pegawai`, `ic`, `password`, `nama`, `emel`, `notel`, `role`, `pic`, `bppa`, `tpo`, `pengarah`, `active`) VALUES
	(12, '123', '12345', '$2y$10$wqSk7b07uI9wWW38MXx/d.fiis1JFt13JZafxSwnonlRTr2aN.EIK', '123', '123@gmail.com', '123', 'Pengajar', NULL, NULL, NULL, NULL, NULL),
	(13, 'A10', '010203', '$2y$10$QyVmW4Zs4CRYBvJb6X5sBuPFcNTlIb1nDu0gr6/3kmQgsuVgsVoy.', 'Pengarah', 'shuib@gmail.com', '123', 'Pengarah', 0, 0, 0, 1, NULL),
	(16, '000', '050110', '$2y$10$hz85cW3W/BIzTWkvNZ2ETeuYYtsble0YcrU//hzCyxxbnxBNIhK8e', 'Hadi', 'hadi12@gmail.com', '0193332212', 'Komputer/ICT', NULL, 1, 0, NULL, 1),
	(17, '02', '020414', '$2y$10$.vEbN4iM00JMbNMG0qUBKeiG/v1RQvu9PL3j5qD/IblOXO.esXxi6', 'Kamal', 'kamal12@gmail.com', '0103224901', 'Bangunan/Sivil', NULL, 1, NULL, NULL, 1),
	(18, '03', '011014', '$2y$10$lKYLqIt5J.ILsjVxpWoaqO.h/O.AvNK3Ql0dlE6BRtBSQXX8mq3D6', 'Hairul', 'hairul12@gmail.com', '0195556666', 'Mekanikal/Elektrikal/Aircond', NULL, 1, NULL, NULL, 1),
	(20, '1121', '050228140831', '$2y$10$U6he7VBe8gLNThtn4PHkbO5bB6PqxXlpSkypgDG87czgLg7PqngPu', 'amirul hakimi', 'hakimi2341yt@gmail.com', '0193276657', 'Pengajar', NULL, NULL, NULL, NULL, 1),
	(21, '232', '020228', '$2y$10$Oqzew/JAyCsDTBxRhye/4OCrpQkcSd0R5spSCPUKi0JL6sBwqONr6', 'sortyxz', 'krazy@gmail.com', '0193331234', 'Pengajar', NULL, NULL, NULL, NULL, NULL),
	(23, '23223123', '050228100831', '$2y$10$wGv17ypdxUcGDBnV5z4ylexwZff0hZeF57rLC1Dotn7u/W1ABscOO', 'Amirul Zamri', 'xhakimiytz@gmail.com', '0183276657', 'Pengajar', NULL, NULL, NULL, NULL, NULL),
	(24, 'a02', '123456789', '$2y$10$bm1bWJnkZIpr9j4cJZ/PDe17h9a.o.SM45Xrlezgj/uc8YCzLBbA2', 'test123', 'test23@gmail.com', '012345678910', NULL, NULL, 0, NULL, NULL, 1),
	(25, '01', '031106', '$2y$10$3/pX1ZJmt50H.D.ugAakE.bUjnq3zZYmzOZS3Rl/AMiRApPIURaqi', 'nadjwa', 'nadira@gmail.com', '011', 'Pengarah', NULL, NULL, NULL, NULL, 1),
	(27, 'po10', '015141013390', '$2y$10$u9mfnu.K.8M3Om22BW.Khu3YOFgjamDm2QV.XiPX1R6FsROj32SEu', 'amir hakim', 'hakim@gmail.com', '0119995599', 'TPO', NULL, 0, 1, NULL, 1);

-- Dumping structure for table easet.tbl_semakan
CREATE TABLE IF NOT EXISTS `tbl_semakan` (
  `no_id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenis_aset` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_siri` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tempat_rosak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `userterakhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ulasan` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `emel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tarikh_rosak` varchar(50) DEFAULT NULL,
  `lulus_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Dalam Proses',
  `image` varchar(266) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tarikh` varchar(50) DEFAULT NULL,
  `bppa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kosdahulu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `anggarankos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `syorulasan` longtext,
  `pic` varchar(50) DEFAULT NULL,
  `tarikhbppa` varchar(50) DEFAULT NULL,
  `kelulusan` varchar(50) DEFAULT NULL,
  `ulasantpo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tarikhtpo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table easet.tbl_semakan: ~16 rows (approximately)
INSERT INTO `tbl_semakan` (`no_id`, `role`, `jenis_aset`, `no_siri`, `tempat_rosak`, `userterakhir`, `ulasan`, `nama`, `emel`, `tarikh_rosak`, `lulus_jabatan`, `image`, `tarikh`, `bppa`, `kosdahulu`, `anggarankos`, `syorulasan`, `pic`, `tarikhbppa`, `kelulusan`, `ulasantpo`, `tarikhtpo`) VALUES
	(34, 'Bangunan/Sivil (Encik Kamal)', 'Peralatan Komputer', 'test', 'Bilik Kuliah', 'pelajar', 'test', 'amirul hakimi', 'amirul@gmail.com', '2024-11-13', 'Ditolak', '', '2024-11-11 14:34:20', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(35, 'Komputer/ICT', 'Peralatan ', '555', 'bengkel', 'pelajar', 'test', 'MUHAMMAD AMIRUL HAKIMI BIN MOHAMAD SUPIAN', 'amirul@gmail.com', '2024-11-14', 'Siap Dibaiki', '', '2024-11-11 14:34:58', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(36, 'Bangunan/Sivil', 'Peralatan Komputer', '23', 'Asrama', '123', '123', '33', '123@gmail.com', '2024-11-29', 'Sedang Dibaiki', '', '2024-11-14 16:05:13', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(40, 'Bangunan/Sivil (Encik Kamal)', 'lllllllllllllll', '2322', '333', 'zul', 'bbi', '123', '123@gmail.com', '2025-04-10', 'Dalam Proses', '', '2025-04-09 08:34:42', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(41, 'Komputer/ICT', 'ttt', '2333', 'bengkel', '222', 'rosak', '123', '123@gmail.com', '2025-05-08', 'Dalam Proses', '', '2025-05-07 16:01:43', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(42, 'Bangunan/Sivil', 'bu', '123', 'beng', 'pel', 'ros', 'amirul ', 'hakimi2341yt@gmail.com', '2025-05-19', 'Siap Dibaiki', '', '2025-05-17 16:48:42', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(43, 'Komputer/ICT', 'meja', 'jtm/111', 'bilik kuliah', 'student', 'meja rosak', 'amirul hakimi', 'hakimi2341yt@gmail.com', '2025-05-17', 'Siap Dibaiki', '', '2025-05-17 23:52:54', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(44, 'Mekanikal/Elektrikal/Aircond', 'Suis Rosak', 'jtm/zx/25', 'Makmal Komputer 2 TPP', 'Pelajar', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', 'amirul hakimi', 'hakimi2341yt@gmail.com', '2025-05-18', 'Ditolak', '', '2025-05-18 22:26:17', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(46, 'Mekanikal/Elektrikal/Aircond', 'Meja', 'JTM/jj/109', 'Bengkel TPP', 'Pelajar', 'Meja patah dan retak', 'Amirul Zamri', 'xhakimiytz@gmail.com', '2025-05-23', 'Dalam Proses', '', '2025-05-23 15:47:32', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(63, 'Bangunan/Sivil', 'hhuhi', 'jijionn', '-0pl', 'nnjn', 'jjjjj', 'amirul hakimi', 'hakimi2341yt@gmail.com', '2025-08-15', 'Diterima', 'death.jpg', '2025-08-12 11:15:37', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(64, 'Komputer/ICT', 'oakofjoajofa', 'hdwaidai', 'iadic2342', '4345353', 'wadaa', 'amirul hakimi', 'hakimi2341yt@gmail.com', '2025-08-14', 'Dalam Proses', 'maxresdefault.jpg', '2025-08-12 12:45:49', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(65, 'Bangunan/Sivil', 'faw', 'fwafa', 'fwfa', 'dwadfwa', 'fawfa', 'amirul hakimi', 'hakimi2341yt@gmail.com', '2025-08-15', 'Dalam Proses', '1754986963_dddddd.png', '2025-08-12 16:22:43', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(66, 'Bangunan/Sivil', 'faw', 'fwafa', 'fwfa', 'dwadfwa', 'fawfa', 'amirul hakimi', 'hakimi2341yt@gmail.com', '2025-08-15', 'Dalam Proses', '1754987207_dddddd.png', '2025-08-12 16:26:47', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(67, 'Bangunan/Sivil', 'dwadawdawfesfsf', 'fesfsefs', 'dwadawda', 'fesfsefsefs', 'awdawdada', 'amirul hakimi', 'hakimi2341yt@gmail.com', '2025-08-20', 'Ditolak', '1755666265_Screenshot 2025-04-23 001056.png', '2025-08-20 13:04:25', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(68, 'Bangunan/Sivil', 'dwadawdawfesfsf', 'fesfsefs', 'dwadawda', 'fesfsefsefs', 'awdawdada', 'amirul hakimi', 'hakimi2341yt@gmail.com', '2025-08-20', 'Ditolak', '1755666321_Screenshot 2025-04-23 001056.png', '2025-08-20 13:05:21', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(69, 'Komputer/ICT', 'wadawdad2qe13123', '13123', '12312dawda', 'dwadaw', 'dwadaw', 'Hadi', 'hadi12@gmail.com', '2025-09-11', 'Ditolak', '1757603824_0163a8ab-c780-4837-aa4f-c7932dc89dea.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(70, 'Bangunan/Sivil', 'dwadaw', 'ddd', 'dawdawd', 'dwadadad', 'dawdadaw', 'nadjwa', 'nadira@gmail.com', '2005-04-02', 'Dalam Proses', '1769343688_94bc6957891dd0b6909ae10a5cce0efd.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table easet.upgambar
CREATE TABLE IF NOT EXISTS `upgambar` (
  `id` int DEFAULT NULL,
  `id_aduan` varchar(10) DEFAULT NULL,
  `gambar` varchar(266) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table easet.upgambar: ~2 rows (approximately)
INSERT INTO `upgambar` (`id`, `id_aduan`, `gambar`) VALUES
	(NULL, '67', '1755666265_Screenshot 2025-04-23 001056.png'),
	(NULL, '67', '1755666265_Screenshot 2025-04-23 001056.png');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
