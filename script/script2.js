function detalleproducto(cve){

    
    var xmlhttp;
 if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("contenido").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","DetalleProducto.php",true);
  
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("cve="+cve);
    acttemas();
 
}


function detalleproductoCatalogo(cve){

    
    var xmlhttp;
 if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("contenido").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","DetalleProducto.php",true);
  
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("cve="+cve);
    acttemas();
 
}



function buscadorProductos(){

     var producto=document.getElementById("search").value;
 
    var xmlhttp;
 if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("contenido").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","BuscadorProducto.php",true);
  
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("producto="+producto);
    acttemas();
}


function buscadorProductos2(){

     var producto=document.getElementById("search").value;
 
    var xmlhttp;
 if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("contenido").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","BuscadorProducto.php",true);
  
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("producto="+producto);
    acttemas();
}