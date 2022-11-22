-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 22 2022 г., 18:09
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ecommerce`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `anons` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(50) NOT NULL,
  `price` int(5) UNSIGNED NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `anons`, `text`, `img`, `price`, `category`) VALUES
(1, 'Крутые мужские часы 01', 'Отличные часы для настоящих мужчин. Они подчеркнут вашу брутальность и все девушки будут ваши. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'watch01.jpg', 200, 'watches'),
(2, 'Крутые мужские часы 02', 'Отличные часы для настоящих мужчин. Они подчеркнут вашу брутальность и все девушки будут ваши. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'watch02.jpg', 300, 'watches'),
(3, 'Крутые мужские часы 03', 'Отличные часы для настоящих мужчин. Они подчеркнут вашу брутальность и все девушки будут ваши. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'watch03.jpg', 400, 'watches'),
(4, 'Крутые мужские часы 04', 'Отличные часы для настоящих мужчин. Они подчеркнут вашу брутальность и все девушки будут ваши. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'watch04.jpg', 500, 'watches'),
(5, 'Крутые мужские часы 05', 'Отличные часы для настоящих мужчин. Они подчеркнут вашу брутальность и все девушки будут ваши. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'watch05.jpg', 500, 'watches'),
(6, 'Крутые мужские часы 06', 'Отличные часы для настоящих мужчин. Они подчеркнут вашу брутальность и все девушки будут ваши. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'watch06.jpg', 600, 'watches'),
(7, 'Супер кепка 01', 'Классический снэпбек в универсальных расцветках для практичных летних образов.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'cap01.jpg', 200, 'hats'),
(8, 'Супер кепка 02', 'Защитит голову от солнца, добавит стиля Вашему образу и обеспечит отличную посадку.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'cap02.jpg', 300, 'hats'),
(9, 'Супер кепка 03', 'Классическая кепка с объемным вышитым логотипом бренда 69SLAM или козырьком с принтом.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'cap03.jpg', 400, 'hats'),
(10, 'Модная футболка 01', 'Классическое лого, известное каждому уважающему себя скейтбордисту.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'tshirt01.jpg', 200, 'tshirts'),
(11, 'Модная футболка 02', 'Классическое лого, известное каждому уважающему себя скейтбордисту.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'tshirt02.jpg', 300, 'tshirts'),
(12, 'Модная футболка 03', 'Плотная и надежная футболка с коротким рукавом и круглым вырезом.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'tshirt03.jpg', 400, 'tshirts'),
(13, 'Крепкие ботинки 01', 'Стильная мужская футболка с логотипом Thrasher Magazine.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'shoes01.jpg', 200, 'shoes'),
(14, 'Крепкие ботинки 02', 'Классическое лого, известное каждому уважающему себя скейтбордисту.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'shoes02.jpg', 300, 'shoes'),
(15, 'Крепкие ботинки 03', 'Плотная и надежная футболка с коротким рукавом и круглым вырезом.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi alias nam veniam quos accusamus sit ipsum aperiam ut, nemo ad tempore ipsa soluta, iste in aliquid mollitia, id dolorum! Doloribus.', 'shoes03.jpg', 400, 'shoes');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
