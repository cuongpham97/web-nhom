-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 10:19 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_image`) VALUES
(1, 'quoccuong', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'c-1.gif');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `user_id` int(11) DEFAULT NULL,
  `comment_id` int(11) NOT NULL,
  `comment_content` text CHARACTER SET utf8,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lecture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`user_id`, `comment_id`, `comment_content`, `comment_date`, `lecture_id`) VALUES
(1, 24, '<p>Comment n&egrave;</p>\n', '2018-12-14 07:57:35', 31);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `course_image` varchar(200) CHARACTER SET utf8 DEFAULT 'img-courses-default.png',
  `course_alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_image`, `course_alias`) VALUES
(2, 'Cascading Style Sheets', '2-css.png', 'CSS'),
(3, 'Javascript', '3-js.svg', NULL),
(4, 'Hypertext Preprocessor', '4-php.png', 'PHP'),
(5, 'MySQL', '5-sql.svg', 'MySQL'),
(6, 'About me', '6-aboutme.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `description_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `description_detail` text CHARACTER SET utf32 COLLATE utf32_unicode_ci,
  `description_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_title` varchar(255) CHARACTER SET utf16 COLLATE utf16_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`description_id`, `course_id`, `description_detail`, `description_image`, `description_title`) VALUES
(2, 2, 'CSS là một file có phần mở rộng là .css, nhiệm vụ của nó là tách riêng phần định dạng (style) ra khỏi nội dung trang HTML. Khi sử dụng css chúng ta sẽ dễ dàng quản lý nội dung trang HTML, dễ điều khiển phần định dạng, và đặc biệt là sẽ tốn ít thời gian khi code hay chỉnh sửa...', '2-css.png', 'Ngôn ngữ cho kiểu trang web'),
(3, 3, 'JavaScript là một ngôn ngữ lập trình được nhúng được trong các trang HTML. JavaScript nâng cao tính động và khả năng tương tác cho web-site bằng cách sử dụng các hiệu ứng của nó như thực hiện các phép tính, kiểm tra form, viết các trò chơi, bổ sung các hiệu ứng đặc biệt, tuỳ biến các chọn lựa đồ hoạ, tạo ra các mật khẩu bảo mật và hơn thế nữa.', '3-js.png', 'Ngôn ngữ lập trình kịch bản'),
(4, 5, 'Website luôn cần phải làm việc với cơ sở dữ liệu. \r\nMySQL là một hệ quản trị cơ sở dữ liệu có tốc độ cao, ổn định, dễ sử dụng, và có lượng người dùng hỗ trợ đông đảo . \r\nDo đó, nó là sự lựa chọn hàng đầu trong việc phát triển website.', '4-sql.png', 'Hệ quản trị cơ sở dữ liệu'),
(5, 4, 'PHP được dùng để phát triển các ứng dụng viết cho máy chủ, mã nguồn mở, dùng cho mục đích tổng quát. Nó rất thích hợp với web và có thể dễ dàng nhúng vào trang HTML. Do được tối ưu hóa cho các ứng dụng web, tốc độ nhanh, nhỏ gọn, cú pháp giống C và Java, dễ học và thời gian xây dựng sản phẩm tương đối ngắn hơn so với các ngôn ngữ khác nên PHP đã nhanh chóng trở thành một ngôn ngữ lập trình web phổ biến nhất thế giới.', '5-php.png', 'Ngôn ngữ lập trình các trang web');

-- --------------------------------------------------------

--
-- Table structure for table `directories`
--

