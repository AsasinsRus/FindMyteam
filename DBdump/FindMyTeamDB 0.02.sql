-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 13 2023 р., 22:54
-- Версія сервера: 8.0.30
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `FindMyTeamDB`
--

-- --------------------------------------------------------

--
-- Структура таблиці `addressee`
--

CREATE TABLE `addressee` (
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `friend`
--

CREATE TABLE `friend` (
  `friends_list_id` int NOT NULL,
  `friend_user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `friends_list`
--

CREATE TABLE `friends_list` (
  `id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `game`
--

CREATE TABLE `game` (
  `game_id` int NOT NULL,
  `name` varchar(350) NOT NULL,
  `genre` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `game_achievement`
--

CREATE TABLE `game_achievement` (
  `id` int NOT NULL,
  `game_id` int NOT NULL,
  `name` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `message`
--

CREATE TABLE `message` (
  `message_id` int NOT NULL,
  `theme` varchar(250) DEFAULT NULL,
  `message` varchar(1200) NOT NULL,
  `addressee_id` int DEFAULT NULL,
  `recipient_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `player_achievement`
--

CREATE TABLE `player_achievement` (
  `user_id` int NOT NULL,
  `achievement_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `recipient`
--

CREATE TABLE `recipient` (
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(355) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `role` varchar(32) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `role`) VALUES
(6, 'admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'admin'),
(10, 'manager', 'manager', 'manager@manager.com', '1d0258c2440a8d19e716292b231e3190', NULL, 'manager');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `addressee`
--
ALTER TABLE `addressee`
  ADD PRIMARY KEY (`user_id`);

--
-- Індекси таблиці `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`friends_list_id`),
  ADD KEY `friend_user_id` (`friend_user_id`);

--
-- Індекси таблиці `friends_list`
--
ALTER TABLE `friends_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Індекси таблиці `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Індекси таблиці `game_achievement`
--
ALTER TABLE `game_achievement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Індекси таблиці `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `addressee_id` (`addressee_id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Індекси таблиці `player_achievement`
--
ALTER TABLE `player_achievement`
  ADD PRIMARY KEY (`user_id`,`achievement_id`);

--
-- Індекси таблиці `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`user_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `friends_list`
--
ALTER TABLE `friends_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `game_achievement`
--
ALTER TABLE `game_achievement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `addressee`
--
ALTER TABLE `addressee`
  ADD CONSTRAINT `addressee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_ibfk_1` FOREIGN KEY (`friends_list_id`) REFERENCES `friends_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friend_ibfk_2` FOREIGN KEY (`friend_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `friends_list`
--
ALTER TABLE `friends_list`
  ADD CONSTRAINT `friends_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `game_achievement`
--
ALTER TABLE `game_achievement`
  ADD CONSTRAINT `game_achievement_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`addressee_id`) REFERENCES `addressee` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `recipient` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `player_achievement`
--
ALTER TABLE `player_achievement`
  ADD CONSTRAINT `player_achievement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `recipient`
--
ALTER TABLE `recipient`
  ADD CONSTRAINT `recipient_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
