-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2025 at 11:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bintangplafonpvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `excellence` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `image`, `description`, `excellence`) VALUES
(5, 'Fitting Ornamen Pvc', '2024-10-22 10:00:49', '2024-10-27 01:03:05', 'categories/6sU3vm27mzUJziwFQLGNDjr1oIJvEZVn2fpzTBG2.png', '<h3>FITTING ORNAMEN PVC</h3>\r\n<p>Sebuah plafon berperan penting bagi ruangan. Plafon berfungsi sebagai pembatas antara ruangan dengan atap. Ada bayak jenis dan model plafon salah satunya adalah plafon ornamen. Plafon jenis ini didesain unik dan menarik sehingga cocok digunakan sebagai penunjang penampilan interior ruangan Anda. Plafon ornamen akan memberikan kesan mewah dan elegan sehingga cocok digunakan untuk kebutuhan komersial. Pemasangan plafon ornamen cukup mudah dan bisa digunakan untuk masa pakai yang lama.</p>', '<p>Penggunaan plafon oranamen mampu menambah penampilan interior ruangan Anda. Temukan berbagai jenis dan model plafon ornamen hanya kepada kami untuk produk unggulan <br>yang awet dan bisa digunakan untuk waktu yang lama.</p>'),
(6, 'List Pvc', '2024-10-22 10:26:38', '2024-10-27 01:02:18', 'categories/PJsioyZCufOmFRgxVKS7kxAhmCq4SeJNkab5DwHp.png', '<h3>LIST PLAFON PVC</h3>\r\n<p>Plafon atau langit-langit adalah permukaan interior atas yang berhubungan dengan bagian atas sebuah ruangan. Umumnya, langit-langit bukan unsur struktural, melainkan permukaan yang menutupi lantai struktur atap di atas. Pada pemasangan plafoan, biasanya dilengkapi dengan lis plafon yang berfungsi sebagai penghubung antara permukaan plafon dan dinding yang saling menempel. Tanpa adanya lis plafon, area plafon tidak hanya terlihat biasa saja tapi juga akan mudah retak dan runtuh.</p>', '<p>Bahan yang digunakan dalam pembuatan lis plafon diantaranya&nbsp; gypsum, PVC, dan kayu. <br>Lis plafon ini memiliki kelebihan dan kekurangan masing masing. Biasanya lis plafon dari bahan gypsum pada umumnya<br>mudah diukir ke dalam bentuk yang rumit. Lis plafon dari PVC cocok untuk bangunan bergaya modern dan minimalis. <br>Sedangkan lis plafon dari kayu cocok untuk bangunan bergaya tradisional.<br><br>Kami merupakan distributor lis plafon pvc terlengkap, termurah dengan kualitas terbaik.<br>Selain itu kami juga menyediakan berbagai merk dan model lis plafon pvc terbaik yang sudah menjadi pilihan konsumen untuk segala kebutuhan.<br>Beli list plafon pvc harga murah dari kami dengan spesifikasi terbaik.<br>Untuk informasi pemesanan silahkan menghubungi nomor telepon yang tertera pada halaman ini.</p>'),
(7, 'Plafon Pvc', '2024-10-22 10:33:16', '2024-10-27 01:01:00', 'categories/QDKoj9gYcZ5JoaittS4owlPCOD0VMVL4dqmBs5XD.png', '<h3>PLAFON PVC</h3>\r\n<p>Plafon PVC banyak digunakan untuk hunian pribadi maupun komersial. Plafon jenis ini diproduksi dari material PVC berkualitas yang lentur dan tidak mudah pecah. Berfungsi sebagai pembatas antara ruangan dengan atap. Selain itu sebuah plafon memberikan kesan rapi, mewah dan elegan, khususnya untuk plafon ornamen. Harga plafon PVC bervariasi tergantung dari ukuran dan ketebalan. Produk ini mudah dalam pemasangan sehingga bisa diaplikasikan untuk berbagai keperluan konstruksi. Plafon PVC memiliki banyak keunggulan dibandingkan plafon dari gypsum, triplek, atau fiber semen. Bahan plafon PVC lebih lentur, ringan, dan mampu bertahan selama puluhan tahun. Keawetan ini disebabkan karena kandungan Polymer Isosianat membuat plafon PVC tidak akan terurai atau lapuk.</p>\r\n<p>Plafon PVC terbuat dari bahan PVC yang telah di proses dengan peralatan MODERN sehinga menghasilkan produk plafon&nbsp; berbentuk papan plastik tipis bersekat, sangat ringan , mudah di bongkar pasang, tahan air dan anti rayaptersedia dalam aneka ragam motif dan desain , tidak mudah kotor mudah di bersihkan, kedap suara, tahan panas,aman di pergunakan karena terbuat dari bahan yang tidak mudah terbakar, terbukti jika di dekatkan pada api akan dengan cepat padam, harga sangat terjangkau, cocok di aplikasikan di dapur, ruang kantor ruang tamu kamar mandi, dll&nbsp;</p>', '<h1>Keunggulan Produk:</h1>\r\n<p>Penggunaan bahan PVC berkualitas tinggi yang tahan terhadap cuaca, air, dan kelembaban, menjadikan produk mereka tahan lama dan mudah perawatan. Desain inovatif dan beragam untuk memenuhi berbagai gaya dan preferensi desain interior. Komitmen pada keberlanjutan dengan menggunakan bahan ramah lingkungan dan proses produksi yang efisien.</p>\r\n<p>&nbsp;</p>\r\n<h1>Tahan Air:</h1>\r\n<p>Plafon PVC tahan terhadap air, sehingga sangat cocok untuk digunakan di area yang rentan terhadap kelembaban, seperti kamar mandi atau dapur. Plafon ini tidak akan mengalami pembusukan atau deformasi akibat paparan air.</p>\r\n<p>&nbsp;</p>\r\n<h1>Ringan:</h1>\r\n<p>Plafon PVC sangat ringan, sehingga memudahkan instalasi. Keberatan yang ringan juga membuatnya cocok untuk digunakan pada struktur bangunan yang tidak bisa menahan beban berat.</p>\r\n<p>&nbsp;</p>\r\n<h1>Mudah Dibersihkan:</h1>\r\n<p>Plafon PVC sangat mudah dibersihkan. Cukup dengan menggunakan lap basah atau sikat lembut untuk membersihkannya dari debu atau kotoran lainnya. Sifat tahan airnya juga membuatnya dapat dibersihkan dengan menggunakan air.</p>\r\n<p>&nbsp;</p>\r\n<h1>Tahan Terhadap Rayap dan Serangga:</h1>\r\n<p>PVC tidak menarik serangga atau rayap, sehingga plafon ini tidak akan rusak atau terpengaruh oleh serangan hama. Ini menjadikannya pilihan yang tahan lama dan mudah dipelihara.</p>\r\n<p>&nbsp;</p>\r\n<h1>Beragam Desain dan Warna:</h1>\r\n<p>Plafon PVC tersedia dalam berbagai desain dan warna, memungkinkan Anda memilih sesuai dengan gaya dan tema desain interior ruangan. Ini memberikan fleksibilitas dalam menciptakan tampilan yang sesuai dengan preferensi estetika Anda.</p>\r\n<p>&nbsp;</p>\r\n<h1>Harga Terjangkau:</h1>\r\n<p>Dibandingkan dengan beberapa opsi plafon lainnya, plafon PVC cenderung lebih terjangkau. Ini membuatnya menjadi pilihan yang ekonomis tanpa mengorbankan kualitas.</p>\r\n<p>&nbsp;</p>\r\n<h1>Tahan Lamaa:</h1>\r\n<p>Plafon PVC umumnya tahan lama dan tidak mudah rusak. Mereka tidak rentan terhadap perubahan suhu atau kelembaban, dan mereka dapat tetap dalam kondisi baik selama bertahun-tahun.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotlines`
--

CREATE TABLE `hotlines` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotlines`
--

INSERT INTO `hotlines` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, '62895610411991', '2024-10-28 11:04:51', '2024-10-28 11:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_22_133841_create_categories_table', 2),
(6, '2024_10_22_141812_add_image_to_categories_table', 3),
(7, '2024_10_22_142410_add_description_to_categories_table', 4),
(8, '2024_10_22_171646_add_excellence_to_categories_table', 5),
(9, '2024_10_23_174012_create_products_table', 6),
(10, '2024_10_26_151014_create_whatsapps_table', 7),
(11, '2024_10_26_153431_add_distributor_to_whatsapps_table', 8),
(12, '2024_10_26_171657_add_whatsapp_id_to_products_table', 9),
(13, '2024_10_26_172147_remove_whatsapp_id_from_products_table', 10),
(14, '2024_10_26_181947_create_hotlines_table', 11),
(15, '2024_10_28_123124_create_product_whatsapp_table', 12),
(16, '2024_10_28_145849_remove_whatsapp_id_from_products_table', 13),
(17, '2024_10_28_154238_drop_product_whatsapp_table', 14),
(18, '2025_02_25_091903_create_social_media_table', 15),
(19, '2025_02_25_140247_create_slideshow_table', 16),
(20, '2025_02_25_150502_add_mobile_to_slideshow_table', 17),
(21, '2025_02_25_160454_create_video_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(12, 'MOZ 8002', '-', '100000.00', 'products/uARTdKEr37yZpjQhlcMKLo1ztTLIZghjnLzqTFOn.png', 7, '2024-10-27 00:48:40', '2024-10-27 07:01:38'),
(13, 'MOZ 8003', '-', '100000.00', 'products/7u20dBThK1qOLYAjfK2o0oHL1p3EY4oJusA0ax3s.png', 7, '2024-10-27 00:50:04', '2024-10-27 07:22:12'),
(14, 'MOZ 8004', '-', '100000.00', 'products/6aH2Ws9eDUkUPPgHk6RpFkQ8BsEkT8SddkqqQz0D.png', 7, '2024-10-27 00:51:08', '2024-10-27 07:22:18'),
(15, 'MOZ 8005', '-', '100000.00', 'products/crWws9s33VGgSlqlAylCxmGUFk6NfSNLN0ye8XKU.png', 7, '2024-10-27 00:53:04', '2024-10-27 07:22:22'),
(16, 'MOZ 8006', '-', '100000.00', 'products/cTvXm1wOx6MRKynKGlken7EStVikwEI3FnbdlYdo.png', 7, '2024-10-27 00:54:37', '2024-10-27 07:22:26'),
(17, 'MOZ 8007', '-', '100000.00', 'products/3bkZ7ieLL9hG0B7khfrSSQkVqy4gjbNhV4YKOYS5.png', 7, '2024-10-27 00:55:16', '2024-10-27 07:22:31'),
(18, 'MOZ 8008', '-', '100000.00', 'products/7tKwFQA7JdyRQax89vTo3EpubEu7yARk7pgS1KTW.png', 7, '2024-10-27 00:55:56', '2024-10-27 07:22:36'),
(26, 'AB UG 2', '-', '100000.00', 'products/LAE0Ggb05422ZeIFIzaColydo1XjZp6GitoNzugs.png', 6, '2024-10-27 01:14:06', '2024-10-27 02:15:14'),
(27, 'AB UG', '-', '100000.00', 'products/8COXhu87RtB1RcdHtzPaVoyAbTfEimYg5uBWNzaQ.png', 6, '2024-10-27 01:14:59', '2024-10-27 02:15:14'),
(28, 'AB', '-', '100000.00', 'products/W2Jb4hAn9G3P6nulnHRa2vWjKBumXQYPWlFXtBX0.png', 6, '2024-10-27 01:15:44', '2024-10-27 02:15:14'),
(29, 'BB', '-', '100000.00', 'products/ZxNjgTdiAFjumITntNTkg25wGr4pPZpd1zhTE3I4.png', 6, '2024-10-27 01:16:24', '2024-10-27 02:15:14'),
(30, 'CA', '-', '100000.00', 'products/IDD4CSJPnN6dDmvcCA1nZSkGoCANBGvaEWVZJBDI.png', 6, '2024-10-27 01:17:12', '2024-10-27 02:15:14'),
(31, 'EA', '-', '100000.00', 'products/byXOxaUSzF6XwU4soPQ8SvmyjLobqWDPknEDz9En.png', 6, '2024-10-27 01:18:02', '2024-10-27 02:15:14'),
(32, 'F GOLD', '-', '100000.00', 'products/X3aw2MuPmC8cJxqQYAYXbg697hiEbElPGZuOcjSN.png', 6, '2024-10-27 01:18:39', '2024-10-27 02:15:14'),
(33, 'DB', '-', '100000.00', 'products/leumUOCBBGPRueI8Jiop1uRPC1K6lahT1RrNMTGV.png', 6, '2024-10-27 01:19:11', '2024-10-27 02:15:14'),
(34, 'MOZ 8071', '-', '100000.00', 'products/09jX5LXWF0kFPL8iRPw8p9vBOXOHfpjLKc04xkPY.png', 5, '2024-10-27 01:23:39', '2024-10-27 02:15:14'),
(35, 'MOZ 8100', '-', '100000.00', 'products/k7Se9tklUkQUViFOqLbTIpiA5kvrXiIgXzfLfeF0.png', 5, '2024-10-27 01:26:02', '2024-10-27 02:15:14'),
(36, 'MOZ 8099', '-', '100000.00', 'products/pgGeUyHftcfBLNYGgYip5Co8U8IVG4PMq0HWCdKY.png', 5, '2024-10-27 01:26:48', '2024-10-27 02:15:14'),
(37, 'MOZ 8085', '-', '100000.00', 'products/PpvjfMiNO7djBrMicli99uWnBSQxMEYX6yu0Gzr0.png', 5, '2024-10-27 01:27:28', '2024-10-27 02:15:14'),
(38, 'MOZ 8083', '-', '100000.00', 'products/pWSgiEt5Nl3O72ogUkBWlaLbN5xZ69sv20G174rK.png', 5, '2024-10-27 01:34:00', '2024-10-27 02:15:14'),
(39, 'MOZ 8078', '-', '100000.00', 'products/cO8oCV6wpt7kgufArhdKmihLLGBoxYTfufqywqhB.png', 5, '2024-10-27 01:35:00', '2024-10-27 02:15:14'),
(40, 'MOZ 8075', '-', '100000.00', 'products/KMQPOt911Gs2lGtJ1JvWF7wDWXHQi7NkHZooiLwl.png', 5, '2024-10-27 01:36:42', '2024-10-27 02:15:14'),
(41, 'MOZ 8053', '-', '100000.00', 'products/kk9X8maVaI1kWftq4I2an1KwFoouoWsfAtJH6M1L.png', 5, '2024-10-27 01:37:35', '2024-10-27 02:15:14'),
(44, 'testing', '-', '100000.00', 'products/jOlNbQtcfJ8A9gAHSiQwz2oU0kZ2veI4mPkfrvrS.jpg', 7, '2024-10-27 08:03:00', '2024-10-27 08:03:00'),
(45, 'tess', '-', '100000.00', 'products/13XbGPU4ryB9IcjXbF7Mfe2QVYjnshLXGFujsooh.png', 5, '2024-10-28 05:40:11', '2024-10-28 05:40:11'),
(46, 'tes2', '-', '100000.00', 'products/NXXN9SRVfJwexJzJMosxSRhlsaXG2DxAuDcTPApS.jpg', 5, '2024-10-28 05:47:14', '2024-10-28 05:47:14'),
(47, 'tes lagi', '-', '100000.00', 'products/r2SwfrgpUKFji0gUjjZYYnvFSmtnSxs7wJh7YJO3.png', 5, '2024-10-28 05:52:55', '2024-10-28 05:52:55'),
(48, 'testing', 'testing desc', '10000.00', 'products/mlhAw9VQkjXt1OllNew96PggGAj8b6FfOMBU3ysP.png', 5, '2025-02-25 02:25:42', '2025-02-25 02:25:42'),
(49, 'testing', 'testing desc', '10000.00', 'products/oWDcNglavxeqFrSRv7W1GSRHjTwpU0X2TMeThZLK.png', 5, '2025-02-25 02:26:38', '2025-02-25 02:26:38'),
(50, 'testing biasa', 'testing biasa saja', '20000.00', 'products/6PyXQbv5xhVzEi2dMZJV9IB4tWeIvR0mzOSRxGuH.png', 7, '2025-02-25 02:32:20', '2025-02-25 02:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_mobile` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `heading`, `image`, `link`, `created_at`, `updated_at`, `image_mobile`) VALUES
(1, NULL, 'slideshows/TEWElTNd8Nx1D7pHQcTJigakQ2ltuy9O7eSWMTW4.webp', NULL, '2025-02-25 07:49:09', '2025-02-25 08:11:24', 'slideshows/wxL1Io9PPBXYUttSjVnxjCVpBJwpfffADyDX0KrI.webp'),
(2, NULL, 'slideshows/c9OVDlhHRPplZucXm2b74jgNyaI6m12d04jTxQYG.webp', NULL, '2025-02-25 07:56:28', '2025-02-25 07:56:28', NULL),
(3, NULL, 'slideshows/DztchR1IfWcq5ONvlCMkrHrrj6N0Jzta9Edp1cDe.webp', NULL, '2025-02-25 07:56:39', '2025-02-25 07:56:39', NULL),
(4, NULL, 'slideshows/FIapDtiqy9RlH8fnzIyLnEUbWFZ8ghm1lQphnUkf.webp', NULL, '2025-02-25 07:56:49', '2025-02-25 07:56:49', NULL),
(5, NULL, 'slideshows/LDH1W7MZ542Bc3Zs1gui3Fc3i4EB16emgSJfmB3o.webp', NULL, '2025-02-25 07:57:08', '2025-02-25 07:57:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `icon`, `name`, `created_at`, `updated_at`) VALUES
(1, 'mdi:facebook', 'https://web.facebook.com/rizqitajayagemilang/?_rdc=1&_rdr#', '2025-02-25 02:59:23', '2025-02-25 03:25:14'),
(3, 'mdi:instagram', 'https://www.instagram.com/rizqitajayagemilang.id/', '2025-02-25 03:07:52', '2025-02-25 03:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@rizqitajayagemilang.com', NULL, '$2a$12$QZ/wb3W8hAuD6eBhDVNhUu1SZ5QRt1.KVRqkJY2XEEOb8nPxXwaGC', NULL, '2024-10-21 11:51:40', '2024-10-28 11:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` bigint UNSIGNED NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `video`, `created_at`, `updated_at`) VALUES
(6, 'https://www.youtube.com/watch?v=D0UnqGm_miA', '2025-02-25 09:28:58', '2025-02-25 10:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `whatsapps`
--

CREATE TABLE `whatsapps` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `distributor` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whatsapps`
--

INSERT INTO `whatsapps` (`id`, `name`, `created_at`, `updated_at`, `distributor`) VALUES
(9, '6287866291056', '2024-10-27 07:01:01', '2024-10-27 07:01:01', 'Toko 1'),
(10, '62895610411991', '2024-10-27 07:01:29', '2024-10-27 07:01:29', 'Toko 2'),
(11, '628764273424', '2024-10-28 07:49:41', '2024-10-28 07:49:41', 'Toko 3'),
(12, '628878729478', '2025-02-24 23:52:53', '2025-02-24 23:52:53', 'Toko 4'),
(13, '628389749833', '2025-02-25 00:22:06', '2025-02-25 00:22:12', 'toko 5'),
(14, '628739874934', '2025-02-25 00:22:23', '2025-02-25 00:22:23', 'toko tangerang'),
(15, '628937849793', '2025-02-25 00:22:32', '2025-02-25 00:22:32', 'toko depok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotlines`
--
ALTER TABLE `hotlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whatsapps`
--
ALTER TABLE `whatsapps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotlines`
--
ALTER TABLE `hotlines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `whatsapps`
--
ALTER TABLE `whatsapps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
