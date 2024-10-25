-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2024 a las 03:05:06
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prodes_libre`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco_proyecto`
--

CREATE TABLE `banco_proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_proyecto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `documento_adjunto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `presupuesto` decimal(15,2) NOT NULL,
  `resultados_esperados` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_ods` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `banco_proyecto`
--

INSERT INTO `banco_proyecto` (`id_proyecto`, `nombre_proyecto`, `descripcion_proyecto`, `documento_adjunto`, `fecha_inicio`, `fecha_final`, `presupuesto`, `resultados_esperados`, `ubicacion`, `id_ods`, `id_usuario`, `id_estado`) VALUES
(2, 'Fin de la pobreza', 'si e puede dejar la pobreza', 'fin de la pobreza.pdf', '2024-10-20', '2024-10-30', '1000000.00', 'si se puede', 'Colombia', 1, 1, 2),
(3, 'Voluntad de vida', 'Voluntad', 'voluntad de vida.pdf', '2024-10-20', '2025-10-20', '15000000.00', 'Buscar y asesorar para dar voluntad de vida', 'Colombia', 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_ods`
--

CREATE TABLE `entrada_ods` (
  `id_ods` int(11) NOT NULL,
  `nombre_ods` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `entrada_ods`
--

INSERT INTO `entrada_ods` (`id_ods`, `nombre_ods`) VALUES
(1, 'Fin de la pobreza'),
(2, 'Hambre cero'),
(3, 'Salud y bienestar'),
(4, 'Educacion de calidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_proyecto`
--

CREATE TABLE `estado_proyecto` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_estado` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estado_proyecto`
--

INSERT INTO `estado_proyecto` (`id_estado`, `estado`, `descripcion_estado`) VALUES
(1, 'C', 'CREADO'),
(2, 'A', 'APROBADO'),
(3, 'R', 'RECHAZADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prdcto` int(11) NOT NULL,
  `nombre_prdcto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valor_prdcto` decimal(15,2) NOT NULL,
  `descripcion_prdcto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_ods` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prdcto`, `nombre_prdcto`, `valor_prdcto`, `descripcion_prdcto`, `foto`, `id_ods`) VALUES
(4, 'Bicicletas electricas', '800000.00', 'Bicicletas electricas Nova 350 plomo gel', 'Bicicletas electricas.jfif', 4),
(5, 'Bicicletas', '367200.00', 'Bicicletas Atila MTB R26 18v', 'bicicletas.jpg', 4),
(6, 'Kits huertos urbanos', '250000.00', 'Kits para huertos urbanos que incluyen semillas', 'kits huertos urbanos.jfif', 3),
(7, 'Muebles', '460000.00', 'Muebles fabricados con materiales reciclados', 'muebles.jfif', 1),
(8, 'Muebles madera', '270000.00', 'Muebles fabricados con materiales reciclados', 'muebles madera.jfif', 3),
(9, 'paneles solares', '700000.00', 'paneles solares portátiles', 'paneles solares.jfif', 2),
(10, 'juguetes', '150000.00', 'juguetes hechos de materiales sostenibles como madera o fibras naturales', 'uguetes.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuarios`
--

CREATE TABLE `rol_usuarios` (
  `codigo_rol` int(11) NOT NULL,
  `descripcion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rol_usuarios`
--

INSERT INTO `rol_usuarios` (`codigo_rol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_identificacion`
--

CREATE TABLE `tipo_identificacion` (
  `id_identificacion` int(11) NOT NULL,
  `descripcion` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_identificacion`
--

INSERT INTO `tipo_identificacion` (`id_identificacion`, `descripcion`) VALUES
(1, 'Cedula De Ciudadania'),
(2, 'Tarejeta De Identidad'),
(3, 'Cedula Extranjeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `identificacion` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_identificacion` int(10) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `identificacion`, `nombres`, `correo`, `password`, `telefono`, `direccion`, `id_identificacion`, `id_rol`) VALUES
(1, '1143165992', 'mauricio alandete', 'mauricioalandete767@gmail.com', '$2a$10$84b2b1144f79445fb2152ud9r1sAH5hGWM6s7NDqpy2XohBD2vMDW', '3017046662', 'd', 1, 1),
(2, '1143165992', 'mauricio alandete', 'mauricioalanDdete767@gmail.com', '$2a$10$0bbc147cd10eee9f187feu8DQDE5yYdbrjIlGdE8Zhy/0EFgJRInq', '3017046662', 'd', 1, 2),
(3, '1143165992', 'mauricio alandete', 'mauricioalanddddete767@gmail.com', '$2a$10$5d9483a3f740c5ac74547eY.W0RrichKtSpunewofrHjsi6cdmlhu', '3017046662', 'd', 1, 2),
(4, '1143165992', 'mauricio alandete', 'mauricioalandeddte767@gmail.com', '$2a$10$248bcc6a0d40e07be071buv8PEQcBxy2YAqu1HaTi5PFjbSH79VLO', '3017046662', 'd', 1, 2),
(5, '1143165992', 'mauricio alandete', 'mauricioalaDDndete767@gmail.com', '$2a$10$20dbf63dd2998a8759aa0ui0f.CWHI5H4wIJCrnCxwVTSXkuQVijW', '3017046662', 'd', 1, 2),
(6, '1143165992', 'mauricio alandete', 'mauriciodddalandete767@gmail.com', '$2a$10$46bd7e9c76f2f70c6a0efu0msu7Ga/E8aCpG87R8qdlo/I79vpqPC', '3017046662', 'd', 1, 2),
(7, '1143165992', 'mauricio alandete', 'mauricioa@gmail.com', '$2a$10$a323a6466e892bfc495bfuiKcpbMB6jnaQYvyAwaysxYrit/URniG', '3017046662', 'd', 1, 2),
(8, '1143165992', 'mauricio alandete', 'mauri@gmail.com', '$2a$10$f9413cea650950691bae6OPKpg3oOA6qsFlTzxuN9aU.6MxvZFp7G', '3017046662', 'd', 1, 2),
(9, '1143165992', 'mauricio alandete', 'mau7@gmail.com', '$2a$10$41b45b9d7e6a2cf78e755e74BEgYMfzTn/nvaoGw8c0LOEZL5nqUO', '3017046662', 'd', 1, 2),
(10, '1143165992', 'mauricio alandete', 'mauricioadd767@gmail.com', '$2a$10$9aaee2509172f4c597b54ukWYBCMkdgmb60K9jn8qchUYLDqUqP3a', '3017046662', 'd', 1, 2),
(11, '1143165992', 'mauricio alandete', 'mauricio7@gmail.com', '$2a$10$2dad5c733b7f6d7c1f4b9uDuBgcp9cZ5w5WaycO5PSkKG71BunPX2', '3017046662', 'd', 1, 2),
(12, '1232434465', 'rosssimari', 'rossimari@gmail.com', '$2a$10$ee1a698b12cef7803a30cez8b3SCy3/NykXNFrmBNZACZQZzmMf92', '11312313', 'dsadad', 1, 2),
(13, '1143165992', 'mauricio alandete', 'rosi@gmail.com', '$2a$10$bdde85b97ed25f9fae856OXASMMicwLZustXD1pktMgCC2nAx2iJe', '3017046662', 'd', 1, 2),
(14, '1143165992', 'mau', 'ro@gmail.com', '$2a$10$63f11bdae1fa3348749bcuebxG4zo26vQZPK1AcTog9h3KGyCuuQi', '3017046662', 'd', 1, 2),
(15, '1143165992', 'mauricio alandete', 'mauri7@gmail.com', '$2a$10$9a701204bd8c1cbf69dcbOf6IQVyqyCMFun18EIIpmALshvRD.feK', '3017046662', 'd', 1, 2),
(16, '1143165992', 'MAU', 'kiko@gmail.com', '$2a$10$446e3a96a4cf4ff77a0aaOZqQbQG6FnUJREsjheZKg61k2V2W8vkm', '3017046662', 'd', 1, 2),
(17, '1143165899', 'D', 'd@gmail.com', '$2a$10$4d38d2a667037486b2d08upgSijJnx6hb.c2jw2RNoBp/okJ483/G', '3017046662', 'd', 1, 2),
(18, '1143165899', 'D', 'd@gmail.com', '$2a$10$2b02e4018db75d620b09aerujAWjd4szt0G.CLXI9hvi6zk4WxBAW', '3017046662', 'd', 1, 2),
(19, '1143165992', 'G', 'g@gmail.com', '$2a$10$49481909cacb9d13a46d3uRrN9fj15.rz5KeN1sE/CiQ2UqMfco3O', '3017046662', 'd', 1, 2),
(20, '1143165992', 'G', 'g@gmail.com', '$2a$10$7582636d81650faa777c8uF64fkhesfSWTmFXHi70O2YlZs48s60e', '3017046662', 'd', 1, 2),
(21, '1143165992', 'F', 'F@gmail.com', '$2a$10$93afdd7fb138989c379d1OQ6hSe0CkZHfOjRA0ZnY60qHpA.NDjw6', '3017046662', 'd', 1, 2),
(22, '1143165992', 'mauricio alandete', 'H@GMAIL.COM', '$2a$10$4199a72638c35b39c98f2O6rEYO4rZHPwa3rycruJelbQD.36xj6C', '3017046662', 'd', 1, 2),
(23, '1143165992', 'mauricio alandete', 'k@gmail.com', '$2a$10$7ecdccb8fee8317cd347cOeSSK3A/AoR5lk2rKneqwstqlrxEZV4y', '3017046662', 'd', 1, 2),
(24, '1143165992', 'mauricio alandete', 'O@GMAIL.COM', '$2a$10$b6be00e241a4f96ca4917uWgCrAzyu6sJsq/ae84nvCuJpGmQW9wS', '3017046662', 'd', 1, 2),
(25, '1143165992', 'N', 'M@GMAIL.COM', '$2a$10$a5e93be5d2b31a5460bc8uwgtokk5IOdMhCLQ87gTTOu.YiLmUqgq', '3017046662', 'd', 1, 2),
(26, '1143165992', 'A', 'V@GMAIL.COM', '$2a$10$e1d0a7aec5526213cb4a1uSmt6OLGOUFLqQ8D68xkHxsEn1KKA8RC', '3017046662', 'd', 1, 2),
(27, '66555', 'YY', 'YY@GMAIL.COM', '$2a$10$725347c1f88cbdab7c148evdygAIhf6epwjundzNiST0Y7V6oMJsS', '3017046662', 'd', 1, 2),
(28, '66555', 'YY', 'YY@GMAIL.COM', '$2a$10$2fc1c531214485ee9d977uS8M737QDFbA.1.vt.4bMeEYPOjHtCba', '3017046662', 'd', 1, 2),
(29, '1111111', 'MMM', 'MMM@GMAIL.COM', '$2a$10$e09feb48709a63fedb470eLldIQg016dXCXnnW73h0U4TDYhqnwWK', '3017046662', 'd', 1, 2),
(30, '1143165992', 'HJHJHJJN CDDAD', 'HNHNH@GMAIL.COM', '$2a$10$16f071224fdd7f6293aa6O1adbRCaMwVPZu3FptfzMydSJrNadila', '3017046662', 'd', 1, 2),
(31, '1143165992', 'BBNBNB', 'nmnmnmn@gmail.com', '$2a$10$413a8127f3a5019d7524euzYdf0vd3ZDngwP9faV4OtrrolSe18gi', '3017046662', 'd', 1, 2),
(32, '1143165992', 'BBNBNBDDDD', 'njnjnjn@gmail.com', '$2a$10$cdae005be925383e7f9b2uK/qlJf0Wl12ph6RcxyTlMc2pizr8yUm', '3017046662', 'd', 1, 2),
(33, '1143165992', 'Mauricio Alandete', 'mau767@gmail.com', '$2a$10$f23a096f94780e0b7b54aucg7CaZa3ToGVYlBjD6sxVXcXEd5YzkS', '3017046662', 'd', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banco_proyecto`
--
ALTER TABLE `banco_proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_ods` (`id_ods`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `entrada_ods`
--
ALTER TABLE `entrada_ods`
  ADD PRIMARY KEY (`id_ods`);

--
-- Indices de la tabla `estado_proyecto`
--
ALTER TABLE `estado_proyecto`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prdcto`),
  ADD KEY `id_ods` (`id_ods`);

--
-- Indices de la tabla `rol_usuarios`
--
ALTER TABLE `rol_usuarios`
  ADD PRIMARY KEY (`codigo_rol`);

--
-- Indices de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  ADD PRIMARY KEY (`id_identificacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_identificacion` (`id_identificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco_proyecto`
--
ALTER TABLE `banco_proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `entrada_ods`
--
ALTER TABLE `entrada_ods`
  MODIFY `id_ods` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_proyecto`
--
ALTER TABLE `estado_proyecto`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prdcto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rol_usuarios`
--
ALTER TABLE `rol_usuarios`
  MODIFY `codigo_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  MODIFY `id_identificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `banco_proyecto`
--
ALTER TABLE `banco_proyecto`
  ADD CONSTRAINT `banco_proyecto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `banco_proyecto_ibfk_2` FOREIGN KEY (`id_ods`) REFERENCES `entrada_ods` (`id_ods`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `banco_proyecto_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado_proyecto` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_ods`) REFERENCES `entrada_ods` (`id_ods`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol_usuarios` (`codigo_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_identificacion`) REFERENCES `tipo_identificacion` (`id_identificacion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
