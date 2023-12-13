-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2023 lúc 10:17 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `login`
--

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `active`
-- (See below for the actual view)
--
CREATE TABLE `active` (
`ID` int(12)
,`Username` varchar(18)
,`Active` varchar(12)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answer`
--

CREATE TABLE `answer` (
  `Answer_id` int(3) NOT NULL,
  `Choice` text NOT NULL,
  `Answer` varchar(100) NOT NULL,
  `Question_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answer_map`
--

CREATE TABLE `answer_map` (
  `Question_id` varchar(3) NOT NULL,
  `Answer_id` int(3) NOT NULL,
  `Choice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lesson`
--

CREATE TABLE `lesson` (
  `Subject-id` varchar(3) NOT NULL,
  `Lesson-id` varchar(3) NOT NULL,
  `Lesson-name` varchar(50) NOT NULL,
  `View` tinyint(1) NOT NULL,
  `Liked` tinyint(1) NOT NULL,
  `Disliked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `Test_id` varchar(3) NOT NULL,
  `Question_id` varchar(3) NOT NULL,
  `Question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`Test_id`, `Question_id`, `Question`) VALUES
('aa', '2', '3'),
('aa', '3', '4');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `student_score_sheet`
-- (See below for the actual view)
--
CREATE TABLE `student_score_sheet` (
`Username` varchar(18)
,`Test_name` varchar(50)
,`Score` int(3)
,`Time` time
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `Subject_id` varchar(3) NOT NULL,
  `Subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test`
--

CREATE TABLE `test` (
  `Subject_id` varchar(3) NOT NULL,
  `Test_id` varchar(3) NOT NULL,
  `Test_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `test`
--

INSERT INTO `test` (`Subject_id`, `Test_id`, `Test_name`) VALUES
('7', 'aa', 'asddadas');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test_result`
--

CREATE TABLE `test_result` (
  `Test_id` varchar(3) NOT NULL,
  `Username` varchar(18) NOT NULL,
  `Test_name` varchar(50) NOT NULL,
  `Score` int(3) DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(12) NOT NULL,
  `Username` varchar(18) NOT NULL,
  `Họ và tên` varchar(50) DEFAULT NULL,
  `CCCD` int(12) DEFAULT NULL,
  `Ngày sinh` date NOT NULL,
  `Gmail` varchar(50) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Giới tính` varchar(14) DEFAULT NULL,
  `Ngày đăng ký` date NOT NULL DEFAULT current_timestamp(),
  `Active` varchar(12) NOT NULL DEFAULT 'Off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `Username`, `Họ và tên`, `CCCD`, `Ngày sinh`, `Gmail`, `Password`, `Giới tính`, `Ngày đăng ký`, `Active`) VALUES
(5, 'zaa12579', 'qweqweq qưeq', 1203022211, '1990-01-01', 's@gmail.com', 'Zaa135@#', 'Không rõ', '2023-12-08', '0');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `active`
--
DROP TABLE IF EXISTS `active`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `active`  AS SELECT `user`.`ID` AS `ID`, `user`.`Username` AS `Username`, `user`.`Active` AS `Active` FROM `user` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `student_score_sheet`
--
DROP TABLE IF EXISTS `student_score_sheet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_score_sheet`  AS SELECT `user`.`Username` AS `Username`, `test_result`.`Test_name` AS `Test_name`, `test_result`.`Score` AS `Score`, `test_result`.`Time` AS `Time` FROM (`user` join `test_result` on(`user`.`Username` = `test_result`.`Username`)) ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`Answer_id`),
  ADD KEY `Question_id` (`Question_id`);

--
-- Chỉ mục cho bảng `answer_map`
--
ALTER TABLE `answer_map`
  ADD PRIMARY KEY (`Question_id`,`Answer_id`),
  ADD KEY `Answer_id` (`Answer_id`);

--
-- Chỉ mục cho bảng `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`Lesson-id`),
  ADD UNIQUE KEY `Lesson-name` (`Lesson-name`),
  ADD UNIQUE KEY `Subject-id` (`Subject-id`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Question_id`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_id`),
  ADD UNIQUE KEY `Subject-name` (`Subject_name`);

--
-- Chỉ mục cho bảng `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`Test_id`),
  ADD UNIQUE KEY `Test_name` (`Test_name`);

--
-- Chỉ mục cho bảng `test_result`
--
ALTER TABLE `test_result`
  ADD UNIQUE KEY `Username` (`Test_name`),
  ADD UNIQUE KEY `Username_2` (`Username`),
  ADD UNIQUE KEY `Test_id` (`Test_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answer`
--
ALTER TABLE `answer`
  MODIFY `Answer_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`Question_id`) REFERENCES `question` (`Question_id`);

--
-- Các ràng buộc cho bảng `answer_map`
--
ALTER TABLE `answer_map`
  ADD CONSTRAINT `answer_map_ibfk_3` FOREIGN KEY (`Question_id`) REFERENCES `question` (`Question_id`),
  ADD CONSTRAINT `answer_map_ibfk_4` FOREIGN KEY (`Answer_id`) REFERENCES `answer` (`Answer_id`);

--
-- Các ràng buộc cho bảng `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`Test_id`) REFERENCES `test` (`Test_id`);

--
-- Các ràng buộc cho bảng `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `test` (`Subject_id`),
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`Subject_id`) REFERENCES `lesson` (`Subject-id`);

--
-- Các ràng buộc cho bảng `test_result`
--
ALTER TABLE `test_result`
  ADD CONSTRAINT `test_result_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
