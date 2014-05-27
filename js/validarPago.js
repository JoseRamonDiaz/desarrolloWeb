function validarFrmAgregar(){
    var errores = new Array();
    
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellidos").value;
    var mail = document.getElementById("mail").value;
    var tel = document.getElementById("telefono").value;
    var direccion = document.getElementById("direc1").value;
    var ciudad = document.getElementById("ciudad").value;
    var usuario;
    var user = document.getElementById("usuario");
    if(user!=null)
        usuario = document.getElementById("usuario").value;
    var pass;
    var contra = document.getElementById("contrasena");
    if(contra!=null)
        pass = document.getElementById("contrasena").value;
    var pass2;
    //Esto es para cuando hay que validar editarUsuario.php, por que no tiene contrasena2
    var contra2 = document.getElementById("contrasena2");
    if(contra2 != null)
        pass2 = document.getElementById("contrasena2").value;
    
    removeFeedback();
    
    if(!nombreValido(nombre))
        errores.push("nombre");
    if(!nombreValido(apellidos))
        errores.push("apellidos");
    if(!emailValido(mail))
        errores.push("mail");
    if(!telValido(tel))
        errores.push("telefono");
    if(!direccionValida(direccion))
        errores.push("direc1");
    if(!ciudadValida(ciudad))
        errores.push("ciudad");
    if(user != null && !usuarioValido(usuario))
        errores.push("usuario");
    if(contra != null && !passValido(pass))
        errores.push("contrasena");
    if(contra2 != null && !pass2Valido(pass, pass2))
        errores.push("contrasena2")
    
    
    
    var isValid = errores=="";
    if(isValid){
		alert("¡Usuario Registrado con exito!");
        return true;
		
    }
    else{
        provideFeedback(errores);
		alert("Por favor llene los campos obligatorios.");
        return false;
    }
}

window.onload = function(){
    document.getElementById("frm_agregar").onsubmit = validarFrmAgregar;
}