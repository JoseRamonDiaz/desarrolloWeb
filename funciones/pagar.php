<?php
	function obtenerColumna($id, $talla){
		include_once('acceder_base_datos.php');
		
		$query = "SELECT talla1, talla2, talla3, talla4, talla5 FROM talla WHERE id_producto = $id";
		
		$conexion = abrirConexion();
		seleccionarBaseDatos($conexion);
		$adatos = extraerRegistro($conexion, $query); 
		cerrarConexion($conexion);
		
		if(!$talla || !in_array($talla, $adatos)){
			die('No se encontró la talla seleccionada.');	
		}
		
		$key = array_search($talla, $adatos);

		return $key;
	}

	include_once('acceder_base_datos.php');
	
	//$aProductos = array(0 => array('id' => 1,'talla'=>'M','cantidad'=>5), 1 => array('id' => 2,'talla'=>'G','cantidad'=>2), 2 => array('id' => 1,'talla'=>'CH','cantidad'=>3));
	$aProductos = json_decode($_POST['prodCant']);
	
	for($i=0; $i<count($aProductos); $i++){
		$producto = $aProductos[$i];
		
		$id = $producto[0];
		$cantidad = $producto[1];
		$talla = $producto[2];

		$key = obtenerColumna($id, $talla);

		$query = "UPDATE talla SET cantidad".($key+1)." = cantidad".($key+1)." - $cantidad WHERE id_producto = $id; ";
		$conexion = abrirConexion();
		seleccionarBaseDatos($conexion);
		editarDatos($conexion, $query);
		cerrarConexion($conexion);
	}
	$curl = "Location:".$GLOBALS["raiz_sitio"]."index.php";  
	header($curl);
	exit();
?>