function muestraTotal(){
    var label_total = document.getElementById("label_total");
    label_total.innerHTML = "Total: "+calculaTotal();   
}

window.onload = function(){
    muestraTotal();
}