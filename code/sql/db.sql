DROP DATABASE IF EXISTS folio;
CREATE DATABASE folio DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE folio;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Users

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `bio` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Categories

CREATE TABLE IF NOT EXISTS `categories` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Cards

CREATE TABLE IF NOT EXISTS `cards` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `category_id` INT NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `content` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Design'),
(2, 'Development'),
(3, 'Photography'),
(4, 'Motion');

-- Geslo za 'admin' je 'admin123'
INSERT INTO `users` (`id`, `username`, `password`, `bio`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Product Designer based in Ljubljana.');

INSERT INTO `cards` (`user_id`, `category_id`, `title`, `content`) VALUES
(1, 1, 'Minimal Architecture Study', 'A photographic exploration of negative space.'),
(1, 2, 'Tokyo Grid System', 'A working typographic grid developed for publication.'),
(1, 3, 'The Quiet Season', 'Capturing the stillness of winter in the city.');
