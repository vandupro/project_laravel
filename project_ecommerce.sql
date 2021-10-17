-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 02:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Dr. Anabelle Quigley', 'quis-beatae-distinctio-molestias-ipsam-voluptatibus-quo-eius', 'phan-tich-thi-truong-la-gi.png', '2021-07-03 00:29:08', '2021-07-03 04:28:40'),
(9, 'Prof. Ernesto Reilly', 'magnam-error-iure-quae-quidem', 'C:\\Users\\Admin\\AppData\\Local\\Temp\\6ae2701e1758f1fee45c5b36facc3216.png', '2021-07-03 00:29:08', '2021-07-03 00:29:08'),
(10, 'Shaun Brekke IV', 'non-magni-sed-quo-nesciunt-molestiae-recusandae-illo-reprehenderit', 'C:\\Users\\Admin\\AppData\\Local\\Temp\\2517cc6b93e0a4ccf8bfeed78fd86e2b.png', '2021-07-03 00:29:08', '2021-07-03 00:29:08'),
(11, 'Kenna Hessel IV', 'beatae-sed-fuga-dolorem-quia-eveniet', 'C:\\Users\\Admin\\AppData\\Local\\Temp\\16a33d0f46299da4299da22583baafde.png', '2021-07-03 00:29:08', '2021-07-03 00:29:08'),
(12, 'Shana Harris', 'et-ipsam-est-quibusdam-accusamus-sit-necessitatibus-vel', 'C:\\Users\\Admin\\AppData\\Local\\Temp\\1d0ff24363c8959a758a186397b9203b.png', '2021-07-03 00:29:08', '2021-07-03 00:29:08'),
(13, 'Dr. Granville Corwin', 'accusamus-provident-pariatur-alias-vel-est-sed', 'C:\\Users\\Admin\\AppData\\Local\\Temp\\d3c029abbffdebcdf344e913c01459ba.png', '2021-07-03 00:29:08', '2021-07-03 00:29:08'),
(14, 'Lizeth Gleichner', 'libero-temporibus-deleniti-vel-dicta-voluptatem', 'C:\\Users\\Admin\\AppData\\Local\\Temp\\a0c0e2c7535328864c7864d2b46c38c3.png', '2021-07-03 00:29:08', '2021-07-03 00:29:08'),
(15, 'Dr. Jaycee Osinski', 'reprehenderit-eaque-ut-dolore-provident-quia', 'C:\\Users\\Admin\\AppData\\Local\\Temp\\0fb144ac156449298d7f6e518619d4ea.png', '2021-07-03 00:29:08', '2021-07-03 00:29:08'),
(16, 'Apple', 'apple', 'sm_5ad85f1ba776d.jpg', '2021-07-03 02:07:10', '2021-07-03 04:27:50'),
(19, 'Apple123', 'apple123', 'chậu tắm.jpg', '2021-07-03 04:06:51', '2021-07-03 04:28:14'),
(20, 'adfaag', 'teqtet', 'phan-tich-doi-thu-canh-tranh-trong-moi-truong-nganh.jpg', '2021-07-11 20:37:06', '2021-07-11 20:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Alberta Kling', 'mollitia-aut-quis-id-voluptates', NULL, NULL),
(2, 'Dr. Jaclyn Von DDS', 'eius-libero-qui-molestiae-dolor-et-qui', NULL, NULL),
(3, 'Benjamin Bernhard', 'quia-accusantium-officiis-dicta-ipsum', NULL, NULL),
(4, 'Mr. Stephon Walter II', 'molestiae-provident-vero-aliquid-consequuntur-minus-dolore', NULL, NULL),
(5, 'Laverna Funk', 'qui-delectus-a-consectetur-consequuntur-quas-ex', NULL, NULL),
(6, 'Emile Toy', 'nisi-ratione-esse-sed-totam-nulla-est-ipsum-aut', NULL, NULL),
(7, 'Prof. Brandt Sawayn', 'mollitia-aut-quis-odio-harum', NULL, NULL),
(8, 'Ms. Lou Dickinson II', 'consequuntur-provident-corrupti-officia-velit', NULL, NULL),
(9, 'Abigail Kassulke', 'reiciendis-repudiandae-cum-maxime-eos-optio', NULL, NULL),
(10, 'Kali Botsford Sr.', 'aspernatur-ea-quod-culpa-assumenda-quas-temporibus', NULL, NULL),
(11, 'picture', 'dafda', '2021-06-29 20:05:26', '2021-06-29 20:05:26'),
(12, 'xxx', 'xxx', '2021-06-29 20:23:08', '2021-06-29 20:23:08'),
(13, 'abc', 'abc', '2021-06-29 20:24:13', '2021-06-29 20:24:13'),
(14, '123', '123', '2021-06-29 20:27:15', '2021-06-29 20:27:15'),
(15, 't', 't', '2021-06-29 20:43:42', '2021-06-29 20:43:42'),
(16, 'gsa', 'yt', '2021-06-29 20:48:11', '2021-06-29 20:48:11'),
(34, 'Bethany Dietrich', 'voluptas-deleniti-nostrum-voluptates-aut', NULL, NULL),
(35, 'Prof. Emmet Wisozk II', 'aliquid-sit-qui-illum-qui-non', NULL, NULL),
(36, 'Mr. Crawford Ward II', 'illum-culpa-fuga-non-nulla-esse', NULL, NULL),
(37, 'Lauriane Ruecker', 'aut-est-dicta-voluptatibus-libero-nostrum-officiis', NULL, NULL),
(38, 'Dr. Darrick Steuber', 'dicta-ad-consequuntur-ratione-deleniti', NULL, NULL),
(39, 'Prof. Lane Yost', 'voluptate-deleniti-et-voluptatem-dolorum', NULL, NULL),
(40, 'Jake Kilback', 'ut-delectus-at-est-eaque', NULL, NULL),
(41, 'Lindsey Parisian', 'enim-blanditiis-est-eos-qui-et-praesentium-maxime', NULL, NULL),
(42, 'Wilfredo Murray', 'ut-vitae-eius-nemo-veniam-et', NULL, NULL),
(43, 'Dr. Milan Gottlieb', 'sunt-ad-voluptatem-et-itaque-officia-pariatur-aut', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories_products`
--

CREATE TABLE `categories_products` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_products`
--

INSERT INTO `categories_products` (`cate_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 148, NULL, NULL),
(2, 23, NULL, NULL),
(2, 25, NULL, NULL),
(6, 23, NULL, NULL),
(6, 25, NULL, NULL),
(6, 27, NULL, NULL),
(6, 45, NULL, NULL),
(6, 46, NULL, NULL),
(6, 47, NULL, NULL),
(10, 23, NULL, NULL),
(10, 25, NULL, NULL),
(10, 27, NULL, NULL),
(10, 148, NULL, NULL),
(35, 25, NULL, NULL),
(35, 27, NULL, NULL),
(35, 148, NULL, NULL),
(39, 25, NULL, NULL),
(43, 25, NULL, NULL),
(43, 27, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 95, '8f7d42e45e9ac621d0b1289cb1fdc3fa.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(2, 52, '7e5f18aa63aef2e638c21bade2866f2c.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(3, 25, 'c7e486712752c66ed0e5678c6155eb82.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(4, 104, '3e49c9ed1909cfb8448467f4f6b30f9f.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(5, 97, '384f16db29bccef5d0e8ea8c993eff8a.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(6, 66, '835d4d6dbb5059c223b2b1e6c90be170.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(7, 48, '819aadc1339cded2c8ad84cd85bf6a1a.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(8, 41, '232856dcacada5c47121ac85d75c97b7.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(9, 141, '019e2aa5fc5c02390888e8aff743e40e.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(10, 126, 'e2065459d4842e1fbe4d9c6a1ca4dd78.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(11, 118, '115adc589ee9f4b1caf6300f538a8eab.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(12, 44, 'bd088de7e9751ad3f1484cc10db6f7ae.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(13, 129, '6f350d12de26bee6b6b2f4b4e8841f71.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(14, 48, '7bf481c1c82207f8e06a28d3ca54f32c.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(15, 142, 'b08833c569a638cd4d47adf8c1e3fce7.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(16, 138, '778c31ae697722fd36544218be6cf7d1.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(17, 123, '43ec30bfd5d6a0c44054002323ef5754.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(18, 139, 'acea5d82d9025c9f0662c6dba6446618.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(19, 88, 'eb0abeea97bd80681971b0bf7b676cfd.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(20, 27, '381941251aa85e0a323021c9251094ce.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(21, 121, '9279d405b3747757223af7d8dc239e8f.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(22, 139, 'dae87a736c223cf5d6eca1aef0523947.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(23, 67, '4197bc28edccd52a1426557cc09c8340.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(24, 74, '37d12ad37f3477fc2db0819663dc07ed.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(25, 98, '9a8d34e686edcf8e8fd2cdaecc6d4a80.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(26, 112, '2b39170cfb279b5e60c423362d61dee8.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(27, 61, '9cb94c01ce595efe0d5ff7171487f00f.png', '2021-07-19 07:59:42', '2021-07-19 07:59:42'),
(28, 138, '65b40308c6b94a19c343fc7a1f788194.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(29, 85, '49bd9b2a2707876010ae1bf372d70d5a.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(30, 45, '5d1aead35592230a229411c22ed2ce6e.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(31, 75, 'de7d038349dac023f566c57ad963e276.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(32, 35, '8ef45b4becd72f3dcce7d58819f877a4.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(33, 103, 'a4553b4efec91cd4369583bfa9754468.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(34, 48, '84b0fff6259de4121e11155df7193f09.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(35, 45, 'cfa7e0872279fef4b99026740e0e0145.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(36, 70, '4fa02a77c1f6eb68bafe04551787307a.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(37, 58, 'b25d02f9c68f4496b5d469a1745c5554.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(38, 49, '6abddee98197a3dd281fd1929279291c.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(39, 117, 'd126e474959ab3b25b701fb4947521bf.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(40, 55, 'c192f14a8617a04fd7f656166bffc549.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(41, 130, '2e4cc5a02e038dddf166978560f0cdd2.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(42, 41, '82719dfc5b8e23b9807a302af57b9d16.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(43, 109, 'd67f8629334efe00a85f49cc7ca05a8c.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(44, 42, 'd8104be20f7b3e2c6ae0133a47fbc6d9.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(45, 60, '12cc18467639592bfeb0972c69ba730f.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(46, 84, '97f728f3b0661e1bb54bbc285626e70c.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(47, 51, 'bb037cf4da96fb0ffb00bac8cb6e216e.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(48, 84, '703a440fcdacc5133a7c7fdf946a0b56.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(49, 124, '6f592efa7667d0faad773286a3c19f11.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43'),
(50, 109, 'e6c1b9a1370eb4706fb31fa0c0e5a8e1.png', '2021-07-19 07:59:43', '2021-07-19 07:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `image__sliders`
--

CREATE TABLE `image__sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_06_27_075716_create_categories_table', 1),
(2, '2021_06_27_082339_create_tags_table', 2),
(3, '2021_06_27_082204_create_branches_table', 3),
(4, '2021_06_27_080036_create_products_table', 4),
(5, '2021_06_27_084718_create_categories_products', 5),
(6, '2021_06_27_085018_create_tags_products', 6),
(7, '2021_06_27_081908_create_images_table', 7),
(8, '2014_10_12_000000_create_users_table', 8),
(9, '2014_10_12_100000_create_password_resets_table', 8),
(10, '2019_08_19_000000_create_failed_jobs_table', 8),
(11, '2021_06_27_091759_create_sliders_table', 8),
(12, '2021_06_27_092104_create_image__sliders_table', 8),
(13, '2021_06_27_092441_add_update_slider', 9),
(14, '2021_06_27_093325_create_orders_table', 10),
(15, '2021_06_27_094209_create_orders_details_table', 10),
(16, '2021_06_27_095855_create_users_table', 11),
(17, '2021_06_27_095938_create_roles_table', 12),
(18, '2021_06_27_100228_create_roles_users_table', 13),
(19, '2021_06_27_100422_create_permissions_table', 14),
(20, '2021_06_27_100742_create_permissions_roles_table', 15),
(21, '2021_07_12_012408_create_table_add_column_discount', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `sum_money` double NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_to_ship` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_fee` double NOT NULL,
  `vat` double NOT NULL,
  `money` double NOT NULL,
  `discount` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `reason_cancer_order` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_unit` double NOT NULL,
  `discount_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `desc`, `parent_id`, `key_code`, `created_at`, `updated_at`) VALUES
(1, 'Category', 'fakhakdhka', 0, '', '2021-07-12 10:33:35', '2021-07-12 10:33:35'),
(6, 'list', 'list', 1, 'Category_list', '2021-07-12 10:33:53', '2021-07-12 10:33:53'),
(7, 'edit', 'edit', 1, 'Category_edit', '2021-07-12 10:33:53', '2021-07-12 10:33:53'),
(8, 'delete', 'delete', 1, 'Category_delete', '2021-07-12 10:33:53', '2021-07-12 10:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_roles`
--

CREATE TABLE `permissions_roles` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions_roles`
--

INSERT INTO `permissions_roles` (`permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(7, 1, NULL, NULL),
(8, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` char(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `competitive_price` double NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `branch_id`, `name`, `slug`, `short_desc`, `desc`, `price`, `competitive_price`, `image`, `created_at`, `updated_at`, `discount`) VALUES
(23, 20, 'fdafa', 'fadfa', 'fafafaf', '<p>fdadfa</p>', 200000, 344221, 'phan-tich-doi-thu-canh-tranh-trong-moi-truong-nganh.jpg', '2021-07-11 20:20:06', '2021-07-12 09:31:30', 1000000),
(25, 20, 'fadfafdaffadfa', 'fdadfa', 'dfadafa', '<p>fdfafa</p>', 8000000, 2345566, 'phan-tich-thi-truong-la-gi.png', '2021-07-11 20:30:33', '2021-07-12 09:12:52', 123),
(27, 20, 'dkhkadh vandu', 'dfkhakdha', 'dkhfakdhka', '', 100000, 341131, 'download.png', '2021-07-11 20:40:50', '2021-07-12 08:42:12', 2441),
(28, 9, 'Mr. Patrick Eichmann DVM', 'commodi-aut-quia-blanditiis-velit-exercitationem-ut-possimus', 'Adipisci quas aut voluptatum laudantium natus rerum. Asperiores consequuntur velit eum necessitatibus est voluptas. Quia a aut omnis non illum consequatur voluptas.', 'Ducimus necessitatibus non at corrupti. Officiis omnis dignissimos delectus odit officia culpa. Eaque et sed animi inventore aut.', 23005004, 60151504, 'no image', '2021-07-14 17:50:31', '2021-07-14 17:50:31', 71),
(29, 13, 'Alfonzo Hickle', 'expedita-ducimus-laborum-sapiente-officiis-laborum', 'Labore facere et rerum et. Aspernatur officia non quia nihil. Quae mollitia ea eum fugiat sed. Aut quidem aut exercitationem laboriosam. Similique occaecati voluptates qui dolores.', 'Fugit voluptatibus et totam sed. Quos vitae omnis ut in at amet. Dolorem repellendus mollitia nihil itaque id.', 51200873, 3600675, 'no image', '2021-07-14 17:50:31', '2021-07-14 17:50:31', 18),
(30, 15, 'Roel Schiller', 'at-et-fugit-aspernatur', 'Incidunt iste voluptas illum ipsam eos vel. Dolore ut ea sunt sed tempore voluptatem praesentium. Maiores et quia quis ut rem placeat ut reiciendis.', 'Enim labore fugiat dolorum omnis. Quis eum provident et quibusdam quia atque. A ut suscipit veritatis recusandae. Aut cumque eius vitae perferendis fugit quo.', 76590162, 59125042, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 83),
(31, 15, 'Dr. Mallie Borer', 'nihil-molestias-non-velit-quo-sint-esse-qui-aut', 'Quis nulla provident nihil dolor. Aut nobis qui in est qui quasi. Possimus accusamus voluptatem qui consectetur. Itaque et voluptatum pariatur dolore ea dignissimos enim.', 'Qui assumenda vero maxime est quis aspernatur debitis voluptatum. Maxime accusamus assumenda non.', 21640459, 11564573, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 45),
(32, 16, 'Jackeline Schmeler', 'voluptates-quisquam-laborum-molestiae', 'Est est repellendus reiciendis saepe nostrum adipisci porro. Error nobis et qui eos nobis. Non sint dolorem quibusdam occaecati quia. Quia consectetur labore error aliquam.', 'Voluptates doloribus dolores officia molestiae libero. Illum provident fugiat rerum omnis veritatis. Est quia velit qui est.', 51925254, 80991649, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 50),
(33, 16, 'Linnea Williamson', 'corporis-vero-nobis-pariatur-optio-placeat', 'Qui et placeat qui esse velit. Molestiae illum sit non dicta explicabo. Nihil saepe exercitationem cum inventore consequatur est aperiam facere.', 'Voluptate dolorem ut dignissimos. Voluptatem laborum assumenda reiciendis recusandae fugit quo optio. Ea id suscipit iste odio tempora.', 77829978, 60664464, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 24),
(34, 16, 'Missouri Yundt', 'corporis-praesentium-rerum-quae-est-ea-reprehenderit-accusantium', 'Et provident corrupti veniam. Laboriosam tenetur quia ut earum laudantium possimus. Et quae eligendi amet sed impedit animi qui. Sed placeat magnam dolores et ea debitis.', 'Non dolores est ea libero est error. Dolorum dolor est tempore rerum enim doloribus nihil. Dignissimos fugiat eos sit sit. Sunt eveniet qui rerum pariatur rerum ducimus minus veritatis.', 49215778, 60414055, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 74),
(35, 14, 'Wendy Crist DVM', 'qui-ipsa-nulla-deserunt-id-deserunt', 'Est placeat aut aut sed. Voluptatem magni velit est sit ut. Numquam eaque quo soluta magni inventore deleniti. Praesentium dolor dolores in est.', 'Aliquid exercitationem voluptatem illum quaerat est consequatur suscipit. Dolorum nisi excepturi qui labore ipsam. Possimus excepturi aut quaerat beatae at quaerat velit. Sunt eos eius aut optio repellendus dignissimos.', 85679604, 88906593, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 68),
(36, 14, 'Lorenzo Davis', 'ut-dolore-explicabo-pariatur-aut-recusandae-perferendis-dolores', 'Incidunt voluptas labore rem quia ipsam. Explicabo eum ducimus aut eaque sequi ea. Aliquid mollitia sunt delectus omnis at.', 'Repudiandae dolore doloribus aliquam voluptatibus. Expedita recusandae fuga beatae in est. Quia voluptatem officia sit. Ut est voluptas sapiente alias illum consequuntur odio.', 61954831, 54746825, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 28),
(37, 14, 'Rahsaan Legros', 'adipisci-excepturi-id-quae-ipsum-ea', 'Et consequuntur fugiat dolor. Non accusantium architecto fugit nihil numquam. Blanditiis nobis cum laudantium.', 'Error corporis ea qui voluptatem. Dolore quia praesentium saepe voluptatum commodi aut. Ut ab non facere qui accusamus id velit officia. Quia repellendus non sed blanditiis.', 91147473, 59520489, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 86),
(38, 13, 'Edna Yost III', 'laboriosam-ut-ullam-voluptatem-fugit-repellendus', 'Quos et nesciunt quia doloribus quisquam qui. Animi ipsum eaque qui quia a nemo deserunt. Voluptatibus ea qui corporis harum vitae. Vero ea quaerat ut quia provident.', 'Sint perspiciatis harum aut voluptas. Porro aut nisi dolor neque id. Accusamus qui voluptate voluptatum optio aspernatur et architecto. Nostrum qui qui qui soluta.', 97546299, 73276743, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 100),
(39, 9, 'Jessy Bartoletti I', 'eveniet-ut-aliquid-ipsum-est-quaerat-debitis-error', 'Rerum et totam qui ab. Enim cupiditate exercitationem nobis deleniti repudiandae aut quas. Itaque et voluptas est omnis nemo rerum quam.', 'Est quos quos repudiandae rem tempore est non. Sequi hic placeat ullam ut suscipit quia.', 7684847, 85686703, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 31),
(40, 15, 'Dr. Austen Kuvalis I', 'odit-nesciunt-vitae-quam-dolore-fugiat-et-et', 'Eius odio possimus ut aut. Sequi ullam voluptate veniam illo reprehenderit. Odit nisi iure officiis nemo sunt non perferendis libero. Assumenda ducimus reprehenderit dicta aut possimus.', 'In architecto exercitationem provident soluta amet qui. Quaerat dolor aspernatur voluptas quam fuga nemo dolor qui.', 72595745, 29899255, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 1),
(41, 10, 'Mr. Arnaldo Stoltenberg', 'aut-repellendus-aperiam-magni-aut-in-officia-veritatis', 'Molestiae explicabo praesentium molestiae sit. Et sapiente maiores repellendus et consequatur minus maxime. Autem adipisci alias rerum.', 'Deserunt modi quibusdam eos assumenda. Nostrum rerum odit veniam qui delectus aperiam. Quaerat magni unde est atque pariatur. Expedita et aut odio aliquam distinctio ut.', 65396749, 18567107, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 11),
(42, 13, 'Heather Waters', 'esse-sit-in-explicabo', 'Omnis modi ratione vel dolorem aut. Rem magni laudantium sit rerum nihil. Aperiam aliquid debitis corporis deserunt exercitationem est qui velit. Sed saepe ullam odio eius.', 'Ratione rem nam itaque vitae eaque. Autem sit consequatur sunt assumenda ut deleniti dicta. Incidunt velit doloribus sunt voluptas. Ipsum sapiente nesciunt voluptate eum minima quae.', 11460800, 53573848, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 91),
(43, 14, 'Bart Hahn', 'itaque-quod-vero-nulla-alias-illo-et-consequatur', 'Sunt quis dolorem eligendi voluptas nisi. Et nostrum labore tempora. Sequi aspernatur praesentium laborum qui similique.', 'Sequi est quia dolor vel sed consequatur quis. Suscipit molestias dolorem voluptas omnis.', 52894064, 90776619, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 22),
(44, 14, 'Margarette Runolfsdottir', 'sit-provident-esse-quia-optio-repellat', 'Nihil fuga doloremque esse consequatur necessitatibus aut. Ipsum nihil quas fugiat ratione. Odio ut omnis magni et dolore sunt ullam. Est sit excepturi qui id totam in.', 'Illum odio odit eum ad cupiditate rerum. Voluptate a at perspiciatis nihil architecto.', 3631380, 43850125, 'no image', '2021-07-14 17:50:32', '2021-07-14 17:50:32', 45),
(45, 20, 'Prof. Horacio Rice IV', 'nulla-aperiam-quis-tempore-explicabo', 'Consectetur cupiditate quidem non. Aut porro quisquam sed porro a nemo. Quis ipsam quia eos expedita.', 'Sunt enim sit voluptate voluptatem ea magnam culpa. Et maiores voluptas ut unde optio. Saepe et nam sed tempore rerum doloremque suscipit. Unde omnis officia nam quas nulla quasi corporis ea.', 94494288, 59449927, 'cao-toc-11-11-20202-1605099365914.jpg', '2021-07-14 17:50:32', '2021-07-14 18:48:20', 79),
(46, 20, 'Emerson Kilback', 'rerum-molestiae-qui-optio-aliquam-ut-est-maiores', 'Praesentium eligendi perspiciatis at aut. Quod eum blanditiis eveniet sit. Quo quo quia deserunt ex voluptatum et.', 'Nemo quaerat aut necessitatibus itaque numquam ea voluptatem esse. Et voluptas doloremque quibusdam aut mollitia velit exercitationem vel. Et corporis eum voluptatem quidem necessitatibus vitae et. Aut non ut veniam aspernatur.', 59127050, 32266648, '5.png', '2021-07-14 17:50:32', '2021-07-14 18:28:44', 41),
(47, 20, 'Libbie Runolfsdottir', 'enim-est-eius-laudantium-laboriosam-autem-aut-quo', 'Aspernatur possimus quia iusto voluptatem nemo sunt. Eum consectetur ipsam omnis vel et est.', 'Recusandae rerum culpa sed porro tenetur. Repellat ea totam sit porro consequatur fuga.', 94358784, 27367274, '6.png', '2021-07-14 17:50:32', '2021-07-14 18:27:17', 99),
(48, 10, 'Mrs. Emmy Koch Jr.', 'rerum-quis-nisi-quibusdam-natus-corporis-delectus', 'Voluptas in accusamus odio inventore labore ut quae minus. Tenetur neque atque rem molestiae et. Aut qui enim sunt et facilis.', 'Optio fuga recusandae beatae ad sapiente omnis. Sed repellendus laboriosam alias rem quibusdam repellendus. Voluptas veniam voluptates ad quia.', 31161584, 85884824, '9856f418ed6dd7973dfa1ace6c46d73b.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 18),
(49, 11, 'Coby Barton', 'est-ipsam-impedit-atque', 'Repellat enim eos corrupti praesentium ex dolor. Eum at inventore commodi excepturi. Nostrum eaque corrupti nihil quo dolorem est incidunt.', 'Eligendi consectetur tenetur consequatur. Repudiandae deserunt minima iure accusantium et. Et sed deleniti tenetur id odio sint earum.', 97364752, 35988653, '8ce62cab6134cfda60a08cfe3f3c4bf7.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 10),
(50, 9, 'Mrs. Minnie Daniel MD', 'sed-quia-beatae-ut', 'Officia quasi et omnis dignissimos. Provident deserunt aliquam ut excepturi molestiae voluptas. Velit id omnis odio enim neque aut vitae sed.', 'Voluptatibus dolorem consequuntur eaque totam tempora dolores. Libero necessitatibus nulla odio impedit aspernatur numquam omnis. Eos consequuntur quasi voluptatem ut corrupti non. Non odit ut harum quos.', 94956145, 8823558, '9ffa541270e4306a99ea638aef4392df.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 3),
(51, 20, 'Amiya Kunze', 'repellat-aut-vel-qui-nemo-voluptate', 'Nam quibusdam repellendus eligendi enim sunt sint. Vel aperiam ex sunt dolores molestias. Quaerat velit sit suscipit amet enim placeat odio voluptas. Et a deserunt enim quibusdam.', 'Voluptatem aut sequi incidunt sunt beatae repudiandae. Tenetur eos ea dolores laudantium. Explicabo illum nulla voluptatibus illum id. Ipsum quidem quibusdam modi magni.', 42225682, 12293444, '18e5263641cf80cc2399d834b9a4b0d9.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 8),
(52, 20, 'Joesph Blick', 'et-magnam-qui-voluptatibus-qui-tempora', 'Reprehenderit error dignissimos aliquam in. Qui rem non eveniet atque pariatur. Quos itaque et dolores libero. Nihil reiciendis facere et adipisci commodi vel hic.', 'Qui sunt ut sequi incidunt optio aliquid vel. Quaerat libero occaecati nihil dignissimos nobis odit assumenda. Reprehenderit autem autem rerum nemo modi consectetur.', 24657603, 20949183, 'a5045ae395c5cd653901c2218da87991.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 76),
(53, 14, 'Haleigh Sipes', 'sequi-eos-qui-a-possimus-similique-qui-amet', 'Ullam temporibus consequatur dolore quia necessitatibus. Sed iure hic explicabo voluptas hic ut facilis deleniti.', 'Repudiandae laboriosam dicta occaecati officiis. Cum maxime non quas qui. Aut nostrum facere maxime odio. Quia dignissimos et rerum sit.', 82360508, 93685685, 'a4eaac6affedcb520a04b49c9a4db7b8.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 76),
(54, 11, 'Eliza Flatley', 'sed-est-quibusdam-est-distinctio-repellendus-quia-id-rem', 'Harum impedit esse aut nemo ad repellat rerum. Nostrum aliquid est similique maxime neque consequatur error magni.', 'Omnis porro tempora voluptate ut. Repellendus similique ut eos molestiae repellat sint. Rerum aut eos tempore vel. Molestias voluptate culpa voluptatibus. Officiis cumque sint quis error nostrum sed.', 30596800, 13896706, 'bd5963f81a316ca45f553c51967288fd.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 12),
(55, 14, 'Dr. Federico Mohr III', 'quibusdam-commodi-voluptates-natus-magnam', 'Impedit sed quae perspiciatis est laboriosam in distinctio. Sapiente nobis alias vero excepturi. Cumque ut eos quis dolorem pariatur libero. Quidem cupiditate omnis labore.', 'Corrupti nostrum esse tenetur minima non vel. Natus ut similique tempore aut impedit. Sit odit maxime sed reiciendis. Ex quisquam voluptatem ex corporis ea.', 56345942, 48941388, '8151dbdf7f97f6917dcb6ca53be177ef.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 74),
(56, 19, 'Maci Konopelski', 'modi-et-laborum-ut-id-officiis-ipsa', 'Atque aspernatur iusto sed alias nisi. Dicta voluptas suscipit et est sed. Ut pariatur distinctio adipisci eum. Dolorem odit est ut saepe voluptatem similique eum.', 'Asperiores sequi sunt dolores est recusandae aut. Ea molestiae voluptatibus voluptates tempora libero qui.', 1150011, 5398729, '2f26e7502f2558f2c68d71edad4409ea.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 48),
(57, 12, 'Margaret Johnson', 'quia-qui-excepturi-cupiditate-reiciendis', 'Ut earum omnis modi ex inventore a. Quis expedita est earum pariatur. Similique consequatur accusamus modi nihil modi. Est adipisci quia tempora cupiditate corporis qui eius.', 'Nesciunt odio voluptatem fugiat impedit sequi saepe. Ea culpa officia aut. Asperiores possimus iusto magni et aut. Vel neque ut consequatur magnam.', 55770097, 87325075, '41d54e1636331f4abadeec9a602a19f3.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 36),
(58, 20, 'Dock Bode', 'ab-aut-id-atque-saepe', 'Molestiae labore excepturi deserunt. Accusamus fugiat sint esse incidunt soluta minus corporis. Voluptates accusantium aut ipsa quia consequatur.', 'Rem ut natus iste facilis. Reiciendis cupiditate esse voluptas iste debitis laborum. Nobis sunt rerum voluptatem id.', 95205309, 80571913, '2588415ec31d18749964fe2c188dff7b.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 79),
(59, 16, 'Priscilla Orn', 'adipisci-cum-error-culpa-repellat-aliquam', 'Optio maiores quo et ipsa reiciendis incidunt. Et et iusto ea culpa consequatur facere cupiditate eum. Porro unde repudiandae possimus ad odio et fugiat illum.', 'Soluta quos quo cumque corporis. Sint eum qui aut est aperiam voluptatem. Quas fugit molestiae nam enim eius ut facere qui.', 74933181, 69416419, '961e94a627954483000a8588dff14fb3.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 31),
(60, 12, 'Johnson O\'Kon', 'qui-recusandae-unde-voluptatem-consequuntur-sunt-voluptatem', 'Aut inventore sequi at et est eaque. Ducimus cumque sint aut velit eum nisi et dolorum. Ut quo fugiat iure dolorem corrupti consequatur dolorem ad.', 'Hic rem quod quis et laboriosam illum rerum. Sunt at dolor id dolorem occaecati ut magnam. Nobis enim enim reiciendis unde corrupti quam consequatur et. Sit quia itaque nihil autem aut ea et velit. Modi nulla minima error ipsam commodi et officiis.', 61392532, 40010638, '2a961b0ad67581809fd4ddddf949c173.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 72),
(61, 10, 'Diamond Padberg DVM', 'est-perspiciatis-quasi-tenetur-saepe-iure-hic-esse', 'Est et doloremque voluptas magni. Consequatur aut voluptatem dolores repellendus. Aut itaque illum excepturi qui fugit laudantium saepe.', 'Quis culpa culpa nostrum dignissimos. Autem illum id accusantium. Illum autem quo sint rem.', 58996937, 69628793, '70ea398e0b6d82b29e5ff59ceb309614.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 58),
(62, 10, 'Albert Balistreri', 'dicta-et-quia-totam-suscipit-quibusdam', 'Nesciunt commodi neque unde. Quibusdam a consequatur repellendus. Sed minima dicta distinctio et magnam. Est quia eum eligendi quasi ut.', 'Dolores voluptatem impedit voluptatem quibusdam occaecati vel. Ipsa vel saepe aut ut a expedita dolorum. Quibusdam soluta quasi vero earum. Quaerat laborum sapiente modi architecto nam sed cum.', 70127462, 55130781, 'b6b6730e9f8ba5fc478a5be5b3b62504.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 91),
(63, 10, 'Renee Hirthe', 'iste-eos-consequatur-recusandae-deleniti-quas-ut', 'Minima molestiae ea omnis dignissimos tempora. Pariatur magnam in aspernatur ut qui pariatur. Quisquam eos reiciendis iste eum qui laudantium. Ipsa et quidem ut quisquam.', 'Voluptatem corrupti eos voluptatem dicta explicabo ea illum. Iste asperiores autem nulla ut sed voluptatem sit. Voluptas qui ullam voluptates fuga sit omnis et.', 19837258, 52151039, 'a378fb01c114d7a012d2f64fa0a53a54.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 50),
(64, 13, 'Althea Deckow', 'ut-dolore-ut-id', 'Non enim ratione dolor qui. Rerum et ipsam sunt. Dolores vel eligendi enim accusamus. Doloremque ipsa et cum accusantium perferendis.', 'Eveniet nobis provident sapiente id ab quia. Dolorum qui voluptatem officia ipsum sit et. Consequatur architecto dolore cupiditate reprehenderit sint exercitationem aspernatur. Inventore quis laudantium optio.', 16935504, 48105772, '6ca74457a47c7f0c0f39b7faa1e1c4df.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 39),
(65, 13, 'Prof. Chase Hill I', 'aut-repudiandae-sint-dicta', 'Quibusdam consectetur autem quos harum optio. Odio temporibus commodi magnam sed.', 'Qui veritatis sit repellat in sint sunt. Et sapiente quia ea. Corporis nihil minima maiores porro. Consequatur aut neque ut alias rem et natus beatae.', 65346636, 23362970, '7152dd3cff44f87f294004603f480fd1.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 39),
(66, 15, 'Crystel Padberg', 'facere-impedit-ut-repudiandae-aut-voluptas-eligendi', 'Odit similique aut dolores necessitatibus aut. Illum officiis temporibus vero dolore.', 'Officia ad explicabo ut quam est nostrum. Sed similique et similique ipsum.', 99382398, 1387421, '080e2268bd1767d6b8ba0e6a7daaed09.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 87),
(67, 16, 'Audra Hand', 'voluptas-voluptas-ab-labore-fugiat-corporis-voluptates-quia', 'Necessitatibus quos rerum illo tempora animi aut consequatur. Delectus qui minima ipsum veniam veritatis. Tenetur cum ipsam sequi consequuntur.', 'Amet dolorum est quidem sint ut molestiae ut. Quaerat sint quia hic voluptatem nostrum dolores ad. Autem vitae non et libero. Sit reiciendis ut quia aut qui sit cupiditate.', 46320262, 9938891, 'ff90cf3eb23138b8796f82ff9100c7f4.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 40),
(68, 13, 'Mrs. Roxane Windler', 'perspiciatis-quae-enim-fugit-ex-esse-error-quasi', 'Ut sapiente voluptatum at laudantium ut. At vel velit voluptas nulla magni sit vero.', 'Explicabo repellat facilis quis aut esse et rerum. Iure molestiae similique doloremque laborum officia ab. Itaque rerum iusto consequatur nisi sed qui provident. Voluptatem quas ea corrupti quod est dolores totam. Rerum sed et soluta ipsa.', 23862064, 7417412, '097d8c69b3a2b70be5bf0e04201dc2f0.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 0),
(69, 8, 'Kylie Legros', 'accusamus-quisquam-iure-occaecati-ut-a-sit-non-eos', 'Et pariatur quia sed mollitia odit. Necessitatibus ratione qui et voluptatem veritatis itaque repellendus odio.', 'Rem quia et adipisci corrupti. Voluptas ratione numquam possimus sed voluptatem quod aut. Adipisci beatae quas quia exercitationem laudantium aut ex. Quo non repellat possimus dolores amet architecto.', 24843550, 3700825, 'd1c6c370b369ec8743ac1ef9a5f49ff2.png', '2021-07-19 07:43:20', '2021-07-19 07:43:20', 21),
(70, 16, 'Nathaniel Rodriguez', 'culpa-ut-impedit-commodi-voluptas-corporis-ab-qui-aut', 'Non explicabo praesentium deleniti fuga. Quas nulla accusantium laudantium non et minus. Sed aut sapiente nisi et corporis illo.', 'Ut in eaque ut debitis quo. Tenetur laudantium ducimus voluptates quod. Qui repellendus voluptate quia qui quisquam explicabo. Voluptatem maiores sed exercitationem vitae dolorum itaque. Voluptas facere ratione minus cupiditate deserunt debitis ut libero.', 14863458, 60059440, '6e5eaf7176df65248d8a7360ab6f7b1c.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 53),
(71, 15, 'Stefanie Weissnat', 'molestias-molestiae-sint-voluptates-ea-sed-ipsum-nesciunt', 'Velit ea possimus quidem aut non. Iusto et consequatur veniam veritatis voluptates. Qui sequi mollitia aut assumenda enim quaerat voluptatem.', 'Ex vel quo temporibus necessitatibus pariatur eum dignissimos. Recusandae et explicabo itaque vitae dolores consectetur. Voluptate eius minima labore laborum fuga. Non sunt vel non vero.', 26874851, 91318418, '5aed4349469011965a783ac624483afb.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 97),
(72, 20, 'Delphia Cronin', 'inventore-aperiam-veritatis-hic-numquam-odio-iusto', 'Amet explicabo voluptatem rem et facilis quis. Delectus rerum sed aut repudiandae porro eaque qui. Quas non quia voluptate minima amet. Dolores enim eos vero et.', 'Laboriosam deleniti ut eligendi et mollitia eaque voluptas id. Ut quaerat quis necessitatibus. Quisquam delectus quo voluptate autem quos accusantium reiciendis.', 63622703, 79812613, 'c46f0b43c25a14272a61d4e439676abc.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 94),
(73, 11, 'Mona Boyle', 'inventore-provident-quaerat-quia-nulla-aut-sit', 'Vitae ipsum aut qui est in commodi error. Aut delectus qui iste et velit fugiat voluptate. Fugit sit adipisci in. Saepe animi ea qui velit soluta nisi ut.', 'Et delectus ducimus ratione qui. Quo porro quia minima architecto commodi delectus non odio. Corporis facilis porro enim quam.', 97131677, 88603446, 'c6f657207e278da2ef4ac1b2cfc97db4.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 69),
(74, 15, 'Mae Ullrich', 'ut-excepturi-nesciunt-et-et', 'Atque odit blanditiis eligendi. Illo veniam voluptatem sunt qui harum non rerum voluptates.', 'Autem iusto maiores doloremque earum et. In praesentium qui deleniti repudiandae eaque possimus id. Ut aliquam rerum unde consequatur qui. Aut in et asperiores perferendis ex quos autem.', 2052913, 74395781, '34dd409e223b3bdaebb61b1c03dd8fa3.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 34),
(75, 9, 'Rossie Stehr', 'repellat-eaque-odio-mollitia-et-dolores-odit', 'Sed voluptas doloribus consequatur eligendi esse ut qui. Eum quisquam qui quod dicta dolor magni voluptates. Quas non deleniti ad quia. Culpa mollitia placeat illum et.', 'Quia enim voluptatem aut eligendi ipsum. Molestias dolore excepturi libero rerum. Adipisci et et occaecati veniam. Non et quasi quos dolores ratione voluptatibus iste. Possimus animi soluta unde nesciunt voluptate ducimus.', 95033772, 85366039, '6fc8422888384405bf403b39ea42d9c6.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 72),
(76, 13, 'Oceane Jast', 'est-excepturi-enim-soluta-modi-et-autem', 'Eos nobis totam ipsam mollitia non cupiditate. Officiis atque officiis beatae dolor voluptatem. Itaque debitis ut enim distinctio amet qui harum. Velit deserunt eum aspernatur rerum ut.', 'Rem qui placeat ut consequatur perspiciatis enim. Quia velit et asperiores. Aperiam perferendis eum quod ab possimus est quidem.', 34146182, 87209423, '5ae9da345e6fad6ec5b5768d45eb02c6.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 27),
(77, 11, 'Alysha Klein', 'impedit-rem-dicta-et-et-est-facilis-asperiores', 'Et ea possimus perspiciatis occaecati. Quos optio iure minus molestias voluptas totam.', 'Eum est quia qui eligendi molestiae omnis. A magnam qui facilis porro.', 88307906, 29177182, 'e95618cf66bc52de4e8928e504a31932.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 97),
(78, 13, 'Xavier Kreiger', 'suscipit-non-nam-necessitatibus-consequatur-ullam-quos-a', 'Delectus quaerat qui voluptatem id est neque et. Amet autem aperiam rerum eos ipsa eum. Natus est quod est et beatae quas.', 'Cumque cupiditate aut deserunt et. Quo cum aut est.', 13150333, 35724304, '6c98c72a88363cd634126640a84fb7cb.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 60),
(79, 11, 'Prof. Leonor Sipes', 'non-eaque-labore-rerum', 'Commodi quasi eum necessitatibus qui quae rerum voluptas. Magni tempora et corrupti. Quis enim voluptas nam quos magnam. Rerum saepe voluptatum et.', 'Eius qui delectus accusantium quis ipsa est non. Quia odit omnis qui deserunt praesentium incidunt reprehenderit. Omnis rerum fugit id quia possimus. In dignissimos impedit quod quisquam et.', 3874253, 49132829, '6214b7cf1a8270bdc88e86b43fe486d3.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 69),
(80, 19, 'Roman West', 'dolorem-tenetur-aut-et-quia-atque-sit', 'Animi sit voluptatem blanditiis beatae et. Est occaecati numquam eos unde vel voluptas. In adipisci ipsa quis dolorem omnis eligendi.', 'Quis ut deleniti iure aut cupiditate. Possimus placeat et est labore dolore. Dolor ea ab nemo laudantium laudantium voluptatem voluptatem. Rerum quia sint aperiam aut itaque facilis voluptas. Tenetur delectus laborum aut.', 18452946, 12601737, 'ee59fa7550e4c71cbfc73b2165c7dcbc.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 96),
(81, 15, 'Mr. Khalid Gutkowski Jr.', 'neque-voluptatem-aut-autem-nihil', 'Laboriosam expedita sit autem veniam unde commodi. Cumque reprehenderit amet omnis ratione amet.', 'Sequi molestias voluptatem eum rerum. Aut molestiae cumque eos laboriosam non. Sed laboriosam voluptatem eius omnis sint praesentium. Ex minima error non sit.', 67375944, 114319, '61377532903a0b694a31a475f6378428.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 3),
(82, 13, 'Jaren McClure', 'quam-impedit-voluptatibus-molestiae-in-magni-inventore', 'Ipsum id possimus officia velit rerum. Minus adipisci quis laboriosam quo hic neque ullam magni. Magnam dolores nesciunt et placeat aut beatae esse ducimus.', 'Eum eum eaque non ut nam exercitationem id cumque. Voluptatem earum nihil voluptatum doloribus. Laborum earum magni dolore similique aliquam.', 55555594, 33752659, '37cd92c3e359cf8d774e35b920ca60e9.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 49),
(83, 20, 'Spencer Hilpert', 'sapiente-aspernatur-eos-quia-reiciendis', 'Repellat nemo magni debitis nisi velit. Assumenda nihil assumenda qui consequatur officiis qui. Aliquam quo exercitationem fuga sint adipisci quisquam. Nulla tempore saepe recusandae dolores.', 'Ducimus dolore beatae dolores soluta rerum rerum repudiandae. Consequatur quod corrupti veniam veniam quia voluptates nobis. Veritatis temporibus doloremque saepe.', 17337159, 67737933, 'fbb12ed938b1c0ad42204f335aabc2fc.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 87),
(84, 10, 'Adrian Bogisich', 'tenetur-error-repudiandae-molestiae-porro-non-sit-consequatur', 'Ut rerum optio corrupti rerum dolores. In delectus magni cum inventore atque rem soluta. Aut totam maxime minus.', 'Quis natus ad in animi aut. Nemo voluptatem qui voluptatem nulla non. Impedit rerum rerum ducimus perspiciatis corporis odit qui. Totam voluptas in necessitatibus ipsam et recusandae animi.', 53409581, 77467764, '54a4ef6f612f98ea125aeb038cede294.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 92),
(85, 11, 'Mr. Judge Ondricka DVM', 'qui-eum-aperiam-dolore-eum-et-ea', 'Aperiam vel earum ut eos dolore magni. Cumque sed doloribus est. Sapiente consectetur magni facilis dignissimos impedit odio ab adipisci. Non neque non reprehenderit temporibus temporibus a.', 'Sed possimus voluptatem debitis non commodi. Omnis molestiae non vel eaque. Sapiente et deserunt accusamus odit quae voluptatibus vel et.', 15334321, 67300014, '4a0ca726ebcbe6bdfd786a848df4a3dc.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 6),
(86, 15, 'Clemmie Gutkowski', 'consequuntur-et-rem-fuga-tempora', 'Enim dolorem quasi facere aliquid libero enim voluptas earum. Commodi corrupti voluptatem reprehenderit nemo molestiae. Reiciendis et et ex adipisci omnis.', 'Est odit reiciendis rerum earum et exercitationem assumenda temporibus. Et molestiae nesciunt vero veritatis. Odit sint perferendis libero rerum enim praesentium aut. Laborum et amet iusto accusamus eligendi quo nihil.', 92542548, 90525190, '8178020ab0901933e34ac82e0583db71.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 21),
(87, 13, 'Dr. Parker Reichel IV', 'voluptas-aliquam-et-itaque-odio', 'Minima recusandae sint error ut dolor eveniet a qui. Et qui aut delectus voluptatibus animi dolores debitis.', 'Ipsam aliquam accusantium alias animi officiis aut. Voluptates autem expedita voluptatibus earum. Libero dolorem enim omnis et suscipit commodi velit.', 92389535, 12915442, 'eaa66132d87b84968c04d7596145de9e.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 65),
(88, 9, 'Prof. Glen Nicolas DDS', 'cum-delectus-pariatur-blanditiis-commodi', 'Necessitatibus sit ea atque. Est reiciendis eos iusto eos est culpa et. Et voluptas odit est id qui tempore accusantium.', 'Itaque quod ipsa architecto. Dicta ut eos distinctio doloremque porro quas enim. Cumque velit error quis libero totam. Velit veniam autem soluta omnis. Soluta qui assumenda adipisci rerum aspernatur accusamus.', 80307951, 69634320, 'ec49783db0f37566a0078e515a7a42c0.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 67),
(89, 20, 'Ms. Hildegard Kshlerin DDS', 'corrupti-quibusdam-quod-voluptatem-eaque-libero-alias-placeat', 'Consequatur vero amet voluptate. Accusantium commodi qui sed necessitatibus recusandae vel nulla. Placeat earum voluptatum consequuntur. Quia magni odio quo assumenda necessitatibus iste.', 'Quam consequatur est aut nostrum nihil consectetur consequatur a. Repellendus voluptatem accusantium doloremque sit. Dolores tempore aut deleniti.', 20640775, 13297365, 'd5e4247a3cefc6de8c924014a653254d.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 30),
(90, 19, 'Reymundo Wisoky', 'itaque-natus-possimus-tempora-illum-unde', 'Qui qui porro ut dolorem laudantium et natus recusandae. Est maiores rerum repudiandae natus voluptates harum quo. Veritatis perspiciatis sint earum assumenda voluptatum autem voluptates.', 'Qui molestias quia inventore velit illo. Molestiae omnis eveniet vel in. Velit nihil totam minima animi ad nesciunt eaque.', 34093226, 1843924, 'f7493365bdc5814a3d6123417c4fd9f3.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 67),
(91, 14, 'Rosemary Tillman', 'aut-aut-aliquam-saepe-quidem-ea-et', 'Labore ratione ut ad voluptatem eos assumenda molestiae voluptatum. Quibusdam porro dolore ea. Autem sapiente aut molestiae rem nobis suscipit rerum.', 'Aut sint qui nisi nostrum id. Molestiae ut et amet iste. Pariatur quidem corporis non. Sed voluptatem voluptatum qui sunt qui saepe est.', 58517358, 89642460, '72e331587fa76646390dad70ec61a458.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 67),
(92, 19, 'Eusebio Konopelski', 'quas-et-facere-incidunt-est-enim-nulla', 'Alias sunt tempora deleniti perspiciatis in quis magnam. Nam qui qui et quia cumque culpa. Hic odio delectus animi porro ullam temporibus cum.', 'Eum maiores at mollitia nobis a consequatur. Et distinctio et distinctio quibusdam hic expedita. Adipisci molestiae et autem corporis nihil vero. Eos consequatur eos accusamus voluptatibus perferendis nostrum. Et ea minus dolorum aut corporis.', 97015327, 2095274, '44852858b4b0ff68bab2708856074ca8.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 41),
(93, 14, 'Bridgette Aufderhar', 'consequuntur-sint-enim-tenetur-ut-cum-iste', 'Perferendis quo veniam quo. Minus corrupti omnis molestiae necessitatibus. Pariatur totam dicta consequatur laudantium fugiat consectetur.', 'Sed numquam non molestiae sit. Deserunt dicta repellat doloremque saepe. Consequatur rerum exercitationem in ab non.', 2961760, 5437399, '0e74713567177170f0fe3e42d0ab3910.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 68),
(94, 20, 'Casey Haley II', 'maiores-et-quos-omnis-dolores', 'Quis quam pariatur et quia officiis cupiditate magni. Aut magnam quis et reiciendis quae.', 'Officiis qui quis doloribus minus quos. Dolorem vitae optio harum doloribus. Et deleniti sunt debitis inventore et et. Sunt corrupti eligendi necessitatibus eaque voluptates fugiat enim.', 79126651, 25796509, '6a62082da122bffdb1261ca38d81eda9.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 93),
(95, 15, 'Dr. Trevion Bayer', 'in-reprehenderit-quidem-sed-officia-rerum-est', 'Nobis animi error excepturi accusamus quibusdam iusto molestiae. Qui sed assumenda sequi mollitia id nisi. In laborum ut ducimus.', 'Eius occaecati repellat nisi labore. Amet rerum ad animi illum autem. Aut aut ut voluptates consequatur. Nostrum placeat quasi pariatur et ut autem.', 82655921, 77353462, '8bf69f9c8f6cb868f56fce10bd63273a.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 9),
(96, 14, 'Ford Gerlach', 'dolor-ut-voluptatum-consequuntur-maxime-in-cumque', 'Unde quia delectus ullam. Sequi omnis repellendus voluptatem at numquam inventore. Atque nobis veniam ea ducimus omnis.', 'In nobis illo eum velit neque veritatis. Numquam expedita distinctio voluptas dicta sed sit asperiores. Est voluptatem doloremque minus ut sed dolorem minus. Voluptatem itaque ut architecto non sed vero provident animi.', 69329558, 17247831, 'ac0175d0a2d2d7d9eb874bc2f60d5001.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 6),
(97, 15, 'Krystal Maggio II', 'possimus-molestias-culpa-consequuntur', 'Occaecati est atque illum quo dolores. Consequuntur qui iure aliquam maiores voluptatum ipsum nostrum. Velit velit repellendus architecto nobis.', 'Alias unde reprehenderit consequatur voluptatem autem nostrum facilis consectetur. Quaerat consequatur aut eum exercitationem sint id. Totam deleniti doloribus consequatur exercitationem qui qui.', 93650512, 67194426, '30da4f85addcdf67635cd706b67c81da.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 68),
(98, 20, 'Gaetano Larson', 'nesciunt-sint-consequatur-doloremque-quisquam', 'Ipsa aut labore quia eius. Esse numquam vitae ut pariatur. Porro sit similique similique repellendus illo. Est aut blanditiis aut laborum in.', 'Delectus laboriosam consequatur recusandae consectetur ut et ab. Eligendi et saepe aliquid sequi dolorem et quo. Omnis ut sint molestias officiis omnis. Doloremque quae adipisci rerum ut voluptatem facilis rerum.', 71146791, 6697919, 'd7d651ca36adcbe759711e1eaa54d4ef.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 3),
(99, 8, 'Roel Bogan', 'sit-quia-recusandae-molestiae-est-a', 'Est quis molestias et. Explicabo deleniti aliquid ab tempore. Labore distinctio quisquam quibusdam.', 'Quaerat non ullam eos harum cum quae dignissimos. Magni voluptas eos suscipit. Sunt et voluptas cum enim iure rerum. Aliquid molestiae est earum itaque illum.', 27600154, 71710352, 'b92f5dc83dea01f57cc5ca2d3e0fc59d.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 62),
(100, 16, 'Berneice Keeling', 'ratione-omnis-dolores-velit', 'Aut impedit rem quia voluptatem eos. Asperiores cum eaque omnis excepturi nemo hic tenetur aut. Minus facilis error nemo minima veritatis beatae. Sit reiciendis doloribus dolores nam porro et.', 'Quasi sint consequatur fugiat. Sit illum inventore suscipit dolores adipisci rerum. Ducimus et eum nulla sint sequi.', 22771203, 13866097, '4f9ab69ba040f877979d468447ce8b24.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 81),
(101, 19, 'Prof. Valerie Ondricka V', 'ipsum-eum-voluptatibus-perferendis-maxime-quod-magnam', 'Fugit voluptas eum facere ab at ea nesciunt illum. Quam ut voluptas accusamus ea error. Eius quis ab sint quam quo. Non sint expedita ut incidunt.', 'Odio atque repellat praesentium. Accusamus cum a tempore. Architecto illo excepturi qui autem omnis ullam. Error molestiae odio accusantium natus et.', 42695476, 49797469, 'f07c0250548765be516390e8368bbcdf.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 93),
(102, 19, 'Rosalinda Considine', 'sequi-error-et-dicta-natus-eaque', 'Saepe iusto nostrum architecto corporis explicabo eligendi similique. Suscipit officia corporis et dolor laborum unde consequatur inventore.', 'Enim voluptatem hic corrupti necessitatibus. Quos eum recusandae mollitia molestiae. Ipsam omnis accusantium repellat aspernatur totam quia.', 45392603, 45165176, 'e8c951be442e27bc87761a9f5e7967a5.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 93),
(103, 8, 'Gina Powlowski', 'quasi-quibusdam-repellendus-reprehenderit-et', 'Eum unde omnis atque sint et. Reiciendis quam qui velit esse ad quia velit. Sit unde quia accusantium sit nemo.', 'Velit qui voluptatem eligendi eos et saepe. Alias repellat dicta non cumque nobis alias vero ea. Qui quas et consequatur tenetur adipisci fugit vero. Rem ut dolorum est ducimus consequatur maxime.', 48839799, 99405833, '5749d12cc27aabe46ed1aa58914a4161.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 71),
(104, 9, 'Aaliyah Haley', 'cupiditate-accusantium-error-est-quia-cumque', 'Quis quae quibusdam voluptatem facilis. Beatae totam eligendi recusandae. Rem voluptatem dolores esse ut sed. Quis voluptatem doloremque possimus tempore sunt deleniti.', 'Incidunt dolorum impedit necessitatibus. Facilis voluptatem fugiat unde voluptatem. Qui et voluptas cum dolorem enim consequatur distinctio. Aspernatur facilis non cumque beatae doloremque quos. Harum perferendis earum modi adipisci asperiores harum amet.', 11263162, 99639405, 'a60b4ad7c053fdee81503998fc91e6b7.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 20),
(105, 20, 'Angie Breitenberg', 'culpa-laudantium-laudantium-tempora-voluptatibus-quo', 'Perspiciatis reprehenderit harum cumque sed non. Mollitia tempore consequatur corrupti asperiores. Nulla ut aut modi. Aspernatur est qui aut.', 'Eum porro consequatur quibusdam quos vel. Sed consequatur ab nulla temporibus natus. Eligendi fugit nihil voluptatibus esse.', 16455130, 12927900, 'c97f6e35af186828934a13e18e9ff8ea.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 24),
(106, 11, 'Rita Bins', 'quisquam-qui-voluptas-blanditiis-totam-placeat-alias', 'Placeat voluptatum repellendus in reprehenderit magnam. Ut qui odio vero maiores. Accusantium accusantium a sit.', 'Veniam eum corporis ea ab aut. Porro suscipit eaque quia totam ut aliquid quam ullam. Numquam maiores dolore illum iste voluptates labore. Aut numquam fugit ex ea hic.', 32250727, 73854874, 'd16e202f5c127109c433dcc9499f5a4d.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 90),
(107, 11, 'Titus Turcotte I', 'aliquam-aliquid-aliquam-omnis-atque-ut-repudiandae-rem', 'Fugit quos sunt minima vero sequi assumenda provident facere. Sit quaerat id exercitationem assumenda nam ut adipisci. Qui rerum omnis nihil porro officia illo nesciunt molestiae.', 'Ut minima voluptatem accusantium dignissimos est perferendis. Corporis quia est omnis animi sed eos. Architecto quod non ut magni.', 64527625, 84500621, 'da043eb81e452378654cddc31d669724.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 86),
(108, 10, 'Isac Kirlin', 'assumenda-animi-est-quas-praesentium-accusantium-expedita-quod', 'Officiis repudiandae aut voluptatem aut ratione. Veritatis necessitatibus fugiat aperiam. Officia sunt aut assumenda tempora sunt necessitatibus odio.', 'Omnis delectus voluptates voluptas. Nihil deleniti ut autem animi magnam quibusdam expedita aut. Expedita exercitationem perspiciatis rem vitae aliquid neque. In est illum sed fuga.', 86763840, 22294592, '4bc7910b9292e1391ec08ce995ca49a5.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 25),
(109, 12, 'Lottie Anderson', 'natus-explicabo-cum-consequatur-ipsam', 'Voluptatem et tempore tenetur sit molestiae a sit ducimus. Dolor consequatur ut ut rerum. Eum ducimus quia rerum expedita recusandae et totam. Qui distinctio quas ad natus libero corporis veritatis.', 'Molestiae voluptas ea impedit vel impedit non perspiciatis. Aliquid qui culpa magni ipsum laborum. Sit corporis dignissimos et vitae a quasi facere. Enim nisi alias ullam neque.', 34805077, 84749285, 'd61d724285db1245db278dc2ee479435.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 13),
(110, 14, 'Nolan Kuvalis Jr.', 'incidunt-aspernatur-alias-dolore-nam-quia', 'Qui maiores consectetur necessitatibus dolor. Minus est minima necessitatibus placeat maxime. Maxime illo dolor non ut excepturi et ut. Cumque minus aliquid ea sequi qui omnis.', 'Sint excepturi sed dolor aut molestiae vitae. Quibusdam dicta qui fuga tempore quas odio. Sed sint et earum atque libero ipsa id dolorem.', 93618895, 16216611, 'd6650440a7b4d061d592b7f75d05f14c.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 22),
(111, 9, 'Shaylee Hackett', 'qui-vel-ea-et-aliquam', 'Adipisci eaque consequatur minus rerum blanditiis fuga ad. Aut perferendis adipisci exercitationem quod amet eos fugit.', 'Ea nihil dignissimos qui reiciendis. Asperiores distinctio omnis mollitia consectetur. Repellat hic vel nemo eum qui sint.', 50580216, 48147748, '6936bdf4f0610c758382b3704ce6cb9e.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 61),
(112, 9, 'Prof. Israel Price DDS', 'aspernatur-qui-perspiciatis-quaerat-atque-eum-beatae', 'Et et qui minima assumenda impedit magnam. Aut quo neque aut inventore quo incidunt optio.', 'Accusantium quos nihil assumenda eaque rerum et. Dolor nihil omnis temporibus labore fugiat fuga asperiores. Quia est nesciunt necessitatibus quos laudantium quisquam non provident.', 34182225, 21064276, '199aed732017bb86a0321a62dfef3ab2.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 56),
(113, 11, 'Prof. Lucious Douglas', 'dolorem-pariatur-consequatur-eum-eos', 'Debitis in sapiente vitae laboriosam impedit temporibus quas. Cumque rem autem debitis nostrum. Voluptate voluptatum repellat iste qui repellendus nisi. Sunt enim excepturi et unde natus.', 'Rerum optio tempore veritatis sit quod. Ut quas corrupti ea dolores nesciunt ex cumque fuga. Molestiae omnis qui id.', 2476054, 93617110, '94eb0f23d2a98155bd36ccb008ff293d.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 41),
(114, 20, 'Polly Ruecker', 'quo-cumque-deserunt-quaerat-illum', 'Amet ea aut a nesciunt nulla ducimus sit voluptatem. Ipsum reiciendis enim sed sint eum. Laborum earum doloribus nihil.', 'Aspernatur et velit ullam aut ipsa explicabo ea. Quia ipsa qui sequi explicabo impedit.', 54228461, 40431062, '94ca39bdd45b10853983978ca225ae67.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 54),
(115, 11, 'Tyrel Jakubowski', 'harum-omnis-nihil-sint-autem', 'Est vel consequatur velit blanditiis. Quod repudiandae voluptatibus id similique. Porro voluptas illum quidem est ut.', 'Accusamus odit mollitia facilis in quas nisi. Sit et in culpa est aspernatur corporis commodi.', 14769729, 9496729, '144b7deaebf4f411d4263795fba84a9e.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 36),
(116, 11, 'Zackery Miller', 'corporis-non-inventore-doloremque', 'Maxime est necessitatibus aut libero alias quae doloribus. Quasi neque vel dignissimos cum. Nesciunt nihil placeat vel.', 'Et sed quidem voluptas. Illo tenetur facilis ut maxime architecto non enim inventore. Et enim omnis qui. Unde voluptatem illum qui vero et.', 31932389, 97043330, 'b1bafd7e23ac3aa813e829e4ce966335.png', '2021-07-19 07:43:21', '2021-07-19 07:43:21', 37),
(117, 19, 'Christ Rath Jr.', 'omnis-reprehenderit-quia-deserunt-architecto-velit-magnam-consequuntur', 'Cum et sit ipsam nihil. Iure ut libero aperiam quia eum sed expedita. Ut unde nostrum quia pariatur.', 'Similique cum voluptatem cumque maiores omnis dolores. Expedita odit itaque quos vitae facere sapiente.', 84202443, 46206899, '52f59a8a3bce9e262b2e5bc7ce6a04e9.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 64),
(118, 10, 'Kira McCullough', 'ex-ut-perferendis-sint-fugit-sit', 'Enim ab et odit ex sunt quae. Laborum voluptatibus id rem quis delectus a. Totam a enim recusandae quo inventore saepe. In accusantium voluptate aut in.', 'Cumque dolor rem vitae. Odio sapiente quis voluptate numquam.', 41345185, 12536934, '44acfa4c287e21aed7eb340eab4d5617.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 96),
(119, 9, 'Rachel Murazik', 'beatae-delectus-corrupti-error-temporibus', 'Ea sit incidunt corporis corrupti occaecati. Dignissimos et rem est nihil suscipit voluptas inventore cupiditate. Est quas voluptas eaque voluptas. Debitis minima minus aut.', 'Earum dolores culpa reprehenderit omnis ipsam ullam laudantium veritatis. Quod reprehenderit ut sed.', 185106, 13355522, 'bdf3edb0db41a815c266e29edf7b5a73.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 97),
(120, 11, 'Melyna Marks', 'minima-dolorum-nihil-voluptas-ea-dignissimos-laborum', 'Quibusdam iusto iure non saepe. Quia sequi dolorum et rerum aliquid id. Vel blanditiis nihil ipsam tempora. Est quidem culpa consequatur blanditiis suscipit repudiandae est.', 'Omnis dolorem neque laudantium itaque corporis odio. Enim nihil natus inventore consequatur repellat dolorem. Vel sunt qui deserunt fuga et laboriosam fugiat. Optio nemo accusantium nisi ipsa provident.', 88109268, 66135847, '7f5d39d90f1b817c661eefa08f95ed1a.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 43),
(121, 10, 'Orin Zemlak DDS', 'quia-dolore-eligendi-perferendis-maxime-ut-sit-distinctio', 'Quis quibusdam quaerat vel reprehenderit sequi. Eveniet neque sed vitae qui amet. Explicabo minus quidem magnam unde sit voluptatum. Non nulla officia quasi minima neque officia.', 'Cumque labore et non eos. Ut autem quis voluptas minima in quia quae. Ullam dolore quo dolor omnis perferendis. Deleniti facilis corporis sed repudiandae.', 11483932, 75219788, '9010037e8ffde89b5c158f007892eca8.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 3),
(122, 9, 'Dr. Joey Cremin DVM', 'aut-est-omnis-eveniet-beatae-veniam-ut', 'Et at totam animi distinctio ducimus sequi vel. Et nobis deleniti ipsam. Adipisci repellat beatae dolor dolores.', 'Molestiae id sint reprehenderit aut quo sit. Distinctio repellendus aliquid a aut. Non laborum dignissimos aut corrupti id odit.', 84000082, 50429347, 'db4e85f92779c4e0688fa590f3a7dda2.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 55),
(123, 12, 'Ernestine Kreiger', 'aut-porro-optio-vero-tempora-aliquid-aperiam-ab', 'Consequatur illo ad temporibus illo. Qui molestiae commodi sint est aliquam. Est exercitationem culpa eius voluptatem.', 'Nemo labore est id hic nam aspernatur. Et fugit quia dolores. Consequatur et commodi facere qui.', 57473451, 36493644, '60d18c3ebd285e964c43bae0e9d0c6aa.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 87),
(124, 14, 'Marcelo Raynor', 'modi-molestiae-ut-ut-recusandae-molestiae-labore-officiis-voluptas', 'Et corrupti laboriosam eaque sequi quia omnis velit. Maiores est quia consequatur. Ducimus voluptatem et quaerat nostrum voluptas similique eaque.', 'Aut tempore numquam qui iste numquam delectus repellendus est. Perspiciatis enim soluta sed aperiam omnis. Dignissimos corrupti rem eligendi qui.', 87620003, 34681511, '0dce4313300cb3aa64d493cb01625846.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 10),
(125, 15, 'Frida Casper', 'ut-quo-fugiat-sed-quia-qui-corporis-dolor', 'Animi quos nihil eos porro commodi libero. Blanditiis quis ut eligendi libero. Aut labore culpa ipsam ab tempore. Qui qui ut vero eveniet.', 'Ipsam eum tempore qui non architecto mollitia soluta. Veniam qui non et doloribus sit natus. Quo voluptatem ut ut. Veritatis dolore repellendus minus sit vel hic.', 98941326, 27675942, 'cd293ec3c68b8fe254999f7d1b350364.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 0),
(126, 8, 'Khalid Howell Jr.', 'dolores-soluta-id-iste-sint', 'Repellendus ut velit illo explicabo dolorem. Beatae sed maxime officiis a quos. Quaerat officia vero corporis molestiae in facilis.', 'Laboriosam et eveniet voluptatum repudiandae soluta. Ipsum accusamus ea at. Adipisci sunt voluptatum praesentium eum impedit. Voluptatem hic maxime eligendi qui quasi rerum.', 29117004, 75463428, '5e5e3f4d797a9e092a31213c943aac35.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 6),
(127, 14, 'Franco Kertzmann', 'impedit-corrupti-molestiae-aspernatur-placeat-libero-repellendus', 'Modi aut delectus asperiores quaerat maiores laboriosam. Vero rerum qui ut sit molestiae. In et dolorem officia.', 'Corrupti quos dolores deleniti. Dolor aliquam nesciunt nisi consectetur ut enim suscipit. Magnam voluptas in unde omnis. Consequuntur quibusdam adipisci cumque soluta tenetur molestiae.', 97146831, 21358104, '566a639af768cd578b191ace233b75b8.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 40),
(128, 20, 'Prof. Cody Ratke', 'corrupti-ipsum-error-et-rerum-non-iure-autem-corporis', 'Distinctio praesentium hic animi vel aliquam aut non quo. Voluptatibus aut totam ut rerum in id praesentium. Vero voluptates beatae sequi iure ratione.', 'Beatae alias cumque et. Qui tempora laboriosam eum ab voluptas. Esse esse fugit optio modi sequi in.', 83618841, 357892, '03aba5787c74799802123b478209613b.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 62),
(129, 19, 'Bernita Langworth', 'voluptatum-et-est-suscipit-quia', 'Voluptatum ipsa ad numquam ducimus vel animi quibusdam. Possimus aut qui voluptatem ex. Et ut asperiores praesentium nobis beatae.', 'Molestias quis a odit voluptatum consequatur ab expedita nulla. Repellendus qui impedit aut quaerat placeat. Totam quia qui atque quia itaque sit ut eos.', 6620237, 25913218, '951be8b4d739c9f277d5f9a8f3f13701.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 37);
INSERT INTO `products` (`id`, `branch_id`, `name`, `slug`, `short_desc`, `desc`, `price`, `competitive_price`, `image`, `created_at`, `updated_at`, `discount`) VALUES
(130, 12, 'Genesis Bernhard', 'sed-ab-eveniet-quo-quod-ut-accusantium', 'Doloremque reprehenderit quaerat ut repellat nulla molestiae laborum voluptatibus. Tempore unde autem deleniti quis. Odio quam excepturi temporibus consequatur nihil ut.', 'Corrupti sit reprehenderit consectetur eius voluptate ex. Labore et omnis voluptas facilis cupiditate in excepturi repellat. Aut ipsa enim unde quae. Autem iusto voluptate aut ea et quas repellendus.', 87325091, 19923718, '4f1b5bab00fd2c67ec4a7c5f14b3c742.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 37),
(131, 15, 'Betsy Corkery', 'reprehenderit-earum-et-qui', 'Sint consectetur ipsa placeat ipsam pariatur. Laudantium repellendus aut hic amet.', 'Libero blanditiis amet maxime non quam corrupti vel. Praesentium nam dignissimos dolorem dolore temporibus. Aperiam qui accusamus sit eum voluptas repellendus reiciendis. Mollitia impedit consequuntur numquam velit.', 73289814, 51938834, '65c2f5c1f101cb7ecf4d3a029b9b8112.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 82),
(132, 12, 'Palma Collins', 'quos-sed-est-voluptatum-non-aspernatur-aspernatur-ullam', 'Laborum molestias laboriosam sunt ad. Illum ratione dolores neque modi numquam. Nisi est pariatur distinctio temporibus. Asperiores quaerat nostrum atque deleniti placeat atque.', 'Est consectetur beatae repellat quos distinctio ipsum repellat. Harum exercitationem aliquam earum incidunt vel. Consequatur illum exercitationem eum officiis qui omnis architecto.', 78639626, 29010542, '4e5658a0a0c0785ded6a1df31a311873.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 18),
(133, 10, 'Merlin Hessel PhD', 'ab-est-nulla-et-harum-dolor', 'Nihil consequuntur explicabo eos quia quibusdam dolores provident dicta. Ex et architecto voluptatem. Autem dolore temporibus consequatur sit porro odit odio.', 'Dolorem sit a soluta esse rerum officia. Ipsam aut quaerat molestiae nihil accusamus expedita. Voluptas sed suscipit tempora doloremque minima voluptatem aperiam. Officiis et tempore sit in debitis temporibus nihil.', 53954155, 83365250, '0d4b7e449421cdf09de7c4017ce527c9.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 26),
(134, 19, 'Blanche Larson', 'est-ut-quaerat-omnis-doloremque-ducimus-omnis-sit', 'Alias placeat nisi non voluptatem id placeat temporibus architecto. Veniam est nesciunt nesciunt nemo cum sed. Maxime explicabo qui omnis omnis eos minus qui.', 'Aut ad architecto dignissimos ut id velit. Ratione nesciunt aut aut ab tenetur iure repudiandae. Aliquam eum et explicabo aliquam quia occaecati similique sunt. Fuga porro a tenetur eos.', 75416406, 94469306, '04888609807b70065ddfc0d61c709ff7.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 91),
(135, 11, 'Adolf Prohaska', 'magnam-impedit-tenetur-porro-et', 'Iusto qui id voluptas qui at cupiditate eos. Alias sit facilis autem ut dolorum. Suscipit impedit provident harum voluptatum asperiores voluptatem corporis.', 'Repellat quaerat voluptatem ut rerum ut sed a. Inventore a soluta non ipsam. Eos fuga quasi qui corrupti sit. Neque labore omnis aliquam exercitationem officia quidem.', 15016844, 68739278, '1f52ada4d07e46ee4b159f8580546756.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 37),
(136, 20, 'Rebekah Bins MD', 'et-vel-laborum-rerum-sequi', 'Qui ut tempora optio blanditiis aut voluptatem et. Quia est veritatis quis dolorum sint voluptas velit est. Neque commodi non omnis voluptatem nihil eum voluptatem.', 'Quibusdam eaque ipsum sit nam laboriosam. Sapiente explicabo vel eum deserunt nam. Omnis nisi in sed sit. Ut rem laboriosam quae eos maxime eveniet.', 23092033, 6432564, 'a0257b7145a3ec068b84940db01f0472.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 18),
(137, 10, 'Prof. Zoie Kihn PhD', 'maiores-qui-aut-molestiae-et-molestias-enim-sit', 'Ex est omnis natus quisquam iure quas quisquam. Est recusandae dolor et et dolore. Voluptatem qui omnis voluptate blanditiis recusandae sed molestiae a. Quo et est porro vitae.', 'Eaque soluta consequatur id et quo. Ab in et aut laboriosam. Iste sint aliquid rerum modi unde laboriosam quod.', 46213890, 81217265, '402b30f772306155497cc40a0357f581.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 2),
(138, 14, 'Miss Alberta Fisher', 'sed-laudantium-provident-et-occaecati-non-temporibus-sint', 'Eius molestiae incidunt voluptatem aut at. Earum ea repellat autem omnis sunt sunt temporibus accusamus. Quisquam sapiente consequuntur perspiciatis molestiae fuga tenetur.', 'Quia qui eos hic porro sit a laudantium. Ad nostrum id et ut error aliquid nam. Minus eius praesentium fugiat ut esse voluptas optio quo. Id sunt minus id porro est.', 27162020, 70974818, 'df0b28230326eb56f1470ffac7fce16d.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 97),
(139, 20, 'Giuseppe Rolfson', 'quibusdam-odit-optio-officia-officia-sit-alias-mollitia', 'Nesciunt perferendis assumenda voluptatum velit. Quibusdam qui aspernatur ullam eos labore quibusdam. Consequatur fugit nihil cumque inventore.', 'Consequatur sunt omnis commodi placeat delectus illo est dolor. Laudantium quisquam et saepe aut enim commodi dolorum. Excepturi soluta labore qui quos. Sint animi aut quos vitae ut molestiae.', 22525713, 44523512, '01014f3012a62e6f350e2aa437a3a023.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 49),
(140, 14, 'Prof. Katheryn Upton', 'et-odio-reiciendis-sequi-sit-optio-quia', 'Tenetur incidunt sint velit recusandae inventore fugiat. Perferendis sed officia et beatae sequi. Illum voluptas culpa a.', 'Beatae earum debitis quia minus totam. Et officia quos reiciendis. Aut rerum laborum ratione recusandae dignissimos nulla.', 36546245, 10682794, '4f4d318d2bfa4f28c7f6f9d01cf5b1cf.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 34),
(141, 14, 'Samir Quigley', 'enim-sit-provident-itaque-sunt-nostrum', 'Quia pariatur eos repellendus ea. Est enim esse vel et aut. Aut nam in adipisci earum doloribus placeat suscipit. Tempore officia consequuntur dolorum labore iure voluptas.', 'Et laborum labore et suscipit beatae fugit. Qui est iure dolor voluptatem ut. Possimus reiciendis quia sequi et similique. Eligendi nisi aspernatur quis.', 68427092, 95889977, '7808baa5139fd7a4052c8fa9c7efc6a3.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 12),
(142, 12, 'Ms. Holly Donnelly', 'magni-aliquid-cum-possimus-est-aut-voluptas-ducimus-optio', 'Reprehenderit quidem et nihil fuga aperiam ipsa. Ut eum sint error eveniet. Ut laborum facilis sit.', 'Corporis eum atque voluptas officiis et velit et commodi. Et eius debitis odio voluptate rerum omnis. Architecto et magni dolorum quia animi et quas.', 95548447, 55755710, '3e76ab5232362e07107738c3b44c0310.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 10),
(143, 19, 'Mr. Ignatius Carroll', 'animi-consequuntur-qui-unde-pariatur', 'Cum cumque dicta eius quae alias recusandae ratione. Cum quas distinctio quidem et. Unde repudiandae ut possimus iure. Molestias quo velit quos omnis voluptas.', 'Ea qui pariatur placeat a et. Quia voluptas placeat optio eum harum ab. Nesciunt fuga voluptates ut quisquam. Qui officia culpa vel.', 51711534, 93760875, '26e6c77f624f74fe23353bc837b49e26.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 85),
(144, 11, 'Mrs. Carole Emmerich', 'saepe-ipsum-distinctio-ipsum-quo-sunt-non-recusandae', 'Nihil nulla corporis harum maxime laborum qui. Et tempora unde qui. Praesentium velit nam quo delectus libero quaerat qui.', 'Aut iure reprehenderit reprehenderit quas ut temporibus. Ab dolore aut doloribus aliquam iste eos.', 45410178, 50741982, '6496e3c66401d3bbf6b5dd0aae46eab8.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 79),
(145, 19, 'Dr. Josephine Koss', 'sit-nesciunt-repellendus-nostrum-vel', 'Dolor unde et eius provident hic. Provident perferendis dolorem eos sapiente.', 'Delectus exercitationem voluptas itaque veritatis sed et incidunt. Commodi illum et neque eaque sit assumenda. Molestiae quisquam ut nam ut adipisci quibusdam.', 10981147, 7835432, 'cdbbe95b3b0bacb5068bab0927784a80.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 2),
(146, 16, 'Kari Dickinson', 'dolores-vel-quia-odit-recusandae-optio-perspiciatis', 'Repellat consequatur repellat qui velit nemo et. Ut nesciunt consequatur error qui iste aut reprehenderit. Est aut at iusto voluptatum ut id. Ducimus sit id qui.', 'Non veniam illo est vitae. Ad qui quisquam cum. Enim est consequatur autem quia. Culpa quia corrupti unde repellat fugiat sint sint.', 77566386, 10299100, 'eb8f5a34dc662d54979d8341d9236b62.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 10),
(147, 10, 'Marlon Dickinson DDS', 'architecto-et-facere-doloribus-ad-sint', 'Doloremque pariatur et neque qui. Soluta dignissimos dolore et ipsa. Quasi illo alias ducimus inventore commodi laborum. Id consequatur voluptatum non aperiam.', 'Vel odit aut temporibus harum soluta. Asperiores itaque ea eligendi. Nesciunt ut fuga molestias vitae.', 53386626, 33232871, '1c64baea38c3dc986a14c1adbd0deaa6.png', '2021-07-19 07:43:22', '2021-07-19 07:43:22', 33),
(148, 20, 'kfkdhakd', 'fadkahkaf', 'khdakdfhkahfka', '', 200000, 250000, '10.png', '2021-07-20 01:23:42', '2021-07-20 01:24:00', 14);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'khakdfhakda12334', '2021-07-12 10:34:39', '2021-07-12 10:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `caption` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'voluptatem-deserunt-mollitia-magnam-voluptates-id-libero-quibusdam-velit', 'Prof. Zoey Roob I', '2021-07-11 19:29:58', '2021-07-11 19:29:58'),
(2, 'sequi-et-vel-voluptatibus-ipsum-aliquid-in-eaque-delectus', 'Davin Thompson', '2021-07-11 19:29:58', '2021-07-11 19:29:58'),
(3, 'velit-qui-qui-impedit', 'Madison Botsford', '2021-07-11 19:29:58', '2021-07-11 19:29:58'),
(4, 'eaque-praesentium-dolor-deserunt-corporis-quia-inventore-officiis', 'Miss Marlene Johnson IV', '2021-07-11 19:29:58', '2021-07-11 19:29:58'),
(5, 'dolore-aspernatur-ea-et-illum', 'Samson Schuppe', '2021-07-11 19:29:58', '2021-07-11 19:29:58'),
(6, 'omnis-non-doloribus-ratione', 'Imogene Heathcote', '2021-07-11 19:29:58', '2021-07-11 19:29:58'),
(7, 'omnis-maiores-nobis-maxime-officiis-eaque', 'Malcolm Gottlieb', '2021-07-11 19:29:58', '2021-07-11 19:29:58'),
(8, 'illo-magni-dolor-et-praesentium', 'Dr. Ernesto Lind V', '2021-07-11 19:29:58', '2021-07-11 19:29:58'),
(9, 'explicabo-corporis-tempore-enim-aspernatur-similique-commodi-quo', 'Miss Helena Jast Jr.', '2021-07-11 19:29:58', '2021-07-11 19:29:58'),
(10, 'exercitationem-dicta-magnam-saepe-molestiae-voluptatibus', 'Buddy Von II', '2021-07-11 19:29:59', '2021-07-11 19:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `tags_products`
--

CREATE TABLE `tags_products` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags_products`
--

INSERT INTO `tags_products` (`tag_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 23, NULL, NULL),
(1, 25, NULL, NULL),
(2, 27, NULL, NULL),
(2, 148, NULL, NULL),
(5, 23, NULL, NULL),
(5, 25, NULL, NULL),
(6, 27, NULL, NULL),
(6, 148, NULL, NULL),
(9, 25, NULL, NULL),
(9, 45, NULL, NULL),
(9, 46, NULL, NULL),
(9, 47, NULL, NULL),
(10, 148, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_at` date NOT NULL,
  `last_login` date NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_products`
--
ALTER TABLE `categories_products`
  ADD PRIMARY KEY (`cate_id`,`product_id`),
  ADD KEY `categories_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Indexes for table `image__sliders`
--
ALTER TABLE `image__sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image__sliders_slider_id_foreign` (`slider_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permissions_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `roles_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_products`
--
ALTER TABLE `tags_products`
  ADD PRIMARY KEY (`tag_id`,`product_id`),
  ADD KEY `tags_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `image__sliders`
--
ALTER TABLE `image__sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories_products`
--
ALTER TABLE `categories_products`
  ADD CONSTRAINT `categories_products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `image__sliders`
--
ALTER TABLE `image__sliders`
  ADD CONSTRAINT `image__sliders_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  ADD CONSTRAINT `permissions_roles_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permissions_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags_products`
--
ALTER TABLE `tags_products`
  ADD CONSTRAINT `tags_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tags_products_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
