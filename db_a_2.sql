-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 05:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_a_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahanpustakas`
--

CREATE TABLE `bahanpustakas` (
  `id_bahan_pustaka` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `gambar_sampul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahanpustakas`
--

INSERT INTO `bahanpustakas` (`id_bahan_pustaka`, `id_kategori`, `judul`, `isbn`, `tahun_terbit`, `penulis`, `penerbit`, `deskripsi`, `jumlah`, `gambar_sampul`) VALUES
(6, 3, 'Buku BUmi Datar', '333', 1111, 'Penyembah FLat Earth', 'Hehe', 'bumi datarrrrrrrrrrrrrrrr', 1, 'images/bahan_pustaka/1734429075_buku5.jpg'),
(7, 1, 'Harry Potter', '987867578', 2019, 'Pencipta HP', 'Sinar media', 'novel keren fantasi', 1, 'images/bahan_pustaka/1734471315_buku1.jpg'),
(8, 1, 'Laut Bercerita', '879178129', 2020, 'Penciptanya', 'gramed', 'buku bagus tentang orde baru', 1, 'images/bahan_pustaka/1734471370_buku5.jpg'),
(9, 8, 'Sherlock Holmes', '1678236818', 2021, 'JJ Rousou', 'sinar media', 'bukunya orang pintar', 1, 'images/bahan_pustaka/1734471581_buku4.jpg'),
(10, 1, 'It End With Us', '9889173', 2021, 'Hoover', 'PerpusCO', 'buku sad ending', 1, 'images/bahan_pustaka/1734471630_buku3.jpg'),
(11, 9, 'Atomic Habits', '8791723', 2019, 'Orang cerdas', 'keren', 'buku yang mengajarkan kita tentang kebiasaan kecil yang berdampak besar', 1, 'images/bahan_pustaka/1734472182_buku2.jpg'),
(12, 1, 'Bintang', '873871837', 2019, 'Tere Liye', 'gramed', 'buku bagus', 5, 'images/bahan_pustaka/1734472320_buku6.jpg'),
(13, 2, 'Buku Bagus', '81289378', 11111, 'gatau hehe', 'gatau hehe', 'apa yaaaaa', 1, 'gambar.png');

-- --------------------------------------------------------

--
-- Table structure for table `dendas`
--

CREATE TABLE `dendas` (
  `id_denda` bigint(20) UNSIGNED NOT NULL,
  `id_peminjaman` bigint(20) UNSIGNED NOT NULL,
  `jumlah_denda` double NOT NULL,
  `status_pembayaran` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dendas`
--

