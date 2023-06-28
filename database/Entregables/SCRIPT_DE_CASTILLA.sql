DROP DATABASE IF EXISTS db_reposteria_de_castilla;
CREATE DATABASE IF NOT EXISTS db_reposteria_de_castilla;
USE db_reposteria_de_castilla;

DROP USER IF EXISTS Administrador;
CREATE USER Administrador IDENTIFIED BY '12345678';

DROP USER IF EXISTS Empleado;
CREATE USER Empleado IDENTIFIED BY '12345678';

DROP USER IF EXISTS Cliente;
CREATE USER Cliente IDENTIFIED BY '12345678';

GRANT ALL PRIVILEGES ON db_reposteria_de_castilla.* TO Administrador;

GRANT SELECT, INSERT ON db_reposteria_de_castilla.* TO Empleado;

GRANT SELECT ON db_reposteria_de_castilla.* TO Cliente;


CREATE TABLE IF NOT EXISTS Permiso (
  id_Permiso INT NOT NULL AUTO_INCREMENT,
  descripcion_Permiso VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_Permiso)
  );
  
CREATE TABLE IF NOT EXISTS Sabor (
  id_Sabor INT NOT NULL AUTO_INCREMENT,
  nombre_Sabor VARCHAR(45) NOT NULL,
  PRIMARY KEY (id_Sabor)
  );

CREATE TABLE IF NOT EXISTS Categoria (
  id_Categoria INT NOT NULL AUTO_INCREMENT,
  nombre_Categoria VARCHAR(15) NOT NULL,
  descripcion_Categoria VARCHAR(300) NOT NULL,
  PRIMARY KEY (id_Categoria)
  );
  
CREATE TABLE IF NOT EXISTS Proveedor (
  id_Proveedor INT NOT NULL AUTO_INCREMENT,
  estado_Proveedor TINYINT NOT NULL,
  empresa_Proveedor VARCHAR(35) NOT NULL,
  nombre_Proveedor VARCHAR(50) NOT NULL,
  correo_Proveedor VARCHAR(45) NOT NULL,
  nit_Proveedor VARCHAR(10) NOT NULL,
  celular_Proveedor BIGINT NOT NULL,
  celular_respaldo_Proveedor BIGINT,
  PRIMARY KEY (id_Proveedor)
  );

CREATE TABLE IF NOT EXISTS Rol (
  id_Rol INT NOT NULL AUTO_INCREMENT,
  nombre_Rol VARCHAR(15) NOT NULL,
  PRIMARY KEY (id_Rol)
  );

CREATE TABLE IF NOT EXISTS tipoMovimiento (
  id_tipoMovimiento INT NOT NULL AUTO_INCREMENT,
  nombre_tipoMovimiento VARCHAR(15) NOT NULL,
  PRIMARY KEY (id_tipoMovimiento)
  );

CREATE TABLE IF NOT EXISTS Estado(
  id_Estado INT NOT NULL AUTO_INCREMENT,
  nombre_Estado VARCHAR(15) NOT NULL,
  PRIMARY KEY (id_Estado)
  );

CREATE TABLE IF NOT EXISTS Insumo (
  id_Insumo INT NOT NULL AUTO_INCREMENT,
  nombre_Insumo VARCHAR(25) NOT NULL,
  id_Estado_FK INT NOT NULL,
  PRIMARY KEY (id_Insumo),
  FOREIGN KEY (id_Estado_FK) REFERENCES Estado (id_Estado)
  );

CREATE TABLE IF NOT EXISTS Producto (
  id_Producto INT NOT NULL AUTO_INCREMENT,
  nombre_Producto VARCHAR(50) NOT NULL,
  precio_Producto INT NOT NULL,
  imagen_Producto VARCHAR(100) NOT NULL,
  id_Categoria_FK INT NOT NULL,
  PRIMARY KEY (id_Producto),
  FOREIGN KEY (id_Categoria_FK) REFERENCES Categoria (id_Categoria)
  );
  
CREATE TABLE IF NOT EXISTS Inventario (
  id_Inventario INT NOT NULL AUTO_INCREMENT,
  stock_Inventario INT NOT NULL,
  tipo_Inventario VARCHAR(10) NOT NULL,
  id_Insumo_FK INT,
  id_Producto_FK INT,
  PRIMARY KEY (id_Inventario),
  FOREIGN KEY (id_Insumo_FK) REFERENCES Insumo (id_Insumo),
  FOREIGN KEY (id_Producto_FK) REFERENCES Producto (id_Producto)
  );

CREATE TABLE IF NOT EXISTS Rol_has_Permiso (
  id_Rol_FK INT NOT NULL AUTO_INCREMENT,
  id_Permiso_FK INT NOT NULL,
  FOREIGN KEY (id_Rol_FK) REFERENCES Rol (id_Rol),
  FOREIGN KEY (id_Permiso_FK) REFERENCES Permiso (id_Permiso)
  );
  
  CREATE TABLE IF NOT EXISTS Usuario (
  noDocumento_Usuario BIGINT NOT NULL,
  email VARCHAR(45) NOT NULL,
  password VARCHAR(100) NOT NULL,
  celular_Usuario BIGINT NOT NULL,
  nombre_Usuario VARCHAR(24) NOT NULL,
  apellido_Usuario VARCHAR(35) NOT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  id_Rol_FK INT NOT NULL,
  PRIMARY KEY (noDocumento_Usuario),
  FOREIGN KEY (id_Rol_FK) REFERENCES Rol (id_Rol)
  );
  
  CREATE TABLE IF NOT EXISTS EstadoPedido(
  id_EstadoPedido INT NOT NULL AUTO_INCREMENT,
  nombre_EstadoPedido VARCHAR(15) NOT NULL,
  PRIMARY KEY (id_EstadoPedido)
  );
  
  CREATE TABLE IF NOT EXISTS Pedido (
  id_Pedido INT NOT NULL AUTO_INCREMENT,
  descripcion_Pedido VARCHAR(200) NULL,
  fecha_Pedido DATETIME,
  id_EstadoPedido_FK INT NOT NULL,
  noDocumento_Usuario_FK BIGINT NOT NULL,
  PRIMARY KEY (id_Pedido),
  FOREIGN KEY (noDocumento_Usuario_FK) REFERENCES Usuario(noDocumento_Usuario),
  FOREIGN KEY (id_EstadoPedido_FK) REFERENCES EstadoPedido(id_EstadoPedido)
  );

CREATE TABLE IF NOT EXISTS Calificacion(
  id_Calificacion INT NOT NULL AUTO_INCREMENT,
  estrellas_Calificacion INT NOT NULL,
  comentario_Calificacion VARCHAR(100),
  id_Proveedor_FK INT,
  id_Pedido_FK INT,
  PRIMARY KEY (id_Calificacion),
  FOREIGN KEY (id_Proveedor_FK) REFERENCES Proveedor (id_Proveedor),
  FOREIGN KEY (id_Pedido_FK) REFERENCES Pedido (id_Pedido)
  );

CREATE TABLE IF NOT EXISTS EstadoOrdenCompra(
  id_EstadoOrdenCompra INT NOT NULL AUTO_INCREMENT,
  nombre_EstadoOrdenCompra VARCHAR(15) NOT NULL,
  PRIMARY KEY (id_EstadoOrdenCompra)
  );

CREATE TABLE IF NOT EXISTS OrdenCompra (
  id_OrdenCompra INT NOT NULL AUTO_INCREMENT,
  fecha_OrdenCompra DATETIME NOT NULL,
  hora_OrdenCompra TIME NOT NULL,
  id_EstadoOrdenCompra_FK INT NOT NULL,
  PRIMARY KEY (id_OrdenCompra),
  FOREIGN KEY (id_EstadoOrdenCompra_FK) REFERENCES EstadoOrdenCompra(id_EstadoOrdenCompra)
  );

CREATE TABLE IF NOT EXISTS DetalleOC (
  id_DetalleOC INT NOT NULL AUTO_INCREMENT,
  cantidadInsumo_OC INT NOT NULL,
  id_Insumo_FK INT NOT NULL,
  id_OrdenCompra_FK INT NOT NULL,
  PRIMARY KEY (id_DetalleOC),
  FOREIGN KEY (id_Insumo_FK) REFERENCES Insumo(id_Insumo),
  FOREIGN KEY (id_OrdenCompra_FK) REFERENCES OrdenCompra(id_OrdenCompra)
  );
  
