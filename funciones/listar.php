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
$ccontenido .= "<div class=\"producto\" align=\"left\">";
$ccontenido .= "<font size=\"+3\" color=\"#000000\"> #" .$adatos["Id_Producto"]. "&nbsp". $adatos["Nombre"]."</font><br />";
$ccontenido .= "<a href=\"vista.php\"> <img src=imagenes/".$adatos["Imagen"]." width=\"150px\" height= \"150px\"/></a>";
$ccontenido .= "</div>";
$ccontenido .= "<div class=\"derecha\">";
$ccontenido .=  "<font> Precio: </font>".$adatos["Precio"]."<br />";
$ccontenido .= "<font> Disponibles: </font>".$adatos["Cantidad"]."<br />";
$ccontenido .= "<input type=\"button\" value=\"Agregar\" name=\"agregar\" id=\"agregar\" class=\"agregar\"/>";
$ccontenido .= "</div>";
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
?>
