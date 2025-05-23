-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2025 a las 17:37:04
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencia-aprode`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id_asistencia` int(11) NOT NULL,
  `dni` varchar(15) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `estado` enum('Puntual','Tardanza','Falta') DEFAULT 'Falta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id_asistencia`, `dni`, `fecha`, `hora_entrada`, `hora_salida`, `estado`) VALUES
(1, '74233906', '2025-02-10', '09:11:35', '17:14:48', 'Puntual'),
(2, '74233906', '2025-02-12', '09:07:20', '17:18:05', 'Puntual'),
(3, '74233906', '2025-02-13', '09:09:30', '17:06:14', 'Puntual'),
(4, '74233906', '2025-02-14', '09:06:51', '17:18:22', 'Puntual'),
(5, '74233906', '2025-02-17', '09:04:34', '17:08:56', 'Puntual'),
(6, '74233906', '2025-02-19', '09:05:42', '17:18:33', 'Puntual'),
(7, '74233906', '2025-02-20', '09:08:42', '17:05:32', 'Puntual'),
(8, '74233906', '2025-02-21', '09:17:13', '17:18:56', 'Puntual'),
(9, '74233906', '2025-02-24', '09:14:22', '17:06:48', 'Puntual'),
(10, '74233906', '2025-02-26', '09:02:38', '17:19:14', 'Puntual'),
(11, '74233906', '2025-02-27', '09:10:22', '17:17:39', 'Puntual'),
(12, '74233906', '2025-03-03', '09:04:09', '17:09:51', 'Puntual'),
(13, '74233906', '2025-03-05', '09:13:21', '17:07:38', 'Puntual'),
(14, '74233906', '2025-03-06', '09:13:21', '17:07:38', 'Puntual'),
(15, '74233906', '2025-03-07', '09:10:22', '17:18:56', 'Puntual'),
(16, '74233906', '2025-03-10', '09:06:01', '17:19:40', 'Puntual'),
(17, '74233906', '2025-03-12', '09:11:22', '17:10:52', 'Puntual'),
(18, '74233906', '2025-03-13', '09:08:45', '17:13:51', 'Puntual'),
(19, '74233906', '2025-03-14', '09:17:22', '17:19:13', 'Puntual'),
(20, '74233906', '2025-03-17', '09:11:12', '17:18:27', 'Puntual'),
(21, '74233906', '2025-03-19', '09:07:05', '17:14:11', 'Puntual'),
(22, '74233906', '2025-03-20', '09:06:44', '17:05:31', 'Puntual'),
(23, '74233906', '2025-04-07', '09:12:43', '17:17:29', 'Puntual'),
(24, '74233906', '2025-04-09', '09:15:22', '17:11:35', 'Puntual'),
(25, '74233906', '2025-04-10', '09:05:56', '17:13:56', 'Puntual'),
(26, '74233906', '2025-04-11', '09:17:08', '17:15:14', 'Puntual'),
(27, '74233906', '2025-04-14', '09:08:43', '17:07:59', 'Puntual'),
(28, '74233906', '2025-04-16', '09:13:33', '17:12:05', 'Puntual'),
(29, '74233906', '2025-04-17', '09:07:49', '17:16:39', 'Puntual'),
(30, '74233906', '2025-04-18', '09:05:59', '17:19:41', 'Puntual'),
(31, '74233906', '2025-04-21', '09:10:27', '17:18:15', 'Puntual'),
(32, '74233906', '2025-04-23', '09:12:57', '17:14:32', 'Puntual'),
(33, '74233906', '2025-04-24', '09:09:42', '17:18:25', 'Puntual'),
(34, '74233906', '2025-04-25', '09:05:36', '17:13:19', 'Puntual'),
(35, '74233906', '2025-04-28', '09:12:11', '17:05:48', 'Puntual'),
(36, '74233906', '2025-04-30', '09:07:20', '17:12:55', 'Puntual'),
(37, '74233906', '2025-05-01', '09:16:22', '17:10:33', 'Puntual'),
(38, '74233906', '2025-05-02', '09:05:52', '17:13:47', 'Puntual'),
(39, '74233906', '2025-05-05', '09:13:11', '17:18:04', 'Puntual'),
(40, '74233906', '2025-05-07', '09:12:48', '17:15:20', 'Puntual'),
(41, '74233906', '2025-05-08', '09:13:35', '17:16:25', 'Puntual'),
(42, '74233906', '2025-05-09', '09:10:19', '17:07:58', 'Puntual'),
(43, '74233906', '2025-05-12', '09:04:52', '17:17:44', 'Puntual'),
(44, '74233906', '2025-05-14', '09:09:11', '17:18:10', 'Puntual'),
(45, '74233906', '2025-05-15', '09:06:32', '17:18:59', 'Puntual'),
(46, '74233906', '2025-05-16', '09:10:21', '17:12:45', 'Puntual'),
(47, '74233906', '2025-05-19', '09:17:06', '17:08:55', 'Puntual'),
(48, '75592292', '2025-02-19', '09:02:36', '17:05:47', 'Puntual'),
(49, '75592292', '2025-02-20', '09:16:11', '17:14:25', 'Tardanza'),
(50, '75592292', '2025-02-26', '09:11:47', '17:13:16', 'Puntual'),
(51, '75592292', '2025-02-27', '09:07:28', '17:17:08', 'Puntual'),
(52, '75592292', '2025-03-05', '09:12:45', '17:13:52', 'Puntual'),
(53, '75592292', '2025-03-06', '09:09:42', '17:16:03', 'Puntual'),
(54, '75592292', '2025-03-12', '09:13:22', '17:17:12', 'Puntual'),
(55, '75592292', '2025-03-13', '09:18:30', '17:13:45', 'Tardanza'),
(56, '75592292', '2025-03-19', '09:07:40', '17:19:02', 'Puntual'),
(57, '75592292', '2025-03-20', '09:09:17', '17:05:13', 'Puntual'),
(58, '75592292', '2025-03-26', '09:11:12', '17:08:53', 'Puntual'),
(59, '75592292', '2025-03-27', '09:04:11', '17:06:07', 'Puntual'),
(60, '75592292', '2025-04-02', '09:15:30', '17:10:21', 'Tardanza'),
(61, '75592292', '2025-04-03', '09:06:42', '17:11:10', 'Puntual'),
(62, '75592292', '2025-04-09', '09:07:19', '17:12:14', 'Puntual'),
(63, '75592292', '2025-04-10', '09:14:56', '17:07:41', 'Tardanza'),
(64, '75592292', '2025-04-16', '09:08:12', '17:16:25', 'Puntual'),
(65, '75592292', '2025-04-17', '09:05:59', '17:14:30', 'Puntual'),
(66, '75592292', '2025-04-23', '09:06:35', '17:10:48', 'Puntual'),
(67, '75592292', '2025-04-24', '09:11:13', '17:12:51', 'Puntual'),
(68, '75592292', '2025-04-30', '09:07:24', '17:15:02', 'Puntual'),
(69, '75592292', '2025-05-07', '09:15:45', '17:16:11', 'Tardanza'),
(70, '75592292', '2025-05-08', '09:08:17', '17:09:33', 'Puntual'),
(71, '75592292', '2025-05-14', '09:06:32', '17:19:03', 'Puntual'),
(72, '75592292', '2025-05-15', '09:07:15', '17:12:26', 'Puntual'),
(73, '75216105', '2025-02-03', '09:10:25', '17:13:47', 'Puntual'),
(74, '75216105', '2025-02-04', '09:05:38', '17:10:31', 'Puntual'),
(75, '75216105', '2025-02-05', '09:12:56', '17:08:25', 'Puntual'),
(76, '75216105', '2025-02-06', '09:14:02', '17:16:11', 'Puntual'),
(77, '75216105', '2025-02-10', '09:06:49', '17:12:04', 'Puntual'),
(78, '75216105', '2025-02-11', '09:07:36', '17:14:55', 'Puntual'),
(79, '75216105', '2025-02-12', '09:09:24', '17:05:47', 'Puntual'),
(80, '75216105', '2025-02-13', '09:05:39', '17:11:32', 'Puntual'),
(81, '75216105', '2025-02-17', '09:10:02', '17:14:09', 'Puntual'),
(82, '75216105', '2025-02-18', '09:08:30', '17:19:07', 'Puntual'),
(83, '75216105', '2025-02-19', '09:07:11', '17:15:34', 'Puntual'),
(84, '75216105', '2025-02-20', '09:06:22', '17:18:39', 'Puntual'),
(85, '75216105', '2025-02-24', '09:15:40', '17:07:12', 'Puntual'),
(86, '75216105', '2025-02-25', '09:07:11', '17:15:28', 'Puntual'),
(87, '75216105', '2025-02-26', '09:12:06', '17:10:58', 'Puntual'),
(88, '75216105', '2025-02-27', '09:05:33', '17:12:45', 'Puntual'),
(89, '75216105', '2025-03-03', '09:07:41', '17:19:14', 'Puntual'),
(90, '75216105', '2025-03-04', '09:08:53', '17:05:44', 'Puntual'),
(91, '75216105', '2025-03-05', '09:16:05', '17:12:17', 'Puntual'),
(92, '75216105', '2025-03-06', '09:13:31', '17:11:26', 'Puntual'),
(93, '75216105', '2025-03-10', '09:09:04', '17:06:18', 'Puntual'),
(94, '75216105', '2025-03-11', '09:14:33', '17:15:04', 'Puntual'),
(95, '75216105', '2025-03-12', '09:07:13', '17:12:44', 'Puntual'),
(96, '75216105', '2025-03-13', '09:06:20', '17:10:21', 'Puntual'),
(97, '75216105', '2025-03-17', '09:12:55', '17:13:36', 'Puntual'),
(98, '75216105', '2025-03-18', '09:06:43', '17:19:10', 'Puntual'),
(99, '75216105', '2025-03-19', '09:14:02', '17:11:54', 'Puntual'),
(100, '75216105', '2025-03-20', '09:05:36', '17:14:45', 'Puntual'),
(101, '75216105', '2025-03-24', '09:08:15', '17:18:20', 'Puntual'),
(102, '75216105', '2025-03-25', '09:10:07', '17:11:52', 'Puntual'),
(103, '75216105', '2025-03-26', '09:12:43', '17:17:13', 'Puntual'),
(104, '75216105', '2025-03-27', '09:09:52', '17:06:47', 'Puntual'),
(105, '75216105', '2025-03-31', '09:05:22', '17:10:38', 'Puntual'),
(106, '75216105', '2025-04-01', '09:06:38', '17:12:26', 'Puntual'),
(107, '75216105', '2025-04-02', '09:15:30', '17:13:08', 'Puntual'),
(108, '75216105', '2025-04-03', '09:09:08', '17:17:10', 'Puntual'),
(109, '75216105', '2025-04-07', '09:14:05', '17:10:44', 'Puntual'),
(110, '75216105', '2025-04-08', '09:05:44', '17:11:25', 'Puntual'),
(111, '75216105', '2025-04-09', '09:10:38', '17:14:50', 'Puntual'),
(112, '75216105', '2025-04-10', '09:08:33', '17:06:27', 'Puntual'),
(113, '75216105', '2025-04-14', '09:07:12', '17:10:15', 'Puntual'),
(114, '75216105', '2025-04-15', '09:05:59', '17:18:25', 'Puntual'),
(115, '75216105', '2025-04-16', '09:06:44', '17:11:33', 'Puntual'),
(116, '75216105', '2025-04-17', '09:07:54', '17:12:51', 'Puntual'),
(117, '75216105', '2025-04-21', '09:10:02', '17:17:22', 'Puntual'),
(118, '75216105', '2025-04-22', '09:07:44', '17:14:32', 'Puntual'),
(119, '75216105', '2025-04-23', '09:09:13', '17:10:47', 'Puntual'),
(120, '75216105', '2025-04-24', '09:08:39', '17:16:14', 'Puntual'),
(121, '75216105', '2025-04-28', '09:06:29', '17:12:35', 'Puntual'),
(122, '75216105', '2025-04-29', '09:12:03', '17:15:59', 'Puntual'),
(123, '75216105', '2025-04-30', '09:06:45', '17:13:11', 'Puntual'),
(124, '75216105', '2025-05-01', '09:12:22', '17:14:00', 'Puntual'),
(125, '75216105', '2025-05-05', '09:07:08', '17:11:33', 'Puntual'),
(126, '75216105', '2025-05-06', '09:06:49', '17:10:59', 'Puntual'),
(127, '75216105', '2025-05-07', '09:15:28', '17:13:11', 'Puntual'),
(128, '75216105', '2025-05-08', '09:13:56', '17:14:02', 'Puntual'),
(129, '75216105', '2025-05-12', '09:09:22', '17:10:50', 'Puntual'),
(130, '75216105', '2025-05-13', '09:11:08', '17:07:33', 'Puntual'),
(131, '75216105', '2025-05-14', '09:10:12', '17:15:30', 'Puntual'),
(132, '75216105', '2025-05-15', '09:08:25', '17:19:10', 'Puntual'),
(133, '75216105', '2025-05-19', '09:07:45', '17:10:26', 'Puntual'),
(134, '75592292', '2025-02-10', '09:08:46', '17:11:20', 'Puntual'),
(135, '75592292', '2025-02-13', '09:09:02', '17:12:15', 'Puntual'),
(136, '75592292', '2025-02-17', '09:07:59', '17:10:29', 'Puntual'),
(167, '74233906', '2025-05-21', '09:10:12', NULL, 'Puntual'),
(168, '73937735', '2025-02-10', '09:14:00', '17:02:00', 'Puntual'),
(169, '73937735', '2025-02-13', '09:17:00', '17:01:00', 'Puntual'),
(170, '73937735', '2025-02-17', '09:04:00', '17:10:00', 'Puntual'),
(171, '73937735', '2025-02-20', '09:09:00', '17:12:00', 'Puntual'),
(172, '73937735', '2025-02-24', '09:03:00', '17:03:00', 'Puntual'),
(173, '73937735', '2025-03-03', '09:08:00', '17:09:00', 'Puntual'),
(174, '73937735', '2025-03-06', '09:15:00', '17:13:00', 'Puntual'),
(175, '73937735', '2025-03-10', '09:12:00', '17:14:00', 'Puntual'),
(176, '73937735', '2025-03-13', '09:06:00', '17:05:00', 'Puntual'),
(177, '73937735', '2025-03-17', '09:13:00', '17:02:00', 'Puntual'),
(178, '73937735', '2025-03-20', '09:11:00', '17:03:00', 'Puntual'),
(179, '73937735', '2025-03-24', '09:09:00', '17:14:00', 'Puntual'),
(180, '73937735', '2025-03-27', '09:07:00', '17:06:00', 'Puntual'),
(181, '73937735', '2025-04-03', '09:14:00', '17:10:00', 'Puntual'),
(182, '73937735', '2025-04-07', '09:08:00', '17:12:00', 'Puntual'),
(183, '73937735', '2025-04-10', '09:18:00', '17:01:00', 'Puntual'),
(184, '73937735', '2025-04-14', '09:02:00', '17:09:00', 'Puntual'),
(185, '73937735', '2025-04-17', '09:12:00', '17:08:00', 'Puntual'),
(186, '73937735', '2025-04-21', '09:06:00', '17:04:00', 'Puntual'),
(187, '73937735', '2025-04-24', '09:11:00', '17:13:00', 'Puntual'),
(188, '73937735', '2025-04-28', '09:10:00', '17:02:00', 'Puntual'),
(189, '73937735', '2025-05-01', '09:07:00', '17:05:00', 'Puntual'),
(190, '73937735', '2025-05-04', '09:18:00', '17:12:00', 'Puntual'),
(191, '73937735', '2025-05-08', '09:16:00', '17:10:00', 'Puntual'),
(192, '73937735', '2025-05-11', '09:03:00', '17:13:00', 'Puntual'),
(193, '73937735', '2025-05-15', '09:14:00', '17:02:00', 'Puntual'),
(194, '73937735', '2025-05-19', '09:08:00', '17:14:00', 'Puntual'),
(195, '62433807', '2025-03-03', '10:10:00', '17:03:00', 'Puntual'),
(196, '62433807', '2025-03-04', '10:05:00', '17:07:00', 'Puntual'),
(197, '62433807', '2025-03-05', '10:15:00', '17:10:00', 'Tardanza'),
(198, '62433807', '2025-03-06', '10:12:00', '17:09:00', 'Puntual'),
(199, '62433807', '2025-03-07', '10:22:00', '17:11:00', 'Tardanza'),
(200, '62433807', '2025-03-10', '10:08:00', '17:05:00', 'Puntual'),
(201, '62433807', '2025-03-11', '10:04:00', '17:13:00', 'Puntual'),
(202, '62433807', '2025-03-12', '10:18:00', '17:14:00', 'Tardanza'),
(203, '62433807', '2025-03-13', '10:09:00', '17:08:00', 'Puntual'),
(204, '62433807', '2025-03-14', '10:20:00', '17:02:00', 'Puntual'),
(205, '62433807', '2025-03-17', '10:14:00', '17:06:00', 'Tardanza'),
(206, '62433807', '2025-03-18', '10:05:00', '17:07:00', 'Puntual'),
(207, '62433807', '2025-03-19', '10:17:00', '17:11:00', 'Tardanza'),
(208, '62433807', '2025-03-20', '10:11:00', '17:12:00', 'Puntual'),
(209, '62433807', '2025-03-21', '10:16:00', '17:04:00', 'Tardanza'),
(210, '62433807', '2025-03-24', '10:19:00', '17:05:00', 'Tardanza'),
(211, '62433807', '2025-03-25', '10:06:00', '17:03:00', 'Puntual'),
(212, '62433807', '2025-03-26', '10:13:00', '17:09:00', 'Tardanza'),
(213, '62433807', '2025-03-27', '10:09:00', '17:10:00', 'Puntual'),
(214, '62433807', '2025-03-28', '10:21:00', '17:14:00', 'Tardanza'),
(215, '62433807', '2025-04-01', '10:10:00', '17:07:00', 'Puntual'),
(216, '62433807', '2025-04-02', '10:05:00', '17:08:00', 'Puntual'),
(217, '62433807', '2025-04-03', '10:12:00', '17:06:00', 'Puntual'),
(218, '62433807', '2025-04-04', '10:20:00', '17:15:00', 'Tardanza'),
(219, '62433807', '2025-04-07', '10:08:00', '17:11:00', 'Puntual'),
(220, '62433807', '2025-04-08', '10:13:00', '17:09:00', 'Tardanza'),
(221, '62433807', '2025-04-09', '10:17:00', '17:02:00', 'Tardanza'),
(222, '62433807', '2025-04-10', '10:10:00', '17:04:00', 'Puntual'),
(223, '62433807', '2025-04-11', '10:06:00', '17:12:00', 'Puntual'),
(224, '62433807', '2025-04-14', '10:14:00', '17:13:00', 'Tardanza'),
(225, '62433807', '2025-04-15', '10:20:00', '17:02:00', 'Tardanza'),
(226, '62433807', '2025-04-16', '10:11:00', '17:06:00', 'Puntual'),
(227, '62433807', '2025-04-17', '10:22:00', '17:10:00', 'Tardanza'),
(228, '62433807', '2025-04-18', '10:12:00', '17:03:00', 'Puntual'),
(229, '62433807', '2025-04-21', '10:09:00', '17:05:00', 'Puntual'),
(230, '62433807', '2025-04-22', '10:16:00', '17:11:00', 'Tardanza'),
(231, '62433807', '2025-04-23', '10:04:00', '17:09:00', 'Puntual'),
(232, '62433807', '2025-04-24', '10:08:00', '17:07:00', 'Puntual'),
(233, '62433807', '2025-04-25', '10:21:00', '17:15:00', 'Tardanza'),
(234, '62433807', '2025-04-28', '10:19:00', '17:08:00', 'Tardanza'),
(235, '62433807', '2025-04-29', '10:13:00', '17:05:00', 'Tardanza'),
(236, '62433807', '2025-04-30', '10:15:00', '17:10:00', 'Tardanza'),
(237, '62433807', '2025-05-05', '10:11:00', '17:06:00', 'Puntual'),
(238, '62433807', '2025-05-06', '10:07:00', '17:08:00', 'Puntual'),
(239, '62433807', '2025-05-07', '10:14:00', '17:03:00', 'Tardanza'),
(240, '62433807', '2025-05-08', '10:18:00', '17:05:00', 'Tardanza'),
(241, '62433807', '2025-05-09', '10:06:00', '17:12:00', 'Puntual'),
(242, '62433807', '2025-05-12', '10:13:00', '17:10:00', 'Tardanza'),
(243, '62433807', '2025-05-13', '10:09:00', '17:04:00', 'Puntual'),
(244, '62433807', '2025-05-14', '10:15:00', '17:13:00', 'Tardanza'),
(245, '62433807', '2025-05-15', '10:10:00', '17:06:00', 'Puntual'),
(246, '62433807', '2025-05-16', '10:20:00', '17:15:00', 'Tardanza'),
(247, '62433807', '2025-05-19', '10:12:00', '17:07:00', 'Puntual'),
(248, '62433807', '2025-05-20', '10:08:00', '17:05:00', 'Puntual'),
(249, '75398620', '2025-04-01', '09:15:00', '17:08:00', 'Puntual'),
(250, '75398620', '2025-04-04', '09:13:00', '17:12:00', 'Puntual'),
(251, '75398620', '2025-04-08', '09:10:00', '17:09:00', 'Puntual'),
(252, '75398620', '2025-04-11', '09:18:00', '17:06:00', 'Puntual'),
(253, '75398620', '2025-04-15', '09:12:00', '17:11:00', 'Puntual'),
(254, '75398620', '2025-04-18', '09:16:00', '17:10:00', 'Puntual'),
(255, '75398620', '2025-04-22', '09:14:00', '17:13:00', 'Puntual'),
(256, '75398620', '2025-04-25', '09:17:00', '17:07:00', 'Puntual'),
(257, '75398620', '2025-05-06', '09:15:00', '17:08:00', 'Puntual'),
(258, '75398620', '2025-05-13', '09:18:00', '17:09:00', 'Puntual'),
(259, '75398620', '2025-05-20', '09:14:00', '17:13:00', 'Puntual'),
(260, '71332126', '2025-04-01', '09:15:00', '17:08:00', 'Puntual'),
(261, '71332126', '2025-04-02', '09:18:00', '17:12:00', 'Puntual'),
(262, '71332126', '2025-04-03', '09:14:00', '17:10:00', 'Puntual'),
(263, '71332126', '2025-04-04', '09:17:00', '17:11:00', 'Puntual'),
(264, '71332126', '2025-04-05', '09:19:00', '17:07:00', 'Puntual'),
(265, '71332126', '2025-04-08', '09:20:00', '17:09:00', 'Puntual'),
(266, '71332126', '2025-04-09', '09:16:00', '17:14:00', 'Puntual'),
(267, '71332126', '2025-04-10', '09:15:00', '17:08:00', 'Puntual'),
(268, '71332126', '2025-04-11', '09:18:00', '17:06:00', 'Puntual'),
(269, '71332126', '2025-04-12', '09:19:00', '17:13:00', 'Puntual'),
(270, '71332126', '2025-04-15', '09:14:00', '17:10:00', 'Puntual'),
(271, '71332126', '2025-04-16', '09:17:00', '17:09:00', 'Puntual'),
(272, '71332126', '2025-04-17', '09:15:00', '17:12:00', 'Puntual'),
(273, '71332126', '2025-04-18', '09:20:00', '17:08:00', 'Puntual'),
(274, '71332126', '2025-04-19', '09:16:00', '17:11:00', 'Puntual'),
(275, '71332126', '2025-04-22', '09:19:00', '17:06:00', 'Puntual'),
(276, '71332126', '2025-04-23', '09:18:00', '17:14:00', 'Puntual'),
(277, '71332126', '2025-04-24', '09:15:00', '17:07:00', 'Puntual'),
(278, '71332126', '2025-04-25', '09:17:00', '17:13:00', 'Puntual'),
(279, '71332126', '2025-04-26', '09:14:00', '17:12:00', 'Puntual'),
(280, '71332126', '2025-04-29', '09:20:00', '17:08:00', 'Puntual'),
(281, '71332126', '2025-04-30', '09:15:00', '17:09:00', 'Puntual'),
(282, '71332126', '2025-05-01', '09:16:00', '17:10:00', 'Puntual'),
(283, '71332126', '2025-05-02', '09:19:00', '17:06:00', 'Puntual'),
(284, '71332126', '2025-05-05', '09:17:00', '17:13:00', 'Puntual'),
(285, '71332126', '2025-05-06', '09:14:00', '17:09:00', 'Puntual'),
(286, '71332126', '2025-05-07', '09:20:00', '17:11:00', 'Puntual'),
(287, '71332126', '2025-05-08', '09:16:00', '17:12:00', 'Puntual'),
(288, '71332126', '2025-05-09', '09:17:00', '17:08:00', 'Puntual'),
(289, '71332126', '2025-05-12', '09:19:00', '17:14:00', 'Puntual'),
(290, '71332126', '2025-05-13', '09:14:00', '17:07:00', 'Puntual'),
(291, '71332126', '2025-05-14', '09:20:00', '17:10:00', 'Puntual'),
(292, '71332126', '2025-05-15', '09:18:00', '17:11:00', 'Puntual'),
(293, '71332126', '2025-05-19', '09:14:00', '17:12:00', 'Puntual'),
(294, '71332126', '2025-05-20', '09:19:00', '17:06:00', 'Puntual'),
(295, '75216105', '2025-05-20', '09:04:00', '17:13:00', 'Puntual'),
(296, '75592292', '2025-05-21', '09:14:49', NULL, 'Puntual'),
(297, '75216105', '2025-05-21', '09:14:14', NULL, 'Puntual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `dni` varchar(15) DEFAULT NULL,
  `dia_semana` enum('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo') DEFAULT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `dni`, `dia_semana`, `hora_inicio`, `hora_fin`) VALUES
