-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2020 at 11:03 AM
-- Server version: 8.0.22
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Tên danh mục',
  `type` tinyint DEFAULT '0' COMMENT 'Loại danh mục: 0 - Product, 1 - News',
  `avatar` varchar(100) DEFAULT NULL COMMENT 'Tên file ảnh danh mục',
  `description` text COMMENT 'Mô tả chi tiết cho danh mục',
  `status` tinyint DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo danh mục',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'adidas', 0, '', '', 1, '2020-11-17 12:20:20', NULL),
(2, 'domba', 0, NULL, NULL, 1, '2020-11-19 04:46:02', NULL),
(3, 'reebok', 0, NULL, NULL, 1, '2020-11-19 09:54:52', NULL),
(4, 'news', 1, NULL, NULL, 1, '2020-11-19 10:45:35', NULL),
(5, 'home', 2, NULL, NULL, 1, '2020-12-20 09:44:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `type` tinyint NOT NULL COMMENT '0-slider 1-banner',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Tên file ảnh',
  `status` tinyint DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `category_id`, `type`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'index_banner_medium_1.jpg', 0, '2020-12-20 09:55:36', NULL),
(2, 5, 1, 'index_banner_medium_2.jpg', 0, '2020-12-20 09:55:36', NULL),
(3, 5, 0, 'sb_1.jpg', 0, '2020-12-20 09:55:36', NULL),
(4, 5, 0, 'sb_2.jpg', 0, '2020-12-20 09:55:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL COMMENT 'Id của danh mục mà tin tức thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(100) NOT NULL COMMENT 'Tiêu đề tin tức',
  `summary` varchar(200) DEFAULT NULL COMMENT 'Mô tả ngắn cho tin tức',
  `avatar` varchar(100) DEFAULT NULL COMMENT 'Tên file ảnh tin tức',
  `content` text COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `seo_title` varchar(100) DEFAULT NULL COMMENT 'Từ khóa seo cho title',
  `seo_description` varchar(100) DEFAULT NULL COMMENT 'Từ khóa seo cho phần mô tả',
  `seo_keywords` varchar(100) DEFAULT NULL COMMENT 'Các từ khóa seo',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `summary`, `avatar`, `content`, `status`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(1, 4, 'Bí quyết chọn giày đúng chuẩn size chân', 'Nếu lựa chọn cho mình những đôi giày nhỏ hơn hoặc lớn hơn kích thước bàn chân đều có thể gây tổn thương đến đôi chân và cột sống của bạn. Giữ nguyên tình trạng này trong ......', '921523-002.jpg', NULL, 1, NULL, NULL, NULL, '2020-11-19 10:42:49', NULL),
(2, 4, '5 Bước Giặt Giày Sneaker Và 4 Cách Bảo Quản Chuẩn Mực', 'Sở hữu những đôi giày Sneaker chất lượng là điều vô cùng tuyệt vời đối rất nhiều người mê giày. Tuy nhiên bạn còn phải biết cách giặt giày Sneaker như thế nào, sử dụng đ......', 'ultraboost-4-0.jpg', NULL, 1, NULL, NULL, NULL, '2020-11-19 10:44:33', NULL),
(3, 4, 'Bảo quản và vệ sinh giày adidas đúng chuẩn', 'Giày adidas được các bạn trẻ yêu thích vì kiểu dáng thời trang cùng với chất lượng tuyệt vời. Tuy nhiên, dù có xịn đến đâu nếu không biết cách bảo quản và vệ sinh giày adi......', 'adidas-solar-ride-home-1920x704.jpg', NULL, 1, NULL, NULL, NULL, '2020-11-19 10:44:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL COMMENT 'Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users',
  `fullname` varchar(100) DEFAULT NULL COMMENT 'Tên khách hàng',
  `address` varchar(100) DEFAULT NULL COMMENT 'Địa chỉ khách hàng',
  `mobile` int DEFAULT NULL COMMENT 'SĐT khách hàng',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email khách hàng',
  `note` text COMMENT 'Ghi chú từ khách hàng',
  `price_total` int DEFAULT NULL COMMENT 'Tổng giá trị đơn hàng',
  `payment_status` tinyint DEFAULT NULL COMMENT 'Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo đơn',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int DEFAULT NULL COMMENT 'Id của order tương ứng, là khóa ngoại liên kết với bảng orders',
  `product_id` int DEFAULT NULL COMMENT 'Id của product tương ứng, là khóa ngoại liên kết với bảng products',
  `price` int DEFAULT NULL COMMENT 'Giá sản phẩm đã đặt',
  `quantity` int DEFAULT NULL COMMENT 'Số sản phẩm đã đặt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL COMMENT 'Id của danh mục mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(100) DEFAULT NULL COMMENT 'Tên sản phẩm',
  `avatar` varchar(100) DEFAULT NULL COMMENT 'Tên file ảnh sản phẩm',
  `current_price` int DEFAULT NULL COMMENT 'Giá sản phẩm hiện tại',
  `original_price` int DEFAULT '0' COMMENT 'Giá sản phẩm ban đầu',
  `amount` int DEFAULT NULL COMMENT 'Số lượng sản phẩm trong kho',
  `new` tinyint DEFAULT '1' COMMENT 'Sản phẩm: 1-new 0-old',
  `content` text COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `seo_title` varchar(100) DEFAULT NULL COMMENT 'Từ khóa seo cho title',
  `seo_description` varchar(100) DEFAULT NULL COMMENT 'Từ khóa seo cho phần mô tả',
  `seo_keywords` varchar(100) DEFAULT NULL COMMENT 'Các từ khóa seo',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `avatar`, `current_price`, `original_price`, `amount`, `new`, `content`, `status`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'SUPERSTAR J', 'c77154_0384cfd9a47449ed8adf336e13c50a46_large.jpg', 990000, 2100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(2, 1, 'YUNG 96', 'y96_1b6e921832ee44b1865c4df2493020fe_large.jpg', 1290000, 2400000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(3, 1, 'NMD R2', '9861aa61c9472a197356_914e62d6b9b349b3913608dc85ad2c9d_large.jpg', 1490000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(4, 1, 'SUPERSTAR J GOLD LABEL', '1969486_l_1ae1dd6ac2dc4c18a2b0c80b80a94708_large.jpg', 890000, 1490000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(5, 1, 'YUNG 96 CHASM', 'fbbd49c6fb24027a5b35_b608bcdc77544a199e84d3e74d4be494_large.jpg', 1290000, 2500000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(6, 1, 'ADILETTE COMFORT SLIDES', 'e65425cf4887afd9f696_272ec4df4f1b435da5d8e87368817960_large.jpg', 590000, 1200000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(7, 1, 'ALPHABOUNCE BEYOND', 'db1126_42c716fd1a1946cfb6c7f22c06286421_large.jpg', 1490000, 2350000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(8, 1, 'ADIDAS ADILETTE SANDAL 2.0', 'ac8583-01_80a7f09bf8ae4fd8b270d53e99d0cf6a_large.jpg', 1090000, 2190000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(9, 1, 'SWIFT RUN', 'sw_8195615632244faf88e41ad031e7d8e8_large.jpg', 1290000, 2100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(10, 1, 'SUPER STAR OG', 'c77124_b998e8794974467b84cbc3760e95b359_large.jpg', 1190000, 2200000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(11, 1, 'NMD R2', '0a83fe7933bacfe496ab_193dac81627948b387f484b852f0df0a_large.jpg', 1490000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(12, 1, 'STAN SMITH', 'm20324_13760a5486394243acbf41520a1cd3fc_large.jpg', 1190000, 2100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(13, 1, 'NMD R2', 'by9316-01-standard_90171fb4096445d9a552bbcb99844a58_large.jpg', 1590000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(14, 1, 'ADIDAS CONTINENTAL 80', 'e9dcece2a35a5a04034b_d4507229ed584adc82489e1d273512e2_large.jpg', 1390000, 2500000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(15, 1, 'YUNG 1', 'b37615_31e3a4007ced4d83a0bb5bab04e2b0e1_large.jpg', 1390000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(16, 1, 'NMD R2', 'by9914-2_93cdbb2ced75487a98b4d1542a632574_large.jpg', 1290000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(17, 1, 'ADIDAS ALPHABOUNCE EM', '6246_ee64308001114f5dbb83c460d01530ab_large.jpg', 1090000, 1990000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(18, 1, 'NMD R1 PRIMEKNIT GREY', '1954639_l_e42c61b8c7e44b5ab817692412d946a2_large.png', 1590000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(19, 1, 'ADIDAS CONTINENTAL 80', 'c91b32ce79768028d967_e8555daf95954dd6bbfe6ac1cbdbd31c_large.jpg', 1550000, 2500000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(20, 1, 'ADIDAS CONTINENTAL 80 OG', 'g27706_01_standard_79b668f9b396414db5448e89bf435be8_large.jpg', 1390000, 2500000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(21, 1, 'I-5923', '6eaa4f1104aae0f4b9bb_c56b2701ae5e4da0b3ed59bca424ef49_large.jpg', 1190000, 2400000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(22, 1, 'ALPHABOUNCE BEYOND', 'alphabounce-beyond-shoes-black-db1125-01-standard_ad8341e7b98a4169843b7aed28b4b005_large.jpg', 1590000, 2900000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(23, 1, 'ULTRABOOST 4.0 GREY', '8aaeecb23aded88081cf_f360bf3d0cfd4bae981ea258d0fa75af_large.jpg', 1890000, 4100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(24, 1, 'NMD R2', 'upload-838d5f72c3a64ce591e80457be2e14a3-grande_e145eb6472174f118aa5df66bd84e00e_large.jpg', 1590000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(25, 1, 'ADIDAS ADILETTE SANDAL 2.0 GREY', 'upload_2a4d6ed963dc428c94ab756ec881b84e_large.jpg', 990000, 2190000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(26, 1, 'ADIDAS CONTINENTAL 80 J', 'g27706_01_standard_e85c244a74eb4b909eed2bf18841b515_large.jpg', 1290000, 2200000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(27, 1, 'YUNG 96 CHASM', 'yung_96_chasm_shoes_black_ee7234_01_standard_cd886c95924840e99a2b3ce2d5da38cd_large.jpg', 1250000, 2300000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(28, 1, 'YUNG 96 CHASM', 'ee7238_4419aa9081a14ab2badf4d4cfdd3f3e8_large.jpg', 1190000, 2500000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(29, 1, 'YUNG 96', 'y96_c6f715216f7543db867f141df858b9e2_large.jpg', 1090000, 2300000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(30, 1, 'YUNG 1', '74881b4be0a107ff5eb0_d0ee4f7166eb4493a7ab51143771cb2f_large.jpg', 1090000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(31, 1, 'ULTRABOOST 2.0', 'a5141_47546593e3cd4159a2b2b04ba33d6408_large.jpg', 2190000, 3600000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(32, 1, 'NMD XR1', 'z-by9921-01_6f41f37342644dc3af488f7dd814509b_large.jpg', 1790000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(33, 1, 'NMD R2', 'nmd-p_4f621b025beb446386bb36525d7a997a_large.jpg', 1290000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(34, 1, 'NMD R2', 'nmd_75c8f4f74b7641839bbd1b24b8db3a3d_large.jpg', 1590000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(35, 1, 'NMD R1 PRIMEKNIT', '537bdceab5c0579e0ed1_4180a8c04e5d498e86842a0de9df1497_large.jpg', 1990000, 3500000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(36, 1, 'ALPHABOUNCE BEYOND', 'cg47622_b24027ee77224cf687a5b4706a5b4318_large.jpg', 1590000, 2900000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(37, 1, 'ADIDAS FALCON W CM8537', 'cm8537-01_1888f673e27e4507b21cd04dee1c9ede_large.png', 990000, 2100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(38, 1, 'ULTRABOOST 4.0 CORE BLACK U', 'upload_ab88e4b5402a4d279d3f2aa2bd6a1495_large.jpg', 2290000, 3800000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(39, 1, 'SUPERCOURT EF9181', 'supercourt-shoes-white-ef9181-01-standard_6c91434b9a0e4a2aba4c7a2fe3783a80_large.jpg', 1700000, 2100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(40, 1, 'ULTRABOOST 2.0 GOLD MEDAL', '9600ef642935d26b8b24_34b682c89c384379af0bc0a25cb035ad_large.jpg', 2900000, 3900000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(41, 1, 'NITE JOGGER', '174bdca58e1d77432e0c_9e00260fcd3943fc8ddb0e9ae8ff7042_large.jpg', 1750000, 2600000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(42, 1, 'NITE JOGGER', '01_3ab687bb979d4b3ca2655663660fab41_large.jpg', 1750000, 2600000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(43, 1, 'SUPERCOURT', 'supercourt_shoes_white_ee6034_01_standard_4b9cb0ce353e43da99c88b26cf801588_large.jpg', 1650000, 2100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(44, 1, 'SWIFT RUN CORE BLACK', 'ad4e645f51f8a8a6f1e9_6822e71103ff40dcab746b0674e7412f_large.jpg', 1600000, 2100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(45, 1, 'STAN SMITH NAVY', 'stan_smith_shoes_white_m20325_01_standard_d401046aff7a48d29ec5e6cdff199bae_large.jpg', 1650000, 2100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(46, 1, 'ADIDAS FALCON SILVER', 'a849b96083c77a9923d6_b5ce84ac98e2420b92554f7c350a90c8_large.jpg', 1700000, 2600000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(47, 1, 'STAN SMITH GOLD METALLIC', 'ee8836_0412873f348641218cfd48177b2d248b_large.jpg', 1380000, 2100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(48, 1, 'STAN SMITH HOME OF CLASSIC', 'ef2099_91b30d961c654168883d79576677d749_large.jpg', 1700000, 2500000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(49, 1, 'STAN SMITH VALENTINE', '7533d429a1f945a71ce8_7e3a491755024e8898419d13ed572e98_large.jpg', 1590000, 2500000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(50, 1, 'X-PLR J', 'b751f6cd0593e1cdb882_bcdcf1cc0c104e8a9ef3e5b897be0060_large.jpg', 1090000, 1750000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(51, 1, 'ULTRABOOST 4.0', 'bb6171_2c5a2b93b1934ffdaf517386f8a63560_large.jpg', 2990000, 4100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(52, 1, 'STAN SMITH VINTAGE', 's-l640_4e2e24151ef64ebdb4f4fd98a1012fde_large.jpg', 1190000, 2200000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(53, 1, 'STAN SMITH GOLD', 'adidas-stansmith-aq0439-01_250c1a9b8c5c47d19d5bfac1f714e989_large.png', 1190000, 2200000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(54, 1, 'NMD R2', 'ed5b340e5e24bc7ae535_e8a74a037c974486bd2807806e820e7d_large.jpg', 990000, 3100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(55, 1, 'ULTRABOOST 20 DASH GREY', 'zz-eg0755-10_5d5e9a0664954f7384508e1c9d07481b_large.jpg', 2450000, 3900000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(56, 1, 'ULTRABOOST 20 CORE BLACK', 'c03b56f077768a28d367_e9bbd1ca30ab4dce80881c674707794d_large.jpg', 2450000, 3900000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(57, 1, 'ULTRABOOST 4.0 SILVER MEDAL', 'upload_50296f8c49a344ed98278382722b4a98_large.jpg', 3100000, 3900000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(58, 1, 'SUPERCOURT J', 'supercourt_shoes_white_ee8795_01_standard_b6a3c7e4d65141a7af68f8d29c997ee5_large.jpg', 1650000, 2100000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:34', NULL),
(59, 1, 'ULTRABOOST 19', 'e4a347dda2745b2a0265_990dafc323434ce88cb9565d39cd1b87_large.jpg', 2350000, 5000000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:35', NULL),
(60, 1, 'YUNG 96 CHASM TRAIL', 'ee7243-1_f08a4ed066864272a5da6c84c6fc4fca_large.jpg', 1390000, 2500000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-11-19 02:06:35', NULL),
(61, 2, 'DOMBA HIGH POINT BW', 'domba_navy_15a47f3f95a340c38add26394dc7f0ca_large.jpg', 890000, 1400000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-12-21 13:54:02', NULL),
(62, 2, 'DOMBA HIGH POINT PW', 'domba-pink-grande_ef0bac1399b04e8c897736b464baa495_large.jpg', 900000, 1400000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-12-21 13:54:02', NULL),
(63, 2, 'DOMBA HIGH POINT SILVER', 'domba_silver_grande_8c27467c267b458b90fb43ba3ba1cb7e_large.jpg', 900000, 1400000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-12-21 13:54:02', NULL),
(64, 2, 'DOMBA HIGH POINT W', 'domba_w_8d42143a27d14601ad6c1161178f8692_large.jpg', 900000, 1400000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-12-21 13:54:02', NULL),
(65, 2, 'DOMBA MOONLAKE BEIGE', '1993238_l_8e34f28d0a794e0a9a223c45f3367aef_large.jpg', 1090000, 1690000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-12-21 13:54:02', NULL),
(66, 2, 'DOMBA MOONLAKE GREY', '1994835_l_b955fb233f354d14a493ef8c084a642d_large.jpg', 1090000, 1690000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-12-21 13:54:02', NULL),
(67, 2, 'DOMBA MOONLAKE WHITE', '1994834_l_0d72ae4b2d8341a093fe34c334d3b8fe_large.jpg', 1090000, 1690000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-12-21 13:54:02', NULL),
(68, 3, 'REEBOK AZTREK', 'cn7187_55f73542b92e4e27bd87be2d7f9d3cb4_large.jpg', 1150000, 1850000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-12-21 14:46:23', NULL),
(69, 3, 'REEBOK CLUB C 1985 TV', '9f64ae29bbb444ea1da5_4608f300feb847679c774dfc8fb5b940_large.jpg', 1590000, 2500000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-12-21 14:46:23', NULL),
(70, 3, 'REEBOK CLUB C FX3357', 'upload_52f6388e7745430b919a5bfa591bb1b5_large.jpg', 1290000, 2000000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-12-21 14:46:23', NULL),
(71, 3, 'REEBOK CLUB C FX3358', 'fx3358-slc-ecom-c5229a9d-eaf9-4258-8af0-dee5f92da49e_7cc73b663e4546c4a91932fef48cf215_large.jpg', 1290000, 2000000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-12-21 14:46:23', NULL),
(72, 3, 'REEBOK CLUB C VINTAGE GREEN', 'club-c-85-shoes-white-fx1378-01-standard_7f3546946eee402d9277aa1cbeae0984_large.jpg', 1590000, 2200000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-12-21 14:46:23', NULL),
(73, 3, 'REEBOK CLUB C VINTAGE NAVY', 'club-c-85-shoes-white-fx1379-01-standard_c12952b07950413a9a7b04e695c10411_large.jpg', 1750000, 2200000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-12-21 14:46:23', NULL),
(74, 3, 'REEBOK INTERVAL 96 FV5476', 'fv5476-s1_174782c8db5d4289abd9f430c4341d5c_large.jpg', 1290000, 2600000, 5, 1, NULL, 1, NULL, NULL, NULL, '2020-12-21 14:46:23', NULL),
(75, 3, 'REEBOK INTERVAL 96 FV5478', 'fv5478-s1_9812d14f44e4431abb9a5d3e3e7a005e_large.jpg', 1290000, 2600000, 5, 0, NULL, 1, NULL, NULL, NULL, '2020-12-21 14:46:23', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sale`
-- (See below for the actual view)
--
CREATE TABLE `sale` (
`id` int
,`category_id` int
,`title` varchar(100)
,`avatar` varchar(100)
,`current_price` int
,`original_price` int
,`amount` int
,`new` tinyint
,`content` text
,`status` tinyint
,`seo_title` varchar(100)
,`seo_description` varchar(100)
,`seo_keywords` varchar(100)
,`created_at` timestamp
,`updated_at` datetime
,`salePrice` decimal(15,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) DEFAULT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(100) DEFAULT NULL COMMENT 'Mật khẩu đăng nhập',
  `role` tinyint DEFAULT '1',
  `first_name` varchar(100) DEFAULT NULL COMMENT 'Fist name',
  `last_name` varchar(100) DEFAULT NULL COMMENT 'Last name',
  `phone` int DEFAULT NULL COMMENT 'SĐT user',
  `address` varchar(100) DEFAULT NULL COMMENT 'Địa chỉ user',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email của user',
  `avatar` varchar(100) DEFAULT NULL COMMENT 'File ảnh đại diện',
  `jobs` varchar(100) DEFAULT NULL COMMENT 'Nghề nghiệp',
  `last_login` datetime DEFAULT NULL COMMENT 'Lần đăng nhập gần đây nhất',
  `facebook` varchar(100) DEFAULT NULL COMMENT 'Link facebook',
  `status` tinyint DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `first_name`, `last_name`, `phone`, `address`, `email`, `avatar`, `jobs`, `last_login`, `facebook`, `status`, `created_at`, `updated_at`) VALUES
(2, 'admin ', '25f9e794323b453885f5181f1b624d0b', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-17 11:55:41', NULL),
(3, 'minh', '25f9e794323b453885f5181f1b624d0b', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-12-16 18:10:38', NULL),
(4, 'nam', '25f9e794323b453885f5181f1b624d0b', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-12-26 04:02:22', NULL);

-- --------------------------------------------------------

--
-- Structure for view `sale`
--
DROP TABLE IF EXISTS `sale`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sale`  AS  select `products`.`id` AS `id`,`products`.`category_id` AS `category_id`,`products`.`title` AS `title`,`products`.`avatar` AS `avatar`,`products`.`current_price` AS `current_price`,`products`.`original_price` AS `original_price`,`products`.`amount` AS `amount`,`products`.`new` AS `new`,`products`.`content` AS `content`,`products`.`status` AS `status`,`products`.`seo_title` AS `seo_title`,`products`.`seo_description` AS `seo_description`,`products`.`seo_keywords` AS `seo_keywords`,`products`.`created_at` AS `created_at`,`products`.`updated_at` AS `updated_at`,round(((1 - (`products`.`current_price` / `products`.`original_price`)) * 100),0) AS `salePrice` from `products` where (`products`.`original_price` <> 0) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `category_id` (`category_id`) USING BTREE;

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `home_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
