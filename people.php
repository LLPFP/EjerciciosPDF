<?php
$db_connection = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Please check your connection parameters.');
mysqli_select_db($db_connection, 'moviesite') or die(mysqli_error($db_connection));

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($action == 'edit') {
    // Obtener la información del registro
    $query = 'SELECT
            people_fullname, people_isactor, people_isdirector
        FROM
            people
        WHERE
            people_id = ' . $id;
    $result = mysqli_query($db_connection, $query) or die(mysqli_error($db_connection));
    extract(mysqli_fetch_assoc($result));
} else {
    // Configurar valores por defecto
    $people_fullname = '';
    $people_isactor = 0;
    $people_isdirector = 0;
}
?>

<html>
<head>
    <title><?php echo ucfirst($action); ?> Person</title>
</head>
<body>
    <form action="commit.php?action=<?php echo $action; ?>&type=people" method="post">
        <table>
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="people_fullname" value="<?php echo $people_fullname; ?>"/></td>
            </tr>
            <tr>
                <td>Is Actor?</td>
                <td>
                    <select name="people_isactor">
                        <option value="1" <?php echo ($people_isactor == 1) ? 'selected="selected"' : ''; ?>>Yes</option>
                        <option value="0" <?php echo ($people_isactor == 0) ? 'selected="selected"' : ''; ?>>No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Is Director?</td>
                <td>
                    <select name="people_isdirector">
                        <option value="1" <?php echo ($people_isdirector == 1) ? 'selected="selected"' : ''; ?>>Yes</option>
                        <option value="0" <?php echo ($people_isdirector == 0) ? 'selected="selected"' : ''; ?>>No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <?php if ($action == 'edit'): ?>
                        <input type="hidden" value="<?php echo $id; ?>" name="people_id" />
                    <?php endif; ?>
                    <input type="submit" name="submit" value="<?php echo ucfirst($action); ?>" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
