-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 07 Janvier 2017 à 18:04
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `giftzz`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheter`
--

CREATE TABLE IF NOT EXISTS `acheter` (
  `COD_ARTICLE` varchar(50) NOT NULL,
  `EMAIL_UTILI` varchar(50) NOT NULL,
  `QT` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_ARTICLE`,`EMAIL_UTILI`),
  KEY `FK_ACHETER` (`EMAIL_UTILI`),
  KEY `COD_ARTICLE` (`COD_ARTICLE`,`EMAIL_UTILI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `COD_ARTICLE` varchar(50) NOT NULL,
  `CODE_CAT` varchar(50) NOT NULL,
  `LIBELLE_ARTICLE` varchar(50) DEFAULT NULL,
  `AGE_MAX` int(11) DEFAULT NULL,
  `AGE_MIN` int(11) DEFAULT NULL,
  `PRIX` decimal(10,0) DEFAULT NULL,
  `IMAGE` longblob,
  `DESCRIPTION` varchar(50) DEFAULT NULL,
  `QTE` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_ARTICLE`),
  KEY `CODE_CAT` (`CODE_CAT`),
  KEY `CODE_CAT_2` (`CODE_CAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`COD_ARTICLE`, `CODE_CAT`, `LIBELLE_ARTICLE`, `AGE_MAX`, `AGE_MIN`, `PRIX`, `IMAGE`, `DESCRIPTION`, `QTE`) VALUES
('1', '1', 'produit1', 10, 40, '10', 0x32302e6a7067, 'NOUVERLLE TECHNOLOGIE', 5),
('10', '1', 'produit10', 40, 15, '18', 0x33302e6a7067, 'NOUVERLLE TECHNOLOGIE', 4),
('1000', '1', 'profuit 1000', 35, 6, '59', 0x32352e6a7067, 'NOUVERLLE TECHNOLOGIE', 8),
('11', '1', 'produit11', 18, 35, '12', 0x35342e6a7067, 'NOUVERLLE TECHNOLOGIE', 10),
('12', '1', 'produit12', 30, 18, '18', 0x33392e6a7067, 'NOUVERLLE TECHNOLOGIE', 5),
('13', '1', 'produit13', 10, 17, '35', 0x33362e6a7067, 'NOUVERLLE TECHNOLOGIE', 8),
('14', '1', 'produit14', 10, 18, '14', 0x33342e6a7067, 'NOUVERLLE TECHNOLOGIE', 7),
('15', '1', 'produit15', 10, 10, '15', 0x34352e6a7067, 'NOUVERLLE TECHNOLOGIE', 9),
('16', '1', 'produit16', 10, 18, '11', 0x34362e6a7067, 'NOUVERLLE TECHNOLOGIE', 7),
('17', '1', 'produit17', 10, 18, '17', 0x34372e6a7067, 'NOUVERLLE TECHNOLOGIE', 8),
('18', '1', 'produit18', 10, 18, '16', 0x34322e6a7067, 'NOUVERLLE TECHNOLOGIE', 9),
('19', '1', 'produit19', 10, 18, '11', 0x34332e6a7067, 'NOUVERLLE TECHNOLOGIE', 5),
('2', '1', 'produit2', 10, 18, '11', 0x32322e6a7067, 'NOUVERLLE TECHNOLOGIE', 200),
('20', '1', 'produit20', 14, 17, '35', 0x34342e6a7067, 'NOUVERLLE TECHNOLOGIE', 20),
('21', '2', 'produit21', 10, 17, '13', 0x36392e6a7067, 'HOMME', 12),
('22', '2', 'produit22', 10, 18, '11', 0x37302e6a7067, 'HOMME', 20),
('24', '2', 'produit24', 10, 18, '17', 0x37322e6a7067, 'HOMME', 9),
('25', '2', 'produit25', 14, 18, '35', 0x37332e6a7067, 'HOMME', 4),
('26', '2', 'produit26', 10, 18, '11', 0x37342e6a7067, 'HOMME', 3),
('27', '2', 'produit27', 10, 18, '35', 0x37352e6a7067, 'HOMME', 1),
('28', '2', 'produit28', 10, 18, '11', 0x37362e6a7067, 'HOMME', 6),
('29', '2', 'produit29', 10, 18, '12', 0x37382e6a7067, 'HOMME', 1),
('3', '1', 'produit3', 10, 18, '35', 0x32332e6a7067, 'NOUVERLLE TECHNOLOGIE', 8),
('30', '2', 'produit30', 10, 18, '17', 0x37392e6a7067, 'HOMME', 5),
('4', '1', 'produit4', 10, 18, '17', 0x32342e6a7067, 'NOUVERLLE TECHNOLOGIE', 20),
('40', '3', 'produit40', 10, 14, '12', 0x3130302e6a7067, 'FEMMES', 7),
('41', '3', 'produit31', 10, 18, '11', 0x3137372e6a7067, 'FEMMES', 20),
('42', '3', 'produit42', 10, 18, '12', 0x3130322e6a7067, 'FEMMES', 1),
('43', '3', 'produit43', 10, 18, '11', 0x3137332e6a7067, 'FEMMES', 5),
('45', '3', 'produit45', 10, 18, '55', 0x3138312e6a7067, 'FEMMES', 20),
('46', '3', 'produit46', 10, 18, '11', 0x3130352e6a7067, 'FEMMES', 20),
('47', '3', 'produit47', 10, 18, '35', 0x3130362e6a7067, 'FEMMES', 11),
('48', '3', 'produit48', 10, 18, '11', 0x3130372e6a7067, 'FEMMES', 8),
('49', '4', 'produit49', 10, 17, '35', 0x3132302e6a7067, 'ENFANTS', 12),
('5', '1', 'produit5', 10, 18, '14', 0x32352e6a7067, 'NOUVERLLE TECHNOLOGIE', 10),
('50', '4', 'produit50', 10, 18, '11', 0x3132312e6a7067, 'ENFANTS', 20),
('51', '4', 'produit51', 10, 18, '12', 0x3132322e6a7067, 'ENFANTS', 14),
('52', '4', 'produit52', 10, 18, '1', 0x3132332e6a7067, 'ENFANTS', 5),
('53', '4', 'produit53', 10, 18, '35', 0x3132342e6a7067, 'ENFANTS', 800),
('54', '4', 'produit54', 10, 18, '11', 0x3132352e6a7067, 'ENFANTS', 11),
('55', '4', 'produit55', 10, 18, '35', 0x3132362e6a7067, 'ENFANTS', 2),
('56', '4', 'produit56', 10, 18, '11', 0x3132372e6a7067, 'ENFANTS', -767),
('58', '4', 'produit58', 10, 18, '11', 0x3132382e6a7067, 'ENFANTS', 1920),
('59', '4', 'produit59', 10, 18, '11', 0x3132392e6a7067, 'ENFANTS', 5),
('6', '1', 'produit6', 10, 18, '11', 0x32362e6a7067, 'NOUVERLLE TECHNOLOGIE', 6),
('61', '4', 'produit61', 10, 18, '12', 0x3133372e6a7067, 'ENFANTS', 2),
('62', '4', 'produit62', 10, 18, '11', 0x3133382e6a7067, 'ENFANTS', 5),
('63', '5', 'produit63', 10, 18, '35', 0x3134322e6a7067, 'VETEMENTS', 2),
('64', '5', 'T-shirt DC', 10, 18, '11', 0x3135362e6a7067, 'VETEMENTS', 12),
('65', '5', 'produit65', 10, 18, '35', 0x3136312e6a7067, 'VETEMENTS', 2),
('66', '5', 'produit2', 10, 18, '11', 0x3136322e6a7067, 'VETEMENTS', 6),
('67', '5', 'produit67', 10, 18, '35', 0x3136342e6a7067, 'VETEMENTS', 11),
('68', '5', 'produit68', 10, 18, '11', 0x3134332e6a7067, 'VETEMENTS', 7),
('69', '5', 'produit69', 10, 18, '35', 0x3135342e6a7067, 'VETEMENTS', 2),
('7', '1', 'produit7', 10, 18, '35', 0x32372e6a7067, 'NOUVERLLE TECHNOLOGIE', 9),
('70', '5', 'produit70', 10, 18, '11', 0x3135362e6a7067, 'VETEMENTS', 5),
('8', '1', 'produit8', 10, 18, '17', 0x32382e6a7067, 'NOUVERLLE TECHNOLOGIE', 7),
('9', '1', 'produit9', 10, 18, '35', 0x32392e6a7067, 'NOUVERLLE TECHNOLOGIE', 13);

-- --------------------------------------------------------

--
-- Structure de la table `attacher`
--

CREATE TABLE IF NOT EXISTS `attacher` (
  `COD_ARTICLE` varchar(50) NOT NULL,
  `ID_EVENEMENT` int(11) NOT NULL,
  PRIMARY KEY (`COD_ARTICLE`,`ID_EVENEMENT`),
  KEY `FK_ATTACHER` (`ID_EVENEMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `attacher`
--

INSERT INTO `attacher` (`COD_ARTICLE`, `ID_EVENEMENT`) VALUES
('1', 1),
('10', 1),
('1000', 1),
('11', 1),
('12', 1),
('1000', 4),
('1000', 8),
('12', 8);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `nom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`nom`, `email`, `message`, `date`) VALUES
('mehdi', 'mehdi1994@hotmail.co', 'aezaezaeazerettyzeaz', '2017-01-01'),
('packard bell ', 'packardbell@hotmail.', 'sdfqdhjklmjhfdgsjurtytryrtyryrtytutr', '2017-01-01'),
('bell', 'bell@hotmail.com', 'le site est bon merci (-_-)', '2017-01-01'),
('azaqza', 'sfdsf@hbf.jid', 'dfsdgfsdghhjgj', '2017-01-01'),
('client94', 'client94@hotmail.com', 'j''aime pas le site ...!', '2017-01-01'),
('client78', 'client78@hotmail.com', 'azeazrzerscsfef', '2017-01-01'),
('client7', 'client94@hotmail.com', 'hjgfjgjshvgkjghdkxhjv', '2017-01-02'),
('azaerz', 'hgfe@gfdyzh.gh', 'ezaeqfdqf', '2017-01-03'),
('testsdg', 'test94@hotmail.com', 'hjsdvhfdgq', '2017-01-03'),
('zsez', 'sdsds@sdjf', 'shjsjhsjjsgj htshth', '2017-01-03'),
('anass', 'anass.laghouaouta@ho', 'gÃ©nial :D', '2017-01-03'),
('anas', 'mailanas@mail.com', 'les avis marche tres bien', '2017-01-01'),
('anas', 'anass.laghouaouta@ho', 'ce commentaire est un test', '2017-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `CODE_CAT` varchar(50) NOT NULL,
  `NOM_CAT` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CODE_CAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`CODE_CAT`, `NOM_CAT`) VALUES
('1', 'NOUVERLLE TECHNOLOGIE'),
('2', 'ACCESSOIRES'),
('3', 'BEAUTE'),
('4', 'JEUX'),
('5', 'VETEMENTS'),
('6', 'SPORT');

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

CREATE TABLE IF NOT EXISTS `destination` (
  `ID_DES` int(11) NOT NULL,
  `NOM_DES` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_DES`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `destination`
--

INSERT INTO `destination` (`ID_DES`, `NOM_DES`) VALUES
(1, 'HOMMES'),
(2, 'FEMMES'),
(3, 'ENFANTS'),
(4, 'ANIMEAUX'),
(5, 'COUPLE'),
(6, 'BEBE');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `ID_EVENEMENT` int(11) NOT NULL,
  `NOM_EVENEMENT` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_EVENEMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`ID_EVENEMENT`, `NOM_EVENEMENT`) VALUES
