<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $rating = $_POST["rating"];
    $comments = $_POST["comments"];


    echo "<h2>Thank you for your feedback!</h2>";
    echo "<p>Rating: $rating Stars</p>";
    echo "<p>Comments: $comments</p>";
} else {
    header("Location: N4P110form.php");
    exit();
}
?>
