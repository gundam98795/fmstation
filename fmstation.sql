-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-08-03 10:46:58
-- 伺服器版本： 10.4.17-MariaDB
-- PHP 版本： 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `fmstation`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `userid` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`userid`, `password`, `name`) VALUES
('xuan', '1010', 'xuan'),
('ma', '0713', '劉玉華'),
('fa', '1120', '許明財');

-- --------------------------------------------------------

--
-- 資料表結構 `cust`
--

CREATE TABLE `cust` (
  `serial` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `busino` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `cphone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `indate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `cust`
--

INSERT INTO `cust` (`serial`, `name`, `post`, `address`, `busino`, `mail`, `contact`, `phone`, `cphone`, `fax`, `remark`, `indate`) VALUES
('00001', '流行頻道', '526', '彰化縣二林鎮大智街30號五樓之9', '55969926', 'smt.station@msa.hinet.net', '許明財', '04-8969392', '0932967239', '04-8954549', 'test', '20210730'),
('00002', 'test', '', '遠東路135號元智大學男生第一宿舍321寢室', '111111', '', '', '0978093457', '', '', 'haha', '20210731');

-- --------------------------------------------------------

--
-- 資料表結構 `custorder`
--

CREATE TABLE `custorder` (
  `serial` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `custname` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `ratio` float DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `custorder`
--

INSERT INTO `custorder` (`serial`, `date`, `custname`, `code`, `name`, `amount`, `price`, `subtotal`, `total`, `ratio`, `remark`) VALUES
('000001', '20210802', '流行頻道', NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
