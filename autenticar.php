<?php 
	include_once("mantener_sesion.php");
	include_once("./funciones/acceder_base_datos.php");
	include_once("./funciones/administrar_usuarios.php");
	
	if ( (isset($_POST["btn_aceptar"])) && ($_POST["btn_aceptar"]=="Aceptar") ){
		
		$ausuario = recuperarInfoUsuario($_POST["usuario"], $_POST["contrasena"]);
				
		$cdestino = "Location: sesion.php";
		
		if ($ausuario){
			iniciarSesion($ausuario['usuario'], $ausuario['esAdmin']);
			$cdestino = "Location:index.php";
		}
		
		header($cdestino);
		exit();
	}
?>