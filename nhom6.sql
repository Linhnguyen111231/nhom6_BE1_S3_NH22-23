-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 23, 2022 lúc 02:59 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom6`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`user_name`, `password`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`user_name`, `id`, `quantity`, `total`) VALUES
('ThuThanh', 1, 1, 1095000),
('admin', 31, 1, 11980000),
('ppp', 30, 1, 31990000),
('admin', 2, 13, 1010000),
('admin', 23, 13, 1850000),
('ppp', 7, 4, 4990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_user`
--

DROP TABLE IF EXISTS `login_user`;
CREATE TABLE IF NOT EXISTS `login_user` (
  `admin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `login_user`
--

INSERT INTO `login_user` (`admin`, `user_name`, `password`, `date`) VALUES
('thu thanh', 'nhu linh', 'a762175f21d0603d021c54c2850792c6', '2022-11-25 22:05:39'),
('1', 'hello', '827ccb0eea8a706c4c34a16891f84e7b', '2022-11-25 22:05:39'),
('1', 'haha', '827ccb0eea8a706c4c34a16891f84e7b', '2022-08-20 00:00:00'),
('1', 'ThuThanh', '827ccb0eea8a706c4c34a16891f84e7b', '2022-12-04 23:09:46'),
('admin', 'linh123', '001bbbf79036f630a531a0160abf9a4a', '2022-12-19 16:23:48'),
('admin', 'Hai', '827ccb0eea8a706c4c34a16891f84e7b', '2022-12-19 16:48:42'),
('admin', 'okela', '81dc9bdb52d04dc20036dbd8313ed055', '2022-12-19 19:04:23'),
('admin', '522', '305ddad049f65a2c241dbb6e6f746c54', '2022-12-19 19:07:39'),
('admin', 'ppp', '83878c91171338902e0fe0fb97a8c47a', '2022-12-19 19:07:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img_manu` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`, `img_manu`) VALUES
(1, 'ASUS', 'logo-asus-inkythuatso-2-01-26-09-21-11.jpg'),
(2, 'ACER', 'acerlogo.png'),
(3, 'Samsung', 'logo-samsung-lich-su-hinh-thanh-bieu-tuong-o-van-xanh-duong-tu-1937-5.jpg'),
(4, 'Lenovo', 'lenovologo.jpg'),
(5, 'Apple', 'logo-apple-inkythuatso-01-28-13-19-50.jpg'),
(6, 'linh', '10000000_5585286351583783_3163890528950906056_n - frame at 1m14s.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mess_ad`
--

DROP TABLE IF EXISTS `mess_ad`;
CREATE TABLE IF NOT EXISTS `mess_ad` (
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `messad` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `ad_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `date_mess` datetime NOT NULL,
  `messus` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mess_ad`
--

INSERT INTO `mess_ad` (`user_name`, `messad`, `ad_name`, `date_mess`, `messus`) VALUES
('ppp', '', 'admin', '2022-12-19 19:18:08', '2'),
('ppp', '', 'admin', '2022-12-19 19:19:17', '3'),
('ppp', '2', 'a', '2022-12-20 01:00:30', ''),
('hello', '2', 'a', '2022-12-20 01:00:39', ''),
('okela', '2', 'a', '2022-12-20 01:00:44', ''),
('okela', '2', 'a', '2022-12-20 01:00:44', ''),
('okela', 'ba', 'a', '2022-12-20 01:00:49', ''),
('okela', 'ba', 'a', '2022-12-20 01:00:50', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `odered`
--

DROP TABLE IF EXISTS `odered`;
CREATE TABLE IF NOT EXISTS `odered` (
  `admin_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `check_order` tinyint(1) NOT NULL,
  `time_ordered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `odered`
--

INSERT INTO `odered` (`admin_name`, `user_name`, `id`, `qty`, `price`, `check_order`, `time_ordered`) VALUES
('a', 'nhu linh', 30, 1, 31990000, 1, '2022-12-18 16:45:01'),
('a', 'nhu linh', 34, 1, 25990000, 0, '2022-12-18 16:45:01'),
('a', 'haha', 1, 2, 1095000, 1, '2022-12-18 16:45:01'),
('a', 'nhu linh', 35, 1, 15990000, 1, '2022-12-18 16:45:01'),
('a', 'ThuThanh', 1, 10, 1000000000, 1, '2022-12-18 16:45:01'),
('a', 'ThuThanh', 2, 10, 1000000000, 0, '2022-12-18 16:45:01'),
('a', 'ThuThanh', 3, 3, 3, 1, '2022-12-18 16:45:01'),
('a', 'ThuThanh', 5, 10, 1000000000, 0, '2022-12-18 16:45:01'),
('a', 'ThuThanh', 4, 3, 3, 1, '2022-12-18 16:45:01'),
('a', 'haha', 30, 12, 31990000, 1, '2022-12-18 16:45:01'),
('a', 'ThuThanh', 7, 3, 3, 1, '2022-12-18 16:45:01'),
('a', 'haha', 14, 1, 15990000, 1, '2022-12-18 16:45:01'),
('a', 'haha', 28, 1, 1990000, 1, '2022-12-18 16:45:01'),
('a', 'haha', 2, 1, 1010000, 1, '2022-12-18 16:45:01'),
('a', 'haha', 33, 3, 10890000, 0, '2022-12-18 16:45:01'),
('a', 'haha', 11, 1, 8990000, 0, '2022-12-19 06:29:25'),
('a', 'haha', 1, 1, 930750, 1, '2022-12-19 06:30:43'),
('a', 'haha', 1, 1, 930750, 1, '2022-12-19 06:31:57'),
('a', 'haha', 1, 1, 930750, 1, '2022-12-19 06:33:31'),
('a', 'linh123', 18, 1, 3690000, 0, '2022-12-19 16:38:33'),
('a', 'Hai', 3, 5, 12590000, 0, '2022-12-19 17:10:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `gt_sale` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_price` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `pro_image2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_image3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_image4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL,
  `product_status` int(11) NOT NULL,
  `like_pd` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `gt_sale`, `sale_price`, `pro_image`, `pro_image2`, `pro_image3`, `pro_image4`, `description`, `detail`, `feature`, `created_at`, `product_status`, `like_pd`) VALUES
(1, 'Tai nghe EP Gaming Asus Rog Cetra II Core Đen', 1, 4, 930750, '0', '930750', 'ep-gaming-asus-rog-cetra-ii-core-den-2-org.jpg', 'ep-gaming-asus-rog-cetra-ii-core-den-3-org.jpg', 'ep-gaming-asus-rog-cetra-ii-core-den-4-org.jpg', 'ep-gaming-asus-rog-cetra-ii-core-den-5-org.jpg', 'Củ tai có lớp vỏ nhôm nhẹ, cho khả năng chịu lực tốt, chống trầy xước. Kiểu dáng củ tai hơi nghiêng về phía trước cùng đệm tai và móc tai chất liệu LSR (cao su Silicone lỏng) kết cấu cực mềm tạo nên sự dễ chịu và phù hợp tối ưu cho trải nghiệm nghe tốt nhất trong khi chơi game. ', 'Công nghệ âm thanh:  ASUS Essence #\r\nTương thích:  PlayStation 4  PlayStation 5  Xbox Dòng X  Xbox Dòng S  Máy chơi game Nintendo Switch  Xbox 1  MacOS (Macbook, iMac)  Windows # \r\nJack cắm:  3.5 mm #\r\nĐộ dài dây:  130 cm# \r\nKết nối cùng lúc:  1 thiết bị #\r\nĐiều khiển:  Phím nhấn #\r\nPhím điều khiển:  Phát/dừng chơi nhạcTăng/giảm âm lượng #\r\nKhối lượng:  18 g #\r\nThương hiệu của:  Đài Loan #\r\nSản xuất tại:  Trung Quốc #\r\nHãng:  Asus.#', 0, '2022-10-25 12:37:05', 0, 0),
(2, 'Chuột Không dây Bluetooth Gaming Asus TUF M4 WL ', 1, 5, 1010000, '15', '858500', 'chuot-khong-day-gaming-asus-tuf-m4-wl-1-1.jpg', 'chuot-khong-day-gaming-asus-tuf-m4-wl-2-1.jpg', 'chuot-khong-day-gaming-asus-tuf-m4-wl-3-1.jpg', 'chuot-khong-day-gaming-asus-tuf-m4-wl-4-1.jpg', 'Chuột không dây Gaming Asus TUF M4 WL với thiết kế gọn nhẹ, nắp vỏ làm bằng polyme PBT cao cấp cho độ bền cao, cầm chắc, không mỏi tay khi thao tác liên tục.', 'Tương thích:  Windows# \r\nĐộ phân giải mặc định:  12000 DPI# \r\nCách kết nối:  Bluetooth#\r\nĐầu thu: USB Receiver#\r\nĐộ dài: dây#\r\nKhoảng cách kết nối:  15 m#\r\nĐèn: LED Không có#\r\nỨng dụng điều khiển:  Armory Crate#\r\nLoại pin:  1 viên pin AA1 viên pin AAA#\r\nKhối lượng:  77 g#\r\nThương hiệu: của  Trung Quốc#\r\nSản xuất tại:  Trung Quốc#\r\nHãng:  Asus.#', 1, '2022-10-25 12:44:15', 0, 0),
(14, 'Laptop Acer Aspire 3 A315 57G 573F i5 1035G1/8GB/512GB/2GB MX330/Win11', 2, 2, 15990000, '15', '13591500', 'vi-vn-acer-aspire-3-a315-57g-573f-i5-nxhzrsv00b-1.jpg', 'vi-vn-acer-aspire-3-a315-57g-573f-i5-nxhzrsv00b-2.jpg', 'vi-vn-acer-aspire-3-a315-57g-573f-i5-nxhzrsv00b-3.jpg', 'vi-vn-acer-aspire-3-a315-57g-573f-i5-nxhzrsv00b-4.jpg', 'Một chiếc máy tính 128GB laptop học tập - văn phòng đáng cân nhắc dành cho mọi đối tượng đặc biệt là học sinh, sinh viên hay dân văn phòng chính là laptop Acer Aspire 3 A315 57G 573F i5 (NX.HZRSV.00B) khi sở hữu hiệu năng làm việc ổn định cùng mức giá vô cùng lý tưởng, sẵn sàng đồng hành cùng bạn trên mọi nẻo đường.  ', 'CPU:  i51035G11.00 GHz#\r\nRAM:  8 GBDDR4 (Onboard 4 GB + 1 khe 4 GB)Từ 2400 MHz (Hãng công bố)#\r\nỔ cứng:  Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2TB)512 GB SSD NVMe PCIe#\r\nMàn hình:  15.6\"Full HD (1920 x 1080)# \r\nCard màn hình:  Card rờiMX330 2GB#\r\nCổng kết nối:  LAN (RJ45)USB 2.02 x USB 3.2HDMI#\r\nJack tai nghe: 3.5 mm#\r\nHệ điều hành:  Windows 11 Home SL#\r\nThiết kế:  Vỏ nhựa Kích thước#\r\nKhối lượng:  Dài 363.4 mm - Rộng 250.5 mm - Dày 19.95 mm - Nặng 1.9 kg#\r\nThời điểm ra mắt:  2021#', 1, '2022-10-26 15:06:16', 0, 0),
(3, 'Laptop Acer Aspire 3 A315 59 314F i3 1215U/8GB/256GB/Win11', 2, 2, 12590000, '0', '12590000', 'vi-vn-acer-aspire-3-a315-59-314f-i3-nxk6tsv002-1.jpg', 'vi-vn-acer-aspire-3-a315-59-314f-i3-nxk6tsv002-3.jpg', 'vi-vn-acer-aspire-3-a315-59-314f-i3-nxk6tsv002-2.jpg', 'vi-vn-acer-aspire-3-a315-59-314f-i3-nxk6tsv002-4.jpg', 'Nếu bạn đang tìm kiếm một chiếc laptop học tập - văn phòng thì laptop Acer Aspire 3 A315 59 314F i3 (NX.K6TSV.002) sẽ là sự lựa chọn lý tưởng đáp ứng đủ nhu cầu với bộ vi xử lý Intel thế hệ thứ 12 mạnh mẽ, thiết kế linh động dễ dàng mang theo mọi lúc mọi nơi.', 'CPU:  i31215U1.2GHz\r\nRAM:  8 GBDDR4 2 khe (1 khe 4 GB + 1 khe 4 GB)Từ 2400 MHz (Hãng công bố)\r\nỔ cứng:  256 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB)Hỗ trợ khe cắm HDD SATA 2.5 inch mở rộng (nâng cấp tối đa 1 TB)\r\nMàn hình:  15.6\"Full HD (1920 x 1080)\r\nCard màn hình:  Card tích hợpIntel UHD\r\nCổng kết nối:  LAN (RJ45)3 x USB 3.2HDMI\r\nJack tai nghe 3.5 mm\r\nHệ điều hành:  Windows 11 Home SL\r\nThiết kế:  Vỏ nhựa\r\nKích thước, khối lượng:  Dài 362.9 mm - Rộng 241.26 mm - Dày 19.9 mm - Nặng 1.7 kg\r\nThời điểm ra mắt:  2022CPU:  i31215U1.2GHz#\r\nRAM:  8 GBDDR4 2 khe (1 khe 4 GB + 1 khe 4 GB)Từ 2400 MHz (Hãng công bố)#\r\nỔ cứng:  256 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB)#\r\nHỗ trợ khe cắm HDD SATA 2.5 inch mở rộng (nâng cấp tối đa 1 TB)#\r\nMàn hình:  15.6\"Full HD (1920 x 1080)#\r\nCard màn hình:  Card tích hợpIntel UHD#\r\nCổng kết nối:  LAN (RJ45)3 x USB 3.2HDMI#\r\nJack tai nghe 3.5 mm#\r\nHệ điều hành:  Windows 11 Home SL#\r\nThiết kế:  Vỏ nhựa Kích thước, khối lượng:  Dài 362.9 mm - Rộng 241.26 mm - Dày 19.9 mm - Nặng 1.7 kg#\r\nThời điểm ra mắt:  2022', 0, '2022-10-25 12:44:15', 0, 0),
(4, 'Laptop Acer Nitro 5 Gaming AN515 57 553E i5 11400H/8GB/512GB/4GB RTX3050/144Hz/Win11', 2, 2, 21890000, '15', '18606500', 'acer-nitro-5-gaming-an515-57-553e-i5-nhqensv006637862384235480498.jpg', 'acer-nitro-5-gaming-an515-57-553e-i5-nhqensv006637862384240360462.jpg', 'acer-nitro-5-gaming-an515-57-553e-i5-nhqensv006637862384236540483.jpg', 'acer-nitro-5-gaming-an515-57-553e-i5-nhqensv006637862384237590461.jpg', 'Laptop Acer Nitro 5 Gaming AN515 57 553E (NH.QENSV.006) là sự cân bằng hoàn hảo của diện mạo hầm hố chuẩn laptop gaming cùng hiệu năng của chip Intel thế hệ 11 mạnh mẽ kết hợp với card màn hình rời NVIDIA sẵn sàng cùng bạn chinh phục trên mọi đấu trường ảo.', 'CPU:  i511400H2.7GHz#\r\nRAM:  8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời)3200 MHz#\r\nỔ cứng:  Hỗ trợ khe cắm HDD SATA 2.5 inch mở rộng (nâng cấp tối đa 2 TB)512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB)\r\nHỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1TB) Màn hình:  15.6\"Full HD (1920 x 1080) 144Hz#\r\nCard màn hình:  Card rờiRTX 3050 4GB#\r\nCổng kết nối:  USB Type-CLAN (RJ45)3 x USB 3.2HDMIJack tai nghe 3.5 mm#\r\nĐặc biệt:  Có đèn bàn phím#\r\nHệ điều hành:  Windows 11 Home SL#\r\nThiết kế:  Vỏ nhựa Kích thước# \r\nKhối lượng:  Dài 363.4 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.2 kg#\r\nThời điểm ra mắt:  2021#', 1, '2022-10-25 12:48:08', 0, 0),
(5, 'Điện thoại Samsung Galaxy Z Flip4 256GB', 3, 1, 22990000, '15', '19541500', 'samsung-galaxy-z-flip4-5g-256gb637967645938385429.jpg', 'samsung-galaxy-z-flip4-5g-256gb637967645929205311.jpg', 'samsung-galaxy-z-flip4-5g-256gb637967645932285327.jpg', 'samsung-galaxy-z-flip4-5g-256gb637967645941175393.jpg', 'Tiếp nối sự thành công đến từ các thế thệ điện thoại gập đi trước, Samsung Galaxy Z Flip4 256GB đã được ra mắt với một ngôn ngữ thiết kế thân quen cùng sự nâng cấp đáng kể về độ bền cũng như nâng cấp kiểu dáng và chất liệu. Không đơn thuần là một chiếc smartphone mà đây còn được coi là món phụ kiện thời trang cao cấp đến từ nhà Samsung.', 'Màn hình:  Chính: Dynamic AMOLED 2X#\r\nPhụ: Super AMOLEDChính 6.7\" & Phụ 1.9\"Full HD#\r\nHệ điều hành:  Android 12 #\r\nCamera sau:  2 camera 12 MP#\r\nCamera trước:  10 MP#\r\nChip:  Snapdragon 8+ Gen 1 #\r\nRAM:  8 GB#\r\nDung lượng lưu trữ:  256 GB #\r\nSIM:  1 Nano SIM & 1 eSIM#\r\nHỗ trợ 5G Pin, Sạc:  3700 mAh25 W', 1, '2022-10-25 12:48:08', 0, 0),
(6, 'Điện thoại Samsung Galaxy Z Fold4 512GB', 3, 1, 41490000, '15', '35266500', 'samsung-galaxy-z-fold4-5g-512gb637969579498298187.jpg', 'samsung-galaxy-z-fold4-5g-512gb637969579499268185.jpg', 'samsung-galaxy-z-fold4-5g-512gb637969579502308221.jpg', 'samsung-galaxy-z-fold4-5g-512gb637969579504218244.jpg', 'Samsung Galaxy Z Fold4 512GB có lẽ là cái tên dành được nhiều sự chú ý đến từ sự kiện Unpacked thường niên của Samsung, bởi máy sở hữu màn hình lớn cùng cơ chế gấp gọn giúp người dùng có thể dễ dàng mang theo. Cùng với đó là sự nâng cấp về hiệu năng và phần mềm giúp máy xử lý tốt hầu hết mọi tác vụ bạn cần từ làm việc đến giải trí.', 'Màn hình:  Dynamic AMOLED 2XChính 7.6\" & Phụ 6.2\"Quad HD+ (2K+)#\r\nHệ điều hành:  Android 12#\r\nCamera sau:  Chính 50 MP & Phụ 12 MP, 10 MP#\r\nCamera trước:  10 MP & 4 MP#\r\nChip:  Snapdragon 8+ Gen 1#\r\nRAM:  12 GB#\r\nDung lượng lưu trữ:  512 GB#\r\nSIM:  1 Nano SIM & 1 eSIMHỗ trợ 5G#\r\nPin, Sạc:  4400 mAh25 W#', 1, '2022-10-25 12:48:08', 0, 0),
(7, 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 2 Pro R510N Trắng ', 3, 4, 4990000, '0', '4990000', 'tai-nghe-bluetooth-true-wireless-galaxy-buds2-pro-1.jpg', 'tai-nghe-bluetooth-true-wireless-galaxy-buds2-pro-2.jpg', 'tai-nghe-bluetooth-true-wireless-galaxy-buds2-pro-4.jpg', 'tai-nghe-bluetooth-true-wireless-galaxy-buds2-pro-5.jpg', 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 2 Pro R510N Trắng chắc chắn sẽ cho bạn trải nghiệm sử dụng tuyệt vời nhờ thiết kế nhỏ gọn, đẹp mắt cùng nhiều công nghệ và tính năng hiện đại được tích hợp như: 360 Reality Audio, công nghệ chống ồn chủ động, công nghệ xuyên âm,...', 'Thời gian tai nghe:  Dùng 8 giờ - Sạc Khoảng 70 phút#\r\nThời gian hộp sạc:  Dùng 29 giờ - Sạc Khoảng 130 phút#\r\nCổng sạc:  Sạc không dâyType-C#\r\nCông nghệ âm thanh:  360 Reality AudioActive Noise CancellingAmbient SoundÂm thanh Hi-Fi#\r\nTương thích:  WindowsiOS (iPhone)Android#\r\nỨng dụng kết nối:  SmartThings#\r\nTiện ích:  Sạc nhanhHỗ trợ sạc không dây Qi3 Micro chống ồnChống nước IPX7Chống ồn chủ động ANC#\r\nHỗ trợ kết nối:  Bluetooth 5.3#\r\nĐiều khiển bằng:  Cảm ứng chạm#\r\nHãng: Samsung.#', 0, '2022-10-25 12:52:00', 0, 0),
(8, 'Chuột Có dây Gaming Asus Keris ', 1, 5, 875000, '0', '875000', 'chuot-co-day-gaming-asus-keris-2-1.jpg', 'chuot-co-day-gaming-asus-keris-3-1.jpg', 'chuot-co-day-gaming-asus-keris-4-1.jpg', 'chuot-co-day-gaming-asus-keris-6.jpg', 'Chuột có dây Gaming Asus Keris có kiểu dáng gọn nhẹ, thiết kế mạnh mẽ, vừa lòng bàn tay khi cầm nắm, tạo cảm giác thoải mái khi chơi game.', 'Tương thích: Windows#\r\nĐộ phân giải mặc định: 16000 DPI#\r\nCách kết nối: Dây cắm USB#\r\nĐộ dài dây/Khoảng cách kết nối: Dây dài 204 cm#\r\nĐèn LED: RGB#\r\nỨng dụng điều khiển: Armory Crate#\r\nKhối lượng: 62 g#\r\nThương hiệu của: Trung Quốc#\r\nSản xuất tại: Trung Quốc#\r\nHãng: Asus. #', 0, '2022-10-25 12:48:08', 0, 0),
(9, 'Máy tính bảng Samsung Galaxy Tab S8 5G', 3, 3, 20990000, '0', '20990000', 'samsung-galaxy-tab-s8-white-1.jpg', '2-1020x570.jpg', '4-1020x570.jpg', '6-1020x570.jpg', 'Samsung Galaxy Tab S8 ra mắt và vẫn giữ được đặc trưng của dòng máy tính bảng Galaxy Tab S với cấu hình mạnh mẽ, màn hình hiển thị ổn cùng khả năng hỗ trợ bút S Pen hỗ trợ học tập làm việc tốt hơn.', 'Màn hình:  11\"LTPS#\r\nHệ điều hành:  Android 12#\r\nChip:  Snapdragon 8 Gen 1#\r\nRAM:  8 GB#\r\nDung lượng lưu trữ: 128 GB#\r\nKết nối:  5GCó nghe gọi#\r\nSIM:  1 Nano SIM#\r\nCamera sau: Chính 13 MP & Phụ 6 MP#\r\nCamera trước:  12 MP#\r\nPin, Sạc:  8000 mAh45 W#\r\nHãng  Samsung.#', 0, '2022-10-25 12:48:08', 0, 0),
(10, 'Laptop Lenovo Ideapad 5 14IAL7 i5 1235U/8GB/512GB/Win11', 4, 2, 18490000, '0', '18490000', 'lenovo-ideapad-5-14ial7-i5-82sd0060vn-1.jpg', 'lenovo-ideapad-5-14ial7-i5-82sd0060vn-2.jpg', 'lenovo-ideapad-5-14ial7-i5-82sd0060vn-3.jpg', 'lenovo-ideapad-5-14ial7-i5-82sd0060vn-4.jpg', 'Một sản phẩm laptop học tập - văn phòng mà các bạn học sinh, sinh viên hay dân văn phòng không nên bỏ qua chính là chiếc laptop Lenovo Ideapad 5 14IAL7 i5 (82SD0060VN) khi sở hữu hiệu năng mạnh mẽ từ chip Intel Gen 12 cùng ngoại hình thanh lịch, đẹp mắt. ', 'CPU:  i51235U1.3GHz#\r\nRAM:  8 GBDDR4 (Onboard)3200 MHz#\r\nỔ cứng:  512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB (2280) / 512 GB (2242))#\r\nMàn hình:  14\"Full HD (1920 x 1080)#\r\nCard màn hình:  Card tích hợpIntel Iris Xe#\r\nCổng kết nối:  1 x USB 3.21 x USB 3.2 (Always on)2 x USB Type-CHDMI#\r\nJack tai nghe: 3.5 mm#\r\nĐặc biệt:  Có đèn bàn phím#\r\nHệ điều hành:  Windows 11 Home SL#\r\nThiết kế:  Vỏ kim loại - Nhôm#\r\nKích thước, khối lượng:  Dài 321.69 mm - Rộng 211.84 mm - Dày 16.9 mm - Nặng 1.44 kg#\r\nThời điểm ra mắt:  2022', 0, '2022-10-27 13:51:12', 0, 0),
(11, 'Điện thoại iPhone 14 Pro 1TB ', 5, 1, 8990000, '15', '7641500', 'iphone-14-pro-tim-1-1.jpg', 'iphone-14-pro-tim-2.jpg', 'iphone-14-pro-tim-3.jpg', 'iphone-14-pro-tim-4.jpg', 'iPhone 14 Pro 1TB tiếp tục thể hiện sức hot của mình ngay sau khi ra mắt nhờ thiết kế mang những cải tiến tinh tế, hiệu năng bùng nổ cùng bộ vi xử lý A16 Bionic hoàn toàn mới cùng những cải tiến khác, sẵn sàng cân mọi tác vụ của người dùng.', 'Màn hình:  OLED6.1\"Super Retina XDR#\r\nHệ điều hành:  iOS 16#\r\nCamera sau:  Chính 48 MP & Phụ 12 MP, 12 MP#\r\nCamera trước:  12 MP#\r\nChip:  Apple A16 Bionic#\r\nRAM:  6 GB#\r\nDung lượng lưu trữ:  1 TB#\r\nSIM:  1 Nano SIM & 1 eSIMHỗ trợ 5G#\r\nPin, Sạc:  3200 mAh20 W#', 1, '2022-10-25 13:04:04', 0, 0),
(12, 'Tai nghe Bluetooth True Wireless Gaming Asus Rog Cetra Đen ', 1, 4, 2060000, '0', '2060000', 'bluetooth-true-wireless-asus-rog-cetra-den-1-1.jpg', 'bluetooth-true-wireless-asus-rog-cetra-den-2-1.jpg', 'bluetooth-true-wireless-asus-rog-cetra-den-3-1.jpg', 'bluetooth-true-wireless-asus-rog-cetra-den-4-1.jpg', 'Tai nghe Bluetooth True Wireless Asus Rog Cetra Đen sở hữu vẻ ngoài hầm hố với điểm nhấn là logo hãng được thiết kế tinh tế. Ngoài ra, tai nghe còn có khả năng kết nối không dây độ trễ thấp, trang bị công nghệ chống ồn chủ động ANC và viên pin lớn lên đến 21.5 giờ khi sử dụng chung với hộp sạc.', 'Thời gian tai nghe:  Dùng 5.5 giờ - Sạc 33 phút#\r\nThời gian hộp sạc:  Dùng 21.5 giờ - Sạc 2.5 giờ#\r\nCổng sạc:  Type-C#\r\nCông nghệ âm thanh:  Hybrid ANC#\r\nTương thích:  WindowsiOS (iPhone)MacOSNintendo SwitchAndroid#\r\nỨng dụng kết nối:  Armoury Crate#\r\nTiện ích:  Chống nước IPX4Có đèn RGBSạc không dâyChống ồn chủ động ANC#\r\nHỗ trợ kết nối:  Bluetooth 5.0#\r\nĐiều khiển bằng:  Cảm ứng chạm#\r\nHãng: Asus. ', 0, '2022-10-26 14:51:52', 0, 0),
(13, 'Chuột Có dây Gaming Asus TUF M3 Đen', 1, 5, 465000, '0', '465000', 'chuot-gaming-asus-tuf-m3-den-2-org.jpg', 'chuot-gaming-asus-tuf-m3-den-3-org.jpg', 'chuot-gaming-asus-tuf-m3-den-4-org.jpg', 'chuot-gaming-asus-tuf-m3-den-5-org.jpg', 'Chuột Gaming Asus TUF M3 Đen có thiết kế nhỏ gọn, cùng chất liệu nhựa có độ ma sát cao giúp cho việc cầm nắm chắc chắn hơn. Thiết kế công thái học phù hợp với người thuận tay phải. Trọng lượng chỉ 84 gram khá nhẹ, tiện dụng.', 'Tương thích: Windows#\r\nĐộ phân giải mặc định: 7000 DPI#\r\nCách kết nối: Dây cắm USB#\r\nĐộ dài dây/Khoảng cách kết nối: Dây dài 184 cm #\r\nĐèn LED: RGB #\r\nỨng dụng điều khiển: ROG Armoury II#\r\nKhối lượng: 84 g#\r\nThương hiệu của: Đài Loan#\r\nSản xuất tại: Trung Quốc #\r\nHãng: Asus. ', 0, '2022-10-26 14:51:52', 0, 0),
(15, 'Laptop Acer Swift 3 SF314 511 55QE i5', 2, 2, 21490000, '15', '18266500', 'vi-vn-acer-swift-3-sf314-511-55qe-i5-nxabnsv003-1.jpg', 'vi-vn-acer-swift-3-sf314-511-55qe-i5-nxabnsv003-2.jpg', 'vi-vn-acer-swift-3-sf314-511-55qe-i5-nxabnsv003-3.jpg', 'vi-vn-acer-swift-3-sf314-511-55qe-i5-nxabnsv003-4.jpg', 'Bạn cần tìm chiếc laptop mỏng nhẹ, thiết kế kim loại sang trọng cùng hiệu năng và thời lượng pin ấn tượng, tất cả đều có trong chiếc laptop Acer Swift 3 SF314 511 55QE i5 (NX.ABNSV.003). Sản phẩm phù hợp với học sinh, sinh viên, nhân viên văn phòng yêu thích sự nhỏ gọn, linh hoạt di chuyển.', 'CPU:  i51135G72.4GHz#\r\nRAM:  16 GBLPDDR4X (Onboard)4266 MHz#\r\nỔ cứng:  512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)#\r\nMàn hình:  14\"Full HD (1920 x 1080)#\r\nCard màn hình:  Card tích hợpIntel Iris Xe#\r\nCổng kết nối:  2 x USB 3.2Thunderbolt 4 USB-CHDMI#\r\nJack tai nghe: 3.5 mm#\r\nĐặc biệt:  Có đèn bàn phím#\r\nHệ điều hành:  Windows 11 Home SL#\r\nThiết kế:  Vỏ kim loại#\r\nKích thước, khối lượng:  Dài 322.8 mm - Rộng 212.2 mm - Dày 15.9 mm - Nặng 1.19 kg#\r\nThời điểm ra mắt:  2021', 1, '2022-10-26 15:06:16', 0, 0),
(16, 'Laptop Acer Nitro 5 Gaming AN515 45 R86D R7', 2, 2, 28990000, '15', '24641500', 'vi-vn-acer-nitro-5-gaming-an515-45-r86d-r7-nhqbcsv005-2.jpg', 'vi-vn-acer-nitro-5-gaming-an515-45-r86d-r7-nhqbcsv005-1.jpg', 'vi-vn-acer-nitro-5-gaming-an515-45-r86d-r7-nhqbcsv005-3.jpg', 'vi-vn-acer-nitro-5-gaming-an515-45-r86d-r7-nhqbcsv005-4.jpg', 'Thiết kế góc cạnh đầy nổi bật của chiếc laptop Acer Nitro 5 Gaming AN515 45 R86D R7 (NH.QBCSV.005) cùng hiệu năng mạnh mẽ vượt trội, hứa hẹn là người cộng sự đắc lực trên mọi phương diện, cùng bạn tạo nên thành công.', 'CPU:  Ryzen 75800H3.2GHz #\r\nRAM:  8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời)3200 MHz #\r\nỔ cứng:  Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộngHỗ trợ khe cắm HDD SATA512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2 TB) #\r\nMàn hình:  15.6\"Full HD (1920 x 1080) 144Hz #\r\nCard màn hình:  Card rờiRTX 3060 6GB #\r\nCổng kết nối:  USB Type-CLAN (RJ45)3 x USB 3.2HDMIJack tai nghe 3.5 mm #\r\nĐặc biệt:  Có đèn bàn phím #\r\nHệ điều hành:  Windows 11 Home SL #\r\nThiết kế:  Vỏ nhựa #\r\nKích thước, khối lượng:  Dài 363.4 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.2 kg #\r\nThời điểm ra mắt:  2021', 1, '2022-10-26 15:11:05', 0, 0),
(17, 'Điện thoại Samsung Galaxy A04s', 3, 1, 3990000, '0', '3990000', 'samsung-galaxy-ao4s-1020x570.jpg', 'samsung-galaxy-a04s-xanh-2-1.jpg', 'samsung-galaxy-a04s-xanh-3-1.jpg', 'samsung-galaxy-a04s-xanh-4.jpg', 'Samsung Galaxy A04s mang nhiều cải tiến so với thế hệ Galaxy A03s, màn hình hỗ trợ tần số quét 90 Hz cho trải nghiệm mượt mà cùng camera độ phân giải lên đến 50 MP để bạn nhiếp ảnh thêm tự tin, hứa hẹn mang đầy đủ các tính năng cần thiết ở một chiếc điện thoại dòng A giá rẻ.', 'Màn hình:  IPS LCD6.5\"HD+ #\r\nHệ điều hành:  Android 12 #\r\nCamera sau:  Chính 50 MP & Phụ 2 MP, 2 MP #\r\nCamera trước:  5 MP #\r\nChip:  Exynos 850 #\r\nRAM:  4 GB #\r\nDung lượng lưu trữ:  64 GB #\r\nSIM:  2 Nano SIMHỗ trợ 4G #\r\nPin, Sạc:  5000 mAh15 W', 0, '2022-10-26 15:22:15', 0, 0),
(18, 'Máy tính bảng Lenovo Tab M8 ', 4, 3, 3690000, '0', '3690000', 'lenovo-tab-m8-slider-780x433-1.jpg', 'lenovo-tab-m8-1-org.jpg', 'lenovo-tab-m8-4-org.jpg', 'lenovo-tab-m8-5-org.jpg', 'Lenovo Tab M8 chiếc máy tính bảng giá rẻ, cấu hình ổn, thiết kế cao cấp trong tầm giá, hoàn toàn phù hợp với các nhu cầu cơ bản như đọc báo, xem phim, lướt web hằng ngày. 128GB.', 'Màn hình:  8\"IPS LCD #\r\nHệ điều hành:  Android 10 #\r\nChip:  MediaTek Helio A22 #\r\nRAM:  3 GB #\r\nDung lượng lưu trữ:  32 GB #\r\nKết nối:  Hỗ trợ 4GCó nghe gọi #\r\nSIM:  1 Nano SIM #\r\nCamera sau:  5 MP #\r\nCamera trước:  2 MP# \r\nPin, Sạc:  5000 mAh5 W', 0, '2022-10-26 15:22:15', 0, 0),
(19, 'Máy tính bảng Lenovo Yoga Tab 11', 4, 3, 10290000, '0', '10290000', 'lenovo-yoga-tab-11637877174512721419.jpg', 'lenovo-yoga-tab-11637877174514711287.jpg', 'lenovo-yoga-tab-11637877174516931248.jpg', 'lenovo-yoga-tab-11637877174513751305.jpg', 'Tablet Lenovo mang đến cho người dùng mẫu máy tính bảng mới với tên gọi Yoga Tab 11 cùng nhiều ưu điểm vượt trội như bộ vi xử lý chuyên game của MediaTek, màn hình kích thước lớn, âm thanh nổi sống động và các chế độ tiện ích đa dạng khác mà không thua kém gì các tablet cao cấp khác.', 'Màn hình:  11\"IPS LCD #\r\nHệ điều hành:  Android 11# \r\nChip:  MediaTek Helio G90T# \r\nRAM:  4 GB #\r\nDung lượng lưu trữ:  128 GB #\r\nKết nối:  Hỗ trợ 4GCó nghe gọi# \r\nSIM:  1 Nano SIM #\r\nCamera sau:  8 MP #\r\nCamera trước:  8 MP# \r\nPin, Sạc:  7500 mAh20 W', 0, '2022-10-26 15:29:40', 0, 0),
(20, 'Máy tính bảng Lenovo Tab M10 - Gen 2 ', 4, 3, 4290000, '15', '3646500', 'lenovo-tab-m10-gen-2-slider-780x433.jpg', 'lenovo-tab-m10-gen-2-slider-780x433.jpg', 'q4-780x433.jpg', 'lenovo-tab-m10-gen-2-4-org.jpg', 'Lenovo Tab M10 Gen 2 từ hãng tablet Lenovo nổi bật trong phân khúc tầm trung khi sở hữu thiết kế gọn nhẹ, hiện đại cùng khả năng kết nối mạnh mẽ, viên pin ấn tượng và cấu hình ổn định trong tầm giá.', 'Màn hình:  10.1\"IPS LCD #\r\nHệ điều hành:  Android 10# \r\nChip:  MediaTek Helio P22T# \r\nRAM:  2 GB #\r\nDung lượng lưu trữ:  32 GB #\r\nKết nối:  Hỗ trợ 4GCó nghe gọi #\r\nSIM:  1 Nano SIM #\r\nCamera sau:  8 MP #\r\nCamera trước:  5 MP# \r\nPin, Sạc:  5000 mAh10 W', 1, '2022-10-26 15:29:40', 0, 0),
(21, 'Máy tính bảng Lenovo Tab M10 - FHD Plus', 4, 3, 5090000, '0', '5090000', 'lenovo-tab-m10-fhd-plus-1-1-org.jpg', 'lenovo-tab-m10-fhd-plus-2-org.jpg', 'lenovo-tab-m10-fhd-plus-4-1-org.jpg', 'lenovo-tab-m10-fhd-plus-5-org.jpg', 'Từ việc sử dụng các thiết bị điện tử đa dạng của các gia đình hiện nay, hãng máy tính bảng Lenovo đã nắm bắt được nhu cầu thiết yếu này và cho ra mắt chiếc máy tính bảng Lenovo Tab M10 - FHD Plus với những tính năng tiện ích ấn tượng, “khoác chiếc áo” của thời đại và có mức giá siêu ưu đãi.', 'Màn hình:  10.3\"IPS LCD #\r\nHệ điều hành:  Android 10# \r\nChip:  MediaTek Helio P22T# \r\nRAM:  4 GB #\r\nDung lượng lưu trữ:  64 GB #\r\nKết nối:  Hỗ trợ 4G #\r\nSIM:  1 Nano SIM #\r\nCamera sau:  8 MP #\r\nCamera trước:  5 MP# \r\nPin, Sạc:  5000 mAh10 W', 0, '2022-10-26 15:34:28', 0, 0),
(22, 'Điện thoại iPhone 14 Pro Max 256GB ', 5, 1, 36990000, '15', '31441500', 'iphone-14-pro-den-1-1.jpg', 'iphone-14-pro-tim-2.jpg', 'iphone-14-pro-tim-3.jpg', 'iphone-14-pro-tim-4.jpg', 'Mới đây thì chiếc điện thoại iPhone 14 Pro Max 256GB cũng đã được chính thức lộ diện trên toàn cầu và đập tan bao lời đồn đoán bấy lâu nay, bên trong máy sẽ được trang bị con chip hiệu năng khủng cùng sự nâng cấp về camera đến từ nhà Apple.', 'Màn hình:  OLED6.7\"Super Retina XDR #\r\nHệ điều hành:  iOS 16 #\r\nCamera sau:  Chính 48 MP & Phụ 12 MP, 12 MP #\r\nCamera trước:  12 MP #\r\nChip:  Apple A16 Bionic# \r\nRAM:  6 GB #\r\nDung lượng lưu trữ:  256 GB #\r\nSIM:  1 Nano SIM & 1 eSIMHỗ trợ 5G #\r\nPin, Sạc:  4323 mAh20 W', 1, '2022-10-26 15:38:12', 0, 0),
(23, 'Chuột Bluetooth Apple MK2E3 ', 5, 5, 1850000, '15', '1572500', 'chuot-bluetooth-apple-mk2e3-trang-1.jpg', 'chuot-bluetooth-apple-mk2e3-trang-2.jpg', 'chuot-bluetooth-apple-mk2e3-trang-3.jpg', 'chuot-bluetooth-apple-mk2e3-trang-4.jpg', 'Công nghệ Multi-Touch, cổng sạc Lightning.\r\nThiết kế siêu nhẹ và tính ứng dụng cao hơn.\r\nSản phẩm nhỏ gọn, trọng lượng chỉ khoảng 80 g, bề mặt đa cảm ứng giúp cho bạn sử dụng nhanh nhạy đa điểm hơn.\r\nTương thích máy Mac hỗ trợ Bluetooth với hệ điều hành MacOS.\r\nSản phẩm chính hãng Apple.', 'Tương thích: macOS (MacBook, iMac) #\r\nĐộ phân giải mặc định: 1500 DPI #\r\nCách kết nối: Bluetooth #\r\nĐộ dài dây/Khoảng cách kết nối:  10 m #\r\nĐèn LED:  Không có Ứng dụng điều khiển # \r\nKhông có Loại pin: Pin sạc #\r\nThời gian: Dùng 2 tháng - Sạc 2 giờ #\r\nCổng sạc: Lightning #\r\nKhối lượng:  80 g #\r\nThương hiệu của:  Mỹ# \r\nSản xuất tại: Việt Nam/Trung Quốc (tùy lô hàng) #\r\nHãng:  Apple.', 1, '2022-10-26 16:30:27', 0, 0),
(24, 'Tai nghe chụp tai Bluetooth AirPods Max Apple MGYH3', 5, 4, 11890000, '15', '10106500', 'bluetooth-airpods-max-apple-1-org.jpg', 'bluetooth-airpods-max-apple-hong-2.jpg', 'bluetooth-airpods-max-apple-hong-3.jpg', 'bluetooth-airpods-max-apple-hong-4.jpg', 'Sang trọng với lớp vỏ kim loại sáng bóng, bền bỉ, lựa chọn dễ dàng theo sở thích với màu sắc đa dạng \r\nTai Bluetooth AirPods Max Apple MGYH3/ MGYJ3/ MGYL3 dễ dàng cuốn hút bạn ngay từ cái nhìn đầu tiên, với nét sang trọng và cực kỳ tinh tế đến từ sự tối giản trong thiết kế và màu sắc, tạo sự khác biệt ấn tượng với các sản phẩm tai nghe hiện có trên thị trường.', 'Thời gian tai nghe:  Dùng 20 giờ - Sạc 3 giờ #\r\nCổng sạc:  Lightning #\r\nCông nghệ âm thanh:  Active Noise CancellationChip Apple H1Transparency ModeSpatial AudioAdaptive EQ #\r\nTương thích:  iOS (iPhone)Android #\r\nTiện ích:  Sạc nhanhChống ồn #\r\nHỗ trợ kết nối:  Bluetooth 5.0# \r\nĐiều khiển bằng:  Phím nhấn #\r\nHãng:  Apple.', 1, '2022-10-26 16:30:27', 0, 0),
(25, 'Tai nghe nhét trong EarPods Lightning Apple MMTN2 ', 5, 4, 690000, '0', '690000', 'tai-nghe-earpods-apple-org-md827fea.jpg', 'tai-nghe-earpods-cong-lightning-apple-mmtn2-org-2.jpg', 'tai-nghe-earpods-cong-lightning-apple-mmtn2-org-3.jpg', 'tai-nghe-earpods-cong-lightning-apple-mmtn2-org-4.jpg', 'Tai nghe Earpods Apple MNHF2 với thiết kế đẹp mắt, kiểu dáng quen thuộc trẻ trung\r\n', 'Jack cắm:  Lightning #\r\nTương thích:  iOS (iPhone)# \r\nTiện ích:  Có mic thoại #\r\nĐiều khiển bằng:  Phím nhấn #\r\nPhím điều khiển:  Mic thoạiPhát/dừng chơi nhạcChuyển bài hátTăng/giảm âm lượngNghe/nhận cuộc gọi #\r\nHãng:  Apple.', 0, '2022-10-26 16:42:31', 0, 0),
(26, 'Tai nghe Bluetooth True Wireless Beats Fit Pro Earbuds ', 5, 4, 4390000, '0', '4390000', 'tai-nghe-true-wireless-beats-fit-pro-earbuds-den-1.jpg', 'tai-nghe-true-wireless-beats-fit-pro-earbuds-trang-3.jpg', 'tai-nghe-true-wireless-beats-fit-pro-earbuds-trang-2.jpg', 'tai-nghe-true-wireless-beats-fit-pro-earbuds-trang-4.jpg', 'Tai nghe Bluetooth True Wireless Beats Fit Pro Earbuds mang đến một thiết kế thời thượng, công nghệ âm thanh hiện đại như: Chống ồn chủ động, Transparency, công nghệ Bluetooth,...', 'Thời gian tai nghe:  Dùng 6 giờ #\r\nThời gian hộp sạc:  Dùng 18 giờ #\r\nCổng sạc:  Type-C #\r\nCông nghệ âm thanh:  Chip Apple H1Transparency ModeAudio SharingActive Noise CancellingSpatial Audio #\r\nTương thích:  iOS (iPhone)MacOS (Macbook, iMac)Android #\r\nỨng dụng kết nối:  Beats #\r\nTiện ích:  Sạc nhanhTrợ lý ảo SiriChống ồnChống nước IPX4Nút tai đi kèm #\r\nHỗ trợ kết nối:  Bluetooth Class 1 #\r\nĐiều khiển bằng:  Cảm ứng chạm #\r\nHãng:  Beats.', 0, '2022-10-26 16:51:58', 0, 0),
(27, 'Chuột có dây Apple MB112 Trắng', 5, 5, 1690000, '0', '1690000', 'chuot-co-day-apple-mb112-org-trang.jpg', 'chuot-co-day-apple-mb112-trang-org-2.jpg', 'chuot-co-day-apple-mb112-trang-org-3.jpg', 'chuot-co-day-apple-mb112-trang-org-4.jpg', 'Chuột có dây Apple MB112 Trắng là một phụ kiện nhỏ nhưng nhiều sức mạnh để hỗ trợ đắc lực cho bạn trong công việc khi kết hợp sử dụng với máy tính MacBook.', 'Độ phân giải mặc định:  800 DPI #\r\nĐộ dài dây/Khoảng cách kết nối:  Dây dài 70 cm #\r\nKhối lượng:  100 g #\r\nHãng:  Apple.', 0, '2022-11-06 15:07:29', 0, 0),
(28, 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds Live R180 Gold ', 3, 4, 1990000, '30', '1393000', 'true-wireless-samsung-galaxy-buds-live-r180-3.jpg', 'true-wireless-samsung-galaxy-buds-live-r180-4.jpg', 'true-wireless-samsung-galaxy-buds-live-r180-5.jpg', 'true-wireless-samsung-galaxy-buds-live-r180-6.jpg', 'Samsung Galaxy Buds Live R180 Gold có tone màu khá sang trọng, quyến rũ ở cả trong và ngoài, rất phù hợp cho phái nữ. Hộp sạc của tai nghe Samsung Galaxy Buds Live dạng mở nắp vỏ sò, trọng lượng 42.2 gram nhỏ gọn, người dùng có thể đóng mở bằng một tay khá dễ dàng.', 'Thời gian tai nghe:  Dùng 6 giờ - Sạc 1 giờ #\r\nThời gian hộp sạc:  Dùng 21 giờ - Sạc 1 giờ #\r\nCổng sạc:  Sạc không dâyType-C #\r\nCông nghệ âm thanh:  Active Noise Cancellation #\r\nTương thích:  Android, iOS, Windows #\r\nỨng dụng kết nối:  Galaxy Wearable #\r\nTiện ích:  Có mic thoạiChống nước IPX2Sử dụng độc lập 1 bên tai nghe #\r\nHỗ trợ kết nối:  Bluetooth 5.0 #\r\nĐiều khiển bằng:  Cảm ứng chạm #\r\nHãng:  Samsung.', 1, '2022-11-06 15:07:29', 0, 0),
(29, 'Tai nghe nhét tai Samsung EG920', 3, 4, 325000, '30', '227500', 'tai-nghe-nhet-tai-samsung-eg920b-240722-120127-600x600.jpg', 'tai-nghe-nhet-trong-samsung-eg920b-do-2-org.jpg', 'tai-nghe-nhet-trong-samsung-eg920b-do-3-org.jpg', 'tai-nghe-nhet-trong-samsung-eg920b-do-5-org.jpg', 'Thiết kế gọn đẹp, có 2 màu xanh và đỏ.\r\nDây dài 1.28 m, đệm tai có móc giúp đeo chắc chắn.\r\nÂm thanh trong trẻo, trung thực.\r\nCó mic thoại, nút chỉnh nhận cuộc gọi, chuyển bài hát, dừng/chơi nhạc, tăng/giảm âm lượng.', 'Jack cắm:  3.5 mm #\r\nTương thích:  WindowsWindows PhoneAndroid #\r\nTiện ích:  Có mic thoạiĐệm tai đi kèmTai nghe nhét tai #\r\nĐiều khiển bằng:  Phím nhấn #\r\nPhím điều khiển:  Nghe/nhận cuộc gọiMic thoạiPhát/dừng chơi nhạcTăng/giảm âm lượng #\r\nHãng:  Samsung.', 0, '2022-11-06 15:17:12', 0, 0),
(30, 'Máy tính bảng iPad Pro M2 12.9 inch WiFi 128GB', 5, 3, 31990000, '30', '22393000', 'ipad-pro-m2-wifi-xam-1.jpg', 'ipad-pro-m2-5g-gray-1.jpg', 'ipad-pro-m2-5g-gray-2.jpg', 'ipad-pro-m2-5g-gray-3.jpg', 'iPad Pro M2 12.9 inch WiFi 128GB là mẫu tablet mới nhất được nhà Apple phát hành vào tháng 10/2022. Thiết bị được coi là tâm điểm của giới công nghệ tại thời điểm ra mắt khi được trang bị con chip Apple M2 mạnh mẽ, bên cạnh đó sẽ là những ưu điểm khác vượt trội như: hệ điều hành iPadOS 16, quay video 4K với tốc độ khung hình 60 FPS, tần số quét 120 Hz,...', 'Màn hình:  12.9\"Liquid Retina XDR #\r\nHệ điều hành:  iPadOS 16 #\r\nChip:  Apple M2 8 nhân #\r\nRAM:  8 GB #\r\nDung lượng lưu trữ:  128 GB #\r\nKết nối:  5GNghe gọi qua FaceTime #\r\nSIM:  1 Nano SIM hoặc 1 eSIM #\r\nCamera sau:  Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR #\r\nCamera trước:  12 MP #\r\nPin, Sạc:  40.88 Wh (~ 10.835 mAh)20 W', 1, '2022-11-06 15:17:12', 0, 0),
(31, 'Máy tính bảng iPad 9 WiFi Cellular 64GB', 5, 3, 11980000, '30', '8385999', 'ipad-9-wifi-cellular-64gb637702569041807766.jpg', 'ipad-9-wifi-cellular-64gb637702569036157755.jpg', 'ipad-9-wifi-cellular-64gb637702569037187790.jpg', 'ipad-9-wifi-cellular-64gb637702569041807766.jpg', 'Sau thành công của iPad 8 thì Apple đã tung ra chiếc iPad 9 WiFi Cellular 64GB với những trang bị ngày càng vượt trội và phong cách thiết kế đậm chất iPad 10.2 Series, đây sẽ là mẫu máy tính bảng đáng cân nhắc trong phân khúc giá.', 'Màn hình: 10.2\"Retina IPS LCD #\r\nHệ điều hành: iPadOS 15 #\r\nChip: Apple A13 Bionic #\r\nRAM: 3 GB #\r\nDung lượng lưu trữ: 64 GB #\r\nKết nối:Hỗ trợ 4GNghe gọi qua FaceTime #\r\nSIM:1 Nano SIM & 1 eSIM Camera sau:8 MP #\r\nCamera trước:12 MP #\r\nPin, Sạc:32.4 Wh (~ 8600 mAh)20 W', 0, '2022-11-06 15:17:12', 0, 0),
(32, 'Laptop Asus BR1100FKA N6000/4GB/128GB/Touch/Win11 (BP1009W) ', 1, 2, 5690000, '30', '3982999', 'asus-br1100fka-n6000-bp1009w-1.jpg', 'asus-br1100fka-n6000-bp1009w-3.jpg', 'asus-br1100fka-n6000-bp1009w-2.jpg', 'asus-br1100fka-n6000-bp1009w-4.jpg', 'Laptop Asus BR1100FKA N6000 (BP1009W) sẽ là phiên bản laptop học tập - văn phòng phù hợp cho các bạn học sinh hay phụ huynh sắm cho con em mình để học tập, giải trí cơ bản hằng ngày nhờ ngoại hình gọn gàng cùng giá thành lý tưởng.', 'CPU:  PentiumN60001.1GHz  #\r\nRAM:  4 GBDDR4 (Onboard)2933 MHz  #\r\nỔ cứng:  128GB eMMC  #\r\nMàn hình:  11.6\"HD (1366 x 768)  #\r\nCard màn hình:  Card tích hợpIntel UHD  #\r\nCổng kết nối:  USB Type-CHDMILAN (RJ45)USB 2.0 #\r\nJack tai nghe: 3.5 mm1 x USB 3.2  #\r\nĐặc biệt:  Có màn hình cảm ứng  #\r\nHệ điều hành:  Windows 11 Home SL#  \r\nThiết kế:  Vỏ nhựa  #\r\nKích thước, khối lượng:  Dài 294.6 mm - Rộng 204.9 mm - Dày 20 mm - Nặng 1.4 kg # \r\nThời điểm ra mắt:  2022', 0, '2022-11-06 15:17:12', 0, 0),
(33, 'Laptop Asus VivoBook X415EA i3 1115G4/4GB/512GB/Win11', 1, 2, 10890000, '30', '7622999', 'vi-vn-asus-vivobook-x415ea-i3-eb638w-1.jpg', 'asus-vivobook-x415ea-i3-eb638w-2-1.jpg', 'asus-vivobook-x415ea-i3-eb638w-3-1.jpg', 'asus-vivobook-x415ea-i3-eb638w-4.jpg', 'Bên bạn suốt mọi chặng đường, laptop Asus VivoBook X415EA i3 1115G4 (EB638W) với thiết kế thời thượng, mang đến sức mạnh ổn định đến từ con chip tân tiến Intel Gen 11, giúp bạn xử lý nhanh gọn và hiệu quả mọi tác vụ.', 'CPU:  i31115G43GHz #\r\nRAM:  4 GBDDR4 (Onboard 4 GB +1 khe rời)3200 MHz #\r\nỔ cứng:  512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)Hỗ trợ khe cắm HDD SATA# \r\nMàn hình:  14\"Full HD (1920 x 1080) #\r\nCard màn hình:  Card tích hợpIntel UHD #\r\nCổng kết nối:  USB Type-C2 x USB 2.0HDMIJack tai nghe 3.5 mm1 x USB 3.2 #\r\nHệ điều hành:  Windows 11 Home SL #\r\nThiết kế:  Vỏ nhựa #\r\nKích thước, khối lượng:  Dài 325.4 mm - Rộng 216 mm - Dày 19.9 mm - Nặng 1.55 kg #\r\nThời điểm ra mắt:  2021', 1, '2022-11-28 15:17:12', 0, 0),
(34, 'Điện thoại Samsung Galaxy S22 Ultra 5G 128GB', 3, 1, 25990000, '30', '18193000', '2.ButSpen-1020x570.jpg', 'samsung-galaxy-s22-ultra-1-1.jpg', 'samsung-galaxy-s22-ultra-2-1.jpg', 'samsung-galaxy-s22-ultra-3-1.jpg', 'Galaxy S22 Ultra 5G chiếc smartphone cao cấp nhất trong bộ 3 Galaxy S22 series mà Samsung đã cho ra mắt. Tích hợp bút S Pen hoàn hảo trong thân máy, trang bị vi xử lý mạnh mẽ cho các tác vụ sử dụng vô cùng mượt mà và nổi bật hơn với cụm camera không viền độc đáo mang đậm dấu ấn riêng.', 'Màn hình:  Dynamic AMOLED 2X6.8\"Quad HD+ (2K+) #\r\nHệ điều hành:  Android 12 #\r\nCamera sau:  Chính 108 MP & Phụ 12 MP, 10 MP, 10 MP #\r\nCamera trước:  40 MP #\r\nChip:  Snapdragon 8 Gen 1 #\r\nRAM:  8 GB #\r\nDung lượng lưu trữ:  128 GB #\r\nSIM:  2 Nano SIM hoặc 1 Nano SIM + 1 eSIMHỗ trợ 5G #\r\nPin, Sạc:  5000 mAh45 W', 1, '2022-11-08 15:17:12', 0, 0),
(35, 'Điện thoại Samsung Galaxy S22 5G 128GB', 3, 1, 15990000, '30', '11193000', '2.Thietke-1020x570.jpg', 'samsung-galaxy-s22-den-1.jpg', 'samsung-galaxy-s22-den-2.jpg', 'samsung-galaxy-s22-den-3.jpg', 'Samsung Galaxy S22 ra mắt với diện mạo vô cùng tinh tế và trẻ trung, mang trong mình thiết kế phẳng theo xu hướng thịnh hành, màn hình 120 Hz mượt mà, cụm camera AI 50 MP và bộ xử lý đến từ Qualcomm.', 'Màn hình:  Dynamic AMOLED 2X6.1\"Full HD+ #\r\nHệ điều hành:  Android 12 #\r\nCamera sau:  Chính 50 MP & Phụ 12 MP, 10 MP #\r\nCamera trước:  10 MP #\r\nChip:  Snapdragon 8 Gen 1 #\r\nRAM:  8 GB #\r\nDung lượng lưu trữ:  128 GB #\r\nSIM:  2 Nano SIM hoặc 1 Nano SIM + 1 eSIMHỗ trợ 5G #\r\nPin, Sạc:  3700 mAh25 W', 1, '2022-11-02 15:29:42', 0, 0),
(36, 'Điện thoại Samsung Galaxy A73 5G Awesome Edition', 3, 1, 10790000, '30', '7552999', 'samsung-galaxy-a73-pubg-1-11.jpg', 'samsung-galaxy-a73-pubg-1-113.jpg', 'samsung-galaxy-a73-pubg-1-111.jpg', 'samsung-galaxy-a73-pubg-1-110.jpg', 'Samsung cho ra mắt mẫu điện thoại Samsung Galaxy A73 5G Awesome Edition - một phiên bản đặc biệt của Galaxy A73 5G, máy vẫn sở hữu một hiệu năng ấn tượng, hình ảnh sắc nét và cụm camera cho khả năng chụp ảnh cực đẹp. Đặc biệt ở phiên bản này khi mua máy bạn sẽ được tặng ốp lưng Silicone và củ sạc Samsung Type C PD 25W rất xịn sò.', 'Màn hình:  Super AMOLED Plus6.7\"Full HD+ #\r\nHệ điều hành:  Android 12 #\r\nCamera sau:  Chính 108 MP & Phụ 12 MP, 5 MP, 5 MP #\r\nCamera trước:  32 MP #\r\nChip:  Snapdragon 778G 5G #\r\nRAM:  8 GB #\r\nDung lượng lưu trữ:  128 GB# \r\nSIM:  2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G #\r\nPin, Sạc:  5000 mAh25 W', 0, '2022-11-01 15:29:42', 0, 0),
(37, 'Laptop Lenovo Ideapad 3 15IAU7 i3 1215U/8GB/256GB/Win11', 4, 2, 8813000, '30', '6169100', 'lenovo-ideapad-3-15iau7-i3-82rk005lvn-1.jpg', 'lenovo-ideapad-3-15iau7-i3-82rk005lvn-2-1.jpg', 'lenovo-ideapad-3-15iau7-i3-82rk005lvn-3-1.jpg', 'lenovo-ideapad-3-15iau7-i3-82rk005lvn-4-1.jpg', 'Laptop Lenovo Ideapad 3 15IAU7 i3 (82RK005LVN) sẽ là một người bạn đồng hành đắc lực cho các bạn học sinh, sinh viên hay dân văn phòng với ngoại hình thanh lịch, hiện đại cùng hiệu năng mạnh mẽ đến từ con chip Intel Gen 12 tân tiến.', 'CPU:  i31215U1.2GHz  #\r\nRAM:  8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời)3200 MHz  #\r\nỔ cứng:  256 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)  #\r\nMàn hình:  15.6\"Full HD (1920 x 1080)  #\r\nCard màn hình:  Card tích hợpIntel UHD  #\r\nCổng kết nối:  HDMI #\r\nJack tai nghe: 3.5 mm1 x USB 3.21 x USB 2.0USB Type-C (hỗ trợ truyền dữ liệu, Power Delivery 3.0 và DisplayPort 1.2) # \r\nHệ điều hành:  Windows 11 Home SL  #\r\nThiết kế:  Vỏ nhựa  #\r\nKích thước, khối lượng:  Dài 359.2 mm - Rộng 236.5 mm - Dày 19.9 mm - Nặng 1.63 kg  #\r\nThời điểm ra mắt:  2022', 1, '2022-11-09 15:29:42', 0, 0),
(38, 'ASUSRR', 2, 2, 12345, '0', '12345', 'images.jpg', 'hinh-anh-anime-den-hd_084759554.jpg', '305127997_416067197296521_3878160552589820445_n.jpg', '', '6', '/', 0, '2022-12-19 12:00:59', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Smart Phone'),
(2, 'Laptop'),
(3, 'Tablet'),
(4, 'Tai nghe'),
(5, 'Chuột'),
(6, 'linh54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_notes` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_name`, `fullName`, `phone`, `address`, `city`, `country`, `order_notes`) VALUES
('ThuThanh', '1', '11', '1', '', '', NULL),
('haha', 'Nguyễn Như Linh', '32131', '321321321', '3213213', '1`2', ''),
('linh123', 'Thu Thanh', '11111111111', 'HCM', 'SG', 'SG', ''),
('Hai', 'Hai', '321', '231', 'rewr', 'rew', '432545');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
