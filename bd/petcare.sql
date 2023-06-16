-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2023 a las 00:13:37
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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
(3, 30, 'Liz', 'Ancajima', '78456123', '987654123', 'Lima', 'e2a9aa11df9d7d92325ebb2c3068d7e3.jpg', 'Femenino', '1998-07-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idcita` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idmascota` int(11) DEFAULT NULL,
  `idhorario` int(11) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `fechacreacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `fechaNac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='			';

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `idusuario`, `nombres`, `apellidos`, `dni`, `telefono`, `direccion`, `foto`, `sexo`, `fechaNac`) VALUES
(1, 1, 'Cristhian', 'Valladolid', '12345678', '987654123', 'Lima', 'perfil2.png', 'Masculino', '2023-05-17'),
(2, 2, 'Jorge', 'Cortez', '76016369', '975462500', 'Av. Amaliga Puga 613', 'cliente2.jpg', 'Masculino', '1997-05-04'),
(3, 3, 'Alexis Erickson', 'Perez Bazalar', '96385241', '987654321', 'Calle Perricholli 523', 'cliente3.jpg', 'Masculino', '1997-08-20'),
(4, 4, 'Alexis', 'Bazalar Torres', '85274163', '987654321', 'Calle Perricholli 523', 'cliente3.jpg', 'Masculino', '1996-07-30'),
(5, 5, 'Dylan ', 'Pacheco Pacheco', '56432178', '987654321', 'Av. Colonial 3525', 'cliente4.jpg', 'Masculino', '1993-06-15'),
(6, 6, 'Celia', 'Cruz', '56932147', '998752632', 'Calle Amancaes 369', 'cliente5.png', 'Femenino', '1988-07-21'),
(7, 7, 'Paula', 'Heredia', '68754123', '995651660', 'Jr. Washington 289', 'cliente6.jpg', 'Femenino', '1999-03-25'),
(8, 8, 'Luisa', 'Martinez', '45698712', '987654123', 'Calle Castilla 852', 'cliente7.jpg', 'Femenino', '1992-06-05'),
(9, 9, 'Samuel', 'Becerra', '65432178', '923456987', 'Av. Benavides 1236', 'cliente8_h.jpg', 'Masculino', '1996-08-23'),
(10, 10, 'Drake', 'Bell', '78945612', '998877665', 'Jr. Castilla 789', 'cliente9_h.jpg', 'Masculino', '2001-12-20'),
(11, 11, 'Josh', 'Bell', '36985214', '998765421', 'Jr. de la Unión 523', 'cliente10_h.jpg', 'Masculino', '1998-07-14'),
(12, 12, 'Bryan', 'Perez', '52367894', '998822331', 'Las Malvinas 4532', 'cliente11_h.jpg', 'Masculino', '1996-03-13'),
(13, 13, 'Jorge', 'Pacheco', '85274196', '998765421', 'Av. Los Jardines', 'cliente12_h.jpg', 'Masculino', '1999-12-23'),
(14, 14, 'Ricardo', 'Osorio', '96385274', '987475862', 'Calle las flores', 'cliente13_h.jpg', 'Masculino', '1995-12-11'),
(15, 15, 'Pedro', 'Osorio', '65432178', '987654321', 'Calle Machu Picchu 654', 'cliente14_h.jpg', 'Masculino', '1992-02-18'),
(16, 16, 'Diana', 'Barrientos', '45612308', '987654123', 'Av. Los insurgentes 963', 'cliente15_m.jpg', 'Femenino', '1994-11-14'),
(17, 17, 'Gabriela', 'Rosario', '98745612', '996654213', 'Av. Argentina 1200', 'cliente16_m.jpg', 'Femenino', '1994-11-19'),
(18, 18, 'Tina', 'Duarte', '45632178', '998765412', 'Jr. Las Palmera 500', 'cliente18_m.jpg', 'Femenino', '1984-10-23'),
(19, 19, 'Mirtha', 'Reyes', '78945612', '998877552', 'Av. Venezuela 3210', 'cliente19_m.jpg', 'Femenino', '1996-06-17'),
(20, 20, 'Teresa', 'Moreno', '74185236', '998822550', 'Jr. Las Casuarinas 5230', 'cliente20_m.jpg', 'Femenino', '1997-02-04');

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
(2, 5, 1, 7, '2023-06-08', '2023-07-01', 'Na', 'NA');

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
(1, 1, 2, 2, '50.00'),
(2, 2, 3, 1, '50.00');

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
  `dia` varchar(9) DEFAULT NULL,
  `horarioinicio` int(11) DEFAULT NULL,
  `horariofin` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 1, 1, 'Cookie', '2013-05-02', '5.00', 'marrón', 'footerperro.jpg', 'SI', 'Cria', '2023-05-19', 20345678, 'Macho', '1'),
