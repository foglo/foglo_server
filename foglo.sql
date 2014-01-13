-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 21 Décembre 2013 à 15:08
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `foglo`
--
CREATE DATABASE `foglo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `foglo`;

-- --------------------------------------------------------

--
-- Structure de la table `datas`
--

CREATE TABLE `datas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `data_1` varchar(255) NOT NULL,
  `data_2` varchar(255) NOT NULL,
  `data_3` varchar(255) NOT NULL,
  `data_4` varchar(255) NOT NULL,
  `widget_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=375 ;

--
-- Contenu de la table `datas`
--

INSERT INTO `datas` VALUES(360, 'ARISTIDE BRIAND', '', '', '', 397);
INSERT INTO `datas` VALUES(365, 'jimmyfairly', '', '', '', 466);
INSERT INTO `datas` VALUES(370, 'Nantes', '', '', '', 472);
INSERT INTO `datas` VALUES(371, 'Haluchère', 'C1', '2', '0', 473);
INSERT INTO `datas` VALUES(372, 'Félix Faure', '26', '0', '0', 458);
INSERT INTO `datas` VALUES(373, 'http://fubiz.net', '', '', '', 406);
INSERT INTO `datas` VALUES(374, '', '', '', '', 474);

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` VALUES(1, 'admin', '2012-04-03 19:12:59');
INSERT INTO `groups` VALUES(2, 'free', '2012-04-03 19:13:13');
INSERT INTO `groups` VALUES(3, 'premium', '2012-04-03 19:13:22');

-- --------------------------------------------------------

--
-- Structure de la table `indices`
--

CREATE TABLE `indices` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `indice` int(1) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `indices`
--

INSERT INTO `indices` VALUES(1, 3, '2012-07-14');
INSERT INTO `indices` VALUES(3, 10, '2012-07-15');
INSERT INTO `indices` VALUES(4, 2, '2012-07-16');
INSERT INTO `indices` VALUES(5, 4, '2012-07-17');
INSERT INTO `indices` VALUES(6, 3, '2012-07-24');
INSERT INTO `indices` VALUES(7, 3, '2012-07-24');
INSERT INTO `indices` VALUES(8, 4, '2012-07-24');
INSERT INTO `indices` VALUES(11, 4, '2012-08-13');
INSERT INTO `indices` VALUES(14, 4, '2012-08-13');
INSERT INTO `indices` VALUES(15, 4, '2012-08-13');

-- --------------------------------------------------------

--
-- Structure de la table `lilas`
--

