-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2019 a las 15:18:37
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_contables`
--

CREATE TABLE `cuentas_contables` (
  `id_cuenta_contable` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `numero` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cuentas_contables`
--

INSERT INTO `cuentas_contables` (`id_cuenta_contable`, `nombre`, `numero`) VALUES
(1, 'Auxilio Vehiculo', '5205450100'),
(2, 'Curso de entrenamiento y actualización', '5205630201'),
(3, 'Teléfono Servicio Nacional', '5235350100'),
(4, 'Literatura (Bocetos y Artes)', '5235600301'),
(5, 'Congresos y Eventos', '5235602400'),
(6, 'Equipo de Oficina', '5245200000'),
(7, 'Manten.Equi. Cómputo y Comunicaciones', '5245250000'),
(8, 'Viajes Locales', '5255050100'),
(9, 'Gasto de Representación y Relaciones Pu', '5295200100'),
(10, 'Convención Ventas', '5295950600'),
(11, 'Utiles Papeleria y Fotocopias', '5295300200'),
(12, 'Impulso canales', '5235602800'),
(13, 'Reunión de Ciclos', '5295950400'),
(14, 'Reuniones Diversas', '5295950500'),
(15, 'Gastos Bancarios', '5235752100'),
(16, 'Otros egresos', '5395959999'),
(17, 'Correo urbano', '5235400200'),
(18, 'RRHH', '2605952003'),
(19, 'Seguro de Vehiculo', '5230400000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastosgiras`
--

CREATE TABLE `gastosgiras` (
  `id_gastosgiras` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `emisor` varchar(100) COLLATE utf8_bin NOT NULL,
  `ruc` varchar(100) COLLATE utf8_bin NOT NULL,
  `factura` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_bin NOT NULL,
  `valor` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_gira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerentes_distrito`
--

CREATE TABLE `gerentes_distrito` (
  `id_gerentes_distrito` int(11) NOT NULL,
  `región` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerentes_producto`
--

CREATE TABLE `gerentes_producto` (
  `id_gerente_producto` int(11) NOT NULL,
  `region` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_linea` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerente_lineal`
--

CREATE TABLE `gerente_lineal` (
  `id_gerente_lineal` int(11) NOT NULL,
  `region` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_linea` int(11) NOT NULL,
  `tipo` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giras`
--

CREATE TABLE `giras` (
  `id_gira` int(11) NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_bin NOT NULL,
  `motivo` varchar(100) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `fecha_gira` date NOT NULL,
  `cuenta_contable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_otx`
--

CREATE TABLE `linea_otx` (
  `id_otx` int(11) NOT NULL,
  `marca` varchar(100) COLLATE utf8_bin NOT NULL,
  `peso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `linea_otx`
--

INSERT INTO `linea_otx` (`id_otx`, `marca`, `peso`) VALUES
(1, 'G-0315-PA-AGUDOL/1 ', 9),
(2, 'G-0315-PA-BIOFLO/1', 11),
(3, 'G-0315-PA-CALCIB/1', 11),
(4, 'G-0315-PA-CLIMAS/1', 5),
(5, 'G-0315-PA-COUPLE/1', 4),
(6, 'G-0315-PA-FARMAD/1', 5),
(7, 'G-0315-PA-FEMENN/1', 9),
(8, 'G-0315-PA-FULLDE/1', 7),
(9, 'G-0315-PA-KIDCAL/1', 9),
(10, 'G-0315-PA-ORALYT/1', 13),
(11, 'G-0315-PA-SENOKO/1', 4),
(12, 'G-0315-PA-STAMYL/1', 9),
(13, 'G-0315-PA-BONAME/1', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_rx`
--

CREATE TABLE `linea_rx` (
  `id_rx` int(11) NOT NULL,
  `marca` varchar(100) COLLATE utf8_bin NOT NULL,
  `peso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `linea_rx`
--

INSERT INTO `linea_rx` (`id_rx`, `marca`, `peso`) VALUES
(1, 'G-0315-PA-HIDROT', 5),
(2, 'G-0315-PA-INSTILLA', 1),
(3, 'G-0315-PA-MILPAX', 11),
(4, 'G-0315-PA-NEOLAX', 8),
(5, 'G-0315-PA-NORMIX', 7),
(6, 'G-0315-PA-NOTOLA', 7),
(7, 'G-0315-PA-VITAMI', 8),
(8, 'G-0315-PA-UROCIT', 7),
(9, 'G-0315-PA-BRASARTAN', 2),
(10, 'G-0315-PA-AMLOR', 1),
(11, 'G-0315-PA-ARANDA', 8),
(12, 'G-0315-PA-BEDOYE', 17),
(13, 'G-0315-PA-COLYPA', 9),
(14, 'G-0315-PA-DIOSMI', 5),
(15, 'G-0318-PA-VONAU', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `ip` varchar(12) NOT NULL,
  `controlador` varchar(30) NOT NULL,
  `metodo` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `id_usuario`, `ip`, `controlador`, `metodo`, `fecha`, `hora`) VALUES
(1, 1, '::1', 'giras', 'index', '2019-03-11', '10:53:24'),
(2, NULL, '::1', 'giras', 'index', '2019-03-11', '10:53:40'),
(3, NULL, '::1', 'login', 'index', '2019-03-11', '10:53:40'),
(4, NULL, '::1', 'login', 'index', '2019-03-11', '10:53:44'),
(5, 1, '::1', 'login', 'index', '2019-03-11', '10:53:44'),
(6, 1, '::1', 'principal', 'index', '2019-03-11', '10:53:44'),
(7, 1, '::1', 'giras', 'index', '2019-03-11', '10:53:47'),
(8, 1, '::1', 'giras', 'index', '2019-03-11', '10:55:08'),
(9, 1, '::1', 'giras', 'index', '2019-03-11', '10:57:48'),
(10, NULL, '::1', 'giras', 'index', '2019-03-11', '10:58:21'),
(11, NULL, '::1', 'login', 'index', '2019-03-11', '10:58:21'),
(12, NULL, '::1', 'login', 'index', '2019-03-11', '10:58:26'),
(13, 1, '::1', 'login', 'index', '2019-03-11', '10:58:26'),
(14, 1, '::1', 'principal', 'index', '2019-03-11', '10:58:26'),
(15, 1, '::1', 'giras', 'index', '2019-03-11', '10:58:34'),
(16, 1, '::1', 'giras', 'index', '2019-03-11', '11:02:58'),
(17, 1, '::1', 'giras', 'index', '2019-03-11', '11:03:21'),
(18, 1, '::1', 'giras', 'index', '2019-03-11', '11:05:24'),
(19, NULL, '::1', 'giras', 'index', '2019-03-11', '11:07:39'),
(20, NULL, '::1', 'login', 'index', '2019-03-11', '11:07:39'),
(21, 1, '::1', 'giras', 'index', '2019-03-11', '11:08:18'),
(22, NULL, '::1', 'giras', 'index', '2019-03-11', '11:20:37'),
(23, NULL, '::1', 'login', 'index', '2019-03-11', '11:20:37'),
(24, NULL, '::1', 'login', 'index', '2019-03-11', '11:20:42'),
(25, 1, '::1', 'login', 'index', '2019-03-11', '11:20:42'),
(26, 1, '::1', 'principal', 'index', '2019-03-11', '11:20:43'),
(27, 1, '::1', 'giras', 'index', '2019-03-11', '11:20:45'),
(28, NULL, '::1', 'giras', 'index', '2019-03-11', '11:27:39'),
(29, NULL, '::1', 'login', 'index', '2019-03-11', '11:27:39'),
(30, 1, '::1', 'giras', 'index', '2019-03-11', '11:47:47'),
(31, 1, '::1', 'giras', 'index', '2019-03-11', '11:59:41'),
(32, 1, '::1', 'giras', 'index', '2019-03-11', '12:11:35'),
(33, 1, '::1', 'giras', 'index', '2019-03-11', '12:11:56'),
(34, 1, '::1', 'giras', 'index', '2019-03-11', '12:31:50'),
(35, NULL, '::1', 'giras', 'index', '2019-03-11', '12:32:07'),
(36, NULL, '::1', 'login', 'index', '2019-03-11', '12:32:07'),
(37, NULL, '::1', 'login', 'index', '2019-03-11', '12:32:11'),
(38, 1, '::1', 'login', 'index', '2019-03-11', '12:32:11'),
(39, 1, '::1', 'principal', 'index', '2019-03-11', '12:32:11'),
(40, 1, '::1', 'giras', 'index', '2019-03-11', '12:32:16'),
(41, 1, '::1', 'giras', 'index', '2019-03-11', '12:35:08'),
(42, 1, '::1', 'giras', 'index', '2019-03-11', '12:35:18'),
(43, NULL, '::1', 'giras', 'index', '2019-03-11', '12:37:40'),
(44, NULL, '::1', 'login', 'index', '2019-03-11', '12:37:40'),
(45, NULL, '::1', 'giras', 'index', '2019-03-11', '13:19:22'),
(46, NULL, '::1', 'login', 'index', '2019-03-11', '13:19:22'),
(47, NULL, '::1', 'login', 'index', '2019-03-11', '13:19:26'),
(48, 1, '::1', 'login', 'index', '2019-03-11', '13:19:26'),
(49, 1, '::1', 'principal', 'index', '2019-03-11', '13:19:26'),
(50, 1, '::1', 'giras', 'index', '2019-03-11', '13:19:29'),
(51, 1, '::1', 'giras', 'index', '2019-03-11', '13:20:15'),
(52, 1, '::1', 'giras', 'index', '2019-03-11', '13:20:54'),
(53, NULL, '::1', 'giras', 'index', '2019-03-11', '13:21:28'),
(54, NULL, '::1', 'login', 'index', '2019-03-11', '13:21:28'),
(55, NULL, '::1', 'login', 'index', '2019-03-11', '13:21:31'),
(56, 1, '::1', 'login', 'index', '2019-03-11', '13:21:31'),
(57, 1, '::1', 'principal', 'index', '2019-03-11', '13:21:31'),
(58, 1, '::1', 'giras', 'index', '2019-03-11', '13:21:59'),
(59, 1, '::1', 'giras', 'index', '2019-03-11', '13:24:26'),
(60, 1, '::1', 'giras', 'agregargira', '2019-03-11', '13:25:08'),
(61, 1, '::1', 'giras', 'agregargira', '2019-03-11', '13:25:40'),
(62, 1, '::1', 'giras', 'agregargira', '2019-03-11', '13:27:29'),
(63, NULL, '::1', 'giras', 'index', '2019-03-11', '13:27:40'),
(64, NULL, '::1', 'login', 'index', '2019-03-11', '13:27:40'),
(65, 1, '::1', 'giras', 'agregargira', '2019-03-11', '13:29:17'),
(66, NULL, '::1', 'giras', 'index', '2019-03-11', '13:32:15'),
(67, NULL, '::1', 'login', 'index', '2019-03-11', '13:32:15'),
(68, NULL, '::1', 'login', 'index', '2019-03-11', '13:32:19'),
(69, 1, '::1', 'login', 'index', '2019-03-11', '13:32:19'),
(70, 1, '::1', 'principal', 'index', '2019-03-11', '13:32:19'),
(71, 1, '::1', 'giras', 'index', '2019-03-11', '13:32:24'),
(72, 1, '::1', 'giras', 'agregargira', '2019-03-11', '13:32:36'),
(73, NULL, '::1', 'giras', 'index', '2019-03-11', '13:37:39'),
(74, NULL, '::1', 'login', 'index', '2019-03-11', '13:37:39'),
(75, 1, '::1', 'giras', 'index', '2019-03-11', '14:17:51'),
(76, 1, '::1', 'giras', 'agregargira', '2019-03-11', '14:18:16'),
(77, 1, '::1', 'giras', 'index', '2019-03-11', '14:24:02'),
(78, 1, '::1', 'giras', 'index', '2019-03-11', '14:26:32'),
(79, 1, '::1', 'giras', 'index', '2019-03-11', '14:27:21'),
(80, 1, '::1', 'giras', 'index', '2019-03-11', '14:31:18'),
(81, 1, '::1', 'giras', 'index', '2019-03-11', '14:31:23'),
(82, 1, '::1', 'giras', 'index', '2019-03-11', '14:33:47'),
(83, 1, '::1', 'giras', 'index', '2019-03-11', '15:24:12'),
(84, NULL, '::1', 'giras', 'index', '2019-03-11', '15:24:17'),
(85, NULL, '::1', 'login', 'index', '2019-03-11', '15:24:17'),
(86, NULL, '::1', 'login', 'index', '2019-03-11', '15:24:20'),
(87, 1, '::1', 'login', 'index', '2019-03-11', '15:24:20'),
(88, 1, '::1', 'principal', 'index', '2019-03-11', '15:24:20'),
(89, 1, '::1', 'giras', 'index', '2019-03-11', '15:24:22'),
(90, 1, '::1', 'giras', 'index', '2019-03-11', '15:25:29'),
(91, 1, '::1', 'giras', 'index', '2019-03-11', '15:26:23'),
(92, 1, '::1', 'giras', 'index', '2019-03-11', '15:28:29'),
(93, 1, '::1', 'giras', 'index', '2019-03-11', '15:30:54'),
(94, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:31:27'),
(95, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:31:36'),
(96, NULL, '::1', 'giras', 'index', '2019-03-11', '15:32:44'),
(97, NULL, '::1', 'login', 'index', '2019-03-11', '15:32:44'),
(98, 1, '::1', 'giras', 'index', '2019-03-11', '15:33:25'),
(99, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:33:40'),
(100, 1, '::1', 'giras', 'index', '2019-03-11', '15:35:05'),
(101, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:35:15'),
(102, 1, '::1', 'giras', 'index', '2019-03-11', '15:35:44'),
(103, 1, '::1', 'giras', 'index', '2019-03-11', '15:36:38'),
(104, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:37:15'),
(105, 1, '::1', 'giras', 'index', '2019-03-11', '15:41:40'),
(106, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:42:16'),
(107, 1, '::1', 'giras', 'index', '2019-03-11', '15:43:30'),
(108, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:43:39'),
(109, 1, '::1', 'giras', 'index', '2019-03-11', '15:46:36'),
(110, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:46:41'),
(111, 1, '::1', 'giras', 'index', '2019-03-11', '15:46:58'),
(112, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:47:07'),
(113, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:49:47'),
(114, 1, '::1', 'giras', 'index', '2019-03-11', '15:50:52'),
(115, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:51:02'),
(116, 1, '::1', 'giras', 'index', '2019-03-11', '15:51:51'),
(117, 1, '::1', 'giras', 'index', '2019-03-11', '15:52:51'),
(118, NULL, '::1', 'giras', 'index', '2019-03-11', '15:53:00'),
(119, NULL, '::1', 'login', 'index', '2019-03-11', '15:53:00'),
(120, NULL, '::1', 'login', 'index', '2019-03-11', '15:53:03'),
(121, 1, '::1', 'login', 'index', '2019-03-11', '15:53:04'),
(122, 1, '::1', 'principal', 'index', '2019-03-11', '15:53:04'),
(123, 1, '::1', 'principal', 'index', '2019-03-11', '15:54:03'),
(124, 1, '::1', 'giras', 'index', '2019-03-11', '15:54:06'),
(125, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:54:17'),
(126, NULL, '::1', 'giras', 'index', '2019-03-11', '15:57:39'),
(127, NULL, '::1', 'login', 'index', '2019-03-11', '15:57:39'),
(128, 1, '::1', 'giras', 'index', '2019-03-11', '15:57:43'),
(129, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:57:54'),
(130, 1, '::1', 'giras', 'index', '2019-03-11', '15:58:39'),
(131, 1, '::1', 'giras', 'index', '2019-03-11', '15:58:51'),
(132, 1, '::1', 'giras', 'agregargira', '2019-03-11', '15:58:57'),
(133, 1, '::1', 'giras', 'index', '2019-03-11', '16:05:12'),
(134, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:06:37'),
(135, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:06:43'),
(136, NULL, '::1', 'giras', 'index', '2019-03-11', '16:07:12'),
(137, NULL, '::1', 'login', 'index', '2019-03-11', '16:07:12'),
(138, NULL, '::1', 'login', 'index', '2019-03-11', '16:07:15'),
(139, 1, '::1', 'login', 'index', '2019-03-11', '16:07:16'),
(140, 1, '::1', 'principal', 'index', '2019-03-11', '16:07:16'),
(141, 1, '::1', 'giras', 'index', '2019-03-11', '16:07:18'),
(142, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:07:55'),
(143, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:07:57'),
(144, 1, '::1', 'giras', 'index', '2019-03-11', '16:09:22'),
(145, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:09:36'),
(146, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:09:37'),
(147, 1, '::1', 'giras', 'index', '2019-03-11', '16:11:18'),
(148, 1, '::1', 'giras', 'index', '2019-03-11', '16:11:43'),
(149, NULL, '::1', 'giras', 'index', '2019-03-11', '16:11:50'),
(150, NULL, '::1', 'login', 'index', '2019-03-11', '16:11:50'),
(151, NULL, '::1', 'login', 'index', '2019-03-11', '16:11:53'),
(152, 1, '::1', 'login', 'index', '2019-03-11', '16:11:53'),
(153, 1, '::1', 'principal', 'index', '2019-03-11', '16:11:53'),
(154, 1, '::1', 'giras', 'index', '2019-03-11', '16:11:56'),
(155, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:12:07'),
(156, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:12:13'),
(157, 1, '::1', 'giras', 'index', '2019-03-11', '16:13:06'),
(158, 1, '::1', 'giras', 'index', '2019-03-11', '16:13:09'),
(159, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:13:20'),
(160, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:13:23'),
(161, 1, '::1', 'giras', 'index', '2019-03-11', '16:13:53'),
(162, 1, '::1', 'giras', 'index', '2019-03-11', '16:13:55'),
(163, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:14:03'),
(164, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:14:04'),
(165, 1, '::1', 'giras', 'index', '2019-03-11', '16:15:39'),
(166, 1, '::1', 'giras', 'index', '2019-03-11', '16:16:21'),
(167, 1, '::1', 'giras', 'index', '2019-03-11', '16:16:42'),
(168, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:16:52'),
(169, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:17:01'),
(170, 1, '::1', 'giras', 'index', '2019-03-11', '16:17:33'),
(171, NULL, '::1', 'giras', 'index', '2019-03-11', '16:17:39'),
(172, NULL, '::1', 'login', 'index', '2019-03-11', '16:17:39'),
(173, 1, '::1', 'giras', 'index', '2019-03-11', '16:17:47'),
(174, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:17:59'),
(175, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:18:00'),
(176, 1, '::1', 'giras', 'index', '2019-03-11', '16:19:56'),
(177, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:20:05'),
(178, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:20:05'),
(179, 1, '::1', 'giras', 'index', '2019-03-11', '16:20:33'),
(180, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:20:43'),
(181, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:20:43'),
(182, 1, '::1', 'giras', 'index', '2019-03-11', '16:21:15'),
(183, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:21:51'),
(184, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:21:51'),
(185, 1, '::1', 'giras', 'index', '2019-03-11', '16:22:22'),
(186, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:22:33'),
(187, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:22:34'),
(188, 1, '::1', 'giras', 'index', '2019-03-11', '16:23:22'),
(189, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:23:36'),
(190, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:23:37'),
(191, 1, '::1', 'giras', 'index', '2019-03-11', '16:24:24'),
(192, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:25:12'),
(193, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:25:13'),
(194, 1, '::1', 'giras', 'index', '2019-03-11', '16:37:25'),
(195, 1, '::1', 'giras', 'index', '2019-03-11', '16:37:27'),
(196, 1, '::1', 'giras', 'index', '2019-03-11', '16:49:55'),
(197, 1, '::1', 'giras', 'index', '2019-03-11', '16:56:56'),
(198, 1, '::1', 'giras', 'index', '2019-03-11', '16:57:20'),
(199, 1, '::1', 'giras', 'agregargira', '2019-03-11', '16:58:22'),
(200, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '16:58:23'),
(201, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '16:59:02'),
(202, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '16:59:02'),
(203, 1, '::1', 'giras', 'index', '2019-03-11', '17:01:21'),
(204, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:01:27'),
(205, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:01:29'),
(206, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:01:44'),
(207, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:01:44'),
(208, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:01:55'),
(209, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:01:55'),
(210, 1, '::1', 'giras', 'index', '2019-03-11', '17:05:07'),
(211, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:05:18'),
(212, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:05:19'),
(213, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:05:32'),
(214, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:05:32'),
(215, 1, '::1', 'giras', 'index', '2019-03-11', '17:06:43'),
(216, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:06:46'),
(217, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:06:47'),
(218, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:06:56'),
(219, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:06:56'),
(220, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:07:22'),
(221, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:07:22'),
(222, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:09:01'),
(223, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:09:01'),
(224, 1, '::1', 'giras', 'index', '2019-03-11', '17:09:43'),
(225, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:10:07'),
(226, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:10:07'),
(227, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:10:25'),
(228, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:10:25'),
(229, 1, '::1', 'giras', 'index', '2019-03-11', '17:10:59'),
(230, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:11:33'),
(231, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:11:34'),
(232, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:12:20'),
(233, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:12:20'),
(234, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:12:55'),
(235, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:12:55'),
(236, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:13:28'),
(237, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:13:28'),
(238, 1, '::1', 'giras', 'index', '2019-03-11', '17:18:13'),
(239, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:18:20'),
(240, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:18:21'),
(241, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:18:33'),
(242, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:18:33'),
(243, 1, '::1', 'giras', 'index', '2019-03-11', '17:19:00'),
(244, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:19:05'),
(245, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:19:06'),
(246, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:19:17'),
(247, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:19:17'),
(248, NULL, '::1', 'giras', 'index', '2019-03-11', '17:23:06'),
(249, NULL, '::1', 'login', 'index', '2019-03-11', '17:23:06'),
(250, NULL, '::1', 'login', 'index', '2019-03-11', '17:23:09'),
(251, 1, '::1', 'login', 'index', '2019-03-11', '17:23:09'),
(252, 1, '::1', 'principal', 'index', '2019-03-11', '17:23:09'),
(253, 1, '::1', 'giras', 'index', '2019-03-11', '17:23:12'),
(254, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:23:52'),
(255, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:23:53'),
(256, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:24:35'),
(257, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:24:35'),
(258, NULL, '::1', 'giras', 'index', '2019-03-11', '17:27:40'),
(259, NULL, '::1', 'login', 'index', '2019-03-11', '17:27:40'),
(260, 1, '::1', 'giras', 'index', '2019-03-11', '17:28:32'),
(261, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:28:42'),
(262, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:28:43'),
(263, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:28:51'),
(264, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:28:51'),
(265, 1, '::1', 'giras', 'index', '2019-03-11', '17:30:09'),
(266, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:30:15'),
(267, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:30:16'),
(268, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:30:27'),
(269, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:30:27'),
(270, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:30:49'),
(271, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:30:49'),
(272, 1, '::1', 'giras', 'index', '2019-03-11', '17:31:54'),
(273, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:32:05'),
(274, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:32:06'),
(275, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:32:23'),
(276, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:32:23'),
(277, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:33:03'),
(278, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:33:03'),
(279, 1, '::1', 'giras', 'index', '2019-03-11', '17:34:14'),
(280, 1, '::1', 'giras', 'index', '2019-03-11', '17:34:16'),
(281, 1, '::1', 'giras', 'agregargira', '2019-03-11', '17:35:04'),
(282, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '17:35:04'),
(283, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:43:10'),
(284, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:43:10'),
(285, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '17:43:33'),
(286, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '17:43:33'),
(287, 1, '::1', 'giras', 'index', '2019-03-11', '18:08:20'),
(288, 1, '::1', 'giras', 'agregargira', '2019-03-11', '18:16:06'),
(289, 1, '::1', 'giras', 'cargardatospersonales', '2019-03-11', '18:16:06'),
(290, 1, '::1', 'giras', 'gastosgira', '2019-03-11', '18:16:45'),
(291, 1, '::1', 'giras', 'cargartabladegira', '2019-03-11', '18:16:45'),
(292, NULL, '::1', 'login', 'index', '2019-03-13', '11:25:50'),
(293, NULL, '::1', 'login', 'index', '2019-03-13', '11:25:53'),
(294, 1, '::1', 'login', 'index', '2019-03-13', '11:25:53'),
(295, 1, '::1', 'principal', 'index', '2019-03-13', '11:25:53'),
(296, 1, '::1', 'registro', 'index', '2019-03-13', '11:25:57'),
(297, 1, '::1', 'registro', 'index', '2019-03-13', '11:26:38'),
(298, 1, '::1', 'registro', 'index', '2019-03-13', '11:34:19'),
(299, 1, '::1', 'registro', 'index', '2019-03-13', '11:37:18'),
(300, 1, '::1', 'registro', 'index', '2019-03-13', '11:40:32'),
(301, 1, '::1', 'registro', 'index', '2019-03-13', '11:40:50'),
(302, NULL, '::1', 'registro', 'index', '2019-03-13', '11:41:02'),
(303, NULL, '::1', 'login', 'index', '2019-03-13', '11:41:02'),
(304, NULL, '::1', 'login', 'index', '2019-03-13', '11:41:04'),
(305, 1, '::1', 'login', 'index', '2019-03-13', '11:41:05'),
(306, 1, '::1', 'principal', 'index', '2019-03-13', '11:41:05'),
(307, 1, '::1', 'registro', 'index', '2019-03-13', '11:41:07'),
(308, 1, '::1', 'registro', 'index', '2019-03-13', '11:48:11'),
(309, 1, '::1', 'registro', 'index', '2019-03-13', '11:56:40'),
(310, 1, '::1', 'registro', 'index', '2019-03-13', '11:59:42'),
(311, 1, '::1', 'registro', 'index', '2019-03-13', '12:04:43'),
(312, 1, '::1', 'registro', 'index', '2019-03-13', '12:04:57'),
(313, 1, '::1', 'registro', 'index', '2019-03-13', '12:05:04'),
(314, 1, '::1', 'registro', 'index', '2019-03-13', '12:05:13'),
(315, NULL, '::1', 'registro', 'index', '2019-03-13', '12:05:28'),
(316, NULL, '::1', 'login', 'index', '2019-03-13', '12:05:28'),
(317, 1, '::1', 'registro', 'index', '2019-03-13', '12:11:53'),
(318, 1, '::1', 'registro', 'index', '2019-03-13', '12:22:27'),
(319, 1, '::1', 'registro', 'index', '2019-03-13', '12:24:54'),
(320, 1, '::1', 'registro', 'index', '2019-03-13', '12:31:26'),
(321, 1, '::1', 'registro', 'index', '2019-03-13', '12:32:11'),
(322, 1, '::1', 'registro', 'index', '2019-03-13', '12:38:47'),
(323, 1, '::1', 'registro', 'index', '2019-03-13', '13:26:46'),
(324, 1, '::1', 'registro', 'index', '2019-03-13', '13:50:55'),
(325, 1, '::1', 'registro', 'index', '2019-03-13', '13:54:45'),
(326, 1, '::1', 'registro', 'index', '2019-03-13', '13:55:31'),
(327, 1, '::1', 'registro', 'index', '2019-03-13', '13:57:23'),
(328, 1, '::1', 'registro', 'index', '2019-03-13', '13:57:52'),
(329, 1, '::1', 'registro', 'index', '2019-03-13', '14:02:46'),
(330, 1, '::1', 'registro', 'index', '2019-03-13', '14:06:25'),
(331, 1, '::1', 'registro', 'index', '2019-03-13', '14:06:45'),
(332, 1, '::1', 'registro', 'index', '2019-03-13', '14:06:57'),
(333, 1, '::1', 'registro', 'index', '2019-03-13', '14:41:19'),
(334, NULL, '::1', 'registro', 'index', '2019-03-13', '15:03:55'),
(335, NULL, '::1', 'login', 'index', '2019-03-13', '15:03:55'),
(336, NULL, '::1', 'login', 'index', '2019-03-13', '15:03:57'),
(337, 1, '::1', 'login', 'index', '2019-03-13', '15:03:58'),
(338, 1, '::1', 'principal', 'index', '2019-03-13', '15:03:58'),
(339, 1, '::1', 'registro', 'index', '2019-03-13', '15:04:01'),
(340, 1, '::1', 'registro', 'agregarestudiante', '2019-03-13', '15:05:47'),
(341, 1, '::1', 'registro', 'agregarestudiante', '2019-03-13', '15:06:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `enlace` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `titulo`, `enlace`) VALUES
(1, 'Inicio', 'principal'),
(2, 'Pedido/Servicio', 'servicio'),
(3, 'Mis Solicitudes', 'solicitudes'),
(4, 'Supervisor', 'supervisor'),
(5, 'Administrar Servicios', 'admin_servicios'),
(6, 'Administrar Usuarios', 'app'),
(7, 'Servicio Especial', 'servicio_especial'),
(8, 'Informes', 'informes'),
(9, 'Configuracion', 'addlogo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permisos` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `permiso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permisos`, `id_menu`, `id_role`, `permiso`) VALUES
(54, 1, 1, 1),
(55, 2, 1, 1),
(56, 3, 1, 0),
(57, 4, 1, 1),
(58, 5, 1, 1),
(59, 6, 1, 1),
(60, 1, 2, 1),
(61, 2, 2, 1),
(62, 3, 2, 1),
(63, 1, 4, 1),
(64, 2, 4, 1),
(65, 3, 4, 1),
(66, 4, 4, 1),
(67, 7, 1, 1),
(68, 8, 1, 1),
(69, 9, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nombre_role` varchar(100) NOT NULL,
  `peso` int(11) NOT NULL,
  `otro_campo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id_role`, `nombre_role`, `peso`, `otro_campo`) VALUES
(1, 'Admin', 1, ''),
(2, 'mixto', 1, ''),
(3, 'usuario', 1, ''),
(4, 'aprobador', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `switch`
--

CREATE TABLE `switch` (
  `id` int(11) NOT NULL,
  `accion` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_sad` int(11) NOT NULL,
  `codigo_referencial` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `password`, `cedula`, `nombre`, `apellido`, `correo`, `cargo`, `codigo_sad`, `codigo_referencial`, `estado`, `id_role`) VALUES
(1, 'admin', 'f90c7d2067835d806450d86b71cc9ae7b2473714', 0, 'Administrador', '', 'soporte@cotedem.com', 'Root', 0, '', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas_contables`
--
ALTER TABLE `cuentas_contables`
  ADD PRIMARY KEY (`id_cuenta_contable`);

--
-- Indices de la tabla `gastosgiras`
--
ALTER TABLE `gastosgiras`
  ADD PRIMARY KEY (`id_gastosgiras`),
  ADD KEY `id_gira` (`id_gira`);

--
-- Indices de la tabla `gerentes_distrito`
--
ALTER TABLE `gerentes_distrito`
  ADD PRIMARY KEY (`id_gerentes_distrito`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `gerentes_producto`
--
ALTER TABLE `gerentes_producto`
  ADD PRIMARY KEY (`id_gerente_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `gerente_lineal`
--
ALTER TABLE `gerente_lineal`
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `giras`
--
ALTER TABLE `giras`
  ADD PRIMARY KEY (`id_gira`);

--
-- Indices de la tabla `linea_otx`
--
ALTER TABLE `linea_otx`
  ADD PRIMARY KEY (`id_otx`);

--
-- Indices de la tabla `linea_rx`
--
ALTER TABLE `linea_rx`
  ADD PRIMARY KEY (`id_rx`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permisos`),
  ADD KEY `id_menu` (`id_menu`,`id_role`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu_2` (`id_menu`),
  ADD KEY `id_role_2` (`id_role`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `nombre_role` (`nombre_role`);

--
-- Indices de la tabla `switch`
--
ALTER TABLE `switch`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentas_contables`
--
ALTER TABLE `cuentas_contables`
  MODIFY `id_cuenta_contable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `gastosgiras`
--
ALTER TABLE `gastosgiras`
  MODIFY `id_gastosgiras` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gerentes_distrito`
--
ALTER TABLE `gerentes_distrito`
  MODIFY `id_gerentes_distrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gerentes_producto`
--
ALTER TABLE `gerentes_producto`
  MODIFY `id_gerente_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `giras`
--
ALTER TABLE `giras`
  MODIFY `id_gira` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `linea_otx`
--
ALTER TABLE `linea_otx`
  MODIFY `id_otx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `linea_rx`
--
ALTER TABLE `linea_rx`
  MODIFY `id_rx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `switch`
--
ALTER TABLE `switch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gastosgiras`
--
ALTER TABLE `gastosgiras`
  ADD CONSTRAINT `gastosgiras_ibfk_1` FOREIGN KEY (`id_gira`) REFERENCES `giras` (`id_gira`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gerentes_distrito`
--
ALTER TABLE `gerentes_distrito`
  ADD CONSTRAINT `gerentes_distrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `gerentes_producto`
--
ALTER TABLE `gerentes_producto`
  ADD CONSTRAINT `gerentes_producto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `gerente_lineal`
--
ALTER TABLE `gerente_lineal`
  ADD CONSTRAINT `gerente_lineal_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
