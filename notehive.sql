-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2025 a las 01:38:03
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
-- Base de datos: `notehive`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(4, 'Compras'),
(3, 'Personal'),
(2, 'Salud'),
(1, 'Trabajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `usuario_id`, `titulo`, `contenido`, `fecha_creacion`, `categoria_id`) VALUES
(2, 4, 'Mercado', 'Comprar cereal, carne, aceite, sal, leche.', '2025-03-21 00:00:44', 4),
(4, 4, 'Medicina', 'Tomar medicamento', '2025-03-21 01:07:13', 2),
(5, 4, 'Proyecto', 'Realizar un crud.', '2025-03-21 01:07:58', 1),
(6, 8, 'Proyecto', 'ccccc', '2025-03-23 00:34:57', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `email`, `password`, `created_at`) VALUES
(2, 'Carlos', 'Giron', 'Giron29', 'giron@gmail.com', '$2y$10$5av2hBUQslWu01UgfVUhPu8OexU5HyiicG5/o9ga8.3fD8WQVldLy', '2025-03-17 21:50:04'),
(3, 'Abner', 'Navarro', 'Abner21', 'abnernav@gmail.com', '$2y$10$LgSYYLG48A9QYZ12RddK8OYsBw6/BMjNZffbfPtKUXh5KK7TXJzKa', '2025-03-17 23:44:20'),
(4, 'Heysel', 'Argueta', 'Heysel02', 'heysel@gmail.com', '$2y$10$l4DaNmAyeuSj5ovAD2EZeujp6DLhoZFiYnsMdFx6cKhQSntNzWWeu', '2025-03-18 02:40:06'),
(5, 'Fernando', 'Lopez', 'Fer2001', 'fernando@gmail.com', '$2y$10$DVTpqsks5xVUxO.48VNpHOBcONnyjpduIfqQDuy57vUfuJgIKEY.2', '2025-03-18 15:48:03'),
(6, 'Caro', 'Ramos', 'CaroR1', 'caro1@gmail.com', '$2y$10$7sesSOm0pWAzpT3CmbyTW.kRrLS7v8ryun0lXpThNze6hBL6.6SXO', '2025-03-20 20:56:30'),
(7, 'Camila', 'Fernandez', 'Cami03', 'camila1@gmail.com', '$2y$10$zFzyKDsvFAWB4o7Jixlgjeo7jvU1TpTZeV9zVxwZ3xzMnH20BoFWe', '2025-03-20 20:59:24'),
(8, 'Caro', 'Lopez', 'Caro1', 'carolina@gmail.com', '$2y$10$B6Mp7Oy9FU/t..6Iv1goU.BL7ht1VuvqFOl9oeQHEmGx7/yfw.6pu', '2025-03-20 21:02:58'),
(9, 'Raul', 'Martinez', 'Raaul2', 'raul@gmail.com', '$2y$10$VTfi2w8UioLu0QGwrHH3pe9GkBWloN2bfWvJqDFE7BmiYF3j.q10q', '2025-03-23 00:41:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
