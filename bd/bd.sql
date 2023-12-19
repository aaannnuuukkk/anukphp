CREATE DATABASE IF NOT EXISTS `db`;
USE `db`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('admin' ,'teacher', 'student') NOT NULL
);

CREATE TABLE IF NOT EXISTS `assignments` (
    `id` INT PRIMARY KEY,
    `title` VARCHAR(100) NOT NULL,
    `deadline` DATE NOT NULL,
    `description` TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `submitted_files` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `assignment_id` INT NOT NULL,
    `student_id` INT NOT NULL,
    `file_path` VARCHAR(255) NOT NULL,
    `submission_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

