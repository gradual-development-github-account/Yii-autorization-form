-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 14 2016 г., 09:30
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `eportal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ep_users`
--

CREATE TABLE IF NOT EXISTS `ep_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmpassword` varchar(50) NOT NULL,
  `accode` varchar(200) NOT NULL,
  `changecode` varchar(200) NOT NULL,
  `activstatus` tinyint(1) NOT NULL,
  `changestatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `ep_users`
--

INSERT INTO `ep_users` (`id`, `username`, `email`, `password`, `confirmpassword`, `accode`, `changecode`, `activstatus`, `changestatus`) VALUES
(30, 'Alex', '385898sw@gmail.com', '3f6fb9f3b743c8bc21008f23798cc3a8', '', '20598ef0bad2d972b6f73ff0c09b9c9f', '', 1, 0),
(31, 'Alex2', '145@gmail.com', '930524f1a28bc98b76f3a240dd91c620', '', '5567282f16af33ef55d40370c9c681d3', '', 1, 0),
(32, 'alex3', 'alex3@mail.com', '0942f8c36834bc31ce602824d4f08f1c', '', 'fffa3aab5c506494060cfd715cbdcfae', '', 0, 0),
(33, 'name1', 'name1@mail.ru', '288301d71338b86ccf7f311ac2f8aed2', '', 'e7b6dcdd0094d7746ecb46138ed1e061', '', 0, 0),
(34, 'name2', 'name2@mail.com', '399e0a333c3f0232305fe00f05a33b02', '', 'ba90cff84f1f6a8666d10b661f9440ed', '', 0, 0),
(36, 'alex4', '2@gmail.com', '24ec2b06d81859ad060eba66705155e3', '', '', 'ab0de1696dbd75ff95b179b76308626f', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1471100296),
('m160813_105047_interaction_with_bd', 1471100298);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_test`
--

CREATE TABLE IF NOT EXISTS `tbl_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `sum_income` int(11) DEFAULT NULL,
  `date_income` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `tbl_test`
--

INSERT INTO `tbl_test` (`id`, `name`, `sum_income`, `date_income`) VALUES
(1, 'name3', 69, '2016-08-13 14:58:18'),
(2, 'name3', 63, '2016-08-13 14:58:18'),
(3, 'name1', 74, '2016-08-13 14:58:18'),
(4, 'name1', 11, '2016-08-13 14:58:18'),
(5, 'name1', 17, '2016-08-13 14:58:18'),
(6, 'name2', 88, '2016-08-13 14:58:18'),
(7, 'name3', 44, '2016-08-13 14:58:18'),
(8, 'name1', 54, '2016-08-13 14:58:18'),
(9, 'name2', 70, '2016-08-13 14:58:18'),
(10, 'name2', 75, '2016-08-13 14:58:18'),
(11, 'name1', 61, '2016-08-13 14:58:18'),
(12, 'name1', 93, '2016-08-13 14:58:18'),
(13, 'name2', 23, '2016-08-13 14:58:18'),
(14, 'name1', 93, '2016-08-13 14:58:18'),
(15, 'name1', 11, '2016-08-13 14:58:18'),
(16, 'name3', 16, '2016-08-13 14:58:18'),
(17, 'name3', 35, '2016-08-13 14:58:18'),
(18, 'name3', 28, '2016-08-13 14:58:18'),
(19, 'name2', 55, '2016-08-13 14:58:18'),
(20, 'name1', 71, '2016-08-13 14:58:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