CREATE TABLE `directories` (
  `course_id` int(11) DEFAULT NULL,
  `directory_id` int(11) NOT NULL,
  `directory_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `directory_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `directories`
--

INSERT INTO `directories` (`course_id`, `directory_id`, `directory_name`, `directory_order`) VALUES
(2, 9, 'Giới thiệu CSS', 1),
(2, 10, 'Tìm hiểu các Selector', 1),
(2, 11, 'Tìm hiểu về Units và Values', 2),
(2, 12, 'Tìm hiểu về Font, Text, List Properties 	', 3),
(2, 13, 'Tìm hiểu về Box Model', 4),
(2, 14, 'Tìm hiểu về Background', 5),
(3, 16, 'Thiết lập môi trường làm việc', 1),
(3, 17, 'Tìm hiểu biến và các kiểu dữ liệu chuỗi', 2),
(3, 18, 'Tra cứu tài liệu JavaScript trên MDN', 3),
(3, 19, 'Kiểu số và các phép toán logic', 4),
(3, 20, 'So sánh điều kiện và rẽ nhánh', 5),
(3, 21, 'Giới thiệu về hàm', 6),
(3, 22, 'Mảng và vòng lặp', 7),
(3, 23, 'Thực hành và kết thúc khóa học', 8),
(4, 24, 'Giới thiệu và Làm quen PHP', 1),
(4, 25, 'Thiết lập môi trường làm việc hiệu quả', 2),
(4, 26, 'Thao tác với các thành phần cơ bản trong PHP', 3),
(5, 29, 'Giới thiệu MySQL', 1),
(5, 30, 'Database và table', 2),
(5, 31, 'Truy vấn và các mệnh đề', 3),
(5, 32, 'MySQL nâng cao', 4),
(5, 33, 'Bảo mật trong MySQL', 5);

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `directory_id` int(11) DEFAULT NULL,
  `goal_id` int(11) NOT NULL,
  `goal_content` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `goal_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`directory_id`, `goal_id`, `goal_content`, `goal_order`) VALUES
(9, 21, 'CSS là gì?', 1),
(9, 22, 'Các khái niệm và thuật ngữ nền tảng trong CSS?', 2),
(9, 23, 'Cách thức nhúng mã CSS vào trong website?', 3),
(9, 24, 'Text Editor hỗ trợ viết website chuyên nghiệp (Brackets)?', 4),
(10, 25, 'Type Selector', 1),
(10, 26, 'Class & Id Selector', 2),
(10, 27, 'Attribute Selector', 3),
(10, 28, 'Pseudo Class & Element Selector', 4),
(10, 29, 'Combinator Selector', 5),
(11, 30, 'Các đơn vị tuyệt đối (Absolute Length Units).', 1),
(11, 31, 'Các đơn vị tương đối (Relative Length Units).', 2),
(11, 32, 'Kiểu dữ liệu văn bản và số.', 3),
(11, 33, 'Cơ chế thiết lập giá trị cho thuộc tính.', 4),
(12, 34, 'Font Properties.', 1),
(12, 35, 'Text Properties.', 2),
(12, 36, 'List Properties.', 3),
(13, 37, 'Khái niệm về Box Model', 1),
(13, 38, 'Block và Inline.', 2),
(13, 39, 'Box sizing Property.', 3),
(13, 40, 'Overflow Property.', 4),
(13, 41, 'Float Property.', 5),
(13, 42, 'Clear Property.', 6),
(13, 43, 'Kỹ thuật Hidden và Clear-fix.', 7),
(13, 44, 'Position Property - Static & Relative.', 8),
(13, 45, 'Position Property - Absolute.', 9),
(13, 46, 'Position Property - Fixed.', 10),
(13, 47, 'z-index Property.', 11),
(14, 48, 'Background color và background image', 1),
(14, 49, 'Border Radius.', 2),
(16, 50, 'Cơ bản về mã nguồn JavaScript', 1),
(16, 51, 'Môi trường phát triển JavaScript', 2),
(16, 52, 'Sử dụng trình soạn thảo', 3),
(16, 53, 'Nhúng mã JavaScript vào Website', 4),
(17, 54, 'Biến và kiểu dữ liệu trong JavaScript', 1),
(17, 55, 'Biến và kiểu dữ liệu trong JavaScript', 2),
(17, 56, 'Tìm hiểu về chuỗi', 3),
(18, 57, 'Nắm được cách tra cứu tài liệu qua trang MDN của Mozilla Foundation', 1),
(19, 58, 'Phép toán cơ bản +,-,*,/,==,===...', 1),
(19, 59, 'Phép toán logic &&, || !...', 2),
(20, 60, 'Điều kiện IF-ELSE', 1),
(20, 61, 'Điều kiện rẽ nhánh SWITCH-CASE', 2),
(21, 62, 'Giới thiệu hàm', 1),
(21, 63, 'Cách gọi hàm', 1),
(21, 64, 'Phạm vi biến trong một hàm', 2),
(22, 65, 'Mảng là gì? khai báo mảng trong JavaScript', 1),
(23, 66, 'Mảng là gì? Cách nhận dạng bài tập', 1),
(24, 67, 'Giới thiệu ngôn ngữ PHP', 1),
(24, 68, 'Làm quen với PHP', 2),
(25, 70, 'Cơ bản về mã nguồn PHP', 1),
(25, 71, 'Môi trường phát triển PHP', 2),
(25, 72, 'Nhúng mã PHP vào Website', 3),
(26, 74, 'Xử lí tập tin', 2),
(26, 75, 'Các đối tượng căn bản', 3),
(29, 79, 'MySQL là gì?', 1),
(29, 80, 'MySQL có thể làm những gì', 2),
(29, 81, 'Sử dụng MySQL', 3),
(30, 82, 'Cách tạo một database', 1),
(30, 83, 'Thao tác với đối tượng bảng', 2),
(30, 84, 'Các kiểu dữ liệu', 3),
(30, 85, 'Giá trị NULL', 4),
(31, 86, 'Từ khóa trong MySQL', 1),
(31, 87, 'Các kiểu truy vấn', 2),
(31, 88, 'Các hàm hữu ích', 3),
(32, 89, 'Phần nâng cao', 1),
(33, 90, 'Các thao tác bảo mật', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `directory_id` int(11) DEFAULT NULL,
  `lecture_id` int(11) NOT NULL,
  `lecture_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lecture_order` int(11) DEFAULT NULL,
  `lecture_data` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`directory_id`, `lecture_id`, `lecture_name`, `lecture_order`, `lecture_data`) VALUES
(10, 31, 'Attribute Selector', 3, NULL),
(10, 32, 'Tìm hiểu về Dynamic pseudo element và Pseudo-element Selectors', 4, NULL),
(10, 33, 'Tìm hiểu về combinator Selector', 5, NULL),
(11, 34, 'Tìm hiểu về các đơn vị tuyệt đối', 1, NULL),
(11, 35, 'Tìm hiểu về các đơn vị tương đối trong CSS', 2, NULL),
(11, 36, 'Kiểu dữ liệu văn bản và số trong CSS', 3, NULL),
(11, 37, 'Cách tính toán giá trị CSS của trình duyệt', 4, NULL),
(11, 38, 'Các giá trị màu sắc', 5, NULL),
(12, 39, 'Tìm hiểu các thuộc tính liên quan tới font', 1, NULL),
(12, 40, 'Các thuộc tính liên quan đến văn bản', 2, NULL),
(12, 41, 'Các thuộc tính liên quan đến danh sách', 3, NULL),
(13, 42, 'Khái niệm box modal', 1, NULL),
(13, 43, 'Cơ chế block và inline', 2, NULL),
(13, 44, 'Các thuộc tính box-sizing', 3, NULL),
(16, 52, 'Khai báo và sử dụng javascript', 1, NULL),
(17, 53, 'Biến là gì', 1, NULL),
(17, 54, 'Kiểu dữ liệu trong javascript', 2, NULL),
(17, 55, 'Sử dụng developer tool', 3, NULL),
(17, 56, 'Hướng dẫn sử dụng hàm Prompt', 4, NULL),
(17, 57, 'Ghép nối chuỗi trong javascript', 5, NULL),
(17, 58, 'Các thao tác trên chuỗi', 6, NULL),
(18, 59, 'Cách tra cứu tài liệu trên Mozilla developer Network', 1, NULL),
(18, 60, 'Cách đọc tài liệu trên MDN', 2, NULL),
(18, 61, 'Khảo sát hàm có tham số trên MDN', 3, NULL),
(19, 62, 'Làm việc với kiểu số', 1, NULL),
(19, 63, 'Các phép toán trên kiểu số', 2, NULL),
(19, 64, 'Thứ tự thực hiện phép toán', 3, NULL),
(19, 65, 'Giá trị số và chuỗi', 4, NULL),
(19, 66, 'Tìm hiểu các hàm parse', 5, NULL),
(19, 67, 'Tìm hiểu đối tượng Math', 6, NULL),
(19, 68, 'Kiểu dữ liệu boolean: true - false', 7, NULL),
(19, 69, 'Toán tử logic or', 8, NULL),
(19, 70, 'Truthy và Falsy', 9, NULL),
(20, 71, 'Tìm hiểu câu lệnh if - else', 1, NULL),
(20, 72, 'Tìm hiểu câu lệnh switch - case', 2, NULL),
(21, 73, 'Hàm là gì, khai báo hàm trong javascript', 1, NULL),
(21, 74, 'Hàm là gì, hướng dẫn gọi hàm', 2, NULL),
(21, 75, 'Phạm vi biến trong hàm', 3, NULL),
(22, 76, 'Mảng là gì?', 1, NULL),
(22, 77, 'Khai báo và sử dụng mảng', 2, NULL),
(22, 78, 'Thao tác với phần tử mảng', 3, NULL),
(22, 79, 'Duyệt mảng với vòng lặp for', 4, NULL),
(22, 80, 'Ứng dụng bài toán nhập số', 5, NULL),
(22, 81, 'Các loại vòng lặp trong javascript', 6, NULL),
(22, 82, 'Break và countinue', 7, NULL),
(23, 83, 'Câu hỏi liên quan', 1, NULL),
(24, 84, 'Giới thiệu ngôn ngữ PHP', 1, NULL),
(24, 85, 'Làm quen với PHP', 2, NULL),
(25, 86, 'Khai báo và sử dụng biến PHP', 1, NULL),
(26, 87, 'Các kiểu dữ liệu cơ sở', 1, NULL),
(26, 88, 'Cách sử dụng chuỗi trong PHP', 2, NULL),
(26, 89, 'Viết chú thích trong PHP', 3, NULL),
(26, 90, 'Lệnh điều kiện if ... else trong PHP', 4, NULL),
(26, 91, 'Lệnh switch case trong PHP', 5, NULL),
(26, 92, 'Vòng lặp for & foreach trong PHP', 6, NULL),
(26, 93, 'Vòng lặp while và do while trong PHP', 7, NULL),
(26, 94, 'Giới thiệu và phân loại hàm (function) trong PHP', 8, NULL),
(26, 95, 'Sử dụng hàm (function) trong PHP', 9, NULL),
(29, 111, 'MySQL là gì?', 1, NULL),
(29, 112, 'Cài đặt', 2, NULL),
(29, 113, 'Quản lý', 3, NULL),
(29, 114, 'Cú pháp cơ bản MySQL - PHP', 4, NULL),
(29, 115, 'Kết nối MySQL', 5, NULL),
(30, 116, 'Tạo Database', 1, NULL),
(30, 117, 'Xóa Database', 2, NULL),
(30, 118, 'Chọn cơ sở dữ liệu', 3, NULL),
(30, 119, 'Kiểu dữ liệu trong MySQL', 4, NULL),
(30, 120, 'Tạo - Xóa - Sửa table', 5, NULL),
(31, 121, 'Truy vấn insert', 1, NULL),
(31, 122, 'Truy vấn select', 2, NULL),
(31, 123, 'Mệnh đề where', 3, NULL),
(31, 124, 'Truy vấn update', 4, NULL),
(31, 125, 'Truy vấn delete', 5, NULL),
(31, 126, 'Mệnh đề like', 6, NULL),
(31, 127, 'Mệnh đề order by', 7, NULL),
(31, 128, 'Sử dụng join', 8, NULL),
(31, 129, 'Mệnh đề in', 9, NULL),
(31, 130, 'Mệnh đề between', 10, NULL),
(31, 131, 'Từ khóa union', 11, NULL),
(31, 132, 'Hàm hữu ích', 12, NULL),
(32, 133, 'Regexp trong MySQL', 1, NULL),
(32, 134, 'Transaction trong MySQL', 2, NULL),
(32, 135, 'Lệnh Alter', 3, NULL),
(32, 136, 'Chỉ mục Index', 4, NULL),
(32, 137, 'Bảng tạm (temporary table)', 5, NULL),
(32, 138, 'Mô phỏng bảng', 6, NULL),
(32, 139, 'Thông tin database', 7, NULL),
(32, 140, 'Sử dụng sequence', 8, NULL),
(32, 141, 'Xử lý bản sao', 9, NULL),
(33, 142, 'SQL injection', 1, NULL),
(33, 143, 'Export và Sao lưu (backup)', 2, NULL),
(33, 144, 'Import và phục hồi', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `menu_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_link`, `menu_order`) VALUES
(1, 'Home', '/home', 1),
(2, 'Overview', '/overview', 2),
(3, 'Work With Sue', '#', 3),
(4, 'Resourse', '/resources', 4);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` int(11) NOT NULL,
  `resource_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `resource_name`) VALUES
(1, 'Resources thực hành'),
(2, 'Trình soạn thảo, xampp, MySQL'),
(3, 'Bootstrap, JQuery'),
(4, 'Link khác'),
(5, 'Tài liệu tham khảo');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `submenu_id` int(11) NOT NULL,
  `submenu_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `submenu_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `submenu_order` int(11) DEFAULT NULL,
  `submenu_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`submenu_id`, `submenu_name`, `submenu_link`, `submenu_order`, `submenu_parent`) VALUES