(1, 'Anniversaire'),
(2, 'Mariage'),
(4, 'VALENTIN'),
(8, 'Fete des Meres'),
(9, 'Halloween');

-- --------------------------------------------------------

--
-- Structure de la table `lier`
--

CREATE TABLE IF NOT EXISTS `lier` (
  `COD_ARTICLE` varchar(50) NOT NULL,
  `ID_DES` int(11) NOT NULL,
  PRIMARY KEY (`COD_ARTICLE`,`ID_DES`),
  KEY `FK_LIER` (`ID_DES`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lier`
--

INSERT INTO `lier` (`COD_ARTICLE`, `ID_DES`) VALUES
('10', 1),
('1000', 1),
('12', 1),
('10', 2),
('1000', 2),
('12', 2),
('1', 3),
('1000', 3),
('11', 3),
('7', 3);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `sujet` varchar(100) DEFAULT NULL,
  `messageTexte` varchar(1000) NOT NULL,
  `mail` varchar(50) NOT NULL,
  KEY `fk_nutil_msg` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`sujet`, `messageTexte`, `mail`) VALUES
('subject', 'oshshit', 'zak@mail.com'),
('sujet', 'ananassss', 'test@email.com'),
('sujet', 'nfousuogfhsfsdsf', 'lala@mail.com'),
('sujet', 'nfousuogfhsfsdsf', 'lala@mail.com'),
('anass sujet', 'le sujet est gjiphfgspidfjs sifhn nsihnfs', 'anass.laghouaouta@gmail.com'),
('sujeet', 'mesaaaaage', 'maiil@hotmail.fr'),
('sujeet', 'mesaaaaage', 'maiil@hotmail.fr'),
('sujet', 'message ^_^', 'anass.laghouaouta@hotmail.fr'),
('sujet', 'message', 'anass.laghouaouta@hotmail.fr'),
('aa', 'zazaza', 'anass.laghouaouta@hotmail.fr'),
('aa', 'zazaza', 'anass.laghouaouta@hotmail.fr'),
('aa', 'zazaza', 'anass.laghouaouta@hotmail.fr'),
('zazaz', 'azazaz', 'anass.laghouaouta@hotmail.fr'),
('ezez', 'ezezeze', 'anass.laghouaouta@hotmail.fr'),
('azaza', 'zazazaz', 'anass.laghouaouta@hotmail.fr'),
('azaza', 'zazazaz', 'anass.laghouaouta@hotmail.fr'),
('azaza', 'zazazaz', 'anass.laghouaouta@hotmail.fr'),
('qsqsq', 'qsqsqs', 'anass.laghouaouta@hotmail.fr'),
('qsqsq', 'qsqsqs', 'anass.laghouaouta@hotmail.fr'),
('ezeze', 'ezezeze', 'anass.laghouaouta@hotmail.fr'),
('ezeze', 'ezezeze', 'anass.laghouaouta@hotmail.fr'),
('ezeze', 'ezezeze', 'anass.laghouaouta@hotmail.fr'),
('zazaz', 'zazaza', 'anass.laghouaouta@hotmail.fr'),
('sujet', 'message', 'mohamed@email.com'),
('asasa', 'sasas', 'asas@hotmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `nonutilisateur`
--

CREATE TABLE IF NOT EXISTS `nonutilisateur` (
  `Nom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `nonutilisateur`
--

INSERT INTO `nonutilisateur` (`Nom`, `mail`) VALUES
('sasa', 'aasasa@sasas'),
('asasa', 'asas@hotmail.com'),
('hamza', 'hamza@mail.com'),
(',rkgr', 'koass@mail.com'),
('anass', 'lala@hotmail.fr'),
('anass', 'lala@mail.com'),
('oh shit lel', 'lel@mail.lel'),
('anas', 'maiil@hotmail.fr'),
('zkkzlkez', 'mail@email.com'),
('mohamed', 'mohamed@email.com'),
('anass', 'nnregistred@hotmail.com'),
('Hamza', 'Salhi@mail.com'),
('anass', 'test@email.com'),
('zaak', 'zak@mail.com');

-- --------------------------------------------------------

--
-- Structure de la table `paypal_log`
--

CREATE TABLE IF NOT EXISTS `paypal_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(600) NOT NULL,
  `log` text NOT NULL,
  `posted_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(300) NOT NULL,
  `trasaction_id` varchar(600) NOT NULL,
  `log_id` int(10) NOT NULL,
  `product_id` varchar(300) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_quantity` varchar(300) NOT NULL,
  `product_amount` varchar(300) NOT NULL,
  `payer_fname` varchar(300) NOT NULL,
  `payer_lname` varchar(300) NOT NULL,
  `payer_address` varchar(300) NOT NULL,
  `payer_city` varchar(300) NOT NULL,
  `payer_state` varchar(300) NOT NULL,
  `payer_zip` varchar(300) NOT NULL,
  `payer_country` varchar(300) NOT NULL,
  `payer_email` text NOT NULL,
  `payment_status` varchar(300) NOT NULL,
  `posted_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `purchases`
--

INSERT INTO `purchases` (`id`, `invoice`, `trasaction_id`, `log_id`, `product_id`, `product_name`, `product_quantity`, `product_amount`, `payer_fname`, `payer_lname`, `payer_address`, `payer_city`, `payer_state`, `payer_zip`, `payer_country`, `payer_email`, `payment_status`, `posted_date`) VALUES
(1, '1844284218', '', 0, '67567', 'Crocodile Shoes', '3', '40.00', 'Mohamed', 'Asif', 'Address of me', 'City of me', 'State of me', '123456', 'US', 'asif18@asif18.com', 'pending', '2017-01-01 17:44:32'),
(2, '1844284218', '', 0, '67567', 'Crocodile Shoes', '3', '40.00', 'Mohamed', 'Asif', 'Address of me', 'City of me', 'State of me', '123456', 'US', 'asif18@asif18.com', 'pending', '2016-12-31 17:45:02'),
(3, '1844284218', '', 0, '67567', 'Crocodile Shoes', '3', '40.00', 'Mohamed', 'Asif', 'Address of me', 'City of me', 'State of me', '123456', 'US', 'asif18@asif18.com', 'pending', '2017-01-07 17:45:29'),
(4, '1844284218', '', 0, '67567', 'Crocodile Shoes', '3', '40.00', 'Mohamed', 'Asif', 'Address of me', 'City of me', 'State of me', '123456', 'US', 'asif18@asif18.com', 'pending', '2017-01-05 17:45:46'),
(5, '1844284218', '', 0, '67567', 'Crocodile Shoes', '3', '40.00', 'Mohamed', 'Asif', 'Address of me', 'City of me', 'State of me', '123456', 'US', 'asif18@asif18.com', 'pending', '2017-01-05 17:46:00'),
(6, '1844284218', '', 0, '67567', 'Crocodile Shoes', '3', '40.00', 'Mohamed', 'Asif', 'Address of me', 'City of me', 'State of me', '123456', 'US', 'asif18@asif18.com', 'pending', '2017-09-11 17:46:12'),
(7, '1900225481', '', 0, '68089', 'Crocodile Shoes', '3', '40.00', 'Mohamed', 'Asif', 'Address of me', 'City of me', 'State of me', '123456', 'US', 'asif18@asif18.com', 'pending', '2017-01-11 18:00:25');

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

CREATE TABLE IF NOT EXISTS `sous_categorie` (
  `COD_S_CAT` varchar(50) NOT NULL,
  `CODE_CAT` varchar(50) NOT NULL,
  `NOM_S_CAT` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`COD_S_CAT`),
  KEY `FK_AVOIR1` (`CODE_CAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`COD_S_CAT`, `CODE_CAT`, `NOM_S_CAT`) VALUES
('1', '1', 'Accessoires'),
('10', '3', 'Sacs'),
('18', '4', 'jeu'),
('2', '1', 'Musique'),
('3', '1', 'phone'),
('5', '2', 'Montre'),
('6', '2', 'Accessoires'),
('7', '2', 'Sacs'),
('8', '3', 'Montre'),
('9', '3', 'Accessoires');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `EMAIL_UTILI` varchar(50) NOT NULL,
  `NOM_UTILI` varchar(50) DEFAULT NULL,
  `PRENOM_UTIL` varchar(50) DEFAULT NULL,
  `MOT_DE_PASS_UTIL` varchar(100) DEFAULT NULL,
  `CIVILITE_UTIL` varchar(50) DEFAULT NULL,
  `DATE_NAISS_UTIL` date DEFAULT NULL,
  `ADRESSE_UTIL` varchar(50) DEFAULT NULL,
  `CODE_POSTALE_UTIL` varchar(50) DEFAULT NULL,
  `VILLE_UTIL` varchar(50) DEFAULT NULL,
  `TELE_DOMICILE` varchar(50) DEFAULT NULL,
  `TELE_PORTABLE` varchar(50) DEFAULT NULL,
  `TYPE_UTILISATEUR` tinyint(1) DEFAULT NULL,
  `pseudo` varchar(50) NOT NULL,
  `hash` varchar(32) DEFAULT NULL,
  `activation` tinyint(1) NOT NULL,
  PRIMARY KEY (`EMAIL_UTILI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`EMAIL_UTILI`, `NOM_UTILI`, `PRENOM_UTIL`, `MOT_DE_PASS_UTIL`, `CIVILITE_UTIL`, `DATE_NAISS_UTIL`, `ADRESSE_UTIL`, `CODE_POSTALE_UTIL`, `VILLE_UTIL`, `TELE_DOMICILE`, `TELE_PORTABLE`, `TYPE_UTILISATEUR`, `pseudo`, `hash`, `activation`) VALUES
('admin@mail.com', NULL, NULL, 'sha256:1000:cl3PXnzTSD5VA2OvzuiZMZLBdKY2FXnh:cu5FVhM4QEuGAA+uE/hSm6WrtiZqKvSX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'admin', 'a2557a7b2e94197ff767970b67041697', 1),
('anass.laghouaouta@hotmail.fr', 'anas', 'laghouaouta', 'sha256:1000:XhT02PkUwiHnAck4Jov/WchEnlYO5C3n:2wk6b50tqjyg2gAu58KsuiaHxtbYZfi3', 'M', '0000-00-00', '32, rue racine', '59650', 'villeneuve d''ascq', 'je le connais pas :(', 'idem', 0, 'anas', NULL, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `acheter`
--
ALTER TABLE `acheter`
  ADD CONSTRAINT `fk_ach_art` FOREIGN KEY (`COD_ARTICLE`) REFERENCES `article` (`COD_ARTICLE`),
  ADD CONSTRAINT `fk_ach_util` FOREIGN KEY (`EMAIL_UTILI`) REFERENCES `utilisateur` (`EMAIL_UTILI`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_art_cat` FOREIGN KEY (`CODE_CAT`) REFERENCES `categorie` (`CODE_CAT`);

--
-- Contraintes pour la table `attacher`
--
ALTER TABLE `attacher`
  ADD CONSTRAINT `fk_att_art` FOREIGN KEY (`COD_ARTICLE`) REFERENCES `article` (`COD_ARTICLE`),
  ADD CONSTRAINT `fk_att_eve` FOREIGN KEY (`ID_EVENEMENT`) REFERENCES `evenement` (`ID_EVENEMENT`);

--
-- Contraintes pour la table `lier`
--
ALTER TABLE `lier`
  ADD CONSTRAINT `fk_li_art` FOREIGN KEY (`COD_ARTICLE`) REFERENCES `article` (`COD_ARTICLE`),
  ADD CONSTRAINT `fk_li_des` FOREIGN KEY (`ID_DES`) REFERENCES `destination` (`ID_DES`);

--
-- Contraintes pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD CONSTRAINT `fk_sou_cat` FOREIGN KEY (`CODE_CAT`) REFERENCES `categorie` (`CODE_CAT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
