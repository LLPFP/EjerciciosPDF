<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Populate Select Field Form</title>
</head>
<body>

<form action="N4P113formprocess.php" method="post">
    <label for="option1">Option 1:</label>
    <input type="text" id="option1" name="options[]" required>
    <br>

    <label for="option2">Option 2:</label>
    <input type="text" id="option2" name="options[]" required>
    <br>

    <label for="option3">Option 3:</label>
    <input type="text" id="option3" name="options[]" required>
    <br>


    <input type="submit" value="Submit">
</form>

</body>
</html>
