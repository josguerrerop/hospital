-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2021 a las 04:24:08
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendar`
--

CREATE TABLE `agendar` (
  `id_visita` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `id_medico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agendar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contener`
--

CREATE TABLE `contener` (
  `id_p` int(11) NOT NULL,
  `id_hicl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_e` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre_e`) VALUES
(1, 'Odontología'),
(2, 'Cardiología'),
(3, 'Pediatría'),
(4, 'Oftalmología'),
(5, 'Medicina General'),
(6, 'Urologia'),
(7, 'Geriatría'),
(8, 'Psiquiatría'),
(9, 'Traumatología'),
(10, 'Radiología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_est` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_est`) VALUES
(1, 'PENDIENTE'),
(2, 'AGENDADO'),
(3, 'CANCELADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estar`
--

CREATE TABLE `estar` (
  `id_visita` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hicl`
--

CREATE TABLE `hicl` (
  `id_hicl` int(11) NOT NULL,
  `fecha_hicl` date DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `observaciones` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_m` int(11) NOT NULL,
  `nombre_m` varchar(150) DEFAULT NULL,
  `apellidos_m` varchar(150) DEFAULT NULL,
  `fecha_nacm` date NOT NULL,
  `direccion_m` varchar(150) DEFAULT NULL,
  `telefono_m` varchar(50) DEFAULT NULL,
  `correo_m` varchar(150) DEFAULT NULL,
  `pass_m` varchar(400) DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_p` int(11) NOT NULL,
  `nombre_p` varchar(150) DEFAULT NULL,
  `apellidos_p` varchar(150) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `direccion_p` varchar(150) DEFAULT NULL,
  `telefono_p` varchar(50) DEFAULT NULL,
  `correo_p` varchar(150) DEFAULT NULL,
  `pass_p` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitar`
--

CREATE TABLE `solicitar` (
  `id_visita` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `fecha_solicitud` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(150) NOT NULL,
  `pass` varchar(400) NOT NULL,
  `num_nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `id_visita` int(11) NOT NULL,
  `hora_v` time DEFAULT NULL,
  `fecha_v` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visita`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendar`
--
ALTER TABLE `agendar`
  ADD PRIMARY KEY (`id_visita`,`id_especialidad`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `contener`
--
ALTER TABLE `contener`
  ADD PRIMARY KEY (`id_p`,`id_hicl`),
  ADD KEY `id_hicl` (`id_hicl`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estar`
--
ALTER TABLE `estar`
  ADD PRIMARY KEY (`id_visita`,`id_estado`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `hicl`
--
ALTER TABLE `hicl`
  ADD PRIMARY KEY (`id_hicl`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_m`),
  ADD KEY `id_especialidad` (`id_especialidad`),
  ADD KEY `correo_m` (`correo_m`,`pass_m`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `correo_p` (`correo_p`,`pass_p`);

--
-- Indices de la tabla `solicitar`
--
ALTER TABLE `solicitar`
  ADD PRIMARY KEY (`id_visita`,`id_p`),
  ADD KEY `id_p` (`id_p`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`,`pass`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id_visita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agendar`
--
ALTER TABLE `agendar`
  ADD CONSTRAINT `agendar_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`);

--
-- Filtros para la tabla `contener`
--
ALTER TABLE `contener`
  ADD CONSTRAINT `contener_ibfk_1` FOREIGN KEY (`id_hicl`) REFERENCES `hicl` (`id_hicl`),
  ADD CONSTRAINT `contener_ibfk_2` FOREIGN KEY (`id_p`) REFERENCES `paciente` (`id_p`);

--
-- Filtros para la tabla `estar`
--
ALTER TABLE `estar`
  ADD CONSTRAINT `estar_ibfk_1` FOREIGN KEY (`id_visita`) REFERENCES `visita` (`id_visita`),
  ADD CONSTRAINT `estar_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `medico_ibfk_2` FOREIGN KEY (`correo_m`,`pass_m`) REFERENCES `usuario` (`correo`, `pass`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`correo_p`,`pass_p`) REFERENCES `usuario` (`correo`, `pass`);

--
-- Filtros para la tabla `solicitar`
--
ALTER TABLE `solicitar`
  ADD CONSTRAINT `solicitar_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `paciente` (`id_p`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
