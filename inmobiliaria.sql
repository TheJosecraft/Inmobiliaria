-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2017 a las 18:21:19
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
  `lugar` varchar(150) NOT NULL,
  `id_cliente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha`, `hora`, `motivo`, `lugar`, `id_cliente`) VALUES
(1, '2017-12-06', '15:00:00', 'Hola', 'Granada', 1),
(2, '2017-12-08', '19:00:00', 'Precio Inmueble', 'Granada', 1);

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
(0, 'Disponible', '', '', '', ''),
(1, 'José Carlos', 'Raya León', 'Avenida de la Constitución 17, 3ºP', '957655755', '638564461'),
(2, 'Álvaro', 'Raya León', 'Calle la Parra 5, 2ºE', '957652162', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `descripcion` varchar(560) NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  `id_cliente` bigint(20) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `direccion`, `descripcion`, `precio`, `id_cliente`, `imagen`) VALUES
(1, 'San José de la Atalaya', 'Esta villa completamente reformada está ubicada al sur de la isla, cerca de San José; bien ubicada para encontrar paz y privacidad. La propiedad ha sido diseñada y renovada para que rezume un estilo ibicenco moderno y está distribuida en dos pisos.', '3500000.00', 1, 'inmueble1.jpg'),
(2, 'Torrelodones', 'Chalet independiente de diseño en tres alturas construido en el año 2007 con vistas panorámicas del noroeste de Madrid y la sierra de Gredos. Situado en La Berzosa, urbanización privada con servicio de vigilancia 24 h.', '975000.00', 0, 'inmueble2.jpg'),
(3, 'Villa en Tarragona', 'Vivienda de diseño con vistas al mar en Cala Romana, Tarragona.Esta magnífica propiedad de lujo está situada en la urbanización más cercana a Tarragona, Cala Romana, zona de prestigio y muy próxima a las playas.', '1300000.00', 0, 'inmueble3.jpg'),
(4, 'Mansión en la Zagaleta, Málaga', 'Casa-palacio estilo árabe en la Zagaleta. La propiedad ofertada, con una superficie construida de 2.160 m2 en una parcela de 6.700 m2, cuenta con las mejores calidades, desde muralla de piedra exterior escalonada hasta artesonados de madera policromada en los techos.', '15500000.00', 0, 'inmueble4.jpg'),
(5, 'Los Flamingos, Marbella', 'Espectacular villa de diseño ultra moderno, con piscina y vistas panorámicas al mar. Una declaración de diseño impresionante en un paisaje fabuloso, esta elegante pieza, de diseño moderno de la arquitectura se encuentra en una liga propia. \r\n\r\nEste chalet es una fusión potente y armoniosa entre las formas espectaculares, espacios modernos de fluidos y la belleza natural de lujo y luz que se vierte en el interior a través de sus impresionantes ventanas de piso a techo. ', '575000.00', 0, 'inmueble5.jpg'),
(6, 'Jávea, Alicante', 'Fantástica villa de lujo con 3 casas independientes: la casa principal - 2 dormitorios, 3 baños, comedor, sala de estar, cocina, bodega, sauna. La segunda casa - 3 dormitorios y 3 baños. La tercera casa -. 2 dormitorios, sala, cocina, baño, sala de billar y un gimnasio. \r\n\r\nLas tres casas tienen calefacción por suelo radiante de agua con una caldera de gas, sistema de vigilancia 24h y espectaculares vistas al mar.', '4300000.00', 0, 'inmueble6.jpg');

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
(1, 'La actividad inmobiliaria en España está un 30% por debajo de los máximos de 2007', 'El sector inmobiliario y de la construcción en España registró en el tercer trimestre de 2017 unos niveles de actividad un 30% por debajo de los máximos registrados en 2007, según el nuevo Indice Registral de Actividad Inmobiliaria (IRAI), un indicador elaborado por el Colegio de Registradores para medir globalmente la actividad del sector.\r\n\r\nEn el último trimestre, los datos muestran un IRAI de 98,26 frente al 139,90 registrado el año previo al estallido de la última gran crisis económica. Sin embargo, desde los mínimos históricos de 68 a los que cayó en 2013, el sector ya ha recuperado un 45% hasta ahora.\r\n\r\nSolo en lo que va de año, la actividad inmobiliaria y de la construcción ha avanzado un 10%, partiendo de índice IRAI de 89 que se registró en diciembre del pasado año. Los grupos con una mayor repercusión positiva en este 10% de incremento durante los nueve primeros meses del año han sido la compraventa, especialmente de viviendas nuevas y usadas y el número de hipotecas registrado. En concreto, la compraventa de viviendas nuevas ha crecido en estos nueve meses un 32%, mientras que la usada lo ha hecho en un 27%. En cuanto al número de hipotecas, el avance ha sido del 16%. Por su parte, desde el punto de vista mercantil, el mayor impulso de la actividad se debe al descenso en el número de concurso de acreedores, tanto de empresas de construcción, que ha bajado un 83%, como en sociedades inmobiliarias, que ha descendido un 57%.', 'noticia1.jpg', '2017-12-04'),
(2, 'La inspección masiva del Catastro hace subir el IBI hasta un 8 % en los concellos', 'El plan de regularización catastral ha provocado que se destapen en Galicia 346.000 inmuebles no declarados y que en los últimos cuatro años -desde que se inició esta inspección- el recibo medio del impuesto de bienes inmuebles (IBI) se haya incrementado en los municipios gallegos entre un 4 % y un 8 %, según los datos que maneja la Dirección General del Catastro, dependiente del Ministerio de Hacienda. \r\n\r\nEso, al margen de las subidas puntuales que hayan ejecutado los propios concellos durante este tiempo. El hecho de que aflore un bien oculto -una nueva construcción, una piscina, una ampliación o una reforma- hace que aumente el valor catastral de esa propiedad y, en consecuencia, el impuesto que se paga por ella a las arcas municipales. \r\n\r\nEn la provincia de A Coruña, el incremento medio del recibo del IBI de los municipios acogidos a la regularización ha sido del 4,93 %; en la de Ourense, del 3,77 %; en Pontevedra, del 5,32 %; y en la provincia de Lugo, la más onerosa, del 7,83 %. Hay que tener en cuenta que en este territorio es donde Hacienda ha peinado más ayuntamientos. De los 346.199 inmuebles descubiertos en Galicia, 93.946 corresponden a esta provincia, es decir, casi el 27 %.', 'noticia17.jpg', '2017-12-07'),
(3, 'Madrid y Cataluña resucitan la burbuja inmobiliaria', 'Las viviendas en la Comunidad de Madrid y en Cataluña se están encareciendo a unos ritmos propios de la época de la burbuja inmobiliaria. De hecho, en la región madrileña ni siquiera en aquel momento se registró un incremento tan fuerte como el que se produjo durante el tercer trimestre del presente año. \r\n\r\nSegún el índice de precios de vivienda que ayer publicó el Instituto Nacional de Estadística (INE), la variación respecto al mismo periodo de 2016 fue de más del 12% en la comunidad de la capital del país. El dato supera el 11,3% que se registró en el primer trimestre de 2007, momento en el que comienza la serie histórica del INE y cuando los precios de la vivienda libre subían a niveles históricamente altos como consecuencia de la burbuja del ladrillo.\r\n\r\nCataluña, por su parte, no llega a alcanzar el ritmo del 11% al que se encarecía la vivienda en la región durante los primeros meses de 2007. ', 'noticia3.png', '2017-12-06'),
(4, 'Las inmobiliarias, el nuevo sector estrella en Bolsa', 'Las compañías ligadas al ladrillo brillan con luz propia este año en Bolsa. De media, suben un 17,5% en 2017 y su capitalización ha aumentado en conjunto en más de 2.900 millones. Pese a estas marcas, siguen teniendo recorrido, según los expertos.\r\n\r\nEl sector inmobiliario centra este año las miradas en el mercado. Tras una década donde ninguna promotora inmobiliaria salía a Bolsa, este año, dos de ellas (Neinor y Aedas) han saltado al parqué; mientras que la histórica Colonial, convertida en Socimi en junio, protagoniza una operación de más de 1.200 millones al lanzar, el pasado 13 de noviembre, una opa sobre su homóloga Axiare.\r\n\r\nTodas estas operaciones han puesto en el foco en este tipo de empresas que, tras años fuera de la lista de recomendaciones bursátiles, cuentan en su mayoría con el apoyo de los analistas.\r\n\r\nLa recuperación del mercado de la vivienda y la buena marcha del sector gracias a la mejora económica juegan a favor de estos valores para el medio plazo. Por contra, la elevada exposición a algunos mercados, como puede ser el catalán, o el poco recorrido de alguna de ellas, penaliza su evolución en el parqué.', 'noticia4.jpg', '2017-12-05'),
(5, 'Piratas inmobiliarios a la vista', 'Un temor ha comenzado a recorrer el sector inmobiliario: el desembarco de empresas poco profesionales. La aparición de estas compañías, de filosofía oportunista y que vienen a coger la ola del ciclo positivo, está creando inquietud entre algunas de las grandes firmas consolidadas, recelosas de que puedan afectar -para mal- a la remozada imagen empresarial, que tanto ha costado recuperar, de una actividad que está siempre en la picota. \r\n\r\nBasta con mirar una década atrás, cuando ser promotor o comercial inmobiliario sin experiencia se puso de moda, para comprender la preocupación de las compañías más experimentadas, tanto las que han aguantado el tipo en la crisis como las de nuevo cuño que han ayudado a relanzar el mercado (dícese, por ejemplo, Neinor Homes o Aedas Homes). Este riesgo de irrupción de firmas primerizas al calor del dinero fácil es uno de los retos (a mitigar) del nuevo ciclo inmobiliario.\r\n\r\nPrecisamente, los chiringuitos, término con el que se llamó en la época del boom a los aficionados que hicieron todo un abordaje del ladrillo, contribuyeron a la creación de la burbuja y, sobre todo, dañaron la reputación del sector con su mala gestión. Evidentemente, estos pseudoprofesionales fueron los primeros a los que se llevó por delante la crisis inmobiliaria.\r\n\r\n¿Qué pasó entonces? Hace 10 años, la barra libre de crédito avivó los proyectos residenciales (muchos sin demasiado criterio) y la creación de promotoras (sólo en el nombre). ', 'noticia5.jpg', '2017-12-09');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
