-- Adminer 4.7.9 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `cani`;
CREATE TABLE `cani` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(128) DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `cani` (`id`, `nome`, `data_nascita`) VALUES
(11,	'Bob',	'2025-01-15');

DROP TABLE IF EXISTS `pagine`;
CREATE TABLE `pagine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` char(255) DEFAULT NULL,
  `template` char(255) DEFAULT NULL,
  `include` char(255) DEFAULT NULL,
  `contenuto` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `pagine` (`id`, `url`, `template`, `include`, `contenuto`) VALUES
(1,	'lista-persone',	'persone.twig',	NULL,	'{\r\n\"titolo\": \"lista persone\",\r\n\"h1\": \"lista persone\",\r\n\"menu\": []\r\n}'),
(2,	'lista-cani',	'cani.twig',	NULL,	'{\r\n\"titolo\": \"lista cani\",\r\n\"h1\": \"lista cani\"\r\n}'),
(3,	'lista-pagine',	'pagine.twig',	NULL,	'{\r\n\"titolo\": \"lista pagine\",\r\n\"h1\": \"lista pagine\"\r\n}');

DROP TABLE IF EXISTS `pagine_include`;
CREATE TABLE `pagine_include` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pagina` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `pagine_include` (`id`, `id_pagina`, `path`) VALUES
(1,	2,	'mod/cani.php'),
(2,	2,	'cnt/cani.php');

DROP TABLE IF EXISTS `persone`;
CREATE TABLE `persone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(128) DEFAULT NULL,
  `numero` char(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `persone` (`id`, `nome`, `numero`) VALUES
(1,	'Luca',	'123456789'),
(3,	'Lara',	'111456789'),
(7,	'Mario',	'233456789');

-- 2025-09-15 08:00:01