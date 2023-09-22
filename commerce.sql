-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 07 Ağu 2023, 14:34:25
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `commerce`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'voluptatem ut', 'voluptatem-ut', '2023-07-28 12:18:43', '2023-07-28 12:18:43'),
(2, 'qui ea', 'qui-ea', '2023-07-28 12:18:43', '2023-07-28 12:18:43'),
(3, 'sapiente repudiandae', 'sapiente-repudiandae', '2023-07-28 12:18:43', '2023-07-28 12:18:43'),
(4, 'corrupti sunt', 'corrupti-sunt', '2023-07-28 12:18:43', '2023-07-28 12:18:43'),
(5, 'nobis occaecati', 'nobis-occaecati', '2023-07-28 12:18:43', '2023-07-28 12:18:43'),
(6, 'voluptatibus maxime', 'voluptatibus-maxime', '2023-07-28 12:18:43', '2023-07-28 12:18:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `home_sliders`
--

DROP TABLE IF EXISTS `home_sliders`;
CREATE TABLE IF NOT EXISTS `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `top_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `top_title`, `title`, `sub_title`, `offer`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Supper value deals', 'hot promotion', 'on all products', 'Save more with coupons & up to 70% off', 'product-details.html', '1691186864.png', '1', '2023-08-04 18:53:37', '2023-08-04 19:07:44'),
(3, 'Hot promotions', 'Fashion Trending', 'Great Collection', 'Save more with coupons & up to 20% off', 'link2', 'title2_1691186093.png', '1', '2023-08-04 18:54:53', '2023-08-04 18:54:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_07_28_144628_create_categories_table', 2),
(10, '2023_07_28_144810_create_products_table', 3),
(11, '2023_08_04_205316_create_home_sliders_table', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `regular_price` decimal(8,2) DEFAULT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_status` enum('instock','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'instock',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` bigint(20) UNSIGNED NOT NULL DEFAULT '10',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'omnis earum', 'omnis-earum', 'Quis quis nihil perspiciatis aliquam. Dignissimos et laudantium ipsum tenetur esse corporis. Alias sint iusto incidunt ut deleniti.', 'Ab praesentium optio accusantium provident culpa eaque ullam. Omnis ipsum quia ad eius. Similique itaque deserunt quaerat sunt quis architecto. Et quasi eum recusandae ad et cumque et. Impedit repudiandae inventore voluptatem. Reprehenderit minima qui doloribus accusantium. Hic necessitatibus ut laudantium quisquam similique sed et eum.', '88.00', '73.00', '416', 'instock', 0, 141, '1691106235.jpg', NULL, 3, '2023-07-28 12:18:43', '2023-08-03 20:43:55'),
(2, 'culpa saepe', 'culpa-saepe', 'Ipsam aut ad aut aliquam eos architecto maiores. Vitae totam ratione dolor voluptas quod voluptatem non. Soluta similique eos ad quasi laborum officiis.', 'Assumenda corrupti in a doloribus necessitatibus. Officia a minima illum reprehenderit et. Facere molestiae cupiditate debitis maiores et quae. Praesentium ullam in occaecati in. Tempora optio qui porro. Voluptatem qui neque eos modi omnis nesciunt. Sit quia et recusandae sed voluptatem et facilis. Ratione fugit dolore consequatur rerum autem illo. Cum dolorum corporis ut qui voluptas. Omnis fugiat dolores deserunt sint placeat. Non ducimus quod velit error voluptatem.', '221.00', '411.00', '350', 'instock', 0, 112, '1691106249.jpg', NULL, 4, '2023-07-28 12:18:43', '2023-08-03 20:44:09'),
(3, 'in exercitationem', 'in-exercitationem', 'Autem voluptate ad quo. Ut consequatur ratione culpa in error. Rerum aspernatur sed voluptas id dolorem.', 'Qui et eius cumque molestiae quas atque eos. Error commodi in quo blanditiis aut omnis natus et. Doloribus ut animi iure. Dicta voluptate perspiciatis enim unde quis. Ullam eveniet corporis unde alias qui odit. Voluptatem asperiores aut voluptatibus autem. A sequi est aut. Quidem officiis rem aut quam voluptatibus. Maiores voluptatibus velit iste sunt cumque fugit. Est asperiores illum quod quia qui nihil. Totam sequi dolor ducimus consectetur accusamus tenetur consequatur.', '431.00', '199.00', '123', 'instock', 0, 149, '1691106267.jpg', NULL, 3, '2023-07-28 12:18:43', '2023-08-03 20:44:27'),
(4, 'omnis pariatur', 'omnis-pariatur', 'Eveniet libero dolorem voluptatem tempore in deleniti ea. Facere quas dolores commodi qui. Accusantium molestias iste provident quae odit eum enim cupiditate.', 'Architecto et et vel ratione placeat nihil tenetur veritatis. Assumenda vero consectetur facere sapiente molestiae nihil. Repellendus quis labore nihil architecto corrupti et ducimus dignissimos. Dolorem at voluptatibus quas consequuntur beatae tempore error. Esse ullam nisi reprehenderit doloremque aliquam. Et quis reprehenderit illum vero excepturi culpa. Iure adipisci tenetur sapiente sed assumenda quia est. Corporis nobis earum cumque delectus assumenda.', '315.00', '462.00', '395', 'instock', 0, 189, '1691106279.jpg', NULL, 1, '2023-07-28 12:18:43', '2023-08-03 20:44:39'),
(5, 'voluptatem quis', 'voluptatem-quis', 'Qui voluptatem a voluptate rerum sed quia atque. Velit sint vitae quam est. Perspiciatis exercitationem nostrum repellat modi in architecto architecto.', 'Molestias omnis commodi reiciendis quasi ut. Dolores vel eveniet aut quia et labore repellendus. Atque non iste id impedit culpa quis. Consequatur qui consequatur animi dignissimos id repellendus quas. Aut eos autem sequi non modi unde dolorem. Et molestias in cupiditate deleniti. Nemo error perspiciatis inventore quam aliquam reiciendis voluptatibus. Porro cupiditate rerum autem quia labore id sint.', '93.00', '102.00', '352', 'instock', 0, 135, '1691106293.jpg', NULL, 3, '2023-07-28 12:18:43', '2023-08-03 20:44:53'),
(6, 'qui atque', 'qui-atque', 'Porro ipsa alias dolore laborum delectus aut. Quia quisquam sunt dolorem fugit est velit. Quae quaerat itaque harum odio molestiae quisquam a.', 'Illum unde ea exercitationem et. Occaecati autem dolores adipisci at harum dolorem. Quia ut sunt corrupti commodi ab. Velit et non tempora qui. Nulla eveniet adipisci accusamus unde repellat ad. Ut nulla perferendis odit aut et. Non aut consequatur aperiam delectus dolorem nihil. Sed doloribus eius sequi. Dolor deleniti perferendis aut ullam. Recusandae dolores totam voluptates modi libero eveniet qui non. Possimus nisi eum aut nihil.', '176.00', '237.00', '480', 'instock', 0, 196, '1691106308.jpg', NULL, 5, '2023-07-28 12:18:43', '2023-08-03 20:45:08'),
(7, 'laudantium magnam', 'laudantium-magnam', 'Sed est nam commodi quod. Voluptatem beatae eligendi laborum consequatur. Nihil inventore voluptatum adipisci omnis tempora ipsum et itaque.', 'Labore aut nobis expedita id. Atque voluptatem nisi laudantium sunt magnam occaecati. Et laborum impedit consequuntur molestiae. Corrupti repellat culpa ea nisi aliquid. Et doloremque ut pariatur molestiae. Velit reiciendis accusantium optio voluptate omnis corporis aut. Tenetur cumque consequatur non rerum voluptas. Et repellat ea pariatur natus quaerat rerum in. Hic magni quia saepe tempora qui dolore nemo. Consequatur explicabo earum quasi enim. Autem dolore sint debitis incidunt.', '470.00', '336.00', '242', 'instock', 0, 164, '1691106323.jpg', NULL, 3, '2023-07-28 12:18:43', '2023-08-03 20:45:23'),
(8, 'occaecati officiis', 'occaecati-officiis', 'Voluptatibus occaecati vel enim quod. Saepe eligendi reprehenderit quas tempore quis quam nihil. Dolor suscipit voluptas quam voluptatum doloremque voluptatibus dolor.', 'Fugit tempore officia et. Harum qui et beatae voluptatem excepturi. Nobis illo sequi non. Est voluptate et ut eius. Eligendi doloribus magnam eligendi perspiciatis ut sit occaecati. Exercitationem ipsum iusto ipsam suscipit vel consequuntur. Quia accusantium excepturi et ut quo. Sed est quia veritatis natus omnis qui. Itaque incidunt est vel. Voluptates expedita molestiae maxime exercitationem.', '470.00', '330.00', '433', 'instock', 0, 118, '1691106337.jpg', NULL, 3, '2023-07-28 12:18:43', '2023-08-03 20:45:37'),
(9, 'sequi aut', 'sequi-aut', 'Mollitia voluptatem voluptates quae delectus nihil rerum. Vel quia ut optio. Ut eos est corrupti voluptatem. Facilis voluptas est et.', 'Praesentium neque unde aut nam et asperiores. Inventore quos necessitatibus fugiat exercitationem molestiae cum amet. Quo repudiandae eligendi molestias repellendus aut quisquam molestias accusamus. Neque qui itaque amet repellendus corporis ab necessitatibus est. Aut voluptas ipsa in vel consequuntur velit a. Enim dicta voluptatem rerum qui aspernatur aut officiis.', '316.00', '198.00', '467', 'instock', 0, 173, '1691106410.jpg', NULL, 5, '2023-07-28 12:18:43', '2023-08-03 20:46:50'),
(10, 'tempore maiores', 'tempore-maiores', 'Atque iure maxime cum quaerat et. Nisi distinctio corrupti vero autem nulla et. Qui autem provident hic et. Sunt molestias qui beatae voluptatibus harum placeat harum in.', 'Quod vel voluptates labore perferendis. Distinctio numquam modi quibusdam quisquam iure architecto enim. Est ullam omnis reiciendis sunt et omnis provident. Quos itaque dolores accusamus soluta. Sapiente mollitia rem ut hic. Voluptatem sed quasi quo qui. Facere voluptas tempore praesentium. Earum sed consequatur a ipsa temporibus. Molestias iste error consequatur deleniti asperiores velit. Beatae laboriosam praesentium harum et.', '325.00', '50.00', '236', 'instock', 0, 148, '1691106428.jpg', NULL, 3, '2023-07-28 12:18:43', '2023-08-03 20:47:08'),
(11, 'officia illo', 'officia-illo', 'Ducimus qui sint et aut. Aliquam aut sed vel.', 'Nostrum quae dolorem sit deleniti. Non quia accusantium ipsa enim. Quis ex quod voluptatem soluta autem ipsam ipsam. Ut reiciendis laborum ducimus molestiae dolor quam. Ea laudantium molestiae tempore sequi nam impedit occaecati. Est natus alias et. Dignissimos temporibus voluptates voluptatum aut et. Eveniet commodi pariatur reiciendis impedit quos velit. Libero ad iusto quis laboriosam alias eligendi. A fuga quam cupiditate minus. Sed mollitia ex temporibus magnam natus incidunt sint.', '440.00', '487.00', '287', 'instock', 0, 156, '1691106625.jpg', NULL, 2, '2023-07-28 12:18:43', '2023-08-03 20:50:25'),
(12, 'ea ut', 'ea-ut', 'Cumque aliquid error cupiditate ducimus earum maxime excepturi in. Cum qui doloremque ut pariatur blanditiis. Dolorem facilis labore in vitae.', 'Eveniet dolores quas laudantium at rerum. Ex dicta doloribus molestiae velit laboriosam et laboriosam. Veritatis aut corrupti hic ab at debitis odit. Ducimus saepe adipisci maxime omnis inventore similique impedit. Magnam laudantium consequatur ut quas. Quos sint quidem laborum saepe quibusdam. Et quidem quia animi harum ratione. Laudantium molestias corporis eaque aut dolores aut. Quia fugit animi expedita consequatur molestias. Laudantium ex esse est aliquid quas culpa consequuntur.', '243.00', '362.00', '147', 'instock', 0, 152, '1691106678.jpg', NULL, 4, '2023-07-28 12:18:43', '2023-08-03 20:51:18'),
(13, 'quasi enim', 'quasi-enim', 'Consequuntur necessitatibus rerum asperiores dolores odit ut id. Veritatis nemo totam illum sunt voluptas.', 'Dolores et fugit est deleniti sit asperiores ratione porro. Ullam sed sed amet. Eligendi et illo commodi aliquam. Optio voluptates cumque aliquam inventore qui dolorem autem. Et quas aut voluptates alias non. Cumque facilis similique illo nobis odit delectus non. Doloribus omnis quam facilis omnis mollitia. Eos quos reiciendis quas debitis. Nihil consequatur et autem fugiat veniam ducimus dolores tenetur. Aspernatur aut ex iste quia perspiciatis expedita dolorem.', '485.00', '323.00', '231', 'instock', 0, 184, '1691106734.jpg', NULL, 1, '2023-07-28 12:18:43', '2023-08-03 20:52:14'),
(14, 'tenetur et', 'tenetur-et', 'Rem non et cumque tempore quas. Sed placeat tenetur in explicabo excepturi. Eveniet voluptatibus libero hic reprehenderit.', 'Ab voluptatem voluptas enim omnis molestiae nisi. Tempora et rerum aliquam ratione magnam quas labore provident. Rerum eos quasi provident. Nihil recusandae similique in. Nemo animi minus architecto officia eaque. Ullam mollitia dolores debitis quae sapiente optio sequi. Sed sunt incidunt maiores dolore. Eum ratione dicta ea iste necessitatibus iste. Laudantium harum consectetur dolore sint.', '10.00', '318.00', '184', 'instock', 0, 172, '1691106757.jpg', NULL, 5, '2023-07-28 12:18:43', '2023-08-03 20:52:37'),
(15, 'corrupti harum', 'corrupti-harum', 'Corporis sint dolor consequatur quae vel qui ex. Consequatur possimus mollitia molestiae architecto. Est sapiente sit consectetur at praesentium.', 'Omnis est quia ut et. Rerum saepe voluptas quaerat. Aliquid recusandae quae labore mollitia. Dolores delectus iste repudiandae veritatis magnam porro porro. Libero perferendis nesciunt repudiandae excepturi. Id ad laboriosam velit ullam voluptas velit eaque. Aut facilis a qui eos eos ut animi. Dolor ut cumque voluptatem ullam facere quis unde. Ut rerum qui odit ducimus quis. Consequatur molestias et ea in aut vel.', '40.00', '173.00', '321', 'instock', 0, 105, '1691106774.jpg', NULL, 5, '2023-07-28 12:18:43', '2023-08-03 20:52:54'),
(16, 'hic vitae', 'hic-vitae', 'Sed voluptatem sint repudiandae dolores illum. Eum voluptatem et sed. Ut repellendus quaerat quis esse earum facilis vel. Vel dolorem sed nihil voluptatem sunt ipsum nam repellendus.', 'Non sed modi officia et qui esse laborum et. Eveniet qui fugit et doloremque quas corrupti sapiente. Ad optio qui atque aut saepe. Culpa nostrum voluptatem vero et in. Quos voluptatem voluptas sed distinctio non. Totam qui voluptatem voluptatem nostrum. Qui iusto mollitia cupiditate inventore. Qui enim laudantium fugit ut laboriosam tempora. Et libero veritatis deserunt ut quibusdam sit. Eos possimus iusto impedit saepe voluptatibus. Facere vitae nemo reprehenderit quisquam animi.', '485.00', '87.00', '301', 'instock', 0, 155, '1691106797.jpg', NULL, 4, '2023-07-28 12:18:43', '2023-08-03 20:53:17'),
(17, 'deneme ürün 1', 'deneme-urun-1', 'kısa açıklama', 'uzun açıklama', '100.00', '99.00', '10', 'instock', 0, 12, '1691106153.webp', NULL, 2, '2023-08-03 20:30:36', '2023-08-03 20:42:33');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM for admin and USR for user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `utype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@qaz.com', NULL, '$2y$10$m8BNtfhuUaiNY0nRdSaYQenisuWR1aazLxzO02litvS19EsMWoCHW', 'USR', NULL, '2023-07-28 12:22:49', '2023-07-28 12:22:49'),
(2, 'admin', 'admin@qaz.com', NULL, '$2y$10$gOHyDNJuWC6ycYn0Wi9qp.v7P.sQbHesOBjny/bkcrm1PDy6kRi/O', 'ADM', NULL, '2023-07-28 12:23:27', '2023-07-28 12:23:27');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
