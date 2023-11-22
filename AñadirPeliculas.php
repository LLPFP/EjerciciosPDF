<?php

$db = mysqli_connect('localhost', 'root', 'root', 'moviesite') or die('Unable to connect. Check your connection parameters and database name.');



$query = "INSERT INTO people (people_fullname, people_isactor, people_isdirector) VALUES
          ('John Doe', 1, 0),
          ('Jane Smith', 1, 0),
          ('Alice Johnson', 0, 1)";
mysqli_query($db, $query) or die(mysqli_error($db));


$query = "INSERT INTO movietype (movietype_label) VALUES
          ('Action'),
          ('Drama'),
          ('Comedy')";
mysqli_query($db, $query) or die(mysqli_error($db));


$query = "INSERT INTO movie (movie_id, movie_name, movie_type, movie_year, movie_leadactor, movie_director) VALUES
          (4, 'Movie 4', 2, 2020, 5, 4),
          (5, 'Movie 5', 3, 2018, 2, 1),
          (6, 'Movie 6', 1, 2016, 3, 5)";

mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Data rows added successfully!';
?>
