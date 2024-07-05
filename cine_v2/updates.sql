UPDATE actores
SET foto_actor = 'img/ZipiZape.png'
WHERE foto_actor = 'cine/img/fotos/actores/';

SELECT pk_id_actor,
       nombre_actor,
       foto_actor
FROM actores;

UPDATE actores
SET foto_actor = 'img/generica.png'
WHERE foto_actor = 'img/ZipiZape.png';

UPDATE actores
SET foto_actor = 'img/generica.png'
WHERE foto_actor = NULL;

UPDATE actores
SET foto_actor = 'img/generica.png'
WHERE foto_actor = 'vacio';

UPDATE actores
SET foto_actor = 'img/generica.png'
WHERE foto_actor = '';

UPDATE actores
SET foto_actor = 'img/fotos/actores/actor_eddie.jpg'
WHERE foto_actor = 'img/fotos/actoresactor_eddie.jpg';


delete from actores where pk_id_actor= 115;

SELECT pk_id_actriz,
       nombre_actriz,
       foto_actriz
FROM actrices;

UPDATE actrices
SET foto_actriz = 'img/fotos/actrices/actriz_marisa.jpg'
WHERE foto_actriz = 'img/fotos/actricesactriz_marisa.jpg';

UPDATE actrices
SET foto_actriz = 'img/fotos/actrices/Renee_Zellweger.jpg'
WHERE foto_actriz = 'cine/img/fotos/actrices/Renee_Zellweger.jpg';

UPDATE actrices
SET foto_actriz = 'img/fotos/actrices/phoebe_waller_bridge.jpg'
WHERE foto_actriz = 'phoebe_waller_bridge.jpg';


UPDATE actrices
SET foto_actriz = 'img/generica.png'
WHERE foto_actriz = '';

UPDATE actrices
SET foto_actriz = 'img/generica.png'
WHERE foto_actriz = 'vacio';

UPDATE actrices
SET foto_actriz = 'img/generica_2.png'
WHERE foto_actriz = 'img/generica.png';

UPDATE actrices
SET foto_actriz = 'img/generica_2.png'
WHERE foto_actriz = 'img/generico.png';