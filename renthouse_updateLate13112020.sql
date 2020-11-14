/*
 Navicat Premium Data Transfer

 Source Server         : demo
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : renthouse

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 13/11/2020 23:02:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for city
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `create_by` int(11) NOT NULL DEFAULT 0,
  `update_by` int(11) NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES (1, 'Hà Nội', 3, 3, 1, NULL, NULL);
INSERT INTO `city` VALUES (2, 'Lào Cai', 3, NULL, 0, NULL, NULL);
INSERT INTO `city` VALUES (3, 'Hạ Long', 5, 5, 1, '2020-11-13 14:10:21', '2020-11-13 15:43:36');
INSERT INTO `city` VALUES (5, 'TP Hồ Chí Minh', 5, NULL, 1, '2020-11-13 15:56:21', '2020-11-13 15:56:21');

-- ----------------------------
-- Table structure for district
-- ----------------------------
DROP TABLE IF EXISTS `district`;
CREATE TABLE `district`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `city_id` int(11) NOT NULL DEFAULT 0,
  `create_by` int(11) NOT NULL DEFAULT 0,
  `update_by` int(11) NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of district
-- ----------------------------
INSERT INTO `district` VALUES (1, 'Đông Anh', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (2, 'Cầu Giấy', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (3, 'Đống Đa', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (4, 'Thanh Xuân', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (5, 'Tây Hồ', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (6, 'Hoàn Kiếm', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (7, 'Ba Đình', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (8, 'Hai Bà Trưng', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (9, 'Hoàng Mai', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (10, 'Long Biên', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (11, 'Nam Từ Liêm', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (12, 'Bắc Từ Liêm', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (13, 'Hà Đông', 1, 3, 3, 1, NULL, NULL);
INSERT INTO `district` VALUES (16, 'Dung Nguyen', 2, 5, 5, 1, '2020-11-13 14:37:18', '2020-11-13 14:42:35');
INSERT INTO `district` VALUES (17, 'Belier', 3, 5, NULL, 1, '2020-11-13 15:55:09', '2020-11-13 15:55:09');

-- ----------------------------
-- Table structure for facilities
-- ----------------------------
DROP TABLE IF EXISTS `facilities`;
CREATE TABLE `facilities`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `require` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of facilities
-- ----------------------------
INSERT INTO `facilities` VALUES (1, 'Phòng tắm', 0, 1, '0000-00-00 00:00:00', NULL);
INSERT INTO `facilities` VALUES (2, 'Phòng tắm khép kín', 1, 1, NULL, NULL);
INSERT INTO `facilities` VALUES (3, 'Bình nóng lạnh', 1, 1, NULL, NULL);
INSERT INTO `facilities` VALUES (4, 'Điều hòa', 0, 1, NULL, NULL);
INSERT INTO `facilities` VALUES (5, 'Ban công', 0, 1, NULL, NULL);
INSERT INTO `facilities` VALUES (6, 'Tủ lạnh', 0, 0, NULL, NULL);
INSERT INTO `facilities` VALUES (7, 'Máy giặt', 0, 0, NULL, NULL);
INSERT INTO `facilities` VALUES (8, 'Giường', 0, 0, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_11_09_175050_create_room_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_11_09_175153_create_room_type_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_11_09_175256_create_user_comment_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_11_09_175338_create_user_vote_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_11_09_175435_create_user_like_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_11_09_175524_create_notify_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_11_09_175704_create_user_report_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_11_09_175746_create_user_views_table', 1);
INSERT INTO `migrations` VALUES (11, '2020_11_09_175828_create_district_table', 1);
INSERT INTO `migrations` VALUES (12, '2020_11_09_175904_create_city_table', 1);
INSERT INTO `migrations` VALUES (13, '2020_11_09_175959_create_relation_address_table', 1);
INSERT INTO `migrations` VALUES (14, '2020_11_09_180157_create_room_relation_address_table', 1);
INSERT INTO `migrations` VALUES (15, '2020_11_09_180240_create_facilities_table', 1);
INSERT INTO `migrations` VALUES (16, '2020_11_09_180440_create_room_facilities_table', 1);
INSERT INTO `migrations` VALUES (17, '2020_11_09_182748_create_room_image_table', 1);
INSERT INTO `migrations` VALUES (18, '2020_11_09_182855_create_order_table', 1);
INSERT INTO `migrations` VALUES (19, '2020_11_09_185537_create_cities_table', 1);

-- ----------------------------
-- Table structure for notify
-- ----------------------------
DROP TABLE IF EXISTS `notify`;
CREATE TABLE `notify`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receive_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `content` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `facilities_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `price` double(8, 2) NOT NULL DEFAULT 0.00,
  `order_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_id` int(11) NOT NULL DEFAULT 0,
  `approved_date` datetime(0) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for relation_address
-- ----------------------------
DROP TABLE IF EXISTS `relation_address`;
CREATE TABLE `relation_address`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `roomType_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `district_id` int(11) NOT NULL DEFAULT 0,
  `city_id` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` double(20, 2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `area` double NOT NULL DEFAULT 0,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `live_with_owner` int(11) NOT NULL DEFAULT 0,
  `public_date` date NULL DEFAULT NULL,
  `expired_date` date NULL DEFAULT NULL,
  `electric_price` double(8, 2) NOT NULL DEFAULT 0.00,
  `water_price` int(11) NOT NULL DEFAULT 0,
  `approval_date` date NULL DEFAULT NULL,
  `approval_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `price_unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extend_date` datetime(0) NULL DEFAULT NULL,
  `canbe_edit` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES (1, 1, 'Ha Noi', 'day la 1 bai test', '42 yên hòa , cầu giấy , hà nội', 1, 1, 3, 999999.99, 'https://i.imgur.com/PIfDxwn.jpg', 0, 'gần đại học quốc gia hà nội', 1, '2020-11-12', '2020-11-12', 3000.00, 3000, '2020-11-12', 1, 1, 0, NULL, NULL, '', NULL, NULL);
INSERT INTO `room` VALUES (2, 1, 'Sai Gon', 'day la 1 bai test', '42 yên hòa , cầu giấy , hà nội', 1, 1, 3, 999999.99, 'https://i.imgur.com/PIfDxwn.jpg', 0, 'gần đại học quốc gia hà nội', 1, '2020-11-12', '2020-11-12', 3000.00, 3000, '2020-11-12', 1, 1, 0, NULL, NULL, '', NULL, NULL);
INSERT INTO `room` VALUES (3, 1, 'Chung Cu', 'day la 1 bai test', '42 yên hòa , cầu giấy , hà nội', 1, 1, 3, 999999.99, 'https://i.imgur.com/PIfDxwn.jpg', 0, 'gần đại học quốc gia hà nội', 1, '2020-11-12', '2020-11-12', 3000.00, 3000, '2020-11-12', 1, 1, 0, NULL, NULL, '', NULL, NULL);
INSERT INTO `room` VALUES (4, 1, 'Dat o', 'day la 1 bai test', '42 yên hòa , cầu giấy , hà nội', 1, 1, 3, 999999.99, 'https://i.imgur.com/PIfDxwn.jpg', 0, 'gần đại học quốc gia hà nội', 1, '2020-11-12', '2020-11-12', 3000.00, 3000, '2020-11-12', 1, 1, 0, NULL, NULL, '', NULL, NULL);
INSERT INTO `room` VALUES (5, 1, 'Dong Anh', 'day la 1 bai test', '42 yên hòa , cầu giấy , hà nội', 1, 1, 3, 999999.99, 'https://i.imgur.com/PIfDxwn.jpg', 0, 'gần đại học quốc gia hà nội', 1, '2020-11-12', '2020-11-12', 3000.00, 3000, '2020-11-12', 1, 1, 0, NULL, NULL, '', NULL, NULL);
INSERT INTO `room` VALUES (6, 1, 'Belier', 'day la 1 bai test', '42 yên hòa , cầu giấy , hà nội', 1, 1, 3, 999999.99, 'https://i.imgur.com/PIfDxwn.jpg', 0, 'gần đại học quốc gia hà nội', 1, '2020-11-12', '2020-11-12', 3000.00, 3000, '2020-11-12', 1, 1, 0, NULL, NULL, '', NULL, NULL);
INSERT INTO `room` VALUES (8, 0, 'Luka Modric', 'belier', 'DAV', 0, 0, 2, 1000000.00, 'uploads/room/1605280506_124572185_3185365711569107_1989024877858944999_o.jpg', 30, 'assadasdasd', 1, NULL, NULL, 3000.00, 2000, '2020-11-13', 1, 5, 1, '2020-11-13 15:15:06', '2020-11-13 15:42:01', 'Tháng', NULL, NULL);

-- ----------------------------
-- Table structure for room_facilities
-- ----------------------------
DROP TABLE IF EXISTS `room_facilities`;
CREATE TABLE `room_facilities`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `facilities_id` int(11) NOT NULL DEFAULT 0,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room_facilities
-- ----------------------------
INSERT INTO `room_facilities` VALUES (1, 8, 1, NULL, NULL, NULL);
INSERT INTO `room_facilities` VALUES (2, 8, 4, NULL, NULL, NULL);
INSERT INTO `room_facilities` VALUES (3, 8, 6, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for room_image
-- ----------------------------
DROP TABLE IF EXISTS `room_image`;
CREATE TABLE `room_image`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room_image
-- ----------------------------
INSERT INTO `room_image` VALUES (1, 8, 'uploads/room/1605280506_118641206_3244593622290217_8666695886033189326_n.jpg', 0, '2020-11-13 15:15:06', '2020-11-13 15:15:06');
INSERT INTO `room_image` VALUES (2, 8, 'uploads/room/1605280506_120743470_2710507029165311_7046762498728120901_o.jpg', 1, '2020-11-13 15:15:06', '2020-11-13 15:15:06');

-- ----------------------------
-- Table structure for room_relation_address
-- ----------------------------
DROP TABLE IF EXISTS `room_relation_address`;
CREATE TABLE `room_relation_address`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `relation_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for room_type
-- ----------------------------
DROP TABLE IF EXISTS `room_type`;
CREATE TABLE `room_type`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `create_by` int(11) NOT NULL DEFAULT 0,
  `update_by` int(11) NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room_type
-- ----------------------------
INSERT INTO `room_type` VALUES (1, 'Chung cư', 4, 3, 1, NULL, NULL);
INSERT INTO `room_type` VALUES (2, 'Nhà mặt đất', 4, 3, 1, NULL, NULL);

-- ----------------------------
-- Table structure for user_comment
-- ----------------------------
DROP TABLE IF EXISTS `user_comment`;
CREATE TABLE `user_comment`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `is_approved` int(1) NOT NULL DEFAULT 0,
  `approved_by` int(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_comment
-- ----------------------------
INSERT INTO `user_comment` VALUES (1, 2, 1, '22226785349534958934534', NULL, '2020-11-12 09:21:27', 1, 5);
INSERT INTO `user_comment` VALUES (3, 3, 3, '6789453543', NULL, NULL, 1, NULL);

-- ----------------------------
-- Table structure for user_like
-- ----------------------------
DROP TABLE IF EXISTS `user_like`;
CREATE TABLE `user_like`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user_report
-- ----------------------------
DROP TABLE IF EXISTS `user_report`;
CREATE TABLE `user_report`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receive_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `content` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `sender_id` int(100) NOT NULL,
  `approved_by` int(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_report
-- ----------------------------
INSERT INTO `user_report` VALUES (1, 1, 'Không đúng sự thật', 'Không có điều hòa', 1, NULL, NULL, 5, 5);
INSERT INTO `user_report` VALUES (3, 2, 'This is a report', 'This is a report', 1, NULL, '2020-11-12 16:37:59', 2, 5);
INSERT INTO `user_report` VALUES (4, 2, 'This is a report', 'This is a report', 0, NULL, NULL, 3, NULL);
INSERT INTO `user_report` VALUES (5, 2, 'This is a report', 'This is a report', 0, NULL, NULL, 4, NULL);

-- ----------------------------
-- Table structure for user_views
-- ----------------------------
DROP TABLE IF EXISTS `user_views`;
CREATE TABLE `user_views`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `date_views` datetime(0) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user_vote
-- ----------------------------
DROP TABLE IF EXISTS `user_vote`;
CREATE TABLE `user_vote`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `star` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `approval_id` int(11) NULL DEFAULT NULL,
  `date_approval` date NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'Tr Binh Giang', '22/09/2001', '0123456987', '10032001', 'bgtr@gmail.com', '$2y$10$JMMkMn7aYIrdOos5Z7uVkewGRikSna/XIPUldPMqygfpBgVFYxkTi', 'uploads/user/1605087758_118641206_3244593622290217_8666695886033189326_n.jpg', 1, 1, 'Ho Chi Minh City, Vietnam', NULL, NULL, NULL, '2020-11-11 08:59:06', '2020-11-11 09:42:38');
INSERT INTO `users` VALUES (3, 'Mouse', '22/09/2001', '0123456789', '88886789', 'miasoya@gmail.com', '$2y$10$v26MlFmqYXjY2NPLzLvxa.a16y/aSG.IVDoRorLc88BITu9RAdRyy', 'uploads/user/1605087789_jisooyah.jfif', 2, 0, 'DAV', NULL, NULL, NULL, '2020-11-11 09:43:09', '2020-11-11 14:25:54');
INSERT INTO `users` VALUES (4, 'Mimosa', '23/10/1992', '0349625555', '19024705183012', 'mimosachu@gmail.com', '$2y$10$BcZwqyNWlwIH4W9Mh0.CDuwFwoElZnHP7xsOHnMnYpM2vQgNIdwdS', 'uploads/user/1605103552_SophieCheneviere_belierskate_021.jpg', 2, 1, 'Hang Dau', NULL, NULL, NULL, '2020-11-11 14:05:52', '2020-11-11 14:17:08');
INSERT INTO `users` VALUES (5, 'N M Dung', '22/09/2001', '0366065647', '19024705183012', 'devergo@gmail.com', '$2y$10$QSjnMlDMVKw.S78VONZuWuxvPEkf4OMqTUPl9H5Ano4qOi0lPuxh6', NULL, 1, 1, 'Dong Anh - Ha Noi', NULL, NULL, NULL, '2020-11-11 14:47:10', '2020-11-11 14:47:10');

SET FOREIGN_KEY_CHECKS = 1;
