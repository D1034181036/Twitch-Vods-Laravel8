-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2022 年 02 月 18 日 09:23
-- 伺服器版本： 8.0.23
-- PHP 版本： 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `twitch`
--
CREATE DATABASE IF NOT EXISTS `twitch` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `twitch`;

-- --------------------------------------------------------

--
-- 資料表結構 `access_log`
--

CREATE TABLE `access_log` (
  `id` int NOT NULL,
  `page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `update_log`
--

CREATE TABLE `update_log` (
  `id` int NOT NULL,
  `insert_count` tinyint NOT NULL,
  `update_count` tinyint NOT NULL,
  `set_active_count` tinyint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `display_name`, `profile_image_url`, `created_at`, `updated_at`) VALUES
(6, 527352521, 'shadowings_', 'shadowings_', 'https://static-cdn.jtvnw.net/jtv_user_pictures/d2853274-5c98-4f77-8e99-10f174fc6fa7-profile_image-300x300.png', '2022-02-04 16:10:20', '2022-02-04 16:10:20'),
(13, 23072667, 'julian2468', 'julian2468', 'https://static-cdn.jtvnw.net/jtv_user_pictures/219924bb-a02c-4aee-a336-19ee025aa338-profile_image-300x300.png', '2022-02-05 01:02:58', '2022-02-05 01:02:58'),
(14, 90660398, 'widderson', 'widderson', 'https://static-cdn.jtvnw.net/jtv_user_pictures/71b4b9f2-dda7-46d9-acbc-0276faecb8f2-profile_image-300x300.png', '2022-02-05 01:03:10', '2022-02-05 01:03:10'),
(15, 104748743, 'pennywiseuk', 'PennywiseUK', 'https://static-cdn.jtvnw.net/jtv_user_pictures/d2271d54-138c-447d-9306-9ab83c2873ec-profile_image-300x300.jpg', '2022-02-05 01:03:17', '2022-02-05 01:03:17'),
(16, 42974843, 'the_ssp', 'The_SSP', 'https://static-cdn.jtvnw.net/jtv_user_pictures/0f7c7342-1788-4ab5-b24d-306948971cd9-profile_image-300x300.png', '2022-02-05 01:03:25', '2022-02-05 01:03:25'),
(18, 76361668, 'mastersaiyajin', 'MasterSaiyajin', 'https://static-cdn.jtvnw.net/jtv_user_pictures/7c3debb2-148b-4b42-a832-f7c74342889d-profile_image-300x300.png', '2022-02-05 01:03:40', '2022-02-05 01:03:40'),
(19, 52177456, 'jokeonu1', 'jokeonu1', 'https://static-cdn.jtvnw.net/jtv_user_pictures/96bfc97f-7ee9-4c2d-b713-59b4a2a55994-profile_image-300x300.png', '2022-02-05 01:03:48', '2022-02-05 01:03:48'),
(20, 182143652, 'hrdbonny', 'HRDBonny', 'https://static-cdn.jtvnw.net/jtv_user_pictures/d401cdc9-167c-44e5-bd1c-74141f30a825-profile_image-300x300.png', '2022-02-05 01:04:00', '2022-02-05 01:04:00'),
(21, 102793511, 'toikan', 'Toikan', 'https://static-cdn.jtvnw.net/jtv_user_pictures/235435fc-e418-4a37-bd67-6f148f3cf887-profile_image-300x300.png', '2022-02-05 02:17:39', '2022-02-05 02:17:39'),
(22, 40830032, 'kingdanzz', 'Kingdanzz', 'https://static-cdn.jtvnw.net/jtv_user_pictures/53c25c46-d607-4d16-8e20-9251b354ec34-profile_image-300x300.png', '2022-02-06 11:44:14', '2022-02-06 11:44:14'),
(23, 113310810, 'ltd2', 'LTD2', 'https://static-cdn.jtvnw.net/jtv_user_pictures/13ccd94a-9d97-4467-8266-8effb608136a-profile_image-300x300.png', '2022-02-06 18:06:57', '2022-02-06 18:06:57'),
(26, 128711637, 'steeni69', 'Steeni69', 'https://static-cdn.jtvnw.net/jtv_user_pictures/83312506-a58b-4e8d-b73a-1cb16fecc6ab-profile_image-300x300.png', '2022-02-16 01:10:08', '2022-02-16 01:10:08');

-- --------------------------------------------------------

--
-- 資料表結構 `videos`
--

CREATE TABLE `videos` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `video_id` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewable` tinyint NOT NULL,
  `duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int NOT NULL,
  `published_at` datetime NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `access_log`
--
ALTER TABLE `access_log`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `update_log`
--
ALTER TABLE `update_log`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 資料表索引 `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `access_log`
--
ALTER TABLE `access_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `update_log`
--
ALTER TABLE `update_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
