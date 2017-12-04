-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2017 a las 00:44:42
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `id_cliente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono1` varchar(9) NOT NULL,
  `telefono2` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `direccion`, `telefono1`, `telefono2`) VALUES
(0, 'Disponible', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `descripcion` varchar(560) NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  `id_cliente` bigint(20) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `direccion`, `descripcion`, `precio`, `id_cliente`, `imagen`) VALUES
(1, 'San José de la Atalaya', 'Esta villa completamente reformada está ubicada al sur de la isla, cerca de San José; bien ubicada para encontrar paz y privacidad. La propiedad ha sido diseñada y renovada para que rezume un estilo ibicenco moderno y está distribuida en dos pisos.', '3500000.00', 0, 'inmueble1.jpg'),
(2, 'Avda de Asturias 81, Torrelodones', 'Chalet independiente de diseño en tres alturas construido en el año 2007 con vistas panorámicas del noroeste de Madrid y la sierra de Gredos. Situado en La Berzosa, urbanización privada con servicio de vigilancia 24 h.', '975000.00', 0, 'inmueble2.jpg'),
(3, 'Villa en Tarragona', 'Vivienda de diseño con vistas al mar en Cala Romana, Tarragona.Esta magnífica propiedad de lujo está situada en la urbanización más cercana a Tarragona, Cala Romana, zona de prestigio y muy próxima a las playas.', '1300000.00', 0, 'inmueble3.jpg'),
(4, 'Mansión en la Zagaleta, Málaga', 'Casa-palacio estilo árabe en la Zagaleta. La propiedad ofertada, con una superficie construida de 2.160 m2 en una parcela de 6.700 m2, cuenta con las mejores calidades, desde muralla de piedra exterior escalonada hasta artesonados de madera policromada en los techos.', '15500000.00', 0, 'inmueble4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titular` varchar(100) NOT NULL,
  `contenido` varchar(1500) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titular`, `contenido`, `imagen`, `fecha`) VALUES
(1, 'La actividad inmobiliaria en España está un 30% por debajo de los máximos de 2007', 'El sector inmobiliario y de la construcción en España registró en el tercer trimestre de 2017 unos niveles de actividad un 30% por debajo de los máximos registrados en 2007, según el nuevo Indice Registral de Actividad Inmobiliaria (IRAI), un indicador elaborado por el Colegio de Registradores para medir globalmente la actividad del sector.\r\n\r\nEn el último trimestre, los datos muestran un IRAI de 98,26 frente al 139,90 registrado el año previo al estallido de la última gran crisis económica. Sin embargo, desde los mínimos históricos de 68 a los que cayó en 2013, el sector ya ha recuperado un 45% hasta ahora.\r\n\r\nSolo en lo que va de año, la actividad inmobiliaria y de la construcción ha avanzado un 10%, partiendo de índice IRAI de 89 que se registró en diciembre del pasado año. Los grupos con una mayor repercusión positiva en este 10% de incremento durante los nueve primeros meses del año han sido la compraventa, especialmente de viviendas nuevas y usadas y el número de hipotecas registrado. En concreto, la compraventa de viviendas nuevas ha crecido en estos nueve meses un 32%, mientras que la usada lo ha hecho en un 27%. En cuanto al número de hipotecas, el avance ha sido del 16%. Por su parte, desde el punto de vista mercantil, el mayor impulso de la actividad se debe al descenso en el número de concurso de acreedores, tanto de empresas de construcción, que ha bajado un 83%, como en sociedades inmobiliarias, que ha descendido un 57%.', 'noticia1.jpg', '2017-12-04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
