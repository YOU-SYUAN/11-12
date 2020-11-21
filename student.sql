-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `1119`
--

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `stuid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `famstatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exresult` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `commit` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `student`
--

INSERT INTO `student` (`id`, `stuid`, `contact`, `famstatus`, `content`, `exresult`, `money`, `commit`, `status`) VALUES
(1, 'student1', 'm', '低收入戶', '你好', '未符合補助條件', 0, '讚喔', 0),
(2, 'new title', 'job descri', '中低收入戶', 'm', '未符合補助條件', 0, '好棒', 0),
(3, 'new title', 'job descri', '低收入戶', 'su3cl3a87', '予以補助', 0, 'commit', 0),
(4, '123456', 'my mother', '家庭突發因素', '他真的需要這筆', '予以補助', 0, '很可以', 0),
(5, 'myname', 'my mother', '家庭突發因素', '我好棒', '未符合補助條件', 0, '很可以', 0),
(6, '107213222', 'MR.A', '家庭突發因素', '棒喔', '予以補助', 1000, '很可以', 0),
(7, '123456', 'my fathrer', '家庭突發因素', '456', '', 0, '', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
