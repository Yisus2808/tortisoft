
CREATE TABLE acceso(
    accesoId SERIAL NOT NULL PRIMARY KEY,
    correo CHARACTER VARYING(120) NOT NULL,
    clave CHARACTER VARYING(128) NOT NULL,
    personaId INT,
    hora_registro TIME NOT NULL, 
    fecha_registro DATE NOT NULL,
    FOREIGN KEY(personaId) REFERENCES persona(personaId)
);

CREATE TABLE persona (
    personaId SERIAL NOT NULL PRIMARY KEY,
    nombres CHARACTER VARYING(28) NOT NULL,
    apellidos CHARACTER VARYING(80) NOT NULL,
    telefono FLOAT(14) NOT NULL
);

CREATE TABLE tipo_usuario(
    tipo_usuarioId SERIAL NOT NULL PRIMARY KEY,
    tipo CHARACTER VARYING(12) NOT NULL
);

CREATE TABLE proveedor(
    proveedorId SERIAL NOT NULL PRIMARY KEY,
    nombre_proveedor CHARACTER VARYING(30),
    telefono FLOAT(14) NOT NULL
);


CREATE TABLE codigo_verificacion(
    codigoId SERIAL PRIMARY KEY NOT NULL,
    codigo INT NOT NULL, 
    fecha_creacion DATE NOT NULL, 
    hora_creacion TIME NOT NULL, 
    accesoId INT,
    FOREIGN KEY(accesoId) REFERENCES acceso(accesoId)
);

CREATE TABLE productos(
    productoId SERIAL NOT NULL PRIMARY KEY,
    nombre_producto CHARACTER VARYING(80) NOT NULL
);