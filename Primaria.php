<?php


//Cookie
$value = "Traspaso exitoso";
setcookie("traspasoDatos", $value, time()+300);


//Fecha
$fecha = date("d-m-Y");
echo $fecha;
echo "<br>";



$mesActual = date('n');

$inicioPrimavera = 3; // Marzo
$finPrimavera = 5;    // Mayo
$inicioVerano = 6;    // Junio
$finVerano = 8;       // Agosto
$inicioOtoño = 9;     // Septiembre
$finOtoño = 11;       // Noviembre


if ($mesActual >= $inicioPrimavera && $mesActual <= $finPrimavera) {
    $mensaje = "¡Buen inicio de primavera!";
} elseif ($mesActual >= $inicioVerano && $mesActual <= $finVerano) {
    $mensaje = "¡Buen verano!";
} elseif ($mesActual >= $inicioOtoño && $mesActual <= $finOtoño) {
    $mensaje = "¡Buen otoño!";
} else {
    $mensaje = "¡Buen invierno!";
}


echo $mensaje;


echo "<br>";
echo "<br>";

$fecha1Dia = date("d", strtotime ( '-2 day'));
echo "Two days ago it was ";
echo $fecha1Dia;
echo "<br>";

$fecha1Mes = date("m", strtotime ( '+1 month'));
echo "The next month is ";
echo $fecha1Mes;
echo "<br>";

$datetime1 = new DateTime('2023-11-01');
$datetime2 = new DateTime("d");
$fechaDiasRestantes = $datetime2->diff($datetime1);
echo "There are ";
echo $fechaDiasRestantes -> format ("%a ");
echo "days left in next month.";
echo "<br>";



$mes1 = new DateTime('2023-12-30');
$mes2 = new DateTime("m");
$mesesRestantes= $mes2->diff($mes1);
echo "There are ";
echo $mesesRestantes -> format ("%m ");
echo "months left in the current year.";





// Volver pagina principal
echo "<br>";
echo "<br>";
$regreso= 'Bienvenido';
echo $regreso;
echo "<br>";
$regreso = $_GET['atras'];
echo $regreso;

?>

<html>
 <head>
  <title>Please Log In</title>
 </head>
 <body>
  <form method="post" action="Secundaria.php">
   <p>Pon tu nombre:
    <input type="text" name="username"/>
   </p>
   <p>Pon tu contraseña:
    <input type="password" name="password"/>
   </p>
   <p>Pon tu videojuego favorito:
    <input type="text" name="videogame"/>
   </p>
    <p>
    <input type="submit" name="submit" value="Submit"/>
   </p>
  </form>
	
   <p>Site developed by: Luis López Puig: <a href='https://github.com/LLPFP?tab=repositories'>Github</a> </p>
		
 </body>
</html>





