-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Гру 12 2015 р., 18:41
-- Версія сервера: 5.6.22-log
-- Версія PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `diamonds`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(10, 'Laptops'),
(11, 'Smartphones'),
(12, 'Computers'),
(13, 'TV/Video/Audio');

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `created`, `cat_id`, `title`, `description`) VALUES
(1, 1449925864, 10, 'Lenovo G50-45', 'Описание Lenovo G50-45'),
(2, 1449926013, 10, 'Lenovo IdeaPad 100-15', 'Описание Lenovo IdeaPad 100-15'),
(3, 1449926039, 10, 'HP 250 G4 (T6N59ES) ', 'Описание HP 250 G4 (T6N59ES)'),
(4, 1449926086, 10, 'Asus X751LX (X751LX-T4120T) Black', 'Описание Asus X751LX (X751LX-T4120T) Black'),
(6, 1449926199, 11, 'Samsung Galaxy A7 A700H/DS White', 'Описание Samsung Galaxy A7 A700H/DS White'),
(7, 1449926265, 11, 'Microsoft Lumia 950 XL Dual Sim Black', 'Описание Samsung Microsoft Lumia 950 XL Dual Sim Black'),
(8, 1449926300, 11, 'Sony Xperia Z5 Dual Premium Gold', 'Описание Sony Xperia Z5 Dual Premium Gold'),
(9, 1449926370, 12, 'Everest Home ', 'Описание Everest Home '),
(10, 1449926408, 12, 'Lenovo ThinkCentre M82 TWR (26971B3)', 'Описание Lenovo ThinkCentre M82 TWR (26971B3)'),
(11, 1449926437, 12, 'ARTLINE Gaming X63 v02 (X63v02)', 'Описание ARTLINE Gaming X63 v02 (X63v02)'),
(12, 1449926549, 13, 'LG 42LF650V', 'Описание LG 42LF650V'),
(13, 1449926571, 13, 'Samsung UE32J5200', 'Описание Samsung UE32J5200'),
(14, 1449926595, 13, 'Philips 48PFT5500/12', 'Описание Philips 48PFT5500/12'),
(15, 1449926627, 13, 'Samsung HT-J5550K/RU', 'Описание Samsung HT-J5550K/RU');

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
