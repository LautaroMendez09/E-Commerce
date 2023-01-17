-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2022 a las 02:36:41
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce_delplataindumentaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategorias` int(11) NOT NULL,
  `nombreCategorias` enum('topventas','nvproductos','hombre','mujer','ninio','accesorios','HbaniadoresWaterpolo','HbaniadoresNatacion','HbaniadoresLisos','Hboxers','HbaniadoresSupertank','HbaniadoresJammer','MbaniadoresWaterpolo','MbaniadoresRevolution','MbaniadoresLisos','MbaniadoresSirene','MbaniadoresTirante-Fino','MbaniadoresRelax','MbaniadoresSenior-Master','Mbikinis','NbaniadoresNinios','NbaniadoresNinias','NbaniadoresMini','NbaniadoresLisos','AgorrosSilicona','AgorrosLycra-Polister','AgorrosWaterpolo','ApelotasWaterpolo','Amochilas','Atoallas','AgafasNatacion','Atapones-pinzas-nariz') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategorias`, `nombreCategorias`) VALUES
(1, 'topventas'),
(2, 'nvproductos'),
(3, 'hombre'),
(4, 'mujer'),
(5, 'ninio'),
(6, 'accesorios'),
(7, 'HbaniadoresWaterpolo'),
(8, 'HbaniadoresNatacion'),
(9, 'HbaniadoresLisos'),
(10, 'Hboxers'),
(11, 'HbaniadoresSupertank'),
(12, 'HbaniadoresJammer'),
(13, 'MbaniadoresWaterpolo'),
(14, 'MbaniadoresRevolution'),
(15, 'MbaniadoresLisos'),
(16, 'MbaniadoresSirene'),
(17, 'MbaniadoresTirante-Fino'),
(18, 'MbaniadoresRelax'),
(19, 'MbaniadoresSenior-Master'),
(20, 'Mbikinis'),
(21, 'NbaniadoresNinios'),
(22, 'NbaniadoresNinias'),
(23, 'NbaniadoresMini'),
(24, 'NbaniadoresLisos'),
(25, 'AgorrosSilicona'),
(26, 'AgorrosLycra-Polister'),
(27, 'AgorrosWaterpolo'),
(28, 'ApelotasWaterpolo'),
(29, 'Amochilas'),
(30, 'Atoallas'),
(31, 'AgafasNatacion'),
(32, 'Atapones-pinzas-nariz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasproductos`
--

CREATE TABLE `categoriasproductos` (
  `idCategoriasProd` int(11) NOT NULL,
  `idProdCategoriasProd` int(11) NOT NULL DEFAULT 1,
  `idCategCategoriasProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoriasproductos`
--

INSERT INTO `categoriasproductos` (`idCategoriasProd`, `idProdCategoriasProd`, `idCategCategoriasProd`) VALUES
(423, 483, 9),
(425, 485, 9),
(426, 486, 9),
(427, 487, 9),
(428, 488, 9),
(429, 489, 9),
(430, 490, 9),
(439, 491, 8),
(440, 492, 8),
(441, 493, 8),
(442, 494, 8),
(443, 495, 8),
(444, 496, 8),
(445, 497, 8),
(446, 498, 8),
(447, 499, 8),
(448, 500, 8),
(449, 501, 8),
(450, 502, 8),
(451, 503, 8),
(452, 504, 8),
(453, 505, 8),
(454, 506, 8),
(455, 509, 8),
(457, 511, 7),
(458, 512, 7),
(459, 513, 7),
(460, 514, 7),
(461, 515, 7),
(462, 516, 7),
(463, 517, 7),
(464, 518, 7),
(465, 519, 7),
(466, 520, 7),
(467, 521, 7),
(468, 522, 7),
(469, 523, 7),
(470, 524, 7),
(471, 526, 11),
(472, 527, 11),
(473, 528, 11),
(474, 529, 11),
(475, 530, 11),
(476, 531, 11),
(477, 532, 11),
(479, 534, 11),
(480, 535, 11),
(481, 536, 11),
(482, 537, 11),
(483, 538, 11),
(484, 539, 11),
(485, 549, 11),
(486, 550, 11),
(487, 551, 11),
(488, 552, 11),
(489, 553, 11),
(490, 554, 11),
(491, 555, 7),
(492, 556, 7),
(493, 557, 7),
(494, 558, 7),
(495, 559, 7),
(496, 560, 7),
(498, 562, 7),
(499, 563, 7),
(500, 564, 7),
(501, 565, 7),
(502, 566, 7),
(503, 567, 7),
(504, 568, 7),
(505, 569, 7),
(506, 570, 7),
(507, 571, 7),
(509, 573, 7),
(510, 574, 7),
(511, 575, 7),
(512, 576, 7),
(513, 577, 7),
(514, 578, 7),
(515, 579, 7),
(517, 581, 7),
(518, 582, 7),
(519, 583, 7),
(520, 584, 7),
(521, 586, 12),
(522, 587, 12),
(523, 588, 12),
(524, 589, 12),
(525, 590, 12),
(526, 591, 12),
(527, 592, 12),
(528, 593, 12),
(529, 594, 12),
(530, 595, 12),
(531, 596, 12),
(532, 597, 12),
(533, 598, 12),
(534, 599, 12),
(535, 600, 12),
(536, 601, 12),
(537, 602, 12),
(538, 603, 12),
(539, 604, 12),
(540, 605, 10),
(541, 606, 10),
(543, 608, 10),
(544, 609, 10),
(545, 610, 10),
(546, 611, 10),
(548, 613, 10),
(549, 614, 10),
(550, 615, 10),
(551, 616, 10),
(552, 617, 10),
(553, 618, 10),
(554, 619, 10),
(555, 620, 10),
(556, 621, 10),
(557, 622, 10),
(559, 624, 10),
(560, 625, 10),
(561, 626, 10),
(562, 627, 10),
(563, 628, 10),
(564, 629, 10),
(565, 630, 10),
(566, 631, 10),
(567, 632, 15),
(568, 633, 15),
(569, 634, 15),
(570, 635, 15),
(571, 636, 15),
(572, 637, 15),
(573, 638, 15),
(574, 639, 15),
(575, 640, 15),
(576, 641, 15),
(585, 642, 14),
(586, 643, 14),
(587, 644, 14),
(588, 645, 14),
(589, 646, 14),
(590, 647, 14),
(591, 648, 14),
(592, 649, 14),
(593, 650, 14),
(594, 651, 14),
(595, 653, 16),
(596, 654, 16),
(597, 655, 16),
(598, 656, 16),
(599, 657, 16),
(600, 658, 16),
(602, 660, 16),
(603, 661, 16),
(604, 662, 16),
(605, 663, 16),
(606, 664, 16),
(607, 665, 18),
(608, 666, 18),
(609, 667, 18),
(610, 668, 18),
(611, 669, 18),
(612, 670, 18),
(613, 671, 18),
(614, 672, 18),
(616, 674, 18),
(617, 675, 18),
(618, 676, 19),
(619, 677, 19),
(620, 678, 19),
(621, 679, 19),
(622, 680, 19),
(623, 681, 19),
(625, 683, 17),
(626, 684, 17),
(628, 686, 17),
(629, 687, 17),
(630, 688, 17),
(631, 689, 17),
(632, 690, 17),
(633, 691, 17),
(634, 692, 24),
(635, 693, 24),
(636, 694, 24),
(637, 695, 24),
(638, 696, 24),
(639, 697, 24),
(640, 698, 24),
(641, 699, 24),
(642, 700, 24),
(643, 701, 23),
(644, 702, 23),
(645, 703, 23),
(647, 704, 22),
(649, 706, 22),
(650, 707, 22),
(651, 708, 22),
(652, 709, 22),
(653, 710, 22),
(654, 711, 22),
(655, 712, 22),
(656, 713, 22),
(657, 714, 22),
(658, 715, 21),
(659, 716, 21),
(660, 717, 21),
(661, 718, 21),
(663, 720, 21),
(664, 721, 21),
(665, 722, 21),
(666, 723, 21),
(667, 724, 21),
(668, 725, 21),
(669, 726, 21),
(670, 727, 31),
(671, 728, 31),
(672, 729, 31),
(673, 730, 31),
(674, 731, 31),
(675, 732, 31),
(676, 733, 25),
(677, 734, 25),
(679, 736, 25),
(680, 737, 25),
(681, 738, 25),
(682, 739, 25),
(683, 740, 25),
(684, 741, 25),
(685, 742, 25),
(686, 743, 25),
(695, 744, 26),
(696, 745, 26),
(697, 746, 26),
(698, 747, 26),
(699, 748, 26),
(700, 749, 26),
(702, 752, 26),
(703, 753, 26),
(704, 754, 27),
(705, 755, 27),
(706, 756, 27),
(707, 757, 27),
(708, 758, 27),
(709, 759, 27),
(710, 760, 27),
(711, 761, 27),
(712, 764, 27),
(713, 765, 29),
(714, 766, 29),
(715, 767, 29),
(716, 768, 29),
(717, 769, 29),
(718, 770, 29),
(719, 771, 29),
(720, 772, 29),
(721, 774, 28),
(722, 775, 28),
(723, 776, 28),
(724, 777, 28),
(725, 778, 28),
(726, 780, 28),
(727, 781, 32),
(728, 782, 32),
(729, 783, 32),
(730, 784, 30),
(731, 785, 30),
(732, 786, 30),
(733, 787, 30),
(734, 788, 30),
(735, 789, 30),
(736, 790, 30),
(737, 791, 30),
(738, 607, 1),
(739, 607, 10),
(740, 580, 1),
(741, 580, 7),
(742, 572, 1),
(743, 572, 7),
(744, 561, 1),
(745, 561, 7),
(746, 533, 1),
(747, 533, 11),
(748, 510, 1),
(749, 510, 7),
(750, 484, 1),
(751, 484, 9),
(752, 682, 1),
(753, 682, 17),
(754, 735, 2),
(755, 735, 25),
(756, 719, 2),
(757, 719, 21),
(758, 705, 2),
(759, 705, 22),
(760, 685, 2),
(761, 685, 17),
(762, 673, 2),
(763, 673, 18),
(764, 659, 2),
(765, 659, 16),
(766, 623, 2),
(767, 623, 10),
(768, 612, 2),
(769, 612, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `RUT` char(12) NOT NULL,
  `orden` varchar(20) NOT NULL,
  `estado` enum('Completado','Pendiente','Rechazado') NOT NULL,
  `notas` varchar(120) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `compra`
--
DELIMITER $$
CREATE TRIGGER `tr_bajaDeleteProductos` AFTER DELETE ON `compra` FOR EACH ROW BEGIN

DECLARE cant INT;
DECLARE idProd INT;

SET cant = (SELECT MAX(detalle_compra.cantidad_productoDC) FROM detalle_compra
           INNER JOIN compra ON detalle_compra.id_compraDC = old.id_compra
           WHERE old.id_compra = detalle_compra.id_compraDC);
           
SET idProd = (SELECT MAX(detalle_compra.id_productoDC) FROM detalle_compra
           INNER JOIN compra ON detalle_compra.id_compraDC = old.id_compra
           WHERE old.id_compra = detalle_compra.id_compraDC);
UPDATE items 
SET items.cantidad = items.cantidad - cant
WHERE items.id = idProd;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_ingresoUpdateProductos` AFTER UPDATE ON `compra` FOR EACH ROW BEGIN

DECLARE estado VARCHAR(20);
DECLARE cant INT;
DECLARE idProd INT;
SET estado = (new.estado);

IF (estado = 'Completado') THEN


SET cant = (SELECT MAX(detalle_compra.cantidad_productoDC) FROM detalle_compra
           INNER JOIN compra ON detalle_compra.id_compraDC = new.id_compra
           WHERE new.id_compra = detalle_compra.id_compraDC);
SET idProd = (SELECT MAX(detalle_compra.id_productoDC) FROM detalle_compra
           INNER JOIN compra ON detalle_compra.id_compraDC = new.id_compra
           WHERE new.id_compra = detalle_compra.id_compraDC);
UPDATE items 
SET items.cantidad = items.cantidad + cant
WHERE items.id = idProd;

END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `idDC` int(11) NOT NULL,
  `id_compraDC` int(11) NOT NULL,
  `id_productoDC` int(11) NOT NULL,
  `nombre_productoDC` varchar(70) NOT NULL,
  `cantidad_productoDC` int(11) NOT NULL,
  `precio_productoDC` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `detalle_compra`
--
DELIMITER $$
CREATE TRIGGER `tr_ingresoInsertProductos` AFTER INSERT ON `detalle_compra` FOR EACH ROW BEGIN

DECLARE estado VARCHAR(20);
SET estado = (SELECT MAX(compra.estado) FROM compra 
INNER JOIN detalle_compra ON new.id_compraDC = compra.id_compra
WHERE compra.id_compra = new.id_compraDC);

IF (estado = 'Completado') THEN
UPDATE items 
SET items.cantidad = items.cantidad + new.cantidad_productoDC
WHERE items.id = new.id_productoDC;

END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `idDV` int(11) NOT NULL,
  `id_ventaDV` int(11) NOT NULL,
  `id_productoDV` int(11) NOT NULL,
  `nombreProdDV` varchar(200) NOT NULL,
  `precioDV` decimal(10,2) NOT NULL,
  `cantidadDV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `tr_bajaInsertProductos` AFTER INSERT ON `detalle_venta` FOR EACH ROW BEGIN

UPDATE items 
SET items.cantidad = items.cantidad - new.cantidadDV
WHERE items.id = new.id_productoDV;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `codigoProd` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcionProd` varchar(300) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `codigoProd`, `nombre`, `descripcionProd`, `cantidad`, `precio`, `imagen`) VALUES
(483, 1, 'BAÑADOR LISO CLASSIC AZUL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BL-classic-azul.jpg'),
(484, 2, 'BAÑADOR LISO CLASSIC BLANCO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BL-classic-blanco.jpg'),
(485, 3, 'BAÑADOR LISO COMFORT AZUL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BL-comfort-azul.jpg'),
(486, 4, 'BOXER LISO COMFORT NEGRO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BL-comfort-negro.jpg'),
(487, 5, 'BAÑADOR LISO H2O AMARILLO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '35.00', 'BL-h2o-amarillo.jpg'),
(488, 6, 'BAÑADOR LISO H2O CELESTE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '35.00', 'BL-h2o-celeste.jpg'),
(489, 7, 'BAÑADOR LISO NEON CELESTE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '35.00', 'BL-neon-celeste.jpg'),
(490, 8, 'BAÑADOR LISO NEON VERDE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '35.00', 'BL-neon-verde.jpg'),
(491, 9, 'BAÑADOR NATACION ARES', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-ares.jpg'),
(492, 10, 'BAÑADOR NATACION ARGENTINA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-argentina.jpg'),
(493, 11, 'BAÑADOR NATACION BLACK WARRIOR', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-black-warrior.jpg'),
(494, 12, 'BAÑADOR NATACION BLACK WARRIOR', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-black-warrior.jpg'),
(495, 13, 'BAÑADOR NATACION BRASIL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-brasil.jpg'),
(496, 14, 'BAÑADOR NATACION COMIC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-comp.comic.jpg'),
(497, 15, 'BAÑADOR NATACION CROACIA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-comp.comic.jpg'),
(498, 16, 'BAÑADOR NATACION CROACIA2020', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-croatia-2020.jpg'),
(499, 17, 'BAÑADOR NATACION CROACIA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-croatia.jpg'),
(500, 18, 'BAÑADOR NATACION DOLLAR CAT', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-dollar-cat.jpg'),
(501, 19, 'BAÑADOR NATACION BANDERA AGUILA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-eagle-flag.jpg'),
(502, 20, 'BAÑADOR NATACION BANDERA ESPAÑA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-eagle-flag.jpg'),
(503, 21, 'BAÑADOR NATACION BANDERA ESPAÑA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-esp-flag.jpg'),
(504, 22, 'BAÑADOR NATACION FIESTA BRASIL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-fiesta-brazil.jpg'),
(505, 23, 'BAÑADOR NATACION GAMBLER', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-gambler.jpg'),
(506, 24, 'BAÑADOR NATACION GORILA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-gorilla.jpg'),
(508, 41, 'BAÑADOR NATACION TORMENTA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-hex-storm.jpg'),
(509, 25, 'BAÑADOR NATACION ITALIA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-italia.jpg'),
(510, 26, 'BAÑADOR NATACION JAMAICA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-jam.jpg'),
(511, 27, 'BAÑADOR NATACION MAYA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-maya.jpg'),
(512, 28, 'BAÑADOR NATACION CALAVERA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-mr13.jpg'),
(513, 29, 'BAÑADOR NATACION NUEVO BRASIL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-new-brazil.jpg'),
(514, 30, 'BAÑADOR NATACION TATOO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-old-tatoo.jpg'),
(515, 31, 'BAÑADOR NATACION PLAIN GUARD', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-plain-guard.jpg'),
(516, 32, 'BAÑADOR NATACION POKER ', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-poker.jpg'),
(517, 33, 'BAÑADOR NATACION POLOKIN ', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-polokin.jpg'),
(518, 34, 'BAÑADOR NATACION RAPTOR ', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-raptor.jpg'),
(519, 35, 'BAÑADOR NATACION SPIRAL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-spiral.jpg'),
(520, 36, 'BAÑADOR NATACION STORMI', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-stormi.jpg'),
(521, 37, 'BAÑADOR NATACION TORINO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-torino.jpg'),
(522, 38, 'BAÑADOR NATACION URUGUAY', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-uruguay.jpg'),
(523, 39, 'BAÑADOR NATACION USA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-usa.jpg'),
(524, 40, 'BAÑADOR NATACION VAMP POLO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '30.00', 'BN-vamp-polo.jpg'),
(526, 42, 'SUPER TANK AUSTRALIA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-australia.jpg'),
(527, 43, 'SUPER TANK BOOM', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-boom.jpg'),
(528, 44, 'SUPER TANK BRASIL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-brasil.jpg'),
(529, 45, 'SUPER TANK CALIFORNIA BEAR', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-california-bear.jpg'),
(530, 46, 'SUPER TANK BANDERA CALIFORNIA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-california-flag.jpg'),
(531, 47, 'SUPER TANK CLASSIC HIBIS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-classic-hibis.jpg'),
(532, 48, 'SUPER TANK CUBE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-cube.jpg'),
(533, 49, 'SUPER TANK EAGLE FLAG', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-eagle-flag.jpg'),
(534, 50, 'SUPER TANK GRAFITTI RACE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-grafitti-race.jpg'),
(535, 51, 'SUPER TANK HAKA NEW', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-haka-new.jpg'),
(536, 52, 'SUPER TANK HALLOWEEN SKULLS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-halloween-skulls.jpg'),
(537, 53, 'SUPER TANK HOLLAND 2011', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-holland-2011.jpg'),
(538, 54, 'SUPER TANK JAMAICA SKULL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-jamaica-skull.jpg'),
(539, 55, 'SUPER TANK BANDERA MAORI', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-maori-flag.jpg'),
(540, 56, 'SUPER TANK MIAMI BEACH', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-miami-beach.jpg'),
(541, 57, 'SUPER TANK MULTI LOVE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-multi-love.jpg'),
(542, 58, 'SUPER TANK PIRATE WORLD', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-pirate-world.jpg'),
(544, 59, 'SUPER TANK PORTUGAL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-portugal.jpg'),
(545, 60, 'SUPER TANK RAINBOW', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-rainbow.jpg'),
(546, 61, 'SUPER TANK RECIFE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-recife.jpg'),
(547, 62, 'SUPER TANK SCALA REAL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-scala-real.jpg'),
(548, 63, 'SUPER TANK SMILE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-smile.jpg'),
(549, 64, 'SUPER TANK STICKERS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-stickers.jpg'),
(550, 65, 'SUPER TANK SURF AFTERNOON', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-surf-afternoon.jpg'),
(551, 66, 'SUPER TANK VICTORY', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-victory.jpg'),
(552, 67, 'SUPER TANK YEAH COMIC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-yeah-comic.jpg'),
(553, 68, 'SUPER TANK ARLINTON', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-arlinton.jpg'),
(554, 69, 'SUPER TANK POP TURBO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Está confeccionado con el mejor tejido del mercado con una doble capa de forro delantero parcial. Es resistente al cloro de la piscina y a los rayos', 0, '25.00', 'BS-pop-turbo.jpg'),
(555, 70, 'BAÑADOR WATERPOLO AVUS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-avus.jpg'),
(556, 71, 'BAÑADOR WATERPOLO WATER MY FRIEND', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-be-water-my-friend.jpg'),
(557, 72, 'BAÑADOR WATERPOLO BLACK FOREST', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-black-forest.jpg'),
(558, 73, 'BAÑADOR WATERPOLO BLACK FOREST', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-black-forest.jpg'),
(559, 74, 'BAÑADOR WATERPOLO BLACK BOREAL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-boreal.jpg'),
(560, 75, 'BAÑADOR WATERPOLO COLOR AFRICA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-color-africa.jpg'),
(561, 76, 'BAÑADOR WATERPOLO DEMONS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-demons.jpg'),
(562, 77, 'BAÑADOR WATERPOLO FLORACAS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-floracas.jpg'),
(563, 78, 'BAÑADOR WATERPOLO FLORACAS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-floracas.jpg'),
(564, 79, 'BAÑADOR WATERPOLO GEO AFRICA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-geo-africa.jpg'),
(565, 80, 'BAÑADOR WATERPOLO HORROR 2021', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-horror-2021.jpg'),
(566, 81, 'BAÑADOR WATERPOLO INFIERNO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-infierno.jpg'),
(567, 82, 'BAÑADOR WATERPOLO INFIERNO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-infierno.jpg'),
(568, 83, 'BAÑADOR WATERPOLO JAMAICA 2020', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-jamaica-2020.jpg'),
(569, 84, 'BAÑADOR WATERPOLO JOKER 2020', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-joker-2020.jpg'),
(570, 86, 'BAÑADOR WATERPOLO JUANITA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-juanita.jpg'),
(571, 87, 'BAÑADOR WATERPOLO METAVERSO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-metaverso.jpg'),
(572, 88, 'BAÑADOR WATERPOLO NEBULA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-nebula.jpg'),
(573, 89, 'BAÑADOR WATERPOLO NEW ZELAND 2023', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-new-zeland-2023.jpg'),
(574, 90, 'BAÑADOR WATERPOLO PARTY AZTECA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-party-azteca.jpg'),
(575, 91, 'BAÑADOR WATERPOLO PEACOCK', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-peacock.jpg'),
(576, 92, 'BAÑADOR WATERPOLO PLAYER', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-player.jpg'),
(577, 93, 'BAÑADOR WATERPOLO RAPTOR JURASSIC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-raptor-jurassic.jpg'),
(578, 94, 'BAÑADOR WATERPOLO REFLASH', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-reflash.jpg'),
(579, 95, 'BAÑADOR WATERPOLO SABAC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-sabac.jpg'),
(580, 96, 'BAÑADOR WATERPOLO SAUVUAGE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-sauvuage.jpg'),
(581, 97, 'BAÑADOR WATERPOLO SQUID', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-squid.jpg'),
(582, 98, 'BAÑADOR WATERPOLO SUPERMASK', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-supermask.jpg'),
(583, 99, 'BAÑADOR WATERPOLO TRENCADIS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-trencadis.jpg'),
(584, 100, 'BAÑADOR WATERPOLO ZOOM MASK', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '36.00', 'BW-zoom-mask.jpg'),
(585, 101, 'BAÑADOR JAMMER AUSTRALIA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-australia-jump.jpg'),
(586, 102, 'BAÑADOR JAMMER BLU FLASH', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-blu-flash.jpg'),
(587, 103, 'BAÑADOR JAMMER COMMANDO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-commando.jpg'),
(588, 104, 'BAÑADOR JAMMER CRAZY JOKER', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-crazy-joker.jpg'),
(589, 105, 'BAÑADOR JAMMER DESIG SEASONS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-desig-seasons.jpg'),
(590, 106, 'BAÑADOR JAMMER FLEXIE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-flexie.jpg'),
(591, 107, 'BAÑADOR JAMMER FULL SPIRAL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-full-spiral.jpg'),
(592, 108, 'BAÑADOR JAMMER HOLLAND 2011', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-holland-2011.jpg'),
(593, 109, 'BAÑADOR JAMMER KORCULA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-kpg-korcula.jpg'),
(594, 110, 'BAÑADOR JAMMER NEW SPLASH', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-new-splash.jpg'),
(595, 111, 'BAÑADOR JAMMER NEW ZEALAND FANTASY', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-new-zealand-fantasy.jpg'),
(596, 112, 'BAÑADOR JAMMER NINJA ITALIA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-ninja-italia.jpg'),
(597, 113, 'BAÑADOR JAMMER PRINTED CRYSTAL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-printed-crystal.jpg'),
(598, 114, 'BAÑADOR JAMMER PRINTED ORIGAMI', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-printed-origami.jpg'),
(599, 115, 'BAÑADOR JAMMER SKULL GEO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-skull-geo.jpg'),
(600, 116, 'BAÑADOR JAMMER SWEET RIDE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-sweet-ride.jpg'),
(601, 117, 'BAÑADOR JAMMER SWIM FAST', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-swim-fast.jpg'),
(602, 118, 'BAÑADOR JAMMER TRAIN HARD', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-train-hard.jpg'),
(603, 119, 'BAÑADOR JAMMER USA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-usa.jpg'),
(604, 120, 'BAÑADOR JAMMER VINTAGE 2013', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '30.00', 'BJ-vintage-2013.jpg'),
(605, 121, 'BOXER BALI TRIBAL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-bali-tribal.jpg'),
(606, 122, 'BOXER BILLY THE KID', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-billy-the-kid.jpg'),
(607, 123, 'BOXER BRASIL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-brasil.jpg'),
(608, 124, 'BOXER BUGS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-bugs.jpg'),
(609, 125, 'BOXER CAIPIRINHA 2017', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-caipirinha-2017.jpg'),
(610, 126, 'BOXER CRYSTAL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-crystal.jpg'),
(611, 127, 'BOXER DANGEROUS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-dangerous.jpg'),
(612, 128, 'BOXER DINOS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-dinos.jpg'),
(613, 129, 'BOXER GRAFIC MACHINE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-grafic-machine.jpg'),
(614, 130, 'BOXER ITALIA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-italia.jpg'),
(615, 131, 'BOXER JAMAICA PAINTIG', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-jamaica-paintig.jpg'),
(616, 132, 'BOXER WALL 2016', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-joker-wall-2016.jpg'),
(617, 133, 'BOXER LUCK COMIC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-luck-comic.jpg'),
(618, 134, 'BOXER MAORI FLAG', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-maori-flag.jpg'),
(619, 135, 'BOXER MOHICAN', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-mohican.jpg');
INSERT INTO `items` (`id`, `codigoProd`, `nombre`, `descripcionProd`, `cantidad`, `precio`, `imagen`) VALUES
(620, 136, 'BOXER MR13', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-mr13.jpg'),
(621, 137, 'BOXER NEW ZEALEAND SHIELD', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-new-zealand-shield.jpg'),
(622, 138, 'BOXER ORIGAMI', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-origami.jpg'),
(623, 139, 'BOXER PANTHER', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-panther.jpg'),
(624, 140, 'BOXER PLAIN COLOR', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-plain-color.jpg'),
(625, 141, 'BOXER RECIFE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-recife.jpg'),
(626, 142, 'BOXER RISE SWIM', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-rise-swim.jpg'),
(627, 143, 'BOXER ROCKETS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-rockets.jpg'),
(628, 144, 'BOXER SAMURAI', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-samurai.jpg'),
(629, 145, 'BOXER SURF', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-surf-79.jpg'),
(630, 146, 'BOXER USA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-usa.jpg'),
(631, 147, 'BOXER ZOLIC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Su patrón ajustable hace que se adapte perfectamente a las curvas del cuerpo. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BOXER-zolic.jpg'),
(632, 148, 'BAÑADOR LISO ACTIVE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '26.00', 'BL-active.jpg'),
(633, 149, 'BAÑADOR LISO BRILLANTE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '26.00', 'BL-brillante.jpg'),
(634, 150, 'BAÑADOR LISO CAPRI', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '26.00', 'BL-capri.jpg'),
(635, 151, 'BAÑADOR LISO COMFORT CROSS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '26.00', 'BL-comfort-cross.jpg'),
(636, 152, 'BAÑADOR LISO COMFORT KRAKEN', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '26.00', 'BL-comfort-kraken.jpg'),
(637, 153, 'BAÑADOR LISO COMFORT MATCH', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '26.00', 'BL-comfort-match.jpg'),
(638, 154, 'BAÑADOR LISO COMFORT', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '26.00', 'BL-comfort.jpg'),
(639, 155, 'BAÑADOR LISO FUNKY', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '26.00', 'BL-funky.jpg'),
(640, 156, 'BAÑADOR LISO PATRON QUEEN', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '26.00', 'BL-patron-queen.jpg'),
(641, 157, 'BAÑADOR LISO RELAX LISO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '26.00', 'BL-relax-liso.jpg'),
(642, 158, 'BAÑADOR REVOLUTION AUSTRALIA 2023', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '20.00', 'BR-australia-2023.jpg'),
(643, 159, 'BAÑADOR REVOLUTION BELLISIMO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '20.00', 'BR-bellisimo.jpg'),
(644, 160, 'BAÑADOR REVOLUTION BLUE PANTERA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '20.00', 'BR-blue-pantera.jpg'),
(645, 161, 'BAÑADOR REVOLUTION CANARIAS SPIDER', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '20.00', 'BR-canarias-spider.jpg'),
(646, 162, 'BAÑADOR REVOLUTION FLOWERS AND TIGERS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '20.00', 'BR-flowers adn tigers.jpg'),
(647, 163, 'BAÑADOR REVOLUTION LIFE GUARD', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '20.00', 'BR-life-guard.jpg'),
(648, 164, 'BAÑADOR REVOLUTION MONKEY SAMURAI', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '20.00', 'BR-monkey-samurai.jpg'),
(649, 165, 'BAÑADOR REVOLUTION MYSTIC EYE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '20.00', 'BR-mystic-eye.jpg'),
(650, 166, 'BAÑADOR REVOLUTION TECHNIC FLUOR', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '20.00', 'BR-technic-fluor.jpg'),
(651, 167, 'BAÑADOR REVOLUTION TRENCADIS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '20.00', 'BR-trencadis.jpg'),
(653, 169, 'BAÑADOR SIRENE ABSTRACT FACE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-abstract-face.jpg'),
(654, 170, 'BAÑADOR SIRENE ANIMAL PRINT', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-animal-print.jpg'),
(655, 171, 'BAÑADOR SIRENE BLUE TIE DYE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-blue-tie-dye.jpg'),
(656, 172, 'BAÑADOR SIRENE FIERCE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-fierce.jpg'),
(657, 173, 'BAÑADOR SIRENE KOH SAMURAI', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-koh-samurai.jpg'),
(658, 174, 'BAÑADOR SIRENE MARBLE FANTASY', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-marble-fantasy.jpg'),
(659, 175, 'BAÑADOR SIRENE NAVY DREAM', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-navy-dream.jpg'),
(660, 176, 'BAÑADOR SIRENE NEW BRASIL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-new-brasil.jpg'),
(661, 177, 'BAÑADOR SIRENE RAINBOW', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-rainbow.jpg'),
(662, 178, 'BAÑADOR SIRENE SEYCHELLES', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-seychelles.jpg'),
(663, 179, 'BAÑADOR SIRENE TECHNIC FLUOR', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-technic-fluor.jpg'),
(664, 180, 'BAÑADOR SIRENE TECHNIC FLUOR', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '25.00', 'BS-usa-artistic.jpg'),
(665, 193, 'BAÑADOR RELAX COLORFUL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '28.00', 'BRX-colorful.jpg'),
(666, 194, 'BAÑADOR RELAX FIESTA BRASIL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '28.00', 'BRX-fiesta-brasil.jpg'),
(667, 195, 'BAÑADOR RELAX LINE FLOWER', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '28.00', 'BRX-line-flower.jpg'),
(668, 196, 'BAÑADOR RELAX MAKUMAKU', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '28.00', 'BRX-makumaku.jpg'),
(669, 197, 'BAÑADOR RELAX NEW SPLASH', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '28.00', 'BRX-new-splash.jpg'),
(670, 198, 'BAÑADOR RELAX PINK RIVER', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '28.00', 'BRX-pink-river.jpg'),
(671, 199, 'BAÑADOR RELAX PLAIN COLOR', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '28.00', 'BRX-plain-color.jpg'),
(672, 200, 'BAÑADOR RELAX PLUME COLOR', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '28.00', 'BRX-plume-color.jpg'),
(673, 201, 'BAÑADOR RELAX SPIRAL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '28.00', 'BRX-spiral.jpg'),
(674, 202, 'BAÑADOR RELAX SWIM LINES', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '28.00', 'BRX-swim-lines.jpg'),
(675, 203, 'BAÑADOR RELAX TITITI', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '28.00', 'BRX-tititi.jpg'),
(676, 204, 'BAÑADOR SENIOR&MASTER CARMEN', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '35.00', 'BSM-carmen.jpg'),
(677, 205, 'BAÑADOR SENIOR&MASTER GIUILA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '35.00', 'BSM-giuila.jpg'),
(678, 206, 'BAÑADOR SENIOR&MASTER IRIS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '35.00', 'BSM-iris.jpg'),
(679, 207, 'BAÑADOR SENIOR&MASTER LOLA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '35.00', 'BSM-lola.jpg'),
(680, 208, 'BAÑADOR SENIOR&MASTER PATRY', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '35.00', 'BSM-patry.jpg'),
(681, 209, 'BAÑADOR SENIOR&MASTER RITA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '35.00', 'BSM-rita.jpg'),
(682, 210, 'BAÑADOR TIRANTE FINO CACATUA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BTF-cacatua.jpg'),
(683, 211, 'BAÑADOR TIRANTE FINO COLOR LIPS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BTF-color-lips.jpg'),
(684, 212, 'BAÑADOR TIRANTE FINO CUBA ITALIA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BTF-cuba-italia.jpg'),
(685, 213, 'BAÑADOR TIRANTE FINO FANTASTIC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BTF-fantastic.jpg'),
(686, 214, 'BAÑADOR TIRANTE FUN DAISIES', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BTF-fun-daisies.jpg'),
(687, 215, 'BAÑADOR TIRANTE JAMAICA TIGER', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BTF-jamaica-tiger.jpg'),
(688, 216, 'BAÑADOR TIRANTE JAPAN FLAG', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BTF-japan-flag.jpg'),
(689, 217, 'BAÑADOR TIRANTE LOKI COMIC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BTF-loki-comic.jpg'),
(690, 218, 'BAÑADOR TIRANTE LORIKO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BTF-loriko.jpg'),
(691, 219, 'BAÑADOR TIRANTE LORITOS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BTF-loritos.jpg'),
(692, 220, 'BAÑADOR LISOS ACTIVE TOP', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BL-active-top.jpg'),
(693, 221, 'BAÑADOR LISOS BASICO CLASSIC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BL-basico-classic.jpg'),
(694, 222, 'BAÑADOR LISOS BRASILEIRO COMFORT', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BL-brasileiro-comfort.jpg'),
(695, 223, 'BAÑADOR LISOS COMFORT LISO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BL-comfort-liso.jpg'),
(696, 224, 'BAÑADOR LISOS COMFORT', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BL-comfort.jpg'),
(697, 225, 'BAÑADOR LISOS ENERGY', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BL-energy.jpg'),
(698, 226, 'BAÑADOR LISOS NEON FLUOR', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BL-neon-fluor.jpg'),
(699, 227, 'BAÑADOR LISOS PBT BASIC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BL-pbt-basic.jpg'),
(700, 228, 'BAÑADOR LISOS SINCRO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '32.00', 'BL-sincro.jpg'),
(701, 229, 'BAÑADOR MINI ORIGAMI', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BM-origami.jpg'),
(702, 230, 'BAÑADOR MINI GUMMY', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-gummy.jpg'),
(703, 231, 'BAÑADOR MINI ROMBUS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-rombus.jpg'),
(704, 232, 'BAÑADOR NIÑAS AUSTRALIA 2023', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-australia-2023.jpg'),
(705, 233, 'BAÑADOR NIÑAS BELLISIMO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-bellisimo.jpg'),
(706, 234, 'BAÑADOR NIÑAS COOL TIGER', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-cool-tiger.jpg'),
(707, 235, 'BAÑADOR NIÑAS CUBA ITALIA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-cuba-italia-2023.jpg'),
(708, 236, 'BAÑADOR NIÑAS DINO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-dino.jpg'),
(709, 237, 'BAÑADOR NIÑAS FLOWER DINO', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-flower-tigers.jpg'),
(710, 238, 'BAÑADOR NIÑAS HIBISCUS', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-hibiscus.jpg'),
(711, 239, 'BAÑADOR NIÑAS JAPON 2020', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-jpn-2020.jpg'),
(712, 240, 'BAÑADOR NIÑAS LOKI COMIC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-loki-comic.jpg'),
(713, 241, 'BAÑADOR NIÑAS ESPAÑA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-spain.jpg'),
(714, 242, 'BAÑADOR NIÑAS SUPER COMIC', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNA-super-comic.jpg'),
(715, 243, 'BAÑADOR NIÑOS BRASIL', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-brasil-2022.jpg'),
(716, 244, 'BAÑADOR NIÑOS BULLDOG ENGLAND', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-bulldog-england.jpg'),
(717, 245, 'BAÑADOR NIÑOS FAMIGLIA', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-famiglia.jpg'),
(718, 246, 'BAÑADOR NIÑOS FIRE DICE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-fire-dice.jpg'),
(719, 247, 'BAÑADOR NIÑOS G.O.A.T', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-goat.jpg'),
(720, 248, 'BAÑADOR NIÑOS INDIE', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-indie.jpg'),
(721, 249, 'BAÑADOR NIÑOS JAMAICA TIGER', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-jamaica-tiger.jpg'),
(722, 250, 'BAÑADOR NIÑOS KEY WEST', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-key-west.jpg'),
(723, 251, 'BAÑADOR NIÑOS MONKEY SAMURAI', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-monkey-samurai.jpg'),
(724, 252, 'BAÑADOR NIÑOS PANTHER', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-panther.jpg'),
(725, 253, 'BAÑADOR NIÑOS RED HOT', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-red-hot.jpg'),
(726, 254, 'BAÑADOR NIÑOS SCOTT 2023', 'Este bañador está especialmente diseñado para la práctica de la Natación. Está confeccionado con el mejor tejido del mercado con un doble forro delantero. Es resistente al cloro de la piscina y a los rayos UV. Y por ello, la intensidad de sus colores se mantiene con el uso repetido en el tiempo.', 0, '15.00', 'BNO-scott-2023.jpg'),
(727, 255, 'GAFAS ADVANCED MIRROR', 'Descubre nuestra gama de gafas de natación, diseñadas para tener el mejor confort y durabilidad en el agua. Disponemos de diferentes modelos que se adaptan a todo tipo de deportes acuáticos, como natación o nado sincronizado, triatlón, aguas abiertas, y entre muchos otros. Las gafas de natación Turb', 0, '10.00', 'GN-advanced-mirror.jpg'),
(728, 257, 'GAFAS ADVANCED GRENOBLE METAL', 'Descubre nuestra gama de gafas de natación, diseñadas para tener el mejor confort y durabilidad en el agua. Disponemos de diferentes modelos que se adaptan a todo tipo de deportes acuáticos, como natación o nado sincronizado, triatlón, aguas abiertas, y entre muchos otros. Las gafas de natación Turb', 0, '10.00', 'GN-grenoble-metal.jpg'),
(729, 258, 'GAFAS ADVANCED GRENOBLE', 'Descubre nuestra gama de gafas de natación, diseñadas para tener el mejor confort y durabilidad en el agua. Disponemos de diferentes modelos que se adaptan a todo tipo de deportes acuáticos, como natación o nado sincronizado, triatlón, aguas abiertas, y entre muchos otros. Las gafas de natación Turb', 0, '10.00', 'GN-grenoble.jpg'),
(730, 259, 'GAFAS JUNIOR OSLO', 'Descubre nuestra gama de gafas de natación, diseñadas para tener el mejor confort y durabilidad en el agua. Disponemos de diferentes modelos que se adaptan a todo tipo de deportes acuáticos, como natación o nado sincronizado, triatlón, aguas abiertas, y entre muchos otros. Las gafas de natación Turb', 0, '10.00', 'GN-junior-oslo.jpg'),
(731, 260, 'GAFAS SCORPION MIRROR', 'Descubre nuestra gama de gafas de natación, diseñadas para tener el mejor confort y durabilidad en el agua. Disponemos de diferentes modelos que se adaptan a todo tipo de deportes acuáticos, como natación o nado sincronizado, triatlón, aguas abiertas, y entre muchos otros. Las gafas de natación Turb', 0, '10.00', 'GN-scorpion-mirror.jpg'),
(732, 261, 'GAFAS SCORPION', 'Descubre nuestra gama de gafas de natación, diseñadas para tener el mejor confort y durabilidad en el agua. Disponemos de diferentes modelos que se adaptan a todo tipo de deportes acuáticos, como natación o nado sincronizado, triatlón, aguas abiertas, y entre muchos otros. Las gafas de natación Turb', 0, '10.00', 'GN-scorpion.jpg'),
(733, 262, 'GORRO SILICONA BOSTON UNI', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GS-boston-uni.jpg'),
(734, 263, 'GORRO SILICONA BREASTOKE', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GS-breastoke.jpg'),
(735, 264, 'GORRO SILICONA BUTTERFLY', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GS-butterfly.jpg'),
(736, 265, 'GORRO SILICONA FLAMINGO', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GS-flamingo.jpg'),
(737, 266, 'GORRO SILICONA FLUO MAUI', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GS-fluo-maui.jpg'),
(738, 267, 'GORRO SILICONA FUN SEA', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GS-fun-sea.jpg'),
(739, 268, 'GORRO SILICONA NEW SPIDER', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GS-new-spider.jpg'),
(740, 269, 'GORRO SILICONA SHARKY', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GS-sharky.jpg'),
(741, 270, 'GORRO SILICONA SUN BONITA', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GS-sun-bonita.jpg'),
(742, 271, 'GORRO SILICONA SUN FLOWERS', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GS-sunflowers.jpg'),
(743, 272, 'GORRO SILICONA TAKE OFF', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GS-take-off.jpg'),
(744, 273, 'GORRO LYCRA & POLISTER ADULT', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GLP-adult.jpg'),
(745, 274, 'GORRO LYCRA & POLISTER BUBBLE', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GLP-bubble.jpg'),
(746, 275, 'GORRO LYCRA & POLISTER CONFORT', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GLP-confort.jpg'),
(747, 276, 'GORRO LYCRA & POLISTER GOMA ANCHA', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GLP-goma-ancha.jpg'),
(748, 277, 'GORRO LYCRA & POLISTER GOMA ESTRECHA', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GLP-goma-estrecha.jpg'),
(749, 278, 'GORRO LYCRA & POLISTER INFANTIL', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GLP-infantil.jpg'),
(752, 280, 'GORRO LYCRA & POLISTER MEGA HEROE', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GLP-mega-heroe.jpg'),
(753, 281, 'GORRO LYCRA & POLISTER VOLUMEN', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GLP-volumen.jpg'),
(754, 282, 'GORRO WATERPOLO CLASSIC 13 UNIDADES', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '200.00', 'GWP-classic-13-unidades.jpg'),
(755, 283, 'GORRO WATERPOLO CLASSIC 26 UNIDADES', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '300.00', 'GWP-classic-26unidades.jpg'),
(756, 284, 'GORRO WATERPOLO CLASSIC 30 UNIDADES', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '400.00', 'GWP-classic-30unidades.jpg');
INSERT INTO `items` (`id`, `codigoProd`, `nombre`, `descripcionProd`, `cantidad`, `precio`, `imagen`) VALUES
(757, 285, 'GORRO WATERPOLO PATITOS ', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GWP-patitos.jpg'),
(758, 286, 'GORRO WATERPOLO SELECCION ESPAÑOLA ', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GWP-seleccion-española.jpg'),
(759, 287, 'GORRO WATERPOLO SINDRIA ', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GWP-sindria.jpg'),
(760, 288, 'GORRO WATERPOLO SKULLER', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GWP-skuller.jpg'),
(761, 289, 'GORRO WATERPOLO TURBO', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GWP-turbo.jpg'),
(764, 290, 'GORRO WATERPOLO UNICORN', 'Este gorro está compuesto por la mejor silicona del mercado. Es un producto elástico, con tacto suave y con gran extensibilidad. De este modo, se asegura una buena sujeción y a la vez comodidad. Los estampados son resistentes al cloro, rayos UV y al agua del mar. Puede usarse para entrenamientos dia', 0, '15.00', 'GWP-unicorn.jpg'),
(765, 291, 'BOLSA CAPS', '100% NYLON', 0, '40.00', 'M-caps-bolsa.jpg'),
(766, 292, 'MOCHILA DRACO', '100% NYLON', 0, '35.00', 'M-draco.jpg'),
(767, 293, 'MOCHILA HOLLAND', '100% NYLON', 0, '35.00', 'M-holland.jpg'),
(768, 294, 'MOCHILA MESH', '100% NYLON', 0, '35.00', 'M-mesh.jpg'),
(769, 295, 'MOCHILA NONA', '100% NYLON', 0, '35.00', 'M-nona.jpg'),
(770, 296, 'MOCHILA PHOENIX', '100% NYLON', 0, '35.00', 'M-phoenix.jpg'),
(771, 297, 'MOCHILA SEDNA', '100% NYLON', 0, '35.00', 'M-sedna.jpg'),
(772, 298, 'MOCHILA TITAN', '100% NYLON', 0, '35.00', 'M-titan.jpg'),
(774, 299, 'PELOTA WATERPOLO COMPETITION SIZE 2 ', 'Las pelotas de waterpolo de Turbo y Kap 7 han sido diseñadas para el waterpolo profesional y recreativo. Algunos de nuestros modelos son las pelotas oficiales de las ligas más exigentes y prestigiosas del mundo por lo que ofrecen la mayor calidad del mercado.', 0, '35.00', 'PW-competition-size-2.jpg'),
(775, 300, 'PELOTA WATERPOLO HEAVY TRAINING ', 'Las pelotas de waterpolo de Turbo y Kap 7 han sido diseñadas para el waterpolo profesional y recreativo. Algunos de nuestros modelos son las pelotas oficiales de las ligas más exigentes y prestigiosas del mundo por lo que ofrecen la mayor calidad del mercado.', 0, '35.00', 'PW-heavy-training.jpg'),
(776, 301, 'PELOTA WATERPOLO CHAMPIONS LEAGUE ', 'Las pelotas de waterpolo de Turbo y Kap 7 han sido diseñadas para el waterpolo profesional y recreativo. Algunos de nuestros modelos son las pelotas oficiales de las ligas más exigentes y prestigiosas del mundo por lo que ofrecen la mayor calidad del mercado.', 0, '35.00', 'PW-kap7-champions-league.jpg'),
(777, 302, 'PELOTA WATERPOLO LEN HOMBRE ', 'Las pelotas de waterpolo de Turbo y Kap 7 han sido diseñadas para el waterpolo profesional y recreativo. Algunos de nuestros modelos son las pelotas oficiales de las ligas más exigentes y prestigiosas del mundo por lo que ofrecen la mayor calidad del mercado.', 0, '35.00', 'PW-len-hombre.jpg'),
(778, 303, 'PELOTA WATERPOLO LEN PINK ', 'Las pelotas de waterpolo de Turbo y Kap 7 han sido diseñadas para el waterpolo profesional y recreativo. Algunos de nuestros modelos son las pelotas oficiales de las ligas más exigentes y prestigiosas del mundo por lo que ofrecen la mayor calidad del mercado.', 0, '35.00', 'PW-len-pink.jpg'),
(780, 304, 'PELOTA WATERPOLO NCAA ', 'Las pelotas de waterpolo de Turbo y Kap 7 han sido diseñadas para el waterpolo profesional y recreativo. Algunos de nuestros modelos son las pelotas oficiales de las ligas más exigentes y prestigiosas del mundo por lo que ofrecen la mayor calidad del mercado.', 0, '35.00', 'PW-turbo-junior.jpg'),
(781, 305, 'PINZA PROFESSIONAL NOSE CLIP ', 'Los tapones para los oídos y las pinzas para la nariz son accesorios importantes para nadar. Los tapones para los oídos y las pinzas para la nariz de Turbo están diseñados para ayudar a mantener el agua fuera de los oídos. Al mismo tiempo, ayuda a bloquear cualquier ruido no deseado para que pueda c', 0, '8.00', 'P-ear-plug.jpg'),
(782, 306, 'PINZA NOSE CLIP ', 'Los tapones para los oídos y las pinzas para la nariz son accesorios importantes para nadar. Los tapones para los oídos y las pinzas para la nariz de Turbo están diseñados para ayudar a mantener el agua fuera de los oídos. Al mismo tiempo, ayuda a bloquear cualquier ruido no deseado para que pueda c', 0, '8.00', 'P-nose-clip.jpg'),
(783, 307, 'TAPONES', 'Los tapones para los oídos y las pinzas para la nariz son accesorios importantes para nadar. Los tapones para los oídos y las pinzas para la nariz de Turbo están diseñados para ayudar a mantener el agua fuera de los oídos. Al mismo tiempo, ayuda a bloquear cualquier ruido no deseado para que pueda c', 0, '8.00', 'P-tapones-asa.jpg'),
(784, 308, 'TOALLA COMIC BOOM', 'Existe una gran oferta de toallas de piscina para todos los gustos y necesidades. Te guste el tipo que te guste, tenemos una para tí.', 0, '20.00', 'T-comic-boom.jpg'),
(785, 309, 'TOALLA FLOWERS', 'Existe una gran oferta de toallas de piscina para todos los gustos y necesidades. Te guste el tipo que te guste, tenemos una para tí.', 0, '20.00', 'T-flowers.jpg'),
(786, 310, 'TOALLA HAPPY GHOST', 'Existe una gran oferta de toallas de piscina para todos los gustos y necesidades. Te guste el tipo que te guste, tenemos una para tí.', 0, '20.00', 'T-happy-ghost.jpg'),
(787, 311, 'TOALLA HIPPY HEY', 'Existe una gran oferta de toallas de piscina para todos los gustos y necesidades. Te guste el tipo que te guste, tenemos una para tí.', 0, '20.00', 'T-hippy-hey.jpg'),
(788, 312, 'TOALLA LOVE SIXTIES', 'Existe una gran oferta de toallas de piscina para todos los gustos y necesidades. Te guste el tipo que te guste, tenemos una para tí.', 0, '20.00', 'T-love-sixties.jpg'),
(789, 313, 'TOALLA NEW ZELEAND', 'Existe una gran oferta de toallas de piscina para todos los gustos y necesidades. Te guste el tipo que te guste, tenemos una para tí.', 0, '20.00', 'T-new-zealand.jpg'),
(790, 314, 'TOALLA SIXTIES', 'Existe una gran oferta de toallas de piscina para todos los gustos y necesidades. Te guste el tipo que te guste, tenemos una para tí.', 0, '20.00', 'T-sixties.jpg'),
(791, 315, 'TOALLA TOTAL KOI', 'Existe una gran oferta de toallas de piscina para todos los gustos y necesidades. Te guste el tipo que te guste, tenemos una para tí.', 0, '20.00', 'T-total-koi.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passwords`
--

CREATE TABLE `passwords` (
  `id_password` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `token` varchar(200) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `RUT` char(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `RUT`, `nombre`, `telefono`, `direccion`) VALUES
(8, '213240240019', 'Nike Uruguay', 24860810, 'Av. 8 de Octubre 3233, 11600 Montevideo, Departamento de Montevideo'),
(11, '787443605512', 'Adidas', 27121810, 'José Ellauri 350, 11300 Montevideo, Departamento de Montevideo'),
(12, '210703920014', 'Puma', 24082009, 'Acevedo Díaz 1837, 11800 Montevideo, Departamento de Montevideo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` enum('admin','gerente','account') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'account'),
(2, 'gerente'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `address` varchar(120) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name`, `surname`, `user_email`, `address`, `phone`, `password`, `id_role`) VALUES
(126, 'Manuel', 'Gonzalez', 'manu123@gmail.com', 'Av. Italia 768', 43343248, 'Manuu@2022', 1),
(127, 'Martin', 'Hernandez', 'marto200214@gmail.com', NULL, 98384124, 'MaRtO888@1998', 2),
(128, 'Gonzalo', 'Rodriguez', '1994gonzaRodriguez@gmail.com', NULL, 78539284, 'Gonza@1994', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `envio` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_userVenta` int(11) NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategorias`);

--
-- Indices de la tabla `categoriasproductos`
--
ALTER TABLE `categoriasproductos`
  ADD PRIMARY KEY (`idCategoriasProd`),
  ADD KEY `idProdCategoriasProd` (`idProdCategoriasProd`),
  ADD KEY `idCategCategoriasProd` (`idCategCategoriasProd`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD UNIQUE KEY `orden` (`orden`),
  ADD KEY `RUT` (`RUT`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`idDC`),
  ADD KEY `id_compraDC` (`id_compraDC`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`idDV`),
  ADD KEY `id_ventaDV` (`id_ventaDV`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigoProd` (`codigoProd`);

--
-- Indices de la tabla `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id_password`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `RUT` (`RUT`),
  ADD KEY `RUT_2` (`RUT`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `categoriasproductos`
--
ALTER TABLE `categoriasproductos`
  MODIFY `idCategoriasProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=770;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `idDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `idDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=792;

--
-- AUTO_INCREMENT de la tabla `passwords`
--
ALTER TABLE `passwords`
  MODIFY `id_password` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoriasproductos`
--
ALTER TABLE `categoriasproductos`
  ADD CONSTRAINT `categoriasproductos_ibfk_1` FOREIGN KEY (`idProdCategoriasProd`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categoriasproductos_ibfk_2` FOREIGN KEY (`idCategCategoriasProd`) REFERENCES `categorias` (`idCategorias`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`RUT`) REFERENCES `proveedores` (`RUT`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `rol` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
