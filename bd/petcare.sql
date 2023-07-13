-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2023 a las 15:52:21
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
-- Base de datos: `petcare`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(35) DEFAULT NULL,
  `apellidos` varchar(35) DEFAULT NULL,
  `dni` char(8) DEFAULT NULL,
  `telefono` char(9) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `sexo` varchar(9) NOT NULL,
  `fechaNac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `idusuario`, `nombres`, `apellidos`, `dni`, `telefono`, `direccion`, `foto`, `sexo`, `fechaNac`) VALUES
(1, 21, 'Pedro', 'Suarez Vertiz', '45987321', '987458621', 'Av. Amancaes 852', 'admin1.jpg', 'Masculino', '1990-05-04'),
(2, 22, 'Vanesa', 'Perez', '85274136', '963852741', 'Av. Izaguirre 1230', 'admin2.jpg', 'Femenino', '1997-12-08'),
(3, 30, 'Ana', 'Montero', '78456123', '987654123', 'Lima', 'e2a9aa11df9d7d92325ebb2c3068d7e3.jpg    ', 'Femenino', '1998-07-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idcita` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idmascota` int(11) DEFAULT NULL,
  `idhorario` int(11) DEFAULT NULL,
  `estadoAtencion` varchar(15) DEFAULT NULL,
  `fechacreacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idcita`, `idcliente`, `idmascota`, `idhorario`, `estadoAtencion`, `fechacreacion`) VALUES
(1, 1, 1, 2, '1', '2023-07-07 18:07:56'),
(2, 22, 3, 3, '0', '2023-07-07 18:10:30'),
(3, 22, 5, 4, '2', '2023-07-07 18:13:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(35) DEFAULT NULL,
  `apellidos` varchar(35) DEFAULT NULL,
  `dni` char(8) DEFAULT NULL,
  `telefono` char(9) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `sexo` varchar(9) NOT NULL,
  `fechaNac` date DEFAULT NULL,
  `puntosacumulados` int(11) NOT NULL,
  `puntoscanjeados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='			';

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `idusuario`, `nombres`, `apellidos`, `dni`, `telefono`, `direccion`, `foto`, `sexo`, `fechaNac`, `puntosacumulados`, `puntoscanjeados`) VALUES
(1, 1, 'Cristhian', 'Valladolid', '12345678', '987654123', 'Lima', 'perfil2.png', 'Masculino', '2023-05-17', 27, 0),
(2, 2, 'Jorge', 'Cortez', '76016369', '975462500', 'Av. Amaliga Puga 613', 'cliente2.jpg', 'Masculino', '1997-05-04', 4, 0),
(3, 3, 'Alexis Erickson', 'Perez Bazalar', '96385241', '987654321', 'Calle Perricholli 523', 'cliente3.jpg', 'Masculino', '1997-08-20', 18, 0),
(4, 4, 'Alexis', 'Bazalar Torres', '85274163', '987654321', 'Calle Perricholli 523', 'cliente3.jpg', 'Masculino', '1996-07-30', 2, 0),
(5, 5, 'Dylan ', 'Pacheco Pacheco', '56432178', '987654321', 'Av. Colonial 3525', 'cliente4.jpg', 'Masculino', '1993-06-15', 4, 0),
(6, 6, 'Celia', 'Cruz', '56932147', '998752632', 'Calle Amancaes 369', 'cliente5.png', 'Femenino', '1988-07-21', 2, 0),
(7, 7, 'Paula', 'Heredia', '68754123', '995651660', 'Jr. Washington 289', 'cliente6.jpg', 'Femenino', '1999-03-25', 7, 0),
(8, 8, 'Luisa', 'Martinez', '45698712', '987654123', 'Calle Castilla 852', 'cliente7.jpg', 'Femenino', '1992-06-05', 50, 0),
(9, 9, 'Samuel', 'Becerra', '65432178', '923456987', 'Av. Benavides 1236', 'cliente8_h.jpg', 'Masculino', '1996-08-23', 3, 0),
(10, 10, 'Drake', 'Bell', '78945612', '998877665', 'Jr. Castilla 789', 'cliente9_h.jpg', 'Masculino', '2001-12-20', 2, 0),
(11, 11, 'Josh', 'Bell', '36985214', '998765421', 'Jr. de la Unión 523', 'cliente10_h.jpg', 'Masculino', '1998-07-14', 7, 0),
(12, 12, 'Bryan', 'Perez', '52367894', '998822331', 'Las Malvinas 4532', 'cliente11_h.jpg', 'Masculino', '1996-03-13', 0, 0),
(13, 13, 'Jorge', 'Pacheco', '85274196', '998765421', 'Av. Los Jardines', 'cliente12_h.jpg', 'Masculino', '1999-12-23', 5, 0),
(14, 14, 'Ricardo', 'Osorio', '96385274', '987475862', 'Calle las flores', 'cliente13_h.jpg', 'Masculino', '1995-12-11', 5, 0),
(15, 15, 'Pedro', 'Osorio', '65432178', '987654321', 'Calle Machu Picchu 654', 'cliente14_h.jpg', 'Masculino', '1992-02-18', 6, 0),
(16, 16, 'Diana', 'Barrientos', '45612308', '987654123', 'Av. Los insurgentes 963', 'cliente15_m.jpg', 'Femenino', '1994-11-14', 6, 0),
(17, 17, 'Gabriela', 'Rosario', '98745612', '996654213', 'Av. Argentina 1200', 'cliente16_m.jpg', 'Femenino', '1994-11-19', 6, 0),
(18, 18, 'Tina', 'Duarte', '45632178', '998765412', 'Jr. Las Palmera 500', 'cliente18_m.jpg', 'Femenino', '1984-10-23', 6, 0),
(19, 19, 'Mirtha', 'Reyes', '78945612', '998877552', 'Av. Venezuela 3210', 'cliente19_m.jpg', 'Femenino', '1996-06-17', 6, 0),
(20, 20, 'Teresa', 'Moreno', '74185236', '998822550', 'Jr. Las Casuarinas 5230', 'cliente20_m.jpg', 'Femenino', '1997-02-04', 6, 0),
(22, 33, 'Clara', 'vaallejo', '47896558', '956856523', 'Jr. 300', 'playology-dri-tech.jpg', 'Femenino', '2001-05-01', 0, 0),
(23, 34, 'Alfonso', 'Carrasco', '12345678', '941297309', 'Av. Brasil 543', 'predeterminadoHombre.jpg', 'Masculino', '1999-04-12', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallevacuna`
--

CREATE TABLE `detallevacuna` (
  `iddetallevacuna` int(11) NOT NULL,
  `idmascota` int(11) DEFAULT NULL,
  `idvacuna` int(11) DEFAULT NULL,
  `idveterinario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT current_timestamp(),
  `proxFecha` date DEFAULT NULL,
  `observacion` varchar(55) DEFAULT NULL,
  `restricciones` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallevacuna`
--

INSERT INTO `detallevacuna` (`iddetallevacuna`, `idmascota`, `idvacuna`, `idveterinario`, `fecha`, `proxFecha`, `observacion`, `restricciones`) VALUES
(1, 1, 1, 1, '2023-06-06', '2023-06-05', 'Ninguna', 'Ninguna'),
(2, 5, 1, 7, '2023-06-08', '2023-07-01', 'Na', 'NA'),
(3, 1, 4, 1, '2023-03-28', '2023-04-28', 'Ninguna', 'Ninguna'),
(4, 2, 3, 1, '2023-01-19', '2023-02-03', 'Ninguna', 'Ninguna'),
(5, 4, 7, 2, '2023-06-01', '2023-07-01', 'Ninguna', 'Ninguna'),
(6, 6, 10, 3, '2023-02-13', '2023-05-13', 'Ninguna', 'Ninguna'),
(7, 6, 13, 4, '2023-04-15', '2023-07-15', 'Ninguna', 'Ninguna'),
(8, 6, 16, 5, '2023-05-29', '2023-08-29', 'Ninguna', 'Ninguna'),
(9, 7, 11, 5, '2023-03-02', '2023-06-02', 'Ninguna', 'Ninguna'),
(10, 7, 8, 6, '2023-01-31', '0000-00-00', 'Ninguna', 'Ninguna'),
(11, 1, 7, 7, '2023-04-07', '2023-05-07', 'Ninguna', 'Ninguna'),
(12, 12, 17, 8, '2023-05-12', '2023-08-12', 'Ninguna', 'Ninguna'),
(13, 13, 18, 5, '2023-02-07', '2023-05-07', 'Ninguna', 'Ninguna'),
(14, 14, 7, 5, '2023-06-05', '2023-07-05', 'Ninguna', 'Ninguna'),
(15, 13, 18, 2, '2023-01-25', '2023-04-25', 'Ninguna', 'Ninguna'),
(16, 3, 4, 4, '2023-04-26', '2023-05-26', 'Ninguna', 'Ninguna'),
(17, 5, 4, 1, '2023-03-08', '2023-04-08', 'Ninguna', 'Ninguna'),
(18, 6, 4, 2, '2023-06-18', '2023-07-18', 'Ninguna', 'Ninguna'),
(19, 7, 17, 8, '2023-05-02', '2023-08-02', 'Ninguna', 'Ninguna'),
(20, 10, 10, 8, '2023-02-22', '2023-05-22', 'Ninguna', 'Ninguna'),
(21, 10, 16, 4, '2023-03-14', '2023-05-14', 'Ninguna', 'Ninguna'),
(22, 10, 7, 4, '2023-06-23', '2023-07-23', 'Ninguna', 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `iddetalleventa` int(11) NOT NULL,
  `idventa` int(11) DEFAULT NULL,
  `idproductoservicio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `importe` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`iddetalleventa`, `idventa`, `idproductoservicio`, `cantidad`, `importe`) VALUES
