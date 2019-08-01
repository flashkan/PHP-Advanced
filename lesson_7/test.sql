-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Авг 01 2019 г., 03:06
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `good_price` varchar(45) NOT NULL,
  `good_quantity` varchar(45) NOT NULL,
  `good_name` varchar(45) NOT NULL,
  `good_description` varchar(145) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `good_price`, `good_quantity`, `good_name`, `good_description`) VALUES
(2, 4, '40000', '1', 'Notebook', 'good notebook'),
(9, 4, '500', '1', 'Book', 'good book');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `good_name` varchar(45) NOT NULL,
  `good_description` varchar(45) DEFAULT NULL,
  `good_price` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `good_name`, `good_description`, `good_price`) VALUES
(2, 'Notebook', 'good notebook', '40000'),
(3, 'Mouse', 'good mouse', '5000'),
(9, 'Book', 'good book', '500'),
(10, 'Sweep', 'good sweep', '50'),
(11, 'Chair', 'good chair', '2000'),
(12, 'Lamp', 'good lamp', '1000');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_phone` varchar(45) NOT NULL,
  `user_address` varchar(45) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_data` varchar(45) NOT NULL,
  `order_status` varchar(45) NOT NULL,
  `order_json` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `user_phone`, `user_address`, `total_price`, `order_data`, `order_status`, `order_json`) VALUES
(1, 4, '123@123', '960111', '123123123', 55550, 'August 1, 2019, 1:58', 'Обрабатывается', '[{\"id\":\"2\",\"user_id\":\"4\",\"good_price\":\"40000\",\"good_quantity\":\"1\",\"good_name\":\"Notebook\",\"good_description\":\"good notebook\"},{\"id\":\"3\",\"user_id\":\"4\",\"good_price\":\"5000\",\"good_quantity\":\"3\",\"good_name\":\"Mouse\",\"good_description\":\"good mouse\"},{\"id\":\"9\",\"user_id\":\"4\",\"good_price\":\"500\",\"good_quantity\":\"1\",\"good_name\":\"Book\",\"good_description\":\"good book\"},{\"id\":\"10\",\"user_id\":\"4\",\"good_price\":\"50\",\"good_quantity\":\"1\",\"good_name\":\"Sweep\",\"good_description\":\"good sweep\"}]'),
(2, 4, '123@123', '(960)111-12-12', 'Strana Gorod Ulica', 55550, 'August 1, 2019, 2:36', 'Обрабатывается', '[{\"id\":\"2\",\"user_id\":\"4\",\"good_price\":\"40000\",\"good_quantity\":\"1\",\"good_name\":\"Notebook\",\"good_description\":\"good notebook\"},{\"id\":\"3\",\"user_id\":\"4\",\"good_price\":\"5000\",\"good_quantity\":\"3\",\"good_name\":\"Mouse\",\"good_description\":\"good mouse\"},{\"id\":\"9\",\"user_id\":\"4\",\"good_price\":\"500\",\"good_quantity\":\"1\",\"good_name\":\"Book\",\"good_description\":\"good book\"},{\"id\":\"10\",\"user_id\":\"4\",\"good_price\":\"50\",\"good_quantity\":\"1\",\"good_name\":\"Sweep\",\"good_description\":\"good sweep\"}]'),
(3, 4, '123@123', '960111', '123123123123123123123123sdfadfafasdffasdfasfa', 55550, 'August 1, 2019, 2:38', 'Обрабатывается', '[{\"id\":\"2\",\"user_id\":\"4\",\"good_price\":\"40000\",\"good_quantity\":\"1\",\"good_name\":\"Notebook\",\"good_description\":\"good notebook\"},{\"id\":\"3\",\"user_id\":\"4\",\"good_price\":\"5000\",\"good_quantity\":\"3\",\"good_name\":\"Mouse\",\"good_description\":\"good mouse\"},{\"id\":\"9\",\"user_id\":\"4\",\"good_price\":\"500\",\"good_quantity\":\"1\",\"good_name\":\"Book\",\"good_description\":\"good book\"},{\"id\":\"10\",\"user_id\":\"4\",\"good_price\":\"50\",\"good_quantity\":\"1\",\"good_name\":\"Sweep\",\"good_description\":\"good sweep\"}]'),
(4, 8, '123@123', '123123', 'Strana Gorod Ulica', 45500, 'August 1, 2019, 2:55', 'Обрабатывается', '[{\"id\":\"2\",\"user_id\":\"8\",\"good_price\":\"40000\",\"good_quantity\":\"1\",\"good_name\":\"Notebook\",\"good_description\":\"good notebook\"},{\"id\":\"3\",\"user_id\":\"8\",\"good_price\":\"5000\",\"good_quantity\":\"1\",\"good_name\":\"Mouse\",\"good_description\":\"good mouse\"},{\"id\":\"9\",\"user_id\":\"8\",\"good_price\":\"500\",\"good_quantity\":\"1\",\"good_name\":\"Book\",\"good_description\":\"good book\"}]');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_login` varchar(45) NOT NULL,
  `user_pass` varchar(70) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_phone` varchar(45) NOT NULL,
  `user_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_login`, `user_pass`, `user_email`, `user_phone`, `user_admin`) VALUES
(3, '111', 'admin', '333', '321@312', '960111', 0),
(4, 'John', 'user', '111', '123@123', '960111', 0),
(8, 'name', 'user1', '123', '123@123', '123123', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`,`user_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
