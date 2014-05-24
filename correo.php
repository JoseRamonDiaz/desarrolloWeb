<?php
//Importamos las variables del formulario
foreach($_POST as $k => $v) {
	if(isset(${$k})) unset(${$k});
	if(in_array($k, array('name','email','subject','message')))
	${$k} = @get_magic_quotes_gpc() ? $v : @addslashes($v);
}
//Preparamos el mensaje de contacto
$cabeceras = "From: $email\n"; //La persona que envia el correo
 //. "Reply-To: $email\n";
$cabeceras .= 'CC: dario.ortiz@fmat.uady.mx' . "\r\n";
//$headers .= 'From: $email' . "\r\n";
//$headers .= 'Cc: dario.ortiz@example.com' . "\r\n";
$asunto = "$subject"; //El asunto
$email_to = "dario.ortiz@fmat.uady.mx"; //cambiar por tu email
$contenido = "$name le ha enviado el siguiente mensaje:\n"
. "\n"
. "$message\n"
. "\n";
//Enviamos el mensaje y comprobamos el resultado
if(@mail($email_to, $asunto ,$contenido ,$cabeceras )) {
//Si el mensaje se envia muestra una confirmacion
$cdestino = "Location:index.php";
		header($cdestino);
		exit();
}
?>