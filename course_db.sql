-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 04:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_db`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `active`
-- (See below for the actual view)
--
CREATE TABLE `active` (
`ID` int(12)
,`Username` varchar(18)
,`Active` varchar(12)
);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(18) NOT NULL,
  `Password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('Admin', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `Question_id` varchar(3) NOT NULL,
  `Answer_id` int(3) NOT NULL,
  `Choice` text NOT NULL,
  `Answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`Question_id`, `Answer_id`, `Choice`, `Answer`) VALUES
('01', 57, 'A', 'y=x^4-3x^2+1'),
('01', 58, 'B', 'y=frac{x+2}{x-2}'),
('01', 59, 'C', 'y=-x^3+3x^2-1'),
('01', 60, 'D', 'y=frac{x-1}{x-2}'),
('02', 61, 'A', 'log_{a^3}\\,b=\\frac13log_a\\,b'),
('02', 62, 'B', 'log_a\\,(b^2)=2\\,log_a\\,b'),
('02', 63, 'C', 'log_a\\,b\\cdot log_b\\,a=1'),
('02', 64, 'D', 'log_a\\,b=-\\,log_b\\,a'),
('03', 69, 'A', 'm\\lt-1\\) hoặc \\(m \\gt2'),
('03', 70, 'B', 'm\\lt-4\\) hoặc \\(m \\gt0'),
('03', 71, 'C', '-4\\lt m\\lt0'),
('03', 72, 'D', 'm \\gt2\\) hoặc \\(m\\lt-4'),
('04', 73, 'A', '\\left(-\\infty\\,;\\frac12\\right]'),
('04', 74, 'B', '\\left(\\frac 12\\,;+\\infty\\right)'),
('04', 75, 'C', '\\left[\\frac 12\\,;+\\infty\\right)'),
('04', 76, 'D', '\\left(-\\infty\\,;\\frac12\\right)'),
('05', 77, 'A', '8'),
('05', 78, 'B', '2'),
('05', 79, 'C', '6'),
('05', 80, 'D', '4'),
('06', 81, 'A', 't^2-26t+1=0'),
('06', 82, 'B', '25t^2-26t=0'),
('06', 83, 'C', 't^2-26t=0'),
('06', 84, 'D', '25t^2-26t+1=0'),
('07', 85, 'A', 'a^3'),
('07', 86, 'B', '\\frac{a^3}3'),
('07', 87, 'C', '\\frac{a^3sqrt3}4'),
('07', 88, 'D', '\\frac{a^3\\sqrt3}{12}'),
('08', 89, 'A', '\\underset{[0;2]}{max}\\,y=5'),
('08', 90, 'B', '\\underset{[0;2]}{max}\\,y=1'),
('08', 91, 'C', '\\underset{[0;2]}{max}\\,y=-2'),
('08', 92, 'D', '\\underset{[0;2]}{max}\\,y=\\frac32'),
('09', 93, 'A', 'S_{tp}=2\\pi'),
('09', 94, 'B', 'S_{tp}=10\\pi'),
('09', 95, 'C', 'S_{tp}=4\\pi'),
('09', 96, 'D', 'S_{tp}=6\\pi'),
('10', 97, 'A', 'x=4'),
('10', 98, 'B', 'x=3'),
('10', 99, 'C', 'x=2'),
('10', 100, 'D', 'x=5'),
('11', 101, 'A', 'm\\gt-2'),
('11', 102, 'B', 'm\\lt2'),
('11', 103, 'C', 'm\\gt2'),
('11', 104, 'D', '-2\\lt m\\lt2'),
('12', 105, 'A', '1\\le x\\le 3'),
('12', 106, 'B', '1\\lt x\\le 3'),
('12', 107, 'C', 'x\\le 3'),
('12', 108, 'D', '1\\le x \\lt 3'),
('13', 109, 'A', '7'),
('13', 110, 'B', '4'),
('13', 111, 'C', '5'),
('13', 112, 'D', '3'),
('14', 113, 'A', '\\frac{a\\sqrt6}4'),
('14', 114, 'B', '\\frac{a\\sqrt6}{12}'),
('14', 115, 'C', '\\frac{a\\sqrt6}2'),
('14', 116, 'D', '\\frac{a\\sqrt6}3'),
('15', 117, 'A', 'S_{xq}=4\\sqrt3\\pi'),
('15', 118, 'B', 'S_{xq}=12\\pi'),
('15', 119, 'C', 'S_{xq}=8\\sqrt3\\pi'),
('15', 120, 'D', 'S_{xq}=\\sqrt{39}\\pi'),
('16', 121, 'A', '5'),
('16', 122, 'B', '4'),
('16', 123, 'C', '2'),
('16', 124, 'D', '3'),
('17', 125, 'A', 'y=x^3+3x^2-1'),
('17', 126, 'B', 'y=x^3-3x^2-1'),
('17', 127, 'C', 'y=-x^3-3x^2-1'),
('17', 128, 'D', 'y=-x^3+3x^2-1'),
('18', 129, 'A', '[-1;+\\infty)'),
('18', 130, 'B', '(-\\infty;1]\\cup[4;+\\infty)'),
('18', 131, 'C', '(-\\infty;4]'),
('18', 132, 'D', '[-1;4]'),
('19', 133, 'A', '(-2;2)'),
('19', 134, 'B', '\\Bbb R'),
('19', 135, 'C', '(-\\infty;-2)\\cup(2;+\\infty)'),
('19', 136, 'D', '\\Bbb R\\backslash \\{\\pm2\\}'),
('20', 137, 'A', '2a^2'),
('20', 138, 'B', '4a^2'),
('20', 139, 'C', '6a^2'),
('20', 140, 'D', '12a^2'),
('21', 141, 'A', 'm\\lt1'),
('21', 142, 'B', 'm\\gt5,0\\lt m\\lt1'),
('21', 143, 'C', '1\\lt m\\lt5'),
('21', 144, 'D', 'm=1,m=5'),
('22', 145, 'A', '5'),
('22', 146, 'B', '12'),
('22', 147, 'C', '6'),
('22', 148, 'D', '-2'),
('23', 149, 'A', '2'),
('23', 150, 'B', '0'),
('23', 151, 'C', '5'),
('23', 152, 'D', '3'),
('24', 153, 'A', '\\{3;5\\}'),
('24', 154, 'B', '\\{4;3\\}'),
('24', 155, 'C', '\\{3;4\\}'),
('24', 156, 'D', '\\{5;3\\}'),
('25', 157, 'A', 'OM\\le R'),
('25', 158, 'B', 'OM=R'),
('25', 159, 'C', 'OM\\gt R'),
('25', 160, 'D', 'OM\\lt R'),
('26', 161, 'A', '3'),
('26', 162, 'B', '2'),
('26', 163, 'C', '1'),
('26', 164, 'D', '0'),
('27', 165, 'A', 'x=8'),
('27', 166, 'B', 'x=11'),
('27', 167, 'C', 'x=9'),
('27', 168, 'D', 'x=10'),
('28', 169, 'A', '(1;4)'),
('28', 170, 'B', '(4;1)'),
('28', 171, 'C', '(-1;3)'),
('28', 172, 'D', '(3;-1)'),
('29', 173, 'A', '3\\pi'),
('29', 174, 'B', '2\\pi'),
('29', 175, 'C', '6\\pi'),
('29', 176, 'D', '4\\pi'),
('30', 177, 'A', '\\frac{\\pi a^3}3'),
('30', 178, 'B', '\\frac{4\\pi a^3}3'),
('30', 179, 'C', '2\\pi a^3'),
('30', 180, 'D', '4\\pi a^3'),
('31', 181, 'A', '\\frac{3\\,2\\pi}3'),
('31', 182, 'B', '4\\pi'),
('31', 183, 'C', '8\\pi'),
('31', 184, 'D', '16\\pi'),
('32', 185, 'A', 'x=2'),
('32', 186, 'B', 'x=-2'),
('32', 187, 'C', 'x=1'),
('32', 188, 'D', 'x=-1'),
('33', 189, 'A', 'y=log_{\\frac e2}x'),
('33', 190, 'B', 'y=log_{\\frac e3}x'),
('33', 191, 'C', 'y=log_{\\frac{\\sqrt2}2}x'),
('33', 192, 'D', 'y=log_{\\frac\\pi4}x'),
('34', 193, 'A', '3a^3'),
('34', 194, 'B', '6a^3'),
('34', 195, 'C', '\\frac23 a^3'),
('34', 196, 'D', '2a^3'),
('35', 197, 'A', '(-1;\\frac12)'),
('35', 198, 'B', '(\\frac12;1)'),
('35', 199, 'C', '(0;\\frac32)'),
('35', 200, 'D', '(1;+\\infty)'),
('36', 201, 'A', '5'),
('36', 202, 'B', '2'),
('36', 203, 'C', '2023'),
('36', 204, 'D', '2022'),
('37', 205, 'A', '(3;+\\infty)'),
('37', 206, 'B', '(0;+\\infty)'),
('37', 207, 'C', '(1;3)'),
('37', 208, 'D', '(-\\infty;4)'),
('38', 209, 'A', '\\frac1x+1'),
('38', 210, 'B', 'ln\\;x'),
('38', 211, 'C', 'ln\\,x+x'),
('38', 212, 'D', 'ln\\,x-1'),
('39', 213, 'A', '6'),
('39', 214, 'B', '72'),
('39', 215, 'C', '24'),
('39', 216, 'D', '8'),
('40', 217, 'A', '\\frac {a^3}4'),
('40', 218, 'B', '\\frac {\\sqrt3}4a^3'),
('40', 219, 'C', '\\sqrt3a^3'),
('40', 220, 'D', '\\frac34a^3');

-- --------------------------------------------------------

--
-- Table structure for table `answer_map`
--

CREATE TABLE `answer_map` (
  `Question_id` varchar(3) NOT NULL,
  `Answer_id` int(3) NOT NULL,
  `Choice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer_map`
--

INSERT INTO `answer_map` (`Question_id`, `Answer_id`, `Choice`) VALUES
('01', 58, 'B'),
('02', 63, 'D'),
('03', 70, 'B'),
('04', 74, 'B'),
('05', 79, 'C'),
('06', 83, 'D'),
('07', 87, 'D'),
('08', 90, 'B'),
('09', 95, 'C'),
('10', 97, 'A'),
('11', 103, 'C'),
('12', 106, 'B'),
('13', 111, 'C'),
('14', 115, 'C'),
('15', 117, 'A'),
('16', 123, 'D'),
('17', 127, 'D'),
('18', 131, 'D'),
('19', 133, 'A'),
('20', 139, 'C'),
('21', 142, 'B'),
('22', 145, 'A'),
('23', 151, 'C'),
('24', 153, 'A'),
('25', 159, 'C'),
('26', 163, 'C'),
('27', 167, 'D'),
('28', 169, 'A'),
('29', 175, 'D'),
('30', 178, 'B'),
('31', 183, 'D'),
('32', 187, 'D'),
('33', 189, 'A'),
('34', 195, 'D'),
('35', 198, 'B'),
('36', 202, 'B'),
('37', 205, 'A'),
('38', 210, 'B'),
('39', 215, 'C'),
('40', 217, 'A');

-- --------------------------------------------------------

--
-- Stand-in structure for view `answer_sheet`
-- (See below for the actual view)
--
CREATE TABLE `answer_sheet` (
`Subject_id` varchar(3)
,`Test_id` varchar(3)
,`Question_id` varchar(3)
,`Question` varchar(500)
,`Answer` varchar(100)
,`Choice` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `answer_sheet_true`
-- (See below for the actual view)
--
CREATE TABLE `answer_sheet_true` (
`Subject_id` varchar(3)
,`Test_id` varchar(3)
,`Question_id` varchar(3)
,`Question` varchar(500)
,`Answer` varchar(100)
,`Choice` text
);

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `user_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `Subject_id` varchar(3) NOT NULL,
  `Chapter_id` varchar(3) NOT NULL,
  `Chapter_name` varchar(50) NOT NULL,
  `Amount` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(10) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `video` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `tutor_id`, `playlist_id`, `title`, `description`, `video`, `thumb`, `date`, `status`) VALUES
