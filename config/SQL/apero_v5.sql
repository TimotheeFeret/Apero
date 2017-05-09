-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 09 Mai 2017 à 07:29
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `apero`
--

-- --------------------------------------------------------

--
-- Structure de la table `adhesion`
--

CREATE TABLE IF NOT EXISTS `adhesion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `prix` decimal(13,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `adhesion`
--

INSERT INTO `adhesion` (`id`, `libelle`, `prix`) VALUES
(1, 'Adhérente', '10.00'),
(2, 'Non adhérente', '5.00');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etablissement_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_etablissement_classe` (`etablissement_id`),
  KEY `fk_section_classe` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=584 ;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`id`, `etablissement_id`, `section_id`) VALUES
(360, 1026, 2),
(361, 1037, 5),
(362, 1004, 2),
(363, 1016, 1),
(364, 1062, 2),
(365, 1011, 7),
(366, 1031, 7),
(367, 1017, 6),
(368, 1024, 6),
(369, 1059, 4),
(370, 1033, 4),
(371, 1029, 1),
(372, 1021, 1),
(373, 1012, 5),
(374, 1059, 7),
(375, 1055, 6),
(376, 1031, 6),
(377, 1054, 6),
(378, 1005, 2),
(379, 1037, 2),
(380, 1062, 7),
(381, 1032, 6),
(382, 1052, 5),
(383, 1014, 1),
(384, 1061, 1),
(385, 1048, 7),
(386, 1060, 2),
(387, 1020, 4),
(388, 1023, 5),
(389, 1029, 3),
(390, 1013, 2),
(391, 1060, 4),
(392, 1016, 6),
(393, 1052, 1),
(394, 1007, 4),
(395, 1018, 1),
(396, 1008, 1),
(397, 1036, 1),
(398, 1021, 6),
(399, 1024, 2),
(400, 1048, 6),
(401, 1018, 2),
(402, 1044, 6),
(403, 1028, 2),
(404, 1057, 2),
(405, 1032, 5),
(406, 1004, 6),
(407, 1011, 1),
(408, 1055, 7),
(409, 1055, 1),
(410, 1018, 7),
(411, 1055, 2),
(412, 1057, 6),
(413, 1058, 6),
(414, 1026, 4),
(415, 1017, 7),
(416, 1023, 6),
(417, 1063, 1),
(418, 1030, 5),
(419, 1032, 2),
(420, 1044, 1),
(421, 1017, 5),
(422, 1004, 5),
(423, 1021, 7),
(424, 1010, 1),
(425, 1019, 2),
(426, 1061, 3),
(427, 1018, 5),
(428, 1023, 3),
(429, 1037, 4),
(430, 1025, 4),
(431, 1052, 3),
(432, 1042, 6),
(433, 1026, 6),
(434, 1036, 6),
(435, 1047, 2),
(436, 1034, 1),
(437, 1063, 5),
(438, 1063, 3),
(439, 1034, 5),
(440, 1011, 4),
(441, 1027, 5),
(442, 1024, 1),
(443, 1061, 4),
(444, 1050, 5),
(445, 1059, 3),
(446, 1019, 6),
(447, 1062, 5),
(448, 1038, 1),
(449, 1037, 3),
(450, 1017, 2),
(451, 1058, 7),
(452, 1038, 5),
(453, 1010, 5),
(454, 1019, 3),
(455, 1046, 5),
(456, 1014, 7),
(457, 1019, 5),
(458, 1029, 4),
(459, 1004, 4),
(460, 1052, 4),
(461, 1038, 2),
(462, 1009, 5),
(463, 1060, 3),
(464, 1057, 5),
(465, 1033, 1),
(466, 1008, 4),
(467, 1049, 4),
(468, 1019, 1),
(469, 1059, 2),
(470, 1061, 7),
(471, 1027, 6),
(472, 1036, 4),
(473, 1045, 1),
(474, 1031, 3),
(475, 1023, 1),
(476, 1025, 7),
(477, 1004, 3),
(478, 1029, 6),
(479, 1005, 1),
(480, 1026, 7),
(481, 1004, 1),
(482, 1042, 4),
(483, 1004, 7),
(484, 1017, 3),
(485, 1010, 7),
(486, 1048, 4),
(487, 1054, 7),
(488, 1011, 6),
(489, 1010, 2),
(490, 1057, 3),
(491, 1030, 4),
(492, 1032, 4),
(493, 1030, 2),
(494, 1030, 1),
(495, 1045, 7),
(496, 1041, 5),
(497, 1005, 5),
(498, 1053, 5),
(499, 1028, 5),
(500, 1009, 6),
(501, 1056, 1),
(502, 1054, 2),
(503, 1055, 3),
(504, 1052, 6),
(505, 1008, 6),
(506, 1047, 7),
(507, 1022, 6),
(508, 1013, 7),
(509, 1056, 3),
(510, 1024, 3),
(511, 1035, 5),
(512, 1046, 4),
(513, 1031, 2),
(514, 1061, 2),
(515, 1041, 7),
(516, 1038, 7),
(517, 1046, 6),
(518, 1035, 4),
(519, 1036, 5),
(520, 1016, 2),
(521, 1063, 4),
(522, 1038, 3),
(523, 1006, 6),
(524, 1007, 3),
(525, 1006, 2),
(526, 1021, 5),
(527, 1021, 2),
(528, 1049, 5),
(529, 1062, 4),
(530, 1009, 2),
(531, 1029, 5),
(532, 1015, 3),
(533, 1058, 3),
(534, 1022, 1),
(535, 1012, 6),
(536, 1014, 2),
(537, 1028, 3),
(538, 1026, 1),
(539, 1019, 4),
(540, 1025, 3),
(541, 1033, 2),
(542, 1050, 7),
(543, 1035, 1),
(544, 1054, 3),
(545, 1012, 4),
(546, 1043, 6),
(547, 1011, 3),
(548, 1023, 2),
(549, 1043, 7),
(550, 1039, 6),
(551, 1060, 1),
(552, 1031, 4),
(553, 1032, 3),
(554, 1024, 5),
(555, 1044, 5),
(556, 1020, 6),
(557, 1044, 2),
(558, 1044, 4),
(559, 1024, 4),
(560, 1021, 4),
(561, 1007, 1),
(562, 1034, 2),
(563, 1013, 1),
(564, 1041, 2),
(565, 1013, 3),
(566, 1008, 5),
(567, 1035, 3),
(568, 1050, 3),
(569, 1041, 6),
(570, 1027, 1),
(571, 1037, 1),
(572, 1053, 3),
(573, 1006, 1),
(574, 1034, 3),
(575, 1010, 6),
(576, 1061, 6),
(577, 1061, 5),
(578, 1038, 6),
(579, 1042, 3),
(580, 1020, 5),
(581, 1043, 3),
(582, 1047, 5),
(583, 1051, 4);

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE IF NOT EXISTS `enfant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `famille_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_famille_enfant` (`famille_id`),
  KEY `fk_section_enfant` (`classe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=301 ;

--
-- Contenu de la table `enfant`
--

