function muestraTotal(){
    var label_total = document.getElementById("label_total");
    label_total.innerHTML = "Total: "+calculaTotal();   
}

function crearMatrizProdCant(){
    var numProductos = GetCookie("productos", document.cookie);
    var matrizProdCant = new Array();
    for(var i = 1; i <= numProductos; i++){
        var vectorProdCant = new Array();
        vectorProdCant.push(Number(GetCookie("prod_id"+i,document.cookie)));
        vectorProdCant.push(Number(GetCookie("prod_cantidad"+i, document.cookie)));
        vectorProdCant.push(GetCookie("prod_talla"+i, document.cookie));
        matrizProdCant.push(vectorProdCant);
    }
    return JSON.stringify(matrizProdCant);
}

function pagar(){
    var esValido = validarFormPagar();
    if(esValido)
        Vaciar();
    return esValido;
}

function validarFormPagar(){
    var errores = new Array();
    
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellidos").value;
    var codVerif = document.getElementById("codVerif").value;
    var cardNumber = document.getElementById("cardNumber").value;
    var direccion = document.getElementById("direc1").value;
    var tipoTarjeta = document.getElementById("tipoTarjeta").value;
    var mes = document.getElementById("mes").value;
    var anio = document.getElementById("anio").value;
    //var ciudad = document.getElementById("ciudad").value;
    
    removeFeedback();
    
    if(!nombreValido(nombre))
        errores.push("nombre");
    if(!nombreValido(apellidos))
        errores.push("apellidos");
    if(isEmpty(codVerif))
        errores.push("codVerif");
    if(isEmpty(cardNumber))
        errores.push("cardNumber");
    if(!direccionValida(direccion))
        errores.push("direc1");
    if(!tarjetaValida(tipoTarjeta))
        errores.push("tipoTarjeta"); 
    if(mes == 0)
        errores.push("mes");
    if(anio == 0)
        errores.push("anio");
    
    var isValid = errores=="";
    if(isValid){
        Vaciar();
        return true;	
    }
    else{
        provideFeedback(errores);
        return false;
    }
}

function crearInputHidden(){
    var inputHidden = document.getElementById("prodCant");   
    inputHidden.setAttribute("value",crearMatrizProdCant());
}

function verificarProdCant(){
    console.log(document.getElementById("prodCant").value);
}

window.onload = function(){
    //No funciona si el evento se llama con pagar()
    document.getElementById("credit_card").onsubmit = pagar;
    muestraTotal();
    crearInputHidden();
    verificarProdCant();
}