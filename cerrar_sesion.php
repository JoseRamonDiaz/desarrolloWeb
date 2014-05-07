<?php    

//Es necesario inicializar la sesion amtes de destruirla
session_start();
//Elimina todas las variables de la sesion
session_unset();
session_destroy();

$cdestino = "Location:index.php";
header($cdestino);
exit();
?>