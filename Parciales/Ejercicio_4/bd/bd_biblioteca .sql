-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 05-04-2025 a las 17:28:13
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
-- Base de datos: `bd_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `carrera` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `carrera`) VALUES
(26, 'INFORMATICA '),
(35, 'INGENIERIA DE SISTEMAS'),
(111, 'INGENIERIA EN CIENCAS DE LA COMPUTACION\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `id` int(11) NOT NULL,
  `editorial` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`id`, `editorial`) VALUES
(1, 'Castellana'),
(2, 'Bolivia'),
(3, 'Santillana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `ideditorial` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idcarrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `imagen`, `titulo`, `autor`, `ideditorial`, `anio`, `idusuario`, `idcarrera`) VALUES
(1, 'introduccioinformatica.jpg', 'Introduccion a la Informatica', 'Michael Miller', 2, 1992, 0, 1),
(2, 'arquitecturacomputadoras.jpg', 'Aruitectura de Computadoras', 'Patricio Quiroga', 2, 4988, 0, 1),
(3, 'CursoAndroid.jpg', 'Curso Android', 'Maestros del WEB', 1, 8777, 0, 2),
(4, 'bigdata.jpg', 'Bigdata', 'Marcombo', 2, 41, 0, 2),
(5, 'ScrumIngenieriaSoftware.jpg', 'Scrum Ingenieria de Software', 'Dario Palminio', 2, 2015, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL,
  `idlibro` int(11) NOT NULL,
  `nombreprestamo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(6) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombrecompleto` varchar(100) NOT NULL,
  `cu` varchar(10) NOT NULL,
  `idcarrera` int(11) NOT NULL,
  `nivel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombrecompleto`, `cu`, `idcarrera`, `nivel`) VALUES
(1, 'admin@biblioteca.usfx.bo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Administrador sistema', '35-0', 35, 1),
(2, 'carlosmontellano@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Carlos Montellano', '35-239', 35, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
