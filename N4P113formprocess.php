<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Form Data</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $options = $_POST["options"];

    echo "<h2>Options for Select Field:</h2>";
    echo "<select>";

    foreach ($options as $option) {
        echo "<option>$option</option>";
    }

    echo "</select>";
} else {
    header("Location: N4P112form.php");
    exit();
}
?>

</body>
</html>