('dk04yzdBcjaNKmLdP0bt', '2lqkPVN2R3joINaVm9Hk', 'LSxN6auk49L1bkevjmgQ', 'esrté', 'sjbdkjahsdkja', 'aqfdf1qKpn47VoUg4VQp.mp4', '62GuRjiCNTq6O4cIyBji.png', '2023-12-24', 'active'),
('RNoi3XLia28mxtsQID5e', '2lqkPVN2R3joINaVm9Hk', 'NmXa3JScBb3dH6q8YwVM', 'abc', 'ádad', 'K4gATZAhAwm8CcbK3BEY.mp4', 'Yuf8yPdRCjIWVL2q2Xmt.png', '2023-12-24', 'active'),
('DVkVIqGT1qVlwmZ1Rvjk', '2lqkPVN2R3joINaVm9Hk', 'YPKHJHPDizoiioHL23jD', 'qq', 'qq', 'O43kWlhvFPZ5doUJoP8U.mp4', 'si0dH4wWekMHVtD42aaP.png', '2023-12-24', 'active'),
('2rNR3oT0ktR9GrhWrJh7', '2lqkPVN2R3joINaVm9Hk', 'YPKHJHPDizoiioHL23jD', 'qq', 'qq', '28tVKEPXcg1rFXpnW680.mp4', '7RhTa8CrF2YkroIabM2g.png', '2023-12-24', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `Chapter_id` varchar(3) NOT NULL,
  `Lesson-id` varchar(3) NOT NULL,
  `Lesson-name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive',
  `subject` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `tutor_id`, `title`, `description`, `thumb`, `date`, `status`, `subject`) VALUES
('YPKHJHPDizoiioHL23jD', '2lqkPVN2R3joINaVm9Hk', 'fsdfsd', 'sdfsdg', 'lp5aV7uXc7TJnLMKzYsx.png', '2023-12-24', 'active', 1),
('YQN85OrgvB34zo1iBTeY', '2lqkPVN2R3joINaVm9Hk', 'sfsaf', 'fsdfas', 'buqHFlAojP3AfWb1vgzQ.png', '2023-12-24', 'active', 1),
('NmXa3JScBb3dH6q8YwVM', '2lqkPVN2R3joINaVm9Hk', 'hêlo', 'jhaskjdghsjkda', 'MI75yNf05jFLWAwHOsrw.png', '2023-12-24', 'active', 1),
('LSxN6auk49L1bkevjmgQ', '2lqkPVN2R3joINaVm9Hk', 'Lý', 'jhkajdhkajds', 'WiH7ZRmwnHL2QdkO6Yxm.png', '2023-12-24', 'active', 2),
('ttA4DIkc58q4WJJKgXo1', '2lqkPVN2R3joINaVm9Hk', 'sdfsd', 'dsfdsf', 'L16ViFvp9RcWOuIn9Jfy.png', '2023-12-24', 'active', 2),
('oXnXxPBcMeH64l90WPUf', '2lqkPVN2R3joINaVm9Hk', 'qq', 'qq', '7WRU8Njpz1FKzOgUKhDW.png', '2023-12-24', 'active', 1),
('RrkXsWymfHHqaFIJ9maa', '2lqkPVN2R3joINaVm9Hk', 'ứqqe', 'dâd', 'SkkiVCpp21sCEnBIXrr7.png', '2023-12-24', 'active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Test_id` varchar(3) NOT NULL,
  `Question_id` varchar(3) NOT NULL,
  `Question` varchar(500) NOT NULL,
  `Have_answer` varchar(8) NOT NULL DEFAULT 'Không'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Test_id`, `Question_id`, `Question`, `Have_answer`) VALUES
('T1', '01', ' Trong các hàm số sau, hàm số nào có đồ thị như hình dưới ?', 'Có'),
('T1', '02', 'Cho các số thực dương \\(a,b\\) khác 1. Khẳng định nào sau đây <b>sai</b>?', 'Có'),
('T1', '03', 'Cho hàm số (y=f(x)) có đồ thị như bên. Tìm các giá trị của \\(m\\) để phương trình có 1 nghiệm duy nhấ', 'Có'),
('T1', '04', 'Tập xác định của hàm số \\(y=ln(2x-1)\\) là', 'Có'),
('T1', '05', 'Cho hàm số \\(y=f(x)\\) liên tục trên đoạn \\([-3;-1]\\) có đồ thị như hình vẽ.\r\nGọi \\(M\\) và \\(m\\) lần lượt là giá trị lớn nhất và giá trị nhỏ nhất của hàm số đã cho trên đoạn \\([-3;-1]\\). Giá trị của \\(M-m\\) bằng', 'Có'),
('T1', '06', 'Cho phương trình \\(25^{x+1}-26.5+1=0\\). Đặt \\(t=5^x,\\,t\\gt0\\)thì phương trình  trở thành', 'Có'),
('T1', '07', 'Cho hình chóp \\(S.ABC\\) có \\(SA\\, \\bot\\, (ABC)\\), đáy \\(ABC\\) là tam giác đều. Tính thể tích khối chóp \\(S.ABC\\) biết \\(AB=a\\,, SA=a\\).', 'Có'),
('T1', '08', ' Giá trị lớn nhất của hàm số \\(y=\\frac{2x-1}{x+1}\\) trên đoạn \\([0;2]\\) là', 'Có'),
('T1', '09', 'Trong không gian, cho hình chữ nhật \\(ABCD\\) có \\(AB=1\\) và \\(AD=2\\). Gọi \\(M,N\\) lần lượt là điểm của \\(AD\\) và \\(BC\\). Quay hình chữ nhật \\(ABCD\\) xung quanh trục \\(MN\\), ta được một hình trụ. Tính diện tích toàn phần \\(S_{tp}\\) của hình trụ đó.', 'Có'),
('T1', '10', ' Nghiệm của phương trình \\(2^{x-1}=8\\) là', 'Có'),
('T1', '11', 'Tìm tất cả giá trị thực của tham số \\(m\\) để phương trình \\(4^x-2m.2^x+2=0\\)  có 2 nghiệm phân biệt.', 'Có'),
('T1', '12', ' Nghiệm của bất phương trình \\(log_\\frac12(x-1)\\ge-1\\) là', 'Có'),
('T1', '13', ' Cho tam giác: \\(OIM\\) vuông tại \\(I\\) có \\(OI=3\\) và \\(IM=4\\). KHi quay tam giác \\(OIM\\) xung quanh cạnh có vuông \\(OI\\) thì đường gấp khúc \\(OIM\\) tạo thành hình nón có độ dài đường sinh bằng', 'Có'),
('T1', '14', 'Cho hình chóp \\(S.ABCD\\) có đáy \\(ABCD\\) là hình chữ nhật có đường chéo bằng \\(a\\sqrt2\\), cạnh \\(SA\\) có độ dài bằng \\(2a\\) và vuông góc với mặt phẳng đáy. Tính bán kính mặt cầu ngoại tiếp hình chóp \\(S.ABCD\\)', 'Có'),
('T1', '15', 'Cho hình nón có bán kính đáy \\(r=\\sqrt3\\) và độ dài đường sinh \\(l=4\\). Tính diện tích xung quanh của hình nón đã cho.', 'Có'),
('T1', '16', 'Cho \\(x,y\\) là các số thực dương thỏa nãm \\(2^{\\,2xy+x+y}=\\frac{8\\,-\\,8xy}{x\\,+\\,y}\\). Khi \\(P=2xy^2+xy\\) đạt giá trị lớn nhất, giá trị của biểu thức \\(3x+2y\\) bằng', 'Có'),
('T1', '17', 'Bảng biến thiên sau đây là của hàm số nào', 'Có'),
('T1', '18', 'Tập nghiệm của bất phương trình \\(2^{x^2-3x}\\le 16\\) là', 'Có'),
('T1', '19', 'Hàm số \\(y=(4-x^2)^\\frac35\\) có tập xác định là', 'Có'),
('T1', '20', 'Cho khối chóp có thể tích bằng \\(10a^3\\) và chiều cao bằng \\(5a\\). Diện tích mặt đáy của khối chóp đó bằng', 'Có'),
('T1', '21', 'Cho hàm số \\(y=f(x)\\) có đồ thị như hình vẽ bên. Tìm tất cả các giá trị của \\(m\\) để phương trình \\(|f(x)|=m\\) có đúng 2 nghiệm phân biệt.', 'Có'),
('T1', '22', 'Phương trình \\(2^{2x}-3.2^{x+2}+32=0\\) có tổng các nghiệm là', 'Có'),
('T1', '23', 'Tổng bình phương các nghiệm của phương trình \\(5^{3x-2}=(\\frac15)^{-x^2}\\) bằng', 'Có'),
('T1', '24', 'Khối hai mươi mặt đều là khối đa diện đề thuộc loại', 'Có'),
('T1', '25', ' Cho điểm \\(M\\) nằm ngoài mặt cầu \\(S\\,(O;R)\\). Khẳng đinh nào dưới đây đúng?', 'Có'),
('T1', '26', 'Cho hàm số \\(y=f(x)\\) có đạo hàm \\(f\'(x)=x^2(2x-1)^2(x+1)\\). Số điểm cực trị của hàm số đã cho là', 'Có'),
('T1', '27', ' Nghiệm của phương trình \\(log_3(x-1)=2\\) là', 'Có'),
('T1', '28', 'Cho hàm số \\(y=f(x)\\) có đồ thị như hình vẽ. Điểm cực đại của đồ thị hàm số đã cho là', 'Có'),
('T1', '29', 'Cho hình trụ có chiều cao \\(h=1\\) và bán kính đáy \\(r=2\\). Diện tích xung quanh của hình trụ đã cho bằng', 'Có'),
('T1', '30', ' Thể tích đường cầu có đường kính \\(2a\\) bằng', 'Có'),
('T1', '31', 'Cho mặt cầu có bán kính \\(R=2\\). Diện tích của mặt cầu đã cho bằng', 'Có'),
('T1', '32', 'Cho hàm số \\(f(x)\\) có bảng biến thiên như hình vẽ. Hàm số đã cho cực đại tại', 'Có'),
('T1', '33', 'Hàm số nào sau đây đồng biến trên tập xác định của nó', 'Có'),
('T1', '34', 'Cho khối nón có diện tích đáy \\(3a^2\\) và chiều cao \\(2a\\). Thể tích của khối nón đã cho bằng', 'Có'),
('T1', '35', 'Cho hàm số \\(y=f(x)\\) có bảng biến thiên như hình bên. Hàm số \\(y=f(1-2x)+1\\) đồng biến trên khoảng', 'Có'),
('T1', '36', 'Có bao nhiêu cặp số nguyên \\((x;y)\\) thỏa mãn \\(0\\le x\\le2022\\) và \\(5(25^y+2y)=x+log_5(x+1)^5-4\\)', 'Có'),
('T1', '37', 'Cho hàm số \\(y=f(x)\\) có bảng biến thiên như hình vẽ. Hàm số \\(y=f(x)\\) đồng biến trên khoảng nào sau đây?', 'Có'),
('T1', '38', 'Đạo hàm của hàm số \\(y=xlnx-x\\) là', 'Có'),
('T1', '39', 'Thể tích khối hình hộp chữ nhật có các kích thước \\(2;3;4\\) là', 'Có'),
('T1', '40', 'Cho khối chóp \\(S.ABCD\\) có đáy \\(ABC\\) là tam giác cân đỉnh \\(A\\), góc \\(\\angle{BAC} =120^\\circ\\) và \\(AB=a\\). Các cạnh bên \\(SA,SB,SC\\) bằng nhau và góc giữa \\(SA\\) với mặt phẳng đáy bằng \\(60^circ\\). Thể tích của khối chóp đã cho bằng', 'Có');

-- --------------------------------------------------------

--
-- Stand-in structure for view `question_status`
-- (See below for the actual view)
--
CREATE TABLE `question_status` (
`Subject_id` varchar(3)
,`Test_id` varchar(3)
,`Question_id` varchar(3)
,`Question` varchar(500)
,`Have_answer` varchar(8)
);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_id` varchar(3) NOT NULL,
  `Subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_id`, `Subject_name`) VALUES
