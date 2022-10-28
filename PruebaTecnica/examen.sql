-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2022 a las 19:40:43
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
-- Base de datos: `examen`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Editar_Proveedor` (IN `nombre` VARCHAR(45), IN `correo` VARCHAR(45), IN `telefono` INT(45), IN `direccion` VARCHAR(45), IN `estado` INT(10), IN `id` INT)  BEGIN
        UPDATE proveedor SET Nombre = 'nombre', Correo = 'correo', Telefono = telefono, Direccion = 'direccion', Estado = estado where id_proveedor = id;
        end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_Proveedor` (IN `nombre` VARCHAR(45), IN `correo` VARCHAR(45), IN `telefono` INT(45), IN `direccion` VARCHAR(45), IN `estado` INT(10))  BEGIN
        	insert into proveedor (Nombre, Correo, Telefono, Direccion, Estado) values (nombre, correo, telefono, direccion, estado);
       
        end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Mostrar_Proveedor` ()  BEGIN
        SELECT id_proveedor, Nombre, Correo, Telefono, Direccion, Estado from proveedor;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id_categoria` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Detalle` varchar(100) NOT NULL,
  `Estado` int(11) NOT NULL,
  `marca_id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`id_categoria`, `Nombre`, `Detalle`, `Estado`, `marca_id_marca`) VALUES
(1, 'Queso', 'este es un detalle', 1, 1),
(2, 'Leche', 'este es otro detalle', 1, 1),
(3, 'esasa', 'nue2', 1, 3),
(4, '22222', 'ssss222', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_producto`
--

CREATE TABLE `detalle_producto` (
  `id_detalle` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Estado` int(11) NOT NULL,
  `Existencia` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `categoria_id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_producto`
--

CREATE TABLE `marca_producto` (
  `id_marca` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Detalle` varchar(100) NOT NULL,
  `Estado` int(11) NOT NULL,
  `proveedor_id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca_producto`
--

INSERT INTO `marca_producto` (`id_marca`, `Nombre`, `Detalle`, `Estado`, `proveedor_id_proveedor`) VALUES
(1, 'queso vaca', 'diferentes tipos de queso premium', 3, 1),
(2, 'sadasd', 'sadasd', 1, 3),
(3, '$nombre', '$detalle', 0, 4),
(4, 'nw2', 'nw2', 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Id_proveedor` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Id_proveedor`, `Nombre`, `Correo`, `Telefono`, `Direccion`, `Estado`) VALUES
(1, 'nombre', 'correo', 2147483647, 'direccion', 1),
(2, 'nombre', 'correo', 1321311, 'direccion', 1),
(3, 'prov', 'Ramiro12@gmail.com', 5689745, '25-calle 8-79', 1),
(4, 'dsadasd', 'Ramiro12@gmail.com', 5689745, '25-calle 8-79', 3),
(5, 'sasa', 'sasa', 5689745, '25-calle 8-79', 1),
(6, 's1', 's1', 1, 's1', 1),
(7, 'dino', 'dnio', 54634, 'dasdasdasd', 1),
(8, '1', '1', 1, '1', 2),
(9, '2', '2', 2, '2', 1),
(10, '10', 'correo', 55555555, 'direccion', 1),
(11, 'polo', 'plo', 4545, 'polo23213213123', 1),
(12, '2', '2', 2, '2123213123132', 1),
(13, 'maria', 'prove@gmail.com', 17777, '777777', 3),
(14, '', '', 0, '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `marca_id_marca` (`marca_id_marca`);

--
-- Indices de la tabla `detalle_producto`
--
ALTER TABLE `detalle_producto`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `categoria_id_categoria` (`categoria_id_categoria`);

--
-- Indices de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  ADD PRIMARY KEY (`id_marca`),
  ADD KEY `proveedor_id_proveedor` (`proveedor_id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Id_proveedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_producto`
--
ALTER TABLE `detalle_producto`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `Id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD CONSTRAINT `categoria_producto_ibfk_1` FOREIGN KEY (`marca_id_marca`) REFERENCES `marca_producto` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_producto`
--
ALTER TABLE `detalle_producto`
  ADD CONSTRAINT `detalle_producto_ibfk_1` FOREIGN KEY (`categoria_id_categoria`) REFERENCES `categoria_producto` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  ADD CONSTRAINT `marca_producto_ibfk_1` FOREIGN KEY (`proveedor_id_proveedor`) REFERENCES `proveedor` (`Id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