CREATE TABLE IF NOT EXISTS Historico (
  id_H INT NOT NULL AUTO_INCREMENT,
  fechaMovimiento_H DATETIME NOT NULL,
  fechaCaducidad_H DATETIME,
  cantidad_H INT NOT NULL,
  tipo_Historico VARCHAR(10) NOT NULL,
  id_Insumo_FK INT,
  id_Producto_FK INT,
  id_tipoMovimiento_FK INT,
  PRIMARY KEY (id_H),
  FOREIGN KEY (id_Insumo_FK) REFERENCES Insumo (id_Insumo),
  FOREIGN KEY (id_Producto_FK) REFERENCES Producto (id_Producto),
  FOREIGN KEY (id_tipoMovimiento_FK)REFERENCES tipoMovimiento (id_tipoMovimiento)
  );  

CREATE TABLE IF NOT EXISTS Venta (
  id_Venta INT NOT NULL AUTO_INCREMENT,
  fecha_Venta DATE NOT NULL,
  hora_venta TIME NOT NULL,
  total_Venta INT NOT NULL,
  id_Pedido_FK INT,
  noDocumento_Usuario_FK BIGINT NOT NULL,
  PRIMARY KEY (id_Venta),
  FOREIGN KEY (id_Pedido_FK)REFERENCES Pedido (id_Pedido),
  FOREIGN KEY (noDocumento_Usuario_FK)REFERENCES Usuario (noDocumento_Usuario)
  );
  
CREATE TABLE IF NOT EXISTS Insumo_has_Proveedor (
  id_Insumo_FK INT NOT NULL AUTO_INCREMENT,
  id_Proveedor_FK INT NOT NULL,
  FOREIGN KEY (id_Insumo_FK) REFERENCES Insumo (id_Insumo),
  FOREIGN KEY (id_Proveedor_FK) REFERENCES Proveedor (id_Proveedor)
  );

CREATE TABLE IF NOT EXISTS DetalleVenta (
  id_DetalleVenta INT NOT NULL AUTO_INCREMENT,
  cantidad_producto INT NOT NULL,
  subtotal_DetalleVenta INT NOT NULL,
  id_Producto_FK INT NOT NULL,
  id_Venta_FK INT NOT NULL,
  PRIMARY KEY (id_DetalleVenta),
  FOREIGN KEY (id_Producto_FK) REFERENCES Producto (id_Producto),
  FOREIGN KEY (id_Venta_FK) REFERENCES Venta (id_Venta)
  );

CREATE TABLE IF NOT EXISTS Sabor_has_Producto (
  id_Sabor_FK INT NOT NULL AUTO_INCREMENT,
  id_Producto_FK INT NOT NULL,
  FOREIGN KEY (id_Sabor_FK) REFERENCES Sabor (id_Sabor),
  FOREIGN KEY (id_Producto_FK) REFERENCES Producto (id_Producto)
  );
  
    CREATE TABLE IF NOT EXISTS DetallePedido (
  id_DetallePedido INT NOT NULL AUTO_INCREMENT,
  cantidad_producto INT NOT NULL,
  subtotal_DetallePedido INT NOT NULL,
  id_Producto_FK INT NOT NULL,
  id_Venta_FK INT NOT NULL,
  id_EstadoPedido_FK INT NOT NULL,
  PRIMARY KEY (id_DetallePedido),
  FOREIGN KEY (id_Producto_FK) REFERENCES Producto (id_Producto),
  FOREIGN KEY (id_Venta_FK) REFERENCES Venta (id_Venta),
  FOREIGN KEY (id_EstadoPedido_FK) REFERENCES EstadoPedido(id_EstadoPedido)
  );
  
  
ALTER TABLE Permiso ADD estado INT DEFAULT 1;
ALTER TABLE Sabor ADD estado INT DEFAULT 1;
ALTER TABLE Categoria ADD estado INT DEFAULT 1;
ALTER TABLE Proveedor ADD estado INT DEFAULT 1;
ALTER TABLE Rol ADD estado INT DEFAULT 1;
ALTER TABLE tipoMovimiento ADD estado INT DEFAULT 1;
ALTER TABLE Estado ADD estado INT DEFAULT 1;
ALTER TABLE Insumo ADD estado INT DEFAULT 1;
ALTER TABLE Producto ADD estado INT DEFAULT 1;
ALTER TABLE Inventario ADD estado INT DEFAULT 1;
ALTER TABLE Rol_has_Permiso ADD estado INT DEFAULT 1;
ALTER TABLE Usuario ADD estado INT DEFAULT 1;
ALTER TABLE EstadoPedido ADD estado INT DEFAULT 1;
ALTER TABLE Pedido ADD estado INT DEFAULT 1;
ALTER TABLE Calificacion ADD estado INT DEFAULT 1;
ALTER TABLE EstadoOrdenCompra ADD estado INT DEFAULT 1;
ALTER TABLE OrdenCompra ADD estado INT DEFAULT 1;
ALTER TABLE DetalleOC ADD estado INT DEFAULT 1;
ALTER TABLE Historico ADD estado INT DEFAULT 1;
ALTER TABLE Venta ADD estado INT DEFAULT 1;
ALTER TABLE Insumo_has_Proveedor ADD estado INT DEFAULT 1;
ALTER TABLE DetalleVenta ADD estado INT DEFAULT 1;
ALTER TABLE DetallePedido ADD estado INT DEFAULT 1;
ALTER TABLE Sabor_has_Producto ADD estado INT DEFAULT 1;
/*_______________________________________________________________________________________________________________________________________________________
																TRIGGERS
_________________________________________________________________________________________________________________________________________________________*/

/*---Agregar registro tabla inventario  por cada insert en tabla insumo ---*/
DELIMITER $$
CREATE TRIGGER TG_agregarInsumo_AI AFTER INSERT ON Insumo
FOR EACH ROW
BEGIN
	insert into inventario(stock_Inventario, id_Insumo_FK, tipo_Inventario) values (0,new.id_insumo,"INSUMO");
    INSERT INTO historico
    (fechaMovimiento_H, cantidad_H, id_insumo_FK, id_tipoMovimiento_FK, tipo_Historico) 
    VALUES 
    (now(), 0, NEW.id_insumo, 2, "INSUMO");
END$$
DELIMITER ;
    
/*---Agregar registro tabla inventario  por cada insert en tabla producto ---*/
DELIMITER $$
create trigger TG_agregarProducto_AI after insert on producto 
for each row 
BEGIN
	insert into inventario(stock_Inventario, id_Producto_FK, tipo_Inventario) values (0,new.id_producto,"PRODUCTO");
    INSERT INTO historico
    (fechaMovimiento_H, cantidad_H, id_Producto_FK, id_tipoMovimiento_FK, tipo_Historico) 
    VALUES 
    (now(), 0, NEW.id_producto, 2, "PRODUCTO");
END$$
DELIMITER ;
    
/*---Actualizar tabla inventario por cada insert en tabla Historico ---*/
DELIMITER $$
CREATE TRIGGER TG_SetStock_AI AFTER INSERT ON Historico
FOR EACH ROW
BEGIN
    -- Actualizar stock 
    IF (NEW.id_tipoMovimiento_FK = 1) THEN
        IF (NEW.tipo_Historico = "PRODUCTO") THEN
            UPDATE Inventario SET 
                stock_Inventario = stock_Inventario + NEW.cantidad_H 
            WHERE id_Producto_FK = NEW.id_Producto_FK;
        ELSEIF (NEW.tipo_Historico = "INSUMO") THEN
            UPDATE Inventario SET 
                stock_Inventario = stock_Inventario + NEW.cantidad_H 
            WHERE id_Insumo_FK = NEW.id_Insumo_FK;
        END IF;
    ELSEIF (NEW.id_tipoMovimiento_FK = 2) THEN
        IF (NEW.tipo_Historico = "PRODUCTO") THEN
            UPDATE Inventario SET 
                stock_Inventario = stock_Inventario - NEW.cantidad_H 
            WHERE id_Producto_FK = NEW.id_Producto_FK;
        ELSEIF (NEW.tipo_Historico = "INSUMO") THEN
            UPDATE Inventario SET 
                stock_Inventario = stock_Inventario - NEW.cantidad_H 
            WHERE id_Insumo_FK = NEW.id_Insumo_FK;
        END IF;
    END IF;