(1, 1, 1, 2, 99.80),
(2, 2, 1, 1, 49.90),
(3, 3, 3, 2, 119.90),
(4, 4, 8, 2, 39.80),
(5, 5, 2, 3, 179.70),
(6, 6, 5, 1, 19.90),
(7, 7, 9, 2, 39.90),
(8, 8, 12, 1, 24.90),
(9, 9, 16, 2, 69.80),
(10, 10, 18, 5, 499.50),
(11, 11, 33, 1, 29.90),
(12, 12, 5, 1, 19.90),
(13, 13, 43, 4, 16.80),
(14, 14, 54, 1, 19.90),
(15, 15, 60, 2, 72.00),
(16, 16, 45, 1, 4.90),
(17, 17, 1, 1, 49.90),
(18, 18, 1, 1, 49.90),
(19, 19, 3, 1, 59.90),
(20, 20, 3, 1, 59.90),
(21, 21, 3, 1, 59.90),
(22, 22, 3, 1, 59.90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `idespecie` int(11) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`idespecie`, `nombre`, `estado`) VALUES
(1, 'Perro', '1'),
(2, 'Gato', '1'),
(3, 'Conejo', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL,
  `idveterinario` int(11) DEFAULT NULL,
  `idproductoservicio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horarioinicio` time(6) DEFAULT NULL,
  `horariofin` time(6) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `idveterinario`, `idproductoservicio`, `fecha`, `horarioinicio`, `horariofin`, `estado`) VALUES
