<?php
include_once("config.inc.php"); 
include_once("acceder_base_datos.php");


 if ( isset($_POST["btn_grabar"]) && $_POST["btn_grabar"] == "Guardar"){
 	 $pconexion = abrirConexion();
   seleccionarBaseDatos($pconexion);
   $cid_Usuario= $_POST["id"];
  $cnombre = $_POST["nombre_txt"];
   $capellidos = $_POST["apellidos_txt"];
   $cmail = $_POST["mail_txt"];
   $ctelefono = $_POST["telefono_txt"];
   $cfax = $_POST["fax_txt"];
   $cempresa = $_POST["emp_txt"];
   $cdireccion = $_POST["direc_txt"];
    $ccp = $_POST["cp_txt"];
   $cpais = $_POST["pais"];
  $cciudad = $_POST["city_txt"];
   $cusuario = $_POST["usuario"];
    $ccontrasena = (md5($_POST["contrasena"]));
   
      $cquery = "UPDATE usuario";
   $cquery .= " SET nombre = '$cnombre',";
   $cquery .= " apellido = '$capellidos',";
   $cquery .= " direccion = '$cdireccion',";
   $cquery .= " usuario = '$cusuario',";
   $cquery .= " contrasena = '$ccontrasena',";
   $cquery .= " email = '$cmail',";
   $cquery .= " telefono = '$ctelefono',";
   $cquery .= " fax = '$cfax',";
   $cquery .= " empresa = '$cempresa',";
   $cquery .= " cp = $ccp,";
   $cquery .= " pais = '$cpais',";
   $cquery .= " ciudad = '$cciudad'";
   $cquery .= " WHERE (id = '$cid_Usuario')";
   
   if ( editarDatos($pconexion, $cquery) )
     $curl = "Location:".$GLOBALS["raiz_sitio"]."perfil.php?cidusuario=$cusuario";  
   else
     $curl =
"Location:".$GLOBALS["raiz_sitio"]."editarperfil.php?cidusuario=$cidusuario";  
    
   cerrarConexion($pconexion);
   header($curl);
   exit();
 }

?>