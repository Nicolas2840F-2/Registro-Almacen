-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-10-2023 a las 14:08:23
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registroportatiles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portatiles`
--

CREATE TABLE `portatiles` (
  `idPortatiles` int NOT NULL,
  `marcaPortatiles` varchar(45) NOT NULL,
  `modeloPortatiles` varchar(45) NOT NULL,
  `numeroSeriePortatiles` varchar(45) NOT NULL,
  `especificacionesPortatiles` varchar(100) NOT NULL,
  `colorPortatiles` varchar(45) NOT NULL,
  `Usuarios_idUsuarios` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `idRegistros` int NOT NULL,
  `fechaIngresoRegistros` timestamp NOT NULL,
  `Portatiles_idPortatiles` int NOT NULL,
  `Usuarios_idUsuarios` int NOT NULL,
  `fechaSalidaRegistros` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRoles` int NOT NULL,
  `descripcionRoles` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int NOT NULL,
  `tipoDocumentoUsuarios` varchar(45) NOT NULL,
  `documentoUsuarios` varchar(45) NOT NULL,
  `nombreUsuarios` varchar(45) NOT NULL,
  `Roles_idRoles` int NOT NULL,
  `telefonoUsuarios` varchar(45) NOT NULL,
  `correoUsuarios` varchar(45) NOT NULL,
  `contraseñaUsuarios` varbinary(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `portatiles`
--
ALTER TABLE `portatiles`
  ADD PRIMARY KEY (`idPortatiles`),
  ADD KEY `fk_Portatiles_Usuarios1_idx` (`Usuarios_idUsuarios`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`idRegistros`),
  ADD KEY `fk_Registros_Portatiles1_idx` (`Portatiles_idPortatiles`),
  ADD KEY `fk_Registros_Usuarios1_idx` (`Usuarios_idUsuarios`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRoles`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `fk_Usuarios_Roles_idx` (`Roles_idRoles`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `portatiles`
--
ALTER TABLE `portatiles`
  MODIFY `idPortatiles` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `idRegistros` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRoles` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `portatiles`
--
ALTER TABLE `portatiles`
  ADD CONSTRAINT `fk_Portatiles_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_Registros_Portatiles1` FOREIGN KEY (`Portatiles_idPortatiles`) REFERENCES `portatiles` (`idPortatiles`),
  ADD CONSTRAINT `fk_Registros_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Roles` FOREIGN KEY (`Roles_idRoles`) REFERENCES `roles` (`idRoles`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
