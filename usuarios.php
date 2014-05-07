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
   pic3.src = 'imagenes/GuayaberaNiños.jpg';
   pic4 = new Image();
   pic4.src = 'imagenes/VestidosNiñas.jpg';
  </script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div id="container">
<div class="Inicio" >
<div id="menuprincipal">
<ul class="menu">
    <li> <a href="index.php" >Inicio</a></li>
    <li> <a href="cesta.php">Cesta</a></li>
    <li> <a href="historial.php">Transacciones</a></li>
    <li> <a href="perfil.php">Perfil</a></li>
    <li> <a href="contacto.php" >Contacto</a></li>
   
</ul>
</div>

<div id="bienvenido" >
<ul class="menu">


<?php
session_start(); 
if(isset($_SESSION['cidusuario'])) {
	
	?>
	
    <li><a href="agregarproducto.php">Agregar Productos</a></li>
<li><a href="cerrar_sesion.php">Cerrar sesion  ( <?php echo ($_SESSION["cidusuario"]); ?> ) </a></li>
<?php
} else {
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
    <li> <a href="guayaberas.php" >Guayaberas</a> 
    <ul>
    <li> <a href="guayaberascaballeros.php">Caballeros</a></li>
    <li> <a href="guayaberasniños.php">Niños</a></li>
    
    </ul>
    </li>
    <li> <a href="vestidos.php">Vestidos</a>
        <ul>
        	<li> <a href="vestidosdama.php">Damas</a></li>
            <li> <a href="vestidosnina.php">Niñas</a></li>
            
        </ul> 
    </li>
    <li> <a href="zapatos.php" >Zapatos</a>
    	<ul>
        	<li> <a href="zapatoscaballero.php">Caballeros</a></li>
            <li> <a href="zapatosdama.php">Damas</a></li>
            <li> <a href="zapatosnino.php">Niños</a></li>
            <li> <a href="zapatoninas.php">Niñas</a></li>
        </ul> 
    </li>
</ul>

</div>



<!-- InstanceBeginEditable name="RegionParaEditar" -->RegionParaEditar<!-- InstanceEndEditable -->


<div id="footer">
    <div class="column">
      <h3>Información</h3>
      <ul>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="terminos.php">Terminos y Condiciones</a></li>
                <li><a href="politicas.php">Politicas de Privacidad</a></li>
                <li><a href="historia.php">Historia de Yucatán</a></li>
              </ul>
    </div>
    <div class="column">
      <h3>Servicio Clientes</h3>
      <ul>
        <li><a href="contacto.php">Contacto</a></li>
        <!--<li><a href="devoluciones.html">Devoluciones</a></li>-->
      </ul>
    </div>

    <div class="column">
      <h3>Cuenta</h3>
      <ul>
      <li><a href="perfil.php">Perfil</a></li>
        <li><a href="historial.php">Transacciones</a></li>
        <li><a href="cesta.php">Cesta</a></li>
        
      </ul>
    </div>
	<div class="column" style="border-right: none;">
	  <div id="powered">Alux &copy; 2014</div>
	</div>
  </div>
</div>

</body>
<!-- InstanceEnd --></html>
