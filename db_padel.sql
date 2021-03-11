-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2021 a las 05:23:18
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_padel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'Junior'),
(2, 'Senior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_league`
--

CREATE TABLE `detail_league` (
  `fkid_team` int(11) NOT NULL,
  `fkid_game` int(11) NOT NULL,
  `result` int(11) DEFAULT NULL,
  `id_detail` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detail_league`
--

INSERT INTO `detail_league` (`fkid_team`, `fkid_game`, `result`, `id_detail`, `status`) VALUES
(1, 1, 1, 1, 'local'),
(2, 1, 2, 2, 'visitant'),
(2, 4, 3, 3, 'local'),
(3, 4, 0, 4, 'visitant'),
(2, 5, NULL, 5, 'local'),
(3, 5, NULL, 6, 'visitant');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_team`
--

CREATE TABLE `detail_team` (
  `fkid_team` int(11) NOT NULL,
  `fkid_person` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detail_team`
--

INSERT INTO `detail_team` (`fkid_team`, `fkid_person`, `id_detail`) VALUES
(1, 1, 1),
(1, 2, 2),
(2, 3, 3),
(2, 4, 4),
(3, 5, 5),
(3, 6, 6),
(5, 1, 7),
(5, 2, 8),
(6, 1, 9),
(6, 2, 10),
(7, 1, 11),
(7, 2, 12),
(8, 1, 13),
(8, 2, 14),
(9, 2, 15),
(9, 3, 16),
(10, 6, 17),
(10, 5, 18),
(11, 3, 19),
(11, 5, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `state` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `spot` varchar(60) NOT NULL,
  `level` varchar(10) NOT NULL,
  `fkid_league` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`id_game`, `state`, `date`, `spot`, `level`, `fkid_league`) VALUES
(1, 'jugado', '2018-01-03', 'Bolivia santa cruz', 'ida', 1),
(2, 'suspendido', '2018-06-05', 'Bolivia Sucre', 'ida', 1),
(4, 'jugado', '2020-12-12', 'Bolivia La paz', 'ida', 2),
(5, 'por jugar', '2020-12-12', 'Bolivia La beni', 'ida', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `league`
--

CREATE TABLE `league` (
  `id_league` int(11) NOT NULL,
  `season` year(4) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `league`
--

INSERT INTO `league` (`id_league`, `season`, `description`) VALUES
(1, 2018, 'esta liga finalizara cuando termine el ultimo encuentro'),
(2, 2019, 'esta liga finalizara cuando termine el ultimo encuentro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origin`
--

CREATE TABLE `origin` (
  `id_origin` int(11) NOT NULL,
  `country` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `origin`
--

INSERT INTO `origin` (`id_origin`, `country`, `city`) VALUES
(1, 'Chile', 'Santiago'),
(2, 'Argentina', 'Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `id_person` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  ` surname` varchar(50) NOT NULL,
  `date_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`id_person`, `name`, ` surname`, `date_birth`) VALUES
(1, 'Ismael', 'Garcia Perez', '1990-03-02'),
(2, 'Tomas', 'Agulera Mamani', '1990-02-12'),
(3, 'Richar', 'Quintana Suarez', '1990-03-05'),
(4, 'Jose Luiz', 'Sambra Rivera', '1990-02-08'),
(5, 'Mauricio', 'Marquez Vasquez', '1990-03-05'),
(6, 'Miguel', 'Choque Mmiranda', '1990-02-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fkid_category` int(11) NOT NULL,
  `fkid_origin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`id_team`, `name`, `fkid_category`, `fkid_origin`) VALUES
(1, 'Los tigres', 1, 2),
(2, 'Real Socieda', 1, 1),
(3, 'San Jose', 1, 2),
(5, 'Shaolin', 2, 1),
(6, 'Rael sucre', 2, 1),
(7, 'Rael sucre', 2, 1),
(8, 'Rael potosi', 2, 1),
(9, 'los Aliados', 2, 1),
(10, 'España', 2, 2),
(11, 'Tailandia', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `detail_league`
--
ALTER TABLE `detail_league`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fkid_equipo` (`fkid_team`),
  ADD KEY `fkid_liga` (`fkid_game`);

--
-- Indices de la tabla `detail_team`
--
ALTER TABLE `detail_team`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fkid_equipo` (`fkid_team`),
  ADD KEY `fkid_persona` (`fkid_person`);

--
-- Indices de la tabla `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`),
  ADD KEY `fkid_liga` (`fkid_league`);

--
-- Indices de la tabla `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`id_league`);

--
-- Indices de la tabla `origin`
--
ALTER TABLE `origin`
  ADD PRIMARY KEY (`id_origin`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`);

--
-- Indices de la tabla `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`),
  ADD KEY `fkid_categoria` (`fkid_category`),
  ADD KEY `fkid_origen` (`fkid_origin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detail_league`
--
ALTER TABLE `detail_league`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detail_team`
--
ALTER TABLE `detail_team`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `league`
--
ALTER TABLE `league`
  MODIFY `id_league` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `origin`
--
ALTER TABLE `origin`
  MODIFY `id_origin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detail_league`
--
ALTER TABLE `detail_league`
  ADD CONSTRAINT `detail_league_ibfk_1` FOREIGN KEY (`fkid_team`) REFERENCES `team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_league_ibfk_2` FOREIGN KEY (`fkid_game`) REFERENCES `game` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detail_team`
--
ALTER TABLE `detail_team`
  ADD CONSTRAINT `detail_team_ibfk_1` FOREIGN KEY (`fkid_team`) REFERENCES `team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_team_ibfk_2` FOREIGN KEY (`fkid_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`fkid_league`) REFERENCES `league` (`id_league`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`fkid_origin`) REFERENCES `origin` (`id_origin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`fkid_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
