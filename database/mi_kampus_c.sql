-- ============================================
-- Database: mi_kampus_c
-- Madrasah Ibtidaiyah Kampus-C
-- Website Profil & Sistem PPDB Online
-- ============================================

-- Membuat Database
CREATE DATABASE IF NOT EXISTS `mi_kampus_c` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `mi_kampus_c`;
-- ============================================
-- Table: users (Admin)
-- ============================================
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','superadmin') COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert Default Admin
-- Email: admin@mi-kampus-c.sch.id
-- Password: password
INSERT INTO `users` (`name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
('Super Admin', 'admin@mi-kampus-c.sch.id', '$2y$12$LQv3c1yycaRc7MGnNvHinOuCjjxqppWJszkbBm4A2Jt6qP9cZKHze', 'superadmin', NOW(), NOW());

-- ============================================
-- Table: ppdb_registrations
-- ============================================
CREATE TABLE `ppdb_registrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Islam',
  `previous_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','verified','accepted','rejected') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ppdb_reg_number_unique` (`registration_number`),
  KEY `idx_status` (`status`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample Data PPDB (Optional)
INSERT INTO `ppdb_registrations` 
(`registration_number`, `student_name`, `nisn`, `birth_place`, `birth_date`, `gender`, `religion`, `previous_school`, `parent_name`, `parent_phone`, `address`, `status`, `created_at`, `updated_at`) 
VALUES
('PPDB-2026-001', 'Ahmad Fauzan', '0123456789', 'Bandung', '2019-05-15', 'L', 'Islam', 'TK Al-Ikhlas', 'Budi Santoso', '081234567890', 'Jl. Merdeka No. 10, Bandung', 'pending', NOW(), NOW()),
('PPDB-2026-002', 'Siti Aisyah', '0123456790', 'Jakarta', '2019-03-20', 'P', 'Islam', 'RA Nurul Huda', 'Siti Aminah', '081234567891', 'Jl. Sudirman No. 25, Jakarta', 'verified', NOW(), NOW()),
('PPDB-2026-003', 'Muhammad Rizki', '0123456791', 'Surabaya', '2019-07-10', 'L', 'Islam', 'TK Harapan Bangsa', 'Agus Wijaya', '081234567892', 'Jl. Pahlawan No. 5, Surabaya', 'accepted', NOW(), NOW());

-- ============================================
-- Table: galleries
-- ============================================
CREATE TABLE `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_is_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample Data Gallery (Optional)
INSERT INTO `galleries` (`title`, `image_path`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
('Kegiatan Belajar Mengajar', 'gallery/sample1.jpg', 'Suasana belajar yang kondusif dan menyenangkan', 1, NOW(), NOW()),
('Upacara Bendera', 'gallery/sample2.jpg', 'Upacara bendera setiap hari Senin', 1, NOW(), NOW()),
('Kegiatan Ekstrakurikuler', 'gallery/sample3.jpg', 'Berbagai kegiatan ekstrakurikuler yang menarik', 1, NOW(), NOW());

-- ============================================
-- Table: migrations (Laravel)
-- ============================================
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: password_reset_tokens (Laravel)
-- ============================================
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: sessions (Laravel)
-- ============================================
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: cache (Laravel)
-- ============================================
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- END OF SQL
-- ============================================
