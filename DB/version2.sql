CREATE TABLE persona (
    personaId SERIAL NOT NULL PRIMARY KEY,
    nombres CHARACTER VARYING(28) NOT NULL,
    apellidos CHARACTER VARYING(80) NOT NULL,
    telefono FLOAT(14) NOT NULL
);


CREATE TABLE acceso(
    accesoId SERIAL NOT NULL PRIMARY KEY,
    correo CHARACTER VARYING(120) NOT NULL,
    clave CHARACTER VARYING(128) NOT NULL,
    personaId INT,
    FOREIGN KEY(personaId) REFERENCES persona(personaId)
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

CREATE TABLE productos(
    productoId SERIAL NOT NULL PRIMARY KEY,
    
)