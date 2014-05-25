<?php
include_once("config.inc.php"); 
include_once("acceder_base_datos.php");


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
	   $cquery .= " JOIN talla ON talla.id_producto = producto.id";  
	$cquery .= " SET tipo = '$ccategoria',";
   $cquery .= " precio = '$cprecio',";
   $cquery .= " nombre = '$cnombre',";
   $cquery .= " color = '$ccolor',";
   $cquery .= " descripcion = '$cdescripcion',";
   $cquery .= " id_modelo = '$modelo',";
    $cquery .= " imagen = '$nombre',";
   $cquery .= " talla1 = '$ctalla1',";
   $cquery .= " cantidad1 = '$cantidad1',";
   $cquery .= " talla2 = '$ctalla2',";
   $cquery .= " cantidad2 = '$cantidad2',";
   $cquery .= " talla3 = '$ctalla3',";
   $cquery .= " cantidad3 = '$cantidad3',";
   $cquery .= " talla4 = '$ctalla4',";
   $cquery .= " cantidad4 = '$cantidad4',";
   $cquery .= " talla5 = '$ctalla5',";
   $cquery .= " cantidad5 = '$cantidad5'";
 
   $cquery .= " WHERE (producto.id = '$cid_producto')";
   subirimagen2();
   
   if ( editarDatos($pconexion, $cquery) )
     $curl = "Location:".$GLOBALS["raiz_sitio"]."productos.php";  
   else
     $curl =
"Location:".$GLOBALS["raiz_sitio"]."editarProducto.php?cid_producto=$cid_producto";  
    
   cerrarConexion($pconexion);
   header($curl);
   exit();
 }


function subirimagen2(){
	$pconexion = abrirConexion();
 seleccionarBaseDatos($pconexion);
 if ( isset($_POST["btn_grabar"]) && $_POST["btn_grabar"] == "Guardar")	{
	if ($_FILES["imagen"]["error"] > 0){
  echo "ha ocurrido un error";
} else {
  //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
  //y que el tamano del archivo no exceda los 100kb
  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
  $limite_kb = 900;
  
  if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
    //esta es la ruta donde copiaremos la imagen
    //recuerden que deben crear un directorio con este mismo nombre
    //en el mismo lugar donde se encuentra el archivo subir.php
    $ruta = "imagenes/" . $_FILES['imagen']['name'];
    //comprobamos si este archivo existe para no volverlo a copiar.
    //pero si quieren pueden obviar esto si no es necesario.
    //o pueden darle otro nombre para que no sobreescriba el actual.
    if (!file_exists($ruta)){
      //aqui movemos el archivo desde la ruta temporal a nuestra ruta
      //usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
      //almacenara true o false
      $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
      if ($resultado){
		  $nombre = $_FILES['imagen']['name'];
        //@mysql_query("INSERT INTO producto (imagen) VALUES ('$nombre')") ;
       // echo "el archivo ha sido movido exitosamente";
      } else {
        //echo "ocurrio un error al mover el archivo.";
      }
    } else {
      //echo $_FILES['imagen']['name'] . ", este archivo existe";
    }
  } else {
    //echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
  }
}
	}


}

?>