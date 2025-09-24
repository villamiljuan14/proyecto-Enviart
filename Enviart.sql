/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.32-MariaDB : Database - enviart
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`enviart` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `enviart`;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

LOCK TABLES `cache` WRITE;

insert  into `cache`(`key`,`value`,`expiration`) values ('c525a5357e97fef8d3db25841c86da1a','i:1;',1758584739),('c525a5357e97fef8d3db25841c86da1a:timer','i:1758584739;',1758584739);

UNLOCK TABLES;

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

LOCK TABLES `cache_locks` WRITE;

UNLOCK TABLES;

/*Table structure for table `direcciones` */

DROP TABLE IF EXISTS `direcciones`;

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_origen` enum('Origen','Destino') NOT NULL,
  `calle_dir` varchar(100) NOT NULL,
  `carrera_dir` varchar(100) NOT NULL,
  `numero_dir` varchar(45) NOT NULL,
  `barrio_dir` varchar(100) NOT NULL,
  `codigo_postal` varchar(8) NOT NULL,
  `cuidad` varchar(45) NOT NULL,
  `departamento` varchar(45) NOT NULL,
  `punto_referencia` varchar(45) DEFAULT NULL,
  `usuarios_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_direccion`),
  KEY `usuarios_id_usuario` (`usuarios_id_usuario`),
  CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `direcciones` */

LOCK TABLES `direcciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

LOCK TABLES `failed_jobs` WRITE;

UNLOCK TABLES;

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

LOCK TABLES `job_batches` WRITE;

UNLOCK TABLES;

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

LOCK TABLES `jobs` WRITE;

UNLOCK TABLES;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

LOCK TABLES `migrations` WRITE;

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_09_02_153130_add_two_factor_columns_to_users_table',1),(5,'2025_09_02_153205_create_personal_access_tokens_table',1);

UNLOCK TABLES;

/*Table structure for table `noguias` */

DROP TABLE IF EXISTS `noguias`;

CREATE TABLE `noguias` (
  `id_no_guia` int(11) NOT NULL AUTO_INCREMENT,
  `numero_guia` varchar(45) NOT NULL,
  `fecha_guia` datetime NOT NULL,
  `estado_guia` enum('Generada','Transito','Anulada') NOT NULL,
  `fecha_de_entrega_estimada` datetime NOT NULL,
  `firma_entrega` text NOT NULL,
  `evidencia_entrega` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `usuarios_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_no_guia`),
  UNIQUE KEY `numero_guia` (`numero_guia`),
  KEY `usuarios_id_usuario` (`usuarios_id_usuario`),
  CONSTRAINT `noguias_ibfk_1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `noguias` */

LOCK TABLES `noguias` WRITE;

UNLOCK TABLES;

/*Table structure for table `noguias_has_pedidos` */

DROP TABLE IF EXISTS `noguias_has_pedidos`;

CREATE TABLE `noguias_has_pedidos` (
  `id_guia_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `noguias_id_no_guia` int(11) NOT NULL,
  `pedidos_id_pedido` int(11) NOT NULL,
  PRIMARY KEY (`id_guia_pedido`),
  KEY `noguias_id_no_guia` (`noguias_id_no_guia`),
  KEY `pedidos_id_pedido` (`pedidos_id_pedido`),
  CONSTRAINT `noguias_has_pedidos_ibfk_1` FOREIGN KEY (`noguias_id_no_guia`) REFERENCES `noguias` (`id_no_guia`),
  CONSTRAINT `noguias_has_pedidos_ibfk_2` FOREIGN KEY (`pedidos_id_pedido`) REFERENCES `pedidos` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `noguias_has_pedidos` */

LOCK TABLES `noguias_has_pedidos` WRITE;

UNLOCK TABLES;

/*Table structure for table `novedades` */

DROP TABLE IF EXISTS `novedades`;

