<?php 
 /*function listarProveedores(){

 $copciones = "";
 $pconexion = abrirConexion();
 seleccionarBaseDatos($pconexion);
 
$cquery = "SELECT * FROM proveedores";
 $cquery .= " ORDER BY nombre ASC";
 
 $lresult = mysql_query($cquery, $pconexion);
 if ( $lresult ){
   
   if (mysql_num_rows($lresult) > 0){          
     if (  !$_POST["cmb_idproveedor"] || !isset($_POST["cmb_idproveedor"]) || $_POST["cmb_idproveedor"]=="0"){	 
	   while ( $adatos = mysql_fetch_array($lresult) ){
	     $copciones .= "<option value=\"".$adatos["id_proveedor"]."\">";
	     $copciones .= $adatos["nombre"];
	     $copciones .= "</option>\n";
	   } //while     
	 } 
	 else{	   
	   while ( $adatos = mysql_fetch_array($lresult) ){
	     if ( $_POST["cmb_idproveedor"] == $adatos["id_proveedor"] )
		   $copciones .= "<option value=\"".$adatos["id_proveedor"]."\" selected>";
		 else
		   $copciones .= "<option value=\"".$adatos["id_proveedor"]."\">";
	     $copciones .= $adatos["nombre"];
	     $copciones .= "</option>\n";
	   }	   
	 } //else	 
   }
   
 } 
 
 cerrarConexion($pconexion);
 return $copciones;

} */
//--------------------------------------
function agregarUsuario(){

 $cmensaje = "";
 if ( isset($_POST["btn_grabar"]) && $_POST["btn_grabar"] == "Guardar"){
   
   $cnombre = $_POST["nombre"];
   $capellidos = $_POST["apellidos"];
   $cmail = $_POST["mail"];
   $ctelefono = $_POST["telefono"];
   $cfax = $_POST["fax"];
   $cempresa = $_POST["empresa"];
   $cdireccion = $_POST["direc1"];
   $cciudad = $_POST["ciudad"];
   $ccp = $_POST["cp"];
   $cpais = $_POST["pais"];
   $cusuario = $_POST["usuario"];
     $cadmin = $_POST["admin"];
    $ccontrasena = (md5($_POST["contrasena"]));
   
   $pconexion = abrirConexion();
   seleccionarBaseDatos($pconexion);
   
  $cquery = "SELECT usuario FROM usuario";
   $cquery .= " WHERE usuario = '$cusuario'";
   
   if ( !existeRegistro($cquery, $pconexion) ){
	   
	   $cquery = "INSERT INTO usuario";
	   $cquery .= " (nombre, apellido, direccion, usuario, contrasena, email, telefono, fax, empresa, cp, pais, ciudad, esAdmin)";
	   $cquery .= " VALUES ('$cnombre', '$capellidos', '$cdireccion', '$cusuario', '$ccontrasena', '$cmail', '$ctelefono', '$cfax', '$cempresa', '$ccp', '$cpais', '$cciudad', '$cadmin' )";
	   if (insertarDatos($cquery, $pconexion) )
	     $cmensaje = "";
	   else
	     $cmensaje = "";	 
   }
   else
     $cmensaje = "";
	 
   cerrarConexion($pconexion);
 
 }

 return $cmensaje;
} 
//--------------------------------------
/*function recuperarInfoProducto($cid_producto){
  
 $adatos = array();
 
 $pconexion = abrirConexion(); 
 seleccionarBaseDatos($pconexion);
 
 $cquery = "SELECT id_producto, descripcion, precio, cantidad FROM
productos"; 
 $cquery .= " WHERE (id_producto = $cid_producto)";

 $adatos = extraerRegistro($cquery,$pconexion); 
 cerrarConexion($pconexion);
  
return $adatos;
*/
 
//}


function agregarUsuarioNuevo(){

 $cmensaje = "";
 if ( isset($_POST["btn_grabar"]) && $_POST["btn_grabar"] == "Guardar"){
 $tipo_cuenta = $_POST["tipo_cuenta"];
   $cnombre = $_POST["nombre"];
   $capellidos = $_POST["apellidos"];
   $cmail = $_POST["mail"];
   $ctelefono = $_POST["telefono"];
   $cfax = $_POST["fax"];
   $cempresa = $_POST["empresa"];
   $cdireccion = $_POST["direc1"];
   $cciudad = $_POST["ciudad"];
   $ccp = $_POST["cp"];
   $cpais = $_POST["pais"];
   $cusuario = $_POST["usuario"];
    $ccontrasena = (md5($_POST["contrasena"]));
   
   $pconexion = abrirConexion();
   seleccionarBaseDatos($pconexion);
   
  $cquery = "SELECT usuario FROM usuario";
   $cquery .= " WHERE usuario = '$cusuario'";
   
   if ( !existeRegistro($cquery, $pconexion) ){
	   
	   $cquery = "INSERT INTO usuario";
	   $cquery .= " (nombre, apellido, direccion, usuario, contrasena, email, telefono, fax, empresa, cp, pais, ciudad,  esAdmin)";
	   $cquery .= " VALUES ('$cnombre', '$capellidos', '$cdireccion', '$cusuario', '$ccontrasena', '$cmail', '$ctelefono', '$cfax', '$cempresa', '$ccp', '$cpais', '$cciudad', '$tipo_cuenta')";
	   if (insertarDatos($cquery, $pconexion) )
	     $cmensaje = "Usuario Registrado";
	   else
	     $cmensaje = "No fue posible registrar el usuario en la base de datos";	 
   }
   else
     $cmensaje = "Ya existe un usuario con el nombre: $cusuario";
	 
   cerrarConexion($pconexion);
 
 }

 return $cmensaje;
} 



?>