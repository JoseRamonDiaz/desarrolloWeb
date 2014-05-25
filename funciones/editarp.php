<?php
include_once("config.inc.php"); 
include_once("acceder_base_datos.php");
include_once("agregar.php");

 if ( isset($_POST["btn_grabar"]) && $_POST["btn_grabar"] == "Guardar"){
 	 $pconexion = abrirConexion();
   seleccionarBaseDatos($pconexion);
   $cid_producto= $_POST["id"];
   $cnombre = $_POST["nombre"];
   $cprecio = $_POST["precio"];
   $ccategoria = $_POST["tipo_id"];
   $modelo= $_POST["modelo_id"];
   $ctalla1 = $_POST["talla1"];
   $cantidad1 = $_POST["ctalla1"];
   $ctalla2 = $_POST["talla2"];
   $cantidad2 = $_POST["ctalla2"];
   $ctalla3 = $_POST["talla3"];
   $cantidad3 = $_POST["ctalla3"];
   $ctalla4 = $_POST["talla4"];
   $cantidad4 = $_POST["ctalla4"];
   $ctalla5 = $_POST["talla5"];
   $cantidad5 = $_POST["ctalla5"];
   $ccolor = $_POST["color"];
   $cdescripcion = $_POST["des"];
   $nombre = $_FILES['imagen']['name'];
   
	$cquery = "UPDATE producto";
	$cquery .= " SET tipo = '$ccategoria',";
   $cquery .= " precio = '$cprecio',";
   $cquery .= " nombre = '$cnombre',";
   $cquery .= " color = '$ccolor',";
   $cquery .= " descripcion = '$cdescripcion',";
   $cquery .= " id_modelo = '$modelo',";
   $cquery .= " talla1 = '$ctalla1',";
   $cquery .= " cantidad1 = '$cantidad1',";
   $cquery .= " talla2 = '$ctalla2',";
   $cquery .= " cantidad2 = '$cantidad2',";
   $cquery .= " talla3 = '$ctalla3',";
   $cquery .= " cantidad3 = '$cantidad3',";
   $cquery .= " talla4 = '$ctalla4',";
   $cquery .= " cantidad4 = '$cantidad4',";
   $cquery .= " talla5 = '$ctalla5',";
   $cquery .= " cantidad5 = '$cantidad5',";
   $cquery .= " imagen = '$nombre'";
   $cquery .= " JOIN talla ON talla.id_producto = producto_id";   
   $cquery .= " WHERE (id = '$cid_producto')";
   subirimagen();
   
   if ( editarDatos($pconexion, $cquery) )
     $curl = "Location:".$GLOBALS["raiz_sitio"]."productos.php";  
   else
     $curl =
"Location:".$GLOBALS["raiz_sitio"]."editarProducto.php?cid_producto=$cid_producto";  
    
   cerrarConexion($pconexion);
   header($curl);
   exit();
 }

?>