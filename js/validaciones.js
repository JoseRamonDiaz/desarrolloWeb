function provideFeedback(errores){
    for(var i = 0; i < errores.length; i++){
        document.getElementById(errores[i]).setAttribute("class", "errorClass");
        document.getElementById(errores[i]+"Error").setAttribute("class", "errorSpan");
    }
    document.getElementById("errorDiv").innerHTML = "<p>Se han encontrado algunos errores</p>";
}

function removeFeedback(){
    document.getElementById("errorDiv").innerHTML = "";
    var entradas = document.getElementsByTagName("input");
    var entradasSelect = document.getElementsByTagName("select");
    var entradasTextArea = document.getElementsByTagName("textarea");
    
    for(var i = 0; i < entradas.length; i++){
        var clase = entradas[i].getAttribute("class");
        if(clase != null && clase.indexOf("errorClass") > -1){
            entradas[i].removeAttribute("class");
        }
    }
    
    for(var i = 0; i < entradasSelect.length; i++){
        var clase = entradasSelect[i].getAttribute("class");
        if(clase != null && clase.indexOf("errorClass") > -1){
            entradasSelect[i].removeAttribute("class");
        }
    }

    for(var i = 0; i < entradasTextArea.length; i++){
        var clase = entradasTextArea[i].getAttribute("class");
        if(clase != null && clase.indexOf("errorClass") > -1){
            entradasTextArea[i].removeAttribute("class");
        }
    }

    var spans = document.getElementsByTagName("span");
    for(var i = 0; i < spans.length; i++){
        var clase = spans[i].getAttribute("class");
        if(clase != null && clase.indexOf("errorSpan") > -1){
            spans[i].setAttribute("class", "errorFeedback errorSpan");
        }
    }
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

function tallaValida2(talla2){
	switch(talla2){
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

function tallaValida3(talla3){
	switch(talla3){
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

function tallaValida4(talla4){
	switch(talla4){
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

function tallaValida5(talla5){
	switch(talla5){
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

function categoriaValida(categoria){
    return categoria != 0;
}

function modeloValido(modelo){
    return modelo != 0;
}

function descripcionValida(descripcion){
    return !isEmpty(descripcion);
}

function imagenValida(imagen){
    return !isEmpty(imagen);
}

function emailValido(email){
    var mailRegexp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return mailRegexp.test(email);
}

function telValido(tel){
    var telRegexp = /^\d{10}$/;
    return telRegexp.test(tel);
}

function direccionValida(direccion){
    return !isEmpty(direccion);
}

function ciudadValida(ciudad){
    return !isEmpty(ciudad);
}

function usuarioValido(usuario){
    return !isEmpty(usuario);
}

function passValido(pass){
    return !isEmpty(pass);
}

function pass2Valido(pass, pass2){
    return pass == pass2;
}

function tarjetaValida(tarjeta){
    return tarjeta != 0;
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