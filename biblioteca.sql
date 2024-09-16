-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2024 a las 01:47:42
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
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `apellido`, `fecha_nacimiento`, `nacionalidad`) VALUES
(1, 'Joanne Kathleen', 'Rowling', '1965-07-31', 'Britanica'),
(2, 'George Raymond Richard', 'Martin', '1946-09-20', 'Estadounidense'),
(3, 'Luis', 'Borges', '1899-08-24', 'Argentino'),
(4, 'Howard Phillips', 'Lovecraft', '1890-08-20', 'Estadounidense'),
(5, 'Stephen ', 'King', '1947-09-21', 'Estadounidense');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Narrativa', 'Tipo de libros en los cuales se narra una historia, ya sea de modo realista o fantastico, pero siempre ficcional.'),
(2, 'De Texto', 'Son las ediciones destinadas a acompañar y facilitar el proceso de educación formal. Generalmente redactados por un especialista en la materia. '),
(3, 'No ficcion', 'Aquellos en los que normalmente se aborda subjetivamente alguna historia o tema real, bajo la premisa de apegarse lo más posible a la verdad de los hechos e incurrir de manera controlada en la imaginación'),
(4, 'Artisticos e Ilustrados', 'Aquellos entre cuyas páginas es posible hallar reproducciones de obras de arte gráficas o visuales.'),
(5, 'Divulgativos', 'Aquellos que tienen una clara intención informativa, y se leen con el propósito de conocer más a fondo un tema.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id_editorial` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre`, `pais`, `ciudad`, `direccion`) VALUES
(1, 'Clarin', 'Argentina', 'Ciudad Autonoma de Buenos Aires', 'Piedras 1743'),
(2, 'Atlantida', 'Argentina', 'Ciudad Autonoma de Buenos Aires', 'Honduras 5582'),
(3, 'Planeta', 'España', 'Barcelona', 'Av. Diagonal, 662-664'),
(4, 'HarperCollins', 'Estados Unidos', 'New York', '195 Broadway'),
(5, 'Alfaguara', 'España', 'Madrid', 'Calle de Agustín de Foxá, 40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `id_editorial` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad_copias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `id_autor`, `fecha_publicacion`, `id_editorial`, `id_categoria`, `id_material`, `cantidad_copias`) VALUES
(1, 'Harry Potter y La Piedra Filosofal', 1, '1997-06-26', 4, 1, 1, 5),
(2, 'Game of Thrones: Choque de Reyes', 2, '1998-11-16', 3, 1, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id_material`, `tipo`) VALUES
(1, 'libro'),
(2, 'revista'),
(3, 'periodico'),
(4, 'libro'),
(5, 'revista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodico`
--

CREATE TABLE `periodico` (
  `id_periodico` int(11) NOT NULL,
  `id_editorial` int(11) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad_copias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `periodico`
--

INSERT INTO `periodico` (`id_periodico`, `id_editorial`, `fecha_publicacion`, `id_material`, `cantidad_copias`) VALUES
(1, 1, '2024-09-15', 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_prestamo`, `id_usuario`, `id_material`, `fecha_prestamo`, `fecha_devolucion`) VALUES
(1, 1, 1, '2024-09-15', '2024-10-31'),
(2, 2, 2, '2024-09-15', '2024-09-30'),
(3, 3, 3, '2024-09-15', '2024-09-23'),
(4, 4, 4, '2024-09-15', '2024-09-30'),
(5, 5, 5, '2024-09-15', '2024-09-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revista`
--

CREATE TABLE `revista` (
  `id_revista` int(11) NOT NULL,
  `id_editorial` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `volumen` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad_copias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `revista`
--

INSERT INTO `revista` (`id_revista`, `id_editorial`, `titulo`, `descripcion`, `id_categoria`, `fecha_publicacion`, `volumen`, `id_material`, `cantidad_copias`) VALUES
(1, 5, 'Autos y Motos en Estados Unidos', 'Informacion sobre autos y motos actuales en los Estados Unidos. Incluye informacion sobre precios, marcas, concecionarias, etc. ', 5, '2024-09-01', 1, 2, 11),
(2, 2, 'Compra Gamer', 'Revista dedicada a las mejores PC en la Argentina. Incluye informacion acerca de diferente tipos de hardware, precios, distribuidoras, etc. ', 5, '2023-01-31', 4, 5, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `direccion`, `mail`, `telefono`, `fecha_registro`) VALUES
(1, 'Juan Manuel', 'Grandio', '14 de Julio 279', 'grandiojm@gmail.com', '2494669433', '2024-09-15'),
(2, 'Aaron Gabriel', 'Ciancio', 'Berutti 1556', 'aaronciancio321@gmail.com', '2284245140', '2024-09-15'),
(3, 'Federico', 'Alcorta', 'General Rodriguez 7840', 'fedealcorta@gmail.com', '1142998471', '2024-09-15'),
(4, 'Florencia', 'Altamirano', 'Hoyos 570', 'faltamirano@gmail.com', '1156890152', '2024-09-15'),
(5, 'Lucila', 'Torres', 'Salta 1570', 'lucilatorres@gmail.com', '2494669873', '2024-09-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_editorial` (`id_editorial`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `periodico`
--
ALTER TABLE `periodico`
  ADD PRIMARY KEY (`id_periodico`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_editorial` (`id_editorial`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `revista`
--
ALTER TABLE `revista`
  ADD PRIMARY KEY (`id_revista`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_editorial` (`id_editorial`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `periodico`
--
ALTER TABLE `periodico`
  MODIFY `id_periodico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `revista`
--
ALTER TABLE `revista`
  MODIFY `id_revista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id_editorial`) ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_4` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `periodico`
--
ALTER TABLE `periodico`
  ADD CONSTRAINT `periodico_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON UPDATE CASCADE,
  ADD CONSTRAINT `periodico_ibfk_2` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id_editorial`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `revista`
--
ALTER TABLE `revista`
  ADD CONSTRAINT `revista_ibfk_1` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id_editorial`) ON UPDATE CASCADE,
  ADD CONSTRAINT `revista_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON UPDATE CASCADE,
  ADD CONSTRAINT `revista_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
