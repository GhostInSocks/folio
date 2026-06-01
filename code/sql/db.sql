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
  (4, 'Writing'),
  (5, 'Motion'),
  (6, 'Branding');

-- Geslo za 'admin' je 'admin123'
INSERT INTO `users` (`id`, `username`, `password`, `bio`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Sistemski administrator platforme.'),
(2, 'lara_creative', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Visual Artist & Photographer capturing raw moments.'),
(3, 'nejc_dev', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Full-stack developer into minimalist UI and layout systems.');

INSERT INTO `cards` (`user_id`, `category_id`, `title`, `content`, `image_url`) VALUES
(2, 3, 'The Quiet Season', 'Capturing the stillness of winter in the city through an analogue lens.', 'https://i.pinimg.com/1200x/3b/70/3c/3b703c7055ceda4a8d60b7b4940ae9f0.jpg'),
(2, 6, 'Studio Identity', 'Complete branding package for a modern architectural bureau.', 'https://i.pinimg.com/1200x/af/36/8a/af368a99347b115291eb6605a25efc3e.jpg'),
(3, 1, 'Tokyo Grid System', 'A working typographic grid developed for print and web publication.', 'https://i.pinimg.com/736x/7a/db/f5/7adbf540e1ebffab57a2ababd2bfc090.jpg'),
(3, 2, 'Portfolio Core Engine', 'Lightweight MVC PHP framework built for creative agencies.', 'https://i.pinimg.com/1200x/01/35/6c/01356c44e0be89c2cc20a07366f441a7.jpg');
