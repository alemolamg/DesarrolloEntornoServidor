-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 27-11-2021 a las 10:50:13
-- Versión del servidor: 5.7.34
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dwes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fechaNac` date NOT NULL,
  `departamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`user`, `pass`, `nombre`, `apellidos`, `fechaNac`, `departamento`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'administrador', '', '0000-00-00', 'Informatica'),
('alemol', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 'Alejandro', 'Molero Gómez', '1998-03-25', 'Informatica'),
('arosa', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 'Antonio', 'De La Rosa', '1980-01-01', 'Informatica'),
('sojea', '81dc9bdb52d04dc20036dbd8313ed055', 'Sabrina Soledad', 'Ojea Chapelet', '1994-11-27', 'Informatica'),
('usu123', '202cb962ac59075b964b07152d234b70', 'usu123', '123', '2014-09-03', 'Pruebas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
