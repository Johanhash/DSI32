-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2024 a las 12:38:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadecontrolvehicular`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centrosverificacion`
--

CREATE TABLE `centrosverificacion` (
  `NoCentro` int(11) NOT NULL,
  `NoLinea` varchar(50) NOT NULL,
  `Tecnico` varchar(50) NOT NULL,
  `FechaExp` date NOT NULL,
  `HoraEntrada` time NOT NULL,
  `HoraSalida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `centrosverificacion`
--

INSERT INTO `centrosverificacion` (`NoCentro`, `NoLinea`, `Tecnico`, `FechaExp`, `HoraEntrada`, `HoraSalida`) VALUES
(1, '2', 'Juan', '2024-10-08', '14:53:00', '12:58:00'),
(2, '1', 'Juan', '2024-11-23', '23:25:00', '23:27:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `ConductorID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `FechaNac` date NOT NULL,
  `Domicilio` varchar(100) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `TipoSangre` varchar(20) NOT NULL,
  `DonadorOrg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`ConductorID`, `Nombre`, `Apellido`, `FechaNac`, `Domicilio`, `Telefono`, `TipoSangre`, `DonadorOrg`) VALUES
(1, 'Johan', 'Juarez', '2024-10-27', 'San Juan', '462312384', 'A+', 'Si'),
(2, 'Arlin', 'Monti', '2024-10-27', 'Durazno', '462312384', 'A+', 'No'),
(3, 'Chema', 'Pedraza', '2024-11-27', 'Av de las ciencias', '4425752698', 'O-', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `UserName` varchar(20) NOT NULL,
  `Pwd` varchar(50) NOT NULL,
  `Tipo` char(1) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Bloqueo` tinyint(1) DEFAULT NULL,
  `Intentos` tinyint(1) DEFAULT NULL,
  `Llave` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`UserName`, `Pwd`, `Tipo`, `Status`, `Bloqueo`, `Intentos`, `Llave`) VALUES
