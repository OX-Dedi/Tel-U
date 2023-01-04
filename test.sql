-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 04:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `Id` int(11) NOT NULL,
  `NIP` varchar(15) DEFAULT NULL,
  `Nama` varchar(30) NOT NULL,
  `Kode_Dosen` varchar(10) NOT NULL,
  `Course_View` int(5) NOT NULL,
  `Resouce` varchar(50) NOT NULL,
  `Activity` varchar(100) NOT NULL,
  `Sum_Resource_Activity` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`Id`, `NIP`, `Nama`, `Kode_Dosen`, `Course_View`, `Resouce`, `Activity`, `Sum_Resource_Activity`) VALUES
(1, '06830027-1', 'ANGELINA PRIMA KURNIATI', 'APK', 35, 'Label(0)Page(3)File(2)URL(0)', 'Assigement(0)Quiz(7)Forum(31)H5P(0)Active Quiz(0)Wiki(0)Chat(0)Feedback(0)VPL(0)', 44),
(2, '19580825-6', 'AHMAN SUTARDI', 'AST', 13, 'Label(0)Page(0)File(0)URL(0)', 'Assigement(0)Quiz(6)Forum(12)H5P(0)Active Quiz(0)Wiki(0)Chat(0)Feedback(0)VPL(0)', 18),
(3, '218985994-6', 'AMARILIS PUTRI YANUARIFIANI', 'APY', 80, 'Label(0)Page(0)File(9)URL(0)', 'Assigement(21)Quiz(24)Forum(20)H5P(0)Active Quiz(0)Wiki(0)Chat(0)Feedback(0)VPL(0)', 74),
(4, '21950003-3', 'ADITYA FIRMAN IHSAN', 'FMH', 69, 'Label(0)Page(0)File(17)URL(0)', 'Assigement(91)Quiz(158)Forum(27)H5P(286)Active Quiz(0)Wiki(0)Chat(0)Feedback(0)VPL(0)', 579);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `title`, `start_event`, `end_event`) VALUES
(1, 'Meeting With Dedi', '2022-10-08 12:00:00', '2022-10-08 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(126) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(24) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` varchar(64) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `description`, `color`, `start_date`, `end_date`, `create_at`, `create_by`, `modified_at`, `modified_by`) VALUES
(74, 'Jangan Nunggu Deadline ya :)', '', '#FF0000', '2022-12-22', '2022-12-23', '2022-12-22 08:01:46', NULL, '2022-12-22 08:04:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` bigint(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `status`) VALUES
(1, 'Java ', 1),
(2, 'PHP ', 1),
(3, 'HTML', 1),
(4, 'Kotlin', 1),
(5, 'Spring Boot', 0),
(6, 'Codeigniter Framework', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `program_id` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `total_activity` varchar(50) NOT NULL DEFAULT '''''',
  `class` varchar(50) NOT NULL DEFAULT '',
  `activity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `faculty_id`, `program_id`, `course_id`, `total_activity`, `class`, `activity`) VALUES
(1, 'AYT-1', 'PRG-1', 'CRS-1', '1', 'IF-1', 'Activity-1'),
(123, 'AYT-2', 'PRG-2', 'CRS-2', '1', 'IF-2', 'Activity-3'),
(124, 'AYT-3', 'PRG-3', 'CRS-3', '1', 'IF-3', 'Activity-5'),
(125, 'AYT-4', 'PRG-4', 'CRS-4', '1', 'IF-4', 'Activity-1'),
(126, 'AYT-5', 'PRG-5', 'CRS-5', '1', 'IF-5', 'Activity-1'),
(127, 'BYT-1', 'BRG-1', 'BRS-1', '1', 'SI-1', 'Activity-4'),
(128, 'BYT-2', 'BRG-2', 'BRS-2', '1', 'SI-2', 'Activity-1'),
(129, 'BYT-3', 'BRG-3', 'BRS-3', '1', 'SI-3', 'Activity-2'),
(130, 'BYT-4', 'BRG-4', 'BRS-4', '1', 'SI-4', 'Activity-1'),
(131, 'BYT-5', 'BRG-5', 'BRS-5', '1', 'SI-5', 'Activity-4'),
(132, 'CYT-1', 'CRG-1', 'CRA-1', '1', 'TKJ-1', 'Activity-1'),
(133, 'CYT-2', 'CRG-2', 'CRA-2', '1', 'TKJ-2', 'Activity-2'),
(134, 'CYT-3', 'CRG-3', 'CRA-3', '1', 'TKJ-3', 'Activity-3'),
(135, 'CYT-4', 'CRG-4', 'CRA-4', '1', 'TKJ-4', 'Activity-1'),
(136, 'CYT-5', 'CRG-5', 'CRA-5', '1', 'TKJ-5', 'Activity-5');

-- --------------------------------------------------------

--
-- Table structure for table `db_absensi`
--

CREATE TABLE `db_absensi` (
  `id_absen` bigint(20) NOT NULL,
  `kode_absen` varchar(100) NOT NULL,
  `nama_pegawai` varchar(125) NOT NULL,
  `kode_pegawai` varchar(125) NOT NULL,
  `tgl_absen` varchar(125) NOT NULL,
  `jam_masuk` varchar(13) NOT NULL,
  `jam_pulang` varchar(13) NOT NULL,
  `status_pegawai` int(1) NOT NULL,
  `keterangan_absen` varchar(100) NOT NULL,
  `maps_absen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `db_absensi`
--

INSERT INTO `db_absensi` (`id_absen`, `kode_absen`, `nama_pegawai`, `kode_pegawai`, `tgl_absen`, `jam_masuk`, `jam_pulang`, `status_pegawai`, `keterangan_absen`, `maps_absen`) VALUES
(3, 'absen_20221214445', 'Dedi Rosadi', '20552011053', 'Selasa, 13 Desember 2022', '10:43:10', '19:36:31', 2, 'Belajar Di Kampus', '-6.9244532, 107.6622627');

-- --------------------------------------------------------

--
-- Table structure for table `db_rememberme`
--

CREATE TABLE `db_rememberme` (
  `id_session` int(11) NOT NULL,
  `kode_pegawai` varchar(125) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_agent` varchar(35) NOT NULL,
  `agent_string` varchar(255) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `user_ip` varchar(35) NOT NULL,
  `cookie_hash` varchar(255) NOT NULL,
  `expired` int(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_setting`
--

CREATE TABLE `db_setting` (
  `status_setting` int(1) NOT NULL DEFAULT 0,
  `nama_instansi` varchar(255) NOT NULL,
  `jumbotron_lead_set` varchar(125) NOT NULL,
  `nama_app_absensi` varchar(20) NOT NULL DEFAULT 'Absensi Online',
  `logo_instansi` varchar(255) NOT NULL,
  `timezone` varchar(35) NOT NULL,
  `absen_mulai` varchar(13) NOT NULL,
  `absen_mulai_to` varchar(13) NOT NULL,
  `absen_pulang` varchar(13) NOT NULL,
  `maps_use` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `db_setting`
--

INSERT INTO `db_setting` (`status_setting`, `nama_instansi`, `jumbotron_lead_set`, `nama_app_absensi`, `logo_instansi`, `timezone`, `absen_mulai`, `absen_mulai_to`, `absen_pulang`, `maps_use`) VALUES
(1, 'TELKOM UNIVERSITY', 'Jl. Telekomunikasi. 1, Terusan Buahbatu - Bojongsoang, Telkom University, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa', 'LMS TEL-U', 'c29a01e7627dba16a8d05b7c6eb3fcad.png', 'Asia/Jakarta', '06:30:00', '08:00:00', '16:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idGuru` int(10) NOT NULL,
  `idMapel` varchar(10) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `namaGuru` varchar(35) NOT NULL,
  `password` varchar(40) NOT NULL,
  `noHP` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idGuru`, `idMapel`, `NIP`, `namaGuru`, `password`, `noHP`, `alamat`) VALUES
(2, 'FIK-01', '8364583942', 'Guru1', 'Guru123', '087829743123', 'Jl. Cihampelas No.160');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idKelas` int(10) NOT NULL,
  `namaKelas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idKelas`, `namaKelas`) VALUES
(1, 'FIK-1A'),
(2, 'FIK-1B'),
(3, 'FIK-2A'),
(4, 'FIK-2B'),
(5, 'FIK-3A'),
(6, 'FIK-3B'),
(7, 'FIK-4A'),
(8, 'FIK-4B');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `idKontrak` int(10) NOT NULL,
  `idKelas` int(10) NOT NULL,
  `idMapel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`idKontrak`, `idKelas`, `idMapel`) VALUES
(9, 1, 'FIK-01'),
(10, 1, 'FIK-02'),
(11, 1, 'FIK-03'),
(12, 1, 'FIK-04'),
(13, 1, 'FIK-05'),
(14, 1, 'FIK-07');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `idMapel` varchar(10) NOT NULL,
  `namaMapel` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`idMapel`, `namaMapel`) VALUES
('FIK-01', 'Keamanan Informasi'),
('FIK-02', 'Keamanan Jaringan'),
('FIK-03', 'Algoritma'),
('FIK-04', 'Object Oriented Programming'),
('FIK-05', 'Pemrograman Web1'),
('FIK-06', 'Pemrograman Web2'),
('FIK-07', 'Pemrograman Mobile1'),
('FIK-08', 'Pemrograman Mobile2'),
('FIK-10', 'FCNS');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `idMateri` int(10) NOT NULL,
  `idGuru` int(10) NOT NULL,
  `judulFile` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `lokasiFile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `idNilai` int(10) NOT NULL,
  `idSiswa` int(10) NOT NULL,
  `idGuru` int(10) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `nilai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idSiswa` int(10) NOT NULL,
  `idKelas` int(10) NOT NULL,
  `NIS` varchar(30) NOT NULL,
  `namaSiswa` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamatSiswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idSiswa`, `idKelas`, `NIS`, `namaSiswa`, `password`, `alamatSiswa`) VALUES
(1, 1, '205520110001', 'Siswa1', 'Siswa123', 'Bojongsoang 11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_activity`
--

CREATE TABLE `tb_activity` (
  `activity` varchar(20) NOT NULL,
  `activity_1` int(50) NOT NULL,
  `activity_2` int(50) NOT NULL,
  `activity_3` int(50) NOT NULL,
  `activity_4` int(50) NOT NULL,
  `activity_5` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_activity`
--

INSERT INTO `tb_activity` (`activity`, `activity_1`, `activity_2`, `activity_3`, `activity_4`, `activity_5`) VALUES
('1', 10, 5, 3, 9, 2),
('2', 8, 3, 0, 3, 1),
('3', 5, 7, 3, 8, 8),
('4', 1, 3, 6, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_faculty`
--

CREATE TABLE `tb_faculty` (
  `faculty_id` varchar(20) NOT NULL,
  `nama_faculty` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_faculty`
--

INSERT INTO `tb_faculty` (`faculty_id`, `nama_faculty`) VALUES
('CS', 'CYBER SECURITY'),
('IF', 'FAKULTAS INFORMATIKA'),
('MI', 'MANAGEMENT INFORMATIKA'),
('SI', 'SISTEM INFROMASI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `title`, `date`, `created`, `modified`, `status`) VALUES
(1, 'Tugas', '2022-10-19', '2022-10-19 11:13:13', '2022-10-19 11:13:13', 1),
(3, 'Jadwal', '2022-10-21', '2022-10-21 19:49:02', '2022-10-21 19:49:02', 1),
(4, 'Tugas RPL', '2022-10-22', '2022-10-22 20:19:48', '2022-10-22 20:19:48', 1),
(5, 'Tugas', '2022-10-22', '2022-10-22 18:29:51', '2022-10-22 18:29:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `faculty_id` varchar(20) NOT NULL,
  `program_id` varchar(20) NOT NULL,
  `semester_id` varchar(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `activity` varchar(20) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `faculty_id`, `program_id`, `semester_id`, `nama`, `kelas`, `activity`, `total`) VALUES
(27, 'IF', 'PR2', 'S1', 'DEDI ROSADI', '1-IF-B', '4', '40'),
(28, 'SI', 'PR1', 'S3', 'ANNISA ADITSANIA', '1-IF-C', '10', '30'),
(29, 'CS', 'PR4', 'S4', 'ANAK AGUNG GEDE', '4-IF-D', '60', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `IdMhsw` int(11) NOT NULL,
  `Nama` varchar(150) DEFAULT NULL,
  `UTS` varchar(20) DEFAULT NULL,
  `UAS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`IdMhsw`, `Nama`, `UTS`, `UAS`) VALUES
(16, 'Keamanan Jaringan', '97', '0'),
(17, 'System Mikroprocessor', '98', '0'),
(18, 'System Mikrokontroller', '96', '0'),
(0, 'Keamanan Informasi', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `program_id` varchar(20) NOT NULL,
  `faculty_id` varchar(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`program_id`, `faculty_id`, `nama`, `kelas`) VALUES
('PR1', 'IF', 'DEDI ROSADI', '1-IF-A'),
('PR2', 'SI', 'ANNISA ADITSANIA', '1-IF-B'),
('PR3', 'CS', 'ANAK AGUNG GEDE', '1-IF-C'),
('PR4', 'MI', 'SITI NURJUBAEDAH', '4-IF-D');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `semester_id` varchar(20) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`semester_id`, `nama`) VALUES
('S1', 'SEMESTER 1'),
('S2', 'SEMESTER 2'),
('S3', 'SEMESTER 3'),
('S4', 'SEMESTER 4'),
('S5', 'SEMESTER 5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `kode_dosen` varchar(200) DEFAULT NULL,
  `course_view` int(100) DEFAULT NULL,
  `resource` varchar(20) DEFAULT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `sra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nip`, `nama`, `kode_dosen`, `course_view`, `resource`, `activity`, `sra`) VALUES
(5, '06830027-1', 'ANGELINA PRIMA KURNI', 'APK', 35, 'page 3', 'Assigement', 44),
(6, '19580825-6', 'AHMAN SUTARDI', 'AST', 20, 'Label 0', 'Quiz', 18),
(7, '218985994-6', 'AMARILIS PUTRI YANUA', 'APY', 50, 'File 9', 'Assigement 21', 72),
(8, '21950003-3', 'ADITYA FIRMAN IHSAN', 'FMH', 69, 'File62', 'Assigement11', 579),
(11, '15900046-1', 'ANNISA ADITSANIA', 'TSA', 310, 'Label 24', 'Quiz 723', 123),
(12, '07820019-1', 'ANAK AGUNG GDE AGUNG', 'AAG', 294, 'File 9', 'Assigement 21', 77),
(13, '19895877-6', 'A INUN MUFLIKA', 'NMF', 636, 'Label 0', 'Quiz', 72),
(14, '16706040-6', 'AGUNG AGUSTRIANTO', 'GTO', 456, 'page 2', 'Assigement', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_pegawai` int(11) NOT NULL,
  `nama_lengkap` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL,
  `umur` int(11) NOT NULL,
  `image` varchar(125) NOT NULL,
  `qr_code_image` varchar(125) NOT NULL,
  `kode_pegawai` varchar(125) NOT NULL,
  `instansi` varchar(125) NOT NULL,
  `jabatan` varchar(125) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `tgl_lahir` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `bagian_shift` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `qr_code_use` int(2) NOT NULL,
  `last_login` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_pegawai`, `nama_lengkap`, `username`, `password`, `role_id`, `umur`, `image`, `qr_code_image`, `kode_pegawai`, `instansi`, `jabatan`, `npwp`, `tgl_lahir`, `tempat_lahir`, `jenis_kelamin`, `bagian_shift`, `is_active`, `qr_code_use`, `last_login`, `date_created`) VALUES
(12, 'Dedi Rosadi', 'admin', '$2y$10$nzEbq607iLUzhvlKWSmDOOLU7r8Y0GDnWxYxA45bF9ExcP.lvRykG', 1, 22, '3a402057537e1ea49401790aaf34d1d3.jpg', 'qr_code_20552011053.png', '973829271834', 'TELKOM UNIVERSITY', '20552011053', '2017', '2001-04-04', 'Subang', 'Laki - Laki', 1, 1, 1, 1672802215, 1670857167),
(47, 'Dedi Rosadi', 'dedi', '$2y$10$XRXong6z3evF2IG41qanPud4..ii8C/0rO/Ypr9f4MAGzS1qbNe6.', 2, 21, '24eba96bab2559d9b4fea156554f1bb1.png', 'qr_code_148296679305713.png', '148296679305713', 'TELKOM UNIVERSITY', '21552011076', '2020', '2001-04-04', 'Subang', 'Laki - Laki', 1, 1, 1, 1672192169, 1671366109);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `faculty_id` varchar(20) NOT NULL,
  `program_id` varchar(20) NOT NULL,
  `semester_id` varchar(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `activity` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idGuru`),
  ADD KEY `fk_idMapel` (`idMapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idKelas`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`idKontrak`),
  ADD KEY `fk_idKelas` (`idKelas`),
  ADD KEY `fk_idMapel1` (`idMapel`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`idMapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`idMateri`),
  ADD KEY `fk_idGuru` (`idGuru`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`idNilai`),
  ADD KEY `fk_idSiswa` (`idSiswa`),
  ADD KEY `fk_idGuru1` (`idGuru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idSiswa`),
  ADD KEY `fk_idKelas1` (`idKelas`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idGuru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idKelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `idKontrak` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `idMateri` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idNilai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idSiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `fk_idMapel` FOREIGN KEY (`idMapel`) REFERENCES `mapel` (`idMapel`) ON DELETE CASCADE;

--
-- Constraints for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD CONSTRAINT `fk_idKelas` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_idMapel1` FOREIGN KEY (`idMapel`) REFERENCES `mapel` (`idMapel`) ON DELETE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_idGuru` FOREIGN KEY (`idGuru`) REFERENCES `guru` (`idGuru`) ON DELETE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_idGuru1` FOREIGN KEY (`idGuru`) REFERENCES `guru` (`idGuru`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_idSiswa` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_idKelas1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
