-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2013 at 12:54 PM
-- Server version: 5.0.51
-- PHP Version: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `WebDiP2012_013`
--

-- --------------------------------------------------------

--
-- Table structure for table `akcije`
--

CREATE TABLE IF NOT EXISTS `akcije` (
  `id` int(11) NOT NULL auto_increment,
  `id_ponude` int(11) NOT NULL,
  `popust` int(11) NOT NULL,
  `datum_pocetka` datetime NOT NULL,
  `datum_zavrsetka` datetime NOT NULL,
  `granica` int(11) NOT NULL,
  `istaknuto` tinyint(4) default '0' COMMENT '0 ne\n1 da',
  `aktivan` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `fk_akcije_1` (`id_ponude`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gradovi`
--

CREATE TABLE IF NOT EXISTS `gradovi` (
  `id` int(11) NOT NULL auto_increment,
  `ime` varchar(45) NOT NULL,
  `aktivan` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gradovi_akcije`
--

CREATE TABLE IF NOT EXISTS `gradovi_akcije` (
  `id` int(11) NOT NULL auto_increment,
  `id_grada` int(11) NOT NULL,
  `id_akcije` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_gradovi_akcije_1` (`id_grada`),
  KEY `fk_gradovi_akcije_2` (`id_akcije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
  `id` int(11) NOT NULL auto_increment,
  `naziv` varchar(45) NOT NULL,
  `aktivan` tinyint(4) NOT NULL default '1' COMMENT '0 neaktivna1 aktivna',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL auto_increment,
  `id_korisnika` int(11) NOT NULL,
  `id_ponude` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `ocjena` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `aktivan` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `fk_komentari_1` (`id_korisnika`),
  KEY `fk_komentari_2` (`id_ponude`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL auto_increment,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `pbr` varchar(5) NOT NULL,
  `mjesto` varchar(45) NOT NULL,
  `telefon` varchar(20) default NULL,
  `email` varchar(45) NOT NULL,
  `oib` varchar(11) NOT NULL,
  `open_id` mediumint(9) default '0' COMMENT '0 - normalno\n1- facebook\n2 - google',
  `deaktiviran` tinyint(4) default '0' COMMENT '0 aktiviran\n1 deaktiviran',
  `zamrznut` datetime default NULL COMMENT 'Datum do kojeg je aktiviran',
  `datum_registracije` datetime default NULL,
  `email_potvrda` varchar(45) default NULL,
  `password` varchar(45) NOT NULL,
  `ovlasti` mediumint(9) NOT NULL COMMENT '1 reg_user\n2 mod\n3 admin',
  `aktivan` tinyint(4) NOT NULL default '1' COMMENT '0-ne; 1-da',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kosarica`
--

CREATE TABLE IF NOT EXISTS `kosarica` (
  `id` int(11) NOT NULL auto_increment,
  `id_korisnika` int(11) NOT NULL,
  `id_akcije` int(11) NOT NULL,
  `operacija` mediumint(9) NOT NULL default '1' COMMENT '1dodano; 2 kupljeno',
  `datum` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_kosarica_1` (`id_korisnika`),
  KEY `fk_kosarica_2` (`id_akcije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logovi`
--

CREATE TABLE IF NOT EXISTS `logovi` (
  `id` int(11) NOT NULL auto_increment,
  `id_korisnika` int(11) NOT NULL,
  `id_tip` int(11) NOT NULL COMMENT 'tip zapisa',
  `kljuc` varchar(10) NOT NULL,
  `datum` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_logovi_1` (`id_korisnika`),
  KEY `fk_logovi_2` (`id_tip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_tip`
--

CREATE TABLE IF NOT EXISTS `log_tip` (
  `id` int(11) NOT NULL auto_increment,
  `opis` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `moderatori`
--

CREATE TABLE IF NOT EXISTS `moderatori` (
  `id` int(11) NOT NULL auto_increment,
  `id_korisnika` int(11) NOT NULL,
  `id_kategorije` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_moderatori_1` (`id_korisnika`),
  KEY `fk_moderatori_2` (`id_kategorije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL auto_increment,
  `id_korisnika` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kategorija` int(11) NOT NULL,
  `aktivan` tinyint(4) NOT NULL COMMENT '0 neaktivan\n1 aktivan',
  PRIMARY KEY  (`id`),
  KEY `fk_newsletter_1` (`id_korisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `opomene`
--

CREATE TABLE IF NOT EXISTS `opomene` (
  `id` int(11) NOT NULL auto_increment,
  `id_korisnika` int(11) NOT NULL,
  `id_moderatora` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `opis` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_opomene_1` (`id_korisnika`),
  KEY `fk_opomene_2` (`id_moderatora`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ponude`
--

CREATE TABLE IF NOT EXISTS `ponude` (
  `id` int(11) NOT NULL auto_increment,
  `id_prodavatelja` int(11) NOT NULL,
  `id_kategorije` int(11) NOT NULL,
  `naslov` text NOT NULL,
  `podnaslov` text NOT NULL,
  `cijena` float NOT NULL,
  `opis_naslov` text NOT NULL,
  `opis_kratki` text NOT NULL,
  `opis` text NOT NULL,
  `napomena` text NOT NULL,
  `karta_x` varchar(45) default NULL,
  `karta_y` varchar(45) default NULL,
  `aktivan` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `fk_ponude_1` (`id_prodavatelja`),
  KEY `fk_ponude_2` (`id_kategorije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prodavatelji`
--

CREATE TABLE IF NOT EXISTS `prodavatelji` (
  `id` int(11) NOT NULL auto_increment,
  `id_korisnika` int(11) NOT NULL COMMENT 'korisnik koji je zaduzen za to poduc+zece',
  `naziv` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `kontakt` varchar(15) NOT NULL,
  `info` varchar(45) NOT NULL,
  `oib` varchar(45) NOT NULL,
  `aktivan` tinyint(4) NOT NULL COMMENT '0 neaktivan\n1 aktivan',
  PRIMARY KEY  (`id`),
  KEY `fk_prodavatelji_1` (`id_korisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `racuni`
--

CREATE TABLE IF NOT EXISTS `racuni` (
  `id` int(11) NOT NULL auto_increment,
  `id_korisnika` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `placeno` tinyint(4) NOT NULL COMMENT '0 ne\n1 da',
  PRIMARY KEY  (`id`),
  KEY `fk_racuni_1` (`id_korisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `racuni_akcije`
--

CREATE TABLE IF NOT EXISTS `racuni_akcije` (
  `id` int(11) NOT NULL auto_increment,
  `id_racuna` int(11) NOT NULL,
  `id_akcije` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_racuni_akcije_1` (`id_racuna`),
  KEY `fk_racuni_akcije_2` (`id_akcije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vrijeme`
--

CREATE TABLE IF NOT EXISTS `vrijeme` (
  `id` int(11) NOT NULL auto_increment,
  `pomak` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akcije`
--
ALTER TABLE `akcije`
  ADD CONSTRAINT `fk_akcije_1` FOREIGN KEY (`id_ponude`) REFERENCES `ponude` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `gradovi_akcije`
--
ALTER TABLE `gradovi_akcije`
  ADD CONSTRAINT `fk_gradovi_akcije_1` FOREIGN KEY (`id_grada`) REFERENCES `gradovi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gradovi_akcije_2` FOREIGN KEY (`id_akcije`) REFERENCES `akcije` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `fk_komentari_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_komentari_2` FOREIGN KEY (`id_ponude`) REFERENCES `ponude` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `kosarica`
--
ALTER TABLE `kosarica`
  ADD CONSTRAINT `fk_kosarica_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kosarica_2` FOREIGN KEY (`id_akcije`) REFERENCES `akcije` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `logovi`
--
ALTER TABLE `logovi`
  ADD CONSTRAINT `fk_logovi_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_logovi_2` FOREIGN KEY (`id_tip`) REFERENCES `log_tip` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `moderatori`
--
ALTER TABLE `moderatori`
  ADD CONSTRAINT `fk_moderatori_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_moderatori_2` FOREIGN KEY (`id_kategorije`) REFERENCES `kategorije` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD CONSTRAINT `fk_newsletter_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `opomene`
--
ALTER TABLE `opomene`
  ADD CONSTRAINT `fk_opomene_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_opomene_2` FOREIGN KEY (`id_moderatora`) REFERENCES `korisnici` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ponude`
--
ALTER TABLE `ponude`
  ADD CONSTRAINT `fk_ponude_1` FOREIGN KEY (`id_prodavatelja`) REFERENCES `prodavatelji` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ponude_2` FOREIGN KEY (`id_kategorije`) REFERENCES `kategorije` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `prodavatelji`
--
ALTER TABLE `prodavatelji`
  ADD CONSTRAINT `fk_prodavatelji_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `racuni`
--
ALTER TABLE `racuni`
  ADD CONSTRAINT `fk_racuni_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `racuni_akcije`
--
ALTER TABLE `racuni_akcije`
  ADD CONSTRAINT `fk_racuni_akcije_1` FOREIGN KEY (`id_racuna`) REFERENCES `racuni` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_racuni_akcije_2` FOREIGN KEY (`id_akcije`) REFERENCES `akcije` (`id`) ON UPDATE CASCADE;
