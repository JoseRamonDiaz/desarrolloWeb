<?php
include_once("./funciones/config.inc.php"); 
include_once("./funciones/acceder_base_datos.php");
include_once("./funciones/listar.php");
	session_start();
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
    <script src="js/cookie.js"></script>
    <script src="js/cerrarSesion.js"></script>
    <!-- InstanceBeginEditable name="doctitle" -->
<title>Tienda Alux</title>

<!-- InstanceEndEditable -->
    <!-- InstanceBeginEditable name="head" -->
     <script src="js/agregar.js"></script>
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
                                <!--<li> <a href="../historial.php">Transacciones</a></li> -->
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
   <input type="text" onkeydown="this.style.color = '#ffffff';" onclick="this.value = '';" value="Buscar productos por nombre y precio" name="search"/> 
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
<div class="detalles_producto" align="center"> 
	<img src="imagenes/<?php echo $adatos["imagen"] ?>" width= "250px" height= "250px"/>
    <div id="detalles">
    
        <font size="+1"> <b><?php echo  utf8_encode ( $adatos["nombre"])?> </b></font><br />
        <font size="+1"> <b>Modelo: </b>  <?php echo  utf8_encode ( $adatos["modelo"])?> </font><br />
        <font size="+1"> <b>Colores: </b> <?php echo $adatos["color"]?> </font><br />
      <font size="+1"> <b>Tallas: </b> <?php echo $adatos["talla1"]?> <?php echo $adatos["talla2"]?> <?php echo $adatos["talla3"]?>  <?php echo $adatos["talla4"]?>  <?php echo $adatos["talla5"]?> </font> <br />
        <font size="+1"> <b>Precio: </b><?php echo $adatos["precio"]?></font><br />
       <!-- <font size="+1"> <b> Disponibles: </b> <?php// echo $adatos["cantidad"]?> </font><br />--->
       
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
        <?php 
		if(isset($_SESSION['cidusuario'])) {
         if(isset($_SESSION['esAdmin']) && !$_SESSION['esAdmin']){ ?>
        <input type="button" value="Agregar" name="agregar" id="agregar" class="agregar"/>
        <img src="imagenes/carrito.png" width="30px" height="20px">
        <?php }
		}
		?>
      
            <?php
            echo '<input id="producto_id" type="hidden" value="'.$id.'"/>';
            echo '<input id="producto_nombre" type="hidden" value="'.$adatos["nombre"].'"/>';
            echo '<input id="producto_precio" type="hidden" value="'.$adatos["precio"].'"/>';
            ?>
        </div>
   
</div>

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
