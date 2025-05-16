CREATE DATABASE IF NOT EXISTS gestion_proyectos;

USE gestion_proyectos;

CREATE TABLE IF NOT EXISTS usuarios (
    usuario_id int auto_increment primary key,
    nombre_u varchar(100) not null unique,
    contrasena_u varchar(100) not null
);

CREATE TABLE IF NOT EXISTS proyectos (
    proyecto_id int auto_increment primary key,
    nombre_p varchar(100) not null,
    descripcion text,
    fecha_inicio date,
    fecha_fin date
);

CREATE TABLE IF NOT EXISTS roles (
    rol_id int auto_increment primary key,
    nombre_r varchar(50) not null unique
);

CREATE TABLE IF NOT EXISTS proyectos_usuarios (
    proyecto_usuario_id int auto_increment primary key,
    proyecto_id int not null,
    usuario_id int not null,
    rol_id int not null,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos (proyecto_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios (usuario_id),
    FOREIGN KEY (rol_id) REFERENCES roles (rol_id)
);

CREATE TABLE IF NOT EXISTS estados (
    estado_id int auto_increment primary key,
    nombre_e varchar(50) not null unique
);

CREATE TABLE IF NOT EXISTS prioridades (
    prioridad_id int auto_increment primary key,
    nombre_p varchar(50) not null unique
);

CREATE TABLE IF NOT EXISTS tipos (
    tipo_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_t VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS tareas (
    tarea_id int auto_increment primary key,
    proyecto_id int not null,
    usuario_id int not null,
    titulo varchar(100) not null,
    estado_id int not null default 1,
    prioridad_id int not null,
    tipo_id int not null,
    FechaCreacion timestamp default current_timestamp,
    FechaLimite date,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos (proyecto_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios (usuario_id),
    FOREIGN KEY (estado_id) REFERENCES estados (estado_id),
    FOREIGN KEY (prioridad_id) REFERENCES prioridades (prioridad_id),
    FOREIGN KEY (tipo_id) REFERENCES tipos (tipo_id)
);


-- INSERT INTO roles (rol_id, nombre_r) VALUES (1, 'Administrador'), (2, 'Colaborador');
-- INSERT INTO estados (estado_id, nombre_e) VALUES (1, 'Pendiente'), (2, 'En Proceso'), (3, 'Finalizado');
-- INSERT INTO prioridades (prioridad_id, nombre_p) VALUES (1, 'Leve'), (2, 'Moderado'), (3, 'Urgente');
-- INSERT INTO tipos (tipo_id, nombre_t) VALUES (1, 'Front-End'), (2, 'Back-End'), (3, 'Diseño'), (4, 'Base de Datos');


SELECT * FROM usuarios ORDER BY usuario_id;
SELECT * FROM proyectos ORDER BY proyecto_id;
SELECT * FROM roles ORDER BY rol_id;
SELECT * FROM proyectos_usuarios ORDER BY proyecto_usuario_id;
SELECT * FROM estados ORDER BY estado_id;
SELECT * FROM prioridades ORDER BY prioridad_id;
SELECT * FROM tipos ORDER BY tipo_id;
SELECT * FROM tareas ORDER BY tarea_id;
