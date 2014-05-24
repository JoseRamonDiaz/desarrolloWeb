<?php
include_once("./funciones/config.inc.php"); 
include_once("./funciones/acceder_base_datos.php");
include_once("./funciones/listar.php");
$adatos;
$id = $_GET["cid_producto"];
$adatos = recuperarInfoProducto($id);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/aluxe.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="imagenes/favicon.ico" />
    <script src="js/agregar.js"></script>
    <script src="js/cookie.js"></script>
    <!-- InstanceBeginEditable name="doctitle" -->
<title>Tienda Alux</title>

<!-- InstanceEndEditable -->

        <div id="content">
        <!-- InstanceBeginEditable name="RegionParaEditar" -->
<div class="detalles_producto" align="center"> 
	<img src="imagenes/<?php echo $adatos["imagen"] ?>" width= "250px" height= "250px"/>
    <div id="detalles">
        <font size="+1"> <b><?php echo  utf8_encode ( $adatos["nombre"])?> </b></font><br />
        <font size="+1"> <b>Modelo: </b>  <?php echo  utf8_encode ( $adatos["modelo"])?> </font><br />
        <font size="+1"> <b>Colores: </b> <?php echo $adatos["color"]?> </font><br />
      <font size="+1"> <b>Tallas: </b> <?php echo $adatos["talla1"]?> <?php echo $adatos["talla2"]?> <?php echo $adatos["talla3"]?>  <?php echo $adatos["talla4"]?>  <?php echo $adatos["talla5"]?> </font> <br />
        <font size="+1"> <b>Precio: </b><?php echo $adatos["precio"]?></font><br />
       <!-- <font size="+1"> <b> Disponibles: </b> <?php// echo $adatos["cantidad"]?> </font><br />--->
        <div id="detalles_compra">
        <label for="cantidad">Cantidad:</label>
        <input type="number" min="1" value="1" name="cantidad" id="cantidad" class="cantidad"/>
        <label for="talla">Talla:</label>
        <select id="talla">
            <?php
                for($i = 1; $i < 6; $i++){
                    if($adatos["talla"."$i"] != ""){
                        echo '<option>'.$adatos["talla"."$i"].'</option>';
                    }
                }
            ?>
        </select><br/>
        
        <input type="button" value="Agregar" name="agregar" id="agregar" class="agregar"/>
        <img src="imagenes/carrito.png" width="30px" height="20px">
            <?php
            echo '<input id="producto_id" type="hidden" value="'.$id.'"/>';
            echo '<input id="producto_nombre" type="hidden" value="'.$adatos["nombre"].'"/>';
            echo '<input id="producto_precio" type="hidden" value="'.$adatos["precio"].'"/>';
            ?>
        </div>
    </div>
</div>


</body>
<!-- InstanceEnd --></html>
