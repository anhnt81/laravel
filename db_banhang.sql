-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 01, 2017 lúc 03:47 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `status`, `created_at`, `updated_at`) VALUES
(13, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', 1, '2017-07-31 16:22:36', '2017-07-31 16:22:36'),
(18, 25, '2017-07-12', 280000, 'COD', 'nhanh nen', 1, '2017-07-31 10:43:36', '2017-07-12 06:39:58'),
(19, 26, '2017-07-12', 120000, 'COD', 'tr', 1, '2017-07-31 16:28:58', '2017-07-31 16:28:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(17, 14, 2, 1, 160000, '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(16, 13, 60, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(15, 13, 59, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(14, 12, 60, 2, 200000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(13, 12, 61, 1, 120000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 11, 57, 2, 150000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(19, 16, 3, 1, 120000, '2017-07-12 06:30:12', '2017-07-12 06:30:12'),
(20, 16, 7, 1, 160000, '2017-07-12 06:30:12', '2017-07-12 06:30:12'),
(21, 16, 2, 2, 160000, '2017-07-12 06:30:12', '2017-07-12 06:30:12'),
(22, 17, 3, 2, 120000, '2017-07-12 06:33:04', '2017-07-12 06:33:04'),
(23, 17, 1, 1, 120000, '2017-07-12 06:33:04', '2017-07-12 06:33:04'),
(24, 17, 2, 1, 160000, '2017-07-12 06:33:04', '2017-07-12 06:33:04'),
(25, 18, 13, 1, 280000, '2017-07-12 06:39:58', '2017-07-12 06:39:58'),
(26, 19, 1, 1, 120000, '2017-07-12 06:43:25', '2017-07-12 06:43:25'),
(27, 20, 3, 1, 120000, '2017-07-12 06:46:50', '2017-07-12 06:46:50'),
(28, 21, 3, 1, 120000, '2017-07-19 13:55:17', '2017-07-19 13:55:17'),
(29, 22, 2, 1, 160000, '2017-07-26 08:23:41', '2017-07-26 08:23:41'),
(30, 23, 6, 1, 180000, '2017-07-26 08:26:51', '2017-07-26 08:26:51'),
(31, 24, 15, 1, 320000, '2017-07-26 09:52:01', '2017-07-26 09:52:01'),
(32, 24, 19, 2, 150000, '2017-07-26 09:52:01', '2017-07-26 09:52:01'),
(33, 24, 28, 1, 120000, '2017-07-26 09:52:01', '2017-07-26 09:52:01'),
(34, 24, 7, 2, 160000, '2017-07-26 09:52:01', '2017-07-26 09:52:01'),
(35, 24, 3, 2, 120000, '2017-07-26 09:52:01', '2017-07-26 09:52:01'),
(36, 25, 1, 5, 120000, '2017-07-26 10:02:39', '2017-07-26 10:02:39'),
(37, 26, 6, 5, 180000, '2017-07-26 10:04:50', '2017-07-26 10:04:50'),
(38, 27, 62, 1, 220000, '2017-07-26 10:06:41', '2017-07-26 10:06:41'),
(39, 27, 4, 5, 160000, '2017-07-26 10:06:41', '2017-07-26 10:06:41'),
(40, 28, 4, 1, 160000, '2017-07-26 10:16:36', '2017-07-26 10:16:36'),
(41, 29, 4, 2, 160000, '2017-07-26 16:12:44', '2017-07-26 16:12:44'),
(42, 30, 1, 1, 120000, '2017-07-26 16:16:35', '2017-07-26 16:16:35'),
(43, 31, 4, 1, 160000, '2017-07-26 16:17:48', '2017-07-26 16:17:48'),
(44, 32, 6, 5, 180000, '2017-07-26 16:18:52', '2017-07-26 16:18:52'),
(45, 33, 6, 1, 180000, '2017-07-26 16:33:14', '2017-07-26 16:33:14'),
(46, 34, 3, 1, 120000, '2017-07-26 16:34:08', '2017-07-26 16:34:08'),
(47, 34, 19, 1, 150000, '2017-07-26 16:34:08', '2017-07-26 16:34:08'),
(48, 35, 6, 1, 180000, '2017-07-26 17:45:51', '2017-07-26 17:45:51'),
(49, 35, 13, 1, 280000, '2017-07-26 17:45:51', '2017-07-26 17:45:51'),
(50, 36, 12, 1, 180000, '2017-07-26 17:48:30', '2017-07-26 17:48:30'),
(51, 36, 1, 1, 120000, '2017-07-26 17:48:30', '2017-07-26 17:48:30'),
(56, 40, 6, 1, 180000, '2017-07-31 09:43:43', '2017-07-31 09:43:43'),
(55, 39, 4, 1, 160000, '2017-07-30 08:37:57', '2017-07-30 08:37:57'),
(54, 38, 28, 1, 120000, '2017-07-27 00:46:25', '2017-07-27 00:46:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_customer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name_customer`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '99999999999999999', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(16, 'nguyen van vu', 'nam', 'hieuhtk76@gmail.com', 'thanh cao', '0169865733', 'no', '2017-07-12 06:19:39', '2017-07-12 06:19:39'),
(17, 'nguyen van vu', 'nam', 'hieuhtk76@gmail.com', 'thanh cao', '0169865733', 'no', '2017-07-12 06:20:59', '2017-07-12 06:20:59'),
(18, 'nguyen van vu', 'nam', 'hieuhtk76@gmail.com', 'thanh cao', '0169865733', 'no', '2017-07-12 06:21:57', '2017-07-12 06:21:57'),
(19, 'nguyen van vu', 'nam', 'hieuhtk76@gmail.com', 'thanh cao', '0169865733', 'no', '2017-07-12 06:23:30', '2017-07-12 06:23:30'),
(20, 'nguyen thi van anh', 'nam', 'dancaomat@gmail.com', 'thanh cao', '0169865733', '1', '2017-07-12 06:24:17', '2017-07-12 06:24:17'),
(21, 'nguyen van vu', 'nữ', 'dancaomat@gmail.com', 'thanh cao', '0169865733', 'th', '2017-07-12 06:26:42', '2017-07-12 06:26:42'),
(22, 'test2', 'nam', 'hieuhtk76@gmail.com', 'hn', '01698657332', 't', '2017-07-12 06:28:41', '2017-07-12 06:28:41'),
(23, 'pham ba hieu', 'nữ', 'h@gmail.com', 'hatay', '132456', 'hieu', '2017-07-12 06:30:12', '2017-07-12 06:30:12'),
(24, 'vân anh', 'nữ', 'vananh@gmail.com.vn', 'thanh cao', '666666', 'đúng hạn', '2017-07-12 06:33:04', '2017-07-12 06:33:04'),
(25, 'huongseng', 'nữ', 'meminh@gmail.com', 'nhaminh', '963', 'nhanh nen', '2017-07-12 06:39:58', '2017-07-12 06:39:58'),
(26, 'hihi', 'nam', 'hii@gmail.com', 'thanh cao', '0169865733', 'tr', '2017-07-12 06:43:25', '2017-07-12 06:43:25'),
(27, 'thanh', 'nam', 'dancaomat@gmail.com', 'hn', '01698657332', 'nhanhcmmlen', '2017-07-12 06:46:16', '2017-07-12 06:46:16'),
(28, 'thanh', 'nam', 'dancaomat@gmail.com', 'thanh cao', '0169865733', 'okee', '2017-07-12 06:46:50', '2017-07-12 06:46:50'),
(29, 'king kong', 'nam', 'hayhay@gmail.com', 'kiki', '444444', 'nhanh lên', '2017-07-19 13:55:17', '2017-07-19 13:55:17'),
(30, 'lac', 'nam', 'lac@gmail.com', 'trieu khuc', '0191919191', 'hihi', '2017-07-26 08:23:40', '2017-07-26 08:23:40'),
(31, 'vunguyen', 'nam', 'vu1@gmail.com', 'Streehnt Address', '123455111', 'gsdfsdfsdfdsfds', '2017-07-26 08:26:51', '2017-07-26 08:26:51'),
(32, 'mân', 'nam', 'anhken@gmail.com', 'ha noi', '12456656', 'ggggg', '2017-07-26 09:52:01', '2017-07-26 09:52:01'),
(33, 'Bánh mặn ngon', 'nam', 'anhken@gmail.com', 'hn', '11111111111', 'dfdsfsdfdsfds', '2017-07-26 10:02:39', '2017-07-26 10:02:39'),
(34, 'koooooooooo', 'nữ', 'conglac111@gmail.com', 'ha noi', '123455', '131312312321', '2017-07-26 10:04:50', '2017-07-26 10:04:50'),
(35, 'Bánh su kem ngon', 'nam', 'conglac@gmail.com', 'ha noi', '12456656', 'trtrtr', '2017-07-26 10:06:41', '2017-07-26 10:06:41'),
(36, 'Bánh su kem ngon', 'nam', 'anhken@gmail.com', 'ha noi', '12346', 'dsfdsfsdfds', '2017-07-26 10:16:36', '2017-07-26 10:16:36'),
(37, 'hieumissfsdfsdfs', 'nam', 'dsadasd@gmail.com', 'dsaddasdsa', '11213123131', 'fsfdsfsdfsdfds', '2017-07-26 16:12:44', '2017-07-26 16:12:44'),
(38, 'rưefewfwfwe', 'nam', 'a@gmail.com', 'ha noi', '1234561331', 'efeffrefrefrefre', '2017-07-26 16:16:35', '2017-07-26 16:16:35'),
(39, 'fgbgggg', 'nam', 'conglac@gmail.com', 'Streehnt Address', '11111111111', '543534534534', '2017-07-26 16:17:48', '2017-07-26 16:17:48'),
(40, 'sdvfdvdfvfvfdvfd', 'nữ', 'a@gmail.com', 'hn', '1234552222', 'fdsfsdfdsfsd', '2017-07-26 16:18:52', '2017-07-26 16:18:52'),
(41, 'hgfhghgfhfg', 'nam', 'anhken@gmail.com', 'ha noi', '11111111111', 'hgfhgfhfghfghgf', '2017-07-26 16:33:14', '2017-07-26 16:33:14'),
(42, 'bbbbbbbbbbb', 'nam', 'conglac@gmail.com', 'Streehnt Address', '12456656', 'fdfffff', '2017-07-26 16:34:08', '2017-07-26 16:34:08'),
(43, 'nnnnnnnnnnnn', 'nam', 'conglac@gmail.com', 'ha noi', '11111111111', 'ghfhfgh', '2017-07-26 17:45:51', '2017-07-26 17:45:51'),
(44, 'aaaaaaaaaaaaaaaaaa', 'nam', 'conglac@gmail.com', 'ha noi', '12456656', 'adadas', '2017-07-26 17:48:30', '2017-07-26 17:48:30'),
(45, 'fdfdfdfdfdfdfd', 'nam', 'anhken@gmail.com', 'hn', '11111111111', 'ddsfdsfsd', '2017-07-27 00:43:20', '2017-07-27 00:43:20'),
(46, 'llllllllllllllll', 'nam', 'fererr@gmail.com', 'Streehnt Address', '11111111111', 'fkbfkdsfksdfksd', '2017-07-27 00:46:25', '2017-07-27 00:46:25'),
(47, 'Nguyễn Văn Vũ', 'nam', 'vunguyen10111995@gmail.com', 'trieu khuc', '01698675733', 'ADMIN', '2017-07-30 08:37:57', '2017-07-30 08:37:57'),
(48, 'ahihi', 'nam', 'anhken@gmail.com', 'Streehnt Address', '11111111111', '1111111111111111111111111111111111111', '2017-07-31 09:43:43', '2017-07-31 09:43:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Crepe Sầu riêng', 5, 'Bánh crepe sầu riêng nhà làm', 150000, 120000, 'source/image/product/1430967449-pancake-sau-rieng-6.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(2, 'Banh my ba te', 1, 'banh ngon lam', 180000, 160000, 'public/source/image/product\\phpDBE2.tmp', 'hộp', 1, '2016-10-26 03:00:16', '2017-07-27 15:14:29'),
(3, 'Bánh Crepe Sầu riêng - Chuối', 5, 'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn. Ngoài hình dáng bắt mắt, lớp vở bánh giòn giòn cùng với nhân mặn như thịt gà, nấm, thị heo ,… của bánh sẽ chinh phục bất cứ ai dùng thử.', 150000, 120000, 'public/source/image/product\\php5208.tmp', 'hộp', 1, '2016-10-26 03:00:16', '2017-07-27 15:02:58'),
(4, 'Bánh Crepe Đào', 5, '', 160000, 0, 'source/image/product/crepe-dao.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(5, 'Bánh Crepe Dâu', 5, '', 160000, 0, 'source/image/product/crepedau.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(6, 'Bánh Crepe Pháp', 5, '', 200000, 180000, 'source/image/product/crepe-phap.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(7, 'Bánh Crepe Táo', 5, '', 160000, 0, 'source/image/product/crepe-tao.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(8, 'Bánh Crepe Trà xanh', 5, '', 160000, 150000, 'source/image/product/crepe-traxanh.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(9, 'Bánh Crepe Sầu riêng và Dứa', 5, '', 160000, 150000, 'source/image/product/saurieng-dua.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(11, 'Bánh Gato Trái cây Việt Quất', 3, '', 250000, 0, 'source/image/product/544bc48782741.png', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(12, 'Bánh sinh nhật rau câu trái cây', 3, '', 200000, 180000, 'source/image/product/210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(13, 'Bánh kem Chocolate Dâu', 3, '', 300000, 280000, 'source/image/product/banh kem sinh nhat.jpg', 'cái', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(14, 'Bánh kem Dâu III', 3, '', 300000, 280000, 'source/image/product/Banh-kem (6).jpg', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(15, 'Bánh kem Dâu I', 3, '', 350000, 320000, 'source/image/product/banhkem-dau.jpg', 'cái', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(16, 'Bánh trái cây II', 3, '', 150000, 120000, 'source/image/product/banhtraicay.jpg', 'hộp', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(17, 'Apple Cake', 3, '', 250000, 240000, 'source/image/product/Fruit-Cake_7979.jpg', 'cai', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(18, 'Bánh ngọt nhân cream táo', 2, '', 180000, 0, 'source/image/product/20131108144733.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(19, 'Bánh Chocolate Trái cây', 2, '', 150000, 0, 'source/image/product/Fruit-Cake_7976.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(20, 'Bánh Chocolate Trái cây II', 2, '', 150000, 0, 'source/image/product/Fruit-Cake_7981.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'Peach Cake', 2, '', 160000, 150000, 'source/image/product/Peach-Cake_3294.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'Bánh bông lan trứng muối I', 1, '', 160000, 150000, 'source/image/product/banhbonglantrung.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(23, 'Bánh bông lan trứng muối II', 1, '', 180000, 0, 'source/image/product/banhbonglantrungmuoi.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(24, 'Bánh French', 1, '', 180000, 0, 'source/image/product/banh-man-thu-vi-nhat-1.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'Bánh mì Australia', 1, '', 80000, 70000, 'source/image/product/dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'Bánh mặn thập cẩm', 1, '', 50000, 0, 'source/image/product/Fruit-Cake.png', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'Bánh Muffins trứng', 1, '', 100000, 80000, 'source/image/product/maxresdefault.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(28, 'Bánh Scone Peach Cake', 1, '', 120000, 0, 'source/image/product/Peach-Cake_3300.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'Bánh mì Loaf I', 1, '', 100000, 0, 'source/image/product/sli12.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'Bánh kem Chocolate Dâu I', 4, '', 380000, 350000, 'source/image/product/sli12.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'Bánh kem Trái cây I', 4, '', 380000, 350000, 'source/image/product/Fruit-Cake.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'Bánh kem Trái cây II', 4, '', 380000, 350000, 'source/image/product/Fruit-Cake_7971.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(33, 'Bánh kem Doraemon', 4, '', 280000, 250000, 'source/image/product/p1392962167_banh74.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'Bánh kem Caramen Pudding', 4, '', 280000, 0, 'source/image/product/Caramen-pudding636099031482099583.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(35, 'Bánh kem Chocolate Fruit', 4, '', 320000, 300000, 'source/image/product/chocolate-fruit636098975917921990.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(36, 'Bánh kem Coffee Chocolate GH6', 4, '', 320000, 300000, 'source/image/product/COFFE-CHOCOLATE636098977566220885.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(37, 'Bánh kem Mango Mouse', 4, '', 320000, 300000, 'source/image/product/mango-mousse-cake.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'Bánh kem Matcha Mouse', 4, '', 350000, 330000, 'source/image/product/MATCHA-MOUSSE.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'Bánh kem Flower Fruit', 4, '', 350000, 330000, 'source/image/product/flower-fruits636102461981788938.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'Bánh kem Strawberry Delight', 4, '', 350000, 330000, 'source/image/product/strawberry-delight636102445035635173.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'Bánh kem Raspberry Delight', 4, '', 350000, 330000, 'source/image/product/raspberry.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(42, 'Beefy Pizza', 6, 'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella', 150000, 130000, 'source/image/product/40819_food_pizza.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(43, 'Hawaii Pizza', 6, 'Sốt cà chua, ham , dứa, pho mai mozzarella', 120000, 0, 'source/image/product/hawaiian paradise_large-900x900.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(44, 'Smoke Chicken Pizza', 6, 'Gà hun khói,nấm, sốt cà chua, pho mai mozzarella.', 120000, 0, 'source/image/product/chicken black pepper_large-900x900.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(45, 'Sausage Pizza', 6, 'Xúc xích klobasa, Nấm, Ngô, sốtcà chua, pho mai Mozzarella.', 120000, 0, 'source/image/product/pizza-miami.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(46, 'Ocean Pizza', 6, 'Tôm , mực, xào cay,ớt xanh, hành tây, cà chua, phomai mozzarella.', 120000, 0, 'source/image/product/seafood curry_large-900x900.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(47, 'All Meaty Pizza', 6, 'Ham, bacon, chorizo, pho mai mozzarella.', 140000, 0, 'source/image/product/all1).jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(48, 'Tuna Pizza', 6, 'Cá Ngừ, sốt Mayonnaise,sốt càchua, hành tây, pho mai Mozzarella', 140000, 0, 'source/image/product/54eaf93713081_-_07-germany-tuna.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(49, 'Bánh su kem nhân dừa', 7, '', 120000, 100000, 'source/image/product/maxresdefault.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(50, 'Bánh su kem sữa tươi', 7, '', 120000, 100000, 'source/image/product/sukem.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(51, 'Bánh su kem sữa tươi chiên giòn', 7, '', 150000, 0, 'source/image/product/1434429117-banh-su-kem-chien-20.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(52, 'Bánh su kem dâu sữa tươi', 7, '', 150000, 0, 'source/image/product/sukemdau.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(53, 'Bánh su kem bơ sữa tươi', 7, '', 150000, 0, 'source/image/product/He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(54, 'Bánh su kem nhân trái cây sữa tươi', 7, '', 150000, 0, 'source/image/product/foody-banh-su-que-635930347896369908.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(55, 'Bánh su kem cà phê', 7, '', 150000, 0, 'source/image/product/banh-su-kem-ca-phe-1.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(56, 'Bánh su kem phô mai', 7, '', 150000, 0, 'source/image/product/50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(57, 'Bánh su kem sữa tươi chocolate', 7, '', 150000, 0, 'source/image/product/combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(58, 'Bánh Macaron Pháp', 2, 'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.', 200000, 180000, 'source/image/product/Macaron9.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(59, 'Bánh Tiramisu - Italia', 2, 'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn', 200000, 0, 'source/image/product/234.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(60, 'Bánh Táo - Mỹ', 2, 'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.', 200000, 0, 'source/image/product/1234.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(61, 'Bánh Cupcake - Anh Quốc', 6, 'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau. Cupcake còn được cho là chiếc bánh mang lại niềm vui và tiếng cười như chính hình dáng đáng yêu của chúng.', 150000, 120000, 'source/image/product/cupcake.jpg', 'cái', 1, NULL, NULL),
(62, 'Bánh Sachertorte', 6, 'Sachertorte là một loại bánh xốp được tạo ra bởi loại&nbsp;chocholate&nbsp;tuyệt hảo nhất của nước Áo. Sachertorte có vị ngọt nhẹ, gồm nhiều lớp bánh được làm từ ruột bánh mì và bánh sữa chocholate, xen lẫn giữa các lớp bánh là mứt mơ. Món bánh chocholate này nổi tiếng tới mức thành phố Vienna của Áo đã ấn định&nbsp;tổ chức một ngày Sachertorte quốc gia, vào 5/12 hằng năm', 250000, 220000, 'source/image/product/111.jpg', 'cái', 0, NULL, NULL),
(73, 'bánh mới ra', 7, 'banh ngon', 200000, NULL, 'public/source/image/product\\php623E.tmp', 'cái', 1, '2017-07-31 02:16:01', '2017-07-31 02:16:01'),
(74, 'bánh thôi', 3, 'Những chiếc bánh cupcake xinh xắn với lớp kem phủ ngọt ngào đẹp sẽ làm bạn không thể cưỡng lại và rời mắt được', 140000, 120000, 'public/source/image/product\\php5110.tmp', 'hộp', 1, '2017-07-31 02:19:13', '2017-07-31 02:19:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'banner1.jpg'),
(2, '', 'banner2.jpg'),
(3, '', 'banner3.jpg'),
(4, '', 'banner4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mặn', 'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn. Ngoài hình dáng bắt mắt, lớp vở bánh giòn giòn cùng với nhân mặn như thịt gà, nấm, thị heo ,… của bánh sẽ chinh phục bất cứ ai dùng thử. Hehe', 'public/source/image/product\\php2925.tmp', NULL, '2017-07-26 03:57:49'),
(2, 'Bánh ngọt', 'Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào, được nướng lên dùng để tráng miệng. Bánh ngọt có nhiều loại, có thể phân loại dựa theo nguyên liệu và kỹ thuật chế biến như bánh ngọt làm từ lúa mì, bơ, bánh ngọt dạng bọt biển. Bánh ngọt có thể phục vụ những mục đính đặc biệt như bánh cưới, bánh sinh nhật, bánh Giáng sinh, bánh Halloween..', 'source/image/product/1234.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Bánh trái cây', 'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi \"lạc\" vào mảnh đất Cố đô, món bánh này dường như cũng mang chút tinh tế, cầu kỳ và đặc biệt. Lấy cảm hứng từ những loại trái cây trong vườn, qua bàn tay khéo léo của người phụ nữ Huế, món bánh trái cây ra đời - ngọt thơm, dịu nhẹ làm đẹp lòng biết bao người thưởng thức.', 'source/image/product/banhtraicay.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Bánh kem', 'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé!', 'source/image/product/20131108144733.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Bánh crepe', 'Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”', 'source/image/product/crepedau.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'Bánh Pizza', 'Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới mà còn được những nhà cầm quyền EU chứng nhận là một phần di sản văn hóa ẩm thực châu Âu. Và để được chứng nhận là một nhà sản xuất pizza không hề đơn giản. Người ta phải qua đủ mọi các bước xét duyệt của chính phủ Ý và liên minh châu Âu nữa… tất cả là để đảm bảo danh tiếng cho món ăn này.', 'source/image/product/pizza.jpg', '2016-10-25 17:19:00', NULL),
(7, 'Bánh su kem', 'Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... đánh đều tạo thành một hỗn hợp và sau đó bằng thao tác ép và phun qua một cái túi để định hình thành những bánh nhỏ và cuối cùng được nướng chín. Bánh su kem có thể thêm thành phần Sô cô la để tăng vị hấp dẫn. Bánh có xuất xứ từ nước Pháp.', 'public/source/image/product\\php72CA.tmp', '2016-10-25 17:19:00', '2017-07-24 03:03:10'),
(8, 'couple cats', 'Những chiếc bánh cupcake xinh xắn với lớp kem phủ ngọt ngào đẹp sẽ làm bạn không thể cưỡng lại và rời mắt được', 'public/source/image/product\\php58E8.tmp', '2017-07-31 07:10:12', '2017-07-31 07:10:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Hương Hương', 'huonghuong08.php@gmail.com', '$2y$10$rGY4KT6ZSMmLnxIbmTXrsu2xdgRxm8x0UTwCyYCAzrJ320kYheSRq', '01986532165', 'Hoàng Diệu 2', 0, NULL, '2017-03-23 07:17:33', '2017-07-22 15:40:41'),
(7, 'anhnt81', 'hieu111@gmail.com', '$2y$10$gzsz2vSJdjE4d8qQeYq76edTVMZ7gkgyZe3xK9TpMQl/e.e0ndL72', '01698657331', '123456', 0, NULL, '2017-07-22 10:59:07', '2017-07-22 10:59:07'),
(8, 'htk', 'htk@gmail.com', '$2y$10$y6VIcgPiYEd7yEif2GPL/uv1UAIitiKBYvWuAMsG/bvqyeKqxgwYu', '01698678573', 'gggg', 0, NULL, '2017-07-22 11:17:57', '2017-07-22 11:17:57'),
(9, 'vu', 'vu@gmail.com', '$2y$10$7MWO8ZraSaUwTlejOUCrOOjh.rk50QBPH7W1AOuBKp9nW17Nuaq3W', '01698657332', 'hn', 0, NULL, '2017-07-22 11:21:25', '2017-07-22 11:21:25'),
(10, 'anhanh', 'an@gmail.com', '$2y$10$AoiCnMOnrlAQDEuiINf.zOScFAzTmyJVWv23Ctf89pCiL/uPLX/Ly', '01698657331', 'đưsd', 0, NULL, '2017-07-22 11:22:09', '2017-07-22 11:22:09'),
(11, 'vu', 'vu10@gmail.com', '$2y$10$mGVCT/VXy1DRB5CisAqfeenUCjyJRWUiqPkUh5aZkLH0ZNaDg3LFq', '0169864565', 'hn', 0, NULL, '2017-07-23 03:56:02', '2017-07-23 03:56:02'),
(12, 'dmmmm', 'dan@gmail.com', '$2y$10$Az7T0DNcqnMuyU0FWkSKF.npPifWaQYW19907sFI1Kd3DyXgwVk..', '1234567896', 'ha noi 2', 0, 'qpaJ90NFtu14mbw8Z8Z7k2EP9pEIRvo9zp9QBZ6TAzppfiHtrSmf8PUfNJUw', '2017-07-25 17:20:20', '2017-07-31 01:47:53'),
(13, 'hieu', 'hieucaomat@gmail.com', '$2y$10$Zf8oDJK1B1M8RWYMliFHsuzAetdbTkaSUX9CZHqAB68fOuA7CfKDi', '12345696', 'ha noi2', 0, NULL, '2017-07-25 17:21:05', '2017-07-25 17:21:05'),
(14, 'Cong', 'fererr1@gmail.com', '$2y$10$WmQhQwaPnu2XXrWJziz3Z.1xC.BJ9SwsRBaG9jQtrIdgQpyCeLu6.', '1245665612', 'Streehnt Address', 0, NULL, '2017-07-25 17:21:51', '2017-07-25 17:21:51'),
(16, 'Bánh mặn cc', 'congl1ac@gmail.com', '$2y$10$fxA9bAUK7scuV/a5gqyhseJEOzBo.49VowpIFBOqz7IfQa/QJrNHm', '123456', 'ha noi', 0, NULL, '2017-07-25 18:33:20', '2017-07-25 18:33:20'),
(18, 'cong lac', 'conglac96@gmail.com', '$2y$10$F5TSqgZD0lK4xDk3L6RmWOvUdIG.IBfSv7K673uRtuq3fknKxC8Ei', '0123467895', 'hung yen', 0, NULL, '2017-07-26 02:18:31', '2017-07-26 02:18:31'),
(19, 'banh1', 'a@gmail.com', '$2y$10$xAiIH5/b9OFVVafXQ0DCw.zTrQACd9GbViLHuenbe0foCC01LQGpe', '123456', 'ha noi', 0, '6EKHYhSuNGnJhcnKEN0d1GNAsvlQnwud7h8Fr7cq59bHndJRudaYsM16XyoC', '2017-07-26 02:47:14', '2017-07-26 02:47:14'),
(20, 'Bánh mặn ngon', 'fererr@gmail.com', '$2y$10$JgnIckpLMKKSNXA/eTJ.LuW9S.QYvdggLWjTvGkkRu6hbLpQMQOpi', '123455', 'Streehnt Address', 0, NULL, '2017-07-26 03:08:05', '2017-07-26 03:08:05'),
(21, 'Cong', 'hieu55@gmail.com', '$2y$10$tjuqg4678nUXQ8H.T4D9/.0ZSgFAjmns1BUyUoLN6op4B22DE6sa2', '12456656', 'hn', 0, NULL, '2017-07-26 08:37:51', '2017-07-26 08:37:51'),
(22, 'Đào Thị Thu Hằng', 'thuhang_d8cnpm.epu@gmail.com', '$2y$10$2O6DMKyyg82MuQAa1P2pD.Ep5yYePLi8THKghiCOWzSzwGBEh.o/C', '12456656', 'hn', 1, 'Uvp70i5k24NUUVkxB3CbRIyeZRVc2QDvsTbcC42DLuAdvUaeyfwHSFNYj3UI', '2017-07-26 08:42:31', '2017-07-26 08:42:31'),
(23, 'vu', 'cc@gmail.com', '$2y$10$/iyNNen0jcJjJ/h6zNk9BeV70gy7llD9B9WuUFtF6vP7lPy8wJgmu', '01234569863', 'hn', 0, 'f3qNJs5YLZjoVdZndghjRNXRNiV4YUwhb7y0QB30zz3F76jdrH0Q8zjVYQiE', '2017-07-26 09:42:51', '2017-07-31 01:33:32'),
(24, 'Nguyễn Văn Vũ', 'vunguyen@gmail.com', '$2y$10$oiY55X9PAYHixLAinSdA.eU/sCY/KS3UrqtRRnDsRO.Gc7wjxfezq', '01698675733', 'Hà Nội', 0, NULL, '2017-07-30 08:34:11', '2017-07-30 08:34:11'),
(25, 'cong', 'conglacc@gmail.com', '$2y$10$Le93W0e8se7zzmIJQ/85J.KVcjj5O3qTC5m5CsJFRv/./.tyyFjdG', '0123456547', 'ha noi', 0, NULL, '2017-07-30 08:35:51', '2017-07-30 08:35:51'),
(26, 'Cong huh', 'congla111c@gmail.com', '$2y$10$LOlcgDTf9I8aoZ0Q3vJ6X.AR3ZxQZd.C1OYZw1tZ7.R2zUunipvpa', '11111111111', 'hn', 0, NULL, '2017-07-31 02:01:35', '2017-07-31 02:01:35'),
(27, 'hieu', 'aa@gmail.com', '$2y$10$tQ6EbyJ5YUJz/pd98sLLB.Nu8IAFHSWydiK.cq0wP6fOMbesmIQ9y', '8888888888', 'hsfhsdkjfhsdkfh', 0, '0EHiHjW04rmmDTqRv4XSBszmwQVwNVPuUcNUlhr8lkryyAnMxkAVn9A1JVZS', '2017-07-31 07:21:32', '2017-07-31 07:22:18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
