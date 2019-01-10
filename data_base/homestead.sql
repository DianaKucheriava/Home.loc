/*
 Navicat Premium Data Transfer

 Source Server         : ConnectDB
 Source Server Type    : MySQL
 Source Server Version : 50637
 Source Host           : localhost:3306
 Source Schema         : homestead

 Target Server Type    : MySQL
 Target Server Version : 50637
 File Encoding         : 65001

 Date: 10/01/2019 10:57:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for city
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city`  (
  `id_city` int(11) NOT NULL,
  `city` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_country` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_city`) USING BTREE,
  INDEX `id_country`(`id_country`) USING BTREE,
  INDEX `id_region`(`id_region`) USING BTREE,
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `city_ibfk_2` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES (1, 'Кременчук', 1, 1, NULL, NULL);
INSERT INTO `city` VALUES (2, 'Горішні Плавні', 1, 1, NULL, NULL);
INSERT INTO `city` VALUES (3, 'Полтава', 1, 1, NULL, NULL);
INSERT INTO `city` VALUES (4, 'Київ', 1, 4, NULL, NULL);
INSERT INTO `city` VALUES (5, 'Чернігів', 1, 2, NULL, NULL);
INSERT INTO `city` VALUES (6, 'Хмельницьк', 1, 3, NULL, NULL);
INSERT INTO `city` VALUES (7, 'Шепетівка', 1, 3, NULL, NULL);
INSERT INTO `city` VALUES (8, 'Львів', 1, 5, NULL, NULL);
INSERT INTO `city` VALUES (9, 'Одесса', 1, 6, NULL, NULL);
INSERT INTO `city` VALUES (10, 'Тула', 2, 7, NULL, NULL);
INSERT INTO `city` VALUES (11, 'Москва', 2, 8, NULL, NULL);

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `parent_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 1, 0, 'm;l;lm;lmlm', 3, 'App\\Post', '2018-12-20 13:12:55', '2018-12-20 13:12:55');
INSERT INTO `comments` VALUES (2, 2, 0, 'fine, thanks!)', 4, 'App\\Post', '2018-12-20 13:31:43', '2018-12-20 13:31:43');
INSERT INTO `comments` VALUES (3, 2, NULL, 'fine!', 4, 'App\\Post', '2018-12-20 13:35:40', '2018-12-20 13:35:40');
INSERT INTO `comments` VALUES (4, 2, 3, 'fine, thanks!)', 4, 'App\\Post', '2018-12-20 13:39:42', '2018-12-20 13:39:42');
INSERT INTO `comments` VALUES (5, 2, 4, 'fine!', 4, 'App\\Post', '2018-12-20 13:39:55', '2018-12-20 13:39:55');
INSERT INTO `comments` VALUES (6, 1, NULL, 'Happy to you!', 9, 'App\\Post', '2019-01-03 10:28:53', '2019-01-03 10:28:53');
INSERT INTO `comments` VALUES (7, 1, NULL, 'jnoijo', 10, 'App\\Post', '2019-01-03 10:56:40', '2019-01-03 10:56:40');
INSERT INTO `comments` VALUES (8, 9, NULL, 'mlkml', 13, 'App\\Post', '2019-01-09 09:09:53', '2019-01-09 09:09:53');

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country`  (
  `id_country` int(11) NOT NULL,
  `country` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_country`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES (1, 'Україна', NULL, NULL);
INSERT INTO `country` VALUES (2, 'Росія', NULL, NULL);
INSERT INTO `country` VALUES (3, 'Білорусія', NULL, NULL);
INSERT INTO `country` VALUES (4, 'Польща', NULL, NULL);
INSERT INTO `country` VALUES (5, 'Румунія', NULL, NULL);
INSERT INTO `country` VALUES (6, 'Чехія', NULL, NULL);
INSERT INTO `country` VALUES (7, 'Португалія', NULL, NULL);
INSERT INTO `country` VALUES (8, 'Норвегія', NULL, NULL);
INSERT INTO `country` VALUES (9, 'Німеччина', NULL, NULL);
INSERT INTO `country` VALUES (10, 'Аргентина', NULL, NULL);
INSERT INTO `country` VALUES (11, 'Франція', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_12_20_103045_create_posts_table', 1);
INSERT INTO `migrations` VALUES (4, '2018_12_20_103500_create_comments_table', 1);
INSERT INTO `migrations` VALUES (5, '2018_12_20_142155_create_state_city_tables', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('diankakucheriava@gmail.com', '$2y$10$B2DkqHr7ahzsRqun7vAL0.8L6wXbJy1kyIm5oElXgZ.VY7dbmJhBy', '2019-01-08 16:37:07');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 'klnlksanc', 'knlaksnclknlkzx', '2018-12-20 12:09:21', '2018-12-20 12:09:21');
INSERT INTO `posts` VALUES (2, 'klnskdnc', 'lkmsaklmlckd ;lcdmslc \'a;s\';vvsd', '2018-12-20 12:16:27', '2018-12-20 12:16:27');
INSERT INTO `posts` VALUES (3, 'mklmlkmkmklm', ';l;l;lmlmmkl', '2018-12-20 12:17:22', '2018-12-20 12:17:22');
INSERT INTO `posts` VALUES (4, 'New post', 'Hy! How are you guys?', '2018-12-20 13:29:25', '2018-12-20 13:29:25');
INSERT INTO `posts` VALUES (5, 'scs', '1ll', '2018-12-20 13:38:41', '2018-12-20 13:38:41');
INSERT INTO `posts` VALUES (6, 'бд', 'бд', '2018-12-20 13:43:12', '2018-12-20 13:43:12');
INSERT INTO `posts` VALUES (7, 'New year', 'Happy!', '2018-12-20 13:58:00', '2018-12-20 13:58:00');
INSERT INTO `posts` VALUES (8, 'Marry Christmas!', 'What do you think about Christmas?', '2018-12-21 13:40:47', '2018-12-21 13:40:47');
INSERT INTO `posts` VALUES (9, 'Cristmas!', 'Happy!', '2019-01-03 10:28:05', '2019-01-03 10:28:05');
INSERT INTO `posts` VALUES (10, 'jomlk', 'oijijoi', '2019-01-03 10:56:33', '2019-01-03 10:56:33');
INSERT INTO `posts` VALUES (11, 'Святкування різдва!', 'Традиції приготування святкового столу.', '2019-01-03 12:26:20', '2019-01-03 12:26:20');
INSERT INTO `posts` VALUES (12, 'Cristmas!', '\'\';.\';.\';ffsdd', '2019-01-08 09:15:47', '2019-01-08 09:15:47');
INSERT INTO `posts` VALUES (13, 'jomlkm,', 'kmmlkm', '2019-01-09 09:09:44', '2019-01-09 09:09:44');

-- ----------------------------
-- Table structure for region
-- ----------------------------
DROP TABLE IF EXISTS `region`;
CREATE TABLE `region`  (
  `id_region` int(11) NOT NULL,
  `region` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_country` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_region`) USING BTREE,
  INDEX `id_country`(`id_country`) USING BTREE,
  INDEX `id_city`(`id_region`) USING BTREE,
  CONSTRAINT `region_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of region
-- ----------------------------
INSERT INTO `region` VALUES (1, 'Полтавська обл.', 1, NULL, NULL);
INSERT INTO `region` VALUES (2, 'Чернігівська обл.', 1, NULL, NULL);
INSERT INTO `region` VALUES (3, 'Хмельницька обл.', 1, NULL, NULL);
INSERT INTO `region` VALUES (4, 'Київська обл.', 1, NULL, NULL);
INSERT INTO `region` VALUES (5, 'Львівська обл.', 1, NULL, NULL);
INSERT INTO `region` VALUES (6, 'Одеська обл.', 1, NULL, NULL);
INSERT INTO `region` VALUES (7, 'Тульська обл.', 2, NULL, NULL);
INSERT INTO `region` VALUES (8, 'Московська обл.', 2, NULL, NULL);
INSERT INTO `region` VALUES (9, 'Бремен', 9, NULL, NULL);
INSERT INTO `region` VALUES (10, 'Гамбург', 9, NULL, NULL);
INSERT INTO `region` VALUES (11, 'Оксітанія', 11, NULL, NULL);
INSERT INTO `region` VALUES (12, 'Нормандія', 11, NULL, NULL);
INSERT INTO `region` VALUES (13, 'Западно-Поморское ', 4, NULL, NULL);
INSERT INTO `region` VALUES (14, 'Варминьско-Мазурское', 4, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_country` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `email_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `verified` tinyint(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_country`(`id_country`) USING BTREE,
  INDEX `id_region`(`id_region`) USING BTREE,
  INDEX `id_city`(`id_city`) USING BTREE,
  INDEX `avatar`(`avatar`) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'George', 'george@gmail.com', '$2y$10$DR9O1Cm2ljYoe1t5H/L93eEVRFx9aA9DegARe/1QneacCz0VhxxTS', '1546518806.jpg', 2, 8, 11, 'tHPZkdpZoAlCcKXdrYni1X7lGD9kYR2aoxilFsLk9GsbWN9AvwEm7p8LQbGo', '2018-12-20 11:12:42', '2019-01-03 12:33:26', NULL, NULL);
INSERT INTO `users` VALUES (2, 'Diana', 'diana@gmail.com', '$2y$10$sxaI/QhR.Yzk.DZXTiTMhOg2uFvi6NzltqA4EPqc4eCT/0uGWNnb.', 'zaika.jpg', 1, 2, 5, 'ujtKaYbr2V8gO3kdrFtSLonHyY4UrQV2Qiu1zBYEiY55ZLOkltpfRlWNQqAr', '2018-12-20 13:28:42', '2018-12-25 15:18:57', NULL, NULL);
INSERT INTO `users` VALUES (6, 'Sava', 'sava@gmail.com', '$2y$10$GrKCskX63DBLtR8VKYgfpeNOzHB4Z/aah/8vLtfz/8wnF1f0/GMte', 'default.jpg', 1, 2, 5, 'ToxzqN0gZil0W57m1nbSZmjb2JDzkkudx163sSVUR4TPrPMFhFt6SvnM4nf9', '2018-12-21 13:33:04', '2018-12-21 13:33:04', NULL, NULL);
INSERT INTO `users` VALUES (7, 'george', 'georges@gmail.com', '$2y$10$ZyvAmtMWstIIoczRhjxXJu56oQ45Z6FdQ4R97C/0t50lr/FnoBhum', 'default.jpg', 1, 2, 5, 'x3CUHAE2ncmqW1FyJUqJYuq8xV3fVj0FhMy5M59LE8bgRmMtl7N48ChQgkPr', '2019-01-08 12:49:22', '2019-01-08 12:49:22', NULL, NULL);
INSERT INTO `users` VALUES (9, 'Bob', 'bob@gmail.com', '$2y$10$QkK3pLaUU.ZunEQbKL/MI.4mto.XjeS9pxG.akMkkvgXuZY2exHcy', 'default.jpg', 1, 4, 4, 'otumkjdwCHttCaRfYzQLKQtETRmyqlcanCGpKwqPqrQOF8WviUKFES6TLC6O', '2019-01-09 08:59:32', '2019-01-09 08:59:32', NULL, NULL);
INSERT INTO `users` VALUES (59, 'georgeг', 'georghe@gmail.com', '$2y$10$hPoae/OSa4chBKVNlFEStOmED4y2kZZXMh.u8zHtENLVD01muoiF2', 'default.jpg', 1, 2, 5, NULL, '2019-01-09 17:05:15', '2019-01-09 17:05:29', 'Z2VvcmdoZUBnbWFpbC5jb20=', 1);
INSERT INTO `users` VALUES (60, 'Sofa', 'sofa@yandex.ru', '$2y$10$QPMpRjqNvrHuVnVHbalGce21PPCfd2qMkD68yA4xHPEJQ5QovJ5nm', 'default.jpg', 1, 3, 6, NULL, '2019-01-09 17:09:09', '2019-01-09 17:09:59', 'c29mYUB5YW5kZXgucnU=', 1);

-- ----------------------------
-- View structure for ll
-- ----------------------------
DROP VIEW IF EXISTS `ll`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`%` SQL SECURITY DEFINER VIEW `ll` AS select `country`.`id_country` AS `id_country`,`users`.`updated_at` AS `updated_at` from ((((`city` join `country` on((`city`.`id_country` = `country`.`id_country`))) join `region` on(((`region`.`id_country` = `country`.`id_country`) and (`city`.`id_region` = `region`.`id_region`)))) join `users` on(((`city`.`id_city` = `users`.`id_city`) and (`region`.`id_region` = `users`.`id_region`) and (`country`.`id_country` = `users`.`id_country`)))) join `comments` on((`comments`.`user_id` = `users`.`id`)));

SET FOREIGN_KEY_CHECKS = 1;
