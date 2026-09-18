-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2019 a las 22:13:17
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog-php`
--


--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `dominio` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `palabras_claves` text NOT NULL,
  `portada` text NOT NULL,
  `email` text NOT NULL,
  `logo` text NOT NULL,
  `icono` text NOT NULL,
  `redes_sociales` text NOT NULL,
  `sobre_mi` text NOT NULL,
  `sobre_mi_completo` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `dominio`, `titulo`, `descripcion`, `palabras_claves`, `portada`, `email`, `logo`, `icono`, `redes_sociales`, `sobre_mi`, `sobre_mi_completo`, `fecha`) VALUES
(1, 'http://localhost/mvc_primitiva/', 'Nuestras Apuestas BETA', 'Bienvenidos a Nuestras Apuestas: web dedicada al control del grupo de apostantes.', '[\"lorem\", \"ipsum\", \"dolor\", \"sit\", \"amet\"]', 'vistas/img/articulo01.png', 'contacto@blogdelviajero.com', 'vistas/img/logotipo-negativo.png', 'vistas/img/icono.jpg', '[\r\n{\"red\":\"facebook\",\"url\":\"https://www.facebook.com\", \"icono\":\"fab fa-facebook-f\", \"background\":\"#1475E0\"},\r\n{\"red\":\"instagram\",\"url\":\"https://www.instagram.com\", \"icono\":\"fab fa-instagram\", \"background\":\"#B18768\"},\r\n{\"red\":\"twitter\",\"url\":\"https://www.twitter.com\", \"icono\":\"fab fa-twitter\", \"background\":\"#00A6FF\"},\r\n{\"red\":\"youtube\",\"url\":\"https://www.youtube.com\", \"icono\":\"fab fa-youtube\", \"background\":\"#F95F62\"},\r\n{\"red\":\"snapchat\",\"url\":\"https://www.snapchat.com\", \"icono\":\"fab fa-snapchat-ghost\", \"background\":\"#FF9052\"}\r\n]', '<div class=\"sobreMi\">\r\n					\r\n					<h4><a href=\"http://localhost/blog-php/sobre-mi\">Sobre Mi</a></h4>\r\n\r\n					<img src=\"vistas/img/sobreMi.jpg\" alt=\"Lorem ipsum dolor sit amet\" class=\"img-fluid my-1\">\r\n\r\n					<p class=\"small\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.</p>\r\n\r\n				</div>', '<div> <h1>Sobre Mi</h1><img src=\"vistas/img/sobreMi.jpg\" alt=\"Lorem ipsum dolor sit amet\" class=\"img-fluid my-2\" width=\"100%\">  	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.  	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit culpa mollitia cupiditate natus iusto! Commodi odio ipsum modi nesciunt pariatur quod aut aliquid sint repellendus, deleniti, possimus, expedita qui ad.</p>  	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.  	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit culpa mollitia cupiditate natus iusto! Commodi odio ipsum modi nesciunt pariatur quod aut aliquid sint repellendus, deleniti, possimus, expedita qui ad.</p>  </div>', '2019-11-08 01:12:39');


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


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
