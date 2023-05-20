-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2023 a las 05:43:00
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
  `user` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `imgUrl` varchar(500) NOT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `titlestory` varchar(200) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `emocion` set('feliz','neutral','triste','sorprendido','enojado','asqueado','soprendido','N/A') NOT NULL DEFAULT 'N/A',
  `genero` enum('aventuras','fantasía','ciencia ficción','superhéroes','humor','misterio','históricas') NOT NULL,
  `climax` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_historieta`, `user`, `parent`, `imgUrl`, `usuario`, `titlestory`, `Descripcion`, `emocion`, `genero`, `climax`) VALUES
(205, 1, '', NULL, 'Historietas/Luisa123/El camaleón/646840ed0e28e_', 'Luisa123', 'El camaleón', 'etyyt', 'N/A', 'aventuras', 0),
(206, 2, '', 1, '../Historietas/Luisa123/El camaleón/64683e2ca050d_btn_acceso.png', 'Luisa123', 'El camaleón', 'rr', 'feliz,triste,sorprendido,enojado,asqueado,soprendido', 'aventuras', 1),
(207, 3, '', 1, '../Historietas/Luisa123/El camaleón/64683e2ca0511_btn_ins_asig.png', 'Luisa123', 'El camaleón', 'soy limon', 'neutral', 'aventuras', 1),
(208, 4, '', 2, '../Historietas/Luisa123/El camaleón/64684106e99d1_IMG_20140427_134118815.jpg', 'Luisa123', 'El camaleón', 'soy toroja', 'feliz,triste,sorprendido,enojado,asqueado,soprendido', 'aventuras', 1),
(209, 5, '', 2, '../Historietas/Luisa123/El camaleón/64684106e99d4_IMG-20140526-00111.jpg', 'Luisa123', 'El camaleón', 'soy limon', 'neutral', 'aventuras', 1),
(210, 6, '', 5, '../Historietas/Luisa123/El camaleón/6468410fb3742_IMG-20150923-WA001.jpg', 'Luisa123', 'El camaleón', 'rrr', 'N/A', 'aventuras', 0),
(211, 7, '', 6, '../Historietas/Luisa123/El camaleón/6468411a80ab0_IMG-20150923-WA001.jpg', 'Luisa123', 'El camaleón', 'dgfdg', 'N/A', 'aventuras', 0),
(212, 8, '', 3, '../Historietas/Luisa123/El camaleón/646841242d075_IMG_20140427_134118815.jpg', 'Luisa123', 'El camaleón', '', 'N/A', 'aventuras', 0),
(213, 9, '', 8, '../Historietas/Luisa123/El camaleón/6468412eec50a_SAM_3746.JPG', 'Luisa123', 'El camaleón', 'dgfdg', 'N/A', 'aventuras', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
