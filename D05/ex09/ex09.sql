SELECT COUNT(*) AS 'nb_short-films'
FROM film INNER JOIN genre ON film.id_genre = genre.id_genre
AND genre.name = 'short film' WHERE duration <= 42;