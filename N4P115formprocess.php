<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Result</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];

    $sum = $num1 + $num2 + $num3;

    echo "<h2>Sum of the Numbers:</h2>";
    echo "<p>$num1 + $num2 + $num3 = $sum</p>";
} else {
    header("Location: N4P114form.php");
    exit();
}
?>

</body>
</html>
