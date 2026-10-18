CREATE DATABASE IF NOT EXISTS inventario
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE inventario;

CREATE TABLE proveedor (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nit VARCHAR(20) NOT NULL UNIQUE,
  nombre VARCHAR(150) NOT NULL,
  direccion VARCHAR(200) NOT NULL,
  telefono VARCHAR(20) NOT NULL,
  correo VARCHAR(100) NOT NULL
);

CREATE TABLE producto (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(150) NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  id_proveedor INT NOT NULL,
  FOREIGN KEY (id_proveedor) REFERENCES proveedor(id)
    ON DELETE RESTRICT ON UPDATE CASCADE
);

INSERT INTO proveedor (nit, nombre, direccion, telefono, correo) VALUES
('900123456-1', 'Distribuidora ABC', 'Calle 10 #15-20', '3001234567', 'abc@distribuidora.com'),
('800987654-2', 'Comercial XYZ', 'Carrera 5 #8-12', '3109876543', 'xyz@comercial.com');

INSERT INTO producto (nombre, precio, id_proveedor) VALUES
('Cuaderno 100 hojas', 8500.00, 1),
('Lapiz HB', 1200.00, 1),
('Resma de papel', 24500.00, 2);
