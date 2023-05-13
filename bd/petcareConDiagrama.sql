-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2023 a las 19:01:32
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
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `fechacreacion` date DEFAULT current_timestamp()
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
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='			';

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
  `observacion` varchar(55) DEFAULT NULL,
  `restricciones` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `idespecie` int(11) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoservicio`
--

CREATE TABLE `productoservicio` (
  `idproductoservicio` int(11) NOT NULL,
  `idtipoproductoservicio` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `descripcion` varchar(55) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproductoservicio`
--

CREATE TABLE `tipoproductoservicio` (
  `idtipoproductoservicio` int(11) NOT NULL,
  `nombre` varchar(9) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoproductoservicio`
--

INSERT INTO `tipoproductoservicio` (`idtipoproductoservicio`, `nombre`, `estado`) VALUES
(3, 'ricocan', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `nombre` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `idvacuna` int(11) NOT NULL,
  `lote` varchar(15) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`idvacuna`, `lote`, `tipo`) VALUES
(1, 'H1N1K2', 'COVID');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idveterinario` int(11) DEFAULT NULL,
  `total` decimal(7,2) DEFAULT NULL,
  `fecha` date DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallevacuna`
--
ALTER TABLE `detallevacuna`
  MODIFY `iddetallevacuna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `idespecie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idmascota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productoservicio`
--
ALTER TABLE `productoservicio`
  MODIFY `idproductoservicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `idraza` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoproductoservicio`
--
ALTER TABLE `tipoproductoservicio`
  MODIFY `idtipoproductoservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `idvacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `idveterinario` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `detallevacuna_ibfk_2` FOREIGN KEY (`idmascota`) REFERENCES `mascota` (`idmascota`) ON DELETE CASCADE ON UPDATE CASCADE;

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
