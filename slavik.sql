-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 21 2016 г., 09:39
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `slavik`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addanimals`
--

CREATE TABLE IF NOT EXISTS `addanimals` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `kind_of_animal` varchar(255) NOT NULL,
  `breed` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `url_foto` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=175 ;

--
-- Дамп данных таблицы `addanimals`
--

INSERT INTO `addanimals` (`id`, `name`, `kind_of_animal`, `breed`, `description`, `adress`, `url_foto`, `date`, `id_user`) VALUES
(171, 'іфвфів', 'фівфівфів', 'івфів', 'фівфівф', 'Львів', '', 1482266200, 189),
(172, 'Ярослав', 'іфвафіва', 'фівфі', 'іваіфваі', 'Львів', '', 1482267613, 189),
(173, 'іваіва', 'аіваів', 'аів', 'іваів', 'Львів', '', 1482267717, 189),
(174, 'тайсон', 'Собака', 'Такса', 'Коричневий пес', 'Львів', '', 1482301193, 189);

-- --------------------------------------------------------

--
-- Структура таблицы `foto_animals`
--

CREATE TABLE IF NOT EXISTS `foto_animals` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `Id_animal` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Id_animal` (`Id_animal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `foto_animals`
--

INSERT INTO `foto_animals` (`id`, `url`, `Id_animal`) VALUES
(4, '../file/upload/ibFa/7eb0b2187a15ad800b09fa4764cc69b1-1.jpg', 171),
(5, '../file/upload/ibFa/f20130828171641-3-1.jpg', 171),
(6, '../file/upload/ibFa/myach-futbolnyy-adidas-finale-wembley-omb_1-1.jpg', 171),
(7, '../file/upload/zYAi/2250170307.jpg', 172),
(8, '../file/upload/zYAi/2250170429.jpg', 172),
(9, '../file/upload/zYAi/Rockport-Mens-Summer-Style-Thong-SandalBlack9-M-US-0.jpg', 172),
(10, '../file/upload/hbSt/74892_3.jpg', 173),
(11, '../file/upload/hbSt/74892_5.jpg', 173),
(12, '../file/upload/hbSt/vetnamki-adidas-zeitfrei-thong-fitfoam-f32924-1.jpg', 173),
(13, '../file/upload/hbSt/vetnamki-adidas-zeitfrei-thong-fitfoam-f32924-4.jpg', 173),
(14, '../file/upload/hbSt/vetnamki-adidas-zeitfrei-thong-fitfoam-f32924-2.jpg', 173),
(15, '../file/upload/ZsNA/7eb0b2187a15ad800b09fa4764cc69b1-1.jpg', 174),
(16, '../file/upload/ZsNA/f20130828171641-3-1.jpg', 174),
(17, '../file/upload/ZsNA/myach-futbolnyy-adidas-finale-wembley-omb_1-1.jpg', 174);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `numberPhone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=192 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `name`, `numberPhone`) VALUES
(189, 's.ivanjura@gmail.com', 'slavko89', '81dc9bdb52d04dc20036dbd8313ed055', 'Slavko89', ''),
(190, 'test@i.ua1', 'tut282', '81dc9bdb52d04dc20036dbd8313ed055', 'Slavko89', '+380983547704'),
(191, 'myshoproom@ukr.net', 'vetal1988', '827ccb0eea8a706c4c34a16891f84e7b', 'веталь', '+380983547705');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `addanimals`
--
ALTER TABLE `addanimals`
  ADD CONSTRAINT `addanimals_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `foto_animals`
--
ALTER TABLE `foto_animals`
  ADD CONSTRAINT `foto_animals_ibfk_1` FOREIGN KEY (`Id_animal`) REFERENCES `addanimals` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
