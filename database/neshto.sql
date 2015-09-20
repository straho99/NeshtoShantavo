-- phpMyAdmin SQL Dump
-- version 4.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2014 at 06:29 AM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `www_neshto`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `categories_id` int(11) unsigned NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `isPrivate` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `user_id`, `categories_id`, `name`, `isPrivate`) VALUES
(1, 1, 1, 'Шантавини', 0),
(2, 1, 0, 'Лични', 1),
(3, 3, 1, 'Шантави картинки', 0),
(4, 4, 1, 'Забавни картинки', 0),
(5, 5, 1, 'Шантави', 0),
(6, 1, 5, 'Пикантерии', 0),
(7, 3, 5, 'Яки какички', 0),
(8, 1, 3, 'Страхотии', 0),
(9, 4, 3, 'Хорър', 0),
(10, 4, 4, 'Красиво', 0),
(11, 9, 2, 'Нещо сладко', 0),
(12, 9, 1, 'Лудница', 0),
(13, 9, 5, '...and she know it!', 0),
(14, 10, 1, 'Планински щуротии', 0),
(15, 10, 2, 'Сладури', 0),
(16, 10, 1, 'Футболни', 0),
(17, 9, 3, 'Кофти тръпка', 0),
(18, 6, 1, 'Fight me', 0),
(19, 6, 2, 'Dogs', 0),
(20, 12, 4, 'Планински', 0),
(21, 15, 1, 'kasskata say hello', 0),
(22, 3, 1, 'aaa', 0),
(23, 16, 4, 'Nature', 0),
(24, 1, 1, 'тест', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(4) unsigned NOT NULL,
  `order` int(4) unsigned NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `order`, `name`, `slug`) VALUES
(1, 1, 'Шантаво', 'shantavo'),
(2, 2, 'Сладко', 'sladko'),
(3, 4, 'Страшно', 'strashno'),
(4, 3, 'Красиво', 'krasivo'),
(5, 5, 'Секси', 'sexy');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `album_id` int(11) unsigned NOT NULL,
  `title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `isPrivate` tinyint(1) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `uploaded_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `user_id`, `album_id`, `title`, `filename`, `size`, `isPrivate`, `votes`, `uploaded_at`) VALUES
