-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 27, 2020 lúc 11:07 AM
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
(1, 'Hà Nội', 3, 5, 1, '2020-11-13 08:56:21', '2020-12-26 16:08:44'),
(2, 'TP Hồ Chí Minh', 5, NULL, 1, '2020-11-13 08:56:21', '2020-11-13 08:56:21'),
(3, 'Hưng Yên', 5, 5, 1, '2020-11-16 15:34:03', '2020-12-26 16:13:05');

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
(1, 'Đông Anh', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(2, 'Cầu Giấy', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(3, 'Đống Đa', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(4, 'Thanh Xuân', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(5, 'Tây Hồ', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(6, 'Hoàn Kiếm', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(7, 'Ba Đình', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(8, 'Hai Bà Trưng', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(9, 'Hoàng Mai', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(10, 'Long Biên', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(11, 'Nam Từ Liêm', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(12, 'Bắc Từ Liêm', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(13, 'Hà Đông', 1, 3, 3, 1, '2020-11-13 07:37:18', NULL),
(19, 'Quận Bình Tân', 2, 5, NULL, 1, '2020-12-26 16:11:23', '2020-12-26 16:11:23'),
(20, 'Quận Bình Thạnh', 2, 5, NULL, 1, '2020-12-26 16:11:44', '2020-12-26 16:11:44'),
(21, 'Quận Gò Vấp', 2, 5, NULL, 1, '2020-12-26 16:11:53', '2020-12-26 16:11:53'),
(22, 'Quận Phú Nhuận', 2, 5, NULL, 1, '2020-12-26 16:12:03', '2020-12-26 16:12:03'),
(23, 'Quận Tân Bình', 2, 5, NULL, 1, '2020-12-26 16:12:13', '2020-12-26 16:12:13'),
(24, 'Quận Tân Phú', 2, 5, NULL, 1, '2020-12-26 16:12:21', '2020-12-26 16:12:21'),
(25, 'Quận Thủ Đức', 2, 5, NULL, 1, '2020-12-26 16:12:33', '2020-12-26 16:12:33'),
(26, 'Huyện Cần Giờ', 2, 5, NULL, 1, '2020-12-26 16:12:40', '2020-12-26 16:12:40'),
(27, 'TP Hưng Yên', 3, 5, NULL, 1, '2020-12-26 16:13:17', '2020-12-26 16:13:17'),
(28, 'Phù Cừ', 3, 5, NULL, 1, '2020-12-26 16:13:28', '2020-12-26 16:13:28'),
(29, 'Tiên Lữ', 3, 5, NULL, 1, '2020-12-26 16:13:35', '2020-12-26 16:13:35'),
(30, 'Văn Giang', 3, 5, NULL, 1, '2020-12-26 16:13:46', '2020-12-26 16:13:46'),
(31, 'Văn Lâm', 3, 5, NULL, 1, '2020-12-26 16:13:55', '2020-12-26 16:13:55'),
(32, 'Ân Thi', 3, 5, NULL, 1, '2020-12-26 16:14:05', '2020-12-26 16:14:05');

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
(4, 2, 'Gia hạn bài đăng Belier bị từ chối !', 'Bởi vì chúng tôi không thích!. Chúng tôi rất tiếc khi không thể duyệt yêu cầu này.', 0, '2020-11-15 14:46:51', '2020-11-15 14:46:51'),
(5, 3, 'Yêu cầu chỉnh sửa bài viết Trung Cư Cao Cấp Cầu Giấyđược gia hạn', 'Yêu cầu chỉnh sửa bài viết của bạn đã được cho phép. Bây giờ bạn có thể chỉnh sửa bài viết của mình', 0, '2020-12-26 14:06:33', '2020-12-26 14:06:33'),
(6, 3, 'Bài đăng Ha Noi đã được gia hạn thành công!', 'Chào Jisooo !. Bài đăng của bạn đã được gia hạn thành công với mức phí 200000 VNĐ. Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi.', 0, '2020-12-26 14:52:25', '2020-12-26 14:52:25');

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
(14, 1, 'Trung Cư Cầu Giấy', 'Trung cư cap cấp với đầy đủ tiện nghi từ A đến Z', 'Số 4 Nguyễn Khang', 2, 1, 4, 4000000, 'uploads/room/1609030165_download1.jpg', 50, 'Trung Cư', 0, '2020-12-27', '2021-04-27', 3000.00, 3000, '2020-12-27', 5, 3, 1, '2020-12-27 00:49:25', '2020-12-27 00:49:25', 'Tháng', 0, 0, 0, NULL),
(15, 1, 'Trung Cư Đống Đa', 'Trung cư cap cấp với đầy đủ tiện nghi từ A đến Z', 'Số 5 Chùa Láng', 3, 1, 4, 5000000, 'uploads/room/1609031816_2.jpeg', 60, 'Trung Cư', 1, '2020-12-27', '2021-03-27', 3000.00, 3000, '2020-12-27', 5, 3, 1, '2020-12-27 01:16:56', '2020-12-27 01:16:56', 'Tháng', 1, 0, 0, NULL),
(16, 1, 'Trung Cư Cao Cấp Tây Hồ', 'Trung cư cap cấp với đầy đủ tiện nghi từ A đến Z', 'Số 15 Tây Hô', 5, 1, 4, 6000000, 'uploads/room/1609033553_3.jpeg', 50, 'Trung Cư', 0, '2020-12-27', '2021-03-27', 3000.00, 3000, '2020-12-27', 5, 3, 1, '2020-12-27 01:45:53', '2020-12-27 01:45:53', 'Tháng', 1, 0, 0, NULL),
(17, 2, 'Trung Cư Cao Cấp Gò Vấp', 'Trung cư cap cấp với đầy đủ tiện nghi từ A đến Z', 'Số 55 Gò Vấp', 21, 2, 4, 3500000, 'uploads/room/1609033836_4.jpeg', 45, 'Trung Cư Mini', 0, '2020-12-27', '2021-01-17', 3000.00, 5000, '2020-12-27', 5, 3, 1, '2020-12-27 01:50:36', '2020-12-27 01:50:36', 'Tháng', 1, 0, 0, NULL),
(18, 3, 'Nhà Trọ Phù Cừ', 'Nhà Trọ Tiện Nghi', 'Chợ Nhật Mới', 28, 3, 4, 10000000, 'uploads/room/1609033953_5.1.jpeg', 70, 'Nhà Trọ', 1, '2020-12-27', '2021-01-17', 3000.00, 3000, '2020-12-27', 5, 5, 1, '2020-12-27 01:52:33', '2020-12-27 01:52:33', 'Tháng', 1, 0, 0, NULL),
(19, 2, 'Trung Cư Mini Cao Cấp Cầu Giấy', 'Trung cư cap cấp với đầy đủ tiện nghi từ A đến Z', '365 Cầu Giấy', 2, 1, 7, 2500000, 'uploads/room/1609034036_6.jpeg', 30, 'Trung Cư', 1, '2020-12-27', '2021-01-24', 3000.00, 4500, '2020-12-27', 5, 5, 1, '2020-12-27 01:53:56', '2020-12-27 01:53:56', 'Tháng', 1, 0, 0, NULL),
(20, 3, 'Nhà Trọ Cầu Giấy', 'Nhà Trọ Tiện Nghi', '165 Cầu Giấy', 2, 1, 2, 1500000, 'uploads/room/1609034126_7.jpeg', 25, 'Nhà Trọ', 1, '2020-12-27', '2021-01-17', 3000.00, 4500, '2020-12-27', 5, 5, 1, '2020-12-27 01:55:26', '2020-12-27 01:55:26', 'Tháng', 1, 0, 0, NULL),
(21, 2, 'Trung Cư Mini  Đống Đa', 'Trung cư Mini cấp với đầy đủ tiện nghi từ A đến Z', '15 Đống Đa', 3, 1, 4, 3500000, 'uploads/room/1609034223_7.4.jpg', 30, 'Trung Cư Mini', 1, '2020-12-27', '2021-01-10', 5000.00, 1000, '2020-12-27', 5, 5, 1, '2020-12-27 01:57:03', '2020-12-27 01:57:03', 'Tháng', 1, 0, 0, NULL),
(22, 3, 'Nhà Trọ Tân Bình', 'Nhà Trọ Tiện Nghi', '70 Tân Bình', 23, 2, 4, 2000000, 'uploads/room/1609034308_8.jpeg', 25, 'Nhà Trọ', 0, '2020-12-27', '2021-01-10', 3000.00, 1000, '2020-12-27', 5, 5, 1, '2020-12-27 01:58:28', '2020-12-27 01:58:28', 'Tháng', 1, 0, 0, NULL),
(23, 2, 'Trung Cư Cao Cấp Tân Bình', 'Trung cư Mini với đầy đủ tiện nghi từ A đến Z', '23 Tân Bình', 23, 2, 3, 1500000, 'uploads/room/1609035123_8.jpeg', 30, 'Trung Cư Mini', 0, '2020-12-27', '2021-01-17', 3000.00, 4500, '2020-12-27', 5, 5, 1, '2020-12-27 02:12:03', '2020-12-27 02:12:03', 'Tháng', 1, 0, 0, NULL),
(24, 2, 'Trung Cư Cao Cấp Văn Giang', 'Trung cư cap cấp với đầy đủ tiện nghi từ A đến Z', '45 Văn Giang', 30, 3, 4, 2000000, 'uploads/room/1609035367_9.jpeg', 30, 'Trung Cư', 1, '2020-12-27', '2021-01-17', 3000.00, 3000, '2020-12-27', 5, 5, 1, '2020-12-27 02:16:07', '2020-12-27 02:16:07', 'Tháng', 1, 0, 0, NULL),
(25, 1, 'Trung Cư Cao Cấp Cầu Giấy 2', 'Trung cư cap cấp với đầy đủ tiện nghi từ A đến Z', '55 Xuân Thủy', 2, 1, 3, 3200000, 'uploads/room/1609035433_10.jpeg', 50, 'Trung Cư', 0, '2020-12-27', '2021-01-17', 3000.00, 3000, '2020-12-27', 5, 5, 1, '2020-12-27 02:17:13', '2020-12-27 02:17:13', 'Tháng', 1, 0, 0, NULL),
(26, 1, 'Trung Cư Cao Cấp Cầu Giấy 3', 'Trung cư cap cấp với đầy đủ tiện nghi từ A đến Z', '1 Xuân Thủy', 2, 1, 3, 5200000, 'uploads/room/1609035512_11.jpeg', 30, 'Trung Cư', 1, '2020-12-27', '2021-01-24', 3000.00, 3000, '2020-12-27', 5, 5, 1, '2020-12-27 02:18:32', '2020-12-27 02:18:32', 'Tháng', 1, 0, 0, NULL),
(27, 2, 'Trung Cư MiniCầu Giấy 2', 'Trung cư cap cấp với đầy đủ tiện nghi từ A đến Z', '3 Cầu Giấy', 2, 1, 3, 6300000, 'uploads/room/1609035586_12.jpeg', 50, 'Trung Cư Mini', 1, '2020-12-27', '2021-01-10', 3000.00, 3000, '2020-12-27', 5, 5, 1, '2020-12-27 02:19:46', '2020-12-27 02:19:46', 'Tháng', 1, 0, 0, NULL),
(28, 3, 'Nhà Trọ Đông Anh', 'Nhà Trọ Tiện Nghi', '4 Đông Anh', 1, 1, 3, 3500000, 'uploads/room/1609035745_13.jpeg', 30, 'Nhà Trọ', 0, '2020-12-27', '2021-01-10', 3000.00, 4500, '2020-12-27', 5, 5, 1, '2020-12-27 02:22:25', '2020-12-27 02:22:25', 'Tháng', 1, 0, 0, NULL),
(29, 2, 'Trung Cư Cao Cấp Nam Từ Liêm', 'Trung cư Mini với đầy đủ tiện nghi từ A đến Z', '4 Nam Từ Liêm', 11, 1, 3, 1500000, 'uploads/room/1609035820_14.jpeg', 25, 'Trung Cư Mini', 0, '2020-12-27', '2021-01-24', 3000.00, 1000, '2020-12-27', 5, 5, 1, '2020-12-27 02:23:40', '2020-12-27 02:23:40', 'Tháng', 1, 0, 0, NULL),
(30, 2, 'Trung Cư Đống Đa 2', 'Trung cư Mini với đầy đủ tiện nghi từ A đến Z', 'Số 45 Đường Láng', 3, 1, 3, 4500000, 'uploads/room/1609035910_15.jpeg', 50, 'Trung Cư Mini', 0, '2020-12-27', '2021-01-10', 3000.00, 5000, '2020-12-27', 5, 5, 1, '2020-12-27 02:25:10', '2020-12-27 02:25:10', 'Tháng', 1, 0, 0, NULL),
(31, 3, 'Nhà Trọ Tân Phú', 'Nhà Trọ Tiện Nghi', '15 Tân Phú', 24, 2, 2, 1500000, 'uploads/room/1609035979_55.jpeg', 30, 'Nhà Trọ', 1, '2020-12-27', '2021-01-10', 3000.00, 1000, '2020-12-27', 5, 5, 1, '2020-12-27 02:26:19', '2020-12-27 02:26:19', 'Tháng', 1, 0, 0, NULL),
(32, 2, 'Trung Cư Bắc Từ Liêm', 'Trung cư Mini với đầy đủ tiện nghi từ A đến Z', '46 Bắc Từ Liêm', 12, 1, 3, 4200000, 'uploads/room/1609036066_3.3.jpeg', 30, 'Trung Cư Mini', 1, '2020-12-27', '2021-01-17', 3000.00, 5000, '2020-12-27', 5, 5, 1, '2020-12-27 02:27:46', '2020-12-27 02:27:46', 'Tháng', 1, 0, 0, NULL),
(33, 2, 'Trung Cư Cao Cấp Hai Bà Trưng', 'Trung cư Mini với đầy đủ tiện nghi từ A đến Z', '18 Hai Bà Trưng', 8, 1, 3, 4100000, 'uploads/room/1609036150_2.4.jpg', 30, 'Trung Cư Mini', 1, '2020-12-27', '2021-01-24', 3000.00, 1000, '2020-12-27', 5, 5, 1, '2020-12-27 02:29:10', '2020-12-27 02:29:10', 'Tháng', 1, 0, 0, NULL),
(34, 1, 'Trung Cư Cao Cấp Cầu Giấy 5', 'Gần Đại Học Quốc Gia Hà Nội', '43 Yên Hòa', 2, 1, 3, 6700000, 'uploads/room/1609036233_3.4.jpeg', 45, 'Trung Cư Mini', 1, '2020-12-27', '2021-01-24', 3000.00, 4500, '2020-12-27', 5, 5, 1, '2020-12-27 02:30:33', '2020-12-27 02:30:33', 'Tháng', 1, 0, 0, NULL),
(35, 3, 'Nhà Trọ Cầu Giấy 3', 'Nhà Trọ Tiện Nghi', '58 Xuân Thủy', 2, 1, 3, 1700000, 'uploads/room/1609036326_10.4.jpeg', 27, 'Gần Đại Học Thương Mại', 1, '2020-12-27', '2021-01-10', 3000.00, 4500, '2020-12-27', 5, 5, 1, '2020-12-27 02:32:06', '2020-12-27 02:32:06', 'Tháng', 1, 0, 0, NULL);

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
(13, 13, 4, NULL, NULL, NULL),
(14, 14, 1, NULL, NULL, NULL),
(15, 14, 3, NULL, NULL, NULL),
(16, 14, 4, NULL, NULL, NULL),
(17, 14, 5, NULL, NULL, NULL),
(18, 14, 6, NULL, NULL, NULL),
(19, 14, 7, NULL, NULL, NULL),
(20, 14, 8, NULL, NULL, NULL),
(21, 15, 1, NULL, NULL, NULL),
(22, 15, 3, NULL, NULL, NULL),
(23, 15, 4, NULL, NULL, NULL),
(24, 15, 5, NULL, NULL, NULL),
(25, 15, 6, NULL, NULL, NULL),
(26, 15, 8, NULL, NULL, NULL),
(27, 16, 1, NULL, NULL, NULL),
(28, 16, 3, NULL, NULL, NULL),
(29, 16, 6, NULL, NULL, NULL),
(30, 16, 8, NULL, NULL, NULL),
(31, 17, 1, NULL, NULL, NULL),
(32, 17, 3, NULL, NULL, NULL),
(33, 17, 4, NULL, NULL, NULL),
(34, 17, 5, NULL, NULL, NULL),
(35, 17, 6, NULL, NULL, NULL),
(36, 18, 1, NULL, NULL, NULL),
(37, 18, 2, NULL, NULL, NULL),
(38, 18, 3, NULL, NULL, NULL),
(39, 18, 4, NULL, NULL, NULL),
(40, 18, 5, NULL, NULL, NULL),
(41, 18, 6, NULL, NULL, NULL),
(42, 18, 7, NULL, NULL, NULL),
(43, 18, 8, NULL, NULL, NULL),
(44, 19, 1, NULL, NULL, NULL),
(45, 19, 2, NULL, NULL, NULL),
(46, 19, 3, NULL, NULL, NULL),
(47, 19, 4, NULL, NULL, NULL),
(48, 20, 1, NULL, NULL, NULL),
(49, 20, 3, NULL, NULL, NULL),
(50, 20, 6, NULL, NULL, NULL),
(51, 20, 8, NULL, NULL, NULL),
(52, 21, 3, NULL, NULL, NULL),
(53, 21, 5, NULL, NULL, NULL),
(54, 21, 6, NULL, NULL, NULL),
(55, 21, 8, NULL, NULL, NULL),
(56, 22, 3, NULL, NULL, NULL),
(57, 22, 4, NULL, NULL, NULL),
(58, 22, 6, NULL, NULL, NULL),
(59, 22, 8, NULL, NULL, NULL),
(60, 23, 4, NULL, NULL, NULL),
(61, 23, 6, NULL, NULL, NULL),
(62, 24, 3, NULL, NULL, NULL),
(63, 24, 4, NULL, NULL, NULL),
(64, 24, 5, NULL, NULL, NULL),
(65, 24, 6, NULL, NULL, NULL),
(66, 25, 3, NULL, NULL, NULL),
(67, 25, 4, NULL, NULL, NULL),
(68, 25, 6, NULL, NULL, NULL),
(69, 25, 7, NULL, NULL, NULL),
(70, 27, 3, NULL, NULL, NULL),
(71, 27, 4, NULL, NULL, NULL),
(72, 27, 6, NULL, NULL, NULL),
(73, 27, 7, NULL, NULL, NULL),
(74, 27, 8, NULL, NULL, NULL),
(75, 28, 1, NULL, NULL, NULL),
(76, 28, 3, NULL, NULL, NULL),
(77, 28, 4, NULL, NULL, NULL),
(78, 28, 6, NULL, NULL, NULL),
(79, 29, 1, NULL, NULL, NULL),
(80, 29, 2, NULL, NULL, NULL),
(81, 29, 3, NULL, NULL, NULL),
(82, 29, 4, NULL, NULL, NULL),
(83, 29, 6, NULL, NULL, NULL),
(84, 30, 1, NULL, NULL, NULL),
(85, 30, 3, NULL, NULL, NULL),
(86, 30, 6, NULL, NULL, NULL),
(87, 31, 1, NULL, NULL, NULL),
(88, 31, 3, NULL, NULL, NULL),
(89, 31, 4, NULL, NULL, NULL),
(90, 32, 4, NULL, NULL, NULL),
(91, 32, 6, NULL, NULL, NULL),
(92, 32, 8, NULL, NULL, NULL),
(93, 33, 4, NULL, NULL, NULL),
(94, 33, 5, NULL, NULL, NULL),
(95, 33, 6, NULL, NULL, NULL),
(96, 33, 8, NULL, NULL, NULL),
(97, 34, 1, NULL, NULL, NULL),
(98, 34, 3, NULL, NULL, NULL),
(99, 34, 4, NULL, NULL, NULL),
(100, 34, 6, NULL, NULL, NULL),
(101, 35, 3, NULL, NULL, NULL),
(102, 35, 4, NULL, NULL, NULL),
(103, 35, 6, NULL, NULL, NULL),
(104, 35, 8, NULL, NULL, NULL);

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
(9, 10, 'uploads/room/1605455970_rosé-meme.jpg', 2, '2020-11-15 15:59:30', '2020-11-15 15:59:30'),
(14, 14, 'uploads/room/1609030982_1.1.jpeg', 0, '2020-12-27 01:03:02', '2020-12-27 01:03:02'),
(15, 14, 'uploads/room/1609030982_1.2.jpeg', 1, '2020-12-27 01:03:02', '2020-12-27 01:03:02'),
(16, 14, 'uploads/room/1609030982_1.3.jpeg', 2, '2020-12-27 01:03:02', '2020-12-27 01:03:02'),
(17, 14, 'uploads/room/1609030982_1.4.jpeg', 3, '2020-12-27 01:03:02', '2020-12-27 01:03:02'),
(18, 15, 'uploads/room/1609031816_2.1.jpeg', 0, '2020-12-27 01:16:56', '2020-12-27 01:16:56'),
(19, 15, 'uploads/room/1609031816_2.2.jpeg', 1, '2020-12-27 01:16:56', '2020-12-27 01:16:56'),
(20, 15, 'uploads/room/1609031816_2.3.jpeg', 2, '2020-12-27 01:16:56', '2020-12-27 01:16:56'),
(21, 15, 'uploads/room/1609031816_2.4.jpg', 3, '2020-12-27 01:16:56', '2020-12-27 01:16:56'),
(22, 16, 'uploads/room/1609033553_3.1.jpeg', 0, '2020-12-27 01:45:53', '2020-12-27 01:45:53'),
(23, 16, 'uploads/room/1609033553_3.2.jpeg', 1, '2020-12-27 01:45:53', '2020-12-27 01:45:53'),
(24, 16, 'uploads/room/1609033553_3.3.jpeg', 2, '2020-12-27 01:45:53', '2020-12-27 01:45:53'),
(25, 16, 'uploads/room/1609033553_3.4.jpeg', 3, '2020-12-27 01:45:53', '2020-12-27 01:45:53'),
(26, 17, 'uploads/room/1609033836_4.1.jpeg', 0, '2020-12-27 01:50:36', '2020-12-27 01:50:36'),
(27, 17, 'uploads/room/1609033836_4.2.jpeg', 1, '2020-12-27 01:50:36', '2020-12-27 01:50:36'),
(28, 17, 'uploads/room/1609033836_4.3.jpeg', 2, '2020-12-27 01:50:36', '2020-12-27 01:50:36'),
(29, 17, 'uploads/room/1609033836_4.4.jpeg', 3, '2020-12-27 01:50:36', '2020-12-27 01:50:36'),
(30, 18, 'uploads/room/1609033953_5.2.jpeg', 0, '2020-12-27 01:52:33', '2020-12-27 01:52:33'),
(31, 18, 'uploads/room/1609033953_5.3.jpeg', 1, '2020-12-27 01:52:33', '2020-12-27 01:52:33'),
(32, 18, 'uploads/room/1609033953_5.4.jpeg', 2, '2020-12-27 01:52:33', '2020-12-27 01:52:33'),
(33, 19, 'uploads/room/1609034036_6.1.jpeg', 0, '2020-12-27 01:53:56', '2020-12-27 01:53:56'),
(34, 19, 'uploads/room/1609034036_6.2.jpeg', 1, '2020-12-27 01:53:56', '2020-12-27 01:53:56'),
(35, 19, 'uploads/room/1609034036_6.3.jpeg', 2, '2020-12-27 01:53:56', '2020-12-27 01:53:56'),
(36, 19, 'uploads/room/1609034036_6.4.jpeg', 3, '2020-12-27 01:53:56', '2020-12-27 01:53:56'),
(37, 20, 'uploads/room/1609034126_7.1.jpeg', 0, '2020-12-27 01:55:26', '2020-12-27 01:55:26'),
(38, 20, 'uploads/room/1609034126_7.2.jpeg', 1, '2020-12-27 01:55:26', '2020-12-27 01:55:26'),
(39, 20, 'uploads/room/1609034126_7.3.jpeg', 2, '2020-12-27 01:55:26', '2020-12-27 01:55:26'),
(40, 21, 'uploads/room/1609034223_1.2.jpeg', 0, '2020-12-27 01:57:03', '2020-12-27 01:57:03'),
(41, 21, 'uploads/room/1609034223_2.3.jpeg', 1, '2020-12-27 01:57:03', '2020-12-27 01:57:03'),
(42, 21, 'uploads/room/1609034223_2.jpeg', 2, '2020-12-27 01:57:03', '2020-12-27 01:57:03'),
(43, 21, 'uploads/room/1609034223_3.1.jpeg', 3, '2020-12-27 01:57:04', '2020-12-27 01:57:04'),
(44, 21, 'uploads/room/1609034224_3.3.jpeg', 4, '2020-12-27 01:57:04', '2020-12-27 01:57:04'),
(45, 22, 'uploads/room/1609034308_8.1.jpeg', 0, '2020-12-27 01:58:28', '2020-12-27 01:58:28'),
(46, 22, 'uploads/room/1609034308_8.2.jpeg', 1, '2020-12-27 01:58:28', '2020-12-27 01:58:28'),
(47, 22, 'uploads/room/1609034308_8.3.jpeg', 2, '2020-12-27 01:58:28', '2020-12-27 01:58:28'),
(48, 22, 'uploads/room/1609034308_8.4.jpeg', 3, '2020-12-27 01:58:28', '2020-12-27 01:58:28'),
(49, 23, 'uploads/room/1609035123_8.1.jpeg', 0, '2020-12-27 02:12:03', '2020-12-27 02:12:03'),
(50, 23, 'uploads/room/1609035123_8.2.jpeg', 1, '2020-12-27 02:12:03', '2020-12-27 02:12:03'),
(51, 23, 'uploads/room/1609035123_8.3.jpeg', 2, '2020-12-27 02:12:03', '2020-12-27 02:12:03'),
(52, 23, 'uploads/room/1609035123_8.4.jpeg', 3, '2020-12-27 02:12:03', '2020-12-27 02:12:03'),
(53, 24, 'uploads/room/1609035367_9.1.jpeg', 0, '2020-12-27 02:16:07', '2020-12-27 02:16:07'),
(54, 24, 'uploads/room/1609035367_9.2.jpeg', 1, '2020-12-27 02:16:07', '2020-12-27 02:16:07'),
(55, 24, 'uploads/room/1609035367_9.3.jpeg', 2, '2020-12-27 02:16:07', '2020-12-27 02:16:07'),
(56, 24, 'uploads/room/1609035367_9.4.jpeg', 3, '2020-12-27 02:16:07', '2020-12-27 02:16:07'),
(57, 25, 'uploads/room/1609035433_10.1.jpeg', 0, '2020-12-27 02:17:13', '2020-12-27 02:17:13'),
(58, 25, 'uploads/room/1609035433_10.2.jpeg', 1, '2020-12-27 02:17:13', '2020-12-27 02:17:13'),
(59, 25, 'uploads/room/1609035433_10.3.jpeg', 2, '2020-12-27 02:17:13', '2020-12-27 02:17:13'),
(60, 25, 'uploads/room/1609035433_10.4.jpeg', 3, '2020-12-27 02:17:13', '2020-12-27 02:17:13'),
(61, 26, 'uploads/room/1609035512_12.1.jpeg', 0, '2020-12-27 02:18:32', '2020-12-27 02:18:32'),
(62, 26, 'uploads/room/1609035512_12.2.jpeg', 1, '2020-12-27 02:18:32', '2020-12-27 02:18:32'),
(63, 26, 'uploads/room/1609035512_12.3.jpeg', 2, '2020-12-27 02:18:32', '2020-12-27 02:18:32'),
(64, 26, 'uploads/room/1609035512_12.4.jpeg', 3, '2020-12-27 02:18:32', '2020-12-27 02:18:32'),
(65, 27, 'uploads/room/1609035586_11.1.jpeg', 0, '2020-12-27 02:19:46', '2020-12-27 02:19:46'),
(66, 27, 'uploads/room/1609035586_11.2.jpeg', 1, '2020-12-27 02:19:46', '2020-12-27 02:19:46'),
(67, 27, 'uploads/room/1609035586_11.3.jpeg', 2, '2020-12-27 02:19:46', '2020-12-27 02:19:46'),
(68, 27, 'uploads/room/1609035586_11.4.jpeg', 3, '2020-12-27 02:19:46', '2020-12-27 02:19:46'),
(69, 28, 'uploads/room/1609035745_13.1.jpeg', 0, '2020-12-27 02:22:25', '2020-12-27 02:22:25'),
(70, 28, 'uploads/room/1609035745_13.2.jpeg', 1, '2020-12-27 02:22:25', '2020-12-27 02:22:25'),
(71, 28, 'uploads/room/1609035745_13.3.jpeg', 2, '2020-12-27 02:22:25', '2020-12-27 02:22:25'),
(72, 28, 'uploads/room/1609035745_13.4.jpeg', 3, '2020-12-27 02:22:25', '2020-12-27 02:22:25'),
(73, 29, 'uploads/room/1609035820_14.1.jpeg', 0, '2020-12-27 02:23:40', '2020-12-27 02:23:40'),
(74, 29, 'uploads/room/1609035820_14.2.jpeg', 1, '2020-12-27 02:23:40', '2020-12-27 02:23:40'),
(75, 29, 'uploads/room/1609035820_14.3.jpeg', 2, '2020-12-27 02:23:40', '2020-12-27 02:23:40'),
(76, 29, 'uploads/room/1609035820_14.4.jpeg', 3, '2020-12-27 02:23:40', '2020-12-27 02:23:40'),
(77, 30, 'uploads/room/1609035910_15.1.jpeg', 0, '2020-12-27 02:25:10', '2020-12-27 02:25:10'),
(78, 30, 'uploads/room/1609035910_15.2.jpeg', 1, '2020-12-27 02:25:10', '2020-12-27 02:25:10'),
(79, 30, 'uploads/room/1609035910_15.3.jpeg', 2, '2020-12-27 02:25:10', '2020-12-27 02:25:10'),
(80, 30, 'uploads/room/1609035910_15.4.jpeg', 3, '2020-12-27 02:25:10', '2020-12-27 02:25:10'),
(81, 31, 'uploads/room/1609035979_2.1.jpeg', 0, '2020-12-27 02:26:19', '2020-12-27 02:26:19'),
(82, 31, 'uploads/room/1609035979_2.3.jpeg', 1, '2020-12-27 02:26:19', '2020-12-27 02:26:19'),
(83, 31, 'uploads/room/1609035979_2.4.jpg', 2, '2020-12-27 02:26:19', '2020-12-27 02:26:19'),
(84, 31, 'uploads/room/1609035979_3.3.jpeg', 3, '2020-12-27 02:26:19', '2020-12-27 02:26:19'),
(85, 32, 'uploads/room/1609036066_2.1.jpeg', 0, '2020-12-27 02:27:46', '2020-12-27 02:27:46'),
(86, 32, 'uploads/room/1609036066_2.jpeg', 1, '2020-12-27 02:27:46', '2020-12-27 02:27:46'),
(87, 32, 'uploads/room/1609036066_3.2.jpeg', 2, '2020-12-27 02:27:46', '2020-12-27 02:27:46'),
(88, 32, 'uploads/room/1609036066_3.4.jpeg', 3, '2020-12-27 02:27:46', '2020-12-27 02:27:46'),
(89, 33, 'uploads/room/1609036150_10.4.jpeg', 0, '2020-12-27 02:29:10', '2020-12-27 02:29:10'),
(90, 33, 'uploads/room/1609036150_13.4.jpeg', 1, '2020-12-27 02:29:10', '2020-12-27 02:29:10'),
(91, 33, 'uploads/room/1609036150_14.1.jpeg', 2, '2020-12-27 02:29:10', '2020-12-27 02:29:10'),
(92, 33, 'uploads/room/1609036150_14.4.jpeg', 3, '2020-12-27 02:29:10', '2020-12-27 02:29:10'),
(93, 34, 'uploads/room/1609036233_2.4.jpg', 0, '2020-12-27 02:30:33', '2020-12-27 02:30:33'),
(94, 34, 'uploads/room/1609036233_2.jpeg', 1, '2020-12-27 02:30:33', '2020-12-27 02:30:33'),
(95, 34, 'uploads/room/1609036233_3.4.jpeg', 2, '2020-12-27 02:30:33', '2020-12-27 02:30:33'),
(96, 34, 'uploads/room/1609036233_8.jpeg', 3, '2020-12-27 02:30:33', '2020-12-27 02:30:33'),
(97, 35, 'uploads/room/1609036326_2.4.jpg', 0, '2020-12-27 02:32:06', '2020-12-27 02:32:06'),
(98, 35, 'uploads/room/1609036326_8.4.jpeg', 1, '2020-12-27 02:32:06', '2020-12-27 02:32:06'),
(99, 35, 'uploads/room/1609036326_13.jpeg', 2, '2020-12-27 02:32:06', '2020-12-27 02:32:06'),
(100, 35, 'uploads/room/1609036326_14.1.jpeg', 3, '2020-12-27 02:32:06', '2020-12-27 02:32:06');

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
(2, 'Trung Cư Mini', 5, NULL, 1, '2020-12-26 16:16:01', '2020-12-26 16:16:01'),
(3, 'Nhà Trọ', 5, NULL, 1, '2020-12-26 16:16:08', '2020-12-26 16:16:08');

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
(3, 'Jisooo', '22/09/2001', '0123456789', '88886789', 'miasoya@gmail.com', '$2y$10$a1nWTaKqKgM3pdiB9uiEq.evz31RTunl5OW0fENiYDNyZ/8OnhAdO', 'uploads/user/1605087789_jisooyah.jfif', 2, 1, 'DAV', NULL, NULL, 'Kvp01oUW7sWYNycMn8hkq8NV2HRQxlbaQMzTeQpB2VGidYtD9gS0jCMrDY8z', '2020-11-11 02:43:09', '2020-12-26 07:15:09'),
(4, 'Mimosa Chu', '23/10/1992', '0349625555', '19024705183012', 'mimosachu@gmail.com', '$2y$10$BcZwqyNWlwIH4W9Mh0.CDuwFwoElZnHP7xsOHnMnYpM2vQgNIdwdS', 'uploads/user/1605103552_SophieCheneviere_belierskate_021.jpg', 2, 1, 'Hang Dau', NULL, NULL, NULL, '2020-11-11 07:05:52', '2020-11-15 00:11:14'),
(5, 'Le Cuong', '22/09/2001', '0366065647', '19024705183012', 'devergo@gmail.com', '$2y$10$a1nWTaKqKgM3pdiB9uiEq.evz31RTunl5OW0fENiYDNyZ/8OnhAdO', 'https://vcdn1-ione.vnecdn.net/2019/02/16/Amme10-1550288079.jpg?w=460&h=0&q=100&dpr=1&fit=crop&s=IsQJN1TuiAwzhfWTWaGb4w', 1, 1, 'Dong Anh - Ha Noi', NULL, NULL, NULL, '2020-11-11 07:47:10', '2020-12-26 16:08:30'),
(6, 'Lê Văn Cường', '01/12/2000', '0911130699', '12345678910', 'levancuong@gmail.com', '$2y$10$Ncn1cQXgT730POR2quWhJevBkNn4KTU2DCy.jSyD/E1O6Dtwrj8IO', 'uploads/user/1608999319_download.jpg', 1, 1, 'Số nhà 32 ngõ 42 yên hòa', NULL, NULL, NULL, '2020-12-26 16:15:19', '2020-12-26 16:15:19'),
(7, 'Cường', '2020-12-10', '0911130699', '12345678910', 'c@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 3, 1, '2 vu ngoc phann', NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `extend_post`
--
ALTER TABLE `extend_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `room_image`
--
ALTER TABLE `room_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `room_relation_address`
--
ALTER TABLE `room_relation_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user_comment`
--
ALTER TABLE `user_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_like`
--
ALTER TABLE `user_like`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_report`
--
ALTER TABLE `user_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user_requesteditroom`
--
ALTER TABLE `user_requesteditroom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