(1, '74233906', 'Jueves', '09:00:00', '17:00:00'),
(2, '74233906', 'Lunes', '09:00:00', '17:00:00'),
(3, '74233906', 'Miércoles', '09:00:00', '17:00:00'),
(4, '74233906', 'Viernes', '09:00:00', '17:00:00'),
(5, '73937735', 'Lunes', '09:00:00', '17:00:00'),
(6, '73937735', 'Jueves', '09:00:00', '17:00:00'),
(7, '75592292', 'Miércoles', '09:00:00', '17:00:00'),
(8, '75592292', 'Jueves', '09:00:00', '17:00:00'),
(9, '62433807', 'Lunes', '10:30:00', '17:00:00'),
(10, '62433807', 'Martes', '10:30:00', '17:00:00'),
(11, '62433807', 'Miércoles', '10:30:00', '17:00:00'),
(12, '62433807', 'Jueves', '10:30:00', '17:00:00'),
(13, '62433807', 'Viernes', '10:30:00', '17:00:00'),
(14, '75216105', 'Lunes', '09:00:00', '17:00:00'),
(15, '75216105', 'Martes', '09:00:00', '17:00:00'),
(16, '75216105', 'Miércoles', '09:00:00', '17:00:00'),
(17, '75216105', 'Jueves', '09:00:00', '17:00:00'),
(18, '75398620', 'Martes', '09:00:00', '17:00:00'),
(19, '75398620', 'Viernes', '09:00:00', '17:00:00'),
(20, '71332126', 'Lunes', '09:00:00', '17:00:00'),
(21, '71332126', 'Martes', '09:00:00', '17:00:00'),
(22, '71332126', 'Miércoles', '09:00:00', '17:00:00'),
(23, '71332126', 'Jueves', '09:00:00', '17:00:00'),
(24, '71332126', 'Viernes', '09:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'admin'),
(2, 'trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` varchar(15) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `puesto` varchar(100) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT 1,
  `password` varchar(255) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre_completo`, `celular`, `correo`, `puesto`, `habilitado`, `password`, `id_rol`) VALUES
('62433807', 'Luis Angel Casas Quiliche', '968237478', 'luiscq756@gmail.com', 'Contabilidad', 1, NULL, 2),
('71332126', 'Joaquin Eduardo Lapa Garfias', '912346324', 'Joaquinlapaeg@gmail.com', 'Administración', 1, NULL, 2),
('73937735', 'Daniel Calderon Ordijuela', '901264373', 'dc644373@gmail.com', 'Ing Web', 1, NULL, 2),
('74233906', 'Pedro Alessandro Rodenas Aponte', '908621582', 'pedrorodenas0506@gmail.com', 'Ing. Web', 1, NULL, 2),
('75216105', 'Pedro Simon Vargas Gimenes', '924688306', 'pedro.vargas05@hotmail.com', 'Soporte Tecnico', 1, NULL, 2),
('75398620', 'Arnold Brandon Cano Osorio', '948308792', 'Arnoldcano100720@gmail.com', 'Diseñador Gráfico', 1, NULL, 2),
('75592292', 'Carlos Daniel Ore Yahuana', '995312380', 'oreyahuanacarlos@gmai.com', 'Ing Web', 1, NULL, 2),
('80447667', 'Pedro Rodenas', '908621582', 'pedrorodenas0506@gmail.com', 'Administrador', 1, '12345', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD UNIQUE KEY `dni` (`dni`,`fecha`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuarios` (`dni`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuarios` (`dni`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
