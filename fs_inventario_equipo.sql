CREATE DATABASE IF NOT EXISTS fs_inventario_equipo;
USE fs_inventario_equipo;


CREATE TABLE marcas(
    marca_id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(100) NOT NULL 	
);

CREATE TABLE tipo_equipo(
    tipo_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE roles(
    rol_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(250) NOT NULL
);

CREATE TABLE puestos(
    puesto_id INT AUTO_INCREMENT PRIMARY KEY,
    puesto VARCHAR(50) NOT NULL
);

CREATE TABLE empleados(
    empleado_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    puesto_id INT NOT NULL,
    fecha_nacimiento DATE NOT NULL
);

ALTER TABLE empleados
    ADD CONSTRAINT fk_empleados_puestos FOREIGN KEY(puesto_id)
    REFERENCES puestos(puesto_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE;
	
CREATE TABLE usuarios(
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(60) NOT NULL,
    email VARCHAR(80) NOT NULL,
    contrasenia VARCHAR(60) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    rol_id INT NOT NULL
);

ALTER TABLE usuarios
    ADD CONSTRAINT fk_usuarios_roles FOREIGN KEY(rol_id)
    REFERENCES roles(rol_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

CREATE TABLE equipos(
    equipo_id INT AUTO_INCREMENT PRIMARY KEY,
    no_serie VARCHAR(20) NOT NULL,
    marca_id INT NOT NULL,
    descripcion VARCHAR(150) NOT NULL,
    fecha_compra DATE NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    tipo_id INT NOT NULL,
    empleado_id INT NOT NULL
);

ALTER TABLE equipos
    ADD CONSTRAINT fk_equipos_marcas FOREIGN KEY(marca_id)
    REFERENCES marcas(marca_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE;
	
ALTER TABLE equipos
    ADD CONSTRAINT fk_equipos_tipos FOREIGN KEY(tipo_id)
    REFERENCES tipo_equipo(tipo_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE;
	
ALTER TABLE equipos
    ADD CONSTRAINT fk_equipos_empleados FOREIGN KEY(empleado_id)
    REFERENCES empleados(empleado_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE;