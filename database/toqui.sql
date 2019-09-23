-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-09-2019 a las 22:54:38
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `toqui`
--

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
  `short_text` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `userId`, `text`, `created_at`, `updated_at`, `love`, `title`, `short_text`) VALUES
(6, 1, '<p>Efectivos de la Infantería de la Policía bonaerense impidieron este viernes que sindicalistas de la UOCRA que responden a Brian Medina, un familiar del sindicalista detenido Juan Pablo \"Pata\" Media, tomaran una destilería de YPF ubicada en Ensenada.</p><p>Al igual que el jueves, los gremialistas llegaron de madrugada hasta la Puerta 4 e iniciaron la presión para ingresar por la fuerza a una parte del predio administrada por AESA, una constructora que se encuentra en conflicto con trabajadores que fueron despedidos.</p><p>Los sindicalistas se enfrentaron con los efectivos policiales que habían montado un operativo especial. Arrojaron piedras, bulones con gomeras y bombas de estruendo. Los oficiales respondieron con gases lacrimógenos y balas de goma.</p><p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/dAi_c63FTiA\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><br></p><p>Efectivos de la Infantería de la Policía bonaerense impidieron este viernes que sindicalistas de la UOCRA que responden a Brian Medina, un familiar del sindicalista detenido Juan Pablo \"Pata\" Media, tomaran una destilería de YPF ubicada en Ensenada.</p><p>Al igual que el jueves, los gremialistas llegaron de madrugada hasta la Puerta 4 e iniciaron la presión para ingresar por la fuerza a una parte del predio administrada por AESA, una constructora que se encuentra en conflicto con trabajadores que fueron despedidos.</p><p>Los sindicalistas se enfrentaron con los efectivos policiales que habían montado un operativo especial. Arrojaron piedras, bulones con gomeras y bombas de estruendo. Los oficiales respondieron con gases lacrimógenos y balas de goma.</p>', '2019-09-20 18:34:41', '2019-09-20 21:34:41', 0, 'Nuevos incidentes con gremialistas de la UOCRA en la destilería de YPF en Ensenada: piedras, corridas y gases lacrimógenos', 'Efectivos de la Infantería de la Policía bonaere...'),
(7, 1, '<p>sdf</p>', '2019-09-20 18:35:47', '2019-09-20 21:35:47', 0, 'ad', 'sdf'),
(8, 1, '<p>a</p><table class=\"table table-bordered\"><tbody><tr><td>asfsfs</td><td>fsfsdf</td><td>sdfsdfsfsd</td><td>fsdfd</td><td>sdfdsfs</td></tr><tr><td>fsdfsdf</td><td>f</td><td>sdfsdf</td><td>sfs</td><td>sdfsdf</td></tr><tr><td>dfsd</td><td>dsfsdfs</td><td>sdf</td><td>fsfsdf</td><td>fdsf</td></tr></tbody></table><p><br></p>', '2019-09-20 18:34:37', '2019-09-20 21:34:37', 0, 'asdasd', 'aasfsfsfsfsdfsdfsdfsfsdfsdfdsdfdsfsfsdfsdffsdfsdfs...');

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
(1, 'Joaquin Di Toma', 'joacoditoma@gmail.com', NULL, '$2y$10$AOyUGgfJlFYHv5SaLk7A6./b6q0DbqpDjLj4MrNHpxWgWoinvK0Em', 'RNZT8N7uT9utMhYhcZ25vIIKomkMdkoUIFTfRJ5SLSIqzuZnYEJgqLcuy9Pa', '2019-09-19 03:11:01', '2019-09-19 03:11:01');

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
(1, 1, '2019-09-20 05:31:02', '2019-09-20 05:31:02', 34),
(1, 2, '2019-09-20 14:38:02', '2019-09-20 14:38:02', 35);

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_post_love`
--
ALTER TABLE `user_post_love`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
