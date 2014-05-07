function nombreValido(nombre){
	var isEmpty = isEmpty(nombre);
	var hasNumber = hasNumber(nombre);
	return !isEmpty && !hasNumber;
}

function colorValido(color){
	return nombreValido(color);
}

function precioValido(precio){
	return isNumber(precio);
}

//Puede no funcionar
function tallaValida(talla){
	switch(talla){
		case "":
		case "":
		case "":
		case "":
		case "":
		return true;
		break;
		default: 
		return false;
	}
}

function isEmpty(cadena){
	return cadena == "";
}

//Implementar la funcion
function hasNumber(cadena){
	return true;
}

//Implementar funcion
function isNumber(){
	return true;
}