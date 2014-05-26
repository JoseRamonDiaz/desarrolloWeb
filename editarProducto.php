<?php
include_once("./funciones/config.inc.php"); 
include_once("./funciones/acceder_base_datos.php");
include_once("./funciones/listar.php");
include_once("./funciones/editarp.php");
include_once("./funciones/agregar.php");
include_once("modelo.php");
$adatos;
$adatos = recuperarInfoProducto2($_GET["cid_producto"]);
include_once("funciones/mantener_sesion.php");
validarSesion();

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
	  <script src="js/validarAgregarProducto.js"></script>
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
}

   </script>
<!-- InstanceEndEditable -->
</head>

<body>
    <div id="container">
        <div id="header">
            <div class="Inicio" >
            	<div id="menuprincipal">
                    <ul class="menu">
                    <?php
                    	if(isset($_SESSION['cidusuario'])) {
                    ?>
                    			<li> <a href="index.php" >Inicio</a></li>
                    <?php
                        	if(isset($_SESSION['esAdmin']) && !$_SESSION['esAdmin']) {
                    ?>
                                
                                <li> <a href="cesta.php">Cesta</a></li>
                                <li> <a href="historial.php">Transacciones</a></li> 
                                <li> <a href="contacto.php" >Contacto</a></li>
					<?php
                    		}
                        }
                        else{
                    ?>
                    		<li> <a href="index.php" >Inicio</a></li>
                            <li> <a href="contacto.php" >Contacto</a></li>
                    <?php
                            }
                    ?>
           			</ul>
            	</div>
            
                <div id="bienvenido" >
                 
                    <ul class="menu">
                        <?php
                            if(isset($_SESSION['cidusuario'])) {
                            	if(isset($_SESSION['esAdmin']) && $_SESSION['esAdmin']) {
                        ?>   
                        <li> <a>Administración</a> 
                        <ul>
                            <li> <a href="usuarios.php">Usuarios</a></li>
                            <li> <a href="productos.php">Productos</a></li>
                           <!-- <li> <a href="editarproducto.php">Editar&nbsp;Producto</a></li> -->
                            
                        </ul>
                    </li>
                    
                    
						<?php
                        		}
                        ?>
                            	<li>  <a href="perfil.php?cidusuario=<?php echo ( $_SESSION['cidusuario'])?> " > Perfil</a></li>
                            	<li><a href="Javascript:cerrarCesion()">Cerrar sesión  ( <?php echo ($_SESSION["cidusuario"]); ?> ) </a></li>
                        <?php
                            } 
                            else {
                        ?>
                            <li><a href="crearcuenta.php" >Crear cuenta </a></li>
                            <li><a href="sesion.php">Iniciar sesión</a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
              </div>  
        	
            
            <div class="header">
                <div id="logo"><a href="index.php"><img src="imagenes/logoo.png" width="250" height="158"/></a></div>
                <div id=carrito ><img  src="imagenes/carrito.png" width="100" height="80" /> </div>
                <div id="busqueda"> 
                    <div id="botonbusqueda"> </div>
                    <FORM METHOD=GET ACTION="buscar.php ">
   <input type="text"  placeholder="Buscar productos" name="search"/> 
</FORM>
   
                </div>
            </div>
            
        	<br />
            
            <div id="menuprincipal"> 
            
                <ul class="menu">
                    <li> <a href="caballeros.php" >Caballeros</a> 
                        <ul>
                            <li> <a href="guayaberascaballeros.php">Guayaberas</a></li>
                            <li> <a href="pantalonescaballeros.php">Pantalones</a></li>
                            <li> <a href="zapatoscaballeros.php">Zapatos</a></li>
                        </ul>
                    </li>
                    <li> <a href="damas.php">Damas</a>
                        <ul>
                            <li> <a href="vestidosdama.php">Vestidos</a></li>
                            <li> <a href="zapatosdama.php">Zapatos</a></li>
                        </ul> 
                    </li>
                    <li> <a href="ninos.php" >Niños</a>
                        <ul>
                            <li> <a href="guayaberasninos.php">Guayaberas</a></li>
                            <li> <a href="pantalonesninos.php">Pantalones</a></li>
                            <li> <a href="zapatosninos.php">Zapatos</a></li>
                        </ul> 
                    </li>
                    <li> <a href="ninas.php" >Niñas</a>
                    	<ul>
                    		<li> <a href="vestidosninas.php">Vestidos</a></li>
                            <li> <a href="zapatosninas.php">Zapatos</a></li>
                        </ul>
                    </li>
                </ul>
            
            </div>
        </div> 
        
        <div id="content">
        <!-- InstanceBeginEditable name="RegionParaEditar" -->

<h1>Editar producto </h1>
<form name="frm_editar" method="post" action="funciones/editarp.php" enctype="multipart/form-data" id="frm_agregar">
    <div id="errorDiv"></div>
<input type="hidden" value="<?php echo $adatos["id"]?>" name="id" />
<div class="form">
 <table class="tabla1">
 
<th> Datos obligatorios </th>
<tr> </tr>
<br />
<td>Nombre del producto:</td> <td> <input type="text"  name="nombre" value="<?php echo $adatos["nombre"]?>" id="nombre"/>
    <span id="nombreError" class="errorFeedback errorSpan">El nombre es incorrecto</span>
</td>
<tr> </tr>
<td>Precio:</td> <td><input type="text"  name="precio" value="<?php echo $adatos["precio"]?>" id="precio"/>
<span id="precioError" class="errorFeedback errorSpan">El precio es incorrecto</span>
</td>
<tr> </tr>
<td>Categoría:  <b><?php echo $adatos["categoria"]?> </b></td> 
<td> 
<select name="tipo_id" id="tipo_id">
          <option value="0"></option>
          <?php echo listarTipos(); ?>
        </select>
    <span id="tipo_idError" class="errorFeedback errorSpan">Por favor seleccione una categoria</span>
</td>

<tr> </tr>
<td>Modelo: <b><?php echo $adatos["modelo"]?> </b></td> 
<td> 
<select name="modelo_id" id="modelo_id">
          <option value="0" ></option>
          <?php echo utf8_encode(listarmodelos()); ?>
        </select>
    <span id="modelo_idError" class="errorFeedback errorSpan">Por favor seleccione un modelo</span>
</td>
<tr> </tr>

<td>talla 1:</td> <td><input type="text" name="talla1" id="talla1" value="<?php echo $adatos["talla1"]?>" />
<span id="talla1Error" class="errorFeedback errorSpan">La talla es incorrecta, Ejem. CH,M,L,XL,XXL</span>
</td>

<tr> </tr>

<td>Cantidad disponible:</td> <td><input type="text" name="ctalla1" id="tallaXS" value="<?php echo $adatos["cantidad1"]?>" /> </td>

<tr> </tr>
<td> talla 2:</td> <td><input type="text" name="talla2" id="talla2" value="<?php echo $adatos["talla2"]?>" /> 
<span id="talla2Error" class="errorFeedback errorSpan">La talla es incorrecta, Ejem. CH,M,L,XL,XXL</span>
</td>

<tr> </tr>

<td>Cantidad disponible:</td> <td><input type="text" name="ctalla2" id="tallaXS" value="<?php echo $adatos["cantidad2"]?>" /> </td>


<tr> </tr>
<td> talla 3:</td> <td><input type="text" name="talla3" id="talla3" value="<?php echo $adatos["talla3"]?>" /> 
<span id="talla3Error" class="errorFeedback errorSpan">La talla es incorrecta, Ejem. CH,M,L,XL,XXL</span>
</td>

<tr> </tr>

<td>Cantidad disponible:</td> <td><input type="text" name="ctalla3" id="tallaXS" value="<?php echo $adatos["cantidad3"]?>" /> </td>

<tr> </tr>
<td>talla 4:</td> <td><input type="text" name="talla4" id="talla4" value="<?php echo $adatos["talla4"]?>" /> 
<span id="talla4Error" class="errorFeedback errorSpan">La talla es incorrecta, Ejem. CH,M,L,XL,XXL</span>
</td>

<tr> </tr>

<td>Cantidad disponible:</td> <td><input type="text" name="ctalla4" id="talla" value="<?php echo $adatos["cantidad4"]?>" /> </td>

<tr> </tr>
<td>talla 5:</td> <td><input type="text" name="talla5" id="talla5" value="<?php echo $adatos["talla5"]?>" /> 
<span id="talla5Error" class="errorFeedback errorSpan">La talla es incorrecta, Ejem. CH,M,L,XL,XXL</span>
</td>

<tr> </tr>
<td>Cantidad disponible:</td> <td><input type="text" name="ctalla5" id="talla" value="<?php echo $adatos["cantidad5"]?>" /> </td>


<tr> </tr>
<td>Colores:</td> <td><input type="text" name="color" id="color" value="<?php echo $adatos["color"]?>" />
    <span id="colorError" class="errorFeedback errorSpan">El color es incorrecto</span>
</td>
<!---<tr> </tr>
<td><span >*</span>Cantidad:</td> <td><input type="text" name="cantidad" id="cantidad" value="<?php // echo (isset($_POST["cantidad"]))?$_POST["cantidad"]:""; ?>" /> </td> --->
<tr> </tr>
<td>Descripció:</td> <td> <textarea  wrap="soft" name="des" id="descripcion" /><?php echo $adatos["descripcion"]?> </textarea>
    <span id="descripcionError" class="errorFeedback errorSpan">Por favor introduzca una descripción</span>
</td>
<tr> </tr>
<td> Imagen: <b> <?php echo $adatos["Imagen"]?></b></td> <td><input type="file" name="imagen" id="imagen" value="<?php echo $adatos["Imagen"]?>"/>
    <span id="imagenError" class="errorFeedback errorSpan">Por favor introduzca una imagen</span>
</td>
</table>
</div>
<div class="boton" align="center">
  <input type="submit" name="btn_grabar" value="Guardar" id="btn_grabar" class="botones"/><a href="productos.php"><input type="button" value="Cancelar" onclick="return confirmar(' ¿Est&aacute; seguro se perderan todos los cambios?')" class="botones" /> </a>
</div> </form>


<!-- InstanceEndEditable -->
        </div>
        
        <div id="footer">
            <div class="column">
              	<h3>¿Quiénes somos?</h3>
              	<ul>
                	<li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="historia.php">Historia de Yucatán</a></li>
				</ul>
            </div>
            
            <div class="column">
              	<h3>Privacidad y términos</h3>
              	<ul>
					<li><a href="terminos.php">Términos y Condiciones</a></li>
					<li><a href="politicas.php">Políticas de Privacidad</a></li>
              	</ul>
            </div>
            
            <div class="column">
            	<div id="powered">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alux &copy; 2014</div>
            </div>
    	</div>
    </div>

</body>
<!-- InstanceEnd --></html>