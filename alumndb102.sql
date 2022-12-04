-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2018 a las 20:53:56
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alumndb102`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE IF NOT EXISTS `catalogo` (
  `cve_catalogo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_catalogo` varchar(30) NOT NULL,
  PRIMARY KEY (`cve_catalogo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='2' AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`cve_catalogo`, `nombre_catalogo`) VALUES
(24, 'labios'),
(25, 'ojos'),
(26, 'sombras'),
(27, 'rubor'),
(29, 'pestañas'),
(30, 'cabello'),
(31, 'dedos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(100) NOT NULL,
  `precio_producto` float(9,2) NOT NULL,
  `cantidad` int(9) NOT NULL,
  `precio_total` float(9,2) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `cve_producto` int(11) NOT NULL AUTO_INCREMENT,
  `cve_provedor` int(11) NOT NULL,
  `cve_catalogo` int(11) NOT NULL,
  `producto` varchar(30) NOT NULL,
  `pre_compra` double(9,2) NOT NULL,
  `pre_venta` double(9,2) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`cve_producto`),
  KEY `producto` (`producto`),
  KEY `cve_provedor` (`cve_provedor`),
  KEY `cve_catalogo` (`cve_catalogo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cve_producto`, `cve_provedor`, `cve_catalogo`, `producto`, `pre_compra`, `pre_venta`, `descripcion`, `imagen`) VALUES
