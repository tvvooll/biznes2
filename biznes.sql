-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2020 г., 20:09
-- Версия сервера: 8.0.12
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
-- База данных: `biznes`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `nazva` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `nazva`, `price`) VALUES
(1, 'Php', 200),
(2, '.Net', 150),
(3, 'Python', 500);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `name`, `surname`, `phone`) VALUES
(1, 'Vladisalv', 'Fisyak', 954314434),
(4, 'Vladislav', 'weqe', 954314434),
(5, 'ShengShou', 'wqe', 954314434),
(6, 'ShengShou', 'wqe', 954314434),
(7, 'ShengShou', 'wqe', 954314434);

-- --------------------------------------------------------

--
-- Структура таблицы `contrakt`
--

CREATE TABLE `contrakt` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `osvita` varchar(255) NOT NULL,
  `id_work` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `name`, `surname`, `age`, `phone`, `osvita`, `id_work`, `id_category`) VALUES
(1, 'Andry', 'Fisenko', 21, 953343454, 'Viska', 2, 2),
(3, 'Vladislav', 'Ostapov', 21, 953343454, 'Viska', 2, 1),
(4, 'Andrys', 'Prytulyak', 21, 953343454, 'Viska', 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `employee_project`
--

CREATE TABLE `employee_project` (
  `employee_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1592860610),
('m130524_201442_init', 1592860612),
('m190124_110200_add_verification_token_column_to_user_table', 1592860612),
('m200622_211659_create_work_table', 1592860918),
('m200622_211936_create_category_table', 1592860919),
('m200622_212249_create_employee_table', 1592861394),
('m200622_213015_create_zarplata_table', 1593003048),
('m200622_213033_create_weekend_table', 1592863299),
('m200622_213116_create_client_table', 1592863386),
('m200622_213129_create_project_table', 1593002818),
('m200622_213157_create_contrakt_table', 1593002820),
('m200624_104208_create_junction_table_for_employee_and_project_tables', 1593002822);

-- --------------------------------------------------------

--
-- Структура таблицы `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `project`
--

INSERT INTO `project` (`id`, `id_client`, `name`, `price`) VALUES
(1, 1, 'Bridal', 2000),
(2, 1, 'portfolio', 3000);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'Yaroslav', 'VQrDVXbm1JX_bazKJH86tbj8VIg8hxvO', '$2y$13$K3Vokj19BC2rDx.57VP.8utgkNQadWFU.seaw.conltS9GQKkUVBq', NULL, 'y.ferenets-243s19@stud.chnu.edu.ua', 10, 1592941794, 1592941794, 'fhQLMIVxuHf9-WsIA6ZT_xYjr9fV22dH_1592941794');

-- --------------------------------------------------------

--
-- Структура таблицы `weekend`
--

CREATE TABLE `weekend` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `weekend`
--

INSERT INTO `weekend` (`id`, `id_employee`, `start`, `end`) VALUES
(1, 1, '26.02.2020', '27.02.2020');

-- --------------------------------------------------------

--
-- Структура таблицы `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `nazva` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `work`
--

INSERT INTO `work` (`id`, `nazva`) VALUES
(1, 'Погодинна'),
(2, 'Контракт');

-- --------------------------------------------------------

--
-- Структура таблицы `zarplata`
--

CREATE TABLE `zarplata` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `hour` varchar(255) DEFAULT NULL,
  `suma` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zarplata`
--

INSERT INTO `zarplata` (`id`, `id_employee`, `id_category`, `id_project`, `hour`, `suma`) VALUES
(1, 3, 1, 1, '10', '2000'),
(4, 1, 2, 1, '10', '2000'),
(7, 4, 2, NULL, '10', '1500'),
(8, 3, 1, 1, '10', '2000'),
(9, 3, 1, 2, '4', '3000');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contrakt`
--
ALTER TABLE `contrakt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-contrakt-id_employee` (`id_employee`),
  ADD KEY `idx-contrakt-id_project` (`id_project`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-employee-id_work` (`id_work`),
  ADD KEY `idx-employee-id_category` (`id_category`);

--
-- Индексы таблицы `employee_project`
--
ALTER TABLE `employee_project`
  ADD PRIMARY KEY (`employee_id`,`project_id`),
  ADD KEY `idx-employee_project-employee_id` (`employee_id`),
  ADD KEY `idx-employee_project-project_id` (`project_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-project-id_client` (`id_client`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `weekend`
--
ALTER TABLE `weekend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-weekend-id_employee` (`id_employee`);

--
-- Индексы таблицы `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zarplata`
--
ALTER TABLE `zarplata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-zarplata-id_employee` (`id_employee`),
  ADD KEY `idx-zarplate-id_project` (`id_project`),
  ADD KEY `idx-zarplate-id_category` (`id_category`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `contrakt`
--
ALTER TABLE `contrakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `weekend`
--
ALTER TABLE `weekend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `zarplata`
--
ALTER TABLE `zarplata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `contrakt`
--
ALTER TABLE `contrakt`
  ADD CONSTRAINT `fk-contrakt-id_employee` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-contrakt-id_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk-employee-id_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-employee-id_work` FOREIGN KEY (`id_work`) REFERENCES `work` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `employee_project`
--
ALTER TABLE `employee_project`
  ADD CONSTRAINT `fk-employee_project-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-employee_project-project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk-project-id_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `weekend`
--
ALTER TABLE `weekend`
  ADD CONSTRAINT `fk-weekend-id_employee` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `zarplata`
--
ALTER TABLE `zarplata`
  ADD CONSTRAINT `fk-zarplata-id_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-zarplata-id_employee` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-zarplata-id_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
