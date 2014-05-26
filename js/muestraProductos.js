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
            '<td><a onclick="return confirmar(\'Se eliminará el producto de la cesta, ¿deseas continuar?\')" href="Javascript:eliminarDeCesta('+i+')"><img id="img_eliminar" src="imagenes/eliminar.png"/></a></td></tr>');
    }
    return contenidoTabla;
}

function eliminarDeCesta(id){
    var numProductos = GetCookie("productos", document.cookie);
    
    for(var i = id; i < numProductos; i++){
        SetCookie("prod_id" + i,GetCookie("prod_id"+(i+1), document.cookie));
    SetCookie("prod_talla" + i,GetCookie("prod_talla"+(i+1), document.cookie));
    SetCookie("prod_cantidad" + i,GetCookie("prod_cantidad" + (i + 1), document.cookie));
    SetCookie("prod_nombre"+i, GetCookie("prod_nombre"+(i+1), document.cookie));
    SetCookie("prod_precio"+i, GetCookie("prod_precio"+(i+1), document.cookie));
    }
    //restar 1 a numProductos y setear a cookie
    SetCookie("productos",(numProductos-1));
    actualizaPantalla();
}

function actualiza(id, value){
    SetCookie("prod_cantidad"+id,value);
    actualizaPantalla();
}

function actualizaPantalla(){
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

function confirmar(mensaje){
    return confirm(mensaje);
}

window.onload = function(){
    muestraTablaProductos();
    muestraTotal();
    muestraCantidadProductos();
}