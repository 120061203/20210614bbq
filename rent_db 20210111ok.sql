-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2021-01-12 06:26:13
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `rent_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `area`
--

CREATE TABLE `area` (
  `area_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `area_type` int(11) NOT NULL,
  `price_in` int(11) NOT NULL,
  `price_out` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `bbq_af`
--

CREATE TABLE `bbq_af` (
  `af_id` varchar(50) NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `bbq_af`
--

INSERT INTO `bbq_af` (`af_id`, `time_start`, `time_end`) VALUES
('20210111113827a1086601', '2021-01-13 13:00:00', '2021-01-13 21:00:00'),
('20210111121004666', '2021-01-12 08:00:00', '2021-01-12 20:00:00'),
('20210111150240admin', '2021-01-20 08:00:00', '2021-01-20 20:00:00'),
('20210111150551uuu', '2021-01-13 08:00:00', '2021-01-13 12:00:00'),
('20210111152720111', '2021-01-13 14:00:00', '2021-01-13 22:00:00'),
('20210111161855888', '2021-01-12 08:00:00', '2021-01-12 12:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `camp_af`
--

CREATE TABLE `camp_af` (
  `af_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `offer`
--

CREATE TABLE `offer` (
  `af_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `area_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `renter`
--

CREATE TABLE `renter` (
  `account` varchar(20) CHARACTER SET utf8 NOT NULL,
  `addr` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL,
  `tax_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '未提供',
  `receipt_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '未提供',
  `uniform_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '未提供'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `renter`
--

INSERT INTO `renter` (`account`, `addr`, `phone`, `type`, `tax_id`, `receipt_name`, `uniform_id`) VALUES
('000', '', '', 1, '未提供', '未提供', '未提供'),
('111', 'fsdfas', '31231', 1, '未提供', '未提供', '未提供'),
('222', '', '', 1, '未提供', '未提供', '未提供'),
('5555', '', '', 1, '未提供', '未提供', '未提供'),
('888', 'csd', '242', 1, '未提供', '未提供', ''),
('a1077701', '', '', 0, '未提供', '未提供', '未提供'),
('a1077702', '', '', 0, '未提供', '未提供', '未提供'),
('a1077703', '', '', 0, '未提供', '未提供', '未提供'),
('a1077704', '', '', 0, '未提供', '未提供', '未提供'),
('a1077705', '', '', 0, '未提供', '未提供', '未提供'),
('a1077706', '', '', 0, '未提供', '未提供', '未提供'),
('a1077707', '', '', 0, '未提供', '未提供', '未提供'),
('a1077708', '', '', 0, '未提供', '未提供', '未提供'),
('a1077709', '', '', 0, '未提供', '未提供', '未提供'),
('a1077710', '', '', 0, '未提供', '未提供', '未提供'),
('a1077711', '', '', 0, '未提供', '未提供', '未提供'),
('a1077712', '', '', 0, '未提供', '未提供', '未提供'),
('a1077713', '', '', 0, '未提供', '未提供', '未提供'),
('a1077714', '', '', 0, '未提供', '未提供', '未提供'),
('a1077715', '', '', 0, '未提供', '未提供', '未提供'),
('a1077716', '', '', 0, '未提供', '未提供', '未提供'),
('a1077717', '', '', 0, '未提供', '未提供', '未提供'),
('a1077718', '', '', 0, '未提供', '未提供', '未提供'),
('a1077719', '', '', 0, '未提供', '未提供', '未提供'),
('a1077720', '', '', 0, '未提供', '未提供', '未提供'),
('a1077721', '', '', 0, '未提供', '未提供', '未提供'),
('a1077722', '', '', 0, '未提供', '未提供', '未提供'),
('a1077723', '', '', 0, '未提供', '未提供', '未提供'),
('a1077724', '', '', 0, '未提供', '未提供', '未提供'),
('a1077725', '', '', 0, '未提供', '未提供', '未提供'),
('a1077726', '', '', 0, '未提供', '未提供', '未提供'),
('a1077727', '', '', 0, '未提供', '未提供', '未提供'),
('a1077728', '', '', 0, '未提供', '未提供', '未提供'),
('a1077729', '', '', 0, '未提供', '未提供', '未提供'),
('a1077730', '', '', 0, '未提供', '未提供', '未提供'),
('a1077731', '', '', 0, '未提供', '未提供', '未提供'),
('a1077732', '', '', 0, '未提供', '未提供', '未提供'),
('a1077733', '', '', 0, '未提供', '未提供', '未提供'),
('a1077734', '', '', 0, '未提供', '未提供', '未提供'),
('a1077735', '', '', 0, '未提供', '未提供', '未提供'),
('a1077736', '', '', 0, '未提供', '未提供', '未提供'),
('a1077737', '', '', 0, '未提供', '未提供', '未提供'),
('a1077738', '', '', 0, '未提供', '未提供', '未提供'),
('a1077739', '', '', 0, '未提供', '未提供', '未提供'),
('a1077740', '', '', 0, '未提供', '未提供', '未提供'),
('a1077741', '', '', 0, '未提供', '未提供', '未提供'),
('a1077742', '', '', 0, '未提供', '未提供', '未提供'),
('a1077743', '', '', 0, '未提供', '未提供', '未提供'),
('a1077744', '', '', 0, '未提供', '未提供', '未提供'),
('a1077745', '', '', 0, '未提供', '未提供', '未提供'),
('a1077746', '', '', 0, '未提供', '未提供', '未提供'),
('a1077747', '', '', 0, '未提供', '未提供', '未提供'),
('a1077748', '', '', 0, '未提供', '未提供', '未提供'),
('a1077749', '', '', 0, '未提供', '未提供', '未提供'),
('a1077750', '', '', 0, '未提供', '未提供', '未提供'),
('a1086601', 'address', 'phone', 0, '未提供', '未提供', '未提供'),
('a1086603', '', '', 0, '未提供', '未提供', '未提供'),
('a1086604', '', '', 0, '未提供', '未提供', '未提供'),
('a1086605', '', '', 0, '未提供', '未提供', '未提供'),
('a1086606', '', '', 0, '未提供', '未提供', '未提供'),
('a1086607', '', '', 0, '未提供', '未提供', '未提供'),
('a1086608', '', '', 0, '未提供', '未提供', '未提供'),
('a1086609', '', '', 0, '未提供', '未提供', '未提供'),
('a1086610', '', '', 0, '未提供', '未提供', '未提供'),
('ABCD01', '', '', 1, '未提供', '未提供', '未提供'),
('ABCD02', '', '', 1, '未提供', '未提供', '未提供'),
('ABCD03', '', '', 1, '未提供', '未提供', '未提供'),
('ABCD04', '', '', 1, '未提供', '未提供', '未提供'),
('ABCD05', '', '', 1, '未提供', '未提供', '未提供'),
('b1075501', '', '', 0, '未提供', '未提供', '未提供'),
('b1075502', '', '', 0, '未提供', '未提供', '未提供'),
('b1075503', '', '', 0, '未提供', '未提供', '未提供'),
('b1075504', '', '', 0, '未提供', '未提供', '未提供'),
('b1075505', '', '', 0, '未提供', '未提供', '未提供'),
('b1075506', '', '', 0, '未提供', '未提供', '未提供'),
('b1075507', '', '', 0, '未提供', '未提供', '未提供'),
('b1075508', '', '', 0, '未提供', '未提供', '未提供'),
('b1075509', '', '', 0, '未提供', '未提供', '未提供'),
('b1075510', '', '', 0, '未提供', '未提供', '未提供'),
('b1075511', '', '', 0, '未提供', '未提供', '未提供'),
('b1075512', '', '', 0, '未提供', '未提供', '未提供'),
('b1075513', '', '', 0, '未提供', '未提供', '未提供'),
('b1075514', '', '', 0, '未提供', '未提供', '未提供'),
('b1075515', '', '', 0, '未提供', '未提供', '未提供'),
('b1075516', '', '', 0, '未提供', '未提供', '未提供'),
('b1075517', '', '', 0, '未提供', '未提供', '未提供'),
('b1075518', '', '', 0, '未提供', '未提供', '未提供'),
('b1075519', '', '', 0, '未提供', '未提供', '未提供'),
('b1075520', '', '', 0, '未提供', '未提供', '未提供'),
('test', '天龍國內糊區87號', '0987654321', 1, '稅籍編號測試人員', '幹你娘', '統一編號測試人員'),
('uuu', '承辦人的家', '承辦人的電話', 0, '承辦人的稅籍編號', '糕熊大學店', '承辦人的統一編號');

-- --------------------------------------------------------

--
-- 資料表結構 `renter_af`
--

CREATE TABLE `renter_af` (
  `af_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `undertaker_account` varchar(20) CHARACTER SET utf8 NOT NULL,
  `renter_account` varchar(20) CHARACTER SET utf8 NOT NULL,
  `applicant` varchar(20) NOT NULL,
  `people_quantity` int(11) NOT NULL,
  `time_stamp` datetime NOT NULL,
  `bbq_quantity` int(11) NOT NULL,
  `camp_quantity` int(11) NOT NULL,
  `sum_price` int(11) NOT NULL,
  `payoff_status` int(11) NOT NULL,
  `use_date` datetime NOT NULL,
  `af_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `renter_af`
--

INSERT INTO `renter_af` (`af_id`, `undertaker_account`, `renter_account`, `applicant`, `people_quantity`, `time_stamp`, `bbq_quantity`, `camp_quantity`, `sum_price`, `payoff_status`, `use_date`, `af_type`) VALUES
('20210111113827a1086601', 'uuu', 'a1086601', '-1', 2, '2021-01-11 15:19:10', 1, 7, 2700, 1, '2021-01-13 00:00:00', 3),
('20210111121004666', 'uuu', '666', '666', 9, '2021-01-11 12:10:04', 1, 5, 4800, 1, '2021-01-12 00:00:00', 3),
('20210111150240admin', 'uuu', 'admin', '管理者', 1, '2021-01-11 15:02:40', 2, 2, 2400, 2, '2021-01-20 00:00:00', 3),
('20210111150551uuu', 'uuu', 'uuu', '承辦人666', 1, '2021-01-11 15:05:51', 1, 7, 2400, 2, '2021-01-13 00:00:00', 3),
('20210111152720111', '', '111', '55', 111, '2021-01-11 15:27:20', 1, 3, 3000, 0, '2021-01-13 00:00:00', 3),
('20210111161855888', 'uuu', '888', 'fAD', 54, '2021-01-11 16:18:55', 1, 1, 1200, 1, '2021-01-12 00:00:00', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `sys_manager`
--

CREATE TABLE `sys_manager` (
  `account` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `undertaker`
--

CREATE TABLE `undertaker` (
  `account` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_authority` int(1) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`account`, `password`, `user_authority`, `name`, `email`) VALUES
('000', '000', 1, '小松', 'a1075502@mail.nuk.edu.tw'),
('111', '111', 1, '55', '5454'),
('222', '222', 1, '222', 'aaa@gmail.com'),
('888', '888', 1, 'fAD', 'fasdf@gmail.com'),
('a1077701', '666', 1, 'a10777-1號', 'a1077701@mail.nuk.edu.tw'),
('a1077702', '666', 1, 'a10777-2號', 'a1077702@mail.nuk.edu.tw'),
('a1077703', '666', 1, 'a10777-3號', 'a1077703@mail.nuk.edu.tw'),
('a1077704', '666', 1, 'a10777-4號', 'a1077704@mail.nuk.edu.tw'),
('a1077705', '666', 1, 'a10777-5號', 'a1077705@mail.nuk.edu.tw'),
('a1077706', '666', 1, 'a10777-6號', 'a1077706@mail.nuk.edu.tw'),
('a1077707', '666', 1, 'a10777-7號', 'a1077707@mail.nuk.edu.tw'),
('a1077708', '666', 1, 'a10777-8號', 'a1077708@mail.nuk.edu.tw'),
('a1077709', '666', 1, 'a10777-9號', 'a1077709@mail.nuk.edu.tw'),
('a1077710', '666', 1, 'a10777-10號', 'a1077710@mail.nuk.edu.tw'),
('a1077711', '666', 1, 'a10777-11號', 'a1077711@mail.nuk.edu.tw'),
('a1077712', '666', 1, 'a10777-12號', 'a1077712@mail.nuk.edu.tw'),
('a1077713', '666', 1, 'a10777-13號', 'a1077713@mail.nuk.edu.tw'),
('a1077714', '666', 1, 'a10777-14號', 'a1077714@mail.nuk.edu.tw'),
('a1077715', '666', 1, 'a10777-15號', 'a1077715@mail.nuk.edu.tw'),
('a1077716', '666', 1, 'a10777-16號', 'a1077716@mail.nuk.edu.tw'),
('a1077717', '666', 1, 'a10777-17號', 'a1077717@mail.nuk.edu.tw'),
('a1077718', '666', 1, 'a10777-18號', 'a1077718@mail.nuk.edu.tw'),
('a1077719', '666', 1, 'a10777-19號', 'a1077719@mail.nuk.edu.tw'),
('a1077720', '666', 1, 'a10777-20號', 'a1077720@mail.nuk.edu.tw'),
('a1077721', '666', 1, 'a10777-21號', 'a1077721@mail.nuk.edu.tw'),
('a1077722', '666', 1, 'a10777-22號', 'a1077722@mail.nuk.edu.tw'),
('a1077723', '666', 1, 'a10777-23號', 'a1077723@mail.nuk.edu.tw'),
('a1077724', '666', 1, 'a10777-24號', 'a1077724@mail.nuk.edu.tw'),
('a1077725', '666', 1, 'a10777-25號', 'a1077725@mail.nuk.edu.tw'),
('a1077726', '666', 1, 'a10777-26號', 'a1077726@mail.nuk.edu.tw'),
('a1077727', '666', 1, 'a10777-27號', 'a1077727@mail.nuk.edu.tw'),
('a1077728', '666', 1, 'a10777-28號', 'a1077728@mail.nuk.edu.tw'),
('a1077729', '666', 1, 'a10777-29號', 'a1077729@mail.nuk.edu.tw'),
('a1077730', '666', 1, 'a10777-30號', 'a1077730@mail.nuk.edu.tw'),
('a1077731', '666', 1, 'a10777-31號', 'a1077731@mail.nuk.edu.tw'),
('a1077732', '666', 1, 'a10777-32號', 'a1077732@mail.nuk.edu.tw'),
('a1077733', '666', 1, 'a10777-33號', 'a1077733@mail.nuk.edu.tw'),
('a1077734', '666', 1, 'a10777-34號', 'a1077734@mail.nuk.edu.tw'),
('a1077735', '666', 1, 'a10777-35號', 'a1077735@mail.nuk.edu.tw'),
('a1077736', '666', 1, 'a10777-36號', 'a1077736@mail.nuk.edu.tw'),
('a1077737', '666', 1, 'a10777-37號', 'a1077737@mail.nuk.edu.tw'),
('a1077738', '666', 1, 'a10777-38號', 'a1077738@mail.nuk.edu.tw'),
('a1077739', '666', 1, 'a10777-39號', 'a1077739@mail.nuk.edu.tw'),
('a1077740', '666', 1, 'a10777-40號', 'a1077740@mail.nuk.edu.tw'),
('a1077741', '666', 1, 'a10777-41號', 'a1077741@mail.nuk.edu.tw'),
('a1077742', '666', 1, 'a10777-42號', 'a1077742@mail.nuk.edu.tw'),
('a1077743', '666', 1, 'a10777-43號', 'a1077743@mail.nuk.edu.tw'),
('a1077744', '666', 1, 'a10777-44號', 'a1077744@mail.nuk.edu.tw'),
('a1077745', '666', 1, 'a10777-45號', 'a1077745@mail.nuk.edu.tw'),
('a1077746', '666', 1, 'a10777-46號', 'a1077746@mail.nuk.edu.tw'),
('a1077747', '666', 1, 'a10777-47號', 'a1077747@mail.nuk.edu.tw'),
('a1077748', '666', 1, 'a10777-48號', 'a1077748@mail.nuk.edu.tw'),
('a1077749', '666', 1, 'a10777-49號', 'a1077749@mail.nuk.edu.tw'),
('a1077750', '666', 1, 'a10777-50號', 'a1077750@mail.nuk.edu.tw'),
('a1086603', '000', 1, 'a10866-3號', 'a1086603@mail.nuk.edu.tw'),
('a1086604', '000', 1, 'a10866-4號', 'a1086604@mail.nuk.edu.tw'),
('a1086605', '000', 1, 'a10866-5號', 'a1086605@mail.nuk.edu.tw'),
('a1086606', '000', 1, 'a10866-6號', 'a1086606@mail.nuk.edu.tw'),
('a1086607', '000', 1, 'a10866-7號', 'a1086607@mail.nuk.edu.tw'),
('a1086608', '000', 1, 'a10866-8號', 'a1086608@mail.nuk.edu.tw'),
('a1086609', '000', 1, 'a10866-9號', 'a1086609@mail.nuk.edu.tw'),
('a1086610', '000', 1, 'a10866-10號', 'a1086610@mail.nuk.edu.tw'),
('a1086613', '0000', 1, 'a10866-2號', 'a1086605@mail.nuk.edu.tw'),
('ABCD01', '000', 1, 'ABCD-1號', ''),
('ABCD02', '000', 1, 'ABCD-2號', ''),
('ABCD03', '000', 1, 'ABCD-3號', ''),
('ABCD04', '000', 1, 'ABCD-4號', ''),
('ABCD05', '000', 1, 'ABCD-5號', ''),
('admin', 'admin', 3, '管理者', 'admin@admin.com'),
('b1075501', '000', 1, 'b10755-1號', 'b1075501@mail.nuk.edu.tw'),
('b1075502', '000', 1, 'b10755-2號', 'b1075502@mail.nuk.edu.tw'),
('b1075503', '000', 1, 'b10755-3號', 'b1075503@mail.nuk.edu.tw'),
('b1075504', '000', 1, 'b10755-4號', 'b1075504@mail.nuk.edu.tw'),
('b1075505', '000', 1, 'b10755-5號', 'b1075505@mail.nuk.edu.tw'),
('b1075506', '000', 1, 'b10755-6號', 'b1075506@mail.nuk.edu.tw'),
('b1075507', '000', 1, 'b10755-7號', 'b1075507@mail.nuk.edu.tw'),
('b1075508', '000', 1, 'b10755-8號', 'b1075508@mail.nuk.edu.tw'),
('b1075509', '000', 1, 'b10755-9號', 'b1075509@mail.nuk.edu.tw'),
('b1075510', '000', 1, 'b10755-10號', 'b1075510@mail.nuk.edu.tw'),
('b1075511', '000', 1, 'b10755-11號', 'b1075511@mail.nuk.edu.tw'),
('b1075512', '000', 1, 'b10755-12號', 'b1075512@mail.nuk.edu.tw'),
('b1075513', '000', 1, 'b10755-13號', 'b1075513@mail.nuk.edu.tw'),
('b1075514', '000', 1, 'b10755-14號', 'b1075514@mail.nuk.edu.tw'),
('b1075515', '000', 1, 'b10755-15號', 'b1075515@mail.nuk.edu.tw'),
('b1075516', '000', 1, 'b10755-16號', 'b1075516@mail.nuk.edu.tw'),
('b1075517', '000', 1, 'b10755-17號', 'b1075517@mail.nuk.edu.tw'),
('b1075518', '000', 1, 'b10755-18號', 'b1075518@mail.nuk.edu.tw'),
('b1075519', '000', 1, 'b10755-19號', 'b1075519@mail.nuk.edu.tw'),
('b1075520', '000', 1, 'b10755-20號', 'b1075520@mail.nuk.edu.tw'),
('test', 'test', 1, '測試人員', 'test@test'),
('uuu', 'uuu', 2, '承辦人666', '1.11.1@1.1.com');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- 資料表索引 `bbq_af`
--
ALTER TABLE `bbq_af`
  ADD PRIMARY KEY (`af_id`);

--
-- 資料表索引 `camp_af`
--
ALTER TABLE `camp_af`
  ADD PRIMARY KEY (`af_id`);

--
-- 資料表索引 `offer`
--
ALTER TABLE `offer`
  ADD KEY `af_id` (`af_id`),
  ADD KEY `area_id` (`area_id`);

--
-- 資料表索引 `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`account`);

--
-- 資料表索引 `renter_af`
--
ALTER TABLE `renter_af`
  ADD PRIMARY KEY (`af_id`),
  ADD KEY `undertaker_account` (`undertaker_account`),
  ADD KEY `renter_account` (`renter_account`),
  ADD KEY `undertaker_account_2` (`undertaker_account`),
  ADD KEY `undertaker_account_3` (`undertaker_account`);

--
-- 資料表索引 `sys_manager`
--
ALTER TABLE `sys_manager`
  ADD PRIMARY KEY (`account`);

--
-- 資料表索引 `undertaker`
--
ALTER TABLE `undertaker`
  ADD PRIMARY KEY (`account`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`account`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
