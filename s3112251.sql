-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 23 2024 г., 03:29
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
-- База данных: `s3112251`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contracts`
--

CREATE TABLE `contracts` (
  `tenant_id` int(11) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `fee` int(50) NOT NULL,
  `tenancy_length` int(15) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `paid` int(30) NOT NULL,
  `owed` int(30) NOT NULL,
  `contract` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `inventory`
--

CREATE TABLE `inventory` (
  `inventory_type` varchar(25) NOT NULL,
  `id` int(11) NOT NULL,
  `model_num` varchar(25) NOT NULL,
  `serial_num` varchar(25) NOT NULL,
  `warranty_due` date NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `property`
--

CREATE TABLE `property` (
  `type` varchar(20) NOT NULL,
  `bedrooms` int(2) NOT NULL,
  `description` varchar(300) NOT NULL,
  `photos` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `owner_id` int(11) UNSIGNED NOT NULL,
  `mon_rent` int(15) NOT NULL,
  `eircode` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `property`
--

INSERT INTO `property` (`type`, `bedrooms`, `description`, `photos`, `property_id`, `owner_id`, `mon_rent`, `eircode`, `address`) VALUES
('apartment', 2, 'two-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text ', 'property/1/', 1, 5, 800, 'D07XT61', '43-53 Montpelier Hill, D110b, Stoneybatter'),
('house', 4, 'four-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text', 'property/2/', 2, 16, 600, 'D08TY89', 'Dublin, Center'),
('apartment', 3, 'THREE-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text two-bedroom apartment just for test long text', 'property/3/', 3, 16, 1200, 'D08TY45', 'Dublin, 15');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`user_id`, `user_role`) VALUES
(4, 'admin'),
(5, 'landlord'),
(6, 'tenant'),
(15, ' tenant'),
(16, ' landlord'),
(17, ' tenant'),
(18, ' tenant'),
(19, ' tenant'),
(20, ' tenant'),
(21, ' tenant');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `surname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `surname`) VALUES
(2, 'Kirill', '$2y$10$QvoMtotder8cEcLg0tyNteAWaihK2N2u4F6drEUSXT.tmQw/zsaZu', 'zumw@ro.ru', 'Test'),
(4, 'admin', '$2y$10$roAtRIi792TWUP9cpuB/1u/Iws5WhxJbzvcLK1Nb3o5v9XScEC.1S', 'admin@a.com', 'Test'),
(5, 'landlord', '$2y$10$uidOpBf4T/zt3/WYLYlzBuDcOMGAzOcj3ZuRJ7/PhlN1JllE62Q5C', 'landlord@a.com', 'Test'),
(6, 'tenant', '$2y$10$jY1kIm/30CtlfDVTRAI3uOkyKp1CmJPjfALnbVUoFUt4W5ic4d77C', 'tenant@a.com', 'Test'),
(7, 'regtest', '$2y$10$Y.x07RJ.NCX2U73admvIP..V3NqvjDvCcK/YAYx01QcHXZ0T9Jd52', 'reg@test.com', 'Test'),
(8, 'awefaefg', '$2y$10$.cEVvUl6cxNl0FOwwHpviO73I7MZTbrExGkErKSoKXQv4033Ff47q', 'asefse@rr', 'Test'),
(9, 'wrgerg', '$2y$10$HmNqPyfAJxe7MSgP.XfmP.KIghOfkso0Xros4HWX.lPN/0/3x7chS', 'test@test.ff', 'Test'),
(10, 'KIRILL', '$2y$10$37ffJdQsssqsGrGXZFA1NOTQaevnZFZcQZ3KOXKIgBX8W8hcb.9SC', 'lamsquirrel75@gmail.com', ''),
(11, 'KIRILL', '$2y$10$.P9Ui5NNKPTYmodUp.r3sejvPlyWBqRGUV.qH4Tl3WfMYiW.NOI6K', 'test@t.est', 'SMIRNOV'),
(12, 'ad', '$2y$10$MHY4pNRJSuKJ0ilUAkp3F.KrsBiZvySjg.TWhtxiOIadCd10rhXCi', 'test@rr.tt', 'awd'),
(13, 'test', '$2y$10$vF8gYbcfgXQZpvxUg82nsOPinYdbBvea78y3Yaf0RH8Li8h6JN.mW', 'testreg@reg.oo', 'reg'),
(14, 'asdad', '$2y$10$1Uk6zjCEutpekLL2gO8JK.4rJBTR/gtUeQOKoDjqjDiTgFGUozLm6', 'testreg@rr.rr', 'addc'),
(15, 'awd', '$2y$10$nDX2QpUkbz3BfGfO7Z8UouJjfftYkDFlLPOpw07Wfu64Bv0VUJLDi', 'testreg@gg.gg', 'awd'),
(16, 'asf', '$2y$10$D1ux9xr4A5tsjz6geNiav.leHfUlBoQ63XIUqzFlsm4gK8LkLSmsa', 'test@ee.ee', 'WRF'),
(17, 'fif', '$2y$10$vDwh8FF63C502cOGlSVI7.CA4LHWl8HHHczZXraLKpA3NFiSotSHO', 'fif@teen.rr', 'teen'),
(18, 'newTen', '$2y$10$/LAHJemOI/MONUfNnufAL.nxd5siJBw1a7/4LFGISsFPJQbSg0xoO', 'ten@ant.tr', 'tennant'),
(19, 'adwd', '$2y$10$co4dCvuQyC6706p1W.VYvuPfKHEA/6636UqSbL1Sl6OeJFOuAq.QG', 'adn@a.com', 'awefefg'),
(20, 'sef', '$2y$10$FIc7LIJQirLt8boEDIzAnOrtBy/9vpgd7pUjGsSVDInc6oWCh/AsS', 'anawd@a.com', 'srfgertgh'),
(21, 'wefgwerg', '$2y$10$YG6OH0hYbX9XpHEpEZ0l9OFnRc2CRREON5evS3oSNKB7D0IL8AuGq', 'aawdawd@aawd.com', 'ergegherg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contracts`
--
ALTER TABLE `contracts`
  ADD KEY `property_id` (`property_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Индексы таблицы `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Индексы таблицы `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
