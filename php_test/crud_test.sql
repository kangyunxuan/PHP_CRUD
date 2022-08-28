-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-08-28 16:56:57
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `crud_test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account_info`
--

CREATE TABLE `account_info` (
  `account` varchar(20) NOT NULL,
  `name` varchar(10) NOT NULL,
  `gender` varchar(3) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `memo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `account_info`
--

INSERT INTO `account_info` (`account`, `name`, `gender`, `birthday`, `email`, `memo`) VALUES
('duiuiort', 'amy', '女', '2015-01-01', 'zosdpkwe@gmail.com', 'no'),
('fgbtr', 'lily', '女', '2022-07-31', '12321@gmail.com', ''),
('z904573', 'andy', '男', '2022-08-02', 'fjvierotgkp@gmail.co', 'hi'),
('z904573233333', 'mary', '女', '2022-08-02', 'asdffggh@gmail.com', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
