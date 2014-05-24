function muestraTablaProductos(){
    var tabla = document.getElementById("tablaCarrito");
    var contenidoTabla = crearContenidoTabla();
    tabla.innerHTML = contenidoTabla;
}

function crearContenidoTabla(){
    var contenidoTabla = '<tr>'+
    '<th class="primero" scope="col">Artículo</th>'+
    '<th width="10">&nbsp;</th>'+
    '<th scope="col">Talla</th>'+
    '<th width="10">&nbsp;</th>'+
    '<th scope="col">Cantidad</th>'+
    '<th width="10">&nbsp;</th>'+
    '<th scope="col">Precio unitario</th>'+
    '<th width="10">&nbsp;</th>'+
    '+<th scope="col">Subtotal</th>'+
    '<th width="10">&nbsp;</th>'+
    '<th class="ultimo" scope="col">&nbsp;</th>'+
    '</tr>';
    var numProductos = GetCookie("productos", document.cookie);
    for(var i = 1; i <= numProductos; i++){
        var cantidad = GetCookie("prod_cantidad"+i,document.cookie);
        var precio = GetCookie("prod_precio"+i,document.cookie);
        contenidoTabla = contenidoTabla.concat('<tr><td align="left">'+GetCookie("prod_nombre"+i,document.cookie)+'</td>'+
            '<td width="10">&nbsp;</td>'+
            '<td>'+GetCookie("prod_talla"+i,document.cookie)+'</td>'+
            '<td width="10">&nbsp;</td>'+
            '<td><input type="number" min="1" value="'+cantidad+'" id="'+i+'" onchange="actualiza(this.id, this.value)" /></td>'+
            '<td width="10">&nbsp;</td>'+
            '<td>'+precio+'</td>'+
            '<td width="10">&nbsp;</td>'+
            '<td>'+(Number(cantidad))*(Number(precio))+'</td>'+
            '<td width="10">&nbsp;</td>'+
            '<td><a href="#"><img id="img_eliminar" src="imagenes/eliminar.png"/></a></td></tr>');
    }
    return contenidoTabla;
}

function actualiza(id, value){
    SetCookie("prod_cantidad"+id,value);
    muestraTablaProductos();
    muestraTotal();
    muestraCantidadProductos();
}

function muestraTotal(){
    var total = calculaTotal();
    var tdTotal = document.getElementById("costo_total");
    tdTotal.innerHTML = total;
}

function muestraCantidadProductos(){
    var tdCantidadProductos = document.getElementById("cantidad_productos");
    tdCantidadProductos.innerHTML = calculaCantidadProductos();
}

function calculaCantidadProductos(){
    var numProductos = GetCookie("productos", document.cookie);
    var cantidadTotal = 0;
    for(var i = 1; i <= numProductos; i++){
        var cantidad = Number(GetCookie("prod_cantidad"+i,document.cookie));
        cantidadTotal += cantidad;
    }
    return cantidadTotal;
}

function calculaTotal(){
    var numProductos = GetCookie("productos", document.cookie);
    var total = 0;
    for(var i = 1; i <= numProductos; i++){
        var cantidad = GetCookie("prod_cantidad"+i,document.cookie);
        var precio = GetCookie("prod_precio"+i,document.cookie);
        total += cantidad * precio;
    }
    return total;
}

window.onload = function(){
    muestraTablaProductos();
    muestraTotal();
    muestraCantidadProductos();
}