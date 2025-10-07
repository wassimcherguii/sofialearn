-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sofialearn
CREATE DATABASE IF NOT EXISTS `sofialearn` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sofialearn`;



-- Dumping structure for table sofialearn.chapters
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint unsigned NOT NULL,
  `name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `order` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chapters_course_id_index` (`course_id`),
  KEY `chapters_order_index` (`order`),
  CONSTRAINT `chapters_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sofialearn.chapters: ~0 rows (approximately)
DELETE FROM `chapters`;

-- Dumping structure for table sofialearn.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `slug_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description_fr` text COLLATE utf8mb4_unicode_ci,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description_en` text COLLATE utf8mb4_unicode_ci,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description_ar` text COLLATE utf8mb4_unicode_ci,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fr',
  `teacher_id` bigint unsigned NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_teacher_id_index` (`teacher_id`),
  KEY `courses_language_index` (`language`),
  KEY `courses_is_published_index` (`is_published`),
  CONSTRAINT `courses_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sofialearn.courses: ~0 rows (approximately)
DELETE FROM `courses`;

-- Dumping structure for table sofialearn.documents
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lesson_id` bigint unsigned NOT NULL,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_downloadable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_lesson_id_index` (`lesson_id`),
  KEY `documents_file_type_index` (`file_type`),
  KEY `documents_is_downloadable_index` (`is_downloadable`),
  CONSTRAINT `documents_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sofialearn.documents: ~0 rows (approximately)
DELETE FROM `documents`;

-- Dumping structure for table sofialearn.enrollments
CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `course_id` bigint unsigned NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `progress` tinyint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enrollments_user_id_foreign` (`user_id`),
  KEY `enrollments_course_id_foreign` (`course_id`),
  CONSTRAINT `enrollments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `enrollments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sofialearn.enrollments: ~0 rows (approximately)
DELETE FROM `enrollments`;

-- Dumping structure for table sofialearn.exams
CREATE TABLE IF NOT EXISTS `exams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `instructions_fr` text COLLATE utf8mb4_unicode_ci,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `instructions_en` text COLLATE utf8mb4_unicode_ci,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `instructions_ar` text COLLATE utf8mb4_unicode_ci,
  `course_id` bigint unsigned NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `max_points` int NOT NULL DEFAULT '100',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exams_course_id_index` (`course_id`),
  KEY `exams_date_index` (`date`),
  KEY `exams_is_published_index` (`is_published`),
  CONSTRAINT `exams_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sofialearn.exams: ~0 rows (approximately)
DELETE FROM `exams`;


-- Dumping structure for table sofialearn.homework
CREATE TABLE IF NOT EXISTS `homework` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `instructions_fr` text COLLATE utf8mb4_unicode_ci,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `instructions_en` text COLLATE utf8mb4_unicode_ci,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `instructions_ar` text COLLATE utf8mb4_unicode_ci,
  `lesson_id` bigint unsigned DEFAULT NULL,
  `chapter_id` bigint unsigned DEFAULT NULL,
  `course_id` bigint unsigned DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `max_points` int NOT NULL DEFAULT '100',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `homework_lesson_id_index` (`lesson_id`),
  KEY `homework_chapter_id_index` (`chapter_id`),
  KEY `homework_course_id_index` (`course_id`),
  KEY `homework_due_date_index` (`due_date`),
  KEY `homework_is_published_index` (`is_published`),
  CONSTRAINT `homework_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  CONSTRAINT `homework_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `homework_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sofialearn.homework: ~0 rows (approximately)
DELETE FROM `homework`;



-- Dumping structure for table sofialearn.lessons
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `chapter_id` bigint unsigned NOT NULL,
  `name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `content_fr` longtext COLLATE utf8mb4_unicode_ci,
  `instructions_fr` text COLLATE utf8mb4_unicode_ci,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `instructions_en` text COLLATE utf8mb4_unicode_ci,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `content_ar` longtext COLLATE utf8mb4_unicode_ci,
  `instructions_ar` text COLLATE utf8mb4_unicode_ci,
  `order` int unsigned NOT NULL DEFAULT '0',
  `type` enum('video','document','quiz','homework') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'video',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lessons_chapter_id_index` (`chapter_id`),
  KEY `lessons_order_index` (`order`),
  KEY `lessons_type_index` (`type`),
  CONSTRAINT `lessons_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sofialearn.lessons: ~0 rows (approximately)
DELETE FROM `lessons`;



-- Dumping structure for table sofialearn.quizzes
CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `instructions_fr` text COLLATE utf8mb4_unicode_ci,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `instructions_en` text COLLATE utf8mb4_unicode_ci,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `instructions_ar` text COLLATE utf8mb4_unicode_ci,
  `lesson_id` bigint unsigned DEFAULT NULL,
  `chapter_id` bigint unsigned DEFAULT NULL,
  `course_id` bigint unsigned DEFAULT NULL,
  `time_limit` int DEFAULT NULL,
  `max_attempts` int NOT NULL DEFAULT '1',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quizzes_lesson_id_index` (`lesson_id`),
  KEY `quizzes_chapter_id_index` (`chapter_id`),
  KEY `quizzes_course_id_index` (`course_id`),
  KEY `quizzes_is_published_index` (`is_published`),
  CONSTRAINT `quizzes_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  CONSTRAINT `quizzes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `quizzes_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sofialearn.quizzes: ~0 rows (approximately)
DELETE FROM `quizzes`;


-- Dumping structure for table sofialearn.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','teacher','student') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sofialearn.users: ~3 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin User', 'admin@sofialearn.com', '2025-10-05 10:26:33', '$2y$12$B7Tfau7TLNRcMYGNX5tn7.fVJlW3UB2yjfat6plT7wSgIaAzbVvjm', 'admin', NULL, '2025-10-05 10:26:33', '2025-10-05 10:26:33'),
	(2, 'Test Teacher', 'teacher@sofialearn.com', '2025-10-05 10:26:34', '$2y$12$2Cx/2tGznCgAjSL/83aMjOlNvMivRaNtNyZutkhZrlFI/b8GvcHTC', 'teacher', NULL, '2025-10-05 10:26:34', '2025-10-05 10:26:34'),
	(3, 'Test Student', 'student@sofialearn.com', '2025-10-05 10:26:34', '$2y$12$wNh6kBqh1mFodk77RThuGOVXOlG8ldbWnDwTfZcfLVb7PmiJpBu3e', 'student', NULL, '2025-10-05 10:26:34', '2025-10-05 10:26:34');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
