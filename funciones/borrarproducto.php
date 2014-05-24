<?php

include_once("config.inc.php"); 
	include_once("acceder_base_datos.php");
	
	
	$cid_producto = $_GET["cid_producto"];
	$pconexion = abrirConexion();
	seleccionarBaseDatos($pconexion);
	
	$sQuery = "DELETE producto, talla FROM producto LEFT JOIN talla ON producto.id=talla.id_producto WHERE producto.id = $cid_producto";
	//$sQuery = "DELETE producto, talla FROM talla WHERE talla.id_producto=$cid_producto";
	
	
	mysql_query($sQuery, $pconexion);
    $curl = "Location:".$GLOBALS["raiz_sitio"]."productos.php";
	
   cerrarConexion($pconexion);
   header($curl);
   exit();
	 
?>