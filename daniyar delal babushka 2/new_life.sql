-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 06 2024 г., 08:26
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `new_life`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `agree` tinyint(1) NOT NULL,
  `api_token` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `phone`, `password`, `agree`, `api_token`) VALUES
(1, '[imaya]', '[surname', '[imaya@.gmail.com]', '[123456]', '[12]', 0, '[0]'),
(2, '[value-2]', '[value-3]', '[value-4]', '8123456', '[value-6]', 0, '[value-8]'),
(3, 'eeeeeeeeeeee', 'eeeeeeeeeeeeee', 'wqweeee@mail.ru', '33333333333333333', '$2y$10$Rg8QjB1Y.xmMULevGqUlDONZUQ7Z6cLfAbaI9.Ozylz9.1uKpZfDm', 1, NULL),
(4, 'dsdfdsf', 'asadsadsadasdsadsa', 'qweqwe@dsfds.ru', '4444444444444', '$2y$10$c7aqLxZ7TYylCRpujiDjjOTrbgHLUsYOOlI8KpLdtJ4gl364eiOrC', 1, NULL),
(5, 'Данияр', 'St1nG', 'aituganow1@gmail.com', '123456', '$2y$10$Tfbq5Jp.YyaJLRLBEPNSBuxyrTMfRE.azrPEXy6HW9eemI/zZjo0a', 1, NULL),
(7, 'Данияр', 'St1nG', 'aituganow2@gmail.com', '3434534553', '$2y$10$hvunK1l/BnvWeUPvznv49..4eaXSgfurt1VpA8eiUX8.L4hTKoQJ6', 1, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
