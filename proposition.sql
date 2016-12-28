-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 28 Décembre 2016 à 23:04
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
(1, 3, 3, 'Vous aimez travailler de façon indépendante, sans méthode ni ni objectif structurés'),
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

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `proposition`
--
ALTER TABLE `proposition`
  ADD CONSTRAINT `fk0` FOREIGN KEY (`NumGroupe`) REFERENCES `groupe` (`NumGroupe`),
  ADD CONSTRAINT `fk1` FOREIGN KEY (`NumProfil`) REFERENCES `profil` (`NumProfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
