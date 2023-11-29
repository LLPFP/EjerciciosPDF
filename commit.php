<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

$errors = [];

switch ($_GET['action']) {
    case 'add':
        switch ($_GET['type']) {
            case 'people':
                $errors = validatePeopleData($_POST);
                
                if (empty($errors)) {
                    $query = 'INSERT INTO
                        people
                            (people_fullname, people_isactor, people_isdirector)
                        VALUES
                            ("' . $_POST['people_fullname'] . '",
                             ' . $_POST['people_isactor'] . ',
                             ' . $_POST['people_isdirector'] . ')';
                }
                break;
        }
        break;

    case 'edit':
        switch ($_GET['type']) {
            case 'movie':
               
                $query = 'UPDATE movie SET
                        movie_name = "' . $_POST['movie_name'] . '",
                        movie_year = ' . $_POST['movie_year'] . ',
                        movie_type = ' . $_POST['movie_type'] . ',
                        movie_leadactor = ' . $_POST['movie_leadactor'] . ',
                        movie_director = ' . $_POST['movie_director'] . '
                    WHERE
                        movie_id = ' . $_POST['movie_id'];
                break;
        }
        break;
}

if ($_GET['action'] == 'add' && empty($errors)) {
    echo '<p>Done!</p>';
    exit;
} elseif (!empty($errors)) {
    header('Location: people.php?action=' . $_GET['action'] .
        '&id=' . $_POST['people_fullname'] . '&error=' . join($errors, urlencode('<br/>')));
    exit;
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}

echo '<p>Done!</p>';

function validatePeopleData($data) {
    $error = [];

    $people_fullname = isset($data['people_fullname']) ? trim($data['people_fullname']) : '';
    if (empty($people_fullname)) {
        $error[] = 'Please enter a full name.';
    }

    $people_email = isset($data['people_email']) ? trim($data['people_email']) : '';
    if (!filter_var($people_email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address.';
    }

    $people_isactor = isset($data['people_isactor']) ? $data['people_isactor'] : 0;
    // Add validations for other fields as needed

    return $error;
}


?>
<html>
<head>
    <title>Commit</title>
</head>
<body>

</body>
</html>