INSERT INTO `enfant` (`id`, `famille_id`, `classe_id`, `nom`, `prenom`, `date_naissance`) VALUES
(1, 190, 457, 'Andrieu', 'Corderoy', '2003-06-06'),
(2, 134, 486, 'Lovstrom', 'Inglesent', '1998-06-26'),
(3, 147, 518, 'Raiment', 'Side', '2000-04-05'),
(4, 202, 487, 'Howlings', 'McKernon', '2001-09-30'),
(5, 207, 476, 'Bashford', 'Colomb', '2002-01-17'),
(6, 171, 371, 'Youhill', 'Giraldo', '2001-11-15'),
(7, 129, 444, 'Leads', 'Siggin', '2002-03-02'),
(8, 149, 508, 'Oiseau', 'Embery', '2001-01-08'),
(9, 210, 519, 'Russi', 'Greengrass', '2001-07-19'),
(10, 145, 381, 'Celli', 'Meineking', '2000-01-20'),
(11, 133, 360, 'Sanpere', 'Clawsley', '2005-01-25'),
(12, 150, 554, 'Otton', 'Hague', '2000-03-09'),
(13, 160, 571, 'Lettuce', 'O'' Concannon', '2002-05-23'),
(14, 164, 562, 'Hemerijk', 'Spiring', '1999-05-14'),
(15, 211, 556, 'Senescall', 'Knapton', '2005-05-17'),
(16, 156, 573, 'Knudsen', 'Prosek', '2004-11-22'),
(17, 160, 562, 'Lettuce', 'Croxford', '1999-02-16'),
(18, 195, 539, 'Gleaves', 'Done', '2000-06-11'),
(19, 209, 443, 'Paolone', 'Hinemoor', '1999-06-13'),
(20, 177, 487, 'Duffett', 'Oakinfold', '2001-03-14'),
(21, 208, 420, 'MacKeig', 'Janczewski', '2003-01-08'),
(22, 189, 440, 'Raoux', 'Ziemke', '2001-08-13'),
(23, 147, 553, 'Raiment', 'Claiton', '2003-10-23'),
(24, 154, 527, 'Meins', 'Cubberley', '1999-06-04'),
(25, 152, 529, 'Preene', 'Jerok', '2004-03-24'),
(26, 126, 558, 'Held', 'Senussi', '2001-03-29'),
(27, 137, 369, 'Vasichev', 'Pleager', '2002-02-14'),
(28, 152, 404, 'Preene', 'Kraut', '2001-09-27'),
(29, 211, 575, 'Senescall', 'Caulcutt', '2002-08-04'),
(30, 206, 412, 'Bontine', 'Eldin', '2005-11-16'),
(31, 169, 534, 'Beszant', 'Mayberry', '2000-05-15'),
(32, 189, 552, 'Raoux', 'Yukhnov', '1999-11-10'),
(33, 211, 568, 'Senescall', 'Bruckman', '2002-12-12'),
(34, 148, 392, 'Hartwell', 'Burdfield', '2004-05-30'),
(35, 209, 440, 'Paolone', 'Linke', '1999-06-29'),
(36, 139, 379, 'Issacof', 'MacQueen', '2001-05-16'),
(37, 136, 502, 'Battisson', 'Mateiko', '2005-07-08'),
(38, 127, 563, 'Mathew', 'Goodlud', '2005-11-30'),
(39, 142, 560, 'Swaysland', 'Fancott,', '2004-02-13'),
(40, 200, 472, 'Dullard', 'Goggey', '2003-07-31'),
(41, 139, 542, 'Issacof', 'Kemery', '2003-01-04'),
(42, 166, 452, 'Drew', 'Rowena', '2003-05-27'),
(43, 173, 533, 'Guiu', 'Sinton', '2002-12-13'),
(44, 175, 457, 'Hoodspeth', 'Gunbie', '2004-05-30'),
(45, 164, 458, 'Hemerijk', 'Girogetti', '2000-03-13'),
(46, 194, 421, 'Bootherstone', 'Cicutto', '1998-10-06'),
(47, 171, 516, 'Youhill', 'Kingcote', '2005-03-13'),
(48, 209, 422, 'Paolone', 'Mongenot', '2001-12-05'),
(49, 152, 455, 'Preene', 'Webber', '2005-09-24'),
(50, 145, 566, 'Celli', 'Youhill', '1999-02-19'),
(51, 177, 484, 'Duffett', 'Southcoat', '2004-11-27'),
(52, 141, 452, 'Boxen', 'Winslow', '2001-04-01'),
(53, 149, 407, 'Oiseau', 'Prattington', '2000-11-23'),
(54, 170, 503, 'Swain', 'Schaumaker', '1999-12-16'),
(55, 175, 368, 'Hoodspeth', 'Jenik', '2000-03-28'),
(56, 193, 409, 'Schoroder', 'Denziloe', '1999-11-26'),
(57, 136, 445, 'Battisson', 'Thurlow', '1999-03-08'),
(58, 130, 417, 'Brager', 'Mussington', '2001-11-11'),
(59, 197, 500, 'Chancellor', 'Gallally', '1999-04-29'),
(60, 210, 360, 'Russi', 'Speedy', '2000-10-15'),
(61, 187, 437, 'Ribou', 'Kordovani', '2002-04-16'),
(62, 139, 557, 'Issacof', 'Risen', '2000-10-06'),
(63, 129, 395, 'Leads', 'Sturney', '2003-03-04'),
(64, 145, 579, 'Celli', 'Dinse', '2004-07-05'),
(65, 178, 556, 'Dallewater', 'Savage', '2003-05-26'),
(66, 171, 440, 'Youhill', 'Insole', '2005-08-27'),
(67, 200, 578, 'Dullard', 'Samter', '2002-12-02'),
(68, 206, 432, 'Bontine', 'Spoward', '2004-10-08'),
(69, 131, 401, 'Cotherill', 'Klimontovich', '1998-10-12'),
(70, 132, 404, 'Cappleman', 'Toward', '2004-03-13'),
(71, 144, 487, 'Mattheus', 'Klossek', '2002-10-07'),
(72, 178, 428, 'Dallewater', 'Eydel', '2005-01-06'),
(73, 128, 482, 'Budnk', 'Moogan', '2001-11-29'),
(74, 158, 413, 'Mattisssen', 'Churching', '2004-07-15'),
(75, 148, 552, 'Hartwell', 'Hurn', '2004-02-18'),
(76, 192, 531, 'Yewen', 'Faulconbridge', '2002-07-10'),
(77, 190, 569, 'Andrieu', 'Flemming', '2004-09-19'),
(78, 140, 434, 'Kubis', 'Fasham', '2004-07-14'),
(79, 174, 403, 'Harewood', 'Thrussell', '2003-04-27'),
(80, 204, 362, 'Barnwill', 'Milmoe', '2005-02-22'),
(81, 141, 564, 'Boxen', 'Casely', '2002-01-05'),
(82, 209, 430, 'Paolone', 'Tye', '2002-05-15'),
(83, 137, 544, 'Vasichev', 'enzley', '2002-08-28'),
(84, 204, 523, 'Barnwill', 'Hegel', '2001-06-21'),
(85, 199, 465, 'Dayment', 'Perrelli', '1998-07-16'),
(86, 133, 390, 'Sanpere', 'Hamper', '1999-04-25'),
(87, 169, 447, 'Beszant', 'Battson', '2003-07-13'),
(88, 143, 388, 'Dirand', 'Lount', '2001-12-07'),
(89, 177, 562, 'Duffett', 'Hand', '1998-06-20'),
(90, 135, 470, 'Beecham', 'Illwell', '2000-09-08'),
(91, 162, 506, 'Cockaday', 'Bunyan', '2003-10-08'),
(92, 176, 578, 'Hosby', 'Westover', '2000-05-05'),
(93, 147, 537, 'Raiment', 'Muckart', '2000-10-26'),
(94, 130, 450, 'Brager', 'Teresia', '2002-01-09'),
(95, 138, 454, 'Scorton', 'Sinfield', '2003-12-17'),
(96, 153, 483, 'Jeanet', 'Cluderay', '2001-03-30'),
(97, 185, 532, 'Sheards', 'Pickavance', '2000-01-26'),
(98, 208, 532, 'MacKeig', 'Wyett', '2003-05-18'),
(99, 169, 535, 'Beszant', 'Stoner', '1998-11-11'),
(100, 202, 455, 'Howlings', 'Frigot', '1999-09-27'),
(101, 153, 412, 'Jeanet', 'Phipps', '1998-12-07'),
(102, 190, 504, 'Andrieu', 'Fawbert', '2002-06-01'),
(103, 130, 527, 'Brager', 'Trorey', '2001-01-30'),
(104, 177, 433, 'Duffett', 'Bergstrand', '2003-03-11'),
(105, 206, 541, 'Bontine', 'Murra', '2004-08-07'),
(106, 186, 487, 'Sandry', 'Hallbord', '2005-05-11'),
(107, 196, 434, 'Styles', 'Southcomb', '2003-08-13'),
(108, 139, 486, 'Issacof', 'Sherwood', '2004-02-02'),
(109, 162, 492, 'Cockaday', 'Brickham', '1998-08-06'),
(110, 182, 509, 'Le Lievre', 'Feakins', '2003-10-02'),
(111, 192, 362, 'Yewen', 'Connors', '2001-08-13'),
(112, 172, 478, 'Rossant', 'Rootes', '2002-11-04'),
(113, 173, 440, 'Guiu', 'Plampin', '2005-12-23'),
(114, 126, 401, 'Held', 'Moriarty', '2001-02-01'),
(115, 181, 429, 'Tilbrook', 'Bentje', '2005-01-26'),
(116, 197, 392, 'Chancellor', 'Winterson', '2004-05-06'),
(117, 152, 486, 'Preene', 'Pincott', '2000-10-19'),
(118, 164, 387, 'Hemerijk', 'Creebo', '2004-05-25'),
(119, 155, 392, 'Kagan', 'Gianuzzi', '2002-06-29'),
(120, 147, 372, 'Raiment', 'Treker', '1999-05-10'),
(121, 134, 505, 'Lovstrom', 'Robey', '1999-05-25'),
(122, 195, 491, 'Gleaves', 'Dengate', '2002-01-10'),
(123, 171, 497, 'Youhill', 'Eick', '2000-09-27'),
(124, 202, 405, 'Howlings', 'Minot', '2005-09-29'),
(125, 129, 581, 'Leads', 'Cuttle', '2003-06-29'),
(126, 162, 457, 'Cockaday', 'Toupe', '2004-07-30'),
(127, 145, 537, 'Celli', 'Grzes', '2001-09-28'),
(128, 144, 521, 'Mattheus', 'Chettoe', '2002-05-19'),
(129, 194, 530, 'Bootherstone', 'Sultana', '2002-06-12'),
(130, 166, 386, 'Drew', 'Blankley', '2001-07-27'),
(131, 128, 490, 'Budnk', 'Cockerham', '2005-10-29'),
(132, 168, 539, 'Phythean', 'Shiel', '1999-04-20'),
(133, 174, 388, 'Harewood', 'Turnell', '2001-04-02'),
(134, 170, 439, 'Swain', 'Newlan', '2000-05-18'),
(135, 158, 521, 'Mattisssen', 'Yarn', '2000-11-09'),
(136, 130, 554, 'Brager', 'McKendry', '2004-12-10'),
(137, 145, 421, 'Celli', 'Tow', '2000-01-16'),
(138, 152, 476, 'Preene', 'Sumers', '1998-11-26'),
(139, 211, 392, 'Senescall', 'Vidler', '2004-11-21'),
(140, 180, 423, 'Cockarill', 'Sketh', '1998-09-07'),
(141, 136, 381, 'Battisson', 'Matyatin', '1999-08-01'),
(142, 168, 390, 'Phythean', 'Williamson', '2003-01-17'),
(143, 186, 561, 'Sandry', 'Stobbe', '2005-11-02'),
(144, 191, 535, 'Goggan', 'Castleton', '2001-09-11'),
(145, 150, 431, 'Otton', 'Feria', '1998-11-08'),
(146, 129, 437, 'Leads', 'Crix', '1999-10-22'),
(147, 208, 458, 'MacKeig', 'Jiranek', '2001-12-16'),
(148, 142, 451, 'Swaysland', 'Moulsdall', '2003-09-09'),
(149, 201, 397, 'Walak', 'Madgewick', '2005-08-01'),
(150, 157, 439, 'Aubin', 'Jarrard', '1998-05-15'),
(151, 186, 540, 'Sandry', 'Sex', '2001-06-07'),
(152, 161, 534, 'Dowtry', 'Robbs', '2002-03-07'),
(153, 207, 565, 'Bashford', 'Ternault', '2000-03-29'),
(154, 208, 408, 'MacKeig', 'Tincombe', '2002-01-18'),
(155, 161, 424, 'Dowtry', 'Harte', '2003-03-03'),
(156, 177, 540, 'Duffett', 'Vogeller', '2002-10-31'),
(157, 135, 501, 'Beecham', 'Extence', '2003-09-05'),
(158, 204, 404, 'Barnwill', 'Littlejohns', '2003-07-24'),
(159, 136, 417, 'Battisson', 'Clausson', '1999-01-25'),
(160, 185, 469, 'Sheards', 'Sisley', '2005-09-27'),
(161, 179, 478, 'Flattman', 'Gajownik', '2003-04-02'),
(162, 128, 580, 'Budnk', 'Zink', '2001-10-28'),
(163, 145, 365, 'Celli', 'Tillot', '2002-08-03'),
(164, 134, 377, 'Lovstrom', 'Balharry', '2001-12-15'),
(165, 190, 506, 'Andrieu', 'Woolward', '2002-07-16'),
(166, 147, 467, 'Raiment', 'Aldam', '2004-05-19'),
(167, 151, 480, 'Hansberry', 'Vogeller', '1998-09-14'),
(168, 141, 430, 'Boxen', 'Shirt', '2002-09-07'),
(169, 138, 502, 'Scorton', 'Slograve', '1999-08-28'),
(170, 166, 446, 'Drew', 'Knuckles', '2002-01-01'),
(171, 152, 364, 'Preene', 'Fike', '2001-12-18'),
(172, 174, 454, 'Harewood', 'Bladesmith', '2001-02-19'),
(173, 184, 452, 'Skinn', 'Keay', '2001-04-05'),
(174, 141, 433, 'Boxen', 'Sprowles', '2004-06-11'),
(175, 189, 361, 'Raoux', 'Morad', '2005-07-14'),
(176, 166, 373, 'Drew', 'Ringer', '2004-10-13'),
(177, 130, 498, 'Brager', 'Lemon', '2001-11-18'),
(178, 209, 576, 'Paolone', 'Coning', '2005-06-01'),
(179, 185, 408, 'Sheards', 'Barge', '2004-08-26'),
(180, 143, 427, 'Dirand', 'Camings', '1999-05-08'),
(181, 185, 544, 'Sheards', 'Cleaveland', '2000-05-27'),
(182, 173, 522, 'Guiu', 'Hasluck', '2003-05-30'),
(183, 190, 518, 'Andrieu', 'Elcox', '2004-01-04'),
(184, 154, 361, 'Meins', 'Brauns', '2004-06-27'),
(185, 156, 488, 'Knudsen', 'Targett', '2003-05-27'),
(186, 173, 486, 'Guiu', 'Selliman', '2003-06-18'),
(187, 162, 469, 'Cockaday', 'Sidery', '2000-05-31'),
(188, 183, 578, 'Harniman', 'Imos', '2004-05-09'),
(189, 206, 482, 'Bontine', 'Hemphall', '2002-10-29'),
(190, 127, 467, 'Mathew', 'Tootell', '2002-04-25'),
(191, 173, 574, 'Guiu', 'Luetchford', '2002-01-12'),
(192, 189, 538, 'Raoux', 'Kemmis', '2003-12-28'),
(193, 177, 517, 'Duffett', 'Cozzi', '1998-05-13'),
(194, 187, 382, 'Ribou', 'Conlaund', '2002-07-20'),
(195, 179, 458, 'Flattman', 'Uphill', '2003-01-09'),
(196, 146, 477, 'Horbart', 'Dovey', '1998-10-15'),
(197, 207, 454, 'Bashford', 'Taig', '1999-02-18'),
(198, 172, 445, 'Rossant', 'Balthasar', '2005-12-08'),
(199, 138, 551, 'Scorton', 'Vinau', '2002-02-26'),
(200, 187, 582, 'Ribou', 'Geraldez', '1998-06-10'),
(201, 195, 505, 'Gleaves', 'Selborne', '1999-10-03'),
(202, 135, 393, 'Beecham', 'Riolfo', '2000-03-17'),
(203, 208, 364, 'MacKeig', 'Quare', '2004-10-29'),
(204, 199, 388, 'Dayment', 'Harnwell', '2001-02-23'),
(205, 209, 463, 'Paolone', 'Derx', '2005-11-04'),
(206, 182, 581, 'Le Lievre', 'Paulat', '2004-10-10'),
(207, 208, 574, 'MacKeig', 'Locke', '2004-05-15'),
(208, 195, 412, 'Gleaves', 'Stevani', '2004-06-05'),
(209, 143, 428, 'Dirand', 'Stockney', '2000-04-14'),
(210, 133, 433, 'Sanpere', 'Jagson', '2002-10-28'),
(211, 138, 497, 'Scorton', 'Messager', '2003-05-08'),
(212, 197, 581, 'Chancellor', 'Metterick', '2004-12-12'),
(213, 151, 452, 'Hansberry', 'Dorken', '2003-04-25'),
(214, 165, 485, 'Tomenson', 'Isbell', '2004-12-01'),
(215, 168, 547, 'Phythean', 'Wraxall', '2001-06-23'),
(216, 165, 582, 'Tomenson', 'Sapena', '2000-11-21'),
(217, 195, 506, 'Gleaves', 'Oxherd', '2002-07-09'),
(218, 186, 403, 'Sandry', 'Rugg', '2003-09-25'),
(219, 206, 512, 'Bontine', 'Fantonetti', '2003-10-25'),
(220, 160, 550, 'Lettuce', 'MacAirt', '2004-04-02'),
(221, 209, 405, 'Paolone', 'MacEllen', '1999-04-29'),
(222, 190, 451, 'Andrieu', 'Fleury', '2002-03-18'),
(223, 159, 491, 'Benezeit', 'Cullerne', '2003-11-13'),
(224, 195, 376, 'Gleaves', 'Rizon', '2001-03-09'),
(225, 209, 387, 'Paolone', 'Colbeck', '2001-07-23'),
(226, 194, 405, 'Bootherstone', 'Cristofolo', '2005-02-10'),
(227, 126, 370, 'Held', 'Bedome', '2004-08-05'),
(228, 129, 489, 'Leads', 'Roffe', '1998-09-04'),
(229, 138, 553, 'Scorton', 'Tomsu', '2005-04-11'),
(230, 193, 404, 'Schoroder', 'MacGillivray', '2003-11-04'),
(231, 207, 409, 'Bashford', 'Dreier', '2003-05-14'),
(232, 168, 493, 'Phythean', 'Hammerberger', '2002-05-27'),
(233, 197, 416, 'Chancellor', 'Parradine', '2005-04-15'),
(234, 128, 450, 'Budnk', 'Vigors', '2005-12-24'),
(235, 207, 538, 'Bashford', 'Rey', '2005-12-08'),
(236, 205, 465, 'Brik', 'Akeherst', '2002-03-24'),
(237, 160, 558, 'Lettuce', 'Sloyan', '2002-04-12'),
(238, 185, 413, 'Sheards', 'Wind', '2002-08-23'),
(239, 205, 378, 'Brik', 'Bownde', '2004-08-27'),
(240, 162, 476, 'Cockaday', 'Common', '2003-05-12'),
(241, 140, 580, 'Kubis', 'Smale', '2003-01-01'),
(242, 166, 545, 'Drew', 'Spong', '2004-01-19'),
(243, 140, 502, 'Kubis', 'MacIlriach', '1999-06-27'),
(244, 166, 552, 'Drew', 'Garwill', '2003-10-20'),
(245, 170, 373, 'Swain', 'Parrett', '2001-03-05'),
(246, 179, 463, 'Flattman', 'Van Salzberger', '2005-10-02'),
(247, 146, 523, 'Horbart', 'Edgler', '2004-08-08'),
(248, 192, 552, 'Yewen', 'Fairlem', '1998-12-31'),
(249, 201, 475, 'Walak', 'Giron', '2004-02-16'),
(250, 173, 370, 'Guiu', 'Chaves', '2004-07-03'),
(251, 202, 406, 'Howlings', 'Kille', '2004-12-16'),
(252, 209, 480, 'Paolone', 'Beers', '2004-08-14'),
(253, 182, 367, 'Le Lievre', 'Dulling', '2005-06-27'),
(254, 207, 574, 'Bashford', 'Probin', '1999-05-17'),
(255, 173, 563, 'Guiu', 'Boswell', '1999-01-15'),
(256, 210, 456, 'Russi', 'Hedden', '2002-09-11'),
(257, 130, 368, 'Brager', 'Noon', '2004-08-19'),
(258, 135, 467, 'Beecham', 'Kettow', '2003-06-14'),
(259, 211, 570, 'Senescall', 'Matthius', '2004-11-30'),
(260, 177, 445, 'Duffett', 'Pattie', '2002-08-22'),
(261, 162, 528, 'Cockaday', 'Tribble', '1998-10-18'),
(262, 194, 569, 'Bootherstone', 'McDoual', '2000-12-20'),
(263, 199, 407, 'Dayment', 'Castagneto', '2001-07-19'),
(264, 126, 514, 'Held', 'Pogosian', '2000-10-25'),
(265, 193, 456, 'Schoroder', 'Dykes', '2005-08-14'),
(266, 134, 360, 'Lovstrom', 'Eton', '1999-06-10'),
(267, 170, 381, 'Swain', 'Yanuk', '2001-03-12'),
(268, 190, 485, 'Andrieu', 'Stoller', '2001-08-15'),
(269, 132, 393, 'Cappleman', 'Duplock', '1998-05-24'),
(270, 188, 492, 'Tiffany', 'Facchini', '2005-10-19'),
(271, 198, 421, 'Wiffler', 'Driffill', '1999-11-24'),
(272, 165, 474, 'Tomenson', 'Chiplen', '2002-05-29'),
(273, 140, 488, 'Kubis', 'Boullin', '2001-04-28'),
(274, 179, 380, 'Flattman', 'Gini', '2002-10-09'),
(275, 209, 512, 'Paolone', 'Fetherstonhaugh', '1999-03-14'),
(276, 209, 449, 'Paolone', 'MacKilroe', '1999-05-02'),
(277, 139, 561, 'Issacof', 'Pettican', '2001-11-03'),
(278, 132, 399, 'Cappleman', 'Sappy', '1998-12-04'),
(279, 171, 396, 'Youhill', 'Clayworth', '1998-05-21'),
(280, 165, 562, 'Tomenson', 'Kornyshev', '2003-05-21'),
(281, 139, 486, 'Issacof', 'Farrear', '2003-01-31'),
(282, 185, 361, 'Sheards', 'Laherty', '2004-10-04'),
(283, 203, 399, 'Saul', 'Burnup', '2004-02-22'),
(284, 144, 556, 'Mattheus', 'Kunert', '2002-02-08'),
(285, 146, 429, 'Horbart', 'Lough', '2002-03-19'),
(286, 205, 424, 'Brik', 'Onyon', '2003-04-04'),
(287, 166, 496, 'Drew', 'Shields', '2005-04-24'),
(288, 192, 535, 'Yewen', 'Lupton', '2001-08-13'),
(289, 203, 581, 'Saul', 'Thirkettle', '2003-10-16'),
(290, 146, 441, 'Horbart', 'Quirke', '2002-03-27'),
(291, 187, 500, 'Ribou', 'Rowbotham', '1998-11-28'),
(292, 184, 488, 'Skinn', 'Lebbon', '2003-05-28'),
(293, 154, 415, 'Meins', 'Toolin', '1999-04-06'),
(294, 147, 386, 'Raiment', 'Dowears', '2003-05-02'),
(295, 143, 377, 'Dirand', 'Noon', '2003-04-03'),
(296, 180, 563, 'Cockarill', 'Munton', '2000-06-26'),
(297, 199, 383, 'Dayment', 'Orlton', '1998-10-09'),
(298, 152, 374, 'Preene', 'Presidey', '2003-09-23'),
(299, 167, 437, 'Petruk', 'McGuiness', '2003-06-28'),
(300, 131, 526, 'Cotherill', 'Burkill', '2001-10-01');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1064 ;