(1, 1, 1, 'Българските ВВС', 'wtfAirForce.jpg', 59291, 0, 15, '2014-12-15 12:19:43'),
(2, 1, 1, 'Овца пие вода от чешма', 'wtfSheep.jpg', 59240, 0, 11, '2014-12-15 12:19:57'),
(3, 1, 1, 'Усмихни се бе', 'usmihniSeBe.jpg', 42633, 0, 18, '2014-12-15 12:19:57'),
(4, 3, 7, 'Пикачу', 'jessica-nirgi-pikachu.jpg', 34195, 0, 11, '2014-12-15 17:51:25'),
(5, 3, 7, 'Тест', 'jessica_nigri-153.jpg', 34195, 0, 12, '2014-12-15 17:51:25'),
(6, 1, 1, 'Microsoft Office отбор в CS GO', 'csgoMicrosoftOffice.jpg', 497212, 0, 4, '2014-12-15 23:19:43'),
(7, 3, 3, 'Условно образование', 'uslovnoObrazovanie.jpg', 22492, 0, 11, '2014-12-16 15:21:25'),
(8, 3, 3, 'Инженерна мисъл', 'lionEngineer.jpg', 32114, 0, 13, '2014-12-16 15:21:25'),
(9, 1, 1, 'Луд Японец', 'wtfAsian.jpg', 88083, 0, 3, '2014-12-16 13:23:24'),
(10, 1, 1, 'Стийм съпорт', 'steamsupport-edited.png', 237658, 0, 2, '2014-12-16 13:27:35'),
(11, 3, 3, 'Ококорено дърво', 'wtfTree.jpg', 155692, 0, 3, '2014-12-16 13:35:20'),
(12, 4, 9, 'Зверче', 'scary-1.jpg', 33558, 0, 2, '2014-12-16 14:55:29'),
(13, 4, 9, 'Страшни очи', 'funny_scary_people.jpg', 14934, 0, 1, '2014-12-16 14:56:43'),
(14, 4, 4, 'Бяла лястовица', 'бяла–лястовица.jpg', 24326, 0, 4, '2014-12-16 22:20:26'),
(15, 4, 10, 'Коте с различно оцветени очи', 'cat.jpg', 65978, 0, 8, '2014-12-16 22:25:05'),
(16, 9, 11, 'бeбе NERD', 'html-for-babies.jpg', 51336, 0, 3, '2014-12-16 22:34:38'),
(17, 9, 11, '"Весела коледа!"', 'awesome-dad-fatherhood-moments-25__605.jpg', 190345, 0, 3, '2014-12-16 22:35:51'),
(18, 9, 11, 'Как да не го Елмарнеш!', 'beutifull-cat-wallpaper.jpg', 82540, 0, 2, '2014-12-16 22:36:55'),
(19, 9, 12, 'Лакомийка...', 'hamster-eating1.jpg', 88991, 0, 2, '2014-12-16 22:41:29'),
(20, 9, 13, 'body #bigT {size:150%}', 'image.jpg', 115806, 0, 4, '2014-12-16 22:49:19'),
(21, 10, 14, 'Безбожко хорце', '_8090072.jpg', 852316, 0, 2, '2014-12-17 11:33:46'),
(22, 10, 15, 'The next big thing', '_7120040.jpg', 489273, 0, 1, '2014-12-17 11:39:54'),
(23, 10, 16, 'Е тва е вратар', 'De-Gea1.jpg', 365059, 0, 4, '2014-12-17 11:51:13'),
(24, 9, 13, '"Нуждая се от медицинска помощ!"', '51yZDkNA5cL._UL1500_.jpg', 91769, 0, 3, '2014-12-17 15:00:24'),
(25, 9, 11, 'Johnson''s baby', 'Sweet-Baby-sweety-babies-25909592-2560-1600.jpg', 501740, 0, 2, '2014-12-17 15:42:42'),
(26, 9, 17, 'Творението на Stephen King''s', '08-Pennywise.jpg', 50536, 0, 3, '2014-12-17 16:08:30'),
(27, 6, 18, 'Ела ми, Кличко!', 'fun29-495x400.jpg', 80971, 0, 3, '2014-12-17 19:04:53'),
(28, 6, 19, 'Such Wow!', 'TzVjIXv2.jpeg', 108892, 0, 1, '2014-12-17 19:13:45'),
(29, 1, 6, 'PHP Developer', 'PHP-Developer.jpg', 240804, 0, 2, '2014-12-17 21:19:33'),
(30, 1, 1, 'Голям Кондор', 'bigCondor.png', 490798, 0, 2, '2014-12-17 22:34:08'),
(31, 3, 3, 'Шантави кецове', 'crazyShoes.jpg', 72572, 0, 2, '2014-12-18 00:12:12'),
(32, 12, 20, 'Красив пейзаж', '_8090129.jpg', 1011696, 0, 3, '2014-12-18 09:14:33'),
(33, 1, 1, 'Стрес на работното място', 'kim-jong-un-designing-institute-korean-peoples-army.jpg', 1066110, 0, 1, '2014-12-18 16:15:13'),
(34, 15, 21, 'kasskata', 'superman.jpeg', 181864, 0, 1, '2014-12-18 17:27:36'),
(35, 16, 23, 'Sky', '46.jpg', 561989, 0, 0, '2014-12-18 17:28:40'),
(36, 15, 21, 'br', '213802.jpg', 694403, 0, 0, '2014-12-18 17:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(5) unsigned NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(1) NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `first_name`, `last_name`, `sex`, `email`, `isActive`, `isAdmin`, `created_at`, `updated_at`) VALUES
(1, 'Roumen', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', 'nELa9FdjkXXiEsDKkZofI0a4w2QeOJnraUa1NH23MmYJS9m0OuC3fBzdNEXR', 'Румен', 'Дамянов', 1, 'roumen@roumen.it', 1, 1, '2014-12-11 13:36:21', '2014-12-18 08:57:35'),
(3, 'Demo', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', 'dUj4S6trqQkFQ8xWTTXhIQDDxdRXQQhIVg8Z5mLwRSKpQTmigVvHeXH6ZcIR', 'Демо', 'Демов', 1, 'demo@shantavo.com', 1, 1, '2014-12-14 10:11:20', '2014-12-17 08:04:15'),
(4, 'Test', '$2y$10$nHF5N.jwjlkKBXovsRwl3ul5zQAPOek91lDM3uttVe3oXbHOX.uPW', '3io0lt9NwgEeRU3tIqHUngWqVq9OeJuvhEaPAhSZl7Hg7tZJHy1LbdhJIKSu', 'Тестчо', 'Тестев', 1, 'test@shantavo.com', 1, 1, '2014-12-14 10:18:59', '2014-12-16 13:30:21'),
(5, 'SvetlinNakov', '$2y$10$/XVa/h4OgQ31usERMZrM2uaXxd6AJplE0.WHRPTw3s3w2nJDloVya', 'Ljs06LzhhZjyu5Fzu1BzxIkxj7qIRHqQrmTPB9SaR03ANxuEji1C5NR864u8', 'Светлин', 'Наков', 1, 'nakov@softuni.bg', 1, 0, '2014-12-14 12:36:09', '2014-12-16 11:02:25'),
(6, 'aivian', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', 'ZewtNi6aDeRlklclG8ExIIToQjZFWLR2Ls6jJ2P2zTIPS3QdnLHLiF8QsWJV', 'Иван', 'Гарнизов', 1, 'ivan4otopa@abv.bg', 1, 1, '2014-12-14 14:43:48', '2014-12-16 11:03:09'),
(7, 'straho', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', 'fvwDbjgCAWmbFjlJGnTuAQebHkszhkmduQBW2kJIFHn7ubd26ddezlTp3ka0', 'Star', 'Ruychev', 1, 'strahil.ruychev@gmail.com', 1, 1, '2014-12-16 01:13:22', '2014-12-16 11:03:09'),
(8, 'Страхо', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', 'U35b0Hm7XgTXVt6kcbSXK9ADfB4ooe3ZRCev8xrJkNMSHhKGPpYwsZh88qei', 'Страхил', 'Руйчев', 1, 'strahil.ruychev@icloud.com', 1, 1, '2014-12-16 01:22:36', '2014-12-16 11:03:09'),
(9, 'Penev', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', '3DilykdcfWrjkiqYU556hw13XRfcngaD4rZCJFy7AVf7euQo7K94B097PQRw', 'Teodor', 'Georgiev ', 1, 't.penev@abv.bg', 1, 1, '2014-12-16 05:41:04', '2014-12-16 11:03:37'),
(10, 'Страхил', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', 'ffJiGVpCAZyWDebaqf4yFhSKBoudSrdmyTK6LnG2YKa04Xmln1C73WkWKokN', 'Страхил', 'Руйчев', 2, 'straho@abv.bg', 0, 1, '2014-12-16 06:37:26', '2014-12-18 14:41:56'),
(11, 'gganev', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', 'PJsnFFHt6GZP1eZ5q1xf1S6dB1zuNcrDVwy560pL8SsZiepQ6AfwR44VSu0Q', 'Георги', 'Ганев', 1, 'georgi_d_g1@abv.bg', 0, 0, '2014-12-17 13:06:10', '2014-12-17 04:06:10'),
(12, 'strahil', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', 'wWEyz3p9yafz9CVLlTaLR22RH1YEy3Ns15Vof1ltY5CyDXogcjEpAUNgBDaT', 'Strahil', 'Ruychev', 1, 'straho@mail.bg', 0, 0, '2014-12-18 09:12:35', '2014-12-18 00:18:56'),
(13, 'tester1', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', 'iSbwAGrJlrf90SHK6tQdXaB7RX2mlniskyx7w0VqKXx6aZtJdRYKXCug5mOl', 'Test', 'Testov', 2, 'tester1@gmail.com', 0, 0, '2014-12-18 09:17:10', '2014-12-18 00:18:34'),
(14, 'tester2', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', '9nsOVJuwqXW6gd1y3JCpKqXmNL7FLAlI1ozpTjQZD7vabGC7vED5A9MAcWLM', 'Tester2', 'Testosterone', 2, 'tester2@gmail.com', 0, 0, '2014-12-18 09:19:53', '2014-12-18 00:20:47'),
(15, 'kassskata', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', 'fiXX8heNWLHzMSVbB8mR62f5eHKGtat3ZYaKOnnA6ctMfK1qO8sQlzw79uDN', 'kasskata', 'ana', 1, 'kasskata@abv.bg', 0, 0, '2014-12-18 17:25:36', '2014-12-18 15:46:03'),
(16, 'ime1234567890', '$2y$10$RiBYpC0gtv.sFNhUJVUVj.fE8hCBPrrQaIhrlvCnXhlTmL98PAy8O', 'yvgj7s41DepGGTulq3QCcfyBQYTpWsQGtVhR5h9ih5Gba6GZiPoe5Nv8QNLK', 'ime', 'familiya', 2, 'ime@abv.bg', 0, 0, '2014-12-18 17:27:41', '2014-12-18 08:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `picture_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`picture_id`, `user_id`) VALUES
(3, 1),
(1, 1),
(2, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(3, 4),
(1, 4),
(4, 4),
(8, 4),
(7, 4),
(2, 4),
(3, 6),
(1, 6),
(4, 6),
(3, 3),
(4, 3),
(5, 3),
(8, 3),
(2, 3),
(7, 3),
(9, 1),
(10, 1),
(11, 3),
(3, 9),
(12, 4),
(13, 4),
(11, 1),
(14, 4),
(11, 4),
(10, 4),
(9, 4),
(15, 4),
(15, 3),
(14, 3),
(9, 3),
(1, 3),
(16, 1),
(15, 1),
(14, 1),
(18, 1),
(7, 9),
(19, 1),
(14, 9),
(20, 1),
(17, 1),
(17, 10),
(16, 10),
(5, 10),
(1, 10),
(7, 10),
(20, 10),
(8, 10),
(2, 10),
(22, 1),
(23, 10),
(23, 1),
(20, 9),
(24, 9),
(23, 9),
(25, 9),
(24, 1),
(25, 1),
(23, 6),
(27, 10),
(26, 10),
(27, 1),
(15, 10),
(28, 1),
(26, 1),
(26, 9),
(16, 3),
(17, 3),
(2, 9),
(18, 3),
(5, 9),
(19, 3),
(24, 3),
(20, 3),
(27, 3),
(12, 3),
(29, 1),
(6, 3),
(30, 1),
(30, 3),
(29, 3),
(21, 3),
(21, 1),
(31, 3),
(31, 1),
(32, 12),
(32, 1),
(33, 1),
(32, 16),
(34, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD KEY `slug` (`slug`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `album_id` (`album_id`), ADD KEY `votes` (`votes`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
 ADD KEY `picture_id` (`picture_id`), ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
