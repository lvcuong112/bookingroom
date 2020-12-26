-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 26, 2020 lúc 10:34 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookingroom`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` int(11) NOT NULL DEFAULT 0,
  `update_by` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `city`
--

INSERT INTO `city` (`id`, `name`, `create_by`, `update_by`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Hà Nội', 3, 3, 1, NULL, NULL),
(2, 'Lào Cai', 3, NULL, 0, NULL, NULL),
(3, 'Hạ Long', 5, 5, 1, '2020-11-13 07:10:21', '2020-11-13 08:43:36'),
(5, 'TP Hồ Chí Minh', 5, NULL, 1, '2020-11-13 08:56:21', '2020-11-13 08:56:21'),
(6, 'Ninh Bình', 5, NULL, 1, '2020-11-16 15:34:03', '2020-11-16 15:34:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) NOT NULL DEFAULT 0,
  `create_by` int(11) NOT NULL DEFAULT 0,
  `update_by` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`id`, `name`, `city_id`, `create_by`, `update_by`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Đông Anh', 1, 3, 3, 1, NULL, NULL),
(2, 'Cầu Giấy', 1, 3, 3, 1, NULL, NULL),
(3, 'Đống Đa', 1, 3, 3, 1, NULL, NULL),
(4, 'Thanh Xuân', 1, 3, 3, 1, NULL, NULL),
(5, 'Tây Hồ', 1, 3, 3, 1, NULL, NULL),
(6, 'Hoàn Kiếm', 1, 3, 3, 1, NULL, NULL),
(7, 'Ba Đình', 1, 3, 3, 1, NULL, NULL),
(8, 'Hai Bà Trưng', 1, 3, 3, 1, NULL, NULL),
(9, 'Hoàng Mai', 1, 3, 3, 1, NULL, NULL),
(10, 'Long Biên', 1, 3, 3, 1, NULL, NULL),
(11, 'Nam Từ Liêm', 1, 3, 3, 1, NULL, NULL),
(12, 'Bắc Từ Liêm', 1, 3, 3, 1, NULL, NULL),
(13, 'Hà Đông', 1, 3, 3, 1, NULL, NULL),
(16, 'Dung Nguyen', 2, 5, 5, 1, '2020-11-13 07:37:18', '2020-11-13 07:42:35'),
(17, 'Belier', 3, 5, NULL, 1, '2020-11-13 08:55:09', '2020-11-13 08:55:09'),
(18, 'Lê Cường', 6, 5, NULL, 1, '2020-11-16 15:34:21', '2020-11-16 15:34:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `extend_post`
--

CREATE TABLE `extend_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `total_price` double(8,2) NOT NULL DEFAULT 0.00,
  `quantity` int(5) NOT NULL COMMENT 'số tuần/tháng/năm muốn gia hạn',
  `approved_by` int(11) DEFAULT 0,
  `approved_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit_date` int(5) NOT NULL COMMENT 'loại thời gian : tuần/tháng/năm',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `extend_post`
--

INSERT INTO `extend_post` (`id`, `room_id`, `user_id`, `total_price`, `quantity`, `approved_by`, `approved_date`, `created_at`, `updated_at`, `unit_date`, `phone`) VALUES
(1, 8, 3, 50000.00, 1, NULL, '0000-00-00', NULL, '2020-11-15 08:54:07', 1, '0366065678'),
(2, 6, 3, 50000.00, 1, 5, '2020-11-15', NULL, '2020-11-15 08:57:23', 1, '0123456789'),
(3, 6, 3, 50000.00, 1, 5, '2020-11-15', NULL, '2020-11-15 14:24:50', 0, '0123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `facilities`
--

CREATE TABLE `facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `require` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `facilities`
--

INSERT INTO `facilities` (`id`, `title`, `parent_id`, `require`, `created_at`, `updated_at`) VALUES
(1, 'Phòng tắm', 0, 1, '0000-00-00 00:00:00', NULL),
(2, 'Phòng tắm khép kín', 1, 1, NULL, NULL),
(3, 'Bình nóng lạnh', 1, 1, NULL, NULL),
(4, 'Điều hòa', 0, 1, NULL, NULL),
(5, 'Ban công', 0, 1, NULL, NULL),
(6, 'Tủ lạnh', 0, 0, NULL, NULL),
(7, 'Máy giặt', 0, 0, NULL, NULL),
(8, 'Giường', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_09_175050_create_room_table', 1),
(4, '2020_11_09_175153_create_room_type_table', 1),
(5, '2020_11_09_175256_create_user_comment_table', 1),
(6, '2020_11_09_175338_create_user_vote_table', 1),
(7, '2020_11_09_175435_create_user_like_table', 1),
(8, '2020_11_09_175524_create_notify_table', 1),
(9, '2020_11_09_175704_create_user_report_table', 1),
(10, '2020_11_09_175746_create_user_views_table', 1),
(11, '2020_11_09_175828_create_district_table', 1),
(12, '2020_11_09_175904_create_city_table', 1),
(13, '2020_11_09_175959_create_relation_address_table', 1),
(14, '2020_11_09_180157_create_room_relation_address_table', 1),
(15, '2020_11_09_180240_create_facilities_table', 1),
(16, '2020_11_09_180440_create_room_facilities_table', 1),
(17, '2020_11_09_182748_create_room_image_table', 1),
(18, '2020_11_09_182855_create_order_table', 1),
(19, '2020_11_09_185537_create_cities_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notify`
--

CREATE TABLE `notify` (
  `id` int(10) UNSIGNED NOT NULL,
  `receive_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `be_seen` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `notify`
--

INSERT INTO `notify` (`id`, `receive_id`, `title`, `content`, `be_seen`, `created_at`, `updated_at`) VALUES
(1, 2, 'Thông báo', 'Đây là 1 thông báo', 0, NULL, NULL),
(2, 2, 'daylatitle', 'daylacontent', 0, '2020-11-15 14:09:22', '2020-11-15 14:09:22'),
(3, 3, 'Bài đăng Belier đã được gia hạn thành công!', 'Chào Jisoo !. Bài đăng của bạn đã được gia hạn thành công với mức phí 50000 VNĐ. Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi.', 0, '2020-11-15 14:24:50', '2020-11-15 14:24:50'),
(4, 2, 'Gia hạn bài đăng Belier bị từ chối !', 'Bởi vì chúng tôi không thích!. Chúng tôi rất tiếc khi không thể duyệt yêu cầu này.', 0, '2020-11-15 14:46:51', '2020-11-15 14:46:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `facilities_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_id` int(11) NOT NULL DEFAULT 0,
  `approved_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `relation_address`
--

CREATE TABLE `relation_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id` int(10) UNSIGNED NOT NULL,
  `roomType_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(11) NOT NULL DEFAULT 0,
  `city_id` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` int(20) UNSIGNED NOT NULL DEFAULT 1000,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` double NOT NULL DEFAULT 0,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_with_owner` int(11) NOT NULL DEFAULT 0,
  `public_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `electric_price` double(8,2) NOT NULL,
  `water_price` int(11) NOT NULL DEFAULT 0,
  `approval_date` date DEFAULT NULL,
  `approval_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `canbe_edit` int(1) DEFAULT 1,
  `views` int(255) DEFAULT 0,
  `rented` int(1) NOT NULL DEFAULT 0 COMMENT 'nhà trọ đã được cho thuê hay chưa',
  `is_approved` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id`, `roomType_id`, `title`, `description`, `address`, `district_id`, `city_id`, `quantity`, `price`, `image`, `area`, `note`, `live_with_owner`, `public_date`, `expired_date`, `electric_price`, `water_price`, `approval_date`, `approval_id`, `user_id`, `is_active`, `created_at`, `updated_at`, `price_unit`, `canbe_edit`, `views`, `rented`, `is_approved`) VALUES
(1, 1, 'Ha Noi', 'day la 1 bai test', '42 yên hòa , cầu giấy , hà nội', 1, 1, 3, 10000, 'https://i.imgur.com/PIfDxwn.jpg', 0, 'gần đại học quốc gia hà nội', 1, '2020-11-12', '2020-11-12', 3000.00, 3000, '2020-11-12', 2, 1, 1, NULL, NULL, '', 1, NULL, 0, NULL),
(2, 1, 'Sai Gon', 'day la 1 bai test', '42 yên hòa , cầu giấy , hà nội', 1, 1, 3, 20000, 'https://i.imgur.com/PIfDxwn.jpg', 0, 'gần đại học quốc gia hà nội', 1, '2020-11-12', '2020-11-12', 3000.00, 3000, '2020-11-12', 2, 1, 1, NULL, NULL, '', 1, NULL, 0, NULL),
(3, 1, 'Chung Cu', 'day la 1 bai test', '42 yên hòa , cầu giấy , hà nội', 1, 1, 3, 30000, 'https://i.imgur.com/PIfDxwn.jpg', 0, 'gần đại học quốc gia hà nội', 1, '2020-11-12', '2020-11-12', 3000.00, 3000, '2020-11-12', 2, 1, 0, NULL, NULL, '', 1, NULL, 0, NULL),
(4, 1, 'Dat o', 'day la 1 bai test', '42 yên hòa , cầu giấy , hà nội', 1, 1, 3, 40000, 'https://i.imgur.com/PIfDxwn.jpg', 0, 'gần đại học quốc gia hà nội', 1, '2020-11-12', '2020-11-12', 3000.00, 3000, '2020-11-12', 2, 1, 0, NULL, NULL, '', 1, NULL, 0, NULL),
(6, 1, 'Belier', 'day la 1 bai test', '42 yên hòa , cầu giấy , hà nội', 1, 1, 3, 50000, 'https://i.imgur.com/PIfDxwn.jpg', 0, 'gần đại học quốc gia hà nội', 1, '2020-11-12', '2021-11-15', 3000.00, 3000, '2020-11-15', 5, 1, 0, NULL, '2020-11-15 14:46:51', '', 0, NULL, 0, NULL),
(8, 1, 'Luka Modric', 'belier', 'DAV', 8, 1, 2, 1000000, 'uploads/room/1605280506_124572185_3185365711569107_1989024877858944999_o.jpg', 30, 'assadasdasd', 1, '2020-11-12', '2020-11-22', 3000.00, 2000, '2020-11-15', 5, 5, 1, '2020-11-13 08:15:06', '2020-11-15 08:50:02', 'Tháng', 1, NULL, 0, NULL),
(10, 1, 'dream house', 'k co gi', 'DAV', 1, 1, 2, 1000000, 'uploads/room/1605455970_mit-rhymastic.jpg', 60, 'k co gi', 1, NULL, '2020-11-29', 3000.00, 5000, '2020-11-15', 5, 5, 0, '2020-11-15 15:59:30', '2020-11-16 06:57:21', 'Tháng', 1, NULL, 0, NULL),
(11, 2, 'piano', 'ds', '2 vu ngoc phann', 11, 1, 4, 20000, 'uploads/room/1605540104_20190202_142100.jpg', 30, 'ádasdas', 1, NULL, NULL, 3000.00, 3000, NULL, NULL, 5, 0, '2020-11-16 15:21:44', '2020-11-16 15:21:44', 'Quy', 1, 0, 0, NULL),
(12, 1, 'Trung Cư Cao Cấp Cầu Giấy', 'ds', '5 trích sài', 4, 5, 3, 20000, 'uploads/room/1608967039_download.jpg', 30, 'ko co gi', 1, NULL, '2021-11-29', 3000.00, 3000, NULL, NULL, 3, 1, '2020-12-26 07:17:19', '2020-12-26 07:17:19', 'Quy', 0, 0, 0, NULL),
(13, 2, 'dssadadk', 'ds', '32 yen hòa', 16, 3, 4, 20000, 'uploads/room/1608971993_Capture.PNG', 20, 'dsd', 1, NULL, NULL, 3000.00, 3000, NULL, NULL, 3, 0, '2020-12-26 08:39:53', '2020-12-26 08:39:53', 'test', 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_facilities`
--

CREATE TABLE `room_facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `facilities_id` int(11) NOT NULL DEFAULT 0,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `room_facilities`
--

INSERT INTO `room_facilities` (`id`, `room_id`, `facilities_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 8, 1, NULL, NULL, NULL),
(2, 8, 4, NULL, NULL, NULL),
(3, 8, 6, NULL, NULL, NULL),
(4, 10, 1, NULL, NULL, NULL),
(5, 10, 4, NULL, NULL, NULL),
(6, 10, 6, NULL, NULL, NULL),
(7, 11, 2, NULL, NULL, NULL),
(8, 11, 4, NULL, NULL, NULL),
(9, 12, 1, NULL, NULL, NULL),
(10, 12, 3, NULL, NULL, NULL),
(11, 12, 6, NULL, NULL, NULL),
(12, 13, 2, NULL, NULL, NULL),
(13, 13, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_image`
--

CREATE TABLE `room_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `room_image`
--

INSERT INTO `room_image` (`id`, `room_id`, `image`, `position`, `created_at`, `updated_at`) VALUES
(2, 8, 'uploads/room/1605346011_118641206_3244593622290217_8666695886033189326_n.jpg', 1, '2020-11-13 08:15:06', '2020-11-14 02:26:51'),
(3, 8, 'uploads/room/1605347837_124572185_3185365711569107_1989024877858944999_o.jpg', 0, '2020-11-14 02:35:26', '2020-11-14 02:57:17'),
(4, 8, 'uploads/room/1605346526_nucuoi-thumbnail.jpg', 1, '2020-11-14 02:35:26', '2020-11-14 02:35:26'),
(5, 8, 'uploads/room/1605346526_rosé x jisoo.png', 2, '2020-11-14 02:35:26', '2020-11-14 02:35:26'),
(6, 8, 'uploads/room/1605347837_SophieCheneviere_belierskate_021.jpg', 0, '2020-11-14 02:57:17', '2020-11-14 02:57:17'),
(7, 10, 'uploads/room/1605455970_rosé x jisoo.png', 0, '2020-11-15 15:59:30', '2020-11-15 15:59:30'),
(8, 10, 'uploads/room/1605455970_rosé.jpg', 1, '2020-11-15 15:59:30', '2020-11-15 15:59:30'),
(9, 10, 'uploads/room/1605455970_rosé-meme.jpg', 2, '2020-11-15 15:59:30', '2020-11-15 15:59:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_relation_address`
--

CREATE TABLE `room_relation_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `relation_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_type`
--

CREATE TABLE `room_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` int(11) NOT NULL DEFAULT 0,
  `update_by` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `room_type`
--

INSERT INTO `room_type` (`id`, `name`, `create_by`, `update_by`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Chung cư', 4, 3, 1, NULL, NULL),
(2, 'Nhà mặt đất', 4, 3, 1, NULL, NULL),
(4, 'HiHi', 5, NULL, 1, '2020-11-16 15:30:37', '2020-11-16 15:30:37'),
(5, 'Cường', 5, NULL, 1, '2020-11-16 15:30:52', '2020-11-16 15:30:52'),
(6, 'gg', 5, NULL, 1, '2020-11-16 15:31:20', '2020-11-16 15:31:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_id` int(11) DEFAULT NULL,
  `date_approval` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `birthday`, `phone`, `CMND`, `email`, `password`, `image`, `role_id`, `is_active`, `address`, `approval_id`, `date_approval`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Tr Binh Giang', '22/09/2001', '0123456987', '10032001', 'bgtr@gmail.com', '$2y$10$JMMkMn7aYIrdOos5Z7uVkewGRikSna/XIPUldPMqygfpBgVFYxkTi', 'uploads/user/1605087758_118641206_3244593622290217_8666695886033189326_n.jpg', 1, 1, 'Ho Chi Minh City, Vietnam', NULL, NULL, NULL, '2020-11-11 01:59:06', '2020-11-11 02:42:38'),
(3, 'Jisooo', '22/09/2001', '0123456789', '88886789', 'miasoya@gmail.com', '$2y$10$a1nWTaKqKgM3pdiB9uiEq.evz31RTunl5OW0fENiYDNyZ/8OnhAdO', 'uploads/user/1605087789_jisooyah.jfif', 2, 1, 'DAV', NULL, NULL, 'VrczPVruF0RljfnUdNzGpA3GI4zcuzUxYTKSEipWmG5vsTP08Ag514J3e3jR', '2020-11-11 02:43:09', '2020-12-26 07:15:09'),
(4, 'Mimosa Chu', '23/10/1992', '0349625555', '19024705183012', 'mimosachu@gmail.com', '$2y$10$BcZwqyNWlwIH4W9Mh0.CDuwFwoElZnHP7xsOHnMnYpM2vQgNIdwdS', 'uploads/user/1605103552_SophieCheneviere_belierskate_021.jpg', 2, 1, 'Hang Dau', NULL, NULL, NULL, '2020-11-11 07:05:52', '2020-11-15 00:11:14'),
(5, 'N M Dung', '22/09/2001', '0366065647', '19024705183012', 'devergo@gmail.com', '$2y$10$a1nWTaKqKgM3pdiB9uiEq.evz31RTunl5OW0fENiYDNyZ/8OnhAdO', 'https://vcdn1-ione.vnecdn.net/2019/02/16/Amme10-1550288079.jpg?w=460&h=0&q=100&dpr=1&fit=crop&s=IsQJN1TuiAwzhfWTWaGb4w', 1, 1, 'Dong Anh - Ha Noi', NULL, NULL, NULL, '2020-11-11 07:47:10', '2020-11-11 07:47:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_comment`
--

CREATE TABLE `user_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_approved` int(1) NOT NULL DEFAULT 0,
  `approved_by` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `user_comment`
--

INSERT INTO `user_comment` (`id`, `user_id`, `room_id`, `comment`, `created_at`, `updated_at`, `is_approved`, `approved_by`) VALUES
(1, 2, 1, '22226785349534958934534', NULL, '2020-11-12 02:21:27', 1, 5),
(3, 3, 3, '6789453543', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_like`
--

CREATE TABLE `user_like` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `user_like`
--

INSERT INTO `user_like` (`id`, `user_id`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 2, 12, '2020-12-29 07:46:15', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_report`
--

CREATE TABLE `user_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `receive_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_id` int(100) NOT NULL,
  `approved_by` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `user_report`
--

INSERT INTO `user_report` (`id`, `receive_id`, `title`, `content`, `is_active`, `created_at`, `updated_at`, `sender_id`, `approved_by`) VALUES
(1, 1, 'Không đúng sự thật', 'Không có điều hòa', 1, NULL, NULL, 5, 5),
(3, 2, 'This is a report', 'This is a report', 1, NULL, '2020-11-12 09:37:59', 2, 5),
(4, 2, 'This is a report', 'This is a report', 0, NULL, NULL, 3, NULL),
(5, 2, 'This is a report', 'This is a report', 0, NULL, NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_requesteditroom`
--

CREATE TABLE `user_requesteditroom` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `user_requesteditroom`
--

INSERT INTO `user_requesteditroom` (`id`, `user_id`, `room_id`, `reason`, `approved_by`, `created_at`, `updated_at`) VALUES
(0, 0, 0, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_views`
--

CREATE TABLE `user_views` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `date_views` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_vote`
--

CREATE TABLE `user_vote` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `room_id` int(11) NOT NULL DEFAULT 0,
  `star` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `extend_post`
--
ALTER TABLE `extend_post`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Chỉ mục cho bảng `relation_address`
--
ALTER TABLE `relation_address`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `room_image`
--
ALTER TABLE `room_image`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `room_relation_address`
--
ALTER TABLE `room_relation_address`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user_comment`
--
ALTER TABLE `user_comment`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user_like`
--
ALTER TABLE `user_like`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user_report`
--
ALTER TABLE `user_report`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user_requesteditroom`
--
ALTER TABLE `user_requesteditroom`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user_views`
--
ALTER TABLE `user_views`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user_vote`
--
ALTER TABLE `user_vote`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `extend_post`
--
ALTER TABLE `extend_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `relation_address`
--
ALTER TABLE `relation_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `room_image`
--
ALTER TABLE `room_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `room_relation_address`
--
ALTER TABLE `room_relation_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user_comment`
--
ALTER TABLE `user_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_like`
--
ALTER TABLE `user_like`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_report`
--
ALTER TABLE `user_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user_requesteditroom`
--
ALTER TABLE `user_requesteditroom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_views`
--
ALTER TABLE `user_views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_vote`
--
ALTER TABLE `user_vote`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
