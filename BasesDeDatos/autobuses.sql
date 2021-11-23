-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 17:03:19
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
-- Base de datos: `autobuses`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `Matricula` varchar(6) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Num_plazas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`Matricula`, `Marca`, `Num_plazas`) VALUES
('345CXD', 'Renault', 60),
('427BCF', 'Opel', 60),
('647CAB', 'Ford', 60),
('776SCD', 'Renault', 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `Fecha` date NOT NULL,
  `Matricula` varchar(6) NOT NULL,
  `Origen` varchar(20) NOT NULL,
  `Destino` varchar(20) NOT NULL,
  `Plazas_libres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`Fecha`, `Matricula`, `Origen`, `Destino`, `Plazas_libres`) VALUES
('2016-01-01', '345CXD', 'Madrid', 'Malaga', 20),
('2016-01-01', '647CAB', 'Malaga', 'Sevilla', 12),
('2016-01-01', '776SCD', 'Madrid', 'Barcelona', 30),
('2016-01-02', '345CXD', 'Madrid', 'Malaga', 8),
('2016-01-03', '427BCF', 'Cordoba', 'Malaga', 21),
('2016-01-03', '776SCD', 'Madrid', 'Huelva', 18);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`Matricula`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`Fecha`,`Matricula`,`Origen`,`Destino`),
  ADD KEY `Matricula` (`Matricula`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`Matricula`) REFERENCES `autos` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
