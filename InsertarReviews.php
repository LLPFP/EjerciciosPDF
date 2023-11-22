<?php

// Conéctate a MySQL
$db = mysqli_connect('localhost', 'root', 'root', 'moviesite') or die('No se puede conectar. Verifica tus parámetros de conexión y el nombre de la base de datos.');


$query_insert_reviews = <<<ENDSQL
INSERT INTO reviews
    (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
VALUES 
    (1, '2008-09-30', 'Jane Smith', 'A classic film with an amazing storyline.', 5),
    (2, '2008-10-05', 'Eddie Murphy', 'Hilarious! I laughed the whole time.', 4),
    (3, '2008-10-10', 'Samantha Jones', 'This movie made me want to travel the world.', 4)
ENDSQL;

mysqli_query($db, $query_insert_reviews) or die(mysqli_error($db));

echo 'Tres reviews adicionales añadidas exitosamente.';
?>
