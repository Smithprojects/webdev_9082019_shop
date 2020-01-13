-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 13 2020 г., 11:08
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webdev_9082019_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`) VALUES
(1, 'Мужчинам'),
(2, 'Женщинам'),
(3, 'Детям');

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs_products`
--

CREATE TABLE `catalogs_products` (
  `id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(255) NOT NULL,
  `size_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalogs_products`
--

INSERT INTO `catalogs_products` (`id`, `catalog_id`, `product_id`, `category_id`, `size_id`) VALUES
(1, 1, 1, 0, 0),
(2, 1, 2, 0, 0),
(3, 1, 3, 0, 0),
(4, 2, 4, 0, 0),
(5, 1, 5, 0, 0),
(6, 3, 6, 0, 0),
(7, 1, 7, 0, 0),
(8, 1, 8, 0, 0),
(9, 1, 9, 0, 0),
(10, 1, 10, 0, 0),
(11, 1, 11, 0, 0),
(12, 1, 12, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'одежда'),
(2, 'обувь'),
(3, 'сумки'),
(4, 'аксесуары');

-- --------------------------------------------------------

--
-- Структура таблицы `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `managers`
--

INSERT INTO `managers` (`id`, `fio`, `phone`, `email`, `password`) VALUES
(1, 'Антон', '+7 (906) 066-59', 'anton290@rambler.ru', 'shSVw/ZRPc3ec');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `text` text NOT NULL,
  `sku` varchar(255) NOT NULL,
  `category` text NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `pic`, `price`, `text`, `sku`, `category`, `size`) VALUES
(1, 'Синяя куртка', '/images/catalog/1.jpg', 5400, 'Синяя куртка - описание', '324sdfkj343', '1', 'S'),
(2, 'Серая куртка', '/images/catalog/2.jpg', 4890, 'Серая куртка - описание', '9898dkjf934', '1', 'S'),
(3, 'Кожанка', '/images/catalog/6.jpg', 11900, 'Кожанка - описание', '234234kkk3', '1', 'M'),
(4, 'Женские кеды', '/images/catalog/7.jpg', 4900, 'Женские кеды - описание', '99dd99df2', '2', ''),
(5, 'Куртка мужская', '/images/catalog/3.png', 5500, 'Куртка мужская - описание', '', '1', 'M'),
(6, 'Куртка мужская кожаная', '/images/catalog/4.jpg', 9500, 'Куртка мужская кожа - описание', '', '1', 'L'),
(7, 'Куртка мужская', '/images/catalog/5.jpg', 3999, 'Куртка мужская - описание', '', '1', 'L'),
(8, 'Кеды мужские', '/images/catalog/8.jpg', 4499, 'Кеды мужские - описание', '', '2', ''),
(9, 'Кеды мужские', '/images/catalog/9.jpg', 4499, 'Кеды мужские - описание', '', '2', ''),
(10, 'Кеды мужские', '/images/catalog/10.jpg', 5499, 'Кеды мужские - описание', '', '2', ''),
(11, 'Джинсы мужские', '/images/catalog/11.jpg', 2499, 'Джинсы мужские - описание', '', '1', ''),
(12, 'Джинсы мужские', '/images/catalog/12.jpg', 3499, 'Джинсы мужские - описание', '', '1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `size`
--

CREATE TABLE `size` (
  `id` int(255) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalogs_products`
--
ALTER TABLE `catalogs_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `catalogs_products`
--
ALTER TABLE `catalogs_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `size`
--
ALTER TABLE `size`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
