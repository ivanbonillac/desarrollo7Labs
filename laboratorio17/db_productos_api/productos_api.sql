-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2023 a las 02:54:49
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `productos_api`
--
CREATE DATABASE IF NOT EXISTS `productos_api` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `productos_api`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `descripcion` text NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `creado`, `modificado`) VALUES
(1, 'Moda', ' Categoría para todo lo relacionado con la moda.', '0000-00-00 00:00:00', '2019-05-30 22:34:33'),
(2, 'Electronicos', 'Gadgets, drones y más.', '2019-06-01 00:35:07', '2019-05-30 22:34:33'),
(3, 'Motores', 'Deportes de motor y más', '2019-06-01 00:35:07', '0000-00-00 00:00:00'),
(5, 'Peliculas', ' Productos de cine.', '0000-00-00 00:00:00', '2019-01-08 18:27:26'),
(6, 'Libros', 'Libros Kindle, audiolibros y más.', '0000-00-00 00:00:00', '2019-01-08 18:27:47'),
(13, 'Deportes', 'Ropa, calzados y articulos deportivos.', '2019-01-09 02:24:24', '2019-01-09 06:24:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `categoria_id`, `creado`, `modificado`) VALUES
(1, 'Samsung Galaxy Note 10 Plus', 'El mejor celular Samsung en este momento y el más completo', 1110, 2, '2019-06-01 01:12:26', '2019-05-31 22:12:26'),
(2, 'Huawei P30 Pro', 'Cámara que ofrece zoom óptico 5X', 719, 2, '2019-06-01 01:12:26', '2019-05-31 22:12:26'),
(3, 'Samsung Galaxy S10', '¿Qué tal este smartphone?', 800, 3, '2019-06-01 01:12:26', '2019-05-31 22:12:26'),
(6, 'Ropa para levantar Pesas', 'De tipo Bench Shirt', 29, 1, '2019-06-01 01:12:26', '2019-05-31 07:12:21'),
(7, 'Laptop Lenovo', 'Mi socio comercial', 399, 2, '2019-06-01 01:13:45', '2019-05-31 07:13:39'),
(8, 'Samsung Galaxy Tab 10.1', 'Buena Tableta', 259, 2, '2019-06-01 01:14:13', '2019-05-31 07:14:08'),
(9, 'Reloj Spalding', 'Mi reloj deportivo', 199, 1, '2019-06-01 01:18:36', '2019-05-31 07:18:31'),
(10, 'Smart Watch de Sony', '¡El reloj inteligente más genial!', 300, 2, '2019-06-06 17:10:01', '2019-06-05 23:09:51'),
(11, 'Huawei Y9s', 'Para fines de prueba.', 350, 2, '2019-06-06 17:11:04', '2019-06-05 23:10:54'),
(12, 'Camisa Abercrombie Lake Arnold', 'Perfecto como regalo!', 60, 1, '2019-06-06 17:12:21', '2019-06-05 23:12:11'),
(13, 'Camisa Abercrombie Allen Brook', '¡Camisa roja genial!', 70, 1, '2019-06-06 17:12:59', '2019-06-05 23:12:49'),
(26, 'Cámara Canon EOS 6D', 'Excelente cámara profesional', 1455, 2, '2019-11-22 19:07:34', '2019-11-22 01:07:34'),
(28, 'Billetera', '¡Absolutamente puedes usar este!', 199, 6, '2019-12-04 21:12:03', '2019-12-04 03:12:03'),
(31, 'Camisa de Amanda Waller', 'Nueva camisa impresionante!', 333, 1, '2019-12-13 00:52:54', '2019-12-12 06:52:54'),
(42, 'Zapatillas Nike para hombre', 'Zapatillas Nike', 129, 3, '2019-12-12 06:47:08', '2019-12-12 10:47:08'),
(48, 'Zapatos Bristol', 'Zapatos impresionantes', 199, 5, '2019-01-08 06:36:37', '2019-01-08 10:36:37'),
(60, 'Reloj Rolex', 'Reloj de lujo.', 25000, 1, '2019-01-11 15:46:02', '2019-01-11 19:46:02'),
(65, 'Microsoft Surface Pro 6', 'Excelente tablet-laptop, para tu comodidad', 699, 2, '2023-11-01 02:34:58', '2023-11-01 01:34:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
