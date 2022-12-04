
<html>
<head>
 <title>Lista de compra</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="../bootstrap/css/animate.css" rel="stylesheet">
    <link href="../bootstrap/css/bootsnav.css" rel="stylesheet">
    <link href="../bootstrap/css/style.css" rel="stylesheet">
    <link href="../css/barraCarrito.css" rel="stylesheet">
     <script src="../script/script.js"></script>
    
	<title>ADMINISTRADOR</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Beauty Store">
	<meta name="keywords" content="posicionamiento web">
	<meta name="author" content="UTTEC">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
    <style type="text/css">
.pag_btn {
    border: solid 1px;
    border-color: rgb(0, 0, 255);
    color: rgb(0, 0, 255);
    background-color: rgb(255, 255, 255);
}
 
.pag_btn_des {
    border: solid 1px;
    border-color: rgb(200, 200, 200);
    color: rgb(200, 200, 200);
    background-color: rgb(245, 245, 245);
}
 
.pag_num {
    border: solid 1px;
    border-color: rgb(0, 0, 255);
    color: rgb(255, 255, 255);
    background-color: rgb(0, 0, 255);
}
</style>
 
<script type="text/javascript">
Paginador = function(divPaginador, tabla, tamPagina)
{
    this.miDiv = divPaginador; //un DIV donde irán controles de paginación
    this.tabla = tabla;           //la tabla a paginar
    this.tamPagina = tamPagina; //el tamaño de la página (filas por página)
    this.pagActual = 1;         //asumiendo que se parte en página 1
    this.paginas = Math.floor((this.tabla.rows.length - 1) / this.tamPagina); //¿?
 
    this.SetPagina = function(num)
    {
        if (num < 0 || num > this.paginas)
            return;
 
        this.pagActual = num;
        var min = 1 + (this.pagActual - 1) * this.tamPagina;
        var max = min + this.tamPagina - 1;
 
        for(var i = 1; i < this.tabla.rows.length; i++)
        {
            if (i < min || i > max)
                this.tabla.rows[i].style.display = 'none';
            else
                this.tabla.rows[i].style.display = '';
        }
        this.miDiv.firstChild.rows[0].cells[1].innerHTML = this.pagActual;
    }
 
    this.Mostrar = function()
    {
        //Crear la tabla
        var tblPaginador = document.createElement('table');
 
        //Agregar una fila a la tabla
        var fil = tblPaginador.insertRow(tblPaginador.rows.length);
 
        //Ahora, agregar las celdas que serán los controles
        var ant = fil.insertCell(fil.cells.length);
        ant.innerHTML = 'Anterior';
        ant.className = 'pag_btn'; //con eso le asigno un estilo
        var self = this;
        ant.onclick = function()
        {
            if (self.pagActual == 1)
                return;
            self.SetPagina(self.pagActual - 1);
        }
 
        var num = fil.insertCell(fil.cells.length);
        num.innerHTML = ''; //en rigor, aún no se el número de la página
        num.className = 'pag_num';
 
        var sig = fil.insertCell(fil.cells.length);
        sig.innerHTML = 'Siguiente';
        sig.className = 'pag_btn';
        sig.onclick = function()
        {
            if (self.pagActual == self.paginas)
                return;
            self.SetPagina(self.pagActual + 1);
        }
 
        //Como ya tengo mi tabla, puedo agregarla al DIV de los controles
        this.miDiv.appendChild(tblPaginador);
 
        //¿y esto por qué?
        if (this.tabla.rows.length - 1 > this.paginas * this.tamPagina)
            this.paginas = this.paginas + 1;
 
        this.SetPagina(this.pagActual);
    }
}
</script>
<body>
     <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                    </button>
                   
                </div>
            
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li><a href="../index.php">Inicio</a></li>
                        <li><a href="productoscliente.php">Productos</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
                        <li><a href="Login.php">Iniciar sesión</a></li>
                     <li><a href="conocenos.php"> Conócenos</a></li>
                         &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;
                        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;
                        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;
                        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;
                        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;
                    </ul>
                </div>  
    <form>
    <?php 
        require("../libs/AccesoDatos.php"); 
  require("../models/Catalogos.php"); 
   require("../models/pedidos.php"); 
        
        
        
        if(!empty($_POST["nombreProducto"])&& !empty($_POST["precioProducto"]) && !empty($_POST["cantidad"]) && !empty($_POST["imagen"])){
            $objPedidos = new pedidos();
        
         $nombreProducto = $_POST["nombreProducto"];
         $precioProducto = $_REQUEST["precioProducto"];
         $cantidadProductos = $_REQUEST["cantidad"];
         $imagen = $_REQUEST["imagen"];
            
            $objPedidoExistente = new pedidos();
            $rowPedidoExistente = $objPedidoExistente->get_pedidoExistente($nombreProducto);
            $existente = null;
            for($i = 0; $i<count($rowPedidoExistente); $i++){
echo $existente = $rowPedidoExistente[$i]["nombre_producto"];
            }

            if($existente!= null){
           $objActualizarPedidos = new pedidos();
        
         $nombreProducto = $_POST["nombreProducto"];
         $cantidadProductos = $_REQUEST["cantidad"];
         $precioTotal = $precioProducto*$cantidadProductos;
            $objActualizarPedidos->update_pedidosCantidad($nombreProducto,$cantidadProductos,$precioTotal);
                
                $objActualizarPedidos->update_pedidosPrecioTotal($nombreProducto);
            }
            else{
    $precioTotal = $precioProducto*$cantidadProductos;
   $objPedidos->add_pedidos($nombreProducto,$precioProducto,$cantidadProductos,$precioTotal,$imagen);  
        }
        }
        if(!empty($_POST["eliminar"])){    
            $objPedidos = new pedidos();
            $idpedido = $_POST["eliminar"];
            $objPedidos->delete_pedidos($idpedido);
        }
        
    ?>    
    </form>
    <center>
       
    <h2><p class="text-info" >Carrito<img src="../img/carrito.png" width="70px" height="70px"></p> </h2>
        </center>
        <?php
        
        $objbuscarpedido = new pedidos();
        $rowCatalogo = $objbuscarpedido->get_pedidos();
        ?>
        <div class="col-md-12"  class="tablaCarrito">
            <center>
                <form action="../index.php">
                <input type="submit" value="Continuar comprando" class="btn btn-danger">
                    </form>
               <table class="table table-hover table-dark"  id="tblDatos">
                    <thead class="thead-dark">
                    <tr>
                      <th scope="col">PRODUCTO</th>
                      <th scope="col">PRECIO</th>
                      <th scope="col">CANTIDAD</th>
                      <th scope="col">TOTAL A PAGAR</th>
                      <th scope="col">REFERENCIA</th>
                    </tr>
                    </thead>
                      
                  <?php
                  for ($i=0; $i<count($rowCatalogo); $i++){
                  ?>  
                <tbody>
                    <tr> 
                        <td><?php echo $rowCatalogo[$i]["nombre_producto"];?></td>
                        <td>$ <?php echo $rowCatalogo[$i]["precio_producto"];?></td>
                        <td><?php echo $rowCatalogo[$i]["cantidad"];?></td>
                        <td>$ <?php echo $rowCatalogo[$i]["precio_total"];?></td>
                        <td><img src="<?php echo $rowCatalogo[$i]["imagen"];?>" width="65px" high="65px"/></td>
                        <td><form action="#" method="post">
             <button type="submit" class="btn btn-danger" name="eliminar">
                  <img src="../img/eliminar.png" width="25px" height="25px">Retirar del carrito </button>
                <input type="hidden" name="eliminar" value="<?php  echo  $rowCatalogo[$i]["id_pedido"]; ?>">

                </form></td>
                            
                        
                    </tr>
            
                     <?php }?>
    </table>
                   </center>
               <center> <div id="paginador"></div></center>
<script type="text/javascript">
var p = new Paginador(
    document.getElementById('paginador'),
    document.getElementById('tblDatos'),
    5
);
p.Mostrar();   
     </script>   
                 <br>
                 <br>
            <div class="col-md-12">
            <form action="Login.php"><input type="submit" value="Finalizar compra" class="btn btn-danger"></form>
            </div>
    </div>
    </body>
</html>