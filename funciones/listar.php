<?php 
function listarProductos(){
 
 $ccontenido = "";
 //Conexión con la base de datos
 $pconexion = abrirConexion();
 //Selección de la base de datos
 seleccionarBaseDatos($pconexion);
 
 //Construcción de la sentencia SQL
 $cquery = "SELECT producto.id AS Id_Producto, producto.precio AS Precio, ";
 $cquery .= " producto.nombre AS Nombre, ";
 $cquery .= " producto.cantidad AS Cantidad, ";
 $cquery .= " producto.imagen AS Imagen";
  $cquery .= " FROM producto";
 $cquery .= " WHERE (producto.tipo='1')"; 
  
 //Se ejecuta la sentencia SQL
 $lresult = mysql_query($cquery, $pconexion); 
	 
 if (!$lresult) {
   $cerror = "No fue posible recuperar la información de la base de datos.<br>";
   $cerror .= "SQL: $cquery <br>";
   $cerror .= "Descripción: ".mysql_error($pconexion);
   die($cerror);
 } 
 else{ 
   //Verifica que la consulta haya devuelto por lo menos un registro
   if (mysql_num_rows($lresult) > 0){
  	 //Recorre los registros arrojados por la consulta SQL
	 while ($adatos = mysql_fetch_array($lresult)){
$cid_producto = $adatos["Id_Producto"];
//$ccontenido .= "<ul class=\"producto_cell\">";
$ccontenido .= "<li class = \"producto\">";
$ccontenido .= "<div class=\"imagen\">";
$ccontenido .= "<a href=\"vista.php?cid_producto=".$adatos['Id_Producto']."\"> <img src=imagenes/".$adatos["Imagen"]." width=\"150px\" height= \"150px\"/></a> <br/>";
$ccontenido .= "</div>";
$ccontenido .= "<div class=\"descripcion\">";
$ccontenido .= $adatos["Nombre"]."<br />";
$ccontenido .= "</div>";
$ccontenido .= "</li>";
//$ccontenido .= "</ul>";
	 }   
   }	 
 }	 
 
 mysql_free_result($lresult); 
 
 if ( empty($ccontenido) ){
   $ccontenido .= "<tr>";
   $ccontenido .= "<td>No se obtuvieron resultados</td>";		
   $ccontenido .= "</tr>";
 }
 	
 
 cerrarConexion($pconexion); 
 return $ccontenido; 
}


function recuperarInfoProducto($cid_producto){
  
 $adatos = array();
 
 $pconexion = abrirConexion(); 
 seleccionarBaseDatos($pconexion);
 
 /*$cquery = " SELECT producto.id, producto.precio, producto.nombre, producto.talla, producto.cantidad, producto.color, producto.descripcion, modelo.nombre, producto.imagen";
  $cquery .= "FROM producto JOIN modelo "; 
 $cquery  .= " ON producto.id_modelo = modelo.id_modelo";
 $cquery .= " WHERE id = '$cid_producto'";*/
 $cquery = "SELECT producto.id, producto.precio, producto.nombre, producto.talla, producto.cantidad, producto.color, producto.descripcion, modelo.nombre AS modelo, producto.imagen
FROM producto
JOIN modelo ON producto.id_modelo = modelo.id
WHERE producto.id = '$cid_producto'";

 /*$cquery = "SELECT producto.id AS Id,";
 $cquery .= " producto.precio AS Precio, producto.nombre AS Nombre,";
 $cquery .= " producto.talla AS Talla, producto.cantidad AS Cantidad,";
 $cquery .= " producto.color AS Color, producto.descripcion AS Descripcion,";
 $cquery .= " modelo.nombre AS Modelo, producto.imagen AS Imagen,";
 $cquery .= " FROM producto, modelo";
 $cquery .= " WHERE  id='$cid_producto' AND producto.id_modelo='modelo.id'";*/
//var_dump($cquery);
//die();
 $adatos = extraerRegistro($pconexion, $cquery); 
 cerrarConexion($pconexion);
  
return $adatos;

 
}


function listarUsuarios(){
	$ccontenido = "";
 //Conexión con la base de datos
 $pconexion = abrirConexion();
 //Selección de la base de datos
 seleccionarBaseDatos($pconexion);
 //Construcción de la sentencia SQL
 $cquery = "SELECT usuario.id AS Id, usuario.nombre AS Nombre, ";
 $cquery .= " usuario.apellido AS Apellido, usuario.usuario AS Usuario,";
 $cquery .= " usuario.email AS Email";
 $cquery .= " FROM usuario";

  
 //Se ejecuta la sentencia SQL
 $lresult = mysql_query($cquery, $pconexion); 
	 
 if (!$lresult) {
   $cerror = "No fue posible recuperar la información de la base de datos.<br>";
   $cerror .= "SQL: $cquery <br>";
   $cerror .= "Descripción: ".mysql_error($pconexion);
   die($cerror);
 } 
 else{ 
   //Verifica que la consulta haya devuelto por lo menos un registro
   if (mysql_num_rows($lresult) > 0){
  	 //Recorre los registros arrojados por la consulta SQL
	 while ($adatos = mysql_fetch_array($lresult)){
	 
       $cid_Usuario = $adatos["Id"]; //**
	   $ccontenido .= "<tr>";
	   $ccontenido .= "<td align=\"center\">".$adatos["Id"]."</td>";
	   $ccontenido .= "<td width=\"10\">&nbsp;</td>";	
	   $ccontenido .= "<td> <a href=\"verUsuario.php?cid_Usuario=$cid_Usuario\">".$adatos["Usuario"]."</a></td>"; //**
	   $ccontenido .= "<td width=\"10\">&nbsp;</td>";
	   $ccontenido .= "<td>".$adatos["Nombre"]."</td>";
	   $ccontenido .= "<td width=\"10\">&nbsp;</td>";
	   $ccontenido .= "<td align=\"center\">".$adatos["Apellido"]."</td>";
	   $ccontenido .= "<td width=\"10\">&nbsp;</td>";
	   $ccontenido .= "<td>".$adatos["Email"]."</td>";
	   $ccontenido .= "<td width=\"10\">&nbsp;</td>"; //***
	   $ccontenido .= "<td><a href=\"funciones/borrar.php?cid_Usuario=$cid_Usuario\">"; //***
	   $ccontenido .= "<img src=\"imagenes/borrar.gif\" border=\"0\" alt=\"Eliminar Usuario\"></a></td>";
	   $ccontenido .= "</tr>";	
	 }   
   }	 
 }	 
 
 mysql_free_result($lresult); 
 
 if ( empty($ccontenido) ){
   $ccontenido .= "<tr>";
   $ccontenido .= "<td>No se obtuvieron resultados</td>";		
   $ccontenido .= "</tr>";
 }
 
 cerrarConexion($pconexion); 
 return $ccontenido;
	}
	
	function recuperarInfoUsuario($cid_Usuario){
  
 $adatos = array();
 
 $pconexion = abrirConexion(); 
 seleccionarBaseDatos($pconexion);
 
 
 $cquery = "SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.direccion, usuario.usuario, usuario.contrasena, usuario.email, usuario.telefono, usuario.fax, usuario.empresa, usuario.cp, usuario.pais FROM usuario WHERE usuario.id = '$cid_Usuario'";

 
 $adatos = extraerRegistro($pconexion, $cquery); 
 cerrarConexion($pconexion);
  
return $adatos;

 
}

	
?>
