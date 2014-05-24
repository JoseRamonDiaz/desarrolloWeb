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

function Vaciar() {
    SetCookie("productos", 0);
}