('L', 'Lý'),
('T', 'Toán');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `Subject_id` varchar(3) NOT NULL,
  `Test_id` varchar(3) NOT NULL,
  `Test_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`Subject_id`, `Test_id`, `Test_name`) VALUES
('T', 'T1', 'Kiểm tra cuối kỳ toán');

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `Test_id` varchar(3) NOT NULL,
  `Username` varchar(18) NOT NULL,
  `Test_name` varchar(50) NOT NULL,
  `Score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`Test_id`, `Username`, `Test_name`, `Score`) VALUES
('T1', 'zaa12579', 'Kiểm tra cuối kỳ toán', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `name`, `profession`, `email`, `password`, `image`) VALUES
('2lqkPVN2R3joINaVm9Hk', 'ss', '', 'truong123@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'wFGlblPitkLL2gLcq1Rw.jpg'),
('fyT5UowVFcMfCHhjghDa', 'abc', '', 'a@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '9nPAKzPLj0B5xr91P9RY.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(12) NOT NULL,
  `Username` varchar(18) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `CCCD` varchar(12) DEFAULT NULL,
  `Date_of_birth` date NOT NULL,
  `Gmail` varchar(50) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Gender` varchar(14) DEFAULT NULL,
  `Signup_date` date NOT NULL DEFAULT current_timestamp(),
  `Active` varchar(12) NOT NULL DEFAULT 'Off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Name`, `CCCD`, `Date_of_birth`, `Gmail`, `Password`, `Gender`, `Signup_date`, `Active`) VALUES
(5, 'zaa12579', 'Đào Duy Khánh Tùng', '001203022211', '1990-01-01', 's@gmail.com', 'Zaa135@#', 'Không rõ', '2023-12-08', '0'),
(8, 'truong123', 'truong', '242342351234', '1990-01-01', 'truong@gmail.com', 'Abcdef-123456', 'Nam', '2023-12-24', 'Off');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `active`
--
DROP TABLE IF EXISTS `active`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `active`  AS SELECT `user`.`ID` AS `ID`, `user`.`Username` AS `Username`, `user`.`Active` AS `Active` FROM `user` ;

-- --------------------------------------------------------

--
-- Structure for view `answer_sheet`
--
DROP TABLE IF EXISTS `answer_sheet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `answer_sheet`  AS SELECT `test`.`Subject_id` AS `Subject_id`, `test`.`Test_id` AS `Test_id`, `question`.`Question_id` AS `Question_id`, `question`.`Question` AS `Question`, `answer`.`Answer` AS `Answer`, `answer`.`Choice` AS `Choice` FROM ((((`test` join `question` on(`test`.`Test_id` = `question`.`Test_id`)) join `subject` on(`test`.`Subject_id` = `subject`.`Subject_id`)) join `answer` on(`question`.`Question_id` = `answer`.`Question_id`)) join `answer_map` on(`question`.`Question_id` = `answer_map`.`Question_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `answer_sheet_true`
--
DROP TABLE IF EXISTS `answer_sheet_true`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `answer_sheet_true`  AS SELECT `test`.`Subject_id` AS `Subject_id`, `test`.`Test_id` AS `Test_id`, `question`.`Question_id` AS `Question_id`, `question`.`Question` AS `Question`, `answer`.`Answer` AS `Answer`, `answer_map`.`Choice` AS `Choice` FROM ((((`test` join `question` on(`test`.`Test_id` = `question`.`Test_id`)) join `subject` on(`test`.`Subject_id` = `subject`.`Subject_id`)) join `answer` on(`question`.`Question_id` = `answer`.`Question_id`)) join `answer_map` on(`question`.`Question_id` = `answer_map`.`Question_id`)) WHERE `answer_map`.`Choice` = `answer`.`Choice` ;

-- --------------------------------------------------------

--
-- Structure for view `question_status`
--
DROP TABLE IF EXISTS `question_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `question_status`  AS SELECT `test`.`Subject_id` AS `Subject_id`, `test`.`Test_id` AS `Test_id`, `question`.`Question_id` AS `Question_id`, `question`.`Question` AS `Question`, `question`.`Have_answer` AS `Have_answer` FROM ((`test` join `question` on(`test`.`Test_id` = `question`.`Test_id`)) join `subject` on(`test`.`Subject_id` = `subject`.`Subject_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`Answer_id`),
  ADD KEY `Question_id` (`Question_id`);

