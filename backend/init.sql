CREATE DATABASE website;
USE website;

-- Создание таблицы пользователей
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Создание таблицы ссылок
CREATE TABLE IF NOT EXISTS users_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    long_link VARCHAR(300) NOT NULL,
    shorted_link VARCHAR(50) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Создание таблицы с данными о пользователе
CREATE TABLE IF NOT EXISTS users_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    full_name VARCHAR(300),
    phone VARCHAR(30),
    num_prifile_picture SMALLINT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);