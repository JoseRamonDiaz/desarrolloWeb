<?php
	include_once("./funciones/config.inc.php"); 
	include_once("./funciones/acceder_base_datos.php");
	session_start();
	include_once("funciones/agregar.php");
	
include_once("modelo.php");
	
	 function BusquedaGeneral(){
	 
	 $busqueda = $_GET["search"];
	
	$ccontenido = "";
 //Conexión con la base de datos
 $pconexion = abrirConexion();
 //Selección de la base de datos
 seleccionarBaseDatos($pconexion);
 
 //Construcción de la sentencia SQL
 if($busqueda!=''){
 $cquery = "SELECT producto.id AS Id_Producto, producto.precio AS Precio, ";
 $cquery .= " producto.nombre AS Nombre, ";
 $cquery .= " producto.imagen AS Imagen";
  $cquery .= " FROM producto";
 $cquery .= " WHERE (producto.nombre LIKE '%$busqueda%' OR 
 producto.precio LIKE '%$busqueda%' OR producto.color LIKE '%$busqueda%')"; 
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
	 ?>
     
     
     <?php
	//--------------------------------------------------------------------------
		 function Busqueda(){
	 if ( isset($_POST["buscar"]) && $_POST["buscar"] == "Buscar"){
	 
	 
	 $busquedas = $_POST["search_name"];
	$busquedaTalla = $_POST["search_talla"];
	$busquedaCategoria =  $_POST["tipo_id"];
	$ccontenido = "";
 //Conexión con la base de datos
 $pconexion = abrirConexion();
 //Selección de la base de datos
 seleccionarBaseDatos($pconexion);
 
 //Construcción de la sentencia SQL
 
 if($busquedas!='' && $busquedaTalla!=''){
  $cquery = "SELECT producto.id AS Id_Producto, tipo.nombre_tipo AS tipo, producto.precio, producto.nombre AS Nombre,  producto.color AS Color, producto.descripcion, producto.imagen AS Imagen, talla.talla1 AS talla1, talla.talla2 AS talla2, talla.talla3 AS talla3, talla.talla4 AS talla4, talla.talla5 AS talla5
FROM producto
JOIN tipo ON producto.tipo = tipo.id
JOIN talla ON talla.id_producto = producto.id
WHERE producto.nombre LIKE '%$busquedas%' AND talla.talla1 LIKE '%$busquedaTalla%' AND tipo.id LIKE '%$busquedaCategoria%' ";

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
$ccontenido .= "<a href=\"vista.php?cid_producto=".$adatos['Id_Producto']."\"> <img src=imagenes/".$adatos["Imagen"]." width=\"150px\" height= \"150px\"/></a> <br/>";
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
                        ?>    <li> 
                            		<a href="usuarios.php">Usuarios</a> </li>
                                
                                    
                                    
                                   
                            		<li><a href="agregarproducto.php">Productos</a></li>
						<?php
                        		}
                        ?>
                            	<li>  <a href="perfil.php?cidusuario=<?php echo ( $_SESSION['cidusuario'])?> " > Perfil</a></li>
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
                    <FORM METHOD=GET ACTION="buscar.php ">
   <input type="text" onkeydown="this.style.color = '#ffffff';" onclick="this.value = '';" value="Buscar productos" name="search"/> 
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
	<div>
                    <form name="buscar" method="post" action="buscar.php">
  
                    <table>
  <tr> </tr>
 <td> <b>Buscar por </b> </td> 
 <tr> </tr>
 <td> Nombre 
 <input type="text" onkeydown="this.style.color = '#0000';" onclick="this.value = '';" value="Búsqueda" name="search_name"/>  
 </td>
 <td>&nbsp; </td>
 <td>Talla <input type="text" onkeydown="this.style.color = '#0000';" onclick="this.value = '';" value="Búsqueda" name="search_talla"/> </td>
 <td>&nbsp; </td>
 <td> Categoría 
 <select name="tipo_id" id="tipo_id">
          <option value="0"></option>
          <?php echo listarTipos(); ?>
        </select>
        <td>&nbsp; </td>
        <td> <input type="submit"  value="Buscar" name="buscar"/> </td>
       
        
        
</table>
  

</FORM>
    </div>
  <?php   if ( isset($_POST["buscar"]) && $_POST["buscar"] == "Buscar"){
	  ?>
       <div class="productos">
<ul class="lista_productos">
<?php echo Busqueda(); ?>

</ul>
</div>
	 <?php } else  { ?>
   
     <div class="productos">
<ul class="lista_productos">
<?php echo BusquedaGeneral(); ?>
</ul>
</div>
   
   <?php }?>


              
		
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
