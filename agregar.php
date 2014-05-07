<?php

 function listarTipos(){

 $copciones = "";
 $pconexion = abrirConexion();
 seleccionarBaseDatos($pconexion);
 
$cquery = "SELECT * FROM tipo";
 $cquery .= " ORDER BY nombre_tipo ASC";
 
 $lresult = mysql_query($cquery, $pconexion);
 if ( $lresult ){
   
   if (mysql_num_rows($lresult) > 0){          
     if (  !$_POST["tipo_id"] || !isset($_POST["tipo_id"]) || $_POST["tipo_id"]=="0"){	 
	   while ( $adatos = mysql_fetch_array($lresult) ){
	     $copciones .= "<option value=\"".$adatos["id"]."\">";
	     $copciones .= $adatos["nombre_tipo"];
	     $copciones .= "</option>\n";
	   } //while     
	 } 
	 else{	   
	   while ( $adatos = mysql_fetch_array($lresult) ){
	     if ( $_POST["tipo_id"] == $adatos["id"] )
		   $copciones .= "<option value=\"".$adatos["id"]."\" selected>";
		 else
		   $copciones .= "<option value=\"".$adatos["id"]."\">";
	     $copciones .= $adatos["nombre_tipo"];
	     $copciones .= "</option>\n";
	   }	   
	 } //else	 
   }
   
 } 
 
 cerrarConexion($pconexion);
 return $copciones;

} 

function agregarProducto(){


 $cmensaje = "";
 if ( isset($_POST["btn_grabar"]) && $_POST["btn_grabar"] == "Guardar"){
	 
	 
 
   $cnombre = $_POST["nombre"];
   $cprecio = $_POST["precio"];
   $ccategoria = $_POST["tipo_id"];
   $modelo = $_POST["modelo_id"];
   $ctalla = $_POST["talla"];
   $ccolor = $_POST["color"];
   $ccantidad = $_POST["cantidad"];
   $cdescripcion = $_POST["des"];
   //$cimagen = $_POST["imagen"];
    $nombre = $_FILES['imagen']['name'];
   
 
   
   $pconexion = abrirConexion();
   seleccionarBaseDatos($pconexion);
   
  $cquery = "SELECT nombre FROM producto";
   $cquery .= " WHERE nombre = '$cnombre'";
   
   if ( !existeRegistro($cquery, $pconexion) ){
	   
	   
	 
	   $cquery = "INSERT INTO producto";
	   $cquery .= " (tipo, precio, nombre, talla, cantidad, color, descripcion, id_modelo, imagen)";
	   $cquery .= " VALUES ('$ccategoria', '$cprecio', '$cnombre', '$ctalla', '$ccantidad', '$ccolor','$cdescripcion', '$modelo', '$nombre')";
	    subirimagen();
	   if (insertarDatos($cquery, $pconexion) )
	     $cmensaje = "Producto registrado";
	   else
	     $cmensaje = "No fue posible registrar el producto en el catálogo";	 
   }
   else
     $cmensaje = "Ya existe un producto con el nombre: $cusuario";
	 
   cerrarConexion($pconexion);
 
 }

 return $cmensaje;
} 

function subirimagen(){
	$pconexion = abrirConexion();
 seleccionarBaseDatos($pconexion);
 if ( isset($_POST["btn_grabar"]) && $_POST["btn_grabar"] == "Guardar")	{
	if ($_FILES["imagen"]["error"] > 0){
  echo "ha ocurrido un error";
} else {
  //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
  //y que el tamano del archivo no exceda los 100kb
  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
  $limite_kb = 100;
  
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
        @mysql_query("INSERT INTO producto (imagen) VALUES ('$nombre')") ;
        echo "el archivo ha sido movido exitosamente";
      } else {
        echo "ocurrio un error al mover el archivo.";
      }
    } else {
      echo $_FILES['imagen']['name'] . ", este archivo existe";
    }
  } else {
    echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
  }
}
	}


}

?>