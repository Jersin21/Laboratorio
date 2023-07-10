-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdlaboratorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE `analisis` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `analisis`
--

INSERT INTO `analisis` (`id`, `name`, `idCategoria`) VALUES
(1, 'Hemoglobina', 1),
(2, 'Hematocrito', 1),
(3, 'Hematíes', 1),
(4, 'Leucocitos', 1),
(5, 'Fórmula Diferencial', 1),
(6, 'Eritrosedimentación', 1),
(7, 'T. Sangría', 2),
(8, 'T. Coagulacíon', 2),
(9, 'T. Protrombina', 2),
(10, 'TPT', 2),
(11, 'Fibrinógeno', 2),
(12, 'Plaquetas', 2),
(13, 'Grupo Sanguineo', 2),
(14, 'Factor Rh', 2),
(15, 'Sodio Na', 3),
(16, 'Potacio K', 3),
(17, 'Cloro Cl', 3),
(18, 'Calcio Ca', 3),
(19, 'Fósforo', 3),
(20, 'Magnesio', 3),
(21, 'Recuento de Baterias por campo', 4),
(22, 'Tricomonas', 4),
(23, 'Gram', 4),
(24, 'Zlelh Neelsen', 4),
(25, 'Cultivo e identificación', 4),
(26, 'Cultivo en Nickerson', 4),
(27, 'Prueba de Sensibilidad a los Antibióticos', 4),
(28, 'Autovacunas', 4),
(29, 'Úrea', 5),
(30, 'Creatinina', 5),
(31, 'Ácido Úrico', 5),
(32, 'Glucosa', 5),
(33, 'Glucosa Postprandial', 5),
(34, 'Colesterol', 5),
(35, 'HDL-Colesterol', 5),
(36, 'LDL-Colesterol', 5),
(37, 'Triglicéridos', 5),
(38, 'Lídos Totales', 5),
(39, 'Proteínas y fracciones', 5),
(40, 'Bilirrubina y fracciones', 5),
(41, 'Hierro Sérico', 5),
(42, 'Fijacion del Hierro', 5),
(43, 'T3', 6),
(44, 'T4', 6),
(45, 'Citomegalovirus', 6),
(46, 'PSA', 6),
(47, 'Rubéola', 6),
(48, 'Herpes I-II', 6),
(49, 'Anticuerpo', 6),
(50, 'HIV', 6),
(51, 'Hepatitis', 6),
(52, 'Fosfatasa Alcalina', 7),
(53, 'Gama G.T.', 7),
(54, 'Fosfatasa Ácida Total', 7),
(55, 'Fosfatasa Ácida Prostatica', 7),
(56, 'G.O.T. y G.P.T.', 7),
(57, 'LDH', 7),
(58, 'CK', 7),
(59, 'CKMB', 7),
(60, 'Lipasa', 7),
(61, 'Amilasa', 7),
(62, 'VDRL', 8),
(63, 'Widal y Well Felix', 8),
(64, 'Toxoplasma', 8),
(65, 'ASTO', 8),
(66, 'R.A. Test', 8),
(67, 'PCR', 8),
(68, 'Mono test', 8),
(69, 'LE test', 8),
(70, 'Físico - Quimico', 9),
(71, 'Sedimento', 9),
(72, 'Gravindex', 9),
(73, 'Sustancias Digestivas', 10),
(74, 'Parasitológico', 10),
(75, 'Sangre oculta', 10),
(76, 'Estudio del Moco Fecal', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `name`) VALUES
(1, 'BIOMETRÍA HEMATICA'),
(2, 'HEMOSTASICOS'),
(3, 'ELECTROLITOS'),
(4, 'BACTEREOLÓGICOS'),
(5, 'BIOQUÍMICA'),
(6, 'ESPECIALES'),
(7, 'ENZIMAS'),
(8, 'SEROLÓGICOS'),
(9, 'ORINAS'),
(10, 'HECES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinica`
--

CREATE TABLE `clinica` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `especialidades` varchar(150) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clinica`
--

INSERT INTO `clinica` (`id`, `name`, `direccion`, `telefono`, `especialidades`, `idUsuario`) VALUES
(1, 'Los Pocitos', 'calle 3', '32156487', 'De todo', 12),
(2, 'La Morita', 'la morita', '321456785', 'de todo', 11),
(3, 'Preventiva Sub', 'Plan 3000', '3698521', 'de todo', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `idSolicitudDetalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `image`
--

INSERT INTO `image` (`id`, `image_path`, `idSolicitudDetalle`) VALUES
(1, 'uploads/7_20230612163316_327144990_900548324539633_5029094767420649696_n.jpg', 7),
(2, 'uploads/7_20230612163316_Captura.PNG', 7),
(3, 'uploads/7_20230612163316_Captura1.PNG', 7),
(4, 'uploads/7_20230612163316_Captura2.PNG', 7),
(7, 'uploads/48_20230614013401_Captura1.PNG', 48),
(8, 'uploads/49_20230614013409_Captura1.PNG', 49),
(9, 'uploads/49_20230614013419_Captura1.PNG', 49),
(10, 'uploads/49_20230614013419_Captura2.PNG', 49),
(11, 'uploads/49_20230614013419_diseño.PNG', 49),
(12, 'uploads/50_20230614013430_kisspng-company-management-building-business-computer-icon-rate-5ad188b1d9', 50),
(13, 'uploads/84_20230614014150_credenciales.txt', 84),
(14, 'uploads/203_20230614165729_diseño.PNG', 203);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `idClinica` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id`, `especialidad`, `idClinica`, `idUsuario`) VALUES
(1, 'Cardiologo', 1, 10),
(2, 'Pediatra', 1, 13),
(3, 'Oftalmologia', 2, 18),
(4, 'Dentista', 3, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `ci` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `celular` varchar(10) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellidos`, `ci`, `email`, `celular`, `direccion`, `fechaNacimiento`, `created_at`, `update_at`) VALUES
(29, 'Pedro ', 'mamani flores', '84919819', 'mamani@gmail.com', '7894919', 'Plam 3000', '1997-01-05', NULL, NULL),
(30, 'Lucas', 'Alpire Apaza', '7894981', 'Apaza@gmail.com', '79849849', 'Plam 3000', '1999-01-05', NULL, NULL),
(32, 'Jhon', 'Saldaña', '7894198', 'Jhon@gmail.com', '78949841', 'Los Positos', '1989-10-06', NULL, NULL),
(33, 'Alfredo ', 'mamani', '79879', 'mamani@fmail.com', '48489498', 'Plan 3000', '2020-08-01', NULL, NULL),
(34, 'Erwin', 'mamani', '8456874', 'mamani@gmail.com', '784568', 'calle 3', '1998-10-10', NULL, NULL),
(35, 'Juan', 'Viruez', '8456587', 'viruez@gmail.com', '78456254', 'calle 3', '1995-12-23', NULL, NULL),
(36, 'Silvia', 'Moreno', '8458795', 'slopez@gmail.com', '7845698', 'calle 3', '1994-02-09', NULL, NULL),
(37, 'Jesus', 'Montez', '8745698', 'jmontez@gmail.com', '78456254', 'calle 3', '2004-02-19', NULL, NULL),
(38, 'Ronald', 'Ortiz', '87456987', 'ronald@gmail.com', '78456254', 'calle 3', '1993-02-09', NULL, NULL),
(39, 'Juan', 'perez', '789987', 'mail@mail.com', '7845865', 'calle 3', '2023-05-18', NULL, NULL),
(40, 'Hector', 'mamani', '7842158', 'mail@mail.com', '78456254', 'calle 3', '2021-01-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE `resultado` (
  `id` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `idSolicitudDetalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`id`, `detalle`, `fecha`, `idSolicitudDetalle`) VALUES
(1, 'asd', '2023-06-12', 7),
(2, 'asd', '2023-06-12', 8),
(3, 'asd', '2023-06-12', 9),
(4, 'asd', '2023-06-12', 10),
(5, 'hematocrito resultado', '2023-06-14', 48),
(6, 'Colesterol resultado', '2023-06-14', 49),
(7, ' CK resultado', '2023-06-14', 50),
(8, 'asd', '2023-06-14', 203),
(9, 'asd', '2023-06-14', 204),
(10, 'asd', '2023-06-14', 205);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `paciente` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `muestra` varchar(50) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `idUsuarioMedico` int(11) DEFAULT NULL,
  `idUsuarioLab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `paciente`, `fecha`, `muestra`, `observaciones`, `estado`, `idUsuarioMedico`, `idUsuarioLab`) VALUES
