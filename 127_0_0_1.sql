-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 15 2017 г., 20:00
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `learnphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Registration`
--

CREATE TABLE IF NOT EXISTS `Registration` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nikname` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
--
-- База данных: `slavik`
--

-- --------------------------------------------------------

--
-- Структура таблицы `animal`
--

CREATE TABLE IF NOT EXISTS `animal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `animal`
--

INSERT INTO `animal` (`id`, `title`) VALUES
(30, 'Собака'),
(31, 'Кішка'),
(32, 'Птиця'),
(33, 'Гризун'),
(34, 'Худоба'),
(35, 'Рептилія');

-- --------------------------------------------------------

--
-- Структура таблицы `animal_breed`
--

CREATE TABLE IF NOT EXISTS `animal_breed` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `animal_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `kind_of_animal_id` (`animal_id`),
  KEY `kind_of_animal_id_2` (`animal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=236 ;

--
-- Дамп данных таблицы `animal_breed`
--

INSERT INTO `animal_breed` (`id`, `title`, `animal_id`) VALUES
(22, 'Аффенпинчер', 30),
(23, 'Афганская борзая', 30),
(24, 'Акита', 30),
(25, 'Аляскинский маламут', 30),
(26, 'Американский эскимосский шпиц', 30),
(27, 'Американская паратая гончая', 30),
(28, 'Американский стаф. терьер', 30),
(29, 'Американский водный спаниель', 30),
(30, 'Анатолийская овчарка', 30),
(31, 'Австралийский терьер', 30),
(32, 'Австралийская овчарка', 30),
(33, 'Австралийский кеттл дог', 30),
(34, 'Английский кокер-спаниель', 30),
(35, 'Английский фоксхаунд', 30),
(36, 'Английский сеттер', 30),
(37, 'Английский спрингер-спаниель', 30),
(38, 'Американский той-фокстерьер', 30),
(39, 'Английский той-терьер', 30),
(40, 'Басенджи', 30),
(41, 'Бельгийская овчарка тервюрен', 30),
(42, 'Бельгийская овчарка малинуа', 30),
(43, 'Бельгийский грюнендаль', 30),
(44, 'Бассет-хаунд', 30),
(45, 'Большой швейцарский зенненхунд', 30),
(46, 'Бладхаунд', 30),
(47, 'Бишон фризе', 30),
(48, 'Бигль', 30),
(49, 'Бостон-терьер', 30),
(50, 'Боксер', 30),
(51, 'Бриар', 30),
(52, 'Бордоский дог', 30),
(53, 'Бернский зенненхунд', 30),
(54, 'Бородатый колли', 30),
(55, 'Бульдог', 30),
(56, 'Босерон', 30),
(57, 'Бретонский спаниель', 30),
(58, 'Бедлингтон-терьер', 30),
(59, 'Бордер колли', 30),
(60, 'Бордер терьер', 30),
(61, 'Брюссельский гриффон', 30),
(62, 'Бульмастиф', 30),
(63, 'Бультерьер', 30),
(64, 'Бишон-лион', 30),
(65, 'Бобтейл', 30),
(66, 'Вельш корги пемброк', 30),
(67, 'Вандейский бассет-гриффон', 30),
(68, 'Вест хайленд уайт терьер', 30),
(69, 'Вельш-спрингер-спаниель', 30),
(70, 'Венгерская выжла', 30),
(71, 'Веймаранер', 30),
(72, 'Вельш-терьер', 30),
(73, 'Гладкошерстный фокстерьер', 30),
(74, 'Глен оф Имаал терьер', 30),
(75, 'Гаванский бишон', 30),
(76, 'Грейхаунд', 30),
(77, 'Грифон кортальса', 30),
(78, 'Дратхаар', 30),
(79, 'Далматинец', 30),
(80, 'Доберман-пинчер', 30),
(81, 'Денди-динмонт-терьер', 30),
(82, 'Джек-рассел-терьер', 30),
(83, 'Дирхаунд', 30),
(84, 'Золотистый ретривер', 30),
(85, 'Ивисская борзая', 30),
(86, 'Жесткошерстный фокстерьер', 30),
(87, 'Ирландский сеттер', 30),
(88, 'Ирландский терьер', 30),
(89, 'Ирландский водяной спаниель', 30),
(90, 'Ирландский волкодав', 30),
(91, 'Итальянский спиноне', 30),
(92, 'Йоркширский терьер', 30),
(93, 'Кардиган вельш корги', 30),
(94, 'Керн терьер', 30),
(95, 'Кинг чарльз спаниель', 30),
(96, 'Кламбер-спаниель', 30),
(97, 'Кавалер кинг чарльз спаниель', 30),
(98, 'Кокер-спаниель', 30),
(99, 'Колли', 30),
(100, 'Комондор', 30),
(101, 'Китайская хохлатая собачка', 30),
(102, 'Кеесхонд', 30),
(103, 'Керри-блю-терьер', 30),
(104, 'Кувас', 30),
(105, 'Курчавошерстный ретривер', 30),
(106, 'Карликовый пудель', 30),
(107, 'Левретка', 30),
(108, 'Лабрадор ретривер', 30),
(109, 'Лейкленд-терьер', 30),
(110, 'Лхаса Апсо', 30),
(111, 'Мастиф', 30),
(112, 'Манчестер-терьер', 30),
(113, 'Мальтийская болонка', 30),
(114, 'Миниатюрный бультерьер', 30),
(115, 'Миниатюрный пинчер', 30),
(116, 'Миниатюрный пудель', 30),
(117, 'Мягкошерстный пшеничный терьер', 30),
(118, 'Миниатюрный шнауцер', 30),
(119, 'Мопс', 30),
(120, 'Немецкая овчарка', 30),
(121, 'Норвежский элкхаунд', 30),
(122, 'Немецкий пинчер', 30),
(123, 'Немецкий курцхаар', 30),
(124, 'Немецкий дог', 30),
(125, 'Новошотландский ретривер', 30),
(126, 'Ньюфаундленд', 30),
(127, 'Неаполитанский мастиф', 30),
(128, 'Норфолк терьер', 30),
(129, 'Норвич терьер', 30),
(130, 'Оттерхаунд', 30),
(131, 'Пули', 30),
(132, 'Пиренейская горная собака', 30),
(133, 'Прямошерстный ретривер', 30),
(134, 'Папильон', 30),
(135, 'Пекинес', 30),
(136, 'Плотт-хаунд', 30),
(137, 'Парсон-рассел-терьер', 30),
(138, 'Пойнтер', 30),
(139, 'Померанский шпиц', 30),
(140, 'Польская низинная овчарка', 30),
(141, 'Португальская водяная собака', 30),
(142, 'Пудель', 30),
(143, 'Русская борзая', 30),
(144, 'Ризеншнауцер', 30),
(145, 'Русский черный терьер', 30),
(146, 'Ротвейлер', 30),
(147, 'Родезийский риджбек', 30),
(148, 'Сенбернар', 30),
(149, 'Стаффордширский бультерьер', 30),
(150, 'Салюки', 30),
(151, 'Самоедская собака', 30),
(152, 'Скотч-терьер', 30),
(153, 'Силихем-терьер<br />', 30),
(154, 'Сибирский хаски', 30),
(155, 'Силки-терьер', 30),
(156, 'Скай-терьер', 30),
(157, 'Суссекс-спаниель', 30),
(158, 'Такса', 30),
(159, 'Тибетский мастиф', 30),
(160, 'Тибетский спаниель', 30),
(161, 'Тибетский терьер', 30),
(162, 'Уиппет', 30),
(163, 'Филд-спаниель', 30),
(164, 'Финский шпиц', 30),
(165, 'Французский бульдог', 30),
(166, 'Фландрский бувье', 30),
(167, 'Фараонова собака', 30),
(168, 'Ханаанская собака', 30),
(169, 'Черно-подпалый кунхаунд', 30),
(170, 'Харьер', 30),
(171, 'Чесапик бей ретривер', 30),
(172, 'Чау-чау', 30),
(173, 'Чихуахуа', 30),
(174, 'Шарпей', 30),
(175, 'Шотландский сеттер', 30),
(176, 'Шипперке', 30),
(177, 'Шелти<br />', 30),
(178, 'Шиба ину', 30),
(179, 'Ши-тцу', 30),
(180, 'Шнауцер', 30),
(181, 'Шведский вальхунд', 30),
(182, 'Эрдельтерьер', 30),
(183, 'Японский хин', 30),
(184, 'Канарка', 32),
(186, 'Папуга', 32),
(187, 'Голуб', 32),
(188, 'Сова', 32),
(189, 'Орел', 32),
(190, 'Змія', 35),
(191, 'Черепаха', 35),
(192, 'Кролик', 33),
(193, 'Тхір', 33),
(194, 'Морська свинка', 33),
(195, 'Хом''як', 33),
(196, 'Шиншила', 33),
(199, 'Велика рогата Худоба', 34),
(200, 'Мала рогата Худоба', 34),
(203, 'Кінь', 34),
(204, 'Баран', 34),
(205, 'Абіссинська кішка', 31),
(206, 'Американський бобтейл', 31),
(207, 'Американський керл', 31),
(208, 'Бенгальський кіт', 31),
(209, 'Британський короткошерстий кіт', 31),
(210, 'Бурманський кіт', 31),
(211, 'Гімалайський кіт', 31),
(212, 'Девон рекс', 31),
(213, 'Донський сфінкс', 31),
(214, 'Єгипетський мау', 31),
(215, 'Канадський сфінкс', 31),
(216, 'Корніш рекс', 31),
(217, 'Курильський бобтейл', 31),
(218, 'Мейн-кун', 31),
(219, 'Менкс', 31),
(220, 'Невська маскарадна', 31),
(221, 'Нібелунг', 31),
(222, 'Норвезький лісовий кіт', 31),
(223, 'Орієнтальна кішка', 31),
(224, 'Персидський кіт', 31),
(225, 'Російський блакитний кіт', 31),
(226, 'Саванна', 31),
(227, 'Сибірський кіт', 31),
(228, 'Сіамський кіт', 31),
(229, 'Сомалійська кішка', 31),
(230, 'Тойгер', 31),
(231, 'Турецька ангора', 31),
(232, 'Турецький ван', 31),
(233, 'Уральський рекс', 31),
(234, 'Шотландський висловухий кіт', 31),
(235, 'Безпородний', 31);

