-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-09-2026 a las 12:45:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `primitiva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `palabras_claves` text NOT NULL,
  `email` text NOT NULL,
  `logo` text NOT NULL,
  `icono` text NOT NULL,
  `dominio` text NOT NULL,
  `saldominimo` int(11) NOT NULL,
  `rangoanoini` int(11) NOT NULL,
  `rangoanofin` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `titulo`, `descripcion`, `palabras_claves`, `email`, `logo`, `icono`, `dominio`, `saldominimo`, `rangoanoini`, `rangoanofin`, `fecha`) VALUES
(1, 'Nuestras Apuestas BETA', 'Bienvenidos a Nuestras Apuestas: web dedicada al control del grupo de apostantes.', '[\"primitiva\", \"euromillones\", \"loteria nacional\", \"el gordo\", \"sorteos\"]', 'nuestrasapuestatresynueves@bnuestrasapuestas.es', 'vistas/img/nuestrasapuestas-logo.svg', 'vistas/img/favicon.ico', 'http://localhost/', 3, 2003, 2026, '2026-09-26 10:29:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