CREATE TABLE `lilas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `idLila` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1593 ;

--
-- Contenu de la table `lilas`
--

INSERT INTO `lilas` VALUES(1, 'Saint-Brevin-les-Pins - Les Pierres Couchées', 'StopArea:LIL773');
INSERT INTO `lilas` VALUES(2, 'Saint-Brevin-les-Pins - Les Rochelets', 'StopArea:LIL1226');
INSERT INTO `lilas` VALUES(3, 'Saint-Brevin-les-Pins - Saint-Brévin l''Océan', 'StopArea:LIL917');
INSERT INTO `lilas` VALUES(4, 'Saint-Brevin-les-Pins - La Courance', 'StopArea:LIL165');
INSERT INTO `lilas` VALUES(5, 'Saint-Brevin-les-Pins - Pôle de Bresse', 'StopArea:LIL281');
INSERT INTO `lilas` VALUES(6, 'Corsept - Chêne Bonnet', 'StopArea:LIL925');
INSERT INTO `lilas` VALUES(7, 'Saint-Brevin-les-Pins - Mindin', 'StopArea:LIL248');
INSERT INTO `lilas` VALUES(8, 'Saint-Brevin-les-Pins - Maison départementale', 'StopArea:LIL237');
INSERT INTO `lilas` VALUES(10, 'Corsept - Centre', 'StopArea:LIL79');
INSERT INTO `lilas` VALUES(11, 'Paimbœuf - Square Kerbez', 'StopArea:LIL352');
INSERT INTO `lilas` VALUES(12, 'Paimbœuf - Quai', 'StopArea:LIL787');
INSERT INTO `lilas` VALUES(13, 'Paimbœuf - Café de l''avenir', 'StopArea:LIL898');
INSERT INTO `lilas` VALUES(14, 'Paimbœuf - Louise Michèle', 'StopArea:LIL221');
INSERT INTO `lilas` VALUES(15, 'Paimbœuf - Kuhlman', 'StopArea:LIL150');
INSERT INTO `lilas` VALUES(17, 'Saint-Viaud - Mairie', 'StopArea:LIL231');
INSERT INTO `lilas` VALUES(18, 'Frossay - Stade-La Fuie', 'StopArea:LIL899');
INSERT INTO `lilas` VALUES(19, 'Frossay - Place de Gaulle', 'StopArea:LIL282');
INSERT INTO `lilas` VALUES(23, 'Saint-Père-en-Retz - Mairie', 'StopArea:LIL230');
INSERT INTO `lilas` VALUES(25, 'Arthon-en-Retz - La Sicaudais', 'StopArea:LIL182');
INSERT INTO `lilas` VALUES(27, 'Vue - Route de Paimboeuf', 'StopArea:LIL785');
INSERT INTO `lilas` VALUES(28, 'Vue - Centre', 'StopArea:LIL383');
INSERT INTO `lilas` VALUES(30, 'Rouans - Messan', 'StopArea:LIL1270');
INSERT INTO `lilas` VALUES(31, 'Cheix-en-Retz - Centre', 'StopArea:LIL64');
INSERT INTO `lilas` VALUES(32, 'Rouans - Chaussée le Retz', 'StopArea:LIL772');
INSERT INTO `lilas` VALUES(35, 'Brains - Centre', 'StopArea:LIL36');
INSERT INTO `lilas` VALUES(36, 'Le Pellerin - Tour Eiffel', 'StopArea:LIL947');
INSERT INTO `lilas` VALUES(37, 'Saint-Jean-de-Boiseau - Centre', 'StopArea:LIL331');
INSERT INTO `lilas` VALUES(38, 'La Montagne - Briandière', 'StopArea:LIL1214');
INSERT INTO `lilas` VALUES(39, 'Bouguenais - Centre', 'StopArea:LIL29');
INSERT INTO `lilas` VALUES(40, 'Rezé - Atout Sud', 'StopArea:LIL6');
INSERT INTO `lilas` VALUES(41, 'Nantes - Pirmil', 'StopArea:LIL280');
INSERT INTO `lilas` VALUES(42, 'Nantes - Baco', 'StopArea:LIL8');
INSERT INTO `lilas` VALUES(43, 'Nantes - SNCF sud', 'StopArea:LIL322');
INSERT INTO `lilas` VALUES(44, 'Pierric - Centre', 'StopArea:LIL277');
INSERT INTO `lilas` VALUES(45, 'Ille-Et-Vilaine - Gare Routière SNCF', 'StopArea:LIL110');
INSERT INTO `lilas` VALUES(47, 'Conquereuil - Centre', 'StopArea:LIL1212');
INSERT INTO `lilas` VALUES(48, 'Guémené-Penfao - Centre', 'StopArea:LIL129');
INSERT INTO `lilas` VALUES(50, 'Derval - Centre', 'StopArea:LIL89');
INSERT INTO `lilas` VALUES(51, 'Derval - La Foy', 'StopArea:LIL959');
INSERT INTO `lilas` VALUES(53, 'Nozay - Champ de Foire', 'StopArea:LIL267');
INSERT INTO `lilas` VALUES(54, 'Nozay - Gendarmerie', 'StopArea:LIL956');
INSERT INTO `lilas` VALUES(55, 'Puceul - Centre', 'StopArea:LIL300');
INSERT INTO `lilas` VALUES(57, 'Vay - Centre', 'StopArea:LIL806');
INSERT INTO `lilas` VALUES(58, 'La Grigonnais - Centre', 'StopArea:LIL125');
INSERT INTO `lilas` VALUES(61, 'La Chevallerais - Centre', 'StopArea:LIL69');
INSERT INTO `lilas` VALUES(63, 'Héric - Centre', 'StopArea:LIL138');
INSERT INTO `lilas` VALUES(65, 'Orvault - Le Cardo', 'StopArea:LIL194');
INSERT INTO `lilas` VALUES(66, 'Nantes - Bout des Pavés', 'StopArea:LIL33');
INSERT INTO `lilas` VALUES(67, 'Nantes - Hector Berlioz', 'StopArea:LIL814');
INSERT INTO `lilas` VALUES(68, 'Nantes - Longchamp', 'StopArea:LIL813');
INSERT INTO `lilas` VALUES(69, 'Breil-Barberie - Les Américains', 'StopArea:LIL811');
INSERT INTO `lilas` VALUES(70, 'Nantes - Charles Le Goffic', 'StopArea:LIL812');
INSERT INTO `lilas` VALUES(71, 'Nantes - Bel Air', 'StopArea:LIL15');
INSERT INTO `lilas` VALUES(72, 'Nantes - Talensac', 'StopArea:LIL791');
INSERT INTO `lilas` VALUES(74, 'Héric - Neuville Rond Point', 'StopArea:LIL1265');
INSERT INTO `lilas` VALUES(76, 'Blain - Centre Commercial', 'StopArea:LIL1240');
INSERT INTO `lilas` VALUES(77, 'Blain - Centre', 'StopArea:LIL20');
INSERT INTO `lilas` VALUES(79, 'Le Gâvre - L''Anglechais', 'StopArea:LIL961');
INSERT INTO `lilas` VALUES(80, 'Le Gâvre - Centre', 'StopArea:LIL131');
INSERT INTO `lilas` VALUES(85, 'Plessé - Le Coudray', 'StopArea:LIL195');
INSERT INTO `lilas` VALUES(88, 'Plessé - Centre', 'StopArea:LIL287');
INSERT INTO `lilas` VALUES(90, 'Touvois - Centre', 'StopArea:LIL365');
INSERT INTO `lilas` VALUES(93, 'Legé - Le Moulin Guérin', 'StopArea:LIL1020');
INSERT INTO `lilas` VALUES(94, 'Legé - La Croix Verte', 'StopArea:LIL1021');
INSERT INTO `lilas` VALUES(95, 'Corcoué-sur-Logne - La Bénate', 'StopArea:LIL1022');
INSERT INTO `lilas` VALUES(96, 'Corcoué-sur-Logne - Saint-Jean de Corcoué', 'StopArea:LIL330');
INSERT INTO `lilas` VALUES(97, 'Corcoué-sur-Logne - Saint-Etienne de Corcoué', 'StopArea:LIL329');
INSERT INTO `lilas` VALUES(98, 'La Limouzinière - Centre', 'StopArea:LIL217');
INSERT INTO `lilas` VALUES(99, 'Saint-Colomban - Centre', 'StopArea:LIL328');
INSERT INTO `lilas` VALUES(102, 'La Marne - Centre', 'StopArea:LIL241');
INSERT INTO `lilas` VALUES(104, 'Saint-Philbert-de-Grand-Lieu - Le Pied Pain', 'StopArea:LIL1011');
INSERT INTO `lilas` VALUES(105, 'Saint-Lumine-de-Coutais - Centre', 'StopArea:LIL334');
INSERT INTO `lilas` VALUES(109, 'Saint-Philbert-de-Grand-Lieu - La Compointerie', 'StopArea:LIL1012');
INSERT INTO `lilas` VALUES(111, 'Saint-Philbert-de-Grand-Lieu - Rue du Marais', 'StopArea:LIL1008');
INSERT INTO `lilas` VALUES(112, 'Saint-Philbert-de-Grand-Lieu - Centre', 'StopArea:LIL339');
INSERT INTO `lilas` VALUES(113, 'Saint-Philbert-de-Grand-Lieu - Rue du Port', 'StopArea:LIL1010');
INSERT INTO `lilas` VALUES(115, 'Saint-Philbert-de-Grand-Lieu - Guinèvre', 'StopArea:LIL1007');
INSERT INTO `lilas` VALUES(119, 'La Chevrolière - L''Aubraie', 'StopArea:LIL1001');
INSERT INTO `lilas` VALUES(121, 'La Chevrolière - Vieux Moulin', 'StopArea:LIL1004');
INSERT INTO `lilas` VALUES(122, 'La Chevrolière - Le Moulin', 'StopArea:LIL1002');
INSERT INTO `lilas` VALUES(123, 'La Chevrolière - Passay', 'StopArea:LIL272');
INSERT INTO `lilas` VALUES(124, 'La Chevrolière - Passay rue du Lac', 'StopArea:LIL1003');
INSERT INTO `lilas` VALUES(125, 'La Chevrolière - Les Halles', 'StopArea:LIL1005');
INSERT INTO `lilas` VALUES(126, 'La Chevrolière - Stade', 'StopArea:LIL1006');
INSERT INTO `lilas` VALUES(127, 'La Chevrolière - Perrières', 'StopArea:LIL1204');
INSERT INTO `lilas` VALUES(128, 'La Chevrolière - Chevrolière Sud', 'StopArea:LIL999');
INSERT INTO `lilas` VALUES(129, 'La Chevrolière - Centre', 'StopArea:LIL70');
INSERT INTO `lilas` VALUES(130, 'La Chevrolière - La Chaussée', 'StopArea:LIL998');
INSERT INTO `lilas` VALUES(131, 'La Chevrolière - Zone industrielle', 'StopArea:LIL996');
INSERT INTO `lilas` VALUES(134, 'Pont-Saint-Martin - La Croix Blot', 'StopArea:LIL832');
INSERT INTO `lilas` VALUES(136, 'Pont-Saint-Martin - Stade', 'StopArea:LIL833');
INSERT INTO `lilas` VALUES(137, 'Pont-Saint-Martin - La Bourie', 'StopArea:LIL834');
INSERT INTO `lilas` VALUES(141, 'Pont-Saint-Martin - Champsiome', 'StopArea:LIL836');
INSERT INTO `lilas` VALUES(143, 'Rezé - Génetais', 'StopArea:LIL840');
INSERT INTO `lilas` VALUES(144, 'Rezé - George Sand', 'StopArea:LIL1261');
INSERT INTO `lilas` VALUES(145, 'Rezé - La Carrée', 'StopArea:LIL161');
INSERT INTO `lilas` VALUES(146, 'Rezé - Le Chat', 'StopArea:LIL839');
INSERT INTO `lilas` VALUES(147, 'Rezé - Trois Moulins', 'StopArea:LIL371');
INSERT INTO `lilas` VALUES(148, 'Rezé - Le Pinier', 'StopArea:LIL1288');
INSERT INTO `lilas` VALUES(149, 'Rezé - Saint Paul', 'StopArea:LIL327');
INSERT INTO `lilas` VALUES(150, 'Rezé - Félix Tableau', 'StopArea:LIL104');
INSERT INTO `lilas` VALUES(151, 'Pont Rousseau - Place des Martyrs', 'StopArea:LIL283');
INSERT INTO `lilas` VALUES(153, 'Nantes - Bourdonnières', 'StopArea:LIL1285');
INSERT INTO `lilas` VALUES(154, 'Saint-Sébastien-sur-Loire - Joliverie', 'StopArea:LIL148');
INSERT INTO `lilas` VALUES(155, 'Rezé - Lycée Jean Perrin', 'StopArea:LIL224');
INSERT INTO `lilas` VALUES(156, 'Château - Diderot Arrêt Tan', 'StopArea:LIL1286');
INSERT INTO `lilas` VALUES(157, 'Quartiers Sud - Les Bourdonnières Lycée', 'StopArea:LIL205');
INSERT INTO `lilas` VALUES(159, 'Missillac - La Croix d''en Haut', 'StopArea:LIL803');
INSERT INTO `lilas` VALUES(160, 'Missillac - La Villeneuve', 'StopArea:LIL802');
INSERT INTO `lilas` VALUES(161, 'Missillac - Centre', 'StopArea:LIL249');
INSERT INTO `lilas` VALUES(162, 'Missillac - Govilon', 'StopArea:LIL120');
INSERT INTO `lilas` VALUES(166, 'Missillac - Bergon', 'StopArea:LIL18');
INSERT INTO `lilas` VALUES(167, 'Sainte-Reine-de-Bretagne - L''Organais', 'StopArea:LIL154');
INSERT INTO `lilas` VALUES(168, 'Sainte-Reine-de-Bretagne - Les Noés', 'StopArea:LIL212');
INSERT INTO `lilas` VALUES(169, 'Sainte-Reine-de-Bretagne - Centre', 'StopArea:LIL345');
INSERT INTO `lilas` VALUES(171, 'Pontchâteau - Eglise', 'StopArea:LIL749');
INSERT INTO `lilas` VALUES(172, 'Pontchâteau - Chataigneraie', 'StopArea:LIL753');
INSERT INTO `lilas` VALUES(173, 'Pontchâteau - Boule d''or', 'StopArea:LIL31');
INSERT INTO `lilas` VALUES(174, 'Pontchâteau - La Croix Basse', 'StopArea:LIL969');
INSERT INTO `lilas` VALUES(175, 'Pontchâteau - La Herviais', 'StopArea:LIL971');
INSERT INTO `lilas` VALUES(176, 'Pontchâteau - Saint Guillaume', 'StopArea:LIL973');
INSERT INTO `lilas` VALUES(177, 'Pontchâteau - Callac', 'StopArea:LIL968');
INSERT INTO `lilas` VALUES(178, 'Crossac - La Planche-Marion', 'StopArea:LIL911');
INSERT INTO `lilas` VALUES(179, 'Crossac - Piolais', 'StopArea:LIL912');
INSERT INTO `lilas` VALUES(180, 'Sainte-Reine-de-Bretagne - Marongle', 'StopArea:LIL242');
INSERT INTO `lilas` VALUES(182, 'Crossac - Bosselas', 'StopArea:LIL27');
INSERT INTO `lilas` VALUES(183, 'Crossac - Centre', 'StopArea:LIL83');
INSERT INTO `lilas` VALUES(184, 'Crossac - La Ratelais', 'StopArea:LIL181');
INSERT INTO `lilas` VALUES(185, 'Crossac - Rotz', 'StopArea:LIL313');
INSERT INTO `lilas` VALUES(187, 'Pontchâteau - Charles de Gaulle', 'StopArea:LIL752');
INSERT INTO `lilas` VALUES(188, 'Pontchâteau - Croix de Mission', 'StopArea:LIL751');
INSERT INTO `lilas` VALUES(191, 'Saint-Nazaire - Gare SNCF', 'StopArea:LIL111');
INSERT INTO `lilas` VALUES(192, 'Saint-Nazaire - Maupertuis', 'StopArea:LIL1266');
INSERT INTO `lilas` VALUES(193, 'Redon - Gare SNCF', 'StopArea:LIL1216');
INSERT INTO `lilas` VALUES(194, 'Saint-Nicolas-de-Redon - La Digue', 'StopArea:LIL1189');
INSERT INTO `lilas` VALUES(195, 'Saint-Nicolas-de-Redon - Centre', 'StopArea:LIL338');
INSERT INTO `lilas` VALUES(196, 'Saint-Nicolas-de-Redon - ZA des Bauches', 'StopArea:LIL385');
INSERT INTO `lilas` VALUES(198, 'Fégréac - Fégréac', 'StopArea:LIL103');
INSERT INTO `lilas` VALUES(201, 'Sévérac - Centre', 'StopArea:LIL355');
INSERT INTO `lilas` VALUES(202, 'Sévérac - Gare', 'StopArea:LIL1244');
INSERT INTO `lilas` VALUES(203, 'Saint-Gildas-des-Bois - Eglise', 'StopArea:LIL96');
INSERT INTO `lilas` VALUES(205, 'Guenrouet - Moulin-de-la-Justice', 'StopArea:LIL988');
INSERT INTO `lilas` VALUES(206, 'Guenrouet - Centre', 'StopArea:LIL126');
INSERT INTO `lilas` VALUES(207, 'Guenrouet - Les Rousses', 'StopArea:LIL986');
INSERT INTO `lilas` VALUES(208, 'Guenrouet - Notre Dame de Grace', 'StopArea:LIL264');
INSERT INTO `lilas` VALUES(213, 'Quilly - Centre', 'StopArea:LIL303');
INSERT INTO `lilas` VALUES(214, 'Quilly - La Crochardais', 'StopArea:LIL985');
INSERT INTO `lilas` VALUES(217, 'Sainte-Anne-sur-Brivet - Centre', 'StopArea:LIL344');
INSERT INTO `lilas` VALUES(220, 'Saint-Gildas-des-Bois - Centre Commercial', 'StopArea:LIL977');
INSERT INTO `lilas` VALUES(221, 'Saint-Gildas-des-Bois - Gourap', 'StopArea:LIL976');
INSERT INTO `lilas` VALUES(223, 'Drefféac - Eglise', 'StopArea:LIL94');
INSERT INTO `lilas` VALUES(224, 'Drefféac - La Vallée du Bourg', 'StopArea:LIL974');
INSERT INTO `lilas` VALUES(226, 'Pontchâteau - Bilais', 'StopArea:LIL972');
INSERT INTO `lilas` VALUES(227, 'La Noë - La Noé', 'StopArea:LIL970');
INSERT INTO `lilas` VALUES(228, 'Pontchâteau - Coët Rotz', 'StopArea:LIL1213');
INSERT INTO `lilas` VALUES(229, 'Pontchâteau - CAT', 'StopArea:LIL417');
INSERT INTO `lilas` VALUES(230, 'Pontchâteau - 3m', 'StopArea:LIL1267');
INSERT INTO `lilas` VALUES(231, 'Pontchâteau - Foyer', 'StopArea:LIL748');
INSERT INTO `lilas` VALUES(232, 'Besné - Centre', 'StopArea:LIL416');
INSERT INTO `lilas` VALUES(233, 'Donges - La Duchée', 'StopArea:LIL414');
INSERT INTO `lilas` VALUES(235, 'Montoir-de-Bretagne - Gendarmerie', 'StopArea:LIL992');
INSERT INTO `lilas` VALUES(236, 'Montoir-de-Bretagne - Centre', 'StopArea:LIL255');
INSERT INTO `lilas` VALUES(237, 'Montoir-de-Bretagne - Place du marché', 'StopArea:LIL993');
INSERT INTO `lilas` VALUES(238, 'Montoir-de-Bretagne - Bellevue', 'StopArea:LIL1190');
INSERT INTO `lilas` VALUES(239, 'Saint-Nazaire - Liberté', 'StopArea:LIL1263');
INSERT INTO `lilas` VALUES(240, 'Saint-Nazaire - Ville Halluard', 'StopArea:LIL1264');
INSERT INTO `lilas` VALUES(241, 'Préfailles - Centre', 'StopArea:LIL299');
INSERT INTO `lilas` VALUES(242, 'Préfailles - Quirouard', 'StopArea:LIL304');
INSERT INTO `lilas` VALUES(243, 'La Plaine-sur-Mer - Centre', 'StopArea:LIL179');
INSERT INTO `lilas` VALUES(244, 'Pornic - Ste-Marie-sur-Mer', 'StopArea:LIL354');
INSERT INTO `lilas` VALUES(245, 'Pornic - Terres-aux-Moines', 'StopArea:LIL936');
INSERT INTO `lilas` VALUES(246, 'Pornic - Rond Point EDF', 'StopArea:LIL935');
INSERT INTO `lilas` VALUES(247, 'Pornic - Terres-Jarries', 'StopArea:LIL934');
INSERT INTO `lilas` VALUES(248, 'Pornic - Le Sandier', 'StopArea:LIL201');
INSERT INTO `lilas` VALUES(249, 'Pornic - Cinéma St gilles', 'StopArea:LIL72');
INSERT INTO `lilas` VALUES(250, 'Pornic - Joli Séjour', 'StopArea:LIL933');
INSERT INTO `lilas` VALUES(253, 'Saint-Michel-Chef-Chef - Tharon', 'StopArea:LIL359');
INSERT INTO `lilas` VALUES(254, 'Saint-Michel-Chef-Chef - Port de Comberge', 'StopArea:LIL291');
INSERT INTO `lilas` VALUES(255, 'Saint-Michel-Chef-Chef - Le Redois', 'StopArea:LIL200');
INSERT INTO `lilas` VALUES(256, 'Saint-Michel-Chef-Chef - La Poste', 'StopArea:LIL805');
INSERT INTO `lilas` VALUES(257, 'Saint-Michel-Chef-Chef - Mairie', 'StopArea:LIL337');
INSERT INTO `lilas` VALUES(259, 'Saint-Brevin-les-Pins - Le Bosquet', 'StopArea:LIL92');
INSERT INTO `lilas` VALUES(260, 'Saint-Nazaire - Boris Vian', 'StopArea:LIL410');
INSERT INTO `lilas` VALUES(261, 'Saint-Nazaire - Hôpital', 'StopArea:LIL142');
INSERT INTO `lilas` VALUES(262, 'Frossay - Le Migron', 'StopArea:LIL197');
INSERT INTO `lilas` VALUES(263, 'Saint-Viaud - Noé-Simon', 'StopArea:LIL930');
INSERT INTO `lilas` VALUES(265, 'Saint-Viaud - Route de paimboeuf', 'StopArea:LIL931');
INSERT INTO `lilas` VALUES(266, 'Paimbœuf - Petit paimboeuf', 'StopArea:LIL895');
INSERT INTO `lilas` VALUES(267, 'Paimbœuf - Georges Brassens', 'StopArea:LIL896');
INSERT INTO `lilas` VALUES(268, 'Paimbœuf - Les Amourettes', 'StopArea:LIL204');
INSERT INTO `lilas` VALUES(269, 'Paimbœuf - Place du Marché', 'StopArea:LIL796');
INSERT INTO `lilas` VALUES(270, 'Paimbœuf - Mairie', 'StopArea:LIL143');
INSERT INTO `lilas` VALUES(277, 'Saint-Brevin-les-Pins - Basse Prinais', 'StopArea:LIL1227');
INSERT INTO `lilas` VALUES(278, 'Saint-Nazaire - Hôtel de Ville', 'StopArea:LIL144');
INSERT INTO `lilas` VALUES(279, 'Paimbœuf - René Moritz', 'StopArea:LIL51');
INSERT INTO `lilas` VALUES(280, 'Paimbœuf - Libert', 'StopArea:LIL215');
INSERT INTO `lilas` VALUES(281, 'Saint-Père-en-Retz - Super U', 'StopArea:LIL1280');
INSERT INTO `lilas` VALUES(282, 'Saint-Père-en-Retz - Centre Commercial', 'StopArea:LIL48');
INSERT INTO `lilas` VALUES(284, 'Saint-Père-en-Retz - Place du Marché', 'StopArea:LIL284');
INSERT INTO `lilas` VALUES(287, '85 - Gare Routière', 'StopArea:LIL109');
INSERT INTO `lilas` VALUES(288, 'Rocheservière - Centre', 'StopArea:LIL310');
INSERT INTO `lilas` VALUES(289, 'Geneston - Centre', 'StopArea:LIL117');
INSERT INTO `lilas` VALUES(290, 'Geneston - Croix Danet', 'StopArea:LIL239');
INSERT INTO `lilas` VALUES(291, 'Le Bignon - La Boule d''Or', 'StopArea:LIL159');
INSERT INTO `lilas` VALUES(292, 'Le Bignon - La Loirière', 'StopArea:LIL175');
INSERT INTO `lilas` VALUES(293, 'Pont-Saint-Martin - Benetière', 'StopArea:LIL17');
INSERT INTO `lilas` VALUES(294, 'Pont-Saint-Martin - Les Hauts Viais', 'StopArea:LIL209');
INSERT INTO `lilas` VALUES(295, 'Pont-Saint-Martin - Viais', 'StopArea:LIL374');
INSERT INTO `lilas` VALUES(298, 'Rezé - Collège Petite Lande', 'StopArea:LIL76');
INSERT INTO `lilas` VALUES(299, 'Rezé - Lycée Notre Dame', 'StopArea:LIL225');
INSERT INTO `lilas` VALUES(300, 'Rezé - Collège Ste Anne', 'StopArea:LIL77');
INSERT INTO `lilas` VALUES(301, 'Bouée - Mairie', 'StopArea:LIL808');
INSERT INTO `lilas` VALUES(302, 'Cordemais - Centre', 'StopArea:LIL78');
INSERT INTO `lilas` VALUES(303, 'Cordemais - Plaisance', 'StopArea:LIL1056');
INSERT INTO `lilas` VALUES(306, 'Savenay - Gare SNCF', 'StopArea:LIL1271');
INSERT INTO `lilas` VALUES(307, 'Savenay - Gare Routière', 'StopArea:LIL348');
INSERT INTO `lilas` VALUES(310, 'Le Temple-de-Bretagne - Centre', 'StopArea:LIL358');
INSERT INTO `lilas` VALUES(311, 'Le Temple-de-Bretagne - La Bretonnière', 'StopArea:LIL1042');
INSERT INTO `lilas` VALUES(313, 'Vigneux-de-Bretagne - La Valinière', 'StopArea:LIL1039');
INSERT INTO `lilas` VALUES(314, 'Vigneux-de-Bretagne - Centre', 'StopArea:LIL379');
INSERT INTO `lilas` VALUES(318, 'Vigneux-de-Bretagne - Gaudinière', 'StopArea:LIL1033');
INSERT INTO `lilas` VALUES(324, 'Sautron - Centre', 'StopArea:LIL346');
INSERT INTO `lilas` VALUES(325, 'Sautron - Val-du-Cens', 'StopArea:LIL1026');
INSERT INTO `lilas` VALUES(329, 'Orvault - Forum', 'StopArea:LIL101');
INSERT INTO `lilas` VALUES(330, 'Orvault - Lycée Appert', 'StopArea:LIL223');
INSERT INTO `lilas` VALUES(331, 'Orvault - Morlière', 'StopArea:LIL1168');
INSERT INTO `lilas` VALUES(332, 'Nantes - Beauséjour', 'StopArea:LIL14');
INSERT INTO `lilas` VALUES(333, 'Nantes - Sainte Thérèse', 'StopArea:LIL1167');
INSERT INTO `lilas` VALUES(334, 'Le Temple-de-Bretagne - Les Templiers', 'StopArea:LIL1256');
INSERT INTO `lilas` VALUES(335, 'Grandchamps-des-Fontaines - Cent sillons', 'StopArea:LIL43');
INSERT INTO `lilas` VALUES(336, 'Grandchamps-des-Fontaines - Mairie', 'StopArea:LIL228');
INSERT INTO `lilas` VALUES(338, 'Grandchamps-des-Fontaines - Rochère', 'StopArea:LIL311');
INSERT INTO `lilas` VALUES(339, 'Treillières - Centre', 'StopArea:LIL368');
INSERT INTO `lilas` VALUES(340, 'Treillières - Poste de Gesvre', 'StopArea:LIL293');
INSERT INTO `lilas` VALUES(341, 'Treillières - Le Moulin Blanc', 'StopArea:LIL906');
INSERT INTO `lilas` VALUES(342, 'Treillières - Ménardais', 'StopArea:LIL260');
INSERT INTO `lilas` VALUES(343, 'Treillières - Pigeon Blanc', 'StopArea:LIL278');
INSERT INTO `lilas` VALUES(346, 'Nantes - Carcouet', 'StopArea:LIL39');
INSERT INTO `lilas` VALUES(349, 'Grandchamps-des-Fontaines - Curette', 'StopArea:LIL84');
INSERT INTO `lilas` VALUES(354, 'Grandchamps-des-Fontaines - La butte', 'StopArea:LIL185');
INSERT INTO `lilas` VALUES(356, 'Treillières - Gergaudière', 'StopArea:LIL118');
INSERT INTO `lilas` VALUES(358, 'La Ménardais - Levée des dons', 'StopArea:LIL214');
INSERT INTO `lilas` VALUES(359, 'Garambeau - Petit Bois', 'StopArea:LIL907');
INSERT INTO `lilas` VALUES(360, 'Treillières - La Fontaine', 'StopArea:LIL1207');
INSERT INTO `lilas` VALUES(361, 'Treillières - Garambeau', 'StopArea:LIL106');
INSERT INTO `lilas` VALUES(362, 'Treillières - Sionnière', 'StopArea:LIL349');
INSERT INTO `lilas` VALUES(363, 'Treillières - Grehandière', 'StopArea:LIL124');
INSERT INTO `lilas` VALUES(365, 'Nantes - Les Bourdonnières Arrêt Busway', 'StopArea:LIL1202');
INSERT INTO `lilas` VALUES(366, 'Le Bignon - Les Trois Hermines', 'StopArea:LIL213');
INSERT INTO `lilas` VALUES(368, 'Château-Thébaud - La Jaunaie', 'StopArea:LIL172');
INSERT INTO `lilas` VALUES(371, 'Aigrefeuille-sur-Maine - Centre', 'StopArea:LIL4');
INSERT INTO `lilas` VALUES(372, 'Remouillé - Centre', 'StopArea:LIL307');
INSERT INTO `lilas` VALUES(373, 'Montaigu - Centre Social', 'StopArea:LIL45');
INSERT INTO `lilas` VALUES(374, 'Maisdon-sur-Sèvre - Centre', 'StopArea:LIL233');
INSERT INTO `lilas` VALUES(375, 'La Plaine-sur-Mer - Le Cormier', 'StopArea:LIL1197');
INSERT INTO `lilas` VALUES(376, 'Pornic - Le Clion sur Mer - Eglise', 'StopArea:LIL1219');
INSERT INTO `lilas` VALUES(377, 'Chauvé - Centre', 'StopArea:LIL63');
INSERT INTO `lilas` VALUES(378, 'Arthon-en-Retz - Haute Perche', 'StopArea:LIL1246');
INSERT INTO `lilas` VALUES(379, 'Arthon-en-Retz - La Boizonnière', 'StopArea:LIL1147');
INSERT INTO `lilas` VALUES(380, 'Pornic - La Birochère', 'StopArea:LIL938');
INSERT INTO `lilas` VALUES(381, 'Pornic - La Joselière', 'StopArea:LIL932');
INSERT INTO `lilas` VALUES(382, 'Pornic - La Fléchousserie', 'StopArea:LIL937');
INSERT INTO `lilas` VALUES(383, 'La Bernerie-en-Retz - La Nouée Fleurie', 'StopArea:LIL1152');
INSERT INTO `lilas` VALUES(384, 'La Bernerie-en-Retz - Centre', 'StopArea:LIL727');
INSERT INTO `lilas` VALUES(385, 'Les Moutiers-en-Retz - Centre', 'StopArea:LIL726');
INSERT INTO `lilas` VALUES(386, 'Les Moutiers-en-Retz - Prigny', 'StopArea:LIL1151');
INSERT INTO `lilas` VALUES(387, 'Bourgneuf-en-Retz - SNCF', 'StopArea:LIL1150');
INSERT INTO `lilas` VALUES(388, 'Bourgneuf-en-Retz - Gendarmerie', 'StopArea:LIL725');
INSERT INTO `lilas` VALUES(389, 'Arthon-en-Retz - Centre', 'StopArea:LIL5');
INSERT INTO `lilas` VALUES(390, 'Arthon-en-Retz - Les Pierres Rousses', 'StopArea:LIL946');
INSERT INTO `lilas` VALUES(391, 'Chéméré - Centre', 'StopArea:LIL66');
INSERT INTO `lilas` VALUES(393, 'Port-Saint-Père - Ecomarché', 'StopArea:LIL1148');
INSERT INTO `lilas` VALUES(394, 'Port-Saint-Père - Centre', 'StopArea:LIL44');
INSERT INTO `lilas` VALUES(395, 'Saint-Léger-les-Vignes - Centre', 'StopArea:LIL353');
INSERT INTO `lilas` VALUES(397, 'La Varenne - Centre', 'StopArea:LIL373');
INSERT INTO `lilas` VALUES(398, 'Barbechat - Barbechat', 'StopArea:LIL9');
INSERT INTO `lilas` VALUES(399, 'La Chapelle-Basse-Mer - Guineau', 'StopArea:LIL127');
INSERT INTO `lilas` VALUES(400, 'Saint-Julien-de-Concelles - La Chebuette', 'StopArea:LIL163');
INSERT INTO `lilas` VALUES(401, 'La Chapelle-Basse-Mer - Pierre Percée', 'StopArea:LIL276');
INSERT INTO `lilas` VALUES(402, 'La Chapelle-Basse-Mer - Pinsonnière', 'StopArea:LIL279');
INSERT INTO `lilas` VALUES(403, 'La Chapelle-Basse-Mer - Chene Vert', 'StopArea:LIL68');
INSERT INTO `lilas` VALUES(404, 'La Chapelle-Basse-Mer - Croix des Chardonneaux', 'StopArea:LIL82');
INSERT INTO `lilas` VALUES(405, 'La Chapelle-Basse-Mer - Centre', 'StopArea:LIL58');
INSERT INTO `lilas` VALUES(407, 'La Chapelle-Basse-Mer - Beau Chêne', 'StopArea:LIL905');
INSERT INTO `lilas` VALUES(409, 'La Boissière-du-Doré - Centre', 'StopArea:LIL24');
INSERT INTO `lilas` VALUES(411, 'Le Landreau - Centre', 'StopArea:LIL187');
INSERT INTO `lilas` VALUES(412, 'Le Loroux-Bottereau - Centre', 'StopArea:LIL220');
INSERT INTO `lilas` VALUES(413, 'Le Loroux-Bottereau - Gendarmerie', 'StopArea:LIL903');
INSERT INTO `lilas` VALUES(415, 'Saint-Julien-de-Concelles - Centre', 'StopArea:LIL332');
INSERT INTO `lilas` VALUES(416, 'Saint-Julien-de-Concelles - Le Bout des Ponts', 'StopArea:LIL192');
INSERT INTO `lilas` VALUES(417, 'Saint-Julien-de-Concelles - Boire Courant', 'StopArea:LIL22');
INSERT INTO `lilas` VALUES(418, 'Doulon-Bottière - La Colinière', 'StopArea:LIL164');
INSERT INTO `lilas` VALUES(419, 'Saint-Julien-de-Concelles - Beau soleil', 'StopArea:LIL11');
INSERT INTO `lilas` VALUES(420, 'Nantes - Mairie de Doulon', 'StopArea:LIL232');
INSERT INTO `lilas` VALUES(421, 'Nantes - Toutes Aides', 'StopArea:LIL364');
INSERT INTO `lilas` VALUES(422, 'Nantes - Saint Clément', 'StopArea:LIL324');
INSERT INTO `lilas` VALUES(423, 'Nantes - Michelet', 'StopArea:LIL247');
INSERT INTO `lilas` VALUES(424, 'Nantes - Saint-Donatien', 'StopArea:LIL822');
INSERT INTO `lilas` VALUES(426, 'La Regrippière - Centre', 'StopArea:LIL305');
INSERT INTO `lilas` VALUES(427, 'La Regrippière - L''Aujardière', 'StopArea:LIL1163');
INSERT INTO `lilas` VALUES(428, 'Vallet - La Chalousière', 'StopArea:LIL1162');
INSERT INTO `lilas` VALUES(429, 'Mouzillon - Centre', 'StopArea:LIL47');
INSERT INTO `lilas` VALUES(430, 'Vallet - Gendarmerie', 'StopArea:LIL115');
INSERT INTO `lilas` VALUES(431, 'Vallet - De joie', 'StopArea:LIL87');
INSERT INTO `lilas` VALUES(434, 'Le Landreau - Villages', 'StopArea:LIL1169');
INSERT INTO `lilas` VALUES(437, 'Vallet - La Gobinière', 'StopArea:LIL1160');
INSERT INTO `lilas` VALUES(438, 'La Chapelle-Heulin - Centre', 'StopArea:LIL59');
INSERT INTO `lilas` VALUES(440, 'La Chapelle-Heulin - La Bernardière', 'StopArea:LIL1185');
INSERT INTO `lilas` VALUES(441, 'La Chapelle-Heulin - La Miraudière', 'StopArea:LIL1159');
INSERT INTO `lilas` VALUES(442, 'Haute-Goulaine - La Poterie', 'StopArea:LIL1157');
INSERT INTO `lilas` VALUES(443, 'Haute-Goulaine - Champ Failli', 'StopArea:LIL1184');
INSERT INTO `lilas` VALUES(444, 'Haute-Goulaine - Allée du Château', 'StopArea:LIL1156');
INSERT INTO `lilas` VALUES(445, 'Haute-Goulaine - Centre', 'StopArea:LIL136');
INSERT INTO `lilas` VALUES(446, 'Haute-Goulaine - Château d''Eau', 'StopArea:LIL1155');
INSERT INTO `lilas` VALUES(447, 'Haute-Goulaine - Epinettes', 'StopArea:LIL1154');
INSERT INTO `lilas` VALUES(449, 'Saint-Sébastien-sur-Loire - Gare SNCF', 'StopArea:LIL797');
INSERT INTO `lilas` VALUES(450, 'Saint-Sébastien-sur-Loire - Maladrie', 'StopArea:LIL893');
INSERT INTO `lilas` VALUES(451, 'Château-Thébaud - La Buterie', 'StopArea:LIL794');
INSERT INTO `lilas` VALUES(452, 'Château-Thébaud - Croix Verte', 'StopArea:LIL795');
INSERT INTO `lilas` VALUES(454, 'Saint-Fiacre-sur-Maine - Eglise', 'StopArea:LIL800');
INSERT INTO `lilas` VALUES(455, 'Saint-Fiacre-sur-Maine - La Bourchinière', 'StopArea:LIL799');
INSERT INTO `lilas` VALUES(457, 'Saint-Lumine-de-Clisson - Route de Remouillé', 'StopArea:LIL950');
INSERT INTO `lilas` VALUES(458, 'Saint-Lumine-de-Clisson - Centre', 'StopArea:LIL333');
INSERT INTO `lilas` VALUES(459, 'Gorges - Centre', 'StopArea:LIL119');
INSERT INTO `lilas` VALUES(460, 'Clisson - Centre Commercial', 'StopArea:LIL146');
INSERT INTO `lilas` VALUES(461, 'Clisson - Gare SNCF', 'StopArea:LIL105');
INSERT INTO `lilas` VALUES(462, 'Clisson - Café de l''Union', 'StopArea:LIL37');
INSERT INTO `lilas` VALUES(463, 'Gétigné - Fief du Parc', 'StopArea:LIL949');
INSERT INTO `lilas` VALUES(465, 'Gétigné - Centre', 'StopArea:LIL130');
INSERT INTO `lilas` VALUES(466, 'Châteaubriant - Gare SNCF', 'StopArea:LIL1278');
INSERT INTO `lilas` VALUES(467, 'Châteaubriant - la Ville en Bois', 'StopArea:LIL880');
INSERT INTO `lilas` VALUES(468, 'Châteaubriant - La Ferrière', 'StopArea:LIL878');
INSERT INTO `lilas` VALUES(471, 'Moisdon-la-Rivière - Centre', 'StopArea:LIL250');
INSERT INTO `lilas` VALUES(475, 'La Meilleraye-de-Bretagne - Centre', 'StopArea:LIL245');
INSERT INTO `lilas` VALUES(478, 'Joué-sur-Erdre - Centre', 'StopArea:LIL149');
INSERT INTO `lilas` VALUES(480, 'Trans-sur-Erdre - Centre', 'StopArea:LIL366');
INSERT INTO `lilas` VALUES(484, 'Nort-sur-Erdre - Saint Georges', 'StopArea:LIL849');
INSERT INTO `lilas` VALUES(485, 'Nort-sur-Erdre - Champ de Foire', 'StopArea:LIL54');
INSERT INTO `lilas` VALUES(486, 'Nort-sur-Erdre - Gare SNCF', 'StopArea:LIL112');
INSERT INTO `lilas` VALUES(489, 'Petit-Mars - Centre', 'StopArea:LIL275');
INSERT INTO `lilas` VALUES(498, 'Carquefou - Centre', 'StopArea:LIL40');
INSERT INTO `lilas` VALUES(499, 'Carquefou - La Bréchetière', 'StopArea:LIL889');
INSERT INTO `lilas` VALUES(500, 'Carquefou - ICAM', 'StopArea:LIL887');
INSERT INTO `lilas` VALUES(501, 'Nantes - La Statue', 'StopArea:LIL824');
INSERT INTO `lilas` VALUES(502, 'Nantes Erdre - Halveque', 'StopArea:LIL135');
INSERT INTO `lilas` VALUES(504, 'Nantes - Haluchère', 'StopArea:LIL134');
INSERT INTO `lilas` VALUES(505, 'Nantes - Le Croissant', 'StopArea:LIL1203');
INSERT INTO `lilas` VALUES(506, 'Nantes - Plessis Tison', 'StopArea:LIL819');
INSERT INTO `lilas` VALUES(507, 'Saint-Donatien-Malakoff - Rond Point de Paris', 'StopArea:LIL1166');
INSERT INTO `lilas` VALUES(508, 'Nantes - Desaix', 'StopArea:LIL816');
INSERT INTO `lilas` VALUES(509, 'Quartiers Nord - Petit Port', 'StopArea:LIL1247');
INSERT INTO `lilas` VALUES(510, 'Nantes - Saint-Jean-Baptiste', 'StopArea:LIL817');
INSERT INTO `lilas` VALUES(513, 'Issé - Centre', 'StopArea:LIL147');
INSERT INTO `lilas` VALUES(516, 'Abbaretz - Centre', 'StopArea:LIL2');
INSERT INTO `lilas` VALUES(518, 'Saffré - Beaujour', 'StopArea:LIL886');
INSERT INTO `lilas` VALUES(519, 'Saffré - Centre', 'StopArea:LIL323');
INSERT INTO `lilas` VALUES(520, 'Nort-sur-Erdre - Les Charmes', 'StopArea:LIL1206');
INSERT INTO `lilas` VALUES(526, 'Sucé-sur-Erdre - Cornette', 'StopArea:LIL870');
INSERT INTO `lilas` VALUES(527, 'Sucé-sur-Erdre - Maison Blanche', 'StopArea:LIL235');
INSERT INTO `lilas` VALUES(530, 'Sucé-sur-Erdre - Moulin Miltière', 'StopArea:LIL257');
INSERT INTO `lilas` VALUES(531, 'Sucé-sur-Erdre - Bétulas', 'StopArea:LIL853');
INSERT INTO `lilas` VALUES(532, 'Sucé-sur-Erdre - Vierge Logne', 'StopArea:LIL861');
INSERT INTO `lilas` VALUES(533, 'Sucé-sur-Erdre - Durandière', 'StopArea:LIL862');
INSERT INTO `lilas` VALUES(534, 'Sucé-sur-Erdre - Chataigneraie', 'StopArea:LIL863');
INSERT INTO `lilas` VALUES(535, 'Sucé-sur-Erdre - Place de la Bascule', 'StopArea:LIL858');
INSERT INTO `lilas` VALUES(536, 'Sucé-sur-Erdre - Maison des associations', 'StopArea:LIL236');
INSERT INTO `lilas` VALUES(537, 'Sucé-sur-Erdre - Turballière', 'StopArea:LIL854');
INSERT INTO `lilas` VALUES(539, 'Sucé-sur-Erdre - Marvillière', 'StopArea:LIL855');
INSERT INTO `lilas` VALUES(540, 'La Chapelle-sur-Erdre - La Charlière', 'StopArea:LIL876');
INSERT INTO `lilas` VALUES(541, 'La Chapelle-sur-Erdre - La Chapelle Jean Jaurés', 'StopArea:LIL61');
INSERT INTO `lilas` VALUES(542, 'La Chapelle-sur-Erdre - Gilière', 'StopArea:LIL875');
INSERT INTO `lilas` VALUES(543, 'La Chapelle-sur-Erdre - La Cogne', 'StopArea:LIL1208');
INSERT INTO `lilas` VALUES(544, 'La Chapelle-sur-Erdre - Cote', 'StopArea:LIL877');
INSERT INTO `lilas` VALUES(546, 'Nantes - Morrhonniere', 'StopArea:LIL1248');
INSERT INTO `lilas` VALUES(547, 'Sucé-sur-Erdre - Quai Bliesransbach', 'StopArea:LIL302');
INSERT INTO `lilas` VALUES(548, 'Sucé-sur-Erdre - Noue', 'StopArea:LIL266');
INSERT INTO `lilas` VALUES(549, 'Le Lavoir - Lavoir', 'StopArea:LIL868');
INSERT INTO `lilas` VALUES(554, 'Sucé-sur-Erdre - Guillonnière', 'StopArea:LIL866');
INSERT INTO `lilas` VALUES(556, 'Sucé-sur-Erdre - Les Abies', 'StopArea:LIL864');
INSERT INTO `lilas` VALUES(557, 'Carquefou - Les Monceaux', 'StopArea:LIL892');
INSERT INTO `lilas` VALUES(560, 'Carquefou - Perception', 'StopArea:LIL274');
INSERT INTO `lilas` VALUES(561, 'Carquefou - BELE ZI', 'StopArea:LIL818');
INSERT INTO `lilas` VALUES(562, 'Carquefou - CPIO ZI', 'StopArea:LIL826');
INSERT INTO `lilas` VALUES(563, 'Nantes - Maison Neuve', 'StopArea:LIL820');
INSERT INTO `lilas` VALUES(566, 'Saint-Vincent-des-Landes - Gare Sncf', 'StopArea:LIL340');
INSERT INTO `lilas` VALUES(567, 'Saint-Vincent-des-Landes - Mairie', 'StopArea:LIL227');
INSERT INTO `lilas` VALUES(568, 'Treffieux - Centre', 'StopArea:LIL367');
INSERT INTO `lilas` VALUES(569, 'Châteaubriant - Charles de Gaulle', 'StopArea:LIL62');
INSERT INTO `lilas` VALUES(572, 'Blain - La Carrée', 'StopArea:LIL955');
INSERT INTO `lilas` VALUES(574, 'Bouvron - Centre', 'StopArea:LIL34');
INSERT INTO `lilas` VALUES(577, 'Campbon - Centre', 'StopArea:LIL38');
INSERT INTO `lilas` VALUES(578, 'Campbon - La Gicquelais', 'StopArea:LIL1095');
INSERT INTO `lilas` VALUES(580, 'La Chapelle-Launay - Centre', 'StopArea:LIL60');
INSERT INTO `lilas` VALUES(582, 'Montoir-de-Bretagne - Miroiterie', 'StopArea:LIL991');
INSERT INTO `lilas` VALUES(583, 'Montoir-de-Bretagne - Dr Schweitzer', 'StopArea:LIL994');
INSERT INTO `lilas` VALUES(584, 'Saint-Nazaire - Ville Port', 'StopArea:LIL399');
INSERT INTO `lilas` VALUES(585, 'Saint-Mars-la-Jaille - Centre', 'StopArea:LIL336');
INSERT INTO `lilas` VALUES(588, 'Pouillé-les-Côteaux - Centre', 'StopArea:LIL295');
INSERT INTO `lilas` VALUES(589, 'Mésanger - Centre', 'StopArea:LIL261');
INSERT INTO `lilas` VALUES(592, 'Couffé - Centre', 'StopArea:LIL80');
INSERT INTO `lilas` VALUES(599, 'Le Cellier - Bel Air', 'StopArea:LIL1110');
INSERT INTO `lilas` VALUES(607, 'Carquefou - Chemin Nantais', 'StopArea:LIL65');
INSERT INTO `lilas` VALUES(608, 'Sainte-Luce-sur-Loire - CIFAM', 'StopArea:LIL1217');
INSERT INTO `lilas` VALUES(609, 'Mauves-sur-Loire - Gare', 'StopArea:LIL107');
INSERT INTO `lilas` VALUES(610, 'Mauves-sur-Loire - Eglise', 'StopArea:LIL95');
INSERT INTO `lilas` VALUES(611, 'Mauves-sur-Loire - Mairie', 'StopArea:LIL226');
INSERT INTO `lilas` VALUES(618, 'Le Cellier - La Vinalière', 'StopArea:LIL184');
INSERT INTO `lilas` VALUES(632, 'Saint-Étienne-de-Montluc - La Guerche', 'StopArea:LIL1050');
INSERT INTO `lilas` VALUES(633, 'Saint-Étienne-de-Montluc - Centre', 'StopArea:LIL341');
INSERT INTO `lilas` VALUES(634, 'Saint-Étienne-de-Montluc - Marigny', 'StopArea:LIL1049');
INSERT INTO `lilas` VALUES(646, 'Dervallières-Zola - Dufy', 'StopArea:LIL821');
INSERT INTO `lilas` VALUES(647, 'Nantes - Poincaré', 'StopArea:LIL823');
INSERT INTO `lilas` VALUES(648, 'Nantes - Sarradin', 'StopArea:LIL829');
INSERT INTO `lilas` VALUES(649, 'Nantes - Mondésir', 'StopArea:LIL251');
INSERT INTO `lilas` VALUES(650, 'Nantes - Delorme', 'StopArea:LIL1165');
INSERT INTO `lilas` VALUES(651, 'Nantes - Saint Nicolas', 'StopArea:LIL326');
INSERT INTO `lilas` VALUES(652, 'Saint-Étienne-de-Montluc - Lot Marigny', 'StopArea:LIL1052');
INSERT INTO `lilas` VALUES(654, 'Saint-Étienne-de-Montluc - Rue de Nantes N°40', 'StopArea:LIL1047');
INSERT INTO `lilas` VALUES(658, 'Bonnœuvre - Centre', 'StopArea:LIL26');
INSERT INTO `lilas` VALUES(659, 'Riaillé - Garage', 'StopArea:LIL809');
INSERT INTO `lilas` VALUES(660, 'Riaillé - Centre', 'StopArea:LIL309');
INSERT INTO `lilas` VALUES(661, 'Riaillé - Pharmacie', 'StopArea:LIL1127');
INSERT INTO `lilas` VALUES(664, 'Pannecé - Centre', 'StopArea:LIL269');
INSERT INTO `lilas` VALUES(666, 'Teillé - Centre', 'StopArea:LIL356');
INSERT INTO `lilas` VALUES(668, 'Mouzeil - Centre', 'StopArea:LIL258');
INSERT INTO `lilas` VALUES(669, 'Mouzeil - Le Boulay', 'StopArea:LIL1180');
INSERT INTO `lilas` VALUES(670, 'Ligné - Les Jaunais', 'StopArea:LIL1178');
INSERT INTO `lilas` VALUES(671, 'Ligné - Centre', 'StopArea:LIL216');
INSERT INTO `lilas` VALUES(672, 'Ligné - Le Plessis', 'StopArea:LIL1078');
INSERT INTO `lilas` VALUES(675, 'Saint-Mars-du-Désert - Centre', 'StopArea:LIL335');
INSERT INTO `lilas` VALUES(676, 'Saint-Mars-du-Désert - Pont David', 'StopArea:LIL1176');
INSERT INTO `lilas` VALUES(683, 'Vieillevigne - Terrain des Sports', 'StopArea:LIL1136');
INSERT INTO `lilas` VALUES(684, 'Vieillevigne - Centre', 'StopArea:LIL377');
INSERT INTO `lilas` VALUES(687, 'La Planche - La Moune', 'StopArea:LIL1134');
INSERT INTO `lilas` VALUES(691, 'Montbert - La Poste', 'StopArea:LIL1131');
INSERT INTO `lilas` VALUES(692, 'Montbert - Centre', 'StopArea:LIL253');
INSERT INTO `lilas` VALUES(693, 'Montbert - La Croix des Prés', 'StopArea:LIL1130');
INSERT INTO `lilas` VALUES(695, 'Montbert - Les Chaises', 'StopArea:LIL1129');
INSERT INTO `lilas` VALUES(696, 'Le Bignon - La Masure', 'StopArea:LIL844');
INSERT INTO `lilas` VALUES(697, 'Le Bignon - Centre', 'StopArea:LIL19');
INSERT INTO `lilas` VALUES(698, 'Le Bignon - Les Aires', 'StopArea:LIL1259');
INSERT INTO `lilas` VALUES(699, 'Le Bignon - La Jarrie', 'StopArea:LIL843');
INSERT INTO `lilas` VALUES(700, 'Le Bignon - Maison Rouge', 'StopArea:LIL842');
INSERT INTO `lilas` VALUES(701, 'Rezé - La Malnoue', 'StopArea:LIL841');
INSERT INTO `lilas` VALUES(702, 'Rezé - Pinier', 'StopArea:LIL1287');
INSERT INTO `lilas` VALUES(705, 'Blain - Pont Piétin', 'StopArea:LIL289');
INSERT INTO `lilas` VALUES(707, 'Fay-de-Bretagne - Centre', 'StopArea:LIL98');
INSERT INTO `lilas` VALUES(710, 'Notre-Dame-des-Landes - Bredeloup', 'StopArea:LIL1139');
INSERT INTO `lilas` VALUES(711, 'Notre-Dame-des-Landes - Centre', 'StopArea:LIL265');
INSERT INTO `lilas` VALUES(712, 'Notre-Dame-des-Landes - L''Epine', 'StopArea:LIL1140');
INSERT INTO `lilas` VALUES(715, 'Vigneux-de-Bretagne - La Paquelais', 'StopArea:LIL178');
INSERT INTO `lilas` VALUES(721, 'Orvault - La Chapelle des Anges', 'StopArea:LIL910');
INSERT INTO `lilas` VALUES(722, 'Orvault - Centre', 'StopArea:LIL268');
INSERT INTO `lilas` VALUES(723, 'Saint-Nazaire - Paul Perrin', 'StopArea:LIL1273');
INSERT INTO `lilas` VALUES(724, 'Saint-Nazaire - Victor Hugo', 'StopArea:LIL1276');
INSERT INTO `lilas` VALUES(725, 'Saint-Nazaire - Médiathèque', 'StopArea:LIL1277');
INSERT INTO `lilas` VALUES(726, 'Saint-Nazaire - Menaudoux', 'StopArea:LIL402');
INSERT INTO `lilas` VALUES(727, 'Saint-Nazaire - Foyer jeunes travailleurs', 'StopArea:LIL102');
INSERT INTO `lilas` VALUES(728, 'Saint-Nazaire - Tranchée', 'StopArea:LIL407');
INSERT INTO `lilas` VALUES(729, 'Saint-Nazaire - Moulin du Pé', 'StopArea:LIL405');
INSERT INTO `lilas` VALUES(730, 'Saint-Nazaire - Garnier (Immaculée)', 'StopArea:LIL406');
INSERT INTO `lilas` VALUES(731, 'Pornichet - Les 4 Vents', 'StopArea:LIL584');
INSERT INTO `lilas` VALUES(732, 'La Baule-Escoublac - La Bosse', 'StopArea:LIL560');
INSERT INTO `lilas` VALUES(733, 'La Baule-Escoublac - Clos Colin', 'StopArea:LIL551');
INSERT INTO `lilas` VALUES(734, 'La Baule-Escoublac - Escoublac Centre', 'StopArea:LIL558');
INSERT INTO `lilas` VALUES(735, 'La Baule-Escoublac - Trois Fontaines', 'StopArea:LIL566');
INSERT INTO `lilas` VALUES(737, 'La Baule-Escoublac - Maison Médicale', 'StopArea:LIL555');
INSERT INTO `lilas` VALUES(738, 'La Baule-Escoublac - Pem Gare Routière', 'StopArea:LIL1268');
INSERT INTO `lilas` VALUES(739, 'Beslon - Les Salines', 'StopArea:LIL565');
INSERT INTO `lilas` VALUES(742, 'Guérande - Tromartin', 'StopArea:LIL518');
INSERT INTO `lilas` VALUES(744, 'Guérande - Kerbiniou', 'StopArea:LIL516');
INSERT INTO `lilas` VALUES(745, 'Guérande - Le Bois Rochefort', 'StopArea:LIL515');
INSERT INTO `lilas` VALUES(746, 'Guérande - La Pradonnais', 'StopArea:LIL514');
INSERT INTO `lilas` VALUES(747, 'Guérande - Kerbennet', 'StopArea:LIL513');
INSERT INTO `lilas` VALUES(748, 'Guérande - Athanor', 'StopArea:LIL512');
INSERT INTO `lilas` VALUES(749, 'Guérande - Bouton d''Or', 'StopArea:LIL509');
INSERT INTO `lilas` VALUES(751, 'Guérande - Porte St Michel', 'StopArea:LIL511');
INSERT INTO `lilas` VALUES(752, 'Herbignac - Ranrouet', 'StopArea:LIL540');
INSERT INTO `lilas` VALUES(753, 'Herbignac - Champ de Foire', 'StopArea:LIL538');
INSERT INTO `lilas` VALUES(754, 'Herbignac - Eglise', 'StopArea:LIL537');
INSERT INTO `lilas` VALUES(755, 'Herbignac - Ponnement', 'StopArea:LIL536');
INSERT INTO `lilas` VALUES(757, 'Herbignac - Marlais', 'StopArea:LIL539');
INSERT INTO `lilas` VALUES(758, 'Saint-Lyphard - La Chapelle', 'StopArea:LIL533');
INSERT INTO `lilas` VALUES(759, 'Saint-Lyphard - Stade', 'StopArea:LIL534');
INSERT INTO `lilas` VALUES(760, 'Saint-Lyphard - Mairie', 'StopArea:LIL532');
INSERT INTO `lilas` VALUES(765, 'Saint-Lyphard - Kerbourg', 'StopArea:LIL527');
INSERT INTO `lilas` VALUES(766, 'Guérande - La Madeleine', 'StopArea:LIL524');
INSERT INTO `lilas` VALUES(768, 'Saint-Nazaire - Papin', 'StopArea:LIL412');
INSERT INTO `lilas` VALUES(771, 'Saint-Nazaire - République', 'StopArea:LIL321');
INSERT INTO `lilas` VALUES(772, 'Châteaubriant - HLM Vitré', 'StopArea:LIL132');
INSERT INTO `lilas` VALUES(773, 'Châteaubriant - 27 Otages', 'StopArea:LIL1');
INSERT INTO `lilas` VALUES(774, 'Châteaubriant - Les Fauvettes', 'StopArea:LIL207');
INSERT INTO `lilas` VALUES(775, 'Châteaubriant - Acacias', 'StopArea:LIL3');
INSERT INTO `lilas` VALUES(776, 'Châteaubriant - Montherlant', 'StopArea:LIL254');
INSERT INTO `lilas` VALUES(777, 'Châteaubriant - Hélène Boucher', 'StopArea:LIL137');
INSERT INTO `lilas` VALUES(779, 'Châteaubriant - Route d''Ancenis', 'StopArea:LIL315');
INSERT INTO `lilas` VALUES(780, 'Châteaubriant - Cité Paul Huard', 'StopArea:LIL73');
INSERT INTO `lilas` VALUES(781, 'Châteaubriant - Mairie', 'StopArea:LIL229');
INSERT INTO `lilas` VALUES(782, 'Châteaubriant - Poste', 'StopArea:LIL292');
INSERT INTO `lilas` VALUES(783, 'Châteaubriant - Centre Municipal des Sports', 'StopArea:LIL52');
INSERT INTO `lilas` VALUES(784, 'Châteaubriant - Provence', 'StopArea:LIL298');
INSERT INTO `lilas` VALUES(785, 'Châteaubriant - Ville aux Roses', 'StopArea:LIL381');
INSERT INTO `lilas` VALUES(789, 'Châteaubriant - Avenue de la Fraternité', 'StopArea:LIL7');
INSERT INTO `lilas` VALUES(790, 'Châteaubriant - César Franck', 'StopArea:LIL85');
INSERT INTO `lilas` VALUES(791, 'Châteaubriant - Halte Garderie', 'StopArea:LIL133');
INSERT INTO `lilas` VALUES(792, 'Châteaubriant - Centre Commercial Rue Brient 1er', 'StopArea:LIL318');
INSERT INTO `lilas` VALUES(793, 'Châteaubriant - Gendarmerie (Avenue Jean Moulin)', 'StopArea:LIL116');
INSERT INTO `lilas` VALUES(795, 'Châteaubriant - Trinité', 'StopArea:LIL370');
INSERT INTO `lilas` VALUES(796, 'Châteaubriant - Maison de Retraite', 'StopArea:LIL793');
INSERT INTO `lilas` VALUES(799, 'Châteaubriant - Angle Rue de Brest/Metz', 'StopArea:LIL317');
INSERT INTO `lilas` VALUES(800, 'Châteaubriant - Eglise de Béré', 'StopArea:LIL97');
INSERT INTO `lilas` VALUES(801, 'Guérande - Beau Séjour', 'StopArea:LIL846');
INSERT INTO `lilas` VALUES(802, 'Guérande - Miroux', 'StopArea:LIL520');
INSERT INTO `lilas` VALUES(803, 'Guérande - Kervolan', 'StopArea:LIL1289');
INSERT INTO `lilas` VALUES(804, 'Saint-Molf - Cimetière', 'StopArea:LIL593');
INSERT INTO `lilas` VALUES(806, 'Assérac - Pont d''Armes', 'StopArea:LIL592');
INSERT INTO `lilas` VALUES(807, 'Assérac - Mairie', 'StopArea:LIL591');
INSERT INTO `lilas` VALUES(808, 'Herbignac - Stade', 'StopArea:LIL1235');
INSERT INTO `lilas` VALUES(809, 'Férel - Quelnet', 'StopArea:LIL590');
INSERT INTO `lilas` VALUES(810, '56 - Centre', 'StopArea:LIL589');
INSERT INTO `lilas` VALUES(811, 'Férel - Le Guerny', 'StopArea:LIL1234');
INSERT INTO `lilas` VALUES(812, '56 - Mairie', 'StopArea:LIL588');
INSERT INTO `lilas` VALUES(813, '56 - Barges', 'StopArea:LIL1233');
INSERT INTO `lilas` VALUES(814, 'Pénestin - Office de tourisme', 'StopArea:LIL587');
INSERT INTO `lilas` VALUES(815, '56 - Route du Bile', 'StopArea:LIL790');
INSERT INTO `lilas` VALUES(816, 'Saint-Nazaire - Lesseps', 'StopArea:LIL1274');
INSERT INTO `lilas` VALUES(817, 'Saint-Nazaire - Sautron', 'StopArea:LIL777');
INSERT INTO `lilas` VALUES(818, 'Saint-Nazaire - Perthuischaud', 'StopArea:LIL778');
INSERT INTO `lilas` VALUES(819, 'Saint-Nazaire - La Vecquerie', 'StopArea:LIL404');
INSERT INTO `lilas` VALUES(821, 'Saint-Nazaire - Etoile du Matin', 'StopArea:LIL411');
INSERT INTO `lilas` VALUES(822, 'Pornichet - Place du Marché', 'StopArea:LIL583');
INSERT INTO `lilas` VALUES(823, 'Pornichet - La Chapelle', 'StopArea:LIL581');
INSERT INTO `lilas` VALUES(824, 'Pornichet - Dauphin SNCF', 'StopArea:LIL580');
INSERT INTO `lilas` VALUES(825, 'La Baule-Escoublac - Marché Guézy', 'StopArea:LIL542');
INSERT INTO `lilas` VALUES(826, 'La Baule-Escoublac - Caillaud', 'StopArea:LIL570');
INSERT INTO `lilas` VALUES(827, 'La Baule-Escoublac - Le Moulin', 'StopArea:LIL572');
INSERT INTO `lilas` VALUES(828, 'La Baule-Escoublac - Maison du Guézy', 'StopArea:LIL573');
INSERT INTO `lilas` VALUES(829, 'La Baule-Escoublac - Le Guézy', 'StopArea:LIL577');
INSERT INTO `lilas` VALUES(830, 'La Baule-Escoublac - Cuy', 'StopArea:LIL578');
INSERT INTO `lilas` VALUES(831, 'La Baule-Escoublac - Ville aux Fèves', 'StopArea:LIL575');
INSERT INTO `lilas` VALUES(832, 'La Baule-Escoublac - Ville Halgand', 'StopArea:LIL564');
INSERT INTO `lilas` VALUES(833, 'La Baule-Escoublac - Boulevard de la Forêt', 'StopArea:LIL574');
INSERT INTO `lilas` VALUES(834, 'La Baule-Escoublac - La Guilleraie', 'StopArea:LIL579');
INSERT INTO `lilas` VALUES(835, 'La Baule-Escoublac - Avenue de Lyon', 'StopArea:LIL576');
INSERT INTO `lilas` VALUES(836, 'La Baule-Escoublac - Mazy', 'StopArea:LIL547');
INSERT INTO `lilas` VALUES(837, 'La Baule-Escoublac - Avenue de Rhuys', 'StopArea:LIL549');
INSERT INTO `lilas` VALUES(838, 'La Baule-Escoublac - Lafayette', 'StopArea:LIL550');
INSERT INTO `lilas` VALUES(841, 'La Baule-Escoublac - Allée Cavalière', 'StopArea:LIL848');
INSERT INTO `lilas` VALUES(842, 'La Baule-Escoublac - Tréméac', 'StopArea:LIL562');
INSERT INTO `lilas` VALUES(843, 'La Baule-Escoublac - Marché', 'StopArea:LIL545');
INSERT INTO `lilas` VALUES(844, 'La Baule-Escoublac - Foyer', 'StopArea:LIL552');
INSERT INTO `lilas` VALUES(845, 'La Baule-Escoublac - Royal', 'StopArea:LIL561');
INSERT INTO `lilas` VALUES(846, 'La Baule-Escoublac - Tennis', 'StopArea:LIL563');
INSERT INTO `lilas` VALUES(847, 'La Baule-Escoublac - Sarcelles', 'StopArea:LIL557');
INSERT INTO `lilas` VALUES(848, 'La Baule-Escoublac - Stade', 'StopArea:LIL541');
INSERT INTO `lilas` VALUES(850, 'Le Pouliguen - Gare SNCF', 'StopArea:LIL666');
INSERT INTO `lilas` VALUES(851, 'Le Pouliguen - Porte Joie', 'StopArea:LIL665');
INSERT INTO `lilas` VALUES(852, 'Le Pouliguen - Centre', 'StopArea:LIL669');
INSERT INTO `lilas` VALUES(853, 'Le Pouliguen - Clémenceau', 'StopArea:LIL657');
INSERT INTO `lilas` VALUES(854, 'Le Pouliguen - Océan', 'StopArea:LIL659');
INSERT INTO `lilas` VALUES(855, 'Le Pouliguen - Bel Air', 'StopArea:LIL683');
INSERT INTO `lilas` VALUES(856, 'Le Pouliguen - Grandes Terres', 'StopArea:LIL679');
INSERT INTO `lilas` VALUES(857, 'Le Pouliguen - Kerdun', 'StopArea:LIL682');
INSERT INTO `lilas` VALUES(858, 'Le Pouliguen - Franchet d''Esperey', 'StopArea:LIL685');
INSERT INTO `lilas` VALUES(859, 'Le Pouliguen - Maréchal Juin', 'StopArea:LIL678');
INSERT INTO `lilas` VALUES(861, 'Le Pouliguen - Le Scall', 'StopArea:LIL680');
INSERT INTO `lilas` VALUES(862, 'Batz-sur-Mer - Les Ajoncs', 'StopArea:LIL647');
INSERT INTO `lilas` VALUES(863, 'Batz-sur-Mer - Govelle', 'StopArea:LIL643');
INSERT INTO `lilas` VALUES(864, 'Batz-sur-Mer - Dervin', 'StopArea:LIL653');
INSERT INTO `lilas` VALUES(865, 'Batz-sur-Mer - Dilane', 'StopArea:LIL654');
INSERT INTO `lilas` VALUES(866, 'Batz-sur-Mer - Roche Mathieu', 'StopArea:LIL641');
INSERT INTO `lilas` VALUES(867, 'Batz-sur-Mer - Centre', 'StopArea:LIL642');
INSERT INTO `lilas` VALUES(868, 'Batz-sur-Mer - Ker d''Abas', 'StopArea:LIL736');
INSERT INTO `lilas` VALUES(869, 'Batz-sur-Mer - VVF', 'StopArea:LIL645');
INSERT INTO `lilas` VALUES(870, 'Batz-sur-Mer - Valentin', 'StopArea:LIL655');
INSERT INTO `lilas` VALUES(871, 'Batz-sur-Mer - Barrière', 'StopArea:LIL637');
INSERT INTO `lilas` VALUES(872, 'Le Croisic - Provost', 'StopArea:LIL639');
INSERT INTO `lilas` VALUES(874, 'Pornichet - Place Leclerc', 'StopArea:LIL582');
INSERT INTO `lilas` VALUES(876, 'Saint-Lyphard - La Guérandaise', 'StopArea:LIL741');
INSERT INTO `lilas` VALUES(877, 'Guérande - Bouzaire', 'StopArea:LIL1232');
INSERT INTO `lilas` VALUES(878, 'Guérande - Brezean', 'StopArea:LIL517');
INSERT INTO `lilas` VALUES(879, 'La Turballe - Coispean', 'StopArea:LIL605');
INSERT INTO `lilas` VALUES(882, 'Mesquer - Centre', 'StopArea:LIL722');
INSERT INTO `lilas` VALUES(886, 'Mesquer - Kerguillote', 'StopArea:LIL701');
INSERT INTO `lilas` VALUES(887, 'Mesquer - Ker-Al-Men', 'StopArea:LIL704');
INSERT INTO `lilas` VALUES(888, 'Mesquer - Kerro', 'StopArea:LIL712');
INSERT INTO `lilas` VALUES(889, 'Mesquer - Soursac', 'StopArea:LIL710');
INSERT INTO `lilas` VALUES(890, 'Mesquer - Lanseria', 'StopArea:LIL705');
INSERT INTO `lilas` VALUES(893, 'Mesquer - Kerdandec', 'StopArea:LIL723');
INSERT INTO `lilas` VALUES(894, 'Mesquer - Sorloc', 'StopArea:LIL721');
INSERT INTO `lilas` VALUES(895, 'Mesquer - Kercabellec', 'StopArea:LIL706');
INSERT INTO `lilas` VALUES(896, 'Mesquer - Les Paludiers', 'StopArea:LIL709');
INSERT INTO `lilas` VALUES(898, 'Mesquer - La Vigne', 'StopArea:LIL714');
INSERT INTO `lilas` VALUES(899, 'Mesquer - Trevin', 'StopArea:LIL715');
INSERT INTO `lilas` VALUES(900, 'Mesquer - Kerroué', 'StopArea:LIL716');
INSERT INTO `lilas` VALUES(901, 'Mesquer - Fontaine Braz', 'StopArea:LIL717');
INSERT INTO `lilas` VALUES(902, 'Mesquer - Breherin', 'StopArea:LIL707');
INSERT INTO `lilas` VALUES(903, 'Mesquer - Le Velin', 'StopArea:LIL713');
INSERT INTO `lilas` VALUES(904, 'Guérande - Ker marie', 'StopArea:LIL523');
INSERT INTO `lilas` VALUES(905, 'Guérande - Croix de Kerbezo', 'StopArea:LIL522');
INSERT INTO `lilas` VALUES(906, 'Guérande - Clis', 'StopArea:LIL521');
INSERT INTO `lilas` VALUES(907, 'La Turballe - L''Etoile', 'StopArea:LIL615');
INSERT INTO `lilas` VALUES(908, 'La Turballe - Le Manoir', 'StopArea:LIL614');
INSERT INTO `lilas` VALUES(909, 'La Turballe - les Quatre Routes', 'StopArea:LIL608');
INSERT INTO `lilas` VALUES(910, 'La Turballe - Le Moulin', 'StopArea:LIL617');
INSERT INTO `lilas` VALUES(911, 'La Turballe - La Frégate', 'StopArea:LIL616');
INSERT INTO `lilas` VALUES(912, 'La Turballe - Grande Douve', 'StopArea:LIL613');
INSERT INTO `lilas` VALUES(913, 'La Turballe - Colbert', 'StopArea:LIL607');
INSERT INTO `lilas` VALUES(914, 'La Turballe - Bellanger', 'StopArea:LIL609');
INSERT INTO `lilas` VALUES(915, 'La Turballe - Port', 'StopArea:LIL610');
INSERT INTO `lilas` VALUES(917, 'La Turballe - Ker Elisabeth', 'StopArea:LIL612');
INSERT INTO `lilas` VALUES(918, 'La Turballe - Brandu', 'StopArea:LIL611');
INSERT INTO `lilas` VALUES(920, 'Piriac-sur-Mer - Moulin de Praillane', 'StopArea:LIL603');
INSERT INTO `lilas` VALUES(921, 'Piriac-sur-Mer - Saint-Sébastien de Piriac', 'StopArea:LIL596');
INSERT INTO `lilas` VALUES(923, 'Piriac-sur-Mer - Kerdinio', 'StopArea:LIL601');
INSERT INTO `lilas` VALUES(924, 'Piriac-sur-Mer - Croix de Kerdinio', 'StopArea:LIL595');
INSERT INTO `lilas` VALUES(926, 'Piriac-sur-Mer - Tranchée', 'StopArea:LIL599');
INSERT INTO `lilas` VALUES(927, 'Piriac-sur-Mer - Centre', 'StopArea:LIL597');
INSERT INTO `lilas` VALUES(928, 'Piriac-sur-Mer - Pen An Ran', 'StopArea:LIL598');
INSERT INTO `lilas` VALUES(929, 'Le Croisic - Mairie', 'StopArea:LIL635');
INSERT INTO `lilas` VALUES(930, 'Le Croisic - Lenigo', 'StopArea:LIL634');
INSERT INTO `lilas` VALUES(931, 'Le Croisic - Saint-Jean de Dieu', 'StopArea:LIL627');
INSERT INTO `lilas` VALUES(933, 'Le Croisic - Saint-Goustan', 'StopArea:LIL618');
INSERT INTO `lilas` VALUES(934, 'Le Croisic - Castouillet', 'StopArea:LIL631');
INSERT INTO `lilas` VALUES(935, 'Le Croisic - Port Val', 'StopArea:LIL630');
INSERT INTO `lilas` VALUES(936, 'Le Croisic - Port aux Rocs', 'StopArea:LIL633');
INSERT INTO `lilas` VALUES(937, 'Le Croisic - La Vigie', 'StopArea:LIL638');
INSERT INTO `lilas` VALUES(941, 'Le Croisic - Pré Neuf', 'StopArea:LIL622');
INSERT INTO `lilas` VALUES(942, 'Le Croisic - Rohello', 'StopArea:LIL623');
INSERT INTO `lilas` VALUES(943, 'Le Croisic - Henri Dunant', 'StopArea:LIL624');
INSERT INTO `lilas` VALUES(944, 'Le Croisic - Hôpital', 'StopArea:LIL625');
INSERT INTO `lilas` VALUES(945, 'Le Croisic - Stade', 'StopArea:LIL626');
INSERT INTO `lilas` VALUES(946, 'Le Pouliguen - Océan', 'StopArea:LIL636');
INSERT INTO `lilas` VALUES(947, 'Le Croisic - Leclerc', 'StopArea:LIL628');
INSERT INTO `lilas` VALUES(948, 'Le Croisic - Place Dinan', 'StopArea:LIL629');
INSERT INTO `lilas` VALUES(949, 'La Baule-Escoublac - Mairie du Guézy', 'StopArea:LIL728');
INSERT INTO `lilas` VALUES(950, 'La Baule-Escoublac - Avenue Saint-Geoges', 'StopArea:LIL548');
INSERT INTO `lilas` VALUES(951, 'La Baule-Escoublac - Rond Point de Breil', 'StopArea:LIL544');
INSERT INTO `lilas` VALUES(952, 'La Baule-Escoublac - Piscine', 'StopArea:LIL546');
INSERT INTO `lilas` VALUES(953, 'La Baule-Escoublac - Châteaubriant', 'StopArea:LIL543');
INSERT INTO `lilas` VALUES(954, 'La Baule-Escoublac - Beslon', 'StopArea:LIL571');
INSERT INTO `lilas` VALUES(955, 'Kerquessaud - Haut Brivin', 'StopArea:LIL568');
INSERT INTO `lilas` VALUES(956, 'La Baule-Escoublac - Kerquessaud', 'StopArea:LIL569');
INSERT INTO `lilas` VALUES(957, 'La Baule-Escoublac - Villeneuve', 'StopArea:LIL567');
INSERT INTO `lilas` VALUES(958, 'La Baule-Escoublac - Saint-Servais', 'StopArea:LIL730');
INSERT INTO `lilas` VALUES(959, 'La Baule-Escoublac - Drevet', 'StopArea:LIL789');
INSERT INTO `lilas` VALUES(960, 'La Baule-Escoublac - Cimetière', 'StopArea:LIL729');
INSERT INTO `lilas` VALUES(961, 'Beslon - Avenue Noëlles', 'StopArea:LIL1281');
INSERT INTO `lilas` VALUES(962, 'La Baule-Escoublac - Prevenerie', 'StopArea:LIL731');
INSERT INTO `lilas` VALUES(963, 'La Baule-Escoublac - Cité du Rocher', 'StopArea:LIL732');
INSERT INTO `lilas` VALUES(964, 'La Baule-Escoublac - Bole Eden', 'StopArea:LIL733');
INSERT INTO `lilas` VALUES(965, 'La Baule-Escoublac - Avenue De Joyeuse', 'StopArea:LIL1303');
INSERT INTO `lilas` VALUES(966, 'La Baule-Escoublac - La Jo', 'StopArea:LIL1254');
INSERT INTO `lilas` VALUES(1280, 'Corsept - Le Tertre', 'StopArea:LIL926');
INSERT INTO `lilas` VALUES(1281, 'Saint-Viaud - Plein Air', 'StopArea:LIL894');
INSERT INTO `lilas` VALUES(1282, 'Saint-Père-en-Retz - La Jarriais', 'StopArea:LIL942');
INSERT INTO `lilas` VALUES(1283, 'Saint-Père-en-Retz - Les Pilorgères', 'StopArea:LIL941');
INSERT INTO `lilas` VALUES(1284, 'Saint-Père-en-Retz - La Giraudière', 'StopArea:LIL944');
INSERT INTO `lilas` VALUES(1285, 'Saint-Père-en-Retz - Ennerie', 'StopArea:LIL779');
INSERT INTO `lilas` VALUES(1286, 'Vue - La Fosse des Prés', 'StopArea:LIL786');
INSERT INTO `lilas` VALUES(1287, 'Rouans - Centre', 'StopArea:LIL314');
INSERT INTO `lilas` VALUES(1288, 'Cheix-en-Retz - Carrefour', 'StopArea:LIL945');
INSERT INTO `lilas` VALUES(1289, 'Cheix-en-Retz - Le Pilon Carrefour', 'StopArea:LIL739');
INSERT INTO `lilas` VALUES(1290, 'Derval - Transformateur', 'StopArea:LIL958');
INSERT INTO `lilas` VALUES(1291, 'Conquereuil - Gare', 'StopArea:LIL967');
INSERT INTO `lilas` VALUES(1292, 'Derval - Bellevue', 'StopArea:LIL957');
INSERT INTO `lilas` VALUES(1293, 'Marsac-sur-Don - Centre', 'StopArea:LIL243');
INSERT INTO `lilas` VALUES(1294, 'Puceul - Bouillon Jaune', 'StopArea:LIL30');
INSERT INTO `lilas` VALUES(1295, 'Puceul - L''Alcidais', 'StopArea:LIL960');
INSERT INTO `lilas` VALUES(1296, 'Héric - Bout de Bois', 'StopArea:LIL32');
INSERT INTO `lilas` VALUES(1297, 'Héric - La Bosse des Landes', 'StopArea:LIL952');
INSERT INTO `lilas` VALUES(1298, 'Nantes - Duquesne', 'StopArea:LIL91');
INSERT INTO `lilas` VALUES(1299, 'Blain - Plongeon', 'StopArea:LIL1210');
INSERT INTO `lilas` VALUES(1300, 'Nantes - Rene Cassin', 'StopArea:LIL828');
INSERT INTO `lilas` VALUES(1301, 'Le Gâvre - La Roberdais', 'StopArea:LIL962');
INSERT INTO `lilas` VALUES(1302, 'Le Gâvre - Néricou', 'StopArea:LIL807');
INSERT INTO `lilas` VALUES(1303, 'Plessé - Trelan', 'StopArea:LIL369');
INSERT INTO `lilas` VALUES(1304, 'Plessé - Maison Blanche', 'StopArea:LIL964');
INSERT INTO `lilas` VALUES(1305, 'Plessé - La Petiaudais', 'StopArea:LIL966');
INSERT INTO `lilas` VALUES(1306, 'Plessé - La Laiterie', 'StopArea:LIL965');
INSERT INTO `lilas` VALUES(1307, 'Plessé - Le Plessis', 'StopArea:LIL963');
INSERT INTO `lilas` VALUES(1308, 'Legé - Centre', 'StopArea:LIL203');
INSERT INTO `lilas` VALUES(1309, 'Legé - Mont Plaisir', 'StopArea:LIL1019');
INSERT INTO `lilas` VALUES(1310, 'Saint-Philbert-de-Grand-Lieu - L''Aujardière', 'StopArea:LIL1016');
INSERT INTO `lilas` VALUES(1311, 'Saint-Philbert-de-Grand-Lieu - La Grue', 'StopArea:LIL1015');
INSERT INTO `lilas` VALUES(1312, 'Saint-Philbert-de-Grand-Lieu - La Gravouillerie', 'StopArea:LIL1171');
INSERT INTO `lilas` VALUES(1313, 'Saint-Lumine-de-Coutais - La Pironnière', 'StopArea:LIL1017');
INSERT INTO `lilas` VALUES(1314, 'Saint-Philbert-de-Grand-Lieu - Les Troissarts', 'StopArea:LIL1018');
INSERT INTO `lilas` VALUES(1315, 'Saint-Philbert-de-Grand-Lieu - Le Plessis', 'StopArea:LIL1205');
INSERT INTO `lilas` VALUES(1316, 'Saint-Philbert-de-Grand-Lieu - Le Moulin De La Croix', 'StopArea:LIL1272');
INSERT INTO `lilas` VALUES(1317, 'Saint-Philbert-de-Grand-Lieu - Moulin de la Chaussée', 'StopArea:LIL1009');
INSERT INTO `lilas` VALUES(1318, 'Saint-Philbert-de-Grand-Lieu - Brissonnière', 'StopArea:LIL1013');
INSERT INTO `lilas` VALUES(1319, 'Saint-Philbert-de-Grand-Lieu - Vannerie', 'StopArea:LIL1014');
INSERT INTO `lilas` VALUES(1320, 'La Chevrolière - La Boulaie', 'StopArea:LIL1000');
INSERT INTO `lilas` VALUES(1321, 'La Chevrolière - Pont du Guy', 'StopArea:LIL997');
INSERT INTO `lilas` VALUES(1322, 'La Chevrolière - Les Coutumes', 'StopArea:LIL995');
INSERT INTO `lilas` VALUES(1323, 'Pont-Saint-Martin - Championnière', 'StopArea:LIL831');
INSERT INTO `lilas` VALUES(1324, 'Pont-Saint-Martin - Centre', 'StopArea:LIL290');
INSERT INTO `lilas` VALUES(1325, 'Pont-Saint-Martin - Bel Air', 'StopArea:LIL838');
INSERT INTO `lilas` VALUES(1326, 'Pont-Saint-Martin - Rairie', 'StopArea:LIL835');
INSERT INTO `lilas` VALUES(1327, 'Pont-Saint-Martin - Planchette', 'StopArea:LIL830');
INSERT INTO `lilas` VALUES(1328, 'Pont-Saint-Martin - Moulin Rouge', 'StopArea:LIL837');
INSERT INTO `lilas` VALUES(1329, 'La Chevrolière - Tournebride', 'StopArea:LIL1269');
INSERT INTO `lilas` VALUES(1330, 'Missillac - La Gouarais', 'StopArea:LIL804');
INSERT INTO `lilas` VALUES(1331, 'Missillac - La Sureté', 'StopArea:LIL183');
INSERT INTO `lilas` VALUES(1332, 'Missillac - Le Bon Tour', 'StopArea:LIL190');
INSERT INTO `lilas` VALUES(1333, 'Missillac - L''Angle Bertho', 'StopArea:LIL152');
INSERT INTO `lilas` VALUES(1334, 'Pontchâteau - Calvaire', 'StopArea:LIL1243');
INSERT INTO `lilas` VALUES(1335, 'Crossac - La Poterie', 'StopArea:LIL180');
INSERT INTO `lilas` VALUES(1336, 'Crossac - La Guesne', 'StopArea:LIL171');
INSERT INTO `lilas` VALUES(1337, 'Trignac - Fontaine au Brun', 'StopArea:LIL100');
INSERT INTO `lilas` VALUES(1338, 'Trignac - Grandchamps', 'StopArea:LIL1220');
INSERT INTO `lilas` VALUES(1339, 'Avessac - Le Poteau Vert', 'StopArea:LIL1291');
INSERT INTO `lilas` VALUES(1340, 'Fégréac - Lilette', 'StopArea:LIL1290');
INSERT INTO `lilas` VALUES(1341, 'Sévérac - La Normandais', 'StopArea:LIL978');
INSERT INTO `lilas` VALUES(1342, 'Guenrouet - Château-Rouge', 'StopArea:LIL987');
INSERT INTO `lilas` VALUES(1343, 'Guenrouet - Bas-Epaud', 'StopArea:LIL989');
INSERT INTO `lilas` VALUES(1344, 'Guenrouet - Croix-Millette', 'StopArea:LIL990');
INSERT INTO `lilas` VALUES(1345, 'Quilly - La Pendière', 'StopArea:LIL984');
INSERT INTO `lilas` VALUES(1346, 'Quilly - Grand-Rue', 'StopArea:LIL983');
INSERT INTO `lilas` VALUES(1347, 'Sainte-Anne-sur-Brivet - La Turcaudais', 'StopArea:LIL980');
INSERT INTO `lilas` VALUES(1348, 'Sainte-Anne-sur-Brivet - Les 4 Routes', 'StopArea:LIL982');
INSERT INTO `lilas` VALUES(1349, 'Sainte-Anne-sur-Brivet - Saint-Lomer', 'StopArea:LIL979');
INSERT INTO `lilas` VALUES(1350, 'Sainte-Anne-sur-Brivet - Le Binar', 'StopArea:LIL981');
INSERT INTO `lilas` VALUES(1351, 'Saint-Gildas-des-Bois - Ferme Ecole', 'StopArea:LIL485');
INSERT INTO `lilas` VALUES(1352, 'Drefféac - Beaubois', 'StopArea:LIL975');
INSERT INTO `lilas` VALUES(1353, 'Donges - Six Croix', 'StopArea:LIL350');
INSERT INTO `lilas` VALUES(1354, 'Pornic - Gare Sncf', 'StopArea:LIL113');
INSERT INTO `lilas` VALUES(1355, 'Pornic - Hôpital', 'StopArea:LIL140');
INSERT INTO `lilas` VALUES(1356, 'Saint-Brevin-les-Pins - Fontaine', 'StopArea:LIL99');
INSERT INTO `lilas` VALUES(1357, 'Saint-Viaud - Rue de la gare', 'StopArea:LIL319');
INSERT INTO `lilas` VALUES(1358, 'Corsept - Grand Perret', 'StopArea:LIL928');
INSERT INTO `lilas` VALUES(1359, 'Corsept - La Mabilais', 'StopArea:LIL176');
INSERT INTO `lilas` VALUES(1360, 'Corsept - La Moisenais', 'StopArea:LIL924');
INSERT INTO `lilas` VALUES(1361, 'Corsept - Greix', 'StopArea:LIL927');
INSERT INTO `lilas` VALUES(1362, 'Corsept - Moulin du Greix', 'StopArea:LIL929');
INSERT INTO `lilas` VALUES(1363, 'Corsept - La Baie de Loire', 'StopArea:LIL156');
INSERT INTO `lilas` VALUES(1364, 'Saint-Père-en-Retz - Stade', 'StopArea:LIL943');
INSERT INTO `lilas` VALUES(1365, 'Saint-Père-en-Retz - La Louisiane', 'StopArea:LIL940');
INSERT INTO `lilas` VALUES(1366, 'Saint-Père-en-Retz - Les Lardières', 'StopArea:LIL1231');
INSERT INTO `lilas` VALUES(1367, 'Les Sorinières - Le Pérou', 'StopArea:LIL1292');
INSERT INTO `lilas` VALUES(1368, 'Les Sorinières - Centre', 'StopArea:LIL351');
INSERT INTO `lilas` VALUES(1369, 'Cordemais - Papinais', 'StopArea:LIL1057');
INSERT INTO `lilas` VALUES(1370, 'Cordemais - Croix Morzelle Gare', 'StopArea:LIL1174');
INSERT INTO `lilas` VALUES(1371, 'Malville - Centre', 'StopArea:LIL238');
INSERT INTO `lilas` VALUES(1372, 'Malville - Croix Blanche', 'StopArea:LIL1062');
INSERT INTO `lilas` VALUES(1373, 'Vigneux-de-Bretagne - La Freuzière', 'StopArea:LIL1035');
INSERT INTO `lilas` VALUES(1374, 'Vigneux-de-Bretagne - La Croix-de-Pierre', 'StopArea:LIL1030');
INSERT INTO `lilas` VALUES(1375, 'Vigneux-de-Bretagne - Le Bas-Vernay', 'StopArea:LIL1031');
INSERT INTO `lilas` VALUES(1376, 'Vigneux-de-Bretagne - Moulin-malecot', 'StopArea:LIL1032');
INSERT INTO `lilas` VALUES(1377, 'Vigneux-de-Bretagne - Golf', 'StopArea:LIL1034');
INSERT INTO `lilas` VALUES(1378, 'Vigneux-de-Bretagne - La Bernardière', 'StopArea:LIL1188');
INSERT INTO `lilas` VALUES(1379, 'Sautron - La Trimossière', 'StopArea:LIL1040');
INSERT INTO `lilas` VALUES(1380, 'Sautron - Bel-Abord', 'StopArea:LIL1023');
INSERT INTO `lilas` VALUES(1381, 'Sautron - Naudières', 'StopArea:LIL1024');
INSERT INTO `lilas` VALUES(1382, 'Sautron - Moulin-brûlé', 'StopArea:LIL1029');
INSERT INTO `lilas` VALUES(1383, 'Sautron - Armoricaine', 'StopArea:LIL1028');
INSERT INTO `lilas` VALUES(1384, 'Saint-Herblain - Jules Rieffel', 'StopArea:LIL1025');
INSERT INTO `lilas` VALUES(1385, 'Grandchamps-des-Fontaines - Bellevue', 'StopArea:LIL16');
INSERT INTO `lilas` VALUES(1386, 'Treillières - Telegraphe', 'StopArea:LIL357');
INSERT INTO `lilas` VALUES(1387, 'Treillières - Tourneuve', 'StopArea:LIL363');
INSERT INTO `lilas` VALUES(1388, 'Héric - ZA de l''érette', 'StopArea:LIL384');
INSERT INTO `lilas` VALUES(1389, 'Grandchamps-des-Fontaines - La Grande Haie', 'StopArea:LIL168');
INSERT INTO `lilas` VALUES(1390, 'Grandchamps-des-Fontaines - Boeufs Gras', 'StopArea:LIL908');
INSERT INTO `lilas` VALUES(1391, 'Grandchamps-des-Fontaines - Bois Robin', 'StopArea:LIL23');
INSERT INTO `lilas` VALUES(1392, 'Grandchamps-des-Fontaines - Poteau Casson', 'StopArea:LIL294');
INSERT INTO `lilas` VALUES(1393, 'Grandchamps-des-Fontaines - Pas des haies', 'StopArea:LIL271');
INSERT INTO `lilas` VALUES(1394, 'Treillières - Noe Violin', 'StopArea:LIL263');
INSERT INTO `lilas` VALUES(1395, 'Treillières - Le Gray', 'StopArea:LIL1294');
INSERT INTO `lilas` VALUES(1396, 'Treillières - Muzon', 'StopArea:LIL259');
INSERT INTO `lilas` VALUES(1397, 'Montbert - Le Butay', 'StopArea:LIL193');
INSERT INTO `lilas` VALUES(1398, 'Aigrefeuille-sur-Maine - Le Haut Coin', 'StopArea:LIL196');
INSERT INTO `lilas` VALUES(1399, 'Aigrefeuille-sur-Maine - Le Plessis', 'StopArea:LIL199');
INSERT INTO `lilas` VALUES(1400, 'Chéméré - Pont Béranger', 'StopArea:LIL1149');
INSERT INTO `lilas` VALUES(1401, 'Saint-Léger-les-Vignes - Le Clémois', 'StopArea:LIL1198');
INSERT INTO `lilas` VALUES(1402, 'La Chapelle-Basse-Mer - Sensive', 'StopArea:LIL904');
INSERT INTO `lilas` VALUES(1403, 'Le Loroux-Bottereau - Bretonnière', 'StopArea:LIL902');
INSERT INTO `lilas` VALUES(1404, 'La Remaudière - Centre', 'StopArea:LIL306');
INSERT INTO `lilas` VALUES(1405, 'Saint-Julien-de-Concelles - port Gaud', 'StopArea:LIL845');
INSERT INTO `lilas` VALUES(1406, 'Saint-Julien-de-Concelles - La Quintaine', 'StopArea:LIL1218');
INSERT INTO `lilas` VALUES(1407, 'Vallet - Luxembourg', 'StopArea:LIL222');
INSERT INTO `lilas` VALUES(1408, 'Vallet - La Moucletière', 'StopArea:LIL1161');
INSERT INTO `lilas` VALUES(1409, 'Vallet - La Tournerie', 'StopArea:LIL901');
INSERT INTO `lilas` VALUES(1410, 'Vallet - Moulin de la Verrie', 'StopArea:LIL900');
INSERT INTO `lilas` VALUES(1411, 'La Chapelle-Heulin - La Cerclerie', 'StopArea:LIL1158');
INSERT INTO `lilas` VALUES(1412, 'Basse-Goulaine - Lycée de La Herdrie', 'StopArea:LIL1153');
INSERT INTO `lilas` VALUES(1413, 'Château-Thébaud - Saint Martin', 'StopArea:LIL1279');
INSERT INTO `lilas` VALUES(1414, 'Vertou - Arrêt Busway L4', 'StopArea:LIL798');
INSERT INTO `lilas` VALUES(1415, 'Gétigné - Recouvrance', 'StopArea:LIL948');
INSERT INTO `lilas` VALUES(1416, 'Moisdon-la-Rivière - Forêt Pavée', 'StopArea:LIL1074');
INSERT INTO `lilas` VALUES(1417, 'Moisdon-la-Rivière - Le Grand Chemin', 'StopArea:LIL1075');
INSERT INTO `lilas` VALUES(1418, 'Moisdon-la-Rivière - Le Bois Morel', 'StopArea:LIL1073');
INSERT INTO `lilas` VALUES(1419, 'Moisdon-la-Rivière - Moulin Roussel', 'StopArea:LIL1072');
INSERT INTO `lilas` VALUES(1420, 'La Meilleraye-de-Bretagne - Petit Bonheur', 'StopArea:LIL1071');
INSERT INTO `lilas` VALUES(1421, 'Joué-sur-Erdre - Cour des Haies', 'StopArea:LIL1070');
INSERT INTO `lilas` VALUES(1422, 'Joué-sur-Erdre - Saint-Louis', 'StopArea:LIL1069');
INSERT INTO `lilas` VALUES(1423, 'Les Touches - La Chère', 'StopArea:LIL1068');
INSERT INTO `lilas` VALUES(1424, 'Les Touches - Centre', 'StopArea:LIL362');
INSERT INTO `lilas` VALUES(1425, 'Les Touches - La Marchanderie', 'StopArea:LIL1066');
INSERT INTO `lilas` VALUES(1426, 'Les Touches - Montigne', 'StopArea:LIL850');
INSERT INTO `lilas` VALUES(1427, 'Nort-sur-Erdre - L''Isle', 'StopArea:LIL851');
INSERT INTO `lilas` VALUES(1428, 'Petit-Mars - La Furetière', 'StopArea:LIL1089');
INSERT INTO `lilas` VALUES(1429, 'Saint-Mars-du-Désert - La Dechausserie', 'StopArea:LIL167');
INSERT INTO `lilas` VALUES(1430, 'Saint-Mars-du-Désert - Le Grand Patis', 'StopArea:LIL1079');
INSERT INTO `lilas` VALUES(1431, 'Saint-Mars-du-Désert - La Grée', 'StopArea:LIL1080');
INSERT INTO `lilas` VALUES(1432, 'Saint-Mars-du-Désert - Beauchène', 'StopArea:LIL12');
INSERT INTO `lilas` VALUES(1433, 'Saint-Mars-du-Désert - La Noé', 'StopArea:LIL1083');
INSERT INTO `lilas` VALUES(1434, 'Saint-Mars-du-Désert - La Gauterie', 'StopArea:LIL1085');
INSERT INTO `lilas` VALUES(1435, 'Saint-Mars-du-Désert - Route de Sucé', 'StopArea:LIL1081');
INSERT INTO `lilas` VALUES(1436, 'Carquefou - Tournebride', 'StopArea:LIL890');
INSERT INTO `lilas` VALUES(1437, 'Nantes - Chemin rouge', 'StopArea:LIL827');
INSERT INTO `lilas` VALUES(1438, 'Louisfert - La Touche', 'StopArea:LIL882');
INSERT INTO `lilas` VALUES(1439, 'Louisfert - Delinais', 'StopArea:LIL881');
INSERT INTO `lilas` VALUES(1440, 'Abbaretz - La Méloiterie', 'StopArea:LIL883');
INSERT INTO `lilas` VALUES(1441, 'Abbaretz - Lantilloux', 'StopArea:LIL884');
INSERT INTO `lilas` VALUES(1442, 'Abbaretz - La Ville en Bois', 'StopArea:LIL885');
INSERT INTO `lilas` VALUES(1443, 'Casson - Pas Chevalier', 'StopArea:LIL871');
INSERT INTO `lilas` VALUES(1444, 'Casson - Château d''Eau', 'StopArea:LIL873');
INSERT INTO `lilas` VALUES(1445, 'Casson - Centre', 'StopArea:LIL41');
INSERT INTO `lilas` VALUES(1446, 'Casson - Le Pont', 'StopArea:LIL872');
INSERT INTO `lilas` VALUES(1447, 'Sucé-sur-Erdre - Beauchêne', 'StopArea:LIL859');
INSERT INTO `lilas` VALUES(1448, 'Sucé-sur-Erdre - Procé', 'StopArea:LIL857');
INSERT INTO `lilas` VALUES(1449, 'Sucé-sur-Erdre - Bellevigne', 'StopArea:LIL856');
INSERT INTO `lilas` VALUES(1450, 'Sucé-sur-Erdre - Garnerie', 'StopArea:LIL852');
INSERT INTO `lilas` VALUES(1451, 'La Chapelle-sur-Erdre - Noue Verrière', 'StopArea:LIL874');
INSERT INTO `lilas` VALUES(1452, 'Sucé-sur-Erdre - Grande Bodinière', 'StopArea:LIL869');
INSERT INTO `lilas` VALUES(1453, 'Sucé-sur-Erdre - Giboire', 'StopArea:LIL860');
INSERT INTO `lilas` VALUES(1454, 'Sucé-sur-Erdre - Cloisons', 'StopArea:LIL75');
INSERT INTO `lilas` VALUES(1455, 'Sucé-sur-Erdre - Vaux', 'StopArea:LIL867');
INSERT INTO `lilas` VALUES(1456, 'Sucé-sur-Erdre - Basse Goulitière', 'StopArea:LIL865');
INSERT INTO `lilas` VALUES(1457, 'Carquefou - Les Cinq Chemins', 'StopArea:LIL888');
INSERT INTO `lilas` VALUES(1458, 'Carquefou - La Fleuriaye', 'StopArea:LIL891');
INSERT INTO `lilas` VALUES(1459, 'Nantes - Perrines', 'StopArea:LIL815');
INSERT INTO `lilas` VALUES(1460, 'Saint-Aubin-des-Châteaux - Gare', 'StopArea:LIL108');
INSERT INTO `lilas` VALUES(1461, 'Blain - Graviers', 'StopArea:LIL1170');
INSERT INTO `lilas` VALUES(1462, 'Blain - Pont de Maffre', 'StopArea:LIL954');
INSERT INTO `lilas` VALUES(1463, 'Blain - Hôtel de France', 'StopArea:LIL953');
INSERT INTO `lilas` VALUES(1464, 'Bouvron - Saint-Eloi', 'StopArea:LIL1096');
INSERT INTO `lilas` VALUES(1465, 'Campbon - La Harlière', 'StopArea:LIL1094');
INSERT INTO `lilas` VALUES(1466, 'La Chapelle-Launay - Le Tillon', 'StopArea:LIL1093');
INSERT INTO `lilas` VALUES(1467, 'Prinquiau - Centre', 'StopArea:LIL297');
INSERT INTO `lilas` VALUES(1468, 'Saint-Mars-la-Jaille - La Harie', 'StopArea:LIL1098');
INSERT INTO `lilas` VALUES(1469, 'Pouillé-les-Côteaux - Réségerie', 'StopArea:LIL1097');
INSERT INTO `lilas` VALUES(1470, 'Mésanger - Tacon', 'StopArea:LIL1099');
INSERT INTO `lilas` VALUES(1471, 'Couffé - Bel Air', 'StopArea:LIL1101');
INSERT INTO `lilas` VALUES(1472, 'Couffé - La Métellerie', 'StopArea:LIL1109');
INSERT INTO `lilas` VALUES(1473, 'Couffé - La Poussaudière', 'StopArea:LIL1100');
INSERT INTO `lilas` VALUES(1474, 'Le Cellier - La Maladrie', 'StopArea:LIL1107');
INSERT INTO `lilas` VALUES(1475, 'Le Cellier - La Savariais', 'StopArea:LIL1108');
INSERT INTO `lilas` VALUES(1476, 'Le Cellier - Château-de-Clermont', 'StopArea:LIL1106');
INSERT INTO `lilas` VALUES(1477, 'Le Cellier - Centre', 'StopArea:LIL42');
INSERT INTO `lilas` VALUES(1478, 'Le Cellier - La Joie', 'StopArea:LIL173');
INSERT INTO `lilas` VALUES(1479, 'Le Cellier - La Robinière', 'StopArea:LIL1112');
INSERT INTO `lilas` VALUES(1480, 'Le Cellier - La Maison Neuve', 'StopArea:LIL1111');
INSERT INTO `lilas` VALUES(1481, 'Mauves-sur-Loire - La Maison Blanche', 'StopArea:LIL1116');
INSERT INTO `lilas` VALUES(1482, 'Mauves-sur-Loire - La Chesnaye', 'StopArea:LIL1113');
INSERT INTO `lilas` VALUES(1483, 'Mauves-sur-Loire - La Croix', 'StopArea:LIL1114');
INSERT INTO `lilas` VALUES(1484, 'Carquefou - La Seilleraye', 'StopArea:LIL1117');
INSERT INTO `lilas` VALUES(1485, 'Mauves-sur-Loire - Le petit plessis', 'StopArea:LIL202');
INSERT INTO `lilas` VALUES(1486, 'Mauves-sur-Loire - La Barre', 'StopArea:LIL1308');
INSERT INTO `lilas` VALUES(1487, 'Mauves-sur-Loire - Le pontereau', 'StopArea:LIL1115');
INSERT INTO `lilas` VALUES(1488, 'Mauves-sur-Loire - La droitière', 'StopArea:LIL186');
INSERT INTO `lilas` VALUES(1489, 'Le Cellier - Les Thébaudières', 'StopArea:LIL738');
INSERT INTO `lilas` VALUES(1490, 'Le Cellier - Les Mazères', 'StopArea:LIL1103');
INSERT INTO `lilas` VALUES(1491, 'Le Cellier - Champbriant', 'StopArea:LIL56');
INSERT INTO `lilas` VALUES(1492, 'Le Cellier - La Babonnière', 'StopArea:LIL1104');
INSERT INTO `lilas` VALUES(1493, 'Le Cellier - Route de Vandel', 'StopArea:LIL1102');
INSERT INTO `lilas` VALUES(1494, 'Le Cellier - Vandel', 'StopArea:LIL372');
INSERT INTO `lilas` VALUES(1495, 'Le Cellier - Le Plantis', 'StopArea:LIL1105');
INSERT INTO `lilas` VALUES(1496, 'Savenay - Pont de quinze mètres', 'StopArea:LIL1064');
INSERT INTO `lilas` VALUES(1497, 'Malville - Boue le Chaillereau', 'StopArea:LIL28');
INSERT INTO `lilas` VALUES(1498, 'Malville - La Noé', 'StopArea:LIL1061');
INSERT INTO `lilas` VALUES(1499, 'Bourgneuf-en-Retz - Le Louaret', 'StopArea:LIL1060');
INSERT INTO `lilas` VALUES(1500, 'Cordemais - Croix-de-Morzelle RD-17', 'StopArea:LIL1058');
INSERT INTO `lilas` VALUES(1501, 'Cordemais - Croix-de-Bauche', 'StopArea:LIL1055');
INSERT INTO `lilas` VALUES(1502, 'Saint-Étienne-de-Montluc - Haie-Maheas', 'StopArea:LIL1043');
INSERT INTO `lilas` VALUES(1503, 'Saint-Étienne-de-Montluc - Bois-Alix', 'StopArea:LIL1051');
INSERT INTO `lilas` VALUES(1504, 'Saint-Étienne-de-Montluc - La Rouillonnais', 'StopArea:LIL1045');
INSERT INTO `lilas` VALUES(1505, 'Saint-Étienne-de-Montluc - Le Chêne Creux', 'StopArea:LIL67');
INSERT INTO `lilas` VALUES(1506, 'Saint-Étienne-de-Montluc - Quiételais', 'StopArea:LIL1044');
INSERT INTO `lilas` VALUES(1507, 'Couëron - La Garneraie', 'StopArea:LIL1144');
INSERT INTO `lilas` VALUES(1508, 'Couëron - Saint-Blais', 'StopArea:LIL1143');
INSERT INTO `lilas` VALUES(1509, 'Couëron - La Montagne', 'StopArea:LIL1182');
INSERT INTO `lilas` VALUES(1510, 'Couëron - La Potence', 'StopArea:LIL1142');
INSERT INTO `lilas` VALUES(1511, 'Saint-Herblain - Pan Loup', 'StopArea:LIL1258');
INSERT INTO `lilas` VALUES(1512, 'Saint-Herblain - La Rousselière', 'StopArea:LIL1145');
INSERT INTO `lilas` VALUES(1513, 'Saint-Herblain - Chauvinière', 'StopArea:LIL1146');
INSERT INTO `lilas` VALUES(1514, 'Saint-Herblain - Maison Blanche', 'StopArea:LIL1183');
INSERT INTO `lilas` VALUES(1515, 'Saint-Étienne-de-Montluc - Route du Temple', 'StopArea:LIL1053');
INSERT INTO `lilas` VALUES(1516, 'Saint-Étienne-de-Montluc - Plessis de l''Angle', 'StopArea:LIL1054');
INSERT INTO `lilas` VALUES(1517, 'Saint-Étienne-de-Montluc - Petit Rouillonnais', 'StopArea:LIL1046');
INSERT INTO `lilas` VALUES(1518, 'Saint-Étienne-de-Montluc - Ecole du Gaz', 'StopArea:LIL1048');
INSERT INTO `lilas` VALUES(1519, 'Riaillé - La Noé', 'StopArea:LIL1126');
INSERT INTO `lilas` VALUES(1520, 'Pannecé - Caquereau', 'StopArea:LIL1125');
INSERT INTO `lilas` VALUES(1521, 'Teillé - Rue du Pont', 'StopArea:LIL1123');
INSERT INTO `lilas` VALUES(1522, 'Mouzeil - La Chapelle Breton', 'StopArea:LIL1121');
INSERT INTO `lilas` VALUES(1523, 'Ligné - Bel Air', 'StopArea:LIL1077');
INSERT INTO `lilas` VALUES(1524, 'Ligné - La Tréluère', 'StopArea:LIL1088');
INSERT INTO `lilas` VALUES(1525, 'Saint-Mars-du-Désert - Pinsoison', 'StopArea:LIL1283');
INSERT INTO `lilas` VALUES(1526, 'Saint-Mars-du-Désert - La Goulière', 'StopArea:LIL1086');
INSERT INTO `lilas` VALUES(1527, 'Saint-Mars-du-Désert - Longrais', 'StopArea:LIL1175');
INSERT INTO `lilas` VALUES(1528, 'Saint-Mars-du-Désert - Le Perray', 'StopArea:LIL1084');
INSERT INTO `lilas` VALUES(1529, 'Saint-Mars-du-Désert - Mercerie', 'StopArea:LIL1177');
INSERT INTO `lilas` VALUES(1530, 'Carquefou - L''Epeau', 'StopArea:LIL1082');
INSERT INTO `lilas` VALUES(1531, 'La Planche - L''Audonnière', 'StopArea:LIL1137');
INSERT INTO `lilas` VALUES(1532, 'La Planche - Cinq Routes', 'StopArea:LIL1133');
INSERT INTO `lilas` VALUES(1533, 'La Planche - Centre', 'StopArea:LIL286');
INSERT INTO `lilas` VALUES(1534, 'La Planche - Le Noyer', 'StopArea:LIL1135');
INSERT INTO `lilas` VALUES(1535, 'La Planche - Nonnaire', 'StopArea:LIL1132');
INSERT INTO `lilas` VALUES(1536, 'Montbert - L''Hommeau', 'StopArea:LIL1128');
INSERT INTO `lilas` VALUES(1537, 'Le Gâvre - Rd Point De La Belle Etoile', 'StopArea:LIL1239');
INSERT INTO `lilas` VALUES(1538, 'Le Gâvre - Maillardais', 'StopArea:LIL1238');
INSERT INTO `lilas` VALUES(1539, 'Fay-de-Bretagne - La Ridelais', 'StopArea:LIL1141');
INSERT INTO `lilas` VALUES(1540, 'Fay-de-Bretagne - La Porte du Gué-Géraud', 'StopArea:LIL1138');
INSERT INTO `lilas` VALUES(1541, 'Notre-Dame-des-Landes - L'' Arche du Fouan', 'StopArea:LIL1181');
INSERT INTO `lilas` VALUES(1542, 'Vigneux-de-Bretagne - La Boissière', 'StopArea:LIL1038');
INSERT INTO `lilas` VALUES(1543, 'Vigneux-de-Bretagne - Le Bois Rignoux', 'StopArea:LIL1173');
INSERT INTO `lilas` VALUES(1544, 'Vigneux-de-Bretagne - La Bouvardière', 'StopArea:LIL1172');
INSERT INTO `lilas` VALUES(1545, 'Vigneux-de-Bretagne - Cinq Chemins de Valais', 'StopArea:LIL1037');
INSERT INTO `lilas` VALUES(1546, 'Vigneux-de-Bretagne - La Chouamétrie', 'StopArea:LIL1036');
INSERT INTO `lilas` VALUES(1547, 'Vigneux-de-Bretagne - La Plée', 'StopArea:LIL1041');
INSERT INTO `lilas` VALUES(1548, 'Orvault - Chatillon', 'StopArea:LIL909');
INSERT INTO `lilas` VALUES(1549, 'La Baule-Escoublac - Flandin', 'StopArea:LIL556');
INSERT INTO `lilas` VALUES(1550, 'Guérande - Careil', 'StopArea:LIL519');
INSERT INTO `lilas` VALUES(1551, 'Guérande - La Nantaise', 'StopArea:LIL507');
INSERT INTO `lilas` VALUES(1552, 'Guérande - Ville James', 'StopArea:LIL526');
INSERT INTO `lilas` VALUES(1553, 'Guérande - Boulevard du Midi', 'StopArea:LIL510');
INSERT INTO `lilas` VALUES(1554, 'Herbignac - Kerlibérin', 'StopArea:LIL1293');
INSERT INTO `lilas` VALUES(1555, 'Saint-Lyphard - Calvaire', 'StopArea:LIL535');
INSERT INTO `lilas` VALUES(1556, 'Saint-Lyphard - Le Mouchoir', 'StopArea:LIL531');
INSERT INTO `lilas` VALUES(1557, 'Saint-Lyphard - Le Brunet', 'StopArea:LIL530');
INSERT INTO `lilas` VALUES(1558, 'Saint-Lyphard - Kerhinet', 'StopArea:LIL529');
INSERT INTO `lilas` VALUES(1559, 'Guérande - Cogéa', 'StopArea:LIL508');
INSERT INTO `lilas` VALUES(1560, 'Saint-Nazaire - Z.I. de Brais', 'StopArea:LIL1215');
INSERT INTO `lilas` VALUES(1561, 'Saint-Nazaire - Commandières', 'StopArea:LIL1230');
INSERT INTO `lilas` VALUES(1562, 'Châteaubriant - Route d''Angers', 'StopArea:LIL316');
INSERT INTO `lilas` VALUES(1563, 'Châteaubriant - Centre Commercial (Rue B.Franklin)', 'StopArea:LIL49');
INSERT INTO `lilas` VALUES(1564, 'Châteaubriant - Centre Commercial (Rue G.Eisenhower)', 'StopArea:LIL50');
INSERT INTO `lilas` VALUES(1565, 'Châteaubriant - Centre Commercial Vent d''Ouest', 'StopArea:LIL240');
INSERT INTO `lilas` VALUES(1566, 'Châteaubriant - République', 'StopArea:LIL320');
INSERT INTO `lilas` VALUES(1567, 'Châteaubriant - Rue de Verdun', 'StopArea:LIL1209');
INSERT INTO `lilas` VALUES(1568, 'Châteaubriant - Hôpital', 'StopArea:LIL141');
INSERT INTO `lilas` VALUES(1569, 'Saint-Molf - Mairie', 'StopArea:LIL594');
INSERT INTO `lilas` VALUES(1570, 'Saint-Nazaire - Polyclinique', 'StopArea:LIL403');
INSERT INTO `lilas` VALUES(1571, 'La Baule-Escoublac - Palmiers', 'StopArea:LIL559');
INSERT INTO `lilas` VALUES(1572, 'La Baule-Escoublac - GARE SNCF Les Pins', 'StopArea:LIL788');
INSERT INTO `lilas` VALUES(1573, 'Le Pouliguen - Sterwitz', 'StopArea:LIL670');
INSERT INTO `lilas` VALUES(1574, 'Le Pouliguen - Korrigans', 'StopArea:LIL677');
INSERT INTO `lilas` VALUES(1575, 'Le Croisic - Gare SNCF', 'StopArea:LIL619');
INSERT INTO `lilas` VALUES(1576, 'Guérande - Petit-Poissevin', 'StopArea:LIL740');
INSERT INTO `lilas` VALUES(1577, 'La Turballe - Pigeon Blanc', 'StopArea:LIL703');
INSERT INTO `lilas` VALUES(1578, 'Mesquer - ZA de Kergoulinet', 'StopArea:LIL1193');
INSERT INTO `lilas` VALUES(1579, 'Mesquer - Kerlagadec', 'StopArea:LIL720');
INSERT INTO `lilas` VALUES(1580, 'Mesquer - Trevigale', 'StopArea:LIL718');
INSERT INTO `lilas` VALUES(1581, 'Mesquer - Le Lany', 'StopArea:LIL719');
INSERT INTO `lilas` VALUES(1582, 'Mesquer - Promota', 'StopArea:LIL1192');
INSERT INTO `lilas` VALUES(1583, 'Mesquer - Quimiac', 'StopArea:LIL711');
INSERT INTO `lilas` VALUES(1584, 'Mesquer - Ecole', 'StopArea:LIL1194');
INSERT INTO `lilas` VALUES(1585, 'La Turballe - Garlahy', 'StopArea:LIL606');
INSERT INTO `lilas` VALUES(1586, 'Piriac-sur-Mer - Sissac', 'StopArea:LIL604');
INSERT INTO `lilas` VALUES(1587, 'Piriac-sur-Mer - Kervin', 'StopArea:LIL602');
INSERT INTO `lilas` VALUES(1588, 'Piriac-sur-Mer - Grain', 'StopArea:LIL600');
INSERT INTO `lilas` VALUES(1589, 'Le Croisic - Océarium', 'StopArea:LIL632');
INSERT INTO `lilas` VALUES(1590, 'Le Croisic - Pierre Longue', 'StopArea:LIL1304');
INSERT INTO `lilas` VALUES(1591, 'Le Croisic - Sable Menu', 'StopArea:LIL621');
INSERT INTO `lilas` VALUES(1592, 'Le Pouliguen - korrigans', 'StopArea:LIL620');

-- --------------------------------------------------------

--
-- Structure de la table `parkings`
--

CREATE TABLE `parkings` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `parkings`
--

INSERT INTO `parkings` VALUES(1, 'DECRE-BOUFFAY');
INSERT INTO `parkings` VALUES(2, 'TOUR DE BRETAGNE');
INSERT INTO `parkings` VALUES(3, 'ARISTIDE BRIAND');
INSERT INTO `parkings` VALUES(4, 'MEDIATHEQUE');
INSERT INTO `parkings` VALUES(5, 'COMMERCE');
INSERT INTO `parkings` VALUES(6, 'TALENSAC');
INSERT INTO `parkings` VALUES(7, 'CITE INT DES CONGRES');
INSERT INTO `parkings` VALUES(8, 'CATHEDRALE');
INSERT INTO `parkings` VALUES(9, 'LES MACHINES');
INSERT INTO `parkings` VALUES(10, 'BACO-LU');
INSERT INTO `parkings` VALUES(11, 'FEYDEAU');
INSERT INTO `parkings` VALUES(12, 'HOTEL DIEU');
INSERT INTO `parkings` VALUES(13, 'GARE SUD 2 LIMITE 1 HEURE');
INSERT INTO `parkings` VALUES(14, 'C.H.U');
INSERT INTO `parkings` VALUES(15, 'GRASLIN');
INSERT INTO `parkings` VALUES(16, 'GARE NORD');
INSERT INTO `parkings` VALUES(17, 'GARE SUD 1');
INSERT INTO `parkings` VALUES(18, 'GARE SUD 2');
INSERT INTO `parkings` VALUES(19, 'GARE SUD 3');
INSERT INTO `parkings` VALUES(20, 'BELLAMY');
INSERT INTO `parkings` VALUES(21, 'CHATEAU');
INSERT INTO `parkings` VALUES(22, 'VIVIANI');
INSERT INTO `parkings` VALUES(23, 'GARE SUD 4');

-- --------------------------------------------------------

--
-- Structure de la table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `widget_id` int(11) NOT NULL,
  `upage_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=364 ;

