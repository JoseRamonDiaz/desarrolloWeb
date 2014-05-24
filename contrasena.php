<?php
include_once("./funciones/config.inc.php"); 
include_once("./funciones/acceder_base_datos.php");
include_once("./funciones/listar.php");
	session_start();
//$adatos;
//$id = $_GET["cid_producto"];
//$adatos = recuperarUsuario($id);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/aluxe.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="imagenes/favicon.ico" />
    <script src="js/cookie.js"></script>
    <script src="js/cerrarSesion.js"></script>
    <!-- InstanceBeginEditable name="doctitle" -->
<title>Tienda Alux</title>

<!-- InstanceEndEditable -->
    <!-- InstanceBeginEditable name="head" -->
       <script src="js/validaciones.js"></script>
<script src="js/validarCrearCuenta.js"></script>
<script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
}

   </script>
    <!-- InstanceEndEditable -->
</head>

<body>
    
        
        <div id="content">
        <!-- InstanceBeginEditable name="RegionParaEditar" -->
<div class="detalles_producto" align="center"> 
	
    <div align="center">
    <table class="tabla1">
    <tr> </tr>
    
<td>Nueva Contraseña:</td> <td><input type="password"  name="contrasena" value="<?php echo (isset($_POST["contrasena"]))?$_POST["contrasena"]:""; ?>" id="contrasena"/>
    <span id="contrasenaError" class="errorFeedback errorSpan">La contraseña es incorrecta</span> 
</td>

<tr> </tr>
<td>Confirmar contraseña:</td> <td> <input type="password"  name="contrasena2" value="" id="contrasena2"/>
    <span id="contrasena2Error" class="errorFeedback errorSpan">La contraseña no coincide</span>
</td>

</table>
        
   
</div>

<!-- InstanceEndEditable -->
        </div>

</body>
<!-- InstanceEnd --></html>
