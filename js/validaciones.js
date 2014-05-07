function validarForm(){
    var errores = new Array();
    var nombre = document.getElementById("nombre").value;
    var color = document.getElementById("color").value;
    var precio = document.getElementById("precio").value;
    var talla = document.getElementById("talla1").value;
    var categoria = document.getElementById("tipo_id").value;
    var modelo = document.getElementById("modelo_id").value;
    var descripcion = document.getElementById("descripcion").value;
    var imagen = document.getElementById("imagen").value;
    
    removeFeedback();
    
    if(!nombreValido(nombre))
        errores.push("nombre");
    if(!precioValido(precio))
        errores.push("precio");
    if(!tallaValida(talla))
        errores.push("talla1");
    if(!colorValido(color))
        errores.push("color");
    if(!categoriaValida(categoria))
        errores.push("tipo_id");
    if(!modeloValido(modelo))
        errores.push("modelo_id");
    if(!descripcionValida(descripcion))
        errores.push("descripcion");
    if(!imagenValida(imagen))
        errores.push("imagen");
        
    var isValid = errores=="";
    if(isValid){
        return true;
    }
    else{
        provideFeedback(errores);
        return false;
    }
}

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