(2, 'CSS', '/courses/cascading-style-sheets-2', 2, 3),
(3, 'JavaScript', '/courses/javascript-3', 3, 3),
(4, 'PHP', '/courses/hypertext-preprocessor-4', 4, 3),
(5, 'MySQL', '/courses/mysql-5', 5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `lecture_id` (`lecture_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`description_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `directories`
--
ALTER TABLE `directories`
  ADD PRIMARY KEY (`directory_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`goal_id`),
  ADD KEY `directory_id` (`directory_id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`lecture_id`),
  ADD KEY `directory_id` (`directory_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`submenu_id`),
  ADD KEY `submenu_parent` (`submenu_parent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `directories`
--
ALTER TABLE `directories`
  MODIFY `directory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`lecture_id`) ON DELETE CASCADE;

--
-- Constraints for table `description`
--
ALTER TABLE `description`
  ADD CONSTRAINT `description_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `directories`
--
ALTER TABLE `directories`
  ADD CONSTRAINT `directories_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `goals`
--
ALTER TABLE `goals`
  ADD CONSTRAINT `goals_ibfk_1` FOREIGN KEY (`directory_id`) REFERENCES `directories` (`directory_id`) ON DELETE CASCADE;

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`directory_id`) REFERENCES `directories` (`directory_id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `sub_menu_ibfk_1` FOREIGN KEY (`submenu_parent`) REFERENCES `menu` (`menu_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
