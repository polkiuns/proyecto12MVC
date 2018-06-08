-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 08-06-2018 a las 12:22:25
-- Versión del servidor: 8.0.3-rc-log
-- Versión de PHP: 7.1.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto12`
--
CREATE DATABASE IF NOT EXISTS `proyecto12` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `proyecto12`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE IF NOT EXISTS `clases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `iframe` varchar(255) NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lesson_id` (`lesson_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `name`, `url`, `description`, `body`, `iframe`, `lesson_id`, `published`) VALUES
(1, 'Primera clase', 'primera-clase', 'Primera clasePrimera clase', '<p>Primera clasePrimera clasePrimera clasePrimera clase</p>\r\n', 'Primera clasePrimera clase', 1, 1),
(3, 'SEGUNDA CLASE', 'segunda-clase', 'SEGUNDA CLASE', '<p>SEGUNDA CLASE</p>\r\n', ' SEGUNDA CLASE', 1, 1),
(4, 'TERCERA CLASE', 'tercera-clase', 'TERCERA CLASE', '<p>TERCERA CLASETERCERA CLASE</p>\r\n', ' TERCERA CLASETERCERA CLASE', 1, 1),
(5, 'CUARTA CLASE', 'cuarta-clase', 'CUARTA CLASE', '<p>CUARTA CLASE</p>\r\n', ' CUARTA CLASE', 2, 1),
(6, 'QUINTA CLASEsdfsdf', 'quinta-clasesdfsdf', 'QUINTA CLASE', '<p>QUINTA CLASE</p>\r\n', ' QUINTA CLASE', 3, 1),
(11, 'CLASE 1', 'clase-1', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin', '<h2>&iquest;Qu&eacute; es Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>\r\n', ' <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_4PqTJRkZic\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 1, 1),
(12, 'clase2 ', 'clase2', 'clase2 ', '<h2>&iquest;D&oacute;nde puedo conseguirlo?</h2>\r\n\r\n<p>Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayor&iacute;a sufri&oacute; alteraciones en alguna manera, ya sea porque se le agreg&oacute; humor, o palabras aleatorias que no parecen ni un poco cre&iacute;bles. Si vas a utilizar un pasaje de Lorem Ipsum, necesit&aacute;s estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el &uacute;nico generador verdadero (v&aacute;lido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del lat&iacute;n, combinadas con estructuras muy &uacute;tiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estar&aacute; libre de repeticiones, humor agregado o palabras no caracter&iacute;sticas del lenguaje, etc.</p>\r\n', ' <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_4PqTJRkZic\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 3, 1),
(13, 'clase 3', 'clase-3', 'clase 3', '<h2>&iquest;Por qu&eacute; lo usamos?</h2>\r\n\r\n<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo &quot;Contenido aqu&iacute;, contenido aqu&iacute;&quot;. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer. Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una b&uacute;squeda de &quot;Lorem Ipsum&quot; va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a trav&eacute;s de los a&ntilde;os, algunas veces por accidente, otras veces a prop&oacute;sito (por ejemplo insert&aacute;ndole humor y cosas por el estilo).</p>\r\n', ' <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_4PqTJRkZic\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 4, 1),
(14, 'clase 4', 'clase-4', 'clase 4', '<p>clase 4clase 4clase 4clase 4clase 4clase 4clase 4clase 4clase 4clase 4clase 4clase 4clase 4</p>\r\n', ' clase 4clase 4clase 4clase 4', 1, 0),
(16, 'NUEVA CLASE ESCONDIDA', 'nueva-clase-escondida', 'NUEVA CLASE ESCONDIDA', '<p>NUEVA CLASE ESCONDIDA</p>\r\n', ' NUEVA CLASE ESCONDIDA', 4, 0),
(17, 'NUEVA CLASE DE PROFESOR', 'nueva-clase-de-profesor', 'NUEVA CLASE DE PROFESOR', '<p>NUEVA CLASE DE PROFESOR</p>\r\n', ' NUEVA CLASE DE PROFESOR', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_ibfk_1` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `name`, `url`, `course_id`) VALUES
(1, 'ESO', 'eso', NULL),
(2, 'BACHILLER', 'bachiller', NULL),
(3, '1_ESO', '1-eso', 1),
(4, '2_ESO', '2-eso', 1),
(7, '1_BACH', '1-bach', 2),
(8, '2_BACH', '2-bach', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_subject`
--

CREATE TABLE IF NOT EXISTS `course_subject` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `course_subject`
--

INSERT INTO `course_subject` (`id`, `course_id`, `subject_id`) VALUES
(1, 3, 1),
(2, 4, 2),
(3, 4, 3),
(4, 4, 4),
(5, 7, 5),
(6, 7, 6),
(7, 8, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED DEFAULT NULL,
  `published` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `lesson_id` (`lesson_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `subject_id`, `teacher_id`, `lesson_id`, `published`) VALUES
(1, 'Tema1', 1, 1, NULL, 1),
(2, 'Tema2', 1, 1, NULL, 1),
(3, 'Tema3', 1, 1, NULL, 1),
(4, 'Examenes tema 1', 1, 3, 1, 1),
(5, 'asdasdasd', 1, 2, 1, 1),
(8, 'awdawdawdawd', 1, 2, 1, 0),
(9, 'asdasdasd', 3, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'teacher'),
(3, 'student');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dni_alumno` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `name`, `surname`, `phone`, `address`, `dni_alumno`, `user_id`) VALUES
(1, 'almn1', 'almn1', '123123123', 'almn1', 'almn1', 8),
(2, 'almn2', 'almn2', '123123123', 'almn2almn2', '123123123', 9),
(3, 'alm3alm3asd', 'alm3alm3', '123123123', 'alm3alm3', 'alm3alm3', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_subject`
--

CREATE TABLE IF NOT EXISTS `student_subject` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `student_subject`
--

INSERT INTO `student_subject` (`id`, `student_id`, `subject_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4),
(4, 2, 1),
(5, 2, 3),
(6, 2, 5),
(18, 3, 5),
(19, 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `url`, `description`) VALUES
(1, 'MAT1_ESO', 'mat1-eso', 'MAT1_ESO'),
(2, 'MAT2_ESO', 'mat2-eso', 'MAT2_ESO'),
(3, 'LENG2_ESO', 'leng2-eso', 'LENG2_ESO'),
(4, 'INGL_2ESO', 'ingl-2eso', 'INGL_2ESO'),
(5, '1MATH_BACH', '1math-bach', '1MATH_BACH'),
(6, '1-2MATHBACH', '1-2mathbach', '1-2MATHBACH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject_teacher`
--

CREATE TABLE IF NOT EXISTS `subject_teacher` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subject_teacher`
--

INSERT INTO `subject_teacher` (`id`, `subject_id`, `teacher_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 2, 3),
(6, 3, 3),
(7, 5, 3),
(8, 2, 4),
(9, 4, 4),
(10, 6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dni_profesor` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `surname`, `phone`, `address`, `dni_profesor`, `user_id`) VALUES
(1, 'profesor1', 'profesor1', '123123123', 'profesor1', 'profesor1', 2),
(2, 'profesor2', 'profesor2', '123123123', 'profesor2', 'profesor2', 3),
(3, 'profesor3', 'profesor3', '123123123', 'profesor3profesor3', 'profesor3profesor3', 4),
(4, 'profesor4', 'profesor4', '123123123', 'profesor4profesor4', 'profesor4profesor4', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(1, 'root', 'root@gmail.com', '63a9f0ea7bb98050796b649e85481845', 1),
(2, 'profesor1', 'profesor1@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(3, 'profesor2', 'profesor2@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(4, 'profesor3', 'profesor3@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(5, 'profesor4', 'profesor4@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(8, 'almn1', 'almn1@gmail.com', '202cb962ac59075b964b07152d234b70', 3),
(9, 'almn2', 'almn2@gmail.com', '202cb962ac59075b964b07152d234b70', 3),
(10, 'alm3alm3asd', 'alm3@gmail.com', '202cb962ac59075b964b07152d234b70', 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `course_subject`
--
ALTER TABLE `course_subject`
  ADD CONSTRAINT `course_subject_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_subject_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lessons_ibfk_3` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD CONSTRAINT `subject_teacher_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_teacher_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
