-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-02-15 15:12:09
-- 伺服器版本: 10.1.36-MariaDB
-- PHP 版本： 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `php_q1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin_t10`
--

CREATE TABLE `admin_t10` (
  `id` int(11) NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `admin_t10`
--

INSERT INTO `admin_t10` (`id`, `acc`, `pwd`) VALUES
(1, 'admin', '1234'),
(2, 'root', '1234'),
(3, 'cc', 'cc');

-- --------------------------------------------------------

--
-- 資料表結構 `footer_t8`
--

CREATE TABLE `footer_t8` (
  `once` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `footer_t8`
--

INSERT INTO `footer_t8` (`once`) VALUES
('這裡是頁尾版權資料');

-- --------------------------------------------------------

--
-- 資料表結構 `img_t6`
--

CREATE TABLE `img_t6` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `img_t6`
--

INSERT INTO `img_t6` (`id`, `file`, `dpy`) VALUES
(1, '01D01.jpg', 1),
(2, '01D02.jpg', 1),
(3, '01D03.jpg', 1),
(4, '01D04.jpg', 1),
(5, '01D05.jpg', 1),
(6, '01D06.jpg', 1),
(7, '01D07.jpg', 1),
(8, '01D08.jpg', 1),
(9, '01D09.jpg', 1),
(13, '01D10.jpg', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `maqe_t4`
--

CREATE TABLE `maqe_t4` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `maqe_t4`
--

INSERT INTO `maqe_t4` (`id`, `text`, `dpy`) VALUES
(1, '轉知臺北教育大學與臺灣師大合辦第11屆麋研齋全國硬筆書法比賽活動', 1),
(2, '轉知:法務部辦理「第五屆法規知識王網路闖關競賽辦法', 1),
(3, '轉知2012年全國青年水墨創作大賽活動', 1),
(4, '欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加', 1),
(5, '轉知:教育是人類升沉的樞紐-2013教師生命成長營', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `menu_t12`
--

CREATE TABLE `menu_t12` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(1) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `menu_t12`
--

INSERT INTO `menu_t12` (`id`, `text`, `link`, `dpy`, `parent`) VALUES
(1, '管理登入', 'login.php', 1, 0),
(2, '網站首頁', 'index.php', 1, 0),
(4, '更多內容', 'news.php', 1, 2),
(8, 'aa', 'aa', 1, 1),
(17, 'BB', 'BB', 1, 1),
(21, 'test', 'aaa', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `mvim_t5`
--

CREATE TABLE `mvim_t5` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `mvim_t5`
--

INSERT INTO `mvim_t5` (`id`, `file`, `dpy`) VALUES
(1, '01C01.swf', 1),
(2, '01C02.swf', 1),
(3, '01C03.swf', 1),
(4, '01C04.swf', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `news_t9`
--

CREATE TABLE `news_t9` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `news_t9`
--

INSERT INTO `news_t9` (`id`, `text`, `dpy`) VALUES
(1, '教師研習「世界公民生命園丁國內研習會」\r\n1.主辦單位：世界展望會\r\n2.研習日期：101年11月14日（三）～15日（四）\r\n3.詳情請參考：\r\nhttp://gc.worldvision.org.tw/seed.html。\r\n請線上報名。\r\n', 1),
(2, '公告綜合高中一年級英數補救教學時間\r\n上課日期:10/27.11/3.11/10.11/24共計四次\r\n上課時間:早上8:00~11:50半天\r\n費用:全程免費\r\n參加同學:綜合科一年級第一次段考成績需加強者\r\n已將名單送交各班及導師\r\n參加同學請帶紙筆.課本.第一次段考考卷\r\n並將家長通知單給家長\r\n若有任何疑問\r\n請洽綜合高中學程主任', 1),
(3, '102年全國大專校院運動會\r\n「主題標語及吉祥物命名」\r\n網路票選活動\r\n一、活動期間：自10月25日起至11月4日止。\r\n二、相關訊息請上宜蘭大學首頁連結「102全大運在宜大」\r\n活動網址：http://102niag.niu.edu.tw/', 1),
(4, '台灣亞洲藝術文化教育交流學會第一屆年會國際研討會\r\n活動日期：101年3月3～4日(六、日)\r\n活動主題：創造力、文化、全人教育\r\n有意參加者請至http://www.caaetaiwan.org下載報名表', 1),
(5, '11月23日(星期五)將於彰化縣田尾鄉菁芳園休閒農場\r\n舉辦「高中職生涯輔導知能研習」\r\n中區學校每校至多2名\r\n以普通科、專業類科教師優先報名參加\r\n生涯規劃教師次之，參加人員公差假\r\n並核實派代課\r\n當天還有專車接送(8:35前在員林火車站集合)\r\n如此好康的機會，怎能錯過？！\r\n熱烈邀請師長們向輔導室(分機234)報名\r\n名額有限，動作要快！！\r\n報名截止日期：本周四 10月25日17:00前！', 1),
(6, '台視百萬大明星節目辦理海選活動\r\n時間:101年10月27日下午13時\r\n地點:彰化', 0),
(7, '國立故宮博物院辦理\r\n「商王武丁與后婦好 殷商盛世文化藝術特展」暨\r\n「赫赫宗周 西周文化特展」', 1),
(8, '財團法人漢光教育基金會\r\n辦理2012「舊愛新歡-古典詩詞譜曲創作暨歌唱表演競賽」\r\n參賽獎金豐厚!!\r\n', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `title_t3`
--

CREATE TABLE `title_t3` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `title_t3`
--

INSERT INTO `title_t3` (`id`, `file`, `text`, `dpy`) VALUES
(1, '01B01.jpg', '卓越科技大學校園資訊系統', 0),
(2, '01B02.jpg', '卓越科技大學校園資訊系統', 1),
(13, '01B03.jpg', '卓越科技大學校園資訊系統', 0),
(14, '01B04.jpg', '卓越科技大學校園資訊系統', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `total_t7`
--

CREATE TABLE `total_t7` (
  `once` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `total_t7`
--

INSERT INTO `total_t7` (`once`) VALUES
(506);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin_t10`
--
ALTER TABLE `admin_t10`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `img_t6`
--
ALTER TABLE `img_t6`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `maqe_t4`
--
ALTER TABLE `maqe_t4`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menu_t12`
--
ALTER TABLE `menu_t12`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mvim_t5`
--
ALTER TABLE `mvim_t5`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news_t9`
--
ALTER TABLE `news_t9`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `title_t3`
--
ALTER TABLE `title_t3`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admin_t10`
--
ALTER TABLE `admin_t10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `img_t6`
--
ALTER TABLE `img_t6`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表 AUTO_INCREMENT `maqe_t4`
--
ALTER TABLE `maqe_t4`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `menu_t12`
--
ALTER TABLE `menu_t12`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用資料表 AUTO_INCREMENT `mvim_t5`
--
ALTER TABLE `mvim_t5`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `news_t9`
--
ALTER TABLE `news_t9`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表 AUTO_INCREMENT `title_t3`
--
ALTER TABLE `title_t3`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
