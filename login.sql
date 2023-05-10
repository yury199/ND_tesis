-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2023 a las 14:53:52
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
-- Estructura de tabla para la tabla `tabla_demo`
--

CREATE TABLE `tabla_demo` (
  `id` int(11) NOT NULL,
  `nombres` varchar(25) NOT NULL,
  `apellidos` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tabla_demo`
--

INSERT INTO `tabla_demo` (`id`, `nombres`, `apellidos`) VALUES
(3, 'Juan Maria', 'Albarracin Flores'),
(4, 'Meliza Estela', 'Loza Morales'),
(5, 'Mario', 'Ruiz Sotomayor'),
(6, 'Luisa Eugenia', 'Candia Quintana'),
(7, 'Nohelia Maria', 'Valdivia Valdivia'),
(8, 'Nilda Elena', 'Castillo Garcia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_imgs`
--

CREATE TABLE `tabla_imgs` (
  `IDimg` int(11) NOT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `nomenclatura` varchar(150) NOT NULL,
  `Enlace` varchar(250) NOT NULL,
  `titlestory` varchar(200) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `emocion` set('feliz','neutral','triste','sorprendido','enojado','asqueado','soprendido','N/A') NOT NULL DEFAULT 'N/A',
  `genero` enum('aventuras','fantasía','ciencia ficción','superhéroes','humor','misterio','históricas') NOT NULL,
  `nivel` int(11) DEFAULT 1,
  `num_recorrido` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tabla_imgs`
--

INSERT INTO `tabla_imgs` (`IDimg`, `usuario`, `nomenclatura`, `Enlace`, `titlestory`, `Descripcion`, `emocion`, `genero`, `nivel`, `num_recorrido`) VALUES
(1, 'Luisa123', 'N0-D0-0', '../IMG/N0-D0-0.jpg', 'El camaleón', 'Lorem Ipsum is simply dummy text of the printing ', 'N/A', 'aventuras', 0, 0),
(2, 'Luisa123', 'N1-D0-1', '../IMG/N1-D0-1.jpg', 'El camaleón', 'blablabla', 'N/A', 'aventuras', 1, 1),
(3, 'Luisa123', 'N1-D0-2', '../IMG/N1-D0-2.jpg', 'El camaleón', 'blablabla', 'N/A', 'aventuras', 1, 2),
(4, 'Luisa123', 'N2-D1-0', '../IMG/N2-D1-0.jpg', 'El camaleón', 'blablabla', 'sorprendido,enojado,asqueado', 'aventuras', 2, 0),
(5, 'Luisa123', 'N2-D2-1', '../IMG/N2-D2-1.jpg', 'El camaleón', 'blablabla', 'feliz,neutral,triste,sorprendido', 'aventuras', 2, 1),
(6, 'Luisa123', 'N2-D2-0', '../IMG/N2-D2-0.jpg', 'El camaleón', 'blablabla', 'feliz,neutral,triste,sorprendido', 'aventuras', 2, 0),
(7, 'Luisa123', 'N2-D2-1', '../IMG/N2-D2-1.jpg', 'El camaleón', 'blablabla', 'feliz,neutral,triste,sorprendido', 'aventuras', 2, 1),
(8, 'Luisa123', 'N3-D1-0', '../IMG/N3-D1-0.jpg', 'El camaleón', 'blablabla', 'sorprendido,enojado,asqueado', 'aventuras', 3, 0),
(32, 'luis123', 'N0-D0-0', '../IMG/cd.jpg', 'Dona', 'desfrghdegdrfg', 'N/A', 'aventuras', 0, 0),
(45, 'Luisa123', 'N1-D0-0', '../IMG/N1-D0-0.jpg', 'El camaleón', 'blablablaggggggg', 'N/A', 'aventuras', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_images`
--

CREATE TABLE `table_images` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `fregis` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `table_images`
--

INSERT INTO `table_images` (`id`, `images`, `fregis`) VALUES
(10, '1300936380.jpg', '2021-07-29 20:57:01'),
(11, '1779071970.jpg', '2021-07-29 20:57:19'),
(12, '1893039121.jpg', '2021-07-29 20:57:19'),
(13, '641042864.jpg', '2021-07-29 20:57:19'),
(14, '1087870570.png', '2021-07-29 20:57:19'),
(15, '410902717.jpg', '2021-07-29 20:57:36'),
(16, '1810107081.jpg', '2023-05-02 05:30:50'),
(18, '2142171397.png', '2023-05-02 05:30:50'),
(19, '1019580283.jpg', '2023-05-02 05:30:50'),
(20, '1072354926.jpg', '2023-05-02 05:30:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tree_table`
--

CREATE TABLE `tree_table` (
  `node_id` int(11) NOT NULL,
  `parent_node_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `option_1_node_id` int(11) DEFAULT NULL,
  `option_2_node_id` int(11) DEFAULT NULL,
  `tree_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `correo`, `usuario`, `pass`) VALUES
(5, 'Luisa Muñoz', 'Luisa@gmail.com', 'Luisa123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(6, 'Juan Torres', 'juan@gmail.com\r\n', 'Juan123', '123'),
(9, 'yuri', 'yuri@gmail.com', 'yu12', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(10, 'rr', 'rr', 'rr', '843cbacc61c8fe45886819ff1516e2e179374496'),
(11, 'hgjg', 'ghj', 'ghjgh', '6a0abec765bc2478545f392b9406799cbc0fd419'),
(12, 'dfdf', 'df', 'dfdfff', '4a8a9fc31dc15a4b87bb145b05db3ae0bf2333e4'),
(13, 'Sofia avella', 'avella@gmail.com', 'avella', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombreusuario` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `apellido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombreusuario`, `nombre`, `contrasena`, `correo`, `apellido`) VALUES
(4, 'avella', 'Sofia avella', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'avella@gmail.com', ''),
(8, 'we', 'Luisa123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'luui', ''),
(9, 'luis123', 'luis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'luis@gmail.com', ''),
(10, 'ww334411', 'wee', '5dcbd42e34fdbcaa9d29cc135dc1c7b6fe43c0ab', 'sfdsfdfg@gmail.com', ''),
(11, 'Luisa123', 'luiosa', '621bc7e7e40f8ef80be1af6e3549275fec165a5b', 'luisa@gmail.com', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_demo`
--
ALTER TABLE `tabla_demo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla_imgs`
--
ALTER TABLE `tabla_imgs`
  ADD PRIMARY KEY (`IDimg`);

--
-- Indices de la tabla `table_images`
--
ALTER TABLE `table_images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tree_table`
--
ALTER TABLE `tree_table`
  ADD PRIMARY KEY (`node_id`),
  ADD KEY `parent_node_id` (`parent_node_id`),
  ADD KEY `option_1_node_id` (`option_1_node_id`),
  ADD KEY `option_2_node_id` (`option_2_node_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT de la tabla `tabla_demo`
--
ALTER TABLE `tabla_demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tabla_imgs`
--
ALTER TABLE `tabla_imgs`
  MODIFY `IDimg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `table_images`
--
ALTER TABLE `table_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tree_table`
--
ALTER TABLE `tree_table`
  ADD CONSTRAINT `tree_table_ibfk_1` FOREIGN KEY (`parent_node_id`) REFERENCES `tree_table` (`node_id`),
  ADD CONSTRAINT `tree_table_ibfk_2` FOREIGN KEY (`option_1_node_id`) REFERENCES `tree_table` (`node_id`),
  ADD CONSTRAINT `tree_table_ibfk_3` FOREIGN KEY (`option_2_node_id`) REFERENCES `tree_table` (`node_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
