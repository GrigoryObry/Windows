-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 13 2017 г., 17:26
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todoivt`
--

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `is_auth` tinyint(4) NOT NULL DEFAULT '1',
  `href` varchar(255) NOT NULL DEFAULT '/task.php',
  `data_target` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `title`, `sort`, `active`, `is_auth`, `href`, `data_target`) VALUES
(1, 0, 'Главная', 100, 1, 0, '../', NULL),
(2, 0, 'Помощь', 200, 1, 0, '#', NULL),
(3, 0, 'Регистрация', 300, 1, 0, '#', '#modal_registration'),
(5, 0, 'Мои Заказы', 500, 1, 1, '/offers.php', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `building_type` varchar(255) NOT NULL,
  `wndtype` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `podokonnik` tinyint(4) NOT NULL,
  `otliv` tinyint(4) NOT NULL,
  `otkos` tinyint(4) NOT NULL,
  `setka` tinyint(4) NOT NULL,
  `width` int(255) NOT NULL,
  `height` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `offer`
--

INSERT INTO `offer` (`id`, `building_type`, `wndtype`, `price`, `podokonnik`, `otliv`, `otkos`, `setka`, `width`, `height`, `user_id`, `date_created`) VALUES
(1, 'Кирпичный', '9', 19072, 1, 0, 1, 1, 140, 120, 2, '2017-06-13'),
(2, 'Монолитный', '25', 41196, 1, 1, 1, 0, 200, 220, 2, '2017-06-13'),
(3, 'Коттедж', '31', 33448, 1, 0, 0, 1, 200, 160, 2, '2017-06-13'),
(4, 'Кирпичный', '29', 32104, 1, 0, 0, 1, 200, 160, 3, '2017-06-13'),
(5, 'Коттедж', '25', 37436, 1, 1, 0, 1, 200, 220, 1, '2017-06-13'),
(6, 'Кирпичный', '1', 11800, 1, 1, 0, 1, 100, 100, 1, '2017-06-13'),
(7, 'Кирпичный', '20', 31008, 0, 0, 1, 1, 210, 120, 1, '2017-06-13');

-- --------------------------------------------------------

--
-- Структура таблицы `scalelist`
--

CREATE TABLE `scalelist` (
  `type` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `scalelist`
--

INSERT INTO `scalelist` (`type`, `width`, `height`, `active`) VALUES
(1, 70, 120, 1),
(2, 140, 120, 1),
(3, 210, 120, 1),
(4, 200, 220, 1),
(5, 200, 160, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `selectt`
--

CREATE TABLE `selectt` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `selectt`
--

INSERT INTO `selectt` (`id`, `title`, `active`) VALUES
(1, 'Кирпичный', 1),
(2, 'Панельный', 1),
(3, 'Хрущевка', 1),
(4, 'Коттедж', 1),
(5, 'Монолитный', 1),
(6, 'Сталинский', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(260) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'john Green', 'john@green.com', '$2y$10$.OkEcaIMN67iHflliL5zHuYkFwrAw9zI9ekrcsoImFm836N/hgBYK'),
(2, 'grisha', 'grisha@mail.ru', '$2y$10$ChCCFjlPAXifcLjzCBskm.DQI./7iralZLqKX20xLyamSQMHoL5xe'),
(3, 'green john', 'green@green.com', '$2y$10$rzWjmw.xVe6EeCqvrC84.uXlBbcjensopzLHelewApmNYzaTemoDG'),
(4, 'pipka', 'pipka@mail.tv', '$2y$10$Hdjp/zbXQ7gdCc3t7WwiueeP4TZCuY6ZOPHdWQUr/zpVuIWXG3Ly2');

-- --------------------------------------------------------

--
-- Структура таблицы `windows`
--

CREATE TABLE `windows` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `windows`
--

INSERT INTO `windows` (`id`, `type`, `active`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 2, 1),
(8, 2, 1),
(9, 2, 1),
(10, 2, 1),
(11, 2, 1),
(12, 2, 1),
(13, 2, 1),
(14, 2, 1),
(15, 2, 1),
(16, 3, 1),
(17, 3, 1),
(18, 3, 1),
(19, 3, 1),
(20, 3, 1),
(21, 3, 1),
(22, 3, 1),
(23, 4, 1),
(24, 4, 1),
(25, 4, 1),
(26, 4, 1),
(27, 4, 1),
(28, 5, 1),
(29, 5, 1),
(30, 5, 1),
(31, 5, 1),
(32, 5, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `scalelist`
--
ALTER TABLE `scalelist`
  ADD PRIMARY KEY (`type`);

--
-- Индексы таблицы `selectt`
--
ALTER TABLE `selectt`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `windows`
--
ALTER TABLE `windows`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `scalelist`
--
ALTER TABLE `scalelist`
  MODIFY `type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `selectt`
--
ALTER TABLE `selectt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `windows`
--
ALTER TABLE `windows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