(1, 1, 1, '2023-07-07', '10:00:00.000000', '11:00:00.000000', '0'),
(2, 7, 7, '2023-07-07', '08:00:00.000000', '09:00:00.000000', '1'),
(3, 7, 1, '2023-07-07', '08:00:00.000000', '09:00:00.000000', '0'),
(4, 7, 28, '2023-07-07', '15:00:00.000000', '16:00:00.000000', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idmascota` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idraza` int(11) DEFAULT NULL,
  `nombre` varchar(35) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `peso` decimal(4,2) DEFAULT NULL,
  `color` varchar(17) DEFAULT NULL,
  `fotoPerfil` varchar(100) DEFAULT NULL,
  `esterilizado` char(2) DEFAULT NULL,
  `etapa` varchar(15) DEFAULT NULL,
  `fechaRegistro` date DEFAULT current_timestamp(),
  `renian` int(11) NOT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`idmascota`, `idcliente`, `idraza`, `nombre`, `fechaNac`, `peso`, `color`, `fotoPerfil`, `esterilizado`, `etapa`, `fechaRegistro`, `renian`, `sexo`, `estado`) VALUES
(1, 1, 1, 'Cookie', '2013-05-02', 5.00, 'marrón', 'footerperro.jpg', 'SI', 'Cria', '2023-05-19', 20345678, 'Macho', '1'),
(2, 2, 2, 'Pelusa', '2020-05-01', 10.50, 'negro', 'cocker.jpeg', 'SI', 'Juvenil', '2023-05-19', 10236547, 'Hembra', '1'),
(3, 3, 3, 'Boby', '2022-05-04', 9.00, 'crema', 'Labrador.jpeg', 'SI', 'Juvenil', '2023-05-19', 23657410, 'Macho', '1'),
(4, 4, 4, 'Speedy', '2020-05-01', 10.20, 'marrón oscuro', 'Pastor alemán.jpeg', 'SI', 'Adulto', '2023-05-19', 74125896, 'Macho', '1'),
(5, 5, 5, 'Motita', '2018-05-09', 12.00, 'Plomo', 'Schnauzer.jpeg', 'SI', 'Juvenil', '2023-05-19', 12365478, 'Hembra', '1'),
(6, 6, 6, 'Lobo', '2015-05-15', 20.00, 'Plomo', 'Siberiano.jpeg', 'NO', 'Adulto', '2023-05-19', 36985214, 'Macho', '1'),
(7, 7, 7, 'Michi', '2020-05-08', 8.00, 'blanco', 'Elfo.jpg', 'NO', 'Juvenil', '2023-05-19', 23654178, 'Macho', '1'),
(10, 1, 1, 'Toffe', '2022-06-15', 9.45, 'Marron', 'Chihuahua.jpeg', 'SI', 'Cria', '2023-06-04', 123, 'Macho', '1'),
(11, 1, 3, 'Nova', '2018-03-29', 12.30, 'Negro', 'huella.jpg', 'SI', 'Adulto', '2023-06-08', 1234, 'Hembra', '1'),
(12, 1, 8, 'Mascota', '2022-03-01', 13.45, 'Marron', 'huella.jpg', 'SI', 'Cria', '2023-06-08', 555, 'Macho', '1'),
(13, 1, 13, 'Rayo', '2021-01-01', 7.00, 'blanco marron', 'cuidados_del_conejo_belier_7683_orig.jpg', 'SI', 'Juvenil', '2023-06-09', 987159, 'Macho', '1'),
(14, 1, 2, 'Peluche', '2013-04-10', 12.00, 'blanco', 'huella.jpg', 'SI', 'Adulto', '2023-06-16', 1542, 'Macho', '1'),
(15, 23, 3, 'Nova', '2005-06-28', 12.30, 'negro', 'huella.jpg', 'SI', 'Juvenil', '2023-07-03', 789963, 'Hembra', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoservicio`
--

CREATE TABLE `productoservicio` (
  `idproductoservicio` int(11) NOT NULL,
  `idtipoproductoservicio` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fotoProductoServicio` varchar(100) NOT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productoservicio`
--

INSERT INTO `productoservicio` (`idproductoservicio`, `idtipoproductoservicio`, `nombre`, `precio`, `descripcion`, `fotoProductoServicio`, `estado`) VALUES
(1, 2, 'servicio baño', 49.90, 'servicio de baño para perros', 'lavar-perro-mascota-casa.jpg', '1'),
(2, 2, 'servicio baño y corte', 59.90, 'servicio de baño y corte para perros', 'Baño y corte.jpeg', '1'),
(3, 2, 'servicio deslanado', 59.90, 'servicio de deslanado para perros', 'Deslanado.jpg', '1'),
(4, 2, 'servicio desmotado', 69.90, 'servicio de desmotado para perros', 'Desmotado.jpg', '1'),
(5, 4, 'hamburguesa de goma', 19.90, 'juguete hamburguesa de goma', 'Hamburguesa de goma.jpg', '1'),
(6, 4, 'hueso dental pet star rojo', 19.90, 'juguete hueso dental pet star rojo', 'Hueso dental Pet Star rojo.jpg', '1'),
(7, 5, 'jalador de doble soga pet star', 29.90, 'juguete jalador de doble soga pet star', 'Jalador de doble soga Pet Star.jpg', '1'),
(8, 4, 'pelota de tennis', 19.90, 'juguete pelota de tennis', 'Pelota de tenis Pet Star.jpg', '1'),
(9, 4, 'cactus pet star', 19.90, 'juguete cactus pet star', 'Juguete cactus Pet Star.jpg', '1'),
(10, 4, 'mordedor cupcake', 19.90, 'juguete mordedor cupcake', 'Juguete mordedor Cupckae.jpg', '1'),
(11, 4, 'piña pet star', 24.90, 'juguete piña pet star', 'Juguete piña Pet Star.jpg', '1'),
(12, 4, 'vaca pet star', 24.90, 'juguete vaca pet star', 'Juguete vaca Pet Star.jpg', '1'),
(13, 4, 'pelota de tenis pet star', 19.90, 'juguete pelota de tenis pet star', 'Pelota de tenis Pet Star.jpg', '1'),
(14, 4, 'hueso dental pet star rojo', 29.90, 'juguete hueso dental pet star rojo', 'Hueso dental Pet Star rojo.jpg', '1'),
(15, 5, 'jalador de doble soga pet star', 34.90, 'juguete jalador de doble soga pet star', 'Jalador de doble soga Pet Star.jpg', '1'),
(16, 5, 'soga con nudo color azul', 34.90, 'juguete soga con nudo color azul', 'Soga con nudo color azul Rybiu import.jpg', '1'),
(17, 1, 'comida adulto bell 15kg', 69.90, 'comida adulto bell 15kg', 'Comida adulto Bell´s 15 kg.jpg', '1'),
(18, 1, 'comida adulto bell 25kg', 99.90, 'comida adulto bell 25kg', 'Comida adulto Bell´s 25 kg.jpg', '1'),
(19, 1, 'comida adulto mimaskot 15kg', 107.80, 'comida adulto mimaskot 15kg', 'Comida adulto Mimaskot 15 kg.jpg', '1'),
(20, 1, 'comida adulto nutrican 25kg', 129.90, 'comida adulto nutrican 25kg', 'Comida adulto Nutrican 25 kg.jpg', '1'),
(21, 1, 'comida cachorro bell 2kg', 12.90, 'comida cachorro bell 2kg', 'Comida cachorro Bell´s 2kg.jpg', '1'),
(22, 1, 'comida cachorro bell 15kg', 87.90, 'comida cachorro bell 15kg', 'Comida cachorro Bell´s 15kg.jpg', '1'),
(23, 1, 'comida cachorro razas pequeñas 3kg', 33.50, 'comida cachorro razas pequeñas 3kg', 'Comida cachorro razas pequeñas 3kg.jpg', '1'),
(24, 1, 'Galleta adultos ricocrack 500g', 14.00, 'Galleta adultos ricocrack 500g', 'Galleta adultos RicoCrack 500g.jpg', '1'),
(25, 1, 'Razas pequeñas pedegree 100kg', 2.90, 'Razas pequeñas pedegree 100kg', 'Razas pequeñas Pedegree 10kg.jpg', '1'),
(26, 1, 'Snack Dentitoy baby barrita paquete 6und', 39.90, 'Snack Dentitoy baby barrita paquete 6und', 'Snack DENTITOY Baby Barrita Paquete 6un.jpg', '1'),
(27, 7, 'servicio baño', 49.90, 'servicio de baño para gatos', 'BañoGato.jpg', '1'),
(28, 7, 'servicio corte de uñas', 59.90, 'servicio corte de uñas para gatos', 'Corte de uñas.jpg', '1'),
(29, 7, 'servicio limpieza de oidos', 69.90, 'servicio limpieza de oidos para gatos', 'Limpieza de oídos.jpg', '1'),
(30, 10, 'juguete centro de actividad', 69.90, 'juguete centro de actividad', 'Centro de actividad.jpg', '1'),
(31, 9, 'juguete distractor', 19.90, 'juguete distractor', 'juguete distractor.jpg', '1'),
(32, 9, 'juguete gato mariposa', 19.90, 'juguete gato mariposa', 'juguete gato mariposa.jpg', '1'),
(33, 9, 'juguete juguete interactivo gato', 29.90, 'juguete juguete interactivo gato', 'juguete interactivo gato.jpg', '1'),
(34, 9, 'juguete pajaro azul', 19.90, 'juguete pajaro azul', 'pájaro azul juguete.jpg', '1'),
(35, 9, 'juguete pescado interactivo', 19.90, 'juguete pescado interactivo', 'pescado interactivo.jpg', '1'),
(36, 9, 'juguete pluma giratoria', 19.90, 'juguete pluma giratoria', 'pluma giratoria.jpg', '1'),
(37, 10, 'juguete rascador gimnasio y cama', 122.90, 'juguete rascador gimnasio y cama', 'Rascador gimnasio con cama y juguete.jpg', '1'),
(38, 9, 'juguete raton casero con plumas', 19.90, 'juguete raton casero con plumas', 'Ratón casero con plumas.jpg', '1'),
(39, 9, 'juguete varita magica', 19.90, 'juguete varita magica', 'varita mágica.jpg', '1'),
(40, 6, 'comida en lata fancy feast', 49.90, 'comida en lata fancy feast', 'Comida en lata Fancy Feast.jpg', '1'),
(41, 6, 'comida en lata felix', 49.90, 'comida en lata felix', 'Comida en lata Felix.jpg', '1'),
(42, 6, 'comida en lata ricocat', 6.50, 'comida en lata ricocat', 'Comida en lata Ricocat.jpg', '1'),
(43, 6, 'comida en trocitos ricocat', 4.20, 'comida en trocitos ricocat', 'Comida en trocitos lata Ricocat.jpg', '1'),
(44, 6, 'comida gato adulto bells', 77.90, 'comida gato adulto bells', 'Comida gato adulto Bells.jpg', '1'),
(45, 6, 'comida gato adulto carne Sheba', 4.90, 'comida gato adulto carne Sheba', 'Comida gato adulto carne Sheba.jpg', '1'),
(46, 6, 'comida gato adulto Friskies', 99.90, 'comida gato adulto Friskies', 'Comida gato adulto Friskies.jpg', '1'),
(47, 6, 'comida gato adulto salmón Purina One', 89.90, 'comida gato adulto salmón Purina One', 'Comida gato adulto salmón Purina One.jpg', '1'),
(48, 6, 'comida gato carne Cat Chow', 103.90, 'comida gato carne Cat Chow', 'Comida gato carne Cat Chow.jpg', '1'),
(49, 6, 'comida gato carne Whiskas', 129.90, 'comida gato carne Whiskas', 'Comida gato carne Whiskas.jpg', '1'),
(50, 12, 'servicio baño', 49.90, 'servicio de baño para conejos', 'bañoConejo.jpg', '1'),
(51, 14, 'conejo pequeño', 19.90, 'juguete conejo pequeño', 'conejo pequeño.jpg', '1'),
(52, 15, 'juguete porta heno', 19.90, 'juguete porta heno', 'Juguete porta heno.jpg', '1'),
(53, 14, 'juguetes naturales', 29.90, 'juguetes naturales', 'juguetes naturales.jpg', '1'),
(54, 14, 'mancuernas de sauce', 19.90, 'juguete mancuernas de sauce', 'mancuernas de sauce.jpg', '1'),
(55, 14, 'robot de madera', 19.90, 'juguete robot de madera', 'robot de madera.jpg', '1'),
(56, 14, 'toy diente', 19.90, 'juguete toy diente', 'Toy diente.jpg', '1'),
(57, 11, 'comida alfalfa king', 167.50, 'comida alfalfa king', 'Alfalfa King.jpg', '1'),
(58, 11, 'comida big bunny', 13.00, 'comida big bunny', 'Big Bunny.jpg', '1'),
(59, 11, 'comida brit adulto', 210.60, 'comida brit adulto', 'Brit adulto.jpg', '1'),
(60, 11, 'comida coneplus adulto', 36.00, 'comida coneplus adulto', 'Coneplus adulto.jpg', '1'),
(61, 11, 'comida hasen heno', 75.00, 'comida hasen heno', 'Hasen heno.jpg', '1'),
(62, 11, 'comida hasen junior', 20.00, 'comida hasen junior', 'Hasen junior.jpg', '1'),
(63, 11, 'comida heno pure hay', 50.00, 'comida heno pure hay', 'Heno Pure hay.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntoscliente`
--

CREATE TABLE `puntoscliente` (
  `idpuntos` int(11) NOT NULL,
  `iddetalleventa` int(11) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puntoscliente`
--

INSERT INTO `puntoscliente` (`idpuntos`, `iddetalleventa`, `puntos`) VALUES
(1, 1, 10),
(2, 2, 5),
(3, 3, 12),
(4, 4, 4),
(5, 5, 18),
(6, 6, 2),
(7, 7, 4),
(8, 8, 2),
(9, 9, 7),
(10, 10, 50),
(11, 11, 3),
(12, 12, 2),
(13, 13, 2),
(14, 14, 2),
(15, 15, 7),
(16, 16, 0),
(17, 17, 5),
(18, 18, 5),
(19, 19, 6),
(20, 20, 6),
(21, 21, 6),
(22, 22, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `idraza` int(11) NOT NULL,
  `idespecie` int(11) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`idraza`, `idespecie`, `nombre`, `estado`) VALUES
(1, 1, 'Chihuahua', '1'),
(2, 1, 'Cocker', '1'),
(3, 1, 'Labrador', '1'),
(4, 1, 'Pastor alemán', '1'),
(5, 1, 'Schnauzer', '1'),
(6, 1, 'Siberiano', '1'),
(7, 2, 'Elfo', '1'),
(8, 2, 'Gato británico', '1'),
(9, 2, 'Himalayo', '1'),
(10, 2, 'Levkoy ucraniano', '1'),
(11, 2, 'Maine coon', '1'),
(12, 2, 'Persa', '1'),
(13, 3, 'Belier', '1'),
(14, 3, 'Blanco de Hotot', '1'),
(15, 3, 'Cabeza de león', '1'),
(16, 3, 'Gigante de flandes', '1'),
(17, 3, 'Rex', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproductoservicio`
--

CREATE TABLE `tipoproductoservicio` (
  `idtipoproductoservicio` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `idespecie` int(11) NOT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoproductoservicio`
--

INSERT INTO `tipoproductoservicio` (`idtipoproductoservicio`, `nombre`, `idespecie`, `estado`) VALUES
(1, 'Comida para perros', 1, '1'),
(2, 'Limpieza para perros', 1, '1'),
(3, 'Cuidado para perros', 1, '3'),
(4, 'Juguetes para perros', 1, '1'),
(5, 'Accesorios para perros', 1, '1'),
(6, 'Comida para gatos', 2, '1'),
(7, 'Limpieza para gatos', 2, '1'),
(8, 'Cuidado para gatos', 2, '3'),
(9, 'Juguetes para gatos', 2, '1'),
(10, 'Accesorios para gatos', 2, '1'),
(11, 'Comida para conejos', 3, '1'),
(12, 'Limpieza para conejos', 3, '1'),
(13, 'Cuidado para conejos', 3, '3'),
(14, 'Juguetes para conejos', 3, '1'),
(15, 'Accesorios para conejos', 3, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `nombre` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `nombre`) VALUES
(1, 'Cliente'),
(2, 'Admin'),
(3, 'Veterinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `fechaCre` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idtipousuario`, `email`, `pass`, `fechaCre`, `estado`) VALUES
(1, 1, 'cristhian@gmail.com', '123', '2023-05-16 23:11:20', '2'),
(2, 1, 'jorgecortez@gmail.com', 'jorge', '2023-05-19 14:57:41', '2'),
(3, 1, 'alexisperez@gmail.com', 'alexis', '2023-05-19 15:00:06', '2'),
(4, 1, 'alexisperez@outlook.com', 'alexis', '2023-05-19 15:19:36', '2'),
(5, 1, 'dylanpacheco@gmail.com', 'dylan', '2023-05-19 15:22:44', '2'),
(6, 1, 'celiacruz@gmail.com', 'celia', '2023-05-19 15:24:58', '2'),
(7, 1, 'paolaheredia@outlook.com', 'paola', '2023-05-19 15:27:43', '2'),
(8, 1, 'luisamartinez@gmail.com', 'luisa', '2023-05-19 15:30:44', '2'),
(9, 1, 'samuelbecerra@outlook.com', 'samuel', '2023-05-19 15:36:29', '2'),
(10, 1, 'drakebell@gmail.com', 'drake', '2023-05-19 15:39:09', '2'),
(11, 1, 'joshbell@outlook.com', 'josh', '2023-05-19 15:42:30', '2'),
(12, 1, 'bryanperez@gmail.com', 'bryan', '2023-05-19 15:45:30', '2'),
(13, 1, 'jorgepacheco@outlook.com', 'jorge', '2023-05-19 15:52:04', '2'),
(14, 1, 'ricardoosorio@gmail.com', 'ricardo', '2023-05-19 16:05:47', '2'),
(15, 1, 'pedroosorio@outlook.com', 'pedro', '2023-05-19 16:18:47', '2'),
(16, 1, 'dianabarrientos@gmail.com', 'diana', '2023-05-19 16:31:05', '2'),
(17, 1, 'gabrielarubio@gmail.com', 'gabriela', '2023-05-19 16:35:56', '2'),
(18, 1, 'tina@hotmail.com', 'tina', '2023-05-19 16:40:51', '2'),
(19, 1, 'mirtha@gmail.com', 'mirtha', '2023-05-19 16:46:43', '2'),
(20, 1, 'teresamoreno@gmail.com', 'teresa', '2023-05-19 16:50:03', '2'),
(21, 2, 'josue@gmail.com', 'josue', '2023-05-19 16:56:13', '2'),
(22, 2, 'vanesaperez@gmail.com', 'vanesa', '2023-05-19 17:02:09', '2'),
(23, 3, 'marymartinez@gmail.com', 'mary', '2023-05-19 17:08:38', '2'),
(25, 3, 'luisgonzales@gmail.com', 'luis', '2023-05-19 17:26:55', '2'),
(26, 3, 'cynthiamamani@gmail.com', 'cynthia', '2023-05-19 17:29:16', '2'),
(27, 3, 'manuelgarcia@gmail.com', 'manuel', '2023-05-19 17:33:37', '2'),
(28, 3, 'oscarfernandez@gmail.com', 'oscar', '2023-05-19 17:36:39', '2'),
(29, 3, 'oliviamamani@gmail.com', 'olivia', '2023-05-19 17:39:52', '2'),
(30, 2, 'ana@gmail.com', '123', '2023-05-31 21:43:40', '2'),
(31, 3, 'veterinario@gmail.com', '123', '2023-06-01 01:00:49', '2'),
(32, 3, 'pacovet@gmail.com', '123', '2023-06-11 23:54:23', '2'),
(33, 1, 'clara@gmail.com', 'clara', '2023-06-17 09:59:06', '2'),
(34, 1, 'pochito@gmail.com', '123', '2023-07-03 20:25:14', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `idvacuna` int(11) NOT NULL,
  `lote` varchar(15) DEFAULT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `estadoLote` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`idvacuna`, `lote`, `tipo`, `descripcion`, `fecha`, `estadoLote`) VALUES
(1, 'H1N1K2', 'COVID', NULL, '2023-05-17 00:46:47', 1),
(2, 'ABC123', 'Viruela', 'Aplica solo a raza adulta', '2023-05-19 19:18:07', 0),
(3, 'C05', 'Antirabico', 'Aplica solo para perros', '2023-06-11 23:57:37', 1),
(4, 'evhc14', 'Enfermedad viral', 'Vacuna contra el moquillo canino', '2023-06-15 10:30:00', 1),
(5, 'rnf35', 'Enfermedad viral', 'Vacuna contra la rinotraqueitis felina', '2023-05-20 16:45:00', 1),
(6, 'mixo87', 'Enfermedad viral', 'Vacuna contra la mixomatosis', '2023-07-01 09:15:00', 1),
(7, 'parvo42', 'Enfermedad viral', 'Vacuna contra la parvovirosis canina', '2023-06-10 14:00:00', 1),
(8, 'panleo56', 'Enfermedad viral', 'Vacuna contra la panleucopenia felina', '2023-06-25 11:45:00', 1),
(9, 'ehvc23', 'Enfermedad viral', 'Vacuna contra la enfermedad hemorrágica viral del conejo (EHVC)', '2023-05-30 08:30:00', 1),
(10, 'rabia78', 'Antirrábica', 'Vacuna contra la rabia canina', '2023-06-05 13:15:00', 1),
(11, 'leufel43', 'Enfermedad viral', 'Vacuna contra la leucemia felina', '2023-06-18 10:00:00', 1),
(12, 'evhc91', 'Enfermedad viral', 'Vacuna contra la enfermedad vírica hemorrágica del conejo (EVHC)', '2023-05-28 15:30:00', 1),
(13, 'tosperr54', 'Enfermedad viral', 'Vacuna contra la tos de las perreras', '2023-06-12 12:45:00', 1),
(14, 'clafel20', 'Enfermedad viral', 'Vacuna contra la clamidia felina', '2023-06-22 09:30:00', 1),
(15, 'calci78', 'Enfermedad viral', 'Vacuna contra la enfermedad de la calcivirosis', '2023-07-03 14:15:00', 1),
(16, 'leptoc16', 'Enfermedad viral', 'Vacuna contra la leptospirosis canina', '2023-06-08 11:00:00', 1),
(17, 'rabfel32', 'Enfermedad viral', 'Vacuna contra la rabia felina', '2023-06-29 08:45:00', 1),
(18, 'pasteo97', 'Enfermedad viral', 'Vacuna contra la pasteurelosis', '2023-05-24 13:30:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idveterinario` int(11) DEFAULT NULL,
  `total` decimal(7,2) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `idcliente`, `idveterinario`, `total`, `fecha`, `estado`) VALUES
(1, 1, 7, 99.80, '2023-06-14 21:51:42', '1'),
(2, 1, 2, 49.90, '2023-06-15 00:52:14', '1'),
(3, 1, 1, 119.90, '2023-01-15 09:30:00', '1'),
(4, 2, 2, 39.80, '2023-01-20 14:45:00', '1'),
(5, 3, 3, 179.70, '2023-02-05 11:20:00', '1'),
(6, 4, 4, 19.90, '2023-02-10 16:10:00', '1'),
(7, 5, 5, 39.90, '2023-02-17 13:05:00', '1'),
(8, 6, 6, 24.90, '2023-02-22 10:15:00', '1'),
(9, 7, 7, 69.80, '2023-03-03 15:40:00', '1'),
(10, 8, 8, 499.50, '2023-03-09 12:25:00', '1'),
(11, 9, 1, 29.90, '2023-03-15 09:55:00', '1'),
(12, 10, 2, 19.90, '2023-03-21 14:00:00', '1'),
(13, 11, 3, 16.80, '2023-03-28 11:35:00', '1'),
(14, 12, 4, 19.90, '2023-04-02 16:55:00', '1'),
(15, 13, 5, 72.00, '2023-04-10 13:50:00', '1'),
(16, 14, 6, 4.90, '2023-04-17 10:40:00', '1'),
(17, 15, 7, 49.90, '2023-04-23 15:15:00', '1'),
(18, 16, 8, 49.90, '2023-04-29 12:05:00', '1'),
(19, 17, 1, 59.90, '2023-05-05 09:15:00', '1'),
(20, 18, 2, 59.90, '2023-05-11 14:30:00', '1'),
(21, 19, 3, 59.90, '2023-05-18 11:50:00', '1'),
(22, 20, 4, 59.90, '2023-05-24 16:25:00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `idveterinario` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(35) DEFAULT NULL,
  `apellidos` varchar(35) DEFAULT NULL,
  `dni` char(8) DEFAULT NULL,
  `telefono` char(9) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `sexo` varchar(9) NOT NULL,
  `fechaNac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`idveterinario`, `idusuario`, `nombres`, `apellidos`, `dni`, `telefono`, `direccion`, `foto`, `sexo`, `fechaNac`) VALUES
(1, 23, 'Mary', 'Martinez', '96325874', '987456321', 'Calle Bellavista', 'vet1.jpg', 'Femenino', '1995-10-02'),
(2, 25, 'Luis', 'Gonzales', '45632178', '998741256', 'Calle Uruguay 321', 'vet2.jpg', 'Masculino', '1996-01-05'),
(3, 26, 'Cynthia', 'Mamani', '65412396', '963852147', 'Jr. Los Tulipanes 741', 'vet3.jpg', 'Femenino', '2000-12-12'),
(4, 27, 'Manuel', 'Garcia', '85214796', '987456123', 'Calle Atocongo 412', 'vet4.jpg', 'Masculino', '1997-02-12'),
(5, 28, 'Oscar ', 'Fernandez', '46325874', '996633251', 'Jr. Los Angeles', 'vet5.jpg', 'Masculino', '1985-08-25'),
(6, 29, 'Olivia', 'Mamani', '74125896', '997845123', 'Av. Los insurgentes 741', 'vet6.jpg', 'Femenino', '1992-05-02'),
(7, 31, 'Veterinario', 'Sosa', '12345678', '987654123', 'Lima', 'vetyperro.jpg  ', 'Masculino', '1998-06-18'),
(8, 32, 'Paquito', 'Del Barrio', '74980163', '941297309', 'Av. Brasil 543', 'predeterminadoHombre.jpg', 'Masculino', '2001-05-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idcita`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idmascota` (`idmascota`),
  ADD KEY `idhorario` (`idhorario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `detallevacuna`
--
ALTER TABLE `detallevacuna`
  ADD PRIMARY KEY (`iddetallevacuna`),
  ADD KEY `idmascota` (`idmascota`),
  ADD KEY `idveterinario` (`idveterinario`),
  ADD KEY `idvacuna` (`idvacuna`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`iddetalleventa`),
  ADD KEY `idventa` (`idventa`),
  ADD KEY `idproductoservicio` (`idproductoservicio`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idespecie`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhorario`),
  ADD KEY `idveterinario` (`idveterinario`),
  ADD KEY `idproductoservicio` (`idproductoservicio`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idmascota`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idraza` (`idraza`);

--
-- Indices de la tabla `productoservicio`
--
ALTER TABLE `productoservicio`
  ADD PRIMARY KEY (`idproductoservicio`),
  ADD KEY `idtipoproductoservicio` (`idtipoproductoservicio`);

--
-- Indices de la tabla `puntoscliente`
--
ALTER TABLE `puntoscliente`
  ADD PRIMARY KEY (`idpuntos`),
  ADD KEY `iddetalleventa` (`iddetalleventa`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`idraza`),
  ADD KEY `idespecie` (`idespecie`);

--
-- Indices de la tabla `tipoproductoservicio`
--
ALTER TABLE `tipoproductoservicio`
  ADD PRIMARY KEY (`idtipoproductoservicio`),
  ADD KEY `idEspecie` (`idespecie`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idtipousuario` (`idtipousuario`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`idvacuna`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idveterinario` (`idveterinario`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`idveterinario`),
  ADD KEY `idusuario` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `detallevacuna`
--
ALTER TABLE `detallevacuna`
  MODIFY `iddetallevacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `idespecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idmascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productoservicio`
--
ALTER TABLE `productoservicio`
  MODIFY `idproductoservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `puntoscliente`
--
ALTER TABLE `puntoscliente`
  MODIFY `idpuntos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `idraza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tipoproductoservicio`
--
ALTER TABLE `tipoproductoservicio`
  MODIFY `idtipoproductoservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `idvacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `idveterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`idmascota`) REFERENCES `mascota` (`idmascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`idhorario`) REFERENCES `horario` (`idhorario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallevacuna`
--
ALTER TABLE `detallevacuna`
  ADD CONSTRAINT `detallevacuna_ibfk_1` FOREIGN KEY (`idvacuna`) REFERENCES `vacuna` (`idvacuna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallevacuna_ibfk_2` FOREIGN KEY (`idmascota`) REFERENCES `mascota` (`idmascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallevacuna_ibfk_3` FOREIGN KEY (`idveterinario`) REFERENCES `veterinario` (`idveterinario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`idproductoservicio`) REFERENCES `productoservicio` (`idproductoservicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`idveterinario`) REFERENCES `veterinario` (`idveterinario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`idproductoservicio`) REFERENCES `productoservicio` (`idproductoservicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`idraza`) REFERENCES `raza` (`idraza`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productoservicio`
--
ALTER TABLE `productoservicio`
  ADD CONSTRAINT `productoservicio_ibfk_1` FOREIGN KEY (`idtipoproductoservicio`) REFERENCES `tipoproductoservicio` (`idtipoproductoservicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puntoscliente`
--
ALTER TABLE `puntoscliente`
  ADD CONSTRAINT `puntoscliente_ibfk_1` FOREIGN KEY (`iddetalleventa`) REFERENCES `detalleventa` (`iddetalleventa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `raza`
--
ALTER TABLE `raza`
  ADD CONSTRAINT `raza_ibfk_1` FOREIGN KEY (`idespecie`) REFERENCES `especie` (`idespecie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipoproductoservicio`
--
ALTER TABLE `tipoproductoservicio`
  ADD CONSTRAINT `tipoproductoservicio_ibfk_1` FOREIGN KEY (`idespecie`) REFERENCES `especie` (`idespecie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idveterinario`) REFERENCES `veterinario` (`idveterinario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD CONSTRAINT `veterinario_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
