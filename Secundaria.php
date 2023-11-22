<?php
session_start();

//Post y Sessions
$nombre = $_POST['username'];
$contraseña = $_POST['password'];
$_SESSION['authuser'] = 1;
$_SESSION['user_id'] = 25;

echo "<p>¡Bienvenido!";
echo "Has iniciado sesión como: " , $nombre;
echo "<br>";

// Null controll
$nombre = $_GET['nombre'] ?? 'No te has logueado correctamente';
$password = $_GET['password'] ?? 'No te has logueado correctamente';

$volverAtras = urlencode("Hola de vuelta en la página de login :)");

//Cookie
echo "<br>";
echo $_COOKIE['traspasoDatos'];
echo "<br>";






if (!isset($_SESSION['page_views'])) {
  
    $_SESSION['page_views'] = 1;
} else {
    
    $_SESSION['page_views']++;
}


echo "Has visitado esta página " . $_SESSION['page_views'] . " veces.";



echo "<br>";
echo "<br>";



?>


<html>
    <head>
        <title>Videojuegos :D</title>
    </head>
    <body>
    <?php
    echo "Bienvenido en la pagina de videojuegos de Luis.";
    echo "<br>";

    // Volver pagina principal
    echo "Si quieres volver al login, haz click aquí";
    echo "<br>";
    echo  "<a href='Primaria.php?atras=$volverAtras'>Volver</a>";
    ?>

	<h1>Preferencias de Formato de Texto</h1>

    <?php
    // Inicializar variables
    $texto = "";
    $color = "black";
    $fuente = "Arial, sans-serif";
    $tamano = "medium";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user preferences from the form
        $texto = $_POST["texto"];
        $color = $_POST["color"];
        $fuente = $_POST["fuente"];
        $tamano = $_POST["tamano"];

        // Save preferences in cookies if the user chooses to
        if (isset($_POST["guardar"])) {
            setcookie("texto", $texto, time() + 3600 * 24 * 30); // Cookie válida por 30 días
            setcookie("color", $color, time() + 3600 * 24 * 30);
            setcookie("fuente", $fuente, time() + 3600 * 24 * 30);
            setcookie("tamano", $tamano, time() + 3600 * 24 * 30);
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="texto">Ingrese el texto:</label>
        <textarea name="texto" rows="4" cols="50"><?php echo $texto; ?></textarea><br><br>

        <label for="color">Elija el color del texto:</label>
        <select name="color">
            <option value="black" <?php if ($color == "black") echo "selected"; ?>>Negro</option>
            <option value="red" <?php if ($color == "red") echo "selected"; ?>>Rojo</option>
            <option value="blue" <?php if ($color == "blue") echo "selected"; ?>>Azul</option>
        </select><br><br>

        <label for="fuente">Elija la fuente:</label>
        <select name="fuente">
            <option value="Arial, sans-serif" <?php if ($fuente == "Arial, sans-serif") echo "selected"; ?>>Arial</option>
            <option value="Times New Roman, serif" <?php if ($fuente == "Times New Roman, serif") echo "selected"; ?>>Times New Roman</option>
            <option value="Verdana, sans-serif" <?php if ($fuente == "Verdana, sans-serif") echo "selected"; ?>>Verdana</option>
        </select><br><br>

        <label for="tamano">Elija el tamaño del texto:</label>
        <input type="radio" name="tamano" value="16px" <?php if ($tamano == "16px") echo "checked"; ?>>Pequeño
        <input type="radio" name="tamano" value="20px" <?php if ($tamano == "20px") echo "checked"; ?>>Mediano
        <input type="radio" name="tamano" value="28" <?php if ($tamano == "28px") echo "checked"; ?>>Grande<br><br>

        <label for="guardar">¿Guardar preferencias para la próxima visita?</label>
        <input type="checkbox" name="guardar" value="si"><br><br>

        <input type="submit" value="Formatear Texto">
    </form>

    <div style="color: <?php echo $color; ?>; font-family: <?php echo $fuente; ?>; font-size: <?php echo $tamano; ?>;">
        <?php echo nl2br($texto);?>
    </div>
	



















	<p>Site developed by: Luis López Puig: <a href='https://github.com/LLPFP?tab=repositories'>Github</a> </p>














    </body>
</html>