END$$

/*---Actualizar tabla historico por cada insert en la tabla detalle de venta---*/
DELIMITER $$
CREATE TRIGGER TG_registroVenta_AI AFTER INSERT ON detalleventa
FOR EACH ROW
BEGIN
	INSERT INTO historico
    (fechaMovimiento_H, cantidad_H, id_Producto_FK, id_tipoMovimiento_FK, tipo_Historico) 
    VALUES 
    (now(), NEW.cantidad_producto, NEW.id_producto_FK, 2, "PRODUCTO");
    
END$$
DELIMITER ;  

/*---Agregar Calificación por defecto al proveedor cuando se cree uno nuevo --*/
DELIMITER $$
CREATE TRIGGER TG_calificacionProveedor_AI AFTER INSERT ON Proveedor
FOR EACH ROW
BEGIN
	INSERT INTO Calificacion
    (estrellas_Calificacion, id_Proveedor_FK) 
    VALUES 
    (5, new.id_Proveedor);
END$$
DELIMITER ;  

  
/*_______________________________________________________________________________________________________________________________________________________
															PROCEDIMIENTOS DE ALMACENADO 
_________________________________________________________________________________________________________________________________________________________*/

/*--Permite consultar cuales son los productos(nombres) de una categoria, 
si se pone solo '' mostrara los productos de todas las categorias--*/

DELIMITER $$
CREATE PROCEDURE SPobtenerProductosCategoria(IN miCategoria VARCHAR(255))
BEGIN
	SELECT nombre_Categoria AS CATEGORIA, nombre_Producto AS PRODUCTO from categoria
    RIGHT JOIN producto
    ON categoria.id_Categoria = producto.id_Categoria_FK
    WHERE nombre_Categoria LIKE CONCAT('%', miCategoria, '%');
END$$
DELIMITER ;

# CALL SPobtenerProductosCategoria('helados');
# CALL SPobtenerProductosCategoria('');


/*--Permite consultar cuales son los productos(nombres) de un sabor, 
si se pone solo '' mostrara los productos de todos los sabores--*/

DELIMITER $$
CREATE PROCEDURE SPobtenerProductosSabor(IN miSabor VARCHAR(255))
BEGIN
	SELECT nombre_Sabor AS Sabor, nombre_Producto AS PRODUCTO from Sabor
    RIGHT JOIN producto
    ON Sabor.id_Sabor = producto.id_Categoria_FK
    WHERE nombre_Sabor LIKE CONCAT('%', miSabor, '%');
END$$
DELIMITER ;

# CALL SPobtenerProductosSabor('');
# CALL SPobtenerProductosSabor('Fresa');


/*--Permite consultar cuales son los permisos y rol de un usuario buscando por níºmero de documento, 
nombre, apellido, si se pone solo '' mostrara los permisos y roles de todos los usuarios--*/

DELIMITER $$
CREATE PROCEDURE SProlesPermisosUsuario(IN datoUsuario VARCHAR(255))
BEGIN
	SELECT noDocumento_Usuario AS DOCUMENTO, CONCAT(nombre_Usuario, ' ', apellido_Usuario) 
    AS NOMBRE, nombre_Rol AS ROL, descripcion_Permiso AS PERMISO
	FROM usuario 
		INNER JOIN rol ON usuario.id_Rol_FK = rol.id_Rol
		INNER JOIN rol_has_permiso ON rol.id_Rol = rol_has_permiso.id_Rol_FK
		INNER JOIN permiso ON rol_has_permiso.id_Permiso_FK = permiso.id_Permiso
		WHERE noDocumento_Usuario LIKE CONCAT('%', datoUsuario, '%')
        OR nombre_Usuario LIKE CONCAT('%', datoUsuario, '%')
        OR apellido_Usuario LIKE CONCAT('%', datoUsuario, '%');        
END$$
DELIMITER ;

# CALL SProlesPermisosUsuario('');
# CALL SProlesPermisosUsuario('1234567893');
# CALL SProlesPermisosUsuario('Isabella Maria');

/*_______________________________________________________________________________________________________________________________________________________
															VIEWS 
_________________________________________________________________________________________________________________________________________________________*/
/*-----------Inventario de insumo-----------*/
CREATE VIEW VW_INVENTARIO_INSUMO AS
	SELECT Inventario.id_Insumo_FK AS ID, 
		Insumo.nombre_Insumo AS INSUMO, 
		SUM(IF(Historico.id_tipoMovimiento_FK = 1, Historico.cantidad_H, 0)) AS ENTRADAS, 
        SUM(IF(Historico.id_tipoMovimiento_FK = 2, Historico.cantidad_H, 0)) AS SALIDAS, 
        Inventario.stock_Inventario AS STOCK
	FROM Inventario
	INNER JOIN Insumo ON Inventario.id_Insumo_FK = Insumo.id_Insumo
	INNER JOIN Historico ON Inventario.id_Insumo_FK = Historico.id_Insumo_FK
    WHERE Insumo.estado = 1
	GROUP BY Inventario.id_Insumo_FK, Insumo.nombre_Insumo, Inventario.stock_Inventario;
  /*-Los GROUP BY son necesarios para que la consulta funcione porque utilizamos sum() junto con columnas 
  con registros independientes-*/

  -- SELECT * FROM VW_INVENTARIO_INSUMO;
  
  /*-----------Inventario de producto-----------*/
CREATE VIEW VW_INVENTARIO_PRODUCTO AS
	SELECT Inventario.id_Producto_FK AS ID, 
		Producto.nombre_Producto AS PRODUCTO, 
		SUM(IF(Historico.id_tipoMovimiento_FK = 1, Historico.cantidad_H, 0)) AS ENTRADAS, 
        SUM(IF(Historico.id_tipoMovimiento_FK = 2, Historico.cantidad_H, 0)) AS SALIDAS, 
        Inventario.stock_Inventario AS STOCK
	FROM Inventario
	INNER JOIN Producto ON Inventario.id_Producto_FK = Producto.id_Producto
	INNER JOIN Historico ON Inventario.id_Producto_FK = Historico.id_Producto_FK
    WHERE Producto.estado = 1
	GROUP BY Inventario.id_Producto_FK, Producto.nombre_Producto, Inventario.stock_Inventario;
  /*-Los GROUP BY son necesarios para que la consulta funcione porque utilizamos sum() junto con columnas 
  con registros independientes-*/

  -- SELECT * FROM VW_INVENTARIO_PRODUCTO;


/*--------Pedidos No finalizados-------*/
CREATE VIEW VW_PEDIDOS_NO_FINALIZADOS AS
	SELECT id_Pedido AS ID_PEDIDO,  descripcion_Pedido AS DESCRIPCION , fecha_Pedido AS FECHA, 
  nombre_EstadoPedido AS ESTADO, noDocumento_Usuario AS DOC_USUARIO, celular_Usuario AS CELULAR, 
  CONCAT(nombre_Usuario, ' ', apellido_Usuario) AS CLIENTE
		FROM pedido
		INNER JOIN EstadoPedido ON pedido.id_EstadoPedido_FK = estadopedido.id_EstadoPedido
		INNER JOIN usuario ON Pedido.noDocumento_Usuario_FK = usuario.noDocumento_Usuario
		WHERE nombre_EstadoPedido != "Finalizados"
		AND nombre_EstadoPedido !="Cancelado"
        AND pedido.estado = 1
		ORDER BY fecha_Pedido ASC;

-- SELECT * FROM VW_PEDIDOS_NO_FINALIZADOS;

/*--------Pedidos No finalizados-------*/
CREATE VIEW VW_PEDIDOS_FINALIZADOS AS
	SELECT id_Pedido AS ID_PEDIDO,  descripcion_Pedido AS DESCRIPCION , fecha_Pedido AS FECHA, 
  nombre_EstadoPedido AS ESTADO,     noDocumento_Usuario AS DOC_USUARIO, celular_Usuario AS CELULAR, 
  CONCAT(nombre_Usuario, ' ', apellido_Usuario) AS CLIENTE
		FROM pedido
		INNER JOIN EstadoPedido ON pedido.id_EstadoPedido_FK = estadopedido.id_EstadoPedido
		INNER JOIN usuario ON Pedido.noDocumento_Usuario_FK = usuario.noDocumento_Usuario
		WHERE nombre_EstadoPedido = "Finalizados"
		OR nombre_EstadoPedido ="Cancelado"
        AND pedido.estado = 1
		ORDER BY fecha_Pedido ASC;