CREATE TABLE `novedades` (
  `id_novedad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_novedad` varchar(255) NOT NULL,
  `fecha_novedad` datetime NOT NULL,
  `estado_novedad` enum('PENDIENTE','RESUELTA','CANCELADA') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_novedad`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `novedades` */

LOCK TABLES `novedades` WRITE;

insert  into `novedades`(`id_novedad`,`descripcion_novedad`,`fecha_novedad`,`estado_novedad`,`created_at`,`updated_at`) values (21,'Paquete retrasado por tráfico','2025-09-22 15:35:09','PENDIENTE','2025-09-22 15:35:09','2025-09-22 15:35:09'),(22,'Cliente no disponible para entrega','2025-09-22 15:35:09','PENDIENTE','2025-09-22 15:35:09','2025-09-22 15:35:09'),(23,'Producto dañado en bodega','2025-09-22 15:35:09','RESUELTA','2025-09-22 15:35:09','2025-09-22 15:35:09'),(24,'direccion errada','2025-09-21 19:33:00','PENDIENTE','2025-09-21 19:33:06','2025-09-21 19:33:10'),(25,'ruta errada','2025-09-07 19:33:48','CANCELADA','2025-09-20 19:33:55','2025-09-20 19:34:00'),(26,'pedido equivocado','2025-09-21 19:36:52','PENDIENTE','2025-09-21 19:36:59','2025-09-14 19:37:04'),(27,'Paquete retrasado por tráfico','2025-09-16 19:37:37','PENDIENTE','2025-09-07 19:37:45','2025-09-07 19:37:49'),(28,'Paquete retrasado por tráfico','2025-09-16 20:17:51','PENDIENTE','2025-09-16 20:17:57','2025-09-16 20:18:00'),(29,'ruta errada','2025-09-16 20:18:09','CANCELADA','2025-09-18 20:18:19','2025-09-18 20:18:23'),(30,'Producto dañado en bodega','2025-09-01 20:19:01','PENDIENTE','2025-09-01 20:19:06','2025-09-01 20:19:09'),(31,'Producto dañado en bodega','2025-09-23 20:22:34','PENDIENTE','2025-09-22 20:22:40','2025-09-22 20:22:43'),(32,'Paquete retrasado por tráfico','2025-09-16 20:23:21','CANCELADA','2025-09-17 20:23:26','2025-09-17 20:23:29'),(33,'direccion errada','2025-09-18 20:23:34','PENDIENTE','2025-09-17 20:23:41','2025-09-17 20:23:44'),(34,'Cliente no disponible para entrega','2025-09-07 20:23:52','RESUELTA','2025-09-19 20:24:00','2025-09-19 20:24:06');

UNLOCK TABLES;

/*Table structure for table `novedades_has_pedidos` */

DROP TABLE IF EXISTS `novedades_has_pedidos`;

CREATE TABLE `novedades_has_pedidos` (
  `id_pedido_novedad` int(11) NOT NULL AUTO_INCREMENT,
  `novedades_id_novedad` int(11) NOT NULL,
  `pedidos_id_pedido` int(11) NOT NULL,
  `observacion_pedido` varchar(45) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`id_pedido_novedad`),
  KEY `novedades_id_novedad` (`novedades_id_novedad`),
  KEY `pedidos_id_pedido` (`pedidos_id_pedido`),
  CONSTRAINT `novedades_has_pedidos_ibfk_1` FOREIGN KEY (`novedades_id_novedad`) REFERENCES `novedades` (`id_novedad`),
  CONSTRAINT `novedades_has_pedidos_ibfk_2` FOREIGN KEY (`pedidos_id_pedido`) REFERENCES `pedidos` (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `novedades_has_pedidos` */

LOCK TABLES `novedades_has_pedidos` WRITE;

insert  into `novedades_has_pedidos`(`id_pedido_novedad`,`novedades_id_novedad`,`pedidos_id_pedido`,`observacion_pedido`,`fecha_registro`) values (1,21,1,'','2025-09-22 19:00:32'),(2,22,28,'Cliente no esta en domicilio','2025-09-21 19:05:06'),(3,23,29,'daño paquete','2025-09-18 19:31:49'),(4,24,32,'','2025-09-06 19:35:13'),(5,25,32,'','2025-09-21 19:39:09'),(6,26,39,'','2025-09-19 20:25:05'),(7,27,40,'','2025-09-18 20:26:11'),(10,28,41,'','2025-09-16 20:26:57'),(11,29,42,'','2025-09-13 20:27:27'),(12,30,43,'','2025-09-19 20:27:46');

UNLOCK TABLES;

/*Table structure for table `pagos` */

DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `metodo_de_pago` enum('Credito','Debito','Efectivo') NOT NULL,
  `monto_pago` decimal(10,2) NOT NULL,
  `moneda` varchar(4) NOT NULL DEFAULT 'cop',
  `estado_pago` enum('Pendiente','Pagado','Cancelado','Reembolsado') NOT NULL DEFAULT 'Pendiente',
  `fecha_pago` datetime NOT NULL,
  `referencia_pago` varchar(255) NOT NULL,
  `usuarios_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `usuarios_id_usuario` (`usuarios_id_usuario`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pagos` */

LOCK TABLES `pagos` WRITE;

insert  into `pagos`(`id_pago`,`metodo_de_pago`,`monto_pago`,`moneda`,`estado_pago`,`fecha_pago`,`referencia_pago`,`usuarios_id_usuario`) values (1,'Debito',200.00,'cop','Pagado','2025-09-14 19:08:57','1321321321321',1),(22,'Credito',9.00,'cop','Reembolsado','2025-09-09 19:27:22','241631465654o',28),(24,'Efectivo',100.00,'cop','Pendiente','2025-09-17 19:28:34','1321321814170',29),(25,'Efectivo',85.00,'cop','Pagado','2025-09-08 19:29:12','1231321327148',30),(26,'Credito',10.00,'cop','Pendiente','2025-09-14 19:43:54','1321321328589',46),(27,'Efectivo',5.00,'cop','Pagado','2025-09-17 19:44:24','1213215889977',49),(28,'Efectivo',55.00,'cop','Cancelado','2025-09-16 19:46:35','4654658888812',46),(30,'Debito',36.00,'cop','Pendiente','2025-09-24 20:16:02','2132132145800',42);

UNLOCK TABLES;

/*Table structure for table `pagos_has_pedidos` */

DROP TABLE IF EXISTS `pagos_has_pedidos`;

CREATE TABLE `pagos_has_pedidos` (
  `id_pago_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `pagos_id_pago` int(11) NOT NULL,
  `pedidos_id_pedido` int(11) NOT NULL,
  PRIMARY KEY (`id_pago_pedido`),
  KEY `pagos_id_pago` (`pagos_id_pago`),
  KEY `pedidos_id_pedido` (`pedidos_id_pedido`),
  CONSTRAINT `pagos_has_pedidos_ibfk_1` FOREIGN KEY (`pagos_id_pago`) REFERENCES `pagos` (`id_pago`),
  CONSTRAINT `pagos_has_pedidos_ibfk_2` FOREIGN KEY (`pedidos_id_pedido`) REFERENCES `pedidos` (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pagos_has_pedidos` */

LOCK TABLES `pagos_has_pedidos` WRITE;

insert  into `pagos_has_pedidos`(`id_pago_pedido`,`pagos_id_pago`,`pedidos_id_pedido`) values (1,1,1),(2,22,28),(3,24,29),(4,25,32),(5,26,39),(6,27,40),(12,28,41),(13,30,42),(14,30,43),(15,30,43);

UNLOCK TABLES;

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

LOCK TABLES `password_reset_tokens` WRITE;

UNLOCK TABLES;

/*Table structure for table `pedido_has_rutas` */

DROP TABLE IF EXISTS `pedido_has_rutas`;

CREATE TABLE `pedido_has_rutas` (
  `id_ruta_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id_pedido` int(11) NOT NULL,
  `ruta_id_ruta` int(11) NOT NULL,
  PRIMARY KEY (`id_ruta_pedido`),
  KEY `pedido_id_pedido` (`pedido_id_pedido`),
  KEY `ruta_id_ruta` (`ruta_id_ruta`),
  CONSTRAINT `pedido_has_rutas_ibfk_1` FOREIGN KEY (`pedido_id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  CONSTRAINT `pedido_has_rutas_ibfk_2` FOREIGN KEY (`ruta_id_ruta`) REFERENCES `rutas` (`id_ruta`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pedido_has_rutas` */

LOCK TABLES `pedido_has_rutas` WRITE;

UNLOCK TABLES;

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `estado_pedido` enum('En transito','bodega','Entregado') NOT NULL,
  `fecha_pedido` datetime NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `peso_pedido` decimal(10,0) NOT NULL,
  `largo_pedido` decimal(10,0) NOT NULL,
  `alto_pedido` decimal(10,0) NOT NULL,
  `fragil` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `usuario_id_usuario` (`usuario_id_usuario`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pedidos` */

LOCK TABLES `pedidos` WRITE;

insert  into `pedidos`(`id_pedido`,`estado_pedido`,`fecha_pedido`,`usuario_id_usuario`,`peso_pedido`,`largo_pedido`,`alto_pedido`,`fragil`) values (1,'Entregado','2025-09-21 18:58:02',1,100,15,5,1),(28,'bodega','2025-09-22 15:38:29',29,2000,40,20,0),(29,'Entregado','2025-09-22 15:38:29',30,3000,45,25,1),(32,'En transito','2025-09-22 18:56:53',1,200,15,25,0),(39,'En transito','2025-09-17 19:40:08',33,50,5,15,1),(40,'bodega','2025-09-21 19:40:49',42,500,6,2,0),(41,'En transito','2025-09-12 19:41:29',38,1200,12,10,1),(42,'bodega','2025-09-14 19:42:08',42,200,5,6,1),(43,'En transito','2025-09-08 20:20:03',48,2000,1,10,0);

UNLOCK TABLES;

/*Table structure for table `permisos` */

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `id_permisos` int(11) NOT NULL AUTO_INCREMENT,
  `des_permisos` varchar(50) NOT NULL,
  PRIMARY KEY (`id_permisos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `permisos` */

LOCK TABLES `permisos` WRITE;

UNLOCK TABLES;

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

LOCK TABLES `personal_access_tokens` WRITE;

UNLOCK TABLES;

/*Table structure for table `rol_has_permisos` */

DROP TABLE IF EXISTS `rol_has_permisos`;

CREATE TABLE `rol_has_permisos` (
  `id_rol_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id_rol` int(11) NOT NULL,
  `permisos_id_permisos` int(11) NOT NULL,
  PRIMARY KEY (`id_rol_permiso`),
  KEY `rol_id_rol` (`rol_id_rol`),
  KEY `permisos_id_permisos` (`permisos_id_permisos`),
  CONSTRAINT `rol_has_permisos_ibfk_1` FOREIGN KEY (`rol_id_rol`) REFERENCES `roles` (`id_rol`),
  CONSTRAINT `rol_has_permisos_ibfk_2` FOREIGN KEY (`permisos_id_permisos`) REFERENCES `permisos` (`id_permisos`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `rol_has_permisos` */

LOCK TABLES `rol_has_permisos` WRITE;

UNLOCK TABLES;

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_rol` enum('Proveedor','Cliente','Mensajero','Administrador') NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `roles` */

LOCK TABLES `roles` WRITE;

insert  into `roles`(`id_rol`,`tipo_rol`) values (1,'Proveedor'),(2,'Cliente'),(3,'Mensajero'),(4,'Administrador');

UNLOCK TABLES;

/*Table structure for table `rutas` */

DROP TABLE IF EXISTS `rutas`;

CREATE TABLE `rutas` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ruta` datetime NOT NULL,
  `descripcion_ruta` varchar(45) DEFAULT NULL,
  `usuarios_id_usuario` int(11) NOT NULL,
  `vehiculos_id_vehiculo` int(11) NOT NULL,
  `direccion_id_direccion` int(11) NOT NULL,
  PRIMARY KEY (`id_ruta`),
  KEY `usuarios_id_usuario` (`usuarios_id_usuario`),
  KEY `vehiculos_id_vehiculo` (`vehiculos_id_vehiculo`),
  KEY `direccion_id_direccion` (`direccion_id_direccion`),
  CONSTRAINT `rutas_ibfk_1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `rutas_ibfk_2` FOREIGN KEY (`vehiculos_id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`),
  CONSTRAINT `rutas_ibfk_3` FOREIGN KEY (`direccion_id_direccion`) REFERENCES `direcciones` (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `rutas` */

LOCK TABLES `rutas` WRITE;

UNLOCK TABLES;

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

LOCK TABLES `sessions` WRITE;

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('Nq9NibGUd6BEv1CWEFAfgMGYNfKIeJVGIFRAgQIE',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoibFAwM21KejZvYlFzMDZZMXRwVGtZVUhVeXk5SkIzOWs4Yk9NeEVydSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcGVkaWRvcy80My9lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiQyVDcweXU4dDhUelNqdUVXZG1oU2cuRXdReXZOSzdVVndkTHB0N2x5Q1BaRXpFOW9LOFhNYSI7fQ==',1758592016);

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`two_factor_confirmed_at`,`remember_token`,`current_team_id`,`profile_photo_path`,`created_at`,`updated_at`) values (1,'admin','admin@gmail.com',NULL,'$2y$12$2T70yu8t8TzSjuEWdmhSg.EwQyvNK7UVwdLpt7lyCPZEzE9oK8XMa',NULL,NULL,NULL,NULL,NULL,NULL,'2025-09-22 20:14:35','2025-09-22 20:14:35');

UNLOCK TABLES;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `doc_usuario` varchar(45) NOT NULL,
  `tipo_documento` enum('CE','TI','CC') NOT NULL,
  `contrasena_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `primer_nombre` varchar(80) NOT NULL,
  `segundo_nombre` varchar(80) DEFAULT NULL,
  `primer_apellido` varchar(80) NOT NULL,
  `segundo_apellido` varchar(80) DEFAULT NULL,
  `telefono_usuario` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `estado_usuario` tinyint(4) NOT NULL DEFAULT 1,
  `rol_id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `rol_id_rol` (`rol_id_rol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`id_usuario`,`doc_usuario`,`tipo_documento`,`contrasena_usuario`,`email_usuario`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`telefono_usuario`,`created_at`,`updated_at`,`estado_usuario`,`rol_id_rol`) values (1,'123156787','CE','gfdgdf','eduardoLopera@gmail.com','Eduardo','Andres','Lopera','Lopez','1321321758','2025-09-22 18:54:13','2025-09-22 23:55:54',1,2),(28,'123456789','CC','password123','juan.perez@example.com','Juan','Carlos','Perez','Gomez','3001234567','2025-09-22 15:23:14','2025-09-22 15:23:14',1,1),(29,'987654321','TI','password456','maria.lopez@example.com','Maria',NULL,'Lopez',NULL,'3107654321','2025-09-22 15:23:14','2025-09-22 15:23:14',1,2),(30,'112233445','CE','password789','carlos.martinez@example.com','Carlos','Andres','Martinez','Diaz','3201122334','2025-09-22 15:23:14','2025-09-22 15:23:14',1,3),(31,'3132132132','CE','$2y$12$WtNbDzcexPwyoWD6gDCeWeZieovaim4b2k2pkRfC/oFNy39VcAluO','gk.gonzalez@gmail.com','German',NULL,'Gonzalez',NULL,'1231321321','2025-09-22 20:31:51','2025-09-22 20:31:51',1,4),(32,'2132132132','TI','$2y$12$47N3rWY3sf8vL8SkO11d2.jCPWU0xJLm6D/Dg3V6w6JEvf6Np4Mty','andres.Lopez@gmail.com','Andres','Camilo','Lopez','Saavedra','1321321789','2025-09-22 23:45:58','2025-09-22 23:45:58',0,3),(33,'8250439989','CE','$2y$10$w6ptq49dvuieys3z8ln5eyxid9ugz','juan.perez@example.com','Juan','Luis','Pérez','Gómez','3148729167','2024-02-15 00:00:00','2024-08-12 00:00:00',1,2),(34,'8250439989','CE','$2y$10$w6ptq49dvuieys3z8ln5eyxid9ugz','juan.perez@example.com','Juan','Luis','Pérez','Gómez','3148729167','2024-02-15 00:00:00','2024-08-12 00:00:00',1,2),(35,'1039472810','CC','$2y$10$kzodx20atmd93u48smle8f7mhyitv','laura.rios@correo.com','Laura','Camila','Ríos','Martínez','3162874920','2024-03-10 00:00:00','2024-07-22 00:00:00',1,3),(36,'9472810371','TI','$2y$10$plq38jxmskdie9834sldkskq02kd0','carlos.gomez@mail.com','Carlos','Andrés','Gómez','Romero','3157892345','2024-04-01 00:00:00','2024-08-15 00:00:00',0,1),(37,'7582938472','','$2y$10$qw9ekdsi27shqpwo38djasdl12kd9','ana.mendoza@dominio.co','Ana','Lucía','Mendoza','Suárez','3172349812','2024-05-12 00:00:00','2024-07-10 00:00:00',1,4),(38,'6203847291','CC','$2y$10$w9xhsjqp38shqo3saldjskq8slqpz','miguel.vargas@example.com','Miguel','Fernando','Vargas','Delgado','3183749201','2024-02-27 00:00:00','2024-08-01 00:00:00',0,2),(40,'7201938475','TI','$2y$10$zzzkowjdpalskqowue7d9sksjdke','pedro.castro@correo.com','Pedro','José','Castro','Nieto','3118762930','2024-01-05 00:00:00','2024-09-10 00:00:00',1,1),(41,'9837461920','CC','$2y$10$lakwiq0293zmxkqpwoeldmskd930','natalia.ruiz@example.com','Natalia','Alejandra','Ruiz','Castaño','3109283746','2024-02-18 00:00:00','2024-08-18 00:00:00',0,3),(42,'9083746123','','$2y$10$xoqwmznvbalkslqiwu37djskslaop','david.herrera@dominio.co','David','Esteban','Herrera','Ortega','3138459203','2024-06-01 00:00:00','2024-09-01 00:00:00',1,4),(43,'7820319456','CE','$2y$10$ppqmowkalskqpqowuzlqwoqpzmxop','paula.moreno@mail.com','Paula','Juliana','Moreno','Vargas','3123840192','2024-04-25 00:00:00','2024-07-05 00:00:00',0,2),(44,'8492013746','CE','$2y$10$aplskqowue927djwksldoqwpzmsk','camila.lopez@mail.com','Camila','Isabel','López','Herrera','3194827163','2024-03-15 00:00:00','2024-06-20 00:00:00',1,3),(45,'8250439989','CE','$2y$10$w6ptq49dvuieys3z8ln5eyxid9ugz','juan.perez@example.com','Juan','Luis','Pérez','Gómez','3148729167','2024-02-15 00:00:00','2024-08-12 00:00:00',1,2),(46,'1039472110','CC','$2y$10$kzodx20atmd93u48smle8f7mhyitv','laura.rios@correo.com','Laura','Camila','Ríos','Martínez','3162874920','2024-03-10 00:00:00','2024-07-22 00:00:00',1,3),(47,'9472000371','TI','$2y$10$plq38jxmskdie9834sldkskq02kd0','carlos.gomez@mail.com','Carlos','Andrés','Gómez','Romero','3157892345','2024-04-01 00:00:00','2024-08-15 00:00:00',0,1),(48,'7583038472','','$2y$10$qw9ekdsi27shqpwo38djasdl12kd9','a.mendoza@dominio.co','Ana','Lucía','Mendoza','Suárez','3172349812','2024-05-12 00:00:00','2024-07-10 00:00:00',1,4),(49,'6203847291','CC','$2y$10$w9xhsjqp38shqo3saldjskq8slqpz','miguel.vargass@example.com','Miguel','Fernando','Vargas','Delgado','3183749201','2024-02-27 00:00:00','2024-08-01 00:00:00',0,2),(51,'7201938455','TI','$2y$10$zzzkowjdpalskqowue7d9sksjdke','pedro.c@correo.com','Pedro','José','Castro','Nieto','3118762930','2024-01-05 00:00:00','2024-09-10 00:00:00',1,1),(52,'9837461110','CC','$2y$10$lakwiq0293zmxkqpwoeldmskd930','nata.ruiz@example.com','Natalia','Alejandra','Ruiz','Castaño','3109283746','2024-02-18 00:00:00','2024-08-18 00:00:00',0,3),(53,'9083746253','','$2y$10$xoqwmznvbalkslqiwu37djskslaop','david.herrera14@dominio.co','David','Esteban','Herrera','Ortega','3138459203','2024-06-01 00:00:00','2024-09-01 00:00:00',1,4),(54,'8492069746','CE','$2y$10$aplskqowue927djwksldoqwpzmsk','camila.lz@mail.com','Camila','Isabel','López','Herrera','3194827163','2024-03-15 00:00:00','2024-06-20 00:00:00',1,3),(55,'8250439989','CE','$2y$10$w6ptq49dvuieys3z8ln5eyxid9ugz','juan.perez@example.com','Juan','Luis','Pérez','Gómez','3148729167','2024-02-15 00:00:00','2024-08-12 00:00:00',1,2),(56,'1039472110','CC','$2y$10$kzodx20atmd93u48smle8f7mhyitv','laura.rios@correo.com','Laura','Camila','Ríos','Martínez','3162874920','2024-03-10 00:00:00','2024-07-22 00:00:00',1,3),(57,'9472000371','TI','$2y$10$plq38jxmskdie9834sldkskq02kd0','carlos.gomez@mail.com','Carlos','Andrés','Gómez','Romero','3157892345','2024-04-01 00:00:00','2024-08-15 00:00:00',0,1),(58,'7583038472','','$2y$10$qw9ekdsi27shqpwo38djasdl12kd9','a.mendoza@dominio.co','Ana','Lucía','Mendoza','Suárez','3172349812','2024-05-12 00:00:00','2024-07-10 00:00:00',1,4),(59,'6203847291','CC','$2y$10$w9xhsjqp38shqo3saldjskq8slqpz','miguel.vargass@example.com','Miguel','Fernando','Vargas','Delgado','3183749201','2024-02-27 00:00:00','2024-08-01 00:00:00',0,2),(60,'8492069746','CE','$2y$10$aplskqowue927djwksldoqwpzmsk','camila.lz@mail.com','Camila','Isabel','López','Herrera','3194827163','2024-03-15 00:00:00','2024-06-20 00:00:00',1,3),(61,'7201938455','TI','$2y$10$zzzkowjdpalskqowue7d9sksjdke','pedro.c@correo.com','Pedro','José','Castro','Nieto','3118762930','2024-01-05 00:00:00','2024-09-10 00:00:00',1,1),(62,'9837461110','CC','$2y$10$lakwiq0293zmxkqpwoeldmskd930','nata.ruiz@example.com','Natalia','Alejandra','Ruiz','Castaño','3109283746','2024-02-18 00:00:00','2024-08-18 00:00:00',0,3),(63,'9083746253','','$2y$10$xoqwmznvbalkslqiwu37djskslaop','david.herrera14@dominio.co','David','Esteban','Herrera','Ortega','3138459203','2024-06-01 00:00:00','2024-09-01 00:00:00',1,4),(64,'8250439989','CE','$2y$10$w6ptq49dvuieys3z8ln5eyxid9ugz','juan.perez@example.com','Juan','Luis','Pérez','Gómez','3148729167','2024-02-15 00:00:00','2024-08-12 00:00:00',1,2),(65,'1039472110','CC','$2y$10$kzodx20atmd93u48smle8f7mhyitv','laura.rios@correo.com','Laura','Camila','Ríos','Martínez','3162874920','2024-03-10 00:00:00','2024-07-22 00:00:00',1,3),(66,'9472000371','TI','$2y$10$plq38jxmskdie9834sldkskq02kd0','carlos.gomez@mail.com','Carlos','Andrés','Gómez','Romero','3157892345','2024-04-01 00:00:00','2024-08-15 00:00:00',0,1),(67,'7583038472','','$2y$10$qw9ekdsi27shqpwo38djasdl12kd9','a.mendoza@dominio.co','Ana','Lucía','Mendoza','Suárez','3172349812','2024-05-12 00:00:00','2024-07-10 00:00:00',1,4),(68,'6203847291','CC','$2y$10$w9xhsjqp38shqo3saldjskq8slqpz','miguel.vargass@example.com','Miguel','Fernando','Vargas','Delgado','3183749201','2024-02-27 00:00:00','2024-08-01 00:00:00',0,2),(69,'8492069746','CE','$2y$10$aplskqowue927djwksldoqwpzmsk','camila.lz@mail.com','Camila','Isabel','López','Herrera','3194827163','2024-03-15 00:00:00','2024-06-20 00:00:00',1,3),(70,'7201938455','TI','$2y$10$zzzkowjdpalskqowue7d9sksjdke','pedro.c@correo.com','Pedro','José','Castro','Nieto','3118762930','2024-01-05 00:00:00','2024-09-10 00:00:00',1,1),(71,'9837461110','CC','$2y$10$lakwiq0293zmxkqpwoeldmskd930','nata.ruiz@example.com','Natalia','Alejandra','Ruiz','Castaño','3109283746','2024-02-18 00:00:00','2024-08-18 00:00:00',0,3),(72,'9083746253','','$2y$10$xoqwmznvbalkslqiwu37djskslaop','david.herrera14@dominio.co','David','Esteban','Herrera','Ortega','3138459203','2024-06-01 00:00:00','2024-09-01 00:00:00',1,4);

UNLOCK TABLES;

/*Table structure for table `vehiculos` */

DROP TABLE IF EXISTS `vehiculos`;

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_vehiculo` varchar(45) NOT NULL,
  `marca_vehiculo` varchar(45) NOT NULL,
  `modelo_vehiculo` varchar(45) NOT NULL,
  `año_vehiculo` int(4) NOT NULL,
  `placa_vehiculo` varchar(45) NOT NULL,
  `capacidad_carga` varchar(45) NOT NULL,
  `estado_vehiculo` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
  `usuarios_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_vehiculo`),
  UNIQUE KEY `placa_vehiculo_UNIQUE` (`placa_vehiculo`),
  KEY `usuarios_id_usuario` (`usuarios_id_usuario`),
  CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `vehiculos` */

LOCK TABLES `vehiculos` WRITE;

insert  into `vehiculos`(`id_vehiculo`,`tipo_vehiculo`,`marca_vehiculo`,`modelo_vehiculo`,`año_vehiculo`,`placa_vehiculo`,`capacidad_carga`,`estado_vehiculo`,`usuarios_id_usuario`) values (2,'moto','bajaj','NS 200',2022,'QWE14','150','Activo',1);

UNLOCK TABLES;

/*Table structure for table `estado_pedido` */

DROP TABLE IF EXISTS `estado_pedido`;

/*!50001 DROP VIEW IF EXISTS `estado_pedido` */;
/*!50001 DROP TABLE IF EXISTS `estado_pedido` */;

/*!50001 CREATE TABLE  `estado_pedido`(
 `primer_nombre` varchar(80) ,
 `primer_apellido` varchar(80) ,
 `id_pedido` int(11) ,
 `estado_pedido` enum('En transito','bodega','Entregado') ,
 `estado_pago` enum('Pendiente','Pagado','Cancelado','Reembolsado') ,
 `metodo_de_pago` enum('Credito','Debito','Efectivo') ,
 `descripcion_novedad` varchar(255) ,
 `estado_novedad` enum('PENDIENTE','RESUELTA','CANCELADA') 
)*/;

/*Table structure for table `localidad_pedido` */

DROP TABLE IF EXISTS `localidad_pedido`;

/*!50001 DROP VIEW IF EXISTS `localidad_pedido` */;
/*!50001 DROP TABLE IF EXISTS `localidad_pedido` */;

/*!50001 CREATE TABLE  `localidad_pedido`(
 `id_pedido` int(11) ,
 `primer_nombre` varchar(80) ,
 `id_ruta` int(11) ,
 `localidad_dir` varchar(45) 
)*/;

/*Table structure for table `roles_permiso` */

DROP TABLE IF EXISTS `roles_permiso`;

/*!50001 DROP VIEW IF EXISTS `roles_permiso` */;
/*!50001 DROP TABLE IF EXISTS `roles_permiso` */;

/*!50001 CREATE TABLE  `roles_permiso`(
 `id_usuario` int(11) ,
 `primer_nombre` varchar(80) ,
 `primer_apellido` varchar(80) ,
 `tipo_rol` enum('Proveedor','Cliente','Mensajero','Administrador') ,
 `des_permisos` varchar(50) 
)*/;

/*View structure for view estado_pedido */

/*!50001 DROP TABLE IF EXISTS `estado_pedido` */;
/*!50001 DROP VIEW IF EXISTS `estado_pedido` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estado_pedido` AS select `u`.`primer_nombre` AS `primer_nombre`,`u`.`primer_apellido` AS `primer_apellido`,`p`.`id_pedido` AS `id_pedido`,`p`.`estado_pedido` AS `estado_pedido`,`pa`.`estado_pago` AS `estado_pago`,`pa`.`metodo_de_pago` AS `metodo_de_pago`,`n`.`descripcion_novedad` AS `descripcion_novedad`,`n`.`estado_novedad` AS `estado_novedad` from ((((`pedidos` `p` join `usuarios` `u` on(`p`.`usuario_id_usuario` = `u`.`id_usuario`)) left join `pagos` `pa` on(`p`.`id_pedido` = `pa`.`usuarios_id_usuario`)) left join `novedades_has_pedidos` `nh` on(`p`.`id_pedido` = `nh`.`pedidos_id_pedido`)) left join `novedades` `n` on(`nh`.`novedades_id_novedad` = `n`.`id_novedad`)) */;

/*View structure for view localidad_pedido */

/*!50001 DROP TABLE IF EXISTS `localidad_pedido` */;
/*!50001 DROP VIEW IF EXISTS `localidad_pedido` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `localidad_pedido` AS select `p`.`id_pedido` AS `id_pedido`,`u`.`primer_nombre` AS `primer_nombre`,`r`.`id_ruta` AS `id_ruta`,`d`.`cuidad` AS `localidad_dir` from ((((`pedidos` `p` join `usuarios` `u` on(`p`.`usuario_id_usuario` = `u`.`id_usuario`)) join `pedido_has_rutas` `pr` on(`p`.`id_pedido` = `pr`.`pedido_id_pedido`)) join `rutas` `r` on(`pr`.`ruta_id_ruta` = `r`.`id_ruta`)) join `direcciones` `d` on(`r`.`direccion_id_direccion` = `d`.`id_direccion`)) */;

/*View structure for view roles_permiso */

/*!50001 DROP TABLE IF EXISTS `roles_permiso` */;
/*!50001 DROP VIEW IF EXISTS `roles_permiso` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `roles_permiso` AS select `u`.`id_usuario` AS `id_usuario`,`u`.`primer_nombre` AS `primer_nombre`,`u`.`primer_apellido` AS `primer_apellido`,`r`.`tipo_rol` AS `tipo_rol`,`p`.`des_permisos` AS `des_permisos` from (((`usuarios` `u` join `roles` `r` on(`u`.`rol_id_rol` = `r`.`id_rol`)) join `rol_has_permisos` `rp` on(`r`.`id_rol` = `rp`.`rol_id_rol`)) join `permisos` `p` on(`rp`.`permisos_id_permisos` = `p`.`id_permisos`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
