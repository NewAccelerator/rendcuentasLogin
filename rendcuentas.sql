-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2023 a las 01:22:02
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
-- Base de datos: `rendcuentas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_orden`
--

CREATE TABLE `factura_orden` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_receiver_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_receiver_address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_total_before_tax` decimal(10,2) NOT NULL,
  `order_total_tax` decimal(10,2) NOT NULL,
  `order_tax_per` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_total_after_tax` double(10,2) NOT NULL,
  `order_amount_paid` decimal(10,2) NOT NULL,
  `order_total_amount_due` decimal(10,2) NOT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `factura_orden`
--

INSERT INTO `factura_orden` (`order_id`, `user_id`, `order_date`, `order_receiver_name`, `order_receiver_address`, `order_total_before_tax`, `order_total_tax`, `order_tax_per`, `order_total_after_tax`, `order_amount_paid`, `order_total_amount_due`, `note`) VALUES
(1, 2, '2023-07-24 20:45:50', '123-456-789', 'Viaje De NEGOCIOS', 980.00, 98.00, '10', 1078.00, 1200.00, -122.00, 'Tuve contratiempos en el viaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_orden_producto`
--

CREATE TABLE `factura_orden_producto` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_code` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL,
  `order_item_final_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `factura_orden_producto`
--

INSERT INTO `factura_orden_producto` (`order_item_id`, `order_id`, `item_code`, `item_name`, `order_item_quantity`, `order_item_price`, `order_item_final_amount`) VALUES
(1, 1, '1', 'Hotel en casa ', 5.00, 150.00, 750.00),
(2, 1, '2', 'Comidas', 6.00, 30.00, 180.00),
(3, 1, '3', 'Pasajes', 10.00, 5.00, 50.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_usuarios`
--

CREATE TABLE `factura_usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `factura_usuarios`
--

INSERT INTO `factura_usuarios` (`id`, `email`, `password`, `first_name`, `last_name`, `mobile`, `address`) VALUES
(1, 'registro@baulphp.com', '12345', 'Baul', 'Gonzales', 78979676, '16048'),
(2, 'franco@gmail.com', '123', 'Franco', 'Jauregui', 963019703, '15019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodoc`
--

CREATE TABLE `tipodoc` (
  `id` char(10) NOT NULL,
  `tipoDoc` varchar(20) NOT NULL,
  `numDoc` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipodoc`
--

INSERT INTO `tipodoc` (`id`, `tipoDoc`, `numDoc`) VALUES
('1', 'DNI', '12345678'),
('2', 'DNI', '72084550');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `factura_orden`
--
ALTER TABLE `factura_orden`
  ADD PRIMARY KEY (`order_id`);

--
-- Indices de la tabla `factura_orden_producto`
--
ALTER TABLE `factura_orden_producto`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indices de la tabla `factura_usuarios`
--
ALTER TABLE `factura_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura_orden`
--
ALTER TABLE `factura_orden`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `factura_orden_producto`
--
ALTER TABLE `factura_orden_producto`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `factura_usuarios`
--
ALTER TABLE `factura_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
