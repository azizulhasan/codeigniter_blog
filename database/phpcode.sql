-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 06:50 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `blog_slug` varchar(255) NOT NULL,
  `picture` varchar(150) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `tag_id` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `subtitle` varchar(500) DEFAULT NULL,
  `sub_category_id` varchar(100) DEFAULT NULL,
  `blog_type` tinyint(4) DEFAULT NULL,
  `paid_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `blog_slug`, `picture`, `category_id`, `tag_id`, `created_at`, `updated_at`, `created_by_id`, `type`, `subtitle`, `sub_category_id`, `blog_type`, `paid_amount`) VALUES
(15, 'sdfgsdf', 'blog-slug15', 'jpg', 1, '2', '2020-03-23 06:13:03', NULL, 1, NULL, 'sdfgsdf', '1', 1, 123),
(19, 'serye', '', 'jpg', 1, '2', '2020-03-23 06:37:34', NULL, 1, NULL, 'asdfasd', '1', 2, 555),
(22, 'dgfd', '', 'jpg', 1, '2', '2020-03-23 06:45:44', NULL, 1, NULL, 'sadfgsf', '1', 2, 6),
(24, 'erghsd', '', 'jpg', 1, '2', '2020-03-23 06:59:09', NULL, 1, NULL, 'asdf', '1', 2, 44),
(26, 'Second post title', '', 'jpg', 1, '2', '2020-03-23 16:00:13', NULL, 1, NULL, 'second subtitle', '1', 1, 0),
(28, 'Second post ', '', 'jpg', 1, '2', '2020-03-23 16:12:24', NULL, 1, NULL, 'hasan', '1', 2, 44),
(29, 'success', '', '', 1, '2', '2020-03-23 18:16:55', NULL, 1, NULL, 'asdfasd', '1', 1, 444),
(30, 'success', '', 'jpg', 1, '2', '2020-03-23 18:17:49', NULL, 1, NULL, 'asdfasd', '1', 1, 444),
(31, 'reygrdgd', '', NULL, 1, '2', '2020-03-24 14:26:23', NULL, 1, NULL, 'asdfasd', '1', 2, 4),
(32, 'this is real blog', '', NULL, 1, '2', '2020-03-24 18:25:55', NULL, 1, NULL, 'this is real blog subtitle', '1', 2, 34),
(34, 'final', '', '92335e7a47a3520451585072035_Screenshot_1.png', 4, '2', '2020-03-24 18:47:15', NULL, 1, NULL, 'final', '8', 2, 222222222),
(35, 'asdfa', '', '48145e7a47d40cf0c1585072084_munna.jpg', 1, '2', '2020-03-24 18:48:04', NULL, 1, NULL, 'asdfasd', '1', 2, 33),
(36, 'I am havpppasdfasd', '', '70155e7a48fbebc011585072379_munna.jpg', 3, '2', '2020-03-24 18:52:59', NULL, 1, NULL, 'how are you ', '7', 1, 0),
(37, 'fineal', '', '14925e7a48b723d8c1585072311_nafisa.jpg', 3, '2', '2020-03-24 18:51:51', NULL, 1, NULL, 'fineal', '7', 2, 22),
(38, 'image test', 'image test', 'Please upload file', 2, '2', '2020-06-22 12:09:17', NULL, 1, NULL, 'image test', '2', 1, 0),
(39, 'asdfasdf', '', '61545e7a64e7560e01585079527_jeina.jpg', 3, '2', '2020-03-24 00:00:00', NULL, 1, NULL, 'asdfasd', '9', 2, 4),
(40, 'hasan', '', '1', 4, '2', '2020-03-24 21:11:15', NULL, 1, NULL, 'hasan', '8', 2, 34),
(41, 'hasan', '', '49335e7a69c00777e1585080768_Screenshot_4.png', 4, '2', '2020-03-24 21:12:48', NULL, 1, NULL, 'hasan', '8', 2, 34),
(42, 'how are you ', '', '50625e7a6a0a8c54b1585080842_85242423_2548500625390301_6005296545409269760_o.jpg', 3, '2', '2020-03-24 21:14:02', NULL, 1, NULL, 'how are you ', '9', 2, 22),
(44, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?', '71535f0365eb8e0fe1594058219_blog_5.jpg', 3, '3', '2020-07-06 19:56:59', NULL, 1, NULL, 'What is Lorem Ipsum?', '9', 2, 10),
(46, 'What is Lorem Ipsum?', '', '40345e7c58813b7e01585207425_graphic_design.png', 3, '2', '2020-03-26 08:23:45', NULL, 1, NULL, 'What is Lorem Ipsum?', '9', 1, 10),
(47, 'What is Lorem Ipsum?', 'slug47', '15415e7c58987cdda1585207448_graphic_design.png', 3, '2', '2020-03-26 08:24:08', NULL, 1, NULL, 'What is Lorem Ipsum?', '9', 1, 10),
(48, 'What is Lorem Ipsum?', 'slug48', '53285e7c59289017e1585207592_graphic_design.png', 3, '2', '2020-03-26 08:26:32', NULL, 1, NULL, 'What is Lorem Ipsum?', '9', 1, 10),
(49, 'জীবনের লক্ষ্য নির্ধারণ ও স্থির করার উপায়: “সাকসেস ', 'জীবনের লক্ষ্য নির্ধারণ ও স্থির করার উপায়: “সাকসেস ', '69885ef081a19e85c1592820129_download_1.png', 1, '2', '2020-06-22 12:02:09', NULL, 1, NULL, 'জীবনের লক্ষ্য নির্ধারণ বা স্থির করতে হলে জানতে হবে', '1', 1, 10),
(50, 'শেয়ারবাজারের ২২ কোম্পানির ৬১ পরিচালককে আলটিমেটাম', 'শেয়ারবাজারের ২২ কোম্পানির ৬১ পরিচালককে আলটিমেটাম', '19885f0299fa48a071594006010_blog_single_background.jpg', 1, '2', '2020-07-06 05:26:50', NULL, 1, NULL, 'শেয়ারবাজারের ২২ কোম্পানির ৬১ পরিচালককে আলটিমেটাম', '1', 1, 12),
(51, 'শেয়ারবাজারের ২২ কোম্পানির ৬১ পরিচালককে আলটিমেটাম', 'শেয়ারবাজারের ২২ কোম্পানির ৬১ পরিচালককে আলটিমেটাম', '86325f02a6ac8ddaf1594009260_best_2.png', 1, '2', '2020-07-06 06:21:00', NULL, 1, NULL, 'শেয়ারবাজারের ২২ কোম্পানির ৬১ পরিচালককে আলটিমেটাম', '1', 1, 12),
(52, ' তরুণদের এমনভাবে গড়তে হবে, যাতে দেশ হাজারো লতিফুর ', ' তরুণদের এমনভাবে গড়তে হবে, যাতে দেশ হাজারো লতিফুর ', '41155f02c158653f51594016088_adv_3.png', 0, '2', '2020-07-13 09:17:50', NULL, 1, NULL, ' তরুণদের এমনভাবে গড়তে হবে, যাতে দেশ হাজারো লতিফুর ', '2', 2, 12),
(55, 'ক্ষুধার্তকে অন্ন দান অনেক সওয়াবের কাজ', 'ক্ষুধার্তকে অন্ন দান অনেক সওয়াবের কাজ', '48445f0364a684f7b1594057894_adv_2.png', 1, '', '2020-07-06 19:51:34', NULL, 1, NULL, 'ক্ষুধার্তকে অন্ন দান অনেক সওয়াবের কাজ', '1', 1, 12),
(56, ' আয়া সোফিয়া এবং তুরস্কের ধর্মভিত্তিক রাজনীতির ভব', ' আয়া সোফিয়া এবং তুরস্কের ধর্মভিত্তিক রাজনীতির ভব', '61155f1511eb25dad1595216363_1.jpg', 0, '1,4', '2020-07-20 05:40:14', NULL, 1, NULL, ' আয়া সোফিয়া এবং তুরস্কের ধর্মভিত্তিক রাজনীতির ভব', '7', 1, 10),
(57, 'কেন বিসিএসই সবার লক্ষ্য', 'কেন বিসিএসই সবার লক্ষ্য', '57655f151302bf5c91595216642_8s.jpg', 1, '1,4', '2020-07-20 05:58:11', NULL, 1, NULL, 'কেন বিসিএসই সবার লক্ষ্য', '7', 2, 0),
(58, 'হুয়াওয়ে নিয়ে বেকায়দায় পড়েছে চীন', 'হুয়াওয়ে নিয়ে বেকায়দায় পড়েছে চীন', '51005f151df8db1891595219448_CookIslands.png', 9, '6', '2020-07-20 06:30:48', NULL, 1, NULL, 'হুয়াওয়ে নিয়ে বেকায়দায় পড়েছে চীন', '19', 2, 0),
(59, ' ভূ–রাজনৈতিক দ্বন্দ্বের ঘুঁটি আয়া সোফিয়া ও এরদোয়ান', ' ভূ–রাজনৈতিক দ্বন্দ্বের ঘুঁটি আয়া সোফিয়া ও এরদোয়ান', '56085f151e57d651d1595219543_Turkey.png', 9, '6', '2020-07-20 06:32:23', NULL, 1, NULL, ' ভূ–রাজনৈতিক দ্বন্দ্বের ঘুঁটি আয়া সোফিয়া ও এরদোয়ান', '19', 2, 0),
(60, 'পাশের বাড়ির ছেলে বুয়েটের উপাচার্য', 'পাশের বাড়ির ছেলে বুয়েটের উপাচার্য', '11985f151edd138681595219677_a4.jpg', 3, '3', '2020-07-20 06:34:37', NULL, 1, NULL, 'পাশের বাড়ির ছেলে বুয়েটের উপাচার্য', '9', 2, 0),
(61, 'ব্যতিক্রমী গ্র্যাজুয়েশন ডে', 'ব্যতিক্রমী গ্র্যাজুয়েশন ডে', '37655f151f2b58e9b1595219755_a8.jpg', 3, '', '2020-07-20 06:35:55', NULL, 1, NULL, 'ব্যতিক্রমী গ্র্যাজুয়েশন ডে', '9', 2, 0),
(62, 'চীনের সঙ্গে তীব্র উত্তেজনার মধ্যে \'বিরল\' সামরিক মহ', 'চীনের সঙ্গে তীব্র উত্তেজনার মধ্যে \'বিরল\' সামরিক মহ', '88845f152195524f31595220373_email_3.jpg', 3, '3', '2020-07-20 06:46:13', NULL, 1, NULL, 'চীনের সঙ্গে তীব্র উত্তেজনার মধ্যে \'বিরল\' সামরিক মহ', '9', 2, 0),
(63, 'দ্রুত সময়ে এবং স্বল্প ব্যয়ে পাবলিক বিশ্ববিদ্যালয়ে ', 'দ্রুত সময়ে এবং স্বল্প ব্যয়ে পাবলিক বিশ্ববিদ্যালয়ে ', '17915f1521f45a4c01595220468_dashboard4_2.jpg', 1, '4', '2020-07-20 06:47:48', NULL, 1, NULL, 'দ্রুত সময়ে এবং স্বল্প ব্যয়ে পাবলিক বিশ্ববিদ্যালয়ে ', '8', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'php5'),
(2, 'html'),
(3, 'javascript 9'),
(4, 'php_framework'),
(8, 'php7'),
(9, 'National News ');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('06qaue08mvtgmhvkoest215pg66jqv13', '::1', 1595184804, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353138343736323b69647c733a333a22313433223b6e616d657c733a353a22626164616c223b747970657c733a313a2236223b),
('0bcojv9ms3d2is4vdjfq156pq4ncfrpi', '::1', 1595154233, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135343233333b),
('0bocph104pf0ujcvh1jtdcn2c3vem0c7', '::1', 1595173663, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137333636333b),
('0odfj3hku0edoa64hubbp8h794ce9mgr', '::1', 1595216083, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353231363038323b),
('0q5dbraolq902ottfgfl6vi6c4kqjuec', '::1', 1595160769, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353136303736393b),
('0vn076h4chbv028elv654a8dek64sv9i', '::1', 1595219759, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353231393735393b69647c733a333a22313438223b6e616d657c733a393a226d6f7368616964756c223b747970657c733a313a2231223b),
('16h1dm0t20bh0c1p4cfut9l17m06hlq7', '::1', 1595184710, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353138343638363b69647c733a333a22313433223b6e616d657c733a353a22626164616c223b747970657c733a313a2236223b),
('1t91od31mp0f70jel0kja3gbq2domgel', '::1', 1595178979, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137383937393b6572727c733a3133353a223c703e5468652046756c6c204e616d65206669656c642069732072657175697265642e3c2f703e0a3c703e546865205265747970652050617373776f7264206669656c642069732072657175697265642e3c2f703e0a3c703e546865205465726d73202620436f6e646974696f6e73206669656c642069732072657175697265642e3c2f703e0a223b5f5f63695f766172737c613a313a7b733a333a22657272223b733a333a226f6c64223b7d),
('22gel5pqtju4pl1eknibdud2gl10g8js', '::1', 1595172032, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137323033323b),
('29jjqksqak7qi4qs8iq0erig7anlgcpn', '::1', 1595184752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353138343439313b69647c733a333a22313433223b6e616d657c733a353a22626164616c223b747970657c733a313a2236223b),
('2jtf221jdjh3b5lv7a9b7n4jekc8utc7', '::1', 1595218050, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353231383035303b69647c733a333a22313235223b6e616d657c733a31323a22417a697a756c20486173616e223b747970657c733a313a2231223b),
('2tn347em9lp7ij01opb9ll6n6e88i5k3', '::1', 1595184491, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353138343439313b69647c733a333a22313433223b6e616d657c733a353a22626164616c223b747970657c733a313a2236223b),
('3lc3oak9qo8320fg8e722gqa3e68pjvd', '::1', 1595155814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135353831343b),
('43rd6fbckap1tuv4bl1ouj7flo87s8se', '::1', 1595160447, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353136303434373b),
('5gmgv34g8f1acd0i6r1prskigdmqfuiu', '::1', 1595160069, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353136303036393b),
('5squ89s7rd2693j3u5g8rdpjb3rdflep', '::1', 1595176796, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137363739363b69647c733a333a22313235223b6e616d657c733a31323a22417a697a756c20486173616e223b747970657c733a313a2231223b),
('5tkuvm08j3q7usblm7he2dnhkv6m8h6p', '::1', 1595175059, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137353035393b),
('6fuogb56g6c9p2pern6bbeaohi39nfv9', '::1', 1595181296, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353138313239363b69647c733a333a22313433223b6e616d657c733a353a22626164616c223b747970657c733a313a2236223b),
('6vdg4e8bmih41s3eacqeeq91kptac962', '::1', 1595179497, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137393439373b6572727c733a3133353a223c703e5468652046756c6c204e616d65206669656c642069732072657175697265642e3c2f703e0a3c703e546865205265747970652050617373776f7264206669656c642069732072657175697265642e3c2f703e0a3c703e546865205465726d73202620436f6e646974696f6e73206669656c642069732072657175697265642e3c2f703e0a223b5f5f63695f766172737c613a313a7b733a333a22657272223b733a333a226f6c64223b7d),
('787hq5p2fv003absirnl4a3gj3voq6kg', '::1', 1595173317, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137333331373b),
('8vooepdnvaheghu80n9bdhbb87j2cdf2', '::1', 1595176118, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137363131383b),
('94cc5g3p3d0s23ocsrumd4e1tg1gjs2e', '::1', 1595220471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353232303437313b69647c733a333a22313438223b6e616d657c733a393a226d6f7368616964756c223b747970657c733a313a2231223b),
('a99luijl82d8abuhpou4bcb8jkq5jd2k', '::1', 1595157834, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135373833343b),
('antemdrl05gmaajtl5l08itnr7eop3pp', '::1', 1595159640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135393634303b),
('boeaqqbbo9270rv6rutheps6o1vvgqt0', '::1', 1595154534, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135343533343b),
('cghc7b9jn1g3r43fv18bu10ds9jn4icm', '::1', 1595159082, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135393038323b),
('dp349ldis5db1si30pgnasia1og4rt9d', '::1', 1595155454, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135353435343b),
('durj1mvukj7572c25e4uvkv9e2mn4qa3', '::1', 1595174216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137343034373b),
('ebbga3vjbiv3l8649njlgmd7l6m54liv', '::1', 1595178356, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137383335363b69647c733a333a22313435223b6e616d657c733a353a226b616c616d223b747970657c733a313a2234223b6d73677c733a31393a225265676973746572205375636365737366756c223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226f6c64223b7d),
('eeud5bpi9fokr3e2tvi152t70hc4gnng', '::1', 1595177893, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137373839333b),
('f6dojcp7d2udarvr31t280fp6c4p811t', '::1', 1595218353, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353231383335333b69647c733a333a22313235223b6e616d657c733a31323a22417a697a756c20486173616e223b747970657c733a313a2231223b),
('gmjmjm31s3em5ribgtl1dfhqjv2b43ob', '::1', 1595218930, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353231383933303b69647c733a333a22313438223b6e616d657c733a393a226d6f7368616964756c223b747970657c733a313a2231223b),
('gufhkt3fi1kglc030pq91iqpdr6nnh4b', '::1', 1595216427, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353231363432373b69647c733a313a2231223b6e616d657c733a353a22686173616e223b747970657c733a313a2231223b),
('hhokp3596vp2058gobq4j2fs79fjq7qk', '::1', 1595155144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135353134343b),
('j831gsttau7ggcerotrs1p2pf6fae7rd', '::1', 1595167259, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353136373235393b),
('js71k7l2ke3r1nanpivk0b67upcrlc1l', '::1', 1595162037, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353136323033373b),
('k2ukf68jg9ufiamnak170b6g74qb8upc', '::1', 1595181821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353138313832313b69647c733a333a22313433223b6e616d657c733a353a22626164616c223b747970657c733a313a2236223b),
('m19eqja9vfv9e1bnc6sfqa3u2slfm38o', '::1', 1595154842, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135343834323b),
('n74ro5bslltu31vbnmu760lq53h8nope', '::1', 1595158204, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135383230343b),
('nfatfdm60lr5n7t0q3ck4v429f8bcs3r', '::1', 1595217496, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353231373439363b69647c733a313a2231223b6e616d657c733a353a22686173616e223b747970657c733a313a2231223b),
('nmjq175j6qsv9846ilagddnga727s9ii', '::1', 1595180296, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353138303239363b69647c733a333a22313433223b6e616d657c733a353a22626164616c223b747970657c733a313a2236223b),
('oil1d5l1k2dk82oc5hloghjdm214rt7c', '::1', 1595161720, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353136313732303b),
('oivo1und3pcme70e6hqdqph94vct7t1n', '::1', 1595158740, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135383734303b),
('ornb83tvd4gpsd4phve3evr6ctd06pal', '::1', 1595156391, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135363339313b),
('plribhs1c2hr48ikgns5nk1i5dqajhnh', '::1', 1595174047, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137343034373b),
('pnc3vl0fmnkl8d4733bvhk19cq7agsbe', '::1', 1595175386, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137353338363b),
('qduppeepjpv9340ahm5pva8ln0dc3pbh', '::1', 1595177514, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137373531343b69647c733a333a22313433223b6e616d657c733a353a22626164616c223b747970657c733a313a2236223b),
('qgqd06v795i3r8hd6dngunh1a2gcm9gq', '::1', 1595220142, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353232303134323b69647c733a333a22313438223b6e616d657c733a393a226d6f7368616964756c223b747970657c733a313a2231223b),
('r9laobjj3c8j1lpviareb2p3mrjkj017', '::1', 1595174626, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137343632363b),
('ridoi2hgisgtoau860ekkcua0a9r3lj4', '::1', 1595161091, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353136313039313b),
('rt8vbrtlmv3bokvd75fprqd2scdmimsr', '::1', 1595156792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353135363739323b),
('sjg3vs2u8qltiftffrcsc73f8rljipqa', '::1', 1595175813, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137353831333b),
('su7ous67lbrfb4r6cn47d0g5v4f4cn4g', '::1', 1595180816, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353138303831363b69647c733a333a22313433223b6e616d657c733a353a22626164616c223b747970657c733a313a2236223b),
('t08ninb379ah8op7fvlluf9frj3thouk', '::1', 1595220561, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353232303437313b69647c733a333a22313438223b6e616d657c733a393a226d6f7368616964756c223b747970657c733a313a2231223b),
('t4l6a5nh49nbb1d20890tl2llibdvkeo', '::1', 1595174306, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353137343330353b);

-- --------------------------------------------------------

--
-- Table structure for table `position_manage`
--

CREATE TABLE `position_manage` (
  `id` int(11) NOT NULL,
  `position_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position_manage`
--

INSERT INTO `position_manage` (`id`, `position_name`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'Sub Editor'),
(4, 'Subscriber'),
(5, 'Journalist'),
(6, 'Advertiser');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `sub_category_name` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `sub_category_name`, `category_id`) VALUES
(2, 'Chattagram', 9),
(7, 'API', 1),
(8, 'CakePHP', 1),
(9, 'angular', 3),
(10, 'codeigniter', 4),
(12, 'Restful API', NULL),
(15, 'Zend Framwork', 4),
(16, 'Ruby', 4),
(18, 'Symphony', 4),
(19, 'Sylhet', 9),
(20, 'Narayangang', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag_name`, `category_id`) VALUES
(1, 'api', 1),
(2, 'html', 2),
(3, 'css', 3),
(4, 'crud', 1),
(6, 'Cricket', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `c_id` int(11) NOT NULL,
  `c_guest_name` varchar(20) NOT NULL,
  `c_guest_mobile` bigint(10) NOT NULL,
  `c_guest_email` varchar(50) NOT NULL,
  `c_comment` text NOT NULL,
  `c_parent_id` int(3) NOT NULL,
  `c_commented_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `profile_id` varchar(30) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `password_recovery` varchar(100) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile_id`, `name`, `email`, `contact`, `picture`, `password`, `password_recovery`, `type`) VALUES
(125, NULL, 'Azizul Hasan', 'azizulhasan.cr@gmail.com', '01855920762', '84105f151c2cac2fb1595218988_a2.jpg', '123', NULL, 4),
(148, NULL, 'moshaidul', 'moshaidul@showtellconsulting.com', '01711071219', '11535f1518b488da11595218100_a7.jpg', '123', NULL, 1),
(149, NULL, 'Badal', 'badal@gmail.com', '01521496828', '31165f151c62ac8791595219042_a1.jpg', '123', NULL, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `created_by_id` (`created_by_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `position_manage`
--
ALTER TABLE `position_manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_id` (`category_id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `position_manage`
--
ALTER TABLE `position_manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
