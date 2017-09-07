# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.01 (MySQL 5.5.5-10.1.21-MariaDB)
# Base de datos: proto
# Tiempo de Generación: 2017-09-07 05:06:37 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla arches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `arches`;

CREATE TABLE `arches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idserv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla categorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla clientes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` varchar(400) DEFAULT NULL,
  `detalles` varchar(400) DEFAULT NULL,
  `facturacion` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Volcado de tabla compras
# ------------------------------------------------------------

DROP TABLE IF EXISTS `compras`;

CREATE TABLE `compras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `compras` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `costo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comentarios` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `servicio_id` int(10) unsigned DEFAULT NULL,
  `mensajero_id` int(10) unsigned DEFAULT NULL,
  `proveedor_id` int(10) unsigned DEFAULT NULL,
  `direccionp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `compras_mensajero_id_foreign` (`mensajero_id`),
  KEY `compras_proveedor_id_foreign` (`proveedor_id`),
  KEY `compras_status_id_foreign` (`status_id`) USING BTREE,
  CONSTRAINT `compras_mensajero_id_foreign` FOREIGN KEY (`mensajero_id`) REFERENCES `users` (`id`),
  CONSTRAINT `compras_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedors` (`id`),
  CONSTRAINT `compras_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla detalle_venta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detalle_venta`;

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT,
  `idventa` varchar(45) DEFAULT NULL,
  `idarticulo` varchar(45) DEFAULT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `precio_pub` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddetalle_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `tr_updStockVenta` AFTER INSERT ON `detalle_venta` FOR EACH ROW BEGIN UPDATE productos SET cantidad = cantidad - NEW.cantidad WHERE productos.id = NEW.idarticulo; END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Volcado de tabla en_res
# ------------------------------------------------------------

DROP TABLE IF EXISTS `en_res`;

CREATE TABLE `en_res` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mensajero_id` int(10) unsigned DEFAULT NULL,
  `status_id` int(10) unsigned DEFAULT NULL,
  `servicio_id` int(10) unsigned DEFAULT NULL,
  `Detalle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `en_res_mensajero_id_foreign` (`mensajero_id`),
  KEY `en_res_status_id_foreign` (`status_id`),
  KEY `en_res_servicio_id_foreign` (`servicio_id`),
  CONSTRAINT `en_res_mensajero_id_foreign` FOREIGN KEY (`mensajero_id`) REFERENCES `users` (`id`),
  CONSTRAINT `en_res_servicio_id_foreign` FOREIGN KEY (`servicio_id`) REFERENCES `users` (`id`),
  CONSTRAINT `en_res_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla encuestas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `encuestas`;

CREATE TABLE `encuestas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `encuesta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla garantias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `garantias`;

CREATE TABLE `garantias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `garantia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla mensajes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mensajes`;

CREATE TABLE `mensajes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla notas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notas`;

CREATE TABLE `notas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nota` varchar(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `venta` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `abono1` varchar(255) DEFAULT NULL,
  `abono2` varchar(255) DEFAULT NULL,
  `abono3` varchar(255) DEFAULT NULL,
  `abono4` varchar(255) DEFAULT NULL,
  `abono5` varchar(255) DEFAULT NULL,
  `detalle` longtext,
  `entrega` datetime DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Volcado de tabla password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla perfils
# ------------------------------------------------------------

DROP TABLE IF EXISTS `perfils`;

CREATE TABLE `perfils` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla productos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `categoria_id` int(10) unsigned DEFAULT NULL,
  `proveedor_id` int(10) unsigned DEFAULT NULL,
  `preciop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  KEY `productos_proveedor_id_foreign` (`proveedor_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `productos_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla proveedors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `proveedors`;

CREATE TABLE `proveedors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla salidas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `salidas`;

CREATE TABLE `salidas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comentarios` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `producto_id` int(10) unsigned DEFAULT NULL,
  `servicio_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `salidas_producto_id_foreign` (`producto_id`),
  KEY `salidas_servicio_id_foreign` (`servicio_id`),
  CONSTRAINT `salidas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `salidas_servicio_id_foreign` FOREIGN KEY (`servicio_id`) REFERENCES `servs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla servs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `servs`;

CREATE TABLE `servs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombrecliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechaingreso` datetime NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `producto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imei` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contraseña` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `compañia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reparado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ingresoso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enciende` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `benciende` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bvolumen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bvibrador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pantalla` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `touch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ctrasera` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cfrontal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ccarga` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `altavoz` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `microfono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auricular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `boexterna` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jack` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wifi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bluetooth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datosm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bateria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `portasim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bhome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `touchid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sensorp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carcasa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teclado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `señal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `problemacliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solucion1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico1` longtext COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico2` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fechaentrega` datetime NOT NULL,
  `fechanotifica` datetime NOT NULL,
  `fechapago1` datetime NOT NULL,
  `fechapago2` datetime NOT NULL,
  `costo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `costoajustado` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `razon` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tipopago1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abono1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipopago2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abono2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `garantia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(10) unsigned DEFAULT NULL,
  `tecnico_id` int(10) unsigned DEFAULT NULL,
  `receptor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tipopago3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abono3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechapago3` datetime DEFAULT NULL,
  `tipopago4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abono4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechapago4` datetime DEFAULT NULL,
  `tipopago5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abono5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechapago5` datetime DEFAULT NULL,
  `comunicacion` longtext COLLATE utf8_unicode_ci,
  `bitacoracontacto` longtext COLLATE utf8_unicode_ci,
  `sucursal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `servs_status_id_foreign` (`status_id`),
  KEY `servs_tecnico_id_foreign` (`tecnico_id`),
  CONSTRAINT `servs_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `servs_tecnico_id_foreign` FOREIGN KEY (`tecnico_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla solicomps
# ------------------------------------------------------------

DROP TABLE IF EXISTS `solicomps`;

CREATE TABLE `solicomps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla status2s
# ------------------------------------------------------------

DROP TABLE IF EXISTS `status2s`;

CREATE TABLE `status2s` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla statuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla sucursals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sucursals`;

CREATE TABLE `sucursals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `direccion` longtext COLLATE utf8_unicode_ci,
  `clavenota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla tpagos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tpagos`;

CREATE TABLE `tpagos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `perfil_id` int(10) unsigned NOT NULL,
  `sucursal_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