(49, 11, 24, 'bile fuller', 25.00, 30.00, 'bile color rojo oxido marca fuller', 'FotosProductos/bile fuller.jpg'),
(50, 13, 24, 'labial avon', 45.00, 50.00, 'labial color morado de la marca avon', 'FotosProductos/labial avon.png'),
(51, 15, 24, 'labial mary', 30.00, 37.00, 'labial  color rosa  mexicano de la marca mary kay', 'FotosProductos/labial mary.jpg'),
(52, 12, 24, 'bile gla', 45.00, 63.00, 'labial  de elegancia  marca glamur color rojo', 'FotosProductos/bile gla.jpg'),
(53, 15, 24, 'labiales mary', 100.00, 120.00, 'juego de 4 labiales de diferentes colores marca mary kay', 'FotosProductos/labiales mary.png'),
(54, 13, 25, 'rimel', 13.00, 17.00, 'rimel marca  avon color cafe claro', 'FotosProductos/rimel.jpg'),
(55, 12, 25, 'rimel glas', 22.00, 26.00, 'rime color negro marca glamur', 'FotosProductos/rimel glas.jpg'),
(56, 11, 25, 'rime full', 14.00, 18.00, 'rimel claro marca fuller', 'FotosProductos/rime full.jpg'),
(57, 13, 25, 'rimel avon', 34.00, 42.00, 'rimel color morado  oscuro marca avon', 'FotosProductos/rimel avon.jpg'),
(58, 13, 26, 'sombras avon', 100.00, 120.00, 'juego de sombras marca avon ', 'FotosProductos/sombras avon.jpg'),
(59, 15, 26, 'sombras kay', 120.00, 135.00, 'juego de sombras de la marca kay', 'FotosProductos/sombras kay.jpg'),
(60, 11, 26, 'sombras full', 60.00, 75.00, 'juego de sombras sencillas marca fuller', 'FotosProductos/sombras full.jpg'),
(61, 13, 27, 'rubor avon', 70.00, 80.00, 'rubor marca avon', 'FotosProductos/rubor avon.jpg'),
(62, 15, 27, 'rubor mar', 60.00, 68.00, 'rubor dela marca mary kay ', 'FotosProductos/rubor mar.jpg'),
(63, 12, 27, 'rubor glas', 120.00, 147.00, 'juego de rubor   de 3 distintos colore marca glamur', 'FotosProductos/rubor glas.jpg'),
(64, 11, 27, 'rubor full', 30.00, 48.00, 'rubor con brocha marca fuller', 'FotosProductos/rubor full.jpg'),
(65, 11, 29, 'delineador', 15.00, 18.00, 'delineador color negro', 'FotosProductos/delineador.jpg'),
(66, 15, 30, 'crema kay', 17.00, 25.00, 'crema para peinar marca mary kay', 'FotosProductos/crema kay.png'),
(67, 13, 30, 'champu avon', 30.00, 37.00, 'chmapu para cabello lasio marca avon', 'FotosProductos/champu avon.jpg'),
(68, 14, 30, 'mus', 30.00, 43.00, 'mus marca arabella', 'FotosProductos/mus.jpg'),
(69, 15, 30, 'acondicionador', 16.00, 26.00, 'acondicionador parca mary kay para despues de bañarse', 'FotosProductos/acondicionador.jpg'),
(70, 13, 31, 'barniz semphora', 12.00, 14.00, 'barniz semphora color plateado marca avon', 'FotosProductos/barniz semphora.jpg'),
(71, 15, 31, 'barniz kay', 20.00, 31.00, 'barniz color morado con brillos de la marca mary kay', 'FotosProductos/barniz kay.jpg'),
(72, 13, 24, 'labial estuche', 200.00, 245.00, 'estuche de varios labiales marca avon', 'FotosProductos/labial estuche.jpg'),
(73, 14, 26, 'sombras ar', 134.00, 160.00, 'juego de sombras marca arabella', 'FotosProductos/sombras ar.jpg'),
(75, 15, 31, 'barniz ', 12.00, 18.00, 'barniz marca mary kay plateado', 'FotosProductos/barniz .jpg'),
(76, 14, 31, 'barniz ara', 22.00, 27.00, 'barniz marca arabella color morado', 'FotosProductos/barniz ara.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `cve_provedor` int(11) NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(30) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `edo` varchar(50) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `cp` int(5) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `noext` varchar(30) NOT NULL,
  `noInt` varchar(30) NOT NULL,
  PRIMARY KEY (`cve_provedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`cve_provedor`, `proveedor`, `telefono`, `correo`, `edo`, `municipio`, `localidad`, `cp`, `calle`, `noext`, `noInt`) VALUES
(11, 'fuller         ', 5511303430, 'fuller@live.com.mx', '               mexico      ', '    teotihuacan             ', '   maquixco  ', 55123, '            la garita         ', '       1             ', '       1             '),
(12, 'glamur ', 5539192082, 'glamur@gmail.com', '   mexico  ', '  tecamac   ', '   ojo de agua   ', 55349, '   ajoloapan   ', '   1   ', '   1   '),
(13, 'avon    ', 5532346798, 'avon@gmail.com', '    mexico', 'tecamac    ', '    ojo de agua    ', 55678, '    ajoloapan    ', '7    ', '    2    '),
(14, 'arabella', 5951129310, 'arabella@hotmail.com', 'mexico', 'ojo de agua', 'Tecamac', 55650, '5 de mayo', '3', '1'),
(15, 'mary kay', 5511234657, 'mkay@gmail.com', 'oaxaca', 'sn juan colorado', 'sn juan colorado', 71720, 'insurgentes', '1', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id_imagen`, `imagen`) VALUES
(1, 'img/slider//slider1.jpg'),
(2, 'img/slider//slider2.jpg'),
(3, 'img/Slider/slider3.jpg'),
(4, 'img/Slider/slider4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cve_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`cve_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cve_usuario`, `nombre_usuario`, `password`, `tipo_usuario`) VALUES
(1, 'admin', '123', 'Administrador'),
(3, 'abi', '123', 'Secretaria'),
(4, 'silvino', '123', 'Vendedor'),
(5, 'pedro', '123', 'Cliente'),
(6, 'juan', '123', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Total` float NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` varchar(11) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `producto`, `cantidad`, `Total`, `fecha`, `id_usuario`) VALUES
(22, 'rimel glass', 1, 54.55, '2018-08-14', 'kike'),
(23, 'nuevo', 1, 60, '2018-08-14', 'pedro'),
(24, 's', 5, 25, '2018-08-14', 'pedro'),
(25, 'rimel', 2, 34, '2018-08-15', 'pedro'),
(26, 'bile gla', 6, 318, '2018-08-15', 'pedro'),
(27, 'labiales mary', 1, 120, '2018-08-15', 'pedro'),
(28, 'sombras full', 3, 225, '2018-08-15', 'pedro'),
(29, 'labial avon', 2, 100, '2018-08-15', 'pedro'),
(30, 'rimel', 1, 17, '2018-08-16', 'pedro'),
(31, 'bile gla', 1, 53, '2018-08-17', 'juan'),
(32, 'sombras full', 1, 75, '2018-08-17', 'juan'),
(33, 'barniz ara', 1, 27, '2018-08-17', 'pedro'),
(34, 'rime full', 1, 18, '2018-08-17', 'juan'),
(35, 'rimel avon', 2, 84, '2018-08-17', 'juan'),
(36, 'labial avon', 2, 100, '2018-08-17', 'juan'),
(37, 'rubor glas', 2, 294, '2018-08-17', 'juan');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`cve_provedor`) REFERENCES `proveedores` (`cve_provedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`cve_catalogo`) REFERENCES `catalogo` (`cve_catalogo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
