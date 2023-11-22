<?php

$db = mysqli_connect('localhost', 'root', 'root', 'moviesite') or die('Unable to connect. Check your connection parameters and database name.');

$query = 'ALTER TABLE movie ENGINE = InnoDB';
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'ALTER TABLE people ENGINE = InnoDB';
mysqli_query($db, $query) or die(mysqli_error($db));


$query = 'ALTER TABLE movie
          ADD CONSTRAINT FK_leadactor
          FOREIGN KEY (movie_leadactor)
          REFERENCES people(people_id)';
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Relationship between movie_leadactor and people_id created successfully!';
?>
