<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'users':
        $query = 'INSERT INTO
        users
            (user_id, first_name, last_name, email, username,
            pass_phrase, is_admin, date_registered, profile_pic, registration_confirmed)
        VALUES
            (NULL,
             "' . $_POST['first_name'] . '",
             "' . $_POST['last_name'] . '",
             "' . $_POST['email'] . '",
             "' . $_POST['username'] . '",
             "' . $_POST['pass_phrase'] . '",
             ' . $_POST['is_admin'] . ',
             NOW(),  -- Assuming date_registered should be the current date and time
             "' . $_POST['profile_pic'] . '",
             ' . $_POST['registration_confirmed'] . ')';

    break;

    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'users':
            $query = 'UPDATE poems SET
                    title = "' . $_POST['title'] . '",
                    poem = "' . $_POST['poem'] . '",
                    date_submitted = "' . $_POST['date_submitted'] . '",
                    username = "' . $_POST['username'] . '",
                    date_approved = "' . $_POST['date_approved'] . '"
                WHERE
                    poems_id = ' . $_POST['poems_id'];
            break;
        
    }
    break;
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>
