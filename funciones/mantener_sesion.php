<?php 
function validarSesion(){
	
	session_start();
	
	if(!isset($_SESSION["cidusuario"])){
		$cdestino = "Location:sesion.php";
		header($cdestino);
		exit();
	}

 
}

function iniciarSesion($cUsuario, $bEsAdmin){
	session_start();
	$_SESSION["cidusuario"] = $cUsuario;
	$_SESSION["esAdmin"] = $bEsAdmin;
}
?>