--
-- Contenu de la table `etablissement`
--

INSERT INTO `etablissement` (`id`, `nom`, `telephone`) VALUES
(1004, 'Lycée professionnel Alexandre Bérard', '08 33 30 90 18'),
(1005, 'Collège Saint-Exupéry', '07 03 42 93 06'),
(1006, 'Collège Roger Poulnard', '01 31 68 62 49'),
(1007, 'Lycée polyvalent Saint-Exupéry', '07 60 70 43 11'),
(1008, 'Collège Saint-Exupéry', '05 45 21 70 97'),
(1009, 'Lycée général et technologique du Bugey', '01 06 25 58 52'),
(1010, 'Lycée général Lalande', '07 36 30 12 37'),
(1011, 'Lycée général et technologique Edgar Quinet', '09 92 36 50 59'),
(1012, 'Lycée général et technologique Joseph-Marie Carriat', '06 99 60 72 62'),
(1013, 'Lycée professionnel Carriat', '05 59 25 48 28'),
(1014, 'Collège du Revermont', '05 68 94 78 73'),
(1015, 'Collège Henry Dunant', '01 66 57 85 22'),
(1016, 'Collège Georges Charpak', '06 91 93 07 82'),
(1017, 'Collège Paul Sixdenier', '09 10 18 52 02'),
(1018, 'Collège Paul Claudel', '09 92 99 60 64'),
(1019, 'Lycée polyvalent Xavier Bichat', '06 09 34 99 39'),
(1020, 'Lycée polyvalent Paul Painlevé', '06 14 49 27 70'),
(1021, 'Collège Louis Lumière', '00 13 38 26 52'),
(1022, 'Collège Roger Vailland', '09 76 43 58 06'),
(1023, 'Collège Louise de Savoie', '06 56 15 91 39'),
(1024, 'Collège de l''Albarine', '00 69 24 43 78'),
(1025, 'Collège Louis Vuitton', '06 84 55 23 04'),
(1026, 'Collège Vaugelas', '01 20 67 72 03'),
(1027, 'Collège Bel Air', '04 54 32 50 18'),
(1028, 'Collège du Renon', '01 91 94 16 38'),
(1029, 'Collège Jean Moulin', '07 17 10 74 06'),
(1030, 'Collège privé de la Sidoine', '03 60 21 11 26'),
(1031, 'Lycée professionnel privé Saint Joseph', '04 42 67 01 15'),
(1032, 'Collège du Valromey', '02 36 84 99 22'),
(1033, 'Collège Emile Cizain', '00 17 77 43 78'),
(1034, 'Collège Ampère', '07 71 47 33 31'),
(1035, 'Lycée professionnel privé Saint Joseph', '04 19 92 57 54'),
(1036, 'Collège George Sand', '02 95 13 23 07'),
(1037, 'Collège Eugène Dubois', '09 77 81 90 56'),
(1038, 'Collège de Brou', '04 04 98 09 75'),
(1039, 'Lycée polyvalent privé Jeanne d''Arc', '02 40 36 65 79'),
(1041, 'Collège international', '06 01 57 97 25'),
(1042, 'Collège Les Côtes', '08 04 29 69 26'),
(1043, 'Collège Léon Comas', '03 76 75 29 94'),
(1044, 'Collège Victoire Daubié', '01 81 59 68 95'),
(1045, 'Collège Jacques Prévert', '05 34 51 45 48'),
(1046, 'Collège Jean Rostand', '07 02 83 72 14'),
(1047, 'Lycée professionnel du Bugey', '03 31 81 65 57'),
(1048, 'Collège Marcel Anthonioz', '03 08 62 08 41'),
(1049, 'Collège Louis Dumont', '00 93 25 77 72'),
(1050, 'Collège du Bugey', '00 28 90 84 80'),
(1051, 'Collège Xavier Bichat', '08 46 16 82 60'),
(1052, 'Collège Antoine Chintreuil', '03 44 44 14 48'),
(1053, 'Collège Le Grand Cèdre', '04 68 86 66 46'),
(1054, 'Lycée professionnel Gabriel Voisin', '04 69 17 16 70'),
(1055, 'Lycée polyvalent Arbez Carme', '01 64 15 03 81'),
(1056, 'Collège Marcel Aymé', '05 95 24 17 46'),
(1057, 'Collège privé Ensemble scolaire Lamartine', '08 24 96 05 86'),
(1058, 'Collège privé Saint Joseph', '06 72 38 61 17'),
(1059, 'Collège Léon-Marie Fournet', '05 06 30 50 74'),
(1060, 'Lycée général et technologique de la Plaine de l''Ain', '02 50 37 09 10'),
(1061, 'Collège de la Dombes', '07 81 08 10 07'),
(1062, 'Lycée professionnel privé Ensemble scolaire Lamartine', '08 35 26 46 90'),
(1063, 'Collège Thomas Riboud', '02 25 31 48 91');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat` varchar(255) NOT NULL,
  `decote` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`id`, `etat`, `decote`) VALUES
(1, 'Très bon', 25),
(2, 'Bon', 40),
(3, 'Assez bon', 50),
(4, 'Endommagé', 65);

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire_occasion`
--

