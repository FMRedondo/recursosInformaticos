-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2021 a las 20:26:59
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recursosinformaticos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `action` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `description`, `action`) VALUES
(1, 'Crear contenido nuevo', 'createNewContentForm'),
(2, 'Editar contenido propio', 'editMyContentForm'),
(3, 'Editar contenido ajeno', 'editAnyContentForm'),
(4, 'Borrar contenido propio', 'deleteMyContent'),
(5, 'Borrar contenido ajeno', 'deleteAnyContent'),
(6, 'Publicar contenido propio', 'publishMyContentForm'),
(7, 'Publicar cualquier contenido', 'publishAnyContentForm'),
(8, 'Leer contenido', 'viewContent');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions-roles`
--

CREATE TABLE `permissions-roles` (
  `idPermission` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `permissions-roles`
--

INSERT INTO `permissions-roles` (`idPermission`, `idRol`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(7, 1),
(8, 1),
(8, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `localizacion` varchar(200) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `nombre`, `descripcion`, `localizacion`, `imagen`) VALUES
(1, 'portatiles', 'carrito de poratiles', 'departamento de informatica', '/img/portatiles'),
(2, 'routers', 'routers antiguos', 'clase 20', '/img/routers'),
(3, 'monitores', 'monitores RGB 22\"', 'clase 22', '/img/monitores'),
(4, 'proyector', 'proyector tactil 100\"', 'sotano', 'imagen.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `idRecurso` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idTramoHrario` int(11) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `comentarios` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `description`) VALUES
(1, 'administrador'),
(2, 'editor'),
(3, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles-users`
--

CREATE TABLE `roles-users` (
  `idRol` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles-users`
--

INSERT INTO `roles-users` (`idRol`, `idUser`) VALUES
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramoshorarios`
--

CREATE TABLE `tramoshorarios` (
  `id` int(11) NOT NULL,
  `diaSemana` int(11) DEFAULT NULL,
  `horaInicio` varchar(45) DEFAULT NULL,
  `horaFin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `photo` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `photo`, `name`, `phone`) VALUES
(1, 'pepe@iescelia.org', '1234', 'tioguapo.jpg', 'Pepe Ibáñez', '555 109 115'),
(2, 'ana@iescelia.org', '1234', 'tiaguapa.jpg', 'Ana López', '555 989 231'),
(3, 'info@fmredondo.com', '1234', 'fmredondo', 'Francisco Manuel Redondo Jimenez', '667264822');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `contraseña` varchar(200) DEFAULT NULL,
  `nombreCompleto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions-roles`
--
ALTER TABLE `permissions-roles`
  ADD PRIMARY KEY (`idPermission`,`idRol`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles-users`
--
ALTER TABLE `roles-users`
  ADD PRIMARY KEY (`idRol`,`idUser`);

--
-- Indices de la tabla `tramoshorarios`
--
ALTER TABLE `tramoshorarios`
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
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tramoshorarios`
--
ALTER TABLE `tramoshorarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
