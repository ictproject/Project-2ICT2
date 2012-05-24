-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 15 Mei 2012 om 22:46
-- Serverversie: 5.5.8
-- PHP-Versie: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `openpresentations`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  `share` enum('public','private') NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_group_user1` (`admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `share`, `admin`) VALUES
(1, 'groep', 'groep', 'public', 1),
(2, 'groep2', 'groep2', 'private', 1),
(3, 'groep3', 'groep3', 'public', 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `groups_has_presentations`
--

CREATE TABLE IF NOT EXISTS `groups_has_presentations` (
  `group_id` int(11) NOT NULL,
  `presentation_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`presentation_id`),
  KEY `fk_group_has_presentation_presentation1` (`presentation_id`),
  KEY `fk_group_has_presentation_group1` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `groups_has_presentations`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `presentations`
--

CREATE TABLE IF NOT EXISTS `presentations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `share` enum('public','group','private') NOT NULL,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_presentation_user` (`owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Gegevens worden uitgevoerd voor tabel `presentations`
--

INSERT INTO `presentations` (`id`, `name`, `share`, `owner`) VALUES
(2, 'test', 'public', 1),
(3, 'test', 'private', 1),
(4, 'test', 'private', 1),
(5, 'directory', 'private', 1),
(6, 'directory', 'private', 1),
(7, 'directory', 'private', 1),
(8, 'directory', 'private', 1),
(9, 'directory', 'private', 1),
(10, 'henriPres', 'public', 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `content` text,
  `image` varchar(100) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `template` enum('title','content','image','video') NOT NULL,
  `presentation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_slide_presentation1` (`presentation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Gegevens worden uitgevoerd voor tabel `slides`
--

INSERT INTO `slides` (`id`, `nr`, `title`, `content`, `image`, `video`, `template`, `presentation_id`) VALUES
(3, 0, 'title', 'TEST', NULL, NULL, 'title', 2),
(5, 0, 'content', 'werkt nie denk ik', NULL, NULL, 'title', 2),
(6, 0, 'test', '', NULL, NULL, 'title', 2),
(7, 1, 'test', '', NULL, NULL, 'title', 2),
(8, 1, 'img', NULL, NULL, NULL, 'title', 9),
(9, 2, 'img', NULL, NULL, NULL, 'title', 9),
(10, 3, 'img', NULL, NULL, NULL, 'title', 9),
(11, 4, 'img', NULL, 'files/users/Maxim/presentations/9.directory/slide_3/logo.png', NULL, 'title', 9),
(12, 5, 'test', NULL, 'files/users/Maxim/presentations/9.directory/slide_5/Poker_FaceCzyste.png', NULL, 'title', 9),
(13, 6, 'test', 'tester', NULL, NULL, 'title', 9),
(14, 1, 'test', '', NULL, NULL, 'title', 10),
(15, 2, 'test', '', NULL, NULL, 'title', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `profile_picture` varchar(100) DEFAULT NULL,
  `member_since` date NOT NULL,
  `email` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `name`, `profile_picture`, `member_since`, `email`) VALUES
(1, 'Maxim', 'test', 'Maxim', 'Maes', 'default.png', '2012-05-09', 'maximmaes91@gmail.com'),
(8, 'henri', 'df57288504bda92cf502c958065f8509', '', '', 'default.png', '2012-05-12', 'george.henri12@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users_has_groups`
--

CREATE TABLE IF NOT EXISTS `users_has_groups` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `fk_user_has_group_group1` (`group_id`),
  KEY `fk_user_has_group_user1` (`user_id`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `users_has_groups`
--

INSERT INTO `users_has_groups` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `fk_group_user1` FOREIGN KEY (`admin`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `groups_has_presentations`
--
ALTER TABLE `groups_has_presentations`
  ADD CONSTRAINT `fk_group_has_presentation_group1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_group_has_presentation_presentation1` FOREIGN KEY (`presentation_id`) REFERENCES `presentations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `presentations`
--
ALTER TABLE `presentations`
  ADD CONSTRAINT `fk_presentation_user` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `fk_slide_presentation1` FOREIGN KEY (`presentation_id`) REFERENCES `presentations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `users_has_groups`
--
ALTER TABLE `users_has_groups`
  ADD CONSTRAINT `fk_user_has_group_group1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_has_group_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
