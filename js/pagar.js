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

function crearInputHidden(){
    var inputHidden = document.getElementById("prodCant");   
    inputHidden.setAttribute("value",crearMatrizProdCant());
}

function verificarProdCant(){
    console.log(document.getElementById("prodCant").value);
}

window.onload = function(){
    muestraTotal();
    crearInputHidden();
    verificarProdCant();
}