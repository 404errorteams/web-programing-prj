-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2014 at 02:45 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `404error`
--
CREATE DATABASE IF NOT EXISTS `404error` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `404error`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id_author` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(127) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(127) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `biography` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id_author`, `name`, `img`, `biography`) VALUES
('viet', 'BÃ¹i quá»‘c Viá»‡t', 'viet.jpg', 'TÃ´i " khÃ´ng thá»ƒ hiá»ƒu ná»•i táº¡i sao ngÆ°á»i ta Ä‘Æ°a ra con sá»‘ Ä‘Ã³ vÃ  nghi ngá» tÃ­nh kháº£ thi cá»§a nÃ³ trong thá»±c tiá»…n.  Theo má»™t thÃ nh viÃªn Tá»• biÃªn táº­p dá»± tháº£o, Ä‘Ã¢y lÃ  hÃ¬nh thá»©c khuyáº¿n khÃ­ch ráº¥t tÃ­ch cá»±c mÃ  má»™t sá»‘ nÆ°á»›c trÃªn tháº¿ giá»›i nhÆ° Má»¹, HÃ n Quá»‘câ€¦ Ä‘Ã£ Ã¡p dá»¥ng vÃ  viá»‡c quy Ä‘á»‹nh má»©c Ä‘á»™ng viÃªn, khuyáº¿n khÃ­ch báº±ng váº­t cháº¥t lÃ  phÃ¹ há»£p vá»›i quy Ä‘á»‹nh cá»§a Luáº­t Thi Ä‘ua khen thÆ°á»Ÿng vÃ  quy Ä‘á»‹nh vá» cháº¿ Ä‘á»™ khen thÆ°á»Ÿng ngÆ°á»i tá»‘ cÃ¡o nÃ³i chung. Ã”ng cÃ³ nghÄ© váº­y khÃ´ng? VÃ¬ sao?  CÃ¡ nhÃ¢n tÃ´i cho ráº±ng khÃ´ng nÃªn báº¯t chÆ°á»›c há» nhÆ° váº­y. ÄÃ³ chá»‰ lÃ  cÃ¡ch chÃºng ta cÃ³ thá»ƒ tham kháº£o chá»© náº¿u Ã¡p dá»¥ng á»Ÿ Viá»‡t Nam vÃ o thá»i Ä‘iá»ƒm nÃ y, tÃ­nh thá»±c táº¿ xa vá»i láº¯m.  VÃ¬ sao nÆ°á»›c ngoÃ i cÃ³ thá»ƒ Ä‘Æ°a ra con sá»‘ cá»¥ thá»ƒ tá»« cÃ¡c vá»¥ tham nhÅ©ng, cÃ²n táº¡i Viá»‡t Nam, lÃ¢u nay hiá»‡u quáº£ thá»±c sá»± cá»§a viá»‡c chá»‘ng tham nhÅ©ng Ä‘áº¿n Ä‘Ã¢u váº«n lÃ  áº©n sá»‘?  VÃ¬ chÃºng ta chÆ°a lÃ m má»™t cÃ¡ch nghiÃªm tÃºc. Ngay tá»« phÃ­a Ban chá»‰ Ä‘áº¡o phÃ²ng chá»‘ng tham nhÅ©ng cÅ©ng thá»«a nháº­n káº¿t quáº£ cÃ²n nhiá»u háº¡n cháº¿ nÃªn trong viá»‡c thá»‘ng kÃª chÆ°a Ä‘Æ°á»£c thá»±c hiá»‡n má»™t cÃ¡ch  khoa há»c.  Váº­y theo Ã´ng, Dá»± tháº£o liÃªn bá»™ cá»§a Thanh tra ChÃ­nh phá»§ vÃ  Bá»™ Ná»™i vá»¥ vá» khen thÆ°á»Ÿng cÃ¡ nhÃ¢n tá»‘ cÃ¡o tham nhÅ©ng cáº§n táº­p trung vÃ o Ä‘iá»u gÃ¬?  Cháº¯c cháº¯n Ä‘Ã³ lÃ  nhá»¯ng biá»‡n phÃ¡p Ä‘á»ƒ báº£o vá»‡ ngÆ°á»i tá»‘ cÃ¡o tham nhÅ©ng. Khi ngÆ°á»i ta phÃ¡t hiá»‡n ra cÃ¡c dáº¥u hiá»‡u sai pháº¡m, pháº£i xem xÃ©t thÃ´ng tin má»™t cÃ¡ch nghiÃªm tÃºc. Äá»“ng thá»i pháº£i giá»¯ bÃ­ máº­t cÃ¡c thÃ´ng tin liÃªn quan tá»›i ngÆ°á»i tá»‘ cÃ¡o.  NgoÃ i ra, pháº£i xá»­ tháº­t náº·ng nhá»¯ng káº» tham nhÅ©ng. Vá» lÃ¢u dÃ i, pháº£i nghÄ© ra cÃ¡ch tuyá»ƒn chá»n cÃ¡n bá»™, Ä‘áº·c biá»‡t nhá»¯ng ngÆ°á»i giá»¯ vá»‹ trÃ­ then chá»‘t, Ä‘á»©ng Ä‘áº§u cÃ¡c cÆ¡ quan thÃ¬ má»›i cÆ¡ báº£n diá»‡t táº­n gá»‘c Ä‘Æ°á»£c náº¡n tham nhÅ©ng.Viá»‡t Nam há»c Ä‘Æ°á»£c gÃ¬ tá»« kinh nghiá»‡m phÃ²ng chá»‘ng tham nhÅ©ng cá»§a cÃ¡c nÆ°á»›c trÃªn tháº¿ giá»›i thÆ°a Ã´ng?  TrÆ°á»›c tiÃªn pháº£i kiÃªn quyáº¿t chá»‘ng tham nhÅ©ng vÃ  pháº£i luáº­t hÃ³a táº¥t cáº£ cÃ¡c hoáº¡t Ä‘á»™ng chá»‘ng tham nhÅ©ng á»Ÿ nÆ°á»›c ta. NgoÃ i ra, cÃ´ng tÃ¡c kiá»ƒm tra, kiá»ƒm soÃ¡t, giÃ¡m sÃ¡t pháº£i lÃ m ráº¥t cháº·t cháº½. Nhá»¯ng ngÆ°á»i á»Ÿ cÆ¡ quan chá»‘ng tham nhÅ©ng pháº£i tuyá»‡t Ä‘á»‘i trong sáº¡ch, kiÃªn quyáº¿t, cÃ³ nghiá»‡p vá»¥ cao. NÃ³i cÃ¡ch khÃ¡c, há» pháº£i giá»i vá» nghiá»‡p vá»¥ vÃ  khÃ´ng tham nhÅ©ng.  Gáº§n Ä‘Ã¢y, nhiá»u Ã½ kiáº¿n cho ráº±ng má»™t bá»™ pháº­n khÃ´ng nhá» cÃ¡n bá»™, cÃ´ng chá»©c thÆ°á»ng cÃ³ thÃ¡i Ä‘á»™ há»‘ng hÃ¡ch vá»›i dÃ¢n. ÄÃ³ cÃ³ pháº£i lÃ  biá»ƒu hiá»‡n cá»§a sá»± nhÅ©ng nhiá»…u, tham nhÅ©ng khÃ´ng?  Nhá»¯ng ngÆ°á»i luÃ´n giáº£i quyáº¿t viá»‡c cho dÃ¢n mÃ  yÃªu cáº§u, Ä‘Ã²i há»i vá» váº­t cháº¥t, cá»¥ thá»ƒ lÃ  phong bÃ¬ chÃ­nh lÃ  má»™t kiá»ƒu tham nhÅ©ng, chÃºng ta hay gá»i lÃ  tham nhÅ©ng váº·t.  ÄÃ´i khi ngÆ°á»i ta nhÅ©ng nhiá»…u vá»›i dÃ¢n do bá»‹ Äƒn mÃ²n tÆ° tÆ°á»Ÿng quan liÃªu, khinh thÆ°á»ng dÃ¢n, cÃ²n láº¡i cÃ¡c trÆ°á»ng há»£p khÃ¡c lÃ  do há» muá»‘n moi tiá»n cá»§a dÃ¢n. NhÆ° tháº¿ chÃ­nh lÃ  tham nhÅ©ng.  ChÃºng ta pháº£i kiÃªn quyáº¿t loáº¡i bá» nhá»¯ng loáº¡i cÃ¡n bá»™, cÃ´ng chá»©c khinh dÃ¢n, xa dÃ¢n, moi tiá»n cá»§a dÃ¢n Ä‘á»ƒ nhÆ°á»ng chá»— cho nhá»¯ng cÃ¡n bá»™ tá»‘t. Ngay cáº£ vá»›i cÃ¡n bá»™ tá»‘t, sau khi tuyá»ƒn chá»n há», NhÃ  nÆ°á»›c cÅ©ng cáº§n thÆ°á»ng xuyÃªn kiá»ƒm tra, giÃ¡o dá»¥c, giÃ¡m sÃ¡t, nháº¯c nhá»Ÿ há».  NÃ³i vá» cÃ´ng tÃ¡c tuyá»ƒn chá»n cÃ¡n bá»™, cÃ´ng chá»©c, má»›i Ä‘Ã¢y dÆ° luáº­n xÃ´n xao trÆ°á»›c vá»¥ gian láº­n trong thi tuyá»ƒn cÃ´ng chá»©c á»Ÿ Cá»¥c Quáº£n lÃ½ thá»‹ trÆ°á»ng - Bá»™ CÃ´ng thÆ°Æ¡ng. Vá» viá»‡c nÃ y Ã´ng cÃ³ bÃ¬nh luáº­n gÃ¬ khÃ´ng?  Viá»‡c thi tuyá»ƒn theo tÃ´i lÃ  tá»‘t, cáº§n Ä‘Æ°á»£c tá»• chá»©c cÃ´ng khai, minh báº¡ch, cÃ´ng báº±ng. XÆ°a nay nhiá»u cÆ¡ quan váº«n giá»¯ cháº¿ Ä‘á»™ xÃ©t tuyá»ƒn, nhÆ°ng nhÆ° tháº¿ khÃ´ng hiá»‡u quáº£ báº±ng thi tuyá»ƒn. Máº·c dÃ¹ thi tuyá»ƒn váº«n cÃ²n nhiá»u váº¥n Ä‘á» háº¡n cháº¿ nhÆ° lá»™ Ä‘á», má»›m Ä‘á», Äƒn tiá»nâ€¦, nhÆ°ng chÃºng ta khÃ´ng vÃ¬ tháº¿ mÃ  bá» thi tuyá»ƒn.  Vá»›i vá»¥ viá»‡c cá»¥ thá»ƒ á»Ÿ Bá»™ CÃ´ng thÆ°Æ¡ng, pháº£i chá» káº¿t luáº­n chÃ­nh thá»©c tá»« Bá»™ vÃ  cÃ¡c cÆ¡ quan kiá»ƒm tra, xÃ¡c minh khÃ¡c. TrÆ°á»›c tiÃªn, lÃ£nh Ä‘áº¡o Bá»™ pháº£i tá»± tháº©m tra, xÃ¡c minh láº¡i vá»¥ viá»‡c nÃ y vÃ  Bá»™ trÆ°á»Ÿng Bá»™ CÃ´ng thÆ°Æ¡ng pháº£i chá»‹u trÃ¡ch nhiá»‡m vá» káº¿t luáº­n chÃ­nh thá»©c tá»« Bá»™.  Sau Ä‘Ã³, cÃ¡c cÆ¡ quan chá»©c nÄƒng nhÆ° Thanh tra chÃ­nh phá»§, cÆ¡ quan cáº£nh sÃ¡t Ä‘iá»u tra, á»§y ban kiá»ƒm tra cÃ¡c cáº¥p, tháº­m chÃ­ cáº£ á»¦y ban kiá»ƒm tra trung Æ°Æ¡ng sáº½ vÃ o cuá»™c Ä‘á»ƒ lÃ m rÃµ.  Xin cáº£m Æ¡n Ã´ng! sssssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id_book` varchar(15) NOT NULL,
  `name` varchar(127) NOT NULL,
  `img` varchar(127) NOT NULL,
  `price` int(64) NOT NULL,
  `remain` int(64) NOT NULL,
  `adult` tinyint(1) NOT NULL,
  `ebook` tinyint(1) NOT NULL,
  `book` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `descriptionpro` text NOT NULL,
  `description404` text NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bought`
--

CREATE TABLE IF NOT EXISTS `bought` (
  `id_user` varchar(15) NOT NULL,
  `id_book` varchar(15) NOT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`id_book`),
  KEY `id_book` (`id_book`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` varchar(15) NOT NULL,
  `name` varchar(127) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `interestedin`
--

CREATE TABLE IF NOT EXISTS `interestedin` (
  `id_user` varchar(15) NOT NULL,
  `id_book` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`,`id_book`),
  KEY `id_book` (`id_book`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ofcategory`
--

CREATE TABLE IF NOT EXISTS `ofcategory` (
  `id_book` varchar(15) NOT NULL,
  `id_category` varchar(15) NOT NULL,
  PRIMARY KEY (`id_book`,`id_category`),
  KEY `id_category` (`id_category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(127) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(127) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birth` datetime NOT NULL,
  `mail` varchar(127) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `nearest` datetime NOT NULL,
  `balance` int(64) NOT NULL,
  `facebook` varchar(127) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wrote`
--

CREATE TABLE IF NOT EXISTS `wrote` (
  `id_author` varchar(15) NOT NULL,
  `id_book` varchar(15) NOT NULL,
  PRIMARY KEY (`id_author`,`id_book`),
  KEY `id_book` (`id_book`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
