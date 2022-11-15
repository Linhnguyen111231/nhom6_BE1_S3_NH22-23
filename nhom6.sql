-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 14, 2022 lúc 04:25 PM
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
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_user`
--

DROP TABLE IF EXISTS `login_user`;
CREATE TABLE IF NOT EXISTS `login_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` int(100) NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'ASUS'),
(2, 'ACER'),
(3, 'Samsung'),
(4, 'LENOVO'),
(5, 'APPLE');

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
  `pro_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `pro_image2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pro_image3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pro_image4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `pro_image`, `pro_image2`, `pro_image3`, `pro_image4`, `description`, `detail`, `feature`, `created_at`) VALUES
(1, 'Tai nghe EP Gaming Asus Rog Cetra II Core Đen', 1, 4, 1095000, 'ep-gaming-asus-rog-cetra-ii-core-den-2-org.jpg', 'ep-gaming-asus-rog-cetra-ii-core-den-3-org.jpg', 'ep-gaming-asus-rog-cetra-ii-core-den-4-org.jpg', 'ep-gaming-asus-rog-cetra-ii-core-den-5-org.jpg', 'Củ tai có lớp vỏ nhôm nhẹ, cho khả năng chịu lực tốt, chống trầy xước. Kiểu dáng củ tai hơi nghiêng về phía trước cùng đệm tai và móc tai chất liệu LSR (cao su Silicone lỏng) kết cấu cực mềm tạo nên sự dễ chịu và phù hợp tối ưu cho trải nghiệm nghe tốt nhất trong khi chơi game. ', 'Công nghệ âm thanh:  ASUS Essence Tương thích:  PlayStation 4  PlayStation 5  Xbox Dòng X  Xbox Dòng S  Máy chơi game Nintendo Switch  Xbox 1  MacOS (Macbook, iMac)  Windows  Jack cắm:  3.5 mm Độ dài dây:  130 cm Kết nối cùng lúc:  1 thiết bị Điều khiển:  Phím nhấn Phím điều khiển:  Phát/dừng chơi nhạcTăng/giảm âm lượng Khối lượng:  18 g Thương hiệu của:  Đài Loan Sản xuất tại:  Trung Quốc Hãng:  Asus.', 1, '2022-10-25 12:37:05'),
(2, 'Chuột Không dây Bluetooth Gaming Asus TUF M4 WL ', 1, 5, 1010000, 'chuot-khong-day-gaming-asus-tuf-m4-wl-1-1.jpg', 'chuot-khong-day-gaming-asus-tuf-m4-wl-2-1.jpg', 'chuot-khong-day-gaming-asus-tuf-m4-wl-3-1', 'chuot-khong-day-gaming-asus-tuf-m4-wl-4-1', 'Chuột không dây Gaming Asus TUF M4 WL với thiết kế gọn nhẹ, nắp vỏ làm bằng polyme PBT cao cấp cho độ bền cao, cầm chắc, không mỏi tay khi thao tác liên tục.', 'Tương thích  Windows Độ phân giải mặc định  12000 DPI Cách kết nối  BluetoothĐầu thu USB Receiver Độ dài dây/Khoảng cách kết nối  15 m Đèn LED  Không có Ứng dụng điều khiển  Armory Crate Loại pin  1 viên pin AA1 viên pin AAA Khối lượng  77 g Thương hiệu của  Trung Quốc Sản xuất tại  Trung Quốc Hãng  Asus.', 1, '2022-10-25 12:44:15'),
(14, 'Laptop Acer Aspire 3 A315 57G 573F i5 1035G1/8GB/512GB/2GB MX330/Win11', 2, 2, 15990000, 'vi-vn-acer-aspire-3-a315-57g-573f-i5-nxhzrsv00b-1.jpg', 'vi-vn-acer-aspire-3-a315-57g-573f-i5-nxhzrsv00b-2', 'vi-vn-acer-aspire-3-a315-57g-573f-i5-nxhzrsv00b-3', 'vi-vn-acer-aspire-3-a315-57g-573f-i5-nxhzrsv00b-4', 'Một chiếc máy tính 128GB laptop học tập - văn phòng đáng cân nhắc dành cho mọi đối tượng đặc biệt là học sinh, sinh viên hay dân văn phòng chính là laptop Acer Aspire 3 A315 57G 573F i5 (NX.HZRSV.00B) khi sở hữu hiệu năng làm việc ổn định cùng mức giá vô cùng lý tưởng, sẵn sàng đồng hành cùng bạn trên mọi nẻo đường.  ', 'CPU:  i51035G11.00 GHz RAM:  8 GBDDR4 (Onboard 4 GB + 1 khe 4 GB)Từ 2400 MHz (Hãng công bố) Ổ cứng:  Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2TB)512 GB SSD NVMe PCIe Màn hình:  15.6\"Full HD (1920 x 1080) Card màn hình:  Card rờiMX330 2GB Cổng kết nối:  LAN (RJ45)USB 2.02 x USB 3.2HDMIJack tai nghe 3.5 mm Hệ điều hành:  Windows 11 Home SL Thiết kế:  Vỏ nhựa Kích thước, khối lượng:  Dài 363.4 mm - Rộng 250.5 mm - Dày 19.95 mm - Nặng 1.9 kg Thời điểm ra mắt:  2021', 1, '2022-10-26 15:06:16'),
(3, 'Laptop Acer Aspire 3 A315 59 314F i3 1215U/8GB/256GB/Win11', 2, 2, 12590000, 'vi-vn-acer-aspire-3-a315-59-314f-i3-nxk6tsv002-1.jpg', 'vi-vn-acer-aspire-3-a315-59-314f-i3-nxk6tsv002-3', 'vi-vn-acer-aspire-3-a315-59-314f-i3-nxk6tsv002-2', '', 'Nếu bạn đang tìm kiếm một chiếc laptop học tập - văn phòng thì laptop Acer Aspire 3 A315 59 314F i3 (NX.K6TSV.002) sẽ là sự lựa chọn lý tưởng đáp ứng đủ nhu cầu với bộ vi xử lý Intel thế hệ thứ 12 mạnh mẽ, thiết kế linh động dễ dàng mang theo mọi lúc mọi nơi.', 'CPU:  i31215U1.2GHz RAM:  8 GBDDR4 2 khe (1 khe 4 GB + 1 khe 4 GB)Từ 2400 MHz (Hãng công bố) Ổ cứng:  256 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB)Hỗ trợ khe cắm HDD SATA 2.5 inch mở rộng (nâng cấp tối đa 1 TB) Màn hình:  15.6\"Full HD (1920 x 1080) Card màn hình:  Card tích hợpIntel UHD Cổng kết nối:  LAN (RJ45)3 x USB 3.2HDMIJack tai nghe 3.5 mm Hệ điều hành:  Windows 11 Home SL Thiết kế:  Vỏ nhựa Kích thước, khối lượng:  Dài 362.9 mm - Rộng 241.26 mm - Dày 19.9 mm - Nặng 1.7 kg Thời điểm ra mắt:  2022', 0, '2022-10-25 12:44:15'),
(4, 'Laptop Acer Nitro 5 Gaming AN515 57 553E i5 11400H/8GB/512GB/4GB RTX3050/144Hz/Win11', 2, 2, 21890000, 'acer-nitro-5-gaming-an515-57-553e-i5-nhqensv006637862384235480498.jpg', '', '', '', 'Laptop Acer Nitro 5 Gaming AN515 57 553E (NH.QENSV.006) là sự cân bằng hoàn hảo của diện mạo hầm hố chuẩn laptop gaming cùng hiệu năng của chip Intel thế hệ 11 mạnh mẽ kết hợp với card màn hình rời NVIDIA sẵn sàng cùng bạn chinh phục trên mọi đấu trường ảo.', 'CPU:  i511400H2.7GHz RAM:  8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời)3200 MHz Ổ cứng:  Hỗ trợ khe cắm HDD SATA 2.5 inch mở rộng (nâng cấp tối đa 2 TB)512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB)Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1TB) Màn hình:  15.6\"Full HD (1920 x 1080) 144Hz Card màn hình:  Card rờiRTX 3050 4GB Cổng kết nối:  USB Type-CLAN (RJ45)3 x USB 3.2HDMIJack tai nghe 3.5 mm Đặc biệt:  Có đèn bàn phím Hệ điều hành:  Windows 11 Home SL Thiết kế:  Vỏ nhựa Kích thước, khối lượng:  Dài 363.4 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.2 kg Thời điểm ra mắt:  2021', 1, '2022-10-25 12:48:08'),
(5, 'Điện thoại Samsung Galaxy Z Flip4 256GB', 3, 1, 22990000, 'samsung-galaxy-z-flip4-5g-256gb637967645938385429.jpg', '', '', '', 'Tiếp nối sự thành công đến từ các thế thệ điện thoại gập đi trước, Samsung Galaxy Z Flip4 256GB đã được ra mắt với một ngôn ngữ thiết kế thân quen cùng sự nâng cấp đáng kể về độ bền cũng như nâng cấp kiểu dáng và chất liệu. Không đơn thuần là một chiếc smartphone mà đây còn được coi là món phụ kiện thời trang cao cấp đến từ nhà Samsung.', 'Màn hình:  Chính: Dynamic AMOLED 2X, Phụ: Super AMOLEDChính 6.7\" & Phụ 1.9\"Full HD+ Hệ điều hành:  Android 12 Camera sau:  2 camera 12 MP Camera trước:  10 MP Chip:  Snapdragon 8+ Gen 1 RAM:  8 GB Dung lượng lưu trữ:  256 GB SIM:  1 Nano SIM & 1 eSIMHỗ trợ 5G Pin, Sạc:  3700 mAh25 W', 1, '2022-10-25 12:48:08'),
(6, 'Điện thoại Samsung Galaxy Z Fold4 512GB', 3, 1, 41490000, 'samsung-galaxy-z-fold4-5g-512gb637969579498298187.jpg', '', '', '', 'Samsung Galaxy Z Fold4 512GB có lẽ là cái tên dành được nhiều sự chú ý đến từ sự kiện Unpacked thường niên của Samsung, bởi máy sở hữu màn hình lớn cùng cơ chế gấp gọn giúp người dùng có thể dễ dàng mang theo. Cùng với đó là sự nâng cấp về hiệu năng và phần mềm giúp máy xử lý tốt hầu hết mọi tác vụ bạn cần từ làm việc đến giải trí.', 'Màn hình:  Dynamic AMOLED 2XChính 7.6\" & Phụ 6.2\"Quad HD+ (2K+) Hệ điều hành:  Android 12 Camera sau:  Chính 50 MP & Phụ 12 MP, 10 MP Camera trước:  10 MP & 4 MP Chip:  Snapdragon 8+ Gen 1 RAM:  12 GB Dung lượng lưu trữ:  512 GB SIM:  1 Nano SIM & 1 eSIMHỗ trợ 5G Pin, Sạc:  4400 mAh25 W', 1, '2022-10-25 12:48:08'),
(7, 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 2 Pro R510N Trắng ', 3, 4, 4990000, 'tai-nghe-bluetooth-true-wireless-galaxy-buds2-pro-1.jpg', '', '', '', 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 2 Pro R510N Trắng chắc chắn sẽ cho bạn trải nghiệm sử dụng tuyệt vời nhờ thiết kế nhỏ gọn, đẹp mắt cùng nhiều công nghệ và tính năng hiện đại được tích hợp như: 360 Reality Audio, công nghệ chống ồn chủ động, công nghệ xuyên âm,...', '', 0, '2022-10-25 12:52:00'),
(8, 'Chuột Có dây Gaming Asus Keris ', 1, 5, 875000, 'chuot-co-day-gaming-asus-keris-2-1.jpg', '', '', '', 'Chuột có dây Gaming Asus Keris có kiểu dáng gọn nhẹ, thiết kế mạnh mẽ, vừa lòng bàn tay khi cầm nắm, tạo cảm giác thoải mái khi chơi game.', '', 0, '2022-10-25 12:48:08'),
(9, 'Máy tính bảng Samsung Galaxy Tab S8 ', 3, 3, 20990000, 'samsung-galaxy-tab-s8-white-1.jpg', '', '', '', 'Samsung Galaxy Tab S8 ra mắt và vẫn giữ được đặc trưng của dòng máy tính bảng Galaxy Tab S với cấu hình mạnh mẽ, màn hình hiển thị ổn cùng khả năng hỗ trợ bút S Pen hỗ trợ học tập làm việc tốt hơn.', '', 0, '2022-10-25 12:48:08'),
(10, 'Laptop Lenovo Ideapad 5 14IAL7 i5 1235U/8GB/512GB/Win11', 4, 2, 18490000, 'lenovo-ideapad-5-14ial7-i5-82sd0060vn-1.jpg', '', '', '', 'Một sản phẩm laptop học tập - văn phòng mà các bạn học sinh, sinh viên hay dân văn phòng không nên bỏ qua chính là chiếc laptop Lenovo Ideapad 5 14IAL7 i5 (82SD0060VN) khi sở hữu hiệu năng mạnh mẽ từ chip Intel Gen 12 cùng ngoại hình thanh lịch, đẹp mắt. ', '', 0, '2022-10-27 13:51:12'),
(11, 'Điện thoại iPhone 14 Pro 1TB ', 5, 1, 8990000, 'iphone-14-pro-tim-1-1.jpg', '', '', '', 'iPhone 14 Pro 1TB tiếp tục thể hiện sức hot của mình ngay sau khi ra mắt nhờ thiết kế mang những cải tiến tinh tế, hiệu năng bùng nổ cùng bộ vi xử lý A16 Bionic hoàn toàn mới cùng những cải tiến khác, sẵn sàng cân mọi tác vụ của người dùng.', '', 1, '2022-10-25 13:04:04'),
(12, 'Tai nghe Bluetooth True Wireless Gaming Asus Rog Cetra Đen ', 1, 4, 2060000, 'bluetooth-true-wireless-asus-rog-cetra-den-1-1.jpg', '', '', '', 'Tai nghe Bluetooth True Wireless Asus Rog Cetra Đen sở hữu vẻ ngoài hầm hố với điểm nhấn là logo hãng được thiết kế tinh tế. Ngoài ra, tai nghe còn có khả năng kết nối không dây độ trễ thấp, trang bị công nghệ chống ồn chủ động ANC và viên pin lớn lên đến 21.5 giờ khi sử dụng chung với hộp sạc.', '', 0, '2022-10-26 14:51:52'),
(13, 'Chuột Có dây Gaming Asus TUF M3 Đen', 1, 5, 465000, 'chuot-gaming-asus-tuf-m3-den-2-org.jpg', '', '', '', 'Chuột Gaming Asus TUF M3 Đen có thiết kế nhỏ gọn, cùng chất liệu nhựa có độ ma sát cao giúp cho việc cầm nắm chắc chắn hơn. Thiết kế công thái học phù hợp với người thuận tay phải. Trọng lượng chỉ 84 gram khá nhẹ, tiện dụng.', '', 0, '2022-10-26 14:51:52'),
(15, 'Laptop Acer Swift 3 SF314 511 55QE i5', 2, 2, 21490000, 'vi-vn-acer-swift-3-sf314-511-55qe-i5-nxabnsv003-1.jpg', '', '', '', 'Bạn cần tìm chiếc laptop mỏng nhẹ, thiết kế kim loại sang trọng cùng hiệu năng và thời lượng pin ấn tượng, tất cả đều có trong chiếc laptop Acer Swift 3 SF314 511 55QE i5 (NX.ABNSV.003). Sản phẩm phù hợp với học sinh, sinh viên, nhân viên văn phòng yêu thích sự nhỏ gọn, linh hoạt di chuyển.', '', 1, '2022-10-26 15:06:16'),
(16, 'Laptop Acer Nitro 5 Gaming AN515 45 R86D R7', 2, 2, 28990000, 'vi-vn-acer-nitro-5-gaming-an515-45-r86d-r7-nhqbcsv005-2.jpg', '', '', '', 'Thiết kế góc cạnh đầy nổi bật của chiếc laptop Acer Nitro 5 Gaming AN515 45 R86D R7 (NH.QBCSV.005) cùng hiệu năng mạnh mẽ vượt trội, hứa hẹn là người cộng sự đắc lực trên mọi phương diện, cùng bạn tạo nên thành công.', '', 1, '2022-10-26 15:11:05'),
(17, 'Điện thoại Samsung Galaxy A04s', 3, 1, 3990000, 'samsung-galaxy-ao4s-1020x570.jpg', '', '', '', 'Samsung Galaxy A04s mang nhiều cải tiến so với thế hệ Galaxy A03s, màn hình hỗ trợ tần số quét 90 Hz cho trải nghiệm mượt mà cùng camera độ phân giải lên đến 50 MP để bạn nhiếp ảnh thêm tự tin, hứa hẹn mang đầy đủ các tính năng cần thiết ở một chiếc điện thoại dòng A giá rẻ.', '', 0, '2022-10-26 15:22:15'),
(18, 'Máy tính bảng Lenovo Tab M8 ', 4, 3, 3690000, 'lenovo-tab-m8-slider-780x433-1.jpg', '', '', '', 'Lenovo Tab M8 chiếc máy tính bảng giá rẻ, cấu hình ổn, thiết kế cao cấp trong tầm giá, hoàn toàn phù hợp với các nhu cầu cơ bản như đọc báo, xem phim, lướt web hằng ngày. 128GB.', '', 0, '2022-10-26 15:22:15'),
(19, 'Máy tính bảng Lenovo Yoga Tab 11', 4, 3, 10290000, 'lenovo-yoga-tab-11637877174512721419.jpg', '', '', '', 'Tablet Lenovo mang đến cho người dùng mẫu máy tính bảng mới với tên gọi Yoga Tab 11 cùng nhiều ưu điểm vượt trội như bộ vi xử lý chuyên game của MediaTek, màn hình kích thước lớn, âm thanh nổi sống động và các chế độ tiện ích đa dạng khác mà không thua kém gì các tablet cao cấp khác.', '', 0, '2022-10-26 15:29:40'),
(20, 'Máy tính bảng Lenovo Tab M10 - Gen 2 ', 4, 3, 4290000, 'lenovo-tab-m10-gen-2-slider-780x433.jpg', '', '', '', 'Lenovo Tab M10 Gen 2 từ hãng tablet Lenovo nổi bật trong phân khúc tầm trung khi sở hữu thiết kế gọn nhẹ, hiện đại cùng khả năng kết nối mạnh mẽ, viên pin ấn tượng và cấu hình ổn định trong tầm giá.', '', 1, '2022-10-26 15:29:40'),
(21, 'Máy tính bảng Lenovo Tab M10 - FHD Plus', 4, 3, 5090000, 'lenovo-tab-m10-fhd-plus-1-1-org.jpg', '', '', '', 'Từ việc sử dụng các thiết bị điện tử đa dạng của các gia đình hiện nay, hãng máy tính bảng Lenovo đã nắm bắt được nhu cầu thiết yếu này và cho ra mắt chiếc máy tính bảng Lenovo Tab M10 - FHD Plus với những tính năng tiện ích ấn tượng, “khoác chiếc áo” của thời đại và có mức giá siêu ưu đãi.', '', 0, '2022-10-26 15:34:28'),
(22, 'Điện thoại iPhone 14 Pro Max 256GB ', 5, 1, 36990000, 'iphone-14-pro-den-1-1.jpg', '', '', '', 'Mới đây thì chiếc điện thoại iPhone 14 Pro Max 256GB cũng đã được chính thức lộ diện trên toàn cầu và đập tan bao lời đồn đoán bấy lâu nay, bên trong máy sẽ được trang bị con chip hiệu năng khủng cùng sự nâng cấp về camera đến từ nhà Apple.', '', 1, '2022-10-26 15:38:12'),
(23, 'Chuột Bluetooth Apple MK2E3 ', 5, 5, 1850000, 'chuot-bluetooth-apple-mk2e3-trang-1.jpg', '', '', '', 'Công nghệ Multi-Touch, cổng sạc Lightning.\r\nThiết kế siêu nhẹ và tính ứng dụng cao hơn.\r\nSản phẩm nhỏ gọn, trọng lượng chỉ khoảng 80 g, bề mặt đa cảm ứng giúp cho bạn sử dụng nhanh nhạy đa điểm hơn.\r\nTương thích máy Mac hỗ trợ Bluetooth với hệ điều hành MacOS.\r\nSản phẩm chính hãng Apple.', '', 1, '2022-10-26 16:30:27'),
(24, 'Tai nghe chụp tai Bluetooth AirPods Max Apple MGYH3', 5, 4, 11890000, 'bluetooth-airpods-max-apple-1-org.jpg', '', '', '', 'Sang trọng với lớp vỏ kim loại sáng bóng, bền bỉ, lựa chọn dễ dàng theo sở thích với màu sắc đa dạng \r\nTai Bluetooth AirPods Max Apple MGYH3/ MGYJ3/ MGYL3 dễ dàng cuốn hút bạn ngay từ cái nhìn đầu tiên, với nét sang trọng và cực kỳ tinh tế đến từ sự tối giản trong thiết kế và màu sắc, tạo sự khác biệt ấn tượng với các sản phẩm tai nghe hiện có trên thị trường.', '', 1, '2022-10-26 16:30:27'),
(25, 'Tai nghe nhét trong EarPods Lightning Apple MMTN2 ', 5, 4, 690000, 'tai-nghe-earpods-apple-org-md827fea.jpg', '', '', '', 'Tai nghe Earpods Apple MNHF2 với thiết kế đẹp mắt, kiểu dáng quen thuộc trẻ trung\r\n', '', 0, '2022-10-26 16:42:31'),
(26, 'Tai nghe Bluetooth True Wireless Beats Fit Pro Earbuds ', 5, 4, 4390000, 'tai-nghe-true-wireless-beats-fit-pro-earbuds-den-1.jpg', '', '', '', 'Tai nghe Bluetooth True Wireless Beats Fit Pro Earbuds mang đến một thiết kế thời thượng, công nghệ âm thanh hiện đại như: Chống ồn chủ động, Transparency, công nghệ Bluetooth,...', '', 0, '2022-10-26 16:51:58'),
(27, 'Chuột có dây Apple MB112 Trắng', 5, 5, 1690000, 'chuot-co-day-apple-mb112-org-trang.jpg', '', '', '', 'Chuột có dây Apple MB112 Trắng là một phụ kiện nhỏ nhưng nhiều sức mạnh để hỗ trợ đắc lực cho bạn trong công việc khi kết hợp sử dụng với máy tính MacBook.', '', 0, '2022-11-06 15:07:29'),
(28, 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds Live R180 Gold ', 3, 4, 1990000, 'true-wireless-samsung-galaxy-buds-live-r180-3.jpg', '', '', '', 'Samsung Galaxy Buds Live R180 Gold có tone màu khá sang trọng, quyến rũ ở cả trong và ngoài, rất phù hợp cho phái nữ. Hộp sạc của tai nghe Samsung Galaxy Buds Live dạng mở nắp vỏ sò, trọng lượng 42.2 gram nhỏ gọn, người dùng có thể đóng mở bằng một tay khá dễ dàng.', '', 1, '2022-11-06 15:07:29'),
(29, 'Tai nghe nhét tai Samsung EG920', 3, 4, 325000, 'tai-nghe-nhet-tai-samsung-eg920b-240722-120127-600x600.jpg', '', '', '', 'Thiết kế gọn đẹp, có 2 màu xanh và đỏ.\r\nDây dài 1.28 m, đệm tai có móc giúp đeo chắc chắn.\r\nÂm thanh trong trẻo, trung thực.\r\nCó mic thoại, nút chỉnh nhận cuộc gọi, chuyển bài hát, dừng/chơi nhạc, tăng/giảm âm lượng.', '', 0, '2022-11-06 15:17:12'),
(30, 'Máy tính bảng iPad Pro M2 12.9 inch WiFi 128GB', 5, 3, 31990000, 'ipad-pro-m2-wifi-xam-1.jpg', '', '', '', 'iPad Pro M2 12.9 inch WiFi 128GB là mẫu tablet mới nhất được nhà Apple phát hành vào tháng 10/2022. Thiết bị được coi là tâm điểm của giới công nghệ tại thời điểm ra mắt khi được trang bị con chip Apple M2 mạnh mẽ, bên cạnh đó sẽ là những ưu điểm khác vượt trội như: hệ điều hành iPadOS 16, quay video 4K với tốc độ khung hình 60 FPS, tần số quét 120 Hz,...', '', 1, '2022-11-06 15:17:12'),
(31, 'Máy tính bảng iPad 9 WiFi Cellular 64GB', 5, 3, 11980000, 'ipad-9-wifi-cellular-64gb637702569041807766.jpg', '', '', '', 'Sau thành công của iPad 8 thì Apple đã tung ra chiếc iPad 9 WiFi Cellular 64GB với những trang bị ngày càng vượt trội và phong cách thiết kế đậm chất iPad 10.2 Series, đây sẽ là mẫu máy tính bảng đáng cân nhắc trong phân khúc giá.', '', 0, '2022-11-06 15:17:12'),
(32, 'Laptop Asus BR1100FKA N6000/4GB/128GB/Touch/Win11 (BP1009W) ', 1, 2, 5690000, 'asus-br1100fka-n6000-bp1009w-1.jpg', '', '', '', 'Laptop Asus BR1100FKA N6000 (BP1009W) sẽ là phiên bản laptop học tập - văn phòng phù hợp cho các bạn học sinh hay phụ huynh sắm cho con em mình để học tập, giải trí cơ bản hằng ngày nhờ ngoại hình gọn gàng cùng giá thành lý tưởng.', '', 0, '2022-11-06 15:17:12'),
(33, 'Laptop Asus VivoBook X415EA i3 1115G4/4GB/512GB/Win11', 1, 2, 10890000, 'vi-vn-asus-vivobook-x415ea-i3-eb638w-1.jpg', '', '', '', 'Bên bạn suốt mọi chặng đường, laptop Asus VivoBook X415EA i3 1115G4 (EB638W) với thiết kế thời thượng, mang đến sức mạnh ổn định đến từ con chip tân tiến Intel Gen 11, giúp bạn xử lý nhanh gọn và hiệu quả mọi tác vụ.', '', 1, '2022-11-28 15:17:12'),
(34, 'Điện thoại Samsung Galaxy S22 Ultra 5G 128GB', 3, 1, 25990000, '2.ButSpen-1020x570.jpg', '', '', '', 'Galaxy S22 Ultra 5G chiếc smartphone cao cấp nhất trong bộ 3 Galaxy S22 series mà Samsung đã cho ra mắt. Tích hợp bút S Pen hoàn hảo trong thân máy, trang bị vi xử lý mạnh mẽ cho các tác vụ sử dụng vô cùng mượt mà và nổi bật hơn với cụm camera không viền độc đáo mang đậm dấu ấn riêng.', '', 1, '2022-11-08 15:17:12'),
(35, 'Điện thoại Samsung Galaxy S22 5G 128GB', 3, 1, 15990000, '2.Thietke-1020x570.jpg', '', '', '', 'Samsung Galaxy S22 ra mắt với diện mạo vô cùng tinh tế và trẻ trung, mang trong mình thiết kế phẳng theo xu hướng thịnh hành, màn hình 120 Hz mượt mà, cụm camera AI 50 MP và bộ xử lý đến từ Qualcomm.', '', 1, '2022-11-02 15:29:42'),
(36, 'Điện thoại Samsung Galaxy A73 5G Awesome Edition', 3, 1, 10790000, 'samsung-galaxy-a73-pubg-1-11.jpg', '', '', '', 'Samsung cho ra mắt mẫu điện thoại Samsung Galaxy A73 5G Awesome Edition - một phiên bản đặc biệt của Galaxy A73 5G, máy vẫn sở hữu một hiệu năng ấn tượng, hình ảnh sắc nét và cụm camera cho khả năng chụp ảnh cực đẹp. Đặc biệt ở phiên bản này khi mua máy bạn sẽ được tặng ốp lưng Silicone và củ sạc Samsung Type C PD 25W rất xịn sò.', '', 0, '2022-11-01 15:29:42'),
(37, 'Laptop Lenovo Ideapad 3 15IAU7 i3 1215U/8GB/256GB/Win11', 4, 2, 12590000, 'lenovo-ideapad-3-15iau7-i3-82rk005lvn-1.jpg', '', '', '', 'Laptop Lenovo Ideapad 3 15IAU7 i3 (82RK005LVN) sẽ là một người bạn đồng hành đắc lực cho các bạn học sinh, sinh viên hay dân văn phòng với ngoại hình thanh lịch, hiện đại cùng hiệu năng mạnh mẽ đến từ con chip Intel Gen 12 tân tiến.', '', 1, '2022-11-09 15:29:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Smart Phone'),
(2, 'Laptop'),
(3, 'Tablet'),
(4, 'Tai nghe'),
(5, 'Chuột');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eMail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
