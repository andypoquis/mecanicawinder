-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2022 a las 03:23:07
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mecanicawinder`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_identificarUsuario` (IN `pUsuario` VARCHAR(20), IN `pPassword` VARCHAR(50))  BEGIN
	SELECT USU.id, USU.usuario, 
    PER.id, PER.apellidopaterno, PER.apellidomaterno, PER.nombres, PER.dni, 
    PER.fechanacimiento, PER.sexo, ROL.id, ROL.nombre
	FROM usuario USU 
    JOIN persona PER ON USU.persona_id = PER.id
    JOIN rolusuario ROL ON USU.rolusuario_id = ROL.id
    WHERE PER.vigencia = 1 
    AND USU.usuario = pUsuario
    AND CAST(AES_DECRYPT(USU.password, 'c_9*?r8[1¿!{r3M.@r8]') AS CHAR(50)) = pPassword
    AND USU.vigencia = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtenerCoincidenciasNombreUsuario` (IN `pUsuario` VARCHAR(20))  BEGIN
	SELECT COUNT(usuario) FROM usuario WHERE usuario LIKE CONCAT(pUsuario, '%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrarUsuario` (IN `pPersonaId` SMALLINT(4), IN `pRolUsuarioId` TINYINT(1), IN `pUsuario` VARCHAR(20))  BEGIN
	INSERT INTO usuario (persona_id, rolusuario_id, usuario, password) 
    VALUES (pPersonaId, pRolUsuarioId, pUsuario, AES_ENCRYPT('abc123', 'c_9*?r8[1¿!{r3M.@r8]'));
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` smallint(4) UNSIGNED NOT NULL,
  `apellidopaterno` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apellidomaterno` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dni` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `fechanacimiento` date NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'F',
  `vigencia` tinyint(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `apellidopaterno`, `apellidomaterno`, `nombres`, `dni`, `fechanacimiento`, `sexo`, `vigencia`) VALUES
(1, 'García', 'Fuentes', 'Oscar Alejandro', '45998801', '1992-03-09', 'M', 1),
(2, 'Arias', 'Palomino', 'Julissa María', '11122294', '1996-07-19', 'F', 1),
(3, 'Uribe', 'Castro', 'Juan Andrés', '55566691', '1993-01-21', 'M', 1),
(4, 'Sánchez', 'Pucce', 'Sergio Antonio', '28532814', '1996-01-15', 'M', 1),
(5, 'Jiménez', 'Talledo', 'Vivian Elizabeth', '35834295', '1994-09-15', 'F', 1),
(6, 'Irigoín', 'Vásquez', 'Manuel Alejandro', '21532851', '1993-06-19', 'M', 1),
(7, 'Herrera', 'Llontop', 'Esteban', '43635464', '1990-04-21', 'M', 1),
(8, 'Benavides', 'Lara', 'Hugo Alberto', '30925824', '1998-06-19', 'M', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolusuario`
--

CREATE TABLE `rolusuario` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `nombre` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rolusuario`
--

INSERT INTO `rolusuario` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'tecnico'),
(3, 'Cajero'),
(4, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` smallint(4) UNSIGNED NOT NULL,
  `persona_id` smallint(4) UNSIGNED NOT NULL,
  `rolusuario_id` tinyint(1) UNSIGNED NOT NULL,
  `usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` blob NOT NULL,
  `vigencia` tinyint(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `persona_id`, `rolusuario_id`, `usuario`, `password`, `vigencia`) VALUES
(1, 1, 1, 'OGARCIA', 0x22734ade10dbfda71a50d38ef6afb1d9, 1),
(2, 2, 2, 'JARIAS', 0x22734ade10dbfda71a50d38ef6afb1d9, 1),
(3, 3, 3, 'JURIBE', 0x22734ade10dbfda71a50d38ef6afb1d9, 1),
(4, 4, 4, 'SSANCHEZ', 0x22734ade10dbfda71a50d38ef6afb1d9, 1),
(5, 5, 4, 'VJIMENEZ', 0x22734ade10dbfda71a50d38ef6afb1d9, 1),
(6, 6, 4, 'MIRIGOIN', 0x22734ade10dbfda71a50d38ef6afb1d9, 1),
(7, 7, 4, 'EHERRERA', 0x22734ade10dbfda71a50d38ef6afb1d9, 1),
(8, 8, 4, 'HBENAVIDES', 0x22734ade10dbfda71a50d38ef6afb1d9, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `rolusuario`
--
ALTER TABLE `rolusuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`,`rolusuario_id`,`usuario`),
  ADD KEY `rolusuario_id` (`rolusuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rolusuario`
--
ALTER TABLE `rolusuario`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`rolusuario_id`) REFERENCES `rolusuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
