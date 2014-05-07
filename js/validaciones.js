function validarForm(){
    var nombre = document.getElementById("nombre").value;
    var color = document.getElementById("color").value;
    var precio = document.getElementById("precio").value;
    var talla = document.getElementById("talla1").value;
        
    var isValid = nombreValido(nombre) && colorValido(color) && precioValido(precio) && tallaValida(talla);
    if(isValid)
        return true;
    else
        return false;
}

function nombreValido(nombre){
	var vacio = isEmpty(nombre);
	var contieneNumero = hasNumber(nombre);
	return !vacio && !contieneNumero;
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
		case "XL":
		case "CH":
		case "M":
		case "L":
		case "XXL":
                case "":
		return true;
		default: 
		return false;
	}
}

function isEmpty(cadena){
	return cadena == "";
}

//Implementar la funcion
function hasNumber(cadena){
	return /\d/i.test(cadena);
}

//Implementar funcion
function isNumber(cadena){
	return /^\d+$/.test(cadena);
}

window.onload = function(){
    document.getElementById("frm_agregar").onsubmit = validarForm;
    //console.log(tallaValida("XL"));
}
