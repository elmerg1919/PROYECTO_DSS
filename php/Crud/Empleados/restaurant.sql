-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-03-2022 a las 00:46:44
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
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_username` varchar(30) NOT NULL,
  `usuario_contra` varchar(300) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `correo_usuario` varchar(50) NOT NULL,
  `dui` char(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `numero_telefono` varchar(9) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `estado_usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id_username`),
  KEY `id_cargo` (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_username`, `usuario_contra`, `nombre_usuario`, `correo_usuario`, `dui`, `fecha_nacimiento`, `numero_telefono`, `genero`, `id_cargo`, `estado_usuario`) VALUES
('marlon', 'd9b1d7db4cd6e70935368a1efb10e377', 'Marlon Reagaleño', 'marlon@gmail.com', '00000000-0', '1999-12-12', '7665-9565', 'M', 1, 'D'),
('prueba', '7363a0d0604902af7b70b271a0b96480', 'Henry', 'prueba@gmail.com', '00000000-0', '2003-05-31', '7665-9565', 'M', 1, 'D'),
('prueba3', 'd9b1d7db4cd6e70935368a1efb10e377', 'Rafael Najarro Campos', 'correo@gmail.com', '00000000-0', '2003-05-31', '7665-9565', 'M', 1, 'H'),
('wwwwww', 'd9b1d7db4cd6e70935368a1efb10e377', 'Prueba12', 'prueba@gmail.com', '00000000-0', '2003-12-25', '6025-1829', 'M', 1, 'H');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`Admin_User`) REFERENCES `usuarios` (`id_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `platillo`
--
ALTER TABLE `platillo`
  ADD CONSTRAINT `platillo_ibfk_1` FOREIGN KEY (`Admin_User`) REFERENCES `usuarios` (`id_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`Clien_User`) REFERENCES `clientes` (`Clien_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