--
-- Contenu de la table `positions`
--

INSERT INTO `positions` VALUES(6, 106, 1, 295);
INSERT INTO `positions` VALUES(56, 168, 2, 0);
INSERT INTO `positions` VALUES(57, 169, 2, 1);
INSERT INTO `positions` VALUES(58, 170, 2, 2);
INSERT INTO `positions` VALUES(73, 185, 6, 0);
INSERT INTO `positions` VALUES(74, 186, 6, 1);
INSERT INTO `positions` VALUES(75, 187, 6, 2);
INSERT INTO `positions` VALUES(76, 188, 5, 0);
INSERT INTO `positions` VALUES(77, 189, 5, 1);
INSERT INTO `positions` VALUES(78, 190, 5, 1);
INSERT INTO `positions` VALUES(99, 211, 10, 0);
INSERT INTO `positions` VALUES(177, 289, 1, 0);
INSERT INTO `positions` VALUES(191, 303, 4, 0);
INSERT INTO `positions` VALUES(192, 304, 5, 1);
INSERT INTO `positions` VALUES(193, 305, 5, 1);
INSERT INTO `positions` VALUES(194, 306, 6, 1);
INSERT INTO `positions` VALUES(195, 307, 7, 0);
INSERT INTO `positions` VALUES(196, 308, 2, 1);
INSERT INTO `positions` VALUES(197, 309, 2, 1);
INSERT INTO `positions` VALUES(198, 310, 2, 1);
INSERT INTO `positions` VALUES(199, 311, 9, 0);
INSERT INTO `positions` VALUES(200, 312, 9, 1);
INSERT INTO `positions` VALUES(201, 313, 9, 1);
INSERT INTO `positions` VALUES(202, 314, 9, 3);
INSERT INTO `positions` VALUES(278, 390, 11, 0);
INSERT INTO `positions` VALUES(285, 397, 1, 1);
INSERT INTO `positions` VALUES(294, 406, 1, 12);
INSERT INTO `positions` VALUES(346, 458, 1, 8);
INSERT INTO `positions` VALUES(354, 466, 1, 11);
INSERT INTO `positions` VALUES(360, 472, 1, 2);
INSERT INTO `positions` VALUES(361, 473, 8, 0);
INSERT INTO `positions` VALUES(362, 474, 1, 4);
INSERT INTO `positions` VALUES(363, 475, 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `tans`
--

CREATE TABLE `tans` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `idTan` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `couleur` varchar(6) NOT NULL,
  `sens_1` varchar(255) NOT NULL,
  `sens_2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=132 ;

--
-- Contenu de la table `tans`
--

INSERT INTO `tans` VALUES(1, '1', '1', '44794a', 'François Mitterand', 'Beaujoire');
INSERT INTO `tans` VALUES(2, '2', '2', 'c5343a', 'Orvault Grand Val', 'Gare de Pont Rousseau');
INSERT INTO `tans` VALUES(3, '3', '3', '4377b8', 'Marcel Paul', 'Neustrie');
INSERT INTO `tans` VALUES(4, '4', '4', 'ffcc33', 'Foch - Cathédrale', 'Porte de Vertou');
INSERT INTO `tans` VALUES(11, '11', '11', '9b6fa9', 'Tertre', 'Perray');
INSERT INTO `tans` VALUES(12, '12', '12', 'b5ddf3', 'Colinière', 'Beauséjour');
INSERT INTO `tans` VALUES(21, '21', '21', '34b4e3', 'Perray', 'Gare de Chantenay');
INSERT INTO `tans` VALUES(23, '23', '23', '34b4e3', 'Haluchère', 'Mendès France Bellevue');
INSERT INTO `tans` VALUES(25, '25', '25', 'ffed00', 'Ecole Centrale - Audencia', 'Gare de Chantenay');
INSERT INTO `tans` VALUES(26, '26', '26', '387e28', 'Jonelière', 'Hôtel de Région');
INSERT INTO `tans` VALUES(27, '27', '27', 'b5ddf3', 'La Herdrie', 'Pirmil');
INSERT INTO `tans` VALUES(28, '28', '28', 'b5ddf3', 'Vertou', 'Pirmil');
INSERT INTO `tans` VALUES(29, '29', '29', 'f5bac5', 'La Herdrie', 'Pirmil');
INSERT INTO `tans` VALUES(30, '30', '30', 'ffed00', 'Savarières', 'Trentemoult');
INSERT INTO `tans` VALUES(32, '32', '32', 'ed7703', 'Bout des Landes', 'Commerce');
INSERT INTO `tans` VALUES(33, '33', '33', 'f5bac5', 'Robinière /Aufrère', 'Espace Diderot');
INSERT INTO `tans` VALUES(36, '36', '36', '00a4a7', 'Gréneraie', 'Croix Jeannette');
INSERT INTO `tans` VALUES(39, '39', '39', 'f5bac5', 'Chalonges', 'Pirmil');
INSERT INTO `tans` VALUES(41, '41', 'Express Couëron', 'c5343a', 'Gare Maritime', 'Couëron');
INSERT INTO `tans` VALUES(42, '42', '42', 'c0d684', 'Vertou', 'Commerce');
INSERT INTO `tans` VALUES(44, '44', 'Express Vertou', 'c5343a', 'Porte de Vertou', 'Vertou');
INSERT INTO `tans` VALUES(46, '46', 'Express Carquefou', 'c5343a', 'Carquefou', 'Haluchère');
INSERT INTO `tans` VALUES(47, '47', '47', 'beabd0', 'Pégers / Grande Noëlle', 'Vertou');
INSERT INTO `tans` VALUES(49, '49', 'Express Le Pellerin', 'c5343a', 'Gréneraie', 'Le Pellerin');
INSERT INTO `tans` VALUES(54, '54', '54', 'c0d684', 'Marcel Paul', 'Commerce');
INSERT INTO `tans` VALUES(59, '59', '59', 'f5bac5', 'Mendès France - Bellevue', 'Bout des Landes');
INSERT INTO `tans` VALUES(67, '67', '67', '13387e', 'Le Cellier', 'Centre de Thouaré');
INSERT INTO `tans` VALUES(68, '68', '68', '13387e', 'St-Aignan de Grand Lieu', 'Brains');
INSERT INTO `tans` VALUES(70, '70', '70', 'ffed00', 'Gare de Chantenay', 'Bd de Doulon');
INSERT INTO `tans` VALUES(73, '73', '73', 'ffe52b', 'Basse Indre', 'Rivière');
INSERT INTO `tans` VALUES(74, '74', '74', 'c0d684', 'Mendès France - Bellevue', 'Neustrie');
INSERT INTO `tans` VALUES(75, '75', '75', 'ddb67b', 'Charbonneau', 'Facultés');
INSERT INTO `tans` VALUES(77, '77', '77', '8bc9ea', 'Collège Sables d''Or', 'Haluchère');
INSERT INTO `tans` VALUES(79, '79', '79', 'f5bac5', 'Les Anges', 'Beauséjour');
INSERT INTO `tans` VALUES(80, '80', '80', 'ffe52b', 'Chassay / Bellevue', 'Fac de Droit');
INSERT INTO `tans` VALUES(81, '81', '81', '00a4a7', 'Mendès France - Bellevue', 'Gare Maritime');
INSERT INTO `tans` VALUES(84, '84', '84', 'c0d684', 'Sinière', 'Hermeland');
INSERT INTO `tans` VALUES(85, '85', '85', 'f5bac5', 'Bois St-Lys', 'Haluchère');
INSERT INTO `tans` VALUES(86, '86', '86', '34b4e3', 'Perrières / Coutancière ', 'Bout des Pavés');
INSERT INTO `tans` VALUES(87, '87', '87', 'eca52f', 'Le Halleray', 'Toutes Aides');
INSERT INTO `tans` VALUES(88, '88', '88', 'eca52f', 'Bouaye / Brains / St-Léger', 'Neustrie');
INSERT INTO `tans` VALUES(89, '89', '89', '7298if', 'Le Cardo', 'Beauséjour');
INSERT INTO `tans` VALUES(90, '90', '90', 'c0893a', 'Sautron', 'Orvault - Morlière');
INSERT INTO `tans` VALUES(91, '91', '91', '009534', 'Bac de Couëron / Couëron Bougon', 'Mendès France - Bellevue ');
INSERT INTO `tans` VALUES(93, '93', '93', '00a4a7', 'Hôpital Laënnec', 'Hauts de Couëron');
INSERT INTO `tans` VALUES(95, '95', '95', 'c0d684', 'Souchais', 'Haluchère');
INSERT INTO `tans` VALUES(96, '96', '96', 'f8b323', 'L''Aulnay', 'Beauséjour');
INSERT INTO `tans` VALUES(97, '97', '97', 'beabd0', 'Vertou', 'Trentemoult');
INSERT INTO `tans` VALUES(98, '98', '98', 'f8b323', 'St-Aignan de Grand-Lieu', 'Gréneraie');
INSERT INTO `tans` VALUES(99, '99', '99', 'f8b323', 'Bac du Pellerin', 'Neustrie');
INSERT INTO `tans` VALUES(110, 'NA', 'Navibus Trentemoult - Gare Maritime', '13387e', 'Nantes Atlantique', 'Commerce');
INSERT INTO `tans` VALUES(111, 'NL', 'Navibus Port Boyer - Facultés', '13387e', 'Trentemoult - Roquios', 'Gare Maritime');
INSERT INTO `tans` VALUES(121, 'C1', 'C1', '41A3D9', 'Haluchère', 'Gare de Chantenay');
INSERT INTO `tans` VALUES(122, 'C2', 'C2', 'D86B23', 'Le Cardo', 'Commerce');
INSERT INTO `tans` VALUES(123, 'C3', 'C3', 'ECA52F', 'Bd de la Baule/Mairie St Herblain', 'Malakoff');
INSERT INTO `tans` VALUES(124, 'C4', 'C4', '72981C', 'Les Sorinières', 'Gréneraie');
INSERT INTO `tans` VALUES(125, 'C5', 'C5', 'aed4ed', 'Quai des Antilles', 'Gare SNCF Sud');
INSERT INTO `tans` VALUES(126, 'C6', 'C6', 'ac9ec4', 'Chantrerie Grandes Ecoles', 'Hermeland');
INSERT INTO `tans` VALUES(127, 'C7', 'C7', 'b8c133', 'Trianon', 'Souillarderie');
INSERT INTO `tans` VALUES(128, 'E1', 'E1', 'c93536', 'Couëron', 'Gare Maritime');
INSERT INTO `tans` VALUES(129, 'E4', 'E4', 'c93536', 'Porte de Vertou', 'Vertou');
INSERT INTO `tans` VALUES(130, 'E5', 'E5', 'c93536', 'Carquefou', 'Fac de Droit');
INSERT INTO `tans` VALUES(131, 'E8', 'E8', 'c93536', 'Le Pellerin', 'Greneraie');

-- --------------------------------------------------------

--
-- Structure de la table `upages`
--

CREATE TABLE `upages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `upages`
--

INSERT INTO `upages` VALUES(1, 'Accueil', 25);
INSERT INTO `upages` VALUES(2, 'Accueil', 1);
INSERT INTO `upages` VALUES(4, 'Environnement', 1);
INSERT INTO `upages` VALUES(5, 'Transports', 1);
INSERT INTO `upages` VALUES(6, 'Parkings', 1);
INSERT INTO `upages` VALUES(7, 'Actualités', 1);
INSERT INTO `upages` VALUES(8, 'Transports', 25);
INSERT INTO `upages` VALUES(9, 'Accueil', 26);
INSERT INTO `upages` VALUES(11, 'Demo', 25);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(3) NOT NULL,
  `end_premium` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` VALUES(1, 'Noname', 'Noname', 'noname@foglo.fr', '52a5215e2b2a7733d9c61bcfbeb93cf5375738b3', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2012-05-07 20:36:12', 0);
INSERT INTO `users` VALUES(25, 'admin', 'admin', 'admin@foglo.fr', '908ac03e60f9cf49099f4cb48b96fe6bace4ec9b', 1, '2012-07-01 12:00:00', '2012-04-05 20:22:30', '2013-12-21 15:01:26', 0);
INSERT INTO `users` VALUES(26, 'user', 'user', 'user@foglo.fr', '52a5215e2b2a7733d9c61bcfbeb93cf5375738b3', 2, '2012-08-31 12:00:00', '2012-05-12 10:02:06', '2013-12-21 15:04:12', 0);

-- --------------------------------------------------------

--
-- Structure de la table `widgets`
--

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` int(3) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `upage_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `disabled` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=476 ;

--
-- Contenu de la table `widgets`
--

INSERT INTO `widgets` VALUES(289, 25, 'horloge', 0, '', 1, '2012-06-03 18:01:51', '2012-06-03 18:01:51', 0);
INSERT INTO `widgets` VALUES(303, 1, 'ecolo', 0, '', 4, '2012-07-14 12:45:47', '2012-07-14 12:45:54', 0);
INSERT INTO `widgets` VALUES(304, 1, 'parkings', 0, '', 5, '2012-07-14 12:46:04', '2012-07-14 12:46:07', 0);
INSERT INTO `widgets` VALUES(305, 1, 'tan', 0, '', 5, '2012-07-14 12:46:11', '2012-07-14 12:46:23', 0);
INSERT INTO `widgets` VALUES(306, 1, 'parkings', 0, '', 6, '2012-07-14 12:46:39', '2012-07-14 12:46:44', 0);
INSERT INTO `widgets` VALUES(307, 1, 'twitter', 0, '', 7, '2012-07-14 12:46:54', '2012-07-14 12:47:01', 0);
INSERT INTO `widgets` VALUES(308, 1, 'meteo', 0, '', 2, '2012-07-14 12:47:23', '2012-07-14 12:47:26', 0);
INSERT INTO `widgets` VALUES(309, 1, 'tan', 0, '', 2, '2012-07-14 12:47:29', '2012-07-14 12:47:41', 0);
INSERT INTO `widgets` VALUES(310, 1, 'parkings', 0, '', 2, '2012-07-14 12:47:46', '2012-07-14 12:47:50', 0);
INSERT INTO `widgets` VALUES(390, 25, 'tan', 0, '', 11, '2012-08-03 14:49:51', '2012-08-03 14:49:51', 0);
INSERT INTO `widgets` VALUES(397, 25, 'parkings', 0, '', 1, '2012-08-15 22:52:29', '2012-08-28 16:24:28', 0);
INSERT INTO `widgets` VALUES(406, 25, 'rss', 0, '', 1, '2012-08-19 12:15:09', '2013-02-24 10:20:11', 0);
INSERT INTO `widgets` VALUES(458, 25, 'tan', 0, '', 1, '2012-08-26 23:17:33', '2013-11-01 22:32:33', 0);
INSERT INTO `widgets` VALUES(466, 25, 'facebook', 0, '', 1, '2012-08-28 16:24:33', '2012-08-29 08:51:57', 0);
INSERT INTO `widgets` VALUES(472, 25, 'meteo', 0, '', 1, '2012-09-17 21:43:38', '2012-09-17 22:09:12', 0);
INSERT INTO `widgets` VALUES(473, 25, 'tan', 0, '', 8, '2012-10-10 19:38:07', '2012-10-11 10:18:25', 0);
INSERT INTO `widgets` VALUES(474, 25, 'twitter', 0, '', 1, '2013-11-01 22:33:40', '2013-11-01 22:33:40', 0);
INSERT INTO `widgets` VALUES(475, 25, 'air', 0, '', 1, '2013-11-01 22:35:51', '2013-11-01 22:35:51', 0);

-- --------------------------------------------------------

--
-- Structure de la table `bicloo_stations`
--

CREATE TABLE IF NOT EXISTS `bicloo_stations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `station` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bike_stands` int(11) NOT NULL,
  `available_bike_stands` int(11) NOT NULL,
  `available_bikes` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `bicloo_stations`
--

INSERT INTO `bicloo_stations` (`id`, `station`, `name`, `bike_stands`, `available_bike_stands`, `available_bikes`, `last_update`) VALUES
(1, 84, 'RÉGION', 19, 14, 5, '2014-01-11 00:28:09'),
(2, 38, 'PLACE RICORDEAU', 40, 38, 2, '2014-01-11 00:28:09');
