

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `konecta`
--

CREATE DATABASE konecta;

USE konecta;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Envasados'),
(2, 'Naturales'),
(3, 'Elaborados'),
(4, 'Bebidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_venta` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `subtotal` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_venta_fk0` (`id_venta`),
  KEY `detalle_venta_fk1` (`id_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `precio` int NOT NULL,
  `peso` int NOT NULL,
  `id_categoria` int NOT NULL,
  `stock` int NOT NULL,
  `fecha` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_fk0` (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `referencia`, `precio`, `peso`, `id_categoria`, `stock`, `fecha`) VALUES
(3, 'Nescafé', 'Café envasado', 12, 450, 1, 0, '2022-05-14 03:38:53'),
(4, 'Mantequilla Laive sin Sal', 'Similar a la mantequilla Gloria sin Sal', 11, 255, 1, 70, '2022-05-14 07:22:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL,
  `total` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;