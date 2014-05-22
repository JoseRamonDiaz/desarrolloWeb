<?php 

function autenticar(){
	$mensaje="";
	if ( (isset($_POST["btn_aceptar"])) && ($_POST["btn_aceptar"]=="Aceptar") ){
		
		$ausuario = recuperarInfoUsuario($_POST["usuario"], md5($_POST["contrasena"]));
		
		if ($ausuario){
			iniciarSesion($ausuario['usuario'], $ausuario['esAdmin']);
			$mensaje = "<script>window.location=\"index.php\"</script>";
		}
		else{
			$mensaje = "Usuario y contraseña incorrectos.";
		}
	}
	return $mensaje;
}

function validarAuth(){
	session_start();
	
	if(isset($_SESSION["cidusuario"])){
		$cdestino = "Location:index.php";
		header($cdestino);
		exit();
	}	
}
?>