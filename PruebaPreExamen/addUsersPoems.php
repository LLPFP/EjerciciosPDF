<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
    
mysqli_select_db($db, 'poems') or die(mysqli_error($db));

$query_insert = "INSERT INTO users 
    (user_id, first_name, last_name, email, username, pass_phrase, is_admin, date_registered, profile_pic, registration_confirmed) 
VALUES 
    (1, 'Nombre', 'Apellido', 'correo@example.com', 'nombre_usuario', 'clave_encriptada', 0, '2023-11-23 12:00:00', 'imagen.jpg', 1)";

mysqli_query($db, $query_insert) or die (mysqli_error($db));

?>
