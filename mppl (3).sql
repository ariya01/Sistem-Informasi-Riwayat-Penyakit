-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 04:47 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `alergi`
--

CREATE TABLE `alergi` (
  `id_alergi` int(10) UNSIGNED NOT NULL,
  `nama_alergi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alergi`
--

INSERT INTO `alergi` (`id_alergi`, `nama_alergi`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 'Alergi seafood', 'Jenis alergi ini paling sering diderita oleh orang-orang disekitar kita seperti mengkonsumsi ikan, udang, tiram, dan jenis-jenis makanan laut', NULL, NULL),
(5, 'Alergi udara dingin', 'Tubuh mengalami reaksi yang berlebih terhadap udara dingin dalam beberapa kasus terjadi rasa kedinginan tanpa disertai perubahan fisik pada tubuh', NULL, NULL),
(6, 'Alergi susu sapi', 'Susu sapi merupakan minuman yang cukup baik untuk kesehatan namun ada beberapa orang yang alergi akibat susu sapi biasanya penyakit ini terjadi pada anak-anak dan bayi', NULL, NULL),
(7, 'Alergi telur', 'Sebenarnya jenis alergi ini dapat dipicu oleh 3 protein dalam telur yaitu ovomucoid, ovalbumin, dan conalbumin', NULL, NULL),
(8, 'Alergi debu', 'Penderita alergi debu akan sangat rentan terhadap debu yang umum dijumpai di rumah atau di luar rumah apalagi ketika bersih-bersih', NULL, NULL),
(9, 'Alergi obat-obatan', 'alergi obat merupakan reaksi yang diberikan tubuh secara berlebihan karena konsumsi obat tertentu meski dalam dosis ringan.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alerginya`
--

CREATE TABLE `alerginya` (
  `id_alerginya` int(10) UNSIGNED NOT NULL,
  `id_alergi` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_det` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_jk` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kontak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ktp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_det`, `id_user`, `id_jk`, `alamat`, `berat`, `tinggi`, `tanggal`, `kontak`, `status`, `ktp`, `golongan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Perumdos Blok D no 29', 80, 170, '1996-08-11', '089517683499', 1, '35200611089660001', '', NULL, NULL),
(9, 48, 2, 'Perumdos', 1, 11, '1996-08-11', '0896176834991', 0, '1231287398712', 'B', '2018-05-07 09:55:31', '2018-05-12 01:00:49'),
(11, 51, 1, '1', 1, 2, '1987-02-05', '1', 0, '1', 'A', '2018-05-07 11:48:41', '2018-05-10 21:49:33'),
(12, 47, 1, 'JL. Alon-Alon Rangkah Surabaya, Jawa Timur, Indonesia 60135', 70, 180, '1996-02-26', '89323982', 0, '1212121212121332323', 'A', '2018-05-07 11:49:37', '2018-05-12 00:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_strata` int(10) UNSIGNED NOT NULL,
  `id_univ` int(10) UNSIGNED NOT NULL,
  `id_pendidikan` int(10) UNSIGNED NOT NULL,
  `id_spesialis` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_user`, `id_strata`, `id_univ`, `id_pendidikan`, `id_spesialis`, `status`, `created_at`, `updated_at`) VALUES
(9, 48, 1, 2, 1, 2, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelamins`
--

CREATE TABLE `kelamins` (
  `id_kel` int(10) UNSIGNED NOT NULL,
  `JenisKelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelamins`
--

INSERT INTO `kelamins` (`id_kel`, `JenisKelamin`, `created_at`, `updated_at`) VALUES
(1, 'Laki - Laki', NULL, NULL),
(2, 'Perempuan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2018_03_11_164817_entrust_setup_tables', 1),
(19, '2018_03_17_000001_create_waktus_table', 1),
(20, '2018_03_18_041953_create_kelamins_table', 1),
(21, '2018_03_18_141544_create_details_table', 1),
(22, '2018_03_18_141626_create_rumahsakits_table', 1),
(24, '2018_03_18_141706_create_rawats_table', 1),
(25, '2018_03_18_141756_create_penyakits_table', 1),
(27, '2018_03_18_141904_create_obats_table', 1),
(29, '2018_03_18_142334_create_operasis_table', 1),
(30, '2018_03_18_142422_create_operasinyas_table', 1),
(32, '2018_03_30_181146_create_strata_table', 2),
(33, '2018_03_30_181241_create_univ_table', 2),
(34, '2018_03_30_181355_create_pendidikan_table', 2),
(38, '2018_03_30_182355_create_spesialis_table', 3),
(39, '2018_03_30_191556_create_dokter_table', 3),
(40, '2018_03_31_175218_create_perawat_table', 4),
(41, '2018_03_18_141705_create_riwayats_table', 5),
(52, '2018_03_18_141833_create_penyakitnyas_table', 6),
(53, '2018_03_18_141920_create_obatnyas_table', 6),
(54, '2018_04_08_150212_create_alergi_table', 6),
(55, '2018_04_08_150633_create_alerginya_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(10) UNSIGNED NOT NULL,
  `nama_obat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_obat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `ket_obat`, `created_at`, `updated_at`) VALUES
(6, 'Acnol Lotion', 'Anti Acne/Jerawat', NULL, NULL),
(7, 'Abate', 'Untuk mengendalikan larva nyamuk', NULL, NULL),
(8, 'Actifed Plus DM', 'Meringankan pilek dan batuk gatal & kering', NULL, NULL),
(9, 'Actifed Plus Expectoran', 'Meringankan pilek dan batuk berdahak', NULL, NULL),
(10, 'Actifed Syrup', 'Actifed diindikasikan untuk meringankan pilek dan alergi pernafasan hidung', NULL, NULL),
(11, 'Adelisyin', 'Untuk mencegah serta mencukupi kekurangan vitamin padda bayi dan anak-anak', NULL, NULL),
(12, 'Adem Sari', 'Untuk Panas dalam, sakit tenggorokan, sariawan', NULL, NULL),
(13, 'Albendazole', 'membasmi cacing di usus yang hidup sebagai parasit tunggal atau majemuk', NULL, NULL),
(14, 'Albothyl', 'mempercepat proses pemnyebuhan setelah elektro-koagulasi', NULL, NULL),
(15, 'Allerin Expectorant', 'Meringankan batuk berdahak dan pilek', NULL, NULL),
(16, 'Ambeven', 'Pereda wasir', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `obatnya`
--

CREATE TABLE `obatnya` (
  `id_obatnya` int(10) UNSIGNED NOT NULL,
  `id_obat` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operasi`
--

CREATE TABLE `operasi` (
  `id_operasi` int(10) UNSIGNED NOT NULL,
  `nama_operasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_operasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operasinya`
--

CREATE TABLE `operasinya` (
  `id_operasinya` int(10) UNSIGNED NOT NULL,
  `id_operasi` int(10) UNSIGNED NOT NULL,
  `id_riwayat` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(10) UNSIGNED NOT NULL,
  `nama_pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nama_pendidikan`, `created_at`, `updated_at`) VALUES
(1, 'Dokter Umum', NULL, NULL),
(2, 'Dokter Gigi', NULL, NULL),
(3, 'Psikiater', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(10) UNSIGNED NOT NULL,
  `nama_penyakit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_penyakit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `keterangan_penyakit`, `created_at`, `updated_at`) VALUES
(8, 'Abses Kulit', 'sekumpulan nanah dalam kulit dan dapat terjadi di permukaan kulit mana pun, yang disebabkan oleh infeksi kuman atau bakteri, biasanya oleh stafilokokus, namun lebih didominasi', NULL, NULL),
(11, 'Muntaber', 'penyakit peradangan usus yang disebabkan oleh virus, bakteri, ataupun parasit lain seperti jamur, protozoa dan cacing', NULL, NULL),
(12, 'Cacar Air', 'penyakit yang disebabkan oleh ininfeksi virus varicella zosteryang menimbulkan bintik kemerahan di kulit yang menggelembung maupun tidak, melepuh, dan terasa gatal', NULL, NULL),
(13, 'Influenza', 'lebih umum dikenal dengan flu adalah penyakit menular yang paling umum diderita oleh orang-orang', NULL, NULL),
(14, 'Tuberkulosis', 'penyakit infeksi saluran pernapasan yang disebabkan oleh bakteri basil. Bakteri basil yang menginfeksi adalah bakteri basil yang sangat kuat', NULL, NULL),
(15, 'Tifus', 'penyakit infeksi pada usus halus yang disebabkan oleh bakteri salmonella.Biasanya ditandai dengan demam yang suhunya naik secara bertahap hingga membuat pendeita menggigil', NULL, NULL),
(17, 'Pneumonia', 'suatu peradangan yang disebabkan oleh bakteri, virus, maupun parasit lainnya', NULL, NULL),
(18, 'Hepatitis', 'penyakit menularyang menyerang organ hati pada manusia. Disebabkan oleh bakteri serta virus dan tidak bersihnya lingkungan sekitar, sehingga menginfeksi hati dan terjadi peradangan', NULL, NULL),
(19, 'Penyakit PES', 'merupakan penyakit pada tikusdan hewan pengerat lainnya yang disebabkan oleh bakteri dan dapat ditularkan pada manusia', NULL, NULL),
(21, 'Polio', 'Penyakit yang menyerang tubuh terutama pada bagian otot dan syaraf yang dapat mengakibatkan pelemahan otot yang bersifat permanen', NULL, NULL),
(22, 'Ebola', 'Penyakit yang belakangan ini menjadi perbinacangan hangat adalah penyakit yang disebabkan oleh virus mematikan dari genus ebolavirus', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penyakitnya`
--

CREATE TABLE `penyakitnya` (
  `id_penyakitnya` int(10) UNSIGNED NOT NULL,
  `id_penyakit` int(10) UNSIGNED DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyakitnya`
--

INSERT INTO `penyakitnya` (`id_penyakitnya`, `id_penyakit`, `id_user`, `keterangan`, `created_at`, `updated_at`) VALUES
(9, 8, 47, NULL, '2018-05-22', NULL),
(10, 11, 47, NULL, '2018-05-31', NULL),
(11, 11, 49, NULL, '2018-05-19', NULL),
(12, 18, 47, NULL, '2018-05-24', NULL),
(13, 14, 47, NULL, '2018-05-11', NULL),
(14, 11, 47, NULL, '2018-05-17', NULL),
(15, 8, 47, NULL, '2018-05-19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

CREATE TABLE `perawat` (
  `id_perawat` int(10) UNSIGNED NOT NULL,
  `id_riwayat` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rawat`
--

CREATE TABLE `rawat` (
  `id_rawat` int(10) UNSIGNED NOT NULL,
  `id_rumah` int(10) UNSIGNED NOT NULL,
  `id_riwayat` int(10) UNSIGNED NOT NULL,
  `masuk` date NOT NULL,
  `keluar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(10) UNSIGNED NOT NULL,
  `pasien` int(10) UNSIGNED NOT NULL,
  `dokter` int(10) UNSIGNED NOT NULL,
  `S` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `A` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `P` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `pasien`, `dokter`, `S`, `A`, `O`, `P`, `tahun`, `created_at`, `updated_at`) VALUES
(2, 47, 48, 'Ny. A umur 28 tahun, periksa hamil tanggal 7 Maret 2007.Dengan keluhan pusing, lemas, dan pandangan mata berkunang-kunang.', 'K/U ibu baik, kesadaran composmentis.', 'Janin hidup tunggal intra uterin, letak memanjang, presentasi kepala, PUKL 5/5 bagianPrimuda dengan anemia ringan', 'Anjurkan kepada ibu untuk tidak melakukan perkerjaan yang terlalu berat', 2011, '0000-00-00 00:00:00', NULL),
(6, 47, 48, 'a', 'A', 'A', 'Anjurkan kepada ibu untuk tidak melakukan perkerjaan yang terlalu berat. 1', 2012, '0000-00-00 00:00:00', NULL),
(7, 47, 48, 'a', 'a', 'a', 'a', 2013, '0000-00-00 00:00:00', NULL),
(8, 47, 48, 'a', 'a', 'a', 'b', 2018, '0000-00-00 00:00:00', NULL),
(9, 47, 48, 'a', 'a', 'a', 'a', 2018, '2018-05-12 11:15:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, NULL, NULL),
(2, 'pasien', 'Pasien', NULL, NULL, NULL),
(3, 'dokter', 'Dokter', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(47, 2),
(48, 3),
(49, 2),
(50, 2),
(51, 3),
(52, 3),
(53, 1),
(54, 2),
(57, 2),
(58, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rs`
--

CREATE TABLE `rs` (
  `id_rumah` int(10) UNSIGNED NOT NULL,
  `nama_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rs`
--

INSERT INTO `rs` (`id_rumah`, `nama_rumah`, `alamat_rumah`, `keterangan_rumah`, `created_at`, `updated_at`) VALUES
(15, 'RS Universitas Airlangga', 'Kampus C Mulyorejo Univ Airlangga Surabaya, Jawa Timur, Indonesia 60115', 'Swasta', NULL, NULL),
(17, 'RSAL Tanjung Perak', 'Jl. Laksdya M Nasir No. 56, Surabaya', 'Swasta', NULL, NULL),
(18, 'RS AAL', 'Jl. Moro Krembangan, Surabaya', 'Pemerintah', NULL, NULL),
(19, 'RS AL Pal', 'Jl. Taruna No. 66 – 68 Ujung, Surabaya', 'Pemerintah', NULL, NULL),
(20, 'RSB Adi Guna', 'Jl. Alun-alun Rangkah No. 1 – 3, Surabaya', 'Swasta', NULL, NULL),
(21, 'RS Al-Irsyad', 'Jl. KH M Mansyur No. 210 – 214, Surabaya', 'Swasta', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spesialis`
--

CREATE TABLE `spesialis` (
  `id_spesialis` int(10) UNSIGNED NOT NULL,
  `nama_spesialis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spesialis`
--

INSERT INTO `spesialis` (`id_spesialis`, `nama_spesialis`, `created_at`, `updated_at`) VALUES
(1, 'Mata', NULL, NULL),
(2, 'Kulit dan Kelamin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `strata`
--

CREATE TABLE `strata` (
  `id_strata` int(10) UNSIGNED NOT NULL,
  `nama_strata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `strata`
--

INSERT INTO `strata` (`id_strata`, `nama_strata`, `created_at`, `updated_at`) VALUES
(1, 'S1', NULL, NULL),
(2, 'S2', NULL, NULL),
(3, 'S3', NULL, NULL),
(4, 'Spesialis', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `univ`
--

CREATE TABLE `univ` (
  `id_univ` int(10) UNSIGNED NOT NULL,
  `nama_univ` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `univ`
--

INSERT INTO `univ` (`id_univ`, `nama_univ`, `created_at`, `updated_at`) VALUES
(1, 'Universitas Indonesia', NULL, NULL),
(2, 'Universitas Airlangga', NULL, NULL),
(3, 'Universitas Sebelas Maret', NULL, NULL),
(4, 'Universitas Gajah Mada', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_user`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ariya Wildan Devanto', 'ariya@gmail.com', '$2y$10$d2NWRABgQ26ghCiGha00C.pLKakoo00Ccf6LzveGUZQcFekskb9nC', 'WzBzqmk2w9EfVMNmXs0R6f3Ldwcgt1unT4keYr2H1EtaVfPQQomta8lMXjxf', NULL, '2018-05-11 23:36:57'),
(47, 'Abdurahman hattami', 'hatta@gmail.com', '$2y$10$WT8r6YXOWjtuoIj5wBfZ6e2r7Mmgq2rl0BFICBxJ0gItq65jyrpbe', NULL, '2018-05-06 13:15:15', '2018-05-07 05:56:49'),
(48, 'Nahda Fauzah Z', 'nahda@gmail.com', '$2y$10$d2NWRABgQ26ghCiGha00C.pLKakoo00Ccf6LzveGUZQcFekskb9nC', '54xWGERmvHt5kJdCBlU8jRQaavDMfyGfaCEdeVe3mxKJIzu9OhWPShTnEKlf', '2018-05-06 13:42:51', '2018-05-06 13:42:51'),
(49, 'Ichsan Sandi Darmawan', 'sandi@gmail.com', '$2y$10$t1dQ.NpTH.CFCYHiQP25mOuZT0fCrX78ErQLVddzcD8VZH20KIW.e', NULL, '2018-05-07 05:56:13', '2018-05-07 05:56:27'),
(50, 'Hafara Firdausi', 'hafara@gmail.com', '$2y$10$oKTzhhcvVAZxsKQWzyHu1.2eJDdpktdhSD8NwQdVYWgnld2itbNNm', NULL, '2018-05-07 06:50:44', '2018-05-07 06:50:44'),
(51, 'Muhammad didin', 'didin@gmail.com', '$2y$10$h6bCMdS7jQO71tRkRoNQDuZZPRvoIOcar/uGmtvQAhKQfqHfRYPyC', NULL, '2018-05-07 11:26:52', '2018-05-11 23:20:34'),
(52, 'Karyo Utomo', 'karyo@gmail.com', '$2y$10$GxrD1KWpd9AOe6myAbmRROlxtyq/TFzaWw2fw3BWdoSlyONKvEZpe', NULL, '2018-05-11 23:21:25', '2018-05-11 23:21:25'),
(53, 'Illham Hanafi', 'illham@gmail.com', '$2y$10$ULjrqjORjYalwtDqXJCGUOel6ahcPkjBOEuqEnQpMXaaPf2bCCYUG', NULL, '2018-05-11 23:21:55', '2018-05-11 23:21:55'),
(54, 'Nirmala', 'nirmala@gmail.com', '$2y$10$Eh4WGwgIZCcKV5rBBxw1/egDp0LVtEcTWXe3sw7FoZErp.GJqakbu', NULL, '2018-05-11 23:22:20', '2018-05-11 23:22:20'),
(57, 'Afirian M', 'vivi@gmail.com', '$2y$10$ELVooIGHqZfHb8x//ezf/u.RvurI9wF0JN.2bqrTTw07Iwq3W3L0O', NULL, '2018-05-11 23:25:16', '2018-05-11 23:25:16'),
(58, 'Dias Adhi', 'dias@gmail.com', '$2y$10$ct4ZZDChkDHk.daSWD9HyeZmU00lDbMcmOwqx7GUy.In9XyiD5.6u', NULL, '2018-05-11 23:37:29', '2018-05-11 23:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `id_waktu` int(10) UNSIGNED NOT NULL,
  `nama_bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_waktu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_waktu` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alergi`
--
ALTER TABLE `alergi`
  ADD PRIMARY KEY (`id_alergi`);

--
-- Indexes for table `alerginya`
--
ALTER TABLE `alerginya`
  ADD PRIMARY KEY (`id_alerginya`),
  ADD KEY `alerginya_id_user_foreign` (`id_user`),
  ADD KEY `alerginya_id_alergi_foreign` (`id_alergi`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_det`),
  ADD KEY `detail_id_user_foreign` (`id_user`),
  ADD KEY `detail_id_jk_foreign` (`id_jk`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `dokter_id_user_foreign` (`id_user`),
  ADD KEY `dokter_id_strata_foreign` (`id_strata`),
  ADD KEY `dokter_id_univ_foreign` (`id_univ`),
  ADD KEY `dokter_id_pendidikan_foreign` (`id_pendidikan`),
  ADD KEY `dokter_id_spesialis_foreign` (`id_spesialis`);

--
-- Indexes for table `kelamins`
--
ALTER TABLE `kelamins`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `obatnya`
--
ALTER TABLE `obatnya`
  ADD PRIMARY KEY (`id_obatnya`),
  ADD KEY `obatnya_id_user_foreign` (`id_user`),
  ADD KEY `obatnya_id_obat_foreign` (`id_obat`);

--
-- Indexes for table `operasi`
--
ALTER TABLE `operasi`
  ADD PRIMARY KEY (`id_operasi`);

--
-- Indexes for table `operasinya`
--
ALTER TABLE `operasinya`
  ADD PRIMARY KEY (`id_operasinya`),
  ADD KEY `operasinya_id_operasi_foreign` (`id_operasi`),
  ADD KEY `operasinya_id_riwayat_foreign` (`id_riwayat`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `penyakitnya`
--
ALTER TABLE `penyakitnya`
  ADD PRIMARY KEY (`id_penyakitnya`),
  ADD KEY `penyakitnya_id_penyakit_foreign` (`id_penyakit`),
  ADD KEY `penyakitnya_id_user_foreign` (`id_user`);

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
  ADD PRIMARY KEY (`id_perawat`),
  ADD KEY `perawat_id_user_foreign` (`id_user`),
  ADD KEY `perawat_id_riwayat_foreign` (`id_riwayat`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `rawat`
--
ALTER TABLE `rawat`
  ADD PRIMARY KEY (`id_rawat`),
  ADD KEY `rawat_id_rumah_foreign` (`id_rumah`),
  ADD KEY `rawat_id_riwayat_foreign` (`id_riwayat`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `idnya` (`dokter`),
  ADD KEY `id_pasien` (`pasien`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `rs`
--
ALTER TABLE `rs`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indexes for table `spesialis`
--
ALTER TABLE `spesialis`
  ADD PRIMARY KEY (`id_spesialis`);

--
-- Indexes for table `strata`
--
ALTER TABLE `strata`
  ADD PRIMARY KEY (`id_strata`);

--
-- Indexes for table `univ`
--
ALTER TABLE `univ`
  ADD PRIMARY KEY (`id_univ`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alergi`
--
ALTER TABLE `alergi`
  MODIFY `id_alergi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `alerginya`
--
ALTER TABLE `alerginya`
  MODIFY `id_alerginya` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_det` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelamins`
--
ALTER TABLE `kelamins`
  MODIFY `id_kel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `obatnya`
--
ALTER TABLE `obatnya`
  MODIFY `id_obatnya` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operasi`
--
ALTER TABLE `operasi`
  MODIFY `id_operasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operasinya`
--
ALTER TABLE `operasinya`
  MODIFY `id_operasinya` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `penyakitnya`
--
ALTER TABLE `penyakitnya`
  MODIFY `id_penyakitnya` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `perawat`
--
ALTER TABLE `perawat`
  MODIFY `id_perawat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rawat`
--
ALTER TABLE `rawat`
  MODIFY `id_rawat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rs`
--
ALTER TABLE `rs`
  MODIFY `id_rumah` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `spesialis`
--
ALTER TABLE `spesialis`
  MODIFY `id_spesialis` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `strata`
--
ALTER TABLE `strata`
  MODIFY `id_strata` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `univ`
--
ALTER TABLE `univ`
  MODIFY `id_univ` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id_waktu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alerginya`
--
ALTER TABLE `alerginya`
  ADD CONSTRAINT `alerginya_id_alergi_foreign` FOREIGN KEY (`id_alergi`) REFERENCES `alergi` (`id_alergi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alerginya_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_id_jk_foreign` FOREIGN KEY (`id_jk`) REFERENCES `kelamins` (`id_kel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_id_pendidikan_foreign` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id_pendidikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokter_id_spesialis_foreign` FOREIGN KEY (`id_spesialis`) REFERENCES `spesialis` (`id_spesialis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokter_id_strata_foreign` FOREIGN KEY (`id_strata`) REFERENCES `strata` (`id_strata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokter_id_univ_foreign` FOREIGN KEY (`id_univ`) REFERENCES `univ` (`id_univ`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokter_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obatnya`
--
ALTER TABLE `obatnya`
  ADD CONSTRAINT `obatnya_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obatnya_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operasinya`
--
ALTER TABLE `operasinya`
  ADD CONSTRAINT `operasinya_id_operasi_foreign` FOREIGN KEY (`id_operasi`) REFERENCES `operasi` (`id_operasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operasinya_id_riwayat_foreign` FOREIGN KEY (`id_riwayat`) REFERENCES `riwayat` (`id_riwayat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penyakitnya`
--
ALTER TABLE `penyakitnya`
  ADD CONSTRAINT `penyakitnya_id_penyakit_foreign` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penyakitnya_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perawat`
--
ALTER TABLE `perawat`
  ADD CONSTRAINT `perawat_id_riwayat_foreign` FOREIGN KEY (`id_riwayat`) REFERENCES `riwayat` (`id_riwayat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perawat_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rawat`
--
ALTER TABLE `rawat`
  ADD CONSTRAINT `rawat_id_riwayat_foreign` FOREIGN KEY (`id_riwayat`) REFERENCES `riwayat` (`id_riwayat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_id_rumah_foreign` FOREIGN KEY (`id_rumah`) REFERENCES `rs` (`id_rumah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `id_pasien` FOREIGN KEY (`pasien`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `idnya` FOREIGN KEY (`dokter`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
