-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-01-2016 a las 03:03:36
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE IF NOT EXISTS `aula` (
  `id_aula` varchar(2) NOT NULL,
  `grado` varchar(10) NOT NULL,
  `seccion` varchar(1) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'DISPONIBLE',
  PRIMARY KEY (`id_aula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id_aula`, `grado`, `seccion`, `estado`) VALUES
('1A', '1ero', 'A', 'DISPONIBLE'),
('1B', '1ero', 'B', 'DISPONIBLE'),
('1C', '1ero', 'C', 'DISPONIBLE'),
('1D', '1ero', 'D', 'DISPONIBLE'),
('2A', '2do', 'A', 'DISPONIBLE'),
('2B', '2do', 'B', 'DISPONIBLE'),
('2C', '2do', 'C', 'DISPONIBLE'),
('2D', '2do', 'D', 'DISPONIBLE'),
('3A', '3ero', 'A', 'DISPONIBLE'),
('3B', '3ero', 'B', 'DISPONIBLE'),
('3C', '3ero', 'C', 'DISPONIBLE'),
('3D', '3ero', 'D', 'DISPONIBLE'),
('4A', '4to', 'A', 'DISPONIBLE'),
('4B', '4to', 'B', 'DISPONIBLE'),
('4C', '4to', 'C', 'DISPONIBLE'),
('4D', '4to', 'D', 'DISPONIBLE'),
('5A', '5to', 'A', 'DISPONIBLE'),
('5B', '5to', 'B', 'DISPONIBLE'),
('5C', '5to', 'C', 'DISPONIBLE'),
('5D', '5to', 'D', 'DISPONIBLE'),
('6A', '6to', 'A', 'DISPONIBLE'),
('6B', '6to', 'B', 'DISPONIBLE'),
('6C', '6to', 'C', 'DISPONIBLE'),
('6D', '6to', 'D', 'DISPONIBLE'),
('P1', 'PREESCOLAR', 'A', 'DISPONIBLE'),
('P2', 'PREESCOLAR', 'B', 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `ano_escolar` varchar(11) NOT NULL,
  `director` varchar(30) NOT NULL,
  `cedula_director` int(11) NOT NULL,
  `cargar_notas` int(1) NOT NULL,
  UNIQUE KEY `ano_escolar` (`ano_escolar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`ano_escolar`, `director`, `cedula_director`, `cargar_notas`) VALUES
('2016 - 2017', 'SALINAS YRAIDA', 9870226, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `cedula_r` int(11) NOT NULL,
  `vinculo_r` varchar(20) NOT NULL,
  `cedula_es` varchar(12) NOT NULL,
  `nombre_es` varchar(30) NOT NULL,
  `apellido_es` varchar(30) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_nacimiento` varchar(10) NOT NULL,
  `lugar_nacimiento` varchar(50) NOT NULL,
  PRIMARY KEY (`cedula_es`),
  KEY `cedula_r` (`cedula_r`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`cedula_r`, `vinculo_r`, `cedula_es`, `nombre_es`, `apellido_es`, `sexo`, `fecha_nacimiento`, `lugar_nacimiento`) VALUES
(10519892, 'TIO(a)', 'V11410519892', 'TITO', 'JUANES', 'M', '19/12/2014', 'TACHIRA'),
(10519897, 'MADRE', 'V11410519897', 'MANUEL ALEJANDRO', 'CASTRO QUINTERO', 'M', '15/12/2014', 'CARACAS'),
(10519897, 'TIO(a)', 'V21410519897', 'ANYELY', 'SILVA', 'F', '19/12/1995', 'ZULIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE IF NOT EXISTS `historico` (
  `id_inscripcion` int(10) NOT NULL,
  `nota_final` varchar(2) NOT NULL,
  UNIQUE KEY `id_inscripcion` (`id_inscripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`id_inscripcion`, `nota_final`) VALUES
(8, ''),
(9, ''),
(11, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `id_inscripcion` int(10) NOT NULL AUTO_INCREMENT,
  `id_aula` varchar(10) NOT NULL,
  `cedula_es` varchar(12) NOT NULL,
  `escolaridad` varchar(2) NOT NULL,
  `ano_escolar` varchar(11) NOT NULL,
  PRIMARY KEY (`id_inscripcion`),
  KEY `id_aula` (`id_aula`),
  KEY `cedula_es` (`cedula_es`),
  KEY `ano_escolar` (`ano_escolar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id_inscripcion`, `id_aula`, `cedula_es`, `escolaridad`, `ano_escolar`) VALUES
(8, '1A', 'V11410519892', 'RG', '2016 - 2017'),
(9, 'P1', 'V11410519897', 'RG', '2016 - 2017'),
(11, 'P1', 'V21410519897', 'RG', '2016 - 2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE IF NOT EXISTS `representante` (
  `cedula_r` int(11) NOT NULL,
  `nombre_r` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido_r` varchar(30) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  PRIMARY KEY (`cedula_r`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`cedula_r`, `nombre_r`, `apellido_r`, `estado_civil`, `direccion`, `telefono`) VALUES
(10519892, 'ESMERALDA', 'PAEZ RAMOS', 'CASADO(a)', 'URB. LA TRINIDAD', '02123413885'),
(10519897, 'RAMONA', 'PEREZ', 'SOLTERO(a)', 'URB. LA TRINIDAD', '02473413885');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usr_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usr_nivel` int(1) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`login`, `pass`, `usr_nombre`, `usr_nivel`) VALUES
('mariangela', '202cb962ac59075b964b07152d234b70', 'Mariangel NuÃ±ez', 1),
('Pedro', '202cb962ac59075b964b07152d234b70', 'Pedro Nunez', 2),
('susana', '202cb962ac59075b964b07152d234b70', 'Susana Nunez', 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`cedula_r`) REFERENCES `representante` (`cedula_r`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_2` FOREIGN KEY (`id_inscripcion`) REFERENCES `inscripcion` (`id_inscripcion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_3` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_ibfk_4` FOREIGN KEY (`cedula_es`) REFERENCES `estudiante` (`cedula_es`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
