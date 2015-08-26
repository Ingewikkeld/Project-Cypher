<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version20140610181549 extends AbstractMigration {
    public function up(Schema $schema) {
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `advertisements` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT ' Uniek id',
	  `name` varchar(50) NOT NULL COMMENT 'De naam waaraan deze advertentie in het systeem herkend kan worden',
	  `type` varchar(10) DEFAULT NULL COMMENT ' Het type advertentie: ''tekst'' of ''afbeelding''. Bij afbeelding kun je aan een banner denken',
	  `message` varchar(255) NOT NULL COMMENT ' De tekst welke in de advertentie dient te staan.',
	  `start_including` datetime NOT NULL COMMENT ' Startdatum en -tijd waarop deze advertentie ingevoegd mag worden in berichten en/of pagina''s',
	  `end_including` datetime NOT NULL COMMENT ' Eindatum en tijd waarop deze advertentie niet meer ingevoegd mag worden in berichten en/of pagina''s',
	  `times_included_mail` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT ' Deze waarde geeft aan hoe vaak deze advertentie in een email is toegevoegd',
	  `times_included_page` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT ' Deze waarde geeft aan hoe vaak deze advertentie op een pagina is getoond',
	  `zipcode` varchar(6) DEFAULT NULL,
	  `gemeente` varchar(255) DEFAULT NULL,
	  `lon` float(20,15) NOT NULL,
	  `lat` float(20,15) DEFAULT NULL,
	  `created` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop de advertentie aangemaakt werd (wordt automatisch gevuld)',
	  `modified` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop de advertentie voor het laatst gewijzigd werd (wordt automatisch gevuld) ',
	  `deleted` datetime DEFAULT NULL COMMENT ' Datum/tijd van het moment waarop de advertentie verwijderd werd ',
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `created` (`created`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `biddings` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `user_id` int(10) unsigned NOT NULL COMMENT 'Uniek id',
	  `post_id` int(10) unsigned NOT NULL COMMENT ' Uniek id',
	  `amount` float(9,2) unsigned NOT NULL,
	  `created` datetime NOT NULL,
	  `modified` date NOT NULL,
	  PRIMARY KEY (`id`),
	  KEY `post_id` (`post_id`),
	  KEY `user_id_fk` (`user_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `cities` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `woonplaats_id` int(10) unsigned NOT NULL,
	  `woonplaatsnaam` varchar(255) NOT NULL,
	  `gemeente_id` int(10) unsigned NOT NULL,
	  `gemeentenaam` varchar(255) NOT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `woonplaats_id` (`woonplaats_id`),
	  UNIQUE KEY `gemeente_id` (`gemeente_id`),
	  UNIQUE KEY `woonplaats_gemeente_uniek` (`woonplaats_id`,`gemeente_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	
	AbstractMigration::_addsql("
	INSERT INTO `cities` (`id`, `woonplaats_id`, `woonplaatsnaam`, `gemeente_id`, `gemeentenaam`) VALUES
	(1, 1000, 'Hoogerheide', 873, 'Woensdrecht'),
	(2, 1005, 'Gouda', 513, 'Gouda'),
	(3, 1006, 'Waalre', 866, 'Waalre'),
	(4, 1007, 'Middelburg', 687, 'Middelburg'),
	(5, 1010, 'Etten-Leur', 777, 'Etten-Leur'),
	(6, 1011, 'Huizen', 406, 'Huizen'),
	(7, 1012, 'Weesp', 457, 'Weesp'),
	(8, 1013, 'Soest', 342, 'Soest'),
	(9, 1015, 'Vlaardingen', 622, 'Vlaardingen'),
	(10, 1016, 'Nieuwerkerk aan den IJssel', 1892, 'Zuidplas'),
	(11, 1017, 'Foxhol', 18, 'Hoogezand-Sappemeer'),
	(12, 1024, 'Amsterdam', 363, 'Amsterdam'),
	(13, 1026, 'America', 1507, 'Horst aan de Maas'),
	(14, 1036, 'Hilversum', 402, 'Hilversum'),
	(15, 1037, 'Eemnes', 317, 'Eemnes'),
	(16, 1038, 'Daarle', 163, 'Hellendoorn'),
	(17, 1043, 'Tilburg', 855, 'Tilburg'),
	(18, 1046, 'Staphorst', 180, 'Staphorst'),
	(19, 1050, 'Amstelveen', 362, 'Amstelveen'),
	(20, 1051, 'Lelystad', 995, 'Lelystad'),
	(21, 1052, 'Naarden', 425, 'Naarden'),
	(22, 1053, 'Andijk', 420, 'Medemblik'),
	(23, 1054, 'Barneveld', 203, 'Barneveld'),
	(24, 1064, 'Bladel', 1728, 'Bladel'),
	(25, 1069, 'Maassluis', 556, 'Maassluis'),
	(26, 1070, 'Groningen', 14, 'Groningen'),
	(27, 1071, 'Woerden', 632, 'Woerden'),
	(28, 1075, 'Zeewolde', 50, 'Zeewolde'),
	(29, 1076, 'Oost-Souburg', 718, 'Vlissingen'),
	(30, 1079, 'Aarlanderveen', 484, 'Alphen aan den Rijn'),
	(31, 1082, 'Meppel', 119, 'Meppel'),
	(32, 1087, 'Wierden', 189, 'Wierden'),
	(33, 1092, 'Baarn', 308, 'Baarn'),
	(34, 1094, 'Dodewaard', 1740, 'Neder-Betuwe'),
	(35, 1100, 'Valkenswaard', 858, 'Valkenswaard'),
	(36, 1101, 'Eindhoven', 772, 'Eindhoven'),
	(37, 1102, 'Bovenkarspel', 532, 'Stede Broec'),
	(38, 1105, 'Capelle aan den IJssel', 502, 'Capelle aan den IJssel'),
	(39, 1108, 'Nieuwegein', 356, 'Nieuwegein'),
	(40, 1109, 'Empe', 213, 'Brummen'),
	(41, 1115, 'Sint Pancras', 416, 'Langedijk'),
	(42, 1121, 'Bergen L', 893, 'Bergen (L)'),
	(43, 1126, 'Geldrop', 1771, 'Geldrop-Mierlo'),
	(44, 1128, 'Axel', 715, 'Terneuzen'),
	(45, 1141, 'Pijnacker', 1926, 'Pijnacker-Nootdorp'),
	(46, 1144, 'Krimpen aan den IJssel', 542, 'Krimpen aan den IJssel'),
	(47, 1145, 'Enschede', 153, 'Enschede'),
	(48, 1146, 'Helmond', 794, 'Helmond'),
	(49, 1147, 'Amen', 1680, 'Aa en Hunze'),
	(50, 1182, 'Zwolle', 193, 'Zwolle'),
	(51, 1183, 'Avenhorn', 1598, 'Koggenland'),
	(52, 1193, 'Aalten', 197, 'Aalten'),
	(53, 1198, 'Lekkum', 80, 'Leeuwarden'),
	(54, 1207, 'Oirschot', 823, 'Oirschot'),
	(55, 1209, 'Oostvoorne', 614, 'Westvoorne'),
	(56, 1214, 'Beugen', 756, 'Boxmeer'),
	(57, 1225, 'Gulpen', 1729, 'Gulpen-Wittem'),
	(58, 1237, 'Dalfsen', 148, 'Dalfsen'),
	(59, 1240, 'Veendam', 47, 'Veendam'),
	(60, 1243, 'Heiloo', 399, 'Heiloo'),
	(61, 1245, '''s-Gravenhage', 518, '''s-Gravenhage'),
	(62, 1246, 'Oudenbosch', 1655, 'Halderberge'),
	(63, 1251, 'Baarland', 654, 'Borsele'),
	(64, 1266, 'Haren Gn', 17, 'Haren'),
	(65, 1270, 'Almere', 34, 'Almere'),
	(66, 1271, 'Emmeloord', 171, 'Noordoostpolder'),
	(67, 1283, 'Albergen', 183, 'Tubbergen'),
	(68, 1296, 'Arnhem', 202, 'Arnhem'),
	(69, 1297, 'Zevenaar', 299, 'Zevenaar'),
	(70, 1302, 'Wijk bij Duurstede', 352, 'Wijk bij Duurstede'),
	(71, 1305, 'Zandvoort', 473, 'Zandvoort'),
	(72, 1307, 'Hilvarenbeek', 798, 'Hilvarenbeek'),
	(73, 1312, 'Heerlen', 917, 'Heerlen'),
	(74, 1314, 'Heeze', 1658, 'Heeze-Leende'),
	(75, 1317, 'Willemstad', 1709, 'Moerdijk'),
	(76, 1328, 'Landsmeer', 415, 'Landsmeer'),
	(77, 1331, 'Bussum', 381, 'Bussum'),
	(78, 1332, 'Abcoude', 736, 'De Ronde Venen'),
	(79, 1334, 'Almen', 262, 'Lochem'),
	(80, 1344, 'Epe', 232, 'Epe'),
	(81, 1348, 'Froombosch', 40, 'Slochteren'),
	(82, 1362, 'Tzum', 70, 'Franekeradeel'),
	(83, 1379, 'Olst', 1773, 'Olst-Wijhe'),
	(84, 1384, 'Veldhoven', 861, 'Veldhoven'),
	(85, 1385, 'Abbenbroek', 568, 'Bernisse'),
	(86, 1392, 'Breukelen', 1904, 'Stichtse Vecht'),
	(87, 1395, 'Zutphen', 301, 'Zutphen'),
	(88, 1397, 'Oude Pekela', 765, 'Pekela'),
	(89, 1399, 'Rhenen', 340, 'Rhenen'),
	(90, 1401, 'De Heen', 851, 'Steenbergen'),
	(91, 1406, 'Maastricht', 935, 'Maastricht'),
	(92, 1407, 'Agelo', 1774, 'Dinkelland'),
	(93, 1419, 'Finsterwolde', 1895, 'Oldambt'),
	(94, 1425, 'Biezenmortel', 788, 'Haaren'),
	(95, 1429, 'Vaals', 981, 'Vaals'),
	(96, 1432, 'Arkel', 689, 'Giessenlanden'),
	(97, 1438, 'Ambt Delden', 1735, 'Hof van Twente'),
	(98, 1445, 'Aarle-Rixtel', 1659, 'Laarbeek'),
	(99, 1449, 'Beers NB', 1684, 'Cuijk'),
	(100, 1456, 'Best', 753, 'Best'),
	(101, 1457, 'Bergeijk', 1724, 'Bergeijk'),
	(102, 1461, 'Bunde', 938, 'Meerssen'),
	(103, 1466, 'Lisse', 553, 'Lisse'),
	(104, 1467, 'Kapelle', 678, 'Kapelle'),
	(105, 1473, 'Venlo', 983, 'Venlo'),
	(106, 1477, 'Papendrecht', 590, 'Papendrecht'),
	(107, 1478, 'Winterswijk', 294, 'Winterswijk'),
	(108, 1488, 'Hippolytushoef', 1911, 'Hollands Kroon'),
	(109, 1491, 'Raalte', 177, 'Raalte'),
	(110, 1500, 'Velp', 275, 'Rheden'),
	(111, 1507, 'Hem', 498, 'Drechterland'),
	(112, 1518, 'Muiden', 424, 'Muiden'),
	(113, 1520, 'Drempt', 1876, 'Bronckhorst'),
	(114, 1537, 'Ane', 160, 'Hardenberg'),
	(115, 1566, 'Rijssen', 1742, 'Rijssen-Holten'),
	(116, 1568, 'Maarheeze', 1706, 'Cranendonck'),
	(117, 1574, 'Varsseveld', 1509, 'Oude IJsselstreek'),
	(118, 1588, 'Roosendaal', 1674, 'Roosendaal'),
	(119, 1594, 'Barendrecht', 489, 'Barendrecht'),
	(120, 1595, '''s-Hertogenbosch', 796, '''s-Hertogenbosch'),
	(121, 1597, 'Hoofddorp', 394, 'Haarlemmermeer'),
	(122, 1619, 'Vught', 865, 'Vught'),
	(123, 1621, 'Leidschendam', 1916, 'Leidschendam-Voorburg'),
	(124, 1623, 'Alem', 263, 'Maasdriel'),
	(125, 1633, 'Alteveer', 1699, 'Noordenveld'),
	(126, 1654, 'Gelselaar', 1859, 'Berkelland'),
	(127, 1664, 'Amersfoort', 307, 'Amersfoort'),
	(128, 1668, 'Oldenzaal', 173, 'Oldenzaal'),
	(129, 1670, 'Beek', 888, 'Beek'),
	(130, 1673, 'Bakhuizen', 653, 'Gaasterlân-Sleat'),
	(131, 1687, 'Berkel en Rodenrijs', 1621, 'Lansingerland'),
	(132, 1690, 'Banholt', 1903, 'Eijsden-Margraten'),
	(133, 1699, 'Kessel', 1894, 'Peel en Maas'),
	(134, 1702, 'Breda', 758, 'Breda'),
	(135, 1707, 'Katwijk', 537, 'Katwijk'),
	(136, 1711, 'Beuningen', 168, 'Losser'),
	(137, 1716, 'Berg en Terblijt', 994, 'Valkenburg aan de Geul'),
	(138, 1720, 'Blesdijke', 98, 'Weststellingwerf'),
	(139, 1746, 'Heerhugowaard', 398, 'Heerhugowaard'),
	(140, 1747, 'Edam', 385, 'Edam-Volendam'),
	(141, 1750, 'Raamsdonksveer', 779, 'Geertruidenberg'),
	(142, 1753, 'Appelscha', 85, 'Ooststellingwerf'),
	(143, 1766, 'Alphen', 668, 'West Maas en Waal'),
	(144, 1774, 'Deurne', 762, 'Deurne'),
	(145, 1779, '1e Exloërmond', 1681, 'Borger-Odoorn'),
	(146, 1805, 'Streefkerk', 694, 'Liesveld'),
	(147, 1810, 'Alteveer gem Hoogeveen', 118, 'Hoogeveen'),
	(148, 1821, 'Wassenaar', 629, 'Wassenaar'),
	(149, 1822, '''s-Heer Arendskerke', 664, 'Goes'),
	(150, 1829, 'Ten Boer', 9, 'Ten Boer'),
	(151, 1837, 'Beets', 478, 'Zeevang'),
	(152, 1844, 'Elburg', 230, 'Elburg'),
	(153, 1847, 'Uden', 856, 'Uden'),
	(154, 1850, 'Zeeland', 1685, 'Landerd'),
	(155, 1853, 'Klimmen', 986, 'Voerendaal'),
	(156, 1856, 'Blitterswijck', 984, 'Venray'),
	(157, 1862, 'Andelst', 1734, 'Overbetuwe'),
	(158, 1874, 'Hooge Mierde', 1667, 'Reusel-De Mierden'),
	(159, 1878, 'Assendelft', 479, 'Zaanstad'),
	(160, 1886, 'Driehuizen', 458, 'Schermer'),
	(161, 1903, 'Graft', 365, 'Graft-De Rijp'),
	(162, 1909, 'Hekendorp', 589, 'Oudewater'),
	(163, 1913, 'Stein', 971, 'Stein'),
	(164, 1916, 'Thorn', 1641, 'Maasgouw'),
	(165, 1924, 'Almelo', 141, 'Almelo'),
	(166, 1927, 'Noordwijkerhout', 576, 'Noordwijkerhout'),
	(167, 1935, 'Schiedam', 606, 'Schiedam'),
	(168, 1936, 'Westervoort', 293, 'Westervoort'),
	(169, 1937, 'Bergen op Zoom', 748, 'Bergen op Zoom'),
	(170, 1940, 'Broek in Waterland', 852, 'Waterland'),
	(171, 1949, 'Reuver', 889, 'Beesel'),
	(172, 1951, 'Babyloniënbroek', 738, 'Aalburg'),
	(173, 1958, 'Benschop', 331, 'Lopik'),
	(174, 1963, 'Linschoten', 335, 'Montfoort'),
	(175, 1965, 'Workum', 1900, 'Súdwest Fryslân'),
	(176, 1974, 'Weert', 988, 'Weert'),
	(177, 1976, 'Mill', 815, 'Mill en Sint Hubert'),
	(178, 1980, 'Bleskensgraaf ca', 693, 'Graafstroom'),
	(179, 1987, 'Barger-Compascuum', 114, 'Emmen'),
	(180, 2003, 'Sassenheim', 1525, 'Teylingen'),
	(181, 2006, 'Wageningen', 289, 'Wageningen'),
	(182, 2007, 'Putten', 273, 'Putten'),
	(183, 2008, 'Baaium', 140, 'Littenseradiel'),
	(184, 2037, 'Nederweert', 946, 'Nederweert'),
	(185, 2041, 'Echt', 1711, 'Echt-Susteren'),
	(186, 2048, 'Veenendaal', 345, 'Veenendaal'),
	(187, 2050, 'Hertme', 147, 'Borne'),
	(188, 2052, 'Culemborg', 216, 'Culemborg'),
	(189, 2053, 'Houten', 321, 'Houten'),
	(190, 2057, 'Berlicum', 845, 'Sint-Michielsgestel'),
	(191, 2061, 'Noordwijk', 575, 'Noordwijk'),
	(192, 2062, 'Uithoorn', 451, 'Uithoorn'),
	(193, 2067, 'Gilze', 784, 'Gilze en Rijen'),
	(194, 2071, 'Tholen', 716, 'Tholen'),
	(195, 2080, 'Landhorst', 1702, 'Sint Anthonis'),
	(196, 2088, 'Leiden', 546, 'Leiden'),
	(197, 2089, 'Gemert', 1652, 'Gemert-Bakel'),
	(198, 2096, 'Duiven', 226, 'Duiven'),
	(199, 2099, 'Amstenrade', 962, 'Schinnen'),
	(200, 2105, 'Lexmond', 707, 'Zederik'),
	(201, 2112, 'Leiderdorp', 547, 'Leiderdorp'),
	(202, 2113, 'Oostzaan', 431, 'Oostzaan'),
	(203, 2114, 'Aduard', 56, 'Zuidhorn'),
	(204, 2129, 'Ouderkerk aan de Amstel', 437, 'Ouder-Amstel'),
	(205, 2131, 'Achthuizen', 580, 'Oostflakkee'),
	(206, 2135, 'Scherpenzeel', 279, 'Scherpenzeel'),
	(207, 2136, 'Nuenen', 820, 'Nuenen, Gerwen en Nederwetten'),
	(208, 2137, 'Hellevoetsluis', 530, 'Hellevoetsluis'),
	(209, 2138, 'Delft', 503, 'Delft'),
	(210, 2139, 'Schijndel', 844, 'Schijndel'),
	(211, 2141, 'Renswoude', 339, 'Renswoude'),
	(212, 2142, 'Doesburg', 221, 'Doesburg'),
	(213, 2143, 'Urk', 184, 'Urk'),
	(214, 2144, 'Diemen', 384, 'Diemen'),
	(215, 2145, 'Aalden', 109, 'Coevorden'),
	(216, 2170, 'Middenbeemster', 370, 'Beemster'),
	(217, 2174, 'Doezum', 15, 'Grootegast'),
	(218, 2182, 'Terband', 74, 'Heerenveen'),
	(219, 2198, 'Genemuiden', 1896, 'Zwartewaterland'),
	(220, 2202, 'Azewijn', 1955, 'Montferland'),
	(221, 2214, 'Dussen', 870, 'Werkendam'),
	(222, 2224, 'Groenlo', 1586, 'Oost Gelre'),
	(223, 2231, 'Bellingwolde', 7, 'Bellingwedde'),
	(224, 2237, 'Bunschoten-Spakenburg', 313, 'Bunschoten'),
	(225, 2239, 'Bantega', 82, 'Lemsterland'),
	(226, 2248, 'Klarenbeek', 200, 'Apeldoorn'),
	(227, 2259, 'Boerakker', 25, 'Marum'),
	(228, 2267, 'Akersloot', 383, 'Castricum'),
	(229, 2271, 'Leerdam', 545, 'Leerdam'),
	(230, 2275, 'Borgercompagnie', 1987, 'Menterwolde'),
	(231, 2281, 'Roermond', 957, 'Roermond'),
	(232, 2284, 'Jisp', 880, 'Wormerland'),
	(233, 2289, 'Millingen aan de Rijn', 265, 'Millingen aan de Rijn'),
	(234, 2290, 'Berg en Dal', 241, 'Groesbeek'),
	(235, 2293, 'Zoetermeer', 637, 'Zoetermeer'),
	(236, 2294, 'Bourtange', 48, 'Vlagtwedde'),
	(237, 2299, 'Gorinchem', 512, 'Gorinchem'),
	(238, 2339, 'Boerakker', 22, 'Leek'),
	(239, 2347, 'Haaksbergen', 158, 'Haaksbergen'),
	(240, 2348, 'Alkmaar', 361, 'Alkmaar'),
	(241, 2351, 'Dordrecht', 505, 'Dordrecht'),
	(242, 2352, 'Hendrik-Ido-Ambacht', 531, 'Hendrik-Ido-Ambacht'),
	(243, 2353, 'Asperen', 733, 'Lingewaal'),
	(244, 2358, 'Nuth', 951, 'Nuth'),
	(245, 2362, 'Rhoon', 613, 'Albrandswaard'),
	(246, 2365, 'Bergambacht', 491, 'Bergambacht'),
	(247, 2368, 'Brielle', 501, 'Brielle'),
	(248, 2371, 'Klaaswaal', 611, 'Cromstrijen'),
	(249, 2373, 'Ouderkerk aan den IJssel', 644, 'Ouderkerk'),
	(250, 2375, 'Krimpen aan de Lek', 643, 'Nederlek'),
	(251, 2377, 'Dirksland', 504, 'Dirksland'),
	(252, 2380, '''s-Gravendeel', 585, 'Binnenmaas'),
	(253, 2386, 'Alblasserdam', 482, 'Alblasserdam'),
	(254, 2387, 'Haastrecht', 623, 'Vlist'),
	(255, 2390, 'Schoonhoven', 608, 'Schoonhoven'),
	(256, 2391, 'Assen', 106, 'Assen'),
	(257, 2398, 'Heerjansdam', 642, 'Zwijndrecht'),
	(258, 2428, 'Schiermonnikoog', 88, 'Schiermonnikoog'),
	(259, 2429, 'Biddinghuizen', 303, 'Dronten'),
	(260, 2432, 'IJsselstein', 353, 'IJsselstein'),
	(261, 2437, 'Rozenburg', 599, 'Rotterdam'),
	(262, 2438, 'Sliedrecht', 610, 'Sliedrecht'),
	(263, 2439, 'Boxtel', 757, 'Boxtel'),
	(264, 2441, 'Aldtsjerk', 737, 'Tytsjerksteradiel'),
	(265, 2458, 'Heemskerk', 396, 'Heemskerk'),
	(266, 2459, 'Rijswijk', 603, 'Rijswijk'),
	(267, 2460, 'Schagen', 441, 'Schagen'),
	(268, 2461, 'Hoorn', 405, 'Hoorn'),
	(269, 2464, 'Adorp', 53, 'Winsum'),
	(270, 2476, 'Reeuwijk', 1901, 'Bodegraven-Reeuwijk'),
	(271, 2479, 'Milsbeek', 907, 'Gennep'),
	(272, 2484, 'Akmarijp', 51, 'Skarsterlân'),
	(273, 2523, 'Woudenberg', 351, 'Woudenberg'),
	(274, 2524, 'Eagum', 55, 'Boarnsterhim'),
	(275, 2545, 'Lent', 268, 'Nijmegen'),
	(276, 2546, 'Ommen', 175, 'Ommen'),
	(277, 2557, 'Tiel', 281, 'Tiel'),
	(278, 2562, 'Ridderkerk', 597, 'Ridderkerk'),
	(279, 2563, 'Heemstede', 397, 'Heemstede'),
	(280, 2564, 'Wijchen', 296, 'Wijchen'),
	(281, 2571, 'Aalsmeer', 358, 'Aalsmeer'),
	(282, 2573, 'Ermelo', 233, 'Ermelo'),
	(283, 2574, 'Drimmelen', 1719, 'Drimmelen'),
	(284, 2581, 'Rucphen', 840, 'Rucphen'),
	(285, 2586, 'Hollum', 60, 'Ameland'),
	(286, 2590, 'Herkenbosch', 1669, 'Roerdalen'),
	(287, 2596, 'Sprang-Capelle', 867, 'Waalwijk'),
	(288, 2603, 'Bunnik', 312, 'Bunnik'),
	(289, 2606, 'Klarenbeek', 285, 'Voorst'),
	(290, 2614, 'Oosterend', 93, 'Terschelling'),
	(291, 2626, 'Aalst', 297, 'Zaltbommel'),
	(292, 2638, 'Leusden', 327, 'Leusden'),
	(293, 2641, 'Haarlemmerliede', 393, 'Haarlemmerliede en Spaarnwoude'),
	(294, 2644, 'Zoeterwoude', 638, 'Zoeterwoude'),
	(295, 2646, 'Oisterwijk', 824, 'Oisterwijk'),
	(296, 2649, 'Kerkrade', 928, 'Kerkrade'),
	(297, 2651, 'Vogelenzang', 377, 'Bloemendaal'),
	(298, 2655, 'De Lier', 1783, 'Westland'),
	(299, 2667, 'Nieuwkoop', 569, 'Nieuwkoop'),
	(300, 2674, 'Brouwershaven', 1676, 'Schouwen-Duiveland'),
	(301, 2691, 'Baarlo', 1708, 'Steenwijkerland'),
	(302, 2722, 'Bitgum', 1908, 'Menameradiel'),
	(303, 2735, 'Beverwijk', 375, 'Beverwijk'),
	(304, 2737, 'De Cocksdorp', 448, 'Texel'),
	(305, 2744, 'Oegstgeest', 579, 'Oegstgeest'),
	(306, 2745, 'Someren', 847, 'Someren'),
	(307, 2747, 'Geffen', 1671, 'Maasdonk'),
	(308, 2750, 'Weurt', 209, 'Beuningen'),
	(309, 2754, 'Enkhuizen', 388, 'Enkhuizen'),
	(310, 2755, 'Uitgeest', 450, 'Uitgeest'),
	(311, 2756, 'Schagerbrug', 476, 'Zijpe'),
	(312, 2764, 'Ede', 228, 'Ede'),
	(313, 2774, 'Aagtekerke', 717, 'Veere'),
	(314, 2787, 'Sint-Oedenrode', 846, 'Sint-Oedenrode'),
	(315, 2788, 'Aartswoud', 432, 'Opmeer'),
	(316, 2793, 'Oud-Beijerland', 584, 'Oud-Beijerland'),
	(317, 2794, 'Kinderdijk', 571, 'Nieuw-Lekkerland'),
	(318, 2796, 'Mookhoek', 617, 'Strijen'),
	(319, 2799, 'Dongen', 766, 'Dongen'),
	(320, 2801, 'Middelaar', 944, 'Mook en Middelaar'),
	(321, 2805, 'Schipluiden', 1842, 'Midden-Delfland'),
	(322, 2808, 'Born', 1883, 'Sittard-Geleen'),
	(323, 2821, 'Zeist', 355, 'Zeist'),
	(324, 2826, 'Erp', 860, 'Veghel'),
	(325, 2828, 'Blaricum', 376, 'Blaricum'),
	(326, 2829, 'Bedum', 5, 'Bedum'),
	(327, 2835, 'IJmuiden', 453, 'Velsen'),
	(328, 2840, 'Everdingen', 620, 'Vianen'),
	(329, 2845, 'Bingelrade', 881, 'Onderbanken'),
	(330, 2849, 'Brunssum', 899, 'Brunssum'),
	(331, 2850, 'Koudekerk aan den Rijn', 1672, 'Rijnwoude'),
	(332, 2854, 'Bathmen', 150, 'Deventer'),
	(333, 2865, 'Heerde', 246, 'Heerde'),
	(334, 2869, 'Nijkerk', 267, 'Nijkerk'),
	(335, 2872, 'Beek', 282, 'Ubbergen'),
	(336, 2880, 'Goirle', 785, 'Goirle'),
	(337, 2882, 'Hattem', 244, 'Hattem'),
	(338, 2883, 'Baarle-Nassau', 744, 'Baarle-Nassau'),
	(339, 2886, 'Goudswaard', 588, 'Korendijk'),
	(340, 2890, 'Laren', 417, 'Laren'),
	(341, 2891, 'Harlingen', 72, 'Harlingen'),
	(342, 2894, 'Kampen', 166, 'Kampen'),
	(343, 2902, 'Afferden', 225, 'Druten'),
	(344, 2907, 'Haarlem', 392, 'Haarlem'),
	(345, 2909, 'Eelde', 1730, 'Tynaarlo'),
	(346, 2927, 'Rozendaal', 277, 'Rozendaal'),
	(347, 2928, 'Asten', 743, 'Asten'),
	(348, 2931, 'Goedereede', 511, 'Goedereede'),
	(349, 2934, 'De Bilt', 310, 'De Bilt'),
	(350, 2940, 'Baexem', 1640, 'Leudal'),
	(351, 2956, 'Oosterhout', 826, 'Oosterhout'),
	(352, 2960, 'Oostburg', 1714, 'Sluis'),
	(353, 2976, 'Aerdt', 196, 'Rijnwaarden'),
	(354, 2982, 'Nunspeet', 302, 'Nunspeet'),
	(355, 2986, 'Doorwerth', 274, 'Renkum'),
	(356, 2992, 'Duizel', 770, 'Eersel'),
	(357, 2998, 'Boskoop', 499, 'Boskoop'),
	(358, 2999, 'Ankeveen', 1696, 'Wijdemeren'),
	(359, 3005, 'Balinge', 1731, 'Midden-Drenthe'),
	(360, 3031, 'Hardinxveld-Giessendam', 523, 'Hardinxveld-Giessendam'),
	(361, 3032, 'Spijkenisse', 612, 'Spijkenisse'),
	(362, 3034, 'Hoogmade', 1884, 'Kaag en Braassem'),
	(363, 3044, 'Groet', 373, 'Bergen (NH)'),
	(364, 3051, 'Waddinxveen', 627, 'Waddinxveen'),
	(365, 3052, 'Kaatsheuvel', 809, 'Loon op Zand'),
	(366, 3055, 'Landgraaf', 882, 'Landgraaf'),
	(367, 3056, 'Den Helder', 400, 'Den Helder'),
	(368, 3059, 'Heesch', 1721, 'Bernheze'),
	(369, 3065, 'Simpelveld', 965, 'Simpelveld'),
	(370, 3068, '''t Loo Oldebroek', 269, 'Oldebroek'),
	(371, 3074, 'Stadskanaal', 37, 'Stadskanaal'),
	(372, 3088, 'Hulst', 677, 'Hulst'),
	(373, 3103, 'Purmerend', 439, 'Purmerend'),
	(374, 3105, 'Boschoord', 1701, 'Westerveld'),
	(375, 3130, 'Huissen', 1705, 'Lingewaard'),
	(376, 3138, 'Boekel', 755, 'Boekel'),
	(377, 3143, 'Middelharnis', 559, 'Middelharnis'),
	(378, 3160, 'Alteveer', 1690, 'De Wolden'),
	(379, 3173, 'Augustinusga', 59, 'Achtkarspelen'),
	(380, 3188, 'Kamperland', 1695, 'Noord-Beveland'),
	(381, 3195, 'Escharen', 786, 'Grave'),
	(382, 3199, 'Blije', 1722, 'Ferwerderadiel'),
	(383, 3213, 'Beesd', 236, 'Geldermalsen'),
	(384, 3222, 'Harderwijk', 243, 'Harderwijk'),
	(385, 3224, 'Alde Leie', 81, 'Leeuwarderadeel'),
	(386, 3231, 'Voorschoten', 626, 'Voorschoten'),
	(387, 3232, 'Bierum', 10, 'Delfzijl'),
	(388, 3246, 'Doetinchem', 222, 'Doetinchem'),
	(389, 3249, 'Oss', 828, 'Oss'),
	(390, 3265, 'Broeksterwâld', 1891, 'Dantumadiel'),
	(391, 3275, 'Boornbergum', 90, 'Smallingerland'),
	(392, 3289, 'Dirkshorn', 395, 'Harenkarspel'),
	(393, 3295, 'Utrecht', 344, 'Utrecht'),
	(394, 3299, 'Vlieland', 96, 'Vlieland'),
	(395, 3300, 'Almkerk', 874, 'Woudrichem'),
	(396, 3307, 'Augsbuurt', 79, 'Kollumerland en Nieuwkruisland'),
	(397, 3320, 'Bruinehaar', 1700, 'Twenterand'),
	(398, 3328, 'Oudebildtzijl', 63, 'het Bildt'),
	(399, 3335, 'Driebergen-Rijsenburg', 1581, 'Utrechtse Heuvelrug'),
	(400, 3342, 'Bakkeveen', 86, 'Opsterland'),
	(401, 3359, 'Est', 304, 'Neerijnen'),
	(402, 3370, 'Asch', 214, 'Buren'),
	(403, 3386, 'Appingedam', 3, 'Appingedam'),
	(404, 3387, 'Aalsum', 58, 'Dongeradeel'),
	(405, 3415, 'Eenrum', 1663, 'De Marne'),
	(406, 3432, 'Alphen', 1723, 'Alphen-Chaam'),
	(407, 3444, 'Eenum', 24, 'Loppersum'),
	(408, 3461, 'Hansweert', 703, 'Reimerswaal'),
	(409, 3473, 'Eemshaven', 1651, 'Eemsmond'),
	(410, 3489, 'Zundert', 879, 'Zundert'),
	(411, 3494, 'Malden', 252, 'Heumen'),
	(412, 3498, 'Drunen', 797, 'Heusden'),
	(413, 3510, 'Hengelo', 164, 'Hengelo (O)'),
	(414, 3520, 'Son en Breugel', 848, 'Son en Breugel'),
	(415, 3535, 'Hillegom', 534, 'Hillegom')");
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `images` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `name` varchar(100) NOT NULL,
	  `location` varchar(200) NOT NULL,
	  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'size in bytes',
	  `user_id` int(10) unsigned NOT NULL COMMENT 'the owner/uploader of this image',
	  `created` datetime NOT NULL,
	  `modified` datetime NOT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `name` (`name`),
	  KEY `userid_fk` (`user_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `images_posts` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `image_id` int(10) unsigned NOT NULL,
	  `post_id` int(10) unsigned NOT NULL COMMENT ' Uniek id',
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `image_id` (`image_id`,`post_id`),
	  KEY `images_belongto_posts` (`post_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `messages` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT ' Uniek id',
	  `subject` varchar(255) NOT NULL COMMENT ' Het onderwerp van het bericht',
	  `message` text NOT NULL COMMENT ' De inhoud van het bericht',
	  `parent_id` int(10) unsigned DEFAULT NULL COMMENT ' Link naar de eigen Messages tabel en geeft aan op welk bericht dit bericht een reactie is',
	  `sender_id` int(10) unsigned NOT NULL COMMENT 'Uniek id',
	  `recipient_id` int(10) unsigned NOT NULL COMMENT 'Uniek id',
	  `post_id` int(10) unsigned DEFAULT NULL COMMENT ' Uniek id',
	  `advertisement_id` int(10) unsigned DEFAULT NULL COMMENT ' Link naar de advertentie in de Advertisements tabel, naar de advertentie welke in dit bericht opgenomen is',
	  `token` varchar(100) NOT NULL,
	  `created` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop het bericht aangemaakt werd (wordt automatisch gevuld)',
	  `modified` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop het bericht voor het laatst gewijzigd werd (wordt automatisch gevuld) ',
	  `deleted` datetime DEFAULT NULL COMMENT ' Datum/tijd van het moment waarop het bericht verwijderd werd ',
	  PRIMARY KEY (`id`),
	  KEY `message_sentby_user` (`sender_id`),
	  KEY `message_receivedby_user` (`recipient_id`),
	  KEY `parent_fk` (`parent_id`),
	  KEY `post_fk` (`post_id`),
	  KEY `advertisement_fk` (`advertisement_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `newsletters` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `subject` varchar(50) DEFAULT NULL,
	  `friendly_subject` varchar(50) NOT NULL,
	  `active` tinyint(1) NOT NULL,
	  `message` text,
	  `created` datetime DEFAULT NULL,
	  `modified` datetime DEFAULT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `friendly_title` (`friendly_subject`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `newsletters_users` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `newsletter_id` int(11) NOT NULL,
	  `user_id` int(10) unsigned NOT NULL COMMENT 'Uniek id',
	  `created` datetime DEFAULT NULL,
	  `modified` datetime DEFAULT NULL,
	  PRIMARY KEY (`id`),
	  KEY `newsletter_id` (`newsletter_id`),
	  KEY `user_id` (`user_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `newsletterusers_posts` (
	  `newsletter_users_id` int(11) NOT NULL,
	  `post_id` int(10) unsigned NOT NULL COMMENT ' Uniek id',
	  KEY `newsletter_users_id` (`newsletter_users_id`),
	  KEY `post_id` (`post_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1");
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `posts` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT ' Uniek id',
	  `start_publication` datetime NOT NULL COMMENT ' Startdatum en -tijd vanaf wanneer deze post onlin te zien is.',
	  `end_publication` datetime NOT NULL COMMENT ' Einddatum en -tijd tot wanneer deze post online te zien is.',
	  `title` varchar(100) NOT NULL COMMENT ' De titel van de post welke als koptekst getoond wordt',
	  `friendly_title` varchar(100) NOT NULL,
	  `message` text NOT NULL COMMENT ' Het inhoudelijke bericht van de post',
	  `status` varchar(20) NOT NULL DEFAULT 'gepubliceerd' COMMENT ' Status van de post: concept, gepubliceerd.',
	  `type` varchar(20) NOT NULL DEFAULT 'gezocht' COMMENT ' Type post: aangeboden of gezocht',
	  `rubric_id` int(10) unsigned NOT NULL COMMENT ' Link naar de categorie in de Categories tabel waartoe deze post behoort',
	  `owner_id` int(10) unsigned NOT NULL COMMENT ' Link naar de gebruiker in de Users tabel welke deze post opgesteld heeft',
	  `blocked` tinyint(1) unsigned NOT NULL DEFAULT '0',
	  `note` varchar(255) NOT NULL,
	  `created` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop de post aangemaakt werd (wordt automatisch gevuld)',
	  `modified` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop de post voor het laatst gewijzigd werd (wordt automatisch gevuld) ',
	  `deleted` datetime DEFAULT NULL COMMENT ' Datum/tijd van het moment waarop de post verwijderd werd ',
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `friendly_title` (`friendly_title`),
	  KEY `fulltext_title_message` (`title`,`message`(767)),
	  KEY `rubric_fk` (`rubric_id`),
	  KEY `owneruser_fk` (`owner_id`),
	  KEY `endpublication_search` (`end_publication`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `posts_propvalues` (
	  `post_id` int(10) unsigned NOT NULL COMMENT ' Uniek id',
	  `propvalue_id` int(10) unsigned NOT NULL COMMENT 'Uniek id',
	  UNIQUE KEY `post_id` (`post_id`,`propvalue_id`),
	  KEY `posts_havemany_propvalues` (`propvalue_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1");
	
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `properties` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `name` varchar(20) NOT NULL,
	  `deleted` datetime DEFAULT NULL,
	  `rubric_id` int(10) unsigned NOT NULL COMMENT ' Uniek id',
	  `created` datetime NOT NULL,
	  `modified` datetime NOT NULL,
	  `type` varchar(50) DEFAULT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `name` (`name`),
	  KEY `rubric_fk` (`rubric_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	AbstractMigration::_addsql("
	INSERT INTO `properties` (`id`, `name`, `deleted`, `rubric_id`, `created`, `modified`, `type`) VALUES
	(1, 'Bieden toestaan', NULL, 11, '2012-11-06 16:07:52', '2012-11-06 16:07:52', '')");
	
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `propvalues` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Uniek id',
	  `value` varchar(50) NOT NULL COMMENT 'De waarde die bij een eigenschap hoort (zoals de waarde ''bmw'' bij de eigenschap ''merk'' hoort)',
	  `property_id` int(10) unsigned NOT NULL COMMENT 'Link naar de tabel properties',
	  `created` datetime NOT NULL,
	  `modified` datetime NOT NULL,
	  `deleted` datetime DEFAULT NULL,
	  PRIMARY KEY (`id`),
	  KEY `propvalues_belongto_properties` (`property_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	AbstractMigration::_addsql("
	INSERT INTO `propvalues` (`id`, `value`, `property_id`, `created`, `modified`, `deleted`) VALUES
	(1, 'ja', 1, '2012-11-06 16:08:21', '2013-01-03 19:37:16', NULL),
	(2, 'nee', 1, '2012-11-06 16:08:27', '2012-11-06 16:08:27', NULL)");
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `reactions` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT ' Uniek id',
	  `subject` varchar(255) NOT NULL COMMENT ' Het onderwerp van het bericht',
	  `message` text NOT NULL COMMENT ' De inhoud van het bericht',
	  `sender_id` int(10) unsigned NOT NULL COMMENT ' Link naar de gebruiker in de Users tabel en geeft aan wie de afzender (opsteller) is van dit bericht',
	  `recipient_id` int(10) unsigned DEFAULT NULL COMMENT 'Uniek id',
	  `post_id` int(10) unsigned NOT NULL COMMENT ' Link naar de post in de Posts tabel en geeft aan op welke post dit een reactie is',
	  `advertisement_id` int(10) unsigned DEFAULT NULL COMMENT ' Link naar de advertentie in de Advertisements tabel, naar de advertentie welke in dit bericht opgenomen is',
	  `token` varchar(100) DEFAULT NULL,
	  `created` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop de reactie aangemaakt werd (wordt automatisch gevuld)',
	  `modified` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop de reactie voor het laatst gewijzigd werd (wordt automatisch gevuld) ',
	  `deleted` datetime DEFAULT NULL COMMENT ' Datum/tijd van het moment waarop de reactie verwijderd werd ',
	  PRIMARY KEY (`id`),
	  KEY `reactions_sentto_user` (`recipient_id`),
	  KEY `senderuser_fk` (`sender_id`),
	  KEY `post_fk` (`post_id`),
	  KEY `advertisement_fk` (`advertisement_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `rubrics` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT ' Uniek id',
	  `name` varchar(100) NOT NULL COMMENT ' Naam van de categorie waar deze aan herkend wordt (bijv: dating, uitgaan, vakanties, enz.)',
	  `shortname` varchar(100) NOT NULL COMMENT 'shortname/slug for use in addressbar',
	  `parent_id` int(11) DEFAULT NULL,
	  `lft` int(11) DEFAULT NULL,
	  `rght` int(11) DEFAULT NULL,
	  `type` varchar(20) NOT NULL DEFAULT 'oproep' COMMENT 'oproep of advertentie',
	  `sortorder` tinyint(3) unsigned NOT NULL COMMENT 'de volgorde waarin de rubrieken in het menu getoond worden\n',
	  `created` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop de categorie aangemaakt werd (wordt automatisch gevuld)',
	  `modified` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop de categorie voor het laatst gewijzigd werd (wordt automatisch gevuld) ',
	  `deleted` datetime DEFAULT NULL COMMENT ' Datum/tijd van het moment waarop de categorie verwijderd werd ',
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `shortname` (`shortname`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	AbstractMigration::_addsql("
	INSERT INTO `rubrics` (`id`, `name`, `shortname`, `parent_id`, `lft`, `rght`, `type`, `sortorder`, `created`, `modified`, `deleted`) VALUES
	(1, 'dating', 'dating', 119, 6, 7, 'oproep', 70, '2012-08-16 21:09:07', '2013-12-03 18:35:40', NULL),
	(2, 'elkaar helpen', 'elkaarhelpen', NULL, 37, 48, 'oproep', 10, '2012-08-16 21:09:22', '2013-12-03 18:35:39', NULL),
	(3, 'klussen & tuinieren', 'klustuin', 2, 40, 41, 'oproep', 40, '2012-08-16 21:17:14', '2013-12-03 18:35:40', NULL),
	(4, 'sportvriend', 'sportvriend', 119, 8, 11, 'oproep', 90, '2012-08-16 21:17:27', '2013-12-03 18:35:40', NULL),
	(5, 'zorg', 'zorg', 2, 38, 39, 'oproep', 30, '2012-08-16 21:17:33', '2013-12-03 18:35:40', NULL),
	(7, 'tekst', 'tekst', NULL, 1, 2, 'advertentie', 7, '2012-08-16 21:17:45', '2013-12-03 18:35:39', NULL),
	(8, 'banner', 'banner', NULL, 3, 4, 'advertentie', 8, '2012-08-16 21:17:56', '2013-12-03 18:35:39', NULL),
	(11, 'kringloopwinkel', 'kringloopwinkel', NULL, 49, 96, 'oproep', 30, '2012-10-05 20:37:03', '2013-12-03 18:35:39', NULL),
	(13, 'muziekvriend', 'muziekvriend', 119, 14, 15, 'oproep', 110, '2012-11-17 00:00:00', '2013-12-03 18:35:40', NULL),
	(14, 'vakantie', 'vakantie', 18, 98, 107, 'oproep', 120, '2012-11-17 00:00:00', '2013-12-03 18:35:40', NULL),
	(15, 'uitgaansvriend', 'uitgaansvriend', 119, 12, 13, 'oproep', 100, '2012-11-17 00:00:00', '2013-12-03 18:35:40', NULL),
	(16, 'computerhulp', 'computerhulp', 2, 42, 43, 'oproep', 50, '2012-11-17 00:00:00', '2013-12-03 18:35:40', NULL),
	(17, 'belasting & juridische hulp', 'belastingjuridischehulp', 2, 44, 45, 'oproep', 60, '2012-11-17 00:00:00', '2013-12-03 18:35:40', NULL),
	(18, 'overige', 'overige', NULL, 97, 110, 'oproep', 60, '2012-11-17 00:00:00', '2013-12-03 18:35:40', NULL),
	(19, 'oppas', 'oppas', 2, 46, 47, 'oproep', 80, '2012-11-17 00:00:00', '2013-12-03 18:35:40', NULL)");
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `texts` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
	  `description` varchar(50) DEFAULT NULL,
	  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `users` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Uniek id',
	  `username` varchar(100) NOT NULL COMMENT 'De unieke, zelf gekozen naam van de gebruiker waarmee deze bekend is op de webdienst',
	  `firstname` varchar(100) DEFAULT NULL,
	  `prepositions` varchar(10) DEFAULT NULL,
	  `lastname` varchar(100) DEFAULT NULL,
	  `gender` varchar(5) NOT NULL DEFAULT 'man' COMMENT 'man of vrouw',
	  `dob` date DEFAULT NULL,
	  `login_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Het aantal keer dat een gebruiker ingelogd is. Dit gegeven wordt gebruikt voor beheer om te zien welke accounts niet meer gebruikt worden of nooit gebruikt zijn.',
	  `password` varchar(100) NOT NULL COMMENT 'Het versleutelde wachtwoord van de gebruiker',
	  `email` varchar(255) NOT NULL COMMENT 'Het emailadres van de gebruiker waarop deze te bereiken is',
	  `role` varchar(15) NOT NULL DEFAULT 'gebruiker' COMMENT 'De rol van de gebruiker: gebruiker of beheerder. Dit bepaalt de rechten die de gebruiker heeft in de webdienst',
	  `zipcode` varchar(7) DEFAULT NULL COMMENT 'Postcode van de gebruiker. Deze wordt gebruikt om de coordinaten te bepalen. Dit is nodig om te kunnen zoeken binnen een straal van een x aantal kilometers.',
	  `city` varchar(200) DEFAULT NULL,
	  `housenr` varchar(10) DEFAULT NULL,
	  `extension` varchar(5) NOT NULL,
	  `newsletter` tinyint(1) NOT NULL DEFAULT '1',
	  `lon` float(20,15) DEFAULT NULL COMMENT ' Longitude de lengtegraden van de coordinaten van de locatie van de gebruiker (ohup basis van de postcode)',
	  `lat` float(20,15) DEFAULT NULL COMMENT ' Latitude de breedtegraden van de coordinaten van de locatie van de gebruiker (op basis van de postcode)',
	  `allow_username_change` int(1) NOT NULL,
	  `active` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT ' Dit geeft aan of het account actief (geactiveerd) is en of de gebruiker dus kan inloggen',
	  `type` int(11) NOT NULL DEFAULT '0' COMMENT 'account_type- default, facebook',
	  `blocked` tinyint(1) unsigned NOT NULL COMMENT ' Geeft aan of deze gebruiker voor de webdienst geblokkeerd is en zich niet meer (met bovengenoemd emailadres) mag aanmelden',
	  `token` varchar(255) DEFAULT NULL COMMENT ' De code waarmee een gebruiker in kan loggen zonder wachtwoord (bij activatie inschrijving en bij weblinks in e-mails)',
	  `notes` text COMMENT ' Notities bij dit account, kan gebruikt worden om een extra melding te plaatsen op het moment dat het account geblokkeer wordt',
	  `last_online` datetime DEFAULT NULL COMMENT ' Geeft aan wanneer de gebruiker voor het laatst online was',
	  `last_location` varchar(255) NOT NULL,
	  `apikey` varchar(100) DEFAULT NULL,
	  `api_access_count` int(11) NOT NULL,
	  `created` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop de post aangemaakt werd (wordt automatisch gevuld)',
	  `modified` datetime NOT NULL COMMENT ' Datum/tijd van het moment waarop de post voor het laatst gewijzigd werd (wordt automatisch gevuld) ',
	  `deleted` datetime DEFAULT NULL COMMENT ' Datum/tijd van het moment waarop de user verwijderd werd ',
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `username` (`username`),
	  UNIQUE KEY `email` (`email`),
	  UNIQUE KEY `username_search` (`username`),
	  UNIQUE KEY `token` (`token`),
	  UNIQUE KEY `token_unique` (`token`),
	  UNIQUE KEY `apikey` (`apikey`),
	  KEY `password_search` (`password`),
	  KEY `lon_search` (`lon`),
	  KEY `lat_search` (`lat`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	
	
	AbstractMigration::_addsql("
	INSERT INTO `users` (`id`, `username`, `firstname`, `prepositions`, `lastname`, `gender`, `dob`, `login_count`, `password`, `email`, `role`, `zipcode`, `city`, `housenr`, `extension`, `newsletter`, `lon`, `lat`, `allow_username_change`, `active`, `type`, `blocked`, `token`, `notes`, `last_online`, `last_location`, `apikey`, `api_access_count`, `created`, `modified`, `deleted`) VALUES
	(1, 'paul', 'Paul', 'van der', 'Vliet', 'man', NULL, 181, '903af47046853f36d9d29441bcd6a7386e13c287', 'pauledenburg@gmail.com', 'beheerder', '5346KE', 'Oss', '123', '', 1, 5.516660213470459, 51.781600952148440, 0, 1, 0, 0, NULL, '', '2014-06-10 17:20:24', 'logout', 'd4f7ac4b3a34350461b7efe8df4fb62aec0337f5', 13961, '2012-08-20 20:15:08', '2014-06-10 17:28:41', NULL),
	(2, 'seleniumTestUser', 'selenium', NULL, '', '', '0000-00-00', 1, '598967c843ee554d2c79267c14a18ae71efebba7', 'seleniumTestUser@i2s.nl', 'gebruiker', '3028 eh', '', '0', '', 0, 4.424890041351318, 51.915798187255860, 0, 1, 0, 0, NULL, NULL, '2012-12-16 15:55:10', '', NULL, 0, '2012-12-16 15:54:08', '2012-12-16 17:57:28', NULL),
	(3, 'seleniumAdminUser', 'selenium', NULL, 'tester', '', '2012-12-16', 663, 'd73313b834d43960b978cec989e30c21d27ad107', 'seleniumAdminUser@i2s.nl', 'beheerder', '', '', '', '', 0, NULL, NULL, 0, 1, 0, 0, NULL, '', '2014-06-10 17:28:02', '', NULL, 0, '2012-12-16 18:00:38', '2014-06-10 17:28:02', NULL)");
	
	
	
	AbstractMigration::_addsql("
	CREATE TABLE IF NOT EXISTS `weblinks` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(100) NOT NULL,
	  `link` varchar(255) NOT NULL,
	  `created` datetime NOT NULL,
	  `modified` datetime DEFAULT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0");
	
	
	
	AbstractMigration::_addsql("
	ALTER TABLE `biddings`
	  ADD CONSTRAINT `biddings_arefrom_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  ADD CONSTRAINT `biddings_belongto_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE");
	
	
	AbstractMigration::_addsql("
	ALTER TABLE `images`
	  ADD CONSTRAINT `image_belongsto_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE");
	
	
	AbstractMigration::_addsql("
	ALTER TABLE `images_posts`
	  ADD CONSTRAINT `images_belongto_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  ADD CONSTRAINT `post_hasmany_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE");
	
	AbstractMigration::_addsql("
	ALTER TABLE `messages`
	  ADD CONSTRAINT `messages_belongto_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  ADD CONSTRAINT `messages_haveone_advertisement` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  ADD CONSTRAINT `messages_haveone_parent` FOREIGN KEY (`parent_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  ADD CONSTRAINT `message_receivedby_user` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  ADD CONSTRAINT `message_sentby_user` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE");
	
	AbstractMigration::_addsql("
	ALTER TABLE `newsletters_users`
	  ADD CONSTRAINT `newsletters_users_ibfk_1` FOREIGN KEY (`newsletter_id`) REFERENCES `newsletters` (`id`),
	  ADD CONSTRAINT `newsletters_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)");
	
	AbstractMigration::_addsql("
	ALTER TABLE `newsletterusers_posts`
	  ADD CONSTRAINT `newsletterusers_posts_ibfk_1` FOREIGN KEY (`newsletter_users_id`) REFERENCES `newsletters_users` (`id`),
	  ADD CONSTRAINT `newsletterusers_posts_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)");
	
	AbstractMigration::_addsql("
	ALTER TABLE `posts`
	  ADD CONSTRAINT `posts_belongto_rubrics` FOREIGN KEY (`rubric_id`) REFERENCES `rubrics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  ADD CONSTRAINT `reactions_madeby_users` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE");
	
	AbstractMigration::_addsql("
	ALTER TABLE `posts_propvalues`
	  ADD CONSTRAINT `posts_havemany_propvalues` FOREIGN KEY (`propvalue_id`) REFERENCES `propvalues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  ADD CONSTRAINT `propvalues_belongto_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE");
	
	AbstractMigration::_addsql("
	ALTER TABLE `properties`
	  ADD CONSTRAINT `properties_haveone_rubric` FOREIGN KEY (`rubric_id`) REFERENCES `rubrics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE");
	
	AbstractMigration::_addsql("
	ALTER TABLE `propvalues`
	  ADD CONSTRAINT `propvalues_belongto_properties` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)");
	
	AbstractMigration::_addsql("
	ALTER TABLE `reactions`
	  ADD CONSTRAINT `ads_havemany_reactions` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  ADD CONSTRAINT `reactions_belongto_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  ADD CONSTRAINT `reactions_sentto_user` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  ADD CONSTRAINT `users_have_reactions` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE");
    }

    public function down(Schema $schema) {
	AbstractMigration::_addsql('DROP TABLE addresses');
    }
}