--
-- Indexes for table `answer_map`
--
ALTER TABLE `answer_map`
  ADD PRIMARY KEY (`Question_id`,`Answer_id`),
  ADD KEY `answer_map_ibfk_4` (`Answer_id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`Chapter_id`),
  ADD UNIQUE KEY `Subject_id` (`Subject_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`Lesson-id`),
  ADD UNIQUE KEY `Lesson-name` (`Lesson-name`),
  ADD UNIQUE KEY `Chapter_id` (`Chapter_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Question_id`),
  ADD KEY `question_ibfk_1` (`Test_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_id`),
  ADD UNIQUE KEY `Subject-name` (`Subject_name`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`Test_id`),
  ADD UNIQUE KEY `Test_name` (`Test_name`),
  ADD KEY `test_ibfk_1` (`Subject_id`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD UNIQUE KEY `Username_2` (`Username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `Answer_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`Question_id`) REFERENCES `question` (`Question_id`);

--
-- Constraints for table `answer_map`
--
ALTER TABLE `answer_map`
  ADD CONSTRAINT `answer_map_ibfk_4` FOREIGN KEY (`Answer_id`) REFERENCES `answer` (`Answer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `answer_map_ibfk_5` FOREIGN KEY (`Question_id`) REFERENCES `question` (`Question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subject` (`Subject_id`),
  ADD CONSTRAINT `chapter_ibfk_2` FOREIGN KEY (`Chapter_id`) REFERENCES `lesson` (`Chapter_id`);

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`Chapter_id`) REFERENCES `subject` (`Subject_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`Test_id`) REFERENCES `test` (`Test_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subject` (`Subject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `test_result`
--
ALTER TABLE `test_result`
  ADD CONSTRAINT `test_result_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
