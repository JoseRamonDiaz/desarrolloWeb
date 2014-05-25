<?php

function cambiar(){
	
	 if ( isset($_POST["btn_grabar"]) && $_POST["btn_grabar"] == "Guardar"){
		   $cid_Usuario= $_POST["id"];
		     $ccontrasena = (md5($_POST["contrasena"]));
 $pconexion = abrirConexion(); 
 seleccionarBaseDatos($pconexion);
 $cquery = "UPDATE usuario";
 $cquery .= " SET contrasena = '$ccontrasena'";
 $cquery .= " WHERE (id = '$cid_Usuario')";
  if ( editarDatos($pconexion, $cquery) )
     $curl = "Location:".$GLOBALS["raiz_sitio"]."usuarios.php";  
   else
     $curl =
"Location:".$GLOBALS["raiz_sitio"]."editarUsuario.php?cid_Usuario=$cid_Usuario";  
    
   cerrarConexion($pconexion);
   header($curl);
   exit();
	 }
	}
?>