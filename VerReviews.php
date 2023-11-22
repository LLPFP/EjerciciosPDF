<?php
// Conéctate a MySQL
$db = mysqli_connect('localhost', 'root', 'root', 'moviesite') or die('No se puede conectar. Verifica tus parámetros de conexión y el nombre de la base de datos.');

// Define an array to store the column names and their corresponding SQL ORDER BY clauses
$column_names = array(
    'movie_id' => 'Movie ID',
    'review_date' => 'Date',
    'reviewer_name' => 'Reviewer Name',
    'review_comment' => 'Review Comment',
    'review_rating' => 'Review Rating'
);

// Determine the sorting column and order (default to 'review_date' in ascending order)
$sort_column = isset($_GET['sort']) && array_key_exists($_GET['sort'], $column_names) ? $_GET['sort'] : 'review_date';
$sort_order = isset($_GET['order']) && $_GET['order'] === 'desc' ? 'DESC' : 'ASC';

// Construct the ORDER BY clause for the SQL query
$sort_clause = $sort_column . ' ' . $sort_order;

// Query to retrieve data from the reviews table
$query = "SELECT * FROM reviews ORDER BY $sort_clause";

$result = mysqli_query($db, $query) or die(mysqli_error($db));

// Display the reviews table with clickable column headings
echo '<h2>Tabla de Review</h2>';
echo '<table border="1">';
echo '<tr>';
foreach ($column_names as $col_name => $col_label) {
    // Generate links for sorting by the column
    echo '<th><a href="?sort=' . $col_name . '&order=' . ($sort_column === $col_name && $sort_order === 'ASC' ? 'desc' : 'asc') . '">' . $col_label . '</a></th>';
}
echo '</tr>';

$query_average_rating = "SELECT AVG(review_rating) AS average_rating FROM reviews";
$result_average_rating = mysqli_query($db, $query_average_rating) or die(mysqli_error($db));
$row_average_rating = mysqli_fetch_assoc($result_average_rating);
$average_rating = $row_average_rating['average_rating'];

echo '<h2>Promedio de Calificaciones de Reviewers</h2>';
echo '<p>El promedio de calificaciones es: ' . number_format($average_rating, 2) . '</p>';

// Consulta para obtener los datos de la tabla de Reviews
$query = "SELECT * FROM reviews";

$result = mysqli_query($db, $query) or die(mysqli_error($db));


echo '<h2>Tabla de Review</h2>';
echo '<table border="1">';
echo '<tr>';
foreach ($column_names as $col_name => $col_label) {
    // Generate links for sorting by the column
    echo '<th><a href="?sort=' . $col_name . '&order=' . ($sort_column === $col_name && $sort_order === 'ASC' ? 'desc' : 'asc') . '">' . $col_label . '</a></th>';
}
echo '</tr>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['review_movie_id'] . '</td>';
    echo '<td>' . $row['review_date'] . '</td>';
    echo '<td>' . $row['reviewer_name'] . '</td>';
    echo '<td>' . $row['review_comment'] . '</td>';
    echo '<td>' . $row['review_rating'] . '</td>';
    echo '</tr>';
}

echo '</table>';


?>