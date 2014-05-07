<?php

function recuperarInfoUsuario($cusuario, $ccontrasena){
  
	$adatos = array();
	
	$pconexion = abrirConexion(); 
	seleccionarBaseDatos($pconexion);
	
	$cquery = "SELECT * FROM usuario"; 
	$cquery .= " WHERE usuario = '$cusuario' AND contrasena = '$ccontrasena'";
	
	$adatos = extraerRegistro($pconexion, $cquery); 
	cerrarConexion($pconexion);
	
	return $adatos;
}
?>