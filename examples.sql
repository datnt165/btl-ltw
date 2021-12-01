-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2021 lúc 08:43 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

CREATE DATABASE `examples`;
USE `examples`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `examples`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `page` int(5) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `price`, `page`, `lang`, `type`, `img`) VALUES
(1, 'Ba Người Thầy Vĩ Đại', 'Robin Sharma', 73, 247, 'Anh', 'Văn học nghệ thuật', 'img/product/bnt.png'),
(2, 'How Psychology Works', 'Jo Hemmings', 224, 330, 'Việt', 'Tâm lý, tâm linh, tôn giáo', 'img/product/hpw.png'),
(3, 'Đàn Ông Sao Hỏa Đàn Bà Sao Kim', 'John Gray', 135, 488, 'Việt', 'Văn hóa xã hội – Lịch sử', 'img/product/dosh.png'),
(4, 'Combo Nguồn Gốc Trật Tự Chính Trị + Trật Tự Chính Trị Và Suy Tàn Chính Trị', ' Francis Fukuyama', 534, 1488, 'Việt', 'Chính trị – pháp luật', 'img/product/ngtt.png'),
(5, 'Pháp Luật Về Hợp Đồng - Các Vấn Đề Pháp Lý Cơ Bản', 'Trương Nhật Quang', 800, 880, 'Việt', 'Chính trị – pháp luật', 'img/product/plvhd.png'),
(6, 'Đại Việt Sử Ký Toàn Thư Trọn Bộ', 'Sử quán triều Hậu Lê', 156, 1284, 'Việt', 'Văn hóa xã hội – Lịch sử', 'img/product/dvsk.png'),
(7, 'Muôn Kiếp Nhân Sinh (Khổ Nhỏ)', 'Nguyên Phong', 76, 482, 'Việt', 'Tâm lý, tâm linh, tôn giáo', 'img/product/mkns.png'),
(8, 'Con Chim Xanh Biếc Bay Về', 'Nguyễn Nhật Ánh', 115, 396, 'Việt', 'Văn học nghệ thuật', 'img/product/ccxbbv.png'),
(9, 'Bách Khoa Vũ Trụ', 'Nhóm tác giả', 119, 128, 'Việt', 'Khoa học công nghệ – Kinh tế', 'img/product/bkvt.png'),
(10, 'Science Encyclopedia', 'Nhóm tác giả', 365, 670, 'Anh', 'Khoa học công nghệ – Kinh tế', 'img/product/scen.png'),
(11, 'Sách Giáo Trình Hán Ngữ 1 2', 'Nhóm tác giả', 210, 259, 'Việt', 'Giáo trình', 'img/product/gthn.png'),
(12, 'Giáo Trình Kỹ Thuật Lập Trình C Căn Bản Và Nâng Cao', 'Nhóm tác giả', 92, 440, 'Việt', 'Giáo trình', 'img/product/ltc.png'),
(13, 'Nhớ Mãi Không Quên (Tiểu Thuyết)', 'Mặc Bảo Phi Bảo', 64, 216, 'Việt', 'Truyện, tiểu thuyết', 'img/product/nmkq.png'),
(14, 'Blood', 'Maggie Gee', 92, 392, 'Việt', 'Truyện, tiểu thuyết', 'img/product/blood.png'),
(15, 'Hoàng Tử Bé ', 'Antoine De Saint-Exupéry', 57, 102, 'Việt', 'Sách thiếu nhi', 'img/product/htb.png'),
(16, 'Sách thiếu nhi - Theo Dòng Thời Gian - Thời Tiền Sử', 'Nhóm tác giả', 87, 40, 'Việt', 'Truyện, tiểu thuyết', 'img/product/stn.png'),
(17, 'Đi Tìm Lẽ Sống', 'Viktor Emil Frankl', 62, 224, 'Việt', 'Truyện, tiểu thuyết', 'img/product/dtls.png'),
(18, 'Karl Lagerfeld - Cuộc Đời, Sự Nghiệp Và Những Bí Mật Kiến Tạo Một Thiên Tài', 'Viktor Emil Frankl', 106, 150, 'Việt', 'Văn hóa xã hội – Lịch sử', 'img/product/cdsn.png'),
(19, 'Lagom - Vừa Đủ - Đẳng Cấp Sống Của Người Thụy Điển', 'Linnea Dunne', 77, 160, 'Việt', 'Tâm lý, tâm linh, tôn giáo', 'img/product/vđc.png'),
(20, 'Wabi Sabi Thương Những Điều Không Hoàn Hảo', 'Marie Tourell Söderberg', 95, 214, 'Việt', 'Tâm lý, tâm linh, tôn giáo', 'img/product/wbsb.png'),
(21, 'Sức Mạnh Của Ngôn Từ', 'Don Gabor', 74, 312, 'Việt', 'Văn hóa xã hội – Lịch sử', 'img/product/smnt.png'),
(22, 'Mật Mã Tài Năng', 'Don Gabor', 117, 348, 'Việt', 'Văn hóa xã hội – Lịch sử', 'img/product/mmtn.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `id_book` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `many` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_book`, `email`, `many`) VALUES
(100, 14, 'dat@gmail.com', 3),
(101, 21, 'dat1@gmail.com', 3),
(103, 18, 'admin', 2),
(104, 3, 'admin', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_book` int(5) NOT NULL,
  `comment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `email`, `id_book`, `comment`) VALUES
(2, 'dat1@gmail.com', 17, 'hay!2'),
(3, 'dat.nguyenthanhdat12@hcmut.edu', 17, 'hay!3'),
(4, 'dat', 17, 'hay!4'),
(5, 'dat1@gmail.com', 21, '1. hay'),
(6, 'dat', 21, '2. hay'),
(7, 'dat1@gmail.com', 22, 'Sách rất hay !!!'),
(8, 'protosmouse1@gmail.com', 22, 'Phù hợp!'),
(9, 'dat@gmail.com', 14, 'Khá hay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(5) NOT NULL,
  `social` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `social`, `link`) VALUES
(1, 'facebook-f', 'https://www.facebook.com/'),
(2, 'twitter', 'https://twitter.com/?lang=vi'),
(3, 'google', 'bookee_co@gmail.com'),
(4, 'instagram', 'https://www.instagram.com/'),
(5, 'linkedin-in', 'https://www.linkedin.com/'),
(6, 'github', 'https://github.com/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `about` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `about`) VALUES
(3, 'dat', 'dat@gmail.com', 'Hello tôi là đạt'),
(4, 'dat11', 'dat111@gmail.com', 'sửa chi tiết');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `link` longtext NOT NULL,
  `img` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `link`, `img`, `date`, `content`) VALUES
(1, 'https://www.reader.com.vn/di-tim-le-song-di-tim-ban-nga-cua-chinh-minh-a442.html', 'img/news/ditimlesong.png', '2021-10-28', 'Review sách Đi tìm lẽ sống - Đi tìm bản ngã của chính mình'),
(2, 'https://ebook.waka.vn/list-tieu-thuyet-van-hoc-kinh-dien-hay-nen-doc-tren-thu-vien-ebook-waka-fjvLW.html', 'img/news/best-seller-default.png', '2021-10-29', 'Tiểu thuyết hay nên đọc!'),
(3, 'https://www.elle.vn/feature/gioi-thieu-sach-hay-thang-10-2021', 'img/news/best-seller-default.png', '2021-11-01', 'Bestseller tháng 10!'),
(4, 'https://www.ticketgo.vn/blog/gioi-thieu-sach-hay-thang-11-doc-gi', 'img/news/best-seller-default.png', '2021-11-03', 'Tháng 11 đọc gì?'),
(5, 'http://timkiemkhoinghiep.com/karl-lagerfeld-cuoc-doi-su-nghiep-va-nhung-bi-mat-kien-tao-mot-thien-tai.html', 'img/news/karl.png', '2021-11-05', 'Review sách Karl Lagerfeld – Cuộc đời, sự nghiệp và những bí mật kiến tạo một thiên tài'),
(6, 'https://sachhay24h.com/review-sach-lagom-vua-du-dang-cap-song-cua-nguoi-thuy-dien-a751.html', 'img/news/lagom.png', '2021-11-05', 'Review sách Lagom - Vừa Đủ - Đẳng Cấp Sống Của Người Thụy Điển'),
(7, 'https://sachhay24h.com/review-sach-hygge-hanh-phuc-tu-nhung-dieu-nho-be-a758.html', 'img/news/hanhphuc.png', '2021-11-06', 'Review sách Hygge - Hạnh phúc từ những điều nhỏ bé'),
(8, 'https://www.longwhitecloudqigong.com/book-review-yang-sheng-the-art-of-chinese-self-healing/', 'img/news/yangshen.png', '2021-11-07', 'Review sách Yang Sheng: Dưỡng lành cơ thể, làm đẹp tâm hồn - Katie Brindle'),
(9, 'https://mucmocmeo.blog/2019/10/31/book-review-nguoi-y-dau-chi-ngot-ngao-living-la-dolce-vita-raeleen-dagostino-mautner/', 'img/news/nguoiaydauchingotngao.png', '2021-11-07', 'Review sách Người ý đâu chỉ ngọt ngào - Living La Dolce Vita - Raeleen D.Agostino Mautner'),
(10, 'https://www.reader.com.vn/review-sach-nguoi-ban-hang-vi-dai-nhat-the-gioi-a593.html', 'https://salt.tikicdn.com/cache/400x400/ts/product/35/6e/52/11a1da69fb7597bb62f462057c37b783.jpg.webp', '2021-11-08', 'Review sách Người bán hàng vĩ đại nhất thế giới'),
(11, 'https://lengkengtrada.com/review-sach-dai-duong-den-phan-1-nhung-cau-chuyen-that-tu-the-gioi-cua-nguoi-tram-cam/', 'img/news/daiduongden.png', '2021-11-08', 'Review sách Đại dương đen - Đăng Hoàng Giang'),
(12, 'https://gemysix.com/review-sach-wabi-sabi-thuong-nhung-dieu-khong-hoan-hao-beth-kempton/', 'img/news/wabi-sabi.png', '2021-11-10', 'Review Sách Wabi Sabi – Thương Những Điều Không Hoàn Hảo – Beth Kempton'),
(13, 'https://www.reader.com.vn/review-sach-suc-manh-cua-ngon-tu-tac-gia-don-gabor-a585.html', 'img/news/smnt.png', '2021-11-15', 'Review sách Sức mạnh của ngôn từ - Don Gabor'),
(14, 'https://www.marieclaire.com/culture/g35825494/best-audiobooks-2021/', 'img/news/best-seller.png', '2021-11-16', 'Top 13 sách bán nhiều nhất năm 2021.'),
(15, 'https://www.reader.com.vn/review-sach-mat-ma-tai-nang-daniel-coyle-a589.html', 'img/news/matmatn.png', '2021-11-18', 'Review sách Mật mã tài năng - Daniel Coyle');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `fn` varchar(20) NOT NULL,
  `ln` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `country` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fn`, `ln`, `email`, `password`, `birth`, `gender`, `country`, `type`) VALUES
(2, 'Nguyễn', 'Văn A', 'dat@gmail.com', 'dat1', '2001-05-12', 'Nữ', 'Việt Nam', 'Khách hàng'),
(3, 'dat', 'dat', 'dat1@gmail.com', 'dat1', '1991-01-20', 'Khác', 'Việt Nam', 'Khách hàng'),
(4, 'Nguyễn', 'Thành Đạt', 'protosmouse1@gmail.com', 'dat1212', '2001-05-16', 'Nam', 'Việt Nam', 'Khách hàng'),
(5, 'admin', 'admin', 'admin', '1', '2001-01-01', 'Khác', 'None', 'Admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
