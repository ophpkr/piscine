-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 14 Janvier 2017 à 05:08
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `NumGroupe` int(11) NOT NULL AUTO_INCREMENT,
  `NomGroupe` varchar(100) NOT NULL,
  PRIMARY KEY (`NumGroupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`NumGroupe`, `NomGroupe`) VALUES
(1, 'Groupe 1'),
(2, 'Groupe 2'),
(3, 'Groupe 3'),
(4, 'Groupe 4'),
(5, 'Groupe 5'),
(6, 'Groupe 6'),
(7, 'Groupe 7\r\n'),
(8, 'Groupe 8'),
(9, 'Groupe 9'),
(10, 'Groupe 10'),
(11, 'Groupe 11'),
(12, 'Groupe 12');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `NumProfil` int(11) NOT NULL AUTO_INCREMENT,
  `NomProfil` varchar(100) NOT NULL,
  PRIMARY KEY (`NumProfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`NumProfil`, `NomProfil`) VALUES
(1, 'REALISTE'),
(2, 'INVESTIGATIF'),
(3, 'ARTISTIQUE'),
(4, 'SOCIAL'),
(5, 'ENTREPRENEUR'),
(6, 'CONVENTIONNEL');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `NumPromo` int(11) NOT NULL AUTO_INCREMENT,
  `NomPromo` varchar(100) NOT NULL,
  `AnneePromo` int(11) NOT NULL,
  `CodePromo` varchar(100) NOT NULL,
  `OuverturePromo` int(11) NOT NULL,
  PRIMARY KEY (`NumPromo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`NumPromo`, `NomPromo`, `AnneePromo`, `CodePromo`, `OuverturePromo`) VALUES
(1, 'NOPROMO', 0, '0', 0),
(15, 'IG3', 2017, 'IG32017', 1),
(16, 'IG4', 2017, 'IG42017', 0),
(17, 'IG5', 2017, 'IG52017', 0),
(18, 'EGB3', 2017, 'EGB32017', 0);

-- --------------------------------------------------------

--
-- Structure de la table `proposition`
--

CREATE TABLE IF NOT EXISTS `proposition` (
  `NumGroupe` int(11) NOT NULL,
  `NumProfil` int(11) NOT NULL,
  `NumProp` int(11) NOT NULL AUTO_INCREMENT,
  `ContenuProp` varchar(100) NOT NULL,
  PRIMARY KEY (`NumProp`),
  KEY `fk0` (`NumGroupe`),
  KEY `fk1` (`NumProfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Contenu de la table `proposition`
--

INSERT INTO `proposition` (`NumGroupe`, `NumProfil`, `NumProp`, `ContenuProp`) VALUES
(1, 1, 1, 'Vous aimez avoir des activités à l''extérieur, travailler en plein air'),
(1, 2, 2, 'Vous aimez élargir vos connaissances par l''étude, pouvoir approfondir un sujet'),
(1, 3, 3, 'Vous aimez travailler de façon indépendante, sans méthode ni objectif structurés'),
(1, 4, 4, 'Vous aimez travailler avec d''autres personnes pour les informer'),
(1, 5, 5, 'Vous admirez les personnes qui ont du pouvoir ou gagnent beaucoup d''argent'),
(1, 6, 6, 'Vous aimez travailler avec des chiffres'),
(2, 4, 7, 'Vous admirez les personnes qui travaillent pour soigner les autres'),
(2, 6, 8, 'Vous aimez une organisation claire et bien définie'),
(2, 5, 9, 'Vous aimez contribuer et atteindre les objectifs d''une organisation'),
(2, 1, 10, 'Vous aimez le sport, vous dépensez physiquement'),
(2, 2, 11, 'Vous aimez étudier les choses, les phénomènes ou les comportements'),
(2, 3, 12, 'Vous admirez les personnes qui ont des capacités artistiques'),
(3, 4, 13, 'Vou aimez travailler avec d''autres personnes pour les former, les entraîner'),
(3, 3, 14, 'Vous aimez les changements ou les situations imprévues'),
(3, 6, 15, 'Vous aimez ne faire qu''une seule chose à la fois et vous ne vous laissez pas distraire'),
(3, 5, 16, 'Vous aimez donner des ordres ou consignes et organiser l''activité des autres'),
(3, 2, 17, 'Vous aimez tirer vos propres conclusions de l''analyse d''une situation donnée'),
(3, 1, 18, 'Vous aimez conduire des véhicules ou faire fonctionner des machines'),
(4, 1, 19, 'Vous aimez fabriquer ou réparer des objets'),
(4, 3, 20, 'Vous aimez ne pas savoir précisément ce que vous avez à faire'),
(4, 6, 21, 'Vous aimez mettre en oeuvre des " bonnes pratiques " acquises par l''expérience'),
(4, 5, 22, 'Vous aimez faire preuve d''initiative et prendre des décisions rapides'),
(4, 4, 23, 'Vous aimez écouter, dialoguer, essayer de comprendre les autres'),
(4, 2, 24, 'Vous aimez vous fier à votre jugement pour décider comment faire les choses'),
(5, 3, 25, 'Vous aimez faire plusieurs activités en même temps, ou passer d''une action à l''autre'),
(5, 5, 26, 'Vous aimez décider de ce qui doit être fait'),
(5, 4, 27, 'Vous aimez rencontrer des gens nouveaux'),
(5, 2, 28, 'Vous aimez vérifier une conclusion par des tests ou des informations complémentaires'),
(5, 6, 29, 'Vous aimez appuyer vos conclusions sur des bases déjà prouvées'),
(5, 1, 30, 'Vous aimez bricoler, utiliser des outils tels que des tournevis, ciseaux, pinces, etc...'),
(6, 2, 31, 'Vous aimez résoudre les problèmes de façon rationnelle, étape par étape'),
(6, 1, 32, 'vous aimez la nature, les plantes, les animaux...'),
(6, 6, 33, 'Vous aimez respecter les valeurs que vous vous êtes fixées'),
(6, 4, 34, 'Vous aimez faire un travail en commun avec d''autres'),
(6, 5, 35, 'Vous aimez relever des défis'),
(6, 3, 36, 'Vous aimez vous fier à votre intuition pour prendre des décisions'),
(7, 5, 37, 'Vous aimez convaincre les autres d''agir d''une certaine façon'),
(7, 3, 38, 'Vous aimez résoudre un problème sans avoir recours à une méthode logique'),
(7, 2, 39, 'Vous aimez prendre une décision après une réflexion, si possible logique'),
(7, 6, 40, 'Vous aimez suivre attentivement un plan pour atteindre le meilleur résultat possible'),
(7, 4, 41, 'Vous aimez écouter les autres et les conseiller sur la façon de résoudre leurs problèmes'),
(7, 1, 42, 'Vous aimez trouver une solution concrète, réaliste et simple aux problèmes'),
(8, 2, 43, 'Vous aimez concevoir ou améliorer les méthodes de travail'),
(8, 1, 44, 'Vous aimez utiliser votre "bon sens"'),
(8, 4, 45, 'Vous aimez rendre service, venir en aide à d''autres personnes'),
(8, 5, 46, 'Vous aimez répondre aux objections de vos interlocuteurs pour mieux les convaincre'),
(8, 3, 47, 'Vous aimez montrer votre originalité'),
(8, 6, 48, 'Vous aimez travailler avec soin pour obtenir un résultat parfait'),
(9, 4, 49, 'Vous aimez ou aimeriez animer des activités collectives, associatives...'),
(9, 2, 50, 'Vous aimez ou aimeriez étudier la physique, la biologie, ou la technologie'),
(9, 1, 51, 'Vous aimez démonter un appareil pour le réparer vous-même'),
(9, 5, 52, 'Vous aimez discuter avec un commerçant pour obtenir des réductions de prix'),
(9, 3, 53, 'Vous aimez exprimer vos idées, vos points de vue ou vos émotions'),
(9, 6, 54, 'Vous aimez rédiger un résumé, une lettre, un compte-rendu'),
(10, 5, 55, 'Vous aimez faire face aux situations urgentes ou imprévues'),
(10, 6, 56, 'Vous aimez vous occuper de démarches administratives ou d''ordre juridique'),
(10, 4, 57, 'Vous aimez ou aimeriez faire des reportages, écrire des articles, etc...'),
(10, 2, 58, 'Vous aimez chercher à comprendre et à expliquer le pourquoi des choses et des êtres'),
(10, 3, 59, 'Vous aimez imaginer des solutions qui sortent de l''ordinaire'),
(10, 1, 60, 'Vous aimez ou aimeriez utiliser un objet que vous avez fabriqué vous-même'),
(11, 4, 61, 'Vous aimez apprendre aux autres ce que vous savez'),
(11, 1, 62, 'Vous aimez collectioner des choses: timbres, cartes postales, pierres, etc...'),
(11, 6, 63, 'Vous aimez passer une grande partie de votre temps sur des documents écrits'),
(11, 5, 64, 'Vous aimez ou aimeriez vendre des produits ou services'),
(11, 2, 65, 'Vous aimez vous servir d''un microscope ou autre appareil de mesure...'),
(11, 3, 66, 'Vous aimez ou aimeriez avoir des loisirs créatifs : peinture, musique...'),
(12, 6, 67, 'Vous aimez classer, ordonner des documents ou des objets'),
(12, 5, 68, 'Vous aimez conduire une discussion, un débat'),
(12, 4, 69, 'Vous aimez échanger des idées avec les autres'),
(12, 1, 70, 'Vous aimez que ce que vous faites débouche sur des résultats concrets'),
(12, 2, 71, 'Vous aimez ou aimeriez mettre au point et réaliser des expériences scientifiques'),
(12, 3, 72, 'Vous aimez étudier ou inventer plusieurs solutions pour répondre à un problème');

-- --------------------------------------------------------

--
-- Structure de la table `repondre`
--

CREATE TABLE IF NOT EXISTS `repondre` (
  `NumUser` int(11) NOT NULL,
  `NumGroupe` int(11) NOT NULL,
  `Reponse1` int(11) NOT NULL,
  `Reponse2` int(11) NOT NULL,
  `Reponse3` int(11) NOT NULL,
  PRIMARY KEY (`NumUser`,`NumGroupe`),
  KEY `Repondre_fk1` (`NumGroupe`),
  KEY `Repondre_fk2` (`Reponse1`),
  KEY `Repondre_fk3` (`Reponse2`),
  KEY `Repondre_fk4` (`Reponse3`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `repondre`
--

INSERT INTO `repondre` (`NumUser`, `NumGroupe`, `Reponse1`, `Reponse2`, `Reponse3`) VALUES
(28, 1, 1, 2, 3),
(28, 2, 7, 10, 12),
(28, 3, 14, 17, 13),
(28, 4, 23, 20, 22),
(28, 5, 26, 27, 25),
(28, 6, 35, 31, 33),
(28, 7, 37, 39, 41),
(28, 8, 43, 45, 48),
(28, 9, 52, 50, 51),
(28, 10, 55, 57, 59),
(28, 11, 64, 62, 63),
(28, 12, 70, 69, 67),
(29, 1, 1, 2, 3),
(29, 2, 7, 8, 9),
(29, 3, 16, 15, 14),
(29, 4, 22, 21, 20),
(29, 5, 28, 27, 26),
(29, 6, 31, 36, 35),
(29, 7, 40, 39, 38),
(29, 8, 46, 45, 44),
(29, 9, 52, 51, 50),
(29, 10, 58, 57, 56),
(29, 11, 64, 63, 62),
(29, 12, 70, 69, 68),
(32, 1, 1, 2, 3),
(32, 2, 12, 11, 10),
(32, 3, 16, 15, 14),
(32, 4, 23, 22, 21),
(32, 5, 27, 26, 25),
(32, 6, 34, 33, 32),
(32, 7, 41, 40, 39),
(32, 8, 47, 46, 45),
(32, 9, 49, 50, 51),
(32, 10, 55, 56, 57),
(32, 11, 64, 63, 62),
(32, 12, 70, 69, 68),
(33, 1, 1, 2, 3),
(33, 2, 7, 8, 9),
(33, 3, 13, 14, 15),
(33, 4, 24, 23, 22),
(33, 5, 30, 29, 28),
(33, 6, 36, 35, 34),
(33, 7, 40, 39, 38),
(33, 8, 45, 44, 43),
(33, 9, 51, 50, 49),
(33, 10, 56, 57, 60),
(33, 11, 63, 62, 61),
(33, 12, 72, 71, 70);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `NumUser` int(11) NOT NULL AUTO_INCREMENT,
  `NomUser` varchar(100) NOT NULL,
  `PrenomUser` varchar(100) NOT NULL,
  `MailUser` varchar(100) NOT NULL,
  `PwdUser` varchar(100) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `NumPromo` int(11) DEFAULT NULL,
  PRIMARY KEY (`NumUser`),
  KEY `user_fk0` (`NumPromo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`NumUser`, `NomUser`, `PrenomUser`, `MailUser`, `PwdUser`, `Admin`, `NumPromo`) VALUES
(27, 'admin', 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1),
(28, 'test', 'test', 'test@test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 15),
(29, 'testa', 'testa', 'testa@gmail.com', '8efd86fb78a56a5145ed7739dcb00c78581c5375', 0, NULL),
(32, 'z', 'z', 'z@z', '395df8f7c51f007019cb30201c49e884b46b92fa', 0, 15),
(33, 'r', 'r', 'r@r', '4dc7c9ec434ed06502767136789763ec11d2c4b7', 0, 15),
(34, 't', 't', 't@t', '8efd86fb78a56a5145ed7739dcb00c78581c5375', 0, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `proposition`
--
ALTER TABLE `proposition`
  ADD CONSTRAINT `fk0` FOREIGN KEY (`NumGroupe`) REFERENCES `groupe` (`NumGroupe`),
  ADD CONSTRAINT `fk1` FOREIGN KEY (`NumProfil`) REFERENCES `profil` (`NumProfil`);

--
-- Contraintes pour la table `repondre`
--
ALTER TABLE `repondre`
  ADD CONSTRAINT `repondre_fk10` FOREIGN KEY (`NumUser`) REFERENCES `user` (`NumUser`) ON DELETE CASCADE,
  ADD CONSTRAINT `Repondre_fk0` FOREIGN KEY (`NumUser`) REFERENCES `user` (`NumUser`),
  ADD CONSTRAINT `Repondre_fk1` FOREIGN KEY (`NumGroupe`) REFERENCES `groupe` (`NumGroupe`),
  ADD CONSTRAINT `Repondre_fk2` FOREIGN KEY (`Reponse1`) REFERENCES `proposition` (`NumProp`),
  ADD CONSTRAINT `Repondre_fk3` FOREIGN KEY (`Reponse2`) REFERENCES `proposition` (`NumProp`),
  ADD CONSTRAINT `Repondre_fk4` FOREIGN KEY (`Reponse3`) REFERENCES `proposition` (`NumProp`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_fk10` FOREIGN KEY (`NumPromo`) REFERENCES `promotion` (`NumPromo`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_fk0` FOREIGN KEY (`NumPromo`) REFERENCES `promotion` (`NumPromo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
