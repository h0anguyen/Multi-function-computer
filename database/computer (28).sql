-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 29, 2024 lúc 02:37 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `computer`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `builds`
--

CREATE TABLE `builds` (
  `buildsId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(1000) NOT NULL,
  `categoryInformation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`categoryId`, `categoryName`, `categoryInformation`) VALUES
(2, 'PC Văn Phòng', 'PC Văn Phòng được sử dụng cho các đối tượng nhân viên văn phòng nhằm đáp ứng các công việc văn phòng. Các công việc văn phòng thường có lượng công việc thấp với các phần mềm văn phòng nhẹ nên cấu hình của máy tương đối thấp.'),
(3, 'PC Gamming', 'PC Gamming chuyên dụng được thiết kế để chơi các trò chơi trên PC ở tiêu chuẩn cao. PC Gamming thường khác với PC cá nhân phổ thông ở chỗ sử dụng card đồ họa hiệu suất cao, CPU có số lượng lõi cao với hiệu suất thô và RAM hiệu suất cao hơn.'),
(4, 'PC Cao Cấp', 'PC Cao cấp thường được gọi là \"PC Hi-End\"\r\nPC Hi-End là một chiếc máy sử dụng những linh kiện cao cấp tốt nhất nên giá của nó từ cao đến rất cao,bù lại cấu hình hoàn toàn vượt trội.'),
(5, 'CPU-vi xử lí', 'CPU là mạch điện tử thực hiện các câu lệnh của chương trình máy tính bằng cách thực hiện các phép tính số học, logic, so sánh và các hoạt động nhập/xuất dữ liệu cơ bản từ mã lệnh được định sẵn trong một máy tính'),
(6, 'Mainboard-Bo mạch chủ', 'Mainboard-Bo mạch chủ là một bảng mạch in đóng vai trò liên kết các thiết bị thông qua các đầu cắm hoặc dây dẫn phù hợp. Nhờ có bo mạch chủ, các linh kiện mới có thể hoạt động và phát huy tối đa công năng đạt tới hiệu quả như mong muốn của chiếc máy tính.'),
(7, 'Ram-Bộ nhớ đệm', 'Ram-Bộ nhớ đệm là những dữ liệu được lưu trữ tạm thời do quá trình hệ điều hành hoặc ứng dụng hoạt động tạo ra giúp thuận tiện hơn cho người dùng trong việc khai thác và sử dụng các chức năng cụ thể'),
(8, 'HDD/SSD-Ổ cứng', 'Ổ đĩa thể rắn (SSD) và ổ đĩa cứng (HDD) là các thiết bị lưu trữ dữ liệu.'),
(9, 'VGA-Card màn hình', 'VGA-Card màn hình có nhiệm vụ xử lý hình ảnh trong máy tính như màu sắc, độ phân giải, độ tương phản cũng như chất lượng hình ảnh hiển thị trên màn hình.'),
(10, 'Card Mạng', 'Card Mạng là một bản mạch cung cấp khả năng truyền thông mạng cho một máy tính. Nó còn được gọi là bộ thích nghi LAN, được cắm trong một khe của bản mạch chính và cung cấp một giao tiếp kết nối đến môi trường mạng.'),
(11, 'PSU-Nguồn', 'PSU-Nguồn là phần cứng của chiếc máy tính bàn, nó có nhiệm vụ rất quan trọng. Bộ nguồn nhận chuyển đổi dòng điện AC thành DC, sau đó cung cấp năng lượng tới những linh kiện máy khác.'),
(12, 'Bộ tản nhiệt', 'Bộ tản nhiệt là bộ trao đổi nhiệt được sử dụng để truyền nguồn năng lượng nhiệt từ vật này sang vật khác với mục đích làm mát hoặc làm nóng(sưởi ấm).'),
(13, 'Case', 'Case là một thiết bị dùng gắn kết và bảo vệ các thiết bị phần cứng trong máy tính, đồng thời cũng có vai trò tản nhiệt cho máy tính.'),
(14, 'Fan case ', 'Fan case là loại quạt thường được gắn bên trong những chiếc thùng (Case) máy tính tạo ra khí đối lưu giúp bên trong máy mát hơn tránh hiện tượng quá nhiệt'),
(15, 'Màn hình máy tính', 'Màn hình máy tính là thiết bị điện tử gắn liền với máy tính với mục đích chính là hiển thị và giao tiếp giữa người sử dụng với máy tính.'),
(16, 'Bàn phím', 'Bàn phím là một thiết bị kiểu máy đánh chữ sử dụng cách sắp xếp các nút hoặc phím bấm để hoạt động như đòn bẩy cơ học hoặc công tắc điện tử. Sau sự suy giảm của thẻ đục lỗ và băng giấy, tương tác qua bàn phím kiểu teleprinter trở thành phương thức nhập liệu chính cho máy tính. '),
(17, 'Loa/Tai nghe', 'Loa/Tai nghe là thiết bị truyền dữ liệu dưới dạng âm thanh từ máy tính.'),
(18, 'Chuột', 'Chuột máy tính là một thiết bị ngoại vi của máy tính dùng để điều khiển và làm việc với máy tính. Để sử dụng chuột máy tính nhất thiết phải sử dụng màn hình máy tính để quan sát toạ độ và thao tác di chuyển của chuột trên màn hình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `credits`
--

CREATE TABLE `credits` (
  `creditCardCode` char(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `credits`
--

INSERT INTO `credits` (`creditCardCode`, `amount`) VALUES
('12345612345', 2859206832222),
('43725734579', 955000012122);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `customerName` char(50) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` char(50) NOT NULL,
  `address` char(255) NOT NULL,
  `password` char(40) NOT NULL,
  `gender` char(10) NOT NULL,
  `birthday` date NOT NULL,
  `customerImg` text NOT NULL,
  `creditCardCode` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customerId`, `customerName`, `phone`, `email`, `address`, `password`, `gender`, `birthday`, `customerImg`, `creditCardCode`) VALUES
(0, 'Admin', '', 'admin@gmail.com', '', '5136b96817648b5b81008f6a984284a7', '', '0000-00-00', '', ''),
(1, 'Delivery', '0111111111', 'delivery1@gmail.com', '', '7108537956afa2a526f96cc9da7b0c36', '', '0000-00-00', '', ''),
(92, 'Nguyễn Đăng Hòa', '0796668111', '1@gmail.com', 'đường Dũng Sĩ Điện Ngọc-Điện Ngọc,Quảng Nam', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00', '', '12345612345'),
(97, 'Nguyễn Đăng Hòa', '0796661111', '22@gmail.com', '12 Trần Hưng Đạo-Đà Nẵng', '96e79218965eb72c92a549dd5a330112', '', '0000-00-00', '', ''),
(98, 'Đặng Văn Kiệt', '0126370591', 'den@gmail.com', '12/Bà Huyện Thanh Quan-Thành phố Hồ Chí Minh', 'd37cfcf7c6ee9e699e215d64327021ce', '', '0000-00-00', '', ''),
(99, 'Đen Hòa', '0796668113', 'hoaden12@gmail.com', '-Hà Dừa/Điện Ngọc/Điện Bàn/Quảng Nam', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `historysearch`
--

CREATE TABLE `historysearch` (
  `id` int(11) NOT NULL,
  `search` varchar(225) NOT NULL,
  `customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `historysearch`
--

INSERT INTO `historysearch` (`id`, `search`, `customerId`) VALUES
(3, 'OFFICE', 98),
(4, 'OFFICE', 98),
(5, 'OFFICE', 98),
(6, 'OFFICE', 98),
(7, 'OFFICE', 98),
(8, 'Case', 98),
(9, 'Gamming', 97),
(10, 'OFFICE', 0),
(11, 'OFFICE', 99),
(12, 'Case', 99);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mailbox`
--

CREATE TABLE `mailbox` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` char(50) NOT NULL,
  `phone` char(10) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mailbox`
--

INSERT INTO `mailbox` (`id`, `name`, `email`, `phone`, `note`) VALUES
(1, 'Nguyễn Đăng Hòa', '22@gmail.com', '0796668914', 'Cần cập nhật thêm thông tin sản phẩm\r\n'),
(2, 'Nguyễn Đăng Hòa', '22@gmail.com', '0796668914', 'Cần cập nhật thêm thông tin sản phẩm\r\n'),
(3, '', '1@gmail.com', '', 'Đăng kí email nhận ưu đãi và hỗ trợ\r\n'),
(5, 'Nguyễn Đăng Hòa', '22@gmail.com', '0796668914', 'Tôi muốn cửa hàng tư vấn chi tiết hơn '),
(6, 'Nguyễn Đăng Hòa', '22@gmail.com', '0796668914', 'Giao diện cần cải thiện hơn\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderDetailId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`orderDetailId`, `orderId`, `productId`, `quantity`, `price`) VALUES
(1, 9, 170, 1, 4490000),
(2, 9, 145, 1, 995000),
(3, 9, 126, 3, 3390000),
(4, 10, 268, 2, 750000),
(5, 10, 207, 1, 749000),
(7, 11, 15, 1, 4400000),
(14, 14, 13, 1, 6265000),
(15, 14, 193, 2, 790000),
(17, 15, 9, 1, 7600000),
(18, 15, 5, 1, 3900000),
(20, 16, 9, 1, 7600000),
(21, 16, 13, 2, 6265000),
(23, 17, 103, 1, 23050000),
(24, 17, 9, 2, 7600000),
(25, 17, 102, 1, 24399000),
(26, 17, 101, 2, 25550000),
(30, 18, 9, 1, 7600000),
(31, 18, 15, 1, 4400000),
(33, 18, 14, 1, 5650000),
(34, 19, 14, 1, 5650000),
(35, 20, 5, 1, 3900000),
(36, 21, 242, 1, 22799000),
(37, 21, 174, 1, 5390000),
(39, 22, 243, 1, 29050000),
(40, 22, 6, 1, 5190000),
(42, 23, 241, 1, 15450000),
(43, 23, 15, 1, 4400000),
(45, 24, 240, 1, 23100000),
(46, 25, 5, 1, 3900000),
(47, 26, 104, 1, 67550000),
(48, 26, 227, 1, 3730000),
(49, 26, 211, 1, 6250000),
(50, 26, 202, 1, 615000),
(51, 26, 194, 1, 1350000),
(52, 26, 267, 1, 230000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `paymentMethods` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`orderId`, `customerId`, `date`, `status`, `paymentMethods`) VALUES
(9, 92, '2024-04-02 19:45:58', '2', 'thanh toán khi nhận hàng'),
(10, 92, '2024-03-01 19:57:52', '2', 'thanh toán khi nhận hàng'),
(11, 92, '2024-04-02 00:13:31', '2', 'thanh toán khi nhận hàng'),
(14, 97, '2024-04-03 21:28:19', '2', 'thanh toán khi nhận hàng'),
(15, 97, '2024-04-03 21:29:25', '1', 'thanh toán khi nhận hàng'),
(16, 97, '2024-04-03 21:32:04', '2', 'thanh toán khi nhận hàng'),
(17, 97, '2024-04-03 21:53:24', '2', 'thanh toán khi nhận hàng'),
(18, 97, '2024-04-03 21:57:11', '1', 'thanh toán khi nhận hàng'),
(19, 97, '2024-04-03 22:10:11', '1', 'thanh toán khi nhận hàng'),
(20, 97, '2024-04-03 22:10:46', '1', 'thanh toán khi nhận hàng'),
(21, 98, '2024-04-04 09:52:28', '2', 'thanh toán khi nhận hàng'),
(22, 98, '2024-04-04 09:59:37', '2', 'thanh toán khi nhận hàng'),
(23, 92, '2024-04-12 13:58:29', '0', 'Thanh toán bằng thẻ tín dụng'),
(24, 92, '2024-04-12 13:58:58', '1', 'thanh toán khi nhận hàng'),
(25, 92, '2024-04-12 14:10:36', '1', 'Thanh toán bằng thẻ tín dụng'),
(26, 99, '2024-04-29 19:35:54', '0', 'thanh toán khi nhận hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(1000) NOT NULL,
  `information` text NOT NULL,
  `price` double NOT NULL,
  `priceOld` double NOT NULL,
  `categoryId` int(11) NOT NULL,
  `productlmgMain` text NOT NULL,
  `availableQuantity` int(11) NOT NULL,
  `numberViewed` int(11) NOT NULL,
  `purchases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`productId`, `productName`, `information`, `price`, `priceOld`, `categoryId`, `productlmgMain`, `availableQuantity`, `numberViewed`, `purchases`) VALUES
(5, 'OFFICE 1', 'CPU:3000G-MAIN:A320-RAM:8GB-SSD:128GB-VGA:RADEON-PSU:350W-CASE:ROSI', 3900000, 4900000, 2, 'OFF-1.png', 40, 20, 1010),
(6, 'OFFICE 2', 'CPU:G6405-MAIN:H410-RAM:8GB-SSD:128GB-VGA:Intel UHD-PSU:350W-CASE:ROSI', 5190000, 6190000, 2, 'https://sp-one.vn/Content/uploads/2020/07/of2-1.png', 41, 44, 1009),
(8, 'OFFICE 3', '\r\nCPU:i3 10105-\r\nMAIN:H410-\r\nRAM:8GB-\r\nSSD:128GB-\r\nVGA:UHD-\r\nPSU:350W-\r\nCASE:ROSI', 6050000, 7050000, 2, 'https://sp-one.vn/Content/uploads/2020/07/of3-1.png', 0, 8, 1050),
(9, 'Office 4', 'CPU:Intel Core i5-11400-\r\nMAIN:H510-\r\nRAM:8GB-\r\nSSD:120GB SATA 3-\r\nVGA:UHD-\r\nPSU:350W-\r\nCASE:ROSI', 7600000, 8600000, 2, 'https://sp-one.vn/Content/uploads/2020/07/OF4-1.png', 0, 5022, 1050),
(10, ' OFFICE 5', '\r\nCPU:AMD Ryzen 3 3200G-\r\nMAIN:A320-\r\nRAM:8GB-\r\nSSD:128GB SATA 3-\r\nNGUỒN:350W-\r\nCASE:ROSI', 5500000, 6500000, 2, 'https://sp-one.vn/Content/uploads/2021/03/OFF-5-1.png', 41, 5012, 1009),
(11, 'Office 6', 'CPU:i3 12100-MAIN:H610-RAM:8GB-SSD:128GB-VGA:UHD-PSU:350W-CASE:ROSI', 6300000, 7300000, 2, 'https://sp-one.vn/Content/uploads/2021/05/OFF-6.png', 46, 5039, 1004),
(12, 'Office 7', 'CPU:i5 12400-\r\nMAIN:H610-\r\nRAM:8GB-\r\nSSD:128GB-\r\nVGA:UHD-\r\nPSU:350W-\r\nCASE:ROSI', 8190000, 9190000, 2, 'https://sp-one.vn/Content/uploads/2022/02/OFF-7.png', 0, 5005, 1050),
(13, 'OFFICE 8', 'CPU:Ryzen 4600G-\r\nMAIN:B450-\r\nRAM:8GB- \r\nSSD:128GB SATA 3-\r\nVGA:Vega 7-\r\nPSU:350W-\r\nCASE:ROSI', 6265000, 7265000, 2, 'https://sp-one.vn/Content/uploads/2022/09/PC-SP_cover-1@1x_1.jpg', 41, 8, 1009),
(14, 'OFFICE 9', 'CPU:R3 4300G-\r\nMAIN:A320M-\r\nRAM:8GB-\r\nSSD:128GB-\r\nVGA:Radeon ™ VGA-\r\nPSU:350W-\r\nCASE:ROSI', 5650000, 6650000, 2, 'https://sp-one.vn/Content/uploads/2023/04/PC-SP_cover-1@1x_1.jpg', 43, 5011, 1007),
(15, 'OFFICE 10', 'CPU:G5905-\r\nMAIN:H410-\r\nRAM:8GB-\r\nSSD:128GB-\r\nVGA:Intel UHD-\r\nPSU:350W-\r\nCASE:ROSI', 4400000, 5400000, 2, 'https://sp-one.vn/Content/uploads/2024/02/PC-SP_cover-1@1x_1.jpg', 41, 5012, 1009),
(18, 'FAN CASE MAGIC ULTRA CK 12025R12 MOLEX RGB WHITE', 'Thương hiệu: Magic-\r\nKích thước: 120 x 120 x 25 (mm)-\r\nKiểu vòng bi: Vòng bi thủy lực tuổi thọ cao-\r\nTốc độ quạt: 900RPM-\r\nĐiện áp hoạt động: DC 8.0V ~ 13.8V-', 100000, 1100000, 14, 'https://sp-one.vn/Content/uploads/2024/01/Pic-1-white-1.png', 50, 5000, 1000),
(19, 'Infinity Kaze A-RGB 1500RPM 120x120x25 Fan', 'Kích thước 120x120x25-\r\n11 cánh-\r\nCánh nhựa trắng-\r\nLed A-RGB, Led trục, rực rỡ-\r\n1500RPM-\r\nCó thể gắn case, gắn tản-', 100000, 1100000, 14, 'https://sp-one.vn/Content/uploads/2020/04/10766.png', 50, 5000, 1000),
(20, 'Infinity Kaze V2 A-RGB 1500RPM 120x120x25 Fan', 'Kích thước 120x120x25-\r\n11 cánh-\r\nCánh nhựa trắng-\r\nLed A-RGB, Led trục, rực rỡ-\r\n1500RPM-\r\nCó thể gắn case, gắn tản-', 100000, 1100000, 14, 'https://sp-one.vn/Content/uploads/2020/10/1-5.jpg', 50, 5000, 1000),
(21, 'XIGMATEK X22F', 'Nhà sản xuất: Xigmatek-\r\nTình trạng: Mới-\r\nBảo hành: 6 tháng-', 100000, 1100000, 14, 'https://sp-one.vn/Content/uploads/2020/06/10769.png', 50, 5000, 1000),
(22, 'Infinity Kaze 1800RPM 120x120x25 Fan', 'Kích thước 120x120x25-\r\n11 cánh-\r\nCánh nhựa trắng-\r\n1800RPM-\r\nCó thể gắn case, gắn tản-', 100000, 1100000, 14, 'https://sp-one.vn/Content/uploads/2023/02/Infinity-Kaze-12CM-1800-rpm-No-Led-Fan-Case-03.jpg.webp', 50, 5000, 1000),
(23, 'Infinity Royal – 3 Zone ARGB Fan', 'Tình trạng: Mới 100%-\r\nBảo hành: 12 Tháng-\r\nXuất xứ: Chính hãng-\r\nThương hiệu: Infinity-', 100000, 1100000, 14, 'https://sp-one.vn/Content/uploads/2023/11/Infinity-Royal-3-Zone-ARGB-Fan-H1.jpeg', 50, 5000, 1000),
(25, 'FAN CASE MAGIC ULTRA AAF12025R12 ARGB WHITE', 'Thương hiệu: Magic-Kích thước: 120 x 120 x 25 (mm)-Kiểu vòng bi: Vòng bi thủy lực tuổi thọ cao-Màu sắc LED: Hỗ trợ RGB có thể định địa chỉ M / B Sync-', 135000, 1135000, 14, 'Pic-1-white-1.png', 50, 5000, 1000),
(26, 'FAN CASE MAGIC ULTRA AF12025R12 BLACK ARGB', 'Thương hiệu: Magic\r\nKích thước: 120 x 120 x 25 (mm)\r\nKiểu vòng bi: Vòng bi thủy lực tuổi thọ cao-\r\nMàu sắc LED: Hỗ trợ RGB có thể định địa chỉ M / B Sync-\r\nVị trí LED: Hub-\r\nTốc độ quạt: 900RPM-\r\nĐiện áp hoạt động: DC 8.0V ~ 13.8V-\r\nPower Draw – LED: 5V 0.1A 0.5W-\r\nPower Draw – FAN: 12V 0.18A 2.16W-\r\nĐộ ồn: <18.71 dBA-\r\nLuồng không khí: 40.60 CFM-\r\nÁp suất không khí: 0.539 mmH2O-\r\nTuổi thọ: 30,000 giờ-\r\nMàu sắc: Trắng/Đen-\r\n', 135000, 1135000, 14, 'https://sp-one.vn/Content/uploads/2024/01/Pic-1-3.png', 38, 5001, 1012),
(27, 'FAN CASE ID-COOLING ZF-12025 Pastel (Green/Pink/Blue)', ' Kích thước: 120×120×25mm(PWM)-\r\nCân nặng: 150g-\r\nĐiện áp định mức: 12VDC (PWM)-\r\nĐiện áp hoạt động: 10.8～13.2VDC-\r\nĐiện áp bắt đầu:7VDC-\r\nRated Current: 0.32±10%A-\r\nNguồn đầu vào: 3.84W-\r\nLoại vòng bi: Hydraulic Bearing-\r\nTốc độ quạt: 900~2000±10%RPM-\r\nÁp xuất khí tối đa: 2.13mmH2O-\r\nLựợng gió tối đa: 55.2CFM-', 239000, 1239000, 14, 'https://sp-one.vn/Content/uploads/2021/02/zf12025-1.jpg', 50, 5000, 1000),
(28, 'Tản nhiệt khí Segotep Frozen Tower TS4', 'Hỗ trợ socket: Intel LGA- 1700/2066/2011/1200/1151/1150/1155/1156 - AMD AM4-\r\nĐiện áp: 12VDC-\r\nKích thước: 130mm*92mm*78mm-\r\nChất liệu : Lá tản bằng 99.9% aluminium 4 Ống tản bằng đồng nguyên chất-', 430000, 1430000, 12, 'https://sp-one.vn/Content/uploads/2022/08/Tan-nhiet-khi-Segotep-Frozen-Tower-TS4-songphuong.vn-02-600x600-1.jpg', 50, 5000, 1000),
(29, 'Tản nhiệt CPU CoolerMaster Hyper H410R', '', 440000, 1440000, 12, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEhUSExIVFRUVFRUXFxYXGBgXFRgVFhUXGBgWFxcYHiggGBslHRUVIjEiJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGyslICUwLS8tLS0tLS0vLS8tLS0tLy0vMC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAOEA4QMBIgACEQEDEQH/xAAcAAEAAgIDAQAAAAAAAAAAAAAABQYDBAECBwj/xABWEAABAwEEBgUGBg0HDAMAAAABAAIDEQQSITEFQVFhcZEGBxMigTJSobHB0UJTYnOS8BQWIyQ1Q3KTorKz4eIVJTPC0tPxNFRVY2R0goOElKPDF0RF/8QAGgEBAAIDAQAAAAAAAAAAAAAAAAMEAQIFBv/EADMRAAIBAgQEBAUEAgMBAAAAAAABAgMRBCExQRJRYZEFcYHwEyKhsdEUQsHhMvE0UpIz/9oADAMBAAIRAxEAPwD3FERAEREAREQBERAEUXb9KtjdcDS99x0ha3MNbhzJqBXO6Vu2edsjWvY4Oa4BzSMiCKghYUk20ZcWkmZ0XC5WTARcLlAEXCIDlFwlUByijNK6UEIHcc+t4uu07rGirnmurVxICkgsXzsZs7XOURFkwEREAREQBERAEREAREQBERAF5r0z6fTR2j7EsjLzw65eDTI90lKlsbBsxqSDkcgKr0kr5w6R6QIttofESb0loF5pFDHI/EA1ycGjEaqjIoCWl6x9Jg0EorjWscQoWkCnk79WG9ZW9YeksKzCp1COI/1fWqc+QDE+UchlQcNQ+u9bNl2oCyM6W6TEjpGzMvPu1JbHk0UA/ojQe9drD0q0tEwMjliuguIBDfhOLjT7lgKk4aslFxFYrXpdkeA77tgwA/Kdq4CpWMkSKEpZL3/osY6Z6a1Ph5M/sLTtvWNpaKt6SCo+COyL/ogVVTtFunl8p9xuxtWj0Yu8TRYGRRtGLb3iQOQHtWLt6GeBLV9vy8u10WuPrX0iRUyMbuMba/ogrt/8qaS+Ni/NfwqpGWL4kcynbRfEj6RS7MqEevv0LY7rV0kPxkX5o+wLrD1t6Sc66HQg/LayMHgXkVVaa+P4r0lZAyJ34ojxP+CxxEqwyksrl2Z0504RW5Z6HI9wj0OXcdO9M6xZ+Q96obIXRmsL3x7gRdPFvknkpCDTr24Tsw89g/WZ7W14LKkjWeFmupOWjpVpRxlLjDWZlx3yWXbtGYd3MnXiTwW2esjSbALxh43Kiu81GPgods7XtvMcHA6waha1pyWUkQNMnZetPSTTjHHTaGj1XluWTrUtYd32RvaCAaRva2prRvaVLQ40NAdioL5AMDlt2buC7GYtY5neoQASBmzA3TqJBa0j9wrk1PpLQmlGWqFk8fkvGRzBBoWngQpFUTqitTXWNzA4FzZSS3WGua26abDR3Iq9oAiIgCIiAIiIAiIgCIiA09LQF8ErBm6KRo4uaR7V8yS2gMbfOtoAGsnUF9Tr5R6Zw9nanxDKOSVo4NeWj1IDBDKXG8cypSy0cKnyd+vedyiLI2uByKn9AwCdxa6jg1rzdvXb5APfe4HuRNpeJzNA0YkLSpNQV2WMPRdWVl69DRtOkHO7rXXW5XvhPxoKbBtOfBakQo6g1ZUw9a1nw3JAwmtHChP1wzUi1ve/jDvVkq8arc11O/Lw+EaE1a0o65372O7Ad/oSRv1qtuOHDJHx8VPxHJjhm9iPMK7CzrbpuPNY5OKjczp4XARnqYjGBqHgt3RFh7WWOMYX3NbXZVwbXfmsUUROAV/6vuiUjpWWmZhbEyjm3qi+4ULSAcbtcanA0GeKrOvKUuCGp1q2BwuDoOtV2Ttpm9lbchukvR02OgcQb0kjW0FO627Rx3m8OGKrUgHmYcae1X/rN6QQ2hzIou92ZdWQZFxwo06xvVAmmAzKip1JRlJLPN2d9v60667ljC4f9ThITxS4XytFLplblYx2fRs1O1iwxAc6ouY5GVhPdacq5bwVsuJcCHBzJGmjmuzadlMi07dfFaLNOviIc0EHURvzB2g5EHArVt+kZS9jy7utbdbhg0VJ7P8AJxwGrVkrNGtO6UkcTxDw+jZyovTzvnzv9HffPS5ltbq11EZj65hdbDa6/c3HGhu7xs4roZxI28M8iNh1j1KJtbiDUYEYjirp5qSsz2nqagP2TI6uDYLp2Vc9tP2bl6+vNOpOzfcJ5/PdGz820u/9voXpaGoREQBERAEREAREQBERAF8q9P8A8IWj56b9q5fVS+VOn34QtHz037V6AjGkkXRmdmdFYNHRGJjmNzddvnMltS4N4VoabQNijdC2eveNK6sznX1AelTN2ld52U9Kq1rSyZ6nwWg4zjK29vW1/plbuiD0tFjeXbR8t4gns73wrrXenapG0w3goiA9nIK5HDx1FQYeak7HR8XoTpcU1pLXzJ6vD0rCTw9KXlw0q4ebjK+tuxyfD0hGRF5AGPpNTqwWaCG+4NBzIFSaNxNM9QUzpW0RWF5hYwSzNrekcA5jXHH7mwYHV3n14BUq1X9kdT0OCTo2nNaq6XPq3sk7c29kyw6K0LZrA0TW66+U0LLO2hcNYL2nCvHAb1F9J+nU9oqwHsojhcaaOI+Uc3cBQKi2vSb63n1qSSScKnatN1ofJg0YbTko1Sk/lWm/98/t0JHPDwn8as/iVNrqyjv8sdl1d31JC0W2gwWgy0PfUMbX5ZyXez6PANXd4+jkpNrMMByVmFBJZlDE+K1qr+XIgxZs6vqVv2A9w8fYNq6hlSc8jmKLtYfJNdpzUkUuIrYhWw6lbJmlPH2brw8h2FNlB7PUStO2hTMkYcC3DHI5UP1w8VCzimGz1fX1Kwjh1M1c+jupn8Hf81/6rFe1Qupb8Hf85/6rFfVkgCIiAIiIAiIgCIiAIiIAvlXp20nSM4GueUf+V6+qSvmDpfDXSFodsntWumUmB/SWGb0/8kaeiH4v2AgbNo969N6H6J0eYxNapoak4MMgB/4m1rReX6MjLWkuBxpSpvHmpqzeScsPkn2KpXoqdny22fn7s90eh8PrSnfDKbipNZx1Vlb67l46f9E2RtFpszR2RoHNbi1p1OHyTlyXmGkrNVeh9AukIY82Wc3rPNVhDvJa53d15N1HwKgul2gzZp3xOxaDea7zmEm6eOo7wVQXyyvHLpy/rl2ztc72HU0pYHEPidrwk/3R/K36dysWK0Fzca3hgcs1sSykA3WFxFB8lpNaBx1ZHkVEuq2TAVvmnjtW1K6gu7fr9fBdNS40rHmqkf0spSktMl1b09N29vOxilc939I8v3DBo965EJ1M/RWWzx61suaNnoqplFLJI5NTE1qkuKcm35s0r5GBw+uw4FdrMy7iKXc6DDeaA5Hdr1LNIzDEfX2LUrTA4jWNoWHBbaklPGTTSqNyj1ea8iRwOI1rIBgtTRLTV8RxpRzN7TiDyW+fDmouLNrkdZ4a8I1Y5xlp57ojK0J8nLestiHdPH2BYneUc/UtjR/knieOQWFbiZLiINYWKfMxg8eYKhrZiL2sEtNOY9CnHDFRboHObI3vY3S0UoK1pWvip2cLh1Xv3c9/6lD/ADaPnpPUxX9ULqYbTR5Gy0SjldCvq2KwREQBERAEREAREQBERAF8zdLB9+2rdaZxzk/cvplfMnS8fftqwztNpx4SD3rDNoOzMbhQAY+hbej/AB50WlMB8nkVnsjhQ5citJq6L+EqcFS5ryTlrnUzqc8fSrvBpFmkLI2F5++oiBCSQDI05xkn4Q9g3rz21O7ztx4LZ0JM5rrwOIoa7D4LmzoSd3B2Z66piYTjCUnZrOL5P8PSS5ehr22Ls5a0IGquYce7T9IrWlPeO6o5YK89IdHR2qCS2sexj2x3pWHBxlBBc+NutrwC7cbyokpqajI4jxxVrCTjO/NWuuR5zxqd3GPV+jdu+W6yeu5uQmg4AU4ux9VFySMO+RjTP2bFjs7sPAA+GS2WHhtrkrhwzq8VBGui0Js67QDzAK3XV3LSmOPo5YICQ0Jb32eZk7KBwjkbU0dTM1AOFQrBpaEPY20xCjZKh7BkyUCrmgfBa6oc0byPgqrxt7ldg9LsfUQrH0N0m1jgyYVgkoJW0rUEEXhrDmk3gRjmuViElVdSOTVl5rqez8NotYSPy3dm7btcvPeL55ZJsrTRiTh44resLO6dhPhkFYumHRZ1lfXy4n4skFO8MwDTCtOahLC3uuGGe3FbUqnFUfZ+/fMnxNKnUwnHSd4vNe9ns1szUc3FZHt70ZxzpycD7UIxXLyLzOI2nWNS6B5KcbXPZups/eDv95m/qq9qhdTX+QO/3mbd5upX1blIIiIAiIgCIiAIiIAiIgC+XemMv84Wlv8Ar7SeclPYvqFfLfTNn84Wp4+BPMTwMrgfRVYehvTa4lfy75GtYLWZGndQZ01b8lI2bx+lVRNgjpf2EgiovYEV1eKkbMNw+gQsMmhkzQnPedx2Gua2NGnHwWvKO87PPbv9CzaOz8FFbM6cpy+HElC6uBy15KuiEsJjPwcWk+adR8VNk8FinyqCAQCMswcwdqwo8LbjuZnWjXoqnVv8ujWyeq/le2o2GWm5bQlB1Dm1al1pNL4afNOHIrh8LhmDyUnxY6PI578Pr24ox4o817uvJmxNOMh6FgjYXOAaLxOQGtdmWOUtLmxPcBmbpawV2k4DmuRY3jGQ0vYFrcyNnBayrR0i1cnw3hlab4qkWorXb0vt9+l7GOWc0aG4gHE+e/OvDNSFieB4rQqKFjiKHEEaj7FxYrTUqrWp/LdHovD8W41eF+nK1sl2PYOitqZb7G6wTGkkYvQuOdAKDjdrQjzTuVRt2hLRZnlksbhWoFG4OI1tOsKL0ZbHsc2RjiHNIIcMwQvQ5Osx5gDRGBNkX4FlRra0692pVac7Pr5XuuWq9Hysnoi1Ww2Iozl+ngp06mbi3bhb1aelnq8nnseczRkHI+hQVvtzrj3YCl0Ch11rj4BWW32t8znSSEuccbzsycB+5VO2RlwEe58hwpgAQ3L64rpUZ8SzPOeJ4X9NO173Sfv3mfQXUq6ujq7Z5Tzuq/Lz/qQ/Bg+ek/qr0BWDhBERAEREAREQBERAEREBwV80aeYDpG2A5GaUc5Xr6XK+a9N/hG2fPyftZECIayjs3PhdxBrdwHk48KjiFtWc4+59fWsulrCXsD2ir2DLzm5kcdY4LWsEgeKgjeLoA9C0ZaiuLNe/9/k071XkfK37duS27Bmcs+J5rSvhsjr2Vc9WexBbjV3ZA8Xju+AUHFab5HcdHiw0Utb6b+8iWnkDRVxoFHyWtzsGCg2nPwC6Q2UuN5xLjtP1wUpZ7FiAASa0AGJJOoUzKhqYnkXMH4K5fNUIoWMnE4k6ypfRXRp8oLvJjZS/I51GNByqaEk4ZCp3K86K6Dtjj+yLe/sYx+Lye7YDXInYKngofpR0gbMGwwR9lZ4z3WtADi7EX3HNxoTz2qBzm/N6X+/T19C5CNCpL4eHXEl/lL9q6L/s+iyWrdsjDJpGOzxOs9mJIeAJpHYF4GQY34Lca4947slAuK7gbisZCs0acY+e73Ofj5SzS0++137SSySRGaZs3dvDVnwUPHIQrUWAgg0oVWbVBccW8uGpWGjlQm75E1YrVgDtUvZXa8cjlT2qpWKWmB8OKtOimF7dWAJeT5LQBiXbh7hmQqXAoVLnqcJi/jYeSlyZjktVGX3VpxByyHP1KKscZLHynN4NNzQMPruCyGMzyBgwa3F2FMM+Z/et22gBpAyAIp4K9TitUeNxtRylwvZJdv7u/U9k6kfwY352T2K/qg9SY/mxvzsvrCvylOeEREAREQBERAEREARcIgOk0ga0uOTQSeAFV8vNtN+V8js5XF54klx/WK+iOmtoMdgtTxmIJabiWkV8K18F80Ocb2ByFfFAWiB9BWhNBWgxJ4b1C6X0S5v3zFke8QzG7rvjzmnM8VJ6KtAcKZEZj2qVhYW4tFQTi3jmW+0a8889WialU4XcqsOgJZGmV4BdQPcBQi47KQUzGokYA4GhXaCwtGdVMWnRk0ffgq0B17sg6hDqUJYcmkgkFowO3UoizSXnO7wB11bQtOws+D4YKnKjNyzeR6nB+JYaMM4K+XTvs/NZc7G4wUFAvWeiWibNZLH9nOAe8x3y7O6Dk1mw1zOa8pjbtp9FWGy9Knssj7K5tQ+NzBjTvF5cDwxpyVepeNSPC765a2e0rdHt1vsXsc6uNwq4E4xuuLRXjvn0+pGdIdPTWqQvkfXzWCtGjY1vtzKh2g1r+5cPkxwHILC6Y7+SswocLvvzK9XxWlGHw6ULRWSWxsudvHpTktN8u9GSbwp1CxxK+L49vobYKj9MWe82/TFvq1rZDhuXJFRqotnEpxqWdyusu66hWDQdsc9r4YwTUNu+bQHy5dt3U3K9Q/BCj7B0efO/un7mD5Xwd4HnHhgrnY7CIGGONuJxvnXtLtpGzhvWjpKTuyy8dOEXGNlfl/PrmRsNmbEXRtNcA4nXU4GvKo8di0dIPABqpmeMNB8SScydZJ+uWxVTSUxfUtIAGIqM99FMjlyld5ntvUZar1hkiP4uYkfkva0/rB69JXj3UNIb9qbqLIDuBDpfXe9C9hWTQIiIAiIgCIiAIiIDhERAY5Iw4FpAIIIIOIIOYI1hfMXSyyCC2TxNbca2aVrRsYHG40V1XSOS+oVSOmvV3Bbn9sHmGYgBzg0PY8DK+wkVIGFQRgBWtAgPAm2oteLhNcDUgZ0FRniONM9yt2hdKNlFD3X62n1t2hWU9Sr8Pv6PD/Z3eyZHdTE2BGkGCmR7B1RwPbYIZvmabVqaR0PFNi4UeMntNHjx1jccFksvQu1SGdv2eW9hNJFXs3d7s475cAJBSuVMeKx9HOhdqthlDdIOZ2dypLZHVvXtkgp5KjU4t8KZKozjHity+uhB2vQ9pixAE7fk92QD8k4HwPgol9qZW66rHebJVruRXph6orb/AKWd9CX+/WGfqYtTxR+k742OjlcORmot+EzGvJZZdl+DzZzdgJ4An0roWbjyK9Hi6j5m+TboR/01fXIu56l7T/pCP/t/41izNnWi9jzNzPyvoldmPaBUupxNF6Qepa0/5/Ef+n/jWNvUjaA6+LfGHaiIngjhSTBEjR1I8vf1KVYrLLLTsonuHnu7rOZGPhVTtm6N653Xz5gwYOOt3q3KzN6qdIj/APW/Qk/vFr6S6utIwxPlOkw4MaXEdm6ppqqXmizYx8R7GBrABQAADIDIKF0v0ghhf2b716gODSRQ12cFvaD6K220svNt4b90uUMdcbhfXPdRS/Q3q3M5gttrljnjkhqYXRmtHMN2pvUq0urWlcFrGcZaMxOEo/5Kx5npDTQnJayoYNooXcd27/BaL3nUCW0bWu8/vHIr1CDqRnb/APdiOFMY3+162rF1KO7QGa1tuA4iOMh54Oc4hp30K3NEyz9TNnDdGsfdAMkkpJpi668tBJ10u0V8Wpo2xRwRMhiaGsjaGtaNQHr4rbQwEREAREQBERAEREAXCIgCBECA5REQFG0Rh9mn/bLX6IV06royBaDtdF6Gu96aKNRbRstdu/ZLY6s2/cp/nacmg+1Uqf8A9u/3R0Kn/H/8/wAlstVqZGLz3UFaazjwC1v5bs/xn6LvcsemZiLoABzOdPYVDuld5o+kf7KunPJ6PSsLjRrwTQnI5AVOrYF1/luz/GDk73KEhnoe9dHdeB3s3FhAGWtYu3d5o+l/CgLEdLQ3Q6/3SSK0OYoaZbwuv8tWf4wcne5QZtBuAUbW840vaqNxy2hdGzO80c/4UBZbNpGKQ3WPBNK0oRh4hanSltbJaPmn+hpK09GTkSNq0Y4YHb4Lf6Rf5JaPmJf2bliWjMx1RR+rgkNcD/nAPOF6t3Qg1sFm+aaqp0D/AKNzv9e08mSBWjoJ+D7L801U8I73L+PXzdvsWBERXTnhERAEREAREQBERAEREAXC5XCAIEQIDlERAUXR8ZbaLdFtnleBtElkBw8aqP6u9KiN80DzQv77d72g3hxLaEbmlWDT0RhtLLS0VDwGu/LbW6D+U0ubxa3aqR0r0b2cwfEatkIfHTDCuOWILSNWIpxB5zk6dVvk/o9PfM6tOMatLg5pd1e/58i4x6VE75APxZA5gn2Lu4KsdAzVs7q1JkbeyzDdxp6uAVncr8ZKSujmzg4ScXsYJ2VpucDyquSVy5YitjQXe9X5NPTVZQsS7MKA7zWrsmmTzMVm6SaaaLC8170zTG0a+8KOPg2p5bVGaeaDZpgTQXDU5Kktc+Utb3zWjW7CKjuszGO4k5VJoAIK9XgVt2WsLh/iyu9EWboi8x2V7zleqPzcx9o5q8dFbOY7HZozm2CIHjcFfSqxZrDURWNtCce1Iyxu9pTc1ouA7Sr6BRQYNO8m/L+WS46Sk1bf7aLvm/K3M5REV4oBERAEREAREQBERAEREBwiIgCBECA5REQGrbbO2RjmPbea4UI/fqOuoyXn2kdLtsjnQTMdNA45locRvc3WflNx2helFQ9v6PxymrxVRzpxnm9SSnVlDJacve/VFT0DabG1r+xnZdc+9dcWtLajKhAO3MKSNvh+Oi+m33rdHQ6z+YE+06z+YOS2hHhVjE5ucnJke62Q/Gx/Tb710+yYvjY/pt96k/tOs/mDkn2nWfzByWxoRgtMXxsf02+9d22qL42P6bfepH7T7P5g5J9p9n8wckBF2+aB0T2umja1zSC68w0rroTQqB0ZabPERHZn33nAy07xG5wFGN3Nx3lXL7T7P5g5LNZejMLDVrQCoalFTabfb8/gnpV3TTSXf8G1oWwNjZXynOAvOOvcBqA2KVXSNlBRd1JGKirR0IpScnxSd2ERFsahERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAf//Z', 50, 5000, 1000),
(30, 'Tản nhiệt CPU Jonsbo CR-1000 RGB', '', 450000, 1450000, 12, 'https://sp-one.vn/Content/uploads/2019/11/49929_tan_nhiet_khi_jonsbo_cr_1000_rgb_4.png', 50, 5000, 1000),
(31, 'Tản nhiệt CPU Infinity Saido ARGB\r\n', 'INTEL: LGA115x / LGA1366 / LGA2011-\r\nAMD: FM2 / FM1 / AM3+ / AM3 / AM2+ / AM2 / AM4 / 940 / 939 / 754-\r\nARGB-', 400000, 1400000, 12, 'https://sp-one.vn/Content/uploads/2021/12/Infinity-Saido-ARGB-H8.jpg', 49, 5001, 1001),
(32, 'Tản nhiệt CPU Infinity Saido Pro ARGB', 'INTEL: LGA115x / LGA1366 / LGA2011-\r\nAMD: FM2 / FM1 / AM3+ / AM3 / AM2+ / AM2 / AM4 / 940 / 939 / 754-\r\nARGB-\r\nCPU: 180W-', 400000, 1400000, 12, 'https://sp-one.vn/Content/uploads/2021/12/Infinity-Saido-Pro-ARGB-Ultimate-Performance-CPU-Cooler-H2.jpg', 50, 5000, 1000),
(33, 'Tản Nhiệt Khí CPU Jonsbo CR-1000 EVO RGB Black', 'Chiều cao tản nhiệt khí 130mm-\r\nHỗ trợ tản nhiệt TDP 180w-\r\nSử dụng quạt FDB cho hiệu năng tản nhiệt và tuổi thọ cao-\r\nHỗ trợ Socket LGA 1700/1200/115x & AM4/AM5-\r\nTrang bị 4 ống đồng dẫn nhiệt-', 450000, 1450000, 12, 'https://sp-one.vn/Content/uploads/2023/09/CR-1400-EVO-ARGB-Black-1-500x500-1.jpg', 42, 5000, 1008),
(34, 'Tản Nhiệt Khí CPU Jonsbo CR-1000 EVO RGB White', 'Chiều cao tản nhiệt khí 130mm-\r\nHỗ trợ tản nhiệt TDP 180w-\r\nSử dụng quạt FDB cho hiệu năng tản nhiệt và tuổi thọ cao-\r\nHỗ trợ Socket LGA 1700/1200/115x & AM4/AM5\r\nTrang bị 4 ống đồng dẫn nhiệt-', 450000, 1450000, 12, 'https://sp-one.vn/Content/uploads/2023/09/tan-nhiet-cpu-jonsbo-cr-1000-evo-rgb-white_449d2613ace64a4e86988eb4bfad95a4_master.webp', 50, 5000, 1000),
(35, 'Tản nhiệt khí CPU Fuller T900i', ' Kích thước Tản: 123 x 53 x 160mm-\r\n Kích thước quạt: 120 x 120 x 12mm-\r\n Kèm theo 4 ống đồng tản nhiệt-\r\n Quạt 12CM tự đổng đổi led màu RGB-\r\n Hỗ trợ  Intel: LGA 2066/2011-v3/2011/1366/115x/775 + AMD: AM2/AM3/AM-', 450000, 1450000, 12, 'https://sp-one.vn/Content/uploads/2023/10/11665_t___n_nhi___t_kh___cpu_fuller_t900i_led_rgb1.jpg', 50, 5000, 1000),
(36, 'Tản nhiệt Cooler Master HYPER 212 SPECTRUM V3', 'CPU SOCKET : LGA1700, LGA1200, LGA1151, LGA1150, LGA1155, LGA1156, AM5, AM4-\r\nKÍCH THƯỚC HEAT SINK (D X R X C) : 124 x 73 x 152 mm / 4.8 x 2.8 x 5.9 inch-\r\nVẬT LIỆU HEAT SINK : 4 Ống đồng, Lá nhôm-\r\nKÍCH THƯỚC QUẠT (D X R X C) : 120 x 120 x 25mm-', 500000, 1500000, 12, 'https://sp-one.vn/Content/uploads/2023/09/45572_t___n_nhi___t_cooler_master_hyper_212_spectrum_v3.jpg', 50, 5000, 1000),
(37, 'Chuột máy tính Rapoo N120 (Đen)\r\n', 'Độ phân giải:1600dpi-\r\nGiao tiếp:USB 2.0-\r\nBảo hành:24 tháng-\r\nHãng sản xuất:RAPOO-\r\n', 75000, 1075000, 18, 'https://sp-one.vn/Content/uploads/2019/11/Chu%E1%BB%99t-c%C3%B3-d%C3%A2y-N100.jpg', 50, 5000, 1000),
(38, 'Chuột Edra EM601 v2 đen (USB)', 'Chuột Edra EM601 v2-\r\nChuẩn kết nối USB-\r\nĐộ phân giải: 1600 DPI-\r\nSwitch Huano độ bền 5 triệu lần nhấn-', 79000, 1079000, 18, 'https://sp-one.vn/Content/uploads/2022/03/v11.jpg', 50, 5000, 1000),
(39, 'CHUỘT QUANG CÓ DÂY PROLINK PMC1005', 'DPI 1200-\r\nCuộn trang nhanh-\r\nGiao tiếp qua cổng USB-\r\n3 phím cơ bản-', 79000, 1079000, 18, 'data:image/jpeg;base64,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REREREREREREREREULSlnvxkDMYjs/RUtnWzqlttm6N14ey49x3Ishe4lTa36uttkN3ASN60b9ztx/Ccj+iuIypDShAIsVux7mOD2mxGIX50tNlfE90cjSHA0c07PmOK+sC7PrZqrHbG3h1Jdjht4O3hcl0zouWym7KwtPsh32TxDlDbRvfK2Nu02vu3+Ga7Ck01A+Evfg4DLf8At333ZjliYV+qyAqI60NbmewYnu2LC+3E+yKDxXUz1NPStEd8gAAMThhju43VZTNlmcZHbTcnmrB7wM1HfOOzeVCMlBece0qstlrL+DRkPiVSSV0sxswao8/H2U2eqjpGY4u2D53D19MmkbeX9VuDdu93PcOCTRgjHvUew2SSZ4jiY6R5ODWip7dw4nBdk1H9G5jLZ7ZQvGLIhi1h2F33neA8V7QPYxjtYXvbrnmuXnqHzSF7zc+nTYsXom1LMA/xc7fWOHUaRixh37nHM7sBvXUXuoF5FGhQLZa6KOF5LFb7Qq2xRmaZrNhNXe6MT8u1YLXaarZdWNHGNhkeKPfkNzdnac+5ZQq9REWFhERERERERERERERERERERERERF4e0OFCKgr2iIqmezGPEYt37ufzX2N6tVFlsTTiOqeGXciyCsAKwWyxRzNLJGNe05hwqsr7O9uyvL5LwZCMwRzCyi0bS/orsshLonOhO4Yt7jktfk9E8wPVmaRxB+a6yJwvvTheZiYdilR1lRHg1562PrdciPohmefWWpoG4My8VcaM9ENlYazSSS8K3R/TRdDNoCxPtYC3AsLBR3lz3FzjclYtE6Fs9lbdgiZGPwgA9p2qVLOAq+W3blHcJX+xG49lB3lZWqy2u3KktVrLjQYkq5h1dlfjI4MG4dY/LxV1o7Q0UGLW1d952J7N3YiwqjQOgDUSzji1h83fJbSiLCIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIvL8kREVPa81HRFlbBeHrEzNERYKudHKxRFhYREREREREREREREREREREREREX/9k=', 49, 5002, 1001),
(40, 'Chuột Logitech B100 Optical USB Mouse (Có dây/ USB/ khả dụng cho cả hai tay)', 'Plug-and-play thoải mái chuột được xây dựng với chất lượng và độ chính xác quang học-\r\nThoải mái, hình dạng thấp hơn cảm thấy tốt trong cả hai bàn tay, thậm chí sau một ngày dài làm việc-\r\nMang lại sự tuyệt vời với độ chính xác cao cho công việc chỉnh sửa tài liệu và lướt web-\r\nBạn chỉ cần gắn vào công USB là có thể sử dụng được ngay. Thật là dễ dàng để sử dụng-', 80000, 1080000, 18, 'https://sp-one.vn/Content/uploads/2019/03/mouton-bp-b100-gallery-image.png', 50, 5000, 1000),
(41, 'Chuột Có dây Rapoo N200', 'Loại sản phẩm: Chuột có dây-\r\n Chuẩn giao tiếp: USB-\r\n Phím chức năng: Standard-\r\n Màu: Đen-', 86000, 1086000, 18, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxAQEBISDw4PDxAPEBIVEBAPEA8PEBAQFRUXFhUSFRUYHSggGBolGxUVITEhJSkrOi8uFx8zODMtNygtLisBCgoKBQUFDgUFDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAOEA4QMBIgACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAABwIDBAUGAQj/xABJEAACAQMABgUFCgsIAwAAAAAAAQIDBBEFEiExQVEGB2FxgRMiMpGhUmJyc5KxsrPB0RQjM0JTgqKjwsPwJTRDdJPS0/EkNWP/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AnEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoq1FFZexbPaBWDyMsrPM9AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHjZxfS3rDt7PWp0Erm4WxqLxSpv38lvfYvYRJ0g6V3t635e4lqP/Bp5p0V2aq9L9bIE5aS6ZaOt21UvKWst8KbdaSfJqCePE5bpF1h2tahKFq6rqZjJSnTcIasJKUt+3OqnjYQ7SRkp+bUx+hrfVSAmzRHTy0VKnGq6sZxhFTl5Nyi5JbWsbceB0Oj+kFpcbKVzTlJ7ot6k/kywyDKe5FeAPoMENaF6V3drhKo6tNf4dVuaxyjLfHw9RJHR7pTb3nmxfk62NtKbWXzcH+cv6wBvQAAAAAAAAAAAAAAAAAAAAAAAAAAI16zOl86cnZ20tV6v/k1F6UVJZVKL4Nppt9qXMkmUkll7Et/cfOWk7t161Ws99arOfhKTaXhuA1tcxGZNdmKwLlMyPzKvxFb6qRjUyxVu5yqSow2R1dWbxly1o7YrksPeB1lPcitI1ejbyflnRq7W6evCWEnhNJxeNnFbV2m4SA8SK4NppxbTTymm001uafBhIqwBJXQLpTK8VSjcav4RQb86KwqtLY4zxwklKClwy8re0uvIW6LXXkL+2nlpTmqclwxJ+T2+NWL/AFETSAAAAAAAAAAAAAAAAAAAAAAAABp+l935GwuZp4aozUX76a1I+2SIAe5dy9qz9pMfW5cuGjZRW+rVpxXbjNT+BEO1uON2XjuAwa7Mcv1iyBVAs6HpKVzVzj8o9+1YwuHHuL8CnQX95q7cNVG88VsW1doG3uaSjpChjDTt6m1R1E/R/N4G5SNZfSzpGhluT/BqmXJYk/R2s26QFKR7gqwMAY91JxSlHZKD1k+1JtftapPFtWVSEJx9GcIyXdJZXzkF3C818ktZ90Gpv6JLvQevr6OtX7miqfjSzT/hA3gAAAAAAAAAAAAAAAAAAAAAAAI266LjELOn7qs5tdkXCPzTZGFTcd71yV83lpDlSnL5Sm/5RwNUDDqlsuTKAPYlqlTqUa06sYqcJR1pe8cV52eO5Zz3l6JkS/JVv8vX+qkBmaKtq1S5lcV46mKfk6cG05NNpyk+S2Y9ZvsFuii8B5gYKhgC3OnrJx92nHwksP5yRequ519H4/R16q+U1V/mEfZxh8mmdl1QSxQuafuLiL9dKEP5bA78AAAAAAAAAAAAAAAAAAAAAAAEK9a9XW0ol+jtoL6f/IcdWZ0nWRNy0vX5RhGPi6dFr7TmazAxpHgYQFSMqH5Or8RW+qkYsTK3UqvxFb6uQHS0S6W6K2F4Dw9wMHuAKZLYdJ1Q1fx+kI++pyX+rcL5kjm6kkt/Hct7fcuJvOqSTV7eJ7M0oPGzhNvh8YBKgAAAAAAAAAAAAAAAAAAAAAAAID6fSzpW7+FD6uC+w5yrLx7zoOnf/tbv4cfoxOdrAWnjtXftXrX3BR7V60vnKCpAXIx/reZE4t0qijGTlKlUikoybblBpLd2limjZWaA3NGfZP8A06n3F5TXKfjCovsLdvuMlICjL9y+9uKXjtz7D3Vb3vHwdvtfDwLmBgC04pbvXvb729rNt1Wy/tO5XO3l7HQ+81VQ2fVY/wC1Lj/LT+e3AlsAAAAAAAAAAAAAAAAAAAAAAAEBdYCxpa6XNxf7um/tObrHW9ZdHGl6r93Tg/3dJfws5O4QGMVRKC5AC/SRs7RGvoo2dqgNtbmUkY9ujLigPMBorwUyAx6xteqaOdIXcuVHHynT/wBhp7iWw3/U5DNxfT5Rox/aq5+igJSAAAAAAAAAAAAAAAAAAAAAAABEHWxb40hSnjZUt4rxTq5+aJwF4tpLHW7bf3WquEpwf6zg17NcizSEANaXqZYZepgZlFGztUaygbS0A21Ay4mLQMqIFTLc2VtlirIDDu57Dsepal+Iuqvu7nVzzSgp/wA04LSNfVi3yTfqRKfVPaeT0XSbWHVnVm+7XcIv5MIgdgAAAAAAAAAAAAAAAAAAAAAAADlesqydWwm0sypSjOP0G/VNvwIZ0jDKTW5rK7mfRN9bKtSqU5ejUhKL7pLBAd5bSjr05rE6U5QkuTi93hsXgBy81tK6bK7qnhlqDAz6LM+hnWhhPCbzierFbNmsuP34NZRZkxbVSlLL1VJrYl5spLCeeGc4zwyB0tB/9PgZcZGuozXB5XPYZKmBfnIw7iZXOoYNzVA1Wma3m4W1tpYW95e1erJ9CaAsPwa1t6HGjQpwb5yjFKT8XlkG9D9H/hmk7enjMKU/LVOyFPak+xvEfE+gQAAAAAAAAAAAAAAAAAAAAAAAABFfWZonyNwriK/F3K1Z8o1orZ3a0c+KZKhg6a0XTu6E6NVebUW9elCS2xnHk08MD55v6GdqNU44Z0+l9G1bStKhXWJx3SSerUg/RqR96/Y8rgaW7ocUBZoyL1WW2m0lKSb1YtN52b9m7BjQ2GRGKljbJNZw4vD2gby1uVNKS3S29vb7cmSqpqLZqMUluXN5ZkOsBl1aprL242MVrg2vQvoxPSVx56ataLTrz2rW4qjF+6lx5RfagO36n9Aulbzu6ixUu8KnnereO5/rPMu5RJDKacFFKMUoxikkksJJbEkuCKgAAAAAAAAAAAAAAAAAAAAAAAAAAA03Sfo5Rv6WpV82cculVilr05Pf3xfGPHvw1DPSDQFzYz1biHmN4hWjl0p8sS4S97LD5Z3k/lFalGcXGcYzjJYlGSUoyXJp7wPmSvSwyzGeCc9KdW2j62XTjUtn/wDCS1F3U5qUYruSNDV6n6bfm30l8OgpP9mcQIxhWK3X9m18kub5EnUOqCkvTvqr+LpQg/23New6XQ3QLR9q1KNDy1SO2M7h+VcXzjH0IvtUUBGfRLoTcX7U5qVC13urKOJ1FypRe/4bWOWsTRorRtK1pRo0IKnTgtiWW88ZNva23tbe8ywAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB/9k=', 50, 5000, 1000),
(42, 'Chuột DAREU LM103(USB)', 'Sensor: PAN3512-\r\nDPI: 1000-\r\nPolling rate: 100Hz-\r\nSwitch: Huano (10 triệu lần click)-\r\nKích thước: 118*61*38.4mm-\r\nDây 1.8m-\r\nTrọng lượg: 100g  +/- 10g-\r\nRGB TẠI LOGO VÀ CẠNH VIỀN-', 109000, 1109000, 18, 'data:image/jpeg;base64,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', 50, 5000, 1000),
(43, 'CHUỘT GAMING FUHLEN L102', '', 115000, 1115000, 18, 'https://sp-one.vn/Content/uploads/2019/12/2841040-4803cabb9945cca064bbdd3b37f66ebe.jpg', 50, 5000, 1000),
(44, 'Chuột DAREU LM130S(RGB, USB)', 'Sensor: PAN3512-\r\nDPI: 1600-\r\nPolling rate: 100Hz-\r\nSwitch: Huano (10 triệu lần click)-\r\nKích thước: 118*61*38.4mm-\r\nDây 1.8m-\r\nTrọng lượng: 100g  +/- 10g-\r\nRGB TẠI LOGO VÀ CẠNH VIỀN-', 119000, 1119000, 18, 'https://sp-one.vn/Content/uploads/2022/01/10138_15668.png', 47, 5001, 1003),
(45, 'Chuột DAREU LM130 (MULTI-LED, USB)', 'Sensor: PAN3512-\r\nDPI: 1000-\r\nPolling rate: 100Hz-\r\nSwitch: Huano (10 triệu lần click)-\r\nKích thước: 118*61*38.4mm-\r\nDây 1.8m-\r\nTrọng lượng: 100g +/- 10g-', 129000, 1129000, 18, 'https://sp-one.vn/Content/uploads/2018/07/6595.jpg', 50, 5000, 1000),
(46, 'Chuột không dây DAREU LM106G Black / Pink', 'Cảm biến quang độ phân giải: 1200DPI-\r\nSố nút bấm: 3 nút-\r\nTuổi thọ nút bấm: 3 triệu click-\r\nKết nối: không dây tiên tiến 2.4GHz-', 149000, 1149000, 18, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0PDxANDQ8NDQ0NDRANDQ0NDw8NDQ0NFREWFhURFRYZHS0gGBolGxUWITEhJSkrLi4vFx8zPzMvNywtLi0BCgoKDg0OFw8QFSsdHiUrLSsvLS8rKy8rKy0rLSsrLS0tListKystLS0rKy0tLSstLS8tKy0rLS0tKysrLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAAAQIDBAUGB//EAEQQAAICAAIHAwgFCgUFAAAAAAABAgMEEQUGEhMhMVFBYXEiMlKBkZKxwSMkJXShFDNTYmNygqKy0UJzs8LSNGSEk8P/xAAaAQEAAwEBAQAAAAAAAAAAAAAAAQIDBQQG/8QAMBEBAQABAgMECQQDAQAAAAAAAAECAxEEITESMkFxBSIzUWGBkbHBE0JSoSPR8OH/2gAMAwEAAhEDEQA/APuIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKO2C5yivWgG+h6UfeQF0wAAAAAAAAAAAAAAAAAAAAAAAAAA18ZjaqY7d01COeSz4yk+kUuMn3IJktu0cPEaw2y4UVquPZZf5Un4Qi+HrefcUuc8Hsw4LK887s0bcRiJ/nL7n3RluUu7yMs145le1Xpx4XSx8N/Nrzw1cvOjGb6zW2/ayN61mnhOmM+iJYatJ5QguD5Rj0IW5ONqNGNujcJZZCDlOnal5K57ci2XVjoezxd2GCqTzVdafWMYp+1Ec1rMb1kZ61bD83dfW+zKyU4r+GecfwJ3rPLR07+1uU6YxVf5yMMRHrH6K7Lr6Mn7paZe958+E/jfq6+j9J035quTU4rOVU1sWxXVrtXes13l3kywywu2U2boVAAAAAAAAAAAAAAAAAAAA5Om9Mxw+VcErMRNZxh/hhHlvJ9F0XNteLUW7NdHRy1cto81lOc3bbJ2Wvg5y7F6MVyjHuX4viZW2utp6WGlNsfqzqJC24wIzCXO0zpqjDJRnvLLrYy3WHohvLrEuDllyUeK8qTS7yZN2OrqY4Tm5GoOk6q8NhtG3xtw2LrqcY13xyjdk3J7uxeTN5PlwfB8C2U5sNDUxuMx8XskQ3SEDQGC/DqWT4qUXnCcW4zhLrFrih0TZMptlN3T0RpqTlHD4lreS4VXJKMbn6MlyjPw4Psy5K8y3c/X0Lp85zjvFnnAAAAAAAAAAAAAAAAADn6c0nHC0u1ram2q6a88t5dLzY9y7W+xJsLY43KzGda8bh4yblOyW3bZLbtn6Uu7okuCXYkjC3e7u7p6c0sOzG/XEKWrMlEYZshpFVIJeNotdmKx1kuMli3h4vtVVVcFGK7s3KXjJm2HRxuJyt1Kxaxtwwttq4WUQeJql6FtflwkvWi1Y42y7x9Arnmk+qT9qMHZZEwjZYlVIGrjcOpRcWs0/U/FPsfbmQvNsptXZ1b0nK2MqLnniKMtqT4b6p+bb48Gn3p9jRrLvN3K1tK6efZdolkAAAAAAAAAAAAAAAAPCaxYzf42UE/osFHdx6PETSlOXqjsx9cjPUvLZ0fR+nvbnfDkUIzjoZttFmKs2ExgmyrSMYWeL0c/p8dxy+0r+fLzYG+HRw+I9pl5ra1v6lis2m/yW3l+4yzGPeUeZD9yPwRg7TLEIZEShKCEWLgDHq5dmJ/JrqsUuCqnsXd+Hm0p+zyZfwk4XnsrxeHa0+14x75GjlAAAAAAAAAAAAAAAETkknJ8Ek230SA+W6HsdkHdLz8RbZfPxnNv4ZGGfedzg8ezoz6uzSRGmTZLMlJshaMEiGkVRCXjKKpV4jHRmks8dO2O1wUoTrrlGS6rjl4pnow6OJxMs1MlNYIztwt9VcYynbTKqEIc5zktmMV4tlqxk3u0fRYV7MYx9GKT9SMHYlWiCrolVIQS5Ajl6QqU4Tg+U4yj7VkV6PRMe1jcfe9PqtindgsNY/OdMYyz5uUPIb9sTeuC6oAAAAAAAAAAAAAAGhp6xxwmJmuDjhbpJ96rkB890KsqKv8qH9KPPl1r6DQm2lj5R16RDJsZks1JhaMEiF4hBKL9GUX5b2Oco8Izi9maXTPp3MtjbHm1dPHPrGHVbAUPD0YrZUrbK1PbfHZb9FckXteXSwxklkdmZV6YhEJq6JVWCESBGhiCtenB1NQpfU9n9HiL4L/2N/M3cLUm2eU+NejCoAAAAAAAAAAAAADm6yrPA4v7pf/pyA8DoZ/QVf5Nf9KPPl1r6HR9nj5R1qhDJnRLNSQTGKRC8QgNrD814loyzaWpbz0bg3/20C1eXT7sdWZDWIQSugqkCs+QI0LytenB09Qf+lsfXF3v+ZG86Rw9Tv5edelCgAAAAAAAAAAAAADU0vXt4a+Hp4e2Ptg0B820DLPD1d1cY+zh8jz596u/w930sfJ2K2Ivkzpks0SBGKRC4kBtYfmvEtGWTnajv7MwX3aBavLh3Y7MiGsQkBZBCQhSxhbFoXMpXpwdfUCP2fVL9JO2fttkvkehwLd7a9EEAAAAAAAAAAAAAAIaz4PkwPk+r0XCrdPzqrLa34qb/ALmOp3nb4K76M+f3duDKRvWeLLKUYQoyFkpAbFHNeJaM8nN1Gf2ZgvusPgWrzafdjtshdCCVggAw2sir4xy9IWbNdkvRrlL2RZHi2t7ONvweq1Rp2MBhY/sIz97yvmeiuA65AAAAAAAAAAAAAAAAfLoV7vF46rpjbLEukZ8V8DLU6x1vR99Sz4ulAze2ssWSpVyUKhKUgis9XNExTJy9RX9mYL7rX8C1ebT7kd1kLiAkCsmCNe2RFa4xxdPzyw9nelH3pJfMYd6HEXbRyv8A3N9FwVO7qrr/AEdcIe7FL5GziMwAAAAAAAAAAAAAAAD5xp2vY0rif21VFq/hiofEz1OkdH0feeU8meBk6VZESrV0yUJCEoIrNX2Eq1ydRn9mYL7rX8Cb1YafcjvBYAZgUnIhaRrWMhrjHL0jDblh6ue9xlNbXc5cS2n1efjbtpbe+vpJq5IAAAAAAAAAAAAAAAA8DrlDLSVU+yzBbHrja380U1O69nAX/LfL/SK+Ri69XJVWQQsiRKCrJFhWrUVxhFQhGMIRWUYQSjGK6JLgkSpszJhBmSbIciE7MU5ELyME2F41qIbWOwUf205+5ByzL6fi8fH31cZ8X0E0cwAAAAAAAAAAAAAAAAeJ17jli8DL0oYmL9Sg18SufdergvbT5tetcDB2KuSqASmBdMlCyYVZEyUWLJhVO0BSUgmRilIheRjkyFojRMM9I4V+hDES9sFH5mmn4uf6Q/Z8/wAPdmjngAAAAAAAAAAAAAAADxuvi+sYD/yv6ayufderg/bT5/ZqVcjF16yZBCGgIAlMC6ZKNlkwjZZSCuxtA2UlILSMbZCyrYWZtAr7Qq+73/GH9zTT6VzfSHXD5/h7Y0c8AAAAAAAAAAAAAAAAeN17f1jBL9XFP/SXzK5916+C9r8q1KuSMXWrKFRgY2FjMDo6NcFXfZKELHXutlTWaWcmmWx6WvNry3PDGWzffojFqO5pmoxi5yub2Vlw2+C8EL0hp7/qZ4277bfZpqRDfZLkDZjkyEyKhZDZCWfQT+v0vrTfH8IP5M10/FzvSE7l8/w9uaOaAAAAAAAAAAAAAAAAPE67SzxeHXoYax+/ZH/gU1Oj3cBPXt+DWpfAxdOsyJQlhDGwtFcyFnT0Laoq2Us4xygpTyUoRzbS2o9qb6fMvj4vJxWNyuMnXn5/Ko0wrlKO9cHDJ7p18K9nhnkuzsGW/inhv07L2evjv1c/Mq9Gw2DZDZCVcwlDYGXRbyxuEfWy2D9dE/mkaafWvFx89SX4vdmrkgAAAAAAAAAAAAAAADwWt8s8f+7haY+veWt/FGep4OjwE5ZXyYaJGTothMlVLYGOTIWimYWdbQM5/SQr3O3Pd7Kuk1xW084rLymufcXw+Dx8XMfVyy32m/T5fRqYveyULrZbW92lHjxWy8nw5JeBW79a20+xjbhjNttv7a2ZDVOYENgQBASnCzyvw8umJqXvS2P9xfT6vLxs30b8vu+gGzigAAAAAAAAAAAAAAAD57rU/r1vdCpfyZ/Myz6upwPcvn+IwUyKPc2oyIFnIDHJhaK5kJdPQThGbtlG2cq3FRjXFyy2tpOTy6L4l8Pe8vFy3HsSyb+/4GlcowpqjvHGvePbnXKracpJ5JPoMvCI4ffLLLO7c9uUu/Rzyr0gEBKAIbIFa5fSUvpiaH7LoF8OrDivZZPopu4QAAAAAAAAAAAAAAAA+fa3xyxs/wBauufqycf9pln1dPgb6l8/9NGqRR72xGYFtshKHIJEwl1dDYuNcbc5OMnOhpLPalGNnlpdeD5Fsbs8nE6dzuPLfvfbl/bJpnEKyNeUnJq3Ec881FzTjz7MsicrujhsLhcuXhj9uf8Abloo9aQhDCVWwKtgMOs7qF1xNHs3sS2HV5+Jv+LJ9FN3DAAAAAAAAAAAAAAAAHiNfKdm+m39JS6+5buWf/0/Apm9/A5c8sXBrkZOkzxmErbRCU7QFkwl19COWzeqmliHCG681Sy2vLyz7si+Pjs8nE7b4dru73f8KaRjils/lO1/i2NpxfTPl6iMt/FfRuld/wBNp5lW5mBDYFGwKSYGzoGtzxdK7IylZLwjF5P3tn2l8JzePjcttLb33/1782cgAAAAAAAAAAAAAAAAcPXHAu7CylFZzw8t/FLm4pNTXf5Lby6pEWbxtoanYzleAhIwdqM0ZBZdSAumQLpgXTBuyRYFswGYFWwKSZIxTkB6PUnCP6TEvlL6Gp9UnnN+GaS8YM1wnJyeN1O1n2Z4PVF3jAAAAAAAAAAAAAAAAAD5zrJoZ4W3agvq1sm62uVcubqfy7vBmeePi6fC6/anYvWOXGRm9zJFgXiwLpg3XjIDIpATtANoCHIDHKYFsBg7MTaqa+GfGc8s1XDtk+/ou1+stjjuw19aaeO/j4Po2Fw8KoRqrWUK4qMV3Lr1febONbvzrKEAAAAAAAAAAAAAAAAABixWHrthKq2KnCaylF9v9n3hMtl3jwWnNXLsM3Ovauo57SWc61+ul2frL8DO4+50tDiplyy5VxozKPZuyKQSspAWUgLqYQnbAbwgUlaSNrRei78W/o1s155SukvIj1S9J9y9eRaY7sNbiMdPl1r3mi9G1Yavd1LnxnN8Z2S6tmkmzlZ55Z3tZNwlQAAAAAAAAAAAAAAAAAAAABxdJ6s4W9uSi6bHxc6sopvvjyfjz7yLjK209fPDpeTzuL1QxcONUqro+Lqm/U+H8xS4PXjxs/dHNu0RjYedhrv4I73+jMjs1tOK0r4td4e9c6b1+9TbH4ojs1f9fT/lEqm7squfhVY/kOzfcfr6f8p9WarR2Ln5uGxH8VU617ZJIns1S8TpT9zoYbVbHT89V0rt3k1KXqUM0/aiewyy43GdJu72j9UsPXlK5yxEl2SWxV7q5+DbRaYyPNnxWpl8HoIxSSSSSSySSySXRFnmSAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB//2Q==', 50, 5000, 1000),
(47, 'Chuột gaming HAVIT HV-MS1003 RGB', 'Nhà sản xuất: Havit\r\nTình trạng: Mới\r\nBảo hành: 12 tháng\r\nMàu sắc: Đen\r\nKích thước USB: 126 * 68 * 40mm', 155000, 1155000, 18, 'https://sp-one.vn/Content/uploads/2022/04/MS1003-5-scaled.jpg', 50, 5000, 1000),
(48, 'Chuột không dây DAREU LM115G Pink', '', 160000, 1160000, 18, 'https://sp-one.vn/Content/uploads/2019/10/9500.png', 50, 5000, 1000),
(49, 'Chuột AJAZZ I17 (Đen, Trắng, Hồng)', 'Nhà sản xuất: AJAZZ\r\nTình trạng: Mới\r\nBảo hành: 12 tháng\r\nMàu sắc: Đen\r\nKích thước USB: 126 * 68 * 40mm', 160000, 1160000, 18, 'https://sp-one.vn/Content/uploads/2022/05/z2636193848178_dc38c0055ff63779c8b6e8e65d238634-600x600-1.jpg', 50, 5000, 1000),
(50, 'Chuột Gaming E-DRA EM6102', 'E-DRA - EMS6102\r\nGiao diện: USB 2.0\r\n Độ phân giải: 1200/1600/2400/3600 DPI\r\nSwitch: Huano switch 10 triệu lần nhấn\r\nBacklight: Led 7 màu\r\nKích thước:125*66*39mm; Nặng: 100g±5g\r\nĐộ dài dây: 1,75m\r\nCác nút chức năng: 6D+1Scroll\r\nChất liệu: nhựa phủ lớp cao su\r\nTương thích hệ điều hành: Windows 98 / 2000 / ME / NT / XP / win 7\r\nMàu sắc: Đen (EM6102)\r\nMouse thích hợp cho PC và các dàn Games, Internet với mức giá phù hợp.\r\n', 190000, 1190000, 18, 'https://sp-one.vn/Content/uploads/2024/01/296_61024.jpg', 50, 5000, 1000),
(51, 'Chuột Havit MS1026 RGB', 'Nhà sản xuất: Havit\r\nTình trạng: Mới\r\nBảo hành: 12 tháng\r\nMàu sắc: Đen\r\nCPI/DPI : 6400DPI\r\nMouse Led:RGB', 199000, 1199000, 18, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMHBhMUBxMPFhUSGBIXGBATFRAaERAXGBUXGRYYGBUYHygsGhsmHhoTJTEhJjArOjE6GSEzODcsOzQtOisBCgoKDg0OGxAQGi4jHyArLS0vLzAuLS8tLyssLC0tLi0tLy0rLy0rNi4vLTcrLy0rLS8wKystLSsvListLSstLf/AABEIAOEA4QMBEQACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAABgcDBAUCAQj/xABEEAACAQMBBAYECwUHBQAAAAAAAQIDBBEFBhIhMQcTQWFxgSJRkaEUIzJCUmJygqKx0UNTkrPBVHN0g7LS8AgXJCYz/8QAGQEBAAMBAQAAAAAAAAAAAAAAAAECAwQF/8QANhEBAAIBAQQHBgMJAQAAAAAAAAECEQMSITGBBEFRYZGhsQUTIjJxwSOS8BRCUlNigtHS4TP/2gAMAwEAAhEDEQA/ALxAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAfG8LiAjJTjmIH0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA0dcq9RolxKPzaVV+yDYHO2Du3f7JW9STzvqbz/mSQHfAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeKtWNGm5VnGMVxcpNJJd7fICB7ebXULjQa9vpc5yq1Y7ilBNRSbe+97hlYTXDPyl34CM9EfSJa2ehfB9UlVhKE24txcodXPLWN3LSUs54cN5d+At+zu6d9bqdnOE4S5ThJSi/NAZgAAAAAAAAAAAAAAAAAAAAAAAAAAARbW9s6VnmOn4qz+ln4qPmvleXtAgOs6rW1Seb2bl6ocoR8Ir8+ZI0dJtHf6xux7KU5eyUf1AglraK0q0XH9pQTfe11f+4DvaNq1fSLjf0yrOm+3dfoy+1F8JeaAtLZrpKp3KUNeSpS/fRz1L+0ucPeu9ECfU5qpBOm000mmnlNPk0+1AegAAAAAAAAAAAAAAAAAAAAAAACG9Keqz03Z6Ebd4+EVY0pNc9xwnOSXjuY8GwIFT+QiRjr8gOFq99VsKc5WE5wluRi5QlKMnGVRJrejhrl2eo6NKtZ0tS0xvjGOc4b6VKzp6lp41iMc7RHpLhWLcrODqJ5i5wjlye7FKDwst8OXsRNq1nQi+N+1McoiJ+6badfcVv1za0cois/d0KRzOdsyXxYFk9CeqTubG5oVm3GhKnKGfmqpv5iu7MG/vMgWWAAAAAAAAAAAAAAAAAAAAAAAAV101yxpFp/iV/Jq/qBFaLzSXgSPFfkBxtUl8HsK9Xg+rjbrHH59ZpPK8H7Tak/h35erbT/878vXP2c+nNXuz8arWHG4qU+bxjqYSfPyJz+Bj+r7LTMfs8R1xafOI/w80TBztmb+KYE36CZZvr9fVtX765At0AAAAAAAAAAAAAAAAAAAAAAAArfpw4aJav1XC/k1AIlZVN+2j4Ej1WfADg685S02vGhCUt6nRbw4KMFCup5lvNdkZLhnmWiY2Zj6MrRfbrMcN+fDc42k37nokKTi0nVrVs+jiXxdKnHDzlNYqZTXaidr4NnvTi3vM9WPPLdpMo0Za08UmBOugaH/AJd9L6tqvfXf9QLeIAAAAAAAAAAAAAAAAAAAAAAABWnTbbddp1CUecOuf8ty9kVJ+RMM9S+zNc9c48eHniEC0O437ZJ9gaOhVllAR7aG9+DUpxyk6lLdX8Uv1AjOjylC73KmVuxqei004vejlNdjzngBIKb4AYrypiGALZ6DbbqtFuJy51Kkcd8Yxwvxb4lnW8WvaI6sRzxn0mFlkNAAAAAAAAAAAAAAAAAAAAAAABBOlmGLKznNJxVzGnPil6FajVpPnz4yjwXiTW0VnM8HH7QraejXmvGI2o+tfijzhTdhUdldShU5xbi/FPD/ACIicw6qXi9YvXhMRMfSd7f1DWqdlS+MeZPlBc3+i7yVkOvtTqXFyqtXc4ZUVKEJU0u1bs01LmuafNd2IC51Od7qM6+IJzcm1CMVFKUm8PdSz9p8XzbyB0rXUI1o+p/R/T1khUn1k+AF69FC6vT7imuVGpTpZ9bjb0pS/FORSl9usS4PZ07ejOr/ADLWtymcR5RCdFneAAAAAAAAAAAAAAAAAAAAAAAK96c1u7ExnHnTuLeS7nlr+oxndJiJ3TwlTW1lXqdbmrbPp7s84Xz4xl6PHjzfEw6Jeb6UTPfHhMw4PZm1HRaVt+7u8JmHIoWylPeum33Z4vxZ0O9sXVxKEoSsm4ypZ3XHCccrDwBgVxUuaznfSlKTSWZPLwuWQMVS3y80vZ+gHV2Xi7nWqVOtnjOHYs8JJvOWuGFLj+Zz9L1PdaF79kS5+lTaNG017J84x6ru6GqnX6HdzXz7ytLydOlj3YNNOuzSInqiPRbo+n7vSrSOqIjwhPy7YAAAAAAAAAAAAAAAAAAAAAAAQPpsjv7BTXb1tvjvxVi37sgVTtDTcrO0k/n2tCXi1vRz7EvYed7Pxta0dmpaPSfux0tLYm3fMzyRep6LPSbMMpZA+JgZafECX7EQxqTf0KdeePXu05Y97PL9sY/Zsdtqx42hS+nGpGJWD0Cz/wDWbiPquM+2jSX9GenM/FK/WswAAAAAAAAAAAAAAAAAAAAAAAArXp3vVQ2Zow+nWTfhCnN/numUznVrXumfSPuiUB2mj1NxRoPnbW9tRl9tQ35f6zh9lfFp31urUve0fTOI9F7ccdyJ3VPEj1FWm1xA+YAzUFxAl+xlaNLXaUazxGrv0m/72EoR/E4nme16Tbod5rxri35ZiZ8oWrxS7oHru3r3lvX4Si6ba+tFzhNeTR1bcTrRNeF65jlMT57Sq3joAAAAAAAAAAAAAAAAAAAAAAABUvSpXjc7cWdK5z1VtRndVV2bkXOXv6px++cHTptXTtNPmtEUr9bTjyznktWMyreley1CrOpc/LqSlOXqzJttLu48Ds0tKulSunThWIiPpCuc72veQyaDnyjxA8uIGSisMDYrVnTp5ptprDUlzi1xTXemRMRO6eAsLYTUV/3Ht60OEdSozm4r5MayjPro57qlKq/vo8zoNJrX3U8dK01/txmvlNfBe3b2ruPTUAAAAAAAAAAAAAAAAAAAAAAAFNdNNu7bU61dftLO3oJ+N7vT/Dw8zk19+to075t4VnHnK1eEyrHS62FhnYq3K73kBm0zRlfrNWoqe82oRUHUnVa+ViEWsJdrOTpHSvdbornHHfiI5z29jp0+jWvXazjPDrmccd3d2t+62S+CUnK8rdXFLO/UhSUZfZgqzqS48OEDmp7S95OKUzPZEz5zs7MfmZ20prutucCtGFN4oSlL1y3d2P3U22/F7vgejSbzvtGOef8Anhn6smndVfRLifdEdu7/AFmxl/ZK99nuhUtYtfjcv4jjr8PS7R/FSs86zaPSYX/c5r/OtQAAAAAAAAAAAAAAAAAAAAAAAQDps0qV9sVUqW6blQcZtL92pxdR+SWfJmGrT8Sl+yZjxjHrhaOEw/P1nPdZ0Kukp70QMtteztFL4PJpySWU2mknnCa5Z7jLU0aamNqM4b6XSNTTrMVnj6cd3Zku7vrqeKMNxP5ct6UqlV9m/OXHdXZHl288YjT0tmc2nPZuxEfSI9eKupqRb5YxzmZnnPo0ZcDZk0bh5kBdf/T/AKVKGj1rismlOpKNN/SSjBTkvvRx5M54pnWm/ZER55n7Lz8uFtG6gAAAAAAAAAAAAAAAAAAAAAAA81IKrTcaiTUk00+KafNNETETGJInD81bf7GT2Q1pqkm7aq26NTi93tdKT+lHs9a4+vEVmeE8Wlq5jbjh190/rh4OFSfAuzZVHIH1w4AYKqA3Nltl6u1etRo2WVHg6lbHo0YZ4t/WfYu192cVtPVHFpSmfinhH6xHf6cX6e0rTqek6bToWMd2nSioxj3L1vtb5t94iMRhW1tqctslUAAAAAAAAAAAAAAAAAAAAAAAANTVdMpaxYSo6lCM6c1hxfuafY12NciJjK9LzScwprafopuNNqOehN16XPcbSrwXqxwU/Fce4ZnrX2KX+WcT2Tw5T/t4yhVS1naVd27hOEl82cZRkvJllbaOpWMzWcdvV48CNF1pqNCMpN8oxTbfkgiune3y1meSV7OdGN3rFRS1BO3pdspr46S+rT7H3yx5kTnqX93WvzzyjfPjviPOe5c2zugUNnNOVLS4bsebk+M6ku2U5dr/AOLBERhS+pNu6I4R1R+u3jPW6hKgAAAAAAAAAAAAAAAAAAAAAAAAAAADxUpRqr41Rfc0n+YytW1q8Jw+U6MaX/yjFeCS/InMlr2t805ZCFQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//Z', 50, 5000, 1000),
(53, 'Chuột Gaming Fuhlen G102s', 'Model: G102s\r\nCảm biến quang học 3168 cực nhạy bén\r\nTùy chỉnh được các mức DPI 800120024003200dpi\r\nClick Huano tuổi thọ trên 10 triệu lần nhấn\r\nNúm cuộn được bọc cao su chống trượt', 199000, 1199000, 18, 'https://sp-one.vn/Content/uploads/2023/02/Chuot-Fuhlen-G102s-1.jpg', 50, 5000, 1000),
(54, 'Chuột DAREU LM121 – Trắng (RGB, SILENT CLICK)', 'Sensor: SPCP190\r\nDPI: 800 ~ 6400\r\nPolling rate: 100Hz\r\nSwitch: Huano (10 triệu lần click)\r\nKích thước: 116*60*35mm', 199000, 1199000, 18, 'https://sp-one.vn/Content/uploads/2023/09/chuot-gaming-dareu-lm121-rgb-silent-click-white.jpg', 50, 5000, 1000),
(55, 'Tai Nghe Sony MDR-E9LP/BZ1E', 'Điều khiển cảm ứng đa chức năng , có chức năng ra lệnh bằng giọng nói-\r\nBluetooth® 5.0, Chống thấm nước chuẩn IPX4\r\nHộp sạc tai nghe được tích hợp loa bluetooth-\r\nThời gian sử dụng liên tục :  5 tiếng cho mỗi lần sạc đầy tai nghe.-\r\nThời gian sạc đầy tai nghe khoảng 1 giờ, pin tai nghe 45mAh*2', 699000, 1699000, 17, 'https://sp-one.vn/Content/uploads/2023/04/Tai-nghe-Loa-Bluetooth-TWS-Evoxz-EVo2-600x600.jpg.webp', 50, 5000, 1000);
INSERT INTO `products` (`productId`, `productName`, `information`, `price`, `priceOld`, `categoryId`, `productlmgMain`, `availableQuantity`, `numberViewed`, `purchases`) VALUES
(56, 'Loa Microlab B26', 'Hãng sản xuất: Microlab\r\nTình trạng: Mới\r\nBảo hành: 12 Tháng', 280000, 1280000, 17, 'https://sp-one.vn/Content/uploads/2024/01/loa-microlab-b26-3_dd8a5103f96441a59a10674f1199de47_ce3f59b08b584196a8f8fecaefa91053_grande-1.webp', 46, 5000, 1004),
(57, 'Tai nghe JBL Quantum50', 'Tai nghe Gaming JBL Quantum 5\r\nThiết kế In ea-\r\nDriver 8.6mm cho âm thanh chân thực, rõ ràng-\r\nTích hợp bộ điều khiển âm trên dây tiện lợi-\r\nMicro thu nhận giọng nói vượt trội\r\nTương thích nhiều hệ máy : PC/MAC/Xbox/PS4/Nintendo Switch/Mobile/VR', 890000, 1890000, 17, 'https://sp-one.vn/Content/uploads/2021/03/55689_tai_nghe_gaming_jbl_quantum_50_tim_0001_2-600x600.jpg', 44, 5001, 1006),
(58, 'DareU VH350S 7.1 (USB)', 'Xuất xứ thương hiệu	Trung Quốc\r\nKích thước	Driver: Φ40mm * 10 mm(H)\r\nModel	DAREU-VH350S\r\nMàu/mẫu	Black\r\nLoại Jack cắm	USB 3.5', 389000, 1389000, 17, 'https://sp-one.vn/Content/uploads/2019/04/adeba568c9520c139c56f691fae5e180.jpg.png', 34, 5000, 1016),
(59, 'Tai Nghe Gaming Fuhlen H200S RGB 7.1', 'Thiết kế Over-ear\r\nKết nối USB Led RGB\r\nChất lượng âm thanh 7.1 Surround\r\nMicrophone khử tiếng ồn\r\nChất liệu kim loại, đệm tai mềm mại\r\nHỗ trợ Win/Mac linh hoạt', 399000, 1399000, 17, 'https://sp-one.vn/Content/uploads/2023/08/H200S-sp-one-2.jpg', 50, 5000, 1000),
(60, 'Tai nghe gaming DareU EH416', '', 435000, 1435000, 17, 'https://sp-one.vn/Content/uploads/2019/04/11108-1.png', 50, 5000, 1000),
(61, 'Loa vi tính Microlab U210(BL,Radio,2.1)', 'Hệ thống loa hiện đại gồm 2 loa vệ tinh và 1 loa siêu trầm\r\nBảng điều khiển mặt trước loa siêu trầm điều chỉnh âm thanh thuận tiện\r\nLoa vi tính Microlab hỗ trợ kết nối không dây bluetooth 5.0\r\nTổng công suất 11W đem lại âm thanh chân thực và sống động\r\nHỗ trợ chơi nhạc trực tiếp từ thẻ nhớ SD hay USB', 450000, 1450000, 17, 'https://sp-one.vn/Content/uploads/2024/01/10050588-loa-vi-tinh-microlab-u210-1.jpg', 50, 5000, 1000),
(62, 'Tai nghe Bluetooth TWS Evoxz X1', 'Thương hiệu: Evoxz\r\nTai nghe Bluetooth\r\nMàu sắc: Black\r\nChống thấm nước IPX5\r\nThời gian nghe nhạc/thoại lên đến 6 tiếng\r\nTrợ lý giọng nói, nút bấm điều khiển đa chức năng', 499000, 1499000, 17, 'https://sp-one.vn/Content/uploads/2023/04/Tai-nghe-Bluetooth-TWS-Evoxz-X1-02.jpg', 50, 5000, 1000),
(63, 'Tai Nghe DAREU EH925 RGB thế hệ mới', '', 950000, 1950000, 17, 'https://sp-one.vn/Content/uploads/2019/04/28254_dareu_eh925_rgb__2__master-600x600.jpg\r\n', 50, 5000, 1000),
(64, 'Tai Nghe Gaming Có Dây DareU EH722X 7.1', 'Sản xuất tại	Trung Quốc\r\nModel	EH722X\r\nHỗ trợ đàm thoại	Có\r\nLoại Jack cắm	USB\r\nĐộ nhạy	116dB/±3dB', 649000, 1649000, 17, 'https://sp-one.vn/Content/uploads/2019/04/5889096a1829113f6d166661c83b2435.jpg', 50, 5000, 1000),
(65, 'Tai Nghe Nhét Tai JBL Focus 300', 'Sản xuất tại	Trung Quốc\r\nModel	Focus 300\r\nHỗ trợ đàm thoại	Có\r\nLoại Jack cắm	3.5mm\r\nDải tần số	20Hz – 20kHz', 690000, 1690000, 17, 'https://sp-one.vn/Content/uploads/2019/04/471f892f90bfdb17c223d43382f5aa28.jpg', 50, 5000, 1000),
(66, 'LOA VI TÍNH MICROLAB G100BT – 2.1 – MÀU ĐEN', 'Thiết kế đẹp mắt, đầy tinh xảo\r\nẤn tượng đầu của bộ Loa Bluetooth Microlab G100BT/2.1 là thiết kế vuông vắn đầy tinh tế. Với vẻ ngoài là một màu đen chất lừ, loa vi tính Microlab chắc chắn sẽ là người bạn đồng hành cực chất với những thiết bị tối tân nhà bạn.\r\nChất lượng âm thanh ấn tượng', 690000, 1690000, 17, 'https://sp-one.vn/Content/uploads/2024/01/66375_loa_vi_tinh_microlab_g100bt_mau_den_4.jpg', 50, 5000, 1000),
(67, 'Tai nghe DAREU EH722X ARTIC\r\n', 'Bảo hành: 12 THÁNG\r\nMô tả sản phẩm\r\nTai nghe Over Ear - MULTI LED Driver: Φ50mm * 10 mm(H) Sound Solution: DareU-108B Hiệu ứng: giả lập 7.1 Kết nối: USB Đệm tai: da mềm Headband: kim loại Frequency Range: 20Hz-20KHz Dây: 2.4m Trọng lượng: 300 +/- 10g', 699000, 1699000, 17, 'https://sp-one.vn/Content/uploads/2023/05/tai-nghe-gaming-eh722x-02.png', 50, 5000, 1000),
(68, 'Loa M2232.1', '', 735000, 1735000, 17, 'https://sp-one.vn/Content/uploads/2019/04/322210_238955loamicrolabm22323.jpg', 50, 5000, 1000),
(69, 'Tai nghe ASUS TUF Gaming H1', 'Tai nghe ASUS TUF Gaming H1\r\nDriver ASUS Essence và công nghệ âm thanh buồng kín mang lại âm thanh chất lượng cao\r\nÂm thanh vòm ảo 7.1 được hỗ trợ bởi Windows Sonic\r\nMicro 1 chiều chất lượng cao được Discord và TeamSpeak chứng nhận cho khả năng giao tiếp trong trò chơi rõ ràng', 760000, 1760000, 17, 'https://sp-one.vn/Content/uploads/2022/04/62326_tai_nghe_asus_tuf_gaming_h1_0002_3.jpg', 50, 5000, 1000),
(70, 'Loa Vi Tính Microlab M-223 2.1 17W', '', 780000, 1780000, 17, 'https://sp-one.vn/Content/uploads/2019/08/223.jpg', 50, 5000, 1000),
(71, 'Tai nghe MSI Gaming H991', 'Model:	H991\r\nKiểu tai nghe:	Tai nghe chụp tai\r\nLoại tai nghe:	Có dây\r\nĐèn Led:	Không\r\nKết nối:	3.5', 790000, 1790000, 17, 'https://sp-one.vn/Content/uploads/2021/03/msi-gaming-h991_9f8331175f3b4721a031e1ff24eef59d-1.jpg', 50, 5000, 1000),
(72, 'Tai nghe gaming Asus Cerberus V2 Blue', 'Tai nghe ASUS Cerberus V2 (Blue, 3.5)\r\nTrình điều khiển Asus Essence 53mm độc quyền mang đến chất lượng âm thanh đáng kinh ngạc\r\nHeadband bằng thép không gỉ hoàn toàn mới mang đến độ bền tốt hơn và kiểu dáng thời trang hơn', 797000, 1797000, 17, 'https://sp-one.vn/Content/uploads/2021/01/53851_tai_nghe_asus_cerberus_v2_blue_0003_4-1.jpg', 50, 5000, 1000),
(73, 'TAI NGHE MSI IMMERSE GH30', 'Large 40mm drivers\r\nExtra 3.5mm splitter cable to use microphone and speaker on PC\r\nLightweight and foldable headband design\r\nDetachable microphone\r\nEasy volume and microphone control\r\nCarry pouch included in retail box', 890000, 1890000, 17, 'https://sp-one.vn/Content/uploads/2019/12/product_6_20190708133832_5d22d6d8b159c.png', 49, 5001, 1001),
(74, 'Tai Nghe Bluetooth Thể Thao JBL T110BT', 'Sản xuất tại:Trung Quốc-\r\nModel:T110BT-\r\nHỗ trợ đàm thoại:Có-\r\nBluetooth:4-\r\nThời gian pin:6 giờ-\r\nDung lượng pin (mAh):120mAh;-', 890000, 1890000, 17, 'https://sp-one.vn/Content/uploads/2019/04/6.u4939.d20171010.t114909.716301.jpg', 50, 5000, 1000),
(75, 'Tai Nghe DAREU EH925 RGB', 'Xuất xứ thương hiệu	Trung Quốc\r\nModel	EH925\r\nMàu/mẫu	Đen Nhám Đen\r\nLoại Jack cắm	USB', 950000, 1950000, 17, 'https://sp-one.vn/Content/uploads/2019/04/28254_dareu_eh925_rgb__2__master.jpg', 50, 5000, 1000),
(76, 'Tai nghe Corsair HS35 – Blue', '', 979000, 1979000, 17, 'https://sp-one.vn/Content/uploads/2019/07/2-750x750-1.jpg', 50, 5000, 1000),
(77, 'Chuột Gaming Logitech G502 X Black', '', 1450000, 2450000, 18, 'https://sp-one.vn/Content/uploads/2022/11/g502x-corded-gallery-1-black_f0e0cd7830324d7aa9ac02b80e1d4434.webp', 50, 5000, 1000),
(78, 'Chuột Corsair Dark Core Wireless Mouse RGB SE (CH-9315111-AP)', '', 2419000, 3419000, 18, 'https://sp-one.vn/Content/uploads/2018/12/chuot-corsair-dark-core-rgb-pro-se-2_b4ad81f8b21f46c9b5db3afbf5d262da-600x600.jpg', 50, 5000, 1000),
(79, 'Chuột MOTOSPEED V60 RGB gaming', 'Led RGB 16,8 triệu màu, tùy chỉnh bằng driver.\r\n- Switch Omron 20 triệu lần click.\r\n- Mắt đọc cao cấp Pixart PMW 3325.\r\n- Tích hợp led gầm RGB 10 hiệu ứng tuyệt đẹp.\r\n- 8 mức DPI lên tới 5000 (dùng driver max 9000).\r\n- Thiết kế công thái học (ergonomic) giúp bạn cầm lâu mà ko mỏi, 2 bên hông chuột có lớp cao su chống trượt.\r\n- Dây bện vải dù chắc chắn, USB mạ  vàng.', 349000, 1349000, 18, 'https://sp-one.vn/Content/uploads/2020/11/v60-1-600x600.jpg', 50, 5000, 1000),
(80, 'Tản Nhiệt Nước CPU Deepcool LT720 Black High – Perfotmance', 'Socket hỗ trợ:-LGA2066/2011.v3/2011/1700/1200/1151/1150/1155/sTRX4/sTR4/AM5/AM4-\r\nKích thước Raid: 402×120×27 mm, Aluminum-\r\nKích thước bơm: 94×80×68 mmTốc độ bơm: 3100 RPM±10%-\r\nKích thước quạt: 120×120×25 mmĐầu nối bơm: 3 chânTốc độ quạt: 500~2250 RPM±10%-\r\nĐầu nối quạt: 4pin PWM-\r\nLoại trục quay: Fluid Dynamic Bearing (FDB)-\r\nĐồng bộ hiệu ứng: Addressable RGB LED', 2990000, 3990000, 12, 'https://sp-one.vn/Content/uploads/2023/03/44220_t___n_nhi___t_n_____c_cpu_deepcool_lt720_black_high___perfotmance.jpg', 46, 5001, 1004),
(81, 'Thermalright Aqua Elite 360 ARGB White – AIO CPU Cooler', 'Radiator Dimension 397mm * 120mm * 27mm-\r\nWaterblock Dimension 72mm * 72mm * 48mm-\r\nWater pipe 450mm-\r\nSpeed 2600 RPM ± 10%', 1990000, 2990000, 12, 'https://sp-one.vn/Content/uploads/2022/07/Thermalright-Aqua-Elite-360-ARGB-White-AIO-CPU-Cooler-H1-600x600.webp', 50, 5000, 1000),
(82, 'Tản nhiệt NZXT Kraken 240 RGB Black', 'Số lượng : 2 Fan-\r\nKích thước : 120 x 120 x 26mm-\r\nTốc độ : 500-1,800 ± 180 vòng/phút-\r\nLưu lượng khí : 21.67 _ 78.02 m³/phút-\r\nÁp suất không khí : 0.75 _ 2.7mm-H2O', 4210000, 5210000, 12, 'https://sp-one.vn/Content/uploads/2023/05/71920_kraken_240_rgb.jpg', 50, 5000, 1000),
(83, 'Thermaltake TH240 V2 ARGB Snow', 'Socket hỗ trợ: LGA2066/2011_v3/2011/1700/1200/1151/1150/1155/sTRX4/sTR4/AM5/AM4-\r\nKích thước Raid:276 x 120 x 27 mm, Aluminum-\r\nTốc độ bơm: 3300 RPM±10%-\r\nKích thước quạt: 120×120×25 mm-\r\nĐầu nối quạt: 4_pin PWM 500-2000RPM-\r\nĐồng bộ hiệu ứng: Addressable RGB LED', 2350000, 3350000, 12, 'https://sp-one.vn/Content/uploads/2023/12/cl-w364-pl12sw-a_01.jpg', 50, 5000, 1000),
(85, 'Tản nhiệt nước AIO Cooler Master MasterLiquid ML240P Mirage RGB', '', 3839000, 4839000, 12, 'https://sp-one.vn/Content/uploads/2019/11/1-gallery-ml240p_mirage-zoom-600x600.png', 50, 5000, 1000),
(86, 'Bàn phím cơ DareU EK8100 RGB', 'Switch : D Switch - Blue/Red/Brown Led : RGB', 649000, 1649000, 16, 'https://sp-one.vn/Content/uploads/2023/07/ek8100_1_22968c292e96463cb303ba7a9eb054b1_76b57ef9184b4961812b0c43b571db2d_master.webp', 50, 5000, 1000),
(87, 'Bàn phím cơ không dây DarkFlash GD87 Sugar Brown Yellow Axis switch', 'Bàn phím cơ DarkFlash GD87 Sugar Brown Yellow Axis switch-\r\n2 chế độ kết nối: Không dây 2,4Ghz và Có dây usb-\r\nHỗ trợ hotswab 3 pin-\r\nSwitch cao cấp độ bền 50 triệu lần bấm-\r\nPin sạc dung lượng cao, thời lượng pin lên tới 90 ngày', 750000, 1750000, 16, 'https://sp-one.vn/Content/uploads/2023/09/46185_darkflash_gd87_sugar_brown__1_.jpg', 50, 5000, 1000),
(88, 'Bàn phím AKKO 3084 v2 RGB – White', 'Foam tiêu âm / Hotswap / AKKO CS Jelly Pink/Purple switch', 1690000, 2690000, 16, 'https://sp-one.vn/Content/uploads/2022/08/AKKO-3084-v2-RGB-White-01-600x743.jpg', 50, 5000, 1000),
(89, 'Bàn phím ASUS TUF Gaming K3\r\n', 'Nhà Sản Xuất : Asus-\r\nTình Trạng : Mới-\r\nBảo Hành : 24 tháng-\r\nSwitch: Red Switch', 1890000, 2890000, 16, 'https://sp-one.vn/Content/uploads/2022/04/25f5d8789d826c05974252bd736cdbfd_798a8afa71f348e1b1ede2d3fc65907c-1-600x600.webp', 50, 5000, 1000),
(90, 'Bàn phím cơ AKKO 5075B Plus White (Multi-modes / RGB / Gasket mount,SW V3/Cream Blue Pro)', 'Layout 75%, có núm xoay-\r\nLED RGB có thể nháy theo nhạc và có cả led viền-\r\nGasket mount giúp âm gõ “êm tai”-\r\nKeycap ASA profile, PBT Double-Shot với khả năng xuyên LED-\r\nStab đã được tinh chỉnh sẫn, sử dụng akko switch v3 – Cream Blue Pro giúp', 1799000, 2799000, 16, 'https://sp-one.vn/Content/uploads/2023/09/akko-5075b-plus-white-04.jpg', 50, 5000, 1000),
(91, 'Bàn phím cơ Logitech G Pro X RGB Lightsync – Mechanical GX', '', 2950000, 3950000, 16, 'https://sp-one.vn/Content/uploads/2021/01/1-3-600x600.jpg', 50, 5000, 1000),
(93, 'Bàn phím cơ H95S Panda – Cherry profile', 'Thương hiệu: Fuhlen-\r\nLayout 95 phím (có Keymap)-\r\nKết nối 3 chế độ USB TypeC/ 2.4Ghz/ -Bluetooth 5.0-\r\nLed RGB 16,8 triệu màu và nháy theo nhạc-\r\nPin Lithium dung lượng 3000mAh', 2180000, 3180000, 16, 'https://sp-one.vn/Content/uploads/2023/08/H95s-panda-spone-1.jpeg', 49, 5001, 1001),
(94, 'BÀN PHÍM CƠ DAREU EK1280S V2 BLACK', 'Bàn phím cơ Dareu 1280S v2 Black-\r\nChuẩn kết nối: Dây USB-\r\nLayout Fullsize 104 phím-\r\nSử dụng switch \"D\" độc quyền của DareU-\r\nLed Rainbow, tích hợp thêm 2 dải led ở hông độc đáo', 900000, 1900000, 16, 'https://sp-one.vn/Content/uploads/2023/10/1280sv21.jpeg', 50, 5000, 1000),
(95, 'AKKO 3087 World Tour - Tokyo\r\n', 'Model: 3087 (Tenkeyless, 87 keys) Kết nối: USB Type C, có thể tháo rời Hỗ trợ NKRO Keycap: PBT Dye-Subbed Loại switch: Akko (Blue/Orange/Pink), tuổi thọ 50 triệu click Keycap custom lấy chủ đạo là màu hoa anh đào, núi Phú sĩ, cá chép và mèo may mắn (biểu tượng của Nhật Bản) Hỗ trợ multimedia, macro và có thể khóa phím windows Phụ kiện: 1 sách hướng dẫn sử dụng + 1 keypuller + 1 cover che bụi + 1 dây cáp USB + keycap tặng kèm', 1299000, 2299000, 16, 'https://sp-one.vn/Content/uploads/2020/03/akko-world-tour-tokyo-3087-ava-510x631-1.jpg', 50, 5000, 1000),
(96, 'Bàn phím cơ AKKO 3068 v2 2021 Year of the Ox hotswap (Akko cs switch)', '', 1938000, 2938000, 16, 'https://sp-one.vn/Content/uploads/2021/06/ban-phim-akko-3068-v2-2021-year-of-the-ox-07-510x631-1.jpg', 50, 5000, 1000),
(97, 'Bàn phím cơ AKKO 3087 v2 DS Matcha Red Bean (Akko switch v2)', '', 1350000, 2350000, 16, 'https://sp-one.vn/Content/uploads/2021/06/ban-phim-co-akko-3087-ds-matcha-red-bean-01-510x631-1.jpg', 50, 5000, 1000),
(98, 'AKKO 3087 v2 Monet’s Pond (Akko switch v2)', 'Bàn phím cơ AKKO 3087 V2 Monet\'s Pond Akko Pink switch Model: 3087 (Tenkeyless, 87 keys) Kết nối: USB Type C, có thể tháo rời Kích thước: 360 x 140 x 40mm | Trọng lượng 0.95kg Hỗ trợ NKRO / Multimedia / Macro / Khóa phím windows Keycap: PBT Dye-Subbed – OEM Profile Loại switch: Akko switch (Blue/Orange/Pink) v2 Phụ kiện: 1 sách hướng dẫn sử dụng + 1 keypuller + 1 cover che bụi + 1 dây cáp USB Type-C to USB Tương thích: Windows / MacOS / Linux Bàn phím AKKO khi kết nối với MacOS: (Ctrl -> Control | Windows -> Command | Alt -> Option, Mojave OS trở lên sẽ điều chỉnh được thứ tự của các phím này)', 1559000, 2559000, 16, 'https://sp-one.vn/Content/uploads/2021/06/ban-phim-akko-3087-v2-monets-pond-01-600x743.jpg', 50, 5000, 1000),
(99, 'AKKO 3087 Dragon Ball Z Goku (Akko Switch Orange)\r\n', 'Model: 3087 (TKL, 87 keys)-\r\nKết nối: USB Type C, có thể tháo rời\r\nHỗ trợ NKRO-\r\nKeycap: PBT Dye Subbed, OEM profile\r\nBàn phím lấy cảm hứng từ nhân vật Goku (Songoku) trong bộ truyện tranh nổi tiếng “7 viên ngọc rồng” hay còn được biết đến với tên tiếng Anh là Dragon Ball. Bàn phím sử dụng tông màu chủ đạo là vàng vs cam cùng những họa tiết liên quan đến nhân vật Siêu Xayda Kakalot.-\r\nLoại switch: Akko Switch-\r\nHỗ trợ multimedia, macro và có thể khóa phím windows-\r\nPhụ kiện: 1 sách hướng dẫn sử dụng + 1 keypuller + 1 cover che bụi + 7 keycap tặng kèm + 1 dây cáp USB', 1490000, 2490000, 16, 'https://sp-one.vn/Content/uploads/2021/06/54675_ban_phim_akko_3087_dragon_ball_z_goku_akko_switch_orange_0002_3-1-600x600.jpg', 47, 5001, 1003),
(100, 'CREATOR i5 10400F | 16GB | GTX1650 4GB', 'CPU:i5-10400F-Main:H510M-Ram:16GB -SSD:SS 980 256GB NVME-VGA:GTX1650 4gb-PSU:550W-CASE:Xigmatek Gaming X 3FX', 12350000, 13350000, 3, 'https://sp-one.vn/Content/uploads/2022/12/5-1.jpg', 48, 7, 1003),
(101, 'CREATOR R5 7600X | 16GB D5 | RTX 3060', 'CPU:AMD R5 7600X-\r\nMain:Asus TUF B650m-\r\nRam:16GB  D5 -\r\nSSD:256GB NVME-\r\nVGA:RTX 3060 12GB-\r\nPSU:650W 80+ Bronze-\r\nCASE:Xigmatek Gaming X 3FX', 25550000, 26550000, 3, 'https://sp-one.vn/Content/uploads/2023/05/57.jpg', 48, 5002, 1002),
(102, 'CREATOR i5 13600K | 16GB | RTX 3060ti 08GB', 'CPU:Intel Core i5 13600K-\r\nMain:Asus TUF GAMING B760M A D4 -\r\nRam:G.SKILL16GB (2x 8GB) DDR4 3200MHz-\r\nSSD:SSD Samsung 980 PCIe NVMe 500GB gen3x4-\r\nVGA:RTX 3060 ti 08GB ultra white-\r\nPSU:750W – 80 Plus Bronze-\r\nCASE:Xigmatek Gaming X 3FX', 24399000, 25399000, 3, 'https://sp-one.vn/Content/uploads/2023/03/cr8.jpg', 48, 5, 1002),
(103, 'CREATOR i5 13400F | 16GB | RTX 3060Ti 8GB', 'CPU:Intel Core i5 13400F-\r\nMain:B660 PRO RS-\r\nRam:16GB DDR4 3200MHz (8x2)-\r\nSSD:SamSung 500GB-\r\nVGA:RTX 3060Ti 8GB ultra white-\r\nPSU:650W 80+ bronze-\r\nCASE:Xigmatek Gaming X 3F-\r\nTản:DeepCool AG400 ARGB', 23050000, 24050000, 3, 'https://sp-one.vn/Content/uploads/2023/03/cr15.jpg', 46, 5002, 1004),
(104, 'CREATOR i9 13900K|32GB|RTX 4080 16GB', 'CPU:CPU Intel Core i9-13900K (5.80GHz, 24 Nhân 32 Luồng, 30M Cache, Raptor Lake)-\r\nMAIN:MSI PRO Z790-P WIFI-\r\nRAM:RAM Kingston Fury Beast RGB 32GB (2x16GB) bus 5600 DDR5-\r\nVGA:VGA MSI GeForce RTX 4080 16GB VENTUS 3X OC GDDR6X-\r\nSSD:SSD Samsung 980 PCIe NVMe 500GB-\r\nPSU:1000W', 67550000, 68550000, 4, 'https://sp-one.vn/Content/uploads/2019/08/321.jpg', 35, 13, 1015),
(105, 'CREATOR R9 7900X | 16GB D5 | RTX 4070', 'CPU:AMD R9 7900X-Main:Asus TUF X670E-Ram:16GB D5-SSD:500GB NVME-VGA:RTX 4070 12GB-PSU7:850W 80+ Bronze-CASE:Xigmatek Gaming X 3FX', 49299000, 50299000, 4, 'https://sp-one.vn/Content/uploads/2023/05/59.jpg', 50, 5000, 1000),
(106, 'CREATOR i9 14900K | 32Gb | RTX4070', '\r\nCPU:Core i9 14900K-\r\nMain:MSI Z790 Gaming Wifi DDr5-\r\nRam:32Gb DDr5-\r\nSSD:512GB NVME-\r\nVGA:RTX 4070 12GB-\r\nPSU:850W-\r\nCASE:Magic MIX TOWER Black-\r\nTản:MasterLiquid ML360L V2 ARGB', 45450000, 46450000, 4, 'https://sp-one.vn/Content/uploads/2024/01/PC-1.jpg', 50, 5008, 1000),
(107, 'CREATOR i7 13700K | 32GB | RTX3060Ti 8GB', '\r\nCPU:Core i7 13700K-\r\nMain:B760-A ROG Gaming D4-\r\nRam:32Gb Corsair Dominator-\r\nSSD:SamSung 256GB NVME-\r\nVGA:RTX 3060Ti 8GB-\r\nPSU:750W-\r\nCASE:H9 Flow White-\r\nTản:Deepcool LT720 White', 38150000, 39150000, 4, 'https://sp-one.vn/Content/uploads/2023/08/lap-7.jpg', 48, 5003, 1002),
(108, 'Màn hình iPRO MF2203-V', 'Kích Thước : 22inch-\r\nTấm nền IPS-\r\nĐộ Phân giải Full HD 1920 x 1080-\r\nTần số quét :  75Hz-\r\nThời gian đáp ứng : 5ms-\r\nCổng kết nối : HDMI, VGA', 1575000, 2575000, 15, 'https://sp-one.vn/Content/uploads/2024/01/npc-mf2203-v-215-inch-fhd-led-display-hdmi-vga-11688203269.webp', 50, 5000, 1000),
(109, 'MÀN HÌNH DAHUA DAHUA DHI-LM24-C201', 'Kích thước: 23.8 inch-\r\nĐộ phân giải: FHD 1920 x 1080-\r\nTấm nền: IPS-\r\nThời gian phản hồi: 6ms-\r\nTần số quét: 75Hz-\r\nTỉ lệ tương phản: 1000:1-\r\nĐộ sáng: 250cd/m2-\r\nVESA: 75x75mm-\r\nCổng kết nối: VGA x1, HDMI x1, Audio 3.5mm-\r\nPhụ kiện: Bộ nguồn, HDMI', 1990000, 2990000, 15, 'https://sp-one.vn/Content/uploads/2023/07/man-hinh-lcd-dahua-dhi-lm24-c201.png', 50, 5000, 1000),
(110, 'Màn Hình LG 27UP600-W 4K', 'Màn Hình LG 27 Inch-\r\nKích Thước: 27 Inch-\r\nĐộ Phân Giải: 3840 x 2160-\r\nTần Số Quét: 60Hz-\r\nĐộ phủ màu: 95% DCI-P3-\r\nBảo hành: 24 tháng-', 6580000, 7580000, 15, 'https://sp-one.vn/Content/uploads/2021/03/sp-one-27up600-1-600x600.jpg', 49, 5001, 1001),
(111, 'Màn hình Samsung LC27R500FHEXXV', 'Kích thước: 27\"-\r\nĐộ phân giải: 1920 x 1080 ( 16:9 )-\r\nCông nghệ tấm nền: VA-\r\nGóc nhìn: 178 (H) / 178 (V)-\r\nTần số quét: 60Hz-\r\nThời gian phản hồi: 4 ms', 4980000, 5980000, 15, 'https://sp-one.vn/Content/uploads/2022/05/unnamed.webp', 50, 5000, 1000),
(112, 'LG 34GL750(34inch, Full-HD 21:9, IPS, 144Hz 1ms)', '\r\nTương thích NVIDIA G-Sync®-\r\nCông nghệ đồng bộ hóa hình ảnh-\r\nHDR10-\r\nIPS với 99% sRGB-\r\nTốc độ làm mới 144Hz-\r\n1ms Motion Blur Reduction-', 9960000, 10960000, 15, 'https://sp-one.vn/Content/uploads/2019/12/34GL750-600x600.png', 50, 5000, 1000),
(113, 'LG 34GN850 34inch QHD(3440X1440) NANO IPS 160HZ 1MS', 'Kích thước 34-inch UltraWide™-\r\nĐộ phân giải QHD (3440x1440) Curved-\r\nTấm nền Nano IPS 1ms (GtG)-\r\nNVIDIA G-SYNC® Compatible-\r\nTần số 160Hz (Overclock)-\r\nVESA DisplayHDR™400-\r\nCổng xuất hình: HDMI, Display Port, USB', 20490000, 21490000, 15, 'https://sp-one.vn/Content/uploads/2020/05/u_10205235-1-600x532.jpg', 50, 5000, 1000),
(114, 'Màn Hình LG 32UN650', '', 10290000, 11290000, 15, 'https://sp-one.vn/Content/uploads/2021/03/techzones-lg-27up850-w-27in-uhd-4k-ips-displayhdr-400-600x600.jpg', 50, 5000, 1000),
(115, 'Màn hình LG 34WP500-B UltraWide™ 34 inch UW FHD HDR (IPS/75Hz/5ms GtG/95% sRGB/HDMI)', 'Model 34WP500-B-\r\nKích thước màn hình 34-inch-\r\nĐộ phân giải UWFHD 2560x1080-\r\nTỉ lệ màn hình 21:9-\r\nGóc nhìn (H/V) 178º(R/L), 178º(U/D)-\r\nMật độ điểm ảnh ( PPI ) 82 ppi-\r\nĐộ sáng 250 cd/m²-\r\nTấm nền IPS-\r\nKích cỡ điểm ảnh 0.312 x 0.31 mm', 6950000, 7950000, 15, 'https://sp-one.vn/Content/uploads/2021/03/Man-Hinh-LG-29WP500-B-songphuong.vn_-600x600-1.jpg', 50, 5000, 1000),
(117, 'Màn hình Dell UltraSharp U2422H', '- Hãng sản xuất: Dell\r\n- Bảo hành: 36\r\n- Kích thước màn hình: 23.8\"\r\n- Độ phân giải: Full HD (1920x1080)\r\n- Tấm nền: IPS', 5590000, 6590000, 15, 'https://sp-one.vn/Content/uploads/2021/06/19327_lcd_dell_ultrasharp_u2422h_23_8_inch-1-600x440.jpg', 50, 5000, 1000),
(118, 'Màn hình bảo vệ mắt Lenovo L24i-40 67A8KAC3VN ', 'Kiểu màn hình: Màn hình văn phòng-\r\nKích thước màn hình: 23.8Inch-\r\nĐộ phân giải: Full HD (1920x1080)-\r\nThời gian đáp ứng: 4ms-\r\nTần số quét: 100HZ-\r\nĐộ sáng: 250cd/m2', 2790000, 3790000, 15, 'https://sp-one.vn/Content/uploads/2024/03/screenshot_1709700533.png', 50, 5001, 1000),
(119, 'Màn hình máy tính Dahua DHI-LM22-C201 21.45 inch FHD VA', 'Kích thước: 21.5 inch-\r\nTấm nền: VA-\r\nĐộ phân giải: FHD (1920 x 1080)-\r\nTốc độ làm mới: 75Hz-\r\nThời gian đáp ứng: 6.5ms-\r\nCổng kết nối: HDMI™, VGA', 1690000, 2690000, 15, 'https://sp-one.vn/Content/uploads/2023/09/dhi-lm22-c201-500x500-1.webp', 46, 5000, 1004),
(120, 'Màn hình Huawei MateView 28 28.2Inch 4K UHD', 'Hãng SX: Huawei-\r\nModel: MateView 28-\r\nKích thước: 28.2Inch-\r\nĐộ phân giải: 4K UHD (3840 x 2560)-\r\nTấm nền: IPS-\r\nTần số quét: 60Hz-\r\nTỷ lệ khung hình: 3:2-\r\nĐộ sáng: 500nits-\r\nTỷ lệ tương phản: 1200:1 (typical)-\r\nHỗ trợ màu: 1.07 tỉ màu', 16990000, 17990000, 15, 'https://sp-one.vn/Content/uploads/2022/05/20241_man_hinh_huawei_mateview_28_28_2inch_4k_uhd_1-600x450.jpg', 50, 5000, 1000),
(121, 'Màn hình ASUS VA27EHE', 'Panel Size: Wide Screen 27.0\"(68.6cm) 16:9-\r\nPanel Type : IPS-\r\nTrue Resolution : 1920x1080-\r\nRefresh Rate(max) : 75Hz', 5340000, 6340000, 15, 'https://sp-one.vn/Content/uploads/2019/11/719Y0U-F42L._AC_SL1500_-600x600.png', 50, 5000, 1000),
(122, 'Màn Hình LG 32EP950-B Oled', '32 inch, 3840 x 2160, OLED, 60Hz, 1ms', 76950000, 77950000, 15, 'https://sp-one.vn/Content/uploads/2021/03/techzones-lg-ultrafine-32ep950-b-32in-oled-4k-usb-c-600x600.jpg', 50, 5000, 1000),
(123, 'Case NZXT H6 RGB FLOW ALL WHITE', 'Nhà sản xuất: NZXT-\r\nMàu: Trắng-\r\nBảo hành: 12 Tháng-\r\nHỖ TRỢ MAINBOARD: Mini-ITX, ATX, M-ATX-\r\nHỖ TRỢ TẢN NHIỆT: Trên cùng : Lên tới 360 mm', 3250000, 4250000, 13, 'https://sp-one.vn/Content/uploads/2023/11/1698160780-h6-flow-rgb-hero-white.webp', 47, 5000, 1003),
(124, 'Case MIK LV12 mini ELITE-WHITE', 'Mặt trước: Kính cường lực với dải LED-\r\nKhung: Thép dày 0,8mm-\r\nHỗ trợ mainboard: ITX, mATX.-\r\nHỗ trợ ổ cứng: 1 x 3.5\" HDD, 2 x 2.5\" SSD-\r\nHỗ trợ VGA 320mm, tản nhiệt CPU 140mm, nguồn: 160mmReserved fan ports: front: 2x120mm( optional), side: 2x120mm( optional), top: 2x120mm( optional), bottom: 2x120mm( optional)-\r\nMàu sắc: Đen-\r\nKích thước : L: 338 x W:255 x H: 335mm.-\r\nCân nặng: 4.5kg-\r\nCASE CHƯA KÈM THEO QUẠT (FAN)', 950000, 1950000, 13, 'https://sp-one.vn/Content/uploads/2023/04/42682_mik_lv12_mini_elite__white_5.jpg', 50, 5001, 1000),
(125, '\r\nCase Silverstone RL07W\r\n', '', 2480000, 3480000, 13, 'https://sp-one.vn/Content/uploads/2019/03/2-24-600x603.jpg', 50, 5000, 1000),
(126, 'Case Thermaltake View 300 MX Black ARGB', 'KÍCH THƯỚC (HXWXD)505x230x506mm-\r\nVật liệu:SPCC + ABS-\r\nHỗ trợ chiều cao CPU: 175mm-\r\nGiới hạn chiều dài VGA: 280mm (Có bình chứa), 400mm (Không có hồ chứa)-\r\nGiới hạn chiều dài PSU: 200mm', 3390000, 4390000, 13, 'https://sp-one.vn/Content/uploads/2023/12/view300mx_5.jpg', 44, 5000, 1006),
(127, 'Case Montech SKY TWO White (Mid Tower/Màu Trắng) – 4 FAN ARGB', 'Montech SKY TWO White-\r\nMain hỗ trợ: ATX,Micro-ATX,Mini-ITX-\r\nĐi kèm 4 FAN 120mm ARGB-\r\nCổng kết nối: 1xType-C, 2xUSB3.0, 1xMic, 1xAudio, LED Button', 2150000, 3150000, 13, 'https://sp-one.vn/Content/uploads/2023/07/vo-case-moctech-sky-two-white-1-500x500-1.webp', 50, 5000, 1000),
(128, '\r\nCASE MAGIC AQUA-M ULTRA Plus WHITE (M-ATX)\r\n', 'Thương hiệu MAGIC-\r\nKích thước sản phẩm 380*270*350mm-\r\nForm Factor M-ATX, ITX-\r\nHỗ trợ bộ nguồn ATX-\r\nKhoang ổ đĩa: 2.5\" HDD & SSD x 2, 3.5\" HDD x 1-\r\nCổng I/O: USB 3.0 * 1, USB 2.0 * 2, HD AUDIO * 1-\r\nHỗ trợ Fan Case: Right - 120mm * 2, Bottom - 120mm * 3, Top - 120mm * 3, Rear - 120mm * 1-', 860000, 1860000, 13, 'https://sp-one.vn/Content/uploads/2023/10/Trang-1.png', 50, 5000, 1000),
(129, 'Case HYTE-Y40 Black', 'Mid-Tower ATX PC Case-\r\nĐược thiết kế để show trưng bày một cách tối đa trên góc làm việc của bạn.-\r\nCase ATX Panoramic Tempered Glass, có sẵn hai fan 120mm, PCI-E 4.0 Riser Cable, Vertical Mount đi kèm-\r\nĐi kèm với 2 quạt 120mm được lắp sẵn, phía dưới và phía sau.-', 3990000, 4990000, 13, 'https://sp-one.vn/Content/uploads/2023/08/HYTE-Y40-Black-H1.jpg.webp', 50, 5000, 1000),
(130, 'Vỏ Case Montech KING 95 PRO Black', 'Ngoài màn hình phẳng: Sức hấp dẫn của trải nghiệm kính cong-\r\nGiải phóng sức mạnh kiên cường: Kính cường lực kiên cường-\r\nChiếu sáng ARGB thẩm mỹ-\r\nSự hài hòa về phần cứng với buồng đôi: -Khả năng tương thích vượt trội-\r\nNhiều tùy chọn làm mát: Chất lỏng, không khí và thân thiện với quạt-\r\nThiết kế quản lý cáp hợp lý-\r\nĐổi mới trong mọi khung hình: Giá treo quạt bên hông được cấp bằng sáng chế của chúng tôi-\r\nThiết kế chính xác: Tấm lưới cao cấp đi kèm\r\nPháo đài sạch sẽ: Bảo vệ PC của bạn bằng các bộ lọc tích hợp\r\nMỗi sắc thái kể một câu chuyện: Sự lựa chọn của bạn về bốn sắc thái\r\nNgoài mặc định: Trải nghiệm phiên bản Pro của KING 95!', 3550000, 4550000, 13, 'https://sp-one.vn/Content/uploads/2024/01/king95pro-sp-one-8.png', 50, 5000, 1000),
(131, 'LIAN-LI PC – O11 Dynamic Evo White', 'Dải led thiết ké độc đáo có khả năng đồng bộ led với Mainboard-\r\nTính năng nút nguồn đa hướng và mô-đun IO có thể di chuyển-\r\nHỗ trợ Radiator kích thước 360mm x3 và tối đa 10 quạt-\r\nCung cấp không gian rộng rãi có thể gắn 9 ổ lưu trữ-\r\nNgăn quản lý dây chuyên nghiệp-\r\n5 phụ kiện tùy chọn mở rộng mua thêm ( bộ dựng GPU thẳng, bộ dựng GPU dọc, I/O bổ sung, bộ lưới phía trước, bộ I/O phía trên )', 3550000, 4550000, 13, 'https://sp-one.vn/Content/uploads/2022/10/65514_lianli_o11_evo_full__8_.jpg', 50, 5000, 1000),
(132, 'Case 1STPLAYER Mi2 Black\r\n', 'Model: Mi2-\r\nHỗ trợ Main: M-ATX/ITX-\r\nỔ cứng hỗ trợ:  5.25\" CD ROM: 0/ 3.5\" HDD: 1+2.5\" SSD: 1-\r\nChiều cao VGA: 310mm', 699000, 1699000, 13, 'https://sp-one.vn/Content/uploads/2023/08/Mi2-den-sp-one-1.jpg', 50, 5000, 1000),
(133, 'Case 1STPLAYER Fire Dancing V4 White', 'Kích thước: 435mmL*201mmW*435mmH-\r\nMàu sắc: Trắng-\r\nCổng I/O: USB3.0 x1, USB2.0 x2, HD AUDIO-\r\nChuẩn main hỗ trợ: ATX, Micro ATX-\r\nSố fan hỗ trợ: Max 8 fan (Trước 3 x12cm, trên 2x12cm, sau 1x12cm, dưới 2x12cm)', 950000, 1950000, 13, 'https://sp-one.vn/Content/uploads/2023/08/case-may-tinh-1stplayer-v4-white-rgb-v4-wh-4f1-w.webp', 50, 5000, 1000),
(134, 'H510i – WHITE BLACK ', '', 2560000, 3560000, 13, 'https://sp-one.vn/Content/uploads/2019/07/large_c5125c81bdfe961b-600x600.jpg', 50, 5000, 1000),
(135, 'Vỏ Case Segotep Gank 5 ', '', 1050000, 2050000, 13, 'https://sp-one.vn/Content/uploads/2020/07/se2-2.jpg', 50, 5000, 1000),
(136, 'Case Hyte Revolt 3', 'Chất liệu: Nhôm, Thép, ABS-\r\nKích thước: 253 x 178 x 409mm (9.9\" D x 7\" W x 16.1\" H)-\r\nKích thước bo mạch chủ: ITX-\r\nHỗ trợ card đồ họa: Hầu hết các card lên đến 335 x 140 x 58mm*-\r\nHỗ trợ tản nhiệt nước: 120, 240, 140, 280mm lên đến 35mm độ dày-\r\nChiều cao tản nhiệt CPU: Lên đến 140mm', 3550000, 4550000, 13, 'https://sp-one.vn/Content/uploads/2023/08/HypeRevolt3Black-sp-one.vn-1.jpg', 50, 5000, 1000),
(137, 'VỎ CASE MÁY TÍNH ROSI C380', 'Hỗ trợ mainboard: Micro ATX/ Mini ATX-\r\nCổng giao tiếp: (I/O) 2 x USB 3.0 / 2 x USB 2.0 / HD Audio-\r\n Mặt hông trái thép SPCC-\r\nMặt hông phải thép SPCC + Fan 12-\r\nKhung chịu lực vỏ máy tính: Thép SPCC- 0.45mm sơn đen chống tĩnh điện-\r\n Phụ kiện đi kèm: Ốc vít-\r\nKích thước vỏ : 390 x 204 x 350mm', 299000, 1299000, 13, 'https://sp-one.vn/Content/uploads/2022/03/402d4ab27e790e50c049507327d0f83f.jpg_2200x2200q80.jpg_.webp', 50, 5000, 1000),
(138, 'NGUỒN MÁY TÍNH AIGO GB650 – 650W (80 PLUS BRONZE/MÀU ĐEN)', 'Thiết kế mạch DC-DC-\r\nTiếng ồn thấp-\r\nThiết kế non-modular-\r\nCông suất 650w-\r\n80 Plus Bronze-', 1190000, 2190000, 11, 'https://sp-one.vn/Content/uploads/2023/11/70155_gb650__3_.jpg', 49, 5000, 1001),
(139, 'Nguồn MSI MPG A650GF 650W – 80 Plus Gold – Full Modular', 'Thiết kế cáp đầy đủ mô-đun-\r\nThiết bị cáp phẳng-\r\nĐược chứng nhận 80 Plus Gold cho hiệu quả cao-\r\n100% tụ điện 105 ° C Nhật Bản-\r\nThiết kế PFC hoạt động-\r\nBảo vệ cấp độ công nghiệp với OVP, OCP, OPP, OTP, SCP, UVP', 2590000, 3590000, 11, 'https://sp-one.vn/Content/uploads/2021/05/MSI-MPG-A650GF-songphuong.vn_-600x600.jpg', 49, 5001, 1001),
(141, 'XIGMATEK POLIMA M12-600/ M550\r\n', '', 320000, 1320000, 11, 'https://sp-one.vn/Content/uploads/2019/09/unnamed-600x600.jpg', 49, 5000, 1001),
(142, 'LUX RGB 750W 80 Plus Bronze', 'Thiết kế LED RGB Vivid Prism-\r\n13 hiệu ứng ánh sáng điều khiển bởi LED control switch-\r\nTích hợp với hệ thống RGB của motherboards\r\nTăng 30% vùng thông gió giúp cho tặng lưu lượng không khí lưu thông trong nguồn.\r\nĐạt chuẩn 80Plus 230V EU Bronze Certified cho hiệu năng lên đến trên 88%-\r\nQuạt kích thước 12cm hoạt động yên lặng được thiết kế tối ưu với hệ thống quản lý tốc độ quạt. Quạt quay ở mức khởi động dưới 800 RPM trước khi đạt được 60% load tại nhiệt độ at 25℃-\r\nĐược trang bị dây cáp mềm, đen và phẳng.\r\nTrang bị Active PFC', 1490000, 2490000, 11, 'https://sp-one.vn/Content/uploads/2020/06/LUX-RGB-750W-Top-Left-45-Lit-1-600x600.png', 49, 5000, 1001),
(143, 'ASUS ROG THOR – 1000P2 Gaming Platinum – 1000W', 'Chứng nhận Lambda A ++ với nguồn có hiệu năng tốt nhất-\r\nBộ tản nhiệt ROG được thiết kế giúp tối ưu hóa khả năng tản nhiệt-\r\nQuạt công nghệ hướng trục 135mm giúp làm mát hiệu quả và hoạt động yên tĩnh-\r\nSử dụng 100% tụ điện Nhật và các linh kiện cao cấp khác-\r\nChứng nhận 80 Plus Platinum.-\r\nMàn hình OLED giám sát điện năng tiêu thụ thực tế-\r\nĐồng bộ hiệu ứng led thông qua AURA SYNC', 8450000, 9450000, 11, 'https://sp-one.vn/Content/uploads/2023/05/64496_thor_ii_1000w__4_.jpg', 49, 5000, 1001),
(144, 'ASUS ROG THOR 850W PLATINUM', '- Công suất: 850W - Chuẩn hiệu suất: 80 Plus Platinum - Quạt: 1 x 135 mm', 6900000, 7900000, 11, 'https://sp-one.vn/Content/uploads/2019/04/17-320-002-V06-600x600.png', 50, 5000, 1000),
(145, '\r\nANTEC VP500P PLUS - 500W\r\n', '', 995000, 1995000, 11, 'https://sp-one.vn/Content/uploads/2019/10/vp500p-plus_pdt1-600x600.png', 48, 5000, 1002),
(146, 'ANTEC EA650G PRO', '', 2090000, 3090000, 11, 'https://sp-one.vn/Content/uploads/2019/10/5816e8c3N547154c6.jpg.dpg_.jpg', 50, 5000, 1000),
(147, 'Nguồn Cooler Master MWE GOLD 850 – V2 850W', 'Công suất: 850w-\r\nChứng nhận: 80 PLUS Gold-\r\nChuẩn nguồn: ATX 12V-\r\nKích thước: 140 x 150 x 86 mm-\r\nCáp kết nối: 1 x ATX 24-PIN (20+4), 1 x CPU 8-PIN (4+4), 1 x CPU 8PIN EPS, 4 x PCIe 8-Pin (6+2), 12 x SATA (3 SATA), 4 x PERIPHERAL (4-PI)', 2899000, 3899000, 11, 'https://sp-one.vn/Content/uploads/2021/05/55757_cooler_master_mwe_gold_850___v2_0006_1__1__4189a1bdbd8140ab81bd2d63d74209a1-600x600.jpg', 50, 5000, 1000),
(148, 'Nguồn máy tính Lian Li SP750 750W SFX White (80 Plus Gold | Full Modular | Màu Trắng)', 'Chuẩn nguồn: 80Plus Gold-\r\nCông suất danh định: 750W-\r\nNguồn điện vào: 100 – 240 Vrms-\r\nKiểu nguồn: SFX Full Modular-\r\nKích thước: (D)100 mm X (W)63.5mm X (H)125 mm', 2950000, 3950000, 11, 'https://sp-one.vn/Content/uploads/2023/06/45207_ngu___n_m__y_t__nh_lian_li_sp750_750w_sfx_white.jpg', 50, 5000, 1000),
(149, 'Nguồn Cooler Master MWE GOLD 850 – V2 850W Full Modular', 'Hiệu suất 80 Plus Gold-\r\n2 đầu cắm EPS 8 pin cấp nguồn cho CPU-\r\nQuạt HDB 120mm hoạt động êm ái-\r\nCáp nguồn dạng dẹt cho độ thẩm mỹ cao dẹt\r\nBảo hành 5 năm', 2990000, 3990000, 11, 'https://sp-one.vn/Content/uploads/2021/05/55757_mwe_gold_850_v2_full_modular_1-600x600.jpg', 50, 5000, 1000),
(150, 'Nguồn máy tính Thermaltake GF A3 1050W – 80 Plus Gold', 'Kích thước: 150mm (W) x 86mm (H) x 140mm (D)-\r\nCông suất: 1050W-\r\nHỗ trợ PCIE 5.0-\r\nPFC (Power Factor Correction): Active PFC-\r\nChuẩn nguồn 80 Plus: Gold-\r\nQuạt: 12cm Hydraulic bearing fan-\r\nModular: Có-\r\nChuẩn 80Plus Gold', 4250000, 5250000, 11, 'https://sp-one.vn/Content/uploads/2023/12/tpgfa3_1050_h01-1.webp', 50, 5000, 1000),
(151, 'Nguồn máy tính Thermaltake Toughpower TF3 1550W 80 Plus Titanium', 'Kích thước: 150mm (W) x 86mm (H) x 140mm (D)-Công suất: 850W-Hỗ trợ PCIE 5.0-PFC (Power Factor Correction): Active PFC-Chuẩn nguồn 80 Plus: Gold-Quạt: 12cm Hydraulic bearing fan-Modular: Có-Chuẩn 80Plus Gold', 3190000, 4190000, 11, 'toughpower_tf3_1550w__oc_1.jpg', 50, 5000, 1000),
(162, 'ASUS Dual GeForce RTX 3060 White Edition 12GB GDDR6', 'Nhân đồ họa Nvidia RTX 3060-\r\nBộ nhớ Vram: 12GB GDDR6-\r\nXung nhịp GPU tối đa: 1867 Mhz-\r\nPhiên bản Low Hash Rate (LHR)-\r\n1 x HDMI 2.1, 3 x DisplayPort 1.4a', 8350000, 9350000, 9, 'https://sp-one.vn/Content/uploads/2023/11/46201_vga_asus_dual_geforce_rtx_3060_white_edition_12gb_gddr6___4_.jpg', 49, 5002, 1001),
(163, 'VGA ASUS ROG Strix GeForce RTX 3090(ROG-STRIX-RTX3090-24G-GAMING)', 'Dung lượng bộ nhớ: 24GB GDDR6X-\r\nOC Mode - 1725 MHz (Boost Clock)-\r\nGaming Mode - 1695 MHz (Boost Clock)-\r\nBăng thông: 384-bit-\r\nKết nối: 2 x HDMI 2.1, 3 x DisplayPort 1.4a-\r\nNguồn yêu cầu: 750W', 27000000, 28000000, 9, 'https://sp-one.vn/Content/uploads/2023/05/34409_rog_strix_rtx3090_01-1.jpg', 49, 5000, 1001),
(164, 'KM VGA GIGABYTE Radeon RX 6600 EAGLE 8GB GDDR6', 'Dung lượng bộ nhớ: 8‎GB GDDR6-\r\nBoost Clock* : up to 2491 MHz-\r\nGame Clock* : up to 2044 MHz-\r\nBăng thông: 128 bit-\r\nKết nối: DisplayPort 1.4a *2, HDMI 2.1 *2-\r\nNguồn yêu cầu: 500W', 5950000, 6950000, 9, 'https://sp-one.vn/Content/uploads/2022/05/resizer-2-600x600.png', 49, 5000, 1001),
(165, 'KM GIGABYTE GeForce RTX 3070 Ti GAMING OC 8G', 'Dung lượng: 8GB GDDR6X-\r\nTốc độ bộ nhớ: 19 Gb / giây-\r\nCUDA: 6144-\r\nBăng thông: 256 bit-\r\nNguồn yêu cầu: 750 W', 8990000, 9990000, 9, 'https://sp-one.vn/Content/uploads/2022/12/9_3b516af57cf547149d6032ed364d8f35_53e6c1443b0841a485e893e87cc18756_1024x1024.webp', 49, 5001, 1001),
(166, 'VGA MSI RTX 3090 GAMING X TRIO 24G GDDR6X', '', 36990000, 37990000, 9, 'https://sp-one.vn/Content/uploads/2020/09/MSI-RTX-3090-GAMING-X-TRIO-24G-GDDR6X-4-900x-1-600x400.jpg', 47, 5000, 1003),
(167, 'VGA ASUS TUF GAMING GeForce RTX 3090', 'Dung lượng bộ nhớ: 24GB GDDR6X OC Mode - 1725 MHz (Boost Clock)Gaming Mode (Default) - GPU Boost Clock : 1695 MHz , GPU Base Clock : 1410 MHz Băng thông: 384-bit\r\nKết nối: 2 x HDMI 2.1, 3 x DisplayPort 1.4a,\r\nNguồn yêu cầu: 750W', 27000000, 28000000, 9, 'https://sp-one.vn/Content/uploads/2023/05/34412_tuf_rtx3090_24g_gaming_01.jpg', 50, 5000, 1000),
(168, 'GeForce RTX™ 4080 SUPER AERO OC 16G', 'Dung lượng bộ nhớ: 16GB GDDR6X-\r\nOC mode: 2655 MHz-\r\nDefault mode: 2625 MHz (Boost Clock)-\r\nBăng thông: 256-bit-\r\nKết nối: Yes x 2 (Native HDMI 2.1), Yes x 3 (Native DisplayPort 1.4a), HDCP Support Yes (2.3)-\r\nNguồn yêu cầu: 750W', 38490000, 39490000, 9, 'https://sp-one.vn/Content/uploads/2024/03/GeForce-RTX%E2%84%A2-4080-SUPER-AERO-OC-16G-02.png', 49, 5000, 1001),
(169, 'COLORFUL IGAME GEFORCE RTX 4070 TI SUPER ULTRA W OC 16G-V', 'Nhân đồ họa: NVIDIA® GeForce RTX™ 4070 Ti Super-\r\nNhân CUDA: 8448-\r\nDung lượng bộ nhớ: 16GB GDDR6X-\r\nTốc độ bộ nhớ: 21 Gbps-\r\nGiao diện bộ nhớ: 256-bit-\r\nNguồn khuyến nghị: 750W', 26070000, 27070000, 9, 'https://sp-one.vn/Content/uploads/2024/01/Sp-One.vn_RTX4070TiS-U-W_1.jpeg', 49, 5001, 1001),
(170, '\r\nCard QLeadtek Quadro T400 4GB\r\n', 'GPU: Quadro T400-\r\nBộ nhớ: 4GB GDDR6 64-bit-\r\nGiao tiếp PCI: PCI-E 3.0 x16-\r\nSố lượng đơn vị xử lý: 384 CUDA cores-\r\nCổng kết nối: 3 x Mini DisplayPort-\r\nTản nhiệt: Tản nhiệt 1 quạt-\r\nBộ nguồn đề nghị: 450W (TDP: 30W)-\r\nKích thước: 2.713 inch H x 6.137 inch L', 4490000, 5490000, 9, 'https://sp-one.vn/Content/uploads/2022/09/19439-leadtek-nvidia-quadro-t400-2.jpg', 48, 5000, 1002),
(171, '\r\nASUS Dual GeForce RTX 4070 SUPER 12GB GDDR6X\r\n', 'Model: ASUS Dual RTX 4070 SUPER OC Edition-\r\nDung lượng: 12GB GDDR6X-\r\nBăng thông: 192-bit-\r\nTốc độ bộ nhớ: 21 Gbps-\r\nChuẩn giao tiếp: PCI+E 4.0-\r\nKết nối: Displayport 1.4x 3, HDMI 2.1 x 1-', 18445000, 19445000, 9, 'https://sp-one.vn/Content/uploads/2024/02/79163_card_man_hinh_asus_dual_rtx_4070_super_12g__2_.jpg', 50, 5000, 1000),
(172, '\r\nMSI GeForce RTX 2060 VENTUS OC 6GB GDDR6\r\n', 'Chip đồ họa: GeForce RTX 2060-\r\nBộ nhớ: 6GB GDDR6 (192-bit)-\r\nBoost: 1680 MHz-\r\nNguồn phụ: 1 x 8-pin', 5450000, 6450000, 9, 'https://sp-one.vn/Content/uploads/2021/10/01_304c11a6058748c0bd54c90e8a99dbef-600x600.jpg', 50, 5000, 1000),
(173, 'ASUS GTX 1660 Ti-O6G TUF GAMING OC', 'Thương hiệu: MSI-\r\nGPU: NVIDIA GTX 1660 Ti ARMOR-\r\nBộ nhớ: 6GB DDR6-\r\nBăng thông: 192-bit-\r\nCổng kết nối: DisplayPort x 3 (v1.4a)/HDMI x 1 (v2.0b)-\r\nNguồn đề xuất: 450W', 5390000, 6390000, 9, 'https://sp-one.vn/Content/uploads/2022/06/60489_card_man_hinh_asus_tuf_gtx_1660_ti_o6g_evo_gaming_6-600x600.png', 50, 5000, 1000),
(174, '\r\nVGA Colorful GeForce GTX 1660 SUPER NB 6G-V\r\n', 'Dung lượng bộ nhớ: 6GB GDDR6-\r\nCore Clock: Base：1530Mhz；Boost:1785Mhz-\r\nBăng thông: 192bit-\r\nKết nối: DVI-D, HDMI, DisplayPort-\r\nNguồn yêu cầu: 450W', 5390000, 6390000, 9, 'https://sp-one.vn/Content/uploads/2022/09/CLF-GTX1660SP-NB-V_V2-600x600.jpg', 49, 5000, 1001),
(175, 'VGA MSI RTX 3090 VENTUS 3X 24G OC', '10496 CUDA Cores-\r\nDung lượng bộ nhớ: 24GB GDDR6-\r\nBăng thông: 384-bit-\r\nKết nối: DisplayPort x 3 (v1.4a) / HDMI 2.1 x1-\r\nNguồn yêu cầu: 850W', 35990000, 36990000, 9, 'https://sp-one.vn/Content/uploads/2020/09/MSI-RTX-3090-VENTUS-3X-24G-OC-5-900x-1-600x400.jpg', 50, 5000, 1000),
(187, '\r\nSSD Samsung 980 Pro PCIe Gen 4.0 x4 NVMe V-NAND M.2 2280 1TB MZ-V8P1T0CW (Có heatsink)\r\n', 'Chuẩn SSD: M.2 PCIe Gen4.0 x4 NVMe1.3c-\r\nTốc độ đọc: 7000 MB/s-\r\nTốc độ ghi: 5000 MB/s-\r\nBảo hành 5 năm.', 3090000, 4090000, 8, 'https://sp-one.vn/Content/uploads/2024/01/980heatsink-spone.vn-5.webp', 49, 5000, 1001),
(188, 'SSD Silicon Power A60 M.2 NVME 256GB', 'Dung lượng: 256GB-\r\nChuẩn: SSD M.2 NVMe-\r\nTốc độ đọc tối đa đến 2,200 MB/s-\r\nTốc độ viết tối đa đến 1,600 MB/s', 790000, 1790000, 8, 'https://sp-one.vn/Content/uploads/2022/12/o-cung-ssd-silicon-power-a60-m2-nvme-256gb-1-500x500-1.jpg', 46, 5000, 1004),
(189, 'SSD MSI Spatium M371 NVMe M.2 1TB Gen3x4', 'Thương hiệu: MSI-\r\nDung lượng: 1TB-\r\nHình thức: M.2 2280-S2-M-\r\nGiao diện: PCIe Gen3x4, NVMe 1.3-\r\nTốc độ đọc / ghi: 2350 / 1700 MB/s', 2190000, 3190000, 8, 'https://sp-one.vn/Content/uploads/2022/01/SSD-MSI-1TB-M371-NVMe-M.2-songphuong.vn_.jpg', 49, 5000, 1001),
(190, '\r\nPLEXTOR PX-1TM9PeG 1TB M.2 NVMe', 'Tốc độ đọc/ ghi: 3200MB/s - 2100MB/s-\r\nThời gian trung bình giữa các lần thất bại: 1,5 triệu giờ-\r\nDung lượng: 1TB-\r\nChuẩn kết nôi: M.2-\r\nKích thước: 2280-\r\nChịu được các chuyển động sốc và rung-\r\nChịu được nhiệt độ hoạt động cao', 4250000, 5250000, 8, 'https://sp-one.vn/Content/uploads/2018/07/M9PeG012-600x600.png', 49, 5000, 1001),
(191, 'SSD Kingston KC3000 1TB NVMe PCIe Gen 4.0', 'Giao diện: PCIe 4.0 NVMe-\r\nDung lượng: 1024GB-\r\nTốc độ đọc/ghi ( tối đa ): 7000MB/s _ 6000MB/s-\r\nĐọc / ghi 4K ngẫu nhiên ( tối đa ): lên đến 900.000 / 1.000.000 IOPS-\r\nTBW: 800TBW', 2590000, 3590000, 8, 'https://sp-one.vn/Content/uploads/2023/07/ssd-kingston-kc3000-m-2-pcie-gen4-x4-nvme-512gb-skc3000s-512g-bb.webp', 46, 5000, 1004),
(192, 'GIGABYTE AORUS NVMe GEN4 SSD 1TB', '- Dung lượng: 1TB - Kích thước: M.2 2280 - Kết nối: M.2 NVMe - NAND: 3D-NAND - Cache: 1GB - Tốc độ đọc/ghi (tối đa): 5000MB/s | 4400MB/s', 6495000, 7495000, 8, 'https://sp-one.vn/Content/uploads/2019/09/2019070310353492e8eba772cab31512d5f37a8a50ab6442_big-600x600.png', 50, 5000, 1000),
(193, 'Ổ SSD ADATA LEGEND 710 256Gb PCIe Gen3 x4', 'Dung lượng: 256GB-\r\nKích thước: M.2 2280-\r\nKết nối: M.2 NVMe-\r\nNAND: 3D-NAND-\r\nTốc độ đọc/ghi (tối đa): 2400MB/s | 1800MB/s', 790000, 1790000, 8, 'https://sp-one.vn/Content/uploads/2023/02/unnamed.webp', 48, 5000, 1002),
(194, 'SSD PNY CS900 1TB 2.5″ SATA 3', 'Thương hiệu: PNY-\r\nGiao diện: SATA III-\r\nYếu tố hình thức: 2.5inch-\r\nDung lượng: 1TB-\r\nTốc độ đọc ghi: 535MB/s _ 515MB/s-\r\nBảo hành 3 năm', 1350000, 2350000, 8, 'https://sp-one.vn/Content/uploads/2023/08/PNY-1tb-sata3-spone.vn-1.jpg', 49, 5000, 1001),
(195, 'HDD Barracuda 3.5 2T ST2000DM005', '', 1799000, 2799000, 8, 'https://sp-one.vn/Content/uploads/2019/10/%E1%BB%94-c%E1%BB%A9ng-HDD-PC-Seagate-BarraCuda-2TB-3.5-inch-SATA-ST2000DM008_1-600x600.jpg', 50, 5000, 1000),
(196, 'HDD Seagate Ironwolf 3.5″ 10TB (256MB) HD7200 Rpm', '', 11890000, 12890000, 8, '\r\nhttps://sp-one.vn/Content/uploads/2018/07/o-cung-hdd-seagate-ironwolf-10tb-35-inch-st10000vn0004-1.jpg', 50, 5000, 1000),
(197, 'Ổ cứng HDD WD 1TB Black WD1003FZEX', '', 2015000, 3015000, 8, 'https://sp-one.vn/Content/uploads/2019/04/12-12.jpg', 50, 5000, 1000),
(198, 'Ram G.Skill Trident Z5 RGB DDR5-6000MHz 32GB (2x16GB) – F5-6000J3636F16GX2-TZ5RS', '', 3590000, 4590000, 7, 'TZ5.png', 49, 5001, 1001),
(199, 'Ram Kingston Fury Beast RGB 32GB (2x16GB) DDR5 5600MHz', 'Dung lượng: 32GB (2x16GB)-\r\nBus: 5600MHz-\r\nĐộ trễ: CL40-\r\nĐiện áp: 1.25V-\r\nTản nhiệt: Có', 3490000, 4490000, 7, 'https://sp-one.vn/Content/uploads/2022/08/66483_ram_desktop_kingston_fury_beast_rgb_kf552c40bbak2_32_32gb_2x16gb_ddr5_5200mhz__3_-600x600.jpg', 49, 5000, 1001),
(200, 'Ram Kingston Fury Beast 64GB (2x32GB) DDR5 5200MHz', 'Dung lượng: 32GB (2x16GB)-\r\nBus: 5200MHz-\r\nĐộ trễ: CL40-\r\nĐiện áp: 1.25V-\r\nTản nhiệt: Có', 5990000, 6990000, 7, 'https://sp-one.vn/Content/uploads/2022/07/ktc-product-memory-beast-ddr5-kit2-2-lg.jpg', 48, 5000, 1002),
(201, 'Ram Apacer Nox DDR4 8GB 3200mhz RGB', 'Thương hiệu: Apacer-\r\nTên sản phẩm: Ram Apacer Nox-\r\nDung lượng: 8GB (1x8GB)-\r\nThế hệ: DDR4-\r\nBus hỗ trợ: 3200Mhz-\r\nĐèn led: RGB-\r\nBảo hành: 36 tháng', 799000, 1799000, 7, 'https://sp-one.vn/Content/uploads/2022/07/ram-apacer-ddr4-dimm-3200mhz-8gb-nox-rgb-nguyenvu.store-07-1-600x600.webp', 50, 5000, 1000),
(202, 'G.SKILL DDR4 8GB 2800MHz (F4-2800C17S-8GIS)', '- Dung lượng: 1 x 8GB - Thế hệ: DDR4 - Bus: 2800MHz - Cas: 17', 615000, 1615000, 7, 'https://sp-one.vn/Content/uploads/2019/04/153596637511-600x600.png', 49, 5000, 1001),
(203, 'Kingston Fury 32GB 3600MHz DDR4 CL18 DIMM (16×2) Beast RGB', 'Dòng RAM RGB cao cấp của Kingston-\r\nDung lượng: 2 x 16GB-\r\nThế hệ: DDR4-\r\nBus: 3600MHz', 2699000, 3699000, 7, 'https://sp-one.vn/Content/uploads/2021/11/60338_ram_desktop_kingston_fury_rgb_kf432c16bbak2_16_16gb_2x8gb_ddr4_3200mhz-1-600x600.jpg', 50, 5001, 1000),
(204, 'RAM ADATA XPG D35G DDR4 16GB 3200 WHITE', 'Loại RAM: ADATA XPG-\r\nChuẩn RAM: DDR4-\r\nDung lượng: 16GB (1x16)-\r\nBus xử lý: 3200MHz-\r\nHiệu ứng: LEG RGB', 1199000, 2199000, 7, 'https://sp-one.vn/Content/uploads/2024/01/d35g_2000x2000_1_white.webp', 50, 5000, 1000),
(205, 'Ram ECC D4 32GB /2133Mhz', 'Dung lượng : 32GB-\r\nBus : 2133 Mhz-\r\nChủng loại : ECC Registered RDIM DDR4', 1250000, 2250000, 7, 'https://sp-one.vn/Content/uploads/2021/02/103_samsung_16gb_2133-600x600.jpg', 50, 5000, 1000),
(206, 'RAM Desktop Gskill Trident Z RGB (F4-3600C18D-32GTZR) 32GB (2x16GB) DDR4 3600MHz\r\n', 'Loại RAM: DDR4-\r\nDung lượng: 32GB-\r\nBus: 3600-\r\nTản nhiệt: Có', 2690000, 3690000, 7, 'https://sp-one.vn/Content/uploads/2020/07/40546_4.jpg', 49, 5001, 1001),
(207, 'Adata XPG Spectrix D50 RGB(AX4U320038G16A-ST50) 8GB (1x8GB) DDR4 3200Mhz\r\n', '', 749000, 1749000, 8, 'https://sp-one.vn/Content/uploads/2020/11/productGallery215-1-600x600.png', 49, 5001, 1001),
(208, '\r\nCorsair Vengeance RGB RS 16GB 3200MHz DDR4 (2x8GB)\r\n', 'Dung lượng: 16GB (2x8GB)-\r\nBus: 3200MHz-\r\nĐộ trễ: 16-20-20-38-\r\nĐiện áp: 1.35V-\r\nTản nhiệt: Có', 1550000, 2550000, 7, 'https://sp-one.vn/Content/uploads/2018/11/gvn_cs2_85c41631f1dc4ae994924f104bd75d4d_d15c614e5a414cc484c0e041f1e51728-600x600.jpg', 50, 5000, 1000),
(209, 'RAM ADATA XPG D35G DDR4 8GB 3200 WHITE RGB', 'Loại RAM: ADATA XPG White-\r\nChuẩn RAM: DDR4-\r\nDung lượng: 8GB-\r\nBus xử lý: 3200MHz-\r\nHiệu ứng: LEG RGB', 745000, 1745000, 7, 'https://sp-one.vn/Content/uploads/2023/12/d35g_2000x2000_4_white.png', 49, 5001, 1001),
(210, 'RAM PC ADATA DDR4 XPG GAMMIX D10 8GB 3200 RED', 'Loại sản phẩm: Ram PC-\r\nDung lượng: 8 GB-\r\nChuẩn: DDR4-\r\nBus: 3200 Mhz-\r\nBảo hành:  5 năm đổi mới-\r\nThiết kế tản nhiệt độc đáo-\r\nTản nhiệt cấu hình thấp giúp cho việc lắp đặt dễ dàng-\r\nDDR4 – Hiệu suất điện năng và hiệt quả tuyệt vời-\r\nTính ổn định và làm mát xuất sắc-\r\nIntel XMP 2.0 – ép tăng tốc dễ dàng hơn', 615000, 1615000, 7, 'https://sp-one.vn/Content/uploads/2020/12/1-5-600x600.png', 50, 5000, 1000),
(211, '\r\nGigabyte Z690 AORUS PRO DDR4 ( Wifi )\r\n', 'Chipset: Intel Z690-\r\nSocket: LGA 1700-\r\nSố khe RAM: 4 (DDR4)-\r\nKích thước: ATX-\r\nTích hợp sẵn Wifi & Bluetooth', 6250000, 7250000, 6, 'https://sp-one.vn/Content/uploads/2021/11/1-4-600x600.jpg', 49, 5000, 1001),
(212, 'Mainboard MSI B450M-A PRO MAX (AMD B450, Socket AM4, m-ATX, 2 khe RAM DDR4)', 'Hỗ trợ AMD® Ryzen ™ / Ryzen ™ thế hệ 2, 3 4 và 5 với Đồ họa Radeon ™ Vega và Thế hệ thứ 3 AMD® Ryzen ™ với Đồ họa Radeon ™ / Athlon ™ với Đồ họa Radeon ™ Vega và Bộ xử lý máy tính để bàn A-series / Athlon ™ X4 cho Ổ cắm AM4-\r\nHỗ trợ bộ nhớ DDR4, lên đến 4133 (OC) MHz\r\nTurbo M.2: Chạy ở PCI-E Gen3 x4 tối đa hóa hiệu suất cho SSD dựa trên NVMe.-\r\nAudio Boost: Thưởng cho đôi tai của bạn với chất lượng âm thanh cấp phòng thu.-\r\nX-Boost: Phần mềm tự động phát hiện và cho phép bạn tăng hiệu suất của mọi thiết bị lưu trữ hoặc USB.-\r\nCore Boost: Với bố cục cao cấp và thiết kế nguồn hoàn toàn kỹ thuật số để hỗ trợ nhiều lõi hơn và cung cấp hiệu suất tốt hơn.', 1700000, 2700000, 6, 'https://sp-one.vn/Content/uploads/2021/02/49680_mainboard_msi_b450m_a_pro_max_0003_4-1-600x600.jpg', 50, 5000, 1000),
(213, 'ASUS ROG STRIX Z690-A GAMING WIFI DDR5', 'Chipset: Intel Z690-\r\nSocket: LGA 1700-\r\nSố khe RAM: 4 (DDR5)-\r\nKích thước: ATX-\r\nTích hợp sẵn Wifi & Bluetooth', 9650000, 10650000, 6, 'https://sp-one.vn/Content/uploads/2021/12/new_project__17__426784e150f2468f9b1cf590a6220fe3-2.webp', 48, 5001, 1002),
(214, 'Mainboard ASUS ROG STRIX Z690-F GAMING WIFI', 'Chipset: Intel Z690-\r\nSocket: LGA 1700-\r\nSố khe RAM: 4 (DDR5)-\r\nKích thước: ATX-\r\nTích hợp sẵn Wifi & Bluetooth', 9999000, 10999000, 6, 'https://sp-one.vn/Content/uploads/2022/03/61223_mainboard_asus_rog_strix_z690_f_gaming_wifi_intel_z690_socket_1700_atx_4_khe_ram_ddr5__1-1-600x600.jpg', 49, 5001, 1001),
(215, '\r\nMSI PRO Z690-P DDR4\r\n\r\n', 'Chipset: Intel Z690-\r\nSocket: LGA 1700-\r\nSố khe RAM: 4 (DDR4)-\r\nKích thước: ATX', 4990000, 5990000, 6, 'https://sp-one.vn/Content/uploads/2021/11/z690p-1-600x408.jpg', 49, 5000, 1001),
(216, 'Mainboard Gigabyte B760M AORUS ELITE DDR5', 'Socket: LGA1700 hỗ trợ CPU intel thế hệ 12 & 13-\r\nKích thước: Micro ATX-\r\nKhe cắm RAM: 4 khe (Tối đa 128GB)-\r\nKhe cắm mở rộng: 1 x PCI Express x16 slot, 1 x PCI Express x16 slot-\r\nKhe cắm ổ cứng: 1 x M.2 connectors, 4 x SATA 6Gb/s connectors', 4250000, 5250000, 6, 'https://sp-one.vn/Content/uploads/2023/08/44279_mainboard_gigabyte_b760m_aorus_elite_ddr5.jpg', 46, 5001, 1004),
(217, 'Gigabyte Z690 AORUS ELITE AX DDR5', 'Chipset: Intel Z690-\r\nSocket: LGA 1700-\r\nSố khe RAM: 4 (DDR4)-\r\nKích thước: ATX-\r\nTích hợp sẵn Wifi & Bluetooth', 7580000, 8580000, 6, 'https://sp-one.vn/Content/uploads/2021/12/bo-mach-chu-gigabyte-z690-aorus-elite-ddr5-11-500x500-1.jpg', 49, 5001, 1001),
(218, 'Mainboard Gigabyte Z790 AERO G​ DDR5 (Wifi+Bluetooth)', 'Socket: LGA1700 hỗ trợ CPU Intel thế hệ thứ 13, Intel thế hệ thứ 12, Pentium® Gold and Celeron®-\r\nKích thước: ATX-\r\nKhe cắm RAM: 4 khe (Tối đa 128GB)-\r\nKhe cắm mở rộng: 1 x PCI Express 5.0 x16, 2 x PCI Express 4.0x16 slot-\r\nKhe cắm ổ cứng: 5 x M.2 slots , 4 x SATA 6Gb/s ports', 9290000, 10290000, 6, 'https://sp-one.vn/Content/uploads/2023/02/43645_mainboard_gigabyte_z790_aero_g____ddr5__wifi_bluetooth___2_.jpg', 50, 5000, 1000),
(219, '\r\nNZXT N7 B550 MATTE WHITE\r\n', '', 5970000, 6970000, 6, 'https://sp-one.vn/Content/uploads/2021/04/N7-B550-spone-1-600x600.png', 50, 5000, 1000),
(220, 'Mainboard Huananzhi X79 Luxury', '', 2350000, 3350000, 6, 'https://sp-one.vn/Content/uploads/2023/09/16966-huananzhi-x79-luxury-v2-2.jpeg', 48, 5002, 1002),
(221, 'KM CPU Intel Core I7 13700K (16C/24T, Up to 5.4GHz, 30MB, socket 1700)\r\n', '- Socket: FCLGA1700\r\n- Số lõi - luồng: 16//24\r\n- Xung nhịp tối đa: 5.4 Ghz\r\n- Bộ nhớ đệm: 30 MB\r\n- Bus ram hỗ trợ: DDR4 3200MHz, DDR5-4800\r\n- Mức tiêu thụ điện: 125W', 7490000, 8490000, 5, 'https://sp-one.vn/Content/uploads/2022/10/en-box-t4-i7kf-13th-front-transparent_1080x1080pixels_0693c133111f4bfb969b3723e9ff9c0c.webp', 49, 5000, 1001),
(222, 'KM Intel Core i5 14600K (3.5 GHz boost 5.3GHz, 14 nhân 20 luồng, 24MB Cache, 125W)', 'Socket: FCLGA1700-\r\nE core: 8 ( 2.6 GHz - 3.0 GHz)-\r\nP core: 6/12 ( 3.5 GHz - 5.3 GHz)-\r\nBộ nhớ đệm: 24MB-\r\nRam hỗ trợ: DDR4 3200MHz, DDR5-4800-\r\nIntel UHD Graphics 770-\r\nMức tiêu thụ điện: 125W - 181W', 6679000, 7679000, 5, 'https://sp-one.vn/Content/uploads/2023/10/intel_bx8071514600k_core_i5_14600k_14_core_lga_1781465.jpg', 49, 5000, 1001),
(223, '\r\nAMD RYZEN 9 5950X (3.4GHz up to 4.9GHz/ 16 nhân 32 luồng)\r\n', '', 10915000, 11915000, 5, 'https://sp-one.vn/Content/uploads/2020/10/AMD-Ryzen-9-5900X-600x600-1.jpg', 49, 5000, 1001),
(224, '\r\nCPU AMD Ryzen™ 7 5800X3D\r\n', 'Số nhân : 8 (Core)-\r\nSố luồng : 16 (Thread)-\r\nXung mặc định : 3.4 GHz-\r\nXung chạy Boost: 4.5 GHz-\r\nBộ nhớ đệm Cache : 96MB-\r\nMức tiêu thụ điện năng TDP: 105 W-', 8990000, 9990000, 5, 'https://sp-one.vn/Content/uploads/2022/05/41732_430fc7397d9ca1_211103551a_ryzen7_5000_wof_lefft-600x515.png', 49, 5001, 1001);
INSERT INTO `products` (`productId`, `productName`, `information`, `price`, `priceOld`, `categoryId`, `productlmgMain`, `availableQuantity`, `numberViewed`, `purchases`) VALUES
(226, 'Intel Core i3-10105 (3.7GHz Turbo 4.4GHz, 4 nhân 8 luồng, 6MB Cache, 65W) – SK LGA 1200', 'Thương hiệu: Intel-\r\nSocket: LGA 1200-\r\nSố nhân/luồng: 4/8-\r\nXung cơ bản: 3.7GHz-\r\nXung tối đa: 4.4GHz-', 2780000, 3780000, 5, 'https://sp-one.vn/Content/uploads/2022/03/58736_cpu_intel_core_i3_10105-600x600.jpg', 47, 5000, 1003),
(227, '\r\nIntel Core i3-14100 (3.5GHz Turbo 4.7GHz, 4P/8 luồng, 12MB Cache, 65W)\r\n', 'Socket: FCLGA1700-\r\nSố lõi/luồng: 4/8-\r\nBộ nhớ đệm: 12MB-\r\nRam hỗ trợ: DDR4 3200MHz, DDR54800-\r\nMức tiêu thụ điện: 65W-\r\nVGA: Intel® UHD Graphics 730', 3730000, 4730000, 5, 'https://sp-one.vn/Content/uploads/2023/10/s-l500.png', 49, 5000, 1001),
(228, '\r\nKM Intel Core i3-10105 (3.7GHz Turbo 4.4GHz, 4 nhân 8 luồng, 6MB Cache, 65W) – SK LGA 1200\r\n', 'Thương hiệu: Intel-\r\nSocket: LGA 1200-\r\nSố nhân/luồng: 4/8-\r\nXung cơ bản: 3.7GHz-\r\nXung tối đa: 4.4GHz', 2379000, 3379000, 5, 'httpss://sp-one.vn/Content/uploads/2022/03/58736_cpu_intel_core_i3_10105-600x600.jpg', 50, 5000, 1000),
(229, 'CPU Intel Pentium Gold G7400 Processor(3.70GHz, 2 nhân 4 luồng, 2.5MB Cache, 46W)', 'Socket: LGA1700, BGA1700-Số lõi/luồng: 2/4-Xung nhịp: 3.70 GHz-Bộ nhớ đệm: 2.5 MB-Đồ họa tích hợp: Intel® UHD Graphics 710-Bus ram hỗ trợ: Up to DDR5 4800 MT/s, Up -to DDR4 3200 MT/s-Mức tiêu thụ điện: 46W', 1900000, 2900000, 5, 'https://sp-one.vn/Content/uploads/2022/07/41085_cpu_intel_pentium_gold_g7400-600x600.jpg', 50, 5000, 1000),
(232, 'CPU AMD Ryzen 7 7700 ( 3.8GHz Boost 5.3GHz 8 nhân 16 luồng 40MB AM5)', 'Core/ Thread: 8 / 16-\r\nTDP: 65 W-\r\nSocket: AM5-\r\nTotal Cache: 40 MB-\r\nArchitecture: \"Zen 4\"-\r\nFreq: Up to 5.3 GHz / 3.8 GHz-\r\nPCIe® Ready: PCIe® 5.0-\r\niGPU: On - Chip Radeon Graphics-\r\nTản: Wraith Prism', 8200000, 9200000, 5, 'https://sp-one.vn/Content/uploads/2023/02/gearvn-amd-ryzen-7-7700-3_971a2a0161fc411f93b0e05d128a41cd.webp', 50, 5000, 1000),
(233, '\r\nCPU Intel Core i7-12700F (25M Cache, up to 4.9 GHz, 12C20T, Socket 1700)\r\n', '- Socket: FCLGA1700\r\n- Tốc độ/ Cache: Up to 5.00Ghz/ 25Mb\r\n- Số nhân/ Số luồng: 12 Core/ 20 Threads\r\n- Kiểu đóng gói: Box', 7550000, 8550000, 5, 'https://sp-one.vn/Content/uploads/2021/11/Core-i7-12700K-2-600x600-1.jpg', 50, 5000, 1000),
(235, 'CPU Intel Core i7 14700F (Boost 5.4GHz, 20 nhân 28 luồng, 33MB Cache, 65W) – SK LGA 1700', 'CPU: Intel Core i7 14700F-\r\nSocket: LGA1700-\r\nSố nhân/luồng: 20(8P-Core|12E-Core)/28 luồng-\r\nBase Clock (PCore): 2.1 GHz-\r\nBoost Clock (PCore): 5.4 GHz-\r\nTDP: 65W ( Max boots up to 219W)', 9650000, 10650000, 5, 'https://sp-one.vn/Content/uploads/2023/10/i7-14700-1.jpeg', 50, 5000, 1000),
(236, 'CPU Intel Core i9-12900K (3.2GHz Turbo 5.2GHz, 16 Nhân 24 Luồng, 30M Cache)', 'CPU Intel Core i9 12900K-\r\nSocket: FCLGA1700-\r\nSố lõi/luồng: 16/24-\r\nBộ nhớ đệm: 30 MB-\r\nBus ram hỗ trợ: DDR4 3200MHz, DDR5 4800-\r\nMức tiêu thụ điện: 125W', 6990000, 7990000, 5, 'https://sp-one.vn/Content/uploads/2021/11/i9-12900K-1.png', 50, 5000, 1000),
(237, 'CPU Intel Core i9-13900KS (6.0GHz, 24 Nhân 32 Luồng, 68M Cache)', 'Socket: FCLGA1700-\r\nSố lõi/luồng: 24/32-\r\nTần số cơ bản/turbo: 2.40 GHz/6.00 GHz-\r\nBộ nhớ đệm: 68 MB-\r\nXử lý đồ họa: UHD Intel 770-\r\nMức tiêu thụ điện: 150W', 19990000, 20990000, 5, 'https://sp-one.vn/Content/uploads/2023/02/en-box-t4-i9-13th-right-1080x1080pixels_1fff23acdf0942ee9e453d0000feecf0.webp', 50, 5000, 1000),
(238, 'KM CPU Intel Core i9 14900F (Boost 5.8GHz, 24 nhân 32 luồng, 36MB Cache, 65W)', 'Thương hiệu: Intel-\r\nSocket: LGA 1700-\r\nSố nhân/luồng: 24/32-\r\nXung nhịp cơ bản: 2.0 GHz-\r\nXung nhịp tối đa: 5.8 GHz-\r\nBộ nhớ Cache L2 / L3: 32 / 36 MB-\r\nĐiện năng tiêu thụ: 65W', 13550000, 14550000, 5, 'https://sp-one.vn/Content/uploads/2023/10/CPU-Intel-Core-i9-14900-i9-14900F-i9-14900K-i9-14900KF-3.jpg', 50, 5000, 1000),
(239, '\r\nCREATOR i5 13400F | 16GB | RTX 3050 8GB\r\n', 'CPU:Intel Core i5 13400F-\r\nMain:B660 PRO RS-\r\nRam:16GB (2x 8GB) DDR4 3200MHz-\r\nSSD:256GB NVMe-\r\nVGA:RTX 3050 8GB -\r\nPSU:XIGMATEK X POWER X 650-\r\nCASE:Xigmatek Gaming X 3F-\r\nTản:DeepCool AG400 ARGB', 17500000, 18500000, 3, 'https://sp-one.vn/Content/uploads/2023/03/cr12.jpg', 50, 5000, 1000),
(240, 'CREATOR i5 13600K | 16GB | RTX 3050 8G', 'CPU:Intel Core i5 13600K-\r\nMain:GIGABYTE B760M A ELITE DDR4-\r\nRam:G.SKILL RIPJAWS V 16GB (2x 8GB) DDR4 3600MHz-\r\nSSD: PCIe NVMe 500GB gen3x4-\r\nVGA:RTX 3050 8G-\r\nPSU:650W – 80 Plus Bronze-\r\nCASE:Xigmatek Gaming X 3FX', 23100000, 24100000, 3, 'https://sp-one.vn/Content/uploads/2023/03/cr14.jpg', 48, 5002, 1002),
(241, 'CREATOR i5 12400F | 16GB | GTX1660S 6GB', 'CPU:i5 12400F-\r\nMain:B660M RS-\r\nRam:16GB (8x2) 3200Mhz -\r\nSSD:256gb NVME-\r\nVGA:GTX1660 Super 6GB-\r\nPSU:550W-\r\nCASE:Xigmatek Gaming X 3F', 15450000, 16450000, 3, 'https://sp-one.vn/Content/uploads/2022/12/6-1.jpg', 47, 2, 1003),
(242, 'CREATOR i5 12600K | 16GB | RTX3060 12GB', '\r\nCPU:Core i5 12600K-\r\nMain:B660M RS-\r\nRam:NOX 16GB RGB-\r\nSSD:SS 980 256GB NVME-\r\nVGA:RTX 3060 12GB ultra white -\r\nPSU:CM650W-\r\nCASE:NZXT H5 Flow White-\r\nTản:Thermalright Assasing King 120', 22799000, 23799000, 3, 'https://sp-one.vn/Content/uploads/2022/12/12.jpg', 48, 5004, 1002),
(243, 'CREATOR i7 13700K|16GB|RTX 3060 12GB', '\r\nCPU:CPU Intel Core I7 13700K (16C/24T, Up to 5.4GHz, 30MB, socket 1700)-\r\nMAIN:B760-a D4-\r\nRAM:16GB (2x8)  RGB -\r\nSSD:SS 980 500GB NVMe-\r\nVGA:3060 12GB -\r\nPSU:650W + 80 Plus Bronze-\r\nCASE:GANK 5', 29050000, 30050000, 3, 'https://sp-one.vn/Content/uploads/2022/12/14-1.jpg', 48, 5002, 1002),
(264, 'VP 4', '\r\nCPU:Ryzen 4600G-\r\nMAIN:B450-\r\nRAM:8GB -\r\nSSD:128GB SATA 3-\r\nVGA:Vega 7-\r\nPSU:350W-\r\nCASE:ROSI-\r\nMÀN:VIEWSONIC 22 INCH-', 7945000, 9000000, 2, 'https://sp-one.vn/Content/uploads/2022/08/PC-SP_cover-1@1x_1.jpg', 40, 4000, 1002),
(265, 'Card Wifi PCI-e Asus PCE-AX3000 chuẩn AX3000 Bluetooth 5.0', 'PCI-E AX3000 WiFi 6 (802.11ax) băng tần kép. Hỗ trợ 160 MHz, Bluetooth 5.0, bảo mật mạng WPA3, OFDMA và MU-MIMO  Tiêu chuẩn Wi-Fi thế hệ mới – Chuẩn WiFi 6 (802.11ax) cho hiệu suất và thông lượng tốt hơn. Tốc độ Wi-Fi siêu nhanh – Tốc độ WiFi 3000Mbps để xử lý ngay cả mạng bận nhất một cách dễ dàng. Công nghệ 802.11ax — Với OFDMA và MU-MIMO, WiFi 6 cho khả năng truyền dữ liệu hiệu quả, ổn định và nhanh hơn, ngay cả khi có nhiều thiết bị cùng truyền dữ liệu một lúc. Bluetooth 5.0 để kết nối nhanh hơn, phủ sóng rộng hơn – Truyền dữ liệu nhanh gấp hai lần và tầm phủ sóng lớn gấp 4 lần so với thế hệ trước đó.', 730000, 1000000, 10, 'a1.jpg', 27, 1, 3),
(266, 'A2000UA – USB Wi-Fi băng tần kép AC1200', 'Tương thích chuẩn Wi-Fi IEEE 802.11ac/a/b/g/n, 867Mbps(5GHz) và 300Mbps(2.4GHz) Kết nối qua cổng USB 3.0 2 ăng-ten 5dBi có thể thay thế Chuẩn Wi-Fi AC mới cho hiệu năng cực cao Hỗ trợ Window 10/8/7/XP/Vista Hỗ trợ phát hotspot Soft AP', 490000, 1000000, 10, '2-127-600x600.png', 18, 1, 3),
(267, 'USB Wifi TP-Link TL-WN722N', 'Tốc độ không dây lên tới 150Mbps mang lại trải nghiệm tốt nhất cho xem video hoặc gọi điện trên internet -Mã hóa bảo mật không dây dễ dàng chỉ với 1 nút nhấn WPS- Ăng ten 4dBi tháo rời được, tăng cường tối ưu độ mạnh tín hiệu của bộ chuyển đổi USB', 230000, 430000, 10, 'TL-WN722N_EU_3.0_01_large_1506586482853c-600x600.jpg', 18, 0, 1),
(268, 'Thiết bị thu sóng USB Wi-Fi hai băng tần AC1200', 'Thiết bị thu Wi-Fi MU-MIMO dạng USB nhỏ nhất thế giới Kích thước nhỏ gọn để bạn có thể kết nối Wi-Fi Nâng cấp Wi-Fi tức thời cho máy tính xách tay Tận hưởng tốc độ Wi-Fi 802.11ac. Hoàn hảo để chơi game và phát trực tuyến Hỗ trợ băng tần kép cung cấp cho bạn băng tần 5GHz để phát trực tuyến nội dung 4K UHD trơn tru và chơi game với độ trễ thấp.', 750000, 900000, 10, 'sGgaGR1xdtbb5X06_setting_fff_1_90_end_500.jpg', 8, 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `builds`
--
ALTER TABLE `builds`
  ADD PRIMARY KEY (`buildsId`),
  ADD KEY `customerId` (`customerId`,`productId`),
  ADD KEY `builds_ibfk_2` (`productId`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `customerId` (`customerId`,`productId`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`categoryId`);

--
-- Chỉ mục cho bảng `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`creditCardCode`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`),
  ADD UNIQUE KEY `phone` (`phone`,`email`),
  ADD KEY `creditCardCode` (`creditCardCode`);

--
-- Chỉ mục cho bảng `historysearch`
--
ALTER TABLE `historysearch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerId` (`customerId`);

--
-- Chỉ mục cho bảng `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderDetailId`),
  ADD KEY `orderId` (`orderId`,`productId`),
  ADD KEY `orderdetail_ibfk_1` (`productId`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `customerId` (`customerId`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD UNIQUE KEY `productName_2` (`productName`) USING HASH,
  ADD UNIQUE KEY `productlmgMain` (`productlmgMain`) USING HASH,
  ADD UNIQUE KEY `productlmgMain_2` (`productlmgMain`) USING HASH,
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `productName` (`productName`(768)),
  ADD KEY `information` (`information`(768)),
  ADD KEY `productlmgMain_3` (`productlmgMain`(768));

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `builds`
--
ALTER TABLE `builds`
  MODIFY `buildsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `historysearch`
--
ALTER TABLE `historysearch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `builds`
--
ALTER TABLE `builds`
  ADD CONSTRAINT `builds_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `builds_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `historysearch`
--
ALTER TABLE `historysearch`
  ADD CONSTRAINT `historysearch_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categorys` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