-- --------------------------------------------------------

--
-- Структура таблицы `coordinates`
--

CREATE TABLE IF NOT EXISTS `coordinates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `coordinates`
--

INSERT INTO `coordinates` (`id`, `lat`, `lng`) VALUES
(3, 50.22788086350317, 23.613524436950684),
(4, 50.19712193146678, 23.761839866638184),
(5, 50.19712193146678, 23.761839866638184),
(6, 49.834993103935034, 24.013511538505554),
(7, 50.007739014636876, 20.64056396484375),
(8, -31.653381399663985, 140.0537109375),
(9, 325235, 3523535);

-- --------------------------------------------------------

--
-- Структура таблицы `poster`
--

CREATE TABLE IF NOT EXISTS `poster` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `animal_id` int(10) NOT NULL,
  `breed_id` int(10) NOT NULL,
  `description` varchar(400) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `coordinates_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`user_id`),
  KEY `kind_of_animal_id` (`animal_id`),
  KEY `kind_of_animal_id_2` (`animal_id`),
  KEY `kind_of_animal_id_3` (`animal_id`),
  KEY `kind_of_animal_id_4` (`animal_id`),
  KEY `kind_of_animal_id_5` (`animal_id`),
  KEY `breed_id` (`breed_id`),
  KEY `coordinates` (`coordinates_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=205 ;

--
-- Дамп данных таблицы `poster`
--

INSERT INTO `poster` (`id`, `title`, `name`, `animal_id`, `breed_id`, `description`, `address`, `date`, `user_id`, `is_active`, `coordinates_id`) VALUES
(198, 'Собака', 'Тайсон', 30, 158, 'Пропав собака, дуже добрий, має кличку тайс.', 'Львів', 1483375280, 193, 0, 3),
(199, 'Хомяк джунгарський', 'Хомяк', 33, 195, 'Дуже цікава,не вибаглива та кумедна тваринка.', 'вулиця Олександра Пушкіна, 9, Рава-Руська, Львівська область, Україна, 80316', 1483379090, 189, 1, 4),
(200, 'Домашняя коза', 'Ляля', 34, 200, 'Коза — одно из первых прирученных животных.', 'Львів', 1483379218, 189, 0, 5),
(201, 'Собака ротвейлер', 'Борман', 30, 146, 'Німецьке місто Ротвайль, що лежить у передгір''ях Альп, було відоме своїми ярмарками великої худоби. І череди худоби, які зганяли туди, завжди супроводжували сильні опецькуваті чорно-коричневі собаки, котрих почали називати ротвейлерами. Їхня праця була нелегкою — удень на перегоні вони стежили за порядком у череді, підганяли відсталих тварин, траплялося й таке, що приборкували розлючених биків.', 'вулиця Героїв Крут, Рава-Руська, Львівська область, Україна, 80316', 1483379393, 189, 1, 3),
(202, 'Великий собака', 'Біг', 30, 46, 'Бладхаунд любящая собака с хорошими манерами. Эта порода очень нежна и терпелива с детьми, порою даже слишком. Поэтому скорее придется защищать собаку от детей, чем наоборот. Не позволяйте детям причинять бладхаунду боль, так как он может это принимать, что плохо для собаки.', 'Львів', 1483526297, 189, 1, 5),
(203, 'Доберман дорослий собака', 'Чорний', 30, 80, 'Доберманы энергичные и насторо', 'вулиця Степана Бандери, 29-31, Львів, Львівська область, Україна', 1484053388, 189, 0, 6),
(204, 'івафіафвіа', 'фвіафівафів', 32, 184, 'івавфіафі', 'Львів', 1484053543, 189, 0, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `poster_foto`
--

CREATE TABLE IF NOT EXISTS `poster_foto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `animal_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Id_animal` (`animal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Дамп данных таблицы `poster_foto`
--

INSERT INTO `poster_foto` (`id`, `url`, `animal_id`) VALUES
(34, 'HHze/taksa-10.jpg', 198),
(35, '83fz/394177796_6_1000x700_homyak-dzhungarskiy-.jpg', 199),
(36, '6EkD/koza.jpg', 200),
(37, '84Yh/127978716882.jpg', 201),
(38, '84Yh/rotvejler_1.jpg', 201),
(39, 'FbsK/1262899041_blood.jpg', 202),
(40, 'FbsK/128748217266.jpg', 202),
(41, 'FbsK/Bloodhound_07-650x433.jpg', 202),
(42, '9nGE/doberman2.jpg', 203),
(43, '9nGE/Собака-доберман-фото.jpg', 203),
(44, 'fdbz/$_1.JPG', 204);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `numberPhone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=195 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `name`, `numberPhone`) VALUES
(189, 's.ivanjura@gmail.com', 'slavko89', '81dc9bdb52d04dc20036dbd8313ed055', 'Slavko89', ''),
(190, 'test@i.ua1', 'tut282', '81dc9bdb52d04dc20036dbd8313ed055', 'Slavko89', '+380983547704'),
(192, 'roman@ukr.net', 'roman1989', 'b179a9ec0777eae19382c14319872e1b', 'Роман', '+380983667705'),
(193, 'myshoproom@ukr.net', 'test100', 'f5f97c92ae39d49a4fa87d97eb3d89ff', 'Test100', '+380983547703'),
(194, 'test@i.ua', 'test200', 'a0fce90325b0b93f6bb828527c6dc2fd', 'test200', '+380983667702');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `animal_breed`
--
ALTER TABLE `animal_breed`
  ADD CONSTRAINT `animal_breed_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`);

--
-- Ограничения внешнего ключа таблицы `poster`
--
ALTER TABLE `poster`
  ADD CONSTRAINT `poster_ibfk_3` FOREIGN KEY (`breed_id`) REFERENCES `animal_breed` (`id`),
  ADD CONSTRAINT `poster_ibfk_4` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `poster_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `poster_ibfk_6` FOREIGN KEY (`coordinates_id`) REFERENCES `coordinates` (`id`);

--
-- Ограничения внешнего ключа таблицы `poster_foto`
--
ALTER TABLE `poster_foto`
  ADD CONSTRAINT `poster_foto_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `poster` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
