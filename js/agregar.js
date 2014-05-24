/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function GetCookie (name, InCookie) {
    var prop = name + "=";
    var plen = prop.length;
    var clen = InCookie.length;
    var i=0;
    if (clen>0) { 
        i = InCookie.indexOf(prop,0);
        if (i!=-1) { 
            j = InCookie.indexOf(";",i+plen);
            if(j!=-1)
                return unescape(InCookie.substring(i+plen,j));
            else
                return unescape(InCookie.substring(i+plen,clen));
        }
        else
            return "";
    }
    else
        return "";
}

function SetCookie (name, value) {
    var argv = SetCookie.arguments;
    var argc = SetCookie.arguments.length;
    var expires = (argc > 2) ? argv[2] : null;
    var path = (argc > 3) ? argv[3] : null;
    var domain = (argc > 4) ? argv[4] : null;
    var secure = (argc > 5) ? argv[5] : false;
    document.cookie = name + "=" + escape(value) +
    ((expires==null) ? "" : ("; expires=" + expires.toGMTString())) +
    ((path==null) ? "" : (";path=" + path)) +
    ((domain==null) ? "" : ("; domain=" + domain)) +
    ((secure==true) ? "; secure" : "");
}

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

function Vaciar() {
    SetCookie("productos", 0);
}

window.onload = function(){
    //Vaciar();
    var btn_agregar = document.getElementById("agregar");
    btn_agregar.onclick = Agregar;
}