-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2021 a las 12:21:50
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zoo`
--
DROP DATABASE IF EXISTS `zoo`;
CREATE DATABASE IF NOT EXISTS `zoo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `zoo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `especie` varchar(32) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `ano_nac` date NOT NULL,
  `pais_origen` varchar(30) NOT NULL,
  `continente` varchar(30) NOT NULL,
  `dni_responsable` varchar(9) NOT NULL,
  `ruta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`codigo`, `tipo`, `especie`, `sexo`, `ano_nac`, `pais_origen`, `continente`, `dni_responsable`, `ruta`) VALUES
(1, 'león', 'mamífero carnívoro', 'macho', '2015-06-12', 'Congo', 'Africa', '11111111A', 'imagenes/1639224965-leon.jpg'),
(2, 'elefante', 'mamífero hervívoro', 'hembra', '2011-02-12', 'India', 'Asia', '22222222B', 'imagenes/1639224970-elefante.jpg'),
(5, 'tigre', 'mamífero carnivoro', 'hembra', '2009-02-12', 'India', 'Asia', '11111111A', 'imagenes/1639224961-tigre.jpg'),
(6, 'jirafa', 'mamífero hervívoro', 'macho', '2012-02-22', 'Mali', 'Africa', '22222222B', 'imagenes/1639224975-jirafa.jpg'),
(7, 'pinguino', 'mamifero', 'hembra', '2021-12-06', 'Nueva Zelanda', 'Oceanía', '11111111A', 'imagenes/1639567209-pinguino.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal_jaula`
--

CREATE TABLE `animal_jaula` (
  `codigo_animal` int(11) NOT NULL,
  `codigo_jaula` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `animal_jaula`
--

INSERT INTO `animal_jaula` (`codigo_animal`, `codigo_jaula`, `fecha_ingreso`, `fecha_salida`) VALUES
(1, 1, '2019-01-13', '2021-12-13'),
(1, 3, '2018-10-14', '2021-12-13'),
(1, 12, '2021-12-13', NULL),
(2, 3, '2018-11-18', NULL),
(5, 1, '2018-11-18', '2018-12-11'),
(5, 3, '2018-12-11', NULL),
(6, 3, '2018-10-29', NULL),
(7, 2, '2021-12-15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jaula`
--

CREATE TABLE `jaula` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `caracteristicas` varchar(50) NOT NULL,
  `ubicacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jaula`
--

INSERT INTO `jaula` (`codigo`, `tipo`, `caracteristicas`, `ubicacion`) VALUES
(1, 'Barrotes', 'Jaula con barrotes para leones', 'Zona sur'),
(2, 'Cristalera', 'Jaula de cristalera para pinguinos', 'Zona norte'),
(3, 'Barrotes', 'Jaula con barrotes para elefantes', 'Zona este'),
(4, 'Abierta', 'Jaula abierta para animales no peligrosos', 'Zona oeste'),
(5, 'Barrotes', 'Jaula con barrotes para tigres', 'Zona sur'),
(6, 'Barrotes', 'Jaula con barrotes para leones', 'Zona norte'),
(7, 'Barrotes', 'Jaula con barrotes para tigres', 'Zona norte'),
(8, 'Barrotes', 'Jaula con barrotes para elefantes', 'Zona oeste'),
(9, 'Abierta', 'Jaula abierta para animales no peligrosos', 'Zona este'),
(10, 'Abierta', 'Jaula abierta para animales no peligrosos', 'Zona este'),
(11, 'Barrotes', 'Jaula con barrotes para jirafas', 'Zona este'),
(12, 'Barrotes', 'Jaula con barrotes para jirafas', 'Zona oeste'),
(13, 'Cristalera', 'Jaula de cristalera para pinguinos', 'Zona sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `intentos` int(11) NOT NULL,
  `bloqueado` tinyint(4) NOT NULL,
  `hora_bloqueo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`dni`, `nombre`, `apellidos`, `pass`, `intentos`, `bloqueado`, `hora_bloqueo`) VALUES
('11111111A', 'Pepe', 'Lopez Martinez', '926e27eecdbc7a18858b3798ba99bddd', 3, 0, 0),
('22222222B', 'Juan', 'Carpio Baena', 'a94652aa97c7211ba8954dd15a3cf838', 3, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `responsable_animal` (`dni_responsable`);

--
-- Indices de la tabla `animal_jaula`
--
ALTER TABLE `animal_jaula`
  ADD PRIMARY KEY (`codigo_animal`,`codigo_jaula`,`fecha_ingreso`) USING BTREE,
  ADD KEY `animal_jaula_ibfk_1` (`codigo_jaula`);

--
-- Indices de la tabla `jaula`
--
ALTER TABLE `jaula`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`dni`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `responsable_animal` FOREIGN KEY (`dni_responsable`) REFERENCES `responsable` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `animal_jaula`
--
ALTER TABLE `animal_jaula`
  ADD CONSTRAINT `animal_jaula_ibfk_1` FOREIGN KEY (`codigo_jaula`) REFERENCES `jaula` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_jaula_ibfk_2` FOREIGN KEY (`codigo_animal`) REFERENCES `animal` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
