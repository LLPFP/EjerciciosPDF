<?php

$db = mysqli_connect('localhost', 'root', 'root', 'moviesite') or die('Unable to connect. Check your connection parameters and database name.');

$query = "SELECT m.movie_name, p1.people_fullname AS lead_actor, p2.people_fullname AS director
          FROM movie m
          LEFT JOIN people p1 ON m.movie_leadactor = p1.people_id
          LEFT JOIN people p2 ON m.movie_director = p2.people_id";

$result = mysqli_query($db, $query) or die(mysqli_error($db));


echo "<h2>Movie Details</h2>";
echo "<table border='1'>
        <tr>
            <th>Movie Name</th>
            <th>Lead Actor</th>
            <th>Director</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['movie_name'] . "</td>";
    echo "<td>" . $row['lead_actor'] . "</td>";
    echo "<td>" . $row['director'] . "</td>";
    echo "</tr>";
}

echo "</table>";


mysqli_close($db);
?>
