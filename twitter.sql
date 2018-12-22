/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : twitter

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-12-23 00:47:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2', '2018_12_22_223951_create_twitt_likes_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_12_22_223951_create_twitts_table', '1');
INSERT INTO `migrations` VALUES ('4', '2018_12_22_223951_create_users_table', '1');
INSERT INTO `migrations` VALUES ('5', '2018_12_22_223952_add_foreign_keys_to_twitt_likes_table', '1');
INSERT INTO `migrations` VALUES ('6', '2018_12_22_223952_add_foreign_keys_to_twitts_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `twitts`
-- ----------------------------
DROP TABLE IF EXISTS `twitts`;
CREATE TABLE `twitts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `twitt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `twi_user_fk1` (`user_id`),
  CONSTRAINT `twi_user_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of twitts
-- ----------------------------
INSERT INTO `twitts` VALUES ('23', 'twitt1 by user 1', '5', '2018-12-22 21:51:39', '2018-12-22 21:51:39');
INSERT INTO `twitts` VALUES ('24', 'twit2 by user 2', '6', '2018-12-22 21:52:05', '2018-12-22 21:52:05');
INSERT INTO `twitts` VALUES ('25', 'twit3 by user 1', '5', '2018-12-22 21:52:16', '2018-12-22 21:52:16');
INSERT INTO `twitts` VALUES ('26', 'twit4 by user2', '6', '2018-12-22 21:53:04', '2018-12-22 21:53:04');
INSERT INTO `twitts` VALUES ('27', 'twit4 by user 1', '6', '2018-12-22 21:53:45', '2018-12-22 21:53:45');
INSERT INTO `twitts` VALUES ('28', 'twit5 by user 1', '6', '2018-12-22 21:54:02', '2018-12-22 21:54:02');

-- ----------------------------
-- Table structure for `twitt_likes`
-- ----------------------------
DROP TABLE IF EXISTS `twitt_likes`;
CREATE TABLE `twitt_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `twitt_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `twi_user_fk1` (`user_id`),
  KEY `twitt_likes_ibfk_2` (`twitt_id`),
  CONSTRAINT `twitt_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `twitt_likes_ibfk_2` FOREIGN KEY (`twitt_id`) REFERENCES `twitts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of twitt_likes
-- ----------------------------
INSERT INTO `twitt_likes` VALUES ('10', '5', '23', '2018-12-22 21:52:38', '2018-12-22 21:52:38');
INSERT INTO `twitt_likes` VALUES ('17', '6', '24', '2018-12-22 21:54:26', '2018-12-22 21:54:26');
INSERT INTO `twitt_likes` VALUES ('19', '6', '23', '2018-12-22 21:54:47', '2018-12-22 21:54:47');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('5', 'ahmed ali', 'ahmed333555777@gmail.com', '$2y$10$n3aI5rSMCXzDWu3pPg6xKeoBIAQOFlE3psO.FAPvzRce.Yi9bjYn6', 'hHOEFARZcOb5kxXy9QYJIAGwbzUQ5OKuR1BaS7l8AS7gSC8nDuSa5OsXRmCF', '2018-12-22 17:55:38', '2018-12-22 17:55:38');
INSERT INTO `users` VALUES ('6', 'Emad Mohamed', 'eng.emadmohamedphp@gmail.com', '$2y$10$4G2oE7MTUpRyWorWf/mlWuUuKzMMyvBv6cFqJqGR4yUj0yWYX2J6y', null, '2018-12-22 21:28:27', '2018-12-22 21:28:27');