-- SELECT * FROM VW_PEDIDOS_FINALIZADOS;

/*------Listado de los proveedores con promedio de calificación-------*/
CREATE VIEW VW_provedoresCalificacionAVG AS 
  SELECT proveedor.id_proveedor, proveedor.empresa_proveedor, AVG(calificacion.estrellas_calificacion) as promedio_calificacion
    FROM proveedor
    INNER JOIN calificacion on proveedor.id_proveedor = calificacion.id_proveedor_FK
    WHERE proveedor.estado = 1
    GROUP BY proveedor.id_proveedor;

-- SELECT * FROM VW_provedoresCalificacionAVG;

/*------Listado de ventas con su total y vendedor que la realizó-------*/
CREATE VIEW VW_DATOSVENTA AS 
  SELECT venta.id_Venta AS ID, venta.fecha_Venta AS FECHA, venta.hora_Venta AS HORA, 
  total_Venta AS TOTAL, CONCAT(usuario.nombre_Usuario, ' ', usuario.apellido_Usuario) as VENDEDOR
    FROM venta
    INNER JOIN usuario on venta.noDocumento_Usuario_FK = usuario.noDocumento_Usuario;
-- SELECT * FROM VW_DATOSVENTA;





/*-------------------------------------------------------------------------Desde aquí­ empiezan los registros-------------------------------------------------------------- */

INSERT INTO Permiso (id_Permiso, descripcion_Permiso) VALUES
  (1, 'Crear usuario'),
  (2, 'Eliminar usuario'),
  (3, 'Editar usuario'),
  (4, 'Ver usuarios'),
  (5, 'Crear rol'),
  (6, 'Eliminar rol'),
  (7, 'Editar rol'),
  (8, 'Ver roles'),
  (9, 'Crear producto'),
  (10, 'Eliminar producto'),
  (11, 'Modificar producto'),
  (12, 'Ver productos'),
  (13, 'Crear cliente'),
  (14, 'Eliminar cliente'),
  (15, 'Editar cliente'),
  (16, 'Ver clientes'),
  (17, 'Crear pedido'),
  (18, 'Eliminar pedido'),
  (19, 'Editar pedido'),
  (20, 'Ver pedidos'),
  (21, 'Gestionar proveedores'),
  (22, 'Generar reportes'),
  (23, 'Gestionar inventario de insumos'),
  (24, 'Gestionar inventario de productos'),
  (25, 'Realizar ventas'),
  (26, 'Gestionar pedidos'),
  (27, 'Gestionar empleados'),
  (28, 'Gestionar clientes'),
  (29, 'Gestionar roles de usuario'),
  (30, 'Gestionar permisos'),
  (31, 'Aprobar pedidos'),
  (32, 'Cancelar pedidos'),
  (33, 'Gestionar calificaciones de proveedores'),
  (34, 'Gestionar calificaciones de pedidos'),
  (35, 'Crear categorí­a'),
  (36, 'Eliminar categorí­a'),
  (37, 'Editar categorí­a'),
  (38, 'Ver categorí­as'),
  (39, 'Gestionar inventario de productos'),
  (40, 'Gestionar inventario de insumos');

INSERT INTO Sabor (nombre_Sabor) VALUES
  ('Vainilla'),
  ('Chocolate'),
  ('Fresa'),
  ('Caramelo'),
  ('Limón'),
  ('Cafí©'),
  ('Naranja'),
  ('Menta'),
  ('Maracuya'),
  ('Mora');

INSERT INTO Categoria (id_Categoria, nombre_Categoria, descripcion_Categoria) VALUES
  (1, 'Obleas', 'Las obleas son pequeñas delicias crujientes, ideales para disfrutar en cualquier momento del dí­a. Ofrecemos una amplia selección de obleas  con diferentes ingredientes y sabores.'),
  (2, 'Cupcakes', 'Los cupcakes son pequeños pasteles individuales que se decoran con creatividad. Nuestra colección de cupcakes incluye sabores clásicos y combinaciones íºnicas que te encantarán.'),
  (3, 'Malteadas', 'En nuestra panaderí­a encontrarás una variedad de panes frescos y deliciosos, desde panes blancos y integrales hasta baguettes y bollos dulces.'),
  (4, 'Postres', 'La categorí­a de postres ofrece una selección de dulces exquisitos que te deleitarán. Desde mousses y flanes hasta postres con frutas frescas, aquí­ encontrarás algo para satisfacer tu antojo.'),
  (5, 'Tortas', 'Nuestras tartas son autí©nticas obras maestras de la reposterí­a. Disponemos de tartas clásicas como la de manzana y la de chocolate, así­ como creaciones íºnicas que te sorprenderán.'),
  (6, 'Dulces', 'Esta categorí­a está llena de dulces irresistibles, desde caramelos y chicles hasta chocolates y bombones. Si tienes un diente dulce, esta es la categorí­a perfecta para ti.'),
  (7, 'Bebidas', 'Acompaña tus postres con nuestras refrescantes bebidas. Ofrecemos una variedad de opciones, como batidos, jugos naturales y cafí©, para complementar tus delicias.'),
  (8, 'Helados', 'Nuestros helados son suaves, cremosos y están disponibles en una amplia gama de sabores. Ya sea que prefieras los clásicos como la vainilla y el chocolate, o sabores más extravagantes, aquí­ encontrarás el helado perfecto para ti.'),
  (9, 'Cheesecake', 'El cheesecake es un postre de queso cremoso y consistencia suave que se sirve sobre una base de galleta. Nuestros cheesecakes son simplemente deliciosos y están disponibles en una variedad de sabores y presentaciones.'),
  (10,'waffles','waffles son crujientes por fuera y esponjosos por dentro, cubiertos con sabrosos toppings que van desde frutas frescas y crema batida hasta siropes dulces y indulgentes.');

INSERT INTO Proveedor (id_Proveedor, estado_Proveedor, empresa_Proveedor, nombre_Proveedor, correo_Proveedor, nit_Proveedor, celular_Proveedor, celular_respaldo_Proveedor) VALUES
  (1, 1, 'La carreta', 'Felipe Rodriguez', 'proveedora@example.com', '1234567890', 1234567890, NULL),
  (2, 1, 'Cream helado', 'Juan Junco', 'proveedorb@example.com', '0987654321', 9876543210, NULL),
  (3, 1, 'Alqueria', 'Bryan Mutis', 'proveedorc@example.com', '9876543210', 5678901234, NULL),
  (4, 1, 'Santillana', 'Camila Arias', 'proveedord@example.com', '5432109876', 4567890123, NULL),
  (5, 1, 'Oliverios', 'Marí­a Pardo', 'proveedore@example.com', '0123456789', 7890123456, NULL),
  (6, 1, 'Colombina', 'Daniel Girón', 'proveedorf@example.com', '6789012345', 2345678901, NULL),
  (7, 1, 'Obleas S.A', 'Cristian Beltran', 'proveedorg@example.com', '4567890123', 9012345678, NULL),
  (8, 1, 'Alpina', 'Kevin Calderon', 'proveedorh@example.com', '2345678901', 3456789012, NULL),
  (9, 1, 'Agrocampo ', 'Brayan Sanchez', 'proveedori@example.com', '9012345678', 6789012345, NULL),
  (10, 1, 'D1', 'Yeison Suarez', 'proveedorj@example.com', '7654321098', 0123456789, NULL);

INSERT INTO Rol (id_Rol, nombre_Rol) VALUES
  (1, 'Administrador'),
  (2, 'Usuario'),
  (3, 'Empleado');

INSERT INTO tipoMovimiento (nombre_tipoMovimiento) VALUES
  ('Entrada'),
  ('Salida');

INSERT INTO Estado (id_Estado, nombre_Estado) VALUES
  (1, 'No Caducado'),
  (2, 'Caducado');

