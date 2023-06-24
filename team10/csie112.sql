-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： mariadb1
-- 產生時間： 2023 年 06 月 24 日 08:45
-- 伺服器版本： 10.7.8-MariaDB-1:10.7.8+maria~ubu2004
-- PHP 版本： 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `csie112`
--

-- --------------------------------------------------------

--
-- 資料表結構 `T10_agency_collect`
--

CREATE TABLE `T10_agency_collect` (
  `id` int(25) NOT NULL,
  `admission_type` varchar(25) NOT NULL,
  `money_flag` tinyint(1) NOT NULL,
  `money` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `T10_agency_collect`
--

INSERT INTO `T10_agency_collect` (`id`, `admission_type`, `money_flag`, `money`) VALUES
(1, 'unnormal', 1, 42738),
(2, 'unnormal', 0, 306),
(3, 'unnormal', 1, 25496),
(4, 'unnormal', 0, 939),
(5, 'normal', 0, 719),
(6, 'unnormal', 1, 45061),
(7, 'normal', 0, 423),
(8, 'unnormal', 1, 13599),
(9, 'normal', 0, 288),
(10, 'unnormal', 0, 645),
(11, 'unnormal', 0, 991),
(12, 'unnormal', 0, 956),
(13, 'normal', 0, 315),
(14, 'unnormal', 0, 320),
(15, 'unnormal', 1, 31053),
(16, 'normal', 1, 37243),
(17, 'normal', 0, 568),
(18, 'normal', 0, 413),
(19, 'unnormal', 0, 729),
(20, 'normal', 0, 450),
(21, 'unnormal', 0, 965),
(22, 'unnormal', 1, 36628),
(23, 'normal', 1, 36257),
(24, 'normal', 0, 944),
(25, 'normal', 0, 837),
(26, 'normal', 0, 457),
(27, 'normal', 1, 38869),
(28, 'normal', 1, 19310),
(29, 'normal', 0, 633),
(30, 'unnormal', 1, 48498),
(31, 'normal', 0, 467),
(32, 'unnormal', 0, 492),
(33, 'normal', 1, 34100),
(34, 'normal', 1, 15404),
(35, 'unnormal', 0, 394),
(36, 'normal', 1, 21964),
(37, 'normal', 0, 208),
(38, 'normal', 0, 327),
(39, 'unnormal', 1, 14273),
(40, 'normal', 0, 350),
(41, 'unnormal', 1, 38357),
(42, 'normal', 1, 28283),
(43, 'unnormal', 0, 920),
(44, 'normal', 0, 828),
(45, 'unnormal', 0, 587),
(46, 'normal', 0, 541),
(47, 'normal', 1, 44215),
(48, 'unnormal', 0, 395),
(49, 'normal', 1, 36744),
(50, 'unnormal', 1, 12680),
(51, 'normal', 1, 27624),
(52, 'unnormal', 1, 10134),
(53, 'unnormal', 0, 660),
(1, 'normal', 0, 300),
(1, 'unnormal', 0, 350);

-- --------------------------------------------------------

--
-- 資料表結構 `T10_agency_info`
--

CREATE TABLE `T10_agency_info` (
  `id` int(25) NOT NULL,
  `account` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `care_type` varchar(25) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `detailed` varchar(255) NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `review` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `T10_agency_info`
--

INSERT INTO `T10_agency_info` (`id`, `account`, `name`, `address`, `phone`, `care_type`, `start`, `end`, `people`, `detailed`, `main_image`, `review`) VALUES
(1, '', '冒險者之家', '王都東區', 912345678, 'stay', 6, 12, 123, '惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠', 'D:\\xampp\\htdocs\\ggit\\agency', 1),
(2, '', '冒險者公會', '摩根帝國', 987654321, 'day', 14, 16, 30, '', '', 0),
(4, 'account1', 'Agency 1', '嘉義縣', 1146259078, 'day', 89, 114, 9, 'Detailed info for Agency 1', 'image1.jpg', 1),
(5, 'account1', 'Agency 2', '屏東縣', 1058124018, 'day', 93, 99, 1, 'Detailed info for Agency 2', 'image2.jpg', 1),
(6, 'account1', 'Agency 3', '高雄市', 1303712713, 'curing', 15, 38, 4, 'Detailed info for Agency 3', 'image3.jpg', 0),
(7, 'account1', 'Agency 4', '宜蘭縣', 5509129831, 'day', 90, 146, 9, 'Detailed info for Agency 4', 'image4.jpg', 1),
(8, 'account1', 'Agency 5', '嘉義縣', 1099281867, 'day', 50, 51, 2, 'Detailed info for Agency 5', 'image5.jpg', 1),
(9, 'account6', 'Agency 6', '臺中市', 9853770269, 'day', 54, 154, 4, 'Detailed info for Agency 6', 'image6.jpg', 0),
(10, 'account7', 'Agency 7', '屏東縣', 1537311004, 'curing', 33, 74, 3, 'Detailed info for Agency 7', 'image7.jpg', 1),
(11, 'account8', 'Agency 8', '臺北市', 3320322895, 'curing', 5, 114, 3, 'Detailed info for Agency 8', 'image8.jpg', 0),
(12, 'account9', 'Agency 9', '南投縣', 2918332526, 'curing', 65, 124, 10, 'Detailed info for Agency 9', 'image9.jpg', 0),
(13, 'account10', 'Agency 10', '台南市', 6415098335, 'day', 57, 178, 3, 'Detailed info for Agency 10', 'image10.jpg', 1),
(14, 'account11', 'Agency 11', '台東縣', 3473158388, 'stay', 36, 179, 2, 'Detailed info for Agency 11', 'image11.jpg', 1),
(15, 'account12', 'Agency 12', '宜蘭縣', 8711816848, 'stay', 31, 86, 10, 'Detailed info for Agency 12', 'image12.jpg', 0),
(16, 'account13', 'Agency 13', '新北市', 2981625686, 'curing', 65, 127, 10, 'Detailed info for Agency 13', 'image13.jpg', 0),
(17, 'account14', 'Agency 14', '臺北市', 1075099448, 'day', 33, 101, 1, 'Detailed info for Agency 14', 'image14.jpg', 1),
(18, 'account15', 'Agency 15', '台南市', 8318086600, 'stay', 25, 183, 1, 'Detailed info for Agency 15', 'image15.jpg', 1),
(19, 'account16', 'Agency 16', '澎湖縣', 6540896747, 'stay', 6, 14, 4, 'Detailed info for Agency 16', 'image16.jpg', 1),
(20, 'account17', 'Agency 17', '新北市', 2791269491, 'day', 6, 23, 7, 'Detailed info for Agency 17', 'image17.jpg', 1),
(21, 'account18', 'Agency 18', '澎湖縣', 7132602076, 'stay', 43, 121, 1, 'Detailed info for Agency 18', 'image18.jpg', 1),
(22, 'account19', 'Agency 19', '南投縣', 9269745119, 'day', 53, 86, 8, 'Detailed info for Agency 19', 'image19.jpg', 0),
(23, 'account20', 'Agency 20', '台東縣', 2099298949, 'day', 56, 156, 9, 'Detailed info for Agency 20', 'image20.jpg', 1),
(24, 'account21', 'Agency 21', '桃園市', 1973468011, 'curing', 4, 155, 6, 'Detailed info for Agency 21', 'image21.jpg', 1),
(25, 'account22', 'Agency 22', '臺中市', 3639837117, 'curing', 72, 119, 1, 'Detailed info for Agency 22', 'image22.jpg', 0),
(26, 'account23', 'Agency 23', '新竹市', 4111192962, 'curing', 13, 57, 8, 'Detailed info for Agency 23', 'image23.jpg', 0),
(27, 'account24', 'Agency 24', '連江縣', 9046693655, 'stay', 70, 143, 3, 'Detailed info for Agency 24', 'image24.jpg', 0),
(28, 'account25', 'Agency 25', '臺中市', 4322792657, 'day', 63, 147, 6, 'Detailed info for Agency 25', 'image25.jpg', 1),
(29, 'account26', 'Agency 26', '桃園市', 1708927165, 'curing', 18, 154, 3, 'Detailed info for Agency 26', 'image26.jpg', 0),
(30, 'account27', 'Agency 27', '苗栗縣', 6659736456, 'stay', 73, 104, 6, 'Detailed info for Agency 27', 'image27.jpg', 0),
(31, 'account28', 'Agency 28', '臺北市', 7614241529, 'day', 83, 104, 5, 'Detailed info for Agency 28', 'image28.jpg', 0),
(32, 'account29', 'Agency 29', '嘉義縣', 6366976981, 'curing', 84, 198, 3, 'Detailed info for Agency 29', 'image29.jpg', 1),
(33, 'account30', 'Agency 30', '澎湖縣', 4297738302, 'curing', 56, 180, 10, 'Detailed info for Agency 30', 'image30.jpg', 1),
(34, 'account31', 'Agency 31', '澎湖縣', 7340441818, 'stay', 44, 162, 4, 'Detailed info for Agency 31', 'image31.jpg', 1),
(35, 'account32', 'Agency 32', '南投縣', 7944815227, 'stay', 69, 156, 3, 'Detailed info for Agency 32', 'image32.jpg', 0),
(36, 'account33', 'Agency 33', '臺中市', 2935343443, 'day', 54, 119, 6, 'Detailed info for Agency 33', 'image33.jpg', 0),
(37, 'account34', 'Agency 34', '桃園市', 9234210767, 'curing', 47, 130, 2, 'Detailed info for Agency 34', 'image34.jpg', 0),
(38, 'account35', 'Agency 35', '臺中市', 5670596229, 'stay', 96, 165, 3, 'Detailed info for Agency 35', 'image35.jpg', 1),
(39, 'account36', 'Agency 36', '新竹縣', 5463752878, 'curing', 60, 177, 9, 'Detailed info for Agency 36', 'image36.jpg', 1),
(40, 'account37', 'Agency 37', '臺北市', 7293063843, 'curing', 95, 132, 10, 'Detailed info for Agency 37', 'image37.jpg', 0),
(41, 'account38', 'Agency 38', '桃園市', 5405113613, 'day', 65, 127, 7, 'Detailed info for Agency 38', 'image38.jpg', 0),
(42, 'account39', 'Agency 39', '台東縣', 7943590694, 'curing', 53, 100, 1, 'Detailed info for Agency 39', 'image39.jpg', 0),
(43, 'account40', 'Agency 40', '彰化縣', 5294810896, 'stay', 49, 100, 1, 'Detailed info for Agency 40', 'image40.jpg', 1),
(44, 'account41', 'Agency 41', '新北市', 4172794108, 'curing', 24, 161, 8, 'Detailed info for Agency 41', 'image41.jpg', 0),
(45, 'account42', 'Agency 42', '連江縣', 2989290787, 'stay', 27, 157, 6, 'Detailed info for Agency 42', 'image42.jpg', 0),
(46, 'account43', 'Agency 43', '基隆市', 4766193681, 'day', 88, 162, 8, 'Detailed info for Agency 43', 'image43.jpg', 0),
(47, 'account44', 'Agency 44', '屏東縣', 2694058545, 'day', 29, 139, 1, 'Detailed info for Agency 44', 'image44.jpg', 1),
(48, 'account45', 'Agency 45', '嘉義市', 8822539870, 'stay', 4, 17, 2, 'Detailed info for Agency 45', 'image45.jpg', 1),
(49, 'account46', 'Agency 46', '屏東縣', 6227431291, 'curing', 11, 68, 1, 'Detailed info for Agency 46', 'image46.jpg', 1),
(50, 'account47', 'Agency 47', '連江縣', 5090812916, 'curing', 6, 160, 10, 'Detailed info for Agency 47', 'image47.jpg', 0),
(51, 'account48', 'Agency 48', '苗栗縣', 1158130297, 'stay', 39, 193, 6, 'Detailed info for Agency 48', 'image48.jpg', 1),
(52, 'account49', 'Agency 49', '南投縣', 7913213783, 'stay', 61, 145, 4, 'Detailed info for Agency 49', 'image49.jpg', 1),
(53, 'account50', 'Agency 50', '嘉義市', 1161902367, 'day', 71, 74, 1, 'Detailed info for Agency 50', 'image50.jpg', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `T10_comment`
--

CREATE TABLE `T10_comment` (
  `account` varchar(25) NOT NULL,
  `num_of_star` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` varchar(50) NOT NULL,
  `id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `T10_comment`
--

INSERT INTO `T10_comment` (`account`, `num_of_star`, `date`, `comment`, `id`) VALUES
('123', 5, '2023-05-17 08:57:47', '', 1),
('4', 2, '2023-05-17 07:38:49', '惠惠', 2),
('456', 5, '2023-05-16 09:59:27', '惠惠惠惠', 1),
('123', 4, '2023-05-16 09:59:27', '惠惠惠惠惠惠惠惠', 1),
('123', 1, '2023-05-16 16:00:00', '惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `T10_cooperative`
--

CREATE TABLE `T10_cooperative` (
  `id` int(25) NOT NULL,
  `government` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `T10_cooperative`
--

INSERT INTO `T10_cooperative` (`id`, `government`) VALUES
(49, 'TaipeiCity'),
(49, 'NewTaipeiCity'),
(51, 'TaipeiCity'),
(33, 'TaipeiCity'),
(32, 'TaipeiCity'),
(28, 'TaipeiCity'),
(4, 'TaipeiCity');

-- --------------------------------------------------------

--
-- 資料表結構 `T10_user`
--

CREATE TABLE `T10_user` (
  `account` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `T10_user`
--

INSERT INTO `T10_user` (`account`, `name`, `password`, `email`, `phone`) VALUES
('123', 'megunin', '$2y$10$aQBg7Jam9nREttoDCTcf9OrJqAzkybSZMGq5W7oOui5J2C0L2wVzi', '123@456', '912345678'),
('40943257', '蘇偉勝', '$2y$10$M38St2mdIL/Q2KB58./e1ebz83xDtccXDPxof5kwP/gRHNpdChtNu', '40943257@nfu.edu.tw', '123456789'),
('456', '惠惠', '$2y$10$hzHf/8bRWv1qk.SKtmXa6.jL72ORsB6zwEOAnbvZgTAklLSfqSoaG', '456@456', '987654321'),
('account1', 'account1', '$2y$10$Q01bmcCoqyOnHk2qeL8n8uXv0NGs.JAJQqS7/HzeKKESOsAVM3KJ6', 'account1@nfu.edu.tw', '123'),
('admin304', '預設管理者', '$2y$10$WxtywCMjdQJ0SA7zmKA0xeoeYNQLXGX9Mgq0A96E1obXKbbFOQt66', 'admin304@nfu', '(30)4304304'),
('user304', '一般使用者', '$2y$10$uOBpv9ceLyfQiFCFCCKHQO9KIfKjNrnRddkggJseR6IO4PQq98yGK', 'user304@nfu', '(30)4304304');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `T10_agency_info`
--
ALTER TABLE `T10_agency_info`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `T10_user`
--
ALTER TABLE `T10_user`
  ADD PRIMARY KEY (`account`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `T10_agency_info`
--
ALTER TABLE `T10_agency_info`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
