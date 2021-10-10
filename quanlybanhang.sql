-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2021 lúc 07:28 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `time_order` date NOT NULL,
  `total` double(8,2) NOT NULL,
  `payment` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Không có!',
  `id_customer` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `time_order`, `total`, `payment`, `note`, `id_customer`, `created_at`, `updated_at`) VALUES
(15, '2021-09-18', 122000.00, 'on', 'Không có!', 37, '2021-09-18 12:19:26', '2021-09-18 12:19:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `quanlity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quanlity`, `unit_price`, `created_at`, `updated_at`) VALUES
(24, 15, 66, 1, 122000, '2021-09-18 12:19:26', '2021-09-18 12:19:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id_blog` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_theme` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT 'Chưa có nội dung',
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'image1.jpg',
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `alias` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'chua-co-alias',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id_blog`, `id_user`, `id_theme`, `name`, `description`, `image`, `content`, `status`, `alias`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Dưỡng trắng da tại nhà nhanh chóng hiệu quả', 'Có thể bạn không biết rằng trong hạt đậu đỏ có chứa chất chống oxy hóa cao. Chính vì vậy nó có chức năng chống lại vi khuẩn, làm sạch các tế bào chết, se khít lỗ chân lông trên mặt và ngăn ngừa mụn trứng cá một cách hiệu quả. Giúp điều trị da bị mụn hiệu quả và nhanh chóng.', 'image1.jpg', 'Cấu trúc của làn da gồm ba lớp: mô dưới da, hạ bì và biểu bì. Các lớp này đóng các vai trò khác nhau trong chức năng tổng thể của làn da.\r\n\r\nMột số chức năng quan trọng của làn da: bảo vệ cơ thể khỏi các tác nhân gây hại từ môi trường, điều chỉnh nhiệt độ của cơ thể sao cho phù hợp với điều kiện bên ngoài, định hình và làm đẹp cơ thể, dự trữ và trao đổi chất, cân bằng nước.\r\n\r\nVì vậy một làn da đẹp không chỉ là về màu sắc, mà còn là chất lượng, sức khỏe của làn da. Nên chăm sóc da một cách thường xuyên, đúng cách để tránh các tình trạng da bị tổn thương như: da bị khô nẻ, mất nước, mất độ đàn hồi. Xuất hiện tình trạng, chảy xệ da mỏng hơn.\r\n\r\nLàm ra được cho là khỏe mạnh là làm ra có cấu trúc dưới da chắc khỏe, cân bằng được nước và dầu, chu kỳ phục hồi ra hoạt động liên tục, giá sản xuất melanin bình thường.\r\nhttps://hillsbeauty.vn/wp-content/uploads/2021/08/duong-trang-da-tai-nha.jpg\r\nTrong sữa tươi có chứa nhiều dưỡng chất không những tốt cho cơ thể mà còn tốt cho làn da. Sữa tươi bao gồm các loại vitamin A, E, D và một số chất chống oxy hóa cao. Vì vậy sữa tươi có tác dụng cao trong việc dưỡng trắng da, loại bỏ tế bào chết và vô cùng an toàn, không gây kích ứng cho da.\r\n\r\nSử dụng sữa tươi không đường như một chất dưỡng trắng da tại nhà là một phương pháp vô cùng hiệu quả, an toàn, lành mạnh.', 0, 'duong-trang-da-nhanh-chong-hieu-qua', '2021-09-07 16:09:04', '2021-09-07 16:09:04'),
(2, 1, 1, '\r\nLàm đẹp bằng phương pháp tự nhiên', 'Chưa có nội dung', 'image1.jpg', '1', 0, 'chua-co-alias', '2021-09-07 16:09:21', '2021-09-07 16:09:21'),
(3, NULL, NULL, 'test câu hỏi', '<p>test câu hỏi</p>', NULL, NULL, NULL, 'chua-co-alias', '2021-09-13 13:55:39', '2021-09-13 13:55:39'),
(4, NULL, NULL, 'test câu hỏi', '<p>test câu hoi</p>', NULL, NULL, NULL, 'chua-co-alias', '2021-09-13 13:56:20', '2021-09-13 13:56:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED DEFAULT NULL,
  `id_post` int(10) UNSIGNED DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_parent` int(10) UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_post`, `id_product`, `id_parent`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 5, 1, 'test comment', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'rong',
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `images`, `gender`, `email`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(29, 'Tần Thủy Hoàng', 'kh1.jpg', 'nữ', 'thuy@gmail.com', 'Quận 12', '00000001', '2021-01-30 13:45:30', '2021-01-30 13:45:30'),
(30, 'Đậu Thị Thủy Chung', 'kh2.jpg', 'Nam', 'chung@gmail.com', '100a Nguyễn Tất Thành Q4', '00000002', '2021-01-30 13:47:40', '2021-01-30 13:47:40'),
(31, 'Nguyễn Trần Trung', 'kh3.jpg', 'Nữ', 'trung@gmail.com', 'quận 3', '00000003', '2021-01-30 13:53:52', '2021-01-30 13:53:52'),
(32, 'Nguyễn Tuyết Nga', 'rong', 'on', 'nga@gmail.com', '112 Võ Thị Sáu', '098789076', '2021-03-07 03:24:07', '2021-03-07 03:24:07'),
(33, 'Nguyễn Tuyết Nga', 'rong', 'on', 'nga@gmail.com', '112 Võ Thị Sáu', '098789076', '2021-03-07 03:25:53', '2021-03-07 03:25:53'),
(34, 'Trần Văn Huy', 'rong', 'on', 'huy@gmail.com', '134 Nguyễn Huệ', '098909876', '2021-03-07 03:27:17', '2021-03-07 03:27:17'),
(35, 'Nguyễn Thị Cẩm Tú', 'rong', 'on', 'tu@gmail.com', '134 An Phú Đông', '0989098765', '2021-03-08 15:45:41', '2021-03-08 15:45:41'),
(36, 'Nguyễn Thị Trân', 'rong', 'on', 'tran@gmail.com', 'Q12', '0321548752', '2021-09-18 12:19:15', '2021-09-18 12:19:15'),
(37, 'Nguyễn Thị Trân', 'rong', 'on', 'tran@gmail.com', 'Q12', '0321548752', '2021-09-18 12:19:26', '2021-09-18 12:19:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_09_160743_create_news_table', 1),
(5, '2021_09_07_222225_blog', 2),
(6, '2021_09_07_222826_theme', 3),
(7, '2021_09_11_195912_post', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id_post` int(10) UNSIGNED NOT NULL,
  `id_product` int(11) DEFAULT 5,
  `id_blog` int(11) DEFAULT 1,
  `title_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id_post`, `id_product`, `id_blog`, `title_post`, `body_post`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 2, 'test commnent', 'nội dung comment test blog 2', NULL, NULL, NULL),
(2, 5, NULL, 'test comment 2', 'nội dung 2', NULL, NULL, NULL),
(3, 6, NULL, 'test cmt 3', 'nội dung 3', '2021-09-11 16:49:46', '2021-09-11 16:49:46', '2021-09-11 16:49:46'),
(4, 0, NULL, '', '', '2021-09-11 18:01:07', '2021-09-11 18:01:07', '2021-09-11 18:01:07'),
(5, NULL, 1, '', 'test commnet blog', '2021-09-11 18:01:26', '2021-09-11 18:01:26', '2021-09-11 18:01:26'),
(6, 5, 1, NULL, 'a', '2021-09-13 14:45:58', '2021-09-13 14:45:58', '2021-09-13 14:45:58'),
(7, 5, 1, NULL, 'a', '2021-09-13 14:46:55', '2021-09-13 14:46:55', '2021-09-13 14:46:55'),
(8, 5, 1, NULL, 'dsadasdas', '2021-09-13 14:47:06', '2021-09-13 14:47:06', '2021-09-13 14:47:06'),
(9, 5, 1, NULL, 'trả về liền', '2021-09-13 14:55:07', '2021-09-13 14:55:07', '2021-09-13 14:55:07'),
(10, NULL, 1, NULL, 'test comrnt prodct', '2021-09-13 16:25:02', '2021-09-13 16:25:02', '2021-09-13 16:25:02'),
(11, NULL, 1, NULL, 'test comrnt prodct', '2021-09-13 16:25:33', '2021-09-13 16:25:33', '2021-09-13 16:25:33'),
(12, NULL, 1, NULL, 'test comrnt prodct', '2021-09-13 16:26:16', '2021-09-13 16:26:16', '2021-09-13 16:26:16'),
(13, NULL, 1, NULL, 'test comrnt prodct', '2021-09-13 16:26:47', '2021-09-13 16:26:47', '2021-09-13 16:26:47'),
(14, NULL, 1, NULL, 'test commenr', '2021-09-13 16:27:04', '2021-09-13 16:27:04', '2021-09-13 16:27:04'),
(15, NULL, 1, NULL, 'gjhgjghk test', '2021-09-13 16:28:55', '2021-09-13 16:28:55', '2021-09-13 16:28:55'),
(16, NULL, 1, NULL, '55555555', '2021-09-13 16:39:30', '2021-09-13 16:39:30', '2021-09-13 16:39:30'),
(17, 5, 2, NULL, 'test', '2021-09-14 01:20:20', '2021-09-14 01:20:20', '2021-09-14 01:20:20'),
(18, 5, 2, NULL, 'test', '2021-09-14 01:20:41', '2021-09-14 01:20:41', '2021-09-14 01:20:41'),
(19, NULL, 1, NULL, 'sản phẩm tốt', '2021-09-15 14:41:29', '2021-09-15 14:41:29', '2021-09-15 14:41:29'),
(20, 5, 2, NULL, 'sản phẩm tốt', '2021-09-15 14:55:08', '2021-09-15 14:55:08', '2021-09-15 14:55:08'),
(21, NULL, 1, NULL, 'Kem Nền Che Phủ Cao Flormar Light Beige 30ml Invisible Cover HD Foundation', '2021-09-15 15:19:34', '2021-09-15 15:19:34', '2021-09-15 15:19:34'),
(22, 55, 1, NULL, 'Hoàn Hoàn Hoàn Hoàn', '2021-09-15 15:33:33', '2021-09-15 15:33:33', '2021-09-15 15:33:33'),
(23, 55, 1, NULL, 'Hoàn Hoàn Hoàn Hoàn', '2021-09-15 15:34:15', '2021-09-15 15:34:15', '2021-09-15 15:34:15'),
(24, 55, 1, NULL, 'testcccccc', '2021-09-15 15:34:40', '2021-09-15 15:34:40', '2021-09-15 15:34:40'),
(25, 55, 1, NULL, 'tesgdsjdjshdkas', '2021-09-15 15:35:42', '2021-09-15 15:35:42', '2021-09-15 15:35:42'),
(26, 55, 1, NULL, '222', '2021-09-15 15:36:13', '2021-09-15 15:36:13', '2021-09-15 15:36:13'),
(27, 55, 1, NULL, '222', '2021-09-15 15:36:37', '2021-09-15 15:36:37', '2021-09-15 15:36:37'),
(28, 55, 1, NULL, 'aaaaaaaaaaaaa', '2021-09-15 15:36:51', '2021-09-15 15:36:51', '2021-09-15 15:36:51'),
(29, 58, 1, NULL, 'sản phẩm tốt', '2021-09-16 17:41:27', '2021-09-16 17:41:27', '2021-09-16 17:41:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quanlity` int(11) NOT NULL DEFAULT 1,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double(8,2) DEFAULT 0.00,
  `promotion_price` double(8,2) DEFAULT 0.00,
  `new` tinyint(3) UNSIGNED DEFAULT 1,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'không',
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT 'productsp1.png',
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT '\'\\\'productsp1.png\\\'\'',
  `status` int(11) DEFAULT 0,
  `alias` text COLLATE utf8mb4_unicode_ci DEFAULT '\'alias\'',
  `product_views` int(11) DEFAULT 100,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `quanlity`, `id_type`, `id_user`, `id_post`, `description`, `unit_price`, `promotion_price`, `new`, `unit`, `image`, `images`, `status`, `alias`, `product_views`, `created_at`, `updated_at`) VALUES
(50, 'Bông Tẩy Trang Ipek 150 Miếng Cotton Pads', 1, 1, 3, 55, '<p>Việc trang điểm đã không còn xa lạ đối với các chị em phụ nữ, tuy nhiên sau khi sử dụng các sản phẩm làm đẹp ấy thì phần lớn chúng ta quên đi bước quan trọng cuối ngày đó chính là tẩy trang. Hiện nay trên thị trường có rất nhiều loại tẩy trang phù hợp cho từng tính chất da, cho từng vị trí trên khuôn mặt.&nbsp;Nếu bạn đã sở hữu cho mình loại tẩy trang phù hợp với mình thì <a href=\"https://hasaki.vn/danh-muc/khan-bong-ty-trang-c47.html\"><strong>bông tẩy trang</strong></a> cũng đóng vai trò khá quan trọng trong việc tẩy đi lớp trang điểm hàng ngày và làm sạch mọi bụi bẩn trên da.</p>', 44000.00, 0.00, 0, 'không', 'uploals/JpijSjRaHTaaqOPdtkQiURsEtwX7b8AHisLWiaNc.jpg', 'uploals/3KgmMrHGxDs7CglOcf3wq2L1j1ezrxyMszgexBxz.jpg', NULL, NULL, 100, '2021-09-14 14:51:47', '2021-09-16 15:52:01'),
(55, 'Kem Nền Che Phủ Cao Flormar Light Beige 30ml Invisible Cover HD Foundation', 10, 5, 2, 55, '', 200000.00, 0.00, 0, 'không', 'uploals/hEWO1B2To6xdL3BM1RXgZlCibZmw9PRSixGf2aga.jpg', 'uploals/qiAQ4EkkiY0IjzOwHiVRJuBp8beSiTMXUwFjxvpB.jpg', NULL, NULL, 100, '2021-09-14 17:20:58', '2021-09-15 14:18:12'),
(58, 'cái này chưa sửa xong', 1, 1, 3, 55, '<p><strong>Là nhãn hàng nổi tiếng trong việc truyền cả</strong>m hứng cho mọi cô gái trên thế giới, đặc biệt là ở Vương Quốc Anh, nay thương hiệu HAIRBURST đã chính thức có mặt tại Việt Nam để tiếp nối hành trình đó, mang đến phương pháp chăm sóc tóc đúng cách cho phái đẹp Việt với bộ sản phẩm HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair được chiết xuất từ các thành phần tự nhiên. Bộ sản phẩm gội - xả HAIRBURST sẽ kích thích tóc bạn mọc nhanh nhất trong thời gian ngắn nhất, đồng thời cung cấp đủ dưỡng chất để tóc mọc khỏe nhất, ngăn ngừa các bệnh về tóc như nấm ngứa, gàu hay gãy rụng.</p><p>Bộ gội xả HAIRBURST chứa đến 95% thành phần tự nhiên, trong đó nổi bật với tinh dầu Dừa giúp dưỡng ẩm sâu, tăng cường thêm độ bóng mượt và mềm mại cho mái tóc, ngăn ngừa hiện tượng tóc gãy rụng và chẻ ngọn, góp phần làm dài tóc. Không chỉ vậy, tinh dầu Dừa còn thúc đẩy sức khỏe của da đầu, giúp chống lại các vấn đề như gàu ngứa.</p><p>Ngoài ra, trong bộ gội xả HAIRBURST còn chứa các axit amin giúp bổ sung độ ẩm cho mái tóc và Panthenol giúp giữ nước trên thân tóc, làm tóc trông dày và bồng bềnh hơn, không chỉ cải thiện vẻ ngoài của tóc mà còn tạo cảm giác tóc chắc khỏe hơn khi chạm vào.</p><p>Công thức sản phẩm được thiết kế đặc biệt để mang lại hiệu quả tối ưu trong khi gội, giúp cho mái tóc \"đẹp như mơ\" của bạn dễ dàng trở thành hiện thực hơn bao giờ hết. Bộ Gội Xả HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair là giải pháp tối ưu và an toàn để chăm sóc mái tóc hằng ngày, giúp thúc đẩy sự phát triển khỏe mạnh của tóc sau mỗi lần sử dụng.</p><p>Bên cạnh đó, sản phẩm có mùi hương tinh tế, thơm ngon của tinh dầu Dừa &amp; Bơ dễ dàng \"gây nghiện\" với bất kì cô nàng nào yêu thích sự ngọt ngào. Mùi hương quyến rũ này sẽ ngay lập tức làm tăng cường tâm trạng, giúp chuẩn bị sẵn sàng để bạn bắt đầu một ngày mới thật \"năng suất\", cũng như giúp thư giãn tinh thần sau một ngày dài mệt mỏi.</p><p>Hiện Bộ Dầu Gội &amp; Dầu Xả Hỗ Trợ Mọc Tóc HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair đã có mặt tại Hasaki.</p>', 44000.00, 55000.00, 0, 'không', 'uploals/YTGwgC5n01MuUeJpoYgErvH8xwp7OzLfmuzbioFa.jpg', 'uploals/r1eZRsSEiijSFrne5JsuHCbDZjfZbE6pqXTkIUTO.jpg', NULL, NULL, 100, '2021-09-15 17:37:39', '2021-09-16 15:51:48'),
(59, 'edit test k tồn tại', 1, 1, 3, 55, '<p><strong>Là nhãn hàng nổi tiếng trong việc truyền cả</strong>m hứng cho mọi cô gái trên thế giới, đặc biệt là ở Vương Quốc Anh, nay thương hiệu HAIRBURST đã chính thức có mặt tại Việt Nam để tiếp nối hành trình đó, mang đến phương pháp chăm sóc tóc đúng cách cho phái đẹp Việt với bộ sản phẩm HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair được chiết xuất từ các thành phần tự nhiên. Bộ sản phẩm gội - xả HAIRBURST sẽ kích thích tóc bạn mọc nhanh nhất trong thời gian ngắn nhất, đồng thời cung cấp đủ dưỡng chất để tóc mọc khỏe nhất, ngăn ngừa các bệnh về tóc như nấm ngứa, gàu hay gãy rụng.</p><p>Bộ gội xả HAIRBURST chứa đến 95% thành phần tự nhiên, trong đó nổi bật với tinh dầu Dừa giúp dưỡng ẩm sâu, tăng cường thêm độ bóng mượt và mềm mại cho mái tóc, ngăn ngừa hiện tượng tóc gãy rụng và chẻ ngọn, góp phần làm dài tóc. Không chỉ vậy, tinh dầu Dừa còn thúc đẩy sức khỏe của da đầu, giúp chống lại các vấn đề như gàu ngứa.</p><p>Ngoài ra, trong bộ gội xả HAIRBURST còn chứa các axit amin giúp bổ sung độ ẩm cho mái tóc và Panthenol giúp giữ nước trên thân tóc, làm tóc trông dày và bồng bềnh hơn, không chỉ cải thiện vẻ ngoài của tóc mà còn tạo cảm giác tóc chắc khỏe hơn khi chạm vào.</p><p>Công thức sản phẩm được thiết kế đặc biệt để mang lại hiệu quả tối ưu trong khi gội, giúp cho mái tóc \"đẹp như mơ\" của bạn dễ dàng trở thành hiện thực hơn bao giờ hết. Bộ Gội Xả HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair là giải pháp tối ưu và an toàn để chăm sóc mái tóc hằng ngày, giúp thúc đẩy sự phát triển khỏe mạnh của tóc sau mỗi lần sử dụng.</p><p>Bên cạnh đó, sản phẩm có mùi hương tinh tế, thơm ngon của tinh dầu Dừa &amp; Bơ dễ dàng \"gây nghiện\" với bất kì cô nàng nào yêu thích sự ngọt ngào. Mùi hương quyến rũ này sẽ ngay lập tức làm tăng cường tâm trạng, giúp chuẩn bị sẵn sàng để bạn bắt đầu một ngày mới thật \"năng suất\", cũng như giúp thư giãn tinh thần sau một ngày dài mệt mỏi.</p><p>Hiện Bộ Dầu Gội &amp; Dầu Xả Hỗ Trợ Mọc Tóc HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair đã có mặt tại Hasaki.</p>', 44000.00, 55000.00, 0, 'không', 'uploals/bNikz93y8RjJ5n5M66hARBg4VXQIWcIQwtfpbOWp.jpg', 'uploals/ce6vbaHUC3Q0Fip14MAddZgUTlFOE479pgZvrokw.jpg', NULL, NULL, 100, '2021-09-15 17:40:08', '2021-09-16 15:51:33'),
(62, 'Sữa Rửa Mặt Cetaphil Dịu Nhẹ Không Xà Phòng 500ml Gentle Skin Cleanser', 1, 33, 6, 55, '', 252000.00, 0.00, 0, 'không', 'uploals/x5vljR4WQuCOvdpXToreBoFaCZ6gJZN1mV7pOyFf.jpg', 'uploals/8BXPo64w8kFPMccYrWDJQ3nSuliOfr6FGuCqn7nX.jpg', NULL, NULL, 100, '2021-09-16 13:52:08', '2021-09-16 13:52:08'),
(63, 'Dung Dịch Tẩy Da Chết Paula’s Choice BHA 2% 30ml Skin Perfecting 2% BHA Liquid', 1, 38, 6, 55, '', 200000.00, 150000.00, 0, 'không', 'uploals/8wMiNL80jP9GSAz5mQeDXXtqkpmRDmf5Uk3P8BOb.jpg', 'uploals/zFnpSzlCvBmjsrkTXuXqE8NYIPpM0CSgU6Q2CJuY.jpg', NULL, NULL, 100, '2021-09-16 13:54:59', '2021-09-16 13:54:59'),
(64, 'Sữa Rửa Mặt Skin1004 Làm Sạch Sâu Cho Da Nhạy Cảm 125ml Madagascar Centella Ampoule Fo', 1, 38, 6, 55, '', 120000.00, 0.00, 0, 'không', 'uploals/3aHtfUjtDmOTiLMXlrlQk1DPL9HRTnMPkZUqXzRX.jpg', 'uploals/OEiPxxhGfQermYixZWOBXBfxObQtNNq7sjnlQd8U.jpg', NULL, NULL, 100, '2021-09-16 13:57:58', '2021-09-16 13:57:58'),
(65, 'Bộ Kit Angel\'s Liquid Dưỡng Sáng Da, Mờ Thâm Nám 4 Món Whitening Program Glutathione Special Kit', 1, 36, 6, 55, '', 122000.00, 0.00, 0, 'không', 'uploals/tWUYCKaa5FmAYtQLPnUEvEKQrVryU3R4iAAbrnwW.jpg', 'uploals/kkv0go3rPSYFFGxL01mU3Xi38LGOCE1yd3QS7Zyo.jpg', NULL, NULL, 100, '2021-09-16 14:03:28', '2021-09-16 14:03:28'),
(66, 'Bộ Kit Angel\'s Liquid Dưỡng Sáng Da, Mờ Thâm Nám 4 Món Whitening Program Glutathione Special Kit', 1, 36, 6, 55, '', 122000.00, 0.00, 0, 'không', 'uploals/K7mRfE15nj1K6eu54phA0dMiofHC9YBkAASyCczo.jpg', 'uploals/v8eo8I0bv0mHD7QoglJuQ3zNdmiI7TY1gcbegigU.jpg', NULL, NULL, 100, '2021-09-16 14:03:28', '2021-09-16 14:03:28'),
(67, 'Sữa Rửa Mặt Neutrogena Làm Sạch Sâu Dạng Gel 150ml Facial Cleanser Deep Clean', 1, 11, 6, 55, '', 100000.00, 0.00, 1, 'không', 'uploals/kcZJ0N4KVJsIQGGKTGpqTMTefDHKA30TPIG17oVu.jpg', 'uploals/fFz11jTq3zGZvhToGLV7stP3m6v69BED7CVdhuv1.jpg', NULL, NULL, 100, '2021-09-16 14:06:58', '2021-09-16 14:06:58'),
(68, 'Nước Hoa Nam BURBERRY Brit EDT 100ml Brit For Men EDT Spray', 1, 1, 7, 55, '<p><strong>Là nhãn hàng nổi tiếng trong việc truyền cả</strong>m hứng cho mọi cô gái trên thế giới, đặc biệt là ở Vương Quốc Anh, nay thương hiệu HAIRBURST đã chính thức có mặt tại Việt Nam để tiếp nối hành trình đó, mang đến phương pháp chăm sóc tóc đúng cách cho phái đẹp Việt với bộ sản phẩm HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair được chiết xuất từ các thành phần tự nhiên. Bộ sản phẩm gội - xả HAIRBURST sẽ kích thích tóc bạn mọc nhanh nhất trong thời gian ngắn nhất, đồng thời cung cấp đủ dưỡng chất để tóc mọc khỏe nhất, ngăn ngừa các bệnh về tóc như nấm ngứa, gàu hay gãy rụng.</p><p>Bộ gội xả HAIRBURST chứa đến 95% thành phần tự nhiên, trong đó nổi bật với tinh dầu Dừa giúp dưỡng ẩm sâu, tăng cường thêm độ bóng mượt và mềm mại cho mái tóc, ngăn ngừa hiện tượng tóc gãy rụng và chẻ ngọn, góp phần làm dài tóc. Không chỉ vậy, tinh dầu Dừa còn thúc đẩy sức khỏe của da đầu, giúp chống lại các vấn đề như gàu ngứa.</p><p>Ngoài ra, trong bộ gội xả HAIRBURST còn chứa các axit amin giúp bổ sung độ ẩm cho mái tóc và Panthenol giúp giữ nước trên thân tóc, làm tóc trông dày và bồng bềnh hơn, không chỉ cải thiện vẻ ngoài của tóc mà còn tạo cảm giác tóc chắc khỏe hơn khi chạm vào.</p><p>Công thức sản phẩm được thiết kế đặc biệt để mang lại hiệu quả tối ưu trong khi gội, giúp cho mái tóc \"đẹp như mơ\" của bạn dễ dàng trở thành hiện thực hơn bao giờ hết. Bộ Gội Xả HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair là giải pháp tối ưu và an toàn để chăm sóc mái tóc hằng ngày, giúp thúc đẩy sự phát triển khỏe mạnh của tóc sau mỗi lần sử dụng.</p><p>Bên cạnh đó, sản phẩm có mùi hương tinh tế, thơm ngon của tinh dầu Dừa &amp; Bơ dễ dàng \"gây nghiện\" với bất kì cô nàng nào yêu thích sự ngọt ngào. Mùi hương quyến rũ này sẽ ngay lập tức làm tăng cường tâm trạng, giúp chuẩn bị sẵn sàng để bạn bắt đầu một ngày mới thật \"năng suất\", cũng như giúp thư giãn tinh thần sau một ngày dài mệt mỏi.</p><p>Hiện Bộ Dầu Gội &amp; Dầu Xả Hỗ Trợ Mọc Tóc HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair đã có mặt tại Hasaki.</p>', 300000.00, 0.00, 0, 'không', 'uploals/Cq5zS68I72tKJwAAJ4Cw8RDMHLWHp4nM2kHS3M0U.jpg', 'uploals/FzCRn3W3cbCuKySjp8hWPe8b78ecIso6drYwrrD4.jpg', NULL, NULL, 100, '2021-09-16 14:11:19', '2021-09-16 15:50:02'),
(69, 'Nước Hoa Nam TOMMY Cologne EDT 30ml Cologne Spray', 1, 1, 7, 55, '<p><strong>Là nhãn hàng nổi tiếng trong việc truyền cả</strong>m hứng cho mọi cô gái trên thế giới, đặc biệt là ở Vương Quốc Anh, nay thương hiệu HAIRBURST đã chính thức có mặt tại Việt Nam để tiếp nối hành trình đó, mang đến phương pháp chăm sóc tóc đúng cách cho phái đẹp Việt với bộ sản phẩm HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair được chiết xuất từ các thành phần tự nhiên. Bộ sản phẩm gội - xả HAIRBURST sẽ kích thích tóc bạn mọc nhanh nhất trong thời gian ngắn nhất, đồng thời cung cấp đủ dưỡng chất để tóc mọc khỏe nhất, ngăn ngừa các bệnh về tóc như nấm ngứa, gàu hay gãy rụng.</p><p>Bộ gội xả HAIRBURST chứa đến 95% thành phần tự nhiên, trong đó nổi bật với tinh dầu Dừa giúp dưỡng ẩm sâu, tăng cường thêm độ bóng mượt và mềm mại cho mái tóc, ngăn ngừa hiện tượng tóc gãy rụng và chẻ ngọn, góp phần làm dài tóc. Không chỉ vậy, tinh dầu Dừa còn thúc đẩy sức khỏe của da đầu, giúp chống lại các vấn đề như gàu ngứa.</p><p>Ngoài ra, trong bộ gội xả HAIRBURST còn chứa các axit amin giúp bổ sung độ ẩm cho mái tóc và Panthenol giúp giữ nước trên thân tóc, làm tóc trông dày và bồng bềnh hơn, không chỉ cải thiện vẻ ngoài của tóc mà còn tạo cảm giác tóc chắc khỏe hơn khi chạm vào.</p><p>Công thức sản phẩm được thiết kế đặc biệt để mang lại hiệu quả tối ưu trong khi gội, giúp cho mái tóc \"đẹp như mơ\" của bạn dễ dàng trở thành hiện thực hơn bao giờ hết. Bộ Gội Xả HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair là giải pháp tối ưu và an toàn để chăm sóc mái tóc hằng ngày, giúp thúc đẩy sự phát triển khỏe mạnh của tóc sau mỗi lần sử dụng.</p><p>Bên cạnh đó, sản phẩm có mùi hương tinh tế, thơm ngon của tinh dầu Dừa &amp; Bơ dễ dàng \"gây nghiện\" với bất kì cô nàng nào yêu thích sự ngọt ngào. Mùi hương quyến rũ này sẽ ngay lập tức làm tăng cường tâm trạng, giúp chuẩn bị sẵn sàng để bạn bắt đầu một ngày mới thật \"năng suất\", cũng như giúp thư giãn tinh thần sau một ngày dài mệt mỏi.</p><p>Hiện Bộ Dầu Gội &amp; Dầu Xả Hỗ Trợ Mọc Tóc HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair đã có mặt tại Hasaki.</p>', 500000.00, 0.00, 0, 'không', 'uploals/75EOctX2ZbxNU3mKAcH07Lfb6F7Pyj0I7ZIGDWMn.jpg', 'uploals/shXg2e11pP9HR8j1rgRKusEWSRlq7dtLHNrCuTkN.jpg', NULL, NULL, 100, '2021-09-16 14:13:47', '2021-09-16 15:50:20'),
(70, 'Bộ Dầu Gội & Dầu Xả HAIRBURST Hỗ Trợ Mọc Tóc 350ml X 2 Món Avocado & Coconut For Longer Stronger Hair', 1, 1, 7, 55, '<p>Là nhãn hàng nổi tiếng trong việc truyền cảm hứng cho mọi cô gái trên thế giới, đặc biệt là ở Vương Quốc Anh, nay thương hiệu HAIRBURST đã chính thức có mặt tại Việt Nam để tiếp nối hành trình đó, mang đến phương pháp chăm sóc tóc đúng cách cho phái đẹp Việt với bộ sản phẩm HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair được chiết xuất từ các thành phần tự nhiên. Bộ sản phẩm gội - xả HAIRBURST sẽ kích thích tóc bạn mọc nhanh nhất trong thời gian ngắn nhất, đồng thời cung cấp đủ dưỡng chất để tóc mọc khỏe nhất, ngăn ngừa các bệnh về tóc như nấm ngứa, gàu hay gãy rụng.</p><p>Bộ gội xả HAIRBURST chứa đến 95% thành phần tự nhiên, trong đó nổi bật với tinh dầu Dừa giúp dưỡng ẩm sâu, tăng cường thêm độ bóng mượt và mềm mại cho mái tóc, ngăn ngừa hiện tượng tóc gãy rụng và chẻ ngọn, góp phần làm dài tóc. Không chỉ vậy, tinh dầu Dừa còn thúc đẩy sức khỏe của da đầu, giúp chống lại các vấn đề như gàu ngứa.</p><p>Ngoài ra, trong bộ gội xả HAIRBURST còn chứa các axit amin giúp bổ sung độ ẩm cho mái tóc và Panthenol giúp giữ nước trên thân tóc, làm tóc trông dày và bồng bềnh hơn, không chỉ cải thiện vẻ ngoài của tóc mà còn tạo cảm giác tóc chắc khỏe hơn khi chạm vào.</p><p>Công thức sản phẩm được thiết kế đặc biệt để mang lại hiệu quả tối ưu trong khi gội, giúp cho mái tóc \"đẹp như mơ\" của bạn dễ dàng trở thành hiện thực hơn bao giờ hết. Bộ Gội Xả HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair là giải pháp tối ưu và an toàn để chăm sóc mái tóc hằng ngày, giúp thúc đẩy sự phát triển khỏe mạnh của tóc sau mỗi lần sử dụng.</p><p>Bên cạnh đó, sản phẩm có mùi hương tinh tế, thơm ngon của tinh dầu Dừa &amp; Bơ dễ dàng \"gây nghiện\" với bất kì cô nàng nào yêu thích sự ngọt ngào. Mùi hương quyến rũ này sẽ ngay lập tức làm tăng cường tâm trạng, giúp chuẩn bị sẵn sàng để bạn bắt đầu một ngày mới thật \"năng suất\", cũng như giúp thư giãn tinh thần sau một ngày dài mệt mỏi.</p><p>Hiện Bộ Dầu Gội &amp; Dầu Xả Hỗ Trợ Mọc Tóc HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair đã có mặt tại Hasaki.</p>', 120000.00, 100000.00, 0, 'không', 'uploals/pQ5NcQdrHwSfgUvv6xg0WnNjMxkv0zTh5uxc7ZK2.jpg', 'uploals/NviKhfF0wMIiOl0NsQ9NnPKqAIsOOXS49Jni9b1m.jpg', NULL, NULL, 100, '2021-09-16 14:16:07', '2021-09-16 15:44:42'),
(71, 'L\'OREAL Dầu Gội Cho Tóc Rụng L\'Oréal Paris 650ml', 1, 1, 7, 55, '<p><strong>Là nhãn hàng nổi tiếng trong việc truyền cả</strong>m hứng cho mọi cô gái trên thế giới, đặc biệt là ở Vương Quốc Anh, nay thương hiệu HAIRBURST đã chính thức có mặt tại Việt Nam để tiếp nối hành trình đó, mang đến phương pháp chăm sóc tóc đúng cách cho phái đẹp Việt với bộ sản phẩm HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair được chiết xuất từ các thành phần tự nhiên. Bộ sản phẩm gội - xả HAIRBURST sẽ kích thích tóc bạn mọc nhanh nhất trong thời gian ngắn nhất, đồng thời cung cấp đủ dưỡng chất để tóc mọc khỏe nhất, ngăn ngừa các bệnh về tóc như nấm ngứa, gàu hay gãy rụng.</p><p>Bộ gội xả HAIRBURST chứa đến 95% thành phần tự nhiên, trong đó nổi bật với tinh dầu Dừa giúp dưỡng ẩm sâu, tăng cường thêm độ bóng mượt và mềm mại cho mái tóc, ngăn ngừa hiện tượng tóc gãy rụng và chẻ ngọn, góp phần làm dài tóc. Không chỉ vậy, tinh dầu Dừa còn thúc đẩy sức khỏe của da đầu, giúp chống lại các vấn đề như gàu ngứa.</p><p>Ngoài ra, trong bộ gội xả HAIRBURST còn chứa các axit amin giúp bổ sung độ ẩm cho mái tóc và Panthenol giúp giữ nước trên thân tóc, làm tóc trông dày và bồng bềnh hơn, không chỉ cải thiện vẻ ngoài của tóc mà còn tạo cảm giác tóc chắc khỏe hơn khi chạm vào.</p><p>Công thức sản phẩm được thiết kế đặc biệt để mang lại hiệu quả tối ưu trong khi gội, giúp cho mái tóc \"đẹp như mơ\" của bạn dễ dàng trở thành hiện thực hơn bao giờ hết. Bộ Gội Xả HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair là giải pháp tối ưu và an toàn để chăm sóc mái tóc hằng ngày, giúp thúc đẩy sự phát triển khỏe mạnh của tóc sau mỗi lần sử dụng.</p><p>Bên cạnh đó, sản phẩm có mùi hương tinh tế, thơm ngon của tinh dầu Dừa &amp; Bơ dễ dàng \"gây nghiện\" với bất kì cô nàng nào yêu thích sự ngọt ngào. Mùi hương quyến rũ này sẽ ngay lập tức làm tăng cường tâm trạng, giúp chuẩn bị sẵn sàng để bạn bắt đầu một ngày mới thật \"năng suất\", cũng như giúp thư giãn tinh thần sau một ngày dài mệt mỏi.</p><p>Hiện Bộ Dầu Gội &amp; Dầu Xả Hỗ Trợ Mọc Tóc HAIRBURST Avocado &amp; Coconut For Longer Stronger Hair đã có mặt tại Hasaki.</p>', 120000.00, 0.00, 0, 'không', 'uploals/I4FYWlzJZFs2igmNNhPkhnHUTJLAFO6NqXrA7l9j.jpg', 'uploals/umKyxUknmhvaQLyHb82YYjsbbz1Gd2ZXIyf9Kswx.jpg', NULL, NULL, 100, '2021-09-16 14:18:35', '2021-09-16 15:49:33'),
(72, 'kem chống nắng', 1, 1, 7, NULL, '<p>tesd</p>', 44000.00, 55000.00, 0, 'không', 'productsp1.png', '\'\\\'productsp1.png\\\'\'', NULL, NULL, 100, '2021-10-09 10:14:23', '2021-10-09 10:14:23'),
(73, 'kem chống nắng', 1, 1, 7, NULL, '<p><strong>Nước Dưỡng Tóc Cocoon Tinh Dầu Bưởi&nbsp;Pomelo Hair Tonic 140ml</strong>&nbsp;là dòng <a href=\"https://hasaki.vn/danh-muc/cham-soc-toc-c96.html\"><strong>chăm sóc tóc</strong></a> đến từ <a href=\"https://hasaki.vn/thuong-hieu/cocoon.html\"><strong>thương hiệu mỹ phẩm Cocoon</strong></a> của Việt Nam, sẽ là giải pháp giúp bạn xóa tan đi nỗi lo rụng tóc với tinh dầu vỏ bưởi tự nhiên có đặc tính chống oxy hóa và làm sạch, kết hợp hoạt chất <strong>Xylishine</strong> và <strong>vitamin B5</strong> cung cấp dưỡng chất tuyệt vời cho da đầu, thúc đẩy sự phát triển tóc chắc khỏe. Hiện sản phẩm <strong>Nước Dưỡng Tóc Cocoon Tinh Dầu Bưởi&nbsp;Pomelo Hair Tonic 140ml</strong>&nbsp;đã có mặt tại <strong>Hasaki </strong>với 2 phiên bản:&nbsp;</p>', 44000.00, 55000.00, 0, 'không', 'uploals/DcYXav8HDjuFfgkMyLPjhv6hrjepwR4bxBLTpUOC.jpg', 'uploals/YM34x5PCipy4lSgpUrrShKmAVNMi1V6IvjDzATte.jpg', NULL, NULL, 100, '2021-10-09 10:15:14', '2021-10-09 15:24:35'),
(74, 'kem chống nắng', 1, 38, 7, NULL, '<p>t</p>', 44000.00, 55000.00, 0, 'không', 'uploals/BiB5hPPXImYJ5XCrF7O6RNt5rwePbMUkHW4fwjXl.jpg', '\'\\\'productsp1.png\\\'\'', NULL, NULL, 100, '2021-10-09 15:29:58', '2021-10-09 15:29:58'),
(75, 'test', 1, 1, 7, NULL, '<p>test</p>', 60000.00, 0.00, 0, 'không', 'productsp1.png', 'uploals/de89030ea3005ac49dabd00a6183073d4f0691cfe48c8f74fe413c7b92391ff4.jpg,uploals/de89030ea3005ac49dabd00a6183073d81c56fd5c65f14817d4914343f165cb8.jpg,uploals/de89030ea3005ac49dabd00a6183073d09d93386e2901ff2f144e71da25cbd0f.jpg,uploals/de89030ea3005ac49dabd00a6183073d7efd0d7ac7211d83a0f0f8c49a939ca9.jpg,uploals/de89030ea3005ac49dabd00a6183073d3aaf730cddcdeece91f8256b8e94af7d.jpg,uploals/de89030ea3005ac49dabd00a6183073d24f29421b2253e0e5b5f13c887c1ff00.jpg,uploals/de89030ea3005ac49dabd00a6183073d60726c8a2b321f51629de393a229617b.jpg,uploals/de89030ea3005ac49dabd00a6183073d7c11008622bf9800a93ac3404c7c0a20.jpg,uploals/de89030ea3005ac49dabd00a6183073d62671ccbc82f89341d2b85566716d45f.jpg,uploals/de89030ea3005ac49dabd00a6183073da25be169bcf0ac6469233d414826b965.jpg,uploals/de89030ea3005ac49dabd00a6183073d0d56db8c53a505bcf8425b3f97dd7e0b.jpg,uploals/de89030ea3005ac49dabd00a6183073d0675d474dfa2f8f6babb5484fb2d40fd.jpg,uploals/de89030ea3005ac49dabd00a6183073df0be63975b217608588842f78a5271ca.jpg,uploals/de89030ea3005ac49dabd00a6183073d6d86e49e472971b848004c10e12c77cc.jpg,uploals/de89030ea3005ac49dabd00a6183073d9fd3e3b44be85833bd150d4877003bb3.jpg,uploals/de89030ea3005ac49dabd00a6183073d18e0a1be7f6782eb5ed30dd99c4c86eb.jpg,uploals/de89030ea3005ac49dabd00a6183073dab583f34b589f20b14aed06f33fc3791.jpg', NULL, NULL, 100, '2021-10-09 15:43:22', '2021-10-09 17:15:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `prom_price` float NOT NULL,
  `prom_percent` int(11) DEFAULT NULL,
  `prom_name` varchar(200) NOT NULL,
  `prom_startdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `prom_enddate` timestamp NOT NULL DEFAULT current_timestamp(),
  `code` varchar(20) NOT NULL,
  `prom_content` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`id`, `id_product`, `prom_price`, `prom_percent`, `prom_name`, `prom_startdate`, `prom_enddate`, `code`, `prom_content`, `created_at`, `updated_at`) VALUES
(1, 71, 5000, NULL, 'KM 1', '2021-10-03 05:52:51', '2021-10-03 05:52:51', 'KM1', 'test', '2021-10-03 12:52:51', '2021-10-03 08:11:20'),
(2, 71, 0, NULL, 'chương trình 2 ', '2021-10-03 05:52:51', '2021-10-03 05:52:51', 'KM2', NULL, '2021-10-03 12:52:51', '2021-10-03 08:11:20'),
(3, 71, 5000, NULL, 'chương trình 3', '2021-10-03 05:53:51', '2021-10-03 05:53:51', 'KM3', NULL, '2021-10-03 12:53:51', '2021-10-03 08:11:20'),
(4, 0, 0, NULL, '', '2021-10-03 08:14:51', '2021-10-03 08:14:51', 'code', '<p>tesst</p>', '2021-10-03 15:14:51', '2021-10-03 08:14:51'),
(5, 0, 2, NULL, 'tesst posst', '2021-10-03 08:18:26', '2021-10-03 08:19:35', 'code1', NULL, '2021-10-03 15:18:26', '2021-10-03 08:19:35'),
(6, 0, 5000, NULL, 'tesst posst 1', '2021-10-03 09:26:29', '2021-10-03 09:26:29', 'code2', '<p>ádad</p>', '2021-10-03 16:26:29', '2021-10-03 09:26:29'),
(7, 0, 5000, NULL, 'test sp', '2021-10-04 14:02:34', '2021-10-04 14:02:34', 'TESTSP', NULL, '2021-10-04 21:02:34', '2021-10-04 14:02:34'),
(8, 0, 5000, NULL, 'a', '2021-10-04 14:28:32', '2021-10-04 14:28:32', 'code21', NULL, '2021-10-04 21:28:32', '2021-10-04 14:28:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'banner1.jpg', NULL, NULL),
(2, 'banner2.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theme`
--

CREATE TABLE `theme` (
  `id_theme` int(10) UNSIGNED NOT NULL,
  `p_theme` int(11) DEFAULT 1,
  `theme_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'Chưa có description',
  `theme_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'image1.jpg',
  `theme_content` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_status` int(11) DEFAULT 0,
  `theme_alias` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'chua-co-alias',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theme`
--

INSERT INTO `theme` (`id_theme`, `p_theme`, `theme_name`, `theme_description`, `theme_image`, `theme_content`, `theme_status`, `theme_alias`, `created_at`, `updated_at`) VALUES
(1, 0, 'Da nhậy cảm', 'Chưa có description', 'image1.jpg', '', 0, 'chua-co-alias', '2021-09-07 16:32:05', '2021-09-07 16:32:05'),
(2, 1, 'Bàn về tin chất chống nắng', 'Chưa có description', 'image1.jpg', '', 0, 'chua-co-alias', '2021-09-07 16:32:05', '2021-09-07 16:32:05'),
(3, 2, 'Vấn đề về da dầu', 'Chưa có description', 'image1.jpg', NULL, 0, 'chua-co-alias', '2021-09-13 13:27:54', '2021-09-13 13:27:54'),
(4, 2, 'Vấn đề về da nhay cảm', 'Chưa có description', 'image1.jpg', NULL, 0, 'chua-co-alias', '2021-09-13 13:27:54', '2021-09-13 13:27:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'images1.jpg',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `p_type_product` int(11) DEFAULT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `images`, `created_at`, `updated_at`, `p_type_product`, `alias`, `status`) VALUES
(1, 'Chăm sóc cơ thể', '0', 'image1.jpg', '2021-09-14 17:00:07', '2021-09-14 17:00:07', 0, 'cham-soc-co-the', NULL),
(2, 'Danh mục cha', '', 'image1.jpg', NULL, NULL, 0, '', 1),
(3, 'Nước hoa', '', 'image1.jpg', NULL, NULL, 0, '', 0),
(4, 'Trang điểm', '', 'image1.jpg', NULL, NULL, 0, '', 0),
(5, 'kem nền', '0', 'image1.jpg', '2021-09-05 13:20:39', '2021-09-05 13:20:39', 4, 'kem-nen', NULL),
(7, 'Chăm sóc da mặt', '0', 'image1.jpg', '2021-09-05 13:22:26', '2021-09-05 13:22:26', 0, 'cham-soc-da-mat', NULL),
(9, 'Chăm sóc tóc', '0', 'image1.jpg', '2021-09-05 13:24:31', '2021-09-05 13:24:31', 0, 'cham-soc-toc', NULL),
(10, 'Kem chống nắng', '0', 'image1.jpg', '2021-09-05 06:46:45', '2021-09-05 06:46:45', 9, NULL, 0),
(11, 'kem chống nắng', '0', 'image1.jpg', '2021-09-05 06:52:47', '2021-09-05 06:52:47', 1, NULL, 1),
(14, 'Rụng tóc', '0', 'image1.jpg', '2021-09-05 13:26:35', '2021-09-05 13:26:35', 9, 'run-toc', 0),
(15, 'Ngăn rụn tóc', '0', 'image1.jpg', '2021-09-05 13:28:08', '2021-09-05 13:28:08', 9, 'ngan-run-toc', 0),
(16, 'Chăm sóc tóc nhuộm', '0', 'image1.jpg', '2021-09-05 13:29:40', '2021-09-05 13:29:40', 9, 'cham-soc-toc-nhuom', 0),
(18, 'Kem lót', '0', 'image1.jpg', '2021-09-05 13:32:48', '2021-09-05 13:32:48', 4, 'kem-lot', 0),
(19, 'Phấn phủ', '0', 'image1.jpg', '2021-09-05 13:33:22', '2021-09-05 13:33:22', 4, 'phan-phu', 0),
(20, 'Che khuyết điểm', '0', 'image1.jpg', '2021-09-05 13:33:51', '2021-09-05 13:33:51', 4, 'che-khuyet-diem', 0),
(21, 'Tạo khối', '0', 'image1.jpg', '2021-09-05 13:36:41', '2021-09-05 13:36:41', 4, NULL, NULL),
(22, 'Phấn má hồng', '0', 'image1.jpg', '2021-09-05 13:35:56', '2021-09-05 13:35:56', 4, NULL, 0),
(23, 'Son dưỡng', '0', 'image1.jpg', '2021-09-05 13:36:11', '2021-09-05 13:36:11', 4, NULL, 0),
(24, 'Son lì', '0', 'image1.jpg', '2021-09-05 13:36:28', '2021-09-05 13:36:28', 4, NULL, 0),
(25, 'Tẩy trang', '0', 'image1.jpg', '2021-09-05 13:37:21', '2021-09-05 13:37:21', 7, NULL, 0),
(26, 'Sữa rửa mặt', '0', 'image1.jpg', '2021-09-05 13:37:42', '2021-09-05 13:37:42', 7, NULL, 0),
(27, 'Tonner', '0', 'image1.jpg', '2021-09-05 13:37:57', '2021-09-05 13:37:57', 7, NULL, 0),
(28, 'Tẩy tế bào chết', '0', 'image1.jpg', '2021-09-05 13:38:17', '2021-09-05 13:38:17', 7, NULL, 0),
(29, 'Xịt khoáng', '0', 'image1.jpg', '2021-09-05 13:38:30', '2021-09-05 13:38:30', 7, NULL, 0),
(30, 'Mặt nạ', '0', 'image1.jpg', '2021-09-05 13:38:44', '2021-09-05 13:38:44', 7, NULL, 0),
(31, 'Mụn', '0', 'image1.jpg', '2021-09-05 13:39:19', '2021-09-05 13:39:19', 7, NULL, 0),
(32, 'Da nhậy cảm', '0', 'image1.jpg', '2021-09-05 13:39:32', '2021-09-05 13:39:32', 7, NULL, 0),
(33, 'Da kích ứng', '0', 'image1.jpg', '2021-09-05 13:39:44', '2021-09-05 13:39:44', 7, NULL, 0),
(34, 'Da dầu', '0', 'image1.jpg', '2021-09-05 13:39:58', '2021-09-05 13:39:58', 7, NULL, 0),
(35, 'Da mụn', '0', 'image1.jpg', '2021-09-05 13:40:13', '2021-09-05 13:40:13', 7, NULL, 0),
(36, 'Da khô', '0', 'image1.jpg', '2021-09-05 13:40:25', '2021-09-05 13:40:25', 7, NULL, 0),
(37, 'Sữa tắm', '0', 'image1.jpg', '2021-09-05 13:41:00', '2021-09-05 13:41:00', 1, NULL, 0),
(38, 'Tẩy tế bào chết da mặt', '0', 'image1.jpg', '2021-09-05 13:41:20', '2021-09-05 13:41:20', 1, NULL, 0),
(39, 'Tẩy tế bào chết toàn thân', '0', 'image1.jpg', '2021-09-05 13:41:44', '2021-09-05 13:41:44', 1, NULL, 0),
(40, 'Dưỡng trắng toàn thân', '0', 'image1.jpg', '2021-09-05 13:42:03', '2021-09-05 13:42:03', 1, NULL, 0),
(41, 'Chống nắng toàn thân', '0', 'image1.jpg', '2021-09-05 13:42:28', '2021-09-05 13:42:28', 1, NULL, 0),
(42, 'Khử mùi cho nam', '0', 'image1.jpg', '2021-09-05 13:42:52', '2021-09-05 13:42:52', 1, NULL, 0),
(43, 'Khử mùi cho nữ', '0', 'image1.jpg', '2021-09-05 13:43:14', '2021-09-05 13:43:14', 1, NULL, 0),
(44, 'test', '0', 'image1.jpg', '2021-09-05 15:36:00', '2021-09-05 15:36:00', 19, NULL, 1),
(47, 'Chăm sóc da', '0', 'C:\\xampp\\tmp\\php9D78.tmp', '2021-09-18 11:25:19', '2021-09-18 11:25:19', 0, 'cham-soc-da', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(255) NOT NULL DEFAULT 2,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role`, `full_name`, `email`, `password`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 'abc', 'aa@gmail.com', '$2y$10$EKu8qKSeR8fJ81/lZS1sgeysx0quXRj0y2TewNgtm0Pv5WKFms8AS', '0962854247', '100a Nguyễn Tất Thành', '2021-01-26 11:42:17', '2021-01-26 11:42:17'),
(3, 2, 'Hoàn', 'abc@gmail.com', '$2y$10$caF/DF7hqXXq7AlxsVVLmuSsu24CMo5Ej/4YOaT4nUkjioIPGFr3C', '0989471', '100a Nguyễn Tất Thành', '2021-01-28 06:43:02', '2021-01-28 06:43:02'),
(4, 3, 'Nguyễn Thị 2', '2@gmail.com', '$2y$10$Rgk.Au6X1sJkYyjZgFRDhe2GIGP2EoYo.RKjkhTNXgP5tV8wHurOq', '0989471', '100a Nguyễn Tất Thành', '2021-01-28 06:51:58', '2021-01-28 06:51:58'),
(5, 1, 'Hoan_ab', 'dthoan1002@gmail.com', '$2y$10$2sfBuR9veeAToJP0CR0oQOP4PwOydHfy5d/eSWlmVSczaYmPjRkqO', '0962854247', 'An Phú Đông Quận 12', '2021-08-07 08:01:29', '2021-08-07 08:01:29'),
(6, 2, 'a111', 'abc1@gmail.com', '$2y$10$WN.6O6gfjdkCx/C/xmMFR.NLf/Ky8FLwmudBGv/JXLq2ErRrYkIM2', '0321548752', 'Q12', '2021-09-15 17:55:00', '2021-09-15 17:55:00'),
(7, 2, 'Hân', 'han@gmail.com', '$2y$10$vShbbgGoA8sL6VoOYrVxL.HDZB.LRpFONdoBZLdYRQUrOhwmSlqZy', '0321548752', 'Q12', '2021-09-16 14:08:30', '2021-09-16 14:08:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_id_customer_foreign` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_id_bill_foreign` (`id_bill`),
  ADD KEY `bill_detail_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id_blog`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id_theme`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id_blog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `theme`
--
ALTER TABLE `theme`
  MODIFY `id_theme` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_id_bill_foreign` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bill_detail_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
