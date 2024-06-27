UPDATE retrato
SET retrato = REPLACE(retrato, 'img/retratos', 'img/retratos/')
WHERE retrato LIKE 'img/retratos%';

        /* 1º PASO PARA CREAR UN BUSCADOR */
/* Convertir campos o columnas en datos de texto */

ALTER TABLE peliculas ADD FULLTEXT(titulo, resumen);

SHOW INDEX FROM peliculas WHERE index_type = 'FULLTEXT';