INSERT INTO `dendas` (`id_denda`, `id_peminjaman`, `jumlah_denda`, `status_pembayaran`) VALUES
(1, 2, 1231, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donasis`
--

CREATE TABLE `donasis` (
  `id_donasi` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `gambar_sampul` text NOT NULL,
  `status_pengajuan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donasis`
--

INSERT INTO `donasis` (`id_donasi`, `id_pengguna`, `id_kategori`, `judul`, `isbn`, `tahun_terbit`, `penulis`, `penerbit`, `deskripsi`, `jumlah`, `gambar_sampul`, `status_pengajuan`) VALUES
(1, 9, 3, 'Buku Alam', '1287981238', 2023, 'Joko Anwar', 'Gramedia', 'Buku tentang alam', 1, 'buku.png', 0),
(2, 9, 2, 'Buku Bagus', '81289378', 11111, 'gatau hehe', 'gatau hehe', 'apa yaaaaa', 1, 'gambar.png', 0),
(3, 10, 8, 'ipa', '123', 1, 'monnye', 'monye', 'monyet', 2, 'monyet.png', 0),
(4, 9, 4, 'tes', 'ts', 123, 'tes', 'tes', '1', 2, 'images/afVc7tP09H5zlJWdFRxM9i6paBLoXFnI4hNvXWfk.jpg', NULL),
(5, 9, 9, 'atomic habits', '2142411351', 2020, 'JAMES', 'gramed', 'buku bagus', 2, 'images/mq5zaHfdr79Rz7Y2w2GHkSDCs4wK5Y8dwsGgnx0F.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Novel'),
(2, 'Komik'),
(3, 'Ensiklopedia'),
(4, 'Biografi'),
(5, 'Karya Ilmiah'),
(6, 'Kamus'),
(7, 'Majalah'),
(8, 'Akademik'),
(9, 'Pengembangan Diri');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_12_08_121111_create_roles_table', 1),
(2, '2024_12_08_121112_create_ruangans_table', 1),
(3, '2024_12_08_121113_create_users_table', 1),
(4, '2024_12_08_121114_create_reservasis_table', 1),
(5, '2024_12_08_121115_create_kategoris_table', 1),
(6, '2024_12_08_124202_create_dendas_table', 1),
(7, '2024_12_08_124401_create_rekomendasis_table', 1),
(8, '2024_12_08_124433_create_bahanPustakas_table', 1),
(9, '2024_12_08_124600_create_donasis_table', 1),
(10, '2024_12_08_133430_create_peminjaman_table', 1),
(11, '2024_12_08_133432_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `id_bahan_pustaka` bigint(20) UNSIGNED NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `jatuh_tempo` date NOT NULL,
  `status_peminjaman` enum('menunggu konfirmasi','diterima','ditolak','dikembalikan') NOT NULL DEFAULT 'menunggu konfirmasi',
  `nilai` int(11) DEFAULT NULL,
  `ulasan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_pengguna`, `id_bahan_pustaka`, `tanggal_peminjaman`, `tanggal_pengembalian`, `jatuh_tempo`, `status_peminjaman`, `nilai`, `ulasan`) VALUES
(2, 9, 6, '2024-12-04', '2024-12-12', '2024-12-25', 'dikembalikan', NULL, NULL),
(5, 9, 6, '2024-12-31', NULL, '2025-01-07', 'diterima', NULL, NULL),
(14, 10, 9, '2024-12-11', NULL, '2024-12-18', 'diterima', NULL, NULL),
(15, 6, 6, '2024-12-20', NULL, '2024-12-18', 'ditolak', NULL, NULL),
(16, 9, 12, '2024-12-25', NULL, '2025-01-01', 'ditolak', NULL, NULL),
(18, 10, 8, '2024-12-11', NULL, '2024-12-18', 'diterima', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 3, 'auth_token', '8f7aade3c135d82aadf744753f7d4a75103eeda9f16046c16c3571428f6faefe', '[\"*\"]', NULL, NULL, '2024-12-15 10:20:06', '2024-12-15 10:20:06'),
(4, 'App\\Models\\User', 4, 'auth_token', '20d83b6de8ca8bef6427a6d3c7cb1f05e42a3871c5f1913a9adacd0e1e42ab59', '[\"*\"]', NULL, NULL, '2024-12-15 10:22:10', '2024-12-15 10:22:10'),
(5, 'App\\Models\\User', 5, 'auth_token', '774083d86f276103415208d67f9772131c556ffc1365b6f6a9a9620c5b9d3be2', '[\"*\"]', NULL, NULL, '2024-12-15 10:23:06', '2024-12-15 10:23:06'),
(6, 'App\\Models\\User', 6, 'auth_token', '5c24748d1f7f2e7f6f00610c286cb84472a4bde6ed0e341d26bf0bd853b153a9', '[\"*\"]', NULL, NULL, '2024-12-15 10:24:41', '2024-12-15 10:24:41'),
(7, 'App\\Models\\User', 7, 'auth_token', 'de3318c3e24736b993e089682705bfe9ac20296ba50466af87f199ad2ba221d3', '[\"*\"]', NULL, NULL, '2024-12-15 10:26:00', '2024-12-15 10:26:00'),
(8, 'App\\Models\\User', 8, 'auth_token', 'fa12801aa8901adf687f750f681a5c7aa08a70dc11a3902bf38d63b61fd6102b', '[\"*\"]', '2024-12-15 10:54:13', NULL, '2024-12-15 10:28:00', '2024-12-15 10:54:13'),
(12, 'App\\Models\\User', 8, 'auth_token', 'f47e5ee37d0618906665b96c555632de884433b09cdf22c4cf65a2e7d4a45cde', '[\"*\"]', NULL, NULL, '2024-12-15 11:36:20', '2024-12-15 11:36:20'),
(13, 'App\\Models\\User', 8, 'auth_token', '4578e11436b9c619cab5f6d4a753817a2ae2ccfc7bf51a997daec70124a68b7e', '[\"*\"]', NULL, NULL, '2024-12-15 11:47:44', '2024-12-15 11:47:44'),
(14, 'App\\Models\\User', 8, 'auth_token', 'feda87621e86c92a269eff5a72e1dd69bf6f19a85792a000425f398337167389', '[\"*\"]', NULL, NULL, '2024-12-15 11:51:19', '2024-12-15 11:51:19'),
(15, 'App\\Models\\User', 8, 'auth_token', 'be45c11b203e289fa973ebfa0e61f7e368ffc2e712e869918b5338c689cbd254', '[\"*\"]', NULL, NULL, '2024-12-15 11:51:37', '2024-12-15 11:51:37'),
(16, 'App\\Models\\User', 8, 'auth_token', '41fd2f12d0103ff8f5c7c894e5d620d2eb267741bbabb43e411f0dd5cf6abbdc', '[\"*\"]', NULL, NULL, '2024-12-15 11:54:01', '2024-12-15 11:54:01'),
(17, 'App\\Models\\User', 8, 'auth_token', '498b77555286130700a8a56437dafa61526479f3d0fbbcad7971764c7661f6d7', '[\"*\"]', NULL, NULL, '2024-12-15 11:54:52', '2024-12-15 11:54:52'),
(18, 'App\\Models\\User', 8, 'auth_token', '952e69ff0be85ca0f194b66353ae7b9bc4bd767c24ee4c12a67e116b595f0b22', '[\"*\"]', NULL, NULL, '2024-12-15 11:55:10', '2024-12-15 11:55:10'),
(19, 'App\\Models\\User', 8, 'auth_token', '832f6267209ec94f46016613276d750020783d4c9edda3cf5b7988f800cd360c', '[\"*\"]', NULL, NULL, '2024-12-15 11:57:31', '2024-12-15 11:57:31'),
(20, 'App\\Models\\User', 8, 'auth_token', '4dce276bbf56c5f11e20486326eea80f5669a069164655a0e02332ed6174635b', '[\"*\"]', NULL, NULL, '2024-12-15 12:12:34', '2024-12-15 12:12:34'),
(21, 'App\\Models\\User', 8, 'auth_token', 'd0e2ac8134edca587d98ddbed002c8aebe5f27321e613cc9ec1562429f955b9b', '[\"*\"]', NULL, NULL, '2024-12-15 12:22:15', '2024-12-15 12:22:15'),
(22, 'App\\Models\\User', 8, 'auth_token', 'e3614a60140ef70396037620ca26938f5d7316b7d16717613f2cf99317b5f9a1', '[\"*\"]', NULL, NULL, '2024-12-15 12:32:20', '2024-12-15 12:32:20'),
(23, 'App\\Models\\User', 8, 'auth_token', 'e0affe8574aacf0b4b6c87b6e23d31935e540e7f1aa849ccb3498f0da8175158', '[\"*\"]', NULL, NULL, '2024-12-15 12:51:37', '2024-12-15 12:51:37'),
(24, 'App\\Models\\User', 9, 'auth_token', '52a50b4f78c2bbe82f25b4c55b91e64c7e01e362aedd0070e6df12208e051a65', '[\"*\"]', NULL, NULL, '2024-12-15 12:52:29', '2024-12-15 12:52:29'),
(25, 'App\\Models\\User', 9, 'auth_token', '022c37e975538f74c77094fd16bae4d0e3b6eaff2c5928a86ba0b1771220b6e4', '[\"*\"]', NULL, NULL, '2024-12-15 13:07:44', '2024-12-15 13:07:44'),
(26, 'App\\Models\\User', 8, 'auth_token', '0affafa94572716f31a13200d83daf3ed3a24bfc659caea12a6a5801d94f5c6a', '[\"*\"]', NULL, NULL, '2024-12-15 13:08:13', '2024-12-15 13:08:13'),
(27, 'App\\Models\\User', 10, 'auth_token', 'dba96f8360231adb435d713a97438fcd9aa22cfdc481ba12374cd29d07158ea4', '[\"*\"]', NULL, NULL, '2024-12-15 13:18:12', '2024-12-15 13:18:12'),
(28, 'App\\Models\\User', 11, 'auth_token', '2af52a72f2d8fccc519fef55d3d666c1cefba925b8e418c341805c416dcb545b', '[\"*\"]', NULL, NULL, '2024-12-15 13:21:49', '2024-12-15 13:21:49'),
(29, 'App\\Models\\User', 11, 'auth_token', '9d33484e021f0f0846973bc9e8c9cfc1a3ea513422b7c726a3b4dc934797e8b7', '[\"*\"]', NULL, NULL, '2024-12-15 13:22:09', '2024-12-15 13:22:09'),
(30, 'App\\Models\\User', 8, 'auth_token', '03e99bf231b338261eded3c46c4057eddfe4c78a187f9fad23bfe64872293c88', '[\"*\"]', NULL, NULL, '2024-12-16 14:42:43', '2024-12-16 14:42:43'),
(31, 'App\\Models\\User', 8, 'auth_token', 'febd49ec47a1f5dcfdcedaccc4a33d5c21872f9eebc9b82633c4942ed58927f3', '[\"*\"]', NULL, NULL, '2024-12-16 14:42:45', '2024-12-16 14:42:45'),
(32, 'App\\Models\\User', 8, 'auth_token', 'f8e89eccf98cc197b45c9aa70bbaa08620999da41ffd66a48d48b32cd989a23a', '[\"*\"]', '2024-12-16 16:49:29', NULL, '2024-12-16 16:20:34', '2024-12-16 16:49:29'),
(33, 'App\\Models\\User', 8, 'auth_token', 'b5b212bfb4cec1d236e82ea338b5a5ddb81688cf493beae2c19fc723be8a6541', '[\"*\"]', NULL, NULL, '2024-12-16 16:25:14', '2024-12-16 16:25:14'),
(34, 'App\\Models\\User', 8, 'auth_token', '89ad8018c80bbd5d0b44067db4996703f862dcd32f893ab1fd8b562c8296423c', '[\"*\"]', NULL, NULL, '2024-12-16 16:33:33', '2024-12-16 16:33:33'),
(35, 'App\\Models\\User', 8, 'auth_token', '38060f724393866671368d0299aebab4f30822f1c685457e97075153136469ba', '[\"*\"]', NULL, NULL, '2024-12-16 16:34:05', '2024-12-16 16:34:05'),
(36, 'App\\Models\\User', 8, 'auth_token', 'abf26896afed780fe0350ebd7e27654cb079215219b7e68505948039c6a92957', '[\"*\"]', NULL, NULL, '2024-12-16 16:35:09', '2024-12-16 16:35:09'),
(37, 'App\\Models\\User', 8, 'auth_token', 'a6f4a4d87544bace7a1e748cef270879e18b376c4a0a1489e812b50dc1d33b8f', '[\"*\"]', NULL, NULL, '2024-12-16 16:35:39', '2024-12-16 16:35:39'),
(39, 'App\\Models\\User', 12, 'auth_token', '4e67e8499b2954943e5032fb07a666e9f3124682257f4f8f2e7c3d31482f2950', '[\"*\"]', NULL, NULL, '2024-12-16 16:48:01', '2024-12-16 16:48:01'),
(40, 'App\\Models\\User', 13, 'auth_token', '0bde6e1ef2740957a48c94f28e120a90b7cdf77a85378ee009c92ffaba68f5b5', '[\"*\"]', NULL, NULL, '2024-12-16 16:53:13', '2024-12-16 16:53:13'),
(41, 'App\\Models\\User', 14, 'auth_token', 'c58eb1cac096d09228920b8c98a2696d231b5b40ab7b074eac82c1057d8ad3b5', '[\"*\"]', NULL, NULL, '2024-12-16 16:58:40', '2024-12-16 16:58:40'),
(42, 'App\\Models\\User', 15, 'auth_token', 'cb198ce45abc14c03ec780118234c3383c95c3b3058edf66340c396748bdfe96', '[\"*\"]', NULL, NULL, '2024-12-16 16:59:09', '2024-12-16 16:59:09'),
(43, 'App\\Models\\User', 16, 'auth_token', '4d05aefe61330fead7d6a50767c32d0c13bccde1c6d15dd9f59fea46dca1c776', '[\"*\"]', NULL, NULL, '2024-12-16 16:59:25', '2024-12-16 16:59:25'),
(44, 'App\\Models\\User', 8, 'auth_token', '36554c07e09122281a04fa0b45c7bc3925ed2fbe2facf1c58fb43486c9a31762', '[\"*\"]', '2024-12-16 17:06:06', NULL, '2024-12-16 17:05:51', '2024-12-16 17:06:06'),
(45, 'App\\Models\\User', 8, 'auth_token', '90a3c5f3015cf17e40f1c49cb90190f92ff8bfb91db108a57b259e6b01266a3d', '[\"*\"]', '2024-12-17 16:47:56', NULL, '2024-12-16 19:19:04', '2024-12-17 16:47:56'),
(50, 'App\\Models\\User', 8, 'auth_token', 'dff2e66e7b3391740b51ca9a397282527573c849b80d321b986bc3b7c4873cd7', '[\"*\"]', '2024-12-17 10:33:36', NULL, '2024-12-17 09:24:36', '2024-12-17 10:33:36'),
(51, 'App\\Models\\User', 8, 'auth_token', 'ebd9b27245935a0f59120077f64da14d23a5d902b6fe7263d951a0bb36444ca5', '[\"*\"]', NULL, NULL, '2024-12-17 10:43:54', '2024-12-17 10:43:54'),
(52, 'App\\Models\\User', 8, 'auth_token', '798d991239239ebbcf1b9a6abb3f265c4b9f21ee3378310c9033155206b44d70', '[\"*\"]', NULL, NULL, '2024-12-17 10:43:55', '2024-12-17 10:43:55'),
(54, 'App\\Models\\User', 9, 'auth_token', '7e4b2d277a2b234b1ae29ada697c59ec95c5aa7dd417420eff6cc4644559ca3a', '[\"*\"]', '2024-12-17 12:02:33', NULL, '2024-12-17 10:45:10', '2024-12-17 12:02:33'),
(55, 'App\\Models\\User', 9, 'auth_token', 'bf8941e9f1f7785672e0777b5b63872b706f7369aa621569c048ecc2650c31c0', '[\"*\"]', '2024-12-17 11:50:38', NULL, '2024-12-17 10:50:45', '2024-12-17 11:50:38'),
(68, 'App\\Models\\User', 8, 'auth_token', 'f43a1538345c933d57b6531c7d9de4176536169b3e26fc763d07126ddd123bc1', '[\"*\"]', '2024-12-17 20:33:38', NULL, '2024-12-17 20:20:33', '2024-12-17 20:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasis`
--

CREATE TABLE `rekomendasis` (
  `id_rekomendasi` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `alasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekomendasis`
--

INSERT INTO `rekomendasis` (`id_rekomendasi`, `id_pengguna`, `judul`, `penulis`, `kategori`, `tahun_terbit`, `alasan`) VALUES
(1, 9, 'Buku sejarah', 'guru sejarah', 'sejarah', 2020, 'karna pengen'),
(2, 9, 'Buku kimia', 'guru sejarah', 'ipa', 2020, 'karna pengen aja'),
(3, 9, '19999hjk', 'guru sejarah', 'IPS', 1212, 'gatau');

-- --------------------------------------------------------

--
-- Table structure for table `reservasis`
--

CREATE TABLE `reservasis` (
  `id_reservasi` bigint(20) UNSIGNED NOT NULL,
  `id_ruangan` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `tanggal_reservasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservasis`
--

INSERT INTO `reservasis` (`id_reservasi`, `id_ruangan`, `id_pengguna`, `tanggal_reservasi`) VALUES
(1, 13, 9, '2024-12-18'),
(2, 14, 9, '2024-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `nama_role` enum('admin','pengguna') NOT NULL DEFAULT 'pengguna'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `nama_role`) VALUES
(1, 'pengguna'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id_ruangan` bigint(20) UNSIGNED NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar_ruangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id_ruangan`, `nama_ruangan`, `deskripsi`, `gambar_ruangan`) VALUES
(13, 'Leissure Room 1', 'Ruang belajar lesehan', 'images/ruangan/1734475227_discuss_room.jpg'),
(14, 'Leissure Room 2', 'Leisure room 2 bisa lesehan', 'images/ruangan/1734475260_discuss_room.jpg'),
(15, 'Discuss Room 1', 'ruang buat diskusi', 'images/ruangan/1734475288_discuss_room3.jpg'),
(16, 'Discuss Room 2', 'buat diskusi', 'images/ruangan/1734475313_discuss_room3.jpg'),
(17, 'Study Room 1', 'buat belajar', 'images/ruangan/1734475342_discuss_room2.jpg'),
(18, 'Study Room 2', 'buat belajar', 'images/ruangan/1734475377_discuss_room2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1hpra2EtxVb853JHnU9r9Ep3bpR99uU2s6841MS4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjhubGh4REt6Y083TDVRcWI0Sk5xNzloeWxwTDRxTVdUa0RkRVFxUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5nZW1iYWxpYW4tYnVrdSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1734492790);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_pengguna`, `id_role`, `nama_lengkap`, `email`, `password`, `nomor_telepon`, `remember_token`) VALUES
(6, 2, 'Budi', 'budi@gmail.com', '$2y$12$kzIFvJ1JDTgh3X1LNKx5GeS3bUaweS4D.0mldLmVncDdbJJz4WBVy', '081212121212', NULL),
(7, 2, 'Wedhus', 'wedhus@gmail.com', '$2y$12$4dhJZzitZIZCMExnq52to.DjASxvgthFY6xDzFLIscHWmSEi0qml6', '081212121212', NULL),
(8, 2, 'Munyuk', 'munyuk@gmail.com', '$2y$12$ti.ozvL/gEFYVqt8awVMoet5nv3zPTlc6d4vchgGndqSjimvquooa', '081212121212', NULL),
(9, 1, 'Yoga Manusia', 'yoga@gmail.com', '$2y$12$eGpa9//coLyj.ZuFRQLyHe0KnuhLdTMZB4fG3RnmWTVFq/GaW0sOG', '081212121212', NULL),
(10, 1, 'Monyet Bekantan', 'monyet@gmail.com', '$2y$12$otO7cT3rrN22Q8BaS17hS.JhP6WaeUc1YPEfw0CviQNh9TcR905Q.', '0812121212126', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahanpustakas`
--
ALTER TABLE `bahanpustakas`
  ADD PRIMARY KEY (`id_bahan_pustaka`),
  ADD KEY `bahanpustakas_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `dendas`
--
ALTER TABLE `dendas`
  ADD PRIMARY KEY (`id_denda`),
  ADD KEY `fk_denda_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `donasis`
--
ALTER TABLE `donasis`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `donasis_id_pengguna_foreign` (`id_pengguna`),
  ADD KEY `donasis_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `peminjaman_id_pengguna_foreign` (`id_pengguna`),
  ADD KEY `peminjaman_id_bahan_pustaka_foreign` (`id_bahan_pustaka`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rekomendasis`
--
ALTER TABLE `rekomendasis`
  ADD PRIMARY KEY (`id_rekomendasi`),
  ADD KEY `rekomendasis_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `reservasis`
--
ALTER TABLE `reservasis`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `reservasis_id_ruangan_foreign` (`id_ruangan`),
  ADD KEY `reservasis_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahanpustakas`
--
ALTER TABLE `bahanpustakas`
  MODIFY `id_bahan_pustaka` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dendas`
--
ALTER TABLE `dendas`
  MODIFY `id_denda` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donasis`
--
ALTER TABLE `donasis`
  MODIFY `id_donasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `rekomendasis`
--
ALTER TABLE `rekomendasis`
  MODIFY `id_rekomendasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasis`
--
ALTER TABLE `reservasis`
  MODIFY `id_reservasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `id_ruangan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_pengguna` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahanpustakas`
--
ALTER TABLE `bahanpustakas`
  ADD CONSTRAINT `bahanpustakas_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dendas`
--
ALTER TABLE `dendas`
  ADD CONSTRAINT `fk_denda_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donasis`
--
ALTER TABLE `donasis`
  ADD CONSTRAINT `donasis_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donasis_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_id_bahan_pustaka_foreign` FOREIGN KEY (`id_bahan_pustaka`) REFERENCES `bahanpustakas` (`id_bahan_pustaka`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekomendasis`
--
ALTER TABLE `rekomendasis`
  ADD CONSTRAINT `rekomendasis_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservasis`
--
ALTER TABLE `reservasis`
  ADD CONSTRAINT `reservasis_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservasis_id_ruangan_foreign` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangans` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
