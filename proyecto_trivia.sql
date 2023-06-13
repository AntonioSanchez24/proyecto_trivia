-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2023 a las 03:01:19
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_trivia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `friend_id` bigint(20) UNSIGNED NOT NULL,
  `estado` enum('pendiente','aceptado','rechazado') NOT NULL DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id`, `user_id`, `friend_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'rechazado', '2023-06-12 16:37:09', '2023-06-12 17:09:29'),
(2, 2, 2, 'rechazado', '2023-06-12 16:37:12', '2023-06-12 17:09:29'),
(3, 2, 2, 'rechazado', '2023-06-12 16:38:33', '2023-06-12 17:09:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `puntuacion` int(30) NOT NULL,
  `dificultad` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `user_id`, `tiempo`, `puntuacion`, `dificultad`, `created_at`, `updated_at`) VALUES
(1, 2, 18, 501, 2, '2023-05-28 00:11:27', '2023-05-28 00:11:27'),
(2, 2, 15, 501, 2, '2023-05-28 00:21:51', '2023-05-28 00:21:51'),
(3, 2, 79, 501, 3, '2023-05-28 00:24:21', '2023-05-28 00:24:21'),
(4, 2, 13, 1000000, 2, '2023-05-28 00:46:01', '2023-05-28 00:46:01'),
(5, 2, 25, 1000001, 2, '2023-06-01 10:46:49', '2023-06-01 10:46:49'),
(6, 2, 40, 1946035, 2, '2023-06-01 10:50:09', '2023-06-01 10:50:09'),
(7, 2, 36, 1946036, 2, '2023-06-10 14:23:28', '2023-06-10 14:23:28'),
(8, 2, 36, 1946036, 2, '2023-06-11 15:35:40', '2023-06-11 15:35:40'),
(9, 2, 32, 1946021, 2, '2023-06-11 16:08:14', '2023-06-11 16:08:14'),
(10, 2, 18, 1946018, 2, '2023-06-11 16:20:45', '2023-06-11 16:20:45'),
(11, 2, 14, 1946014, 2, '2023-06-11 16:24:48', '2023-06-11 16:24:48'),
(12, 2, 38, 1946024, 2, '2023-06-11 16:26:53', '2023-06-11 16:26:53'),
(13, 2, -35, 1945965, 2, '2023-06-11 16:30:31', '2023-06-11 16:30:31'),
(14, 2, 12, 1946012, 2, '2023-06-11 16:32:05', '2023-06-11 16:32:05'),
(15, 2, 12, 1946012, 2, '2023-06-11 16:32:10', '2023-06-11 16:32:10'),
(16, 2, 17, 1946017, 2, '2023-06-11 16:40:34', '2023-06-11 16:40:34'),
(17, 2, 17, 1946017, 2, '2023-06-11 16:41:02', '2023-06-11 16:41:02'),
(18, 2, 19, 1946019, 2, '2023-06-11 16:42:10', '2023-06-11 16:42:10'),
(19, 2, 19, 1946019, 2, '2023-06-11 16:42:45', '2023-06-11 16:42:45'),
(20, 2, 29, 1946029, 2, '2023-06-11 16:46:12', '2023-06-11 16:46:12'),
(21, 2, 24, 1946024, 2, '2023-06-11 17:11:22', '2023-06-11 17:11:22'),
(22, 2, 0, 0, 2, '2023-06-11 18:19:57', '2023-06-11 18:19:57'),
(23, 2, 2, 252, 2, '2023-06-11 18:20:25', '2023-06-11 18:20:25'),
(24, 2, 3, 253, 2, '2023-06-11 18:21:32', '2023-06-11 18:21:32'),
(25, 2, 0, 0, 2, '2023-06-11 19:00:36', '2023-06-11 19:00:36'),
(26, 2, 1, 251, 2, '2023-06-11 19:02:35', '2023-06-11 19:02:35'),
(27, 2, 0, 0, 2, '2023-06-11 19:03:09', '2023-06-11 19:03:09'),
(28, 2, 0, 0, 2, '2023-06-11 19:23:55', '2023-06-11 19:23:55'),
(29, 2, 1, 251, 2, '2023-06-11 19:24:08', '2023-06-11 19:24:08'),
(30, 2, 0, 0, 2, '2023-06-11 19:31:29', '2023-06-11 19:31:29'),
(31, 2, 0, 0, 2, '2023-06-11 19:33:42', '2023-06-11 19:33:42'),
(32, 2, 0, 0, 2, '2023-06-11 19:35:04', '2023-06-11 19:35:04'),
(33, 2, 0, 0, 2, '2023-06-11 19:35:26', '2023-06-11 19:35:26'),
(34, 2, 0, 0, 2, '2023-06-11 19:35:47', '2023-06-11 19:35:47'),
(35, 2, 0, 0, 2, '2023-06-11 19:36:24', '2023-06-11 19:36:24'),
(36, 2, 1, 251, 2, '2023-06-11 19:46:02', '2023-06-11 19:46:02'),
(37, 2, 1, 251, 2, '2023-06-12 03:28:38', '2023-06-12 03:28:38'),
(38, 2, 0, 0, 2, '2023-06-12 05:26:29', '2023-06-12 05:26:29'),
(39, 2, 1, 251, 2, '2023-06-12 09:05:27', '2023-06-12 09:05:27'),
(40, 2, 15, 1946015, 2, '2023-06-12 09:09:29', '2023-06-12 09:09:29'),
(41, 2, 1, 251, 2, '2023-06-12 09:11:13', '2023-06-12 09:11:13'),
(42, 2, 15, 1946015, 2, '2023-06-12 09:12:35', '2023-06-12 09:12:35'),
(43, 2, 12, 1946012, 2, '2023-06-12 09:15:30', '2023-06-12 09:15:30'),
(44, 2, 14, 1946014, 2, '2023-06-12 09:17:58', '2023-06-12 09:17:58'),
(45, 2, 1, 251, 2, '2023-06-12 09:18:45', '2023-06-12 09:18:45'),
(46, 2, 3, 253, 2, '2023-06-12 13:18:46', '2023-06-12 13:18:46'),
(47, 2, 0, 0, 2, '2023-06-12 13:19:51', '2023-06-12 13:19:51'),
(48, 2, 0, 0, 2, '2023-06-12 13:32:20', '2023-06-12 13:32:20'),
(49, 2, 18, 1946018, 2, '2023-06-12 19:00:37', '2023-06-12 19:00:37'),
(50, 2, 34, 1946034, 2, '2023-06-12 19:07:47', '2023-06-12 19:07:47'),
(51, 2, 0, 0, 2, '2023-06-12 19:11:22', '2023-06-12 19:11:22'),
(52, 2, 0, 0, 2, '2023-06-12 19:14:17', '2023-06-12 19:14:17'),
(53, 2, 1, 251, 2, '2023-06-12 19:19:40', '2023-06-12 19:19:40'),
(54, 2, 35, 1946035, 2, '2023-06-12 19:44:02', '2023-06-12 19:44:02'),
(55, 2, 0, 0, 2, '2023-06-12 19:44:33', '2023-06-12 19:44:33'),
(56, 2, 0, 250, 2, '2023-06-12 19:45:21', '2023-06-12 19:45:21'),
(57, 2, 0, 0, 2, '2023-06-12 19:45:55', '2023-06-12 19:45:55'),
(58, 2, 0, 0, 2, '2023-06-12 19:48:51', '2023-06-12 19:48:51'),
(59, 2, 0, 0, 2, '2023-06-12 19:49:17', '2023-06-12 19:49:17'),
(60, 2, 0, 0, 2, '2023-06-12 19:50:22', '2023-06-12 19:50:22'),
(61, 2, 0, 0, 2, '2023-06-12 19:51:47', '2023-06-12 19:51:47'),
(62, 2, 0, 0, 2, '2023-06-12 19:53:16', '2023-06-12 19:53:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_custom`
--

CREATE TABLE `calificaciones_custom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `paquete_preguntas_id` int(11) NOT NULL,
  `tiempo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `puntuacion` int(11) NOT NULL,
  `dificultad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_23_213037_create_sessions_table', 1),
(7, '2023_05_04_193738_create_pregunta_original_table', 2),
(8, '2023_05_04_193754_create_peticion_amistad_table', 2),
(9, '2023_05_04_193806_create_calificaciones_table', 2),
(10, '2023_05_04_193817_create_pregunta_custom_table', 2),
(11, '2023_05_04_193826_create_paquete_preguntas_table', 2),
(12, '2023_05_04_193838_create_calificaciones_custom_table', 2),
(13, '2023_05_04_193914_edit_users_table', 2),
(14, '2023_06_04_152515_update_users_table', 3),
(15, '2023_06_06_112228_update_paquete_preguntas_table', 4),
(16, '2023_06_06_112424_update_paquete_preguntas_table', 5),
(17, '2023_06_09_095605_edit_pregunta_custom_table', 6),
(18, '2023_06_12_172401_create_amigos_table', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete_preguntas`
--

CREATE TABLE `paquete_preguntas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paquete_preguntas`
--

INSERT INTO `paquete_preguntas` (`id`, `nombre`, `categoria`, `created_at`, `updated_at`, `description`, `photo_url`, `user_id`) VALUES
(4, 'a', 'categoria1', '2023-06-09 08:01:55', '2023-06-09 08:01:55', 'a', 'http://127.0.0.1:8000/storage/photos/jsbRyyLQVJRSckPVGPOOaAAiD3zCM5ElDPJoPybc.jpg', 2),
(5, 'a', 'categoria2', '2023-06-09 09:01:55', '2023-06-09 09:01:55', 'delux', 'http://127.0.0.1:8000/storage/photos/I5N6uaVUGt0d7RHry278WzwPR8oWpQGhAtiSZpMt.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticion_amistad`
--

CREATE TABLE `peticion_amistad` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `user_1_acepta` tinyint(1) NOT NULL,
  `user_2_acepta` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `peticion_amistad`
--

INSERT INTO `peticion_amistad` (`id`, `user_id_1`, `user_id_2`, `user_1_acepta`, `user_2_acepta`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, 0, '2023-06-12 05:48:24', '2023-06-12 05:48:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_custom`
--

CREATE TABLE `pregunta_custom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paquete_pregunta` int(11) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `dificultad` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `respuestas_incorrectas` varchar(255) NOT NULL,
  `respuesta_correcta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pregunta_custom`
--

INSERT INTO `pregunta_custom` (`id`, `paquete_pregunta`, `pregunta`, `dificultad`, `categoria`, `created_at`, `updated_at`, `respuestas_incorrectas`, `respuesta_correcta`) VALUES
(1, 4, 'a', 1, 'a', '2023-06-09 08:01:56', '2023-06-09 08:01:56', '[\"a\",\"a\",\"a\"]', 'a'),
(2, 4, 'E', 1, 'E', '2023-06-09 08:01:56', '2023-06-09 08:01:56', '[\"E\",\"E\",\"E\"]', 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_original`
--

CREATE TABLE `pregunta_original` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `respuestas_incorrectas` varchar(255) NOT NULL,
  `dificultad` int(11) NOT NULL,
  `respuesta_correcta` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pregunta_original`
--

INSERT INTO `pregunta_original` (`id`, `pregunta`, `respuestas_incorrectas`, `dificultad`, `respuesta_correcta`, `categoria`, `created_at`, `updated_at`) VALUES
(1, '¿En qué año fue descubierta América, por Cristobal Colón?', '[\"1942\",\"1294\",\"1429\"]', 1, '1492', 'Historia', '2023-05-19 08:38:54', '2023-05-19 08:38:54'),
(2, '¿Quién fue el ganador del Oscar al mejor actor en 2013?', '[\"Leonardo DiCaprio\",\"Denzel Washington\",\"Bradley Cooper\"]', 1, 'Daniel Day-Lewis', 'Entretenimiento', '2023-05-19 08:44:25', '2023-05-19 08:44:25'),
(3, '¿Cuantos metros son una milla?', '[\"1942\",\"1200,23\",\"1429\"]', 2, '1609,34', 'Ciencia', '2023-05-19 08:53:26', '2023-05-19 08:53:26'),
(4, '¿Cual es el nombre del padre de la familia protagonista en \"Los Simpson\"?', '[\"Peter\",\"Bob\",\"Cleveland\"]', 1, 'Homer', 'Entretenimiento', '2023-05-19 08:54:37', '2023-05-19 08:54:37'),
(5, '¿Por qué proceso se desgasta una roca a causa del clima?', '[\"Sublimaci\\u00f3n\",\"Vegetaci\\u00f3n\",\"Catalizaci\\u00f3n\"]', 1, 'Erosión', 'Naturaleza', '2023-05-19 09:26:19', '2023-05-19 09:26:19'),
(6, '¿Qué marca de ropa tiene 3 líneas como identidad principal de su logo?', '[\"Nike\",\"Puma\",\"Reebok\"]', 1, 'Adidas', 'Cultura general', '2023-05-19 09:28:20', '2023-05-19 09:28:20'),
(7, '¿Qué ciudad es la capital de Suiza?', '[\"Viena\",\"Ginebra\",\"Zurich\"]', 1, 'Berna', 'Geografía', '2023-05-19 09:31:08', '2023-05-19 09:31:08'),
(8, '¿Cuál fue la primera película del Universo Cinematográfico de Marvel?', '[\"Spider-Man (2002)\",\"Vengadores (2012)\",\"Capit\\u00e1n Am\\u00e9rica (2011)\"]', 2, 'Iron Man (2008)', 'Entretenimiento', '2023-05-19 09:32:11', '2023-05-19 09:32:11'),
(9, '¿Quién es el protagonista de Dragon Ball?', '[\"Luffy\",\"Krillin\",\"Gohan\"]', 1, 'Goku', 'Entretenimiento', '2023-05-19 09:33:11', '2023-05-19 09:33:11'),
(10, '¿Cuál es el peso medio de un cerebro adulto?', '[\"0.7kg\",\"1.3kg\",\"2kg\"]', 2, '1.4kg', 'Ciencia', '2023-05-19 09:35:08', '2023-05-19 09:35:08'),
(11, '¿De qué murió el compositor Chopin? ', '[\"De un ataque al coraz\\u00f3n\",\"De insuficiencia renal aguda\",\"De un c\\u00e1ncer estomacal\"]', 3, 'De tuberculosis', 'Cultura general', '2023-05-19 09:55:23', '2023-05-19 09:55:23'),
(12, 'En la tabla periódica de los elementos, ¿hay cuatro elementos diferentes cuyos nombres se basan en…?', '[\"La luna de Neptuno\",\"Gato mascota de Antoine Lavoisier\",\"Nombre de soltera de Marie Curie\"]', 3, 'Aldea minera sueca', 'Ciencia', '2023-05-19 09:56:44', '2023-05-19 09:56:44'),
(13, '¿Qué famosa estrella musical fue conocida como Baby Frances Gumm en la fase inicial de su carrera?', '[\"Ginger Rogers\",\"Deanna Durbin\",\"Doris Day\"]', 3, 'Judy Garland', 'Entretenimiento', '2023-05-19 09:57:43', '2023-05-19 09:57:43'),
(14, 'Cada componente cromático de la luz blanca en cuerpos transparentes se mueve a velocidad diferente. El color más rápido en ese sentido es el…', '[\"Naranja\",\"Amarillo\",\"P\\u00farpura\"]', 3, 'Rojo', 'Ciencia', '2023-05-19 09:58:17', '2023-05-19 09:58:17'),
(15, '¿Qué santo fundó la Abadía de Montecasino?', '[\"Bernardo\",\"Buenaventura\",\"Bonifacio\"]', 3, 'Benedicto', 'Historia', '2023-05-19 09:58:54', '2023-05-19 09:58:54'),
(16, 'El mercader veneciano Marco Polo fue oficial en la corte de…', '[\"Kumiai Khan\",\"Tameriano el magn\\u00edfico\",\"Saladino\"]', 3, 'Iván el Terrible', 'Historia', '2023-05-19 10:00:35', '2023-05-19 10:00:35'),
(17, '¿A qué grupo pertenece la canción \"Lithium\"?', '[\"System of a Down\",\"Blur\",\"Korn\"]', 2, 'Nirvana', 'Entretenimiento', '2023-05-22 05:42:17', '2023-05-22 05:42:17'),
(18, '¿Qué procesador tiene el iPad Air de 5ª genración?', '[\"B8\",\"A18\",\"I7\"]', 3, 'M1', 'Ciencia', '2023-05-22 06:12:29', '2023-05-22 06:12:29'),
(19, '¿Cual es el nombre del protagonista del videojuego \"The Legend of Zelda\"?', '[\"Zelda\",\"Jacinto\",\"Mario\"]', 1, 'Link', 'Entretenimiento', '2023-06-11 10:08:40', '2023-06-11 10:08:40'),
(20, '¿Cuantos años son un lustro?', '[\"50\",\"15\",\"10\"]', 1, '5', 'Cultura general', '2023-06-11 10:09:19', '2023-06-11 10:09:19'),
(21, '¿A quién se le atribuye la frase \"Pienso, luego existo?', '[\"Plat\\u00f3n\",\"Galileo Galilei\",\"S\\u00f3crates\"]', 2, 'Descartes', 'Cultura general', '2023-06-11 10:11:25', '2023-06-11 10:11:25'),
(22, '¿Cuántos tristes tigres comen trigo en un trigal?', '[\"Treinta y tres\",\"Trece\",\"Veintitr\\u00e9s\"]', 1, 'Tres', 'Cultura general', '2023-06-11 10:12:39', '2023-06-11 10:12:39'),
(23, '¿Cuántos días tiene un año bisiesto?', '[\"364\",\"354\",\"356\"]', 1, '366', 'Cultura general', '2023-06-11 10:13:21', '2023-06-11 10:13:21'),
(24, '¿Qué día se añade al calendario en años bisiestos?', '[\"31 de septiembre\",\"28 de febrero\",\"28 de abril\"]', 1, '29 de febrero', 'Cultura general', '2023-06-11 10:14:05', '2023-06-11 10:14:05'),
(25, '¿Cuál de estas ciudades está en Alemania?', '[\"San Petesburgo\",\"Viena\",\"Bruselas\"]', 1, 'Colonia', 'Geografía', '2023-06-11 10:18:17', '2023-06-11 10:18:17'),
(26, '¿Cual de estos países no pertenece a la Unión Europea? ', '[\"Chequia\",\"Bulgaria\",\"Ruman\\u00eda\"]', 2, 'Bielorrusia', 'Geografía', '2023-06-11 15:24:31', '2023-06-11 15:24:31'),
(27, '¿A quién pertenece el papel del Duende Verde en Spider-Man (2002)? ', '[\"Matt Damon\",\"Will Smith\",\"Clint Eastwood\"]', 2, 'Willem Dafoe', 'Geografía', '2023-06-11 15:27:29', '2023-06-11 15:27:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hNRt3hRmRtKwufrCYJZU6LfqyBEgnJaHJHuynwy1', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMmRkN29zMElHbmpobEZwQlJyQkt4SWJSR3MyakZ1bkUzaGN1aGNLViI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRnbnpTd1pKSWp2RG5FRDYudExvR0JlZXpBOHpiMHN0dW5Cck0xOFdpZFRMaFJjamtKcFFGYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1686607338);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amigos` varchar(255) DEFAULT NULL,
  `suscripciones` varchar(255) DEFAULT NULL,
  `rol` varchar(25) DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `amigos`, `suscripciones`, `rol`, `description`) VALUES
(2, 'TriviaMaster24', 'pakito@grillao.com', NULL, '$2y$10$gnzSwZJIjvDnED6.tLoGBeezA8zb0stunBrM18WidTLhRcjkJpQFa', NULL, NULL, NULL, 'KMxodXkga38CsQygvj9PEW7epw02FqD4SKHZKnHGBJ4b5QXd0dXX8bs737bL', NULL, 'profile-photos/AyhScsbkMRsdZoFto8OSgW26SJBjGPPnRBHXuqLe.png', '2023-05-04 17:35:13', '2023-06-11 23:49:44', '', '[4,5]', 'admin', 'Efectivamente, esta es mi descripción.'),
(3, 'Pedrín', 'pedrin@pedron.com', NULL, '$2y$10$bQDn.VXf.c6y.j3FjAKT/eHCRUiJ4Q8ANMKyR1BoTzmZ8NbLHvWK6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-22 12:04:41', '2023-05-22 12:04:41', NULL, NULL, NULL, ''),
(4, 'queSobo', 'esta@esta.es', NULL, '$2y$10$GUz6kdCkyHzKqsTC4GcOx.KrLHBVDhaIg2RTMe5o4y6O7VYr5ebFS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-22 12:53:53', '2023-05-22 12:53:53', NULL, NULL, NULL, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amigos_user_id_foreign` (`user_id`),
  ADD KEY `amigos_friend_id_foreign` (`friend_id`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calificaciones_custom`
--
ALTER TABLE `calificaciones_custom`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paquete_preguntas`
--
ALTER TABLE `paquete_preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `peticion_amistad`
--
ALTER TABLE `peticion_amistad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pregunta_custom`
--
ALTER TABLE `pregunta_custom`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pregunta_original`
--
ALTER TABLE `pregunta_original`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `calificaciones_custom`
--
ALTER TABLE `calificaciones_custom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `paquete_preguntas`
--
ALTER TABLE `paquete_preguntas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `peticion_amistad`
--
ALTER TABLE `peticion_amistad`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pregunta_custom`
--
ALTER TABLE `pregunta_custom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pregunta_original`
--
ALTER TABLE `pregunta_original`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_friend_id_foreign` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `amigos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
