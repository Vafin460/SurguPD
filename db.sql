-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 21 2026 г., 14:35
-- Версия сервера: 8.0.24
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `svita`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE `ads` (
  `adId` int NOT NULL COMMENT 'ID объявления, по нему также идёт сортировка ',
  `adUserId` int NOT NULL COMMENT 'ID пользователя, создавшего объявление',
  `adTitle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Название',
  `adText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Объявление',
  `adDate` date NOT NULL COMMENT 'Дата написания',
  `image_path` varchar(255) DEFAULT NULL COMMENT 'Путь к изображению',
  `wayToCommunicate` text NOT NULL COMMENT 'Здесь указывается способ связи с владельцем товара',
  `adAdress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Адрес'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`adId`, `adUserId`, `adTitle`, `adText`, `adDate`, `image_path`, `wayToCommunicate`, `adAdress`) VALUES
(15, 1, 'Продам дом', 'Значимость этих проблем настолько очевидна, что постоянное информационно-пропагандистское обеспечение нашей деятельности прекрасно подходит для реализации новых принципов формирования материально-технической и кадровой базы. Разнообразный и богатый опыт говорит нам, что начало повседневной работы по формированию позиции однозначно фиксирует необходимость приоретизации разума над эмоциями. Безусловно, синтетическое тестирование играет определяющее значение для прогресса профессионального сообщества. В целом, конечно, курс на социально-ориентированный национальный проект говорит о возможностях стандартных подходов.', '2026-03-21', 'img/1774085567_waterfox_wMyjrHfXoK.png', '8 800 555 35 35', 'г. Сургут, ул. Ленина 1'),
(16, 2, 'Продам гараж', 'Значимость этих проблем настолько очевидна, что постоянное информационно-пропагандистское обеспечение нашей деятельности прекрасно подходит для реализации новых принципов формирования материально-технической и кадровой базы. Разнообразный и богатый опыт говорит нам, что начало повседневной работы по формированию позиции однозначно фиксирует необходимость приоретизации разума над эмоциями. Безусловно, синтетическое тестирование играет определяющее значение для прогресса профессионального сообщества. В целом, конечно, курс на социально-ориентированный национальный проект говорит о возможностях стандартных подходов.', '2026-03-21', 'img/1774091866_waterfox_hpdaziP8yS.png', '8 800 555 35 35', 'г. Сургут, ул. Гаражная, гараж 435'),
(17, 3, 'Продам штаны', 'Значимость этих проблем настолько очевидна, что постоянное информационно-пропагандистское обеспечение нашей деятельности прекрасно подходит для реализации новых принципов формирования материально-технической и кадровой базы. Разнообразный и богатый опыт говорит нам, что начало повседневной работы по формированию позиции однозначно фиксирует необходимость приоретизации разума над эмоциями. Безусловно, синтетическое тестирование играет определяющее значение для прогресса профессионального сообщества. В целом, конечно, курс на социально-ориентированный национальный проект говорит о возможностях стандартных подходов.', '2026-03-21', 'img/1774092881_waterfox_VGv6Q35khj.png', '8 800 555 35 35', 'пгт. Пойковский, 2 мкр., 11 д.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Влад', '$2y$10$.cworD.eiJZ1g13mgT3T.eIkSuc5XakOs14CHnpVcLVUHWJcaIoDK'),
(2, 'Олег', '$2y$10$pUJtybLcVUqPgECTDM6a0Ot.ZdH3g0zhvFlES4xYILAoenB4Cpve.'),
(3, 'Сергей', '$2y$10$5lHeYQOqJ2i92NG.VDCkz..Kle8lrXM0E75W9cDu0y8A5KHlc4wU2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`adId`),
  ADD KEY `adUserId` (`adUserId`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ads`
--
ALTER TABLE `ads`
  MODIFY `adId` int NOT NULL AUTO_INCREMENT COMMENT 'ID объявления, по нему также идёт сортировка ', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`adUserId`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
