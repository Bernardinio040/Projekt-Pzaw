SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contents` text COLLATE utf8_polish_ci NOT NULL,
  `photos_id` int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exposure_time` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `iris` double NOT NULL,
  `iso` int(11) NOT NULL,
  `focal_length` smallint(6) NOT NULL,
  `datetime` datetime NOT NULL,
  `photos_id` int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `content_type` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `album_id` int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
