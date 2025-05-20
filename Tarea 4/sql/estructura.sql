CREATE DATABASE lista_tareas;

USE lista_tareas;

CREATE TABLE roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL
);

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL UNIQUE,
  contrasena VARCHAR(255) NOT NULL,
  rol_id INT,
  FOREIGN KEY (rol_id) REFERENCES roles(id)
);

CREATE TABLE tareas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  descripcion TEXT NOT NULL,
  completada BOOLEAN DEFAULT FALSE,
  usuario_id INT,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

INSERT INTO roles (nombre) VALUES ('admin'), ('usuario');