-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-08-2022 a las 12:18:43
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2w4GSUinHO`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CUENTAS_POR_COBRAR`
--

CREATE TABLE `CUENTAS_POR_COBRAR` (
  `Id_cuenta` int(11) NOT NULL,
  `Id_cliente` int(11) DEFAULT NULL,
  `Cuentas` varchar(50) DEFAULT NULL,
  `Tipo_Cuenta` varchar(25) NOT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Deuda_Cuenta_Total` decimal(10,0) DEFAULT NULL,
  `Deposito` decimal(10,0) DEFAULT NULL,
  `Deuda_Actual` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `CUENTAS_POR_COBRAR`
--

INSERT INTO `CUENTAS_POR_COBRAR` (`Id_cuenta`, `Id_cliente`, `Cuentas`, `Tipo_Cuenta`, `Descripcion`, `Deuda_Cuenta_Total`, `Deposito`, `Deuda_Actual`) VALUES
(9, 8, 'Utilidad antes de impuestos', 'activo', 'N/D', '500', '100', '400'),
(10, 0, 'ACTIVO                              ', '', 'Servicios contables para el mes de Julio', '1175', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CUENTAS_POR_PAGAR`
--

CREATE TABLE `CUENTAS_POR_PAGAR` (
  `Id_Cuenta` int(100) NOT NULL,
  `Id_Usuario` int(10) NOT NULL,
  `Cuentas` varchar(50) NOT NULL,
  `Tipo_Cuenta` varchar(25) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(100) NOT NULL,
  `empresa` varchar(200) NOT NULL,
  `ruc` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `imagen` varchar(2000) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `simbolo_moneda` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `empresa`, `ruc`, `direccion`, `telefono`, `descripcion`, `imagen`, `correo`, `simbolo_moneda`) VALUES
(1, 'INVERSIONES FINANCIERAS - IS', '200', 'Tegucigalpa', '2424-2334', 'Empresa Financiera', '2021-07-24_23.08.46.png', '@gmail.com', 'L.'),
(2, 'Tomate', 'rojo', 'far away', '5050-5050', 'nice', '', '@gmail.com', 'L.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FACTURA`
--

CREATE TABLE `FACTURA` (
  `ID` int(11) NOT NULL,
  `NFACTURA` int(11) DEFAULT NULL,
  `CLIENTE` varchar(255) DEFAULT NULL,
  `DESCRIPCION` varchar(80) DEFAULT NULL,
  `TOTAL` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `FACTURA`
--

INSERT INTO `FACTURA` (`ID`, `NFACTURA`, `CLIENTE`, `DESCRIPCION`, `TOTAL`) VALUES
(1, 121544, 'Larach', 'Servicios contables para el mes de Julio', '2500'),
(2, 584587, 'Fernando', 'Servicios contables para el mes de Julio', '3500'),
(3, 98977, 'Fernando', 'Servicios contables para el mes de Julio', '5000'),
(7, 854785, 'Fernando', 'Servicios contables para el mes de Julio', '2975'),
(14, 125487, 'Anonimo', 'Servicios contables para el mes de Julio', '2975'),
(15, 125487, 'Anonimo', 'Servicios contables para el mes de Julio', '1175'),
(16, 125487, 'Anonimo', 'Servicios contables para el mes de Julio', '0'),
(17, 125487, 'Anonimo', 'Servicios contables para el mes de Julio', '1175'),
(18, 125487, 'Anonimo', 'Servicios contables para el mes de Julio', '1175');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `history_log`
--

INSERT INTO `history_log` (`log_id`, `user_id`, `action`, `date`) VALUES
(1, 1, 'has logged in the system at ', '2018-11-27 07:58:26'),
(2, 1, 'has logged out the system at ', '2018-11-27 07:59:03'),
(3, 1, 'has logged in the system at ', '2018-11-30 22:32:20'),
(4, 6, 'has logged in the system at ', '2018-12-01 20:28:15'),
(13, 1, 'has logged out the system at ', '2018-11-30 22:42:36'),
(14, 1, 'has logged in the system at ', '2018-12-04 11:12:37'),
(15, 1, 'has logged in the system at ', '2018-12-19 10:16:00'),
(16, 1, 'has logged in the system at ', '2018-12-19 10:21:46'),
(17, 1, 'has logged in the system at ', '2018-12-19 10:27:32'),
(18, 1, 'has logged in the system at ', '2018-12-19 10:33:11'),
(19, 1, 'se ha desconectado el sistema en ', '2018-12-19 10:39:49'),
(20, 1, 'has logged in the system at ', '2018-12-19 10:40:01'),
(21, 1, 'se ha desconectado el sistema en ', '2018-12-19 10:40:04'),
(22, 1, 'has logged in the system at ', '2018-12-19 10:42:35'),
(23, 1, 'se ha desconectado el sistema en ', '2018-12-19 10:42:44'),
(24, 1, 'has logged in the system at ', '2018-12-19 10:43:07'),
(25, 1, 'se ha desconectado el sistema en ', '2018-12-19 10:44:35'),
(26, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-14 10:55:46'),
(27, 1, 'se ha desconectado el sistema en ', '2019-01-14 11:02:35'),
(28, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-14 11:02:41'),
(29, 1, 'se ha desconectado el sistema en ', '2019-01-14 11:09:15'),
(30, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-16 21:05:23'),
(31, 1, 'se ha desconectado el sistema en ', '2019-01-16 21:05:32'),
(32, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-16 21:06:19'),
(33, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-16 21:09:39'),
(34, 1, 'se ha desconectado el sistema en ', '2019-01-16 21:12:48'),
(35, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-16 21:12:52'),
(36, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-16 22:33:53'),
(37, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-17 08:50:57'),
(38, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-17 22:37:23'),
(39, 1, 'se ha desconectado el sistema en ', '2019-01-18 01:25:04'),
(40, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-18 03:35:56'),
(41, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-18 08:25:58'),
(42, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-18 20:31:12'),
(43, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-19 06:39:38'),
(44, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-20 01:27:24'),
(45, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-20 01:43:21'),
(46, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-20 02:56:46'),
(47, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-20 10:44:05'),
(48, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-20 11:13:20'),
(49, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-21 11:27:47'),
(50, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-23 01:38:33'),
(51, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-23 07:15:31'),
(52, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-23 10:39:09'),
(53, 1, 'ha iniciado sesiÃ³n en el sistema en ', '2019-01-23 20:39:13'),
(54, 1, 'se ha desconectado el sistema en ', '2019-01-24 01:32:13'),
(55, 1, 'se ha desconectado el sistema en ', '2019-01-24 01:46:48'),
(56, 1, 'se ha desconectado el sistema en ', '2019-01-24 01:48:41'),
(57, 1, 'se ha desconectado el sistema en ', '2019-01-24 01:48:52'),
(58, 1, 'se ha desconectado el sistema en ', '2019-01-24 01:49:01'),
(59, 1, 'se ha desconectado el sistema en ', '2019-01-24 01:52:37'),
(60, 1, 'se ha desconectado el sistema en ', '2019-01-24 01:55:52'),
(61, 1, 'se ha desconectado el sistema en ', '2019-01-24 02:50:25'),
(62, 1, 'se ha desconectado el sistema en ', '2019-01-25 18:59:42'),
(63, 1, 'se ha desconectado el sistema en ', '2019-01-26 12:13:01'),
(64, 1, 'se ha desconectado el sistema en ', '2019-01-26 12:39:03'),
(65, 1, 'se ha desconectado el sistema en ', '2019-01-26 21:34:43'),
(66, 1, 'se ha desconectado el sistema en ', '2019-01-26 21:35:05'),
(67, 1, 'se ha desconectado el sistema en ', '2019-01-26 21:36:18'),
(68, 1, 'se ha desconectado el sistema en ', '2019-01-26 21:37:19'),
(69, 1, 'se ha desconectado el sistema en ', '2019-01-26 21:40:18'),
(70, 1, 'se ha desconectado el sistema en ', '2019-01-26 21:42:37'),
(71, 2, 'se ha desconectado el sistema en ', '2019-01-26 21:53:27'),
(72, 3, 'se ha desconectado el sistema en ', '2019-01-26 23:53:55'),
(73, 2, 'se ha desconectado el sistema en ', '2019-01-27 00:02:46'),
(74, 3, 'se ha desconectado el sistema en ', '2019-01-27 00:26:04'),
(75, 3, 'se ha desconectado el sistema en ', '2019-01-27 00:27:37'),
(76, 4, 'se ha desconectado el sistema en ', '2019-01-27 00:28:53'),
(77, 0, 'se ha desconectado el sistema en ', '2019-02-01 10:49:35'),
(78, 1, 'se ha desconectado el sistema en ', '2019-02-02 01:10:46'),
(79, 1, 'se ha desconectado el sistema en ', '2019-02-08 13:27:52'),
(80, 1, 'se ha desconectado el sistema en ', '2019-02-08 13:29:04'),
(81, 1, 'se ha desconectado el sistema en ', '2019-02-11 12:13:25'),
(82, 1, 'se ha desconectado el sistema en ', '2019-02-17 23:59:49'),
(83, 1, 'se ha desconectado el sistema en ', '2019-02-19 22:06:23'),
(84, 1, 'se ha desconectado el sistema en ', '2019-02-22 23:20:09'),
(85, 1, 'se ha desconectado el sistema en ', '2019-03-30 08:37:10'),
(86, 1, 'se ha desconectado el sistema en ', '2019-04-19 23:40:42'),
(87, 1, 'se ha desconectado el sistema en ', '2019-04-20 00:34:27'),
(88, 1, 'se ha desconectado el sistema en ', '2019-04-24 08:25:28'),
(89, 1, 'se ha desconectado el sistema en ', '2019-04-24 11:54:04'),
(90, 1, 'se ha desconectado el sistema en ', '2019-04-25 10:14:44'),
(91, 1, 'se ha desconectado el sistema en ', '2019-04-25 23:41:34'),
(92, 1, 'se ha desconectado el sistema en ', '2019-04-26 00:25:33'),
(93, 1, 'se ha desconectado el sistema en ', '2019-04-26 04:25:46'),
(94, 1, 'se ha desconectado el sistema en ', '2019-04-28 10:09:37'),
(95, 1, 'se ha desconectado el sistema en ', '2019-05-29 04:17:06'),
(96, 1, 'se ha desconectado el sistema en ', '2019-05-30 11:27:19'),
(97, 1, 'se ha desconectado el sistema en ', '2019-06-04 23:14:56'),
(98, 1, 'se ha desconectado el sistema en ', '2019-06-27 03:36:33'),
(99, 1, 'se ha desconectado el sistema en ', '2019-06-27 07:59:50'),
(100, 1, 'se ha desconectado el sistema en ', '2019-08-11 05:41:03'),
(101, 1, 'se ha desconectado el sistema en ', '2019-08-29 11:38:25'),
(102, 1, 'se ha desconectado el sistema en ', '2019-09-07 11:16:16'),
(103, 5, 'se ha desconectado el sistema en ', '2019-09-07 11:52:24'),
(104, 5, 'se ha desconectado el sistema en ', '2019-09-07 12:13:49'),
(105, 5, 'se ha desconectado el sistema en ', '2019-09-07 12:19:01'),
(106, 5, 'se ha desconectado el sistema en ', '2019-09-07 12:27:56'),
(107, 5, 'se ha desconectado el sistema en ', '2019-09-08 09:00:40'),
(108, 5, 'se ha desconectado el sistema en ', '2019-09-08 09:00:47'),
(109, 5, 'se ha desconectado el sistema en ', '2020-01-10 11:04:44'),
(110, 5, 'se ha desconectado el sistema en ', '2020-01-10 11:04:54'),
(111, 5, 'se ha desconectado el sistema en ', '2020-01-10 11:30:46'),
(112, 5, 'se ha desconectado el sistema en ', '2020-01-10 11:38:04'),
(113, 5, 'se ha desconectado el sistema en ', '2020-01-11 11:41:09'),
(114, 5, 'se ha desconectado el sistema en ', '2020-01-11 11:42:57'),
(115, 5, 'se ha desconectado el sistema en ', '2020-01-11 11:58:26'),
(116, 5, 'se ha desconectado el sistema en ', '2020-01-11 22:51:04'),
(117, 5, 'se ha desconectado el sistema en ', '2020-01-12 00:54:49'),
(118, 5, 'se ha desconectado el sistema en ', '2020-01-12 11:04:17'),
(119, 5, 'se ha desconectado el sistema en ', '2020-01-12 11:51:05'),
(120, 5, 'se ha desconectado el sistema en ', '2020-01-12 11:52:16'),
(121, 5, 'se ha desconectado el sistema en ', '2020-01-12 11:52:21'),
(122, 5, 'se ha desconectado el sistema en ', '2020-01-12 11:53:48'),
(123, 5, 'se ha desconectado el sistema en ', '2020-01-12 11:54:34'),
(124, 5, 'se ha desconectado el sistema en ', '2020-01-12 11:55:40'),
(125, 5, 'se ha desconectado el sistema en ', '2020-01-12 11:55:44'),
(126, 5, 'se ha desconectado el sistema en ', '2020-01-12 11:55:58'),
(127, 5, 'se ha desconectado el sistema en ', '2020-01-12 11:56:08'),
(128, 5, 'se ha desconectado el sistema en ', '2020-01-13 05:59:34'),
(129, 5, 'se ha desconectado el sistema en ', '2020-01-13 09:18:38'),
(130, 5, 'se ha desconectado el sistema en ', '2020-01-13 14:12:00'),
(131, 5, 'se ha desconectado el sistema en ', '2020-01-13 14:31:57'),
(132, 5, 'se ha desconectado el sistema en ', '2020-01-13 14:32:32'),
(133, 5, 'se ha desconectado el sistema en ', '2020-01-15 09:29:50'),
(134, 5, 'se ha desconectado el sistema en ', '2020-02-08 04:28:27'),
(135, 5, 'se ha desconectado el sistema en ', '2020-02-09 07:02:23'),
(136, 5, 'se ha desconectado el sistema en ', '2020-02-12 11:12:23'),
(137, 5, 'se ha desconectado el sistema en ', '2020-02-12 12:07:49'),
(138, 5, 'se ha desconectado el sistema en ', '2020-02-12 13:20:43'),
(139, 5, 'se ha desconectado el sistema en ', '2020-02-12 22:28:22'),
(140, 5, 'se ha desconectado el sistema en ', '2020-02-12 22:55:52'),
(141, 6, 'se ha desconectado el sistema en ', '2020-02-12 22:56:20'),
(142, 5, 'se ha desconectado el sistema en ', '2020-02-12 22:57:49'),
(143, 5, 'se ha desconectado el sistema en ', '2020-02-13 00:30:01'),
(144, 5, 'se ha desconectado el sistema en ', '2020-02-13 01:03:55'),
(145, 5, 'se ha desconectado el sistema en ', '2020-02-13 01:51:57'),
(146, 5, 'se ha desconectado el sistema en ', '2020-02-13 19:58:42'),
(147, 5, 'se ha desconectado el sistema en ', '2020-02-13 20:09:10'),
(148, 5, 'se ha desconectado el sistema en ', '2022-08-01 15:59:04'),
(149, 5, 'se ha desconectado el sistema en ', '2022-08-01 16:17:42'),
(150, 0, 'se ha desconectado el sistema en ', '2022-08-01 16:37:08'),
(151, 0, 'se ha desconectado el sistema en ', '2022-08-01 16:37:43'),
(152, 5, 'se ha desconectado el sistema en ', '2022-08-01 18:43:20'),
(153, 1, 'se ha desconectado el sistema en ', '2022-08-10 22:29:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(200) NOT NULL,
  `fecha` datetime NOT NULL,
  `cuenta` varchar(200) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `monto` float NOT NULL,
  `debe_haber` varchar(200) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `temporada` varchar(10) NOT NULL,
  `id_usuario` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `fecha`, `cuenta`, `descripcion`, `monto`, `debe_haber`, `id_cliente`, `temporada`, `id_usuario`) VALUES
(123, '2022-08-09 00:00:00', 'Bancos', 'N/D', 200, 'debe', 8, '10', 1),
(124, '2022-08-12 00:00:00', 'Caja', 'N/D', 1000, 'debe', 8, '10', 1),
(125, '2022-08-11 00:00:00', 'Cuentas x Cobrar', 'N/D', 500, 'debe', 8, '10', 1),
(126, '2022-08-26 00:00:00', 'Documentos por cobrar', 'N/D', 300, 'debe', 8, '10', 1),
(127, '2022-08-16 00:00:00', 'Documentos por cobrar', 'N/D', 2000, 'debe', 8, '10', 1),
(128, '2022-08-13 00:00:00', 'Pagos Anticipados', 'N/D', 100, 'debe', 8, '10', 1),
(129, '2022-08-26 00:00:00', 'Caja', 'N/D', 500, 'haber', 8, '10', 1),
(130, '2022-08-11 00:00:00', 'Edificios', 'N/D', 500, 'debe', 8, '10', 1),
(131, '2022-08-26 00:00:00', 'Bancos', 'N/D', 1000, 'debe', 8, '10', 1),
(132, '2022-08-11 00:00:00', 'Bancos', 'N/D', 1000, 'debe', 8, '10', 1),
(133, '2022-08-18 00:00:00', 'Bancos', 'N/D', 1000, 'debe', 1, '10', 1),
(134, '2022-08-30 00:00:00', 'Bancos', 'N/D', 1000, 'haber', 8, '10', 1),
(135, '2022-08-24 00:00:00', 'Depreciacion Acumulada', 'N/D', 1000, 'haber', 8, '10', 1),
(136, '2022-08-18 00:00:00', 'Capital Social', 'N/D', 3000, 'debe', 8, '10', 1),
(137, '2022-08-18 00:00:00', 'Caja', 'N/D', 1000, 'debe', 1, '10', 1),
(138, '2022-08-25 00:00:00', 'Caja', 'N/D', 500, 'debe', 9, '10', 1),
(139, '2022-09-14 00:00:00', 'Caja', 'N/D', 1000, 'debe', 1, '10', 1),
(140, '2022-09-01 00:00:00', 'Cuentas x Cobrar', 'N/D', 1000, 'debe', 1, '10', 1),
(141, '2022-08-01 00:00:00', 'Bancos', 'N/D', 200, 'debe', 8, '10', 1),
(142, '2022-09-03 00:00:00', 'Caja', 'N/D', 1000, 'debe', 8, '10', 1),
(143, '2022-11-15 00:00:00', 'Caja', 'N/D', 1000, 'debe', 4, '10', 1),
(144, '2022-10-20 00:00:00', 'Pagos Anticipados', 'N/D', 500, 'debe', 9, '10', 1),
(145, '2022-09-22 00:00:00', 'Caja', 'N/D', 500, 'debe', 4, '10', 1),
(146, '2022-08-17 00:00:00', 'Documentos por cobrar', 'N/D', 250, 'debe', 9, '10', 1),
(147, '2022-08-12 00:00:00', '', 'N/D', 500, 'debe', 8, '10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro2`
--

CREATE TABLE `libro2` (
  `id_libro` int(200) NOT NULL,
  `fecha` date NOT NULL,
  `cuenta` varchar(200) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `monto` float NOT NULL,
  `debe_haber` varchar(200) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `temporada` varchar(10) NOT NULL,
  `id_usuario` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro2`
--

INSERT INTO `libro2` (`id_libro`, `fecha`, `cuenta`, `descripcion`, `monto`, `debe_haber`, `id_cliente`, `temporada`, `id_usuario`) VALUES
(1, '2022-08-12', 'Venta', 'N/D', 250, 'debe', 8, '10', 1),
(2, '2022-08-11', 'Costo de venta', 'N/D', 500, 'debe', 8, '10', 1),
(4, '2022-08-17', 'Utilidad antes de impuestos', 'N/D', 100, '', 8, '10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `proname` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `proname`, `amount`, `time`) VALUES
(128, 'IMPRESORA', '0', '2022-08-11 03:54:36'),
(129, 'TINTAS EPSON', '8', '2022-08-11 03:56:35'),
(130, 'CARPETAS', '50', '2022-08-11 03:57:36'),
(131, 'FOLDERS', '20', '2022-08-11 03:58:07'),
(132, 'lapiz', '6', '2022-08-11 01:16:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_BALANCE`
--

CREATE TABLE `TBL_BALANCE` (
  `Id_Balance` int(11) NOT NULL,
  `Id_Cliente` int(11) DEFAULT NULL,
  `Total_Activo` int(11) DEFAULT NULL,
  `Total_Pasivo` int(11) DEFAULT NULL,
  `Total_Patrimonio` int(11) DEFAULT NULL,
  `Total_Pasivo_Patrimonio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_BALANCE`
--

INSERT INTO `TBL_BALANCE` (`Id_Balance`, `Id_Cliente`, `Total_Activo`, `Total_Pasivo`, `Total_Patrimonio`, `Total_Pasivo_Patrimonio`) VALUES
(2, 8, 4300, 0, 3000, 3000),
(3, 8, 4300, 0, 3000, 3000),
(4, 8, 4300, 0, 3000, 3000),
(5, 8, 4300, 0, 3000, 3000),
(6, 8, 4300, 0, 3000, 3000),
(7, 8, 4300, 0, 3000, 3000),
(8, 8, 4300, 0, 3000, 3000),
(9, 8, 4300, 0, 3000, 3000),
(10, 8, 4300, 0, 3000, 3000),
(11, 8, 4300, 0, 3000, 3000),
(12, 8, 4300, 0, 3000, 3000),
(13, 8, 4300, 0, 3000, 3000),
(14, 8, 4300, 0, 3000, 3000),
(15, 8, 4300, 0, 3000, 3000),
(16, 8, 4300, 0, 3000, 3000),
(17, 8, 4300, 0, 3000, 3000),
(18, 8, 4300, 0, 3000, 3000),
(19, 8, 4300, 0, 3000, 3000),
(20, 8, 4300, 0, 3000, 3000),
(21, 8, 4300, 0, 3000, 3000),
(22, 8, 4300, 0, 3000, 3000),
(23, 8, 4300, 0, 3000, 3000),
(24, 8, 4300, 0, 3000, 3000),
(25, 8, 4300, 0, 3000, 3000),
(26, 8, 4300, 0, 3000, 3000),
(27, 8, 4300, 0, 3000, 3000),
(28, 8, 4300, 0, 3000, 3000),
(29, 8, 4300, 0, 3000, 3000),
(30, 8, 4300, 0, 3000, 3000),
(31, 8, 4300, 0, 3000, 3000),
(32, 8, 4300, 0, 3000, 3000),
(33, 8, 4300, 0, 3000, 3000),
(34, 8, 4300, 0, 3000, 3000),
(35, 8, 4300, 0, 3000, 3000),
(36, 8, 4300, 0, 3000, 3000),
(37, 8, 4300, 0, 3000, 3000),
(38, 8, 4300, 0, 3000, 3000),
(39, 8, 4300, 0, 3000, 3000),
(40, 8, 4300, 0, 3000, 3000),
(41, 8, 4300, 0, 3000, 3000),
(42, 8, 4300, 0, 3000, 3000),
(43, 8, 4300, 0, 3000, 3000),
(44, 8, 4300, 0, 3000, 3000),
(45, 0, 0, 0, 0, 0),
(46, 8, 4300, 0, 3000, 3000),
(47, 8, 4300, 0, 3000, 3000),
(48, 8, 4300, 0, 3000, 3000),
(49, 8, 4300, 0, 3000, 3000),
(50, 8, 4300, 0, 3000, 3000),
(51, 8, 4300, 0, 3000, 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_BODEGA_INVENTARIO`
--

CREATE TABLE `TBL_BODEGA_INVENTARIO` (
  `Id_Inventario` int(10) NOT NULL,
  `Id_Empresa` int(10) NOT NULL,
  `Id_Proveedor` int(10) NOT NULL,
  `Nombre_Producto` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Precio` varchar(50) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_BODEGA_INVENTARIO`
--

INSERT INTO `TBL_BODEGA_INVENTARIO` (`Id_Inventario`, `Id_Empresa`, `Id_Proveedor`, `Nombre_Producto`, `Descripcion`, `Precio`, `Tipo`, `Estado`, `Fecha`, `Cantidad`) VALUES
(1, 2, 1, 'Libros', 'Para realizar partidas', '50', 'amigo', 'sin existencia', '2022-08-14', '2'),
(2, 5, 5, 'Cuadernos', 'Espiral', '405', 'Copan', 'Existencia', '2022-08-02', '1'),
(3, 2, 1, 'Libros', 'Para Realizar partidas', '50', 'amigo', 'sin existencia', '2022-08-02', '2'),
(4, 5, 5, 'cuadernos', 'Espiral', '405', 'copan', 'Existencia', '2022-08-08', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_CATALAGO_CUENTAS`
--

CREATE TABLE `TBL_CATALAGO_CUENTAS` (
  `CODIGO_CUENTA` int(11) DEFAULT NULL,
  `ID_CLIENTE` decimal(10,0) DEFAULT NULL,
  `CUENTA` varchar(40) DEFAULT NULL,
  `CLASIFICACION` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_CATALAGO_CUENTAS`
--

INSERT INTO `TBL_CATALAGO_CUENTAS` (`CODIGO_CUENTA`, `ID_CLIENTE`, `CUENTA`, `CLASIFICACION`) VALUES
(111201, NULL, 'Bancos', 'ACTIVO'),
(111101, NULL, 'Caja', 'ACTIVO'),
(112101, NULL, 'Cuentas x Cobrar', 'ACTIVO'),
(112102, NULL, 'Documentos por cobrar', 'ACTIVO'),
(113301, NULL, 'Pagos Anticipados', 'ACTIVO'),
(113101, NULL, 'Inventario', 'ACTIVO'),
(1222, NULL, 'Edificios', 'ACTIVO'),
(122401, NULL, 'Otros Activos', 'ACTIVO'),
(112402, NULL, 'Depreciacion Acumulada', 'ACTIVO'),
(222101, NULL, 'Deuda a Corto Plazo', 'PASIVO'),
(222102, NULL, 'Provisiones a Corto Plazo', 'PASIVO'),
(222103, NULL, 'Cuentas por Pagar', 'PASIVO'),
(222201, NULL, 'Proveedores', 'PASIVO'),
(222104, NULL, 'Deuda a Largo Plazo', 'PASIVO'),
(222105, NULL, 'Provisiones a Largo Plazo', 'Pasivo'),
(333301, NULL, 'Capital Social', 'PATRIMONIO'),
(333302, NULL, 'Utilidades Retenidas', 'PATRIMONIO'),
(333303, NULL, 'Reservas', 'PATRIMONIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_CATALAGO_ESTADO`
--

CREATE TABLE `TBL_CATALAGO_ESTADO` (
  `CODIGO_CUENTA` int(11) NOT NULL,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `CUENTA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_CATALAGO_ESTADO`
--

INSERT INTO `TBL_CATALAGO_ESTADO` (`CODIGO_CUENTA`, `ID_CLIENTE`, `CUENTA`) VALUES
(1, NULL, 'Venta'),
(2, NULL, 'Costo de venta'),
(5, NULL, 'Gastos de venta'),
(6, NULL, 'Gastos de administracion'),
(7, NULL, 'Gastos financieros'),
(9, NULL, 'Otros ingresos '),
(11, NULL, 'Impuesto '),
(12, NULL, 'Otros Gastos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_CLIENTES`
--

CREATE TABLE `TBL_CLIENTES` (
  `Id_Cliente` int(11) NOT NULL,
  `Nombre_Cliente` varchar(50) DEFAULT NULL,
  `RTN_Cliente` varchar(15) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Tipo_Cliente` varchar(20) DEFAULT NULL,
  `Ciudad` varchar(25) DEFAULT NULL,
  `Fecha_Dato` datetime NOT NULL DEFAULT current_timestamp(),
  `caja` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_CLIENTES`
--

INSERT INTO `TBL_CLIENTES` (`Id_Cliente`, `Nombre_Cliente`, `RTN_Cliente`, `Direccion`, `Telefono`, `Tipo_Cliente`, `Ciudad`, `Fecha_Dato`, `caja`) VALUES
(1, 'Allan caseres', '12345678910', 'carrizal', 12356789, 'activo', 'tegucigalpa', '2022-07-25 14:07:08', 0),
(4, 'Mauricio Hernandez ', '10987654321', 'centro', 335558595, 'activo', 'tegucigalpa', '2022-07-25 20:39:42', 200),
(8, 'Hernandez SA', '4566878', 'carrizal', 89574085, 'activo', 'tegucigalpa', '2022-07-26 11:03:25', 103723),
(9, 'juansito Rojas', '2147483647', 'unah', 96769885, 'activo', 'Tegucigalpa', '2022-07-27 22:04:12', 11800),
(10, 'maira bella', '2147483647', 'unah', 96769885, 'activo', 'Tegucigalpa', '2022-08-08 23:01:57', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_COMPRAS`
--

CREATE TABLE `TBL_COMPRAS` (
  `Id_Compra` int(10) NOT NULL,
  `No_Factura` int(25) NOT NULL,
  `Tipo_Compra` varchar(25) NOT NULL,
  `Tipo_Producto` varchar(35) NOT NULL,
  `Precio_unitario` int(40) NOT NULL,
  `Cantidad` int(20) NOT NULL,
  `Fecha_de_Ingreso` date NOT NULL,
  `Detalle` varchar(40) NOT NULL,
  `Total_Compra` decimal(30,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_COMPRAS`
--

INSERT INTO `TBL_COMPRAS` (`Id_Compra`, `No_Factura`, `Tipo_Compra`, `Tipo_Producto`, `Precio_unitario`, `Cantidad`, `Fecha_de_Ingreso`, `Detalle`, `Total_Compra`) VALUES
(2, 1022023, 'credito', 'insumo oficina', 300, 20, '2022-07-04', 'Impresora', '300');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_ERRORES`
--

CREATE TABLE `TBL_ERRORES` (
  `COD_ERROR` int(11) NOT NULL,
  `ERROR` varchar(250) DEFAULT NULL,
  `CODIGO` varchar(15) DEFAULT NULL,
  `MENSAJE` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_ERRORES`
--

INSERT INTO `TBL_ERRORES` (`COD_ERROR`, `ERROR`, `CODIGO`, `MENSAJE`) VALUES
(1, 'No se puede conectar a la base de datos', 'ERR-001', 'Revise las credenciales de conexion hacia la base de datos'),
(2, 'No se puede hacer la consulta a la base de datos', 'ERR-002', 'Se presento un error en la consulta hacia la tabla TBL_USUARIO'),
(3, 'Error en la consulta hacia la tabla PARAMETROS', 'ERR-003', 'Ocurrio un error en la llamada de los parametros'),
(4, 'Error en la proceso de actualizacion del estado en la tabla TBL_USUARIO', 'ERR-004', 'Revise la consulta hacía la base de datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_ESTADO`
--

CREATE TABLE `TBL_ESTADO` (
  `CODIGO_CUENTA` int(11) DEFAULT NULL,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `CUENTA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_ESTADO`
--

INSERT INTO `TBL_ESTADO` (`CODIGO_CUENTA`, `ID_CLIENTE`, `CUENTA`) VALUES
(NULL, NULL, 'Venta'),
(NULL, NULL, 'Costo de venta'),
(NULL, NULL, 'Utilidad bruta'),
(NULL, NULL, 'Gastos de operacion'),
(NULL, NULL, 'Gastos de venta'),
(NULL, NULL, 'Gastos de administracion'),
(NULL, NULL, 'Gastos financieros'),
(NULL, NULL, 'Utilidad de operacion'),
(NULL, NULL, 'Otros ingresos no operativos'),
(NULL, NULL, 'Utilidad antes de impuestos'),
(NULL, NULL, 'Impuesto a la utilidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_ESTADO_RESULTADO`
--

CREATE TABLE `TBL_ESTADO_RESULTADO` (
  `Id_Estado_R` int(10) NOT NULL,
  `Id_Cliente` int(11) NOT NULL,
  `Utilida_Bruta` int(11) NOT NULL,
  `Total_Gasto` int(11) NOT NULL,
  `Utilidad_Operacion` int(11) NOT NULL,
  `Utilidad_Antes_Impu` int(11) NOT NULL,
  `Utilidad_Neta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_ESTADO_RESULTADO`
--

INSERT INTO `TBL_ESTADO_RESULTADO` (`Id_Estado_R`, `Id_Cliente`, `Utilida_Bruta`, `Total_Gasto`, `Utilidad_Operacion`, `Utilidad_Antes_Impu`, `Utilidad_Neta`) VALUES
(24, 8, -250, 0, -250, -250, -250),
(25, 8, -250, 0, -250, -250, -250),
(26, 8, -250, 0, -250, -250, -250),
(27, 8, -250, 0, -250, -250, -250),
(28, 8, -250, 0, -250, -250, -250),
(29, 8, -250, 0, -250, -250, -250),
(30, 8, -250, 0, -250, -250, -250),
(31, 8, -250, 0, -250, -250, -250),
(32, 8, -250, 0, -250, -250, -250),
(33, 8, -250, 0, -250, -250, -250),
(34, 8, -250, 0, -250, -250, -250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_KARDEX`
--

CREATE TABLE `TBL_KARDEX` (
  `id_usuario` int(11) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `fecha` varchar(30) DEFAULT NULL,
  `detalle` varchar(15) DEFAULT NULL,
  `nproducto` varchar(30) DEFAULT NULL,
  `cant_entrada` int(11) DEFAULT NULL,
  `total_cante` decimal(10,0) DEFAULT NULL,
  `cant_salida` int(11) DEFAULT NULL,
  `total_cants` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_KARDEX`
--

INSERT INTO `TBL_KARDEX` (`id_usuario`, `usuario`, `fecha`, `detalle`, `nproducto`, `cant_entrada`, `total_cante`, `cant_salida`, `total_cants`) VALUES
(NULL, NULL, '10-08-2022', 'ENTRADA', 'IMPRESORA', 5, '17250', NULL, NULL),
(NULL, NULL, '08-10-2022 03:54:52 pm', 'SALIDA', 'IMPRESORA                     ', NULL, NULL, 2, '6900'),
(NULL, NULL, '10-08-2022', 'ENTRADA', 'TINTAS EPSON', 10, '3750', NULL, NULL),
(NULL, NULL, '10-08-2022', 'ENTRADA', 'CARPETAS', 50, '2300', NULL, NULL),
(NULL, NULL, '10-08-2022', 'ENTRADA', 'FOLDERS', 20, '575', NULL, NULL),
(NULL, NULL, '08-10-2022 07:13:03 pm', 'SALIDA', 'TINTAS EPSON                  ', NULL, NULL, 2, '750'),
(NULL, NULL, '10-08-2022', 'ENTRADA', 'lapiz', 6, '1175', NULL, NULL),
(NULL, NULL, '08-10-2022 07:22:23 pm', 'SALIDA', 'IMPRESORA                     ', NULL, NULL, 3, '10350');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_LIBROS`
--

CREATE TABLE `TBL_LIBROS` (
  `Id_Libro` int(25) NOT NULL,
  `fecha` date NOT NULL,
  `Id_cliente` int(25) NOT NULL,
  `caja` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_LIBROS`
--

INSERT INTO `TBL_LIBROS` (`Id_Libro`, `fecha`, `Id_cliente`, `caja`) VALUES
(1, '2022-08-01', 8, 500),
(2, '2022-07-01', 9, 0),
(6, '2022-07-01', 8, 0),
(7, '2022-06-01', 9, 0),
(8, '2022-06-01', 8, 0),
(9, '2022-05-01', 9, 0),
(10, '2022-09-01', 8, 14400),
(11, '2022-08-01', 4, 400),
(13, '2022-09-01', 4, 0),
(14, '2022-07-01', 4, 0),
(15, '2022-08-01', 10, 4779),
(16, '2022-08-01', 8, 1077),
(17, '2022-08-01', 8, 1077),
(18, '2022-08-01', 8, 1077),
(19, '2022-08-01', 8, 1077),
(20, '2022-08-01', 8, 1077),
(21, '2022-08-01', 8, 1077),
(22, '2022-08-01', 8, 1000),
(23, '2022-08-01', 8, 577),
(24, '2022-08-01', 0, 325),
(25, '2022-08-01', 0, 325),
(26, '2022-08-01', 0, 325),
(27, '2022-08-01', 0, 325),
(28, '2022-08-01', 8, 1000),
(29, '2022-08-01', 8, 800),
(30, '2022-08-01', 8, 800),
(31, '2022-08-01', 8, 800),
(32, '2022-08-01', 8, 800),
(33, '2022-08-01', 8, 800),
(34, '2022-08-01', 8, 800),
(35, '2022-08-01', 8, 1100),
(36, '2022-08-01', 8, 1100),
(37, '2022-08-01', 8, 600),
(38, '2022-08-01', 8, 400),
(39, '2022-08-01', 8, 1400),
(40, '2022-08-01', 8, 1400),
(41, '2022-08-01', 8, 1400),
(42, '2022-08-01', 8, 1400),
(43, '2022-08-01', 8, 2400),
(44, '2022-08-01', 8, 4400),
(45, '2022-08-01', 8, 4400),
(46, '2022-08-01', 8, 4900),
(47, '2022-08-01', 8, 4900),
(48, '2022-08-01', 8, 5000),
(49, '2022-08-01', 8, 5000),
(50, '2022-08-01', 8, 5000),
(51, '2022-08-01', 8, 5000),
(52, '2022-08-01', 8, 5200),
(53, '2022-08-01', 8, 5200),
(54, '2022-08-01', 8, 5400),
(55, '2022-08-01', 8, 0),
(56, '2022-08-01', 8, 200),
(57, '2022-08-01', 8, 1200),
(58, '2022-08-01', 8, 1700),
(59, '2022-08-01', 8, 2000),
(60, '2022-08-01', 8, 4000),
(61, '2022-08-01', 8, 4100),
(62, '2022-08-01', 8, 3600),
(63, '2022-08-01', 8, 4100),
(64, '2022-08-01', 8, 4100),
(65, '2022-08-01', 8, 4100),
(66, '2022-08-01', 8, 4100),
(67, '2022-08-01', 8, 4100),
(68, '2022-10-01', 8, 0),
(69, '2022-10-01', 8, 0),
(70, '2022-10-01', 8, 0),
(71, '2022-10-01', 8, 0),
(72, '2022-07-01', 1, 0),
(73, '2022-07-01', 1, 0),
(74, '2022-07-01', 1, 0),
(75, '2022-08-01', 8, 6100),
(76, '2022-08-01', 8, 6100),
(77, '2022-08-01', 8, 6100),
(78, '2022-08-01', 8, 5100),
(79, '2022-08-01', 8, 5100),
(80, '2022-08-01', 8, 4100),
(81, '2022-08-01', 8, 7100),
(82, '2022-08-01', 1, 1000),
(83, '2022-08-01', 1, 2000),
(84, '2022-08-01', 9, 0),
(85, '2022-08-01', 9, 500),
(86, '2022-08-01', 8, 7100),
(87, '2022-09-01', 1, 0),
(88, '2022-09-01', 1, 0),
(89, '2022-09-01', 1, 0),
(90, '2022-09-01', 8, 0),
(91, '2022-09-01', 8, 0),
(92, '2022-08-01', 8, 7300),
(93, '2022-08-01', 8, 8300),
(94, '2022-09-01', 1, 2000),
(95, '2022-09-01', 1, 2000),
(96, '2022-11-01', 4, 0),
(97, '2022-11-01', 4, 1000),
(98, '2022-10-01', 9, 0),
(99, '2022-10-01', 9, 500),
(100, '2022-09-01', 8, 1000),
(101, '2022-08-01', 8, 8300),
(102, '2022-09-01', 4, 0),
(103, '2022-09-01', 4, 500),
(104, '2022-08-01', 8, 7300),
(105, '2022-08-01', 8, 7300),
(106, '2022-08-01', 8, 7300),
(107, '2022-08-01', 8, 7300),
(108, '2022-08-01', 8, 7300),
(109, '2022-08-01', 9, 500),
(110, '2022-08-01', 9, 750),
(111, '2022-08-01', 8, 7300),
(112, '2022-08-01', 8, 7300),
(113, '2022-08-01', 8, 7300),
(114, '2022-08-01', 8, 7300),
(115, '2022-08-01', 8, 7300),
(116, '2022-08-01', 8, 7300),
(117, '2022-08-01', 8, 7300),
(118, '2022-08-01', 8, 7300),
(119, '2022-08-01', 8, 7300),
(120, '2022-08-01', 8, 7300),
(121, '2022-08-01', 8, 7300),
(122, '2022-08-01', 8, 7300),
(123, '2022-08-01', 8, 0),
(124, '2022-08-01', 8, 7800),
(125, '2022-08-01', 8, 0),
(126, '2022-08-01', 8, 0),
(127, '2022-08-01', 8, 0),
(128, '2022-08-01', 8, 0),
(129, '2022-08-01', 8, 0),
(130, '2022-08-01', 8, 0),
(131, '2022-08-01', 8, 0),
(132, '2022-08-01', 8, 0),
(133, '2022-08-01', 8, 0),
(134, '2022-08-01', 8, 0),
(135, '2022-08-01', 8, 0),
(136, '2022-08-01', 8, 0),
(137, '2022-08-01', 8, 0),
(138, '2022-08-01', 8, 0),
(139, '2022-08-01', 8, 750),
(140, '2022-08-01', 8, 750),
(141, '2022-08-01', 8, 750),
(142, '2022-08-01', 8, 750),
(143, '2022-08-01', 8, 750),
(144, '2022-08-11', 8, 750),
(145, '2022-08-01', 8, 7800),
(146, '2022-08-10', 8, 750),
(147, '2022-08-10', 8, 750),
(148, '2022-08-10', 8, 750),
(149, '2022-08-10', 8, 3600),
(150, '2022-08-01', 8, 750),
(151, '2022-08-01', 8, 7800),
(152, '2022-08-01', 8, 750),
(153, '2022-08-01', 8, 7800),
(154, '2022-08-01', 8, 7800),
(155, '2022-08-01', 8, 750),
(156, '2022-08-01', 8, 750),
(157, '2022-08-01', 8, 750),
(158, '2022-08-01', 8, 7800),
(159, '2022-08-01', 8, 7800),
(160, '2022-08-01', 8, 7800),
(161, '2022-08-01', 8, 7800),
(162, '2022-08-01', 8, 7800),
(163, '2022-08-01', 8, 7800),
(164, '2022-08-01', 8, 7800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_LIBROS2`
--

CREATE TABLE `TBL_LIBROS2` (
  `Id_Libro` int(25) NOT NULL,
  `fecha` date NOT NULL,
  `Id_cliente` int(25) NOT NULL,
  `caja` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_LIBRO_MAYOR`
--

CREATE TABLE `TBL_LIBRO_MAYOR` (
  `ID_LIBRO_MAYOR` int(11) NOT NULL,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `TEMPORADA` int(11) DEFAULT NULL,
  `CUENTA` varchar(30) DEFAULT NULL,
  `TOTAL_CUENTA` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_LIBRO_MAYOR`
--

INSERT INTO `TBL_LIBRO_MAYOR` (`ID_LIBRO_MAYOR`, `ID_CLIENTE`, `FECHA`, `TEMPORADA`, `CUENTA`, `TOTAL_CUENTA`) VALUES
(634, 8, NULL, 10, 'Caja', '100'),
(635, 8, NULL, 10, 'Otros Activos', '77'),
(636, 8, NULL, 10, 'Proveedores', '123'),
(637, 8, NULL, 10, 'Caja', '100'),
(638, 8, NULL, 10, 'Otros Activos', '77'),
(639, 8, NULL, 10, 'Proveedores', '123'),
(640, 8, NULL, 10, 'Caja', '100'),
(641, 8, NULL, 10, 'Otros Activos', '77'),
(642, 8, NULL, 10, 'Proveedores', '123'),
(643, 8, NULL, 10, 'Caja', '100'),
(644, 8, NULL, 10, 'Pagos Anticipados', '2000'),
(645, 8, NULL, 10, 'Inventario', '1000'),
(646, 8, NULL, 10, 'Otros Activos', '77'),
(647, 8, NULL, 10, 'Proveedores', '123'),
(648, 8, NULL, 10, 'Caja', '100'),
(649, 8, NULL, 10, 'Pagos Anticipados', '2000'),
(650, 8, NULL, 10, 'Inventario', '1000'),
(651, 8, NULL, 10, 'Otros Activos', '77'),
(652, 8, NULL, 10, 'Proveedores', '123'),
(653, 8, NULL, 10, 'Caja', '200'),
(654, 8, NULL, 10, 'Pagos Anticipados', '2000'),
(655, 8, NULL, 10, 'Inventario', '1000'),
(656, 8, NULL, 10, 'Otros Activos', '77'),
(657, 8, NULL, 10, 'Proveedores', '123'),
(658, 8, NULL, 10, 'Caja', '200'),
(659, 8, NULL, 10, 'Pagos Anticipados', '2000'),
(660, 8, NULL, 10, 'Inventario', '1000'),
(661, 8, NULL, 10, 'Otros Activos', '77'),
(662, 8, NULL, 10, 'Proveedores', '123'),
(663, 8, NULL, 10, 'Caja', '200'),
(664, 8, NULL, 10, 'Pagos Anticipados', '2000'),
(665, 8, NULL, 10, 'Inventario', '1000'),
(666, 8, NULL, 10, 'Otros Activos', '77'),
(667, 8, NULL, 10, 'Proveedores', '123'),
(668, 8, NULL, 10, 'Caja', '200'),
(669, 8, NULL, 10, 'Pagos Anticipados', '2000'),
(670, 8, NULL, 10, 'Inventario', '1000'),
(671, 8, NULL, 10, 'Otros Activos', '77'),
(672, 8, NULL, 10, 'Proveedores', '123'),
(673, 8, NULL, 10, 'Caja', '500'),
(674, 8, NULL, 10, 'Documentos por cobrar', '2300'),
(675, 8, NULL, 10, 'Pagos Anticipados', '100'),
(676, 8, NULL, 10, 'Caja', '500'),
(677, 8, NULL, 10, 'Documentos por cobrar', '2300'),
(678, 8, NULL, 10, 'Pagos Anticipados', '100'),
(679, 8, NULL, 10, 'Caja', '500'),
(680, 8, NULL, 10, 'Documentos por cobrar', '2300'),
(681, 8, NULL, 10, 'Pagos Anticipados', '100'),
(682, 8, NULL, 10, 'Caja', '500'),
(683, 8, NULL, 10, 'Documentos por cobrar', '2300'),
(684, 8, NULL, 10, 'Pagos Anticipados', '100'),
(685, 8, NULL, 10, 'Caja', '500'),
(686, 8, NULL, 10, 'Documentos por cobrar', '2300'),
(687, 8, NULL, 10, 'Pagos Anticipados', '100'),
(688, 8, NULL, 10, 'Caja', '500'),
(689, 8, NULL, 10, 'Documentos por cobrar', '2300'),
(690, 8, NULL, 10, 'Pagos Anticipados', '100'),
(691, 8, '2022-08-01', NULL, 'Caja', '500'),
(692, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(693, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(694, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(695, 8, '2022-08-01', NULL, 'Edificios', '500'),
(696, 8, '2022-08-01', NULL, 'Caja', '500'),
(697, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(698, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(699, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(700, 8, '2022-08-01', NULL, 'Edificios', '500'),
(701, 8, '2022-08-01', NULL, 'Caja', '500'),
(702, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(703, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(704, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(705, 8, '2022-08-01', NULL, 'Edificios', '500'),
(706, 8, '2022-08-01', NULL, 'Bancos', '2200'),
(707, 8, '2022-08-01', NULL, 'Caja', '500'),
(708, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(709, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(710, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(711, 8, '2022-08-01', NULL, 'Edificios', '500'),
(712, 8, '2022-08-01', NULL, 'Bancos', '1200'),
(713, 8, '2022-08-01', NULL, 'Caja', '500'),
(714, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(715, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(716, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(717, 8, '2022-08-01', NULL, 'Edificios', '500'),
(718, 8, '2022-08-01', NULL, 'Bancos', '1200'),
(719, 8, '2022-08-01', NULL, 'Caja', '500'),
(720, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(721, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(722, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(723, 8, '2022-08-01', NULL, 'Edificios', '500'),
(724, 8, '2022-08-01', NULL, 'Bancos', '1200'),
(725, 8, '2022-08-01', NULL, 'Caja', '500'),
(726, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(727, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(728, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(729, 8, '2022-08-01', NULL, 'Edificios', '500'),
(730, 8, '2022-08-01', NULL, 'Bancos', '1200'),
(731, 8, '2022-08-01', NULL, 'Caja', '500'),
(732, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(733, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(734, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(735, 8, '2022-08-01', NULL, 'Edificios', '500'),
(736, 8, '2022-08-01', NULL, 'Bancos', '1200'),
(737, 8, '2022-08-01', NULL, 'Caja', '500'),
(738, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(739, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(740, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(741, 8, '2022-08-01', NULL, 'Edificios', '500'),
(742, 8, '2022-08-01', NULL, 'Bancos', '1200'),
(743, 8, '2022-08-01', NULL, 'Caja', '500'),
(744, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(745, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(746, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(747, 8, '2022-08-01', NULL, 'Edificios', '500'),
(748, 8, '2022-08-01', NULL, 'Bancos', '1200'),
(749, 8, '2022-08-01', NULL, 'Caja', '500'),
(750, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(751, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(752, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(753, 8, '2022-08-01', NULL, 'Edificios', '500'),
(754, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(755, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(756, 8, '2022-08-01', NULL, 'Bancos', '1200'),
(757, 8, '2022-08-01', NULL, 'Caja', '500'),
(758, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(759, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(760, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(761, 8, '2022-08-01', NULL, 'Edificios', '500'),
(762, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '-1000'),
(763, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(764, 8, '2022-08-01', NULL, 'Bancos', '1200'),
(765, 8, '2022-08-01', NULL, 'Caja', '500'),
(766, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(767, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(768, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(769, 8, '2022-08-01', NULL, 'Edificios', '500'),
(770, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '-1000'),
(771, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(772, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(773, 8, '2022-08-01', NULL, 'Caja', '500'),
(774, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(775, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(776, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(777, 8, '2022-08-01', NULL, 'Edificios', '500'),
(778, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '-1000'),
(779, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(780, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(781, 8, '2022-08-01', NULL, 'Caja', '500'),
(782, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(783, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(784, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(785, 8, '2022-08-01', NULL, 'Edificios', '500'),
(786, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '0'),
(787, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(788, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(789, 8, '2022-08-01', NULL, 'Caja', '500'),
(790, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(791, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(792, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(793, 8, '2022-08-01', NULL, 'Edificios', '500'),
(794, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '-1000'),
(795, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(796, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(797, 8, '2022-08-01', NULL, 'Caja', '500'),
(798, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(799, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(800, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(801, 8, '2022-08-01', NULL, 'Edificios', '500'),
(802, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '-1000'),
(803, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(804, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(805, 8, '2022-08-01', NULL, 'Caja', '500'),
(806, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(807, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(808, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(809, 8, '2022-08-01', NULL, 'Edificios', '500'),
(810, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(811, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(812, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(813, 8, '2022-08-01', NULL, 'Caja', '500'),
(814, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(815, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(816, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(817, 8, '2022-08-01', NULL, 'Edificios', '500'),
(818, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(819, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(820, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(821, 8, '2022-08-01', NULL, 'Caja', '500'),
(822, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(823, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(824, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(825, 8, '2022-08-01', NULL, 'Edificios', '500'),
(826, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(827, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(828, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(829, 8, '2022-08-01', NULL, 'Caja', '500'),
(830, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(831, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(832, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(833, 8, '2022-08-01', NULL, 'Edificios', '500'),
(834, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(835, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(836, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(837, 8, '2022-08-01', NULL, 'Caja', '500'),
(838, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(839, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(840, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(841, 8, '2022-08-01', NULL, 'Edificios', '500'),
(842, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(843, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(844, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(845, 8, '2022-08-01', NULL, 'Caja', '500'),
(846, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(847, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(848, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(849, 8, '2022-08-01', NULL, 'Edificios', '500'),
(850, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(851, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(852, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(853, 8, '2022-08-01', NULL, 'Caja', '500'),
(854, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(855, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(856, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(857, 8, '2022-08-01', NULL, 'Edificios', '500'),
(858, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(859, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(860, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(861, 8, '2022-08-01', NULL, 'Caja', '500'),
(862, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(863, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(864, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(865, 8, '2022-08-01', NULL, 'Edificios', '500'),
(866, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(867, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(868, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(869, 8, '2022-08-01', NULL, 'Caja', '500'),
(870, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(871, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(872, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(873, 8, '2022-08-01', NULL, 'Edificios', '500'),
(874, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(875, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(876, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(877, 8, '2022-08-01', NULL, 'Caja', '500'),
(878, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(879, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(880, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(881, 8, '2022-08-01', NULL, 'Edificios', '500'),
(882, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(883, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(884, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(885, 8, '2022-08-01', NULL, 'Caja', '500'),
(886, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(887, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(888, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(889, 8, '2022-08-01', NULL, 'Edificios', '500'),
(890, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(891, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(892, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(893, 8, '2022-08-01', NULL, 'Caja', '500'),
(894, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(895, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(896, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(897, 8, '2022-08-01', NULL, 'Edificios', '500'),
(898, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(899, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(900, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(901, 8, '2022-08-01', NULL, 'Caja', '500'),
(902, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(903, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(904, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(905, 8, '2022-08-01', NULL, 'Edificios', '500'),
(906, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(907, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(908, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(909, 8, '2022-08-01', NULL, 'Caja', '500'),
(910, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(911, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(912, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(913, 8, '2022-08-01', NULL, 'Edificios', '500'),
(914, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(915, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(916, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(917, 8, '2022-08-01', NULL, 'Caja', '500'),
(918, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(919, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(920, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(921, 8, '2022-08-01', NULL, 'Edificios', '500'),
(922, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(923, 8, '2022-08-01', NULL, 'Capital Social', '3000'),
(924, 8, '2022-08-01', NULL, 'Bancos', '1400'),
(925, 8, '2022-08-01', NULL, 'Caja', '500'),
(926, 8, '2022-08-01', NULL, 'Cuentas x Cobrar', '500'),
(927, 8, '2022-08-01', NULL, 'Documentos por cobrar', '2300'),
(928, 8, '2022-08-01', NULL, 'Pagos Anticipados', '100'),
(929, 8, '2022-08-01', NULL, 'Edificios', '500'),
(930, 8, '2022-08-01', NULL, 'Depreciacion Acumulada', '1000'),
(931, 8, '2022-08-01', NULL, 'Capital Social', '3000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_MS_BITACORA`
--

CREATE TABLE `TBL_MS_BITACORA` (
  `Id_Bitacora` int(11) NOT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Accion` varchar(2000) DEFAULT NULL,
  `Descripcion` varchar(2000) DEFAULT NULL,
  `Id_Usuario` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_MS_BITACORA`
--

INSERT INTO `TBL_MS_BITACORA` (`Id_Bitacora`, `Fecha`, `Accion`, `Descripcion`, `Id_Usuario`) VALUES
(1, '2022-08-10 01:39:04', 'INSERT', '(72, \"paquito\", \"Master\", \"ACTIVO\",\"123\", \"1\", \"2022-07-27 22:27:00.000000\", \"1\", \"SI\", \"2022-06-21 00:00:00.000000\", luizzjm9@gmail.com);', 'ADMIN'),
(2, '2022-08-10 01:42:48', 'UPDATE', '(72,\"paquito\",\"MasterXD\", \"ACTIVO\",\"123\",\"1\", \"2022-07-27 22:27:00.000000\", \"1\",\"SI\", \"2022-06-21 00:00:00.000000\", \"luizzjm9@gmail.com 72;', 'ADMIN'),
(3, '2022-08-10 01:42:54', 'DELETE', 'SE HA BORRADO EL USUARIO =paquito;', 'ADMIN'),
(4, '2022-08-10 03:37:35', 'DELETE', 'SE HA BORRADO EL USUARIO =MARYS;', 'ADMIN'),
(5, '2022-08-10 03:37:42', 'DELETE', 'SE HA BORRADO EL USUARIO =ALEJANDRO;', 'ADMIN'),
(6, '2022-08-10 03:37:52', 'DELETE', 'SE HA BORRADO EL USUARIO =ANKLLIES;', 'ADMIN'),
(7, '2022-08-10 03:37:58', 'DELETE', 'SE HA BORRADO EL USUARIO =ANDRESUS;', 'ADMIN'),
(8, '2022-08-10 03:38:12', 'DELETE', 'SE HA BORRADO EL USUARIO =QWE;', 'ADMIN'),
(9, '2022-08-10 03:38:12', 'DELETE', 'SE HA BORRADO EL USUARIO =KEVIN;', 'ADMIN'),
(10, '2022-08-10 03:38:12', 'DELETE', 'SE HA BORRADO EL USUARIO =KEVINZ;', 'ADMIN'),
(11, '2022-08-10 03:38:46', 'DELETE', 'SE HA BORRADO EL USUARIO =ASASASQQQ;', 'ADMIN'),
(12, '2022-08-10 03:38:46', 'DELETE', 'SE HA BORRADO EL USUARIO =LUCASSS;', 'ADMIN'),
(13, '2022-08-10 03:38:46', 'DELETE', 'SE HA BORRADO EL USUARIO =FRIJOL;', 'ADMIN'),
(14, '2022-08-10 03:38:46', 'DELETE', 'SE HA BORRADO EL USUARIO =MAIZ;', 'ADMIN'),
(15, '2022-08-10 03:43:47', 'UPDATE', '(4,\"JOSE_MARTINEZ\",\"JOSE LUIS MARTINEZ\", \"ACTIVO\",\"QWERTY123456\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"isaiasfp19@gmail.com 4;', 'ADMIN'),
(16, '2022-08-10 03:43:47', 'UPDATE', '(10,\"ALLAN_HERNANDEZ\",\"ALLAN FRANCISCO HERNANDEZ\", \"ACTIVO\",\"123456QWEERT\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"allan45@gmail.com 10;', 'ADMIN'),
(17, '2022-08-10 03:43:47', 'UPDATE', '(49,\"MARIO_BROS\",\"MARIO LUIGUI BROS\", \"ACTIVO\",\"QWEasd123\",\"4\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 49;', 'ADMIN'),
(18, '2022-08-10 03:43:47', 'UPDATE', '(51,\"ADMIN\",\"ADMINISTRADOR\", \"ACTIVO\",\"ADMIN\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 51;', 'ADMIN'),
(19, '2022-08-10 03:43:47', 'UPDATE', '(62,\"JENNY_BARAHONA\",\"JENNY MARIELA BARAHONA\", \"INACTIVO\",\"123poiJHG\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 62;', 'ADMIN'),
(20, '2022-08-10 03:43:47', 'UPDATE', '(63,\"CARLOS_AGUILAR\",\"CARLOS JUAQUIN AGUILAR\", \"INACTIVO\",\"123qwe!#QWEz2z\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 63;', 'ADMIN'),
(21, '2022-08-10 03:43:47', 'UPDATE', '(67,\"MARIANA_IZAGUIR\",\"MARI ANA DOLORES IZAGUIRRE\", \"ACTIVO\",\"QWE123@qweXC\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 67;', 'ADMIN'),
(22, '2022-08-10 03:43:47', 'UPDATE', '(68,\"PABLO_MONCADA\",\"PABLO JIMENO MONCADA\", \"INACTIVO\",\"QWE123@qwe\",\"4\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"patricia@gmail.com 68;', 'ADMIN'),
(23, '2022-08-10 03:44:00', 'UPDATE', '(1,\"ADMIN\",\"ADMINISTRADOR\", \"ACTIVO\",\"ADMIN\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 51;', 'ADMIN'),
(24, '2022-08-10 03:47:10', 'UPDATE', '(1,\"ADMIN\",\"ADMINISTRADOR\", \"ACTIVO\",\"ADMIN\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"admin@gmail.com 1;', 'ADMIN'),
(25, '2022-08-10 03:47:10', 'UPDATE', '(4,\"JOSE_MARTINEZ\",\"JOSE LUIS MARTINEZ\", \"ACTIVO\",\"QWERTY123456\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 4;', 'ADMIN'),
(26, '2022-08-10 03:47:10', 'UPDATE', '(49,\"MARIO_BROS\",\"MARIO LUIGUI BROS\", \"ACTIVO\",\"QWEasd123\",\"4\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"marioluigui@gmail.com 49;', 'ADMIN'),
(27, '2022-08-10 03:47:10', 'UPDATE', '(62,\"JENNY_BARAHONA\",\"JENNY MARIELA BARAHONA\", \"INACTIVO\",\"123poiJHG\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"jenny87@gmail.com 62;', 'ADMIN'),
(28, '2022-08-10 03:47:10', 'UPDATE', '(63,\"CARLOS_AGUILAR\",\"CARLOS JUAQUIN AGUILAR\", \"INACTIVO\",\"123qwe!#QWEz2z\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"carlosx10@gmail.com 63;', 'ADMIN'),
(29, '2022-08-10 03:47:10', 'UPDATE', '(67,\"MARIANA_IZAGUIR\",\"MARI ANA DOLORES IZAGUIRRE\", \"ACTIVO\",\"QWE123@qweXC\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"Maryiza3@gmail.com 67;', 'ADMIN'),
(30, '2022-08-10 03:47:10', 'UPDATE', '(68,\"PABLO_MONCADA\",\"PABLO JIMENO MONCADA\", \"INACTIVO\",\"QWE123@qwe\",\"4\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"pablo@gmail.com 68;', 'ADMIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_OBJETOS`
--

CREATE TABLE `TBL_OBJETOS` (
  `Id_Objetos` int(11) NOT NULL COMMENT 'número secuencial que identifica de manera unica a un objeto',
  `Objetos` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'campo que registra el nombre de un objeto',
  `Descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Campo que registra el nombre de un cargo',
  `Tipo_Objeto` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'campo que registra un tipo de objeto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_PARAMETROS`
--

CREATE TABLE `TBL_PARAMETROS` (
  `Id_Parametro` int(11) NOT NULL,
  `Parametro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Valor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Id_Usuario` int(11) DEFAULT NULL,
  `Fecha_Creacion` date DEFAULT NULL,
  `Fecha_Modificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `TBL_PARAMETROS`
--

INSERT INTO `TBL_PARAMETROS` (`Id_Parametro`, `Parametro`, `Valor`, `Id_Usuario`, `Fecha_Creacion`, `Fecha_Modificacion`) VALUES
(1, 'Bloquearusuario', '4', 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_PREGUNTAS`
--

CREATE TABLE `TBL_PREGUNTAS` (
  `Id_Preguntas` int(11) NOT NULL,
  `Preguntas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_PREGUNTAS`
--

INSERT INTO `TBL_PREGUNTAS` (`Id_Preguntas`, `Preguntas`) VALUES
(1, '¿CUAL ES EL NOMBRE DE TU PRIMER MASCOTA?'),
(2, '¿CUAL ES EL NOMBRE DE TU MEJOR AMIGO?'),
(3, '¿CUAL ES TU COLOR FAVORITO?'),
(4, '¿CUAL ES TU COMIDA FAVORITA?'),
(5, '¿CUAL BANDA FAVORITA?'),
(6, '¿CUAL ES EL NOMBRE DE TU HERMANO FAVORIT'),
(7, '¿CUAL ES TU MATUMATERIA FAVORITA?'),
(8, '¿CUAL SERIA TU TRABAJO PERFECTO?'),
(9, '¿CUAL ES TU ANIMAL FAVORITO?'),
(10, '¿CUAL ES TU LUGAR FAVORITO?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_PREGUNTAS_X_USUARIO`
--

CREATE TABLE `TBL_PREGUNTAS_X_USUARIO` (
  `Id_Preguntas` int(11) NOT NULL,
  `Id_Usuario` int(11) DEFAULT NULL,
  `Preguntas` varchar(40) NOT NULL,
  `Respuestas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBL_PREGUNTAS_X_USUARIO`
--

INSERT INTO `TBL_PREGUNTAS_X_USUARIO` (`Id_Preguntas`, `Id_Usuario`, `Preguntas`, `Respuestas`) VALUES
(3, 62, '¿CUAL BANDA FAVORITA?', 'arroz'),
(4, 63, '¿CUAL ES TU ANIMAL FAVORITO?', 'gatito'),
(5, 67, '¿CUAL ES TU ANIMAL FAVORITO?', 'perrito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_ROLES`
--

CREATE TABLE `TBL_ROLES` (
  `Id_Rol` int(11) NOT NULL,
  `Rol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `TBL_ROLES`
--

INSERT INTO `TBL_ROLES` (`Id_Rol`, `Rol`, `Descripcion`) VALUES
(1, 'ADMINISTRADOR', 'USUARIO ADMINISTRADOR'),
(2, 'SECRETARIO', 'USUARIO SECRETARIO'),
(3, 'SEGURIDAD', 'USUARIO SEGURIDAD'),
(4, 'NUEVO', 'USUARIO NUEVO'),
(7, 'INFORMATICA', 'INFORMATICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_ROLES_OBJETOS`
--

CREATE TABLE `TBL_ROLES_OBJETOS` (
  `Id_Rol` int(11) NOT NULL,
  `Id_Objetos` int(11) NOT NULL,
  `Permiso_Edicion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Permiso_Eliminacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Permiso_Actualizacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Creado_Por` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Modificado_Por` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Modificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_USUARIO`
--

CREATE TABLE `TBL_USUARIO` (
  `Id_Usuario` int(10) NOT NULL,
  `Usuario` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nombre_Usuario` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Estado_Usuario` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Contraseña` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Rol` int(10) NOT NULL,
  `Fecha_Ultimo_Conexion` datetime(6) DEFAULT NULL,
  `Preguntas_Contestadas` int(10) DEFAULT NULL,
  `Primer_Ingreso` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fecha_Vencimiento` datetime(6) DEFAULT NULL,
  `Correo_Electronico` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caja` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `TBL_USUARIO`
--

INSERT INTO `TBL_USUARIO` (`Id_Usuario`, `Usuario`, `Nombre_Usuario`, `Estado_Usuario`, `Contraseña`, `Rol`, `Fecha_Ultimo_Conexion`, `Preguntas_Contestadas`, `Primer_Ingreso`, `Fecha_Vencimiento`, `Correo_Electronico`, `caja`) VALUES
(1, 'ADMIN', 'ADMINISTRADOR', 'ACTIVO', 'ADMIN', 1, '0000-00-00 00:00:00.000000', 0, '', '0000-00-00 00:00:00.000000', 'admin@gmail.com', 106433),
(4, 'JOSE_MARTINEZ', 'JOSE LUIS MARTINEZ', 'ACTIVO', 'QWERTY123456', 1, '0000-00-00 00:00:00.000000', 0, '', '0000-00-00 00:00:00.000000', 'luizzjm9@gmail.com', 222),
(10, 'ALLAN_HERNANDEZ', 'ALLAN FRANCISCO HERNANDEZ', 'ACTIVO', '123456QWEERT', 1, '0000-00-00 00:00:00.000000', 0, '', '0000-00-00 00:00:00.000000', 'allan45@gmail.com', 0),
(49, 'MARIO_BROS', 'MARIO LUIGUI BROS', 'ACTIVO', 'QWEasd123', 4, '0000-00-00 00:00:00.000000', 0, '', '0000-00-00 00:00:00.000000', 'marioluigui@gmail.com', 0),
(62, 'JENNY_BARAHONA', 'JENNY MARIELA BARAHONA', 'INACTIVO', '123poiJHG', 2, '0000-00-00 00:00:00.000000', 0, '', '0000-00-00 00:00:00.000000', 'jenny87@gmail.com', 0),
(63, 'CARLOS_AGUILAR', 'CARLOS JUAQUIN AGUILAR', 'INACTIVO', '123qwe!#QWEz2z', 2, '0000-00-00 00:00:00.000000', 0, '', '0000-00-00 00:00:00.000000', 'carlosx10@gmail.com', 0),
(67, 'MARIANA_IZAGUIR', 'MARI ANA DOLORES IZAGUIRRE', 'ACTIVO', 'QWE123@qweXC', 2, '0000-00-00 00:00:00.000000', 0, '', '0000-00-00 00:00:00.000000', 'Maryiza3@gmail.com', 0),
(68, 'PABLO_MONCADA', 'PABLO JIMENO MONCADA', 'INACTIVO', 'QWE123@qwe', 4, '0000-00-00 00:00:00.000000', 0, '', '0000-00-00 00:00:00.000000', 'pablo@gmail.com', 0);

--
-- Disparadores `TBL_USUARIO`
--
DELIMITER $$
CREATE TRIGGER `after_delete_tbl_usuario` AFTER DELETE ON `TBL_USUARIO` FOR EACH ROW BEGIN
 insert into tbl_ms_bitacora ( Fecha, Accion, Descripcion, Id_Usuario)
	values(
    now(),
	CONCAT("DELETE"),
    CONCAT("SE HA BORRADO EL USUARIO =",OLD.Usuario,";"),
    CONCAT("ADMIN")
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_tbl_usuario` AFTER INSERT ON `TBL_USUARIO` FOR EACH ROW BEGIN
 insert into tbl_ms_bitacora ( Fecha, Accion, Descripcion, Id_Usuario)
	values(
    now(),
	CONCAT("INSERT"),
    CONCAT("(",NEW.Id_Usuario,", """,NEW.Usuario,""", """,NEW.Nombre_Usuario,""", """,NEW.Estado_Usuario,""",""",NEW.Contraseña,""", """,NEW.Rol,""", """,NEW.Fecha_Ultimo_Conexion,""", """,NEW.Preguntas_Contestadas,""", """,NEW.Primer_Ingreso,""", """,NEW.Fecha_Vencimiento,""", ",NEW.Correo_Electronico,");"),
	CONCAT("ADMIN")
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_tbl_usuario` AFTER UPDATE ON `TBL_USUARIO` FOR EACH ROW BEGIN
 insert into tbl_ms_bitacora( Fecha, Accion, Descripcion, Id_Usuario)
	values(
    now(),
	CONCAT("UPDATE"),
    CONCAT("(",NEW.Id_Usuario,",""",NEW.Usuario,""",""",NEW.Nombre_Usuario,""", """,NEW.Estado_Usuario,""",""",NEW.Contraseña,""",""",NEW.Rol,""", """,NEW.Fecha_Ultimo_Conexion,""", """,NEW.Preguntas_Contestadas,""",""",NEW.Primer_Ingreso,""", """,NEW.Fecha_Vencimiento,""", """,NEW.Correo_Electronico," ", OLD.Id_Usuario,";"),
	CONCAT("ADMIN")
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`) VALUES
(20, 'configuroweb', '4b67deeb9aba04a5b54632ad19934f26', 'Mauricio Sevilla Britto'),
(21, 'Luis', '7187f8a707b74d0aceeff15769393052', 'Luis Steven Vasquez Perez'),
(22, 'Steven', '5d41402abc4b2a76b9719d911017c592', 'steven vasquez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `caja` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `imagen`, `tipo`, `nombre`, `apellido`, `telefono`, `correo`, `caja`) VALUES
(5, 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', '', 'administrador', 'sf', 'fdf', '54345', 'tusolutionweb@gmail.com', 325),
(6, 'siba', 'a1Bz20ydqelm8m1wqlc3fb6589eda475c8887beffb013fbf0b', '', 'administrador', 'siba', 'siba', '2342423', 'siba@gmail.com', 123),
(7, 'federico', 'a1Bz20ydqelm8m1wql616706c4d6f7bdf68b30893f860cbb2b', '', 'administrador', 'federico', 'federico', 'federico', 'federico@gmail.com', 0),
(8, 'worrent', 'a1Bz20ydqelm8m1wql1574612a64e746d204acae6e51b7d695', '', 'empleado', 'worrent', 'yafe', '3253453453', 'worrent@gmail.com', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CUENTAS_POR_COBRAR`
--
ALTER TABLE `CUENTAS_POR_COBRAR`
  ADD PRIMARY KEY (`Id_cuenta`);

--
-- Indices de la tabla `CUENTAS_POR_PAGAR`
--
ALTER TABLE `CUENTAS_POR_PAGAR`
  ADD PRIMARY KEY (`Id_Cuenta`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `FACTURA`
--
ALTER TABLE `FACTURA`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `libro2`
--
ALTER TABLE `libro2`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `TBL_BALANCE`
--
ALTER TABLE `TBL_BALANCE`
  ADD PRIMARY KEY (`Id_Balance`);

--
-- Indices de la tabla `TBL_BODEGA_INVENTARIO`
--
ALTER TABLE `TBL_BODEGA_INVENTARIO`
  ADD PRIMARY KEY (`Id_Inventario`);

--
-- Indices de la tabla `TBL_CATALAGO_ESTADO`
--
ALTER TABLE `TBL_CATALAGO_ESTADO`
  ADD PRIMARY KEY (`CODIGO_CUENTA`);

--
-- Indices de la tabla `TBL_CLIENTES`
--
ALTER TABLE `TBL_CLIENTES`
  ADD PRIMARY KEY (`Id_Cliente`);

--
-- Indices de la tabla `TBL_COMPRAS`
--
ALTER TABLE `TBL_COMPRAS`
  ADD PRIMARY KEY (`Id_Compra`);

--
-- Indices de la tabla `TBL_ESTADO_RESULTADO`
--
ALTER TABLE `TBL_ESTADO_RESULTADO`
  ADD PRIMARY KEY (`Id_Estado_R`);

--
-- Indices de la tabla `TBL_LIBROS`
--
ALTER TABLE `TBL_LIBROS`
  ADD PRIMARY KEY (`Id_Libro`);

--
-- Indices de la tabla `TBL_LIBROS2`
--
ALTER TABLE `TBL_LIBROS2`
  ADD PRIMARY KEY (`Id_Libro`);

--
-- Indices de la tabla `TBL_LIBRO_MAYOR`
--
ALTER TABLE `TBL_LIBRO_MAYOR`
  ADD PRIMARY KEY (`ID_LIBRO_MAYOR`);

--
-- Indices de la tabla `TBL_MS_BITACORA`
--
ALTER TABLE `TBL_MS_BITACORA`
  ADD PRIMARY KEY (`Id_Bitacora`);

--
-- Indices de la tabla `TBL_OBJETOS`
--
ALTER TABLE `TBL_OBJETOS`
  ADD PRIMARY KEY (`Id_Objetos`);

--
-- Indices de la tabla `TBL_PARAMETROS`
--
ALTER TABLE `TBL_PARAMETROS`
  ADD PRIMARY KEY (`Id_Parametro`),
  ADD UNIQUE KEY `TBL_PARAMETROS_UN` (`Id_Usuario`);

--
-- Indices de la tabla `TBL_PREGUNTAS`
--
ALTER TABLE `TBL_PREGUNTAS`
  ADD PRIMARY KEY (`Id_Preguntas`);

--
-- Indices de la tabla `TBL_PREGUNTAS_X_USUARIO`
--
ALTER TABLE `TBL_PREGUNTAS_X_USUARIO`
  ADD PRIMARY KEY (`Id_Preguntas`),
  ADD KEY `fk_id_Usupreg` (`Id_Usuario`);

--
-- Indices de la tabla `TBL_ROLES`
--
ALTER TABLE `TBL_ROLES`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- Indices de la tabla `TBL_ROLES_OBJETOS`
--
ALTER TABLE `TBL_ROLES_OBJETOS`
  ADD PRIMARY KEY (`Id_Rol`,`Id_Objetos`),
  ADD KEY `Id_Objetos` (`Id_Objetos`);

--
-- Indices de la tabla `TBL_USUARIO`
--
ALTER TABLE `TBL_USUARIO`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `FK_TBL_USUARIO_Rol` (`Rol`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CUENTAS_POR_COBRAR`
--
ALTER TABLE `CUENTAS_POR_COBRAR`
  MODIFY `Id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `CUENTAS_POR_PAGAR`
--
ALTER TABLE `CUENTAS_POR_PAGAR`
  MODIFY `Id_Cuenta` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `FACTURA`
--
ALTER TABLE `FACTURA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `libro2`
--
ALTER TABLE `libro2`
  MODIFY `id_libro` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `TBL_BALANCE`
--
ALTER TABLE `TBL_BALANCE`
  MODIFY `Id_Balance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `TBL_BODEGA_INVENTARIO`
--
ALTER TABLE `TBL_BODEGA_INVENTARIO`
  MODIFY `Id_Inventario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `TBL_CATALAGO_ESTADO`
--
ALTER TABLE `TBL_CATALAGO_ESTADO`
  MODIFY `CODIGO_CUENTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `TBL_CLIENTES`
--
ALTER TABLE `TBL_CLIENTES`
  MODIFY `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `TBL_COMPRAS`
--
ALTER TABLE `TBL_COMPRAS`
  MODIFY `Id_Compra` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `TBL_ESTADO_RESULTADO`
--
ALTER TABLE `TBL_ESTADO_RESULTADO`
  MODIFY `Id_Estado_R` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `TBL_LIBROS`
--
ALTER TABLE `TBL_LIBROS`
  MODIFY `Id_Libro` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT de la tabla `TBL_LIBROS2`
--
ALTER TABLE `TBL_LIBROS2`
  MODIFY `Id_Libro` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TBL_LIBRO_MAYOR`
--
ALTER TABLE `TBL_LIBRO_MAYOR`
  MODIFY `ID_LIBRO_MAYOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=932;

--
-- AUTO_INCREMENT de la tabla `TBL_MS_BITACORA`
--
ALTER TABLE `TBL_MS_BITACORA`
  MODIFY `Id_Bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `TBL_OBJETOS`
--
ALTER TABLE `TBL_OBJETOS`
  MODIFY `Id_Objetos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'número secuencial que identifica de manera unica a un objeto';

--
-- AUTO_INCREMENT de la tabla `TBL_PARAMETROS`
--
ALTER TABLE `TBL_PARAMETROS`
  MODIFY `Id_Parametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `TBL_PREGUNTAS`
--
ALTER TABLE `TBL_PREGUNTAS`
  MODIFY `Id_Preguntas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `TBL_PREGUNTAS_X_USUARIO`
--
ALTER TABLE `TBL_PREGUNTAS_X_USUARIO`
  MODIFY `Id_Preguntas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `TBL_ROLES`
--
ALTER TABLE `TBL_ROLES`
  MODIFY `Id_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `TBL_ROLES_OBJETOS`
--
ALTER TABLE `TBL_ROLES_OBJETOS`
  MODIFY `Id_Rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TBL_USUARIO`
--
ALTER TABLE `TBL_USUARIO`
  MODIFY `Id_Usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `TBL_PREGUNTAS_X_USUARIO`
--
ALTER TABLE `TBL_PREGUNTAS_X_USUARIO`
  ADD CONSTRAINT `fk_id_Usupreg` FOREIGN KEY (`Id_Usuario`) REFERENCES `TBL_USUARIO` (`Id_Usuario`);

--
-- Filtros para la tabla `TBL_ROLES_OBJETOS`
--
ALTER TABLE `TBL_ROLES_OBJETOS`
  ADD CONSTRAINT `TBL_ROLES_OBJETOS_ibfk_1` FOREIGN KEY (`Id_Rol`) REFERENCES `TBL_ROLES` (`Id_Rol`),
  ADD CONSTRAINT `TBL_ROLES_OBJETOS_ibfk_2` FOREIGN KEY (`Id_Objetos`) REFERENCES `TBL_OBJETOS` (`Id_Objetos`);

--
-- Filtros para la tabla `TBL_USUARIO`
--
ALTER TABLE `TBL_USUARIO`
  ADD CONSTRAINT `FK_TBL_USUARIO_Rol` FOREIGN KEY (`Rol`) REFERENCES `TBL_ROLES` (`Id_Rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
