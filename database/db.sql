CREATE DATABASE IF NOT EXISTS forum;
-- Usar la base de datos
USE forum;

-- Crear tabla para almacenar los contactos
CREATE TABLE IF NOT EXISTS contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(50),
    tipo_evento VARCHAR(50) NOT NULL,
    fecha DATE,
    comentario TEXT NOT NULL,
    fecha_registro DATETIME NOT NULL,
    estado VARCHAR(20) DEFAULT 'pendiente'
);