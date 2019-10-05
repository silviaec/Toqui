-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-10-2019 a las 16:25:24
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
(42, 1, 27, NULL, 'sfd', NULL, NULL, 0, '2019-09-26 02:58:27', '2019-09-26 02:58:27', 0);

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
(20, '1570218820c33566e74e74f203fd40211db0669f79.jpg', 'c33566e74e74f203fd40211db0669f79', '2019-10-04 22:53:40', '2019-10-04 22:53:40');

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
(38, 'Ciencia de la computación', '89478', 1, '2019-10-01 03:24:38', '00:24:38', 1);

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
(27, 1, 38, '2019-10-01 03:24:38', '2019-10-01 03:24:38', 1);

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
(45, 1, '<p><img src=\"http://127.0.0.1:8000/images/1570216869600b281d91954b72ed4478466b075d3e.jpg\" style=\"width: 25%; float: left;\" class=\"note-float-left\">Acá tenemos la foto de perifl de un chabón muy fachero.</p><h2>Joaquín Di Toma</h2><p>adfafidsajfoidsjf iosdjfasdpifjdsa+fj asdfjsa</p><p>dfj ds</p><p>f jasd</p><p>fjdsfaijdsifjsdof ijasdoifjdsiofjasd</p><p>fjas</p><p>fjsdfjspdifjaspdifjsadipfjsdap</p><p>fjas</p><p>dfjasidjfpisjfids</p>', '2019-10-04 22:21:43', '2019-10-04 22:21:43', 0, 'asdfsafsd', 'Acá tenemos la foto de perifl de un chabón muy f...', NULL, 37, '600b281d91954b72ed4478466b075d3e'),
(46, 1, '<p><img src=\"http://127.0.0.1:8000/images/15702169157f69166d648bee181d7f86d7d0be169a.png\" style=\"width: 25%;\"><br></p>', '2019-10-04 22:22:20', '2019-10-04 22:22:20', 0, 'asdfsdafasdf', '', NULL, 37, '7f69166d648bee181d7f86d7d0be169a'),
(47, 1, '<p><img src=\"http://127.0.0.1:8000/images/1570217168e9279cfa05b8f78aba6cfaa6cdaf1202.png\">a<br></p>', '2019-10-04 22:26:20', '2019-10-04 22:26:20', 0, 'asdasd', 'a', NULL, 37, 'e9279cfa05b8f78aba6cfaa6cdaf1202'),
(48, 1, '<p><img src=\"http://127.0.0.1:8000/images/1570218193deec94a129f8dd48a63920f01040b3da.png\" style=\"width: 50%;\"></p><p>Después de que ayer fracasara una reunión de siete horas entre los sindicatos de pilotos de Aerolíneas Argentinas y Austral y representantes de las empresas y del Gobierno, las partes volverán a verse las caras esta tarde para volver a intentar destrabar el conflicto salarial. Los representantes de la Asociación de Pilotos de Líneas Aéreas (APLA) y la Unión de Aviadores de Líneas Aéreas <u>(UALA)</u>&nbsp;serán recibidos a las 18 por enviados del Gobierno para ver si encuentran una solución al problema que derivó en un anuncio de paro de 48 horas para este fin de semana.</p><p><span style=\"font-size: 0.9rem;\">Después de que ayer fracasara una reunión de siete horas entre los sindicatos de pilotos de Aerolíneas Argentinas y Austral y representantes de las empresas y del Gobierno, las partes volverán a verse las caras esta tarde para volver a intentar destrabar el conflicto salarial. Los representantes de la Asociación de Pilotos de Líneas Aéreas (APLA) y la Unión de Aviadores de Líneas Aéreas (UALA) serán recibidos a las 18 por enviados del Gobierno para ver si encuentran una solución al problema que derivó en un anuncio de paro de 48 horas para este fin de semana.<br></span><br><img src=\"http://127.0.0.1:8000/images/1570218258deec94a129f8dd48a63920f01040b3da.png\" style=\"width: 50%;\"></p><p>Mientras se realizaba ese encuentro que finalmente sería poco fructífero, el presidente <span style=\"background-color: rgb(255, 255, 0);\">Mauricio Macri </span>aseguró que el paro convocado por pilotos de Aerolíneas Argentinas y Austral “es político, la lógica del kirchnerismo”, y consideró que “nunca” vio a “un gremio que se oponga a que lleguen más empresas para tomar más empleados”. </p><p><span style=\"font-size: 0.9rem;\"><b>“Estos gremios han hecho una batalla en contra de la revolución de los aviones que hemos hecho”</b>, aseguró el mandatario en referencia a la iniciativa de las low cost, incluida la modernización de los distintos aeropuertos del país, según explicó.</span><br></p>', '2019-10-04 22:45:07', '2019-10-04 22:45:07', 0, 'Antes de una reunión clave para destrabar el conflicto con los pilotos, Macri dijo que el paro del fin de semana es “político”', 'Después de que ayer fracasara una reunión de sie...', NULL, 37, 'deec94a129f8dd48a63920f01040b3da'),
(49, 1, '<p><img src=\"http://127.0.0.1:8000/images/15702184941f8c204462661faa95bbbbb9e88f1061.png\" style=\"width: 100%;\"></p><p>Acá vemos una landing page normal.&nbsp;Mientras se realizaba ese encuentro que finalmente sería poco fructífero, el presidente Mauricio Macri aseguró que el paro convocado por pilotos de Aerolíneas Argentinas y Austral “es político, la lógica del kirchnerismo”, y consideró que “nunca” vio a “un gremio que se oponga a que lleguen más empresas para tomar más empleados”. “Estos gremios han hecho una batalla en contra de la revolución de los aviones que hemos hecho”, aseguró el mandatario en referencia a la iniciativa de las low cost, incluida la modernización de los distintos aeropuertos del país, según explicó.</p><p><img src=\"http://127.0.0.1:8000/images/15702185561f8c204462661faa95bbbbb9e88f1061.jpg\" style=\"width: 100%;\"><br></p>', '2019-10-04 22:49:20', '2019-10-04 22:49:20', 0, 'Diseño web', 'Acá vemos una landing page normal.&nbsp;Mientras ...', NULL, 37, '1f8c204462661faa95bbbbb9e88f1061'),
(50, 1, '<p><img src=\"http://127.0.0.1:8000/images/15702185818321cf71db916a319607d1ff516e8be1.jpg\"><br></p>', '2019-10-04 22:49:44', '2019-10-04 22:49:44', 0, 'asda', '', NULL, 37, '8321cf71db916a319607d1ff516e8be1'),
(51, 1, '<p><img src=\"http://127.0.0.1:8000/images/15702186115a9dcf7670ead12af46349e7bc7f3a47.jpeg\" style=\"width: 100%;\"><br></p>', '2019-10-04 22:50:23', '2019-10-04 22:50:23', 0, 'asda', '', NULL, 37, '5a9dcf7670ead12af46349e7bc7f3a47'),
(52, 1, '<p><img src=\"http://127.0.0.1:8000/images/1570218820c33566e74e74f203fd40211db0669f79.jpg\" style=\"width: 100%\"><br></p>', '2019-10-04 22:53:44', '2019-10-04 22:53:44', 0, 'sdafsd', '', NULL, 37, 'c33566e74e74f203fd40211db0669f79'),
(53, 1, '<p>@alvin #alvin <br>asdasdas</p><p><br></p>', '2019-10-05 00:05:47', '2019-10-05 00:05:47', 0, 'aa', '@alvin #alvin asdasdas', NULL, 37, 'd1e21c3868406c29e429c57d44b05605');

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
(1, 'Joaquin Di Toma', 'joacoditoma@gmail.com', NULL, '$2y$10$HNYhXjupjI0OG3nIrJ/mH.Fim.fTKoBqMdiLFYA9brJBXU/cU.m1S', 'uQrpDuGCfHQk7FQSynA1Zhd4QZFWDoU5XqPbl75akZMmd0NcfLRtT9QuZil0', '2019-09-19 03:11:01', '2019-09-24 06:02:40');

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
(1, 38, '2019-10-04 20:06:18', '2019-10-04 20:06:18', 368);

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
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `klasses`
--
ALTER TABLE `klasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `klass_user`
--
ALTER TABLE `klass_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_post_love`
--
ALTER TABLE `user_post_love`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;
COMMIT;
