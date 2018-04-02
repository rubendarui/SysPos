SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `eliminado` tinyint(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `almacen` (`id`, `nombre`, `eliminado`) VALUES
(1, 'Bodega', 0),
(2, 'Central', 0);

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `imge` varchar(50) NOT NULL DEFAULT '#',
  `eliminado` tinyint(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categoria` (`id`, `nombre`, `imge`, `eliminado`) VALUES
(1, 'Bodegas', '#', 1),
(2, 'Pepsi', '#', 1),
(3, 'Energizante', '#', 0),
(4, 'Alcohol', '#', 0),
(5, 'Tropicales', '#', 0);

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `modulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `eliminado` tinyint(3) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `modulo` (`id`, `nombre`, `eliminado`, `created_at`, `updated_at`) VALUES
(1, 'Configuraciones', 0, '2018-04-01 08:24:17', '2018-04-01 12:16:03'),
(2, 'Cuestionario', 1, '2018-04-01 20:28:55', '2018-04-02 00:28:55'),
(3, 'Pagos', 1, '2018-04-01 20:28:58', '2018-04-02 00:28:58'),
(4, 'Soportes', 1, '2018-04-01 20:29:02', '2018-04-02 00:29:02'),
(5, 'Reportes', 1, '2018-04-01 20:29:18', '2018-04-02 00:29:18'),
(6, 'pruebas', 1, '2018-04-01 20:29:15', '2018-04-02 00:29:15'),
(7, 'Soy el que tenia error', 1, '2018-04-01 20:29:12', '2018-04-02 00:29:12'),
(8, 'soy nuevo', 1, '2018-04-01 20:29:05', '2018-04-02 00:29:05'),
(9, 'Nuevo', 1, '2018-04-01 20:29:09', '2018-04-02 00:29:09'),
(10, 'Compras', 0, '2018-04-02 00:29:27', '2018-04-02 00:29:27'),
(11, 'Ventas', 0, '2018-04-02 00:29:33', '2018-04-02 00:29:33'),
(12, 'Inventario', 0, '2018-04-02 00:29:40', '2018-04-02 00:29:40');

CREATE TABLE `objeto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `url` varchar(25) NOT NULL,
  `tipoobjeto` varchar(15) NOT NULL,
  `visibleconelmenu` tinyint(2) NOT NULL,
  `idmodulo` int(11) NOT NULL,
  `eliminar` tinyint(3) NOT NULL DEFAULT '0',
  `habilitado` tinyint(2) NOT NULL,
  `padre` tinyint(2) NOT NULL,
  `font` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `objeto` (`id`, `nombre`, `url`, `tipoobjeto`, `visibleconelmenu`, `idmodulo`, `eliminar`, `habilitado`, `padre`, `font`, `created_at`, `updated_at`) VALUES
(1, 'Configuraciones', 'config', 'Titulo', 1, 1, 0, 1, 0, 'loader_gear', '2018-04-01 20:17:54', '2018-04-02 00:17:54'),
(24, 'Modulo', '/Modulos', 'Formulario', 0, 1, 0, 0, 1, '', '2018-04-01 21:13:58', '2018-04-01 04:00:00'),
(25, 'Objeto', '/Objetos', 'Formulario', 0, 1, 0, 1, 1, '', '2018-04-01 21:14:09', '2018-04-02 01:12:35'),
(27, 'Compras', '#', 'Titulo', 0, 10, 0, 0, 0, 'shopping_bag-16', '2018-04-01 21:28:32', '2018-04-02 01:28:32'),
(28, 'Txn Compras', '/compras', 'Formulario', 0, 10, 0, 0, 27, '', '2018-04-01 21:32:00', '2018-04-02 01:32:00'),
(29, 'Inventario', '#', 'Titulo', 0, 12, 0, 0, 0, 'education_paper', '2018-04-02 01:21:52', NULL),
(30, 'Ventas', '#', 'Titulo', 0, 11, 0, 0, 0, 'business_money-coins', '2018-04-02 01:27:58', NULL),
(31, 'Add Producto', '/Prodcutos', 'Formulario', 0, 12, 0, 0, 29, '', '2018-04-02 01:29:32', NULL),
(32, 'Add Lote', '/Lotes', 'Formulario', 0, 12, 0, 0, 29, '', '2018-04-02 01:30:00', NULL),
(33, 'Add Categoria', '/Categorias', 'Formulario', 0, 12, 0, 0, 29, '', '2018-04-02 01:30:33', NULL),
(34, 'Add Almacen', '/Almacenes', 'Formulario', 0, 12, 0, 0, 29, '', '2018-04-02 01:33:11', NULL),
(35, 'Txn Venta', '/Ventas', 'Formulario', 0, 11, 0, 0, 30, '', '2018-04-02 01:33:49', NULL),
(36, 'Add Promociones', '/Promociones', 'Formulario', 0, 11, 0, 0, 30, '', '2018-04-02 01:34:35', NULL);

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `eliminado` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `perfil` (`id`, `nombre`, `eliminado`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdministrador', 0, '2017-08-29 00:58:56', '0000-00-00 00:00:00'),
(2, 'Ventas', 0, '2017-08-28 23:11:04', '0000-00-00 00:00:00'),
(3, 'Compras', 0, '2017-08-28 23:11:04', '0000-00-00 00:00:00');

CREATE TABLE `perfilobjeto` (
  `id` int(11) NOT NULL,
  `idperfil` int(11) NOT NULL,
  `idobjeto` int(11) NOT NULL,
  `eliminar` tinyint(2) NOT NULL,
  `actualizar` tinyint(2) NOT NULL,
  `reporte` tinyint(2) NOT NULL,
  `imprimir` tinyint(2) NOT NULL,
  `listar` tinyint(2) NOT NULL,
  `guardar` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `perfilobjeto` (`id`, `idperfil`, `idobjeto`, `eliminar`, `actualizar`, `reporte`, `imprimir`, `listar`, `guardar`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, 0, 0, 0, 0, 0, '2017-08-31 19:10:04', '0000-00-00 00:00:00'),
(2, 1, 3, 1, 1, 1, 1, 1, 1, '2017-08-21 03:35:35', '0000-00-00 00:00:00'),
(3, 1, 4, 1, 1, 1, 1, 1, 1, '2017-08-21 03:35:35', '0000-00-00 00:00:00'),
(4, 1, 1, 0, 0, 1, 1, 1, 1, '2017-08-31 19:11:45', '0000-00-00 00:00:00'),
(5, 1, 5, 1, 1, 1, 1, 1, 1, '2017-08-21 03:35:35', '0000-00-00 00:00:00'),
(6, 2, 1, 1, 1, 1, 1, 1, 1, '2017-08-31 19:12:01', '0000-00-00 00:00:00'),
(7, 1, 9, 0, 1, 1, 1, 1, 1, '2017-08-31 19:10:22', '0000-00-00 00:00:00'),
(8, 1, 8, 1, 1, 1, 1, 1, 1, '2017-08-31 18:46:20', '0000-00-00 00:00:00');

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precioventa` int(11) NOT NULL,
  `preciointerno` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `imgen` varchar(30) NOT NULL,
  `tipoproducto` varchar(30) NOT NULL,
  `stockmin` int(11) NOT NULL DEFAULT '5',
  `ventadirecta` tinyint(2) NOT NULL DEFAULT '0',
  `eliminado` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `objeto`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `perfilobjeto`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriakay` (`categoria`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `modulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
ALTER TABLE `objeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `perfilobjeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `producto`
  ADD CONSTRAINT `categoriakay` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
