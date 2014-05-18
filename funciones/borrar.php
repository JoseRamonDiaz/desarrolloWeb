<?php

include_once("config.inc.php"); 
	include_once("acceder_base_datos.php");
	
	
	$cid_Usuario = $_GET["cid_Usuario"];
	$pconexion = abrirConexion();
	seleccionarBaseDatos($pconexion);
	
	$sQuery = "DELETE FROM usuario WHERE id = $cid_Usuario";
	
	
	mysql_query($sQuery, $pconexion);
    $curl = "Location:".$GLOBALS["raiz_sitio"]."usuarios.php";
	
   cerrarConexion($pconexion);
   header($curl);
   exit();
	 
?>