-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Haz 2021, 12:44:43
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mestmedia`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `uniq` text NOT NULL,
  `content` text NOT NULL,
  `date` text NOT NULL,
  `ip` text NOT NULL,
  `sef_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `username`, `uniq`, `content`, `date`, `ip`, `sef_id`) VALUES
(9, 'mestoness', 'eb87657395f45e331e3603f83437f8b7bb2b7b60', 'afadfadf', '13:17 | 16.06.2021', '', '109'),
(10, 'mestoness', 'd3a9891eb0d6106d7bccf7c534138940711c21bb', 'As', '13:26 | 16.06.2021', '', '112'),
(11, 'mestoness', '343f3f2c057583ed22cc07c46c993687c75e55e1', '&quot;Sonuna kadar Cumhuriyete bağlı kaldılar ama en sonunda büyük tehlikeleri göze alamayacak kadar şaşkın ve korkaktılar. Oysa Cumhuriyeti ancak büyük tehlikeleri göze alabilenler koruyabilirlerdi.&quot;', '15:31 | 16.06.2021', '', '113'),
(12, 'mestoness', '343f3f2c057583ed22cc07c46c993687c75e55e1', 'Güzel profil beğendim', '16:04 | 16.06.2021', '', '113');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `owner` text COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `uniq` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `post`
--

INSERT INTO `post` (`id`, `content`, `owner`, `ip`, `date`, `uniq`) VALUES
(113, 'Alta GitHub linkimi bırakıyorum&lt;br&gt;&lt;a href=&quot;https://github.com/mestoness&quot; target=&quot;_blank&quot;&gt;https://github.com/mestoness&lt;/a&gt;&lt;br&gt;', 'mestoness', '', '13:27 | 16.06.2021', '343f3f2c057583ed22cc07c46c993687c75e55e1'),
(114, '&quot;Sonuna kadar Cumhuriyete bağlı kaldılar ama en sonunda büyük tehlikeleri göze alamayacak kadar şaşkın ve korkaktılar. Oysa Cumhuriyeti ancak büyük tehlikeleri göze alabilenler koruyabilirlerdi.&quot;', 'mestoness', '', '15:10 | 16.06.2021', '2bbf645a82fcf3099a39b1c64317d806da98393f'),
(115, 'Merhaba mestHub :)', 'mestoness', '', '16:41 | 16.06.2021', 'b1561bf52ce48db7a1b0aa2888ec67b3ecb296dc'),
(116, 'bu bir test yazısıdır ben ismail', 'ismail', '', '09:46 | 17.06.2021', 'aa07fb2b7a202ed2597257477811d5fa098ec728');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `date` text NOT NULL,
  `ip` varchar(50) NOT NULL,
  `followed` longtext NOT NULL,
  `followers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`, `ip`, `followed`, `followers`) VALUES
(1, 'mestoness', 'merhaba1834', '', '', '', ''),
(2, 'ismail', 'merhaba1834', '', '', '', ''),
(3, 'mest', 'merhaba1834', '', '', '', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;