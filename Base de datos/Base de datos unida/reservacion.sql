-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 13-05-2022 a las 07:03:13
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
-- Estructura de tabla para la tabla `reservacion`
--

DROP TABLE IF EXISTS `reservacion`;
CREATE TABLE IF NOT EXISTS `reservacion` (
  `Res_Telefono` int(8) NOT NULL,
  `Clien_User` varchar(30) DEFAULT NULL,
  `Res_Nombre` varchar(30) DEFAULT NULL,
  `Res_Email` varchar(100) DEFAULT NULL,
  `Res_Cantidad` int(11) DEFAULT NULL,
  `Res_Fecha` date DEFAULT NULL,
  `Res_Hora` time DEFAULT NULL,
  PRIMARY KEY (`Res_Telefono`),
  KEY `Clien_User` (`Clien_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`Res_Telefono`, `Clien_User`, `Res_Nombre`, `Res_Email`, `Res_Cantidad`, `Res_Fecha`, `Res_Hora`) VALUES
(25413612, 'ElmerGGG', 'GABRIEL', 'steve@gmail.com', 10, '2022-05-26', '17:00:00'),
(25413644, 'ElmerGGG', 'Elmer Garcia', 'elmer@gmail.com', 6, '2022-06-03', '16:00:00'),
(74563218, 'ElmerG23', 'Steven Grand', 'steve@gmail.com', 9, '2022-05-19', '12:00:00'),
(78941245, 'TONYsOPRANO', 'Marlon Garcia', 'Marlon@gmail.com', 9, '2022-06-03', '15:00:00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`Clien_User`) REFERENCES `clientes` (`Clien_User`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