CREATE TABLE IF NOT EXISTS `exemplaire_occasion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `livre_id` int(11) NOT NULL,
  `famille_acheteuse_id` int(11) DEFAULT NULL,
  `famille_vendeuse_id` int(11) NOT NULL,
  `etat_id` int(11) NOT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `date_depot` date DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_etat_exemplaire_occasion` (`etat_id`),
  KEY `fk_famille_acheteuse_exemplaire_occasion` (`famille_acheteuse_id`),
  KEY `fk_famille_vendeuse_exemplaire_occasion` (`famille_vendeuse_id`),
  KEY `fk_livre_exemplaire_occasion` (`livre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE IF NOT EXISTS `famille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adhesion_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adhesion_id` (`adhesion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=212 ;

--
-- Contenu de la table `famille`
--

INSERT INTO `famille` (`id`, `adhesion_id`, `nom`, `code_postal`, `ville`, `adresse`, `telephone`) VALUES
(126, 1, 'Held', '50330', 'ST PIERRE EGLISE', '13 RUE GEORGES BIZET', '09 31 05 29 01'),
(127, 2, 'Mathew', '21330', 'LAIGNES', '40 CHEMIN DU RATEAU', '01 57 39 10 17'),
(128, 2, 'Budnk', '26190', 'ST THOMAS EN ROYANS', '31 AVENUE LEO LAGRANGE', '01 79 96 45 51'),
(129, 2, 'Leads', '12390', 'AUZITS', '4 ALLEE DES CROCUS', '08 73 61 30 31'),
(130, 2, 'Brager', '25250', 'FAIMBE', '4 RUE FRANCIS DE PRESSENSE', '03 06 31 44 41'),
(131, 2, 'Cotherill', '56750', 'DAMGAN', '95 RUE MARGUERITE YOURCENAR', '08 07 76 23 76'),
(132, 2, 'Cappleman', '50810', 'ST GERMAIN D ELLE', '31 RUE RENE CASSIN', '02 99 05 07 50'),
(133, 1, 'Sanpere', '55200', 'PONT SUR MEUSE', '18 SQUARE DES VIREES MARTIN', '01 85 18 73 37'),
(134, 2, 'Lovstrom', '60460', 'PRECY SUR OISE', '24 ALLEE SARAH BERNHARDT', '05 74 26 10 41'),
(135, 1, 'Beecham', '26740', 'LA COUCOURDE', '21 IMPASSE DE L HOPITAL', '08 33 39 43 59'),
(136, 2, 'Battisson', '59144', 'JENLAIN', '90 ALLEE RENE CLAIR', '00 18 15 61 85'),
(137, 1, 'Vasichev', '70200', 'FROIDETERRE', '18 RUE ALFRED DE VIGNY', '05 31 62 02 48'),
(138, 2, 'Scorton', '94270', 'LE KREMLIN BICETRE', '85 ALLEE FLORA TRISTAN', '03 23 41 34 04'),
(139, 1, 'Issacof', '89660', 'LICHERES SUR YONNE', '13 AVENUE DE LA FORME ECLUSE', '02 83 63 19 00'),
(140, 2, 'Kubis', '78130', 'LES MUREAUX', '21 RUE JULES VERNE', '05 34 63 61 47'),
(141, 2, 'Boxen', '59310', 'AUCHY LEZ ORCHIES', '42 RUE DES CELTES', '01 42 01 96 69'),
(142, 2, 'Swaysland', '97355', 'MACOURIA TONATE', '45 ALLEE ELSA TRIOLET', '04 96 38 67 73'),
(143, 1, 'Dirand', '70800', 'PLAINEMONT', '7 CHEMIN DE SIRIFF', '00 61 32 45 55'),
(144, 1, 'Mattheus', '50520', 'CHERENCE LE ROUSSEL', '18 CHEMIN DE BRANCIEUX', '03 87 76 03 78'),
(145, 2, 'Celli', '82340', 'DUNES', '18 ALLEE DES ALBATROS', '03 37 16 97 53'),
(146, 2, 'Horbart', '30140', 'MIALET', '63 ALLEE DU GALION', '09 65 33 85 22'),
(147, 1, 'Raiment', '24330', 'LA DOUZE', '13 RUE PIERRE DE MARIVAUX', '03 30 93 57 80'),
(148, 2, 'Hartwell', '14290', 'CERNAY', '49 RUE OLYMPE DE GOUGES', '07 44 57 76 71'),
(149, 1, 'Oiseau', '43000', 'POLIGNAC', '42 IMPASSE EMILE MICHEL LOUMEAU', '06 97 29 55 59'),
(150, 2, 'Otton', '70400', 'CHENEBIER', '92 CHEMIN DE LA CROIX BERTHO', '04 17 06 21 77'),
(151, 1, 'Hansberry', '86140', 'SCORBE CLAIRVAUX', '14 PLACE DE BEL AIR', '00 16 28 65 33'),
(152, 2, 'Preene', '73130', 'NOTRE DAME DU CRUET', '2 ROND-POINT DE FONDELINE', '07 59 54 80 22'),
(153, 2, 'Jeanet', '59173', 'EBBLINGHEM', '50 RUE EMILE LITTRE', '07 21 60 88 85'),
(154, 1, 'Meins', '68440', 'LANDSER', '51 CHEMIN DE L''ILE D''ARMANGEO', '06 74 74 93 21'),
(155, 2, 'Kagan', '59260', 'LILLE', '6 RUE AUGUSTE PICCARD', '01 45 61 45 94'),
(156, 1, 'Knudsen', '10110', 'LANDREVILLE', '85 CHEMIN DES FREMAUDIERES', '06 68 97 79 77'),
(157, 2, 'Aubin', '36220', 'LURAIS', '40 ROUTE DES CARROIS DE CUNEIX', '08 60 51 30 42'),
(158, 2, 'Mattisssen', '11140', 'RODOME', '88 RUE EDOUARD BRANLY', '03 21 39 06 13'),
(159, 1, 'Benezeit', '16230', 'CELLETTES', '5 ALLEE DES MAGNOLIAS', '03 22 75 04 35'),
(160, 1, 'Lettuce', '77890', 'GARENTREVILLE', '20 RUE BENJAMIN FRANKLIN', '04 25 23 40 07'),
(161, 1, 'Dowtry', '73170', 'ST JEAN DE CHEVELU', '31 BOULEVARD DES APPRENTIS', '04 75 54 49 16'),
(162, 2, 'Cockaday', '45500', 'AUTRY LE CHATEL', '17 RUE GEORGES THUAUD', '02 03 26 88 68'),
(163, 2, 'Drewet', '25470', 'THIEBOUHANS', '53 RUE BAPTISTE MARCET', '01 14 78 99 55'),
(164, 2, 'Hemerijk', '13002', 'MARSEILLE', '39 SQUARE DE LA MUTUALITE', '08 69 72 58 97'),
(165, 1, 'Tomenson', '98792', 'TENARUNGA', '27 CHEMIN DES LANDES AUX MURES', '07 05 37 74 46'),
(166, 1, 'Drew', '61120', 'CROUTTES', '90 ROND-POINT DE CRAN NEUF', '02 60 74 52 06'),
(167, 1, 'Petruk', '14270', 'VIEUX FUME', '50 ALLEE DES COURLIS', '06 38 95 98 20'),
(168, 2, 'Phythean', '69650', 'QUINCIEUX', '13 CHEMIN DE LA PTE PATURE', '01 24 56 44 90'),
(169, 1, 'Beszant', '55170', 'AULNOIS EN PERTHOIS', '71 RUE DE VINCENNES', '09 30 35 57 16'),
(170, 1, 'Swain', '47350', 'MONTIGNAC TOUPINERIE', '8 AVENUE SUZANNE LENGLEN', '09 91 58 27 43'),
(171, 2, 'Youhill', '26400', 'FRANCILLON SUR ROUBION', '50 RUE NEUVE', '06 36 43 58 95'),
(172, 2, 'Rossant', '56580', 'ROHAN', '9 RUE ROBERT SURCOUF', '08 79 88 52 11'),
(173, 2, 'Guiu', '76660', 'SMERMESNIL', '19 PARKING DES QUATRE Z''HORLOGES', '07 76 71 74 43'),
(174, 1, 'Harewood', '76590', 'ST CRESPIN', '93 RUE SEVERINE', '04 63 90 11 88'),
(175, 2, 'Hoodspeth', '15160', 'VERNOLS', '31 PLACE DULCIE SEPTEMBER', '09 38 96 90 97'),
(176, 2, 'Hosby', '70200', 'AMBLANS ET VELOTTE', '85 ROUTE DES FOSSES MARTINEAUX', '09 85 21 37 77'),
(177, 2, 'Duffett', '19200', 'VALIERGUES', '21 AVENUE DE PLAISANCE', '07 73 07 77 94'),
(178, 2, 'Dallewater', '81150', 'FLORENTIN', '62 QUAI DE PENHOET', '03 09 21 45 25'),
(179, 1, 'Flattman', '38510', 'LE BOUCHAGE', '53 CHEMIN DE LA VILLE HEULIN', '03 68 79 47 82'),
(180, 1, 'Cockarill', '39120', 'ASNANS BEAUVOISIN', '65 RUE ANTOINE DE JUSSIEU', '07 85 56 20 93'),
(181, 1, 'Tilbrook', '37420', 'HUISMES', '100 RUE NICEPHORE NIEPCE', '02 04 25 93 53'),
(182, 1, 'Le Lievre', '36500', 'SOUGE', '46 ALLEE VINCENT VAN GOGH', '03 52 14 40 35'),
(183, 1, 'Harniman', '80290', 'GUIZANCOURT', '95 ALLEE DE L''ILE DE BOURDI', '06 11 97 50 76'),
(184, 2, 'Skinn', '78660', 'BOINVILLE LE GAILLARD', '78 SQUARE JEAN PAUL SARTRE', '07 46 64 21 77'),
(185, 2, 'Sheards', '27680', 'STE OPPORTUNE LA MARE', '33 CHEMIN DE LA CROIX BERTHO', '03 32 55 17 61'),
(186, 2, 'Sandry', '30330', 'GAUJAC', '6 ROND-POINT DE BRANCIEUX', '09 23 28 65 78'),
(187, 2, 'Ribou', '29600', 'PLOURIN LES MORLAIX', '9 PLACE JEAN BAPTISTE LULLI', '09 69 78 57 35'),
(188, 1, 'Tiffany', '47420', 'ALLONS', '46 RUE ALEXANDRE LEDRU ROLLIN', '08 43 16 96 61'),
(189, 2, 'Raoux', '77171', 'MELZ SUR SEINE', '2 ALLEE DES IRIS', '02 57 04 52 33'),
(190, 1, 'Andrieu', '28290', 'CHAPELLE ROYALE', '45 RUE AUGUSTE BAPTISTE LECHAT', '01 91 89 18 95'),
(191, 2, 'Goggan', '17270', 'NEUVICQ', '72 RUE DE CARDURAND', '01 63 48 00 22'),
(192, 1, 'Yewen', '15300', 'LAVEISSENET', '63 RUE DU GRAND ORMEAU', '03 07 28 80 96'),
(193, 1, 'Schoroder', '62138', 'BILLY BERCLAU', '98 ROUTE DE SAINT MARC', '03 27 68 36 22'),
(194, 2, 'Bootherstone', '18110', 'VASSELAY', '42 PLACE NADIA BOULANGER', '00 37 60 93 05'),
(195, 2, 'Gleaves', '24500', 'ST AUBIN DE CADELECH', '73 PARKING DU THEATRE', '02 78 36 88 83'),
(196, 2, 'Styles', '61410', 'ST OUEN LE BRISOULT', '19 PLACE JEAN BAPTISTE LULLI', '03 58 62 89 59'),
(197, 1, 'Chancellor', '66320', 'VINCA', '41 CHEMIN DES GARENNES', '03 76 83 35 79'),
(198, 2, 'Wiffler', '16240', 'LA FORET DE TESSE', '90 RUE PIERRE LAROUSSE', '08 25 57 88 05'),
(199, 2, 'Dayment', '31190', 'MIREMONT', '87 ALLEE DES ORCHIDEES', '01 38 61 83 73'),
(200, 1, 'Dullard', '78980', 'BREVAL', '82 IMPASSE LEONARD DE VINCI', '06 34 00 65 74'),
(201, 2, 'Walak', '57770', 'MOUSSEY', '36 ALLEE DE LA CARRIERE', '04 55 03 80 84'),
(202, 2, 'Howlings', '68780', 'BRETTEN', '53 RUE FRANCOIS RUDE', '01 20 58 83 58'),
(203, 2, 'Saul', '16250', 'ST LEGER', '90 ROUTE DES LANDETTES', '01 55 60 13 54'),
(204, 1, 'Barnwill', '91680', 'BRUYERES LE CHATEL', '75 ALLEE HENRI DECOIN', '07 67 64 62 78'),
(205, 2, 'Brik', '38210', 'TULLINS', '88 ROND-POINT DES FRENES', '03 54 54 96 07'),
(206, 2, 'Bontine', '61150', 'ECOUCHE LES VALLEES', '2 BOULEVARD PAUL LEFERME', '03 74 89 23 96'),
(207, 1, 'Bashford', '10340', 'BAGNEUX LA FOSSE', '99 RUE CHARLES DELESCLUZE', '04 19 50 25 43'),
(208, 2, 'MacKeig', '15340', 'MOURJOU', '14 RUE AUGUSTE COMTE', '05 52 15 92 07'),
(209, 1, 'Paolone', '62310', 'RADINGHEM', '75 RUE ANNIE GIRARDOT', '09 41 32 77 77'),
(210, 1, 'Russi', '63790', 'CHAMBON SUR LAC', '44 ROUTE DE LA FIN', '03 06 47 98 83'),
(211, 1, 'Senescall', '64410', 'LARREULE', '68 ALLEE DES BOSQUETS', '07 07 39 85 44');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(45) DEFAULT NULL,
  `nom_livre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `annee_usage` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id`, `isbn`, `nom_livre`, `prix`, `annee_usage`) VALUES
