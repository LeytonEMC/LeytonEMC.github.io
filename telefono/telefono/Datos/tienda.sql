CREATE DATABASE IF NOT EXISTS tienda CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tienda;

CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(150) NOT NULL,
  descripcion TEXT,
  precio DECIMAL(10,2) NOT NULL,
  imagen_url VARCHAR(255),
  creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Ejemplo de inserción de usuario con contraseña en hash (usa bcrypt o similar en backend)
INSERT INTO usuarios (nombre, email, password_hash) VALUES
('Admin', 'admin@tienda.com', '$2b$10$EjemploHashSeguro1234567890abcdefghijklmnopqrstuv');

-- Ejemplo de productos
INSERT INTO productos (nombre, descripcion, precio, imagen_url) VALUES
('Samsung Galaxy S23', 'Último modelo con cámara avanzada', 2230.00, 'img/s23ultra.jpg'),
('iPhone 14 Pro Max', 'Alta tecnología y rendimiento', 3749.00, 'img/iphone14.jpg'),
('Xiaomi Redmi Note 12', 'Gran relación calidad-precio', 629.00, 'img/redmi.jpg');
