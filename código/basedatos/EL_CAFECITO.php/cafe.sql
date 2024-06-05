create database cafe;
use cafe;
CREATE TABLE IF NOT EXISTS CategoriaProductos (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre_categoria VARCHAR(100) NOT NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES CategoriaProductos(id_categoria)
) ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS Clientes (
  id_cliente INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  email VARCHAR(255) UNIQUE,
  direccion VARCHAR(255),
  codigo_postal VARCHAR(20),
  ciudad VARCHAR(100),
  telefono VARCHAR(20),
  contraseña VARCHAR(255) NOT NULL
  ) ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS Pedidos (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	total DECIMAL(10, 2) NOT NULL,
    direccion_entrega VARCHAR(255) NOT NULL,
    codigo_postal_entrega VARCHAR(20),
    ciudad_entrega VARCHAR(100),
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente)
    
   
) ENGINE=INNODB;


INSERT INTO CategoriaProductos (nombre_categoria) VALUES
('Café en grano'),
('Café molido'),
('Café descafeinado'),
('Accesorios para café');

INSERT INTO Productos (titulo, descripcion, precio, stock, id_categoria) VALUES
('Café Colombia', 'Café colombiano de alta calidad', 10.99, 100, 1),
('Café Etiopía', 'Café etíope con notas frutales y florales', 12.50, 75, 1),
('Café Brasil', 'Café brasileño con cuerpo medio y sabor dulce', 9.75, 120, 1),
('Café Descafeinado Mexico', 'Café  con cuerpo y acidez balanceados', 10.25, 90, 1),
('Café Guatemala', 'Café guatemalteco con cuerpo y acidez balanceados', 11.25, 90, 1);


INSERT INTO Clientes 
(nombre, apellido, email, direccion, codigo_postal, ciudad, telefono, contraseña) 
VALUES 
('Ana', 'Martínez', 'ana@gmail.com', 'Avenida Principal 789', '678028199', 'MADRID', '111-222-3333', '1234'),
('Pedro', 'López', 'pedro@gmail.com', 'Calle Secundaria 234', '678028745', 'BARCELONA', '444-555-6666', '1235'),
('Laura', 'Sánchez', 'laura@gmail.com', 'Calle Principal 567', '678032567', 'GRANADA', '777-888-9999', '1236'),
('Carlos', 'Gómez', 'carlos@hotmail.com', 'Avenida Secundaria 890', '678025879', 'TERUEL', '101-121-3141', '1237'),
('Sofía', 'Rodríguez', 'sofia@hotmail.com', 'Calle Principal 901', '678025989', 'VALENCIA', '131-415-1617', '1238');


INSERT INTO Pedidos 
(id_cliente, total, direccion_entrega, codigo_postal_entrega, ciudad_entrega) 
VALUES 
(1, 120.50, 'Avenida Principal 789', '111-222-3333', 'MADRID'),
(2, 200.00,'Calle Secundaria 234', '678028745', 'BARCELONA' ),
(3, 150.75,'Calle Principal 901', '678025989', 'VALENCIA');


