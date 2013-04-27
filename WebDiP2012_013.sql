-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2013 at 12:27 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ponude` int(11) NOT NULL,
  `popust` int(11) NOT NULL,
  `datum_pocetka` datetime NOT NULL,
  `datum_zavrsetka` datetime NOT NULL,
  `granica` int(11) NOT NULL,
  `istaknuto` tinyint(4) DEFAULT '0' COMMENT '0 ne\n1 da',
  `aktivan` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_akcije_1` (`id_ponude`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `akcije`
--

INSERT INTO `akcije` (`id`, `id_ponude`, `popust`, `datum_pocetka`, `datum_zavrsetka`, `granica`, `istaknuto`, `aktivan`) VALUES
(1, 1, 44, '2013-04-03 00:00:01', '2013-04-30 00:00:02', 9, 0, 1),
(2, 2, 65, '2013-04-27 01:35:30', '2013-04-30 15:00:00', 9, 1, 1),
(3, 3, 70, '2013-04-03 00:00:00', '2013-05-01 00:00:00', 3, 0, 1),
(4, 4, 0, '2013-04-04 00:00:00', '2013-09-15 00:00:00', 3, 0, 1),
(5, 5, 50, '2013-04-02 00:00:00', '2013-05-25 00:00:00', 6, 0, 0),
(6, 6, 70, '2013-04-04 00:00:00', '2013-04-29 00:00:00', 9, 0, 1),
(7, 7, 55, '2013-04-04 00:00:00', '2013-04-30 00:00:00', 8, 0, 1),
(8, 8, 50, '2013-04-04 00:00:00', '2013-05-08 00:00:00', 10, 0, 1),
(9, 9, 50, '2013-04-03 00:00:00', '2013-04-05 00:00:00', 7, 0, 1),
(10, 10, 73, '2013-04-03 00:00:00', '2013-04-06 00:00:00', 6, 0, 1),
(11, 11, 67, '2013-04-03 00:00:00', '2013-04-06 00:00:00', 9, 0, 1),
(12, 12, 0, '2013-04-02 00:00:00', '2013-04-05 00:00:00', 9, 0, 1),
(13, 13, 0, '2013-04-04 00:00:00', '2013-04-08 00:00:00', 9, 0, 1),
(14, 14, 40, '2013-04-04 00:00:00', '2013-04-07 00:00:00', 9, 0, 1),
(15, 15, 50, '2013-04-04 00:00:00', '2013-04-08 00:00:00', 4, 0, 1),
(16, 16, 64, '2013-04-02 00:00:00', '2013-04-27 01:20:45', 1, 1, 1),
(17, 17, 59, '2013-04-04 00:00:00', '2013-04-06 00:00:00', 7, 0, 1),
(18, 18, 51, '2013-04-03 00:00:00', '2013-04-06 00:00:00', 6, 0, 1),
(19, 19, 51, '2013-04-02 00:00:00', '2013-04-08 00:00:00', 4, 0, 1),
(20, 20, 60, '2013-04-04 00:00:00', '2013-04-05 00:00:00', 8, 0, 1),
(21, 21, 80, '2013-04-02 00:00:00', '2013-04-08 00:00:00', 5, 0, 1),
(22, 22, 0, '2013-04-02 00:00:00', '2013-04-07 00:00:00', 7, 0, 1),
(23, 23, 50, '2013-04-04 00:00:00', '2013-04-08 00:00:00', 8, 0, 1),
(24, 24, 50, '2013-04-02 00:00:00', '2013-04-08 00:00:00', 10, 0, 1),
(25, 25, 53, '2013-04-02 00:00:00', '2013-04-05 00:00:00', 10, 0, 1),
(26, 26, 50, '2013-04-03 00:00:00', '2013-04-06 00:00:00', 4, 0, 1),
(27, 27, 68, '2013-04-04 00:00:00', '2013-04-05 00:00:00', 3, 0, 1),
(28, 28, 65, '2013-04-04 00:00:00', '2013-04-05 00:00:00', 10, 0, 1),
(29, 29, 0, '2013-04-04 00:00:00', '2013-04-06 00:00:00', 4, 0, 1),
(30, 30, 0, '2013-04-04 00:00:00', '2013-04-06 00:00:00', 6, 0, 1),
(31, 31, 60, '2013-04-04 00:00:00', '2013-04-05 00:00:00', 6, 0, 1),
(32, 32, 50, '2013-04-03 00:00:00', '2013-04-07 00:00:00', 3, 0, 1),
(33, 33, 50, '2013-04-04 00:00:00', '2013-04-05 00:00:00', 9, 0, 1),
(34, 34, 60, '2013-04-04 00:00:00', '2013-04-05 00:00:00', 9, 0, 1),
(35, 35, 56, '2013-04-03 00:00:00', '2013-04-06 00:00:00', 9, 0, 1),
(36, 36, 71, '2013-04-02 00:00:00', '2013-04-08 00:00:00', 7, 0, 1),
(37, 37, 62, '2013-04-03 00:00:00', '2013-04-06 00:00:00', 5, 0, 1),
(38, 38, 50, '2013-04-02 00:00:00', '2013-04-07 00:00:00', 3, 0, 1),
(39, 39, 70, '2013-04-02 00:00:00', '2013-04-05 00:00:00', 7, 0, 1),
(40, 40, 50, '2013-04-02 00:00:00', '2013-04-07 00:00:00', 7, 0, 1),
(41, 41, 51, '2013-04-03 00:00:00', '2013-04-07 00:00:00', 3, 0, 1),
(42, 42, 50, '2013-04-04 00:00:00', '2013-04-05 00:00:00', 3, 0, 1),
(43, 43, 50, '2013-04-04 00:00:00', '2013-04-05 00:00:00', 9, 0, 1),
(44, 44, 40, '2013-04-04 00:00:00', '2013-04-06 00:00:00', 6, 0, 1),
(45, 45, 50, '2013-04-03 00:00:00', '2013-04-07 00:00:00', 6, 0, 1),
(46, 1, 10, '2013-12-12 18:30:00', '2013-12-12 18:30:00', 10, 0, 0),
(47, 2, 10, '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0, 0),
(48, 2, 10, '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0, 0),
(49, 6, 50, '2013-04-01 14:00:00', '2013-04-08 14:00:00', 50, 0, 0),
(50, 47, 99, '2013-04-20 00:00:00', '2013-05-20 00:00:00', 199, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gradovi`
--

CREATE TABLE IF NOT EXISTS `gradovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) NOT NULL,
  `aktivan` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gradovi`
--

INSERT INTO `gradovi` (`id`, `ime`, `aktivan`) VALUES
(1, 'Zagreb', 1),
(2, 'VaraÅ¾din', 0),
(3, 'Rijaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gradovi_akcije`
--

CREATE TABLE IF NOT EXISTS `gradovi_akcije` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grada` int(11) NOT NULL,
  `id_akcije` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gradovi_akcije_1` (`id_grada`),
  KEY `fk_gradovi_akcije_2` (`id_akcije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `gradovi_akcije`
--

INSERT INTO `gradovi_akcije` (`id`, `id_grada`, `id_akcije`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(28, 1, 28),
(29, 1, 29),
(30, 1, 30),
(31, 1, 31),
(32, 1, 32),
(33, 1, 33),
(34, 1, 34),
(35, 1, 35),
(36, 1, 36),
(37, 1, 37),
(38, 1, 38),
(39, 1, 39),
(40, 1, 40),
(41, 1, 41),
(42, 1, 42),
(43, 1, 43),
(44, 1, 44),
(45, 1, 45);

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  `aktivna` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 neaktivna\n1 aktivna',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id`, `naziv`, `aktivna`) VALUES
(1, 'prva-kategorija', 1),
(2, 'sport-i-rekreacija', 1),
(3, 'cuvari-zdravlja', 1),
(4, 'edukacija', 1),
(5, 'ljepota', 1),
(6, 'proizvodi', 1),
(7, 'ostalo', 1),
(8, 'kazalista-i-muzeji', 1),
(9, 'hrana-i-pice', 1),
(24, 'skrivena-kategorija', 0);

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) NOT NULL,
  `id_ponude` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `ocjena` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `aktivan` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_komentari_1` (`id_korisnika`),
  KEY `fk_komentari_2` (`id_ponude`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `id_korisnika`, `id_ponude`, `komentar`, `ocjena`, `datum`, `aktivan`) VALUES
(4, 33, 8, 'Ovo su opasni znakovi /*--+123 --', 2, '2013-04-27 16:10:33', 1),
(5, 1, 8, 'Ovo je neki drugi komentar', 4, '2013-04-25 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `pbr` varchar(5) NOT NULL,
  `mjesto` varchar(45) NOT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `oib` varchar(11) NOT NULL,
  `open_id` mediumint(9) DEFAULT '0' COMMENT '0 - normalno\n1- facebook\n2 - google',
  `opomena` mediumint(9) DEFAULT '0' COMMENT 'Brojanje opomena nakon trece ide deakrtivacija',
  `deaktiviran` tinyint(4) DEFAULT '0' COMMENT '0 aktiviran\n1 deaktiviran',
  `zamrznut` datetime DEFAULT NULL COMMENT 'Datum do kojeg je aktiviran',
  `blokiran` tinyint(4) DEFAULT NULL COMMENT '0  nije\n1 blokiran',
  `datum_registracije` datetime DEFAULT NULL,
  `email_potvrda` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `ovlasti` mediumint(9) NOT NULL COMMENT '1 reg_user\n2 mod\n3 admin',
  `aktivan` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0-ne; 1-da',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `adresa`, `pbr`, `mjesto`, `telefon`, `email`, `oib`, `open_id`, `opomena`, `deaktiviran`, `zamrznut`, `blokiran`, `datum_registracije`, `email_potvrda`, `password`, `ovlasti`, `aktivan`) VALUES
(1, 'Ana', 'AmiÄ‡', 'Anina 21', '10000', 'Zagreb', '098365111', 'ana@ana.com', '1', 0, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '1', '98fc7b34760face5e268bff318180e05861a970f', 1, 1),
(2, 'JukiÄ‡', 'DadoviÄ‡', 'Kaptol 85', '31000', 'Osjek', '031949320', 'kdomic@f1oi.hr', '05864405589', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'b521caa6e1db82e5a01c924a419870cb72b81635', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 3, 0),
(3, 'Karlo', 'BlaÅ¾eviÄ‡', 'Maksimir 43', '31000', 'Osjek', '031255327', 'karlo@nekimail.com', '53274892846', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-01 00:00:00', 'aktiviran', '912c106a14310615dfe86b9b571cbacf77849a6f', 3, 1),
(4, 'Mia', 'Grgi&#263;', 'Kaptol 61', '20000', 'Dubrovnik', '020443851', 'mia@nekimail.com', '73626866178', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-03 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(5, 'Sara', 'Filipovi&#263;', 'Trg Petra Kre&#353;imira Četvrtog 97', '51000', 'Rijeka', '051462878', 'sara@nekimail.com', '18364659824', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-03 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(6, 'Filip', 'Markovi&#263;', 'Maksimir 60', '31000', 'Osjek', '031765206', 'filip@nekimail.com', '48609332257', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-06 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(7, 'Lara', 'Kova&#269;', 'Gunduli&#263;eva ulica 100', '52440', 'Pore&#269;', '052210802', 'lara@nekimail.com', '58676644396', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-06 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(8, 'Mirjana', 'Mari&#263;', 'Nova cesta 22', '21000', 'Split', '021640176', 'mirjana@nekimail.com', '91214714864', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-02 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(9, 'Lucija', 'Horvat', 'Cvjetni trg 96', '52100', 'Pula', '052208827', 'lucija@nekimail.com', '93230190668', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-01 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(10, 'Petra', 'Vidovi&#263;', 'Maksimir 43', '52440', 'Pore&#269;', '052308482', 'petra@nekimail.com', '11057943083', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-07 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(11, 'Dragica', 'Pavi&#263;', 'Trg Petra Kre&#353;imira Četvrtog 80', '42000', 'Vara&#382;din', '042774855', 'dragica@nekimail.com', '92747525668', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-02 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(12, 'Fran', '&#352;imi&#263;', 'Maksimir 54', '52000', 'Pazin', '052126765', 'fran@nekimail.com', '98898488412', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-06 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(13, 'Nada', '&#352;ari&#263;', 'Maksimir 92', '52100', 'Pula', '052650410', 'nada@nekimail.com', '22443367674', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-03 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(14, 'Luka', 'Tomi&#263;', 'Dolac 78', '42000', 'Vara&#382;din', '042182587', 'luka@nekimail.com', '35418981691', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-08 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(15, 'Josip', 'Mati&#263;', 'Trg bana Josipa Jela&#269;i&#263;a 6', '42000', 'Vara&#382;din', '042195486', 'josip@nekimail.com', '44954969755', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-01 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(16, 'Mario', 'Babi&#263;', 'Trg &#382;rtava fa&#353;izma 83', '52100', 'Pula', '052252957', 'mario@nekimail.com', '56572407461', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-03 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(17, 'Marija', 'Kne&#382;evi&#263;', 'Trg bana Josipa Jela&#269;i&#263;a 46', '31000', 'Osjek', '031586645', 'marija@nekimail.com', '93663267243', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-06 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(18, 'Dora', 'Vukovi&#263;', 'Dolac 91', '42000', 'Vara&#382;din', '042439681', 'dora@nekimail.com', '15004553113', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-04 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(19, 'Ljubica', 'Peri&#263;', 'Gunduli&#263;eva ulica 45', '20000', 'Dubrovnik', '020377478', 'ljubica@nekimail.com', '38239346842', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-08 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(20, 'Marko', 'Kova&#269;evi&#263;', 'Trg &#382;rtava fa&#353;izma 70', '35000', 'Slavnosni Brod', '035738358', 'marko@nekimail.com', '44319502356', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-08 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(21, 'Ema', 'Bo&#353;njak', 'Maksimir 57', '20000', 'Dubrovnik', '020804305', 'ema@nekimail.com', '46121510021', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-07 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(22, 'Lana', 'Perkovi&#263;', 'Gunduli&#263;eva ulica 32', '20000', 'Dubrovnik', '020237690', 'lana@nekimail.com', '45314395977', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-08 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(24, 'David', 'Radi&#263;', 'Gunduli&#263;eva ulica 63', '42000', 'Vara&#382;din', '042367310', 'david@nekimail.com', '72037333554', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-04 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(25, 'Tomislav', 'Petrovi&#263;', 'Trg Petra Kre&#353;imira Četvrtog 98', '52100', 'Pula', '052780822', 'tomislav@nekimail.com', '16533550224', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-01 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(26, 'Ivan', 'Lovri&#263;', 'Trg Petra Kre&#353;imira Četvrtog 99', '52100', 'Pula', '052944359', 'ivan@nekimail.com', '21242686890', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-02 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(27, 'Marica', 'Popovi&#263;', 'Trg Petra Kre&#353;imira Četvrtog 83', '52000', 'Pazin', '052330212', 'marica@nekimail.com', '28861321926', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-07 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(28, 'Ivica', 'Pavlovi&#263;', 'Gornji grad 2', '31000', 'Osjek', '031451563', 'ivica@nekimail.com', '60187343516', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-03 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(29, 'Stjepan', 'Novak', 'Trg bana Josipa Jela&#269;i&#263;a 78', '35000', 'Slavnosni Brod', '035416396', 'stjepan@nekimail.com', '55994485769', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-01 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(30, 'Ana', 'Juri&#263;', 'Trg bana Josipa Jela&#269;i&#263;a 11', '35000', 'Slavnosni Brod', '035369839', 'ana@nekimail.com', '10323237862', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-03 00:00:00', 'aktiviran', 'lozinka', 1, 1),
(31, 'Krunoslav', 'Domic', '', '', '', '', 'krunoslavdomic@gmail.com', '', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-19 18:36:50', '0', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1),
(33, 'Pero', 'PeriÄ‡', 'Perina ulica 22', '', '', '', 'pero@pero.com', '05864405589', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-19 18:55:49', '0', '98fc7b34760face5e268bff318180e05861a970f', 1, 0),
(35, 'admin', 'admin', '', '', '', '', 'admin@admin.com', '', 0, 0, 0, '0000-00-00 00:00:00', 0, '2013-04-19 19:47:06', '0', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kosarica`
--

CREATE TABLE IF NOT EXISTS `kosarica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) NOT NULL,
  `id_akcije` int(11) NOT NULL,
  `operacija` mediumint(9) NOT NULL DEFAULT '0' COMMENT '0 dodano\n1 izbaceno\n2 kupljeno',
  `datum` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kosarica_1` (`id_korisnika`),
  KEY `fk_kosarica_2` (`id_akcije`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logovi`
--

CREATE TABLE IF NOT EXISTS `logovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) NOT NULL,
  `id_tip` int(11) NOT NULL COMMENT 'tip zapisa',
  `kljuc` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_logovi_1` (`id_korisnika`),
  KEY `fk_logovi_2` (`id_tip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `logovi`
--

INSERT INTO `logovi` (`id`, `id_korisnika`, `id_tip`, `kljuc`, `datum`) VALUES
(1, 1, 1, 1, '2013-04-01 01:59:50'),
(2, 1, 3, 1, '2013-04-01 01:59:50'),
(3, 1, 1, 2, '2013-04-01 01:59:50'),
(4, 1, 3, 2, '2013-04-01 01:59:50'),
(5, 1, 1, 3, '2013-04-01 01:59:50'),
(6, 1, 3, 3, '2013-04-01 01:59:50'),
(7, 1, 1, 4, '2013-04-01 01:59:50'),
(8, 1, 3, 4, '2013-04-01 01:59:50'),
(9, 1, 1, 5, '2013-04-01 01:59:50'),
(10, 1, 3, 5, '2013-04-01 01:59:50'),
(11, 1, 1, 6, '2013-04-01 01:59:50'),
(12, 1, 3, 6, '2013-04-01 01:59:50'),
(13, 1, 1, 7, '2013-04-01 01:59:50'),
(14, 1, 3, 7, '2013-04-01 01:59:50'),
(15, 1, 1, 8, '2013-04-01 01:59:50'),
(16, 1, 3, 8, '2013-04-01 01:59:50'),
(17, 1, 1, 9, '2013-04-01 01:59:50'),
(18, 1, 3, 9, '2013-04-01 01:59:50'),
(19, 1, 1, 10, '2013-04-01 01:59:50'),
(20, 1, 3, 10, '2013-04-01 01:59:50'),
(21, 1, 1, 11, '2013-04-01 01:59:50'),
(22, 1, 3, 11, '2013-04-01 01:59:50'),
(23, 1, 1, 12, '2013-04-01 01:59:50'),
(24, 1, 3, 12, '2013-04-01 01:59:50'),
(25, 1, 1, 13, '2013-04-01 01:59:50'),
(26, 1, 3, 13, '2013-04-01 01:59:50'),
(27, 1, 1, 14, '2013-04-01 01:59:50'),
(28, 1, 3, 14, '2013-04-01 01:59:50'),
(29, 1, 1, 15, '2013-04-01 01:59:50'),
(30, 1, 3, 15, '2013-04-01 01:59:50'),
(31, 1, 1, 16, '2013-04-01 01:59:50'),
(32, 1, 3, 16, '2013-04-01 01:59:50'),
(33, 1, 1, 17, '2013-04-01 01:59:50'),
(34, 1, 3, 17, '2013-04-01 01:59:50'),
(35, 1, 1, 18, '2013-04-01 01:59:50'),
(36, 1, 3, 18, '2013-04-01 01:59:50'),
(37, 1, 1, 19, '2013-04-01 01:59:50'),
(38, 1, 3, 19, '2013-04-01 01:59:50'),
(39, 1, 1, 20, '2013-04-01 01:59:50'),
(40, 1, 3, 20, '2013-04-01 01:59:50'),
(41, 1, 1, 21, '2013-04-01 01:59:50'),
(42, 1, 3, 21, '2013-04-01 01:59:50'),
(43, 1, 1, 22, '2013-04-01 01:59:50'),
(44, 1, 3, 22, '2013-04-01 01:59:50'),
(45, 1, 1, 23, '2013-04-01 01:59:50'),
(46, 1, 3, 23, '2013-04-01 01:59:50'),
(47, 1, 1, 24, '2013-04-01 01:59:50'),
(48, 1, 3, 24, '2013-04-01 01:59:50'),
(49, 1, 1, 25, '2013-04-01 01:59:50'),
(50, 1, 3, 25, '2013-04-01 01:59:50'),
(51, 1, 1, 26, '2013-04-01 01:59:50'),
(52, 1, 3, 26, '2013-04-01 01:59:50'),
(53, 1, 1, 27, '2013-04-01 01:59:50'),
(54, 1, 3, 27, '2013-04-01 01:59:50'),
(55, 1, 1, 28, '2013-04-01 01:59:50'),
(56, 1, 3, 28, '2013-04-01 01:59:50'),
(57, 1, 1, 29, '2013-04-01 01:59:50'),
(58, 1, 3, 29, '2013-04-01 01:59:50'),
(59, 1, 1, 30, '2013-04-01 01:59:50'),
(60, 1, 3, 30, '2013-04-01 01:59:50'),
(61, 1, 11, 1, '2013-04-01 01:59:50'),
(62, 1, 14, 1, '2013-04-01 01:59:50'),
(63, 1, 14, 2, '2013-04-01 01:59:50'),
(64, 25, 12, 1, '2013-04-01 01:59:50'),
(65, 26, 12, 1, '2013-04-01 01:59:50'),
(66, 27, 12, 1, '2013-04-01 01:59:50'),
(67, 1, 28, 1, '2013-04-01 01:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `log_tip`
--

CREATE TABLE IF NOT EXISTS `log_tip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opis` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `log_tip`
--

INSERT INTO `log_tip` (`id`, `opis`) VALUES
(1, 'Korisnik registriran'),
(2, 'Korisnik aktiviran putem Emaila'),
(3, 'Korisnik aktiviran od strane administratora'),
(4, 'Izmjena korisni&#269;kih podataka'),
(5, 'Prijava korisnika'),
(6, 'Opomena korisniku'),
(7, 'Zamrzavanje ra&#269;una'),
(8, 'Odmrzavanje ra&#269;una'),
(9, 'Blokada ra&#269;una'),
(10, 'Deblokada ra&#269;una'),
(11, 'Promjena razine ovlasti'),
(12, 'Pretplata na newsletter'),
(13, 'Ukinuta pretplata na newsletter'),
(14, 'Kategorija dodana moderatoru'),
(15, 'Kategorija oduzeta moderatoru'),
(16, 'Dodana nova kategorija'),
(17, 'Izmjena kategorije'),
(18, 'Dodaja novog proizvoda'),
(19, 'Izmjena proizvoda'),
(20, 'Akcija dodana'),
(21, 'Akcija promjenjena'),
(22, 'Dodan vaucher'),
(23, 'Izmjenjen vaucher'),
(24, 'Iskoristen vaucher'),
(25, 'Prodavatelj dodan'),
(26, 'Prodavatelj izmjenjen'),
(27, 'Prodavatelj uklonjen'),
(28, 'Transakcija uspjela'),
(29, 'Transakcija neuspejla'),
(30, 'Izmjena sistemskog vremena');

-- --------------------------------------------------------

--
-- Table structure for table `moderatori`
--

CREATE TABLE IF NOT EXISTS `moderatori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) NOT NULL,
  `id_kategorije` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_moderatori_1` (`id_korisnika`),
  KEY `fk_moderatori_2` (`id_kategorije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kategorija` int(11) NOT NULL,
  `aktivan` tinyint(4) NOT NULL COMMENT '0 neaktivan\n1 aktivan',
  PRIMARY KEY (`id`),
  KEY `fk_newsletter_1` (`id_korisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `id_korisnika`, `email`, `kategorija`, `aktivan`) VALUES
(5, 33, 'kdomic@foi.hr', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `opomene`
--

CREATE TABLE IF NOT EXISTS `opomene` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) NOT NULL,
  `id_moderatora` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `opis` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_opomene_1` (`id_korisnika`),
  KEY `fk_opomene_2` (`id_moderatora`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `opomene`
--

INSERT INTO `opomene` (`id`, `id_korisnika`, `id_moderatora`, `datum`, `opis`) VALUES
(1, 2, 1, '2013-04-01 01:59:50', 'Izri&#263;e se opomena radi testiranja sustava');

-- --------------------------------------------------------

--
-- Table structure for table `ponude`
--

CREATE TABLE IF NOT EXISTS `ponude` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodavatelja` int(11) NOT NULL,
  `id_kategorije` int(11) NOT NULL,
  `naslov` text NOT NULL,
  `podnaslov` text NOT NULL,
  `cijena` float NOT NULL,
  `opis_naslov` text NOT NULL,
  `opis_kratki` text NOT NULL,
  `opis` text NOT NULL,
  `napomena` text NOT NULL,
  `karta_x` varchar(45) DEFAULT NULL,
  `karta_y` varchar(45) DEFAULT NULL,
  `aktivan` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_ponude_1` (`id_prodavatelja`),
  KEY `fk_ponude_2` (`id_kategorije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `ponude`
--

INSERT INTO `ponude` (`id`, `id_prodavatelja`, `id_kategorije`, `naslov`, `podnaslov`, `cijena`, `opis_naslov`, `opis_kratki`, `opis`, `napomena`, `karta_x`, `karta_y`, `aktivan`) VALUES
(1, 1, 1, 'Otputujte na 2 dana u svijet wellness u&#382;itaka u prekrasnom Pomurju', 'Za 1.018 kn &#269;eka vas no&#263;enje s doru&#269;kom za 2 osobe uz neograni&#269;eno kori&#353;tenje wellnessa u hotelu Son&#269;na hi&#353;a', 2036, 'Tra&#382;ite svoje mjesto pod suncem?', 'nsjeveroistok susjedne Slovenijerasko&scaron;an wellness i u&#382;ivanje u prirodi, vo&#382;nja biciklom, golf, bogata gastronomska ponuda, vrhunska vinakupon je mogu&#263;e iskoristiti samo od ponedjeljka do petkadatum: 01.04.2013. - 31.12.2013.', 'Svatko od nas ponekad po&#382;eli pobje&#263;i od u&#382;urbanog &#382;ivota, barem nakratko.Uzmite si par slobodnih dana i oti&#273;ite u svijet opu&scaron;tanja u prekrasnom Pomurju, na sjeveroistoku susjedne nam Slovenije. Dozvolite da va&scaron;e &#382;ivote ponovo obasja sunce kojim sjaji Son&#269;na hi&scaron;a.Design boutique hotel Son&#269;na hi&scaron;a nalazi se u pomurskom naselju Banovci, poznatom po svojim termama. Ovaj ljupki hotel je novoizgra&#273;ena vila koja sadr&#382;i pet prostranih i ukusno namje&scaron;tenih soba. Ovdje mo&#382;ete u&#382;ivati u potpunom opu&scaron;tanju &nbsp;kojeg vam nudi rasko&scaron;an wellness. U Son&#269;nom wellnessu preporu&#269;ujemo vam finsku i biljnu saunu. Nakon saune, mo&#382;ete se opustiti uz ugodnu glazbu, &#269;aj i vo&#263;e te hidromasa&#382;ni bazen. Na va&scaron; zahtjev, njihovi iskusni maseri dodirima &#263;e vas odvesti u stanje potpune opu&scaron;tenosti i ravnote&#382;e. Dobro ste do&scaron;li i u njihov Son&#269;ni vrt gdje &#263;e svatko prona&#263;i svoje mjesto pod Suncem. Tu se mo&#382;ete izle&#382;avati pod vedrim nebom, &#269;itati knjigu, br&#269;kati se u masa&#382;nom bazenu ili spojiti na internet.I izvan hotela &#269;ekaju vas prekrasne stvari! Pomurje je zemlja golemih polja i brda, roda i mlinova na vodi, ljekovite vode i valovitih vinorodnih bre&#382;uljaka. Ono vas zove na &scaron;etnju brdima, du&#382; potoka i preko ravnih polja. Mo&#382;ete se odlu&#269;iti i na vo&#382;nju biciklom kroz planine koje nude prekrasan pogled. Istra&#382;ite i gastronomsku ponudu u lokalnim restoranima, koji nude degustaciju finih vina i kulinarskih specijaliteta. Moderni nomadi ovdje mogu zaigrati i golf.U&#382;ivajte cijelim bi&#263;em u Son&#269;noj hi&scaron;i!', 'Mogu&#263;nost pla&#263;anja Amex-om do 6 rata bez kamata i naknada&nbsp;Kupon mo&#382;ete koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 5 kupona na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaJedan kupon vrijedi za 2 osobePonuda uklju&#269;uje:&nbsp;2 dana / 1 no&#263;enje s doru&#269;kom za dvije osobe uz svje&#382;e vo&#263;e u sobi, neograni&#269;eno&nbsp;kori&scaron;tenje wellnessa, kori&scaron;tenje sauna, upotrebu unutarnjeg masa&#382;nog bazena, 1 klasi&#269;nu masa&#382;u cijelog tijela za jednu osobu, upotrebu ru&#269;nika,ogrta&#269;a te upotrebu kozmetike&nbsp;Loccitane(mlijeko za tijelo)Nadoplata za djecu:- 40% od Kupi me cijeneObavezna nadoplata- boravi&scaron;na pristrojba pla&#263;a se na licu mjesta 1,10&euro; po osobi po danuMogu&#263;nost nadoplate: - dodatna masa&#382;a 266 kn/35&euro; po osobiCjenik mo&#382;ete provjeriti ovdjeBoravak ku&#263;nih ljubimaca nije dopu&scaron;tenProvjera raspolo&#382;ivosti prije kupnje kupona i potvrda rezervacije po primitku kupona na +386 (0)2 588 8238 ili na mail booking@soncna-hisa.si prema raspolo&#382;ivostiRok iskoristivosti kupona: 01.04.2013. - 31.12.2013.&nbsp;(kupon je mogu&#263;e iskoristiti samo od ponedjeljka do petka)Kupon se smatra iskori&scaron;tenim ukoliko je korisnik rezervirao termin, a nije do&scaron;ao ili otkazao termin 7 dana prije dolaskaNakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '46.572588', '16.167186', 0),
(2, 2, 2, 'Mala &#353;kola jahanja u Alminoj potkovici', 'Za 159 kn &#269;ekaju vas 3 &#353;kolska sata dru&#382;enja s konjima i naravno, jahanje', 450, 'Oduvijek vam je san bio nau&#269;iti jahati? Danas ga ostvarite!', 'nNapomeneKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 3 kupona na svoje imeJedna osoba mo&#382;e pokloniti 3 kuponaKupon vrijedi za jednu osobuPonuda uklju&#269;uje: malu &scaron;kolu jahanja u trajanju od 3 &scaron;kolska sata - 2x45min jahanja, 45min teorijeCjenik mo&#382;ete pogledati ovdje&Scaron;kola jahanja namijenjena je odraslima i djeci od 8 godina na vi&scaron;eTermini se dogovaraju prema individualnim mogu&#263;nostima polaznikaObavezna telefonska najava 3 dana unaprijed na (091) 5205 187 svaki dan od 10 do 13 i od 16 do 19 sati, najkasanije do 1.5.2013.Rok iskoristivosti kupona: 10.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristitiKupon se smatra iskori&scaron;tenim ukoliko je korisnik rezervirao termin, a nije do&scaron;ao ili otkazao najmanje 24 sata ranije', '', '', '45.838786', '16.024761', 1),
(3, 3, 3, 'U&#382;ivajte u blagodatima 2 masa&#382;e i prekontrolirajte atlas', 'U Corpus valens &#269;ekaju vas 2 opu&#353;taju&#263;e masa&#382;e cijelog tijela i kontrola atlasa, prvog vratnog kralje&#353;ka', 500, 'Svima je potrebna masa&#382;a!', 'nporavnavanje mi&scaron;i&#263;nih vlakanaosloba&#273;anje negativne energijedotok kisika i hranjivih tvari do svake i najmanje stanice', 'Masa&#382;a je vrlo va&#382;na za sve ljude u svim stadijima &#382;ivota. Za one koji ne mogu vje&#382;bati, masa&#382;a je odli&#269;na alternativa za pobolj&scaron;anje rasta i razvoja tijela. Tako&#273;er se preporu&#269;uje prije i poslije sportske aktivnosti. Masa&#382;om se zagrijavaju i omek&scaron;avaju tkiva, te poravnavaju mi&scaron;i&#263;na vlakna. Tretmanom masa&#382;nog istezanja opu&scaron;tamo meko tkivo u okolini zgloba i na taj na&#269;in vra&#263;amo njegovu funkcionalnost. U&#269;estalost provo&#273;enja tretmana ubla&#382;ava mi&scaron;i&#263;nu napetost, omogu&#263;uje kontinuiran rad krvo&#382;ilnog sustava, osloba&#273;a negativnu energiju, pru&#382;a normalan dotok kisika i hranjivih tvari do svake i najmanje stanice, stimulira rad unutarnjih organa. Masa&#382;om dovodimo tijelo u prirodnu ravnote&#382;u.U sklopu dana&scaron;nje ponude, Corpus valens &#263;e vam pru&#382;iti dvije vrhunske masa&#382;e cijelog tijela, a uz to &#263;ete dobiti pregled atlasa. Atlas je prvi vratni kralje&#382;ak i nosioc glave. Ako se nalazi u neprirodnom polo&#382;aju, atlasa vr&scaron;i pritisak na vratnu kralje&#382;nicu, a mi tu te&#382;inu osje&#263;amo kao napetost, bol u vratu i ramenima, kralje&#382;nici, imamo glavobolju i niz ostalih zdravstvenih tegoba. Zato ga je potrebno prekontrolirati, i prema potrebi namjestiti.Vidimo se u Corpus valens!&nbsp;', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaPonuda uklju&#269;uje:&nbsp;2 masa&#382;e cijelog tijela (45min svaka) te kontrolu atlasa&nbsp;Cjenik mo&#382;ete pogledati ovdjeTim:- Roman Kokori&#263;: medicinsko-sportski maser, Atlas Vitalogie terapeut- Marina Piska&#269;: vi&scaron;i fiziotarapeutRadno vrijeme po dogovoruNajava 2 dana unaprijed na (092) 3048 252&nbsp;Rok iskoristivosti kupona: 2.7.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.812873', '15.985461', 1),
(4, 1, 4, 'Semestralni te&#269;ajevi stranih jezika za 990 kn', 'U&#269;ite engleski ili talijanski jezik kroz cijeli proljetni semestar u &#353;koli stranih jezika Latina u centru Zagreba', 0, 'Progovorite i na stranim jezicima', '\n&Scaron;kola Latina&nbsp;posjeduje certifikat ISO 9001:2008predava&#269;i su izvorni govornici ili profesori stranih jezika s dugogodi&scaron;njim iskustvommogu&#263;nost pla&#263;anja Amexom do&nbsp;6 rata bez kamata i naknada', '&Scaron;kola stranih jezika Latina posjeduje certifikat ISO 9001:2008, sustav upravljanja kvalitetom u podru&#269;ju usluga poduke stranih jezika i prevo&#273;enja.&nbsp;Iskustva korisnika mo&#382;ete pogledati ovdje.&nbsp;Napomenut &#263;emo samo kako je Latina vrlo kvalitetna &scaron;kola i jedina &#269;iji je program rada i organizacije i u vrijeme krize na izuzetno visokom stupnju, a subvencionirana je dr&#382;avnim bespovratnim sredstvima RH. U &scaron;koli Latina radi mlada visokoobrazovana ekipa profesora koji se prilago&#273;avaju va&scaron;im potrebama. Nastava se odr&#382;ava na vrlo kreativne na&#269;ine i nikada nije dosadno. Profesori su boravili i u inozemstvu pa &#263;e vam uz jezik prenijeti i kulturolo&scaron;ke navike zemlje &#269;iji jezik u&#269;ite.&nbsp;U dana&scaron;njoj ponudi mo&#382;ete upisati te&#269;aj engleskog ili talijanskog jezika te brusiti njegovo znanje tijekom cijelog semestra. Prilikom odabira odgovaraju&#263;eg stupnja te&#269;aja, mo&#382;ete do&#263;i na testiranje ili sami izvr&scaron;iti samoprocjenu pomo&#263;u tablice na stranicama &scaron;kole. Te&#269;aj je posve&#263;en op&#263;em jeziku i konverzacijskim treninzima u komunikaciji uz aktualne &#382;ivotne situacije, te sadr&#382;i gramatiku prema programu.&nbsp;U&#269;imo zajedno u &scaron;koli za strane jezike Latina!', 'Mogu&#263;nost pla&#263;anja Amexom do 6 rata bez kamata i naknadaKupon je mogu&#263;e koristiti&nbsp;od 6.4. - po&#269;etak semestraJedna osoba mo&#382;e koristiti 2 kupona na svoje imeJedna osoba mo&#382;e pokloniti 5 kupona1 kupon = 1 jezikPonuda uklju&#269;uje:&nbsp;po&#269;etni subotnji te&#269;ajevi engleskog ili talijanskog jezika kroz cijeli proljetni semestar u&nbsp;Latina - &scaron;koli stranih jezika&nbsp;u trajanju od 40 &scaron;k. satiPotrebno predznanje: nije potrebnoCjenik mo&#382;ete pogledati ovdjeTermini:Engleski A1&nbsp; &nbsp; Sub 9 - 11,15hTalijanski A1&nbsp; &nbsp; Sub 11,30 - 13,45h&nbsp; &nbsp;&nbsp;Termine nije mogu&#263;e kombinirati, grupe imaju svoj fiksni termin i polaznik pripada grupi za koju se unaprijed odlu&#269;iNadoknada propu&scaron;tenih satova nije mogu&#263;a u drugim grupamaPrije kupovine kupona&nbsp;obavezno provjerite raspolo&#382;ivost termina za odabrani jezik na&nbsp;latina@latina.hrPrijavu za te&#269;aj mo&#382;ete izvr&scaron;iti odmah po primitku kupona putem e-maila: latina@latina.hr s osobnim podacima i odabranim te&#269;ajemNakon &scaron;to mail-om potvrdite termin te&#269;aja, isti nije mogu&#263;e vi&scaron;e otkazati ili mijenjati &nbsp;- kupon se smatra iskori&scaron;tenim u slu&#269;aju nedolaskaNajni&#382;a dob za pristupanje te&#269;aju je 15 godinaPo zavr&scaron;etku te&#269;aja&nbsp;pi&scaron;e se zavr&scaron;ni test i dobiva se&nbsp;Potvrda o zavr&scaron;enom stupnju znanja prema Europskom referentnom okviru&nbsp;za u&#269;enje stranih jezikaRok iskoristivosti kupona: 6.4.2013. (po&#269;etak te&#269;aja)Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti&nbsp;', '45.807751', '15.980698', 1),
(5, 1, 5, 'Depilacija tijela voskom za 75 kn', 'Rije&#353;ite se ne&#382;eljenih dla&#269;ica sa odabranih dijelova tijela u Centru Sandra', 150, 'Za glatku ko&#382;u bez dlaka.', '\ndugotrajna meko&#263;a va&scaron;e ko&#382;estru&#269;no i educirano osobljeiskoristivo do 26.4.2013.', 'U centru&nbsp;Sandra&nbsp;uklonit &#263;e svaki trag ne&#382;eljenim dla&#269;icama. Tretman &#263;e se raditi prema va&scaron;oj &#382;elji, a uklju&#269;uje depilaciju prepona, potkoljenica, natkoljenica, pazuha ili nekog drugog mjesta gdje vam dla&#269;ice stvaraju &bdquo;probleme&ldquo;. Koristit &#263;e se teku&#263;i vosak u patroni i trake za depilaciju. I dlaka vi&scaron;e ne&#263;e biti!Vidimo se u Centru za njegu lica i tijela i frizerskom salonu Sandra&nbsp;!', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 10 kupona na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponaPonuda uklju&#269;uje: depilaciju tijela voskomRadno vrijeme:Pon- pet 10-19hNajava 1 dan unaprijed na &nbsp;broj telefona (031) 284 444Rok iskoristivosti kupona:&nbsp;26.04.2013Kupon se smatra iskori&scaron;tenim ukoliko je korisnik rezervirao termin, a nije do&scaron;ao ili otkazao termin najmanje 24h ranijeNakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.555485', '18.690212', 1),
(6, 1, 5, '10 vrhunskih anticelulitnih tretmana za samo 645 kn', 'Zapo&#269;nite borbu protiv celulita uz 5 Robeus Oceans tretmana protiv tvrdokornog celulita i 5 limfnih drena&#382;a u Estetskom centru Life Estetic', 2150, 'Pobijedite celulit', '\nprogram od 10 anticelulitnih tretmanaprofesionalna anticelulitna kozmetika za oblikovanje tijelaiskoristivo do 21.05.2013.', '&nbsp;Ako ste &#269;vrsto odlu&#269;ili ovog prolje&#263;a pobijediti celulit, onda obavezno posjetite Life Estetic koji ispunjava sve &#382;elje vezane za ljepotu. Za borbu protiv celulita, estetski centar Life Estetic je osmislio program od 10 anticelulitnih tretmana protiv kojih celulit nema nikakve &scaron;anse.Robeus Oceans je profesionalna anticelulitna linija za preoblikovanje tijela. Ona &scaron;titi stijenke krvnih &#382;ila (nije termoaktivna) uklanja celulit, daje vlagu i elasti&#269;nost, poti&#269;e metabolizam te ubrzava regenerativne procese. Sadr&#382;i jod, minerale, aminokiseline, citruse, kalcij. To je hladni tretman koji se vr&scaron;i zamatanjem u foliju nakon &#269;ega slijedi limfna drena&#382;a koja poti&#269;e cirkuliranje limfe, odgovorne za izbacivanje toksina.U bogatoj ponudi centra Life Estetic prona&#263;i &#263;ete linije vrhunskih proizvoda kao i najsuvremeniju tehnologiju kojom se pospje&scaron;uje zdravlje i &#269;uva mladena&#269;ki izgled. Profesionalni tim kozmeti&#269;ara brine se o va&scaron;em tijelu na najbolji na&#269;in i zato je ova oaza ljepote dobila brojne zadovoljne korisnike.Recite zbogom celulitu u Estetskom centru Life Estetic!&nbsp;', 'Mogu&#263;nost pla&#263;anja Amex-om do 6 rata bez kamata i naknadaKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 1 kuponPonuda uklju&#269;uje:&nbsp;10 anticelulitnih tretmana&nbsp;Cjenik mo&#382;ete pogledati ovdjeTrajanje usluge: tretman (60 min.), limfna drena&#382;a (40 min.)Broj tretmana:&nbsp;10Broj dolazaka na tretmane: 5Radno vrijeme:&nbsp;&nbsp;&nbsp; Pon - pet 8 - 20h&nbsp;&nbsp;&nbsp; Sub 8 - 13hObavezna rezervacija&nbsp;termina minimalno 5 dana unaprijed na brojeve telefona (051) 691 602 ili (095) 7544 366Rok iskoristivosti kupona:&nbsp;21.05.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.37283', '14.349003', 1),
(7, 1, 2, 'Summo hrvanje i Aerotrim-spinroller za dvoje za 49 kn', 'Provedite nezaboravan dan u Adrenalin parku Crikvenica', 110, 'Prona&#273;ite svoj pustolovni duh!', '\npotpuno novi turisti&#269;ki sadr&#382;ajpove&#263;ajte razinu adrenalina u krvi i dobro se zabaviteiskoristivo do&nbsp;21.4.2013.', 'Ovaj potpuno novi turisti&#269;ki sadr&#382;aj na Crikveni&#269;koj rivijeri podsjetit &#263;e vas kako &#382;ivot mo&#382;e biti uzbudljiv i zabavan. Pro&#273;ite kroz labirint vise&#263;ih staza smje&scaron;tenih u lijepom &scaron;umarku, bacite se na summo hrvanje, odvrtite ''&#273;ir'' na Aerotrim-spinrolleru, zaigrajte paintball ili se bacite na umjetnu stijenu....U dana&scaron;njoj ponudi Adrenalin parka Crikevenica mo&#382;ete se oku&scaron;ati u igri Summo i zavrtjeti na Aerotrim-spinrolleru! Summo je pravi izazov za posjetitelje adrenalinskog parka! U opravi koja &#263;e od vas napraviti pravog Summo borca mo&#263;i &#263;ete pokazati sve svoje vje&scaron;tine i rasko&scaron; talenta za borbu. Na spinrolleru &#263;ete se osje&#263;ati kao astronaut koji upravo slije&#263;e s mjeseca. Rije&#269; je o prstenima koji se vrte i ispunjavaju vas dodatnim adrenalinom. Svakako ih preporu&#269;ujemo svima koji ih jo&scaron; nisu isprobali!Ovaj park ispunjen je brojnim sadr&#382;ajima. Recimo, mo&#382;ete &nbsp;prelaziti sa stabla na stablo pove&#263;avaju&#263;i razinu adrenalina u krvi. Ekipa iz Adrenalin parka Crikvenica nau&#269;it &#263;e vas kako se na siguran na&#269;in premjestiti s mjesta na mjesto koriste&#263;i razne prolaze (mostovi, platforme, vise&#263;e mostove i sli&#269;no). Adrenalin park pru&#382;a vam obilje noviteta u svladavanju razli&#269;itih vje&#382;bi na stablima. Tako&#273;er, tu je i dio parka prilago&#273;en posebno za djecu. U&#382;ivajte u potpunoj sigurnosti dok svojom ravnote&#382;om i uz malo fizi&#269;ke spreme savladavate razne zanimljive prepreke. Ako dolazite s dru&scaron;tvom svakako odigrajte i partiju paintballa, jednog od &nbsp;najzanimljivijih ekstremnih sportova koji se igraju u prirodnom okru&#382;enju.Do&#273;ite i provedite jedan lijepi dan u Adrenalin parku Crikvenica i do&#382;ivite jedno nezaboravno iskustvo.', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaPonuda uklju&#269;uje: Summo hrvanje (potrebne 2 osobe) i Aerotrim-spinroller (za jednu osobu)Cjenik mo&#382;ete pogledati ovdjeJedan kupon vrijedi za dvije osobeTrajanje usluge: max 30min svakiMinimalna dob za kori&scaron;tenje igara je 14 godinaRadno vrijeme:&nbsp;&nbsp;&nbsp; Svaki dan 9 - 19hRok iskoristivosti kupona: 21.4.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti&nbsp;', '45.186997', '14.67634', 1),
(8, 1, 3, 'Ortopedski ulo&#353;ci po mjeri va&#353;ih stopala uz besplatnu dostavu', 'Za samo 225 kn &#269;eka izrada personaliziranih ortopedskih ulo&#382;aka u Tim ortopediji i besplatna analiza hoda', 450, 'Zakora&#269;ite prema zdravlju', '\nponuda se odnosi na&nbsp;cijelu Hrvatskudostava&nbsp;je uklju&#269;ena u cijenuortopedski ulo&scaron;ci smanjuju optere&#263;enost stopalabesplatna analiza hodavi&scaron;e od 50 godina aktivnog iskustva', 'Ortopedski ulo&scaron;ci &nbsp;za stopala pomo&#263;i &#263;e vam u uklanjanju bolova u nogama, zglobovima, stopalima, koljenima, kukovima i le&#273;ima. Naime, ona pobolj&scaron;avaju udobnost obu&#263;e i smanjuju optere&#263;enost stopala u va&scaron;im dnevnim aktivnostima.&nbsp;Tim ortopedija izradit &#263;e vam personalizirane ulo&scaron;ke prilago&#273;ene rasteretnim to&#269;kama va&scaron;ih stopala pomo&#263;u najsofisticiranijih ortopedskih ure&#273;aja. Napravit &#263;e se i besplatna analiza hoda kako bi se dobila najbolja rje&scaron;enja za va&scaron;a stopala.&nbsp;Tim ortopedija ima vi&scaron;e od 50 godina aktivnog iskustva u proizvodnji, dizajnu i aplikaciji savr&scaron;eno odgovaraju&#263;ih ortopedskih ulo&#382;aka i zato vam jam&#269;i najbolji rezultate.&nbsp;Za va&scaron; korak lak brine se Tim ortopedija!', 'Ponuda se odnosi na cijelu HrvatskuKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 5 kupona na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaPonuda uklju&#269;uje:&nbsp;ortopedske ulo&scaron;ke po mjeri (6 mjeseci garancija)&nbsp;te kompjutersku analizu hodaCjenik mo&#382;ete pogledati ovdjeVlasnici KupiMe kupona ostvaruju pravo na kupnju dodatnog para ortopedskih&nbsp;ulo&#382;aka po promotivnoj cijeni od 135 knDodatni par ulo&#382;aka pla&#263;a se direktno Tim ortopediji prilikom&nbsp;naru&#269;ivanja ili preuzimanja ortopedskih ulo&#382;akaVi&scaron;e o uzimanju otiska stopala mo&#382;ete pro&#269;itati ovdjeProizvod je mogu&#263;e osobno preuzeti na lokaciji:&nbsp;Klovi&#269;eva 2, ZagrebDostava je uklju&#269;ena u cijenuRadno vrijeme:&nbsp; &nbsp; Pon - pet 8.30 - 14.30h&nbsp; &nbsp; Uto 16 - 18hNajava&nbsp;na (01)&nbsp;2363 240Rok iskoristivosti kupona: 28.4.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.819349', '16.008056', 1),
(9, 1, 6, 'Set za pedikuru i manikuru od 15 dijelova za va&#353;a savr&#353;ena stopala', 'Uz ovaj set za pedikuru iz du&#263;ana A je to dobivate torbicu i nau&#353;nice po izboru gratis', 300, 'Neka va&scaron;a stopala uvijek budu uredna', '\nponuda se odnosi na&nbsp;cijelu Hrvatskuu&scaron;tedjet &#263;ete vrijeme i novacgratis torbica i nau&scaron;nice po izborumo&#382;ete naru&#269;iti dostavom ili proizvod osobno preuzeti', 'Od sada &#263;ete svojim stopalima i rukama uvijek mo&#263;i pru&#382;iti savr&scaron;enu manikuru i pedikuru u udobnosti vlastitoga doma! Sve &scaron;to vam treba je ovaj set od 15 dijelova, malo vremena i ne&scaron;to vje&scaron;tine. Pritom &#263;ete u&scaron;tedjeti i vrijeme i novac koje biste tro&scaron;ili na u&#269;estale odlaske kozmeti&#269;kim salonima. Uz ovaj set dobivate i gratis torbicu kako biste ovu opremu mogli sa sobom nositi na putovanja. Set mo&#382;ete naru&#269;iti dostavom ili ga osobno preuzeti u du&#263;anu A je to na Lani&scaron;tu. Svaka korisnica ove ponude dobit &#263;e na poklon i nau&scaron;nice po izboru!S ovom ponudom tvrtke A je to, va&scaron;a &#263;e stopala i ruke uvijek biti pa&#382;eni i ma&#382;eni!', 'Ponuda se odnosi na cijelu HrvatskuKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 2 kupona na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaPonuda uklju&#269;uje:&nbsp;set za manikuru i pedikuru od 15 dijelova, torbicu gratis te nau&scaron;nice po izboru na poklonProizvod se mo&#382;e osobno preuzeti na adresi: A je to - Zagreb, Lani&scaron;te 3aDostava nije uklju&#269;ena u cijenu, pla&#263;a se pouze&#263;em prema va&#382;e&#263;em cjeniku HP-aUz kupljena 2 kupona dostava besplatnaU slu&#269;aju da se odlu&#269;ite na dostavu po&scaron;tom kupon je potrebno zajedno s osobnim podacima, brojem telefona, adresom i brojem odabranog modelanau&scaron;nica&nbsp;proslijediti na e-mail: niteo.ignis12@gmail.comRok iskoristivosti kupona: 31.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.77479', '15.946194', 1),
(10, 1, 5, 'Izbjeljivanje zubi za samo 399 kn u ordinaciji ECG Dental na Korzu', 'Nevjerojatnih 73% popusta za pregled, savjetovanje i upute o oralnoj higijeni, poliranje i izbjeljivanje zubi', 1500, 'Smije&scaron;ak, molimo!', '\nordinacija u centar Rijeke, na samom Korzuindividualan pristupiskoristivo do 15.5.2013.', 'Ova ponuda izmamit &#263;e osmijeh na va&scaron;e lice, ali sada &#263;e taj osmijeh biti ljep&scaron;i, bjelji i blistaviji! U prostorijama Ordinacije ECG Dental o&#269;ekuje vas stru&#269;no osoblje koje &#263;e vam omogu&#263;iti da ve&#263; ovog prolje&#263;a osvajate prekrasnim smije&scaron;kom.Kad se udobno smjestite, va&scaron;i &#263;e zubi biti detaljno pregledani, a tijekom pregleda dobit &#263;ete korisne savjete i upute o najprikladnijem na&#269;inu odr&#382;avanju oralne higijene. Zatim &#263;e va&scaron;i zubi biti dobro ispolirani i izbijeljeni. Jednostavno, kako i zvu&#269;i!ECG Dental je uspje&scaron;na privatna praksa s velikim brojem zadovoljnih pacijenata. Ordinacija se nalazi na samom Korzu, a u njoj se vr&scaron;e pregledi, dijagnostika i lije&#269;enje na specijalisti&#269;koj razini. Zdravstveni i estetski tretmani koje nude prate svjetske standarde kvalitete, a temeljeni su na dugogodi&scaron;njem poha&#273;anju raznih svjetskih kongresa i cjelo&#382;ivotnom u&#269;enju. U terapiji se koriste proizvodi svjetskih brandova dentalne industrije kao i priznate terapijske metode. Svakom pacijentu pristupa se individualno jer je to jedini ispravan put ka obostranom zadovoljstvu.Vidimo se u Ordinaciji ECG Dental!', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 2 kuponaPonuda uklju&#269;uje: &nbsp;izbjeljivanje zubi u ordinaciji&nbsp;ECG DentalCjenik mo&#382;ete pogledati ovdjeRadno vrijeme:Pon - sri - pet 8 -15 h,Uto - &#269;et 13 &nbsp;-20 h,Sub 8 - &nbsp;13 hNajava 5 dana unaprijed na brojeve telefona: (051) 323 701, (092) 1662 042Rok iskoristivosti kupona:&nbsp;15.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.327749', '14.440026', 1),
(11, 1, 2, 'Te&#269;aj latinoameri&#269;kih i standardnih plesova u plesnoj &#353;koli Studio 1 Zadar', 'Nau&#269;ite plesati, zabavite se i rekreirajte uz stru&#269;no osposobljene voditelje', 300, 'Idemo na ples!&nbsp;', '\nzabavna i vrlo u&#269;inkovita rekreacija2x tjedno po 1hutorkom i &#269;etvrtkomrok dolaska na prvi te&#269;aj 02.04.2013.', 'Ne znate plesati, a htjeli biste nau&#269;iti? Nema problema, samo do&#273;ite u plesnu &scaron;kolu&nbsp;Studio 1 Zadar&nbsp;u kojoj vas &#269;ekaju stru&#269;no osposobljeni voditelji s puno plesnih koraka u nogama. Kroz 8 punih sati dobit &#263;ete instrukcije iz najpopularnijih i najomiljenijih plesova. Vrlo brzo &#263;ete osjetiti pravu &#269;aroliju plesa. U&#269;it &#263;ete plesne figure, nau&#269;it &#263;ete plesni bonton, kako se pravilno dr&#382;ati i &nbsp;kako hvatati ritam. Atmosfera na te&#269;aju uvijek je odli&#269;na i zabavna, pa &#263;ete sigurno sklopiti i nova poznanstva. Osim toga, ne smijemo smetnuti s uma da je plesanje sigurna, zabavna i vrlo u&#269;inkovita rekreacija. Ovdje su ve&#263; nakon prvog sata proplesali mnogi polaznici s dvije lijeve noge, pa za&scaron;to ne biste i vi?Do&#273;ite u&nbsp;Studio 1 Zadar!&nbsp;', 'Ponuda vrijedi samo za nove &#269;lanoveKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 3 kuponaPonuda uklju&#269;uje: te&#269;aj Latinoameri&#269;kih standardnih plesovaBroj treninga: 8 x 60 min (2x tjedno po 1h)Cjenik mo&#382;ete pogledati ovdjeRadno vrijeme:&nbsp;&nbsp;&nbsp; Svaki dan 19 - 22hNajava po zavr&scaron;etku ponude na broj (091) 6479 977Rok dolaska na prvi sat:&nbsp;02.04.2013.Rok iskoristivosti kupona: 01.05.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti&nbsp;', '44.120528', '15.233628', 1),
(12, 1, 6, 'Kvalitetni no&#382;evi od nehr&#273;aju&#263;eg &#269;elika oblo&#382;eni kerami&#269;kom oblogom', 'Opremite kuhinju setom no&#382;eva s kerami&#269;kom oblogom iz BergHOFF', 0, 'BergHOFF kvaliteta', '\nponuda se odnosi na&nbsp;cijelu Hrvatskuvisokokvalitetni nehr&#273;aju&#263;i &#269;elik&nbsp;oznake x30Cr14 s kerami&#269;kim premazomne zadr&#382;avaju mirise i okuse hraneodaberite crni ili bijeli set', '&#381;elite li da va&scaron; obrok ispadne ba&scaron; kako treba, mora po&#269;eti besprijekornom pripremom namirnica! Rezanje, sjeckanje, filetiranje i ukra&scaron;avanje ne&#263;e biti komplicirano ako koristite no&#382;eve koji zbog svojstva kerami&#269;kog premaza lagano klize kroz namirnice. A zamislite tek da miris i okus &#269;e&scaron;njaka i luka ne osjetite jo&scaron; dugo nakon kori&scaron;tenja! Kod BergHOFF no&#382;eva i to je mogu&#263;e - zbog kvalitete kerami&#269;kog premaza i svojstava same keramike. Preporu&#269;ujemo ru&#269;no pranje kako bi o&scaron;trice &scaron;to du&#382;e ostale tanke i &scaron;to o&scaron;trije. &#381;elite li da va&scaron; glavni alat u kuhinji bude moderan i besprijekoran, odaberite BergHOFF no&#382;eve - &nbsp;vrhunska kvaliteta za nisku cijenu!&nbsp;Ovaj set kerami&#269;kih no&#382;eva sastoji se od no&#382;a od 20 cm santoku,&nbsp;japanskog no&#382;a od 18 cm,&nbsp;univerzalnog no&#382;a od 15 cm te&nbsp;no&#382;a za guljenje/lju&scaron;tenje od 9 cm. Mo&#382;ete odabrati set bijelih ili crnih no&#382;eva ili oba.&nbsp;&nbsp;Va&scaron;a kuhinja zaslu&#382;uje&nbsp;BergHOFF&nbsp;kvalitetu!', 'Ponuda se odnosi na cijelu HrvatskuKupon se mo&#382;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 5 kupona na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaPonuda uklju&#269;uje: set no&#382;eva (4) s kerami&#269;kom oblogom&nbsp;u boji po izboruPreporu&#269;ujemo ru&#269;no pranjePreuzimanje isklju&#269;ivo putem dostave (iznosi 25kn, a pla&#263;a se pouze&#263;em)Nakon kupovine&nbsp;potrebno se javiti na e-mail: info@cook-co.com.hr kako bi odmah rezervirali&nbsp;&#382;eljeni proizvod s obzirom da su koli&#269;ine proizvoda ograni&#269;ene te poslati&nbsp;zajedno s KupiMe kuponom,&nbsp;osobnim podacima, brojem telefona, adresom dostave te odabranom bojom setaRok isporuke: odmah po primitku kuponaRadno vrijeme za upite:&nbsp; &nbsp; Pon - pet 10 - 13hRok iskoristivosti kupona: 10.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '', '', 1),
(13, 1, 7, 'Inteligentna kanta za otpatke', 'Funkcionalne kante za sme&#263;e s infracrvenim senzorom za otvaranje i zatvaranje poklopca iz PMB Aedificium d.o.o.', 0, 'Kanto, otvori se!', '\ninteligentna kanta od inoxa u va&scaron;oj kuhinjizapremina za otpatke 48 litaramala potro&scaron;nja strujeiskoristivo do 1.5.2013.', 'Tko bi rekao da &#263;e jednog dana kante za sme&#263;e biti na glasu kao inteligentna bi&#263;a? No, ova kanta to doista i je! &nbsp;Od sada mo&#382;ete biti sigurni da &#263;e sme&#263;e koje bacate, umjesto na poklopcu, zavr&scaron;iti u unutra&scaron;njosti kante. I to iz prvog poku&scaron;aja!&nbsp;Ugra&#273;eni infracrveni senzor koji se nalazi na poklopcu kante, automatski se otvara kada pribli&#382;ite ruku ili predmet koji &#382;elite baciti te se nakon pet sekundi, tako&#273;er i sam zatvara. Ova inteligentna kanta za sme&#263;e napravljena je od inoxa, krasi je moderan dizajn i 48 litara zapremine.&nbsp;To je kanta kakvu va&scaron;a kuhinja treba!', 'Ponuda se odnosi na cijelu HrvatskuKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 1 kuponPonuda uklju&#269;uje: senzorsku kantu za otpatkeSpecifikacije:- zapremina za otpatke 48 litara- infracrveni senzor za otvaranje i zatvaranje poklopca- INOX ku&#263;i&scaron;te- automatsko zatvaranje poklopca 5 sekundi nakon otvaranja- rad na baterije- mala potro&scaron;nja struje- moderan dizajnCjenik mo&#382;ete pogledati ovdjeMogu&#263;e je po&scaron;iljku preuzeti osobno na adresi prodajnih mjestaU slu&#269;aju dostave po&scaron;tarina se pla&#263;a prema va&#382;e&#263;em cjeniku HP ExpresaKupon je potrebno zajedno s osobnim podacima, brojem telefona te adresom dostave proslijediti na e-mail: info@pmb.com.hrPo&scaron;iljka se &scaron;alje u roku 2 radna dana od primitka kuponaRok iskoristivosti kupona: 1.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.815162', '16.098061', 1),
(14, 1, 8, 'Predstava Diplomac u Komediji 3. travnja', 'U 19.30 sati do&#273;ite pogledati neobi&#269;nu ljubavnu pri&#269;u u kazali&#353;te Komedija', 60, 'Ljubavni odnos starije &#382;ene i mladog mu&scaron;karca uvijek izaziva burne rasprave...', '\nrekvijem za snove koje je jednom sanjala gospo&#273;a Robinsonpri&#269;a o ljubavnom odnosu starije &#382;ene i mla&#273;eg neiskusnog mu&scaron;karcasukob generacija prikazan je preciznom metodom u kojoj se vje&scaron;to isprepli&#263;u smijeh i o&#269;ajizvrsna gluma&#269;ka postava', 'On uskoro navr&scaron;ava dvadeset i jednu godinu. Upravo su zavr&scaron;ile &#269;etiri mukotrpne godine &scaron;kolovanja. ?etiri godine koje nisu slu&#382;ile ni&#269;emu. Roditelji od njega o&#269;ekuju velike stvari, sjajnu karijeru i &#382;ivotne uspjehe kojima &#263;e izazivati zavist prijatelja na domjencima i nedjeljnim ro&scaron;tiljima. On to ne &#382;eli, &scaron;tovi&scaron;e, prezire isprazan &#382;ivot kakav imaju njegovi roditelji. Uhva&#263;en u stupicu roditeljskih o&#269;ekivanja pani&#269;no poku&scaron;ava prona&#263;i izlaz.Ona je udana &#382;ena, majka, gotovo dvostruko starija od njega. Na prvi pogled njezin je &#382;ivot bajka, ima odgovornog supruga i poslu&scaron;nu k&#263;er, lijepu ku&#263;u s bazenom, solidan bankovni ra&#269;un. Ipak, ona je duboko nesretna i razo&#269;arana, biv&scaron;a alkoholi&#269;arka koja se ne boji sasuti istinu u lice. Prijatelji je smatraju ekscentri&#269;nom i nastoje ne primje&#263;ivati njezinu tugu. Koprcaju&#263;i se bespomo&#263;no u mre&#382;i ameri&#269;kog sna, ona &#263;e prona&#263;i utjehu u jedinoj iskrenoj osobi koju poznaje.Oboje pronalaze spas u prijevari, hrane&#263;i se me&#273;usobno bolnom iskreno&scaron;&#263;u. I svjesni su da njihova veza nije ljubav, ve&#263; potreba &ndash; jedino u tom odnosu osje&#263;aju se &#382;ivi. I kao &scaron;to je vrlo tanka linija izme&#273;u prijevare i iskrenosti, tako je tanka linija izme&#273;u ljubavi i mr&#382;nje. Osobito kada se on neplanirano zaljubi u njezinu k&#263;er.Vidimo se u Komediji!', 'Kupon je mogu&#263;e koristiti 3.4.2013.Uplatu putem op&#263;e uplatnice je potrebno izvr&scaron;iti u roku 24 sata i poslati na info@kupime.hr kako biste mogli isprintati kuponS obzirom da je broj kupona ograni&#269;en &nbsp;kupljene kupone nije mogu&#263;e storniratiJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponaPonuda uklju&#269;uje:&nbsp;ulaznicu za predstavu &quot;Diplomac&quot;&nbsp;koja se odr&#382;ava 3. travnja u 19.30h u Kazali&scaron;tu Komedija, Kaptol 9Kuponi se mogu zamijeniti za ulaznice na blagajni kazali&scaron;ta sat i pol prije po&#269;etka predstave i na blagajni Oktogon, Ilica 5, radnim danom od 8 do 17h, subotom od 8 do 13hU slu&#269;aju otkazivanja predstave izvr&scaron;it &#263;e se povrat upla&#263;enog novcaRok iskoristivosti kupona: 3.4.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e iskoristiti', '45.816358', '15.97823', 1),
(15, 1, 7, 'Ostvarite san i vozite Ferrari na pisti u Italiji', 'Dok mu&#353;karci isku&#353;avaju nezaboravan osje&#263;aj vo&#382;nje Ferrarija ili Lamborghinija na stazi kod Udina, &#382;ene mogu u&#382;ivati u shoppingu', 1512, 'U&#382;ivajte do daske!', '\nmogu&#263;nost pla&#263;anja Amexom do 6 rata bez kamata i naknadaponuda se odnosi na cijelu Hrvatskupotvrda o polo&#382;enom te&#269;aju za upravljanje sportskim vozilimavozila su potpuno kasko osigurana i nema nadoplate za gorivo', '  &lt;object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="350" height="231" id="video" align="middle"&gt;&lt;param name="allowScriptAccess" value="sameDomain" /&gt;&lt;param name="allowFullScreen" value="false" /&gt;&lt;param name="movie" value="video.swf" /&gt;&lt;param name="quality" value="high" /&gt;&lt;param name="bgcolor" value="#000000" /&gt;    &lt;embed src="video.swf" quality="high" bgcolor="#000000" width="350" height="231" name="video" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /&gt;&lt;/object&gt;Voziti Ferrari, ponos Italije i automobilske industrije, san je svakog voza&#269;a i ljubitelja automobilizma! Zato ne propustite priliku da sjednete za volan Ferrarija 430 ili Lamborghini Gallarda i u&#382;ivate u vo&#382;nji na stazi Circuito Internazionale del Friuli u gradi&#263;u Precenicco koji se nalazi 30 km od Udina i 60 km od Trsta.Po dolasku na stazu imat &#263;ete kratki briefing s organizatorom na kojem &#263;ete biti upoznati s tehni&#269;kim detaljima i instrukcijama o sigurnosti. Zatim &#263;ete kao suvoza&#269; napraviti 2 kruga po pisti u luksuznom SUV vozilu kako biste &scaron;to bolje upoznali stazu. I tada slijedi ono pravo, samostalna vo&#382;nja stazom u odabranom automobilu - Ferrariju 430 ili Lamborghini Gallardu! Mo&#382;ete odabrati varijantu s 2, 3 ili 4 kruga. Nakon svega, dobit &#263;ete potvrdu o polo&#382;enom te&#269;aju za upravljanje sportskim vozilima!U&#382;ivajte kao nikad do sada za volanom!', 'Ponuda se odnosi na cijelu HrvatskuMogu&#263;nost pla&#263;anja Amexom do 6 rata bez kamata i naknadaKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 5 kupona na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaJedan kupon vrijedi za jednu osobuPonuda uklju&#269;uje: 2, 3 ili 4 kruga&nbsp;samostalne vo&#382;nje Ferarija 430 ili Lamborginija Gallardo u trajanju od cca 30minNeovisno o broju odabranih krugova ponuda uklju&#269;uje:-&nbsp;tehni&#269;ke instrukcije i instrukcije iz sigurnosti-&nbsp;dva kruga za upoznavanje kao suvoza&#269; u luksuznom SUV vozilu- potvrdu o upravljanju sportskih vozilaSva su vozila potpuno kasko osigurana i nema nadoplate za gorivoCjenik mo&#382;ete pogledati ovdjeLokacija:&nbsp;Circuito Internazionale del Friuli, Via Valle Hierschel 2, Precenicco (UD)Rok iskoristivosti kupona: 15.9.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.734224', '13.074417', 1),
(16, 1, 5, 'Frizerska usluga za djecu ili odrasle, mu&#353;karce ili &#382;ene', 'Za 25 kn birajte organsku masku, pranje i feniranje za &#382;ene, dje&#269;je pranje i &#353;i&#353;anje ili mu&#353;ko pranje i &#353;i&#353;anje u centru Mia', 70, 'Odaberite najbolju opciju za sebe i svoju obitelj', '\norganska maska, pranje i feniranjedje&#269;ije &scaron;i&scaron;anje i pranjemu&scaron;ko &scaron;i&scaron;anje i pranjeiskoristivo do 15.5.2013.', 'Centar zdravlja i ljepote Mia pravi je obiteljski salon u kojem, po super cijeni, svakog &#269;lana va&scaron;e obitelji o&#269;ekuje vrhunska frizerska usluga! Procijenite &#269;iji je red da sada ide kod frizera, ili zanemarite filozofske rasprave i do&#273;ite svi zajedno, svatko sa svojim kuponom!Svaka &#382;ena koja iskoristi ovaj kupon, mo&#382;e biti uvjerena da &#263;e njena kosa dobiti novu snagu i sjaj. Nakon pranja, na kosu &#263;e se staviti organska maska koja &#263;e je dubinski njegovati i hraniti. Cijeli taj proces zavr&scaron;it &#263;e prekrasnom fen frizurom. Mu&scaron;karci mogu odahnuti jer ih o&#269;ekuju pranje i &scaron;i&scaron;anje kojim &#263;e biti 100% zadovoljni. Padne li izbor na frizersku uslugu za dijete, o&#269;ekuje ga pranje i &scaron;i&scaron;anje nakon kojih &#263;e napokon zavoljeti odlaske kod frizera!Vidimo se u Centru zdravlja i ljepote Mia!', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 2&nbsp;kupon na svoje imeJedna osoba mo&#382;e pokloniti 2 kuponPonuda uklju&#269;uje&nbsp;frizersku usluga po izboru za 25 kn:- organsku masku, pranje i feniranje- dje&#269;ije &scaron;i&scaron;anje i pranje-&nbsp;mu&scaron;ko &scaron;i&scaron;anje i pranjeJedan kupon vrijedi za jednu osobuCjenik mo&#382;ete pogledati ovdjeRadno vrijeme:Pon- pet 08-21,sub 08-14Najava 3 dana unaprijed na&nbsp;(098) 831 261 ili (099) 1960 836Ka&scaron;njenje do 15 min se tolerira, a nakon toga se gubi terminOtkaz rezervacije&nbsp;minimalno 24 h prijeRok iskoristivosti kupona: 15.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '43.519505', '16.454762', 1),
(17, 1, 7, 'Izmjenu guma donosi AMC Glavan', 'Za 99 kn &#269;eka vas monta&#382;a, demonta&#382;a, balansiranje i postavljanje guma na vozilo do dimenzije 16cola', 244, 'Pobrinite se za gume svog ljubimca', '\nza osobna vozila i gume od 12? - 16?, za aluminijske i &#269;eli&#269;ne felgejedan kupon vrijedi za jedno voziloiskoristivo do 26.4.2013.', 'Uz predane automehani&#269;are,&nbsp;AMC Glavan&nbsp;&nbsp;je opremljen suvremenom dijagnostikom koja im poma&#382;e u kvalitetnom obavljanju posla. Odvezite svoj automobil u AMC Glavan gdje &#263;e mu napraviti izmjenu guma i pripremiti ga za nove cestovne izazove.AMC Glavan je poznat na tr&#382;i&scaron;tu po besprijekornoj kvaliteti te konstantnom razvoju i ulaganju u nove tehnologije i znanje. Izgradnjom prijateljskih odnosa &#382;ele pridonijeti za&scaron;titi interesa svojih poslovnih partnera, kupaca, okoline gdje &#382;ive i rade. Nove tehnologije i visoki zahtjevi tr&#382;i&scaron;ta poti&#269;u ih na nova ulaganja u tehnologiju, znanje i profesionalni razvoj zaposlenika. Definitivno partner kakvog &#382;elite na svojoj strani!Svakako do&#273;ite u AMC Glavan i pripremite ljubimca na &#269;etiri kota&#269;a za nove izazove!', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1&nbsp;kupona na svoje imeJedna osoba mo&#382;e pokloniti 2 kupona1 kupon = 1 voziloPonuda uklju&#269;uje: demonta&#382;u, montiranje i balansiranje, postavljanje gume na voziloPonuda vrijedi za osobna vozila i gume od 12? - 16?, za aluminijske i &#269;eli&#269;ne felgeCjenik mo&#382;ete pogledati ovdjeRadno vrijeme:Pon-pet (9-17h),sub (8-13h)Najava 1 dan unaprijed na (051) 218 036 ili (091) 2938 433Rok iskoristivosti kupona: 26.4.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti&nbsp;', '45.325577', '14.473414', 1),
(18, 1, 5, 'Prvoklasna manikura i njega stopala u centru Mia', 'Za samo 98 kn &#269;ekaju vas vrhunska njega stopala i manikura s lakiranjem', 200, 'Uredite ruke i stopala', '\ntretman manikure i njega stopala po odli&#269;noj cijenikvalitetno i ljubazno osobljeiskoristivo do 15.5.2013.', 'Iako bez rije&#269;i, lijepe ruke i stopala govore mnogo. Ba&scaron; zato &#382;ene toliko vole tretmane manikure i&nbsp;njege stopala.&nbsp;Sada, kada dolazi vrijeme zatopljenja, va&scaron;i &#263;e prsti&#263;i biti jo&scaron; izlo&#382;eniji pogledima jer &#263;ete se vi&scaron;e kretati po vani, a no&#382;ni &#263;e prsti kroz sandale provirivati na zrak. U centru Mia vode ra&#269;una o tome pa su vam omogu&#263;ili tretmane manikure i njege stopala po super cijeni.Manikura s lakiranjem napravit &#263;e od va&scaron;ih ruku prave male dragulje. Cure iz salona &#263;e se pobrinuti da nahrane ko&#382;u, odstrane suvi&scaron;nu ko&#382;u, zatim &#263;e urediti i oblikovati nokte, nanijeti lak i time zaokru&#382;iti ovaj proces. U istom posjetu va&scaron;a &#263;e se umorna stopala opustiti kroz osvje&#382;avaju&#263;u kupku, a zatim &#263;e slijediti obrada kompletnog stopala i noktiju.&nbsp;Do&#273;ite u centar Mia i u&#269;inite ruke i stopala prekrasnima!&nbsp;&nbsp;', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 2 kupona na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaPonuda uklju&#269;uje:&nbsp;njegu stopala (osvje&#382;avaju&#263;u kupku, lakiranje obradu kompletnog stopala i noktiju) i manikuru sa lakiranjemCjenik mo&#382;ete pogledati ovdjeRadno vrijeme:&nbsp; &nbsp; Pon - pet 8 - 21h&nbsp; &nbsp; Sub 8 - 14hTolerira se ka&scaron;njenje do 15min, nakon toga gubite pravo na termin i usluguOtkazivanje rezervacije potrebno je u&#269;initi najmanje 24h prije zakazanog termina jer u protivnom gubite pravo na terminNajava 4 dana unaprijed na (098) 831 261 ili (099) 1960 836, pon - pet od 13 do 16hRok iskoristivosti kupona: 15.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '43.519536', '16.454794', 1),
(19, 1, 5, 'Bradavice, gljivice, uklonite ih s garancijom', 'Odaberite gel za skidanje bradavica (35 ml) ili gel protiv gljivica na noktima (60 ml), na prirodnoj bazi, 100% u&#269;inkovite i s garancijom povrata 15 dana', 100, 'Najbolja rje&scaron;enja su prirodna rje&scaron;enja', '\nponuda se odnosi na cijelu Hrvatsku&nbsp;isklju&#269;ivo prirodni sastojci100% u&#269;inkovitiukoliko niste zadovoljni s proizvodom&nbsp;mo&#382;ete zatra&#382;iti povrat unutar 15 danaproizvod se radi po narud&#382;bi i nije za prodaju u trgova&#269;koj mre&#382;i', 'Rosopas gel u&#269;inkovito uklanja bradavice lica, tijela, stopala i vise&#263;e bradavice. Napravljen je isklju&#269;ivo od prirodnih sastojaka pa nije agresivan prema va&scaron;oj ko&#382;i, ali bradavice uklanja u&#269;inkovito. Sedam puta je ja&#269;i nego klasi&#269;ni gel pa uklanja i tzv. vise&#263;e bradavice, one koje su spojene s ko&#382;om preko uske niti. One koje su manje ili u za&#269;etku, su&scaron;e se br&#382;e. Vi&scaron;e uputa pro&#269;itajte na www.kozniproblemi.com.hr. Za tretiranje bradavica na stopalu potrebna je i jedna mineralna kupelj (500 g) u vrijednosti 50 kn. Da se bradavice ne bi prenosile, u ponudi Studija za ko&#382;ne probleme i neugode mo&#382;ete prona&#263;i i specijalni biljni &scaron;ampon Protektor-B (500 ml). On spre&#269;ava razvoj bradavica i bilo kojih &scaron;tetnih mikroorganizama na ko&#382;i. Njeguje ko&#382;u, djeluje kao super peeling i odstranjuje mrtvu ko&#382;u. Ko&#382;a postaje glatka te uklanja sve neugodne mirise. Ako ste izuzetno osjetljive sluznice u intimnom predjelu, mo&#382;ete prona&#263;i i ne&scaron;to bla&#382;i gel. Preporu&#269;uje se redovna upotreba &scaron;ampona za intimnu njegu (5000 ml) kojeg mo&#382;ete nabaviti za 80 kn.&nbsp;Gel protiv gljivica na noktima na nogama izra&#273;en je od prirodnih sastojaka te je stopostotno u&#269;inkovit: u roku 24h postat &#263;ete ponosni vlasnik stopala bez gljivica! Kako se one ne bi vratile, gel je potrebno koristiti svakodnevno vi&scaron;e mjeseci, odnosno dok ne izraste zdravi nokat. Gel protiv gljivica se po&#269;inje nanositi nakon detaljne temeljne pedikure i pravilne dijagnoze koju mo&#382;ete obaviti u kozmeti&#269;kom salonu u Kranj&#269;evi&#263;evoj 21&nbsp;(01/5583 740). Cijena pedikure je oko sto kuna, a uklju&#269;ena je i dijagnoza&nbsp;stopala. Ako smatrate da su va&scaron;a stopala &bdquo;te&#382;i slu&#269;aj&ldquo; onda se preporu&#269;uje dodatno kori&scaron;tenje mineralne kupelji tijekom dvadeset dana koja dolazi u pakiranju od petsto grama, a dodatno se napla&#263;uje pedeset kuna. Po&#382;eljno je da tijekom terapije budete u kontaktu s djelatnicima studija radi savjeta i konzultacija.&nbsp;Neka gljivice i bradavice napokon postanu stvar pro&scaron;losti!', 'Ponuda se odnosi na cijelu HrvatskuKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 10 kupona na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponaPonuda uklju&#269;uje: gel za skidanje bradavica (35ml) ili gel protiv gljivica noktiju (60ml)Cjenik i detaljnije mo&#382;ete pogledati ovdje&nbsp;i ovdjeDostava nije uklju&#269;ena u cijenuCijena dostave iznosi cca&nbsp;20 kn za cijelu HrvatskuU slu&#269;aju dostave kupon je potrebno zajedno s osobnim podacima, brojem telefona, adresom dostave te nazivom odabranog proizvoda proslijediti na e-mail: kozni.problemi@hi.t-com.hrProizvode je mogu&#263;e i osobno preuzeti uz predo&#269;enje kupona na lokaciji: Tratinska 75/I - Studio za ko&#382;ne probleme, srijedom od 14 do 19hUkoliko niste zadovoljni s proizvodom mo&#382;ete zatra&#382;iti povrat unutar 15 danaProizvod se radi po narud&#382;bi i nije za prodaju u trgova&#269;koj mre&#382;iTelefonski kontakt se ostvaruje na va&scaron; zahtjev putem e-maila:&nbsp;kozni.problemi@hi.t-com.hrRok iskoristivosti kupona: 26.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.800428', '15.956365', 1),
(20, 1, 4, 'Online te&#269;aj engleskog u Lingua grupi za samo 179 kn', 'Od sada mo&#382;ete u&#269;iti engleski gdje god &#382;elite', 450, 'Engleski se najbolje u&#269;i online', '\nponuda se odnosi na cijelu Hrvatskuonline te&#269;aj engleskog jezika razine A1, A2 ili Bpredavanja u&#382;ivo 4 x tjednovje&#382;be i zadaci su dostupni 0 - 24hpotvrda o odslu&scaron;anom te&#269;aju', 'Ako pada ki&scaron;a ostanite u ku&#263;i u toplom, ako je lijep i sun&#269;an dan opustite se na terasi ili u parku na svje&#382;em zraku. Samo ponesite laptop ili tablet sa sobom i u&#269;ite engleski ondje gdje vam najvi&scaron;e odgovara. As simple as that!Uz online te&#269;ajeve Lingua grupe znanje je dostupno svima - uvijek i svugdje. Za samo 179 kuna mjese&#269;no dobivate neograni&#269;en pristup virtualnoj u&#269;ionici u trajanju od mjesec dana. Ponuda uklju&#269;uje 4 predavanja tjedno, interaktivne vje&#382;be, zadatke i kvizove znanja. Nikakvi ud&#382;benici vam nisu potrebni, sve materijale&nbsp;koji vam trebaju imate online. Kod prvog posjeta virtualnoj u&#269;ionici pi&scaron;ete online ispit znanja na temelju kojeg&nbsp;&#263;ete biti raspore&#273;eni u odgovaraju&#263;e grupe (A1, A2 i B). Nakon zavr&scaron;enog jednomjese&#269;nog te&#269;aja dobit &#263;ete potvrdu o odslu&scaron;anom te&#269;aju. Nakon &#269;etiri mjeseca mo&#382;ete polagati ispit i dobiti diplomu. Upisi traju tijekom cijele godine i u nastavu se mo&#382;ete priklju&#269;iti u bilo kojem trenutku.Sounds good? Onda se vidimo! Vi odaberite mjesto i vrijeme.', 'Ponuda se odnosi na cijelu HrvatskuKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 4 kupona na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaJedan kupon vrijedi za jedan mjesec poha&#273;anja online te&#269;ajaNakon zavr&scaron;enog jednomjese&#269;nog te&#269;aja dobit &#263;ete potvrdu o odslu&scaron;anom te&#269;ajuNakon &#269;etiri odslu&scaron;ana mjeseca dobit &#263;ete certifikat o poznavanju jezika odre&#273;enog stupnjaPonuda uklju&#269;uje: online te&#269;aj engleskog jezika&nbsp;A1,A2 ili B razineTe&#269;aj po&#269;inje svakog mjesecaCjenik mo&#382;ete pogledati ovdjeDetaljnije o te&#269;aju mo&#382;ete pro&#269;itati ovdjeTrajanje usluge: mjesec danaOdr&#382;avanje:&nbsp;4 x tjedno po 35 minVje&#382;be i zadaci su dostupni 0 - 24hUkoliko propustite predavanje, na LMS-u vas &#269;eka kratki video sa&#382;etak predavanjaPrije po&#269;etka te&#269;aja svaki polaznik se testira i smje&scaron;ta u razinu/grupu kojoj pripadaNajava nakon primitka kupona&nbsp;na info@linguagrupa.hrRok iskoristivosti kupona: 1.6.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.805649', '15.974175', 1);
INSERT INTO `ponude` (`id`, `id_prodavatelja`, `id_kategorije`, `naslov`, `podnaslov`, `cijena`, `opis_naslov`, `opis_kratki`, `opis`, `napomena`, `karta_x`, `karta_y`, `aktivan`) VALUES
(21, 1, 5, 'Tri intenzivne anticelulitne masa&#382;e u salonu Anabel', 'Rije&#353;ite se naran&#269;ine kore uz anticelulitne masa&#382;e s preparatom za intenzivno uklanjanje celulita', 480, 'Zbogom celulitu', '\nnajpopularnija i najpristupa&#269;nija metoda uklanjanja masnih nakupinatonizira i u&#269;vr&scaron;&#263;ujeko&#382;u te pobolj&scaron;ava cirkulacijukoristit &#263;e se&nbsp;preparat za intenzivno uklanjanje celulitaponuda se odnosi&nbsp;samo na&nbsp;&#382;ene', 'Ne dopustite da vam ovog prolje&#263;a izgled naru&scaron;avaju neugledne nakupine celulita! Uklonite ih pomo&#263;u anticelulitne masa&#382;e, zasigurno najpopularnije i najpristupa&#269;nije metode uklanjanja ovih napornih masnih nakupina. Dana&scaron;nja ponuda uklju&#269;uje 3 anticelulitne masa&#382;e u salonu za uljep&scaron;avanje i njegu tijela Anabel.&nbsp;Anticelulitna masa&#382;a vrlo je u&#269;inkovita u smislu eliminacije celulita kao i toniziranja, ve&#263;e &#269;vrsto&#263;e i sjaja ko&#382;e i pobolj&scaron;ane cirkulacije. Njena je velika prednost i to &scaron;to se tijekom masa&#382;e tretiraju to&#269;no oni dijelovi tijela pogo&#273;eni celulitom. Da bi se postigli jo&scaron; bolji rezultati, u ovim tretmanima koristit &#263;e se preparat za intenzivno uklanjanje celulita.&nbsp;Pozdravite se s celulitom u salonu Anabel u Zapru&#273;u!', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 2 kupona na svoje imeJedna osoba mo&#382;e pokloniti 2 kuponaPonuda se odnosi samo na&nbsp;&#382;enePonuda uklju&#269;uje: 3 anticelulitne masa&#382;e u trajanju od 45min svakaCjenik mo&#382;ete pogledati ovdjeU tretmanu se koristi preparat za intenzivno uklanjanje celulita te se ne preporu&#269;uje trudnicama, osobama koje imaju problema s venama i osobama s neurodermatitisomRadno vrijeme:&nbsp; &nbsp; &nbsp;Pon - pet 10 - 20h&nbsp; &nbsp; Sub 10 - 15hNajava 3 dana unaprijed na&nbsp;(099) 4052 086 ili (092) 2387 625Rok iskoristivosti kupona: 1.7.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.780162', '15.995278', 1),
(22, 1, 4, 'Upi&#353;ite te&#269;aj za voditelja brodice u Nika nautici', 'Steknite uvjerenje o osposobljenosti za voditelja brodice kategorije B koja vrijedi do&#382;ivotno za samo 199 kn', 0, 'Zaplovite morem...', '\npod stru&#269;nim vodstvom jednog od najboljih predava&#269;a u Hrvatskojjednom ste&#269;ena dozvola vrijedi do&#382;ivotnotermini odr&#382;avanja te&#269;aja: 14., 20. ili &nbsp;27.4. 2013.', 'Otkrijte ljepote na&scaron;ih otoka, uvala i pla&#382;a za kormilom brodice! Kroz jednodnevni te&#269;aj u Nika nautici nau&#269;it &#263;ete sve o navigaciji, motoristici, pomorstvu, meteorologiji, radiofoniji i sigurnosti na moru. Te&#269;aj se odr&#382;ava pod stru&#269;nim vodstvom jednog od najboljih predava&#269;a u Hrvatskoj, s dugogodi&scaron;njim iskustvom u programima voditelja brodice.Jednom ste&#269;ena dozvola vrijedi do&#382;ivotno, a s te&#269;ajem za voditelja brodice B kategorije osposobljeni ste upravljati brodicom za osobne potrebe du&#382;ine do 12 metara ili 30 brutto tona, bez ograni&#269;enja snage motora i bez ograni&#269;enja zone plovidbe u na&scaron;em teritorijalnom moru.Postanite pravi morski vuk uz Nika nautiku!', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 20 kuponaIspit za voditelja brodice kategorije B mo&#382;e polagati osoba koja ima najmanje navr&scaron;enih 16 godina &#382;ivota (&#269;l. 52. Pravilnika o brodicama i jahtama iz Pomorskog zakonika)Ponuda uklju&#269;uje:&nbsp;jednodnevni te&#269;aj za voditelja brodice B kategorije u trajanju od 8h&nbsp;(navigacija, motoristika, pomorstvo, meteorologija, radiofonija, sigurnost na moru)Cjenik mo&#382;ete pogledati ovdjeTermini odr&#382;avanja te&#269;aja: 14., 20. ili &nbsp;27.4. 2013. (te naknadno u 5. i 6.mjesecu)Te&#269;aj se odr&#382;ava na lokaciji Marti&#263;eva 67/IUvjerenje o osposobljenosti za voditelja brodice, kategorije B, ima valjanost bez vremenskog ograni&#269;enjaCijena ispita nije ura&#269;unata u cijenu - iznosi 475 kn i pla&#263;a se Ministarstvu mora prometa i infrastrukture&nbsp;(420 kn ispit, 15 kn tisak dozvole, 40 kn biljezi)Kako cijenu tako i termine ispita mo&#382;ete provjeriti kod Ministarstva (obi&#269;no se odr&#382;avaju 2 - 3 puta mjese&#269;no)Potrebno je prilo&#382;iti 2 fotografije u boji (3x 2,5cm), osobnu iskaznicu i voza&#269;ku dozvolu (ako je posjedujete)Najava odmah po primitku kupona na (091) 1536 041 &nbsp;Rok iskoristivosti kupona: 29.4.2013. (do tada se potrebno javiti)Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.813045', '15.99692', 1),
(23, 1, 6, 'Super bicikli za dje&#269;ake ili djevoj&#269;ice od 4 do 8 godina', 'Naru&#269;ite iz Webneta bicikle primjerene uzrastu va&#353;eg djeteta', 759, 'Klinci, idemo na bicikle...', '\ngume sa zra&#269;nicom, prednje i zadnje ko&#269;niceguvernal od &#269;elika i pomo&#263;ni kota&#269;iveli&#269;ina 16&rdquo;do 40 kg te&#382;inedjeca 4 - 8 godina', 'Neka ovog prolje&#263;a va&scaron;i klinci sjednu za volan svog novog bicikla. Preko zime su vjerojatno narasli, pa im je potreban novi bicikl. Naime, ako im je bicikl premali, dijete &#263;e udarati koljenima po volanu, &scaron;to nije dobro za sigurnost vo&#382;nje.U dana&scaron;njoj ponudi su bicikli za djevoj&#269;ice ili dje&#269;ake od 4 do 8 godina. Oni imaju gume sa zra&#269;nicom, prednje i zadnje ko&#269;nice i guvernal od &#269;elika. Tako&#273;er imaju pomo&#263;ne kota&#269;e jer - sigurno je sigurno!Razveselite svoje klince novim biciklima!', 'Ponuda se odnosi na cijelu HrvatskuKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 2 kupona na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponaJedan kupon = jedan biciklPonuda uklju&#269;uje:&nbsp;bicikl za djevoj&#269;ice ili dje&#269;ake veli&#269;ine 162&rdquo; do 40 kg te&#382;ine za dob 4 - 8 godinaDje&#269;ji bicikl 1630Bicikl za dje&#269;ake Spider 1676Proizvod je mogu&#263;e osobno preuzeti na lokaciji:&nbsp;Shopping centar Pre&#269;ko, Webnet trgovina uz prethodnu najavu na (01) 5802 683Dostava nije uklju&#269;ena u cijenuU slu&#269;aju dostave kupon je potrebno zajedno s osobnim podacima (ime, prezime, adresa, po&scaron;tanski broj, mjesto i tel.) te odabranim modelom&nbsp;proslijediti na e-mail:&nbsp;info@akcija-akcija.comRadno vrijeme:&nbsp; &nbsp; Pon - sub 9 - 17hRok iskoristivosti kupona: 25.4.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.795866', '15.900339', 1),
(24, 1, 5, 'U&#382;ivajte u cjelodnevnom kupanju u Bizova&#269;kim toplicama', 'Jednodnevna ulaznica za kupali&#353;te Aquapolis za samo 15 kn', 30, 'Vodimo vas na bazene!', '\ndevet bazena razli&#269;itih veli&#269;ina i namjena i niz vodenih atrakcijavoda izvire iz dubine od dvije tisu&#263;e metarasportski tereni i dodatni sadr&#382;ajiskoristivo do 1.6.2013.', 'Zapo&#269;nite sezonu kupanja u Aquapolisu! Ovaj fantasti&#269;an vodeni svijet samo &#269;eka da vam pru&#382;i sve vodene radosti koje mo&#382;ete zamisliti.&nbsp;Grad vode ili Aquapolis je vi&scaron;enamjenski kupali&scaron;ni kompleks koji se sastoji od &#269;ak devet bazena razli&#269;itih veli&#269;ina i namjena, a sadr&#382;i i niz vodenih atrakcija kao &scaron;to su: glazbena &scaron;pilja, Whirlpooli, bazeni s vodenim masa&#382;ama, vodeni tobogan du&#382;ine 122 m, vodena gljiva, bazeni za nepliva&#269;e, dje&#269;ji bazen i poluolimpijski bazen. Vi samo birajte sadr&#382;aje koji vam odgovaraju ili ih isprobajte sve, imate &#269;itav dan na raspolaganju!&nbsp;Sve navedeno upotpunjuju i sportski tereni za veliki i mali nogomet, ko&scaron;arku, tenis, odbojku, odbojku na pijesku i rukomet. Najbolje od svega je to &scaron;to je ova voda ljekovita i jako dobra za va&scaron;e zdravlje. Izvire iz dubine od &#269;ak dvije tisu&#263;e metara, a temperatura joj je vi&scaron;a od bilo koje druge termalne vode.&nbsp;I &scaron;to drugo re&#263;i nego - Vidimo se u Bizova&#269;kim toplicama!', 'Kupon mo&#382;ete koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 10 kupona na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponaJedan kupon vrijedi za jednu osobuPonuda uklju&#269;uje: ulaznicu za aquapolisCjenik mo&#382;ete provjeriti ovdjeRok iskoristivosti kupona: 1.6.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.581398', '18.578482', 1),
(25, 1, 2, 'Biciklima na kanu ili rafting Mre&#382;nicom za 149 kn', 'Upustite se u jednodnevni avanturisti&#269;ki izlet koji uklju&#269;uje vo&#382;nju biciklom od 8 km te kanuing ili rafting spu&#353;tanje od 2 do 3 sata', 320, '&#381;eljni ste avanture?', '\nponuda se&nbsp;odnosi na Rijeku, Vara&#382;din i Zagrebuklju&#269;ena potrebna oprema&nbsp;za kanuing, odnosno rafting te kori&scaron;tenje biciklasamo dvije osobe u &#269;amcu s vodi&#269;em', 'Povedite ekipu na nezaboravan cjelodnevni do&#382;ivljaj koji objedinjuje vo&#382;nju biciklom i spu&scaron;tanje kanuom ili raftom niz prekrasnu Mre&#382;nicu! Prvo &#263;ete se okupiti ispred agencije &bdquo;Kanuking avantura&ldquo; u Dugoj Resi odakle &#263;ete, u pratnji vodi&#269;a, biciklima krenuti prema rijeci. Pribli&#382;no, tura biciklima je oko 8 kilometara, dakle negdje oko sat vremena s kratkom pauzom. Kad stignete do Mre&#382;nice, ostavit &#263;ete bicikle i prebaciti se u raftove za 2 osobe.&nbsp;Rije&#269; je o uzbudljivoj plovidbi u K2 &#269;amcu samostalno bez skipera, ali s vodi&#269;em za grupu. Naime, u &#269;amcu se nalaze samo dvije osobe koje samostalno s istim upravljaju. Upravljanje plovilom je vrlo jednostavno i brzo &#263;ete biti sposobni prelaziti i preko zahtjevnijih sedrenih barijera &scaron;to ovaj na&#269;in spu&scaron;tanja &#269;ini vrlo uzbudljivim i pustolovnim.&nbsp;Za&scaron;to naziv kanu/rafting? Jednostavno, ako je mali vodostaj ovi raft &#269;amci vam, zbog svojeg specifi&#269;nog oblika, omogu&#263;uju prelaz preko svih sedrenih barijera, a s druge strane ukoliko je voda &bdquo;divlja&quot;, odnosno, vodostaj velik ovi &#269;amci vam omogu&#263;uju sigurnu vo&#382;nju preko vodom natopljenih sedrenih barijera. Bez obzira &scaron;to samostalno upravljate plovilom vi ste &#269;itavo vrijeme pod budnim nadzorom vodi&#269;a koji &#263;e za vas odabirati najadekvatnije smjerove i mjesta na sedrama preko kojih je spu&scaron;tanje nesmetano.&nbsp;Provedite nezaboravan dan na Mre&#382;nici!', 'Ponuda se odnosi na Rijeku, Vara&#382;din i ZagrebKupon je mogu&#263;e koristiti odmah po primitku, odnosno prema predvi&#273;enom rasporedu odr&#382;avanja raftingaUslugu raftinga ne mogu koristiti trudnice i djeca mla&#273;a od 7 godinaZa kori&scaron;tenje ponude&nbsp;potrebna je vje&scaron;tina plivanjaJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaKupon vrijedi za jednu osobuPonuda uklju&#269;uje:&nbsp;jednodnevni izlet - vo&#382;nja biciklom 8 km te kanuing ili rafting spu&scaron;tanje u trajanju od &nbsp;2 do 3 sataCjenik i detaljnije mo&#382;ete pogledati ovdjeU cijenu je uklju&#269;ena potrebna oprema za kanuing, tj. rafting i kori&scaron;tenje biciklaRezervacija i upiti isklju&#269;ivo putem maila na: kanuking.avantura@ka.t-com.hrPotrebno je ponijeti rezervnu odje&#263;uKupon se smatra iskori&scaron;tenim ukoliko je korisnik rezervirao termin, a nije do&scaron;ao ili nije otkazao termin najmanje 5 dana ranijeRok iskoristivosti kupona: 30.6.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristitiNaj&#269;e&scaron;&#263;a pitanja', '45.445078', '15.502825', 1),
(26, 1, 8, 'Kazali&#353;na predstava Candide ili optimizam', 'Predstava Candide ili optimizam u kazali&#353;tu Gavella 6.4.2013. u 19.30h za 35 kn', 70, 'Pogledajte zabavnu, zaigranu i slikovitu predstavu Candide', '\nje li optimizam uop&#263;e mogu&#263; kao vjerodostojan pogled na &#382;ivot?Voltaire kao zagovornik slobode i tolerancije u svojoj generacijiRedatelj: Kre&scaron;imir Dolen&#269;i&#263;', 'Ljudi, a s njima i vremena se - i Voltaire je jedan od dokaza - ne mijenjaju u svojoj biti. Candide ili Optimizam, stoga nema problema s vremenskom distancom, jer okrutnost, glupost i licemjerje s lako&#263;om su presko&#269;ili stolje&#263;a i ukotvili se u sada&scaron;njosti.Prosvijetliti ljude, razjasniti stvari, osloboditi duh nepotrebnih stega i braniti pravo &#269;ovjeka na vlastito mi&scaron;ljenje, &scaron;to je francuski spisatelj i mislitelj poku&scaron;ao &#269;initi svojim bestsellerom (samo za autorova &#382;ivota roman je izi&scaron;ao vi&scaron;e od &#269;etrdeset puta) u 18. stolje&#263;u, jednako ima smisla &#269;initi i danas.U ovom slu&#269;aju to, sre&#263;om po kazali&scaron;te, nije samo smisleno, ve&#263; i potencijalno zabavno, slikovito i zaigrano; pred nama je svojevrsni bastard filozofske rasprave, satiri&#269;ne rugalice i pikarske avanture, gdje se ne &scaron;tedi nikoga, a ponajmanje dr&#382;avne i crkvene autoritete. Je li optimizam uop&#263;e mogu&#263; kao vjerodostojan pogled na &#382;ivot, pita sebe i nas Voltaire, ili je posrijedi naivna zabluda, u kojoj &quot;netko strastveno tvrdi da je sve dobro, iako mu ide zlo? ', 'Kupon je mogu&#263;e koristiti 6.4.2013.Jedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponaPonuda uklju&#269;uje: ulaznicu za kazali&scaron;nu predstavu ''Candide'', koja igra u kazali&scaron;tu Gavella, 6.4. u 19.30hTrajanje predstave: 1h i 45minUlaznice se mogu podi&#263;i svaki dan(osim nedjelje) od 9:30-19:30h na blagajni kazali&scaron;ta i najkasnije pola sata prije po&#269;etka predstaveU slu&#269;aju otkazivanja predstave bit &#263;e odre&#273;en novi termin u kojem &#263;e se mo&#263;i pogledati predstavaRok iskoristivosti kupona: 6.4.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e iskoristiti', '45.812118', '15.969368', 1),
(27, 1, 5, 'Hot stone masa&#382;a cijelog tijela za 79 kn', 'U&#382;ivajte u masa&#382;i toplim kamen&#269;i&#263;ima u centru za fizikalnu terapiju Aura', 250, 'Osjetite toplinu masa&#382;e kamen&#269;i&#263;ima', '\nizniman efekt drena&#382;e i izbacivanja &scaron;tetnih tvariblagotvorno djeluje protiv stresa, napetosti i zako&#269;enosti mi&scaron;i&#263;a, lo&scaron;e cirkulacije, raznih reumatskih stanja, boli u le&#273;ima, tjeskobe, nesanice i depresijeiskoristivo do 26.05.2013.', 'Bazaltno kamenje idealno je za ovu vrstu tretmana zbog svog specifi&#269;nog toplinskog kapaciteta koji je vrlo visok te polaganog otpu&scaron;tanja topline za vrijeme tretmana. Ve&#263;a gusto&#263;a kamena i njegovo bogatstvo mineralima &#382;eljeza i magnezija &#269;ine ga pogodnijim za tretmane.Hot stone masa&#382;a&nbsp;ima izniman efekt drena&#382;e i izbacivanja &scaron;tetnih tvari, blagotvorno djeluje protiv stresa, napetosti i zako&#269;enosti mi&scaron;i&#263;a, lo&scaron;e cirkulacije, raznih reumatskih stanja, boli u le&#273;ima, tjeskobe, nesanice i depresije.Aura centar zdravlja je prvi centar za fizikalnu terapiju u Valpov&scaron;tini. Izuzetno stru&#269;no i uspje&scaron;no lije&#269;i akutne i kroni&#269;ne bolesti lokomotornog sustava. Lijepo ure&#273;en prostor, najmodernija aparatura i dugogodi&scaron;nje iskustvo te kontinuirano usavr&scaron;avanje jam&#269;e brz oporavak i ugodan boravak u centru.&nbsp;Posjetite centar&nbsp;Aura&nbsp;i u&#382;ivajte u Hot stone masa&#382;i!', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 3 kupona na svoje imeJedna osoba mo&#382;e pokloniti 3 kuponaPonuda uklju&#269;uje:&nbsp;Hot stone masa&#382;u cijelog tijelaTrajanje masa&#382;e: 45 minCjenik mo&#382;ete pogledati ovdjeRadno vrijeme:&nbsp; &nbsp; Pon - pet:&nbsp;08-19hNajava 2 dana unaprijed na (098) 9179 200Rok iskoristivosti kupona:&nbsp;26.5.2013.Kupon se smatra iskori&scaron;tenim ukoliko je korisnik rezervirao termin, a nije do&scaron;ao ili otkazao termin najmanje 24h ranijeNakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.655845', '18.423032', 1),
(28, 1, 5, 'Ugradnja zubnog implantata u Centru zdravi zubi s 10 god. garancije', 'Zablistajte s novim, savr&#353;enim osmijehom uz zubni implantat i imedijatnu krunicu tzv. tooth in an hour', 11450, 'Vratite svoj najbolji osmijeh!', '\nkvalitetna i stru&#269;na usluga10 godina garancije na&nbsp;implantatiskoristivo do 15.6.2013.', 'U pravu su oni koji ka&#382;u da je smijeh najbolji lijek. Zato, nemojte skrivati svoj osmijeh, nego popunite svoj osmijeh implantantom u Centar zdravi zubi!Ponuda uklju&#269;uje pregled i konzultacije za implantolo&scaron;ku terapiju, kirur&scaron;ku ugradnju i nadogradnju zubnog implantata i imedijatnu krunicu te deset godina garancije. Radi se o implantatu s kojim izlazite iz ordinacije s imedijatnom krunom tzv. tooth in an hour! (zub za sat vremena).Centar Zdravi zubi od samog po&#269;etka do danas nastoji da privatnoj stomatolo&scaron;koj praksi da posebnu, novu dimenziju. Naglasak je na individualnom pristupu pacijentu, bilo koje &#382;ivotne dobi. Tamo mo&#382;ete o&#269;ekivati kvalitetnu i stru&#269;nu uslugu, uz primjenu najnovijih tehnologija i materijala.Do&#273;ite u Centar zdravi zubi i zablistajte s novim osmjehom!', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 10 kupona na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponaJedan kupon vrijedi za jednu osobuPonuda uklju&#269;uje:&nbsp;&nbsp;pregled i konzultacije za implantolo&scaron;ku terapiju, kirur&scaron;ku ugradnju i nadogradnju zubnog implantata, imedijatnu krunicu tzv. tooth in an hour te 10 godina garancijeCjenik mo&#382;ete pogledati ovdjePrilikom pregleda doktor &#263;e odrediti koju vrstu i marku implantata &#263;e ugraditiTrajanje usluge: cca 90 min (ugradnja implatanta)Broj dolazaka: po potrebiRadno vrijeme:&nbsp;&nbsp;&nbsp; Pon - pet 8 - 21hNajava 10 dana unaprijed na (021) 360 270 ili (091) 1360 270Rok iskoristivosti kupona: 15.6.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti&nbsp;', '43.508752', '16.441641', 1),
(29, 1, 1, 'Po&#269;astite se luksuznim dvodnevnim boravkom u Beogradu', 'Priu&#353;tite sebi i svojoj dragoj osobi no&#263; u novom luksuznom Hotelu Helvecia 4* uz gratis kori&#353;tenje teretane', 0, 'Beograd i vas dvoje...', '\nhotel smje&scaron;ten pet minuta od centra grada i Knez Mihailove uliceluksuzno opremljene sobena raspolaganju teretana s besplatnim Power plate-omiskoristivo do&nbsp;30.04.2013', 'Beograd je odavno na glasu kao oaza no&#263;nog &#382;ivota, koja vam preko dana nudi stotine kafi&#263;a, restorana i barova, bogatu kulturnu ponudu s brojnim muzejima, kazali&scaron;tima i galerijama. Nezaobilazne su i &scaron;etnje knez Mihailovom ulicom, dru&#382;enje s gostoljubivim doma&#263;inima u boemskoj &#269;etvrti Skadarliji i obilazak brojnih gradskih znamenitosti. Da biste u svemu tome potpuno u&#382;ivali, potreban vam je vrhunski smje&scaron;taj, a njega &#263;ete na&#263;i u Hotelu Helvecia.&nbsp;Hotel Helvecia je novootvoreni luksuzni hotel koji se nalazi pet minuta od centra grada i Knez Mihailove ulice, u blizini Skup&scaron;tine, Privredne komore i Crkve Svetog Marka. &nbsp;Hotel raspola&#382;e s deset luksuzno opremljenih soba sa svim sadr&#382;ajima koji su prilago&#273;eni najvi&scaron;im standardima svjetskog hotelijerstva poput klime, LCD televizora, WiFi interneta, kabelske TV, mini bara, sefa i hidromasa&#382;ne tu&scaron; kabine. Gostima je na raspolaganju teretana s besplatnim Power plate-om, a po posebnim cijenama mogu&#263;e je koristiti i usluge anti-ageing centra koji se nalazi u sklopu Hotela.&nbsp;Uskoro &#263;e ponuda hotela biti oboga&#263;ena i Vinskim podrumom Hotela Helvecia s bogatom &nbsp;ponudom kvalitetnih vina. Odli&#269;na usluga, komfor, atmosfera prilago&#273;ena za rad i odmor, &#269;ine Hotel Helvecia va&scaron;im izborom prilikom posjete Beogradu, a ljubazno osoblje Helvecia Hotela je tu da vam omogu&#263;i ugodan boravak koji &#263;e vam ostati u dugom sje&#263;anju!', 'Mogu&#263;nost pla&#263;anja Amex-om do 6 rata bez kamata i naknada&nbsp;Kupon mo&#382;ete koristiti odmah po primitku&nbsp;Jedna osoba mo&#382;e koristiti 5 kupona na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaJedan kupon vrijedi za &nbsp;2 osobePonuda uklju&#269;uje: 1 no&#263;enje za dvije osobe uz gratis kori&scaron;tenje teretane i Power plate-aNadoplata za djecu:&nbsp;-do 3 godine gratis-do 10 godina ostvaruju 50% popustaObavezna nadoplata:- boravi&scaron;na proistojba 1,20 &euro; &nbsp;po osobiCjenik mo&#382;ete provjeriti ovdjeBoravak ku&#263;nih ljubimaca nije dopu&scaron;ten kao ni pu&scaron;enje u hotelu&nbsp;Provjera raspolo&#382;ivosti prije kupnje kupona i potvrda rezervacije po primitku kupona na 00381 (0)11 3348 993 ili 00381 (0)11 3348 958 prema raspolo&#382;ivostiRok iskoristivosti kupona: 30.04.2013.Kupon se smatra iskori&scaron;tenim ukoliko je korisnik rezervirao termin, a nije do&scaron;ao ili otkazao termin 2 dana prije dolaskaNakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '44.807934', '20.465941', 1),
(30, 1, 7, 'Kampanja Hrabro dijete', 'Donirajte 10 kn za djecu oboljelu i lije&#269;enu od malignih bolesti u organizaciji Udruge Hrabro dijete', 0, 'Kad se male ruke slo&#382;e, sve se mo&#382;e!', '\nNapomeneSva prikupljena sredstva bit &#263;e namijenjena lije&#269;enju djece oboljele od malignih bolestiPonuda se odnosi na cijelu HrvatskuDonirati mo&#382;ete neograni&#269;eni broj putaSvi donatori &#263;e putem emaila&nbsp;zaprimiti zahvalnicu kao znak zahvale za sudjelovanje u kampanji Hrabro dijete!&nbsp;', '', '', '45.261718', '17.380832', 1),
(31, 1, 5, 'Tretman haloterapije za djecu 20 kn', 'Neka va&#353;a djeca udi&#353;u &#269;aroliju djetinjstva punim plu&#263;ima uz slane sobe Vivasol', 50, 'Neka djeca udahnu zdravlje...', '\n20min haloterapije za djecuuspje&scaron;no otklanja probleme s ko&#382;om, respiratornim sustavom, alergijama, ja&#269;a organizam...iskoristivo do 29.4.2013.', 'Slana soba je imitacija prirodne slane spilje s njenom ljekovitom mikro klimom. Zidovi, pod i strop oblo&#382;eni su solju, a zrak je zasi&#263;en suhim, raspr&scaron;enim, najfinijim &#269;esticama kamene soli. Boravak u takvoj atmosferi i udisanje takvog zraka, ve&#263; je odavno poznat po svojoj ljekovitosti. A uspje&scaron;no otklanja probleme s ko&#382;om, respiratornim sustavom, alergijama, poma&#382;e kod nesanice, ja&#269;a organizam... Klincima &#263;e biti vrlo zabavno u sobi, jer se mogu igrati pa &#263;e im tih 20 minuta jednostavno proletjeti!Spomenimo i da je haloterapija je u EU klini&#269;ki ispitana i znanstveno potvr&#273;ena.Povedite klince na haloterapiju u Vivasol!&nbsp;&nbsp;', 'Tretman se odnosi samo na djecuKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 1 kuponPonuda uklju&#269;uje: 1 tretman haloterapije za djecu&nbsp;u trajanju od 20minCjenik mo&#382;ete pogledati ovdjeRadno vrijeme:&nbsp; &nbsp; Pon - pet 9 - 12h i 16 - 20h&nbsp; &nbsp; Sub 9 - 14hNajava 1 dan unaprijed na (091) 5021 283 ili (031) 500 990Rok iskoristivosti kupona: 29.4.2013.Kupon se smatra iskori&scaron;tenim ukoliko je korisnik rezervirao termin, a nije do&scaron;ao ili nije otkazao termin najmanje 24h ranijeNakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.558468', '18.716991', 1),
(32, 1, 4, 'Rock blues i osnovni te&#269;aj gitare', 'Za 99 kn &#269;eka vas te&#269;aj u trajanju od mjesec dana u Glazbenom centru Zagreb', 200, '?arolija u samo &scaron;est &#382;ica&hellip;', '\nrock blues te&#269;aj uz osnove tehnike sviranjatermini se dogovaraju&nbsp;prema mogu&#263;nostima polaznikarad je prilago&#273;en svakom pojedincu', 'Nau&#269;te se snalaziti na vratu gitare po progresijama akorada kao i po melodijama koriste&#263;i tehnike solo sviranja i niza ljestvica i modusa. Rad je prilago&#273;en svakom pojedincu, njegovim afinitetima, stupnju predznanja i izboru primjera za vje&#382;banje kako bi se stvorio kvalitetan i zanimljiv repertoar s rock/blues prizvukom.&nbsp;Gitara ima neosporan efekt na ljude. ?im je uzmete u ruke kroz vas pro&#273;e mo&#263; rock and roll-a, od Chuck Berrya na ovamo i ve&#263; vidite kako vam na pozornicu dobacuju &scaron;to&scaron;ta, a u hotelskim sobama vas do&#269;ekuju obo&#382;avatelji. Prvi korak prema svjetskoj slavi napravite u Glazbenom centru Zagreb.&nbsp;Zasvirajte uz KupiMe!', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 2 kuponaPonuda uklju&#269;uje:&nbsp;rock blues i osnovni te&#269;aj gitare u trajanju od mjesec dana (4x60min)Grupe 2 - 3 polaznikaTe&#269;aj obuhva&#263;a: osnove teorije, zapis u notama i tablaturama, sviranje akorada (hvatovi), gra&#273;a akorada, slaganje akorada u logi&#269;ne progresije, ritam vje&#382;be, solo tehnike (hammer, pull off, palm mute, vibrato, slide, tapping....), sviranje ljestvica i njihovo povezivanje, razvijanje sluha i shva&#263;anja glazbene harmonijeCjenik mo&#382;ete pogledati ovdjeTermini se dogovaraju prema mogu&#263;nostima polaznikaRadno vrijeme:&nbsp; &nbsp; Pon - pet 17 - 22h&nbsp; &nbsp; Vikend po dogovoruNajava odmah po primitku kupona&nbsp;(099) 4533 557Rok iskoristivosti kupona: 6.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.803465', '15.929693', 1),
(33, 1, 3, 'Doznajte koja hrana vam odgovara', 'Za 970 kn &#269;eka vas ImuPro100 test intolerancije na 90 prehrambenih namirnica u Poliklinici Stela', 1940, 'Doznajte kako bi trebao izgledati va&scaron; jelovnik...&nbsp;', '\nNapomenePonuda se odnosi na cijelu HrvatskuKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponaKupon se ne mo&#382;e kombinirati s ostalim popustima i akcijamaPonuda uklju&#269;uje:&nbsp;ImuPro100 test intolerancije na 90 prehrambenih namirnicaPregled uklju&#269;uje:&nbsp;savjetovanje s nutricionistom, interpretaciju rezultata te individualizirani program prehraneCjenik mo&#382;ete pogledati ovdjePrimjer rezultata testaObavezna telefonska najava 1 dan prije va&#273;enja krviZa samo testiranje nije potrebno biti nata&scaron;te, a uzorak za testiranje mo&#382;e se uzeti tijekom cijelog danaMogu&#263;e je izvaditi uzorak krvi u bilo kojem laboratoriju u RH te isti poslati HP expressom u Polikliniku StelaRezultati su gotovi unutar 4 tjednaMogu&#263;nost nadoplate za testove ImuPro200 i ImuPro300Radno vrijeme:&nbsp; &nbsp; Pon - pet 7 - 19h&nbsp; &nbsp; Sub 8 - 12hRok iskoristivosti kupona: 7.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '', '', '45.831707', '16.052334', 1),
(34, 1, 5, 'Klasi&#269;na masa&#382;a cijelog tijela za samo 59 kuna', 'U&#382;ivajte u 60 minuta opu&#353;taju&#263;e masa&#382;e u studiju Be Best', 150, 'Preporodite se...', '\nkraljevska masa&#382;a kakvu zaslu&#382;ujtepobolj&scaron;ava prokrvljenost, tonizira i opu&scaron;t mi&scaron;i&#263;e te uklanja napetost iz tijelaiskoristivo do 3.5.2013.', 'Klasi&#269;na masa&#382;a u studiju Be Best nije samo obi&#269;na masa&#382;a nego pravi ritual u kojem &#263;ete napokon otkloniti sav stres iz svoga tijela. Ovih sat vremena u salonu pru&#382;it &#263;e vam blagodati kraljevskog tretmana kakvog zaslu&#382;ujete.Kao &scaron;to znamo, masa&#382;a je savr&scaron;en na&#269;in da se opustite. Pogotovo kada se ona odvija u tako ugodnom ambijentu i pod vodstvom tako stru&#269;nog osoblja. Be Best, nije samo ime salona, nego i moto kojim se ravnaju kada vam pru&#382;aju usluge koje su vam toliko potrebne, poput ove masa&#382;e kojom &#263;e se pobolj&scaron;ati prokrvljenost, posti&#263;i tonizacija i opu&scaron;tanje mi&scaron;i&#263;a te ukloniti svaka napetost iz va&scaron;eg tijela.Posjetite ih, i sigurni smo da &#263;ete otkriti da je ovo prava oaza za opu&scaron;tanje od svakodnevnog stresa i u&#382;urbanog na&#269;ina &#382;ivota!Vidimo se u salonu Be Best!&nbsp;', 'Ponuda vrijedi samo za &#382;eneKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 10 kupona na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponaKupon vrijedi za jednu osobuPonuda uklju&#269;uje:&nbsp;klasi&#269;nu masa&#382;u cijelog tijela&nbsp;Cjenik mo&#382;ete pogledati ovdjeRadno vrijeme:Pon-pet &nbsp;9-20h,sub 9-13hObavezna najava minimalno 1 dan unaprijed na brojeve telefona (091) 1698 996, (097) 7720 402Rok iskoristivosti kupona: 3.5.2013.Kupon se smatra iskori&scaron;tenim&nbsp;ukoliko je korisnik rezervirao termin, a nije do&scaron;ao ili otkazao termin najmanje 48h ranijeNakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.367316', '14.418479', 1),
(35, 1, 4, 'Kreativna radionica ili ro&#273;endan za va&#353;u djecu i njihove najbolje prijatelje', 'Priu&#353;tite va&#353;im malcima nezaboravni ro&#273;endan ili ih upi&#353;ite u kreativnu radionicu', 200, 'Birajte najbolje za svoje dijete!', '\nodaberite kreativno &ndash; edukativnu radionicu za djecu ili &nbsp;organiziranje kreativnoga ro&#273;endana do 15 djeceosigurani materijali za izradu kreativnih radova koje &#263;e svako dijete ponijeti ku&#263;i kao uspomenu', 'Kreativna radionica Mary Bella ima cilj da mali&scaron;anima pru&#382;i spektar razli&#269;itih likovnih i prilago&#273;enih aktivnosti kako bi se njihov kreativni potencijal maksimalno razvio. Polaznici te&#269;aja &#263;e savladavati crta&#269;ke i slikarske tehnike (pastel , flomasteri, tu&scaron;, akvarel, tempera, kola&#382;...); osnove rada sa razli&#269;itim materijalima (glina, papir, razni materijali...) slikanje na tekstilu, staklu , kao i izradu upotrebnih i dekorativnih predmeta od keramike i sl. Te&#269;aj osim kreativne obuke, uklju&#269;uje poduku iz osnovnih engleskih rije&#269;i.Kroz ovu radionicu djeca razvijaju osje&#263;aj za estetiku, kao i motivaciju, u&#269;e da izra&#382;avaju svoja osje&#263;aje i ma&scaron;tu i informiraju se o povijesti umjetnosti. Kreativnu radionicu za djecu vode stru&#269;ni profesori prilago&#273;avaju&#263;i se dje&#269;joj dobi individualno. Cijena uklju&#269;uje materijal, mjese&#269;nu edukaciju, fotografije, pi&#263;e i grickalice za djecu.Ako pak razmi&scaron;aljate gdje proslaviti djetetov ro&#273;endan, Nova Ideja ima savr&scaron;enu ideju kako da ro&#273;endan va&scaron;eg djeteta svima ostane u dugom sje&#263;anju. Klinci &#263;e se igrati i zabavljati, a vi &#263;ete odahnuti jer &#263;ete izbje&#263;i mukotrpno pranje su&#273;a i pospremanje stana!Sve &scaron;to je potrebno za savr&scaron;eni ro&#273;endan je uklju&#269;eno u cijenu, od pozivnica, preko grickalica i prirodnih sokova pa sve do balona i poklona iznena&#273;enja za slavljenika. Ro&#273;endan &#263;e se odvijati pod nadzorom dvije tete animatorice koje &#263;e se pobrinuti za super atmosferu. Osigurani su i materijali za izradu kreativnih radova koje &#263;e svako dijete ponijeti ku&#263;i kao uspomenu na ovaj ro&#273;endan!Ovo je zaista super ideja za proslavu ro&#273;endana va&scaron;eg mali&scaron;ana!&nbsp;', 'Najava odmah nakon zavr&scaron;etka ponude radi rezervacije termina na broj telefona (095) 5500 291, zvati pon &ndash; pet 12 &ndash; 16 hJedna osoba mo&#382;e koristiti 1&nbsp;kupon na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaPonuda uklju&#269;uje mogu&#263;nost odabira:a) kreativno &ndash; edukativna radionica za djecu- ponuda uklju&#269;uje: materijal, mjese&#269;nu edukaciju, fotografije, pi&#263;e i grickalice za djecub) organiziranje kreativnoga ro&#273;endana do 15 djece- ponuda uklju&#269;uje: materijala za izradu kreativnih radova - svi radovi se nose ku&#263;i (svako dijete svoj rad kao uspomenu na ro&#273;endan), pozivnice, fotografije, pi&#263;e (prirodni sokovi) i grickalice (slatke i slane) za djecu, 2 tete animatorice, balone, trajanje 150 min, poklon iznena&#273;enja slavljenikuKreativnu radionicu mogu kupiti&nbsp;samo novi &#269;lanoviTrajanje radionice:a)&nbsp;4 X 120 minb)&nbsp;150 minBroj dolazaka:a) 4 b)&nbsp;1Cjenik mo&#382;ete pogledati ovdje                       Radno vrijeme po dogovoruRok dolaska na prvi tretman: a)&nbsp;12.04.2013.b)&nbsp;01.10.2013.Rok iskoristivosti kupona: a)&nbsp;10.05.2013.b)&nbsp;01.10.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '43.519738', '16.467562', 1),
(36, 1, 5, 'Paket od 3 fen frizure za 70 kn', 'Po savr&#353;enu fen frizuru do&#273;ite u salon Avangard na Tre&#353;njevku', 240, 'To se zove fen frizura!', '\nmajstori frizurasjajna, puna kosanajava dva dana unaprijed', 'Svi se sla&#382;u da vas lijepo isfenirana kosa &#269;ini par godinama mla&#273;om. Onaj osje&#263;aj kada iza&#273;ete s feniranja iz frizerskog salona je jednostavno nezamjenjiv. Sjajna, puna kosa, prekrasna frizura... Iako feniranje zvu&#269;i kao jednostavan postupak, rijetko kod ku&#263;e ispadne dobro. Za&scaron;to je tome tako, ne znamo, ali znamo da se time neko vrijeme ne trebate zamarati. Vodimo vas u salon&nbsp;Avangard&nbsp;na 3 fen frizure!&nbsp;Ovaj paket salona Avangard podrazumijeva 3 feniranja, &scaron;to vam jam&#269;i da &#263;e va&scaron;a frizura sljede&#263;ih mjeseci izgledati savr&scaron;eno. Sve &#263;e biti izvedeno po &bdquo;pravilima struke&ldquo;, a usput mo&#382;ete nau&#269;iti kako pravi majstori to rade!&nbsp;Vidimo se u salonu Avangard!', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 3 kupona na svoje imeJedna osoba mo&#382;e pokloniti 3 kuponaKupon vrijedi za jednu osobuPonuda uklju&#269;uje:&nbsp;paket od 3 fen frizure u trajanju od 30min svakaCjenik mo&#382;ete pogledati ovdjeRadno vrijeme:&nbsp; &nbsp; Pon - pet 9 - 20h&nbsp; &nbsp; Sub 8 - 14hNajava 2 dana unaprijed na (01) 8887 873Rok iskoristivosti kupona: 31.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.804505', '15.955925', 1),
(37, 1, 3, 'Vrijeme je za kompletan ginekolo&#353;ki pregled', 'Ovaj pregled u Privatnoj ginekolo&#353;koj ordinaciji dr. Predrag &#272;uri&#263; uklju&#269;uje ultrazvuk, Papa test i color doppler', 790, 'Pregled koji se treba obaviti', '\nmogu&#263;nost pla&#263;anja Amexom do&nbsp;6 rata bez kamata i naknadapreporuka je obaviti kompletan ginekolo&scaron;ki pregled barem jednom godi&scaron;nje', 'Svi ginekolozi svijeta sla&#382;u se da bi svaka &#382;ena trebala barem jednom godi&scaron;nje obaviti kompletan ginekolo&scaron;ki pregled. Zato ova ponuda pada ba&scaron; u zgodno vrijeme. Ako niste posjetili ginekologa ove godine, jo&scaron; uvijek stignete, a ako jeste, pregled mo&#382;e biti jedna od prvih stvari koju &#263;ete napraviti ovog prolje&#263;a. Pri tome &#263;ete jo&scaron; i u&scaron;tedjeti. Zato upi&scaron;ite u svoj planer posjetu Privatnoj ginekolo&scaron;koj ordinaciji dr. Predrag &#272;uri&#263;.Kompletan ginekolo&scaron;ki pregled uklju&#269;uje ultrazvuk, Papa test i color doppler. Vrlo je va&#382;no redovito obavljati ove preglede, i to bez obzira u kojoj se &#382;ivotnoj dobi nalazite. Poliklinika je opremljena vrhunskim ure&#273;ajima, a u njoj rade izvrsni doktori.Do&#273;ite na pregled u Privatnu ginekolo&scaron;ku ordinaciju dr. Predrag &#272;uri&#263;!', 'Mogu&#263;nost pla&#263;anja Amexom do 6 rata bez kamata i naknadaKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaPonuda uklju&#269;uje&nbsp;kompletan ginekolo&scaron;ki pregled: ultrazvuk, Papa test i color dopplerCjenik mo&#382;ete pogledati ovdjeRadno vrijeme:&nbsp; &nbsp; Pon - sri - &#269;et 13 - 19h&nbsp; &nbsp; Uto - pet 10 - 14hNajava 2 dana unaprijed na (01)&nbsp;4813 700Rok iskoristivosti kupona: 25.5.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.812387', '15.983359', 1),
(38, 1, 9, 'Pljeskavice punjene kajmakom za dvije osobe u bistrou Chef', 'U&#382;ivajte u specijalitetima s ro&#353;tilja na novoj lokaciji va&#353;eg omiljenog restorana', 70, '&Scaron;to ka&#382;ete na fine pljeskavice s kajmakom?', '\nterasanova lokacija (Jablanska 24)', '&Scaron;to ka&#382;ete na fine pljeskavice s kajmakom? Takva gozba se ne propu&scaron;ta, pogotovo kada je za njenu pripremu zadu&#382;en vrhunski Team restorana&nbsp;Chef!&nbsp;U dana&scaron;njoj ponudi &#269;ekaju vas 2 porcije pljeskavica s kajmakom, lepinjom, ajvarom i lukom. Kao i uvijek, va&scaron;e &#263;e porcije biti svje&#382;e pripremljene i od najboljih sastojaka. Vi samo trebate odabrati osobu s kojom &#263;ete podijeliti ovaj gastronomski u&#382;itak!&nbsp;Restoran Chef odnedavno se nalazi na novoj lokaciji, u Jablanskoj ulici u Pre&#269;kom. Otvaranje novog lokala obilje&#382;eno je i stvaranjem novog, jo&scaron; boljeg jelovnika. Tako vas od sada ovdje o&#269;ekuju nekoliko novih jela, neka stara prera&#273;ena jela, a ona koja ste najvi&scaron;e voljeli, ostala su onakva kakva su bila! U Chefu s posebnom pa&#382;njom brinu o kvaliteti sirovina.&nbsp;Okusite najbolje delicije u restoranu Chef!', 'Kupon je mogu&#263;e koristiti odmah po primitku, radnim danima osim subotom i nedjeljomJedna osoba mo&#382;e koristiti 5 kupona na svoje imeJedna osoba mo&#382;e pokloniti 5 kuponaKupon vrijedi za dvije osobeKuponi se ne mogu spajatiPonuda uklju&#269;uje:&nbsp;dvije pljeskavice s kajmakom, lepinjom, ajvarom i lukom&nbsp;Cjenik mo&#382;ete pogledati ovdjeU slu&#269;aju ve&#263;eg iznosa mogu&#263;a nadoplataPi&#263;e nije&nbsp;uklju&#269;eno u cijenuKonzumacija hrane je mogu&#263;a isklju&#269;ivo u restoranuNajava 1 dan unaprijed na&nbsp;(01)&nbsp;8887 787Radno vrijeme kuhinje:&nbsp; &nbsp; Pon - ned 11 - 22hRadno vrijeme restorana:&nbsp; &nbsp; Pon - ned 8 - 24hRok iskoristivosti kupona: 30.4.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.798072', '15.913664', 1),
(39, 1, 7, 'Oglasite svoje smje&#353;tajne kapacitete, najam automobila i plovila za 90 kn', 'Predstavite svoju turisti&#269;ku ponudu na www.smjestaj-na-jadranu.net uz 70% popusta', 300, 'Pripremite se za sezonu...', '\nNapomeneKupon mo&#382;ete koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 2 kupona na svoje imeJedna osoba mo&#382;e pokloniti 3 kuponaJedan kupon vrijedi za jedan ugostiteljski objekatPonuda uklju&#269;uje&nbsp;ogla&scaron;avanje smje&scaron;tajnih kapaciteta, najma automobila i plovila na web stranici www.smjestaj-na-jadranu.net:- &#269;lanstvo od jedne godine- 12 fotografija objekta- opis smje&scaron;tajnih kapaciteta- opis mjesta gdje se nalazi smje&scaron;taj kao i aktivnosti- vrste soba- cijene smje&scaron;taja- direktni kontakt gost-iznajmljiva&#269; smje&scaron;taja putem kontakt forme- prikaz lokacije na google mapi- pop-up galerija- prikaz opremljenosti (ponude) apartmanaCjenik mo&#382;ete provjeriti ovdjeNajavu je potrebno izvr&scaron;iti do jedan dan prije postavljanja na portal&nbsp;Rok iskoristivosti kupona: 6.4.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '', '', '', '', 1),
(40, 1, 7, 'Solarni panel SOLE 140-140W', 'U&#382;ivajte u blagodatima struje na sun&#269;ev pogon za samo 1.473 kn', 2947, 'Sunce nam se vratilo, iskoristite ga!', '\nva&#382;no:&nbsp;solarni akumulator stacionarni Sole 120Ah-12V vi&scaron;e nije dostupan ve&#263;&nbsp;Sole 85Ah-12Vmogu&#263;nost pla&#263;anja Amexom do&nbsp;6 rata bez kamata i naknadajamstvo od 25 godina', 'Ako nemate dostupnu struju u va&scaron;oj vikendici, ili mo&#382;da plovite morem bez komfora najpotrebnijih elektri&#269;nih aparata, vrijeme je da nabavite solar panele iz tvrtke Hvaljen budi! Napunite mobitele i fri&#382;idere snagom Sunca...&nbsp;Iz dana&scaron;nje ponude odaberite solarni panel SOLE 140-140W. On ima temperaturni koeficijent snage od 0,4%/C te jamstvo na izlaznu snagu (81% snage) od 25 godina. Posjeduje regulator 12/24V 1010 10A, Inverter - pretvara&#269; mod sinus 300W-vr&scaron;ne snage 600W 12-230V i Solarni akumulator stacionarni Sole 85Ah-12V.&nbsp;Iskoristite energiju Sunca uz tvrtku Hvaljen budi!', 'Mogu&#263;nost pla&#263;anja Amexom do 6 rata bez kamata i naknadaKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 2 kupona na svoje imeJedna osoba mo&#382;e pokloniti 2 kuponaPonuda uklju&#269;uje:&nbsp;- solarni panel SOLE 140 - 140W-&nbsp;regulator 12/24V 1010 10A-&nbsp;inverter - pretvara&#269; mod sinus 300W-&nbsp;solarni akumulator stacionarni Sole 85Ah-12VCjenik mo&#382;ete pogledati ovdjeProizvo&#273;a&#269;ko jamstvo se odnosi isklju&#269;ivo na solarni panelProizvod se preuzima osobno na adresi: Bani 73 (Poslovna zona Buzin), Zagreb uz prethodnu najavu na (091) 6608 065&nbsp;i predo&#269;enje kuponaRok iskoristivosti kupona: 1.6.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.754522', '16.003733', 1),
(41, 1, 7, 'Fotografiranje za osobne dokumente', 'Za 19 kn napravite fotografije za osobnu iskaznicu, biometrijsku putovnicu i voza&#269;ku dozvolu u studiju Foto Mondo', 38, 'U EU s novim fotkama na dokumentima...', '\nNapomeneKupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 2 kuponaPonuda uklju&#269;uje:&nbsp;fotografije za dokumenteCjenik mo&#382;ete pogledati ovdjeKontakt broj&nbsp;(042) 213 085Rok iskoristivosti kupona:&nbsp;26.4.2013.Kupon se smatra iskori&scaron;tenim ukoliko je korisnik rezervirao termin, a nije do&scaron;ao ili nije otkazao termin najmanje 24h ranijeNakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '', '', '46.304764', '16.336262', 1),
(42, 1, 2, 'Do&#382;ivite ljepotu kanuinga na Uni', 'Avantura u kanuu, kupanje na slapovima Une te cijeli dan u&#382;ivanja u prirodi za samo 99 kn', 200, 'Osjetite zov divljine!', '\nrok iskoristivosti kupona: 3.9.2013.udaljenost od Zagreba samo 2 sata vo&#382;njegratis kori&scaron;tenje sadr&#382;aja unutar centrapoklon za prvih 200 prijavljenih za program', 'Ne propustite priliku za jedinstvenom avanturom na rijeci o &#269;ijoj se ljepoti govori na svim stranama svijeta. Provedite cjelodnevni odmor na svje&#382;em zraku, u carstvu divljine, u dru&scaron;tvu dobrih prijatelja!&nbsp;Centar Futurum smje&scaron;ten je u prostranstvima netaknute divljine, me&#273;u 4 gorska klanca protkanim potocima. Sa svojim novim ruhom, on pru&#382;a mno&scaron;tvo interesantnih sadr&#382;aja ljubiteljima prirode. &#381;elite li osjetiti &#269;ari divljine, ljubaznost doma&#263;ina te vo&#382;nju kanuima po Uni onda ste na pravom mjestu. Od Zagreba vam treba samo 2 sata vo&#382;nje.&nbsp;Na mjestu polaska dobit &#263;ete kratke upute i preuzeti opremu. Onda kre&#263;e put kanuima po vodenoj stazi preko mno&scaron;tva kaskada u zagrljaju krajolika rijeke Une. Tu i tamo &#263;ete stati, odmoriti se ili kupati pod slapovima. Prije ili poslije kanuinga, mo&#382;ete u&#382;ivati u gratis kori&scaron;tenju sadr&#382;aja unutar centra, &scaron;etnjama gorskim klancima ili priklju&#269;iti nekim aktivnostima koje su na programu taj dan.&nbsp;Rijeka Una &#263;e vas ostaviti bez daha. To je jedna kristalno &#269;ista rijeka koja je zarobila mnoga srca svojih posjetitelja. Vjerujemo da &#263;ete se i vi zaljubiti u nju na prvi pogled. Vidimo se na Uni!', 'Kupon je mogu&#263;e koristiti vikendima od&nbsp;1.6. do 3.9.2013.Jedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponaJedan kupon vrijedi za jednu osobuPonuda uklju&#269;uje: kratku obuku, najam &#269;amaca za kanu za 2 - 3 osobe, kori&scaron;tenje potrebne opreme, stru&#269;no vodstvo i organizacijuOdlazak do mjesta polaska je u vlastitom&nbsp;aran&#382;manuDetalje ponude, mogu&#263;e termine te dodatne aktivnosti mo&#382;ete pogledati ovdjeCjenik mo&#382;ete provjeriti ovdjeMinimalna starosna dob za kanuing je 7 god uz pratnju roditelja ili starateljaSvaki sudionik kanuinga obavezan je sklopiti policu osiguranja od nezgode za taj dan (osiguravatelj po izboru korisnika kupona)&nbsp;Grupe se formiraju na temelju dnevnih prijava i rezervacija&nbsp;na (099) 8857 895 te uz obaveznu pismenu potvrdu putem maila na associated.futurum@gmail.com&nbsp;sa sljede&#263;im podacima&nbsp;radi sastavljanja liste sudionika&nbsp;(ime, prezime, OIB ili JMBG ili br O.I.)Najava mminimalno 48h prije polaskaZa prvih 200 prijavljenih te uz konzumaciju obroka i pi&#263;a unutar centra -&nbsp;besplatno dvodnevno kampiranje u Eco kampu Futurum tijekom vikenda,&nbsp;u ve&#269;ernjim satima zabava uz logorsku vatru uz malo jezero te&nbsp;mno&scaron;tvo ostalih rekreativnih sadr&#382;ajaObavezan dolazak s KupiMe kuponomU podru&#269;je centra Futurum nije dozvoljen unos ni konzumacija vlastite hrane i pi&#263;aOtkazivanje rezervacije potrebno je u&#269;initi najmanje 48h prije zakazanog termina jer u protivnom gubite pravo na terminRok iskoristivosti kupona: 3.9.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.129016', '16.264915', 1),
(43, 1, 2, 'Rafting avantura na donjem toku Mre&#382;nice', 'U&#382;ivajte u trosatnoj pustolovini kroz brzace i slapove Mre&#382;nice uz Terra Croatica za samo 129 kn', 260, 'Zaveslajte Mre&#382;nicom!', '\nneopisiva zabava i adrenalinjedna od najljep&scaron;ih rijeka u Hrvatskoj93 sedrena nezaboravna slapapromotivna cijena ru&#269;ka za vlasnike Kupi Me kuponarok iskoristivosti kupona: 30.9.2013.', 'Za ljubitelje prirode i avanture, ne postoji bolji provod od raftinga. Neko&#263; je to bio jedan od najva&#382;nijih na&#269;ina prijevoza, a danas je izvor neopisive zabave. I &scaron;to je najbolje, do vrhunske rafting avanture ne trebate putovati daleko, nego samo do obli&#382;nje Mre&#382;nice.Rafting je prekrasan na&#269;in da do&#382;ivite nenaru&scaron;enu prirodu Hrvatske. Uz ekipu iz Terra Croatica, do&#382;ivjet &#263;ete neispri&#269;anu pri&#269;u o jednoj od najljep&scaron;ih hrvatskih rijeka - Mre&#382;nici. Oni &#263;e vas provesti preko nekih od najljep&scaron;ih slapova i barijera od kojih jednostavno zastane dah.Rijeka Mre&#382;nica zaslu&#382;uje posebno mjesto me&#273;u rijekama hrvatskog kr&scaron;a. Ono po &#269;emu se ona posebno isti&#269;e su &#269;ak 93 sedrena slapa, koja ispresijecaju rijeku stvaraju&#263;i me&#273;u sobom ujezerene dijelove toka. Zato ne sumnjamo da &#263;ete u&#382;ivati u ovoj &#269;aroliji prirode!Vidimo se na Mre&#382;nici!', 'Kupon je mogu&#263;e koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 10 kupona na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponaJedan kupon vrijedi za jednu osobuPonuda uklju&#269;uje: rafting na Mre&#382;nici u trajanju od 3hDonosioci KupiMe kupona ostvaruju&nbsp;ru&#269;ak u restoranu Zeleni kut po promotivnoj cijeni od 35 kn - pla&#263;a se na licu mjestaMjesto okupljanja: Restoran Zeleni kut Pu&scaron;kari&#263;, Zve&#269;aj 109Odlazak do mjesta polaska je u vlastitom aran&#382;manuNajava 7 dana unaprijed, radnim danom od 9 do 15h na (091) 4133 920 ili putem e-maila: info@raft.com.hrRok iskoristivosti kupona: 30.9.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '45.396838', '15.430899', 1),
(44, 1, 8, 'Glazbeni spektakl Gubec beg u Komediji', 'Mjuzikl Gubec beg odr&#382;ava se 5.travnja u 19.30h', 120, 'Pogledajte kako se ra&#273;ao Gubec beg...', '\npodvig bez presedanaveliki kazali&scaron;ni spektaklorkestar, zbor i balet Kazali&scaron;ta Komedijavrhunska gluma&#269;ko-pjeva&#269;ka postava: &#272;ani Stipani&#269;ev, Ervin Bau&#269;i&#263;, Vanda Winter i Adalbert Turner', 'Rock opera Gubec - Beg postala je glazbenim, svevremenskim simbolom nove glazbene forme u Hrvatskoj, a te melodije i glazba ostale su u sje&#263;anju... &ldquo;Ave Maria&rdquo;, &ldquo;Gup&#269;eva zakletva ma&#269;u&rdquo;, potresna &ldquo;Legenda o Dori Arlandovoj&rdquo; &#382;ive i danas.Pri&#269;a o selja&#269;koj buni i kmetskom vo&#273;i Gubec-Begu duboko je urezana u pam&#263;enje kao legenda koja u na&scaron;oj karizmati&#269;noj rock verziji &#382;eli jo&scaron; jednom podsjetiti na slavne dane te bune.&nbsp;Ostalo pogledajte u Komediji!', 'Kupon je mogu&#263;e koristiti 5.4.2013.Ukoliko se uplata vr&scaron;i op&#263;om uplatnicom 24 sata prije predstave potrebno je poslati potvrdu o uplati na info@kupime.hr kako biste mogli isprintati kuponJedna osoba mo&#382;e koristiti 1 kupon na svoje imeJedna osoba mo&#382;e pokloniti 10 kuponakuponi se odnose na mjesta prve kategorije cijene (parket 1. do 6. red, ili balkon sredina 1. do 3. red)Ponuda uklju&#269;uje:&nbsp;ulaznicu za rock operu &quot;Gubec beg&quot;&nbsp;koja se odr&#382;ava 5.travnja u 19.30 sati u Kazali&scaron;tu Komedija, Kaptol 9Ulaznice se mogu podi&#263;i uz predo&#269;enje Kupime kupona na blagajni kazali&scaron;ta sat i pol prije po&#269;etka predstave i na blagajni Oktogon, Ilica 5, radnim danom od 8 do 17h, subotom od 8 do 13 hU slu&#269;aju otkazivanja predstave izvr&scaron;it &#263;e se povrat upla&#263;enog novcaRok iskoristivosti kupona: 5.4.2013.Nakon isteka roka iskoristivosti kupon nije mogu&#263;e iskoristiti', '45.816358', '15.97823', 1);
INSERT INTO `ponude` (`id`, `id_prodavatelja`, `id_kategorije`, `naslov`, `podnaslov`, `cijena`, `opis_naslov`, `opis_kratki`, `opis`, `napomena`, `karta_x`, `karta_y`, `aktivan`) VALUES
(45, 1, 1, 'U&#382;ivajte 3 dana kraj planina, jezera i dvorca Hrib', 'Samo 525 kn za trodnevni aran&#382;man uz 2 no&#263;enja s doru&#269;kom za 2 osobe u Hotelu Bor u Preddvoru', 1050, 'Odmor kakav se samo po&#382;eljeti mo&#382;e...', '\nsmje&scaron;taj hotela u idili&#269;nom mjestu Preddvor podno planine Stor&#382;i&#269; uz samo jezero ?rnavaudaljen ne&scaron;to manje od 30 kilometara od Ljubljane, 10 km od Kranja, a posebno je drag ljubiteljima skijanja zbog blizine skijali&scaron;ta Krvavecnetaknuta priroda i razli&#269;ite aktivnosti;&nbsp;planinarenje, &scaron;etanje i bicikliranjeiskoristivo do 30.04.2013.', 'Samo se rijetki hoteli Sloveniji mogu pohvaliti tako divnom lokacijom kao Hotel Bor. Udaljen je ne&scaron;to manje od 30 kilometara od Ljubljane i 10 km od Kranja. Zato, ako tra&#382;ite mjesto za romanti&#269;ni bijeg ili odmor od naporne svakodnevice, do&#273;ite u Hotel Bor. On &#263;e vam omogu&#263;iti opu&scaron;taju&#263;i boravak u okru&#382;enju nezaboravne prirode.&nbsp;Hotel Bor ima 31 sobu s telefonom, wc-om, kabelskom televizijom i besplatnim WiFi internetom, a tu su i restoran i bar u kojima se mo&#382;ete odmoriti nakon &scaron;etnji okolicom, a mo&#382;ete i oti&#263;i u Spa Centar. Za vas su pripremljene i brojne pogodnosti kao &scaron;to su 15% popusta na masa&#382;e i kori&scaron;tenje sauni u hotelskom wellnessu, mogu&#263;nost najma la&#273;e za vo&#382;nju po jezeru ?rnava u trajanju od 1 sata i najam palica za nordijsko hodanje.&nbsp;Zbog svog polo&#382;aja i netaknute prirode, boravak u Hotelu Bor vam omogu&#263;uje bavljenje razli&#269;itim aktivnostima kao &scaron;to su planinarenje, &scaron;etanje i bicikliranje, a u blizini se nalazi i adrenalinski park.&nbsp;Svakako prona&#273;ite vremena za obilazak povijesnog dvorca Hrib iz 16. stolje&#263;a kojeg mo&#382;ete posjetiti uz besplatnu pratnju.&nbsp;Odmorite se u prekrasnom prirodnom okru&#382;enju. Hotel Bor vas o&#269;ekuje!', 'Mogu&#263;nost pla&#263;anja Amex-om do 6 rata bez kamata i naknadaKupon mo&#382;ete koristiti odmah po primitkuJedna osoba mo&#382;e koristiti 3 kupona na svoje imeJedna osoba mo&#382;e pokloniti 3 kuponaJedan kupon vrijedi za dvije osobeKuponi se mogu spajatiPonuda uklju&#269;uje: 3 dana i 2 no&#263;enja s doru&#269;kom za dvije osobe, besplatno kori&scaron;tenje Wifi interneta i parkiranje i besplatno vo&#273;enje po dvorcu Hrib iz 16. stolje&#269;aDodatne pogodnosti:-15% popusta na masa&#382;e i kori&scaron;tenje sauna u wellnessu Hotela Bor-popusti na ski karte (najmanje dvodnevna karta za skijanje na Krvavcu) -mogu&#263;nost najma la&#273;e za vo&#382;nju po jezeru ?rnava u trajanju od 1h-najam palica za nordijsko hodanjeNadoplata za djecu:-do 3 godine gratis,- od 3 do 12 godina 50% popusta: 17,50&euro;- dje&#269;ji krevet: 5 &euro; na danTre&#263;a osoba na dodatnom le&#382;aju 20% popusta: 28&euro;Obavezna nadoplata turisti&#269;ka pristojba:-1&euro; po osobi/dan za odraslu osobu-0,50&euro; za djecu od 7 do 18 godina na danCjenik mo&#382;ete provjeriti ovdjeKu&#263;ni ljubimci dopu&scaron;teni uz najavu i nadoplatu 10&euro;/danProvjera raspolo&#382;ivosti prije kupnje kupona i potvrda rezervacije po primitku kupona na 00386 (0)4 2559 200, info@hotelbor.si ili prodaja@hotelbor.siRok iskoristivosti kupona: 30.04.2013.Kupon se smatra iskori&scaron;tenim ukoliko je korisnik rezervirao termin, a nije do&scaron;ao ili otkazao termin 2 dana prije dolaskaNakon isteka roka iskoristivosti kupon nije mogu&#263;e koristiti', '46.302814', '14.426991', 1),
(46, 1, 1, 'Kruno', '1', 1, '1', '', '1', '1', '1', '1', 0),
(47, 1, 9, 'Å½uja je zakon', 'Ovo je podnaslov za Å¾uju', 15, 'Naslov opisa', 'Ovo je naki opis samo da vidimo', 'Opisssssssssssss....', 'Nema napomene', '2', '3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prodavatelji`
--

CREATE TABLE IF NOT EXISTS `prodavatelji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) NOT NULL COMMENT 'korisnik koji je zaduzen za to poduc+zece',
  `naziv` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `kontakt` varchar(15) NOT NULL,
  `info` varchar(45) NOT NULL,
  `oib` varchar(45) NOT NULL,
  `aktivan` tinyint(4) NOT NULL COMMENT '0 neaktivan\n1 aktivan',
  PRIMARY KEY (`id`),
  KEY `fk_prodavatelji_1` (`id_korisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `prodavatelji`
--

INSERT INTO `prodavatelji` (`id`, `id_korisnika`, `naziv`, `adresa`, `kontakt`, `info`, `oib`, `aktivan`) VALUES
(1, 11, 'Dragicina firma', 'Banovci 3 c, 9241 VerÅ¾ej, Slovenija', '+386025888238', 'http://www.soncna-hisa.si ', '82275477684', 1),
(2, 1, 'Firma 2', '?ret b.b., Zagreb, Hrvatska', '0915205187', 'http://www.facebook.com/almina.potkovica', '20371366570', 1),
(3, 3, 'Firma 3', 'Iblerov trg  4, Zagreb, Hrvatska', '0923048252', 'http://www.corpusvalens.com', '30160999168', 1),
(4, 5, 'Firma 4', 'Pavla Hatza 7, Petrinjska 42a, Zagreb, Hrvats', '014572877,09145', 'http://www.latina.hr', '52123914876', 1),
(5, 5, '1', 'Otokara Ker&#353;ovanija 16, Osijek, Hrvatska', '031284-444', 'http://tinyurl.com/bmwsqdv', '38897124326', 1),
(6, 1, '1', 'Beli&#263;i 21, Kastav, Hrvatska', '051691602,09575', 'http://life-estetic.com/', '22629910132', 1),
(7, 3, '1', 'Ivana Mu&#382;evi&#263;a bb, Crikvenica, Hrva', '098259755', 'http://www.adrenalinpark.eu', '17785400474', 1),
(8, 3, '1', 'Klovi&#263;eva 2, Zagreb, Hrvatska', '012363240', 'http://www.mojastopala.com', '79510310381', 1),
(9, 5, '1', 'Lani&#353;te 3a, Zagreb, Hrvatska', '0955554337', 'http://www.tinyurl.com/d9q3lns', '77481789598', 1),
(10, 2, '1', 'Kru&#382;na 12, Rijeka, Hrvatska', '051323701,09216', 'http://www.ecgdental.net', '30211342076', 1),
(11, 4, '1', 'lvana Ma&#382;urani&#263;a 32a, Zadar, Hrvats', '0916479977', 'http://tinyurl.com/7rxztqh', '24324769538', 1),
(12, 2, '1', '', '052433588', 'http://www.berghoff-shop.i-mall.hr', '97444243391', 1),
(13, 4, '1', 'TC Dubrava (Koledine&#269;ka bb) i TC Jarun (', '017788551TCDubr', 'http://www.pmb.com.hr', '77361895458', 1),
(14, 5, '1', 'Kaptol 9, Zagreb, Hrvatska', '014813200', 'http://www.komedija.hr', '38385700370', 1),
(15, 3, '1', 'Circuito Internazionale del Friuli, Via Valle', '00390247921386', 'http://www.drivingbox.it', '95078826335', 1),
(16, 2, '1', '&#352;ibenska 27, Split, Hrvatska', '098831261099196', 'http://www.facebook.com/CentarMia ', '66708260216', 1),
(17, 1, '1', 'Tome Stri&#382;i&#263;a 12 a, Rijeka, Hrvatsk', '051218036,09129', 'http://www.amc-glavan.com', '81724539446', 1),
(18, 3, '1', '&#352;ibenska 27, Split, Hrvatska', '098831261,09919', 'http://www.facebook.com/CentarMia', '92373569742', 1),
(19, 3, '1', 'Tratinska 75/I, Zagreb, Hrvatska', '', 'http://www.kozniproblemi.com.hr', '78593791728', 1),
(20, 1, '1', 'Mihanovi&#263;eva 20, Zagreb, Hrvatska', '01	4576666', 'http://www.linguagrupa.hr', '95611862208', 1),
(21, 3, '1', 'Trg Ivana Me&#353;trovi&#263;a 7, Zagreb, Hrv', '0994052086,0922', 'http://www.facebook.com/a.bela13', '65087908764', 1),
(22, 3, '1', 'Marti&#263;eva 67/I, Zagreb, Hrvatska', '0922542281,0911', 'http://www.nautika-klub.com', '14738491120', 1),
(23, 3, '1', 'Shopping centar Pre&#269;ko, Zagreb, Hrvatska', '015802683', 'http://www.akcija-akcija.com', '31668143070', 1),
(24, 5, '1', 'Sun&#269;ana 39, 31222 Bizovac, Hrvatska', '031685100', 'http://www.bizovacke-toplice.hr', '41444790997', 1),
(25, 1, '1', 'Donji Zve&#269;aj 41, Duga Resa, Hrvatska', '0989581229,0992', 'http://www.kanuking-avantura.hr', '45233446963', 1),
(26, 1, '1', 'Frankopanska 10, Zagreb, Hrvatska', '014864616', 'http://www.gavella.hr', '10908124903', 1),
(27, 4, '1', 'Osje&#269;ka 44, Valpovo, Hrvatska', '0989179200', 'http://www.aura-centar.hr', '13610220604', 1),
(28, 3, '1', 'Hrvojeva 10/I, Split, Hrvatska', '021360270021360', 'http://www.implantati.com', '37199367638', 1),
(29, 2, '1', 'Resavska 11, Beograd, Srbija', '+3810113348993', 'http://www.hotelhelvecia.com ', '54305444973', 1),
(30, 3, '1', 'Karla Diene&#353;a 14, Nova Gradi&#353;ka, Hr', '091/4128673', 'http://www.hrabrodijete.info', '96732937203', 1),
(31, 1, '1', 'Branka Radi&#269;evi&#263;a 27, Osijek, Hrvat', '031500990,09150', 'http://www.vivasol.hr', '24076859329', 1),
(32, 3, '1', 'Dragutina Golika 28, Zagreb, Hrvatska', '0994533557', 'http://www.facebook.com/glazbenicentar.zagreb', '53027528525', 1),
(33, 3, '1', 'Prijepoljska 19b, Zagreb, Hrvatska', '01	2993595', 'http://www.poliklinika-stela.hr', '77677431344', 1),
(34, 2, '1', 'Kablarska cesta 44/5, Rijeka, Hrvatska', '0911698996,0977', 'http://www.kozmeticki-bebest.com', '24545103288', 1),
(35, 5, '1', '114. Brigade HV-a 12 (ex Boktuljin put bb), S', '0955500291', 'http://novaideja.hr', '18588118056', 1),
(36, 4, '1', 'Bo&#382;idara Ad&#382;ije 34, Zagreb, Hrvatsk', '0996540371,0912', 'http://www.facebook.com/avangard.frizeri', '61084680384', 1),
(37, 2, '1', 'Dra&#353;kovi&#263;eva 18, Zagreb, Hrvatska', '014813700', 'http://www.tinyurl.com/d9rol5w', '30886122470', 1),
(38, 5, '1', 'Jablanska 24, Zagreb, Hrvatska', '018887787', 'http://www.chef.com.hr', '72704332463', 1),
(39, 3, '1', 'Hrvatska', '013734327,09956', 'http://www.smjestaj-na-jadranu.net', '24291996317', 1),
(40, 5, '1', 'Bani 73, Buzin, Zagreb, Hrvatska', '016407716', 'http:// ', '47072347691', 1),
(41, 5, '1', 'T. Bla&#382;eka 3, Vara&#382;din, Hrvatska', '042213085', 'http://www.foto-mondo.com', '83735739102', 1),
(42, 4, '1', 'Rujevac 185, Rujevac, Hrvatska', '0998857895,0977', 'http://www.tinyurl.com/btkstjf', '95378794755', 1),
(43, 2, '1', 'Zve&#269;aj 109, Zve&#269;aj, Hrvatska', '0914133920', 'http://www.tinyurl.com/bpqk4q7', '67697985895', 1),
(44, 2, '1', 'Hrib 4a, Preddvor, Slovenija', '00386042559200', 'http://www.hotelbor.si', '41189162737', 1),
(45, 2, 'Dodana firma', 'Matina 22', '091111111', 'www.foi.hr', '05864405589', 0);

-- --------------------------------------------------------

--
-- Table structure for table `racuni`
--

CREATE TABLE IF NOT EXISTS `racuni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `placeno` tinyint(4) NOT NULL COMMENT '0 ne\n1 da',
  PRIMARY KEY (`id`),
  KEY `fk_racuni_1` (`id_korisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `racuni`
--

INSERT INTO `racuni` (`id`, `id_korisnika`, `datum`, `placeno`) VALUES
(17, 2, '2013-04-22 20:07:08', 1),
(18, 2, '2013-04-22 20:10:34', 1),
(19, 2, '2013-04-22 21:37:20', 1),
(20, 2, '2013-04-22 21:46:28', 1),
(21, 33, '2013-04-26 21:54:05', 1),
(22, 33, '2013-04-26 22:07:04', 1),
(23, 33, '2013-04-27 01:30:31', 1),
(24, 33, '2013-04-27 15:42:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `racuni_akcije`
--

CREATE TABLE IF NOT EXISTS `racuni_akcije` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_racuna` int(11) NOT NULL,
  `id_akcije` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_racuni_akcije_1` (`id_racuna`),
  KEY `fk_racuni_akcije_2` (`id_akcije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `racuni_akcije`
--

INSERT INTO `racuni_akcije` (`id`, `id_racuna`, `id_akcije`, `kolicina`) VALUES
(8, 17, 2, 1),
(9, 17, 5, 1),
(10, 18, 4, 1),
(11, 19, 2, 1),
(12, 20, 1, 1),
(13, 20, 6, 1),
(14, 21, 16, 1),
(15, 21, 25, 1),
(16, 22, 39, 1),
(17, 23, 3, 1),
(18, 24, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaucheri`
--

CREATE TABLE IF NOT EXISTS `vaucheri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `poruka` text NOT NULL,
  `vrijednost` int(11) NOT NULL,
  `id_racuna` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vaucheri_1` (`id_korisnika`),
  KEY `fk_vaucheri_2` (`id_racuna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vrijeme`
--

CREATE TABLE IF NOT EXISTS `vrijeme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pomak` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vrijeme`
--

INSERT INTO `vrijeme` (`id`, `pomak`) VALUES
(1, 0);

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

--
-- Constraints for table `vaucheri`
--
ALTER TABLE `vaucheri`
  ADD CONSTRAINT `fk_vaucheri_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vaucheri_2` FOREIGN KEY (`id_racuna`) REFERENCES `racuni` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
