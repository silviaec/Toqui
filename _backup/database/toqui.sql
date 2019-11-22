-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-10-2019 a las 00:36:59
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `toqui`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `post_id` int(10) NOT NULL,
  `comment_id` bigint(20) DEFAULT NULL,
  `text` text NOT NULL,
  `short_text` varchar(250) DEFAULT NULL,
  `images` varchar(240) DEFAULT NULL,
  `love` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment_id`, `text`, `short_text`, `images`, `love`, `created_at`, `updated_at`, `deleted`) VALUES
(31, 1, 22, NULL, 'Hola profe. Se puede entregar pasada la fecha?.', NULL, NULL, 0, '2019-09-21 19:53:06', '2019-09-21 19:53:06', 0),
(32, 1, 24, NULL, 'asdasd', NULL, NULL, 0, '2019-09-21 21:00:51', '2019-09-21 21:00:51', 0),
(33, 1, 24, NULL, 'asdfasf', NULL, NULL, 0, '2019-09-21 21:00:53', '2019-09-21 21:00:53', 0),
(34, 1, 24, NULL, 'asdas', NULL, NULL, 0, '2019-09-21 21:02:01', '2019-09-21 21:02:01', 0),
(35, 1, 23, NULL, 'ef', NULL, NULL, 0, '2019-09-21 21:43:04', '2019-09-21 21:43:04', 0),
(36, 1, 25, NULL, 'sdf', NULL, NULL, 0, '2019-09-21 22:01:38', '2019-09-21 22:01:38', 0),
(37, 1, 27, NULL, 'lagomarsino', NULL, NULL, 0, '2019-09-24 03:56:31', '2019-09-24 03:56:31', 0),
(38, 1, 25, NULL, 'adsfadsfds', NULL, NULL, 0, '2019-09-25 02:12:11', '2019-09-25 02:12:11', 0),
(39, 1, 27, NULL, 'sadfs', NULL, NULL, 0, '2019-09-25 02:12:16', '2019-09-25 02:12:16', 0),
(40, 1, 27, NULL, 'asdf', NULL, NULL, 0, '2019-09-25 02:12:19', '2019-09-25 02:12:19', 0),
(41, 1, 27, NULL, 'sadf', NULL, NULL, 0, '2019-09-25 02:12:21', '2019-09-25 02:12:21', 0),
(42, 1, 27, NULL, 'sfd', NULL, NULL, 0, '2019-09-26 02:58:27', '2019-09-26 02:58:27', 0),
(43, 1, 54, NULL, 'Kevin se la come.', NULL, NULL, 0, '2019-10-05 18:13:37', '2019-10-05 18:13:37', 0),
(44, 1, 54, NULL, 'Martín; silvia y joaquín tmb', NULL, NULL, 0, '2019-10-05 18:13:52', '2019-10-05 18:13:52', 0),
(45, 1, 57, NULL, 'sdfdsfds', NULL, NULL, 0, '2019-10-13 23:10:40', '2019-10-13 23:10:40', 0),
(46, 4, 64, NULL, 'Para mí, sos un pelotudo.', NULL, NULL, 0, '2019-10-13 23:26:32', '2019-10-13 23:26:32', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hashtags`
--

