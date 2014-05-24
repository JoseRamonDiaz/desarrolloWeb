/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
		alert("¡Producto Registrado con exito!");
        return true;
    }
    else{
        provideFeedback(errores);
		alert("Por favor llene los campos obligatorios.");
        return false;
    }
}

window.onload = function(){
    document.getElementById("frm_agregar").onsubmit = validarForm;
    //console.log(tallaValida("XL"));
}


