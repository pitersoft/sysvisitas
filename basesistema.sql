-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2021 a las 02:37:22
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basesistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `idacceso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha_hora_acceso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_modificacion` datetime NOT NULL,
  `ip_conexion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`idacceso`, `idusuario`, `fecha_hora_acceso`, `fecha_modificacion`, `ip_conexion`) VALUES
(1, 2, '2021-03-12 21:05:46', '2021-03-12 17:02:51', '132332323'),
(2, 3, '2021-03-12 21:03:46', '2021-03-12 17:02:51', '45635430'),
(3, 4, '2021-03-12 21:28:35', '2021-03-12 17:02:51', '245543453'),
(4, 5, '2021-03-12 21:29:37', '2021-03-12 17:02:51', '74454254'),
(5, 6, '2021-03-12 21:30:06', '2021-03-12 17:02:51', '15782584'),
(6, 7, '2021-03-12 21:30:54', '2021-03-12 17:02:51', '78994562'),
(7, 8, '2021-03-12 21:32:03', '2021-03-12 17:02:51', '142424175'),
(8, 1, '2021-03-15 22:24:37', '2021-03-15 17:24:37', '321421426l'),
(9, 1, '2021-03-16 22:29:33', '2021-03-16 17:29:33', 'i42434241412'),
(10, 9, '2021-03-17 21:57:48', '2021-03-17 16:57:48', 'jk4452546'),
(11, 11, '2021-03-19 22:01:33', '2021-03-19 17:01:33', '8523358hg'),
(12, 11, '2021-03-19 22:03:25', '2021-03-19 17:03:25', 'hg254645645');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `idnivel` int(11) NOT NULL,
  `nivel` varchar(40) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`idnivel`, `nivel`, `descripcion`, `estado`) VALUES
(1, 'Cliente', 'Persona Natural que compra productos para su consumo.', '1'),
(2, 'Vendedor', 'Persona Natural o Jurídica que vende los productos comprados.', '1'),
(3, 'Proovedor', 'Persona Jurídica encargada del abastecimiento de los productos.', '1'),
(4, 'Controlador', 'Registra visitas en el sistema.', '1'),
(5, 'Supervisor', 'Encargado de supervisar.', '1'),
(6, 'Administrador', 'Encargado de administrar.', '1'),
(7, 'Contador', 'Contador.', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` int(11) NOT NULL,
  `idnivel` int(11) NOT NULL,
  `usuarios` int(11) NOT NULL,
  `personas` int(11) NOT NULL,
  `visitas` int(11) NOT NULL,
  `permisos` int(11) NOT NULL,
  `reporte_permisos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `idnivel`, `usuarios`, `personas`, `visitas`, `permisos`, `reporte_permisos`) VALUES
(1, 1, 0, 0, 0, 0, 0),
(2, 2, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0, 0),
(4, 4, 0, 0, 1, 0, 0),
(5, 6, 1, 1, 1, 1, 1),
(6, 7, 0, 0, 0, 0, 0),
(7, 5, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idpersona` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellido_pat` varchar(50) NOT NULL,
  `apellido_mat` varchar(50) NOT NULL,
  `dni` int(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` int(15) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idpersona`, `nombres`, `apellido_pat`, `apellido_mat`, `dni`, `fecha_nacimiento`, `telefono`, `direccion`) VALUES
(1, 'Gustavo Rivaldo', 'Graos', 'Santos', 44636445, '2003-04-01', 910183710, 'Mz 01 Lt 11 Las Palmeras'),
(2, 'Jorge Luis', 'Sanchez', 'Quispe', 78945625, '1999-10-15', 921424524, 'Mz 17 Lt 09 Las Palmeras'),
(3, 'Fernando Eduardo ', 'Jimenez', 'Perez', 77789825, '2021-05-01', 987654321, 'N°256 Avenida Egipto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idnivel` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(18) NOT NULL,
  `login` int(1) NOT NULL,
  `estado` int(1) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_comunicacion` datetime NOT NULL,
  `perfil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idnivel`, `nombre`, `apellidos`, `email`, `password`, `login`, `estado`, `fecha_creacion`, `fecha_comunicacion`, `perfil`) VALUES
(1, 6, 'Gustavo Rivaldo', 'Graos Santos', 'grgs95859@gmail.com', '123456', 1, 1, '2021-04-22 22:02:30', '2021-03-15 17:03:45', 'myAvatar.png'),
(2, 2, ' La Esquina', 'Bodega', 'bodegalaesquina@gmail.com', '14242424545757', 0, 1, '2021-04-22 23:23:31', '2021-03-15 17:03:45', 'perfil.png'),
(3, 3, 'LG', 'Empresa de electrodomesticos', 'lg@gmail.com', '77565554575', 0, 1, '2021-04-22 22:04:04', '2021-03-15 17:03:45', 'perfil.png'),
(4, 1, 'Andres', 'Jimenez Quispe', 'andresjq@gmail.com', '1424242657', 0, 1, '2021-04-10 04:27:24', '2021-03-15 17:03:45', 'perfil.png'),
(5, 2, 'EL Comercio', 'Bodega', 'el comercio@gmail.com', '1424242545', 0, 1, '2021-04-10 04:27:26', '2021-03-15 17:03:45', 'perfil.png'),
(6, 3, 'Doña Gumi', 'Abarrotes', 'contacto@doñagumi.com.pe', '142424242142', 0, 1, '2021-04-10 04:27:28', '2021-03-15 17:03:45', 'perfil.png'),
(7, 1, 'Fernado', 'Gomez Perez', 'fernandogp@gmail.com', '14242424211', 0, 1, '2021-04-10 04:27:30', '2021-03-15 17:03:45', 'perfil.png'),
(8, 3, 'Reyes', 'Articulos de Plásticos', 'contacto@reyes.com', '1424242414', 0, 1, '2021-04-10 04:27:31', '2021-03-15 17:03:45', 'perfil.png'),
(9, 2, 'Vallejo', 'Bodega', 'bvallejo@gmail.com', '14242425445', 0, 1, '2021-04-10 04:27:35', '2021-03-15 17:03:45', 'perfil.png'),
(10, 3, 'A1', 'Abarrotes', 'contacto@a1.com.pe', 'jhko475a1', 0, 1, '2021-04-10 04:27:38', '2021-03-18 18:59:12', 'perfil.png'),
(11, 2, 'Huerta Grande ', 'Bodega', 'huertagrande@gmail.com', 'huertagrande', 0, 1, '2021-04-10 04:27:41', '2021-03-19 16:58:26', 'perfil.png'),
(12, 3, 'Epson', 'Impresoras', 'contacto@epson.com.pe', 'epson12345', 0, 1, '2021-04-10 04:27:44', '0000-00-00 00:00:00', 'perfil.png'),
(13, 6, 'Administrador', 'admin', 'admin@gmail.com', 'admin', 1, 1, '2021-04-22 01:31:54', '0000-00-00 00:00:00', 'circle-cropped (1).png'),
(14, 1, 'Gustavo', 'Santos', 'gustavograos01@gmail.com', 'parkour123', 0, 1, '2021-04-22 21:31:35', '0000-00-00 00:00:00', 'descarga (2).jpg'),
(15, 4, 'Gustavo', 'Santos', 'controlador@gmail.com', 'controlador', 1, 1, '2021-04-22 21:19:12', '0000-00-00 00:00:00', 'perfil.png'),
(16, 5, 'Supervisor', 'Supervisor', 'supervisor@gmail.com', 'supervisor', 0, 1, '2021-04-22 21:21:37', '0000-00-00 00:00:00', 'perfil.png'),
(17, 7, 'Contador', 'Contador', 'contador@gmail.com', 'contador', 0, 1, '2021-04-22 21:23:05', '0000-00-00 00:00:00', 'perfil.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `codigo_visita` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `fh_ingreso` datetime NOT NULL,
  `fh_salida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`codigo_visita`, `idpersona`, `fh_ingreso`, `fh_salida`) VALUES
(1, 1, '2021-04-06 12:33:00', '2021-04-06 20:33:00'),
(2, 2, '2021-04-05 12:33:00', '2021-04-05 20:33:00'),
(3, 1, '2021-04-07 19:52:00', '2021-04-07 23:52:00'),
(4, 3, '2021-03-31 16:03:00', '2021-04-01 16:03:00'),
(5, 2, '2021-04-14 18:03:58', '2021-04-14 18:03:58'),
(6, 3, '2021-04-13 18:04:17', '2021-04-15 18:04:23'),
(7, 1, '2021-04-08 17:55:00', '2021-04-08 18:56:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`idacceso`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`idnivel`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`codigo_visita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `idacceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `idnivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `codigo_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