CREATE TABLE `hashtags` (
  `id` int(11) NOT NULL,
  `klass_id` int(11) NOT NULL,
  `hashtag` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hashtags`
--

INSERT INTO `hashtags` (`id`, `klass_id`, `hashtag`, `created_at`, `updated_at`) VALUES
(1, 37, '#examen', '2019-10-13 21:00:40', '2019-10-13 21:00:40'),
(2, 37, '#ass', '2019-10-13 21:00:40', '2019-10-13 21:00:40'),
(3, 37, '#apunte', '2019-10-13 21:05:04', '2019-10-13 21:05:04'),
(4, 37, '#dudas', '2019-10-13 21:13:11', '2019-10-13 21:13:11'),
(5, 37, '#feriado', '2019-10-13 21:13:11', '2019-10-13 21:13:11'),
(6, 37, '#hash', '2019-10-13 21:48:41', '2019-10-13 21:48:41'),
(7, 37, '#examenes', '2019-10-13 22:23:06', '2019-10-13 22:23:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hashtag_post`
--

CREATE TABLE `hashtag_post` (
  `id` int(11) NOT NULL,
  `hashtag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hashtag_post`
--

INSERT INTO `hashtag_post` (`id`, `hashtag_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 3, 74, '2019-10-13 21:05:04', '2019-10-13 21:05:04'),
(2, 1, 75, '2019-10-13 21:13:11', '2019-10-13 21:13:11'),
(3, 3, 75, '2019-10-13 21:13:11', '2019-10-13 21:13:11'),
(4, 4, 75, '2019-10-13 21:13:11', '2019-10-13 21:13:11'),
(5, 5, 75, '2019-10-13 21:13:11', '2019-10-13 21:13:11'),
(6, 6, 76, '2019-10-13 21:48:41', '2019-10-13 21:48:41'),
(7, 5, 77, '2019-10-13 22:23:06', '2019-10-13 22:23:06'),
(8, 7, 77, '2019-10-13 22:23:06', '2019-10-13 22:23:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `post_hash` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `name`, `post_hash`, `updated_at`, `created_at`) VALUES
(1, '1570216437de69d64d4db69f542aea9e653ef43054.jpg', 'de69d64d4db69f542aea9e653ef43054', '2019-10-04 22:13:57', '2019-10-04 22:13:57'),
(2, '1570216476de69d64d4db69f542aea9e653ef43054.png', 'de69d64d4db69f542aea9e653ef43054', '2019-10-04 22:14:36', '2019-10-04 22:14:36'),
(3, '15702167553fc44cbf80114f3ffa70ce53120bcb58.jpeg', '3fc44cbf80114f3ffa70ce53120bcb58', '2019-10-04 22:19:15', '2019-10-04 22:19:15'),
(4, '1570216790153224ae0a3fc8ed5eb593878aa408b2.png', '153224ae0a3fc8ed5eb593878aa408b2', '2019-10-04 22:19:50', '2019-10-04 22:19:50'),
(5, '157021681565ccae443e79788649ffec36cd5c8f4a.jpg', '65ccae443e79788649ffec36cd5c8f4a', '2019-10-04 22:20:15', '2019-10-04 22:20:15'),
(6, '1570216869600b281d91954b72ed4478466b075d3e.jpg', '600b281d91954b72ed4478466b075d3e', '2019-10-04 22:21:09', '2019-10-04 22:21:09'),
(7, '15702169157f69166d648bee181d7f86d7d0be169a.png', '7f69166d648bee181d7f86d7d0be169a', '2019-10-04 22:21:55', '2019-10-04 22:21:55'),
(8, '1570217100883981725eea93750e87e2602db801fb.png', '883981725eea93750e87e2602db801fb', '2019-10-04 22:25:00', '2019-10-04 22:25:00'),
(9, '1570217114883981725eea93750e87e2602db801fb.png', '883981725eea93750e87e2602db801fb', '2019-10-04 22:25:14', '2019-10-04 22:25:14'),
(10, '1570217126883981725eea93750e87e2602db801fb.jpeg', '883981725eea93750e87e2602db801fb', '2019-10-04 22:25:26', '2019-10-04 22:25:26'),
(11, '1570217135883981725eea93750e87e2602db801fb.jpg', '883981725eea93750e87e2602db801fb', '2019-10-04 22:25:35', '2019-10-04 22:25:35'),
(12, '1570217168e9279cfa05b8f78aba6cfaa6cdaf1202.png', 'e9279cfa05b8f78aba6cfaa6cdaf1202', '2019-10-04 22:26:08', '2019-10-04 22:26:08'),
(13, '1570218193deec94a129f8dd48a63920f01040b3da.png', 'deec94a129f8dd48a63920f01040b3da', '2019-10-04 22:43:13', '2019-10-04 22:43:13'),
(14, '1570218258deec94a129f8dd48a63920f01040b3da.png', 'deec94a129f8dd48a63920f01040b3da', '2019-10-04 22:44:18', '2019-10-04 22:44:18'),
(15, '15702184941f8c204462661faa95bbbbb9e88f1061.png', '1f8c204462661faa95bbbbb9e88f1061', '2019-10-04 22:48:14', '2019-10-04 22:48:14'),
(16, '15702185561f8c204462661faa95bbbbb9e88f1061.jpg', '1f8c204462661faa95bbbbb9e88f1061', '2019-10-04 22:49:16', '2019-10-04 22:49:16'),
(17, '15702185818321cf71db916a319607d1ff516e8be1.jpg', '8321cf71db916a319607d1ff516e8be1', '2019-10-04 22:49:41', '2019-10-04 22:49:41'),
(18, '15702186115a9dcf7670ead12af46349e7bc7f3a47.jpeg', '5a9dcf7670ead12af46349e7bc7f3a47', '2019-10-04 22:50:11', '2019-10-04 22:50:11'),
(19, '1570218803c33566e74e74f203fd40211db0669f79.jpeg', 'c33566e74e74f203fd40211db0669f79', '2019-10-04 22:53:23', '2019-10-04 22:53:23'),
(20, '1570218820c33566e74e74f203fd40211db0669f79.jpg', 'c33566e74e74f203fd40211db0669f79', '2019-10-04 22:53:40', '2019-10-04 22:53:40'),
(21, '157028834168a70a0cb3b7a476355cb2e705b41644.jpg', '68a70a0cb3b7a476355cb2e705b41644', '2019-10-05 18:12:21', '2019-10-05 18:12:21'),
(22, '157028835968a70a0cb3b7a476355cb2e705b41644.jpeg', '68a70a0cb3b7a476355cb2e705b41644', '2019-10-05 18:12:39', '2019-10-05 18:12:39'),
(23, '1570997931bb3b3a4fceac6be408579977fdfdf47b.png', 'bb3b3a4fceac6be408579977fdfdf47b', '2019-10-13 23:18:51', '2019-10-13 23:18:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `klasses`
--

CREATE TABLE `klasses` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `code` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` time NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `klasses`
--

INSERT INTO `klasses` (`id`, `name`, `code`, `user_id`, `created_at`, `updated_at`, `active`) VALUES
(34, 'Matemática discreta I', '89320', 1, '2019-10-01 03:22:00', '00:22:00', 1),
(35, 'Matemática discreta I', '89367', 1, '2019-10-01 03:22:47', '00:22:47', 1),
(36, 'Matemática discreta I', '89426', 1, '2019-10-01 03:23:46', '00:23:46', 1),
(37, 'Matemática discreta I', '89440', 1, '2019-10-01 03:24:00', '00:24:00', 1),
(38, 'Ciencia de la computación', '89478', 1, '2019-10-01 03:24:38', '00:24:38', 1),
(39, 'La clase de Pablo', '88072', 1, '2019-10-05 18:07:52', '15:07:52', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `klass_user`
--

CREATE TABLE `klass_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `klass_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `klass_user`
--

INSERT INTO `klass_user` (`id`, `user_id`, `klass_id`, `updated_at`, `created_at`, `active`) VALUES
(26, 1, 37, '2019-10-01 03:24:00', '2019-10-01 03:24:00', 1),
(27, 1, 38, '2019-10-01 03:24:38', '2019-10-01 03:24:38', 1),
(28, 1, 39, '2019-10-05 18:07:52', '2019-10-05 18:07:52', 1),
(29, 1, 40, '2019-10-13 16:04:31', '2019-10-13 16:04:31', 1),
(30, 1, 41, '2019-10-13 16:08:33', '2019-10-13 16:08:33', 1),
(31, 2, 37, '2019-10-13 16:22:19', '2019-10-13 16:22:19', 1),
(37, 3, 37, '2019-10-13 20:08:58', '2019-10-13 20:08:58', 1),
(38, 4, 37, '2019-10-13 23:26:19', '2019-10-13 23:26:19', 1),
(39, 5, 37, '2019-10-16 01:12:38', '2019-10-16 01:12:38', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  `text` text NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `user_id_to`, `text`, `view`, `created_at`, `updated_at`) VALUES
(67, 2, 1, 'hola', 1, '2019-10-13 22:12:53', '2019-10-13 22:31:27')

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(240) NOT NULL,
  `type` varchar(50) NOT NULL,
  `moment` int(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_At` datetime NOT NULL DEFAULT current_timestamp(),
  `reference` int(11) DEFAULT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `text`, `type`, `moment`, `created_at`, `updated_At`, `reference`, `view`) VALUES
(63, 2, 'Tenés un nuevo mensaje de Pablo', 'message', 1571178708, '2019-10-15 22:31:48', '2019-10-15 22:31:57', 5, 1)

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `love` int(11) NOT NULL DEFAULT 0,
  `title` varchar(240) NOT NULL,
  `short_text` varchar(250) DEFAULT NULL,
  `images` varchar(240) DEFAULT NULL,
  `klass_id` int(11) NOT NULL,
  `hash` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `userId`, `text`, `created_at`, `updated_at`, `love`, `title`, `short_text`, `images`, `klass_id`, `hash`) VALUES
(54, 1, '<div><span style=\"font-size: 14.4px;\">El presidente <span style=\"background-color: rgb(255, 255, 0);\">Mauricio Macri</span>, que <b>llegó</b> an<u>oche a la capita</u>l mendocina y cenó con el gobernador Alfredo Cornejo, encabezará hoy en esa ciudad una nueva marcha del “Sí se puede”, que postula su reelecció<i>n para los comici</i>os del 27 de octubre.</span></div><div><span style=\"font-size: 14.4px;\"><br></span></div><div><img src=\"http://127.0.0.1:8000/images/157028834168a70a0cb3b7a476355cb2e705b41644.jpg\" style=\"width: 100%\"><span style=\"font-size: 14.4px;\"><br></span></div><div><span style=\"font-size: 14.4px;\">El Presidente se siente honrado por la predisposición política de Cornejo -con quien se enfrentó con dureza en los últimos dos años- y la semana pasada decidió adelantar su visita a la provincia para compartir una cena privada en familia.</span></div><div><span style=\"font-size: 14.4px;\"><br></span></div><div><span style=\"font-size: 14.4px;\">Las diferencias de Macri y Cornejo fueron tan profundas que evitó que el presidente concurriera a hacer campaña en la semana previa a los comicios a gobernador: temía que su presencia en Mendoza complicará las chances del candidato oficialista Rodolfo Suárez. Finalmente, Suárez ganó, Macri habló con Cornejo y arreglaron compartir una comida en la casa del mandatario provincial.</span></div><div><span style=\"font-size: 14.4px;\"><br></span></div><div><img src=\"http://127.0.0.1:8000/images/157028835968a70a0cb3b7a476355cb2e705b41644.jpeg\" style=\"width: 25%; float: left;\" class=\"note-float-left\"></div><div><span style=\"font-size: 14.4px;\">Antes de la llegada de Macri al aeropuerto Internacional El Plumerillo, ya circulaba en los celulares de los mendocinos un audio de whatsapp, en el que aparece la voz del Presidente convocando a la caravana que va a protagonizar flanqueado por el gobernador Cornejo y su sucesor Suárez.</span></div>', '2019-10-13 17:41:40', '2019-10-13 20:41:40', 1, 'Este es un titular re copado.', 'El presidente Mauricio Macri, que llegó anoche a ...', NULL, 37, '68a70a0cb3b7a476355cb2e705b41644'),
(55, 1, '<p>bla</p>', '2019-10-05 18:44:49', '2019-10-05 18:44:49', 0, 'bla', 'bla', NULL, 38, 'bd825e8370f232b6b4f574b854d67a9a'),
(56, 2, '<p>asd</p>', '2019-10-13 16:25:36', '2019-10-13 16:25:36', 0, 'asd', 'asd', NULL, 34, 'b66c6a6ea9ea1c9d80e390ed0efa145b'),
(57, 2, '<p>este es otro post</p>', '2019-10-13 17:41:36', '2019-10-13 20:41:36', 1, 'Otro post', 'este es otro post', NULL, 37, '66d46d8c6ad44295ab738b79df3e7fba'),
(58, 1, '<p>sdafsadfsd</p>', '2019-10-13 23:10:44', '2019-10-13 23:10:44', 0, 'sadfsadf', 'sdafsadfsd', NULL, 37, '01a92fa99828ff6bd6280f94765ce7c5'),
(59, 1, '<p><i>sadfsdafsdf</i></p>', '2019-10-13 23:10:57', '2019-10-13 23:10:57', 0, 'asdfadsf', 'sadfsdafsdf', NULL, 37, '7986fd60b0f90fbe468865b3987e8eec'),
(60, 1, '<div class=\"row pb-content-type-text\" style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 20px;\"><div class=\"col-xs-12 col-print-12\" style=\"position: relative; min-height: 1px; float: left; width: 752.656px;\"><p class=\"element element-paragraph\" style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-size: 18px; line-height: 1.7em; color: rgb(0, 0, 0);\">Con el dólar a más de $60, la caída del poder adquisitivo y la incertidumbre de un cambio de Gobierno, las expectativas en las principales ciudades de la Costa Atlántica para esta temporada son&nbsp;<span style=\"font-weight: 700;\">positivas</span>, pero&nbsp;<span style=\"font-weight: 700;\">sin un optimismo exagerado</span>.&nbsp;<mark class=\"hl_yellow\" style=\"background: rgb(255, 252, 65);\"><span style=\"font-weight: 700;\">La posibilidad de que los turistas cambien algunos de los destinos en el exterior —como Punta del Este, Miami o las costas de Brasil— por las playas argentinas los alientan a esperar una “buena temporada”</span></mark></p></div></div><div class=\"row pb-content-type-text\" style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 20px;\"><div class=\"col-xs-12 col-print-12\" style=\"position: relative; min-height: 1px; float: left; width: 752.656px;\"><p class=\"element element-paragraph\" style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-size: 18px; line-height: 1.7em; color: rgb(0, 0, 0);\">¿Ya se observa un incremento en la demanda de reservas? Por ahora, aun están un poco por debajo de lo que estaban en la misma época del año pasado. Pero&nbsp;<span style=\"font-weight: 700;\">muchos turistas definen su destino durante octubre</span>. Además, las consultas sobre disponibilidad de hoteles y de alquileres se realizan cada vez más a último momento, incluso desde la ruta, cuando ya emprendieron el viaje, a través del celular.</p></div></div><div class=\"row pb-content-type-blockquote\" style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 20px;\"><div class=\"col-xs-12\" style=\"position: relative; min-height: 1px; float: left; width: 752.656px;\"><blockquote class=\"element element-blockquote\" style=\"padding: 10px 60px; margin-bottom: 20px; font-size: 22.5px; border: none; color: rgb(142, 143, 143); font-style: italic; quotes: &quot;“&quot; &quot;”&quot; &quot;‘&quot; &quot;’&quot;;\">&nbsp;<span style=\"font-weight: 700;\">Alquilar un departamento de un ambiente (para dos o tres personas) en enero en Mar del Plata costará unos $17.550 por quincena</span></blockquote></div></div><div class=\"row pb-content-type-text\" style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 20px;\"><div class=\"col-xs-12 col-print-12\" style=\"position: relative; min-height: 1px; float: left; width: 752.656px;\"><p class=\"element element-paragraph\" style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-size: 18px; line-height: 1.7em; color: rgb(0, 0, 0);\">“Un contexto de dólar alto puede favorecer al turismo interno, pero por ahora, la gente está en una posición muy conservadora. Desde hace algunos años, se viene dando un período de vacaciones más corto, de 3 o 4 días y el resto en otras localidades de la costa, que antes no era usual. Además,&nbsp;<span style=\"font-weight: 700;\">por las&nbsp;</span><i><span style=\"font-weight: 700;\">low cost</span></i><span style=\"font-weight: 700;\">, competimos ahora también con otras ciudades del interior del país como Bariloche, Salta o Ushuaia</span>\", dijo&nbsp;<span style=\"font-weight: 700;\">Avedís Sahakian</span>, de la Asociación Empresaria Hotelera y Gastronómica (AEHG) de Mar del Plata. Durante este fin de semana largo, según estimaciones de la asociación, hay un&nbsp;<span style=\"font-weight: 700;\">70% de ocupación en los hoteles de la ciudad</span>, en todas las categorías y con una estadía promedio de dos noches.</p></div></div>', '2019-10-13 23:12:30', '2019-10-13 23:12:30', 0, 'Mar del plata', 'Con el dólar a más de $60, la caída del poder a...', NULL, 37, '8fdae571e6e2d0b480d5f2567e19fdb1'),
(61, 1, '<p><span style=\"font-size: 14.4px;\">Con el dólar a más de $60, la caída del poder adquisitivo y la incertidumbre de un cambio de Gobierno, las expectativas en las principales ciudades de la Costa Atlántica para esta temporada son positivas, pero sin un optimismo exagerado. La posibilidad de que los turistas cambien algunos de los destinos en el exterior —como Punta del Este, Miami o las costas de Brasil— por las playas argentinas los alientan a esperar una “buena temporada”</span></p><p><span style=\"font-size: 14.4px;\">¿Ya se observa un incremento en la demanda de reservas? Por ahora, aun están un poco por debajo de lo que estaban en la misma época del año pasado. Pero muchos turistas definen su destino durante octubre. Además, las consultas sobre disponibilidad de hoteles y de alquileres se realizan cada vez más a último momento, incluso desde la ruta, cuando ya emprendieron el viaje, a través del celular.</span></p><p><span style=\"font-size: 14.4px;\">&nbsp;Alquilar un departamento de un ambiente (para dos o tres personas) en enero en Mar del Plata costará unos $17.550 por quincena</span></p><p><span style=\"font-size: 14.4px;\">“Un contexto de dólar alto puede favorecer al turismo interno, pero por ahora, la gente está en una posición muy conservadora. Desde hace algunos años, se viene dando un período de vacaciones más corto, de 3 o 4 días y el resto en otras localidades de la costa, que antes no era usual. Además, por las low cost, competimos ahora también con otras ciudades del interior del país como Bariloche, Salta o Ushuaia\", dijo Avedís Sahakian, de la Asociación Empresaria Hotelera y Gastronómica (AEHG) de Mar del Plata. Durante este fin de semana largo, según estimaciones de la asociación, hay un 70% de ocupación en los hoteles de la ciudad, en todas las categorías y con una estadía promedio de dos noches.</span></p>', '2019-10-13 23:13:16', '2019-10-13 23:13:16', 0, 'Mardel plata', 'Con el dólar a más de $60, la caída del poder a...', NULL, 37, 'b3f532d70573be51233021dfa4cafbcf'),
(62, 1, '<p>asdfsfasdf</p><p>adasd</p>', '2019-10-13 23:15:58', '2019-10-13 23:15:58', 0, 'asd', 'asdfsfasdfadasd', NULL, 37, 'f14cd57bbee4b39a6cf9e9e5b58894cc'),
(63, 1, '<p>Con el dólar a más de $60, la caída del poder adquisitivo y la incertidumbre de un cambio de Gobierno, las expectativas en las principales ciudades de la Costa Atlántica para esta temporada son positivas, pero sin un optimismo exagerado. La posibilidad de que los turistas cambien algunos de los destinos en el exterior —como Punta del Este, Miami o las costas de Brasil— por las playas argentinas los alientan a esperar una “buena temporada”</p><p>¿Ya se observa un incremento en la demanda de reservas? Por ahora, aun están un poco por debajo de lo que estaban en la misma época del año pasado. Pero muchos turistas definen su destino durante octubre. Además, las consultas sobre disponibilidad de hoteles y de alquileres se realizan cada vez más a último momento, incluso desde la ruta, cuando ya emprendieron el viaje, a través del celular.</p><p>&nbsp;Alquilar un departamento de un ambiente (para dos o tres personas) en enero en Mar del Plata costará unos $17.550 por quincena</p><p>“Un contexto de dólar alto puede favorecer al turismo interno, pero por ahora, la gente está en una posición muy conservadora. Desde hace algunos años, se viene dando un período de vacaciones más corto, de 3 o 4 días y el resto en otras localidades de la costa, que antes no era usual. Además, por las low cost, competimos ahora también con otras ciudades del interior del país como Bariloche, Salta o Ushuaia\", dijo Avedís Sahakian, de la Asociación Empresaria Hotelera y Gastronómica (AEHG) de Mar del Plata. Durante este fin de semana largo, según estimaciones de la asociación, hay un 70% de ocupación en los hoteles de la ciudad, en todas las categorías y con una estadía promedio de dos noches.</p>', '2019-10-13 23:17:59', '2019-10-13 23:17:59', 0, 'El dólar alto puede favorecer al turismo interno', 'Con el dólar a más de $60, la caída del poder a...', NULL, 37, 'e9126792308ab64b166166602ceaacdb'),
(64, 1, '<p>Uno es muy desordenado. Al otro lo obsesiona el orden. Uno vive con el mate al lado. Al otro le va más el café negro. Uno vive de traje. El otro en jeans y a lo sumo se pone una camisa si la reunión lo amerita. Son de generaciones diferentes. Hoy comparten la mayor parte del tiempo. Y si el 27 próximo uno de ellos es elegido presidente, el otro, Santiago Cafiero, podría convertirse el 10 de diciembre en su jefe de Gabinete.</p><p>Se conocen desde hace dos años y en poco tiempo lograron una relación de confianza. Cafiero nació en cuna política y peronista: es nieto de Antonio Cafiero y su padre Juan Pablo, también tiene una larga trayectoria en esa corriente. Santiago es uno de los hombres más importantes con oficina propia en calle México, el búnker de Alberto Fernández y el lugar donde hoy se trabaja en el proyecto de gobierno para los próximos cuatro años.</p><p>En la Casa Rosada los separaría una puerta, entre despacho y despacho. La misma puerta que durante cuatro años Néstor Kirchner abrió sin golpear para consultar algo, hacerle una broma o para saber con quien estaba reunido Alberto Fernández que era su jefe de Gabinete.</p><p><img src=\"http://127.0.0.1:8000/images/1570997931bb3b3a4fceac6be408579977fdfdf47b.png\" style=\"width: 100%\"><br></p><p>Santiago Cafiero no sólo es su jefe de campaña. Coordina los equipos que ya trabajan en los temas centrales que pondrá en marcha Alberto Fernández si le gana las elecciones a Mauricio Macri.</p>', '2019-10-13 20:44:12', '2019-10-13 23:44:12', 1, 'Santiago Cafiero: la historia del hombre que en dos años se convirtió en la mano derecha de Alberto Fernández', 'Uno es muy desordenado. Al otro lo obsesiona el or...', NULL, 37, 'bb3b3a4fceac6be408579977fdfdf47b'),
(65, 2, '<p>#examen #feriado #examen </p>', '2019-10-13 23:57:10', '2019-10-13 23:57:10', 0, 'asdad', '#examen #feriado #examen ', NULL, 37, '02a15a94a07324b54b93ab95ef9779e1'),
(66, 2, '<p>#examen #ass</p><p>asdasdas</p>', '2019-10-13 23:57:26', '2019-10-13 23:57:26', 0, 'asd', '#examen #assasdasdas', NULL, 37, '02a15a94a07324b54b93ab95ef9779e1'),
(67, 2, '<p>#examen #ass</p><p>asdasdas</p>', '2019-10-13 23:57:45', '2019-10-13 23:57:45', 0, 'asd', '#examen #assasdasdas', NULL, 37, '02a15a94a07324b54b93ab95ef9779e1'),
(68, 2, '<p>#examen #ass</p><p>asdasdas</p>', '2019-10-13 23:58:14', '2019-10-13 23:58:14', 0, 'asd', '#examen #assasdasdas', NULL, 37, '02a15a94a07324b54b93ab95ef9779e1'),
(69, 2, '<p>#examen #ass</p><p>asdasdas</p>', '2019-10-13 23:58:29', '2019-10-13 23:58:29', 0, 'asd', '#examen #assasdasdas', NULL, 37, '02a15a94a07324b54b93ab95ef9779e1'),
(70, 2, '<p>#examen #ass</p><p>asdasdas</p>', '2019-10-13 23:58:47', '2019-10-13 23:58:47', 0, 'asd', '#examen #assasdasdas', NULL, 37, '02a15a94a07324b54b93ab95ef9779e1'),
(71, 2, '<p>#examen #ass</p><p>asdasdas</p>', '2019-10-13 23:59:09', '2019-10-13 23:59:09', 0, 'asd', '#examen #assasdasdas', NULL, 37, '02a15a94a07324b54b93ab95ef9779e1'),
(72, 2, '<p>#examen #ass</p><p>asdasdas</p>', '2019-10-13 23:59:24', '2019-10-13 23:59:24', 0, 'asd', '#examen #assasdasdas', NULL, 37, '02a15a94a07324b54b93ab95ef9779e1'),
(73, 2, '<p>#examen #ass</p><p>asdasdas</p>', '2019-10-14 00:00:40', '2019-10-14 00:00:40', 0, 'asd', '#examen #assasdasdas', NULL, 37, '02a15a94a07324b54b93ab95ef9779e1'),
(74, 2, '<p>#apunte </p>', '2019-10-14 00:05:04', '2019-10-14 00:05:04', 0, 'adasdsa', '#apunte ', NULL, 37, '2dae9f934e45453f2def193dc5b5ad37'),
(75, 2, '<p>#examen #apunte #dudas #feriado&nbsp; Ahora tenemos hashtags!</p>', '2019-10-14 00:13:11', '2019-10-14 00:13:11', 0, 'Noticias de ultimo momento', '#examen #apunte #dudas #feriado&nbsp; Ahora tenemo...', NULL, 37, '380e31577d14f5362e6216b83f9294c5'),
(76, 2, '<p>@user2 @user #hash </p>', '2019-10-14 00:48:41', '2019-10-14 00:48:41', 0, 'asd', '@user2 @user #hash ', NULL, 37, '83c26296f1702e1f901f5acb2ebf7da8'),
(77, 2, '<p>#feriado #examenes</p>', '2019-10-14 01:23:06', '2019-10-14 01:23:06', 0, 'aa', '#feriado #examenes', NULL, 37, '084f97169497286a16f6163cdb17ce82');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joaquin Di Toma', 'joacoditoma@gmail.com', NULL, '$2y$10$HNYhXjupjI0OG3nIrJ/mH.Fim.fTKoBqMdiLFYA9brJBXU/cU.m1S', 'VpVR0c8qCFPCQZwyiUxVDQLU5yhtXxmw9tvhgcyhjJ7g7seyAJvMLXL2veVd', '2019-09-19 03:11:01', '2019-09-24 06:02:40'),
(2, 'Claudio Novato', 'novato@gmail.com', NULL, '$2y$10$4jyXulx0sEjQTI3d..5E1uMIsRFIh3CxCkTVs7FXPqf7q0TxsFWZK', NULL, '2019-10-13 16:16:53', '2019-10-13 16:16:53'),
(3, 'Luis Alberto', 'lucho@gmail.com', NULL, '$2y$10$vLwy6e8ueQRcYs75OATz2.6rwmwC0Ipje7YHnSJJ0psiRnhMdpxjC', NULL, '2019-10-13 20:08:38', '2019-10-13 20:08:38'),
(4, 'Pedro El Escamoso', 'pedro@gmail.com', NULL, '$2y$10$6Z8ovqxKsWtJB02.Qr.GkOL94Bwm5sz4PVQai2VR8hTm89x2NZifW', NULL, '2019-10-13 23:25:46', '2019-10-13 23:25:46'),
(5, 'Pablo', 'pol@gmail.com', NULL, '$2y$10$gUQqEqDwuP/gZe2gvYQktOk.OV.zmFa4oXqPQ/s.Ltc/CiHvWDFUS', NULL, '2019-10-16 01:12:32', '2019-10-16 01:12:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_post_love`
--

CREATE TABLE `user_post_love` (
  `user_id` int(20) NOT NULL,
  `post_id` int(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_post_love`
--

INSERT INTO `user_post_love` (`user_id`, `post_id`, `updated_at`, `created_at`, `id`) VALUES
(1, 24, '2019-09-21 21:19:57', '2019-09-21 21:19:57', 322),
(1, 27, '2019-10-01 03:24:59', '2019-10-01 03:24:59', 366),
(1, 38, '2019-10-04 20:06:18', '2019-10-04 20:06:18', 368),
(1, 57, '2019-10-13 20:41:36', '2019-10-13 20:41:36', 374),
(1, 54, '2019-10-13 20:41:40', '2019-10-13 20:41:40', 379),
(2, 64, '2019-10-13 23:44:12', '2019-10-13 23:44:12', 380);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hashtag_post`
--
ALTER TABLE `hashtag_post`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `klasses`
--
ALTER TABLE `klasses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `klass_user`
--
ALTER TABLE `klass_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_post_love`
--
ALTER TABLE `user_post_love`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `hashtag_post`
--
ALTER TABLE `hashtag_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `klasses`
--
ALTER TABLE `klasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `klass_user`
--
ALTER TABLE `klass_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user_post_love`
--
ALTER TABLE `user_post_love`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;
COMMIT;