(3, '964-5-7007-8514-1', 'Livre de français', '24.99', 2018),
(4, '950-3-5647-9406-1', 'Livre de mathématiques', '39.99', 2018),
(5, '910-5-3214-4455-7', 'Livre de géographie', '49.00', 2018),
(6, '991-2-2987-9233-0', 'Livre d''histoire', '35.00', 2018),
(7, '912-7-6416-6454-0', 'Livre d''economie', '34.00', 2018),
(8, '947-0-7777-7642-2', 'Livre de sciences de l''ingénieur', '37.99', 2018),
(9, '956-8-4372-8820-5', 'Livre de S.V.T', '25.00', 2018),
(10, '980-8-0583-7508-5', 'Livre de droits', '36.00', 2018),
(11, '940-7-5858-2918-3', 'Livre d''éducation civique', '43.00', 2018),
(12, '924-3-5131-3209-1', 'Livre d''informatique', '20.50', 2018),
(13, '900-5-9598-7364-4', 'Livre d''anglais', '42.00', 2018),
(14, '991-1-3443-2666-1', 'Livre d''espagnol', '27.00', 2018),
(15, '919-4-0642-8301-1', 'Livre d''allemand', '19.99', 2018);

-- --------------------------------------------------------

--
-- Structure de la table `livre_section`
--

