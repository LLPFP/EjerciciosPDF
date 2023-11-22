<?php

$db = mysqli_connect('localhost', 'root', 'root', 'moviesite') or die('Unable to connect. Check your connection parameters and database name.');




$recordsPerPage = 5;


if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = intval($_GET['page']);
} else {
    $currentPage = 1;
}

$offset = ($currentPage - 1) * $recordsPerPage;


$query = "SELECT m.movie_name, p1.people_fullname AS lead_actor, p2.people_fullname AS director
          FROM movie m
          LEFT JOIN people p1 ON m.movie_leadactor = p1.people_id
          LEFT JOIN people p2 ON m.movie_director = p2.people_id
          LIMIT $offset, $recordsPerPage";

$result = mysqli_query($db, $query) or die(mysqli_error($db));

$countQuery = "SELECT COUNT(*) AS total_records FROM movie";
$countResult = mysqli_query($db, $countQuery) or die(mysqli_error($db));
$row = mysqli_fetch_assoc($countResult);
$totalRecords = $row['total_records'];


$totalPages = ceil($totalRecords / $recordsPerPage);


mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Database</title>
</head>
<body>
    <h2>Movie Details</h2>
    <table border='1'>
        <tr>
            <th>Movie Name</th>
            <th>Lead Actor</th>
            <th>Director</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['movie_name'] ?></td>
                <td><?= $row['lead_actor'] ?></td>
                <td><?= $row['director'] ?></td>
            </tr>
        <?php } ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <a href="?page=<?= $i ?>"><?= $i ?></a>
        <?php } ?>
    </div>
</body>
</html>
