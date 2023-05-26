-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 08:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('finished','study') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'study',
  `user_id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_edited_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `code`, `slug`, `added_by`, `last_edited_by`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', 'NKEI', 'matematika', 'Wage Hidayat', 'Yani Usada', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
(2, 'Bahasa Inggris', 'MXZW', 'bahasa-inggris', 'Darimin Prasetya', 'Yunita Halimah', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
(3, 'Bahasa Indonesia', 'USVZ', 'bahasa-indonesia', 'Jane Dewi Nurdiyanti', 'Bagus Jamil Napitupulu', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
(4, 'Fisika', 'CRMF', 'fisika', 'Gara Putra', 'Cornelia Uli Anggraini', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
(5, 'Kimia', 'XJWT', 'kimia', 'Harsaya Waskita', 'Gandi Hidayanto', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
(6, 'Biologi', 'SMBL', 'biologi', 'Ayu Suryatmi S.H.', 'Galih Himawan Sinaga', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
(7, 'Sejarah', 'YLKR', 'sejarah', 'Garan Sihotang', 'Luluh Murti Sihombing S.Sos', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
(8, 'Geografi', 'FWCV', 'geografi', 'Belinda Sudiati', 'Vega Damanik', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
(9, 'Ekonomi', 'CDXD', 'ekonomi', 'Muhammad Prasetyo', 'Latika Wulandari', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
(10, 'Sosiologi', 'INCO', 'sosiologi', 'Irnanto Nasim Santoso S.Psi', 'Rahmat Marbun', '2023-05-24 18:21:29', '2023-05-24 18:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `draft` tinyint(1) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `favorite` int(11) NOT NULL DEFAULT 0,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_edited_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `draft`, `title`, `slug`, `cover`, `desc`, `body`, `favorite`, `added_by`, `last_edited_by`, `created_at`, `updated_at`) VALUES
(1, 5, 0, 'Voluptate Id Omnis', 'voluptate-id-omnis', 'https://picsum.photos/640/360?random=1', 'Et quaerat fuga sed voluptate tempora omnis voluptas. Error qui tempora sapiente facilis harum cumque. Autem facere dolores eveniet aut doloribus.', 'Debitis odit quia inventore asperiores rerum. Quis ut quaerat aliquam tenetur ratione animi ipsa et. Eum deleniti qui dolor sint ipsam temporibus atque vel. Aut consequatur placeat dolorum facilis ad facere. Eius inventore architecto consectetur accusantium animi dolor. Consequatur laudantium suscipit et doloribus soluta molestias voluptate. Incidunt consequatur soluta repellendus sed. In velit sit quia molestias iusto molestias. Occaecati facilis velit possimus in accusamus. Architecto impedit sint consequatur facere earum et. Deleniti voluptatem fugit vero assumenda et eveniet. Ut voluptas eaque laboriosam et necessitatibus. Voluptatibus voluptas cupiditate repellat iste. Dolor accusamus autem quam neque est. Accusantium aut quia ullam consequuntur quisquam. Et sit unde sed doloribus rerum ullam qui quibusdam. Qui voluptate dolore asperiores ex quos eos animi. Ipsa reiciendis est quos qui. Minima totam deleniti et ipsam quia in voluptas. Voluptatum alias quasi ut ullam facere officiis. Aut provident omnis ut non doloribus non eos. Consequatur labore illo libero voluptatem quisquam est saepe. Nemo enim dignissimos a necessitatibus qui. Voluptatem pariatur sed quod quia consequatur in recusandae. Sit rerum iusto quia qui. Architecto consequuntur et recusandae ullam alias. Eum accusantium modi aut odio doloremque fugit sit. Ad corporis in at est in. Dolores velit dolores omnis facilis voluptate ut nostrum. Ut est fugit exercitationem eum corporis nesciunt est. Rerum dolorum debitis aperiam unde consequatur aut et. Quia sint voluptatem ut atque dolores molestiae. Est aut blanditiis fugiat est quasi omnis nihil consectetur. Consequatur expedita hic fuga laboriosam natus ducimus rerum. Non aut vel optio similique unde. Placeat aliquam ut aut maxime. Repellat molestiae iste aut sit. Sunt id dolorum ut sequi et ad repellat. Ea ex temporibus minus. Sunt vero harum eius consequuntur suscipit ut iste. Ut maxime omnis sunt cum. Ipsam qui excepturi corrupti et rerum eum qui. Ipsam quis assumenda accusamus sit. Libero placeat illum unde ut necessitatibus esse veritatis libero. Autem eius nemo maiores impedit. Dolorem ut dolores sed quae architecto esse est. Consequatur velit est omnis placeat occaecati. Nulla dolorem rerum impedit tempore corporis accusamus. Sit dolorum consequatur ut sed repudiandae. Cum nihil quis vel molestiae eaque. Iste unde dolorem aut soluta voluptatem est voluptatem. Non velit in quis ipsam. Fugiat quae nihil deserunt. Dolorem tempora a et est atque. Quia aut perferendis natus qui voluptas. Alias sunt sit nihil incidunt praesentium perspiciatis atque a.', 0, 'Murti Gunawan', 'Jarwi Firmansyah', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
(2, 5, 0, 'Veniam Similique', 'veniam-similique', 'https://picsum.photos/640/360?random=2', 'Odit et quo tenetur eaque incidunt accusamus rem. Architecto amet consequatur molestiae optio nemo distinctio. Nihil aut quis cumque enim. Dolor et amet in nisi.', 'Perspiciatis consequatur aut inventore incidunt velit expedita. Adipisci officia impedit omnis maxime. Itaque et earum in est. Est necessitatibus qui quis id nihil doloribus. Corporis provident eos adipisci iusto dolor sunt dolores et. Omnis voluptatum tempore sint aut architecto a saepe sit. Impedit perspiciatis voluptatum voluptates ducimus aut. Non autem magnam est eos rerum optio rem est. Odit maiores provident dolor nobis ut. Voluptas vitae voluptatem ad consequatur. Suscipit ratione sunt commodi. Debitis dolores ea aut porro minus sequi. Et aperiam porro eaque. Ratione dolore iusto ea sunt doloribus assumenda. Dolor aliquid amet ut quo. Non illo porro sunt accusantium tempore qui velit possimus. Rerum aliquam adipisci id ipsa. Vitae accusamus esse rem eos repudiandae. Blanditiis at quo voluptatum sint. Distinctio sit tempora sit sint molestiae consequatur. Ab atque beatae nisi dolores repudiandae minima et tenetur. Fugit et voluptas consequatur rerum. Et soluta sequi aut nemo. Quae ducimus praesentium sed eveniet consequuntur. Aut corporis deleniti repellat praesentium deserunt autem expedita. Quae eum qui minus omnis explicabo possimus. Ut libero fugit eligendi laudantium. Quibusdam iusto tempore dolore corporis. Amet iure nihil et quia dicta enim aut ut. Voluptatem eum vel maiores. Quo assumenda natus rerum quaerat. Eum aliquid libero deserunt ut sint nisi et. Ex pariatur non voluptatibus beatae consectetur. In quia dolor aut officiis provident veniam ipsa eveniet. Sint sit beatae minima eum quis in quisquam. Et doloremque facilis aliquid sit. Magnam harum labore animi quaerat in. Eos quae vitae ullam incidunt facere eos. Magni aliquid qui voluptatem beatae non aut commodi. Et nisi id ducimus amet vero reiciendis soluta. Nihil nihil distinctio sunt nostrum id vel. Labore veritatis quod quia tempora. Harum accusantium sint harum tempore et velit. Mollitia veritatis odit voluptas deserunt. Rem ipsum aut aut eum expedita consequatur. Ea reprehenderit aut omnis vel aspernatur. Et magni voluptatem dolores sit. Ipsum quia qui qui explicabo aut quod. Ab dolore quia aut qui itaque ut ex vitae. Impedit et et corporis doloribus exercitationem et architecto doloremque. Dolorem id sed velit. Aliquid saepe nihil quis aut exercitationem cupiditate sint. Ex rerum consequatur est harum veniam fuga. Nisi dicta natus ut fuga sunt. Voluptas natus ipsa consequuntur in ut. Quibusdam et minus et sequi repellendus quod.', 0, 'Aswani Nugroho', 'Harja Sirait', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(3, 3, 0, 'Quo Voluptatem Provident', 'quo-voluptatem-provident', 'https://picsum.photos/640/360?random=3', 'Similique velit at culpa repellat animi iusto iusto. Eos unde eos ut. Et saepe eius hic autem sit. Ea ea et sit delectus.', 'Eius in voluptas ex necessitatibus et quia voluptas. Reprehenderit omnis ut modi nisi. Et distinctio consequuntur quo illo laudantium vel eum. Quasi esse earum est veritatis sed dolores. Libero perferendis repudiandae autem vel aut magnam. Nisi amet ad eius sapiente ab nemo excepturi omnis. Vel libero quia expedita maiores ex autem. Deserunt magni et nihil in consequatur reprehenderit. Fuga soluta quia consequatur amet eligendi voluptas debitis tempore. Officia rerum deserunt ut voluptatem. Odit totam doloremque alias quia aut. Culpa tempore molestias unde voluptas blanditiis inventore. Officia cumque illum dolor vitae aut numquam illum. Quos quos aut optio sit autem autem quia. Officiis odio omnis veritatis sint aut dicta. Molestiae sed harum quia quia corrupti et. Dolorum eveniet reiciendis sunt voluptates adipisci ut optio voluptatum. Aut neque aut eos ipsum. Necessitatibus omnis omnis rem ab. Quos cumque ut amet id eum aut expedita. Beatae et quo aliquam id maiores est tempore rerum. Quia itaque eum ut ducimus eum. Culpa quibusdam eligendi adipisci quia earum quas rerum. Eius error quae beatae alias. Numquam magni et quaerat qui blanditiis. Maiores nesciunt non velit porro dolores explicabo nemo. Quasi necessitatibus incidunt dolor iste est est debitis. Dicta minima eum et est. Cumque quidem et dolores. Alias asperiores velit consequatur id officia. Itaque velit nobis culpa quae delectus qui. Dolore magni dolor pariatur eum provident. Iste ut doloribus recusandae nobis ex. Voluptatibus iusto consequuntur architecto mollitia. Culpa ipsa distinctio nostrum est autem ut quo recusandae. Explicabo nihil aspernatur consequatur impedit voluptas. Quisquam temporibus deleniti ut. Ea aspernatur blanditiis non impedit ratione. Dolor autem soluta odit velit.', 0, 'Ika Yuliarti', 'Hilda Yulia Mandasari S.Sos', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(4, 7, 0, 'Aut Est Aut', 'aut-est-aut', 'https://picsum.photos/640/360?random=4', 'Officiis ducimus excepturi mollitia modi quia. Et tempora aut dolore enim sunt numquam. Nemo tenetur molestiae deserunt repudiandae est.', 'Pariatur sed voluptates delectus nobis. Voluptas iste autem rerum sed autem. Assumenda omnis explicabo voluptatem ut velit. Nostrum provident voluptatibus voluptate iusto. Itaque saepe dolores quisquam aut. Ut velit et laborum placeat soluta dicta. Ipsum ex aut quam. At repellat rerum qui ut mollitia unde. Nisi nihil ducimus commodi inventore consequuntur. Est recusandae molestiae autem nostrum voluptatem eum ea. Quia eum itaque aut aliquam. Qui sed repellat sed nobis temporibus. Deleniti sit a quidem quia quisquam culpa. Voluptas tenetur aliquam illo facilis. Aut incidunt dicta sunt optio. Corrupti quae et laudantium nihil. Temporibus aut recusandae fuga quae eligendi. Corrupti porro in consectetur optio et. Eos totam numquam aut ratione numquam veniam ea. Est repudiandae fuga quia maxime expedita. Velit repellat accusamus quo eius cumque et. Sit eaque non architecto quaerat ut optio cumque. Voluptatem quia maxime molestiae sit quis.', 0, 'Wani Tari Kuswandari M.Farm', 'Ismail Hutasoit S.Pd', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(5, 2, 0, 'Hic Est Est Qui', 'hic-est-est-qui', 'https://picsum.photos/640/360?random=5', 'Aut voluptates praesentium odio deleniti. Harum quam accusantium ut tempore numquam mollitia amet. Nihil dolorem sed provident.', 'Maxime harum nisi tenetur voluptatem minus. Fugit qui quia et qui. Similique eveniet libero et sed. Iure consequuntur impedit ut quo. Doloremque a sit distinctio. Voluptatem enim in occaecati maxime aut nemo. Rerum adipisci quia voluptas perspiciatis id dolore. Et neque error ea aut impedit dolorem. Repellat rerum quis omnis sed. Et ex nisi assumenda. Omnis ab minima et voluptas. Unde adipisci consequatur accusantium aut est est odit distinctio. Et expedita tempora reprehenderit ab nostrum cumque aut. Accusamus et error expedita porro ad et est. Rerum sapiente rerum amet. Qui corporis et placeat accusantium. Labore est unde ut laudantium. Vero omnis tempora ut provident. Sit at aspernatur deleniti qui quod et. Distinctio aut et voluptates non in cupiditate adipisci placeat. Neque perspiciatis architecto qui. A sunt accusamus quos aspernatur autem consectetur ex. In dolorum praesentium corporis enim esse blanditiis. Aspernatur reiciendis in officiis quo quia aut animi tenetur. Voluptas rem voluptate provident est et cumque. Vel ex in molestiae. Ut sequi eos quisquam quaerat et porro. Id reprehenderit rem non eveniet cupiditate minima rerum maiores. A nisi asperiores rerum molestiae et nisi quaerat. Omnis ut voluptatibus facilis quam nihil et. Hic non suscipit voluptas sed harum. Excepturi repellendus neque molestiae et voluptas nostrum. Eos molestias quo esse ab cupiditate. Accusamus rerum aperiam perspiciatis quia alias repellat occaecati. Et quibusdam ut placeat ut enim et hic. Qui cum aliquam explicabo repellat sint nam aut. Quo nemo ut facilis itaque perferendis aut sed. Sapiente voluptatem quia laboriosam labore ab. Cum ea minima totam iusto vitae quis. Sed provident eum accusantium ullam. Amet atque deleniti velit velit qui minima fuga. Eaque in voluptas soluta a velit mollitia. Aut consequatur sed assumenda consequatur suscipit consequuntur ut voluptatem. Vel possimus architecto ab doloribus ut. Vitae labore impedit ipsum quo adipisci quasi. Quia aliquid iure ducimus possimus voluptatem non id nemo. Et qui placeat tempore vel ea. Velit molestiae aut adipisci. Laboriosam amet consequuntur perferendis adipisci. Sit molestiae ratione temporibus quia at. Sunt vitae ullam incidunt autem. Unde dolores velit odit aut ut. Nisi sed dolor velit earum vitae. Illum provident nemo rerum corporis et. Quae omnis eum molestiae et. Voluptatem libero aut ipsam voluptatum. Enim vel voluptatem consequatur mollitia ut odio magnam omnis. Exercitationem sint libero qui. Animi sit rerum commodi at dolor. Beatae qui omnis voluptate adipisci ipsum mollitia reiciendis. Deserunt sed necessitatibus ut in id voluptatem eos suscipit. Culpa quia saepe qui voluptatem eaque consectetur. Fugiat voluptas fugiat quam. Tempore et provident in architecto corrupti molestias in. Facere voluptas aut aliquid.', 0, 'Hartaka Latupono S.Psi', 'Mustofa Sihombing', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(6, 4, 0, 'Aut Voluptatem Excepturi Ipsa', 'aut-voluptatem-excepturi-ipsa', 'https://picsum.photos/640/360?random=6', 'Deleniti doloremque sint pariatur nobis veritatis aspernatur. Quis natus ab eum corrupti. Numquam illum illum voluptatem consequuntur.', 'Recusandae qui a eligendi sed temporibus. Exercitationem similique dicta placeat quo. Culpa in quia voluptatum omnis. Sit necessitatibus quam qui omnis iure non. Exercitationem ut consequatur et temporibus rerum libero ab. Dolore quia quisquam magni totam dolor voluptate modi. Ullam sit consequatur quo soluta non. Dolores error quod a qui iure harum odio. In inventore sed praesentium tempore magnam eos. Amet dicta quisquam est. Et accusamus perspiciatis ab unde est sapiente dolor. Neque placeat minima cupiditate dolorem. Et molestias aliquam optio et sed magni porro voluptatem. Harum dolor est qui molestias et eius. Nesciunt rerum error saepe. Consequatur quaerat ea voluptate. Consequatur aut officia quos voluptate voluptatem. Consequatur fugit nesciunt quis animi ut. Et et corporis ducimus voluptatem. Sit et a tempore doloribus tenetur sed.', 0, 'Ina Handayani', 'Oliva Andriani M.Pd', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(7, 9, 0, 'Distinctio Error Et', 'distinctio-error-et', 'https://picsum.photos/640/360?random=7', 'Est eius molestiae adipisci hic consequuntur maiores id. Aliquid ipsa laudantium sed accusamus.', 'Recusandae maiores quisquam et voluptate fugiat. Culpa et facere facilis repellendus illum deserunt qui. Inventore voluptatem ut doloribus commodi. Rerum modi quam odit sunt aliquid sequi voluptatem. Pariatur expedita dolore asperiores accusantium et nobis. Est est soluta magnam libero est deleniti. Iure hic quaerat ea. Eveniet doloribus expedita enim dolores in. Fugit molestiae voluptatibus illo nihil. Qui eaque quidem aliquam et dolores a corrupti. Perspiciatis officiis rerum quis recusandae odit modi occaecati quia. Aut velit ipsa accusantium eum non laudantium omnis. Vero officia expedita pariatur tempora aliquam quibusdam commodi autem. Voluptas aut laboriosam eius reprehenderit illo. Ut eos et cumque quis voluptas. Quam explicabo qui ullam facilis rem aut qui. Eum est accusantium aspernatur accusamus voluptas quaerat qui officia. Necessitatibus tempore et rerum maiores quibusdam velit velit. Quod facilis esse id illo aut. Ex saepe asperiores repellat laboriosam. Alias voluptas dolor non suscipit ad cumque ut. Quia totam placeat facilis assumenda et a eaque ex. Mollitia dolorem accusamus totam sit consequatur. Qui veniam praesentium ipsam ad ex aut laudantium. Possimus dolore dolor hic distinctio eligendi impedit. Quisquam soluta doloremque neque voluptas. Quaerat enim id nostrum totam unde modi ut dicta. Sed officiis ad aut culpa porro voluptatem repellat. Architecto quod et harum nobis aut. Laborum autem eveniet et. Impedit nesciunt odio officiis quis delectus. Quam eveniet facere quod veritatis. Quae vel velit eum voluptatem. Dolor dolorem voluptatem veniam modi cumque qui est quis. Similique quam et velit porro reprehenderit deleniti non. Aut dolore molestiae in. Quas hic nobis cupiditate nobis quo. Necessitatibus laboriosam consequatur voluptatem odio. Et est animi et harum eaque dolore. Quis molestiae et pariatur. Cum incidunt dolores similique sunt. Facilis illum ut numquam quod sit et ut. Quia et voluptates facilis officia et aliquid. Consequuntur maxime voluptatem ipsam quisquam rerum distinctio voluptates id. Ea maxime magnam ex aspernatur. Illo molestias sed cum eos. Ducimus ipsa non repellat rerum nam provident soluta. Id nisi facilis quod fuga omnis.', 0, 'Asirwada Sinaga M.M.', 'Makara Galur Prabowo', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(8, 7, 0, 'Nobis Iusto', 'nobis-iusto', 'https://picsum.photos/640/360?random=8', 'Fugit laborum non sed error unde est necessitatibus. Facere eveniet voluptatem numquam ipsum dicta nesciunt. Veniam unde natus qui ea impedit. Ut occaecati ut reiciendis ad quia.', 'Voluptatem et quasi fuga eligendi. Vitae aut enim sint dolorum nihil vero. Vel itaque iusto mollitia enim dolores ea ut dicta. Libero possimus exercitationem est accusantium natus quibusdam nesciunt. Doloribus sint quasi itaque eaque. Vitae similique expedita animi voluptatem beatae. Maiores nihil doloremque sed excepturi reiciendis. Et doloremque esse vel blanditiis numquam dolor. Reiciendis adipisci vero dolores aperiam molestiae. Sequi enim quos consectetur et. Modi ratione sit assumenda necessitatibus. Voluptas id officia repellat nesciunt velit est. Harum dolorem sit provident sint fuga sed est exercitationem. Fugit quia ipsum libero in asperiores qui quas autem. Eum possimus omnis aperiam aut consequuntur. Aut laborum placeat animi voluptatibus rerum quisquam sed maxime. Veniam vitae saepe dolorem doloribus doloremque possimus maiores doloremque. Sit autem eius odit quis perspiciatis enim ea qui. Aliquam corporis non voluptas et. Ducimus iure veniam quidem quo. Alias sint quia praesentium error alias et. Enim asperiores necessitatibus culpa aut. Explicabo adipisci est fuga recusandae. Officiis numquam esse aut ullam fugit eos.', 0, 'Fathonah Ida Laksmiwati', 'Amelia Nasyidah', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(9, 9, 0, 'Non Qui Cum', 'non-qui-cum', 'https://picsum.photos/640/360?random=9', 'Vitae et qui vitae numquam quam. Quia ut et voluptatibus. Ut voluptatibus voluptatem quibusdam explicabo dolorum laborum. Enim hic accusamus non sint voluptates.', 'Similique sed placeat aut at quo molestias quo officia. Occaecati quasi consectetur nisi repellendus blanditiis voluptatem qui. Maiores quis velit mollitia. Dolorem odit eos hic alias omnis. Minus eum rerum velit labore distinctio earum. Officiis maiores aspernatur aliquam tempora doloremque molestiae quis. Quas expedita et provident laborum dolorum. Dicta ex dolorem iusto natus quos eum ut. Tempore et culpa est rerum eligendi exercitationem consectetur. Magni est deleniti sequi rerum nobis libero nisi. Dignissimos dicta enim dolores velit sunt. In minus magni mollitia et. Ducimus et beatae voluptates magni. Reiciendis qui eius est sed pariatur in. Quis aut quibusdam voluptatem non rerum autem. Sit consequatur culpa ullam quae culpa. Ut dignissimos et illo porro. Facilis ab sed consequatur maxime id aut modi. Nesciunt at saepe eum quam cum expedita aut. Dolore libero dolorem temporibus praesentium veritatis. Id repellendus quaerat minus. Dolorem dolorem unde culpa suscipit rerum ut maiores. Quam occaecati voluptas consequatur. Ut itaque recusandae explicabo suscipit amet iste commodi. Maxime eius doloremque voluptas debitis. Quia maiores quia dolor porro beatae commodi. Quam molestias eligendi est necessitatibus exercitationem dicta dicta. Eos ad quia modi nesciunt quos. Qui quidem sint eius qui. Modi magni libero et qui voluptatem error dolorem. Est expedita repellat nisi accusamus quod. Aut magnam sunt excepturi voluptatum veniam. Totam est autem vitae sit quia quia molestiae. Eligendi consequatur laudantium eius nihil. Laboriosam inventore vel molestias voluptatem magni est. Consequatur distinctio quia omnis. Voluptatem eum sint iusto distinctio. Nisi facilis at rerum facilis. Sit est dolorem et cum. Et non nobis error quo. Aut voluptas libero eius. Et quasi qui ex. Ad excepturi et et sed vitae esse hic. Ea voluptas nihil dignissimos doloremque vero.', 0, 'Harja Hasan Utama', 'Okto Saefullah', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(10, 1, 0, 'Sint Aut Praesentium', 'sint-aut-praesentium', 'https://picsum.photos/640/360?random=10', 'Ut quae accusantium laudantium ut voluptas eum. Nulla porro provident nesciunt omnis odit. Est dolore aspernatur harum velit occaecati. Qui ea sed sequi neque qui voluptatem et.', 'Consequuntur vel et ex nesciunt ut quidem. Fugit iusto architecto earum eos suscipit sunt. Nam magnam asperiores in cupiditate quia rerum. Autem voluptatum consequatur maiores assumenda. Ab sunt voluptatem expedita accusantium qui ex id. Molestias debitis possimus consequuntur quibusdam odio itaque. Consequuntur voluptatum sequi ut quibusdam. Et voluptas veritatis id doloremque mollitia sequi. Quia ea molestiae molestiae autem beatae amet necessitatibus. Nihil quisquam ex fuga consequuntur optio exercitationem odit. Totam voluptates fuga quia reprehenderit. Expedita ducimus laudantium non aspernatur pariatur. Quia tempora iusto eveniet laboriosam et enim. Consectetur saepe voluptas cum assumenda necessitatibus sunt. Autem fuga mollitia possimus omnis ea accusantium. Voluptas ut neque doloribus. Quam ut eligendi deserunt est odio facilis enim. Labore et recusandae et velit quod quibusdam qui laboriosam. Impedit velit animi autem explicabo est sit similique ducimus. Voluptas tempore omnis et quae optio magnam architecto voluptas. Eos iusto beatae maxime autem eos minus eaque corrupti. Unde earum et praesentium optio doloremque quia id consequatur.', 0, 'Virman Uwais M.M.', 'Tasnim Hasta Pradipta M.Ak', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(11, 2, 0, 'Exercitationem Nisi', 'exercitationem-nisi', 'https://picsum.photos/640/360?random=11', 'Velit dolorem velit facere tempore. Laudantium voluptate dolorum aperiam quo non tempore aperiam. Sapiente autem aliquam ullam unde cumque fuga.', 'Aut perferendis est id ab ducimus. Non unde reiciendis eveniet labore accusamus. Quibusdam tempore cumque odio voluptas quisquam. Quam in doloribus earum aut. Maxime ut rem placeat cupiditate quas modi et voluptatem. Occaecati quia optio eveniet quo et et molestias. Unde occaecati facilis nisi possimus. Placeat numquam occaecati quod sed sapiente omnis dolor. Et quia eos est eos. Quas iure deleniti nulla est rerum ullam. Illo cupiditate sapiente velit dolorem dolorum omnis. Sint error commodi qui eum. Possimus consequatur necessitatibus illo porro. Eaque distinctio quis est laboriosam quia officiis. Laborum accusamus dolore modi aut. Sit ut amet rerum. Laudantium minus ea perspiciatis iure nostrum. Debitis quas velit accusantium aperiam et. Et provident corrupti porro ipsam. Dolorum est aut qui animi aut. Ab minus quae nostrum rem reprehenderit et. Omnis porro saepe neque repudiandae. Sequi eius eos reprehenderit voluptatibus est qui odio. Blanditiis qui aspernatur quia doloremque consequatur quia. Mollitia non saepe assumenda asperiores enim aut. Sapiente aperiam corrupti tempore quis quaerat nisi. Quae saepe maiores voluptatem est accusamus. Impedit expedita aut velit omnis alias exercitationem. Dicta omnis aut quia voluptatem. At a omnis similique est voluptas voluptas eos qui. Voluptas similique nemo sapiente est occaecati et. Autem ut tempore velit ex velit. Temporibus iure harum hic mollitia. Dolorum cupiditate ipsam fugit possimus exercitationem saepe molestiae. Dolor incidunt sint officia aut.', 0, 'Warsa Wacana M.Ak', 'Kania Pudjiastuti', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(12, 7, 0, 'Est Accusamus', 'est-accusamus', 'https://picsum.photos/640/360?random=12', 'Corporis ab provident quos illo id veniam. Sint facilis sunt vel a quo labore. Exercitationem est quam quo dolorem sed asperiores.', 'Earum necessitatibus ipsa consequatur. Tempore quo et soluta dolorum unde nam ullam. Totam reprehenderit repudiandae qui commodi. Incidunt commodi sed vel quidem explicabo eius et. Aut enim adipisci nulla laudantium eaque possimus earum voluptatem. Quas et quisquam voluptas facilis. Fugit dolores ut odit. Nam laudantium perspiciatis quia fuga consequatur animi quo. Dolor saepe enim accusamus nostrum. Omnis commodi impedit tempora vel eius vitae nam. Fugit quis at nihil velit. Ea vel sint veniam. Culpa natus sunt quidem enim quis. Perspiciatis rerum consectetur facilis voluptate omnis iusto. Aut saepe id qui ullam et eveniet architecto. Facere porro laborum aperiam neque officia animi accusantium. Sit laboriosam ut esse expedita. Et natus ea pariatur eos inventore cum. Et ea enim voluptatem nam fugiat quia. Occaecati et molestiae quod deserunt veritatis officia non. Ea dolor vel cumque voluptatem. Molestiae aut tempore at saepe quia. Enim similique explicabo hic necessitatibus et. Excepturi quas accusamus sint possimus. Sit ratione reprehenderit error sint dolorum voluptatem. Non dolor et repellendus dicta. Asperiores vel ea temporibus quia. Blanditiis delectus accusamus placeat. Sunt perspiciatis repellat laborum vel quas totam. Expedita maiores eligendi autem voluptatem deserunt eum enim. Dolore velit libero enim perferendis et cumque quas necessitatibus. Nostrum unde dolores sit earum non rerum. Aut laudantium velit labore molestias voluptatem error. Sequi dolor repellendus autem maxime quaerat. Voluptas corporis voluptatibus vel error nulla. Esse quidem cum magni.', 0, 'Jarwa Galiono Simbolon S.Ked', 'Nasrullah Sirait', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(13, 7, 0, 'Nulla Distinctio Et Corrupti', 'nulla-distinctio-et-corrupti', 'https://picsum.photos/640/360?random=13', 'Inventore odio numquam maiores nam voluptatem accusamus reiciendis. Ea vel nesciunt dolor commodi. Vel accusamus possimus dolorem eligendi.', 'Perferendis fugiat temporibus rerum maiores. Quos odit dolores ut earum culpa expedita consequatur aspernatur. Ea atque veritatis in consequuntur voluptate. Corrupti praesentium et quia mollitia doloremque. Numquam perspiciatis natus voluptas fuga fugiat voluptas. Qui quasi deserunt non veritatis voluptatem eum et exercitationem. Ullam qui aut quaerat consequatur quae ab excepturi. Quidem eos qui aspernatur quo voluptatum rerum voluptas et. Esse pariatur in ducimus ut sunt iste. Est accusantium voluptatem odit ut quos rerum aut. Vel cum autem fuga sunt. Et eius ullam earum ut ipsum. Maiores possimus consectetur sit modi. Dolor excepturi sunt exercitationem quis voluptatem. Id earum distinctio ipsum excepturi amet. Laboriosam totam magni aut incidunt natus aut. Excepturi sunt voluptas delectus doloribus sunt sunt. Omnis fuga et quos rem assumenda ut. Aut optio sed repudiandae. Blanditiis omnis voluptate porro architecto. Eligendi amet quo officiis dolorum. Eum facere amet ipsam illo numquam quod quo. Ipsa est in eveniet nihil aut vitae earum. Aut nemo error voluptates nihil. Rerum sunt ullam exercitationem. Iure dicta reiciendis debitis exercitationem molestiae. Et minima qui possimus voluptatem quas rerum. Enim molestias velit ut et voluptate veniam ex rerum. Voluptates corporis alias et totam voluptatem culpa. Quae officia dolorum sit quos neque. Quis magni rerum dignissimos maxime exercitationem. Ipsam corporis est ut fuga animi laborum. Veritatis omnis autem facilis. Odit rerum voluptatibus accusantium corrupti exercitationem. Libero non neque voluptas ratione perferendis. Exercitationem et nemo eveniet cupiditate non quis. Voluptas delectus aliquam non voluptas porro ipsum. Beatae porro ab ad soluta quaerat numquam sunt quisquam. Quam et nostrum aliquam corporis modi ut. Dolorem vitae sint consequuntur saepe minima. Aut quaerat optio sunt aut. Aut minus sint occaecati numquam perspiciatis vel. Labore facilis quis amet a dolor. Et itaque non alias doloremque quisquam aut natus.', 0, 'Martani Kanda Wacana', 'Amelia Kuswandari', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(14, 7, 0, 'Qui Dolorem Quaerat Rem', 'qui-dolorem-quaerat-rem', 'https://picsum.photos/640/360?random=14', 'Omnis animi temporibus quia asperiores doloremque suscipit saepe et. Delectus earum sint fugiat aliquam deleniti perspiciatis tempore. Quaerat iusto rerum odit porro. Aut incidunt et deserunt.', 'Dolorem illum quaerat animi. Eligendi optio aliquid nisi nisi dolorum nesciunt. Soluta necessitatibus modi perferendis praesentium. Dicta et et ut reiciendis quisquam et et temporibus. Et aut tenetur odio laudantium est ut temporibus. Dolorem quam ut earum reiciendis ratione. Perferendis ipsam soluta veniam qui eum. Voluptatem cum quis minima ipsam dolorem beatae. Inventore omnis non dolorem et asperiores ipsa alias quia. Et saepe deleniti recusandae vitae. Perferendis odit doloremque sint est culpa laudantium dolor sit. Excepturi consequatur corporis eveniet iusto voluptatem vel non assumenda. Pariatur magni fugiat et et delectus laboriosam quo ut. Aperiam aperiam vero maiores enim ut. Dolores ad dicta impedit quia laboriosam ipsum. Porro aut cupiditate aliquam qui error cumque. Quaerat molestiae aperiam vitae consequatur voluptatum quas officiis. Sunt debitis quisquam eius ex nesciunt nobis. A enim doloribus minus voluptas necessitatibus. Non fuga totam dolorem iste velit dolorem atque. Non molestiae perspiciatis sit ut. Veritatis itaque perspiciatis laudantium et est ex. Rem nostrum nihil quis nemo. Facere saepe praesentium sed ipsam ratione aut molestias voluptatem. Dolore illo voluptatem sed laboriosam autem voluptatem molestiae eos. Commodi unde ducimus repellendus consequatur aliquid non ea. Et deleniti hic ut itaque blanditiis repellendus. Labore magnam consectetur incidunt tenetur in. Id consectetur eum illo ipsa. Ex laudantium non harum impedit.', 0, 'Irnanto Tarihoran', 'Febi Melani M.TI.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(15, 6, 0, 'Maxime Sit Quis', 'maxime-sit-quis', 'https://picsum.photos/640/360?random=15', 'Quasi rerum quia ea. Similique porro cum est ratione. Iste fugiat nihil consequatur assumenda quo quia. Iure laudantium dignissimos eligendi numquam ut corporis eos molestiae.', 'Animi culpa quibusdam neque voluptates consequatur. Consequatur eum rerum dolorem aut. Nobis exercitationem facilis possimus dolorem. Porro sapiente omnis qui rerum occaecati cupiditate. Qui omnis optio expedita cum rem rerum itaque occaecati. Neque quas quia voluptatem officiis vel rerum totam. Fugit est optio deserunt dolorem possimus et. Iure iure eveniet quis rerum qui. Ea molestiae ut consequuntur quia tempore est neque eos. Ex quia voluptatem voluptatum praesentium doloribus. Quisquam nostrum vel quia consequuntur quae et quod. Aperiam a repellendus et vel. Dolorem fugiat et doloremque. Aut voluptas pariatur ipsa est amet. Fugiat possimus debitis quasi sed blanditiis. Eligendi sed alias qui reiciendis dolorem nobis. Consequatur dolore magni exercitationem illum doloribus voluptatem. Quia nemo saepe accusamus rerum nam. Porro rerum odio magni eius praesentium error magnam. Rerum ratione voluptatem aut ut. Voluptate facilis quibusdam dolores magnam omnis dolore ut. Ullam totam ab dolore et ullam veniam. Est et ullam dignissimos beatae sed earum maxime. Delectus dolorem beatae numquam nisi. Aliquam qui asperiores blanditiis fugit distinctio iusto aut. Pariatur dolor autem doloribus autem ex omnis omnis optio. Dolorem maiores repudiandae hic animi minima ad. Aut ipsum velit soluta beatae. Et officia dolore mollitia. Quos quis quo fuga recusandae molestiae cupiditate perspiciatis. Laborum est numquam asperiores at quibusdam atque. Dolor et aut magnam dignissimos. Voluptates beatae in omnis id voluptates modi. Repudiandae eos voluptates ab tempora et quis. Ut vitae in et corrupti et sed.', 0, 'Violet Belinda Nuraini', 'Kenes Waskita', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(16, 3, 0, 'Distinctio Earum Quos Sit', 'distinctio-earum-quos-sit', 'https://picsum.photos/640/360?random=16', 'Qui quaerat sed aut sapiente. Optio corrupti quidem temporibus aliquam repudiandae.', 'Rem quo vel delectus voluptas in. Nihil quas numquam ipsa in voluptas est sint. Inventore magni quam quo unde minima ut. Voluptatem doloremque repellat eveniet. At porro dolor rem quaerat sunt. Id eum eveniet quo voluptas mollitia sequi doloribus. Laborum voluptatibus voluptatum sint nihil deleniti blanditiis fuga. Qui deleniti voluptate ut quaerat totam error. Modi eum sapiente soluta vel. Enim facilis dolor vel molestiae ad. Voluptatibus vero ipsa recusandae ut pariatur aliquid omnis. Vel placeat occaecati ipsam consequatur. Sunt voluptatum dolorem aut harum autem. Provident natus earum omnis ullam possimus. In dolorem dolor praesentium placeat. Autem voluptatem culpa debitis qui culpa accusamus quos. Necessitatibus aut id voluptatem natus quis est amet sint. Distinctio recusandae sunt quis nesciunt autem necessitatibus quas. Totam minus iusto consequuntur dolores explicabo totam. Ex doloribus assumenda vel harum beatae quae tenetur rerum. Non explicabo unde eum quasi nulla facilis qui. Eum ea sit cumque perspiciatis ea esse. Accusantium non totam et. Corporis voluptatem saepe veniam dolorem ratione sunt. Qui molestiae praesentium aliquam et saepe temporibus consequuntur consequatur. Esse eos eius qui nesciunt. Aut consequatur culpa id est id. Sed ut reiciendis impedit doloribus quia iusto. Tempora qui laboriosam cumque ut aut. Enim maxime est cum et impedit. Unde quia eaque fuga repellendus harum. Ut perferendis et ducimus ea soluta aut. Non ipsa ea ut architecto. Omnis non velit dolorum explicabo nihil sunt beatae consequatur. Unde eum odio aperiam quo neque. Ab rem et ratione blanditiis. Accusantium porro ab dolorem veniam saepe hic. A non fuga omnis explicabo qui qui. Minus a quidem ut sed voluptas labore dolore mollitia. Neque nihil sunt eligendi eum perspiciatis odio. Cumque sapiente dolores voluptatem qui. Quidem quos impedit quo tenetur laboriosam. Voluptas sed tempore quod reiciendis et odit beatae. Consequatur earum omnis dolor quia. Culpa quod architecto harum. Harum molestiae laborum sint voluptas ratione aut ad. Quidem quia dolores occaecati nisi quos quam. Laboriosam est cupiditate laborum et voluptatem voluptate officiis. Nulla explicabo et non eum facere autem. Quas voluptatem consequatur architecto unde et. Neque quod numquam mollitia quis nihil voluptatum exercitationem. Nulla mollitia non aut nulla distinctio. Veritatis qui assumenda rem alias. Qui voluptatem ea accusantium. Mollitia consequatur quam earum qui unde nesciunt. Quaerat facilis eveniet quos. Quasi repellendus veniam dolore labore quam et eum. Qui voluptatem voluptate quasi eaque. Velit velit quam laudantium molestiae quaerat sed quibusdam. Possimus voluptas id deserunt facilis.', 0, 'Ismail Siregar', 'Paris Shania Safitri M.Ak', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(17, 3, 0, 'Corporis Id Perspiciatis', 'corporis-id-perspiciatis', 'https://picsum.photos/640/360?random=17', 'Et quis saepe ea ex non velit expedita. Et recusandae quo alias maxime ab. Ut porro sunt maiores et ut tempore. Aliquid aspernatur facilis accusantium itaque laudantium laborum.', 'Harum excepturi animi et modi. Eum ipsum esse sequi ullam quae placeat voluptatem aut. Aut exercitationem iusto quas rem. Reprehenderit distinctio excepturi quod maiores similique. Eveniet consectetur aliquam est qui minima itaque quo. Tempore maxime at dolorem sit voluptates aut. Nostrum illo quasi qui quod repellat accusantium cupiditate. Dolorem et est nobis hic ipsum temporibus culpa. Veritatis unde autem et at voluptas earum. Accusamus maxime dolor molestiae ea. Rerum voluptatem beatae repellat et. Est perferendis ducimus sit. Beatae voluptatem aut fugit nesciunt. Eum asperiores ad eum et sequi. Ratione ullam veniam delectus est quia. Aut ab adipisci ea. Saepe et provident et labore soluta ea. Doloremque odit amet aut voluptatum dolores id incidunt. Error repellat officia pariatur aut labore est debitis. Nam et ad architecto repudiandae. Aut est fugit deleniti voluptate ad voluptas. Non dolorum ullam suscipit est expedita. Commodi quidem molestias quam alias qui et accusamus. Beatae ea rerum ut sequi doloribus eaque. Consectetur iure veritatis dolor. Quia quia ipsa nemo ut assumenda. Eos exercitationem et voluptatem ut adipisci provident accusamus. Id aut rem dolores possimus nemo et ut. Labore explicabo et hic quo. Voluptatem alias sint qui ducimus fugiat saepe fuga a. Voluptas quidem culpa rerum explicabo. Neque maxime in eaque ut alias aut sed eligendi. Facilis qui fugit sit doloremque enim. Architecto sit quia voluptatibus aliquam culpa. Eveniet esse soluta repellat ducimus consequatur dicta deserunt. Ea labore quos iste similique sint omnis. Dolor nemo rerum fugit impedit temporibus voluptatem provident. Quis architecto exercitationem qui commodi. Cupiditate omnis consequatur sequi veritatis qui. Minima neque doloremque iste quis commodi. Vitae et debitis saepe aut et officia quisquam. Quisquam eos perspiciatis vel impedit explicabo quod voluptatem. Vitae rerum voluptas reprehenderit accusantium deserunt tempore. Aspernatur et assumenda recusandae deleniti aut quis. Dicta cupiditate accusamus natus aspernatur. Dolorum possimus dolor iure aspernatur sit officiis. Dolor ipsa nulla blanditiis et. Pariatur fugiat alias aliquid est ea qui consequatur. Eveniet suscipit mollitia numquam temporibus omnis. Mollitia perferendis suscipit quasi fuga labore iusto ut. Qui enim eaque iure consequatur assumenda omnis non. Nihil ipsam labore sunt nulla. Fugit itaque numquam illo doloribus natus. Quibusdam aut natus est molestiae omnis ea vel maxime. Ipsa neque sed qui et accusamus error impedit. Eius architecto beatae ullam sequi aut. Vel autem nihil autem culpa deleniti ullam ullam numquam. Labore error repellat suscipit totam optio ut. Labore possimus ex officia natus ut sed quos. Asperiores voluptate sint est dolore cumque eius nostrum quia. Voluptates ducimus nesciunt dignissimos cum dolore.', 0, 'Padmi Zelda Kusmawati S.Psi', 'Yulia Anggraini', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(18, 4, 0, 'Fugit Sint Aut', 'fugit-sint-aut', 'https://picsum.photos/640/360?random=18', 'Aut beatae ab eligendi earum et. Omnis aut vel rem ab omnis atque sequi eveniet. Ea eum quibusdam odit id dolorem a tenetur. Quod repellendus qui et quia at qui.', 'Facilis atque sit qui magni autem nemo rerum consequatur. Quod ducimus qui aliquam at aut. Accusantium animi adipisci similique dolorum sit. Officiis adipisci aliquid et distinctio tempore autem. Ut molestias laborum asperiores eos distinctio alias. Officia molestias dolore vitae consectetur velit alias et. Mollitia doloribus sapiente ut aut accusamus corporis repellat. Quaerat aut possimus et ut qui quas nihil. Adipisci repellendus aspernatur cupiditate cupiditate. Amet fuga deleniti tempora qui autem dolorem. Accusantium expedita ut quia rerum. Autem nam excepturi architecto consequatur ducimus sed et blanditiis. Aut aut et sequi perferendis minima et eos. Ut natus excepturi inventore aperiam est nisi. Qui quisquam voluptas modi ut eum. Excepturi voluptas quam itaque omnis aut. Tempore voluptates in aliquam ab repellendus aut. Saepe nostrum quia et inventore ab fugiat odio. Quis animi quae rem dolor dolor. Eius aut et sit. Et quis voluptatem alias. Est temporibus occaecati possimus quia. Sit quos molestiae ad qui non aut maxime accusantium. Aspernatur ea eos et velit dicta quas. Molestiae est delectus distinctio ut. Accusamus est consequatur atque et doloremque et. Voluptatem est aliquam est nulla nam corrupti. Eius consequatur consequatur voluptatem eaque. Tempore aut ex quibusdam magnam voluptatem animi. Atque voluptatem consequatur quis. Accusamus error quae debitis quas dolorum. Aut consectetur numquam minus qui accusamus qui. Dignissimos quis est occaecati non. Ut sit est et qui qui odit et. Dolorem consequatur quisquam error. Et fugit reiciendis dolor ipsam rem laboriosam quia. Sint eos ut pariatur et molestiae eius. Et sed magnam et et tempore. Qui impedit expedita ut excepturi aliquid nisi id consequuntur. Eligendi provident possimus excepturi quo qui. Sunt a repellat qui temporibus impedit excepturi. Vero rerum eveniet nihil consequuntur eum. Omnis eum incidunt cupiditate sed dolorum. Et perspiciatis mollitia maxime est. Consequatur ullam cumque hic est aspernatur et.', 0, 'Langgeng Gangsa Prasetya', 'Rahayu Agnes Yulianti S.I.Kom', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(19, 5, 0, 'Provident Occaecati Velit Veniam', 'provident-occaecati-velit-veniam', 'https://picsum.photos/640/360?random=19', 'Id cupiditate est voluptas natus sequi commodi eum. Autem voluptas impedit sit enim. Animi et est dolorum nihil enim.', 'At minima cumque voluptatem architecto laudantium. Blanditiis nesciunt repudiandae explicabo delectus animi. Quaerat optio quod vitae veniam eum in. Modi cum facilis reprehenderit harum aut earum eius et. Reiciendis est dolor tenetur rem. Odio soluta saepe est qui vel. Ea et et et. Corrupti vel eveniet ipsum omnis voluptate. At consequatur nesciunt facilis aut quas exercitationem. Fugit excepturi ipsa dolore enim et id. Laboriosam sed ut sunt voluptate architecto. Suscipit voluptate unde velit perspiciatis suscipit ab. Odio est nostrum totam fugiat consequuntur. Nobis dolores dignissimos libero minus. Dolore eius minima officia eius. Et earum at sit ea nihil. Consectetur atque qui amet delectus veritatis. Deserunt enim architecto sed delectus doloremque. Quibusdam dolorem sequi et. Rem dignissimos ipsum possimus eum nemo. Distinctio sit esse dolor labore ad voluptates corporis quas. Aliquid voluptatibus aut soluta id. Dolor adipisci pariatur ut. Amet necessitatibus recusandae maxime delectus qui. Voluptatem animi eligendi nam sit qui doloribus vel. Officia ad cupiditate aperiam ut qui labore. Quod pariatur saepe eum quae.', 0, 'Kenes Sihombing', 'Cemeti Maulana', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(20, 1, 0, 'Illum Quasi Magnam Et', 'illum-quasi-magnam-et', 'https://picsum.photos/640/360?random=20', 'Quia debitis amet veritatis provident nobis ea soluta. Maxime similique laudantium quo officia soluta. Molestiae et neque deserunt facilis commodi nihil fugiat.', 'Voluptas earum nobis assumenda et dolore voluptas ea. Repellendus voluptatem optio id. A rerum in ipsum veritatis consequatur ut sint maiores. Sapiente tempore minima at omnis temporibus cum vitae. Est eligendi dolores omnis quia corporis. Quod sit voluptatem non velit illum non est esse. Impedit non et pariatur architecto incidunt odit. Eos quidem voluptatem est reprehenderit consequatur debitis veniam. Occaecati aut vero consectetur vero omnis. Reprehenderit ut nihil voluptatem voluptatem non dolores debitis. Amet optio laborum quod ut deserunt ab incidunt assumenda. Suscipit voluptatem beatae autem pariatur dolores. Sequi vel nihil nihil et earum nam quis. Natus sapiente impedit placeat modi iure dolor. Iste aliquam ut quo et eaque aliquam quam. Impedit eaque in commodi ea quis. Nesciunt odit ut nostrum voluptatem quas. Soluta officia nemo earum quis cumque dolorum quia. Error consequuntur consequatur est. Ut tenetur eaque quae accusamus voluptatem. Sed deserunt asperiores perferendis deleniti esse enim. Aut enim et consequatur et asperiores animi veniam. Cum maiores recusandae corporis repellat. Rem eveniet distinctio omnis ex nostrum sed quis. Eum ducimus quod quo aut et. Impedit aperiam temporibus autem enim. Facilis nisi hic et iste fugit ipsa quidem. Harum in beatae impedit illo. Doloremque quisquam unde error odit. Repudiandae fuga ipsa vitae iusto quia nihil sequi.', 0, 'Ikin Narpati S.E.I', 'Indra Cemeti Firmansyah M.Kom.', '2023-05-24 18:21:38', '2023-05-24 18:21:38');

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favorited` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_21_114406_create_categories_table', 1),
(6, '2023_03_21_160118_create_courses_table', 1),
(7, '2023_04_25_095013_create_quizzes_table', 1),
(8, '2023_05_21_184642_create_favorites_table', 1),
(9, '2023_05_23_131602_create_activities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Published','Draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  `time_limit` bigint(20) DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `course_id`, `name`, `status`, `time_limit`, `added_by`, `last_edited_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Voluptate Id Omnis', 'Published', 1253, 'Warsita Zulkarnain S.Ked', 'Mahdi Candra Wacana S.IP', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
(2, 2, 'Veniam Similique', 'Published', 1853, 'Waluyo Pradana', 'Kala Galar Sitorus S.Pd', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(3, 3, 'Quo Voluptatem Provident', 'Published', 1991, 'Gaiman Dacin Salahudin S.Ked', 'Heru Surya Wijaya', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(4, 4, 'Aut Est Aut', 'Published', 1666, 'Puti Utami S.I.Kom', 'Karman Wasita', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(5, 5, 'Hic Est Est Qui', 'Published', 1028, 'Martaka Saefullah', 'Jaga Cemeti Natsir', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(6, 6, 'Aut Voluptatem Excepturi Ipsa', 'Published', 1583, 'Siti Fitriani Kuswandari S.Psi', 'Sarah Nasyidah', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(7, 7, 'Distinctio Error Et', 'Published', 1737, 'Harto Bagus Nababan', 'Kasiran Marpaung', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(8, 8, 'Nobis Iusto', 'Published', 1831, 'Aslijan Respati Wibowo S.E.I', 'Humaira Mayasari', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(9, 9, 'Non Qui Cum', 'Published', 1931, 'Kamidin Ardianto', 'Prima Wibowo M.TI.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(10, 10, 'Sint Aut Praesentium', 'Published', 1880, 'Harto Gunarto', 'Vicky Hasna Mulyani', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(11, 11, 'Exercitationem Nisi', 'Published', 1427, 'Aris Wasita', 'Lurhur Sitompul', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(12, 12, 'Est Accusamus', 'Published', 1919, 'Asirwada Hidayat', 'Ivan Narpati', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(13, 13, 'Nulla Distinctio Et Corrupti', 'Published', 1063, 'Himawan Adriansyah', 'Jaiman Bagiya Sihombing S.E.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(14, 14, 'Qui Dolorem Quaerat Rem', 'Published', 1456, 'Gasti Puspasari', 'Julia Padmasari S.Pd', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(15, 15, 'Maxime Sit Quis', 'Published', 1701, 'Kezia Jamalia Haryanti', 'Heru Sitompul', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(16, 16, 'Distinctio Earum Quos Sit', 'Published', 1439, 'Citra Melani', 'Rafi Aswani Haryanto S.Farm', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(17, 17, 'Corporis Id Perspiciatis', 'Published', 1456, 'Kala Lazuardi', 'Zahra Rahimah', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(18, 18, 'Fugit Sint Aut', 'Published', 1414, 'Kani Nurdiyanti S.Pd', 'Kalim Digdaya Maheswara M.M.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(19, 19, 'Provident Occaecati Velit Veniam', 'Published', 1009, 'Fathonah Cinta Susanti S.Gz', 'Zulaikha Dalima Oktaviani', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(20, 20, 'Illum Quasi Magnam Et', 'Published', 1206, 'Fitriani Kasiyah Yolanda', 'Catur Irwan Hutapea M.Pd', '2023-05-24 18:21:38', '2023-05-24 18:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_answers`
--

INSERT INTO `quiz_answers` (`id`, `quiz_question_id`, `answer`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'Accusamus voluptatem molestiae labore.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(2, 1, 'Quis harum eum optio.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(3, 1, 'Quo sint sunt est.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(4, 1, 'Neque unde consequuntur dolorem.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(5, 2, 'Qui qui quo quaerat ut cumque et.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(6, 2, 'Rerum velit et non voluptas minima.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(7, 2, 'Ipsum vel in animi ad sed libero.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(8, 2, 'Et error voluptatem animi quod.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(9, 3, 'Id et repellat sunt earum doloremque.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(10, 3, 'Sit doloribus dolorum accusantium est.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(11, 3, 'In totam ullam velit aut soluta vero.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(12, 3, 'Est quas vitae praesentium rerum.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(13, 4, 'Architecto quis a quis perspiciatis numquam.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(14, 4, 'Quis quod maxime officia qui et.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(15, 4, 'Molestiae laborum in sapiente aut ut ut quis.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(16, 4, 'Voluptate neque veritatis autem impedit.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(17, 5, 'Sint est in et.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(18, 5, 'Ipsum vel autem aut nulla iusto.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(19, 5, 'Sequi consectetur quae maiores.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(20, 5, 'Illum quas consequuntur cupiditate blanditiis.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(21, 6, 'Ea nihil enim odio occaecati sed dicta.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(22, 6, 'Labore fugit qui voluptas natus explicabo.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(23, 6, 'Vero numquam incidunt qui dolore.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(24, 6, 'Sunt et vero esse sit fugit.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(25, 7, 'Suscipit aliquam voluptas earum temporibus ut.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(26, 7, 'At neque et quae.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(27, 7, 'Ut tempora eveniet et et illum.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(28, 7, 'Ut numquam ut laboriosam iste dolor dolores quia.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(29, 8, 'Minus deserunt incidunt explicabo qui.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(30, 8, 'Debitis non eaque et est.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(31, 8, 'Veritatis quaerat dolorem quo ipsam voluptas.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(32, 8, 'Quas ex ipsa praesentium rerum magni tempora aut.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(33, 9, 'Iusto voluptatibus ut optio et omnis.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(34, 9, 'Est quia sed occaecati.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(35, 9, 'Soluta qui officia quia incidunt.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(36, 9, 'Animi rerum et nesciunt ab omnis.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(37, 10, 'Sint aut sed molestiae sint id harum.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(38, 10, 'Placeat magni ut praesentium consequatur non.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(39, 10, 'Ipsa qui id eos molestiae ut.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(40, 10, 'Nesciunt a vel quia est iste ut.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(41, 11, 'Tempora mollitia ad rerum vitae aliquid.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(42, 11, 'Velit fuga nihil et repudiandae laborum ad odio.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(43, 11, 'Cum fuga est qui facere incidunt est voluptatum.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(44, 11, 'Rerum officia vel itaque harum id non.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(45, 12, 'Consequatur exercitationem nihil voluptas et.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(46, 12, 'Vitae et aut rerum qui corrupti repellat veniam.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(47, 12, 'Qui corrupti repellat id dolorem.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(48, 12, 'Aut nulla sit quis hic dolorum et non.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(49, 13, 'Et saepe quasi praesentium occaecati.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(50, 13, 'Alias ipsa amet blanditiis.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(51, 13, 'Ullam quo et et itaque eaque ut quae.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(52, 13, 'Enim fugit sit perspiciatis.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(53, 14, 'Nesciunt quos eos eaque omnis velit id.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(54, 14, 'Maiores ratione facere voluptatum nobis.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(55, 14, 'Molestiae voluptatem est soluta magni nihil.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(56, 14, 'Molestiae qui veniam enim aut aspernatur ab.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(57, 15, 'Sunt eaque pariatur qui minima facilis sed.', 0, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(58, 15, 'Ipsam ad vitae asperiores eaque.', 1, '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(59, 15, 'Repellat assumenda suscipit sunt quo.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(60, 15, 'Nihil pariatur distinctio placeat.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(61, 16, 'Quo atque provident dolores sint.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(62, 16, 'Laboriosam aut non rerum est enim qui.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(63, 16, 'Non autem rerum eos quam. Cum qui hic iusto qui.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(64, 16, 'Maxime distinctio vero qui sunt ad.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(65, 17, 'Delectus aut quae aut rerum libero.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(66, 17, 'Qui dolor omnis ea quis inventore quam et.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(67, 17, 'At molestiae dolor distinctio molestias.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(68, 17, 'Maiores libero neque enim debitis quisquam quia.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(69, 18, 'Distinctio ad ut libero sed.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(70, 18, 'Quia cumque aspernatur eos quasi perspiciatis.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(71, 18, 'Unde aut aut ipsam necessitatibus et.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(72, 18, 'Quo aut mollitia unde eos voluptatem perferendis.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(73, 19, 'Est vel harum et et.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(74, 19, 'Ea placeat dolor laudantium dolores at.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(75, 19, 'Suscipit atque delectus ut aut odit.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(76, 19, 'Qui praesentium maxime praesentium consequatur.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(77, 20, 'Ea beatae enim odio et.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(78, 20, 'Possimus eius qui harum aut.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(79, 20, 'Iure ut voluptatem impedit reiciendis.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(80, 20, 'Nam sint ratione ea.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(81, 21, 'Animi et expedita voluptatem explicabo.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(82, 21, 'Quod nam minima dignissimos et consequuntur.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(83, 21, 'Et culpa minima vel dolorem aspernatur.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(84, 21, 'Iusto voluptatum ipsam quibusdam iure voluptas.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(85, 22, 'Molestiae est quaerat est quis unde asperiores.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(86, 22, 'Magni in aliquid illum temporibus molestias.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(87, 22, 'Dicta rerum perferendis et officia quidem et.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(88, 22, 'Eaque officiis magni nisi non sunt quaerat.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(89, 23, 'Modi possimus quibusdam aut porro non tempora ut.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(90, 23, 'Ab aut qui expedita eos.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(91, 23, 'Minima est et eligendi sit veniam non.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(92, 23, 'Vitae sed quaerat ea quo ut culpa.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(93, 24, 'Quis ut alias et.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(94, 24, 'Illum officiis enim nulla ab ut laborum eaque.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(95, 24, 'Quidem nihil quam incidunt sit.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(96, 24, 'Maxime at sed veniam amet tempora.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(97, 25, 'Tempore fugiat in reiciendis veniam quia.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(98, 25, 'Ipsam et perferendis fugit eos commodi.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(99, 25, 'Et quo ratione molestiae.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(100, 25, 'Aliquam quas rem impedit quod laudantium.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(101, 26, 'Sapiente est quis qui architecto veritatis et.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(102, 26, 'Iusto eligendi eaque distinctio dolorum.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(103, 26, 'Aut nihil voluptatem velit omnis totam.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(104, 26, 'Delectus officia nobis perferendis perferendis.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(105, 27, 'Aut quidem ut aut vel iusto.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(106, 27, 'Pariatur quaerat optio aut repellendus.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(107, 27, 'Officia vitae eos et explicabo aut.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(108, 27, 'Sed quibusdam commodi ipsum.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(109, 28, 'Nulla corporis aut sed fugit aut eaque.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(110, 28, 'Deserunt alias asperiores illo.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(111, 28, 'Tenetur dolorem voluptate quas ut.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(112, 28, 'Omnis est dolor non sit.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(113, 29, 'Iste ipsam dignissimos corrupti et sunt.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(114, 29, 'Minus suscipit at qui voluptatum illum.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(115, 29, 'Suscipit fugit animi repellat enim.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(116, 29, 'Ex assumenda facere expedita commodi repellendus.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(117, 30, 'Error commodi sapiente voluptas earum.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(118, 30, 'Ipsam reiciendis adipisci provident sed.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(119, 30, 'Non et dignissimos expedita sit iure quia.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(120, 30, 'Saepe ducimus quia dicta ipsa iure consequatur.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(121, 31, 'Ab explicabo sed rerum rerum similique.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(122, 31, 'Et autem incidunt et.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(123, 31, 'Repudiandae non sunt aut.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(124, 31, 'Ipsam adipisci ut molestiae minima ut.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(125, 32, 'Eligendi vitae voluptatum amet quia.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(126, 32, 'Qui esse commodi reprehenderit.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(127, 32, 'Qui enim enim inventore voluptas.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(128, 32, 'Omnis ut eum voluptatum rerum deserunt fuga.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(129, 33, 'Nihil et quam debitis quia fugiat.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(130, 33, 'Quidem molestias et odit possimus et.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(131, 33, 'Animi illum et consectetur a.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(132, 33, 'Numquam nam ut facilis ut error voluptas.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(133, 34, 'Sed ut deserunt sunt.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(134, 34, 'Ut dolor praesentium eaque sit.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(135, 34, 'Excepturi dicta ipsum dolor est.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(136, 34, 'Dicta id voluptas hic. Et quos harum unde alias.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(137, 35, 'In architecto animi sit magnam asperiores ut.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(138, 35, 'Nisi dolorum ut impedit.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(139, 35, 'Sed nihil ullam minus et magni.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(140, 35, 'Harum qui facere dolore non.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(141, 36, 'Et voluptas animi velit maiores et.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(142, 36, 'Commodi a dolorem eaque.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(143, 36, 'Accusantium numquam enim ut sed et earum.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(144, 36, 'Sint exercitationem quisquam laborum et.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(145, 37, 'Aut a ex aut est eum molestiae temporibus.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(146, 37, 'Odit culpa at omnis ut.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(147, 37, 'Dignissimos modi cumque maxime ea repudiandae.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(148, 37, 'Quos in et corporis atque odio fugiat.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(149, 38, 'Itaque natus earum neque consequatur enim.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(150, 38, 'Maiores illum et temporibus.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(151, 38, 'Itaque sit ea laboriosam et ut velit quis.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(152, 38, 'Dolorum nesciunt eum consectetur eius doloribus.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(153, 39, 'At voluptatibus dicta blanditiis.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(154, 39, 'Eius quis aspernatur et.', 1, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(155, 39, 'Libero maxime culpa neque quod sequi facere.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(156, 39, 'Excepturi excepturi vel ut quis eligendi eos.', 0, '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(157, 40, 'Et voluptatem eligendi fugit ratione.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(158, 40, 'Fuga sit quidem qui numquam hic id maiores.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(159, 40, 'Incidunt recusandae est non at aut repudiandae.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(160, 40, 'Aliquam mollitia atque nam veniam eius aut.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(161, 41, 'Quis voluptate aut numquam.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(162, 41, 'Exercitationem facere reiciendis cum non et.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(163, 41, 'Dolor in enim dolores nihil.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(164, 41, 'Eius modi inventore ut illo velit in voluptas.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(165, 42, 'Reiciendis eum quia qui fugiat incidunt.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(166, 42, 'Dolorum minus sed sunt placeat et quia optio.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(167, 42, 'Iusto eveniet modi nihil reiciendis.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(168, 42, 'Laborum quo vitae non et mollitia.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(169, 43, 'In commodi enim neque sed excepturi.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(170, 43, 'Aut suscipit et explicabo quae.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(171, 43, 'Facilis id quam ut minima illum.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(172, 43, 'Quia aut reprehenderit magni quo ipsa.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(173, 44, 'Vero quam eveniet est maxime quos ipsam officiis.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(174, 44, 'Veritatis vel mollitia dolor inventore.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(175, 44, 'Placeat similique aliquam id quidem neque.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(176, 44, 'Praesentium et nam maiores laborum adipisci.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(177, 45, 'Ea unde vitae ipsum reiciendis rerum odit earum.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(178, 45, 'Omnis sed qui a repellendus et dolor sunt sit.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(179, 45, 'Illum unde non consequatur ut.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(180, 45, 'Sed ut distinctio rem est iure.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(181, 46, 'Nemo labore et qui asperiores.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(182, 46, 'Ipsa laboriosam unde velit suscipit autem vitae.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(183, 46, 'Ut dicta nam blanditiis.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(184, 46, 'Sequi ut quis quidem officia facilis hic ut.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(185, 47, 'Ipsa maxime ducimus eius commodi.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(186, 47, 'At laborum soluta vero beatae velit repudiandae.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(187, 47, 'Qui ex possimus enim et perspiciatis veniam ut.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(188, 47, 'Aut vel ipsam aperiam quia.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(189, 48, 'Doloribus beatae ea quod ad omnis eaque autem.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(190, 48, 'Molestiae perferendis cumque non voluptatem et.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(191, 48, 'Pariatur et at itaque tempore.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(192, 48, 'Suscipit molestiae eligendi quis voluptatem.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(193, 49, 'Voluptatem sequi consequatur culpa quam est.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(194, 49, 'Saepe eum inventore distinctio velit nesciunt.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(195, 49, 'Temporibus quaerat autem quos voluptas.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(196, 49, 'At beatae dolorum distinctio officia.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(197, 50, 'Ullam autem totam a ducimus repellendus.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(198, 50, 'Quis consequatur aut quia aspernatur vel dolores.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(199, 50, 'Minus soluta quasi explicabo voluptas aspernatur.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(200, 50, 'Velit aut omnis maiores est at harum.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(201, 51, 'Quas impedit accusantium est amet quis vitae.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(202, 51, 'Laborum alias minima cupiditate.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(203, 51, 'Odit delectus reiciendis id officia quaerat.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(204, 51, 'Sed aut est est vitae illum quidem.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(205, 52, 'Ut est eaque quia quia.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(206, 52, 'Quam non molestiae doloribus consequatur.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(207, 52, 'Voluptas blanditiis et est velit possimus.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(208, 52, 'Nulla rerum molestiae molestias alias.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(209, 53, 'In libero voluptatem tenetur earum voluptas sit.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(210, 53, 'Sed perferendis expedita quaerat autem.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(211, 53, 'Fuga ut sit accusantium.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(212, 53, 'Minus rerum et sapiente veniam quisquam.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(213, 54, 'Modi eum expedita at tempora hic iure.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(214, 54, 'Sed quia dolores possimus sint sequi hic.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(215, 54, 'Rem illum saepe sit doloribus quo deleniti.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(216, 54, 'Quo nam itaque incidunt ab sit doloribus qui.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(217, 55, 'Iusto ullam dolorem ea aut assumenda odit.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(218, 55, 'Sunt quisquam aut alias minima.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(219, 55, 'Laboriosam omnis suscipit quo quia enim eius cum.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(220, 55, 'Consectetur dolore iusto et et.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(221, 56, 'Voluptatum sed quasi quae eos.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(222, 56, 'Numquam facere sint dicta amet sed voluptatibus.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(223, 56, 'Rerum voluptatem sed repellat non inventore.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(224, 56, 'Assumenda quasi nulla saepe ab et dolores ipsam.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(225, 57, 'Ab tenetur voluptatem incidunt.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(226, 57, 'Odio debitis dicta sit.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(227, 57, 'Autem sint culpa quisquam similique optio ut eos.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(228, 57, 'Eaque quia est id. Ipsam quis mollitia similique.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(229, 58, 'Similique illo rerum est libero et omnis.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(230, 58, 'Inventore in harum quo ipsum.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(231, 58, 'Dolores distinctio est quas perspiciatis.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(232, 58, 'Est et unde est quo vitae.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(233, 59, 'Ut consectetur et molestias enim autem.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(234, 59, 'Sunt error cumque soluta consectetur.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(235, 59, 'Ullam debitis nam impedit molestias.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(236, 59, 'Minima perspiciatis labore vel et iure.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(237, 60, 'In rerum perferendis velit nostrum.', 1, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(238, 60, 'Quidem mollitia enim ea dolorum ex commodi sed.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(239, 60, 'Quidem explicabo quam quo a.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(240, 60, 'Dicta quisquam eveniet velit eveniet.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(241, 61, 'Molestiae quo nesciunt est dignissimos cum.', 0, '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(242, 61, 'Vel nihil iusto quis nihil corrupti.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(243, 61, 'In rerum quaerat in eaque.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(244, 61, 'Et sed omnis magnam.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(245, 62, 'Temporibus magni aut labore mollitia.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(246, 62, 'Minus eligendi inventore optio facilis.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(247, 62, 'Quos dignissimos ipsum amet ad.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(248, 62, 'At consequuntur sequi porro commodi.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(249, 63, 'Exercitationem quos ullam ea eum a dolor.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(250, 63, 'Facilis consequatur fugiat eaque libero.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(251, 63, 'Voluptas tenetur dolore sed explicabo ut.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(252, 63, 'Eum autem eaque ratione.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(253, 64, 'Sunt delectus consequatur nihil.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(254, 64, 'Quidem possimus dicta dolorum est expedita dolor.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(255, 64, 'Quae quod debitis nisi voluptas.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(256, 64, 'Quam in suscipit libero sed iure.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(257, 65, 'Consequatur ex aspernatur sapiente.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(258, 65, 'Ea et sint a.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(259, 65, 'Est esse nihil tenetur voluptatem aut.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(260, 65, 'Enim ea sit enim eligendi error neque sit.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(261, 66, 'Et soluta veritatis tempora tempore nobis et est.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(262, 66, 'Eos non et eveniet omnis omnis sit.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(263, 66, 'Soluta accusantium ipsa corporis repudiandae.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(264, 66, 'Eius deserunt autem architecto fugiat omnis.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(265, 67, 'Rerum debitis accusamus accusamus voluptatem et.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(266, 67, 'Sit consequatur iure velit voluptates.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(267, 67, 'Neque inventore laudantium ut quod dolor.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(268, 67, 'Unde et sapiente nulla animi possimus et.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(269, 68, 'Eos est repellat aut.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(270, 68, 'Iusto id id autem.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(271, 68, 'Quaerat enim ad est iure.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(272, 68, 'Porro illo dolor facere.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(273, 69, 'Ea dolore rerum et aut et facere.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(274, 69, 'Dolorum rerum ut facilis.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(275, 69, 'Assumenda quia voluptate quaerat error.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(276, 69, 'Eos quae ullam nihil repellat optio.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(277, 70, 'Est rem magni non repellat.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(278, 70, 'Et voluptas explicabo amet natus.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(279, 70, 'Et iure magnam corporis est qui.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(280, 70, 'Minima quia harum vero iste.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(281, 71, 'Occaecati voluptatem aut hic quas.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(282, 71, 'Quia velit quia vel atque officiis aliquid culpa.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(283, 71, 'In sed quia temporibus.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(284, 71, 'Placeat eaque quo sit perferendis.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(285, 72, 'Fugit ut sit qui.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(286, 72, 'Voluptatem facilis sit velit autem et cum.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(287, 72, 'Sint voluptas illum aut rerum est nemo et est.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(288, 72, 'Culpa eum cumque soluta est totam provident sit.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(289, 73, 'Quae repudiandae dolorem corporis ut.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(290, 73, 'Nam officia ratione culpa tempora nam.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(291, 73, 'Rerum magni delectus ratione accusamus.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(292, 73, 'Commodi sunt voluptas minima sed eveniet eos.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(293, 74, 'Sunt nulla quaerat officiis omnis explicabo id.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(294, 74, 'Eos ut qui veniam veniam atque adipisci.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(295, 74, 'Atque officiis odit et labore aut.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(296, 74, 'Aut voluptatum voluptas et facilis totam.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(297, 75, 'Facere atque est tenetur ut voluptatem nemo.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(298, 75, 'Enim aperiam unde ex.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(299, 75, 'Temporibus ab ut quia magni voluptatem.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(300, 75, 'Voluptatem dolore aliquid sed.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(301, 76, 'Est omnis ut rem aut.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(302, 76, 'Esse quae enim dolore enim voluptatum est.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(303, 76, 'Magnam magnam tenetur sed autem.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(304, 76, 'Sequi et consequatur aspernatur quia doloribus.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(305, 77, 'Rem blanditiis voluptas et alias.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(306, 77, 'Quis reiciendis quam ad tempora.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(307, 77, 'Veritatis porro accusantium modi dolore neque.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(308, 77, 'Accusamus neque non nulla.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(309, 78, 'Ut repellendus libero consequatur neque.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(310, 78, 'Est dolore adipisci dolor distinctio.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(311, 78, 'Est et quae laboriosam et eius laudantium quia.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(312, 78, 'Dignissimos et nam quod quaerat est.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(313, 79, 'Rerum nam officia vel voluptate quia.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(314, 79, 'Veniam quo sint debitis placeat nisi qui.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(315, 79, 'Quia nam quis qui exercitationem.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(316, 79, 'Maxime voluptas suscipit saepe ipsum.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(317, 80, 'Corrupti voluptatem neque excepturi.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(318, 80, 'Aut sit illum nisi.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(319, 80, 'Officiis eius atque sint est exercitationem qui.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(320, 80, 'Labore velit ut impedit hic.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(321, 81, 'Et consectetur cum adipisci quis.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(322, 81, 'Amet et dolores omnis facilis fuga.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(323, 81, 'Illum vel suscipit consequatur minus ipsam in.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(324, 81, 'Corporis ut sequi non.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(325, 82, 'Quia ipsum consequatur repellendus cupiditate.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(326, 82, 'Sunt unde aut et sequi.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(327, 82, 'Molestiae quod deleniti ea ipsam consequatur.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(328, 82, 'Et modi voluptate mollitia.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(329, 83, 'Voluptatem nostrum et inventore.', 1, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(330, 83, 'Est tempore quo commodi nemo laudantium ex.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(331, 83, 'Neque iusto quasi et vel.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(332, 83, 'Aut ut labore tempora quos corrupti iste ut.', 0, '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(333, 84, 'Dignissimos tempora quia ducimus.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(334, 84, 'Omnis deleniti aliquid eos libero.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(335, 84, 'Unde quia minima est sint.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(336, 84, 'Beatae ea et iste rerum quis.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(337, 85, 'Rerum qui sint et veniam qui sit pariatur aut.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(338, 85, 'Suscipit et corporis quia hic.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(339, 85, 'Qui et voluptatum omnis eveniet qui.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(340, 85, 'Nemo fuga suscipit eum ut quam et sint.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(341, 86, 'Rerum tempora veniam et dicta dolorum.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(342, 86, 'Et neque saepe cumque voluptatem nihil.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(343, 86, 'Eum at aut optio et amet rerum.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(344, 86, 'Sit architecto ratione ut ullam ullam nulla.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(345, 87, 'Deleniti nobis ducimus natus ut aliquid ut unde.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(346, 87, 'Porro delectus eius aut et neque quis ea hic.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(347, 87, 'Laudantium velit rem sapiente.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(348, 87, 'Et suscipit perspiciatis est similique.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(349, 88, 'Labore aspernatur nihil cupiditate.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(350, 88, 'Nesciunt dolore sed itaque aut.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(351, 88, 'Animi distinctio cumque eos ut assumenda rerum.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(352, 88, 'Sapiente praesentium est assumenda ipsa labore.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(353, 89, 'Temporibus voluptatem doloremque quasi veniam.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(354, 89, 'Asperiores dolor illo doloribus omnis.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(355, 89, 'Numquam unde et pariatur omnis magnam.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(356, 89, 'Unde et voluptas amet dolorum.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(357, 90, 'In autem cupiditate labore ullam fugiat quia.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(358, 90, 'Animi commodi eum consequuntur quos et.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(359, 90, 'Dolore magnam nulla est doloremque animi.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(360, 90, 'Iure in ad architecto ea.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(361, 91, 'Amet vel sequi mollitia aut.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(362, 91, 'Porro ut iure et totam ea velit.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(363, 91, 'Neque soluta iusto qui doloremque.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(364, 91, 'Delectus fugiat amet ipsum laboriosam et.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(365, 92, 'Nobis qui nobis facere qui ducimus.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(366, 92, 'Libero a aut in cupiditate sint.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(367, 92, 'Aut aut expedita pariatur.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(368, 92, 'Nihil eaque quas molestias quia incidunt sint.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(369, 93, 'Ut voluptates tenetur inventore.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(370, 93, 'Commodi necessitatibus aut cumque ut.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(371, 93, 'Et corporis consequuntur unde et.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(372, 93, 'Ut voluptas sapiente fugiat eos.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(373, 94, 'Distinctio quis reprehenderit quis.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(374, 94, 'Ut in ipsum quod dolor.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(375, 94, 'Sit eum facilis cum et.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(376, 94, 'Sed quae quidem quia nulla ut esse.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(377, 95, 'Dolores sunt labore ea id dolorum.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(378, 95, 'Qui expedita velit qui.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(379, 95, 'Quae illum aut numquam culpa dolores repellendus.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(380, 95, 'Eligendi odit omnis non quia.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(381, 96, 'Sint est fugit quibusdam inventore.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(382, 96, 'Aut quod odio occaecati veritatis error totam.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(383, 96, 'Temporibus enim molestias sunt vel.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(384, 96, 'Doloribus fuga ad est sunt explicabo.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(385, 97, 'Quo fuga minus distinctio velit eligendi omnis.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(386, 97, 'Nihil ipsa voluptatem tempora.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(387, 97, 'Et hic illum qui delectus quis aut.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(388, 97, 'Repellat ratione qui unde ex molestias sed.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(389, 98, 'Laborum quae aut consequatur dolorem vel.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(390, 98, 'Reprehenderit vitae dolores perspiciatis.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(391, 98, 'Aliquid est voluptas et voluptatem debitis.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(392, 98, 'Et aut atque saepe ex minima hic consectetur.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(393, 99, 'Minus est excepturi omnis assumenda voluptas ut.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(394, 99, 'Minus esse enim necessitatibus.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(395, 99, 'Dolores et odit facilis deserunt qui.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(396, 99, 'Fugit et vitae quia temporibus quia eligendi.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(397, 100, 'Voluptas quibusdam ullam voluptatem ea unde ea.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(398, 100, 'Asperiores quisquam accusamus quam est eos nihil.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(399, 100, 'Qui rem minima nemo qui.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(400, 100, 'Ex eveniet vel veniam ratione perspiciatis vel.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(401, 101, 'Et culpa quia nobis rerum neque voluptatem.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(402, 101, 'Accusantium omnis hic aut.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(403, 101, 'Neque ut a iure perspiciatis commodi sequi.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(404, 101, 'Sit est odio nobis dolor.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(405, 102, 'Consequatur quisquam iure aut aspernatur velit.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(406, 102, 'Nulla enim qui pariatur vitae qui ut.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(407, 102, 'Nesciunt explicabo sit nihil ab vel.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(408, 102, 'Autem fuga amet accusamus nam.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(409, 103, 'Quo qui voluptatem commodi nihil neque.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(410, 103, 'Incidunt id magnam sit provident.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(411, 103, 'Distinctio aliquid consectetur aut.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(412, 103, 'Voluptas ea enim commodi vel dolores sint et.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(413, 104, 'Molestias eos voluptatum quia velit.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(414, 104, 'Consequuntur vel incidunt eos rerum.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(415, 104, 'Ea tenetur doloribus quidem nulla.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(416, 104, 'At et assumenda libero quam.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(417, 105, 'Repellat consectetur eligendi ipsa tempora.', 1, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(418, 105, 'Doloremque perferendis enim error vel eos.', 0, '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(419, 105, 'Totam ut eveniet reiciendis velit ab.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(420, 105, 'Possimus quia ducimus inventore nobis.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(421, 106, 'Cupiditate quis sed est ut aut aut.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(422, 106, 'Corporis consequuntur qui corporis odit.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(423, 106, 'Cupiditate minima similique eum qui sed maxime.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(424, 106, 'Nisi maiores ut expedita et.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(425, 107, 'Eaque ut cumque saepe vitae.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(426, 107, 'Excepturi aliquam nemo iusto est voluptas at.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(427, 107, 'Ut nesciunt nobis distinctio reprehenderit nobis.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(428, 107, 'Eveniet est incidunt non deleniti.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(429, 108, 'Vitae est quia deserunt.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(430, 108, 'Nam praesentium est numquam labore a ea.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(431, 108, 'Cum enim voluptas voluptatem.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(432, 108, 'Dolor temporibus non qui omnis ducimus sint.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(433, 109, 'Quod ad aut doloremque qui dicta quibusdam.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(434, 109, 'Ipsum error a rerum inventore consequuntur sit.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(435, 109, 'Nemo reprehenderit sunt sit et fuga ut atque.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(436, 109, 'Sunt cumque repudiandae explicabo porro sequi.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(437, 110, 'Ratione in et omnis omnis.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(438, 110, 'Sit dolor atque quos.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(439, 110, 'Quisquam quidem est placeat dolorum eligendi ab.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(440, 110, 'Consequuntur nisi unde qui.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(441, 111, 'Accusamus at est et ut quos sequi.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(442, 111, 'Aut nulla magni illum.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(443, 111, 'Aliquam quae minima alias reprehenderit.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(444, 111, 'Fugiat sapiente aut quos necessitatibus nihil.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(445, 112, 'Alias voluptatum doloremque itaque non quas.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(446, 112, 'Reprehenderit hic eos beatae natus vel laborum.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(447, 112, 'Aut sed ipsam vel harum odio harum.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(448, 112, 'Repellat voluptas deserunt dignissimos et.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(449, 113, 'Eligendi quia adipisci accusantium.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(450, 113, 'Cumque a in delectus odio et ipsum.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(451, 113, 'Nostrum eveniet illum qui illo dolor ut.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(452, 113, 'Repellendus mollitia rerum non eius dolorum.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(453, 114, 'Animi quos et ea eum.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(454, 114, 'Ipsum a id aspernatur quasi minus.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(455, 114, 'Id inventore eum tenetur velit ut.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(456, 114, 'Ut fugit dolores quo. Aut quidem eum et sed.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(457, 115, 'Et et animi qui nulla autem adipisci asperiores.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(458, 115, 'Itaque voluptatem maiores ex quo quis rem rerum.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(459, 115, 'Nisi molestiae non unde iure.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(460, 115, 'Commodi possimus aut aspernatur autem.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(461, 116, 'Labore voluptatum hic tenetur id sed.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(462, 116, 'Vero ipsa aut aliquam qui nihil et.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(463, 116, 'Reprehenderit dolorem et est sint.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(464, 116, 'Culpa voluptatem et nesciunt quo.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(465, 117, 'Eos atque sint non quia velit.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(466, 117, 'Id voluptatem sunt occaecati nihil.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(467, 117, 'Eum harum nihil est iure adipisci ab neque.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(468, 117, 'Cum quisquam aut eaque nihil.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(469, 118, 'Possimus ut et ut. Alias ut sunt consequatur.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(470, 118, 'Odio quo rem porro ea tempore.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(471, 118, 'Eveniet quo perferendis quidem in.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(472, 118, 'Rerum consectetur quasi dicta deserunt.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(473, 119, 'Esse laudantium aut assumenda sed.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(474, 119, 'Mollitia numquam exercitationem dolorem.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(475, 119, 'Omnis et laudantium architecto debitis eius ipsa.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(476, 119, 'Est quia quisquam illum.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(477, 120, 'Neque ea fugit et blanditiis voluptatum.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(478, 120, 'Voluptas qui accusamus ullam fuga excepturi.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(479, 120, 'Placeat natus nihil eos rem et et aut.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(480, 120, 'Sit cumque quidem aut nihil dolore soluta.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(481, 121, 'Eveniet dolorum et eum nihil.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(482, 121, 'Quia est animi ad repellendus et omnis libero.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(483, 121, 'Qui omnis et nemo a deserunt impedit ea.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(484, 121, 'Fugit culpa assumenda ut nihil odio in.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(485, 122, 'Sapiente officiis et corporis sit ullam.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(486, 122, 'Aut soluta totam et reiciendis non cum id.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(487, 122, 'Aspernatur voluptatibus sunt hic modi et.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(488, 122, 'Earum culpa reprehenderit nulla in quia ut.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(489, 123, 'Id accusantium cum voluptas est ea.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(490, 123, 'Cupiditate tempora fugit necessitatibus.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(491, 123, 'Sit sed eligendi illum dolores voluptas est.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(492, 123, 'Dolor hic molestias ut nulla enim est.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(493, 124, 'Ea sit fugit cumque porro libero voluptas.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(494, 124, 'Rem reiciendis iure laboriosam eos ab distinctio.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(495, 124, 'Quisquam quam vel quia dolores.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(496, 124, 'Et eaque maxime qui earum occaecati.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(497, 125, 'Error dolorem ut totam.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(498, 125, 'Aut aperiam asperiores ut ea eaque labore.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(499, 125, 'Illo inventore provident consequatur et.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(500, 125, 'Accusantium sapiente eum est deserunt magni.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(501, 126, 'Recusandae vel non sed ducimus.', 1, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(502, 126, 'Est nulla earum itaque.', 0, '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(503, 126, 'Reiciendis voluptatem iste voluptatem.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(504, 126, 'Nobis quasi pariatur eveniet.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36');
INSERT INTO `quiz_answers` (`id`, `quiz_question_id`, `answer`, `is_correct`, `created_at`, `updated_at`) VALUES
(505, 127, 'Nihil enim odit accusamus sit nisi voluptas.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(506, 127, 'Quasi consequatur ut delectus amet nulla.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(507, 127, 'Sed officiis in nihil doloremque provident.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(508, 127, 'Velit qui consequatur dolor repellendus ducimus.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(509, 128, 'Tempora nemo cumque dolorem facere repellendus.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(510, 128, 'Tenetur quia quia corrupti praesentium.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(511, 128, 'Sint quas magnam fugit ullam.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(512, 128, 'Et eligendi aut odit quidem recusandae.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(513, 129, 'Aut quidem est laudantium.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(514, 129, 'Labore aut nihil odit repudiandae.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(515, 129, 'Hic et quisquam sint eius dolore.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(516, 129, 'Quam velit qui odit.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(517, 130, 'Sed deleniti perspiciatis sint sint non eum.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(518, 130, 'Explicabo quos facere sit.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(519, 130, 'Minima sint ut ea quasi aut laudantium non.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(520, 130, 'Ad magnam ea et reiciendis ab.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(521, 131, 'Dignissimos ut est nesciunt non error.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(522, 131, 'Accusantium nihil incidunt quia et.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(523, 131, 'Sunt occaecati id possimus dignissimos.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(524, 131, 'Est ipsa qui exercitationem nulla.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(525, 132, 'Cumque delectus labore temporibus sit.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(526, 132, 'Non qui ut amet. Modi alias cumque qui eum.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(527, 132, 'Fugiat praesentium iste illum quibusdam.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(528, 132, 'Ab qui maxime nulla ea enim voluptatum.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(529, 133, 'Sed sunt aut sed nulla.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(530, 133, 'Unde harum eius est quam et mollitia iusto.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(531, 133, 'Laborum fuga ut quis est qui.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(532, 133, 'Deleniti et fugit iste.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(533, 134, 'Qui error numquam fugiat earum repellat.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(534, 134, 'Ullam quae quasi sint at deserunt fugiat.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(535, 134, 'Debitis doloremque odio deserunt est quis.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(536, 134, 'Ut omnis qui debitis ut.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(537, 135, 'Itaque nostrum facilis porro ipsa delectus.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(538, 135, 'Sapiente debitis et sit ut.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(539, 135, 'Totam aliquam eum occaecati odio.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(540, 135, 'Dolor omnis eligendi id nisi.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(541, 136, 'Sit quo perspiciatis illum.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(542, 136, 'Sit et voluptas alias veniam et soluta.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(543, 136, 'Nisi quaerat officia in.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(544, 136, 'Sunt fuga aliquid non aut consectetur qui.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(545, 137, 'Et hic nam dicta nemo.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(546, 137, 'Aperiam molestias reprehenderit atque corporis.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(547, 137, 'Temporibus sint voluptatem magnam at ut vero.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(548, 137, 'Debitis esse at hic minima est ratione dolores.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(549, 138, 'Et nisi voluptatibus voluptatem pariatur.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(550, 138, 'Minima fugit porro voluptatem aliquid ea.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(551, 138, 'Eligendi hic ut aperiam eaque.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(552, 138, 'Inventore est dolores reiciendis deleniti.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(553, 139, 'Eveniet maiores quisquam delectus similique.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(554, 139, 'Hic et ullam quae placeat.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(555, 139, 'Ut autem ea est quos ipsam ea.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(556, 139, 'Excepturi corrupti ut ut in molestiae alias.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(557, 140, 'Sed repudiandae eveniet quos dolorum aut.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(558, 140, 'Molestiae rem ipsam id optio commodi maiores.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(559, 140, 'Rem minus libero ullam totam voluptas nemo.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(560, 140, 'Sapiente veritatis assumenda corporis.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(561, 141, 'Qui numquam cupiditate velit ea et porro neque.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(562, 141, 'Quasi placeat voluptatum facere nesciunt ut.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(563, 141, 'Molestiae qui eos molestias nemo labore.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(564, 141, 'Maiores neque est dicta hic.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(565, 142, 'Incidunt consequatur quaerat velit.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(566, 142, 'Ab quia deserunt id voluptate.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(567, 142, 'Asperiores facilis laudantium eos id.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(568, 142, 'In expedita eum magnam dolor eos ipsa.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(569, 143, 'Neque laudantium unde nostrum rerum.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(570, 143, 'Veritatis impedit itaque quo consectetur.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(571, 143, 'Molestiae quod deleniti cumque accusamus.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(572, 143, 'Porro enim suscipit dolorem voluptatem dolores.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(573, 144, 'Nulla exercitationem qui nihil nemo non ad animi.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(574, 144, 'Nihil voluptates labore esse et facere.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(575, 144, 'Sequi rerum ducimus eos est.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(576, 144, 'Voluptatem assumenda voluptates consectetur ea.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(577, 145, 'Qui occaecati qui quia atque illum aliquid sit.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(578, 145, 'Fuga praesentium perferendis non in.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(579, 145, 'Iure veniam est sed alias.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(580, 145, 'Accusamus ipsa in similique eaque eum ut unde.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(581, 146, 'Ut soluta maiores omnis similique.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(582, 146, 'Reprehenderit ut qui nulla quibusdam dolor.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(583, 146, 'Qui et voluptatibus molestias nam.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(584, 146, 'Fugit in ipsam delectus consequuntur.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(585, 147, 'Voluptatibus eum molestiae minus modi rerum.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(586, 147, 'Aut rerum nisi at rem asperiores sed sit.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(587, 147, 'Dolor ut odio maxime ipsum.', 1, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(588, 147, 'Quo ratione inventore nam voluptatibus quisquam.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(589, 148, 'Eligendi sit qui libero est.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(590, 148, 'Blanditiis ratione id fugiat et qui quis nemo.', 0, '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(591, 148, 'Perferendis ipsa omnis officia esse porro.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(592, 148, 'Rerum rerum et adipisci ducimus dolor fugit.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(593, 149, 'Ullam rerum neque est qui.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(594, 149, 'Qui ut harum quam omnis enim aut qui.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(595, 149, 'Enim ut ipsum ea quia.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(596, 149, 'Nihil quae ut voluptate dolorem sint magnam.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(597, 150, 'Labore et qui qui ea et.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(598, 150, 'Autem corporis dolorum est id odio perferendis.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(599, 150, 'Amet aut officiis tempore.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(600, 150, 'Commodi omnis ipsam sed.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(601, 151, 'Error necessitatibus harum esse ut.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(602, 151, 'Autem omnis est sunt beatae.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(603, 151, 'Sunt quia est sit. Ullam nesciunt totam sed quas.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(604, 151, 'Eos voluptatem qui voluptatum sed omnis.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(605, 152, 'In non nemo assumenda eum ipsam quia.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(606, 152, 'Dolorem et et possimus.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(607, 152, 'Asperiores perspiciatis laudantium ex.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(608, 152, 'Omnis aperiam et nisi.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(609, 153, 'Debitis ex sed itaque et reiciendis id nam.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(610, 153, 'Dolore eos numquam beatae vitae tempore.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(611, 153, 'Deserunt totam eveniet sequi.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(612, 153, 'Modi nisi dolores voluptates aperiam quod qui.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(613, 154, 'Nulla sed aut eaque et quia quis eveniet.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(614, 154, 'Laboriosam asperiores dolores dolor repellat.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(615, 154, 'Ab architecto reiciendis magnam aut.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(616, 154, 'Et eos voluptatibus totam pariatur.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(617, 155, 'Tempore similique magni enim et qui et.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(618, 155, 'Et maiores non iure expedita vel cum.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(619, 155, 'Harum architecto sunt et veniam aut.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(620, 155, 'Similique pariatur nisi eum ut voluptatibus qui.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(621, 156, 'Aliquid sunt error voluptatibus quia aperiam.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(622, 156, 'Est reprehenderit exercitationem veritatis et.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(623, 156, 'Nihil est natus fuga.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(624, 156, 'Eveniet odit eius temporibus.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(625, 157, 'Modi ipsa dolorem magnam minima molestiae id.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(626, 157, 'Id sed cumque cumque est veniam voluptates.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(627, 157, 'Qui recusandae necessitatibus ipsam.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(628, 157, 'Pariatur aut soluta omnis non aut deserunt.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(629, 158, 'Doloribus odit quidem eligendi.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(630, 158, 'Deleniti fugiat aut iure.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(631, 158, 'Nobis id quasi est ab omnis qui magni animi.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(632, 158, 'Aliquam nulla minima in quia occaecati porro.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(633, 159, 'Molestiae nostrum ex quia aut sit neque ut ea.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(634, 159, 'Iste dolor expedita facilis possimus est ducimus.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(635, 159, 'Hic amet ut corporis vel dicta.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(636, 159, 'Numquam quaerat omnis consequatur.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(637, 160, 'Autem laudantium fugit est autem aliquam.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(638, 160, 'Ea est mollitia ut ut ab numquam omnis rem.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(639, 160, 'Et minima doloribus sint cumque est.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(640, 160, 'Aut sit ullam blanditiis excepturi ipsum quia.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(641, 161, 'Fuga sequi sunt nihil sit ratione nesciunt.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(642, 161, 'Aut atque ut non dolores officia minima.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(643, 161, 'Voluptatibus expedita nemo animi corporis quod.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(644, 161, 'Odio commodi recusandae et minus ea voluptatem.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(645, 162, 'Perspiciatis sed similique blanditiis et dicta.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(646, 162, 'Quia et ea sunt dolor itaque.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(647, 162, 'Nulla quasi voluptas maiores sunt.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(648, 162, 'Cupiditate est natus modi consequatur.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(649, 163, 'Maiores quasi magnam esse eos voluptatem.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(650, 163, 'Ratione et necessitatibus quis aut labore et aut.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(651, 163, 'Quia at qui temporibus sit ea.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(652, 163, 'A quia corrupti blanditiis.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(653, 164, 'Esse quam voluptatem aut iusto sequi quia.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(654, 164, 'Voluptatum quia non eos ipsum quos et.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(655, 164, 'Iure deleniti et aliquid nemo officiis.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(656, 164, 'Omnis harum iure ut quia et rem.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(657, 165, 'Libero maxime dolor eius qui.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(658, 165, 'Fugit praesentium voluptates atque.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(659, 165, 'Eos cupiditate modi maxime.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(660, 165, 'Iusto placeat quis dolorum aut ut.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(661, 166, 'Animi sit quidem saepe cupiditate.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(662, 166, 'Laboriosam neque enim sed et cum iste alias.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(663, 166, 'Sit non vitae non excepturi sit sit placeat.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(664, 166, 'Et deleniti et sit vel.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(665, 167, 'Modi quidem eaque qui voluptatum dolor numquam.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(666, 167, 'Quod quidem esse illo consectetur unde.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(667, 167, 'Ut eum nesciunt tenetur vel nam.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(668, 167, 'Rerum impedit voluptas aut dolor autem.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(669, 168, 'Distinctio ex corporis qui sint corporis.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(670, 168, 'Et sit expedita similique unde consectetur et.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(671, 168, 'Aut harum ipsam nobis ea magni velit nulla est.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(672, 168, 'Optio nesciunt itaque soluta id non.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(673, 169, 'Velit omnis rem ut doloremque minima.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(674, 169, 'Sapiente maxime consequatur nemo at quos.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(675, 169, 'In ullam rem quam et illum voluptatem.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(676, 169, 'Est facilis aut libero tempore quam repellat.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(677, 170, 'Id cumque omnis consequatur sequi et.', 1, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(678, 170, 'Corporis vel asperiores necessitatibus numquam.', 0, '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(679, 170, 'Optio ut voluptates qui omnis rem a voluptatum.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(680, 170, 'Iusto enim sint quo assumenda vitae ut sit.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(681, 171, 'Dolor reiciendis voluptatem officia.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(682, 171, 'Rerum et ex modi ut consequuntur ut expedita.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(683, 171, 'Error qui ut modi.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(684, 171, 'Cumque sit provident ex sit.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(685, 172, 'Qui quod neque quasi.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(686, 172, 'Quam incidunt recusandae a fugit.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(687, 172, 'Fuga repellat eos eveniet ut voluptatum.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(688, 172, 'Expedita quia expedita voluptatem et.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(689, 173, 'Nesciunt et nulla non voluptatem dolor eveniet.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(690, 173, 'Qui aut et vitae eos.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(691, 173, 'Dolorem nihil sed ratione.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(692, 173, 'Quia natus quia saepe hic.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(693, 174, 'Reprehenderit ut aut cum saepe delectus quis.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(694, 174, 'Vel quidem velit ut expedita sit voluptas.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(695, 174, 'Debitis sit nihil dignissimos ut nostrum.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(696, 174, 'Est vero in esse voluptatem voluptatem.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(697, 175, 'Animi quia id voluptas doloribus quaerat.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(698, 175, 'Dolorem ut nostrum et nobis et vero.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(699, 175, 'Qui qui qui ex consequatur sit amet.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(700, 175, 'Velit et placeat quod doloremque.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(701, 176, 'Illo nulla aut aut possimus.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(702, 176, 'Illum vel laborum ut sint odit soluta.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(703, 176, 'Sint saepe modi est nobis.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(704, 176, 'Tempore nam voluptas non itaque eum et.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(705, 177, 'Totam vitae eius ea provident occaecati.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(706, 177, 'Quod doloremque voluptas ut commodi placeat.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(707, 177, 'Dolores sequi necessitatibus in omnis sed.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(708, 177, 'Ipsum dolores odit magnam a.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(709, 178, 'Voluptatem a iure sed hic.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(710, 178, 'Eos odio architecto soluta aut.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(711, 178, 'Ipsum illum recusandae quidem iusto.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(712, 178, 'Quibusdam non dolor adipisci suscipit dolorum ex.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(713, 179, 'Aut magni in eius. Rerum dolorem quaerat et quos.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(714, 179, 'Ut et sed occaecati deleniti sapiente.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(715, 179, 'Iure quae corporis doloremque provident enim.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(716, 179, 'Repellendus sunt non voluptas.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(717, 180, 'Dolores nulla earum qui.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(718, 180, 'Et aut voluptatibus dignissimos sed.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(719, 180, 'Molestiae voluptas saepe enim et.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(720, 180, 'Neque officia placeat rerum quia aut asperiores.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(721, 181, 'Porro et neque nobis et autem in qui.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(722, 181, 'Soluta unde et omnis eius quos distinctio.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(723, 181, 'Neque libero at eum et.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(724, 181, 'Quia dolorum in et officiis maiores ex est.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(725, 182, 'Molestiae voluptatum dolore voluptatum.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(726, 182, 'Officiis alias iste culpa voluptas non doloribus.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(727, 182, 'Facere quia accusantium veritatis amet.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(728, 182, 'Unde quasi laudantium omnis officiis.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(729, 183, 'Eum odit quo vero quasi qui.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(730, 183, 'Enim voluptatum et numquam ipsam.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(731, 183, 'Suscipit autem iusto molestias rem.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(732, 183, 'Labore corrupti error hic sit molestiae magni.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(733, 184, 'Quos quaerat dolorem velit quo.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(734, 184, 'Rerum qui aut impedit quibusdam rem quam qui.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(735, 184, 'Dolorem error voluptate ad voluptas.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(736, 184, 'In quo quibusdam sint aperiam voluptas qui.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(737, 185, 'Reiciendis necessitatibus et aut non temporibus.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(738, 185, 'Unde enim est vero quam qui.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(739, 185, 'Rem quia velit nemo dolor sunt.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(740, 185, 'Consectetur in ex magni voluptatem sit quo.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(741, 186, 'Et itaque quod cum.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(742, 186, 'Sequi similique qui ea.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(743, 186, 'Eligendi minima soluta architecto cumque.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(744, 186, 'Fuga dolor et deleniti doloremque iure autem.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(745, 187, 'Nesciunt quos nobis enim.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(746, 187, 'Qui dolor nemo quia laudantium.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(747, 187, 'Et beatae repellendus minus eligendi est placeat.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(748, 187, 'Aut dignissimos ut recusandae et ut sed autem.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(749, 188, 'Qui ipsa consequatur velit tempora ut.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(750, 188, 'Eum vel temporibus nobis deleniti.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(751, 188, 'Sit dolorem omnis ipsum voluptate.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(752, 188, 'Amet ut sequi tenetur ratione placeat accusamus.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(753, 189, 'Quia magni dolores voluptate ipsum ea a.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(754, 189, 'Quod sequi quia nostrum non.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(755, 189, 'Vel in occaecati nostrum quibusdam.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(756, 189, 'Et eos aut quo.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(757, 190, 'A sequi fuga consectetur ipsum iusto.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(758, 190, 'Adipisci id dolor illum.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(759, 190, 'Sunt incidunt necessitatibus placeat fugiat.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(760, 190, 'Enim delectus velit fugiat perspiciatis beatae.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(761, 191, 'Quos nostrum quia excepturi est.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(762, 191, 'Reprehenderit pariatur earum cumque maiores.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(763, 191, 'Distinctio et voluptate dolorem accusamus.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(764, 191, 'Esse cum quo temporibus est consequatur.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(765, 192, 'Adipisci et beatae est cumque esse.', 1, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(766, 192, 'Vel quasi ex est dolor.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(767, 192, 'Aut excepturi voluptas enim at.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(768, 192, 'Sint voluptas nulla porro quis magni.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(769, 193, 'Quod et eius aut doloremque ut est unde rerum.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(770, 193, 'Et qui facere numquam in alias ut beatae.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(771, 193, 'Atque aliquam repellendus tempore explicabo.', 0, '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(772, 193, 'Asperiores et porro aut.', 1, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(773, 194, 'Ipsam quidem vel eligendi nam qui omnis.', 1, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(774, 194, 'Itaque laboriosam perferendis assumenda.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(775, 194, 'Voluptatem voluptatem rerum aut alias odio.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(776, 194, 'Excepturi consequuntur dolorum aut rem.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(777, 195, 'Aspernatur vero omnis odit at est.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(778, 195, 'Et qui labore quas illo voluptatem quisquam.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(779, 195, 'Sint ratione dolores et nisi culpa.', 1, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(780, 195, 'Repellendus modi sequi sed ipsam et quas non.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(781, 196, 'Ut laboriosam sequi ex culpa.', 1, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(782, 196, 'Enim eius nihil earum doloribus minus.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(783, 196, 'Aut vitae exercitationem consequuntur et quis.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(784, 196, 'In aspernatur omnis eum et ipsam perspiciatis.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(785, 197, 'Quo fuga ex quis quis placeat.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(786, 197, 'Quibusdam consectetur atque porro et.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(787, 197, 'Quasi et omnis et placeat.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(788, 197, 'Officia delectus aut praesentium sunt.', 1, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(789, 198, 'Dolore inventore ut impedit aut quam sed.', 1, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(790, 198, 'Cumque harum ut ut voluptatibus quaerat.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(791, 198, 'Odio sunt neque quos ipsum.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(792, 198, 'Sint soluta id itaque.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(793, 199, 'Enim autem voluptas fugiat rem ut.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(794, 199, 'Animi hic qui quos dolorem nihil et et.', 1, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(795, 199, 'Nulla harum laborum dolor quo nemo voluptatem et.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(796, 199, 'Quos dicta quasi ut ducimus minima dolorem.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(797, 200, 'Est et quod temporibus nam inventore a assumenda.', 1, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(798, 200, 'Cumque expedita et quam ipsam.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(799, 200, 'Et molestias autem beatae molestiae aut et.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(800, 200, 'Quo dicta libero corporis maxime.', 0, '2023-05-24 18:21:39', '2023-05-24 18:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_question_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_answer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_explanation` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `quiz_id`, `question`, `answer_explanation`, `created_at`, `updated_at`) VALUES
(1, 1, 'Maxime velit est in suscipit. Vel voluptas ut eaque nihil odio accusamus qui illo.', 'Quibusdam itaque reprehenderit excepturi iure qui. Commodi fugit vitae eligendi qui id enim unde. Ex ipsum sint maiores quo.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(2, 1, 'Quo labore aut quaerat expedita qui. In minima labore non molestiae sunt minus ut.', 'Magni ab dicta possimus ratione. Id error aliquam aliquam in porro occaecati. Beatae fugiat dicta et itaque ducimus dignissimos at. Temporibus eligendi et est enim iste.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(3, 1, 'Voluptatem repellendus non quo. Necessitatibus dolore ea est et. Odio voluptas quidem molestias.', 'Perspiciatis odio dignissimos modi est. Minima ipsam quasi occaecati. Qui nemo eum mollitia.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(4, 1, 'Ea dolores et aut ipsam. Et minima repellat tempora quia magni beatae eveniet.', 'Iste dolores voluptate aut dolores nostrum. Modi deserunt iste et aut architecto non. Fugiat nihil hic repellat quaerat doloribus autem. Atque illum hic eum aut dolores ut omnis qui.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(5, 1, 'Nobis porro omnis optio id repudiandae. Tempore ut inventore doloremque quibusdam.', 'Deserunt est veritatis quae quo ad. Omnis voluptatem explicabo temporibus eligendi esse. Et esse et quaerat qui. Quia id quam odio porro nihil praesentium qui.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(6, 1, 'Qui accusamus asperiores id corrupti et perferendis nulla natus. Qui inventore expedita enim et.', 'Voluptates et ut officiis itaque. Similique consequuntur ullam hic consequatur soluta. Dolorem qui magni ut. Itaque nobis deleniti dicta quam maiores omnis et.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(7, 1, 'Corporis est fuga aut sit consequatur maiores. Quae aspernatur eos facere culpa autem.', 'Nam odio unde consequatur. Et dolorem quae nihil. Beatae voluptatem amet quod. Molestiae quae quia et.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(8, 1, 'Nihil qui rerum fugit ipsum quis. Hic odio ex sint. Occaecati dolore rerum tempore corporis dolore.', 'Soluta dolores enim est occaecati nisi incidunt. Id iste fugiat illum et et libero ipsam. Adipisci consectetur fuga aliquam qui similique.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(9, 1, 'Sunt suscipit iure quae corporis nisi. Ratione assumenda consequatur accusantium id.', 'Occaecati rerum saepe saepe suscipit ipsum quas illum quia. Qui id accusantium consequatur similique natus aperiam. Eligendi praesentium sequi rem ducimus.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(10, 1, 'Alias sunt eos vitae rem. Est corrupti enim in tempore qui quibusdam. Voluptatem omnis omnis non.', 'Dolores et illum ducimus aperiam consectetur. Delectus reprehenderit tenetur molestiae. Cupiditate amet deleniti accusantium corporis. Dolores distinctio dolorum ipsam est dolorem eum veniam.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(11, 2, 'Velit et provident blanditiis. Eligendi ut vitae est totam. Modi laboriosam pariatur ea sed.', 'Quos voluptas distinctio reprehenderit et vel ipsa. Tempore aut cum hic aut molestiae. Et optio ut ut.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(12, 2, 'Velit dolor provident excepturi libero labore et. Voluptas asperiores vero non voluptatem.', 'Repellendus inventore et dicta voluptas eos qui. Quod neque id veniam reprehenderit. Eos eveniet adipisci quo voluptate ex explicabo facere.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(13, 2, 'Est eveniet aut voluptas ut. Voluptatum sapiente accusamus ex maiores assumenda ut quos occaecati.', 'Inventore iusto laboriosam quia aut. Dicta suscipit quae voluptatem vero libero harum quaerat. Aspernatur qui ut et aperiam voluptates.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(14, 2, 'Explicabo enim rerum dolor autem. Vitae et et ratione et omnis impedit. Et eos earum deleniti rem.', 'Culpa ea consequatur eaque corporis neque esse voluptate vel. Ut id est consequatur laudantium provident. Quis distinctio quis nihil natus.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(15, 2, 'Hic quae accusantium aut. Voluptate nihil ut rerum suscipit. Officiis ex molestiae voluptatibus.', 'Nobis deleniti aut optio dolore autem. Doloribus voluptatem quidem minus molestiae ullam. Aspernatur consequatur minus blanditiis enim.', '2023-05-24 18:21:30', '2023-05-24 18:21:30'),
(16, 2, 'Voluptas et non quis cum. Ut quod quis quos voluptas et beatae.', 'Alias deleniti repudiandae nobis sunt dolores nihil illum. Autem tempore sit minima quis numquam. Magni nisi sint sunt rem.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(17, 2, 'Repellendus aliquam libero ipsam ut libero qui. Autem esse ipsam et. Et deleniti velit odio.', 'Iste voluptas cumque sit omnis animi. Voluptatem doloremque voluptas voluptatem. Quia neque expedita possimus numquam. Qui voluptatem iusto quos sit dolor eos.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(18, 2, 'Eos est et ad non. Ut ducimus corrupti accusantium velit voluptas vel.', 'Qui aut quaerat pariatur tenetur itaque autem. Ipsa beatae dolores ut nihil pariatur dolor error. Quo aut tenetur quia qui culpa numquam. Expedita voluptatem id quidem fuga tempore ducimus.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(19, 2, 'Dolores eligendi optio delectus culpa sunt eaque recusandae. Inventore et tempore in quidem dolor.', 'Minus rerum et sunt a blanditiis et vel. Magni consequatur et cumque atque veniam blanditiis possimus. Aut dolores tempore tempora nemo molestiae.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(20, 2, 'Et quis animi ullam explicabo nisi pariatur est. Enim non consequatur aut placeat quia.', 'Consequuntur nulla unde quis hic qui exercitationem harum. Harum reprehenderit ipsa magnam et neque deleniti voluptatibus ea. Error provident quidem dignissimos vel perferendis voluptatem.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(21, 3, 'Ad dolorum porro fugiat officiis repellat quisquam. Suscipit minima est eos ad.', 'Unde sint eius distinctio debitis sunt et quod. Totam explicabo laborum veniam sit a numquam aperiam.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(22, 3, 'Ex sunt quis blanditiis sequi odit. Quo id ut qui delectus fuga eos. Sint est aliquid qui quia ea.', 'Aut porro non odit temporibus cumque maxime quam. Odio dignissimos quibusdam exercitationem est. Aut sint rerum non ipsa pariatur.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(23, 3, 'Voluptatum enim et quia. Corrupti maxime non dolorum ab.', 'Repellat quo ut accusantium sapiente eveniet et qui. Quod quidem ullam distinctio omnis ut cumque. Nulla omnis deleniti assumenda et.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(24, 3, 'Et sit ad et et. Quos est fuga sed architecto. Dolore rem tempora voluptatem consequuntur nesciunt.', 'Id itaque provident omnis rerum. Libero consequuntur necessitatibus eligendi ipsa a. Ut vero veritatis veritatis ad expedita cumque.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(25, 3, 'Vero deleniti voluptas nostrum aut. Sed at enim maiores quibusdam. Eum dolores est expedita.', 'Id laborum et sit rerum distinctio. Nihil deleniti assumenda libero neque eaque. Quaerat mollitia aliquid fugit deserunt harum autem quaerat.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(26, 3, 'Voluptatem omnis accusamus rerum qui. Non natus suscipit maxime qui illum ducimus.', 'Aperiam doloremque explicabo sit eius vero et. Voluptas et sed nesciunt laborum possimus suscipit neque. Odit non libero asperiores dignissimos commodi.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(27, 3, 'Deleniti dolore totam voluptatem animi. Odit voluptatem culpa temporibus necessitatibus quaerat ea.', 'Tempore occaecati fuga rerum voluptatem. Eos occaecati incidunt eveniet a pariatur enim ut sequi. Ea cupiditate ab qui eum occaecati omnis. Expedita quo sit nihil impedit voluptatum et quos ut.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(28, 3, 'Animi laborum officiis nihil expedita consectetur est. Non excepturi illo accusantium rerum et.', 'Est assumenda voluptatem ipsum blanditiis magni. Exercitationem a ut odit consequatur. Quaerat rem vel commodi enim.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(29, 3, 'Voluptas possimus quo enim id consequuntur. Dignissimos distinctio consequuntur nihil dolores quia.', 'Molestiae consectetur dolores dolorem non quasi adipisci non. Corporis amet aperiam quo ipsa harum temporibus. Blanditiis est et quam. Placeat autem inventore ex at consequatur amet.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(30, 3, 'Ipsum et alias sunt sapiente. Perferendis debitis fugiat dolorum aperiam laborum sint.', 'Molestiae omnis voluptas voluptas ea. Ipsum quia accusamus expedita numquam in. Ut et quas aliquid excepturi.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(31, 4, 'Non porro vitae ut. Et eos impedit illo architecto enim distinctio dolorum.', 'Alias sit mollitia saepe est aut. Voluptatem ratione autem non accusantium sunt accusamus. Dolorem molestiae et et ut similique.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(32, 4, 'Vel aut ab et quasi. Cupiditate a neque sed quo. Voluptate blanditiis excepturi blanditiis quos.', 'Voluptatem dolorem in consequatur accusantium possimus voluptates. Consectetur fugit odit rerum nihil sapiente qui delectus. Consequuntur esse vero est vel repellendus vel.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(33, 4, 'Tenetur modi explicabo quis nihil excepturi. Vel fugiat vel in enim ducimus aut occaecati.', 'Accusantium dolorum eligendi accusantium consectetur et autem debitis at. Odit ipsam autem expedita unde iure maiores ullam. Occaecati qui iste molestiae.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(34, 4, 'Impedit doloremque quidem voluptatem. Quos omnis unde occaecati quis excepturi.', 'Blanditiis labore blanditiis et non qui ducimus deserunt. Quae similique animi quidem sit nostrum earum aut. Asperiores consequatur sint reprehenderit id.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(35, 4, 'Fuga aut dolor a est hic. Odio ut in eveniet unde. Quae minima maiores vel hic repudiandae.', 'Harum sint occaecati nemo voluptas voluptatum eos qui. Nesciunt saepe dolores ut optio mollitia non et. Sed ut debitis ipsam illum assumenda et ut repellendus.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(36, 4, 'Et omnis eius quos voluptas nemo. Ut officiis laborum recusandae molestiae totam delectus.', 'Beatae est vitae qui sit. Quasi placeat autem iste est neque autem consectetur. Maiores itaque est a possimus fugit et ad.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(37, 4, 'Eaque error eum numquam velit ab. Aut laudantium id corrupti qui.', 'Voluptatem non expedita quibusdam omnis. Et et delectus eligendi aut magni laborum ut. Enim ea voluptas doloremque qui. Sunt consequatur et enim quis.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(38, 4, 'Eaque perspiciatis et ipsa ex ab eum sed. Perferendis et error enim ex non.', 'Consequatur aut sequi eius non et. Enim et unde nihil eligendi magni. Rerum dolorem nemo qui quia aut delectus consequatur. Ullam fugiat dicta nihil totam aliquid.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(39, 4, 'Architecto veniam ab corporis porro. Cum qui incidunt cumque non ut. Sequi et nam iure aut ratione.', 'Inventore illum accusamus quia saepe ut dolores. Et dolorem hic non dolores quidem aut. Facere optio quam voluptatem omnis in rerum et aut.', '2023-05-24 18:21:31', '2023-05-24 18:21:31'),
(40, 4, 'Et minima sunt saepe illo eos nam. Distinctio eum tempore molestiae.', 'Nisi voluptate sunt ut. Sequi inventore ut autem voluptatibus. Sit velit ducimus consequatur qui. Voluptates reprehenderit et sit labore.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(41, 5, 'Nesciunt in necessitatibus distinctio alias. Dolor saepe commodi asperiores rerum.', 'Ratione voluptas non velit voluptas in corrupti animi. Iste necessitatibus nulla totam suscipit. Soluta harum aut expedita nobis eius minus et eius. Aperiam sunt labore quas dolores expedita.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(42, 5, 'Iure libero repellendus sint pariatur. Voluptatem commodi eum et porro est eveniet quia.', 'Qui aut vel dolores nihil incidunt doloribus. Nulla itaque esse officiis quam. Ducimus omnis tenetur est recusandae dolorum omnis maiores non.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(43, 5, 'Id molestias et eligendi. Quidem ab eum corporis. Occaecati ut voluptatibus consequatur quisquam.', 'Dolore et fugit et omnis ullam et. Sint distinctio rerum culpa maxime et. Veritatis quo dolore voluptatem et cum.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(44, 5, 'Magnam voluptatem est consequatur sunt qui praesentium. Minima sit eveniet in qui.', 'Facere magni praesentium occaecati voluptas saepe quidem incidunt dolores. Sit velit ullam blanditiis maiores.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(45, 5, 'Natus eum ea laborum itaque et et. Sed labore voluptatem provident velit sed.', 'Est dolorem laboriosam unde voluptatem commodi et et. Perferendis maxime corrupti quos impedit aut. Dolorem nesciunt porro consequatur amet voluptatem sapiente voluptates aliquam.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(46, 5, 'Voluptas id ab dolorem animi. Magni cumque quis sunt velit soluta recusandae maiores.', 'Facilis quos quia qui ratione. Cumque fugit recusandae dolor dignissimos recusandae totam. Dicta facere earum rerum qui earum quia recusandae.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(47, 5, 'Voluptatum eveniet at quia illum quisquam doloribus. Quia illo dolores nisi eius non.', 'Qui odit quia omnis sit et. Amet pariatur id suscipit aliquam fugit suscipit ut. Possimus debitis sunt rem ut dicta cum et. Temporibus dolorem nemo quibusdam eaque et sunt.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(48, 5, 'Quas labore corporis iusto adipisci ea. Optio mollitia cum blanditiis officiis.', 'Inventore asperiores est in reiciendis temporibus atque. Possimus sint voluptas exercitationem amet quaerat voluptatibus. Cumque impedit quos non quis.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(49, 5, 'Quaerat at dignissimos dolorem non vel aut quidem. Corrupti architecto rerum et consequatur.', 'Amet non id eius quo magni aperiam excepturi. Qui non aliquid quia ut consectetur. Consequatur et non quia rerum. Voluptatum in laboriosam eveniet soluta est et optio.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(50, 5, 'Iusto magnam explicabo qui mollitia. Eos qui culpa est voluptatum quia.', 'Aut nam at quidem delectus modi. Debitis quo aperiam omnis in necessitatibus illo. Ut et modi laborum harum quis. Sit mollitia sed at sapiente asperiores dolore.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(51, 6, 'Autem dolorem consequatur quo facere est quam aut. Et aut nihil inventore a.', 'Autem id dignissimos saepe. Sit esse odio consectetur dolores numquam iure quibusdam sequi. Dolorem corporis ipsa omnis. Eos vel voluptatem debitis voluptatem aut.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(52, 6, 'Qui placeat non doloremque. Animi sit sit aliquam tempora in maiores.', 'Reprehenderit culpa earum soluta ullam cum repellendus quo. Ducimus velit asperiores deleniti est. Aperiam et assumenda eos facilis. Facilis et dolores eos a enim.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(53, 6, 'Quam illum nihil maxime explicabo aliquid qui. Occaecati odio eaque ut ipsam.', 'Et iure optio tempora ut voluptatem excepturi. Vitae rerum quia sit quo eveniet tenetur. Veniam maxime facilis ut dicta omnis molestiae id. Quo esse accusamus dolore rerum numquam.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(54, 6, 'Odio itaque sit maiores. Aut ipsam possimus commodi qui doloremque pariatur.', 'Rerum quia omnis dignissimos vitae beatae mollitia dolorum. Id dolore aliquid rerum ducimus quos nostrum itaque. Dicta reiciendis eligendi sed quo error.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(55, 6, 'Dolores rerum dolores delectus. Ut recusandae maiores maiores assumenda.', 'Aperiam suscipit corrupti voluptatem quia in. Voluptatem quod illum odio ut. Voluptatum hic eveniet quibusdam provident rerum.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(56, 6, 'Labore quia quia molestiae vero tempora nostrum. Repellendus excepturi dicta quia non ratione.', 'Nihil dicta eaque nostrum vel est et nihil. Suscipit sit recusandae aliquam atque tenetur ut. Dolore deserunt et voluptatem quia est vitae. Maiores expedita nihil neque quo quas iste.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(57, 6, 'Nulla debitis sint in sequi nulla qui. Eum rerum tempora quibusdam nemo magni minus soluta.', 'Aut est eius sequi architecto aut vel voluptates. Aut enim ex est culpa adipisci eius esse. Aut perferendis itaque dolorum. Blanditiis omnis dolores esse eos. Voluptas debitis assumenda sunt aut sit.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(58, 6, 'Dolorum dolores rerum sit et quam. Fugit necessitatibus nihil quia qui eaque dolores.', 'Sit possimus rerum quibusdam similique. Nihil deleniti totam sapiente est adipisci. Mollitia nisi labore et occaecati ratione expedita. Dolore id eveniet reiciendis aut ut.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(59, 6, 'Quia quaerat deleniti quam molestiae et. Earum itaque et architecto eum fugit.', 'Repellat consequatur ad rerum a. Saepe delectus aperiam velit ipsa perferendis sunt placeat. Odio iste dicta aliquid quia perferendis ut.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(60, 6, 'Corrupti et et pariatur ratione quod. Qui maiores sit itaque et iure.', 'Omnis adipisci distinctio quae. Ratione inventore error illo enim excepturi aspernatur et. Nulla debitis unde quas et in sint qui.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(61, 7, 'Accusamus et fugiat unde illum perspiciatis. Quidem ad dolores at voluptate maxime aut facilis.', 'Voluptate maiores atque sunt explicabo officiis facere ut. Eaque perferendis numquam eaque amet. Omnis sit qui omnis eos et provident magni est. Non minus ullam repellendus architecto.', '2023-05-24 18:21:32', '2023-05-24 18:21:32'),
(62, 7, 'Aut molestiae sed cupiditate officiis. Modi recusandae ea explicabo in repellat.', 'Et ut ut natus est voluptatum ea. Officia qui rerum doloribus perferendis. Illo animi reiciendis ut blanditiis laboriosam quis et. Possimus atque aut id distinctio voluptatibus voluptatem.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(63, 7, 'Eum iure rem quibusdam debitis fuga repellendus. Id fuga quibusdam corporis saepe quia.', 'Commodi iusto assumenda placeat possimus quae asperiores atque. Architecto sint eum et non iusto in tempora. Aut qui beatae cupiditate quam.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(64, 7, 'Dolor sed repudiandae sit sit. Est nihil ut qui commodi. Autem minus sint necessitatibus veniam.', 'Voluptatibus nulla et ut et harum non ad ullam. Repudiandae similique fuga beatae quisquam tempora. Ipsam labore dolores aut rerum ut aut molestiae.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(65, 7, 'Omnis aspernatur ipsa pariatur et dolores est. Minima est rem eligendi nostrum enim itaque.', 'Doloribus officiis ut id ad nobis. Ut libero reprehenderit vel ea repudiandae delectus est. Sunt autem corrupti odit deleniti quam esse.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(66, 7, 'Dolores et sit dolorem et ipsam. Velit eos a natus enim.', 'Ipsam dolorum quis officiis voluptatem similique. Earum iusto vel blanditiis quia autem iste. Dolor molestiae magnam amet beatae autem reprehenderit.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(67, 7, 'Quia quia provident fugiat. Odio in qui et quos.', 'Quibusdam velit placeat qui maiores a porro soluta. Placeat laboriosam veritatis cum iure et qui voluptas quas. Qui sapiente possimus iure ea et facere ipsam.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(68, 7, 'Eos amet ex eos accusantium est. At tempore laboriosam expedita.', 'Id dolor alias accusamus aut. Ea nostrum temporibus maiores. Sunt sed nostrum dolorum et. Necessitatibus amet omnis qui modi et qui aut.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(69, 7, 'Repellat omnis iste expedita quo enim. Similique eligendi facere odit nulla excepturi.', 'Quod sed quam aut sint omnis debitis dolor. Ut id autem et et hic soluta. Quisquam unde id doloribus. Dolorem maxime cumque possimus.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(70, 7, 'Numquam assumenda est ut consectetur. Dolor animi quidem ut dicta vitae eos sequi voluptas.', 'Delectus omnis eos qui. Quas ut aspernatur at maiores perferendis. Eligendi ut soluta incidunt nihil voluptatibus qui explicabo.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(71, 8, 'Autem architecto et neque totam est nulla fugit quae. Id amet et necessitatibus.', 'Earum voluptate accusantium quod aut voluptates ut velit. Necessitatibus vel porro illum dolores facilis sed. Sint enim dolores quaerat est.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(72, 8, 'Fuga nisi fugit unde aut. Eos quaerat commodi quos laborum quam. In provident iusto inventore est.', 'Cumque modi quasi laudantium voluptatem. Sapiente deserunt quis laborum error iste. Molestias nihil et ut aut odit.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(73, 8, 'Laudantium ea non et officia. Ullam assumenda ut et hic autem. Commodi porro iste omnis.', 'Amet distinctio dolorem facere. Ut quia unde saepe accusamus quam architecto ex deleniti. Quaerat aspernatur corrupti numquam praesentium. Voluptatem odit in sed tenetur at omnis minima autem.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(74, 8, 'Cum ut et doloribus qui sit. Qui reprehenderit corrupti sequi et.', 'Eum et odit quas excepturi. Inventore enim consequatur quos distinctio occaecati fugit. Id laborum voluptatem beatae asperiores placeat ad. Explicabo voluptas praesentium officia.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(75, 8, 'Tenetur eveniet corrupti molestias quos expedita ea placeat. Nulla placeat ut modi in assumenda.', 'Consectetur et sit molestiae inventore ipsam minus. Ex sequi et voluptas distinctio ipsa laudantium. Quam doloribus quia rerum sed nulla. Reprehenderit necessitatibus ea vero.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(76, 8, 'Natus atque exercitationem enim dicta et. Voluptate recusandae rerum numquam est porro.', 'Illo rerum hic quia perspiciatis ad sit. Quibusdam distinctio quo optio aut unde excepturi omnis corporis. Et ipsum nesciunt voluptate atque omnis.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(77, 8, 'Rem velit eligendi id qui et nam accusantium. Sint a voluptas dicta nihil.', 'Rerum itaque nulla ut quod. Temporibus ullam sint est reprehenderit autem repellendus qui. Excepturi laboriosam quis aut qui libero qui omnis. Voluptas similique voluptatem voluptatibus officiis et.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(78, 8, 'Doloremque quos tenetur quod consectetur. Doloremque sunt incidunt consequatur itaque iure et qui.', 'Eum magnam consectetur dolorem consequatur. Similique adipisci similique facilis mollitia. Sit ut enim officiis consectetur voluptatum aut.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(79, 8, 'Voluptate dolorum fugiat consequatur in deserunt consequatur. Eligendi itaque ducimus veritatis.', 'Pariatur alias quidem adipisci nihil quia et. Fugit dolores porro id accusamus laborum eius. Iure id exercitationem deserunt nostrum. Qui iusto nihil illo nesciunt.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(80, 8, 'Sint id dolorem ullam rerum. Ea magni eos nulla eveniet vero delectus quis quae.', 'Qui earum aliquam ipsum nostrum. Occaecati voluptatem suscipit est quos sunt aut enim voluptatem. Quia consequatur aperiam laborum.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(81, 9, 'Sapiente porro est dolorem nostrum eos enim dolorem architecto. Et nihil ut ut aspernatur et aut.', 'Ipsam et et modi sint aut neque. Alias aut numquam eum non id. Blanditiis et ad dicta reiciendis repudiandae.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(82, 9, 'Aut ipsa inventore qui enim. Eos ut iste dignissimos non. Est possimus itaque maxime vero iure.', 'Consequuntur sed labore cupiditate animi id. Dolores quisquam vitae harum reiciendis ut consequatur. Officiis autem dicta dolorum voluptatem placeat magni modi.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(83, 9, 'Qui nihil sit eos facilis. Et quas non consequatur ut. Velit illo optio qui.', 'Voluptatibus illum sed sit nostrum sunt dolorem. Tempore et explicabo id et repellat sunt. Eos omnis dolore suscipit dignissimos maxime. Iure soluta ea quas nulla.', '2023-05-24 18:21:33', '2023-05-24 18:21:33'),
(84, 9, 'Dolor impedit impedit ab aut iste. Cumque sed non quasi. Quam vel ut blanditiis nihil est fugit.', 'In soluta optio exercitationem eos saepe id. Est omnis corporis voluptas. Quis maiores ut delectus aut. Dolorem accusantium et iure laborum a nam sed.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(85, 9, 'Ipsa quis reprehenderit illum in rem. In amet numquam similique.', 'Exercitationem soluta quia quibusdam. Enim id nemo recusandae quos voluptatibus eum neque deleniti. Voluptatem esse vel dolorem ut aliquid et.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(86, 9, 'Id eveniet dolorem omnis ut. Nulla eaque possimus consequatur sit qui.', 'Sint blanditiis dicta non. Commodi voluptatum placeat quis libero quisquam reprehenderit laboriosam. Quaerat blanditiis nemo est molestias in quas aliquam. Et a minus commodi laborum.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(87, 9, 'Eligendi aut sit in ad. Repudiandae et ut dolorum rem maiores. Rerum eum eum omnis vel rerum iure.', 'Sit quo sed maiores quam fugiat. Nemo quod odit quia porro. Nam sed aut similique in.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(88, 9, 'Aut dolor officiis facilis enim sint ut est iusto. Veniam dolores molestiae laborum omnis ea harum.', 'Quia in maxime ea occaecati. Excepturi vero ea ipsa eligendi itaque est blanditiis.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(89, 9, 'Mollitia nihil ut sequi. Nihil vel est eum architecto. Odio ut asperiores deleniti fugiat rerum.', 'Rerum asperiores adipisci corporis ipsam. Aspernatur sapiente voluptas quae rerum facilis iusto nesciunt. Numquam accusamus mollitia quia veritatis rerum ab et. Facilis esse autem illo.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(90, 9, 'Dolorem nulla nihil aut sed ut rem. Nam eligendi sit illo ratione incidunt sunt.', 'At doloribus voluptatem corrupti qui ut. Itaque accusantium voluptatem fuga. Adipisci porro alias nobis rem laudantium harum impedit. Eos et est saepe enim aut sint quos.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(91, 10, 'Sit dolor sunt et enim odit ipsam dolores. Est est qui qui sequi nobis.', 'Vero et tempora sapiente expedita omnis voluptas. Beatae expedita eum iure laboriosam facere ducimus quia. Rem deserunt mollitia optio magnam.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(92, 10, 'Optio eos porro qui et sapiente eos. Fuga quo eos error.', 'Doloribus nobis inventore mollitia ab voluptates voluptas inventore. Illo cum quia repellat sunt. Magnam magni et dolor dolorem ipsam voluptatem et.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(93, 10, 'Aspernatur voluptatem omnis omnis voluptas modi. Voluptas iste quis saepe officia est mollitia.', 'Consectetur excepturi molestiae repellendus accusantium repudiandae. Qui repellendus et ut. Rerum consequatur ratione et pariatur adipisci.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(94, 10, 'Nulla exercitationem neque nam distinctio. Fuga corporis sint explicabo.', 'Qui ab et autem quasi. Sit exercitationem fuga rem rerum. Sunt unde quo laudantium est qui velit similique.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(95, 10, 'Saepe similique corporis iusto quasi sit. Illo fugiat velit quo aliquam.', 'Aut qui similique quod iste ipsum libero eveniet. At eum in nemo deserunt voluptatem harum. Quis enim totam occaecati et ex dolor officia. At nisi perspiciatis iure et.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(96, 10, 'Optio distinctio commodi pariatur ipsa voluptates. Non aliquam et ut.', 'Aut placeat omnis reprehenderit autem. Voluptate nam blanditiis et necessitatibus voluptas. Corporis magnam explicabo sit reiciendis architecto vel omnis.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(97, 10, 'Rem ipsam laborum voluptas dolores earum aut. Nulla est consequatur sit odio deserunt qui.', 'Odit optio dolores nihil autem quia qui officiis. Qui atque eos et et et optio iure. Sint officiis autem sequi est consequatur non molestiae.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(98, 10, 'Et soluta cupiditate sit. Ut harum et nesciunt neque nisi et quam.', 'Explicabo non ut in dolorum tenetur in. Exercitationem accusamus voluptas ratione. Autem ducimus tempora consectetur. Quia aspernatur nobis ut ab.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(99, 10, 'Totam earum nobis et. Qui culpa est dolor harum. Excepturi ab qui rerum laborum.', 'Minima velit fuga non molestiae rerum et. Est est omnis non quasi id qui. Harum nihil tempora quos non dolorem enim reiciendis. Rerum consequatur odio facere hic ipsum.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(100, 10, 'Doloremque et laborum eos est veritatis. Harum minus neque rerum dolorem. Sit dolores iure at odit.', 'Repellendus temporibus sed illum et ea pariatur. Officia illum quas quaerat nobis expedita modi qui. Ut sit et nostrum libero. Similique voluptas est aut nam unde voluptas.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(101, 11, 'Nam sit quis sit quidem. Pariatur culpa quis earum deleniti.', 'Quam quibusdam officia nihil officia eligendi aut. Quia dolore qui ut quibusdam dignissimos optio expedita. Aut et magni perferendis modi. Eius sit non quas velit.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(102, 11, 'Sit eos error aut aperiam commodi aliquid. Culpa laborum dolorem rerum et quod sunt.', 'Autem eos facere hic asperiores minus dolore nihil dolorem. Dolor a nesciunt doloremque necessitatibus.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(103, 11, 'Quibusdam molestias vel fugiat aliquid. Sequi voluptatem sunt sed aut facilis et et ut.', 'Quo quae et adipisci. Qui ut autem quo. Omnis velit ipsum reiciendis incidunt.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(104, 11, 'Sint eligendi culpa aut sint. Ea cupiditate distinctio assumenda.', 'Impedit adipisci quia ipsam laborum. Sit corporis nulla omnis deleniti officia. Rerum amet in perspiciatis.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(105, 11, 'Laboriosam dignissimos est modi et. Ab dicta ea officia quaerat tenetur quod temporibus.', 'Rerum maiores sed est consequatur repellat corporis qui. Necessitatibus reprehenderit natus tenetur debitis perspiciatis.', '2023-05-24 18:21:34', '2023-05-24 18:21:34'),
(106, 11, 'Laborum voluptas officia illo. Sunt accusamus qui laborum ut saepe laborum nihil.', 'Id saepe debitis qui eaque sed. Amet et eaque dolores quasi temporibus. Deserunt doloremque omnis voluptatem commodi enim dicta. Tempore neque libero perferendis in in assumenda quas.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(107, 11, 'Quas itaque nihil odio rerum corporis at. Eius autem error quisquam eaque tenetur.', 'Minus ullam sit ratione tempore odit est tenetur. Quod impedit cupiditate pariatur fugit esse eius et. Aliquid doloremque eligendi numquam dolore quasi modi non illo.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(108, 11, 'Animi est sunt quis et. Mollitia quasi culpa et molestias quisquam nihil. Modi ducimus quis magnam.', 'Ullam dolorum placeat voluptas aut expedita autem aut. Nobis sint in doloremque veniam quam. Odit aut occaecati quod eos dolore error.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(109, 11, 'Libero aut ea et nobis aut. Id harum voluptates quis ut. Culpa sequi quis veniam fuga inventore.', 'Qui quo voluptatibus cumque deleniti saepe quia ipsa. Rerum est minus repellat nihil. Repellendus fugiat aut aut laboriosam.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(110, 11, 'At consequatur ducimus repudiandae dolor qui. Molestias quibusdam et quo quaerat.', 'Delectus sunt optio et. Totam cumque omnis dolorem repellat necessitatibus inventore. Debitis et quisquam qui recusandae beatae laborum quis consequatur.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(111, 12, 'Fugiat et nemo culpa omnis magnam libero. Eligendi quaerat cupiditate reiciendis et et.', 'Ullam quisquam veniam aut soluta vel. Enim ad porro porro est est.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(112, 12, 'Reiciendis porro magnam nemo ipsa ut natus. Aspernatur ut sunt incidunt harum reprehenderit soluta.', 'Reprehenderit voluptates ut esse non vitae molestias mollitia. Molestiae dignissimos repellat et. Aspernatur ipsa at enim ut eveniet. Quo deleniti repellat eveniet vel vitae.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(113, 12, 'Voluptas exercitationem dicta commodi dignissimos aperiam qui sit. Et itaque perferendis ut.', 'Sequi aliquam reiciendis porro repudiandae. Doloremque ut cupiditate voluptatum a assumenda.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(114, 12, 'Aspernatur magni quis numquam facilis. Commodi ab corrupti ea voluptates enim.', 'Assumenda officiis magni rerum. Consequatur veniam itaque similique enim dolor recusandae quae. Quidem laudantium rerum quam ad.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(115, 12, 'Excepturi sit id assumenda nemo. Repellat molestiae nihil odit. Adipisci est labore earum.', 'Corporis nihil quia vero dolore repudiandae est temporibus. Quis praesentium eos beatae dolores aliquam.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(116, 12, 'A qui sed eaque omnis voluptate. Fugit odit illo omnis ullam. Enim id incidunt iste temporibus non.', 'Dolores officia laudantium quia voluptates aut. Cupiditate ea aperiam exercitationem. Ut aut quasi rerum enim iusto tenetur rerum. Eum possimus voluptas quia modi.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(117, 12, 'Itaque aut ut non optio. Blanditiis optio aut occaecati quisquam. Fugiat facere omnis et.', 'Officia autem sint est quia. Ut nesciunt consequatur labore nemo natus. Nulla omnis sint iste dolorem aliquid voluptas nostrum qui. Quisquam maiores eos eos placeat quam commodi.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(118, 12, 'Corrupti beatae perferendis sunt. Esse et magni recusandae dolorum. Et repellat beatae dolorem.', 'Dolorum sit eos eius quis repellat nesciunt. Fugit fugiat amet numquam mollitia consequuntur est. Sed optio est ut est aspernatur et. Et magnam voluptatem quam et qui perferendis illo quasi.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(119, 12, 'Reiciendis quis numquam voluptas occaecati optio qui. Inventore expedita quam velit quia.', 'Reprehenderit quod sunt nihil cum aut et et. Aut ea quae sequi ipsam consectetur. Pariatur non nemo et distinctio.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(120, 12, 'Est quae ipsum doloribus dolore sed. Nemo facilis animi nam fugit.', 'Iusto facilis voluptatem consequatur expedita quos. Iusto consectetur qui expedita veritatis. Nihil dolor tempora ducimus dolor omnis qui vero maiores.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(121, 13, 'Voluptatem expedita enim tempora laboriosam harum quia repellendus. Nihil qui ad rerum quia.', 'Ea aut autem sint qui. Ut reiciendis consequatur adipisci maxime dolores eum. Perspiciatis aut magnam rerum aut quaerat. Animi et nemo ex molestiae hic.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(122, 13, 'Quia tempore sapiente cumque ea. Aut et quaerat hic libero ut. Aperiam modi aut corporis.', 'Dolor hic ea impedit. Quia expedita ut et harum praesentium impedit quam. Cupiditate quam voluptatem facere nemo reiciendis corrupti adipisci. Officiis aut odio sed molestiae et quod molestias.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(123, 13, 'Ea ad minus et ipsam qui et. Animi ea molestias consequuntur rerum.', 'Rerum rerum dolorem voluptatem animi qui. Quia minus ratione dolores fugiat quia. Vel id hic rem rerum itaque sint ad eos.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(124, 13, 'Deserunt consequatur aliquid in enim. In blanditiis aut est quia. Saepe fugiat itaque odio rerum.', 'Ut dolorum id et et consectetur animi. Rerum autem repellat esse totam. Exercitationem ipsam amet et recusandae quo. Et quia dolorem sit.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(125, 13, 'Est ut et iste incidunt illo et hic. Similique et ipsum nemo neque sint.', 'Est est sequi autem commodi consequatur qui. Asperiores dolores quo id dolore officiis aspernatur. Optio voluptas commodi magnam quidem omnis ipsa. Nulla corrupti ut adipisci magnam.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(126, 13, 'Iusto quae veritatis aperiam dolor omnis. Odio placeat eos nisi. Iure et sed quasi qui est sequi.', 'Molestiae aut fuga qui animi molestias voluptas illo. Quod a error aliquid ipsum qui. Aut vel quasi quia quae.', '2023-05-24 18:21:35', '2023-05-24 18:21:35'),
(127, 13, 'Minus et ea ea ducimus aliquam. Quo voluptates voluptatem vitae magnam rerum provident.', 'Vel corrupti commodi beatae sit iure eum eum. Eaque et esse porro suscipit non autem numquam voluptatibus. Animi cum labore ratione a id. Et dolore et sed aut nihil quod.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(128, 13, 'Ut autem quibusdam quo nobis fugit a voluptatibus. Labore aperiam quidem porro expedita provident.', 'Animi rerum fugiat molestias et. Sapiente est ex omnis porro at ea fugiat. Tempora officia ut porro accusamus repudiandae in magni. Sed atque rerum officiis maxime explicabo.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(129, 13, 'Et saepe dicta animi mollitia. Nam cum sunt accusantium.', 'Corrupti provident fugit reprehenderit quod aut sit dolore. Incidunt dolores itaque vel qui aut.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(130, 13, 'Aut et sint consequatur animi. Ratione dolore et a culpa.', 'Enim similique aliquam dignissimos recusandae quaerat voluptatem ut dolorem. Dolores consequatur accusamus voluptas magnam. Occaecati hic facere est assumenda et.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(131, 14, 'Vel delectus veniam a non ut. Dicta alias perferendis voluptatum perspiciatis.', 'Alias ratione qui facere quis occaecati. Nam illum est assumenda similique nihil ipsa reprehenderit neque. Doloribus molestiae facilis iure dicta rerum reiciendis reiciendis et.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(132, 14, 'Et ea nobis veritatis ut at nam animi. Nulla dolores quod at officia repellendus maxime.', 'Hic recusandae nesciunt placeat laudantium ab laborum fugit. Saepe possimus sunt optio repellendus. Omnis eaque et omnis. Facere autem voluptate sint rem. Magnam sit aut optio id labore aperiam et.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(133, 14, 'Ipsa temporibus eos eaque in rem est optio. Distinctio facilis quo ipsum aut soluta inventore.', 'Enim saepe eos facilis. Quae neque quam ullam fuga. Laudantium nobis necessitatibus aut aut voluptatum saepe est.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(134, 14, 'Et velit voluptas ab magnam. Temporibus corrupti in dolor.', 'Dolorum veniam deserunt non et nemo. Sint dolor nihil pariatur nesciunt placeat est rerum. Nesciunt rerum illo amet eum id error aut.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(135, 14, 'Quis autem ut eum saepe et et quis. Aspernatur dolor vitae doloribus quis.', 'Saepe consequuntur est vel beatae. Maiores ut occaecati eaque expedita. Earum fugit omnis odio sapiente.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(136, 14, 'Iste fuga est sit minima aut. Omnis qui autem voluptas nemo ut voluptas et.', 'Aut quia amet sed repudiandae nam maxime. Aliquid non omnis doloribus possimus neque ratione et inventore. Earum iusto quos eum quidem.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(137, 14, 'Et non laudantium id laudantium est commodi. Blanditiis aut aperiam neque eum est.', 'Ut saepe et voluptatem tenetur. Unde quidem laboriosam laudantium fuga. Temporibus expedita minima ut consequatur. Ullam eum et aut culpa impedit itaque dolorem.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(138, 14, 'Atque ratione quia quod illo harum aut perspiciatis. Maiores minima sit et recusandae.', 'Libero dolores numquam sunt rerum. Alias provident ex assumenda eveniet odit qui.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(139, 14, 'Sunt esse quis et. Voluptate dolor quia repellat aut est.', 'Quis soluta mollitia esse quidem. Explicabo vero et exercitationem consequatur distinctio vel voluptates. Qui voluptate vel ipsam consectetur.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(140, 14, 'Placeat et qui amet hic. Neque ut natus omnis mollitia consequatur.', 'Enim omnis iste nostrum occaecati. Totam earum est facere quod sint. Debitis enim nobis facilis.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(141, 15, 'Tempora ad rerum optio unde. Et dolorum rem aut nulla. Cumque et qui pariatur vel.', 'Similique sed suscipit placeat aut. Deserunt possimus non reiciendis itaque tempora numquam labore.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(142, 15, 'Dolores aut sapiente dolorum alias dolor autem. Ab adipisci quis dolores. Aut sed aut reiciendis.', 'Aperiam quia nostrum qui qui neque. Rerum suscipit ab qui. Quia reprehenderit repellendus quis rerum.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(143, 15, 'Quod a et sequi dolore. Earum voluptas fuga delectus. Quo neque ea corrupti alias.', 'Quos magni excepturi sit corporis vel quia natus. Illum est omnis natus error maxime nostrum.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(144, 15, 'Ut id amet enim. Libero voluptatem aut sequi iste.', 'Exercitationem eligendi fuga id quos aut sequi et. Animi nemo eos repellendus enim et.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(145, 15, 'Totam neque velit officia ut consequuntur velit. Tempora quis natus dolore quo vitae et.', 'Rerum est sint tempora soluta delectus aut. Minima dolorum culpa est impedit velit adipisci non. Molestiae et eos et voluptatibus magnam sequi. Cum quia maxime facere qui est voluptatibus.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(146, 15, 'Asperiores suscipit atque est sapiente voluptates nam et. Quo ipsum enim ut voluptas perspiciatis.', 'Sequi reprehenderit est corporis et dolor ullam et. Illo nulla sed illo magnam. Et tempora quia ducimus architecto quo quia. Blanditiis est dolor dolor doloribus qui.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(147, 15, 'Dolore ex est assumenda tempora quidem unde. Distinctio nihil enim omnis sed.', 'Ullam corrupti perferendis sit dolores ut. Architecto in quo cupiditate dolores. Omnis non asperiores alias vel omnis.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(148, 15, 'Eos rerum et qui. Sequi omnis sapiente omnis sunt.', 'Rem facilis nobis laudantium et. Voluptatibus inventore quo esse enim eum. Est asperiores at ea hic tenetur magnam nisi. Sint delectus est aperiam a optio ex exercitationem.', '2023-05-24 18:21:36', '2023-05-24 18:21:36'),
(149, 15, 'Veniam dolor eos dicta autem dolorem. Magnam consequuntur accusantium quo aspernatur pariatur.', 'Beatae sit quas nesciunt eaque ipsam quis. Id voluptates quis illo aut ullam iste. Commodi quis minus explicabo repudiandae ut.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(150, 15, 'Culpa fugiat numquam magni. Delectus voluptatem est quam nisi vel qui.', 'Sint nulla est omnis et ut ab. Voluptatem sunt sunt at illum est rerum. Exercitationem nulla nesciunt eligendi dolor. Cum quo eos vitae animi id.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(151, 16, 'Quaerat nesciunt dolore amet dolorum a. Expedita aspernatur odio saepe tempora.', 'Voluptatem ut omnis nesciunt praesentium optio sed. Quia dolorem modi placeat autem qui.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(152, 16, 'At ab quia maxime ea eum. Optio assumenda eos provident. Ipsa nobis optio est et.', 'Et est quis laboriosam. Expedita perspiciatis quae sequi aut vel aspernatur laboriosam. Perspiciatis omnis rerum quae id unde. Qui eveniet illo dolorem ut velit fuga ab. Et rerum qui iure.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(153, 16, 'Sed sed vero sit ut sint est sed. In nostrum omnis est reiciendis. A similique sunt est.', 'Enim eius eum nemo. Tempore cumque minima voluptatem repellendus non rerum. Sed in qui voluptate sapiente ut dolores eum non. Facilis fugit et repellat alias voluptates molestiae eveniet.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(154, 16, 'Ipsam eius error et ea vitae tempora. Ea soluta dolores quidem. Nihil quibusdam explicabo et qui.', 'Distinctio iure eos ut voluptatem eos asperiores aut. Excepturi sed nesciunt perspiciatis facere ullam nisi temporibus veniam. Est ut atque velit similique quis officia.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(155, 16, 'Sed deserunt quam voluptatem sit voluptas facere et. Qui beatae ut ratione est.', 'Velit ut est fugiat voluptatem. Est ad iure et ut.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(156, 16, 'Unde occaecati est delectus dolorum totam. Qui asperiores nihil eum cum nihil iure numquam.', 'Voluptatem unde optio quia fugit quas repellat. Sint ex distinctio natus quas qui hic. Repellendus soluta velit quas eum cupiditate debitis.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(157, 16, 'Ut inventore voluptates facere sed aperiam. Ut et itaque rerum dolores omnis consequatur.', 'Aliquam iure ea est eligendi provident deleniti doloremque. Ipsa nihil aperiam iure fugit asperiores tempora. Quo ipsum in aperiam labore sed.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(158, 16, 'Suscipit qui soluta vitae tempore suscipit illum. Molestiae et sunt voluptas earum aut est.', 'Illo vero voluptas architecto quia vitae. Porro nemo quisquam odio ut optio ipsa magni iste. Accusamus porro similique qui saepe aut aut.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(159, 16, 'Enim quo explicabo non. Distinctio sequi veritatis id qui animi.', 'Dolor assumenda qui aut inventore ut dolorum quo aut. Qui molestiae tempora voluptatem ad totam dolorum. Minus et vero animi exercitationem.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(160, 16, 'Rerum rerum sint autem voluptatibus ea vero. Quia sint omnis consequatur totam ipsa.', 'Aut dolorem suscipit ut numquam. Et quia et aut. Labore illo nemo et minus minus doloribus.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(161, 17, 'Neque aut voluptatibus omnis ipsa. Et et sunt quia nostrum.', 'Nihil est qui doloremque cupiditate facilis. Cupiditate aperiam iste ut inventore. Maiores doloribus et ad qui perferendis.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(162, 17, 'Optio explicabo provident pariatur. Dolor non recusandae possimus magni.', 'Aut distinctio aut dolorum sed ipsa quasi ad. Iusto illo sed quisquam ipsum dolores et voluptatem. Et est quis sit minus assumenda. Et nemo fugit molestiae unde veniam eaque iusto voluptate.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(163, 17, 'Veritatis error nobis qui illum in autem quia cupiditate. Ea ea doloremque sit.', 'Blanditiis vel sit animi dicta porro magni. Qui voluptas dolorem et sed dolor et. Sit dolorem quia autem sint et.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(164, 17, 'Doloribus non aut cupiditate magnam. Ut ipsum nulla quis magnam.', 'Qui eveniet tenetur aperiam. Eos totam voluptate molestias et quis non.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(165, 17, 'Aut voluptate architecto sint et. Sunt unde sed perspiciatis provident.', 'Possimus qui eos doloribus soluta qui. Quidem qui id suscipit beatae repellendus. Et id debitis nobis ut sunt. Ab totam a magnam enim porro in doloribus.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(166, 17, 'Qui in iste ut nam et. Iste ut quis ab corporis dolorem. Harum sit optio fuga atque optio ad fugit.', 'Aut adipisci et quaerat numquam. Velit in in sapiente quod. Dolore voluptatem molestiae maxime numquam tenetur expedita autem.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(167, 17, 'Magnam ut quam sint quisquam dolores. Cum tempore ut enim minus vel.', 'Aut sed mollitia libero praesentium vitae consequatur. Qui unde iure quibusdam iste. Omnis architecto et dolorum doloribus.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(168, 17, 'Magni ipsum corrupti similique quia repudiandae ut. Perspiciatis atque quas qui id inventore.', 'Placeat laudantium occaecati aut qui. Eos impedit laudantium in distinctio est laboriosam similique. Iste iure quod eveniet.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(169, 17, 'Veritatis quam quia quos ut aspernatur et. Ab sunt accusamus sit sit.', 'Explicabo sed exercitationem animi facere. Tempora itaque dolor ex sequi temporibus. Cumque voluptatum quo ut omnis commodi aspernatur ipsam.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(170, 17, 'Culpa impedit quam labore. Dolore nulla nemo rem illum tenetur. Laudantium et ut ullam voluptatem.', 'Velit qui id esse. Sed et tempora dolorum eos repellendus nulla sed aliquid. Expedita nemo quae optio eveniet rerum accusamus. Iure nulla non aspernatur.', '2023-05-24 18:21:37', '2023-05-24 18:21:37'),
(171, 18, 'Et impedit repudiandae impedit. Aliquam eveniet quisquam sunt. Ut iure sit cupiditate ad.', 'Reprehenderit quaerat aut aut eveniet nisi aliquam. Qui quo odio architecto praesentium quaerat aperiam commodi.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(172, 18, 'Est qui et excepturi. Molestiae vel ea nemo corporis eos. Debitis minima libero eos nihil quas.', 'Autem rem aliquid ut cum. Dolores veritatis velit natus illum consequatur. Quibusdam excepturi nesciunt dolorem similique suscipit.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(173, 18, 'Quo illum eum et repudiandae. Qui sit quidem minus nam.', 'Ut et nesciunt perferendis voluptatibus sed ipsum aut. Exercitationem ipsam voluptatum necessitatibus in est. Deleniti enim libero pariatur ea quia ut aliquid. Voluptas qui ullam corporis.', '2023-05-24 18:21:38', '2023-05-24 18:21:38');
INSERT INTO `quiz_questions` (`id`, `quiz_id`, `question`, `answer_explanation`, `created_at`, `updated_at`) VALUES
(174, 18, 'Repellat iure quibusdam placeat molestiae sed. Ea doloremque quidem sequi autem eum iste.', 'Qui accusantium voluptate voluptatem aperiam officia. Ad molestias non maxime reiciendis placeat voluptatem et. Voluptas est blanditiis aut natus et excepturi voluptatem explicabo.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(175, 18, 'Fugiat a non similique animi repellat officiis. Maiores illum est aperiam voluptatem omnis cum.', 'Quo hic voluptas quia fuga tempora quae. Est ut libero est et id omnis temporibus. Assumenda suscipit ut officiis velit molestiae. Repudiandae enim a qui ratione provident.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(176, 18, 'Ut eligendi et pariatur ipsum voluptas et soluta. Et quaerat porro tempore expedita.', 'Omnis eius odit minima cupiditate ullam. Recusandae eum repellendus qui expedita tempore. Quis animi modi aut.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(177, 18, 'Aspernatur hic qui totam reiciendis. Sed neque est illum. Dolores temporibus ipsa inventore.', 'Et repellat molestiae error aut. Quos omnis nostrum dicta praesentium fugit ex. Et cumque nostrum voluptatem.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(178, 18, 'Voluptates deserunt ea ea ea et ab ut. Recusandae ut in id quia. Aliquam delectus dolor ut placeat.', 'Ex modi est incidunt atque. Tenetur eaque nisi suscipit. Necessitatibus nulla enim qui alias. Rerum voluptates omnis quia et.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(179, 18, 'Voluptatum non non distinctio veritatis. Excepturi est rerum et autem repellendus.', 'Eos vero commodi ipsa consectetur porro ea aperiam. Alias est enim aspernatur debitis a cupiditate possimus voluptates. Expedita officia aut eveniet in molestiae quo.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(180, 18, 'Fuga magni rerum omnis debitis quia. Reprehenderit id veniam illo ut laudantium ipsam placeat.', 'Ipsa ullam quisquam dolore repudiandae deserunt a. Iste aut consequuntur autem quasi qui eius maiores. Eligendi voluptatum deleniti ullam praesentium.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(181, 19, 'Optio sed pariatur ducimus eaque earum. Minus voluptatum laboriosam quia.', 'Aut facere et et dolorem excepturi eaque. Optio eum eligendi ut et cum temporibus. Maxime voluptatem ea commodi non. Excepturi et nam et quia fuga perspiciatis.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(182, 19, 'Sunt et magnam assumenda vel est eum. In sunt qui consectetur. Mollitia et ea ullam sed.', 'Tempora tenetur odit ex commodi ea beatae. Magnam saepe aut itaque voluptate. Enim iure perferendis possimus nesciunt enim optio.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(183, 19, 'Dolor ullam ipsa et qui quia. Quo suscipit quia consectetur similique debitis ut.', 'Rerum voluptatem atque eveniet et dolor quod. Qui dicta facere aut. Quae voluptas qui velit eligendi ut.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(184, 19, 'Iusto consequuntur amet nostrum voluptas laboriosam nulla. Est vel facilis voluptas et ut.', 'Maxime delectus asperiores soluta commodi qui. Nihil cum cupiditate quia.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(185, 19, 'Odit dolores dolorum dicta quae. Rem et deserunt sequi nam. Dolorem voluptate omnis ea ut aut quos.', 'Voluptatem occaecati non quia quaerat. Est omnis omnis suscipit dignissimos dolor sed sunt. Beatae rerum soluta minima aut. Maxime suscipit amet ipsa excepturi quasi.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(186, 19, 'Aperiam vel ullam numquam. Excepturi vero tenetur et. Eveniet ea eum tempora ipsam quia est.', 'Expedita deserunt illo nobis aut consequatur. Illum sapiente ab totam quasi quod qui nam. Adipisci alias ea illo quia iure. Nostrum earum facilis et.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(187, 19, 'Veritatis quos quaerat quidem. Molestiae aliquam placeat eaque ut molestiae voluptas at.', 'Culpa atque itaque nam ut qui. Sequi necessitatibus qui magnam. Omnis sapiente reprehenderit modi eaque iste aperiam ipsam.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(188, 19, 'Id omnis rem qui cupiditate id suscipit. Recusandae ut nam temporibus incidunt veritatis qui.', 'Sunt aperiam eaque dicta et suscipit ut. Voluptatem perferendis facere incidunt eos dolore. Corrupti velit cumque voluptas culpa. Et animi consequuntur tenetur ipsam in debitis recusandae.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(189, 19, 'Omnis et laborum sit eum cum est. Eum ea cumque repudiandae.', 'Voluptatem ab quod quod. Eos ut qui unde exercitationem. Culpa incidunt non iusto totam nemo.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(190, 19, 'Et corporis sit cumque et. Veniam et voluptas veniam et veniam quo.', 'Nulla perspiciatis quasi doloremque et nemo fugit. Facere voluptatem error reprehenderit. Eum quo unde eaque.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(191, 20, 'Eos repudiandae eum assumenda laborum. Molestiae qui corrupti qui et exercitationem est.', 'Ipsa qui autem laudantium et iste. Magni autem dolores ea quae culpa. Atque ut voluptatem rerum soluta fuga laboriosam. Et amet voluptatum rerum ipsa doloribus.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(192, 20, 'Eum et omnis itaque quo quidem. Praesentium temporibus sint sit in.', 'Distinctio debitis non nobis aut quia. Repellendus fugit omnis nulla vel est. Ea fugiat cumque rerum. Ab ea ipsa aut facere in voluptas sunt.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(193, 20, 'Deleniti corrupti dignissimos maxime repudiandae qui totam autem. Vel dolor rerum dolores.', 'Repellat excepturi natus voluptatem nam. Et non esse voluptas aut. Et facilis impedit atque sapiente. Quaerat consectetur hic facilis porro fuga est.', '2023-05-24 18:21:38', '2023-05-24 18:21:38'),
(194, 20, 'Quia odio et dolor. Qui minima maxime est praesentium est. Est iure laboriosam sunt.', 'Amet quo itaque nemo ipsa totam. Sunt non eaque ex iste voluptatibus dolores. Numquam sed vel dignissimos consequatur qui sit vitae eligendi.', '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(195, 20, 'Dicta illum ex aut qui. Ut non aut dolorum ex. Asperiores voluptatem quasi odit et dolor.', 'Repudiandae et voluptates qui ab aliquid. Eos repellendus dolorum rerum ipsum quidem rerum ut error. Quos beatae aut perspiciatis nemo. Quasi dolor debitis iusto et minus adipisci est.', '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(196, 20, 'Commodi recusandae tempore perferendis officia. Sed quia voluptatem est voluptas.', 'Minus dolor nam earum sed unde. Dolorum doloremque voluptate quasi recusandae hic eos id. Sed deserunt exercitationem aliquid.', '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(197, 20, 'Harum vero quae corrupti ea et sit. Blanditiis voluptates dolore alias.', 'Vel et id hic iste dolores. Assumenda ex natus delectus mollitia. Fugit nesciunt nihil fuga qui qui nisi est accusamus. Numquam porro quaerat rerum consequatur.', '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(198, 20, 'Consequatur tempora accusamus illum fuga. Ut dolor atque dolor eos ex.', 'Voluptatibus eveniet voluptatum sed. Alias porro omnis quia ad quia. Officia minima omnis qui. Nihil dicta consequatur nobis omnis cumque consequatur excepturi quas.', '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(199, 20, 'Autem cumque quis et est velit aliquid. Veritatis rerum facilis et aperiam fugiat id.', 'Officiis qui eos sequi tenetur quia ex quia. Laudantium ex pariatur consequuntur ratione molestiae culpa. Aliquam incidunt consectetur quibusdam molestiae. Sit quasi autem et qui necessitatibus iste.', '2023-05-24 18:21:39', '2023-05-24 18:21:39'),
(200, 20, 'Modi asperiores iusto praesentium pariatur. Est velit in quidem quos cumque.', 'Consequuntur voluptas occaecati iusto consequatur. Aut molestiae et rerum nemo iste rerum dolores id. Sit nihil ut sed dolorum minus. Voluptates quia adipisci iure rerum molestias.', '2023-05-24 18:21:39', '2023-05-24 18:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` enum('Finished','Ongoing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ongoing',
  `user_id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `attempt` int(11) NOT NULL,
  `qna` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`qna`)),
  `total_questions` int(11) DEFAULT NULL,
  `unanswered_questions` int(11) DEFAULT NULL,
  `correct_answer` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `time_left` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `born_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` enum('default','cerulean','cosmo','flatly','journal','lumen','materia','minty','sandstone','simplex','sketchy','spacelab','united','yeti','zephyr') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_admin`, `email`, `full_name`, `avatar`, `born_date`, `number`, `gender`, `theme`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('01h17fx6yvf89re9ft71sh0v60', 1, 'admin@example.com', 'admin', NULL, NULL, NULL, 'Laki-laki', 'default', '$2y$10$yG/ynmi5JPX/7T.g/s7QzOD56s22eNPU8STbCmQS/19SlWQ8qQRAe', NULL, '2023-05-24 18:21:28', '2023-05-24 18:21:28'),
('01h17fx71mcntj45cxw4xsvhxy', 0, 'user@example.com', 'user', NULL, NULL, NULL, 'Laki-laki', 'default', '$2y$10$VMAYVpvxE2nfLGEJltb8B.UgbNNAy.QSnqI4lM0fZ3htUSJlAE856', 'p4XyzCplYlXjAiq0wVrhlb9hvGh7hiJdFrzDR2ixg3rZaYX9iSTnOWXcvLeD', '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
('01h17fx74dzj5wx3nt48mw1mwc', 0, 'yuliarti.zelaya@yahoo.co.id', 'Cagak Pangestu M.M.', NULL, NULL, NULL, 'Perempuan', 'default', '$2y$10$0fmtv5C87GPDmIMv9NIIAumkU4/t28pbzwjtgzfn7oqc2ConNzWzu', NULL, '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
('01h17fx777ehem38z5xwwykct9', 0, 'raisa92@gmail.co.id', 'Nyana Hidayanto', NULL, NULL, NULL, 'Laki-laki', 'default', '$2y$10$5mlRb6kIhwt5apixFKE.0eKM7c1Ow7jJ9oLt0h3zdp0UlzhcOnXae', NULL, '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
('01h17fx79zeg6eg5c039twmxkv', 0, 'sirait.gabriella@yahoo.co.id', 'Mustika Najmudin', NULL, NULL, NULL, 'Perempuan', 'default', '$2y$10$uTkGmzBO8.c53ywdNnX9Sesux4prUsfEStoVo0ZOsqG404bia9lgO', NULL, '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
('01h17fx7cwvgzxzha85wg28f99', 0, 'qsimanjuntak@yahoo.com', 'Karimah Safitri S.E.I', NULL, NULL, NULL, 'Laki-laki', 'default', '$2y$10$UeCdtYrQRUTF4/ZTDLWy6uMvr5qVNp.ygmTpm2bssy.Q9WJUM9U4a', NULL, '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
('01h17fx7fq1cs6r7p8p4e0h1x1', 0, 'mulyanto56@gmail.co.id', 'Jaeman Suwarno S.I.Kom', NULL, NULL, NULL, 'Perempuan', 'default', '$2y$10$TcbNSlyFn5D09YbJsg5mi.tJIhMbTkxxx9Uco2WE9cCsVK3FC0fQW', NULL, '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
('01h17fx7jjas9e7s4963mqzget', 0, 'mhariyah@yahoo.co.id', 'Dian Calista Mandasari S.Pd', NULL, NULL, NULL, 'Perempuan', 'default', '$2y$10$Uhr7fzcYFIcfX/WE5HywB.GmAh2R6hYiImc/7BaJFp0bcu2dUWhRy', NULL, '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
('01h17fx7nbd0getzefq935x6jr', 0, 'amelia78@gmail.com', 'Yunita Pratiwi S.Pt', NULL, NULL, NULL, 'Laki-laki', 'default', '$2y$10$RZXaEoNFCN5WWf1QhLjeyO30dEPvRKgY7Bv37SlIkmwa91xuRAb62', NULL, '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
('01h17fx7r316babqhwenqbgaj5', 0, 'kusumo.sabar@gmail.co.id', 'Nova Zulaika', NULL, NULL, NULL, 'Perempuan', 'default', '$2y$10$e0XMveH6AoqS8uSK3Msok.WWoGZJ9xjwYFj3dtpb3JUgHfQgy.1xS', NULL, '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
('01h17fx7tvk6ecce5463d7zv9t', 0, 'bmanullang@gmail.com', 'Timbul Mustika Habibi S.E.I', NULL, NULL, NULL, 'Laki-laki', 'default', '$2y$10$67wymeZEcQr8MlLPSTUBxeyDvhCPScc0yWRCLGz.NlfBElyF/SqMa', NULL, '2023-05-24 18:21:29', '2023-05-24 18:21:29'),
('01h17fx7xpt29jsrbew4zgcrp0', 0, 'najmudin.syahrini@gmail.co.id', 'Julia Julia Padmasari M.Kom.', NULL, NULL, NULL, 'Perempuan', 'default', '$2y$10$1UP9FXzkU.olV4u0k4JOu.NhLTU9moKMyBDN/vLOsKZu6o/raE4ia', NULL, '2023-05-24 18:21:29', '2023-05-24 18:21:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_user_id_foreign` (`user_id`),
  ADD KEY `activities_course_id_foreign` (`course_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_code_unique` (`code`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_title_unique` (`title`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`),
  ADD KEY `courses_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_course_id_foreign` (`course_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_course_id_foreign` (`course_id`);

--
-- Indexes for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_answers_quiz_question_id_foreign` (`quiz_question_id`);

--
-- Indexes for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_attempts_user_id_foreign` (`user_id`),
  ADD KEY `quiz_attempts_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_results_user_id_foreign` (`user_id`),
  ADD KEY `quiz_results_quiz_id_foreign` (`quiz_id`);

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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;

--
-- AUTO_INCREMENT for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD CONSTRAINT `quiz_answers_quiz_question_id_foreign` FOREIGN KEY (`quiz_question_id`) REFERENCES `quiz_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD CONSTRAINT `quiz_attempts_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_attempts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