(2, 2, 2, 'Pelusa', '2020-05-01', '10.50', 'negro', 'cocker.jpeg', 'SI', 'Juvenil', '2023-05-19', 10236547, 'Hembra', '1'),
(3, 3, 3, 'Boby', '2022-05-04', '9.00', 'crema', 'Labrador.jpeg', 'SI', 'Juvenil', '2023-05-19', 23657410, 'Macho', '1'),
(4, 4, 4, 'Speedy', '2020-05-01', '10.20', 'marrón oscuro', 'Pastor alemán.jpeg', 'SI', 'Adulto', '2023-05-19', 74125896, NULL, '1'),
(5, 5, 5, 'Motita', '2018-05-09', '12.00', 'Plomo', 'Schnauzer.jpeg', 'SI', 'Juvenil', '2023-05-19', 12365478, NULL, '1'),
(6, 6, 6, 'Lobo', '2015-05-15', '20.00', 'Plomo', 'Siberiano.jpeg', 'NO', 'Adulto', '2023-05-19', 36985214, NULL, '1'),
(7, 7, 7, 'Michi', '2020-05-08', '8.00', 'blanco', 'Elfo.jpg', 'NO', 'Juvenil', '2023-05-19', 23654178, NULL, '1'),
(10, 1, 1, 'Toffeeeee', '2022-06-15', '9.45', 'Marron', 'Chihuahua.jpeg', 'SI', 'Cria', '2023-06-04', 123, 'M', '1'),
(11, 1, 3, 'Nova', '2018-03-29', '12.30', 'Negro', 'huella.jpg', 'SI', 'Adulto', '2023-06-08', 123, 'H', '1'),
(12, 1, 8, 'Mascota', '2022-03-01', '13.45', 'Marron', 'huella.jpg', 'SI', 'Cria', '2023-06-08', 555, 'M', '1'),
(13, 1, 13, 'Rayo', '2021-01-01', '7.00', 'blanco marron', 'cuidados_del_conejo_belier_7683_orig.jpg', 'SI', 'Juvenil', '2023-06-09', 987159, 'M', '1');

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
(1, 1, 'servicio de baño', '59.90', 'Aplica solo a perros', 'lavar-perro-mascota-casa.jpg', '1'),
(2, 2, 'Juguete masticable', '59.90', 'Mpets Chewbo Choppy Bacon es un hueso de juguete colori', 'mpets-chewbo-choppy-s-orange-sabor-a-tocino.jpg', '1'),
(3, 2, 'Comida para gatos 3 mil', '50.00', 'Bolsa de 7kg', '...', '1');

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
(2, 2, 5);

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
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoproductoservicio`
--

INSERT INTO `tipoproductoservicio` (`idtipoproductoservicio`, `nombre`, `estado`) VALUES
(1, 'Servicios', '1'),
(2, 'Comida para gatos', '1');

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
(30, 2, 'liz@gmail.com', '123', '2023-05-31 21:43:40', '2'),
(31, 3, 'veterinario@gmail.com', '123', '2023-06-01 01:00:49', '2'),
(32, 3, 'pacovet@gmail.com', '123', '2023-06-11 23:54:23', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `idvacuna` int(11) NOT NULL,
  `lote` varchar(15) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`idvacuna`, `lote`, `tipo`, `descripcion`, `fecha`, `estado`) VALUES
(1, 'H1N1K2', 'COVID', NULL, '2023-05-17 00:46:47', NULL),
(2, 'ABC123', 'Viruela', 'Aplica solo a raza adulta', '2023-05-19 19:18:07', NULL),
(3, 'C05', 'Antirabico', 'Aplica solo para perros', '2023-06-11 23:57:37', NULL);

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
(1, 1, 7, '100.00', '2023-06-14 21:51:42', '1'),
(2, 1, 2, '50.00', '2023-06-15 00:52:14', '1');

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
  ADD PRIMARY KEY (`idtipoproductoservicio`);

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
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `detallevacuna`
--
ALTER TABLE `detallevacuna`
  MODIFY `iddetallevacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `idespecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idmascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productoservicio`
--
ALTER TABLE `productoservicio`
  MODIFY `idproductoservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `puntoscliente`
--
ALTER TABLE `puntoscliente`
  MODIFY `idpuntos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `idraza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tipoproductoservicio`
--
ALTER TABLE `tipoproductoservicio`
  MODIFY `idtipoproductoservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `idvacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