CREATE TABLE IF NOT EXISTS `livre_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `livre_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_livre_livre_section` (`livre_id`),
  KEY `fk_section_livre_section` (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `section`
--

INSERT INTO `section` (`id`, `nom`) VALUES
(6, '1ère'),
(5, '2nde'),
(4, '3ème'),
(3, '4ème'),
(2, '5ème'),
(1, '6ème'),
(7, 'Terminale');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_classe`
--
CREATE TABLE IF NOT EXISTS `v_classe` (
`id` int(11)
,`etablissement_id` int(11)
,`section_id` int(11)
,`etablissement_nom` varchar(255)
,`section_nom` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_enfant`
--
CREATE TABLE IF NOT EXISTS `v_enfant` (
`id` int(11)
,`famille_id` int(11)
,`classe_id` int(11)
,`etablissement_id` int(11)
,`section_id` int(11)
,`nom` varchar(255)
,`prenom` varchar(255)
,`date_naissance` date
,`date_naissance_format` varchar(10)
,`etablissement_nom` varchar(255)
,`section_nom` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_etat`
--
CREATE TABLE IF NOT EXISTS `v_etat` (
`id` int(11)
,`etat` varchar(255)
,`decote` int(11)
,`etat_decote` varchar(270)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_exemplaire`
--
CREATE TABLE IF NOT EXISTS `v_exemplaire` (
`id` int(11)
,`livre_id` int(11)
,`famille_acheteuse_id` int(11)
,`famille_vendeuse_id` int(11)
,`etat_id` int(11)
,`prix` decimal(10,2)
,`date_depot` date
,`date_depot_format` varchar(10)
,`date_achat` date
,`date_achat_format` varchar(10)
,`famille_acheteuse_nom` varchar(255)
,`nom_livre` varchar(255)
,`etat` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_famille`
--
CREATE TABLE IF NOT EXISTS `v_famille` (
`id` int(11)
,`adhesion_id` int(11)
,`nom` varchar(255)
,`code_postal` varchar(5)
,`ville` varchar(255)
,`adresse` varchar(255)
,`telephone` varchar(20)
,`adhesion_libelle` varchar(255)
,`code_postal_ville` varchar(261)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_historique`
--
CREATE TABLE IF NOT EXISTS `v_historique` (
`id` int(11)
,`livre_id` int(11)
,`famille_acheteuse_id` int(11)
,`famille_vendeuse_id` int(11)
,`famille_acheteuse_nom` varchar(255)
,`famille_vendeuse_nom` varchar(255)
,`etat_id` int(11)
,`prix` decimal(10,2)
,`date_depot` date
,`date_depot_format` varchar(10)
,`date_achat` date
,`date_achat_format` varchar(10)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_livre`
--
CREATE TABLE IF NOT EXISTS `v_livre` (
`id` int(11)
,`nom_livre` varchar(255)
,`prix` decimal(10,2)
,`annee_usage` int(4)
,`nom_prix` varchar(271)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_section`
--
CREATE TABLE IF NOT EXISTS `v_section` (
`id` int(11)
,`nom` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_stock`
--
CREATE TABLE IF NOT EXISTS `v_stock` (
`id` int(11)
,`livre_id` int(11)
,`famille_vendeuse_id` int(11)
,`etat_id` int(11)
,`prix` decimal(10,2)
,`date_depot` date
,`date_depot_format` varchar(10)
,`livre_nom` varchar(255)
,`famille_nom` varchar(255)
,`etat` varchar(255)
,`nom_etat` text
);
-- --------------------------------------------------------

--
-- Structure de la vue `v_classe`
--
DROP TABLE IF EXISTS `v_classe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_classe` AS select `c`.`id` AS `id`,`c`.`etablissement_id` AS `etablissement_id`,`c`.`section_id` AS `section_id`,`e`.`nom` AS `etablissement_nom`,`s`.`nom` AS `section_nom` from ((`classe` `c` join `etablissement` `e` on((`e`.`id` = `c`.`etablissement_id`))) join `section` `s` on((`s`.`id` = `c`.`section_id`)));

-- --------------------------------------------------------

--
-- Structure de la vue `v_enfant`
--
DROP TABLE IF EXISTS `v_enfant`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_enfant` AS select `e`.`id` AS `id`,`e`.`famille_id` AS `famille_id`,`e`.`classe_id` AS `classe_id`,`et`.`id` AS `etablissement_id`,`s`.`id` AS `section_id`,`e`.`nom` AS `nom`,`e`.`prenom` AS `prenom`,`e`.`date_naissance` AS `date_naissance`,date_format(`e`.`date_naissance`,'%d/%m/%Y') AS `date_naissance_format`,`et`.`nom` AS `etablissement_nom`,`s`.`nom` AS `section_nom` from (((`enfant` `e` join `classe` `c` on((`e`.`classe_id` = `c`.`id`))) join `etablissement` `et` on((`c`.`etablissement_id` = `et`.`id`))) join `section` `s` on((`c`.`section_id` = `s`.`id`)));

-- --------------------------------------------------------

--
-- Structure de la vue `v_etat`
--
DROP TABLE IF EXISTS `v_etat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_etat` AS select `e`.`id` AS `id`,`e`.`etat` AS `etat`,`e`.`decote` AS `decote`,concat(`e`.`etat`,' (',`e`.`decote`,'%)') AS `etat_decote` from `etat` `e` order by `e`.`decote`;

-- --------------------------------------------------------

--
-- Structure de la vue `v_exemplaire`
--
DROP TABLE IF EXISTS `v_exemplaire`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_exemplaire` AS select `e`.`id` AS `id`,`e`.`livre_id` AS `livre_id`,`e`.`famille_acheteuse_id` AS `famille_acheteuse_id`,`e`.`famille_vendeuse_id` AS `famille_vendeuse_id`,`e`.`etat_id` AS `etat_id`,`e`.`prix` AS `prix`,`e`.`date_depot` AS `date_depot`,date_format(`e`.`date_depot`,'%d/%m/%Y') AS `date_depot_format`,`e`.`date_achat` AS `date_achat`,date_format(`e`.`date_achat`,'%d/%m/%Y') AS `date_achat_format`,`fa`.`nom` AS `famille_acheteuse_nom`,`l`.`nom_livre` AS `nom_livre`,`et`.`etat` AS `etat` from (((`exemplaire_occasion` `e` join `etat` `et` on((`et`.`id` = `e`.`etat_id`))) join `livre` `l` on((`l`.`id` = `e`.`livre_id`))) left join `famille` `fa` on((`fa`.`id` = `e`.`famille_acheteuse_id`)));

-- --------------------------------------------------------

--
-- Structure de la vue `v_famille`
--
DROP TABLE IF EXISTS `v_famille`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_famille` AS select `f`.`id` AS `id`,`f`.`adhesion_id` AS `adhesion_id`,`f`.`nom` AS `nom`,`f`.`code_postal` AS `code_postal`,`f`.`ville` AS `ville`,`f`.`adresse` AS `adresse`,`f`.`telephone` AS `telephone`,`a`.`libelle` AS `adhesion_libelle`,concat(`f`.`code_postal`,' ',`f`.`ville`) AS `code_postal_ville` from (`famille` `f` join `adhesion` `a` on((`a`.`id` = `f`.`adhesion_id`)));

-- --------------------------------------------------------

--
-- Structure de la vue `v_historique`
--
DROP TABLE IF EXISTS `v_historique`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_historique` AS select `eo`.`id` AS `id`,`eo`.`livre_id` AS `livre_id`,`eo`.`famille_acheteuse_id` AS `famille_acheteuse_id`,`eo`.`famille_vendeuse_id` AS `famille_vendeuse_id`,`fa`.`nom` AS `famille_acheteuse_nom`,`fv`.`nom` AS `famille_vendeuse_nom`,`eo`.`etat_id` AS `etat_id`,`eo`.`prix` AS `prix`,`eo`.`date_depot` AS `date_depot`,date_format(`eo`.`date_depot`,'%d/%m/%Y') AS `date_depot_format`,`eo`.`date_achat` AS `date_achat`,date_format(`eo`.`date_achat`,'%d/%m/%Y') AS `date_achat_format` from (`famille` `fv` join ((`exemplaire_occasion` `eo` join `livre` `l` on((`l`.`id` = `eo`.`livre_id`))) join `famille` `fa` on((`fa`.`id` = `eo`.`famille_acheteuse_id`))) on((`fv`.`id` = `eo`.`famille_vendeuse_id`))) where (`eo`.`famille_acheteuse_id` is not null);

-- --------------------------------------------------------

--
-- Structure de la vue `v_livre`
--
DROP TABLE IF EXISTS `v_livre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_livre` AS select `l`.`id` AS `id`,`l`.`nom_livre` AS `nom_livre`,`l`.`prix` AS `prix`,`l`.`annee_usage` AS `annee_usage`,concat(convert(`l`.`nom_livre` using ucs2),convert(' (' using ucs2),convert(`l`.`prix` using ucs2),_ucs2' ?',convert(')' using ucs2)) AS `nom_prix` from `livre` `l`;

-- --------------------------------------------------------

--
-- Structure de la vue `v_section`
--
DROP TABLE IF EXISTS `v_section`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_section` AS select `s`.`id` AS `id`,`s`.`nom` AS `nom` from `section` `s` order by `s`.`id`;

-- --------------------------------------------------------

--
-- Structure de la vue `v_stock`
--
DROP TABLE IF EXISTS `v_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock` AS select `eo`.`id` AS `id`,`eo`.`livre_id` AS `livre_id`,`eo`.`famille_vendeuse_id` AS `famille_vendeuse_id`,`eo`.`etat_id` AS `etat_id`,`eo`.`prix` AS `prix`,`eo`.`date_depot` AS `date_depot`,date_format(`eo`.`date_depot`,'%d/%m/%Y') AS `date_depot_format`,`l`.`nom_livre` AS `livre_nom`,`fv`.`nom` AS `famille_nom`,`e`.`etat` AS `etat`,concat(`l`.`nom_livre`,' (',`e`.`etat`,')') AS `nom_etat` from (((`exemplaire_occasion` `eo` join `livre` `l` on((`l`.`id` = `eo`.`livre_id`))) join `famille` `fv` on((`fv`.`id` = `eo`.`famille_vendeuse_id`))) join `etat` `e` on((`e`.`id` = `eo`.`etat_id`))) where isnull(`eo`.`famille_acheteuse_id`) order by `l`.`id`,`e`.`decote`;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `fk_etablissement_classe` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id`),
  ADD CONSTRAINT `fk_section_classe` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `fk_famille_enfant` FOREIGN KEY (`famille_id`) REFERENCES `famille` (`id`);

--
-- Contraintes pour la table `exemplaire_occasion`
--
ALTER TABLE `exemplaire_occasion`
  ADD CONSTRAINT `fk_etat_exemplaire_occasion` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `fk_famille_acheteuse_exemplaire_occasion` FOREIGN KEY (`famille_acheteuse_id`) REFERENCES `famille` (`id`),
  ADD CONSTRAINT `fk_famille_vendeuse_exemplaire_occasion` FOREIGN KEY (`famille_vendeuse_id`) REFERENCES `famille` (`id`),
  ADD CONSTRAINT `fk_livre_exemplaire_occasion` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`);

--
-- Contraintes pour la table `famille`
--
ALTER TABLE `famille`
  ADD CONSTRAINT `fk_adhesion_famille` FOREIGN KEY (`adhesion_id`) REFERENCES `adhesion` (`id`);

--
-- Contraintes pour la table `livre_section`
--
ALTER TABLE `livre_section`
  ADD CONSTRAINT `fk_livre_livre_section` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`),
  ADD CONSTRAINT `fk_section_livre_section` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
