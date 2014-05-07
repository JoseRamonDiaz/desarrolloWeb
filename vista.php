<?php
include_once("./funciones/config.inc.php"); 
include_once("./funciones/acceder_base_datos.php");
include_once("./funciones/listar.php");
$adatos;
$adatos = recuperarInfoProducto($_GET["cid_producto"]);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/aluxe.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="imagenes/favicon.ico" />
    <!-- InstanceBeginEditable name="doctitle" -->
<title>Tienda Alux</title>

<!-- InstanceEndEditable -->

        <div id="content">
        <!-- InstanceBeginEditable name="RegionParaEditar" -->
<div class="detalles_producto" align="center"> 
	<img src="imagenes/<?php echo $adatos["imagen"] ?>" width= "250px" height= "250px"/>
    <div id="detalles">
        <font size="+1"> <b>Modelo: </b>  <?php echo  utf8_encode ( $adatos["modelo"])?> </font><br />
        <font size="+1"> <b>Colores: </b> <?php echo $adatos["color"]?> </font><br />
      <font size="+1"> <b>Tallas: </b> <?php echo $adatos["talla1"]?> <?php echo $adatos["talla2"]?> <?php echo $adatos["talla3"]?>  <?php echo $adatos["talla4"]?>  <?php echo $adatos["talla5"]?> </font> <br />
        <font size="+1"> <b>Precio: </b><?php echo $adatos["precio"]?></font><br />
       <!-- <font size="+1"> <b> Disponibles: </b> <?php// echo $adatos["cantidad"]?> </font><br />--->
        <input type="button" value="Agregar" name="agregar" id="agregar" class="agregar"/> <img src="imagenes/carrito.png" width="30px" height="20px">
    
    </div>
</div>


</body>
<!-- InstanceEnd --></html>
