<?php

 function listarmodelos(){

 $copciones = "";
 $pconexion = abrirConexion();
 seleccionarBaseDatos($pconexion);
 
$cquery = "SELECT * FROM modelo";
 $cquery .= " ORDER BY nombre ASC";
 
 $lresult = mysql_query($cquery, $pconexion);
 if ( $lresult ){
   
   if (mysql_num_rows($lresult) > 0){          
     if (  !$_POST["modelo_id"] || !isset($_POST["modelo_id"]) || $_POST["modelo_id"]=="0"){	 
	   while ( $adatos = mysql_fetch_array($lresult) ){
	     $copciones .= "<option value=\"".$adatos["id"]."\">";
	     $copciones .= $adatos["nombre"];
	     $copciones .= "</option>\n"; 
	   } //while     
	 } 
	 else{	   
	   while ( $adatos = mysql_fetch_array($lresult) ){
	     if ( $_POST["modelo_id"] == $adatos["id"] )
		   $copciones .= "<option value=\"".$adatos["id"]."\" selected>";
		 else
		   $copciones .= "<option value=\"".$adatos["id"]."\">";
	     $copciones .= $adatos["nombre"];
	     $copciones .= "</option>\n";
	   }	   
	 } //else	 
   }
   
 } 
 
 cerrarConexion($pconexion);
 return $copciones;

} 


?>