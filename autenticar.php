<?php 
 include_once("mantener_sesion.php");
 include_once("./funciones/acceder_base_datos.php");
$copciones = "";
$pconexion = abrirConexion();
 //Selección de la base de datos
 seleccionarBaseDatos($pconexion);
 
 
 //$cquery = "SELECT usuarios.nombre, usuarios.contrasena FROM usuarios WHERE (usuario='admin' AND contrasena='root')";
  $cquery = "SELECT * FROM usuario WHERE (usuario='".$_POST["usuario"]."' AND contrasena='".$_POST["contrasena"]."')";
 //Se ejecuta la sentencia SQL
 $lresult = mysql_query($cquery, $pconexion); 

 if (!$lresult) {
   $cerror = "No fue posible recuperar la información de la base de datos.<br>";
   $cerror .= "SQL: $cquery <br>";
   $cerror .= "Descripción: ".mysql_error($pconexion);
   die($cerror);
 } 
 $cdestino = "Location: sesion.php";
 if ( (isset($_POST["btn_aceptar"])) && ($_POST["btn_aceptar"]=="Aceptar") ){
	 
	 if (mysql_num_rows($lresult)>0){
   //if(($_SESSION["usuario"]== $usuario) && ($_SESSION["contrasena"]== $password)){
	  
 
	   
	   iniciarSesion($_POST["usuario"]);
	   $cdestino = "Location:index.php";
  
	
 }
  
 }
 //}
  header($cdestino);
 

 exit();
 
 

?>