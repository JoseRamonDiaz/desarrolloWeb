<?php
	session_start();
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
    <script>
       pic1 = new Image();
       pic1.src = 'imagenes/GuayaberaCaballeros.jpg';
       pic2 = new Image();
       pic2.src = 'imagenes/ZapatosCaballero.jpg';
       pic3 = new Image();
       pic3.src = 'imagenes/GuayaberaNinos.jpg';
       pic4 = new Image();
       pic4.src = 'imagenes/VestidosNinas.jpg';
      </script>
    <!-- InstanceBeginEditable name="head" -->
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
                            		<li><a href="usuarios.php">Usuarios</a></li>
                            		<li><a href="agregarproducto.php">Productos</a></li>
						<?php
                        		}
                        ?>
                            	<li> <a href="perfil.php">Perfil</a></li>
                            	<li><a href="cerrar_sesion.php">Cerrar sesion  ( <?php echo ($_SESSION["cidusuario"]); ?> ) </a></li>
                        <?php
                            } 
                            else {
                        ?>
                            <li><a href="crearcuenta.php" >Crear cuenta </a></li>
                            <li><a href="sesion.php">Iniciar sesion</a></li>
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
                    <input type="text" onkeydown="this.style.color = '#000000';" onclick="this.value = '';" value="Búsqueda" name="filter_name"/>
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
<div id="centro">
<div id="rotador" align="center">

 <p><img src="imagenes/bienvenido.png" style="width: 450px; height: 250px; border-width: 0px; border-style: solid;"
        border="0" id="r1" /></p>
        </div>
<table>
		<tr><td id="imagen1"><a href="guayaberascaballeros.php" 
	title="Guayabera para caballeros" onmouseover="document.getElementById('r1').src=pic1.src;">
	<img alt="Guayabera para caballeros" 
	src="imagenes/GuayaberaCaballeros.jpg" 
	style="width: 100px; height: 100px; border-width: 0px; border-style: solid;" /> </a></td>
	
   <td><a href="zapatoscaballeros.php" 
	title="Zapatos para caballero" onmouseover="document.getElementById('r1').src=pic2.src;">
	<img alt="Zapatos para caballeros" 
	src="imagenes/ZapatosCaballero.jpg" 
	style="width: 100px; height: 100px; border-width: 0px; border-style: solid;"/> </a></td>
  
  
  <td><a href="guayaberasninos.php" 
	title="Guayabera para niños" onmouseover="document.getElementById('r1').src=pic3.src;">
	<img alt="Guayabera para niños" 
	src="imagenes/GuayaberaNinos.jpg" 
	style="width: 100px; height: 100px; border-width: 0px; border-style: solid;"/> </a></td>
   
   
   <td><a href="vestidosninas.php" 
	title="Vestidos para niñas" onmouseover="document.getElementById('r1').src=pic4.src;">
	<img alt="Vestidos para niñas" 
	src="imagenes/VestidosNinas.jpg" 
	style="width: 100px; height: 100px; border-width: 0px; border-style: solid;"/> </a></tr>
   
   
   
	</table>
 </div>

<!-- InstanceEndEditable -->
        </div>
        
        <div id="footer">
            <div class="column">
              	<h3>Quiénes somos</h3>
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