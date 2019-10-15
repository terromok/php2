-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 15 2019 г., 09:12
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `login` text,
  `goods_price` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `summ_row` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `product_id`, `login`, `goods_price`, `quantity`, `summ_row`, `order_id`) VALUES
(142, 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'Guest', NULL, 3, 242, 51),
(143, 'kshan8o90ps6i667q6903r0auscilqsu', 2, 'Guest', NULL, 4, 48, 51),
(148, 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'admin', NULL, 3, 132, 52),
(149, 'kshan8o90ps6i667q6903r0auscilqsu', 2, 'admin', NULL, 4, 48, 52),
(150, 'kshan8o90ps6i667q6903r0auscilqsu', 3, 'admin', NULL, 3, 36, 52),
(151, 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'admin', NULL, 3, 66, 53),
(152, 'kshan8o90ps6i667q6903r0auscilqsu', 2, 'admin', NULL, 1, 12, 53);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `adres` text NOT NULL,
  `session_id` text NOT NULL,
  `status` int(11) NOT NULL,
  `status_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `email`, `adres`, `session_id`, `status`, `status_name`) VALUES
(32, 'Guest', '32323', '123@uru.ir', 'Москва', 'vcejl6917qq6f23okj3ugjtqcdpn4rgv', 1, 'Оплачен'),
(33, 'admin', '125478', 'ewewew@re.ru', 'Киров', 'vcejl6917qq6f23okj3ugjtqcdpn4rgv', 1, 'Оплачен'),
(34, 'terromok', '1234', 'qwqwq@wqwqw.re', 'Воркута', 'tjgfkqio27eflvlp2nj7vh2o3r5e2qd6', 1, 'Обработан'),
(35, 'admin', '1234', '123@uru.ir', 'Воркута', 'tjgfkqio27eflvlp2nj7vh2o3r5e2qd6', 1, 'Оплачен'),
(36, 'admin', '32323', 'qwqwq@wqwqw.re', 'dsddss', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(37, 'admin', '125478', 'ewewew@re.ru', 'Воркута', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(38, 'admin', '125478', 'ewewew@re.ru', 'Воркута', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(39, 'admin', '32323', 'ewewew@re.ru', 'Воркута', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(40, 'admin', '32323', 'ewewew@re.ru', 'Воркута', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(41, 'admin', '32323', 'ewewew@re.ru', 'Воркута', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(42, 'admin', '32323', 'ewewew@re.ru', 'Воркута', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(43, 'admin', '32323', 'ewewew@re.ru', 'Воркута', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(44, 'admin', '32323', 'ewewew@re.ru', 'Воркута', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(45, 'admin', '32323', 'ewewew@re.ru', 'dsddss', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(46, 'admin', '125478', 'ewewew@re.ru', 'dsddss', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(47, 'admin', '125478', 'ewewew@re.ru', 'dsddss', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(48, 'admin', '125478', 'ewewew@re.ru', 'dsddss', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(49, 'admin', '125478', 'ewewew@re.ru', 'dsddss', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(50, 'admin', '125478', 'ewewew@re.ru', 'dsddss', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(51, 'admin', '125478', 'qwqwq@wqwqw.re', 'Воркута', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(52, 'admin', '125478', 'ewewew@re.ru', 'dsddss', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(53, 'admin', '125478', 'ewewew@re.ru', 'Воркута', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен'),
(54, 'admin', '125478', 'ewewew@re.ru', 'Воркута', 'kshan8o90ps6i667q6903r0auscilqsu', 1, 'оформлен');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Пицца', 'С сыром, круглая.', 22),
(2, 'Пончик', 'Сладкий, с шоколадом.', 12),
(3, 'Шоколад', 'Белый', 12),
(4, 'Сникерс', 'Заморский', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`, `hash`) VALUES
(1, '', 'admin', '123', '8563273225d9dc4c7bae662.64522450'),
(2, '', 'user', '123', ''),
(3, 'Рома2', 'terromok', '123', '4525136505d9dd7bc878625.09453945'),
(4, 'ывавфывы', 'йцук', '123', NULL),
(5, '4256', 'ыы', '123', NULL),
(6, 'Вася', 'vasya', '123', '12892458845da4e0614f8167.68794393');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
