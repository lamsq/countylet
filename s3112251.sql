-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 25 2024 г., 00:51
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
-- Структура таблицы `advert`
--

CREATE TABLE `advert` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` int(20) NOT NULL,
  `text` varchar(550) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `description` varchar(1000) NOT NULL,
  `photos` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `owner_id` int(11) UNSIGNED NOT NULL,
  `mon_rent` int(15) NOT NULL,
  `eircode` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `length` int(10) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `taken_start` date DEFAULT NULL,
  `taken_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `property`
--

INSERT INTO `property` (`type`, `bedrooms`, `description`, `photos`, `property_id`, `owner_id`, `mon_rent`, `eircode`, `address`, `length`, `available`, `taken_start`, `taken_end`) VALUES
('apartment', 2, 'This charming beachfront property boasts breathtaking ocean views and direct access to a pristine sandy shore. Nestled within a quiet coastal community, this two-bedroom cottage is ideal for those seeking relaxation and seaside adventures. ', 'property/1/', 1, 5, 800, 'D07XT61', '43-53 Montpelier Hill, D110b, Stoneybatter', 5, 1, NULL, NULL),
('house', 4, 'Situated in the heart of a vibrant city, this sleek urban retreat offers modern comfort and convenience. Step into a stylish one-bedroom apartment with floor-to-ceiling windows showcasing city skyline views. ', 'property/2/', 2, 16, 600, 'D08TY89', 'Dublin, Center', 7, 1, NULL, NULL),
('apartment', 3, 'Escape to this secluded mountain hideaway nestled among towering pine trees. Located in a serene wilderness setting, this rustic cabin offers a true retreat from the hustle and bustle of everyday life. ', 'property/3/', 3, 16, 1200, 'D08TY45', 'Dublin, 15', 12, 1, NULL, NULL),
('house', 4, 'Step back in time at this beautifully restored historic home exuding timeless elegance. Located in a historic district, this grand property features exquisite architectural details, antique furnishings, and period décor. Wander through spacious rooms with high ceilings, ornate moldings, and original hardwood floors. The property includes multiple bedrooms, a formal dining room, and a charming garden for outdoor gatherings. Perfect for history enthusiasts and architecture aficionados, this historic residence offers a glimpse into the past while providing modern comforts. Enjoy the ambiance of a bygone era combined with the convenience of being close to local landmarks, museums, and fine dining establishments.', 'property/4/', 4, 16, 600, 'D08TY89', 'Dublin, Center', 3, 0, NULL, NULL),
('apartment', 3, 'Experience the tranquility of the countryside at this inviting country retreat. Surrounded by rolling hills and pastoral landscapes, this quaint farmhouse offers a peaceful escape from city life. Relax on the wraparound porch with panoramic views or explore the expansive gardens and orchards. Inside, the farmhouse features a cozy living room with a fireplace, a farmhouse kitchen with modern amenities, and comfortable bedrooms decorated in a charming country style. Ideal for families and nature lovers, this property invites you to unwind, savor farm-fresh produce, and enjoy outdoor activities like hiking, birdwatching, and stargazing. Immerse yourself in rural beauty and hospitality at this delightful country retreat.', 'property/5/', 5, 18, 1500, 'D08TY45', 'Dublin, 15, Smithfield', 5, 0, NULL, NULL),
('house', 4, 'Discover the joys of lakeside living at this inviting lakefront haven. Situated on the shores of a picturesque lake, this modern cabin offers stunning water views and direct access to water activities. Enjoy fishing off the private dock, kayaking on the lake, or simply relaxing on the waterfront deck. The interior boasts a bright and airy living space with large windows, a fully equipped kitchen, and comfortable sleeping quarters. Whether you\'re seeking a romantic getaway or a family vacation, this property provides a perfect blend of relaxation and adventure. Unwind with serene sunsets reflected on the water and create lasting memories at this charming lakefront retreat.', 'property/6/', 6, 5, 990, 'D08TY89', 'Dublin, Center, Rathmines', 11, 0, NULL, NULL),
('apartment', 3, 'Live in luxury at this sophisticated city skyline penthouse. Perched atop a high-rise building, this spacious penthouse offers panoramic views of the city skyline through floor-to-ceiling windows. Step onto the expansive terrace to enjoy al fresco dining with breathtaking urban vistas. Inside, the penthouse features a designer kitchen, an elegant living area, and luxurious bedrooms with plush furnishings. Perfect for discerning travelers and those seeking a lavish city experience, this property is conveniently located near upscale restaurants, galleries, and nightlife. Treat yourself to the ultimate urban retreat with unparalleled views and upscale amenities.', 'property/7/', 7, 18, 1900, 'D08TY45', 'Dublin 17, Abbey road', 7, 1, NULL, NULL),
('house', 3, ' Indulge in wine country living at this charming vineyard cottage surrounded by rolling vineyards. Located on a picturesque winery estate, this cottage offers a unique blend of rustic charm and modern comfort. Sip local wines on the private patio overlooking the vineyards, take leisurely walks through the estate\'s gardens, or tour nearby wineries. The interior features a cozy living area with a fireplace, a fully equipped kitchen, and a comfortable bedroom with vineyard views. Whether you\'re a wine enthusiast or simply seeking a peaceful getaway, this vineyard cottage promises a relaxing retreat immersed in wine country ambiance.', 'property/8/', 8, 5, 660, 'D08RY89', 'Dublin, Center, Rockwell street', 2, 1, NULL, NULL),
('house', 1, 'Embrace winter wonderland at this inviting ski chalet nestled in the mountains. Located near ski slopes and winter trails, this cozy chalet is perfect for snow enthusiasts. After a day on the slopes, return to this warm retreat featuring a stone fireplace, a spacious lounge area, and a hot tub with mountain views. The chalet offers a fully equipped kitchen for apres-ski meals and comfortable bedrooms designed for restful nights. Whether it\'s a family ski vacation or a romantic winter escape, this property combines alpine charm with modern amenities. Experience the magic of snow-covered landscapes and cozy evenings by the fire at this ski chalet paradise.', 'property/9/', 9, 4, 1450, 'D09TY60', 'Dublin, Circular road', 90, 1, NULL, NULL);

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
(21, ' tenant'),
(22, ' landlord'),
(23, ' tenant'),
(24, ' tenant');

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
(4, 'admin', '$2y$10$roAtRIi792TWUP9cpuB/1u/Iws5WhxJbzvcLK1Nb3o5v9XScEC.1S', 'admin@a.com', 'Test'),
(5, 'landlord', '$2y$10$uidOpBf4T/zt3/WYLYlzBuDcOMGAzOcj3ZuRJ7/PhlN1JllE62Q5C', 'landlord@a.com', 'Test'),
(6, 'tenant', '$2y$10$jY1kIm/30CtlfDVTRAI3uOkyKp1CmJPjfALnbVUoFUt4W5ic4d77C', 'tenant@a.com', 'Test'),
(15, 'awd', '$2y$10$nDX2QpUkbz3BfGfO7Z8UouJjfftYkDFlLPOpw07Wfu64Bv0VUJLDi', 'testreg@gg.gg', 'awd'),
(16, 'asf', '$2y$10$D1ux9xr4A5tsjz6geNiav.leHfUlBoQ63XIUqzFlsm4gK8LkLSmsa', 'test@ee.ee', 'WRF'),
(17, 'fif', '$2y$10$vDwh8FF63C502cOGlSVI7.CA4LHWl8HHHczZXraLKpA3NFiSotSHO', 'fif@teen.rr', 'teen'),
(18, 'newTen', '$2y$10$/LAHJemOI/MONUfNnufAL.nxd5siJBw1a7/4LFGISsFPJQbSg0xoO', 'ten@ant.tr', 'tennant'),
(19, 'adwd', '$2y$10$co4dCvuQyC6706p1W.VYvuPfKHEA/6636UqSbL1Sl6OeJFOuAq.QG', 'adn@a.com', 'awefefg'),
(20, 'sef', '$2y$10$FIc7LIJQirLt8boEDIzAnOrtBy/9vpgd7pUjGsSVDInc6oWCh/AsS', 'anawd@a.com', 'srfgertgh'),
(21, 'wefgwerg', '$2y$10$YG6OH0hYbX9XpHEpEZ0l9OFnRc2CRREON5evS3oSNKB7D0IL8AuGq', 'aawdawd@aawd.com', 'ergegherg'),
(22, 'newlandlord', '$2y$10$oPk5oBISTBq8eAHBBLYg6e3jQTZ2KowEWanw8OMT1P7ao3WnmZktG', 'newlord@a.com', 'lord'),
(23, 'newtenant', '$2y$10$vtIbdoChCKxRUpxo5ROape5klGI3Uo/6s0cVxY9Qu4245r.OlzIw6', 'newnant@tt.tu', 'tenten'),
(24, 'newtest', '$2y$10$5.2Sd4dOHthbEiAxJLcCKuJKS9gvEcxpqlTit1eevHVT5CxT2jxuy', 'newTest@tt.est', 'tetete');


INSERT INTO `contracts` (`tenant_id`, `property_id`, `fee`, `tenancy_length`, `start`, `end`, `paid`, `owed`, `contract`) VALUES
(6, 1, 1200, 4, '2026-04-30', '2028-05-30', 0, 1200, 'contract text: lorem'),
(6, 2, 3000, 5, '2024-04-24', '2028-09-24', 300, 2700, 'Terms and Conditions:  Term of Tenancy: This agree');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
