<?php
include_once("config.inc.php"); 
include_once("acceder_base_datos.php");


 function Busqueda(){
	 if ( isset($_POST["buscar"]) && $_POST["buscar"] == "Buscar"){
	 
	 
	 $busquedas = $_POST["search_name"];
	
	$ccontenido = "";
 //Conexión con la base de datos
 $pconexion = abrirConexion();
 //Selección de la base de datos
 seleccionarBaseDatos($pconexion);
 
 //Construcción de la sentencia SQL
 
 if($busquedas!=''){
 $cquery = "SELECT producto.id AS Id_Producto, producto.precio AS Precio, ";
 $cquery .= " producto.nombre AS Nombre, ";
 $cquery .= " producto.imagen AS Imagen";
  $cquery .= " FROM producto";
 $cquery .= " WHERE (producto.nombre LIKE '%$busquedas%' OR 
 producto.precio LIKE '%$busquedas%' OR producto.color LIKE '%$busquedas%')"; 
 //$cquery = "SELECT * FROM producto WHERE nombre LIKE '%$busqueda%' OR precio LIKE '%$busqueda%' ";
 
 
  
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
$ccontenido .= "<img src=imagenes/".$adatos["Imagen"]." width=\"150px\" height= \"150px\"/><br/>";
$ccontenido .= "</div>";
$ccontenido .= "<div class=\"descripcion\">";
$ccontenido .= $adatos["Nombre"]."<br />";
$ccontenido .= "<input type=\"button\" onclick=\"window.open(this.src,'schermo','toolbar=no,directories=no, menubar=no,width=900,height=456,resizable=yes')\" value=\"Detalles\"/ src=\"vista.php?cid_producto=".$adatos['Id_Producto']."\" id=\"detalles3\">";
$ccontenido .= "</div>";
$ccontenido .= "</li>";
//$ccontenido .= "</ul>";
	 }   
   }	 
 }	 
 
 mysql_free_result($lresult); 
 
 if ( empty($ccontenido) ){
   $ccontenido .= "<tr>";
   $ccontenido .= "<td>No hay productos que coincidan con los criterios de búsqueda.</td>";		
   $ccontenido .= "</tr>";
 }
 	
 
 cerrarConexion($pconexion); 
 return $ccontenido; 
}
else{
	echo "<td>No hay productos que coincidan con los criterios de búsqueda.</td>";	
	}	
	 }
 }
?>