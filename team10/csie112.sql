-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： mariadb1
-- 產生時間： 2023 年 06 月 12 日 10:30
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
-- 資料表結構 `t10_agency_collect`
--

CREATE TABLE `t10_agency_collect` (
  `id` int(25) NOT NULL,
  `admission_type` varchar(25) NOT NULL,
  `money_flag` tinyint(1) NOT NULL,
  `money` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `t10_agency_info`
--

CREATE TABLE `t10_agency_info` (
  `id` int(25) NOT NULL,
  `account` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `detailed` varchar(255) NOT NULL,
  `image_src` varchar(255) NOT NULL,
  `review` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `t10_agency_info`
--

INSERT INTO `t10_agency_info` (`id`, `account`, `name`, `address`, `phone`, `start`, `end`, `people`, `detailed`, `image_src`, `review`) VALUES
(1, '', '冒險者之家', '王都東區', 912345678, 6, 12, 123, '惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠', 'D:\\xampp\\htdocs\\ggit\\agency', 1),
(2, '', '冒險者公會', '摩根帝國', 987654321, 14, 16, 30, '', '', 0),
(4, 'account1', 'Agency 1', 'Address 1', 1146259078, 89, 114, 9, 'Detailed info for Agency 1', 'image1.jpg', 1),
(5, 'account2', 'Agency 2', 'Address 2', 1058124018, 93, 99, 1, 'Detailed info for Agency 2', 'image2.jpg', 1),
(6, 'account3', 'Agency 3', 'Address 3', 1303712713, 15, 38, 4, 'Detailed info for Agency 3', 'image3.jpg', 0),
(7, 'account4', 'Agency 4', 'Address 4', 5509129831, 90, 146, 9, 'Detailed info for Agency 4', 'image4.jpg', 1),
(8, 'account5', 'Agency 5', 'Address 5', 1099281867, 50, 51, 2, 'Detailed info for Agency 5', 'image5.jpg', 1),
(9, 'account6', 'Agency 6', 'Address 6', 9853770269, 54, 154, 4, 'Detailed info for Agency 6', 'image6.jpg', 0),
(10, 'account7', 'Agency 7', 'Address 7', 1537311004, 33, 74, 3, 'Detailed info for Agency 7', 'image7.jpg', 1),
(11, 'account8', 'Agency 8', 'Address 8', 3320322895, 5, 114, 3, 'Detailed info for Agency 8', 'image8.jpg', 0),
(12, 'account9', 'Agency 9', 'Address 9', 2918332526, 65, 124, 10, 'Detailed info for Agency 9', 'image9.jpg', 0),
(13, 'account10', 'Agency 10', 'Address 10', 6415098335, 57, 178, 3, 'Detailed info for Agency 10', 'image10.jpg', 1),
(14, 'account11', 'Agency 11', 'Address 11', 3473158388, 36, 179, 2, 'Detailed info for Agency 11', 'image11.jpg', 1),
(15, 'account12', 'Agency 12', 'Address 12', 8711816848, 31, 86, 10, 'Detailed info for Agency 12', 'image12.jpg', 0),
(16, 'account13', 'Agency 13', 'Address 13', 2981625686, 65, 127, 10, 'Detailed info for Agency 13', 'image13.jpg', 0),
(17, 'account14', 'Agency 14', 'Address 14', 1075099448, 33, 101, 1, 'Detailed info for Agency 14', 'image14.jpg', 1),
(18, 'account15', 'Agency 15', 'Address 15', 8318086600, 25, 183, 1, 'Detailed info for Agency 15', 'image15.jpg', 1),
(19, 'account16', 'Agency 16', 'Address 16', 6540896747, 6, 14, 4, 'Detailed info for Agency 16', 'image16.jpg', 1),
(20, 'account17', 'Agency 17', 'Address 17', 2791269491, 6, 23, 7, 'Detailed info for Agency 17', 'image17.jpg', 1),
(21, 'account18', 'Agency 18', 'Address 18', 7132602076, 43, 121, 1, 'Detailed info for Agency 18', 'image18.jpg', 1),
(22, 'account19', 'Agency 19', 'Address 19', 9269745119, 53, 86, 8, 'Detailed info for Agency 19', 'image19.jpg', 0),
(23, 'account20', 'Agency 20', 'Address 20', 2099298949, 56, 156, 9, 'Detailed info for Agency 20', 'image20.jpg', 1),
(24, 'account21', 'Agency 21', 'Address 21', 1973468011, 4, 155, 6, 'Detailed info for Agency 21', 'image21.jpg', 1),
(25, 'account22', 'Agency 22', 'Address 22', 3639837117, 72, 119, 1, 'Detailed info for Agency 22', 'image22.jpg', 0),
(26, 'account23', 'Agency 23', 'Address 23', 4111192962, 13, 57, 8, 'Detailed info for Agency 23', 'image23.jpg', 0),
(27, 'account24', 'Agency 24', 'Address 24', 9046693655, 70, 143, 3, 'Detailed info for Agency 24', 'image24.jpg', 0),
(28, 'account25', 'Agency 25', 'Address 25', 4322792657, 63, 147, 6, 'Detailed info for Agency 25', 'image25.jpg', 1),
(29, 'account26', 'Agency 26', 'Address 26', 1708927165, 18, 154, 3, 'Detailed info for Agency 26', 'image26.jpg', 0),
(30, 'account27', 'Agency 27', 'Address 27', 6659736456, 73, 104, 6, 'Detailed info for Agency 27', 'image27.jpg', 0),
(31, 'account28', 'Agency 28', 'Address 28', 7614241529, 83, 104, 5, 'Detailed info for Agency 28', 'image28.jpg', 0),
(32, 'account29', 'Agency 29', 'Address 29', 6366976981, 84, 198, 3, 'Detailed info for Agency 29', 'image29.jpg', 1),
(33, 'account30', 'Agency 30', 'Address 30', 4297738302, 56, 180, 10, 'Detailed info for Agency 30', 'image30.jpg', 1),
(34, 'account31', 'Agency 31', 'Address 31', 7340441818, 44, 162, 4, 'Detailed info for Agency 31', 'image31.jpg', 1),
(35, 'account32', 'Agency 32', 'Address 32', 7944815227, 69, 156, 3, 'Detailed info for Agency 32', 'image32.jpg', 0),
(36, 'account33', 'Agency 33', 'Address 33', 2935343443, 54, 119, 6, 'Detailed info for Agency 33', 'image33.jpg', 0),
(37, 'account34', 'Agency 34', 'Address 34', 9234210767, 47, 130, 2, 'Detailed info for Agency 34', 'image34.jpg', 0),
(38, 'account35', 'Agency 35', 'Address 35', 5670596229, 96, 165, 3, 'Detailed info for Agency 35', 'image35.jpg', 1),
(39, 'account36', 'Agency 36', 'Address 36', 5463752878, 60, 177, 9, 'Detailed info for Agency 36', 'image36.jpg', 1),
(40, 'account37', 'Agency 37', 'Address 37', 7293063843, 95, 132, 10, 'Detailed info for Agency 37', 'image37.jpg', 0),
(41, 'account38', 'Agency 38', 'Address 38', 5405113613, 65, 127, 7, 'Detailed info for Agency 38', 'image38.jpg', 0),
(42, 'account39', 'Agency 39', 'Address 39', 7943590694, 53, 100, 1, 'Detailed info for Agency 39', 'image39.jpg', 0),
(43, 'account40', 'Agency 40', 'Address 40', 5294810896, 49, 100, 1, 'Detailed info for Agency 40', 'image40.jpg', 1),
(44, 'account41', 'Agency 41', 'Address 41', 4172794108, 24, 161, 8, 'Detailed info for Agency 41', 'image41.jpg', 0),
(45, 'account42', 'Agency 42', 'Address 42', 2989290787, 27, 157, 6, 'Detailed info for Agency 42', 'image42.jpg', 0),
(46, 'account43', 'Agency 43', 'Address 43', 4766193681, 88, 162, 8, 'Detailed info for Agency 43', 'image43.jpg', 0),
(47, 'account44', 'Agency 44', 'Address 44', 2694058545, 29, 139, 1, 'Detailed info for Agency 44', 'image44.jpg', 1),
(48, 'account45', 'Agency 45', 'Address 45', 8822539870, 4, 17, 2, 'Detailed info for Agency 45', 'image45.jpg', 1),
(49, 'account46', 'Agency 46', 'Address 46', 6227431291, 11, 68, 1, 'Detailed info for Agency 46', 'image46.jpg', 0),
(50, 'account47', 'Agency 47', 'Address 47', 5090812916, 6, 160, 10, 'Detailed info for Agency 47', 'image47.jpg', 0),
(51, 'account48', 'Agency 48', 'Address 48', 1158130297, 39, 193, 6, 'Detailed info for Agency 48', 'image48.jpg', 1),
(52, 'account49', 'Agency 49', 'Address 49', 7913213783, 61, 145, 4, 'Detailed info for Agency 49', 'image49.jpg', 1),
(53, 'account50', 'Agency 50', 'Address 50', 1161902367, 71, 74, 1, 'Detailed info for Agency 50', 'image50.jpg', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `t10_comment`
--

CREATE TABLE `t10_comment` (
  `account` varchar(25) NOT NULL,
  `num_of_star` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` varchar(50) NOT NULL,
  `id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `t10_comment`
--

INSERT INTO `t10_comment` (`account`, `num_of_star`, `date`, `comment`, `id`) VALUES
('123', 5, '2023-05-17 08:57:47', '', 1),
('4', 2, '2023-05-17 07:38:49', '惠惠', 2),
('456', 5, '2023-05-16 09:59:27', '惠惠惠惠', 1),
('123', 4, '2023-05-16 09:59:27', '惠惠惠惠惠惠惠惠', 1),
('123', 1, '2023-05-16 16:00:00', '惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠惠', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `t10_cooperative`
--

CREATE TABLE `t10_cooperative` (
  `id` int(25) NOT NULL,
  `government` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `t10_user`
--

CREATE TABLE `t10_user` (
  `account` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `t10_user`
--

INSERT INTO `t10_user` (`account`, `name`, `password`, `email`, `phone`) VALUES
('123', 'megunin', '123', '123@456', 912345678),
('456', '惠惠', '456', '456@456', 987654321);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `t10_agency_info`
--
ALTER TABLE `t10_agency_info`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `t10_user`
--
ALTER TABLE `t10_user`
  ADD PRIMARY KEY (`account`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `t10_agency_info`
--
ALTER TABLE `t10_agency_info`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