INSERT INTO Insumo (id_Insumo, nombre_Insumo, id_Estado_FK) VALUES
  (1, 'Harina', 1),
  (2, 'Azíºcar', 1),
  (3, 'Mantequilla', 1),
  (4, 'Huevos', 1),
  (5, 'Leche', 1),
  (6, 'Vainilla', 1),
  (7, 'Helado', 1),
  (8, 'Fresas', 1),
  (9, 'Crema', 1),
  (10, 'Gelatina', 1),
  (11, 'Nueces', 1),
  (12, 'Canela', 1),
  (13, 'Arequipe', 1),
  (14, 'Levadura', 1),
  (15, 'Chips de Chocolate', 1),
  (16, 'oblea', 1),
  (17, 'Coco rallado', 1),
  (18, 'Galletas', 1),
  (19, 'Cafí© molido', 1),
  (20, 'Almendras', 2);

INSERT INTO Producto (nombre_Producto, precio_Producto, imagen_Producto, id_Categoria_FK) VALUES 
  ('Oblea especial', 4500, 'imagen1.jpg', 1),
  ('Oblea con adicional', 3000, 'imagen2.jpg', 1),
  ('Oblea sencilla', 2000, 'imagen3.jpg', 1),
  ('Cupcake', 6000, 'imagen4.jpg', 2),
  ('Malteada grande', 15000, 'imagen5.jpg', 3),
  ('Malteada mediana', 12000, 'imagen5.jpg', 3),
  ('Cheesecake', 6000, 'imagen6.jpg', 4),
  ('Tres leches', 6000, 'imagen7.jpg', 4),
  ('bandeja tres leches', 50000,'imagen8.jpg',4),
  ('Merengon', 10000, 'imagen8.jpg', 4),
  ('Torta de zanahoria', 4000, 'imagen9.jpg', 5),
  ('Capuchino', 25000, 'imagen13.jpg', 7),
  ('Tinto', 1500, 'imagen14.jpg', 7),
  ('Mocaccino', 2500, 'imagen15.jpg', 7),
  ('Helado sencillo', 2500, 'imagen16.jpg', 8),
  ('Helado doble', 4500, 'imagen17.jpg', 8),
  ('Helado triple', 6500, 'imagen18.jpg', 8),
  ('Torta desemilla de amapola y naranja','4000', 'imagen18.jpg',5),
  ('Torta de agras', '5000','imagen18.jpg',5),
  ('Torta de chocolate', '4000','imagen18.jpg',5),
  ('Torta de vainilla', '4000','imagen18.jpg',5),
  ('Waffle sencillo', '11000','imagen18.jpg', 10),
  ('Waffle especial con fruta', '14000','imagen18.jpg',10 ),
  ('Malteada pequeña', '10000','imagen18.jpg',3 ),
  ('Copa de helado con fruta', '10000', 'imagen18.jpg', 8),
  ('Brownie con helado(con dos sabores de helado)', '7000', 'imagen18.jpg',8),
  ('Matrimonio', '6000','imagen18.jpg', 4),
  ('Dulce de papayuela', '6000','imagen18.jpg', 6),
  ('Leche asada', '7000', 'imagen18.jpg', 4),
  ('Dulce tropical', '6000','imagen18.jpg', 6),
  ('Flan de caramelo','6000', 'imagen18.jpg', 4),
  ('Arroz con leche', '3000','imagen18.jpg', 4),
  ('Brebas con arequipe', 6000 ,'imagen18.jpg', 6);
  
INSERT INTO Rol_has_Permiso (id_Rol_FK, id_Permiso_FK) VALUES
  (1, 1),
  (1, 2),
  (1, 3),
  (1, 4),
  (1, 5),
  (1, 6),
  (1, 7),
  (1, 8),
  (1, 9),
  (1, 10),
  (1, 11),
  (1, 12),
  (1, 13),
  (1, 14),
  (1, 15),
  (1, 16),
  (1, 17),
  (1, 18),
  (1, 19),
  (1, 20),
  (1, 21),
  (1, 22),
  (1, 23),
  (1, 24),
  (1, 25),
  (1, 26),
  (1, 27),
  (1, 28),
  (1, 29),
  (1, 30),
  (1, 31),
  (1, 32),
  (1, 33),
  (1, 34),
  (1, 35),
  (1, 36),
  (1, 37),
  (1, 38),
  (1, 39),
  (1, 40),
  (2, 1),
  (2, 2),
  (2, 3),
  (2, 4),
  (2, 5),
  (2, 6),
  (2, 7),
  (2, 8),
  (2, 9),
  (2, 10),
  (2, 11),
  (2, 12),
  (2, 13),
  (2, 14),
  (2, 15),
  (2, 16),
  (2, 17),
  (2, 18),
  (2, 19),
  (2, 20),
  (2, 21),
  (2, 22),
  (2, 23),
  (2, 24),
  (2, 25),
  (2, 26),
  (2, 27),
  (2, 28),
  (2, 29),
  (2, 30),
  (2, 31),
  (2, 32),
  (2, 33),
  (2, 34),
  (2, 35),
  (2, 36),
  (2, 37),
  (2, 38),
  (2, 39),
  (2, 40),
  (3, 1),
  (3, 2),
  (3, 3),
  (3, 4),
  (3, 5),
  (3, 6),
  (3, 7),
  (3, 8),
  (3, 9),
  (3, 10),
  (3, 11),
  (3, 12),
  (3, 13),
  (3, 14),
  (3, 15),
  (3, 16),
  (3, 17),
  (3, 18),
  (3, 19),
  (3, 20),
  (3, 21),
  (3, 22),
  (3, 23),
  (3, 24),
  (3, 25),
  (3, 26),
  (3, 27),
  (3, 28),
  (3, 29),
  (3, 30),
  (3, 31),
  (3, 32),
  (3, 33),
  (3, 34),
  (3, 35),
  (3, 36),
  (3, 37),
  (3, 38),
  (3, 39),
  (3, 40);

