-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2023 a las 04:15:17
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
-- Estructura de tabla para la tabla `historietas`
--

CREATE TABLE `historietas` (
  `id` int(11) NOT NULL,
  `imgUrl` varchar(555) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `titlestory` varchar(100) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `descripcion` varchar(305) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `historietas`
--

INSERT INTO `historietas` (`id`, `imgUrl`, `usuario`, `titlestory`, `genero`, `descripcion`) VALUES
(123, '../Historietas/Luisa123/hola mamadd/6476de1bd41ca_Logo UTADEO vertical.jpg', 'Luisa123', 'hola mamadd', 'fantasía', 'ddd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_historieta` int(100) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `imgUrl` varchar(500) NOT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `titlestory` varchar(200) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `emocion` set('feliz','neutral','triste','sorprendido','enojado','asqueado','asustado','N/A') NOT NULL DEFAULT 'N/A',
  `genero` enum('aventuras','fantasía','ciencia ficción','superhéroes','humor','misterio','históricas') NOT NULL,
  `climax` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_historieta`, `parent`, `imgUrl`, `usuario`, `titlestory`, `Descripcion`, `emocion`, `genero`, `climax`) VALUES
(668, 1, NULL, '../Historietas/Luisa123/hola mamadd/6476de24ab8fe_domo.utadeo.1.jpg', 'Luisa123', 'hola mamadd', '', 'N/A', 'fantasía', 0),
(669, 2, 1, '../Historietas/Luisa123/hola mamadd/6476de3162a7e_color.jpg', 'Luisa123', 'hola mamadd', '', 'N/A', 'fantasía', 0),
(670, 3, 2, '../Historietas/Luisa123/hola mamadd/6476de4db121b_IMG-20150923-WA001.jpg', 'Luisa123', 'hola mamadd', '', 'feliz,neutral,triste', 'aventuras', 1),
(671, 4, 2, '../Historietas/Luisa123/hola mamadd/6476de4db121e_SAM_3746.JPG', 'Luisa123', 'hola mamadd', '', 'sorprendido,enojado,asqueado', 'aventuras', 1),
(672, 5, 3, '../Historietas/Luisa123/hola mamadd/6476e017a5da5_SAM_3746.JPG', 'Luisa123', 'hola mamadd', '', 'N/A', 'fantasía', 0),
(673, 6, 5, '../Historietas/Luisa123/hola mamadd/6476e02022950_IMG-20140526-00111.jpg', 'Luisa123', 'hola mamadd', '', 'N/A', 'fantasía', 0),
(674, 7, 6, '../Historietas/Luisa123/hola mamadd/6476e0463c043_IMG-20150923-WA001.jpg', 'Luisa123', 'hola mamadd', '', 'feliz,neutral,triste,sorprendido,enojado,asqueado', 'aventuras', 1),
(675, 8, 6, '../Historietas/Luisa123/hola mamadd/6476e0463c047_IMG-20150923-WA001.jpg', 'Luisa123', 'hola mamadd', '', '', 'aventuras', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombreusuario` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `correo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombreusuario`, `nombre`, `contrasena`, `correo`) VALUES
(11, 'Luisa123', 'luiosa', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'luisa@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historietas`
--
ALTER TABLE `historietas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historietas`
--
ALTER TABLE `historietas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=676;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
