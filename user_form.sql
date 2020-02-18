-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 18 2020 г., 20:12
-- Версия сервера: 5.6.41
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `user_form`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `about` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `email`, `about`, `file`) VALUES
(1, 'seoimp9d', '$2y$10$S69PdFc3ebp2ZWZS9ZpCSe6pPp.oMAd2aYUovaWJ9HGDDQa3dExiG', 'tooor.toy@yandex.ru', 'qwewqewqeqweqweqw', 'user_files/grid-row-hov.png'),
(2, 'GergeySevko', '$2y$10$3yiBDOjjbit6BxgWmp5JTuAO88gwg57pNvVDI0znMM9hugwu.9wBm', 'tooor.toy@yandex.ru', 'gramota', 'user_files/nature_mountain_eagle_fog_landscape_ultrahd_4k_wallpaper_3840x2160.jpg'),
(3, 'Gray Joy', '$2y$10$dLB3OeQc8Y7/rrW9TDREHesJbCNe.e7415x2sAD8tuS26o57Tayci', 'tooor.toy@yandex.ru', 'Gray JoyGray JoyGray JoyGray JoyGray Joy', 'user_files/nature_mountain_eagle_fog_landscape_ultrahd_4k_wallpaper_3840x2160.jpg'),
(4, 'Grebok land', '$2y$10$dJ.q86wgVu12Y18uJIeVFOcdkQODiT6eoqTYLrqqWAA6uA0/EIQMy', 'tooor.toy@yandex.ru', '', ''),
(5, 'seoimp9d1', '$2y$10$sDDxsjF.OJ7ywiOQH2K9hefMDjGu4C1MsjHEDmajIjIfCILSFMNRO', 'tooor.toy@yandex.ru', 'wew', 'user_files/nature_mountain_eagle_fog_landscape_ultrahd_4k_wallpaper_3840x2160.jpg'),
(6, 'seoimp9d11', '$2y$10$YtShfvcz4enxWClljttgsOMhDsdjaMHRxfGvnOSG5ywzaXrCE9ezK', 'tooor.toy@yandex.ru', 'wew', 'user_files/nature_mountain_eagle_fog_landscape_ultrahd_4k_wallpaper_3840x2160.jpg'),
(7, 'Gwqeqweq', '$2y$10$d8rGi5J.JpwfLy2AJhiAuex5H0biDNzuE/8k/3DgNhFYxdsvCjNgK', 'tooor.toy@yandex.ru', '', 'user_files/nature_mountain_eagle_fog_landscape_ultrahd_4k_wallpaper_3840x2160.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
