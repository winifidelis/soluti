-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.2.6-MariaDB-log - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela soluti.arquivos
CREATE TABLE IF NOT EXISTS `arquivos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamanho` double NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `arquivos_user_id_foreign` (`user_id`),
  CONSTRAINT `arquivos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela soluti.arquivos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `arquivos` DISABLE KEYS */;
INSERT INTO `arquivos` (`id`, `url`, `nome`, `tamanho`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, '101039202012225fe1f04f8476b.pdf', 'Anthony Sales peixoto (1).pdf', 3395163, 8, '2020-12-22 10:10:39', '2020-12-22 10:10:39'),
	(2, '101039202012225fe1f04faa824.pdf', 'Anthony Sales peixoto.pdf', 3395163, 8, '2020-12-22 10:10:39', '2020-12-22 10:10:39'),
	(3, '101039202012225fe1f04ff092e.pdf', 'Arquivo-ou-coleção-os-documentos-do-arquivo-histórico-do-museu-aeroespacial-FABIANA-COSTA-DIAS.pdf', 372903, 8, '2020-12-22 10:10:39', '2020-12-22 10:10:39'),
	(4, '101040202012225fe1f050368b3.pdf', 'ASKERY CANABARRO.PDF', 6196131, 8, '2020-12-22 10:10:40', '2020-12-22 10:10:40'),
	(5, '101040202012225fe1f0507f225.pdf', 'CARLOS ALBERTO ARAGAfO DOS SANTOS diss.PDF', 700837, 8, '2020-12-22 10:10:40', '2020-12-22 10:10:40'),
	(6, '101040202012225fe1f050c2976.pdf', 'CASSIO ERACLITO ALVES DOS SANTOS.pdf', 2725241, 8, '2020-12-22 10:10:40', '2020-12-22 10:10:40');
/*!40000 ALTER TABLE `arquivos` ENABLE KEYS */;

-- Copiando estrutura para tabela soluti.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela soluti.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Copiando estrutura para tabela soluti.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela soluti.grupos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Grupo 1', '2020-12-22 09:33:19', '2020-12-22 09:33:19'),
	(2, 'Grupo 2', '2020-12-22 09:33:19', '2020-12-22 09:33:19'),
	(3, 'Grupo 3', '2020-12-22 09:33:19', '2020-12-22 09:33:19'),
	(4, 'Grupo 4', '2020-12-22 09:33:20', '2020-12-22 09:33:20');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;

-- Copiando estrutura para tabela soluti.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela soluti.migrations: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(8, '2014_10_12_000000_create_users_table', 1),
	(9, '2014_10_12_100000_create_password_resets_table', 1),
	(10, '2019_08_19_000000_create_failed_jobs_table', 1),
	(11, '2020_12_20_154506_create_arquivos_table', 1),
	(12, '2020_12_20_154535_create_userarquivos_table', 1),
	(13, '2020_12_20_154547_create_grupos_table', 1),
	(14, '2020_12_20_154559_create_usergrupos_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela soluti.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela soluti.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela soluti.userarquivos
CREATE TABLE IF NOT EXISTS `userarquivos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `arquivo_id` bigint(20) unsigned NOT NULL,
  `proprietario` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userarquivos_user_id_foreign` (`user_id`),
  KEY `userarquivos_arquivo_id_foreign` (`arquivo_id`),
  CONSTRAINT `userarquivos_arquivo_id_foreign` FOREIGN KEY (`arquivo_id`) REFERENCES `arquivos` (`id`),
  CONSTRAINT `userarquivos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela soluti.userarquivos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `userarquivos` DISABLE KEYS */;
INSERT INTO `userarquivos` (`id`, `user_id`, `arquivo_id`, `proprietario`, `created_at`, `updated_at`) VALUES
	(1, 8, 1, 1, '2020-12-22 10:10:39', '2020-12-22 10:10:39'),
	(2, 8, 2, 1, '2020-12-22 10:10:39', '2020-12-22 10:10:39'),
	(3, 8, 3, 1, '2020-12-22 10:10:40', '2020-12-22 10:10:40'),
	(4, 8, 4, 1, '2020-12-22 10:10:40', '2020-12-22 10:10:40'),
	(5, 8, 5, 1, '2020-12-22 10:10:40', '2020-12-22 10:10:40'),
	(6, 8, 6, 1, '2020-12-22 10:10:40', '2020-12-22 10:10:40');
/*!40000 ALTER TABLE `userarquivos` ENABLE KEYS */;

-- Copiando estrutura para tabela soluti.usergrupos
CREATE TABLE IF NOT EXISTS `usergrupos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `grupo_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usergrupos_user_id_foreign` (`user_id`),
  KEY `usergrupos_grupo_id_foreign` (`grupo_id`),
  CONSTRAINT `usergrupos_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`),
  CONSTRAINT `usergrupos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela soluti.usergrupos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usergrupos` DISABLE KEYS */;
INSERT INTO `usergrupos` (`id`, `user_id`, `grupo_id`, `created_at`, `updated_at`) VALUES
	(1, 8, 1, '2020-12-22 09:33:20', '2020-12-22 09:33:20');
/*!40000 ALTER TABLE `usergrupos` ENABLE KEYS */;

-- Copiando estrutura para tabela soluti.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela soluti.users: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'user 1', 'user1@gmail.com', NULL, '$2y$10$cGY7tZI/HD/vHJwVM0pwo.CR3KpCfidqB3xvxw73ZOsLDcHoIOy3i', NULL, NULL, NULL),
	(2, 'user 2', 'user2@gmail.com', NULL, '$2y$10$m22RqsYKQ5I8t17XULPhLuoNzWHRGVVVSKOpWoIb5dS1ZVo2GTzji', NULL, NULL, NULL),
	(3, 'user 3', 'user3@gmail.com', NULL, '$2y$10$3L1vnQDx7c8PQzNkDx1Qqe0ybaknJWbmgjGuPgqzEPNwpNypInNSq', NULL, NULL, NULL),
	(4, 'user 4', 'user4@gmail.com', NULL, '$2y$10$m864Vjf7ePGRLp4zf3T3keZYrMchWdNgdI/7Ch4Z/LIULbi.laQfK', NULL, NULL, NULL),
	(5, 'user 5', 'user5@gmail.com', NULL, '$2y$10$4tWoKwuu3hEu2w9MFxCYNuG5zmdtCfB3dhnE80PNGhh1EJGxRFPEC', NULL, NULL, NULL),
	(6, 'user 6', 'user6@gmail.com', NULL, '$2y$10$C8VUbRzY3q6MFWBjDiaR8.3eJ1EZgckhyfWMblv6GlHAH2JSjOV5O', NULL, NULL, NULL),
	(7, 'user 7', 'user7@gmail.com', NULL, '$2y$10$0GRjIH2QikTWTNx/4H6ThO6DAIm0HK8rsr5erhPSmhPZ90Tmv3Zkm', NULL, NULL, NULL),
	(8, 'Winicius Fidelis', 'winifidelis@gmail.com', NULL, '$2y$10$zBbRYoKDCwciSEibTYyZ8ezA3WIsKkPoR.kC7w769baSzdAcmJfuS', NULL, NULL, NULL),
	(9, 'Winicius', 'winifidelis2@gmail.com', NULL, '$2y$10$VhYU2cvOS7uUCqVqAMQiCe.sL02pdzsPZLh7ceOAtg5KpXgOFMX96', NULL, '2020-12-22 10:03:15', '2020-12-22 10:03:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
