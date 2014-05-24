function Agregar(){
    var producto_id = document.getElementById("producto_id").attributes.value.value;
    var producto_talla = document.getElementById("talla").value;
    var producto_cantidad = document.getElementById("cantidad").value;
    var producto_nombre = document.getElementById("producto_nombre").value;
    var producto_precio = document.getElementById("producto_precio").value;
    //var cantidad = txt_cantidad.value;
    console.log("talla: "+producto_talla);
    console.log("cantidad: "+producto_cantidad);
    productos = GetCookie("productos",document.cookie);
    if (productos == "") productos = 0;
    productos = Number(productos) + 1;
    SetCookie("productos",productos);
    SetCookie("prod_id" + productos,producto_id);
    SetCookie("prod_talla" + productos,producto_talla);
    SetCookie("prod_cantidad" + productos,producto_cantidad);
    SetCookie("prod_nombre"+productos, producto_nombre);
    console.log(GetCookie("prod_nombre"+productos, document.cookie));
    SetCookie("prod_precio"+productos, producto_precio);
    console.log(GetCookie("prod_precio"+productos, document.cookie));
    //SetCookie("cant" + productos,cantidad);
    console.log(productos);
    console.log(GetCookie("prod_id"+productos, document.cookie));
}

window.onload = function(){
    //Vaciar();
    var btn_agregar = document.getElementById("agregar");
    btn_agregar.onclick = Agregar;
}