-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2023 a las 03:48:32
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `claveact` int(3) NOT NULL,
  `nombre` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`claveact`, `nombre`) VALUES
(101, 'PREPARACIÓN DE CLASES'),
(102, 'PREPARACIÓN DE CLASES'),
(201, 'REALIZACIÓN DE PROYECTOS DE INVESTIGACIÓ'),
(302, 'DISEÑO, CONSTRUCCIÓN, OPERACIÓN Y CONSER'),
(403, 'REALIZACIÓN DE ESTUDIOS DE MAESTRÍA'),
(502, 'ELABORACIÓN DE APUNTES, NOTAS, TEXTOS DE'),
(601, 'ESPECIFICAR EN OBSERVACIONES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `clavemat` varchar(15) NOT NULL,
  `nombre` char(40) NOT NULL,
  `nomalter` char(40) DEFAULT NULL,
  `semestre` int(1) NOT NULL,
  `academia` char(50) NOT NULL,
  `plan` int(4) NOT NULL,
  `programa` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`clavemat`, `nombre`, `nomalter`, `semestre`, `academia`, `plan`, `programa`) VALUES
('ADALCD', 'Análisis y Diseño de Algoritmos', 'A. D. Algoritmos LCD', 3, 'Ciencias de la Computación', 2020, 'Licenciatura en Ciencia de Datos'),
('AdmProy', 'Administración de Proyectos', 'Admon de Proyectos', 3, 'Proy Estratégicos y Toma de Decisiones', 2009, 'Ingeniería en Sistemas Computacionales'),
('ADPA', 'A. and D. of Parallel Algorithms', 'A. and D. of Parallel Alg', 3, 'Sistemas Distribuidos', 2009, 'Ingeniería en Sistemas Computacionales'),
('AlgBio', 'Algoritmos Bioinspirados', 'Alg. Bioinsp.', 5, 'Ciencias de la Computación', 2020, 'Ingeniería en Inteligencia Artificial'),
('ASTiem', 'Análisis de Series de Tiempo', 'A. Series de Tiempo', 6, 'Ciencia de Datos', 2020, 'Licenciatura en Ciencia de Datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profconactividad`
--

CREATE TABLE `profconactividad` (
  `boleta` varchar(100) NOT NULL,
  `claveact` int(3) NOT NULL,
  `numhrs` decimal(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profconmaterias`
--

CREATE TABLE `profconmaterias` (
  `boleta` varchar(100) NOT NULL,
  `immax` tinyint(1) DEFAULT NULL,
  `clavemat` varchar(15) NOT NULL,
  `numhrs` decimal(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `boleta` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `nombre` char(50) NOT NULL,
  `apPat` char(50) NOT NULL,
  `apMat` char(50) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(10) NOT NULL,
  `estadoE` tinyint(1) DEFAULT NULL,
  `acceso` tinyint(1) NOT NULL,
  `nomdepto` char(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`boleta`, `admin`, `nombre`, `apPat`, `apMat`, `correo`, `contrasena`, `estadoE`, `acceso`, `nomdepto`, `timestamp`) VALUES
('2021630769', 'A314200000', 'Paula Sofia', 'Noguez', 'Ortiz', 'sofia@sofia.com', 'IA123456', 1, 1, 'IA', '2023-06-13 21:37:13'),
('99630700', 'A314200000', 'ADBEL ANAHI', 'MONTES', 'MEZA', '9900montesm@profeipn.com', 'P99630700', 1, 1, 'DISC', '2023-06-13 21:37:13'),
('99630701', 'A314200000', 'ADRIANA BERENICE', 'CELIS', 'DOMINGUEZ', '9901celisd@profeipn.com', 'P99630701', 1, 1, 'DFII', '2023-06-13 21:37:13'),
('A314200000', 'NULL', 'Pedro', 'López', 'Perez', 'A31lopezp@adminipn.com', 'A3142000', NULL, 1, 'ADM', '2023-06-13 21:37:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`claveact`),
  ADD KEY `claveact` (`claveact`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`clavemat`);

--
-- Indices de la tabla `profconactividad`
--
ALTER TABLE `profconactividad`
  ADD PRIMARY KEY (`boleta`,`claveact`),
  ADD KEY `claveact` (`claveact`);

--
-- Indices de la tabla `profconmaterias`
--
ALTER TABLE `profconmaterias`
  ADD PRIMARY KEY (`boleta`,`clavemat`),
  ADD KEY `clavemat` (`clavemat`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`boleta`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `profconactividad`
--
ALTER TABLE `profconactividad`
  ADD CONSTRAINT `profconactividad_ibfk_1` FOREIGN KEY (`boleta`) REFERENCES `profesor` (`boleta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `profconactividad_ibfk_2` FOREIGN KEY (`claveact`) REFERENCES `actividad` (`claveact`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `profconmaterias`
--
ALTER TABLE `profconmaterias`
  ADD CONSTRAINT `profconmaterias_ibfk_1` FOREIGN KEY (`clavemat`) REFERENCES `materia` (`clavemat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `profconmaterias_ibfk_2` FOREIGN KEY (`boleta`) REFERENCES `profesor` (`boleta`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