INSERT INTO Usuario (noDocumento_Usuario, email, password, celular_Usuario, nombre_Usuario, apellido_Usuario, id_Rol_FK) VALUES
  (1234567890, 'admin@admin.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 1234567890, 'Camila Alexandra', 'Arias Ruiz', 1),
  (2345678901, 'Rodriguez_Martinez@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 2345678901, 'Juan David', 'Rodriguez Martinez', 3),
  (3456789012, 'Martinez_Lopez@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 3456789012, 'Laura Sofia', 'Martinez Lopez', 3),
  (4567890123, 'Lopez_Gonzalez@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 4567890123, 'Carlos Andres', 'Lopez Gonzalez', 2),
  (5678901234, 'Gonzalez_Hernandez@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 5678901234, 'Ana Gabriela', 'Gonzalez Hernandez', 2),
  (6789012345, 'Hernandez_Perez@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 6789012345, 'Luis Felipe', 'Hernandez Perez', 2),
  (7890123456, 'Perez_Torres@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 7890123456, 'Valentina Alejandra', 'Perez Torres', 2),
  (8901234567, 'Torres_Ramirez@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 8901234567, 'Felipe Andres', 'Torres Ramirez', 2),
  (9012345678, 'Ramirez_Sanchez@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 9012345678, 'Camila Antonia', 'Ramirez Sanchez', 2),
  (1234567891, 'Sanchez_Romero@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 1234567891, 'Santiago Alejandro', 'Sanchez Romero', 2),
  (2345678902, 'Romero_Morales@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 2345678902, 'Isabella Valeria', 'Romero Morales', 2),
  (3456789013, 'Morales_Flores@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 3456789013, 'David Santiago', 'Morales Flores', 2),
  (4567890124, 'Flores_Cruz@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 4567890124, 'Sofia Valentina', 'Flores Cruz', 2),
  (5678901235, 'Cruz_Gomez@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 5678901235, 'Sebastian Jose', 'Cruz Gomez', 2),
  (6789012346, 'Gomez_Reyes@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 6789012346, 'Daniela Mariana', 'Gomez Reyes', 2),
  (7890123457, 'Reyes_Vargas@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 7890123457, 'Alejandro Sebastian', 'Reyes Vargas', 2),
  (8901234568, 'Vargas_Castro@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 8901234568, 'Gabriela Alejandra', 'Vargas Castro', 2),
  (9012345679, 'Castro_Ruiz@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 9012345679, 'Diego Alejandro', 'Castro Ruiz', 2),
  (1234567892, 'Ruiz_Jimenez@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 1234567892, 'Natalia Andrea', 'Ruiz Jimenez', 2),
  (2345678903, 'Jimenez_Medina@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 2345678903, 'Andres Felipe', 'Jimenez Medina', 2),
  (3456789014, 'Medina_Ortega@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 3456789014, 'Victoria Camila', 'Medina Ortega', 2),
  (4567890125, 'Ortega_Silva@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 4567890125, 'Juan Sebastian', 'Ortega Silva', 2),
  (5678901236, 'Silva_Mendoza@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 5678901236, 'Valeria Isabella', 'Silva Mendoza', 2),
  (6789012347, 'Mendoza_Delgado@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 6789012347, 'Jose Daniel', 'Mendoza Delgado', 2),
  (7890123458, 'Delgado_Rios@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 7890123458, 'Antonia Camila', 'Delgado Rios', 2),
  (8901234569, 'Rios_Aguilar@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 8901234569, 'Felipe Sebastian', 'Rios Aguilar', 2),
  (9012345680, 'Aguilar_Nuñez@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 9012345680, 'Mariana Daniela', 'Aguilar Nuñez', 2),
  (1234567893, 'Nuñez_Paredes@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 1234567893, 'Santiago Felipe', 'Nuñez Paredes', 2),
  (2345678904, 'Paredes_Cordero@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 2345678904, 'Alejandra Valentina', 'Paredes Cordero', 2),
  (3456789015, 'Cordero_Guzman@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 3456789015, 'Luis Eduardo', 'Cordero Guzman', 2),
  (4567890126, 'Guzman_Mora@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 4567890126, 'Andrea Natalia', 'Guzman Mora', 2),
  (5678901237, 'Mora_Cabrera@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 5678901237, 'Alejandro Felipe', 'Mora Cabrera', 2),
  (6789012348, 'Cabrera_Peralta@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 6789012348, 'Valentina Sofia', 'Cabrera Peralta', 2),
  (7890123459, 'Peralta_Leon@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 7890123459, 'Carlos Eduardo', 'Peralta Leon', 2),
  (8901234570, 'Leon_Ayala@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 8901234570, 'Gabriela Sofia', 'Leon Ayala', 2),
  (9012345681, 'Ayala_Bautista@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 9012345681, 'Juan Felipe', 'Ayala Bautista', 2),
  (1234567894, 'Bautista_Caceres@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 1234567894, 'Isabella Maria', 'Bautista Caceres', 2),
  (2345678905, 'Caceres_Navarro@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 2345678905, 'Andres David', 'Caceres Navarro', 2),
  (3456789016, 'Navarro_Peña@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 3456789016, 'Camila Valeria', 'Navarro Peña', 2),
  (4567890127, 'Peña_Rojas@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 4567890127, 'Sebastian Andres', 'Peña Rojas', 2),
  (5678901238, 'Rojas_Acosta@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 5678901238, 'Mariana Gabriela', 'Rojas Acosta', 2),
  (6789012349, 'Acosta_Avila@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 6789012349, 'Jose Alejandro', 'Acosta Avila', 2),
  (7890123460, 'Avila_Duarte@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 7890123460, 'Antonia Sofia', 'Avila Duarte', 2),
  (8901234571, 'Duarte_Rivas@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 8901234571, 'Felipe Alejandro', 'Duarte Rivas', 2),
  (9012345682, 'Rivas_Palacios@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 9012345682, 'Daniela Valentina', 'Rivas Palacios', 2),
  (1234567895, 'Palacios_Zambrano@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 1234567895, 'Alejandro David', 'Palacios Zambrano', 2),
  (2345678906, 'Zambrano_Escobar@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 2345678906, 'Valeria Gabriela', 'Zambrano Escobar', 2),
  (3456789017, 'Escobar_Ibarra@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 3456789017, 'Eduardo Felipe', 'Escobar Ibarra', 2),
  (4567890128, 'Ibarra_Montoya@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 4567890128, 'Natalia Valentina', 'Ibarra Montoya', 2),
  (5678901239, 'Montoya_Valencia@example.com', '$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty', 5678901239, 'Felipe Juan', 'Montoya Valencia', 2);
  
INSERT INTO EstadoPedido(id_EstadoPedido, nombre_EstadoPedido) VALUES
  ('1', 'Por Arpobar'),
  ('2', 'Aprobado'),
  ('3', 'Preparándose'),
  ('4', 'Para Recoger'),
  ('5', 'Cancelado'),
  ('6', 'Aceptar Cambios'),
  ('7', 'Finalizados');
  
INSERT INTO Pedido (descripcion_Pedido, fecha_Pedido, id_EstadoPedido_FK, noDocumento_Usuario_FK) VALUES 
  ('Quiero una oblea con todos los ingredientes', '2023-06-12 09:30:00', 5, 7890123456),
  ('Dos cheesecake de limon', '2023-06-12 10:15:00', 7, 8901234567),
  ('Necesito una bandeja de tres leches para el martes', '2023-06-12 11:20:00', 3, 2345678902),
  ('Me gustaria un chieescake de maracuya y una oblea con arequipe y crema de leche', '2023-06-12 12:45:00', 5, 6789012346),
  ('Quiero comprar cinco malteadas medianas', '2023-06-12 13:30:00', 7, 2345678903),
  ('Me podrias vender dos brevas con arequipe ', '2023-06-12 14:20:00', 3, 1234567893),
  ('Buenas tardes, me gustaria una malteada y un waffle', '2023-06-12 15:15:00', 5, 5678901237),
  ('Buenas noches, deseo comprar 6 kilos de helado sabor a pistache', '2023-06-12 16:10:00', 7, 6789012348),
  ('Deseo adquirir una torta de zanahoria para 15 personas', '2023-06-12 17:25:00', 3, 7890123459),
  ('Deseo pedir 8 pedazos de torta de chocolate para acompañar mi helado', '2023-06-12 18:40:00', 2, 5678901238);
  
INSERT INTO Calificacion (estrellas_Calificacion, comentario_Calificacion, id_Pedido_FK) VALUES
  (5, "El pedido llegó antes de lo esperado. ¡Excelente servicio!", 1),
  (4, "Buena calidad de los productos. Recomendado.", 2),
  (3, "El pedido tuvo un ligero retraso en la entrega.", 3),
  (5, "Muy satisfecho con la atención al cliente.", 4),
  (2, "Algunos productos llegaron dañados.", 5),
  (4, "Buen servicio en general.", 6),
  (5, "Rápido enví­o y productos de calidad.", 7),
  (3, "La comunicación con el vendedor fue un poco difí­cil.", 8),
  (1, "El pedido nunca llegó y no recibí­ ninguna explicación.", 9),
  (4, "El empaque podrí­a mejorar, pero los productos están bien.", 10);
  
INSERT INTO Calificacion (estrellas_Calificacion,comentario_Calificacion, id_Proveedor_FK) VALUES
  (5, 'Excelente proveedor', 1),
  (4, 'Buen servicio y productos de calidad', 1),
  (3, 'Regular atención al cliente', 1),
  (5, 'Muy satisfecho con los productos', 2),
  (2, 'Entrega tardí­a y productos defectuosos', 2),
  (4, 'Buen precio y variedad de productos', 2),
  (3, 'Falta de comunicación y retraso en la entrega', 3),
  (4, 'Productos frescos y bien presentados', 3),
  (2, 'Mala atención al cliente y productos de baja calidad', 3),
  (5, 'Siempre cumplen con los plazos de entrega', 4),
  (4, 'Atención rápida y eficiente', 4),
  (3, 'Algunos productos llegaron en mal estado', 4),
  (4, 'Buen trato y solución rápida a los problemas', 5),
  (2, 'No cumplieron con lo acordado', 5),
  (5, 'Excelente calidad de los productos', 5),
  (3, 'Precios competitivos pero poca variedad', 6),
  (4, 'Buen servicio postventa', 6),
  (5, 'Recomiendo ampliamente a este proveedor', 6),
  (2, 'Mal embalaje de los productos', 7),
  (3, 'Entrega demorada sin previo aviso', 7),
  (4, 'Productos frescos y bien empacados', 7),
  (5, 'Siempre nos proveen con productos de calidad', 8),
  (3, 'Atención al cliente deficiente', 8),
  (4, 'Precios justos y calidad garantizada', 8),
  (2, 'No cumplen con los plazos de entrega', 9),
  (3, 'Productos defectuosos', 9),
  (4, 'Buena comunicación y seguimiento de los pedidos', 9),
  (5, 'El mejor proveedor que hemos tenido', 10),
  (4, 'Respuesta rápida ante cualquier inconveniente', 10),
  (3, 'Productos de buena calidad pero precios elevados', 10);
  
INSERT INTO EstadoOrdenCompra (id_EstadoOrdenCompra, nombre_EstadoOrdenCompra) VALUES
  (1, 'Solicitada'),
  (2, 'Finalizada');
  
INSERT INTO OrdenCompra (id_OrdenCompra, fecha_OrdenCompra, hora_OrdenCompra, id_EstadoOrdenCompra_FK) VALUES
  (1, '2023-05-31', '10:00:00', 1),
  (2, '2023-05-31', '11:30:00', 2),
  (3, '2023-06-01', '09:45:00', 1),
  (4, '2023-06-02', '14:20:00', 1),
  (5, '2023-06-03', '16:30:00', 2),
  (6, '2023-06-03', '18:45:00', 1),
  (7, '2023-06-04', '12:15:00', 1),
  (8, '2023-06-05', '10:30:00', 2),
  (9, '2023-06-06', '15:00:00', 1),
  (10, '2023-06-07', '17:45:00', 1),
  (11, '2023-06-08', '09:15:00', 2),
  (12, '2023-06-09', '11:30:00', 1),
  (13, '2023-06-09', '13:45:00', 2),
  (14, '2023-06-10', '16:00:00', 1),
  (15, '2023-06-11', '10:45:00', 1),
  (16, '2023-06-12', '14:30:00', 2),
  (17, '2023-06-13', '12:00:00', 1),
  (18, '2023-06-14', '09:30:00', 2),
  (19, '2023-06-15', '11:45:00', 1),
  (20, '2023-06-16', '15:15:00', 2);

INSERT INTO DetalleOC (id_DetalleOC, cantidadInsumo_OC, id_Insumo_FK, id_OrdenCompra_FK) VALUES
  (1, 5, 1, 1),
  (2, 3, 2, 1),
  (3, 2, 3, 1),
  (4, 4, 4, 2),
  (5, 1, 5, 2),
  (6, 3, 6, 2),
  (7, 2, 7, 3),
  (8, 4, 8, 3),
  (9, 2, 9, 3),
  (10, 5, 10, 4),
  (11, 3, 11, 4),
  (12, 2, 12, 4),
  (13, 4, 13, 5),
  (14, 1, 14, 5),
  (15, 3, 15, 5),
  (16, 2, 16, 6),
  (17, 4, 17, 6),
  (18, 2, 18, 6),
  (19, 5, 19, 7),
  (20, 3, 20, 7),
  (21, 2, 1, 8),
  (22, 4, 2, 8),
  (23, 1, 3, 8),
  (24, 3, 4, 9),
  (25, 2, 5, 9),
  (26, 4, 6, 9),
  (27, 1, 7, 10),
  (28, 3, 8, 10),
  (29, 2, 9, 10),
  (30, 5, 10, 11),
  (31, 3, 11, 11),
  (32, 2, 12, 11),
  (33, 4, 13, 12),
  (34, 1, 14, 12),
  (35, 3, 15, 12),
  (36, 2, 16, 13),
  (37, 4, 17, 13),
  (38, 2, 18, 13),
  (39, 5, 19, 14),
  (40, 3, 20, 14),
  (41, 2, 1, 15),
  (42, 4, 2, 15),
  (43, 1, 3, 15),
  (44, 3, 4, 16),
  (45, 2, 5, 16);
  
INSERT INTO historico(fechaMovimiento_H, cantidad_H, tipo_Historico, id_Insumo_FK, id_tipoMovimiento_FK) VALUES 
  ('2022-01-01 10:30:00', 100,'INSUMO', 1, 1),
  ('2022-02-15 16:00:00', 100,'INSUMO', 2, 1),
  ('2022-03-05 12:30:00', 100,'INSUMO', 3, 1),
  ('2022-04-20 09:45:00', 100,'INSUMO', 4, 1),
  ('2022-05-10 14:30:00', 100,'INSUMO', 5, 1),
  ('2022-06-12 11:45:00', 100,'INSUMO', 6, 1),
  ('2022-07-05 10:15:00', 100,'INSUMO', 7, 1),
  ('2022-08-18 14:00:00', 100,'INSUMO', 8, 1),
  ('2022-09-22 15:00:00', 100,'INSUMO', 9, 1),
  ('2022-10-30 11:30:00', 100,'INSUMO', 10, 1),
  ('2022-11-12 17:45:00', 100,'INSUMO', 11, 1),
  ('2022-12-05 12:45:00', 100,'INSUMO', 12, 1),
  ('2023-01-10 10:30:00', 100,'INSUMO', 13, 1),
  ('2023-02-18 16:00:00', 100,'INSUMO', 14, 1),
  ('2023-03-05 12:30:00', 100,'INSUMO', 15, 1),
  ('2023-04-20 09:45:00', 100,'INSUMO', 16, 1),
  ('2023-05-10 14:30:00', 100,'INSUMO', 17, 1),
  ('2023-06-12 11:45:00', 100,'INSUMO', 18, 1),
  ('2023-07-05 10:15:00', 100,'INSUMO', 19, 1),
  ('2023-08-18 14:00:00', 100,'INSUMO', 20,1);
  
INSERT INTO historico(fechaMovimiento_H, cantidad_H, tipo_Historico, id_Producto_FK, id_tipoMovimiento_FK) VALUES 
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 1, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 2, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 3, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 4, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 5, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 6, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 7, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 8, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 9, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 10, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 11, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 12, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 13, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 14, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 15, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 16, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 17, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 18, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 19, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 20, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 21, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 22, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 23, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 24, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 25, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 26, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 27, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 28, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 29, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 30, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 31, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 32, 1),
  ( '2022-01-01 10:30:00', 100, 'PRODUCTO', 33, 1);

INSERT INTO Venta (fecha_Venta, hora_venta, total_Venta, noDocumento_Usuario_FK) VALUES
  ('2023-01-01', '09:30:00', 150000, 2345678901),
  ('2023-01-02', '14:45:00', 200000, 2345678901),
  ('2023-01-02', '16:20:00', 120000, 2345678901),
  ('2023-01-03', '10:15:00', 180000, 2345678901),
  ('2023-01-03', '12:30:00', 90000, 2345678901),
  ('2023-01-04', '15:45:00', 140000, 2345678901),
  ('2023-01-05', '11:10:00', 160000, 2345678901),
  ('2023-01-06', '17:25:00', 110000, 2345678901),
  ('2023-01-06', '19:40:00', 170000, 2345678901),
  ('2023-01-07', '13:55:00', 130000, 2345678901),
  ('2023-01-08', '09:00:00', 190000, 2345678901),
  ('2023-01-09', '14:15:00', 100000, 2345678901),
  ('2023-01-09', '16:30:00', 150000, 2345678901),
  ('2023-01-10', '12:45:00', 200000, 2345678901),
  ('2023-01-11', '10:40:00', 120000, 2345678901),
  ('2023-01-11', '13:00:00', 180000, 2345678901),
  ('2023-01-12', '15:15:00', 90000, 2345678901),
  ('2023-01-13', '11:30:00', 140000, 2345678901),
  ('2023-01-14', '17:45:00', 160000, 2345678901),
  ('2023-01-14', '20:00:00', 110000, 2345678901),
  ('2023-01-15', '09:30:00', 120000, 3456789012),
  ('2023-01-16', '14:45:00', 180000, 3456789012),
  ('2023-01-16', '16:20:00', 110000, 3456789012),
  ('2023-01-17', '10:15:00', 150000, 3456789012),
  ('2023-01-17', '12:30:00', 90000, 3456789012),
  ('2023-01-18', '15:45:00', 170000, 3456789012),
  ('2023-01-19', '11:10:00', 130000, 3456789012),
  ('2023-01-20', '17:25:00', 160000, 3456789012),
  ('2023-01-20', '19:40:00', 140000, 3456789012),
  ('2023-01-21', '13:55:00', 190000, 3456789012),
  ('2023-01-22', '09:00:00', 100000, 3456789012),
  ('2023-01-23', '14:15:00', 150000, 3456789012),
  ('2023-01-23', '16:30:00', 200000, 3456789012),
  ('2023-01-24', '12:45:00', 120000, 3456789012),
  ('2023-01-25', '10:40:00', 180000, 3456789012),
  ('2023-01-25', '13:00:00', 90000, 3456789012),
  ('2023-01-26', '15:15:00', 140000, 3456789012),
  ('2023-01-27', '11:30:00', 160000, 3456789012),
  ('2023-01-28', '17:45:00', 110000, 3456789012),
  ('2023-01-28', '20:00:00', 130000, 3456789012),
  ('2023-06-12', '09:30:00', 4500, 3456789012),
  ('2023-06-12', '10:15:00', 12000, 3456789012),
  ('2023-06-12', '11:20:00', 50000, 3456789012),
  ('2023-06-12', '13:30:00', 60000, 3456789012),
  ('2023-06-12', '14:20:00', 12000, 3456789012),
  ('2023-06-12', '16:10:00' , 215000, 3456789012),
  ('2023-06-12', '17:25:00', 32000, 3456789012);
  
INSERT INTO Insumo_has_Proveedor (id_Insumo_FK, id_Proveedor_FK) VALUES
  (13, 1),
  (7, 2),
  (5, 3),
  (11, 4),
  (14, 4),
  (15, 4),
  (20, 4),
  (7, 6),
  (1, 5),
  (2, 5),
  (3, 10),
  (4, 10),
  (6, 10),
  (8, 9),
  (9, 10),
  (10, 10),
  (12, 5),
  (16, 7),
  (17, 5),
  (18, 4),
  (19, 9),
  (19, 4);
  
INSERT INTO DetalleVenta (cantidad_producto, subtotal_DetalleVenta, id_Producto_FK, id_Venta_FK) VALUES
  (2, 9000, 1, 1),
  (1, 3000, 2, 1),
  (3, 6000, 3, 1),
  (1, 6000, 4, 2),
  (2, 30000, 5, 3),
  (1, 24000, 6, 4),
  (2, 12000, 7, 5),
  (1, 6000, 8, 5),
  (1, 50000, 9, 6),
  (2, 20000, 10, 7),
  (3, 12000, 11, 8),
  (1, 4000, 12, 8),
  (2, 50000, 13, 9),
  (1, 1500, 14, 9),
  (2, 5000, 15, 9),
  (1, 2500, 16, 10),
  (1, 4500, 17, 10),
  (1, 6500, 18, 10),
  (1, 4000, 19, 11),
  (1, 5000, 20, 11),
  (1, 4000, 21, 11),
  (1, 4000, 22, 11),
  (2, 22000, 23, 12),
  (1, 28000, 24, 12),
  (1, 20000, 25, 13),
  (1, 25000, 26, 14),
  (1, 15000, 27, 15),
  (2, 9000, 28, 15),
  (1, 14000, 29, 16),
  (1, 10000, 30, 17),
  (1, 7000, 31, 18),
  (2, 12000, 32, 18),
  (1, 6000, 12, 19),
  (1, 6000, 12, 20),
  (1, 7000, 12, 21),
  (1, 6000, 12, 22),
  (1, 6000, 12, 23),
  (1, 3000, 12, 24),
  (1, 6000, 12, 24),
  (1, 6000, 12, 25),
  (1, 6000, 12, 26),
  (1, 6000, 12, 26),
  (1, 6000, 12, 27),
  (1, 6000, 12, 28),
  (1, 6000, 12, 29),
  (1, 3000, 12, 30),
  (1, 6000, 12, 31),
  (1, 4500, 1, 32),
  (2, 6000, 2, 32),
  (1, 3000, 3, 32),
  (3, 9000, 4, 33),
  (1, 6000, 5, 33),
  (2, 12000, 6, 34),
  (1, 6000, 7, 34),
  (1, 15000, 8, 35),
  (2, 30000, 9, 36),
  (1, 12000, 10, 36),
  (1, 2000, 11, 36),
  (1, 4000, 12, 37),
  (1, 6000, 13, 37),
  (1, 6000, 14, 38),
  (2, 12000, 15, 39),
  (1, 6000, 16, 39),
  (1, 4000, 17, 40),
  (1, 4000, 18, 40),
  (2, 10000, 19, 40),
  (1, 6000, 20, 41),
  (1, 5000, 21, 41),
  (1, 4000, 22, 42),
  (1, 4000, 23, 42),
  (1, 6000, 24, 43),
  (1, 3000, 25, 43),
  (1, 6000, 26, 44),
  (1, 6000, 27, 44),
  (1, 4000, 28, 44),
  (1, 4000, 29, 45),
  (1, 4000, 30, 45),
  (1, 4000, 31, 45),
  (1, 11000, 32, 46),
  (1, 11000, 32, 46),
  (1, 11000, 32, 46),
  (1, 14000, 32, 46),
  (2, 28000, 32, 47),
  (1, 6000, 32, 47),
  (1, 4000, 32, 47);
  
INSERT INTO Sabor_has_Producto (id_Sabor_FK, id_Producto_FK) VALUES
  (1, 1), 
  (2, 1),
  (3, 1),
  (4, 1), 
  (5, 1),
  (1, 2), 
  (2, 2), 
  (3, 2), 
  (4, 2), 
  (5, 2),
  (1, 3), 
  (2, 3), 
  (3, 3), 
  (4, 3), 
  (5, 3),
  (1, 4), 
  (2, 4), 
  (3, 4), 
  (4, 4), 
  (5, 4),
  (1, 5), 
  (2, 5), 
  (3, 5), 
  (4, 5), 
  (5, 5),
  (1, 6), 
  (2, 6), 
  (3, 6), 
  (4, 6), 
  (5, 6),
  (1, 7), 
  (2, 7), 
  (3, 7), 
  (4, 7), 
  (5, 7),
  (1, 8), 
  (2, 8), 
  (3, 8), 
  (4, 8), 
  (5, 8),
  (1, 9), 
  (2, 9), 
  (3, 9), 
  (4, 9), 
  (5, 9),
  (1, 10), 
  (2, 10), 
  (3, 10), 
  (4, 10), 
  (5, 10),
  (6, 11), 
  (7, 11), 
  (8, 11), 
  (9, 11), 
  (10, 11),
  (6, 12), 
  (7, 12), 
  (8, 12), 
  (9, 12), 
  (10, 12),
  (6, 13), 
  (7, 13), 
  (8, 13), 
  (9, 13), 
  (10, 13),
  (6, 14), 
  (7, 14), 
  (8, 14), 
  (9, 14), 
  (10, 14),
  (6, 15), 
  (7, 15), 
  (8, 15), 
  (9, 15), 
  (10, 15),
  (6, 16), 
  (7, 16), 
  (8, 16), 
  (9, 16), 
  (10, 16),
  (6, 17), 
  (7, 17), 
  (8, 17), 
  (9, 17), 
  (10, 17),
  (6, 18), 
  (7, 18), 
  (8, 18), 
  (9, 18), 
  (10, 18),
  (6, 19), 
  (7, 19), 
  (8, 19), 
  (9, 19), 
  (10, 19),
  (6, 20), 
  (7, 20), 
  (8, 20), 
  (9, 20), 
  (10, 20),
  (1, 21), 
  (2, 21), 
  (3, 21),
  (1, 22), 
  (2, 22), 
  (3, 22), 
  (1, 23), 
  (2, 23), 
  (3, 23),
  (1, 24), 
  (2, 24), 
  (3, 24),
  (1, 25), 
  (2, 25), 
  (3, 25),
  (1, 26), 
  (2, 26), 
  (3, 26),
  (1, 27), 
  (2, 27), 
  (3, 27), 
  (1, 28), 
  (2, 28), 
  (3, 28),
  (1, 29), 
  (2, 29), 
  (3, 29),
  (1, 30), 
  (2, 30), 
  (3, 30),
  (4, 31), 
  (5, 31), 
  (6, 31), 
  (7, 31), 
  (8, 31),
  (4, 32), 
  (5, 32), 
  (6, 32), 
  (7, 32), 
  (8, 32);