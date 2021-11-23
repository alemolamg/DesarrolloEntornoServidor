-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 17:03:42
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dorsal` int(11) NOT NULL,
  `posicion` set('Portero','Defensa','Centrocampista','Delantero') NOT NULL DEFAULT '',
  `equipo` varchar(50) NOT NULL,
  `numGoles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `dni`, `nombre`, `dorsal`, `posicion`, `equipo`, `numGoles`) VALUES
(1, '1A', 'Sabrina', 1, 'Centrocampista', 'Equipo 1', 20),
(2, '99999999N', 'Carlos Nueve', 9, 'Delantero', 'Equipo 9', 99),
(3, '22J', 'Pedro Muro', 4, 'Portero', 'Equipo 1', 2),
(5, '22L', 'Leon Ball', 2, 'Portero', 'Equipo 1', 0),
(6, '70ADR', 'Antonio ', 10, 'Delantero', 'Equipazo FC', 100),
(7, '5075D', 'Pablo Di Natale', 8, 'Centrocampista', 'Inter', 34),
(8, '11111111J', 'Jugador 1', 1, 'Delantero', 'Equipo 1', 18),
(9, '88888888J', 'Andresito', 8, 'Delantero', 'Equipazo FC', 100),
(10, '33333333j', 'Mauro Rodriguez', 6, 'Defensa', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
