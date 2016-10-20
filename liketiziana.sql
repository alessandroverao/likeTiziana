-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-10-2016 a las 14:59:55
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `liketiziana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_clien` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_clien` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_clien` int(11) NOT NULL,
  `direccion_clien` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `celular_clien` bigint(13) NOT NULL,
  `fecha_reg_clien` date NOT NULL,
  `cuil_clien` bigint(11) NOT NULL,
  `email_clien` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_clien`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clien`, `nomb_clien`, `tipo_clien`, `direccion_clien`, `celular_clien`, `fecha_reg_clien`, `cuil_clien`, `email_clien`) VALUES
(2, 'RAUL GONZALEZ', 9, 'AV. SAN MARTIN 356', 3743454896, '2016-09-07', 20489669848, 'raul@gmail.com'),
(3, 'CONSUMIDOR FINAL', 2, 'XXXXXX', 999999999, '2016-09-27', 99999999999, 'consumidor@final.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `importe_compra` decimal(10,2) NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_provee_compra` int(11) NOT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `importe_compra`, `fecha_compra`, `id_provee_compra`) VALUES
(1, '2100.00', '2016-10-12', 1),
(2, '500.00', '2016-10-12', 2),
(3, '700.00', '2016-10-12', 1),
(4, '527.80', '2016-10-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE IF NOT EXISTS `detalleventa` (
  `id_detalle` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_venta_detalle` int(11) NOT NULL,
  `id_prod_detalle` int(11) NOT NULL,
  `cantidad_detalle` int(10) NOT NULL,
  `importe_detalle` decimal(10,2) NOT NULL,
  `estadodetalle` int(1) NOT NULL,
  PRIMARY KEY (`id_detalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=22 ;

--
-- Volcar la base de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`id_detalle`, `id_venta_detalle`, `id_prod_detalle`, `cantidad_detalle`, `importe_detalle`, `estadodetalle`) VALUES
(1, 1, 2, 1, '5.50', 0),
(2, 1, 1, 1, '5.50', 0),
(3, 1, 4, 1, '8.00', 0),
(4, 2, 3, 1, '18.00', 0),
(5, 3, 8, 1, '28.00', 1),
(6, 4, 9, 1, '50.00', 0),
(7, 5, 11, 1, '49.00', 0),
(8, 6, 10, 1, '35.00', 0),
(9, 7, 5, 1, '5.50', 0),
(10, 7, 5, 1, '5.50', 0),
(11, 8, 6, 1, '5.50', 0),
(12, 8, 7, 1, '5.50', 0),
(13, 9, 2, 1, '5.50', 0),
(14, 10, 1, 1, '5.50', 0),
(15, 10, 4, 1, '8.00', 0),
(16, 11, 3, 1, '18.00', 0),
(17, 12, 9, 1, '50.00', 0),
(18, 13, 11, 1, '49.00', 0),
(19, 14, 10, 1, '35.00', 0),
(20, 15, 8, 1, '28.00', 0),
(21, 16, 7, 1, '5.50', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `cod_notas` int(3) NOT NULL AUTO_INCREMENT,
  `contenido` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_notas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `notas`
--

INSERT INTO `notas` (`cod_notas`, `contenido`) VALUES
(1, 'ARREGLAR TABLA CLIENTES, PROVEEDORES, PRODUCTOS... DISMINUIR LA REDUNDANCIA E INCONSISTENCIA DE DATOS.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_prod` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_barra` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_prod` int(11) NOT NULL,
  `precio_cost` decimal(10,2) NOT NULL,
  `porcentaje_prod` decimal(5,2) NOT NULL,
  `precio_unit` decimal(10,2) NOT NULL,
  `existencia_prod` int(10) NOT NULL,
  `fecha_reg` date NOT NULL,
  `iva_prod` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `nomb_prod`, `cod_barra`, `tipo_prod`, `precio_cost`, `porcentaje_prod`, `precio_unit`, `existencia_prod`, `fecha_reg`, `iva_prod`) VALUES
(0, 'VARIOS', '', 0, '0.00', '0.00', '0.00', 10, '2016-10-08', '0.00'),
(1, 'TANG ANANA', '7622300868604', 6, '4.23', '30.02', '5.50', 48, '2016-09-07', '0.00'),
(2, 'TANG NARANJA', '7622300868482', 6, '4.23', '30.02', '5.50', 48, '2016-09-07', '0.00'),
(3, 'QUESO RALLADO ILOLAY 40GR', '7790787251780', 9, '13.84', '30.06', '18.00', 48, '2016-09-07', '0.00'),
(4, 'SERRANAS SANDWICH X112G', '7790040704800', 3, '6.00', '33.33', '8.00', 48, '2016-09-27', '0.00'),
(5, 'BELDENT UVA', '77941596', 4, '4.00', '37.50', '5.50', 48, '2016-09-27', '0.00'),
(6, 'BELDENT ULTRA DEFENSE', '77916419', 4, '4.00', '37.50', '5.50', 49, '2016-09-27', '0.00'),
(7, 'BELDENT FRUTA', '77916389', 4, '4.00', '37.50', '5.50', 48, '2016-09-27', '0.00'),
(8, 'MAGISTRAL MARINA X300ML', '7500435023115', 1, '21.50', '30.23', '28.00', 48, '2016-09-27', '0.00'),
(9, 'DEMETRIUS BLANCO DULCE X750ML', '7798114091986', 7, '38.45', '30.04', '50.00', 48, '2016-09-27', '0.00'),
(10, 'BUDWEISER X1000CM3', '7793147001056', 8, '26.90', '30.11', '35.00', 48, '2016-09-27', '0.00'),
(11, 'COCA-COLA X2.5L', '7790895005794', 5, '37.50', '30.67', '49.00', 48, '2016-09-27', '0.00'),
(12, 'MIEL', '564654654654', 9, '30.00', '30.00', '39.00', 5, '2016-10-17', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_prove` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_prove` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_prove` int(11) NOT NULL,
  `direccion_prove` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `celular_prove` bigint(13) NOT NULL,
  `fecha_reg_prove` date NOT NULL,
  `cuil_prove` bigint(11) NOT NULL,
  `email_prove` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_prove`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_prove`, `nomb_prove`, `tipo_prove`, `direccion_prove`, `celular_prove`, `fecha_reg_prove`, `cuil_prove`, `email_prove`) VALUES
(1, 'VENDE TODO SA', 9, 'BELGRANO 999', 3743489698, '2016-09-07', 20489669848, 'vende@hotmail.com'),
(2, 'CARLOS TRAFFIC', 10, 'PUERTO RICO', 3743454566, '2016-10-12', 20454545456, 'carlos@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoclientes`
--

CREATE TABLE IF NOT EXISTS `tipoclientes` (
  `id_tipo_client` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cliente_tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_tipo_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `tipoclientes`
--

INSERT INTO `tipoclientes` (`id_tipo_client`, `tipo_cliente_tipo`) VALUES
(1, 'Bienes de uso'),
(2, 'Consumidor Final'),
(3, 'Exento'),
(4, 'Monotributo Social'),
(5, 'No Categorizado'),
(6, 'No Responsable'),
(7, 'Peq. Con. Event.'),
(8, 'Peq. Con. Social'),
(9, 'Responsable Inscripto'),
(10, 'Responsable Monotributo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproductos`
--

CREATE TABLE IF NOT EXISTS `tipoproductos` (
  `id_tipo_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_pro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_pro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `tipoproductos`
--

INSERT INTO `tipoproductos` (`id_tipo_pro`, `tipo_pro`) VALUES
(1, 'LIMPIEZA'),
(2, 'HIGIENE PERSONAL'),
(3, 'GALLETITA'),
(4, 'GOLOSINA'),
(5, 'GASEOSA'),
(6, 'JUGO'),
(7, 'VINO'),
(8, 'CERVEZA'),
(9, 'COMESTIBLE'),
(10, 'OTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(2) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `clave`, `estado`) VALUES
('alessandroverao', '504fde4be489b040c1f69a37b0cce4c2', 1),
('root', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL,
  `estadoventa` int(1) NOT NULL,
  `fecha_venta` date NOT NULL,
  `id_clien_venta` int(11) NOT NULL,
  `impresiones` int(1) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `estadoventa`, `fecha_venta`, `id_clien_venta`, `impresiones`) VALUES
(1, 0, '2016-10-12', 3, 1),
(2, 0, '2016-10-12', 3, 1),
(3, 1, '2016-10-12', 3, 1),
(4, 0, '2016-10-14', 3, 0),
(5, 0, '2016-10-14', 3, 0),
(6, 0, '2016-10-14', 3, 0),
(7, 0, '2016-10-14', 3, 0),
(8, 0, '2016-10-14', 3, 0),
(9, 0, '2016-10-14', 3, 0),
(10, 0, '2016-10-14', 3, 1),
(11, 0, '2016-10-14', 3, 1),
(12, 0, '2016-10-14', 3, 1),
(13, 0, '2016-10-14', 3, 1),
(14, 0, '2016-10-14', 3, 1),
(15, 0, '2016-10-14', 3, 1),
(16, 0, '2016-10-17', 3, 1);
