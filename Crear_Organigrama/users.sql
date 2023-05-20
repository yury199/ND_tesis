-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2023 a las 02:58:28
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_historieta` int(100) NOT NULL,
  `nivel` int(100) NOT NULL,
  `user` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `imgUrl` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_historieta`, `nivel`, `user`, `parent`, `imgUrl`) VALUES
(1, 0, 1, 'M. D.', NULL, 'cargar.jpg'),
(2, 0, 0, 'Project manager', 1, 'cargar.jpg'),
(3, 0, 0, 'Project manager', 1, 'cargar.jpg'),
(4, 0, 0, 'Team Lead', 2, ''),
(9, 0, 0, 'Team Lead', 2, ''),
(12, 0, 0, 'Sr. Dev', 4, 'cargar.jpg'),
(13, 0, 0, 'Sr. Dev', 9, 'cargar.jpg'),
(14, 0, 0, 'Dev', 12, 'cargar.jpg'),
(15, 0, 0, 'Team Lead', 3, ''),
(16, 0, 0, 'Team Lead', 3, 'cargar.jpg'),
(17, 0, 0, 'hi', 0, 'cargar.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
