function validarForm(){
    var errores = new Array();
    var nombre = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    
    removeFeedback();
    
    if(!nombreValido(nombre))
        errores.push("name");
    if(!emailValido(email))
        errores.push("email");
    if(isEmpty(subject))
        errores.push("subject");
    if(isEmpty(message))
        errores.push("message");
        
    var isValid = errores=="";
    if(isValid){
		alert("¡Mensaje enviado!");
        return true;
    }
    else{
        provideFeedback(errores);
		alert("Por favor revise sus datos");
        return false;
    }
}

window.onload = function(){
    document.getElementById("formContacto").onsubmit = validarForm;
}
