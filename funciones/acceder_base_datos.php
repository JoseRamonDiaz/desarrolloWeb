<?php
include_once("config.inc.php");
function abrirConexion(){
  //Abre una conexi�n con la base de datos
  $pconector = mysql_connect($GLOBALS["servidor"],$GLOBALS["usuario"],$GLOBALS["contrasena"]) or die(mysql_error());
  return $pconector;
}
//--------------------------------
function seleccionarBaseDatos($pconector){
 //Permite seleccionar una base de datos
 mysql_select_db($GLOBALS["base_datos"],$pconector) or die(mysql_error($pconector));
}
//--------------------------------
function cerrarConexion($pconector){
 //Cierra una conexi�n con la base de datos
 mysql_close($pconector);
}

//--------------------------------
function existeRegistro($cquery, $pconector){

 //Verifica la existencia de la informaci�n solicitada (a trav�s de una sentencia SQL) en la base de datos
 $lexiste_referencia = true;
 $lresult = mysql_query($cquery, $pconector);
 
 if (!$lresult){
   $cerror = "No fue posible recuperar la informaci�n de la base de datos.<br>";
   $cerror .= "SQL: $cquery <br>";
   $cerror .= "Descripci�n: ".mysql_error($pconector);
   die($cerror);   
 }
 else{
   //Verifica que no exista un registro igual al que se va a insertar
   if ( mysql_num_rows($lresult) == 0 )
     $lexiste_referencia = false;   
 }   
 return $lexiste_referencia;
 
}
//--------------------------------
function insertarDatos($cquery, $pconector){

 //Inserta un registro en la base de datos
 $lentrada_creada = false;
 $lresult = mysql_query($cquery, $pconector);
 
 //mysql_query($cquery2, $pconector);
 if (!$lresult){   
   $cerror = "Ocurri� un error al acceder a la base de datos.<br>";
   $cerror .= "SQL: $cquery <br>";
   $cerror .= "Descripci�n: ".mysql_error($pconector);
   die($cerror);
 }
 else{
   if (mysql_affected_rows($pconector) >= 1)
     $lentrada_creada = true;
 }
     
 return $lentrada_creada;
}
//--------------------------------
function extraerRegistro($pconector, $cquery){

	//Lee informaci�n solicitada (a trav�s de una sentencia SQL) de la base de datos y la almacena
	//en un arreglo que devuelve como par�metro de salida
	//Advertencia: utilizar esta funci�n �nicamente cuando se espere un s�lo registro como resultado
	
	$aregistro = array();
	
	$lresult = mysql_query($cquery, $pconector);
	
	if (!$lresult){ 
		$cerror = "No fue posible recuperar la informaci�n de la base de datos.<br>";
		$cerror .= "SQL: $cquery <br>";
		$cerror .= "Descripci�n: ".mysqli_connect_error($pconector);
		die($cerror);    
	}
	else{
		if (mysql_num_rows($lresult) == 1){          
			$aregistro = mysql_fetch_array($lresult);    
		}
	}
	reset($aregistro);
	return $aregistro; 
}

//--------------------------------
function editarDatos($pconector, $cquery){

 //Modifica, edita o actualiza uno o m�s registros de la base de datos
 $ledicion_completada = false; 
  $lresult = mysql_query($cquery, $pconector);
 if (!$lresult){
   $cerror = "Ocurri� un error al acceder a la base de datos.<br>";
   $cerror .= "SQL: $cquery <br>";
   $cerror .= "Descripci�n: ". mysqli_connect_error($pconector);
   die($cerror);
 }
 else 
   $ledicion_completada = true; 
     
 return $ledicion_completada;
}
?>