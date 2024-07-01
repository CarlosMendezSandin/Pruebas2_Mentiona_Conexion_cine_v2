
/* ===================== Creación de la BD ===================== */

CREATE DATABASE cine_v2;

USE cine_v2;

/* ================== Creación de las tablas ================== */

CREATE TABLE actores(
        pk_id_actor INT PRIMARY KEY AUTO_INCREMENT,
        nombre_actor VARCHAR(100) NOT NULL,
        foto_actor VARCHAR(100),
        edad_actor TINYINT,
        fecha_nacimiento_actor DATE,
        nacionalidad_actor VARCHAR(50),
        oscar CHAR(1),
        actor_fallecido CHAR(1)
);
CREATE TABLE actrices(
        pk_id_actriz INT PRIMARY KEY AUTO_INCREMENT,
        nombre_actriz VARCHAR(100) NOT NULL,
        foto_actriz VARCHAR(100),
        edad_actriz TINYINT,
        fecha_nacimiento_actriz DATE,
        nacionalidad_actriz VARCHAR(50),
        oscar_actriz CHAR(1),
        actriz_fallecida CHAR(1)
);
CREATE TABLE director(
        pk_id_director INT PRIMARY KEY AUTO_INCREMENT,
        nombre_director VARCHAR(100) NOT NULL,
        foto_director VARCHAR(100),
        edad_director TINYINT,
        fecha_nacimiento_director DATE,
        nacionalidad_director VARCHAR(50),
        oscar_director CHAR(1),
        director_fallecido CHAR(1),
        sexo ENUM('Hombre', 'Mujer')
);
CREATE TABLE genero(
        pk_id_genero INT PRIMARY KEY AUTO_INCREMENT,
        nombre_genero VARCHAR(100) NOT NULL,
        descripcion VARCHAR(150)
);
CREATE TABLE produccion(
        pk_id_produccion INT PRIMARY KEY AUTO_INCREMENT,
        nombre_produccion VARCHAR(100) NOT NULL
);
CREATE TABLE peliculas(
        pk_id_pelicula INT PRIMARY KEY AUTO_INCREMENT,
        titulo VARCHAR(150) NOT NULL,
        cartel_pelicula VARCHAR(200),
        anio INT,
        duracion INT,
        oscar_pelicula CHAR(1),
        resumen text,
        fk_id_actor INT,
        fk_id_actriz INT,
        fk_id_director INT,
        fk_id_genero INT,
        fk_id_produccion INT,
        FOREIGN KEY (fk_id_actor) REFERENCES actores (pk_id_actor),
        FOREIGN KEY (fk_id_actriz) REFERENCES actrices (pk_id_actriz),
        FOREIGN KEY (fk_id_director) REFERENCES director (pk_id_director),
        FOREIGN KEY (fk_id_genero) REFERENCES genero (pk_id_genero),
        FOREIGN KEY (fk_id_produccion) REFERENCES produccion (pk_id_produccion)
);

CREATE TABLE retrato(
        pk_id_retrato INT PRIMARY KEY AUTO_INCREMENT,
        titulo_pelicula VARCHAR(255) NOT NULL,
        retrato VARCHAR(255) NOT NULL,
        fk_id_pelicula INT,
);


/* ===================== Cambios en tablas ===================== */

UPDATE retrato
SET retrato = REPLACE(retrato, 'img/retratos', 'img/retratos/')
WHERE retrato LIKE 'img/retratos%';

        /* 1º PASO PARA CREAR UN BUSCADOR */
/* Convertir campos o columnas en datos de texto */

ALTER TABLE peliculas ADD FULLTEXT(titulo, resumen);

SHOW INDEX FROM peliculas WHERE index_type = 'FULLTEXT';

ALTER TABLE actores ADD FULLTEXT(nombre_actor);

SHOW INDEX FROM actores WHERE index_type = 'FULLTEXT';

ALTER TABLE actrices ADD FULLTEXT(nombre_actriz);

SHOW INDEX FROM actrices WHERE index_type = 'FULLTEXT';

ALTER TABLE genero ADD FULLTEXT(nombre_genero);

SHOW INDEX FROM genero WHERE index_type = 'FULLTEXT';

ALTER TABLE produccion ADD FULLTEXT(nombre_produccion);

SHOW INDEX FROM produccion WHERE index_type = 'FULLTEXT';