('', '', 'U', 1, 0, 0, 'ab4c968419c20ee18d8f4b7a54aca8a0'),
('Chema', 'C1234', 'U', 1, 0, 1, '7b6b8ef7a2c841891f1198e4d309ca63'),
('Johan', 'Pablo', 'U', 1, 0, 0, '512fbef2533d66465a9a7930070e96d7'),
('Johanes', 'Pablo', 'U', 1, 0, 0, '28443edf0fda5275f78fc858baa0c879'),
('Juan', 'J1234', 'A', 1, 0, 0, '12345678'),
('Luis', 'L1234', 'A', 1, 0, 0, '28443edf0fda5275f78fc858baa0c879'),
('Maria', 'M1234', 'U', 0, 0, 0, '123456');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `datoslicencia`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `datoslicencia` (
`NoLicencia` int(11)
,`Foto` varchar(255)
,`Nombre` varchar(100)
,`Apellido` varchar(100)
,`TipoLicencia` char(1)
,`FechaExp` date
,`Vigencia` date
,`Antiguedad` int(11)
,`Restriccion` varchar(100)
,`Observacion` varchar(100)
,`Domicilio` varchar(100)
,`Firma` varchar(255)
,`FechaNac` date
,`DonadorOrg` varchar(100)
,`TipoSangre` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `datostarjetacirculacion`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `datostarjetacirculacion` (
`Folio` varchar(50)
,`rfcPropietario` varchar(100)
,`Vigencia` varchar(20)
,`FechaExp` date
,`OficinaExp` int(11)
,`Movimiento` varchar(100)
,`NIV` varchar(50)
,`Placa` varchar(20)
,`PropietarioID` varchar(10)
,`PropietarioNombre` varchar(100)
,`Localidad` varchar(50)
,`Municipio` varchar(50)
,`VehiculoID` varchar(10)
,`VehiculoNIV` varchar(20)
,`Marca` varchar(20)
,`Linea` varchar(20)
,`Sublinea` varchar(20)
,`Color` varchar(20)
,`Cilindro` int(11)
,`Origen` varchar(20)
,`Capacidad` int(11)
,`Puertas` int(11)
,`Asientos` int(11)
,`Combustible` varchar(20)
,`Transmision` varchar(20)
,`Clase` int(11)
,`Tipo` int(11)
,`Uso` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `NoLicencia` int(11) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Firma` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TipoLicencia` char(1) NOT NULL,
  `FechaExp` date NOT NULL,
  `Observacion` varchar(100) NOT NULL,
  `Antiguedad` int(11) NOT NULL,
  `Domicilio` varchar(100) NOT NULL,
  `Restriccion` varchar(100) NOT NULL,
  `Vigencia` date NOT NULL,
  `ConductorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `licencias`
--

INSERT INTO `licencias` (`NoLicencia`, `Foto`, `Nombre`, `Apellido`, `Firma`, `TipoLicencia`, `FechaExp`, `Observacion`, `Antiguedad`, `Domicilio`, `Restriccion`, `Vigencia`, `ConductorID`) VALUES
(1, '', 'Johan', 'Juarez', '', 'A', '2024-10-21', 'Usa lentes', 3, 'San Juan', 'Ninguna', '2024-11-06', 1),
(2, '', 'Arlin', 'Estefany', '', 'A', '2024-11-22', 'Ninguna', 0, 'Durazno #600', '-----', '2024-11-30', 2),
(3, 'uploads/R.jpeg', 'dwadwd', 'wdadwwad', 'uploads/firma.jpeg', 'B', '2024-11-27', 'dawwad', 3, 'dawdwadwa', 'dawdawaw', '2029-11-27', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas`
--

CREATE TABLE `multas` (
  `Folio` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  `Lugar` varchar(100) NOT NULL,
  `Propietario` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Domicilio` varchar(100) NOT NULL,
  `Vehiculo` varchar(100) NOT NULL,
  `Motivo` varchar(100) NOT NULL,
  `ObjRetenido` varchar(100) NOT NULL,
  `Solucion` varchar(100) NOT NULL,
  `Oficial` varchar(100) NOT NULL,
  `LugarPago` varchar(100) NOT NULL,
  `FolioVerificacion` varchar(100) NOT NULL,
  `NoLicencia` int(11) NOT NULL,
  `FolioTarjeta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `multas`
--

INSERT INTO `multas` (`Folio`, `Fecha`, `Lugar`, `Propietario`, `Nombre`, `Domicilio`, `Vehiculo`, `Motivo`, `ObjRetenido`, `Solucion`, `Oficial`, `LugarPago`, `FolioVerificacion`, `NoLicencia`, `FolioTarjeta`) VALUES
('0001', '2024-11-23', 'Irapuato', 'Johan Juarez', 'Johan Juarez', 'Durazno #600', 'Nissan', 'Sin cinturon', 'Placa', 'Pago', 'Ernesto', 'Centro', '1', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `PropietarioID` varchar(10) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Localidad` varchar(50) NOT NULL,
  `Municipio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`PropietarioID`, `Nombre`, `Localidad`, `Municipio`) VALUES
('1', 'Johan Juarez', 'San Juan', 'Queretaro'),
('2', 'Arlin', 'Irapuato', 'Queretaro'),
('3', 'DAWDAWWD', 'DAWDWA', 'AWDAWD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `Folio` varchar(50) NOT NULL,
  `rfcPropietario` varchar(100) NOT NULL,
  `Vigencia` varchar(20) NOT NULL,
  `FechaExp` date NOT NULL,
  `OficinaExp` int(11) NOT NULL,
  `Movimiento` varchar(100) NOT NULL,
  `NIV` varchar(50) NOT NULL,
  `PropietarioID` varchar(10) NOT NULL,
  `VehiculoID` varchar(10) NOT NULL,
  `Placa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`Folio`, `rfcPropietario`, `Vigencia`, `FechaExp`, `OficinaExp`, `Movimiento`, `NIV`, `PropietarioID`, `VehiculoID`, `Placa`) VALUES
('1', 'TMJOP15', '4 Años', '2024-10-01', 1, 'Ninguno', 'NN123', '1', '1', 'UMH'),
('2', 'A2', '4 años ', '2024-11-15', 2, 'Tarjeta circulacion', 'AAA', '2', '2', ''),
('3', 'ADWAWDAW', '3', '2024-11-27', 2, 'WADDAW', 'WDADAWDD', '3', '3', 'DWADAWD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tenencias`
--

CREATE TABLE `tenencias` (
  `LineaCaptura` varchar(50) NOT NULL,
  `vehiculo` varchar(50) NOT NULL,
  `Transaccion` varchar(50) NOT NULL,
  `FechaLimite` date NOT NULL,
  `Importe` int(11) NOT NULL,
  `TipoPago` varchar(50) NOT NULL,
  `FechaActual` date NOT NULL,
  `Hora` time NOT NULL,
  `FolioTarjeta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tenencias`
--

INSERT INTO `tenencias` (`LineaCaptura`, `vehiculo`, `Transaccion`, `FechaLimite`, `Importe`, `TipoPago`, `FechaActual`, `Hora`, `FolioTarjeta`) VALUES
('1', 'NISSAN', '20000', '2024-10-08', 23, 'Efectivo', '2024-10-02', '12:24:00', '1'),
('2', 'Nissan', '2000', '2024-11-09', 2000, 'Efectivo', '2024-11-23', '23:20:00', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `VehiculoID` varchar(10) NOT NULL,
  `NIV` varchar(20) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `Linea` varchar(20) NOT NULL,
  `Sublinea` varchar(20) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Cilindro` int(11) NOT NULL,
  `Origen` varchar(20) NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Puertas` int(11) NOT NULL,
  `Asientos` int(11) NOT NULL,
  `Combustible` varchar(20) NOT NULL,
  `Transmision` varchar(20) NOT NULL,
  `Clase` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Uso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`VehiculoID`, `NIV`, `Marca`, `Linea`, `Sublinea`, `Color`, `Cilindro`, `Origen`, `Capacidad`, `Puertas`, `Asientos`, `Combustible`, `Transmision`, `Clase`, `Tipo`, `Uso`) VALUES
('1', 'NN123', 'NISSAN', '22', 'RS5', 'Blanco', 2, 'EUA', 2, 2, 2, '1', 'Estandar', 3, 1, 1),
('2', 'AAA', 'Mazda', 'G5', 'SS2', 'Rojo', 4, 'China', 5, 5, 5, '4', 'Estandar', 4, 2, 2),
('3', 'AWDAD', 'DWADAW', 'ADWDAW', 'DWADAW', 'DWADAW', 22, 'WDAD', 33, 2, 12, '2333', 'DWADAW', 3, 1222, 2212);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificaciones`
--

CREATE TABLE `verificaciones` (
  `Folio` varchar(50) NOT NULL,
  `Vehiculo` varchar(100) NOT NULL,
  `Motivo` varchar(100) NOT NULL,
  `Semestre` varchar(100) NOT NULL,
  `Vigencia` varchar(50) NOT NULL,
  `FolioTarjeta` varchar(50) NOT NULL,
  `NoCentro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `verificaciones`
--

INSERT INTO `verificaciones` (`Folio`, `Vehiculo`, `Motivo`, `Semestre`, `Vigencia`, `FolioTarjeta`, `NoCentro`) VALUES
('1', 'NISSAN', 'Ninguno', '2', '4 años', '1', 1),
('2', 'Nissan', 'Sin cinturon', '2', '4 años ', '2', 2);

-- --------------------------------------------------------

--
-- Estructura para la vista `datoslicencia`
--
DROP TABLE IF EXISTS `datoslicencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `datoslicencia`  AS SELECT `l`.`NoLicencia` AS `NoLicencia`, `l`.`Foto` AS `Foto`, `l`.`Nombre` AS `Nombre`, `l`.`Apellido` AS `Apellido`, `l`.`TipoLicencia` AS `TipoLicencia`, `l`.`FechaExp` AS `FechaExp`, `l`.`Vigencia` AS `Vigencia`, `l`.`Antiguedad` AS `Antiguedad`, `l`.`Restriccion` AS `Restriccion`, `l`.`Observacion` AS `Observacion`, `l`.`Domicilio` AS `Domicilio`, `l`.`Firma` AS `Firma`, `c`.`FechaNac` AS `FechaNac`, `c`.`DonadorOrg` AS `DonadorOrg`, `c`.`TipoSangre` AS `TipoSangre` FROM (`licencias` `l` join `conductores` `c` on(`l`.`ConductorID` = `c`.`ConductorID`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `datostarjetacirculacion`
--
DROP TABLE IF EXISTS `datostarjetacirculacion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `datostarjetacirculacion`  AS SELECT `t`.`Folio` AS `Folio`, `t`.`rfcPropietario` AS `rfcPropietario`, `t`.`Vigencia` AS `Vigencia`, `t`.`FechaExp` AS `FechaExp`, `t`.`OficinaExp` AS `OficinaExp`, `t`.`Movimiento` AS `Movimiento`, `t`.`NIV` AS `NIV`, `t`.`Placa` AS `Placa`, `p`.`PropietarioID` AS `PropietarioID`, `p`.`Nombre` AS `PropietarioNombre`, `p`.`Localidad` AS `Localidad`, `p`.`Municipio` AS `Municipio`, `v`.`VehiculoID` AS `VehiculoID`, `v`.`NIV` AS `VehiculoNIV`, `v`.`Marca` AS `Marca`, `v`.`Linea` AS `Linea`, `v`.`Sublinea` AS `Sublinea`, `v`.`Color` AS `Color`, `v`.`Cilindro` AS `Cilindro`, `v`.`Origen` AS `Origen`, `v`.`Capacidad` AS `Capacidad`, `v`.`Puertas` AS `Puertas`, `v`.`Asientos` AS `Asientos`, `v`.`Combustible` AS `Combustible`, `v`.`Transmision` AS `Transmision`, `v`.`Clase` AS `Clase`, `v`.`Tipo` AS `Tipo`, `v`.`Uso` AS `Uso` FROM ((`tarjetas` `t` join `propietarios` `p` on(`t`.`PropietarioID` = `p`.`PropietarioID`)) join `vehiculos` `v` on(`t`.`VehiculoID` = `v`.`VehiculoID`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `centrosverificacion`
--
ALTER TABLE `centrosverificacion`
  ADD PRIMARY KEY (`NoCentro`);

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`ConductorID`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`UserName`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`NoLicencia`),
  ADD KEY `ConductorID` (`ConductorID`);

--
-- Indices de la tabla `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `NoLicencia` (`NoLicencia`),
  ADD KEY `FolioVerificacion` (`FolioVerificacion`),
  ADD KEY `FolioTarjeta` (`FolioTarjeta`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`PropietarioID`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `PropietarioID` (`PropietarioID`),
  ADD KEY `VehiculoID` (`VehiculoID`);

--
-- Indices de la tabla `tenencias`
--
ALTER TABLE `tenencias`
  ADD PRIMARY KEY (`LineaCaptura`),
  ADD KEY `FolioTarjeta` (`FolioTarjeta`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`VehiculoID`);

--
-- Indices de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `NoCentro` (`NoCentro`),
  ADD KEY `FolioTarjeta` (`FolioTarjeta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductores`
--
ALTER TABLE `conductores`
  MODIFY `ConductorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `NoLicencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD CONSTRAINT `licencias_ibfk_1` FOREIGN KEY (`ConductorID`) REFERENCES `conductores` (`ConductorID`);

--
-- Filtros para la tabla `multas`
--
ALTER TABLE `multas`
  ADD CONSTRAINT `multas_ibfk_1` FOREIGN KEY (`NoLicencia`) REFERENCES `licencias` (`NoLicencia`),
  ADD CONSTRAINT `multas_ibfk_2` FOREIGN KEY (`FolioVerificacion`) REFERENCES `verificaciones` (`Folio`),
  ADD CONSTRAINT `multas_ibfk_3` FOREIGN KEY (`FolioTarjeta`) REFERENCES `tarjetas` (`Folio`);

--
-- Filtros para la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD CONSTRAINT `tarjetas_ibfk_1` FOREIGN KEY (`PropietarioID`) REFERENCES `propietarios` (`PropietarioID`),
  ADD CONSTRAINT `tarjetas_ibfk_2` FOREIGN KEY (`VehiculoID`) REFERENCES `vehiculos` (`VehiculoID`);

--
-- Filtros para la tabla `tenencias`
--
ALTER TABLE `tenencias`
  ADD CONSTRAINT `tenencias_ibfk_1` FOREIGN KEY (`FolioTarjeta`) REFERENCES `tarjetas` (`Folio`);

--
-- Filtros para la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD CONSTRAINT `verificaciones_ibfk_1` FOREIGN KEY (`NoCentro`) REFERENCES `centrosverificacion` (`NoCentro`),
  ADD CONSTRAINT `verificaciones_ibfk_2` FOREIGN KEY (`FolioTarjeta`) REFERENCES `tarjetas` (`Folio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