(6, 'Pedro', '2023-06-10', 'Laboratorio', 'SNA', 'Completado', 13, 16),
(8, 'Luis Castro', '2023-06-10', 'Laboratorio', 'observaciones', 'Iniciado', 13, 16),
(9, 'Luis Castro', '2023-06-11', 'Laboratorio', 'observaciones', 'Iniciado', 13, 17),
(10, 'Fernando ', '2023-06-11', 'Laboratorio', 'observaciones', 'Completado', 13, 16),
(11, 'Final', '2023-06-12', 'Laboratorio', 'SNA', 'Iniciado', 13, 16),
(12, 'Jaime', '2023-06-15', 'Clinica', 'observaciones', 'Iniciado', 18, 16),
(13, 'Alvaro', '2023-06-12', 'Laboratorio', 'observaciones', 'Iniciado', 18, 16),
(14, 'Jorge', '2023-06-12', 'Clinica', 'observaciones', 'Iniciado', 19, 17),
(15, 'Roy', '2023-06-01', 'Clinica', 'observaciones', 'Iniciado', 19, 17),
(16, 'Jaime', '2023-06-15', 'Clinica', 'observaciones', 'Iniciado', 13, 17),
(17, 'Carlos', '2023-06-08', 'Clinica', 'observaciones', 'Pendiente', 18, NULL),
(18, 'asd', '2023-06-14', 'Laboratorio', 'asdasdasdasdasdasda', 'Pendiente', 13, NULL),
(19, 'Michael', '2023-06-14', 'Clinica', 'observaciones', 'Completado', 13, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicituddetalle`
--

CREATE TABLE `solicituddetalle` (
  `id` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `idAnalisis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicituddetalle`
--

INSERT INTO `solicituddetalle` (`id`, `idSolicitud`, `idAnalisis`) VALUES
(7, 6, 1),
(8, 6, 29),
(9, 6, 52),
(10, 6, 72),
(24, 8, 3),
(25, 8, 28),
(26, 8, 32),
(27, 8, 56),
(28, 8, 76),
(42, 9, 11),
(43, 9, 20),
(44, 9, 44),
(45, 9, 65),
(46, 9, 67),
(47, 9, 74),
(48, 10, 2),
(49, 10, 36),
(50, 10, 58),
(51, 11, 1),
(52, 11, 2),
(53, 11, 3),
(54, 11, 7),
(55, 11, 8),
(56, 11, 9),
(57, 11, 15),
(58, 11, 16),
(59, 11, 17),
(60, 11, 21),
(61, 11, 22),
(62, 11, 23),
(63, 11, 29),
(64, 11, 30),
(65, 11, 31),
(66, 11, 43),
(67, 11, 44),
(68, 11, 45),
(69, 11, 52),
(70, 11, 53),
(71, 11, 54),
(72, 11, 62),
(73, 11, 63),
(74, 11, 64),
(75, 11, 70),
(76, 11, 71),
(77, 11, 72),
(78, 11, 73),
(79, 11, 74),
(80, 11, 75),
(81, 12, 2),
(82, 12, 8),
(83, 12, 58),
(84, 13, 1),
(85, 13, 3),
(86, 13, 4),
(87, 13, 7),
(88, 13, 36),
(89, 13, 46),
(90, 13, 59),
(91, 13, 62),
(92, 13, 67),
(93, 14, 1),
(94, 14, 2),
(95, 14, 3),
(96, 14, 20),
(97, 14, 24),
(98, 14, 35),
(99, 14, 48),
(100, 14, 54),
(101, 14, 73),
(102, 15, 1),
(103, 15, 2),
(104, 15, 17),
(105, 15, 28),
(106, 15, 31),
(107, 15, 46),
(108, 15, 57),
(109, 15, 58),
(110, 15, 67),
(111, 15, 76),
(112, 16, 1),
(113, 16, 2),
(114, 16, 29),
(115, 16, 52),
(116, 16, 53),
(117, 17, 1),
(118, 17, 2),
(119, 17, 3),
(120, 17, 4),
(121, 17, 5),
(122, 17, 6),
(123, 17, 7),
(124, 17, 8),
(125, 17, 9),
(126, 17, 10),
(127, 17, 11),
(128, 17, 12),
(129, 17, 13),
(130, 17, 14),
(131, 17, 15),
(132, 17, 16),
(133, 17, 17),
(134, 17, 18),
(135, 17, 19),
(136, 17, 20),
(137, 17, 21),
(138, 17, 22),
(139, 17, 23),
(140, 17, 24),
(141, 17, 25),
(142, 17, 26),
(143, 17, 27),
(144, 17, 28),
(145, 17, 29),
(146, 17, 30),
(147, 17, 31),
(148, 17, 32),
(149, 17, 33),
(150, 17, 34),
(151, 17, 35),
(152, 17, 36),
(153, 17, 37),
(154, 17, 38),
(155, 17, 39),
(156, 17, 4),
(157, 17, 41),
(158, 17, 42),
(159, 17, 43),
(160, 17, 44),
(161, 17, 45),
(162, 17, 46),
(163, 17, 47),
(164, 17, 48),
(165, 17, 49),
(166, 17, 50),
(167, 17, 51),
(168, 17, 52),
(169, 17, 53),
(170, 17, 54),
(171, 17, 55),
(172, 17, 56),
(173, 17, 57),
(174, 17, 58),
(175, 17, 59),
(176, 17, 60),
(177, 17, 61),
(178, 17, 62),
(179, 17, 63),
(180, 17, 64),
(181, 17, 65),
(182, 17, 66),
(183, 17, 67),
(184, 17, 68),
(185, 17, 69),
(186, 17, 70),
(187, 17, 71),
(188, 17, 72),
(189, 17, 73),
(190, 17, 74),
(191, 17, 75),
(192, 17, 76),
(195, 18, 1),
(196, 18, 31),
(203, 19, 3),
(204, 19, 29),
(205, 19, 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Administrador Clinica', NULL, NULL),
(5, 'Medico', NULL, NULL),
(6, 'Responsable', NULL, NULL),
(7, 'Recepcionista', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(300) NOT NULL,
  `emailCorporativo` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0=inactivo, 1=activo',
  `idPersona` int(11) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `contraseña`, `emailCorporativo`, `estado`, `idPersona`, `idTipoUsuario`, `created_at`, `updated_at`) VALUES
(10, 'Administrador', 'QjZRMmJ3OTBOS3lMUjNLYzVOZVVXdz09', 'admin@boli.com', 0, 29, 1, NULL, NULL),
(11, 'Admin3', 'Y0xPR1Yvek5qY2dTQm1OZkUzaE1WQT09', 'Lucas@boli.com', 1, 30, 2, NULL, NULL),
(12, 'Admin2', 'Y0xPR1Yvek5qY2dTQm1OZkUzaE1WQT09', 'persona3@boli.com', 1, 33, 2, NULL, NULL),
(13, 'Medico1', 'QjZRMmJ3OTBOS3lMUjNLYzVOZVVXdz09', 'mamani@gmail.com', 1, 34, 5, NULL, NULL),
(14, 'Medico2', 'QjZRMmJ3OTBOS3lMUjNLYzVOZVVXdz09', 'viruez@gmail.com', 1, 35, 5, NULL, NULL),
(15, 'Recepcionista', 'QjZRMmJ3OTBOS3lMUjNLYzVOZVVXdz09', 'slopez@gmail.com', 1, 36, 7, NULL, NULL),
(16, 'MedicoLab1', 'QjZRMmJ3OTBOS3lMUjNLYzVOZVVXdz09', 'jmontez@gmail.com', 1, 37, 6, NULL, NULL),
(17, 'MedicoLab2', 'QjZRMmJ3OTBOS3lMUjNLYzVOZVVXdz09', 'ronald@gmail.com', 1, 38, 6, NULL, NULL),
(18, 'Medico3', 'QjZRMmJ3OTBOS3lMUjNLYzVOZVVXdz09', 'mamani@gmail.com', 1, 39, 5, NULL, NULL),
(19, 'Medico4', 'QjZRMmJ3OTBOS3lMUjNLYzVOZVVXdz09', 'mamani@gmail.com', 1, 40, 5, NULL, NULL),
(21, 'Admin1', 'Y0xPR1Yvek5qY2dTQm1OZkUzaE1WQT09', 'algo?4algo.com', 1, 32, 2, NULL,NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clinica`
--
ALTER TABLE `clinica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_ibfk_1` (`idSolicitudDetalle`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClinica` (`idClinica`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSolicitudDetalle` (`idSolicitudDetalle`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuarioLab` (`idUsuarioLab`),
  ADD KEY `solicitud_ibfk_1` (`idUsuarioMedico`);

--
-- Indices de la tabla `solicituddetalle`
--
ALTER TABLE `solicituddetalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSolicitud` (`idSolicitud`),
  ADD KEY `idAnalisis` (`idAnalisis`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `usuario_ibfk_1` (`idPersona`),
  ADD KEY `usuario_ibfk_2` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clinica`
--
ALTER TABLE `clinica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `resultado`
--
ALTER TABLE `resultado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `solicituddetalle`
--
ALTER TABLE `solicituddetalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD CONSTRAINT `analisis_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `clinica`
--
ALTER TABLE `clinica`
  ADD CONSTRAINT `clinica_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`idSolicitudDetalle`) REFERENCES `solicituddetalle` (`id`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`idClinica`) REFERENCES `clinica` (`id`),
  ADD CONSTRAINT `medico_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `resultado_ibfk_1` FOREIGN KEY (`idSolicitudDetalle`) REFERENCES `solicituddetalle` (`id`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`idUsuarioMedico`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`idUsuarioLab`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `solicituddetalle`
--
ALTER TABLE `solicituddetalle`
  ADD CONSTRAINT `solicituddetalle_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `solicitud` (`id`),
  ADD CONSTRAINT `solicituddetalle_ibfk_2` FOREIGN KEY (`idAnalisis`) REFERENCES `analisis` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
