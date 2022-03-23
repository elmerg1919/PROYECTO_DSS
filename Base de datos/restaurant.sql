-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3309
-- Tiempo de generación: 23-03-2022 a las 04:52:38
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurant`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `Admin_User` varchar(30) NOT NULL,
  `Admin_Contra` varchar(30) NOT NULL,
  PRIMARY KEY (`Admin_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `Clien_User` varchar(30) NOT NULL,
  `Clien_Contra` varchar(30) NOT NULL,
  `Clien_Nombre` varchar(30) NOT NULL,
  `Clien_Apellido` varchar(30) NOT NULL,
  `Admin_User` varchar(30) NOT NULL,
  PRIMARY KEY (`Clien_User`),
  KEY `Admin_User` (`Admin_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillo`
--

DROP TABLE IF EXISTS `platillo`;
CREATE TABLE IF NOT EXISTS `platillo` (
  `Plat_Codigo` int(11) NOT NULL,
  `Admin_User` varchar(30) NOT NULL,
  `Plat_Nombre` varchar(30) NOT NULL,
  `Plat_Categoria` varchar(25) NOT NULL,
  `Plat_Imagen` mediumblob NOT NULL,
  PRIMARY KEY (`Plat_Codigo`),
  KEY `Admin_User` (`Admin_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

DROP TABLE IF EXISTS `reservacion`;
CREATE TABLE IF NOT EXISTS `reservacion` (
  `Res_Telefono` int(7) NOT NULL,
  `Clien_User` varchar(30) NOT NULL,
  `Res_Nombre` varchar(30) NOT NULL,
  `Res_Email` varchar(100) NOT NULL,
  `Res_Cantidad` int(11) NOT NULL,
  `Res_Fecha` date NOT NULL,
  `Res_Hora` time NOT NULL,
  PRIMARY KEY (`Res_Telefono`),
  KEY `Clien_User` (`Clien_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`Admin_User`) REFERENCES `administrador` (`Admin_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `platillo`
--
ALTER TABLE `platillo`
  ADD CONSTRAINT `platillo_ibfk_1` FOREIGN KEY (`Admin_User`) REFERENCES `administrador` (`Admin_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`Clien_User`) REFERENCES `clientes` (`Clien_User`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
